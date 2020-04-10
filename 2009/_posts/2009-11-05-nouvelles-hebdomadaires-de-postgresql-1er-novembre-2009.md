---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er novembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-11-05-nouvelles-hebdomadaires-de-postgresql-1er-novembre-2009 "
---



<p><strong>Correctifs appliqués</strong></p>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>Fix range check in date_recv that tried to limit accepted values to only those accepted by date_in(). I confused Julian day numbers and number of days since the postgres epoch 2000-01-01 in the original patch. I just noticed that it's still easy to get such out-of-range values into the database using to_date or +- operators, but this patch doesn't do anything about those functions. Per report from James Pye.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/test/regress/GNUmakefile, check errors in for loop.</li>

<li>Simplify a few makefile rules since install-sh can now install multiple files in one run.</li>

<li>In pgsql/GNUmakefile.in, remove some leftovers of split tarball support.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/create_table.sgml, fix documentation on the toast.fillfactor reloption: it doesn't exist. Per note from Zoltan Boszormenyi.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Make FOR UPDATE/SHARE in the primary query not propagate into WITH queries; for example in WITH w AS (SELECT * FROM foo) SELECT * FROM w, bar ... FOR UPDATE the FOR UPDATE will now affect bar but not foo. This is more useful and consistent than the original 8.4 behavior, which tried to propagate FOR UPDATE into the WITH query but always failed due to assorted implementation restrictions. Even though we are in process of removing those restrictions, it seems correct on philosophical grounds to not let the outer query's FOR UPDATE affect the WITH query. In passing, fix isLockedRel which frequently got things wrong in nested-subquery cases: "FOR UPDATE OF foo" applies to an alias foo in the current query level, not subqueries. This has been broken for a long time, but it doesn't seem worth back-patching further than 8.4 because the actual consequences are minimal. At worst the parser would sometimes get RowShareLock on a relation when it should be AccessShareLock or vice versa. That would only make a difference if someone were using ExclusiveLock concurrently, which no standard operation does, and anyway FOR UPDATE doesn't result in visible changes so it's not clear that the someone would notice any problem. Between that and the fact that FOR UPDATE barely works with subqueries at all in existing releases, I'm not excited about worrying about it.</li>

<li>In pgsql/src/backend/commands/trigger.c, fix AfterTriggerSaveEvent to use a test and elog, not just Assert, to check that it's called within an AfterTriggerBeginQuery/AfterTriggerEndQuery pair. The RI cascade triggers suppress that overhead on the assumption that they are always run non-deferred, so it's possible to violate the condition if someone mistakenly changes pg_trigger to mark such a trigger deferred. We don't really care about supporting that, but throwing an error instead of crashing seems desirable. Per report from Marcelo Costa.</li>

<li>When FOR UPDATE/SHARE is used with LIMIT, put the LockRows plan node underneath the Limit node, not atop it. This fixes the old problem that such a query might unexpectedly return fewer rows than the LIMIT says, due to LockRows discarding updated rows. There is a related problem that LockRows might destroy the sort ordering produced by earlier steps; but fixing that by pushing LockRows below Sort would create serious performance problems that are unjustified in many real-world applications, as well as potential deadlock problems from locking many more rows than expected. Instead, keep the present semantics of applying FOR UPDATE after ORDER BY within a single query level; but allow the user to specify the other way by writing FOR UPDATE in a sub-select. To make that work, track whether FOR UPDATE appeared explicitly in sub-selects or got pushed down from the parent, and don't flatten a sub-select that contained an explicit FOR UPDATE.</li>

<li>Fix AcquireRewriteLocks to be sure that it acquires the right lock strength when FOR UPDATE is propagated down into a sub-select expanded from a view. Similar bug to parser's isLockedRel issue that I fixed yesterday; likewise seems not quite worth the effort to back-patch.</li>

<li>In pgsql/src/bin/psql/describe.c, fix \df to re-allow regexp special characters in the function name pattern. This has always worked, up until somebody's thinko here:

<a target="_blank" href="http://archives.postgresql.org/pgsql-committers/2009-04/msg00233.php">http://archives.postgresql.org/pgsql-committers/2009-04/msg00233.php</a> Per bug #5143 from Piotr Wolinski.</li>

