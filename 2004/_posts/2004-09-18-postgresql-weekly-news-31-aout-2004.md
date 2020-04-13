---
layout: post
title: "PostgreSQL Weekly News - 31 août 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-376 "
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 31 août 2004 ==</h3>

<p>Avec la sortie des versions 7.2.5, 7.3.7 et 7.4.5, tout le monde a remis ses

efforts sur la beta de PostgreSQL 8.0, avec apparemment assez de

ferveurs pour qu'un paquetage beta 2 soit plannifié. Donc, conservez un

œil sur les annonces.</p>

<p>Une nouvelle beta signifie que nous avons terminé certains éléments.

Faisons-en la liste. Un trou mémoire dans la gestion des propriétaires de

ressources lors de transactions longues a été résolu. Quelques problèmes dans

le verrouillage des utilisateurs ont été corrigés. Kill(pid,0) a été porté avec

succès sous Windows. Un «&nbsp;Assert&nbsp;» manquant dans

TransactionIdDidAbort a été ajouté. L'option -D dans pg_ctl est maintenant

propagé au postmaster pour une identification de la ligne de commande. Quelques

problèmes sur les pid avec win32 ont été corrigés. Les problèmes avec la gestion

des CREATE/DROP DATABASE/TABLESPACE lors du relancement d'une séquence de PITR

ont été corrigés. Dernièrement, quelques problèmes avec le code spinlock ont

été résolus.

</p>

<p>Si vous n'avez pas encore téléchargé la beta 1, c'est maintenant le bon

moment pour se préparer pour la beta 2. Assurez-vous de vérifier la liste des

éléments encore ouverts (<a href="ftp://momjian.postgresql.org/pub/postgresql/open_items">

ftp://momjian.postgresql.org/pub/postgresql/open_items</a>) et vérifiez les

notes de sorties inclues dans le nouveau paquetage pour connaître toutes les

nouveautés.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Sortie de PyGreSQL 3.5<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-08/msg00011.php">http:/

/archives.postgresql.org/pgsql-announce/2004-08/msg00011.php</a></li>

<li>Mise à jour du paquetage Cygwin pour postgresql-7.4.5-1<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-08/msg00010.php">http:/

/archives.postgresql.org/pgsql-announce/2004-08/msg00010.php</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>SELECT COUNT(... plaisir dans le pays de PostgreSQL (blog)<br />

<a href="http://www.amber.org/%7Epetrilli/archive/2004/08/27/select_count_fun_in_post%0Agresql_land.html">http://www.amber.org/~petrilli/archive/2004/08/27/select_count_fun_in_postgresql_land.html</a>

</li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, China du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhangh

ai.com/en/index.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Frankfurt, Germany du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 9 août 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>