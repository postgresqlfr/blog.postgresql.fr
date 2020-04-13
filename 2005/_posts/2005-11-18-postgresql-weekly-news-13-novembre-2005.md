---
layout: post
title: "== PostgreSQL Weekly News - 13 novembre 2005 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-134 "
---


<p>

PostgreSQL v.8.1 est sorti :-) Vous trouverez tous les détails ici:<br />

<a href="http://www.postgresql.org/docs/whatsnew" target="_blank">http://www.postgresql.org/docs/whatsnew</a></p>

<p>PostgreSQL 8.1.0 est désormais présent dans l'arbre des "ports" OpenBSD</p>

<p>Teodor Sigaev a ajouté nombre d'améliorations à tsearch2, qui est un moteur de recherche plein texte.</p>

<p>Il y a eu des discussions très animées sur la liste de diffusion pgsql-hackers au sujet de MERGE et des index multi-tables. Espérons que cela continue&nbsp;!

</p>

<p>Les gens de SRA (NDT: Software Research Associates, une des grosses

compagnies supportant PostgreSQL) ont spammé une publicité à une liste

de courriels qu'ils avaient récupérés. Bien qu'il se soient rapidement

excusés de l'avoir envoyée à la mauvaise liste, ils doivent toujours

démolir la liste de courriels collectés et ne plus jamais en faire une

autre.</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>Sortie de Wikipgedia v.0.0.2 (NDT: Wikipédia tourne sous MySQL depuis le début, mais montre de nombreux signes de faiblesse. Il a donc été décidé de faire un "port" vers PostgreSQL...):<br /><a href="http://pgfoundry.org/projects/wikipedia/" target="_blank">http://pgfoundry.org/projects/wikipedia/</a></p>

<p>Sortie de PL/sh v.1.2:<br /><a href="http://pgfoundry.org/projects/plsh/" target="_blank">http://pgfoundry.org/projects/plsh/</a></p>

<p>Greenplum a sorti Bizgres MPP en Beta. (NDT: Bizgres est une solution complète de Business Intelligence, bâtie autour de plusieurs modules Open Source (un loader de données de masse, un datawarehouse bâti sur PostgreSQL, une base cube/hypercube, un générateur d'états, etc..):<br /><a href="http://www.greenplum.com/mpp-beta/" target="_blank">http://www.greenplum.com/mpp-beta/</a></p>

<p>Sortie de pgPool v.2.6.5 (NDT: pgPool est un pooler de connexion, avec des fonctionalités de type load-balancing, il supporte aussi Slony-I, avec une base maître et un esclave):<br />

<a href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></p>

<p>Le projet PostgreSQL RPM a construit des RPMs pour plusieurs plates-formes:<br />

<a href="http://archives.postgresql.org/pgsql-announce/2005-11/msg00017.php" target="_blank">http://archives.postgresql.org/pgsql-announce/2005-11/msg00017.php</a><br />

Ce projet a aussi sorti un document sur comment installer les RPMs de PostgreSQL sur des machines Red Hat ou Fedora Core:<br /><a href="http://pgfoundry.org/docman/?group_id=1000048" target="_blank">http://pgfoundry.org/docman/?group_id=1000048</a></p>

<p>Slony-I 1.1 a été adapté pour supporter la version 8.1 de PostgreSQL. Il n'y a pas de backport de cette modification pour Slony-I 1.0, vous devrez donc upgrader.</p>

<p>psqlODBC 08.01.0100 est sorti:(NDT: d'énomes modifications ont été faites sur le driver ODBC, je vous engage à le tester rapidement):<br /><a href="http://www.postgresql.org/about/news.418" target="_blank">http://www.postgresql.org/about/news.418</a></p>

<p>pgAdmin 1.4.0 est sorti (NDT: tout comme pour psqlODBC, les améliorations apportées par cette nouvelle version sont conséquentes, avec entre autres, le support de Slony-I&nbsp;!):<br />

<a href="http://www.postgresql.org/ftp/pgadmin3/beta/" target="_blank">http://www.postgresql.org/ftp/pgadmin3/beta/</a></p>

<h3>== PostgreSQL Local ==</h3>

<p>La page des utilisateurs Turcs de PostgreSQL est ouverte&nbsp;!<br /><a href="http://www.PostgreSQL.org.tr" target="_blank">http://www.PostgreSQL.org.tr</a><br />

<strong>Toute l'équipe de PostgreSQLFr souhaite bienvenue et longue vie à nos homologues Turcs&nbsp;!</strong></p>

<h3>== PostgreSQL dans l'actualité ==</h3>

<p>Andrew Dunstan a publié un article sur l'utilisation de Perl avec PostgreSQL:<br />

<a href="http://www.oreillynet.com/pub/a/databases/2005/11/10/using-perl-in-postgresql.html" target="_blank">http://www.oreillynet.com/pub/a/databases/2005/11/10/using-perl-in-postgresql.html</a></p>

<p>Planet PostgreSQL: <a href="http://www.planetpostgresql.org/" target="_blank">http://www.planetpostgresql.org/</a></p>

<p>General Bits, est publié les Lundi: <a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a></p>

<p><small>Ce numéro des Nouvelles Hebdomadaires de PostgreSQL a été rédigé par David Fetter et Devrim Gunduz. Il a été traduit de l'anglais et commenté par Jean-Paul Argudo.</small></p>