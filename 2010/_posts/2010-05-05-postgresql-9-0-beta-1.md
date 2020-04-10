---
layout: post
title: "PostgreSQL 9.0 Bêta 1"
author: "sas"
redirect_from: "index.php?post/2010-05-05-postgresql-9-0-beta-1 "
---



!!!!3 Mai 2010 :  La première version bêta de PostgreSQL 9.0 est disponible.



La version 9.0 est la première à inclure une réplication binaire interne en temps réel, permettant une extension horizontale du système. Cette possibilité repose sur deux nouvelles fonctionnalités, le « Hot Standby » et le « Streaming Replication » (qu'on peut traduire par « Reprise à chaud » et « Réplication en continu »).



Associées aux autres fonctionnalités majeures, cette version doit permettre d'accroître l'adoption de PostgreSQL par de nouveaux utilisateurs, et dans de nouveaux types d'applications.



Cette version est une bêta. Ce qui signifie qu'elle contient probablement encore des bogues, des problèmes, et que la documentation n'est pas encore parfaite. Cette bêta est publiée pour que nos utilisateurs trouvent ces problèmes et nous permettent de les éliminer avant la publication de la version finale.



Le PostgreSQL Global Development Group demande à tous les utilisateurs de télécharger et tester la version 9.0 pour permettre une publication dans les temps, et dénuée de bogues.



La version 9.0 offre de nombreuses nouvelles fonctionnalités permettant aux développeurs et DBA d'élargir leur utilisation de PostgreSQL. Citons :



*  une nouvelle réplication binaire ;

* le support du 64-bit sous Windows ;

* l'amélioration de LISTEN/NOTIFY, qui permet de propager rapidement les messages internes ;

* des blocs de procédures anonymes par l'utilisation de DO ;

* des déclencheurs sur colonnes et sous condition ;

* le support de Python 3 dans PL/Python et de nombreuses améliorations du PL/Perl ;

* les contraintes d'unicité pour les données non-scalaires (contraintes d'exclusion) ;

* un meilleur support des données clé-valeur ;

* la suppression automatique des jointures, optimisant les requêtes engendrées par ORM.



La liste complète des plus de 200 modifications est disponible dans les notes de version (en anglais) :

[http://developer.postgresql.org/pgdocs/postgres/release-9-0.html|http://developer.postgresql.org/pgdocs/postgres/release-9-0.html]



Les utilisateurs qui souhaitent tirer parti des nouvelles fonctionnalités peuvent télécharger et tester le portage de leurs applications vers PostgreSQL 9.0bêta dès maintenant.



Du fait de la présence de nombreuses fonctionnalités nouvelles, et de la révision du code, telle que la modification de la syntaxe permise par le PL/PgSQL, des problèmes de rétro-compatibilité sont attendus.



Le code source, comme les installeurs binaires sont disponibles sur le site de PostgreSQL :



* Page d'informations sur le programme bêta: [http://www.postgresql.org/developer/beta|http://www.postgresql.org/developer/beta]

* Source : [http://www.postgresql.org/ftp/source/9.0beta1|http://www.postgresql.org/ftp/source/9.0beta1]

* Installeur Windows : [http://www.enterprisedb.com/products/pgdownload.do|http://www.enterprisedb.com/products/pgdownload.do] 

* Binaires pour autres plateformes : [http://www.postgresql.org/ftp/binary/9.0beta1|http://www.postgresql.org/ftp/binary/9.0beta1]

* Notes de version : [http://developer.postgresql.org/pgdocs/postgres/release-9-0.html|http://developer.postgresql.org/pgdocs/postgres/release-9-0.html]



Stéphane Schildknecht pour la traduction, Josh Berkus pour la version originale.