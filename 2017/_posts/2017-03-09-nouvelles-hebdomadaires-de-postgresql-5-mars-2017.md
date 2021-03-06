---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 mars 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/03/09/Nouvelles-hebdomadaires-de-PostgreSQL-5-mars-2017"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgpoolAdmin 3.6.0, an administration tool for pgpool, released. <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

<li>psycopg2 2.7, un connecteur python pour PostgreSQL&nbsp;: <a target="_blank" href="http://initd.org/psycopg/docs/news.html#what-s-new-in-psycopg-2-7">http://initd.org/psycopg/docs/news.html#what-s-new-in-psycopg-2-7</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-03/">http://archives.postgresql.org/pgsql-jobs/2017-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: Meetup &agrave; Nantes le 8 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>[ndt: Meetup &agrave; Paris le 9 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</li>

<li>PgConf.Russia 2017 se d&eacute;roulera du 15 au 17 mars 2017 &agrave; Moscou&nbsp;: <a target="_blank" href="https://pgconf.ru/en">https://pgconf.ru/en</a></li>

<li>Le PGDay Asia 2017 est programm&eacute; les 17 et 18 mars &agrave; Singapour&nbsp;: <a target="_blank" href="http://2017.pgday.asia/">http://2017.pgday.asia/</a></li>

<li>Le PGDay nordique se tiendra &agrave; Stockholm (Su&egrave;de) au Sheraton Hotel, le 21 mars 2017&nbsp;: <a target="_blank" href="https://2017.nordicpgday.org/">https://2017.nordicpgday.org/</a></li>

<li>Le pgDay Paris 2017 aura lieu &agrave; Paris (France) le 23 mars 2017&nbsp;: <a target="_blank" href="http://2017.pgday.paris/">http://2017.pgday.paris/</a></li>

<li>La <em>PGConf US 2017</em> aura lieu &agrave; Jersey City (New Jersey, USA) du 28 au 31 mars&nbsp;: <a target="_blank" href="http://www.pgconf.us/2017/">http://www.pgconf.us/2017/</a></li>

<li>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/papers.php">http://www.pgcon.org/2017/papers.php</a></li>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170306025346.GA11640@fetter.org">http://www.postgresql.org/message-id/20170306025346.GA11640@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Andres Freund pushed:</p>

<ul>

<li>Add "Slab" MemoryContext implementation for efficient equal-sized allocations. The default general purpose aset.c style memory context is not a great choice for allocations that are all going to be evenly sized, especially when those objects aren't small, and have varying lifetimes. There tends to be a lot of fragmentation, larger allocations always directly go to libc rather than have their cost amortized over several pallocs. These problems lead to the introduction of ad-hoc slab allocators in reorderbuffer.c. But it turns out that the simplistic implementation leads to problems when a lot of objects are allocated and freed, as aset.c is still the underlying implementation. Especially freeing can easily run into O(n^2) behavior in aset.c. While the O(n^2) behavior in aset.c can, and probably will, be addressed, custom allocators for this behavior are more efficient both in space and time. This allocator is for evenly sized allocations, and supports both cheap allocations and freeing, without fragmenting significantly. It does so by allocating evenly sized blocks via malloc(), and carves them into chunks that can be used for allocations. In order to release blocks to the OS as early as possible, chunks are allocated from the fullest block that still has free objects, increasing the likelihood of a block being entirely unused. A subsequent commit uses this in reorderbuffer.c, but a further allocator is needed to resolve the performance problems triggering this work. There likely are further potentialy uses of this allocator besides reorderbuffer.c. There's potential further optimizations of the new slab.c, in particular the array of freelists could be replaced by a more intelligent structure - but for now this looks more than good enough. Author: Tomas Vondra, editorialized by Andres Freund Reviewed-By: Andres Freund, Petr Jelinek, Robert Haas, Jim Nasby Discussion: <a target="_blank" href="https://postgr.es/m/d15dff83-0b37-28ed-0809-95a5cc7292ad@2ndquadrant.com">https://postgr.es/m/d15dff83-0b37-28ed-0809-95a5cc7292ad@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58b25e98106dbe062cec0f3d31d64977bffaa4af">http://git.postgresql.org/pg/commitdiff/58b25e98106dbe062cec0f3d31d64977bffaa4af</a></li>

