---
layout: post
title: "PostgreSQL Weekly News - 19 avril 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-361 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 19 avril 2004 ==</h2>

<p>Si vous mesurez l'activité d'un projet avec ses seuls intégrations de

sources, vous penseriez que peu de choses se sont passées cette semaine.

Bien qu'il soit vrai que peu de changements a eu lieu au niveau du code,

nous avons reçu quelques nouvelles excitantes comme le fait que Fujitsu

travaille pour sponsoriser le développement de quelques fonctionnalités

avancées commes les espaces de tables (tablespaces), JDBC, PL/J et les

transactions imbriquées. Avec un peu de chances, nous verrons le fruit

de ce partenariat avant la sortie de la 7.5.

</p>

<p>En parlant de la 7.5, faisons un rapide survol des modifications de

la semaine. L'analyseur a été modifié pour que les noms apparaissant

dans les clauses GROUP BY sont cherchés d'abord dans les colonnes FROM,

puis dans les alias de SELECT et finalement dans les colonnes FROM

externes&nbsp;; le comportement précédent faisait précéder les colonnes

FROM externes par rapport aux alias. La fonctionnalité proposée par la

commande COPY et par \copy a été amélioré pour permettre une sauvegarde

et une restauration simplifiées dans plusieurs formats populaires comme

CSV, QUOTE et ESCAPE. Pour plus de détails sur les nouveaux mots clés

impliqués, jetez un oœil sur la documentation développeurs. Enfin,

Tom Lane a passé du temps sur la relecture et l'amélioration du nouveau

code de gestion du tampon ARC de la version 7.5.</p>

<p>Au niveau du web, nous avons enregistré quelques nouveaux sites

miroirs cette semaine avec l'Indonésie, Puerto Rico et la Suisse. Nous

sommes aussi ravi d'apprendre le lancement d'un nouvel site pour les

groupes d'utilisateurs PostgreSQL sur

<a href="http://pugs.postgresql.org/">http://pugs.postgresql.org/</a>. Le

premier de ces sites concerne San Francisco dont vous pouvez récupérer

des informations sur

<a href="http://pugs.postgresql.org/sfpug/">http://pugs.postgresql.org/sfpug/</a>.

Si vous êtes intéressé à placer votre groupe d'utilisateurs PostgreSQL

sur le web, merci de contacter josh@postgresql.org. Un dernier

point pour ceux qui ne l'auraient pas remarqué, il existe un nouveau

sondage en ligne sur le site web principal concernant les compagnies

d'aide et de support pour PostgreSQL, donc faites-y un tour.

</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>EduPhant v2.0b2 disponible<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-04/msg00003.php">

http://archives.postgresql.org/pgsql-announce/2004-04/msg00003.php</a></li>

<li>GroupLink délivre la compatibilité CRM<br />

<a href="http://www.crn.com/sections/BreakingNews/dailyarchives.asp?ArticleID=49409">

http://www.crn.com/sections/BreakingNews/dailyarchives.asp?ArticleID=49409</a></li>

<li>Uwerkz propose un nouvel utilitaire de bases de données<br />

<a href="http://www.macobserver.com/article/2004/04/19.13.shtml">

http://www.macobserver.com/article/2004/04/19.13.shtml</a></li>

<li>Sortie de PEAR DB 1.6.2<br />

<a href="http://www.postgresql.org/news/178.html">

http://www.postgresql.org/news/178.html</a></li>

<li>Mammoth PostgreSQL Replicator 1.2 (7.3.6) disponible<br />

<a href="http://www.emediawire.com/releases/2004/4/emw119171.htm">

http://www.emediawire.com/releases/2004/4/emw119171.htm</a></li>

<li>Arrivée de www.SQL-Scripts.Com<br />

<a href="http://archives.postgresql.org/pgsql-sql/2004-04/msg00169.php">

http://archives.postgresql.org/pgsql-sql/2004-04/msg00169.php</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Les analystes indiquent une base plus importante pour les bases de

données open source<br />

<a href="http://software.newsforge.com/software/04/04/14/1347227.shtml?tid=72&amp;tid=74&amp;tid=82">http://software.newsforge.com/software/04/04/14/1347227.shtml?tid=72&amp;tid=74&amp;tid=82</a></li>

<li>Enregistrement ouvert pour la convention Open Source 2004

d'O'Reilly<br />

<a href="http://www.ebcvg.com/press.php?id=260">http://www.ebcvg.com/press.php?id=260</a></li>

<li>Contruire un compilateur Parrot<br />

<a href="http://www.onlamp.com/pub/a/onlamp/2004/04/15/parrot_compiler_construction.html">http://www.onlamp.com/pub/a/onlamp/2004/04/15/parrot_compiler_construction.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>European Regional Open Source Conference&nbsp;: Yerevan, Arménie du 28 au 30 juin<br />

Bruce Momjian parlera pendant la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon&nbsp;: Portland, OR. USA du 26 au 30 juillet<br />

Il y aura un thème PostgreSQL avec la participation d'un grand nombre de

membres de la communauté<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 19 avril 2004 ==</h2>

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