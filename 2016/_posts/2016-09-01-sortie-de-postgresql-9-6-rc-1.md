---
layout: post
title: "Sortie de PostgreSQL 9.6 RC 1"
author: "daamien"
redirect_from: "index.php?post/2016-09-04-sortie-de-postgresql-9-6-rc-1 "
---


Le groupe de développement de PostgreSQL (PGDG) vient d'annoncer la sortie de la première version  candidate de PostgreSQL 9.6. Cette version est théoriquement identique à la version finale qui sortira dans quelques semaines. Elle contient des corrections pour tous les problèmes identifiés lors de la phase de test.

<!--more-->


!!!! Changements depuis la version Beta 4

PostgreSQL 9.6 RC 1 corrige des bugs découverts par les utilisateurs qui ont testé la Betat 4, notamment :

  * Ajout de fonctions SQL pour inspecter les méthodes d'accès d'index
  * Corrections de bugs sur les index bloom
  * Ajout d'un test de régression pour l'instertion dans les TOAST
  * Meilleure gestion des locales pour les erreurs sur les requêtes parallèles
  * Beaucoup de mises à jour dans la documentation 

A partir de la version RC 1, le traitement parallèle  des requêtes est désactivé par défaut dans le fichier postgresql.conf. Les utilisateurs qui souhaitent paralleliser leurs requêtes doivent augmenter le paramètre max_parallel_workers_per_gather.

!!! Feuille de route

Cette version est la première candidate de PostgreSQL 9.6. D'autres versions candidates seront mises en ligne jusqu'à ce que tous les bugs remontés soient résolus et que la version 9.6.0 finale soit livrée. Pour plus d'information, rendez-vous sur la page dédiée aux tests sur les versions Beta.

!!! Liens

* Annonce officielle : [http://www.postgresql.org/about/news/1693/|http://www.postgresql.org/about/news/1693/]
* Nouveautés de PostgreSQL 9.6 : [https://wiki.postgresql.org/wiki/NewIn96|https://wiki.postgresql.org/wiki/NewIn96]
* Travaux en cour ssure la 9.6 : [https://wiki.postgresql.org/wiki/PostgreSQL_9.6_Open_Items|https://wiki.postgresql.org/wiki/PostgreSQL_9.6_Open_Items]
* Page de téléchargement : [http://www.postgresql.org/download/|http://www.postgresql.org/download/]