---
layout: post
title: "Nouvelles neuves de PG"
author: "jca"
redirect_from: "index.php?post/drupal-259 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>

Archiveopteryx 2.02 released  <a target="_blank" href="http://www.archiveopteryx.org/">http://www.archiveopteryx.org/</a>

</li>

</ul>

<p><strong>Offre d'emploi autour de PostgreSQL pour juillet</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php</a>

</p>

<p><strong>Activités locales autour de PostgreSQL</strong></p>

<p>

Comme il en a été disctué lors de la première réunion après pgDay au Prato sur ce que va devenir le European PostgreSQL User Group, une mailing list a été crée à l'adresse suivante : <a href="mailto:pgsql-eu-general@postgresql.org">pgsql-eu-general@postgresql.org&gt;</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et ses manchettes occasionnelles:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

PostgreSQL Weekly News a été rédigé cette semaine par David Fetter <br />

La traduction française est assurée par l'équipe <a href="http://www.postgresqlfr.org">PostgreSQLFr</a>.<br />

Envoyez vos articles et annonces avant dimanche 15:00 (heure du pacifique) en anglais à <a href="mailto:david@fetter.org">david@fetter.org</a> et en allemand à <a href="mailto:pwn@pgug.de">pwn@pgug.de</a>.

</p>

<p><strong>Correctifs appliqués</strong></p>

<p>

Peter Eisentraut  a committé:

</p>

<ul>

<li>

In pgsql/doc/src/sgml/datatype.sgml, update standards conformance   information about the bigint type.  Found by Michael Glaesemann. </li>

</ul>

Michael Meskes  a committé:

<ul>

<li>

Synced ECPG parser. </li>

</ul>

Neil Conway  a committé:

<ul>

<li>

In pgsql/src/backend/executor/execUtils.c, slightly refactor   ExecOpenScanRelation(): we can use ExecRelationIsTargetRelation() to   check if the relation is a target rel, rather than scanning through   the result relation array ourselves. </li>

<li>

Implement RETURN QUERY for PL/PgSQL. This provides some convenient   syntax sugar for PL/PgSQL set-returning functions that want to   return the result of evaluating a query; it should also be more   efficient than repeated RETURN NEXT statements. Based on an earlier   patch from Pavel Stehule. </li>

</ul>

Tom Lane  a committé:

<ul>

<li>

Remove FileUnlink(), which wasn't being used anywhere and interacted   poorly with the recent patch to log temp file sizes at removal time.   Doesn't seem worth fixing since it's unused.  In passing, make a few   elog messages conform to the message style guide. </li>

<li>

Arrange to put TOAST tables belonging to temporary tables into   special schemas named pg_toast_temp_nnn, alongside the pg_temp_nnn   schemas used for the temp tables themselves.  This allows low-level   code such as the relcache to recognize that these tables are indeed   temporary, which enables various optimizations such as not   WAL-logging changes and using local rather than shared buffers for   access.  Aside from obvious performance benefits, this provides a   solution to bug #3483, in which other backends unexpectedly held   open file references to temporary tables.  The scheme preserves the   property that TOAST tables are not in any schema that's normally in   the search path, so they don't conflict with user table names.   initdb forced because of changes in system view definitions. </li>

<li>

Suppress warning when compiling with -DPROFILE_PID_DIR: sys/stat.h   is supposed to be included when using mkdir(). </li>

<li>

Adjust horology test to avoid join-plan-dependent result ordering in   a few queries.  Should fix buildfarm failures arising from new, more   aggressive autovac settings. </li>

<li>

In pgsql/src/backend/optimizer/util/predtest.c, fix   predicate-proving logic to cope with binary-compatibility cases when   checking whether an IS NULL/IS NOT NULL clause is implied or refuted   by a strict function.  Per example from Dawid Kuroczko.  Backpatch   to 8.2 since this is arguably a performance bug. </li>

<li>

Create a new dedicated Postgres process, "wal writer", which exists   to write and fsync WAL at convenient intervals.  For the moment it   just tries to offload this work from backends, but soon it will be   responsible for guaranteeing a maximum delay before   asynchronously-committed transactions will be flushed to disk.  This   is a portion of Simon Riggs' async-commit patch, committed to CVS   separately because a background WAL writer seems like it might be a   good idea independently of the async-commit feature.  I rebased   walwriter.c on bgwriter.c because it seemed like a more appropriate   way of handling signals; while the startup/shutdown logic in   postmaster.c is more like autovac because we want walwriter to quit   before we start the shutdown checkpoint. </li>

<li>

Just noticed that libpq thinks the maximum command tag length is 40,   whereas in the backend it's been 64 for some time.  Hasn't mattered   because no actual tags exceed 40 bytes, but for consistency they   should be alike. </li>

</ul>

Alvaro Herrera  a committé:

<ul>

<li>

Set a default autovacuum vacuum_cost_delay value of 20ms, to avoid   excessive I/O utilization, per discussion.  While at it, lower the   autovacuum vacuum and analyze threshold values to 50 tuples.  It is   a bit higher (i.e. more conservative) than what I originally   proposed but much better than the old values for small tables. </li>

<li>

Reword paragraph about the autovacuum_max_workers setting.  Patch   from Jim Nasby. </li>

</ul>

Magnus Hagander  a committé:

<ul>

<li>

Rename DLLIMPORT macro to PGDLLIMPORT to avoid conflict with third   party includes (like tcl) that define DLLIMPORT. </li>

<li>

Hiroshi Saito's fix to pgsql/src/interfaces/libpq/win32.mak, the   standalone win32 makefile (MSVC6) for SSPI and GSSAPI. </li>

<li>

In pgsql/src/tools/msvc/Project.pm, disable warning 4090 = different   const qualifiers on msvc since it warns about things that aren't   wrong. </li>

<li>

In pgsql/src/pl/plperl/GNUmakefile, silence compiler warning on   MingW. </li>

<li>

In pgsql/src/backend/libpq/pqcomm.c, silence compiler warning on   MingW. </li>

<li>

Make it possible, and default, for MingW to build with SSPI support   by dynamically loading the function that's missing from the MingW   headers and library. </li>

<li>

The proper guaranteed buffer size for errors is   INITIAL_EXPBUFFER_SIZE, not PQERRORMSG_LENGTH.  Backport only - the   proper fix in HEAD is to use PQExpBuffers everywhere. </li>

<li>

Use PQExpBuffer for error message in fe-auth.c.  In passing, change   functions that passedin both PGconn and parts of it to just pass in   the PGconn. </li>

<li>

Fix typo in pgsql/src/interfaces/libpq/fe-auth.c. </li>

<li>

SSPI authentication on Windows. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

Pas de déception cette semaine :-)

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Andrew Dunstan sent in a patch to enable logging of start time/cookie for all backend processes. </li>

<li>

Gregory Stark sent in a patch which documents and removes some dead code in pgsql/src/backend/access/heap/tuptoaster.c which resulted from the varvarlena patch. </li>

<li>

Erwin Brandstetter suggested a patch which changes the GRANT docs to reflect current realities. </li>

<li>

Gregory Stark sent in a patch which fixes some misalignments from a pg_indent run. </li>

<li>

Simon Riggs sent in a patch which simplifies the stats_ parameters. </li>

<li>

Zdenek Kotala sent in a patch to pgcrypto which fixes two problems on systems, like the default Solaris 10 installation, without strong encryption.  Per discussion at  <a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-07/msg00762.php">http://archives.postgresql.org/pgsql-hackers/2007-07/msg00762.php</a>

</li>

</ul>