<li>In pgsql/src/backend/utils/adt/ruleutils.c, un-break EXPLAIN for Append plans. I messed this up a few days ago while adding the ModifyTable node type --- I had been thinking ModifyTable should replace Append as a special case in push_plan(), but actually both of them have to be special-cased.</li>

<li>In pgsql/src/backend/executor/nodeHash.c, make the overflow guards in ExecChooseHashTableSize be more protective. The original coding ensured nbuckets and nbatch didn't exceed INT_MAX, which while not insane on its own terms did nothing to protect subsequent code like "palloc(nbatch * sizeof(BufFile *))". Since enormous join size estimates might well be planner error rather than reality, it seems best to constrain the initial sizes to be not more than work_mem/sizeof(pointer), thus ensuring the allocated arrays don't exceed work_mem. We will allow nbatch to get bigger than that during subsequent ExecHashIncreaseNumBatches calls, but we should still guard against integer overflow in those palloc requests. Per bug #5145 from Bernt Marius Johnsen. Although the given test case only seems to fail back to 8.2, previous releases have variants of this issue, so patch all supported branches.</li>

<li>Implement parser hooks for processing ColumnRef and ParamRef nodes, as per my recent proposal. As proof of concept, remove knowledge of Params from the core parser, arranging for them to be handled entirely by parser hook functions. It turns out we need an additional hook for that --- I had forgotten about the code that handles inferring a parameter's type from context. This is a preliminary step towards letting plpgsql handle its variables through parser hooks. Additional work remains to be done to expose the facility through SPI, but I think this is all the changes needed in the core parser.</li>

<li>In pgsql/src/pl/plperl/plperl.c, ensure the previous Perl interpreter selection is restored upon exit from plperl_call_handler, in both the normal and error-exit paths. Per report from Alexey Klyukin.</li>

<li>Fix two serious bugs introduced into hash indexes by the 8.4 patch that made hash indexes keep entries sorted by hash value. First, the original plans for concurrency assumed that insertions would happen only at the end of a page, which is no longer true; this could cause scans to transiently fail to find index entries in the presence of concurrent insertions. We can compensate by teaching scans to re-find their position after re-acquiring read locks. Second, neither the bucket split nor the bucket compaction logic had been fixed to preserve hashvalue ordering, so application of either of those processes could lead to permanent corruption of an index, in the sense that searches might fail to find entries that are present. This patch fixes the split and compaction logic to preserve hashvalue ordering, but it cannot do anything about pre-existing corruption. We will need to recommend reindexing all hash indexes in the 8.4.2 release notes. To buy back the performance loss hereby induced in split and compaction, fix them to use PageIndexMultiDelete instead of retail PageIndexDelete operations. We might later want to do something with qsort'ing the page contents rather than doing a binary search for each insertion, but that seemed more invasive than I cared to risk in a back-patch. Per bug #5157 from Jeff Janes and subsequent investigation.</li>

<li>Department of second thoughts: after studying index_getnext() a bit more I realize that it can scribble on scan-&gt;xs_ctup.t_self while following HOT chains, so we can't rely on that to stay valid between hashgettuple() calls. Introduce a private variable in HashScanOpaque, instead.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in another revision of the patch to allow pgbench to issue shell commands.</li>

<li>ITAGAKI Takahiro sent in another patch to add VACUUM ( FULL [ INPLACE | REPLACE ] ).</li>

<li>Jeff Davis sent in two more revisions of the operator exclusion constraints patch.</li>

<li>Peter Eisentraut sent in a patch to make \d+ work better for views in psql.</li>

<li>Shrish Purohit sent in a patch intended to automate partitioning.</li>

<li>Peter Eisentraut sent in a patch to fix an issue where PL/PythonU can segfault.</li>

<li>Peter Eisentraut sent in a patch to fix an issue with PL/PythonU's elog output.</li>

<li>Roger Leigh sent in another patch to make an "ascii clean" format for psql output.</li>

<li>Hitoshi Harada sent in a patch which implements PL/Javascript using Google's V8 Javascript engine.</li>

<li>ITAGAKI Takahiro sent in a WIP patch to implement table partitioning in SQL.</li>

<li>Andreas Freund sent in a patch which makes certain tsearch operations more efficient.</li>

</ul>