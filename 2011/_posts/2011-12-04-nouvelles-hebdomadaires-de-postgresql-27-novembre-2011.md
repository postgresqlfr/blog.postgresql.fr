---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 novembre 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-12-04-nouvelles-hebdomadaires-de-postgresql-27-novembre-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix citext upgrade script to update derived copies of pg_type.typcollation. If the existing citext type has not merely been created, but used in any tables, then the upgrade script wasn't doing enough. We have to update attcollation for each citext table column, and indcollation for each citext index column, as well. Per report from Rudolf van der Leeden. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b97b7f8356c63ea0b6704718d75ea01ec3035bf">http://git.postgresql.org/pg/commitdiff/9b97b7f8356c63ea0b6704718d75ea01ec3035bf</a></li>

<li>More code review for rangetypes patch. Fix up some infelicitous coding in DefineRange, and add some missing error checks. Rearrange operator strategy number assignments for GiST anyrange opclass so that they don't make such a mess of opr_sanity's table of operator names associated with different strategy numbers. Assign hopefully-temporary selectivity estimators to range operators that didn't have one --- poor as the estimates are, they're still a lot better than the default 0.5 estimate, and they'll shut up the opr_sanity test that wants to see selectivity estimators on all built-in operators. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4ffcc8e115ed637f69ecb0295d78cc97f08a483">http://git.postgresql.org/pg/commitdiff/a4ffcc8e115ed637f69ecb0295d78cc97f08a483</a></li>

<li>Still more review for range-types patch. Per discussion, relax the range input/construction rules so that the only hard error is lower bound &gt; upper bound. Cases where the lower bound is &lt;= upper bound, but the range nonetheless normalizes to empty, are now permitted. Fix core dump in range_adjacent when bounds are infinite. Marginal cleanup of regression test cases, some more code commenting. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/766948beddef66dd89563f465919eca6e131861c">http://git.postgresql.org/pg/commitdiff/766948beddef66dd89563f465919eca6e131861c</a></li>

<li>Improve implementation of range-contains-element tests. Implement these tests directly instead of constructing a singleton range and then applying range-contains. This saves a range serialize/deserialize cycle as well as a couple of redundant bound-comparison steps, and adds very little code on net. Remove elem_contained_by_range from the GiST opclass: it doesn't belong there because there is no way to use it in an index clause (where the indexed column would have to be on the left). Its commutator is in the opclass, and that's what counts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cddc819e45010492da00164d225a749661f43aef">http://git.postgresql.org/pg/commitdiff/cddc819e45010492da00164d225a749661f43aef</a></li>

<li>Remove zero- and one-argument range constructor functions. Per discussion, the zero-argument forms aren't really worth the catalog space (just write 'empty' instead). The one-argument forms have some use, but they also have a serious problem with looking too much like functional cast notation; to the point where in many real use-cases, the parser would misinterpret what was wanted. Committing this as a separate patch, with the thought that we might want to revert part or all of it if we can think of some way around the cast ambiguity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df73584431e7edb1dd76578777bd0fcc17b916a1">http://git.postgresql.org/pg/commitdiff/df73584431e7edb1dd76578777bd0fcc17b916a1</a></li>

<li>Remove user-selectable ANALYZE option for range types. It's not clear that a per-datatype typanalyze function would be any more useful than a generic typanalyze for ranges. What *is* clear is that letting unprivileged users select typanalyze functions is a crash risk or worse. So remove the option from CREATE TYPE AS RANGE, and instead put in a generic typanalyze function for ranges. The generic function does nothing as yet, but hopefully we'll improve that before 9.2 release. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74c1723fc8dca2d70576ef2f0a66f4a7c99c173a">http://git.postgresql.org/pg/commitdiff/74c1723fc8dca2d70576ef2f0a66f4a7c99c173a</a></li>

<li>Creator of a range type must have permission to call support functions. Since range types can be created by non-superusers, we need to consider their permissions. Ideally we'd check this when the type is used, not when it's created, but that seems like much more trouble than it's worth. The existing restriction that the support functions be immutable already prevents most cases where an unauthorized call to a function might be thought a security issue, and the fact that the user has no access to the results of the system's calls to subtype_diff closes off the other plausible reason for concern. So this check is basically pro-forma, but let's make it anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a912a2784be5d144aab89e447dfe8ca74b6ad079">http://git.postgresql.org/pg/commitdiff/a912a2784be5d144aab89e447dfe8ca74b6ad079</a></li>

