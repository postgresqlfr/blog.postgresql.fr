---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 juillet 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/07/03/Nouvelles-hebdomadaires-de-PostgreSQL-2-juillet-2017"
---


<p><em>PGConf Local&nbsp;: Seattle</em> se tiendra les 11 & 12 ao&ucirc;t 2017. L'appel &agrave; conf&eacute;renciers est lanc&eacute; et court jusqu'au 2 juillet. Soumettez vos propositions &agrave;&nbsp;: <a target="_blank" href="https://www.pgconf.us/#Seattle2017">https://www.pgconf.us/#Seattle2017</a></p>

<p>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t. L'agenda a &eacute;t&eacute; publi&eacute; et les inscriptions sont d&eacute;sormais ouvertes&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></p>

<p><em>PGConf Local&nbsp;: Philly</em> aura lieu les 13 & 14 juillet 2017. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="https://www.pgconf.us/conferences/Philly2017">https://www.pgconf.us/conferences/Philly2017</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>PostgreSQL Automatic Failover (PAF) v2.2_beta1&nbsp;: <a target="_blank" href="https://github.com/dalibo/PAF/releases/tag/v2.2_beta1">https://github.com/dalibo/PAF/releases/tag/v2.2_beta1</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juillet</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-07/">http://archives.postgresql.org/pgsql-jobs/2017-07/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PGBR2017 (La PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay UK 2017 aura lieu &agrave; Londres le 4 juillet 2017&nbsp;: <a target="_blank" href="http://www.pgconf.uk">http://www.pgconf.uk</a></li>

<li>La <em>PGConf.Brazil 2017 OnLine Edition</em> sera en direct depuis le Br&eacute;sil du 10 au 14 juillet 2017&nbsp; <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre. L'appel &agrave; conf&eacute;renciers court jusqu'au 9 juillet&nbsp;: <a target="_blank" href="http://2017.pgday.it/en/blog/call-for-papers">http://2017.pgday.it/en/blog/call-for-papers</a> <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170703032113.GA30126@fetter.org">http://www.postgresql.org/message-id/20170703032113.GA30126@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Consistently use () for function calls in release notes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/59cd3987afd61191483a4cfe8f6a0abfb8c878d6">https://git.postgresql.org/pg/commitdiff/59cd3987afd61191483a4cfe8f6a0abfb8c878d6</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Minor code review for parse_phrase_operator(). Fix its header comment, which described the old behavior of the &lt;N&gt; phrase distance operator; we missed updating that in commit 028350f61. Also, reset errno before strtol() call, to defend against the possibility that it was already ERANGE at entry. (The lack of complaints says that it generally isn't, but this is at least a latent bug.) Very minor stylistic improvements as well. Victor Drobny noted the obsolete comment, I noted the errno issue. Back-patch to 9.6 where this code was added, just in case the errno issue is a live bug in some cases. Discussion: <a target="_blank" href="https://postgr.es/m/2b5382fdff9b1f79d5eb2c99c4d2cbe2@postgrespro.ru">https://postgr.es/m/2b5382fdff9b1f79d5eb2c99c4d2cbe2@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/00c5e511b94059396150c406f5d71598034a2061">https://git.postgresql.org/pg/commitdiff/00c5e511b94059396150c406f5d71598034a2061</a></li>

<li>Avoid useless "x = ANY(ARRAY[])" test for empty partition list. This arises in practice if the partition only admits NULL values. Jeevan Ladhe Discussion: <a target="_blank" href="https://postgr.es/m/CAOgcT0OChrN--uuqH6wG6Z8+nxnCWJ+2Q-uhnK4KOANdRRxuAw@mail.gmail.com">https://postgr.es/m/CAOgcT0OChrN--uuqH6wG6Z8+nxnCWJ+2Q-uhnK4KOANdRRxuAw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5efccc1cb43005a832776ed9158d2704fd976f8f">https://git.postgresql.org/pg/commitdiff/5efccc1cb43005a832776ed9158d2704fd976f8f</a></li>

<li>Improve wait logic in TAP tests for streaming replication. Remove hard-wired sleep(2) delays in 001_stream_rep.pl in favor of using poll_query_until to check for the desired state to appear. In addition, add such a wait before the last test in the script, as it's possible to demonstrate failures there after upcoming improvements in pg_ctl. (We might end up adding polling before each of the get_slot_xmins calls in this script, but I feel no great need to do that until shown necessary.) In passing, clarify the description strings for some of the test cases. Michael Paquier and Craig Ringer, pursuant to a complaint from me Discussion: <a target="_blank" href="https://postgr.es/m/8962.1498425057@sss.pgh.pa.us">https://postgr.es/m/8962.1498425057@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5c77690f6f419c504b7d8248db30c2280217e72e">https://git.postgresql.org/pg/commitdiff/5c77690f6f419c504b7d8248db30c2280217e72e</a></li>

