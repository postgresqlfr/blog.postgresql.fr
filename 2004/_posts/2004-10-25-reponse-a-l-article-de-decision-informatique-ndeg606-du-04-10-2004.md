---
layout: post
title: "Réponse à l&#39;article de Décision Informatique n°606 du 04/10/2004"
author: "Jean-Paul Argudo"
categories: [Événements]
redirect_from: "index.php?post/drupal/44"
---


<p></p>

<!--more-->


<p>

Dans le n°606 du 4 octobre 2004 du journal Décision Informatique, est paru un comparatif de cinq systèmes de gestion de bases de données (SGBD): Microsoft SQL Server, Oracle, BD2, MySQL et PostgreSQL. Notre communauté a été contactée par le mandataire des tests, afin de l'aider à optimiser l'installation de PostgreSQL. Par contre, la communauté n'a jamais été sollicitée sur d'autres points et il en résulte un certain nombre d'erreurs, d'imprécisions et de confusions, qui auraient facilement pu être évitées.

</p>

<p>

Nous souhaitons donc ici corriger ces problèmes et donner de PostgreSQL une image plus juste.

</p>

<h3>Erreurs</h3>

<ul>

<li>

"uniquement GPL" (p.34): PostgreSQL est géré par une license BSD, encore plus ouverte que la GPL. Ainsi, PostgreSQL est totalement gratuit. Il peut donc être inclus dans un produit commercial, sans qu'aucune redevance ne doive être payée à qui que ce soit. De même, PostgreSQL peut être installé sur autant de serveurs qu'on le souhaite (par exemple, développement, pré-production, production), sans coût supplémentaire.

</li>

<li>

"Pas de sauvegarde à chaud" (p.30 et ailleurs): c'est tout simplement faux. Des outils de base (tels que pg_dump et pg_dumpall) permettent de faire des sauvegardes sans arrêter la base de données.

</li>

<li>

"Les SGBD propriétaires proposent en plus la gestion de XML" (p.31 et ailleurs): PostgreSQL dispose également d'outils permettant de gérer le XML. Il est vrai qu'ils ne font pas partie de l'installation de base, mais se trouvent sous forme de contributions séparées. Néanmoins, ces outils existent.

</li>

<li>

"(PostgreSQL): son installation laborieuse nécessite des compétences très pointues, rarement disponibles en PME" (p.29), "(PostgreSQL) installation et paramÈtrage: 90 Minutes" et "(PostgreSQL) nécessite des compétences pointues" (p.31): c'est très largement exagéré. Tout d'abord, pour la plupart des distributions de Linux, PostgreSQL est disponible sous forme d'installeur (RPM). Le paramétrage par défaut est excellent pour des besoins courants, notamment ceux d'une PME. Seul le paramétrage de la sécurité peut paraître un peu compliqué la première fois, mais il est très vite appris. Par ailleurs, l'importante documentation (en partie traduite en français; et l'effort continue), facilement accessible, est à plusieurs niveaux et permet au néophyte d'apprendre rapidement les principes et à l'expert de retrouver efficacement une référence.<br />

L'administration d'une base PostgreSQL est également d'une grande simplicité. Dans la plupart des cas, un petit script d'optimisation agendé pour tourner chaque jour suffit amplement.

</li>

<li>

"Les bases de données propriétaires disposent en plus de fonctions supplémentaires qui garantissent une reprise sur incident rapide (option cluster, contrôle d'intégrité en continu, etc.)." (p.30): PostgreSQL propose la reprise sur incident rapide par le biais du mécanisme de "Write Ahead Log". Il s'agit d'un mécanisme équivalent à celui d'Oracle qui garantit une reprise sur incident au plus près.

Quant au "contrôle d'intégrité en continu", doit-on comprendre que l'article insinue qu'une base de données PostgreSQL pourrait contenir, à un instant donné, des données incohérentes? Si c'est le cas, c'est absolument faux. PostgreSQL utilise le mécanisme MVCC (MultiVersion Concurrency Control), tout comme Oracle (documentation: <a href="http://www.postgresql.org/docs/current/static/mvcc.html">http://www.postgresql.org/docs/current/static/mvcc.html</a>). Ce mécanisme garantit la cohérence des données de manière formelle.

</li>

</ul>

<h3>Imprécisions</h3>

<ul>

<li>"Pas de mécanisme de réplication" (p.31): certes, il n'y a pas de solution de réplication proposée par défaut et il n'existe pas non plus de solution synchrone. Mais on trouve des contributions, telles que Slony-1 (<a href="http://gborg.postgresql.org/project/slony1/projdisplay.php">http://gborg.postgresql.org/project/slony1/projdisplay.php</a>) qui permettent de faire de la réplication asynchrone, plus que suffisante dans la plupart des cas.

</li>

<li>

"IBM annonce par exemple avoir réduit de 65% la charge nécessaire à l'administration quotidienne de sa dernière génération de serveurs." (p.29): voilà qui est choquant. Après avoir affirmé que PostgreSQL était difficile à administrer, pour son concurrent DB2 l'article se contente de citer une annonce d'IBM. Le mandataire n'aurait donc pas testé réellement la charge que représente l'administration de chaque SGBD?

</li>

<li>

"assistance technique annuelle : 4500 euros TTC" (p.34): il serait intéressant de savoir d'où vient ce chiffre. A titre de comparaison, PostgreSQL Inc., société de service spécialisée dans PostgreSQL propose un plan "Bronze" à partir de 1100$ par an, soit moins de 900 euros.

</li>

</ul>

<h3>Confusions</h3>

<ul>

<li>

"Les outils open source sont fonctionnellement plus pauvres. Ils se limitent aux fonctionnalités de base (SQL). PostgreSQL, par exemple, ne prend pas en compte XML, ni les services web." (p.28) et d'autres phrases de la même trempe, tout au long de l'article: ces affirmations sont révélatrices d'une grande confusion, qui biaise les résultats du test. La fonctionnalité principale et essentielle d'une base de données est bien de gérer les données, avec un accès par le langage SQL. Microsoft SQL Server, Oracle et DB2 se présentent sous la forme de "serveurs d'applications" qui fournissent de nombreux services, entre autres et en particulier un SGBD.

</li>

<li>

A ce titre-là, le monde Open Source n'est pas plus pauvre, et de loin, que le monde du logiciel propriétaire. Faut-il seulement rappeler qu'Apache est le serveur web le plus utilisé au monde?

Le comparatif ne peut mériter ce titre que s'il compare des produits équivalents, ce qui n'est pas le cas.

</li>

</ul>