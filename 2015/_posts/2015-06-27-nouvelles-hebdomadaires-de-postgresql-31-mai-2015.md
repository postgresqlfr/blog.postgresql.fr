---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 mai 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-06-27-nouvelles-hebdomadaires-de-postgresql-31-mai-2015 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Bruce Momjian pushed:</p>

<ul>

<li>Revert 9.5 pgindent changes to atomics directory files. This is because there are many __asm__ blocks there that pgindent messes up. Also configure pgindent to skip that directory in the future. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/befa3e648ce018d84cd2a0df701927c56fe3da4e">http://git.postgresql.org/pg/commitdiff/befa3e648ce018d84cd2a0df701927c56fe3da4e</a></li>

<li>pgindent: more doc updates for skipping __asm__ files <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/266b6984cd7391e42770ca3a9922a9e8b1d4d7d3">http://git.postgresql.org/pg/commitdiff/266b6984cd7391e42770ca3a9922a9e8b1d4d7d3</a></li>

<li>pgindent: fix typo. Report by Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8339e70da6682059f7ab40f0c0b0dfcdcb78761d">http://git.postgresql.org/pg/commitdiff/8339e70da6682059f7ab40f0c0b0dfcdcb78761d</a></li>

<li>pgindent: document location of "all" typedef lists <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3503003eb70c5a56c59afb20b4c7abec6cf9eb86">http://git.postgresql.org/pg/commitdiff/3503003eb70c5a56c59afb20b4c7abec6cf9eb86</a></li>

<li>pg_upgrade: add missing period in C comment <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac6f22957d2f2999034b6a14d0d4bee25ba95f04">http://git.postgresql.org/pg/commitdiff/ac6f22957d2f2999034b6a14d0d4bee25ba95f04</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix rescan of IndexScan node with the new lossy GiST distance functions. Must reset the "reached end" flag and reorder queue at rescan. Per report from Regina Obe, bug #13349 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/12e6c5a6cae1e34da2d320390993010b6e15ba9e">http://git.postgresql.org/pg/commitdiff/12e6c5a6cae1e34da2d320390993010b6e15ba9e</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Clean up and simplify jsonb_concat code. Some of this is made possible by commit 9b74f32cdbff8b9be47fc69164eae552050509ff which lets pushJsonbValue handle binary Jsonb values, meaning that clients no longer have to, and some is just doing things in simpler and more straightforward ways. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6739aa298b5e3260481a2d5723a75b057d6119c6">http://git.postgresql.org/pg/commitdiff/6739aa298b5e3260481a2d5723a75b057d6119c6</a></li>

<li>Simplify addJsonbToParseState(). This function no longer needs to walk non-scalar structures passed to it, following commit 54547bd87f49326d67051254c363e6597d16ffda. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fba12c8c6c4159e1923958a4006b26f3cf873254">http://git.postgresql.org/pg/commitdiff/fba12c8c6c4159e1923958a4006b26f3cf873254</a></li>

<li>Add all structured objects passed to pushJsonbValue piecewise. Commit 9b74f32cdbff8b9be47fc69164eae552050509ff did this for objects of type jbvBinary, but in trying further to simplify some of the new jsonb code I discovered that objects of type jbvObject or jbvArray passed as WJB_ELEM or WJB_VALUE also caused problems. These too are now added component by component. Backpatch to 9.4. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54547bd87f49326d67051254c363e6597d16ffda">http://git.postgresql.org/pg/commitdiff/54547bd87f49326d67051254c363e6597d16ffda</a></li>

<li>Revert "Simplify addJsonbToParseState()". This reverts commit fba12c8c6c4159e1923958a4006b26f3cf873254. This relied on a commit that is also being reverted. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/956cc4434c3a8e69813b325618402508d1dbdcd9">http://git.postgresql.org/pg/commitdiff/956cc4434c3a8e69813b325618402508d1dbdcd9</a></li>

<li>Revert "Add all structured objects passed to pushJsonbValue piecewise." This reverts commit 54547bd87f49326d67051254c363e6597d16ffda. This appears to have been a thinko on my part. I will try to come up with a better solution. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f41042cea0619eaa812e630f87472e805b0dfdb0">http://git.postgresql.org/pg/commitdiff/f41042cea0619eaa812e630f87472e805b0dfdb0</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Update README.tuplock. Multixact truncation is now handled differently, and this file hadn't gotten the memo. Per note from Amit Langote. I didn't use his patch, though. Also update the description of infomask bits, which weren't completely up to date either. This commit also propagates b01a4f6838 back to 9.3 and 9.4, which apparently I failed to do back then. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdbdc4382743fcfabb3437ea7c4d103adaa01324">http://git.postgresql.org/pg/commitdiff/cdbdc4382743fcfabb3437ea7c4d103adaa01324</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Explain CHECK constraint handling in postgres_fdw's IMPORT FOREIGN SCHEMA. The existing documentation could easily be misinterpreted, and it failed to explain the inconsistent-evaluation hazard that deterred us from supporting automatic importing of check constraints. Revise it. Etsuro Fujita, further expanded by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e70ec8230a2c0e7363bb7abf4d55dddbdec89fe1">http://git.postgresql.org/pg/commitdiff/e70ec8230a2c0e7363bb7abf4d55dddbdec89fe1</a></li>

