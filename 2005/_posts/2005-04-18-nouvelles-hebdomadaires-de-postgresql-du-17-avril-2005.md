---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL du 17 avril 2005"
author: "Sebastien Lardiere"
redirect_from: "index.php?post/drupal-91 "
---


<p>David Fetter nous annonçait :</p>

<p>== Nouvelles hebdomadaires de PostgreSQL - 17 avril 2005 ==</p>

<p>8.0.2 est sorti, avec maintenant le non-breveté (et plus rapide) 2Q en

remplacement de ARC. La <code>libpq</code> ayant changé de versions, vous

devrez recompiler les applications l'utilisant.</p>

<p>Tom Lane a soumis une optimisation pour les aggrégats min() et max() dans

le CVS, qui permet l'utilisation d'indexes.</p>

<!--more-->


== Nouveaux Produits PostgreSQL ==

<p>Le projet Bizgres crée et construit une distribution de PostgreSQL,

incluant des modifications experimentales dans le coeur de PostgreSQL,

pour une version optimisée « Business Intelligence ».<br />

<a href="http://pgfoundry.org/projects/bizgres/">http://pgfoundry.org/projects/bizgres/</a></p>

<p>PostgreSQL Configurator sera un script Perl interactif, conçu pour aider les utilisateurs avec une configuration initiale performante pour PostgreSQL.

A terme, on peut aussi espérer avoir une interface graphique. Ce projet fait partie de BizGres.<br />

<a href="http://pgfoundry.org/projects/configurator/">http://pgfoundry.org/projects/configurator/</a></p>

<p>PgJ2EE est un outil de coordination pour achever la certification J2EE et des performances sans pareil pour PostgreSQL. <em>(ndt: désolé, je n'ai pas trouvé mieux)</em><br />

<a href="http://pgfoundry.org/projects/pgj2ee/">http://pgfoundry.org/projects/pgj2ee/</a></p>

<p>Sortie de PL/Java 1.1.0. Avec le support de DatabaseMetaData,

ResultSetMetaData, et deux gestionnaires de langage, un sûr 'java' et l'autre, 'javaU', non. <br />

<a href="http://gborg.postgresql.org/project/pljava/projdisplay.php">http://gborg.postgresql.org/project/pljava/projdisplay.php</a>

</p>

<p>

Nos excuses à Thomas Hallgren et toute l'équipe pour avoir manqué ce point important.

</p>

<p>== PostgreSQL dans la presse ==</p>

<p>Le remplacement de ARC avec 2Q dans PostgreSQL a été dicuté içi: <br />

<a href="http://news.zdnet.co.uk/software/linuxunix/0,39020390,39194883,00.htm">http://news.zdnet.co.uk/software/linuxunix/0,39020390,39194883,00.htm</a></p>

<p>Retranscription d'un salon de discussion sur PostgreSQL dans OSDIR: <br />

<a href="http://www.osdir.com/Article5033.phtml">http://www.osdir.com/Article5033.phtml</a></p>

<p>General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

Les clés primaires et l'héritage, et la gestion d'erreurs dans pl/pgsql.</p>

<p>Les nouvelles hebdomadaires de PostgreSQL vous sont présentées cette semaine

par David Fetter, Josh Berkus, et Elein Mustain.</p>