---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 mars 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/03/28/Nouvelles-hebdomadaires-de-PostgreSQL-23-mars-2014"
---


<p>Les versions correctives 9.3.4, 9.2.8, 9.1.13, 9.0.17 et 8.4.21 sont disponibles. Mettez &agrave; jour d&egrave;s que possible&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/news/1511/">http://www.postgresql.org/about/news/1511/</a> [ndt: <a href="http://blog.postgresql.fr/index.php?post/2014/03/20/Sortie-des-versions-correctives-9.3.4%2C-9.2.8%2C-9.1.13%2C-9.0.17%2C-et-8.4.21" target="_blank">vf</a>]</p>

<p>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></p>

<p>Les appels &agrave; conf&eacute;renciers pour Char(13) et le PGDay anglais, les 8 et 9 juillet 2014 respectivement, ont &eacute;t&eacute; lanc&eacute;s et les r&eacute;ponses sont attendues avant le 17 avril. speakers AT char14 DOT info, et speakers AT postgresqlusergroup DOT org DOT uk, respectivement&nbsp;: 

<a target="_blank" href="http://www.char14.info">http://www.char14.info</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>DataFiller version 2.0.0, un g&eacute;n&eacute;rateur de donn&eacute;es al&eacute;atoires pour PostgreSQL se basant sur un sch&eacute;ma de base de donn&eacute;es et une s&eacute;rie de directives en commentaire&nbsp;: 

<a target="_blank" href="http://blog.coelho.net/database/2014/03/23/datafiller-2-0-0/">http://blog.coelho.net/database/2014/03/23/datafiller-2-0-0/</a></li>

<li>Npgsql2 2.1.0, un connecteur .NET pour PostgreSQL&nbsp;: 

<a target="_blank" href="https://www.nuget.org/packages/Npgsql/2.1.0">https://www.nuget.org/packages/Npgsql/2.1.0</a> <a target="_blank" href="https://github.com/npgsql/Npgsql/releases/tag/v2.1.0">https://github.com/npgsql/Npgsql/releases/tag/v2.1.0</a></li>

<li>Repmgr 2.0, un logiciel de gestion de cluster haute-disponibilit&eacute; et r&eacute;plication pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.repmgr.org">http://www.repmgr.org</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140324062427.GA10251@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix small typo in comment. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02703ff2277791a7f1bccf61124bee830f2b5fcb">http://git.postgresql.org/pg/commitdiff/02703ff2277791a7f1bccf61124bee830f2b5fcb</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in clean shutdown of walsender that pg_receiving is connecting to. On clean shutdown, walsender waits for all WAL to be replicated to a standby, and exits. It determined whether that replication had been completed by checking whether its sent location had been equal to a standby's flush location. Unfortunately this condition never becomes true when the standby such as pg_receivexlog which always returns an invalid flush location is connecting to walsender, and then walsender waits forever. This commit changes walsender so that it just checks a standby's write location if a flush location is invalid. Back-patch to 9.1 where enough infrastructure for this exists. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c6d9fc4b2b8b6688a482a4b4116d7642e36b9d9">http://git.postgresql.org/pg/commitdiff/5c6d9fc4b2b8b6688a482a4b4116d7642e36b9d9</a></li>

<li>Fix typos in comments. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bccced110025f48bf426a8a9d7f627ef3663fcd">http://git.postgresql.org/pg/commitdiff/2bccced110025f48bf426a8a9d7f627ef3663fcd</a></li>

<li>Fix help message and document in pg_receivexlog. Add SLOTNAME placeholder to --slot option in help message and document. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e726e59dc4845fff1e0e5849ef8d0bae958002fd">http://git.postgresql.org/pg/commitdiff/e726e59dc4845fff1e0e5849ef8d0bae958002fd</a></li>

<li>Some minor improvements to logical decoding document. Also improve help message in pg_recvlogical. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb1d92a9fa0226c435daf16d08e5d05d6986fc54">http://git.postgresql.org/pg/commitdiff/fb1d92a9fa0226c435daf16d08e5d05d6986fc54</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko: have trueTriConsistentFn return GIN_TRUE. While we're at it, also improve comments in ginlogic.c. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d663d4399e767223e454302ea90d04f78b2f9d29">http://git.postgresql.org/pg/commitdiff/d663d4399e767223e454302ea90d04f78b2f9d29</a></li>

