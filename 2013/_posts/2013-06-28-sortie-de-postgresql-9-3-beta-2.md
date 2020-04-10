---
layout: post
title: "Sortie de PostgreSQL 9.3 Bêta 2"
author: "daamien"
redirect_from: "index.php?post/2013-06-28-sortie-de-postgresql-9-3-beta-2 "
---



La seconde version bêta de PostgreSQL 9.3 est désormais disponible.

Cette bêta propose un avant-goût de toutes les fonctionnalités qui

seront inclues dans la version 9.3.



Téléchargez, testez et envoyez vos commentaires !



__Changements depuis la version Bêta 1__





Ci-dessous la liste des changements et des corrections effectués depuis

la version précédente. Si vous avez testé une fonctionnalité de la

première bêta, merci de la testez à nouveau pour vous assurer que tous

les éventuels problèmes ont été résolus.



* éviter le saut de xid au démarrage du Hot Standby

* éviter les verrous morts sur insertion avec les index SP-GiST

* ajout d'un drapeau "updatable" visible pour les utilisateurs sur les tables distantes et les vues

* correction de 2 problèmes avec JSON et Unicode

* s'assurer que pg_isready affiche des infos de connexion correctes

* correction de l'ordre des dépendances pour les triggers sur événements dans pg_dump

* correction des tests de régression pour postgres_fdw

* correction de  pg_xlogdump -r

* array_remove() ne retourne plus des tableaux vides incorrects

* correction de formattage du fichier recovery.conf généré automatiquement

* simplification de la gestion des crashs après une bascule d'urgence

* CREATE FOREIGN TABLE peut inclure une colonne SERIAL

* Le mot "FOREIGN"  est optionnel dans la commande "ALTER TABLE"

* intégration des mises à jour de traduction

* de nombreuses mises à jour sur la documentation



De plus, toutes les corrections effectuées sur les branches antérieures

de PostgreSQL ont été reportées sur la version bêta 2.



Pour une liste complète des fonctionnalités de la version 9.3,

reportez-vous aux notes de version :

[http://www.postgresql.org/docs/devel/static/release-9-3.html|http://www.postgresql.org/docs/devel/static/release-9-3.html]



Des descriptions détaillées des nouveautés sont disponibles sur le wiki

du projet :

[http://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.3].





__Testez  PostgreSQL 9.3 Bêta 2 dès maintenant !__





Le projet PostgreSQL dépend de sa communauté pour les tests des versions

à venir et ainsi garantir que les performances seront au rendez-vous et

qu'il n'y aura pas de bugs.



Téléchargez PostgreSQL 9.3 Bêta 2 et essayez-le avec vos applications

dès que vous le pouvez, puis renvoyez vos commentaires aux développeurs

de PostgreSQL.



Les fonctionnalités et les API de la version bêta 2 ne vont pas évoluer

de manière significative d'ici la sortie de la version finale. Dès lors

il n'y a aucun problème à démarrer vos nouveaux projets en profitant des

nouveautés de cette version.



Pour plus d'information sur comment tester et comment remonter un

problème, rendez-vous sur la page suivante:



[http://www.postgresql.org/developer/beta]



Vous pouvez obtenir la version bêta 2 de PostgreSQL 9.3 sur la page de

téléchargement officielle : http://www.postgresql.org/download.



Des installateurs et paquets sont d'ores et déjà disponibles pour

plusieurs plate-formes, notamment Solaris and FreeBSD. Les autres seront

disponibles dans le courant de la semaine prochaine.



La documentation de cette nouvelle version est disponible à l'adresse

suivante :

[http://www.postgresql.org/docs/9.3/static/index.html]







PS : L'annonce officielle est disponible ici :

[http://www.postgresql.org/about/news/1471/]