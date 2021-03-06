---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 avril 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/04/21/Nouvelles-hebdomadaires-de-PostgreSQL-20-avril-2014"
---


<p>La PGConf europ&eacute;enne 2014 se tiendra &agrave; Madrid (Espagne) du 21 au 24 octobre, &agrave; l'h&ocirc;tel Miguel Angel&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/">http://2014.pgconf.eu/</a></p>

<p>[ndt: r&eacute;sum&eacute; du dernier meetup parisien (le prochain aura peut-&ecirc;tre lieu au mois de juin)&nbsp;: 

<a target="_blank" href="http://tapoueh.org/blog/2014/04/17-Meetup-PostgreSQL.html">http://tapoueh.org/blog/2014/04/17-Meetup-PostgreSQL.html</a>]</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>barman 1.3.1, un gestionnaire de sauvegarde et restauration pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.pgbarman.org/">http://www.pgbarman.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-04/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140421042756.GJ24095@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>GIN entry pages follow the standard page layout - tell XLogInsert. The entry B-tree pages all follow the standard page layout. The 9.3 code has this right. I inadvertently changed this at some point during the big refactorings in git master. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1bd3842163f2b44e29938b5ab158bb6a589ff10c">http://git.postgresql.org/pg/commitdiff/1bd3842163f2b44e29938b5ab158bb6a589ff10c</a></li>

<li>Remove dead checks for invalid left page in ginDeletePage. In some places, the function assumes the left page is valid, and in others, it checks if it is valid. Remove all the checks. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3e6e3af560116adc20cc9d6e75bfe82a45def60">http://git.postgresql.org/pg/commitdiff/e3e6e3af560116adc20cc9d6e75bfe82a45def60</a></li>

<li>Set pd_lower on internal GIN posting tree pages. This allows squeezing out the unused space in full-page writes. And more importantly, it can be a useful debugging aid. In hindsight we should've done this back when GIN was added - we wouldn't need the 'maxoff' field in the page opaque struct if we had used pd_lower and pd_upper like on normal pages. But as long as there can be pages in the index that have been binary-upgraded from pre-9.4 versions, we can't rely on that, and have to continue using 'maxoff'. Most of the code churn comes from renaming some macros, now that they're used on internal pages, too. This change is completely backwards-compatible, no effect on pg_upgrade. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1dadd34fa9fccc72800ed206b8c274073dfd039">http://git.postgresql.org/pg/commitdiff/f1dadd34fa9fccc72800ed206b8c274073dfd039</a></li>

<li>Use correctly-sized buffer when zero-filling a WAL file. I mixed up BLCKSZ and XLOG_BLCKSZ when I changed the way the buffer is allocated a couple of weeks ago. With the default settings, they are both 8k, but they can be changed at compile-time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/848b9f05ab283724dd063d936a92568c1fdf422b">http://git.postgresql.org/pg/commitdiff/848b9f05ab283724dd063d936a92568c1fdf422b</a></li>

<li>Set the all-visible flag on heap page before writing WAL record, not after. If we set the all-visible flag after writing WAL record, and XLogInsert takes a full-page image of the page, the image would not include the flag. We will then proceed to set the VM bit, which would then be set without the corresponding all-visible flag on the heap page. Found by comparing page images on master and standby, after writing/replaying each WAL record. (There is still a discrepancy: the all-visible flag won't be set after replaying the HEAP_CLEAN record, even though it is set in the master. However, it will be set when replaying the HEAP2_VISIBLE record and setting the VM bit, so the all-visible flag and VM bit are always consistent on the standby, even though they are momentarily out-of-sync with master) Backpatch to 9.3 where this code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a8e1ac598c864ac2775f33da21a117c363c6c7f">http://git.postgresql.org/pg/commitdiff/2a8e1ac598c864ac2775f33da21a117c363c6c7f</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tab completion for event triggers. Ian Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b979524afb21c969234f7a0a9b1c97ceec4629d">http://git.postgresql.org/pg/commitdiff/7b979524afb21c969234f7a0a9b1c97ceec4629d</a></li>

<li>Update list of relation types on which ALTER TABLE RENAME/OWNER work. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c953540d285a94684b0c0dc7a2c338cb1d65ef0">http://git.postgresql.org/pg/commitdiff/0c953540d285a94684b0c0dc7a2c338cb1d65ef0</a></li>

<li>Correct description of constraint_name in ALTER TABLE documentation. Apparently, the old text was written at a time when the only use of constraint_name here was for a constraint to be dropped, but that's no longer true. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0aa6c06d4e114ecb7ed81a2168238bbcfd54878">http://git.postgresql.org/pg/commitdiff/f0aa6c06d4e114ecb7ed81a2168238bbcfd54878</a></li>

<li>doc: Update yet another place that didn't get the memo about matviews. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c050b2aae3b2f745ef61b379087cf9a67deea293">http://git.postgresql.org/pg/commitdiff/c050b2aae3b2f745ef61b379087cf9a67deea293</a></li>

<li>doc: Suggesting clearing pg_replslot from a hot filesystem backup. Maybe we'll settle on another way of solving this problem, but for now this is the recommended procedure. Per discussion with Michael Paquier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69671ab548459814d489315bf5cd421f84e984a4">http://git.postgresql.org/pg/commitdiff/69671ab548459814d489315bf5cd421f84e984a4</a></li>

<li>Try to fix spurious DSM failures on Windows. Apparently, Windows can sometimes return an error code even when the operation actually worked just fine. Rearrange the order of checks according to what appear to be the best practices in this area. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a81daab8be9a0b3769a2660db44a56a6035e34a">http://git.postgresql.org/pg/commitdiff/1a81daab8be9a0b3769a2660db44a56a6035e34a</a></li>

<li>Add to_regprocedure() and to_regoperator(). These are natural complements to the functions added by commit 0886fc6a5c75b294544263ea979b9cf6195407d9, but they weren't included in the original patch for some reason. Add them. Patch by me, per a complaint by Tom Lane. Review by Tatsuo Ishii. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dfc0219f649d5450a5e4d491dab1eeb23ac5530a">http://git.postgresql.org/pg/commitdiff/dfc0219f649d5450a5e4d491dab1eeb23ac5530a</a></li>

<li>Fix typo. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fab6170cabbd5af8ffabd2fcbf53e30287f11a41">http://git.postgresql.org/pg/commitdiff/fab6170cabbd5af8ffabd2fcbf53e30287f11a41</a></li>

<li>Fix another typo. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/602b27ab8e45fbb07cf5b275b0593b38190232e4">http://git.postgresql.org/pg/commitdiff/602b27ab8e45fbb07cf5b275b0593b38190232e4</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bogus handling of bad strategy number in GIST consistent() functions. Make sure we throw an error instead of silently doing the wrong thing when fed a strategy number we don't recognize. Also, in the places that did already throw an error, spell the error message in a way more consistent with our message style guidelines. Per report from Paul Jones. Although this is a bug, it won't occur unless a superuser tries to do something he shouldn't, so it doesn't seem worth back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4dfb065b3ab662dcc96d07ee7fc9dadf6975a0cb">http://git.postgresql.org/pg/commitdiff/4dfb065b3ab662dcc96d07ee7fc9dadf6975a0cb</a></li>

<li>Use AF_UNSPEC not PF_UNSPEC in getaddrinfo calls. According to the Single Unix Spec and assorted man pages, you're supposed to use the constants named AF_xxx when setting ai_family for a getaddrinfo call. In a few places we were using PF_xxx instead. Use of PF_xxx appears to be an ancient BSD convention that was not adopted by later standardization. On BSD and most later Unixen, it doesn't matter much because those constants have equivalent values anyway; but nonetheless this code is not per spec. In the same vein, replace PF_INET by AF_INET in one socket() call, which wasn't even consistent with the other socket() call in the same function let alone the remainder of our code. Per investigation of a Cygwin trouble report from Marco Atzeri. It's probably a long shot that this will fix his issue, but it's wrong in any case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cad4fe6455bdc9ef1026b4a247eeb588ab3a8bd6">http://git.postgresql.org/pg/commitdiff/cad4fe6455bdc9ef1026b4a247eeb588ab3a8bd6</a></li>

<li>Update oidjoins regression test for 9.4. Now that we're pretty much feature-frozen, it's time to update the checks on system catalog foreign-key references. (It looks like we missed doing this altogether for 9.3. Sigh.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbb5e23bfa92973bddf11935448a9d42c32f7d42">http://git.postgresql.org/pg/commitdiff/cbb5e23bfa92973bddf11935448a9d42c32f7d42</a></li>

<li>Fix contrib/postgres_fdw's remote-estimate representation of array Params. We were emitting "(SELECT null::typename)", which is usually interpreted as a scalar subselect, but not so much in the context "x = ANY(...)". This led to remote-side parsing failures when remote_estimate is enabled. A quick and ugly fix is to stick in an extra cast step, "((SELECT null::typename)::typename)". The cast will be thrown away as redundant by parse analysis, but not before it's done its job of making sure the grammar sees the ANY argument as an a_expr rather than a select_with_parens. Per an example from Hannu Krosing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b68d81697bcb0d16136bd037e454ee53c521185">http://git.postgresql.org/pg/commitdiff/5b68d81697bcb0d16136bd037e454ee53c521185</a></li>

<li>Rename EXPLAIN ANALYZE's "total runtime" output to "execution time". Now that EXPLAIN also outputs a "planning time" measurement, the use of "total" here seems rather confusing: it sounds like it might include the planning time which of course it doesn't. Majority opinion was that "execution time" is a better label, so we'll call it that. This should be noted as a backwards incompatibility for tools that examine EXPLAIN ANALYZE output. In passing, I failed to resist the temptation to do a little editing on the materialized-view example affected by this change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f86cbd714c9d43c0fbb43a7b172f77ebf429548">http://git.postgresql.org/pg/commitdiff/5f86cbd714c9d43c0fbb43a7b172f77ebf429548</a></li>

<li>Fix unused-variable warning on Windows. Introduced in 585bca39: msgid is not used in the Windows code path. Also adjust comments a tad (mostly to keep pgindent from messing it up). David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01563158235f5650743fd9b1dfa80c3d8faf89bb">http://git.postgresql.org/pg/commitdiff/01563158235f5650743fd9b1dfa80c3d8faf89bb</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b5a9d61a8202c46f4cc02878eafa8367080c59a">http://git.postgresql.org/pg/commitdiff/7b5a9d61a8202c46f4cc02878eafa8367080c59a</a></li>

<li>Add TAP tests for client programs. Reviewed-by: Pavel St&#283;hule &lt;pavel.stehule@gmail.com&gt; Reviewed-by: Erik Rijkers &lt;er@xs4all.nl&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d0f493f19607774fdccb1a1ea06fdd96a3d9698">http://git.postgresql.org/pg/commitdiff/7d0f493f19607774fdccb1a1ea06fdd96a3d9698</a></li>

<li>Add @configure_input@ marker to Makefile.global.in. That way, when looking at Makefile.global, we don't get confused by the comment that claims that this is Makefile.global.in. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3fd9327384abc1cd252ddd8ce9429ab7bef48b5">http://git.postgresql.org/pg/commitdiff/e3fd9327384abc1cd252ddd8ce9429ab7bef48b5</a></li>

<li>Have lcov call the right gcov. By default, lcov will call whatever gcov it can find in the path. But if the user has specified a different gcov to configure, this could be incompatible. So tell lcov explicitly with an option which gcov program to call. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d3b2b80aa6aee753f372bb0300a131691e9f55c">http://git.postgresql.org/pg/commitdiff/0d3b2b80aa6aee753f372bb0300a131691e9f55c</a></li>

<li>vacuumdb: Add option --analyze-in-stages. Add vacuumdb option --analyze-in-stages which runs ANALYZE three times with different configuration settings, adopting the logic from the analyze_new_cluster.sh script that pg_upgrade generates. That way, users of pg_dump/pg_restore can also use that functionality. Change pg_upgrade to create the script so that it calls vacuumdb instead of implementing the logic itself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c92c3d50d7fbe7391b5fc864b444346b2db29ffe">http://git.postgresql.org/pg/commitdiff/c92c3d50d7fbe7391b5fc864b444346b2db29ffe</a></li>

<li>Create function prototype as part of PG_FUNCTION_INFO_V1 macro Because of gcc -Wmissing-prototypes, all functions in dynamically loadable modules must have a separate prototype declaration. This is meant to detect global functions that are not declared in header files, but in cases where the function is called via dfmgr, this is redundant. Besides filling up space with boilerplate, this is a frequent source of compiler warnings in extension modules. We can fix that by creating the function prototype as part of the PG_FUNCTION_INFO_V1 macro, which such modules have to use anyway. That makes the code of modules cleaner, because there is one less place where the entry points have to be listed, and creates an additional check that functions have the right prototype. Remove now redundant prototypes from contrib and other modules. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7128e8dbb305059c30ec085461297e619bcbff4">http://git.postgresql.org/pg/commitdiff/e7128e8dbb305059c30ec085461297e619bcbff4</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>contrib/test_decoding: fix regression test for psql oid display changes. Missed in previous commit 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab76d8e9d672c661fe8ce4d9405dc8956b8ece9d">http://git.postgresql.org/pg/commitdiff/ab76d8e9d672c661fe8ce4d9405dc8956b8ece9d</a></li>

<li>psql: conditionally display oids and replication identity. In psql \d+, display oids only when they exist, and display replication identity only when it is non-default. Also document the defaults for replication identity for system and non-system tables. Update regression output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4168c00a5d9c0c0c17cdfc902587b6d22ea1720f">http://git.postgresql.org/pg/commitdiff/4168c00a5d9c0c0c17cdfc902587b6d22ea1720f</a></li>

<li>check socket creation errors against PGINVALID_SOCKET. Previously, in some places, socket creation errors were checked for negative values, which is not true for Windows because sockets are unsigned. This masked socket creation errors on Windows. Backpatch through 9.0. 8.4 doesn't have the infrastructure to fix this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41809346518a2b57530b22148609a346a718adc9">http://git.postgresql.org/pg/commitdiff/41809346518a2b57530b22148609a346a718adc9</a></li>

<li>doc: fix json_extract_path_text() typo by adding jsonb. Report from rudolf &lt;stu3.1@eq.cz&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed4a26260c6ebd7948eacc42eddae1e898239f6e">http://git.postgresql.org/pg/commitdiff/ed4a26260c6ebd7948eacc42eddae1e898239f6e</a></li>

<li>pg_upgrade: remove redundant include files. The files were already included by pg_upgrade.h. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95cb917297ebe77add3cef4f01cca1004031fa9a">http://git.postgresql.org/pg/commitdiff/95cb917297ebe77add3cef4f01cca1004031fa9a</a></li>

<li>docs: make max_wal_senders higher to handle disconnects. Document abrupt streaming client disconnection might leave slots in use, so max_wal_senders should be slightly higher than needed to allow for immediate reconnection. Per mention by Magnus 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c5334650085d441324e0f4fd9f8db12657b25c7">http://git.postgresql.org/pg/commitdiff/9c5334650085d441324e0f4fd9f8db12657b25c7</a></li>

<li>psql: update --help output for unaligned mode params. Previously it wasn't clear from --help that -F, -R, -z, -0 only controlled psql unaligned output. Initial patch from Jov &lt;amutu@amutu.com&gt;, adjustments by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c349ba5c04c3b5fdceb13c35996e7ff4b69585f">http://git.postgresql.org/pg/commitdiff/8c349ba5c04c3b5fdceb13c35996e7ff4b69585f</a></li>

<li>doc: move min_recovery_apply_delay into the right section. Patch by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be5f7fff470066dc3ee655b25840733eb9006426">http://git.postgresql.org/pg/commitdiff/be5f7fff470066dc3ee655b25840733eb9006426</a></li>

<li>libpq: use pgsocket for socket values, for portability. Previously, 'int' was used for socket values in libpq, but socket values are unsigned on Windows. This is a style correction. Initial patch and previous PGINVALID_SOCKET initial patch by Joel Jacobson, modified by me Report from PVS-Studio 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d305d86bd917723f09ab4f15c075d90586a210a">http://git.postgresql.org/pg/commitdiff/5d305d86bd917723f09ab4f15c075d90586a210a</a></li>

<li>docs: properly document psql auto encoding mode. In psql, both stdin and stdout must be terminals to get a client encoding of 'auto'. Patch by Albe Laurenz Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e183d11262f4e04ce7f191a9655aeeaa4682a7f5">http://git.postgresql.org/pg/commitdiff/e183d11262f4e04ce7f191a9655aeeaa4682a7f5</a></li>

<li>docs: adjustments for streaming standbys that disconnect frequently. Document problems when disconnection causes loss of hot_standby_feedback and suggest adjusting max_standby_archive_delay and max_standby_streaming_delay. Initial patch by Marko Tiikkaja, adjustments by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52e757420fa98a76015c2c88432db94269f3e8f4">http://git.postgresql.org/pg/commitdiff/52e757420fa98a76015c2c88432db94269f3e8f4</a></li>

<li>pg_upgrade: throw an error for non-existent tablespace directories. Non-existent tablespace directory references can occur if user tablespaces are created inside data directories and the data directory is renamed in preparation for running pg_upgrade, and the symbolic links are not updated. Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1275cf74172cd0ed478dbc31e34e2ffffc6e789">http://git.postgresql.org/pg/commitdiff/c1275cf74172cd0ed478dbc31e34e2ffffc6e789</a></li>

<li>report stat() error in trigger file check. Permissions might prevent the existence of the trigger file from being checked. Per report from Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83defef8c794e7772e4099a7efa2ebac3c62742c">http://git.postgresql.org/pg/commitdiff/83defef8c794e7772e4099a7efa2ebac3c62742c</a></li>

<li>pgcrypto: fix memset() calls that might be optimized away. Specifically, on-stack memset() might be removed, so: Replace memset() with px_memset(). Add px_memset to copy_crlf(). Add px_memset to pgp-s2k.c. Patch by Marko Kreen Report by PVS-Studio Backpatch through 8.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fe55259fd61fd9199907623f974caa7af66e780">http://git.postgresql.org/pg/commitdiff/9fe55259fd61fd9199907623f974caa7af66e780</a></li>

<li>libpq: have PQconnectdbParams() and PQpingParams accept "" as default. Previously, these functions treated "" optin values as defaults in some ways, but not in others, like when comparing to .pgpass. Also, add documentation to clarify that now "" and NULL use defaults, like PQsetdbLogin() has always done. BACKWARD INCOMPATIBILITY Patch by Adrian Vondendriesch, docs by me Report by Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13ecb822e8da5668133b706474c25bc908ae370a">http://git.postgresql.org/pg/commitdiff/13ecb822e8da5668133b706474c25bc908ae370a</a></li>

<li>docs: tablespaces cannot be accessed independently. Mention impossibility of moving tablespaces, backing them up independently, or the inadvisability of placing them on temporary file systems. Patch by Craig Ringer, adjustments by Ian Lawrence Warwick and me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4353d1809f6d10845be76dda1dad45013d0b14b8">http://git.postgresql.org/pg/commitdiff/4353d1809f6d10845be76dda1dad45013d0b14b8</a></li>

<li>doc: mention archive_command and recovery_command are exec'ed locally. Report by Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e8beed515b78d5a987c04ec047b7c9bee69ac83">http://git.postgresql.org/pg/commitdiff/0e8beed515b78d5a987c04ec047b7c9bee69ac83</a></li>

<li>doc: CREATE DATABASE doesn't copy template database-level config params. Report by Alexey Bashtanov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/012025f9ae20e174b81f71af45b467f9a62fe478">http://git.postgresql.org/pg/commitdiff/012025f9ae20e174b81f71af45b467f9a62fe478</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix timeout in LDAP lookup of libpq connection parameters. Bind attempts to an LDAP server should time out after two seconds, allowing additional lines in the service control file to be parsed (which provide a fall back to a secondary LDAP server or default options). The existing code failed to enforce that timeout during TCP connect, resulting in a hang far longer than two seconds if the LDAP server does not respond. Laurenz Albe 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/585bca393640b609c54159e1bedd30a89fec5ea8">http://git.postgresql.org/pg/commitdiff/585bca393640b609c54159e1bedd30a89fec5ea8</a></li>

<li>Fix typo. Amit Langote 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66b1084e2ccf1f5b8cb57ebb41f54f76850a2b5d">http://git.postgresql.org/pg/commitdiff/66b1084e2ccf1f5b8cb57ebb41f54f76850a2b5d</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Attempt to get plpython regression tests working again for MSVC builds. This has probably been broken for quite a long time. Buildfarm member currawong's current results suggest that it's been broken since 9.1, so backpatch this to that branch. This only supports Python 2 - I will handle Python 3 separately, but this is a fairly simple fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef158312e96960bfbc802ceda58f432f6fd845eb">http://git.postgresql.org/pg/commitdiff/ef158312e96960bfbc802ceda58f432f6fd845eb</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix object identities for text search objects. We were neglecting to schema-qualify them. Backpatch to 9.3, where object identities were introduced as a concept by commit f8348ea32ec8. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83ab8e32f24542e3ab1f73b24c57cdbed6a4c9e4">http://git.postgresql.org/pg/commitdiff/83ab8e32f24542e3ab1f73b24c57cdbed6a4c9e4</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Andreas 'ads' Scherbaum's patch to change iff to if. The former is actually correct.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Rowley sent in another revision of a patch to optimize window functions by allowing pushdowns of items matching PARTITION BY clauses.</li>

<li>Heikki Linnakangas sent in a patch to fix a race condition between PREPARE TRANSACTION and COMMIT PREPARED.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to implement CINE functionality for sequences.</li>

<li>Stephen Frost sent in another revision of a patch to implement row-level access controls.</li>

<li>Peter Geoghegan sent in a patch to improve on the current clock sweep algorithm for B-tree leaf pages.</li>

<li>Amit Kapila sent in a patch to fix a dsm invalid errcode issue.</li>

<li>Zoltan Boszormenyi sent in another rebased revision of the ECPG FETCH patch.</li>

<li>Nicholas White sent in another revision of a patch to make it possible for lag and lead window functions to ignore nulls.</li>

<li>Dmitri Voronin sent in a patch to add a new sslinfo extension which includes: ssl_get_count_of_extensions(), ssl_get_extension_names(), ssl_get_extension_value(text), and ssl_is_critical_extension(text).</li>

<li>Michael Paquier and Fabr&iacute;zio de Royes Mello traded patches to make it possible for the verbose output of pg_dump to include schema names for everything dumped.</li>

<li>MauMau sent in another revision of a patch to fix an issue where pg_ctl always uses the same event source on Windows.</li>

<li>Tom Lane sent in two more revisions of a patch to detoast composite array elements.</li>

<li>Mohammad Alhashash sent in a patch to allow empty targets in the unaccent dictionary.</li>

<li>Christian Ullrich sent in a patch to arrange things so on Windows, PostgreSQL silently ignores control-C and control-break when started via pg_ctl.</li>

<li>Michael Paquier sent in a patch to remove a dependency on wsock32.lib when compiling code on Windows.</li>

</ul>