---
layout: post
title: "Utiliser un index pour les recherches sur des motifs tels que « colonne LIKE &#39;%chaîne&#39; »"
author: "gleu"
categories: [Articles]
redirect_from: "index.php?post/drupal/396"
---


<p></p>

<!--more-->


<p>Depuis la version 8i, Oracle implémente les index inversés. Les index inversés permettent d’accélérer les recherches sur les motifs tels que « colonne LIKE '%chaîne' ». Dans ce type de cas de figure, PostgreSQL effectue un parcours séquentiel (ou «&nbsp;sequential scan&nbsp;») de la table interrogée. Toutefois, il est possible d’émuler un index inverse au moyen d’une fonction de renversement de chaîne couplée à un index sur fonction. Voici une proposition d’implémentation équivalente pour PostgreSQL.</p>

<!--break-->

<p>Tout d’abord, il est nécessaire d’activer le support du <a href="http://docs.postgresqlfr.org/8.2/plpgsql.html">langage procédural PL/pgSQL</a> au sein de la base de données cible à l’aide de la commande Unix «&nbsp;<code><a href="http://docs.postgresqlfr.org/8.2/app-createlang.html">createlang</a> plpgsql BASECIBLE</code>&nbsp;».</p>

<p>La fonction appelée «&nbsp;reverse&nbsp;» prendra comme seul et unique argument une chaîne de type varchar et retournera une chaîne de type varchar.</p>

<pre>CREATE OR REPLACE FUNCTION reverse(varchar) RETURNS varchar AS $PROC$<br />&nbsp;<br />DECLARE<br />&nbsp;&nbsp;str_in ALIAS FOR $1;<br />&nbsp;&nbsp;str_out varchar;<br />&nbsp;&nbsp;str_temp varchar;<br />&nbsp;&nbsp;position integer;<br />BEGIN<br />&nbsp;&nbsp;-- Initialisation de str_out, sinon sa valeur reste à NULL<br />&nbsp;&nbsp;str_out := '';<br />&nbsp;&nbsp;-- Suppression des espaces en début et fin de chaîne<br />&nbsp;&nbsp;str_temp := trim(both ' ' from str_in);<br />&nbsp;&nbsp;-- position initialisée a la longueur de la chaîne<br />&nbsp;&nbsp;-- la chaîne est traitée a l’envers<br />&nbsp;&nbsp;position := char_length(str_temp);<br />&nbsp;&nbsp;-- Boucle: Inverse l'ordre des caractères d'une chaîne de caractères<br />&nbsp;&nbsp;WHILE position &gt; 0 LOOP<br />&nbsp;&nbsp;&nbsp;&nbsp;-- la chaîne donnée en argument est parcourue<br />&nbsp;&nbsp;&nbsp;&nbsp;-- à l’envers,<br />&nbsp;&nbsp;&nbsp;&nbsp;-- et les caractères sont extraits individuellement au<br />&nbsp;&nbsp;&nbsp;&nbsp;-- moyen de la fonction interne substring<br />&nbsp;&nbsp;&nbsp;&nbsp;str_out := str_out || substring(str_temp, position, 1);<br />&nbsp;&nbsp;&nbsp;&nbsp;position := position - 1;<br />&nbsp;&nbsp;END LOOP;<br />&nbsp;&nbsp;RETURN str_out;<br />END;<br />$PROC$ <br />LANGUAGE plpgsql IMMUTABLE;</pre>

<p>La fonction reverse est structurée en trois partie&nbsp;:

</p>

<ul>

<li>La déclaration elle-même via l’ordre <a href="http://docs.postgresqlfr.org/8.2/sql-createfunction.html">CREATE OR REPLACE FUNCTION</a>&nbsp;;</li>

<li>La déclaration des variables utilisées, sous le bloc DECLARE&nbsp;;</li>

<li>Le corps de la fonction, entre BEGIN et END.</li>

</ul>

<p>On notera que la fonction reverse est catégorisée en tant que «&nbsp;IMMUTABLE&nbsp;», ceci indiquant au SGBD que la fonction ne modifie pas les données et garantit que la fonction retournera toujours le même résultat quand elle est appelée avec les mêmes arguments, condition indispensable à la création d’un index sur fonction. Voir la documentation PostgreSQL « <a href="http://docs.postgresqlfr.org/8.2/xfunc-volatility.html">Catégories de volatilité des fonctions</a> » dans la partie « Étendre le SQL ».</p>

<p>Un essai de la procédure permet de s’assurer de son bon fonctionnement&nbsp;:</p>

<pre>DPAR=# SELECT reverse('Chaîne à renverser');<br />      reverse<br />--------------------<br /> resrevner à enîahC<br />(1 ligne)</pre>

<p>Pour optimiser les recherches par suffixes, il est nécessaire de créer un index sur fonction, sans oublier une collecte des statistiques pour l’optimiseur&nbsp;:</p>

<p class="code">CREATE INDEX reverse_index_prenom

ON personnes (REVERSE(prenom) varchar_pattern_ops);

ANALYZE TABLE personnes;</p>

<p>Ensuite, au lieu d’écrire un prédicat du type « WHERE prenom LIKE ’%mas’», on écrira&nbsp;:</p>

<p class="code">SELECT * FROM personnes WHERE reverse(prenom) LIKE reverse(’%mas’);</p>

<p>PostgreSQL utilisera alors l’index créé précédemment et répondra instantanément. Sur une base de test contenant 4 millions d’enregistrement, les temps de réponse sont passés de 10s à 33ms pour la requête.</p>

<p>La fonction « reverse » pourrait être améliorée, mais l’implémentation décrite a l’avantage de montrer une réalisation simple et donne un exemple d’écriture de fonction pour PostgreSQL. On notera que la fonction renvoie une chaîne vide lorsque la valeur NULL est donnée en entrée. Un autre axe d’amélioration de la vitesse d’exécution serait la réécriture de cette fonction sous forme de fonction native en C couplée au choix d’un algorithme de renversement efficace.</p>

<p><em>Article écrit par Thomas Reiss, publié sur postgresqlfr.org avec sa permission. Merci beaucoup.</em></p>