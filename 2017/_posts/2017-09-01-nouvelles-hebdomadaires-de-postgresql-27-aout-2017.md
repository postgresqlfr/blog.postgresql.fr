---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 août 2017"
author: "NBougain"
redirect_from: "index.php?post/2017-09-01-nouvelles-hebdomadaires-de-postgresql-27-aout-2017 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Noah Misch pushed:</p>

<ul>

<li>Inject $(ICU_LIBS) regardless of platform. It appeared in a conditional that excludes AIX, Cygwin and MinGW. Give ICU support a chance to work on those platforms. Back-patch to v10, where ICU support was introduced. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/66ed3829df959adb47f71d7c903ac59f0670f3e1">https://git.postgresql.org/pg/commitdiff/66ed3829df959adb47f71d7c903ac59f0670f3e1</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>pg_prewarm: Add automatic prewarm feature. Periodically while the server is running, and at shutdown, write out a list of blocks in shared buffers. When the server reaches consistency -- unfortunatey, we can't do it before that point without breaking things -- reload those blocks into any still-unused shared buffers. Mithun Cy and Robert Haas, reviewed and tested by Beena Emerson, Amit Kapila, Jim Nasby, and Rafia Sabih. Discussion: <a target="_blank" href="http://postgr.es/m/CAD__OugubOs1Vy7kgF6xTjmEqTR4CrGAv8w+ZbaY_+MZeitukw@mail.gmail.com">http://postgr.es/m/CAD__OugubOs1Vy7kgF6xTjmEqTR4CrGAv8w+ZbaY_+MZeitukw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/79ccd7cbd5ca44bee0191d12e9e65abf702899e7">https://git.postgresql.org/pg/commitdiff/79ccd7cbd5ca44bee0191d12e9e65abf702899e7</a></li>

<li>Push limit through subqueries to underlying sort, where possible. Douglas Doole, reviewed by Ashutosh Bapat and by me. Minor formatting change by me. Discussion: <a target="_blank" href="http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com">http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1f6d515a67ec98194c23a5db25660856c9aab944">https://git.postgresql.org/pg/commitdiff/1f6d515a67ec98194c23a5db25660856c9aab944</a></li>

<li>Improve low-level backup documentation. Our documentation hasn't really caught up with the fact that non-exclusive backups can now be taken using pg_start_backup and pg_stop_backup even on standbys. Update, also correcting some errors introduced by 52f8a59dd953c6820baf153e97cf07d31b8ac1d6. Updates to the 9.6 documentation are needed as well, but that will need a separate patch as some things are different on that version. David Steele, reviewed by Robert Haas and Michael Paquier Discussion: <a target="_blank" href="http://postgr.es/m/d4d951b9-89c0-6bc1-b6ff-d0b2dd5a8966@pgmasters.net">http://postgr.es/m/d4d951b9-89c0-6bc1-b6ff-d0b2dd5a8966@pgmasters.net</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/449338cc644be6035d05afb6b60f536adfd99b3e">https://git.postgresql.org/pg/commitdiff/449338cc644be6035d05afb6b60f536adfd99b3e</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Expand set of predefined ICU locales. Install language+region combinations even if they are not distinct from the language's base locale. This gives better long-term stability of the set of predefined locales and makes the predefined locales less implementation-dependent and more practical for users. Reviewed-by: Peter Geoghegan &lt;pg@bowt.ie&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/51e225da306e14616b690308a59fd89e22335035">https://git.postgresql.org/pg/commitdiff/51e225da306e14616b690308a59fd89e22335035</a></li>

<li>Don't install ICU collation keyword variants. Users can still create them themselves. Instead, document Unicode TR 35 collation options for ICU, so users can create all this themselves. Reviewed-by: Peter Geoghegan &lt;pg@bowt.ie&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2bfd1b1ee562c4e4fd065c7f7d1beaa9b9852070">https://git.postgresql.org/pg/commitdiff/2bfd1b1ee562c4e4fd065c7f7d1beaa9b9852070</a></li>

