---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 mars 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-03-31-nouvelles-hebdomadaires-de-postgresql-27-mars-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>When two base backups are started at the same time with pg_basebackup, ensure that they use different checkpoints as the starting point. We use the checkpoint redo location as a unique identifier for the base backup in the end-of-backup record, and in the backup history file name. Bug spotted by Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d8096e2f3f2c1296fa880f44f3fa5701b2f40c4">http://git.postgresql.org/pg/commitdiff/6d8096e2f3f2c1296fa880f44f3fa5701b2f40c4</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>- Fix check_exclusion_constraint() to insert correct collations in ScanKeys. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0dd5c73527d4adc11211bd6ad43e3be121842f9">http://git.postgresql.org/pg/commitdiff/d0dd5c73527d4adc11211bd6ad43e3be121842f9</a></li>

<li>Reimplement planner's handling of MIN/MAX aggregate optimization (again). Instead of playing cute games with pathkeys, just build a direct representation of the intended sub-select, and feed it through query_planner to get a Path for the index access. This is a bit slower than 9.1's previous method, since we'll duplicate most of the overhead of query_planner; but since the whole optimization only applies to rather simple single-table queries, that probably won't be much of a problem in practice. The advantage is that we get to do the right thing when there's a partial index that needs the implicit IS NOT NULL clause to be usable. Also, although this makes planagg.c be a bit more closely tied to the ordering of operations in grouping_planner, we can get rid of some coupling to lower-level parts of the planner. Per complaint from Marti Raudsepp. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8df08c84894001d3d3f5d10b3290a1063a453316">http://git.postgresql.org/pg/commitdiff/8df08c84894001d3d3f5d10b3290a1063a453316</a></li>

