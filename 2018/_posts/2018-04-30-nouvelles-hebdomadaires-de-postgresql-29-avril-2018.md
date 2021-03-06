---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 avril 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/04/30/Nouvelles-hebdomadaires-de-PostgreSQL-29-avril-2018"
---


<p>Le PUG de Portland organise un PGDay le 10 septembre 2018 &agrave; Portland, Oregon. L'appel &agrave; conf&eacute;renciers se passe par l&agrave;&nbsp;: <a target="_blank" href="https://goo.gl/forms/E0CiUQGSZGMYwh922">https://goo.gl/forms/E0CiUQGSZGMYwh922</a> <a target="_blank" href="https://pdx.postgresql.us/pdxpgday2018">https://pdx.postgresql.us/pdxpgday2018</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pspg 1.1.0, un paginateur con&ccedil;u pour PostgreSQL&nbsp;: <a target="_blank" href="http://okbob.blogspot.com/2018/04/pspg-11-with-readline-support.html">http://okbob.blogspot.com/2018/04/pspg-11-with-readline-support.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en avril</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-04/">http://archives.postgresql.org/pgsql-jobs/2018-04/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La <em>PGConfNepal 2018</em> se tiendra les 4 & 5 mai 2018 &agrave; l'universit&eacute; de Katmandou, Dulikhel, N&eacute;pal&nbsp;: <a target="_blank" href="https://postgresconf.org/conferences/Nepal2018">https://postgresconf.org/conferences/Nepal2018</a></li>