<li>Use the new "Slab" context for some allocations in reorderbuffer.h. Note that this change alone does not yet fully address the performance problems triggering this work, a large portion of the slowdown is triggered by the tuple allocator, which isn't converted to the new allocator. It would be possible to do so, but using evenly sized objects, like both the current implementation in reorderbuffer.c and slab.c, wastes a fair amount of memory. A later patch by Tomas will introduce a better approach. Author: Tomas Vondra Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/d15dff83-0b37-28ed-0809-95a5cc7292ad@2ndquadrant.com">https://postgr.es/m/d15dff83-0b37-28ed-0809-95a5cc7292ad@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fab40ad32efa4038d19eaed975bb4c1713ccbc0">http://git.postgresql.org/pg/commitdiff/9fab40ad32efa4038d19eaed975bb4c1713ccbc0</a></li>

<li>Make useful infrastructure from aset.c generally available. An upcoming patch introduces a new type of memory context. To avoid duplicating debugging infrastructure within aset.c, move useful pieces to memdebug.[ch]. While touching aset.c, fix printf format code in AllocFree* debug macros. Author: Tomas Vondra Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/b3b2245c-b37a-e1e5-ebc4-857c914bc747@2ndquadrant.com">https://postgr.es/m/b3b2245c-b37a-e1e5-ebc4-857c914bc747@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfd12cccbd72c1846bfa3e4031155c9bd479d70a">http://git.postgresql.org/pg/commitdiff/bfd12cccbd72c1846bfa3e4031155c9bd479d70a</a></li>

<li>Overhaul memory management README. The README was written as a "historical account", and that style hasn't aged particularly well. Rephrase it to describe the current situation, instead of having various version specific comments. This also updates the description of how allocated chunks are associated with their corresponding context, the method of which has changed in the preceding commit. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170228074420.aazv4iw6k562mnxg@alap3.anarazel.de">https://postgr.es/m/20170228074420.aazv4iw6k562mnxg@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f4e2d50cd7483a068c0a32e56b2d40f980cdea72">http://git.postgresql.org/pg/commitdiff/f4e2d50cd7483a068c0a32e56b2d40f980cdea72</a></li>

<li>Reduce size of common allocation header. The new slab allocator needs different per-allocation information than the classical aset.c. The definition in 58b25e981 wasn't sufficiently careful on 32 platforms with 8 byte alignment, leading to buildfarm failures. That's not entirely easy to fix by just adjusting the definition. As slab.c doesn't actually need the size part(s) of the common header, all chunks are equally sized after all, it seems better to instead reduce the header to the part needed by all allocators, namely which context an allocation belongs to. That has the advantage of reducing the overhead of slab allocations, and also allows for more flexibility in future allocators. To avoid spreading the logic about accessing a chunk's context around, centralize it in GetMemoryChunkContext(), which allows to delete a good number of lines. A followup commit will revise the mmgr/README portion about StandardChunkHeader, and more. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170228074420.aazv4iw6k562mnxg@alap3.anarazel.de">https://postgr.es/m/20170228074420.aazv4iw6k562mnxg@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e3aa03b418d604d33040ed8fb866857dae82a02">http://git.postgresql.org/pg/commitdiff/7e3aa03b418d604d33040ed8fb866857dae82a02</a></li>

<li>Fix assertion failure due to over-eager code deduplication. In the previous commit I'd made MemoryContextContains() use GetMemoryChunkContext(), but that causes trouble when the passed pointer isn't allocated in any memory context - that's probably something we shouldn't do, but the previous commit isn't a place for a "policy" change. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/123ccbe58309d08e42009e99a4b34a3a1aef7798">http://git.postgresql.org/pg/commitdiff/123ccbe58309d08e42009e99a4b34a3a1aef7798</a></li>

<li>Fix s/ITERTOR/ITERATOR/ typo in simplehash.h. This could lead to problem when simplehash.h is used to define two different types of hashtable visible in the same translation unit. Reported-By: Josh Soref Discussion: <a target="_blank" href="https://postgr.es/m/CACZqfqCC7WdBAY=rQePb9-qW1rjdaTdHsV5KoVejHkDb6qrtOg@mail.gmail.com">https://postgr.es/m/CACZqfqCC7WdBAY=rQePb9-qW1rjdaTdHsV5KoVejHkDb6qrtOg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f7277dfb5e703a034dbce7b155d998e577a6bc3">http://git.postgresql.org/pg/commitdiff/8f7277dfb5e703a034dbce7b155d998e577a6bc3</a></li>

