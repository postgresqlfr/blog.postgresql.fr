---
layout: post
title: "Nouvelles neuves de PG"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/164"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 19 Août 2007</strong></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>

Once:radix 0.9 est sorti.  <a target="_blank" href="http://sourceforge.net/projects/onceradix/">http://sourceforge.net/projects/onceradix/</a>

</li>

<li>

pgAdmin III 1.8.0 Beta 3 est sorti.  <a target="_blank" href="http://www.pgadmin.org/">http://www.pgadmin.org/</a>

</li>

<li>

pgUnitTest est sorti:  <a target="_blank" href="http://pgfoundry.org/projects/pgunittest">http://pgfoundry.org/projects/pgunittest</a></li>

</ul>

<!--more-->


<strong>Offres d'emploi PostgreSQL pour Août</strong>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php</a>

</p>

<p><strong>PostgreSQL dans les médias</strong></p>

<ul>

Planet PostgreSQL:  <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

<li>

General Bits, Archives et occasionnellement de nouveaux articles :  <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

<em>PostgreSQL Weekly News vous sont présentés par David Fetter.<br />

La traduction française est assurée par l'équipe PostgreSQLFr</em>

Si vous souhaitez nous soumettre des nouvelles ou des annonces, envoyez les avant dimanche 15:00 (heure du pacifique) aux adresses suivantes : en anglais à <a href="mailto:david_at_fetter_dot_org">davdi@fetter.org</a> ou en allemenad à <a href="pwn_at_pgug_dot_de">pwn@pgug.de</a>.</p>

<p><strong>Correctifs appliqués</strong></p>

Andrew Dunstan  a committé:

<ul>

<li>

Fix minor typo fixes in CSVlog docs, per Michael Glaesemann. </li>

<li>

Provide for logfiles in machine readable CSV format. In consequence,   rename redirect_stderr to logging_collector.  Original patch from   Arul Shaji, subsequently modified by Greg Smith, and then heavily   modified by me. </li>

</ul>

Bruce Momjian  a committé: <ul>

<li>

Mark TODO as DONE: "Allow server log information to be output as CSV   format." </li>

<li>

Add to TODO, with URL reference, "Reduce XID consumption of   read-only queries." </li>

<li>

Add another idea to TODO item, "Allow data to be pulled directly   from indexes." </li>

<li>

Fix whitespace in TODO. </li>

<li>

Mark TODO as DONE: "Use backend PREPARE/EXECUTE facility for ecpg   where possible." </li>

</ul>

Micheal Meskes  a committé: <ul>

<li>

In pgsql/src/interfaces/ecpg/test/expected, it seems we simply   expected the same output for failure and success. </li>

<li>

Hopefully fixed missing CHAR_BIT symbol in ecpg. </li>

<li>

Fixed compiler warning for enum handling in ecpg. </li>

<li>

Finished major rewrite to use new protocol version for ecpg.  Really   prepare statements.  Added more regression tests.  Added   auto-prepare mode.  Use '$n' for positional variables, '?' is still   possible via ecpg option.  Cleaned up the sources a little bit. </li>

</ul>

Tom Lane  a committé: <ul>

<li>

Arrange to cache a ResultRelInfo in the executor's EState for   relations that are not one of the query's defined result relations,   but nonetheless have triggers fired against them while the query is   active.  This was formerly impossible but can now occur because of   my recent patch to fix the firing order for RI triggers.  Caching a   ResultRelInfo avoids duplicating work by repeatedly opening and   closing the same relation, and also allows EXPLAIN ANALYZE to "see"   and report on these extra triggers.  Use the same mechanism to cache   open relations when firing deferred triggers at transaction   shutdown; this replaces the former one-element-cache strategy used   in that case, and should improve performance a bit when there are   deferred triggers on a number of relations. </li>

<li>

Repair problems occurring when multiple RI updates have to be done   to the same row within one query: we were firing check triggers   before all the updates were done, leading to bogus failures.  Fix by   making the triggers queued by an RI update go at the end of the   outer query's trigger event list, thereby effectively making the   processing "breadth-first".  This was indeed how it worked pre-8.0,   so the bug does not occur in the 7.x branches.  Per report from   Pavel Stehule. </li>

