---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 juillet 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/07/08/Nouvelles-hebdomadaires-de-PostgreSQL-2-juillet-2012"
---


<p>Kevin Grittner et Dan Ports pr&eacute;senteront leurs travaux sur la <em>Serializable Snapshot Isolation</em> lors de la VLDB [ndt: conf&eacute;rence sur les tr&egrave;s grosses bases de donn&eacute;es] &agrave; Istanbul. Bien qu'ils ne soient ni les premiers ni les seuls &agrave; baser leurs recherches sur PostgreSQL, ce seront les premiers repr&eacute;sentants de la communaut&eacute; PostgreSQL &agrave; le faire&nbsp;: 

<a target="_blank" href="http://sacan.biomed.drexel.edu/vldb2012/program.php#Industrial_Session_Abstracts">http://sacan.biomed.drexel.edu/vldb2012/program.php#Industrial_Session_Abstracts</a> <a target="_blank" href="http://drkp.net/drkp/papers/ssi-vldb12.pdf">http://drkp.net/drkp/papers/ssi-vldb12.pdf</a></p>

<p>La PostgreSQL Conference Europe 2012 &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre, accepte &agrave; pr&eacute;sent les inscriptions aux conf&eacute;rences&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/registration/">http://2012.pgconf.eu/registration/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>AnySQL Maestro 12.6, un outil de gestion bas&eacute; sur ODBC, compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/datawizard/">http://www.sqlmaestro.com/products/postgresql/datawizard/</a></li>

<li>pg_extractor 1.2.0, un plugin permettant de personnaliser pg_dump&nbsp;: 

<a target="_blank" href="https://github.com/omniti-labs/pg_extractor">https://github.com/omniti-labs/pg_extractor</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-07/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<p>Toutes les nouvelles &eacute;taient globales, cette semaine.</p>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-07/msg00001.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix warning for 64-bit literal on 32-bit build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c7f954d310783d49724367c9fa6514bc62b7cce">http://git.postgresql.org/pg/commitdiff/5c7f954d310783d49724367c9fa6514bc62b7cce</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove sanity test in XRecOffIsValid. Commit 061e7efb1b4c5b8a5d02122b7780531b8d5bf23d changed the rules for splitting xlog records across pages, but neglected to update this test. It's possible that there's some better action here than just removing the test completely, but this at least appears to get some of the things that are currently broken (like initdb on MacOS X) working again. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2dfa87bcb6eb3ee6e41c40ed4a8a43019a66bd38">http://git.postgresql.org/pg/commitdiff/2dfa87bcb6eb3ee6e41c40ed4a8a43019a66bd38</a></li>

<li>Fix typo in DEBUG message, introduced by recent WAL refactoring. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c7d47abd04dc1322fd545370cfeb743680df0e3a">http://git.postgresql.org/pg/commitdiff/c7d47abd04dc1322fd545370cfeb743680df0e3a</a></li>

<li>Unbreak pg_resetxlog -l. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a6427f1f478b0bf43d1b861ee4053e2e8bc6118b">http://git.postgresql.org/pg/commitdiff/a6427f1f478b0bf43d1b861ee4053e2e8bc6118b</a></li>

<li>Backport fsync queue compaction logic to all supported branches. This backports commit 7f242d880b5b5d9642675517466d31373961cf98, except for the counter in pg_stat_bgwriter. The underlying problem (namely, that a full fsync request queue causes terrible checkpoint behavior) continues to be reported in the wild, and this code seems to be safe and robust enough to risk back-porting the fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73a3b1d4589eaf3dc7f0a573727a2a6ac5279e6a">http://git.postgresql.org/pg/commitdiff/73a3b1d4589eaf3dc7f0a573727a2a6ac5279e6a</a></li>

