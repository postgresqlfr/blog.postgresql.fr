---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 décembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2010-01-03-nouvelles-hebdomadaires-de-postgresql-27-decembre-2009 "
---



<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_dump.ck, in CREATE SEQUENCE dump, put MINVALUE before MAXVALUE so it reads better.</li>

<li>In pgsql/Makefile, replace target list by a wildcard, so that this workaround makefile also works transparently for lesser used targets.</li>

<li>In pgsql/Makefile,revert brainfart: Of course the wildcard only works in GNU make itself. Instead, add a few targets that were missing.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Disallow comments on columns of relation types other than tables, views, and composite types, which are the only relkinds for which pg_dump support exists for dumping column comments. There is no obvious usefulness for comments on columns of sequences or toast tables; and while comments on index columns might have some value, it's not worth the risk of compatibility problems due to possible changes in the algorithm for assigning names to index columns. Per discussion. In consequence, remove now-dead code for copying such comments in CREATE TABLE LIKE.</li>

<li>Adjust naming of indexes and their columns per recent discussion. Index expression columns are now named after the FigureColname result for their expressions, rather than always being "pg_expression_N". Digits are appended to this name if needed to make the column name unique within the index. (That happens for regular columns too, thus fixing the old problem that CREATE INDEX fooi ON foo (f1, f1) fails. Before exclusion indexes there was no real reason to do such a thing, but now maybe there is.) Default names for indexes and associated constraints now include the column names of all their columns, not only the first one as in previous practice. (Of course, this will be truncated as needed to fit in NAMEDATALEN. Also, pkey indexes retain the historical behavior of not naming specific columns at all.)</li>

<li>In pgsql/src/backend/commands/tablecmds.c, remove code that attempted to rename index columns to keep them in sync with their underlying table columns. That code was not bright enough to cope with collision situations (ie, new name conflicts with some other column of the index). Since there is no functional reason to do this at all, trying to upgrade the logic to be bulletproof doesn't seem worth the trouble. This change means that both the index name and the column names of an index are set when it's created, and won't be automatically changed when the underlying table columns are renamed. Neatnik DBAs are still free to rename them manually, of course.</li>

<li>Allow the index name to be omitted in CREATE INDEX, causing the system to choose an index name the same as it would do for an unnamed index constraint. (My recent changes to the index naming logic have helped to ensure that this will be a reasonable choice.) Per a suggestion from Peter. A necessary side-effect is to promote CONCURRENTLY to type_func_name_keyword status, ie, it can't be a table/column/index name anymore unless quoted. This is not all bad, since we have heard more than once of people typing CREATE INDEX CONCURRENTLY ON foo (...) and getting a normal index build of an index named "concurrently", which was not what they wanted. Now this syntax will result in a concurrent build of an index with system-chosen name; which they can rename afterwards if they want something else.</li>

<li>In pgsql/src/backend/access/gist/gistxlog.c, fix wrong WAL info value generated when gistContinueInsert() performs an index page split. This would result in index corruption, or even more likely an error during WAL replay, if we were unlucky enough to crash during end-of-recovery cleanup after having completed an incomplete GIST insertion. Yoichi Hirai.</li>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, try to improve the clarity of the psql documentation for the \d family of commands, as per recent discussion. Includes suggestions from Adrian Klaver and Filip Rembialkowski.</li>

<li>In pgsql/src/backend/optimizer/path/joinpath.c, fix brain fade in join-removal patch: a pushed-down clause in the outer join's restrict list is not just something to ignore, it's actually grounds to abandon the optimization entirely. Per bug #5255 from Matteo Beccati.</li>

<li>Remove a couple of unnecessary calls of CreateCacheMemoryContext. These probably got there via blind copy-and-paste from one of the legitimate callers, so rearrange and comment that code a bit to make it clearer that this isn't a necessary prerequisite to hash_create. Per observation from Robert Haas.</li>