<li>Fix two recently introduced grammar errors in mmgr/README. These were introduced by me in f4e2d50c. Reported-By: Tomas Vondra Discussion: <a target="_blank" href="https://postgr.es/m/11adca69-be28-44bc-a801-64e6d53851e3@2ndquadrant.com">https://postgr.es/m/11adca69-be28-44bc-a801-64e6d53851e3@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1309375e706440e1e2fe2a5bb74effbc639261ef">http://git.postgresql.org/pg/commitdiff/1309375e706440e1e2fe2a5bb74effbc639261ef</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>chomp PQerrorMessage() in backend uses. PQerrorMessage() returns an error message with a trailing newline, but in backend use (dblink, postgres_fdw, libpqwalreceiver), we want to have the error message without that for emitting via ereport(). To simplify that, add a function pchomp() that returns a pstrdup'ed string with the trailing newline characters removed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ed193c904679a533d5e26a27c97119793bcae52">http://git.postgresql.org/pg/commitdiff/2ed193c904679a533d5e26a27c97119793bcae52</a></li>

<li>Use proper enum constants for LockWaitPolicy. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb75f4fced77e108393f18425ec3f7aba2e70a9d">http://git.postgresql.org/pg/commitdiff/eb75f4fced77e108393f18425ec3f7aba2e70a9d</a></li>

<li>psql: Add tab completion for DEALLOCATE. EXECUTE already tab-completes the list of prepared statements, but DEALLOCATE was missing. From: Dagfinn Ilmari Manns&Atilde;&yen;ker &lt;ilmari@ilmari.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5a388392dab4c4a7c0fbd6cd0ad7421eabfc5cf">http://git.postgresql.org/pg/commitdiff/b5a388392dab4c4a7c0fbd6cd0ad7421eabfc5cf</a></li>

<li>Move atooid() definition to a central place. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/788af6f8541d5f30acec540e4fd3cb24f5347209">http://git.postgresql.org/pg/commitdiff/788af6f8541d5f30acec540e4fd3cb24f5347209</a></li>

<li>Collect duplicate copies of oid_cmp(). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20f6d74242b3c9c84924e890248d027d30283e21">http://git.postgresql.org/pg/commitdiff/20f6d74242b3c9c84924e890248d027d30283e21</a></li>

<li>Fix naming inconsistency. subobjid -&gt; objsubid From: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/005638e9886aeedeeef933bdbd123d928053d390">http://git.postgresql.org/pg/commitdiff/005638e9886aeedeeef933bdbd123d928053d390</a></li>

<li>Fix timeouts in PostgresNode::psql. Newer Perl or IPC::Run versions default to appending the filename to string exceptions, e.g. the exception psql timed out is thrown as psql timed out at /usr/share/perl5/vendor_perl/IPC/Run.pm line 2961. To handle this, match exceptions with !~ rather than ne. From: Craig Ringer &lt;craig@2ndquadrant.com&gt; Reviewed-by: Dagfinn Ilmari Manns&Atilde;&yen;ker &lt;ilmari@ilmari.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/231f48796bcf2976f19122b8c6e12f50b463f94e">http://git.postgresql.org/pg/commitdiff/231f48796bcf2976f19122b8c6e12f50b463f94e</a></li>

<li>Correct old release note item. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be6ed6451c693d9121d357996cbc21b06058b9c1">http://git.postgresql.org/pg/commitdiff/be6ed6451c693d9121d357996cbc21b06058b9c1</a></li>

<li>Use asynchronous connect API in libpqwalreceiver. This makes the connection attempt from CREATE SUBSCRIPTION and from WalReceiver interruptable by the user in case the libpq connection is hanging. The previous coding required immediate shutdown (SIGQUIT) of PostgreSQL in that situation. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; Tested-by: Thom Brown &lt;thom@linux.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e8a850094478a2036891fa3d4ce769bce411ee3">http://git.postgresql.org/pg/commitdiff/1e8a850094478a2036891fa3d4ce769bce411ee3</a></li>

<li>Fix after trigger execution in logical replication. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; Tested-by: Thom Brown &lt;thom@linux.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/713f7c47d9c38654adbc36c47fd9e439f0d1f715">http://git.postgresql.org/pg/commitdiff/713f7c47d9c38654adbc36c47fd9e439f0d1f715</a></li>

<li>Add RENAME support for PUBLICATIONs and SUBSCRIPTIONs. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6da9759a03d6d985c3b95a3177bbda7bcffd0ae6">http://git.postgresql.org/pg/commitdiff/6da9759a03d6d985c3b95a3177bbda7bcffd0ae6</a></li>

