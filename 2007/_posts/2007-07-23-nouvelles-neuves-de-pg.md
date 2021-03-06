---
layout: post
title: "Nouvelles neuves de PG"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/258"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL du 22 juillet 2007</strong></p>

<p>

Les annonces de sorties de versions pour pgInstaller se feront maintenant sur les listes -hackers (pour les instantanés de développement) et sur  la liste -announce (pour les versions de productions). Ces annonces ne se feront plus sur la page de pgFoundry. Elles sont cependant toujours téléchargeable depuis <a target="_blank" href="http://www.postgresql.org/ftp/win32">http://www.postgresql.org/ftp/win32</a>

</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>

Another PostgreSQL Diff Tool 1.0.0_beta24 est sorti  <a target="_blank" href="http://pgfoundry.org/projects/apgdiff/">http://pgfoundry.org/projects/apgdiff/</a>

</li>

<li>

DbVisualizer 6.0 est sorti.

<a target="_blank" href="http://www.minq.se/products/dbvis/versions/6.0/dbvis60.html">http://www.minq.se/products/dbvis/versions/6.0/dbvis60.html</a>

</li>

<li>

MicroOLAP Database Designer 1.2.1 for PostgreSQL est sorti.

<a target="_blank" href="http://microolap.com/products/database/postgresql-designer/">http://microolap.com/products/database/postgresql-designer/</a>

</li>

<li>

mODBC_Installer beta 0.99.120 est sorti.

<a target="_blank" href="https://projects.commandprompt.com/public/odbcng/wiki/Downloads">https://projects.commandprompt.com/public/odbcng/wiki/Downloads</a>

</li>

<li>

Sylph-Searcher 1.0.0 est sorti.

<a target="_blank" href="http://sylpheed.sraoss.jp/en/download.html#searcher">http://sylpheed.sraoss.jp/en/download.html#searcher</a>

</li>

</ul>

<p><strong>Les offres d'emplois PostgreSQL du mois de juillet</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-07/threads.php</a>

</p>

<p><strong>Activité locale autour de PostgreSQL</strong></p>

<p>

PDXPUG Day et la PgParty ont été un succès.  Pour plus d'information sur ces événements lisez  <a target="_blank" href="http://planetpostgresql.org">http://planetpostgresql.org</a> .

</p>

<p>

OSCON se déroulera cette semaine. De nombreux <em>pontes</em> y seront.

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL:  <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives and occasional new articles:  <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

PostgreSQL Weekly News a été rédigé par David Fetter cette semaine. La traduction française est assurée par l'équipe de PostgreSQLFr</p>

<p>

Envoyez vos articles et annonces avant chaque dimanche à 15 heures (heure du pacifique). Envoyez vos annonces en Anglais à david@fetter.org et celles en Allemand à pwn@pgug.de.

</p>

<p><strong>Correctifs appliqués</strong></p>

<p>

Peter Eisentraut  a committé:

</p>

<ul>

<li>

In pgsql/src/test/regress/expected/plpgsql.out, fix regression tests   for PL/pgSQL error message changes. </li>

<li>

In pgsql/src/pl/plpgsql/src/pl_funcs.c, capitalize language key   words in error messages. </li>

</ul>

Andrew Dunstan  a committé:

<ul>

<li>

Only use the pipe chunking protocol if we know the syslogger should   be catching stderr output, and we are not ourselves the syslogger.   Otherwise, go directly to stderr.  Bug noticed by Tom Lane.   Backpatch as far as 8.0. </li>

</ul>

Alvaro Herrera  a committé:

<ul>

<li>

In pgsql/src/test/regress/pg_regress.c, cast NULL to a pointer type   in the execl() call to avoid a compiler warning on some platforms   and possibly a bug.  Per report from Stefan Kaltenbrunner and   subsequent discussion. </li>

</ul>

Bruce Momjian  a committé:

<ul>

<li>

ITAGAKI Takahiro's patch to doc/src/sgml/maintenance.sgml which   fixes auto-analyze documentation. </li>

<li>

Another patch which documents the age() behavior. </li>

<li>

Document that 'deleted' is also tracked by autovacuum. </li>

<li>

Properly adjust age() seconds to match the sign of the larger units.   Patch from Tom. </li>

<li>

Document that age() adds days, then full months. </li>

<li>

Add to TODO: "GLOBAL temporary tables to exist as empty by default   in all sessions." </li>

<li> Remove  <a target="_blank" href="http://www.benchmarkresources.com">http://www.benchmarkresources.com</a> from the Developer FAQ, as

</li>

<li>

it no longer resolves to a meaningful site. </li>

<li>

Add CVS Wiki URL to docs. </li>

<li>

Add to TODO: " Allow multiple indexes to be created concurrently,   ideally via a single heap scan, and have a restore of a pg_dump   somehow use it." </li>

<li>

Update docs to mention that GNU tar versions &gt;=1.16 exit with 1 on   files changed, 2 on other errors. </li>

</ul>

Neil Conway  a committé:

<ul>

<li>

Implement CREATE TABLE LIKE ... INCLUDING INDEXES.  Patch from   NikhilS, based in part on an earlier patch from Trevor Hardcastle,   and reviewed by myself. </li>

<li>

With the native compiler on Unixware, disable optimization if   --enable-debug is used, to avoid complaints about debugging and   optimization being mutually exclusive.  Patch from Stefan   Kaltenbrunner. </li>

