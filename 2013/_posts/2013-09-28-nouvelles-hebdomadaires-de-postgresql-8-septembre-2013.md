---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 septembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-09-28-nouvelles-hebdomadaires-de-postgresql-8-septembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a007fa1ebf1da54b09963be565c122b1b938126">http://git.postgresql.org/pg/commitdiff/6a007fa1ebf1da54b09963be565c122b1b938126</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix relfrozenxid query in docs to include TOAST tables. The original query ignored TOAST tables which could result in tables needing a vacuum not being reported. Backpatch to all live branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f002dc3d4d6600a4095daf83a9584f19d0bd5844">http://git.postgresql.org/pg/commitdiff/f002dc3d4d6600a4095daf83a9584f19d0bd5844</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2013d. DST law changes in Israel, Morocco, Palestine, Paraguay. Historical corrections for Macquarie Island. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79daaa3e812c7600ef30ef3e6ba5e75cab18f212">http://git.postgresql.org/pg/commitdiff/79daaa3e812c7600ef30ef3e6ba5e75cab18f212</a></li>

<li>Docs: wording improvements in discussion of timestamp arithmetic. I started out just to fix the broken markup in commit 1c2085766187031eaeaae7db4785b9e1d4241988, but got distracted by copy-editing. I see Bruce already fixed the markup, but I'll commit the wordsmithing anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7489eb4d3b7fef2c2eaeb66e3bcb3fb74385b44d">http://git.postgresql.org/pg/commitdiff/7489eb4d3b7fef2c2eaeb66e3bcb3fb74385b44d</a></li>

<li>Don't fail for bad GUCs in CREATE FUNCTION with check_function_bodies off. The previous coding attempted to activate all the GUC settings specified in SET clauses, so that the function validator could operate in the GUC environment expected by the function body. However, this is problematic when restoring a dump, since the SET clauses might refer to database objects that don't exist yet. We already have the parameter check_function_bodies that's meant to prevent forward references in function definitions from breaking dumps, so let's change CREATE FUNCTION to not install the SET values if check_function_bodies is off. Authors of function validators were already advised not to make any "context sensitive" checks when check_function_bodies is off, if indeed they're checking anything at all in that mode. But extend the documentation to point out the GUC issue in particular. (Note that we still check the SET clauses to some extent; the behavior with !check_function_bodies is now approximately equivalent to what ALTER DATABASE/ROLE have been doing for awhile with context-dependent GUCs.) This problem can be demonstrated in all active branches, so back-patch all the way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/546f7c2e38531469eb3cff62256fde8606330c67">http://git.postgresql.org/pg/commitdiff/546f7c2e38531469eb3cff62256fde8606330c67</a></li>

<li>Allow aggregate functions to be VARIADIC. There's no inherent reason why an aggregate function can't be variadic (even VARIADIC ANY) if its transition function can handle the case. Indeed, this patch to add the feature touches none of the planner or executor, and little of the parser; the main missing stuff was DDL and pg_dump support. It is true that variadic aggregates can create the same sort of ambiguity about parameters versus ORDER BY keys that was complained of when we (briefly) had both one- and two-argument forms of string_agg(). However, the policy formed in response to that discussion only said that we'd not create any built-in aggregates with varying numbers of arguments, not that we shouldn't allow users to do it. So the logical extension of that is we can allow users to make variadic aggregates as long as we're wary about shipping any such in core. In passing, this patch allows aggregate function arguments to be named, to the extent of remembering the names in pg_proc and dumping them in pg_dump. You can't yet call an aggregate using named-parameter notation. That seems like a likely future extension, but it'll take some work, and it's not what this patch is really about. Likewise, there's still some work needed to make window functions handle VARIADIC fully, but I left that for another day. initdb forced because of new aggvariadic field in Aggref parse nodes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d3f4406dfa00d848711fdb4af53be663ffc7d0f">http://git.postgresql.org/pg/commitdiff/0d3f4406dfa00d848711fdb4af53be663ffc7d0f</a></li>

<li>Update comments concerning PGC_S_TEST. This GUC context value was once only used by ALTER DATABASE SET and ALTER USER SET. That's not true anymore, though, so rewrite the comments to be a bit more general. Patch in HEAD only, since this is just an internal documentation issue. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c66a223774dec62edb5281a47e72fe480a8f7aa">http://git.postgresql.org/pg/commitdiff/0c66a223774dec62edb5281a47e72fe480a8f7aa</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. Also line-wrap an over-wide line in a comment that's ignored by pgindent. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a93bdfc711399716328ce0811d600411b1314306">http://git.postgresql.org/pg/commitdiff/a93bdfc711399716328ce0811d600411b1314306</a></li>

