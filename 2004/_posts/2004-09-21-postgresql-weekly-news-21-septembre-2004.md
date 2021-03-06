---
layout: post
title: "PostgreSQL Weekly News - 21 septembre 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/379"
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 21 septembre 2004 ==</h3>

<p>Les tests de PostgreSQL continuent avec le dernier paquetage beta. Beaucoup

de bogues ont été rapportés, ce qui signifie que nous nous approchons d'une

nouvelle version beta. Ceci est aussi une bonne indication que d'autres nombreux

tests sont nécessaires.</p>

<p>Différents problèmes de compilateur dans plusieurs modules de contribution

pour la partie win32 ont été corrigés . Cela inclut dbase, pgbench, pgcrypto,

tsearch et miscutil. Aussi sur win32, un petit problème de perte mémoire a été

corrigé au niveau de psql et pltcl a vu la résolution de quelques soucis. Pour

les autres modifications, le code de gestion des sous-transactions a été

restructuré pour réduire la consomnation de mémoire, pour adresser un problème

de régression et pour colmater certaines pertes mémoire. Enfin, le support de

GNU/Hurd et GNU/*BSD a été ajouté.

</p>

<p>Le "&nbsp;query-snapshot timing&nbsp;" a été refait de façon à ce que les fonctions volatiles

du mode "&nbsp;READ COMMITTED&nbsp;" voient un aperçu à jour pour chaque commande

de la fonction, plutôt que le dernier aperçu de la commande interactive. C'est une

modification non compatible avec les versions précédentes (à la demande nombreux

utilisateurs), donc il est recommendé aux personnes intéressées par cette fonctionnalité

de tester la prochaine version beta à ce niveau.</p>

<p>La dernière information de cette semaine concerne l'annonce de l'arrivé de

Peter Eisentraut au sein du comité principal de PostgreSQL. Peter est le

principal développeur concernant le front de l'internationalisation et a fourni

un travail remarquable dans le processus de construction et de sortie de

versions. Félicitations, Peter&nbsp;!</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Sortie de Bricolage 1.8.2<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-09/msg00007.php">http://archives.postgresql.org/pgsql-announce/2004-09/msg00007.php</a></li>

<li>Hyperic annonce l'outil de gestion HQ 1.5 pour PostgreSQL 7.x et 8.x<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-09/msg00009.php">http://archives.postgresql.org/pgsql-announce/2004-09/msg00009.php</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>OpenMFG apporte les fonctionnalités ERP avancées aux utilisateurs Mac<br />

<a href="http://www.marketwire.com/mw/release_html_b1?release_id=72594">http://www.marketwire.com/mw/release_html_b1?release_id=72594</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Swiss Open Systems Workshop&nbsp;: Zurich, Suisse, du 5 au 7 octobre<br />

Bruce Momjian fera une présentation lors des trois jours de conférences<br />

<a href="http://www.ch-open.ch/wstage/index.html">http://www.ch-open.ch/wstage/inde

x.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Francfort, Allemagne, du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.<br />

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 21 septembre 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>