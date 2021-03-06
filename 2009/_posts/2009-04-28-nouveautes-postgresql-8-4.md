---
layout: post
title: "Nouveautés PostgreSQL 8.4"
author: "mcousin"
categories: [Articles]
redirect_from: "index.php?post/2009/04/28/Nouveautés-PostgreSQL-8.4"
---


<p>Le but de cet article est de détailler les nouveautés apportées par la version 8.4 de PostgreSQL.

Il s'agit d'une partie de la <a hreflang="fr" href="http://docs.postgresql.fr/8.4/release.html">liste réelle des changements</a>, qui est bien plus vaste.</p>

<!--more-->


<h1>Introduction</h1>

<p>Cette version est disponible en version beta depuis le 15 avril 2009 et est une version majeure. Des fonctionnalités extrêmement importantes ont été ajoutées, tant au niveau du langage SQL qu'au niveau de l'administration. Contrairement au passage de 8.2 vers 8.3 (suppression de nombreuses conversions implicites), il y a peu de risques de régression entre 8.3 et 8.4.</p>

<p>Par ailleurs, si vous voulez un résumé des fonctionnalités ajoutées au fur et à mesure des versions, cette page (en anglais) fournit un excellent résumé&nbsp;:

<a href="http://www.postgresql.org/about/featurematrix" title="http://www.postgresql.org/about/featurematrix">http://www.postgresql.org/about/featurematrix</a></p>

<p>Pour permettre à chaque audience de savoir ce qui la concerne, chaque fonctionnalité se voit affecter une couleur&nbsp;:</p>

<p><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Jaune</span> pour ce qui concerne les améliorations pour les développeurs.</p>

<p><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Bleu</span> pour ce qui concerne les améliorations pour les administrateurs.</p>

<p><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Vert</span> pour ce qui concerne tout le monde.</p>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Window Functions (fonctions de fenêtrage)</span></h1>

<p>Le but d'une fonction de fenêtrage est de fournir des fonctions de regroupement 'glissantes' et de ne pas regrouper les enregistrements dans la sortie de la requête : une fonction de regroupement classique (SUM par exemple) donne un seul résultat pour tout un groupe (la somme des salaires des employés d'une division par exemple). Les fonctions de fenêtrage permettront d'obtenir la somme des salaires des employés d'une division, tout en ne faisant pas le regroupement. Cela permettrait en une seule requête de comparer le salaire d'un employé avec la moyenne de son département.</p>

<p>La doc officielle&nbsp;: <a href="http://docs.postgresql.fr/8.4/tutorial-window.html" title="http://docs.postgresql.fr/8.4/tutorial-window.html">http://docs.postgresql.fr/8.4/tutorial-window.html</a> et  <a href="http://docs.postgresql.fr/8.4/sql-expressions.html#syntax-window-functions" title="http://docs.postgresql.fr/8.4/sql-expressions.html#syntax-window-functions">http://docs.postgresql.fr/8.4/sql-expressions.html#syntax-window-functions</a>.</p>

<p>On peut grâce à ces fonctions calculer le rang d'un enregistrement, éclater une liste suivant l'appartenance d'une valeur à un centile, etc ...</p>

<p>Elles sont très pratiques en contexte d'infocentre.</p>

<p>Voici un exemple simple (celui du paragraphe explicatif)&nbsp;:</p>

<p>Soit une table employe&nbsp;:</p>

<code>\d employe<br />     Table "public.employe"<br />  Column&nbsp;&nbsp;  |       Type&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;        | Modifiers<br />---------+-------------------+----------<br /> nom&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | character varying |<br /> division | character varying |<br /> salaire&nbsp;  | numeric&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;           |<br /><br /><br />SELECT * from employe ;<br />  nom&nbsp;&nbsp;  | division | salaire<br />------+----------+--------<br /> marc&nbsp;  | dept a&nbsp;&nbsp;   |     100<br /> jean&nbsp;  | dept a&nbsp;&nbsp;   |     110<br /> luc &nbsp;   | dept a&nbsp;&nbsp;   |      90<br /> brian | dept b&nbsp;&nbsp;   |     100<br /> pete&nbsp;  | dept b&nbsp;&nbsp;   |     150</code>

<p>Pour obtenir le résultat demandé (donner, pour chaque utilisateur,le salaire moyen de sa division), on peut écrire cette requête&nbsp;:</p>

<code>SELECT nom,division,salaire,salaire_moyen <br />FROM employe <br />JOIN (<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SELECT AVG(salaire) AS salaire_moyen,division <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; FROM employe <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; GROUP BY division) <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AS temp <br />&nbsp;&nbsp;&nbsp; USING (division);<br /><br />  nom&nbsp;&nbsp;  | division | salaire |    salaire_moyen<br />------+----------+---------+---------------------<br /> marc&nbsp;  | dept a &nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000<br /> jean&nbsp;  | dept a&nbsp;&nbsp;   |     110 &nbsp; &nbsp; | 100.0000000000000000<br /> luc &nbsp;   | dept a&nbsp;&nbsp;   |      90&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000<br /> brian | dept b&nbsp;&nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000<br /> pete&nbsp;  | dept b&nbsp;&nbsp;   |     150&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000</code>

