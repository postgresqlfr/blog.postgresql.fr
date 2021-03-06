---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er juin 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/06/15/Nouvelles-hebdomadaires-de-PostgreSQL-1er-juin-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PostgreSQL Maestro 14.5, un outil de gestion bas&eacute; sur ODBC et compatible avec PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></li>

<li>pg_bulkload 3.1.6&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/frs/?group_id=1000261">http://pgfoundry.org/frs/?group_id=1000261</a></li>

<li>PG Partition Manager 1.7.1, une extension pour g&eacute;rer un partitionnement bas&eacute; sur un horodatage ou une s&eacute;quence&nbsp;: 

<a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La premi&egrave;re PgConf suisse aura lieu le 24 juin 2014 au HSR Hochschule f&uuml;r Technik Rapperswil&nbsp;: 

<a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></li>

<li>Char(14) et le PGday UK auront lieu les 8 &amp; 9 juillet 2014&nbsp;: 

<a target="_blank" href="http://www.char14.info">http://www.char14.info</a> <a target="_blank" href="http://postgresqlusergroup.org.uk/">http://postgresqlusergroup.org.uk/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>La PGConf europ&eacute;enne 2014 se tiendra &agrave; Madrid (Espagne) du 21 au 24 octobre, &agrave; l'h&ocirc;tel Miguel Angel&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/">http://2014.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140602034634.GA1247@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_recvlogical to accept the documented -I instead only --startpos. The bug was caused by omitting 'I:' from the short argument list togetopt_long(). To make similar bugs in the future less likely reorderoptions in --help, long and short option lists to be in the same,alphabetical within groups, order. Report and fix by Michael Paquier, some additional reordering by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf2e70ba6c0175e5a676b6aa37e49915d8918a63">http://git.postgresql.org/pg/commitdiff/bf2e70ba6c0175e5a676b6aa37e49915d8918a63</a></li>

<li>Don't pay heed to wal_sender_timeout while creating a decoding slot. Sometimes CREATE_REPLICATION_SLOT ... LOGICAL ... needs to wait forfurther WAL using WalSndWaitForWal(). That used to always respectwal_sender_timeout and kill the session when waiting long enoughbecause no feedback/ping messages can be sent while the slot is stillbeing created. Introduce the notion that last_reply_timestamp = 0 means that thewalsender currently doesn't need timeout processing to avoid thatproblem. Use that notion for CREATE_REPLICATION_SLOT ... LOGICAL. Bugreport and initial patch by Steve Singer, revised by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21d48d66c8be053ef5ce0474bb30f8a91b7c3dd6">http://git.postgresql.org/pg/commitdiff/21d48d66c8be053ef5ce0474bb30f8a91b7c3dd6</a></li>

<li>Improvements to the replication protocol documentation. Document the CREATE_REPLICATION_SLOT's output_plugin parameter; thatSTART_REPLICATION ... LOGICAL takes parameters; that START_REPLICATION... LOGICAL uses the same messages as ... PHYSICAL; and be moreconsistent with the usage of &lt;literal/&gt;. Michael Paquier, with some additional changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a57509821c3147b2bf57560e3bce1641d78a7519">http://git.postgresql.org/pg/commitdiff/a57509821c3147b2bf57560e3bce1641d78a7519</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid unportable usage of sscanf(UINT64_FORMAT). On Mingw, it seems that scanf() doesn't necessarily accept the same formatcodes that printf() does, and in particular it may fail to recognize %llu even though printf() does. Since configure only probes printf() behaviorwhile setting up the INT64_FORMAT macros, this means it's unsafe to usethose macros with scanf(). We had only one instance of such a codingpattern, in contrib/pg_stat_statements, so change that code to avoidthe problem. Per buildfarm warnings. Back-patch to 9.0 where the troublesome code was introduced. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d7ded0f4277f5c0063eca8e871a34e2355a8371">http://git.postgresql.org/pg/commitdiff/9d7ded0f4277f5c0063eca8e871a34e2355a8371</a></li>

<li>Support BSD and e2fsprogs UUID libraries alongside OSSP UUID library. Allow the contrib/uuid-ossp extension to be built atop any one of these three popular UUID libraries. (The extension's name is now arguably a misnomer, but we'll keep it the same so as not to cause unnecessary compatibility issues for users.) We would not normally consider a change like this post-beta1, but the issue has been forced by our upgrade to autoconf 2.69, whose more rigorous header checks are causing OSSP's header files to be rejected on some platforms. It's been foreseen for some time that we'd have to move away from depending on OSSP UUID due to lack of upstream maintenance, so this is a down payment on that problem. While at it, add some simple regression tests, in hopes of catching any major incompatibilities between the three implementations. Matteo Beccati, with some further hacking by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8cc8f94730610c0189aa82dfec4ae6ce9b13e34">http://git.postgresql.org/pg/commitdiff/b8cc8f94730610c0189aa82dfec4ae6ce9b13e34</a></li>

