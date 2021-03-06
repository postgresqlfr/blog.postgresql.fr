---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 décembre 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/12/20/Nouvelles-hebdomadaires-de-PostgreSQL-18-décembre-2016"
---


<p>[ndt: Meetup du PLUG à Lyon ce mardi 20 décembre&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</p>

<p>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai. Les propositions seront attendues jusqu'au 19 janvier 2017&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/papers.php">http://www.pgcon.org/2017/papers.php</a></p>

<p>PgConf.Russia 2017 se d&eacute;roulera du 15 au 17 mars 2017 &agrave; Moscou&nbsp;: <a target="_blank" href="https://pgconf.ru/en">https://pgconf.ru/en</a></p>

<p>Le PGDay Asia 2017 s'&eacute;tendra du 17 au 18 mars &agrave; Singapour. L'appel &agrave; conf&eacute;renciers s'&eacute;teindra le 16 janvier 2017&nbsp;: <a target="_blank" href="http://tinyurl.com/pgDay-Asia-2017-Cfp">http://tinyurl.com/pgDay-Asia-2017-Cfp</a></p>

<p>Les inscriptions pour le PGDay du FOSDEM 2017 &agrave; Bruxelles sont &agrave; pr&eacute;sent ouvertes&nbsp;: <a target="_blank" href="https://2017.fosdempgday.org/">https://2017.fosdempgday.org/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<h2>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-12/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La <em>PGConf India 2017</em> aura lieu les 2 &amp; 3 mars 2017 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde). Les propositions sont attendues sur &lt;papers AT pgconf DOT in&gt; jusqu'au 31 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></li>

<li>PostgreSQL@SCaLE aura lieu les 2 &amp; 3 mars 2017 au centre des conventions de Pasadena, comme partie du SCaLE 15X&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/15x/">http://www.socallinuxexpo.org/scale/15x/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20161219002906.GA8714@fetter.org">http://www.postgresql.org/message-id/20161219002906.GA8714@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix broken autoconf test for random number source. Hopefully this fixes buildfarm member jacana. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/be25aa16-2f06-b7d1-8810-c69489a0e70b@dunslane.net">https://www.postgresql.org/message-id/be25aa16-2f06-b7d1-8810-c69489a0e70b@dunslane.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad365b2f91dc57ed1f18839f9f59a2799d276c8d">http://git.postgresql.org/pg/commitdiff/ad365b2f91dc57ed1f18839f9f59a2799d276c8d</a></li>

<li>Fix two thinkos related to strong random keys. pg_backend_random() is used for MD5 salt generation, but it can fail, and no checks were done on its status code. Fix memory leak, if generating a random number for a cancel key failed. Both issues were spotted by Coverity. Fix by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41493bac36575c93172644d0eab7045aed8dcc17">http://git.postgresql.org/pg/commitdiff/41493bac36575c93172644d0eab7045aed8dcc17</a></li>

<li>Fix pgcrypto compilation with OpenSSL 1.1.0. Was broken by the switch to using OpenSSL's EVP interface for ciphers, in commit 5ff4a67f. Reported by Andres Freund. Fix by Michael Paquier with some kibitzing by me. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20161201014826.ic72tfkahmevpwz7@alap3.anarazel.de">https://www.postgresql.org/message-id/20161201014826.ic72tfkahmevpwz7@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bbbf029dded76d7d86053ebad1c5f9ab2948904">http://git.postgresql.org/pg/commitdiff/9bbbf029dded76d7d86053ebad1c5f9ab2948904</a></li>

<li>Further cleanup from the strong-random patch. Also use the new facility for generating RADIUS authenticator requests, and salt in chkpass extension. Reword the error messages to be nicer. Fix bogus error code used in the message in BackendStartup. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58445c5c8d1424038d654ad9ee8af3724c60105e">http://git.postgresql.org/pg/commitdiff/58445c5c8d1424038d654ad9ee8af3724c60105e</a></li>

<li>Refactor the code for verifying user's password. Split md5_crypt_verify() into three functions: * get_role_password() to fetch user's password from pg_authid, and check its expiration. * md5_crypt_verify() to check an MD5 authentication challenge * plain_crypt_verify() to check a plaintext password. get_role_password() will be needed as a separate function by the upcoming SCRAM authentication patch set. Most of the remaining functionality in md5_crypt_verify() was different for MD5 and plaintext authentication, so split that for readability. While we're at it, simplify the *_crypt_verify functions by using stack-allocated buffers to hold the temporary MD5 hashes, instead of pallocing. Reviewed by Michael Paquier. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/3029e460-d47c-710e-507e-d8ba759d7cbb@iki.fi">https://www.postgresql.org/message-id/3029e460-d47c-710e-507e-d8ba759d7cbb@iki.fi</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7f051b8f9a6341f6d3bf80b29c1dbc1837be9ab">http://git.postgresql.org/pg/commitdiff/e7f051b8f9a6341f6d3bf80b29c1dbc1837be9ab</a></li>

<li>Fix off-by-one in memory allocation for quote_literal_cstr(). The calculation didn't take into account the NULL terminator. That lead to overwriting the palloc'd buffer by one byte, if the input consists entirely of backslashes. For example "format('%L', E'\\')". Fixes bug #14468. Backpatch to all supported versions. Report: <a target="_blank" href="https://www.postgresql.org/message-id/20161216105001.13334.42819%40wrigleys.postgresql.org">https://www.postgresql.org/message-id/20161216105001.13334.42819%40wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f5182e18d3ec7b84c24ceba2c436ea890c95e25">http://git.postgresql.org/pg/commitdiff/4f5182e18d3ec7b84c24ceba2c436ea890c95e25</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>psql: Fix incorrect version check for table partitioning. Table partitioning was added in 10, not 9.6. Fabr&Atilde;&shy;zio de Royes Mello, per report from Jeff Janes <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06e184876bc07c2b1d7144957dcf02c5b4f709c2">http://git.postgresql.org/pg/commitdiff/06e184876bc07c2b1d7144957dcf02c5b4f709c2</a></li>

<li>doc: Fix purported type of pg_am.amhandler to match reality. Joel Jacobson <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4630e01fd4c73c195025b7307ebc13d489b9ef9">http://git.postgresql.org/pg/commitdiff/b4630e01fd4c73c195025b7307ebc13d489b9ef9</a></li>

<li>Remove should_free arguments to tuplesort routines. Since commit e94568ecc10f2638e542ae34f2990b821bbf90ac, the answer is always "false", and we do not need to complicate the API by arranging to return a constant value. Peter Geoghegan Discussion: <a target="_blank" href="http://postgr.es/m/CAM3SWZQWZZ_N=DmmL7tKy_OUjGH_5mN=N=A6h7kHyyDvEhg2DA@mail.gmail.com">http://postgr.es/m/CAM3SWZQWZZ_N=DmmL7tKy_OUjGH_5mN=N=A6h7kHyyDvEhg2DA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3856cf9607f41245ec9462519c53f1109e781fc5">http://git.postgresql.org/pg/commitdiff/3856cf9607f41245ec9462519c53f1109e781fc5</a></li>

<li>doc: Improve documentation related to table partitioning feature. Commit f0e44751d7175fa3394da2c8f85e3ceb3cdbfe63 implemented table partitioning, but failed to mention the "no row movement" restriction in the documentation. Fix that and a few other issues. Amit Langote, with some additional wordsmithing by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1a4459c299a86f909c27e391a10d7b9b05ea697">http://git.postgresql.org/pg/commitdiff/a1a4459c299a86f909c27e391a10d7b9b05ea697</a></li>

<li>Update typedefs.list. So developers can more easily run pgindent locally <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acddbe221b084956a0efd6e4b6c6586e8fd994d7">http://git.postgresql.org/pg/commitdiff/acddbe221b084956a0efd6e4b6c6586e8fd994d7</a></li>

<li>Clean up code, comments, and formatting for table partitioning. Amit Langote, plus pgindent-ing by me. Inspired in part by review comments from Tomas Vondra. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b9a98e154cec81849af24091443747a6057c968">http://git.postgresql.org/pg/commitdiff/4b9a98e154cec81849af24091443747a6057c968</a></li>

<li>Fix bug in hashbulkdelete. Commit 6d46f4783efe457f74816a75173eb23ed8930020 failed to account for the possibility that hashbulkdelete() might encounter a bucket that has been split since it began scanning the bucket array. Repair. Extracted from a larger pathc by Amit Kapila; I rewrote the comment. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/501c7b94bcb00cfa0faad60135cf6af82fd56a3a">http://git.postgresql.org/pg/commitdiff/501c7b94bcb00cfa0faad60135cf6af82fd56a3a</a></li>

<li>Fix bugs in RelationGetPartitionDispatchInfo. The previous coding was not quite right for cases involving multiple levels of partitioning. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a25665088d812d08bb888e961f208eaebf522050">http://git.postgresql.org/pg/commitdiff/a25665088d812d08bb888e961f208eaebf522050</a></li>

<li>Remove _hash_wrtbuf() in favor of calling MarkBufferDirty(). The whole concept of _hash_wrtbuf() is that we need to know at the time we're releasing the buffer lock (and pin) whether we dirtied the buffer, but this is easy to get wrong. This patch actually fixes one non-obvious bug of that form: hashbucketcleanup forgot to signal _hash_squeezebucket, which gets the primary bucket page already locked, as to whether it had already dirtied the page. Calling MarkBufferDirty() at the places where we dirty the buffer is more intuitive and lets us simplify the code in various places as well. On top of all that, the ultimate goal here is to make hash indexes WAL-logged, and as the comments to _hash_wrtbuf() note, it should go away when that happens. Making it go away a little earlier than that seems like a good preparatory step. Report by Jeff Janes. Diagnosis by Amit Kapila, Kuntal Ghosh, and Dilip Kumar. Patch by me, after studying an alternative patch submitted by Amit Kapila. Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1Kf6tOY0oVz_SEdngiNFkeXrA3xUSDPPORQvsWVPdKqnA@mail.gmail.com">http://postgr.es/m/CAA4eK1Kf6tOY0oVz_SEdngiNFkeXrA3xUSDPPORQvsWVPdKqnA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25216c98938495fd741bf585dcbef45b3a9ffd40">http://git.postgresql.org/pg/commitdiff/25216c98938495fd741bf585dcbef45b3a9ffd40</a></li>

<li>Fix more hash index bugs around marking buffers dirty. In _hash_freeovflpage(), if we're freeing the overflow page that immediate follows the page to which tuples are being moved (the confusingly-named "write buffer"), don't forget to mark that page dirty after updating its hasho_nextblkno. In _hash_squeezebucket(), it's not necessary to mark the primary bucket page dirty if there are no overflow pages, because there's nothing to squeeze in that case. Amit Kapila, with help from Kuntal Ghosh and Dilip Kumar, after an initial trouble report by Jeff Janes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a4fe1127c5a0ea1515589e416aa29e088170c0e">http://git.postgresql.org/pg/commitdiff/6a4fe1127c5a0ea1515589e416aa29e088170c0e</a></li>

<li>Unbreak Finalize HashAggregate over Partial HashAggregate. Commit 5dfc198146b49ce7ecc8a1fc9d5e171fb75f6ba5 introduced the use of a new type of hash table with linear reprobing for hash aggregates. Such a hash table behaves very poorly if keys are inserted in hash order, which does in fact happen in the case where a query use a Finalize HashAggregate node fed (via Gather) by a Partial HashAggregate node. In fact, queries with this type of plan tend to run effectively forever. Fix that by seeding the hash value differently in each worker (and in the leader, if it participates). Andres Freund and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b81b5a96f424531b97cdd1dba97d9d1b9c9d372e">http://git.postgresql.org/pg/commitdiff/b81b5a96f424531b97cdd1dba97d9d1b9c9d372e</a></li>

<li>Simplify LWLock tranche machinery by removing array_base/array_stride. array_base and array_stride were added so that we could identify the offset of an LWLock within a tranche, but this facility is only very marginally used apart from the main tranche. So, give every lock in the main tranche its own tranche ID and get rid of array_base, array_stride, and all that's attached. For debugging facilities (Trace_lwlocks and LWLOCK_STATS) print the pointer address of the LWLock using %p instead of the offset. This is arguably more useful, and certainly a lot cheaper. Drop the offset-within-tranche from the information reported to dtrace and from one can't-happen message inside lwlock.c. The main user-visible impact of this change is that pg_stat_activity will now report all waits for LWLocks as "LWLock" rather than reporting some as "LWLockTranche" and others as "LWLockNamed". The main motivation for this change is that the need to specify an array_base and an array_stride is awkward for parallel query. There is only a very limited supply of tranche IDs so we can't just keep allocating new ones, and if we try to use the same tranche IDs every time then we run into trouble when multiple parallel contexts are use simultaneously. So if we didn't get rid of this mechanism we'd have to make it even more complicated. By simplifying it in this way, we instead reduce the size of the generated code for lwlock.c by about 5%. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYsFn6NUW1x0AZtupJGUAs1UDY4dJtCN47_Q6D0sP80PA@mail.gmail.com">http://postgr.es/m/CA+TgmoYsFn6NUW1x0AZtupJGUAs1UDY4dJtCN47_Q6D0sP80PA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3761fe3c20bb040b15f0e8da58d824631da00caa">http://git.postgresql.org/pg/commitdiff/3761fe3c20bb040b15f0e8da58d824631da00caa</a></li>

<li>Fix outdated comment in lwlock.c Commit 3761fe3c20bb040b15f0e8da58d824631da00caa should have made this change, but didn't. Reported by &Atilde;lvaro Herrera. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/591ccb66d24258f6d1084343b3c33c96e3e2b36d">http://git.postgresql.org/pg/commitdiff/591ccb66d24258f6d1084343b3c33c96e3e2b36d</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Make the different Unix-y semaphore implementations ABI-compatible. Previously, the "sem" field of PGPROC varied in size depending on which kernel semaphore API we were using. That was okay as long as there was only one likely choice per platform, but in the wake of commit ecb0d20a9, that assumption seems rather shaky. It doesn't seem out of the question anymore that an extension compiled against one API choice might be loaded into a postmaster built with another choice. Moreover, this prevents any possibility of selecting the semaphore API at postmaster startup, which might be something we want to do in future. Hence, change PGPROC.sem to be PGSemaphore (i.e. a pointer) for all Unix semaphore APIs, and turn the pointed-to data into an opaque struct whose contents are only known within the responsible modules. For the SysV and unnamed-POSIX APIs, the pointed-to data has to be allocated elsewhere in shared memory, which takes a little bit of rejiggering of the InitShmemAllocation code sequence. (I invented a ShmemAllocUnlocked() function to make that a little cleaner than it used to be. That function is not meant for any uses other than the ones it has now, but it beats having InitShmemAllocation() know explicitly about allocation of space for semaphores and spinlocks.) This change means an extra indirection to access the semaphore data, but since we only touch that when blocking or awakening a process, there shouldn't be any meaningful performance penalty. Moreover, at least for the unnamed-POSIX case on Linux, the sem_t type is quite a bit wider than a pointer, so this reduces sizeof(PGPROC) which seems like a good thing. For the named-POSIX API, there's effectively no change: the PGPROC.sem field was and still is a pointer to something returned by sem_open() in the postmaster's memory space. Document and check the pre-existing limitation that this case can't work in EXEC_BACKEND mode. It did not seem worth unifying the Windows semaphore ABI with the Unix cases, since there's no likelihood of needing ABI compatibility much less runtime switching across those cases. However, we can simplify the Windows code a bit if we define PGSemaphore as being directly a HANDLE, rather than pointer to HANDLE, so let's do that while we're here. (This also ends up being no change in what's physically stored in PGPROC.sem. We're just moving the HANDLE fetch from callees to callers.) It would take a bunch of additional code shuffling to get to the point of actually choosing a semaphore API at postmaster start, but the effects of that would now be localized in the port/XXX_sema.c files, so it seems like fit material for a separate patch. The need for it is unproven as yet, anyhow, whereas the ABI risk to extensions seems real enough. Discussion: <a target="_blank" href="https://postgr.es/m/4029.1481413370@sss.pgh.pa.us">https://postgr.es/m/4029.1481413370@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be7b2848c6d8bdbfb63ab403c535713708c4af52">http://git.postgresql.org/pg/commitdiff/be7b2848c6d8bdbfb63ab403c535713708c4af52</a></li>

<li>Fix race condition in test_decoding "slot" test. This test, just added in commit a924c327e, sometimes fails because the old backend hasn't finished dropping the temporary replication slot when the new backend looks. Borrow the previously-invented methodology for waiting for the old process to disappear from pg_stat_activity. Petr Jelinek Discussion: <a target="_blank" href="https://postgr.es/m/62935e6f-4f1b-c433-e0fa-7f936a38b3e5@2ndquadrant.com">https://postgr.es/m/62935e6f-4f1b-c433-e0fa-7f936a38b3e5@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23f722ba8e19ca1a7c2ada9d6e687989b6e8f4d1">http://git.postgresql.org/pg/commitdiff/23f722ba8e19ca1a7c2ada9d6e687989b6e8f4d1</a></li>

<li>Catversion bump for temporary replication slots. Missed in commit a924c327e2793d2025b19e18de7917110dc8afd8. Per Fujii Masao. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b3d02c2a9eb93cc4754857361abee449a3fe0cb">http://git.postgresql.org/pg/commitdiff/9b3d02c2a9eb93cc4754857361abee449a3fe0cb</a></li>

<li>Fix creative, but unportable, spelling of "ptr != NULL". Or at least I suppose that's what was really meant here. But even aside from the not-per-project-style use of "0" to mean "NULL", I doubt it's safe to assume that all valid pointers are &gt; NULL. Per buildfarm member pademelon. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/563d575fd73361f6118c13f2816988eba8e1f657">http://git.postgresql.org/pg/commitdiff/563d575fd73361f6118c13f2816988eba8e1f657</a></li>

<li>Prevent planagg.c from failing on queries containing CTEs. The existing tests in preprocess_minmax_aggregates() usually prevent it from trying to do anything with queries containing CTEs, but there's an exception: a CTE could be present as a member of an appendrel, if we flattened a UNION ALL that contains CTE references. If it did try to generate an optimized path for a query using a CTE, it failed with "could not find plan for CTE", as reported by Torsten F&Atilde;&para;rtsch. The proximate cause is an unwise decision in commit 3fc6e2d7f to clear subroot-&gt;cte_plan_ids in build_minmax_path(). That left the subroot's cte_plan_ids list out of step with its parse-&gt;cteList. Removing the "subroot-&gt;cte_plan_ids = NIL;" assignment is enough to let the case work again, but really it's pretty silly to be expending any cycles at all in this module when there are CTEs: we always treat their outputs as unordered so there's no way for the optimization to win. Hence, also add an early-exit test so we don't waste time like that. Back-patch to 9.6 where the misbehavior was introduced. Report: <a target="_blank" href="https://postgr.es/m/CAKkG4_=gjY5QiHtqSZyWMwDuTd_CftKoTaCqxjJ7uUz1-Gw=qw@mail.gmail.com">https://postgr.es/m/CAKkG4_=gjY5QiHtqSZyWMwDuTd_CftKoTaCqxjJ7uUz1-Gw=qw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f542a2eacca030c676cbb594f3b362d43f2f857">http://git.postgresql.org/pg/commitdiff/1f542a2eacca030c676cbb594f3b362d43f2f857</a></li>

<li>Improve handling of array elements as getdiag_targets and cursor_variables. There's no good reason why plpgsql's GET DIAGNOSTICS statement can't support an array element as target variable, since the execution code already uses the generic exec_assign_value() function to assign to it. Hence, refactor the grammar to allow that, by making getdiag_target depend on the assign_var production. Ideally we'd also let a cursor_variable expand to an element of a refcursor[] array, but that's substantially harder since those statements also have to handle bound-cursor-variable cases. For now, just make sure the reported error is sensible, ie "cursor variable must be a simple variable" not "variable must be of type cursor or refcursor". The latter was quite confusing from the user's viewpoint, since what he wrote satisfies the claimed restriction. Per bug #14463 from Zhou Digoal. Given the lack of previous complaints, I see no need for a back-patch. Discussion: <a target="_blank" href="https://postgr.es/m/20161213152548.14897.81245@wrigleys.postgresql.org">https://postgr.es/m/20161213152548.14897.81245@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55caaaeba877eac1feb6481fb413fa04ae9046ac">http://git.postgresql.org/pg/commitdiff/55caaaeba877eac1feb6481fb413fa04ae9046ac</a></li>

<li>Sync our copy of the timezone library with IANA release tzcode2016j. This is a trivial update (consisting in fact only in the addition of a comment). The point is just to get back to being synced with an official release of tzcode, rather than some ad-hoc point in their commit history, which is where commit 1f87181e1 left it. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93513d1b6559b2d0805f0b02d312ee550e3d010b">http://git.postgresql.org/pg/commitdiff/93513d1b6559b2d0805f0b02d312ee550e3d010b</a></li>

<li>Improve documentation around TS_execute(). I got frustrated by the lack of commentary in this area, so here is some reverse-engineered documentation, along with minor stylistic cleanup. No code changes more significant than removal of unused variables. Back-patch to 9.6, not because that's useful in itself, but because we have some bugs to fix in phrase search and this would cause merge failures if it's only in HEAD. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23c75b55aaccddea79545ffaf1cbfc9f1edeaa8c">http://git.postgresql.org/pg/commitdiff/23c75b55aaccddea79545ffaf1cbfc9f1edeaa8c</a></li>

<li>Fix FK-based join selectivity estimation for semi/antijoins. This case wasn't thought through sufficiently in commit 100340e2d. It's true that the FK proves that every outer row has a match in the inner table, but we forgot that some of the inner rows might be filtered away by WHERE conditions located within the semijoin's RHS. If the RHS is just one table, we can reasonably take the semijoin selectivity as equal to the fraction of the referenced table's rows that are expected to survive its restriction clauses. If the RHS is a join, it's not clear how much of the referenced table might get through the join, so fall back to the same rule we were already using for other outer-join cases: use the minimum of the regular per-clause selectivity estimates. This gives the same result as if we hadn't considered the FK at all when there's a single FK column, but it should still help for multi-column FKs, which is the case that 100340e2d is really meant to help with. Back-patch to 9.6 where the previous commit came in. Discussion: <a target="_blank" href="https://postgr.es/m/16149.1481835103@sss.pgh.pa.us">https://postgr.es/m/16149.1481835103@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fa93eec4e0c9c3e801e3c51aa4bae3a38aaa218">http://git.postgresql.org/pg/commitdiff/7fa93eec4e0c9c3e801e3c51aa4bae3a38aaa218</a></li>

<li>In contrib/uuid-ossp, #include headers needed for ntohl() and ntohs(). Oversight in commit b8cc8f947. I just noticed this causes compiler warnings on FreeBSD, and it really ought to cause warnings elsewhere too: all references I can find say that &lt;arpa/inet.h&gt; is required for these. We have a lot of code elsewhere that thinks that both &lt;netinet/in.h&gt; and &lt;arpa/inet.h&gt; should be included for these functions, so do it that way here too, even though &lt;arpa/inet.h&gt; ought to be sufficient according to the references I consulted. Back-patch to 9.4 where the previous commit landed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a0a34b5b678f0292d3a85a85fb10c79c393be26">http://git.postgresql.org/pg/commitdiff/4a0a34b5b678f0292d3a85a85fb10c79c393be26</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Various temporary slots test improvements. Fix the tests on slow machines (per buildfarm). Add test for dropping on error. And also try to consume real changes from temporary slots. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdf71389dd5da949cb305ace9a0347d50ef0f020">http://git.postgresql.org/pg/commitdiff/fdf71389dd5da949cb305ace9a0347d50ef0f020</a></li>

<li>Add support for temporary replication slots. This allows creating temporary replication slots that are removed automatically at the end of the session or on error. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a924c327e2793d2025b19e18de7917110dc8afd8">http://git.postgresql.org/pg/commitdiff/a924c327e2793d2025b19e18de7917110dc8afd8</a></li>

<li>doc: Remove some trailing whitespace. Per discussion, we will not at this time remove trailing whitespace in psql output displays where it is part of the actual psql output. From: Vladimir Rusinov &lt;vrusinov@google.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b645a05fc6112a4857ceac574d4aa24174a70417">http://git.postgresql.org/pg/commitdiff/b645a05fc6112a4857ceac574d4aa24174a70417</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Add missing newline in message <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cb545bfd485e91fdd981e0381f82077ebfd9f82">http://git.postgresql.org/pg/commitdiff/8cb545bfd485e91fdd981e0381f82077ebfd9f82</a></li>

<li>Fix typos in comments. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01776a07b3fe48ad48b0d9194301438399dfe597">http://git.postgresql.org/pg/commitdiff/01776a07b3fe48ad48b0d9194301438399dfe597</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Add missing documentation for effective_io_concurrency tablespace option. The description of effective_io_concurrency option was missing in ALTER TABLESPACE docs though it's included in CREATE TABLESPACE one. Back-patch to 9.6 where effective_io_concurrency tablespace option was added. Michael Paquier, reported by Marc-Olaf Jaschke <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e344c2cf4ff00ca38ea0035bc137dab95fdd0c0">http://git.postgresql.org/pg/commitdiff/4e344c2cf4ff00ca38ea0035bc137dab95fdd0c0</a></li>

<li>Ensure that num_sync is greater than zero in synchronous_standby_names. Previously num_sync could be set to zero and this setting caused an assertion failure. This means that multiple synchronous standbys code should assume that num_sync is greater than zero. Also setting num_sync to zero is nonsense because it's basically the configuration for synchronous replication. If users want not to make transaction commits wait for any standbys, synchronous_standby_names should be emptied to disable synchronous replication instead of setting num_sync to zero. This patch forbids users from setting num_sync to zero in synchronous_standby_names. If zero is specified, an error will happen during processing the parameter settings. Back-patch to 9.6 where multiple synchronous standbys feature was added. Patch by me. Reviewed by Tom Lane. Discussion: &lt;CAHGQGwHWB3izc6cXuFLh5kOcAbFXaRhhgwd-X5PeN9TEjxqXwg@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93eb619cd35b8adcfe6c86e34ea45d2e8edd322b">http://git.postgresql.org/pg/commitdiff/93eb619cd35b8adcfe6c86e34ea45d2e8edd322b</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>MSVC: Position MSBFLAGS after flags it might override. Christian Ullrich <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc07e06b1eac538328b5d8e31e77fdd079135864">http://git.postgresql.org/pg/commitdiff/cc07e06b1eac538328b5d8e31e77fdd079135864</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Pavel St&Auml;&rsaquo;hule sent in two more revisions of a patch to implement \g[b]store commands for psql.</p>

<p>Rafia Sabih sent in a patch to implement parallel index-only scans.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to fix an issue with strong random on Win32.</p>

<p>Micha&Atilde;&laquo;l Paquier, Amit Kapila and Ashutosh Sharma traded patches to fix an issue that manifested as a hang in pldebugger.</p>

<p>Amit Kapila sent in another revision of a patch to fix some hash index issues.</p>

<p>Tomas Vondra sent in another revision of a patch to implement multivariate statistics.</p>

<p>Nikita Glukhov sent in a patch to implement recursive processing of nested objects and arrays in json[b]_populate_record[set](), json[b]_to_record[set]().</p>

<p>Tomas Vondra sent in two more revisions of a patch to implement two slab-like memory allocators.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to implement character conversion with radix trees.</p>

<p>Dilip Kumar sent in another revision of a patch to implement parallel bitmap heap scan.</p>

<p>Tom Lane sent in a patch to fix matching of boolean index columns to sort ordering.</p>

<p>Aleksander Alekseev sent in a patch to fix documentation of the timestamp type.</p>

<p>Gilles Darold sent in another revision of a patch to implement pg_current_logfile().</p>

<p>Andrew Borodin sent in a patch to add a sleep sort test for pg_background.</p>

<p>Masahiko Sawada and Fujii Masao traded patches to add quorum commit.</p>

<p>Dilip Kumar sent in another revision of a patch to implement parallel merge join.</p>

<p>Robert Haas sent in a patch to refactor tstate serialization in preparation for making CURRENT_* parallel safe.</p>

<p>Jesper Pedersen sent in a patch to create a pg_catversion() builtin function.</p>

<p>Micha&Atilde;&laquo;l Paquier, Fujii Masao, and Kyotaro HORIGUCHI traded patches to fix a pg_basebackup crash.</p>

<p>Vladimir Rusinov sent in a patch to rename pg_switch_xlog to pg_switch_wal.</p>

<p>Robert Haas sent in a patch to remove _hash_wrtbuf() and cause those functions which previously called it to do MarkBufferDirty() directly.</p>

<p>Peter Eisentraut, Petr Jel&Atilde;&shy;nek, and Steve Singer traded patches to implement logical replication.</p>

<p>Rahila Syed sent in another revision of a patch to turn the types columns with unknown type in views to text.</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in a patch to add GUCs for predicate lock promotion thresholds.</p>

<p>Magnus Hagander sent in a patch to remove the -X option from pg_basebackup.</p>

<p>Magnus Hagander sent in a patch to add missing newlines to error messages in pg_basebackup.</p>

<p>Wesley Massuda sent in a patch to implement composite type NOT NULL constraints.</p>

<p>Alexander Law sent in a patch to speed up documentation builds.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in two more revisions of a patch to implement server-side session variables.</p>

<p>Dmitry Ivanov sent in a patch to fix an infelicity between the ancient sql_inheritance GUC and the new native partitions.</p>

<p>Heikki Linnakangas sent in a patch to shorten the window between writing the timeline history file and writing the end-of-recovery record.</p>

<p>Magnus Hagander sent in two revisions of a patch to add a --no-slot option to pg_basebackup.</p>

<p>Heikki Linnakangas sent in a patch to use the "plain:" prefix for plaintext passwords stored in pg_authid.</p>

<p>Amit Kapila sent in two revisions of a patch to fix dirty marking and lock chaining for hash indexes.</p>

<p>Mithun Cy sent in another revision of a patch to cache meta page for hash indexes.</p>

<p>Antonin Houska sent in a patch to simplify some code in basebackup.</p>

<p>Peter Moser sent in another revision of a patch to implement temporal query processing with range types.</p>

<p>Fujii Masao sent in a patch to fix a bug in synchronous replication where there were an invalid number of sync standbys in synchronous_standby_names.</p>

<p>Stephen Frost sent in a patch to fix some infelicities between pg_dump and TRANSFORMs, in passing fixing pg_dump for some ancient versions of PostgreSQL.</p>

<p>Robert Haas sent in a patch to remove the sql_inheritance GUC.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to fix some typos in waldender.c and slot.c.</p>

<p>Dmitry Dolgov sent in a patch to implement jsonb_delete with arrays.</p>

<p>Dean Rasheed sent in a patch to fix a CREATE OR REPLACE VIEW bug.</p>

<p>Stas Kelvich sent in a patch to speed up two-phase transactions via a twophase recovery list.</p>

<p>Kevin Grittner sent in another revision of a patch to add transition tables for, among other things, materialized view maintenance and row access in per-statement triggers.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement xmltable().</p>

<p>Peter Eisentraut sent in a patch to add a function to import operation system collations.</p>