---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 avril 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/04/17/Nouvelles-hebdomadaires-de-PostgreSQL-15-avril-2018"
---


<p>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018. Les inscriptions sont maintenant ouvertes. Programme&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/schedule/">https://www.pgcon.org/2018/schedule/</a></p>

<p>[ndt: PostgreSQL Meetup Nantes #10&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgmetrics 1.2, un outil en ligne de commande pour extraire et afficher les m&eacute;triques d'un serveur PostgreSQL&nbsp;: <a target="_blank" href="https://pgmetrics.io/">https://pgmetrics.io/</a></li>

<li>pgAdmin4 3.0, un centre de contr&ocirc;le pour PostgreSQL en web & GUI native&nbsp;: <a target="_blank" href="https://www.pgadmin.org/">https://www.pgadmin.org/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en avril</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-04/">http://archives.postgresql.org/pgsql-jobs/2018-04/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La conf&eacute;rence germanophone <em>PostgreSQL Conference 2018</em> aura lieu le 13 avril 2018 &agrave; Berlin&nbsp;: <a target="_blank" href="http://2018.pgconf.de/">http://2018.pgconf.de/</a></li>

<li>La <em>PGConfNepal 2018</em> se tiendra les 4 & 5 mai 2018 &agrave; l'universit&eacute; de Katmandou, Dulikhel, N&eacute;pal&nbsp;: <a target="_blank" href="https://postgresconf.org/conferences/Nepal2018">https://postgresconf.org/conferences/Nepal2018</a></li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril 2018, et les inscriptions sont ouvertes jusqu'au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180415211043.GA20361@fetter.org">http://www.postgresql.org/message-id/20180415211043.GA20361@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Stephen Frost pushed:</p>

<ul>

<li>Skip permissions test under MINGW/Windows. We don't support the same kind of permissions tests on Windows/MINGW, so these tests really shouldn't be getting run on that platform. Per buildfarm. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9d0383c015aabd7565f3df010a5ff56b46aa8756">https://git.postgresql.org/pg/commitdiff/9d0383c015aabd7565f3df010a5ff56b46aa8756</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Remove repeated test in contrib/amcheck. Repeating these tests adds unnecessary cycles, since no improvement in test coverage is expected. Cleanup from commit 8224de4f42ccf98e08db07b43d52fed72f962ebb. Peter Geoghegan <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1671c01650d2cf9398b2e5ff87be2e2fd03781b7">https://git.postgresql.org/pg/commitdiff/1671c01650d2cf9398b2e5ff87be2e2fd03781b7</a></li>

<li>Improve covering index documentation. Add missed description of pg_constraint.conincluding Shinoda, Noriyoshi and Alexander Korotkov <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/03c11796a95cc20a4559a103019d4d22a116a13c">https://git.postgresql.org/pg/commitdiff/03c11796a95cc20a4559a103019d4d22a116a13c</a></li>

<li>Temporary revert 5c6110c6a960ad6fe1b0d0fec6ae36ef4eb913f5. It discovers one more bug in CompareIndexInfo(), should be fixed first. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/92899992e13a089fb8915b02e45792998996530e">https://git.postgresql.org/pg/commitdiff/92899992e13a089fb8915b02e45792998996530e</a></li>

<li>Fix interference between cavering indexes and partitioned tables. The bug is caused due to the original IndexStmt that DefineIndex receives being overwritten when processing the INCLUDE columns. Use separate list of index params to propagate to child tables. Add tests covering this case. Amit Langote and Alexander Korotkov. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5c6110c6a960ad6fe1b0d0fec6ae36ef4eb913f5">https://git.postgresql.org/pg/commitdiff/5c6110c6a960ad6fe1b0d0fec6ae36ef4eb913f5</a></li>

<li>Rename IndexInfo.ii_KeyAttrNumbers array. Rename ii_KeyAttrNumbers to ii_IndexAttrNumbers to prevent confusion with ii_NumIndexAttrs/ii_NumIndexKeyAttrs. ii_IndexAttrNumbers contains all attributes including "including" columns, not only key attribute. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/13123421-1d52-d0e4-c95c-6d69011e0595%40sigaev.ru">https://www.postgresql.org/message-id/13123421-1d52-d0e4-c95c-6d69011e0595%40sigaev.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c9c875a28fa6cbc38c227fb9e656dd7be948166f">https://git.postgresql.org/pg/commitdiff/c9c875a28fa6cbc38c227fb9e656dd7be948166f</a></li>

<li>Cleanup covering infrastructure. * Explicitly forbids opclass, collation and indoptions (like DESC/ASC etc) for including columns. Throw an error if user points that. * Truncated storage arrays for such attributes to store only key atrributes, added assertion checks. * Do not check opfamily and collation for including columns in CompareIndexInfo() Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/5ee72852-3c4e-ee35-e2ed-c1d053d45c08@sigaev.ru">https://www.postgresql.org/message-id/5ee72852-3c4e-ee35-e2ed-c1d053d45c08@sigaev.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c266ed31a8a3beed3533e6a78faeca78234cbd43">https://git.postgresql.org/pg/commitdiff/c266ed31a8a3beed3533e6a78faeca78234cbd43</a></li>

<li>Fix interference between covering indexes and partitioned tables. The bug is caused due to the original IndexStmt that DefineIndex receives being overwritten when processing the INCLUDE columns. Use separate list of index params to propagate to child tables. Add tests covering this case. Amit Langote and Alexander Korotkov. Re-commit 5c6110c6a960ad6fe1b0d0fec6ae36ef4eb913f5 because it discovered a bug fixed in c266ed31a8a3beed3533e6a78faeca78234cbd43 Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAJGNTeO%3DBguEyG8wxMpU_Vgvg3nGGzy71zUQ0RpzEn_mb0bSWA%40mail.gmail.com">https://www.postgresql.org/message-id/CAJGNTeO%3DBguEyG8wxMpU_Vgvg3nGGzy71zUQ0RpzEn_mb0bSWA%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/524054598fd300c75007f53aebd67f9ced33b7db">https://git.postgresql.org/pg/commitdiff/524054598fd300c75007f53aebd67f9ced33b7db</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix typo in comment. Author: Kyotaro Horiguchi <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2c19ea863a27303f462485c4046a850864e638b8">https://git.postgresql.org/pg/commitdiff/2c19ea863a27303f462485c4046a850864e638b8</a></li>

<li>Fix comment on B-tree insertion fastpath condition. The comment earlier in the function correctly states "and the insertion key is strictly greater than the first key in this page". That is what we check here, not "greater than or equal". <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/29d7ebf51ee33e1711fc9681f273f3de2da76ebf">https://git.postgresql.org/pg/commitdiff/29d7ebf51ee33e1711fc9681f273f3de2da76ebf</a></li>

<li>Allocate enough shared string memory for stats of auxiliary processes. This fixes a bug whereby the st_appname, st_clienthostname, and st_activity_raw fields for auxiliary processes point beyond the end of their respective shared memory segments. As a result, the application_name of a backend might show up as the client hostname of an auxiliary process. Backpatch to v10, where this bug was introduced, when the auxiliary processes were added to the array. Author: Edmund Horner Reviewed-by: Michael Paquier Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAMyN-kA7aOJzBmrYFdXcc7Z0NmW%2B5jBaf_m%3D_-77uRNyKC9r%3DA%40mail.gmail.com">https://www.postgresql.org/message-id/CAMyN-kA7aOJzBmrYFdXcc7Z0NmW%2B5jBaf_m%3D_-77uRNyKC9r%3DA%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/811969b218ac2e8030dfbbb05873344967461618">https://git.postgresql.org/pg/commitdiff/811969b218ac2e8030dfbbb05873344967461618</a></li>

<li>Make local copy of client hostnames in backend status array. The other strings, application_name and query string, were snapshotted to local memory in pgstat_read_current_status(), but we forgot to do that for client hostnames. As a result, the client hostname would appear to change in the local copy, if the client disconnected. Backpatch to all supported versions. Author: Edmund Horner Reviewed-by: Michael Paquier Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAMyN-kA7aOJzBmrYFdXcc7Z0NmW%2B5jBaf_m%3D_-77uRNyKC9r%3DA%40mail.gmail.com">https://www.postgresql.org/message-id/CAMyN-kA7aOJzBmrYFdXcc7Z0NmW%2B5jBaf_m%3D_-77uRNyKC9r%3DA%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a820b4c32946c499a2d19846123840a0dad071b5">https://git.postgresql.org/pg/commitdiff/a820b4c32946c499a2d19846123840a0dad071b5</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Add missed bms_copy() in perform_pruning_combine_step. We were initializing a BMS to merely reference an existing one, which would cause a double-free (and a crash) when the recursive algorithm tried to intersect it with an empty one. Fix it by creating a copy at initialization time. Reported-by: sqlsmith (by way of Andreas Seltenreich) Author: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/87in923lyw.fsf@ansel.ydns.eu">https://postgr.es/m/87in923lyw.fsf@ansel.ydns.eu</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7ba6ee815dc90d4fab7226d343bf72aa28c9aa5c">https://git.postgresql.org/pg/commitdiff/7ba6ee815dc90d4fab7226d343bf72aa28c9aa5c</a></li>

<li>Minor comment updates. Fix a couple of typos, and update a comment about why we set a BMS to NULL. Author: David Rowley Discussion: <a target="_blank" href="http://postgr.es/m/CAKJS1f-tux=KdUz6ENJ9GHM_V2qgxysadYiOyQS9Ko9PTteVhQ@mail.gmail.com">http://postgr.es/m/CAKJS1f-tux=KdUz6ENJ9GHM_V2qgxysadYiOyQS9Ko9PTteVhQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d7a95f06a1a125fd82b87d01d9a9d8cf9c081799">https://git.postgresql.org/pg/commitdiff/d7a95f06a1a125fd82b87d01d9a9d8cf9c081799</a></li>

<li>Fix incorrect logic for choosing the next Parallel Append subplan. In 499be013de support for pruning unneeded Append subnodes was added. The logic in that commit was not correctly checking if the next subplan was in fact a valid subplan. This could cause parallel workers processes to be given a subplan to work on which didn't require any work. Per code review following an otherwise unexplained regression failure in buildfarm member Pademelon. (We haven't been able to reproduce the failure, so this is a bit of a blind fix in terms of whether it'll actually fix it; but it is a clear bug nonetheless). In passing, also add a comment to explain what first_partial_plan means. Author: David Rowley Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f_E5r05hHUVG3UmCQJ49DGKKHtN=SHybD44LdzBn+CJng@mail.gmail.com">https://postgr.es/m/CAKJS1f_E5r05hHUVG3UmCQJ49DGKKHtN=SHybD44LdzBn+CJng@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/468abb8f7a69c68341b6fc2797166d1079acb1b1">https://git.postgresql.org/pg/commitdiff/468abb8f7a69c68341b6fc2797166d1079acb1b1</a></li>

<li>Fix IndexOnlyScan counter for heap fetches in parallel mode. The HeapFetches counter was using a simple value in IndexOnlyScanState, which fails to propagate values from parallel workers; so the counts are wrong when IndexOnlyScan runs in parallel. Move it to Instrumentation, like all the other counters. While at it, change INSERT ON CONFLICT conflicting tuple counter to use the new ntuples2 instead of nfiltered2, which is a blatant misuse. Discussion: <a target="_blank" href="https://postgr.es/m/20180409215851.idwc75ct2bzi6tea@alvherre.pgsql">https://postgr.es/m/20180409215851.idwc75ct2bzi6tea@alvherre.pgsql</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/15a8f8caad14c1f85b23d97842d0c27b106cc10e">https://git.postgresql.org/pg/commitdiff/15a8f8caad14c1f85b23d97842d0c27b106cc10e</a></li>

<li>Fix ALTER TABLE .. ATTACH PARTITION ... DEFAULT. If the table being attached contained values that contradict the default partition's partition constraint, it would fail to complain, because CommandCounterIncrement changes in 4dba331cb3dc coupled with some bogus coding in the existing ValidatePartitionConstraints prevented the partition constraint from being validated after all -- or rather, it caused to constraint to become an empty one, always succeeding. Fix by not re-reading the OID of the default partition in ATExecAttachPartition. To forestall similar problems, revise the existing code: * rename routine from ValidatePartitionConstraints() to QueuePartitionConstraintValidation, to better represent what it actually does. * add an Assert() to make sure that when queueing a constraint for a partition we're not overwriting a constraint previously queued. * add an Assert() that we don't try to invoke the special-purpose validation of the default partition when attaching the default partition itself. While at it, change some loops to obtain partition OIDs from partdesc-&gt;oids rather than find_all_inheritors; reduce the lock level of partitions being scanned from AccessExclusiveLock to ShareLock; rewrite QueuePartitionConstraintValidation in a recursive fashion rather than repetitive. Author: &#65533;lvaro Herrera. Tests written by Amit Langote Reported-by: Rushabh Lathia Diagnosed-by: Kyotaro HORIGUCHI, who also provided the initial fix. Reviewed-by: Kyotaro HORIGUCHI, Amit Langote, Jeevan Ladhe Discussion: <a target="_blank" href="https://postgr.es/m/CAGPqQf0W+v-Ci_qNV_5R3A=Z9LsK4+jO7LzgddRncpp_rrnJqQ@mail.gmail.com">https://postgr.es/m/CAGPqQf0W+v-Ci_qNV_5R3A=Z9LsK4+jO7LzgddRncpp_rrnJqQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/72cf7f310c0729a331f321fad39835ac886603dc">https://git.postgresql.org/pg/commitdiff/72cf7f310c0729a331f321fad39835ac886603dc</a></li>

<li>Set relispartition correctly for index partitions. Oversight in commit 8b08f7d4820f: pg_class.relispartition was not being set for index partitions, which is a bit odd, and was also causing the code to unnecessarily call has_superclass() when simply checking the flag was enough. Author: &#65533;lvaro Herrera Reported-by: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/12085bc4-0bc6-0f3a-4c43-57fe0681772b@lab.ntt.co.jp">https://postgr.es/m/12085bc4-0bc6-0f3a-4c43-57fe0681772b@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9e9befac4a2228ae8a5309900645ecd8ead69f53">https://git.postgresql.org/pg/commitdiff/9e9befac4a2228ae8a5309900645ecd8ead69f53</a></li>

<li>Use the right memory context for partkey's FmgrInfo. We were using CurrentMemoryContext to put the partsupfunc fmgr_info into, which isn't right, because we want the PartitionKey as a whole to be in the isolated Relation-&gt;rd_partkeycxt context. This can cause a crash with user-defined support functions in the operator classes used by partitioning keys. (Maybe this can cause problems with core-supplied opclasses too, not sure.) This is demonstrably broken in Postgres 10, too, but the initial proposed fix runs afoul of a problem discussed back when 8a0596cb656e ("Get rid of copy_partition_key") reorganized that code: namely that it is possible to jump out of RelationBuildPartitionKey because of some error and leave a dangling memory context child of CacheMemoryContext. Also, while reviewing this I noticed that the removed-in-pg11 copy_partition_key was doing something wrong, unfixed in pg10, namely doing memcpy() on the FmgrInfo, which is bogus (should be doing fmgr_info_copy). Therefore, in branch pg10, the sane fix seems to be to backpatch both the aforementioned 8a0596cb656e and its followup be2343221fb7 ("Protect against hypothetical memory leaks in RelationGetPartitionKey"), so do that, then apply the fmgr_info memcxt bugfix on top. Add a test case exercising btree-based custom operator classes, which causes a crash prior to this fix. This is not a security problem, because in order to create an operator class you need superuser privileges anyway. Authors: &#65533;lvaro Herrera and Amit Langote Reported and diagnosed by: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/3041e853-b1dd-a0c6-ff21-7cc5633bffd0@lab.ntt.co.jp">https://postgr.es/m/3041e853-b1dd-a0c6-ff21-7cc5633bffd0@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a4d56f583e7cff052c2699e62d867ae1c8fda4f3">https://git.postgresql.org/pg/commitdiff/a4d56f583e7cff052c2699e62d867ae1c8fda4f3</a></li>

<li>Add comment about default partition in check_new_partition_bound. The intention of the test is not immediately obvious, so we need this much. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/181ccbb5e49cdc628e0c8334a9ed57dbc736efe8">https://git.postgresql.org/pg/commitdiff/181ccbb5e49cdc628e0c8334a9ed57dbc736efe8</a></li>

<li>Revert lowering of lock level for ATTACH PARTITION. I lowered the lock level for partitions being scanned from AccessExclusive to ShareLock in the course of 72cf7f310c07, but that was bogus, as pointed out by Robert Haas. Revert that bit. Doing this is possible, but requires more work. Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmobV7Nfmqv+TZXcdSsb9Bjc-OL-Anv6BNmCbfJVZLYPE4Q@mail.gmail.com">https://postgr.es/m/CA+TgmobV7Nfmqv+TZXcdSsb9Bjc-OL-Anv6BNmCbfJVZLYPE4Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b8ca984b2c739e096c08f260f477792495f4dfe4">https://git.postgresql.org/pg/commitdiff/b8ca984b2c739e096c08f260f477792495f4dfe4</a></li>

<li>Attempt to stabilize partition_prune test output (2). Environmental conditions might cause parallel workers to be scheduled in different ways in this test, destabilizing the EXPLAIN output. Disable use of workers in an attempt to make output stable. Author: David Rowley Diagnosed-by: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f8j24tUX_nOwACiM=UO5jrMrDz8ca0xbG0vhVgfWph0ZA@mail.gmail.com">https://postgr.es/m/CAKJS1f8j24tUX_nOwACiM=UO5jrMrDz8ca0xbG0vhVgfWph0ZA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4d0f6d3f207d977d3685499263993206b56d425a">https://git.postgresql.org/pg/commitdiff/4d0f6d3f207d977d3685499263993206b56d425a</a></li>

<li>Use custom hash opclass for hash partition pruning. This custom opclass was already in use in other tests -- defined independently in every such file. Move the definition to the earliest test that uses it, and keep it around so that later tests can reuse it. Use it in the tests for pruning of hash partitioning, and since this makes the second expected file unnecessary, put those tests back in partition_prune.sql whence they sprang. Author: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/CA%2BTgmoZ0D5kJbt8eKXtvVdvTcGGWn6ehWCRSZbWytD-uzH92mQ%40mail.gmail.com">https://postgr.es/m/CA%2BTgmoZ0D5kJbt8eKXtvVdvTcGGWn6ehWCRSZbWytD-uzH92mQ%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fafec4cce814b9b15991b62520dc5e5e84655a8a">https://git.postgresql.org/pg/commitdiff/fafec4cce814b9b15991b62520dc5e5e84655a8a</a></li>

<li>List src/include/partitioning in src/include/Makefile. This omission prevented partitioning header files from being installed. Per buildfarm member crake. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4d64abc2feed10b8a8dd03181dfa3b0f9aa00c33">https://git.postgresql.org/pg/commitdiff/4d64abc2feed10b8a8dd03181dfa3b0f9aa00c33</a></li>

<li>Reorganize partitioning code. There's been a massive addition of partitioning code in PostgreSQL 11, with little oversight on its placement, resulting in a catalog/partition.c with poorly defined boundaries and responsibilities. This commit tries to set a couple of distinct modules to separate things a little bit. There are no code changes here, only code movement. There are three new files: src/backend/utils/cache/partcache.c src/include/partitioning/partdefs.h src/include/utils/partcache.h The previous arrangement of #including catalog/partition.h almost everywhere is no more. Authors: Amit Langote and &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/98e8d509-790a-128c-be7f-e48a5b2d8d97@lab.ntt.co.jp">https://postgr.es/m/98e8d509-790a-128c-be7f-e48a5b2d8d97@lab.ntt.co.jp</a> <a target="_blank" href="https://postgr.es/m/11aa0c50-316b-18bb-722d-c23814f39059@lab.ntt.co.jp">https://postgr.es/m/11aa0c50-316b-18bb-722d-c23814f39059@lab.ntt.co.jp</a> <a target="_blank" href="https://postgr.es/m/143ed9a4-6038-76d4-9a55-502035815e68@lab.ntt.co.jp">https://postgr.es/m/143ed9a4-6038-76d4-9a55-502035815e68@lab.ntt.co.jp</a> <a target="_blank" href="https://postgr.es/m/20180413193503.nynq7bnmgh6vs5vm@alvherre.pgsql">https://postgr.es/m/20180413193503.nynq7bnmgh6vs5vm@alvherre.pgsql</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/da6f3e45ddb68ab3161076e120e7c32cfd46d1db">https://git.postgresql.org/pg/commitdiff/da6f3e45ddb68ab3161076e120e7c32cfd46d1db</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Revert "Allow on-line enabling and disabling of data checksums". This reverts the backend sides of commit 1fde38beaa0c3e66c340efc7cc0dc272d6254bb0. I have, at least for now, left the pg_verify_checksums tool in place, as this tool can be very valuable without the rest of the patch as well, and since it's a read-only tool that only runs when the cluster is down it should be a lot safer. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a228cc13aeabff308d6dfc98a1015865f5393fce">https://git.postgresql.org/pg/commitdiff/a228cc13aeabff308d6dfc98a1015865f5393fce</a></li>

<li>catversion bump for online-checksums revert. Lack thereof pointed out by Tom Lane. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f5543d47bcb2fee2ab69220f51e2078c11e19843">https://git.postgresql.org/pg/commitdiff/f5543d47bcb2fee2ab69220f51e2078c11e19843</a></li>

<li>Make sure pg_rewind can't run as root. Previously a warning was printed, but the tool actually kept running even when running as root. This is something we definitely want to prevent, but since this means a behavior change, not backpatching. Author: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5d5aeddabfe0b6b21f556c72a71e0454833d63e5">https://git.postgresql.org/pg/commitdiff/5d5aeddabfe0b6b21f556c72a71e0454833d63e5</a></li>

<li>Silence some warnings in TAP tests. Author: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d7754822c52ccb6dfb1c29607ae352c2028979d2">https://git.postgresql.org/pg/commitdiff/d7754822c52ccb6dfb1c29607ae352c2028979d2</a></li>

<li>Remove -f option from pg_verify_checksums. This option makes no sense when the cluster checksum state cannot be changed, and should have been removed in the revert. Author: Daniel Gustafsson Review: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/44e2df461fa57d99e3547eab49e48d5150540aab">https://git.postgresql.org/pg/commitdiff/44e2df461fa57d99e3547eab49e48d5150540aab</a></li>

<li>Clarify pg_verify_checksum documentation. Make it clear that a cluster has to be shut down cleanly before pg_verify_checksum can be run against it. Author: Michael Paquier Review: Daniel Gustafsson <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/645387927f83d31b8f1272876c1f8db3bc3b4f45">https://git.postgresql.org/pg/commitdiff/645387927f83d31b8f1272876c1f8db3bc3b4f45</a></li>

<li>Fix build of pg_verify_checksum docs. They were accidentally excluded when reverting the backend online checksum functionality, and since they weren't built the incorrect reference to a removed section also did not trigger a problem. Author: Christoph Berg <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/90372729f4671ad5ad743b53a53e7ccbab92c4f8">https://git.postgresql.org/pg/commitdiff/90372729f4671ad5ad743b53a53e7ccbab92c4f8</a></li>

<li>Don't attempt to verify checksums on new pages. Teach both base backups and pg_verify_checksums that if a page is new, it does not have a checksum yet, so it shouldn't be verified. Noted by Tomas Vondra, review by David Steele. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/33cedf1474a356fe510d4ad32c040c968ef27307">https://git.postgresql.org/pg/commitdiff/33cedf1474a356fe510d4ad32c040c968ef27307</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Further cleanup of client dependencies on src/include/catalog headers. In commit 9c0a0de4c, I'd failed to notice that catalog/catalog.h should also be considered a frontend-unsafe header, because it includes (and needs) the full form of pg_class.h, not to mention relcache.h. However, various frontend code was depending on it to get TABLESPACE_VERSION_DIRECTORY, so refactoring of some sort is called for. The cleanest answer seems to be to move TABLESPACE_VERSION_DIRECTORY, as well as the OIDCHARS symbol, to common/relpath.h. Do that, and mop up inclusions as necessary. (I found that quite a few current users of catalog/catalog.h don't seem to need it at all anymore, apparently as a result of the refactorings that created common/relpath.[hc]. And initdb.c needed it only as a route to pg_class_d.h.) Discussion: <a target="_blank" href="https://postgr.es/m/6629.1523294509@sss.pgh.pa.us">https://postgr.es/m/6629.1523294509@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/af1a949109d8212711df943c053b1038c0afdae1">https://git.postgresql.org/pg/commitdiff/af1a949109d8212711df943c053b1038c0afdae1</a></li>

<li>Reduce chattiness of genbki.pl and Gen_fmgrtab.pl. Make these scripts emit just one log message when they run, not one per output file. The latter is way too verbose in the wake of commit 372728b0d. The specific wording used is what already existed in the MSVC scripts. John Naylor Discussion: <a target="_blank" href="https://postgr.es/m/11103.1523208822@sss.pgh.pa.us">https://postgr.es/m/11103.1523208822@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a65e17bd6fdac1b11e0c82764955c0b805251937">https://git.postgresql.org/pg/commitdiff/a65e17bd6fdac1b11e0c82764955c0b805251937</a></li>

<li>Make reformat_dat_file.pl preserve all blank lines. In its original form, reformat_dat_file.pl smashed consecutive blank lines to a single blank line, which was helpful for mopping up excess whitespace during the bootstrap data format conversion. But going forward, there seems little reason to do that; if developers want to put in multiple blank lines, let 'em. This makes it conform to the documentation I (tgl) wrote, too. In passing, clean up some sloppy markup choices in bki.sgml. John Naylor Discussion: <a target="_blank" href="https://postgr.es/m/28827.1523039259@sss.pgh.pa.us">https://postgr.es/m/28827.1523039259@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2cdf359fc4471c488fbb0dbd31678d78c3c1043b">https://git.postgresql.org/pg/commitdiff/2cdf359fc4471c488fbb0dbd31678d78c3c1043b</a></li>

<li>Fix partial-build problems introduced by having more generated headers. Commit 372728b0d created some problems for usages like building a subdirectory without having first done "make all" at the top level, or for proceeding directly to "make install" without "make all". The only reasonably clean way to fix this seems to be to force the submake-generated-headers rule to fire in *any* "make all" or "make install" command anywhere in the tree. To avoid lots of redundant work, as well as parallel make jobs possibly clobbering each others' output, we still need to be sure that the rule fires only once in a recursive build. For that, adopt the same MAKELEVEL hack previously used for "temp-install". But try to document it a bit better. The submake-errcodes mechanism previously used in src/port/ and src/common/ is subsumed by this, so we can get rid of those special cases. It was inadequate for src/common/ anyway after the aforesaid commit, and it always risked parallel attempts to build errcodes.h. Discussion: <a target="_blank" href="https://postgr.es/m/E1f5FAB-0006LU-MB@gemulon.postgresql.org">https://postgr.es/m/E1f5FAB-0006LU-MB@gemulon.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3b8f6e75f3c8c6d192621f21624cc8cee04ec3cb">https://git.postgresql.org/pg/commitdiff/3b8f6e75f3c8c6d192621f21624cc8cee04ec3cb</a></li>

<li>Fix pgxs.mk to not try to build generated headers in external builds. Per Julien Rouhaud and the buildfarm. This is not quite Julien's patch: there's no need to lobotomize this build rule when building contrib modules in-tree, so set NO_GENERATED_HEADERS only if PGXS. In passing, also set NO_TEMP_INSTALL in external builds. This doesn't seem to be fixing any live bug, because "make check" in an external build just produces the expected error message without first trying to make a temp install ... but it's far from obvious why it doesn't, so this change seems like good future-proofing. Julien Rouhaud and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAOBaU_YH=g68opbbMk8is3jNwhoXGa8ckRSre1nx0Obe1C7i-Q@mail.gmail.com">https://postgr.es/m/CAOBaU_YH=g68opbbMk8is3jNwhoXGa8ckRSre1nx0Obe1C7i-Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1a40485af6e43be501500a88b1b9765cc0d69c0b">https://git.postgresql.org/pg/commitdiff/1a40485af6e43be501500a88b1b9765cc0d69c0b</a></li>

<li>Put back parallel-safety guards in plpython and src/test/regress/. I'd hoped that commit 3b8f6e75f was sufficient to ensure parallel safety even when a build started in a subdirectory requires rebuilding of generated headers. This isn't so, because making submake-generated-headers a prerequisite of "all" isn't enough to ensure it's completed before starting on "all"'s other prerequisites. The explicit dependencies we put on the recursive make targets ensure safe ordering before we recurse into child directories, but they don't protect targets to be made in the current directory. Hence, put back some ordering dependencies in directories that we've traditionally expected to be starting points for "standalone" builds, to wit src/pl/plpython and src/test/regress. (The former needs this in order to minimize the work involved in building for both python 2 and python 3; the latter to support packagings that make the regression tests available for out-of-build-tree execution.) Adjust some other dependencies so that these two cases work correctly even at high -j settings. I'm not terribly happy with this partial solution, but I don't see a way to do better without massive makefile restructuring, which we surely aren't doing at this point in the development cycle. In any case, it's little if any worse than what we had in prior releases. Discussion: <a target="_blank" href="https://postgr.es/m/1523353963.8169.26.camel@gunduz.org">https://postgr.es/m/1523353963.8169.26.camel@gunduz.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/31f1f0bb4fd642643994d35c35ecb5b929711a99">https://git.postgresql.org/pg/commitdiff/31f1f0bb4fd642643994d35c35ecb5b929711a99</a></li>

<li>Fix incorrect close() call in dsm_impl_mmap(). One improbable error-exit path in this function used close() where it should have used CloseTransientFile(). This is unlikely to be hit in the field, and I think the consequences wouldn't be awful (just an elog(LOG) bleat later). But a bug is a bug, so back-patch to 9.4 where this code came in. Pan Bian Discussion: <a target="_blank" href="https://postgr.es/m/152056616579.4966.583293218357089052@wrigleys.postgresql.org">https://postgr.es/m/152056616579.4966.583293218357089052@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/231bcd0803eb91c526d4e7522c993fa5ed71bd45">https://git.postgresql.org/pg/commitdiff/231bcd0803eb91c526d4e7522c993fa5ed71bd45</a></li>

<li>Invoke submake-generated-headers during "make check", too. The MAKELEVEL hack to prevent submake-generated-headers from doing anything in child make runs means that we have to explicitly invoke it at top level for "make check", too, in case somebody proceeds directly to that without an explicit "make all". (I think this usage had parallel-make hazards even before the addition of more generated headers; but it was totally broken as of 3b8f6e75f.) Out of paranoia, force the submake-libpq target to depend on submake-generated-headers, too. This seems to not be absolutely necessary today, but it's not really saving us anything to omit the ordering dependency, and it'll likely break someday without it. Discussion: <a target="_blank" href="https://postgr.es/m/20180411103930.GB31461@momjian.us">https://postgr.es/m/20180411103930.GB31461@momjian.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cee83ef4a243c87683a4f472bab0e005b8b56f3c">https://git.postgresql.org/pg/commitdiff/cee83ef4a243c87683a4f472bab0e005b8b56f3c</a></li>

<li>Do not select new object OIDs that match recently-dead entries. When selecting a new OID, we take care to avoid picking one that's already in use in the target table, so as not to create duplicates after the OID counter has wrapped around. However, up to now we used SnapshotDirty when scanning for pre-existing entries. That ignores committed-dead rows, so that we could select an OID matching a deleted-but-not-yet-vacuumed row. While that mostly worked, it has two problems: * If recently deleted, the dead row might still be visible to MVCC snapshots, creating a risk for duplicate OIDs when examining the catalogs within our own transaction. Such duplication couldn't be visible outside the object-creating transaction, though, and we've heard few if any field reports corresponding to such a symptom. * When selecting a TOAST OID, deleted toast rows definitely *are* visible to SnapshotToast, and will remain so until vacuumed away. This leads to a conflict that will manifest in errors like "unexpected chunk number 0 (expected 1) for toast value nnnnn". We've been seeing reports of such errors from the field for years, but the cause was unclear before. The fix is simple: just use SnapshotAny to search for conflicting rows. This results in a slightly longer window before object OIDs can be recycled, but that seems unlikely to create any large problems. Pavan Deolasee Discussion: <a target="_blank" href="https://postgr.es/m/CABOikdOgWT2hHkYG3Wwo2cyZJq2zfs1FH0FgX-=h4OLosXHf9w@mail.gmail.com">https://postgr.es/m/CABOikdOgWT2hHkYG3Wwo2cyZJq2zfs1FH0FgX-=h4OLosXHf9w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0408e1ed599b06d9bca2927a50a4be52c9e74bb9">https://git.postgresql.org/pg/commitdiff/0408e1ed599b06d9bca2927a50a4be52c9e74bb9</a></li>

<li>Ignore nextOid when replaying an ONLINE checkpoint. The nextOid value is from the start of the checkpoint and may well be stale compared to values from more recent XLOG_NEXTOID records. Previously, we adopted it anyway, allowing the OID counter to go backwards during a crash. While this should be harmless, it contributed to the severity of the bug fixed in commit 0408e1ed5, by allowing duplicate TOAST OIDs to be assigned immediately following a crash. Without this error, that issue would only have arisen when TOAST objects just younger than a multiple of 2^32 OIDs were deleted and then not vacuumed in time to avoid a conflict. Pavan Deolasee Discussion: <a target="_blank" href="https://postgr.es/m/CABOikdOgWT2hHkYG3Wwo2cyZJq2zfs1FH0FgX-=h4OLosXHf9w@mail.gmail.com">https://postgr.es/m/CABOikdOgWT2hHkYG3Wwo2cyZJq2zfs1FH0FgX-=h4OLosXHf9w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d1e9079295e9e6fcab8f2ad9c69dd1be8e876d47">https://git.postgresql.org/pg/commitdiff/d1e9079295e9e6fcab8f2ad9c69dd1be8e876d47</a></li>

<li>Fix YA parallel-make hazard, this one in "make check" in plpython. We have to ensure that submake-generated-headers is finished before the topmost make run launches any child makes. Discussion: <a target="_blank" href="https://postgr.es/m/20180411235843.GG32449@paquier.xyz">https://postgr.es/m/20180411235843.GG32449@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3e110a373b8102221af5436434441cd20eeb68fa">https://git.postgresql.org/pg/commitdiff/3e110a373b8102221af5436434441cd20eeb68fa</a></li>

<li>YA attempt to stabilize the results of the postgres_fdw regression test. We've made multiple attempts to stabilize the plans shown by commit 1bc0100d2, with little success so far. The reason for the remaining instability seems to be that if a transaction (such as auto-analyze) is running concurrently with the test, then get_actual_variable_range may return a maximum value for "T 1"."C 1" that's far away from the actual max, as a result of our having transiently inserted such a value earlier in the test. Because we use a non-MVCC snapshot to fetch the value (for performance reasons), the presence of other transactions can cause that function to return entries that are actually dead. To fix, use a less extreme value in the earlier transient insertion, so that whether it is visible or not won't affect the selectivity estimate. The use of 9999 there seems to have been picked with the aid of a dartboard anyway, rather than having a specific reason. Discussion: <a target="_blank" href="https://postgr.es/m/16962.1523551784@sss.pgh.pa.us">https://postgr.es/m/16962.1523551784@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2fe977712c7375ccb1b6ddf7dfb234d0db903f16">https://git.postgresql.org/pg/commitdiff/2fe977712c7375ccb1b6ddf7dfb234d0db903f16</a></li>

<li>Fix bogus affix-merging code. NISortAffixes() compared successive compound affixes incorrectly, thus possibly failing to merge identical affixes, or (less likely) merging ones that shouldn't be merged. The user-visible effects of this are unclear, to me anyway. Per bug #15150 from Alexander Lakhin. It's been broken for a long time, so back-patch to all supported branches. Arthur Zakirov Discussion: <a target="_blank" href="https://postgr.es/m/152353327780.31225.13445405496721177988@wrigleys.postgresql.org">https://postgr.es/m/152353327780.31225.13445405496721177988@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/65a69dfa08e212556d11e44a5a8a1861fd826ccd">https://git.postgresql.org/pg/commitdiff/65a69dfa08e212556d11e44a5a8a1861fd826ccd</a></li>

<li>In libpq, free any partial query result before collecting a server error. We'd throw away the partial result anyway after parsing the error message. Throwing it away beforehand costs nothing and reduces the risk of out-of-memory failure. Also, at least in systems that behave like glibc/Linux, if the partial result was very large then the error PGresult would get allocated at high heap addresses, preventing the heap storage used by the partial result from being released to the OS until the error PGresult is freed. In psql &gt;= 9.6, we hold onto the error PGresult until another error is received (for \errverbose), so that this behavior causes a seeming memory leak to persist for awhile, as in a recent complaint from Darafei Praliaskouski. This is a potential performance regression from older versions, justifying back-patching at least that far. But similar behavior may occur in other client applications, so it seems worth just back-patching to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAC8Q8tJ=7cOkPePyAbJE_Pf691t8nDFhJp0KZxHvnq_uicfyVg@mail.gmail.com">https://postgr.es/m/CAC8Q8tJ=7cOkPePyAbJE_Pf691t8nDFhJp0KZxHvnq_uicfyVg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d25c2ee9c038969eca8080177738dddf97a2cade">https://git.postgresql.org/pg/commitdiff/d25c2ee9c038969eca8080177738dddf97a2cade</a></li>

<li>Improve regression test coverage for src/backend/tsearch/spell.c. In passing, throw an error if the AF count is too small, rather than just silently discarding extra affix entries. Note that the new regression test cases require installing the updated src/backend/tsearch/dicts files. Arthur Zakirov Discussion: <a target="_blank" href="https://postgr.es/m/20180413113447.GA32474@zakirov.localdomain">https://postgr.es/m/20180413113447.GA32474@zakirov.localdomain</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8bf358c18ec930ddfb998873369e2fc38608d3e1">https://git.postgresql.org/pg/commitdiff/8bf358c18ec930ddfb998873369e2fc38608d3e1</a></li>

<li>Add commentary explaining why MaxIndexTuplesPerPage calculation is safe. MaxIndexTuplesPerPage ignores the fact that btree indexes sometimes store tuples with no data payload. But it also ignores the possibility of "special space" on index pages, which offsets that, so that the result isn't an underestimate. This all seems worth documenting, though. In passing, remove #define MinIndexTupleSize, which was added by commit 2c03216d8 but not used in that commit nor later ones. Comment text by me; issue noticed by Peter Geoghegan. Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-WzkQmb54Kbx-YHXstRKXcNc+_87jwV3DRb54xcybLR7Oig@mail.gmail.com">https://postgr.es/m/CAH2-WzkQmb54Kbx-YHXstRKXcNc+_87jwV3DRb54xcybLR7Oig@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2a67d6440db4360efff2078a05bc172ca8f34b2b">https://git.postgresql.org/pg/commitdiff/2a67d6440db4360efff2078a05bc172ca8f34b2b</a></li>

<li>Fix enforcement of SELECT FOR UPDATE permissions with nested views. SELECT FOR UPDATE on a view should require UPDATE (as well as SELECT) permissions on the view, and then the view's owner needs those same permissions against the relations it references, and so on all the way down to base tables. But ApplyRetrieveRule did things in the wrong order, resulting in failure to mark intermediate view levels as needing UPDATE permission. Thus for example, if user A creates a table T and an updatable view V1 on T, then grants only SELECT permissions on V1 to user B, B could create a second view V2 on V1 and then would be allowed to perform SELECT FOR UPDATE via V2 (since V1 wouldn't be checked for UPDATE permissions). To fix, just switch the order of expanding sub-views and marking referenced objects as needing UPDATE permission. I think additional simplifications are now possible, but that's distinct from the bug fix proper. This is certainly a security issue, but the consequences are pretty minor (just the ability to lock rows that shouldn't be lockable). Against that we have a small risk of breaking applications that are working as-desired, since nested views have behaved this way since such cases worked at all. On balance I'm inclined not to back-patch. Per report from Alexander Lakhin. Discussion: <a target="_blank" href="https://postgr.es/m/24db7b8f-3de5-e25f-7ab9-d8848351d42c@gmail.com">https://postgr.es/m/24db7b8f-3de5-e25f-7ab9-d8848351d42c@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/50c6bb022475bd9ad9c73e3b68b5152db5163b22">https://git.postgresql.org/pg/commitdiff/50c6bb022475bd9ad9c73e3b68b5152db5163b22</a></li>