<p>Dans ce cas simple, c'est encore lisible. Évidemment, si on veut en plus le salaire maximum, le classement dans la division, la requête devient vite lourde, et demande en plus plusieurs passes sur la table.</p>

<p>Avec les nouvelles fonctions de fenêtrage, on l'écrit comme suit&nbsp;:</p>

<code>SELECT nom,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       division,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; salaire,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AVG(salaire) OVER (PARTITION BY division) AS salaire_moyen <br />       FROM employe;<br /><br />  nom&nbsp;  | division | salaire |    salaire_moyen<br />-----+----------+---------+---------------<br /> marc  | dept a&nbsp;&nbsp;   |     100 &nbsp; &nbsp; | 100.0000000000000000<br /> jean  | dept a&nbsp;&nbsp;   |     110&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000<br /> luc&nbsp;   | dept a &nbsp;   |      90&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000<br /> brian| dept b&nbsp;&nbsp;   |     100 &nbsp; &nbsp; | 125.0000000000000000<br /> pete  | dept b&nbsp;&nbsp;   |     150&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000</code>

<p>On indique à PostgreSQL sur quelle partition effectuer le fenêtrage avec le mot clé partition.</p>

<p>Si on veut en plus le classement de chaque employé dans sa division&nbsp;:</p>

<code>SELECT nom,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; division,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; salaire,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AVG(salaire) OVER (PARTITION BY division) AS salaire_moyen,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RANK() OVER (PARTITION BY division ORDER BY salaire DESC) AS rang_division<br />       FROM employe;<br /><br />  nom&nbsp;  | division | salaire |    salaire_moyen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     | rang_division<br /><del>-----+----------+---------+----------------------+-----------</del><br /> jean  | dept a&nbsp;&nbsp;   |     110&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000 |             1<br /> marc  | dept a &nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000 |             2<br /> luc&nbsp; | dept a&nbsp;&nbsp;   |      90 &nbsp; &nbsp;&nbsp; | 100.0000000000000000 |             3<br /> pete  | dept b &nbsp;   |     150&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000 |             1<br /> brian| dept b&nbsp;&nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000 |             2</code>

<p>On peut donc donner un ordre avec un order by dans la clause OVER. On remarque aussi que RANK ne prend pas de paramètre (ce qui est logique).</p>

<p>On peut continuer à complexifier&nbsp;: on veut le rang global du salaire dans la table (on ne partitionne plus sur une valeur, mais on continue le tri):</p>

<code>SELECT nom,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; division,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; salaire,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AVG(salaire) OVER (PARTITION BY division) AS salaire_moyen,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RANK() OVER (PARTITION BY division ORDER BY salaire DESC) AS rang_division,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RANK() OVER (ORDER BY salaire DESC) AS rang_global<br />       FROM employe;<br /><br />  nom&nbsp;  | division | salaire |    salaire_moyen&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;     | rang_division | rang_global<br />-----+----------+---------+----------------------+---------------+------------<br /> pete  | dept b &nbsp;   |     150 &nbsp; &nbsp; | 125.0000000000000000 |             1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |           1<br /> jean  | dept a&nbsp;&nbsp;   |     110&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000 |             1&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |           2<br /> marc  | dept a&nbsp;&nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000 |             2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |           3<br /> brian| dept b&nbsp;&nbsp;   |     100&nbsp;&nbsp;&nbsp;&nbsp; | 125.0000000000000000 |             2&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |           3<br /> luc&nbsp;   | dept a&nbsp;&nbsp;   |      90&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | 100.0000000000000000 |             3&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; |           5</code>

<p>Ce genre de requête est très pénible à écrire sans les fonctions de fenêtrage ...</p>

<p>Attention tout de même aux performances&nbsp;: les fonctions de fenêtrage travaillent sur des données triées (les partitions), ce qui fait que les données de la requête subiront des tris (qui peuvent être nombreux si il y a de nombreuses méthodes de partitionnement différentes utilisées dans la même requête). Par comparaison, la requête initiale (avec la jointure) peut faire des aggregats par hash, qui dans certains contextes seront plus performants. Ces fonctions de fenêtrage ont donc tendance à restreindre les choix de l'optimiseur SQL. Il faut donc être prudent sur l'utilisation de ces fonctions sur un gros volume de données.</p>

<p>Au niveau syntaxique, on peut déclarer une clause de partition de façon globale pour pouvoir ensuite l'utiliser plusieurs fois par son nom dans la requête&nbsp;:</p>

<code> SELECT nom,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; division,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; salaire,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; AVG(salaire) OVER (w) AS salaire_moyen,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; RANK() OVER (w) AS rang<br />FROM employe<br />WINDOW w AS (PARTITION BY division ORDER BY salaire DESC);</code>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">CTE, Common Table Expressions (Expressions de tables communes)</span></h1>

