---
layout: post
title: "Installeur PostgreSQL pour MacOSX"
author: "mowgli"
redirect_from: "index.php?post/drupal-153 "
---



<p>

Ce projet a pour but de mettre à disposition des utilisateurs Mac un installeur de la base de données. La première version est relativement simple mais a tout de même permis de mettre en place les bases du projet :

</p>

<ul>

<li>Installation de la base de données</li>

<li>Création d'un utilisateur administrateur (postgres)</li>

<li>Initialisation de la base</li>

<li>Mise en place d'un script pour le démarrage automatique lors du boot</li>

</ul>

<p>

Afin de rester le plus fidèle possible à la philosophie Mac, j'ai utilisé l'outil <a href="http://s.sudre.free.fr/Software/Iceberg.html">Iceberg</a> qui permet de créer facilement un installeur identique à ce que fait PackageMaker tout en offrant <a href="http://s.sudre.free.fr/Software/documentation/Iceberg/French.lproj/documentation/IcebergvsPM.html">un peu plus de souplesse</a>.

</p>

<p>

La compilation a été faite en utilisant gcc 4.0.1 sous MacOSX 10.4.3. Le package inclut également la version 5.1 de GNU readline.

</p>

<p>

Il reste encore beaucoup de choses à faire pour donner à ce projet un côté plus <em>professionnel</em>. N'hésitez donc pas à me rejoindre et à participer.

</p>

<p>

Page Web du projet : <a href="http://greg.rubyfr.net/pub/?page_id=10">PostgreSQL for MacOSX</a>

</p>