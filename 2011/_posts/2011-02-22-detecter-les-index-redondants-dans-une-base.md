---
layout: post
title: "Détecter les index redondants dans une base"
author: "marc.cousin"
redirect_from: "index.php?post/2011-02-22-detecter-les-index-redondants-dans-une-base "
---




<!--more-->


<p>Voici un petit cas d'école d'utilisation de Window Function… vu que c'est rare dans le travail de DBA d'en rencontrer qui nous servent à nous.</p>

<h1>Intro: Pourquoi un si long article juste pour nous présenter une requête ?</h1>

<p>Il y a quelques jours, je me suis retrouvé dans un environnement contenant beaucoup d'index inutiles, redondants, etc… Habituellement, pour dégrossir le terrain, on peut aller faire un tour du côte dé pg_stat_user_indexes, et se débarrasser des index non utilisés, s'ils ne servent à rien d'autre (contrainte d'unicité principalement).</p>

<p>Le problème est qu'il arrive quelquefois que les index soient utilisés tout de même. L'exemple classique est le suivant (pour ceux qui connaissent bien cette problématique, n'hésitez pas à sauter le paragraphe :) ):</p>

<pre>test=&gt; CREATE TABLE test (a int, b int, c int);

CREATE TABLE

test=&gt; CREATE INDEX tst1 on test (b);

CREATE INDEX

test=&gt; CREATE INDEX tst2 on test (c);

CREATE INDEX

test=&gt; CREATE INDEX tst3 on test (b,c);

CREATE INDEX

</pre>

<p>(On imagine que j'ai mis des données dedans, je suis trop paresseux pour le faire… ).</p>

<p>Si on fait</p>

<pre>select * from test where b=1</pre>

<p>on va passer par tst1.</p>

<p>De même, si la clause «where» est sur c uniquement, on va passer par tst2, et si on a une requête sur b et c à la fois, on utilisera tst3, puisque le moteur prendra à chaque fois l'index le plus efficace. À chaque fois, c'est le plus efficace, si on considère uniquement la requête en cours.</p>

<p>Mais l'index tst3 est tout à fait capable de répondre aux requêtes sur b uniquement. Il est même extrêmement proche en performances de tst2 (moins de 1% de perte, le plus souvent). Et si on ne gardait que tst3, on aurait tst2 de moins dans le cache. Donc plus de chance d'avoir tst3 dans le cache. Donc probablement de meilleures performances <ins>globales</ins>, sauf si bien sûr tout tenait déjà dans le cache.</p>

<p>Donc ce qui serait intéressant, c'est de détecter que tst2 est «compris» dans tst3.</p>

<h1>Étape 1: la table système</h1>

<p>Construisons la requête par morceau. Pour commencer, l'oid de ma table «test», c'est 16406. On a des informations sur ses index par la table système pg_index:</p>

<pre>test=&gt; SELECT indexrelid, indrelid, indkey from pg_index where indrelid=16406;</pre><pre><pre> indexrelid | indrelid | indkey<br />------------+----------+--------<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16409 |    16406 | 2<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16410 |    16406 | 3<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16411 |    16406 | 2 3</pre></pre>

<p>indkey est un tableau d'entiers (la liste des colonnes…).</p>

<p>Ce qu'on cherche, c'est, pour un indrelid donné (l'identifiant de la table), trouver les index pour lesquelles le tableau indkey est le début de celui d'un autre index.</p>

<p>Comme je suis paresseux, et que je préfère comparer des chaînes de caractère, commençons donc par transformer indkey en chaîne, avec array_to_string:</p>

<pre>SELECT indexrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;indrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array_to_string(indkey,'+')

FROM pg_index

WHERE indrelid=16406

ORDER BY indrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array_to_string(indkey,'+') DESC;</pre><pre> indexrelid | indrelid | array_to_string

------------+----------+-----------------

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16410 |    16406 | 3

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16411 |    16406 | 2+3

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16409 |    16406 | 2

(4 lignes)

</pre>

<p>Tant qu'on y est, on voit qu'on peut trier sur cette chaîne. Si on lit la liste, on trouve très rapidement que 16411 contient 16409, qui est juste après lui.</p>

<h1>Etape 2: la «Window Function»</h1>

<p>C'est ici qu'arrive la Window Function&nbsp;: on veut comparer deux enregistrements consécutifs, ce qui n'est pas possible avec des opérateurs relationnels classiques (à moins de créer 2 fois la table, y numéroter les enregistrements, et faire une jointure sur ces numéros, belle galère en perspective) :</p>

<pre>SELECT indexrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;indrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array_to_string(indkey,'+') AS colindex,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(array_to_string(indkey,'+')) OVER window_recherche AS colindexprecedent,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(indexrelid) OVER window_recherche AS index_precedent

FROM pg_index

WHERE indrelid=16406

WINDOW window_recherche AS (PARTITION BY indrelid

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDER BY array_to_string(indkey,'+') DESC);</pre><pre> indexrelid | indrelid | colindex | colindexprecedent | index_precedent

------------+----------+----------+-------------------+-----------------

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16410 |    16406 | 3        |                   |

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16411 |    16406 | 2+3      | 3                 |           16410

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16409 |    16406 | 2        | 2+3               |           16411

(4 lignes)

</pre>

<p>On définit une fenêtre partitionnée par indrelid, c'est à dire que la fonction «Window» ne travaillera que sur les enregistrements de même indrelid. Elle sera remise à zéro à chaque changement d'indrelid.</p>

<p>On trie dans cette fenêtre par array_to_string(indkey,'+') DESC, comme précédemment.</p>

<p>Dans cette fenêtre, avec ce tri, on utilise la fonction lag, qui retourne pour chaque enregistrement de la fenêtre une fonction de l'enregistrement précédent.</p>

<h1>Etape 3: Utiliser le résultat de la Window Function</h1>

<p>On peut donc extraire 2 colonnes colindex et colindexprecedent, qu'il suffit de comparer comme deux chaînes pour trouver si les index sont redondants. Ils le sont si colindex est le début de colindexprecedent.</p>

<p>Pour plus de lisibilité, on place notre requête dans une sous-requête, histoire de pouvoir utiliser colindex et colindexprecedent plutôt que les fonctions lag dans la clause WHERE.</p>

<pre>SELECT indexrelid,index_precedent FROM

(

&nbsp;&nbsp;&nbsp;SELECT indexrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;indrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array_to_string(indkey,'+') AS colindex,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(array_to_string(indkey,'+')) OVER window_recherche AS colindexprecedent,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(indexrelid) OVER window_recherche AS index_precedent

&nbsp;&nbsp;&nbsp;FROM pg_index

&nbsp;&nbsp;&nbsp;WHERE indrelid=16406

&nbsp;&nbsp;&nbsp;WINDOW window_recherche AS (PARTITION BY indrelid

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDER BY array_to_string(indkey,'+') DESC)

) AS tmp

WHERE colindexprecedent like (colindex || '+%');</pre><pre> indexrelid | index_precedent

------------+-----------------

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;16409 |           16411

</pre>

<h1>Étape 4, où l'on apprend que l'auteur aime les cerises sur les gâteaux</h1>

<p>Cerise sur le gâteau donc, on va rendre notre résultat utilisable. Et arrêter de filtrer sur notre seule table, on veut que ça travaille sur toute la base…</p>

<pre>SELECT pg_get_indexdef(indexrelid) as contenu,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;pg_get_indexdef(index_precedent) as contenant

FROM

(

&nbsp;&nbsp;&nbsp;SELECT indexrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;indrelid,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;array_to_string(indkey,'+') AS colindex,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(array_to_string(indkey,'+')) OVER window_recherche AS colindexprecedent,

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;lag(indexrelid) OVER window_recherche AS index_precedent

&nbsp;&nbsp;&nbsp;FROM pg_index

&nbsp;&nbsp;&nbsp;WINDOW window_recherche AS (PARTITION BY indrelid

&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;ORDER BY array_to_string(indkey,'+') DESC)

) AS tmp

WHERE colindexprecedent like (colindex || '+%');</pre><pre>                  contenu                  |                  contenant

-------------------------------------------+----------------------------------------------

&nbsp;CREATE INDEX tst1 ON test USING btree (b) | CREATE INDEX tst3 ON test USING btree (b, c)

(1 ligne)

</pre><h1>Disclaimer</h1>

<p>Attention tout de même à une chose: on ne distingue pas ici les index 'normaux' des index liés à des contraintes, comme les clés primaires. Ils vous sont tous présentés, avec la syntaxe CREATE INDEX, même si ils proviennent d'une contrainte. Ça veut donc dire qu'il reste un peu de travail à faire après avoir exécuté cette requête et récupéré son résultat…</p>