<p>Le but des CTE est de fournir des déclarations communes de tables au début d'une requête, avant son corps proprement dit.</p>

<p><em>Nb</em>: les exemples ci-dessous sont tirés de la documentation PostgreSQL.</p>

<p>Ceci est utilisé dans 2 cas&nbsp;:</p>

<ul>

<li>Pour définir de la 'récursion' (l'équivalent des <em>'CONNECT BY</em>' d'Oracle) selon la nomenclature SQL. Il s'agit en fait d'un processus itératif (voir la documentation).</li>

</ul>

<code>WITH RECURSIVE parties_incluses(sous_partie, partie, quantite) AS (<br />&nbsp;&nbsp; SELECT sous_partie, partie, quantite FROM parties WHERE partie = 'notre_produit'<br />&nbsp;UNION ALL<br />&nbsp;&nbsp;    SELECT p.sous_partie, p.partie, p.quantite<br />&nbsp;&nbsp; FROM parties_incluses pr, parties p<br />&nbsp;&nbsp; WHERE p.partie = pr.sous_partie<br />  )<br />SELECT sous_partie, SUM(quantite) as quantite_totale<br />FROM parties_incluses<br />GROUP BY sous_partie</code>

<p>Ceci est assez complexe à utiliser, et potentiellement dangereux&nbsp;: il est très facile d'écrire une requête qui ne s'arrête pas. Il est donc important de bien étudier la documentation avant de se lancer dans des requêtes récursives&nbsp;: <a href="http://docs.postgresql.fr/8.4/queries-with.html" title="http://docs.postgresql.fr/8.4/queries-with.html">http://docs.postgresql.fr/8.4/queries-with.html</a></p>

<ul>

<li>Pour déclarer une requête qui sera réutilisée plusieurs fois par la suite dans la requête principale, et limiter ainsi le nombre de ses exécutions (pour raison de performance et de lisibilité donc).</li>

</ul>

<code>WITH ventes_regionales AS (<br />&nbsp;&nbsp; SELECT region, SUM(montant) AS ventes_totales<br />&nbsp;&nbsp; FROM commandes<br />&nbsp;&nbsp; GROUP BY region<br />     ), <br />&nbsp;&nbsp;&nbsp;&nbsp; meilleures_regions AS (<br />&nbsp;&nbsp; SELECT region<br />&nbsp;&nbsp; FROM ventes_regionales<br />&nbsp;&nbsp; WHERE ventes_totales &gt; (SELECT SUM(ventes_totales)/10 FROM ventes_regionales)<br />     )<br />SELECT region,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; produit,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUM(quantite) AS unites_produit,<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SUM(montant) AS ventes_produit<br />FROM commandes<br />WHERE region IN (SELECT region FROM meilleures_regions)<br />GROUP BY region, produit;</code>

<p>Les CTE sont déclarées avec le mot clé WITH&nbsp;: <a href="http://docs.postgresql.fr/8.4/queries-with.html" title="http://docs.postgresql.fr/8.4/queries-with.html">http://docs.postgresql.fr/8.4/queries-with.html</a></p>

<h1><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Free Space Map automatique</span></h1>

La Free Space Map est un mécanisme permettant à PostgreSQL de mémoriser la liste des zones réutilisables d'un fichier de données (équivalent des freelists d'Oracle). Jusque là, cette free space map était une zone mémoire partagée, donc de taille fixe, ce qui pouvait poser des problèmes de dimensionnement de celle ci&nbsp;: dès que la free space map était pleine, il devenait impossible de stocker de nouveaux blocs dans celle ci, et des tables pouvaient grossir de façon incontrôlable.

<p>En 8.4, la Free Space Map n'est plus une zone mémoire mais une extension logique de chaque table (un « fork » dans la nomenclature PostgreSQL), chaque fork pouvant croître de façon autonome (il a son propre fichier géré comme les fichiers des tables et index). Les deux paramètres max_fsm_pages et max_fsm_relation disparaissent, supprimant avec eux une des principales sources complexité et d'erreur de l'administration de PostgreSQL.</p>

<p>Les fichiers de FSM sont stockés avec les fichiers des tables, avec le même identifiant numérique, mais terminé par le suffixe FSM. Par exemple, la table de relfilenode 2610 aura un fichier FSM 2610_fsm.</p>

<h1><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Visibility Map</span></h1>

L'apparition du concept de fork (cf paragraphe précédent) dans PostgreSQL a permis de rajouter de nouveaux bitmaps d'attributs sur les tables. Le premier est la visibility map. Elle fournit la liste des pages dont TOUS les enregistrements sont visibles. Vacuum active le bit d'une page quand il a fini de la traiter et que tous les enregistrements qui sont dedans sont validés (cela sera de loin le cas le plus courant dans une table en production). Toute transaction qui invalide un enregistrement dans une page désactive le bit.

Ceci comporte plusieurs intérêts:

<ul>