<li>Keep heavily-contended fields in XLogCtlInsert on different cache lines. Performance testing shows that if the insertpos_lck spinlock and the fields that it protects are on the same cache line with other variables that are frequently accessed, the false sharing can hurt performance a lot. Keep them apart by adding some padding. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/375d8526f2900d0c377f44532f6d09ee06531f67">http://git.postgresql.org/pg/commitdiff/375d8526f2900d0c377f44532f6d09ee06531f67</a></li>

<li>Make catalog cache hash tables resizeable. If the hash table backing a catalog cache becomes too full (fillfactor &gt; 2), enlarge it. A new buckets array, double the size of the old, is allocated, and all entries in the old hash are moved to the right bucket in the new hash. This has two benefits. First, cache lookups don't get so expensive when there are lots of entries in a cache, like if you access hundreds of thousands of tables. Second, we can make the (initial) sizes of the caches much smaller, which saves memory. This patch dials down the initial sizes of the catcaches. The new sizes are chosen so that a backend that only runs a few basic queries still won't need to enlarge any of them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20cb18db4668b016748fbb5fcb1422bc3e0d52d1">http://git.postgresql.org/pg/commitdiff/20cb18db4668b016748fbb5fcb1422bc3e0d52d1</a></li>

</ul>

<p>Gregory Stark a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in worker_spi, count(*) returns a bigint. Thanks RhodiumToad 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfa1cd711c2648e0beab50448c5a71ef91a3e1cb">http://git.postgresql.org/pg/commitdiff/cfa1cd711c2648e0beab50448c5a71ef91a3e1cb</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>docs: Clarify that we also support Solaris versions greater than 10. MauMau 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d323bda2ede5d4e42fdc6934188dd7a76a04d54">http://git.postgresql.org/pg/commitdiff/9d323bda2ede5d4e42fdc6934188dd7a76a04d54</a></li>

<li>Expose fsync_fname as a public API. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc52d5b33ff5df29de57dcae9322214cfe9c8464">http://git.postgresql.org/pg/commitdiff/cc52d5b33ff5df29de57dcae9322214cfe9c8464</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Docs: add paragraph about date/timestamp subtraction. per suggestion from Francisco Olart 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c2085766187031eaeaae7db4785b9e1d4241988">http://git.postgresql.org/pg/commitdiff/1c2085766187031eaeaae7db4785b9e1d4241988</a></li>

<li>doc: Fix SGML markup for date patch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b642bc55fa869160ba8d1b63dacf99e43fdadbb1">http://git.postgresql.org/pg/commitdiff/b642bc55fa869160ba8d1b63dacf99e43fdadbb1</a></li>

<li>Remove dead URL mention in OSX startup script. Backpatch to 9.3. Per suggestion from Gavan Schneider 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66d85c5356ac32d1bf1fe13ea36ef81e21de82c2">http://git.postgresql.org/pg/commitdiff/66d85c5356ac32d1bf1fe13ea36ef81e21de82c2</a></li>

<li>Add GUC descriptions for compile-time postgresql.conf settings. Previous text was "No description available". Tianyin Xu 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5c2f5a8f6645a7da720a5f24efdbe8a1183a06c">http://git.postgresql.org/pg/commitdiff/f5c2f5a8f6645a7da720a5f24efdbe8a1183a06c</a></li>

<li>intarray: return empty zero-dimensional array for an empty array. Previously a one-dimensional empty array was returned, but its text representation matched a zero-dimensional array, and there is no way to dump/reload a one-dimensional empty array. BACKWARD INCOMPATIBILITY. Per report from Elein Mustain. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c155f654b4f755b4111bd9adb60559fe22526a10">http://git.postgresql.org/pg/commitdiff/c155f654b4f755b4111bd9adb60559fe22526a10</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update obsolete comment 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b290f3115db5bbe85176160c7cabe0d927dcc37">http://git.postgresql.org/pg/commitdiff/8b290f3115db5bbe85176160c7cabe0d927dcc37</a></li>

</ul>

<p>Jeff Davis a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert WAL posix_fallocate() patches. This reverts commit 269e780822abb2e44189afaccd6b0ee7aefa7ddd and commit 5b571bb8c8d2bea610e01ae1ee7bc05adcfff528. Unfortunately, the initial patch had insufficient performance testing, and resulted in a regression. Per report by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1892aaeaaf34d8d1637221fc1cbda82ac3fcd71">http://git.postgresql.org/pg/commitdiff/b1892aaeaaf34d8d1637221fc1cbda82ac3fcd71</a></li>

