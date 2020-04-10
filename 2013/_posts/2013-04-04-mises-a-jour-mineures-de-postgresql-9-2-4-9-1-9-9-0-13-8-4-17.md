---
layout: post
title: "Mises à jour mineures de PostgreSQL : 9.2.4, 9.1.9, 9.0.13, 8.4.17"
author: "daamien"
redirect_from: "index.php?post/2013-04-04-mises-a-jour-mineures-de-postgresql-9-2-4-9-1-9-9-0-13-8-4-17 "
---



> 

> Ceci est une traduction libre de l'annonce officielle disponible ici : [http://www.postgresql.org/about/news/1456/|]

>



Le groupe de développement de PostgreSQL sort une mise à jour de sécurité pour toutes les versions stables du SGBD PostgreSQL. Cela inclut les versions 9.2.4, 9.1.9, 9.0.13 et 8.4.17. Cette mise à jour corrige une faille de sécurité très critique dans les versions 9.0 et supérieures. Il est fortement recommandé à tous les utilisateurs des versions concernées d'appliquer la mise à jour immédiatement.



La faille de sécurité corrigée dans cette version a la dénomination CVE-2013-1899. Elle permettait à une requête de connexion contenant un nom de base de données commençant par ”-” d'être utilisé afin d'endommager ou de détruire des fichiers dans le répertoire de données du serveur. Quiconque ayant accès au port d'écoute de PostgreSQL peut initier une telle requête. Cette faille a été découverte par Mitsumasa Kondo et Kyotaro Horiguchi du NTT Open Source Software Center.



Deux autres correctifs de failles de sécurité moins importantes sont également inclus dans cette version: CVE-2013-1900, où un nombre généré aléatoirement par les fonctions du module contrib pgcrypto pouvait être facile à deviner par un autre utilisateur de la base de données, et CVE-2013-1901, qui permet à tort à un utilisateur non autorisé de lancer des commandes qui peuvent interférer avec une sauvegarde en cours. Finalement, cette version résout également deux problèmes de sécurité pour les installeurs graphiques pour Linux et Mac OS X : transmission non sécurisée des mots de passe super utilisateur à un script (CVE-2013-1903) et utilisation de noms de fichiers prévisibles dans /tmp (CVE-2013-1902). Marko Kreen, Noah Misch et Stegan Kaltenbrunner ont respectivement rapportés ces failles.



Nous sommes reconnaissants des efforts de chacun des développeurs pour rendre PostgreSQL plus sûr.

Cette mise à jour corrige également plusieurs erreurs dans la gestion des index GiST. Après la mise à jour, il est conseillé d'utiliser un REINDEX sur chacun des index GiST qui correspondent à un des problèmes reportés ci-dessous.



Cette mise à jour contient également des correctifs à plusieurs problèmes mineurs découverts et corrigés par la communauté PostgreSQL durant les deux derniers mois, dont :

* Corriger les index GiST pour qu'ils n'utilisent plus de comparaisons géométriques «floues» pour des colonnes de type box, polygon, circle et point.

* Corriger un problème dans le module contrib btree_gist sur les index GiST pour des colonnes de type text, bytea et numeric.

* Corriger un bug dans le code de séparation pour les index GiST multi-colonnes.

* Corriger une fuite tampon dans le rejeu des WAL causant des erreurs « incorrect local pin count ».

* S'assurer d'effectuer la restauration après un arrêt brutal avant d'entrer en restauration d'archive après un arrêt brutal lorsque le fichier recovery.conf est présent.

* Éviter de supprimer les WAL non encore archivés lors d'une restauration après arrêt brutal.

* Corriger un problème de séquencement critique (race condition) lors d'un DELETE RETURNING.

* Corriger un crash possible du planificateur après l'ajout de colonnes à une vue dépendant d'une autre vue.

* Éliminer une fuite mémoire dans la fonction spi_prepare() de PL/Perl.

* Corriger pg_dumpall pour gérer correctement un nom de base de données contenant « = ».

* Éviter un crash de pg_dump lorsqu'une chaîne de connexion incorrecte est utilisée.

* Ignorer les index invalides dans pg_dump et pg_upgrade.

* Inclure uniquement le sous-répertoire de la version courante du serveur lors d'une sauvegarde d'un tablespace avec pg_basebackup.

* Ajouter une vérification de version de serveur dans les outils pg_basebackup et pg_receivexlog.

* Corriger le module contrib dblink pour gérer de manière sécurisée des valeurs incohérentes des paramètres DateStyle ou IntervalStyle.

* Corriger la fonction similarity() du module contrib pg_trgm pour retourner zéro pour les chaînes de moins d'un trigramme.

* Permettre la compilation de PostgreSQL avec Microsoft Visual Studio 2012.

* Mettre à jour les fichiers de données de fuseaux horaires pour les modifications de changements d'heure au Chili, Haïti, Maroc, Paraguay et quelques zones russes.



Comme avec les autres versions mineures, les utilisateurs n'ont besoin ni de sauvegarder et recharger leur instance, ni d'utiliser pg_upgrade pour appliquer cette mise à jour. Vous devez simplement arrêter PostgreSQL et mettre à jour les binaires. Les utilisateurs qui n'ont pas effectuées les mises à jour précédentes peuvent avoir quelques étapes supplémentaires. Les détails sont disponibles dans les notes de version (Release Notes). Pour cette version, il est aussi conseillé de reconstruire (REINDEX) les index de type GIST qui pourraient exister sur les bases.



Téléchargez les nouvelles versions maintenant sur :

[http://www.postgresql.org/download/|]



* FAQ du correctif de sécurité : [http://www.postgresql.fr/faq_correctif_20130404|]

* Code source: [http://www.postgresql.org/ftp/source/|]

* Paquets binaires: [http://www.postgresql.org/ftp/binary/|]

* Installeur One-click (dont le paquet Windows): [http://www.enterprisedb.com/products-services-training/pgdownload|]