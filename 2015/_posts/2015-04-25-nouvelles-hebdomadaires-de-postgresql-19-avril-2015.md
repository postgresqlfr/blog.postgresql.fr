---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 avril 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/04/25/Nouvelles-hebdomadaires-de-PostgreSQL-19-avril-2015"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Ora2PG 15.2, un syst&egrave;me de migration pour passer d'Oracle &agrave; PostgreSQL&nbsp;: 

<a target="_blank" href="http://ora2pg.darold.net/">http://ora2pg.darold.net/</a></li>

<li>pgBadger 6.4, un analyseur de log PostgreSQL parall&egrave;lisable &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="https://sourceforge.net/projects/pgbadger/">https://sourceforge.net/projects/pgbadger/</a> D&eacute;veloppement&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/">https://github.com/dalibo/pgbadger/</a></li>

<li>pgFormatter v1.4, un formateur/enjoliveur pour SQL qui supporte les mots clefs de SQL-92, SQL-99, SQL-2003, SQL-2008, SQL-2011 et ceux de PostgreSQL absents du standard&nbsp;: 

<a target="_blank" href="http://sqlformat.darold.net/">http://sqlformat.darold.net/</a></li>

<li>pg_monz v2.0, une template Zabbix pour la surveillance de PostgreSQL&nbsp;: 

<a target="_blank" href="http://pg-monz.github.io/pg_monz/index-en.html">http://pg-monz.github.io/pg_monz/index-en.html</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-04/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 4<sup>&egrave;me</sup> conf&eacute;rence PostgreSQL turque se tiendra &agrave; Istanbul le 9 mai 2015&nbsp;: 

<a target="_blank" href="http://pgday.postgresql.org.tr/en/index.html">http://pgday.postgresql.org.tr/en/index.html</a></li>

<li>La deuxi&egrave;me <em>Conf&eacute;rence PostgreSQL Suisse</em> se tiendra &agrave; Rapperswil les 25 &amp; 26 juin 2015&nbsp;: 

<a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></li>

<li>Il y aura une session PostgreSQL lors de la <em>database technology conference China 2015</em> &agrave; Beijing entre le 16 et le 18 avril 2015&nbsp;: 

<a target="_blank" href="http://dtcc.it168.com/list_jiabin.html">http://dtcc.it168.com/list_jiabin.html</a></li>

<li>Le pgDay Paris aura lieu le 21 avril 2015&nbsp;: 

<a target="_blank" href="http://pgday.paris/">http://pgday.paris/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGDay de Belfort (France) se termine le 13 avril 2015. La conf&eacute;rence aura lieu le 2 juin&nbsp;: 

<a target="_blank" href="http://select-2-6-2015-as-pgday.org">http://select-2-6-2015-as-pgday.org</a></li>

<li>PGCon 2015 du 16 au 20 juin &agrave; Ottawa, Canada&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/">http://www.pgcon.org/2015/</a></li>

<li>La conf&eacute;rence PGDay UK aura lieu le 7 juillet 2015 &ndash; elle vise les membres de la communaut&eacute; PostgreSQL anglaise. L'appel &agrave; conf&eacute;renciers expire le 13 avril&nbsp;: 

<a target="_blank" href="http://www.postgresqlusergroup.org.uk">http://www.postgresqlusergroup.org.uk</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PostgresOpen 2015, programm&eacute; &agrave; Dallas (Texas) du 16 au 18 septembre, a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.postgresopen.org/callforpapers/">http://2015.postgresopen.org/callforpapers/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150419232555.GC1506@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>emacs: Set indent-tabs-mode in perl-mode This matches existing practice, but makes the setup complete and consistent with the C code setup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/442663f133f1caec51919402463e6e31362baee3">http://git.postgresql.org/pg/commitdiff/442663f133f1caec51919402463e6e31362baee3</a></li>

<li>Move pgbench from contrib/ to src/bin/. Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81134af3ec09d67043833f8d614fd688f17cb213">http://git.postgresql.org/pg/commitdiff/81134af3ec09d67043833f8d614fd688f17cb213</a></li>

