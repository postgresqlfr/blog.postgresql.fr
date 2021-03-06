---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 juin 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/06/21/Nouvelles-hebdomadaires-de-PostgreSQL-11-juin-2017"
---


<p>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>check_pgactivity 2.2, un agent distant de Nagios pour surveiller PostgreSQL&nbsp;: <a target="_blank" href="https://github.com/OPMDG/check_pgactivity/releases">https://github.com/OPMDG/check_pgactivity/releases</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juin</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-06/">http://archives.postgresql.org/pgsql-jobs/2017-06/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: MeetUp à Nantes le mardi 20 juin&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>[ndt: MeetUp à Lyon le 28 juin&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</li>

<li>[ndt: MeetUp à Paris le jeudi 29 juin&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. Le programme est en ligne et les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

<li>PGBR2017 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 30 juin&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay UK 2017 aura lieu &agrave; Londres le 4 juillet 2017&nbsp;: <a target="_blank" href="http://www.pgconf.uk">http://www.pgconf.uk</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170612052013.GB2017@fetter.org">http://www.postgresql.org/message-id/20170612052013.GB2017@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Replace over-optimistic Assert in partitioning code with a runtime test. get_partition_parent felt that it could simply Assert that systable_getnext found a tuple. This is unlike any other caller of that function, and it's unsafe IMO --- in fact, the reason I noticed it was that the Assert failed. (OK, I was working with known-inconsistent catalog contents, but I wasn't expecting the DB to fall over quite that violently. The behavior in a non-assert-enabled build wouldn't be very nice, either.) Fix it to do what other callers do, namely an actual runtime-test-and-elog. Also, standardize the wording of elog messages that are complaining about unexpected failure of systable_getnext. 90% of them say "could not find tuple for &lt;object&gt;", so make the remainder do likewise. Many of the holdouts were using the phrasing "cache lookup failed", which is outright misleading since no catcache search is involved. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e7941a976688f0f5d13a5227ed4f3efe0718db9d">https://git.postgresql.org/pg/commitdiff/e7941a976688f0f5d13a5227ed4f3efe0718db9d</a></li>

<li>Don't be so trusting that shm_toc_lookup() will always succeed. Given the possibility of race conditions and so on, it seems entirely unsafe to just assume that shm_toc_lookup() always finds the key it's looking for --- but that was exactly what all but one call site were doing. To fix, add a "bool noError" argument, similarly to what we have in many other functions, and throw an error on an unexpected lookup failure. Remove now-redundant Asserts that a rather random subset of call sites had. I doubt this will throw any light on buildfarm member lorikeet's recent failures, because if an unnoticed lookup failure were involved, you'd kind of expect a null-pointer-dereference crash rather than the observed symptom. But you never know ... and this is better coding practice even if it never catches anything. Discussion: <a target="_blank" href="https://postgr.es/m/9697.1496675981@sss.pgh.pa.us">https://postgr.es/m/9697.1496675981@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d4663350646ca0c069a36d906155a0f7e3372eb7">https://git.postgresql.org/pg/commitdiff/d4663350646ca0c069a36d906155a0f7e3372eb7</a></li>

<li>Code review for shm_toc.h/.c. Declare the toc_nentry field as uint32 not Size. Since shm_toc_lookup() reads the field without any lock, it has to be atomically readable, and we do not assume that for fields wider than 32 bits. Performance would be impossibly bad for entry counts approaching 2^32 anyway, so there is no need to try to preserve maximum width here. This is probably an academic issue, because even if reading int64 isn't atomic, the high order half would never change in practice. Still, it's a coding rule violation, so let's fix it. Adjust some other not-terribly-well-chosen data types too, and copy-edit some comments. Make shm_toc_attach's Asserts consistent with shm_toc_create's. None of this looks to be a live bug, so no need for back-patch. Discussion: <a target="_blank" href="https://postgr.es/m/16984.1496679541@sss.pgh.pa.us">https://postgr.es/m/16984.1496679541@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3e60c6f72328a9ad14d8a087411cd394752c5b23">https://git.postgresql.org/pg/commitdiff/3e60c6f72328a9ad14d8a087411cd394752c5b23</a></li>

<li>Docs: improve CREATE TABLE ref page's discussion of partition bounds. Clarify in the syntax synopsis that partition bound values must be exactly numeric literals or string literals; previously it said "bound_literal" which was defined nowhere. Replace confusing --- and, I think, incorrect in detail --- definition of how range bounds work with a reference to row-wise comparison plus a concrete example (which I stole from Robert Haas). Minor copy-editing in the same area. Discussion: <a target="_blank" href="https://postgr.es/m/30475.1496005465@sss.pgh.pa.us">https://postgr.es/m/30475.1496005465@sss.pgh.pa.us</a> Discussion: <a target="_blank" href="https://postgr.es/m/28106.1496041449@sss.pgh.pa.us">https://postgr.es/m/28106.1496041449@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0198c277a29a035aa8a4e6767967201135f6caa9">https://git.postgresql.org/pg/commitdiff/0198c277a29a035aa8a4e6767967201135f6caa9</a></li>

<li>Fix bit-rot in pg_upgrade's test.sh, and improve documentation. Doing a cross-version upgrade test with test.sh evidently hasn't been tested since circa 9.2, because the script lacked case branches for old-version servers newer than 9.1. Future-proof that a bit, and clean up breakage induced by our recent drop of V0 function call protocol (namely that oldstyle_length() isn't in the regression suite anymore). (This isn't enough to make the test work perfectly cleanly across versions, but at least it finishes and provides dump files that you can diff manually. One issue I didn't touch is that we might want to execute the "reindex_hash.sql" file in the new DB before dumping it, so that the hash indexes don't vanish from the dump.) Improve the TESTING doc file: put the tl;dr version at the top not the bottom, and bring its explanation of how to run a cross-version test up to speed, since the installcheck target isn't there and won't be resurrected. Improve the comment in the Makefile about why not. In passing, teach .gitignore and "make clean" about a couple more junk output files. Discussion: <a target="_blank" href="https://postgr.es/m/14058.1496892482@sss.pgh.pa.us">https://postgr.es/m/14058.1496892482@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5bab1985dfc25eecf4b098145789955c0b246160">https://git.postgresql.org/pg/commitdiff/5bab1985dfc25eecf4b098145789955c0b246160</a></li>

<li>Handle unqualified SEQUENCE NAME options properly in parse_utilcmd.c. generateSerialExtraStmts() was sloppy about handling the case where SEQUENCE NAME is given with a not-schema-qualified name. It was generating a CreateSeqStmt with an unqualified sequence name, and an AlterSeqStmt whose "owned_by" DefElem contained a T_String Value with a null string pointer in the schema-name position. The generated nextval() argument was also underqualified. This accidentally failed to fail at runtime, but only so long as the current default creation namespace at runtime is the right namespace. That's bogus; the parse-time transformation is supposed to be inserting the right schema name in all cases, so as to avoid any possible skew in that selection. I'm not sure this could fail in pg_dump's usage, but it's still wrong; we have had real bugs in this area before adopting the policy that parse_utilcmd.c should generate only fully-qualified auxiliary commands. A slightly lesser problem, which is what led me to notice this in the first place, is that pprint() dumped core on the AlterSeqStmt because of the bogus T_String. Noted while poking into the open problem with ALTER SEQUENCE breaking pg_upgrade. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/51893985d3bcf27304283f7fa67f17e017d2dafd">https://git.postgresql.org/pg/commitdiff/51893985d3bcf27304283f7fa67f17e017d2dafd</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix comments in simplehash.h. Jeff Janes and me. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAMkU=1zYnniLYg+W9itL93DXebCjx6Uk6m_=Xa8p_zM65X3S0Q@mail.gmail.com">https://www.postgresql.org/message-id/CAMkU=1zYnniLYg+W9itL93DXebCjx6Uk6m_=Xa8p_zM65X3S0Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/553e16951c0db4e3d2d0f804ff7f9d2ac0a96fe5">https://git.postgresql.org/pg/commitdiff/553e16951c0db4e3d2d0f804ff7f9d2ac0a96fe5</a></li>

<li>Fix typo in error message. Daniele Varrazzo Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CA+mi_8bqY5THP8hLKKSdMEr5GCz6M=hD6_uLbvFeyEBfwqUxeA@mail.gmail.com">https://www.postgresql.org/message-id/CA+mi_8bqY5THP8hLKKSdMEr5GCz6M=hD6_uLbvFeyEBfwqUxeA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/af51fea039bb8e00066d68d919312df1701dc03e">https://git.postgresql.org/pg/commitdiff/af51fea039bb8e00066d68d919312df1701dc03e</a></li>

<li>Fix double-free bug in GSS authentication. The logic to free the buffer after the gss_init_sec_context() call was always a bit wonky. Because gss_init_sec_context() sets the GSS context variable, conn-&gt;gctx, we would in fact always attempt to free the buffer. That only works, because previously conn-&gt;ginbuf.value was initialized to NULL, and free(NULL) is a no-op. Commit 61bf96cab0 refactored things so that the GSS input token buffer is allocated locally in pg_GSS_continue, and not held in the PGconn object. After that, the now-local ginbuf.value variable isn't initialized when it's not used, so we pass a bogus pointer to free(). To fix, only try to free the input buffer if we allocated it. That was the intention, certainly after the refactoring, and probably even before that. But because there's no live bug before the refactoring, I refrained from backpatching this. The bug was also independently reported by Graham Dutton, as bug #14690. Patch reviewed by Michael Paquier. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/6288d80e-a0bf-d4d3-4e12-7b79c77f1771%40iki.fi">https://www.postgresql.org/message-id/6288d80e-a0bf-d4d3-4e12-7b79c77f1771%40iki.fi</a> Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170605130954.1438.90535%40wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170605130954.1438.90535%40wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3344582e6f1605d69bef008c4e489cafd9610cfe">https://git.postgresql.org/pg/commitdiff/3344582e6f1605d69bef008c4e489cafd9610cfe</a></li>

<li>Clear auth context correctly when re-connecting after failed auth attempt. If authentication over an SSL connection fails, with sslmode=prefer, libpq will reconnect without SSL and retry. However, we did not clear the variables related to GSS, SSPI, and SASL authentication state, when reconnecting. Because of that, the second authentication attempt would always fail with a "duplicate GSS/SASL authentication request" error. pg_SSPI_startup did not check for duplicate authentication requests like the corresponding GSS and SASL functions, so with SSPI, you would leak some memory instead. Another way this could manifest itself, on version 10, is if you list multiple hostnames in the "host" parameter. If the first server requests Kerberos or SCRAM authentication, but it fails, the attempts to connect to the other servers will also fail with "duplicate authentication request" errors. To fix, move the clearing of authentication state from closePGconn to pgDropConnection, so that it is cleared also when re-connecting. Patch by Michael Paquier, with some kibitzing by me. Backpatch down to 9.3. 9.2 has the same bug, but the code around closing the connection is somewhat different, so that this patch doesn't apply. To fix this in 9.2, I think we would need to back-port commit 210eb9b743 first, and then apply this patch. However, given that we only bumped into this in our own testing, we haven't heard any reports from users about this, and that 9.2 will be end-of-lifed in a couple of months anyway, it doesn't seem worth the risk and trouble. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqRuOUm0MyJaUy9L3eXYJU3AKCZ-0-03=-aDTZJGV4GyWw@mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqRuOUm0MyJaUy9L3eXYJU3AKCZ-0-03=-aDTZJGV4GyWw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e6c33d594a004a2c831cdff1a16276347d30f703">https://git.postgresql.org/pg/commitdiff/e6c33d594a004a2c831cdff1a16276347d30f703</a></li>

<li>Improve authentication error messages. Most of the improvements were in the new SCRAM code: * In SCRAM protocol violation messages, use errdetail to provide the details. * If pg_backend_random() fails, throw an ERROR rather than just LOG. We shouldn't continue authentication if we can't generate a random nonce. * Use ereport() rather than elog() for the "invalid SCRAM verifier" messages. They shouldn't happen, if everything works, but it's not inconceivable that someone would have invalid scram verifiers in pg_authid, e.g. if a broken client application was used to generate the verifier. But this change applied to old code: * Use ERROR rather than COMMERROR for protocol violation errors. There's no reason to not tell the client what they did wrong. The client might be confused already, so that it cannot read and display the error correctly, but let's at least try. In the "invalid password packet size" case, we used to actually continue with authentication anyway, but that is now a hard error. Patch by Michael Paquier and me. Thanks to Daniel Varrazzo for spotting the typo in one of the messages that spurred the discussion and these larger changes. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CA%2Bmi_8aZYLhuyQi1Jo0hO19opNZ2OEATEOM5fKApH7P6zTOZGg%40mail.gmail.com">https://www.postgresql.org/message-id/CA%2Bmi_8aZYLhuyQi1Jo0hO19opNZ2OEATEOM5fKApH7P6zTOZGg%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e3df8f8b93e77c33fa7abb6aca64e07531592130">https://git.postgresql.org/pg/commitdiff/e3df8f8b93e77c33fa7abb6aca64e07531592130</a></li>

<li>Fix script name in README. The script was rewritten in Perl, and renamed from regress.sh to regress.pl, back in 2012. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/67d370e619897ace44285b1fe10fd788119242ac">https://git.postgresql.org/pg/commitdiff/67d370e619897ace44285b1fe10fd788119242ac</a></li>

<li>Give a better error message on invalid hostaddr option. If you accidentally pass a host name in the hostaddr option, e.g. hostaddr=localhost, you get an error like: psql: could not translate host name "localhost" to address: Name or service not known That's a bit confusing, because it implies that we tried to look up "localhost" in DNS, but it failed. To make it more clear that we tried to parse "localhost" as a numeric network address, change the message to: psql: could not parse network address "localhost": Name or service not known Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi">https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/76b11e8a43eca4612dfccfe7f3ebd293fb8a46ec">https://git.postgresql.org/pg/commitdiff/76b11e8a43eca4612dfccfe7f3ebd293fb8a46ec</a></li>

<li>Silence warning about uninitialized 'ret' variable on some compilers. If the compiler doesn't notice that the switch-statement handles all possible values of the enum, it might complain that 'ret' is being used without initialization. Jeff Janes reported that on gcc 4.4.7. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAMkU=1x31RvP+cpooFbmc8K8nt-gNO8woGFhXcgQYYZ5ozYpFA@mail.gmail.com">https://www.postgresql.org/message-id/CAMkU=1x31RvP+cpooFbmc8K8nt-gNO8woGFhXcgQYYZ5ozYpFA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/493490cbcb19c5232038827b114a4ec72aa3e731">https://git.postgresql.org/pg/commitdiff/493490cbcb19c5232038827b114a4ec72aa3e731</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Find openssl lib files in right directory for MSVC. Some openssl builds put their lib files in a VC subdirectory, others do not. Cater for both cases. Backpatch to all live branches. From an offline discussion with Leonardo Cecchi. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/614350a3ab73992f48c86e26552a2cbf030180e2">https://git.postgresql.org/pg/commitdiff/614350a3ab73992f48c86e26552a2cbf030180e2</a></li>

<li>Fix thinko in previous openssl change. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2e02136fe688046cd3b3c0bbcdd6ba970932ec8e">https://git.postgresql.org/pg/commitdiff/2e02136fe688046cd3b3c0bbcdd6ba970932ec8e</a></li>

<li>Mark to_tsvector(regconfig,json[b]) functions immutable. This make them consistent with the text function and means they can be used in functional indexes. Catalog version bumped. Per gripe from Josh Berkus. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f7e6853e1a2ee2badd988f5e49e4ceb6a2b15b7f">https://git.postgresql.org/pg/commitdiff/f7e6853e1a2ee2badd988f5e49e4ceb6a2b15b7f</a></li>

<li>Take PROVE_FLAGS from the command line but not the environment. This reverts commit 56b6ef893fee9e9bf47d927a02f4d1ea911f4d9c and instead makes vcregress.pl parse out PROVE_FLAGS from a command line argument when doing a TAP test, thus making it consistent with the makefile treatment. Discussion: <a target="_blank" href="https://postgr.es/m/c26a7416-2fb9-34ab-7991-618c922f896e%402ndquadrant.com">https://postgr.es/m/c26a7416-2fb9-34ab-7991-618c922f896e%402ndquadrant.com</a> Backpatch to 9.4 like previous patch. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/93b7d9731f184e764c642266ecd74be24db73a6e">https://git.postgresql.org/pg/commitdiff/93b7d9731f184e764c642266ecd74be24db73a6e</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix record length computation in pg_waldump/xlogdump. The current method of computing the record length (excluding the lenght of full-page images) has been wrong since the WAL format has been revamped in 2c03216d831160bedd72d45f712601b6f7d03f1c. Only the main record's length was counted, but that can be significantly too little if there's data associated with further blocks. Fix by computing the record length as total_lenght - fpi_length. Reported-By: Chen Huajun Bug: #14687 Reviewed-By: Heikki Linnakangas Discussion: <a target="_blank" href="https://postgr.es/m/20170603165939.1436.58887@wrigleys.postgresql.org">https://postgr.es/m/20170603165939.1436.58887@wrigleys.postgresql.org</a> Backpatch: 9.5- <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c25ed20067d21a97242a023031fcdcc232d6945c">https://git.postgresql.org/pg/commitdiff/c25ed20067d21a97242a023031fcdcc232d6945c</a></li>

<li>Prevent possibility of panics during shutdown checkpoint. When the checkpointer writes the shutdown checkpoint, it checks afterwards whether any WAL has been written since it started and throws a PANIC if so. At that point, only walsenders are still active, so one might think this could not happen, but walsenders can also generate WAL, for instance in BASE_BACKUP and logical decoding related commands (e.g. via hint bits). So they can trigger this panic if such a command is run while the shutdown checkpoint is being written. To fix this, divide the walsender shutdown into two phases. First, checkpointer, itself triggered by postmaster, sends a PROCSIG_WALSND_INIT_STOPPING signal to all walsenders. If the backend is idle or runs an SQL query this causes the backend to shutdown, if logical replication is in progress all existing WAL records are processed followed by a shutdown. Otherwise this causes the walsender to switch to the "stopping" state. In this state, the walsender will reject any further replication commands. The checkpointer begins the shutdown checkpoint once all walsenders are confirmed as stopping. When the shutdown checkpoint finishes, the postmaster sends us SIGUSR2. This instructs walsender to send any outstanding WAL, including the shutdown checkpoint record, wait for it to be replicated to the standby, and then exit. Author: Andres Freund, based on an earlier patch by Michael Paquier Reported-By: Fujii Masao, Andres Freund Reviewed-By: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20170602002912.tqlwn4gymzlxpvs2@alap3.anarazel.de">https://postgr.es/m/20170602002912.tqlwn4gymzlxpvs2@alap3.anarazel.de</a> Backpatch: 9.4, where logical decoding was introduced <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c6c333436491a292d56044ed6e167e2bdee015a2">https://git.postgresql.org/pg/commitdiff/c6c333436491a292d56044ed6e167e2bdee015a2</a></li>

<li>Have walsenders participate in procsignal infrastructure. The non-participation in procsignal was a problem for both changes in master, e.g. parallelism not working for normal statements run in walsender backends, and older branches, e.g. recovery conflicts and catchup interrupts not working for logical decoding walsenders. This commit thus replaces the previous WalSndXLogSendHandler with procsignal_sigusr1_handler. In branches since db0f6cad48 that can lead to additional SetLatch calls, but that only rarely seems to make a difference. Author: Andres Freund Reviewed-By: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20170421014030.fdzvvvbrz4nckrow@alap3.anarazel.de">https://postgr.es/m/20170421014030.fdzvvvbrz4nckrow@alap3.anarazel.de</a> Backpatch: 9.4, earlier commits don't seem to benefit sufficiently <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/47fd420fb4d3e77dde960312f8672c82b14ecbad">https://git.postgresql.org/pg/commitdiff/47fd420fb4d3e77dde960312f8672c82b14ecbad</a></li>

<li>Unify SIGHUP handling between normal and walsender backends. Because walsender and normal backends share the same main loop it's problematic to have two different flag variables, set in signal handlers, indicating a pending configuration reload. Only certain walsender commands reach code paths checking for the variable (START_[LOGICAL_]REPLICATION, CREATE_REPLICATION_SLOT ... LOGICAL, notably not base backups). This is a bug present since the introduction of walsender, but has gotten worse in releases since then which allow walsender to do more. A later patch, not slated for v10, will similarly unify SIGHUP handling in other types of processes as well. Author: Petr Jelinek, Andres Freund Reviewed-By: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20170423235941.qosiuoyqprq4nu7v@alap3.anarazel.de">https://postgr.es/m/20170423235941.qosiuoyqprq4nu7v@alap3.anarazel.de</a> Backpatch: 9.2-, bug is present since 9.0 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6e1dd2773eb60a6ab87b27b8d9391b756e904ac3">https://git.postgresql.org/pg/commitdiff/6e1dd2773eb60a6ab87b27b8d9391b756e904ac3</a></li>

<li>Wire up query cancel interrupt for walsender backends. This allows to cancel commands run over replication connections. While it might have some use before v10, it has become important now that normal SQL commands are allowed in database connected walsender connections. Author: Petr Jelinek Reviewed-By: Andres Freund, Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/7966f454-7cd7-2b0c-8b70-cdca9d5a8c97@2ndquadrant.com">https://postgr.es/m/7966f454-7cd7-2b0c-8b70-cdca9d5a8c97@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c1abe6c786d8f00643de8519140d77644b474163">https://git.postgresql.org/pg/commitdiff/c1abe6c786d8f00643de8519140d77644b474163</a></li>

<li>Revert "Prevent panic during shutdown checkpoint". This reverts commit 086221cf6b1727c2baed4703c582f657b7c5350e, which was made to master only. The approach implemented in the above commit has some issues. While those could easily be fixed incrementally, doing so would make backpatching considerably harder, so instead first revert this patch. Discussion: <a target="_blank" href="https://postgr.es/m/20170602002912.tqlwn4gymzlxpvs2@alap3.anarazel.de">https://postgr.es/m/20170602002912.tqlwn4gymzlxpvs2@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/703f148e98ecb4b299fdad403fc5a1de51220714">https://git.postgresql.org/pg/commitdiff/703f148e98ecb4b299fdad403fc5a1de51220714</a></li>

<li>Clean up latch related code. The larger part of this patch replaces usages of MyProc-&gt;procLatch with MyLatch. The latter works even early during backend startup, where MyProc-&gt;procLatch doesn't yet. While the affected code shouldn't run in cases where it's not initialized, it might get copied into places where it might. Using MyLatch is simpler and a bit faster to boot, so there's little point to stick with the previous coding. While doing so I noticed some weaknesses around newly introduced uses of latches that could lead to missed events, and an omitted CHECK_FOR_INTERRUPTS() call in worker_spi. As all the actual bugs are in v10 code, there doesn't seem to be sufficient reason to backpatch this. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170606195321.sjmenrfgl2nu6j63@alap3.anarazel.de">https://postgr.es/m/20170606195321.sjmenrfgl2nu6j63@alap3.anarazel.de</a> <a target="_blank" href="https://postgr.es/m/20170606210405.sim3yl6vpudhmufo@alap3.anarazel.de">https://postgr.es/m/20170606210405.sim3yl6vpudhmufo@alap3.anarazel.de</a> Backpatch: - <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9206ced1dc05d3a9cc99faafa22d5d8b16d998d1">https://git.postgresql.org/pg/commitdiff/9206ced1dc05d3a9cc99faafa22d5d8b16d998d1</a></li>

<li>Again report a useful error message when walreceiver's connection closes. Since 7c4f52409a8c (merged in v10), a shutdown master is reported as FATAL: unexpected result after CommandComplete: server closed the connection unexpectedly by walsender. It used to be LOG: replication terminated by primary server FATAL: could not send end-of-streaming message to primary: no COPY in progress while the old message clearly is not perfect, it's definitely better than what's reported now. The change comes from the attempt to handle finished COPYs without erroring out, needed for the new logical replication, which wasn't needed before. There's probably better ways to handle this, but for now just explicitly check for a closed connection. Author: Petr Jelinek Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/f7c7dd08-855c-e4ed-41f4-d064a6c0665a@2ndquadrant.com">https://postgr.es/m/f7c7dd08-855c-e4ed-41f4-d064a6c0665a@2ndquadrant.com</a> Backpatch: - <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5fd56b9f5b4a007a4122c313a184f78f1647c4ab">https://git.postgresql.org/pg/commitdiff/5fd56b9f5b4a007a4122c313a184f78f1647c4ab</a></li>

<li>Use standard interrupt handling in logical replication launcher. Previously the exit handling was only able to exit from within the main loop, and not from within the backend code it calls. Fix that by using the standard die() SIGTERM handler, and adding the necessary CHECK_FOR_INTERRUPTS() call. This requires adding yet another process-type-specific branch to ProcessInterrupts(), which hints that we probably should generalize that handling. But that's work for another day. Author: Petr Jelinek Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/fe072153-babd-3b5d-8052-73527a6eb657@2ndquadrant.com">https://postgr.es/m/fe072153-babd-3b5d-8052-73527a6eb657@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2c48f5db64b1b999b08052115a5ce873343c372a">https://git.postgresql.org/pg/commitdiff/2c48f5db64b1b999b08052115a5ce873343c372a</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Ignore WL_POSTMASTER_DEATH latch event in single user mode. Otherwise code that uses this will abort with an assertion failure, because postmaster_alive_fds are not initialized. Reported-by: tushar &lt;tushar.ahuja@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/06bfb801c73c89e66f44c1cf693386793e98b637">https://git.postgresql.org/pg/commitdiff/06bfb801c73c89e66f44c1cf693386793e98b637</a></li>

<li>Fix ALTER SUBSCRIPTION grammar ambiguity. There was a grammar ambiguity between SET PUBLICATION name REFRESH and SET PUBLICATION SKIP REFRESH, because SKIP is not a reserved word. To resolve that, fold the refresh choice into the WITH options. Refreshing is the default now. Reported-by: tushar &lt;tushar.ahuja@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9907b55ceb17f55bb508a1f24027a57530d84442">https://git.postgresql.org/pg/commitdiff/9907b55ceb17f55bb508a1f24027a57530d84442</a></li>

<li>Don't set application_name in logical replication workers. This was bothering some people because it's not the intended use of application_name and it makes the default view of pg_stat_activity bulky. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/41a21bf9b4a2449eddc8ea2b29597e835eea9bfd">https://git.postgresql.org/pg/commitdiff/41a21bf9b4a2449eddc8ea2b29597e835eea9bfd</a></li>

<li>Improve handover logic between sync and apply workers. Make apply busy wait check the catalog instead of shmem state to ensure that next transaction will see the expected table synchronization state. Also make the handover always go through same set of steps to make the overall process easier to understand and debug. Author: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; Tested-by: Mark Kirkwood &lt;mark.kirkwood@catalyst.net.nz&gt; Tested-by: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e3a815d2faa5be28551e71d5db44fb2c78133433">https://git.postgresql.org/pg/commitdiff/e3a815d2faa5be28551e71d5db44fb2c78133433</a></li>

<li>Consistently use subscription name as application name. The logical replication apply worker uses the subscription name as application name, except for table sync. This was incorrectly set to use the replication slot name, which might be different, in one case. Also add a comment why the other case is different. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d4bfc06e292ee2f537f42d4ed216209c4537ee92">https://git.postgresql.org/pg/commitdiff/d4bfc06e292ee2f537f42d4ed216209c4537ee92</a></li>

<li>Fix updating of pg_subscription_rel from workers. A logical replication worker should not insert new rows into pg_subscription_rel, only update existing rows, so that there are no races if a concurrent refresh removes rows. Adjust the API to be able to choose that behavior. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; Reported-by: tushar &lt;tushar.ahuja@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/644ea35fc1352d845299563c7ddfb8b524ed27d9">https://git.postgresql.org/pg/commitdiff/644ea35fc1352d845299563c7ddfb8b524ed27d9</a></li>

<li>Put new command-line options in alphabetical order. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7ff9812f9aef584b6ee076378d77a09a68f12d97">https://git.postgresql.org/pg/commitdiff/7ff9812f9aef584b6ee076378d77a09a68f12d97</a></li>

<li>Update key words table for version 10. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5c4109f2c8c2027114cfdc7c0617f81928a0b10e">https://git.postgresql.org/pg/commitdiff/5c4109f2c8c2027114cfdc7c0617f81928a0b10e</a></li>

<li>Improve tablesync behavior with concurrent changes. When a table is removed from a subscription before the tablesync worker could start, this would previously result in an error when reading pg_subscription_rel. Now we just ignore this. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8dc7c338129d22a52d4afcf2f83a73041119efda">https://git.postgresql.org/pg/commitdiff/8dc7c338129d22a52d4afcf2f83a73041119efda</a></li>

<li>psql: Update tab completion for ALTER SUBSCRIPTION. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/57f2ff00d7e25ffe33d7e2955428c005d2511277">https://git.postgresql.org/pg/commitdiff/57f2ff00d7e25ffe33d7e2955428c005d2511277</a></li>

<li>Fix typo. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dabbe8d56470f456e997700efa7d592306ca4274">https://git.postgresql.org/pg/commitdiff/dabbe8d56470f456e997700efa7d592306ca4274</a></li>

<li>Update code comments. Author: Neha Khatri &lt;nehakhatri5@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8c9387c55e67ca7c23bb8ffd7e8342cca7be127b">https://git.postgresql.org/pg/commitdiff/8c9387c55e67ca7c23bb8ffd7e8342cca7be127b</a></li>

<li>Formatting improvements in config file samples. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e11e24b1ed619ca329a532e5e5ae8b4e5e728f71">https://git.postgresql.org/pg/commitdiff/e11e24b1ed619ca329a532e5e5ae8b4e5e728f71</a></li>

<li>doc: Document that subscriptions to same server might hang. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0933fcee9851eb2afcd41db1ee4425153f4cbdd3">https://git.postgresql.org/pg/commitdiff/0933fcee9851eb2afcd41db1ee4425153f4cbdd3</a></li>

<li>doc: Improve types in example. Reported-by: Nikolaus Thiel &lt;klt@fsfe.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0332993c4e14f13b211f41535f77aadb305fd354">https://git.postgresql.org/pg/commitdiff/0332993c4e14f13b211f41535f77aadb305fd354</a></li>

<li>doc: Add Node.js and Go drivers to client interfaces. Also, fix client interface JDBC language name to Java. Author: Sehrope Sarkuni &lt;sehrope@jackdb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e20f679f66fb7930215a1b59f13b5b1c06bfc456">https://git.postgresql.org/pg/commitdiff/e20f679f66fb7930215a1b59f13b5b1c06bfc456</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Fix docs to not claim ECPG's SET CONNECTION is not thread-aware. Changed by: Tsunakawa, Takayuki &lt;tsunakawa.takay@jp.fujitsu.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0f33ee0e3b7527fb0c88abf0ae8a49a9c38d9c0e">https://git.postgresql.org/pg/commitdiff/0f33ee0e3b7527fb0c88abf0ae8a49a9c38d9c0e</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Clean up partcollation handling for OID 0. Consistent with what we do for indexes, we shouldn't try to record dependencies on collation OID 0 or the default collation OID (which is pinned). Also, the fact that indcollation and partcollation can contain zero OIDs when the data type is not collatable should be documented. Amit Langote, per a complaint from me. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmoba5mtPgM3NKfG06vv8na5gGbVOj0h4zvivXQwLw8wXXQ@mail.gmail.com">http://postgr.es/m/CA+Tgmoba5mtPgM3NKfG06vv8na5gGbVOj0h4zvivXQwLw8wXXQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2186b608b3cb859fe0ec04015a5c4e4cbf69caed">https://git.postgresql.org/pg/commitdiff/2186b608b3cb859fe0ec04015a5c4e4cbf69caed</a></li>

<li>Use NIL rather than NULL to represent an empty list. Just to be tidy. Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/9297f80f-e4ab-7dda-33d4-8580bab6d634@lab.ntt.co.jp">http://postgr.es/m/9297f80f-e4ab-7dda-33d4-8580bab6d634@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3106829513ab7c8e46e94db103f1ef8d8dfd379b">https://git.postgresql.org/pg/commitdiff/3106829513ab7c8e46e94db103f1ef8d8dfd379b</a></li>

<li>Fix some cases of "the the" split across two lines. Kevin Grittner observed that 2186b608b3cb859fe0ec04015a5c4e4cbf69caed introduced a new occurence of this by copying existing text, and I found a few more cases using grep. Discussion: <a target="_blank" href="http://postgr.es/m/CADAecHWfG-K+YvocHCkrXV-ycm+eUOaaUVfYZNOnwf0pSmuQCw@mail.gmail.com">http://postgr.es/m/CADAecHWfG-K+YvocHCkrXV-ycm+eUOaaUVfYZNOnwf0pSmuQCw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/79c4fa0f62291fd30d126a12f35b9ce71f06b3c0">https://git.postgresql.org/pg/commitdiff/79c4fa0f62291fd30d126a12f35b9ce71f06b3c0</a></li>

<li>Prevent BEFORE triggers from violating partitioning constraints. Since tuple-routing implicitly checks the partitioning constraints at least for the levels of the partitioning hierarchy it traverses, there's normally no need to revalidate the partitioning constraint after performing tuple routing. However, if there's a BEFORE trigger on the target partition, it could modify the tuple, causing the partitioning constraint to be violated. Catch that case. Also, instead of checking the root table's partition constraint after tuple-routing, check it beforehand. Otherwise, the rules for when the partitioning constraint gets checked get too complicated, because you sometimes have to check part of the constraint but not all of it. This effectively reverts commit 39162b2030fb0a35a6bb28dc636b5a71b8df8d1c in favor of a different approach altogether. Report by me. Initial debugging by Jeevan Ladhe. Patch by Amit Langote, reviewed by me. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmoa9DTgeVOqopieV8d1QRpddmP65aCdxyjdYDoEO5pS5KA@mail.gmail.com">http://postgr.es/m/CA+Tgmoa9DTgeVOqopieV8d1QRpddmP65aCdxyjdYDoEO5pS5KA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/15ce775faa428dc91027e4e2d6b7a167a27118b5">https://git.postgresql.org/pg/commitdiff/15ce775faa428dc91027e4e2d6b7a167a27118b5</a></li>

<li>postgres_fdw: Allow cancellation of transaction control commands. Commit f039eaac7131ef2a4cf63a10cf98486f8bcd09d2, later back-patched with commit 1b812afb0eafe125b820cc3b95e7ca03821aa675, allowed many of the queries issued by postgres_fdw to fetch remote data to respond to cancel interrupts in a timely fashion. However, it didn't do anything about the transaction control commands, which remained noninterruptible. Improve the situation by changing do_sql_command() to retrieve query results using pgfdw_get_result(), which uses the asynchronous interface to libpq so that it can check for interrupts every time libpq returns control. Since this might result in a situation where we can no longer be sure that the remote transaction state matches the local transaction state, add a facility to force all levels of the local transaction to abort if we've lost track of the remote state; without this, an apparently-successful commit of the local transaction might fail to commit changes made on the remote side. Also, add a 60-second timeout for queries issue during transaction abort; if that expires, give up and mark the state of the connection as unknown. Drop all such connections when we exit the local transaction. Together, these changes mean that if we're aborting the local toplevel transaction anyway, we can just drop the remote connection in lieu of waiting (possibly for a very long time) for it to complete an abort. This still leaves quite a bit of room for improvement. PQcancel() has no asynchronous interface, so if we get stuck sending the cancel request we'll still hang. Also, PQsetnonblocking() is not used, which means we could block uninterruptibly when sending a query. There might be some other optimizations possible as well. Nonetheless, this allows us to escape a wait for an unresponsive remote server quickly in many more cases than previously. Report by Suraj Kharage. Patch by me and Rafia Sabih. Review and testing by Amit Kapila and Tushar Ahuja. Discussion: <a target="_blank" href="http://postgr.es/m/CAF1DzPU8Kx+fMXEbFoP289xtm3bz3t+ZfxhmKavr98Bh-C0TqQ@mail.gmail.com">http://postgr.es/m/CAF1DzPU8Kx+fMXEbFoP289xtm3bz3t+ZfxhmKavr98Bh-C0TqQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ae9bfc5d65123aaa0d1cca9988037489760bdeae">https://git.postgresql.org/pg/commitdiff/ae9bfc5d65123aaa0d1cca9988037489760bdeae</a></li>

<li>Add statistics subdirectory to Makefile. Commit 7b504eb282ca2f5104b5c00b4f05a3ef6bb1385b overlooked this. Report and patch by Kyotaro Horiguchi Discussion: <a target="_blank" href="http://postgr.es/m/20170608.145852.54673832.horiguchi.kyotaro@lab.ntt.co.jp">http://postgr.es/m/20170608.145852.54673832.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0eac8e7ff7ebb807f479dd10aa7c88b799a7e319">https://git.postgresql.org/pg/commitdiff/0eac8e7ff7ebb807f479dd10aa7c88b799a7e319</a></li>

</ul>

<p>Joe Conway pushed:</p>

<ul>

<li>Fix contrib/sepgsql regr tests for tup-routing constraint check change. Commit 15ce775 changed tuple-routing constraint checking logic. This affects the expected output for contrib/sepgsql, because there's no longer LOG entries reporting allowance of int4eq() execution. Per buildfarm. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/06c0afe56e7aa6e8ab9ea2dd92bac2220201affe">https://git.postgresql.org/pg/commitdiff/06c0afe56e7aa6e8ab9ea2dd92bac2220201affe</a></li>

<li>Apply RLS policies to partitioned tables. The new partitioned table capability added a new relkind, namely RELKIND_PARTITIONED_TABLE. Update fireRIRrules() to apply RLS policies on RELKIND_PARTITIONED_TABLE as it does RELKIND_RELATION. In addition, add RLS regression test coverage for partitioned tables. Issue raised by Fakhroutdinov Evgenievich and patch by Mike Palmiotto. Regression test editorializing by me. Discussion: <a target="_blank" href="https://postgr.es/m/flat/20170601065959.1486.69906@wrigleys.postgresql.org">https://postgr.es/m/flat/20170601065959.1486.69906@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4f7a95be2c112bdc8da5f7e46cbb743b8ba4cc21">https://git.postgresql.org/pg/commitdiff/4f7a95be2c112bdc8da5f7e46cbb743b8ba4cc21</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Jing Wang sent in a patch to add support for COMMENT ON ... CURRENT DATABASE.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to implement \gdesc in psql.</p>

<p>Atsushi Torikoshi and Ashutosh Bapat traded patches to fix a typo in README.dependencies.</p>

<p>Tom Lane sent in a patch to retry shm attach for Windows.</p>

<p>Etsuro Fujita sent in another revision of a patch to adjust inherited update tlist.</p>

<p>Beena Emerson sent in another revision of a patch to implement default partition for range-partitioned tables.</p>

<p>Etsuro Fujita sent in a patch to update comments in nodeModifyTable.c.</p>

<p>Yura Sokolov sent in a patch to fix a performance degradation from contended LWLocks on NUMA.</p>

<p>Rahila Syed and Mithun Cy traded patches to implement auto_prewarm.</p>

<p>Amul Sul sent in another revision of a patch to implement hash partitioning.</p>

<p>Dang Minh Huong and Man Trieu traded patches to ensure that the unaccenting process actually ends in completely unaccented letters.</p>

<p>Andres Freund sent in a patch to clean up latch related code.</p>

<p>Tom Lane sent in a patch to log parallel worker start and stop.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to improve TAP test stability.</p>

<p>Thomas Munro sent in three more revisions of a patch to fix an infelicity between transition tables and wCTEs.</p>

<p>Jeevan Ladhe and Ashutosh Bapat traded patches to add support for default partitions.</p>

<p>Chapman Flack sent in a patch to PostgresNode to make get_new_node be able to be a class-method.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to fix race conditions with WAL sender PID lookups.</p>

<p>Kyotaro HORIGUCHI sent in a patch to install include/statistics directory on make install.</p>

<p>Amit Khandekar sent in two more revisions of a patch to update partition keys in partitioned tables.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench TAP tests and minor fixes.</p>

<p>Micha&euml;l Paquier sent in a patch to implement pg_receivewal --endpos.</p>

<p>Amit Langote sent in a patch to implement fixes around partition constraint handling when attaching.</p>

<p>Tom Lane sent in two revisions of a patch to prohibit conditional SRF.</p>

<p>Thomas Munro sent in two more revisions of a patch to fix transition tuples from child tables.</p>

<p>Thomas Munro sent in two revisions of a patch to fix an infelicity between transition tables and ON CONFLICT.</p>

<p>Konstantin Knizhnik sent in another revision of a patch to implement projection functional indexes.</p>

<p>Jim Van Fleet sent in a patch to split ProcArrayLock into multiple parts.</p>

<p>Heikki Linnakangas sent in a patch to allow multiple hostaddrs to go with multiple hostnames.</p>

<p>Masahiko Sawada and Jeff Janes traded patches to add an "All Tables" column to psql's \dRp and \dRp+.</p>

<p>Vinayak Pokale sent in two revisions of a patch to add WHENEVER statement DO CONTINUE support to ECPG.</p>

<p>Erik Rijkers sent in a patch to improve some comments in tablesync.c.</p>

<p>Ashutosh Sharma sent in a patch to add ICU support on Windows.</p>

<p>Mark Rofail sent in a patch to put in some infrastructure for implementing foreign key arrays.</p>

<p>&Aacute;lvaro Herrera sent in a patch to fix an earlier patch for translation-friendliness.</p>

<p>Dean Rasheed sent in a patch to give relation_is_updatable() the message about partitioned tables.</p>

<p>Christian Ullrich sent in a patch to work around the fact that the VS 2013 CRT's setlocale() function is not entirely thread-safe.</p>

<p>Tom Lane sent in a patch to fix sequence pg_upgrade.</p>

<p>Yugo Nagata sent in a patch to fix a documentation typo in ALTER TABLE example.</p>

<p>Thomas Munro sent in two revisions of a patch to fix some infelicities between named tuplestores and enrtuples.</p>

<p>Ashutosh Sharma sent in a patch to fix ICU collation on Windows.</p>