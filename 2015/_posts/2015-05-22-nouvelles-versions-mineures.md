---
layout: post
title: "Nouvelles versions mineures"
author: "sas"
redirect_from: "index.php?post/2015-05-22-nouvelles-versions-mineures "
---




<!--more-->


Le PostgreSQL Global Development Group a publié un correctif qui concerne de nombreuses fonctionnalités et failles de sécurité. 

Toutes les versions de PostgreSQL sont concernées. Les nouvelles versions sont 9.4.2, 9.3.7, 9.2.11, 9.1.16 et 9.0.20.

La mise à jour contient le correctif d'une possible corruption de données sur les versions 9.3 et 9.4 de PostgreSQL. Il est recommandé de procéder à la mise à jour dès que possible.





!!!!Correctif de la corruption de données



Les utilisateurs des versions 9.3 et 9.4 sont concernés par ce correctif. Les versions 9.2 ou précédentes ne sont pas affectées.

La mise à jour corrige le problème du bouclage d'identifiant « multixact » ("multixact wraparound"), qui induit une corruption ou une perte de données. Les utilisateurs dont le taux de transactions est très élevé (1 million par heure) sur des bases ayant de nombreuses clés étrangères sont particulièrement vulnérables. 

Il est plus que recommandé de procéder aux mises à jour des installations dans les prochains jours.



!!!!Correctifs de sécurité



Cette mise à jour corrige trois failles de sécurité rapportées ces derniers mois. Aucune n'est particulièrement urgente. Toutefois, il est conseillé aux utilisateurs de vérifier si leurs installations sont concernées.



    CVE-2015-3165 Double libération de mémoire après timeout d'authentification.

    CVE-2015-3166 Erreurs imprévues de la bibliothèque standard

    CVE-2015-3167 pgcrypto contient plusieurs messages d'erreur lors de déchiffrement avec une mauvaise clé.



Il est également conseillé aux utilisateurs des authentifications par Kerberos, GSSAPI, ou SSPI de positionner include_realm à 1 dans le fichier pg_hba.conf, cette valeur devenant la valeur par défaut dans les futures versions.



Pour plus d'informations sur ces failles, on peut se référer aux pages de sécurité sur le site de PostgreSQL.



!!!!Autres correctifs et améliorations



Une nouvelle version, qui n'est pas celle par défaut, de l'extension citext corrige les fonctions regexp_matches() précédemment non-documentées, pour les aligner sur les versions texte usuelles de ces fonctions. La version corrigée utilisant un type de retour différent de l'ancienne, il est nécessaire de tester les applications avant d'exécuter la commande "ALTER EXTENSION citext UPDATE".



Plus de 50 autres correctifs sont fournis par ces mises à jour. 

La plupart concernent l'ensemble des versions supportées. 



On peut citer :

  * la traduction des dates et estampilles temporelles infinies en "infinity" lors de conversion en json ;

  * la correction des fonctions json/jsonb populate_record() et to_record() ;

  * la correction de la vérification des contraintes d'exclusion différée ;

  * l'amélioration de la planification des requêtes touchant plusieurs schémas ;

  * la correction de trois problèmes de jointures ;

  * la garantie de verrouillage correct lors de l'utilisation de barrières de sécurité ("security barriers") dans les vues ;

  * la correction du verrou mort au démarrage lorsque le paramètre max_prepared_transactions est trop faible ;

  * le parcours récusif par fsync() du répertoire de données après un crash ;

  * la correction du lanceur d'autovacuum qui pouvait ne pas s'arrêter ;

  * la gestion de signaux inattendus dans la fonction LockBufferForCleanup() ;

  * la correction du crash de COPY IN vers une table possédant des contraintes de vérification ;

  * la suppression de l'attente de réplication synchrone sur les transactions en lecture seule ;

  * la correction de deux problèmes sur les index hash ;

  * la suppression des fuites mémoire lors de vacuum sur les index GIN ; 

  * la correction de deux problèmes sur les « background workers » ;

  * plusieurs corrections sur la réplication par décodage logique ;

  * plusieurs corrections sur pg_dump et pg_ugrade.



Cette version inclut une mise à jour vers la version 2015d de tzdata, avec les mise à jour pour l'Egypte, la Mongolie, la Palestine, et des modifications historiques pour le Canada et le Chili.



!!!!Fin de vie proche pour la branche 9.0



La version 9.0 arrive en fin de vie en septembre 2015. Il est probable que cette mise à jour soit une des dernières de cette branche. Les utilisateurs de PostgreSQL 9.0 peuvent commencer à planifier la mise à jour vers une version plus récente. Voir la page d'information sur les versions (http://www.postgresql.org/support/versioning ) pour de plus amples informations sur les dates de fin de vie.



Comme pour les autres versions mineures, il n'est pas nécessaire d'extraire et recharger les bases ou d'utiliser pg_upgrade pour appliquer cette mise à jour. Il suffit d'arrêter PostgreSQL, et de mettre à jour les binaires.



Les utilisateurs de l'extension citext auront une commande à jouer. 



Les utilisateurs ayant négligé les mises à jour précédentes auront peut-être quelques actions post-mise à jour à effectuer.



!!!!Liens :

  * [Téléchargement|http://www.postgresql.org/download]

  * [Notes de version|http://www.postgresql.org/docs/current/static/release.html]

  * [Page sécurité|http://www.postgresql.org/support/security/]