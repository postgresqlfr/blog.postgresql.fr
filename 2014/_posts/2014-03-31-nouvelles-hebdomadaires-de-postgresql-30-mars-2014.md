---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 mars 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/03/31/Nouvelles-hebdomadaires-de-PostgreSQL-30-mars-2014"
---


<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140331064454.GA32171@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix "the the" typos. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ed249b74133bc567a4efcfb90eb69d445097c1b">http://git.postgresql.org/pg/commitdiff/3ed249b74133bc567a4efcfb90eb69d445097c1b</a></li>

<li>Remove dead code and add comments. 'cbuffer' variable was left over from an earlier version of the patch to rewrite the incomplete split handling. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f3afc09793da3a30f2878f34eda30a71060da7e">http://git.postgresql.org/pg/commitdiff/2f3afc09793da3a30f2878f34eda30a71060da7e</a></li>

<li>Change ginMergeItemPointers to return a palloc'd array. That seems nicer than making it the caller's responsibility to pass a suitable-sized array. All the callers were just palloc'ing an array anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb42e21be274a71f6868ce2fc8fae2c15c3ecf66">http://git.postgresql.org/pg/commitdiff/bb42e21be274a71f6868ce2fc8fae2c15c3ecf66</a></li>

<li>Fix 'recheck' flag in tsquery's GIN tri-consistent function. It needs to be initialized, like in the boolean gin_tsquery_consistent version. Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86cf41ed27f6e822a99998505ecffb42f2662662">http://git.postgresql.org/pg/commitdiff/86cf41ed27f6e822a99998505ecffb42f2662662</a></li>

<li>Use pg_usleep() instead of plain sleep(), to fix Windows build. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28475f8e58bd5da2b44a42203665a543f335c6a3">http://git.postgresql.org/pg/commitdiff/28475f8e58bd5da2b44a42203665a543f335c6a3</a></li>

<li>Add -f/--follow option to pg_xlogdump. This is useful for seeing what WAL records are inserted in real-time, by pointing pg_xlogdump to a live server. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce9bb92f8fb8d25cf00ec939797ffdb5930fb792">http://git.postgresql.org/pg/commitdiff/ce9bb92f8fb8d25cf00ec939797ffdb5930fb792</a></li>

<li>Pass more than the first XLogRecData entry to rm_desc, with WAL_DEBUG. If you compile with WAL_DEBUG and enable it with wal_debug=on, we used to only pass the first XLogRecData entry to the rm_desc routine. I think the original assumprion was that the first XLogRecData entry contains all the necessary information for the rm_desc routine, but that's a pretty shaky assumption. At least standby_redo didn't get the memo. To fix, piece together all the data in a temporary buffer, and pass that to the rm_desc routine. It's been like this forever, but the patch didn't apply cleanly to back-branches. Probably wouldn't be hard to fix the conflicts, but it's not worth the trouble. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2a6724823c14fd442c5441eb169b2581781fef0">http://git.postgresql.org/pg/commitdiff/c2a6724823c14fd442c5441eb169b2581781fef0</a></li>

<li>Silence compiler warnings in new jsonb code. Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e709ced1536d1ed34d96633ea7c319a3a2a2751c">http://git.postgresql.org/pg/commitdiff/e709ced1536d1ed34d96633ea7c319a3a2a2751c</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix START_REPLICATION syntax in document. Enclose "TIMELINE tli" part with brackets because it's optional. Backport to 9.3 where TIMELINE option was introduced. Noted by Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf5d38f4b9bcdf035c46ca8b3e5442557a21ef34">http://git.postgresql.org/pg/commitdiff/cf5d38f4b9bcdf035c46ca8b3e5442557a21ef34</a></li>

<li>Don't forget to flush XLOG_PARAMETER_CHANGE record. Backpatch to 9.0 where XLOG_PARAMETER_CHANGE record was instroduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49638868f81f05e9ea4799e6c6148b76b47da83d">http://git.postgresql.org/pg/commitdiff/49638868f81f05e9ea4799e6c6148b76b47da83d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix ts_rank_cd() to ignore stripped lexemes. Previously, stripped lexemes got a default location and could be considered if mixed with non-stripped lexemes. BACKWARD INCOMPATIBILITY CHANGE 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1420f3a9827a39e5c6c998f6fa35a6fc97903145">http://git.postgresql.org/pg/commitdiff/1420f3a9827a39e5c6c998f6fa35a6fc97903145</a></li>