<li>Make the handling of interrupted B-tree page splits more robust. Splitting a page consists of two separate steps: splitting the child page, and inserting the downlink for the new right page to the parent. Previously, we handled the case that you crash in between those steps with a cleanup routine after the WAL recovery had finished, which finished the incomplete split. However, that doesn't help if the page split is interrupted but the database doesn't crash, so that you don't perform WAL recovery. That could happen for example if you run out of disk space. Remove the end-of-recovery cleanup step. Instead, when a page is split, the left page is marked with a new INCOMPLETE_SPLIT flag, and when the downlink is inserted to the parent, the flag is cleared again. If an insertion sees a page with the flag set, it knows that the split was interrupted for some reason, and inserts the missing downlink before proceeding. I used the same approach to fix GIN and GiST split algorithms earlier. This was the last WAL cleanup routine, so we could get rid of that whole machinery now, but I'll leave that for a separate patch. Reviewed by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40dae7ec537c5619fc93ad602c62f37be786d161">http://git.postgresql.org/pg/commitdiff/40dae7ec537c5619fc93ad602c62f37be786d161</a></li>

<li>Fix misc typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d3b258cbe4aedfb49c92c28b9cbd7c18d277e04">http://git.postgresql.org/pg/commitdiff/1d3b258cbe4aedfb49c92c28b9cbd7c18d277e04</a></li>

<li>Fix compilation of pg_xlogdump, now that rm_safe_restartpoint is no more. Oops. Pointed out by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/033dc1c92cf018d396e983d425b821dda420cfff">http://git.postgresql.org/pg/commitdiff/033dc1c92cf018d396e983d425b821dda420cfff</a></li>

<li>Remove rm_safe_restartpoint machinery. It is no longer used, none of the resource managers have multi-record actions that would make it unsafe to perform a restartpoint. Also don't allow rm_cleanup to write WAL records, it's also no longer required. Move the call to rm_cleanup routines to make it more symmetric with rm_startup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59a5ab3f426e74e3f901dc2cf533726bcea08ed2">http://git.postgresql.org/pg/commitdiff/59a5ab3f426e74e3f901dc2cf533726bcea08ed2</a></li>

<li>Replace the XLogInsert slots with regular LWLocks. The special feature the XLogInsert slots had over regular LWLocks is the insertingAt value that was updated atomically with releasing backends waiting on it. Add new functions to the LWLock API to do that, and replace the slots with LWLocks. This reduces the amount of duplicated code. (There's still some duplication, but at least it's all in lwlock.c now.) Reviewed by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68a2e52bbaf98f136a96b3a0d734ca52ca440a95">http://git.postgresql.org/pg/commitdiff/68a2e52bbaf98f136a96b3a0d734ca52ca440a95</a></li>

<li>Fix build with LWLOCK_STATS or dtrace. Also fix the name of the dtrace probe for LWLockAcquireOrWait(). The function was renamed from LWLockWaitUntilFree to LWLockAqcuireOrWait, but the dtrace probe was neglected. Pointed out by Andres Freund and the buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dea6ed2c980286e89caf4166ad329f506abbff29">http://git.postgresql.org/pg/commitdiff/dea6ed2c980286e89caf4166ad329f506abbff29</a></li>

<li>Fix thinkos in GinLogicValue enum. It was incorrectly declared as global variable, not an enum type, and the comments for GIN_FALSE and GIN_TRUE were backwards. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c0e97c2d58f1cec9fc24237342962811de3cfee">http://git.postgresql.org/pg/commitdiff/4c0e97c2d58f1cec9fc24237342962811de3cfee</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>During index build, check and elog (not just Assert) for broken HOT chain. The recently-fixed bug in WAL replay could result in not finding a parent tuple for a heap-only tuple. The existing code would either Assert or generate an invalid index entry, neither of which is desirable. Throw a regular error instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d70cf811f7dd26c07dbb78df4a51b667e7a3489b">http://git.postgresql.org/pg/commitdiff/d70cf811f7dd26c07dbb78df4a51b667e7a3489b</a></li>

<li>Release notes for 9.3.4, 9.2.8, 9.1.13, 9.0.17, 8.4.21. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/551fb5ac742eb7dbf92aa80743aa5a52b8a0189f">http://git.postgresql.org/pg/commitdiff/551fb5ac742eb7dbf92aa80743aa5a52b8a0189f</a></li>

<li>Fix pg_dumpall option parsing: -i doesn't take an argument. This used to work properly, but got fat-fingered in commit 3dee636e0404885d07885d41c0d70e50c784f324. Per bug #9620 from Nicolas Payart. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19f2d6cdae2bfa97c2ce8a7f5ac453a91f40704a">http://git.postgresql.org/pg/commitdiff/19f2d6cdae2bfa97c2ce8a7f5ac453a91f40704a</a></li>