<li>Reduce pg_ctl's reaction time when waiting for postmaster start/stop. pg_ctl has traditionally waited one second between probes for whether the start or stop request has completed. That behavior was embodied in the original shell script written in 1999 (commit 5b912b089) and I doubt anyone's questioned it since. Nowadays, machines are a lot faster, and the shell script is long since replaced by C code, so it's fair to reconsider how long we ought to wait. This patch adjusts the coding so that the wait time can be any even divisor of 1 second, and sets the actual probe rate to 10 per second. That's based on experimentation with the src/test/recovery TAP tests, which include a lot of postmaster starts and stops. This patch alone reduces the (non-parallelized) runtime of those tests from ~4m30s to ~3m5s on my machine. Increasing the probe rate further doesn't help much, so this seems like a good number. In the real world this probably won't have much impact, since people don't start/stop production postmasters often, and the shutdown checkpoint usually takes nontrivial time too. But it makes development work and testing noticeably snappier, and that's good enough reason for me. Also, by reducing the dead time in postmaster restart sequences, this change has made it easier to reproduce some bugs that have been lurking for awhile. Patches for those will follow. Discussion: <a target="_blank" href="https://postgr.es/m/18444.1498428798@sss.pgh.pa.us">https://postgr.es/m/18444.1498428798@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c61559ec3a41ad72a13c18d95b1eee8251de94c6">https://git.postgresql.org/pg/commitdiff/c61559ec3a41ad72a13c18d95b1eee8251de94c6</a></li>

<li>Ignore old stats file timestamps when starting the stats collector. The stats collector disregards inquiry messages that bear a cutoff_time before when it last wrote the relevant stats file. That's fine, but at startup when it reads the "permanent" stats files, it absorbed their timestamps as if they were the times at which the corresponding temporary stats files had been written. In reality, of course, there's no data out there at all. This led to disregarding inquiry messages soon after startup if the postmaster had been shut down and restarted within less than PGSTAT_STAT_INTERVAL; which is a pretty common scenario, both for testing and in the field. Requesting backends would hang for 10 seconds and then report failure to read statistics, unless they got bailed out by some other backend coming along and making a newer request within that interval. I came across this through investigating unexpected delays in the src/test/recovery TAP tests: it manifests there because the autovacuum launcher hangs for 10 seconds when it can't get statistics at startup, thus preventing a second shutdown from occurring promptly. We might want to do some things in the autovac code to make it less prone to getting stuck that way, but this change is a good bug fix regardless. In passing, also fix pgstat_read_statsfiles() to ensure that it re-zeroes its global stats variables if they are corrupted by a short read from the stats file. (Other reads in that function go into temp variables, so that the issue doesn't arise.) This has been broken since we created the separation between permanent and temporary stats files in 8.4, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/16860.1498442626@sss.pgh.pa.us">https://postgr.es/m/16860.1498442626@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ad1b5c842ba28aab0f487e77f8cac46a30b3b63e">https://git.postgresql.org/pg/commitdiff/ad1b5c842ba28aab0f487e77f8cac46a30b3b63e</a></li>

<li>Don't lose walreceiver start requests due to race condition in postmaster. When a walreceiver dies, the startup process will notice that and send a PMSIGNAL_START_WALRECEIVER signal to the postmaster, asking for a new walreceiver to be launched. There's a race condition, which at least in HEAD is very easy to hit, whereby the postmaster might see that signal before it processes the SIGCHLD from the walreceiver process. In that situation, sigusr1_handler() just dropped the start request on the floor, reasoning that it must be redundant. Eventually, after 10 seconds (WALRCV_STARTUP_TIMEOUT), the startup process would make a fresh request --- but that's a long time if the connection could have been re-established almost immediately. Fix it by setting a state flag inside the postmaster that we won't clear until we do launch a walreceiver. In cases where that results in an extra walreceiver launch, it's up to the walreceiver to realize it's unwanted and go away --- but we have, and need, that logic anyway for the opposite race case. I came across this through investigating unexpected delays in the src/test/recovery TAP tests: it manifests there in test cases where a master server is stopped and restarted while leaving streaming slaves active. This logic has been broken all along, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/21344.1498494720@sss.pgh.pa.us">https://postgr.es/m/21344.1498494720@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e5d494d78cf6c60f04a5d3f571205f452a78d81f">https://git.postgresql.org/pg/commitdiff/e5d494d78cf6c60f04a5d3f571205f452a78d81f</a></li>

