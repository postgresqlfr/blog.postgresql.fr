---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 novembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/11/04/Nouvelles-hebdomadaires-de-PostgreSQL-2-novembre-2014"
---


<p>PG-Cuba aura lieu les 25 &amp; 26 novembre&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?p=1087#more-1087">http://postgresql.uci.cu/?p=1087#more-1087</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour le PGDay (30 janvier 2015) et la <em>dev room</em> PostgreSQL du FOSDEM (31 janvier au 1<sup>er</sup> f&eacute;vrier 2015) est lanc&eacute;. Date limite des candidatures&nbsp;: 24 novembre 2014&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/callforpapers/">http://fosdem2015.pgconf.eu/callforpapers/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>POWA 1.2, un analyseur de charge de travail pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://dalibo.github.io/powa/">http://dalibo.github.io/powa/</a></li>

<li>psqlODBC 09.03.0400&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/ftp/odbc/versions/">http://www.postgresql.org/ftp/odbc/versions/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

<li>[ndt: meetup &agrave; Lyon le 19 novembre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/">http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/</a>]</li>

<li>PG-Cuba aura lieu les 25 &amp; 26 novembre 2014&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?p=1087#more-1087">http://postgresql.uci.cu/?p=1087#more-1087</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf NYC 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. l'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141103060322.GA7610@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add variable names to two LWLock C prototypes. Previously only the variable types appeared. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4da35a0d2c61231d8e91ed2ae424faea6f3501c">http://git.postgresql.org/pg/commitdiff/a4da35a0d2c61231d8e91ed2ae424faea6f3501c</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix two bugs in tsquery @&gt; operator. 1. The comparison for matching terms used only the CRC to decide if there's a match. Two different terms with the same CRC gave a match. 2. It assumed that if the second operand has more terms than the first, it's never a match. That assumption is bogus, because there can be duplicate terms in either operand. Rewrite the implementation in a way that doesn't have those bugs. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22926e00f7041b2b542f80caf63b41faa99a3163">http://git.postgresql.org/pg/commitdiff/22926e00f7041b2b542f80caf63b41faa99a3163</a></li>

<li>Remove unnecessary assignment. Reported by MauMau. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18f158ef697974cb976b52dae8a048d83b7f1ca4">http://git.postgresql.org/pg/commitdiff/18f158ef697974cb976b52dae8a048d83b7f1ca4</a></li>

<li>Reset error message at PQreset(). If you call PQreset() repeatedly, and the connection cannot be re-established, the error messages from the failed connection attempts kept accumulating in the error string. Fixes bug #11455 reported by Caleb Epstein. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f8314b56003877185fb817c847c7c9609621d0c">http://git.postgresql.org/pg/commitdiff/8f8314b56003877185fb817c847c7c9609621d0c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add missing equals signs to pg_recvlogical documentation. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f609a10adb5419c68fc683594fcd14f1e7322fb">http://git.postgresql.org/pg/commitdiff/7f609a10adb5419c68fc683594fcd14f1e7322fb</a></li>

<li>Avoid setup work for invalidation messages at start-of-(sub)xact. Instead of initializing a new TransInvalidationInfo for every transaction or subtransaction, we can just do it for those transactions or subtransactions that actually need to queue invalidation messages. That also avoids needing to free those entries at the end of a transaction or subtransaction that does not generate any invalidation messages, which is by far the common case. Patch by me. Review by Simon Riggs and Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cb4afff33ba0b6f88cca2967904ad501d648e2f">http://git.postgresql.org/pg/commitdiff/6cb4afff33ba0b6f88cca2967904ad501d648e2f</a></li>

<li>"Pin", rather than "keep", dynamic shared memory mappings and segments. Nobody seemed concerned about this naming when it originally went in, but there's a pending patch that implements the opposite of dsm_keep_mapping, and the term "unkeep" was judged unpalatable. "unpin" has existing precedent in the PostgreSQL code base, and the English language, so use this terminology instead. Per discussion, back-patch to 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6057c212f3e783c45e050a78d070edf3e5f069f0">http://git.postgresql.org/pg/commitdiff/6057c212f3e783c45e050a78d070edf3e5f069f0</a></li>

<li>Extend dsm API with a new function dsm_unpin_mapping. This reassociates a dynamic shared memory handle previous passed to dsm_pin_mapping with the current resource owner, so that it will be cleaned up at the end of the current query. Patch by me. Review of the function name by Andres Freund, Amit Kapila, Jim Nasby, Petr Jelinek, and &Aacute;lvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7102b04638a882b38cbba7670471a073a939865">http://git.postgresql.org/pg/commitdiff/f7102b04638a882b38cbba7670471a073a939865</a></li>

<li>Support frontend-backend protocol communication using a shm_mq. A background worker can use pq_redirect_to_shm_mq() to direct protocol that would normally be sent to the frontend to a shm_mq so that another process may read them. The receiving process may use pq_parse_errornotice() to parse an ErrorResponse or NoticeResponse from the background worker and, if it wishes, ThrowErrorData() to propagate the error (with or without further modification). Patch by me. Review by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bd9e412f92bc6a68f3e8bcb18e04955cc35001d">http://git.postgresql.org/pg/commitdiff/2bd9e412f92bc6a68f3e8bcb18e04955cc35001d</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>MinGW: Include .dll extension in .def file LIBRARY commands. Newer toolchains append the extension implicitly if missing, but buildfarm member narwhal (gcc 3.4.2, ld 2.15.91 20040904) does not. This affects most core libraries having an exports.txt file, namely libpq and the ECPG support libraries. On Windows Server 2003, Windows API functions that load and unload DLLs internally will mistakenly unload a libpq whose DLL header reports "LIBPQ" instead of "LIBPQ.dll". When, subsequently, control would return to libpq, the backend crashes. Back-patch to 9.4, like commit 846e91e0223cf9f2821c3ad4dfffffbb929cb027. Before that commit, we used a different linking technique that yielded "libpq.dll" in the DLL header. Commit 53566fc0940cf557416b13252df57350a4511ce4 worked around this by eliminating a call to a function that loads and unloads DLLs internally. That commit is no longer necessary for correctness, but its improving consistency with the MSVC build remains valid. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0e190365b93bbf717540d8e7653c65a9f6c5650">http://git.postgresql.org/pg/commitdiff/c0e190365b93bbf717540d8e7653c65a9f6c5650</a></li>

<li>Fix win32setlocale.c const-related warnings. Back-patch to 9.2, like commit db29620d4d16e08241f965ccd70d0f65883ff0de. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/846319521753af63c8f9b0893a116adc0a70e936">http://git.postgresql.org/pg/commitdiff/846319521753af63c8f9b0893a116adc0a70e936</a></li>

<li>Re-remove dependency on the DLL of pythonxx.def file. The reasons behind commit 0d147e43adcf5d2bff9caa073608f381a27439bf still stand, so this reverts the non-cosmetic portion of commit a7983e989d9cafc9cef49becfee054e34b1ed9b4. Back-patch to 9.4, where the latter commit first appeared. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00c07e497f31e44ddf971e2d5f14240971ed5175">http://git.postgresql.org/pg/commitdiff/00c07e497f31e44ddf971e2d5f14240971ed5175</a></li>

<li>Make ECPG test programs depend on "ecpg$(X)", not "ecpg". Cygwin builds require this of dependencies pertaining to pattern rules. On Cygwin, stat("foo") in the absence of a file with that exact name can locate foo.exe. While GNU make uses stat() for dependencies of ordinary rules, it uses readdir() to assess dependencies of pattern rules. Therefore, a pattern rule dependency should match any underlying file name exactly. Back-patch to 9.4, where the dependency was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67a412049489f554c3a552bd523cefd30d038221">http://git.postgresql.org/pg/commitdiff/67a412049489f554c3a552bd523cefd30d038221</a></li>

<li>Remove dead-since-introduction pgcrypto code. Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ed8e771ade6f2a58728f4537e9c19b702d8cf25">http://git.postgresql.org/pg/commitdiff/1ed8e771ade6f2a58728f4537e9c19b702d8cf25</a></li>

<li>Clarify .def file comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c40212baf6c093b4958c6e04ddde94869788a572">http://git.postgresql.org/pg/commitdiff/c40212baf6c093b4958c6e04ddde94869788a572</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove obsolete commentary. Since we got rid of non-MVCC catalog scans, the fourth reason given for using a non-transactional update in index_update_stats() is obsolete. The other three are still good, so we're not going to change the code, but fix the comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a00d468e658a245823083b9ac2e423a659a03802">http://git.postgresql.org/pg/commitdiff/a00d468e658a245823083b9ac2e423a659a03802</a></li>

<li>Avoid corrupting tables when ANALYZE inside a transaction is rolled back. VACUUM and ANALYZE update the target table's pg_class row in-place, that is nontransactionally. This is OK, more or less, for the statistical columns, which are mostly nontransactional anyhow. It's not so OK for the DDL hint flags (relhasindex etc), which might get changed in response to transactional changes that could still be rolled back. This isn't a problem for VACUUM, since it can't be run inside a transaction block nor in parallel with DDL on the table. However, we allow ANALYZE inside a transaction block, so if the transaction had earlier removed the last index, rule, or trigger from the table, and then we roll back the transaction after ANALYZE, the table would be left in a corrupted state with the hint flags not set though they should be. To fix, suppress the hint-flag updates if we are InTransactionBlock(). This is safe enough because it's always OK to postpone hint maintenance some more; the worst-case consequence is a few extra searches of pg_index et al. There was discussion of instead using a transactional update, but that would change the behavior in ways that are not all desirable: in most scenarios we're better off keeping ANALYZE's statistical values even if the ANALYZE itself rolls back. In any case we probably don't want to change this behavior in back branches. Per bug #11638 from Casey Shobe. This has been broken for a good long time, so back-patch to all supported branches. Tom Lane and Michael Paquier, initial diagnosis by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e0722d9cb57d06c2e459cf338cf7387ec3edb1f5">http://git.postgresql.org/pg/commitdiff/e0722d9cb57d06c2e459cf338cf7387ec3edb1f5</a></li>

<li>Test IsInTransactionChain, not IsTransactionBlock, in vac_update_relstats. As noted by Noah Misch, my initial cut at fixing bug #11638 didn't cover all cases where ANALYZE might be invoked in an unsafe context. We need to test the result of IsInTransactionChain not IsTransactionBlock; which is notationally a pain because IsInTransactionChain requires an isTopLevel flag, which would have to be passed down through several levels of callers. I chose to pass in_outer_xact (ie, the result of IsInTransactionChain) rather than isTopLevel per se, as that seemed marginally more apropos for the intermediate functions to know about. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd0f651a867ce4a25160e37bcb9085f3b3209bf8">http://git.postgresql.org/pg/commitdiff/fd0f651a867ce4a25160e37bcb9085f3b3209bf8</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove use of TAP subtests. They turned out to be too much of a portability headache, because they need a fairly new version of Test::More to work properly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7912f9b7dc9e2d3f6cd81892ef6aa797578e9f06">http://git.postgresql.org/pg/commitdiff/7912f9b7dc9e2d3f6cd81892ef6aa797578e9f06</a></li>

<li>doc: Improve CREATE VIEW / WITH documentation. Similar to 590eb0c14eebe834f716721a9659b77899cf3084, remove the options list from the synopsis and elaborate in the main description. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bd91e3a835b5d5499fee5f49fc7c0c776fe63dd">http://git.postgresql.org/pg/commitdiff/5bd91e3a835b5d5499fee5f49fc7c0c776fe63dd</a></li>

<li>doc: Fix typos. per Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/252e652edea80b948fbc9c3723183065e94d8480">http://git.postgresql.org/pg/commitdiff/252e652edea80b948fbc9c3723183065e94d8480</a></li>

<li>doc: Wording and formatting improvements in new logical decoding docs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50709a1d427831d48a5aa14655e9f57e3721a06b">http://git.postgresql.org/pg/commitdiff/50709a1d427831d48a5aa14655e9f57e3721a06b</a></li>

<li>PL/Python: Fix example. Revert "6f6b46c9c0ca3d96acbebc5499c32ee6369e1eec", which was broken. Reported-by: Jonathan Rogers &lt;jrogers@socialserve.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e81a33d799ed8c12847eb8ef1685563eeb10e7d">http://git.postgresql.org/pg/commitdiff/3e81a33d799ed8c12847eb8ef1685563eeb10e7d</a></li>

<li>Add configure --enable-tap-tests option. Don't skip the TAP tests anymore when IPC::Run is not found. This will fail normally now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a409b464f91e0bdf61f2b3fb81218a0e4312987b">http://git.postgresql.org/pg/commitdiff/a409b464f91e0bdf61f2b3fb81218a0e4312987b</a></li>

<li>Fix generation of INSTALL file by removing link 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9522efdae11c7bb3e12cd4bf070399d5417ac405">http://git.postgresql.org/pg/commitdiff/9522efdae11c7bb3e12cd4bf070399d5417ac405</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Pavel Stehule sent in another revision of a patch to add "strip nulls" functions to JSON[B].</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to call ResetUnloggedRelations(UNLOGGED_RELATION_INIT) earlier.</li>

<li>Stephen Frost sent in a patch to fix some lacunae in the use of GetUserId().</li>

<li>Heikki Linnakangas sent patches to rationalize use of CRC algorithms, removing the unused 64-bit version and redoing the ones that won't break pg_upgrade to algorithms with well-known properties.</li>

<li>Ali Akbar and Pavel Stehule traded patches to implement array_agg(ANYARRAY).</li>

<li>Michael Paquier sent in another revision of a patch to add a --snapshot option to pg_dump.</li>

<li>Andrew Dunstan sent in another revision of a patch to add some missing JSON[B] functions.</li>

<li>Stephen Frost sent in another revision of a patch to clean up superuser().</li>

<li>Amit Kapila sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Adam Brightwell sent in another revision of a patch to add directory and file access permissions for COPY and generic file access functions.</li>

<li>Andres Freund sent in a WIP patch to implement a lockless StrategyGetBuffer() clock sweep.</li>

<li>Marko (johto) Tiikkaja sent in two more revisions of a patch to add PGP signatures to the pgcrypto contrib extension.</li>

<li>Rahila Syed sent in another revision of a patch to do compression of full-page writes.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Andres Freund sent in a patch to eliminate "snapshot too large" messages by doubling the array size until the snapshot is no longer too large for it.</li>

<li>Peter Eisentraut sent in a patch to see to it that TAP tests run in a deeply nested directory tree.</li>

<li>Peter Eisentraut sent in a patch to handle the situation where the "prove" utility is not available.</li>

<li>Etsuro Fujita sent in a patch to improve automatic analyze messages for inheritance trees.</li>

<li>Stephen Frost sent in a patch to fix an incompatibility between views created with WITH CHECK OPTION and column-level privileges.</li>

<li>Szymon Guz and Pavel Stehule traded patches to add asciidoc format to psql table output.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the API and format of WALs.</li>

<li>Kyotaro HORIGUCHI and Adam Brightwell traded patches to implement ALTER USER/ROLE...CURRENT USER.</li>

<li>Abhijit Menon-Sen sent in a patch to initdb to make initdb -S fsync everything under pg_tblspc.</li>

<li>Fujii Masao sent in another revision of a patch to add a pending_list_cleanup_size GUC and associated machinery.</li>

<li>Michael Paquier sent in two more revisions of a patch to factor the code for sync node detection out of walsender.c and syncrep.c.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to implement CINE for indexes.</li>

<li>Jim Nasby sent in a patch to move the bulk of exec_simple_query into exec_query_string() so that pg_backend can also make use of it.</li>

<li>Robert Haas sent in another revision of a patch to implement pg_background, which runs commands in a background worker, and gets the results.</li>

<li>Peter Eisentraut sent in a patch to add a ./configure enable_tap_tests option.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to implement CINE functionality for materialized views.</li>

<li>Furuya Osamu sent in another revision of a patch to add fsync feedback to pg_receivexlog --status-interval.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to add a shutdown_at_recovery_target option to recovery.conf.</li>

<li>Thomas Munro sent in another revision of a patch to support DISTINCT with a btree skip scan.</li>

<li>Andres Freund sent in a patch to fix an issue with large tables in two parts: a faster PageIsVerified() for the all zeroes case, and a much faster O-1 mfdvec, removing the quadratic behavior in same.</li>

<li>Simon Riggs sent in a patch to reduce logging of AccessExclusiveLocks for temp tables by skipping logging locks in the case of relation_open_temp().</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to track commit timestamps.</li>

</ul>