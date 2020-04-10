---
layout: post
title: "Nouvelles versions mineures (8.4.1, 8.3.8, 8.2.14...)"
author: "gleu"
redirect_from: "index.php?post/2009-09-10-nouvelles-versions-mineures-8-4-1-8-3-8-8-2-14 "
---



De nouvelles versions mineures sont apparues aujourd'hui pour toutes les branches actives de PostgreSQL : ce sont donc les versions 8.4.1, 8.3.8, 8.2.14, 8.1.18, 8.0.22 et 7.4.26. Elles corrigent trois failles de sécurité (une de niveau moyen et deux de niveau bas) : un problème d'authentification, un problème de déni de service et un problème d'escalade de droits. Tous les utilisateurs devraient mettre à jour leurs installations dès que possible.



Cette mise à jour corrige aussi le problème du message d'erreur « could not reattach shared memory » qui a posé de nombreux soucis aux utilisateurs Windows de PostgreSQL. Il y a quelques 23 autres corrections mineures dans ces mises à jour, la plupart affectant la version 8.4. Voir les notes de version pour plus de détails.



Comme pour les autres versions mineures, vous n'avez pas besoin de sauvegarder et recharger leur bases de données pour mettre à jour. Vous pouvez simplement arrêter PostgreSQL, mettre à jour les binaires et redémarrer. Les utilisateurs ne possédant pas encore la précédente mise à jour doivent consulter les notes de versions pour de possibles étapes supplémentaires. Comme annoncé précédemment, seules les versions 8.2.14, 8.3.8 et 8.4.1 des binaires Windows sont disponibles, les versions plus anciennes n'étant pas supportées sous Windows.