<li>Reduce use of heavyweight locking inside hash AM. Avoid using LockPage(rel, 0, lockmode) to protect against changes to the bucket mapping. Instead, an exclusive buffer content lock is now viewed as sufficient permission to modify the metapage, and a shared buffer content lock is used when such modifications need to be prevented. This more relaxed locking regimen makes it possible that, when we're busy getting a heavyweight bucket on the bucket we intend to search or insert into, a bucket split might occur underneath us. To compenate for that possibility, we use a loop-and-retry system: release the metapage content lock, acquire the heavyweight lock on the target bucket, and then reacquire the metapage content lock and check that the bucket mapping has not changed. Normally it hasn't, and we're done. But if by chance it has, we simply unlock the metapage, release the heavyweight lock we acquired previously, lock the new bucket, and loop around again. Even in the worst case we cannot loop very many times here, since we don't split the same bucket again until we've split all the other buckets, and 2^N gets big pretty fast. This results in greatly improved concurrency, because we're effectively replacing two lwlock acquire-and-release cycles in exclusive mode (on one of the lock manager locks) with a single acquire-and-release cycle in shared mode (on the metapage buffer content lock). Testing shows that it's still not quite as good as btree; for that, we'd probably have to find some way of getting rid of the heavyweight bucket locks as well, which does not appear straightforward. Patch by me, review by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/76837c1507cb5a5a0048046233568447729e66dd">http://git.postgresql.org/pg/commitdiff/76837c1507cb5a5a0048046233568447729e66dd</a></li>

<li>Make DROP FUNCTION hint more informative. If you decide you want to take the hint, this gives you something you can paste right back to the server. Dean Rasheed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0caa0d04db24d2c571fa7daa410bc6a5b319a2a2">http://git.postgresql.org/pg/commitdiff/0caa0d04db24d2c571fa7daa410bc6a5b319a2a2</a></li>

<li>When LWLOCK_STATS is defined, count spindelays. When LWLOCK_STATS is *not* defined, the only change is that SpinLockAcquire now returns the number of delays. Patch by me, review by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b79ab00144e64217d418fde884bca8ea58fbd4a4">http://git.postgresql.org/pg/commitdiff/b79ab00144e64217d418fde884bca8ea58fbd4a4</a></li>

<li>Allow pg_terminate_backend() to be used on backends with matching role. A similar change was made previously for pg_cancel_backend, so now it all matches again. Dan Farina, reviewed by Fujii Masao, Noah Misch, and Jeff Davis, with slight kibitzing on the doc changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c60ca19de9ad777c51243605571d1d7606000f08">http://git.postgresql.org/pg/commitdiff/c60ca19de9ad777c51243605571d1d7606000f08</a></li>

<li>Update release notes for pg_terminate_backend changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7700b82e6b071f298e3426042197c13843a5b499">http://git.postgresql.org/pg/commitdiff/7700b82e6b071f298e3426042197c13843a5b499</a></li>

<li>Add missing space in event_source GUC description. This has apparently been wrong since event_source was added. Alexander Lakhin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5b3451a8e72cb7825933d4f4827f467cb38b498">http://git.postgresql.org/pg/commitdiff/c5b3451a8e72cb7825933d4f4827f467cb38b498</a></li>

<li>Dramatically reduce System V shared memory consumption. Except when compiling with EXEC_BACKEND, we'll now allocate only a tiny amount of System V shared memory (as an interlock to protect the data directory) and allocate the rest as anonymous shared memory via mmap. This will hopefully spare most users the hassle of adjusting operating system parameters before being able to start PostgreSQL with a reasonable value for shared_buffers. There are a bunch of documentation updates needed here, and we might need to adjust some of the HINT messages related to shared memory as well. But it's not 100% clear how portable this is, so before we write the documentation, let's give it a spin on the buildfarm and see what turns red. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0fc0df9364d2d2d17c0162cf3b8b59f6cb09f67">http://git.postgresql.org/pg/commitdiff/b0fc0df9364d2d2d17c0162cf3b8b59f6cb09f67</a></li>