<li>Avoid potential deadlock in InitCatCachePhase2(). Opening a catcache's index could require reading from that cache's own catalog, which of course would acquire AccessShareLock on the catalog. So the original coding here risks locking index before heap, which could deadlock against another backend trying to get exclusive locks in the normal order. Because InitCatCachePhase2 is only called when a backend has to start up without a relcache init file, the deadlock was seldom seen in the field. (And by the same token, there's no need to worry about any performance disadvantage; so not much point in trying to distinguish exactly which catalogs have the risk.) Bug report, diagnosis, and patch by Nikhil Sontakke. Additional commentary by me. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1192ba8b67df1446973c71aafde5f6f613dce0af">http://git.postgresql.org/pg/commitdiff/1192ba8b67df1446973c71aafde5f6f613dce0af</a></li>

<li>Throw error for indeterminate collation of an ORDER/GROUP/DISTINCT target. This restores a parse error that was thrown (though only in the ORDER BY case) by the original collation patch. I had removed it in my recent revisions because it was thrown at a place where collations now haven't been computed yet; but I thought of another way to handle it. Throwing the error at parse time, rather than leaving it to be done at runtime, is good because a syntax error pointer is helpful for localizing the problem. We can reasonably assume that the comparison function for a collatable datatype will complain if it doesn't have a collation to use. Now the planner might choose to implement GROUP or DISTINCT via hashing, in which case no runtime error would actually occur, but it seems better to throw error consistently rather than let the error depend on what the planner chooses to do. Another possible objection is that the user might specify a nondefault sort operator that doesn't care about collation ... but that's surely an uncommon usage, and it wouldn't hurt him to throw in a COLLATE clause anyway. This change also makes the ORDER BY/GROUP BY/DISTINCT case more consistent with the UNION/INTERSECT/EXCEPT case, which was already coded to throw this error even though the same objections could be raised there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37d6d07dda28a5dffcad6ff195ab2c83aaebcc9e">http://git.postgresql.org/pg/commitdiff/37d6d07dda28a5dffcad6ff195ab2c83aaebcc9e</a></li>

<li>Improve reporting of run-time-detected indeterminate-collation errors. pg_newlocale_from_collation does not have enough context to give an error message that's even a little bit useful, so move the responsibility for complaining up to its callers. Also, reword ERRCODE_INDETERMINATE_COLLATION error messages in a less jargony, more message-style-guide-compliant fashion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e197cb2e537880f36828a6c55d0f6df5bf7daa8">http://git.postgresql.org/pg/commitdiff/6e197cb2e537880f36828a6c55d0f6df5bf7daa8</a></li>

<li>Make initdb ignore locales for client-only encodings. While putting such entries into pg_collation is harmless (since backends will ignore entries that don't match the database encoding), it's also useless. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d1d679dbf780694673529bd864ca1e258ae50d5">http://git.postgresql.org/pg/commitdiff/5d1d679dbf780694673529bd864ca1e258ae50d5</a></li>

<li>Fix ancient typo in user-defined-aggregates documentation. The description of the initcond value for the built-in avg(float8) aggregate has been wrong since it was written. Noted by Disc Magnet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba7d020d9d6edba872173f8640ca240e00ae7070">http://git.postgresql.org/pg/commitdiff/ba7d020d9d6edba872173f8640ca240e00ae7070</a></li>

<li>Improve user-defined-aggregates documentation. On closer inspection, that two-element initcond value seems to have been a little white lie to avoid explaining the full behavior of float8_accum. But if people are going to expect the examples to be exactly correct, I suppose we'd better explain. Per comment from Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/472671e133da77f280e87cb47c6544c75572df6b">http://git.postgresql.org/pg/commitdiff/472671e133da77f280e87cb47c6544c75572df6b</a></li>

<li>Clean up handling of COLLATE clauses in index column definitions. Ensure that COLLATE at the top level of an index expression is treated the same as a grammatically separate COLLATE. Fix bogus reverse-parsing logic in pg_get_indexdef. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bba9ce945a702ab116fcedb9c0b970ecd69c9dd">http://git.postgresql.org/pg/commitdiff/3bba9ce945a702ab116fcedb9c0b970ecd69c9dd</a></li>

<li>Fix handling of collation in SQL-language functions. Ensure that parameter symbols receive collation from the function's resolved input collation, and fix inlining to behave properly. BTW, this commit lays about 90% of the infrastructure needed to support use of argument names in SQL functions. Parsing of parameters is now done via the parser-hook infrastructure ... we'd just need to supply a column-ref hook ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27dc7e240bfd230ee1315cc00577a6ed72aff94a">http://git.postgresql.org/pg/commitdiff/27dc7e240bfd230ee1315cc00577a6ed72aff94a</a></li>

<li>Fix collation handling in plpgsql functions. Make plpgsql treat the input collation as a polymorphism variable, so that we cache separate plans for each input collation that's used in a particular session, as per recent discussion. Propagate the input collation to all collatable input parameters. I chose to also propagate the input collation to all declared variables of collatable types, which is a bit more debatable but seems to be necessary for non-astonishing behavior. (Copying a parameter into a separate local variable shouldn't result in a change of behavior, for example.) There is enough infrastructure here to support declaring a collation for each local variable to override that default, but I thought we should wait to see what the field demand is before adding such a feature. In passing, remove exec_get_rec_fieldtype(), which wasn't used anywhere. Documentation patch to follow. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4425e3200f2c2578bdf94bb6234169115746c9f">http://git.postgresql.org/pg/commitdiff/a4425e3200f2c2578bdf94bb6234169115746c9f</a></li>

<li>Document collation handling in SQL and plpgsql functions. This is pretty minimal but covers the bare facts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b19c12e1d930a237817dd432100388990ec082a">http://git.postgresql.org/pg/commitdiff/9b19c12e1d930a237817dd432100388990ec082a</a></li>

<li>Fix failure to propagate collation in negate_clause(). Turns out it was this, and not so much plpgsql, that was at fault in Stefan Huehner's collation-error-in-a-trigger bug report of a couple weeks ago. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8e993503d0f1a0cb8f187a136fb64cead9ba591">http://git.postgresql.org/pg/commitdiff/c8e993503d0f1a0cb8f187a136fb64cead9ba591</a></li>

<li>Pass collation to makeConst() instead of looking it up internally. In nearly all cases, the caller already knows the correct collation, and in a number of places, the value the caller has handy is more correct than the default for the type would be. (In particular, this patch makes it significantly less likely that eval_const_expressions will result in changing the exposed collation of an expression.) So an internal lookup is both expensive and wrong. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfa4440ca5d948c4d4f0ab5bb82d433200c35288">http://git.postgresql.org/pg/commitdiff/bfa4440ca5d948c4d4f0ab5bb82d433200c35288</a></li>

<li>Clean up a few failures to set collation fields in expression nodes. I'm not sure these have any non-cosmetic implications, but I'm not sure they don't, either. In particular, ensure the CaseTestExpr generated by transformAssignmentIndirection to represent the base target column carries the correct collation, because parse_collate.c won't fix that. Tweak lsyscache.c API so that we can get the appropriate collation without an extra syscache lookup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b23c9fa9293c54a3829093d207be37a7b42cb630">http://git.postgresql.org/pg/commitdiff/b23c9fa9293c54a3829093d207be37a7b42cb630</a></li>

<li>More collations cleanup, from trawling for missed collation assignments. Mostly cosmetic, though I did find that generateClonedIndexStmt failed to clone the index's collations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c9d9e8dd655fff7bcfc401e82838b8c20c16939">http://git.postgresql.org/pg/commitdiff/0c9d9e8dd655fff7bcfc401e82838b8c20c16939</a></li>

<li>Clean up cruft around collation initialization for tupdescs and scankeys. I found actual bugs in GiST and plpgsql; the rest of this is cosmetic but meant to decrease the odds of future bugs of omission. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7208fae18f1fdb242b4fcced77a3b836e15ac3ec">http://git.postgresql.org/pg/commitdiff/7208fae18f1fdb242b4fcced77a3b836e15ac3ec</a></li>

<li>Fix plpgsql to release SPI plans when a function or DO block is freed. This fixes the gripe I made a few months ago about DO blocks getting slower with repeated use. At least, it fixes it for the case where the DO block isn't aborted by an error. We could try running plpgsql_free_function_memory() even during error exit, but that seems a bit scary since it makes a lot of presumptions about the data structures being in good shape. It's probably reasonable to assume that repeated failures of DO blocks isn't a performance-critical case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87f2ad1326bff5cd37dde6fbf024137a2243efea">http://git.postgresql.org/pg/commitdiff/87f2ad1326bff5cd37dde6fbf024137a2243efea</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update docs to say you need fsync to make sync rep work fast. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e8e7cc580665ddd43c8ca2acc6d60f345570a57">http://git.postgresql.org/pg/commitdiff/6e8e7cc580665ddd43c8ca2acc6d60f345570a57</a></li>

<li>Make FKs valid at creation when added as column constraints. Bug report from Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec497a5ad6a0849efa3fb2fd05988bd8e0c0865d">http://git.postgresql.org/pg/commitdiff/ec497a5ad6a0849efa3fb2fd05988bd8e0c0865d</a></li>

<li>Prevent intermittent hang in recovery from bgwriter interaction. Startup process waited for cleanup lock but when hot_standby = off the pid was not registered, so that the bgwriter would not wake the waiting process as intended. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b98ac467f5d35970edade4ad65c767fc89059026">http://git.postgresql.org/pg/commitdiff/b98ac467f5d35970edade4ad65c767fc89059026</a></li>

<li>Minor changes to recovery pause behaviour. Change location LOG message so it works each time we pause, not just for final pause. Ensure that we pause only if we are in Hot Standby and can connect to allow us to run resume function. This change supercedes the code to override parameter recoveryPauseAtTarget to false if not attempting to enter Hot Standby, which is now removed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5f2f2a712e56fe1edf7d5665c07ee97be464c0b">http://git.postgresql.org/pg/commitdiff/b5f2f2a712e56fe1edf7d5665c07ee97be464c0b</a></li>

<li>Additional test for each commit in sync rep path to plug minute possibility of race condition that would effect performance only. Requested by Robert Haas. Re-arrange related comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92f4786fa9b730fd12cbfe973eb96addc6e98924">http://git.postgresql.org/pg/commitdiff/92f4786fa9b730fd12cbfe973eb96addc6e98924</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Cosmetic capitalization fix 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/856a23018c976794655d6f53b72fb692178fbb27">http://git.postgresql.org/pg/commitdiff/856a23018c976794655d6f53b72fb692178fbb27</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove synchronous_replication/max_wal_senders cross-check. This is no longer necessary, and might result in a situation where the configuration file is reloaded (and everything seems OK) but a subsequent restart of the database fails. Per an observation from Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19584ec659678841ea3036336f960acbdae962a0">http://git.postgresql.org/pg/commitdiff/19584ec659678841ea3036336f960acbdae962a0</a></li>

<li>Edits to 9.1 release notes. Add some new items and some additional details to existing items, mostly by cribbing from the 9.1alpha notes. Some additional clarifications and corrections elsewhere, and a few typo fixes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b630e7b8e4faec13af2ce934b8bb33d9a1c8e06">http://git.postgresql.org/pg/commitdiff/7b630e7b8e4faec13af2ce934b8bb33d9a1c8e06</a></li>

<li>Add post-creation hook for extensions, consistent with other object types. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a432e2783bb69fb68461ed2bcc460e2876fcc68d">http://git.postgresql.org/pg/commitdiff/a432e2783bb69fb68461ed2bcc460e2876fcc68d</a></li>

<li>Make walreceiver send a reply after receiving data but before flushing it. It originally worked this way, but was changed by commit a8a8a3e0965201df88bdfdff08f50e5c06c552b7, since which time it's been impossible for walreceiver to ever send a reply with write_location and flush_location set to different values. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30f6136f28a6bf9eedcbf41038d5b021169bc0b9">http://git.postgresql.org/pg/commitdiff/30f6136f28a6bf9eedcbf41038d5b021169bc0b9</a></li>

<li>Remove alpha release notes. Temporarily move some of the alpha release note disclaimers into the regular release notes, for the sake of alpha5. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6f0916dbdf9f2dc6bcdc550d8b3843739cdc304">http://git.postgresql.org/pg/commitdiff/f6f0916dbdf9f2dc6bcdc550d8b3843739cdc304</a></li>

<li>Update release notes for latest commits. In addition, correct the entry for pg_object_description, and some other minor cleanup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab1ef8e4448d276d65ecd02bebc03c03854c7200">http://git.postgresql.org/pg/commitdiff/ab1ef8e4448d276d65ecd02bebc03c03854c7200</a></li>

<li>Remove disclaimer stating that fsync=off slows down sync rep. The underlying problem that caused this phenomenon was fixed by commit 92f4786fa9b730fd12cbfe973eb96addc6e98924. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de592e2669380d5f95766d2bbe583558772fb6ce">http://git.postgresql.org/pg/commitdiff/de592e2669380d5f95766d2bbe583558772fb6ce</a></li>

<li>Correct "characters" to "bytes" in createdb docs. Susanne Ebrecht. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de32982242416ca0c78f8e8de4e4cd44af170bda">http://git.postgresql.org/pg/commitdiff/de32982242416ca0c78f8e8de4e4cd44af170bda</a></li>

<li>Typo fix in SSI docs. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20a1159fccd2c4580e5e1c9782cb98f95c40648a">http://git.postgresql.org/pg/commitdiff/20a1159fccd2c4580e5e1c9782cb98f95c40648a</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Documented some ecpg command line options that were missing: -r no_indicator, -r prepare, and -r questionsmarks 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71ac48fd9cebd3d2a873635a04df64096c981f73">http://git.postgresql.org/pg/commitdiff/71ac48fd9cebd3d2a873635a04df64096c981f73</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix broken markup, and remove tabs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01dd34d55ad53117c2d756da7f65b6fa07a303aa">http://git.postgresql.org/pg/commitdiff/01dd34d55ad53117c2d756da7f65b6fa07a303aa</a></li>

</ul>

<p>Gregory Stark a pouss&eacute;&nbsp;:</p>

<ul>

<li>fix up a couple non-prototypes of the form foo() to be foo(void) -- found using -Wstrict-prototypes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b66e2c086b1a24d8adad52842725db8c0499e02">http://git.postgresql.org/pg/commitdiff/7b66e2c086b1a24d8adad52842725db8c0499e02</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Gurjeet Singh's patch to add a missing semicolon to parser's gram.y. Similar patch already applied.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Piyush Newe sent in another revision of the patch intended to fix to_date()'s behavior to be more consistent with Oracle's.</li>

<li>Bernd Helmle sent in a patch to make psql's \dt use the pg_table_size() function, which includes things like TOAST tables.</li>

<li>Heikki Linnakangas sent in a patch to fix a bug in initdb on Windows in Chinese locales.</li>

<li>Fujii Masao sent in a patch to enable standby servers to connect during smart shutdown in order to wake up backends waiting for sync rep.</li>

<li>Heikki Linnakangas sent in another revision of the replication server timeout patch.</li>

<li>Gianni Ciolli sent in a doc patch to clarify the limits in size of the NUMERIC type.</li>

<li>Radoslaw Smogura sent in another revision of the patch to add a second level of buffer cache.</li>

<li>Robert Haas sent in another revision of the crash-safe visibility map patch.</li>

<li>Robert Haas sent in a patch to allow the safe removal of write location from sync rep.</li>

<li>Peter Eisentraut sent in a patch to add a feature to "make maintainer-check" to check for tabs in SGML.</li>

<li>Matthew Draper sent in a WIP patch to allow SQL language functions to reference parameters by parameter name.</li>

<li>Simon Riggs sent in a patch to add more sync rep settings.</li>

</ul>