<li>docs: Add short "cover density" description. Also, previous commit 1420f3a9827a39e5c6c998f6fa35a6fc97903145 to fix ts_rank_cd() for stripped lexemes was from a patch created by Alex Hill. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b5c0f3bc78d72b753387f84b9188709af3ef8fb">http://git.postgresql.org/pg/commitdiff/0b5c0f3bc78d72b753387f84b9188709af3ef8fb</a></li>

<li>Remove wchar.c Asserts that were stricter than the main code. Assert errors were thrown for functions being passed invalid encodings, while the main code handled it just fine. Also document that libpq's PQclientEncoding() returns -1 for an encoding lookup failure. Per report from Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5db55c6bbca28b8be4d68d2fa0e22465cfe8e755">http://git.postgresql.org/pg/commitdiff/5db55c6bbca28b8be4d68d2fa0e22465cfe8e755</a></li>

<li>doc: list unlogged tables as a non-durable option 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c5ced1526b189ed98baa0d195a7078d1afd112e">http://git.postgresql.org/pg/commitdiff/6c5ced1526b189ed98baa0d195a7078d1afd112e</a></li>

<li>pg_upgrade: use pg_usleep(); remove Windows workaround 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba08155bd5e6dffe5cd4bda9e7d6616b5e20d564">http://git.postgresql.org/pg/commitdiff/ba08155bd5e6dffe5cd4bda9e7d6616b5e20d564</a></li>

<li>psql: update "replica identity" display for \d+. Display "replica identity" only for \d plus mode, exclude system schema objects, and display all possible values, not just non-default, non-index ones. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b69c4e65bea92ef617581365c365d2f43aa9e1fa">http://git.postgresql.org/pg/commitdiff/b69c4e65bea92ef617581365c365d2f43aa9e1fa</a></li>

<li>contrib/test_decoding: adjust expected output. Expected output has changed because of psql replica identity output changes. Reported by Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5906e10a2aecf472c41b2cb5a2a923c7bbabdce2">http://git.postgresql.org/pg/commitdiff/5906e10a2aecf472c41b2cb5a2a923c7bbabdce2</a></li>

<li>Adjust getpwuid() fix commit to display errno string on failure. This adjusts patch 613c6d26bd42dd8c2dd0664315be9551475b8864. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1827012ed4119150e29c3afcf462d3353f3a405">http://git.postgresql.org/pg/commitdiff/e1827012ed4119150e29c3afcf462d3353f3a405</a></li>

<li>psql: display "Replica Identity" only for FULL and NOTHING. INDEX is already displayed on the index, and we now exclude pg_catalog. DEFAULT is not displayed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d66116444b9763bc09defb688fb09343420e040">http://git.postgresql.org/pg/commitdiff/9d66116444b9763bc09defb688fb09343420e040</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typos in pg_basebackup documentation. Joshua Tolley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36f7c3a1e019d16a83a363958c3f3927692821d9">http://git.postgresql.org/pg/commitdiff/36f7c3a1e019d16a83a363958c3f3927692821d9</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tidy up the populate/to_record{set} code for json a bit. In the process fix a small bug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbc3def8620953cf124aac65e7be4821f138c37f">http://git.postgresql.org/pg/commitdiff/fbc3def8620953cf124aac65e7be4821f138c37f</a></li>

<li>Cleanup around json_to_record/json_to_recordset Set function parameter names and defaults. Add jsonb versions (which the code already provided for so the actual new code is trivial). Add jsonb regression tests and docs. Bump catalog version (which I apparently forgot to do when jsonb was committed). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9c6d72cbf49257fea4265d994b96e66f25b2474">http://git.postgresql.org/pg/commitdiff/f9c6d72cbf49257fea4265d994b96e66f25b2474</a></li>

<li>Fix uninitialized variables in json's populate_record_worker(). Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e4d1600a621ee4e786e715bc82eaad1113dba0e">http://git.postgresql.org/pg/commitdiff/7e4d1600a621ee4e786e715bc82eaad1113dba0e</a></li>

