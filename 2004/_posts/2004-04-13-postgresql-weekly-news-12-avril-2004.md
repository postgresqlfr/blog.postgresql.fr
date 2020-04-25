---
layout: post
title: "PostgreSQL Weekly News - 12 avril 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/360"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 12 avril 2004 ==</h2>

<p>Une tranquille semaine de développement pour le projet principal mais

plusieurs développements intéressants ont eu lieu dans le monde. Probablement

un des plus intéressants est la sortie des spécifications SQL:2003. Toute

personne intéressée par le concept et la conception des bases de données

devrait y jeter un oeil car un certain nombre d'articles apparaissent pour

discuter des changements qui s'en découlent; j'ai inclus un lien vers un

synopsis ci-dessous.<!--break-->

</p>

<p>Entre temps, de retour au monde de PostgreSQL, nous avons une petite liste

de modifications à revoir. Le programme psql affiche maintenant l'information

du CLUSTER en utilisant \d sur l'objet adéquat. Quelques vérifications

d'erreurs ont été ajouté à la commande copy pour empêcher certaines personnes

d'utiliser un délimiteur apparaissant dans la chaîne COPY NULL. Les

fonctionnalités de traces peuvent maintenant tracer à partir des instructions

DML et DDL en plus d'autres options (vérifiez la documentation en développement

pour les spécificités de l'implémentation). L'optimiseur garde maintenant une

meilleure trace des tris utilisé dans les opérations "set" pour éviter des tris

redondants à des niveaux supérieurs.</p>

<p>Deux informations particulièrement intéressantes à mentionner cette semaine

concernent la rupture de compatibilité descendante avec les anciennes versions

de PostgreSQL. La première implique la correction d'un bogue autorisant un

siècle 0 et un millénium 0. L'autre changement fait que la commande \copy de

psql lit les commandes sur l'entrée/sortie et ajoute un pstdin/pstdout pour

lire à partir du stdin/stdout de psql. Ces deux changements seront indiqués

dans le journal des modifications intégral de la 7.5 mais il est toujours

appréciable de le savoir aussi tôt que possible.</p>

<p>Une dernière information sur une mise à jour d'une solution de réplication

très prometteuse pour PostgreSQL connue sour le nom de PGCluster. Celle-ci

a pour licence BSD. Il s'agit d'une solution de réplication multi-maîtres

synchrones, basée actuellement sur les sources de la 7.3.4. Pour les personnes

intéressés, plus d'informations sont disponibles sur le site du projet (<a href="http://hiroshima.sraw.co.jp/people/mitani/jpug/pgcluster/en/">http://hiroshima.sraw.co.jp/people/mitani/jpug/pgcluster/en/</a>).

</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de la version 1.0.0.7 de OLE DB<br />

<a href="http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=167">http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=167</a></li>

<li>Minq Software sort une nouvelle version de DbVisualizer<br />

<a href="http://www.emediawire.com/releases/2004/4/emw116727.htm">http://www.emediawire.com/releases/2004/4/emw116727.htm</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Exploitation stratégique et statistique (data-mining) des courriers

électroniques<br />

<a href="http://www.onlamp.com/pub/a/onlamp/2004/04/08/datamining_email.html">http://www.onlamp.com/pub/a/onlamp/2004/04/08/datamining_email.html</a></li>

<li>Un site local Linux évalue la compatibilité matérielle<br />

<a href="http://www.computerworld.co.nz/news.nsf/0/4C07674A112811BFCC256E6F007289AC">http://www.computerworld.co.nz/news.nsf/0/4C07674A112811BFCC256E6F007289AC</a></li>

<li>Analyse de l'utilisation de SQL dans PostgreSQL<br />

<a href="http://rootprompt.org/article.php3?article=6497">http://rootprompt.org/article.php3?article=6497</a></li>

<li>Résumé de SQL:2003<br />

<a href="http://www.acm.org/sigmod/record/issues/0403/E.JimAndrew-standard.pdf">http://www.acm.org/sigmod/record/issues/0403/E.JimAndrew-standard.pdf</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Une soirée avec Bruce Momjian&nbsp;: New York, NY&nbsp;: 13 avril<br />

SRA America sponsorise une réunion avec Bruce Momjian<br />

<a href="http://www.postgresql.org/events/194.html">http://www.postgresql.org/events/194.html</a></li>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 12 avril 2004 ==</h2>

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