---
layout: post
title: "== PostgreSQL Weekly News - 7 décembre 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-54 "
---


<p>

Le 7 décembre dernier, Robert Treat nous annonçait sur la liste pgsql-announce:

</p>

<p>

Après bien des conversations et des débats, la core team a décidé de sortir

PostgreSQL 8.0.0 RC1 la semaine dernière, en nous mettant de fait dans la

phase finale du cycle de développement de la version 8.0. <strong>Le but étant de sortir

la version finale autour du 15 décembre si tout se passe bien</strong>. Tous les rapports

sur les portages, les traductions et les améliorations de dernière minute de la documentation

devraient être livrées rapidement. (La documentation actualisée sur les

portages peut être consultée sur le site

<a href="http://developer.postgresql.org/docs/postgres/supported-platforms.html">

http://developer.postgresql.org/docs/postgres/supported-platforms.html</a>).

Il y aura au moins une Release Candidate de plus avant la sortie finale, aussi

gardez un oeuil là dessus, les choses vont aller très vite à présent.

</p>

<!--more-->


Ainsi, qu'apporte cette RC1 en termes de corrections? Le code de sélection entre

readline et libedit a été ajusté pour préférer readline à libedit. Le

plannificateur a été modifié pour utiliser la taille réelle du disque plutôt que

les valeurs présentes dans pg_class, dans bien des scénarios. Cela simplifie

de nombreuses choses dans le backend et devraît produire des plans de requête bien

plus fiables. La libpq est désormais compilable sous MS Visual Studio .Net 2003

sur Windows XP. Le support de VACUUM FULL FREEZE a été enlevé à cause d'erreurs

potentielles qui pouvaient résulter de son utilisation. Cela sera probablement

corrigé dans une version ultérieure, mais dû à l'avancement général de la béta,

le travail à réaliser pour corriger le VACUUM FULL FREEZE et le VACUUM FREEZE

est trop important (NDT: ... et ne justifie pas à lui seul de reporter la sortie

de la version finale). Enfin, un scénario de bug sur l'utilisation des snapshots

internes pour les triggers déférés a été identifié et corrigé.

<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>Sortie d'EMS PostgreSQL Manager v.2.7<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-12/msg00001.php">

http://archives.postgresql.org/pgsql-announce/2004-12/msg00001.php

</a>

</p>

<p>sortie de pgAdmin III v.1.2.0<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-12/msg00000.php">

http://archives.postgresql.org/pgsql-announce/2004-12/msg00000.php

</a>

</p>

<p>Sortie de DBD::PgSPI v.0.02<br />

<a href="http://archives.postgresql.org/pgsql-hackers/2004-12/msg00255.php">

http://archives.postgresql.org/pgsql-hackers/2004-12/msg00255.php

</a>

</p>

<h3>== PostgreSQL dans la presse ==</h3>

<p>PostgreSQL 8 est "prêt pour l'entreprise"<br />

<a href="http://www.builderau.com.au/program/work/0,39024650,39160081,00.htm">

http://www.builderau.com.au/program/work/0,39024650,39160081,00.htm

</a>

</p>

<p>L'ALTER TABLE dans PostgreSQL 8.0 (blog)<br />

<a href="http://www.gnegg.ch/archives/alter_table_in_postgresql_80.html#000218">

http://www.gnegg.ch/archives/alter_table_in_postgresql_80.html#000218

</a>

</p>

<p>Le problème du metadata dans les bases de données (blog)<br />

<a href="http://joseph.randomnetworks.com/archives/2004/11/30/the-metadata-problem-with-databases/">

http://joseph.randomnetworks.com/archives/2004/11/30/the-metadata-problem-with-databases/

</a>

</p>

<h3>== Évènements autour de PostgreSQL ==</h3>

<p>PostgreSQL Bootcamp, Atlanta, GA, Big Nerd Ranch,<br />

<a href="http://www.bignerdranch.com/classes/postgresql.shtml">

http://www.bignerdranch.com/classes/postgresql.shtml

</a>

</p>

<p>PostgreSQL Training, SRA America, New York, NY.<br />

<a href="http://www.sraapowergres.com">

http://www.sraapowergres.com

</a>

</p>