---
layout: post
title: "Nouvelles versions de « sécurité »"
author: "jca"
redirect_from: "index.php?post/drupal-94 "
---




<!--more-->


<p>Dans un mail sur -announce Marc G. Fournier nous annonce la sortie de version de sécurité pour les versions <strong>7.2.x</strong> à <strong>8.0.x</strong> : 7.2.8, 7.3.10, 7.4.8 et 8.0.3.<br />

Les problèmes relatifs à la sécurité ont déjà été reportés par Tom Lane ainsi qu'une méthode permettant de les circonvenir rapidement (dans la liste -hackers). Il est fortement conseillé de mettre à jour les plates-formes PostgreSQL ne disposant pas de ces numéro de version. Ces versions ont été créées uniquement dans le but de permettre une installation ou une mies à jour automatique tenant compte de ces correctifs.<br />

Nous vous conseillons de lire le fichier HISTORY incluses dans chacune des version pour connaitre la liste des changements. Cependant en voici une liste (non exhaustive) :

</p>

<ul>

<li>Changement de la signature de la fonction d'encodage afin de prévenir les mauvaises utilisations,</li>

<li>Changement dans « contrib/tsearch2 » afin d'éviter une utilisation hasardeuse et peu sure des résultats de la fonction INTERNAL,</li>

<li>Correction d'un problème de concurrence d'accès entre l'extension d'une relation et VACUUM. Ce problème peut avoir théoriquement causé des pertes de pages de données fraichement insérées, bien que ce scénario ait <em><strong>une faible probabilité d'occurence</strong></em>.</li>

</ul>

Il est possible de télécharger ces versions sur <a href="http://www.postgresql.org/download">http://www.postgresql.org/download</a>.<br />

Merci de bien vouloir reporter tout bug à l'adresse <a href="mailto:pgsql-bugs@postgresql.org">pgsql-bugs@postgresql.org</a>.