---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 janvier 2006"
author: "Sebastien Lardiere"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/156"
---


<h2>Nouvelles hebdomadaires de PostgreSQL - 29 janvier 2006</h2>

<p>Stephan Vollmer a rapporté de mauvaises performances d'indexation GiST avec tsearch2. Tom Lane et Martijn van Oosterhout ont enquêté et, après quelques discussions sur la liste performances, ils ont identifié une fonction de comptage de bit comme coupable. Tom a intégré une implémentation alternative utilisant une table de recherche statique pour de nombreux modules de contribution (intarray, ltree, trgm and tsearch2), implémentation qui amène une amélioration d'un facteur 20 pour les grands index. Une discussion a suivi pour des améliorations supplémentaires à propos de l'algorithme « picksplit » pour un gain par 10 mais elle n'a pas abouti sur une solution, du moins pour la branche 8.1.

</p>

<p>Andrew Dunstan a publié un <a href="http://www.onlamp.com/pub/a/databases/2006/01/19/more-perl-in-postgresql.html">article</a> sur PL/Perl.</p>

<!--more-->


<h3>Nouvelles des produits autour de PostgreSQL</h3>

<ul><li>Continuent a livré <a href="http://continuent.com/index.php?option=com_content&amp;task=view&amp;id=212&amp;Itemid=169">p/Cluster</a>, un multiplexeur de requètes pour PostgreSQL</li>

<li>Bricolage 1.8.9 et 1.10.0 sont <a href="http://www.bricolage.cc/">sortis</a>, avec de nombreux bogues résolus, et de nouvelles caractéristiques.</li>

<li>Slony 1.1.5 est <a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=260">sorti</a>, maintenant compatible avec 8.1, et de nombreux bogues résolus.</li>

<li>Des <a href="http://pgfoundry.org/projects/solarispackages/">paquets Solaris</a> officiels ont été livrés. Kudos à Devrim Gunduz et Josh Berkus pour leur dur travail sur le sujet.</li>

</ul>

<h3>PostgreSQL Local</h3>

<p>Cette semaine, tout n'est pas si mondial. L'association PostgreSQLFr est présente au salon Solution Linux 2006, le 31 janvier et les 1er et 2 février à Paris (La Défense). Garry Shavin y présente Slony-II, solution de réplication maître-maître pour PostgreSQL.</p>

<h3>PostgreSQL dans la presse</h3>

<ul><li><a href="http://www.planetpostgresql.org/">planet PostgreSQL</a></li>

<li>General Bits, publié le lundi : <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>. Votez pour votre  « General Bits » préféré, et organisez la mise à jour de vos schémas.</li>

</ul>

<p><em>Ces nouvelles hebdomadaires de PostgreSQL vous sont fournis  cette semaine par David Fetter et Bernhard (bkw) Weisshuhn. (NDT, plus un ajout à propos de SL2006).</em></p>