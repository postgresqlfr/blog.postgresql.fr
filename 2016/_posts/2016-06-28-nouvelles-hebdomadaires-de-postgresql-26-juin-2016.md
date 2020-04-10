---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 26 juin 2016"
author: "NBougain"
redirect_from: "index.php?post/2016-06-28-nouvelles-hebdomadaires-de-postgresql-26-juin-2016 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Docs: improve description of psql's %R prompt escape sequence. Dilian Palauzov pointed out in bug #14201 that the docs failed to mention the possibility of %R producing '(' due to an unmatched parenthesis. He proposed just adding that in the same style as the other options were listed; but it seemed to me that the sentence was already nearly unintelligible, so I rewrote it a bit more extensively. Report: &lt;20160619121113.5789.68274@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/705ad7f3b523acae0ddfdebd270b7048b2bb8029">http://git.postgresql.org/pg/commitdiff/705ad7f3b523acae0ddfdebd270b7048b2bb8029</a></li>

<li>Fix comparison of similarity to threshold in GIST trigram searches. There was some very strange code here, dating to commit b525bf77, that purported to work around an ancient gcc bug by forcing a float4 comparison to be done as int instead. Commit 5871b8848 broke that when it changed one side of the comparison to "double" but left the comparison code alone. Commit f576b17cd doubled down on the weirdness by introducing a "volatile" marker, which had nothing to do with the actual problem. Guess that the gcc bug, even if it's still present in the wild, was triggered by comparison of float4's and can be avoided if we store the result of cnt_sml() into a double before comparing to the double "nlimit". This will at least work correctly on non-broken compilers, and it's way more readable. Per bug #14202 from Greg Navis. Add a regression test based on his example. Report: &lt;20160620115321.5792.10766@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c852566a3cf4ede40e22e4ca216d12cd4a27117">http://git.postgresql.org/pg/commitdiff/9c852566a3cf4ede40e22e4ca216d12cd4a27117</a></li>

<li>pg_trgm's set_limit() function is parallel unsafe, not parallel restricted. Per buildfarm. Fortunately, it's not quite too late to squeeze this fix into the pg_trgm 1.3 update. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e611515dd6b8edad56baa0f3ae31ff637ca54d52">http://git.postgresql.org/pg/commitdiff/e611515dd6b8edad56baa0f3ae31ff637ca54d52</a></li>

<li>Add missing check for malloc failure in plpgsql_extra_checks_check_hook(). Per report from Andreas Seltenreich. Back-patch to affected versions. Report: &lt;874m8nn0hv.fsf@elite.ansel.ydns.eu&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1fe1204e87c467221277d1789f1a530a27e15bd2">http://git.postgresql.org/pg/commitdiff/1fe1204e87c467221277d1789f1a530a27e15bd2</a></li>

<li>Stamp 9.6beta2. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/936b62ddf247c26e8cc4fca34bd8a4c2e65c09fd">http://git.postgresql.org/pg/commitdiff/936b62ddf247c26e8cc4fca34bd8a4c2e65c09fd</a></li>

