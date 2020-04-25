---
layout: post
title: "Huit bases de données de 180 Gigas, réplication et plus..."
author: "Jean-Paul Argudo"
categories: [Événements]
redirect_from: "index.php?post/drupal/169"
---


<p>

Dans les listes de diffusion de PostgreSQL, il y a des moments de grâce parfois. Comme par exemple quand un utilisateur vient de lui-même présenter son usage de PostgreSQL. C'est ce qui est arrivé, une fois de plus, le 13 mars sur la liste <em>pgsql-advocacy</em>. Kevin Grittner nous a envoyé le mail suivant (<a href="http://archives.postgresql.org/pgsql-advocacy/2006-03/msg00113.php" target="_blank">mail original en anglais</a>):

</p>

<!--more-->


Le Système de Consolidation Automatique des Programmes de la Cour du Wisconsin a migré à PostgreSQL pour tout ce qui concerne les applications Web de la Cour. Huit bases de données de production ont été converties, six d'entre elles ont une volumétrie d'environ 180 Gb. Elles contiennent des informations état par état de quelques 72 bases de données de comtés qui sont répliquées en temps réel. La copie centrale est utilisée pour des audits, des calculs statistiques et la génération de rapports, et ce site web:

<a href="http://wcca.wicourts.gov/" target="_blank">http://wcca.wicourts.gov/</a>

<p>Étant donné le succès de ce travail, nous allons procéder à la migration vers PostgreSQL des autres bases de données de la Cour.</p>

<p>Nous avons été enchantés à la fois par les performances du produit et par le support que nous avons pu obtenir des listes de diffusion. De plus, PostgreSQL s'est avéré plus rapide que le produit commercial duquel il a été migré. Mais le plus important reste la rapidité des réponses que nous avons obtenu lorsque nous avons posté nos problèmes sur les listes. Nous avions régulièrement la réponse que nous attendions dans les 24 heures. Franchement, le support a été incroyable.</p>

<p>Nous nous demandons quel est la pénétration de PostgreSQL à l'intérieur des agences gouvernementales; Nous aimerions vraiment savoir ce qu'il en est... Avec nos budgets sérrés, il semble que d'autres aillent dans cette direction.</p>

<hr />

Pour la suite, je vous recommande la lecture du thread entier, cliquez sur le lien au début de ce post et vers le bas de la page cliquez sur "Next by thread", vous lirez alors la réponse de Josh Berkus: plusieurs agences gouvernementales américaines utilisent PostgreSQL au quotidien, et pas pour les plus petites de leurs applications...