---
layout: post
title: "== PostgreSQL Weekly News - 28 décembre 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-59 "
---



<p>Le 28 décembre 2004, Rober Treat nous annonçait sur la liste pgsql-announce:</p>

<p>

Le groupe principal de PostgreSQL s'apprête à sortir une RC3 très bientôt, avec seulement un ou deux bug en ligne de mire. Cela devrait être la dernière RC avant la version finale. Mais comme toujours, cela dépendra de ce que l'on pourrait trouver encore comme bug à corriger.

</p>

<p>

Étant donné le cycle des releases et le planning des vacances, la liste des corrections apportées cette semaine est toute petite. Un scénario de bug a été trouvé lorsqu'un clog s'arrêtait exactement sur la fin d'une page (de données), il a été corrigé. Une fuite de mémoire a été trouvée dans VACUUM FULL lorsqu'on travaillait avec dans des cas particuliers, elle a été corrigée. L'inclusion de fichiers de configurations a été corrigée dans pg_hba.conf, pour être conforme avec ce qui est documenté, autorisant les chemins absolus dans les constructions de type "@fichier". Enfin, la libpq pointera désormais vers "localhost" pour les connexions sur des machines qui ne supportent pas les sockets Unix, plutôt que d'échouer.

</p>

<p>

Bien sûr, l'autre grande nouvelle de la semaine passée a été la sortie de la nouvelle version du <a href="http://www.postgresql.org">site officiel de PostgreSQL</a>. L'épreuve aura été longue et les efforts auront payé! L'interface a été largement améliorée et ajoute de la présence à PostgreSQL sur la toile. Un grand merci à tous ceux qui ont fait que cela puisse se faire et finalement arriver!

</p>

<h3>== PostgreSQL Produits autour de PostgreSQL ==

<p>

Sortie de pgmemcache-1.0 version RC1<br />

<a href="http://pgfoundry.org/forum/forum.php?forum_id=208">

http://pgfoundry.org/forum/forum.php?forum_id=208

</a>

</p>

<p>

Première version de Round-Robin<br />

<a href="http://pgfoundry.org/forum/forum.php?forum_id=209">

http://pgfoundry.org/forum/forum.php?forum_id=209

</a>

</p>

</h3>

<h3>== PostgreSQL dans les news ==</h3>

<p>

PostgreSQL se paye un nouveau site Web pour sa version 8.0 RC<br />

<a href="http://developers.slashdot.org/article.pl?sid=04/12/22/2040251">

http://developers.slashdot.org/article.pl?sid=04/12/22/2040251

</a>

</p>

<h3>== Évènements autour de PostgreSQL ==</h3>

<p>Linux Solutions: Paris, France: du 1er au 3 février<br />

PostgreSQL aura un stand avec plusieurs membres de la communauté qui le tiendront.<br />

<a href="http://www.solutionslinux.fr/en/index.php">

http://www.solutionslinux.fr/en/index.php

</a>

</p>