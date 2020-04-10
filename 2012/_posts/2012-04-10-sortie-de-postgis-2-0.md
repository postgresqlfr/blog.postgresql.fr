---
layout: post
title: "Sortie de PostGIS 2.0"
author: "daamien"
redirect_from: "index.php?post/2012-04-10-sortie-de-postgis-2-0 "
---



Le groupe de développement de PostGIS vient d'annoncer la sortie officielle de la version 2.0 de PostGIS. 



Vous pouvez dès maintenant télécharger et installer cette version en vous rendant sur la page de téléchargement du projet :



[http://postgis.org/download/|http://postgis.org/download/]



Pour rappel, PostGIS est la cartouche spatiale de PostgreSQL, la base de donnée open source relationnelle la plus avancée. Le couple PostgreSQL/PostGIS est souvent la pierre angulaire des systèmes d'information géographique. PostGIS apporte de nouveaux types de données (points, lignes, polygones…), un mécanisme d'indexation spatial, et un grand nombre de fonctions pour travailler avec ces données.



PostGIS 2.0, qui vient donc de voir le jour, arrive après un peu plus de 2 ans de développement. Les améliorations sont nombreuses, tant en terme de fonctionnalités, que de changements dans le code interne de PostGIS. Cette version utilise également les bibliothèques GEOS 3.3.3 et GDAL 1.9.0, qui sont sorties récemment.



Parmi les grandes nouvelles fonctionnalités, on trouve la gestion des Raster (données image) dans la base de données, ainsi que la gestion d’un modèle topologique respectant le standard SQL/MM. Mais ce n’est pas tout, et voici la liste des fonctionnalités introduites par PostGIS 2.0 :



* Gestion des données raster et analyse raster/vecteur en base de données

* Modèle topologique pour gérer les objets avec des frontières communes (pavages de plan par exemple)

* Intégration du typmod PostgreSQL, avec table geometry_columns automatique

* Indexation 3D et 4D

* Recherche de plus proches voisins optimisée grâce à l’utilisation de l'indexation (KNN-search)

* De nombreuses nouvelles fonctions de traitement vectoriel, dont :  ST_Split,ST_Node, ST_MakeValid, ST_OffsetCurve, ST_ConcaveHull, ST_AsX3D, ST_GeomFromGeoJSON, ST_3DDistance

* Utilisation du mécanisme d’extension de PostgreSQL 9.1

* Améliorations sur l’outil de chargement/sauvegarde de shapefiles en ligne de commande

* Gestion multi fichier pour l’import et l’export dans l’outil d’interface graphique

* Un géocodeur pour les données US Census TIGER 2010

* Gestion initiale de primitives 3D



En outre, de nombreuses améliorations et refactorisations ont été faites dans le cœur de PostGIS, rendant cet outil un des plus performants du marché.



Tous les membres de l'équipe de développement de PostGIS tiennent à remercier leurs parents d'avoir rendu cette sortie possible.



Quelques liens :



* Le site officiel de PosGIS : [http://www.postgis.org]

* L'annonce officielle : [http://postgis.refractions.net/pipermail/postgis-users/2012-April/033467.html]





(Merci à Vincent Picavet pour la traduction)