<li>Improve regression test coverage of expand_tuple(). I was dissatisfied with the code coverage report for expand_tuple() in the wake of commit 7c44c46de: while better than no coverage at all, it was still not exercising the core function of inserting out-of-line default values, nor was the HeapTuple-output path covered. So far as I can find, the only code path that reaches the latter at present is EvalPlanQual fetches for non-locked tables. Hence, extend eval-plan-qual.spec to test cases where out-of-line defaults must be inserted into a tuple fetched from a non-locked table. Discussion: <a target="_blank" href="https://postgr.es/m/87woxi24uw.fsf@ansel.ydns.eu">https://postgr.es/m/87woxi24uw.fsf@ansel.ydns.eu</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b39fd897e0398a6bdc6552daa7cacdf9c0e46d7e">https://git.postgresql.org/pg/commitdiff/b39fd897e0398a6bdc6552daa7cacdf9c0e46d7e</a></li>

<li>Simplify view-expansion code in rewriteHandler.c. In the wake of commit 50c6bb022, it's not necessary for ApplyRetrieveRule to have a forUpdatePushedDown parameter. By the time control gets here for any given view-referencing RTE, we should already have pushed down the effects of any FOR UPDATE/SHARE clauses affecting the view from outer query levels. Hence if we don't find a RowMarkClause at the current query level, that's sufficient proof that there is no outer one either. This in turn means we need no forUpdatePushedDown parameter for fireRIRrules. I wonder whether we oughtn't also revert commit cba2d2717, since it now seems likely that that was band-aiding around the bad effects of doing FOR UPDATE pushdown and view expansion in the wrong order. However, in the absence of evidence that the current coding of markQueryForLocking is actually buggy (i.e. missing RTEs it ought to mark), it seems best to leave it alone. Discussion: <a target="_blank" href="https://postgr.es/m/24db7b8f-3de5-e25f-7ab9-d8848351d42c@gmail.com">https://postgr.es/m/24db7b8f-3de5-e25f-7ab9-d8848351d42c@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/49ac4039b28ec04ec0329b13bbb1baa6e94c86b7">https://git.postgresql.org/pg/commitdiff/49ac4039b28ec04ec0329b13bbb1baa6e94c86b7</a></li>

