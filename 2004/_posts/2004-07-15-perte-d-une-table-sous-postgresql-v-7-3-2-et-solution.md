---
layout: post
title: "Perte d&#39;une table sous PostgreSQL V.7.3.2... et solution!"
author: "jca"
redirect_from: "index.php?post/drupal-19 "
---


<p></p>

<!--more-->


<h3>L'histoire initiale</h3>

<p>

Ce matin, en ouvrant ma boite aux lettres, un compte rendu de monitoring m'a alerté qu'une des machines chez un client était surchargée (2.57). Il s'agit d'une base relativement petite mais où l'on fait d'énorme quantité de INSERT, UPDATE et DELETE. Il s'agit d'une base PostgreSQL 7.3.2.</p>

<p>

Je me suis immédiatement connecté pour voir de quelle nature était le mal. Ma base avait énormément grossi:

</p>

<p>

<verbatim>

du -sh /var/lib/pgsql/data/base/<identifiant de="" la="" base="">/*

</identifiant>

m'a permi d'avoir l'information sur la taille des objets de la base les plus imposants au niveau table. (La base grossit, pourtant je fais souvent des VACUUM depuis quelques versions de notre logiciel).</verbatim></p>

<p>

En lançant un =psql= sur ma base, j'ai lancé les requêtes usuelles sur =pg_class= pour connaitre les tables en question:<br />

<verbatim>

mydb# &gt; SELECT relname FROM pg_class WHERE relfilenode IN (liste des nom des fichiers inciminés séparés par une virgule);

</verbatim>

</p>

<p>

Les vainqueurs à cette course à la taille étaient =pg_attribute_relid_attnam_index= et =pg_attribute=. En faisant une petite recherche sur la doc de postgresql on trouve les pages suivantes:</p>

<ul>

<li>http://traduc.postgresqlfr.org/pgsql-fr/catalog-pg-attribute.html pour pg_attribute</li>

<li>et quelques autres pages traitant du sujet</li>

</ul>

<p>

En fait =pg_attribute= et =pg_attribute_relid_attnam_index= sont respectivement une table système (transversale à toutes les bases de données) et un index sur cette table.</p>

<p>

Aprés lecture des divers points sur le sujet, ces tables grossissent si à un moment donné, des vacuum n'ont pas été faits et qu'aucune action correctrice n'a été mise en oeuvre. Il est nécessaire de lancer PostgreSQL en single user et de procéder à une restitution de la place : il faut faire un =VACUUM= sur la table =pg_attribute= et un =REINDEX= de l'index =pg_attribute_relid_attnam_index=. Pour celà il faut:</p>

<ul>

<li>Stopper les applis utilisant PostgreSQL</li>

<li>Stopper Postgresql (le nom du script dépend de votre système et de vous aussi)<br />

<verbatim>

# /etc/init.d/pgsql stop

</verbatim>

</li>

<li>Lancer PostgreSQL en mode Single User, en ayant la possibilité de modifier les tables et index système:<br />

<verbatim>

# su - postgres

$ export PGDATA=/path/vers/votre/entrepot/de/données

$ postgres -D $PGDATA -O -P <votre base="">

(...)

backend&gt;

</votre>

</verbatim></li>

</ul>

<h3>Ce qu'il ne fallait pas faire</h3>

<p>

C'est à partir de ce moment qu'on rentre dans ce qu'il ne fallait pas faire (je vous rassure, rien n'est fatal pour vos données). J'ai d'abord lancé une réindexation:<br />

<verbatim>

backend&gt; REINDEX DATABASE mydb FORCE;

</verbatim>

Ca prend un certain temps. Tous les index de toutes les tables accessibles depuis la base de données sont réindexées (y compris les tables système).</p>

<p>

J'ai lancé un =VACUUM= sur la base:<br />

<verbatim>

backend&gt; VACUUM FULL ANALYZE mydb ;

</verbatim>

Là aussi celà a pris un certain temps. Mais au bout de mes peines, était sensées se trouver performance et taille réduite pour mon serveur.

Pour sortir du mode single user un =Ctrl-D= suffit.</p>

<p>

J'ai relancé mon postmaster :<br />

<verbatim>

# /etc/init.d/pgsql start

</verbatim>

</p>

<p>

Je n'ai eu aucun message particulier dans le log de PostgreSQL. Je lance une ligne de commande sur la base puis une sélection sur une des tables et là, catastrophe :<br />

<verbatim>

# psql mydb -U myuser

Welcome to psql 7.3.2, the PostgreSQL interactive terminal.

Type:  \copyright for distribution terms

\h for help with SQL commands

\? for help on internal slash commands

\g or terminate with semicolon to execute query

\q to quit

mydb=# SELECT * FROM mytable;

No table "mytable" found

</verbatim>

</p>

<p>

Je regarde dans la table =pg_class= pour savoir si la table existe toujours ou pas.<br />

<verbatim>

SELECT * FROM pg_class WHERE relname='mytable';

</verbatim>

ne me renvoie rien alors qu'un<br />

<verbatim>SELECT * FROM pg_class WHERE relname~'mytable';</verbatim> me retourne bien ma table... </p>

<p>

De ce point de vue, il s'averrait que j'avais bien perdu mes données! Au passage, je ne saurais trop vous conseiller de *faire un backup systèmatique lorsque vous faites une opération de maintenance* (voir pg_dump, pour plus d'informations).</p>

<p>

J'ai décidé de retourner en mode single-user.

Un =SELECT * FROM mytable;= me renvoie bien les données! Donc je n'ai rien perdu, mes données sont là, mais inaccessible en mode multi-user! Que s'est-il donc passé?</p>

<h3>Dénouement</h3>

<p>

En fait, aprés avoir stressé le chan #postgresqlfr (merci Jean-Paul d'avoir été à mon écoute sur ce point) et navigué sur les listes de PostgreSQL, il apparaît qu'il soit nécessaire de faire *en premier* le =VACUUM FULL ANALYZE <nom db="">; *puis* =REINDEX DATABASE <nom db=""> FORCE;= en mode single user. Une fois cette opération effectuée et le mode multiuser relancé, les données sont de nouveau accessibles.</nom></nom></p>

<p>

Pour plus d'information, je vous recommande la lecture de la documentation de REINDEX et notamment la fin de la page <a href="http://www.postgresql.org/docs/7.3/static/sql-reindex.html">http://www.postgresql.org/docs/7.3/static/sql-reindex.html</a> ou <a href="http://traduc.postgresqlfr.org/pgsql-fr/sql-reindex.html">http://traduc.postgresqlfr.org/pgsql-fr/sql-reindex.html</a>

</p>

<p>

Un point important aussi : je ne pense pas que cela puisse arriver avec PostgreSQL 7.4 et supérieure, les vacuum étant automatiques.</p>