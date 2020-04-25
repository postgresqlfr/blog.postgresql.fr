---
layout: post
title: "Autodoc : documentez vos bases de données facilement!"
author: "Jean-Paul Argudo"
categories: [Articles]
redirect_from: "index.php?post/drupal/38"
---


<p></p>

<!--more-->


<p><a href="http://www.rbt.ca/autodoc/">Autodoc</a> permet de documenter de manière extrêmement simple et efficace une base de données.</p>

<p>Sous Debian, l'installation est simple. Commencez par mettre à jour vos sources apt&nbsp;:</p>

<pre>$ apt-get update</pre>

<p>Vérifiez la disponibilité du paquet&nbsp;:</p>

<pre>$ apt-cache search postgresql-autodoc<br />postgresql-autodoc - Utility to create system tables overview in HTML, DOT and XML</pre>

<p>Installez le paquet s'il est disponible&nbsp;:</p>

<pre>$ apt-get install postgresql-autodoc</pre>

<p>Pour les autres distributions, cherchez un peu... Ou alors, installez à partir des

<a href="http://www.rbt.ca/autodoc/releasenotes.html">sources disponibles sur le site</a> ;-)</p>

<p>Les formats de sortie sont multiples&nbsp;: graphiques avec Dia et GraphViz (dot) ou texte (HTML, DocBook)... voici quelques exemples en ligne sur <a href="http://www.rbt.ca/autodoc/">le site d'Autodoc</a>&nbsp;:

</p>

<ul>

<li><a href="http://www.rbt.ca/autodoc/autodocexample.html">Sortie HTML</a></li>

<li><a href="http://www.rbt.ca/autodoc/output-dia.html">Sortie Dia</a></li>

<li><a href="http://www.rbt.ca/autodoc/output-docbook.html">Sortie DocBook</a></li>

<li><a href="http://www.rbt.ca/autodoc/output-graphviz.html">Sortie GraphViz</a></li>

</ul>

<p>L'idéal est donc d'utiliser une combinaison de sorties textes et graphiques pour avoir une documentation complète de votre base de données. Personnellement, j'utilise DocBook et GraphViz...</p>

<p><strong>Enjoy!</strong></p>