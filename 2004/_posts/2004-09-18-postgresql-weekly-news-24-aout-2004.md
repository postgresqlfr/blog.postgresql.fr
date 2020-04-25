---
layout: post
title: "PostgreSQL Weekly News - 24 août 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/33"
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 24 août 2004 ==</h3>

<p>Comme indiqué dans les dernières nouvelles hebdomadaires, nous avons sorti

les versions 7.2.5, 7.3.7 et 7.4.5. Ces versions corrigent un bogue

critique et tous les utilisateurs de ces branches sont fortement

encouragés à mettre à jour leur dernière version respective. Pour plus

d'informations sur les mises à jour, merci de lire les notes de sorties

disponibles avec chaque version.</p>

<p>Un bon flux de rapports de bogues est arrivé cette dernière semaine pendant

que les tests beta continuent. Quelques problèmes de threads ont été corrigés

sur plusieurs plateformes. Un problème sur la gestion des rowtypes contenant

des colonnes supprimées a été corrigé. Quelques bogues sur le calcul des

siècles et millénaires avec des données de type timestamptz ont été corrigés.

Quelques problèmes de compilation dans contrib/fuzzstrmatch ont été supprimés.

Le code de pg_subtransaction a été un peu nettoyé, ce qui devrait aider à

la suppression des quelques problèmes qui pourraient encore rester.

</p>

<p>La travail sur la finalisation des nouvelles fonctionnalités a continué. Une

commande ALTER INDEX a été ajouté pour permettre la modification du

propriétaire, de l'espace logique et du nom d'un index. Le support du

«&nbsp;Dollar quoting&nbsp;» a été ajouté à pg_restore. Stefan Kaltenbrunn a

soumis un très gros correctif concernant le support de la complétion via la

touche de tabulation pour plus d'une douzaine de commandes dans psql.</p>

<p>Nous avons aussi vu quelques travaux sur la documentation cette semaine. Du

code SGML cassé a été corrigé dans la documentation. Un mauvais exemple pour

quote_ident a été corrigé. Le code d'exemple des valeurs globales dans pl/

perl a été amélioré. Enfin, il existe aussi une nouvelle section pour les

fonctionnalités obsolètes. Juste un rappel&nbsp;: tout le monde est bienvenu

pour lire la documentation de la version beta et pour soumettre des corrections

ou clarifications&nbsp;; c'est un très bon moyen pour que les «&nbsp;non

développeurs&nbsp;» puissent s'impliquer dans le projet.</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>PL/Java supporte maintenant à la fois PostgreSQL 8.0 et 7.4<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-08/msg00008.php">http:/

/archives.postgresql.org/pgsql-announce/2004-08/msg00008.php</a></li>

<li>NuSphere Corporation annonce la sortie de PhpED IDE v3.3 <br />

<a href="http://www.prweb.com/releases/2004/8/prweb151323.htm">http://www.prweb.com

/releases/2004/8/prweb151323.htm</a></li>

<li>De nouvelles sorties stables de PostgreSQL pour corriger des bogues

critiques<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-08/msg00007.php">

http://archives.postgresql.org/pgsql-announce/2004-08/msg00007.php</a></li>

<li>Sortie de BiggerSQL-1.3.5. MultiMedia Aware.<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-08/msg00943.php">

http://archives.postgresql.org/pgsql-general/2004-08/msg00943.php</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>OSDL Bolsters Linux Kernel Testing<br />

<a href="http://biz.yahoo.com/prnews/040819/sfth025_1.html">

http://biz.yahoo.com/prnews/040819/sfth025_1.html</a></li>

<li>La mise à jour STP simplifie les tests d'applications Linux<br />

<a href="http://news.zdnet.co.uk/software/linuxunix/0,39020390,39164260,00.htm">

http://news.zdnet.co.uk/software/linuxunix/0,39020390,39164260,00.htm</a></li>

<li>PostgreSQL 8.0 fonctionnera sous Windows<br />

<a href="http://news.zdnet.co.uk/0,39020330,39164219,00.htm">

http://news.zdnet.co.uk/0,39020330,39164219,00.htm</a></li>

<li>Oracle l'appelle MINUS, PostgreSQL l'appelle EXCEPT (blog)<br />

<a href="http://joseph.randomnetworks.com/archives/2004/08/18/">

http://joseph.randomnetworks.com/archives/2004/08/18/</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, China du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhangh

ai.com/en/index.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Frankfurt, Germany du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 9 août 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>