<li>Improve Range Types and Exclusion Constraints example. Make the examples self-contained to avoid confusion. Per bug report 8367 from KOIZUMI Satoru. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be6fcb671e4291654391fba475f4b555d2da74f3">http://git.postgresql.org/pg/commitdiff/be6fcb671e4291654391fba475f4b555d2da74f3</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Eliminate pg_rewrite.ev_attr column and related dead code. Commit 95ef6a344821655ce4d0a74999ac49dd6af6d342 removed the ability to create rules on an individual column as of 7.3, but left some residual code which has since been useless. This cleans up that dead code without any change in behavior other than dropping the useless column from the catalog. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/277607d600fb71e25082b94302ca1716403cd0bc">http://git.postgresql.org/pg/commitdiff/277607d600fb71e25082b94302ca1716403cd0bc</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't VALGRIND_PRINTF() each query string. Doing so was helpful for some Valgrind usage and distracting for other usage. One can achieve the same effect by changing log_statement and pointing both PostgreSQL and Valgrind logging to stderr. Per gripe from Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8104730c8eae1f81ccbc8673bbd2a3566e660ae">http://git.postgresql.org/pg/commitdiff/b8104730c8eae1f81ccbc8673bbd2a3566e660ae</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Close file to no leak file descriptor memory. Found by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/579dae5bc0b87dfa53d0caa0ac57f0f5e739544f">http://git.postgresql.org/pg/commitdiff/579dae5bc0b87dfa53d0caa0ac57f0f5e739544f</a></li>

<li>Return error if allocation of new element was not possible. Found by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c68834bfc2ab6e782f56ee3dc7b4949857b8729">http://git.postgresql.org/pg/commitdiff/9c68834bfc2ab6e782f56ee3dc7b4949857b8729</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to add SEQUENCES to the possible arguments of DISCARD.</li>

<li>Dimitri Fontaine sent in another revision of a patch to implement extension templates.</li>

<li>Karl O. Pinc sent in another revision of a patch to clarify backup instructions and concepts in the documentation.</li>

<li>Maksym Boguk sent in a patch to add a national character type.</li>

<li>Cedric Villemain sent in a patch to fix the way PGXS works for certain extension builds.</li>

<li>Antonin Houska sent in another revision of a patch to allow throttling pg_basebackup.</li>

<li>Takayuki Tsunakawa sent in a patch to clarify the recovery documentation as it relates to preserving statistics.</li>

<li>Blake Smith sent in two more revisions of a patch intended to speed up queries which use a GIN index.</li>

<li>Bruce Momjian sent in two more revisions of a patch to fix some NULL handling.</li>

<li>Bruce Momjian sent in a patch to make a default effective_cache_size based on the shared_buffers setting.</li>

<li>Zoltan Boszormenyi sent in two more revisions of a patch to use readahead in ECPG FETCHes.</li>

<li>Pavel Stehule sent in another revision of a patch to improve NUMERIC performance.</li>

<li>Hari Babu sent in a patch to optimize WAL updates on systems with certain access profiles.</li>

<li>Andres Freund sent in another revision of a patch to speed up catalog cache lookups.</li>

<li>Andres Freund, as part of the infrastructure for logical change replication, sent in a pair of patches to: 1. Allow walsenders to connect to a specific database, and 2. Log xl_running_xact's at a higher frequency than checkpoints are done.</li>

<li>Andres Freund, as part of the infrastructure for logical change replication, sent in a patch to add information about a table's primary key to the RelationData struct.</li>

<li>Andres Freund, as part of the infrastructure for logical change replication, sent in a patch to introduce the concept and usage of InvalidCommandId.</li>

<li>Mitsumasa KONDO sent in a WIP patch to use the FALLOC_FL_KEEP_SIZE flag where appropriate.</li>

<li>KaiGai Kohei sent in a patch to create infrastructure for custom plan nodes.</li>

<li>Satoshi Nagayasu sent in another revision of a patch to add statistics tracking for dirty writes.</li>

<li>MauMau sent in a patch to set the codeset for libc catalog the same as postgres catalog to ensure that errors don't appear in the form '???', which is singularly unhelpful.</li>

<li>Bruce Momjian sent in a patch to correct the permissions used in information_schema.schemata.</li>

<li>Alexander Korotkov sent in two revisions of a patch to fix how picksplit works in the case of NaN values.</li>

</ul>