---
layout: post
title: "Mises à jour et Fin de la version 8.2"
author: "daamien"
redirect_from: "index.php?post/2011-12-09-mises-a-jour-et-fin-de-la-version-8-2 "
---



Bonjour,



Le PostgreSQL Global Development Group (PGDG) a publié lundi 5 décembre

des mises à jour sur toutes les branches actives du SGBD PostgreSQL,

c'est à dire les versions 9.1.2, 9.0.6, 8.4.10, 8.3.17 and 8.2.23.



Les utilisateurs des fonctionnalités concernées par ces mises à jours,

notamment la réplication binaire, doivent mettre à jours leurs instances

PostgreSQL dès que possible.



Ceci est également la dernière mise à jour de PostgreSQL 8.2, qui est

désormais en fin de vie (en anglais : "End-Of-Life" ou "EOL"). Les

utilisateurs de la version 8.2 doivent planifier une montée de version

de leurs instances PostgreSQL et migrer vers la version 8.3 ou

supérieure dans les prochains mois. Pour plus d'information, consulter

la Politique de support des Versions :



[http://wiki.postgresql.org/wiki/PostgreSQL_Release_Support_Policy]



Les fonctionnalités affectées par cette mise à jour sont notamment : la

réplication binaire et le Hot Standby, les indexes GIN, l'extension

citext, le tri dans les fonctions de fenêtrage, l'intégrité

référentielle par les clés étrangères, le PL/perl, et la gestion des

extensions en général...

Les utilisateurs de cette fonctionanlités doivent appliquées cette mise

à jour sur le champ.



Cette publication contient 52 corrections pour la version 9.1, et un

nombre inférieur de corrections pour les versions plus anciennes,

notamment :



* correction de bugs dans la vue information_schema.referential_constraints view [*] ;

* correction des collationnements pour les colonnes citext et les index associés [*] ;

* prévention d'un crash possible lors d'une jointure avec une fonction scalaire ;

* prévention d'une corruption de données transitoire des index GIN après un crash ;

* prévention d'une corruption de données sur les colonnes TOAST lors de copie de données ;

* correction d'échecs lors du démarrage d'un serveur en lecture seule ;

* correction d'un autre bug concernant le message "variable not found in subplan target list" ;

* correction d'un bug sur le tri des expressions d'agrégats dans les fonctions de fenêtrage ;

* correction de plusieurs bugs sur pg_upgrade ;

* modification de l'ordre de création d'une clé étrangère pour un meilleur support des clés s'auto-référençant [*] ;

* correction de plusieurs bugs sur l'ordre CREATE EXTENSION ; 

* ajout d'un code assurant que le type de retour et la donnée renvoyée soient en accord avec PL/perl ;

* ajout d'un code assurant que les chaînes en PL/perl sont toujours en UTF-8 ;

* correction de bugs sur les différentes extensions ;

* mise à jour de la base de données des fuseaux horaires.



Les modifications marquées avec une étoile entre crochets ([*])

nécessitent des étapes supplémentaires, après mise à jour, pour corriger

les problèmes décrits. Voir les notes de versions de chaque branche pour

une liste complète des modifications avec des détails sur les correctifs

et les étapes à suivre.



Comme pour les autres versions mineures, les utilisateurs ne doivent pas

nécessairement sauvegarder puis recharger leur base de données pour

mettre à jour. Arrêtez PostgreSQL, mettez à jour les binaires et

relancez PostgreSQL.





Téléchargez les nouvelles versions maintenant sur :

* [http://www.postgresql.org/download/]



Code source:

* [http://www.postgresql.org/ftp/source/]



Paquets binaires:

* [http://www.postgresql.org/ftp/binary/]





La version originale de ce message est disponible ici :

[http://www.postgresql.org/about/news/1366/]