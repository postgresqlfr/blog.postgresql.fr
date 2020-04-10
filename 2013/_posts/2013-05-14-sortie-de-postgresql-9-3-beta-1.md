---
layout: post
title: "Sortie de PostgreSQL 9.3 bêta 1"
author: "daamien"
redirect_from: "index.php?post/2013-05-14-sortie-de-postgresql-9-3-beta-1 "
---



La première version bêta de PostgreSQL 9.3, la dernière mouture de la

meilleure base de données open source, est disponible.

Cette bêta vous donnera un avant-goût de toutes les fonctionnalités qui

seront disponibles dans la version 9.3. Vous pouvez d'ores et déjà

commencer les tests de validation.



Téléchargez cette version, essayez-la et déclarez les éventuels

problèmes que vous découvrez !





++Principales nouveautés :++



Les fonctionnalités à tester en priorité sont les suivantes :



* Écriture sur des tables distantes (Writeable Foreign Tables) et envoi des données sur des systèmes de stockage externes



* Fédérer des bases PostgreSQL avec le connecteur pgsql_fdw



* Mettre à jour des vues automatiquement



* Créer des vues matérialisées



* Tester les jointures latérales (LATERAL JOIN)



* Utiliser les nouvelles fonctions JSON



* Indexation pour la recherche par expressions rationnelles



* Checksums des pages disque pour détecter les erreurs du systèmes de fichiers



Avec les version 9.3, PostgreSQL a réduit drastiquement son utilisation

des mémoires partagées SysV au profit de mmap. Ceci permet une

installation et une configuration plus facile. Cependant cela implique

que les utilisateurs de PostgreSQL testent cette nouveauté de manière

rigoureuse et s'assurent qu'aucun problème de mémoire n'est apparu.



Les utilisateurs de PostgreSQL sont également invités à tester

attentivement les améliorations des verrous sur clefs étrangères

("Foreign Key Locks")







++Fonctionnalités supplémentaires++





Ce n'est pas tout. Cette version apporte encore plus de nouveautés,

notamment :



* Bascules d'urgence rapides (Failover) vers un serveur secondaire pour garantir la haute disponibilité de vos données



* Reconstruction d'un serveur secondaire uniquement via streaming



* Améliorations des verrous sur clefs étrangères



* pg_dump en parallèle pour des sauvegardes plus rapides



* Un dossier pour les fichiers de configuration



* Sonde pg_isready pour vérifier la disponibilité d'une base



* Option COPY FREEZE pour réduire les entrées/sorties en cas de chargement massif



* Processus en arrière-plan définis par l'utilisateur pour effectuer des taches automatisées



* Déclaration de vues récursives



* Directive lock_timeout





La liste complète des avancées de la version 9.3 bêta est disponible

dans la note de publication (en anglais) :

[http://www.postgresql.org/docs/devel/static/release-9-3.html]



Pour plus de détails et des exemples, rendez-vous sur la page wiki des

nouveautés de PostgreSQL 9.3 (en anglais) :

[http://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.3]





++Testez PostgreSQL 9.3 bêta 1 dès maintenant !++





La qualité et les performances de PostgreSQL dépendent de l'implication

de sa communauté dans les tests des versions bêta.



Téléchargez PostgreSQL 9.3 Beta 1 et essayez-la dès que possible dans

vos environnements et avec vos applications. Et envoyez vos commentaires

aux développeurs de PostgreSQL.



Les fonctionnalités et les API de la version bêta 1 ne changeront pas

d'ici la sortie de la version finale. Vous pouvez donc commencer à

développer des applications dès maintenant avec cette version.





Plus d'information sur la façon de tester et remonter un problème :

[http://www.postgresql.org/developer/beta]



Vous pouvez obtenir les binaires et les installeurs Windows, Linux et

Mac sur la page de téléchargement :

[http://www.postgresql.org/download]



La documentation de la nouvelle version est disponible

[http://www.postgresql.org/docs/devel/static]





Lien vers l'annonce officielle:

[http://www.postgresql.org/about/news/1463/]