<li>Le premier est de permettre un VACUUM partiel&nbsp;: il n'est plus nécessaire de passer sur toute la table à chaque vacuum, puisqu'on a la liste des pages qui contiennent potentiellement des enregistrements à nettoyer (celles dont le bit n'est plus actif). Il n'est plus nécessaire de nettoyer les autres. Cela réduit la durée d'un VACUUM et la lie à la quantité réelle de travail à effectuer. On pourra donc par la même occasion faire des VACUUM plus rapprochés, et gérer beaucoup plus facilement les tables de grande taille (vacuum ne sera probablement plus une raison pour la partitionner). Attention,même en cas de vacuum partiel, il reste nécessaire d'inspecter en entier tous les index.</li>

<li>Le second <em>n'est pas encore implémenté</em> mais le sera probablement assez rapidement.<br />Les entrées d'index ne contiennent pas d'information sur la visibilité des enregistrements qu'elles pointent. Ceci oblige PostgreSQL, lors de parcours d'index, à aller consulter la page de la table pour vérifier la visibilité de l'enregistrement qu'il vient de trouver. Ceci empêche quelques optimisations, que font Oracle et SQL Server par exemple qui peuvent se contenter de parcourir un index sans aller voir la table si seules les colonnes indexées sont utilisées (pour un count(*) sur une table entière par exemple).<br />Avec ce bitmap de visibilité, il sera possible de confirmer la plupart du temps la visibilité d'un enregistrement d'index simplement par la consultation du bit associé à la page de l'enregistrement qu'il pointe&nbsp;: si l'ensemble de la page est visible, l'enregistrement est visible, et il n'est donc pas la peine d'aller regarder le contenu de la page. Sachant que 99% des pages d'une table seront probablement totalement visibles à chaque instant (surtout que le vacuum partiel permettra d'augmenter la fréquence des vacuum), le gain sera probablement très net sur ces requêtes particulières, et permettra de se débarrasser d'un point faible de PostgreSQL.</li>

</ul>

<p>Les fichiers de Visibility Map sont stockés avec les fichiers des tables, avec le même identifiant numérique, mais terminé par VM. Par exemple, la table de relfilenode 2610 aura un fork 2610_vm.</p>

<h1><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Locale par base</span></h1>

<p>On peut maintenant créer des bases d'encodage et de collation/catégorisation (ordre de tri dans les index, le lc_collate, et classification/casse avec le lc_ctype) différentes.</p>

<code>infocentre_dte=# CREATE DATABASE test1</code> ENCODING='LATIN9' LC_COLLATE='fr_FR@euro' LC_CTYPE='fr_FR@euro' TEMPLATE=template0;<strong><br /></strong><code>CREATE DATABASE<br />infocentre_dte=# CREATE DATABASE test2</code> ENCODING='UTF8' LC_COLLATE='fr_FR.UTF8' LC_CTYPE='fr_FR.UTF8' TEMPLATE=template0;<strong><br /></strong><code>CREATE DATABASE</code>

<p><em>'Nb:</em>' quand on crée une base qui n'a pas les mêmes collation/ctype que la base template1, il faut repartir du template0 (et donc recréer dans la nouvelle base tout ce qu'on a ajouté à la template1).

Sur un cluster, il est peu probable qu'on ait plus de 2 ou 3 encodages différents. Il est donc intéressant de créer des templates pour ces quelques combinaisons, et utiliser ensuite ces templates pour la création des bases réelles.</p>

<code>                                 List of databases<br />      Name&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | Owner | Encoding |  Collation&nbsp;&nbsp;  |    Ctype&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;    | Access privileges<br />----------+-------+----------+-------------+-------------+------------------<br /> postgres&nbsp;       | marc&nbsp;  | UTF8 &nbsp; &nbsp;     | fr_FR.UTF-8 | fr_FR.UTF-8 |<br /> template0      | marc&nbsp;  | UTF8&nbsp;&nbsp;&nbsp;&nbsp;     | fr_FR.UTF-8 | fr_FR.UTF-8 | =c/marc<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : marc=CTc/marc<br /> template1      | marc&nbsp;  | UTF8&nbsp;&nbsp;&nbsp;&nbsp;     | fr_FR.UTF-8 | fr_FR.UTF-8 | =c/marc<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : marc=CTc/marc<br /> test1&nbsp;&nbsp;&nbsp;&nbsp;          | marc&nbsp;  | LATIN9 &nbsp;   | fr_FR@euro&nbsp; | fr_FR@euro&nbsp;  |<br /> test2&nbsp;&nbsp;&nbsp;&nbsp;          | marc&nbsp;  | UTF8&nbsp;&nbsp;&nbsp;&nbsp;     | fr_FR.UTF8&nbsp;  | fr_FR.UTF8&nbsp;  |</code>

<h1><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Fonctions de monitoring</span></h1>

<ul>

<li>Dans le cas d'un deadlock, PostgreSQL retourne les textes de toutes les requêtes en cours durant le blocage dans les traces.</li>

</ul>

<code>ERROR:  deadlock detected<br />DETAIL:  Process 13686 waits for ShareLock on transaction 8710; blocked by process 13692.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Process 13692 waits for ShareLock on transaction 8709; blocked by process 13686.<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Process 13686: DELETE FROM test1 where a=2;<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Process 13692: DELETE FROM test1 where a=1;<br />HINT:  See server log for query details.<br />STATEMENT:  DELETE FROM test1 where a=2;</code>

<ul>

<li>pg_conf_load_time() permet de connaître la dernière date de rechargement du fichier de configuration</li>

<li>pg_terminate_backend() permet de tuer une session proprement (SIGTERM le permet aussi maintenant). Avant, aucune fonction supportée ne permettait de le faire, même si SIGTERM fonctionnait quasiment à chaque fois. Cette fonction est à distinguer de pg_cancel_backend() qui arrête la requête en cours d'une session.</li>

<li>Traçage des nombres d'appels et temps moyens d'exécution des procédures stockées, via la vue pg_stat_user_functions. Pour cela, il faut aussi activer track_functions dans la configuration, qui peut valoir all, pl ou none. All correspond à tout tracer (C, PL, SQL), pl uniquement les langages procéduraux, none rien du tout. <em>Nb</em>&nbsp;: une fonction SQL suffisamment simple pour être inlinée dans la requête appelante ne sera pas comptabilisée.</li>

</ul>

<ul>

<li>On peut maintenant spécifier la taille maximum d'une requête affichée dans pg_stat_activity via track_activity_query_size. Ce paramêtre n'est positionnable qu'au démarrage du serveur, puisqu'il réserve de la mémoire. La valeur par défaut est 1024 caractères. C'est cette taille qui est aussi utilisée (voir plus bas) pour pg_stat_statements.</li>

</ul>

<ul>

<li>Contrib&nbsp;: autoexplain<br />Suivre cette doc&nbsp;: <a href="http://docs.postgresql.fr/8.4/auto-explain.html" title="http://docs.postgresql.fr/8.4/auto-explain.html">http://docs.postgresql.fr/8.4/auto-explain.html</a>;Ce module permet de tracer tous les plans d'exécution d'une requête, au dessus d'une certaine durée d'exécution.</li>

</ul>

<p>Voici un extrait des traces quand cette fonctionnalité est activée&nbsp;:</p>

<code>LOG:  statement: BEGIN<br />LOG:  statement: DECLARE _psql_cursor NO SCROLL CURSOR FOR<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; SELECT * from isilog.actions limit (select 100);<br />LOG:  statement: FETCH FORWARD 100 FROM _psql_cursor<br />LOG:  statement: FETCH FORWARD 100 FROM _psql_cursor<br />LOG:  statement: CLOSE _psql_cursor<br />LOG:  duration: 0.047 ms  plan:<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Limit  (cost=0.01..17013.93 rows=416152 width=347)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; InitPlan 1 (returns $0)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&gt;  Result  (cost=0.00..0.01 rows=1 width=0)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&gt;  Seq Scan on actions  (cost=0.00..170139.21 rows=4161521 width=347)<br />STATEMENT:  CLOSE _psql_cursor<br />LOG:  statement: COMMIT</code>

<p>Evidemment, pour les besoins de l'exemple, la durée minimum d'une requête déclenchant les traces du plan a été abaissée à une valeur ridiculement faible&nbsp;: on ne va pas tracer les plans de requêtes durant 50 microsecondes, le coût serait trop élevé...</p>

<ul>

<li>Contrib&nbsp;: pg_stat_statements<br />Suivre cette doc&nbsp;: <a href="http://docs.postgresql.fr/8.4/pgstatstatements.html" title="http://docs.postgresql.fr/8.4/pgstatstatements.html">http://docs.postgresql.fr/8.4/pgstatstatements.html</a><br />Ce module permet d'avoir des statistiques similaires à celles d'Oracle (dans V$SQLAREA, perfstat ou rapports AWR). Il consomme de la mémoire (pour stocker ses statistiques) et un peu de ressources processeur (l'impact n'est pas mesurable).</li>

</ul>

<code>SELECT * from pg_stat_statements order by total_time desc;<br />-<a href="RECORD%201" title="RECORD 1">RECORD 1</a>-<br />userid&nbsp;&nbsp;&nbsp;&nbsp;     | 10<br />dbid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       | 16384<br />query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | DECLARE _psql_cursor NO SCROLL CURSOR FOR<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SELECT * from isilog.actions limit 100000;<br />calls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | 2<br />total_time | 0.106574<br />rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       | 0<br />-<a href="RECORD%202" title="RECORD 2">RECORD 2</a>-<br />userid&nbsp;&nbsp;&nbsp;&nbsp;     | 10<br />dbid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       | 16384<br />query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | SELECT n.nspname as "Schema",<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   c.relname as "Name",<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   CASE c.relkind WHEN 'r' THEN 'table' WHEN 'v' THEN 'view' WHEN 'i' THEN 'index' WHEN 'S'<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :  THEN 'sequence' WHEN 's' THEN 'special' END as "Type",<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   pg_catalog.pg_get_userbyid(c.relowner) as "Owner"<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : FROM pg_catalog.pg_class c<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :      LEFT JOIN pg_catalog.pg_namespace n ON n.oid = c.relnamespace<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : WHERE c.relkind IN ('r','v','S','')<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :       AND n.nspname &lt;&gt; 'pg_catalog'<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :       AND n.nspname &lt;&gt; 'information_schema'<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :       AND n.nspname !~ '^pg_toast'<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; :   AND pg_catalog.pg_table_is_visible(c.oid)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ORDER BY 1,2;<br />calls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | 1<br />total_time | 0.023864<br />rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | 8<br />-<a href="RECORD%203" title="RECORD 3">RECORD 3</a>--<br />userid&nbsp;&nbsp;&nbsp;&nbsp;     | 10<br />dbid&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;       | 16384<br />query&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | SELECT pg_catalog.quote_ident(c.relname) FROM pg_catalog.pg_class c WHERE c.relkind IN<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : ('r', 'S', 'v') AND substring(pg_catalog.quote_ident(c.relname),1,6)='pg_sta' AND<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : pg_catalog.pg_table_is_visible(c.oid)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : UNION<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SELECT pg_catalog.quote_ident(n.nspname) || '.' FROM pg_catalog.pg_namespace n WHERE<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : substring(pg_catalog.quote_ident(n.nspname) || '.',1,6)='pg_sta' <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : AND (SELECT pg_catalog.count(*) FROM pg_catalog.pg_namespace WHERE<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : substring(pg_catalog.quote_ident(nspname) || '.',1,6) =<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : substring('pg_sta',1,pg_catalog.length(pg_catalog.quote_ident(nspname))+1)) &gt; 1<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : UNION<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : SELECT pg_catalog.quote_ident(n.nspname) || '.' || pg_catalog.quote_ident(c.relname) FROM<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : pg_catalog.pg_class c, pg_catalog.pg_namespace n WHERE c.relnamespace = n.oid AND c.relkind<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : IN ('r', 'S', 'v') AND substring(pg_catalog.quote_ident(n.nspname) || '.' ||<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : pg_catalog.quote_ident(c.relname),1,6)='pg_sta' AND<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : substring(pg_catalog.quote_ident(n.nspname) || '.',1,6) =<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            : substring('pg_sta',1,pg_catalog.length(pg_catalog.quote_ident(n.nspname))+1) AND (SELECT<br />           &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; : pg_catalog.count(*) FROM pg_catalog.pg_namespace WHERE<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            : substring(pg_catalog.quote_ident(nspname) || '.',1,6) = <br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            : substring('pg_sta',1,pg_catalog.length(pg_catalog.quote_ident(nspname))+1)) = 1<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;            : LIMIT 1000<br />calls&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;      | 1<br />total_time | 0.019265<br />rows&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; | 22</code>

<p>Pour un article plus détaillé (en anglais) sur le sujet&nbsp;: <a href="http://www.depesz.com/index.php/2009/01/13/waiting-for-84-pg_stat_statements/" title="http://www.depesz.com/index.php/2009/01/13/waiting-for-84-pg_stat_statements/">http://www.depesz.com/index.php/2009/01/13/waiting-for-84-pg_stat_statements/</a> </p>

<p><ins>Attention</ins>, il vaut mieux augmenter track_activity_query_size, si on veut les requêtes en entier dans cette vue. Par ailleurs, comme pour Oracle, cette fonctionnalité ne sera vraiment utile que dans le cas où le nombre de requêtes différentes est faible (requêtes préparées).</p>

<h1><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Archivage et sauvegardes</span></h1>

<ul>

<li>Améliorations de la sauvegarde en ligne et du Warm Standby (réplication à chaud par fichiers xlog)

<ul>

<li>pg_stop_backup ne rend la main à l'appelant qu'une fois que les fichiers d'archive correspondant à la période du backup sont correctement archivés. Cela simplifie la sauvegarde en ligne et en garantit le bon fonctionnement.</li>

<li>pg_start_backup dispose d'un paramètre optionnel booléen qui permet de déterminer si on veut que le checkpoint se fasse à vitesse normale (false), c'est-à-dire à la vitesse paramétrée par checkpoint_completion_target, ou à vitesse maximale (true). La valeur par défaut est false.</li>

</ul>

</li>

<li>pg_dump --data-only réordonne les imports pour respecter les contraintes d'intégrité (intégrer les données de la clé étrangère avant les données de la table), dans la mesure du possible. S'il y a des dépendances circulaires, un message NOTICE est affiché.</li>

<li>pg_restore dispose maintenant d'une option -j/--jobs (comme make par exemple), qui permet d'augmenter le parallélisme des restaurations (dans la limite du raisonnable).<br />Il faut préciser un nombre après le j (-j8 par exemple pour 8 sessions de restauration en parallèle).<br />Ceci parallélise la restauration des données de plusieurs tables, ainsi que les créations d'index/contraintes. Si la restauration est limitée par le processeur en temps normal (c'est souvent le cas), on peut paralléliser sur plus d'un processeur le processus de restauration grâce à cette option.</li>

