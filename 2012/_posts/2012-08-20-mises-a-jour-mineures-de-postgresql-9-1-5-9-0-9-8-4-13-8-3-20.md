---
layout: post
title: "Mises à jour mineures de PostgreSQL : 9.1.5, 9.0.9, 8.4.13, 8.3.20"
author: "daamien"
redirect_from: "index.php?post/2012-08-20-mises-a-jour-mineures-de-postgresql-9-1-5-9-0-9-8-4-13-8-3-20 "
---



Le projet PostgreSQL sort aujourd'hui des mises à jour de sécurité pour toutes les branches actives du SGBD PostgreSQL. Ces mises à jour correspondent aux versions 9.1.5, 9.0.9, 8.4.13 et 8.3.20.



Cette mise à jour corrige des failles de sécurité liées à libxml2 et libxslt, similaires à celles affectant les autres projets open source utilisant ces librairies. Il est conseillé à tous les administrateurs de bases de données PostgreSQL de mettre à jour leur version de PostgreSQL lors de leur prochain arrêt de maintenance. Vous trouverez plus de détails sur les corrections de failles de sécurité ci-dessous.



Cette publication de sécurité corrige une vulnérabilité dans les fonctionnalités intégrées XML et XSLT qui sont incluses avec l'extension en option XML2. Ces deux vulnérabilités permettent la lecture de fichiers arbitraires par n'importe quel utilisateur de base de données authentifié, et la vulnérabilité XSLT permet aussi l'écriture de fichiers. Les correctifs posent quelques problèmes de compatibilité ascendante. Cette mise à jour inclut deux correctifs de sécurité pour les failles suivantes : 



* [CVE-2012-3488: PostgreSQL insecure use of libxslt | http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2012-3488]



La librairie libxslt offre la possibilité de lire et d'écrire des fichiers et URLs au travers de commandes de feuilles de style, ce qui permet à un utilisateur non privilégié de la base de données de tenter de lire et d'écrire des données avec les privilèges du serveur de base de données. Il convient de désactiver cela au travers des propres options de sécurité de la librairie libxslt.



* [CVE-2012-3489: PostgreSQL insecure use of libxml2 | http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2012-3489]



La fonction xml_parse() pourrait tenter de récupérer des fichiers externes ou des URLs pour résoudre des DTD et des entités de références dans une valeur XML, ce qui permet à un utilisateur non privilégié de la base de données de tenter de ramener des données avec les privilèges du serveur de base de données. Même si les données externes ne sont pas renvoyées directement à l'utilisateur, des portions de ces données peuvent être exposées dans le message d'erreur affiché si les données XML sont détectés comme n'étant pas valides;  et dans tous les cas la possibilité de tester l'existence d'un fichier peut être utile pour un attaquant.



Les utilisateurs qui utilisent la fonctionnalité XML interne pour valider des DTD externes auront besoin de développer une solution de contournement car le patch de sécurité désactive cette fonctionnalité. Les utilisateurs qui utilisent xslt_process() pour rapporter des documents ou feuilles de style à partir d'URL externe ne seront plus capable de le faire. Le projet PostgreSQL regrette qu'il ait été nécessaire de désactiver ces deux fonctionnalités pour maintenir le niveau de sécurité habituel. Ces problèmes de sécurités sont relativement similaires aux problèmes corrigés récemment par les projets WebKit (CVE-2011-1774), XMLsec (CVE-2011-1425) et PHP5 (CVE-2012-0057).



Cette mise à jour contient également plusieurs correctifs pour la version 9.1 et un petit nombre de correctifs pour les anciennes versions :



* Mise à jour et corrections des données de timezone. 

* Nombreuses mises à jour et corrections dans la documentation.

* Ajout d'une limite à max_wal_senders.

* Corrections des dépendances générées pendant un ALTER TABLE ADD CONSTRAINT USING INDEX.

* Corrige le comportement des conversions unicode pour PL/Python.

* Correction de WITH attaché à un set d'opérations imbriquées (UNION/INTERSECT/EXCEPT).

* Correction du syslogger pour que log_truncate_on_rotation fonctionne lors de la première rotation.

* Autorise uniquement autovacuum à être automatiquement annulé par un processus directement bloqué.

* Amélioration des opérations des demande de file d'attente par fsync

* Empêche un cas particulier de core dump dans rfree().

* Corrige Walsender pour qu'il réponde correctement aux timeouts et deadlocks.

* Plusieurs corrections dans PL/Perl relatives à des problèmes d'encodage.

* Fait en sorte que les opérateurs de sélectivité utilisent la bonne collation.

* Empêche les esclaves inaptes d'être choisis pour la réplication synchrone.

* Fait en sorte que REASSIGN OWNED marche aussi avec les extensions.

* Corrige un cas non traité dans les comparaisons à base d'ENUM.

* Fait en sorte que NOTIFY prenne mieux en compte les problèmes out-of-disk-space.

* Corrige une fuite mémoire dans les sous-select de requêtes ARRAY.

* Réduction de la perte de données lors du basculement de la réplication.

* Corrige le comportement des sous transactions avec le Hot Standby.



Comme pour les autres versions mineures, il n'est pas nécessaire de sauvegarder et recharger les bases de données. Il n'est pas utile non plus d'utiliser pg_upgrade. Pour appliquer cette mise à jour, il suffit d'arrêter PostgreSQL, de mettre à jour les exécutables et de redémarrer PostgreSQL. Il faut réaliser les étapes post-mise-à-jour une fois le serveur redémarré.



Toutes les versions supportées de PostgreSQL sont affectées. Les notes

de version de chaque branche contiennent une liste complète des

modifications avec de nombreux détails.



Téléchargez les nouvelles versions maintenant sur :



* http://www.postgresql.org/download/

* Code source: http://www.postgresql.org/ftp/source/

* Paquets binaires: http://www.postgresql.org/ftp/binary/

* Installeur One-click (dont le paquet Windows): http://www.enterprisedb.com/products-services-training/pgdownload