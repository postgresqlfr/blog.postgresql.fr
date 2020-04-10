---
layout: post
title: "PostgreSQL 9.0 Beta 4 disponible"
author: "sas"
redirect_from: "index.php?post/2010-08-02-postgresql-9-0-beta-4-disponible "
---



Billet original de Selena Deckelmann, corrigé par Josh Berkus. Traductions de Stéphane Schildknecht.



La quatrième version bêta de PostgreSQL 9.0 est désormais disponible.

Elle contient divers correctifs et quelques changements par rapport à la bêta 3.



Plus elle sera téléchargée, installée, et testée, plus nous nous rapprocherons

de la version 9.0 finale. Il est d'ailleurs fort probable qu'il s'agisse de la dernière version bêta.



Quelques modifications significatives ont été introduites dans la bêta 4 

qui requièrent que les applications soient re-testées au regard de la version

9.0. 



Le changement le plus significatif pour l'utilisateur concerne la remontée d'informations par \timing, même lorsque psql tourne en mode "quiet" (silencieux).

Ces modifications incluent :



* une remontée correcte des erreurs d'espace disque et le non-chargement

du .psqlrc lors de l'utilisation de pg_upgrade;

* une vérification compète du certificat SSL lorsque « host » et « hostaddr »

sont tous deux précisés, rétro-correctif en 8.4 ;

* un correctif pour la gestion des objets SQL/MED par pg_dump ;

* un correctif et amélioration des performances pour le parcours de pointeurs d'index GIN à trous ;

* un correctif pour une possible corruption de page dans ALTER TABLE .. SET TABLESPACE ;

* la ré-exécution correcte de CREATE TABLESPACE lors d'une récupération après incident ;

* le nettoyage des sous-transactions dans les boucles FOR, et la limitation des niveaux de

récursions lors de l'assignation des XID sur des niveaux multiples de sous-transactions, 

tous deux rétro-corrigés en 8.0.



À l'inverse des versions bêta précédentes, il n'y a pas eu de modification du catalogue système par rapport à la bêta3. initdb n'est donc pas nécessaire pour une mise à jour de la bêta3. En revanche, une mise à jour depuis des versions bêta plus anciennes nécessite un initdb et un 

rechargement de la base.



Nous vous encourageons à utiliser cette opportunité pour tester pg_upgrade pour les mises à jour 

à partir d'une version bêta plus ancienne de la version 9.0.

Merci de remonter vos résultats.



Si vous pouvez nous aider à tester la version bêta, jetez un œil à la page :

http://wiki.postgresql.org/wiki/HowToBetaTest



Les bêtas ne sont pas stable, et ne doivent, par conséquent, jamais être utilisées en 

environnement de production ; elles n'ont d'autre but que d'être testées.

Une version « release candidate » sera bientôt disponible.



Le code source et les installeurs binaires pour de nombreuses plateformes 

sont disponibles sur le site de PostgreSQL :

* Source: http://www.postgresql.org/ftp/source/v9.0beta4

* One-Click installer dont version Windows 64bits :

http://www.enterprisedb.com/products/pgdownload.do

* binaires pour les autres plateformes : http://www.postgresql.org/ftp/binary/v9.0beta4

* Notes de version :

http://developer.postgresql.org/pgdocs/postgres/release-9-0.html

* Participer aux tests : http://www.postgresql.org/developer/beta