<li>psql: Add tab completion for logical replication. Add tab completion for publications and subscriptions. Also, to be able to get a list of subscriptions, make pg_subscription world-readable but revoke access to subconninfo using column privileges. From: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f236e1eb8c7601bded96fd96244d676e95b8c26">http://git.postgresql.org/pg/commitdiff/6f236e1eb8c7601bded96fd96244d676e95b8c26</a></li>

<li>doc: Put callouts in SQL comments. This makes copy-and-pasting the SQL code easier. From: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47b55d4174fd5662cd2f8c40852a20eec5f07c8f">http://git.postgresql.org/pg/commitdiff/47b55d4174fd5662cd2f8c40852a20eec5f07c8f</a></li>

<li>Fix typo. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2357c12b4988b4d30c1e2e813e438424546eaa88">http://git.postgresql.org/pg/commitdiff/2357c12b4988b4d30c1e2e813e438424546eaa88</a></li>

<li>Fix parsing of DROP SUBSCRIPTION ... DROP SLOT. It didn't actually parse before. Reported-by: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/347302730dc3092143ccbc1c29b47ac3354f924b">http://git.postgresql.org/pg/commitdiff/347302730dc3092143ccbc1c29b47ac3354f924b</a></li>

<li>Disallow CREATE/DROP SUBSCRIPTION in transaction block. Disallow CREATE SUBSCRIPTION and DROP SUBSCRIPTION in a transaction block when the replication slot is to be created or dropped, since that cannot be rolled back. based on patch by Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; == Pending Patches ==</li>

<li>pg_dump: Fix ordering. Materialized views refresh should be last. From: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d77ff69341f20db348ba2a4b29c522a93ac8e901">http://git.postgresql.org/pg/commitdiff/d77ff69341f20db348ba2a4b29c522a93ac8e901</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Remove PL/Tcl's "module" facility. PL/Tcl has long had a facility whereby Tcl code could be autoloaded from a database table named "pltcl_modules". However, nobody is using it, as evidenced by the recent discovery that it's never been fixed to work with standard_conforming_strings turned on. Moreover, it's rather shaky from a security standpoint, and the table design is very old and crufty (partly because it dates from before we had TOAST). A final problem is that because the table-population scripts depend on the Tcl client library Pgtcl, which we removed from the core distribution in 2004, it's impossible to create a self-contained regression test for the feature. Rather than try to surmount these problems, let's just remove it. A follow-on patch will provide a way to execute user-defined initialization code, similar to features that exist in plperl and plv8. With that, it will be possible to implement this feature or similar ones entirely in userspace, which is where it belongs. Discussion: <a target="_blank" href="https://postgr.es/m/22067.1488046447@sss.pgh.pa.us">https://postgr.es/m/22067.1488046447@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/817f2a586342767d3289a320bb1dac5dcbb76979">http://git.postgresql.org/pg/commitdiff/817f2a586342767d3289a320bb1dac5dcbb76979</a></li>

<li>Allow index AMs to return either HeapTuple or IndexTuple format during IOS. Previously, only IndexTuple format was supported for the output data of an index-only scan. This is fine for btree, which is just returning a verbatim index tuple anyway. It's not so fine for SP-GiST, which can return reconstructed data that's much larger than a page. To fix, extend the index AM API so that index-only scan data can be returned in either HeapTuple or IndexTuple format. There's other ways we could have done it, but this way avoids an API break for index AMs that aren't concerned with the issue, and it costs little except a couple more fields in IndexScanDescs. I changed both GiST and SP-GiST to use the HeapTuple method. I'm not very clear on whether GiST can reconstruct data that's too large for an IndexTuple, but that seems possible, and it's not much of a code change to fix. Per a complaint from Vik Fearing. Reviewed by Jason Li. Discussion: <a target="_blank" href="https://postgr.es/m/49527f79-530d-0bfe-3dad-d183596afa92@2ndquadrant.fr">https://postgr.es/m/49527f79-530d-0bfe-3dad-d183596afa92@2ndquadrant.fr</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b88f27cb42fe8ff59ddc75e29c005624b8850a2">http://git.postgresql.org/pg/commitdiff/9b88f27cb42fe8ff59ddc75e29c005624b8850a2</a></li>

<li>Update documentation of tsquery_phrase(). Missed in commit 028350f61. Noted by Eiji Seki. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d99706ed5178d7f37ac322e02e8c56e4e5e0e99a">http://git.postgresql.org/pg/commitdiff/d99706ed5178d7f37ac322e02e8c56e4e5e0e99a</a></li>