<li>Fix valgrind's "unaddressable bytes" whining about BRIN code. brin_form_tuple calculated an exact tuple size, then palloc'd and filled just that much. Later, brin_doinsert or brin_doupdate would MAXALIGN the tuple size and tell PageAddItem that that was the size of the tuple to insert. If the original tuple size wasn't a multiple of MAXALIGN, the net result would be that PageAddItem would memcpy a few more bytes than the palloc request had been for. AFAICS, this is totally harmless in the real world: the error is a read overrun not a write overrun, and palloc would certainly have rounded the request up to a MAXALIGN multiple internally, so there's no chance of the memcpy fetching off the end of memory. Valgrind, however, is picky to the byte level not the MAXALIGN level. Fix it by pushing the MAXALIGN step back to brin_form_tuple. (The other possible source of tuples in this code, brin_form_placeholder_tuple, was already producing a MAXALIGN'd result.) In passing, be a bit more paranoid about internal allocations in brin_form_tuple. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79f2b5d583e2e2a7ccd13e31d0e20a900c8f2f61">http://git.postgresql.org/pg/commitdiff/79f2b5d583e2e2a7ccd13e31d0e20a900c8f2f61</a></li>

<li>Suppress occasional failures in brin regression test. brin.sql included a call of brin_summarize_new_values(), and expected it to always report exactly 5 summarization events. This failed sometimes during parallel regression tests, as a consequence of the database-wide VACUUM in gist.sql getting there first. The most future-proof way to avoid variation in the test results is to forget about using brin_summarize_new_values() and just do a plain "VACUUM brintest", which will exercise the same code anyway. Having done that, there's no need for preventing autovacuum on brintest; doing so just reduces the scope of test coverage, so let's not. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f303fd1be51f26553e7c95d8696aa4e28ece1c6">http://git.postgresql.org/pg/commitdiff/1f303fd1be51f26553e7c95d8696aa4e28ece1c6</a></li>

<li>Remove configure check prohibiting threaded libpython on OpenBSD. According to recent tests, this case now works fine, so there's no reason to reject it anymore. (Even if there are still some OpenBSD platforms in the wild where it doesn't work, removing the check won't break any case that worked before.) We can actually remove the entire test that discovers whether libpython is threaded, since without the OpenBSD case there's no need to know that at all. Per report from Davin Potts. Back-patch to all active branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86832eb8912b9cac0f4961facb9efda81828e214">http://git.postgresql.org/pg/commitdiff/86832eb8912b9cac0f4961facb9efda81828e214</a></li>

<li>Fix portability issue in isolationtester grammar. specparse.y and specscanner.l used "string" as a token name. Now, bison likes to define each token name as a macro for the token code it assigns, which means those names are basically off-limits for any other use within the grammar file or included headers. So names as generic as "string" are dangerous. This is what was causing the recent failures on protosciurus: some versions of Solaris' sys/kstat.h use "string" as a field name. With late-model bison we don't see this problem because the token macros aren't defined till later (that is why castoroides didn't show the problem even though it's on the same machine). But protosciurus uses bison 1.875 which defines the token macros up front. This land mine has been there from day one; we'd have found it sooner except that protosciurus wasn't trying to run the isolation tests till recently. To fix, rename the token to "string_literal" which is hopefully less likely to collide with names used by system headers. Back-patch to all branches containing the isolation tests. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa9eac45ea868e6ddabc4eb076d18be10ce84c6a">http://git.postgresql.org/pg/commitdiff/aa9eac45ea868e6ddabc4eb076d18be10ce84c6a</a></li>

<li>Fix pg_get_functiondef() to print a function's LEAKPROOF property. Seems to have been an oversight in the original leakproofness patch. Per report and patch from Jeevan Chalke. In passing, prettify some awkward leakproof-related code in AlterFunction. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f46edf479e2468a08caca2a03ec7e258930a7161">http://git.postgresql.org/pg/commitdiff/f46edf479e2468a08caca2a03ec7e258930a7161</a></li>

<li>Fix assorted inconsistencies in our calls of readlink(). Ensure that we null-terminate the result string (one place in pg_rewind). Be paranoid about out-of-range results from readlink() (should not happen, but there is no good reason for some call sites to be careful about it and others not). Consistently use the whole buffer, not sometimes one byte less. Ensure we emit an appropriate errcode() in all cases. Spell the error messages the same way. The only serious bug here is the missing null-termination in pg_rewind, which is new code, so no need for a back-patch. Abhijit Menon-Sen and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32f628be74d8ab43423ca7913b81f7eb21b312d4">http://git.postgresql.org/pg/commitdiff/32f628be74d8ab43423ca7913b81f7eb21b312d4</a></li>

<li>Fix pg_rewind's handling of top-level symlinks. The previous coding suffered a null-pointer dereference if it found any symlink at the top level of $PGDATA. Fix that, and teach it to recurse into a symlink for pg_xlog, but not anything else. Per note from Abhijit Menon-Sen. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0381fefaa44f04e17dffb7e46e7677374a4fb2c7">http://git.postgresql.org/pg/commitdiff/0381fefaa44f04e17dffb7e46e7677374a4fb2c7</a></li>

<li>Fix fsync-at-startup code to not treat errors as fatal. Commit 2ce439f3379aed857517c8ce207485655000fc8e introduced a rather serious regression, namely that if its scan of the data directory came across any un-fsync-able files, it would fail and thereby prevent database startup. Worse yet, symlinks to such files also caused the problem, which meant that crash restart was guaranteed to fail on certain common installations such as older Debian. After discussion, we agreed that (1) failure to start is worse than any consequence of not fsync'ing is likely to be, therefore treat all errors in this code as nonfatal; (2) we should not chase symlinks other than those that are expected to exist, namely pg_xlog/ and tablespace links under pg_tblspc/. The latter restriction avoids possibly fsync'ing a much larger part of the filesystem than intended, if the user has left random symlinks hanging about in the data directory. This commit takes care of that and also does some code beautification, mainly moving the relevant code into fd.c, which seems a much better place for it than xlog.c, and making sure that the conditional compilation for the pre_sync_fname pass has something to do with whether pg_flush_data works. I also relocated the call site in xlog.c down a few lines; it seems a bit silly to be doing this before ValidateXLOGDirectoryStructure(). The similar logic in initdb.c ought to be made to match this, but that change is noncritical and will be dealt with separately. Back-patch to all active branches, like the prior commit. Abhijit Menon-Sen and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8179b001ae574da00c8f4549577095bf90f3337">http://git.postgresql.org/pg/commitdiff/d8179b001ae574da00c8f4549577095bf90f3337</a></li>

<li>Revert exporting of internal GUC variable "data_directory". This undoes a poorly-thought-out choice in commit 970a18687f9b3058, namely to export guc.c's internal variable data_directory. The authoritative variable so far as C code is concerned is DataDir; there is no reason for anything except specific bits of GUC code to look at the GUC variable. After yesterday's commits fixing the fsync-on-restart patch, the only remaining misuse of data_directory was in AlterSystemSetConfigFile(), which would be much better off just using a relative path anyhow: it's less code and it doesn't break if the DBA moves the data directory of a running system, which is a case we've taken some pains over in the past. This is mostly cosmetic, so no need for a back-patch (and I'd be hesitant to remove a global variable in stable branches anyway). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da33a3894e0fc440ac53cdc0f2e360e703b13b8c">http://git.postgresql.org/pg/commitdiff/da33a3894e0fc440ac53cdc0f2e360e703b13b8c</a></li>

