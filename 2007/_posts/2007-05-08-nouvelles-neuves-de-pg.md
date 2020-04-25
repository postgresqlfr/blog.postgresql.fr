---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/251"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 6 mai 2007</strong></p>

<p>La première des conférences road2pgday a eu lieu cette semaine. La page suivante (en italien) présente quelques slides&nbsp;:

<a target="_blank" href="http://www.pghost.eu/node/9">http://www.pghost.eu/node/9</a><br />

Suivez le lien pour une vidéo :

<a target="_blank" href="http://www.youtube.com/profile?user=neothezion">http://www.youtube.com/profile?user=neothezion</a></p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>DataArchitect 4.0 est paru.

<a target="_blank" href="http://www.thekompany.com/products/dataarchitect/">http://www.thekompany.com/products/dataarchitect/</a></li>

<li>psqlODBC 08.02.0400 est arrivé.

<a target="_blank" href="http://psqlodbc.projects.postgresql.org/release.html">http://psqlodbc.projects.postgresql.org/release.html</a></li>

<li>pyswarm 0.7.1 est disponible.

<a target="_blank" href="http://pyswarm.sourceforge.net/">http://pyswarm.sourceforge.net/</a></li>

</ul>

<p><strong>Les offres d'emplois PostgreSQL en mai</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>En route pour le PgDay!

<a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a></p>

<p>Les inscriptions sont ouvertes pour les PGCon 2007

<a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Les PostgreSQL Weekly News vous sont présentées cette semaine par David Fetter. Adaptation francophone de ...</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Bruce Momjian a commité: </p>

<ul>

<li>Update TODO to reflect new direction in plan tracking and invalidation.</li>

<li>Mark TODO as done: "Allow multiple vacuums so large tables do not starve small." </li>

<li>Wording update to FAQ_DEV.. </li>

<li>Add note to FAQ_DEV that regression tests might need to be added. </li>

<li>In developer's FAQ, update list API, from Tom Lane. </li>

<li>Add FAQ item about how patches are reviewed. </li>

<li>Mark TODO as done: "Allow ORDER BY ... LIMIT # to select high/low value without sort" </li>

</ul>

<p>Andrew Dunstan a commité: </p>

<ul>

<li>Make clearer how arguments and return values in pl/perl are escaped. This is to clarify the situation that Theo Schlossnagle recently reported on -bugs. </li>

</ul>

<p>Neil Conway a commité: </p>

<ul>

<li>Doc tweak: add an xref to pgsql/doc/src/sgml/func.sgml. </li>

<li>Fix some typos in the documentation. Patch from Brian Gough. Backport the relevant fixes to 8.2 as well. </li>

</ul>

<p>Alvaro Herrera a commité: </p>

<ul>

<li>Fix a few more double words in docs. </li>

<li>Use the new TimestampDifferenceExceeds API instead of timestamp_cmp_internal and TimestampDifference, to make coding clearer. I think this should also fix the failure to start workers in platforms with low resolution timers, as reported by Itagaki Takahiro. </li>

<li>Fix failure to check for INVALID worker entry in the new autovacuum code, which could happen when a worker took to long to start and was thus "aborted" by the launcher. Noticed by lionfish buildfarm member. </li>

</ul>

<p>Magnus Hagander a commité: </p>

<ul>

<li>In pgsql/src/backend/utils/adt/selfuncs.c, check return code from strxfrm on Windows since it has a non-standard way of indicating errors, so we don't try to allocate INT_MAX bytes to store a result in. Per ITAGAKI Takahiro. </li>

<li>Release builds generate different strangely formatted export names for local symbols, that shouldn't be exported. This patch excludes them, cutting down about 10,000 exported symbols and decreasing the binary size by 20%. </li>

<li>Dave Page's patch which adds a wrapper script install.bat around install.pl that calls buildenv.bat before doing the install. </li>

</ul>

<p>Tom Lane a commité: </p>

<ul>

<li>Add a line to the EXPLAIN ANALYZE output for a Sort node, showing the actual sort strategy and amount of space used. By popular demand. </li>

<li>Kazuhiro Inaoka's patch which adds tas() support for Renesas' M32R(?) processor.</li>

<li>Suppress a recently-introduced 'variable might be clobbered by longjmp' warning. </li>

<li>A few fixups in error handling: mark pg_re_throw() as noreturn for gcc, and for other compilers, insert a dummy exit() call so that they understand PG_RE_THROW() doesn't return. Insert fflush(stderr) in ExceptionalCondition, per recent buildfarm evidence that that might not happen automatically on some platforms. And const-ify ExceptionalCondition's declaration while at it.</li>