<li>Fix relcache reference leak in refresh_by_match_merge(). One path through the loop over indexes forgot to do index_close(). Rather than adding a fourth call, restructure slightly so that there's only one. In passing, get rid of an unnecessary syscache lookup: the pg_index struct for the index is already available from its relcache entry. Per report from YAMAMOTO Takashi, though this is a bit different from his suggested patch. This is new code in HEAD, so no need for back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7271c44278352516ec66b2de311952ce330b6d5">http://git.postgresql.org/pg/commitdiff/f7271c44278352516ec66b2de311952ce330b6d5</a></li>

<li>Fix some remaining int64 vestiges in contrib/test_shm_mq. Andres Freund and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6ec7c92ac7ab6223b3c45dc554efffd1953758f">http://git.postgresql.org/pg/commitdiff/b6ec7c92ac7ab6223b3c45dc554efffd1953758f</a></li>

<li>Fix memory leak during regular expression execution. For a regex containing backrefs, pg_regexec() might fail to free all the sub-DFAs that were created during execution, resulting in a permanent (session lifespan) memory leak. Problem was introduced by me in commit 587359479acbbdc95c8e37da40707e37097423f5. Per report from Sandro Santilli; diagnosis by Greg Stark. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea8c7e9054abf23fa3de2f8e4414f60ac8a8b620">http://git.postgresql.org/pg/commitdiff/ea8c7e9054abf23fa3de2f8e4414f60ac8a8b620</a></li>

<li>Again fix initialization of auto-tuned effective_cache_size. The previous method was overly complex and underly correct; in particular, by assigning the default value with PGC_S_OVERRIDE, it prevented later attempts to change the setting in postgresql.conf, as noted by Jeff Janes. We should just assign the default value with source PGC_S_DYNAMIC_DEFAULT, which will have the desired priority relative to the boot_val as well as user-set values. There is still a gap in this method: if there's an explicit assignment of effective_cache_size = -1 in the postgresql.conf file, and that assignment appears before shared_buffers is assigned, the code will substitute 4 times the bootstrap default for shared_buffers, and that value will then persist (since it will have source PGC_S_FILE). I don't see any very nice way to avoid that though, and it's not a case to be expected in practice. The existing comments in guc-file.l look forward to a redesign of the DYNAMIC_DEFAULT mechanism; if that ever happens, we should consider this case as one of the things we'd like to improve. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af930e606a3217db3909029c6c3f8d003ba70920">http://git.postgresql.org/pg/commitdiff/af930e606a3217db3909029c6c3f8d003ba70920</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make it easy to detach completely from shared memory. The new function dsm_detach_all() can be used either by postmaster children that don't wish to take any risk of accidentally corrupting shared memory; or by forked children of regular backends with the same need. This patch also updates the postmaster children that already do PGSharedMemoryDetach() to do dsm_detach_all() as well. Per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79a4d24f31e09eb3c421deb34829eee0bf6acd67">http://git.postgresql.org/pg/commitdiff/79a4d24f31e09eb3c421deb34829eee0bf6acd67</a></li>

<li>Improve shm_mq portability around MAXIMUM_ALIGNOF and sizeof(Size). Revise the original decision to expose a uint64-based interface and use Size everywhere possible. Avoid assuming that MAXIMUM_ALIGNOF is 8, or making any assumption about the relationship between that value and sizeof(Size). If MAXIMUM_ALIGNOF is bigger, we'll now insert padding after the length word; if it's smaller, we are now prepared to read and write the length word in chunks. Per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bd261ca18c67eafe18088e58fab511e3b965418">http://git.postgresql.org/pg/commitdiff/3bd261ca18c67eafe18088e58fab511e3b965418</a></li>

<li>Rewrite comment for shm_mq_receive_bytes. The comment and the code diverged at some point before the initial commit of this feature, and I failed to notice. Noted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/250f8a7bbe83a7dbc9618c0a506f7170ab610e4b">http://git.postgresql.org/pg/commitdiff/250f8a7bbe83a7dbc9618c0a506f7170ab610e4b</a></li>

<li>test_shm_mq: Use Size rather than uint64. Commit 3bd261ca18c67eafe18088e58fab511e3b965418 updated the API but neglected to make the corresponding edits here. Per Tom Lane and the buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c676ac0f3fc87911588ca8e5f92483d1671ba89f">http://git.postgresql.org/pg/commitdiff/c676ac0f3fc87911588ca8e5f92483d1671ba89f</a></li>

