---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 novembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-11-24-nouvelles-hebdomadaires-de-postgresql-14-novembre-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use appendrel planning logic for top-level UNION ALL structures. Formerly, we could convert a UNION ALL structure inside a subquery-in-FROM into an appendrel, as a side effect of pulling up the subquery into its parent; but top-level UNION ALL always caused use of plan_set_operations(). That didn't matter too much because you got an Append-based plan either way. However, now that the appendrel code can do things with MergeAppend, it's worthwhile to hack up the top-level case so it also uses appendrels. This is a bit of a stopgap; but going much further than this will require a major rewrite of the planner's set-operations support, which I'm not prepared to undertake now. For the moment let's grab the low-hanging fruit. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=947d0c862c895618a874344322e7b07c9df05cb2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=947d0c862c895618a874344322e7b07c9df05cb2</a></li>

<li>Fix error handling in temp-file deletion with log_temp_files active. The original coding in FileClose() reset the file-is-temp flag before unlinking the file, so that if control came back through due to an error, it wouldn't try to unlink the file twice. This was correct when written, but when the log_temp_files feature was added, the logging action was put in between those two steps. An error occurring during the logging action --- such as a query cancel --- would result in the unlink not getting done at all, as in recent report from Michael Glaesemann. To fix this, make sure that we do both the stat and the unlink before doing anything that could conceivably CHECK_FOR_INTERRUPTS. There is a judgment call here, which is which log message to emit first: if you can see only one, which should it be? I chose to log unlink failure at the risk of losing the log_temp_files log message --- after all, if the unlink does fail, the temp file is still there for you to see. Back-patch to all versions that have log_temp_files. The code was OK before that. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=54428dbe90cf11d17439acad9b8dcf375a14819d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=54428dbe90cf11d17439acad9b8dcf375a14819d</a></li>

<li>Repair memory leakage while ANALYZE-ing complex index expressions. The general design of memory management in Postgres is that intermediate results computed by an expression are not freed until the end of the tuple cycle. For expression indexes, ANALYZE has to re-evaluate each expression for each of its sample rows, and it wasn't bothering to free intermediate results until the end of processing of that index. This could lead to very substantial leakage if the intermediate results were large, as in a recent example from Jakub Ouhrabka. Fix by doing ResetExprContext for each sample row. This necessitates adding a datumCopy step to ensure that the final expression value isn't recycled too. Some quick testing suggests that this change adds at worst about 10% to the time needed to analyze a table with an expression index; which is annoying, but seems a tolerable price to pay to avoid unexpected out-of-memory problems. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=80fb2c1f4037d10cc259aee95558bca4a5fe4c30">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=80fb2c1f4037d10cc259aee95558bca4a5fe4c30</a></li>

<li>Improve pg_ctl's man page. Explicitly document that the -o options of pg_ctl init mode are meant for initdb, not postgres (Euler Taveira de Oliveira). Assorted other copy-editing (Tom). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0de92fd13cc436c76fbbd4759c94e2d3623a6bf1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0de92fd13cc436c76fbbd4759c94e2d3623a6bf1</a></li>

<li>Fix line_construct_pm() for the case of "infinite" (DBL_MAX) slope. This code was just plain wrong: what you got was not a line through the given point but a line almost indistinguishable from the Y-axis, although not truly vertical. The only caller that tries to use this function with m == DBL_MAX is dist_ps_internal for the case where the lseg is horizontal; it would end up producing the distance from the given point to the place where the lseg's line crosses the Y-axis. That function is used by other operators too, so there are several operators that could compute wrong distances from a line segment to something else. Per bug #5745 from jindiax. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b0f2d681bdfd6a5b3e90d092f9d924f943b4fc5f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b0f2d681bdfd6a5b3e90d092f9d924f943b4fc5f</a></li>

<li>Fix old oversight in const-simplification of COALESCE() expressions. Once we have found a non-null constant argument, there is no need to examine additional arguments of the COALESCE. The previous coding got it right only if the constant was in the first argument position; otherwise it tried to simplify following arguments too, leading to unexpected behavior like this: regression=# select coalesce(f1, 42, 1/0) from int4_tbl; ERROR: division by zero It's a minor corner case, but a bug is a bug, so back-patch all the way. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7304244e26b92d533f7e44f0afbcf1ff2f46286">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7304244e26b92d533f7e44f0afbcf1ff2f46286</a></li>