<li>Reduce wal_retrieve_retry_interval in applicable TAP tests. By default, wal_retrieve_retry_interval is five seconds, which is far more than is needed in any of our TAP tests, leaving the test cases just twiddling their thumbs for significant stretches. Moreover, because it's so large, we get basically no testing of the retry-before- master-is-ready code path. Hence, make PostgresNode::init set up wal_retrieve_retry_interval = '500ms' as part of its customization of test clusters' postgresql.conf. This shaves quite a few seconds off the runtime of the recovery TAP tests. Back-patch into 9.6. We have wal_retrieve_retry_interval in 9.5, but the test infrastructure isn't there. Discussion: <a target="_blank" href="https://postgr.es/m/31624.1498500416@sss.pgh.pa.us">https://postgr.es/m/31624.1498500416@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2710ccd782d0308a3fa1ab193531183148e9b626">https://git.postgresql.org/pg/commitdiff/2710ccd782d0308a3fa1ab193531183148e9b626</a></li>

<li>Support tcp_keepalives_idle option on Solaris. Turns out that the socket option for this is named TCP_KEEPALIVE_THRESHOLD, at least according to the tcp(7P) man page for Solaris 11. (But since that text refers to "SunOS", it's likely pretty ancient.) It appears that the symbol TCP_KEEPALIVE does get defined on that platform, but it doesn't seem to represent a valid protocol-level socket option. This leads to bleats in the postmaster log, and no tcp_keepalives_idle functionality. Per bug #14720 from Andrey Lizenko, as well as an earlier report from Dhiraj Chawla that nobody had followed up on. The issue's been there since we added the TCP_KEEPALIVE code path in commit 5acd417c8, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/20170627163757.25161.528@wrigleys.postgresql.org">https://postgr.es/m/20170627163757.25161.528@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f0256c774daa0dac96154e7ddf54197fb2b83f4d">https://git.postgresql.org/pg/commitdiff/f0256c774daa0dac96154e7ddf54197fb2b83f4d</a></li>

<li>Re-allow SRFs and window functions within sub-selects within aggregates. check_agg_arguments_walker threw an error upon seeing a SRF or window function, but that is too aggressive: if the function is within a sub-select then it's perfectly fine. I broke the SRF case in commit 0436f6bde by copying the logic for window functions ... but that was broken too, and had been since commit eaccfded9. Repair both cases in HEAD, and the window function case back to 9.3. 9.2 gets this right. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9c7dc89282b3dac5685c39d4d792b02ca573c2d3">https://git.postgresql.org/pg/commitdiff/9c7dc89282b3dac5685c39d4d792b02ca573c2d3</a></li>

<li>Second try at fixing tcp_keepalives_idle option on Solaris. Buildfarm evidence shows that TCP_KEEPALIVE_THRESHOLD doesn't exist after all on Solaris &lt; 11. This means we need to take positive action to prevent the TCP_KEEPALIVE code path from being taken on that platform. I've chosen to limit it with "&amp;& defined(__darwin__)", since it's unclear that anyone else would follow Apple's precedent of spelling the symbol that way. Also, follow a suggestion from Michael Paquier of eliminating code duplication by defining a couple of intermediate symbols for the socket option. In passing, make some effort to reduce the number of translatable messages by replacing "setsockopt(foo) failed" with "setsockopt(%s) failed", etc, throughout the affected files. And update relevant documentation so that it doesn't claim to provide an exhaustive list of the possible socket option names. Like the previous commit (f0256c774), back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/20170627163757.25161.528@wrigleys.postgresql.org">https://postgr.es/m/20170627163757.25161.528@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/99255d73c07c89b69be028a1a7b8027a78befed4">https://git.postgresql.org/pg/commitdiff/99255d73c07c89b69be028a1a7b8027a78befed4</a></li>

<li>Change pg_ctl to detect server-ready by watching status in postmaster.pid. Traditionally, "pg_ctl start -w" has waited for the server to become ready to accept connections by attempting a connection once per second. That has the major problem that connection issues (for instance, a kernel packet filter blocking traffic) can't be reliably told apart from server startup issues, and the minor problem that if server startup isn't quick, we accumulate "the database system is starting up" spam in the server log. We've hacked around many of the possible connection issues, but it resulted in ugly and complicated code in pg_ctl.c. In commit c61559ec3, I changed the probe rate to every tenth of a second. That prompted Jeff Janes to complain that the log-spam problem had become much worse. In the ensuing discussion, Andres Freund pointed out that we could dispense with connection attempts altogether if the postmaster were changed to report its status in postmaster.pid, which "pg_ctl start" already relies on being able to read. This patch implements that, teaching postmaster.c to report a status string into the pidfile at the same state-change points already identified as being of interest for systemd status reporting (cf commit 7d17e683f). pg_ctl no longer needs to link with libpq at all; all its functions now depend on reading server files. In support of this, teach AddToDataDirLockFile() to allow addition of postmaster.pid lines in not-necessarily-sequential order. This is needed on Windows where the SHMEM_KEY line will never be written at all. We still have the restriction that we don't want to truncate the pidfile; document the reasons for that a bit better. Also, fix the pg_ctl TAP tests so they'll notice if "start -w" mode is broken --- before, they'd just wait out the sixty seconds until the loop gives up, and then report success anyway. (Yes, I found that out the hard way.) While at it, arrange for pg_ctl to not need to #include miscadmin.h; as a rather low-level backend header, requiring that to be compilable client-side is pretty dubious. This requires moving the #define's associated with the pidfile into a new header file, and moving PG_BACKEND_VERSIONSTR someplace else. For lack of a clearly better "someplace else", I put it into port.h, beside the declaration of find_other_exec(), since most users of that macro are passing the value to find_other_exec(). (initdb still depends on miscadmin.h, but at least pg_ctl and pg_upgrade no longer do.) In passing, fix main.c so that PG_BACKEND_VERSIONSTR actually defines the output of "postgres -V", which remarkably it had never done before. Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1xJW8e+CTotojOMBd-yzUvD0e_JZu2xHo=MnuZ4__m7Pg@mail.gmail.com">https://postgr.es/m/CAMkU=1xJW8e+CTotojOMBd-yzUvD0e_JZu2xHo=MnuZ4__m7Pg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f13ea95f9e473a43ee4e1baeb94daaf83535d37c">https://git.postgresql.org/pg/commitdiff/f13ea95f9e473a43ee4e1baeb94daaf83535d37c</a></li>

<li>Ooops, WIN32 code in pg_ctl.c still needs PQExpBuffer. Per buildfarm. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1ae8536545b7ea486dbe15247e6dd817ee211297">https://git.postgresql.org/pg/commitdiff/1ae8536545b7ea486dbe15247e6dd817ee211297</a></li>

<li>Eat XIDs more efficiently in recovery TAP test. The point of this loop is to insert 1000 rows into the test table and consume 1000 XIDs. I can't see any good reason why it's useful to launch 1000 psqls and 1000 backend processes to accomplish that. Pushing the looping into a plpgsql DO block shaves about 10 seconds off the runtime of the src/test/recovery TAP tests on my machine; that's over 10% of the runtime of that test suite. It is, in fact, sufficiently more efficient that we now demonstrably need wait_slot_xmins() afterwards, or the slaves' xmins may not have moved yet. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/08aed6604de2e6a9f4d499818d7c641cbf5eb9f7">https://git.postgresql.org/pg/commitdiff/08aed6604de2e6a9f4d499818d7c641cbf5eb9f7</a></li>

<li>Fix walsender to exit promptly if client requests shutdown. It's possible for WalSndWaitForWal to be asked to wait for WAL that doesn't exist yet. That's fine, in fact it's the normal situation if we're caught up; but when the client requests shutdown we should not keep waiting. The previous coding could wait indefinitely if the source server was idle. In passing, improve the rather weak comments in this area, and slightly rearrange some related code for better readability. Back-patch to 9.4 where this code was introduced. Discussion: <a target="_blank" href="https://postgr.es/m/14154.1498781234@sss.pgh.pa.us">https://postgr.es/m/14154.1498781234@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fca85f8ef157d4d58dea1fdc8e1f1f957b74ee78">https://git.postgresql.org/pg/commitdiff/fca85f8ef157d4d58dea1fdc8e1f1f957b74ee78</a></li>

<li>Check for error during PQendcopy. Oversight in commit 78c8c8143; noted while nosing around the walreceiver startup/shutdown code. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/609fa63db6d1e1f2c27a6dd31e9ac8d3b7bcae03">https://git.postgresql.org/pg/commitdiff/609fa63db6d1e1f2c27a6dd31e9ac8d3b7bcae03</a></li>

<li>Fix race conditions and missed wakeups in syncrep worker signaling. When a sync worker is waiting for the associated apply worker to notice that it's in SYNCWAIT state, wait_for_worker_state_change() would just patiently wait for that to happen. This generally required waiting for the 1-second timeout in LogicalRepApplyLoop to elapse. Kicking the worker via its latch makes things significantly snappier. While at it, fix race conditions that could potentially result in crashes: we can *not* call logicalrep_worker_wakeup_ptr() once we've released the LogicalRepWorkerLock, because worker-&gt;proc might've been reset to NULL after we do that (indeed, there's no really solid reason to believe that the LogicalRepWorker slot even belongs to the same worker anymore). In logicalrep_worker_wakeup(), we can just move the wakeup inside the lock scope. In process_syncing_tables_for_apply(), a bit more code rearrangement is needed. Also improve some nearby comments. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1f201a818a5910a37530cc929bd345688f827942">https://git.postgresql.org/pg/commitdiff/1f201a818a5910a37530cc929bd345688f827942</a></li>

