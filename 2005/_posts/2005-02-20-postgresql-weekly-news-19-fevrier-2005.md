---
layout: post
title: "== PostgreSQL Weekly News - 19 février 2005 =="
author: "jca"
redirect_from: "index.php?post/drupal-77 "
---


<p><em>Dans son message du 19 février, David Fetter nous annonçait sur pg-annouce</em></p>

<p><strong>== PostgreSQL Weekly News - 19 février 2005 ==</strong></p>

<p>Une grande discussion autour du rebouclage des identifiants de transactions (Transaction ID ou TID) a eu lieu cette semaine. Il semble que pg_autovacuum soit intégré dans la version 8.1 de PostgreSQL.</p>

<p>Les soumissions à OSCON sont maintenant en cours. Si c'est le cas de l'une des votre, sachez que des discussions ont encore lieu à ce sujet en ce moment.</p>

<p>Sean Chittenden a utilisé l'outil d'audit de code de Coverity sur le code de base de PostgreSQL et a trouvé quelques bugs.

<a href="http://www.coverity.com/">http://www.coverity.com/<br />

</a></p>

<p>Abhijit Menon-Sen a trouvé un cas où INSERT ... SELECT ... peut

faire planter le moteur du serveur PostgreSQL. Cependant ce crash ne

corrompt pas les données et Tom Lane a corrigé ce point en moins de 4

heures.</p>

<!--more-->


<strong>== Nouvelles de produits autour de PostgreSQL ==</strong>

<ul>

<li><strong>PGCluster-1.3.0</strong> est un système de réplication synchrone multi-maître pour PostgreSQL 8.

<a href="http://www.pgfoundry.org/projects/pgcluster">http://www.pgfoundry.org/projects/pgcluster</a></li>

<li><strong>MyGeneration</strong> est un outil de mapping objet/relationnel qui supportant maintenant PostgreSQL.

<a href="http://www.mygenerationsoftware.com/">http://www.mygenerationsoftware.com/</a></li>

</ul>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<p>

La validation formelle de la qualité du code est à la mode. Klocwork a proposé son outil d'analyse aux organisations open source incluant PostgreSQL. <a href="http://www.klocwork.com/">http://www.klocwork.com/</a></p>

<p>

Linuxworld à Boston a été un succès pour PostgreSQL. Tous nos remerciements aux personnes de Boston qui ont fait que tout se soit bien passé.

</p>

<p>Les dernières nouvelles en provenance du site web de Power PostgreSQL incluent une explication de Mark Kirkwood sur la manière dont le planificateur utilise les statistiques ainsi qu'une version annotée du fichier postgresql.conf.<a href="http://www.powerpostgresql.com/">http://www.powerpostgresql.com/</a>

</p>

<p>

General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>