<li>[ndt: PostgreSQL Meetup Nantes #10 le 29 mai&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril 2018, et les inscriptions sont ouvertes jusqu'au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180429222104.GA25267@fetter.org">http://www.postgresql.org/message-id/20180429222104.GA25267@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Add comment explaining BGWORKER_BYPASS_ALLOWCONN. Suggested by Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/43cc4ee6340779f2a17fb5bab27355c2cb2e23a">https://git.postgresql.org/pg/commitdiff/43cc4ee6340779f2a17fb5bab27355c2cb2e23a</a></li>

<li>Fix typo. Author: Michael Paquier <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7f58f666cdeee8016fd4ec7aa79629c983ecc3bd">https://git.postgresql.org/pg/commitdiff/7f58f666cdeee8016fd4ec7aa79629c983ecc3bd</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Make PGJIT_* macros safer. Author: David Rowley Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAKJS1f8Ge2y0sDs6RQEJFH-vjb-bWhs86rCX4Fp4FZ+TmxtRkw@mail.gmail.com">https://www.postgresql.org/message-id/CAKJS1f8Ge2y0sDs6RQEJFH-vjb-bWhs86rCX4Fp4FZ+TmxtRkw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6a7b2ce2bdb9ab5fd23c98ace4bb2d811231706a">https://git.postgresql.org/pg/commitdiff/6a7b2ce2bdb9ab5fd23c98ace4bb2d811231706a</a></li>

<li>Remove outdated comment on how to set logtape's read buffer size. Commit b75f467b6e removed the LogicalTapeAssignReadBufferSize() function, but forgot to update this comment. The read buffer size is an argument to LogicalTapeRewindForRead() now. Doesn't seem worth going into the details in the file header comment, so remove the outdated sentence altogether. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/45f87b7710214ea71947ee3678c6b7cb61580797">https://git.postgresql.org/pg/commitdiff/45f87b7710214ea71947ee3678c6b7cb61580797</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Fix wrong validation of top-parent pointer during page deletion in Btree. After introducing usage of t_tid of inner or page high key for storing number of attributes of tuple, validation of tuple's ItemPointer with ItemPointerIsValid becomes incorrect, it's need to validate only blocknumber of ItemPointer. Missing this causes a incorrect page deletion, fix that. Test is added. BTW, current contrib/amcheck doesn't fail on index corrupted by this way. Also introduce BTreeTupleGetTopParent/BTreeTupleSetTopParent macroses to improve code readability and to avoid possible confusion with page high key: high key is used to store top-parent link for branch to remove. Bug found by Michael Paquier, but bug doesn't exist in previous versions because t_tid was set to P_HIKEY. Author: Teodor Sigaev Reviewer: Peter Geoghegan Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/20180419052436.GA16000%40paquier.xyz">https://www.postgresql.org/message-id/flat/20180419052436.GA16000%40paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6db4b49986be3fe59a1f6ba6fabf9852864efc3e">https://git.postgresql.org/pg/commitdiff/6db4b49986be3fe59a1f6ba6fabf9852864efc3e</a></li>

<li>Update trigram example in docs to correct state. Author: Liudmila Mantrova <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9975c128a1d1bd7e7366adf133b21540a2bc2450">https://git.postgresql.org/pg/commitdiff/9975c128a1d1bd7e7366adf133b21540a2bc2450</a></li>

<li>Make bms_prev_member work correctly with a 64 bit bitmapword. 5c067521 erroneously had coded bms_prev_member assuming that a bitmapword would always hold 32 bits and started it's search on what it thought was the highest 8-bits of the word. This was not the case if bitmapwords were 64 bits. In passing add a test to exercise this function a little. Previously there was no coverage at all. David Rowly <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a5ab8928d7d9e2cf76ed0590efbd9795ea9e5b5e">https://git.postgresql.org/pg/commitdiff/a5ab8928d7d9e2cf76ed0590efbd9795ea9e5b5e</a></li>

<li>Add missing and dangling downlink checks to amcheck. When bt_index_parent_check() is called with the heapallindexed option, allocate a second Bloom filter to fingerprint block numbers that appear in the downlinks of internal pages. Use Bloom filter probes when walking the B-Tree to detect missing downlinks. This can detect subtle problems with page deletion/VACUUM, such as corruption caused by the bug just fixed in commit 6db4b499. The downlink Bloom filter is bound in size by work_mem. Its optimal size is typically far smaller than that of the regular heapallindexed Bloom filter, especially when the index has high fan-out. Author: Peter Geoghegan Reviewer: Teodor Sigaev Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-WznUzY4fWTjm1tBB3JpVz8cCfz7k_qVp5BhuPyhivmWJFg@mail.gmail.com">https://postgr.es/m/CAH2-WznUzY4fWTjm1tBB3JpVz8cCfz7k_qVp5BhuPyhivmWJFg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4eaf7eaccb291f5d32d9f05284bfca9c5744de9a">https://git.postgresql.org/pg/commitdiff/4eaf7eaccb291f5d32d9f05284bfca9c5744de9a</a></li>

<li>Add amcheck missing downlink tests. Also use palloc0() for main amcheck state, and adjust a few comments. Somehow I pushed old version of patch in commit 4eaf7eaccb291f5d32d9f05284bfca9c5744de9a, so commit the difference. Peter Geoghegan <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f35f30f74b6abb0a2f47c91c20df606cf166e8ff">https://git.postgresql.org/pg/commitdiff/f35f30f74b6abb0a2f47c91c20df606cf166e8ff</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Add missing pstrdup. Lifetime of the input string is not right, so create a separate copy. Author: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/a2773420-50d1-0a42-3396-fe42b0921134@lab.ntt.co.jp">https://postgr.es/m/a2773420-50d1-0a42-3396-fe42b0921134@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bc972072a3bb77e51a7937b05d25b41ba96aa011">https://git.postgresql.org/pg/commitdiff/bc972072a3bb77e51a7937b05d25b41ba96aa011</a></li>

<li>Add GUC enable_partition_pruning. This controls both plan-time and execution-time new-style partition pruning. While finer-grain control is possible (maybe using an enum GUC instead of boolean), there doesn't seem to be much need for that. This new parameter controls partition pruning for all queries: trivially, SELECT queries that affect partitioned tables are naturally under its control since they are using the new technology. However, while UPDATE/DELETE queries do not use the new code, we make the new GUC control their behavior also (stealing control from constraint_exclusion), because it is more natural, and it leads to a more natural transition to the future in which those queries will also use the new pruning code. Constraint exclusion still controls pruning for regular inheritance situations (those not involving partitioned tables). Author: David Rowley Review: Amit Langote, Ashutosh Bapat, Justin Pryzby, David G. Johnston Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f_0HwsxJG9m+nzU+CizxSdGtfe6iF_ykPYBiYft302DCw@mail.gmail.com">https://postgr.es/m/CAKJS1f_0HwsxJG9m+nzU+CizxSdGtfe6iF_ykPYBiYft302DCw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/055fb8d33da6ff9003e3da4b9944bdcd2e2b2a49">https://git.postgresql.org/pg/commitdiff/055fb8d33da6ff9003e3da4b9944bdcd2e2b2a49</a></li>

<li>Remove useless default clause in switch. The switch covers all values of the enum driver variable, so having a default: clause is useless, even if it's only to do Assert(false). <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dfce1f9e4eef3adcccbb23670fa1c432eebb0b90">https://git.postgresql.org/pg/commitdiff/dfce1f9e4eef3adcccbb23670fa1c432eebb0b90</a></li>

<li>Initialize ExprStates once in run-time partition pruning. Instead of doing ExecInitExpr every time a Param needs to be evaluated in run-time partition pruning, do it once during run-time pruning set-up and cache the exprstate in PartitionPruneContext, saving a lot of work. Author: David Rowley Reviewed-by: Amit Langote, &Aacute;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f8-x+q-90QAPDu_okhQBV4DPEtPz8CJ=m0940GyT4DA4w@mail.gmail.com">https://postgr.es/m/CAKJS1f8-x+q-90QAPDu_okhQBV4DPEtPz8CJ=m0940GyT4DA4w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1957f8dabf8daa29c78d05f971dd665c9680a754">https://git.postgresql.org/pg/commitdiff/1957f8dabf8daa29c78d05f971dd665c9680a754</a></li>

<li>Update ExecInitPartitionInfo comment. Remove the words "if not already done." This obsolete wording corresponds to an early development version of what became edd44738bc8. Author: Etsuro Fujita Reviewed-by: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/5ADF117B.5030606@lab.ntt.co.jp">https://postgr.es/m/5ADF117B.5030606@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bd4aad32395c1f2c3214657261b32b94475358c8">https://git.postgresql.org/pg/commitdiff/bd4aad32395c1f2c3214657261b32b94475358c8</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Make Emacs settings match perltidy configuration. Set Emacs's perl-continued-statement-offset to match perltidy's --continuation-indentation, which is 2 (not overridden in PostgreSQL's profile) rather than the 4 that Emacs uses by default. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/56fb890ace8ac0ca955ae0803c580c2074f876f6">https://git.postgresql.org/pg/commitdiff/56fb890ace8ac0ca955ae0803c580c2074f876f6</a></li>

<li>Fix typo in logical truncate replication. This could result in some misbehavior in a cascading replication setup. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/df044026fcaf60b22291c31f4290a3b09ecf5833">https://git.postgresql.org/pg/commitdiff/df044026fcaf60b22291c31f4290a3b09ecf5833</a></li>

<li>perltidy: Add option --nooutdent-long-comments. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/76ece169746f50652771a9fa9adc66d207e9d6f7">https://git.postgresql.org/pg/commitdiff/76ece169746f50652771a9fa9adc66d207e9d6f7</a></li>

<li>perltidy: Don't write backup files. Newer perltidy versions can just avoid writing backup files, so we don't need the old dance of deleting them afterwards. Supported since 20120619. <a target="_blank" href="https://metacpan.org/source/SHANCOCK/Perl-Tidy-20120619/CHANGES#L61">https://metacpan.org/source/SHANCOCK/Perl-Tidy-20120619/CHANGES#L61</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a2ada08d4c0afa2d1f678ba7fb03ccc065f3a57b">https://git.postgresql.org/pg/commitdiff/a2ada08d4c0afa2d1f678ba7fb03ccc065f3a57b</a></li>

<li>perltidy: Add option --nooutdent-long-quotes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d4f16d50713077e69f8833df6b99d1eab0be1c33">https://git.postgresql.org/pg/commitdiff/d4f16d50713077e69f8833df6b99d1eab0be1c33</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix handling of partition bounds for boolean partitioning columns. Previously, you could partition by a boolean column as long as you spelled the bound values as string literals, for instance FOR VALUES IN ('t'). The trouble with this is that ruleutils.c printed that as FOR VALUES IN (TRUE), which is reasonable syntax but wasn't accepted by the grammar. That results in dump-and-reload failures for such cases. Apply a minimal fix that just causes TRUE and FALSE to be converted to strings 'true' and 'false'. This is pretty grotty, but it's too late for a more principled fix in v11 (to say nothing of v10). We should revisit the whole issue of how partition bound values are parsed for v12. Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/e05c5162-1103-7e37-d1ab-6de3e0afaf70@lab.ntt.co.jp">https://postgr.es/m/e05c5162-1103-7e37-d1ab-6de3e0afaf70@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4df58f7ed7f9ddc5a3196fcbad35690d1b3218de">https://git.postgresql.org/pg/commitdiff/4df58f7ed7f9ddc5a3196fcbad35690d1b3218de</a></li>

<li>Change pgindent/README to specify that we use perltidy version 20170521. Per discussion, this is now the project's standard version. Update the obsolete URL, and explain how to install a specific version. Discussion: <a target="_blank" href="https://postgr.es/m/CABUevEzK3cNiHZQ18f5tK0guoT+cN_jWeVzhYYxY=r+1Q3SmoA@mail.gmail.com">https://postgr.es/m/CABUevEzK3cNiHZQ18f5tK0guoT+cN_jWeVzhYYxY=r+1Q3SmoA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/46cda5bf7bc209554b3c1bbb3040b45735387e0c">https://git.postgresql.org/pg/commitdiff/46cda5bf7bc209554b3c1bbb3040b45735387e0c</a></li>

<li>Reindent Perl files with perltidy version 20170521. Discussion: <a target="_blank" href="https://postgr.es/m/CABUevEzK3cNiHZQ18f5tK0guoT+cN_jWeVzhYYxY=r+1Q3SmoA@mail.gmail.com">https://postgr.es/m/CABUevEzK3cNiHZQ18f5tK0guoT+cN_jWeVzhYYxY=r+1Q3SmoA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f04d4ac919b9ae9b57e977523e4b40979aa8b951">https://git.postgresql.org/pg/commitdiff/f04d4ac919b9ae9b57e977523e4b40979aa8b951</a></li>

<li>Make Catalog.pm's representation of toast and index decls more abstract. Instead of immediately constructing the string we need to emit into the .BKI file, preserve the items we extracted from the header file in a hash. This eases using the info for other purposes. John Naylor (with cosmetic adjustments by me) Discussion: <a target="_blank" href="https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru">https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1eb3a09e93d28765fcf42c703c4c7322ad2686d7">https://git.postgresql.org/pg/commitdiff/1eb3a09e93d28765fcf42c703c4c7322ad2686d7</a></li>

<li>Convert unused_oids and duplicate_oids to use Catalog.pm infrastructure. unused_oids was previously a shell script, which of course didn't work at all on Windows. Also, commit 372728b0d introduced some other portability problems, as complained of by Stas Kelvich. We can improve matters by converting it to Perl. While we're at it, let's future-proof both this script and duplicate_oids to use Catalog.pm rather than having a bunch of ad-hoc logic for parsing catalog headers and .dat files. These scripts are thereby a bit slower, which doesn't seem like a problem for typical manual use. It is a little annoying for buildfarm purposes, but we should be able to fix that case by having genbki.pl make the check instead of parsing the headers twice. (That's not done in this commit, though.) Stas Kelvich, adjusted a bit by me Discussion: <a target="_blank" href="https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru">https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5602265f770f400a03b4a4ca22b3cd530c294bc2">https://git.postgresql.org/pg/commitdiff/5602265f770f400a03b4a4ca22b3cd530c294bc2</a></li>

<li>Fix duplicate_oids and unused_oids so user needn't cd to catalog dir. Previously, you had to cd into src/include/catalog before running either of these scripts. That's a bit tedious, so let's make the scripts do it for you. In passing, improve the initial comments in both scripts. Also remove unused_oids' code to complain about duplicate oids. That was added in yesterday's commit 5602265f7, but on second thought we shouldn't be randomly redefining the script's behavior that way. John Naylor and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru">https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dd4cc9d7069c04d0ee8ae040511274c6e71b60f7">https://git.postgresql.org/pg/commitdiff/dd4cc9d7069c04d0ee8ae040511274c6e71b60f7</a></li>

<li>Avoid parsing catalog data twice during BKI file construction. In the wake of commit 5602265f7, we were doing duplicate-OID detection quite inefficiently, by invoking duplicate_oids which does all the same parsing of catalog headers and .dat files as genbki.pl does. That adds under half a second on modern machines, but quite a bit more on slow buildfarm critters, so it seems worth avoiding. Let's just extend genbki.pl a little so it can also detect duplicate OIDs, and remove the duplicate_oids call from the build process. (This also means that duplicate OID detection will happen during Windows builds, which AFAICS it didn't before.) This makes the use-case for duplicate_oids a bit dubious, but it's possible that people will still want to run that check without doing a whole build run, so let's keep that script. In passing, move down genbki.pl's creation of its temp output files so that it doesn't happen until after we've done parsing and validation of the input. This avoids leaving a lot of clutter around after a failure. John Naylor and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru">https://postgr.es/m/37D774E4-FE1F-437E-B3D2-593F314B7505@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a0854f10722b20a445f5e67a357bd8809b32f540">https://git.postgresql.org/pg/commitdiff/a0854f10722b20a445f5e67a357bd8809b32f540</a></li>

<li>Post-feature-freeze pgindent run. Discussion: <a target="_blank" href="https://postgr.es/m/15719.1523984266@sss.pgh.pa.us">https://postgr.es/m/15719.1523984266@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bdf46af748d0f15f257c99bf06e9e25aba6a24f9">https://git.postgresql.org/pg/commitdiff/bdf46af748d0f15f257c99bf06e9e25aba6a24f9</a></li>

<li>Preliminary work for pgindent run. Update typedefs.list from current buildfarm results. Adjust pgindent's typedef blacklist to block some more unfortunate typedef names that have snuck in since last time. Manually tweak a few places where I didn't like the initial results of pgindent'ing. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f83bf385c1dad4964e0d899174989a1668536182">https://git.postgresql.org/pg/commitdiff/f83bf385c1dad4964e0d899174989a1668536182</a></li>

<li>Adjust hints and docs to suggest CREATE EXTENSION not CREATE LANGUAGE. The core PLs have been extension-ified for seven years now, and we can reasonably hope that all out-of-core PLs have been too. So adjust a few places that were still recommending CREATE LANGUAGE as the user-level way to install a PL. Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmoaJTUDMSuSCg4k08Dv8vhbrJq9nP3ZfPbmysVz_616qxw@mail.gmail.com">https://postgr.es/m/CA+TgmoaJTUDMSuSCg4k08Dv8vhbrJq9nP3ZfPbmysVz_616qxw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2e83e6bd74ee8d4d119edf8272406f23e6c546cf">https://git.postgresql.org/pg/commitdiff/2e83e6bd74ee8d4d119edf8272406f23e6c546cf</a></li>

<li>Try to get some info about Windows can't-reattach-to-shared-memory errors. Add some debug printouts focused on the idea that MapViewOfFileEx might be rounding its virtual memory allocation up more than we expect (and, in particular, more than VirtualAllocEx does). Once we've seen what this reports in one of the failures on buildfarm members dory or jacana, we might revert this ... or perhaps just decrease the log level. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/63ca350ef9f58d48ac89fd3c68416e319cac0a39">https://git.postgresql.org/pg/commitdiff/63ca350ef9f58d48ac89fd3c68416e319cac0a39</a></li>

<li>Assorted minor doc/comment fixes. Identify pg_replication_origin as a shared catalog in catalogs.sgml, using the same boilerplate wording used for most other shared catalogs (and tweak another place where someone had randomly deviated from that boilerplate). Make an example in mmgr/README more consistent with surrounding text. Update an obsolete cross-reference in a comment in storage/block.h. Zhuo Ql Discussion: <a target="_blank" href="https://postgr.es/m/44296255.1819230.1524889719001@mail.yahoo.com">https://postgr.es/m/44296255.1819230.1524889719001@mail.yahoo.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4094031dd3392b2f49b190a5617d0c247167bcf6">https://git.postgresql.org/pg/commitdiff/4094031dd3392b2f49b190a5617d0c247167bcf6</a></li>

<li>Minor cleanups for install_llvm_module/uninstall_llvm_module Make macros. Don't put comments inside the macros, per complaint from Michael Paquier. Quote target directory path with single quotes, not double; that seems to be our project standard. Not quoting it at all definitely isn't per standard. Remove excess slash in one instance of path. Remove useless semicolon. Discussion: <a target="_blank" href="https://postgr.es/m/20180428073935.GB1736@paquier.xyz">https://postgr.es/m/20180428073935.GB1736@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bc19b7836215b1a847524041a1bd138d7bb5cbef">https://git.postgresql.org/pg/commitdiff/bc19b7836215b1a847524041a1bd138d7bb5cbef</a></li>

<li>Un-break contrib install with llvm. Apparently $(foreach ... $(call install_llvm_module,...)) doesn't work too well without a blank line ending the install_llvm_module macro. The previous coding hackishly dodged this problem with some parens, but that's not really a good solution because make misunderstands where the command boundaries are that way. Discussion: <a target="_blank" href="https://postgr.es/m/20180428073935.GB1736@paquier.xyz">https://postgr.es/m/20180428073935.GB1736@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f2bb32dbd6af8ec3eb99308289a83b1ff3ca6514">https://git.postgresql.org/pg/commitdiff/f2bb32dbd6af8ec3eb99308289a83b1ff3ca6514</a></li>

<li>Clarify handling of special-case values in bootstrap catalog data. I (tgl) originally coded the special case for pg_proc.pronargs as though it were a kind of default value. It seems better though to treat computable columns as an independent concern: this makes the code clearer, and probably a bit faster too since we needn't do work inside the per-column loop. Improve related comments, as well, in the expectation that there might be more cases like this in future. John Naylor, some additional comment-hacking by me Discussion: <a target="_blank" href="https://postgr.es/m/CAJVSVGW-D7OobzU=dybVT2JqZAx-4X1yvBJdavBmqQL05Q6CLw@mail.gmail.com">https://postgr.es/m/CAJVSVGW-D7OobzU=dybVT2JqZAx-4X1yvBJdavBmqQL05Q6CLw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/45c6d75f8cd2399181063b4e0ec11c2664ebeda6">https://git.postgresql.org/pg/commitdiff/45c6d75f8cd2399181063b4e0ec11c2664ebeda6</a></li>

<li>Tweak reformat_dat_file.pl to make it more easily hand-invokable. Use the same code we already applied in duplicate_oids and unused_oids to let this script find Catalog.pm without help. This removes the need to supply a -I switch in most cases. Also, mark the script executable, again to follow the precedent of duplicate_oids and unused_oids. Now you can just do "./reformat_dat_file.pl pg_proc.dat" if you want to reformat only one or a few .dat files rather than all. It'd be possible to remove the -I switches in the Makefile's convenience targets, but I chose to leave them: they don't hurt anything, and it's possible that in weird VPATH situations they might be of value. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/84549ebd4c4d1941006056cfb2455a4983fb15a2">https://git.postgresql.org/pg/commitdiff/84549ebd4c4d1941006056cfb2455a4983fb15a2</a></li>

<li>Fix incorrect field type for PlannedStmt.jitFlags in outfuncs/readfuncs. This field was a bool at one point, but now it's an int. Spotted by Hari Babu; trivial patch is by Ashutosh Bapat. Discussion: <a target="_blank" href="https://postgr.es/m/CAJrrPGedKiFE2fqntSauUfhapCksOJzam+QtHfSgx86LhXLeOQ@mail.gmail.com">https://postgr.es/m/CAJrrPGedKiFE2fqntSauUfhapCksOJzam+QtHfSgx86LhXLeOQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cfffe83ba82021a1819a656e7ec5c28fb3a99152">https://git.postgresql.org/pg/commitdiff/cfffe83ba82021a1819a656e7ec5c28fb3a99152</a></li>

<li>In AtEOXact_Files, complain if any files remain unclosed at commit. This change makes this module act more like most of our other low-level resource management modules. It's a caller error if something is not explicitly closed by the end of a successful transaction, so issue a WARNING about it. This would not actually have caught the file leak bug fixed in commit 231bcd080, because that was in a transaction-abort path; but it still seems like a good, and pretty cheap, cross-check. Discussion: <a target="_blank" href="https://postgr.es/m/152056616579.4966.583293218357089052@wrigleys.postgresql.org">https://postgr.es/m/152056616579.4966.583293218357089052@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9cb7db3f0c1f554cdcbbd97f78a119a19756e6ef">https://git.postgresql.org/pg/commitdiff/9cb7db3f0c1f554cdcbbd97f78a119a19756e6ef</a></li>

<li>Cosmetic improvement: use BKI_DEFAULT and BKI_LOOKUP in pg_language. The point of this is not really to remove redundancy in pg_language.dat; with only three entries, it's hardly worth it. Rather, it is to get to a point where there are exactly zero hard-coded numeric pg_proc OID references in the catalog .dat files. The lanvalidator column was the only remaining location of such references, and it seems like a good thing for future-proofing reasons to make it not be a special case. There are still a few places in the .dat files with numeric OID references to other catalogs, but after review I don't see any that seem worth changing at present. In each case there are just too few entries to make it worth the trouble to create lookup infrastructure. This doesn't change the emitted postgres.bki file, so no catversion bump. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/85475afdb6f4f630f2071235373a986e472a117b">https://git.postgresql.org/pg/commitdiff/85475afdb6f4f630f2071235373a986e472a117b</a></li>

<li>Avoid wrong results for power() with NaN input on some platforms. Per spec, the result of power() should be NaN if either input is NaN. It appears that on some versions of Windows, the libc function does return NaN, but it also sets errno = EDOM, confusing our code that attempts to work around shortcomings of other platforms. Hence, add guard tests to avoid substituting a wrong result for the right one. It's been like this for a long time (and the odd behavior only appears in older MSVC releases, too) so back-patch to all supported branches. Dang Minh Huong, reviewed by David Rowley Discussion: <a target="_blank" href="https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A73E741@BPXM05GP.gisp.nec.co.jp">https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A73E741@BPXM05GP.gisp.nec.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/61b200e2f582d0886d9de947e182483339d881fd">https://git.postgresql.org/pg/commitdiff/61b200e2f582d0886d9de947e182483339d881fd</a></li>

<li>Update time zone data files to tzdata release 2018d. DST law changes in Palestine and Antarctica (Casey Station). Historical corrections for Portugal and its colonies, as well as Enderbury, Jamaica, Turks & Caicos Islands, and Uruguay. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/37c02b2b0a146e623ff6d350f89310a5cfad25e0">https://git.postgresql.org/pg/commitdiff/37c02b2b0a146e623ff6d350f89310a5cfad25e0</a></li>

<li>Update time zone data files to tzdata release 2018d. DST law changes in Palestine and Antarctica (Casey Station). Historical corrections for Portugal and its colonies, as well as Enderbury, Jamaica, Turks & Caicos Islands, and Uruguay. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/df629586e89751498d741f107b418d68bccc616e">https://git.postgresql.org/pg/commitdiff/df629586e89751498d741f107b418d68bccc616e</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Prevent generation of bogus subquery scan paths. Commit 0927d2f46ddd4cf7d6bf2cc84b3be923e0aedc52 didn't check that consider_parallel was set for the target relation or account for the possibility that required_outer might be non-empty. To prevent future bugs of this ilk, add some assertions to add_partial_path and do a bit of future-proofing of the code recently added to recurse_set_operations. Report by Andreas Seltenreich. Patch by Jeevan Chalke. Review by Amit Kapila and by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAM2+6=U+9otsyF2fYB8x_2TBeHTR90itarqW=qAEjN-kHaC7kw@mail.gmail.com">http://postgr.es/m/CAM2+6=U+9otsyF2fYB8x_2TBeHTR90itarqW=qAEjN-kHaC7kw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dc1057fcd878d5c062c5c4c2b548af2be513b6ab">https://git.postgresql.org/pg/commitdiff/dc1057fcd878d5c062c5c4c2b548af2be513b6ab</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Correct pg_recvlogical server version test. The predecessor test boiled down to "PQserverVersion(NULL) &gt;= 100000", which is always false. No release includes that, so it could not have reintroduced CVE-2018-1058. Back-patch to 9.4, like the addition of the predecessor in commit 8d2814f274def85f39fbe997d454b01628cb5667. Discussion: <a target="_blank" href="https://postgr.es/m/20180422215551.GB2676194@rfd.leadboat.com">https://postgr.es/m/20180422215551.GB2676194@rfd.leadboat.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6336b6dfc5c5f7ef746fb7b14c720ef0c2c6a1f1">https://git.postgresql.org/pg/commitdiff/6336b6dfc5c5f7ef746fb7b14c720ef0c2c6a1f1</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: remove "III" version text from pgAdmin link. Reported-by: vodevsh@gmail.com Discussion: <a target="_blank" href="https://postgr.es/m/152404286919.19366.7988650271505173666@wrigleys.postgresql.org">https://postgr.es/m/152404286919.19366.7988650271505173666@wrigleys.postgresql.org</a> Backpatch-through: 9.3 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1900365c1e769edd40e67eac2cfa026ef5226a36">https://git.postgresql.org/pg/commitdiff/1900365c1e769edd40e67eac2cfa026ef5226a36</a></li>

<li>C comment: add description of root_tuple_slot. Reported-by: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/d2e6674c-c5c6-fe89-1d0b-3534b9db0476@lab.ntt.co.jp">https://postgr.es/m/d2e6674c-c5c6-fe89-1d0b-3534b9db0476@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7551d9bc408c2402a8558367ee950ca403e25b37">https://git.postgresql.org/pg/commitdiff/7551d9bc408c2402a8558367ee950ca403e25b37</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Heikki Linnakangas sent in a patch to tighten the movedpartitions magic value.</p>

<p>Micha&euml;l Paquier sent in a patch to fix gaps in modules with handling of partitioned indexes.</p>

<p>Micha&euml;l Paquier sent in a patch to format waldump flags %X.</p>

<p>Kyotaro HORIGUCHI and Alexander Kuzmenkov traded patches to make pg_ctl work better with logrotate.</p>

<p>Robert Haas, Amit Langote, and Etsuro Fujita traded patches to fix tuple routing for foreign partitions.</p>

<p>Thomas Munro sent in patches to use signals for postmaster death on Linux and FreeBSD.</p>

<p>Ildus Kurbangaliev sent in a patch to add PRIx64 macros.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to fix some expression errors with "FOR UPDATE" and postgres_fdw with partition wise join enabled.</p>

<p>Mark Dilger sent in a patch to remove some redundancies from bootstrap data.</p>

<p>David Rowley sent in a patch to further document partition pruning.</p>

<p>Dmitry Dolgov sent in another revision of a patch to implement generic type subscripting and use same for arrays and JSONB.</p>

<p>&Aacute;lvaro Herrera sent in a patch to accept TEXT and CDATA nodes in XMLTABLE's column_exp.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix an issue which caused subscriber corruption after the publisher is restarted.</p>

<p>David Rowley and Amit Langote traded patches to remove from the docs the no-longer-true assertion that foreign keys on partitioned tables are not supported.</p>

<p>Peter Eisentraut sent in a patch to prevent infinity and NaN in jsonb/plperl transform.</p>

<p>Tom Dunstan sent in a patch to enable auto_explain to log to NOTICE.</p>

<p>Ashutosh Bapat sent in another revision of a patch to add tests to show problem when foreign table points to a partitioned table or inheritance table on the foreign server, error out if one iteration of non-direct DML affects more than one row on the foreign server, and and properly handle the fact that DML on a foreign table pointing to an inherited or a partitioned table may affect multiple rows on the foreign server.</p>

<p>Aleksandr Parfenov sent in a patch to add a range phrase operator to tsquery.</p>

<p>Fabien COELHO sent in another revision of a patch to pgbench to enable storing SELECT results into variables.</p>

<p>Stas Kelvich sent in a patch to add a HOLD_INTERRUPTS section to FinishPreparedTransaction.</p>

<p>Peter Eisentraut sent in a patch to fix some new warnings from GCC 8.</p>

<p>Teodor Sigaev sent in two more revisions of a patch to fix predicate locking on GIN indexes.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to implement schema variables.</p>

<p>Joe Wildish sent in another revision of a patch to implement ASSERTIONs.</p>