</ul>

<h1><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Diverses améliorations de performance</span></h1>

<p>L'optimiseur SQL a été amélioré pour pouvoir&nbsp;:</p>

<ul>

<li>Utiliser des hachages pour SELECT DISTINCT, UNION, INTERSECT, EXCEPT. Attention, cela entraîne que leur résultat ne sera plus forcément trié (utiliser un ORDER BY) comme c'était le cas auparavant (mais c'était un effet de bord de l'algorithme).</li>

<li>Si c'est rentable, transformer les EXISTS/NOT EXISTS/IN/NOT IN dans la forme la plus efficace (c'est à dire convertir un EXIST en IN équivalent et vice versa suivant les statistiques)</li>

<li>Supporter des statistiques plus fines&nbsp;: la valeur par défaut de default_statistics_target est passée de 10 à 100, avec une valeur maxi passée de 1000 à 10000. Il ne sera par défaut plus nécessaire d'y toucher, la valeur 100 étant très raisonnable (contrairement à 10, qui générait des histogrammes trop imprécis).</li>

<li>Faire les exclusion de contrainte (constraint_exclusion) par défaut pour les partitions.</li>

<li>Faire de la lecture anticipée sur disque pour certains plans d'exécution&nbsp;: les 'bitmap index scans' déclencheront une lecture de nombreux blocs à la fois sur le disque afin que le système d'exploitation optimise les accès disques&nbsp;: paramètre effective_io_concurrency</li>

