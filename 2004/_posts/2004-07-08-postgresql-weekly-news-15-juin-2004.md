---
layout: post
title: "PostgreSQL Weekly News - 15 juin 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-370 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 15 juin 2004 ==</h2>

<p>La bonne nouvelle de la semaine a été la sortie de la version 7.4.3 de PostgreSQL aujourd'hui. Il devrait bientôt arriver sur votre miroir FTP local s'il n'y est pas déjà ou vous pouvez le télécharger via BitTorrent (<a href="http://bt.postgresql.org/">http://bt.postgresql.org/</a>)

si vous préférez. Les notes de sortie sont incluses dans l'annonce complète, disponible sur <a href="http://www.postgresql.org/news/200.html">http://www.postgresql.org/news/200.html</a>

et, pour rappel, ceux mettant à jour à partir d'une autre version 7.4.x de PostgreSQL n'ont pas besoin de sauvegarder et restaurer.

</p>

<p>Revenons au monde de la 7.5, nous sommes une semaine plus proche de

la date de gel des fonctionnalités et il reste beaucoup de travail en

cours pour que les développeurs terminent leurs correctifs avant la

bêta. La liste des modifications qui en font partie est relativement

courte, donc faisons un tour rapide. Des temps de démarrage/arrêt ont

été ajouté à pg_dump/pg_dumpall lors l'option --verbose est utilisée.

Le support de l'affectation des sous-champs de colonnes composites pour

les instructions UPDATE et INSERT a été ajouté. Ceci permet aussi la

mise à jour d'un élément de la valeur d'un tableau qui est NULL mais

produisant un résultat non NULL. La plannification d'instructions sans

nom via le protocole étendu de requêtes a profité de quelques

optimisations pour améliorer la qualité du plan lors de l'utilisation

de paramètres hors-ligne au lieu de valeurs littérales. Les types de

données inet/cidr ont eu leur propre fonction hash qui ignore le bit de

type inet/cdir, permettant leur utilisation correcte dans des jointures

et des aggrégations hâchées.</p>

<p>Une dernière note, une version brésilienne de la FAQ a été ajouté au

CVS et sur le site web, merci à Euler Taveira de Oliveira. Toutes nos

FAQ sont disponibles sur <a href="http://www.postgresql.org/docs/#faqs">http://www.postgresql.org/docs/#faqs</a>

et nous sommes toujours à la recherche de nouvelles traductions au cas où celle-ci n'existerait pas dans votre langue.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Mise à jour du paquetage Cygwin&nbsp;: postgresql-7.4.2-1<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-06/msg00007.php">http://archives.postgresql.org/pgsql-announce/2004-06/msg00007.php</a></li>

<li>Pilote PostgreSQL natif pour OpenOffice.org<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-06/msg00008.php">http://archives.postgresql.org/pgsql-announce/2004-06/msg00008.php</a></li>

<li>Sortie de pqa v1.1<br />

<a href="http://pgfoundry.org/forum/forum.php?forum_id=98">http://pgfoundry.org/forum/forum.php?forum_id=98</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Une interview avec Jim Wilson<br />

<a href="http://techdocs.postgresql.org/techdocs/interview-wilson.php">

http://techdocs.postgresql.org/techdocs/interview-wilson.php</a></li>

<li>Non compréhension des transactions<br />

<a href="http://mark.aufflick.com/dev-blog/one-entry?entry%5fid=1498">

http://mark.aufflick.com/dev-blog/one-entry?entry%5fid=1498</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>LinuxTag 2004&nbsp;: Karlsruhe, Allemagne&nbsp;: du 23 au 26 juin<br />

Il y aura plusieurs présentations PostgreSQL<br />

<a href="http://www.postgresql.org/events/195.html">http://www.postgresql.org/events/195.html</a>

</li>

<li>European Regional Open Source Conference : Yerevan, Arménie: du 28 au 30

juin<br />

Bruce Momjian parlera à la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 1er juin 2004 ==</h2>

<p>N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain</p>

<p>Liste de diffusion générale <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>Sur le web :

</p>

<ul>

<li><a href="http://www.postgresql.org">http://www.postgresql.org</a></li>

<li><a href="http://advocacy.postgresql.org">http://advocacy.postgresql.org</a></li>

</ul>