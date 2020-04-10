---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 janvier 2016"
author: "NBougain"
redirect_from: "index.php?post/2016-01-21-nouvelles-hebdomadaires-de-postgresql-17-janvier-2016 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Fix typo in logical decoding documentation. From: Petr Jelinek &lt;petr@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c618e1b5067d4a8233f8f403a87fd168fb621a39">http://git.postgresql.org/pg/commitdiff/c618e1b5067d4a8233f8f403a87fd168fb621a39</a></li>

<li>psql: Improve CREATE INDEX CONCURRENTLY tab completion. The completion of CREATE INDEX CONCURRENTLY was lacking in several ways compared to a plain CREATE INDEX command: - CREATE INDEX &lt;name&gt; ON completes table names, but didn't with CONCURRENTLY. - CREATE INDEX completes ON and existing index names, but with CONCURRENTLY it only completed ON. - CREATE INDEX &lt;name&gt; completes ON, but didn't with CONCURRENTLY. These are now all fixed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1bfb28b586a319052d96dd4dfd40a05505ea6ed">http://git.postgresql.org/pg/commitdiff/b1bfb28b586a319052d96dd4dfd40a05505ea6ed</a></li>

<li>psql: Fix CREATE INDEX tab completion. The previous code supported a syntax like CREATE INDEX name CONCURRENTLY, which never existed. Mistake introduced in commit 37ec19a15ce452ee94f32ebc3d6a9a45868e82fd. Remove the addition of CONCURRENTLY at that point. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc56d5898d1cbd9dee6fe16ea7a814a5820b6181">http://git.postgresql.org/pg/commitdiff/bc56d5898d1cbd9dee6fe16ea7a814a5820b6181</a></li>

<li>psql: Update tab completion comment This just updates a comment to match the code. from Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70327030095d07abb58f9b3452dc6315a02aff0e">http://git.postgresql.org/pg/commitdiff/70327030095d07abb58f9b3452dc6315a02aff0e</a></li>

<li>psql: Add completion support for DROP INDEX CONCURRENTLY based on patch by Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4189e3d659abb48d159a6c3faabaa7e99498ca3e">http://git.postgresql.org/pg/commitdiff/4189e3d659abb48d159a6c3faabaa7e99498ca3e</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Remove obsolete comment. Noted while reviewing a question from Dickson S. Guedes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/950ab82c3d967e6f4cec2a7c8ead2edd5b311518">http://git.postgresql.org/pg/commitdiff/950ab82c3d967e6f4cec2a7c8ead2edd5b311518</a></li>

<li>Fix spelling mistakes. Same patch submitted independently by David Rowley and Peter Geoghegan. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23c2dd03d5db2f4a20dcd09bd6c49e293e3c8f03">http://git.postgresql.org/pg/commitdiff/23c2dd03d5db2f4a20dcd09bd6c49e293e3c8f03</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Avoid dump/reload problems when using both plpython2 and plpython3. Commit 803716013dc1350f installed a safeguard against loading plpython2 and plpython3 at the same time, but asserted that both could still be used in the same database, just not in the same session. However, that's not actually all that practical because dumping and reloading will fail (since both libraries necessarily get loaded into the restoring session). pg_upgrade is even worse, because it checks for missing libraries by loading every .so library mentioned in the entire installation into one session, so that you can have only one across the whole cluster. We can improve matters by not throwing the error immediately in _PG_init, but only when and if we're asked to do something that requires calling into libpython. This ameliorates both of the above situations, since while execution of CREATE LANGUAGE, CREATE FUNCTION, etc will result in loading plpython, it isn't asked to do anything interesting (at least not if check_function_bodies is off, as it will be during a restore). It's possible that this opens some corner-case holes in which a crash could be provoked with sufficient effort. However, since plpython only exists as an untrusted language, any such crash would require superuser privileges, making it "don't do that" not a security issue. To reduce the hazards in this area, the error is still FATAL when it does get thrown. Per a report from Paul Jones. Back-patch to 9.2, which is as far back as the patch applies without work. (It could be made to work in 9.1, but given the lack of previous complaints, I'm disinclined to expend effort so far back. We've been pretty desultory about support for Python 3 in 9.1 anyway.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/866566a690bb9916dcd294807e65a6e173396530">http://git.postgresql.org/pg/commitdiff/866566a690bb9916dcd294807e65a6e173396530</a></li>

