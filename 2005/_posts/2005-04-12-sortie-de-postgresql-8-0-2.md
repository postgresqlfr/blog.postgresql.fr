---
layout: post
title: "Sortie de PostgreSQL 8.0.2"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-89 "
---


<p></p>

<!--more-->


<p>Sur la liste pgsql-announce@postgresql.org, "Marc G. Fournier" nous annonçait le 10 avril&nbsp;:</p>

<p>

Ces dernières semaines, Tom Lane a travaillé sur le remplacement de notre ancien Algorithme de Gestion du Cache (NDT: de l'anglais Cache Management Algorithm) par un nouvel équivalent débarrassé de tout brevet logiciel (2Q).

</p>

<p>

Afin de réduire le nombre de mises à jour pour les versions 8.x qui utilisent l'ancien gestionnaire de cache, nous venons de sortir la version 8.0.2. Nous encourageons tous les administrateurs à mettre à jour leurs serveurs rapidement.

</p>

<p>

Pour ceux qui ont déjà une version 8.x d'installée sur leurs serveurs de production, veuillez noter que cette mise à jour ne nécessite <strong>pas</strong> de restauration par dump. Cependant, à cause d'un impact dans version majeure de la librairie cliente (la libpq), cette mise à jour nécessitera que toutes les applications clientes soient recompilées en même temps.

</p>

<p>

Pour une liste complète des bugs corrigés dans cette version, merci de vous reporter au fichier HISTORY, que vous pouvez trouver à l'adresse suivante&nbsp;:<br />

<a href="http://www.postgresql.org/ftp/source/v8.0.2/HISTORY">

http://www.postgresql.org/ftp/source/v8.0.2/HISTORY</a>

</p>

<p>Les "tarballs" des sources sont disponibles à l'adresse suivante&nbsp;:<br />

<a href="http://www.postgresql.org/ftp/source/v8.0.2">

http://www.postgresql.org/ftp/source/v8.0.2</a>

</p>

<p>Les binaires et les programmes d'installation pour la version Windows sont disponibles ici&nbsp;:<br />

<a href="http://www.postgresql.org/ftp/binary/v8.0.2/win32/">

http://www.postgresql.org/ftp/binary/v8.0.2/win32/</a>

</p>

<p>Pour ceux qui utilisent Bittorent, David a mis les archives tar sur le site suivant&nbsp;:<br />

<a href="http://bt.postgresql.org">http://bt.postgresql.org</a>

</p>

<p>Merci de nous contacter sur la liste suivante pour tout bug ou problème que vous rencontreriez&nbsp;:<br />

<a href="mailto:pgsql-bugs@postgresql.org">

pgsql-bugs@postgresql.org</a>

<br /><br />

Merci...</p>