---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 octobre 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/10/23/Nouvelles-hebdomadaires-de-PostgreSQL-21-octobre-2012"
---


<p>La 6<sup>&egrave;me</sup> conf&eacute;rence annuelle <em>Highload++</em> aura lieu les 22 &amp; 23 octobre 2012 &agrave; Moscou (Russie)&nbsp;: 

<a target="_blank" href="http://highload.co/">http://highload.co/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 2.1, un analyseur de logs &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="https://github.com/dalibo/pgbadger/downloads">https://github.com/dalibo/pgbadger/downloads</a></li>

<li>pgpool-HA 2.0 publi&eacute;. Il aide &agrave; la gestion de la haute disponibilit&eacute; avec pgpool&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

<li>pg_stat_plans 1.0 beta 1, un outil am&eacute;lior&eacute; de supervision et de <em>tuning</em>&nbsp;: 

<a target="_blank" href="http://www.2ndquadrant.com/en/pg_stat_plans/">http://www.2ndquadrant.com/en/pg_stat_plans/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 6<sup>&egrave;me</sup> conf&eacute;rence annuelle <em>Highload++</em> aura lieu les 22 &amp; 23 octobre 2012 &agrave; Moscou (Russie)&nbsp;: 

<a target="_blank" href="http://highload.co/">http://highload.co/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Il y aura un PGDay &eacute;galement le 9 novembre 2012 &agrave; l'USP de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16949">http://www.postgresql.org.br/node/16949</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

<li>Le PGDay &eacute;quatorien de cette ann&eacute;e se tiendra &agrave; Quito le 17 novembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 10 octobre. Envoyez vos propositions &agrave; Jaime Casanova&nbsp;: jaime &lt;AT&gt; 2ndquadrant &lt;DOT&gt; com&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012">https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012</a></li>

<li>La sixi&egrave;me &eacute;dition du PGDay italien aura lieu &agrave; Prato, Toscane, le 23 novembre 2012. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;, conf&eacute;rences et pr&eacute;sentations en anglais sont accept&eacute;es. Informations anglophones sur le processus de candidature disponibles ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="http://2012.pgday.it/call-for-papers/international-call-for-papers/">http://2012.pgday.it/call-for-papers/international-call-for-papers/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-10/msg00009.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix race condition in pg_ctl reading postmaster.pid. If postmaster changed postmaster.pid while pg_ctl was reading it, pg_ctl could overrun the buffer it allocated for the file. Fix by reading the whole file to memory with one read() call. initdb contains an identical copy of the readfile() function, but the files that initdb reads are static, not modified concurrently. Nevertheless, add a simple bounds-check there, if only to silence static analysis tools. Per report from Dave Vitek. Backpatch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c89684e08cda82727bd8bdad155b9235fb7246e">http://git.postgresql.org/pg/commitdiff/5c89684e08cda82727bd8bdad155b9235fb7246e</a></li>

<li>Remove comment that is no longer true. AddToDataDirLockFile() supports out-of-order updates of the lockfile nowadays. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff6c78c48009d667bf1eb66105b0c2e05dcd2fa2">http://git.postgresql.org/pg/commitdiff/ff6c78c48009d667bf1eb66105b0c2e05dcd2fa2</a></li>

<li>Fix typo in comment. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d3ed5ae78df0f7b85f57b3cee9b70c7bd415645">http://git.postgresql.org/pg/commitdiff/7d3ed5ae78df0f7b85f57b3cee9b70c7bd415645</a></li>

