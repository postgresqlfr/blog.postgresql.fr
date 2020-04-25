---
layout: post
title: "Mises à jour mineures de PostgreSQL : 9.1.3, 9.0.7, 8.4.11, 8.3.18"
author: "daamien"
categories: [Dans les bacs]
redirect_from: "index.php?post/2012/02/27/Mise-à-jour-mineures-de-PostgreSQL-:-9.1.3,-9.0.7,-8.4.11,-8.3.18"
---




<!--more-->


Le projet PostgreSQL sort aujourd'hui des mises à jour de sécurité pour toutes les branches actives du SGBD PostgreSQL. Ces mises à jour correspondent aux versions 9.1.3, 9.0.7, 8.4.11, 8.3.18.



Les utilisateurs de pg_dump, de certificats SSL pour la validation ou de triggers utilisant une fonction en SECURITY DEFINER doivent mettre à jour immédiatement leur installation. Il est fortement conseillé à tous les autres administrateurs de mettre à jour leur version de PostgreSQL lors du prochain arrêt planifié de la base. Des détails sur les correctifs de sécurité suivent ci-dessous.



Les fonctionnalités affectées par les corrections de cette mise à jour incluent : la réplication binaire et le serveurs en Hot Standby, les index GIN, les requêtes CTE, les wrappers de données distantes, les langages PL/pgsql et PL/python, le type de données inet, les modules intarray, pgcrypto et pg_upgrade ainsi que les outils pg_restore et pg_dump. Les utilisateurs de ces fonctionnalités doivent installer la mise à jour dès que possible.



Cette mise à jour contient 46 correctifs pour la version 9.1. Les versions plus anciennes ont moins de correctifs. Parmi les correctifs :



* Correction d'une corruption des index Btree lors d'insertions en parallèle à un VACUUM ;

* Retour à la normale après des erreurs survenant lors du rejeu d'un DROP TABLESPACE

* Correction de la mise à zéro transitoire du cache disque de PostgreSQL lors du rejeu des journaux de transactions

* Correction du postmaster pour tenter un redémarrage après un crash d'un serveur Hot Standby

* Correction d'un cas particulier dans le nettoyage des transactions SSI

* Mise à jour des droits par colonne des autorisations, et non pas seulement des droits par table, lors du changement du propriétaire d'une table

* Correction de la gestion des sous-plans d'une requête CTE en écriture lors de la vérification du READ COMMITTED

* Correction des échecs causant le message « could not find plan for CTE »

* Correction de l'erreur «type de nœud non supporté» causé par la clause COLLATE dans une expression INSERT

* Correction d'un crash lors de problèmes sur la suppression de fichiers de données après une validation (COMMIT)

* Correction de la fuite de mémoire récemment introduite dans le traitement des types de données inet / cidr

* Correction de l'estimation des coûts de la gestion des colonnes dans une clause IN (...) avec un index GIN

* Correction des fuites de mémoire lors des conversions d'entrées/sorties dans PL/pgsql

* Amélioration de pg_upgrade permettant le renommage de la bibliothèque partagée PL/python (affectant les mises à jour vers la 9.1)



Comme pour les autres versions mineures, il n'est pas nécessaire de sauvegarder et recharger les bases de données. Il n'est pas utile non plus d'utiliser pg_upgrade. Pour appliquer cette mise à jour, arrêtez PostgreSQL, mettez à jour les exécutables et redémarrez PostgreSQL. Puis réalisez les étapes post-mise-à-jour une fois le serveur redémarré.



Cette mise à jour inclut les trois correctifs de sécurité suivants:



* CVE-2012-0866: Permissions on a function called by a trigger are not checked. (Les droits sur une fonction appelée par un trigger ne sont pas vérifiés)



Ce correctif empêche les utilisateurs de définir des triggers qui exécutent des fonctions pour lesquelles l'utilisateur n'a pas le droit EXECUTE.



CREATE TRIGGER ne parvenait pas à vérifier tous les droits sur la fonction trigger à appeler. Un utilisateur sans droit pouvait attacher une fonction trigger à une table dont il est propriétaire et faire en sorte qu'elle soit exécutée avec les données de son choix. Habituellement, cela exécute la fonction avec les droits du propriétaire de la table et ne devrait pas donner de droits supplémentaires. Néanmoins, si une fonction trigger est marquée SECURITY DEFINER, une escalade des droits est possible.



* CVE-2012-0867: SSL certificate name checks are truncated to 32 characters, allowing connection spoofing under some circumstances. (Les vérifications du nom du certificat SSL sont tronquées à 32 caractères, permettant un « spoofing » de connexion dans certaines circonstances)



Cela corrige le tronquage du nom commun SSL, qui permettait à un attaquant le détournement d'une connexion SSL dans des circonstances exceptionnelles.



Lors de l'utilisation de certificats SSL, les clients et serveurs peuvent être configurés pour vérifier le nom d'hôte de l'autre partie par rapport au nom commun compris dans le certificat que cette partie présente. Néanmoins, le nom extrait à partir du certificat était tronqué par erreur à 32 caractères. Habituellement, cela résulte en un échec de la vérification mais si le nom actuel de l'hôte fait exactement 32 caractères, il pourrait, en principe, être forgé. Le risque est très mince et un attaquant aurait toujours besoin de réaliser d'autres étapes, en dehors de PostgreSQL, pour réussir à exploiter cela.



* CVE-2012-0868: Line breaks in object names can be exploited to execute code when loading a pg_dump file. (Les sauts de lignes dans le nom des objets peuvent être exploités pour exécuter du code lors du chargement d'un fichier pg_dump)



Ce correctif supprime les caractères \n et \r des commentaires compris dans la sauvegarde.



pg_dump copiait les noms des objets dans des commentaires du script SQL sans les sécuriser. Un nom d'objet contenant un retour à la ligne suivi d'une commande SQL résultait en l'exécution de cette commande lors de la restauration. Si le script SQL contenant la sauvegarde est exécuté, la commande s'exécute avec les droits de la personne qui restaure la sauvegarde, souvent un superutilisateur.



Toutes les versions supportées de PostgreSQL sont affectées. Les notes de version de chaque branche contiennent une liste complète des modifications avec de nombreux détails.



Téléchargez les nouvelles versions maintenant sur :



* [http://www.postgresql.org/download/]

* Code source: [http://www.postgresql.org/ftp/source/]

* Paquets binaires: h[ttp://www.postgresql.org/ftp/binary/]

* Installeur One-click (dont le paquet Windows): [http://www.enterprisedb.com/products-services-training/pgdownload]



La version originale de cette annonce est disponible ici :

[http://www.postgresql.org/about/news/1377/]



Merci à Guillaume pour la traduction !