---
layout: post
title: "Sortie de PostgreSL 8.4 beta 2"
author: "gleu"
redirect_from: "index.php?post/2009-05-22-sortie-de-postgresl-8-4-beta-2 "
---



Le projet PostgreSQL vient de publier la seconde bêta de la version 8.4. La communauté peut continuer ses tests.



Cette version corrige un certain nombre de problèmes de la première bêta. En particulier avec pg_standby, PL/pgSQL, et la gestion des encodages et des collations.



L'aide de tous les utilisateurs est nécessaire pour permettre d'accélérer l'arrivée de la version finale.



Pour améliorer la facilité d'utilisation de pg_standby, les commutateurs de mode "fast" et "smart" ont été ajoutés. Il s'agit d'une modification de l'API. Le mode "smart" assure que toutes les traces ont été appliquées, évitant toute perte de données. Le mode "fast" est identique au comportement précédent. Le comportement du fichier déclencheur a également été modifié. Les développeurs d'outils d'administration de PostgreSQL vont devoir les modifier pour supporter la nouvelle API.



De plus, les fonctionnalités et utilitaires suivants ont été corrigés ou modifiés entre les deux bêta. Merci de prendre le temps de tester les fonctionnalités suivantes pour vérifier que les corrections permettent le comportement souhaité.



* SQL/XML

* PL/pgSQL

* pg_bench

* JOIN costing

* Encoding and collation handling

* SSL connections

* psql \df

* Unicode escapes

* Parallel restore

* pg_dumpall



Pour plus d'informations, voir http://wiki.postgresql.org/wiki/84Beta2Changes



Page d'informations sur la bêta : http://www.postgresql.org/developer/beta



Notes de version : http://developer.postgresql.org/pgdocs/postgres/release-8-4.html



Code source : http://www.postgresql.org/ftp/source/v8.4beta2/



La durée habituelle de la phase de tests bêta est d'environ 6 semaines. Cette durée est toutefois fortement dépendante des erreurs découvertes. Le projet PostgreSQL ne publiera pas que tous les bogues significatifs ne seront pas corrigés.



Toute aide à la découverte et la correction des bogues permet d'accélérer l'arrivée de la version finale.