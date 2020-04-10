---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 juin 2018"
author: "NBougain"
redirect_from: "index.php?post/2018-06-14-nouvelles-hebdomadaires-de-postgresql-10-juin-2018 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Put new command-line options into alphabetical order. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4d6a854f176dbb48e62f017d8234f4736cb48d24">https://git.postgresql.org/pg/commitdiff/4d6a854f176dbb48e62f017d8234f4736cb48d24</a></li>

<li>Fix typo. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2241ad1556b3734b4867117bee8d78ef9577fceb">https://git.postgresql.org/pg/commitdiff/2241ad1556b3734b4867117bee8d78ef9577fceb</a></li>

<li>Fix spurious non-ASCII bytes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3f85c62d9e825eedd1315d249ef1ad793ca78ed4">https://git.postgresql.org/pg/commitdiff/3f85c62d9e825eedd1315d249ef1ad793ca78ed4</a></li>

<li>Add missing serial commas. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/25cf4ed1dc4e16da042e73ef5090e54bcf271f45">https://git.postgresql.org/pg/commitdiff/25cf4ed1dc4e16da042e73ef5090e54bcf271f45</a></li>

<li>doc: Move some new options into better positions on man pages. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5efbdd36f1584d5e6e3870a05dc5f53692b18df6">https://git.postgresql.org/pg/commitdiff/5efbdd36f1584d5e6e3870a05dc5f53692b18df6</a></li>

<li>ecpg: Document new compatibility option. It's listed in --help, so it should be listed in the man page as well. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3b9b7516f42b72589951bb8d47a0220c67fb70de">https://git.postgresql.org/pg/commitdiff/3b9b7516f42b72589951bb8d47a0220c67fb70de</a></li>

<li>Fix typo. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/acad8b409add4bde37e3882c1680a7bd26289f03">https://git.postgresql.org/pg/commitdiff/acad8b409add4bde37e3882c1680a7bd26289f03</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Fix function code in error report. This bug causes a lseek() failure to be reported as a "could not open" failure in the error message, muddling bug reports. I introduced this copy-and-pasteo in commit 78e122010422. Noticed while reviewing code for bug report #15221, from lily liang. In version 10 the affected function is only used by multixact.c and commit_ts, and only in corner-case circumstances, neither of which are involved in the reported bug (a pg_subtrans failure.) Author: &#65533;lvaro Herrera <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/eee381ef5ec4b16cff37865ccd70510e1e1abcdc">https://git.postgresql.org/pg/commitdiff/eee381ef5ec4b16cff37865ccd70510e1e1abcdc</a></li>