<li>Refactor planning of projection steps that don't need a Result plan node. The original upper-planner-pathification design (commit 3fc6e2d7f5b652b4) assumed that we could always determine during Path formation whether or not we would need a Result plan node to perform projection of a targetlist. That turns out not to work very well, though, because createplan.c still has some responsibilities for choosing the specific target list associated with sorting/grouping nodes (in particular it might choose to add resjunk columns for sorting). We might not ever refactor that --- doing so would push more work into Path formation, which isn't attractive --- and we certainly won't do so for 9.6. So, while create_projection_path and apply_projection_to_path can tell for sure what will happen if the subpath is projection-capable, they can't tell for sure when it isn't. This is at least a latent bug in apply_projection_to_path, which might think it can apply a target to a non-projecting node when the node will end up computing something different. Also, I'd tied the creation of a ProjectionPath node to whether or not a Result is needed, but it turns out that we sometimes need a ProjectionPath node anyway to avoid modifying a possibly-shared subpath node. Callers had to use create_projection_path for such cases, and we added code to them that knew about the potential omission of a Result node and attempted to adjust the cost estimates for that. That was uncertainly correct and definitely ugly/unmaintainable. To fix, have create_projection_path explicitly check whether a Result is needed and adjust its cost estimate accordingly, though it creates a ProjectionPath in either case. apply_projection_to_path is now mostly just an optimized version that can avoid creating an extra Path node when the input is known to not be shared with any other live path. (There is one case that create_projection_path doesn't handle, which is pushing parallel-safe expressions below a Gather node. We could make it do that by duplicating the GatherPath, but there seems no need as yet.) create_projection_plan still has to recheck the tlist-match condition, which means that if the matching situation does get changed by createplan.c then we'll have made a slightly incorrect cost estimate. But there seems no help for that in the near term, and I doubt it occurs often enough, let alone would change planning decisions often enough, to be worth stressing about. I added a "dummypp" field to ProjectionPath to track whether create_projection_path thinks a Result is needed. This is not really necessary as-committed because create_projection_plan doesn't look at the flag; but it seems like a good idea to remember what we thought when forming the cost estimate, if only for debugging purposes. In passing, get rid of the target_parallel parameter added to apply_projection_to_path by commit 54f5c5150. I don't think that's a good idea because it involves callers in what should be an internal decision, and opens us up to missing optimization opportunities if callers think they don't need to provide a valid flag, as most don't. For the moment, this just costs us an extra has_parallel_hazard call when planning a Gather. If that starts to look expensive, I think a better solution would be to teach PathTarget to carry/cache knowledge of parallel-safety of its contents. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b9d323cb9810109e3e5aab1ead427cbbb7aa77e">http://git.postgresql.org/pg/commitdiff/8b9d323cb9810109e3e5aab1ead427cbbb7aa77e</a></li>

<li>Document that dependency tracking doesn't consider function bodies. If there's anyplace in our SGML docs that explains this behavior, I can't find it right at the moment. Add an explanation in "Dependency Tracking" which seems like the authoritative place for such a discussion. Per gripe from Michelle Schwan. While at it, update this section's example of a dependency-related error message: they last looked like that in 8.3. And remove the explanation of dependency updates from pre-7.3 installations, which is probably no longer worth anybody's brain cells to read. The bogus error message example seems like an actual documentation bug, so back-patch to all supported branches. Discussion: &lt;20160620160047.5792.49827@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/342921078a76a34fd2f44f121f225126778eb2cb">http://git.postgresql.org/pg/commitdiff/342921078a76a34fd2f44f121f225126778eb2cb</a></li>

<li>Make "postgres -C guc" print "" not "(null)" for null-valued GUCs. Commit 0b0baf262 et al made this case print "(null)" on the grounds that that's what happened on platforms that didn't crash. But neither behavior was actually intentional. What we should print is just an empty string, for compatibility with the behavior of SHOW and other ways of examining string GUCs. Those code paths don't distinguish NULL from empty strings, so we should not here either. Per gripe from Alain Radix. Like the previous patch, back-patch to 9.2 where -C option was introduced. Discussion: &lt;CA+YdpwxPUADrmxSD7+Td=uOshMB1KkDN7G7cf+FGmNjjxMhjbw@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e45e990e4b547f05bdb46e4596d24abbaef60043">http://git.postgresql.org/pg/commitdiff/e45e990e4b547f05bdb46e4596d24abbaef60043</a></li>

<li>Fix type-safety problem with parallel aggregate serial/deserialization. The original specification for this called for the deserialization function to have signature "deserialize(serialtype) returns transtype", which is a security violation if transtype is INTERNAL (which it always would be in practice) and serialtype is not (which ditto). The patch blithely overrode the opr_sanity check for that, which was sloppy-enough work in itself, but the indisputable reason this cannot be allowed to stand is that CREATE FUNCTION will reject such a signature and thus it'd be impossible for extensions to create parallelizable aggregates. The minimum fix to make the signature type-safe is to add a second, dummy argument of type INTERNAL. But to lock it down a bit more and make misuse of INTERNAL-accepting functions less likely, let's get rid of the ability to specify a "serialtype" for an aggregate and just say that the only useful serialtype is BYTEA --- which, in practice, is the only interesting value anyway, due to the usefulness of the send/recv infrastructure for this purpose. That means we only have to allow "serialize(internal) returns bytea" and "deserialize(bytea, internal) returns internal" as the signatures for these support functions. In passing fix bogus signature of int4_avg_combine, which I found thanks to adding an opr_sanity check on combinefunc signatures. catversion bump due to removing pg_aggregate.aggserialtype and adjusting signatures of assorted built-in functions. David Rowley and Tom Lane Discussion: &lt;27247.1466185504@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8ace5477ef9731ef605f58d313c4cd1548f12d2">http://git.postgresql.org/pg/commitdiff/f8ace5477ef9731ef605f58d313c4cd1548f12d2</a></li>

<li>Update oidjoins regression test for 9.6. Looks like we had some more catalog drift recently. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63ae052367c350935c3cec3e3c53a1e34a317e96">http://git.postgresql.org/pg/commitdiff/63ae052367c350935c3cec3e3c53a1e34a317e96</a></li>

<li>Improve user-facing documentation for partial/parallel aggregation. Add a section to xaggr.sgml, as we have done in the past for other extensions to the aggregation functionality. Assorted wordsmithing and other minor improvements. David Rowley and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d673424faf3e33c5fcca926fbe3f21e16dd0fef">http://git.postgresql.org/pg/commitdiff/2d673424faf3e33c5fcca926fbe3f21e16dd0fef</a></li>

<li>Fix small memory leak in partial-aggregate deserialization functions. A deserialize function's result is short-lived data during partial aggregation, since we're just going to pass it to the combine function and then it's of no use anymore. However, the built-in deserialize functions allocated their results in the aggregate state context, resulting in a query-lifespan memory leak. It's probably not possible for this to amount to anything much at present, since the number of leaked results would only be the number of worker processes. But it might become a problem in future. To fix, don't use the same convenience subroutine for setting up results that the aggregate transition functions use. David Rowley Report: &lt;10050.1466637736@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd1693e89e7e6c458d0563f6cc67a7c99a45251a">http://git.postgresql.org/pg/commitdiff/bd1693e89e7e6c458d0563f6cc67a7c99a45251a</a></li>

<li>Fix building of large (bigger than shared_buffers) hash indexes. When the index is predicted to need more than NBuffers buckets, CREATE INDEX attempts to sort the index entries by hash key before insertion, so as to reduce thrashing. This code path got broken by commit 9f03ca915196dfc8, which overlooked that _hash_form_tuple() is not just an alias for index_form_tuple(). The index got built anyway, but with garbage data, so that searches for pre-existing tuples always failed. Fix by refactoring to separate construction of the indexable data from calling index_form_tuple(). Per bug #14210 from Daniel Newman. Back-patch to 9.5 where the bug was introduced. Report: &lt;20160623162507.17237.39471@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cf739de850f596777be14aeb430359cf59cf47c">http://git.postgresql.org/pg/commitdiff/8cf739de850f596777be14aeb430359cf59cf47c</a></li>

<li>Simplify planner's final setup of Aggrefs for partial aggregation. Commit e06a38965's original coding for constructing the execution-time expression tree for a combining aggregate was rather messy, involving duplicating quite a lot of code in setrefs.c so that it could inject a nonstandard matching rule for Aggrefs. Get rid of that in favor of explicitly constructing a combining Aggref with a partial Aggref as input, then allowing setref's normal matching logic to match the partial Aggref to the output of the lower plan node and hence replace it with a Var. In passing, rename and redocument make_partialgroup_input_target to have some connection to what it actually does. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59a3795c2589a0e6dfe4d9a886de9423b3f8b057">http://git.postgresql.org/pg/commitdiff/59a3795c2589a0e6dfe4d9a886de9423b3f8b057</a></li>

<li>Rethink node-level representation of partial-aggregation modes. The original coding had three separate booleans representing partial aggregation behavior, which was confusing, unreadable, and error-prone, not least because the booleans weren't always listed in the same order. It was also inadequate for the allegedly-desirable future extension to support intermediate partial aggregation, because we'd need separate markers for serialization and deserialization in such a case. Merge these bools into an enum "AggSplit" to provide symbolic names for the supported operating modes (and document what those are). By assigning the values of the enum constants carefully, we can treat AggSplit values as options bitmasks so that tests of what to do aren't noticeably more expensive than before. While at it, get rid of Aggref.aggoutputtype. That's not needed since commit 59a3795c2 got rid of setrefs.c's special-purpose Aggref comparison code, and it likewise seemed more confusing than helpful. Assorted comment cleanup as well (there's still more that I want to do in that line). catversion bump for change in Aggref node contents. Should be the last one for partial-aggregation changes. Discussion: &lt;29309.1466699160@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19e972d5580c655423572e3c870e47b5b7c346f6">http://git.postgresql.org/pg/commitdiff/19e972d5580c655423572e3c870e47b5b7c346f6</a></li>

