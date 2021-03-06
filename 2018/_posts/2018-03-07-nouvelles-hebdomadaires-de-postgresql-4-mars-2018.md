---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 mars 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/03/07/Nouvelles-hebdomadaires-de-PostgreSQL-4-mars-2018"
---


<p>Les mises &agrave; jour de s&eacute;curit&eacute; 10.3, 9.6.8, 9.5.12, 9.4.17, et 9.3.22 ont &eacute;t&eacute; publi&eacute;es. Merci de lire l'annonce ci-dessous et d'appliquer la mise &agrave; jour d&egrave;s que possible&nbsp;: <a target="_blank" href="https://www.postgresql.org/about/news/1834/">https://www.postgresql.org/about/news/1834/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgFormatter 3.0, un outil de formatage/coloration syntaxique pour le code SQL&nbsp;: <a target="_blank" href="http://sqlformat.darold.net/">http://sqlformat.darold.net/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-03/">http://archives.postgresql.org/pgsql-jobs/2018-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de 2 jours &agrave; double programmes qui aura lieu les 8 & 9 mars 2018 au centre de convention de Pasadena, int&eacute;gr&eacute; au SCaLE 16X&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/16x/cfp">http://www.socallinuxexpo.org/scale/16x/cfp</a></li>

<li>Le PGDay nordique 2018 se tiendra &agrave; Oslo (Norv&egrave;ge) &agrave; l'h&ocirc;tel Radisson Blu le 13 mars 2018. Les inscriptions sont ouvertes et le programme a &eacute;t&eacute; publi&eacute;&nbsp;: <a target="_blank" href="https://2018.nordicpgday.org/">https://2018.nordicpgday.org/</a></li>

<li>Le <em>pgDay Paris 2018</em> aura lieu &agrave; l'espace Saint Martin (Paris, France) le 15 mars 2018. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://2018.pgday.paris/">http://2018.pgday.paris/</a></li>

<li>PGConf APAC 2018 se tiendra &agrave; Singapour du 22 au 24 mars 2018&nbsp;: <a target="_blank" href="http://2018.pgconfapac.org/">http://2018.pgconfapac.org/</a></li>

<li>La conf&eacute;rence germanophone <em>PostgreSQL Conference 2018</em> aura lieu le 13 avril 2018 &agrave; Berlin&nbsp;: <a target="_blank" href="http://2018.pgconf.de/">http://2018.pgconf.de/</a></li>

<li>La <em>PGConfNepal 2018</em> se tiendra les 4 & 5 mai 2018 &agrave; l'universit&eacute; de Katmandou, Dulikhel, N&eacute;pal&nbsp;: <a target="_blank" href="https://postgresconf.org/conferences/Nepal2018">https://postgresconf.org/conferences/Nepal2018</a></li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. L'appel &agrave; conf&eacute;renciers court du 6 f&eacute;vrier au 14 avril 2018, et les inscriptions sont ouvertes du 6 f&eacute;vrier au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018. L'appel &agrave; conf&eacute;renciers court jusqu'au 28 f&eacute;vrier 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180304201817.GA16953@fetter.org">http://www.postgresql.org/message-id/20180304201817.GA16953@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Robert Haas pushed:</p>

<ul>

<li>Add a new upper planner relation for partially-aggregated results. Up until now, we've abused grouped_rel-&gt;partial_pathlist as a place to store partial paths that have been partially aggregate, but that's really not correct, because a partial path for a relation is supposed to be one which produces the correct results with the addition of only a Gather or Gather Merge node, and these paths also require a Finalize Aggregate step. Instead, add a new partially_group_rel which can hold either partial paths (which need to be gathered and then have aggregation finalized) or non-partial paths (which only need to have aggregation finalized). This allows us to reuse generate_gather_paths for partially_grouped_rel instead of writing new code, so that this patch actually basically no net new code while making things cleaner, simplifying things for pending patches for partition-wise aggregate. Robert Haas and Jeevan Chalke. The larger patch series of which this patch is a part was also reviewed and tested by Antonin Houska, Rajkumar Raghuwanshi, David Rowley, Dilip Kumar, Konstantin Knizhnik, Pascal Legrand, Rafia Sabih, and me. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobrzFYS3+U8a_BCy3-hOvh5UyJbC18rEcYehxhpw5=ETA@mail.gmail.com">http://postgr.es/m/CA+TgmobrzFYS3+U8a_BCy3-hOvh5UyJbC18rEcYehxhpw5=ETA@mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoZyQEjdBNuoG9-wC5GQ5GrO4544Myo13dVptvx+uLg9uQ@mail.gmail.com">http://postgr.es/m/CA+TgmoZyQEjdBNuoG9-wC5GQ5GrO4544Myo13dVptvx+uLg9uQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3bf05e096b9f8375e640c5d7996aa57efd7f240c">https://git.postgresql.org/pg/commitdiff/3bf05e096b9f8375e640c5d7996aa57efd7f240c</a></li>

<li>Minor cleanup of code related to partially_grouped_rel. Jeevan Chalke Discussion: <a target="_blank" href="http://postgr.es/m/CAM2+6=X9kxQoL2ZqZ00E6asBt9z+rfyWbOmhXJ0+8fPAyMZ9Jg@mail.gmail.com">http://postgr.es/m/CAM2+6=X9kxQoL2ZqZ00E6asBt9z+rfyWbOmhXJ0+8fPAyMZ9Jg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5e6a63c0d1028b9950c9cbcd7aaf9f2a67880a8d">https://git.postgresql.org/pg/commitdiff/5e6a63c0d1028b9950c9cbcd7aaf9f2a67880a8d</a></li>

<li>Fix logic error in add_paths_to_partial_grouping_rel. Commit 3bf05e096b9f8375e640c5d7996aa57efd7f240c sometimes uses the cheapest_partial_path variable in this function to mean the cheapest one from the input rel and at other times the cheapest one from the partially grouped rel, but it never resets it, so we can end up with bad plans, leading to "ERROR: Aggref found in non-Agg plan node". Jeevan Chalke, per a report from Andreas Joseph Krogh and a separate off-list report from Rajkumar Raghuwanshi Discussion: <a target="_blank" href="http://postgr.es/m/CAM2+6=X9kxQoL2ZqZ00E6asBt9z+rfyWbOmhXJ0+8fPAyMZ9Jg@mail.gmail.com">http://postgr.es/m/CAM2+6=X9kxQoL2ZqZ00E6asBt9z+rfyWbOmhXJ0+8fPAyMZ9Jg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3bfe957761ace9290072690a6298fc0eb996d857">https://git.postgresql.org/pg/commitdiff/3bfe957761ace9290072690a6298fc0eb996d857</a></li>

<li>doc: Fix grammar. Michael Paquier Discussion: <a target="_blank" href="http://postgr.es/m/20180209135327.GC29003@paquier.xyz">http://postgr.es/m/20180209135327.GC29003@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6614aaa699bcff77fbcbc349fc678b8bfb060b9a">https://git.postgresql.org/pg/commitdiff/6614aaa699bcff77fbcbc349fc678b8bfb060b9a</a></li>

<li>Update and improve comments. Commits 6f6b99d1335be8ea1b74581fc489a97b109dd08a and f3b0897a1213f46b4d3a99a7f8ef3a4b32e03572 didn't properly update these comments. Etsuro Fujita, reviewed by Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/5A671FE1.6020305@lab.ntt.co.jp">http://postgr.es/m/5A671FE1.6020305@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c161ea138fe123ad266ed22d153c9539f20c1325">https://git.postgresql.org/pg/commitdiff/c161ea138fe123ad266ed22d153c9539f20c1325</a></li>

