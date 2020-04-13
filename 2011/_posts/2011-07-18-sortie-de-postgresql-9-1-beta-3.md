---
layout: post
title: "Sortie de PostgreSQL 9.1 bêta 3"
author: "daamien"
redirect_from: "index.php?post/2011-07-18-sortie-de-postgresql-9-1-beta-3 "
---




<!--more-->


La troisième version bêta de PostgreSQL 9.1 est désormais disponible. Cette bêta corrige plusieurs problèmes remontés avec PostgreSQL 9.1 beta 2. Tous les utilisateurs sont invités à aider le projet en téléchargeant et en testant PostgreSQL 9.1 beta 3 dès que possible.



De nombreux utilisateurs ont déjà apporté leur aide en testant la bêta 2 et en rapportant les éventuelles erreurs rencontrées, notamment plusieurs problèmes concernant l'une des nouvelles fonctionnalités innovantes  : l'exécution sérielle de transaction ( Serializable Snapshot Isolation )



Parmi les autres problèmes corrigés dans la version bêta 3 ont trouve :



* Des problèmes de compilation de PL/Python

* Une grammaire trop pauvre pour la déclaration NOT VALID CONSTRAINT

* Des erreurs dans la documentation de FOREIGN TABLE

* Des opérateurs Btree_GiST non fonctionnels

* Un affaiblissement dangereux des verrous d'ALTER TABLE



Merci  aux utilisateurs qui ont rapporté ces problèmes et contribué à leurs corrections.



Si vous avez déjà testé les fonctionnalités de la version 9.1 et remonté des bugs sur la bêta 2 ou sur des alphas, téléchargez la bêta 3 et vérifier que ces bugs sont corrigés.

Les utilisateurs qui peuvent essayer la version 9.1 sont invités à lire le How To du bêta-testeur : http://wiki.postgresql.org/wiki/HowToBetaTest



Puisqu'il s'agit d'une version bêta, elle n'est pas prête pour l'utilisation en production. Toutefois, la liste des nouvelles fonctionnalités et des APIs est maintenant figée, ce qui signifie que les développeurs peuvent utiliser cette version pour leur applications en développement. Cette bêta sera éventuellement suivie d'autres versions bêta, puis d'un ou plusieurs versions candidate qui paraîtront avant la sortie de la version finale.



Cette bêta est disponible sous deux formes : le code source et les installateurs pour Windows, Mac OSX and Linux. Des paquets binaires pour les différentes distributions Linux ainsi que pour d'autres système d'exploitation devraient être disponibles dans les deux prochaines semaines.



Quelque liens :



* Site officiel de PostgreSQL : [[http://www.postgresql.org]]

* Téléchargement : [[http://www.postgresql.org/download/]]

* Infos sur les tests de versions bêta : [[http://www.postgresql.org/developer/beta]]

* Note de version de PostgreSQL 9.1 : [[http://www.postgresql.org/docs/9.1/static/release-9-1.html]]

* Documentation de PostgreSQL 9.1 : [[http://www.postgresql.org/docs/9.1/static/index.html]]



PS : Ceci est une adaptation libre de l'annonce officielle. La version

originale de ce texte est disponible ici : [[http://www.postgresql.org/about/news.1331]]