<li>In rebuild_relation(), don't access an already-closed relcache entry. This reliably fails with -DRELCACHE_FORCE_RELEASE, as reported by Andrew Dunstan, and could sometimes fail in normal operation, resulting in a wrong persistence value being used for the transient table. It's not immediately clear to me what effects that might have beyond the risk of a crash while accessing OldHeap-&gt;rd_rel-&gt;relpersistence, but it's probably not good. Bug introduced by commit f41872d0c, and made substantially worse by commit 85b506bbf, which added a second such access significantly later than the heap_close. I doubt the first reference could fail in a production scenario, but the second one definitely could. Discussion: <a target="_blank" href="https://postgr.es/m/7b52f900-0579-cda9-ae2e-de5da17090e6@2ndQuadrant.com">https://postgr.es/m/7b52f900-0579-cda9-ae2e-de5da17090e6@2ndQuadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dbca84f04ed5debe748029699aa44fa86beca32d">http://git.postgresql.org/pg/commitdiff/dbca84f04ed5debe748029699aa44fa86beca32d</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>hash: Refactor bucket squeeze code. In preparation for adding write-ahead logging to hash indexes, refactor _hash_freeovflpage and _hash_squeezebucket so that all related page modifications happen in a single section of code. The previous coding assumed that it would be fine to move tuples one at a time, and also that the various operations involved in freeing an overflow page didn't necessarily all need to be done together, all of which is true if you don't care about write-ahead logging. Amit Kapila, with slight changes by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0f18cb77f50a54e997d857d592f6a511617f52c">http://git.postgresql.org/pg/commitdiff/b0f18cb77f50a54e997d857d592f6a511617f52c</a></li>

<li>hash: Refactor overflow page allocation. As with commit b0f18cb77f50a54e997d857d592f6a511617f52c, the goal here is to move all of the related page modifications to a single section of code, in preparation for adding write-ahead logging. Amit Kapila, with slight changes by me. The larger patch series of which this is a part has been reviewed and tested by &Atilde;lvaro Herrera, Ashutosh Sharma, Mark Kirkwood, Jeff Janes, and Jesper Pedersen, all of whom should also have been credited in the previous commit message. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30df93f698d016d086e8961aa6c6076b37ea0ef4">http://git.postgresql.org/pg/commitdiff/30df93f698d016d086e8961aa6c6076b37ea0ef4</a></li>

<li>hash: Refactor and clean up bucket split code. As with commit 30df93f698d016d086e8961aa6c6076b37ea0ef4 and commit b0f18cb77f50a54e997d857d592f6a511617f52c, the goal here is to move all of the related page modifications to a single section of code, in preparation for adding write-ahead logging. Amit Kapila, with slight changes by me. The larger patch series of which this is a part has been reviewed and tested by &Atilde;lvaro Herrera, Ashutosh Sharma, Mark Kirkwood, Jeff Janes, and Jesper Pedersen. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21a3cf41284c08307ef9abe3400be5dc53723519">http://git.postgresql.org/pg/commitdiff/21a3cf41284c08307ef9abe3400be5dc53723519</a></li>

<li>Update comments overlooked by 2f5c9d9c9cec436e55847ec580606d7e88067df6. Tomas Vondra <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa42b2005f0cd825fe5a5fd4db93a7c30b5fe883">http://git.postgresql.org/pg/commitdiff/fa42b2005f0cd825fe5a5fd4db93a7c30b5fe883</a></li>

<li>Don't uselessly rewrite, truncate, VACUUM, or ANALYZE partitioned tables. Also, recursively perform VACUUM and ANALYZE on partitions when the command is applied to a partitioned table. In passing, some related documentation updates. Amit Langote, reviewed by Michael Paquier, Ashutosh Bapat, and by me. Discussion: <a target="_blank" href="http://postgr.es/m/47288cf1-f72c-dfc2-5ff0-4af962ae5c1b@lab.ntt.co.jp">http://postgr.es/m/47288cf1-f72c-dfc2-5ff0-4af962ae5c1b@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c3bb99330aa9b4c2f6258bfa0265d806bf365c3">http://git.postgresql.org/pg/commitdiff/3c3bb99330aa9b4c2f6258bfa0265d806bf365c3</a></li>