<li>pgbench: Attempt fix build on Windows 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d577bb868dfb595aa8df95974cd1c79e1baba924">http://git.postgresql.org/pg/commitdiff/d577bb868dfb595aa8df95974cd1c79e1baba924</a></li>

<li>Move pg_upgrade from contrib/ to src/bin/. Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fa8b0ee90c44c0f97d16bf65e94322988c94864">http://git.postgresql.org/pg/commitdiff/9fa8b0ee90c44c0f97d16bf65e94322988c94864</a></li>

<li>Integrate pg_upgrade_support module into backend. Previously, these functions were created in a schema "binary_upgrade", which was deleted after pg_upgrade was finished. Because we don't want to keep that schema around permanently, move them to pg_catalog but rename them with a binary_upgrade_... prefix. The provided functions are only small wrappers around global variables that were added specifically for pg_upgrade use, so keeping the module separate does not create any modularity. The functions still check that they are only called in binary upgrade mode, so it is not possible to call these during normal operation. Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30982be4e5019684e1772dd9170aaa53f5a8e894">http://git.postgresql.org/pg/commitdiff/30982be4e5019684e1772dd9170aaa53f5a8e894</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Silence gettext warning about '\r' escape sequence in translatable string. gettext was unhappy about the commit b216ad7 because it revealed the problem that internationalized messages may contain '\r' escape sequence in pg_rewind. This commit moves '\r' to a separate printf() call. Michael Paquier, bug reported by Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f94bec7a9e3e6b4fa5468236cf531fec16d1093">http://git.postgresql.org/pg/commitdiff/1f94bec7a9e3e6b4fa5468236cf531fec16d1093</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Refactor and fix TAP tests of pg_rewind * Don't pass arguments to prove, since that's not supported on perl 5.8 which is the minimum version supported by the TAP tests. Refactor the test files themselves to run the tests twice, in both local and remote mode. * Use eq rather than == for string comparison. This thinko caused the remote versions of the tests to never run. * Add "use strict" and "use warnings", and fix warnings that that produced. * Increase the delay after standby promotion, to make the tests more robust. * In remote mode, the connection string to the promoted standby was incorrect, leading to connection errors. Patch by Michael Paquier, to address Peter Eisentraut's report. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53ba10770a315361770efdc17d2c01f6a30e3e3d">http://git.postgresql.org/pg/commitdiff/53ba10770a315361770efdc17d2c01f6a30e3e3d</a></li>

<li>Fix pg_rewind regression tests in VPATH builds. Should call just "pg_rewind", instead of "./pg_rewind". The tests are called so that PATH contains the temporariy installation bin dir. Per report from Alvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b22a36a62ce312c1df9477382d1da602b0c24f6f">http://git.postgresql.org/pg/commitdiff/b22a36a62ce312c1df9477382d1da602b0c24f6f</a></li>

<li>Reorganize our CRC source files again. Now that we use CRC-32C in WAL and the control file, the "traditional" and "legacy" CRC-32 variants are not used in any frontend programs anymore. Move the code for those back from src/common to src/backend/utils/hash. Also move the slicing-by-8 implementation (back) to src/port. This is in preparation for next patch that will add another implementation that uses Intel SSE 4.2 instructions to calculate CRC-32C, where available. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f700bcd20c087f60346cb8aefd0e269be8e2157">http://git.postgresql.org/pg/commitdiff/4f700bcd20c087f60346cb8aefd0e269be8e2157</a></li>

<li>Don't archive bogus recycled or preallocated files after timeline switch. After a timeline switch, we would leave behind recycled WAL segments that are in the future, but on the old timeline. After promotion, and after they become old enough to be recycled again, we would notice that they don't have a .ready or .done file, create a .ready file for them, and archive them. That's bogus, because the files contain garbage, recycled from an older timeline (or prealloced as zeros). We shouldn't archive such files. This could happen when we're following a timeline switch during replay, or when we switch to new timeline at end-of-recovery. To fix, whenever we switch to a new timeline, scan the data directory for WAL segments on the old timeline, but with a higher segment number, and remove them. Those don't belong to our timeline history, and are most likely bogus recycled or preallocated files. They could also be valid files that we streamed from the primary ahead of time, but in any case, they're not needed to recover to the new timeline. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2a5545bd63fc94a71b1e97ecdd03c605d97a438">http://git.postgresql.org/pg/commitdiff/b2a5545bd63fc94a71b1e97ecdd03c605d97a438</a></li>