<li>doc: Mention identity column feature in section on serial. Reported-by: Basil Bourque &lt;basil.bourque@pobox.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b5664cfd4c17eb69e6d7356ce670cc4a98074d13">https://git.postgresql.org/pg/commitdiff/b5664cfd4c17eb69e6d7356ce670cc4a98074d13</a></li>

<li>pg_upgrade: Message translatability and style fixes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7e046e6e8a33f8a7ef641b9539376cf939993105">https://git.postgresql.org/pg/commitdiff/7e046e6e8a33f8a7ef641b9539376cf939993105</a></li>

<li>Fix translation marker. This was erroneously removed in 55a70a023c3daefca9bbd68bfbe6862af10ab479. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/580ddcec3943216b281c56e3c7fc933fdcf850f4">https://git.postgresql.org/pg/commitdiff/580ddcec3943216b281c56e3c7fc933fdcf850f4</a></li>

<li>Tweak some SCRAM error messages and code comments. Clarify/correct some error messages, fix up some code comments that confused SASL and SCRAM, and other minor fixes. No changes in functionality. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/85f4d6393da2ed2ad3ec4912a60a918348784c2b">https://git.postgresql.org/pg/commitdiff/85f4d6393da2ed2ad3ec4912a60a918348784c2b</a></li>

<li>Fix outdated comment. Author: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1e1b01cd1632a7d768fb8c86c95cf3ec82dc58da">https://git.postgresql.org/pg/commitdiff/1e1b01cd1632a7d768fb8c86c95cf3ec82dc58da</a></li>

<li>Update code comment for temporary replication slots. Reported-by: Alvaro Herrera &lt;alvherre@2ndquadrant.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6d242ee980193f29618aa899eb61f67a953bd712">https://git.postgresql.org/pg/commitdiff/6d242ee980193f29618aa899eb61f67a953bd712</a></li>

<li>Fix up secondary expected files. for commit 237a0b87b1dc90f8789aa5441a2a11e67f46c96e <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/27b89876c0fb08faa17768c68101186cda2e4bef">https://git.postgresql.org/pg/commitdiff/27b89876c0fb08faa17768c68101186cda2e4bef</a></li>

<li>Improve plural handling in error message. This does not use the normal plural handling, because no numbers appear in the actual message. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/237a0b87b1dc90f8789aa5441a2a11e67f46c96e">https://git.postgresql.org/pg/commitdiff/237a0b87b1dc90f8789aa5441a2a11e67f46c96e</a></li>

<li>Increase SCRAM salt length. The original value 12 was set based on RFC 5802 for SCRAM-SHA-1, but RFC 7677 for SCRAM-SHA-256 uses 16, so use that. (This does not affect the validity of already stored verifiers.) Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/12cc9297-7e05-932f-d863-765e5626ead4%402ndquadrant.com">https://www.postgresql.org/message-id/flat/12cc9297-7e05-932f-d863-765e5626ead4%402ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fe7774144d5c3f3a2941a2ca51e61352e4005991">https://git.postgresql.org/pg/commitdiff/fe7774144d5c3f3a2941a2ca51e61352e4005991</a></li>

<li>pg_upgrade: Remove dead code. Remove code meant for upgrading to a particular version of PostgreSQL 9.0. Since pg_upgrade only supports upgrading to the current major version, this code is no longer useful. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6ce6a61840cc90172ad3da7bf303656132fa5fab">https://git.postgresql.org/pg/commitdiff/6ce6a61840cc90172ad3da7bf303656132fa5fab</a></li>

<li>Message translatability fixes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e86ac70d6ef12d8639885fcdb238fdaabec80aa7">https://git.postgresql.org/pg/commitdiff/e86ac70d6ef12d8639885fcdb238fdaabec80aa7</a></li>

