---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 septembre 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-09-05-nouvelles-hebdomadaires-de-postgresql-2-septembre-2012 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Collect and use histograms of lower and upper bounds for range types. This enables selectivity estimation of the &lt;&lt;, &gt;&gt;, &amp;&lt;, &amp;&gt; and &amp;&amp; operators, as well as the normal inequality operators: &lt;, &lt;=, &gt;=, &gt;. "range @&gt; element" is also supported, but the range-variant @&gt; and &lt;@ operators are not, because they cannot be sensibly estimated with lower and upper bound histograms alone. We would need to make some assumption about the lengths of the ranges for that. Alexander's patch included a separate histogram of lengths for that, but I left that out of the patch for simplicity. Hopefully that will be added as a followup patch. The fraction of empty ranges is also calculated and used in estimation. Alexander Korotkov, heavily modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/918eee0c497c88260a2e107318843c9b1947bc6f">http://git.postgresql.org/pg/commitdiff/918eee0c497c88260a2e107318843c9b1947bc6f</a></li>

<li>Optimize SP-GiST insertions. This includes two micro-optimizations to the tight inner loop in descending the SP-GiST tree: 1. avoid an extra function call to index_getprocinfo when calling user-defined choose function, and 2. avoid a useless palloc+pfree when node labels are not used. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c82dedb7a8a953785f24a3b10de376760d60c24c">http://git.postgresql.org/pg/commitdiff/c82dedb7a8a953785f24a3b10de376760d60c24c</a></li>

<li>Fix division by zero in the new range type histogram creation. Report and analysis by Matthias. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e6eb0dd0a0982c61420a0d18d3e485bd2c2819c">http://git.postgresql.org/pg/commitdiff/3e6eb0dd0a0982c61420a0d18d3e485bd2c2819c</a></li>

<li>Fix typos in README. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe811ae8105a89ea60561dfae2fa7c3504a238a1">http://git.postgresql.org/pg/commitdiff/fe811ae8105a89ea60561dfae2fa7c3504a238a1</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Have pgindent requre pg_bsd_indent version 1.2 now that a new version has been created by adding #include &lt;stdlib.h&gt; to parse.c. Per request from Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e40bddb0f3ce9f9bf7c960b35f6ac0c19f65612b">http://git.postgresql.org/pg/commitdiff/e40bddb0f3ce9f9bf7c960b35f6ac0c19f65612b</a></li>

<li>Document the lack of reading the PGDATABASE environment variable in pg_restore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/483c2c1071c45e275782d33d646c3018f02f9f94">http://git.postgresql.org/pg/commitdiff/483c2c1071c45e275782d33d646c3018f02f9f94</a></li>

<li>Document how to create advisory lock "bigint" values in SQL. David E. Wheeler 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf849af7f347ebcd394d6d789f557e75ead2f5ee">http://git.postgresql.org/pg/commitdiff/bf849af7f347ebcd394d6d789f557e75ead2f5ee</a></li>

<li>Update doc mention of how to compute bigint advisory lock value, per Tom Lane's correction. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ea6c9d79882815d4cc1c3c302f415eb637466f2">http://git.postgresql.org/pg/commitdiff/5ea6c9d79882815d4cc1c3c302f415eb637466f2</a></li>

<li>Prevent psql tab completion in SET from adding TO when the equals sign has no space before it. Report by Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65b2ee27ad926f622f06c3a4029b621e8d72fb67">http://git.postgresql.org/pg/commitdiff/65b2ee27ad926f622f06c3a4029b621e8d72fb67</a></li>

<li>Adjust pg_test_timing to show shortest test durations first, place percentage column before count column. Docs updated. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f3351aacf5cd5fa87c31fd0d1f7f8dc0409c0b3">http://git.postgresql.org/pg/commitdiff/0f3351aacf5cd5fa87c31fd0d1f7f8dc0409c0b3</a></li>

<li>Report postmaster.pid file as empty if it is empty, rather than reporting in contains invalid data. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3825963e7fbaa8dbc462d4f5286ff6149f4703dd">http://git.postgresql.org/pg/commitdiff/3825963e7fbaa8dbc462d4f5286ff6149f4703dd</a></li>

