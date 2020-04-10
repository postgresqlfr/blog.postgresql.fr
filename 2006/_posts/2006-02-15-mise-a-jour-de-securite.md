---
layout: post
title: "Mise à jour de sécurité"
author: "SAS"
redirect_from: "index.php?post/drupal-161 "
---



<p>

De nouvelles versions mineurs de PostgreSQL ont été réalisées. Elles contiennent un correctif pour un problème de sécurité présent dans la branche 8.1. Il est vivement recommandé à tous les utilisateurs de ces versions de les mettre à jour très rapidement.

</p>

<p>

Dans le même temps, les versions mineures 8.0.7, 7.4.12, et 7.3.14 ont été réalisées. Elles ne contiennent que des correctifs mineurs, ce qui permet de planifier plus sereinement les mises à jour. Si toute fois vous n'êtes pas confronté à l'un des bogues corrigés.

</p>

<p>

Le trou de sécurité des versions 8.1.x autorise un utilisateur authentifié à augmenter le niveau de droits de son ROLE, sous réserve qu'il connaisse le protocole serveur. Il n'y certes pas d'exploitation connue de cette faille à ce jour, mais il n'est peut-être pas recommandé d'y être confronté pour agir..

</p>

<p>

La version 8.1.3 contient également un certain nombre de correctifs (schémas et plantage), pour la plupart rencontrés avec des configurations très particulières (et très rares). Un correctif important concerne le code de génération des index GiST TSearch2, ce qui permet d'en accélérer leur création.

</p>

Pour plus de détails, voir :

<a href="http://www.postgresql.org/docs/8.1/static/release.html">http://www.postgresql.org/docs/8.1/static/release.html</a>

<p>

Toutes ces versions sont téléchargeables sur les mirroirs FTP ou BitTorrent :

<a href="http://www.postgresql.org/download/">http://www.postgresql.org/download/</a>

</p>