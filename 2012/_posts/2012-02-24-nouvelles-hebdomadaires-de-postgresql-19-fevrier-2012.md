---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 février 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-02-24-nouvelles-hebdomadaires-de-postgresql-19-fevrier-2012 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Silence warning about deprecated assignment to $[ in check_keywords.pl. Alex Hunsaker 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4e3633ac42ed7af21bce611234ccbf820098644">http://git.postgresql.org/pg/commitdiff/b4e3633ac42ed7af21bce611234ccbf820098644</a></li>

<li>Fix heap_multi_insert to set t_self field in the caller's tuples. If tuples were toasted, heap_multi_insert didn't update the ctid on the original tuples. This caused a failure if there was an after trigger (including a foreign key), on the table, and a tuple got toasted. Per off-list report and test case from Ted Phelps 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21b16342750d6623f3c78f639f07bf3b66b49417">http://git.postgresql.org/pg/commitdiff/21b16342750d6623f3c78f639f07bf3b66b49417</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix auto-explain JSON output to be valid JSON. Problem reported by Peter Eisentraut. Backpatched to release 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21320763a39994021a4ff045ff66f7204bdb6d78">http://git.postgresql.org/pg/commitdiff/21320763a39994021a4ff045ff66f7204bdb6d78</a></li>

<li>Improve pretty printing of viewdefs. Some line feeds are added to target lists and from lists to make them more readable. By default they wrap at 80 columns if possible, but the wrap column is also selectable - if 0 it wraps after every item. Andrew Dunstan, reviewed by Hitoshi Harada. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f582f76b1945929ff07116cd4639747ce9bb8a1">http://git.postgresql.org/pg/commitdiff/2f582f76b1945929ff07116cd4639747ce9bb8a1</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Do not use the variable name when defining a varchar structure in ecpg. With a unique counter being added anyway, there is no need anymore to have the variable name listed, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a4880a0dd3cc94770aae2d372302642990c9fc1">http://git.postgresql.org/pg/commitdiff/9a4880a0dd3cc94770aae2d372302642990c9fc1</a></li>

<li>Make sure all connection paramters are used in call to PQconnectdbParams. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e7710e725b1d1fe408ac20548d872cc52f7b8ab">http://git.postgresql.org/pg/commitdiff/5e7710e725b1d1fe408ac20548d872cc52f7b8ab</a></li>

<li>Windows doesn't have strtok_r, so let's use strtok_s instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3155c97b0fa6d73aa9128cf0e56e8a776f5d355">http://git.postgresql.org/pg/commitdiff/e3155c97b0fa6d73aa9128cf0e56e8a776f5d355</a></li>

<li>gcc on Windows does not know about strtok_s. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45b7ab6b59f4a1982181327ac6393c09ffbbbbd0">http://git.postgresql.org/pg/commitdiff/45b7ab6b59f4a1982181327ac6393c09ffbbbbd0</a></li>

<li>In ecpglib rewrote code that used strtok_r to not use library functions anymore. This way we don't have to worry which compiler on which OS offers which version of strtok. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84ff5b5db5f801f5da6690d8904cc88cea4700e8">http://git.postgresql.org/pg/commitdiff/84ff5b5db5f801f5da6690d8904cc88cea4700e8</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve labeling of pg_test_fsync open_sync test output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bbd88f8f841b01efb073972b60d4dc1ff1f6fd0">http://git.postgresql.org/pg/commitdiff/2bbd88f8f841b01efb073972b60d4dc1ff1f6fd0</a></li>

<li>Change contrib/pg_test_fsync to control tests in terms of seconds per test, rather than a number of test cycles. Changes -o/cycles option to -s/seconds. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a8396e35e2e230da7539372b32968c0d959fba8">http://git.postgresql.org/pg/commitdiff/0a8396e35e2e230da7539372b32968c0d959fba8</a></li>

<li>Document that the pg_test_fsync defaults allow the program to complete in about 30 seconds. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef7a7c81d99c721db6e7d550f3fef3b94737ee94">http://git.postgresql.org/pg/commitdiff/ef7a7c81d99c721db6e7d550f3fef3b94737ee94</a></li>

<li>Document random page cost is only 4x seqeuntial, and not 40x. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1d9df4fa227781b31be44a5a3024865a7f48049">http://git.postgresql.org/pg/commitdiff/c1d9df4fa227781b31be44a5a3024865a7f48049</a></li>

<li>Improve fsync documentation by stating that -W _0_ turns of write caching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58d746213d3defb84947ff1407e6cb0eabb26f38">http://git.postgresql.org/pg/commitdiff/58d746213d3defb84947ff1407e6cb0eabb26f38</a></li>

<li>Try to get pg_test_thread to compile on Windows by using a sleeper thread. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ae2db1d1e7bc95ef8cee380d549dd03a2f8ce88">http://git.postgresql.org/pg/commitdiff/7ae2db1d1e7bc95ef8cee380d549dd03a2f8ce88</a></li>

<li>Fix pg_test_fsync Win32 problems reported by the build farm; add comments about the alarm method used on Win32. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/388c2f93254b90921e207bc1cf52e1c8e0f4bba8">http://git.postgresql.org/pg/commitdiff/388c2f93254b90921e207bc1cf52e1c8e0f4bba8</a></li>

<li>Have pg_upgrade output 'link' or 'copy' when reporting its status. Idea from Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f951474dc01cef3c829d953429246fc308cac68">http://git.postgresql.org/pg/commitdiff/7f951474dc01cef3c829d953429246fc308cac68</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow LEAKPROOF functions for better performance of security views. We don't normally allow quals to be pushed down into a view created with the security_barrier option, but functions without side effects are an exception: they're OK. This allows much better performance in common cases, such as when using an equality operator (that might even be indexable). There is an outstanding issue here with the CREATE FUNCTION / ALTER FUNCTION syntax: there's no way to use ALTER FUNCTION to unset the leakproof flag. But I'm committing this as-is so that it doesn't have to be rebased again; we can fix up the grammar in a future commit. KaiGai Kohei, with some wordsmithing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd30728fb2ed7c367d545fc14ab850b5fa2a4850">http://git.postgresql.org/pg/commitdiff/cd30728fb2ed7c367d545fc14ab850b5fa2a4850</a></li>

<li>Fix new create_function_3 regression tests not to rely on tuple order. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e37e448650dfd9f4afdf916843015c5cb33346c8">http://git.postgresql.org/pg/commitdiff/e37e448650dfd9f4afdf916843015c5cb33346c8</a></li>

<li>Remove new, intermittently failing regression test. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc66f1c5f2a6e93d949252a0ad661388e1fe7856">http://git.postgresql.org/pg/commitdiff/dc66f1c5f2a6e93d949252a0ad661388e1fe7856</a></li>

<li>sepgsql: Reword and fix typo in docs on DML permissions. Per report from Christoph Berg. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d845fd684a3a386400a42c83c209e70095cadd55">http://git.postgresql.org/pg/commitdiff/d845fd684a3a386400a42c83c209e70095cadd55</a></li>

<li>Make CREATE/ALTER FUNCTION support NOT LEAKPROOF. Because it isn't good to be able to turn things on, and not off again. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73a4b994a69661964b1ff45b746f1ca26f70194c">http://git.postgresql.org/pg/commitdiff/73a4b994a69661964b1ff45b746f1ca26f70194c</a></li>

<li>More regression tests for LEAKPROOF/NOT LEAKPROOF stuff. Along the way, move create_function_3 into a parallel schedule. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac9100f8cf595f7512e98fc5c6338ee3e32a0651">http://git.postgresql.org/pg/commitdiff/ac9100f8cf595f7512e98fc5c6338ee3e32a0651</a></li>

<li>Speed up in-memory tuplesorting. Per recent work by Peter Geoghegan, it's significantly faster to tuplesort on a single sortkey if ApplySortComparator is inlined into quicksort rather reached via a function pointer. It's also faster in general to have a version of quicksort which is specialized for sorting SortTuple objects rather than objects of arbitrary size and type. This requires a couple of additional copies of the quicksort logic, which in this patch are generate using a Perl script. There might be some benefit in adding further specializations here too, but thus far it's not clear that those gains are worth their weight in code footprint. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/337b6f5ecf05b21b5e997986884d097d60e4e3d0">http://git.postgresql.org/pg/commitdiff/337b6f5ecf05b21b5e997986884d097d60e4e3d0</a></li>

<li>sepgsql: Move some code from hooks.c to label.c. This is some preliminary refactoring related to a pending patch to allow sepgsql-enable sessions to make dynamic label transitions. But this commit doesn't involve any functional change: it just puts some bits of code in more logical places. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d44a3fb55de06137e77b0105c89656a897e396e8">http://git.postgresql.org/pg/commitdiff/d44a3fb55de06137e77b0105c89656a897e396e8</a></li>

<li>Fix VPATH builds, broken by my recent commit to speed up tuplesorting. The relevant commit is 337b6f5ecf05b21b5e997986884d097d60e4e3d0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edec8c8e00e3f2a9305ab92e2c81293457cf959a">http://git.postgresql.org/pg/commitdiff/edec8c8e00e3f2a9305ab92e2c81293457cf959a</a></li>

<li>Invent on_exit_nicely for pg_dump. Per recent discussions on pgsql-hackers regarding parallel pg_dump. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9a22259c45e235aaa30f0d068f767d9c0f818a0">http://git.postgresql.org/pg/commitdiff/e9a22259c45e235aaa30f0d068f767d9c0f818a0</a></li>

<li>Refactor pg_dump.c to avoid duplicating returns-one-row check. Any patches apt to get broken have probably already been broken by the error-handling cleanups I just did, so we might as well clean this up at the same time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/549e93c990575b2b69c49fcacc0f280bc9762db9">http://git.postgresql.org/pg/commitdiff/549e93c990575b2b69c49fcacc0f280bc9762db9</a></li>

<li>pg_dump: Remove global connection pointer. Parallel pg_dump wants to have multiple ArchiveHandle objects, and therefore multiple PGconns, in play at the same time. This should be just about the end of the refactoring that we need in order to make that workable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/689d0eb7db9514f33f49fd5260462b9ba8331e80">http://git.postgresql.org/pg/commitdiff/689d0eb7db9514f33f49fd5260462b9ba8331e80</a></li>

<li>pg_dump: Miscellaneous tightening based on recent refactorings. Use exit_horribly() and ExecuteSqlQueryForSingleRow() in various places where it's equivalent, or nearly equivalent, to the prior coding. Apart from being more compact, this also makes the error messages for the wrong-number-of-tuples case more consistent. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1cc1b91d1b09a5cdd9fc51c9eee31effd2227b4f">http://git.postgresql.org/pg/commitdiff/1cc1b91d1b09a5cdd9fc51c9eee31effd2227b4f</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Preserve column names in the execution-time tupledesc for a RowExpr. The hstore and json datatypes both have record-conversion functions that pay attention to column names in the composite values they're handed. We used to not worry about inserting correct field names into tuple descriptors generated at runtime, but given these examples it seems useful to do so. Observe the nicer-looking results in the regression tests whose results changed. catversion bump because there is a subtle change in requirements for stored rule parsetrees: RowExprs from ROW() constructs now have to include field names. Andrew Dunstan and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/398f70ec070fe60151584eaa448f04708aa77892">http://git.postgresql.org/pg/commitdiff/398f70ec070fe60151584eaa448f04708aa77892</a></li>

<li>Run a portal's cleanup hook immediately when pushing it to FAILED state. This extends the changes of commit 6252c4f9e201f619e5eebda12fa867acd4e4200e so that we run the cleanup hook earlier for failure cases as well as success cases. As before, the point is to avoid an assertion failure from an Assert I added in commit a874fe7b4c890d1fe3455215a83ca777867beadd, which was meant to check that no user-written code can be called during portal cleanup. This fixes a case reported by Pavan Deolasee in which the Assert could be triggered during backend exit (see the new regression test case), and also prevents the possibility that the cleanup hook is run after portions of the portal's state have already been recycled. That doesn't really matter in current usage, but it foreseeably could matter in the future. Back-patch to 9.1 where the Assert in question was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bfe68dfab009ce8fcaea79dc0832eadf3380051">http://git.postgresql.org/pg/commitdiff/4bfe68dfab009ce8fcaea79dc0832eadf3380051</a></li>

<li>Improve statistics estimation to make some use of DISTINCT in sub-queries. Formerly, we just punted when trying to estimate stats for variables coming out of sub-queries using DISTINCT, on the grounds that whatever stats we might have for underlying table columns would be inapplicable. But if the sub-query has only one DISTINCT column, we can consider its output variable as being unique, which is useful information all by itself. The scope of this improvement is pretty narrow, but it costs nearly nothing, so we might as well do it. Per discussion with Andres Freund. This patch differs from the draft I submitted yesterday in updating various comments about vardata.isunique (to reflect its extended meaning) and in tweaking the interaction with security_barrier views. There does not seem to be a reason why we can't use this sort of knowledge even when the sub-query is such a view. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4767bc8ff2edc1258cf4d8a83155d4cedd724231">http://git.postgresql.org/pg/commitdiff/4767bc8ff2edc1258cf4d8a83155d4cedd724231</a></li>

<li>Fix longstanding error in contrib/intarray's int[] &amp; int[] operator. The array intersection code would give wrong results if the first entry of the correct output array would be "1". (I think only this value could be at risk, since the previous word would always be a lower-bound entry with that fixed value.) Problem spotted by Julien Rouhaud, initial patch by Guillaume Lelarge, cosmetic improvements by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06d9afa6f93ec08a45da4de7afd97bbf16738739">http://git.postgresql.org/pg/commitdiff/06d9afa6f93ec08a45da4de7afd97bbf16738739</a></li>

<li>Sync regex code with Tcl 8.5.11. Sync our regex code with upstream changes since last time we did this, which was Tcl 8.5.0 (see commit df1e965e12cdd48c11057ee6e15346ee2b8b02f5). There are no functional changes here; the main point is just to lay down a commit-log marker that somebody has looked at this recently, and to do what we can to keep the two codebases comparable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08fd6ff37f71485e2fc04bc6ce07d2a483c36702">http://git.postgresql.org/pg/commitdiff/08fd6ff37f71485e2fc04bc6ce07d2a483c36702</a></li>

<li>Update expected/collate.linux.utf8.out for recent plpgsql changes. This file was missed in commit 4c6cedd1b014abf2046886a9a92e10e18f0d658e. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/759c95c45b65a5220976c85e6f03323975c2b276">http://git.postgresql.org/pg/commitdiff/759c95c45b65a5220976c85e6f03323975c2b276</a></li>

<li>Create the beginnings of internals documentation for the regex code. Create src/backend/regex/README to hold an implementation overview of the regex package, and fill it in with some preliminary notes about the code's DFA/NFA processing and colormap management. Much more to do there of course. Also, improve some code comments around the colormap and cvec code. No functional changes except to add one missing assert. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27af91438b68f46f4015853b6f75c6f5c3a8650c">http://git.postgresql.org/pg/commitdiff/27af91438b68f46f4015853b6f75c6f5c3a8650c</a></li>

<li>Add caching of ctype.h/wctype.h results in regc_locale.c. While this doesn't save a huge amount of runtime, it still seems worth doing, especially since I realized that the data copying I did in my first draft was quite unnecessary. In this version, once we have the results cached, getting them back for re-use is really very cheap. Also, remove the hard-wired limitation to not consider wctype.h results for character codes above 255. It turns out that we can't push the limit as far up as I'd originally hoped, because the regex colormap code is not efficient enough to cope very well with character classes containing many thousand letters, which a Unicode locale is entirely capable of producing. Still, we can push it up to U+7FF (which I chose as the limit of 2-byte UTF8 characters), which will at least make Eastern Europeans happy pending a better solution. Thus, this commit resolves the specific complaint in bug #6457, but not the more general issue that letters of non-western alphabets are mostly not recognized as matching [[:alpha:]]. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e00f68e49c148851187136d3278b7e9afa370537">http://git.postgresql.org/pg/commitdiff/e00f68e49c148851187136d3278b7e9afa370537</a></li>

<li>Fix regex back-references that are directly quantified with *. The syntax "\n*", that is a backref with a * quantifier directly applied to it, has never worked correctly in Spencer's library. This has been an open bug in the Tcl bug tracker since 2005: 

<a target="_blank" href="https://sourceforge.net/tracker/index.php?func=detail&amp;aid=1115587&amp;group_id=10894&amp;atid=110894">https://sourceforge.net/tracker/index.php?func=detail&amp;aid=1115587&amp;group_id=10894&amp;atid=110894</a> The core of the problem is in parseqatom(), which first changes "\n*" to "\n+|" and then applies repeat() to the NFA representing the backref atom. repeat() thinks that any arc leading into its "rp" argument is part of the sub-NFA to be repeated. Unfortunately, since parseqatom() already created the arc that was intended to represent the empty bypass around "\n+", this arc gets moved too, so that it now leads into the state loop created by repeat(). Thus, what was supposed to be an "empty" bypass gets turned into something that represents zero or more repetitions of the NFA representing the backref atom. In the original example, in place of ^([bc])\1*$ we now have something that acts like ^([bc])(\1+|[bc]*)$ At runtime, the branch involving the actual backref fails, as it's supposed to, but then the other branch succeeds anyway. We could no doubt fix this by some rearrangement of the operations in parseqatom(), but that code is plenty ugly already, and what's more the whole business of converting "x*" to "x+|" probably needs to go away to fix another problem I'll mention in a moment. Instead, this patch suppresses the *-conversion when the target is a simple backref atom, leaving the case of m == 0 to be handled at runtime. This makes the patch in regcomp.c a one-liner, at the cost of having to tweak cbrdissect() a little. In the event I went a bit further than that and rewrote cbrdissect() to check all the string-length-related conditions before it starts comparing characters. It seems a bit stupid to possibly iterate through many copies of an n-character backreference, only to fail at the end because the target string's length isn't a multiple of n --- we could have found that out before starting. The existing coding could only be a win if integer division is hugely expensive compared to character comparison, but I don't know of any modern machine where that might be true. This does not fix all the problems with quantified back-references. In particular, the code is still broken for back-references that appear within a larger expression that is quantified (so that direct insertion of the quantification limits into the BACKREF node doesn't apply). I think fixing that will take some major surgery on the NFA code, specifically introducing an explicit iteration node type instead of trying to transform iteration into concatenation of modified regexps. Back-patch to all supported branches. In HEAD, also add a regression test case for this. (It may seem a bit silly to create a regression test file for just one test case; but I'm expecting that we will soon import a whole bunch of regex regression tests from Tcl, so might as well create the infrastructure now.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5223f96d92fd6fb6fcf260da9f9cb111831f0b37">http://git.postgresql.org/pg/commitdiff/5223f96d92fd6fb6fcf260da9f9cb111831f0b37</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marko Kreen and Kyotaro HORIGUCHI traded patches to create, and use in dblink, a new tuple storage for libpq.</li>

<li>Etsuro Fujita and Shigeru HANADA traded patches to make a PostgreSQL FDW.</li>

<li>Alvaro Herrera sent in another revision of the patch to create a special lock type for foreign keys.</li>

<li>Heikki Linnakangas sent in two more revisions of a patch to scale xlog insertion.</li>

<li>Dimitri Fontaine sent in a patch to fix an issue with DROP EXTENSION.</li>

<li>Chetan Suttraway sent in another revision of the patch to optimize referential integrity checks.</li>

<li>Jaime Casanova sent in a flock of patches which: adds gin and spgist support to pgstattuple and makes pgstattuple use a ring buffer when reading tables or indexes, adds the relation_free_space function to pgstattuple, and adds a stats_target parameter to the relation_free_space() function.</li>

<li>Dimitri Fontaine sent in four more revisions of the patch to add command triggers.</li>

<li>Alexander Korotkov sent in two more revision of the patch to make some speed improvements on inserting and indexing cubes.</li>

<li>Dan Ports sent in a patch to fix a possible incompatibility between prepared transactions and SSI.</li>

<li>Peter Eisentraut sent in another revision of the patch to control the location of server-side SSL files via a new GUC.</li>

<li>MauMau sent in a patch to fix a bug in windows debug builds where the postmaster would always crash.</li>

<li>Simon Riggs sent in three more revisions of the patch to add page checksums.</li>

<li>Kevin Grittner sent in another revision of the patch to (re-)run GUC check hooks on RESET.</li>

<li>Dan Scales sent in a patch implementing a new option for wal_sync_method intended to improve performance.</li>

<li>Peter Geoghegan sent in another revision of the patch to normalize pg_stat_statements.</li>

<li>Robert Haas sent in another revision of the patch to display autovacuum accumulated cost.</li>

<li>Robert Haas sent in another revision of the patch to simulate clog contention.</li>

<li>Peter Eisentraut sent in a patch to make pg_regress set the application name rather than leaving it as psql.</li>

<li>Jan Urbanski sent in a patch to add PL/Python execution contexts.</li>

<li>Jan Urbanski sent in a patch to fix some reference miscounts and segfaults in PL/Python.</li>

<li>Simon Riggs sent in a patch intended to reduce the frequency of bgwriter wakeups.</li>

<li>Pavel Stehule sent in a patch to add tab completion for functions to psql.</li>

<li>Pavel Stehule sent in a patch to add tab completion for CREATE OR REPLACE FUNCTION in psql.</li>

</ul>