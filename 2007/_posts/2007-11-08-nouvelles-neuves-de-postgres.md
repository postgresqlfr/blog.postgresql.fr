---
layout: post
title: "Nouvelles neuves de Postgres"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/267"
---


<p><strong>Nouvelles hebdomadaires de Postgres - 4 novembre 2007</strong></p>

<ul>

<li>La 8.3 beta 2 est là&nbsp;: À vos tests&nbsp;!

<a target="_blank" href="http://www.postgresql.org/ftp/source/v8.3beta">http://www.postgresql.org/ftp/source/v8.3beta</a></li>

<li>Sondage&nbsp;: quelle nouvelle fonctionnalité vous excite le plus ?

<a target="_blank" href="http://www.postgresql.org/community">http://www.postgresql.org/community</a></li>

</ul>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Cybercluster, un système de réplication basé sur PgCluster, est publié sous licence BSDL.

<a target="_blank" href="http://www.postgresql.at/english/downloads_e.html">http://www.postgresql.at/english/downloads_e.html</a></li>

<li>PgPool II 2.0 beta est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<!--break-->

<li>PostgreSQL PHP Generator 7.10 est sorti&nbsp;:

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/phpgenerator/">http://www.sqlmaestro.com/products/postgresql/phpgenerator/</a></li>

<li>Whitebeam 1.1.5 est disponible&nbsp;:

<a target="_blank" href="http://www.whitebeam.org">http://www.whitebeam.org</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en novembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>La première réunion du PUG néo-zélandais aura lieu à Wellington, le 6 novembre 2007. Plus de détails à l'adresse&nbsp;:

<a target="_blank" href="http://pgug.org.nz">http://pgug.org.nz</a></li>

<li>Jetez un œil sur le nouveau forum Postgres concernant les emplois germanophones&nbsp;:

<a target="_blank" href="http://www.pg-forum.de/jobboerse-marktplatz/">http://www.pg-forum.de/jobboerse-marktplatz/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de ou en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/history.sgml, add note on PostgreSQL vs. Postgres.</li>

<li>More precise error message in pgsql/src/bin/pg_ctl/pg_ctl.c.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>Simple script to pull together a very small (&lt;500k) tar file that builds *just* libpq...its not perfect, as it pulls in more files then is necessarily required to build, but as it is, it requires one simple patch to configure.in in order to work... Tested on FreeBSD...patch for configure.in hasn't been applied, but putting the script in place so that it doesn't get lost...</li>

<li>Remove pgsql/src/tools/make_libpq.sh from CVS.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Clarify restart is of the "database" server, in FAQ.</li>

<li>Update Russian FAQ. Viktor Vislobokov.</li>

<li>Documentation wording fixes. Guillaume Lelarge.</li>

<li>Add to TODO: "Prevent long-lived temporary tables from causing frozen-Xid advancement starvation."</li>

<li>Add acronym section to our documentation.</li>

<li>Add documentation mention that FSM == Free Space Map, so the config parameter name makes more sense.</li>

<li>Acronym spelling fix.</li>

<li>Update Czech FAQ. Pavel Stehule</li>

<li>In pgsql/doc/src/sgml/release.sgml, mention that internal hash functions changed in 8.3 release notes.</li>

<li>Document that configure --with-libxslt controls just /contrib/xml2. Nikolay Samokhvalov</li>

<li>Update wording for xsl configure option.</li>

<li>Mention "replication" in the title of the high availability and load balancing chapter because some people were looking for 'replication' and didn't realize that chapter addressed it.</li>

<li>Properly indent tablespace SGML section.</li>

<li>In pgsql/doc/src/sgml/manage-ag.sgml, document possible problems with NFS tablespaces.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, add link to NFS section from "creating a database cluster.</li>

<li>Wording improvement to pgsql/doc/src/sgml/runtime.sgml.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Fix coredump during replay WAL after crash. Change entrySplitPage() to prevent usage of any information from system catalog, because it could be called during replay of WAL. Per bug report from Craig McElroy. Patch doesn't change on-disk storage.</li>

<li>Add check of already changed page while replay WAL. This touches only ginRedoInsert(), because other ginRedo* functions rewrite whole page or make changes which could be applied several times without consistent's loss. Remove check of identifying of corresponding split record: it's possible that replaying of WAL starts after actual page split, but before removing of that split from incomplete splits list. In this case, that check cause FATAL error. Per stress test which reproduces bug reported by Craig McElroy</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>New versions of mingw have gettimeofday(), so add an autoconf test for this.</li>