<li>postgres_fdw: Third attempt to stabilize regression tests. Commit 1bc0100d270e5bcc980a0629b8726a32a497e788 added this test, and commit 882ea509fe7a4711fe25463427a33262b873dfa1 tried to stabilize it. There were still failures, so commit 958e20e42d6c346ab89f6c72e4262230161d1663 tried again to stabilize it. That approach is still failing on jaguarundi, though, so back it out and try something else. Specifically, instead of disabling remote estimates for the table in question, let's tell autovacuum to leave it alone. Etsuro Fujita Discussion: <a target="_blank" href="http://postgr.es/m/5A82DCCE.3060107@lab.ntt.co.jp">http://postgr.es/m/5A82DCCE.3060107@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4fa396464e5fe238b7994535182f28318c61c78e">https://git.postgresql.org/pg/commitdiff/4fa396464e5fe238b7994535182f28318c61c78e</a></li>

<li>Fix assertion failure when Parallel Append is run serially. Parallel-aware plan nodes must be prepared to run without parallelism if it's not possible at execution time for whatever reason. Commit ab72716778128fb63d54ac256adf7fe6820a1185, which introduced Parallel Append, overlooked this. Rajkumar Raghuwanshi reported this problem, and I included his test case in this patch. The code changes are by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAKcux6=WqkUudLg1GLZZ7fc5ScWC1+Y9qD=pAHeqy32WoeJQvw@mail.gmail.com">http://postgr.es/m/CAKcux6=WqkUudLg1GLZZ7fc5ScWC1+Y9qD=pAHeqy32WoeJQvw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ce1663cdcdbd9bf15c81570277f70571b3727dd3">https://git.postgresql.org/pg/commitdiff/ce1663cdcdbd9bf15c81570277f70571b3727dd3</a></li>

<li>Document LWTRANCHE_PARALLEL_HASH_JOIN. Thomas Munro Discussion: <a target="_blank" href="http://postgr.es/m/CAEepm=3g1hhbFzYkR_QT9RmBvsGX4UaeCtX-4Js8OOEMmFeaSQ@mail.gmail.com">http://postgr.es/m/CAEepm=3g1hhbFzYkR_QT9RmBvsGX4UaeCtX-4Js8OOEMmFeaSQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/73797b7884ee1722127f27ecfcede99367139dc0">https://git.postgresql.org/pg/commitdiff/73797b7884ee1722127f27ecfcede99367139dc0</a></li>

<li>For partitionwise join, match on partcollation, not parttypcoll. The previous code considered two tables to have the partition scheme if the underlying columns had the same collation, but what we actually need to compare is not the collations associated with the column but the collation used for partitioning. Fix that. Robert Haas and Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/0f95f924-0efa-4cf5-eb5f-9a3d1bc3c33d@lab.ntt.co.jp">http://postgr.es/m/0f95f924-0efa-4cf5-eb5f-9a3d1bc3c33d@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2af28e603319224e87fd35ab62f36ef6de45eaac">https://git.postgresql.org/pg/commitdiff/2af28e603319224e87fd35ab62f36ef6de45eaac</a></li>

<li>shm_mq: Reduce spinlock usage. Previously, mq_bytes_read and mq_bytes_written were protected by the spinlock, but that turns out to cause pretty serious spinlock contention on queries which send many tuples through a Gather or Gather Merge node. This patches changes things so that we instead read and write those values using 8-byte atomics. Since mq_bytes_read can only be changed by the receiver and mq_bytes_written can only be changed by the sender, the only purpose of the spinlock is to prevent reads and writes of these values from being torn on platforms where 8-byte memory access is not atomic, making the conversion fairly straightforward. Testing shows that this produces some slowdown if we're using emulated 64-bit atomics, but since they should be available on any platform where performance is a primary concern, that seems OK. It's faster, sometimes a lot faster, on platforms where such atomics are available. Patch by me, reviewed by Andres Freund, who also suggested the design. Also tested by Rafia Sabih. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYuK0XXxmUNTFT9TSNiBtWnRwasBcHHRCOK9iYmDLQVPg@mail.gmail.com">http://postgr.es/m/CA+TgmoYuK0XXxmUNTFT9TSNiBtWnRwasBcHHRCOK9iYmDLQVPg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/34db06ef9a1d7f36391c64293bf1e0ce44a33915">https://git.postgresql.org/pg/commitdiff/34db06ef9a1d7f36391c64293bf1e0ce44a33915</a></li>

<li>shm_mq: Have the receiver set the sender's less frequently. Instead of marking data from the ringer buffer consumed and setting the sender's latch for every message, do it only when the amount of data we can consume is at least 1/4 of the size of the ring buffer, or when no data remains in the ring buffer. This is dramatically faster in my testing; apparently, the savings from sending signals less frequently outweighs the benefit of letting the sender know about available buffer space sooner. Patch by me, reviewed by Andres Freund and tested by Rafia Sabih. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYK7RFj6r7KLEfSGtYZCi3zqTRhAz8mcsDbUAjEmLOZ3Q@mail.gmail.com">http://postgr.es/m/CA+TgmoYK7RFj6r7KLEfSGtYZCi3zqTRhAz8mcsDbUAjEmLOZ3Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/497171d3e2aaeea3b30d710b4e368645ad07ae43">https://git.postgresql.org/pg/commitdiff/497171d3e2aaeea3b30d710b4e368645ad07ae43</a></li>

<li>postgres_fdw: Fourth attempt to stabilize regression tests. Commit 1bc0100d270e5bcc980a0629b8726a32a497e788 added this test, and commits 882ea509fe7a4711fe25463427a33262b873dfa1, 958e20e42d6c346ab89f6c72e4262230161d1663, 4fa396464e5fe238b7994535182f28318c61c78e tried to stabilize it. It's still not stable, so keep trying. The latest comment from Tom Lane is that disabling autovacuum seems like a good strategy, but we might need to do it on more tables, hence this patch. Etsuro Fujita Discussion: <a target="_blank" href="http://postgr.es/m/5A9928F1.2010206@lab.ntt.co.jp">http://postgr.es/m/5A9928F1.2010206@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1733460f0205fc6d6bbe4c14911049a918c6e073">https://git.postgresql.org/pg/commitdiff/1733460f0205fc6d6bbe4c14911049a918c6e073</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix typo in internal error message. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/964bddf1e87a42bbaaa989be0aabee94dbac9432">https://git.postgresql.org/pg/commitdiff/964bddf1e87a42bbaaa989be0aabee94dbac9432</a></li>

<li>Fix warnings in man page build. The changes in the CREATE POLICY man page from commit 87c2a17fee784c7e1004ba3d3c5d8147da676783 triggered a stylesheet bug that created some warning messages and incorrect output. This installs a workaround. Also improve the whitespace a bit so it looks better. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d21ddc220fc735da84c9fa7bae1968f6953a6c8c">https://git.postgresql.org/pg/commitdiff/d21ddc220fc735da84c9fa7bae1968f6953a6c8c</a></li>

