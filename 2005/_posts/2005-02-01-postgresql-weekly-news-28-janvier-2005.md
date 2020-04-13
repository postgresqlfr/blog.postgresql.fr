---
layout: post
title: "== PostgreSQL Weekly News - 28 Janvier 2005 =="
author: "jca"
redirect_from: "index.php?post/drupal-69 "
---


<p><em>David Fetter est le nouveau responsable du PostgreSQL Weekly News.</em></p>

<p><strong>== PostgreSQL Weekly News - 28 Janvier 2005 ==</strong></p>

<p>

PostgreSQL 8.0.0 incluant le plus grand nombre de modifications duepuis la version 6.3 est sorti. Réservez le meilleur accueil dans la communauté aux nouveaux utilisateurs Windows . Les détails techniques des nouvelles fonctionnalités se trouve sur

<a href="http://www.postgresql.org/about/news.277">http://www.postgresql.org/about/news.277</a>

</p>

<p>

Pervasive Software Inc. a annoncé la sortie de Pervasive Postgres,

leur version du code PostgreSQL incluant un support. Pervasive est connue comme étant l'heureux propriétaire de la base de données embarquée propriétaire Btrieve.  Leur équipe, de 12 programmeurs, est trés motivée par la contribution qu'elle pourrait apporté au code Open Source de PostgreSQL. Pour plus d'informations lisez la page <a href="http://www.pervasivepostgres.com">http://www.pervasivepostgres.com</a>.

</p>

<p>Il y a eu une discussion animée sur -hackers au sujet d'un brevet

d'IBM portant sur ARC. Souvenez vous que les opinions des développeurs

de logiciels sur les aspects légaux ont un poids équivalent à ceux des

avocats.

</p>

<p>

Les futures versions 8.0.1, 7.4.7, 7.3.9 et 7.2.7 vont corriger un bug de sécurité sur l'extension LOAD décrite dans <a href="http://archives.postgresql.org/pgsql-bugs/2005-01/msg00269.php">http://archives.postgresql.org/pgsql-bugs/2005-01/msg00269.php</a>

et permettant à un utilisateur disposant de petits privilèges de

charger arbitrairement des bibliothèques dans l'espace de processus de

postgres, au moins sous Windows. Les autres patches inclus dans la

8.0.1 contiennent des améliorations pour Windows NT4 et un moyen de

fixer la taille de la pile sous Windows pouvant mener à un crash dans

les clauses IN() de taille conséquente.

</p>

<p>Jean-Gérard Pailloncy est parti de l'idée purement théorique de

types étendus (nombre + unité) pour arriver à une implémentation

pratique incluant l'arithmétique sur les unités en une semaine. Les

détails sur ce point sont sur <a href="http://archives.postgresql.org/pgsql-general/2005-01/msg01355.php">http://archives.postgresql.org/pgsql-general/2005-01/msg01355.php</a>.

</p>

<!--more-->


<strong>== PostgreSQL Product News ==</strong><br /><p>

Sortie de Mammoth PostgreSQL 1.4</p>

<ul><li><a href="http://www.commandprompt.com/">http://www.commandprompt.com/</a></li>

</ul>

Sortie de PL/Java 1.0.0<br />

<ul><li><a href="http://gborg.postgresql.org/project/pljava">http://gborg.postgresql.org/project/pljava</a></li>

</ul>

Sortie de pgEdit 1.0<br />

<ul><li><a href="http://pgedit.com/">http://pgedit.com/</a></li>

</ul>

Sortie de DBI-Link 1.0.0<br />

<ul><li><a href="http://gborg.postgresql.org/project/dbi-link">http://gborg.postgresql.org/project/dbi-link</a></li>

</ul>

<p>

<strong>== PostgreSQL in the News ==</strong><br />

CD Baby passe à PostgreSQL et à Ruby</p>

<ul><li><a href="http://www.onlamp.com/pub/wlg/6286"> http://www.onlamp.com/pub/wlg/6286</a></li>

</ul>

PostgreSQL General est de retour <br />

<a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a><br />

Nouvelles histoires sur PostgreSQL en Japonnais<br />

<ul>

<li><a href="http://itpro.nikkeibp.co.jp/free/ITPro/NEWS/20050119/154938/%3Ehttp://itpro.nikkeibp.co.jp/free/ITPro/NEWS/20050119/154938/%3C/a%3E%3C/li%3E%0A%3Cli%3E%3Ca%20href=" http:="" www.itmedia.co.jp="" enterprise="" articles="" 0501="" 19="" news061.html="">http://www.itmedia.co.jp/enterprise/articles/0501/19/news061.html</a></li>

<li><a href="http://www.atmarkit.co.jp/news/200501/22/postgresql.html">http://www.atmarkit.co.jp/news/200501/22/postgresql.html</a></li>

<li><a href="http://pcweb.mycom.co.jp/news/2005/01/19/013.html">http://pcweb.mycom.co.jp/news/2005/01/19/013.html</a></li>

<li><a href="http://internet.watch.impress.co.jp/cda/news/2005/01/19/6117.html">http://internet.watch.impress.co.jp/cda/news/2005/01/19/6117.html</a></li>

</ul>