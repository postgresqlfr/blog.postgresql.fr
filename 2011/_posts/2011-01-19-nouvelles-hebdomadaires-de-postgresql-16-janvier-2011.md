---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 janvier 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/01/19/Nouvelles-hebdomadaires-de-PostgreSQL-16-janvier-2011"
---


<p>La derni&egrave;re <em>commitfest</em> pour la 9.1 a commenc&eacute;. Lancez-vous et participez &agrave; la relecture de ces patchs&nbsp;!</p>

<p>Dans la version 9.1, PostgreSQL b&eacute;n&eacute;ficiera d'am&eacute;liorations substantielles sur le mode de transaction SERIALIZABLE. &Ecirc;tes-vous utilisateur de SERIALIZABLE&nbsp;? L'&eacute;quipe de d&eacute;veloppement de PostgreSQL a besoin de retours&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/community/">http://www.postgresql.org/community/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgbouncer 1.4, un gestionnaire de connexion l&eacute;ger&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a></li>

<li>repmgr 1.0.0, un syst&egrave;me de gestion pour le <em>Hot Standby</em> et la <em>Streaming Replication</em>&nbsp;: 

<a target="_blank" href="http://projects.2ndquadrant.com/repmgr">http://projects.2ndquadrant.com/repmgr</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Selena Deckelmann parlera de la communaut&eacute; et du d&eacute;veloppement PostgreSQL le 7 f&eacute;vrier 2010 &agrave; 16h, &agrave; l'universit&eacute; d'&eacute;tat de l'Oregon &agrave; Corvallis.</li>

<li>L'appel &agrave; conf&eacute;renciers pour l'annuel "<em>Prague PostgreSQL Developers' Day</em>", 4&egrave;me &eacute;dition, est lanc&eacute;. L'&eacute;v&eacute;nement sera tenu le 10 f&eacute;vrier 2011 &agrave; l'<em>Universitas Carolinas</em>&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2010-12/msg00009.php">http://archives.postgresql.org/pgsql-announce/2010-12/msg00009.php</a></li>

<li>L'appel &agrave; projets de PostgreSQLFr a &eacute;t&eacute; lanc&eacute;. Les projets doivent concerner PostgreSQL et la communaut&eacute; francophone. Mail &agrave; appel-projets-2010 (AT) postgresql (DOT) fr. 

<a target="_blank" href="http://www.postgresql.fr/appel_a_projets_2010:call_for_projects">http://www.postgresql.fr/appel_a_projets_2010:call_for_projects</a></li>

<li>Un PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011. Proposez vos conf&eacute;rences sur pgday-submissions (AT) googlegroups (DOT) com.</li>

<li>PostgreSQL Conference East 2011&nbsp;: New-York City, du 22 au 25 mars&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;! 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110116">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<ul>

<li>Steve Singer reviewed Gurjeet Singh's patch to add a primary key using an existing index.</li>

<li>Noah Misch reviewed the snapshot synchronization patch.</li>

<li>Hitoshi Harada reviewed the patch to add a PL/Python validator function.</li>

<li>Jan Urbanski reveiwed the FDW API patch.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Backend support for streaming base backups. Add BASE_BACKUP command to walsender, allowing it to stream a base backup to the client (in tar format). The syntax is still far from ideal, that will be fixed in the switch to use a proper grammar for walsender. No client included yet, will come as a separate commit. Magnus Hagander and Heikki Linnakangas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0eb59c4591ecf4f1c69d89e9f043a18e7dce9e47">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0eb59c4591ecf4f1c69d89e9f043a18e7dce9e47</a></li>

<li>Set process title to indicate base backup is running. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2e36343f82377fbb50834bba6557f8f243fecb34">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2e36343f82377fbb50834bba6557f8f243fecb34</a></li>

<li>Reset walsender ps title in the main loop. When in streaming mode we can never get out, so it will never be required, but after a base backup (or other operations) we can get back to the loop, so the title needs to be cleared. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7ebda9d8c6f78b3bb31247531d0ef0e64b32a16">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7ebda9d8c6f78b3bb31247531d0ef0e64b32a16</a></li>

<li>Typo fix. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1c400d330934eb6d70982af522f2bc0458eef48d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1c400d330934eb6d70982af522f2bc0458eef48d</a></li>