<li>Use LOAD not actual code execution to pull in plpython library. Commit 866566a690bb9916 is insufficient to prevent dump/reload failures when using transform modules in a database with both plpython2 and plpython3 installed. The reason is that the transform extension scripts use DO blocks as a mechanism to pull in the libpython library before creating the transform function. It's necessary to preload the library because the dynamic loader won't do it for us on every platform, leading to "unresolved symbol" failures when the transform library is loaded. But it's *not* necessary to execute Python code, and doing so will provoke a multiple-Pythons-are-loaded error even after the preceding commit. To fix, use LOAD instead of a DO block. That requires superuser privilege, but creation of a C function does anyway. It also embeds knowledge of the underlying library name for each PL language; but that's wired into the initdb-time contents of pg_pltemplate too, so that doesn't seem like a large problem either. Note that CREATE TRANSFORM as such doesn't call the language module at all. Per a report from Paul Jones. Back-patch to 9.5 where transform modules were introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb6fcbd33fbbd6d31fa2b39938e60ecb48dc4de4">http://git.postgresql.org/pg/commitdiff/fb6fcbd33fbbd6d31fa2b39938e60ecb48dc4de4</a></li>

<li>Remove no-longer-needed old-style check for incompatible plpythons. Commit 866566a690bb9916 introduced a new mechanism for incompatible plpythons to detect each other. I left the old mechanism in place, because it seems possible that a plpython predating that commit might be used with one postdating it. (This would require updating plpython3 but not plpython2 or vice versa, but that seems well within the realm of possibility.) However, surely it will not be able to happen in 9.6 or later, so we can delete the old mechanism in HEAD. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/796d1e889f2b5f88b33a425fdfd08d7906cbd66a">http://git.postgresql.org/pg/commitdiff/796d1e889f2b5f88b33a425fdfd08d7906cbd66a</a></li>

