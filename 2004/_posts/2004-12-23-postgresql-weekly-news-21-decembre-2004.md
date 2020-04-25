---
layout: post
title: "== PostgreSQL Weekly News - 21 décembre 2004 =="
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/58"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 21 décembre 2004 ==</h2>

<p>Le 21 décembre dernier, Robert Treat nous annonçait sur la liste pgsql-announce&nbsp;:</p>

<p>La RC2 de PostgreSQL 8.0.0 a été publiée plus tôt ce jour et devrait déjà être disponible sur votre site miroir local ou via bittorrent. C'est vraisemblablement la dernière RC avant la version finale, mais comme toujours, restez à l'écoute pour plus d'informations au fur et à mesure que la situation évolue.</p>

<p>La semaine passée a été l'occasion de quelques modifications à ce point du cycle de développement&nbsp;: l'utilisation de SETOF comme donnée d'entrée à la fonction parseTypeString() est maintenant explicitement rejetée plutôt que silencieusement ignorée, comportement précédemment accepté. Un problème de sécurité des threads sous AIX a été corrigé. La variable GUC checkpoints_segments peut maintenant être composée de plus de 255 caractères.

Le processus d'ActiveSnapshot à l'intérieur d'une fonction plpgsql a été peaufiné. Le programme pg_resetxlog a été modifié pour tenir compte des noms de fichiers WAL de la 8.0. Le support des mises à jour de Kerberos 5 1.0.* a été supprimé du fait de problèmes lors du configure et des propres problèmes de sécurité des paquetages de Kerberos. Enfin, le support de l'encodage Latin9 a été ajouté à la fonction to_ascii().

</p>

<p>Une histoire intéressante postée sur la liste de diffusion -hackers

la semaine passée est celle postée par Joe Conway et relatant la

restauration d'une base de données. Joe a rencontré une situation

étrange avec une large base de données tournant sur un système de

fichiers en NFS. Les détails sont assez techniques, mais la lecture de

cette histoire est intéressante pour quiconque souhaite une bonne

histoire de restauration quand les choses tournent mal. Lisez cette

histoire en détail sur <a href="http://archives.postgresql.org/pgsql-hackers/2004-12/msg00628.php">http://archives.postgresql.org/pgsql-hackers/2004-12/msg00628.php</a>.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Arkeia fournit un plugin de sauvegarde à chaud de PostgreSQL<br />

<a href="http://www.linuxpr.com/releases/7423.html">http://www.linuxpr.com/releases/7423.html</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Installer et configurer Slony1<br />

<a href="http://www.onlamp.com/pub/a/onlamp/2004/12/16/slony_install.html">http://www.onlamp.com/pub/a/onlamp/2004/12/16/slony_install.html</a></li>

<li>Les revendeurs de bases de données entrent dans la dance de l'opensource<br />

<a href="http://www.newsforge.com/article.pl?sid=04/12/16/1953255&amp;from=rss">http://www.newsforge.com/article.pl?sid=04/12/16/1953255&amp;from=rss</a></li>

</ul>

<h2>== Evénements PostgreSQL ==</h2>

<ul>

<li>21C3&nbsp;: Berlin, RFA&nbsp;: 27-29 décembre<br />

Il y aura un stand booth au 21ème "Chaos Communication Congress".br/&gt;

<a href="https://21c3.ccc.de/wiki/index.php/PostgreSQL">https://21c3.ccc.de/wiki/index.php/PostgreSQL</a></li>

<li>Linux Solutions&nbsp;: Paris, France&nbsp;: 1-3 février<br />

PostgreSQL aura un stand, de nombreux membres de la communauté seront présents<br />

<a href="http://www.solutionslinux.fr/en/index.php">http://www.solutionslinux.fr/en/index.php</a></li>

</ul>

<h2>== PostgreSQL Weekly News - 21 Décembre 2004 ==</h2>

<p>Sur la toile&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>