---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 7 mai 2006"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/182"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 7 mai 2006</strong></p>

<p>

Heikki Linnakangas et Tom Lane ont réécrit la lecture des index séquentiels btree (arbres binaires) afin de traiter une page à chaque fois quel que soit le cas. En plus de simplifier et (parfois) améliorer les la vitesse du code de parcours de l'index, cette réécriture nous permettra de réimplanter btbulkdelete comme un  une grosse lecture séquentielle à la place d'un parcours transverse comme on le ferait pour un index. Celà permettra de réduire le coût d'un VACUUM. <a target="_blank" href="http://archives.postgresql.org/pgsql-committers/2006-05/msg00050.php">http://archives.postgresql.org/pgsql-committers/2006-05/msg00050.php</a>

</p>

<p>

Bruce Momjian a ajouté le suppore de SSL CRL à la libpq.  <a target="_blank" href="http://archives.postgresql.org/pgsql-committers/2006-05/msg00039.php">http://archives.postgresql.org/pgsql-committers/2006-05/msg00039.php</a>

<a target="_blank" href="http://archives.postgresql.org/pgsql-committers/2006-05/msg00044.php">http://archives.postgresql.org/pgsql-committers/2006-05/msg00044.php</a>

</p>

<p>

Larry Rosenman de  Pervasive a soumis un patch pour CVS TIP qui ajoute une nouveau champ de type estampille (<em>timestamp</em>)

à la vue pg_stat_all_tables : last_vacuum, last_autovacuum,

last_analyze et last_autoanalyze. Cela rendra les choses plus simples

pour les gens te les outils de suivi des actions de «&nbsp;maintenance sur

les tables&nbsp;». </p>

<p>

Teodor Sigaev a ajouté les Index Inversé Généralisés (<em>Generalized Inverted Indexes (GIN)</em>) au CVS TIP. Celà aidera au développement du futur tsearch3, entre autres choses. </p>

<p>

Comment lire des métadonnées : un tutoriel («&nbsp;<em>How to get metadata: a tutorial</em>&nbsp;»).  <a target="_blank" href="http://www.alberton.info/postgresql_meta_info.html">http://www.alberton.info/postgresql_meta_info.html</a>

</p>

<p>

Les inscriptions au «&nbsp;<em>PostgreSQL Anniversary</em>&nbsp;» sont ouvertes  <a target="_blank" href="http://conference.postgresql.org/Registration">http://conference.postgresql.org/Registration</a>

</p>

<p>

Le «&nbsp;<em>PostgreSQL Anniversary Summit</em>&nbsp;» est sponsorisé par Afilias, EnterpriseDB, GreenPlum, Pervasive et Sun Microsystems. </p>

<!--more-->


<p><strong>Nouvelles des produits autour de PostgreSQL</strong></p>

<ul>

<li>

DBD::Pg 1.49 est sorti  <a target="_blank" href="http://search.cpan.org/%7Edbdpg/DBD-Pg-1.49/">http://search.cpan.org/~dbdpg/DBD-Pg-1.49/</a>

</li>

<li>

PostgresPy Package Release 0.1 contenant Proboscis 0.2 le nouveau driver), Slythe 0.1 (la nouvelle «&nbsp;console à distance&nbsp;» ), and Boss 0.1 (le nouveau «&nbsp;contrôlleur&nbsp;» ) est sorti. </li>

<a target="_blank" href="http://python.projects.postgresql.org/">http://python.projects.postgresql.org/</a>

<li>

Komo PostgreSQL plugin pour Eclipse est sorti.  <a target="_blank" href="http://pgfoundry.org/projects/komo-client/">http://pgfoundry.org/projects/komo-client/</a>

</li>

<li>

Le fichier de colorisation vim de Devrim Gunduz gère maintenant la syntaxe du PL/PgSQL.  <a target="_blank" href="http://www.gunduz.org/postgresql/pgsql.vim">http://www.gunduz.org/postgresql/pgsql.vim</a>

</li>

<li>&lt;

Le pilote SDBC natif pour PostgreSQL version 0.7.1 pour OpenOffice.org est sorti.  <a target="_blank" href="http://dba.openoffice.org/drivers/postgresql/index.html">http://dba.openoffice.org/drivers/postgresql/index.html</a>

</li>

</ul>

<p><strong>Nouvelles régionales de PostgreSQL</strong></p>

<p>

Cette semaine toutes les nouvelles sont mondiales. </p>

<p><strong>PostgreSQL dans la presse</strong></p>

<ul>

<li>

Planet PostgreSQL:  <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, publié toues les lundis (PST/PDT):  <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

PostgreSQL Weekly News a été produit cette semaine par David Fetter, Lorenzo Alberton et Volkan (knt) Yazici </p>