<li>Document that NOTIFY events are visible to all users. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fe6da5c0d8e70c9a541c3e1e0d637ab19c75ac1">http://git.postgresql.org/pg/commitdiff/9fe6da5c0d8e70c9a541c3e1e0d637ab19c75ac1</a></li>

<li>Remove old documentation warnings about the use of bigint. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48a9c7823e032fde54cb0658fbd488809a3fdc69">http://git.postgresql.org/pg/commitdiff/48a9c7823e032fde54cb0658fbd488809a3fdc69</a></li>

<li>Document that log_autovacuum_min_duration can be used to monitor autovacuum activity. Per report from Marc Mamin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83fbfec383d7f7ef1331ba02db3d0fdf50abf112">http://git.postgresql.org/pg/commitdiff/83fbfec383d7f7ef1331ba02db3d0fdf50abf112</a></li>

<li>Remove configure flag --disable-shared, as it is no longer used by any port. The last use was QNX, per Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/381a9ed66d8a601eb972be172e7251ca7f0e9d78">http://git.postgresql.org/pg/commitdiff/381a9ed66d8a601eb972be172e7251ca7f0e9d78</a></li>

<li>Document that max_locks_per_transaction might need to be increased for queries on parent tables, per suggestion from Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39b42ecb059e24bb39a62d91fe57ab7b9ca5a2f5">http://git.postgresql.org/pg/commitdiff/39b42ecb059e24bb39a62d91fe57ab7b9ca5a2f5</a></li>

<li>Remove doc mention of --enable-shared, per Tom. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1fbc30f1dca6624c01a9a6a9ff711a7036c68532">http://git.postgresql.org/pg/commitdiff/1fbc30f1dca6624c01a9a6a9ff711a7036c68532</a></li>

<li>Revert 1fbc30f1dca6624c01a9a6a9ff711a7036c68532 because the --enable-shared is about Plyton's configure, not ours. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39d0653d058b87b437be05fd295ceb5bb4e9e05c">http://git.postgresql.org/pg/commitdiff/39d0653d058b87b437be05fd295ceb5bb4e9e05c</a></li>

<li>Properly document that SIGTERM is OK for users to use on a postgres session, now that pg_terminate_backend() uses it. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5dc7612a5f66a08c6d46656d359fc1c69670f36">http://git.postgresql.org/pg/commitdiff/b5dc7612a5f66a08c6d46656d359fc1c69670f36</a></li>

<li>Clarify FreeBSD instructions in pg_test_timing. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c36b06a70d303c738f092f264585f621b6b30b29">http://git.postgresql.org/pg/commitdiff/c36b06a70d303c738f092f264585f621b6b30b29</a></li>

<li>Add Perl emacs formatting macros to src/tools/editors/emacs.samples. Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fcb58baca7a78e688b84275958c450670ba62a8">http://git.postgresql.org/pg/commitdiff/5fcb58baca7a78e688b84275958c450670ba62a8</a></li>

<li>In pg_upgade, document that the port numbers must be different when checking an old running server. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f789909b59c59a33e34feac3bed2c86f18159122">http://git.postgresql.org/pg/commitdiff/f789909b59c59a33e34feac3bed2c86f18159122</a></li>

<li>Revert doc patch 305557984dd964ac397c6752e9d0f14646b60f15 as the values are sometimes signed, sometimes unsigned. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53fa0c6db8e9ebbef9a2806193797735998520c6">http://git.postgresql.org/pg/commitdiff/53fa0c6db8e9ebbef9a2806193797735998520c6</a></li>

<li>Add small doc mention that libpq is named after POSTQUEL. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c82a86c6f11815df371a310e3734030b1a635f4">http://git.postgresql.org/pg/commitdiff/6c82a86c6f11815df371a310e3734030b1a635f4</a></li>

<li>Update URLs that pointed to sun.com; either repoint them or remove them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7682c5947dff4368753890935522dedfb93e1c78">http://git.postgresql.org/pg/commitdiff/7682c5947dff4368753890935522dedfb93e1c78</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix DROP INDEX CONCURRENTLY IF EXISTS. This threw ERROR, not the expected NOTICE, if the index didn't exist. The bug was actually visible in not-as-expected regression test output, so somebody wasn't paying too close attention in commit 8cb53654dbdb4c386369eb988062d0bbb6de725e. Per report from Brendan Byrd. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e323c553017601597b6a5f9f19426587df512ad9">http://git.postgresql.org/pg/commitdiff/e323c553017601597b6a5f9f19426587df512ad9</a></li>

