---
layout: post
title: ".po corrompus pour les versions 7.4.9 et 8.0.4 de PostgreSQL"
author: "gleu"
categories: [Événements]
redirect_from: "index.php?post/drupal/385"
---


<p></p>

<!--more-->


<p>J'ai reçu en fin de semaine dernière un mail m'indiquant que les .po français de la version 8.0.4 étaient étranges au niveau des accents. Après vérification, certains fichiers étaient enregistrés en UTF-8 au lieu de ISO-8859-1. De plus, j'ai aussi remarqué que la version 7.4.9 était aussi impactée, même si dans une moindre mesure.</p>

<p>Pour corriger ce problème, voici deux solutions&nbsp;:</p>

<ol>

<li>utiliser la commande recode de cette façon « recode utf-8..iso-8859-1 nom_fichier » pour tous les fichiers touchés [1]&nbsp;;</li>

<li>récupérer le fichier tar correspondant à votre option (<a href="http://www.traduc.org/%7Egleu/pg-po/v749.tar.bz2">version 7.4.9</a> et <a href="http://www.traduc.org/%7Egleu/pg-po/v804.tar.bz2">version 8.0.4</a>) et le déballer à la racine du répertoire des sources de PostgreSQL.</li>

</ol>

<p>Avec toutes mes excuses.</p>

<p>[1] les fichiers touchés sont&nbsp;:

</p>

<ul>

<li>version 7.4.9

<ul>

<li>src/bin/pg_dump/po/fr.po</li>

<li>src/bin/psql/po/fr.po</li>

<li>src/backend/po/fr.po</li>

</ul>

</li>

<li>version 8.0.4

<ul>

<li>src/bin/pg_ctl/po/fr.po</li>

<li>src/bin/pg_dump/po/fr.po</li>

<li>src/bin/psql/po/fr.po</li>

<li>src/backend/po/fr.po</li>

</ul>

</li>

</ul>