<li>Refactor bitmap heap scan in preparation for parallel support. The final patch will be less messy if the prefetching support is a bit better isolated, so do that. Dilip Kumar, with some changes by me. The larger patch set of which this is a part has been reviewed and tested by (at least) Andres Freund, Amit Khandekar, Tushar Ahuja, Rafia Sabih, Haribabu Kommi, and Thomas Munro. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e0fe09fc5dc1135479b532d1806e28cbc5a35aa">http://git.postgresql.org/pg/commitdiff/9e0fe09fc5dc1135479b532d1806e28cbc5a35aa</a></li>

<li>Improve error reporting for tuple-routing failures. Currently, the whole row is shown without column names. Instead, adopt a style similar to _bt_check_unique() in ExecFindPartition() and show the failing key: (key1, ...) = (val1, ...). Amit Langote, per a complaint from Simon Riggs. Reviewed by me; I also adjusted the grammar in one of the comments. Discussion: <a target="_blank" href="http://postgr.es/m/9f9dc7ae-14f0-4a25-5485-964d9bfc19bd@lab.ntt.co.jp">http://postgr.es/m/9f9dc7ae-14f0-4a25-5485-964d9bfc19bd@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a73e17317e91912b2755f7960d5bf31d374cf31">http://git.postgresql.org/pg/commitdiff/5a73e17317e91912b2755f7960d5bf31d374cf31</a></li>

<li>Notify bgworker registrant after freeing worker slot. Tom Lane observed buildfarm failures caused by the select_parallel regression test trying to launch new parallel queries before the worker slots used by the previous ones were freed. Try to fix this by having the postmaster free the worker slots before it sends the SIGUSR1 notifications to the registering process. This doesn't completely eliminate the possibility that the user backend might (correctly) observe the worker as dead before the slot is free, but I believe it should make the window significantly narrower. Patch by me, per complaint from Tom Lane. Reviewed by Amit Kapila. Discussion: <a target="_blank" href="http://postgr.es/m/30673.1487310734@sss.pgh.pa.us">http://postgr.es/m/30673.1487310734@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aea5d298362e881b13d95a48c5ae116879237389">http://git.postgresql.org/pg/commitdiff/aea5d298362e881b13d95a48c5ae116879237389</a></li>

<li>Add pg_current_logfile() function. The syslogger will write out the current stderr and csvlog names, if it's running and there are any, to a new file in the data directory called "current_logfiles". We take care to remove this file when it might no longer be valid (but not at shutdown). The function pg_current_logfile() can be used to read the entries in the file. Gilles Darold, reviewed and modified by Karl O. Pinc, Michael Paquier, and me. Further review by &Atilde;lvaro Herrera and Christoph Berg. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19dc233c32f2900e57b8da4f41c0f662ab42e080">http://git.postgresql.org/pg/commitdiff/19dc233c32f2900e57b8da4f41c0f662ab42e080</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix incorrect variable datatype. Both datatypes map to the same underlying one which is why it still worked, but we should use the correct type. Author: Kyotaro HORIGUCHI <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/016c9908347ed2ba7b9d7101c858ea7730b6c0b0">http://git.postgresql.org/pg/commitdiff/016c9908347ed2ba7b9d7101c858ea7730b6c0b0</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Create &lt;sect3&gt; in the functions-xml section. This is a small change so that a new XMLTABLE sect3 can be added easily later. Author: Craig Ringer Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRAgfzMD-LoSmnMGybD0WsEznLHWap8DO79+-GTRAPR4qA@mail.gmail.com">https://postgr.es/m/CAFj8pRAgfzMD-LoSmnMGybD0WsEznLHWap8DO79+-GTRAPR4qA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4461a9bfd1ac4aa1f922e8309e79d097bde9fcb4">http://git.postgresql.org/pg/commitdiff/4461a9bfd1ac4aa1f922e8309e79d097bde9fcb4</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Handle unaligned SerializeSnapshot() buffer. Likewise in RestoreSnapshot(). Do so by copying between the user buffer and a stack buffer of known alignment. Back-patch to 9.6, where this last applies cleanly. In master, the select_parallel test dies with SIGBUS on "Oracle Solaris 10 1/13 s10s_u11wos_24a SPARC", building 32-bit with gcc 4.9.2. In 9.6 and 9.5, the buffers in question happen to be sufficiently-aligned, and this change is mere insurance against future 9.6 changes or extension code compromising that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f3112135eb67e5df56cd34b8ce662bf6a2390e9">http://git.postgresql.org/pg/commitdiff/7f3112135eb67e5df56cd34b8ce662bf6a2390e9</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Allow vacuums to report oldestxmin. Allow VACUUM and Autovacuum to report the oldestxmin value they used while cleaning tables, helping to make better sense out of the other statistics we report in various cases. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9eb344faf54a849898d9be012ddfa8204cfeb57c">http://git.postgresql.org/pg/commitdiff/9eb344faf54a849898d9be012ddfa8204cfeb57c</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Thomas Munro sent in two revisions of a patch to add a test for SSI SLRU wraparound.</p>

