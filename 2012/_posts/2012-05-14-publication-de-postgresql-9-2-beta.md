---
layout: post
title: "Publication de PostgreSQL 9.2 Beta"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/2012/05/14/Publication-de-PostgreSQL-9.2-Beta"
---




<!--more-->


Le PostgreSQL Global Development Group publie ce jour la version beta de PostgreSQL 9.2. Celle-ci améliore considérablement les performances et les possibilités d'extension verticale et horizontale.

L'aide de tous est requise pour tester cette version.



Les avancées principales en terme de performance et d'échelonnabilité incluent :

* Les parcours des seuls index, qui permettent aux utilisateurs d'éviter d'inefficaces parcours des tables ;

* la possibilité d'atteindre une charge de lecture sur 64 cœurs de plus de 300 000 requêtes/seconde ;

* des améliorations de la vitesse d'écriture des données, grâce notamment à la validation de transactions par groupe ;

* abaissement de la consommation CPU ;

* réplication en cascade, permettant une distribution géographiques des esclaves.



PostgreSQL 9.2 apporte aussi de nouvelles fonctionnalités pour les développeurs d'application, dont :



* le support des données JSON, autorisant les bases hybrides document-relationnelle ;

* les types échelle, ce qui permet de nouveaux types calendrier, échelles de temps, et d'applications analytiques ;

* de nombreuses améliorations de la commande ALTER, et de quelques autres instructions, facilitant les modifications de bases en production.



La liste complète des fonctionnalités de cette version est disponible sur la page des notes de version : http://www.postgresql.org/docs/devel/static/release-9-2.html



Le projet repose sur la participation active de la communauté à cette période de tests pour permettre la publication d'une version hautement performante et dénuée de bogues.



N'hésitez pas à télécharger PostgreSQL 9.2 béta, à la tester avec vos applications et votre charge, et à faire un retour aux développeurs de PostgreSQL.

Vous trouverez toutes les informations sur les tests et les rapports d'erreur à la page :

http://www.postgresql.org/developer/beta



Page de téléchargement, binaires, installeurs Windows, Linux et Mac :

http://www.postgresql.org/download



La documentation complète, installée avec PostgreSQL, est également disponible en ligne :

http://www.postgresql.org/docs/devel/static.