---
layout: post
title: "== Nouvelles hebdomadaires de PostgreSQL - 27 juin 2005 =="
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/101"
---


<p><strong>== Nouvelles hebdomadaires de PostgreSQL - 27 juin 2005 ==</strong></p>

<p>Le gel des fonctionnalités a été large. Vous pouvez être sûr que votre fonctionnalité favorite s'y trouve!

</p>

<p>Teodor Sigaev a fait en sorte que les index GiST soient totalement concurrents</p>

<p> Magnus Hagander et Neil Conway on supprimé Kerberos 4, ce dernier n'étant plus utilisé. Le protocole en lui même n'est plus supporté en partie à cause de problèmes de sécurité.</p>

<!--more-->


PL/PgSQL permet mainteant de faire EXECUTE INTO.

<p>

Pavel Stehule a ajouté des fonctions LEAST et GREATEST du même style que celles d'Oracle, c'est à dire des versions orientées tuples des fonctions MIN et MAX.

</p>

<p>

La ferme de compilation enverra maintenant un courrier électronique journalier contenant une synthèse des états de mise à jour. Pour plus de détails sur la souscription consultez la pages <a href="http://pgfoundry.org/mail/?group_id=1000040">http://pgfoundry.org/mail/?group_id=1000040</a>

</p>

<p>

Tom Lane a ajouté une nouvelle base de données créée par défault et appelée postgres.

</p>

<p>

Alfranio Correia Junior a présenté un patch permettant l'écriture de triggers ON COMMIT ce qui promet d'être sujet à controverse.<a href="http://gorda.di.uminho.pt/community">http://gorda.di.uminho.pt/community</a>

</p>

<p><strong>== Nouvelles de produits autour PostgreSQL ==</strong></p>

<ul>

<li><strong>Slony-I 1.0.6</strong> est sorti : <a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=238">http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=238</a></li>

<li><strong>Slony-I 1.1.0</strong> est sorti <a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=237">http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=237</a></li>

<li><strong>DBD::Pg 1.43</strong> est sorti <a href="http://search.cpan.org/%7Edbdpg/DBD-Pg-1.43/Pg.pm">http://search.cpan.org/~dbdpg/DBD-Pg-1.43/Pg.pm</a></li>

<li><strong>Oryx 0.95</strong> est sorti, il inclus notamment tsearch2. <a href="http://www.oryx.com/mailstore/0.95.html">http://www.oryx.com/mailstore/0.95.html</a></li>

</ul>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<ul>

<li>Bruce Momjian a effectué une conférence au Massachusetts State House le mercredi 22 juin  pour l'Open Source Day.

<a href="http://www.mass.gov/portal/index.jsp?pageID=itdmodulechunk&amp;L=1&amp;L0=Home&amp;sid=Aitd&amp;b=terminalcontent&amp;f=_policies_standards_open_source_day&amp;csid=Aitd">http://www.mass.gov/portal/index.jsp?pageID=itdmodulechunk&amp;L=1&amp;L0=Home&amp;sid=Aitd&amp;b=terminalcontent&amp;f=_policies_standards_open_source_day&amp;csid=Aitd</a>

</li>

<li><strong>General Bits</strong>:<a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a> fait une pause cette semaine.

</li>

</ul>