<li>Substituer les fonctions SQL simples (Inline) dans les requêtes les utilisant par leur code, afin qu'elles ne soient plus des boîtes noires et que l'optimiseur puisse faire un travail plus précis.</li>

<li>Prendre en compte un paramètre du type 'FIRST_ROWS' d'Oracle&nbsp;: on peut indiquer quel pourcentage d'un curseur sera probablement récupéré, d'une façon globale, et par session, afin qu'il optimise le plan d'exécution. Il s'agit de cursor_tuple_fraction, paramétré par défaut à 0.1.</li>

<li>Optimisation des performances d'insertion dans les index GIN (utilisés entre autres pour la recherche FULL TEXT) <a href="http://docs.postgresql.fr/8.4/gin-implementation.html" title="http://docs.postgresql.fr/8.4/gin-implementation.html">http://docs.postgresql.fr/8.4/gin-implementation.html</a></li>

</ul>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Module Optionnel&nbsp;: champs texte insensible à la casse</span></h1>

<p>Le module citext permet de disposer d'un type texte insensible à la casse (pour les recherches de chaînes de caractères).</p>

<p>La doc officielle&nbsp;: <a href="http://docs.postgresql.fr/8.4/citext.html" title="http://docs.postgresql.fr/8.4/citext.html">http://docs.postgresql.fr/8.4/citext.html</a></p>

