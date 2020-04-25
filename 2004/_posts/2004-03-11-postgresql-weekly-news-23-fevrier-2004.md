---
layout: post
title: "PostgreSQL Weekly News - 23 février 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/354"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 23 février 2004 ==</h2>

<p>La grosse nouvelle de la semaine a probablement été le pré-annoncement

des sorties des versions 7.3.6 et 7.4.2 qui devraient être disponibles dans les

prochaines semaines.<!--break--> Nous allons certainement voir quelques correctifs de la

branche 7.4 apparaître cette semaine dans la branche 7.3.x, donc gardez un oeil

sur le journal complet des modifications qui sera inclus avec chaque annonce de

sortie.

</p>

<p>Pendant ce temps, le travail continue évidemment sur la 7.5. Continuant

certains travaux de la semaine dernière, nous pouvons maintenant faire usage de

statistiques sur les expressions d'index. Les traces sur les déconnexions ont

été ajoutées dans les options de traces du fichier postgresql.conf. Quelques

inconsistances ont été corrigées dans les messages d'erreurs reçus avec une

entrée incorrecte du type d'OID. Des améliorations significatives ont été

ajoutées à la documentation pour la nouvelle fonctionnalité de délai du vacuum,

délai basé sur le coût estimé ; si celle-ci vous intéresse, vous pouvez

regarder la documentation développeurs. Après une bonne discussion sur la liste

de diffusion -hackers, l'analyseur de psql a été réécrit pour utiliser un

analyseur généré par flex, utilisé pour les commandes texte SQL et les commandes

'backslash'. Ceci devrait rendre plus simple l'analyse du comportement du

moteur lexical SQL car des règles flex pratiquement identiques sont utilisées

dans psql. Sur le front win32, un correctif implémentant settimer() a été

ajouté, ce qui signifie que la détection des verrouillages (deadlock) et

l'instruction statement_timeout sont maintenant fonctionnels pour win32.</p>

<p>Plusieurs améliorations ont été incorporées au module dbmirror incluant

la réplication des opérations sur les séquences via setval/nextval, le support

de syslog pour les traces, le support des instructions SQL écrites dans des

fichiers au lieu d'une base de données esclave en direct et l'ajout de

plusieurs nouvelles options dans les fichiers de configuration.</p>

<p>Enfin, l'équipe gérant le site web souhaite faire savoir que nous avons

maintenant un accès RSS aux nouvelles des projets hébergés sur GBorg, accès

disponible sur <a href="http://gborg.postgresql.org/news.rss">http://gborg.postgresql.org/news.rss</a>.

Vous pouvez visualiser ceci à partir de votre outil RSS favori (evolution a

notamment cette capacité) et nous souhaitons que ce RSS soit utilisé par d'autres sites

web Open Source (si vous souhaitez nous aider à ce sujet, envoyez une note sur

la liste de diffusion -advocacy). Un gros merci à David Costa de

<a href="../www.dotgeek.org">www.dotgeek.org</a> pour avoir donné de

son temps et du code pour faire fonctionner ceci. Avec un peu de chance, nous

aurons bientôt un accès RSS officiel pour les nouvelles et événements sur le

site PostgreSQL principal.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>SCO dévoile le pack 2 de mise à jour pour OpenServer<br />

<a href="http://www.vnunet.com/News/1152884">http://www.vnunet.com/News/1152884</a></li>

<li>Sortie de pgin.tcl-2.0.0<br />

<a href="http://gborg.postgresql.org/project/pgintcl/news/newsfull.php?news_id=154">http://gborg.postgresql.org/project/pgintcl/news/newsfull.php?news_id=154</a></li>

<li>Faciliter les exports de bases de données avec pgexport 0.9.1<br />

<a href="http://gborg.postgresql.org/project/pgexport/news/newsfull.php?news_id=153">http://gborg.postgresql.org/project/pgexport/news/newsfull.php?news_id=153</a></li>

<li>Disponibilité de la version initiale d'OLE DB<br />

<a href="http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=152">http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=152</a></li>

<li>DBD::Pg 1.3.2 maintenant en beta<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-02/msg01010.php">http://archives.postgresql.org/pgsql-general/2004-02/msg01010.php</a></li>

</ul>

<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Comparer PostgreSQL aux "Grosses Bases de données Propriétaires"<br />

<a href="http://research.rem.nl/performance.html">http://research.rem.nl/performance.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 23 février 2004 ==</h2>

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