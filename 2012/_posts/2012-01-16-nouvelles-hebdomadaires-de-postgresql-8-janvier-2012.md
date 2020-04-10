---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 janvier 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-01-16-nouvelles-hebdomadaires-de-postgresql-8-janvier-2012 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add comment about skipping binary files for copyright changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8ab8d0eaa96dbaebb646971f8988a3edc28e52c">http://git.postgresql.org/pg/commitdiff/a8ab8d0eaa96dbaebb646971f8988a3edc28e52c</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix coerce_to_target_type for coerce_type's klugy handling of COLLATE. Because coerce_type recurses into the argument of a CollateExpr, coerce_to_target_type's longstanding code for detecting whether coerce_type had actually done anything (to wit, returned a different node than it passed in) was broken in 9.1. This resulted in unexpected failures in hide_coercion_node; which was not the latter's fault, since it's critical that we never call it on anything that wasn't inserted by coerce_type. (Else we might decide to "hide" a user-written function call.) Fix by removing and replacing the CollateExpr in coerce_to_target_type itself. This is all pretty ugly but I don't immediately see a way to make it nicer. Per report from Jean-Yves F. Barbier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac7a5a3f25708c03242edc301ad008236fc36c7e">http://git.postgresql.org/pg/commitdiff/ac7a5a3f25708c03242edc301ad008236fc36c7e</a></li>

<li>Use a non-locking initial test in TAS_SPIN on PPC. Further testing convinces me that this is helpful at sufficiently high contention levels, though it's still worrisome that it loses slightly at lower contention levels. Per Manabu Ori. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc2a050d40976441cdb963ad829316c23e8df0aa">http://git.postgresql.org/pg/commitdiff/bc2a050d40976441cdb963ad829316c23e8df0aa</a></li>

<li>Make executor's SELECT INTO code save and restore original tuple receiver. As previously coded, the QueryDesc's dest pointer was left dangling (pointing at an already-freed receiver object) after ExecutorEnd. It's a bit astonishing that it took us this long to notice, and I'm not sure that the known problem case with SQL functions is the only one. Fix it by saving and restoring the original receiver pointer, which seems the most bulletproof way of ensuring any related bugs are also covered. Per bug #6379 from Paul Ramsey. Back-patch to 8.4 where the current handling of SELECT INTO was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dfd26f9c5f371437f243249025863ea9911aacaa">http://git.postgresql.org/pg/commitdiff/dfd26f9c5f371437f243249025863ea9911aacaa</a></li>

<li>Fix pg_restore's direct-to-database mode for INSERT-style table data. In commit 6545a901aaf84cb05212bb6a7674059908f527c3, I removed the mini SQL lexer that was in pg_backup_db.c, thinking that it had no real purpose beyond separating COPY data from SQL commands, which purpose had been obsoleted by long-ago fixes in pg_dump's archive file format. Unfortunately this was in error: that code was also used to identify command boundaries in INSERT-style table data, which is run together as a single string in the archive file for better compressibility. As a result, direct-to-database restores from archive files made with --inserts or --column-inserts fail in our latest releases, as reported by Dick Visser. To fix, restore the mini SQL lexer, but simplify it by adjusting the calling logic so that it's only required to cope with INSERT-style table data, not arbitrary SQL commands. This allows us to not have to deal with SQL comments, E'' strings, or dollar-quoted strings, none of which have ever been emitted by dumpTableData_insert. Also, fix the lexer to cope with standard-conforming strings, which was the actual bug that the previous patch was meant to solve. Back-patch to all supported branches. The previous patch went back to 8.2, which unfortunately means that the EOL release of 8.2 contains this bug, but I don't think we're doing another 8.2 release just because of that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3316a05b5ddee619ba0617716a4fef3ceb29ded">http://git.postgresql.org/pg/commitdiff/f3316a05b5ddee619ba0617716a4fef3ceb29ded</a></li>

<li>Fix typo, pg_types_date.h =&gt; pgtypes_date.h. Spotted by Koizumi Satoru. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a72efda72a85eef1513f2a02449e24dc4bdfc74">http://git.postgresql.org/pg/commitdiff/7a72efda72a85eef1513f2a02449e24dc4bdfc74</a></li>

<li>Use __sync_lock_test_and_set() for spinlocks on ARM, if available. Historically we've used the SWPB instruction for TAS() on ARM, but this is deprecated and not available on ARMv6 and later. Instead, make use of a GCC builtin if available. We'll still fall back to SWPB if not, so as not to break existing ports using older GCC versions. Eventually we might want to try using __sync_lock_test_and_set() on some other architectures too, but for now that seems to present only risk and not reward. Back-patch to all supported versions, since people might want to use any of them on more recent ARM chips. Martin Pitt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a41e865845bfa5d7aafcc5fe000dafa26573fef">http://git.postgresql.org/pg/commitdiff/0a41e865845bfa5d7aafcc5fe000dafa26573fef</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_regress: Replace exit_nicely() with exit() plus atexit() hook 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd09111f1f52e3739a24b88a4671f7a4b0ed4c1d">http://git.postgresql.org/pg/commitdiff/bd09111f1f52e3739a24b88a4671f7a4b0ed4c1d</a></li>