<p>Une fois le module citext activé dans la base cible, on l'utilise comme suit&nbsp;:</p>

<code>infocentre_dte=# CREATE TABLE test2 (a citext);<br />CREATE TABLE<br />infocentre_dte=# ALTER TABLE test2 ADD primary key (a);<br />NOTICE:  ALTER TABLE / ADD PRIMARY KEY will create implicit index "test2_pkey" for table "test2"<br />ALTER TABLE<br />infocentre_dte=# INSERT INTO test2 values ('a');<br />INSERT 0 1<br />infocentre_dte=# INSERT INTO test2 values ('A');<br />ERROR:  duplicate key value violates unique constraint "test2_pkey"<br />infocentre_dte=# SELECT  * from test2 where a='A';<br /> a<br />---<br /> a<br />(1 row)</code>

<p>On a donc un nouveau type citext (Case Insensitive Text), insensible à la casse pour les comparaisons (mais qui conserve la casse saisie).</p>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Le mot clé AS devient optionnel</span></h1>

Le mot clé AS devient optionnel pour les alias de colonnes, sauf si le nom de l'alias est un mot clé réservé. Au passage, il faut signaler la fonction pg_get_keywords(), qui permet d'avoir la liste de ces mots réservés (il y en a environ 400), qui sont aussi listés ici&nbsp;: <a href="http://docs.postgresql.fr/8.4/sql-keywords-appendix.html" title="http://docs.postgresql.fr/8.4/sql-keywords-appendix.html">http://docs.postgresql.fr/8.4/sql-keywords-appendix.html</a>.

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Amélioration des langages PL</span></h1>

<ul>

<li>Fonctions SETOF et requêtes<br />Le résultat de procédures PL stockées retournant plusieurs enregistrements (des setof via RETURN NEXT) pourra être utilisé dans des jointures. Jusque là, ce n'était possible qu'avec les fonctions purement SQL.</li>

</ul>

<ul>