<li>Teach SHOW ALL to honor pg_read_all_settings membership. Also, fix the pg_settings view to display source filename and line number when invoked by a pg_read_all_settings member. This addition by me (&#65533;lvaro). Also, fix wording of the comment in GetConfigOption regarding the restriction it implements, renaming the parameter for extra clarity. Noted by Micha&#65533;l. These were all oversight in commit 25fff40798fc; backpatch to pg10, where that commit first appeared. Author: Laurenz Albe Reviewed-by: Micha&#65533;l Paquier, &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/1519917758.6586.8.camel@cybertec.at">https://postgr.es/m/1519917758.6586.8.camel@cybertec.at</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0c8910a0cab7c1e439bf5f5850122c36359e6799">https://git.postgresql.org/pg/commitdiff/0c8910a0cab7c1e439bf5f5850122c36359e6799</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix obsolete comment. The 'orig_slot' argument was removed in commit c0a8ae7be392, but that commit forgot to update the comment. Author: Amit Langote Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/194ac4bf-7b4a-c887-bf26-bc1a85ea995a@lab.ntt.co.jp">https://www.postgresql.org/message-id/194ac4bf-7b4a-c887-bf26-bc1a85ea995a@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/57f06a7611cc4806f581ae838f145181164056d4">https://git.postgresql.org/pg/commitdiff/57f06a7611cc4806f581ae838f145181164056d4</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typo in README. Author: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/848b1f3e358f4a1bb98d8c4a07ff8ee5fd7ea9a0">https://git.postgresql.org/pg/commitdiff/848b1f3e358f4a1bb98d8c4a07ff8ee5fd7ea9a0</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Exclude VACUUMs from RunningXactData. GetRunningTransactionData() should ignore VACUUM procs because in some cases they are assigned xids. This could lead to holding back xmin via the route of passing the xid to standby and then having that hold back xmin on master via feedback. Backpatch to 9.1 needed, but will only do so on supported versions. Backpatch once proven on the buildfarm. Reported-by: Greg Stark Author: Simon Riggs Reviewed-by: Amit Kapila Discussion: <a target="_blank" href="https://postgr.es/m/CANP8+jJBYt=4PpTfiPb0UrH1_iPhzsxKH5Op_Wec634F0ohnAw@mail.gmail.com">https://postgr.es/m/CANP8+jJBYt=4PpTfiPb0UrH1_iPhzsxKH5Op_Wec634F0ohnAw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/32ac7a118fc17f5baac1b370f50d759c30bee00a">https://git.postgresql.org/pg/commitdiff/32ac7a118fc17f5baac1b370f50d759c30bee00a</a></li>

</ul>

<p>Peter Geoghegan pushed:</p>

<ul>

<li>Fix typo in JIT README. Author: Daniel Gustafsson Discussion: <a target="_blank" href="https://postgr.es/m/3747D478-41F9-439F-8074-AC81A5C76346@yesql.se">https://postgr.es/m/3747D478-41F9-439F-8074-AC81A5C76346@yesql.se</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f6b95ff434bff28c0d9b390d5a0ff316847c4fb7">https://git.postgresql.org/pg/commitdiff/f6b95ff434bff28c0d9b390d5a0ff316847c4fb7</a></li>

</ul>

<p>Thomas Munro pushed:</p>

<ul>

<li>Limit Parallel Hash's bucket array to MaxAllocSize. Make sure that we don't exceed MaxAllocSize when increasing the number of buckets. Perhaps later we'll remove that limit and use DSA_ALLOC_HUGE, but for now just prevent further increases like the non-parallel code. This change avoids the error from bug report #15225. Author: Thomas Munro Reviewed-By: Tom Lane Reported-by: Frits Jalvingh Discussion: <a target="_blank" href="https://postgr.es/m/152802081668.26724.16985037679312485972%40wrigleys.postgresql.org">https://postgr.es/m/152802081668.26724.16985037679312485972%40wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/86a2218eb00eb6f97898945967c5f9c95c72b4c6">https://git.postgresql.org/pg/commitdiff/86a2218eb00eb6f97898945967c5f9c95c72b4c6</a></li>

</ul>

<p>Micha&#65533;l Paquier pushed:</p>

<ul>

<li>Fix and document lock handling for in-memory replication slot data. While debugging issues on HEAD for the new slot forwarding feature of Postgres 11, some monitoring of the code surrounding in-memory slot data has proved that the lock handling may cause inconsistent data to be read by read-only callers of slot functions, particularly pg_get_replication_slots() which fetches data for the system view pg_replication_slots, or modules looking directly at slot information. The code paths involved in those problems concern logical decoding initialization (down to 9.4) and WAL reservation for slots (new as of 10). A set of comments documenting all the lock handlings, particularly the dependency with LW locks for slots and the in_use flag as well as the internal mutex lock is added, based on a suggested by Simon Riggs. Some of the fixed code exists down to 9.4 where WAL decoding has been introduced, but as those race conditions are really unlikely going to happen as those concern code paths for slot and decoding creation, just fix the problem on HEAD. Author: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20180528085747.GA27845@paquier.xyz">https://postgr.es/m/20180528085747.GA27845@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9e149c847f398793ec1641885434dcd10837d89d">https://git.postgresql.org/pg/commitdiff/9e149c847f398793ec1641885434dcd10837d89d</a></li>

<li>Fix grammar in REVOKE documentation. Reported-by: Erwin Brandstetter <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c83e2029909c5411ca11fd841851016f1f9810e6">https://git.postgresql.org/pg/commitdiff/c83e2029909c5411ca11fd841851016f1f9810e6</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Improve run-time partition pruning to handle any stable expression. The initial coding of the run-time-pruning feature only coped with cases where the partition key(s) are compared to Params. That is a bit silly; we can allow it to work with any non-Var-containing stable expression, as long as we take special care with expressions containing PARAM_EXEC Params. The code is hardly any longer this way, and it's considerably clearer (IMO at least). Per gripe from Pavel Stehule. David Rowley, whacked around a bit by me Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com">https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/73b7f48f78d27b1baf1a6541cbaae0fe6bd6186d">https://git.postgresql.org/pg/commitdiff/73b7f48f78d27b1baf1a6541cbaae0fe6bd6186d</a></li>

<li>Relocate partition pruning structs to a saner place. These struct definitions were originally dropped into primnodes.h, which is a poor choice since that's mainly intended for primitive expression node types; these are not in that category. What they are is auxiliary info in Plan trees, so move them to plannodes.h. For consistency, also relocate some related code that was apparently placed with the aid of a dartboard. There's no interesting code changes in this commit, just reshuffling. David Rowley and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com">https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/939449de0e571b8c0b07674bb7095e06e93cc059">https://git.postgresql.org/pg/commitdiff/939449de0e571b8c0b07674bb7095e06e93cc059</a></li>

<li>Assorted cosmetic cleanup of run-time-partition-pruning code. Use "subplan" rather than "subnode" to refer to the child plans of a partitioning Append; this seems a bit more specific and hence clearer. Improve assorted comments. No non-cosmetic changes. David Rowley and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com">https://postgr.es/m/CAFj8pRBjrufA3ocDm8o4LPGNye9Y+pm1b9kCwode4X04CULG3g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/321f648a312bd188b7a5c33a0548a57f45dfbf42">https://git.postgresql.org/pg/commitdiff/321f648a312bd188b7a5c33a0548a57f45dfbf42</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Fujii Masao sent in a patch to fix the performance of DROP DATABASE with many tablespaces in it by ensuring that DROP DATABASE generates only one XLOG_DBASE_DROP record, and registers the information of all the tablespaces into it.</p>

<p>Kyotaro HORIGUCHI sent in three more revisions of a patch to fix a problem while updating a foreign table pointing to a partitioned table on foreign server.</p>

<p>Heikki Linnakangas sent in a patch to optimize memory usage in SetOp executor node and allow SetOps to spill to storage.</p>

<p>Justin Pryzby sent in two more revisions of a patch to add tab completion in psql for table partitions.</p>

<p>Jeff Janes sent in a patch to make deparsing of column defaults faster.</p>

<p>Alexander Korotkov sent in a patch to lock B-tree leaves immediately in exclusive mode.</p>

<p>Peter Eisentraut sent in a patch to use $Test::Builder::Level in TAP test functions.</p>

<p>Andres Freund sent in a patch to convert FunctionCallInfoData-&gt;{arg,argisnull} into an array of NullableDatum (new type, a struct of Datum and bool), and then use a variable length array for the arguments. This gets the size of that data structure down from 936 bytes no matter what to 64 bytes in the very common 2-argument case.</p>

<p>Andrew Dunstan sent in a patch to extend and slightly refactor perl checking.</p>

<p>Andrew Dunstan sent in a patch to make the MSVC scripts work better on the buildfarm, and possibly elsewhere.</p>

<p>Konstantin Knizhnik sent in two more revisions of a patch to implement libpq compression.</p>

<p>Robbie Harwood sent in another revision of a patch to implement GSSAPI encryption.</p>

<p>Amit Khandekar sent in another revision of a patch to fix a concurrency bug in UPDATE of a partition key.</p>

<p>Melanie Plageman sent in a patch to fix a bug in collation.</p>

<p>David Fetter sent in a PoC patch to trim trailing whitespace in vim and emacs.</p>

<p>Teodor Sigaev sent in three more revisions of a patch to optimize GROUP BY.</p>

<p>Micha&#65533;l Paquier sent in two more revisions of a patch to rework scram_channel_binding to protect from downgrade attacks.</p>

<p>Rajkumar Raghuwanshi sent in a patch to add tests for partition-wise join with partitioned tables containing a default partition.</p>

<p>Nico Williams sent in another revision of a patch to add an ALWAYS DEFERRED option for CONSTRAINTS and CONSTRAINT TRIGGERs.</p>

<p>Heikki Linnakangas sent in a patch to push down JOIN clauses into subqueries.</p>

<p>Peter Eisentraut sent in another revision of a patch to enable using file cloning in pg_upgrade.</p>

<p>David Rowley and Ashutosh Bapat traded patches to allow direct lookups of AppendRelInfo by child relid.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix wrong behavior during crash recovery.</p>

<p>Peter Eisentraut sent in a patch to a patch that allows declaring cursors over prepared.</p>

<p>Peter Eisentraut sent in a patch to enable declaring cursors over prepared statements.</p>

<p>David Rowley, &#65533;lvaro Herrera, and Amit Langote traded patches to fix some issues with partition constraints.</p>

<p>Dagfinn Ilmari Manns&#65533;ker sent in a patch to fix excess enreferencing in plperl jsonb transform.</p>

<p>Peter Da Silva sent in a patch to add a PL/Tcl function to detect when a request has been canceled.</p>

<p>Laurenz Albe sent in a patch to build pg_test_fsync as backend code.</p>

<p>Micha&#65533;l Paquier sent in a patch to check the OpenSSL version available on Windows.</p>

<p>David Rowley sent in a patch to run-time prune only for partitioned tables.</p>