<li>pg_upgrade: Remove more dead code. related to 6ce6a61840cc90172ad3da7bf303656132fa5fab Reported-by: Christoph Berg &lt;myon@debian.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/99ce446ada332fd8879fcdbded9daa891595f089">https://git.postgresql.org/pg/commitdiff/99ce446ada332fd8879fcdbded9daa891595f089</a></li>

<li>pg_test_timing: Some NLS fixes. The string "% of total" was marked by xgettext to be a c-format, but it is actually not, so mark up the source to prevent that. Compute the column widths of the final display dynamically based on the translated strings, so that translations don't mess up the display accidentally. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2073c641b43e1310784dc40aef32f71119313bdc">https://git.postgresql.org/pg/commitdiff/2073c641b43e1310784dc40aef32f71119313bdc</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Refactor typcache.c's record typmod hash table. Previously, tuple descriptors were stored in chains keyed by a fixed size array of OIDs. That meant there were effectively two levels of collision chain -- one inside and one outside the hash table. Instead, let dynahash.c look after conflicts for us by supplying a proper hash and equal function pair. This is a nice cleanup on its own, but also simplifies followup changes allowing blessed TupleDescs to be shared between backends participating in parallel query. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D34GVhOL%2BarUx56yx7OPk7%3DqpGsv3CpO54feqjAwQKm5g%40mail.gmail.com">https://postgr.es/m/CAEepm%3D34GVhOL%2BarUx56yx7OPk7%3DqpGsv3CpO54feqjAwQKm5g%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/35ea75632a56ca8ef22aa8fed03b9dabb9c8c575">https://git.postgresql.org/pg/commitdiff/35ea75632a56ca8ef22aa8fed03b9dabb9c8c575</a></li>

<li>Add a hash_combine function for mixing hash values. This hash function is derived from Boost's function of the same name. Author: Andres Freund, Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D3rdgjfxW4cKvJ0OEmya2-34B0qHNG1xV0vK7TGPJGMUQ%40mail.gmail.com">https://postgr.es/m/CAEepm%3D3rdgjfxW4cKvJ0OEmya2-34B0qHNG1xV0vK7TGPJGMUQ%40mail.gmail.com</a> Discussion: <a target="_blank" href="https://postgr.es/m/20170731210844.3cwrkmsmbbpt4rjc%40alap3.anarazel.de">https://postgr.es/m/20170731210844.3cwrkmsmbbpt4rjc%40alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0052a0243d9c979a06ef273af965508103c456e0">https://git.postgresql.org/pg/commitdiff/0052a0243d9c979a06ef273af965508103c456e0</a></li>

<li>Hash tables backed by DSA shared memory. Add general purpose chaining hash tables for DSA memory. Unlike DynaHash in shared memory mode, these hash tables can grow as required, and cope with being mapped into different addresses in different backends. There is a wide range of potential users for such a hash table, though it's very likely the interface will need to evolve as we come to understand the needs of different kinds of users. E.g support for iterators and incremental resizing is planned for later commits and the details of the callback signatures are likely to change. Author: Thomas Munro Reviewed-By: John Gorman, Andres Freund, Dilip Kumar, Robert Haas Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=3d8o8XdVwYT6O=bHKsKAM2pu2D6sV1S_=4d+jStVCE7w@mail.gmail.com">https://postgr.es/m/CAEepm=3d8o8XdVwYT6O=bHKsKAM2pu2D6sV1S_=4d+jStVCE7w@mail.gmail.com</a> <a target="_blank" href="https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com">https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8c0d7bafad36434cb08ac2c78e69ae72c194ca20">https://git.postgresql.org/pg/commitdiff/8c0d7bafad36434cb08ac2c78e69ae72c194ca20</a></li>

