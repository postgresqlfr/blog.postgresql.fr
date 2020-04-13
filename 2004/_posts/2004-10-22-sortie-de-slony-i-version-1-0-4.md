---
layout: post
title: "Sortie de Slony-I version 1.0.4"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-42 "
---


<p></p>

<!--more-->


<p>

Le 22 octobre 2004, Chris Browne annonçait sur la liste pgsql-announce:

</p>

<p>

L'équipe de Slony-I est fière de présenter la version 1.0.4 de la solution de

réplication la plus avancée pour la la base de données Open Source la plus

avancée du monde.

</p>

<p>

Une archive tar est disponible au téléchargement sur&nbsp;:<br />

<a href="" http:="" developer.postgresql.org="" ~wieck="" slony1="" download="" slony1-1.0.4.tar.gz="">

http://developer.postgresql.org/~wieck/slony1/download/slony1-1.0.4.tar.gz

</a>

</p>

<p>

Il y a un nombre limité de «&nbsp;nouvelles fonctionalités&nbsp;» dans cette versions et

elles se concentrent sur la possibilité d'ajouter ou de supprimer des tables et

des séquences de la réplication&nbsp;:</p>

<ul>

<li>SET DROP TABLE - enlève une table de la réplication</li>

<li>SET DROP SEQUENCE - fait de même pour les séquences</li>

<li>SET MOVE TABLE - déplace une table d'un set de réplication vers un

autre</li>

<li>SET MOVE SEQUENCE - fait de même pour les séquences</li>

</ul>

<p>

Les autres changements portent sur l'amélioration de certaines fonctionalités

que les tous premiers utilisateurs avaient jugé un peu rustiques, parmi

celles-ci&nbsp;:</p>

<ul>

<li>vacuum fréquent du pg_listener&nbsp;; les performances pouvaient souffrir d'une

croissance de tuples morts</li>

<li>un processus de nettoyage pour le pg_listener résout les cas où les vieux

processus slon étaient défunts suite à des problèmes réseau, laissant les

processus d'arrière plan en attente de notification d'évènements</li>

<li>amoindrissement du niveau de verrou sur sl_event, cela résout les cas où

un pg_dump aurait bloqué Slony-I</li>

<li>les purges CONFIRMENT les entrées des noeuds qui n'existent plus</li>

<li>ajout conséquent de documentation</li>

<li>scripts d'administration plus sophistiqués</li>

<li>utilisation d'une comparaison de chaînes pour les types de données définis

par l'utilisateur qui n'ont pas d'opérateur de comparaison adapté</li>

<li>purge de log plus sûre</li>

<li>plusieurs autres corrections de bogues et «&nbsp;propreté améliorée&nbsp;»</li>

<li>depuis cette 1.0.4, le moteur de réplication slon refuse de travailler avec

toute base de données qui n'aurait pas des versions de procédures stockées

identiques. De même pour tous les objets qui contiennent les fonctions de support

du langage C et les déclencheurs&nbsp;: tout cela doit être dans la même version pour

fonctionner. Tout cluster doit ainsi être mis à jour</li>

</ul>

<p>

Merci de vous reporter au fichier HISTORY-1.0 pour la liste détaillée des

changements dans cette version.

</p>