<li>Avoid making a separate pass over the query to check for partializability. It's rather silly to make a separate pass over the tlist + HAVING qual, and a separate set of visits to the syscache, when get_agg_clause_costs already has all the required information in hand. This nets out as less code as well as fewer cycles. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1993038a4f0ce5fbeb7b562b2acd571bf6b567b">http://git.postgresql.org/pg/commitdiff/f1993038a4f0ce5fbeb7b562b2acd571bf6b567b</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Add missing documentation of pg_roles.rolbypassrls. Noted by Lukas Fittl. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d48adc2b8c9724973334345e2ab8f3e6737ac34">http://git.postgresql.org/pg/commitdiff/4d48adc2b8c9724973334345e2ab8f3e6737ac34</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Translation updates Source-Git-URL: git://git.postgresql.org/git/pgtranslation/messages.git Source-Git-Hash: 0c374f8d25ed31833a10d24252bc928d41438838 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47981a4665dfc9c3808366dff9971daedba32e98">http://git.postgresql.org/pg/commitdiff/47981a4665dfc9c3808366dff9971daedba32e98</a></li>

<li>Improve cleanup in rolenames test Drop test_schema at the end, because that otherwise interferes with the collate.linux.utf8 test. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a9c51810f1db08de4033cbecd95a83d7b364fd1">http://git.postgresql.org/pg/commitdiff/6a9c51810f1db08de4033cbecd95a83d7b364fd1</a></li>