<li>Run pgindent on src/bin/pg_dump/* To ease doing indent fixups on a couple of patches I have in progress. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26905e009babe6020fddcf3820e57e2f87c5539c">http://git.postgresql.org/pg/commitdiff/26905e009babe6020fddcf3820e57e2f87c5539c</a></li>

<li>Access pg_dump's options structs through Archive struct, not directly. Rather than passing around DumpOptions and RestoreOptions as separate arguments, add fields to struct Archive to carry pointers to these objects, and access them through those fields when needed. There already was a RestoreOptions pointer in Archive, though for no obvious reason it was part of the "private" struct rather than out where pg_dump.c could see it. Doing this allows reversion of quite a lot of parameter-addition changes made in commit 0eea8047bf, which is a good thing IMO because this will reduce the code delta between 9.4 and 9.5, probably easing a few future back-patch efforts. Moreover, the previous commit only added a DumpOptions argument to functions that had to have it at the time, which means we could anticipate still more code churn (and more back-patch hazard) as the requirement spread further. I'd hit exactly that problem in my upcoming patch to fix extension membership marking, which is what motivated me to do this. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b5fea2a11741e651f7c25e981dd29b610a08426">http://git.postgresql.org/pg/commitdiff/5b5fea2a11741e651f7c25e981dd29b610a08426</a></li>

<li>Handle extension members when first setting object dump flags in pg_dump. pg_dump's original approach to handling extension member objects was to run around and clear (or set) their dump flags rather late in its data collection process. Unfortunately, quite a lot of code expects those flags to be valid before that; which was an entirely reasonable expectation before we added extensions. In particular, this explains Karsten Hilbert's recent report of pg_upgrade failing on a database in which an extension has been installed into the pg_catalog schema. Its objects are initially marked as not-to-be-dumped on the strength of their schema, and later we change them to must-dump because we're doing a binary upgrade of their extension; but we've already skipped essential tasks like making associated DO_SHELL_TYPE objects. To fix, collect extension membership data first, and incorporate it in the initial setting of the dump flags, so that those are once again correct from the get-go. This has the undesirable side effect of slightly lengthening the time taken before pg_dump acquires table locks, but testing suggests that the increase in that window is not very much. Along the way, get rid of ugly special-case logic for deciding whether to dump procedural languages, FDWs, and foreign servers; dump decisions for those are now correct up-front, too. In 9.3 and up, this also fixes erroneous logic about when to dump event triggers (basically, they were *always* dumped before). In 9.5 and up, transform objects had that problem too. Since this problem came in with extensions, back-patch to all supported versions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e72d7d85310c397a94748db72d73a59c57e0b0dc">http://git.postgresql.org/pg/commitdiff/e72d7d85310c397a94748db72d73a59c57e0b0dc</a></li>

<li>Fix build_grouping_chain() to not clobber its input lists. There's no good reason for stomping on the input data; it makes the logic in this function no simpler, in fact probably the reverse. And it makes it impossible to separate path generation from plan generation, as I'm working towards doing; that will require more than one traversal of these lists. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a923af382c5678f3dfb591aacb6b90bf4e5ed7a9">http://git.postgresql.org/pg/commitdiff/a923af382c5678f3dfb591aacb6b90bf4e5ed7a9</a></li>

<li>Remove dead code in pg_dump. Coverity quite reasonably complained that this check for fout==NULL occurred after we'd already dereferenced fout. However, the check is just dead code since there is no code path by which CreateArchive can return a null pointer. Errors such as can't-open-that-file are reported down inside CreateArchive, and control doesn't return. So let's silence the warning by removing the dead code, rather than continuing to pretend it does something. Coverity didn't complain about this before 5b5fea2a1, so back-patch to 9.5 like that patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57ce9acc04483df4913921d4ff21f01483583fb8">http://git.postgresql.org/pg/commitdiff/57ce9acc04483df4913921d4ff21f01483583fb8</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Maintain local LogwrtResult consistently Teach GetFlushRecPtr() to update LogwrtResult cache as performed by all other functions in xlog.c <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e29e6324ca7d52eb751c8d63881d1f7c44e3921">http://git.postgresql.org/pg/commitdiff/1e29e6324ca7d52eb751c8d63881d1f7c44e3921</a></li>

<li>Add new user fn pg_current_xlog_flush_location() Tomas Vondra, reviewed by Michael Paquier and Amit Kapila Minor edits by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e63bb4549a2f47b86de9fc21c9f8b00440f34f99">http://git.postgresql.org/pg/commitdiff/e63bb4549a2f47b86de9fc21c9f8b00440f34f99</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Properly close token in sspi authentication. We can never leak more than one token, but we shouldn't do that. We don't bother closing it in the error paths since the process will exit shortly anyway. Christian Ullrich <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a61d1ff9dce7406c0affdc013da27ed4252ba29">http://git.postgresql.org/pg/commitdiff/6a61d1ff9dce7406c0affdc013da27ed4252ba29</a></li>

<li>Fix minor typo in comment Tatsuro Yamada <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf7dfbf2d6c5892747cd6fca399350d86c16f00f">http://git.postgresql.org/pg/commitdiff/cf7dfbf2d6c5892747cd6fca399350d86c16f00f</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Simon Riggs sent in another revision of a patch to speed up 2PC.</p>

<p>Marisa Emerson sent in another revision of a patch to support BSD Authentication.</p>

<p>Elvis Pranskevichus sent in a patch to fix an issue with dumping domain constraints in pg_dump.</p>

<p>Michael Paquier and Fabien COELHO traded patches to extend pgbench expressions with functions.</p>

<p>Dilip Kumar sent in another revision of a patch to help make relation extension more scalable.</p>

<p>Etsuro Fujita sent in another revision of a patch to help make FDW DML pushdown more efficient.</p>

<p>SAWADA Masahiko sent in two more revisions of a patch to add a "frozen" bit to the visibility map.</p>

<p>Anastasia Lubennikova sent in two more revisions of a patch to implement covering unique indexes.</p>

<p>Amit Kapila sent in a patch to optimize parallelism code for launched workers usage.</p>

<p>Michael Paquier sent in a patch to remove the service-related code in pg_ctl for Cygwin.</p>

<p>Tom Lane sent in a patch to show what might be needed to fix PL/Python[23] issues in PostgreSQL 9.1. In view of 9.1's short remaining life, this is not going to be applied.</p>

<p>David Rowley sent in two more revisions of a patch to remove functionally dependent GROUP BY columns.</p>

<p>Filip Rembia&Aring;&sbquo;kowski sent in a patch to document the fact that BYPASSRLS is a CREATE USER option.</p>

<p>Andres Freund sent in a patch to allow to easily choose between the readiness primitives in unix_latch.c, error out if waiting on socket readiness without a specified socket, only clear unix_latch.c's self-pipe if it actually contains data, and support using epoll as the polling primitive in unix_latch.c.</p>

<p>Amit Langote sent in a patch to fix a comment thinko in expand_inherited_rtentry().</p>

<p>Vinayak Pokale sent in a patch to fix a typo in sequence.c.</p>

<p>Tatsuro Yamada sent in a patch to fix a comment typo in port/atomics/generic.h.</p>

<p>David Rowley sent in two more revisions of a patch to implement combining aggregates.</p>

<p>Mithun C Y sent in a patch to cache snapshot data avoid cuncurrent write to cache.</p>

<p>Etsuro Fujita sent in another revision of a patch to create foreign scan plan.</p>

<p>Etsuro Fujita sent in a patch to update a comment in setrefs.c.</p>

<p>Etsuro Fujita sent in a patch to make a minor documentation tweak to GetForeignPlan documentation.</p>

<p>Alexander Shulgin sent in a POC patch to create pg_logical_slot_stream_relation.</p>

<p>Christian Ullrich sent in another revision of a patch to fix an error in SSPI auth that could cause the wrong realm name to be used.</p>

<p>Jeff Janes sent in another revision of a patch to expose the GIN clean pending list to SQL.</p>

<p>Constantin S. Pan sent in a patch to speed up GIN build with parallel workers.</p>

<p>Andreas Seltenreich sent in a patch to improve spinlock inline assembly for x86.</p>

<p>Jos&Atilde;&copy; Arthur Benetasso Villanova sent in a patch to log operating system user connecting via unix socket.</p>

<p>Dean Rasheed sent in another revision of a patch to implement trigonometric functions in degrees.</p>