<li>Check that all aliases of a built-in function have same leakproof property. opr_sanity.sql has a test checking that relevant properties of built-in functions match when the same C function is referenced by multiple pg_proc entries. The test neglected to check proleakproof, though, and when I added that condition it exposed that xideqint4 hadn't been updated to match xideq. So fix that as well, and in consequence bump catversion. This isn't very critical, so no need to worry about fixing back branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c8c656b3c217aaffc503ad703dcc60cdabe7445">http://git.postgresql.org/pg/commitdiff/1c8c656b3c217aaffc503ad703dcc60cdabe7445</a></li>

<li>Remove special cases for ETXTBSY from new fsync'ing logic. The argument that this is a sufficiently-expected case to be silently ignored seems pretty thin. Andres had brought it up back when we were still considering that most fsync failures should be hard errors, and it probably would be legit not to fail hard for ETXTBSY --- but the same is true for EROFS and other cases, which is why we gave up on hard failures. ETXTBSY is surely not a normal case, so logging the failure seems fine from here. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57e1138bcc621ffeb8b1f1379ac4016a5c34d43e">http://git.postgresql.org/pg/commitdiff/57e1138bcc621ffeb8b1f1379ac4016a5c34d43e</a></li>

<li>initdb -S should now have an explicit check that $PGDATA is valid. The fsync code from the backend essentially assumes that somebody's already validated PGDATA, at least to the extent of it being a readable directory. That's safe enough for initdb's normal code path too, but "initdb -S" doesn't have any other processing at all that touches the target directory. To have reasonable error-case behavior, add a pg_check_dir call. Per gripe from Peter E. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1943c000b7a22d3ca334196cfe3f7b8159b210c2">http://git.postgresql.org/pg/commitdiff/1943c000b7a22d3ca334196cfe3f7b8159b210c2</a></li>