<li>

Fix oversight in async-commit patch: there were some places in   heapam.c that still thought they could set HEAP_XMAX_COMMITTED   immediately after seeing the other transaction commit.  Make them   use the same logic as tqual.c does to determine if the hint bit can   be set yet. </li>

<li>

TEMPORARILY make synchronous_commit default to OFF, so that we can   get more thorough testing of async-commit mode from the buildfarm.   This patch MUST get reverted before 8.3 release! </li>

<li>

Fix two bugs induced in VACUUM FULL by async-commit patch.  First,   we cannot assume that XLogAsyncCommitFlush guarantees hint bits will   be settable, because clog.c's inexact LSN bookkeeping results in   windows where a previously flushed transaction is considered   unhintable because it shares an LSN slot with a later unflushed   transaction.  But repair_frag requires XMIN_COMMITTED to be correct   so that it can distinguish tuples moved by the current vacuum.   Since not being able to set the bit is an uncommon corner case, the   most practical way of dealing with it seems to be to abandon   shrinking (ie, don't invoke repair_frag) when we find a non-dead   tuple whose XMIN_COMMITTED bit couldn't be set.  Second, it is   possible for the same reason that a RECENTLY_DEAD tuple does not get   its XMAX_COMMITTED bit set during scan_heap.  But by the time   repair_frag examines the tuple it might be possible to set the bit.   We therefore must take buffer content lock when calling   HeapTupleSatisfiesVacuum a second time, else we can get an Assert   failure in SetBufferCommitInfoNeedsSave.  This latter bug is latent   in existing releases, but I think it cannot actually occur without   async commit, since the first HeapTupleSatisfiesVacuum call should   always have set the bit.  So I'm not going to back-patch it.  In   passing, reduce the existing "cannot shrink relation" messages from   NOTICE to LOG level.  The new message must be no higher than LOG if   we don't want unpredictable regression test failures, and   consistency seems like a good idea.  Also arrange that only one such   message is reported per VACUUM FULL; in typical scenarios you could   get spammed with many such messages, which seems a bit useless. </li>

<li>

Document that the regexp split functions ignore zero-length matches   in certain corner cases.  Per discussion, the code does what we   want, but it really needs to be documented that these functions act   differently from regexp_matches. </li>

<li>

Remove an "optimization" I installed in 2001, to make repalloc()   attempt to enlarge the memory chunk in-place when it was feasible to   do so.  This turns out to not work well at all for scenarios   involving repeated cycles of palloc/repalloc/pfree: the eventually   freed chunks go into the wrong freelist for the next initial palloc   request, and so we consume memory indefinitely.  While that could be   defended against, the number of cases where the optimization can   still be applied drops significantly, and adjusting the initial   sizes of StringInfo buffers makes it drop to almost nothing.  Seems   better to just remove the extra complexity.  Per recent discussion   and testing. </li>

<li>

Increase the initial size of StringInfo buffers to 1024 bytes (from   256); likewise increase the initial size of the scanner's literal   buffer to 1024 (from 128).  Instrumentation of the regression tests   suggests that this saves a useful amount of repalloc() traffic ---   the number of calls occurring during one set of tests drops from   about 6900 to about 3900.  The old sizes were chosen in the late   90's with an eye to machines much smaller than are common today. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>

Brendan Jurd's patch which refactors formatting.c, pushed out to 8.4. </li>

<li>

ITAGAKI Takahiro's patch which reduces the size of PageFreeSpaceInfo on 64bit platforms.  The patch didn't touch enough places. </li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Zdenek Kotala sent in another version of his pgcrypto patch. </li>

<li>

Julius Stroffek sent in another version of his patch for optimizer hooks. </li>

<li>

Peter Eisentraut sent in a patch to enable people to use their system's time zone files. </li>

<li>

Merlin Moncure sent in a patch which adds a pgparam extension to the libpq api. </li>

</ul>