<li>Add pg_recvlogical, a tool to receive data logical decoding data. This is fairly basic at the moment, but it's at least useful for testing and debugging, and possibly more. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8bdd12bbf093c846c9383c205e363d6ae35f11a6">http://git.postgresql.org/pg/commitdiff/8bdd12bbf093c846c9383c205e363d6ae35f11a6</a></li>

<li>Fix uninitialized variable. Report from Andres Freund, but not his fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a3b30d4cfe5f3ae718fd2cc6aa05b7707cac88dd">http://git.postgresql.org/pg/commitdiff/a3b30d4cfe5f3ae718fd2cc6aa05b7707cac88dd</a></li>

<li>Logical decoding documentation corrections. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ee4fcfc63452a1ab5586b2d4cb4b6908d1badff">http://git.postgresql.org/pg/commitdiff/3ee4fcfc63452a1ab5586b2d4cb4b6908d1badff</a></li>

<li>Documentation for logical decoding. Craig Ringer, Andres Freund, Christian Kruse, with edits by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49c0864d7ef5227faa24f903902db90e5c9d5d69">http://git.postgresql.org/pg/commitdiff/49c0864d7ef5227faa24f903902db90e5c9d5d69</a></li>

<li>test_shm_mq: Improve regression tests. Per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1bdab2fa39f9a29fc806e1f2b6b5428b88d7cc5">http://git.postgresql.org/pg/commitdiff/d1bdab2fa39f9a29fc806e1f2b6b5428b88d7cc5</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Setup error context callback for transaction lock waits With this in place, a session blocking behind another one because of tuple locks will get a context line mentioning the relation name, tuple TID, and operation being done on tuple. For example: LOG: process 11367 still waiting for ShareLock on transaction 717 after 1000.108 ms DETAIL: Process holding the lock: 11366. Wait queue: 11367. CONTEXT: while updating tuple (0,2) in relation "foo" STATEMENT: UPDATE foo SET value = 3; Most usefully, the new line is displayed by log entries due to log_lock_waits, although of course it will be printed by any other log message as well. Author: Christian Kruse, some tweaks by &Aacute;lvaro Herrera Reviewed-by: Amit Kapila, Andres Freund, Tom Lane, Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f88d4cfc9d417dac2ee41a8f5e593898e56fd2bd">http://git.postgresql.org/pg/commitdiff/f88d4cfc9d417dac2ee41a8f5e593898e56fd2bd</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>libpq: pass a memory allocation failure error up to PQconndefaults(). Previously user name memory allocation failures were ignored and the default user name set to NULL. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4c8f14364c27508233f8a31ac4b10a4c90235a9">http://git.postgresql.org/pg/commitdiff/a4c8f14364c27508233f8a31ac4b10a4c90235a9</a></li>

<li>Properly check for readdir/closedir() failures. Clear errno before calling readdir() and handle old MinGW errno bug while adding full test coverage for readdir/closedir failures. Backpatch through 8.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f03927fce038096f53ca67eeab9adb24938f8a6">http://git.postgresql.org/pg/commitdiff/6f03927fce038096f53ca67eeab9adb24938f8a6</a></li>

<li>Remove MinGW readdir/errno bug workaround fixed on 2003-10-10 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1494931d7375ccdc6afd34f135bc708f8954eecc">http://git.postgresql.org/pg/commitdiff/1494931d7375ccdc6afd34f135bc708f8954eecc</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Address ccvalid/ccnoinherit in TupleDesc support functions. equalTupleDescs() neglected both of these ConstrCheck fields, and CreateTupleDescCopyConstr() neglected ccnoinherit. At this time, the only known behavior defect resulting from these omissions is constraint exclusion disregarding a CHECK constraint validated by an ALTER TABLE VALIDATE CONSTRAINT statement issued earlier in the same transaction. Back-patch to 9.2, where these fields were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c31305de5f5a4880b0ba2f5983025ef0210a3b2a">http://git.postgresql.org/pg/commitdiff/c31305de5f5a4880b0ba2f5983025ef0210a3b2a</a></li>

<li>Offer triggers on foreign tables. This covers all the SQL-standard trigger types supported for regular tables; it does not cover constraint triggers. The approach for acquiring the old row mirrors that for view INSTEAD OF triggers. For AFTER ROW triggers, we spool the foreign tuples to a tuplestore. This changes the FDW API contract; when deciding which columns to populate in the slot returned from data modification callbacks, writable FDWs will need to check for AFTER ROW triggers in addition to checking for a RETURNING clause. In support of the feature addition, refactor the TriggerFlags bits and the assembly of old tuples in ModifyTable. Ronan Dunklau, reviewed by KaiGai Kohei; some additional hacking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7cbe57c34dec4860243e6d0f81738cfbb6e5d069">http://git.postgresql.org/pg/commitdiff/7cbe57c34dec4860243e6d0f81738cfbb6e5d069</a></li>

