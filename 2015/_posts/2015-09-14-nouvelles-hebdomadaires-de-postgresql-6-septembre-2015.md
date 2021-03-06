---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 septembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/09/14/Nouvelles-hebdomadaires-de-PostgreSQL-6-septembre-2015"
---


<p>PGConf.DE will be held on November 26-27, 2015 in Hamburg, Germany, at the Lindner Hotel am Michel. <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></p>

<h2>Offres d'emplois autour de PostgreSQL en septembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-09/">http://archives.postgresql.org/pgsql-jobs/2015-09/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PostgresOpen 2015 aura lieu &agrave; Dallas (Texas, USA) du 16 au 18 septembre&nbsp;: <a target="_blank" href="http://2015.postgresopen.org/">http://2015.postgresopen.org/</a></li>

<li>La <em>session PostgreSQL n&deg;7</em> aura lieu le 24 septembre 2015 &agrave; Paris (France)&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche)&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PgCUBA du 19 au 23 octobre 2015 &agrave; la Havane. Informations en espagnol ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://www.postgresql.org/about/event/1813/">http://www.postgresql.org/about/event/1813/</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. L'appel &agrave; conf&eacute;renciers expire le 31 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/#call-for-papers">http://pgbr.postgresql.org.br/2015/en/#call-for-papers</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150906233037.GA7906@fetter.org">http://www.postgresql.org/message-id/20150906233037.GA7906@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Remove long-dead support for platforms without sig_atomic_t. C89 requires &lt;signal.h&gt; to define sig_atomic_t, and there is no evidence in the buildfarm that any supported platforms don't comply. Remove the configure test to stop wasting build cycles on a purely historical issue. (Once upon a time, we cared about supporting C89-compliant compilers on machines with pre-C89 system headers, but that use-case has been dead for quite a few years.) I have some other fixes planned in this area, but let's start with this to see if the buildfarm produces any surprising results. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f19d0f12fa235c6951ff431bd60da594356a1a6">http://git.postgresql.org/pg/commitdiff/0f19d0f12fa235c6951ff431bd60da594356a1a6</a></li>

<li>Remove support for Unix systems without the POSIX signal APIs. Remove configure's checks for HAVE_POSIX_SIGNALS, HAVE_SIGPROCMASK, and HAVE_SIGSETJMP. These APIs are required by the Single Unix Spec v2 (POSIX 1997), which we generally consider to define our minimum required set of Unix APIs. Moreover, no buildfarm member has reported not having them since 2012 or before, which means that even if the code is still live somewhere, it's untested --- and we've made plenty of signal-handling changes of late. So just take these APIs as given and save the cycles for configure probes for them. However, we can't remove as much C code as I'd hoped, because the Windows port evidently still uses the non-POSIX code paths for signal masking. Since we're largely emulating these BSD-style APIs for Windows anyway, it might be a good thing to switch over to POSIX-like notation and thereby remove a few more #ifdefs. But I'm not in a position to code or test that. In the meantime, we can at least make things a bit more transparent by testing for WIN32 explicitly in these places. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a65e086453e0dea5cdd7f9fe9dc6c34d8bfc0f2c">http://git.postgresql.org/pg/commitdiff/a65e086453e0dea5cdd7f9fe9dc6c34d8bfc0f2c</a></li>

<li>Remove theoretically-unnecessary special case for icc. Intel's icc is generally able to swallow asm blocks written for gcc. We have a few places that don't seem to know that, though. Experiment with removing the special case for icc in ia64_get_bsp(); if the buildfarm likes this, I'll try more cleanup. This is a good test case because it involves a "stop" notation that seems like it might not be very portable. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c713d6ea29c91cd2cbd92fa801a61e55ea2a3c4">http://git.postgresql.org/pg/commitdiff/2c713d6ea29c91cd2cbd92fa801a61e55ea2a3c4</a></li>