<li>Add section IDs to subsections of syntax.sgml that lacked them. This is so that these sections will have stable HTML tags that one can link to, rather than things like "AEN1902". Perhaps we should mount a campaign to do this everywhere, but I've found myself pointing at syntax.sgml subsections often enough to be sure it's useful here. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87703287849bf785400d0daf57b9d6b5a05d0780">http://git.postgresql.org/pg/commitdiff/87703287849bf785400d0daf57b9d6b5a05d0780</a></li>

<li>Improve a couple of 9.2 release note entries. Clarify the compatibility notes about EXTRACT() and about statistics timing columns. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7417a8e3dd14886887447053a5ccbd4f9501ba61">http://git.postgresql.org/pg/commitdiff/7417a8e3dd14886887447053a5ccbd4f9501ba61</a></li>

<li>Remove hstore--1.0.sql. Since we're not installing this file anymore, it has no reason to exist, other than as historical reference; but we have an SCM for that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9db098dfa91906cee4fffc1e3ba8ba3899820d5f">http://git.postgresql.org/pg/commitdiff/9db098dfa91906cee4fffc1e3ba8ba3899820d5f</a></li>

<li>Remove pg_stat_statements--1.0.sql, too. Per Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a83f2492f38fd0b82452dfd2a80cc70486ba73d">http://git.postgresql.org/pg/commitdiff/0a83f2492f38fd0b82452dfd2a80cc70486ba73d</a></li>

<li>Adjust definition of cheapest_total_path to work better with LATERAL. In the initial cut at LATERAL, I kept the rule that cheapest_total_path was always unparameterized, which meant it had to be NULL if the relation has no unparameterized paths. It turns out to work much more nicely if we always have *some* path nominated as cheapest-total for each relation. In particular, let's still say it's the cheapest unparameterized path if there is one; if not, take the cheapest-total-cost path among those of the minimum available parameterization. (The first rule is actually a special case of the second.) This allows reversion of some temporary lobotomizations I'd put in place. In particular, the planner can now consider hash and merge joins for joins below a parameter-supplying nestloop, even if there aren't any unparameterized paths available. This should bring planning of LATERAL-containing queries to the same level as queries not using that feature. Along the way, simplify management of parameterized paths in add_path() and friends. In the original coding for parameterized paths in 9.2, I tried to minimize the logic changes in add_path(), so it just treated parameterization as yet another dimension of comparison for paths. We later made it ignore pathkeys (sort ordering) of parameterized paths, on the grounds that ordering isn't a useful property for the path on the inside of a nestloop, so we might as well get rid of useless parameterized paths as quickly as possible. But we didn't take that reasoning as far as we should have. Startup cost isn't a useful property inside a nestloop either, so add_path() ought to discount startup cost of parameterized paths as well. Having done that, the secondary sorting I'd implemented (in add_parameterized_path) is no longer needed --- any parameterized path that survives add_path() at all is worth considering at higher levels. So this should be a bit faster as well as simpler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e83bb10d6dcf05a666d4ada00d9788c7974ad378">http://git.postgresql.org/pg/commitdiff/e83bb10d6dcf05a666d4ada00d9788c7974ad378</a></li>

<li>Improve EXPLAIN's ability to cope with LATERAL references in plans. push_child_plan/pop_child_plan didn't bother to adjust the "ancestors" list of parent plan nodes when descending to a child plan node. I think this was okay when it was written, but it's not okay in the presence of LATERAL references, since a subplan node could easily be returning a LATERAL value back up to the same nestloop node that provides the value. Per changed regression test results, the omission led to failure to interpret Param nodes that have perfectly good interpretations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1a4db8d25ec53fd17e99168bc5efa0b16ef6fed">http://git.postgresql.org/pg/commitdiff/d1a4db8d25ec53fd17e99168bc5efa0b16ef6fed</a></li>