<li>Fix harmless thinko in dsa.c. Commit 16be2fd100199bdf284becfcee02c5eb20d8a11d added DSA_ALLOC_HUGE, DSA_ALLOC_ZERO and DSA_ALLOC_NO_OOM which have the same numerical values and meanings as the similarly named MCXT_... macros. In one place we accidentally used MCXT_ALLOC_NO_OOM when DSA_ALLOC_NO_OOM is wanted, so tidy that up. Author: Thomas Munro Discussion: <a target="_blank" href="http://postgr.es/m/CAEepm=2AimHxVkkxnMfQvbZMkXy0uKbVa0-D38c5-qwrCm4CMQ@mail.gmail.com">http://postgr.es/m/CAEepm=2AimHxVkkxnMfQvbZMkXy0uKbVa0-D38c5-qwrCm4CMQ@mail.gmail.com</a> Backpatch: 10, where dsa was introduced. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/20fbf25533763c8c78c9c668b718d831236fb111">https://git.postgresql.org/pg/commitdiff/20fbf25533763c8c78c9c668b718d831236fb111</a></li>

<li>Add minimal regression test for blessed record type transfer. Test that blessed records can be transferred through a TupleQueue and correctly decoded by another backend. While touching the file, make sure that force_parallel_mode settings only cover relevant tests. Author: Thomas Munro, editorialized by Andres Freund Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de">https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d36f7efb39e1b9613193b2e12717dbe2418ddae5">https://git.postgresql.org/pg/commitdiff/d36f7efb39e1b9613193b2e12717dbe2418ddae5</a></li>

<li>Fix unlikely shared memory leak after failure in dshash_create(). Tidy-up for commit 8c0d7bafad36434cb08ac2c78e69ae72c194ca20, based on a complaint from Andres Freund. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de">https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4569715bd6faa4c43e489a7069ab7abca68ff663">https://git.postgresql.org/pg/commitdiff/4569715bd6faa4c43e489a7069ab7abca68ff663</a></li>

<li>Consolidate the function pointer types used by dshash.c. Commit 8c0d7bafad36434cb08ac2c78e69ae72c194ca20 introduced dshash with hash and compare functions like DynaHash's, and also variants that take a user data pointer instead of size. Simplify the interface by merging them into a single pair of function pointer types that take both size and a user data pointer. Since it is anticipated that memcmp and tag_hash behavior will be a common requirement, provide wrapper functions dshash_memcmp and dshash_memhash that conform to the new function types. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de">https://postgr.es/m/20170823054644.efuzftxjpfi6wwqs%40alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d7694fc148707cd8335d9ccfde9f4c17290189db">https://git.postgresql.org/pg/commitdiff/d7694fc148707cd8335d9ccfde9f4c17290189db</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Make new regression test case parallel-safe, and improve its output. The test case added by commit 1f6d515a6 fails on buildfarm members that have force_parallel_mode turned on, because we currently don't report sort performance details from worker processes back to the master. To fix that, just make the test table be temp rather than regular; that's a good idea anyway to forestall any possible interference from auto-analyze. (The restriction that workers can't access temp tables might go away someday, but almost certainly not before the other thing gets fixed.) Also, improve the test so that we retain as much as possible of the EXPLAIN ANALYZE output. This aids debugging failures, and might also expose problems that the preceding version masked. Discussion: <a target="_blank" href="http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com">http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1177ab1dabf72bafee8f19d904cee3a299f25892">https://git.postgresql.org/pg/commitdiff/1177ab1dabf72bafee8f19d904cee3a299f25892</a></li>

<li>Code review for pushing LIMIT through subqueries. Minor improvements for commit 1f6d515a6. We do not need the (rather expensive) test for SRFs in the targetlist, because since v10 any such SRFs would appear in separate ProjectSet nodes. Also, make the code look more like the existing cases by turning it into a simple recursion --- the argument that there might be some performance benefit to contorting the code seems unfounded to me, especially since any good compiler should turn the tail-recursion into iteration anyway. Discussion: <a target="_blank" href="http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com">http://postgr.es/m/CADE5jYLuugnEEUsyW6Q_4mZFYTxHxaVCQmGAsF0yiY8ZDggi-w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3f4c7917b3bc8b421c0c85cb9995974c55e7232b">https://git.postgresql.org/pg/commitdiff/3f4c7917b3bc8b421c0c85cb9995974c55e7232b</a></li>