<li>Improve comments about AfterTriggerBeginQuery() query level usage. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6115480c543c0141011a99db78987ad13540be59">http://git.postgresql.org/pg/commitdiff/6115480c543c0141011a99db78987ad13540be59</a></li>

<li>Don't test xmin/xmax columns of a postgres_fdw foreign table. Their values are unspecified and system-dependent. Per buildfarm member kouprey. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2b2491b06074e68fc7c96148cb0fdf0c8eb0469">http://git.postgresql.org/pg/commitdiff/b2b2491b06074e68fc7c96148cb0fdf0c8eb0469</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Introduce jsonb, a structured format for storing json. The new format accepts exactly the same data as the json type. However, it is stored in a format that does not require reparsing the orgiginal text in order to process it, making it much more suitable for indexing and other operations. Insignificant whitespace is discarded, and the order of object keys is not preserved. Neither are duplicate object keys kept - the later value for a given key is the only one stored. The new type has all the functions and operators that the json type has, with the exception of the json generation functions (to_json, json_agg etc.) and with identical semantics. In addition, there are operator classes for hash and btree indexing, and two classes for GIN indexing, that have no equivalent in the json type. This feature grew out of previous work by Oleg Bartunov and Teodor Sigaev, which was intended to provide similar facilities to a nested hstore type, but which in the end proved to have some significant compatibility issues. Authors: Oleg Bartunov, Teodor Sigaev, Peter Geoghegan and Andrew Dunstan. Review: Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9134d0a355cfa447adc80db4505d5931084278a">http://git.postgresql.org/pg/commitdiff/d9134d0a355cfa447adc80db4505d5931084278a</a></li>

<li>Fix mis-spelling in jsonb docs. Per Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca07cd59b24e00e428ed26716754244cec7f56b7">http://git.postgresql.org/pg/commitdiff/ca07cd59b24e00e428ed26716754244cec7f56b7</a></li>

<li>Do jsonb regression test input in the conventional way. This should make the buildfarm happier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab22b149c60a10b842e3ec7fe3eb3b0b66c6611a">http://git.postgresql.org/pg/commitdiff/ab22b149c60a10b842e3ec7fe3eb3b0b66c6611a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Mitsumasa KONDO sent in another revision of a patch to allow using a Gaussian distribution in pgbench.</li>

<li>J&uuml;rgen Strobel sent in a patch to add a command line option --no-table-lock to pg_dump.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to fix some wrong behavior in ALTER ... RESET.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to add plpgsql.warn_shadow.</li>

<li>Vaishnavi Prabakaran sent in another revision of a patch to add a catalog view to pg_hba.conf.</li>

<li>Heikki Linnakangas sent in a patch to change the way locks are acquired on B-trees.</li>

<li>Bruce Momjian sent in two revisions of a patch to fix a bug in pg_archivecleanup.</li>

<li>Jing Wang sent in another revision of a patch to issue a log message to suggest VACUUM FULL if a table is nearly empty.</li>

<li>Gurjeet Singh sent in a patch to send transaction commit/rollback stats to the stats collector unconditionally.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to fix an infelicity in some situations in archive recovery.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to add plpgsql.extra_warnings and plpgsql.extra_errors.</li>

<li>Fujii Masao sent in a patch to fix an issue where effective_cache_size cannot be changed by a reload (HUP) of the backend.</li>

<li>Vik Fearing sent in a patch to fix some typos in the patch to reduce lock strengths needed for ALTER TABLE.</li>

<li>Etsuro Fujita sent in another revision of a patch to allow foreign tables in table inheritance hierarchies.</li>

<li>Dilip Kumar sent in another revision of a patch to add parallelism to the vacuumdb program.</li>

<li>MauMau sent in another revision of a patch to fix an issue where PostgreSQL fails to start on Windows if it crashes after tablespace creation.</li>

<li>Andres Freund sent in a PoC patch not to require a NBuffer-sized PrivateRefCount array of local buffer pins.</li>

<li>Emanuel Calvo sent in a patch to clarify the documentation of what events rewrite RULEs can apply to.</li>

<li>Bruce Momjian sent in another revision of a patch to fix some psql output for the Replica type displayed.</li>

<li>Noah Misch sent in two more revisions of a patch to warn about some escalation attacks possible during "make check".</li>

</ul>