<li>Fix broken mmap failure-detection code, and improve error message. Per an observation by Thom Brown that my previous commit made an overly large shmem allocation crash the server, on Linux. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39715af23ae459684963c350dd69eafa2d502e7e">http://git.postgresql.org/pg/commitdiff/39715af23ae459684963c350dd69eafa2d502e7e</a></li>

<li>Make walsender more responsive. Per testing by Andres Freund, this improves replication performance and reduces replication latency and latency jitter. I was a bit concerned about moving more work into XLogInsert, but testing seems to show that it's not a problem in practice. Along the way, improve comments for WaitLatchOrSocket. Andres Freund. Review and stylistic cleanup by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f83b59997d29f06c3d67e7eb9a1f2c9cd017d665">http://git.postgresql.org/pg/commitdiff/f83b59997d29f06c3d67e7eb9a1f2c9cd017d665</a></li>

<li>Make commit_delay much smarter. Instead of letting every backend participating in a group commit wait independently, have the first one that becomes ready to flush WAL wait for the configured delay, and let all the others wait just long enough for that first process to complete its flush. This greatly increases the chances of being able to configure a commit_delay setting that actually improves performance. As a side consequence of this change, commit_delay now affects all WAL flushes, rather than just commits. There was some discussion on pgsql-hackers about whether to rename the GUC to, say, wal_flush_delay, but in the absence of consensus I am leaving it alone for now. Peter Geoghegan, with some changes, mostly to the documentation, by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f11e8be3e812cdbbc139c1b4e49141378b118dee">http://git.postgresql.org/pg/commitdiff/f11e8be3e812cdbbc139c1b4e49141378b118dee</a></li>

<li>Work a little harder on comments for walsender wakeup patch. Per gripe from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82cdd2df759efe2b43183ee954b4a2e10b2c59f4">http://git.postgresql.org/pg/commitdiff/82cdd2df759efe2b43183ee954b4a2e10b2c59f4</a></li>

<li>Fix position of WalSndWakeupRequest call. This avoids discriminating against wal_sync_method = open_sync or open_datasync. Fujii Masao, reviewed by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bb592bb20d02093d6488a57c7c4ee94803ddc9a">http://git.postgresql.org/pg/commitdiff/3bb592bb20d02093d6488a57c7c4ee94803ddc9a</a></li>

<li>Fix a stupid bug I introduced into XLogFlush(). Commit f11e8be3e812cdbbc139c1b4e49141378b118dee broke this; it was right in Peter's original patch, but I messed it up before committing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cf39e6ddbece4000ee56a0f79cdbe71fb2865ff">http://git.postgresql.org/pg/commitdiff/3cf39e6ddbece4000ee56a0f79cdbe71fb2865ff</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Unify calling conventions for postgres/postmaster sub-main functions. There was a wild mix of calling conventions: Some were declared to return void and didn't return, some returned an int exit code, some claimed to return an exit code, which the callers checked, but actually never returned, and so on. Now all of these functions are declared to return void and decorated with attribute noreturn and don't return. That's easiest, and most code already worked that way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eeece9e60984e76e5a41c1e2fa9efc5a1761e560">http://git.postgresql.org/pg/commitdiff/eeece9e60984e76e5a41c1e2fa9efc5a1761e560</a></li>

<li>Use system install program when available and usable. In a3176dac22c4cd14971e35119e245abee7649cb9 we switched to using install-sh unconditionally, because the configure check AC_PROG_INSTALL would pick up any random program named install, which has caused failure reports ( 

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2001-03/msg00312.php).">http://archives.postgresql.org/pgsql-hackers/2001-03/msg00312.php).</a> Now the configure check is much improved and should avoid false positives. It has also been shown that using a system install program can significantly reduce "make install" times, so it's worth trying. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9db7ccae2000524b72a4052352cbb5407fb53b02">http://git.postgresql.org/pg/commitdiff/9db7ccae2000524b72a4052352cbb5407fb53b02</a></li>

