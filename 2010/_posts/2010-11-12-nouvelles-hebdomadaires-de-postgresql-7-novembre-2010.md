---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 7 novembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-11-12-nouvelles-hebdomadaires-de-postgresql-7-novembre-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix corner-case bug in tracking of latest removed WAL segment during streaming replication. We used log/seg 0/0 to indicate that no WAL segments have been removed since startup, but 0/0 is a valid value for the very first WAL segment after initdb. To make that unambiguous, store (latest removed WAL segment + 1) in the global variable. Per report from Matt Chesler, also reproduced by Greg Smith. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=931b6db39b808608a3c80c42b47e3cbcda9e66db">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=931b6db39b808608a3c80c42b47e3cbcda9e66db</a></li>

<li>Bootstrap WAL to begin at segment logid=0 logseg=1 (000000010000000000000001) rather than 0/0, so that we can safely use 0/0 as an invalid value. This is a more future-proof fix for the corner-case bug in streaming replication that was fixed yesterday. We had a similar corner-case bug with log/seg 0/0 back in February as well. Avoiding 0/0 as a valid value should prevent bugs like that in the future. Per Tom Lane's idea. Back-patch to 9.0. Since this only affects bootstrapping, it makes no difference to existing installations. We don't need to worry about the bug in existing installations, because if you've managed to get past the initial base backup already, you won't hit the bug in the future either. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c843fff2d8db7889b81782ab4f3324cbda4ed2a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c843fff2d8db7889b81782ab4f3324cbda4ed2a</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid using a local FunctionCallInfoData struct in ExecMakeFunctionResult and related routines. We already had a redundant FunctionCallInfoData struct in FuncExprState, but were using that copy only in set-returning-function cases, to avoid keeping function evaluation state in the expression tree for the benefit of plpgsql's "simple expression" logic. But of course that didn't work anyway. Given the recent fixes in plpgsql there is no need to have two separate behaviors here. Getting rid of the local FunctionCallInfoData structs should make things a little faster (because we don't need to do InitFunctionCallInfoData each time), and it also makes for a noticeable reduction in stack space consumption during recursive calls. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0811ff2063be973953eda89e76dac0d299f0fb6b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0811ff2063be973953eda89e76dac0d299f0fb6b</a></li>

<li>Ensure an index that uses a whole-row Var still depends on its table. We failed to record any dependency on the underlying table for an index declared like "create index i on t (foo(t.*))". This would create trouble if the table were dropped without previously dropping the index. To fix, simplify some overly-cute code in index_create(), accepting the possibility that sometimes the whole-table dependency will be redundant. Also document this hazard in dependency.c. Per report from Kevin Grittner. In passing, prevent a core dump in pg_get_indexdef() if the index's table can't be found. I came across this while experimenting with Kevin's example. Not sure it's a real issue when the catalogs aren't corrupt, but might as well be cautious. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9f376e146b2f1fe1bc4d07380f2a047d5c375581">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9f376e146b2f1fe1bc4d07380f2a047d5c375581</a></li>

<li>Fix buffer overrun in pg_upgrade. Problem reported, and cause identified, by Hernan Gonzalez. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=71baff1786e0c50b514745c64c4b0947b64bf9d0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=71baff1786e0c50b514745c64c4b0947b64bf9d0</a></li>

<li>Fix adjust_semi_join to be more cautious about clauseless joins. It was reporting that these were fully indexed (hence cheap), when of course they're the exact opposite of that. I'm not certain if the case would arise in practice, since a clauseless semijoin is hard to produce in SQL, but if it did happen we'd make some dumb decisions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=61d6dd0c03eb4da654f435097cd0bf1da11c3272">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=61d6dd0c03eb4da654f435097cd0bf1da11c3272</a></li>

<li>Use only one hash entry for all instances of a pltcl trigger function. Like plperl and unlike plpgsql, there isn't any cached state that could depend on exactly which relation the trigger is being fired for. So we can use just one hash entry for all relations, which might save a little something. Alex Hunsaker. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=70a0160b07b66dc7fa1555c489330ea8fb58f8fe">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=70a0160b07b66dc7fa1555c489330ea8fb58f8fe</a></li>

<li>Reduce recursion depth in recently-added regression test. Some buildfarm members fail the test with the original depth of 10 levels, apparently because they are running at the minimum max_stack_depth setting of 100kB and using ~ 10k per recursion level. While it might be interesting to try to figure out why they're eating so much stack, it isn't likely that any fix for that would be back-patchable. So just change the test to recurse only 5 levels. The extra levels don't prove anything correctness-wise anyway. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0abc8fdd4df3dd0524cd9fd8e2d761cf932dd80f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0abc8fdd4df3dd0524cd9fd8e2d761cf932dd80f</a></li>

<li>Reimplement planner's handling of MIN/MAX aggregate optimization. Per my recent proposal, get rid of all the direct inspection of indexes and manual generation of paths in planagg.c. Instead, set up EquivalenceClasses for the aggregate argument expressions, and let the regular path generation logic deal with creating paths that can satisfy those sort orders. This makes planagg.c a bit more visible to the rest of the planner than it was originally, but the approach is basically a lot cleaner than before. A major advantage of doing it this way is that we get MIN/MAX optimization on inheritance trees (using MergeAppend of indexscans) practically for free, whereas in the old way we'd have had to add a whole lot more duplicative logic. One small disadvantage of this approach is that MIN/MAX aggregates can no longer exploit partial indexes having an "x IS NOT NULL" predicate, unless that restriction or something that implies it is specified in the query. The previous implementation was able to use the added "x IS NOT NULL" condition as an extra predicate proof condition, but in this version we rely entirely on indexes that are considered usable by the main planning process. That seems a fair tradeoff for the simplicity and functionality gained. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=034967bdcbb0c7be61d0500955226e1234ec5f04">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=034967bdcbb0c7be61d0500955226e1234ec5f04</a></li>

<li>Use appendStringInfoString() where appropriate in elog.c. The nominally equivalent call appendStringInfo(buf, "%s", str) can be significantly slower when str is large. In particular, the former usage in EVALUATE_MESSAGE led to O(N^2) behavior when collecting a large number of context lines, as I found out while testing recursive functions. The other changes are just neatnik-ism and seem unlikely to save anything meaningful, but a cycle shaved is a cycle earned. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=09211659d9d8fd62f9de09703c90ed4f072c4a47">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=09211659d9d8fd62f9de09703c90ed4f072c4a47</a></li>

<li>Allow moddatetime's target column to be of type timestamptz. Dirk Heinrichs. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5e8b7b0b73b6d0aba4a5a05704601dd031ad0a49">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5e8b7b0b73b6d0aba4a5a05704601dd031ad0a49</a></li>

<li>Include the current value of max_stack_depth in stack depth complaints. I'm mainly interested in finding out what it is on buildfarm machines, but including the active value in the message seems like good practice in any case. Add the info to the HINT, not the ERROR string, so as not to change the regression tests' expected output. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6736916f5f5a5f340aa20d4b27540764b5646585">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6736916f5f5a5f340aa20d4b27540764b5646585</a></li>

<li>Make get_stack_depth_rlimit() handle RLIM_INFINITY more sanely. Rather than considering this result as meaning "unknown", report LONG_MAX. This won't change what superusers can set max_stack_depth to, but it will cause InitializeGUCOptions() to set the built-in default to 2MB not 100kB. The latter seems like a fairly unreasonable interpretation of "infinity". Per my investigation of odd buildfarm results as well as an old complaint from Heikki. Since this should persuade all the buildfarm animals to use a reasonable stack depth setting during "make check", revert previous patch that dumbed down a recursive regression test to only 5 levels. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dd1c781903811416db4e03383a4cb0bfc8cfac40">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dd1c781903811416db4e03383a4cb0bfc8cfac40</a></li>

<li>Add support for detecting register-stack overrun on IA64. Per recent investigation, the register stack can grow faster than the regular stack depending on compiler and choice of options. To avoid crashes we must check both stacks in check_stack_depth(). Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7a2ce4905da7d812407b6354f038aac17e97024">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7a2ce4905da7d812407b6354f038aac17e97024</a></li>

<li>Implement an "S" option for psql's \dn command. \dn without "S" now hides all pg_XXX schemas as well as information_schema. Thus, in a bare database you'll only see "public". ("public" is considered a user schema, not a system schema, mainly because it's droppable.) Per discussion back in late September. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e43fb604d6db229d70d3101aa53348cc16a5473a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e43fb604d6db229d70d3101aa53348cc16a5473a</a></li>

<li>Prevent invoking I/O conversion casts via functional/attribute notation. PG 8.4 added a built-in feature for casting pretty much any data type to string types (text, varchar, etc). We allowed this to work in any of the historically-allowed syntaxes: CAST(x AS text), x::text, text(x), or x.text. However, multiple complaints have shown that it's too easy to invoke such casts unintentionally in the latter two styles, particularly field selection. To cure the problem with the narrowest possible change of behavior, disallow use of I/O conversion casts from composite types to string types via functional/attribute syntax. The new functionality is still available via cast syntax. In passing, document the equivalence of functional and attribute syntax in a more visible place. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=543d22fc7423747afd59fe7214f2ddf6259efc62">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=543d22fc7423747afd59fe7214f2ddf6259efc62</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Some cleanup in ecpg code: Use bool as type for booleans instead of int. Do not implicitely cast size_t to int. Make the compiler stop complaining about unused variables by adding an empty statement. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35d5d962e1777560baf6f5edec906a907a853c9a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35d5d962e1777560baf6f5edec906a907a853c9a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Print a make warning when using GNU make older than 3.80. A proposed patch will require GNU make 3.80 or newer. We will let this patch run for a while to see how much damage that would do to the buildfarm. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dd21f0b047078ae724c0de4bc87b175154a83707">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dd21f0b047078ae724c0de4bc87b175154a83707</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Andres Freund sent in two more patches to make COPY more efficient by creating and using custom integer-to-string conversion routines.</li>

<li>Alex Hunsaker sent in two patches to fix the way PL/Tcl handles trigger functions analogous to the fix for PL/Perl.</li>

<li>Hitoshi Harada sent in a patch to change sort states to plan states in some parts of the explain and the executor.</li>

<li>Dimitri Fontaine and Alvaro Herrera traded several revisions of the patch to add ALTER OBJECT ... SET SCHEMA for the objects where this is not already doable.</li>

<li>Dimitri Fontaine sent a patch to add execute_from_file().</li>

<li>Peter Eisentraut sent in a patch intended to improve support for parallel make.</li>

<li>Dimitri Fontaine sent in a patch to add pg_dump support for EXTENSIONs.</li>

<li>Alex Hunsaker sent in a patch to fix the way PL/Python handles trigger functions similar to how he fixed PL/Perl and PL/Tcl.</li>

<li>ITAGAKI Takahiro sent in a patch to change boolean==true to boolean in the source code.</li>

<li>Alexander Korotkov and Yeb Havinga traded patches to fix the picksplit function in the seg contrib module.</li>

<li>KaiGai Kohei sent in a contrib module to allow delaying auth.</li>

<li>Fujii Masao sent in a patch to allow tracking the most recently replayed transaction.</li>

<li>Marti Raudsepp sent in a patch to revert wal_sync_method to fdatasync on Linux 2.6.33 or higher because the setting changed as of that kernel.</li>

<li>Alvaro Herrera sent in a patch to better document the now-less-dusty CREATE CONSTRAINT TRIGGER syntax.</li>

<li>Hitoshi Harada sent in a patch to allow sharing the result data of a separate plan in a single execution. This is infrastructure for writeable CTEs.</li>

<li>Tom Lane sent in a patch to fix an issue with how UNION ALL was handled.</li>

<li>Gurjeet Singh sent in a patch to allow ALTER TABLE to point to a UNIQUE index which would then become a constraint, for example, a PRIMARY KEY constraint.</li>

</ul>