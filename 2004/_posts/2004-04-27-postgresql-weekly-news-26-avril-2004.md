---
layout: post
title: "PostgreSQL Weekly News - 26 avril 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/362"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 26 avril 2004 ==</h2>

<p>Encore une nouvelle semaine excitante de développement alors que nous

approchons de la version 7.5. Avec quelques gros éléments en cours de

développement, nous avons eu de grosses discussions sur les problèmes

que les gens souhaiteraient voir résolus, ceci incluant les paquetages

dans contrib et/ou gborg. Malgré tout, ce sont les petites choses

s'ajoutant qui font d'une version ce qu'elle est... et nous avons été

bien servi cette semaine.<!--break-->

</p>

<p>Quelques améliorations ont été apportées au programme de tests des

threads et nous avons commencé à récupérer des rapports améliorés sur le

support des threads sur différentes plates-formes. Le code indexscan et

seqscan a été modifié pour diminuer le nombre d'acquisitions de BufMgrLock. Le

postmaster quitte maintenant lorsque le fichier postgresql.conf est introuvable.

Quelques corrections nous sont parvenus pour dbmirror dont une pour des

séquences dont le miroir était incorrect si elles dépassaient 127 et une

autre pour que les dates/heures des fichiers de transactions n'utilisent

toujours que deux chiffres. La commande \d+ dans psql indique maintenant

si une table contient des oid. L'une de nos premières modifications pour

un support de SQL2003 concerne l'ajout des fonctions ceiling() et

power(), en alias des fonctions ceil() et pow().</p>

<p>Nous voulons aussi annoncer que nous avons ajouté deux nouveaux sites

web de groupes d'utilisateurs PostgreSQL depuis les annonces des

dernières semaines. Les nouveaux membres concernent Portland et la

Tunisie. Si vous êtes intéressé par ces groupes ou si vous souhaitez

créé votre propre groupe, jetez un oœil sur <a href="http://pugs.postgresql.org/">http://pugs.postgresql.org/</a>.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>.com Solutions Inc. sort FmPro Migrator 1.97 Enterprise Edition<br />

<a href="http://www.emediawire.com/releases/2004/4/emw120299.htm">

http://www.emediawire.com/releases/2004/4/emw120299.htm</a></li>

<li>PostgreSQL Query Analyzer 0.6<br />

<a href="http://freshmeat.net/projects/pqa/?branch_id=49735&amp;release_id=158627">

http://freshmeat.net/projects/pqa/?branch_id=49735&amp;release_id=158627</a></li>

<li>Slony-I prêt à sortir<br />

<a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=168">

http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=168</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>PostgreSQL contre MySQL contre les bases de données

commerciales<br />

<a href="http://www.devx.com/dbzone/Article/20743/0/page/1">http://www.devx.com/dbzone/Article/20743/0/page/1</a></li>

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

<h2>== Nouvelles hebdomadaires PostgreSQL - 26 avril 2004 ==</h2>

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