<li>Revert installation of gram.h in 8.3. To make the buildfarm green again, since there is no file to copy on msvc, and also given discussion about the necessity of the file at all... 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c1bcb1fb618fbec07b04f16042bcf9ffbf294fec">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c1bcb1fb618fbec07b04f16042bcf9ffbf294fec</a></li>

<li>Add missing function prototype, for consistency. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=47a5f3e9dab68f47ebadc759afb97b900c437c54">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=47a5f3e9dab68f47ebadc759afb97b900c437c54</a></li>

<li>Track walsender state in shared memory and expose in pg_stat_replication. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4c8e20f815cbdf043d6d27906fd85ae50c9e4870">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4c8e20f815cbdf043d6d27906fd85ae50c9e4870</a></li>

<li>Make sure walsender state is only read while holding the spinlock. Noted by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9eacd427e811a97337de1fdd61a3cb90604981ad">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9eacd427e811a97337de1fdd61a3cb90604981ad</a></li>

<li>Exit from base backups when shutdown is requested. When the exit waits until the whole backup completes, it may take a very long time. In passing, add back an error check in the main loop so we detect clients that disconnect much earlier if the backup is large. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=688423d004f4092aed73c73a3281c281d476436d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=688423d004f4092aed73c73a3281c281d476436d</a></li>

<li>Use a lexer and grammar for parsing walsender commands Makes it easier to parse mainly the BASE_BACKUP command with it's options, and avoids having to manually deal with quoted identifiers in the label (previously broken), and makes it easier to add new commands and options in the future. In passing, refactor the case statement in the walsender to put each command in it's own function. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fcd810c69adf11b6ec1cff35359be0dd27662eff">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fcd810c69adf11b6ec1cff35359be0dd27662eff</a></li>

<li>Enumerate available tablespaces after starting the backup. This closes a race condition where if a tablespace was created after the enumeration happened but before the do_pg_start_backup() was called, the backup would be incomplete. Now that it's done while we are in backup mode, WAL replay will recreate it during restore. Noted by Heikki Linnakangas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3866ff6149a3b072561e65b3f71f63498e77b6b2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3866ff6149a3b072561e65b3f71f63498e77b6b2</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>A toast relid field are no longer needed in pg_upgrade's rel arrays, so remove them. Also other renaming. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0a5f11993195d74f23b63cc5c2d7024c6d27d7e2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0a5f11993195d74f23b63cc5c2d7024c6d27d7e2</a></li>

<li>Apply libpq documentation patches submitted by Leslie S Satenstein and reviewed by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a0423ec02df3e311d6d5888170cb25a8c14bc6bf">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a0423ec02df3e311d6d5888170cb25a8c14bc6bf</a></li>

<li>More libpq documentation adjustments from Leslie S Satenstein, reviewed by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=712dd95370fc6c3a8d20f71b8e195a7af3c50f42">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=712dd95370fc6c3a8d20f71b8e195a7af3c50f42</a></li>

<li>Apply patch for test_fsync to add tests for O_DIRECT. Adjusted patch by Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=677b06ca462ec6fd98da9369a2eae6085c9d7fed">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=677b06ca462ec6fd98da9369a2eae6085c9d7fed</a></li>

<li>Improve output display of test_fsync. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3ab80cfe031b616638eb6956010dcc9cb6426631">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3ab80cfe031b616638eb6956010dcc9cb6426631</a></li>

<li>Restructure test_fync to use modular C so there is less duplicate code and it can be enhanced easier. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=169516ad9395e91d206cbf5bf32c5d2fa34d4111">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=169516ad9395e91d206cbf5bf32c5d2fa34d4111</a></li>

<li>Have test_fsync output details that fdatasync is the default wal_sync_method on Linux. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=001d3664e32c0d156215bbfeccea3272aaf17722">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=001d3664e32c0d156215bbfeccea3272aaf17722</a></li>

<li>In test_fsync, warn about options without o_direct that are not used by Postgres, and cases where o_direct does not work with certain file systems. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=431605f666cfb223cd615ec8c63cbdea07295550">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=431605f666cfb223cd615ec8c63cbdea07295550</a></li>

