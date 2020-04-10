---
layout: post
title: "Publication de PostgreSQL 9.5 Beta 1"
author: "sas"
redirect_from: "index.php?post/2015-10-08-postgresql-9-5-beta-1 "
---



Le PostgreSQL Global Development Group annonce aujourd'hui la première bêta de la version 9.5 de PostgreSQL.

Cette version contient toutes les fonctionnalités qui seront dans la version finale. Peu de modifications devraient intervenir.

Les utilisateurs peuvent désormais tester leurs applications avec cette version en préparation de la version finale.

<h2>Différences avec Alpha2</h2>

Les nombreux bogues remontés par les utilisateurs et les contributeurs ont été corrigés.

Citons :

<ul>

<li> de nombreux ajustements à la sémantique du Row Level Security (RLS) ;

</li>

<li> des améliorations des deadlocks avec LWLock ;

</li>

<li> les problèmes de corruption d'index BRIN ;

</li>

<li> le problème de connexion avec PGSSLMODE=require sous Windows ;

</li>

<li> différents problèmes de traçage des timestamp de commit ;

</li>

<li> les fuites mémoire des hash join ;

</li>

<li> le comportement incohérent de jsonb_set lors de l'ajout dans un tableau ;

</li>

</ul>

La sémantique du Row Level Security a été modifiée pour être cohérente avec le système de permissions de PostgreSQL basé sur GRANT.

<br />Ainsi, RLS applique les politiques d'INSERT et SELECT lorsqu'INSERT RETURNING est utilisé.<br />Il est recommandé aux utilisateurs de tester l'application des rêgles TLS et de retester toute configurations RLS existante pour vérifier l'absence de régression dans leurs cas d'utilisation.

<br /><br />Pour plus d'informations, on peut se référer à la documentation concernant CREATE POLICY (http://www.postgresql.org/docs/9.5/static/sql-createpolicy.html) et RLS (http://www.postgresql.org/docs/9.5/static/ddl-rowsecurity.html).

<br /><br />Si vous avez fait un rapport de bogue lors de tests de PostgreSQL 9.5, nous vous demandons de retester avec la Bêta 1 pour vérifier que le problème a été corrigé.

<br /><br />Si vous n'avez pas encore testé PostgreSQL 9.5, c'est le bon moment pour aider au développement de PostgreSQL. <br />Les problèmes connus et en attente de correction sont listés sur la page des problèmes à régler.

<h2>Agenda</h2>

Il s'agit de la première version bêta pour la 9.5. <br />Cela signifie que peu de modifications sont prévues d'ici la version finale.

<br /><br />Le projet PostgreSQL publiera d'autres bêta, si nécessaire, puis une ou plusieurs release candidates, jusqu'à la version finale, fin 2015.<br /><br />Pour plus d'informations et des suggestions sur la manière de tester les bêta, on peut se référer à la page Beta Testing.<br /><br />La documentation complète et les notes de version sont disponibles en ligne, et installées avec PostgreSQL.

La page What's New donne les détails de chaque nouvelle fonctionnalité.

<h2>Liens</h2>

<ul>

<li> Page de téléchargement : http://www.postgresql.org/download/

</li>

<li> Information sur les tests des bêta : http://www.postgresql.org/developer/alpha

</li>

<li> Note de version de la 9.5 bêta : http://www.postgresql.org/docs/devel/static/release-9-5.html

</li>

<li> Quoi de neuf dans 9.5 : https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5

</li>

<li> Les problèmes ouverts : https://wiki.postgresql.org/wiki/PostgreSQL_9.5_Open_Items

</li>

</ul>