<li>Use Intel SSE 4.2 CRC instructions where available. Modern x86 and x86-64 processors with SSE 4.2 support have special instructions, crc32b and crc32q, for calculating CRC-32C. They greatly speed up CRC calculation. Whether the instructions can be used or not depends on the compiler and the target architecture. If generation of SSE 4.2 instructions is allowed for the target (-msse4.2 flag on gcc and clang), use them. If they are not allowed by default, but the compiler supports the -msse4.2 flag to enable them, compile just the CRC-32C function with -msse4.2 flag, and check at runtime whether the processor we're running on supports it. If it doesn't, fall back to the slicing-by-8 algorithm. (With the common defaults on current operating systems, the runtime-check variant is what you get in practice.) Abhijit Menon-Sen, heavily modified by me, reviewed by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3dc2d62d0486325bf263655c2d9a96aee0b02abe">http://git.postgresql.org/pg/commitdiff/3dc2d62d0486325bf263655c2d9a96aee0b02abe</a></li>

<li>Try to fix the CRC-32C autoconf magic for icc compiler. On gcc and clang, the _mm_crc32_u8 and _mm_crc32_u64 intrinsics are not defined at all, when not building with -msse4.2. But on icc, they are. So we cannot assume that if those intrinsics are defined, we can always use them safely, we might still need the runtime check. To fix, check if the __SSE_4_2__ preprocessor symbol is defined. That's supposed to be defined only when the compiler is targeting a processor that has SSE 4.2 support. Per buildfarm members fulmar and okapi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4eb2d168d2c426978a02de8b9b6ccdb85e1b442">http://git.postgresql.org/pg/commitdiff/b4eb2d168d2c426978a02de8b9b6ccdb85e1b442</a></li>

<li>Oops, fix misspelled #endif. I hope this fixes the Windows builfarm failures. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b73e7a0716264e5159947b1a755b9ab864142489">http://git.postgresql.org/pg/commitdiff/b73e7a0716264e5159947b1a755b9ab864142489</a></li>

<li>Optimize pg_comp_crc32c_sse42 routine slightly, and also use it on x86. Eliminate the separate 'len' variable from the loops, and also use the 4 byte instruction. This shaves off a few more cycles. Even though this routine that uses the special SSE 4.2 instructions is much faster than a generic routine, it's still a hot spot, so let's make it as fast as possible. Change the configure test to not test _mm_crc32_u64. That variant is only available in the 64-bit x86-64 architecture, not in 32-bit x86. Modify pg_comp_crc32c_sse42 so that it only uses _mm_crc32_u64 on x86-64. With these changes, the SSE accelerated CRC-32C implementation can also be used on 32-bit x86 systems. This also fixes the 32-bit MSVC build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/936546dcbc24ad1f2b3d33e73aa5c5fde4d2be84">http://git.postgresql.org/pg/commitdiff/936546dcbc24ad1f2b3d33e73aa5c5fde4d2be84</a></li>

<li>Fix logic to skip checkpoint if no records have been inserted. After the WAL format changes, the calculation of the size of a checkpoint record became incorrect. Instead of trying to fix the math, check that the previous record, i.e. the xl_prev value that we'd write for the next record, matches the last checkpoint's redo pointer. That way it's not dependent on the size of the checkpoint record at all. The old logic was actually slightly wrong all along: if the previous checkpoint record crossed a page boundary, the page headers threw off the record size calculation, and the checkpoint was not skipped. The new checkpoint would not cross a page boundary, so this only resulted in at most one extra checkpoint after the system became idle. The new logic fixes that. (It's not worth fixing in backbranches). However, it makes some sense to try to keep the latest checkpoint contained fully in a page, or at least in a single WAL segment, just on general robustness grounds. If something goes awfully wrong, it's more likely that you can recover the latest WAL segment, than the last two WAL segments. So I added an extra check that the checkpoint is not skipped if the previous checkpoint crossed a WAL segment. Reported by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d80a1e0e3e278edc6022d642478dcbd089d4483">http://git.postgresql.org/pg/commitdiff/3d80a1e0e3e278edc6022d642478dcbd089d4483</a></li>

