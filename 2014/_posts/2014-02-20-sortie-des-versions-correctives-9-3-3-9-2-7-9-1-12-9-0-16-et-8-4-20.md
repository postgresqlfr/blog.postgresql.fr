---
layout: post
title: "Sortie des versions correctives 9.3.3, 9.2.7, 9.1.12, 9.0.16 et 8.4.20"
author: "sas"
redirect_from: "index.php?post/2014-02-20-sortie-des-versions-correctives-9-3-3-9-2-7-9-1-12-9-0-16-et-8-4-20 "
---



Le PostgreSQL Global Development Group publie aujourd'hui une mise-à-jour importante de toutes les versions supportées du SGBD PostgreSQL. Les versions publiées sont : 9.3.3, 9.2.7, 9.1.12, 9.0.16 et 8.4.20.



Cette mise-à-jour contient les correctifs de nombreux problèmes de sécurité et d'intégrité des données.



Cette mise-à-jour doit être appliquée avec la plus grande célérité, spécialement si la réplication binaire est utilisée, ou dans le cas d'applications sécurisées.





!!!!Correctifs de sécurité

--------------------------------------

Cette mise-à-jour corrige l'annonce de sécurité [CVE-2014-0060|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0060|en], qui relève que PostgreSQL n'applique pas correctement la permission WITH ADMIN OPTION de la gestion des rôles.%%%

Avant ce correctif, tout membre d'un ROLE pouvait accorder à d'autres la possibilité d'accéder à ce ROLE, même s'il n'avait pas le pouvoir WITH ADMIN OPTION.

Il corrige aussi plusieurs problèmes d'escalade de privilèges, dont :%%%

[CVE-2014-0061|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0061|en], %%%

[CVE-2014-0062|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0062|en], %%%

[CVE-2014-0063|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0063|en], %%%

[CVE-2014-0064|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0064|en], %%%

[CVE-2014-0065|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0065|en] et %%%

[CVE-2014-0066|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0066|en].  



Pour plus d'informations concernant ces problèmes, se référer aux [pages de sécurité|http://www.postgresql.org/support/security/|en] et au détail sur le [WIKI|http://wiki.postgresql.org/wiki/20140220securityrelease|en].



Avec cette version, nous alertons également les utilisateurs sur une faille de sécurité connue qui permet aux utilisateurs d'une même machine d'accéder à un compte système lors d'un "make check" en cas de compilation depuis les sources :

[CVE-2014-0067|http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2014-0067|en].



Cette faille ne peut être corrigée sans problème pour notre infrastructure de test, aussi nous publierons un correctif distinct, et publique. Cette vulnérabilité étant temporelle, il est fortement recommandé de ne pas lancer de "make check" sur des systèmes où se trouvent des comptes utilisateurs non approuvés.





!!!!Corectifs de réplication et d'intégrité des données

---------------------------------------------------



Cette mise-à-jour corrige également des problèmes affectant la réplication binaire et le verrouillage de niveau ligne, et peut conduire à des corruptions de données récupérables. 



Elle contient aussi des correctifs au verrouillage des pages d'index qui peut entraîner la corruption des index sur le réplica. 



Un correctif d'un bogue du gel de transaction est fourni pour la version 9.3. Ce bogue pouvait faire réapparaître d'anciennes versions de lignes au sein de bases qui ont subit de nombreuses boucles dans les ID de transactions.



3 bogues pouvant empêcher le démarrage de nouveaux serveurs en StandBy.



Enfin, cette version corrige un bogue de corruption de clés étrangères, bien que les clés doivent être réparées manuellement après l'application du correctif.



En version 9.3, ces correctifs résultent en l'ajout de nouveaux paramètres de configuration du serveur pour gérer le gel des multixact. 



À noter que les serveurs de secours doivent être mis à jour en 9.3.3 avant que le maître de réplication ne soit mis à jour, au risque de casser la réplication.





!!!!Autres améliorations

--------------------



En plus des informations précédentes, les problèmes suivants ont été corrigés :



* Correctif des traces binaires des modifications de la carte de visibilité ;

* S'assurer que les index GIN tracent toutes les insertions ;

* S'assurer que pause_at_recovery_target s'interrompe au bon moment ;

* S'assurer que walreceiver envoie les messages de retour hot-standby au bon moment ;

* Empêcher le code principal de perdre la main du fait de timeout ;

* Eliminer de nombreuses conditions de concurrence critique ;

* Corriger quelques HINTs dans les messages d'erreur ;

* Prévenir le blocage du serveur en cas de perte de la connexion SSL ;

* Correction de deux erreurs de gestion de l'Unicode ;

* Prévenir le crash sur certaines syntaxes de sous-requêtes ;

* Prévenir le crash lors de sélection sur des tables sans colonnes ;

* Correction de deux bogues sur LATERAL ;

* Correction de problèmes avec UNION ALL, le partitionnement et les updates ;

* S'assurer que ANALYZE comprenne les domaines sur intervalles ;

* Eliminer les vérifications de permissions lors de l'utilisation du tablespace par défaut ;

* Correction de fuites mémoire dans les fonctions JSON ;

* Autoriser les extensions sur déclencheurs par événement (event triggers) ;

* Distinguer correctement les nombres dans les sorties JSON ;

* Corriger les permissions pour pg_start_backup() et pg_stop_backup() ;

* Accepter SHIFT_JIS comme nom de locale ;

* Corriger le développement des .* pour les variables de fonctions SQL ;

* Prévenir les boucles sans fin dans quelques erreurs de COPY ;

* Plusieurs correctifs de problème client sous Windows ;

* Rendre possible la construction de PostgreSQL avec Visual Studio 2013 ;

* Mise-à-jour des fichiers de time zone en fonction des modifications récentes.



Des correctifs des modules suivants sont également publiés : ECPG, dblink, ISN, pgbench, pg_stat_statements et postgres_fdw. Les modifications et détails sont accessibles dans les notes de version de la documentation officielle.



Comme pour toute mise-à-jour mineure, il n'est pas nécessaire d'exporter/importer les bases ou d'utiliser pg_upgrade. Il suffit d'arrêter PostgreSQL, d'installer les nouveaux binaires, et de redémarrer.

Si des versions mineures ont été oubliées précédemment, il peut être nécessaire de procéder à des étapes supplémentaires. 

Tous les détails sont accessibles dans les notes de version de la documentation officielle.





!!!!Liens:

  * [Téléchargement|http://postgresql.org/download|en]

  * [Notes de version|http://www.postgresql.org/docs/current/static/release.html|en]

  * [Security Page|http://www.postgresql.org/support/security/|en]

  * [Security Issue Detail Page|http://wiki.postgresql.org/wiki/20140220securityrelease|en]