<li>Adjust initdb to also not consider fsync'ing failures fatal. Make initdb's version of this logic look as much like the backend's as possible. This is much less critical than in the backend since not so many people use "initdb -S", but we want the same corner-case error handling in both cases. Back-patch to 9.3 where initdb -S option was introduced. Before that, initdb only had to deal with freshly-created data directories, wherein no failures should be expected. Abhijit Menon-Sen <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c07d8c963e39980f192e8daca73b7585ef76cc9b">http://git.postgresql.org/pg/commitdiff/c07d8c963e39980f192e8daca73b7585ef76cc9b</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Remove pg_audit. This removes pg_audit, per discussion: 20150528082038.GU26667@tamriel.snowman.net <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5f1a4f1e350f1e72531d032eaa9095ba5baeb51">http://git.postgresql.org/pg/commitdiff/e5f1a4f1e350f1e72531d032eaa9095ba5baeb51</a></li>

<li>Finish removing pg_audit <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cde9cf170cf0f6fbd06b24930dab22d4445e3fb6">http://git.postgresql.org/pg/commitdiff/cde9cf170cf0f6fbd06b24930dab22d4445e3fb6</a></li>

<li>Remove *pgaudit* references also. Fixes the docs build. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5442cb2434c303fa2afc747cdac65df958ff8ac">http://git.postgresql.org/pg/commitdiff/d5442cb2434c303fa2afc747cdac65df958ff8ac</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Make Python tests more portable. Newer Python versions randomize the hash seed for dictionaries, resulting in a random output order, which messes up the regression test diffs. Instead, use Python assert to compare the dictionaries with their expected value. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75f9d17638c9c6bec34f80326c35010c47924728">http://git.postgresql.org/pg/commitdiff/75f9d17638c9c6bec34f80326c35010c47924728</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Peter Geoghegan sent in a patch to point out that for foreign tables, AddForeignUpdateTargets is not called INSERT operations with an ON CONFLICT DO UPDATE clause because that clause is not yet supported on foreign tables.</p>

<p>Peter Geoghegan sent in a flock of patches intended to ensure that some of the ON CONFLICT UPDATE always has its memory freed by its caller.</p>

<p>Emre Hasegeli sent in a patch to ensure that adjacent strategy numbers of range types match the central definitions.</p>

<p>Tomas Vondra sent in another revision of a patch to implement multivariate statistics.</p>

<p>Michael Paquier sent in another revision of a patch to add support for TAP tests on Windows.</p>

<p>Kaigai Kouhei sent in another revision of a patch to add a custom child jointree.</p>

<p>Uriy Zhuravlev sent in another revision of a patch to implement ALTER OPERATOR.</p>

<p>Uriy Zhuravlev sent in a patch to to add selectivity functions for intarray.</p>

<p>Andrew Dunstan sent in a patch to add a jsonb_set() function.</p>

<p>Tatsuo Ishii sent in a patch to fix some missing parts of the psql po translation for the Japanese language.</p>

<p>Peter Eisentraut sent in a WIP candidate candidate configuration which might eventually replace pgindent with clang-format.</p>

<p>SAWADA Masahiko sent in another revision of a patch to add a "frozen" bit into the visibility map.</p>

<p>Shigeru HANADA sent in another revision of a patch to implement postgres_fdw join pushdown.</p>

<p>boix sent in two revisions of a patch to use an ant colony optimization for GEQO.</p>

<p>Michael Paquier sent in another revision of a doc patch to better describe the behavior of txid_current().</p>

<p>Michael Paquier sent in a patch to fix a memory leak in XLogFileCopy.</p>

<p>Craig Ringer sent in a patch to document that directly callable functions may use fn_extra.</p>

<p>Naoya Anzai sent in a patch to add more vacuum statistics.</p>

<p>Abhijit Menon-Sen sent in a patch to ensure that S_IRUSR|S_IWUSR are set only with O_CREAT.</p>

<p>Peter Eisentraut sent in a patch to allow ALTER TABLE ENABLE TRIGGER to work on VIEWs.</p>

<p>Thomas Munro and Robert Haas traded patches to tolerate missing offset segments.</p>

<p>Tomas Vondra and Tom Lane traded patches to fix cost estimates for nested loop semijoin.</p>

<p>Andreas Karlsson sent in a patch to reload SSL certificates on SIGHUP, which makes it possible to enable or disable SSL entirely without a restart.</p>

<p>Andreas Karlsson sent in a patch to fix autoconf deprecation warnings.</p>