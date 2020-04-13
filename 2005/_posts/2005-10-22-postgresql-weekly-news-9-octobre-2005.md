---
layout: post
title: "== PostgreSQL Weekly News - 9 octobre 2005 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-125 "
---


<p>Les nouvelles versions 8.0.4, 7.4.9 et 7.3.11 sont sorties et corrigent des bugs. Veuillez mettre à jour vos serveurs aussi vite que possible. Notez que la version 7.2 n'a pas été mise à jour, et ne sera désormais plus supportée par la communauté.</p>

<p>Il y a eu une longue discussion pour accélerer les tris externes (tris dans requêtes, merge joins et création d'index qui sollicitent le disque). Elle a amenée plusieurs pistes, dont de nouveaux algorithmes de tris, micro-optimisation, allocation de mémoire pour les tris et optimisation sur les entrées/sorties disques. Tom Lane et Simon Riggs ont joint leurs efforts pour produire un nouveau patch avec une nouvelle variable générale de configuration, à l'attention des développeurs: "trace_sort" qui permet de mesurer l'utilisation des ressources pour lors des tris externes. Merci de bien vouloir tester cette option, si vous savez comment le faire.</p>

<!--more-->


Merci de participer aussi à ce sondage&nbsp;: Où vous procurez-vous PostgreSQL&nbsp;? (<a href="http://www.postgresql.org/community/" target="_blank">http://www.postgresql.org/community/</a>).

<p>Le travail sur les traductions du backend sont en cours pour la version 8.1. Si vous voulez participer à l'effort de traduction, merci de faire un tour sur la page du projet de traduction&nbsp;: <a href="http://pgfoundry.org/projects/pgtranslation/" target="_&quot;blank&quot;">http://pgfoundry.org/projects/pgtranslation/</a></p>

<p>Le kit de presse pour la version 8.1 est en cours de rédaction. Merci de vous rapprocher de la liste de diffusion <a href="http://archives.postgresql.org/pgsql-advocacy/" target="_blank">http://archives.postgresql.org/pgsql-advocacy/</a>, si vous voulez y participer. Des traducteurs seront nécessaires pour traduire le kit de presse d'ici une semaine.</p>

<h3>== Produits autour de PostgreSQL ==</h3>

<p>Christopher Kings-Lynne cherche de l'aide pour le futur phpPgAdmin 4.0. Merci de le contacter par courriel (<a href="mailto:chriskl@users.sf.net">chriskl@users.sf.net</a>), si cela vous intéresse.</p>

<p>Veil est un add-on de sécurité pour PostgreSQL. Les bases de données peuvnt être créées avec un contrôle d'accès efficace au niveau des tuples: différents utilisateurs peuvent ainsi accéder à différents sous-ensembles de données. Voir le site du projet&nbsp;: <a href="http://pgfoundry.org/projects/veil" target="_blank">http://pgfoundry.org/projects/veil/</a>. La documentation est disponible à cette adresse&nbsp;: <a href="http://veil.projects.postgresql.org/curdocs/index.html" target="_blank">http://veil.projects.postgresql.org/curdocs/index.html</a></p>

<p>Sortie de Rekall version 2.4.0&nbsp;:<a href="http://www.rekallrevealed.org/" target="_blank">http://www.rekallrevealed.org/</a></p>

<h3>== Nouvelles autour de PostgreSQL ==</h3>

<p>Josh Berkus, Peter Eisentraut et Gavin Sherry seront conférenciers au OpenDBCon&nbsp;:<a href="http://www.opendbcon.net/" target="_blank">http://www.opendbcon.net/</a></p>

<p>Linux-Info-Tag Dresden 2005 (Allemagne)&nbsp;:<a href="http://www.linux-info-tag.de/" target="_blank">http://www.linux-info-tag.de/</a></p>

<p>Planet PostgreSQL (aggrégation de blogs de hackers PostgreSQL)&nbsp;: <a href="http://www.planetpostgresql.org/" target="_blank">http://www.planetpostgresql.org/</a></p>

<p>General Bits&nbsp;:<a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a><br /> Nouveaux articles: Les anniversaires avec to_char() et Restoration de tables par Sed Trickery</p>

<p>Ce "PostgreSQL Weekly News" vous a été rédigé cette semaine par David Fetter, Josh Berkus, Darcy Buskermolen, Andreas 'ads' Scherbaum et Robert Treat. Traduit de l'anglais et mis en page par Jean-Paul Argudo.</p>