<li>Propagate system identifier generation improvement into pg_resetxlog. Commit 5035701e07e8bd395aa878465a102afd7b74e8c3 improved xlog.c's method for creating a database system identifier, but I neglected to fix the copy of that code appearing in pg_resetxlog.c. Spotted by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bcb3946249cbeed157ffd545a804913cfce749b">http://git.postgresql.org/pg/commitdiff/4bcb3946249cbeed157ffd545a804913cfce749b</a></li>

<li>Fix obsolete config-module-exclusion logic in vcregress.pl. The recent addition of regression tests to uuid-ossp exposed the fact that the MSVC build system wasn't being consistent about whether it was building/testing that contrib module, ie, it would try to test the module even when it hadn't built it. The same hazard was latent for sslinfo. For the moment I just copied the more up-to-date logic from point A to point B, but this is screaming for refactoring. Per buildfarm results. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8600031147cee7845e1ad9e64304e1f5fe585515">http://git.postgresql.org/pg/commitdiff/8600031147cee7845e1ad9e64304e1f5fe585515</a></li>

<li>pg_lsn should not be marked typispreferred. In general it's not a good idea for built-in types in the 'U' category to be marked preferred; they could draw behavior away from user-defined types with similarly-named operators. pg_lsn is probably at low risk of that right now given the lack of casts between it and other types, but that doesn't make this marking OK. Ordinarily we'd bump catversion when changing any predefined catalog contents like this, but since we're past beta1, the costs of a forced initdb seem to outweigh the benefits of guaranteed behavioral consistency. There's not any known behavioral impact today anyway --- this is more in the nature of being sure there's not problems in future. Per an off-list complaint from Thomas Fanghaenel. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec3357a3bc37d9108b2cf2db96499f83f1a93df1">http://git.postgresql.org/pg/commitdiff/ec3357a3bc37d9108b2cf2db96499f83f1a93df1</a></li>

<li>Fix stack clobber in new uuid-ossp code. The V5 (SHA1 hashing) code wrote 20 bytes into a 16-byte local variable. This had accidentally failed to fail in my testing and Matteo's, but buildfarm results exposed the problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2103218dd4a0c6a44d05c09c066da20e1c2360fb">http://git.postgresql.org/pg/commitdiff/2103218dd4a0c6a44d05c09c066da20e1c2360fb</a></li>

<li>Improve regression tests for uuid-ossp. On reflection, the timestamp-advances test might fail if we're unlucky enough for the time_mid field to change between two calls, since uuid_cmp is just bytewise comparison and the field ordering has more significant fields later. Build some field extraction functions so we can do a more honest test of that. Also check that the version and reserved fields contain what they should. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0f27628d2fb53e8e5d190da2132739a2bb2f500">http://git.postgresql.org/pg/commitdiff/c0f27628d2fb53e8e5d190da2132739a2bb2f500</a></li>

<li>Revert "Fix bogus %name-prefix option syntax in all our Bison files." This reverts commit 45b7abe59e9485657ac9380f35d2d917dd0da25b. It turns out that the %name-prefix syntax without "=" does not work at all in pre-2.4 Bison. We are not prepared to make such a large jump in minimum required Bison version just to suppress a warning message in a version hardly any developers are using yet. When 3.0 gets more popular, we'll figure out a way to deal with this. In the meantime, BISONFLAGS=-Wno-deprecated is recommendable for anyone using 3.0 who doesn't want to see the warning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71ed8b3ca76cd720f4013c3c20f0d2706583ab9a">http://git.postgresql.org/pg/commitdiff/71ed8b3ca76cd720f4013c3c20f0d2706583ab9a</a></li>

<li>Fix uuid-ossp regression tests based on buildfarm feedback. The previous version of these tests expected uuid_generate_v1() to always emit MAC addresses with the local-admin and multicast address bits zero. However, several of the buildfarm critters are reporting values with the local-admin bit set. (Perhaps they're running inside VMs or jails.) And a couple are reporting values with the multicast bit set, probably meaning that the UUID library couldn't read the system MAC address. Also, it emerges that if OSSP UUID can't read the system MAC address, it falls back to V1MC behavior wherein the whole node field gets randomized each time, breaking the test that expected the node field to remain stable in V1 output. (It looks like e2fs doesn't behave that way, though.) It's not entirely clear why we can't get a system MAC address, since the buildfarm scripts would not work without internet access. Nonetheless, the regression tests had better cope with the case, so adjust the tests to expect these behaviors. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25dd07e0f6ba1aef0a6802474112b5bcce621ea4">http://git.postgresql.org/pg/commitdiff/25dd07e0f6ba1aef0a6802474112b5bcce621ea4</a></li>

