---
layout: post
title: "Nouvelles versions intermédiaires"
author: "SAS"
redirect_from: "index.php?post/drupal-122 "
---


<p></p>

<!--more-->


<par>

Dans le but de corriger un certain nombre de problèmes, trois nouvelles versions de PostgreSQL sont disponibles&nbsp;: 7.3.11, 7.4.9 and 8.0.4.

</par>

<br />

<par>

Parmi les correctifs les plus importants, on trouve&nbsp;:

<ul>

<li> Correctif de l'erreur qui permettait à «VACUUM» de supprimer les chaînes ctid trop rapidement&nbsp;;

</li>

<li> Corrections des lignes manquantes dans les requêtes telles que <em>UPDATE a=... WHERE a...</em> lorsqu'il y a un index GiST sur la colonne <em>a</em>&nbsp;;

</li>

<li> Amélioration des contrôles de pages WAL écrites partiellement&nbsp;;

</li>

<li> Divers correctifs de fuites mémoire.

</li>

</ul>

</par>

<br />

<par>

Une liste complète des correctifs est disponible, pour chaque version, dans le fichier HISTORY.

</par>

<br />

<par>

Le téléchargement des sources peut se faire aux URL suivantes&nbsp;:

<ul>

<li> <a href="http://www.postgresql.org/ftp/source/v7.3.11">http://www.postgresql.org/ftp/source/v7.3.11</a>

</li>

<li> <a href="http://www.postgresql.org/ftp/source/v7.4.9">http://www.postgresql.org/ftp/source/v7.4.9</a>

</li>

<li> <a href="http://www.postgresql.org/ftp/source/v8.0.4">http://www.postgresql.org/ftp/source/v8.0.4</a>

</li>

</ul>

</par>

<par>

Les exécutables des versions 8.0.4 pour Linux et Windows sont disponibles via&nbsp;:

<a href="http://www.postgresql.org/ftp/binary/v8.0.4">http://www.postgresql.org/ftp/binary/v8.0.4</a>

</par>

<br />

<par>

Ces versions intermédiaires ne nécessitent pas de sauvegarde/restauration si la mise à jour est faite depuis la version intermédiaire précédente. Dans le cas d'une mise à jour depuis une version majeure précédente, il se peut qu'il soit nécessaire d'effectuer ces opérations.

Les notes de version (Release Notes) vous renseigneront sur la marche à suivre dans le cas d'une telle mise à jour.

</par>

<br />

<par>

News traduite par SAS à partir d'un courriel émanant de <strong>Marc G. Fournier</strong>, membre du <strong>PostgreSQL Core Team</strong>

</par>