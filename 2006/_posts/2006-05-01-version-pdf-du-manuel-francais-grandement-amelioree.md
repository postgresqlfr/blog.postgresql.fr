---
layout: post
title: "Version PDF du manuel français grandement améliorée"
author: "gleu"
categories: [Vie du site]
redirect_from: "index.php?post/drupal/391"
---


<p></p>

<!--more-->


<p>La version PDF de la documentation n'a jamais été bien réalisée. Ceci est principalement dû à la façon dont elle était construite. L'équipe de traduction utilisait openjade pour générer un gros fichier HTML contenant toute la documentation. Puis, ce document était fournit à <a href="http://www.htmldoc.org">htmldoc</a> qui créait le PDF... sans prendre en compte les feuilles de style (une des grosses limitations de la version 1.8 de ce logiciel). De plus, ce logiciel a peu d'options qui permettraient d'améliorer la présentation du PDF.</p>

<p>Comme certaines personnes (nommément fabix et Kryskool) souhaitaient passer en DocBook XML, le passage a été entrepris. Cela a permis d'utiliser une chaîne d'outils bien plus complète et flexible. Le passage au XML et les modifications nécessaires pour créer un PDF agréable à utiliser et à lire ont pris entre deux et trois semaines... mais le résultat est plus que probant.</p>

<p>L'équipe de traduction vous fournit donc un <a href="http://docs.postgresqlfr.org/pgsql-8.1.3-fr/pg813.pdf" title="Manuel PostgreSQL de la version 8.1.3 au format PDF">PDF de grande qualité</a> qui semble <a href="http://www.traduc.org/%7Egleu/dotclear/index.php?2006/04/29/501-postgresql-manual-in-pdf#c1268">faire envie à certaines personnes utilisant la version originale</a> :) À ce sujet, il est évident qu'un travail sera entrepris pour améliorer le PDF de la version originale.</p>

<p>Dernière information sur la traduction, il existe maintenant plusieurs sites pour la traduction&nbsp;:</p>

<ul>

<li>le <a href="http://docs.postgresqlfr.org/" title="docs.postgresqlfr.org, le site des utilisateurs">site des utilisateurs</a> ;</li>

<li>et <a href="http://svn.postgresqlfr.org/" title="svn.postgresqlfr.org, le site des développeurs">celui des développeurs</a>.</li>

</ul>

<p>En cas de problème avec la documentation, n'hésitez pas à saisir un rapport sur le site des développeurs&nbsp;!</p>

<p>Attention, ce PDF ne sera disponible que pour les versions 8.1.3 et ultérieures.</p>