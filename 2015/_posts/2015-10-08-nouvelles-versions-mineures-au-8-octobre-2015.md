---
layout: post
title: "Nouvelles versions mineures au 8 octobre 2015"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/2015/10/08/Nouvelles-versions-mineures-au-8-octobre-2015"
---


<p>Le PostgreSQL Global Development Group a publié une mise à jour de

toutes les versions maintenues du système de gestion de bases de

données.<br />

Cette mise à jour inclut les versions 9.4.5, 9.3.10, 9.2.14, 9.1.19 et 9.0.23. <br />

Elle corrige deux failles de sécurité, et les bogues découverts au cours des 4 derniers mois.<br />

Les utilisateurs vulnérables aux failles de sécurité doivent procéder à la mise à jour le plus vite possible.<br />

Les autres peuvent utiliser la prochaine fenêtre de maintenance programmée pour procéder à la mise à jour.<br />

<br />

Il s'agit également de la dernière version corrective pour la branche 9.0.

</p>

<!--more-->


<h2>2015-10-08 Correctif de sécurité</h2>

Le PostgreSQL Global Development Group a publié une mise à jour de toutes les versions maintenues du système de gestion de bases de données.<br />

Cette mise à jour inclut les versions 9.4.5, 9.3.10, 9.2.14, 9.1.19 et 9.0.23. <br />

Elle corrige deux failles de sécurité, et les bogues découverts au cours des 4 derniers mois.<br />

Les utilisateurs vulnérables aux failles de sécurité doivent procéder à la mise à jour le plus vite possible.<br />

Les autres peuvent utiliser la prochaine fenêtre de maintenance programmée pour procéder à la mise à jour.<br />

<br />

Il s'agit également de la dernière version corrective pour la branche 9.0.

<h2>Correctifs de sécurité</h2>

Deux failles de sécurité ont été corrigées.<br />

Elles concernent les utilisateurs des fonctionnalités suivantes :

<strong>CVE-2015-5289</strong> : les valeurs json ou jsonb en entrée, construites à partir de saisies utilisateurs aléatoires, peuvent entraîner un crash de PostgreSQL et un déni de service.<br />

<strong>CVE-2015-5288</strong> : La fonction crypt() incluse dans le paquet d'extension optionnel pgCrypto peut être exploitée pour lire quelques octets supplémentaires de mémoire. Aucun exploit fonctionnel n'a été développé pour cette faille.<br />

Le projet PostgreSQL est redevable à Josh Kupershmidt et Oskari Saarenmaa pour la découverte de ces failles.<br />

Cette mise à jour désactive également la renégociation SSL par défaut.<br />

Auparavant, elle était activée par défaut.<br />

La renégociation SSL sera complètement supprimée des versions de PostgreSQL postérieures à la 9.5.<br />

<h2>Autres correctifs et améliorations</h2>

En plus de ce qui précède, d'autres problèmes, remontés par les utilisateurs au cours des derniers mois, ont été corrigés.

Citons :

<ul>

<li> Empêcher les expressions rationnelles imbriquées et comparaisons LIKE et SIMILAR de crasher le serveur ;

</li>

<li> De nombreux autres correctifs de gestion des expressions rationnnelles ;

</li>

<li> S'assurer que ALTER TABLE positionne tous les verrous pour les modifications de contraintes ;

</li>

<li> Nettoyer les sous-transactions pour éviter les crashs serveur en cas d'échec d'un curseur ;

</li>

<li> Éviter les deadlocks lors d'insertions dans les WAL lorsque commit_delay est défini ;

</li>

<li> Correction du verrouillage lors de l'actualisation de vues modifiables ;

</li>

<li> Éviter la corruption de l'« init file » du cache des relations ;

</li>

<li> Amélioration de la performance des résultats des requêtes SPI volumineuses ;

</li>

<li> Amélioration du temps de démarrage du LISTEN ;

</li>

<li> Désactivation de la renégociation SSL par défaut ;

</li>

<li> Diminution de la valeur minimale des paramètres *_freeze_max_age ;

</li>

<li> Limitation de la valeur maximale des wal_buffers à 2 Go ;

</li>

<li> Se prémunir des possibles dépassements de piles en différents endroits ;

</li>

<li> Correction de la gestion de DOW, DOY dans les dates saisies en entrée ;

</li>

<li> Permettre aux requêtes à expressions rationnelles d'être annulées plus rapidement ;

</li>

<li> Correction de bogues du planificateur ;

</li>

<li> Correction de plusieurs problèmes d'arrêt du postmaster ;

</li>

<li> Rendre l'autovacuum de prévention du wraparound plus robuste ;

</li>

<li> Correction de quelques problèmes mineurs sur les index GIN et SP-GiST ;

</li>

<li> Correction de différents problèmes sur PL/Python, PL/Perl et PL/Tcl ;

</li>

<li> Amélioration du ramasse-miettes de pg_stat_statements ;

</li>

<li> Amélioration de la gestion des collations dans pgsql_fdw ;

</li>

<li> Amélioration de la gestion par libpq des conditions de dépassement mémoire ;

</li>

<li> Éviter le crash de psql quand il n'y a pas de connexion établie ;

</li>

<li> Diverses corrections de pg_dump, dont les permissions sur les fichiers et objets ;

</li>

<li> Amélioration de la gestion des privilèges lors de sauvegardes de bases d'anciennes versions de PostgreSQL ;

</li>

<li> Corrections spécifiques aux plateformes Alpha, PPC, AIX et Solaris ;

</li>

<li> Correction de problèmes au démarrage sous Windows en locale Chinoise ;

</li>

<li> Correction du script Windows install.bat pour gérer les espaces dans les noms de fichiers ;

</li>

<li> Rendre disponible aux extensions le numéro de version de PostgreSQL au format numérique.

</li>

</ul>

Cette version contient également la mise à jour 2015g de tzdata, avec les correctifs pour les Iles Caïmans, Fidji, La Moldavie, le Maroc, Norfolk Island, la Corée du Nord, La Turquie, l'Uruguay, et la nouvelle zone America/Fort_Nelson.

<h2>Dernier correctif pour la version 9.0</h2>

9.0.23 est la dernière mise à jour pour la branche 9.0. Comme prévu, cette branche arrive en fin de vie.<br />

Les prochaines mises à jour de sécurité n'inclueront plus la version 9.0.<br />

C'est pourquoi les utilisateurs de cette branche sont encouragés à passer à une version plus récente dès que possible.<br /><br />

Pour plus d'informations sur la politique de support de la communauté et les échéances de fin de vie, on peut se référer à la page [Politique de versions](http://www.postgresql.org/support/versioning/).<br />

<h2>Mise à jour</h2>

Toutes les mises à jour de PostgreSQL sont cumulatives.<br />

Comme pour les autres versions mineures, il n'est pas nécessaire d'extraire et recharger les bases ou d'utiliser pg_upgrade pour appliquer cette mise à jour. Il suffit d'arrêter PostgreSQL, et de mettre à jour les binaires.<br />

Les utilisateurs qui auraient laissé passer plusieurs mises à jour auront éventuellement quelques étapes post-mise à jour à effectuer.<br />

Pour les détails, on peut se référer aux notes de versions.<br />

<h2>Liens</h2>

<ul>

<li> [Téléchargement](http://www.postgresql.org/download)

</li>

<li> [Notes de version](http://www.postgresql.org/docs/current/static/release.html)

</li>

<li> [Page de sécurité](http://www.postgresql.org/support/security/)

</li>

</ul>