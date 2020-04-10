---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 juin 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-07-03-nouvelles-hebdomadaires-de-postgresql-22-juin-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use type pgsocket for Windows pipe emulation socket calls. This prevents several compiler warnings on Windows. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac608fe758455804f26179ea7c556e7752e453e8">http://git.postgresql.org/pg/commitdiff/ac608fe758455804f26179ea7c556e7752e453e8</a></li>

<li>9.4 release notes: improve valgrind mention. Report by Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cd3b1cbbd7db10600031db5485eab373b76e29a">http://git.postgresql.org/pg/commitdiff/4cd3b1cbbd7db10600031db5485eab373b76e29a</a></li>

<li>9.4 release notes: adjust some entry wording. Backpatch to 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a52f2a0b9cf6767d8c82bbc63725657bd84571d8">http://git.postgresql.org/pg/commitdiff/a52f2a0b9cf6767d8c82bbc63725657bd84571d8</a></li>

<li>doc: adjust JSONB GIN index description. Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/884dede37a056622510d6b2768abefb5ef981699">http://git.postgresql.org/pg/commitdiff/884dede37a056622510d6b2768abefb5ef981699</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid recursion when processing simple lists of AND'ed or OR'ed clauses. Since most of the system thinks AND and OR are N-argument expressions anyway, let's have the grammar generate a representation of that form when dealing with input like "x AND y AND z AND ...", rather than generating a deeply-nested binary tree that just has to be flattened later by the planner. This avoids stack overflow in parse analysis when dealing with queries having more than a few thousand such clauses; and in any case it removes some rather unsightly inconsistencies, since some parts of parse analysis were generating N-argument ANDs/ORs already. It's still possible to get a stack overflow with weirdly parenthesized input, such as "x AND (y AND (z AND ( ... )))", but such cases are not mainstream usage. The maximum depth of parenthesization is already limited by Bison's stack in such cases, anyway, so that the limit is probably fairly platform-independent. Patch originally by Gurjeet Singh, heavily revised by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2146f13408cdb85c738364fe8f7965209e08c6be">http://git.postgresql.org/pg/commitdiff/2146f13408cdb85c738364fe8f7965209e08c6be</a></li>

<li>Implement UPDATE tab SET (col1,col2,...) = (SELECT ...), ... This SQL-standard feature allows a sub-SELECT yielding multiple columns (but only one row) to be used to compute the new values of several columns to be updated. While the same results can be had with an independent sub-SELECT per column, such a workaround can require a great deal of duplicated computation. The standard actually says that the source for a multi-column assignment could be any row-valued expression. The implementation used here is tightly tied to our existing sub-SELECT support and can't handle other cases; the Bison grammar would have some issues with them too. However, I don't feel too bad about this since other cases can be converted into sub-SELECTs. For instance, "SET (a,b,c) = row_valued_function(x)" could be written "SET (a,b,c) = (SELECT * FROM row_valued_function(x))". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f889b1083f38f4f5b3bd3512008a3f60e939244">http://git.postgresql.org/pg/commitdiff/8f889b1083f38f4f5b3bd3512008a3f60e939244</a></li>

<li>Fix weird spacing in error message. Seems to have been introduced in 1a3458b6d8d202715a83c88474a1b63726d0929e. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66802246e22d51858cd543877fcfddf24e6812f2">http://git.postgresql.org/pg/commitdiff/66802246e22d51858cd543877fcfddf24e6812f2</a></li>

<li>Improve our mechanism for controlling the Linux out-of-memory killer. Arrange for postmaster child processes to respond to two environment variables, PG_OOM_ADJUST_FILE and PG_OOM_ADJUST_VALUE, to determine whether they reset their OOM score adjustments and if so to what. This is superior to the previous design involving #ifdef's in several ways. The behavior is now available in a default build, and both ends of the adjustment --- the original adjustment of the postmaster's level and the subsequent readjustment by child processes --- can now be controlled in one place, namely the postmaster launch script. So it's no longer necessary for the launch script to act on faith that the server was compiled with the appropriate options. In addition, if someone wants to use an OOM score other than zero for the child processes, that doesn't take a recompile anymore; and we no longer have to cater separately to the two different historical kernel APIs for this adjustment. Gurjeet Singh, somewhat revised by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df8b7bc9ffff5b00aacff774600b569992cddeb8">http://git.postgresql.org/pg/commitdiff/df8b7bc9ffff5b00aacff774600b569992cddeb8</a></li>