<li>Shut down test servers after pg_rewind regression tests. Now that the test servers are initialized twice in each .pl script, the single END block is not enough to stop them. Add a new clean_rewind_test function that is called at the end of each test. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d8a22a9ac6a61b7993abb642cb7e4645f4087b0">http://git.postgresql.org/pg/commitdiff/0d8a22a9ac6a61b7993abb642cb7e4645f4087b0</a></li>

<li>Minor cleanup of pg_rewind. Update comments and function names to use the terms "source" and "target" consistently. Some places were calling them remote and local instead, which was confusing. Fix incorrect comment in extractPageInfo on database creation record - it was wrong on what happens for databases created in the target that don't exist in source. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41457fcf970f0ec78004cc0f7b29f1d37021fbfb">http://git.postgresql.org/pg/commitdiff/41457fcf970f0ec78004cc0f7b29f1d37021fbfb</a></li>

<li>Add missing newlines to error messages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5e384e374657ead815a3393ca59333910611a24">http://git.postgresql.org/pg/commitdiff/b5e384e374657ead815a3393ca59333910611a24</a></li>

<li>Error out in pg_rewind if lstat() fails. A "file not found" is expected if the source server is running, so don't complain about that. But any other error is definitely not expected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5e560c24603e5325a81055c8f36cc45d48609e4">http://git.postgresql.org/pg/commitdiff/b5e560c24603e5325a81055c8f36cc45d48609e4</a></li>

<li>Fix assertion failure in logical decoding. Logical decoding set SnapshotData's regd_count field to avoid the snapshot manager from prematurely freeing snapshots that are generated by the decoding system. That was always an abuse of the field, as it was never supposed to be used outside the snapshot manager. Commit 94028691 made snapshot manager's tracking of the snapshots smarter, and that scheme fell apart. The snapshot manager got confused and hit the assertion, when a snapshot that was marked with regd_count==1 was not found in the heap, where the snapshot manager tracks registered the snapshots. To fix, don't abuse the regd_count field like that. Logical decoding still abuses the active_count field for similar purposes, but that's currently harmless. The assertion failure was first reported by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2999abcd14540e66b72deeff75662c1672d7744">http://git.postgresql.org/pg/commitdiff/e2999abcd14540e66b72deeff75662c1672d7744</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove duplicated word in README 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5213e14a4759b8f6817359c827950bae5452136">http://git.postgresql.org/pg/commitdiff/b5213e14a4759b8f6817359c827950bae5452136</a></li>

<li>Fix typo in comment. SLRU_SEGMENTS_PER_PAGE -&gt; SLRU_PAGES_PER_SEGMENT I introduced this ancient typo in subtrans.c and later propagated it to multixact.c. I fixed the latter in f741300c, but only back to 9.3; backpatch to all supported branches for consistency. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a52fafce42e47d151d1108a44b25152a908c732">http://git.postgresql.org/pg/commitdiff/0a52fafce42e47d151d1108a44b25152a908c732</a></li>

<li>MSVC: Include modules of src/test/modules in build. commit_ts, being only a module used for test purposes, is ignored in the process for now. Author: Michael Paquier Reviewed by: Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90898af30bb287a512bef743253770fc24886da6">http://git.postgresql.org/pg/commitdiff/90898af30bb287a512bef743253770fc24886da6</a></li>

