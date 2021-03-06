---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 mai 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/05/10/Nouvelles-hebdomadaires-de-PostgreSQL-5-mai-2013"
---


<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

<li>Premier rassemblement utilisateurs/d&eacute;veloppeurs Postgres-XC apr&egrave;s le <em>Cluster Summit</em>&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PgCon2013CanadaClusterSummit#PostgresXC_Summit">https://wiki.postgresql.org/wiki/PgCon2013CanadaClusterSummit#PostgresXC_Summit</a></li>

<li>La 6&egrave;me conf&eacute;rence annuelle "Prague PostgreSQL Developers Day", organis&eacute;e par le CSPUG (Groupe des utilisateurs tch&egrave;ques et slovaques de PostgreSQL), aura lieu le 30 mai 2013 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Les candidatures des conf&eacute;renciers sont attendues jusqu'au 14 avril &agrave; l'adresse &lt;info AT p2d2 POINT cz&gt;. D'avantage d'informations sur le site&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le PgDay Fr est l'&eacute;v&eacute;nement majeur de la communaut&eacute; francophone. Il aura lieu le 13 juin 2013 &agrave; Nantes (France)&nbsp;: 

<a target="_blank" href="http://pgday.fr/">http://pgday.fr/</a></li>

<li><em>PostgreSQL Brazil</em> aura lieu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

<li>Notez la date&nbsp;! <em>Postgres Open 2013</em> aura lieu &agrave; Chicago (Illinois, USA) du 16 au 18 septembre. Hotel Sax&nbsp;: 

<a target="_blank" href="https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865">https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865</a><br>

Inscriptions pour les l&egrave;ve-t&ocirc;t&nbsp;: 

<a target="_blank" href="http://postgresopen-eac2.eventbrite.com/">http://postgresopen-eac2.eventbrite.com/</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130506034429.GA2211@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Introduce new page checksum algorithm and module. Isolate checksum calculation to its own module, so that bufpage knows little if anything about the details of the calculation. This implementation is a modified FNV-1a hash checksum, details of which are given in the new checksum.c header comments. Basic implementation only, so we fix the output value. Later related commits will add version numbers to pg_control, compiler optimization flags and memory barriers. Ants Aasma, reviewed by Jeff Davis and Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43e7a668499b8a69a62cc539a0fbe6983384339c">http://git.postgresql.org/pg/commitdiff/43e7a668499b8a69a62cc539a0fbe6983384339c</a></li>

<li>Compiler optimizations for page checksum code. Ants Aasma and Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdea2530bd4afb3d512cb9700b1d8cd603fab0e7">http://git.postgresql.org/pg/commitdiff/fdea2530bd4afb3d512cb9700b1d8cd603fab0e7</a></li>

<li>Ensure we MarkBufferDirty before visibilitymap_set() logs the heap page and sets the LSN. Otherwise a checkpoint could occur between those actions and leave us in an inconsistent state. Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/730924397c8151c3cf34e633211cd0fe4a0db112">http://git.postgresql.org/pg/commitdiff/730924397c8151c3cf34e633211cd0fe4a0db112</a></li>

<li>Record data_checksum_version in control file. The value is not used anywhere in code, but will allow future changes to the checksum version should that become necessary in the future. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/443951748ce4c94b001877c7cf88b0ee969c79e7">http://git.postgresql.org/pg/commitdiff/443951748ce4c94b001877c7cf88b0ee969c79e7</a></li>

<li>Bump PG_CONTROL_VERSION to 937 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ceabfb20f9a7aadbb09ee1a276726fc309a39300">http://git.postgresql.org/pg/commitdiff/ceabfb20f9a7aadbb09ee1a276726fc309a39300</a></li>

<li>Temporarily silence pg_upgrade's checksums check 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28377213bb6550cc5035b0ba258b518f80c1aaae">http://git.postgresql.org/pg/commitdiff/28377213bb6550cc5035b0ba258b518f80c1aaae</a></li>

<li>Revert previous temporary patch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be475a2473b18a62a02d56c44047e16b54aac54d">http://git.postgresql.org/pg/commitdiff/be475a2473b18a62a02d56c44047e16b54aac54d</a></li>

