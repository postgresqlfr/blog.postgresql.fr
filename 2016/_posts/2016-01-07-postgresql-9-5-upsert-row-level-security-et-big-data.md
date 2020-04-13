---
layout: post
title: "PostgreSQL 9.5 : UPSERT, Row Level Security et Big Data"
author: "daamien"
redirect_from: "index.php?post/postgresql-9-5 "
---




<!--more-->


Le 7 janvier 2016 : Le PostgreSQL Global Development Group annonce la publication de la version 9.5 de PostgreSQL.

Cette version ajoute les capacités d'UPSERT, les droits de niveau ligne (Row Level Security), et de nombreuses fonctionnalités orientées Big Data, qui ouvrent plus grand encore les possibilités d'utilisation de PostgreSQL.

Avec ces nouvelles fonctionnalités, PostgreSQL va devenir le choix par défaut pour un nombre encore plus grands d'applications, qu'il s'agisse de startups, de grandes entreprises ou d'agences gouvernementales.



Annie Prévot,  DSI de la CNAF, déclare, « La CNAF sert 11 millions d'allocataires. Elle verse 73 milliards d'euros par an, au travers de 26 types de prestations. Ce service, essentiel à la population, s'appuie sur un système d'information qui se doit d'être absolument performant et fiable. Le système d'information de la CNAF s'appuie avec satisfaction sur le gestionnaire de Base de données PostgreSQL. En utilisation sur la moitié des systèmes, ce logiciel libre offre toutes les garanties de fonctionnement et de fiabilité. Il est en phase de déploiement sur l'ensemble des systèmes. »



__UPSERT__





UPSERT, raccourci de « INSERT, ON CONFLICT UPDATE », est une fonctionnalité réclamée depuis longtemps par les développeurs d'applications.

Elle permet de traiter de la même façon l'ajout ou l'actualisation de lignes.

UPSERT simplifie le développement des applications web et mobile en permettant de laisser la base gérer les conflits entre modifications concurrentes des données.

Cette fonctionnalité supprime également la dernière barrière à la migration d'applications MySQL historiques vers PostgreSQL.



Développée sur les deux dernières années par Peter Geoghegan, programmeur au sein de la société Heroku, l'implantation de UPSERT au sein de PostgreSQL est nettement plus souple et puissante que celle de la plupart des autres SGBDR.

La nouvelle clause ON CONFLICT permet d'ignorer la nouvelle donnée, ou d'actualiser différentes colonnes ou relations, de façon à supporter les chaînes d'ETL (Extract, Transform, LOAD) les plus complexes.

Et, à l'instar de PostgreSQL, cette fonctionnalité a été conçue pour être totalement concurrentielle, et s'intégrer avec les autres fonctionnalités de PostgreSQL, dont la réplication logique.



__Row Level Security__





PostgreSQL continue d'étendre les possibilités de sécurisation des accès, avec la nouvelle fonctionnalité Row Level Security (RLS).

RLS propose un vrai contrôle d'accès par ligne et par colonne, qui s'intègre avec les outils externe de sécurisation, tel SELinux.

PostgreSQL est déjà connu comme « la base la plus sécurisée par défaut ». RLS conforte cette position de meilleur choix par défaut pour les applications à fort besoin de sécurisation, telles que la conformité PCI, la dIrective Européenne de protection des données, et les standards de protection des données des systèmes de santé.



RLS est l'aboutissement de 5 ans d'ajout de fonctionnalités de sécurité à PostgreSQL, ce qui inclut les travaux de  KaiGai Kohei de NEC, Stephen Frost de Crunchy Data, et ceux de Dean Rasheed. À travers cette fonctionnalité, les administrateurs de base de données peuvent définir des politiques de sécurité, qui filtrent les lignes visibles en fonction des utilisateurs.

La sécurisation mises en place par ce biais est résistante aux injections SQL et autres trous de sécurité de niveau applicatif.







__Fonctionnalités Big Data__





PostgreSQL 9.5 inclut de nombreuses nouvelles fonctionnalités pour les bases plus volumineuses, et l'intégration avec les systèmes Big Data.

Ces fonctionnalités garantissent que PostgreSQL va continuer de jouer un rôle majeur dans le marché grandissant du Big Data en logiciels libres.

Citons :



Les index BRIN : Ce nouveau type d'index permet la création d'index beaucoup plus petits, mais très efficaces, pour les tables volumineuses. Il est nécessaire que les données soient ordonnées.

Par exemple, des tables contenant des millions de lignes de traces peuvent être indexées et interrogées en 5% du temps nécessaire lors de l'utilisation d'index de type BTree.



Tris plus rapides : PostgreSQL trie désormais les données textuelles et numériques plus rapidement, à l'aide d'un algorithme appelé "clés abrégées" ou "abbreviated keys".

Cela accélère certaines requêtes qui nécessitent de trier des volumes considérables de données d'un facteur 2 à 12, et peut également accélérer la création d'index d'un facteur 20.



CUBE, ROLLUP et GROUPING SETS : Ces nouvelles clauses du standard permettent de produire des rapports avec plusieurs niveaux de synthèse en une seule requête.

CUBE permet également une meilleure intégration de PostrgreSQL avec un nombre plus grand d'outils de création de rapports OLAP (Online Analytic Processing), tel Tableau.



Les Foreign Data Wrappers (FDW) : Ils permettent déjà d'utiliser PostgreSQL pour interroger des systèmes Big Data, tel Hadoop ou Cassandra. La version 9.5 ajoute IMPORT FOREIGN SCHEMA et les jointures au niveau des sources externes, ce qui rend les connexions aux données externes plus efficaces et plus faciles à établir.



TABLESAMPLE : Cette clause SQL permet de récupérer rapidement un échantillon statistique d'une table sans tri coûteux.



« Le nouvel index BRIN apparu dans PostgreSQL 9.5 est une fonctionnalité puissante qui permet à PostgreSQL de gérer et indexer des volumes de données difficiles, voire impossibles à traiter par le passé. Il permet de faire évoluer les données et les performances au delà de la limite considérée précédemment avec les bases relationnelles traditionnelles et fait de PostgreSQL une solution parfaite pour les analyses Big Data," déclare Boyan Botev, Lead Database Administrator, Premier, Inc.



__Liens__



* Téléchargement : [http://www.postgresql.org/downloads|http://www.postgresql.org/downloads]

* Dossier de presse : [http://www.postgresql.org/about/press/presskit95/fr|http://www.postgresql.org/about/press/presskit95/fr]

* Notes de version : [http://www.postgresql.org/docs/9.5/static/release-9-5.html|http://www.postgresql.org/docs/9.5/static/release-9-5.html]

* Nouveautés de la 9.5 : [https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5|https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5]