<li>Fix install program detection. configure handles INSTALL as a substitution variable specially, and apparently it gets confused when it's set to empty. Use INSTALL_ instead as a workaround to avoid the issue. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7867154129781ee1522344bef50890c01f2b47a">http://git.postgresql.org/pg/commitdiff/f7867154129781ee1522344bef50890c01f2b47a</a></li>

<li>Further fix install program detection. The $(or) make function was introduced in GNU make 3.81, so the previous coding didn't work in 3.80. Write it differently, and improve the variable naming to make more sense in the new coding. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcd5af6c3498a265053aa3292d41c3946e225627">http://git.postgresql.org/pg/commitdiff/dcd5af6c3498a265053aa3292d41c3946e225627</a></li>

<li>Make init-po and update-po recursive make targets. This is for convenience, now that adding recursive targets is much easier than it used to be when the NLS stuff was initially added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b344c651fb87cb7c7f9f59b714e2879e777caf66">http://git.postgresql.org/pg/commitdiff/b344c651fb87cb7c7f9f59b714e2879e777caf66</a></li>

<li>initdb: Update check_need_password for new options. Change things so that something like initdb --auth-local=peer --auth-host=md5 does not cause a "must specify a password" error, like initdb -A md5 does. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4ffa86b5739fdf85b1050c4b2e26ab14ef476e9">http://git.postgresql.org/pg/commitdiff/e4ffa86b5739fdf85b1050c4b2e26ab14ef476e9</a></li>

<li>Assorted message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b44306315cf84479f735b12f78499616172dbb9">http://git.postgresql.org/pg/commitdiff/2b44306315cf84479f735b12f78499616172dbb9</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tighten up includes in sinvaladt.h, twophase.h, proc.h. Remove proc.h from sinvaladt.h and twophase.h; also replace xlog.h in proc.h with xlogdefs.h. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77ed0c69504aad141dea314b1de261195aae5c9e">http://git.postgresql.org/pg/commitdiff/77ed0c69504aad141dea314b1de261195aae5c9e</a></li>

<li>pg_upgrade: fix off-by-one mistake in snprintf. snprintf counts trailing NUL towards the char limit. Failing to account for that was causing an invalid value to be passed to pg_resetxlog -l, aborting the upgrade process. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e26326ad6cd11ac32d11e6cbeb613443f361da6">http://git.postgresql.org/pg/commitdiff/9e26326ad6cd11ac32d11e6cbeb613443f361da6</a></li>

<li>Make the pg_upgrade log files contain actual commands. Now the log file not only contains the output from commands executed by system(), but also what command it was in the first place. This arrangement makes debugging a lot simpler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4741e9afb93f0d769655b2d18c2b73b86f281010">http://git.postgresql.org/pg/commitdiff/4741e9afb93f0d769655b2d18c2b73b86f281010</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make pg_dump emit more accurate dependency information. While pg_dump has included dependency information in archive-format output ever since 7.3, it never made any large effort to ensure that that information was actually useful. In particular, in common situations where dependency chains include objects that aren't separately emitted in the dump, the dependencies shown for objects that were emitted would reference the dump IDs of these un-dumped objects, leaving no clue about which other objects the visible objects indirectly depend on. So far, parallel pg_restore has managed to avoid tripping over this misfeature, but only by dint of some crude hacks like not trusting dependency information in the pre-data section of the archive. It seems prudent to do something about this before it rises up to bite us, so instead of emitting the "raw" dependencies of each dumped object, recursively search for its actual dependencies among the subset of objects that are being dumped. Back-patch to 9.2, since that code hasn't yet diverged materially from HEAD. At some point we might need to back-patch further, but right now there are no known cases where this is actively necessary. (The one known case, bug #6699, is fixed in a different way by my previous patch.) Since this patch depends on 9.2 changes that made TOC entries be marked before output commences as to whether they'll be dumped, back-patching further would require additional surgery; and as of now there's no evidence that it's worth the risk. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a504a363925fc5c7af48cd723da3f7e4d7ba9e2">http://git.postgresql.org/pg/commitdiff/8a504a363925fc5c7af48cd723da3f7e4d7ba9e2</a></li>

