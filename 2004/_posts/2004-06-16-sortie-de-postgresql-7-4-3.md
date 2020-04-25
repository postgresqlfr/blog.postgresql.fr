---
layout: post
title: "Sortie de PostgreSQL 7.4.3"
author: "Jean-Paul Argudo"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/15"
---


<p></p>

<!--more-->


<p>Sur la liste pgsql-announce, Marc G. Fournier nous informait le 15 juin 2004 que :

</p>

<p>

Après que plusieurs corrections soit back-portées sur la branche 7_4_STABLE, nous avons sorti la version 7.4.3. Comme les nouveautés ne sont pas très nombreuses, en voici la liste exhaustive:

</p>

<ul>

<li>Correction d'un bug mémoire lors de l'utilisation d'aggrégats non hashés (Tom)

</li>

<li>

Corrections sur ECPG, dont certains sur la compatibilité avec Informix (Michael)

</li>

<li>

Corrections pour la compilation avec "thread-safety", particulièrement pour Solaris (Bruce)

</li>

<li>

Correction du bug sur COPY IN, qui s'arrêtait lorsqu'on utilisait l'ancien protocole réseau (ljb)

</li>

<li>

Plusieurs corrections importantes dans pg_autovacuum (Matthew T. O'Connor)

</li>

<li>

Corrections d'un bug de lecture de dumps au format tar sur NetBSD et BSD/OS (Bruce)

</li>

<li>

Plusieurs corrections sur JDBC

</li>

<li>

Fix de l'ALTER SEQUENCE RESTART, maintenant la dernière valeur (last_value) vaut la valeur de re-demarrage (restart value) (Tom)

</li>

<li>

Correction sur le re-calcul des sous-requêtes de sélection imbriquées (nested sub-selects) (Tom)

</li>

<li>

Correction des problèmes liés au expressions non-constantes dans les LIMIT et OFFSET

</li>

<li>

Support du FULL JOIN sans clause de jointure, comme un X FULL JOIN Y ON TRUE (Tom)

</li>

<li>

Correction d'un bug sur les tables sans colonnes (zero-column table bug) (Tom)

</li>

<li>

Amélioration de la prise en compte des identifiants non qualifiés dans les clauses GROUP BY dans des sous-requêtes (Tom)

</li>

<li>

Ne pas générer des "NATURAL CROSS JOIN" lorsque l'on décompile les règles (rules) (Tom)

</li>

<li>

Ajout de vérifications sur des longueurs de champs invalides dans le COPY binaire (Tom)

</li>

<li>

Eviter les conflits de vérouillage entre ANALYSE et LISTEN/NOTIFY

</li>

<li>

Nombreuses mises à jours dans les traductions (contributeurs variés)

</li>

<ul>

<p>

Comme d'habitude, cette nouvelle version est disponsible sur tous nos sites mirroirs, que vous trouverez sur:

</p>

<center>

<a href="http://www.postgresql.org/mirrors-www.html">http://www.postgresql.org/mirrors-www.html</a>

</center>

<p>

Et, grâce à David Fetter, elle est aussi disponible via BitTorrent sur:

</p>

<center>

<a href="http://bt.postgresql.org">http://bt.postgresql.org</a>

</center>

<p>

Marc G. Fournier

</p>

</ul></ul>