<li>Reverse number of stars used for test_fsync details. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3eebb33dddcfe4ac0719b697c1ebd3694038054e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3eebb33dddcfe4ac0719b697c1ebd3694038054e</a></li>

<li>Use O_DIRECT in O_SYNC test of different size. Restructure O_DIRECT error reporting to be more consistent. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6dc15e3befaa6a3ff72633a2084ad1e1466edcde">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6dc15e3befaa6a3ff72633a2084ad1e1466edcde</a></li>

<li>In test_fsync, use #define for printf format of ops/sec. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e0c274679cb50064a92472c94c7ef5849a156536">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e0c274679cb50064a92472c94c7ef5849a156536</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Leave temporary files out of streaming base backups. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dc1305ce5ffef157410b6e0171d71fa16da4cc9e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dc1305ce5ffef157410b6e0171d71fa16da4cc9e</a></li>

<li>Fix the logic in libpqrcv_receive() to determine if there's any incoming data that can be read without blocking. It used to conclude that there isn't, even though there was data in the socket receive buffer. That lead walreceiver to flush the WAL after every received chunk, potentially causing big performance issues. Backpatch to 9.0, because the performance impact can be very significant. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5a02a744555789ab8390dbf57271e9d07127602">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5a02a744555789ab8390dbf57271e9d07127602</a></li>

<li>Treat a WAL sender process that hasn't started streaming yet as a regular backend, as far as the postmaster shutdown logic is concerned. That means, fast shutdown will wait for WAL sender processes to exit before signaling bgwriter to finish. This avoids race conditions between a base backup stopping or starting, and bgwriter writing the shutdown checkpoint WAL record. We don't want e.g the end-of-backup WAL record to be written after the shutdown checkpoint. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8f5d65e916796aaee1bf7dd66daf45ca56cd13be">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8f5d65e916796aaee1bf7dd66daf45ca56cd13be</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tweak create_index_paths()'s test for whether to consider a bitmap scan. Per my note of a couple days ago, create_index_paths would refuse to consider any path at all for GIN indexes if the selectivity estimate came out as 1.0; not even if you tried to force it with enable_seqscan. While this isn't really a bad outcome in practice, it could be annoying for testing purposes. Adjust the test for "is this path only useful for sorting" so that it doesn't fire on paths with nil pathkeys, which will include all GIN paths. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9d1ac2f5fa4043529dbaff5ebdc73405fa73207b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9d1ac2f5fa4043529dbaff5ebdc73405fa73207b</a></li>

<li>Adjust basebackup.c to suppress compiler warnings. Some versions of gcc complain about "variable `tablespaces' might be clobbered by `longjmp' or `vfork'" with the original coding. Fix by moving the PG_TRY block into a separate subroutine. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e6dce4e439e1d271dad9a95bc4b94147be2fc39a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e6dce4e439e1d271dad9a95bc4b94147be2fc39a</a></li>

<li>Fix PlanRowMark/ExecRowMark structures to handle inheritance correctly. In an inherited UPDATE/DELETE, each target table has its own subplan, because it might have a column set different from other targets. This means that the resjunk columns we add to support EvalPlanQual might be at different physical column numbers in each subplan. The EvalPlanQual rewrite I did for 9.0 failed to account for this, resulting in possible misbehavior or even crashes during concurrent updates to the same row, as seen in a recent report from Gordon Shannon. Revise the data structure so that we track resjunk column numbers separately for each subplan. I also chose to move responsibility for identifying the physical column numbers back to executor startup, instead of assuming that numbers derived during preprocess_targetlist would stay valid throughout subsequent massaging of the plan. That's a bit slower, so we might want to consider undoing it someday; but it would complicate the patch considerably and didn't seem justifiable in a bug fix that has to be back-patched to 9.0. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d487afbb813b7ca8803e20974b9e45530a1f4ef1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d487afbb813b7ca8803e20974b9e45530a1f4ef1</a></li>

<li>Revert incorrect memory-conservation hack in inheritance_planner(). This reverts commit d1001a78ce612a16ea622b558f5fc2b68c45ab4c of 2010-12-05, which was broken as reported by Jeff Davis. The problem is that the individual planning steps may have side-effects on substructures of PlannerGlobal, not only the current PlannerInfo root. Arranging to keep all such side effects in the main planning context is probably possible, but it would change this from a quick local hack into a wide-ranging and rather fragile endeavor. Which it's not worth. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f0f36045b2e3d037bb7647d84373404fa4ba9588">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f0f36045b2e3d037bb7647d84373404fa4ba9588</a></li>