<li>Add compat file for dynamically loading the functions that MinGW is missing the imports for. Add RegisterWaitForSingleObject() to the list of such functions, which should take care of the current buildfarm breakage.</li>

<li>In pgsql/src/backend/port/win32/mingwcompat.c, make variable static, per Tom.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Remove claim that ts_headline knows how to generate multiple ellipsis-separated excerpts of a document. That's clearly desirable, but the functionality is not there yet.</li>

<li>Remove the hack in the grammar that "optimized away" DEFAULT NULL clauses. Instead put in a test to drop a NULL default at the last moment before storing the catalog entry. This changes the behavior in a couple of ways: 1. Specifying DEFAULT NULL when creating an inheritance child table will successfully suppress inheritance of any default expression from the parent's column, where formerly it failed to do so. 2. Specifying DEFAULT NULL for a column of a domain type will correctly override any default belonging to the domain; likewise for a sub-domain. The latter change happens because by the time the clause is checked, it won't be a simple null Const but a CoerceToDomain expression. Personally I think this should be back-patched, but there doesn't seem to be consensus for that on pgsql-hackers, so refraining.</li>

<li>Mention the index name in 'could not create unique index' errors, per suggestion from Rene Gollent.</li>

<li>In pgsql/doc/src/sgml/func.sgml, add a note pointing out that some other databases make GREATEST and LEAST handle NULL arguments differently than we do. Per a discussion on 30-Jun that somehow didn't get done.</li>

<li>Update some obsolete stuff in the GRANT and REVOKE reference pages: simplify the syntax examples by unifying user and group cases, and fix no-longer-correct example of psql \z output. Per Erwin Brandstetter.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, update discussion of shared memory sizing for 8.3: adjust multipliers, mention autovacuum_max_workers. Minor copy-editing too.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, update shared-memory-size info for 8.2 branch.</li>

<li>Some corrections/improvements to new acronym list.</li>

<li>Ensure that EquivalenceClasses generated from ORDER BY keys contain proper RelabelType nodes when the sort key is binary-compatible with the sort operator rather than having exactly its input type. We did this correctly for index columns but not sort keys, leading to failure to notice that a varchar index matches an ORDER BY request. This requires a bit more work in make_sort_from_pathkeys, but not anyplace else that I can find. Per bug report and subsequent discussion.</li>

<li>Teach CREATE CONSTRAINT TRIGGER to convert old-style foreign key trigger definitions into regular foreign key constraints. This seems necessary given that some people evidently never did get around to running adddepend on their schemas, and without some sort of hack the old definitions will no longer work. Per report from Olivier Prenant and subsequent investigation.</li>

<li>In pgsql/src/backend/storage/ipc/ipc.c, prevent continuing disk-space bloat when profiling (with PROFILE_PID_DIR enabled) and autovacuum is on. Since there will be a steady stream of autovac worker processes exiting and dropping gmon.out files, allowing them to make separate subdirectories results in serious bloat; and it seems unlikely that anyone will care about those profiles anyway. Limit the damage by forcing all autovac workers to dump in one subdirectory, PGDATA/gprof/avworker/. Per report from Joerg Beyer and subsequent discussion.</li>

<li>Minor improvements to code for converting legacy CREATE CONSTRAINT TRIGGER commands into proper foreign-key constraints. Believe the constraint name given in the trigger arguments in preference to the trigger name --- to judge from Olivier Prenant's example, pg_dump must at some time have used the autogenerated trigger name there, though AFAICT no current release branch tip does. Improve the emitted NOTICEs to provide more detail (PK table's name and column names). Handle the case where pg_dump forgot to provide the FROM table (a bug that never did get fixed in 7.0.x apparently). This commit doesn't do anything about the question of what to do with incomplete trigger groups.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Pas de déception cette semaine&nbsp;:-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in a Czech-language version of the FAQ.</li>

<li>Mark Kirkwood sent in a patch intended to fix the "Cache lookup failed for relation X" problem.</li>

<li>Magnus Hagander sent in a patch to implement krb_match_realm for krb5, gssapi and sspi.</li>

<li>Gevik Babakhani sent in a patch to implement named parameters in SQL functions.</li>

<li>Greg Sabino Mullane sent in a patch to improve the consistency of psql.</li>

</ul>