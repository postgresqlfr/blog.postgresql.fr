---
layout: post
title: "PostgreSQL Weekly News - 5 avril 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/12"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 5 avril 2004 ==</h2>

<p>Cette édition tardive des nouvelles hebdomadaires vous arrive grâce à

mon fils Dylan, qui a eu trois ans aujourd'hui. Il a trouvé les modifications

de l'optimiseur très intéressantes, donc allons-y.<!--break-->

</p>

<p>L'optimiseur a été amélioré principalement pour instituer ce qui était appelé la

nouvelle logique de "comparaison fuzzy". Le but du nouveau code est de

marquer les chemins ayant les mêmes clés de chemin et pratiquement les

mêmes coûts comme redondants. Bien que le coût exact de cet "hasard" pourrait

être encore ajusté, il a montré jusqu'à maintenant des performances accrues

dans certains cas sans inconvénients (c'est-à-dire que les résultats, au niveau

des plans choisis ont été identiques, certains chemins ont simplement été

éliminés pour obtenir ces résultats plus rapidement). Le code GIST s'est vu un

peu nettoyé, ce qui a résulté en l'élimination d'un problème avec les boîtes

alignées strictement sur 64 bits ainsi que le passage de l'utilisation de

structures bytea aux structures GistEntryVector. Win32 a aussi reçu quelques

améliorations qui devraient permettre sa compilation avec VC++. Quelques bogues

de la fonction to_char dans la gestion des dates BC ont été corrigés. Sur le

front de la documentation, quelques informations sur l'utilisation de \df

(pour trouver les fonctions utilisant/renvoyant des types de données

spécifiques) ont été incluses. Et dernier point, mais pas le moindre, du code

a été ajouté pour composer la base de l'utilisation des types composites en

colonnes de table (et potentiellement quelques autres fonctionnalités possibles).

</p>

<p>Finalement, une nouvelle de notre communauté internationale : nos amis espagnols

ont annoncé le déplacement de la liste d'aide générale espagnole vers

pgsql-es-ayuda@postgresql.org. De plus, nous sommes fiers d'annoncer notre

premier miroir disponible à Singapour, grâce à Matthew Feinberg et Feratech.com.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==                                                                                </h2>

<ul>

<li>XpSQL version 0.9.3 est disponible.<br />

<a href="http://gborg.postgresql.org/project/xpsql/news/newsfull.php?news_id=163">http://gborg.postgresql.org/project/xpsql/news/newsfull.php?news_id=163</a></li>

<li>Sortie de la version 1.0.0.4 de OLE DB<br />

<a href="http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=164">http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=164</a></li>

<li>Sortie de PL/R 0.6.0-alpha<br />

<a href="http://gborg.postgresql.org/project/plr/news/newsfull.php?news_id=165">http://gborg.postgresql.org/project/plr/news/newsfull.php?news_id=165</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Could open source elections close out hanging chads?<br />

<a href="http://software.newsforge.com/software/04/04/01/1530219.shtml">http://software.newsforge.com/software/04/04/01/1530219.shtml</a></li>

<li>Best of Show Award Winners Named at Bio-IT World Conference + Expo<br />

<a href="http://www.tmcnet.com/usubmit/2004/Apr/1028008.htm">http://www.tmcnet.com/usubmit/2004/Apr/1028008.htm</a></li>

<li>Aberdeen Finds Open Source Databases Show Widest Adoption in New Development<br />

<a href="http://www.prnewswire.com/cgi-bin/stories.pl?ACCT=104&amp;STORY=/www/story/03-31-2004/0002138195">http://www.prnewswire.com/cgi-bin/stories.pl?ACCT=104&amp;STORY=/www/story/03-31-2004/0002138195</a></li>

<li>Délai de connexion pour PostgreSQL et MySQL, 2è round (blog)<br />

<a href="http://www.randomnetworks.com/joseph/blog/?eid=101">http://www.randomnetworks.com/joseph/blog/?eid=101</a></li>

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

<h2>== Nouvelles hebdomadaires PostgreSQL - 5 avril 2004 ==</h2>

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