<li>Suppress creation of backwardly-indexed paths for LATERAL join clauses. Given a query such as SELECT * FROM foo JOIN LATERAL (SELECT foo.var1) ss(x) ON ss.x = foo.var2 the existence of the join clause "ss.x = foo.var2" encourages indxpath.c to build a parameterized path for foo using any index available for foo.var2. This is completely useless activity, though, since foo has got to be on the outside not the inside of any nestloop join with ss. It's reasonably inexpensive to add tests that prevent creation of such paths, so let's do that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77387f0ac859c099c6ab669db1e7a852524696c4">http://git.postgresql.org/pg/commitdiff/77387f0ac859c099c6ab669db1e7a852524696c4</a></li>

<li>Improve coding of gistchoose and gistRelocateBuildBuffersOnSplit. This is mostly cosmetic, but it does eliminate a speculative portability issue. The previous coding ignored the fact that sum_grow could easily overflow (in fact, it could be summing multiple IEEE float infinities). On a platform where that didn't guarantee to produce a positive result, the code would misbehave. In any case, it was less than readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5db11c5582b469c04a11f217a0f32c827da5dd7">http://git.postgresql.org/pg/commitdiff/e5db11c5582b469c04a11f217a0f32c827da5dd7</a></li>

<li>Make configure probe for mbstowcs_l as well as wcstombs_l. We previously supposed that any given platform would supply both or neither of these functions, so that one configure test would be sufficient. It now appears that at least on AIX this is not the case ... which is likely an AIX bug, but nonetheless we need to cope with it. So use separate tests. Per bug #6758; thanks to Andrew Hastie for doing the followup testing needed to confirm what was happening. Backpatch to 9.1, where we began using these functions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58a031f920c225b20fdb45c1e56fe41ed7568900">http://git.postgresql.org/pg/commitdiff/58a031f920c225b20fdb45c1e56fe41ed7568900</a></li>

<li>Fix LATERAL references to join alias variables. I had thought this case worked already, but perhaps I didn't re-test it after adding extract_lateral_references() ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da3df998702061b4b63d83d5354b148e812f21f8">http://git.postgresql.org/pg/commitdiff/da3df998702061b4b63d83d5354b148e812f21f8</a></li>

<li>Partially restore qual scope checks in distribute_qual_to_rels(). The LATERAL implementation is now basically complete, and I still don't see a cost-effective way to make an exact qual scope cross-check in the presence of LATERAL. However, I did add a PlannerInfo.hasLateralRTEs flag along the way, so it's easy to make the check only when not hasLateralRTEs. That seems to still be useful, and it beats having no check at all. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c97a547a4a0913e37e5dd1f026ac3c281326b215">http://git.postgresql.org/pg/commitdiff/c97a547a4a0913e37e5dd1f026ac3c281326b215</a></li>

<li>More documentation updates for LATERAL. Extend xfunc.sgml's discussion of set-returning functions to show an example of using LATERAL, and recommend that over putting SRFs in the targetlist. In passing, reword func.sgml's section on set-returning functions so that it doesn't claim that the functions listed therein are all the built-in set-returning functions. That hasn't been true for a long time, and trying to make it so doesn't seem like it would be an improvement. (Perhaps we should rename that section?) Both per suggestions from Merlin Moncure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06310178ef54720bc4ed7bc85c887e6ebed24d83">http://git.postgresql.org/pg/commitdiff/06310178ef54720bc4ed7bc85c887e6ebed24d83</a></li>

<li>Fix broken link in installation.sgml. Linking to other parts of the manual doesn't work when building the standalone INSTALL document. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8a4093b5890aa774ae90bbf44515750aa0ae85c">http://git.postgresql.org/pg/commitdiff/b8a4093b5890aa774ae90bbf44515750aa0ae85c</a></li>

