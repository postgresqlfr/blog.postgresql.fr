---
layout: post
title: "== Nouvelles Hebdomadaires de PostgreSQL  - 8 Mai  2005 =="
author: "jca"
redirect_from: "index.php?post/drupal-93 "
---


<p><em>Dans son mail du 9 mai 2005, David Fetter nous annonçait sur pg-announce</em></p>

<p><strong>== Nouvelles Hebdomadaires de PostgreSQL  - 8 Mai  2005 ==</strong></p>

<p>Deux bugs majeurs ont été trouvés. Ils ont été corrigés dans les version 7.3.10, 7.4.8 et 8.0.3 à venir. Une correction immédiate pourra être trouvée sur <a href="http://www.postgresql.org/about/news.315" target="_blank">http://www.postgresql.org/about/news.315</a>.

</p>

<!--more-->


Le Groupe de Développement PostgreSQL (PGDG) est sur le point d'effectuer un gel des fonctionnalités qui devrait avoir lieu au mois de juin. Ces nouvelles fonctionnalités incluent le 2-phase commit (NDT: qui est la base des solutions cluster et des systèmes de réplication de type maître/maître), des paramètres OUT multiples, les index bitmap, des verrous partagés sur les lignes, un auto-VACUUM intégré et des corrections sur la gestion des buffer cache pour le SMP (systèmes à multiples processeurs). C'est actuellement le bon moment pour faire part de vos contributions car les hackers ne verraient pas d'un bon oeil le post de mega-patches deux jours juste avant ce gel !

<p>Jan Wieck a trouvé deux cas de concurrence d'accès qui seront corrigés dans Lively. Une longue discussion a eu lieu sur le fait qu'il faille ou non avoir le langage pl/pgsql par défaut, acquérir des licences, Unicode et des paquetages du même style qu'Oracle. Continuez à la faire vivre.

</p>

<p>

Les développeurs PostgreSQL ont découvert un bug dans Fedora Core 3 qui doit être lié à ld.

<a href="http://archives.postgresql.org/pgsql-hackers/2005-05/msg00488.php" target="_blank">http://archives.postgresql.org/pgsql-hackers/2005-05/msg00488.php</a>

</p>

<p>

Andrew Dunstan a ajouté le support des entêtes de colonnes à COPY CSV dans le CVS.

</p>

<p><strong>== Nouvelles autour de PostgreSQL ==</strong></p>

<ul>

<li>Slony-I 1.1 beta2 est sortie, la beta3 ne va pas tarder à suivre. Les nouvelles fonctionnalités incluent la compilation pgxs - il n'est plus nécessaire de disposer des sources. Un problème de concurrence avec les évènements MOVE_SET et ACCEPT_SET a été corrigé et les paquetages RPM et Debian sont disponibles.<a href="http://slony.info/" target="_blank">http://slony.info/</a></li>

<li>phpPgAdmin s'est doté de plusieurs nouvelles fonctionnalités : serveur multiples, architecture à plug-ins, support de Slony. <a href="http://phppgadmin.sourceforge.net/" target="_blank">http://phppgadmin.sourceforge.net/</a></li>

<li>Les paquetages RPM pour pgpool sont disponibles sur <a href="http://pgpool.projects.postgresql.org/" target="_blank">http://pgpool.projects.postgresql.org/</a></li>

<li>

DBLink-TDS est une version très simplifiée du module dblink présent dans contrib. Il est cependant compilé avec la bibliothèque freetds permettant de connecter des bases de données distantes MSSQL. Il est donc possible dès maintenant de rapatrier des tables avec des SELECTs et de manipuler des données avec INSERT/UPDATE/DELETE <a href="http://pgfoundry.org/projects/dblink-tds/" target="_blank">http://pgfoundry.org/projects/dblink-tds/</a>

</li>

<li>

Des modules NSS et PAM sont sortis pour PostgreSQL&nbsp;: <a href="http://sourceforge.net/projects/pam-pgsql/" target="_blank">http://sourceforge.net/projects/pam-pgsql/</a>

</li>

<li>

EMS PostgreSQL Data Export 2.0 est sorti&nbsp;: <a href="http://www.postgresql.org/about/news.317" target="_blank">http://www.postgresql.org/about/news.317</a>

</li>

</ul>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<ul>

<li>PostgreSQL arrive en tête de la compétition "installation et démarrage" entre MySQL 5, Oracle 10g et PostgreSQL 8.

<a href="http://www.suite101.com/article.cfm/oracle/115560" target="_blank">http://www.suite101.com/article.cfm/oracle/115560</a>

</li>

<li>

General TidBits&nbsp;: <a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a>

Arithmétique des tableaux, Aggrégats et Allitérations

</li>

</ul>

<p>

Les nouvelles hebdomadaires de PostgreSQL vous ont été présentées cette semaine par David Fetter et Devrim Gündüz

</p>