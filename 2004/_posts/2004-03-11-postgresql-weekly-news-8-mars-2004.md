---
layout: post
title: "PostgreSQL Weekly News - 8 mars 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/356"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 8 mars 2004 ==</h2>

<p>Même avec les sorties de cette semaine, nous avons vu quelques contributions intéressantes

sur l'arbre de la 7.5, et un gros travail de fond a été fourni sur les fonctionnalités

telles que les espaces de stockage (tablespaces) et le PITR (point-in-time recovery). Malgré

tout, l'attention principale s'est portée sur les sorties et voici quelques nouvelles sur

les deux de cette semaine. Attardons-nous un peu sur la 7.3.6. Quelques problèmes concernant

une mauvaise installation des pages de manuel sont apparus dans le paquet de cette version.

Rien d'autre n'a été affecté mais si vous avez besoin de ces pages, vous devriez de nouveau

télécharger le code via FTP. Le paquet corrigé sera aussi bientôt disponible sur notre page

sourceforge. Entre temps, la 7.4.2 a été préparé et subi actuellement un grand nombre de

vérifications. Attendez-vous rapidement à une annonce officielle.

</p>

<p>De retour dans le monde de la branche 7.5, nous devons mentionner quelques ajouts. La

fonction is_distinct_query() de l'optimiseur a été amélioré pour reconnaître qu'une instruction

GROUP BY force un résultat distinct de la sous-requête lorsque toutes les colonnes du GROUP BY

apparaissent en sortie. Nous avons aussi vu l'ajout des fonctions internes SPI_getargtypeid,

SPI_getargcount et SPI_is_cursor_plan au niveau du moteur. Elles seront utilisées par PL/Java

(mais peut-être aussi par d'autres langages procéduraux). Entrer une chaîne vide dans un champ

oid ou dans un champ de type float4 et/ou float8 émettra maintenant un message d'attention

(niveau warning) pour commencer la mise en place de l'obsolescence de cette fonctionnalité&nbsp;;

cela produira un message d'erreur (niveau error) à partir de la 7.6. La fonction intégrée date_trunc

reconnait la semaine ('week') en entrée. Le programme pg_dump a profité de quelques modifications

pour l'aider à avoir des sauvegardes plus consistantes à partir de bases de données logiquement

identiques mais disposant d'historiques DDL différentes. Enfin, le module dblink a aussi été

travaillé, ce qui a permis l'apparition de nouvelles versions de dblink, dblink_exec, dblink_open,

dblink_close et dblink_fetch. Enfin, certaines documentations de fonctions obsolètes, et maintenant

supprimés, ont été effacées.</p>

<p>En parlant des modules, John Gray a soumis une version révisée de l'intégration d'XPath dans le

code. Les nouvelles fonctionnalités incluent les fonctions 'set-returning' d'XPath permettant que

des résultats multiples provenant de différentes requêtes XPath soient utilisés en tant que table

virtuelle ainsi que l'utilisation de libxslt pour les transformations XSLT. Dû aux nombreux

changements, certains ayant introduits des incompatibilités descendantes et des potentiels risques de

sécurité du nouveau code, celui-ci a été placé dans le répertoire xml2 de contrib. Merci encore à

John et aux personnes de Torchbox qui ont bien aidé John.</p>

<p>Au niveau de la documentation front, plusieurs FAQ ont été mises à jour pour coïncider avec les

nouvelles sorties. Un effot particulier a été apporté aux documentations de l'instruction RULES,

de la fonction trim, du paramètre virtual_host et de nombreuses références croisées ont été ajoutées

entre les différentes sections concernant des thèmes similaires.</p>

<p>Des nouvelles d'un autre front important ont concerné le projet de réplication SLONY-I de Jan

Wieck. La configuration fonctionne maintenant sur Red Hat Linux et sur FreeBsd 4.9. De plus, le moteur

gère les installations en direct (hot install), les souscriptions directes (hot subscribe with catch

up) avec récupération immédiate et les esclaves en cascade (cascaded slaves). Son message complet ainsi

que l'URL du projet et des informations sur ce qu'il manque est disponible sur

<a href="http://archives.postgresql.org/pgsql-general/2004-03/msg00146.php">http://archives.postgresql.org/pgsql-general/2004-03/msg00146.php</a>.</p>

<p>Et enfin, je voudrais, cette semaine, mentionner un oubli de la semaine dernière. Les personnes

travaillant sur le projet DBD::Pg ont sorti la version 1.32, qui devrait maintenant être

disponible via CPAN. Cette version corrige un bon nombre de problèmes ; jetez un oeil à

l'annonce originale pour plus d'informations

(<a href="http://archives.postgresql.org/pgsql-interfaces/2004-02/msg00079.php">http://archives.postgresql.org/pgsql-interfaces/2004-02/msg00079.php</a>).

Beau travail, les gars !</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de la beta 6 de PgSqlCLient .net Data Provider 1.0<br />

<a href="http://pgsqlclient.sourceforge.net/?q=node/view/18">http://pgsqlclient.sourceforge.net/?q=node/view/18</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Library of Congress plans new film, video portal<br />

<a href="http://gcn.com/23_5/tech-report/25133-1.html">http://gcn.com/23_5/tech-report/25133-1.html</a></li>

<li>PostgreSQL Ported to GameCube, Linux Progressing<br />

<a href="http://games.slashdot.org/games/04/03/07/0519240.shtml">http://games.slashdot.org/games/04/03/07/0519240.shtml</a></li>

<li>Study: Open-source databases going mainstream<br />

<a href="http://zdnet.com.com/2100-1104_2-5171543.html">http://zdnet.com.com/2100-1104_2-5171543.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 1er mars 2004 ==</h2>

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