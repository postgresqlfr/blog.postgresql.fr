---
layout: post
title: "Important: Versions de sécurité pour PostgreSQL pour 7.2, 7.3 et 7.4!"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-43 "
---


<p></p>

<!--more-->


<p>Marc G. Fournier nous informait sur la liste pgsql-announce le 23 octobre 2004:</p>

<p>

En guise de réponse à un incident de sécurité publié tout récemment par iDefence, nous avons préparé une version de mise à jour pour PostgreSQL&nbsp;: les versions 7.2.6, 7.3.8 et 7.4.6.</p>

<p>

Bien que le risque ait été qualifié de «&nbsp;moyen&nbsp;» selon leur site web&nbsp;: «&nbsp;Une vulnérabilité existe dans la mesure où les fichiers temporaires sont créés de manière non sûre, ce qui permettrait à un utilisateur mal intentioné d'effacer arbitrairement ces fichiers&nbsp;».</p>

<p>

De plus, dans ces versions, une perte de données potentielle a récemment été identifiée&nbsp;:<br />

En cas de réparation, il pourrait se produire une mise à jour de certains bits sur le disque.<br />

Soit, en de rares circonstances, cela pourrait mener à des erreurs de type «&nbsp;impossible d'accéder au statut de la transaction&nbsp;», ce qui qualifie ce bogue de «&nbsp;pouvant amener à une une perte de données&nbsp;».</p>

<p>

Bien que ces versions ne soient pas encore disponible via Bittorent, elles sont disponibles sur le FTP et tous ses miroirs. Devrim travaille actuellement sur les RPM de ces nouvelles versions, ils devraient être disponibles rapidement.

</p>

<p>

Pour une liste de tous les miroirs FTP accessibles, merci de vous reporter au document suivant&nbsp;:<br />

<a href="http://www.postgresql.org/mirrors-ftp.html">http://www.postgresql.org/mirrors-ftp.html</a>

</p>