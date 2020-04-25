---
layout: post
title: "PostgreSQL Weekly News - 6 juillet 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/26"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 6 juillet 2004 ==</h2>

<p>Ayant passé la date limite du 1er juillet, nous sommes officiellement en gel

des fonctionnalités. Ceci signifie que tous les correctifs introduisant de

nouvelles fonctionnalités seront conservés de côté jusqu'au prochain cycle de

développement. Quels types de correctifs seront acceptés&nbsp;? Les corrections

de bogues, le nettoyage des nouvelles fonctionnalités et les améliorations de

documentation seront toujours bienvenus. L'équipe principale cible actuellement

le 15 juillet comme date de la première version bêta mais nous vous garderons

informé des suites du développement.

</p>

<p>Quelques correctifs impressionants ont été pris en compte cette semaine lors

du vidage de la file des correctifs. Le module fuzzymatch dans contrib a ajouté

le code de double "metaphone" et "metaphone" a été modifié de façon à ce qu'une

chaîne de caractères vide en entrée renvoit une chaîne de caractère vide en sortie

plutôt qu'une erreur. Les opérateurs pour interval-plus-datetime ont été intégrés

pour une meilleur compatibilité SQL. Deux langages procéduraux ont reçues des mises

à jour cette semaine. Le premier a impliqué une modification dans l'analyse des

boucles FOR en plpgsql de façon à ce que la décision «&nbsp;boucle d'entier contre

boucle de requêtes&nbsp;» soit conduite par la présence de '..' entre IN et

LOOP plutôt que suivant la présence d'un nom de variable correspondant à

l'enregistrement/ligne. Ceci signifie que l'erreur générale des variables

d'enregistrements mal tapées donnera maintenant un message d'erreur plus

compréhensible que celui référençant '..'. L'autre implique plusieurs mises à jour

du module plperl, nos remerciements aux personnes de Command Prompt et de quelques

autres développeurs qui se sont organisés eux-même sur <a href="../www.pgfoundry.org">www.pgfoundry.org</a>. Les nouvelles fonctionnalités

incluent le support des espaces logiques et des données partagées, le support des

déclencheurs, le support du retour d'enregistrements, la fonctionnalité spi_exec

et la possibilité de renvoyer les type «&nbsp;record&nbsp;» et «&nbsp;setof

record&nbsp;».</p>

<p>Qu'y aura-t'il donc dans la prochaine version&nbsp;? Avec le risque que ces

fonctionnalités soient supprimées du dernier cycle bêta, la plupart des grosses

fonctionnalités ont réussies à être incluses&nbsp;: transactions impliquées,

<acronym title="Point In Time Recovery">PITR</acronym> et le pg_autovacuum

intégré. Il est aussi bon de rappeller le support win32, le support des espaces

logiques et le code du tampon ARC. Ce qui fait de cette version l'une des plus

importantes en plusieurs années. Restez au courant de la progression de la bêta

sur ces fonctionnalités et une liste complète des changements de la prochaine

version de PostgreSQL.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Sortie de Slony 1.0.0<br />

<a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=182">

http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=182</a></li>

<li>shadonet.com introduit un hébergement gratuit de PostgreSQL<br />

<a href="http://www.postgresql.org/news/205.html">

http://www.postgresql.org/news/205.html</a></li>

</ul>

<h2>== Nouvelles dans la presse ==</h2>

<ul>

<li>Fujitsu a signé la facture pour des nouvelles fonctionnalités de la base de données PostgreSQL<br />

<a href="http://software.newsforge.com/software/04/07/01/0721222.shtml?tid=72&amp;tid=82">

http://software.newsforge.com/software/04/07/01/0721222.shtml?tid=72&amp;tid=82</a></li>

<li>FAQ sur le moment d'utiliser «&nbsp;for update&nbsp;» dans une requête<br />

<a href="http://techdocs.postgresql.org/guides/Forupdate">

http://techdocs.postgresql.org/guides/Forupdate</a></li>

<li>Relational Databases Rule the Roost<br />

<a href="http://sdtimes.com/news/105/story15.htm">

http://sdtimes.com/news/105/story15.htm</a></li>

<li>Connect Computing donne à l'utilisateur une option Linux<br />

<a href="http://www.linuxpr.com/releases/7013.html">

http://www.linuxpr.com/releases/7013.html</a></li>

<li>Pourquoi écrire des fonctions d'extension de PostgreSQL&nbsp;?<br />

<a href="http://www.onlamp.com/pub/a/onlamp/2004/06/28/postgresql_extensions.html">

http://www.onlamp.com/pub/a/onlamp/2004/06/28/postgresql_extensions.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

<li>Linux World Expo&nbsp;: San Francisco, CA, USA&nbsp;: du 3 au 5 août<br />

PostgreSQL aura un stand et donnera des conférences avec OSDL.</li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 6 juin 2004 ==</h2>

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