<li>Fix mark_placeholder_maybe_needed to handle LATERAL references. If a PlaceHolderVar contains a pulled-up LATERAL reference, its minimum possible evaluation level might be higher in the join tree than its original syntactic location. That in turn affects the ph_needed level for any contained PlaceHolderVars (that is, those PHVs had better propagate up the join tree at least to the evaluation level of the outer PHV). We got this mostly right, but mark_placeholder_maybe_needed() failed to account for the effect, and in consequence could leave the inner PHVs with ph_may_need less than what their ultimate ph_needed value will be. That's bad because it could lead to failure to select a join order that will allow evaluation of the inner PHV at a valid location. Fix that, and add an Assert that checks that we don't ever set ph_needed to more than ph_may_need. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4da6439bd8553059766011e2a42c6e39df08717f">http://git.postgresql.org/pg/commitdiff/4da6439bd8553059766011e2a42c6e39df08717f</a></li>

<li>Drop cheap-startup-cost paths during add_path() if we don't need them. We can detect whether the planner top level is going to care at all about cheap startup cost (it will only do so if query_planner's tuple_fraction argument is greater than zero). If it isn't, we might as well discard paths immediately whose only advantage over others is cheap startup cost. This turns out to get rid of quite a lot of paths in complex queries --- I saw planner runtime reduction of more than a third on one large query. Since add_path isn't currently passed the PlannerInfo "root", the easiest way to tell it whether to do this was to add a bool flag to RelOptInfo. That's a bit redundant, since all relations in a given query level will have the same setting. But in the future it's possible that we'd refine the control decision to work on a per-relation basis, so this seems like a good arrangement anyway. Per my suggestion of a few months ago. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d2c8c0e2afa8cbaf99555a24336e93118fd181e">http://git.postgresql.org/pg/commitdiff/6d2c8c0e2afa8cbaf99555a24336e93118fd181e</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in comment It was confusing symlinks with hard links. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34c02044ed7e7defde5a853b26dcd806c872d974">http://git.postgresql.org/pg/commitdiff/34c02044ed7e7defde5a853b26dcd806c872d974</a></li>

<li>Remove analyze_new_cluster.sh on make clean, too 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab577e63faf792593ca728625a8ef0b1dfaf7500">http://git.postgresql.org/pg/commitdiff/ab577e63faf792593ca728625a8ef0b1dfaf7500</a></li>

<li>pg_upgrade: Fix exec_prog API to be less flaky. The previous signature made it very easy to pass something other than the printf-format specifier in the corresponding position, without any warning from the compiler. While at it, move some of the escaping, redirecting and quoting responsibilities from the callers into exec_prog() itself. This makes the callsites cleaner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/088c065ce8e405fafbfa966937184ece9defcf20">http://git.postgresql.org/pg/commitdiff/088c065ce8e405fafbfa966937184ece9defcf20</a></li>

<li>syncrep.h must include xlogdefs.h 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/095e6c5a7da10db77d0e43e413fca64c946ad370">http://git.postgresql.org/pg/commitdiff/095e6c5a7da10db77d0e43e413fca64c946ad370</a></li>

<li>add #includes to plpy_subxactobject.h to make it compile standalone 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a664ec27f3937c0ce428c07a41b6d8c7526ec57">http://git.postgresql.org/pg/commitdiff/0a664ec27f3937c0ce428c07a41b6d8c7526ec57</a></li>

<li>Split resowner.h. This lets files that are mere users of ResourceOwner not automatically include the headers for stuff that is managed by the resowner mechanism. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45326c5a11530cff5db99c6d4b393439cc901f26">http://git.postgresql.org/pg/commitdiff/45326c5a11530cff5db99c6d4b393439cc901f26</a></li>

<li>Split heapam_xlog.h from heapam.h. The heapam XLog functions are used by other modules, not all of which are interested in the rest of the heapam API. With this, we let them get just the XLog stuff in which they are interested and not pollute them with unrelated includes. Also, since heapam.h no longer requires xlog.h, many files that do include heapam.h no longer get xlog.h automatically, including a few headers. This is useful because heapam.h is getting pulled in by execnodes.h, which is in turn included by a lot of files. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21c09e99dc252269360bd146afee9481fa80abbc">http://git.postgresql.org/pg/commitdiff/21c09e99dc252269360bd146afee9481fa80abbc</a></li>

<li>remove catcache.h from syscache.h. Instead, place a forward struct declaration for struct catclist in syscache.h. This reduces header proliferation somewhat. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fda0594fc2f4c98ee50ea02fa196ca51db81ea70">http://git.postgresql.org/pg/commitdiff/fda0594fc2f4c98ee50ea02fa196ca51db81ea70</a></li>

