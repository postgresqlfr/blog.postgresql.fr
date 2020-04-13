---
layout: post
title: "PostgreSQL Weekly News - 01 novembre 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-380 "
---


<h3>== PostgreSQL Weekly News - 1er novembre 2004 ==</h3>

<p>Après beaucoup d'activité cette dernière semaine, les choses se sont un peu

tassées pour notre première semaine en beta 4. Bien sûr, si vous souhaitez

une stabilisation, c'est probablement un bon signe&nbsp;; voici la liste des

modifications pour cette semaine&nbsp;: les compilations Cygwin sur les fuseaux

horaires ont été corrigées. Maintenant, nous forçons un point de vérification

juste avant de supprimer les fichiers physiques des bases de données, ce qui a

corrigé un problème sur la suppression des bases de données rapporté sur cette

plateforme. Les traces ont été ajustés pour le début et la fin du point de

vérification, pour le recyclage et la suppression des journaux de traces. Un

problème sur les erreurs de conversion lors d'un codage a été corrigé pour COPY.

Une nouvelle méthode pour des threads sûrs améliorés a été ajouté dans le moteur

pour les requêtes annulées et implémentée dans psql, activant l'annulation de

requête dans la version win32 de psql. Enfin, quelques modifications ont eu lieu

pour les types de données timestamp permettant de mieux gérer les décalages de

zone horaire.

</p>

<p>Avec la sortie finale approchant, nous avons aussi besoin de personnes pour

traduire les informations de sortie vers d'autres langues. Les personnes

intéressées devraient jeter un œil à l'appel à l'aide sur les listes de diffusion

cette semaine

(<a href="http://archives.postgresql.org/pgsql-advocacy/2004-11/msg00000.php">http://archives.postgresql.org/pgsql-advocacy/2004-11/msg00000.php</a>) et s'impliquer. Cela ne devrait plus être long maintenant.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL==</h3>

<ul>

<li>PostgreSQL gagne la récompense "Linux New Media Award for Best Database System"

(meilleur système de bases de données)<br />

<a href="http://www.postgresql.org/news/236.html">http://www.postgresql.org/news/236.html</a></li>

<li>Sortie de PgWorksheet 1.4<br />

<a href="http://sourceforge.net/forum/forum.php?forum_id=418688">http://sourceforge.net/forum/forum.php?forum_id=418688</a></li>

</ul>

<h3>== PostgreSQL dans la presse==</h3>

<ul>

<li>Les leçons du Data Warehousing&nbsp;: le moment pour que le Data Warehousing grandisse<br />

<a href="http://www.dmreview.com/article_sub.cfm?articleId=1012461">http://www.dmreview.com/article_sub.cfm?articleId=1012461</a></li>

<li>Installer Bricolage<br />

<a href="http://www.perl.com/pub/a/2004/10/28/bricolage_installation.html">http://www.perl.com/pub/a/2004/10/28/bricolage_installation.html</a></li>

<li>Top cinq des requêtes SQL de WordPress (blog)<br />

<a href="http://joseph.randomnetworks.com/archives/2004/10/28/top-five-wordpress-sql-queries/">http://joseph.randomnetworks.com/archives/2004/10/28/top-five-wordpress-sql-queries/</a></li>

</ul>

<h3>== Evènements autour de PostgreSQL ==</h3>

<ul>

<li>Vanmtagem + Developers 2004&nbsp;: Lisbon, Portugal&nbsp;: du 15 au 19 novembre<br />

Plusieurs sessions au sujet de PostgreSQL, modélisation relationnelle, SQL, et bien plus.<br />

<a href="http://www.v-developers.com">http://www.v-developers.com</a></li>

</ul>

<h3>== PostgreSQL Weekly News - 1er novembre 2004 ==</h3>

Sur le Web&nbsp;:

<a href="http://www.postgresql.org">http://www.postgresql.org</a>