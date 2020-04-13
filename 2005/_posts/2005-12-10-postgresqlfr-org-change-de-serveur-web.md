---
layout: post
title: "PostgreSQLFr.org change de serveur Web"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-142 "
---


<p></p>

<!--more-->


<p>L'ancien serveur de PostgreSQLFr.org étant arrivé en fin de cycle de vie, <a href="http://www.dalibo.com" target="_blank">notre hébergeur</a> a migré le site et les services annexes de celui-ci sur une nouvelle machine. Elle est relativement performante, et la navigation dans le site s'en ressent.</p>

<p>Voici les caractéristiques principales de la machine&nbsp;:

</p>

<ul>

<li>HP Proliant DL360 (1U)

</li>

<li>Bi-Xeon 3GHz

</li>

<li>2Go de Ram

</li>

<li>2 x 146G 10Krpms en Ultra SCSI 320 et en Raid 1 (Compaq Smart Array 64xx)

</li>

</ul>

<p>Au passage, nous avons migré la base de données PostgreSQL 8.0 de notre Drupal 4.5.3-4 à la version 8.1</p>

<p>Le pooling de connexions est assuré par <a href="http://pgpool.projects.postgresql.org/" target="_blank">pgpool</a>. Nous envisageons de répliquer l'ensemble du site rapidement grâce à <a href="http://gborg.postgresql.org/project/slony1/projdisplay.php" target="_blank">Slony-I</a>.</p>

<p>Nous vous souhaitons une agréable navigation sur www.PostgreSQLFr.org&nbsp;!</p>