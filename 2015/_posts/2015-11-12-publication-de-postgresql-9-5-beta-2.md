---
layout: post
title: "Publication de PostgreSQL 9.5 Beta 2"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/2015/11/12/Publication-de-PostgreSQL-9.5-Beta-2"
---


Le PostgreSQL Global Development Group annonce aujourd'hui la deuxième bêta de la version 9.5 de PostgreSQL. <br /><br /><br />

<!--more-->


Cette version contient toutes les fonctionnalités qui seront dans la version finale. Peu de modifications devraient intervenir.<br />Les utilisateurs peuvent désormais tester leurs applications avec cette version en préparation de la version finale.

<h2>Différences avec la Bêta 1</h2>

Les nombreux bogues remontés par les utilisateurs et les contributeurs ont été corrigés.

Citons :

<ul>

<li> de nombreux ajustements de la documentation ;

</li>

<li> le renommage de PQsslAttributes() en PQsslAttributeNames() ;

</li>

<li> le passage de données de contexte aux pgworkers ;

</li>

<li> la correction de problèmes avec les workers parallèles ;

</li>

<li>la correction de divers bogues sur les index BRIN ;

</li>

<li> la correction de différents problèmes de traçage des timestamp de commit lors de la réplication ;

</li>

<li> ssl_renegotiation_limit est désormais positionné à 0.

</li>

</ul>

<br /><br />Si vous avez fait un rapport de bogue lors de tests de PostgreSQL 9.5, nous vous demandons de retester avec la Bêta 1 pour vérifier que le problème a été corrigé.

<br /><br />Si vous n'avez pas encore testé PostgreSQL 9.5, c'est le bon moment pour aider au développement de PostgreSQL. <br />Les problèmes connus et en attente de correction sont listés sur la page des problèmes à régler.

<h2>Agenda</h2>

Il s'agit de la deuxième version bêta pour la 9.5. <br />Cela signifie que peu de modifications sont prévues d'ici la version finale.

<br /><br />Le projet PostgreSQL publiera d'autres bêta, si nécessaire, puis une ou plusieurs release candidates, jusqu'à la version finale, fin 2015.<br /><br />Pour plus d'informations et des suggestions sur la manière de tester les bêta, on peut se référer à la page Beta Testing.<br /><br />La documentation complète et les notes de version sont disponibles en ligne, et installées avec PostgreSQL.

La page What's New donne les détails de chaque nouvelle fonctionnalité.

<h2>Liens</h2>

<ul>

<li> Page de téléchargement : <a hreflang="en" href="http://www.postgresql.org/download/">http://www.postgresql.org/download/

</a></li>

<li> Information sur les tests des bêta : <a hreflang="en" href="http://www.postgresql.org/developer/alpha">http://www.postgresql.org/developer/alpha</a>

</li>

<li> Note de version de la 9.5 bêta : <a href="http://www.postgresql.org/docs/devel/static/release-9-5.html ">http://www.postgresql.org/docs/devel/static/release-9-5.html

</a></li>

<li> Quoi de neuf dans 9.5 : <a href="https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5">https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5</a>

</li>

<li> Les problèmes ouverts : <a href="https://wiki.postgresql.org/wiki/PostgreSQL_9.5_Open_Items">https://wiki.postgresql.org/wiki/PostgreSQL_9.5_Open_Items </a> </li>

</ul>