<li>Shorten timeouts while waiting for logicalrep worker slot attach/detach. When waiting for a logical replication worker process to start or stop, we have to busy-wait until we see it add or remove itself from the LogicalRepWorker slot in shared memory. Those loops were using a one-second delay between checks, but on any reasonably modern machine, it doesn't take more than a couple of msec for a worker to spawn or shut down. Reduce the loop delays to 10ms to avoid wasting quite so much time in the related regression tests. In principle, a better solution would be to fix things so that the waiting process can be awakened via its latch at the right time. But that seems considerably more invasive, which is undesirable for a post-beta fix. Worker start/stop performance likely isn't of huge interest anyway for production purposes, so we might not ever get around to it. In passing, rearrange the second wait loop in logicalrep_worker_stop() so that the lock is held at the top of the loop, thus saving one lock acquisition/release per call, and making it look more like the other loop. Discussion: <a target="_blank" href="https://postgr.es/m/30864.1498861103@sss.pgh.pa.us">https://postgr.es/m/30864.1498861103@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/799f8bc76a92d48b0f7988f4cc50da438cacec7c">https://git.postgresql.org/pg/commitdiff/799f8bc76a92d48b0f7988f4cc50da438cacec7c</a></li>

<li>Reduce delay for last logicalrep feedback message when master goes idle. The regression tests contain numerous cases where we do some activity on a master server and then wait till the slave has ack'd flushing its copy of that transaction. Because WAL flush on the slave is asynchronous to the logicalrep worker process, the worker cannot send such a feedback message during the LogicalRepApplyLoop iteration where it processes the last data from the master. In the previous coding, the feedback message would come out only when the loop's WaitLatchOrSocket call returned WL_TIMEOUT. That requires one full second of delay (NAPTIME_PER_CYCLE); and to add insult to injury, it could take more than that if the WaitLatchOrSocket was interrupted a few times by latch-setting events. In reality we can expect the slave's walwriter process to have flushed the WAL data after, more or less, WalWriterDelay (typically 200ms). Hence, if there are unacked transactions pending, make the wait delay only that long rather than the full NAPTIME_PER_CYCLE. Also, move one of the send_feedback() calls into the loop main line, so that we'll check for the need to send feedback even if we were woken by a latch event and not either socket data or timeout. It's not clear how much this matters for production purposes, but it's definitely helpful for testing. Discussion: <a target="_blank" href="https://postgr.es/m/30864.1498861103@sss.pgh.pa.us">https://postgr.es/m/30864.1498861103@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f32678c0163d7d966560bdaf41bfbc2cf179a260">https://git.postgresql.org/pg/commitdiff/f32678c0163d7d966560bdaf41bfbc2cf179a260</a></li>