<li>Code review for postmaster.pid contents changes. Fix broken test for pre-existing postmaster, caused by wrong code for appending lines to the lockfile; don't write a failed listen_address setting into the lockfile; don't arbitrarily change the location of the data directory in the lockfile compared to previous releases; provide more consistent and useful definitions of the socket path and listen_address entries; avoid assuming that pg_ctl has the same DEFAULT_PGSOCKET_DIR as the postmaster; assorted code style improvements. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52948169bcddf443b76d6ff1806259b153a2ac04">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52948169bcddf443b76d6ff1806259b153a2ac04</a></li>

<li>Add .gitignore to silence git complaints about parser/scanner output files. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=36750dcef58550c652cfff861f9aad057a391fb9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=36750dcef58550c652cfff861f9aad057a391fb9</a></li>

<li>Move a couple of declarations to reflect where the routines really are. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6ca452ba7fca14dad16425a56ffa1c8a93496b5f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6ca452ba7fca14dad16425a56ffa1c8a93496b5f</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add some subsection headings. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b95ea9dd628a93f564e460b8870228755b520220">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b95ea9dd628a93f564e460b8870228755b520220</a></li>

<li>Re-add recursive coverage target in src/backend/. This was lost during the recent recursive make change. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e3094fd3a8052bb600b287c5dd844b3b0ac2fe11">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e3094fd3a8052bb600b287c5dd844b3b0ac2fe11</a></li>

<li>Don't run regression tests in SQL_ASCII encoding by default. Instead, run them in the encoding that the locale selects, which is more representative of real use. Also document how locale and encoding for regression test runs can be selected. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35eb0958be476d58dcc8ba462d57384e74a62d88">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35eb0958be476d58dcc8ba462d57384e74a62d88</a></li>

<li>Workaround for recursive make breakage. Changing a file two directory levels deep under src/backend/ would not cause the postgres binary to be rebuilt. This change fixes it, but no one knows why. Branch ------ master Details ------- 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c667cc24e888dc4efe4c2412ad8dd13a190295e3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c667cc24e888dc4efe4c2412ad8dd13a190295e3</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Unbreak regression tests, apparently broken by commit 4c8e20f 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7a0b42641e764a1e4abc39cc4311b5c779f5955">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7a0b42641e764a1e4abc39cc4311b5c779f5955</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for logging the current role. Stephen Frost, with some editorialization by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a8a8867912c46a68c9ac14903b3dba2fab8f7097">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a8a8867912c46a68c9ac14903b3dba2fab8f7097</a></li>

<li>Revert patch adding support for logging the current role. This reverts commit a8a8867912c46a68c9ac14903b3dba2fab8f7097, committed by me earlier today (2011-01-12). This isn't safe inside an aborted transaction. Noted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7a32ff97321408afa0ddfcae1a4a060062956d24">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7a32ff97321408afa0ddfcae1a4a060062956d24</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jan Urbanski sent in two more revisions of the patch to add SPI-based exceptions to PL/PythonU.</li>

<li>Kevin Grittner sent in five more revisions of the SSI patch.</li>

<li>Kevin Grittner sent in another revision of the patch for READ ONLY.</li>

<li>Magnus Hagander sent in two more revisions of the patch to use a parser for walsender commands.</li>

<li>Jan Urbanski sent in a patch which adds PL/PythonU functions for quoting strings.</li>

<li>Shigeru HANADA sent in a patch for file_fdw that adds a ResetCopyFrom function, which is intended to improve performance.</li>

<li>Cedric Villemain sent in a patch atop the walsender patch which fixes and infelicity for absolute paths.</li>

<li>Jeff Davis sent in another WIP patch for range types.</li>

<li>Heikki Linnakangas sent in a two revisions of a patch to allow multiple concurrent base backups.</li>

<li>Euler Taveira de Oliveira sent in another revision of the patch to expand pgbench's maximum run size.</li>

<li>ITAGAKI Takahiro sent in another revision of the MULTISET patch.</li>