<li>Document SQL functions' behavior of parsing the whole function at once. Haribabu Kommi, somewhat rewritten by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f28d9b10f73440adcb2e094440b4b213673e491b">http://git.postgresql.org/pg/commitdiff/f28d9b10f73440adcb2e094440b4b213673e491b</a></li>

<li>Avoid leaking memory while evaluating arguments for a table function. ExecMakeTableFunctionResult evaluated the arguments for a function-in-FROM in the query-lifespan memory context. This is insignificant in simple cases where the function relation is scanned only once; but if the function is in a sub-SELECT or is on the inside of a nested loop, any memory consumed during argument evaluation can add up quickly. (The potential for trouble here had been foreseen long ago, per existing comments; but we'd not previously seen a complaint from the field about it.) To fix, create an additional temporary context just for this purpose. Per an example from MauMau. Back-patch to all active branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45b0f357235236dd3198f8abcca277adc0d7459a">http://git.postgresql.org/pg/commitdiff/45b0f357235236dd3198f8abcca277adc0d7459a</a></li>

<li>Add Asserts to verify that catalog cache keys are unique and not null. The catcache code is effectively assuming this already, so let's insist that the catalog and index are actually declared that way. Having done that, the comments in indexing.h about non-unique indexes not being used for catcaches are completely redundant not just mostly so; and we didn't have such a comment for every such index anyway. So let's get rid of them. Per discussion of whether we should identify primary keys for catalogs. We might or might not take that further step, but this change in itself will allow quicker detection of misdeclared catcaches, so it seems worth doing in any case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b38a538c0aa5a432dacd90f10805dc667a3d1a0">http://git.postgresql.org/pg/commitdiff/8b38a538c0aa5a432dacd90f10805dc667a3d1a0</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert accidental change of WAL_DEBUG default. Oops. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b29e7151434b4403d70fd35da25cec585fbd3114">http://git.postgresql.org/pg/commitdiff/b29e7151434b4403d70fd35da25cec585fbd3114</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix the MSVC build process for uuid-ossp. Catch up with commit b8cc8f94730610c0189aa82dfec4ae6ce9b13e34's introduction of the HAVE_UUID_OSSP symbol to the principal build process. Back-patch to 9.4, where that commit appeared. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/230ba02d855de7fac31bfb6af25ebd4ae052640b">http://git.postgresql.org/pg/commitdiff/230ba02d855de7fac31bfb6af25ebd4ae052640b</a></li>

<li>Fix contrib/pg_upgrade/test.sh for $PWD containing spaces. Most of the necessary quoting was in place; this catches the exceptions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/686f362bee126e50280bcd3b35807b02f18a8966">http://git.postgresql.org/pg/commitdiff/686f362bee126e50280bcd3b35807b02f18a8966</a></li>

<li>Let installcheck-world pass against a server requiring a password. Give passwords to each user created in support of an ECPG connection test case. Use SET SESSION AUTHORIZATION, not a fresh connection, to reduce privileges during a dblink test case. To test against such a server, both the "make installcheck-world" environment and the postmaster environment must provide the default user's password; $PGPASSFILE is the principal way to do so. (The postmaster environment needs it for dblink and postgres_fdw tests.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c82725edfa1aec1cad940b15b6e22ee3dbd57f20">http://git.postgresql.org/pg/commitdiff/c82725edfa1aec1cad940b15b6e22ee3dbd57f20</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Document that jsonb has all the standard comparison operators. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2a986b74afffbdc3f59258c3dd96d3dc9a238ce">http://git.postgresql.org/pg/commitdiff/d2a986b74afffbdc3f59258c3dd96d3dc9a238ce</a></li>

<li>Remove unnecessary check for jbvBinary in convertJsonbValue. The check was confusing and is a condition that should never in fact happen. Per gripe from Dmitry Dolgov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/960661980beb50c5d21e4b2855ae109e9a130326">http://git.postgresql.org/pg/commitdiff/960661980beb50c5d21e4b2855ae109e9a130326</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't allow data_directory to be set in postgresql.auto.conf by ALTER SYSTEM. data_directory could be set both in postgresql.conf and postgresql.auto.conf so far. This could cause some problematic situations like circular definition. To avoid such situations, this commit forbids a user to set data_directory in postgresql.auto.conf. Backpatch this to 9.4 where ALTER SYSTEM command was introduced. Amit Kapila, reviewed by Abhijit Menon-Sen, with minor adjustments by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ba78fb0b9e6c5a7115592c2c3116fca16b5184e">http://git.postgresql.org/pg/commitdiff/9ba78fb0b9e6c5a7115592c2c3116fca16b5184e</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix calculation of PREDICATELOCK_MANAGER_LWLOCK_OFFSET. Commit ea9df812d8502fff74e7bc37d61bdc7d66d77a7f failed to include NUM_BUFFER_PARTITIONS in this offset, resulting in a bad offset. Ultimately this threw off NUM_FIXED_LWLOCKS which is based on earlier offsets, leading to memory allocation problems. It seems likely to have also caused increased LWLOCK contention when serializable transactions were used, because lightweight locks used for that overlapped others. Reported by Amit Kapila with analysis and fix. Backpatch to 9.4, where the bug was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfaa8c665fcbd4388e01c53c4b5137f1f53d1787">http://git.postgresql.org/pg/commitdiff/bfaa8c665fcbd4388e01c53c4b5137f1f53d1787</a></li>

<li>Fix documentation template for CREATE TRIGGER. By using curly braces, the template had specified that one of "NOT DEFERRABLE", "INITIALLY IMMEDIATE", or "INITIALLY DEFERRED" was required on any CREATE TRIGGER statement, which is not accurate. Change to square brackets makes that optional. Backpatch to 9.1, where the error was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/734bea8a69db9ffd675a697f614e80baeb2ca854">http://git.postgresql.org/pg/commitdiff/734bea8a69db9ffd675a697f614e80baeb2ca854</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't allow to disable backend assertions via the debug_assertions GUC. The existance of the assert_enabled variable (backing the debug_assertions GUC) reduced the amount of knowledge some static code checkers (like coverity and various compilers) could infer from the existance of the assertion. That could have been solved by optionally removing the assertion_enabled variable from the Assert() et al macros at compile time when some special macro is defined, but the resulting complication doesn't seem to be worth the gain from having debug_assertions. Recompiling is fast enough. The debug_assertions GUC is still available, but readonly, as it's useful when diagnosing problems. The commandline/client startup option -A, which previously also allowed to enable/disable assertions, has been removed as it doesn't serve a purpose anymore. While at it, reduce code duplication in bufmgr.c and localbuf.c assertions checking for spurious buffer pins. That code had to be reindented anyway to cope with the assert_enabled removal. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bdcf6a5a7555035810e2ba2b8a0fb04dc5c66b8">http://git.postgresql.org/pg/commitdiff/3bdcf6a5a7555035810e2ba2b8a0fb04dc5c66b8</a></li>

<li>Do all-visible handling in lazy_vacuum_page() outside its critical section. Since fdf9e21196a lazy_vacuum_page() rechecks the all-visible status of pages in the second pass over the heap. It does so inside a critical section, but both visibilitymap_test() and heap_page_is_all_visible() perform operations that should not happen inside one. The former potentially performs IO and both potentially do memory allocations. To fix, simply move all the all-visible handling outside the critical section. Doing so means that the PD_ALL_VISIBLE on the page won't be included in the full page image of the HEAP2_CLEAN record anymore. But that's fine, the flag will be set by the HEAP2_VISIBLE logged later. Backpatch to 9.3 where the problem was introduced. The bug only came to light due to the assertion added in 4a170ee9 and isn't likely to cause problems in production scenarios. The worst outcome is a avoidable PANIC restart. This also gets rid of the difference in the order of operations between master and standby mentioned in 2a8e1ac5. Per reports from David Leverton and Keith Fiske in bug #10533. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ecac0e2b9e8e8e78d771b20fe441e95bb02db2fa">http://git.postgresql.org/pg/commitdiff/ecac0e2b9e8e8e78d771b20fe441e95bb02db2fa</a></li>

</ul>

<p>Joe Conway a pouss&eacute;&nbsp;:</p>

<ul>

<li>Clean up data conversion short-lived memory context. dblink uses a short-lived data conversion memory context. However it was not deleted when no longer needed, leading to a noticeable memory leak under some circumstances. Plug the hole, along with minor refactoring. Backpatch to 9.2 where the leak was introduced. Report and initial patch by MauMau. Reviewed/modified slightly by Tom Lane and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1dde5782e34a1c5ef2ce9d97cf18007fed5fde92">http://git.postgresql.org/pg/commitdiff/1dde5782e34a1c5ef2ce9d97cf18007fed5fde92</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in another revision of a patch to avoiding tuple copying in btree index builds.</li>

<li>Peter Geoghegan sent in a patch to add an extension, btreecheck, which provides SQL-callable functions for checking nbtree index invariants on live systems.</li>

<li>Furuya Osamu sent in another revision of a patch to add a synchronous mode to pg_receivexlog.</li>

<li>Ronan Dunklau sent in another revision of a patch to implement IMPORT FOREIGN SCHEMA.</li>

<li>Michael Paquier sent in a set of three patches to fix some bugs in WAL replay.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to fix xpath() to return namespace definitions.</li>

<li>Jeevan Chalke sent in another revision of a patch to include pg_dump client and PostgreSQL server versions without requiring the verbose option in the pg_dump output comments.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>MauMau sent in two revisions of a patch to implement pg_copy, a command for reliable WAL archiving.</li>

<li>Andreas Karlsson sent in another revision of a patch to add psql tab completion for DROP TRIGGER/RULE and ALTER TABLE ... DISABLE/ENABLE.</li>

<li>Mitsumasa KONDO sent in another revision of a patch to add a Gaussian distribution option to pgbench.</li>

<li>Steven Siebert sent in a patch to fix the problem of ldapbindpasswd leaking in clear text to the postgresql log.</li>

<li>Jeff Janes sent in a patch to fix an issue where certain files in pg_multixact couldn't be read on the replica during hot standby.</li>

<li>Vik Fearing and David Rowley traded patches to allow pushdowns of items matching PARTITION BY clauses.</li>

<li>Matheus de Oliveira sent in a patch to allow creating distinct temporary tablespaces.</li>

<li>David Rowley sent in another revision of a patch to allow join removals for certain LEFT JOINs.</li>

<li>Emre Hasegeli sent in another revision of a patch to add selectivity estimation for inet operators.</li>

<li>Rajeev Rastogi sent in another revision of a patch to add autonomous transactions.</li>

<li>Michael Paquier sent in a patch to remove usage of wsock32 in Windows builds.</li>

<li>Andres Freund sent in two more revisions of a patch to disallow people from disabling backend assertions via the assert_enabled GUC.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to allow INHERIT support for foreign tables.</li>

<li>Fujii Masao sent in a patch to redefine log_statement as a list.</li>

<li>Kevin Grittner sent in a patch to add delta relations in AFTER triggers, per SQL specification.</li>

<li>Pavel Stehule and Erik Rijkers traded patches to allow listing the available configuration variables from the psql command line.</li>

<li>Vik Fearing sent in another revision of a patch to add a way to make "idle in transaction" sessions terminate via a settable timeout.</li>

</ul>