<li>Another fix for pg_regress: Replace exit_nicely() with exit() plus atexit() hook 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f132824c24c46d2efab49b4cddd1088781bf499e">http://git.postgresql.org/pg/commitdiff/f132824c24c46d2efab49b4cddd1088781bf499e</a></li>

<li>Improve ALTER DOMAIN / DROP CONSTRAINT with nonexistent constraint. ALTER DOMAIN / DROP CONSTRAINT on a nonexistent constraint name did not report any error. Now it reports an error. The IF EXISTS option was added to get the usual behavior of ignoring nonexistent objects to drop. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/104e7dac28c56dcaf9b778dff60a5daefc3a0661">http://git.postgresql.org/pg/commitdiff/104e7dac28c56dcaf9b778dff60a5daefc3a0661</a></li>

<li>pg_dump: Dump operators with the same name ordered by arity. pg_dump sorts operators by name, but operators with the same name come out in random order. Now operators with the same name are dumped in the order prefix, postfix, infix. (This is consistent with functions, which are dumped in increasing number of argument order.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15df037845d9d3d99e9e2b4370256b136b00c66a">http://git.postgresql.org/pg/commitdiff/15df037845d9d3d99e9e2b4370256b136b00c66a</a></li>

<li>pg_dump: Dump foreign options in prettier format. Dump them using line breaks and indentation instead of everything on one line. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e53515480853604aac825bd3e53e7f9716632b4">http://git.postgresql.org/pg/commitdiff/7e53515480853604aac825bd3e53e7f9716632b4</a></li>

<li>Rename the internal structures of the CREATE TABLE (LIKE ...) facility. The original implementation of this interpreted it as a kind of "inheritance" facility and named all the internal structures accordingly. This turned out to be very confusing, because it has nothing to do with the INHERITS feature. So rename all the internal parser infrastructure, update the comments, adjust the error messages, and split up the regression tests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db49517c62750322fb2a37ff6324ecc00965e641">http://git.postgresql.org/pg/commitdiff/db49517c62750322fb2a37ff6324ecc00965e641</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support for building with MS Visual Studio 2010. Brar Piening, reviewed by Craig Ringer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63876d3bac5a7471a7987da25a93c13a2534a644">http://git.postgresql.org/pg/commitdiff/63876d3bac5a7471a7987da25a93c13a2534a644</a></li>

<li>Suggest use of psql when pg_restore gets a text dump. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54a622cadf1fb6d2047bf99fbee73b6418d2a23f">http://git.postgresql.org/pg/commitdiff/54a622cadf1fb6d2047bf99fbee73b6418d2a23f</a></li>

<li>Work around perl bug in SvPVutf8(). Certain things like typeglobs or readonly things like $^V cause perl's SvPVutf8() to die nastily and crash the backend. To avoid that bug we make a copy of the object, which will subsequently be garbage collected. Back patched to 9.1 where we first started using SvPVutf8(). Per -hackers discussion. Original problem reported by David Wheeler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2abefd9a92f3c02ad4f6030ac1578bbf314db368">http://git.postgresql.org/pg/commitdiff/2abefd9a92f3c02ad4f6030ac1578bbf314db368</a></li>

<li>Fix breakage from earlier plperl fix. Apparently the perl garbage collector was a bit too eager, so here we control when the new SV is garbage collected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd0e74a9ce98c65c94565fb603dcc7b710cd4227">http://git.postgresql.org/pg/commitdiff/bd0e74a9ce98c65c94565fb603dcc7b710cd4227</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Made code in ecpg better readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10ecc0d5867b8dd39cf506b8bb02053ede05fb60">http://git.postgresql.org/pg/commitdiff/10ecc0d5867b8dd39cf506b8bb02053ede05fb60</a></li>

<li>Ecpglib stores variables that are used in DECLARE statements in a global list. This list is now freed when the last connection has been closed. Closes: #6366 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cf82ac53e9a3d5dd86f16106e3398063a526817">http://git.postgresql.org/pg/commitdiff/8cf82ac53e9a3d5dd86f16106e3398063a526817</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix variable confusion in BufferSync(). As noted by Heikki Linnakangas, the previous coding confused the "flags" variable with the "mask" variable. The affect of this appears to be that unlogged buffers would get written out at every checkpoint rather than only at shutdown time. Although that's arguably an acceptable failure mode, I'm back-patching this change, since it seems like a poor idea to rely on this happening to work. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e4911b2ae33acff7b85234b91372133ec6df9d4">http://git.postgresql.org/pg/commitdiff/7e4911b2ae33acff7b85234b91372133ec6df9d4</a></li>

<li>Make the number of CLOG buffers adaptive, based on shared_buffers. Previously, this was hardcoded: we always had 8. Performance testing shows that isn't enough, especially on big SMP systems, so we allow it to scale up as high as 32 when there's adequate memory. On the flip side, when shared_buffers is very small, drop the number of CLOG buffers down to as little as 4, so that we can start the postmaster even when very little shared memory is available. Per extensive discussion with Simon Riggs, Tom Lane, and others on pgsql-hackers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33aaa139e6302e81b4fbf2570be20188bb974c4f">http://git.postgresql.org/pg/commitdiff/33aaa139e6302e81b4fbf2570be20188bb974c4f</a></li>

<li>Improve behavior of concurrent ALTER TABLE, and do some refactoring. ALTER TABLE (and ALTER VIEW, ALTER SEQUENCE, etc.) now use a RangeVarGetRelid callback to check permissions before acquiring a table lock. We also now use the same callback for all forms of ALTER TABLE, rather than having separate, almost-identical callbacks for ALTER TABLE .. SET SCHEMA and ALTER TABLE .. RENAME, and no callback at all for everything else. I went ahead and changed the code so that no form of ALTER TABLE works on foreign tables; you must use ALTER FOREIGN TABLE instead. In 9.1, it was possible to use ALTER TABLE .. SET SCHEMA or ALTER TABLE .. RENAME on a foreign table, but not any other form of ALTER TABLE, which did not seem terribly useful or consistent. Patch by me; review by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1489e2f26a4c0318938b3085f50976512f321d84">http://git.postgresql.org/pg/commitdiff/1489e2f26a4c0318938b3085f50976512f321d84</a></li>

<li>Fix backwards logic in previous commit. I wrote this code before committing it, but managed not to include it in the actual commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df970a0ac8fb416b179825a135c18ad3293076af">http://git.postgresql.org/pg/commitdiff/df970a0ac8fb416b179825a135c18ad3293076af</a></li>

<li>Slightly reorganize struct SnapshotData. This squeezes out a bunch of alignment padding, reducing the size from 72 to 56 bytes on my machine. At least in my testing, this didn't produce any measurable performance improvement, but the space savings seem like enough justification. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1fc3d18faa8f4476944bc6854be0f7f6adf4aec8">http://git.postgresql.org/pg/commitdiff/1fc3d18faa8f4476944bc6854be0f7f6adf4aec8</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Noah Misch and Simon Riggs traded patches to make SnapshotNow an MVCC snapshot.</li>

<li>Pavel Stehule sent in three revisions of a patch to add IF EXISTS to ALTER TABLE for tables which may or may not exist.</li>

<li>Simon Riggs sent in two patches offering differing mitigations to PostgreSQL's lame buffer replacement strategy.</li>

<li>KaiGai Kohei sent in two revisions of a new patch to control information leaks from certain kinds of views.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to collect frequency statistics for arrays.</li>

<li>Simon Riggs sent in a patch to check for busy state before putting buffer on the freelist.</li>

<li>Simon Riggs sent in two revisions of a patch to avoid some lock contention.</li>

<li>Andrew Dunstan sent in a cleaned-up version of Brad Davis patch to bring the FreeBSD kernel tuning documentation up to date.</li>

<li>Peter Geoghegan sent in two revisions of a patch to save energy by having a bgwriter latch.</li>

<li>Noah Misch sent in two revisions of a patch to prevent foreign key validations for ALTER TABLE ... ALTER TYPE where table rewriting is not already happening.</li>

<li>Simon Riggs sent in a patch to remove clog contention caused by his dirty CLOG LRU.</li>

<li>Simon Riggs sent in six more revisions of a patch to add 16-bit page checksums without changing the page format.</li>

<li>Robert Haas sent in a WIP patch to optimize repeated MVCC snapshots by reusing same if no transactions have committed or aborted since it was taken.</li>

<li>Jim Mlodgenski sent in a patch intended to allow psql to display client messages.</li>

<li>Robert Haas sent in a patch to fix how a loop works in VACUUM.</li>

<li>Dan Ports sent in a patch to fix a corner case in the SSI cleanup code that isn't handled correctly.</li>

<li>Noah Misch sent in a patch to tighten up two issues introduced in his previous patch, which introduced a CheckIndexCompatible() that approves btree and hash indexes having changed to a different operator class within the same operator family.</li>

<li>Heikki Linnakangas sent in anoTher revision of his patch to move more work outside WALInsertLock.</li>

<li>Heikki Linnakangas sent in a patch to allow profiling LWLocks.</li>

<li>KaiGai Kohei sent in a patch which adds the option to assert that a function is leakproof in the sense that it can be pushed down into a view and not leak information. This goes to the effort to prevent certain kinds of information leaks in views.</li>

<li>Simon Riggs sent in a patch which adds a ClogHistory cache which allows access to the read-only tail of pages in the clog. This separates historical accesses by readers from current write access by committers.</li>

<li>Dimitri Fontaine sent in a patch to add in-line extensions, namely ones which do not require access to the filesystem or network in order to work.</li>

<li>Peter Eisentraut sent in a patch to add tab completion for GRANT role to psql.</li>

<li>Peter Eisentraut sent in a patch to add the SQL standard "collation for (expression)" feature.</li>

<li>Ryan Kelly sent in a patch to fix some misbehavior when psql connects to a non-existent host.</li>

</ul>