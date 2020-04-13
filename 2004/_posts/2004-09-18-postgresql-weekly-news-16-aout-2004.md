---
layout: post
title: "PostgreSQL Weekly News - 16 août 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-375 "
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 16 août 2004 ==</h3>

<p>Alors que les retours initiaux à la sortie de la beta de PostgreSQL ont été

très positifs, cela n'a pas été la grande nouvelle de cette semaine de

développement. Ce qui a vraiment frappé les esprits a été la découverte d'un

bogue très ancien résidant dans le code «&nbsp;XLOG COMMIT&nbsp;» de

PostgreSQL. Bien qu'il n'y ait jamais eu de rapports connus sur ce bogue,

toutes versions de PostgreSQL confondues, la nature de ce bogue est telle que,

avec suffisamment de mauvaise chance, il est possible de subir des pertes de

données. Donc, l'équipe core de PostgreSQL a décidé que la seule action

responsable était de reporter le correctif sur les versions précédentes dans

autant de versions que possible. Ceci signifie que vous devriez voir dans les

prochaines semaines la sortie des versions 7.4.4, 7.3.7 et 7.2.5. Cette mise à

jour est fortement recommendé, notamment pour ceux ayant augmenté le

paramètrage de commit_delay. Voici le lien vers l'intention originelle de

sortie, qui contient elle-même un lien vers une description technique détaillée

du problème qui contient aussi un lien sur la façon dont a été découvert ce

bogue lors des tests de la beta 8.0. De gros remerciements à Satoshi Okada et à

Tom Lane pour leur travail sur ce problème.

(<a href="http://archives.postgresql.org/pgsql-hackers/2004-08/msg00708.php">http://archives.postgresql.org/pgsql-hackers/2004-08/msg00708.php</a>).

</p>

<p>Sur le front de la 8.0, nous avons reçu quelques rapports de bogues, quelques

correctifs et des rapports de construction avec succès sur plusieurs

plateformes. Comme les corrections de bogues sont intrinsèques aux tests d'une

beta, faisons-en la liste. Un bogue, où des «&nbsp;hashed crosstab&nbsp;»

s'arrêtait brutalement avec une erreur SPI_finish lorsque le source SQL ne

produisait aucune ligne, a été corrigé. Une erreur de compilation avec OpenBSD

lorsque CODESET n'était pas défini a été corrigé. Un coutournement a été ajouté

pour la fonction strtod() cassée dans de nombreuses versions de Solaris. Il y a

eu aussi un peu de nettoyage du code de COPY pour win32, le support de COPY dans

psql sait maintenant gérer les retours à la ligne (\r\n), les options -s et -L

ont été corrigées dans initdbr, dbsize a été mis à jour pour la gestion des

espaces logiques et l'acceptation des virgules dans BEGIN, START TRANSACTION et

SET TRANSACTION, a été ajouté comme le demande le standard SQL. Enfin, pour

ceux s'occupant des modifications de documentation, plusieurs aires ont été

améliorées pour inclure des informations sur les fuseaux horaires supportés, la

mise en cache des plans de requêtes préparés, les conventions de retour des

fonctions par déclencheurs, mvcc et les transactions en série.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Sortie de PostgreSQL 8 Beta<br />

<a href="http://www.sitepoint.com/blog-post-view.php?id=187313">http://www.sitepoint.com/blog-post-view.php?id=187313</a></li>

<li>Slony-I 1.0.2 inclut le support de PostgreSQL 8.0<br />

<a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=187">http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=187</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>E! plonge dans les données en ligne pour mieux cibler les publicités<br />

<a href="http://www.informationweek.com/story/showArticle.jhtml?articleID=28700181">http://www.informationweek.com/story/showArticle.jhtml?articleID=28700181</a></li>

<li>Le cadeau malvenu de Java<br />

<a href="http://www.infoworld.com/article/04/08/13/33OPcurve_1.html">http://www.infoworld.com/article/04/08/13/33OPcurve_1.html</a></li>

<li>Implémenter l'indexage complet du texte avec PostgreSQL<br />

<a href="http://www.devx.com/opensource/Article/21674">http://www.devx.com/opensource/Article/21674</a></li>

<li>PostgreSQL gagne le prix du choix de l'éditeur du Linux Journal (Linux Journal Editors Choice Award)<br />

<a href="http://www.postgresql.org/news/212.html">http://www.postgresql.org/news/212.html</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, China du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhanghai.com/en/index.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Frankfurt, Germany du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 9 août 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>