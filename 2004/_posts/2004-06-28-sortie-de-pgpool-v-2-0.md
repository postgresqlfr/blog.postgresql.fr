---
layout: post
title: "Sortie de pgpool v.2.0"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-17 "
---



Tatsuo Ishii, sur la liste pgsql-announce@postgresql.org, nous apprenait le 22 juin que pgpool 2.0. était sorti, ci après une traduction de l'annonce:

<p>

La nouvelle version de pgpool, qui est un serveur de connections/réplication pour PostgreSQL, est disponible sur:

</p>

<center>

<a href="ftp://ftp.sra.co.jp/pub/cmd/postgres/pgpool/pgpool-2.0.tar.gz">ftp://ftp.sra.co.jp/pub/cmd/postgres/pgpool/pgpool-2.0.tar.gz

</a>

</center>

<p>

pgpool est serveur de réplication simple basé sur les requêtes et synchrone. Il fait office de serveur proxy entre le client PostgreSQL et le serveur PostgreSQL. Aucune modification applicative est nécessaire pour utiliser pgpool.

</p>

<p>Les fonctionalités de pgpool sont les suivantes:

</p>

<ul>

<li>pooling de connections. Cela réduira la surcharge due à l'établissement des connections;</li>

<li>pre-fork des processus enfants. Comme avec Apache, pgpool fournit ainsi un démarage plus rapide de ses services;</li>

<li>dégénération: dans le mode réplication, is un des serveurs PostgreSQL tombe, pgpool détache le serveur défectueux et continue de fonctionner avec le serveur survivant;</li>

<li>fail-over: dans le mode pooling de connections, si le serveur PostgreSQL maître tombe, pgpool détache le serveur cassé et continue de fonctionner avec le serveur PostgreSQL en Stand-By (NDT: le mot choisi de «Stand By» n'est pas anodin...);</li>

<li>

pgpool 2.0 supporte nativement le protocole V3, ce qui devrait rendre pgpool plus rapide avec PostgreSQL V.7.4 ou supérieur;

</li>

<li>

pgpool 2.0 supporte aussi la répartition de charge (load balancing) entre le serveur maître et le serveur secondaire. Cela améliore considérablement les performances des ordres de type SELECT.

</li>

<p>

Pour plus de détails, veuillez consulter la page du projet:

</p>

<center>

<a href="http://www2b.biglobe.ne.jp/%7Ecaco/pgpool/index-e.html">

http://www2b.biglobe.ne.jp/~caco/pgpool/index-e.html</a>

</center>

<p>

Enjoy,

--

Tatsuo Ishii

</p>

</ul>