</ul>

Magnus Hagander  a committé:

<ul>

<li>

Added documentation for GSSAPI. </li>

<li>

In pgsql/contrib/pg_standby/pg_standby.c, quote pathnames so   pg_standby works with paths that have spaces in them.  Patch from   ISHIDA Akio. </li>

</ul>

Tom Lane  a committé:

<ul>

<li>

Fix pgsql/src/backend/utils/error/elog.c to avoid infinite recursion   (leading to backend crash) when log_min_error_statement is active   and there is some problem in logging the current query string; for   example, that it's too long to include in the log message without   running out of memory.  This problem has existed since the   log_min_error_statement feature was introduced.  No doubt the reason   it wasn't detected long ago is that 8.2 is the first release that   defaults log_min_error_statement to less than PANIC level.  Per   report from Bill Moran. </li>

<li>

Provide a bit more high-level documentation for the GEQO planner.   Per request from Luca Ferrari. </li>

<li>

Fix WAL replay of truncate operations to cope with the possibility   that the truncated relation was deleted later in the WAL sequence.   Since replay normally auto-creates a relation upon its first   reference by a WAL log entry, failure is seen only if the truncate   entry happens to be the first reference after the checkpoint we're   restarting from; which is a pretty unusual case but of course not   impossible.  Fix by making truncate entries auto-create like the   other ones do.  Per report and test case from Dharmendra Goyal. </li>

<li>

In pgsql/src/backend/utils/error/elog.c, on second thought, the   tests for what to do with stderr output are a lot more sensible if   we check the chunk-output case first.  Not back-patched since it's   just a cosmetic improvement. </li>

<li>

Make replace(), split_part(), and string_to_array() behave somewhat   sanely when handed an invalidly-encoded pattern.  The previous   coding could get into an infinite loop if pg_mb2wchar_with_len()   returned a zero-length string after we'd tested for nonempty   pattern; which is exactly what it will do if the string consists   only of an incomplete multibyte character.  This led to either an   out-of-memory error or a backend crash depending on platform.  Per   report from Wiktor Wodecki. </li>

<li>

Adjust configure script to print the bison and flex versions in use.   Minor rearrangements to make a few tests in a more logical order. </li>

<li>

Fix an old thinko in SS_make_initplan_from_plan, which is used when   optimizing a MIN or MAX aggregate call into an indexscan: the   initplan is being made at the current query nesting level and so we   shouldn't increment query_level.  Though usually harmless, this   mistake could lead to bogus "plan should not reference subplan's   variable" failures on complex queries.  Per bug report from David   Sanchez i Gregori. </li>

<li>

Fix incorrect optimization of foreign-key checks.  When an UPDATE on   the referencing table does not change the tuple's FK column(s), we   don't bother to check the PK table since the constraint was   presumably already valid.  However, the check is still necessary if   the tuple was inserted by our own transaction, since in that case   the INSERT trigger will conclude it need not make the check (since   its version of the tuple has been deleted).  We got this right for   simple cases, but not when the insert and update are in different   subtransactions of the current top-level transaction; in such cases   the FK check would never be made at all.  (Hence, problem dates back   to 8.0 when subtransactions were added --- it's actually the   subtransaction version of a bug fixed in 7.3.5.)  Fix, and add   regression test cases.  Report and fix by Affan Salman. </li>

<li>

In pgsql/src/backend/nodes/outfuncs.c, fix outfuncs.c to dump   A_Const nodes representing NULLs correctly.  This has been broken   since forever, but was not noticed because people seldom look at raw   parse trees.  AFAIK, no impact on users except that   debug_print_parse might fail; but patch it all the way back anyway.   Per report from Jeff Ross. </li>

<li>

In pgsql/contrib/pg_buffercache/pg_buffercache_pages.c, fix   pg_buffercache to release buffer partition locks in reverse order,   and add a note about why.  This is not tremendously important right   now, probably, but it will get more urgent if NUM_BUFFER_PARTITIONS   is increased as much as proposed. </li>

<li>

In pgsql/src/backend/storage/lmgr, add comments spelling out why   it's a good idea to release multiple partition locks in reverse   order. </li>

<li>

Allow plpgsql function parameter names to be qualified with the   function's name.  With this patch, it is always possible for the   user to qualify a plpgsql variable name if needed to avoid   ambiguity.  While there is much more work to be done in this area,   this simple change removes one unnecessary incompatibility with   Oracle.  Per discussion. </li>

<li>

In pgsql/src/include/storage/s_lock.h (AIX section): Hmm, so   evidently _check_lock and _clear_lock take an argument of type int   not unsigned int.  Third try to get grebe building without   warnings... </li>

<li>

In pgsql/src/include/storage/s_lock.h (AIX section) so our reward   for including &lt;sys/atomic_op.h&gt; seems to be a bunch of nattering   about casting away volatile.  Losers. </li>

<li>

On AIX, include <sys atomic_op.h=""> so that the functions we use for   TAS support are properly declared. </sys></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

Pas de déception cette semaine :-)

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Simon Riggs sent in three new revisions of his async commit patch. </li>

<li>

Magnus Hagander sent in two copies of his SSPI authentication patch for libpq. </li>

<li>

Andrew Dunstan sent in another version of his COPYable log patch. </li>

</ul>