<li>Clean up callers of JsonbIteratorNext(). Coverity complained about the lack of a check on the return value in parse_jsonb_index_flags' last call of JsonbIteratorNext. Seems like a reasonable gripe to me, especially since the code is depending on that being WJB_DONE to not leak memory, so add a check. In passing, improve a couple other places where the result was being ignored, either by adding an assert or at least a cast to void. Also, don't spell "WJB_DONE" as "0". That's horrid coding style, and it wasn't consistent either. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f8a187bdbae6e9d3b7407c0c37e3494518496200">https://git.postgresql.org/pg/commitdiff/f8a187bdbae6e9d3b7407c0c37e3494518496200</a></li>

<li>Fix potentially-unportable code in contrib/adminpack. Spelling access(2)'s second argument as "2" is just horrid. POSIX makes no promises as to the numeric values of W_OK and related macros. Even if it accidentally works as intended on every supported platform, it's still unreadable and inconsistent with adjacent code. In passing, don't spell "NULL" as "0" either. Yes, that's legal C; no, it's not project style. Back-patch, just in case the unportability is real and not theoretical. (Most likely, even if a platform had different bit assignments for access()'s modes, there'd not be an observable behavior difference here; but I'm being paranoid today.) <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3a2d6365984d2cd98ee03467cd901785941cf772">https://git.postgresql.org/pg/commitdiff/3a2d6365984d2cd98ee03467cd901785941cf772</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Adjustments to the btree fastpath optimization. This optimization was introduced in commit 2b272734. The changes include some additional comments and documentation, and also these more substantive changes: . ensure the optimization is only applied on the leaf node of a tree whose root is on level 2 or more. It's of little value on small trees. . Delay calling RelationSetTargetBlock() until after the critical section of _bt_insertonpg . ensure the optimization is also applied to unlogged tables. Pavan Deolasee and Peter Geoghegan with some very light editing from me. Discussion: <a target="_blank" href="https://postgr.es/m/CABOikdO8jhRarNC60nZLktZYhxt+TK8z_V97+Ny499YQdyAfug@mail.gmail.com">https://postgr.es/m/CABOikdO8jhRarNC60nZLktZYhxt+TK8z_V97+Ny499YQdyAfug@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/074251db6740a9abfbd922d13d39b27c4f338a20">https://git.postgresql.org/pg/commitdiff/074251db6740a9abfbd922d13d39b27c4f338a20</a></li>

