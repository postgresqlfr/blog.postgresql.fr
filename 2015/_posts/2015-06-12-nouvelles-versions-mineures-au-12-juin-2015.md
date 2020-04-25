---
layout: post
title: "Nouvelles versions mineures au 12 juin 2015"
author: "SAS"
categories: [None]
redirect_from: "index.php?post/2015/06/12/Nouvelles-versions-mineures-au-12-juin-2015"
---




<!--more-->


Le PostgreSQL Global Development Group a publié une mise à jour pour toutes les

versions supportées du SGBD, soit les versions 9.4.4, 9.3.9, 9.2.13, 9.1.18 et 9.0.22.%%%

Cette mise à jour a pour but principal de corriger les bogues qui n'ont pas été

corrigés par les mises à jour précédentes.%%%



Il est impératif de les appliquer immédiatement pour les utilisateurs ayant

déjà appliqué les mises à jour de mai et juin.%%%

Les autres utilisateurs pourront attendre le prochain arrêt de service programmé.





!!!!Correctifs des récupérations en cas de panne



Les mises à jour précédentes ont tenté de corriger un problème de "multixact

wraparound" (ou bouclage d'identifiant de transactions multiples) sur les

versions 9.3 et 9.4 de PostgreSQL.%%%

Mais elles n'ont pas corrigé le nettoyage des transactions multiples lors de

récupération apès crash.

Cela peut empêcher un serveur de redémarrer après un crash.%%%

C'est pourquoi il est recommandé aux utilisateurs de ces versions de procéder à

la mise à jour le plus vite possible.



Les serveurs précédemment passés en version 9.3 avec pg_upgrade, ou ceux qui

tournent en 9.4, suite à une autre mise à jour, peuvent voir tourner un

autovacuum sur l'ensemble des tables immédiatement après l'application de

l'actuelle mise à jour.%%%

Si les bases sont volumineuses, il peut être plus judicieux de procéder à un

VACUUM manuel, avant la mise à jour, pour maîtriser les performances suite à

cette maintenance.%%%



N'hésitez pas à consulter les notes de versions pour les détails ( [Notes de version|http://www.postgresql.org/docs/current/static/release-9-3-9.html] ).





!!!!Autres correctifs et améliorations



En plus des correctifs précédents, quelques autres correctifs ont été appliqués

à cette version.



On trouve :

  * le correctif des rares cas ou l'invalidation du cache des relations n'était pas effectué ;

  * la suppression des verrous morts entre de nouvelles sessions et un CREATE/DROP DATABASE ;

  * l'amélioration de la planification des requêtes pour les semi-jointures et anti-jointures.



!!!!Mises à jour cumulatives

Toutes les mises à jour de PostgreSQL sont cumulatives. Comme cette mise à jour

fixe un certain nombre de problèmes malencontreusement apportées par les mises

à jour précédentes, il est préférable d'installer directement cette mise à jour

plutôt que les précédentes.%%%



Comme cette mise à jour clôt plusieurs bogues de gestion des transactions

multiples, le projet PostgreSQL ne prévoit pas de nouvelles mises à jour

prochainement.





!!!!Application de la mise à jour



Comme pour les autres mises à jour, il n'est pas nécessaire de procéder à

l'export et au réimport des données, ou d'utiliser pg_upgrade. Il suffit

d'installer les nouveaux binaires et de redémarrer PostgreSQL.%%%



Au cas où des mises à jour mineures auraient été omises, il peut y avoir des

opérations suppplémentaires à effectuer. Toutes les informations se trouvent

dans les notes de versions.

Voir également les informations complémentaires en cas de passage à la version

9.3 avec pg_upgrade.



!!!!Liens :

  * [Téléchargement|http://www.postgresql.org/download]

  * [Notes de version|http://www.postgresql.org/docs/current/static/release.html]