<li>MSVC: install src/test/modules together with contrib. These modules have to be installed so that the testing module can access them. (We don't have that yet, but will soon have it.) Author: Michael Paquier. Reviewed by: Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22d005323f917d0189bcee8e6cbbbcf5906b2358">http://git.postgresql.org/pg/commitdiff/22d005323f917d0189bcee8e6cbbbcf5906b2358</a></li>

<li>Add new target modulescheck in vcregress.pl. This allows an MSVC build to run regression tests related to modules in src/test/modules. Author: Michael Paquier Reviewed by: Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cb7d671fddc8855c8def2de51fb23df1c8ac0af">http://git.postgresql.org/pg/commitdiff/4cb7d671fddc8855c8def2de51fb23df1c8ac0af</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: document need for text search files to be copied. Report by CJ Estel. Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e5d52a644a4cad9f37a1b2a1e61be8eb631b901">http://git.postgresql.org/pg/commitdiff/2e5d52a644a4cad9f37a1b2a1e61be8eb631b901</a></li>

<li>pg_upgrade: binary_upgrade_create_empty_extension() is strict. Was broken by commit 30982be4e5019684e1772dd9170aaa53f5a8e894. Patch by Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f92fc4c95ddcc25978354a8248d3df22269201bc">http://git.postgresql.org/pg/commitdiff/f92fc4c95ddcc25978354a8248d3df22269201bc</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in relcache's equalPolicy(). The USING policies were not being checked for differences as the same policy was being passed in to both sides of the equal(). This could result in backends not realizing that a policy had been changed, if none of the other attributes had been changed. Fix by passing to equal() the policy1 and policy2 using quals for comparison. No need to back-patch as this is not yet released. Noticed while testing changes to RLS proposed by Dean Rasheed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab6d1cd26ebfbfce275cd31af82814c0620e70a2">http://git.postgresql.org/pg/commitdiff/ab6d1cd26ebfbfce275cd31af82814c0620e70a2</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Stephen Frost sent in another revision of a patch to use GRANT for access to privileged functions.</li>

<li>Etsuro Fujita sent in two more revisions of a patch to fix some oddities with EvalQualPlan for FDW queries involving system columns.</li>

<li>David Steele sent in three more revisions of a patch to implement pg_audit.</li>

<li>Simon Riggs sent in another revision of a patch to disable HOT cleanup, sometimes.</li>

<li>Etsuro Fujita sent in another revision of a patch to fix some infelicities in the new feature of having foreign tables in inheritance trees.</li>

<li>Etsuro Fujita sent in a patch to allow WITH OIDs when issuing CREATE FOREIGN TABLE, making it consistently able with ALTER FOREIGN TABLE.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT IGNORE (and UPDATE).</li>

<li>Zhang Zq sent in a patch to fix an issue where duplicate checkpoints were being inserted when the system was idle.</li>

<li>Qingqing Zhou sent in a patch to assert there is no duplicated exit callbacks.</li>

<li>Qingqing Zhou sent in a patch to use outerPlanState() consistently in the executor code.</li>

<li>&Aacute;lvaro Herrera sent in a patch to show xl_prev in xlog.c errcontext.</li>

<li>J.L. Tallon sent in a patch to implement a new GUC (default_index_tablespace) plus supporting code.</li>

<li>Michael Paquier sent in a doc patch to warn about possible information leakage from compressing full-page writes.</li>

<li>Etsuro Fujita sent in a patch to fix some markup in config.sgml.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to recursively fsync PGDATA at startup if needed.</li>

<li>Michael Paquier sent in a patch to fix broken Install.bat when target directory contains a space.</li>

<li>Shigeru HANADA sent in two more revisions of a patch to add custom and foreign JOIN APIs.</li>

<li>Alexander Korotkov sent in another revision of a patch to implement KNN-GiST with recheck.</li>

<li>Zhang Zq sent in a patch to implement xidin.</li>

<li>Abhijit Menon-Sen sent in a patch to avoid dividing by zero when calculating percentages.</li>

<li>Andres Freund sent in another revision of a patch to iIntroduce replication identifiers.</li>

<li>Petr Jelinek sent in another revision of a patch to implement TABLESAMPLE.</li>

<li>Dmitry Dolgov sent in another revision of a patch to add some useful functions for manipulating and pretty-printing JSON.</li>

<li>Michael Paquier sent in a patch to add a missing --debug for remote mode in pg_rewind tests to RewindTest.pm.</li>

<li>Michael Paquier sent in another revision of a patch to add support for TAP tests on Windows and prefer IPC's run to system_or_bail in pg_rewind tests.</li>

<li>Mikko Tiihonen sent in a patch to libpq which allows specifying multiple host names to try to connect to.</li>

<li>Tomas Vondra sent in a patch to allow initdb-time support for various compression algorithms.</li>

</ul>