<p>Beena Emerson sent in another revision of a patch to allow setting the default WAL segment size at initdb time.</p>

<p>Kyotaro HORIGUCHI and Peter Eisentraut traded patches to fix an issue in the logical replication protocol.</p>

<p>Amit Langote sent in a patch to allow dropping declaratively partitioned table without CASCADE.</p>

<p>Noah Misch sent in a patch to use wrappers of PG_DETOAST_DATUM_PACKED() more.</p>

<p>Etsuro Fujita sent in a patch to add support for parameterized foreign joins.</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in a patch to add max_pred_locks_per_{relation,page} reloptions.</p>

<p>Alexander Korotkov sent in another revision of a patch to add incremental sort.</p>

<p>Haribabu Kommi sent in another revision of a patch to add infrastructure which will be used to parallelize DML and utility commands.</p>

<p>Pavan Deolasee sent in another revision of a patch to implement WARM.</p>

<p>&Atilde;lvaro Herrera sent in a patch to make a BRIN page range unsummarized.</p>

<p>Andrew Dunstan sent in another revision of a patch to enable tree_gin and btree_gist for enums.</p>

<p>Simon Riggs sent in a patch to reduce the amount of bloat resulting from running CREATE INDEX CONCURRENTLY by destroying the snapshot taken in the first phase, before entering the second phase.</p>

<p>Kyotaro HORIGUCHI sent in a patch to make slotSegNo a XLogSegNo, which it already should have been.</p>

<p>Daisuke Higuchi sent in a patch to enable walsender for async to wait until walsender for sync confirms that WAL is written to disk, controlled by a new boolean GUC, async_walsender_delay.</p>

<p>Robert Haas, Amit Langote, and Ashutosh Bapat traded patches to fix an infelicity between declaratively partitioned tables and relfilenode.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to implement character conversion with a radix tree.</p>

<p>Takayuki Tsunakawa sent in a PoC patch to implement statement-level ROLLBACK.</p>

<p>Kyotaro HORIGUCHI sent in a patch to add WAL relief vent for replication slots.</p>

<p>Surafel Temesgen sent in a patch to disallow multiple queries per PQexec().</p>

<p>Tom Lane sent in two revisions of a patch to remove PL/Tcl's unused modules infrastructure.</p>

<p>Kuntal Ghosh sent in a patch to implement WAL consistency checking for hash indexes.</p>

<p>David Steele sent in two revisions of a patch to make pg_stop_backup() archive wait optional.</p>

<p>Dmitry Dolgov sent in a patch to add some full text search functions for JSONB.</p>

<p>Etsuro Fujita sent in a patch to the PostgreSQL FDW to enable evaluating placeholdervars on the remote server.</p>

<p>Simon Riggs sent in a patch to avoid bloat in CREATE INDEX CONCURRENTLY.</p>

<p>Dmitry Dolgov sent in another revision of a patch to implement generic type subscripting.</p>

<p>David Steele sent in a patch to implement a configurable file mode mask.</p>

<p>Haribabu Kommi sent in a patch to refactor the handling of database attributes between pg_dump and pg_dumpall.</p>

<p>Peter Eisentraut sent in another revision of a patch to implement IDENTITY columns.</p>

<p>Peter Eisentraut sent in another revision of a patch to implement background sessions.</p>

<p>Peter Eisentraut sent in a patch to use the SQL standard error code for nextval.</p>

<p>Peter Eisentraut sent in another revision of a patch to cast result of copyObject() to the correct type.</p>

<p>Venkata B Nagothi sent in two more revisions of a patch to add recovery_start_point and recovery_incomplete.</p>

<p>Amit Kapila sent in another revision of a patch to add WAL logging for hash indexes.</p>

<p>Peter Moser sent in another revision of a patch to add temporal query processing with range types.</p>

<p>Peter Eisentraut sent in another revision of a patch to do some of the infrastructure for making PostgreSQL's source C++-compatible.</p>