<li>doc: Improve man build speed. Turn off man.endnotes.are.numbered parameter, which we don't need, but which increases performance vastly if off. Also turn on man.output.quietly, which also makes things a bit faster, but which is also less useful now as a progress indicator because the build is so fast now. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6d933da306c993ab52a28dba9f4f5b80c80f9681">https://git.postgresql.org/pg/commitdiff/6d933da306c993ab52a28dba9f4f5b80c80f9681</a></li>

<li>Add prokind column, replacing proisagg and proiswindow. The new column distinguishes normal functions, procedures, aggregates, and window functions. This replaces the existing columns proisagg and proiswindow, and replaces the convention that procedures are indicated by prorettype == 0. Also change prorettype to be VOIDOID for procedures. Reviewed-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fd1a421fe66173fb9b85d3fe150afde8e812cbe4">https://git.postgresql.org/pg/commitdiff/fd1a421fe66173fb9b85d3fe150afde8e812cbe4</a></li>

<li>Add PG_TEST_EXTRA to control optional test suites. The SSL and LDAP test suites are not run by default, as they are not secure for multi-user environments. This commit adds an extra make variable to optionally enable them, for example: make check-world PG_TEST_EXTRA='ldap ssl' Author: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fdb34824e01d14e21566806ea37e974ac61ef1a4">https://git.postgresql.org/pg/commitdiff/fdb34824e01d14e21566806ea37e974ac61ef1a4</a></li>

<li>In SSL tests, restart after pg_hba.conf changes. This prevents silently using a wrong configuration, similar to b4e2ada347bd8ae941171bd0761462e5b11b765d. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f96f48113f97a45fe95d016e7b1afef4953616f0">https://git.postgresql.org/pg/commitdiff/f96f48113f97a45fe95d016e7b1afef4953616f0</a></li>

<li>Prevent LDAP and SSL tests from running without support in build. Add checks in each test file that the build supports the feature, otherwise skip all the tests. Before, if someone were to (accidentally) invoke these tests without build support, they would fail in confusing ways. based on patch from Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ff18115ae9dc2f2e54f5feb8cd9c493bd963a641">https://git.postgresql.org/pg/commitdiff/ff18115ae9dc2f2e54f5feb8cd9c493bd963a641</a></li>

<li>doc: Improve wording. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/506652bcaea74a23d6f0a33923a7f558126b472d">https://git.postgresql.org/pg/commitdiff/506652bcaea74a23d6f0a33923a7f558126b472d</a></li>

<li>Minor fixes for reloptions tests. Follow-up to 4b95cc1dc36c9d1971f757e9b519fcc442833f0e Author: Nikolay Shaplov &lt;dhyan@nataraj.su&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/39314efa4dd9101c18ef37067c3e114968a600a4">https://git.postgresql.org/pg/commitdiff/39314efa4dd9101c18ef37067c3e114968a600a4</a></li>

<li>doc: Fix links to pg_stat_replication. In PostgreSQL 9.5, the documentation for pg_stat_replication was moved, so some of the links pointed to an appropriate location. Author: Maksim Milyutin &lt;milyutinma@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e568eed2fce7c50f40e0dcdec0f6d1e88b42a15b">https://git.postgresql.org/pg/commitdiff/e568eed2fce7c50f40e0dcdec0f6d1e88b42a15b</a></li>

<li>doc: Small wording improvement. Replace "checkpoint segment" with "WAL segment". Reported-by: Maksim Milyutin &lt;milyutinma@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7726147f5368e04d0b7c1ab1849a6be47391ff24">https://git.postgresql.org/pg/commitdiff/7726147f5368e04d0b7c1ab1849a6be47391ff24</a></li>

<li>PL/pgSQL: Simplify RETURN checking for procedures. Check at compile time that RETURN in a procedure does not specify a parameter, rather than at run time. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f7c7f67fecc40170a2fad2d1cff24dd1ddd22d7f">https://git.postgresql.org/pg/commitdiff/f7c7f67fecc40170a2fad2d1cff24dd1ddd22d7f</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Update PartitionTupleRouting struct comment. Small review on edd44738bc88. Discussion: <a target="_blank" href="https://postgr.es/m/20180222165315.k27qfn4goskhoswj@alvherre.pgsql">https://postgr.es/m/20180222165315.k27qfn4goskhoswj@alvherre.pgsql</a> Reviewed-by: Robert Haas, Amit Langote <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/364de256651458f2442811bae10b0c808bc00a98">https://git.postgresql.org/pg/commitdiff/364de256651458f2442811bae10b0c808bc00a98</a></li>

<li>Relax overly strict sanity check for upgraded ancient databases. Commit 4800f16a7ad0 added some sanity checks to ensure we don't accidentally corrupt data, but in one of them we failed to consider the effects of a database upgraded from 9.2 or earlier, where a tuple exclusively locked prior to the upgrade has a slightly different bit pattern. Fix that by using the macro that we fixed in commit 74ebba84aeb6 for similar situations. Reported-by: Alexandre Garcia Reviewed-by: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAPYLKR6yxV4=pfW0Gwij7aPNiiPx+3ib4USVYnbuQdUtmkMaEA@mail.gmail.com">https://postgr.es/m/CAPYLKR6yxV4=pfW0Gwij7aPNiiPx+3ib4USVYnbuQdUtmkMaEA@mail.gmail.com</a> Andres suspects that this bug may have wider ranging consequences, but I couldn't find anything. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/477ad05e165c15dc9241376f0fce9664063cff46">https://git.postgresql.org/pg/commitdiff/477ad05e165c15dc9241376f0fce9664063cff46</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Improve regression test coverage of regress.c. It's a bit silly to have test functions that aren't tested, so test them. In passing, rename int44in/int44out to city_budget_in/_out so that they match how the regression tests use them. Also, fix city_budget_out so that it emits the format city_budget_in expects to read; otherwise we'd have dump/reload failures when testing pg_dump against the regression database. (We avoided that in the past only because no data of type city_budget was actually stored anywhere.) Discussion: <a target="_blank" href="https://postgr.es/m/29322.1519701006@sss.pgh.pa.us">https://postgr.es/m/29322.1519701006@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/be42eb9d624cc14a9326e21ec75fdc571a7cb188">https://git.postgresql.org/pg/commitdiff/be42eb9d624cc14a9326e21ec75fdc571a7cb188</a></li>

<li>Remove unused functions in regress.c. This patch removes five functions that presumably were once used in the regression tests, but haven't been so used in many years. Nonetheless we've been wasting maintenance effort on them (e.g., by converting them to V1 function protocol). I see no reason to think that reviving them would add any useful test coverage, so drop 'em. In passing, mark regress_lseg_construct static, since it's not called from outside this file. Discussion: <a target="_blank" href="https://postgr.es/m/29322.1519701006@sss.pgh.pa.us">https://postgr.es/m/29322.1519701006@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/db3af9feb19f39827e916145f88fa5eca3130cb2">https://git.postgresql.org/pg/commitdiff/db3af9feb19f39827e916145f88fa5eca3130cb2</a></li>

