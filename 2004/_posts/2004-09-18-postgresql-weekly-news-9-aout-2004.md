---
layout: post
title: "PostgreSQL Weekly News - 9 août 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/374"
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 9 août 2004 ==</h3>

<p>Ceux qui ont fait attention auront remarqué que nous sommes passé de

l'attente d'une sortie de la beta 7.5 à une annonce de première beta de la

8.0.0 aujourd'hui. Pourquoi ce changement soudain&nbsp;? Il y a eu de

nombreuses discussions en ligne et en dehors sur le fait de numéroter cette

version la 8.0. Après une dernière courte discussion sur -hackers et vu le

nombre de grandes fonctionnalitées ajoutées ainsi que la taille des

modifications effectuées sur le code du moteur, la plupart ont accepté que le

passage à la numérotation 8.x est bien plus approprié cette fois. Ceci signifie

aussi que nous allons avoir besoin de plus de dilligence dans les tests de

cette nouvelle version. Donc, j'ai inclus un lien vers l'annonce de la beta

ci-dessous avec des liens et d'autres informations pour que vous puissiez

commencer les tests aussi rapidement que possible.

</p>

<p>Bien sûr, avec la réalisation de cette beta sont arrivés quelques

corrections de bogues et autre nettoyage de code. Les aires du code concernées

par ce nettoyage incluent une correction dans l'emplacement du tests du

savepointLevel, une correction dans la vérification des dépendances lors d'un

ALTER COLUMN TYPE, quelques corrections dans la gestion des tableaux avec la

création de tableaux multi-dimensionnels et le gestion des espaces blancs, un

ajustement à la limite basse pour les tableaux d'AclItems (de zéro à un), un

nettoyage du format latex de psql et quelques nettoyages dans le code zic.</p>

Dans le nouveau code ajouté sont inclus une nouvelle fonction de contrôle de

fichiers utilisés avec les sauvegardes et un nouveau programme intégré de

rotation de journaux de traces. Il y a eu aussi beaucoup de changement dans les

différentes sections de la documentation pour être à jour avec la version 8.0.

En particulier, les personnes s'investissant dans les tests beta de PITR

doivent savoir que la documentation pour PITR est maintenant pratiquement

complète, donc référez-vous à cette documentation (inclus avec le code source)

lors des tests de cette nouvelle fonctionnalité.

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Lyris Technologies a sorti ListManager 8.0<br />

<a href="http://www.marketwire.com/mw/release_html_b1?release_id=70793">http://www.marketwire.com/mw/release_html_b1?release_id=70793</a></li>

<li>PostgreSQL 8.0.0 officiellement en beta<br />

<a href="http://www.postgresql.org/news/216.html">http://www.postgresql.org/news/216.html</a></li>

</ul>

<h3>== Nouvelles dans la presse ==</h3>

<ul>

<li>Branchez OpenOffice.org avec PostgreSQL<br />

<a href="http://www.newsforge.com/article.pl?sid=04/07/22/160206">http://www.newsforge.com/article.pl?sid=04/07/22/160206</a></li>

<li>Incompétence (blog)<br />

<a href="http://aurealsys.com/tabo/index.php?p=41">http://aurealsys.com/tabo/index.php?p=41</a></li>

<li>Notes sur OSCon 2004 (blog)<br />

<a href="http://www.justatheory.com/computers/conferences/oscon2004/notes.html">http://www.justatheory.com/computers/conferences/oscon2004/notes.html</a></li>

</ul>

<h3>== Événements à venir ==</h3>

<ul>

<li>Linux Expo Shanghai&nbsp;: Shanghai, China du 9 au 10 septembre<br />

Bruce Momjian fera une présentation<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhanghai.com/en/index.html</a></li>

<li>LinuxWorld Conferance&nbsp;: Frankfurt, Germany du 26 au 28 octobre<br />

PostgreSQL aura de nouveau un stand au LinuxWorld Conference &amp; Expo.

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a></li>

</ul>

<h3>== Nouvelles hebdomadaires PostgreSQL - 9 août 2004 ==</h3>

<p>Sur le Web&nbsp;: <a href="http://www.postgresql.org">http://www.postgresql.org</a></p>