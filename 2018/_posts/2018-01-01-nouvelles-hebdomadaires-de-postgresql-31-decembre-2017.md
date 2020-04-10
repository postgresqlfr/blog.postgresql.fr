---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 décembre 2017"
author: "NBougain"
redirect_from: "index.php?post/2018-01-01-nouvelles-hebdomadaires-de-postgresql-31-decembre-2017 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Add polygon opclass for SP-GiST. Polygon opclass uses compress method feature of SP-GiST added earlier. For now it's a single operator class which uses this feature. SP-GiST actually indexes a bounding boxes of input polygons, so part of supported operations are lossy. Opclass uses most methods of corresponding opclass over boxes of SP-GiST and treats bounding boxes as point in 4D-space. Bump catalog version. Authors: Nikita Glukhov, Alexander Korotkov with minor editorization by me Reviewed-By: all authors + Darafei Praliaskouski Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/54907069.1030506@sigaev.ru">https://www.postgresql.org/message-id/flat/54907069.1030506@sigaev.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ff963b393ca93a71d2f398c4c584b322cd351c2c">https://git.postgresql.org/pg/commitdiff/ff963b393ca93a71d2f398c4c584b322cd351c2c</a></li>

<li>Update relation's stats in pg_class during vacuum full. Hash index depends on estimation of numbers of tuples and pages of relations, incorrect value could be a reason of significantly growing of index. Vacuum full recreates heap and reindex all indexes before renewal stats. The patch fixes that, so indexes will see correct values. Backpatch to v10 only because earlier versions haven't usable hash index and growing of hash index is a single user-visible symptom. Author: Amit Kapila Reviewed-by: Ashutosh Sharma, me Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/20171115232922.5tomkxnw3iq6jsg7@inml.weebeastie.net">https://www.postgresql.org/message-id/flat/20171115232922.5tomkxnw3iq6jsg7@inml.weebeastie.net</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ad337c76b6f454157982309089c3302fe77c9cbc">https://git.postgresql.org/pg/commitdiff/ad337c76b6f454157982309089c3302fe77c9cbc</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Add includes to make header files self-contained. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0689dc3a235a12c58910fba325f0150979d0c81f">https://git.postgresql.org/pg/commitdiff/0689dc3a235a12c58910fba325f0150979d0c81f</a></li>

<li>Add support for static assertions in C++. This allows modules written in C++ to use or include header files that use StaticAssertStmt() etc. Reviewed-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a2c8e5cfdb9d82ae6d4bb8f37a4dc7cbeca63ec1">https://git.postgresql.org/pg/commitdiff/a2c8e5cfdb9d82ae6d4bb8f37a4dc7cbeca63ec1</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix race-under-concurrency in PathNameCreateTemporaryDir. Thomas Munro Discussion: <a target="_blank" href="http://postgr.es/m/CAEepm=1Vp1e3KtftLtw4B60ZV9teNeKu6HxoaaBptQMsRWjJbQ@mail.gmail.com">http://postgr.es/m/CAEepm=1Vp1e3KtftLtw4B60ZV9teNeKu6HxoaaBptQMsRWjJbQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/62d02f39e72a2c030711a772f00f47f51262803c">https://git.postgresql.org/pg/commitdiff/62d02f39e72a2c030711a772f00f47f51262803c</a></li>

<li>Remove incorrect apostrophe. Etsuro Fujita Discussion: <a target="_blank" href="http://postgr.es/m/5A4393AA.8000708@lab.ntt.co.jp">http://postgr.es/m/5A4393AA.8000708@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b726eaa37a59d0cae0be56457c9522db7288255d">https://git.postgresql.org/pg/commitdiff/b726eaa37a59d0cae0be56457c9522db7288255d</a></li>

<li>Add pow(), aka power(), function to pgbench. Ra&#65533;l Mar&#65533;n Rodr&#65533;guez, reviewed by Fabien Coelho and Michael Paquier, with a minor fix by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAM6_UM4XiA14y9HnDqu9kAAOtwMhHZxW--q_ZACZW9Hsrsf-tg@mail.gmail.com">http://postgr.es/m/CAM6_UM4XiA14y9HnDqu9kAAOtwMhHZxW--q_ZACZW9Hsrsf-tg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7a727c180aa3c3baba12957d4cbec7b022ba4be5">https://git.postgresql.org/pg/commitdiff/7a727c180aa3c3baba12957d4cbec7b022ba4be5</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Protect against hypothetical memory leaks in RelationGetPartitionKey. Also, fix a comment that commit 8a0596cb656e made obsolete. Reported-by: Robert Haas Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYbpuUUUp2GhYNwWm0qkah39spiU7uOiNXLz20ASfKYoA@mail.gmail.com">http://postgr.es/m/CA+TgmoYbpuUUUp2GhYNwWm0qkah39spiU7uOiNXLz20ASfKYoA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/be2343221fb74bde6b7445feeef32f7ea5cf2618">https://git.postgresql.org/pg/commitdiff/be2343221fb74bde6b7445feeef32f7ea5cf2618</a></li>

