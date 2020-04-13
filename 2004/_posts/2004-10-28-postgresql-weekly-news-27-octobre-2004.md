---
layout: post
title: "== PostgreSQL Weekly News - 27 Octobre 2004 =="
author: "jca"
redirect_from: "index.php?post/drupal-46 "
---


<em>Traduction d'un article posté sur pgsql-annouce par Robert Treat</em>

<p>

La première chose frappante cette semaine a été un correctif de sécurité pour les versions 7.2.6, 7.3.8 et 7.4.6. Les modifications se sont concentrées sur une vulnérabilité potentielle dans pg_ctl. Il est donc fortement conseillé de lire des notes de versions pour la version qui vous concerne et pour les autres correctifs qui y ont été inclus. Actuellement les téléchargements doivent pouvoir être réalisés sur les sites habituels ainsi que sur les miroirs FTP et sur Bittorrent.

</p>

<p>Tout d'abord, il y a eu une nouvelle version beta qui est sortie lundi. Il s'agit de PostgreSQL 8.0 Beta 4 et cette version doit être disponible sur tous les sites miroirs FTP et sur Bittorrent. Il y a un grand nombre de corrections par rapport aux betas précédentes. Vous pouvez en vérifier la liste complète sur le message d'annonce. Quelques éclaircissements sur les corrections de la semaine passée : le manque d'un index sur le contrôle d'accès  sur les vacuums oisifs (lazy vacuums), la suppression des transtypages qui n'étaient pas nécessaires, la labellisation de pg_tablespace en tant que catalogue partagé, l'écriture correcte des fichiers de configuration pour la plate-forme win32 sous la forme de fichiers textes à la place de fichiers binaires, la suppression du débordement dans cost_sort lorsque work_mem est supérieur à 1GO et la prévention de la perte de la synchronisation de la communication lorsqu'un message surdimensionné est envoyé au serveur.

</p>

<p>

Les autres modifications incluent la synchronisation des fuseaux

horaires avec la dernière base de données zic, l'ajout d'un drapeau

GUC_SUPERUSER_ONLY dans le code afin d'identifier les variable qui ne

doivent pas être visibles des autres utilisateurs, le remaniement du

code de ALTER COLUMN TYPE afin d'y supprimer les opérations de

coercition apparaissant au premier niveau de l'ancienne expression

d'une colonne avant l'ajout d'une coercition implicite à un nouveau

type de colonne, la résolution de quelques points concernant des

valeurs par défaut et n'ayant plus cours dans des types de données

comparables. L'utilisation des macros Min, Max et Abs dans leur version

<em>ad hoc</em>

a été supprimée dans les modules de contribution au profit de

l'utilisation de macros standards inclues dans les traitements centraux

du serveurs. Les actions d'intégrité référentielle ne sont plus

autorisées à être différées (seule la vérification NO ACTION est encore

différable). Enfin, nous nous sommes encore rapprochés de la

compatibilité avec le standard SQL</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL==</h3>

<p>

IONIC a sorti RedSpider Web 3.2 disposant de services 3D et du support de PostGIS <br />

<a href="http://www.gisuser.com/content/view/3686/">http://www.gisuser.com/content/view/3686/</a>

</p>

<p>

Nouvelle version de GForge 4.0 <br />

<a href="http://gforge.org/forum/forum.php?forum_id=150">http://gforge.org/forum/forum.php?forum_id=150</a>

</p>

<p>

PostgreSQL 8.0.0 Beta 4 déjà disponible<br />

<a href="http://www.postgresql.org/news/235.html">http://www.postgresql.org/news/235.html</a>

</p>

<p>

Nouvelles versions de sécurité pour PostgreSQL 7.2, 7.3 et 7.4<br />

<a href="http://www.postgresql.org/news/234.html">http://www.postgresql.org/news/234.html</a>

</p>

<p>

Slony-I 1.0.5 (Réplication de bases de données PostgreSQL)<br />

<a href="http://www.postgresql.org/news/233.html">http://www.postgresql.org/news/233.html</a>

</p>

<h3>== PostgreSQL dans la presse==</h3>

<p>

The Power of Linux<br />

<a href="http://www.ameinfo.com/news/Detailed/47305.html">http://www.ameinfo.com/news/Detailed/47305.html</a>

</p>

<p>

Allowing Registration-Required Binary Downloads<br />

<a href="http://www.onlamp.com/pub/a/php/2004/10/21/binary_downloads.html">http://www.onlamp.com/pub/a/php/2004/10/21/binary_downloads.html</a>

</p>

<p>

Idavoll 2: PostgreSQL backend (blog)<br />

<a href="http://ralphm.net/blog/2004/10/18/idavoll2">http://ralphm.net/blog/2004/10/18/idavoll2</a>

</p>

<p>

The Business Value of PGSuite (blog)<br />

<a href="http://jaredtech.blogspot.com/2004/10/business-value-of-pgsuite.html">http://jaredtech.blogspot.com/2004/10/business-value-of-pgsuite.html</a>

</p>

<h3>== Evènements autour de PostgreSQL ==</h3>

<p>

LinuxWorld Conferance: Frankfort, Allemagne 26-28 Octobre<br />

PostgreSQL disposera une fois de plus d'un stand au LinuxWorld Conference &amp; Expo.<br />

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a>

</p>

<p>

Formation gratuite à PostgreSQL: Malvern, Pennslyvanie: 30 octobre<br />

Bruce Momjian couvrira les thème de l'administration et du tuning de PostgreSQL .<br />

<a href="http://www.chariotsolutions.com/postgresql.jsp">http://www.chariotsolutions.com/postgresql.jsp</a>

</p>

<p>

Vanmtagem + Developers 2004: Lisbone, Portugal: 15-19 November<br />

Plusieurs sessions au sujet de PostgreSQL, modélisation relationnelle, SQL, et bien plus.<br />

<a href="http://www.v-developers.com">http://www.v-developers.com</a>

</p>