<li>Prevent dangling-pointer access when update trigger returns old tuple. A before-update row trigger may choose to return the "new" or "old" tuple unmodified. ExecBRUpdateTriggers failed to consider the second possibility, and would proceed to free the "old" tuple even if it was the one returned, leading to subsequent access to already-deallocated memory. In debug builds this reliably leads to an "invalid memory alloc request size" failure; in production builds it might accidentally work, but data corruption is also possible. This is a very old bug. There are probably a couple of reasons it hasn't been noticed up to now. It would be more usual to return NULL if one wanted to suppress the update action; returning "old" is significantly less efficient since the update will occur anyway. Also, none of the standard PLs would ever cause this because they all returned freshly-manufactured tuples even if they were just copying "old". But commit 4b93f5799 changed that for plpgsql, making it possible to see the bug with a plpgsql trigger. Still, this is certainly legal behavior for a trigger function, so it's ExecBRUpdateTriggers's fault not plpgsql's. It seems worth creating a test case that exercises returning "old" directly with a C-language trigger; testing this through plpgsql seems unreliable because its behavior might change again. Report and fix by Rushabh Lathia; regression test case by me. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAGPqQf1P4pjiNPrMof=P_16E-DFjt457j+nH2ex3=nBTew7tXw@mail.gmail.com">https://postgr.es/m/CAGPqQf1P4pjiNPrMof=P_16E-DFjt457j+nH2ex3=nBTew7tXw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/25b692568f429436f89ff203c1413e9670d0ad67">https://git.postgresql.org/pg/commitdiff/25b692568f429436f89ff203c1413e9670d0ad67</a></li>

<li>Revert renaming of int44in/int44out. This seemed like a good idea in commit be42eb9d6, but it causes more trouble than it's worth for cross-branch upgrade testing. Discussion: <a target="_blank" href="https://postgr.es/m/11927.1519756619@sss.pgh.pa.us">https://postgr.es/m/11927.1519756619@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c40e20a83ce521b5b5403b08dde05b0f0641d77f">https://git.postgresql.org/pg/commitdiff/c40e20a83ce521b5b5403b08dde05b0f0641d77f</a></li>

<li>Use the correct tuplestore read pointer in a NamedTuplestoreScan. Tom Kazimiers reported that transition tables don't work correctly when they are scanned by more than one executor node. That's because commit 18ce3a4ab allocated separate read pointers for each executor node, as it must, but failed to make them active at the appropriate times. Repair. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/20180224034748.bixarv6632vbxgeb%40dewberry.localdomain">https://postgr.es/m/20180224034748.bixarv6632vbxgeb%40dewberry.localdomain</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e98a4de7d23a54a6c861795ad8e920a59613e08b">https://git.postgresql.org/pg/commitdiff/e98a4de7d23a54a6c861795ad8e920a59613e08b</a></li>

<li>Fix up ecpg's configuration so it handles "long long int" in MSVC builds. Although configure-based builds correctly define HAVE_LONG_LONG_INT when appropriate (in both pg_config.h and ecpg_config.h), builds using the MSVC scripts failed to do so. This currently has no impact on the backend, since it uses that symbol nowhere; but it does prevent ecpg from supporting "long long int". Fix that. Also, adjust Solution.pm so that in the constructed ecpg_config.h file, the "#if (_MSC_VER &gt; 1200)" covers only the LONG_LONG_INT-related #defines, not the whole file. AFAICS this was a thinko on somebody's part: ENABLE_THREAD_SAFETY should always be defined in Windows builds, and in branches using USE_INTEGER_DATETIMES, the setting of that shouldn't depend on the compiler version either. If I'm wrong, I imagine the buildfarm will say so. Per bug #15080 from Jonathan Allen; issue diagnosed by Michael Meskes and Andrew Gierth. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/151935568942.1461.14623890240535309745@wrigleys.postgresql.org">https://postgr.es/m/151935568942.1461.14623890240535309745@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/51057feaa6bd24b51e6a4715c2090491ef037534">https://git.postgresql.org/pg/commitdiff/51057feaa6bd24b51e6a4715c2090491ef037534</a></li>

<li>Remove restriction on SQL block length in isolationtester scanner. specscanner.l had a fixed limit of 1024 bytes on the length of individual SQL stanzas in an isolation test script. People are starting to run into that, so fix it by making the buffer resizable. Once we allow this in HEAD, it seems inevitable that somebody will try to back-patch a test that exceeds the old limit, so back-patch this change as a preventive measure. Daniel Gustafsson Discussion: <a target="_blank" href="https://postgr.es/m/8D628BE4-6606-4FF6-A3FF-8B2B0E9B43D0@yesql.se">https://postgr.es/m/8D628BE4-6606-4FF6-A3FF-8B2B0E9B43D0@yesql.se</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/38a1144a91d207997dd68a8c2af759f88547016f">https://git.postgresql.org/pg/commitdiff/38a1144a91d207997dd68a8c2af759f88547016f</a></li>

<li>Rename base64 routines to avoid conflict with Solaris built-in functions. Solaris 11.4 has built-in functions named b64_encode and b64_decode. Rename ours to something else to avoid the conflict (fortunately, ours are static so the impact is limited). One could wish for less duplication of code in this area, but that would be a larger patch and not very suitable for back-patching. Since this is a portability fix, we want to put it into all supported branches. Report and initial patch by Rainer Orth, reviewed and adjusted a bit by Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/ydd372wk28h.fsf@CeBiTec.Uni-Bielefeld.DE">https://postgr.es/m/ydd372wk28h.fsf@CeBiTec.Uni-Bielefeld.DE</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/43e9490866386ba57c5457c6dbeedb04a51c2086">https://git.postgresql.org/pg/commitdiff/43e9490866386ba57c5457c6dbeedb04a51c2086</a></li>

<li>Doc: remove duplicate poly_ops row from SP-GiST opclass table. Commit ff963b393 added two identical copies of this row. Dagfinn Ilmari Manns&aring;ker Discussion: <a target="_blank" href="https://postgr.es/m/d8j8tdevb7x.fsf@dalvik.ping.uio.no">https://postgr.es/m/d8j8tdevb7x.fsf@dalvik.ping.uio.no</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d3b851e9a3c9f994e78ba9ec4e11e4eae0c72ec7">https://git.postgresql.org/pg/commitdiff/d3b851e9a3c9f994e78ba9ec4e11e4eae0c72ec7</a></li>

<li>Remove redundant IndexTupleDSize macro. Use IndexTupleSize everywhere, instead. Also, remove IndexTupleSize's internal typecast, as that's not really needed and might mask coding errors. Change some pointer variable datatypes in the call sites to compensate for that and make it clearer what we're assuming. Ildar Musin, Robert Haas, Stephen Frost Discussion: <a target="_blank" href="https://postgr.es/m/0274288e-9e88-13b6-c61c-7b36928bf221@postgrespro.ru">https://postgr.es/m/0274288e-9e88-13b6-c61c-7b36928bf221@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d79e7e92bf2a44415e1dcbd74274eb79852fc885">https://git.postgresql.org/pg/commitdiff/d79e7e92bf2a44415e1dcbd74274eb79852fc885</a></li>

<li>Avoid using unsafe search_path settings during dump and restore. Historically, pg_dump has "set search_path = foo, pg_catalog" when dumping an object in schema "foo", and has also caused that setting to be used while restoring the object. This is problematic because functions and operators in schema "foo" could capture references meant to refer to pg_catalog entries, both in the queries issued by pg_dump and those issued during the subsequent restore run. That could result in dump/restore misbehavior, or in privilege escalation if a nefarious user installs trojan-horse functions or operators. This patch changes pg_dump so that it does not change the search_path dynamically. The emitted restore script sets the search_path to what was used at dump time, and then leaves it alone thereafter. Created objects are placed in the correct schema, regardless of the active search_path, by dint of schema-qualifying their names in the CREATE commands, as well as in subsequent ALTER and ALTER-like commands. Since this change requires a change in the behavior of pg_restore when processing an archive file made according to this new convention, bump the archive file version number; old versions of pg_restore will therefore refuse to process files made with new versions of pg_dump. Security: CVE-2018-1058 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3d2aed664ee8271fd6c721ed0aa10168cda112ea">https://git.postgresql.org/pg/commitdiff/3d2aed664ee8271fd6c721ed0aa10168cda112ea</a></li>