<li>psql: Improve \crosstabview error messages <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd406af16841384b100c783a5cb36923eec6df6d">http://git.postgresql.org/pg/commitdiff/bd406af16841384b100c783a5cb36923eec6df6d</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: clarify use of pg_rewind arguments. Specifically, --source-pgdata and --source-server. Discussion: 20160617155108.GC19359@momjian.us. Reviewed-by: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3557b1791b715c6e44e1b7b4b342d1fae54e262e">http://git.postgresql.org/pg/commitdiff/3557b1791b715c6e44e1b7b4b342d1fae54e262e</a></li>

<li>Update comment about allowing GUCs to change scanning. Reported-by: David G. Johnston Discussion: CAKFQuwZZvnxwSq9tNtvL+uyuDKGgV91zR_agtPxQHRWMWQRP8g@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e9df858f0de5f1a37c71f24373caf8c870f6993">http://git.postgresql.org/pg/commitdiff/3e9df858f0de5f1a37c71f24373caf8c870f6993</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Add tab completion for pager_min_lines to psql. This was inadvertantly omitted from commit 7655f4ccea570d57c4d473cd66b755c03c904942. Mea culpa. Backpatched to 9.5 where pager_min_lines was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/562e44972490196884452e632a0a6d0db81b2335">http://git.postgresql.org/pg/commitdiff/562e44972490196884452e632a0a6d0db81b2335</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>postgres_fdw: Remove useless return statement. Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/267569b24c1782b756cad46ffc8e9b28988e7385">http://git.postgresql.org/pg/commitdiff/267569b24c1782b756cad46ffc8e9b28988e7385</a></li>

