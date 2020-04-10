---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 septembre 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-09-06-nouvelles-hebdomadaires-de-postgresql-4-septembre-2011 "
---



<p><strong>Revues de code</strong></p>

<p><tt>\N</tt></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve spinlock performance for HP-UX, ia64, non-gcc. At least on this architecture, it's very important to spin on a non-atomic instruction and only retry the atomic once it appears that it will succeed. To fix this, split TAS() into two macros: TAS(), for trying to grab the lock the first time, and TAS_SPIN(), for spinning until we get it. TAS_SPIN() defaults to same as TAS(), but we can override it when we know there's a better way. It's likely that some of the other cases in s_lock.h require similar treatment, but this is the only one we've got conclusive evidence for at present. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c01c25fbe525869fa81237954727e1eb4b7d4a14">http://git.postgresql.org/pg/commitdiff/c01c25fbe525869fa81237954727e1eb4b7d4a14</a></li>

<li>Remove some tabs from README file. Some of the ASCII art expected 8-space tab stops, and some of it expected 4-space tab stops. Per report from YAMAMOTO Takashi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eab2ef6164ae2d0e5a72501de9c09474fd94a394">http://git.postgresql.org/pg/commitdiff/eab2ef6164ae2d0e5a72501de9c09474fd94a394</a></li>

<li>Fix parsing of time string followed by yesterday/today/tomorrow. Previously, 'yesterday 04:00:00'::timestamp didn't do the same thing as '04:00:00 yesterday'::timestamp, and the return value from the latter was midnight rather than the specified time. Dean Rasheed, with some stylistic changes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a3d33c8e6c681d512f79af4a521ee0c02befcef">http://git.postgresql.org/pg/commitdiff/8a3d33c8e6c681d512f79af4a521ee0c02befcef</a></li>

<li>Add --if-exists option to dropdb and dropuser. Josh Kupershmidt, with some further editing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fe33a51b962ac3c745f4f820646f8d948960d5e">http://git.postgresql.org/pg/commitdiff/7fe33a51b962ac3c745f4f820646f8d948960d5e</a></li>

<li>Repair brain fade in previous commit, per Josh Kupershmidt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/083549e43a8f717a16e4cb3f23649e13574ff226">http://git.postgresql.org/pg/commitdiff/083549e43a8f717a16e4cb3f23649e13574ff226</a></li>

<li>Fix "is db labeled test?" in chkselinuxenv script. Don't test whether the number of labels is numerically equal to zero; count(*) isn't going return zero anyway, and the current coding blows up if it returns an empty string or an error. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d14bd2563cc527f250eed8d6d83e3ff62318675">http://git.postgresql.org/pg/commitdiff/3d14bd2563cc527f250eed8d6d83e3ff62318675</a></li>

<li>Userspace access vector cache for contrib/sepgsql. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4232c4b406c94b433c149ac792d7e68665948cf1">http://git.postgresql.org/pg/commitdiff/4232c4b406c94b433c149ac792d7e68665948cf1</a></li>

<li>Minor improvements to mbregress.sh script. 1. Use new dropdb --if-exists option, to avoid alarming the user if the database being dropped doesn't already exist. 2. Bail out if createdb fails. 3. exit 1 if the checks fail. 4. Make it executable. Josh Kupershmidt, with some kibitzing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48fb49e39445a5429b24111658b193ed36b09da3">http://git.postgresql.org/pg/commitdiff/48fb49e39445a5429b24111658b193ed36b09da3</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use a non-locking test in TAS_SPIN() on all IA64 platforms. Per my testing, this works just as well with gcc as it does with HP's compiler; and there is no reason to think that the effect doesn't occur with icc, either. Also, rewrite the header comment about enforcing sequencing around spinlock operations, per Robert Haas's gripe that it was misleading. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be1e8053f48f76ac718a03d6526e34e2f2489f5c">http://git.postgresql.org/pg/commitdiff/be1e8053f48f76ac718a03d6526e34e2f2489f5c</a></li>

<li>Fix concat_ws() to not insert a separator after leading NULL argument(s). Per bug #6181 from Itagaki Takahiro. Also do some marginal code cleanup and improve error handling. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5b7640ba0efd670e6f513bf6b5589504a5d5475">http://git.postgresql.org/pg/commitdiff/a5b7640ba0efd670e6f513bf6b5589504a5d5475</a></li>

