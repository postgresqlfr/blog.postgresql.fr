---
layout: post
title: "Nouvelles versions mineures (8.4.2, 8.3.9, 8.2.15...)"
author: "gleu"
redirect_from: "index.php?post/2009-12-14-nouvelles-versions-mineures-8-4-2-8-3-9-8-2-15 "
---




<!--more-->


Le projet PostgreSQL annonce aujourd'hui la disponibilité de nouvelles versions mineures pour toutes les branches actives du SGBD PostgreSQL. Cette mise à jour corrige une faille de sécurité modérée et une faille de sécurité faible : un problème sur l'authentification SSL et une élévation des droits avec les index partiels. Il est recommandé de mettre à jour votre version de PostgreSQL dès que possible.



Il y a aussi 48 autres corrections de bugs mineurs dans cette version, la plupart s'appliquant seulement à la version 8.4 et quelques-uns spécifiques à Windows. Bien que cela soit principalement des corrections de bugs mineurs, certains peuvent être plus conséquents :



* Suppression d'une corruption des index hash ;

* Mise à jour des données de fuseau horaire pour neuf régions ;

* Correction d'un problème au démarrage relatif aux droits sur Windows ;

* Empêchement d'un redémarrage du serveur si un VACUUM FULL est tué ;

* Correction d'un bug dans l'initialisation du cache au démarrage.



Voir les notes de versions pour une liste complète des changements.



Comme pour les autres versions mineures, les utilisateurs ne doivent pas nécessairement sauvegarder puis recharger leur base de données pour mettre à jour. Arrêtez PostgreSQL, mettez à jour les binaires. Néanmoins, les utilisateurs ayant des index hash devront lancer REINDEX après la mise à jour pour réparer les index potentiellement endommagés. Les utilisateurs qui n'ont pas fait la précédente mise à jour devraient lire les notes de version pour s'assurer que la mise à jour sera aussi simple.



* [Notes de version|http://docs.postgresql.fr/8.4/release.html|fr]

* [Packages d'installation|http://www.postgresql.org/download/|en]

* [Code source|http://www.postgresql.org/ftp/source/|en]

* [Détails des failles de sécurité|http://www.postgresql.org/support/security|en]



Le groupe de développement pour PostgreSQL arrêtera de fournir des mises à jour pour les versions 7.4 et 8.0 de PostgreSQL à partir de juin 2010. Nous demandons expressément aux utilisateurs de ces versions de planifier une mise à jour très rapidement.