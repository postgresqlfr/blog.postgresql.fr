---
layout: post
title: "Nouvelles versions mineures (8.3.5, 8.2.11...)"
author: "gleu"
redirect_from: "index.php?post/2008-11-04-nouvelles-versions-mineures-8-3-5-8-2-11 "
---




<!--more-->


De nouvelles versions mineures sont apparues aujourd'hui pour toutes les branches actives de PostgreSQL : cela nous donne donc les versions 8.3.5, 8.2.11, 8.1.15, 8.0.19 et 7.4.23. Ces mises à jour sont critiques pour les utilisateurs d'[index GiST|http://docs.postgresqlfr.org/8.3/gist.html|fr] et pour ceux qui ont des bases de données en langue autre que l'anglais. Mettez à jour dès que possible.



Ces versions, qui corrigent des problèmes rapportés il y a moins de deux semaines, démontrent, si besoin était, la rapidité et l'implication du projet PostgreSQL pour déployer des patchs lors de problèmes sérieux.



Les index GiST sont utilisés pour la [recherche plein texte|http://docs.postgresql.fr/8.3/textsearch.html|fr], ainsi que par les modules [LTree|http://docs.postgresql.fr/8.3/ltree.html|fr], [Intarray|http://docs.postgresql.fr/8.3/intarray.html|fr] et [Earthdistance|http://docs.postgresql.fr/8.3/earthdistance.html|fr], sans compter l'extension géographique [PostGIS|http://www.postgis.fr|fr]. Dans la dernière mise à jour groupée, un bug a été introduit causant la perte de quelques entrées d'index. Si vous utilisez les versions 8.3.4, 8.2.10 ou 8.1.14, nous vous recommandons d'exécuter [REINDEX|http://docs.postgresql.fr/8.3/sql-reindex.html|fr] sur tous vos index GiST après avoir mis à jour.



Il y a 23 autres corrections mineures dans ces mises à jour, notamment des mises à jour pour les fuseaux horaires de l'Argentine, du Brésil, de l'Île Maurice et de la Syrie. Voir les [notes de version|http://docs.postgresql.fr/8.3/release.html|fr] pour plus de détails.



Comme pour les autres versions mineures, vous n'avez pas besoin de sauvegarder et recharger leur bases de données pour mettre à jour. Vous pouvez simplement arrêter PostgreSQL, mettre à jour les binaires et redémarrer. Les utilisateurs ne possédant pas encore la précédente mise à jour doivent consulter les notes de versions pour de possibles étapes supplémentaires. Comme annoncé précédemment, seules les versions 8.2.11 et 8.3.5 des binaires Windows sont disponibles, les versions plus anciennes n'étant pas supportées sous Windows.