<li>Replace obsolete AC_LANG_FUNC_LINK_TRY autoconf macro. The version of this macro used in autoconf 2.59 is capable of incorrectly succeeding (ie, reporting that a library function is available when it isn't), if the compiler performs link-time optimization and decides that it can optimize the function reference away entirely. Replace it with the coding used in autoconf 2.61 and later, which forces the program result to depend on the function's result so that it cannot be optimized away. This should fix build failures currently being seen on buildfarm member anchovy. This patch affects the 8.2 and 8.3 branches only, since later branches are using autoconf versions that don't have this problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f81da5997eaeebb481fb9d5d0c36bfc943bc3159">http://git.postgresql.org/pg/commitdiff/f81da5997eaeebb481fb9d5d0c36bfc943bc3159</a></li>

<li>Fix a missed case in code for "moving average" estimate of reltuples. It is possible for VACUUM to scan no pages at all, if the visibility map shows that all pages are all-visible. In this situation VACUUM has no new information to report about the relation's tuple density, so it wasn't changing pg_class.reltuples ... but it updated pg_class.relpages anyway. That's wrong in general, since there is no evidence to justify changing the density ratio reltuples/relpages, but it's particularly bad if the previous state was relpages=reltuples=0, which means "unknown tuple density". We just replaced "unknown" with "zero". ANALYZE would eventually recover from this, but it could take a lot of repetitions of ANALYZE to do so if the relation size is much larger than the maximum number of pages ANALYZE will scan, because of the moving-average behavior introduced by commit b4b6923e03f4d29636a94f6f4cc2f5cf6298b8c8. The only known situation where we could have relpages=reltuples=0 and yet the visibility map asserts everything's visible is immediately following a pg_upgrade. It might be advisable for pg_upgrade to try to preserve the relpages/reltuples statistics; but in any case this code is wrong on its own terms, so fix it. Per report from Sergey Koposov. Back-patch to 8.4, where the visibility map was introduced, same as the previous change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bba65de94498f99bcf133ce590802d8196042fa">http://git.postgresql.org/pg/commitdiff/5bba65de94498f99bcf133ce590802d8196042fa</a></li>

<li>Fix not-backwards-compatible pg_upgrade test for prepared transactions. There's no reason for this test to use the undocumented pg_prepared_xact() function, when it can use the stable API pg_prepared_xacts instead. Fixes breakage against 8.3, as reported by Justin Arnold. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/731ebb64b77571e1dc391ba96c4bf9c685a07f2a">http://git.postgresql.org/pg/commitdiff/731ebb64b77571e1dc391ba96c4bf9c685a07f2a</a></li>

<li>Improve eqjoinsel's ndistinct clamping to work for multiple levels of join. This patch fixes an oversight in my commit 7f3eba30c9d622d1981b1368f2d79ba0999cdff2 of 2008-10-23. That patch accounted for baserel restriction clauses that reduced the number of rows coming out of a table (and hence the number of possibly-distinct values of a join variable), but not for join restriction clauses that might have been applied at a lower level of join. To account for the latter, look up the sizes of the min_lefthand and min_righthand inputs of the current join, and clamp with those in the same way as for the base relations. Noted while investigating a complaint from Ben Chobot, although this in itself doesn't seem to explain his report. Back-patch to 8.4; previous versions used different estimation methods for which this heuristic isn't relevant. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97930cf578e28c01f67fe4006ffcdbb5aedf18c2">http://git.postgresql.org/pg/commitdiff/97930cf578e28c01f67fe4006ffcdbb5aedf18c2</a></li>

<li>Further repair of eqjoinsel ndistinct-clamping logic. Examination of examples provided by Mark Kirkwood and others has convinced me that actually commit 7f3eba30c9d622d1981b1368f2d79ba0999cdff2 was quite a few bricks shy of a load. The useful part of that patch was clamping ndistinct for the inner side of a semi or anti join, and the reason why that's needed is that it's the only way that restriction clauses eliminating rows from the inner relation can affect the estimated size of the join result. I had not clearly understood why the clamping was appropriate, and so mis-extrapolated to conclude that we should clamp ndistinct for the outer side too, as well as for both sides of regular joins. These latter actions were all wrong, and are reverted with this patch. In addition, the clamping logic is now made to affect the behavior of both paths in eqjoinsel_semi, with or without MCV lists to compare. When we have MCVs, we suppose that the most common values are the ones that are most likely to survive the decimation resulting from a lower restriction clause, so we think of the clamping as eliminating non-MCV values, or potentially even the least-common MCVs for the inner relation. Back-patch to 8.4, same as previous fixes in this area. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d3b231eebf41170f15605a943eb58e8d3d18374">http://git.postgresql.org/pg/commitdiff/0d3b231eebf41170f15605a943eb58e8d3d18374</a></li>

<li>Put back improperly removed #include. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5b012b788800470f3b670e013e9e52b615a018c">http://git.postgresql.org/pg/commitdiff/e5b012b788800470f3b670e013e9e52b615a018c</a></li>

<li>Teach ANALYZE to clear pg_class.relhassubclass when appropriate. In the past, relhassubclass always remained true if a relation had ever had child relations, even if the last subclass was long gone. While this had only marginal performance implications in most cases, it was annoying, and I'm now considering some planner changes that would raise the cost of a false positive. It was previously impractical to fix this because of race condition concerns. However, given the recent change that made tablecmds.c take ShareExclusiveLock on relations that are gaining a child (commit fbcf4b92aa64d4577bcf25925b055316b978744a), we can now allow ANALYZE to clear the flag when it's no longer relevant. There is no additional locking cost to do so, since ANALYZE takes ShareExclusiveLock anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b562644fec696977df4a82790064e8287927891">http://git.postgresql.org/pg/commitdiff/5b562644fec696977df4a82790064e8287927891</a></li>

<li>Rearrange planner to save the whole PlannerInfo (subroot) for a subquery. Formerly, set_subquery_pathlist and other creators of plans for subqueries saved only the rangetable and rowMarks lists from the lower-level PlannerInfo. But there's no reason not to remember the whole PlannerInfo, and indeed this turns out to simplify matters in a number of places. The immediate reason for doing this was so that the subroot will still be accessible when we're trying to extract column statistics out of an already-planned subquery. But now that I've done it, it seems like a good code-beautification effort in its own right. I also chose to get rid of the transient subrtable and subrowmark fields in SubqueryScan nodes, in favor of having setrefs.c look up the subquery's RelOptInfo. That required changing all the APIs in setrefs.c to pass PlannerInfo not PlannerGlobal, which was a large but quite mechanical transformation. One side-effect not foreseen at the beginning is that this finally broke inheritance_planner's assumption that replanning the same subquery RTE N times would necessarily give interchangeable results each time. That assumption was always pretty risky, but now we really have to make a separate RTE for each instance so that there's a place to carry the separate subroots. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3aaf9081a1a95c245fd605dcf02c91b3a5c3a29">http://git.postgresql.org/pg/commitdiff/b3aaf9081a1a95c245fd605dcf02c91b3a5c3a29</a></li>

<li>Fix typo in pg_srand48 (srand48 in older branches). "&gt;" should be "&gt;&gt;". This typo results in failure to use all of the bits of the provided seed. This might rise to the level of a security bug if we were relying on srand48 for any security-critical purposes, but we are not --- in fact, it's not used at all unless the platform lacks srandom(), which is improbable. Even on such a platform the exposure seems minimal. Reported privately by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48e4b8dc08ea7ec0cc7cd8e5001f8a29e1c0b987">http://git.postgresql.org/pg/commitdiff/48e4b8dc08ea7ec0cc7cd8e5001f8a29e1c0b987</a></li>

<li>Remove unnecessary and circular #include. storage/proc.h should not include replication/syncrep.h, especially not when the latter includes storage/proc.h; but in any case this was a pretty poor thing from a modular layering standpoint. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f116b1f5b8d36e54404b36f1aba1295cbcfc4fdc">http://git.postgresql.org/pg/commitdiff/f116b1f5b8d36e54404b36f1aba1295cbcfc4fdc</a></li>

<li>Clean up the #include mess a little. walsender.h should depend on xlog.h, not vice versa. (Actually, the inclusion was circular until a couple hours ago, which was even sillier; but Bruce broke it in the expedient rather than logically correct direction.) Because of that poor decision, plus blind application of pgrminclude, we had a situation where half the system was depending on xlog.h to include such unrelated stuff as array.h and guc.h. Clean up the header inclusion, and manually revert a lot of what pgrminclude had done so things build again. This episode reinforces my feeling that pgrminclude should not be run without adult supervision. Inclusion changes in header files in particular need to be reviewed with great care. More generally, it'd be good if we had a clearer notion of module layering to dictate which headers can sanely include which others ... but that's a big task for another day. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1609797c25f6b440371045039733d69fe8cb9410">http://git.postgresql.org/pg/commitdiff/1609797c25f6b440371045039733d69fe8cb9410</a></li>

<li>Can't print PlannerGlobal's subroots list in outfuncs. Since the subroots will surely link back to the same glob struct, this necessarily leads to infinite recursion. Doh. Found while trying to debug some other code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/698df3350d37cdaa5b9fcbcb78b5ad5e66e99348">http://git.postgresql.org/pg/commitdiff/698df3350d37cdaa5b9fcbcb78b5ad5e66e99348</a></li>

<li>Dig down into sub-selects to look for column statistics. If a sub-select's output column is a simple Var, recursively look for statistics applying to that Var, and use them if available. The need for this was foreseen ages ago, but we didn't have enough infrastructure to do it with reasonable speed until just now. We punt and stick with default estimates if the subquery uses set operations, GROUP BY, or DISTINCT, since those operations would change the underlying column statistics (particularly, the relative frequencies of different values) beyond recognition. This means that the types of sub-selects for which this improvement applies are fairly limited, since most subqueries satisfying those restrictions would have gotten flattened into the parent query anyway. But it does help for some cases, such as subqueries with ORDER BY or LIMIT. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1cb108efb0e60d87e4adec38e7636b6e8efbeb57">http://git.postgresql.org/pg/commitdiff/1cb108efb0e60d87e4adec38e7636b6e8efbeb57</a></li>

<li>Change get_variable_numdistinct's API to flag default estimates explicitly. Formerly, callers tested for DEFAULT_NUM_DISTINCT, which had the problem that a perfectly solid estimate might be mistaken for a content-free default. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c2777d0b733220d9029f78817af8ce671e4a5ad">http://git.postgresql.org/pg/commitdiff/4c2777d0b733220d9029f78817af8ce671e4a5ad</a></li>

<li>Fix #include problems in 9.1 branch. Remove unnecessary and circular #include of syncrep.h from proc.h. Add htup.h to tablecmds.h so it will compile without prerequisites. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ae019f04b95771293f9a649c298aaeb0d3155a2">http://git.postgresql.org/pg/commitdiff/1ae019f04b95771293f9a649c298aaeb0d3155a2</a></li>

<li>Guard against using plperl's Makefile without specifying --with-perl. The $(PERL) macro will be set by configure if it finds perl at all, but $(perl_privlibexp) isn't configured unless you said --with-perl. This results in confusing error messages if someone cd's into src/pl/plperl and tries to build there despite the configure omission, as reported by Tomas Vondra in bug #6198. Add simple checks to provide a more useful report, while not disabling other use of the makefile such as "make clean". Back-patch to 9.0, which is as far as the patch applies easily. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a24742c1a1bd04c02da24c4739811b068a84367">http://git.postgresql.org/pg/commitdiff/6a24742c1a1bd04c02da24c4739811b068a84367</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Detect out of date flex in MSVC builds. Per recent discussion, following a report from Quan Zongliang. The same logic is used as in pgbison.pl. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94478aa8b1a19cb0cb423cbc1f8167a4275ad30a">http://git.postgresql.org/pg/commitdiff/94478aa8b1a19cb0cb423cbc1f8167a4275ad30a</a></li>

<li>Supply missing brace omitted by commit 12613cb6b83cac1aa1e7882e84902c445fce3e74. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97464012a0347d7b4456a6b9401f5897522542ee">http://git.postgresql.org/pg/commitdiff/97464012a0347d7b4456a6b9401f5897522542ee</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Some markup cleanup to deconfuse the find_gt_lt tool. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aeabbccea099cb90ae4584207bb77f7f34eda8d7">http://git.postgresql.org/pg/commitdiff/aeabbccea099cb90ae4584207bb77f7f34eda8d7</a></li>

<li>Clean up pg_regress --help output. Put options listing in a less random order, fix capitalization, and some typos. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b83bb97fdbab135a4bf3af8a9bfa06aaa66f0205">http://git.postgresql.org/pg/commitdiff/b83bb97fdbab135a4bf3af8a9bfa06aaa66f0205</a></li>

<li>Whitespace adjustment for consistency in the file 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1e4f3d44f38b76afbdccf92573c797805f5d62d">http://git.postgresql.org/pg/commitdiff/f1e4f3d44f38b76afbdccf92573c797805f5d62d</a></li>

<li>Add archive_command example 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42ad992fdc25fa69db03ff242216f6712da2c56a">http://git.postgresql.org/pg/commitdiff/42ad992fdc25fa69db03ff242216f6712da2c56a</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>The replication status values in pg_stat_replication was changed to lowercase earlier, but documentation was not updated. Update the docs. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cfe33fe7bb5f5a29e9c2f6780c8278b8a7e5735">http://git.postgresql.org/pg/commitdiff/5cfe33fe7bb5f5a29e9c2f6780c8278b8a7e5735</a></li>

<li>Move the line to undefine setlocale() macro on Win32 outside USE_REPL_SNPRINTF ifdef block. It has nothing to do with whether the replacement snprintf function is used. It caused no live bug, because the replacement snprintf function is always used on Win32, but it was nevertheless misplaced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ea02570677d2cebe681584fd4c22716f1a1e1a7">http://git.postgresql.org/pg/commitdiff/8ea02570677d2cebe681584fd4c22716f1a1e1a7</a></li>

<li>setlocale() on Windows doesn't work correctly if the locale name contains dots. I previously worked around this in initdb, mapping the known problematic locale names to aliases that work, but Hiroshi Inoue pointed out that that's not enough because even if you use one of the aliases, like "Chinese_HKG", setlocale(LC_CTYPE, NULL) returns back the long form, ie. "Chinese_Hong Kong S.A.R.". When we try to restore an old locale value by passing that value back to setlocale(), it fails. Note that you are affected by this bug also if you use one of those short-form names manually, so just reverting the hack in initdb won't fix it. To work around that, move the locale name mapping from initdb to a wrapper around setlocale(), so that the mapping is invoked on every setlocale() call. Also, add a few checks for failed setlocale() calls in the backend. These calls shouldn't fail, and if they do there isn't much we can do about it, but at least you'll get a warning. Backpatch to 9.1, where the initdb hack was introduced. The Windows bug affects older versions too if you set locale manually to one of the aliases, but given the lack of complaints from the field, I'm hesitent to backpatch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a88b6e4cfbff9802906dd400ef334ffa49e7f286">http://git.postgresql.org/pg/commitdiff/a88b6e4cfbff9802906dd400ef334ffa49e7f286</a></li>

<li>Fix MinGW build, broken by my previous patch to add a setlocale() wrapper on Windows. ecpglib doesn't link with libpgport, but picks and compiles the .c files it needs individually. To cope with that, move the setlocale() wrapper from chklocale.c to a separate setlocale.c file, and include that in ecpglib. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65e899b2fb0703c9685c3b185fc1bfe206cde3b4">http://git.postgresql.org/pg/commitdiff/65e899b2fb0703c9685c3b185fc1bfe206cde3b4</a></li>

<li>libpq compiles various pgport files like ecpg does, and needs similar Makefile changes for the win32 setlocale() wrapper I put into ecpg, to make it compile on MinGW. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5066e55d612788cd17c536558f8e5b0aa44d9f31">http://git.postgresql.org/pg/commitdiff/5066e55d612788cd17c536558f8e5b0aa44d9f31</a></li>

<li>Remove spurious comma. Spotted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4df03733086543accba97be241d9d133b273dda">http://git.postgresql.org/pg/commitdiff/e4df03733086543accba97be241d9d133b273dda</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_upgrade to preserve toast relfrozenxids for old 8.3 servers. This fixes a pg_upgrade bug that could lead to query errors when clog files are improperly removed. Backpatch to 8.4, 9.0, 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7971a57fd4ca4253393b77700d59670b5c6ec252">http://git.postgresql.org/pg/commitdiff/7971a57fd4ca4253393b77700d59670b5c6ec252</a></li>

<li>Remove "fmgr.h" include in cube contrib --- caused crash on a Gentoo builfarm member. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5321842528dfb73f8254a48556b4adb1b6d1c5a">http://git.postgresql.org/pg/commitdiff/d5321842528dfb73f8254a48556b4adb1b6d1c5a</a></li>

<li>Remove unnecessary #include references, per pgrminclude script. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6416a82a62db4e66b2edb0fa8fc83a580c3f1931">http://git.postgresql.org/pg/commitdiff/6416a82a62db4e66b2edb0fa8fc83a580c3f1931</a></li>

<li>In SGML we only need to worry about "&lt;", not "&gt;"; update scripts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3d32ebac62d89eaedc740af5d3592ac019b8533">http://git.postgresql.org/pg/commitdiff/b3d32ebac62d89eaedc740af5d3592ac019b8533</a></li>

<li>Add missing hba.h include for NetBSD. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5352bf39ffc5e5f54c3729d61e36b8a9568e4c35">http://git.postgresql.org/pg/commitdiff/5352bf39ffc5e5f54c3729d61e36b8a9568e4c35</a></li>

<li>Add C comment about necessary NetBSD include. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7805b118560fa8a394823c57b46b70799e2431bb">http://git.postgresql.org/pg/commitdiff/7805b118560fa8a394823c57b46b70799e2431bb</a></li>

<li>Add C comment about needed include. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10af3ab2b29186735308f49f50520839a75352cb">http://git.postgresql.org/pg/commitdiff/10af3ab2b29186735308f49f50520839a75352cb</a></li>

<li>Improve method of avoiding fcinfo compile errors. Fix pgrminclude C comment marker. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/418d04ea73afd3df1fec9670f5f47827aeaf5a25">http://git.postgresql.org/pg/commitdiff/418d04ea73afd3df1fec9670f5f47827aeaf5a25</a></li>

<li>Remove find_lt sgml tool, as it is not needed. Per suggestion from Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca598c18c678895fd625a68a4bf21d202c586b47">http://git.postgresql.org/pg/commitdiff/ca598c18c678895fd625a68a4bf21d202c586b47</a></li>

<li>Move AllowCascadeReplication() define from xlog.h to replication include file. Per suggestion from Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85e6e1662b2c475a408afc1ea2ddade7974eddbb">http://git.postgresql.org/pg/commitdiff/85e6e1662b2c475a408afc1ea2ddade7974eddbb</a></li>

<li>walsender.h doesn't need xlog.h, per Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bce637a4b92ed083f2c21cff63917cb2849b851">http://git.postgresql.org/pg/commitdiff/5bce637a4b92ed083f2c21cff63917cb2849b851</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>In ecpglib restore LC_NUMERIC in case of an error. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63d06ef59156719efd0208c62e764a69611b3f12">http://git.postgresql.org/pg/commitdiff/63d06ef59156719efd0208c62e764a69611b3f12</a></li>

<li>Fix brace indentation of commit 63d06ef59156719efd0208c62e764a69611b3f12 to fit PostgreSQL style. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f72d5df6a876406cf5f2f8d7800d591dff3e2e3">http://git.postgresql.org/pg/commitdiff/2f72d5df6a876406cf5f2f8d7800d591dff3e2e3</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Eisentraut sent in another revision of the patch to test pg_upgrade.</li>

<li>Tom Lane sent in a WIP patch to install regress.so and related libraries into $libdir.</li>

<li>Oleg Bartunov sent in two more revisions of a patch to enable space-partitioned GiST indexes.</li>

<li>Marti Raudsepp sent in a patch to label subquery expressions with better column names.</li>

<li>Jeff Davis sent in another revision of the patch to add range types.</li>

<li>Tomas Vondra sent in two more revisions of a patch to log checkpoint progress better.</li>

<li>Magnus Hagander sent in a patch to implements a "low watermark wal location" in the walsender shmem array.</li>

<li>Shigeru HANADA sent in another revision of the patch to add a force_not_null attribute to the file FDW.</li>

</ul>