<li>Adjust range_adjacent to support different canonicalization rules. The original coding would not work for discrete ranges in which the canonicalization rule is to produce symmetric boundaries (either [] or () style), as noted by Jeff Davis. Florian Pflug pointed out that we could fix that by invoking the canonicalization function to see if the range "between" the two given ranges normalizes to empty. This implementation of Florian's idea is a tad slower than the original code, but only in the case where there actually is a canonicalization function --- if not, it's essentially the same logic as before. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7056b832444696c931d59af057b0a345f5ae178">http://git.postgresql.org/pg/commitdiff/b7056b832444696c931d59af057b0a345f5ae178</a></li>

<li>Some more editing of the range-types documentation. Be more thorough about specifying the expectations for canonical and subtype_diff functions, and move that info to the same place. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/604d4c4c95c44090af25083ce6624fea3ebb4553">http://git.postgresql.org/pg/commitdiff/604d4c4c95c44090af25083ce6624fea3ebb4553</a></li>

<li>Fix unsupported options in CREATE TABLE ... AS EXECUTE. The WITH [NO] DATA option was not supported, nor the ability to specify replacement column names; the former limitation wasn't even documented, as per recent complaint from Naoya Anzai. Fix by moving the responsibility for supporting these options into the executor. It actually takes less code this way ... catversion bump due to change in representation of IntoClause, which might affect stored rules. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ed439a9c07b69c2617cc98596611fdbdc22472c">http://git.postgresql.org/pg/commitdiff/9ed439a9c07b69c2617cc98596611fdbdc22472c</a></li>

<li>Fix erroneous replay of GIN_UPDATE_META_PAGE WAL records. A simple thinko in ginRedoUpdateMetapage, namely failing to increment a loop counter, led to inserting records into the last pending-list page in the wrong order (the opposite of that intended). So far as I can tell, this would not upset the code that eventually flushes pending items into the main part of the GIN index. But it did break the code that searched the pending list for matches, resulting in transient failure to find matching entries during index lookups, as illustrated in bug #6307 from Maksym Boguk. Back-patch to 8.4 where the incorrect code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/877b67c38b946dcbf70fe11736bdde841e4c826b">http://git.postgresql.org/pg/commitdiff/877b67c38b946dcbf70fe11736bdde841e4c826b</a></li>

<li>Fix overly-aggressive and inconsistent quoting in OS X start script. Sidar Lopez, per bug #6310, with some additional improvements by me. Back-patch to 9.0, where the issue was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c8768c3861d6690656b74676c44ffa63c0e4ef7">http://git.postgresql.org/pg/commitdiff/6c8768c3861d6690656b74676c44ffa63c0e4ef7</a></li>

<li>Make GiST index searches smarter about queries against empty ranges. In the cases where the result of the called proc is negated, we should explicitly test both inputs for empty, to ensure we'll never return "true" for an unsatisfiable query. In other cases we can rely on the called proc to say the right thing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5966bcecf6167f2921e614e66499fa4d2c195c64">http://git.postgresql.org/pg/commitdiff/5966bcecf6167f2921e614e66499fa4d2c195c64</a></li>

<li>Use the proper macro to convert a bool to a Datum. The original coding was var-&gt;value = (Datum) state; which is bogus, and then in commit 2f0f7b4bce13e68394543728801ef011fd82fac6 it was "corrected" to var-&gt;value = PointerGetDatum(state); which is a faithful translation but still wrong. This seems purely cosmetic, though, so no need for a back-patch. Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8722a1a06aedbbbeb4f848a7b9ee62d6ae8649c6">http://git.postgresql.org/pg/commitdiff/8722a1a06aedbbbeb4f848a7b9ee62d6ae8649c6</a></li>