<li>Fix bogus %name-prefix option syntax in all our Bison files. %name-prefix doesn't use an "=" sign according to the Bison docs, but it silently accepted one anyway, until Bison 3.0. This was originally a typo of mine in commit 012abebab1bc72043f3f670bf32e91ae4ee04bd2, and we seem to have slavishly copied the error into all the other grammar files. Per report from Vik Fearing; analysis by Peter Eisentraut. Back-patch to all active branches, since somebody might try to build a back branch with up-to-date tools. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45b7abe59e9485657ac9380f35d2d917dd0da25b">http://git.postgresql.org/pg/commitdiff/45b7abe59e9485657ac9380f35d2d917dd0da25b</a></li>

<li>When using the OSSP UUID library, cache its uuid_t state object. The original coding in contrib/uuid-ossp created and destroyed a uuid_t object (or, in some cases, even two of them) each time it was called. This is not the intended usage: you're supposed to keep the uuid_t object around so that the library can cache its state across uses. (Other UUID libraries seem to keep equivalent state behind-the-scenes in static variables, but OSSP chose differently.) Aside from being quite inefficient, creating a new uuid_t loses knowledge of the previously generated UUID, which in theory could result in duplicate V1-style UUIDs being created on sufficiently fast machines. On at least some platforms, creating a new uuid_t also draws some entropy from /dev/urandom, leaving less for the rest of the system. This seems sufficiently unpleasant to justify back-patching this change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c941aed96b482e32dc3a8eba66b298824e7adc39">http://git.postgresql.org/pg/commitdiff/c941aed96b482e32dc3a8eba66b298824e7adc39</a></li>

<li>On OS X, link libpython normally, ignoring the "framework" framework. As of Xcode 5.0, Apple isn't including the Python framework as part of the SDK-level files, which means that linking to it might fail depending on whether Xcode thinks you've selected a specific SDK version. According to their Tech Note 2328, they've basically deprecated the framework method of linking to libpython and are telling people to link to the shared library normally. (I'm pretty sure this is in direct contradiction to the advice they were giving a few years ago, but whatever.) Testing says that this approach works fine at least as far back as OS X 10.4.11, so let's just rip out the framework special case entirely. We do still need a special case to decide that OS X provides a shared library at all, unfortunately (I wonder why the distutils check doesn't work ...). But this is still less of a special case than before, so it's fine. Back-patch to all supported branches, since we'll doubtless be hearing about this more as more people update to recent Xcode. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20561acf93d32b7d7fdd59d054344b2e341d6aa0">http://git.postgresql.org/pg/commitdiff/20561acf93d32b7d7fdd59d054344b2e341d6aa0</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>worker_spi: Initialize bgw_notify_pid in all cases. Commit 090d0f2050647958865cb495dff74af7257d2bb4 added new code showing how it can be useful to set bgw_notify_pid to a non-zero value, but it failed to make sure that the existing call to RegisterBackgroundWorker initialized the new field at all. Report and patch by Shigeru Hanada. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/616afee14d7e8d6690286aaf8a2a0a01168c378a">http://git.postgresql.org/pg/commitdiff/616afee14d7e8d6690286aaf8a2a0a01168c378a</a></li>

<li>In release notes, mention the need to initialize bgw_notify_pid. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42be7d6923e52a8c1ceb549c0931ac43a4954b86">http://git.postgresql.org/pg/commitdiff/42be7d6923e52a8c1ceb549c0931ac43a4954b86</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: improve ssl_ecdh_curve descriptions Patch by Marko Kreen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49cf2cd815d61e1399fe46f9532347f09c3ed2f9">http://git.postgresql.org/pg/commitdiff/49cf2cd815d61e1399fe46f9532347f09c3ed2f9</a></li>

