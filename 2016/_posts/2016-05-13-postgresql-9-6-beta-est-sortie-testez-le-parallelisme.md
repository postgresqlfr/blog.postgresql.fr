---
layout: post
title: "PostgreSQL 9.6 Beta est sortie ! Testez le parallèlisme"
author: "daamien"
redirect_from: "index.php?post/2016-05-13-postgresql-9-6-beta-est-sortie-testez-le-parallelisme "
---



Le PostgreSQL Global Development Group (PGDG) vient d'annoncer la sortie de la première version bêta de PostgreSQL 9.6. Cette version donne un aperçu de toutes les fonctionnalités qui seront présentes dans la version finale, même si certains détails peuvent encore changer. Le projet PostgreSQL encourage tous les utilisateurs à tester leurs applications sur cette version.



!!!!Fonctionnalités principales de la 9.6



La version 9.6 contient des changements importants et des améliorations prometteuses, notamment :



* Le parallélisme : les parcours séquentiels, les jointures et les agrégats peuvent désormais être exécutés en parallèle

* La cohérence des lectures entre plusieurs noeuds Hot Standby synchrones

* la recherche plein-texte de phrases ;

* Le connecteur postgres_fdw peut exécuter les tris, jointures, UPDATEs, DELETEs sur les serveurs distants ;

* La réduction de l'impact des autovacuum sur les grandes tables en évitant de "refreezer" les données anciennes.



Parmi ces nouveautés, le parallèlisme devrait apporter un gain de performance important pour certaines requêtes.



!!!! La chasse aux bugs est ouvertes



Comme pour toutes les versions majeures, les améliorations de PostgreSQL impliquent des modifications sur de très grandes parties du code. La communauté PostgreSQL compte sur vous pour tester cette version dans votre contexte et signaler les bugs et les régressions avant la sortie de la version 9.6.0. Au-delà des nouvelles fonctionnalités, vous pouvez également tester si :



* les requêtes parallèles améliorent les performances pour vous ?

* les requêtes parallèles crashent ou provoquent des pertes de données ?

* PostgreSQL fonctionne correctement sur vos plateformes ?

* l'amélioration du vacuum freeze réduit l'autovacuum des tables volumineuses ?

* la recherche plein texte sur des phrases retourne les résultats attendus ?



La version 9.6 beta 1 modifie également l'API des backups binaires. Les DBA sont invités à tester la version 9.6 avec les outils de sauvegarde tels que pgBackRest, Barman, WAL-E ou tout autre outil interne ou packagé.



Il s'agit d'une beta et donc des modifications mineures sont possibles au niveau du comportement, des fonctionnalités et des APIs. Votre feedback et vos tests aideront à finaliser les nouveautés, alors attaquez les tests le plus rapidement possible ! La qualité des tests utilisateurs  a un impact important sur la date de sortie de la version finale.



!!!Calendrier



Ceci est la première version beta de la version 9.6. Le projet PostgreSQL sortira des versions beta supplémentaires aussi souvent que nécessaires, suivies de version candidates et enfin la version finale prévue pour fin 2016. Pour plus d'information, rendez-vous sur cette page : [http://www.postgresql.org/developer/beta/|http://www.postgresql.org/developer/beta/]



!!!! Liens



* Annonce officielle : [http://www.postgresql.org/about/news/1668/|http://www.postgresql.org/about/news/1668/]

* Nouveautés de PostgreSQL 9.6 : [|https://wiki.postgresql.org/wiki/NewIn96]

* Travaux en cour ssure la 9.6 : [https://wiki.postgresql.org/wiki/PostgreSQL_9.6_Open_Items|https://wiki.postgresql.org/wiki/PostgreSQL_9.6_Open_Items]

* Page de téléchargement : [|http://www.postgresql.org/download/]