<li>Improve GiST range-contained-by searches by adding a flag for empty ranges. In the original implementation, a range-contained-by search had to scan the entire index because an empty range could be lurking anywhere. Improve that by adding a flag to upper GiST entries that says whether the represented subtree contains any empty ranges. Also, make a simple mod to the penalty function to discourage empty ranges from getting pushed into subtrees without any. This needs more work, and the picksplit function should be taught about it too, but that code can be improved without causing an on-disk compatibility break; so we'll leave it for another day. Since we're breaking on-disk compatibility of range values anyway, I took the opportunity to reorganize the range flags bits; the unused RANGE_xB_NULL bits are now adjacent, which might open the door for using them in some other way later. In passing, remove the GiST range opclass entry for &lt;&gt;, which doesn't seem like it can really be indexed usefully. Alexander Korotkov, with some editorializing by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c66e4f138b04d749a713ad075e16f3d60975f5ad">http://git.postgresql.org/pg/commitdiff/c66e4f138b04d749a713ad075e16f3d60975f5ad</a></li>

<li>Use IEEE infinity, not 1e10, for null-and-not-null case in gistpenalty(). Use of a randomly chosen large value was never exactly graceful, and now that there are penalty functions that are intentionally using infinity, it doesn't seem like a good idea for null-vs-not-null to be using something less. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f4563f743eab0682f908d51fa3a9c630b31322d">http://git.postgresql.org/pg/commitdiff/9f4563f743eab0682f908d51fa3a9c630b31322d</a></li>

<li>Ensure that whole-row junk Vars are always of composite type. The EvalPlanQual machinery assumes that whole-row Vars generated for the outputs of non-table RTEs will be of composite types. However, for the case where the RTE is a function call returning a scalar type, we were doing the wrong thing, as a result of sharing code with a parser case where the function's scalar output is wanted. (Or at least, that's what that case has done historically; it does seem a bit inconsistent.) To fix, extend makeWholeRowVar's API so that it can support both use-cases. This fixes Belinda Cussen's report of crashes during concurrent execution of UPDATEs involving joins to the result of UNNEST() --- in READ COMMITTED mode, we'd run the EvalPlanQual machinery after a conflicting row update commits, and it was expecting to get a HeapTuple not a scalar datum from the "wholerowN" variable referencing the function RTE. Back-patch to 9.0 where the current EvalPlanQual implementation appeared. In 9.1 and up, this patch also fixes failure to attach the correct collation to the Var generated for a scalar-result case. An example: regression=# select upper(x.*) from textcat('ab', 'cd') x; ERROR: could not determine which collation to use for upper() function 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd3bab5fd74db009c946278bb314c8458a2fef11">http://git.postgresql.org/pg/commitdiff/dd3bab5fd74db009c946278bb314c8458a2fef11</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Continue to allow VACUUM to mark last block of index dirty even when there is no work to do. Further analysis required. Revert of patch c1458cc495ff800cd176a1c2e56d8b62680d9b71 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d2841a56c8fa37a5dd5c6d33488ba6ca37116ff">http://git.postgresql.org/pg/commitdiff/2d2841a56c8fa37a5dd5c6d33488ba6ca37116ff</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Small markup and wording improvement 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/024ea25ccd553aa0ecb41d626a1016470e25a9a0">http://git.postgresql.org/pg/commitdiff/024ea25ccd553aa0ecb41d626a1016470e25a9a0</a></li>

<li>Add pg_upgrade test suite. It runs the regression tests, runs pg_upgrade on the populated database, and compares the before and after dumps. While not actually a cross-version upgrade, this does detect omissions and bugs in the involved tools from time to time. It's also possible to do a cross-version upgrade by manually supplying parameters. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08da2d282f1c3cbff141ecd218d737990cf6d234">http://git.postgresql.org/pg/commitdiff/08da2d282f1c3cbff141ecd218d737990cf6d234</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Check for INSERT privileges in SELECT INTO / CREATE TABLE AS. In the normal course of events, this matters only if ALTER DEFAULT PRIVILEGES has been used to revoke default INSERT permission. Whether or not the new behavior is more or less likely to be what the user wants when dealing only with the built-in privilege facilities is arguable, but it's clearly better when using a loadable module such as sepgsql that may use the hook in ExecCheckRTPerms to enforce additional permissions checks. KaiGai Kohei, reviewed by Laurenz Albe 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1b4aa2a84732255bd8a34fc9c7994a04409b77a">http://git.postgresql.org/pg/commitdiff/f1b4aa2a84732255bd8a34fc9c7994a04409b77a</a></li>

