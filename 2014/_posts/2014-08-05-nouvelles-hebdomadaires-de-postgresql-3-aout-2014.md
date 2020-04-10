---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 3 août 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-08-05-nouvelles-hebdomadaires-de-postgresql-3-aout-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix obsolete statement in smgr/README. Since commit 2d00190495b22e0d0ba351b2cda9c95fb2e3d083, fork numbers are defined in relpath.h not relfilenode.h. Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/248fc1f10716964b7e7d0f8ada686801d1e36445">http://git.postgresql.org/pg/commitdiff/248fc1f10716964b7e7d0f8ada686801d1e36445</a></li>

<li>Avoid wholesale autovacuuming when autovacuum is nominally off. When autovacuum is nominally off, we will still launch autovac workers to vacuum tables that are at risk of XID wraparound. But after we'd done that, an autovac worker would proceed to autovacuum every table in the targeted database, if they meet the usual thresholds for autovacuuming. This is at best pretty unexpected; at worst it delays response to the wraparound threat. Fix it so that if autovacuum is nominally off, we *only* do forced vacuums and not any other work. Per gripe from Andrey Zhidenkov. This has been like this all along, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f51ead09df19f0a074c07657b7de8dba0f3050d6">http://git.postgresql.org/pg/commitdiff/f51ead09df19f0a074c07657b7de8dba0f3050d6</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reword the sentence for pg_logical_slot_peek_changes function. Previously the duplicated paragraphs were used next to each other in the document to demonstrate that the changes in the stream were not consumed by pg_logical_slot_peek_changes function. But some users misunderstood that the duplication of the same paragraph was just typo. So this commit rewords the sentence in the latter paragraph for less confusing. Christoph Moench-Tegeder 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61e48efba579682f75332688bdb89f9eee24fb63">http://git.postgresql.org/pg/commitdiff/61e48efba579682f75332688bdb89f9eee24fb63</a></li>

<li>Fix bug in pg_receivexlog --verbose. In 9.2, pg_receivexlog with verbose option has emitted the messages at the end of each WAL file. But the commit 0b63291 suppressed such messages by mistake. This commit fixes the bug so that pg_receivexlog --verbose outputs such messages again. Back-patch to 9.3 where the bug was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/694fd33e23170f64d30ef35e647b824d34938e09">http://git.postgresql.org/pg/commitdiff/694fd33e23170f64d30ef35e647b824d34938e09</a></li>

<li>Add missing PQclear() calls into pg_receivexlog. Back-patch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b819dd7cb55aed1d607cef36b0ecd1a0642872b2">http://git.postgresql.org/pg/commitdiff/b819dd7cb55aed1d607cef36b0ecd1a0642872b2</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Oops, fix recoveryStopsBefore functions for regular commits. Pointed out by Tom Lane. Backpatch to 9.4, the code was structured differently in earlier branches and didn't have this mistake. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60d931827b0c37fbce74d04e45d0220d57ddd06a">http://git.postgresql.org/pg/commitdiff/60d931827b0c37fbce74d04e45d0220d57ddd06a</a></li>