<li>Improve pg_dump's dependency-sorting logic to enforce section dump order. As of 9.2, with the --section option, it is very important that the concept of "pre data", "data", and "post data" sections of the output be honored strictly; else a dump divided into separate sectional files might be unrestorable. However, the dependency-sorting logic knew nothing of sections and would happily select output orderings that didn't fit that structure. Doing so was mostly harmless before 9.2, but now we need to be sure it doesn't do that. To fix, create dummy objects representing the section boundaries and add dependencies between them and all the normal objects. (This might sound expensive but it seems to only add a percent or two to pg_dump's runtime.) This also fixes a problem introduced in 9.1 by the feature that allows incomplete GROUP BY lists when a primary key is given in GROUP BY. That means that views can depend on primary key constraints. Previously, pg_dump would deal with that by simply emitting the primary key constraint before the view definition (and hence before the data section of the output). That's bad enough for simple serial restores, where creating an index before the data is loaded works, but is undesirable for speed reasons. But it could lead to outright failure of parallel restores, as seen in bug #6699 from Joe Van Dyk. That happened because pg_restore would switch into parallel mode as soon as it reached the constraint, and then very possibly would try to emit the view definition before the primary key was committed (as a consequence of another bug that causes the view not to be correctly marked as depending on the constraint). Adding the section boundary constraints forces the dependency-sorting code to break the view into separate table and rule declarations, allowing the rule, and hence the primary key constraint it depends on, to revert to their intended location in the post-data section. This also somewhat accidentally works around the bogus-dependency-marking problem, because the rule will be correctly shown as depending on the constraint, so parallel pg_restore will now do the right thing. (We will fix the bogus-dependency problem for real in a separate patch, but that patch is not easily back-portable to 9.1, so the fact that this patch is enough to dodge the only known symptom is fortunate.) Back-patch to 9.1, except for the hunk that adds verification that the finished archive TOC list is in correct section order; the place where it was convenient to add that doesn't exist in 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1ef01fe163b304760088e3e30eb22036910a495">http://git.postgresql.org/pg/commitdiff/a1ef01fe163b304760088e3e30eb22036910a495</a></li>

<li>Cope with smaller-than-normal BLCKSZ setting in SPGiST indexes on text. The original coding failed miserably for BLCKSZ of 4K or less, as reported by Josh Kupershmidt. With the present design for text indexes, a given inner tuple could have up to 256 labels (requiring either 3K or 4K bytes depending on MAXALIGN), which means that we can't positively guarantee no failures for smaller blocksizes. But we can at least make it behave sanely so long as there are few enough labels to fit on a page. Considering that btree is also more prone to "index tuple too large" failures when BLCKSZ is small, it's not clear that we should expend more work than this on this case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/757773602c424b1e51c2d9cad8a59398ba7f7b2c">http://git.postgresql.org/pg/commitdiff/757773602c424b1e51c2d9cad8a59398ba7f7b2c</a></li>

<li>Make UtilityContainsQuery recurse until it finds a non-utility Query. The callers of UtilityContainsQuery want it to return a non-utility Query if it returns anything at all. However, since we made CREATE TABLE Alexander Shulgin/SELECT INTO into a utility command instead of a variant of SELECT, a command like "EXPLAIN SELECT INTO" results in two nested utility statements. So what we need UtilityContainsQuery to do is drill down to the bottom non-utility Query. I had thought of this possibility in setrefs.c, and fixed it there by looping around the UtilityContainsQuery call; but overlooked that the call sites in plancache.c have a similar issue. In those cases it's notationally inconvenient to provide an external loop, so let's redefine UtilityContainsQuery as recursing down to a non-utility Query instead. Noted by Rushabh Lathia. This is a somewhat cleaned-up version of his proposed patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bde689f809027422d4c0baaa3e63b69ce5762e2c">http://git.postgresql.org/pg/commitdiff/bde689f809027422d4c0baaa3e63b69ce5762e2c</a></li>