<li>Fix locale dependency in new ecpg test case. Force sorting in "C" locale so that the output ordering doesn't vary, per buildfarm. In passing, add missing .gitignore entries. Discussion: <a target="_blank" href="https://postgr.es/m/0975f4bb-5dee-c33c-b719-3ce44026d397@chrullrich.net">https://postgr.es/m/0975f4bb-5dee-c33c-b719-3ce44026d397@chrullrich.net</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/aae62278e167623bfac9fd50d1242d8e72208b0c">https://git.postgresql.org/pg/commitdiff/aae62278e167623bfac9fd50d1242d8e72208b0c</a></li>

<li>First-draft release notes for 9.6.5. As usual, the release notes for other branches will be made by cutting these down, but put them up for community review first. Note the first entry is only for 9.4. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f1b10496a55a64b2872633850e55a2cd9d1c9108">https://git.postgresql.org/pg/commitdiff/f1b10496a55a64b2872633850e55a2cd9d1c9108</a></li>

<li>Doc: update v10 release notes through today. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6a5366e69acf9ae04988488f1e365705ff591d65">https://git.postgresql.org/pg/commitdiff/6a5366e69acf9ae04988488f1e365705ff591d65</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>psql: Fix \gx when FETCH_COUNT is used. Set expanded output when requested through \gx in ExecQueryUsingCursor() (used when FETCH_COUNT is set). Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CB7A53AA-5645-4BDD-AB07-4D22CD9D8FF1%40gmx.net">https://www.postgresql.org/message-id/CB7A53AA-5645-4BDD-AB07-4D22CD9D8FF1%40gmx.net</a> Author: Tobias Bussmann <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0cdc3e47bea442643c9870dc419364b9f2f52dcb">https://git.postgresql.org/pg/commitdiff/0cdc3e47bea442643c9870dc419364b9f2f52dcb</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Implement DO CONTINUE action for ECPG WHENEVER statement. Author: Vinayak Pokale Reviewed-By: Masahiko Sawada <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d22e9d530516f7c9c56d00eff53cf19e45ef348c">https://git.postgresql.org/pg/commitdiff/d22e9d530516f7c9c56d00eff53cf19e45ef348c</a></li>

<li>Make setlocale in ECPG test cases thread aware on Windows. Fix threaded test cases on Windows not to crash in setlocale() which can be global or local to a thread on Windows. Author: Christian Ullrich <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a772624b1d6b47ac00384901e1753f1d34b0cd10">https://git.postgresql.org/pg/commitdiff/a772624b1d6b47ac00384901e1753f1d34b0cd10</a></li>

<li>Changed order of statements and added an additiona MSVC safeguard to make ecpg. thread test cases work on Windows. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/04fbe0e4516d26de9420637f6fc90041e574b4b0">https://git.postgresql.org/pg/commitdiff/04fbe0e4516d26de9420637f6fc90041e574b4b0</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Markus Sintonen sent in a patch to add pattern based listeners for asynchronous messaging (LISTEN/NOTIFY).</p>

<p>Haribabu Kommi sent in another revision of a patch to refactor handling of database attributes between pg_dump and pg_dumpall.</p>

<p>Ashutosh Bapat sent in another revision of a patch to implement partition-wise join for join between (declaratively) partitioned tables.</p>

<p>Ashutosh Bapat sent in a patch to implement an advanced partition matching algorithm for partition-wise join.</p>

<p>Feike Steenbergen sent in a patch to document pgstattuple privileges without ambiguity.</p>

<p>Jeevan Ladhe sent in another revision of a patch to add support for default partitions in declarative partitioning.</p>

<p>Etsuro Fujita sent in another revision of a patch to add an epqpath for foreign join.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to refactor the routine to test connections to the SSL server, support channel binding 'tls-unique' in SCRAM, add connection parameters "saslname" and "saslchannelbinding", and implement channel binding tls-server-end-point for SCRAM.</p>

