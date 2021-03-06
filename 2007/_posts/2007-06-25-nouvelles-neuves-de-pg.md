---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/173"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 17 Juin 2007</strong></p>

<p>postgresql_autodoc, postgresql-pgpoolAdmin et postgresql-table_log font maintenant partie de Fedora. Vous pouvez les installer avec Yum.</p>

<p>Si vous désirez des RPM de programmes en lien avec PostgreSQL, veuillez envoyer un email à devrim <em>abizarre</em> commandprompt <em>point</em> com.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>pgpool-II 1.1.1 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool">http://pgfoundry.org/projects/pgpool</a></li>

<li>pycopg2 2.0.6 vient de paraître&nbsp;:

<a target="_blank" href="http://www.initd.org/tracker/psycopg/wiki/%21PsycopgTwo">http://www.initd.org/tracker/psycopg/wiki/!PsycopgTwo</a></li>

<li>DB_Linq Linq Provider pour Postgres est disponible&nbsp;:

<a target="_blank" href="http://code2code.net/DB_Linq/index.html">http://code2code.net/DB_Linq/index.html</a></li>

<li>Federico Campoli a publié deux livres "<a href="http://www.lulu.com/about/">Lulu</a>" en italien:<br />

<a href="http://www.lulu.com/content/935235">PostgreSQL DBA Base</a><br />

<a target="_blank" href="http://www.lulu.com/content/939666">PostgreSQL DBA Advanced</a></li>

</ul>

<p><strong>PostgreSQL Jobs for June</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-06/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>Les inscriptions pour les pgday.it du 6 et 7 juillet sont ouvertes. L'événement aura lieu en Toscane, à Prato (Italie).</p>

<p>Quelques URLs à noter&nbsp;:</p>

<ul>

<li>Inscription&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/generale/registrazione">http://www.pgday.it/en/generale/registrazione</a></li>

<li>Site web dédié&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/">http://www.pgday.it/en/</a></li>

<li>Sponsoriser l'événement&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/sponsorizzazioni/come">http://www.pgday.it/en/sponsorizzazioni/come</a></li>

<li>...en commandant un T-shirt PostgreSQL ?

<a target="_blank" href="http://www.prato.linux.it/node/30">http://www.prato.linux.it/node/30</a></li>

<li>Moyens de transport&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/logistica/raggiungere_prato">http://www.pgday.it/en/logistica/raggiungere_prato</a></li>

<li>Hébergement&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/logistica/dove_dormire">http://www.pgday.it/en/logistica/dove_dormire</a></li>

<li>... et un peu de tourisme dans les vallées de Toscane&nbsp;:

<a target="_blank" href="http://www.pgday.it/it/node/158">http://www.pgday.it/it/node/158</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/%21GeneralBits/">http://www.varlena.com/!GeneralBits/</a></li>

</ul>

<p><em>Les PostgreSQL Weekly News vous sont présentées cette semaine par David Fetter et Devrim Gunduz. Adaptation francophone par la communauté PostgresqlFr.</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</em></p>

<p><strong>Applied Patches</strong></p>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Implement a chunking protocol for writes to the syslogger pipe, with messages reassembled in the syslogger before writing to the log file. This prevents partial messages from being written, which mucks up log rotation, and messages from different backends being interleaved, which causes garbled logs. Backport as far as 8.0, where the syslogger was introduced. Tom Lane and Andrew Dunstan</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/tab-complete.c, schema-qualify several references to the builtin function length(), to avoid mistakenly calling a function of the same name that might happen to appear earlier in the schema search path.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Update TODO item to read: "Allow EXPLAIN output to be more easily processed by scripts, perhaps XML."</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Avoid having autovacuum run multiple ANALYZE commands in a single transaction, to prevent possible deadlock problems. Per request from Tom Lane.</li>

<li>Avoid integer overflow issues in autovacuum.</li>

<li>VPATH fixes for ECPG tests.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Add resultmap entries for mingw - same as for MSVC.</li>

<li>Properly identify mingw as a win32 platform needing different diff options to deal with strange line endings.</li>

