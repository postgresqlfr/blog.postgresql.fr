---
layout: post
title: "PostgreSQL Weekly News - 26 janvier 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/350"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 26 janvier 2004 ==</h2>

<p>Une autre bonne semaine de développement terminée par une nouvelle

édition, en retard, des nouvelles hebdomadaires :-) Il y a un certain nombre

d'éléments à passer en revue et un changement de structure, donc commençons tout

de suite.<!--break-->

</p>

<p>Quelques correctifs disponibles cette semaine ont été réécrit pour la

branche 7.4 et devraient donc être pris en compte pour la prochaine sortie. Une

des corrections inclus concerne un manque d'optimisation au niveau de

l'exécuteur évitant des projections inutiles lors du parcours des tables dont

toutes les colonnes sont nécessaires. Merci à Mike Mascari pour son rapport

initial. Un autre bogue dans le paramètrage de pg_dump, qui initialisait mal

l'emplacement de la base de données pour les serveurs 7.0.*, a été corrigé. Un

problème avec les colonnes supprimées pour les déclencheurs (triggers) pltcl,

rapporté par Patrick Salmon, a aussi été corrigé.</p>

<p>Sur la branche principale, quelques discussions de bas niveau sur

l'algorithme GEQO et une attente ferme de Tom Lane, ont mené à des changements

dans les paramètrages par défaut de GEQO, dans la connaissance des heuristiques

SQL pour GEQO et dans la documentation, bien amélioré sur ce sujet. Jan Wieck

a aussi implémenté une première passe des fonctionnalités pour l'écriture en

tâche de fond, permettant aux personnes administrant des serveurs dédiés

d'améliorer les opérations d'entrées/sorties pour le serveur. Neil

Conway a passé du temps sur le nettoyage des fonctions de manipulation mémoire

de psql. ECPG a eu une nouvelle fonctionnalité&nbsp;: WHENEVER NOT_FOUND pour les

syntaxes des instructions SELECT/INSERT/UPDATE/DELETE. Une modification du

comportement a été intégrée pour permettre l'initialisation d'un chemin de

recherche de schémas incluant des schémas inexistants. Dans le passé, ceci

aurait résulté en une erreur (de niveau ERROR) mais cette fonctionnalité est

nécessaire pour pg_dump dans le cas de certaines restaurations. Donc,

maintenant, il émet un message de niveau NOTICE. Quelques améliorations de la

documentation ont aussi vu le jour, incluant l'ajout d'un exemple illustrant la

façon d'appeler une fonction prenant en arguments des types composites. Quelques

exemples sur l'utilisation des fonctionnalités PREPARE et EXECUTE ont aussi été

ajoutés.</p>

<p>Un dernier élément a été la suppression finale du code restant du pilote

JDBC. Celui-ci a été enlévé du répertoire principal des sources. Il a maintenant

sa propre page sur gborg

(<a href="http://gborg.postgresql.org/project/pgjdbc/projdisplay.php">http://gborg.postgresql.org/project/pgjdbc/projdisplay.php</a>)

alors que <a href="http://jdbc.postgresql.org/">http://jdbc.postgresql.org</a> est

bien sûr toujours d'actualité. Heureusement, ceci va permettre aux développeurs de

JDBC d'être plus indépendant des sorties du programme principal.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Mise à jour de Sun Cobalt pour PostgreSQL<br />

<a href="http://www.secunia.com/advisories/10674/">http://www.secunia.com/advisories/10674/</a></li>

<li>Sortie d'OpenFTS 0.36<br />

<a href="http://freshmeat.net/projects/openfts/?branch_id=19183&amp;release_id=149197&amp;topic_id=93">http://freshmeat.net/projects/openfts/?branch_id=19183&amp;release_id=149197&amp;topic_id=93</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Linux World Expo - 2è jour<br />

<a href="http://www.freebsddiary.org/linuxworldexpo-2004-part5.php">http://www.freebsddiary.org/linuxworldexpo-2004-part5.php</a>

</li>

<li>More Agencies Pick Open Source Software<br />

<a href="http://www.govexec.com/features/1203/1203managetech.htm">http://www.govexec.com/features/1203/1203managetech.htm</a>

</li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Rencontres PHP New York : New York, New York: 27 janvier<br />

Bruce Momjian présentera une introduction à PostgreSQL<br />

<a href="http://nyphp.org/content/calendar/view_entry.php?id=50&amp;date=20040127">http://nyphp.org/content/calendar/view_entry.php?id=50&amp;date=20040127</a></li>

<li>NordU Usenix 2004: Denmark: du 28 au 30 janvier<br />

Bruce Momjian donnera son tutoriel sur PostgreSQL<br />

<a href="http://www.nordu.org/NordU2004/">http://www.nordu.org/NordU2004/</a></li>

<li>Linux Solutions 2004: Paris, France: du 3 au 5 février<br />

Bruce Momjian fera des présentations<br />

<a href="http://www.solutionslinux.fr/en/index.php">http://www.solutionslinux.fr/en/index.php</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 26 janvier 2004 ==</h2>

<p>N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain</p>

<p>Liste de diffusion générale <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>Sur le web :

</p>

<ul>

<li><a href="http://www.postgresql.org">http://www.postgresql.org</a></li>

<li><a href="http://advocacy.postgresql.org">http://advocacy.postgresql.org</a></li>

</ul>