<li>Use separate output dirs for test_decoding's two runs. contrib/test_decoding's "make check" runs two sets of tests. Unless we specify separate output directories for each set the isolation tests will overwrite the output from the normal regression set. Doing this will help the buildfarm collect complete logs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7317d8d961f210c3a6b20972cd605bcd9bffb06e">http://git.postgresql.org/pg/commitdiff/7317d8d961f210c3a6b20972cd605bcd9bffb06e</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix refcounting bug in PLy_modify_tuple(). We must increment the refcount on "plntup" as soon as we have the reference, not sometime later. Otherwise, if an error is thrown in between, the Py_XDECREF(plntup) call in the PG_CATCH block removes a refcount we didn't add, allowing the object to be freed even though it's still part of the plpython function's parsetree. This appears to be the cause of crashes seen on buildfarm member prairiedog. It's a bit surprising that we've not seen it fail repeatably before, considering that the regression tests have been exercising the faulty code path since 2009. The real-world impact is probably minimal, since it's unlikely anyone would be provoking the "Tom Dunstan["new"] is not a dictionary" error in production, and that's the only case that is actually wrong. Still, it's a bug affecting the regression tests, so patch all supported branches. In passing, remove dead variable "plstr", and demote "platt" to a local variable inside the PG_TRY block, since we don't need to clean it up in the PG_CATCH path. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d5e0f07de0119045fb889f9c11de0e486ce4ac5">http://git.postgresql.org/pg/commitdiff/2d5e0f07de0119045fb889f9c11de0e486ce4ac5</a></li>

<li>Document that Python 2.3 requires cdecimal module for full functionality. This has been true for some time, but we were leaving users to discover it the hard way. Back-patch to 9.2. It might've been true before that, but we were claiming Python 2.2 compatibility before that, so I won't guess at the exact requirements back then. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3cfc23195e3363ceab49449ed851944bcaf0849">http://git.postgresql.org/pg/commitdiff/f3cfc23195e3363ceab49449ed851944bcaf0849</a></li>

<li>Improve documentation note about Python 2.3 and cdecimal. Explain exactly what fails (ie, function arguments of type numeric) if you don't have it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5a452b3a4600dfc9c045e1591c25e6a567d8d73">http://git.postgresql.org/pg/commitdiff/e5a452b3a4600dfc9c045e1591c25e6a567d8d73</a></li>

<li>Un-break peer authentication. Commit 613c6d26bd42dd8c2dd0664315be9551475b8864 sloppily replaced a lookup of the UID obtained from getpeereid() with a lookup of the server's own user name, thus totally destroying peer authentication. Revert. Per report from Christoph Berg. In passing, make sure get_user_name() zeroes *errstr on success on Windows as well as non-Windows. I don't think any callers actually depend on this ATM, but we should be consistent across platforms. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b777be0d48a042f500cac72140ffb50392973aa2">http://git.postgresql.org/pg/commitdiff/b777be0d48a042f500cac72140ffb50392973aa2</a></li>

<li>Fix EquivalenceClass processing for nested append relations. The original coding of EquivalenceClasses didn't foresee that appendrel child relations might themselves be appendrels; but this is possible for example when a UNION ALL subquery scans a table with inheritance children. The oversight led to failure to optimize ordering-related issues very well for the grandchild tables. After some false starts involving explicitly flattening the appendrel representation, we found that this could be fixed easily by removing a few implicit assumptions about appendrel parent rels not being children themselves. Kyotaro Horiguchi and Tom Lane, reviewed by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a87c729153e372f3731689a7be007bc2b53f1410">http://git.postgresql.org/pg/commitdiff/a87c729153e372f3731689a7be007bc2b53f1410</a></li>

<li>Improve regression test for pg_filenode_relation(). Make it print the details in case there's a failure. Andres Freund, slightly modified by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9613a1d98e5f940d8124850e61b0a950157c8863">http://git.postgresql.org/pg/commitdiff/9613a1d98e5f940d8124850e61b0a950157c8863</a></li>

