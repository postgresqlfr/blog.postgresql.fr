---
layout: post
title: "Sortie de PostgreSQL 9.6"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/2016/09/29/Sortie-de-PostgreSQL-9.6"
---




<!--more-->


<p>29 septembre 2016 : le PostgreSQL Global Development Group a publié aujourd'hui PostgreSQL 9.6, dernière version du système libre de gestion de bases de données SQL de référence.

Cette version va permettre aux utilisateurs de réaliser à la fois une expansion interne (scale up) et externe (scale out, répartition de la charge) de leurs bases de données haute-performance. Les nouvelles fonctionnalités incluent notamment le parallélisme des requêtes, des améliorations sur la réplication synchrone, la recherche par phrase, ainsi que des améliorations sur la performance et la facilité d'utilisation.</p>

<strong>Expansion interne avec le parallélisme des requêtes</strong>

<p>La version 9.6 ajoute le support du parallélisme pour certaines opérations dans les requêtes.

Ce parallélisme active l'utilisation de tout ou partie des cœurs de processeur d'un serveur pour retourner les résultats plus rapidement.

Sur cette version, le parallélisme concerne le parcours séquentiel (des tables), les agrégats et les jointures.

En fonction des caractéristiques et du nombre de cœurs, le parallélisme permet d'espérer des gains jusqu'à un facteur 32 sur des requêtes traitant des volumes importants de données.</p>

<p>"J'ai migré l'intégralité de notre plateforme génomique - soit un héritage de 25 milliards de lignes MySQL - vers une seule base de données Postgres, en utilisant les possibilités de compression du type JSONB, les excellentes méthodes d'indexation GIN, BRIN et B-tree. Aujourd'hui, avec la version 9.6, j'attends de pouvoir exploiter le parallélisme des requêtes pour améliorer encore plus les performances des requêtes sur les tables volumineuses" indique Mike Sofen, Chief Database Architect chez Synthetic Genomics.</p>

<strong>Répartition de charge avec la réplication synchrone et postgres_fdw</strong>

<p>Deux nouvelles options ont été ajoutées à la réplication synchrone de PostgreSQL. Elles permettent de maintenir des lectures cohérentes de données sur les nœuds d'un cluster de bases de données. En premier lieu, il est désormais possible de configurer des groupes de réplication synchrone. En second lieu, le mode "remote_apply" (application distante) crée une vue plus cohérente des données sur les différents nœuds. Ces fonctionnalités utilisent la réplication interne pour maintenir un groupe de nœuds "identiques" afin d'équilibrer la charge de lecture (load-balancing).</p>

<p>Le pilote de fédération de données entre bases PostgreSQL, postgres_fdw, dispose de nouvelles fonctionnalités d'exécution du travail sur le serveur distant. En "t;externalisant" les tris, les jointures et les mises à jour par lot, la charge peut être distribuée sur plusieurs serveurs PostgreSQL. Ces possibilités seront bientôt ajoutées aux autres pilotes FDW.</p>

<p>"Avec les possibilités d'externaliser les jointures, les mises à jour et les suppressions, les Foreign Data Wrappers offrent maintenant une solution complète de partage de données entre PostgreSQL et les autres bases de données. Par exemple, PostgreSQL peut être utilisé pour gérer en entrée des données qui vont vers des bases de données différentes" indique Julyanto Sutandang, Director of Business Solutions chez Equnix.</p>

<strong>Meilleure recherche de texte avec des phrases</strong>

<p>La fonctionnalité de recherche plein texte de PostgreSQL supporte désormais les recherche par phrases. Cela permet une recherche de phrases exactes ou de mots proches les uns des autres, en utilisant l'indexation GIN. Additionné aux nouvelles fonctionnalités d'optimisation de la recherche textuelle, cet apport fait de PostgreSQL un outil de choix pour la "recherche hybride" mêlant relationnel, JSON et recherche plein texte.</p>

<strong>Plus agréable, plus rapide et plus facile à utiliser</strong>

<p>Grâce au retours d'expérience et aux tests effectués par les utilisateurs de PostgreSQL disposant de bases de données de production à fort volume, le projet a pu améliorer de nombreux aspects des performances et de la maniabilité dans cette version. La réplication, les agrégats, l'indexation, les tris et les procédures stockées sont plus efficaces, et PostgreSQL utilise désormais mieux les ressources lorsqu'il est installé sur des noyaux Linux récents. Le surcoût d’administration des tables volumineuses et des charges complexes a été réduit, notamment par des améliorations du VACUUM.</p>

<h2>Détail des fonctionnalités</h2>

<p>

Plus d'informations sur les fonctionnalités ci-dessus et les autres dans les liens suivants :

</p>

<ul>

<li><a href="https://www.postgresql.org/docs/current/static/release-9-6.html">Notes de version (En anglais)</a></li>

<li><a href="https://wiki.postgresql.org/wiki/NewIn96">Nouveautés de PostgreSQL 9.6 (En anglais)</a></li>

<li><a href="https://www.postgresql.org//about/featurematrix">Matrice de fonctionnalités (En anglais)</a></li>

<li><a href="https://momjian.us/main/writings/pgsql/features.pdf">Les principales fonctionnalités (En anglais)</a></li>

<li><a href="https://www.youtube.com/watch?v=HjAeLE9aNhQ">A Look Inside The Elephant's Trunk: 9.6</a></li>

<li><a href="https://www.youtube.com/watch?v=RkkUbQP3G0A">Présentation des performances de PostgreSQL 9.6</a></li>

</ul>

<h2>Téléchargement</h2>

<ul>

<li><a href="https://www.postgresql.org//download">Page de téléchargement</a> avec les liens pour les logiciels et outils d'installation pour Windows, Linux, OSX, BSD et Solaris.</li>