<li>minor comment fixes in nbtinsert.c. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8716b264ed845370e33943da93caf424dc3723b7">https://git.postgresql.org/pg/commitdiff/8716b264ed845370e33943da93caf424dc3723b7</a></li>

<li>Prevent segfault in expand_tuple with no missing values. Commit 16828d5c forgot to check that it had a set of missing values before trying to retrieve a value from it. An additional query to add coverage for this code is added to the regression test. Per bug report from Andreas Seltenreich. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7c44c46deb495a2f3861f402d7f2109263e3d50a">https://git.postgresql.org/pg/commitdiff/7c44c46deb495a2f3861f402d7f2109263e3d50a</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Fix typos in pgbench documentation. Author: Fabien COELHO &lt;coelho@cri.ensmp.fr&gt; Reviewed-by: Edmund Horner &lt;ejrh00@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/036ca6f7bb186ae8564fb9e3a27852757a9450be">https://git.postgresql.org/pg/commitdiff/036ca6f7bb186ae8564fb9e3a27852757a9450be</a></li>

<li>doc: Add more information about logical replication privileges. In particular, the requirement to have SELECT privilege for the initial table copy was previously not documented. Author: Shinoda, Noriyoshi &lt;noriyoshi.shinoda@hpe.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f1f537cb46299d81abb08258fd322f72170dff58">https://git.postgresql.org/pg/commitdiff/f1f537cb46299d81abb08258fd322f72170dff58</a></li>