<li>Provide MAP_FAILED if sys/mman.h doesn't. On old HPUX this has to be #defined to -1. It might be that other values are required on other dinosaur systems, but we'll worry about that when and if we get reports. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1494b733015bf09d75c362925ec3f2740a77f73">http://git.postgresql.org/pg/commitdiff/c1494b733015bf09d75c362925ec3f2740a77f73</a></li>

<li>Fix NOTIFY to cope with I/O problems, such as out-of-disk-space. The LISTEN/NOTIFY subsystem got confused if SimpleLruZeroPage failed, which would typically happen as a result of a write() failure while attempting to dump a dirty pg_notify page out of memory. Subsequently, all attempts to send more NOTIFY messages would fail with messages like "Could not read from file "pg_notify/nnnn" at offset nnnnn: Success". Only restarting the server would clear this condition. Per reports from Kevin Grittner and Christoph Berg. Back-patch to 9.0, where the problem was introduced during the LISTEN/NOTIFY rewrite. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae90128dc5f8412c8ce31804bbf0a0f8ab345db1">http://git.postgresql.org/pg/commitdiff/ae90128dc5f8412c8ce31804bbf0a0f8ab345db1</a></li>

<li>Fix confusion between "size" and "AnonymousShmemSize". Noted by Andres Freund. Also improve a couple of comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42e2ce6ae3e931953135a55b173a5ec4c54506c4">http://git.postgresql.org/pg/commitdiff/42e2ce6ae3e931953135a55b173a5ec4c54506c4</a></li>

<li>Prevent CREATE TABLE LIKE/INHERITS from (mis) copying whole-row Vars. If a CHECK constraint or index definition contained a whole-row Var (that is, "table.*"), an attempt to copy that definition via CREATE TABLE LIKE or table inheritance produced incorrect results: the copied Var still claimed to have the rowtype of the source table, rather than the created table. For the LIKE case, it seems reasonable to just throw error for this situation, since the point of LIKE is that the new table is not permanently coupled to the old, so there's no reason to assume its rowtype will stay compatible. In the inheritance case, we should ideally allow such constraints, but doing so will require nontrivial refactoring of CREATE TABLE processing (because we'd need to know the OID of the new table's rowtype before we adjust inherited CHECK constraints). In view of the lack of previous complaints, that doesn't seem worth the risk in a back-patched bug fix, so just make it throw error for the inheritance case as well. Along the way, replace change_varattnos_of_a_node() with a more robust function map_variable_attnos(), which is capable of being extended to handle insertion of ConvertRowtypeExpr whenever we get around to fixing the inheritance case nicely, and in the meantime it returns a failure indication to the caller so that a helpful message with some context can be thrown. Also, this code will do the right thing with subselects (if we ever allow them in CHECK or indexes), and it range-checks varattnos before using them to index into the map array. Per report from Sergey Konoplev. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/541ffa65c32b278da8ab2d19433fa6d37bd15c8d">http://git.postgresql.org/pg/commitdiff/541ffa65c32b278da8ab2d19433fa6d37bd15c8d</a></li>

<li>Declare AnonymousShmem pointer as "void *". The original coding had it as "PGShmemHeader *", but that doesn't offer any notational benefit because we don't dereference it. And it was resulting in compiler warnings on some platforms, notably buildfarm member castoroides, where mmap() and munmap() are evidently declared to take and return "char *". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81e82643837de93909e0c5a8e14e805f3f69f41e">http://git.postgresql.org/pg/commitdiff/81e82643837de93909e0c5a8e14e805f3f69f41e</a></li>

<li>Remove inappropriate semicolons after function definitions. Solaris Studio warns about this, and some compilers might think it's an outright syntax error. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa188b5ef568446fe06fa6268c5592b12119c834">http://git.postgresql.org/pg/commitdiff/fa188b5ef568446fe06fa6268c5592b12119c834</a></li>

