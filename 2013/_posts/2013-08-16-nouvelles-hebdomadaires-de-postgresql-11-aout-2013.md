---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 août 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-08-16-nouvelles-hebdomadaires-de-postgresql-11-aout-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Various cleanups for REFRESH MATERIALIZED VIEW CONCURRENTLY. Open and lock each index before checking definition in RMVC. The ExclusiveLock on the related table is not viewed as sufficient to ensure that no changes are made to the index definition, and invalidation messages from other backends might have been missed. Additionally, use RelationGetIndexExpressions() and check for NIL rather than doing our own loop. Protect against redefinition of tid and rowvar operators in RMVC. While working on this, noticed that the fixes for bugs found during the CF made the UPDATE statement useless, since no rows could qualify for that treatment any more. Ripping out code to support the UPDATE statement simplified the operator cleanups. Change slightly confusing local field name. Use meaningful alias names on queries in refresh_by_match_merge(). Per concerns of raised by Andres Freund and comments and suggestions from Noah Misch. Some additional issues remain, which will be addressed separately. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/841c29c8b3be98ee30486ee245ebee782d4dedd4">http://git.postgresql.org/pg/commitdiff/841c29c8b3be98ee30486ee245ebee782d4dedd4</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Simplify query_planner's API by having it return the top-level RelOptInfo. Formerly, query_planner returned one or possibly two Paths for the topmost join relation, so that grouping_planner didn't see the join RelOptInfo (at least not directly; it didn't have any hesitation about examining cheapest_path-&gt;parent, though). However, correct selection of the Paths involved a significant amount of coupling between query_planner and grouping_planner, a problem which has gotten worse over time. It seems best to give up on this API choice and instead return the topmost RelOptInfo explicitly. Then grouping_planner can pull out the Paths it wants from the rel's path list. In this way we can remove all knowledge of grouping behaviors from query_planner. The only real benefit of the old way is that in the case of an empty FROM clause, we never made any RelOptInfos at all, just a Path. Now we have to gin up a dummy RelOptInfo to represent the empty FROM clause. That's not a very big deal though. While at it, simplify query_planner's API a bit more by having the caller set up root-&gt;tuple_fraction and root-&gt;limit_tuples, rather than passing those values as separate parameters. Since query_planner no longer does anything with either value, requiring it to fill the PlannerInfo fields seemed pretty arbitrary. This patch just rearranges code; it doesn't (intentionally) change any behaviors. Followup patches will do more interesting things. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ced8837db2cd602422bb36102cec73289691d40">http://git.postgresql.org/pg/commitdiff/3ced8837db2cd602422bb36102cec73289691d40</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pgtest: allow passing parameters, e.g. -s/--silent. Previously only -n was recognized. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f347f26807862522309a2b15e332518df3e5e6f0">http://git.postgresql.org/pg/commitdiff/f347f26807862522309a2b15e332518df3e5e6f0</a></li>

<li>Docs: Document to_*() Julian values are integers. Backpatch to 9.3. Per request from Marc Dahn 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72039b1d8d476184b47d8023d059dda2ff307a93">http://git.postgresql.org/pg/commitdiff/72039b1d8d476184b47d8023d059dda2ff307a93</a></li>

<li>docs: mention Julian is midnight _UTC_. (Yes, there was no UTC back then, but we compute it that way.) Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f738156f516518b89d7ed20e357fc03b25184420">http://git.postgresql.org/pg/commitdiff/f738156f516518b89d7ed20e357fc03b25184420</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix assertion failure by an immediate shutdown. In PM_WAIT_DEAD_END state, checkpointer process must be dead already. But an immediate shutdown could make postmaster's state machine transition to PM_WAIT_DEAD_END state even if checkpointer process is still running, and which caused assertion failure. This bug was introduced in commit 457d6cf049c57cabe9b46ea13f26138040a214ec. This patch ensures that postmaster's state machine doesn't transition to PM_WAIT_DEAD_END state in an immediate shutdown while checkpointer process is running. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91c3613d3748d881706c3e60d8221ea92833ac1a">http://git.postgresql.org/pg/commitdiff/91c3613d3748d881706c3e60d8221ea92833ac1a</a></li>

<li>Document how auto_explain.log_timing can be changed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e65755c08110c4f4d7f08914d4511028e13517d">http://git.postgresql.org/pg/commitdiff/0e65755c08110c4f4d7f08914d4511028e13517d</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d775d8894665ef0bb254a85005f9351545fac13">http://git.postgresql.org/pg/commitdiff/9d775d8894665ef0bb254a85005f9351545fac13</a></li>

<li>Message punctuation and pluralization fixes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/072457b360ad550236d99a6ab1264e447248aba9">http://git.postgresql.org/pg/commitdiff/072457b360ad550236d99a6ab1264e447248aba9</a></li>

<li>PL/Python: Adjust the regression tests for Python 3.3. Similar to 2cfb1c6f77734db81b6e74bcae630f93b94f69be, the order in which dictionary elements are printed is not reliable. This reappeared in the tests of the string representation of result objects. Reduce the test case to one result set column so that there is no question of order. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/527ea66849c5cb02a3ebaef6c6c25d1b312a9521">http://git.postgresql.org/pg/commitdiff/527ea66849c5cb02a3ebaef6c6c25d1b312a9521</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in a patch to fix the documentation of FOR UPDATE/FOR SHARE in the cases of GROUP BY, DISTINCT, HAVING and window functions.</li>

<li>Michael Paquier sent in another revision of a patch to refactor the way background workers are implemented.</li>

<li>Amit Kapila sent in another revision of a patch to move unused buffers to the freelist.</li>

<li>Merlin Moncure sent in two more revisions of a patch to optimize StrategyGetBuffer.</li>

<li>Fujii Masao sent in a patch to remove the non-fast promotion path for replica to master.</li>

<li>Fabien COELHO sent in a patch to improve the pgbench measurements and progress report.</li>

<li>Tom Lane sent in a patch to fix an issue which manifested as a bug in row_to_json() where the planner incorrectly optimizes away ExecProject() if a scan plan node is not doing any useful projection.</li>

<li>Karl O. Pinc sent in a patch to document the fact that subqueries can't modify data.</li>

<li>Alvaro Herrera sent in a patch to factor duplicate code out of heap_deform_tuple and slot_deform_tuple, both because there's no point in duplicating it, and because there could potentially have been a third copy in the upcoming minmax patch.</li>

<li>Vik Fearing sent in a patch to enable collecting statistics when the CLUSTER command is run.</li>

<li>Tom Lane sent in a patch to emit a hint message when logging goes to or from stderr.</li>

<li>Vik Fearing sent in a patch to allow pg_sleep() to take an interval as a parameter.</li>

<li>Bruce Momjian sent in a patch to change the schema name control in pg_dump for ALTER OWNER via setting search_path rather than naming it explicitly in the object.</li>

<li>Andrew Tipton sent in a PoC patch to fix an issue with background workers.</li>

</ul>