<li>Fix assorted compilation failures in contrib. Evidently I failed to test a compile after my earlier header shuffling. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9df55c8c3f0eba77de57006999d5700292fa9d33">http://git.postgresql.org/pg/commitdiff/9df55c8c3f0eba77de57006999d5700292fa9d33</a></li>

<li>Split tuple struct defs from htup.h to htup_details.h. This reduces unnecessary exposure of other headers through htup.h, which is very widely included by many files. I have chosen to move the function prototypes to the new file as well, because that means htup.h no longer needs to include tupdesc.h. In itself this doesn't have much effect in indirect inclusion of tupdesc.h throughout the tree, because it's also required by execnodes.h; but it's something to explore in the future, and it seemed best to do the htup.h change now while I'm busy with it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c219d9b0a55bcdf81b00da6bad24ac2bf3e53d20">http://git.postgresql.org/pg/commitdiff/c219d9b0a55bcdf81b00da6bad24ac2bf3e53d20</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Back-patch fixes for some issues in our Windows socket code into 9.1. This is a backport of commit b85427f2276d02756b558c0024949305ea65aca5. Per discussion of bug #4958. Some of these fixes probably need to be back-patched further, but I'm just doing this much for now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed597d0c322dd42c362701125d4ff55eb7b675f5">http://git.postgresql.org/pg/commitdiff/ed597d0c322dd42c362701125d4ff55eb7b675f5</a></li>

<li>Document that xslt-related RPMs may be needed to build docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/152525b5f3db9b7b58fa06e5d03725288f054b1d">http://git.postgresql.org/pg/commitdiff/152525b5f3db9b7b58fa06e5d03725288f054b1d</a></li>

<li>Comment fixes. Jeff Davis, somewhat edited by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1a6375d8f3a11f3447bea10883a4cbe1c5d3ec9">http://git.postgresql.org/pg/commitdiff/e1a6375d8f3a11f3447bea10883a4cbe1c5d3ec9</a></li>

<li>Fix logic bug in gistchoose and gistRelocateBuildBuffersOnSplit. Every time the best-tuple-found-so-far changes, we need to reset all the penalty values in which_grow[] to the penalties for the new best tuple. The old code failed to do this, resulting in inferior index quality. The original patch from Alexander Korotkov was just two lines; I took the liberty of fleshing that out by adding a bunch of comments that I hope will make this logic easier for others to understand than it was for me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8ba697a4bdb934f0c51424c654e8db6133ea255">http://git.postgresql.org/pg/commitdiff/c8ba697a4bdb934f0c51424c654e8db6133ea255</a></li>

<li>Document that COPY OUT requires an absolute pathname. As suggested by Etsuro Fujita, but with somewhat different wording. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9ea8d20fde981997425ba72de7aa23e319e753e">http://git.postgresql.org/pg/commitdiff/b9ea8d20fde981997425ba72de7aa23e319e753e</a></li>

<li>Add missing period to detail message. Per note from Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a66fca3f0c8899ad360f0300d45cb1b7ac60a17f">http://git.postgresql.org/pg/commitdiff/a66fca3f0c8899ad360f0300d45cb1b7ac60a17f</a></li>

<li>Document how to prevent PostgreSQL itself from exhausting memory. The existing documentation in Linux Memory Overcommit seemed to assume that PostgreSQL itself could never be the problem, or at least it didn't tell you what to do about it. Per discussion with Craig Ringer and Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35738b5906bb80bc4bb77ce1adea7dfbd3f64274">http://git.postgresql.org/pg/commitdiff/35738b5906bb80bc4bb77ce1adea7dfbd3f64274</a></li>

<li>Fix checkpoint_timeout documentation to reflect current behavior. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bedfbd02b48096f435c5b111591d4e5b717e547">http://git.postgresql.org/pg/commitdiff/9bedfbd02b48096f435c5b111591d4e5b717e547</a></li>