<li>Clean up misuse and nonuse of poll_query_until(). Several callers of PostgresNode::poll_query_until() neglected to check for failure; I do not think that's optional. Also, rewrite one place that had reinvented poll_query_until() for no very good reason. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b0f069d931f0a3d4a39aeeb230baf2f2b18cb3c3">https://git.postgresql.org/pg/commitdiff/b0f069d931f0a3d4a39aeeb230baf2f2b18cb3c3</a></li>

<li>Improve TAP test function PostgresNode::poll_query_until(). Add an optional "expected" argument to override the default assumption that we're waiting for the query to return "t". This allows replacing a handwritten polling loop in recovery/t/007_sync_rep.pl with use of poll_query_until(); AFAICS that's the only remaining ad-hoc polling loop in our TAP tests. Change poll_query_until() to probe ten times per second not once per second. Like some similar changes I've been making recently, the one-second interval seems to be rooted in ancient traditions rather than the actual likely wait duration on modern machines. I'd consider reducing it further if there were a convenient way to spawn just one psql for the whole loop rather than one per probe attempt. Discussion: <a target="_blank" href="https://postgr.es/m/12486.1498938782@sss.pgh.pa.us">https://postgr.es/m/12486.1498938782@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/de3de0afd7da7b432e219aa38bde248fc5c5206a">https://git.postgresql.org/pg/commitdiff/de3de0afd7da7b432e219aa38bde248fc5c5206a</a></li>

<li>Try to improve readability of recovery/t/009_twophase.pl test. The original coding here was very confusing, because it named the two servers it set up "master" and "slave" even though it swapped their replication roles multiple times. At any given point in the script it was very unobvious whether "$node_master" actually referred to the server named "master" or the other one. Instead, pick arbitrary names for the two servers --- I used "london" and "paris" --- and distinguish those permanent names from the nonce references $cur_master and $cur_slave. Add logging to help distinguish which is which at any given point. Also, use distinct data and transaction names to make all the prepared transactions easily distinguishable in the postmaster logs. (There was one place where we intentionally tested that the server could cope with re-use of a transaction name, but it seems like one place is sufficient for that purpose.) Also, add checks at the end to make sure that all the transactions that were supposed to be committed did survive. Discussion: <a target="_blank" href="https://postgr.es/m/28238.1499010855@sss.pgh.pa.us">https://postgr.es/m/28238.1499010855@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4e15387d2d9d4045efd1a7b3634e5922774139fd">https://git.postgresql.org/pg/commitdiff/4e15387d2d9d4045efd1a7b3634e5922774139fd</a></li>