<li>Move "hot" members of PGPROC into a separate PGXACT array. This speeds up snapshot-taking and reduces ProcArrayLock contention. Also, the PGPROC (and PGXACT) structures used by two-phase commit are now allocated as part of the main array, rather than in a separate array, and we keep ProcArray sorted in pointer order. These changes are intended to minimize the number of cache lines that must be pulled in to take a snapshot, and testing shows a substantial increase in performance on both read and write workloads at high concurrencies. Pavan Deolasee, Heikki Linnakangas, Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed0b409d22346b1b027a4c2099ca66984d94b6dd">http://git.postgresql.org/pg/commitdiff/ed0b409d22346b1b027a4c2099ca66984d94b6dd</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_upgrade ENABLE_SAME_CATVERSION_UPGRADES macro for testing to allow upgrades of the same catalog version. (Doesn't work for tablespaces, as indicated by C comment.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5df1403b0f2b44235c8f401bd49dab9a8cf6bf90">http://git.postgresql.org/pg/commitdiff/5df1403b0f2b44235c8f401bd49dab9a8cf6bf90</a></li>

<li>Allow pg_upgrade to upgrade clusters that use exclusion contraints by fixing pg_dump to properly preserve such indexes. Backpatch to 9.1 and 9.0 (where the bug was introduced). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35e27226b6751a90c9c911d08cb47b9f8a58825f">http://git.postgresql.org/pg/commitdiff/35e27226b6751a90c9c911d08cb47b9f8a58825f</a></li>

<li>Modify pg_dump to use error-free memory allocation macros. This avoids ignoring errors and call-site error checking. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c0afde11a12bb3ca7c68a30ad0dedaa0d1adef5">http://git.postgresql.org/pg/commitdiff/3c0afde11a12bb3ca7c68a30ad0dedaa0d1adef5</a></li>

<li>Remove ENABLE_SAME_CATVERSION_UPGRADES as unnecessary. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32fb4546e3f8cf9c2ef524e9c20766a046521193">http://git.postgresql.org/pg/commitdiff/32fb4546e3f8cf9c2ef524e9c20766a046521193</a></li>

<li>Fix join_path_components() to not add a leading slash when joining to an initial null string. Per report from Robert Haas in testing psql \ir. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd6dbc24ef1dc6b39a795b5e0e959cf500ad71d6">http://git.postgresql.org/pg/commitdiff/fd6dbc24ef1dc6b39a795b5e0e959cf500ad71d6</a></li>

<li>Move pg_dump memory routines into pg_dumpmem.c/h and restore common.c with its original functions. The previous function migration would cause too many difficulties in back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a7d49d1fba666c8bfb9df0065545e85d54dbc41">http://git.postgresql.org/pg/commitdiff/9a7d49d1fba666c8bfb9df0065545e85d54dbc41</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Preserve SQLSTATE when an SPI error is propagated through PL/python exception handler. This was a regression in 9.1, when the capability to catch specific SPI errors was added, so backpatch to 9.1. Mika Eloranta, with some editing by Jan Urba&#324;ski. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f21fc7f9fc63ff86d7d77d352ae274b6e2b6e09e">http://git.postgresql.org/pg/commitdiff/f21fc7f9fc63ff86d7d77d352ae274b6e2b6e09e</a></li>

<li>Take fillfactor into account in the new COPY bulk heap insert code. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dea5f6cefe74a6cb51a1cfd39e12a2e1a026df35">http://git.postgresql.org/pg/commitdiff/dea5f6cefe74a6cb51a1cfd39e12a2e1a026df35</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Dump an unvalidated constraint separately from its table. This allows possibly violating data to be imported before the constraint is installed. Bug reported by Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e90710f34a6d5a73475e4241852b377675600325">http://git.postgresql.org/pg/commitdiff/e90710f34a6d5a73475e4241852b377675600325</a></li>