<li>Fix pg_upgrade for 9.3 with data checksums. Previous changes misconstrued pg_upgrade internals causing build farm breakages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87d3b35a1ca31a9d947a8f919a6006679216dff0">http://git.postgresql.org/pg/commitdiff/87d3b35a1ca31a9d947a8f919a6006679216dff0</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Attempt to fix error recovery in COPY BOTH mode. Previously, libpq and the backend had opposite ideas about whether it was necessary for the client to send a CopyDone message after receiving an ErrorResponse, making it impossible to cleanly exit COPY BOTH mode. Fix libpq so that works correctly, adopting the backend's notion that an ErrorResponse kills the copy in both directions. Adjust receivelog.c to avoid a degradation in the quality of the resulting error messages. libpqwalreceiver.c is already doing the right thing, so no adjustment needed there. Add an explicit statement to the documentation explaining how this part of the protocol is supposed to work, in the hopes of avoiding future confusion in this area. Since the consequences of all this confusion are very limited, especially in the back-branches where no client ever attempts to exit COPY BOTH mode without closing the connection entirely, no back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91fa8532f4053468acc08534a6aac516ccde47b7">http://git.postgresql.org/pg/commitdiff/91fa8532f4053468acc08534a6aac516ccde47b7</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Ensure ANALYZE phase is not skipped because of canceled truncate. Patch b19e4250b45e91c9cbdd18d35ea6391ab5961c8d attempted to preserve existing behavior regarding statistics generation in the case that a truncation attempt was canceled due to lock conflicts. It failed to do this accurately in two regards: (1) autovacuum had previously generated statistics if the truncate attempt failed to initially get the lock rather than having started the attempt, and (2) the VACUUM ANALYZE command had always generated statistics. Both of these changes were unintended, and are reverted by this patch. On review, there seems to be consensus that the previous failure to generate statistics when the truncate was terminated was more an unfortunate consequence of how that effort was previously terminated than a feature we want to keep; so this patch generates statistics even when an autovacuum truncation attempt terminates early. Another unintended change which is kept on the basis that it is an improvement is that when a VACUUM command is truncating, it will the new heuristic for avoiding blocking other processes, rather than keeping an AccessExclusiveLock on the table for however long the truncation takes. Per multiple reports, with some renaming per patch by Jeff Janes. Backpatch to 9.0, where problem was created. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fc893760f60d57aca30163796db1abe516b3fac">http://git.postgresql.org/pg/commitdiff/5fc893760f60d57aca30163796db1abe516b3fac</a></li>

<li>Add regression test for bug fixed by recent refactoring. Test case by Andres Freund for bug fixed by Tom Lane's refactoring in commit 5194024d72f33fb209e10f9ab0ada7cc67df45b7 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/200ba1667b3a8d7a9d559d2f05f83d209c9d8267">http://git.postgresql.org/pg/commitdiff/200ba1667b3a8d7a9d559d2f05f83d209c9d8267</a></li>

<li>Prevent (auto)vacuum from truncating first page of populated matview. Per report from Fujii Masao, with regression test using his example. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b69ec7cc990fd8da75ed4c232899503217d7b9ae">http://git.postgresql.org/pg/commitdiff/b69ec7cc990fd8da75ed4c232899503217d7b9ae</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Postpone creation of pathkeys lists to fix bug #8049. This patch gets rid of the concept of, and infrastructure for, non-canonical PathKeys; we now only ever create canonical pathkey lists. The need for non-canonical pathkeys came from the desire to have grouping_planner initialize query_pathkeys and related pathkey lists before calling query_planner. However, since query_planner didn't actually *do* anything with those lists before they'd been made canonical, we can get rid of the whole mess by just not creating the lists at all until the point where we formerly canonicalized them. There are several ways in which we could implement that without making query_planner itself deal with grouping/sorting features (which are supposed to be the province of grouping_planner). I chose to add a callback function to query_planner's API; other alternatives would have required adding more fields to PlannerInfo, which while not bad in itself would create an ABI break for planner-related plugins in the 9.2 release series. This still breaks ABI for anything that calls query_planner directly, but it seems somewhat unlikely that there are any such plugins. I had originally conceived of this change as merely a step on the way to fixing bug #8049 from Teun Hoogendoorn; but it turns out that this fixes that bug all by itself, as per the added regression test. The reason is that now get_eclass_for_sort_expr is adding the ORDER BY expression at the end of EquivalenceClass creation not the start, and so anything that is in a multi-member EquivalenceClass has already been created with correct em_nullable_relids. I am suspicious that there are related scenarios in which we still need to teach get_eclass_for_sort_expr to compute correct nullable_relids, but am not eager to risk destabilizing either 9.2 or 9.3 to fix bugs that are only hypothetical. So for the moment, do this and stop here. Back-patch to 9.2 but not to earlier branches, since they don't exhibit this bug for lack of join-clause-movement logic that depends on em_nullable_relids being correct. (We might have to revisit that choice if any related bugs turn up.) In 9.2, don't change the signature of make_pathkeys_for_sortclauses nor remove canonicalize_pathkeys, so as not to risk more plugin breakage than we have to. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db9f0e1d9a4a0842c814a464cdc9758c3f20b96c">http://git.postgresql.org/pg/commitdiff/db9f0e1d9a4a0842c814a464cdc9758c3f20b96c</a></li>

