---
layout: post
title: "Attention à la gestion des exceptions ou comment mettre PostgreSQL à genou avec un petit bout de PL/pgSQL..."
author: "SAS"
redirect_from: "index.php?post/drupal-32 "
---


<p></p>

<!--more-->


<p>

Un client nous a appelé pour nous faire part du comportement étrange de sa base de données. Son intranet tourne depuis plus de trois ans sans problème, mais bizarrement, depuis quelques semaines, le postmaster tombe plusieurs fois par jour. Impossible de lancer une indexation ou un vacuum...</p>

<p>

Après quelques recherches, je m'aperçois en regardant les traces qu'une requête utilisant une fonction écrite en PL/pgSQL semble conduire à la chute du postmaster.</p>

<p>

Récupérant le code de la fonction, il m'apparaît qu'aucun test n'est fait pour vérifier les paramètres passés à la dite fonction avant de l'appeler récursivement.

</p>

<p>

Cette fonction est en effet appelée avec un argument NULL, qui produit l'appel récursif de cette fonction. Résultat des courses, la pile des appels produit immanquablement une sortie en erreur de la fonction <br />ET<br /> la sortie en erreur de tous les clients actuellement connectés à la base. Ce genre d'erreur est déroutant dans la mesure où un client se retrouve déconnecté sans en comprendre la raison.  Le message est peu explicite puisque vous pourrez simplement comprendre que «&nbsp;la sortie en erreur d'un client laisse le postmaster supposer que les données peuvent être corrompues&nbsp;». Par conséquent tous les clients accédant à la dite base sont déconnectés.

</p>

<p>

Qui plus est, il est possible que le postmaster redémarre. Si votre application utilise des connexions persistantes au serveur de bases de données, ces connexions ne sont pas relâchées, encore quelques appels à la fonction incriminée, et votre serveur est à genoux.

</p>

<p>

En conclusion :</p>

<ul>

<li>

N'oubliez jamais de tester les exceptions dans une procédure stockée</li>

<li>

N'oubliez jamais le principe de Murphy : <a href="http://www.edwards.af.mil/history/docs_html/tidbits/murphy%27s_law.html"> "If anything can go wrong, it will"</a></li>

</ul>