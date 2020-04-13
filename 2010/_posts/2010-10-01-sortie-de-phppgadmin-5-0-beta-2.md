---
layout: post
title: "Sortie de phpPgAdmin 5.0 béta 2"
author: "ioguix"
redirect_from: "index.php?post/2010-10-01-sortie-de-phppgadmin-5-0-beta-2 "
---




<!--more-->


La seconde version béta de phpPgAdmin 5.0 vient d'être publiée ce 1er octobre 2010.



La version 5.0 de PPA supporte les dernières versions de PostgreSQL, ajoute de nouvelles fonctionnalités et de nombreuses corrections.



Annonce officielle du projet : [http://sourceforge.net/news/?group_id=37132&id=292379|http://sourceforge.net/news/?group_id=37132&id=292379|en]





!!!!Téléchargement



Rendez vous sur le lien suivant pour télécharger l'archive de phpPgAdmin 5.0-beta2 :



[http://phppgadmin.sourceforge.net/?page=download|http://phppgadmin.sourceforge.net/?page=download|en]





!!!!Nouvelles fonctionnalités



* Support des versions 8.4 et 9.0 de PostgreSQL

* Support de l'interclassement par base ajouté en 8.4

* Les commentaires sur les fonctions

* La sélection de la base modèle à la création d'une base de donnée

* L'export par schéma

* La modification du propriétaire d'un schéma

* La création d'index en parallèle

* L'arrêt d'un processus

* Améliore le support des domaines

* Améliore le support de la configuration de l'autovacuum par table

* Améliore le support de la recherche plein texte

* Améliore le support de l'auto-complétion lors des insertions et mise à jour de clé étrangère

** Affiche toutes les colonnes de la table référencée par la clé

** Corrige les références inter-schéma

** Supporte les clés étrangères sur plusieurs champs

** Présente toutes les clés possibles répondant au préfixe donné de façon paginée

* Facilite l'édition de plusieurs paramètres à la fois pour un rôle

* Ajout d'un onglet d'administration par table

* Permet à l'administrateur de regrouper ses serveurs dans des groupes logiques

* Un nouveau thème et une liste de choix du thème sur la page d'accueil

* Auto-rafraîchissement des pages de verrous et processus (GSoC 2010)

* Navigation à travers les données via les clés étrangères (GSoC 2010)

* Nouvelle suite de tests fonctionnels





!!!!Traductions



Liste des traductions à jour:



* Tchèque (Marek Cernocky)

* Grecque (Adamantios Diamantidis)

* Brésilien (Fernando Wendt)

* L'espagnole (Miguel Useche)

* Le français (JG 'ioguix' de Rorthais)

* Le Catalan (Bernat Pegueroles)





!!!!Correctifs



Principaux correctifs :



* Valide les chemins vers pg_dump et pg_dumpall avant l'exportation

* Multiple corrections à propos de l'échappement des noms d'objets avec des caractères spéciaux

* Multiple corrections sur l'arbre de navigation dans les objets

* Multiple corrections sur le formulaire d'exécution SQL et fichiers de scripts SQL

* Multiple corrections à propos des commentaires sur les bases de données

* Correction d'une faille de sécurité (injection de code)

* Empêche d'accéder au formulaire d'insertion si la table ne possède pas de champs

* suppression des fonctions obsolètes en PHP 5.3

* Agrandi la fenêtre d'exécution de requête SQL

* Énormément de nettoyage de code



Et bien d'autres encore moins visibles.



!!!!Note de fin



Pensez à tester cette version Béta2 ! Le projet à besoin de vous !



Les rapports d'anomalies peuvent se faire en ligne à cette adresse:



[https://sourceforge.net/tracker/?func=add&group_id=37132&atid=418980|https://sourceforge.net/tracker/?func=add&group_id=37132&atid=418980|en]