<li>Fix permission tests for views/tables proven empty by constraint exclusion. A view defined as "select &lt;something&gt; where false" had the curious property that the system wouldn't check whether users had the privileges necessary to select from it. More generally, permissions checks could be skipped for tables referenced in sub-selects or views that were proven empty by constraint exclusion (although some quick testing suggests this seldom happens in cases of practical interest). This happened because the planner failed to include rangetable entries for such tables in the finished plan. This was noticed in connection with erroneous handling of materialized views, but actually the issue is quite unrelated to matviews. Therefore, revert commit 200ba1667b3a8d7a9d559d2f05f83d209c9d8267 in favor of a more direct test for the real problem. Back-patch to 9.2 where the bug was introduced (by commit 7741dd6590073719688891898e85f0cb73453159). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50c137487c96e629e0e5372bb3d1b5f1a2f71a88">http://git.postgresql.org/pg/commitdiff/50c137487c96e629e0e5372bb3d1b5f1a2f71a88</a></li>

<li>Improve SPI documentation about null-flags arrays. Clarify the description of nulls[] arguments, and use the same wording for all SPI functions with this type of argument. Per gripe from Yuriy Rusinov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c091c431979c182bc835b345655c1c162479aeb3">http://git.postgresql.org/pg/commitdiff/c091c431979c182bc835b345655c1c162479aeb3</a></li>

<li>Improve behavior of \watch with non-tuple-returning commands. Print the command tag if we get PGRES_COMMAND_OK, and throw an error for other cases. Per gripe from Michael Paquier. In passing, add an fflush(), just to be real sure the output appears before we sleep. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/626e6eda4f605788110bfc5fa95760305f7eb749">http://git.postgresql.org/pg/commitdiff/626e6eda4f605788110bfc5fa95760305f7eb749</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert "pg_ctl: Add idempotent option." This reverts commit 87306184580c9c49717b00d48a2f9e717f21e0a8. The behavior in certain cases is still being debated, and it's too late to solve this before beta. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/187ca5e8e90baacc2d36c8bd0b08040f33c07fa1">http://git.postgresql.org/pg/commitdiff/187ca5e8e90baacc2d36c8bd0b08040f33c07fa1</a></li>

<li>pg_upgrade: Remove PGPORT handling from test suite. This code was left over from when pg_upgrade paid attention to PGPORT. Now it would only affects the regression test run before the test run of pg_upgrade. You can still set PGPORT for that, but there is no reason to have the test driver default it to 50432. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d53173e20d151341f894f79d556768c845ba3e4">http://git.postgresql.org/pg/commitdiff/3d53173e20d151341f894f79d556768c845ba3e4</a></li>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/539ecc92415a51bccb0805348a2a414a8e8ab7e7">http://git.postgresql.org/pg/commitdiff/539ecc92415a51bccb0805348a2a414a8e8ab7e7</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use correct length to convert json unicode escapes. Bug reported on IRC - fix due to Andrew Gierth. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f8b4319b94476de715ffef9183227ac6f4925c0">http://git.postgresql.org/pg/commitdiff/5f8b4319b94476de715ffef9183227ac6f4925c0</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_test_fsync: update output to show usecs/op clearer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/095018bc32b70eff95bdf3c2959e6eef09dcfa6a">http://git.postgresql.org/pg/commitdiff/095018bc32b70eff95bdf3c2959e6eef09dcfa6a</a></li>

