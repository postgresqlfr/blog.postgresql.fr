---
layout: post
title: "PostgreSQL Weekly News - 7 septembre 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/377"
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 7 septembre 2004 ==</h3>

<p>Certains d'entre vous ont téléchargé le nouveau paquetage de la beta 2 car

nous avons déjà eu quelques rapports de bogues et quelques correctifs suite à

ce nouveau paquetage. Si ce n'est pas le cas, merci de récupérer une copie qui

devrait être disponible sur un miroir proche de vous.

</p>

<p>Donc, qu'est-ce qui a été corrigé cette dernière semaine&nbsp;? Quelques

problèmes avec lstat sur win32 ont été corrigés. Quelques soucis relatifs au

serveur présumant par erreur qu'une relation est ouverte par sgmr ont été

revus. Les séquences ont été modifiés pour s'assurer qu'elles étaient toujours

créées dans l'espace logique par défaut des bases de données plutôt que dans

l'espace logique par défaut du schéma s'ils sont différents. Quelques points du

mécanisme GUC ont été nettoyés, éliminant quelques erreurs avec une affectation

incorrecte de GUC et réduisant un peu de code. Du code a été ajouté pour faire

correspondre le nom du fuseau horaire avec les systèmes Windows localisés. Le

comparatif de puissance Wisconson, compris dans src/test/bench, a été réparé

pour s'assurer qu'il fonctionne avec le code actuel. Les règles d'affichage

pour les constructions UNION, INTERSECT et EXCEPT ont été améliorées. Quelques

erreurs dans la promotion du code d'erreur ont été travaillés. Les instructions

de contrôle de transaction sont maintenant spécifiquement interdites dans les

fonctions SQL. Enfin, quelques problèmes statement_timeout et la détection de

deadlock, non fonctionnels sur win32, ont été corrigés.</p>

<p>Nous avons aussi vu un peu plus de code ajouté pour adresser quelques

points. Le support de s_lock a été ajouté pour HPUX sur IA64, avec quelques

autres corrections spécifiques pour HPUX et une mise à jour de la FAQ HPUX,

merci à Shinji Teragaito. Le module dbsize, dans contrib, a été complètement

mis à jour pour les espaces logiques, en lui ajoutant quelques nouvelles

fonctions pour tester des points comme la taille des espaces logiques. Enfin,

log_filename_prefix a été remplacé par un paramètre plus général, log_filename,

permettant au <acronym title="DataBase Administrator">DBA</acronym> de choisir

la forme dans lequel les noms des journaux de traces reflètent l'heure

courante.</p>

<p>Donc, qu'est-ce qui a été corrigé cette dernière semaine&nbsp;? Quelques

problèmes avec lstat sur win32 ont été corrigés. Quelques soucis relatifs au

serveur présumant par erreur qu'une relation est ouverte par sgmr ont été

revus. Les séquences ont été modifiés pour s'assurer qu'elles étaient toujours

créées dans l'espace logique par défaut des bases de données plutôt que dans

l'espace logique par défaut du schéma s'ils sont différents. Quelques points du

mécanisme GUC ont été nettoyés, éliminant quelques erreurs avec une affectation

incorrecte de GUC et réduisant un peu de code. Du code a été ajouté pour faire

correspondre le nom du fuseau horaire avec les systèmes Windows localisés. Le

comparatif de puissance Wisconson, compris dans src/test/bench, a été réparé

pour s'assurer qu'il fonctionne avec le code actuel. Les règles d'affichage

pour les constructions UNION, INTERSECT et EXCEPT ont été améliorées. Quelques

erreurs dans la promotion du code d'erreur ont été travaillés. Les instructions

de contrôle de transaction sont maintenant spécifiquement interdites dans les

fonctions SQL. Enfin, quelques problèmes statement_timeout et la détection de

deadlock, non fonctionnels sur win32, ont été corrigés.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Sortie de PGSQL DNS 0.71<br />

<a href="http://home.tiscali.cz:8080/%7Ecz210552/sqldns.html">http://home.tiscali.cz:

8080/~cz210552/sqldns.html</a></li>

<li>OpenLogic conçoit BlueGlue pour contenir l'infrastructure open-source<br />

<a href="http://www.adtmag.com/article.asp?id=9965">http://www.adtmag.com/article.a

sp?id=9965</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>Convertir des bases de données MySQL vers Postgresql (blog)<br />

<a href="http://jmz.iki.fi/blog.php/programming/converting_mysql_database_to_postgr%0Aesql">http://jmz.iki.fi/blog.php/programming/converting_mysql_database_to_postgr

esql</a></li>

<li>Comparaison de MySQL, PostgreSQL et Oracle (blog)<br />

<a href="http://00f.net/blogs/index.php/2004/09/06/">http://00f.net/blogs/index.php

/2004/09/06/</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, Chine du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhangh

ai.com/en/index.html</a></li>

<li>Swiss Open Systems Workshop&nbsp;: Zurich, Suisse du 5 au 7

octobre<br />

Bruce Momjian fera une présentation lors des trois jours de conférences<br />

<a href="http://www.ch-open.ch/wstage/index.html">http://www.ch-open.ch/wstage/inde

x.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Francfort, Allemagne du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 9 août 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>