---
layout: post
title: "PostgreSQL Weekly News - 13 septembre 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/378"
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 13 septembre 2004 ==</h3>

<p>Une rapide mise à jour cette semaine car la chasse aux bogues continue sur

le paquetage de la beta 2 de PostgreSQL 8.0. Les personnes curieuses de

connaître les élémentes encore ouverts peuvent lire la liste la plus à jour sur

<a href="http://candle.pha.pa.us/cgi-bin/pgopenitems">

http://candle.pha.pa.us/cgi-bin/pgopenitems</a> mais pour l'instant, voyons les

corrections de la semaine.</p>

<p>Quelques petites corrections dans la gestion de liste des déclencheurs ont

été apportées. Des conflits entre les constructions win32 et cygwin ont été

règlés. Des tests de filtres ont été nettoyés des entrées inutiles. Un problème

avec la gestion des erreurs dans les fonctions de déclencheurs a été adressée

en exécutant immédiatement les déclencheurs «&nbsp;après&nbsp;» non déferrés

avant la fin de la requête (c'est-à-dire alors qu'on se trouve toujours dans la

fonction du déclencheur). Quelques bogues de restauration de bases de données

possédées par des utilisateurs standards ont aussi été corrigés.

</p>

<p>Plusieurs correctifs ont été soumis pour dbmirror incluant des corrections

de bogues pour la gestion des appels de setval, de nouvelles instructions de

mise à jour ainsi que quelques corrections pour le script clean_pending.

Quelques modifications ont été apportées à psql pour améliorer sa

cohérence&nbsp;; \df affiche maintenant le schéma et le nom en premier, \di+

affiche la description en dernier et \dl SQL est un peu plus standard

maintenant.</p>

<p>Un dernier élément qui vaut la peine d'être mentionné&nbsp;: le groupe

d'utilisateurs PostgreSQL de Sydney annonce leur rencontre inaugural pour la

semaine prochaine. Si vous êtes à Sydney (Australie&nbsp;!) ou que vous

souhaitez faire le voyage, nous vous encourageons à y aller. Plus de détails

sont disponibles sur <a href="http://www.postgresql.org/events/221.html">

http://www.postgresql.org/events/221.html</a>.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>pginstaller 8.0 Beta 2 Dev 3<br />

<a href="http://pgfoundry.org/forum/forum.php?forum_id=139">http://pgfoundry.org/fo

rum/forum.php?forum_id=139</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>UserLinux donne un CD de la version beta<br />

<a href="http://news.zdnet.co.uk/software/linuxunix/0,39020390,39166312,00.htm">

http://news.zdnet.co.uk/software/linuxunix/0,39020390,39166312,00.htm</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, China du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhangh

ai.com/en/index.html</a></li>

<li>Swiss Open Systems Workshop&nbsp;: Zurich, Switzerland du 5 au 7

octobre<br />

Bruce Momjian fera une présentation lors des trois jours de conférences<br />

<a href="http://www.ch-open.ch/wstage/index.html">http://www.ch-open.ch/wstage/inde

x.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Frankfurt, Germany du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 13 septembre 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>