<li>9.3 release notes: suggested improvements from Jeff Janes and Josh Berkus 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8f61ebdc6e0a260efeef432239d4d2e8202a30d">http://git.postgresql.org/pg/commitdiff/c8f61ebdc6e0a260efeef432239d4d2e8202a30d</a></li>

<li>9.3 release notes: update for current commits. Also, remove broken link in release.sgml. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fcf944c2303232826be49c09943849480719936">http://git.postgresql.org/pg/commitdiff/5fcf944c2303232826be49c09943849480719936</a></li>

<li>9.3 release notes: add markup for text. Still need to add links for new features. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14c7a74b6ebe4743b79e4f500503ffaa8c8a8638">http://git.postgresql.org/pg/commitdiff/14c7a74b6ebe4743b79e4f500503ffaa8c8a8638</a></li>

<li>9.3 release notes: Add links to SGML sections 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15f27aebbb688495da8a77a1ae67ded38f569829">http://git.postgresql.org/pg/commitdiff/15f27aebbb688495da8a77a1ae67ded38f569829</a></li>

<li>9.3 release notes: Add markup for pg_backup_start_time() 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1136d7a74d9feeab556a970b4b1e548e05f92a70">http://git.postgresql.org/pg/commitdiff/1136d7a74d9feeab556a970b4b1e548e05f92a70</a></li>

<li>9.3 release notes: move compatibility items into their own section 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2497dc0867afd5b51d50e090fce2e828baadc8c3">http://git.postgresql.org/pg/commitdiff/2497dc0867afd5b51d50e090fce2e828baadc8c3</a></li>

<li>9.3 release notes: adjustments. Fixes from Peter Geoghegan, Ian Lawrence Barwick, Marti Raudsepp 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c008ca6015732da09416381710066540cbfa735b">http://git.postgresql.org/pg/commitdiff/c008ca6015732da09416381710066540cbfa735b</a></li>

<li>docs: fix log_line_prefix session id docs. Backpatch to 9.2. Report from Ian Lawrence Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/262a3629971bdf61c309843b385a58d97bf4badb">http://git.postgresql.org/pg/commitdiff/262a3629971bdf61c309843b385a58d97bf4badb</a></li>

<li>9.3 docs: wording fixes From Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75d1406a194d16823e786a8d5094abd1e7e5661b">http://git.postgresql.org/pg/commitdiff/75d1406a194d16823e786a8d5094abd1e7e5661b</a></li>

<li>docs: log_line_prefix session id fix. Restore 4-byte designation for docs. Fix 9.3 doc query to properly pad to four digits. Backpatch to all active branches Per suggestions from Ian Lawrence Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f87f214b7c09e20d954fae887809c41cc5ca68df">http://git.postgresql.org/pg/commitdiff/f87f214b7c09e20d954fae887809c41cc5ca68df</a></li>

<li>docs: Improve log_line_prefix session_id query 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/083d8fa79dbd693f48c1c195bf4f2af3d1e7dc67">http://git.postgresql.org/pg/commitdiff/083d8fa79dbd693f48c1c195bf4f2af3d1e7dc67</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in comment. WAL segment means a 16 Matteo Beccati physical WAL file; this comment meant a logical 4 GB log file. Amit Langote. Apply to backbranches only, as the comment is gone in master. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fa56e636e42d1bc969483ed1f2c93d47abe39ba">http://git.postgresql.org/pg/commitdiff/7fa56e636e42d1bc969483ed1f2c93d47abe39ba</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fabien COELHO sent in four revisions of a patch to add a --throttle option to pgbench.</li>

<li>Peter Eisentraut sent in a PoC patch to allow back branches to compile with gcc 4.8.0 and higher.</li>

<li>Kevin Grittner and Tom Lane swapped patches intended to iron out remaining "stop ship" bugs in materialized views.</li>

<li>Jeff Davis sent in a patch to fix some issues in page checksums.</li>

<li>Fabien COELHO sent in a patch to add a --progress option to pgbench.</li>

<li>Fabien COELHO sent in a patch to add long options to pgbench.</li>

<li>Fujii Masao sent in a patch to clarify the usage of the --idempotent option in pg_ctl.</li>

</ul>