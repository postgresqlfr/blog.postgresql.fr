---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/01/11/Nouvelles-neuves-de-PostgreSQL"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 4 janvier 2009</strong></p>

<p>L'&eacute;quipe des nouvelles hebdomadaires vous souhaite une Bonne Ann&eacute;e&nbsp;:)</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090104">lien vers l'article original</a>)</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PyGreSQL 4.0&nbsp;: 

<a target="_blank" href="http://www.PyGreSQL.org/">http://www.PyGreSQL.org/</a></li>

<li>Devrim GUNDUZ a publi&eacute; un nouvel ensemble de paquets RPMs de tests. Prenez votre courage &agrave; deux mains et lancez-vous&nbsp;:) 

<a target="_blank" href="http://yum.pgsqlrpms.org/news-8.4devel-ready-for-testing.php">http://yum.pgsqlrpms.org/news-8.4devel-ready-for-testing.php</a></li>

</ul>

<!--more-->


<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le SYDPUG se r&eacute;unira le 3 f&eacute;vrier 2009 &agrave; 18h30. Suivez le lien pour les d&eacute;tails&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/sydpug/">http://archives.postgresql.org/sydpug/</a></li>

<li>Conf&eacute;rence d'Andreas 'ads' Scherbaum lors du "Perl Workshop 2009" le 25 f&eacute;vrier &agrave; Francfort-sur-le-Main, en Allemagne&nbsp;: 

<a target="_blank" href="http://www.perl-workshop.de/talks/151/view">http://www.perl-workshop.de/talks/151/view</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/papers.php">http://www.pgcon.org/2009/papers.php</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Devrim Gunduz. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>First round of whitespace changes to ecpg. Everything but connect-test1 should be fine.</li>

<li>In pgsql/src/interfaces/ecpg/test/expected/connect-test1.c, finally the last test.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/select.sgml, fix thinko in documentation of default window frame behavior, per Hitoshi Harada.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, fix oversight in ALTER TABLE ENABLE/DISABLE RULE patch: the new enabled field needs to be included in equalRuleLocks() comparisons, else updates will fail to propagate into relcache entries when they have positive reference count (ie someone is using the relcache entry). Per report from Alex Hunsaker.</li>

<li>Reduce the last group of parallel regression tests to 19 tests, per failure on buildfarm member bear. Sync the test order in serial_schedule with that in parallel_schedule.</li>

<li>Add some basic support for window frame clauses to the window-functions patch. This includes the ability to force the frame to cover the whole partition, and the ability to make the frame end exactly on the current row rather than its last ORDER BY peer. Supporting any more of the full SQL frame-clause syntax will require nontrivial hacking on the window aggregate code, so it'll have to wait for 8.5 or beyond.</li>

<li>Add a WINDOW attribute to CREATE FUNCTION, and teach pg_dump about it, so that user-defined window functions are possible. For the moment you'll have to write them in C, for lack of any interface to the WindowObject API in the available PLs, but it's better than no support at all. There was some debate about the best syntax for this. I ended up choosing the "it's an attribute" position --- the other approach will inevitably be more work, and the likely market for user-defined window functions is probably too small to justify it.</li>

<li>Consistently use multi-line formatting for all ACL columns printed by psql's various display commands, not only for \z. In passing, fix some infelicities in the newly added \d commands for SQL-MED catalogs. Andreas Scherbaum and Tom Lane</li>

<li>In pgsql/src/bin/psql/describe.c, fix another problem in SQL-MED \d displays: should have a clean failure report if the command is attempted against an old server.</li>

<li>Throw error if a window definition references a window that already has a frame clause, as appears to be required by the fine print in the SQL spec. Per discussion with Pavel, not doing so risks user confusion.</li>

<li>In pgsql/src/backend/tcop/postgres.c, fix an oversight in my patch of a couple weeks ago that ensured a snapshot is available during datatype input in Bind message processing. I put the PopActiveSnapshot() or equivalent just before PortalDefineQuery, which is an unsafe spot for it (in 8.3 and later) because we are carrying a plancache refcount that hasn't yet been assigned to the portal. Any error thrown there would result in leaking the refcount. It's not exactly likely that PopActiveSnapshot would throw an elog, perhaps, but it could happen. Reorder the code and add another comment warning not to do that.</li>

<li>Fix a couple of missed copyright dates.</li>