<li>Actually, it's not that hard to merge the Windows pqsignal code ... ... just need to typedef sigset_t and provide sigemptyset/sigfillset, which are easy enough. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f333204bbcd32091311b070e8f8ab4717dd8cadf">http://git.postgresql.org/pg/commitdiff/f333204bbcd32091311b070e8f8ab4717dd8cadf</a></li>

<li>Allow icc to use the same atomics infrastructure as gcc. The atomics headers were written under the impression that icc doesn't handle gcc-style asm blocks, but this is demonstrably false on x86_[64], because s_lock.h has done it that way for more than a decade. (The jury is still out on whether this also works on ia64, so I'm leaving ia64-related code alone for the moment.) Treat gcc and icc the same in these headers. This is less code and it should improve the results for icc, because we hadn't gotten around to providing icc-specific implementations for most of the atomics. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf25b2a2f9a4306637a985cee86a9a987c0b6a7c">http://git.postgresql.org/pg/commitdiff/cf25b2a2f9a4306637a985cee86a9a987c0b6a7c</a></li>

<li>Clean up icc + ia64 situation. Some googling turned up multiple sources saying that older versions of icc do not accept gcc-compatible asm blocks on IA64, though asm does work on x86[_64]. This is apparently fixed as of icc version 12.0 or so, but that doesn't help us much; if we have to carry the extra implementation anyway, we may as well just use it for icc rather than add a compiler version test. Hence, revert commit 2c713d6ea29c91cd2cbd92fa801a61e55ea2a3c4 (though I separated the icc code from the gcc code completely, producing what seems cleaner code). Document the state of affairs more explicitly, both in s_lock.h and postgres.c, and make some cosmetic adjustments around the IA64 code in s_lock.h. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/123c9d2fc1fe0a8ee676d8244198b34a5e99ea90">http://git.postgresql.org/pg/commitdiff/123c9d2fc1fe0a8ee676d8244198b34a5e99ea90</a></li>

<li>Document that PL/Python now returns floats using repr() not str(). Commit 1ce7a57ca neglected to update the user-facing documentation, which described the old behavior precisely. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/075ab425bdbb4bb2de41624305f20885cae7ba7e">http://git.postgresql.org/pg/commitdiff/075ab425bdbb4bb2de41624305f20885cae7ba7e</a></li>