<li>Last-minute updates for release notes. Security: CVE-2018-1058 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8af3855699aa6fa97b7d0d39e0bc7d3279d3fe47">https://git.postgresql.org/pg/commitdiff/8af3855699aa6fa97b7d0d39e0bc7d3279d3fe47</a></li>

<li>Schema-qualify references in test_ddl_deparse test script. This omission seems to be what is causing buildfarm failures on crake. Security: CVE-2018-1058 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fb533e45f91796875939a63e7554efff0da3c8e5">https://git.postgresql.org/pg/commitdiff/fb533e45f91796875939a63e7554efff0da3c8e5</a></li>

<li>Fix format_type() to restore its old behavior. Commit a26116c6c accidentally changed the behavior of the SQL format_type() function while refactoring. For the reasons explained in that function's comment, a NULL typemod argument should behave differently from a -1 argument. Since we've managed to break this, add a regression test memorializing the intended behavior. In passing, be consistent about the type of the "flags" parameter. Noted by Rushabh Lathia, though I revised the patch some more. Discussion: <a target="_blank" href="https://postgr.es/m/CAGPqQf3RB2q-d2Awp_-x-Ur6aOxTUwnApt-vm-iTtceZxYnePg@mail.gmail.com">https://postgr.es/m/CAGPqQf3RB2q-d2Awp_-x-Ur6aOxTUwnApt-vm-iTtceZxYnePg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8f72a5704854d292065886eb47ba18fbd504113e">https://git.postgresql.org/pg/commitdiff/8f72a5704854d292065886eb47ba18fbd504113e</a></li>

<li>Remove out-of-date comment about formrdesc(). formrdesc's comment listed the specific catalogs it is called for, but the list was out of date. Rather than jumping back onto that maintenance treadmill, let's just remove the list. It tells the reader nothing that can't be learned quickly and more reliably by searching relcache.c for callers of formrdesc(). Oversight noted by Kyotaro Horiguchi. Discussion: <a target="_blank" href="https://postgr.es/m/20180214.105314.138966434.horiguchi.kyotaro@lab.ntt.co.jp">https://postgr.es/m/20180214.105314.138966434.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6452b098c018a8aa9fbcf28d6be22d92493301fd">https://git.postgresql.org/pg/commitdiff/6452b098c018a8aa9fbcf28d6be22d92493301fd</a></li>

<li>Fix IOS planning when only some index columns can return an attribute. Since 9.5, it's possible that some but not all columns of an index support returning the indexed value for index-only scans. If the same indexed column appears in index columns that behave both ways, check_index_only() supposed that it'd be OK to do an index-only scan testing that column; but that fails if we have to recheck the indexed condition on one of the columns that doesn't support this. In principle we could make this work by remapping the recheck expressions to pull the value from a column that does support returning the indexed value. But such cases are so weird and rare that, at least for now, it doesn't seem worth the trouble. Instead, just teach check_index_only that a value is returnable only if all the index columns containing it are returnable, rather than any of them. Per report from David Pereiro Lagares. Back-patch to 9.5 where the possibility of this situation appeared. Kyotaro Horiguchi Discussion: <a target="_blank" href="https://postgr.es/m/1516210494.1798.16.camel@nlpgo.com">https://postgr.es/m/1516210494.1798.16.camel@nlpgo.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b5febc1d125cac37c626cb7c96936db6839ec733">https://git.postgresql.org/pg/commitdiff/b5febc1d125cac37c626cb7c96936db6839ec733</a></li>

<li>Use ereport not elog for some corrupt-HOT-chain reports. These errors have been seen in the field in corrupted-data situations. It seems worthwhile to report them with ERRCODE_DATA_CORRUPTED, rather than the generic ERRCODE_INTERNAL_ERROR, for the benefit of log monitoring and tools like amcheck. However, use errmsg_internal so that the text strings still aren't translated; it seems unlikely to be worth translators' time to do so. Back-patch to 9.3, like the predecessor commit d70cf811f that introduced these elog calls originally (replacing Asserts). Peter Geoghegan Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-Wzmn4-Pg-UGFwyuyK-wiTih9j32pwg_7T9iwqXpAUZr=Mg@mail.gmail.com">https://postgr.es/m/CAH2-Wzmn4-Pg-UGFwyuyK-wiTih9j32pwg_7T9iwqXpAUZr=Mg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8ecdc2ffe3da3a84d01e51c784ec3510157c893b">https://git.postgresql.org/pg/commitdiff/8ecdc2ffe3da3a84d01e51c784ec3510157c893b</a></li>

<li>Make gistvacuumcleanup() count the actual number of index tuples. Previously, it just returned the heap tuple count, which might be only an estimate, and would be completely the wrong thing if the index is partial. Since this function scans every index page anyway to find free pages, it's practically free to count the surviving index tuples. Let's do that and return an accurate count. This is easily visible as a wrong reltuples value for a partial GiST index following VACUUM, so back-patch to all supported branches. Andrey Borodin, reviewed by Michail Nikolaev Discussion: <a target="_blank" href="https://postgr.es/m/151956654251.6915.675951950408204404.pgcf@coridan.postgresql.org">https://postgr.es/m/151956654251.6915.675951950408204404.pgcf@coridan.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81b9b5ce490a645bde8df203ec4a3b2903d88f31">https://git.postgresql.org/pg/commitdiff/81b9b5ce490a645bde8df203ec4a3b2903d88f31</a></li>

<li>Fix pgbench TAP test to work in VPATH builds. Previously, it'd try to create log files under the source directory not the build directory. This fell over if the source isn't writable by the building user. Fabien Coelho Discussion: <a target="_blank" href="https://postgr.es/m/alpine.DEB.2.20.1801101038340.2283@lancre">https://postgr.es/m/alpine.DEB.2.20.1801101038340.2283@lancre</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e94f2bc809a0c684185666f19d81f6496e732a3a">https://git.postgresql.org/pg/commitdiff/e94f2bc809a0c684185666f19d81f6496e732a3a</a></li>

<li>Fix VM buffer pin management in heap_lock_updated_tuple_rec(). Sloppy coding in this function could lead to leaking a VM buffer pin, or to attempting to free the same pin twice. Repair. While at it, reduce the code's tendency to free and reacquire the same page pin. Back-patch to 9.6; before that, this routine did not concern itself with VM pages. Amit Kapila and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAA4eK1KJKwhc=isgTQHjM76CAdVswzNeAuZkh_cx-6QgGkSEgA@mail.gmail.com">https://postgr.es/m/CAA4eK1KJKwhc=isgTQHjM76CAdVswzNeAuZkh_cx-6QgGkSEgA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0b1d1a038babff4aadf0862c28e7b667f1b12a30">https://git.postgresql.org/pg/commitdiff/0b1d1a038babff4aadf0862c28e7b667f1b12a30</a></li>

