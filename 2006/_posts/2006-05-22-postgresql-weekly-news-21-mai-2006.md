---
layout: post
title: "== PostgreSQL Weekly News - 21 mai 2006 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-184 "
---


<p>

Les mises à jour de sécurité 8.1.4, 8.0.8, 7.4.13 et 7.3.15 sortiront très bientôt, soyez prêts à mettre à jour dès que possible&nbsp;!</p>

<p>

Il y a eu des discussions sur comment améliorer les manipulations de chaînes de caractères, ajouter de la mémoire partagée pour les projets connexes ou bien encore sur comment utiliser la compression pour améliorer les tris sur disque.

</p>

<p>

Alvaro Herrera a commité deux patches à autovacuum. Le premier nous

permet de voir s'exécuter un autovacuum dans la vue pg_stat_activity, y

compris la table sur laquelle il est actuellement en train de

travailler. L'autre, de Larry Rosenman, ajoute quatre colonnes au vues

pg_stat_*_tables, qui nous permettent de savoir quand les vacuum et

analyze ont été exécutés pour chacune des tables. On y apprend aussi si

le vacuum a été exécuté manuellement ou via autovacuum.

</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>

Sortie de pgFouine 0.6:

<a href="http://pgfoundry.org/projects/pgfouine/" target="_blank">http://pgfoundry.org/projects/pgfouine/</a>

</p>

<p>

Sortie de ODBCng 0.99 pour linux:

<a href="http://projects.commandprompt.com/public/odbcng" target="_blank">http://projects.commandprompt.com/public/odbcng</a>

</p>

<p>

Command Prompt a formé une équipe avec Covalent:

<a href="http://www.prweb.com/releases/2006/5/prweb387246.htm" target="_blank">http://www.prweb.com/releases/2006/5/prweb387246.htm</a>

</p>

<p>

Sortie de Navicat 6.1.5 pour OS X:

<a href="http://pgsql.navicat.com/" target="_blank">http://pgsql.navicat.com/</a>

</p>

<p>

Sortie de PgPool 3.0.2:

<a href="http://pgfoundry.org/projects/pgpool/" target="_blank">http://pgfoundry.org/projects/pgpool/</a>

</p>

<h3>== Les boulots PostgreSQL pour Mai ==</h3>

<p>

<a href="http://archives.postgresql.org/pgsql-jobs/2006-05/threads.php" target="_blank">http://archives.postgresql.org/pgsql-jobs/2006-05/threads.php</a>

</p>

<h3>== PostgreSQL dans l'actualité ==</h3>

<p>

Thomas Friedman qualifie PostgreSQL de technologie disruptive (souscription requise):

<a href="http://select.nytimes.com/2006/05/19/opinion/19friedman.html?emc=eta1" target="_blank">http://select.nytimes.com/2006/05/19/opinion/19friedman.html?emc=eta1</a>

</p>

<p>

On trouve de manière bien dissimulée dans cet article, deux sociétés qui utilisent PostgreSQL:

<a href="http://www.technewsworld.com/story/50405.html" target="_blank">http://www.technewsworld.com/story/50405.html</a>

</p>

<p>

Planet PostgreSQL: <a href="http://www.planetpostgresql.org/" target="_blank">http://www.planetpostgresql.org/</a>

</p>

<p>

General Bits, archives et nouveaux articles occasionnels: <a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a>

</p>

<p>

PostgreSQL Weekly News a été rédigé cette semaine par David Fetter, Josh Berkus, Alvaro Herrera, Larry Rosenman et Robert Treat

</p>