<li>Further tweaking of the readfile() function in pg_ctl. Don't leak a file descriptor if the file is empty or we can't read its size. Expect there to be a newline at the end of the last line, too. If there isn't, ignore anything after the last newline. This makes it a tiny bit more robust in case the file is appended to concurrently, so that we don't return the last line if it hasn't been fully written yet. And this makes the code a bit less obscure, anyway. Per Tom Lane's suggestion. Backpatch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a49585e2b2ee43618e9f1107e21781c5f71f6c1">http://git.postgresql.org/pg/commitdiff/2a49585e2b2ee43618e9f1107e21781c5f71f6c1</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>alter_generic regression test cannot run concurrently with privileges test. ... because the latter plays games with the privileges for language SQL. It looks like running alter_generic in parallel with "misc" is OK though. Also, adjust serial_schedule to maintain the same test ordering (up to parallelism) as parallel_schedule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b72bd3d1c65886c21a961830325f11a3f7a41799">http://git.postgresql.org/pg/commitdiff/b72bd3d1c65886c21a961830325f11a3f7a41799</a></li>

<li>Close un-owned SMgrRelations at transaction end. If an SMgrRelation is not "owned" by a relcache entry, don't allow it to live past transaction end. This design allows the same SMgrRelation to be used for blind writes of multiple blocks during a transaction, but ensures that we don't hold onto such an SMgrRelation indefinitely. Because an SMgrRelation typically corresponds to open file descriptors at the fd.c level, leaving it open when there's no corresponding relcache entry can mean that we prevent the kernel from reclaiming deleted disk space. (While CacheInvalidateSmgr messages usually fix that, there are cases where they're not issued, such as DROP DATABASE. We might want to add some more sinval messaging for that, but I'd be inclined to keep this type of logic anyway, since allowing VFDs to accumulate indefinitely for blind-written relations doesn't seem like a good idea.) This code replaces a previous attempt towards the same goal that proved to be unreliable. Back-patch to 9.1 where the previous patch was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff3f9c8de5846be7709b7a87654631b4c309a68b">http://git.postgresql.org/pg/commitdiff/ff3f9c8de5846be7709b7a87654631b4c309a68b</a></li>

<li>Revert "Use "transient" files for blind writes, take 2". This reverts commit fba105b1099f4f5fa7283bb17cba6fed2baa8d0c. That approach had problems with the smgr-level state not tracking what we really want to happen, and with the VFD-level state not tracking the smgr-level state very well either. In consequence, it was still possible to hold kernel file descriptors open for long-gone tables (as in recent report from Tore Halset), and yet there were also cases of FDs being closed undesirably soon. A replacement implementation will follow. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bacf0e3734f0b5dc821abf7cb312377876e22d3">http://git.postgresql.org/pg/commitdiff/9bacf0e3734f0b5dc821abf7cb312377876e22d3</a></li>

