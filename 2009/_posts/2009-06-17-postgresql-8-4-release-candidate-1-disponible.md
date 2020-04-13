---
layout: post
title: "PostgreSQL 8.4 Release Candidate 1 disponible"
author: "sas"
redirect_from: "index.php?post/2009-06-17-postgresql-8-4-release-candidate-1-disponible "
---




<!--more-->


La version finale de PostgreSQL 8.4 se rapproche encore aujourd'hui, avec la publication de la première Release Candidate. 



La communauté de développement compte désormais sur l'ensemble des utilisateurs et développeurs de PostgreSQL de part le monde pour tester cette RC. Il faut désormais vérifier qu'elle est stable, sûre, sécurisée et suffisamment performante pour devenir la version offcielle de PostgreSQL. Télécharger dès aujourd'hui la 8.4 RC1 et testez-la avec vos applications.



Page d'informations concernant les tests et liens de téléchargement :

    http://www.postgresql.org/developer/beta



Un grand nombre des problèmes corrigés concernent pg_migrator, le nouvel outil de mise-à-jour « en place » pour PostgreSQL. Testez la migration de vos bases 8.3 en 8.4 et remontez toute erreur de pg_migrator, en particulier celles concernant les modules additionnels (contrib).



pg_migrator sera publié prochainement en version RC1, version compatible avec la version 8.4 RC1. Téléchargez-le à : http://pgfoundry.org/projects/pg-migrator/



Cette RC inclut également nombre de modifications dans la gestion des paramètres NULL de fonctions internes, de façon à prévenir tout exploit de déni-de-service.

Premièrement, la fonction générale internal_in() est désormais définie NONSTRICT de façon à intercepter les erreurs NULL pour débogage.

Deuxièmement, de nombreuses fonctions internes des modules aditionnels ont été marqués STRICT pour les vérouiller, en particulier plusieurs fonctions portant sur les index GiST et pg_freespacemap. Il convient de s'assurer qu'il n'y a pas d'effet de bord inattendu de cette politique de sécurité accrue pour les fonctions internes au niveau de vos applications, en particulier si vous utilisez des additiels tels que GIS et BLAST.



Autres points spécifiques corrigés depuis la bêta 2 :



-- support du Kerberos FreeBSD ;

-- ordre des lignes dans curseurs WITH HOLD flottants ;

-- la précision horaire dans INFORMATION_SCHEMA est compatible avec le standard ;

-- normalisation des entrées pour les sous-types INTERVAL ;

-- interdiction du double échappement des chaînes XML, et élimination du bogue causant un plantage XML ;

-- problème de l'encodage par défaut de DBlink ;

-- annulation de la modification incompatible dans les opérateurs Intarray ;

-- ajout de statistique estimée du nombre de lignes pour les vacuums partiels ;

-- DBlink utilise désormais l'API SQL/MED ;

-- problème de corruption d'index GIN ;

-- support des pluriels dans les chaînes traduites ;

-- initialisation du support des bibliothèques Perl 5.10 ;

-- divers problèmes dans la rotation des segments de traces pg_standby ;

-- gestion de la syntaxe LIKE '%_' ;

-- divers problèmes dans l'interface ECPG.



Pour une liste complète des correctifs, voir le mirroir Git :

    http://git.postgresql.org/gitweb?p=postgresql.git;a=shortlog



Nous comptons sur la communauté des utilisateurs pour que PostgreSQL continue d'être une des bases de données libres parmi les moins soumises aux bogues. Cela signifie que nous avons besoin des résultats de vos tests le plus rapidement possible.