<li>Minor cleanup in genbki.pl. Separate out the pg_attribute logic of genbki.pl into its own function. Drop unnecessary "defined $catalog-&gt;{data}" check. This both narrows and shortens the data writing loop of the script. There is no functional change (the emitted files are the same as before). John Naylor Discussion: <a target="_blank" href="https://postgr.es/m/CAJVSVGXnLH=BSo0x-aA818f=MyQqGS5nM-GDCWAMdnvQJTRC1A@mail.gmail.com">https://postgr.es/m/CAJVSVGXnLH=BSo0x-aA818f=MyQqGS5nM-GDCWAMdnvQJTRC1A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8d90b4d01a6120aeaf61ede22dbdda0dd714b7dd">https://git.postgresql.org/pg/commitdiff/8d90b4d01a6120aeaf61ede22dbdda0dd714b7dd</a></li>

<li>Trivial adjustments in preparation for bootstrap data conversion. Rationalize a couple of macro names: * In catalog/pg_init_privs.h, rename Anum_pg_init_privs_privs to Anum_pg_init_privs_initprivs to match the column's actual name. * In ecpg, rename ZPBITOID to BITOID to match catalog/pg_type.h. This reduces reader confusion, and will allow us to generate these macros automatically in future. In catalog/pg_tablespace.h, fix the ordering of related DATA and #define lines to agree with how it's done elsewhere. This has no impact today, but simplifies life for the bootstrap data conversion scripts. John Naylor Discussion: <a target="_blank" href="https://postgr.es/m/CAJVSVGXnLH=BSo0x-aA818f=MyQqGS5nM-GDCWAMdnvQJTRC1A@mail.gmail.com">https://postgr.es/m/CAJVSVGXnLH=BSo0x-aA818f=MyQqGS5nM-GDCWAMdnvQJTRC1A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a351679c806ec9591ef4aaf5534d642e35140b9d">https://git.postgresql.org/pg/commitdiff/a351679c806ec9591ef4aaf5534d642e35140b9d</a></li>

<li>Fix assorted issues in convert_to_scalar(). If convert_to_scalar is passed a pair of datatypes it can't cope with, its former behavior was just to elog(ERROR). While this is OK so far as the core code is concerned, there's extension code that would like to use scalarltsel/scalargtsel/etc as selectivity estimators for operators that work on non-core datatypes, and this behavior is a show-stopper for that use-case. If we simply allow convert_to_scalar to return FALSE instead of outright failing, then the main logic of scalarltsel/scalargtsel will work fine for any operator that behaves like a scalar inequality comparison. The lack of conversion capability will mean that we can't estimate to better than histogram-bin-width precision, since the code will effectively assume that the comparison constant falls at the middle of its bin. But that's still a lot better than nothing. (Someday we should provide a way for extension code to supply a custom version of convert_to_scalar, but today is not that day.) While poking at this issue, we noted that the existing code for handling type bytea in convert_to_scalar is several bricks shy of a load. It assumes without checking that if the comparison value is type bytea, the bounds values are too; in the worst case this could lead to a crash. It also fails to detoast the input values, so that the comparison result is complete garbage if any input is toasted out-of-line, compressed, or even just short-header. I'm not sure how often such cases actually occur --- the bounds values, at least, are probably safe since they are elements of an array and hence can't be toasted. But that doesn't make this code OK. Back-patch to all supported branches, partly because author requested that, but mostly because of the bytea bugs. The change in API for the exposed routine convert_network_to_scalar() is theoretically a back-patch hazard, but it seems pretty unlikely that any third-party code is calling that function directly. Tomas Vondra, with some adjustments by me Discussion: <a target="_blank" href="https://postgr.es/m/b68441b6-d18f-13ab-b43b-9a72188a4e02@2ndquadrant.com">https://postgr.es/m/b68441b6-d18f-13ab-b43b-9a72188a4e02@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/58d9acc18d38899ebc30812b4984778c7069f42c">https://git.postgresql.org/pg/commitdiff/58d9acc18d38899ebc30812b4984778c7069f42c</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>pgbench: consolidate a few PQfinish calls. Author: Doug Rady Discussion: <a target="_blank" href="https://postgr.es/m/6323D83C-9FDA-4EE1-B0ED-6971E585066A@amazon.com">https://postgr.es/m/6323D83C-9FDA-4EE1-B0ED-6971E585066A@amazon.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/337be37da34fd6ccfb63350c3d5b1b284fc58084">https://git.postgresql.org/pg/commitdiff/337be37da34fd6ccfb63350c3d5b1b284fc58084</a></li>

<li>doc: Add random_zipfian to list of random functions with argument. Author: Ildar Musin Reviewed-By: Fabian Coelho Discussion: <a target="_blank" href="https://postgr.es/m/6376ed81-3ce8-14f4-4758-099872f4ce7d@postgrespro.ru">https://postgr.es/m/6376ed81-3ce8-14f4-4758-099872f4ce7d@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8c438fcc9f19273b884b0c7498c74391c7546014">https://git.postgresql.org/pg/commitdiff/8c438fcc9f19273b884b0c7498c74391c7546014</a></li>

<li>doc: Add WaitForBackgroundWorkerShutdown() to bgw docs. Commit 924bcf4f16d added WaitForBackgroundWorkerShutdown, but didn't add it to the documentation. Fix that and two small spelling errors in the WaitForBackgroundWorkerStartup paragraph. Author: Daniel Gustafsson Discussion: <a target="_blank" href="https://postgr.es/m/C8738949-0350-4999-A1DA-26E209FF248D@yesql.se">https://postgr.es/m/C8738949-0350-4999-A1DA-26E209FF248D@yesql.se</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a88609089ab84fc9f2a925bee31ec2e0c776d166">https://git.postgresql.org/pg/commitdiff/a88609089ab84fc9f2a925bee31ec2e0c776d166</a></li>

<li>doc: mention PROVE_TESTS in section of TAP tests. Author: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20180217140305.GB31338@paquier.xyz">https://postgr.es/m/20180217140305.GB31338@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9c4968469abe01a030307f49837fa2cf51fcdb4b">https://git.postgresql.org/pg/commitdiff/9c4968469abe01a030307f49837fa2cf51fcdb4b</a></li>

<li>pg_regress: Increase space available for test names. A few isolationtester tests with reasonable names are too wide to nicely align. Increase space. Author: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2v7+EHs6zsJzFn+zJOT4F4Kb69Z1xJ7Zf5kgwLr1n=VA@mail.gmail.com">https://postgr.es/m/CAEepm=2v7+EHs6zsJzFn+zJOT4F4Kb69Z1xJ7Zf5kgwLr1n=VA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1437824564f47e8e7641e98958a08c1544b6b8f4">https://git.postgresql.org/pg/commitdiff/1437824564f47e8e7641e98958a08c1544b6b8f4</a></li>

<li>Remove volatile qualifiers from shm_mq.c. Since commit 0709b7ee, spinlock primitives include a compiler barrier so it is no longer necessary to access either spinlocks or the memory they protect through pointer-to-volatile. Like earlier commits e93b6298, d53e3d5f, 430008b5, 8f6bb851, df4077cd. Author: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=204T37SxcHo4=xw5btho9jQ-=ZYYrVdcKyz82XYzMoqg@mail.gmail.com">https://postgr.es/m/CAEepm=204T37SxcHo4=xw5btho9jQ-=ZYYrVdcKyz82XYzMoqg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/07c6e5163e1f4ae12a3a6478788dd969f8f38cc9">https://git.postgresql.org/pg/commitdiff/07c6e5163e1f4ae12a3a6478788dd969f8f38cc9</a></li>