<li>Add missing outfuncs.c support for struct InhRelation. This is needed to support debug_print_parse, per report from Jon Nelson. Cursory testing via the regression tests suggests we aren't missing anything else. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2138c701a397885d4f360c90bf8b95d0d98aecd0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2138c701a397885d4f360c90bf8b95d0d98aecd0</a></li>

<li>Work around make 3.80 bug with long expansions of $(eval). 3.80 breaks if the expansion of $(eval) is long enough to require expansion of its internal variable_buffer. For the purposes of $(recurse) that means it'll work so long as no single evaluation of _create_recursive_target produces more than 195 bytes. We can manage that by looping over subdirectories outside the call instead of complicating the generated rule. This coding is simpler and more readable anyway. Or at least, this works for me. We'll see if the buildfarm likes it. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1bd201214965b3eba23bee2c4ce4c14accde170f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1bd201214965b3eba23bee2c4ce4c14accde170f</a></li>

<li>Fix canAcceptConnections() bugs introduced by replication-related patches. We must not return any "okay to proceed" result code without having checked for too many children, else we might fail later on when trying to add the new child to one of the per-child state arrays. It's not clear whether this oversight explains Stefan Kaltenbrunner's recent report, but it could certainly produce a similar symptom. Back-patch to 8.4; the logic was not broken before that. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3892a2d8619ee5623fc3ebee775538fdea1f529e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3892a2d8619ee5623fc3ebee775538fdea1f529e</a></li>

<li>Adjust comments about what's needed to avoid make 3.80 bug. ... based on further tracing through that code. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=357edc9a9952582c510cff1b08ebc5fd8df81a3b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=357edc9a9952582c510cff1b08ebc5fd8df81a3b</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix permanent memory leak in autovacuum launcher. get_database_list was uselessly allocating its output data, along some created along the way, in a permanent memory context. This didn't matter when autovacuum was a single, short-lived process, but now that the launcher is permanent, it shows up as a permanent leak. To fix, make get_database list allocate its output data in the caller's context, which is in charge of freeing it when appropriate; and the memory leaked by heap_beginscan et al is allocated in a throwaway transaction context. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=854ae8c3a6bab2053f8bdbc453787be878ce8c81">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=854ae8c3a6bab2053f8bdbc453787be878ce8c81</a></li>

<li>plpython has plpy.Error instead of plpy.ERROR. Author: Marti Raudsepp &lt;marti@juffo.org&gt; 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=73bc5218df0330a4beb737f497fa8d7b337c9f90">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=73bc5218df0330a4beb737f497fa8d7b337c9f90</a></li>

<li>Merge docs for CREATE CONSTRAINT TRIGGER and CREATE TRIGGER 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b47953f9c69d48a9261bd643e3170017b93f6337">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b47953f9c69d48a9261bd643e3170017b93f6337</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>In rewriteheap.c (used by VACUUM FULL and CLUSTER), calculate the tuple length stored in the line pointer the same way it's calculated in the normal heap_insert() codepath. As noted by Jeff Davis, the length stored by raw_heap_insert() included padding but the one stored by the normal codepath did not. While the mismatch seems to be harmless, inconsistency isn't good, and the normal codepath has received a lot more testing over the years. Backpatch to 8.3 where the heap rewrite code was introduced. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=000efc3dfdf425136ef9564e86d1800cbe584e75">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=000efc3dfdf425136ef9564e86d1800cbe584e75</a></li>

<li>Fix bug introduced by the recent patch to check that the checkpoint redo location read from backup label file can be found: wasShutdown was set incorrectly when a backup label file was found. Jeff Davis, with a little tweaking by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=542bdb2146327972545630d0a428e1c9367266cb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=542bdb2146327972545630d0a428e1c9367266cb</a></li>

<li>Add missing support for removing foreign data wrapper / server privileges belonging to a user at DROP OWNED BY. Foreign data wrappers and servers don't do anything useful yet, which is why no-one has noticed, but since we have them, seems prudent to fix this. Per report from Chetan Suttraway. Backpatch to 9.0, 8.4 has the same problem but this patch didn't apply there so I'm not going to bother. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e356743f3ed45c36dcc4d0dbf6c1e8751b3d70b5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e356743f3ed45c36dcc4d0dbf6c1e8751b3d70b5</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't use __declspec (dllimport) for PGDLLEXPORT to reduce warnings by gcc version 4 on mingw and cygwin. We don't use dllexport here because dllexport and dllwrap don't work well together. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=844ed5dc97d4374a4056f0f1cc3b0b78347c74c5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=844ed5dc97d4374a4056f0f1cc3b0b78347c74c5</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add monitoring function pg_last_xact_replay_timestamp. Fujii Masao, with a little wordsmithing by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7ba6e4f0e08bd7bdf4d12974ac1e37fb0459c97c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7ba6e4f0e08bd7bdf4d12974ac1e37fb0459c97c</a></li>