<p>Peter Eisentraut sent in a patch to refactor dblink, replacing some macros with static functions.</p>

<p>Peter Eisentraut sent in a patch to make much of the Perl code perlcritic-clean.</p>

<p>Andres Freund sent in a patch to move contrib/seg to only use V1 calling conventions and remove support for version-0 calling conventions.</p>

<p>KaiGai Kohei sent in two more revisions of a patch to add a PassDownLimitBound for ForeignScan/CustomScan.</p>

<p>Tomas Vondra sent in a patch to update comments about CatalogUpdateIndexes.</p>

<p>Dilip Kumar sent in another revision of a patch to implement parallel bitmap heap scan.</p>

<p>Jim Nasby sent in another revision of a patch to add SPI_execute_callback() and callback-based DestReceiver and minimally use same in PL/PythonU.</p>

<p>&Atilde;lvaro Herrera sent in a patch to add autovacuum work items for BRIN summarization.</p>

<p>Brandur Leach sent in another revision of a patch to add SortSupport for the macaddr type.</p>

<p>Rahila Syed sent in a patch to add support for default partition in declarative partitioning.</p>

<p>Peter Eisentraut sent in another revision of a patch to enable referring to functions without arguments when the name is unique.</p>

<p>Corey Huinker sent in three more revisions of a patch to implement \if and friends in psql.</p>

<p>Yugo Nagata and Amul Sul traded different implementations of patches to implement hash partitioning for declaratively partitioned tables.</p>

<p>Vinayak Pokale sent in a patch to add a progress checker for ANALYZE.</p>

<p>Oleg Bartunov sent in a patch to implement SQL/JSON.</p>

<p>Pavan Deolasee sent in a patch to skip all-visible pages during second HeapScan of CREATE INDEX CONCURRENTLY.</p>

<p>Andres Freund sent in a patch to make simplehash.h grow hashtable in additional cases.</p>

<p>Dilip Kumar and Robert Haas traded patches to implement parallel merge join.</p>

<p>Lucas Fitti sent in a patch to use $ parameters as replacement characters for pg_stat_statements.</p>

<p>Jan Mich&Atilde;&iexcl;lek sent in two more revisions of a patch to implement markdown, rst and mediawiki output formats in psql.</p>

<p>Andreas Karlsson sent in another revision of a patch to implement REINDEX CONCURRENTLY.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add covering + unique indexes.</p>

<p>&Atilde;lvaro Herrera sent in another revision of a patch to improve BRIN cost estimates.</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in a patch to address all the ## no critic annotations except RequireFilenameMatchesPackage.</p>

<p>David Rowley sent in a patch to improve performance of replay of AccessExclusiveLock.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to improve partition-wise join between declaratively partitioned tables.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two more revisions of a patch to implement SCRAM authentication.</p>

<p>&Atilde;lvaro Herrera sent in another revision of a patch to optimize memory allocation in the 'bringetbitmap' function.</p>

<p>Tomas Vondra sent in two more revisions of a patch to implement extended statistics, formerly multivariate statistics.</p>

<p>Jim Mlodgenski sent in two revisions of a patch to track stats for materialized views.</p>

<p>Thomas Munro sent in another revision of a patch to measure replay lag.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to reserve global xmin for create slot snasphot export, not use on disk snapshots for snapshot export in logical decoding, prevent snapshot builder xmin from going backwards, fix xl_running_xacts usage in snapshot builder, and skip unnecessary snapshot builds.</p>

<p>Amit Langote sent in another revision of a patch to improve the documents for partitioning.</p>

<p>Ronan Dunklau sent in a patch to fix mergeappend costsort estimates.</p>

<p>Masahiko Sawada sent in a patch to implement 2PC in ECPG.</p>

<p>Rushabh Lathia sent in a patch to print the correct startup cost for the group aggregate.</p>

<p>&Atilde;lvaro Herrera and Pavel St&Auml;&rsaquo;hule traded patches to implement xmltable().</p>

<p>Kyotaro HORIGUCHI sent in a patch to remove NamedLWLockTrancheArray.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to reorder the asynchronous libpq calls for replication connection.</p>

<p>Tomas Vondra sent in another revision of a patch to add page_checksum and bt_page_items(bytea).</p>

<p>Ashutosh Sharma sent in another revision of a patch to fix an issue where parallel seq. plan was not coming against inheritance or partition table.</p>

<p>David Rowley sent in a patch to fix an issue where foreign join pushdowns not working properly for outer joins.</p>