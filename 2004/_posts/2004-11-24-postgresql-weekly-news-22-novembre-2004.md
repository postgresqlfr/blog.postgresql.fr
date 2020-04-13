---
layout: post
title: "PostgreSQL Weekly News - 22 novembre 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-382 "
---


<h2>== PostgreSQL Weekly News - 22 novembre 2004 ==</h2>

<p>Après un mois de développement, cette semaine a vu l'arrivée de la beta 5 de

PostgreSQL 8.0.0. Elle devrait être disponible sur votre miroir local et sur le

site bittorrent. Pour plus d'informations, consultez l'annonce officielle (<a href="http://archives.postgresql.org/pgsql-announce/2004-11/msg00005.php">http:/

/archives.postgresql.org/pgsql-announce/2004-11/msg00005.php</a>). Les

personnes testant les versions natives pour Windows et Cygwin devraient aussi

attendre ces nouvelles constructions.</p>

<p>Étant donné la date tardive de notre processus de tests beta, nous avons

corrigé un bon nombre de problème la semaine dernière. Les problèmes de la

plateforme win32 avec les signaux et les sockets ont été résolus. Quelques

scénarios de plantage du serveur ont été corrigés&nbsp;; le premier impliquait

la création de tables de plus de 65K colonnes et le second se produisait lors

du traitement de requêtes de sélection comprenant plus de 65K d'entrées de

liste. La taille par défaut de la table de hachage des verrous locaux a été

réduit, accélérant l'entrée et la sortie des sous-transactions. Le calcul des

statistiques a été déplacé pour se produire au moment de la validation d'une

transaction, évitant ainsi la confusion lorsqu'une transaction de mise à jour

est en exécution depuis longtemps. Quelques nouvelles options ont été ajoutées

à pg_autovacuum pour supporter la configuration des paramètres

cost-based-vacuum différement de leurs valeurs par défaut. Les mises à jour de

pg_database sont maintenant effectuées directement sur disque après un

ALTER DATABASE, évitant des scénarios où un serveur arrivant ne trouve aucune

copie de la ligne de la base de données.

</p>

<p>La gestion de Plpgsql pour les exécutions de SPI lors d'un bloc d'exception

a été modifié pour continuer avec l'utilisation de l'ancienne connexion plutôt

que le lancement d'une nouvelle connexion SPI. Ceci a aussi corrigé quelques

problèmes de gestion de mémoire, récemment rapportés. Plusieurs corrections

sont aussi intervenues dans plperl, incluant le nettoyage de quelques

messages d'avertissement du compilateur, la consolidation de code dupliqué,

l'amélioration de vérification du type de données renvoyé par perl,

l'ajustement des restrictions de sécurité et la modification de la gestion des

erreurs dans les fonctions.</p>

<!--more-->


<h2>== Nouveaux produits autour de PostgreSQL ==</h2>

<ul>

<li>Outil de synchronisation de Daffodil Software Open Sources sur

SourceForge.net<br /><a href="http://www.daffodildb.com/daffodil-opensources-news.html">http://www.daffo

dildb.com/daffodil-opensources-news.html</a></li>

<li>LatinSecurity AwakE v3.1<br /></li>

<li>FmPro Migrator 2.57 édition Enterprise<br /><a href="http://www.prweb.com/releases/2004/11/prwebxml179639.php">

http://www.prweb.com/releases/2004/11/prwebxml179639.php</a></li>

<li>ANN: DBManager 3.0<br />

</li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Introduction à Slony<br /><a href="http://www.onlamp.com/pub/a/onlamp/2004/11/18/slony.html">

http://www.onlamp.com/pub/a/onlamp/2004/11/18/slony.html</a></li>

<li>SDForum : L'open source devient la première option<br /><a href="http://www.computerworld.com.au/index.php/id;1747676449;fp;16;fpid;0">

http://www.computerworld.com.au/index.php/id;1747676449;fp;16;fpid;0</a></li>

<li>PostgreSQL vs. MySQL - une vision subjective (blog)<br /><a href="http://www.gnegg.ch/archives/prosgresql_vs_mysql_a_subjective_view.html">

http://www.gnegg.ch/archives/prosgresql_vs_mysql_a_subjective_view.html</a></li>

</ul>

<h2>== Événements PostgreSQL ==</h2>

<ul>

<li>PostgreSQL Seminar&nbsp;: Ankura, Turquie&nbsp;: 1er décembre<br />

Devrim Gunduz présentera un séminaire sur les nouvelles fonctionnalités de

PostgreSQL 8.0<br />

<a href="http://seminer.linux.org.tr">http://seminer.linux.org.tr</a></li>

</ul>

<h2>== PostgreSQL Weekly News - 22 novembre 2004 ==</h2>

<p>Sur le Web&nbsp;:</p>

<a href="http://www.postgresql.org">http://www.postgresql.org</a>