<li>Treat 2PC commit/abort the same as regular xacts in recovery. There were several oversights in recovery code where COMMIT/ABORT PREPARED records were ignored: pg_last_xact_replay_timestamp() (wasn't updated for 2PC commits), recovery_min_apply_delay (2PC commits were applied immediately), recovery_target_xid (recovery would not stop if the XID used 2PC) The first of those was reported by Sergiy Zuban in bug #11032, analyzed by Tom Lane and Andres Freund. The bug was always there, but was masked before commit d19bd29f07aef9e508ff047d128a4046cc8bc1e2, because COMMIT PREPARED always created an extra regular transaction that was WAL-logged. Backpatch to all supported versions (older versions didn't have all the features and therefore didn't have all of the above bugs). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e74e0906fad5fcdcc807d4655cdc69dded5d58f2">http://git.postgresql.org/pg/commitdiff/e74e0906fad5fcdcc807d4655cdc69dded5d58f2</a></li>

<li>Move log_newpage and log_newpage_buffer to xlog.c. log_newpage is used by many indexams, in addition to heap, but for historical reasons it's always been part of the heapam rmgr. Starting with 9.3, we have another WAL record type for logging an image of a page, XLOG_FPI. Simplify things by moving log_newpage and log_newpage_buffer to xlog.c, and switch to using the XLOG_FPI record type. Bump the WAL version number because the code to replay the old HEAP_NEWPAGE records is removed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54685338e37889eebd473804c3feb006dd83a882">http://git.postgresql.org/pg/commitdiff/54685338e37889eebd473804c3feb006dd83a882</a></li>

<li>Fix typo in user manual 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/822ff44c822007ee14cacfebfe0792d1de669df9">http://git.postgresql.org/pg/commitdiff/822ff44c822007ee14cacfebfe0792d1de669df9</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Simplify multixact freezing a bit. Testing for abortedness of a multixact member that's being frozen is unnecessary: we only need to know whether the transaction is still in progress or committed to determine whether it must be kept or not. This let us simplify the code a bit and avoid a useless TransactionIdDidAbort test. Suggested by Andres Freund awhile back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2581794f37e76c910eb91f1bf1f1e581123abd6">http://git.postgresql.org/pg/commitdiff/c2581794f37e76c910eb91f1bf1f1e581123abd6</a></li>

<li>Avoid uselessly looking up old LOCK_ONLY multixacts. Commit 0ac5ad5134f2 removed an optimization in multixact.c that skipped fetching members of MultiXactId that were older than our OldestVisibleMXactId value. The reason this was removed is that it is possible for multixacts that contain updates to be older than that value. However, if the caller is certain that the multi does not contain an update (because the infomask bits say so), it can pass this info down to GetMultiXactIdMembers, enabling it to use the old optimization. Pointed out by Andres Freund in 20131121200517.GM7240@alap2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05315498012530d44cd89a209242a243374e274d">http://git.postgresql.org/pg/commitdiff/05315498012530d44cd89a209242a243374e274d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: improve C comment wording 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d826d8ecce80e318220a8a4e3d989a38397e5689">http://git.postgresql.org/pg/commitdiff/d826d8ecce80e318220a8a4e3d989a38397e5689</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Clean up some recently added PL/pgSQL documentation Capitalize titles consistently. Fix some grammar. Group "Obtaining Information About an Error" under "Trapping Errors", but make "Obtaining the Call Stack Context Information" its own section, since it's not about errors. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/232f1475dce23e2fdd0568b35e9a7c470ae6c8ae">http://git.postgresql.org/pg/commitdiff/232f1475dce23e2fdd0568b35e9a7c470ae6c8ae</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix mishandling of background worker PGPROCs in EXEC_BACKEND builds. InitProcess() relies on IsBackgroundWorker to decide whether the PGPROC for a new backend should be taken from ProcGlobal's freeProcs or from bgworkerFreeProcs. In EXEC_BACKEND builds, InitProcess() is called sooner than in non-EXEC_BACKEND builds, and IsBackgroundWorker wasn't getting initialized soon enough. Report by Noah Misch. Diagnosis and fix by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e280c630a87e1b8325770c6073097d109d79a00f">http://git.postgresql.org/pg/commitdiff/e280c630a87e1b8325770c6073097d109d79a00f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Laurenz Albe sent in a patch to make pg_dump behave consistently for different archive formats.</li>

<li>MauMau and Andres Freund traded patches to fix an issue with sinval.</li>

<li>Thomas Munro sent in three more revisions of a patch to add SKIP LOCKED DATA.</li>

<li>Furuya Osamu sent in another revision of a patch to add an synchronous mode to pg_receivexlog.</li>

<li>Keith Baker sent in a patch to add a QNX 6.5 port.</li>

<li>Fabien COELHO sent in two more revisions of a patch to fix some issues in the Gaussian distribution patch for pgbench.</li>

<li>Daniele Varrazzo sent in two revisions of a patch to fix redundant i18n strings in json.</li>

<li>Heikki Linnakangas sent in a patch to move log_newpage out of heapam.c.</li>

<li>Kyotaro HORIGUCHI sent in a patch to introduce coarse-grained parallelism via the postgres_fdw.</li>

<li>Vik Fearing sent in a patch to make the REINDEX syntax more useful.</li>

<li>Heikki Linnakangas sent in another revision of a patch to make WAL format and API changes.</li>

<li>Anastasia Lubennikova sent in another revision of a patch to add index-only scans for GiST.</li>

<li>Heikki Linnakangas sent in another revision of a patch to support Windows SChannel as an OpenSSL replacement.</li>

<li>Fabien COELHO sent in a patch to add the modulo (%) operator to pgbench.</li>

<li>David Rowley sent in a patch to fix the Windows build.</li>

<li>Peter Geoghegan sent in two more revisions of a patch to add a B-Tree support function which abbreviates certain searches.</li>

<li>Jeff Davis sent in a patch to explicitly track allocated memory (the blocks, not the chunks) for each memory context, as well as its children.</li>

<li>Emre Hasegeli sent in another revision of a patch to enable KNN-GiST with recheck.</li>

</ul>