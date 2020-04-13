---
layout: post
title: "Sortie de PostgreSQL 9.1 RC 1"
author: "daamien"
redirect_from: "index.php?post/2011-08-24-sortie-de-postgresql-9-1-rc-1 "
---




<!--more-->


La première version candidate (RC1) de PostgreSQL 9.1 est disponible. Cette version contient des correctifs pour tous les bugs remontés sur les

différentes bêtas de la version 9.1. Afin d'éviter tout bug sur la version de production, il est essentiel que les utilisateurs testent cette version et vérifie que toutes les erreurs sont effectivement corrigés.



De nombreux utilisateurs ont déjà aidé en testant la bêta 3 et en remontant les problèmes rencontrés. 



Parmi les problèmes corrigés, citons :

* l'échec de pg_upgrade avec les tables temporaires orphelines ;

* l'erreur de pg_restore avec standard_conforming_strings ;

* les soucis rencontrés avec SSI et le two-phase commit.



Merci à tous les utilisateurs qui ont rapporté les bugs et contribué à leurs résolutions.



Si vous avez testé les fonctionnalités de la version 9.1 précédemment et 

remonté des erreurs sur la bêta 3 ou les alphas précédentes, téléchargez la version RC1

et vérifiez que les problèmes sont désormais résolus.

Il est possible que la sortie de la version 9.1.0 soit précédée par la publication d'autres versions candidates.



la RC1 de PostgreSQL 9.1 est publié sous deux formes : le code source et les installateurs (ou paquets binaires) pour Windows, Mac OSX et Linux.



Quelque liens :



* Site officiel de PostgreSQL : [http://www.postgresql.org]

* Téléchargement : [http://www.postgresql.org/download/]

* Infos sur les tests de versions bêta : [http://www.postgresql.org/developer/beta]

* Note de version de PostgreSQL 9.1 : [http://www.postgresql.org/docs/9.1/static/release-9-1.html]

* Documentation de PostgreSQL 9.1 : [http://www.postgresql.org/docs/9.1/static/index.html]



PS : Ceci est une adaptation libre de l'annonce officielle. La version

originale de ce texte est disponible ici : [http://www.postgresql.org/about/news.1341]