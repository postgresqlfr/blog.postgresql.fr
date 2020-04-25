---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 Novembre 2005"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/131"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 6 Novembre 2005</strong></p>

<p>

La sortie de PostgreSQL 8.1.0 est imminente.  Surveillez la liste Announce! </p>

<p>

Qingqing Zhou, Magnus Hagander, Merline Moncure, Andrew Dunstan et Tom Lane found, on testé et implanté un grosse amélioration de performances sur les systèmes Win32 en ré-arrangeant la manière dont win32 attend les « signaux simulés » utilisé pour émuler le comportement d'Unix et en éliminant des appels aux noyaux dans une branche de code très utilisée. </p>

<p>Il y a eu une discussion animée sur -hackers au sujet de la proposition

de Simon Riggs visant à créer un type NUMERIC dont l'occupation mémoire

serait optimisée.

</p>

<p>

Également, une discussion animée et très large sur la manière

d'implanter les énumérations. Bravo à Andrew Dunstan pour son

implantation exemplaire. </p>

<!--more-->


<strong>Nouvelles des produits autour de PostgreSQL</strong>

<ul>

<li>

Big Nerd Ranch et Sergio Leone  ;)  presentent le « PostgreSQL Bootcamp » du 12 ou 16 décembre <a target="_blank" href="http://www.bignerdranch.com/classes/postgresql.shtml">http://www.bignerdranch.com/classes/postgresql.shtml</a>

</li>

<li>

Le livre de Tom Copeland's « PMD Applied » a été publié avec des examples complets utilisant PostgreSQL comme exemple.  <a target="_blank" href="http://pmdapplied.com/">http://pmdapplied.com/</a>

</li>

<li>

PostgresDAC 2.2.2 est sorti  <a target="_blank" href="http://www.microolap.com/products/connectivity/postgresdac/download/?r1=pgmail&amp;r2=pgdac222">http://www.microolap.com/products/connectivity/postgresdac/download/?r1=pgmail&amp;r2=pgdac222</a>

</li>

<li>

Pathena desktop search est sorti  <a target="_blank" href="http://pgfoundry.org/projects/pathena/">http://pgfoundry.org/projects/pathena/</a>

</li>

<li>

Une correction de sécurité de la libgda 1.2.3 est sortie  <a target="_blank" href="http://www.gnome-db.org/">http://www.gnome-db.org/</a>

</li>

<li>

pgAdmin 1.4.0 RC1 est sorti  <a target="_blank" href="http://www.postgresql.org/ftp/pgadmin3/beta/">http://www.postgresql.org/ftp/pgadmin3/beta/</a>

</li>

<li>

PremiumSoft a mis en ligne Navicat pour PostgreSQL  <a target="_blank" href="http://pgsql.navicat.com/">http://pgsql.navicat.com/</a>

</li>

<li>

Vita Voom pgExpress Driver v3.50 est sorti  <a target="_blank" href="http://www.vitavoom.com/Products/pgExpress_Driver/index.html">http://www.vitavoom.com/Products/pgExpress_Driver/index.html</a>

</li>

<li>

Bugzilla 2.20 est sorti avec un support officiel et expérimentalde PostgreSQL.  <a target="_blank" href="http://www.mozillazine.org/talkback.html?article=7615">http://www.mozillazine.org/talkback.html?article=7615</a>

</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<p>

Pas d'évènement local cette semaine. </p>

<p><strong>PostgreSQL dans la presse</strong></p>

<ul>

<li>

Abhijit (crab) Menon-Sen , Devdas (f3ew) Bhagat et David Fetter feront une présentation au FOSS.IN, qui se déroule du 29 novembre au 3 décembre 2005  <a target="_blank" href="http://foss.in/2005/schedules/">http://foss.in/2005/schedules/</a>

</li>

<li>

Robby (robbyonrails) Russel a interviewé l'équipe de CDBaby sur leur passage de  PHP/MySQL à Ruby on Rails/PostgreSQL.  <a target="_blank" href="http://www.oreillynet.com/pub/wlg/8274">http://www.oreillynet.com/pub/wlg/8274</a>

</li>

<li>

Alvaro Herrera a rejoint Command Prompt, où il travaillera sur PL/PHP. </li>

<li>Planet PostgreSQL:  <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a> </li>

<li>

General Bits, publié tous les lundis (PST/PDT):  <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

PostgreSQL Weekly News de cette semaine est le fruit du travail de David Fetter, Josh Drake et Robert Treat

</p>