<li>Suppress compiler warnings in readfuncs.c. Commit 7357558fc8866e3a449aa9473c419b593d67b5b6 introduced "(void) token;" into the READ_TEMP_LOCALS() macro, to suppress complaints from gcc 4.6 when the value of token was not used anywhere in a particular node-read function. However, this just moved the warning around: inspection of buildfarm results shows that some compilers are now complaining that token is being read before it's set. Revert the READ_TEMP_LOCALS() macro change and instead put "(void) token;" into READ_NODE_FIELD(), which is the principal culprit for cases where the warning might occur. In principle we might need the same in READ_BITMAPSET_FIELD() and/or READ_LOCATION_FIELD(), but it seems unlikely that a node would consist only of such fields, so I'll leave them alone for now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39bfc94c86f1990e9db8ea3da0e82995cc1b76db">http://git.postgresql.org/pg/commitdiff/39bfc94c86f1990e9db8ea3da0e82995cc1b76db</a></li>

<li>Fix race condition in enum value comparisons. When (re) loading the typcache comparison cache for an enum type's values, use an up-to-date MVCC snapshot, not the transaction's existing snapshot. This avoids problems if we encounter an enum OID that was created since our transaction started. Per report from Andres Freund and diagnosis by Robert Haas. To ensure this is safe even if enum comparison manages to get invoked before we've set a transaction snapshot, tweak GetLatestSnapshot to redirect to GetTransactionSnapshot instead of throwing error when FirstSnapshotSet is false. The existing uses of GetLatestSnapshot (in ri_triggers.c) don't care since they couldn't be invoked except in a transaction that's already done some work --- but it seems just conceivable that this might not be true of enums, especially if we ever choose to use enums in system catalogs. Note that the comparable coding in enum_endpoint and enum_range_internal remains GetTransactionSnapshot; this is perhaps debatable, but if we changed it those functions would have to be marked volatile, which doesn't seem attractive. Back-patch to 9.1 where ALTER TYPE ADD VALUE was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ad45c18b6c8d03ce18a26223eb0d15e900c7a2c">http://git.postgresql.org/pg/commitdiff/9ad45c18b6c8d03ce18a26223eb0d15e900c7a2c</a></li>

<li>Fix to_date's handling of year 519. A thinko in commit 029dfdf1157b6d837a7b7211cd35b00c6bcd767c caused the year 519 to be handled differently from either adjacent year, which was not the intention AFAICS. Report and diagnosis by Marc Cousin. In passing, remove redundant re-tests of year value. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41f4a0ab789463971add986dbc778d77ec5a0ef4">http://git.postgresql.org/pg/commitdiff/41f4a0ab789463971add986dbc778d77ec5a0ef4</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_upgrade, broken by the xlogid/segno -&gt; 64-bit int refactoring. The xlogid + segno representation of a particular WAL segment doesn't make much sense in pg_resetxlog anymore, now that we don't use that anywhere else. Use the WAL filename instead, since that's a convenient way to name a particular WAL segment. I did this partially for pg_resetxlog in the original xlogid/segno -&gt; uint64 patch, but I neglected pg_upgrade and the docs. This should now be more complete. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/038f3a05092365eca070bdc588554520dfd5ffb9">http://git.postgresql.org/pg/commitdiff/038f3a05092365eca070bdc588554520dfd5ffb9</a></li>

<li>I neglected many comments in the log+seg -&gt; 64-bit segno patch. Fix. Reported by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec786c6c81bfa1067319305ff84b862eba3b2f27">http://git.postgresql.org/pg/commitdiff/ec786c6c81bfa1067319305ff84b862eba3b2f27</a></li>

<li>Fix two more neglected comments, still referring to log/seg. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8f97b39c70e831ced842eb7e41f810bee63e431">http://git.postgresql.org/pg/commitdiff/a8f97b39c70e831ced842eb7e41f810bee63e431</a></li>

<li>Update outdated commit; xlp_rem_len field is in page header now. Spotted by Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f85667a860437c50ae13008cad5359909388d3e">http://git.postgresql.org/pg/commitdiff/8f85667a860437c50ae13008cad5359909388d3e</a></li>