<li><a href="https://www.postgresql.org//ftp/source/v9.6.0">Code Source</a></li>

<li><a href="https://hub.docker.com/_/postgres/">Image Docker de Postgres</a></li>

<li><a href="http://pgxn.org">PostgreSQL Extension Network</a></li>

</ul>

<h2>Documentation</h2>

<p>

La documentation au format HTML et les pages de manuel sont installées avec PostgreSQL. La <a href="https://www.postgresql.org/docs/9.6/static">documentation en ligne</a>, exhaustive et interactive, peut être parcourue, interrogée et commentée librement.

</p>

<h2>Licence</h2>

<p>

PostgreSQL utilise la <a href="/about/licence">licence PostgreSQL</a>, une licence permissive de type BSD. Cette <a href="http://www.opensource.org/licenses/postgresql">licence certifiée par l'OSI</a> est largement appréciée pour sa flexibilité et sa compatibilité avec le monde des affaires, puisqu'elle ne restreint pas l'utilisation de PostgreSQL dans les applications propriétaires ou commerciales. Associée à un support proposé par de multiples sociétés et une propriété publique du code, sa licence rend PostgreSQL très populaire parmi les revendeurs souhaitant embarquer une base de données dans leurs produits sans avoir à se soucier des prix de licence, des verrous commerciaux ou modifications des termes de licence.

</p>

<h2>Contacts</h2>

<p>Pages Web</p>

<ul>

<li><a href="https://www.postgresql.org">Page d'accueil PostgreSQL</a></li>

</ul>

<p>Contact presse</p>

<p>France et pays francophones<br />

Stéphane Schildknecht<br />

<a href="mailto:fr@postgresql.org">fr at postgresql dot org</a><br />

+33 (0) 617 11 37 42</p>

<p>Pour les contacts d'autres régions, consulter <a href="https://www.postgresql.org/about/press/contact">la liste des contacts internationaux.</a></p>

<h2>Informations concernant les sociétés citées et texte intégral des citations

</h2>

<p>

"En tant qu'architecte en chef de bases de données chez Synthetic Genomics, j'ai été réellement impressionné par la puissance, la flexibilité et la richesse des interfaces de programmation de Postgres 9.5. J'ai migré l'intégralité de notre plateforme génomique — soit 25 milliards de lignes issues de MySQL — vers une seule base de données Postgres, en utilisant les possibilités de compression du type JSONB, les excellentes méthodes d'indexation GIN, BRIN et B-tree, ainsi que l'élégant langage de programmation de fonctions stockées PL/pgSQL. Aujourd'hui, avec la version 9.6, j'attends de pouvoir exploiter le parallélisme des requêtes pour améliorer encore plus les performances des requêtes sur les tables volumineuses.

Postgres 9.5 a prouvé par lui-même qu'il est complètement stable, remarquablement performant, et selon moi, le meilleur moteur à ce jour de stockage de données hybride relationnel-document sur le marché." indique Mike Sofen, Chief Database Architect chez Synthetic Genomics.

</p>

<p><a href="https://www.syntheticgenomics.com/">Synthetic Genomics, Inc.</a> (SGI) est l'un des leaders mondiaux dans les domaines de la biologie de synthèse et la génomique de synthèse. SGI se fonde sur l'utilisation de la propriété intellectuelle dans cette discipline qui évolue rapidement, pour concevoir et réaliser des systèmes biologiques qui permettent de résoudre les défis de développement durable à l'échelle de la planète. SGI fournit des solutions dans les domaines de la recherche génomique, de la bio-production et des produits appliqués. La recherche est focalisée sur les solutions génomiques pour tout organisme de recherche et développement, académique ou commercial. Les produits et services commerciaux incluent l'instrumentation, les réactifs, les services de synthèse d'ADN et les logiciels et services en bio-informatique. Contact&nbsp;: Synthetic Genomics, <a href="mailto:media@syntheticgenomics.com">media@syntheticgenomics.com</a> (anglais)

</p>

<p>"Avec les possibilités d'externaliser les jointures, les mises à jour et les suppressions, les Foreign Data Wrappers offrent maintenant une solution complète de partage de données entre PostgreSQL et les autres bases de données. Par exemple, PostgreSQL peut être utilisé pour gérer en entrée des données qui vont vers des bases de données différentes" indique Julyanto Sutandang, Director of Business Solutions chez Equnix.</p>

<p><a href="http://www.equnix.co.id">Equnix</a> est fournisseur de solutions informatiques pour les entreprises. Cette société met en place des solutions alternatives complètes, basées sur la recherche, le développement et du code libre. Equnix fournit du service autour de PostgreSQL. Contact en anglais ou en indonésien&nbsp;:  <a href="mailto:info@equnix.co.id">Info@equnix.co.id</a> ou téléphoner à Johan D. au +6221-22866662.</p>

<h2>Support Professionnel</h2>

<p>PostgreSQL bénéficie du support de nombreuses sociétés, qui financent des développeurs, fournissent l'hébergement ou un support financier. Les plus fervents supporters sont listés sur la <a href="https://www.postgresql.org/about/sponsors/">page des mécènes du développement</a>.</p>

<p>Il existe également une très grande communauté de <a href="https://www.postgresql.org/support/professional_support">sociétés fournissant du support PostgreSQL</a>, des consultants indépendants aux sociétés multinationales.

</p>

<p>Les <a href="https://www.postgresql.org/about/donate">dons</a> sont acceptés avec plaisir.</p>

<p>Vous pouvez également acheter des produits dérivés de qualité sur la <a href="http://www.zazzle.com/postgresql">Boutique Zazzle PostgreSQL</a>. </p>