<li>Fix clashing function names between jsonb_plperl and jsonb_plperlu. This prevented them from being installed at the same time. Author: Dagfinn Ilmari Manns&#65533;ker &lt;ilmari@ilmari.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/651cb9094154ca323e889269d56b94f27afaceca">https://git.postgresql.org/pg/commitdiff/651cb9094154ca323e889269d56b94f27afaceca</a></li>

<li>Support named and default arguments in CALL. We need to call expand_function_arguments() to expand named and default arguments. In PL/pgSQL, we also need to deal with named and default INOUT arguments when receiving the output values into variables. Author: Pavel Stehule &lt;pavel.stehule@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a8677e3ff6bb8ef78a9ba676faa647bba237b1c4">https://git.postgresql.org/pg/commitdiff/a8677e3ff6bb8ef78a9ba676faa647bba237b1c4</a></li>

<li>Improve code comments. As of 0c2c81b403db420bfce36f168887db72932dbf09, the replication parameter in libpq is no longer "deliberately undocumented". <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e013288a6509549866c5d531257480f159c6900d">https://git.postgresql.org/pg/commitdiff/e013288a6509549866c5d531257480f159c6900d</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Revert MERGE patch. This reverts commits d204ef63776b8a00ca220adec23979091564e465, 83454e3c2b28141c0db01c7d2027e01040df5249 and a few more commits thereafter (complete list at the end) related to MERGE feature. While the feature was fully functional, with sufficient test coverage and necessary documentation, it was felt that some parts of the executor and parse-analyzer can use a different design and it wasn't possible to do that in the available time. So it was decided to revert the patch for PG11 and retry again in the future. Thanks again to all reviewers and bug reporters. List of commits reverted, in reverse chronological order: f1464c5380 Improve parse representation for MERGE ddb4158579 MERGE syntax diagram correction 530e69e59b Allow cpluspluscheck to pass by renaming variable 01b88b4df5 MERGE minor errata 3af7b2b0d4 MERGE fix variable warning in non-assert builds a5d86181ec MERGE INSERT allows only one VALUES clause 4b2d44031f MERGE post-commit review 4923550c20 Tab completion for MERGE aa3faa3c7a WITH support in MERGE 83454e3c2b New files for MERGE d204ef6377 MERGE SQL Command following SQL:2016 Author: Pavan Deolasee Reviewed-by: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/08ea7a2291db21a618d19d612c8060cda68f1892">https://git.postgresql.org/pg/commitdiff/08ea7a2291db21a618d19d612c8060cda68f1892</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Aleksandr Parfenov sent in another revision of a patch to add a more flexible configuration for full-text search.</p>