<li>Fix typo. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5303ffe71b4d28663e0881199bb1a5ea26217ce4">https://git.postgresql.org/pg/commitdiff/5303ffe71b4d28663e0881199bb1a5ea26217ce4</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix rare assertion failure in parallel hash join. When a backend runs out of inner tuples to hash, it should detach from grow_batch_barrier only after it has flushed all batches to disk and merged counters, not before. Otherwise a concurrent backend in ExecParallelHashIncreaseNumBatches() could stop waiting for this backend and try to read tuples before they have been written. This commit reorders those operations and should fix the assertion failures seen occasionally on the build farm since commit 1804284042e659e7d16904e7bbb0ad546394b6a3. Author: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/E1eRwXy-0004IK-TO%40gemulon.postgresql.org">https://postgr.es/m/E1eRwXy-0004IK-TO%40gemulon.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f83040c62a78e784e6e33a6382a55925bfd66634">https://git.postgresql.org/pg/commitdiff/f83040c62a78e784e6e33a6382a55925bfd66634</a></li>

<li>Rely on executor utils to build targetlist for DML RETURNING. This is useful because it gets rid of the sole direct user of ExecAssignResultType(). A future commit will likely make use of that and combine creating the targetlist with the initialization of the result slot. But it seems like good code hygiene anyway. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170901064131.tazjxwus3k2w3ybh@alap3.anarazel.de">https://postgr.es/m/20170901064131.tazjxwus3k2w3ybh@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4717fdb14cf0a62ffe1b1023e1c5ea8866e34fa0">https://git.postgresql.org/pg/commitdiff/4717fdb14cf0a62ffe1b1023e1c5ea8866e34fa0</a></li>

<li>Perform slot validity checks in a separate pass over expression. This reduces code duplication a bit, but the primary benefit that it makes JITing expression evaluation easier. When doing so we can't, as previously done in the interpreted case, really change opcode without recompiling. Nor dow we just carry around unnecessary branches to avoid re-checking over and over. As a minor side-effect this makes ExecEvalStepOp() O(log(N)) rather than O(N). Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170901064131.tazjxwus3k2w3ybh@alap3.anarazel.de">https://postgr.es/m/20170901064131.tazjxwus3k2w3ybh@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b40933101ca622aa8a35b6fe07ace36effadf1c7">https://git.postgresql.org/pg/commitdiff/b40933101ca622aa8a35b6fe07ace36effadf1c7</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Allow leading zero on exponents in pgbench test results. Following commit 7a727c18 this is found to be necessary on at least some Windows platforms. per buildfarm. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0aa1d489ea756b96b6d5573692ae9cd5d143c2a5">https://git.postgresql.org/pg/commitdiff/0aa1d489ea756b96b6d5573692ae9cd5d143c2a5</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Extend near-wraparound hints to include replication slots. Author: Feike Steenbergen Reviewed-by: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2958a672b1fed35403b23c2b453aede9f7ef4b39">https://git.postgresql.org/pg/commitdiff/2958a672b1fed35403b23c2b453aede9f7ef4b39</a></li>

<li>Fix race condition when changing synchronous_standby_names. A momentary window exists when synchronous_standby_names changes that allows commands issued after the change to continue to act as async until the change becomes visible. Remove the race by using more appropriate test in syncrep.c Author: Asim Rama Praveen and Ashwin Agrawal Reported-by: Xin Zhang, Ashwin Agrawal, and Asim Rama Praveen Reviewed-by: Michael Paquier, Masahiko Sawada <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/48c9f4926562278a2fd2b85e7486c6d11705f177">https://git.postgresql.org/pg/commitdiff/48c9f4926562278a2fd2b85e7486c6d11705f177</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Properly set base backup backends to active in pg_stat_activity. When walsenders were included in pg_stat_activity, only the ones actually streaming WAL were listed as active when they were active. In particular, the connections sending base backups were listed as being idle. Which means that a regular pg_basebackup would show up with one active and one idle connection, when both were active. This patch updates to set all walsenders to active when they are (including those doing very fast things like IDENTIFY_SYSTEM), and then back to idle. Details about exactly what they are doing is available in pg_stat_replication. Patch by me, review by Michael Paquier and David Steele. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d02974e32e028fc078d8f5eca1d6a4516efb0aa6">https://git.postgresql.org/pg/commitdiff/d02974e32e028fc078d8f5eca1d6a4516efb0aa6</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Aleksandr Parfenov sent in another revision of a patch to make a more flexible configuration for full-text search.</p>

<p>Tomas Vondra sent in another revision of a patch to add some controls over the resources logical replication consumes.</p>

<p>Amit Langote sent in another revision of a patch to teach the executor to handle ON CONFLICT (key) on partitioned tables.</p>

<p>Masahiko Sawada sent in another revision of a patch to determine whether logical replication has caught up.</p>

<p>Nikhil Sontakke sent in a patch to fix the now-incorrect assumption by HeapTupleSatisfiesVacuum that rows belonging to an aborted transaction are not visible to anyone else.</p>