<li>Minor clean-up in dshash.{c,h}. For consistency with other code that deals in numbers of buckets, the macro BUCKETS_PER_PARTITION should produce a value of type size_t. Also, fix a mention of an obsolete proposed name for dshash.c that appeared in a comment. Author: Thomas Munro, based on an observation from Amit Kapila Discussion: <a target="_blank" href="https://postgr.es/m/CAA4eK1%2BBOp5aaW3aHEkg5Bptf8Ga_BkBnmA-%3DXcAXShs0yCiYQ%40mail.gmail.com">https://postgr.es/m/CAA4eK1%2BBOp5aaW3aHEkg5Bptf8Ga_BkBnmA-%3DXcAXShs0yCiYQ%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/17b340abf83d1b5f67808c45c63b9e0439569cef">https://git.postgresql.org/pg/commitdiff/17b340abf83d1b5f67808c45c63b9e0439569cef</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Document security implications of search_path and the public schema. The ability to create like-named objects in different schemas opens up the potential for users to change the behavior of other users' queries, maliciously or accidentally. When you connect to a PostgreSQL server, you should remove from your search_path any schema for which a user other than yourself or superusers holds the CREATE privilege. If you do not, other users holding CREATE privilege can redefine the behavior of your commands, causing them to perform arbitrary SQL statements under your identity. "SET search_path = ..." and "SELECT pg_catalog.set_config(...)" are not vulnerable to such hijacking, so one can use either as the first command of a session. As special exceptions, the following client applications behave as documented regardless of search_path settings and schema privileges: clusterdb createdb createlang createuser dropdb droplang dropuser ecpg (not programs it generates) initdb oid2name pg_archivecleanup pg_basebackup pg_config pg_controldata pg_ctl pg_dump pg_dumpall pg_isready pg_receivewal pg_recvlogical pg_resetwal pg_restore pg_rewind pg_standby pg_test_fsync pg_test_timing pg_upgrade pg_waldump reindexdb vacuumdb vacuumlo. Not included are core client programs that run user-specified SQL commands, namely psql and pgbench. PostgreSQL encourages non-core client applications to do likewise. Document this in the context of libpq connections, psql connections, dblink connections, ECPG connections, extension packaging, and schema usage patterns. The principal defense for applications is "SELECT pg_catalog.set_config('search_path', '', false)", and the principal defense for databases is "REVOKE CREATE ON SCHEMA public FROM PUBLIC". Either one is sufficient to prevent attack. After a REVOKE, consider auditing the public schema for objects named like pg_catalog objects. Authors of SECURITY DEFINER functions use some of the same defenses, and the CREATE FUNCTION reference page already covered them thoroughly. This is a good opportunity to audit SECURITY DEFINER functions for robust security practice. Back-patch to 9.3 (all supported versions). Reviewed by Michael Paquier and Jonathan S. Katz. Reported by Arseniy Sharoglazov. Security: CVE-2018-1058 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5770172cb0c9df9e6ce27c507b449557e5b45124">https://git.postgresql.org/pg/commitdiff/5770172cb0c9df9e6ce27c507b449557e5b45124</a></li>

<li>Empty search_path in Autovacuum and non-psql/pgbench clients. This makes the client programs behave as documented regardless of the connect-time search_path and regardless of user-created objects. Today, a malicious user with CREATE permission on a search_path schema can take control of certain of these clients' queries and invoke arbitrary SQL functions under the client identity, often a superuser. This is exploitable in the default configuration, where all users have CREATE privilege on schema "public". This changes behavior of user-defined code stored in the database, like pg_index.indexprs and pg_extension_config_dump(). If they reach code bearing unqualified names, "does not exist" or "no schema has been selected to create in" errors might appear. Users may fix such errors by schema-qualifying affected names. After upgrading, consider watching server logs for these errors. The --table arguments of src/bin/scripts clients have been lax; for example, "vacuumdb -Zt pg_am\;CHECKPOINT" performed a checkpoint. That now fails, but for now, "vacuumdb -Zt 'pg_am(amname);CHECKPOINT'" still performs a checkpoint. Back-patch to 9.3 (all supported versions). Reviewed by Tom Lane, though this fix strategy was not his first choice. Reported by Arseniy Sharoglazov. Security: CVE-2018-1058 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/582edc369cdbd348d68441fc50fa26a84afd0c1a">https://git.postgresql.org/pg/commitdiff/582edc369cdbd348d68441fc50fa26a84afd0c1a</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Improve tab-completion for ALTER INDEX RESET/SET. Author: Masahiko Sawada Discussion: <a target="_blank" href="https://postgr.es/m/CAD21AoDSGfB0G4egOy2UvBT=uihojuh-syxgSipj+XNkpWdVzQ@mail.gmail.com">https://postgr.es/m/CAD21AoDSGfB0G4egOy2UvBT=uihojuh-syxgSipj+XNkpWdVzQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2b8c94e1b4a86907fceef87840c32d3703f7e161">https://git.postgresql.org/pg/commitdiff/2b8c94e1b4a86907fceef87840c32d3703f7e161</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix msvc builds for ActivePerl &gt; 5.24. From this version ActivePerl ships both a .lib and a .a file for the perl library, which our code would detect as there being no library available. Instead, we should pick the .lib version and use that. Report and suggested fix in bug #15065 Author: Heath Lord <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7240962f8626ff09bb8f9e71ecdb074775bdd035">https://git.postgresql.org/pg/commitdiff/7240962f8626ff09bb8f9e71ecdb074775bdd035</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Ashutosh Bapat sent in another revision of a patch to improve the partition matching algorithm for partition-wise JOINs.</p>

<p>Ashutosh Bapat sent in a patch to optimize nested ConvertRowtypeExpr execution.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to implement custom compression methods.</p>

<p>Nikita Glukhov sent in another revision of a patch to implement SQL/JSON functions.</p>

<p>Nikita Glukhov sent in another revision of a patch to implement SQL/JSON JSON_TABLE.</p>

<p>Peter Eisentraut sent in another revision of a patch to add an ssl_passphrase_command setting, which enables specifying an external command for prompting for or otherwise obtaining passphrases for SSL key files.</p>

<p>Chapman Flack sent in a patch to add a regression test to numeric.sql that bits aren't lost casting from float[48] to numeric and updates float4_numeric and float8_numeric in a way that makes the test pass.</p>

<p>Takayuki Tsunakawa sent in two more revisions of a patch to fix a bug where pg_rewind takes a long time because it mistakenly copies data files.</p>

<p>Thomas Munro sent in another revision of a patch to enable parallel query with SERIALIZABLE isolation and enable the read-only SERIALIZABLE optimization for parallel query.</p>

<p>Nikita Glukhov sent in another revision of a patch to implement JSONPATH.</p>

<p>Claudio Freire sent in five more revisions of a patch to update the FSM more frequently during VACUUM.</p>

<p>Stephen Frost sent in a patch to rewrite the pg_dump TAP tests.</p>

<p>Jeevan Chalke and Rafia Sabih traded patches to implement partition-wise aggregation/grouping.</p>

<p>Amit Langote and Robert Haas traded patches to prune partitions faster.</p>

<p>Atsushi Torikoshi sent in a patch to fix a typo in walsender.c.</p>

<p>Etsuro Fujita sent in another revision of a patch to support tuple routing to foreign partitions.</p>

<p>David Steele sent in two more revisions of a patch to exclude unlogged tables from base backups.</p>