<p>Amit Langote sent in two revisions of a patch to fix the partition-pruning code to determine the comparison function correctly.</p>

<p>Heikki Linnakangas sent in a patch to clean up the inclusion of GID in WAL records for 2PC in logical replication.</p>

<p>Kyotaro HORIGUCHI sent in four more revisions of a patch to fix a race condition in full-page-writes between config reload on checkpointer and StartupXLOG.</p>

<p>Sergei Kornilov sent in three more revisions of a patch to allow skipping a full-table scan when doing ALTER TABLE ... ALTER COLUMN ... SET NOT NULL if the column already has a CHECK constraint that would prevent it from being NULL in the first place.</p>

<p>Konstantin Knizhnik sent in another revision of a patch to make range queries faster.</p>

<p>Peter Eisentraut sent in a patch to change pg_dump to use current_database() instead of PQdb().</p>

<p>Craig Ringer sent in a patch to PANIC when we detect a possible fsync I/O error instead of retrying fsync.</p>

<p>Alexander Kuzmenkov sent in two more revisions of a patch to enable sending a signal to the logging collector process. This in turn makes it rotate logs.</p>

<p>Kyotaro HORIGUCHI and Jonathan Katz traded patches to allow setting any immutable expression as a partition bound.</p>

<p>Mart&#65533;n Marqu&#65533;s sent in two revisions of a patch to document the autovacuum_vacuum_cost_limit GUC better.</p>