<li>Amélioration de la gestion des erreurs en PL<br />Voir cette doc&nbsp;: <a href="http://docs.postgresql.fr/8.4/plpgsql-errors-and-messages.html" title="http://docs.postgresql.fr/8.4/plpgsql-errors-and-messages.html">http://docs.postgresql.fr/8.4/plpgsql-errors-and-messages.html</a><br /><ins>A retenir:</ins><br />On peut maintenant dans un RAISE définir des codes d'erreur personnalisés ou mettre en place les codes retours standard (SQLSTATE,ERRCODE), et des indices pour la résolution des problèmes (HINT). On peut avec ces options remonter proprement et précisément les erreurs d'une fonction à la fonction ou la requête appelante.</li>

</ul>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Trigger sur l'évènement TRUNCATE</span></h1>

<ul><li>

On peut maintenant écrire des triggers sur évènement TRUNCATE. Il s'agit bien sûr de triggers 'FOR EACH STATEMENT'.

</li>

</ul>

<ul><li>On peut aussi fournir un argument RESTART/CONTINUE IDENTITY à la commande TRUNCATE, afin de réinitialiser les séquences qu'utilise la table, et une nouvelle permission TRUNCATE spécifique est maintenant disponible (pour la séparer de DELETE).</li>

</ul>

<h1><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Améliorations de EXPLAIN</span></h1>

Explain verbose affiche maintenant les colonnes de sorties de chaque noeud du plan. Explain quant à lui affiche les sous-plans et plans initiaux avec des labels individuels pour améliorer la lisibilité de l'ensemble.

<p>Un exemple d'explain verbose&nbsp;:</p>

<code>explain VERBOSE SELECT id_service,octets,date,id_sonde from liste_releves natural join detail_releve;<br />                                              QUERY PLAN<br />----------------------------------------------------------------------------------------<br /> Hash Join  (cost=1824.09..800688.50 rows=16606047 width=24)<br />&nbsp; Output: detail_releve.id_service, detail_releve.octets, liste_releves.date, liste_releves.id_sonde<br />&nbsp; Hash Cond: (detail_releve.id_releve = liste_releves.id_releve)<br />&nbsp; -&gt;  Seq Scan on detail_releve  (cost=0.00..271831.47 rows=16606047 width=20)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Output: detail_releve.id_service, detail_releve.octets, detail_releve.id_releve<br />&nbsp; -&gt;  Hash  (cost=859.93..859.93 rows=52493 width=20)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Output: liste_releves.date, liste_releves.id_sonde, liste_releves.id_releve<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; -&gt;  Seq Scan on liste_releves  (cost=0.00..859.93 rows=52493 width=20)<br />&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp; Output: liste_releves.date, liste_releves.id_sonde, liste_releves.id_releve</code>

<h1><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Droits par colonnes</span></h1>

<p>On peut maintenant donner des droits d'accès aux tables et vues par colonne&nbsp;:</p>

<code>CREATE USER user_test;<br /><br />CREATE TABLE test3 (a int, b varchar);<br /><br />GRANT SELECT (a) ON test3  to user_test;</code>

<p>Puis on se connecte en tant que user_test&nbsp;:</p>

<code>SELECT * from test3;<br />ERROR:  permission denied for relation test3<br />infocentre_dte=&gt; SELECT a from test3;<br /> a<br />---<br /> 1<br /> 2<br />(2 rows)</code>

<h1><span style="background: Aqua none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">pg_hba.conf</span></h1>

Améliorations du traitement du fichier pg_hba.conf&nbsp;:

<ul>

<li>Si le fichier est erroné, il n'est pas chargé et la version précédente est gardée (un message d'erreur est évidemment affiché dans les traces)</li>

<li>Toutes les erreurs d'analyse du fichier sont affichées, et pas seulement la première, ce qui permet de gagner du temps dans la correction de celles-ci.</li>

</ul>

<h1><span style="background: Yellow none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">CREATE OR REPLACE VIEW et les colonnes</span></h1>

On peut maintenant rajouter des colonnes à une vue par la commande CREATE OR REPLACE VIEW. Elles sont rajoutées à la fin de la vue. Jusqu'alors, il fallait détruire puis recréer la vue, ce qui était très problématique dans le cas de vues empilées (il fallait détruire toutes les vues dépendant de la vue à modifier, puis les recréer).

<h1><span style="background: Lime none repeat scroll 0% 0%; -moz-background-clip: -moz-initial; -moz-background-origin: -moz-initial; -moz-background-inline-policy: -moz-initial;">Rétrocompatibilité psql</span></h1>

Jusqu'alors, il fallait utiliser la version du client psql compatible avec la base à laquelle on se connectait, sous peine d'avoir des problèmes avec les commandes internes.

<p>A partir de la version 8.4, le client psql identifie la version de la base et exécute les interrogations de dictionnaire \d appropriées à la base. psql est donc compatible avec les bases de versions 7.4 à 8.4.</p>

<p>PS : Merci&nbsp; à Sigma Informatique (mon employeur) pour m'avoir autorisé à travailler sur ce document et à le publier...</p>