<li>ECPG requires a local include directory to override the project-wide ones. Add ability to add "prefix include directories", and use it... With this, ecpg regression tests now pass on MSVC builds.</li>

<li>Update documentation of resultmap file format.</li>

<li>Specifying a dbname should override the default database, not add to it. Fixes buildfarm failures on contribcheck.</li>

<li>Fix missing variable initialization in pgsql/src/test/regress/pg_regress.c.</li>

<li>Fix search/replace error in makefile for ecpg tests.</li>

<li>Rewrite ECPG regression test driver in C, by splitting the standard regression driver into two parts and reusing half of it. Required to run ECPG tests without a shell on MSVC builds. Fix ECPG thread tests for MSVC build (incl output files). Joachim Wieland and Magnus Hagander.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Revert an ill-considered portion of my patch of 12-Mar, which tried to save a few lines in sql_exec_error_callback() by using the function source string field that the patch added to SQL function cache entries. This doesn't work because the fn_extra field isn't filled in yet during init_sql_fcache(). Probably it could be made to work, but it doesn't seem appropriate to contort the main code paths to make an error-reporting path a tad faster. Per report from Pavel Stehule.</li>

<li>Tweak the API for per-datatype typmodin functions so that they are passed an array of strings rather than an array of integers, and allow any simple constant or identifier to be used in typmods; for example create table foo (f1 widget(42,'23skidoo',point)); Of course the typmodin function has still got to pack this info into a non-negative int32 for storage, but it's still a useful improvement in flexibility, especially considering that you can do nearly anything if you are willing to keep the info in a side table. We can get away with this change since we have not yet released a version providing user-definable typmods. Per discussion.</li>

<li>Add some simple defenses against null fields in pg_largeobject, and add comments noting that there's an alignment assumption now that the data field could be in 1-byte-header format. Per discussion with Greg Stark.</li>

<li>In pgsql/src/backend/utils/init/flatfiles.c, add some comments about the safety of accessing rolpassword without using the normal heap_getattr() machinery. Per Greg Stark.</li>

<li>Minor comment fixes in pgsql/src/include/utils/datetime.h.</li>

<li>Fix DecodeDateTime to allow timezone to appear before year. This had historically worked in some but not all cases, but as of 8.2 it failed for all timezone formats. Fix, and add regression test cases to catch future regressions in this area. Per gripe from Adam Witney.</li>

<li>Improve UPDATE/DELETE WHERE CURRENT OF so that they can be used from plpgsql with a plpgsql-defined cursor. The underlying mechanism for this is that the main SQL engine will now take "WHERE CURRENT OF $n" where $n is a refcursor parameter. Not sure if we should document that fact or consider it an implementation detail. Per discussion with Pavel Stehule.</li>

<li>Minor wording improvement in PL/PgSQL docs.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Applied patch by Joachim Wieland to enable checktcp again.</li>

<li>Fixed reduce/recuce problem due to CURRENT_P.</li>

<li>Synced parser and keyword list.</li>

<li>Should not try to unlink stdout.</li>

<li>Fixed one memory leak in descriptor code. Made sure ecpg deletes output file in case of an error.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Satoshi Nagayasu sent in a brand new patch to log checkpointing load information which will help tune the bgwriter parameters.</li>

<li>Gregory Stark sent in a patch which fixes two aesthetic bugs in the 1-byte packed varlena code.</li>

<li>ITAGAKI Takahiro sent in a new patch or split-sleep of autovacuum_naptime.</li>

<li>Pavel Stehule sent in a patch which allows people to use updatable cursors in plpgsql.</li>

<li>Zdenek Kotala sent in a patch for 8.4 to rename the script binaries.</li>

<li>Gregory Stark sent in a patch to pgbench's random number generator.</li>

<li>Heikki Linnakangas sent in another revision of his Load Distributed Checkpoints patch.</li>

<li>Simon Riggs sent in an update version of his Transaction Guarantee patch.</li>

<li>Tom Lane sent in a WIP patch that rewrites numeric division for more correctness.</li>

</ul>