<li>In pgsql/src/backend/postmaster/pgstat.c, avoid memory leak if pgstat_vacuum_stat is interrupted partway through. The temporary hash tables made by pgstat_collect_oids should be allocated in a short-term memory context, which is not the default behavior of hash_create. Noted while looking through hash_create calls in connection with Robert Haas' recent complaint. This is a pre-existing bug, but it doesn't seem important enough to back-patch. The hash table is not so large that it would matter unless this happened many times within a session, which seems quite unlikely.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, rename pg_dump.c TypeInfo variable tinfo to tyinfo, for clarity.</li>

<li>Binary upgrade: Modify pg_dump --binary-upgrade and add backend support routines to support the preservation of pg_type oids when doing a binary upgrade. This allows user-defined composite types and arrays to be binary upgraded.</li>

<li>In pgsql/src/backend/catalog/pg_enum.c, rename EnumValuesCreate() single-letter variable names to useful variable names.</li>

<li>Zero-label enums: Allow enums to be created with zero labels, for use during binary upgrade.</li>

<li>Add backend and pg_dump code to allow preservation of pg_enum oids, for use in binary upgrades. Bump catalog version for detection by pg_migrator of new backend API.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>Always pass catalog id to the options validator function specified in CREATE FOREIGN DATA WRAPPER. Arguably it wasn't a bug because the documentation said that it's passed the catalog ID or zero, but surely we should provide it when it's known. And there isn't currently any scenario where it's not known, and I can't imagine having one in the future either, so better remove the "or zero" escape hatch and always pass a valid catalog ID. Backpatch to 8.4. Martin Pihlak.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Add basic build support for Visual Studio 2008, without resorting to generating the build files for 2005 and then converting them.</li>

<li>In pgsql/src/port/win32env.c, if the MSVCRT module is not found in the current binary, proceed to update system and local environments anyway, instead of aborting. (This will happen in a MSVC build with no or very few external libraries linked in)</li>

<li>In pgsql/src/port/win32env.c, remove now unreferenced variable.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plperl/ppport.h, upgrade to latest ppport.h. Patch from Tim Bunce.</li>

</ul>

<p>Robert Haas a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, add missing &lt;indexterm&gt;&lt;primary&gt;...&lt;/primary&gt;...&lt;/indexterm&gt; tags for a couple of HS-related parameters. Fujii Masao.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tim Bunce sent in another revision of the patch to refactor PL/Perl.</li>

<li>Tim Bunce sent in a patch to update ppport.h in PL/Perl in preparation for further patches.</li>

<li>Tim Bunce sent in a patch atop the ppport.h patch, adding new GUCs plperl.on_perl_init, plperl.on_trusted_init, plperl.on_untrusted_init.</li>

<li>Fujii Masao sent in a doc patch for Hot Standby.</li>

<li>KaiGai Kohei sent in another revision of the patch to add ACLs to large objects (lo).</li>

<li>ITAGAKI Takahiro sent in a patch to add usage columns to pg_stat_statements.</li>

<li>Martin Pihlak sent in a patch to fix the foreign data wrapper code, which is part of SQL/MED.</li>

<li>Heikki Linnakangas sent in a patch to make tuplestores store the context in which they are created.</li>

<li>Magnus Hagander sent in a patch to fix a Windows issue where a non-essential library, msvcrt.dll, is sometimes not detected, which caused incorrect behavior at runtime.</li>

<li>Robert Haas sent in a WIP patch atop the automatic index name creation patch which tries to keep CONCURRENTLY a non-reserved word.</li>

<li>Fujii Masao sent in a patch to support streaming replication.</li>

<li>Joachim Wieland sent in a WIP patch which exposes "&lt;IDLE&gt; in transaction" connections to SIGINT.</li>

<li>Pavel Stehule sent in a WIP patch to create a listagg() aggregate.</li>

<li>Andreas Freund sent in a patch to kill sessions connected to a dropped database for hot standby.</li>

</ul>