<p>Victor Wagner sent in two revisions of a patch to fix make variable processing in Mkvcbuild.pm.</p>

<p>Andrew Dunstan sent in two more revisions of a patch to speed up ALTER TABLE ... ADD COLUMN ... DEFAULT.</p>

<p>Pavan Deolasee sent in another revision of a patch to implement MERGE.</p>

<p>Amit Langote and David Rowley traded patches to prune partitions at runtime.</p>

<p>David Steele sent in another revision of a patch to make it possible to allow group filesystem access.</p>

<p>Nikita Glukhov sent in a patch to implement opclass parameters.</p>

<p>Alexander Korotkov sent in a patch to add a GUC for "cleanup indexes" threshold.</p>

<p>Ivan Kartyshov sent in another revision of a patch to fix some issues that crop up in long transactions on hot standby feedback replica.</p>

<p>Nikita Zhuchkov sent in a patch to create direct casts from numeric types to bool.</p>

<p>Antonin Houska sent in another revision of a patch to implement aggregate pushdown.</p>

<p>Peter Eisentraut sent in another revision of a patch to handle heap rewrites even better in logical decoding.</p>

<p>Peter Eisentraut sent in a patch to PL/pgSQL: to enable nested CALL with transactions.</p>

<p>Peter Eisentraut sent in a patch to support SET TRANSACTION to PL/pgsql.</p>

<p>Peter Eisentraut sent in a patch to support INOUT parameters in procedures in PL/pgsql.</p>

<p>Tom Lane sent in a patch to fix an issue where VPATH build from a tarball fails with some gmake versions.</p>

<p>Amit Langote sent in a patch to fix an issue where inserts into partitioned table may cause a crash.</p>

<p>Anastasia Lubennikova and Nikita Glukhov traded patches to add casts from JSONB to numeric and boolean types.</p>

<p>Anastasia Lubennikova sent in a patch to reduce amount of WAL generated by CREATE INDEX for GiST, GIN and SP-GiST.</p>

<p>Michael Banck sent in a patch to enable sending parallel dump to /dev/null.</p>

<p>Nikhil Sontakke sent in another revision of a patch to decode two-phase transactions.</p>

<p>David Steele sent in a patch to add re-initialization tests for unlogged tables.</p>

<p>Shubham Barai sent in another revision of a patch to implement predicate locking in GIN indexes.</p>

<p>Nikita Glukhov sent in another revision of a patch to support kNN for SP-GiST.</p>

<p>Masahiko Sawada sent in a patch to change the autovacuum launcher scheduling to an "oldest table first" algorithm.</p>

<p>Amit Langote and &Aacute;lvaro Herrera traded patches to implement ON CONFLICT DO UPDATE for partitioned tables.</p>

<p>Robert Haas sent in another revision of a patch to speed up processing at Gather nodes.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix an oddity in handling of WCO constraints in postgres_fdw.</p>

<p>Magnus Hagander and Daniel Gustafsson traded patches to enable online enabling of checksums.</p>

<p>Anastasia Lubennikova sent in a patch to add a function to track shmem reinit time.</p>

<p>Tomas Vondra sent in two revisions of a patch to fix an issue where user-defined numeric data types were triggering ERROR: unsupported type.</p>

<p>Michael Banck sent in a patch to verify checksums during basebackups.</p>

<p>Euler Taveira de Oliveira sent in a patch to remove unused #includes from test_decoding.</p>

<p>Peter Eisentraut sent in a patch to enable faster testing using symlinks.</p>

<p>Peter Eisentraut sent in a patch to fix more format truncation issues.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to produce a crash dump before main() on Windows.</p>

<p>Takayuki Tsunakawa sent in a patch to fix a bug where pg_rewind creates corrupt WAL files, making it so that the standby cannot catch up to the primary.</p>

<p>Amit Langote sent in a patch to avoid RelabelType in some cases in get_partition_operator().</p>

<p>Arseny Sher sent in a patch to use a single snapshot for replay.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement incremental sort.</p>

<p>Laurenz Albe sent in a patch to fix a bug where SHOW ALL does not honor pg_read_all_settings membership.</p>

<p>Peter Eisentraut sent in a patch to make CALL optional in PL/pgsql.</p>

<p>Daniel V&eacute;rit&eacute; sent in another revision of a patch to implement a CSV output format for psql.</p>

<p>Nikita Glukhov sent in another revision of a patch to add an enum reloption type.</p>

<p>Fabien COELHO sent in another revision of a patch to add \if to pgbench.</p>

<p>Curt Tilmes sent in two more revisions of a patch to find additional connection service files in the pg_service.conf.d directory.</p>

<p>Euler Taveira de Oliveira sent in a patch to enable row filtering in logical replication.</p>

<p>Peter Eisentraut sent in a patch to help manage transaction isolation in procedures by implementing the SQL standard "chained transactions" feature.</p>

<p>Thomas Munro sent in another revision of a patch to implement synchronous replay.</p>

<p>David Rowley sent in three more revisions of a patch to make it possible to parallelize string_agg and array_agg.</p>

<p>Masahiko Sawada sent in another revision of a patch to report autovac_workitem request failure.</p>

<p>David Rowley sent in a patch to fix an issue where pg_dump outputs invalid syntax for partitions with bool partkeys.</p>

<p>Thomas Munro sent in another revision of a patch to fix costing of parallel hash joins.</p>

<p>Emre Hasegeli sent in another revision of a patch to improve geometric types' use of floating point types.</p>

<p>Alexander Kuzmenkov sent in another revision of a patch to implement full merge join on comparison clause.</p>

<p>Andrey Borodin sent in another revision of a patch to fix GiST stats for partial indexes.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix a too-sensitive regression test for the PostgreSQL FDW.</p>

<p>Amit Kapila sent in a patch to increase the MAX_PAGE_TRANS_INFO_SLOTS constant in anticipation of zHeap.</p>

<p>Magnus Hagander and Tom Lane traded patches to fix some Perl code in the code base per perltidy.</p>

<p>Pavel St&#283;hule and Tomas Vondra traded patches to add additional extra checks for PL/pgsql.</p>

<p>David Rowley sent in another revision of a patch to add a STATISTICS option to CREATE TABLE ... LIKE ... INCLUDING.</p>

<p>Noriyoshi Shinoda sent in a patch to update the documentation for logical replication security.</p>

<p>Tomas Vondra sent in two more revisions of a patch to add a logical_work_mem to deal with logical streaming of large in-progress transactions.</p>

<p>Tomas Vondra sent in another revision of a patch to implement multivariate histograms and MCV lists.</p>

<p>Andres Freund sent in another revision of a patch to add parenthesized options syntax for ANALYZE and add a NOWAIT option to VACUUM and ANALYZE.</p>

<p>Tomas Vondra sent in another revision of a patch to implement BRIN multi-range indexes.</p>

<p>David Rowley sent in another revision of a patch to remove useless DISTINCT clauses.</p>

<p>Tomas Vondra sent in another revision of a patch to add support for uuid, bool, name, bpchar and anyrange types to btree_gin.</p>

<p>Thomas Munro sent in a patch to fix a select_parallel test failure where gather sometimes loses tuples.</p>

<p>David Rowley sent in another revision of a patch to disallow LEFT JOIN removal when join or base quals have volatile functions and allow LEFT JOINs to be removed in more cases.</p>

<p>Tom Lane sent in a patch to create an infrastructure for version-dependent tab completion in psql.</p>