<p>Alexander Kuzmenkov sent in another revision of a patch to add index-only count(*) for indexes supporting bitmap scans.</p>

<p>Amit Langote sent in a patch to add some infrastructure to be used in a system that prunes partitions more effectively than the current constraint exclusion system does.</p>

<p>Mark Rofail sent in two more revisions of a patch to add foreign key arrays.</p>

<p>Amit Kapila sent in another revision of a patch to ensure that parallel paths include tlist cost.</p>

<p>Amit Langote sent in another revision of a patch to decouple RelationGetPartitionDispatchInfo() from executor and teach expand_inherited_rtentry to use partition bound order.</p>

<p>Amul Sul sent in another revision of a patch to add an optional second hash procedure and test the hash functions.</p>

<p>Yura Sokolov sent in another revision of a patch to make a hash table for xip in XidInMVCCSnapshot.</p>

<p>Alik Khilazhev sent in another revision of a patch to add a Zipfian distribution to pgbench.</p>

<p>Peter Eisentraut sent in another revision of a patch to improve coverage analysis.</p>

<p>Beena Emerson sent in a patch to remove the for_default flag from the get_qual_for_range function.</p>

<p>Jeevan Ladhe sent in another revision of a patch to refactor RelationBuildPartitionDesc() and add support for default partition for range.</p>

<p>Ashutosh Sharma and Amit Kapila traded patches to rewrite hash index scan to work page at a time, remove redundant hash function _hash_step and do some code cleanup, and improve locking startegy during VACUUM in Hash Index for regular tables.</p>

<p>Peter Eisentraut sent in a patch to add compiler hints to PLy_elog() and fix the remaining scan-build warnings for PL/PythonU.</p>

<p>Beena Emerson sent in another revision of a patch to add a XLogSegmentOffset macro, make an initdb-configurable WAL segment size, and modify the xlog macros to take this into account.</p>

<p>Jeevan Chalke sent in a patch to implement partition-wise aggregation/grouping.</p>

<p>Thomas Munro sent in three more revisions of a patch to share typmods among backends.</p>

<p>Pavel St&#283;hule sent in a patch to add \graw to psql.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench TAP tests.</p>

<p>Adrien Nayrat sent in a patch to auto_explain in order to log queries with wrong estimation.</p>

<p>Peter Eisentraut sent in a patch to add a max_worker_processes_per_user setting.</p>

<p>Robert Haas and Tom Lane traded patches to push limit to sort through a subquery.</p>

<p>Nathan Bossart sent in another revision of a patch to allow users to specify multiple tables in VACUUM commands.</p>

<p>Simone Gotti sent in a patch to fix drop replication slot blocking instead of returning an error.</p>

<p>Masahiko Sawada sent in another revision of a patch to add custom initialization to pgbench.</p>

<p>Jing Wang sent in a patch to support to COMMENT ON DATABASE CURRENT_DATABASE and friends.</p>

<p>Antonin Houska sent in a patch to allow extensions to write log messages to a separate file.</p>

<p>Alexander Kuzmenkov sent in another revision of a patch to enable full merge join on comparison clause.</p>

<p>Haribabu Kommi sent in another revision of a patch to add Visual Studio 2017 build support.</p>

<p>Yang Jie sent in a patch to enable hash partitioning.</p>

<p>Fabien COELHO sent in two revisions of a patch to enable psql to discover whether a variable exists.</p>

<p>Jeff Janes sent in another revision of a patch to change WAL writer wakeup.</p>

<p>Fabien COELHO sent in two more revisions of a patch to add SERVER_VERSION_NUMBER to psql.</p>

<p>Jeff Janes sent in a patch to pgbench to make a faster version of tpcb-like transactions.</p>

<p>Petr Jel&iacute;nek sent in a patch to fix a race condition in the logical decoding TAP test.</p>