<li>Fix planning of non-strict equivalence clauses above outer joins. If a potential equivalence clause references a variable from the nullable side of an outer join, the planner needs to take care that derived clauses are not pushed to below the outer join; else they may use the wrong value for the variable. (The problem arises only with non-strict clauses, since if an upper clause can be proven strict then the outer join will get simplified to a plain join.) The planner attempted to prevent this type of error by checking that potential equivalence clauses aren't outerjoin-delayed as a whole, but actually we have to check each side separately, since the two sides of the clause will get moved around separately if it's treated as an equivalence. Bugs of this type can be demonstrated as far back as 7.4, even though releases before 8.3 had only a very ad-hoc notion of equivalence clauses. In addition, we neglected to account for the possibility that such clauses might have nonempty nullable_relids even when not outerjoin-delayed; so the equivalence-class machinery lacked logic to compute correct nullable_relids values for clauses it constructs. This oversight was harmless before 9.2 because we were only using RestrictInfo.nullable_relids for OR clauses; but as of 9.2 it could result in pushing constructed equivalence clauses to incorrect places. (This accounts for bug #7604 from Bill MacArthur.) Fix the first problem by adding a new test check_equivalence_delay() in distribute_qual_to_rels, and fix the second one by adding code in equivclass.c and called functions to set correct nullable_relids for generated clauses. Although I believe the second part of this is not currently necessary before 9.2, I chose to back-patch it anyway, partly to keep the logic similar across branches and partly because it seems possible we might find other reasons why we need valid values of nullable_relids in the older branches. Add regression tests illustrating these problems. In 9.0 and up, also add test cases checking that we can push constants through outer joins, since we've broken that optimization before and I nearly broke it again with an overly simplistic patch for this problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72a4231f0c80f213a4fa75356dc3c6b7c7419059">http://git.postgresql.org/pg/commitdiff/72a4231f0c80f213a4fa75356dc3c6b7c7419059</a></li>

<li>Code review for inline-list patch. Make foreach macros less syntactically dangerous, and fix some typos in evidently-never-tested ones. Add missing slist_next_node and slist_head_node functions. Fix broken dlist_check code. Assorted comment improvements. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f8d74647880ef53fc674498827b8b8e6c80d125">http://git.postgresql.org/pg/commitdiff/8f8d74647880ef53fc674498827b8b8e6c80d125</a></li>

<li>Remove unnecessary "head" arguments from some dlist/slist functions. dlist_delete, dlist_insert_after, dlist_insert_before, slist_insert_after do not need access to the list header, and indeed insisting on that negates one of the main advantages of a doubly-linked list. In consequence, revert addition of "cache_bucket" field to CatCTup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc5aeca168629183e64087b1147d3c2645e49ddc">http://git.postgresql.org/pg/commitdiff/dc5aeca168629183e64087b1147d3c2645e49ddc</a></li>

<li>Further cleanup of catcache.c ilist changes. Remove useless duplicate initialization of bucket headers, don't use a dlist_mutable_iter in a performance-critical path that doesn't need it, make some other cosmetic changes for consistency's sake. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/002191a1a39c8dba8d0331c123a6c82724af6d87">http://git.postgresql.org/pg/commitdiff/002191a1a39c8dba8d0331c123a6c82724af6d87</a></li>

<li>Provide some static-assertion functionality on all compilers. On reflection (especially after noticing how many buildfarm critters have __builtin_types_compatible_p but not _Static_assert), it seems like we ought to try a bit harder to make these macros do something everywhere. The initial cut at it would have been no help to code that is compiled only on platforms without _Static_assert, for instance; and in any case not all our contributors do their initial coding on the latest gcc version. Some googling about static assertions turns up quite a bit of prior art for making it work in compilers that lack _Static_assert. The method that seems closest to our needs involves defining a struct with a bit-field that has negative width if the assertion condition fails. There seems no reliable way to get the error message string to be output, but throwing a compile error with a confusing message is better than missing the problem altogether. In the same spirit, if we don't have __builtin_types_compatible_p we can at least insist that the variable have the same width as the type. This won't catch errors such as "wrong pointer type", but it's far better than nothing. In addition to changing the macro definitions, adjust a compile-time-constant Assert in contrib/hstore to use StaticAssertStmt, so we can get some buildfarm coverage on whether that macro behaves sanely or not. There's surely more places that could be converted, but this is the first one I came across. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d0aa5d29175c539db1981be27dbbf059be6f3b1">http://git.postgresql.org/pg/commitdiff/0d0aa5d29175c539db1981be27dbbf059be6f3b1</a></li>

<li>Fix ruleutils to print "INSERT INTO foo DEFAULT VALUES" correctly. Per bug #7615 from Marko Tiikkaja. Apparently nobody ever tried this case before ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d6895051a2e53026ad0daae0ebc3cb901acc521">http://git.postgresql.org/pg/commitdiff/0d6895051a2e53026ad0daae0ebc3cb901acc521</a></li>

<li>Fix hash_search to avoid corruption of the hash table on out-of-memory. An out-of-memory error during expand_table() on a palloc-based hash table would leave a partially-initialized entry in the table. This would not be harmful for transient hash tables, since they'd get thrown away anyway at transaction abort. But for long-lived hash tables, such as the relcache hash, this would effectively corrupt the table, leading to crash or other misbehavior later. To fix, rearrange the order of operations so that table enlargement is attempted before we insert a new entry, rather than after adding it to the hash table. Problem discovered by Hitoshi Harada, though this is a bit different from his proposed patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e32f8cd14fa6c66400e8af188bea78b22cf5f56">http://git.postgresql.org/pg/commitdiff/4e32f8cd14fa6c66400e8af188bea78b22cf5f56</a></li>

<li>Fix UtilityContainsQuery() to handle CREATE TABLE Alexander Shulgin EXECUTE correctly. The code seems to have been written to handle the pre-parse-analysis representation, where an ExecuteStmt would appear directly under CreateTableAsStmt. But in reality the function is only run on already-parse-analyzed statements, so there will be a Query node in between. We'd not noticed the bug because the function is generally not used at all except in extended query protocol. Per report from Robert Haas and Rushabh Lathia. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d1abe64e62f2bb3c1a8a4181974f0b17b8bc21d">http://git.postgresql.org/pg/commitdiff/5d1abe64e62f2bb3c1a8a4181974f0b17b8bc21d</a></li>

<li>Prevent overflow in pgbench's percent-done display. Per Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca0b960eb502db429d9134b0ddf24b9e12f45257">http://git.postgresql.org/pg/commitdiff/ca0b960eb502db429d9134b0ddf24b9e12f45257</a></li>

<li>Fix pg_dump's handling of DROP DATABASE commands in --clean mode. In commit 4317e0246c645f60c39e6572644cff1cb03b4c65, I accidentally broke this behavior while rearranging code to ensure that --create wouldn't affect whether a DATABASE entry gets put into archive-format output. Thus, 9.2 would issue a DROP DATABASE command in --clean mode, which is either useless or dangerous depending on the usage scenario. It should not do that, and no longer does. A bright spot is that this refactoring makes it easy to allow the combination of --clean and --create to work sensibly, ie, emit DROP DATABASE then CREATE DATABASE before reconnecting. Ordinarily we'd consider that a feature addition and not back-patch it, but it seems silly to not include the extra couple of lines required in the 9.2 version of the code. Per report from Guillaume Lelarge, though this is slightly more extensive than his proposed patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edef20f6e1e7a02c65163f1054ce71db4d719aad">http://git.postgresql.org/pg/commitdiff/edef20f6e1e7a02c65163f1054ce71db4d719aad</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>When outputting the session id in log_line_prefix (%c) or in CSV log output mode, cause the hex digits after the period to always be at least four hex digits, with zero-padding. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22cc3b35f4d614aff83606a443da475215c6dd84">http://git.postgresql.org/pg/commitdiff/22cc3b35f4d614aff83606a443da475215c6dd84</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Clarify hash index caution and copy to CREATE INDEX docs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f9695a0cde67e76a28cde5e695e88e4b4e29137">http://git.postgresql.org/pg/commitdiff/9f9695a0cde67e76a28cde5e695e88e4b4e29137</a></li>

<li>Fix typo in previous commit 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f862a326efa3087440bc86cbfe58ea11c977068a">http://git.postgresql.org/pg/commitdiff/f862a326efa3087440bc86cbfe58ea11c977068a</a></li>

<li>Add isolation tests for DROP INDEX CONCURRENTLY. Backpatch to 9.2 to ensure bugs are fixed. Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e206744dc4bb21f583ff35893cf826a04f6c64b">http://git.postgresql.org/pg/commitdiff/4e206744dc4bb21f583ff35893cf826a04f6c64b</a></li>

<li>Revert tests for drop index concurrently. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ad72cee7ed3ac0016c716f0408811274d822f14">http://git.postgresql.org/pg/commitdiff/5ad72cee7ed3ac0016c716f0408811274d822f14</a></li>

<li>Re-think guts of DROP INDEX CONCURRENTLY. Concurrent behaviour was flawed when using a two-step process, so add an additional phase of processing to ensure concurrency for both SELECTs and INSERT/UPDATE/DELETEs. Backpatch to 9.2. Andres Freund, tweaked by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f0e480d02cde469e64d03dc8ca198cbfd597640">http://git.postgresql.org/pg/commitdiff/2f0e480d02cde469e64d03dc8ca198cbfd597640</a></li>

<li>Isolation test for DROP INDEX CONCURRENTLY for recent concurrent changes. Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/160984c8c84afb1406acd7ab71982bcae26b07fe">http://git.postgresql.org/pg/commitdiff/160984c8c84afb1406acd7ab71982bcae26b07fe</a></li>

<li>Fix orphan on cancel of drop index concurrently. Canceling DROP INDEX CONCURRENTLY during wait could allow an orphaned index to be left behind which could not be dropped. Backpatch to 9.2 Andres Freund, tested by Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da85727565818d95ee9cb16ca1c4c4e570c6e2cd">http://git.postgresql.org/pg/commitdiff/da85727565818d95ee9cb16ca1c4c4e570c6e2cd</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Embedded list interface. Provide a common implementation of embedded singly-linked and doubly-linked lists. "Embedded" in the sense that the nodes' next/previous pointers exist within some larger struct; this design choice reduces memory allocation overhead. Most of the implementation uses inlineable functions (where supported), for performance. Some existing uses of both types of lists have been converted to the new code, for demonstration purposes. Other uses can (and probably will) be converted in the future. Since dllist.c is unused after this conversion, it has been removed. Author: Andres Freund Some tweaks by me Reviewed by Tom Lane, Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a66ee69add6e129c7674a59f8c3ba010ed4c9386">http://git.postgresql.org/pg/commitdiff/a66ee69add6e129c7674a59f8c3ba010ed4c9386</a></li>

<li>pg_dump: Output functions deterministically sorted. Implementation idea from Tom Lane Author: Joel Jacobson Reviewed by Joachim Wieland 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b583b20b1c95acb621c71251150beef958bb603">http://git.postgresql.org/pg/commitdiff/7b583b20b1c95acb621c71251150beef958bb603</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use a more portable platform test. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f2be7473ba28d1e5c96a0a52b30c831d1c0d203">http://git.postgresql.org/pg/commitdiff/2f2be7473ba28d1e5c96a0a52b30c831d1c0d203</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Jeremy Evans patch to always include encoding of database in pg_dumpall.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Zoltan Boszormenyi sent in another revision of the patch to allow pg_basebackup to configure and start standby.</li>

<li>Andrew Dunstan sent in another revision of the patch to add parallel pg_dump.</li>

<li>Pavel Stehule and Shigeru HANADA traded patches to implement \gset in psql.</li>

<li>Amit Kapila sent in another revision of the patch to truncate trailing nulls from heap rows to reduce the size of the null bitmap.</li>

<li>KaiGai Kohei sent in another revision of the patch implementing row-level access control.</li>

<li>Amit Kapila sent in another revision of the patch to reduce the amount of WAL used in update operations.</li>

<li>Karl O. Pinc sent in a patch to add --truncate-tables to pg_restore.</li>

<li>Karl O. Pinc sent in a doc patch to fix an punctuation error for pg_restore.</li>

<li>Karl O. Pinc sent in a word-smithing doc patch for pg_restore.</li>

<li>Peter Geoghegan sent in another revision of the patch to use grow_memtuples with sort_mem.</li>

<li>Shigeru HANADA sent in another revision of the patch to make dropping multiple tables in a single transaction faster.</li>

<li>Kevin Grittner sent in three revisions of a patch to fix CREATE/DROP INDEX CONCURRENTLY.</li>

<li>Claudio Freire sent in two revisions of a patch to prefetch index pages for B-Tree index scans.</li>

<li>Kyotaro HORIGUCHI sent in three revisions of a patch to fix an issue in pg_stat_replication where sync_state is not being properly set.</li>

<li>Alvaro Herrera sent in another revision of the patch implementing foreign key locks.</li>

<li>Will Leinweber sent in a patch to add \watch to psql.</li>

<li>Tom Lane sent in a bug to fix the -c option in pg_dump/pg_restore.</li>

</ul>