<li>Improve logging of autovacuum I/O activity. This adds some I/O stats to the logging of autovacuum (when the operation takes long enough that log_autovacuum_min_duration causes it to be logged), so that it is easier to tune. Notably, it adds buffer I/O counts (hits, misses, dirtied) and read and write rate. Authors: Greg Smith and Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d3b50244357ef4c4e3b6e01f91de599077179c8">http://git.postgresql.org/pg/commitdiff/9d3b50244357ef4c4e3b6e01f91de599077179c8</a></li>

<li>Fix unvalidated check constraints on domains, too. Same bug as reported by Thom Brown for check constraints on tables: the constraint must be dumped separately from the domain, otherwise it is restored before the data and thus prevents potentially-violating data from being loaded in the first place. Per Dean Rasheed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f717f4bca298b0a1170ff506e02142e4859c3dae">http://git.postgresql.org/pg/commitdiff/f717f4bca298b0a1170ff506e02142e4859c3dae</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Ensure plperl strings are always correctly UTF8 encoded. Amit Khandekar and Alex Hunsaker. Backpatched to 9.1 where the problem first occurred. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cdb41b54e432ee75e3c61e990b735b15fa66e81">http://git.postgresql.org/pg/commitdiff/4cdb41b54e432ee75e3c61e990b735b15fa66e81</a></li>

<li>Use the preferred version of xsubpp, not necessarily the one that came with the distro version of perl. David Wheeler and Alex Hunsaker. Backpatch to 9.1 where it applies cleanly. A simple workaround is available for earlier branches, and further effort doesn't seem warranted. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba00ab0b111a0cbbac612e8ea8b0d5f96534102e">http://git.postgresql.org/pg/commitdiff/ba00ab0b111a0cbbac612e8ea8b0d5f96534102e</a></li>

<li>Use the right interpreter for encoding test. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/efb0423cc7c6e46c22816e2acc48e8f827e341ed">http://git.postgresql.org/pg/commitdiff/efb0423cc7c6e46c22816e2acc48e8f827e341ed</a></li>

<li>Fix MSVC builds broken by xsubpp change 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a9018135a37203e176a561913453b38788ac7da">http://git.postgresql.org/pg/commitdiff/4a9018135a37203e176a561913453b38788ac7da</a></li>

<li>Make pg_dumpall build with the right object files under MSVC. This fixes a longstanding but up to now benign bug in the way pg_dumpall was built. The bug was exposed by recent code adjustments. The Makefile does not use $(OBJS) to build pg_dumpall, so this fix removes their source files from the pg_dumpall object and adds in the one source file it consequently needs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91572ee0a6dfeb62dda6c375f613d1b7fdfc1383">http://git.postgresql.org/pg/commitdiff/91572ee0a6dfeb62dda6c375f613d1b7fdfc1383</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Mark Kirkwood sent in two revisions of a patch to allow renaming a database which has backends connected to it.</li>

<li>Peter Geoghegan sent in four more revisions of a patch to inline comparators as a performance optimization.</li>

<li>Alexander Korotkov sent in a WIP patch to allow index support for regex operators.</li>

<li>Jan Urbanski sent in another revision of the patch to add cursor support to PL/PythonU.</li>

<li>Pavel Stehule sent in a WIP patch to enable better support for debugging overloaded functions in PL/pgsql.</li>

<li>Lars Kanis sent in two revisions of a patch to fix some infelicities in certain versions of MSVC.</li>

<li>Pavel Stehule sent in a PoC patch to use errcontext for custom exceptions in PL/pgsql.</li>

<li>Andrew Dunstan sent in another revision of a patch to add a \setenv command to psql.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add command triggers.</li>

<li>Peter Eisentraut sent in a patch to fix error reports in vpath builds.</li>

<li>Pavel Stehule sent in another revision of the patch to add CHECK FUNCTION and CHECK TRIGGER functionality.</li>

<li>Andres Freund and Pavan Deolasee traded patches to avoid unneeded computation of snapshots.</li>

<li>Peter Eisentraut sent in a patch to allow psql to report the line number on which an error occurred when reading from stdin.</li>

<li>Ants Aasma sent in a patch to implement timing of shared buffer fills and per relation stats collection of said timings. Buffer flushes are timed as well but aren't exposed per table because of difficulty of correctly attributing them.</li>

</ul>