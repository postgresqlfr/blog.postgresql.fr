---
layout: post
title: "Nouvelles versions mineures (8.3.7, 8.2.13...)"
author: "gleu"
redirect_from: "index.php?post/2009-03-18-nouvelles-versions-mineures-8-3-7-8-2-13 "
---



De nouvelles versions mineures sont apparues aujourd'hui pour toutes les branches actives de PostgreSQL : cela nous donne donc les versions 8.3.7, 8.2.13, 8.1.17, 8.0.21 et 7.4.25. Ces mises à jour importantes cherchent à éviter une récursion infinie de messages d'erreur. Le problème est le suivant : une erreur est levée, PostgreSQL va chercher à convertir ce message dans la bonne langue et dans le bon encodage. Cette génération peut causer une autre erreur (de conversion cette fois). PostgreSQL va chercher de nouveau à traduire le message d'erreur et à le convertir, ce qui peut de nouveau générer une erreur. Etc. Le correctif appliqué est de ne pas traduire un message d'erreur et de ne pas convertir la locale si on détecte une possibilité de récursion.



Il y a une quinzaine d'autres corrections mineures dans ces mises à jour. Voir les [notes de version|http://docs.postgresql.fr/8.3/release.html|fr] pour plus de détails.



Comme pour les autres versions mineures, vous n'avez pas besoin de sauvegarder et recharger leur bases de données pour mettre à jour. Vous pouvez simplement arrêter PostgreSQL, mettre à jour les binaires et redémarrer. Les utilisateurs ne possédant pas encore la précédente mise à jour doivent consulter les notes de versions pour de possibles étapes supplémentaires. Comme annoncé précédemment, seules les versions 8.2.13 et 8.3.7 des binaires Windows sont disponibles, les versions plus anciennes n'étant pas supportées sous Windows.