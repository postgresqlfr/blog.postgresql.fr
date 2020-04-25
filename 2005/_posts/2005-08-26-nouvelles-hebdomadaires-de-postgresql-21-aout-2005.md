---
layout: post
title: "== Nouvelles hebdomadaires de PostgreSQL -  21 Août 2005 =="
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/103"
---


<p><strong>== Nouvelles hebdomadaires de PostgreSQL -  21 Août 2005 ==</strong></p>

<p><em>PostgreSQL Weekly News a été rédigé par  David Fetter et Andrew Dunstan et posté sur la liste pg-announce</em></p>

<p>

Greg Sabino Mullane a trouvé un bug tordu dans PL/Perl, et la correction est encore plus tordue.

<a target="_blank" href="http://archives.postgresql.org/pgsql-bugs/2005-08/msg00133.php">http://archives.postgresql.org/pgsql-bugs/2005-08/msg00133.php</a></p>

<!--more-->


Andrew Dunstan a trouvé un bug dans IPv6 sur Windows et Chuck McDevitt de

Greenplum va essayer de faire une mise à jour cette semaine.

<p>La version 8.1 s'approche de la version beta. Les nouvelles fonctionnalités incluent :

</p>

<ul>

<li> Autovacuum a été déplacé du répertoire contrib/ pour faire partie intégrante du serveur,</li>

<li> Amélioration de la performance SMP afin de permettre la suppression de verrous globaux sur la mémoire partagée,</li>

<li> Indexation <em>Bitmap</em>,</li>

<li><em>2-phase commit</em>,</li>

<li> Introduction des paramètres OUT et INOUT dans les fonctions,</li>

<li> Amélioration de PL/Perl,</li>

<li> Verrous partagés sur les lignes,</li>

</ul>

Un grand merci à tous ceux qui nous ont aidé à ce que tout ceci puisse se faire. Nous vous demandons donc de tester activement tout ceci.

<p>

Des versions de mise à jour pour les versions  8.0, 7.4, 7.3 et probablement 7.2 seront disponibles d'ici une à deux semaines. Vérifiez bien si ces mises à jour vous concernent et, dans le doute, mettez à jour à la dernière version disponible dans la gamme que vous utilisez.

</p>

<p><strong>== Nouvelles des produits autour de PostgreSQL ==</strong></p>

<ul>

<li>phpPgAdmin 3.5.5 est sorti, avec un grand nombre de corrections de bug.<a target="_blank" href="http://phppgadmin.sourceforge.net/">http://phppgadmin.sourceforge.net/</a>

</li>

<li>

AM Software Design a sorti la version 1.1 de PG Lightning Admin <a target="_blank" href="http://www.amsoftwaredesign.com/lightning_admin.php">http://www.amsoftwaredesign.com/lightning_admin.php</a>

</li>

</ul>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<ul>

<li>Un système de détection de fraude a gagné le prix 2005 Eureka  Science Prize Australien <a target="_blank" href="http://www.amonline.net.au/eureka/communications_technology/2005_winner.htm">http://www.amonline.net.au/eureka/communications_technology/2005_winner.htm</a></li>

<li>General Bits: <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a> trouver le type d'une colone</li>

</ul>