<p>&#65533;lvaro Herrera and Amit Langote traded patches to fix runtime partition pruning.</p>

<p>Amit Langote sent in a patch to fix a memory context bug in RelationBuildPartitionKey.</p>

<p>Thomas Munro sent in another revision of a patch to add kqueue support to WaitEventSet.</p>

<p>Micha&#65533;l Paquier sent in a patch to fix some typos in the covering index patch.</p>

<p>Micha&#65533;l Paquier sent in a patch to fix the documentation of covering indexes for CREATE and ALTER TABLE, to wit, it adds a mention of same to the ALTER TABLE documentation, and adds mentions of the fact that exclusion constraints can use INCLUDE clauses.</p>

<p>Thomas Munro sent in another revision of a patch to replace PostmasterIsAlive() calls with WL_POSTMASTER_DEATH checks.</p>

<p>Jeevan Chalke sent in a patch to add partial path only when rel's consider_parallel is true.</p>

<p>Andrey Borodin sent in two revisions of a patch to implement covering GiST indexes.</p>

<p>Micha&#65533;l Paquier sent in a patch to make description of heap records more talkative for flags.</p>

<p>Amul Sul sent in a patch to fix an installcheck failure due to MovedPartitions.</p>

<p>Andrey Borodin sent in a patch to ensure that the REINDEX test for covering indexes is actually testing REINDEX.</p>

<p>Julian Markwort sent in another revision of a patch to implement clientcert=verify-full as a pg_hba option.</p>

<p>Konstantin Knizhnik sent in another revision of a patch to fix an issue where PostgreSQL could get stuck in deadlock detection.</p>

<p>Jeff Davis sent in a patch to make it possible to set rpath on llvmjit.so.</p>