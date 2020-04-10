---
layout: post
title: "Sortie de PostgreSQL 9.1 bêta 2"
author: "daamien"
redirect_from: "index.php?post/2011-06-13-sortie-de-postgresql-9-1-beta-2 "
---



La seconde version bêta de PostgreSQL 9.1 est désormais disponible. Cette bêta corrige plusieurs problèmes signalés sur la version 9.1 bêta 1. Tous les utilisateurs qui souhaitent aider le projet peuvent télécharger et tester PostgreSQL 9.1 bêta 2 dès que possible.



Plusieurs utilisateurs ont déjà contribué en grâce à leurs tests et aux bugs qu'ils ont remontés. Le problème le plus significatif provoquait une erreur de segmentation ("segfault")

sur les versions Windows de PostgreSQL lorsque l'on tentait de modifier un champs datetime à partir de chaînes contenant des mots-clés tels que  'now' ou 'infinity'.



Parmi les autres problèmes résolus par la beta2, on trouve :



* Plusieurs problèmes liés aux collations sur une colonne spécifique 

* Plusieurs problèmes liés à l'Isolation Sérialisée des Snapshots (Serializable Snapshot Isolation)

* Corrections sur les nouveaux modes de pg_ctl

* Faire fonctionner pg_upgrade avec les nouvelles fonctionnalités de la version 9.1

* Correction des problèmes de compilation de PostgreSQL sous MSVC

* Correction de problèmes avec le domaines dans des tableaux

* Correction de problèmes avec les tables non-journalisées (unlogged tables)

* Changement dans l'authentification "peer" avec les connections via socket Unix

* Assortiments de corrections dans plperl

* Ajouts et amélioration de la documentation

* Mise à jour des traductions



Si vous avez testé la version 9.1 et soumis des rapport de bugs pour la version Beta 1 ou pour une Alpha, merci de télécharger la version Beta 2 et vérifier que chaque problème remonté a été résolu. Les utilisateurs qui peuvent participer aux tests de la version 9.1 sont invités à lire les instructions suivantes avant de se lancer dans les tests  : http://wiki.postgresql.org/wiki/HowToBetaTest



Puisqu'il s'agit d'une version bêta, elle n'est pas prête pour l'utilisation en production. Toutefois, la liste des nouvelles fonctionnalités et des APIs est maintenant figée, ce qui signifie que les développeurs peuvent utiliser cette version pour leur applications en développement. Cette bêta sera éventuellement suivie d'autres versions bêta, puis d'un ou plusieurs versions candidate qui paraitront avant la sortie de la version finale. 



Cette bêta est disponible sous deux formes : le code source et les installateurs pour Windows, Mac OSX and Linux. 

Des paquets binaires pour les différentes distributions Linux ainsi que pour d'autres système d'exploitation devraient être disponibles dans les deux prochaines semaines.





++Quelque liens :++



* Site officiel de PostgreSQL : http://www.postgresql.org

* Téléchargement : http://www.postgresql.org/download/

* Infos sur les tests de versions bêta : http://www.postgresql.org/developer/beta

* Note de version de PostgreSQL 9.1 : http://www.postgresql.org/docs/9.1/static/release-9-1.html

* Documentation de PostgreSQL 9.1 :  http://www.postgresql.org/docs/9.1/static/index.html





%%%



----



Ce texte est une traduction libre de l'annonce officielle publiée en anglais ici :

http://www.postgresql.org/about/news.1323