<li>postgres_fdw: Fix incorrect NULL handling in join pushdown. something.* IS NOT NULL means that every attribute of the row is not NULL, not that the row itself is non-NULL (e.g. because it's coming from below an outer join. Use (somevar.*)::pg_catalog.text IS NOT NULL instead. Ashutosh Bapat, per a report by Rushabh Lathia. Reviewed by Amit Langote and Etsuro Fujita. Schema-qualification added by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e9c38e15947f4f3ed478f8b70e74b55e31fe950">http://git.postgresql.org/pg/commitdiff/9e9c38e15947f4f3ed478f8b70e74b55e31fe950</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Fix handling of multixacts predating pg_upgrade. After pg_upgrade, it is possible that some tuples' Xmax have multixacts corresponding to the old installation; such multixacts cannot have running members anymore. In many code sites we already know not to read them and clobber them silently, but at least when VACUUM tries to freeze a multixact or determine whether one needs freezing, there's an attempt to resolve it to its member transactions by calling GetMultiXactIdMembers, and if the multixact value is "in the future" with regards to the current valid multixact range, an error like this is raised: ERROR: MultiXactId 123 has not been created yet -- apparent wraparound and vacuuming fails. Per discussion with Andrew Gierth, it is completely bogus to try to resolve multixacts coming from before a pg_upgrade, regardless of where they stand with regards to the current valid multixact range. It's possible to get from under this problem by doing SELECT FOR UPDATE of the problem tuples, but if tables are large, this is slow and tedious, so a more thorough solution is desirable. To fix, we realize that multixacts in xmax created in 9.2 and previous have a specific bit pattern that is never used in 9.3 and later (we already knew this, per comments and infomask tests sprinkled in various places, but we weren't leveraging this knowledge appropriately). Whenever the infomask of the tuple matches that bit pattern, we just ignore the multixact completely as if Xmax wasn't set; or, in the case of tuple freezing, we act as if an unwanted value is set and clobber it without decoding. This guarantees that no errors will be raised, and that the values will be progressively removed until all tables are clean. Most callers of GetMultiXactIdMembers are patched to recognize directly that the value is a removable "empty" multixact and avoid calling GetMultiXactIdMembers altogether. To avoid changing the signature of GetMultiXactIdMembers() in back branches, we keep the "allow_old" boolean flag but rename it to "from_pgupgrade"; if the flag is true, we always return an empty set instead of looking up the multixact. (I suppose we could remove the argument in the master branch, but I chose not to do so in this commit). This was broken all along, but the error-facing message appeared first because of commit 8e9a16ab8f7f and was partially fixed in a25c2b7c4db3. This fix, backpatched all the way back to 9.3, goes approximately in the same direction as a25c2b7c4db3 but should cover all cases. Bug analysis by Andrew Gierth and &Aacute;lvaro Herrera. A number of public reports match this bug: <a target="_blank" href="https://www.postgresql.org/message-id/20140330040029.GY4582@tamriel.snowman.net">https://www.postgresql.org/message-id/20140330040029.GY4582@tamriel.snowman.net</a> <a target="_blank" href="https://www.postgresql.org/message-id/538F3D70.6080902@publicrelay.com">https://www.postgresql.org/message-id/538F3D70.6080902@publicrelay.com</a> <a target="_blank" href="https://www.postgresql.org/message-id/556439CF.7070109@pscs.co.uk">https://www.postgresql.org/message-id/556439CF.7070109@pscs.co.uk</a> <a target="_blank" href="https://www.postgresql.org/message-id/SG2PR06MB0760098A111C88E31BD4D96FB3540@SG2PR06MB0760.apcprd06.prod.outlook.com">https://www.postgresql.org/message-id/SG2PR06MB0760098A111C88E31BD4D96FB3540@SG2PR06MB0760.apcprd06.prod.outlook.com</a> <a target="_blank" href="https://www.postgresql.org/message-id/20160615203829.5798.4594@wrigleys.postgresql.org">https://www.postgresql.org/message-id/20160615203829.5798.4594@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3ad3ffa68193dd889a9cea9d840bf4613bd680b">http://git.postgresql.org/pg/commitdiff/e3ad3ffa68193dd889a9cea9d840bf4613bd680b</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Andreas Karlsson sent in another revision of a patch to tag extension functions with their parallel safety status.</p>

<p>Paul A Jungwirth sent in another revision of a patch to add GiST support for UUIDs.</p>

<p>Micha&euml;l Paquier sent in three revisions of a patch to add conninfo to the pg_stat_wal_receiver view.</p>

<p>Muhammad Asif Naeem sent in another revision of a patch to add an EMERGENCY option to VACUUM.</p>

<p>Etsuro Fujita sent in a patch to remove an unnecessary return from deparseFromExprForRel in contrib/postgres_fdw/deparse.c.</p>

<p>Teodor Sigaev sent in another revision of a patch to change the precedence of to |, &amp;, &lt;-&gt;, | , and simplifies a bit a code around printing and parsing of tsquery.</p>

<p>Amit Langote and Ashutosh Bapat traded patches to fix an issue where whole-row references got a wrong result in foreign join pushdowns.</p>

<p>Bruce Momjian sent in a patch to remove references to UT1 from the documentation.</p>

<p>Micha&euml;l Paquier sent in two revisions of a patch to fix the documentation for pg_visibility.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to fix an issue where pg_backup from a disconnected standby fails.</p>

<p>SAWADA Masahiko sent in a patch to fix a mismatch between a comment and function argument names in bugmgr.</p>

<p>Peter Geoghegan sent in a patch to remove some dead code in tuplesort.c</p>

<p>Micha&euml;l Paquier sent in a patch to ensure that in Win32 with debugging turned on, it always produces crashdumps.</p>

<p>David Rowley sent in a patch to refactor the representation of partial aggregate steps.</p>

<p>David Rowley sent in a patch to fix a bug in citext's upgrade script for parallel aggregates.</p>

<p>Julien Rouhaud sent in another revision of a patch to add a global_max_parallel_workers GUC.</p>

<p>Piotr Stefaniak sent in some improvements to pg_bsd_indent.</p>

<p>Piotr Stefaniak sent in a patch to make some cosmetic improvements around shm_mq and test_shm_mq.</p>