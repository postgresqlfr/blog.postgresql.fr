---
layout: post
title: "Sortie de la BETA de Slony-I (nouvelle solution de réplication)"
author: "Jean-Paul Argudo"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/14"
---


<p></p>

<!--more-->


Dans <a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=174">cette news originale (en anglais)</a>, Jan Wiek nous dit que:

le 4 juin:

Après près d'une année de travail de conceptualisation, prototypage et développement, l'équipe du projet Slony-I est fière de vous présenter la version 1.0.0. qui entre en BETA test. C'est une solution de réplication professionelle.

Depuis le design original (cf <a href="http://developer.postgresql.org/%7Ewieck/slony1/Slony-I-concept.pdf">

ce document PDF</a>), toutes les fonctionalités sont présentes dans cette première version. La liste des fonctionalités comprends entre autres:

<ul>

<li>"hot install" : installation à chaud (il n'est pas nécessaire de stopper l'application pour installer le système de réplication)</li>

<li>"hot join" : liaison à chaud (NDT: hummm... :-/) (il n'est pas nécessaire de stopper l'application pour créer une base réplica)

</li>

<li>"cross version" : multi-versions (le maitre et l'esclave peuvent fonctionner dans des versions différentes de PostgreSQL)

</li>

<li>"cross platform" : indépendance des plates-formes (réplication entre des bases tournant dans des architectures différentes)

</li>

<li>"controlled switchover" : changement de base réplica contrôllée (il faut environ 10 secondes pour un dump &amp; restore d'une base de 100 GB)

</li>

<li>"failover" (rien de spécial..)

</li>

<li> "switchback" (ce n'est pas du "fail over"... et plus rien..", ou "cet upgrade n'a pas marché si bien... comment on downgrade?") (NDT: je sais, moi non plus je comprends pas trop l'explication)

</li>

</ul>

Veuillez visiter

<a href="http://gborg.postgresql.org/project/slony1/projdisplay.php">la page de Slony-I</a> pour rejoindre l'équipe de développement ou télécharger la version BETA. N'oubliez surtout pas qu'un mail avec un "bug reproductible" est 1000 fois meilleur que 100 autres avec "ça ne marche pas...".