<li>Fix bug in PostgresNode::query_hash's split() call. By default, Perl's split() function drops trailing empty fields, which is not what we want here. Oversight in commit fb093e4cb. We'd managed to miss it thus far thanks to the very limited usage of this function. Discussion: <a target="_blank" href="https://postgr.es/m/14837.1499029831@sss.pgh.pa.us">https://postgr.es/m/14837.1499029831@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/efdb4f29ba9ecbddb74d3a68577f068cf034c540">https://git.postgresql.org/pg/commitdiff/efdb4f29ba9ecbddb74d3a68577f068cf034c540</a></li>

<li>Fix race condition in recovery/t/009_twophase.pl test. Since reducing pg_ctl's reaction time in commit c61559ec3, some slower buildfarm members have shown erratic failures in this test. The reason turns out to be that the test assumes synchronous replication (because it does not provide any lag time for a commit to replicate before shutting down the servers), but it had only enabled sync rep in one direction. The observed symptoms correspond to failure to replicate the last committed transaction in the other direction, which can be expected to happen if the shutdown command is issued soon enough and we are providing no synchronous-commit guarantees. Fix that, and add a bit more paranoid state checking at the bottom of the script. Michael Paquier and myself Discussion: <a target="_blank" href="https://postgr.es/m/908.1498965681@sss.pgh.pa.us">https://postgr.es/m/908.1498965681@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/647675228f2b18964d8ade8a1061a719e527acfb">https://git.postgresql.org/pg/commitdiff/647675228f2b18964d8ade8a1061a719e527acfb</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Do not require 'public' to exist for pg_dump -c. Commit 330b84d8c4 didn't contemplate the case where the public schema has been dropped and introduced a query which fails when there is no public schema into pg_dump (when used with -c). Adjust the query used by pg_dump to handle the case where the public schema doesn't exist and add tests to check that such a case no longer fails. Back-patch the specific fix to 9.6, as the prior commit was. Adding tests for this case involved adding support to the pg_dump TAP tests to work with multiple databases, which, while not a large change, is a bit much to back-patch, so that's only done in master. Addresses bug #14650 Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170512181801.1795.47483%40wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170512181801.1795.47483%40wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4500edc7e9cf771bf8960d1f3f620917871bdb6f">https://git.postgresql.org/pg/commitdiff/4500edc7e9cf771bf8960d1f3f620917871bdb6f</a></li>

</ul>

<p>Andrew Gierth pushed:</p>

<ul>

<li>Fix transition tables for wCTEs. The original coding didn't handle this case properly; each separate DML substatement needs its own set of transitions. Patch by Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAL9smLCDQ%3D2o024rBgtD4WihzX8B3C6u_oSQ2K3%2BR5grJrV0bg%40mail.gmail.com">https://postgr.es/m/CAL9smLCDQ%3D2o024rBgtD4WihzX8B3C6u_oSQ2K3%2BR5grJrV0bg%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c46c0e5202e8cfe750c6629db7852fdb15d528f3">https://git.postgresql.org/pg/commitdiff/c46c0e5202e8cfe750c6629db7852fdb15d528f3</a></li>