<li>Shigeru HANADA sent in a patch to unbreak regression tests, apparently broken by commit 4c8e20f.</li>

<li>Noah Misch sent in four more revisions of the patch to optimize ALTER TYPE.</li>

<li>Stephen Frost sent in five revisions of a patch to allow logging the current role.</li>

<li>Alexey Klyukin sent in a patch to allow conversion between PostgreSQL arrays and Perl arrays for PL/Perl(U).</li>

<li>Robert Haas sent in some code to make the background writer compact the request queue before fsyncing.</li>

<li>Shigeru HANADA sent in another flock of patches to implement foreign data wrappers, part of the SQL/MED system.</li>

<li>Fujii Masao sent in a two revisions of a patch to use latches to implement failover in pg_ctl.</li>

<li>Fujii Masao sent in a patch to change pg_last_xlog_receive_location not to move backwards.</li>

<li>Hitoshi Harada sent in a patch to check psql better for an encoding mismatch.</li>

<li>Jan Urbanski sent in two more revisions of the patch that auto-generates error codes from header files.</li>

<li>Andreas Karlsson and Tom Lane traded patches to fix the bug in amproctypes in pg_describe_object().</li>

<li>Shigeru HANADA and ITAGAKI Takahiro traded patches for file data wrappers, a part of SQL/MED.</li>

<li>Tatsuo Ishii sent in a patch to ensure error codes for "terminating connection due to conflict with recovery" are sensible.</li>

<li>Greg Smith sent in a patch to spread out checkpoint sync.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the writeable CTE patch.</li>

<li>Alex Hunsaker sent in two more revisions of a patch to optimize PL/Perl function argument passing.</li>

<li>Simon Riggs sent in a patch to add foreign keys which are presumed to hold but not checked against existing data.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to add transaction-scope advisory locks.</li>

<li>Simon Riggs sent in a WIP patch to add ALTER TABLE ... REPLACE WITH.</li>

<li>Peter Eisentraut sent in a patch to add a client_hostname field to pg_stat_activity.</li>

<li>Greg Smith sent in a patch to help with logging aborted autovacuums.</li>

<li>Magnus Hagander sent in a patch to help streaming base backups by ordering.</li>

<li>Jeff Davis sent in another revision of the patch to add range types.</li>

<li>Fujii Masao sent in a patch to ensure that all WAL received is flushed to disk before walreceiver exits.</li>

<li>Florian Pflug sent in a patch to make backends die sooner after the postmaster does.</li>

<li>Dimitri Fontaine sent in another revision of the extensions patch.</li>

<li>Alvaro Herrera sent in a patch to make foreign key checks less intrusive.</li>

<li>Greg Smith sent in two revisions of a patch to auto-size wal_buffers.</li>

<li>Robert Haas sent in a patch to limit hint bit I/O.</li>

<li>Marti Raudsepp sent in a patch to add a tag command "REPLACE X" for CREATE OR REPLACE statements.</li>

<li>Simon Riggs sent in two revisions of a patch to add recovery control functions.</li>

<li>Hitoshi Harada sent in a patch to allow specifying ENCODING in COPY.</li>

<li>Peter Eisentraut sent in another revision of the patch to infer client_encoding from client locale.</li>

<li>Jaime Casanova sent in a patch to add named restore points.</li>

<li>Peter Eisentraut sent in another revision of the per-column collation patch.</li>

<li>Fujii Masao sent in a patch to help reduce data loss on the standby.</li>

<li>Andrew Dunstan sent in two revisions of a patch to add a textarray option for file FDWs.</li>

<li>Per review by Noah Misch, Pavel Stehule sent in another revision of the patch to optimize varlena compression in PL/pgsql.</li>

<li>Magnus Hagander sent in two revisions of a patch to add pg_basebackup for streaming base backups.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to fix snapshot taking inconsistencies.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to sho in EXPLAIN ANALYZE the number of rows a plan qual filtered from a node's input.</li>

<li>Magnus Hagander sent in a patch to include WAL in the base backup.</li>

<li>Simon Riggs sent in another revision of the patch to add synchronous replication.</li>

<li>Andreas Karlsson sent in another revision of the patch to add \dL (languages) to psql.</li>

</ul>