<li>Initialize shared memory copy of ckptXidEpoch correctly when not in recovery. This bug was introduced by commit 20d98ab6e4110087d1816cd105a40fcc8ce0a307, so backpatch this to 9.0-9.2 like that one. This fixes bug #6710, reported by Tarvi Pillessaar 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a5c9ca93ad7d9b84f612d6157bf8990c7041d3c">http://git.postgresql.org/pg/commitdiff/7a5c9ca93ad7d9b84f612d6157bf8990c7041d3c</a></li>

<li>Validate xlog record header before enlarging the work area to store it. If the record header is garbled, we're now quite likely to notice it before we try to make a bogus memory allocation and run out of memory. That can still happen, if the xlog record is split across pages (we cannot verify the record header until reading the next page in that scenario), but this reduces the chances. An out-of-memory is treated as a corrupt record anyway, so this isn't a correctness issue, just a case of giving a better error message. Per Amit Kapila's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/567787f216da750b3805aea6fd8aef19e8b882a1">http://git.postgresql.org/pg/commitdiff/567787f216da750b3805aea6fd8aef19e8b882a1</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alvaro Herrera and Kevin Grittner traded patches to implement foreign key locks.</li>

<li>Alvaro Herrera and Zoltan Boszormenyi traded patches to implement a lock_timeout and SIGALARM framework.</li>

<li>Ryan Kelly sent in another revision of the patch to allow breaking out of hung connection attempts in psql.</li>

<li>KaiGai Kohei and Etsuro Fujita traded new revisions of the patch to add an option to allow selective binary conversion for CSV foreign tables.</li>

<li>Satoshi Nagayasu sent in two revisions of a patch to add a pg_stat_lwlocks system view.</li>

<li>Pavel Stehule sent in a PoC patch to see psql client-side variables in SQL.</li>

<li>Pavel Stehule sent in another revision of the patch to add a way to check PL/pgsql functions.</li>

<li>Fujii Masao sent in another revision of the patch to report the WAL file containing checkpoint's REDO record in pg_controldata output.</li>

<li>Nils Goroll sent in three revisions of a patch to replace s_lock spinlock code with pthread_mutex on linux.</li>

<li>Andres Freund sent in three revisions of a patch to add an embedded list to the back-end.</li>

<li>Fujii Masao sent in two revisions of a patch to keep pg_basebackup from blocking all queries, which resulted in horrible performance.</li>

<li>Magnus Hagander sent in three revisions of a patch to output the part of the pg_hba.conf that's erroring out.</li>

<li>Josh Kupershmidt sent in two revisions of a patch to make pg_signal_backend() symmetric with respect to database super-user-ness.</li>

<li>Peter Eisentraut sent in a patch to ensure that initdb only errors out asking for a password in cases where PostgreSQL would control that password.</li>

<li>Alex Hunsaker and Marco Nenciarini traded patches to add array_remove() and array_replace() functions.</li>

<li>Peter Eisentraut sent in a patch to make static code analyzers happier about elog/ereport's not returning anything.</li>

<li>Alexander Korotkov sent in another revision of the patch to add conversion from pg_wchar to multibyte.</li>

<li>Zoltan Boszormenyi sent in a patch to make pg_basebackup configure and start the standby.</li>

<li>Dean Rasheed sent in a PoC patch to implement updateable views.</li>

<li>Peter Geoghegan sent in two more revisions of a patch to enhance the data structure on which error messages are based.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add event triggers. Thom Brown responded with some corrections of the included docs.</li>

<li>Robert Haas sent in a patch to demote "implicit creation" messages, quieting, at the default logging level, output for the operations that cause them.</li>

<li>Amit Kapila sent in a patch to unify the parsing of pg_ident.conf and pg_hba.conf.</li>

<li>KaiGai Kohei sent in a patch to track the user ID from when a portal was started in case of changes.</li>

</ul>