<p>Micha&#65533;l Paquier sent in a patch to improve the concurrent behavior of ALTER ROLE.</p>

<p>Peter Eisentraut sent in two more revisions of a patch to add infrastructure needed in order to use stdbool.h.</p>

<p>David Rowley sent in another revision of a patch to better prune partitions at runtime.</p>

<p>Vaishnavi Prabakaran sent in a patch to add TAP test support for backup with tablespace mapping.</p>

<p>Etsuro Fujita sent in another revision of a patch to improve predicate pushdown for UPDATEs in the PostgreSQL FDW.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement pluggable storage.</p>

<p>Dmitry Dolgov sent in another revision of a patch to implement generic type subscripting and use same for arrays and JSONB.</p>

<p>Ra&#65533;l Mar&#65533;n Rodr&#65533;guez sent in another revision of a patch to add pow() support to pgbench.</p>

<p>Masahiko Sawada sent in another revision of a patch to handle 2PC and similar across multiple servers.</p>

<p>Konstantin Knizhnik sent in three more revisions of a patch to implement AS OF queries.</p>

<p>Yugo Nagata sent in three more revisions of a patch to implement lockable views.</p>

<p>Peter Eisentraut sent in another revision of a patch to implement generated columns.</p>

<p>David Rowley sent in another revision of a patch to remove [Merge]Append nodes which contain a single subpath.</p>

<p>Micha&#65533;l Paquier sent in a patch to improve the current behavior of a flock of DDLs.</p>

<p>Micha&#65533;l Paquier sent in a patch to refactor channel binding code to fetch cbind_data only when necessary and implement channel binding tls-server-end-point for SCRAM.</p>

<p>John Naylor sent in another revision of a patch to make bootstrap data simpler to read and use.</p>

<p>Fabien COELHO sent in two more revisions of a patch to add more functions and operators to pgbench.</p>

<p>Nathan Bossart sent in another revision of a patch to fix the unparenthesized VACUUM grammar, add a parenthesized ANALYZE syntax, and add a NOWAIT vacuum option.</p>

<p>Andrey Borodin sent in another revision of a patch to delete pages during GiST VACUUM and implement a physical GiST scan.</p>

<p>Kyotaro HORIGUCHI sent in a patch to add a simple perl client module for testing and add a sample prove_check based on same.</p>

<p>Jeff Janes sent in a patch to fix MCV lists for highly skewed distributions.</p>

<p>Yugo Nagata sent in a patch to implement GET DIAGNOSTICS FUNCTION_NAME in PL/pgsql.</p>

<p>David Steele sent in another revision of a patch to allow group read for $PGDATA.</p>

<p>Jeff Davis sent in another revision of a patch to implement RANGE MERGE JOIN.</p>

<p>Thomas Munro sent in another revision of a patch to fix a condition variable live lock.</p>

<p>Marco Nenciarini sent in a patch to support TRUNCATE statements in logical replication.</p>

<p>&#65533;lvaro Herrera sent in another revision of a patch to implement local indexes for partitioned tables.</p>

<p>Fabien COELHO sent in another revision of a patch to add \if to pgbench.</p>

<p>&#65533;lvaro Herrera sent in a patch to add FOR EACH ROW triggers to partitioned tables.</p>

<p>Marco Nenciarini sent in a patch to make TRUNCATE match the behavior of DELETE for session_replication_role = replica.</p>

<p>Yugo Nagata sent in a patch to fix an Oracle incompatibility in error condition for the Oracle-compatibility function instr() documented for PL/pgsql.</p>

<p>&#65533;lvaro Herrera sent in a patch to allow UNIQUE indexes on partitioned tables.</p>

<p>Andrey Borodin sent in a patch to count tuples correctly during GiST VACUUM of partial index.</p>

<p>Simon Riggs sent in a patch to change the WAL header to reduce contention during ReserveXLogInsertLocation().</p>

<p>Simon Riggs sent in another revision of a patch to implement MERGE.</p>

<p>Petr Jel&#65533;nek sent in a patch to add dd pg_replication_slot_advance() function which advances a replication slot to the specified position. It works both with logical and physical slots.</p>

<p>Vik Fearing sent in a patch to add some sample values for the parameters of pg_stat_statements.</p>

<p>Marina Polyakova sent in another revision of a patch to precalculate stable and immutable functions.</p>

<p>Pavan Deolasee sent in a patch to speed up inserts with mostly-monotonically increasing values.</p>

<p>Artur Zakirov sent in another revision of a patch to enable shared Ispell dictionaries.</p>

<p>Remi Colinet sent in a patch to make block and file size for WAL and relations defined at cluster creation.</p>

<p>Ivan Kartyshov sent in a patch to implement checksums for SLRU files.</p>

<p>Stephen Frost sent in a patch to add a default role 'pg_access_server_files'.</p>

<p>&#65533;lvaro Herrera sent in a patch to allow foreign key triggers on partitioned tables.</p>