<li>Move copydir() prototype into its own header file. Having this in src/include/port.h makes no sense, now that copydir.c lives in src/backend/strorage rather than src/port. Along the way, remove an obsolete comment from contrib/pg_upgrade that makes reference to the old location. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=11e482c350c431fb2f51c6ceb847e5e31ea38911">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=11e482c350c431fb2f51c6ceb847e5e31ea38911</a></li>

<li>Cleanup various comparisons with the constant "true". Itagaki Takahiro, with slight modifications. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5aa446c961a6fdf15ff9c398751efd6ecff0c64a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5aa446c961a6fdf15ff9c398751efd6ecff0c64a</a></li>

<li>Fix bug in cube picksplit algorithm. Alexander Korotkov. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fa0a23c70cc346011a3dd8ea902f8d1668644b0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fa0a23c70cc346011a3dd8ea902f8d1668644b0</a></li>

<li>Correct poor grammar in comment. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ccbc3d802d1690b78f887b2310d2a7258eaae94">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ccbc3d802d1690b78f887b2310d2a7258eaae94</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Mention that pg_upgrade requires compatible 32/64-bit binaries. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8f742d1cdab987ba4624ad0c6aa008ced15cd87c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8f742d1cdab987ba4624ad0c6aa008ced15cd87c</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improved parallel make support Replace for loops in makefiles with proper dependencies. Parallel make can now span across directories. Also, make -k and make -q work properly. GNU make 3.80 or newer is now required. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=19e231bbdaef792dce22100012b504e2fb72f971">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=19e231bbdaef792dce22100012b504e2fb72f971</a></li>

<li>docs -&gt; documentation 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d6754f67b08ad6a05640fc5d9d97c6f225512ea0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d6754f67b08ad6a05640fc5d9d97c6f225512ea0</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Attempt to fix MSVC builds broken by parallel make changes. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52e2c12288cdcdcaa46a18937cc051d3322bbc99">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52e2c12288cdcdcaa46a18937cc051d3322bbc99</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Shigeru HANADA sent in two more revisions of the patch for SQL/MED.</li>

<li>Heikki Linnakangas sent in two WIP patches to fix some misbehavior in the interaction between GIN and GiST index splits, and checkpoints.</li>

<li>KaiGai Kohei sent in two revisions of a patch to add security hooks on object creation.</li>

<li>Peter Eisentraut sent in a patch to add [RESTRICT|CASCADE] to ALTER TYPE ... ADD/ALTER/DROP/RENAME ATTRIBUTE, so that recurses to typed tables.</li>

<li>Bruce Momjian sent in a patch to fix an issue where PostgreSQL appears stopped when it is actually running.</li>

<li>Bruce Momjian sent in a patch to correct some error messages for connections to PostgreSQL over ipv6 in libpq.</li>

<li>KaiGai Kohei sent in a patch to allow the security label provider to switch security label of the client during execution of certain functions.</li>

<li>Robert Haas sent in a set of three patches intended to be infrastructure for unlogged tables.</li>

<li>Jan Urbanski sent in a patch to fix a bug in plpython's Python Generators.</li>

<li>Greg Smith sent in a rebased and corrected version of the MERGE patch.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to add writeable CTEs, this time using single-snapshot isolation per discussion.</li>

<li>Greg Smith sent in a patch which adds some logging for each individual fsync call made during a checkpoint, along with a summary at the end.</li>

<li>Greg Smith sent in a patch which adds a new field to pg_stat_bgwriter, counting the number of times backends execute their own fsync calls.</li>

<li>Greg Smith and Simon Riggs wrote and Greg Smith sent in a patch which spreads out the individual checkpoint fsync calls over time.</li>

<li>ITAGAKI Takahiro sent in a WIP patch to add support for MULTISET functions.</li>

<li>Joachim Wieland sent in a patch to add a new "directory" format to pg_dump, which is in part infrastructure for parallel pg_dump.</li>

<li>Joachim Wieland sent in a patch based on the above patch which allows for parallel pg_dump and pg_restore.</li>

<li>Peter Eisentraut sent in another patch to implement per-column collation.</li>

<li>Gregory Stark sent in another revision of the patch to add getrusage resource tracking to EXPLAIN ANALYZE.</li>

</ul>