<li>Cross-link to doc build requirements from install requirements. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8d6c98c2f082bead1202b23e9d70e0fbde49129">http://git.postgresql.org/pg/commitdiff/e8d6c98c2f082bead1202b23e9d70e0fbde49129</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Small punctuation fixes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5727888d744d1b41bba4d84dadf9e5c519aab45">http://git.postgresql.org/pg/commitdiff/a5727888d744d1b41bba4d84dadf9e5c519aab45</a></li>

<li>Add strerror() string to chdir() error message 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a26e1c766fa84c2f93473eed83f0133d4b2ac5f">http://git.postgresql.org/pg/commitdiff/1a26e1c766fa84c2f93473eed83f0133d4b2ac5f</a></li>

<li>Also check for Python platform-specific include directory Python can be built to have two separate include directories: one for platform-independent files and one for platform-specific files. So far, this has apparently never mattered for a PL/Python build. But with the new multi-arch Python packages in Debian and Ubuntu, this is becoming the standard configuration on these platforms, so we must check these directories separately to be able to build there. Also add a bit of reporting in configure to be able to see better what is going on with this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cffb187d80d87399c5d2c4577b3f3ba775ef028">http://git.postgresql.org/pg/commitdiff/9cffb187d80d87399c5d2c4577b3f3ba775ef028</a></li>

<li>psql: Reduce compatibility warning. Only warn when connecting to a newer server, since connecting to older servers works pretty well nowadays. Also update the documentation a little about current psql/server compatibility expectations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cad02452457d7f6f29404411dfe13e6fe8accb7">http://git.postgresql.org/pg/commitdiff/5cad02452457d7f6f29404411dfe13e6fe8accb7</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Restore setting of _USE_32BIT_TIME_T to 32 bit MSVC builds. This was removed in commit cd004067742ee16ee63e55abfb4acbd5f09fbaab, we're not quite sure why, but there have been reports of crashes due to Alexander Shulgin Perl being built with it when we are not, and it certainly seems like the right thing to do. There is still some uncertainty as to why it sometimes fails and sometimes doesn't. Original patch from Owais Khani, substantially reworked and extended by Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef58b87df2afe91189e9ffb81b65c1127d53bc88">http://git.postgresql.org/pg/commitdiff/ef58b87df2afe91189e9ffb81b65c1127d53bc88</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dickson S. Guedes sent in another revision of the patch to add IF NOT EXISTS to CREATE SCHEMA.</li>

<li>Amit Kapila sent in another revision of the patch to improve performance by reducing WAL for update operations.</li>

<li>Alvaro Herrera sent in two more revisions of the patch to add foreign key locks.</li>

<li>Dimitri Fontaine sent in a patch tweaking the behavior of EVENT triggers.</li>

<li>Dean Rasheed sent in three more revisions of the patch to implement updatable views.</li>

<li>Tom Lane sent in a patch to fix an issue where function parameters aren't getting to the functions they are part of because of the lack of type inference.</li>

<li>Amit Kapila sent in a patch to document pg_resetxlog and compute the max LSN of data pages.</li>

<li>Owais Khan and Andrew Dunstan traded patches to use a 32-bit time_t structure on Windows in order not to break PL/Perl.</li>

<li>Dimitri Fontaine sent in a patch to prevent event triggers from firing in stand-alone mode.</li>

<li>Peter Eisentraut sent in a patch to change the many "%d tuples done" lines to a sort of progress counter that stays on the same line.</li>

<li>Pavel Stehule sent in another revision of the patch to allow tuning the display of booleans in psql.</li>

<li>Bruce Momjian and Tom Lane traded patches to make a pg_upgrade failure mode involving socket directories less likely.</li>

<li>KaiGai Kohei sent in a patch to fix a case sepgsql missed in CREATE TABLE AS.</li>

<li>KaiGai Kohei sent in a patch to make sepgsql follow recent changes to the core API.</li>

<li>Tomas Vondra sent in two more revisions of the patch to enable pgbench to write random samples into the transaction log.</li>

<li>Andrew Dunstan sent in a patch to make pg_upgrade work on Windows.</li>

<li>Andrew Dunstan sent in a patch to make pg_upgrade's "make check" work on Windows with Mingw.</li>

<li>Tom Lane sent in a proof-of-concept patch for talking to a standalone backend using libpq and a pair of pipes.</li>

</ul>