<li>Tweak guc.c to allow underscores in the names of custom variable classes, and change auto_explain's custom GUC variables to be named auto_explain.xxx not just explain.xxx. Per discussion in connection with the pg_stat_statements patch, it seems like a good idea to have the convention that custom variable classes are named the same as their defining module. Committing separately since this should happen regardless of what happens with pg_stat_statements itself.</li>

<li>In pgsql/src/backend/utils/misc/guc.c, write_nondefault_variables must take care to write custom_variable_classes first; otherwise backends reading the file might reject values of custom variables. Per experimentation with auto_explain.</li>

<li>Create a "shmem_startup_hook" to be called at the end of shared memory initialization, to give loadable modules a reasonable place to perform creation of any shared memory areas they need. This is the logical conclusion of our previous creation of RequestAddinShmemSpace() and RequestAddinLWLocks(). We don't need an explicit shmem_shutdown_hook, because the existing on_shmem_exit and on_proc_exit mechanisms serve that need. Also, adjust SubPostmasterMain so that libraries that got loaded into the postmaster will be loaded into all child processes, not only regular backends. This improves consistency with the non-EXEC_BACKEND behavior, and might be necessary for functionality for some types of add-ons.</li>

<li>Allow loadable modules to create PGC_POSTMASTER GUC variables, but only when loaded via shared_preload_libraries. Needed for support of pg_stat_statements, or pretty much anything else that wants a GUC to control size of a shared memory allocation.</li>

<li>Add a pg_encoding_mbcliplen() function that is just like pg_mbcliplen() except the caller can specify the encoding to work in; this will be needed for pg_stat_statements. In passing, do some marginal efficiency hacking and clean up some comments. Also, prevent the single-byte-encoding code path from fetching one byte past the stated length of the string (this last is a bug that might need to be back-patched at some point).</li>

<li>Add contrib/pg_stat_statements for server-wide tracking of statement execution statistics. Takahiro Itagaki.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/include/access/nbtree.h, the flag to mark dead tuples is nowadays called LP_DEAD, not LP_DELETE. Simon Riggs.</li>

<li>In pgsql/src/backend/catalog/storage.c, fix embarrassing bug in recent smgr refactoring patch: WAL records should be written for *non*-temp tables only. Report and test case by Mark Kirkwood and Simon Riggs.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/uuid-ossp/uuid-ossp.c, add comma so this copyright notice is picked up in 2010.</li>

<li>In pgsql/src/tools/copyright, make comma optional for copyright text change.</li>

<li>In pgsql/src/tools/copyright, mention src/interfaces/libpq/libpq.rc.in needs to be updated for copyright too.</li>

<li>In pgsql/src/tools/copyright, be smarter --- accept missing comma, and force comma if missing.</li>

</ul>

<p>Joe Conway a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, fix bug per Oleksiy Shchukin - 2nd argument for dblink_get_result(text,bool) is PG_GETARG_BOOL(2), should be PG_GETARG_BOOL(1). Apply simple fix to back branches only. More extensive change to be applied to head per Tom's suggestion.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/include/miscadmin.h, export IsUnderPostmaster on win32. ITAGAKI Takahiro</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jeff Davis sent in an updated of the patch which does B-Tree emulation for GIN.</li>

<li>Nikhil Sontakke sent in two revisions of a patch which fixes a casting bug in PL/PgSQL.</li>

<li>KaiGai Kohei sent in two more revisions of his SE-PostgreSQL patches.</li>

<li>Andrew Dunstan sent in another revision of his parallel restore patch.</li>

<li>Alvaro Herrera sent in two more revisions of his reloptions improvement patch.</li>

<li>Bryce Cutt sent in another revision of the performance improvement for multi-batch hash joins on skewed data sets.</li>

<li>Kevin Grittner sent in a patch explicating the SERIALIZABLE isolation level.</li>

<li>Stephen Frost sent in two more revisions of his patch to allow column-level permissions.</li>

<li>Magnus Hagander sent in a patch to add a parameter called include_realm to pg_hba.conf for Kerberos.</li>

<li>Simon Riggs sent in a patch to fix lazy_truncate_heap.</li>

<li>Joe Conway sent in two revisions of a patch to integrate SQL/MED connections with dblink.</li>

<li>Alvaro Herrera sent in two more revisions of his generic reloptions patch.</li>

<li>Robert Haas sent in another revision of the posix_fadvise patch.</li>

<li>Magnus Hagander sent in another revision of his libpq SSL patch.</li>

<li>Alex Hunsaker sent in a patch based on the reloptions patch to control three knobs on lz_compression on a per-table basis.</li>

</ul>