<li>Teach tuplesort.c about "top N" sorting, in which only the first N tuples need be returned. We keep a heap of the current best N tuples and sift-up new tuples into it as we scan the input. For M input tuples this means only about M*log(N) comparisons instead of M*log(M), not to mention a lot less workspace when N is small --- avoiding spill-to-disk for large M is actually the most attractive thing about it. Patch includes planner and executor support for invoking this facility in ORDER BY ... LIMIT queries. Greg Stark, with some editorialization by moi. </li>

<li>Tweak hash index AM to use the new ReadOrZeroBuffer bufmgr API when fetching pages it intends to zero immediately. Just to show there is some use for that function besides WAL recovery :-). Along the way, fold _hash_checkpage and _hash_pageinit calls into _hash_getbuf and friends, instead of expecting callers to do that separately. </li>

<li>Dept. of second thoughts: add comments cautioning against using ReadOrZeroBuffer to fetch pages from beyond physical EOF. This would usually work, but would cause problems for md.c if writes occurred beyond a segment boundary when the previous segment file hadn't been fully extended. </li>

<li>Heikki Linnakangas's patch which makes the following change: During WAL recovery, when reading a page that we intend to overwrite completely from the WAL data, don't bother to physically read it; just have bufmgr.c return a zeroed-out buffer instead. This speeds recovery significantly, and also avoids unnecessary failures when a page-to-be-overwritten has corrupt page headers on disk. This replaces a former kluge that accomplished the latter by pretending zero_damaged_pages was always ON during WAL recovery; which was OK when the kluge was put in, but is unsafe when restoring a WAL log that was written with full_page_writes off. </li>

<li>Fix things so that when CREATE INDEX CONCURRENTLY sets pg_index.indisvalid true at the very end of its processing, the update is broadcast via a shared-cache-inval message for the index; without this, existing backends that already have relcache entries for the index might never see it become valid. Also, force a relcache inval on the index's parent table at the same time, so that any cached plans for that table are re-planned; this ensures that the newly valid index will be used if appropriate. Aside from making C.I.C. behave more reasonably, this is necessary infrastructure for some aspects of the HOT patch. Pavan Deolasee, with a little further stuff from me. </li>

<li>Fix oversight in PG_RE_THROW processing: it's entirely possible that there isn't any place to throw the error to. If so, we should treat the error as FATAL, just as we would have if it'd been thrown outside the PG_TRY block to begin with. Although this is clearly a *potential* source of bugs, it is not clear at the moment whether it is an *actual* source of bugs; there may not presently be any PG_TRY blocks in code that can be reached with no outer longjmp catcher. So for the moment I'm going to be conservative and not back-patch this. The change breaks ABI for users of PG_RE_THROW and hence might create compatibility problems for loadable modules, so we should not put it into released branches without proof that it's needed. </li>

<li>Fix a thinko in my patch of a couple months ago for bug #3116: it did the wrong thing when inlining polymorphic SQL functions, because it was using the function's declared return type where it should have used the actual result type of the current call. In 8.1 and 8.2 this causes obvious failures even if you don't have assertions turned on; in 8.0 and 7.4 it would only be a problem if the inlined expression were used as an input to a function that did run-time type determination on its inputs. Add a regression test, since this is evidently an under-tested area. </li>

<li>Change the timestamps recorded in transaction commit/abort xlog records from time_t to TimestampTz representation. This provides full gettimeofday() resolution of the timestamps, which might be useful when attempting to do point-in-time recovery --- previously it was not possible to specify the stop point with sub-second resolution. But mostly this is to get rid of TimestampTz-to-time_t conversion overhead during commit. Per my proposal of a day or two back. </li>

<li>Fix oversight in my patch of yesterday: forgot to ensure that stats would still be forced out at backend exit. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>

Aucune déception cette semaine :-) </li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent an update of Simon's Heap Page Diagnostic Functions. </li>

<li>Gavin Sherry sent in an update to his bitmap index patch. </li>

<li>Jaime Casanova sent in another revision of his patch which adds a GUC for temp_tablespaces. </li>

<li>Dany DeBontridder sent in a patch which enables pg_dump to dump individual objects. </li>

<li>Andrew Dunstan sent in a patch documenting PL/Perl's behavior with bytea inputs. </li>

<li>Joachim Wieland sent in a patch which addresses the outstanding issues of the recent guc patch. </li>

<li>Neil Conway sent in a patch which enables integer datetimes by default. </li>

<li>Pavel Stehule sent in another revision of his patch which adds table function support per SQL2003: T326 Table Functions. </li>

</ul>