<li>doc: improve markup of ssl_ecdh_curve commit 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c676315658973390c5550d73d3bb1fb7b92720b5">http://git.postgresql.org/pg/commitdiff/c676315658973390c5550d73d3bb1fb7b92720b5</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Ensure cleanup in case of early errors in streaming base backups. Move the code that sends the initial status information as well as the calculation of paths inside the ENSURE_ERROR_CLEANUP block. If this code failed, we would "leak" a counter of number of concurrent backups, thereby making the system always believe it was in backup mode. This could happen if the sending failed (which it probably never did given that the small amount of data to send would never cause a flush) or if the psprintf calls ran out of memory. Both are very low risk, but all operations after do_pg_start_backup should be protected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8232d6df4c943a30c08e65d7ea893cb762bc5612">http://git.postgresql.org/pg/commitdiff/8232d6df4c943a30c08e65d7ea893cb762bc5612</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Jsonb comparison bug fixes. Fix an over-zealous assertion, which didn't take into account that sometimes a scalar element can be compared against an array/object element. Avoid comparing possibly-uninitialized local variables when end-of-array or end-of-object is reached. Also fix and enhance comments a bit. Peter Geoghegan, per reports by Pavel Stehule and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3e5cfd5f979054e31d60adafd9e75bf9c38549a">http://git.postgresql.org/pg/commitdiff/b3e5cfd5f979054e31d60adafd9e75bf9c38549a</a></li>

<li>Jsonb comparison bug fixes. Fix an over-zealous assertion, which didn't take into account that sometimes a scalar element can be compared against an array/object element. Avoid comparing possibly-uninitialized local variables when end-of-array or end-of-object is reached. Also fix and enhance comments a bit. Peter Geoghegan, per reports by Pavel Stehule and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3e5cfd5f979054e31d60adafd9e75bf9c38549a">http://git.postgresql.org/pg/commitdiff/b3e5cfd5f979054e31d60adafd9e75bf9c38549a</a></li>

<li>Fix typos in MSVC solution file. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/512f3b03e3cddf7dc1901c0e062500133e534c1d">http://git.postgresql.org/pg/commitdiff/512f3b03e3cddf7dc1901c0e062500133e534c1d</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve the efficiency of certain jsonb get operations. Instead of iterating over jsonb structures, use the inbuilt functions findJsonbValueFromContainerLen() and getIthJsonbValueFromContainer() to extract values directly. These functions use algorithms that are O(n log n) and O(1) respectively, whereas iterating is O(n), so we should see considerable speedup here. Teodor Sigaev. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a4174a498a15a848d4c4c50a3a9ef500926e4bd">http://git.postgresql.org/pg/commitdiff/1a4174a498a15a848d4c4c50a3a9ef500926e4bd</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Geoghegan sent in a patch to describe how Lehman and Yao's work applies to nbtree.</li>

<li>Michael Paquier sent in a patch to extend MSVC scripts to support --with-extra-version.</li>

<li>Amit Kapila sent in a patch to disable a potential privilege escalation in ALTER SYSTEM.</li>

<li>Michael Paquier and Bruce Momjian traded patches to fix a situation where popen and pclose redefinitions are causing many warning in Windows builds.</li>

<li>Michael Paquier sent in a doc patch to notify that non-dynamic background workers need to set bgw_notify_pid to 0.</li>

<li>Fabr&iacute;zio de Royes Mello sent in two revisions of a patch to include pg_llog and pg_stat in the appropriate parts of the documentation.</li>

<li>John Lumby and Claudio Freire traded patches to allow extended prefetch using asynchronous I/O on Linux and other systems which support same.</li>

<li>David Rowley sent in another revision of a patch to allow join removal for more join types.</li>

<li>Andrew Dunstan sent in a patch to make it possible to handle timestamps in JSON correctly.</li>

<li>Vik Fearing sent in patches to: refactor createdb/alterdb grammars, making all of the options non-keywords that don't otherwise need to be keywords, and the second, to allow SQL access to database attributes via CREATE and ALTER.</li>

<li>Fujii Masao sent in a patch to save the pg_stat_statements statistics file in $PGDATA.</li>

<li>Peter Geoghegan sent in a patch to fix a formatting bug in to_char().</li>

<li>Andrew Dunstan sent in a patch to fix some of the issues to do with unicode escapes Teodor Sigaev raised recently.</li>

<li>Ali Akbar sent in a patch to fix an issue with nested or repeated xpath().</li>

<li>Heikki Linnakangas sent in a WIP patch to create CSN-based snapshots.</li>

<li>Teodor Sigaev sent in two revisions of a patch to fix a memory leak in SP-GiST.</li>

<li>Amit Kapila sent in a patch to make some information available to pg_xlogdump for recovery testing.</li>

<li>Marc Mamin sent in a patch to add three functions to contrib/intarray to count[distinct] event IDs into arrays, mimicking a column store.</li>

<li>David Rowley sent in a patch to teach Var about NOT NULL.</li>

</ul>