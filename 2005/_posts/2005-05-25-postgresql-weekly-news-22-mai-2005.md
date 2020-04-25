---
layout: post
title: "PostgreSQL Weekly News - 22 mai 2005"
author: "Jean-Paul Argudo"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/96"
---


<p>David Fetter nous annonçait le 22 mai sur la liste pgsql-announce:</p>

<p>

Une discussion importante a eu lieu sur les nouvelles vues des objets système (cf <a href="http://www.pgfoundry.org/projects/newsysviews"> http://www.pgfoundry.org/projects/newsysviews</a>).</p>

<p>Andrew Dunstan a séparé les tests de régression sur les langages procéduraux du reste, ce qui permet à présent à la ferme de compilation de faire ces tests.</p>

<!--more-->


Plusieurs nouvelles propositions ont étés ajoutées afin que l'on soit prêt pour un gel des fonctionalités pour le 1er Juillet (NDT: avant une version majeure, on interdit (on "gèle") l'ajout de fonctionalité en délimitant ainsi le périmètre de cette version, afin de planifier un cycle de développement). Andras Kadinger s'est proposé pour revoir le code de LISTEN/NOTIFY afin qu'il soit monté en mémoire partagée, avec un système de messages. Simon Riggs a présenté un document de spécification sur le partitionnement de tables. L'équipe de A. Carnegie Mellon a soumis une spécification sur un système capable de gérer des priorités sur les requêtes. Victor Yegorov a commencé à parler des problèmes qu'il rencontre sur l'implémentation d'un index bitmap sur disque. Il y a eu une discussion très vive ainsi que plusieurs ajouts de correctifs sur la fonctionalité dite du « Two Phase Commit ».

<p>

Abhijit Menon-Sen a ajouté une fonctionalité "return_next()" à PL/Perl qui permet de réduire l'utilisation de la mémoire pour les "result sets" avec PL/Perl.</p>

<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>

EnterpriseDB Corporation annonce la version publique en béta de EnterpriseDB 2005 (EDB2005). Basé sur PostgreSQL, EDB2005 ajoute une compatibilité avec de nombreuses applications écrites pour les BDD Oracle. L'implémentation permet ainsi une compatibilité de la syntaxe SQL, des types de données, des triggers et des procédures stockées natives d'Oracle vers PostgreSQL&nbsp;!<br /><a href="http://www.enterprisedb.com/">http://www.enterprisedb.com/</a></p>

<p>Le projet "Data Access Application Blocks for PostgreSQL" a démarré:<br /><a href="http://pgfoundry.org/projects/npgsqldaab/">http://pgfoundry.org/projects/npgsqldaab/</a></p>

<p>Sortie de DBD::Pg 1.42: La première version de la documentation développeur est à présent dans l'arbre CVS:<br /><a href="http://search.cpan.org/%7Edbdpg/DBD-Pg-1.42"> http://search.cpan.org/~dbdpg/DBD-Pg-1.42</a></p>

<p>La ferme de compilation a maintenant un nouveau client pour l'utiliser:<br /><a href="http://pgfoundry.org/forum/forum.php?forum_id=405">http://pgfoundry.org/forum/forum.php?forum_id=405</a></p>

<p>Cinq versions bétas, et Slony-I 1.1 semble être prêt pour une version "Release Candidate" (pré-version) très prochainement.<br /><a href="http://slony.info/">http://slony.info/</a></p>

<p>QLR Manager Expanded to Support Postgresql<br /><a href="http://www.qlrmanager.com/index.html"> http://www.qlrmanager.com/index.html</a></p>

<h3>== PostgreSQL sur le Web ==</h3>

<p>

Conférence FISL6, Porto Alegre, Brésil: il y aura deux présentations sur PostgreSQL, dont une de Josh Berkus.<br /><a href="http://fisl.softwarelivre.org/6.0/">

http://fisl.softwarelivre.org/6.0/</a></p>

<p>General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a><br />Les applications de type "Questionnaire" basées sur des questions/réponses peuvent être appréhendées facilement grâce à l'héritage...</p>