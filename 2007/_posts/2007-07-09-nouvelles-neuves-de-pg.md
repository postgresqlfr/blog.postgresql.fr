---
layout: post
title: "Nouvelles neuves de PG"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/237"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 8 Juillet 2007</strong></p>

<p>

Les résultats du test Spec jAppserver sont publiés et les performances de PostgreSQL semblent bonnes :

<a target="_blank" href="http://www.spec.org/jAppServer2004/results/res2007q3/">http://www.spec.org/jAppServer2004/results/res2007q3/</a>

</p>

<p>

PgDay a été un succès. Il s'y est tenu la réunion de démarrage du groupe Européeen de PostreSQL (European PostgreSQL group).  Pour plus de détails consultez :

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a> .

</p>

<!--more-->


<strong>Jobs de juillet autour de PostgreSQL</strong>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

PDXPUG Day à l'OSCON recherche des conférenciers. Grace à la générosité d'O'Reilly, nous diposerons d'un jour complet de sessions PosgreSQL le jour précédent l'OSCON (dimanche 22 juillet). Prévoyez de changer vos dates de billets d'avion et de vous inscrire à une conférence !

<a target="_blank" href="http://developer.postgresql.org/index.php/OSCON07PGDay">http://developer.postgresql.org/index.php/OSCON07PGDay</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL:  <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et articles occasionnels :  <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p><em>

PostgreSQL Weekly News / Les nouvelles hebdomadaires ont été rédigées par David Fetter et Adreas (ads) Scherbaum, la traduction française est assurée par l'équipe PostgreSQLFr.

Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à <a href="mailto:david_AT_fetter_DOT_org">David</a> et en Allemand à <a href="mailto:pwnATpgugDOT_DE"> pwn@pgug.de</a>.</em>

</p>

<p><strong>Correctifs appliqués</strong></p>

<p>

Joe Conway  a committé:

</p>

<ul>

<li>Restrict non-superusers to password authenticated connections to   prevent possible escalation of privilege. Provide new SECURITY   DEFINER functions with old behavior, but initially REVOKE ALL from   public for these functions. Per list discussion and design proposed   by Tom Lane. A different approach will be used for back-branches,   committed separately.

</li>

<li>Arrange for the authentication request type to be preserved in   PGconn. Invent a new libpq connection-status function,   PQconnectionUsedPassword() that returns true if the server demanded   a password during authentication, false otherwise.  This may be   useful to clients in general, but is immediately useful to help plug   a privilege escalation path in dblink.  Per list discussion and   design proposed by Tom Lane.

</li>

</ul>

<p>

Bruce Momjian  a committé:

</p>

<ul>

<li> Per Magnus Hagander, remove from TODO: "Check   WSACancelBlockingCall() for interrupts [win32intr]" </li>

</ul>

<p>

Jan Wieck  a committé:

</p>

<ul>

<li>Changed new \usleep command into \sleep with an optional time unit   argument to specify us, ms or s per suggestion by Peter Eisentraut. </li>

<li>Added a new scripting meta command \usleep [milliseconds|:variable]   which can be used in -f scripts to insert a thinking time between   other commands.</li>

</ul>

<p>

Magnus Hagander  a committé:

</p>

<ul>

<li>Yoshiyuki Asaba's patch which moves parse.h into src/backend on   msvc, which is where it is on Unix.  Fixes builds from tarballs   where the file is pre-generated. </li>

<li>Dave Page's patch which fixes the -w (wait) option to work in   Windows service mode, per bug #3382, prevents the -w option being   passed to the postmaster, and reads the postmaster options file when   starting as a Windows service.  </li>

</ul>

<p>

Tom Lane  a committé:

</p>

<ul>

<li>Get rid of client-code dependencies on the exact text of the   no-password error message, by using PQconnectionUsedPassword()   instead.  Someday we might be able to localize that error message,   but not until this coding technique has disappeared everywhere. </li>

<li> Closer code review for PQconnectionUsedPassword() patch: in   particular, not OK to include postgres_fe.h into libpq-fe.h, hence   declare it as returning int not bool. </li>

<li>Fix broken markup. </li>

<li>Fix a couple of planner bugs introduced by the new ability to   discard ORDER BY <constant> as redundant.  One is that this means   query_planner() has to canonicalize pathkeys even when the query   jointree is empty; the canonicalization was always a no-op in such   cases before, but no more.  Also, we have to guard against thinking   that a set-returning function is "constant" for this purpose.  Add a   couple of regression tests for these evidently under-tested cases.   Per report from Greg Stark and subsequent experimentation. </constant></li>

<li>Fix up hash functions for datetime datatypes so that they don't take   unwarranted liberties with int8 vs float8 values for these types.   Specifically, be sure to apply either hashint8 or hashfloat8   depending on HAVE_INT64_TIMESTAMP.  Per my gripe of even date. </li>

<li>Improve description of SPI_scroll_cursor_move's return values, per a   gripe by Pavel Stehule awhile ago. </li>

<li>Fix incorrect comment about the timing of AbsorbFsyncRequests()   during checkpoint.  The comment claimed that we could do this   anytime after setting the checkpoint REDO point, but actually   BufferSync is relying on the assumption that buffers dumped by other   backends will be fsync'd too.  So we really could not do it any   sooner than we are doing it. /li&gt;

</li>

<li> Fix failure to restart Postgres when Linux kernel returns EIDRM for   shmctl().  This is a Linux kernel bug that apparently exists in   every extant kernel version: sometimes shmctl() will fail with EIDRM   when EINVAL is correct.  We were assuming that EIDRM indicates a   possible conflict with pre-existing backends, and refusing to start   the postmaster when this happens.  Fortunately, there does not seem   to be any case where Linux can legitimately return EIDRM (it doesn't   track shmem segments in a way that would allow that), so we can get   away with just assuming that EIDRM means EINVAL on this platform.   Per reports from Michael Fuhr and Jon Lapham --- it's a bit   surprising we have not seen more reports, actually.

</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>

ITAGAKI Takahiro's patch intended to fix the pgstat_drop_relation bug on the grounds that it introduces relation OIDs into a level of the system that should only be dealing in relfilenodes. </li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Zdenek Kotala submitted a patch which renames createdb createlang createuser dropdb droplang dropuser clusterdb vacuumdb and reindexdb to pg_createdb pg_createlang pg_createuser pg_dropdb pg_droplang pg_dropuser pg_clusterdb pg_vacuumdb and pg_reindexdb respectively. </li>

<li>

Gregory Stark sent in a patch to track buffer allocation statistics using new LRU method base code. </li>

</ul>