---
layout: post
title: "Sun rachète MySQL... et PostgreSQL dans tout ça ?"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-271 "
---


<p>Vu la qualité de <a href="http://people.planetpostgresql.org/greg/index.php?/authors/1-Greg-Sabino-Mullane">l'article de Greg Sabino Mulane «Postgres is not for sale»</a>, je vous en propose une traduction (libre) ci-dessous.</p>

<p>

Il est au sujet du rachat par Sun de MySQL, une base de données Open-Source bien connue de tous.

</p>

<p>

Il ne s'agit pas pour nous de polémiquer sur cela, ni de décrier cette base de données, qui a ses qualités.

</p>

<!--more-->


Voici la traduction de l'article:

<h3>PostgreSQL n'est pas à vendre</h3>

<p>

À la lumière du récent rachat de MySQL, j'aimerais une fois de plus répondre à une question qui nous est posée de temps en temps: «Qui rachètera PostgreSQL?». Bien sûr, cela fait sourire ceux qui sont immergés dans le monde de l'Open Source, mais nous y répondons invariablement «PostgreSQL ne peut pas être acheté». Bien que de loin MySQL et PostgreSQL se ressemblent (ce sont des "bases de données Open Source"), il s'agit de deux choses très différentes, aussi bien sur le plan technique que sur le reste. On pourrait résumer leurs différences comme cela:

</p>

<h3>MySQL est un PRODUIT Open-Source</h3>

<h3>PostgreSQL est un PROJET Open-Source</h3>

<p>Bien que 'produit' et 'projet' soient des mots proches, la distinction est énorme. MySQL est dirigé par une organisation à but lucratif (MySQL AB), à qui appartient le code, qui a embauché pratiquement tous les développeurs, qui dirige de manière autoritaire dans quelle direction doit aller le produit, et qui a le droit de changer (et ne s'en est pas privé) la licence d'utilisation du logiciel (ainsi que de sa documentation).</p>

<p>À l'opposé, PostgreSQL n'est pas dirigé par une société, le projet est contrôlé par la communauté, il n'y a aucun problème sur la licence, les développeurs principaux sont répartis sur un large spectre d'oganisations publiques ou privées. Comment un logiciel peut profiter d'un tel système ? Bien, la signification originale de LAMP a évolulée (selon: Linux, Apache, MySQL, Middleware, PHP, Perl...) en des modèles similaires, et tous fonctionnent. Tout comme PostgreSQL, il n'y a aucun moyen "d'acheter" ces projets.</p>

<p>Je ne sais pas trop quoi penser du rachat à ce jour. Il m'est difficile de savoir si cela sera bon ou mauvais pour PostgreSQL (le produit du projet), ou bon ou mauvais pour MySQL (le produit). C'est probablement mauvais pour le projet MySQL, je pense en effet que les employés de MySQL AB et la communauté auraient préférés l'option IPO jadis promise. Cela leur aurait probablement rapporté plus de publicité et de visibilité sur le long terme. Pour faire court, le produit (MySQL) sera inévitablement ralenti, le temps que la société (MySQL AB) soit absorbée par Sun (ce n'est pas la peine de mentionner que Falcon ne sera peut-être jamais terminé). Sur le long terme, cela sera peut-être un "plus" pour le produit. Pour l'instant, les plus gros gagnants sont les investisseurs et les directeurs, qui n'ont probablement pas réfléchi trop longtemp pour accepter une offre de 800 millions de dollars.</p>

<p>Est-ce que Sun continuera de supporter PostgreSQL? Ils disent que oui, bien que de toute façon ils ne contribuent pas énormément à PostgreSQL, en termes d'effort de développement ou de contributions en argent. Les sociétés qui voudraient contribuer à PostgreSQL peuvent non seulement embaucher les développeurs du projet, mais peuvent aussi <a href="http://www.spi-inc.org/">donner au SPI</a> (<em>Software in the Public Interest</em>, une organisation à but non lucratif, loi américaine 501(c)(3). Ainsi, si Sun ne veut pas démontrer son support continu à PostgreSQL en payant 1 million de dollar pour écrire du code résolument génial, ils peuvent toujours participer en donnant de l'argent via le SPI...</p>