<li>Fix subtransaction cleanup after an outer-subtransaction portal fails. Formerly, we treated only portals created in the current subtransaction as having failed during subtransaction abort. However, if the error occurred while running a portal created in an outer subtransaction (ie, a cursor declared before the last savepoint), that has to be considered broken too. To allow reliable detection of which ones those are, add a bookkeeping field to struct Portal that tracks the innermost subtransaction in which each portal has actually been executed. (Without this, we'd end up failing portals containing functions that had called the subtransaction, thereby breaking plpgsql exception blocks completely.) In addition, when we fail an outer-subtransaction Portal, transfer its resources into the subtransaction's resource owner, so that they're released early in cleanup of the subxact. This fixes a problem reported by Jim Nasby in which a function executed in an outer-subtransaction cursor could cause an Assert failure or crash by referencing a relation created within the inner subtransaction. The proximate cause of the Assert failure is that AtEOSubXact_RelationCache assumed it could blow away a relcache entry without first checking that the entry had zero refcount. That was a bad idea on its own terms, so add such a check there, and to the similar coding in AtEOXact_RelationCache. This provides an independent safety measure in case there are still ways to provoke the situation despite the Portal-level changes. This has been broken since subtransactions were invented, so back-patch to all supported branches. Tom Lane and Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5454f99c49fce01ce946b5f52a4929c21d5f229">http://git.postgresql.org/pg/commitdiff/c5454f99c49fce01ce946b5f52a4929c21d5f229</a></li>

<li>Rearrange the handling of error context reports. Remove the code in plpgsql that suppressed the innermost line of CONTEXT for messages emitted by RAISE commands. That was never more than a quick backwards-compatibility hack, and it's pretty silly in cases where the RAISE is nested in several levels of function. What's more, it violated our design theory that verbosity of error reports should be controlled on the client side not the server side. To alleviate the resulting noise increase, introduce a feature in libpq and psql whereby the CONTEXT field of messages can be suppressed, either always or only for non-error messages. Printing CONTEXT for errors only is now their default behavior. The actual code changes here are pretty small, but the effects on the regression test outputs are widespread. I had to edit some of the alternative expected outputs by hand; hopefully the buildfarm will soon find anything I fat-fingered. In passing, fix up (again) the output line counts in psql's various help displays. Add some commentary about how to verify them. Pavel Stehule, reviewed by Petr Jel&Atilde;&shy;nek, Jeevan Chalke, and others <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0426f349effb6bde2061f3398a71db7180c97dd9">http://git.postgresql.org/pg/commitdiff/0426f349effb6bde2061f3398a71db7180c97dd9</a></li>

<li>Fix CreateTableSpace() so it will compile without HAVE_SYMLINK. This has been broken since 9.3 (commit 82b1b213cad3a69c to be exact), which suggests that nobody is any longer using a Windows build system that doesn't provide a symlink emulation. Still, it's wrong on its own terms, so repair. YUriy Zhuravlev <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9270d8db9a1cd6465e21215e6451b552995fcb08">http://git.postgresql.org/pg/commitdiff/9270d8db9a1cd6465e21215e6451b552995fcb08</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Small grammar fix. Josh Kupershmidt <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93370076c40730ce2a9071c6a4694d6b0e5b2f0c">http://git.postgresql.org/pg/commitdiff/93370076c40730ce2a9071c6a4694d6b0e5b2f0c</a></li>

<li>Support RADIUS passwords up to 128 characters. Previous limit was 16 characters, due to lack of support for multiple passes of encryption. Marko Tiikkaja <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/643beffe8f69327147513a0f0d750e8ca035a4f6">http://git.postgresql.org/pg/commitdiff/643beffe8f69327147513a0f0d750e8ca035a4f6</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>psql: print longtable as a possible \pset option. For some reason this message was not updated when the longtable option was added. Backpatch through 9.3 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f7d044ba842ab3359a8a3190ff2f3aa1de2a6bb">http://git.postgresql.org/pg/commitdiff/8f7d044ba842ab3359a8a3190ff2f3aa1de2a6bb</a></li>

<li>docs: remove outdated note about unique indexes. Patch by Josh Kupershmidt Backpatch through 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/049a7799dfce096923da27a9b0e4a3c7a0a47104">http://git.postgresql.org/pg/commitdiff/049a7799dfce096923da27a9b0e4a3c7a0a47104</a></li>

<li>pg_upgrade docs: clarify rsync and move verification step. These are adjustments based on someone using the new standby upgrade steps. Report by Andy Colson Backpatch through 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/46bd95e2a873feb4799b77eca7276cf758e36cca">http://git.postgresql.org/pg/commitdiff/46bd95e2a873feb4799b77eca7276cf758e36cca</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Use &lt;substeps&gt; in pg_upgrade's procedure. For clarity, so that the substeps are not numbered identically to the outer procedure's steps. Per report from Andy Colson in <a target="_blank" href="http://www.postgresql.org/message-id/55D789B5.7040308@squeakycode.net">http://www.postgresql.org/message-id/55D789B5.7040308@squeakycode.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9646d2fd62a444ab4502e49dfe3cbf9d7350c5e2">http://git.postgresql.org/pg/commitdiff/9646d2fd62a444ab4502e49dfe3cbf9d7350c5e2</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Allow notifications to bgworkers without database connections. Previously, if one background worker registered another background worker and set bgw_notify_pid while for the second background worker, it would not receive notifications from the postmaster unless, at the time the "parent" was registered, BGWORKER_BACKEND_DATABASE_CONNECTION was set. To fix, instead instead of including only those background workers that requested database connections in the postmater's BackendList, include them all. There doesn't seem to be any reason not do this, and indeed it removes a significant amount of duplicated code. The other option is to make PostmasterMarkPIDForWorkerNotify look at BackgroundWorkerList in addition to BackendList, but that adds more code duplication instead of getting rid of it. Patch by me. Review and testing by Ashutosh Bapat. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a02b3d732cf3ec13e089768bf9ce9abbdcc8a3e">http://git.postgresql.org/pg/commitdiff/8a02b3d732cf3ec13e089768bf9ce9abbdcc8a3e</a></li>

<li>Update the SSL test suite for recent changes to TAP testing framework. listen_addresses needs to be handled differently now, and so does logging. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a09009e4278439f99d03adfefe2eec72ca35dcc3">http://git.postgresql.org/pg/commitdiff/a09009e4278439f99d03adfefe2eec72ca35dcc3</a></li>

<li>Assorted code review for recent ProcArrayLock patch. Post-commit review by Andres Freund discovered a couple of concurrency bugs in the original patch: specifically, if the leader cleared a follower's XID before it reached PGSemaphoreLock, the semaphore would be left in the wrong state; and if another process did PGSemaphoreUnlock for some unrelated reason, we might resume execution before the fact that our XID was cleared was globally visible. Also, improve the wording of some comments, rename nextClearXidElem to firstClearXidElem in PROC_HDR for clarity, and drop some volatile qualifiers that aren't necessary. Amit Kapila, reviewed and slightly revised by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4aec49899e5782247e134f94ce1c6ee926f88e1c">http://git.postgresql.org/pg/commitdiff/4aec49899e5782247e134f94ce1c6ee926f88e1c</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Flush to show results of TestLib.pm (TAP) test as we go. It appears that some attempt was made to do this using autocommit, but it wasn't effective (at least on Ubuntu 14.04). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adb495049f575563930f3c1fbef2843bda3ae46d">http://git.postgresql.org/pg/commitdiff/adb495049f575563930f3c1fbef2843bda3ae46d</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Allow usage of huge maintenance_work_mem for GIN build. Currently, in-memory posting list during GIN build process is limited 1GB because of using repalloc. The patch replaces call of repalloc to repalloc_huge. It increases limit of posting list from 180 millions (1GB / sizeof(ItemPointerData)) to 4 billions limited by maxcount/count fields in GinEntryAccumulator and subsequent calls. Check added. Also, fix accounting of allocatedMemory during build to prevent integer overflow with maintenance_work_mem &gt; 4GB. Robert Abraham &lt;robert.abraham86@googlemail.com&gt; with additions by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30bb26b5e04cff911db960801e32e5f57045eb61">http://git.postgresql.org/pg/commitdiff/30bb26b5e04cff911db960801e32e5f57045eb61</a></li>

<li>Make unaccent handle all diacritics known to Unicode, and expand ligatures correctly. Add Python script for buiding unaccent.rules from Unicode data. Don't backpatch because unaccent changes may require tsvector/index rebuild. Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1bbd52cb9a4aa61a7dd751f5d1f7b44650d6122a">http://git.postgresql.org/pg/commitdiff/1bbd52cb9a4aa61a7dd751f5d1f7b44650d6122a</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Disable fsync throughout TAP test suites. Most suites already did so via start_test_server(), but the pg_rewind, pg_ctl and pg_controldata suites ran a postmaster or initdb with fsync enabled. This halves the pg_rewind suite's runtime on buildfarm member tern. It makes tern and that machine's other buildfarm members less vulnerable to noise failures from postmaster startup overrunning the 60s pg_ctl timeout. Back-patch to 9.5, where pg_rewind was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d7a103f41fbdc54e608c431ead866061289307d">http://git.postgresql.org/pg/commitdiff/7d7a103f41fbdc54e608c431ead866061289307d</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Document that max_worker_processes must be high enough in standby. The setting values of some parameters including max_worker_processes must be equal to or higher than the values on the master. However, previously max_worker_processes was not listed as such parameter in the document. So this commit adds it to that list. Back-patch to 9.4 where max_worker_processes was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ea5ce5c5f204918b8a9fa6eaa8f3f1374aa8aec">http://git.postgresql.org/pg/commitdiff/1ea5ce5c5f204918b8a9fa6eaa8f3f1374aa8aec</a></li>

</ul>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Fix brin index summarizing while vacuuming. If the number of heap blocks is not multiples of pages per range, the summarizing produces wrong summary information for the last brin index tuple while vacuuming. Problem reported by Tatsuo Ishii and fixed by Amit Langote. Discussion at "[HACKERS] BRIN INDEX value (message id :20150903.174935.1946402199422994347.t-ishii@sraoss.co.jp) Backpatched to 9.5 in which brin index was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c39f5674dfc77802b4245dd92cb4b1e35499a5a5">http://git.postgresql.org/pg/commitdiff/c39f5674dfc77802b4245dd92cb4b1e35499a5a5</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix misc typos. Oskari Saarenmaa. Backpatch to stable branches where applicable. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c80b5f66c6faff085e312492be0aa50754e99eb9">http://git.postgresql.org/pg/commitdiff/c80b5f66c6faff085e312492be0aa50754e99eb9</a></li>

</ul>

<p>Gregory Stark pushed:</p>

<ul>

<li>Move DTK_ISODOW DTK_DOW and DTK_DOY to be type UNITS rather than RESERV. RESERV is meant for tokens like "now" and having them in that category throws errors like these when used as an input date: stark=# SELECT 'doy'::timestamptz; ERROR: unexpected dtype 33 while parsing timestamptz "doy" LINE 1: SELECT 'doy'::timestamptz; stark=# SELECT 'dow'::timestamptz; ERROR: unexpected dtype 32 while parsing timestamptz "dow" LINE 1: SELECT 'dow'::timestamptz; Found by LLVM's Libfuzzer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/258ee1b635e43a37e901fd5f62bdd5f1087d65a5">http://git.postgresql.org/pg/commitdiff/258ee1b635e43a37e901fd5f62bdd5f1087d65a5</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Add ability to reserve WAL upon slot creation via replication protocol. Since 6fcd885 it is possible to immediately reserve WAL when creating a slot via pg_create_physical_replication_slot(). Extend the replication protocol to allow that as well. Although, in contrast to the SQL interface, it is possible to update the reserved location via the replication interface, it is still useful being able to reserve upon creation there. Otherwise the logic in ReplicationSlotReserveWal() has to be repeated in slot employing clients. Author: Michael Paquier Discussion: CAB7nPqT0Wc1W5mdYGeJ_wbutbwNN+3qgrFR64avXaQCiJMGaYA@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c314ead5be0c627a6f654a74f18099466c566c47">http://git.postgresql.org/pg/commitdiff/c314ead5be0c627a6f654a74f18099466c566c47</a></li>

</ul>

<p>Joe Conway pushed:</p>

<ul>

<li>Adjust sepgsql regression output for recent error context change Recent commit 0426f349e changed handling of error context reports in such a way to have a minor effect on the sepgsql regression output. Adapt the expected output file to suit. Since that commit was HEAD only, so is this one. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03543afe1529b437e2f6861eab15f9d71debdba7">http://git.postgresql.org/pg/commitdiff/03543afe1529b437e2f6861eab15f9d71debdba7</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Daniel Verite sent in another revision of a patch to add \rotate to psql.</p>

<p>Amit Kapila sent in another revision of a patch to reduce ClogControlLock contention.</p>

<p>Kevin Grittner sent in another revision of a patch to implement "snapshot too old," this time, configured by time.</p>

<p>YUriy Zhuravlev sent in another revision of a patch intended to help scale the buffer manager to large numbers of cores.</p>

<p>&Atilde;lvaro Herrera sent in PoC a patch to add columnar stores.</p>

<p>Alexander Korotkov sent in two more revisions of a patch to add access method extensibility.</p>

<p>Peter Eisentraut sent in a patch to remove wal_level "archive", fold into "hot_standby".</p>

<p>Peter Eisentraut sent in a patch to clean up the Unicode mapping script business in src/backend/utils/mb/Unicode/.</p>

<p>Peter Eisentraut sent in a patch to make the perl programs in the source tree perlcritic-compliant.</p>

<p>Amit Kapila sent in a patch to increase the number of CLOG buffers.</p>

<p>Jeff Janes sent in a patch to fix a potential GIN vacuum bug.</p>

<p>Alexander Shulgin sent in two more revisions of a patch to show running query plans on demand using auto_explain and signals.</p>

<p>Dinesh Kumar and Pavel St&Auml;&rsaquo;hule traded patches to add an SQL-callable function to add a pg_report_log() function.</p>

<p>Marko Tiikkaja sent in a patch to add a more useful HINT when erroring out on UPDATE foo SET foo.bar.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement multi-tenancy via RLS.</p>

<p>Thomas Munro sent in a patch to make it possible to set synchronous_commit to mean apply.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add tab completion for SET ROLE TO in psql.</p>

<p>Tomas Vondra sent in a patch to ensure that a hash table is set correctly.</p>

<p>Satoshi Nagayasu sent in another revision of a patch to fix an infelicity in pg_stat_statements.</p>

<p>David Rowley sent in another revision of a patch to speed up timestamptz_out.</p>

<p>Nikolay Shaplov sent in two revisions of a patch to modify pageinspect to show tuple data.</p>

<p>Amit Kapila sent in another revision of a patch to assess parallel safety.</p>

<p>Amit Kapila sent in another revision of a patch to implement parallel sequential scan.</p>

<p>Fabien COELHO sent in another revision of a patch to make some additions and improvements to pgbench.</p>

<p>Jan Wieck sent in a patch to fix an O(N^2) problem in foreign keys.</p>

<p>Bruce Momjian sent in a patch to ensure that non-default tablespaces work with pg_upgrade.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to allow backslash-continuations in custom scripts in pgbench.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add microvacuum for GiST.</p>

<p>SAWADA Masahiko sent in another revision of a patch to add a "frozen" bit to the visibility map.</p>

<p>Tom Lane sent in a patch to fix some infelicities in pg_ctl's startup.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix an infelicity between foreign join pushdown vs EvalPlanQual.</p>

<p>Heikki Linnakangas sent in a patch to mark speculative insertions in replay.</p>

<p>Antonin Houska sent in a patch to ensure that only volatile variables are used in spinlock manipulation.</p>

<p>Oskari Saarenmaa sent in a patch to make sure always to return a non-scalar value from jsonb_concat.</p>

<p>Thomas Munro sent in two revisions of a patch to make tab-complete.c easier to maintain.</p>

<p>Petr Jelinek sent in a patch to fix an infelicity between track_commit_timestamp and COMMIT PREPARED.</p>

<p>Julien Rouhaud sent in a patch to bring the documention for PageHeaderData up to date.</p>

<p>Peter Geoghegan sent in another revision of a patch to use quicksort for every external sort run.</p>

<p>Simon Riggs sent in a patch to separate Buffer LWLocks from the main LW locks, allowing them to have different padding.</p>

<p>Julien Rouhaud sent in another revision of a patch to allow a per-tablespace effective_io_concurrency setting.</p>

<p>Fabien COELHO sent in two more revisions of a patch to allow checkpointer continuous flushing.</p>

<p>Ildus Kurbangaliev sent in two revisions of a patch to refactor LWLock tranches.</p>