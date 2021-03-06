---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 octobre 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/10/18/Nouvelles-hebdomadaires-de-PostgreSQL-16-octobre-2016"
---


<p>[ndt: Meetup à Paris le 10 novembre&nbsp;: <a href="http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/" target="_blank">http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</p>

<h2>Offres d'emplois autour de PostgreSQL en octobre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-10/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La <em>PostgreSQL Conference Europe 2016</em> aura lieu &agrave; Tallin, Estonie, du 1er au 4 novembre 2016. Le programme a &eacute;t&eacute; publi&eacute;&nbsp;: <a target="_blank" href="http://2016.pgconf.eu/registration/">http://2016.pgconf.eu/registration/</a></li>

<li>Le PGDay 2016 &agrave; Austin aura lieu le 12 novembre 2016. Date limite de candidature au 21 septembre 2016 minuit CST. D&eacute;tails et formulaire de candidature&nbsp;: <a target="_blank" href="https://www.postgresql.us/events/2016/austin">https://www.postgresql.us/events/2016/austin</a></li>

<li>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></li>

<li>[ndt: Meetup à Nantes le 22 novembre&nbsp;: <a href="http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>CHAR(16) aura lieu &agrave; New York le 6 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://charconference.org/">http://charconference.org/</a></li>

<li>Le PGDay.IT 2016 aura lieu &agrave; Prato le 13 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20161016222644.GB13559@fetter.org">http://www.postgresql.org/message-id/20161016222644.GB13559@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Add a noreturn attribute to help static analyzers <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52f0142eb4c755d1f4c390464769d35f21e998c3">http://git.postgresql.org/pg/commitdiff/52f0142eb4c755d1f4c390464769d35f21e998c3</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Remove some unnecessary #includes. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fb12cbcd6f1a971e113d7d32cc7ee920db4e097">http://git.postgresql.org/pg/commitdiff/6fb12cbcd6f1a971e113d7d32cc7ee920db4e097</a></li>

<li>Simplify the code for logical tape read buffers. Pass the buffer size as argument to LogicalTapeRewindForRead, rather than setting it earlier with the separate LogicTapeAssignReadBufferSize call. This way, the buffer size is set closer to where it's actually used, which makes the code easier to understand. This makes the calculation for how much memory to use for the buffers less precise. We now use the same amount of memory for every tape, rounded down to the nearest BLCKSZ boundary, instead of using one more block for some tapes, to get the total up to exact amount of memory available. That should be OK, merging isn't too sensitive to the exact amount of memory used. Reviewed by Peter Geoghegan. Discussion: &lt;0f607c4b-df23-353e-bf56-c0389d28495f@iki.fi&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b75f467b6eec0678452fd8d7f8d306e6df3a1076">http://git.postgresql.org/pg/commitdiff/b75f467b6eec0678452fd8d7f8d306e6df3a1076</a></li>

<li>Fix copy-pasto in comment. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb55dd6059dddf2cd44423da6a3f6946826953cf">http://git.postgresql.org/pg/commitdiff/bb55dd6059dddf2cd44423da6a3f6946826953cf</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>In PQsendQueryStart(), avoid leaking any left-over async result. Ordinarily there would not be an async result sitting around at this point, but it appears that in corner cases there can be. Considering all the work we're about to launch, it's hardly going to cost anything noticeable to check. It's been like this forever, so back-patch to all supported branches. Report: &lt;CAD-Qf1eLUtBOTPXyFQGW-4eEsop31tVVdZPu4kL9pbQ6tJPO8g@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/886f6c5ccdb500eeeec7e0abdf1500e20a304c45">http://git.postgresql.org/pg/commitdiff/886f6c5ccdb500eeeec7e0abdf1500e20a304c45</a></li>

<li>Update user docs for switch to POSIX semaphores. Since commit ecb0d20a9 hasn't crashed and burned, here's the promised docs update for it. In addition to explaining that Linux and FreeBSD ports now use POSIX semaphores, I did some wordsmithing on pre-existing wording; in particular trying to clarify which SysV parameters need to be set with an eye to total usage across all applications. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d21f08bccd316c3850a1943c1ee1e381dab1588">http://git.postgresql.org/pg/commitdiff/3d21f08bccd316c3850a1943c1ee1e381dab1588</a></li>

<li>Improve documentation for CREATE RECURSIVE VIEW. It was perhaps not entirely clear that internal self-references shouldn't be schema-qualified even if the view name is written with a schema. Spell it out. Discussion: &lt;871sznz69m.fsf@metapensiero.it&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e34318725ca5b274efd6f57ea7460e89f4dca9f9">http://git.postgresql.org/pg/commitdiff/e34318725ca5b274efd6f57ea7460e89f4dca9f9</a></li>

<li>Docs: grammatical fix. Fix poor grammar introduced in 741ccd501. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c7e56811fa38cbc39efd6bdd4bb45f2f0444803e">http://git.postgresql.org/pg/commitdiff/c7e56811fa38cbc39efd6bdd4bb45f2f0444803e</a></li>

<li>Remove "sco" and "unixware" ports. SCO OpenServer and SCO UnixWare are more or less dead platforms. We have never had a buildfarm member testing the "sco" port, and the last "unixware" member was last heard from in 2012, so it's fair to doubt that the code even compiles anymore on either one. Remove both ports. We can always undo this if someone shows up with an interest in maintaining and testing these platforms. Discussion: &lt;17177.1476136994@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b860f52ed1b1784cdf3f03886805f5bf250ea74">http://git.postgresql.org/pg/commitdiff/2b860f52ed1b1784cdf3f03886805f5bf250ea74</a></li>

<li>Drop server support for FE/BE protocol version 1.0. While this isn't a lot of code, it's been essentially untestable for a very long time, because libpq doesn't support anything older than protocol 2.0, and has not since release 6.3. There's no reason to believe any other client-side code still uses that protocol, either. Discussion: &lt;2661.1475849167@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f1eaf87e868a1c42f2b159958623daa6a666de4">http://git.postgresql.org/pg/commitdiff/2f1eaf87e868a1c42f2b159958623daa6a666de4</a></li>

<li>Provide DLLEXPORT markers for C functions via PG_FUNCTION_INFO_V1 macro. This isn't really necessary for our own code, because we use a .DEF file in MSVC builds (see gendef.pl), or --export-all-symbols in MinGW and Cygwin builds, to ensure that all global symbols in loadable modules will be exported on Windows. However, third-party authors might use different build processes that need this marker, and it's harmless enough for our own builds. To some extent, this is an oversight in commit e7128e8db, so back-patch to 9.4 where that was added. Laurenz Albe. Discussion: &lt;A737B7A37273E048B164557ADEF4A58B539300BD@ntex2010a.host.magwien.gv.at&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8518583cdb10340bab3464121629a1a9ec387afa">http://git.postgresql.org/pg/commitdiff/8518583cdb10340bab3464121629a1a9ec387afa</a></li>

<li>Remove unnecessary int2vector-specific hash function and equality operator. These functions were originally added in commit d8cedf67a to support use of int2vector columns as catcache lookup keys. However, there are no catcaches that use such columns. (Indeed I now think it must always have been dead code: a catcache with such a key column would need an underlying unique index on the column, but we've never had an int2vector btree opclass.) Getting rid of the int2vector-specific operator and function does not lose any functionality, because operations on int2vectors will now fall back to the generic anyarray support. This avoids a wart that a btree index on an int2vector column (made using anyarray_ops) would fail to match equality searches, because int2vectoreq wasn't a member of the opclass. We don't really care much about that, since int2vector is not meant as a type for users to use, but it's silly to have extra code and less functionality. If we ever do want a catcache to be indexed by an int2vector column, we'd need to put back full btree and hash opclasses for int2vector, comparable to the support for oidvector. (The anyarray code can't be used at such a low level, because it needs to do catcache lookups.) But we'll deal with that if/when the need arises. Also worth noting is that removal of the hash int2vector_ops opclass will break any user-created hash indexes on int2vector columns. While hash anyarray_ops would serve the same purpose, it would probably not compute the same hash values and thus wouldn't be on-disk-compatible. Given that int2vector isn't a user-facing type and we're planning other incompatible changes in hash indexes for v10 anyway, this doesn't seem like something to worry about, but it's probably worth mentioning here. Amit Langote Discussion: &lt;d9bb74f8-b194-7307-9ebd-90645d377e45@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c80642aa8de8393b08cd3cbf612b325cedd98dc">http://git.postgresql.org/pg/commitdiff/5c80642aa8de8393b08cd3cbf612b325cedd98dc</a></li>

<li>Remove pg_dump/pg_dumpall support for dumping from pre-8.0 servers. The need for dumping from such ancient servers has decreased to about nil in the field, so let's remove all the code that catered to it. Aside from removing a lot of boilerplate variant queries, this allows us to not have to cope with servers that don't have (a) schemas or (b) pg_depend. That means we can get rid of assorted squishy code around that. There may be some nonobvious additional simplifications possible, but this patch already removes about 1500 lines of code. I did not remove the ability for pg_restore to read custom-format archives generated by these old versions (and light testing says that that does still work). If you have an old server, you probably also have a pg_dump that will work with it; but you have an old custom-format backup file, that might be all you have. It'd be possible at this point to remove fmtQualifiedId()'s version argument, but I refrained since that would affect code outside pg_dump. Discussion: &lt;2661.1475849167@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64f3524e2c8deebc02808aa5ebdfa17859473add">http://git.postgresql.org/pg/commitdiff/64f3524e2c8deebc02808aa5ebdfa17859473add</a></li>

<li>pg_dump's getTypes() needn't retrieve typinput or typoutput anymore. Commit 64f3524e2 removed the stanza of code that examined these values. I failed to notice they were unnecessary because my compiler didn't warn about the un-read variables. Noted by Peter Eisentraut. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0a3b211bcb790a8d76022cb2b3ffe9795aaf5e9">http://git.postgresql.org/pg/commitdiff/c0a3b211bcb790a8d76022cb2b3ffe9795aaf5e9</a></li>

<li>Revert addition of PGDLLEXPORT in PG_FUNCTION_INFO_V1 macro. This turns out not to be as harmless as I thought: MSVC will complain if it sees an "extern" declaration without PGDLLEXPORT and then one with. (Seems fairly silly, given that this can be changed after the fact by the linker, but there you have it.) Therefore, contrib modules that have extern's for V1 functions in header files are falling over in the buildfarm, since none of those externs are marked PGDLLEXPORT. We might or might not conclude that we're willing to plaster those declarations with PGDLLEXPORT in HEAD, but in any case there's no way we're going to ship this change in the back branches. Third-party authors would not thank us for breaking their code in a minor release. Hence, revert the addition of PGDLLEXPORT (but let's keep the extra info in the comment). If we do the other changes we can revert this commit in HEAD. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f52fd3c6d28a4380a5afc51ae6f774c91837a38">http://git.postgresql.org/pg/commitdiff/4f52fd3c6d28a4380a5afc51ae6f774c91837a38</a></li>

<li>Fix broken jsonb_set() logic for replacing array elements. Commit 0b62fd036 did a fairly sloppy job of refactoring setPath() to support jsonb_insert() along with jsonb_set(). In its defense, though, there was no regression test case exercising the case of replacing an existing element in a jsonb array. Per bug #14366 from Peng Sun. Back-patch to 9.6 where bug was introduced. Report: &lt;20161012065349.1412.47858@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c4cc9e2c75e84a8267396be5cccbfe25b8f63f6">http://git.postgresql.org/pg/commitdiff/9c4cc9e2c75e84a8267396be5cccbfe25b8f63f6</a></li>

<li>Fix pg_dumpall regression test to be locale-independent. The expected results in commit b4fc64578 seem to have been generated in a non-C locale, which just points up the fact that the ORDER BY clause was locale-sensitive. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a4bf6b192377bef8e69c92d0c95434a91509f12">http://git.postgresql.org/pg/commitdiff/0a4bf6b192377bef8e69c92d0c95434a91509f12</a></li>

<li>Clean up handling of anonymous mmap'd shared-memory segment. Fix detaching of the mmap'd segment to have its own on_shmem_exit callback, rather than piggybacking on the one for detaching from the SysV segment. That was confusing, and given the distance between the two attach calls, it was trouble waiting to happen. Make the detaching calls idempotent by clearing AnonymousShmem to show we've already unmapped. I spent quite a bit of time yesterday trying to find a path that would allow the munmap()'s to be done twice, and while I did not succeed, it seems silly that there's even a question. Make the #ifdef logic less confusing by separating "do we want to use anonymous shmem" from EXEC_BACKEND. Even though there's no current scenario where those conditions are different, it is not helpful for different places in the same file to be testing EXEC_BACKEND for what are fundamentally different reasons. Don't do on_exit_reset() in StartBackgroundWorker(). At best that's useless (InitPostmasterChild would have done it already) and at worst it could zap some callback that's unrelated to shared memory. Improve comments, and simplify the huge_pages enablement logic slightly. Back-patch to 9.4 where hugepage support was introduced. Arguably this should go into 9.3 as well, but the code looks significantly different there, and I doubt it's worth the trouble of adapting the patch given I can't show a live bug. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15fc5e15811337f5a81d4ae44c6149256f6dd15f">http://git.postgresql.org/pg/commitdiff/15fc5e15811337f5a81d4ae44c6149256f6dd15f</a></li>

<li>Try to find out the actual hugepage size when making a MAP_HUGETLB request. Even if Linux's mmap() is okay with a partial-hugepage request, munmap() is not, as reported by Chris Richards. Therefore it behooves us to try a bit harder to find out the actual hugepage size, instead of assuming that we can skate by with a guess. For the moment, just look into /proc/meminfo to find out the default hugepage size, and use that. Later, on kernels that support requests for nondefault sizes, we might try to consider other alternatives. But that smells more like a new feature than a bug fix, especially if we want to provide any way for the DBA to control it, so leave it for another day. I set this up to allow easy addition of platform-specific code for non-Linux platforms, if needed; but right now there are no reports suggesting that we need to work harder on other platforms. Back-patch to 9.4 where hugepage support was introduced. Discussion: &lt;31056.1476303954@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb775768e3e37d466d69b7177a92508b81c1c204">http://git.postgresql.org/pg/commitdiff/cb775768e3e37d466d69b7177a92508b81c1c204</a></li>

<li>Remove dead code in pg_dump. I'm not sure if this provision for "pg_backup" behaving a bit differently from "pg_dump" ever did anything useful in a released version. But it's definitely dead code now. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c08521eb55135c493cee23541c233870cdff14b7">http://git.postgresql.org/pg/commitdiff/c08521eb55135c493cee23541c233870cdff14b7</a></li>

<li>Fix another bug in merging of inherited CHECK constraints. It's not good for an inherited child constraint to be marked connoinherit; that would result in the constraint not propagating to grandchild tables, if any are created later. The code mostly prevented this from happening but there was one case that was missed. This is somewhat related to commit e55a946a8, which also tightened checks on constraint merging. Hence, back-patch to 9.2 like that one. This isn't so much because there's a concrete feature-related reason to stop there, as to avoid having more distinct behaviors than we have to in this area. Amit Langote Discussion: &lt;b28ee774-7009-313d-dd55-5bdd81242c41@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cca13cbfcc5312f7ae1728213e197c6f37ca62a">http://git.postgresql.org/pg/commitdiff/3cca13cbfcc5312f7ae1728213e197c6f37ca62a</a></li>

<li>Fix handling of pgstat counters for TRUNCATE in a prepared transaction. pgstat_twophase_postcommit is supposed to duplicate the math in AtEOXact_PgStat, but it had missed out the bit about clearing t_delta_live_tuples/t_delta_dead_tuples for a TRUNCATE. It's harder than you might think to replicate the issue here, because those counters would only be nonzero when a previous transaction in the same backend had added/deleted tuples in the truncated table, and those counts hadn't been sent to the stats collector yet. Evident oversight in commit d42358efb. I've not added a regression test for this; we tried to add one in d42358efb, and had to revert it because it was too timing-sensitive for the buildfarm. Back-patch to 9.5 where d42358efb came in. Stas Kelvich Discussion: &lt;EB57BF68-C06D-4737-BDDC-4BA778F4E62B@postgrespro.ru&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81e82a2bd48865f9a294b63d9492f9fde6a32787">http://git.postgresql.org/pg/commitdiff/81e82a2bd48865f9a294b63d9492f9fde6a32787</a></li>

<li>Fix assorted integer-overflow hazards in varbit.c. bitshiftright() and bitshiftleft() would recursively call each other infinitely if the user passed INT_MIN for the shift amount, due to integer overflow in negating the shift amount. To fix, clamp to -VARBITMAXLEN. That doesn't change the results since any shift distance larger than the input bit string's length produces an all-zeroes result. Also fix some places that seemed inadequately paranoid about input typmods exceeding VARBITMAXLEN. While a typmod accepted by anybit_typmodin() will certainly be much less than that, at least some of these spots are reachable with user-chosen integer values. Andreas Seltenreich and Tom Lane Discussion: &lt;87d1j2zqtz.fsf@credativ.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32fdf42cf546f613aab9ca98935c40a046187fa9">http://git.postgresql.org/pg/commitdiff/32fdf42cf546f613aab9ca98935c40a046187fa9</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Make regression tests less dependent on hash table order. Upcoming changes to the hash table code used, among others, for grouping and set operations will change the output order for a few queries. To make it less likely that actual bugs are hidden between regression test ordering changes, and to make the tests robust against platform dependant ordering, add ORDER BYs guaranteeing the output order. As it's possible that some of the changes expose platform dependant ordering, push this earlier, to let the buildfarm shake out potentially unstable results. Discussion: &lt;20160727004333.r3e2k2y6fvk2ntup@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0137caf273f4297c4d36df3a542d7c0c853e75be">http://git.postgresql.org/pg/commitdiff/0137caf273f4297c4d36df3a542d7c0c853e75be</a></li>

<li>Fix further hash table order dependent tests. Similar to 0137caf273, this makes contrib and pl tests less dependant on hash-table order. After this commit, at least some order affecting changes to execGrouping.c don't result in regression test changes anymore. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccbb852cd6101e93976111676a90f1e5d9268951">http://git.postgresql.org/pg/commitdiff/ccbb852cd6101e93976111676a90f1e5d9268951</a></li>

<li>Make pg_dumpall's database ACL query independent of hash table order. Previously GRANT order on databases was not well defined, due to the use of EXCEPT without an ORDER BY. Add an ORDER BY, adapt test output. I don't, at the moment, see reason to backpatch this. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4fc645787cc7c614c0c97fc9fffacf2bdc6a388">http://git.postgresql.org/pg/commitdiff/b4fc645787cc7c614c0c97fc9fffacf2bdc6a388</a></li>

<li>Use more efficient hashtable for tidbitmap.c to speed up bitmap scans. Use the new simplehash.h to speed up tidbitmap.c uses. For bitmap scan heavy queries speedups of over 100% have been measured. Both lossy and exact scans benefit, but the wins are bigger for mostly exact scans. The conversion is mostly trivial, except that tbm_lossify() now restarts lossifying at the point it previously stopped. Otherwise the hash table becomes unbalanced because the scan in done in hash-order, leaving the end of the hashtable more densely filled then the beginning. That caused performance issues with dynahash as well, but due to the open chaining they were less pronounced than with the linear adressing from simplehash.h. Reviewed-By: Tomas Vondra Discussion: &lt;20160727004333.r3e2k2y6fvk2ntup@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75ae538bc3168bf44475240d4e0487ee2f3bb376">http://git.postgresql.org/pg/commitdiff/75ae538bc3168bf44475240d4e0487ee2f3bb376</a></li>

<li>Add likely/unlikely() branch hint macros. These are useful for very hot code paths. Because it's easy to guess wrongly about likelihood, and because such likelihoods change over time, they should be used sparingly. Past tests have shown it'd be a good idea to use them in some places, e.g. in error checks around ereports that ERROR out, but that's work for later. Discussion: &lt;20160727004333.r3e2k2y6fvk2ntup@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa3ca5e3dd60bf0b992b74f955378f28e601292a">http://git.postgresql.org/pg/commitdiff/aa3ca5e3dd60bf0b992b74f955378f28e601292a</a></li>

<li>Add a macro templatized hashtable. dynahash.c hash tables aren't quite fast enough for some use-cases. There are several reasons for lacking performance: The use of chaining for collision handling makes them cache inefficient, that's especially an issue when the tables get bigger. As the element sizes for dynahash are only determined at runtime, offset computations are somewhat expensive Hash and element comparisons are indirect function calls, causing unnecessary pipeline stalls It's two level structure has some benefits (somewhat natural partitioning), but increases the number of indirections to fix several of these the hash tables have to be adjusted to the individual use-case at compile-time. C unfortunately doesn't provide a good way to do compile code generation (like e.g. c++'s templates for all their weaknesses do). Thus the somewhat ugly approach taken here is to allow for code generation using a macro-templatized header file, which generates functions and types based on a prefix and other parameters. Later patches use this infrastructure to use such hash tables for tidbitmap.c (bitmap scans) and execGrouping.c (hash aggregation, ...). In queries where these use up a large fraction of the time, this has been measured to lead to performance improvements of over 100%. There are other cases where this could be useful (e.g. catcache.c). The hash table design chosen is a variant of linear open-addressing. The biggest disadvantage of simple linear addressing schemes are highly variable lookup times due to clustering, and deletions leaving a lot of tombstones around. To address these issues a variant of "robin hood" hashing is employed. Robin hood hashing optimizes chaining lengths by moving elements close to their optimal bucket ("rich" elements), out of the way if a to-be-inserted element is further away from its optimal position (i.e. it's "poor"). While that can make insertions slower, the average lookup performance is a lot better, and higher fill factors can be used in a still performant manner. To avoid tombstones - which normally solve the issue that a deleted node's presence is relevant to determine whether a lookup needs to continue looking or is done - buckets following a deleted element are shifted backwards, unless they're empty or already at their optimal position. There's further possible improvements that can be made to this implementation. Amongst others: Use distance as a termination criteria during searches. This is generally a good idea, but I've been able to see the overhead of distance calculations in some cases. Consider combining the 'empty' status into the hashvalue, and enforce storing the hashvalue. That could, in some cases, increase memory density and remove a few instructions. Experiment further with the, very conservatively choosen, fillfactor. Make maximum size of hashtable configurable, to allow storing very very large tables. That'd require 64bit hash values to be more common than now, though. some smaller memcpy calls could be optimized to copy larger chunks. But since the new implementation is already considerably faster than dynahash it seem sensible to start using it. Reviewed-By: Tomas Vondra Discussion: &lt;20160727004333.r3e2k2y6fvk2ntup@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b30d3ea824c5ccba43d3e942704f20686e7dbab8">http://git.postgresql.org/pg/commitdiff/b30d3ea824c5ccba43d3e942704f20686e7dbab8</a></li>

<li>Use more efficient hashtable for execGrouping.c to speed up hash aggregation. The more efficient hashtable speeds up hash-aggregations with more than a few hundred groups significantly. Improvements of over 120% have been measured. Due to the the different hash table queries that not fully determined (e.g. GROUP BY without ORDER BY) may change their result order. The conversion is largely straight-forward, except that, due to the static element types of simplehash.h type hashes, the additional data some users store in elements (e.g. the per-group working data for hash aggregaters) is now stored in TupleHashEntryData-&gt;additional. The meaning of BuildTupleHashTable's entrysize (renamed to additionalsize) has been changed to only be about the additionally stored size. That size is only used for the initial sizing of the hash-table. Reviewed-By: Tomas Vondra Discussion: &lt;20160727004333.r3e2k2y6fvk2ntup@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5dfc198146b49ce7ecc8a1fc9d5e171fb75f6ba5">http://git.postgresql.org/pg/commitdiff/5dfc198146b49ce7ecc8a1fc9d5e171fb75f6ba5</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Remove spurious word. Tatsuo Ishii <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/248776ea06c240ae4605e77369d66bcd7ae4f9e3">http://git.postgresql.org/pg/commitdiff/248776ea06c240ae4605e77369d66bcd7ae4f9e3</a></li>

</ul>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Fix typo. Confirmed by Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1ee762a6138df073d4b2b80c235dd9025a8532c">http://git.postgresql.org/pg/commitdiff/b1ee762a6138df073d4b2b80c235dd9025a8532c</a></li>

<li>Fix typo. Confirmed by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13d3180fd14c624bbb274e200e98ddb50e260216">http://git.postgresql.org/pg/commitdiff/13d3180fd14c624bbb274e200e98ddb50e260216</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to use pg_ctl promote -w in TAP tests.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to fix some FSM corruption.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add \setfileref to psql.</p>

<p>Heikki Linnakangas sent in two more revisions of a patch to simplify the tape block format, and add pause/resume support for tapes.</p>

<p>Thomas Munro sent in another revision of a patch to enable DISTINCT with btree skip scan.</p>

<p>Mithun Cy sent in another revision of a patch to add some tests to cover hash_index.</p>

<p>Amit Langote sent in a patch to remove the int2vector operator hash infrastructure.</p>

<p>Haribabu Kommi sent in a patch to add a 64-bit (EUI-64) MAC address data type.</p>

<p>Dilip Kumar sent in a patch to enable scan key push down to heap.</p>

<p>Haribabu Kommi sent in a patch to add a pg_stat_sql system view.</p>

<p>Jim Nasby sent in a patch to add support for SRFs and returning composites from pl/tcl.</p>

<p>Robert Haas sent in another revision of a patch to bump up max-parallel-workers.</p>

<p>Amit Kapila sent in a patch to enables parallelism for btree scans.</p>

<p>Prabhat Kumar Sahu and Jeevan Chalke traded patches to do aggregate pushdown to a foreign server.</p>

<p>Aleksander Alekseev sent in a patch to fix some infelicities in pg_filedump.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to rename pg_xlog to pg_wal and two alternatives for renaming pg_clog: pg_transaction, and pg_xact.</p>

<p>Heikki Linnakangas sent in a patch to replace the polyphase merge algorithm with a simple balanced k-way merge.</p>

<p>Micha&Atilde;&laquo;l Paquier and Heikki Linnakangas traded patches to add SCRAM auth.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to improve OOM handling in pg_locale.c.</p>

<p>Mithun Cy sent in another revision of a patch to implement failover on libpq connect level.</p>

<p>Etsuro Fujita sent in another revision of a patch to push down more full joins in postgres_fdw.</p>

<p>Peter Eisentraut sent in a patch to simplify internal archive version handling in pg_dump.</p>

<p>Etsuro Fujita sent in a patch to clarify the mention of self-joins in the DELETE documentation.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add xmltable().</p>

<p>Ashutosh Bapat sent in another revision of a patch to optimize partition-wise JOINs in tables with declarative partitions.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to improve the durability of pg_dump(all).</p>

<p>Stas Kelvich sent in a patch to fix some of the logging for 2PC.</p>

<p>Christoph Berg sent in a patch to choose a non-empty default log_line_prefix.</p>

<p>Peter Eisentraut sent in a patch to make getrusage() output a little more readable.</p>

<p>Heikki Linnakangas sent in another revision of a patch to support multi-dimensional arrays in PL/python and give a hint when [] is incorrectly used for a composite type in array.</p>

<p>Magnus Hagander sent in another revision of a patch to enable pg_basebackup to stream xlog to tar.</p>

<p>Jeff Janes sent in a patch to change the auth check in postgres_fdw to something a little stricter.</p>

<p>Jim Nasby sent in a patch to return a bitmask of NULL fields in a record.</p>