<li>Fix transition tables for partition/inheritance. We disallow row-level triggers with transition tables on child tables. Transition tables for triggers on the parent table contain only those columns present in the parent. (We can't mix tuple formats in a single transition table.) Patch by Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CA%2BTgmoZzTBBAsEUh4MazAN7ga%3D8SsMC-Knp-6cetts9yNZUCcg%40mail.gmail.com">https://postgr.es/m/CA%2BTgmoZzTBBAsEUh4MazAN7ga%3D8SsMC-Knp-6cetts9yNZUCcg%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/501ed02cf6f4f60c3357775eb07578aebc912d3a">https://git.postgresql.org/pg/commitdiff/501ed02cf6f4f60c3357775eb07578aebc912d3a</a></li>

<li>Fix transition tables for ON CONFLICT. We now disallow having triggers with both transition tables and ON INSERT OR UPDATE (which was a PG extension to the spec anyway), because in this case it's not at all clear how the transition tables should work for an INSERT ... ON CONFLICT query. Separate ON INSERT and ON UPDATE triggers with transition tables are allowed, and the transition tables for these reflect only the inserted and only the updated tuples respectively. Patch by Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D11KHQ0JmETJQihSvhZB5mUZL2xrqHeXbCeLhDiqQ39%3Dw%40mail.gmail.com">https://postgr.es/m/CAEepm%3D11KHQ0JmETJQihSvhZB5mUZL2xrqHeXbCeLhDiqQ39%3Dw%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8c55244ae379822d8bf62f6db0b5b1f7637eea3a">https://git.postgresql.org/pg/commitdiff/8c55244ae379822d8bf62f6db0b5b1f7637eea3a</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Copy collencoding in CREATE COLLATION / FROM. This command used to compute the collencoding entry like when a completely new collation is created. But for example when copying the "C" collation, this would then result in a collation that has a collencoding entry for the current database encoding rather than -1, thus not making an exact copy. This has probably no practical impact, but making this change keeps the catalog contents neat. Reported-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/54baa48139ae6b67347bea6a9183d494e625939b">https://git.postgresql.org/pg/commitdiff/54baa48139ae6b67347bea6a9183d494e625939b</a></li>

<li>Prohibit creating ICU collation with different ctype. ICU does not support "collate" and "ctype" being different, so the collctype catalog column is ignored. But for catalog neatness, ensure that they are the same. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/13a57710dbafad26669833add0ae6ae60314f8dc">https://git.postgresql.org/pg/commitdiff/13a57710dbafad26669833add0ae6ae60314f8dc</a></li>

<li>Update code comments for pg_xlog -&gt; pg_wal. Author: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4260c05c6d5ffed8f61d97ec26ebadd991a97c14">https://git.postgresql.org/pg/commitdiff/4260c05c6d5ffed8f61d97ec26ebadd991a97c14</a></li>

<li>Remove outdated comment. Author: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1acc04e4045d4e863c14d144f8c2bf18b80da504">https://git.postgresql.org/pg/commitdiff/1acc04e4045d4e863c14d144f8c2bf18b80da504</a></li>

<li>Fix typo in comment. Author: Amit Langote &lt;Langote_Amit_f8@lab.ntt.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/da8f26ec4eb6e3dced9e348efefac17d733008c0">https://git.postgresql.org/pg/commitdiff/da8f26ec4eb6e3dced9e348efefac17d733008c0</a></li>

<li>Fix typo in comment. Author: Albe Laurenz &lt;laurenz.albe@wien.gv.at&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1db49c3b6d2399f8f83a97f1fa34e749b9fada7c">https://git.postgresql.org/pg/commitdiff/1db49c3b6d2399f8f83a97f1fa34e749b9fada7c</a></li>

<li>Fix typo in comment. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b295cc3b9ab48c3c34724fa577d6c1cfb753058c">https://git.postgresql.org/pg/commitdiff/b295cc3b9ab48c3c34724fa577d6c1cfb753058c</a></li>

<li>PL/Python: Fix hint about returning composite type from Python. ('foo') is not a Python tuple: it is a string wrapped in parentheses. A valid 1-element Python tuple is ('foo',). Author: Daniele Varrazzo &lt;daniele.varrazzo@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/898d24ae2ad7195869c558eb6c126ff6a90474e8">https://git.postgresql.org/pg/commitdiff/898d24ae2ad7195869c558eb6c126ff6a90474e8</a></li>

<li>Fix UPDATE of GENERATED ALWAYS identity columns. The bug would previously prevent the update of any column in a table with identity columns, rather than just the actual identity column. Reported-by: zam6ak@gmail.com Bug: #14718 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ef74e03ef65ea870a9c372f500d33cca0a18be6e">https://git.postgresql.org/pg/commitdiff/ef74e03ef65ea870a9c372f500d33cca0a18be6e</a></li>

<li>Refine memory allocation in ICU conversions. The simple calculations done to estimate the size of the output buffers for ucnv_fromUChars() and ucnv_toUChars() could overflow int32_t for large strings. To avoid that, go the long way and run the function first without an output buffer to get the correct output buffer size requirement. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d8b3c81335600ad3487ca9bd642ef354d62919dc">https://git.postgresql.org/pg/commitdiff/d8b3c81335600ad3487ca9bd642ef354d62919dc</a></li>

<li>doc: Document that logical replication supports synchronous replication. Update the documentation a bit to include that logical replication as well as other and third-party replication clients can participate in synchronous replication. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2dca03439f1f88e9102aa6bf613b434be0697dae">https://git.postgresql.org/pg/commitdiff/2dca03439f1f88e9102aa6bf613b434be0697dae</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Add missing period to comment. Masahiko Sawada Discussion: <a target="_blank" href="http://postgr.es/m/CAD21AoA0jjXXhqK6Ym3jZNoUdVhXFyTkWTTTsVSr1vPuKcjsjA@mail.gmail.com">http://postgr.es/m/CAD21AoA0jjXXhqK6Ym3jZNoUdVhXFyTkWTTTsVSr1vPuKcjsjA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7d4a1838efc5a93ba96b8e0e77f39731603a1f48">https://git.postgresql.org/pg/commitdiff/7d4a1838efc5a93ba96b8e0e77f39731603a1f48</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Fix locking in WAL receiver/sender shmem state structs. In WAL receiver and WAL server, some accesses to their corresponding shared memory control structs were done without holding any kind of lock, which could lead to inconsistent and possibly insecure results. In walsender, fix by clarifying the locking rules and following them correctly, as documented in the new comment in walsender_private.h; namely that some members can be read in walsender itself without a lock, because the only writes occur in the same process. The rest of the struct requires spinlock for accesses, as usual. In walreceiver, fix by always holding spinlock while accessing the struct. While there is potentially a problem in all branches, it is minor in stable ones. This only became a real problem in pg10 because of quorum commit in synchronous replication (commit 3901fd70cc7c), and a potential security problem in walreceiver because a superuser() check was removed by default monitoring roles (commit 25fff40798fc). Thus, no backpatch. In passing, clean up some leftover braces which were used to create unconditional blocks. Once upon a time these were used for volatile-izing accesses to those shmem structs, which is no longer required. Many other occurrences of this pattern remain. Author: Micha&#65533;l Paquier Reported-by: Micha&#65533;l Paquier Reviewed-by: Masahiko Sawada, Kyotaro Horiguchi, Thomas Munro, Robert Haas Discussion: <a target="_blank" href="https://postgr.es/m/CAB7nPqTWYqtzD=LN_oDaf9r-hAjUEPAy0B9yRkhcsLdRN8fzrw@mail.gmail.com">https://postgr.es/m/CAB7nPqTWYqtzD=LN_oDaf9r-hAjUEPAy0B9yRkhcsLdRN8fzrw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/572d6ee6d41b43b8871f42c7dbbef795523b2dbf">https://git.postgresql.org/pg/commitdiff/572d6ee6d41b43b8871f42c7dbbef795523b2dbf</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Amit Langote sent in two more revisions of a patch to set pd_lower correctly in the GIN metapage, set pd_lower correctly in the BRIN index metapage, and set pd_lower correctly in the SP-GiST index metapage.</p>

<p>Atsushi Torikoshi sent in a patch to remove old comments in dependencies.c and README.dependencies.</p>

<p>Daniel Gustafsson sent in a patch for psql to free allocated memory when 2 patterns are used, use consistent function comments for metacommands, add a server version check, include all the details from normal (\dRp) in verbose mode for \dRp (\dRp+), use PQExpBuffer for all table titles, and improve consistency in "object not found" notices in psql.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix a race between SELECT and ALTER TABLE NO INHERIT.</p>

<p>Micha&#65533;l Paquier sent in two revisions of a patch to fix an issue where pg_basebackup fails on Windows when using tablespace mapping.</p>

<p>Thomas Munro sent in a patch to fix an out of date comment in predicate.c.</p>

<p>Mithun Cy sent in two more revisions of a patch to implement auto_prewarm.</p>

<p>Shubham Barai sent in another revision of a patch to enable predicate locking in hash index.</p>

<p>Thomas Munro sent in another revision of a patch to implement [[Parallel] Shared] Hash.</p>

<p>Thomas Munro sent in another revision of a patch to fix an issue that manifested as pg_serial early wraparound.</p>

<p>Fabien COELHO sent in two more revisions of a patch to psql to add a special variable to reflect the last query status.</p>

<p>Andres Freund sent in three more revisions of a patch to add fallocate.</p>

<p>Petr Jel&#65533;nek sent in a patch to rework subscription worker and relation status handling.</p>

<p>Mark Rofail sent in another revision of a patch to implement foreign key arrays.</p>

<p>Yugo Nagata sent in a patch to create a pg_reload_backend to signal SIGHUP to a specific backend.</p>

<p>Micha&#65533;l Paquier sent in a patch to fix a comment in xlog.c</p>

<p>Zero King sent in a patch to change some wording about libedit.</p>

<p>Amit Khandekar and Robert Haas traded patches to enable UPDATEs to the partition key of a declaratively partitioned table which would move the tuple to a different partition.</p>

<p>Etsuro Fujita sent in another revision of a patch to add support for tuple routing to foreign partitions.</p>

<p>Adrien Nayrat sent in a patch to add a --createdb-only option to pg_dumpall.</p>

<p>Thomas Munro sent in a patch to implement synchronous replay.</p>

<p>Beena Emerson sent in another revision of a patch to implement default partition for declarative range partitions.</p>

<p>Tom Lane sent in two revisions of a patch to fix an apparent walsender bug triggered by logical replication.</p>

<p>Yugo Nagata sent in a patch to fix an apparent documentation error in DROP SUBSCRIPTION.</p>

<p>Peter Eisentraut sent in a patch for pg_ctl to make failure to complete operation a nonzero exit.</p>

<p>Amit Langote and Dean Rasheed traded patches to simplify code that checks range partition overlap, and relax some rules about unbounded range partition bounds.</p>

<p>Tom Lane sent in a WIP patch for avoiding duplicate initdb runs during "make check".</p>