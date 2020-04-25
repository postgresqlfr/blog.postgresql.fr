---
layout: post
title: "PostgreSQL Weekly News - 19 janvier 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/7"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 19 janvier 2004 ==</h2>

<p>Cette semaine s'est passée sans qu'il y ait eu de grandes nouvelles, ce

qui va nous faire des nouvelles hebdomadaires courtes mais sympathiques. J'ai

remarqué que beaucoup de changements concernaient des soucis de performance,

mais je pense qu'il s'agissait plus d'accidents que de problèmes de conception.

</p>

<p>Les besoins en mémoires partagées pour la stratégie de remplacement du

tampon ARC ont été ajustés. Une mauvaise estimation des coûts CPU des parcours

d'index lors de l'évaluation d'expressions non constantes comparé à la variable

d'indexage a été corrigé. Construite sur une précédente optimisation avec des

sous-requêtes IN renvoyant des résultats DISTINCT, l'optimiseur reconnaitra

maintenant aussi l'utilisation de UNION/INTERSECT/EXCEPT (sans ALL). Les

fonctions C chargées dynamiquement accélèreront les recherches en cache. Les

tests initiaux indiquent que ceci devrait être mis sur des fonctions externes

avec les fonctions intégrées.</p>

<p>Au niveau de la documentation, nous avons maintenant expérimenté la

configuration de la génération de la documentation via XSLT sur le CVS. L'idée

est de tester cette configuration pour s'assurer que les résultats et

performance sont intéressants puis de n'utiliser que cette méthode pour

construire les documentations.</p>

<p>Une dernière note, PyGreSQL 3.4 est sorti cette semaine. PyGreSQL est le

module d'interface Python pour PostgreSQL. Vous pouvez lire l'annonce complète

sur <a href="http://archives.postgresql.org/pgsql-announce/2004-01/msg00012.php">http://archives.postgresql.org/pgsql-announce/2004-01/msg00012.php</a>.

</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Sortie de MySQL PHP 2 Postgres 0.93<br />

<a href="http://freshmeat.net/projects/mysqlphp2postgres/?branch_id=6909&amp;release_id=147934&amp;topic_id=861">http://freshmeat.net/projects/mysqlphp2postgres/?branch_id=6909&amp;release_id=147934&amp;topic_id=861</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul><li>Open-Source Databases Win New Converts

<a href="http://www.onjava.com/pub/a/onjava/2004/01/14/hibernate.html">http://www.eweek.com/article2/0,4149,1433843,00.asp</a></li>

<li>Hibernate Your Data

<a href="http://www.onjava.com/pub/a/onjava/2004/01/14/hibernate.html">http://www.onjava.com/pub/a/onjava/2004/01/14/hibernate.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>LinuxWorld: New York City, New York: 21 janvier<br />

Bruce Momjian présentera une BoF PostgreSQL<br />

<a href="http://www.postgresql.org/event.php?EventID=180">http://www.postgresql.org/event.php?EventID=180</a></li>

<li>New York PHP Meeting: New York, New York: 27 janvier<br />

Bruce Momjian proposera une présentation de PostgreSQL<br />

<a href="http://nyphp.org/content/calendar/view_entry.php?id=50&amp;date=20040127">http://nyphp.org/content/calendar/view_entry.php?id=50&amp;date=20040127</a></li>

<li>NordU Usenix 2004: Denmark: 28 janvier - 1er février<br />

Bruce Momjian présentera quelques tutoriels PostgreSQL<br />

<a href="http://www.nordu.org/NordU2004/">http://www.nordu.org/NordU2004/</a></li>

<li>Linux Solutions 2004: Paris, France: 3 au 5 février<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxsolutions.fr/EN/home/index.php?site=default">http://www.linuxsolutions.fr/EN/home/index.php?site=default</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 19 janvier 2004 ==</h2>

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