<li>Fix dumping of a materialized view that depends on a table's primary key. It is possible for a view or materialized view to depend on a table's primary key, if the view query relies on functional dependency to abbreviate a GROUP BY list. This is problematic for pg_dump since we ordinarily want to dump view definitions in the pre-data section but indexes in post-data. pg_dump knows how to deal with this situation for regular views, by breaking the view's ON SELECT rule apart from the view proper. But it had not been taught what to do about materialized views, and in fact mistakenly dumped them as regular views in such cases, as seen in bug #9616 from Jesse Denardo. If we had CREATE OR REPLACE MATERIALIZED VIEW, we could fix this in a manner analogous to what's done for regular views; but we don't yet, and we'd not back-patch such a thing into 9.3 anyway. As a hopefully- temporary workaround, break the circularity by postponing the matview into post-data altogether when this case occurs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62215de2925705bc607635e45ff800364456b1a1">http://git.postgresql.org/pg/commitdiff/62215de2925705bc607635e45ff800364456b1a1</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Force consistent row order in contrib/test_decoding regression test. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ed908be41fbca1635d34f97138abb13beab8b24">http://git.postgresql.org/pg/commitdiff/7ed908be41fbca1635d34f97138abb13beab8b24</a></li>

<li>Document platform-specificity of unix_socket_permissions. Back-patch to 8.4 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbd32b0cab806a2244bd5171e4b60e53f4a9dfe7">http://git.postgresql.org/pg/commitdiff/fbd32b0cab806a2244bd5171e4b60e53f4a9dfe7</a></li>

<li>Secure Unix-domain sockets of "make check" temporary clusters. Any OS user able to access the socket can connect as the bootstrap superuser and in turn execute arbitrary code as the OS user running the test. Protect against that by placing the socket in the temporary data directory, which has mode 0700 thanks to initdb. Back-patch to 8.4 (all supported versions). The hazard remains wherever the temporary cluster accepts TCP connections, notably on Windows. Attempts to run "make check" from a directory with a long name will now fail. An alternative not sharing that problem was to place the socket in a subdirectory of /tmp, but that is only secure if /tmp is sticky. The PG_REGRESS_SOCK_DIR environment variable is available as a workaround when testing from long directory paths. As a convenient side effect, this lets testing proceed smoothly in builds that override DEFAULT_PGSOCKET_DIR. Popular non-default values like /var/run/postgresql are often unwritable to the build user. Security: CVE-2014-0067 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31c6e54ec9abab0c63d709e492ef18a701b02641">http://git.postgresql.org/pg/commitdiff/31c6e54ec9abab0c63d709e492ef18a701b02641</a></li>

<li>Revert "Secure Unix-domain sockets of "make check" temporary clusters." About half of the buildfarm members use too-long directory names, strongly suggesting that this approach is a dead end. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f5578d0f9681ef81bc71a3762a191d66a29c8b1">http://git.postgresql.org/pg/commitdiff/8f5578d0f9681ef81bc71a3762a191d66a29c8b1</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Kaigai Kouhei sent in another revision of a patch to implement custom plan nodes.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to implement plpgsql.extra_warnings, plpgsql.extra_errors.</li>

<li>MauMau sent in another revision of a patch to fix an issue where PostgreSQL fails to start on Windows if it crashes after tablespace creation.</li>

<li>Michael Paquier sent in a patch to add a new parameter RollbackError to control rollback behavior on error.</li>

<li>Etsuro Fujita sent in two more revisions of a patch to implement inherit support for foreign tables.</li>

<li>David Rowley and Florian Pflug traded patches to implement inverse transition functions for aggregates.</li>

<li>Peter Geoghegan sent in a patch to fix an infelicity in jsonfuncs.c.</li>

<li>Ants Aasma sent in a patch to add in a missing pfree in logical_heap_rewrite_flush_mappings().</li>

<li>Rajeev Rastogi sent in a patch to fix an issue where datistemplate of pg_database does not behave as per description in documentation.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement the custom plan interface.</li>

<li>Tomas Vondra sent in a patch to decreasing memory needlessly consumed by array_agg.</li>

<li>Peter Geoghegan sent in a patch to do better at HINTing an appropriate column within errorMissingColumn().</li>

<li>Jan Pecek (honzap AT gmail DOT com) sent in a patch to fix an issue where storinig data in pg_toast for a custom type fails.</li>

<li>Bruce Momjian and Fabr&iacute;zio de Royes Mello traded patches to change the display of OID-ness for tables in psql.</li>

<li>Peter Geoghegan sent in a patch to extend SortSupport and tuplesort to support "poor man's normalized keys".</li>

</ul>