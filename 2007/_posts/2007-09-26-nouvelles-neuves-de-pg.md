---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-260 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 24 Septembre 2007</strong></p>

<ul>

<li>Les versions 8.2.5, 8.1.10, 8.0.14, 7.4.18 et 7.3.20 de PostgreSQL sont disponibles. Mettez à jour dès que possible !<br />

Ndt&nbsp;: pour rappel, il s'agit d'un changement <em>mineur</em> de version (cf&nbsp;: <a href="http://www.postgresql.org/support/versioning">http://www.postgresql.org/support/versioning</a>)</li>

<li>Lorsque la version 8.3 sera disponible (a priori avant la fin de l'année), les versions 8.1.x et 8.0.x sous Windows® ne recevront plus de support officiel.</li>

</ul>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Le convertisseur de bases MS Access vers PostgreSQL (access2postgres) est disponible dans sa version 2.0&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/access2postgres/">http://pgfoundry.org/projects/access2postgres/</a></li>

<li>PgPool 3.4.1 a été publié&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>De nouveaux ensembles de paquets PostgreSQL RPM sont disponibles pour Fedora / RHEL&nbsp;:

<a target="_blank" href="http://www.postgresql.org/download/">http://www.postgresql.org/download/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PostgreSQL Conference Fall 2007 aura lieu le 20 octobre à l'Université d'État de Portland (Oregon, USA)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Il y aura une réunion PostgreSQL pendant l'Ohio Linuxfest le 29 septembre, et Robert Treat fera une petite conférence sur les nouveautés de la 8.3&nbsp;:

<a target="_blank" href="http://www.ohiolinux.org/speakers.html#talk1_06">http://www.ohiolinux.org/speakers.html#talk1_06</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Removed superfluous ECPGfree() call from pgsql/src/interfaces/ecpg/ecpglib/execute.c.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/float.c, prevent corr() from returning the wrong results for negative correlation values. The previous coding essentially assumed that x = sqrt(x*x), which does not hold for x &lt; 0. Thanks to Jie Zhang at Greenplum and Gavin Sherry for reporting this issue.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Add perl replacements for build.bat and vcregress.bat. In due course the .bat files will be altered to become tiny wrappers for these scripts, and one or two other .bat files will disappear.</li>

<li>In pgsql/src/tools/msvc/Install.pm, restrict overly broad searches, and fix typo, in recent fix. Per Hannes Eder.</li>

<li>In pgsql/src/tools/msvc/Install.pm, replace calls to external dir program with perlish globs and File::Find calls. Fixes complaint fron Hannes Eder, whose environment found a different dir program.</li>

<li>Go back to using a separate method for doing ILIKE for single byte character encodings that doesn't involve calling lower(). This should cure the performance regression in this case complained of by Guillaume Smet. It still leaves the horrid performance for multi-byte encodings introduced in 8.2, but there's no obvious solution for that in sight.</li>

<li>Cleanup items from csvlog changes, per ITAGAKI Takahiro.</li>

<li>Close previously open holes for invalidly encoded data to enter the database via builtin functions, as recently discussed on -hackers. chr() now returns a character in the database encoding. For UTF8 encoded databases the argument is treated as a Unicode code point. For other multi-byte encodings the argument must designate a strict ascii character, or an error is raised, as is also the case if the argument is 0. ascii() is adjusted so that it remains the inverse of chr().</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/tsrank.c, fix msvc warnings, patch by Hannes Eder.</li>

<li>In pgsql/src/backend/tsearch/dict_thesaurus.c, avoid possibly-unportable initializer, per Gregory Stark and buildfarm warning.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In FAQ_DEV, fix typo per Brendan Jurd.</li>

<li>Mark TODOs as done: "Consider shrinking expired tuples to just their headers," "Allow heap reuse of UPDATEd rows if no indexed columns are changed, and old and new versions are on the same heap page," and remove no-longer-needed TODO: "Reuse index tuples that point to heap tuples that are not visible to anyone?"</li>

<li>In pgsql/doc/src/sgml/func.sgml, remove tabs from SGML file.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, add reminder that integer pg version also needs updating.</li>

<li>Remove extra tab in postgresql.conf</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Replace linear searches with binary searches in pg_dump's code to lookup objects by OID. Per gripe from nikitathespider.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, fix bugs in XML binary I/O functions. Heikki and Tom</li>

<li>Make autovacuum report the start time of its current activity in pg_stat_activity. Per gripe from Jim Nasby.</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, transactionIdIsInProgress can skip scanning the ProcArray if the target XID is later than latestCompletedXid, per Florian Pflug. Also some minor improvements in the XIDCACHE_DEBUG code --- make sure each call of TransactionIdIsInProgress is counted one way or another.</li>

<li>Temporarily modify tsearch regression tests to suppress notice that comes out at erratic times, because it is creating a totally unacceptable level of noise in our buildfarm results. This patch can be reverted when and if the code is fixed to not issue notices during cache reload events.</li>

<li>Fix cost estimates for EXISTS subqueries that are evaluated as initPlans (because they are uncorrelated with the immediate parent query). We were charging the full run cost to the parent node, disregarding the fact that only one row need be fetched for EXISTS. While this would only be a cosmetic issue in most cases, it might possibly affect planning outcomes if the parent query were itself a subquery to some upper query. Per recent discussion with Steve Crawford.</li>

<li>In pgsql/doc/src/sgml/config.sgml, document the translations from Postgres message severity levels to syslog and eventlog severity levels, per suggestion from Josh Drake. Also, some wordsmithing for the csvlog documentation.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, fix erroneous Assert() in syslogger process start in EXEC_BACKEND case, per ITAGAKI Takahiro. Also, rewrite syslogger_forkexec() in hopes of eliminating the confusion in the first place.</li>

<li>In pgsql/src/backend/utils/adt/oracle_compat.c, fix bogus calculation of potential output string length in translate().</li>

<li>In pgsql/src/include/fmgr.h, parenthesize macro arguments safely. I see no bug among the current uses of PG_DETOAST_DATUM_SLICE, but it's clearly trouble waiting to happen.</li>

<li>Although I'd misdiagnosed the reason for the recent failures on buildfarm member grebe, I see no reason to revert the 1-byte-header-friendly changes I made in varlena.c. Instead, tweak the code a little bit to get more advantage out of that.</li>

<li>In pgsql/src/backend/utils/adt/regexp.c, defend against the case where malloc returns NULL for malloc(0).</li>

<li>Fix varlena.c routines to allow 1-byte-header text values. This is now demonstrably necessary for text_substring() since regexp_split functions may pass it such a value; and we might as well convert the whole file at once. Per buildfarm results (though I wonder why most machines aren't showing a failure).</li>

<li>Fix regex, LIKE, and some other second-rank text-manipulation functions to not cause needless copying of text datums that have 1-byte headers. Greg Stark, in response to performance gripe from Guillaume Smet and ITAGAKI Takahiro.</li>

<li>Improve handling of prune/no-prune decisions by storing a page's oldest unpruned XMAX in its header. At the cost of 4 bytes per page, this keeps us from performing heap_page_prune when there's no chance of pruning anything. Seems to be necessary per Heikki's preliminary performance testing.</li>

<li>In pgsql/src/backend/utils/time/tqual.c, change tqual.c tests to use TransactionIdIsCurrentTransactionId, rather than TransactionIdDidAbort, when handling the case that xmin is one of the current transaction's XIDs and the tuple has been deleted. xmax must also be one of the current transaction's XIDs, since no one else can see it yet, and it's cheaper to look at local state than shared state to find out if xmax aborted. Per an idea of Heikki's.</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, make some simple performance improvements in TransactionIdIsInProgress(). For XIDs of our own transaction and subtransactions, it's cheaper to ask TransactionIdIsCurrentTransactionId() than to look in shared memory. Also, the xids[] work array is always the same size within any given process, so malloc it just once instead of doing a palloc/pfree on every call; aside from being faster this lets us get rid of some goto's, since we no longer have any end-of-function pfree to do. Both ideas by Heikki Linnakangas.</li>

<li>In pgsql/src/backend/access/transam/twophase.c, fix comments that misspelled TransactionIdIsInProgress, per Heikki Linnakangas.</li>

<li>If we're gonna provide an --enable-profiling configure option, surely it ought to know that you need -DLINUX_PROFILE on Linux.</li>

<li>Insert a hack in pl/tcl to disable Tcl's built-in Notifier subsystem, which has a bad habit of launching multiple threads within the backend and thereby causing all kinds of havoc. Fortunately, we don't need it, and recent Tcl versions provide an easy way to disable it. Diagnosis and fix by Steve Marshall, Paul Bayer, and Doug Knight of WSI Corporation.</li>

<li>Solaris portability fix that was previously made in contrib/tsearch2 but got lost from the version committed to main tree. Per Greg Stark.</li>

<li>Revert ill-fated patch to release exclusive lock early after vacuum truncates a table. Introduces race condition, as shown by buildfarm failures.</li>

<li>HOT updates. When we update a tuple without changing any of its indexed columns, and the new version can be stored on the same heap page, we no longer generate extra index entries for the new version. Instead, index searches follow the HOT-chain links to ensure they find the correct tuple version. In addition, this patch introduces the ability to "prune" dead tuples on a per-page basis, without having to do a complete VACUUM pass to recover space. VACUUM is still needed to clean up dead index entries, however. Pavan Deolasee, with help from a bunch of other people.</li>

<li>Remove Assert(BgWriterShmem != NULL), which is rather pointless since we'd dump core anyway immediately afterward if it were null; and it seems to confuse some versions of icc into generating bad code. Per report from Sergey Koposov. Patched in HEAD only, for the moment, since this is only likely to affect developers.</li>

<li>Fix overflow in extract(epoch from interval) for intervals exceeding 68 years. Seems to have been introduced in 8.1 by careless SECS_PER_DAY search-and-replace.</li>

<li>Update release notes for last-minute fix.</li>

<li>Fix aboriginal mistake in lazy VACUUM's code for truncating away no-longer-needed pages at the end of a table. We thought we could throw away pages containing HEAPTUPLE_DEAD tuples; but this is not so, because such tuples very likely have index entries pointing at them, and we wouldn't have removed the index entries. The problem only emerges in a somewhat unlikely race condition: the dead tuples have to have been inserted by a transaction that later aborted, and this has to have happened between VACUUM's initial scan of the page and then rechecking it for empty in count_nondeletable_pages. But that timespan will include an index-cleaning pass, so it's not all that hard to hit. This seems to explain a couple of previously unsolved bug reports.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Bernd Helmle sent in a patch which adds a "Login" field to psql's \du command, displaying wether a role has the LOGIN privilege granted or not.</li>

<li>Heikki Linnakangas sent in a patch which optimizes pg_next_dst_boundary.</li>

</ul>