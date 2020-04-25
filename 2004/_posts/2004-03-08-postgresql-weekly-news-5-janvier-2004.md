---
layout: post
title: "PostgreSQL Weekly News - 5 janvier 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/348"
---


<h2>== Nouvelles hebdomadaires PostgreSQL - 5 janvier 2004 ==</h2>

Si "pas de nouvelles, bonnes nouvelles", alors j'ai beaucoup de bonnes

nouvelles pour tout le monde.

:-) Comme nous nous y attendions, cette semaine a été calme. En fait,

il est probable que le gros événement de la semaine ait été le blocage

des principaux serveurs web PostgreSQL. Les détails ne sont pas très

intéressants mais vous pouvez les lire ici si vous le souhaitez :

http://archives.postgresql.org/pgsql-general/2004-01/msg00101.php. Tout

devrait revenir à la normale maintenant pour que nous puissions

continuer tranquillement sur le reste de l'année 2004. Une amélioration

potentiellement passionnante implique la réécriture du moteur

indexscan. Cela va permettre l'utilisation d'index à deux colonnes où

la condition WHERE est similaire à 'col1 = quelquechose AND (col2 =

autrechose OR col2 = encoreautrechose)'. Auparavant si l'opérateur OR

n'était pas sur la première colonne de l'index, nous ne l'aurions pas

remarqué. L'analyse des opérateurs a vu une réduction de la surcharge

dans palloc() ce qui devrait aider à accélérer l'analyseur. Pas grand

chose de plus à dire, bien que nous ayons déjà quelques correctifs de

bogues incluant une correction sur l'exécuteur

pour un cas particulier où nous arrivons sans mémoire lors de la

fonction hash_creation pour les parcours d'index et une autre

correction pour les compilations n'utilisant pas gcc sur Solaris.

Quelques éléments ont traversé mon écran radar pour ceux intéressés par

les tests de performances entre bases de données. Le premier a été un

rapport des gens du Open Source Development Labs indiquant qu'il existe

maintenant un ensemble de tests automatiques pour les systèmes

PostgreSQL d'OSDL. Voici un lien vers leur annonce originale

(http://archives.postgresql.org/pgsql-hackers/2003-12/msg00797.php) et

un lien vers un exemple déjà bien utilisé

(http://archives.postgresql.org/pgsql-hackers/2003-12/msg00816.php). Le

deuxième était un lien vers un projet de tests de performance du style

TPC-H sur sourceforge (http://sourceforge.net/projects/benchw)

disponible pour de nombreux serveurs de bases de données incluant

PostgreSQL. Et finalement, Luis Neves a annoncé qu'il a "porté" la base

de données d'exemple Foodmart2000 utilisée dans la documentation

Microsoft et quelques autres articles techniques gérant le serveur

OLAP/SQL Server. Plus d'informations et une URL pour le téléchargement

sont disponibles sur

http://archives.postgresql.org/pgsql-general/2004-01/msg00095.php.

<!--more-->


<h2>== Nouvelles sur les produits concernant PostgreSQL ==</h2>

PHP Weather 2.2.0

http://www.phparch.com/news/922

WASP UDDI 4.6 - Fonctionnalités supplémentaires ajoutés à un produit solide

http://sys-con.com/webservices/article.cfm?id=752

<h2>== PostgreSQL dans les journaux ==</h2>

Object relational mappings are over-rated... (blog)

http://simon.incutio.com/archive/2004/01/01/foodForThought

Installing psycopg on Red Hat 9 (blog)

http://simon.incutio.com/archive/2003/12/31/psycopg

<h2>== Evénements à venir ==</h2>

Linux.Conf.Au: Adelaide, Australia: du 12 au 17 janvier

BOF et tutoriels présentés par Gavin Sherry

http://lca2004.linux.org.au.

LinuxWorld: New York City, New York: 21 janvier

Bruce Momjian présentera une BoF PostgreSQL

http://www.postgresql.org/event.php?EventID=180

NordU Usenix 2004: Denmark: du 28 janvier au 1er février

Bruce Momjian présentera quelques tutoriels PostgreSQL

http://www.nordu.org/NordU2004/

Linux Solutions 2004: Paris, France: du 3 au 5 février

Bruce Momjian fera une présentation

http://www.linuxsolutions.fr/EN/home/index.php?site=default

<h2>== Nouvelles hebdomadaires PostgreSQL - 5 janvier 2004 ==</h2>

N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain

Liste de diffusion générale http://www.varlena.com/GeneralBits/

Sur le web :

http://www.postgresql.org

http://advocacy.postgresql.org