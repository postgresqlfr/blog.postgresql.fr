---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 juillet 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/07/22/Nouvelles-hebdomadaires-de-PostgreSQL-19-juillet-2015"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>BDR 0.9.2, un syst&egrave;me de r&eacute;plication bas&eacute; sur les WAL logiques&nbsp;: <a target="_blank" href="http://bdr-project.org/docs/stable/release-0.9.2.html">http://bdr-project.org/docs/stable/release-0.9.2.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juillet</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-07/">http://archives.postgresql.org/pgsql-jobs/2015-07/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Rubens Souza de 2ndQuadrant Italie organise un meetup "Comment installer PostgreSQL sur un Raspberry PI" le jeudi 23 juillet &agrave; Prato&nbsp;: <a target="_blank" href="http://goo.gl/YYpsy7">http://goo.gl/YYpsy7</a></li>

<li>Le <em>PGDay Campinas 2015</em> aura lieu &agrave; Campinas (Br&eacute;sil) le 7 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgdaycampinas.com.br/english/">http://pgdaycampinas.com.br/english/</a></li>

<li>Le PostgresOpen 2015 aura lieu &agrave; Dallas (Texas, USA) du 16 au 18 septembre&nbsp;: <a target="_blank" href="http://2015.postgresopen.org/">http://2015.postgresopen.org/</a></li>

<li>La <em>session PostgreSQL n&deg;7</em> aura lieu le 24 septembre 2015 &agrave; Paris (France)&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015. L'appel international &agrave; conf&eacute;renciers court jusqu'au 8 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche). L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 7 ao&ucirc;t&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/#call-for-papers">http://pgbr.postgresql.org.br/2015/en/#call-for-papers</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche). L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 7 ao&ucirc;t&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150719225824.GA4164@fetter.org">http://www.postgresql.org/message-id/20150719225824.GA4164@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Bruce Momjian pushed:</p>

<ul>

<li>release notes: markup: vacuumdb is an application, not command <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/716f97f96663bdb8b64db9ed26121e2d399e06e0">http://git.postgresql.org/pg/commitdiff/716f97f96663bdb8b64db9ed26121e2d399e06e0</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Reformat code in ATPostAlterTypeParse. The code in ATPostAlterTypeParse was very deeply indented, mostly because there were two nested switch-case statements, which add a lot of indentation. Use if-else blocks instead, to make the code less indented and more readable. This is in preparation for next patch that makes some actualy changes to the function. These cosmetic parts have been separated to make it easier to see the real changes in the other patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ab9faaecb03e685aeeb16143c19c0a24d6b0048">http://git.postgresql.org/pg/commitdiff/1ab9faaecb03e685aeeb16143c19c0a24d6b0048</a></li>

<li>Make regression test output stable. In the test query I added for ALTER TABLE retaining comments, the order of the result rows was not stable, and varied across systems. Add an ORDER BY to make the order predictable. This should fix the buildfarm failures. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a56498e5f6db949a066fb125199a7389a798421">http://git.postgresql.org/pg/commitdiff/1a56498e5f6db949a066fb125199a7389a798421</a></li>

<li>Add ALTER OPERATOR command, for changing selectivity estimator functions. Other options cannot be changed, as it's not totally clear if cached plans would need to be invalidated if one of the other options change. Selectivity estimator functions only change plan costs, not correctness of plans, so those should be safe. Original patch by Uriy Zhuravlev, heavily edited by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/321eed5f0f7563a0cabb3d7a98132856287c1ad1">http://git.postgresql.org/pg/commitdiff/321eed5f0f7563a0cabb3d7a98132856287c1ad1</a></li>

<li>Fix event trigger support for the new ALTER OPERATOR command. Also, the lock on pg_operator should not be released until end of transaction. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5c0495cd4b9c78fdfc00961f4ae14c39f877f59">http://git.postgresql.org/pg/commitdiff/d5c0495cd4b9c78fdfc00961f4ae14c39f877f59</a></li>

<li>Retain comments on indexes and constraints at ALTER TABLE ... TYPE ... When a column's datatype is changed, ATExecAlterColumnType() rebuilds all the affected indexes and constraints, and the comments from the old indexes/constraints were not carried over. To fix, create a synthetic COMMENT ON command in the work queue, to re-add any comments on constraints. For indexes, there's a comment field in IndexStmt that is used. This fixes bug #13126, reported by Kirill Simonov. Original patch by Michael Paquier, reviewed by Petr Jelinek and me. This bug is present in all versions, but only backpatch to 9.5. Given how minor the issue is, it doesn't seem worth the work and risk to backpatch further than that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e42375fc8124e99c33fa330c53c2b4b502fa0baf">http://git.postgresql.org/pg/commitdiff/e42375fc8124e99c33fa330c53c2b4b502fa0baf</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Prevent pgstattuple() from reporting BRIN as unknown index. Also this patch removes obsolete comment. Back-patch to 9.5 where BRIN index was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/705d397cd9cede1fd6fb1260d1689570bf6142d4">http://git.postgresql.org/pg/commitdiff/705d397cd9cede1fd6fb1260d1689570bf6142d4</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Mention table_rewrite as valid event trigger tag. This was forgotten in 618c9430a8. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1b667172242aaffa33f91360d9448fe98b65697">http://git.postgresql.org/pg/commitdiff/b1b667172242aaffa33f91360d9448fe98b65697</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Remove regression test added on auto-pilot. Test does not match the comment which precedes it. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa6b2e629cb5debc432e0dcca8ffdcb8d8e6da39">http://git.postgresql.org/pg/commitdiff/aa6b2e629cb5debc432e0dcca8ffdcb8d8e6da39</a></li>

<li>Add new function pg_notification_queue_usage. This tells you what fraction of NOTIFY's queue is currently filled. Brendan Jurd, reviewed by Merlin Moncure and Gurjeet Singh. A few further tweaks by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a04bb65f70dafdf462e0478ad19e6de56df89bfc">http://git.postgresql.org/pg/commitdiff/a04bb65f70dafdf462e0478ad19e6de56df89bfc</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>AIX: Link the postgres executable with -Wl,-brtllib. This allows PostgreSQL modules and their dependencies to have undefined symbols, resolved at runtime. Perl module shared objects rely on that in Perl 5.8.0 and later. This fixes the crash when PL/PerlU loads such modules, as the hstore_plperl test suite does. Module authors can link using -Wl,-G to permit undefined symbols; by default, linking will fail as it has. Back-patch to 9.0 (all supported versions). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bcd7c41206faf6d9654aa6e3766f87770d4fb305">http://git.postgresql.org/pg/commitdiff/bcd7c41206faf6d9654aa6e3766f87770d4fb305</a></li>

<li>MinGW: Link ltree_plpython with plpython. The MSVC build system already did this, and building against Python 3 requires it. Back-patch to 9.5, where the module was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/736c1f238b3eeaf0f1cecf1753eb5194367fbad9">http://git.postgresql.org/pg/commitdiff/736c1f238b3eeaf0f1cecf1753eb5194367fbad9</a></li>

<li>AIX: Link TRANSFORM modules with their dependencies. The result closely resembles linking of these modules for the "win32" port. Augment the $(exports_file) header so the file is also usable as an import file. Unfortunately, relocating an AIX installation will now require adding $(pkglibdir) to LD_LIBRARY_PATH. Back-patch to 9.5, where the modules were introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7193436744819270eeb772f6ada4ec7a388c0b5f">http://git.postgresql.org/pg/commitdiff/7193436744819270eeb772f6ada4ec7a388c0b5f</a></li>

<li>AIX: Test the -qlonglong option before use. xlc provides "long long" unconditionally at C99-compatible language levels, and this option provokes a warning. The warning interferes with "configure" tests that fail in response to any warning. Notably, before commit 85a2a8903f7e9151793308d0638621003aded5ae, it interfered with the test for -qnoansialias. Back-patch to 9.0 (all supported versions). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43d89a23d59c487bc9258fad7a6187864cb8c0c0">http://git.postgresql.org/pg/commitdiff/43d89a23d59c487bc9258fad7a6187864cb8c0c0</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix copy/past error in comment. David Christensen <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64c9d8a6c8810796ab9f09d435c248ea516c5f3c">http://git.postgresql.org/pg/commitdiff/64c9d8a6c8810796ab9f09d435c248ea516c5f3c</a></li>

<li>Fix spelling error. David Rowley <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/828df727a673d718265766611e59aa5189d102ba">http://git.postgresql.org/pg/commitdiff/828df727a673d718265766611e59aa5189d102ba</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix a low-probability crash in our qsort implementation. It's standard for quicksort implementations, after having partitioned the input into two subgroups, to recurse to process the smaller partition and then handle the larger partition by iterating. This method guarantees that no more than log2(N) levels of recursion can be needed. However, Bentley and McIlroy argued that checking to see which partition is smaller isn't worth the cycles, and so their code doesn't do that but just always recurses on the left partition. In most cases that's fine; but with worst-case input we might need O(N) levels of recursion, and that means that qsort could be driven to stack overflow. Such an overflow seems to be the only explanation for today's report from Yiqing Jin of a SIGSEGV in med3_tuple while creating an index of a couple billion entries with a very large maintenance_work_mem setting. Therefore, let's spend the few additional cycles and lines of code needed to choose the smaller partition for recursion. Also, fix up the qsort code so that it properly uses size_t not int for some intermediate values representing numbers of items. This would only be a live risk when sorting more than INT_MAX bytes (in qsort/qsort_arg) or tuples (in qsort_tuple), which I believe would never happen with any caller in the current core code --- but perhaps it could happen with call sites in third-party modules? In any case, this is trouble waiting to happen, and the corrected code is probably if anything shorter and faster than before, since it removes sign-extension steps that had to happen when converting between int and size_t. In passing, move a couple of CHECK_FOR_INTERRUPTS() calls so that it's not necessary to preserve the value of "r" across them, and prettify the output of gen_qsort_tuple.pl a little. Back-patch to all supported branches. The odds of hitting this issue are probably higher in 9.4 and up than before, due to the new ability to allocate sort workspaces exceeding 1GB, but there's no good reason to believe that it's impossible to crash older branches this way. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d6077abf9d6efd992a59f05ef5aba981ea32096">http://git.postgresql.org/pg/commitdiff/9d6077abf9d6efd992a59f05ef5aba981ea32096</a></li>

<li>Fix entirely broken permissions test in new alter_operator regression test. Not only did this test fail to test what it was supposed to test, but it left a user definition lying around, which caused subsequent runs of the regression tests to fail. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/266e771435bfed648138f6b684c895c8225dc8fc">http://git.postgresql.org/pg/commitdiff/266e771435bfed648138f6b684c895c8225dc8fc</a></li>

<li>Repair mishandling of cached cast-expression trees in plpgsql. In commit 1345cc67bbb014209714af32b5681b1e11eaf964, I introduced caching of expressions representing type-cast operations into plpgsql. However, I supposed that I could cache both the expression trees and the evaluation state trees derived from them for the life of the session. This doesn't work, because we execute the expressions in plpgsql's simple_eval_estate, which has an ecxt_per_query_memory that is only transaction-lifespan. Therefore we can end up putting pointers into the evaluation state tree that point to transaction-lifespan memory; in particular this happens if the cast expression calls a SQL-language function, as reported by Geoff Winkless. The minimum-risk fix seems to be to treat the state trees the same way we do for "simple expression" trees in plpgsql, ie create them in the simple_eval_estate's ecxt_per_query_memory, which means recreating them once per transaction. Since I had to introduce bookkeeping overhead for that anyway, I bought back some of the added cost by sharing the read-only expression trees across all functions in the session, instead of using a per-function table as originally. The simple-expression bookkeeping takes care of the recursive-usage risk that I was concerned about avoiding before. At some point we should take a harder look at how all this works, and see if we can't reduce the amount of tree reinitialization needed. But that won't happen for 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fc94a5bab4d0155db5d15197ed3bd8cb435eb21">http://git.postgresql.org/pg/commitdiff/0fc94a5bab4d0155db5d15197ed3bd8cb435eb21</a></li>

<li>Make WaitLatchOrSocket's timeout detection more robust. In the previous coding, timeout would be noticed and reported only when poll() or socket() returned zero (or the equivalent behavior on Windows). Ordinarily that should work well enough, but it seems conceivable that we could get into a state where poll() always returns a nonzero value --- for example, if it is noticing a condition on one of the file descriptors that we do not think is reason to exit the loop. If that happened, we'd be in a busy-wait loop that would fail to terminate even when the timeout expires. We can make this more robust at essentially no cost, by deciding to exit of our own accord if we compute a zero or negative time-remaining-to-wait. Previously the code noted this but just clamped the time-remaining to zero, expecting that we'd detect timeout on the next loop iteration. Back-patch to 9.2. While 9.1 had a version of WaitLatchOrSocket, it was primitive compared to later versions, and did not guarantee reliable detection of timeouts anyway. (Essentially, this is a refinement of commit 3e7fdcffd6f77187, which was back-patched only as far as 9.2.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/576a95b3a1ce465066c38d6859ccf64fca656e49">http://git.postgresql.org/pg/commitdiff/576a95b3a1ce465066c38d6859ccf64fca656e49</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Support JSON negative array subscripts everywhere Previously, there was an inconsistency across json/jsonb operators that operate on datums containing JSON arrays -- only some operators supported negative array count-from-the-end subscripting. Specifically, only a new-to-9.5 jsonb deletion operator had support (the new "jsonb - integer" operator). This inconsistency seemed likely to be counter-intuitive to users. To fix, allow all places where the user can supply an integer subscript to accept a negative subscript value, including path-orientated operators and functions, as well as other extraction operators. This will need to be called out as an incompatibility in the 9.5 release notes, since it's possible that users are relying on certain established extraction operators changed here yielding NULL in the event of a negative subscript. For the json type, this requires adding a way of cheaply getting the total JSON array element count ahead of time when parsing arrays with a negative subscript involved, necessitating an ad-hoc lex and parse. This is followed by a "conversion" from a negative subscript to its equivalent positive-wise value using the count. From there on, it's as if a positive-wise value was originally provided. Note that there is still a minor inconsistency here across jsonb deletion operators. Unlike the aforementioned new "-" deletion operator that accepts an integer on its right hand side, the new "#-" path orientated deletion variant does not throw an error when it appears like an array subscript (input that could be recognized by as an integer literal) is being used on an object, which is wrong-headed. The reason for not being stricter is that it could be the case that an object pair happens to have a key value that looks like an integer; in general, these two possibilities are impossible to differentiate with rhs path text[] argument elements. However, we still don't allow the "#-" path-orientated deletion operator to perform array-style subscripting. Rather, we just return the original left operand value in the event of a negative subscript (which seems analogous to how the established "jsonb/json #&gt; text[]" path-orientated operator may yield NULL in the event of an invalid subscript). In passing, make SetArrayPath() stricter about not accepting cases where there is trailing non-numeric garbage bytes rather than a clean NUL byte. This means, for example, that strings like "10e10" are now not accepted as an array subscript of 10 by some new-to-9.5 path-orientated jsonb operators (e.g. the new #- operator). Finally, remove dead code for jsonb subscript deletion; arguably, this should have been done in commit b81c7b409. Peter Geoghegan and Andrew Dunstan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e02d44b8a74810341c90add4cd49e428b9d406b9">http://git.postgresql.org/pg/commitdiff/e02d44b8a74810341c90add4cd49e428b9d406b9</a></li>

<li>Release note compatibility item. Note that json and jsonb extraction operators no longer consider a negative subscript to be invalid. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/473865048517c7808ddcf2299d054d8fe30fc6d5">http://git.postgresql.org/pg/commitdiff/473865048517c7808ddcf2299d054d8fe30fc6d5</a></li>

<li>Enable transforms modules to build and test on Cygwin. This still doesn't work correctly with Python 3, but I am committing this so we can get Cygwin buildfarm members building with Python 2. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00eff86cb8c2c9de9197197b4176362d1433f8f6">http://git.postgresql.org/pg/commitdiff/00eff86cb8c2c9de9197197b4176362d1433f8f6</a></li>

<li>Remove dead code. Defect noticed by Coverity. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9aa663463bbf123e9d38dab88eeaef981fbc6caf">http://git.postgresql.org/pg/commitdiff/9aa663463bbf123e9d38dab88eeaef981fbc6caf</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Haribabu Kommi sent in two more revisions of a patch to help improve the performance of vacuum truncation scans.</p>

<p>Dinesh Kumar sent in a patch to add an SQL function to report a log message.</p>

<p>Jeevan Chalke sent in a patch to fix some infelicities in GROUPING SETS.</p>

<p>Jeff Janes sent in another revision of a patch to make pg_trgm work better with GIN.</p>

<p>Amit Kapila sent in another revision of a patch to add machinery for assessing parallel safety.</p>

<p>Paul Ramsey sent in two revisions of a patch to allow specifying extensions understood to be installed in PostgreSQL foreign servers.</p>

<p>Jeevan Chalke, Kyotaro HORIGUCHI, and Andrew Gierth traded patches to fix an issue with GROUPING SETS that resulted in the not especially helpful, "unrecognized node type" error.</p>

<p>Sameer Thakur and Rahila Syed traded patches to provide a VACUUM progress checker.</p>

<p>Heikki Linnakangas sent in a patch to fix LWLock "variable" support broken by the lwlock scalability patch.</p>

<p>SAWADA Masahiko sent in another revision of a patch to avoid freezing very large tables without need.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to implement multivariate statistics.</p>

<p>Michael Paquier sent in a patch to ensure that pg_rewind ignores xlog.</p>

<p>Peter Geoghegan sent in two revisions of a patch to use software-based memory prefetching while sequentially fetching from SortTuple array and tuplestore.</p>

<p>Jeevan Chalke sent in a patch to fix a collation bug in GROUPING SETS.</p>

<p>Brendan Jurd sent in another revision of a patch to add pg_notification_queue_usage().</p>

<p>Pavel Stehule sent in a patch to add tab completion to DROP POLICY in psql.</p>

<p>Fabien COELHO sent in two revisions of a patch to add per-script statistics and other improvements to pgbench.</p>

<p>Michael Paquier sent in another revision of a patch to retain comments on indexes and constraints after issuing ALTER TABLE.</p>

<p>Petr Jelinek sent in another revision of a patch to allow adding an extension including its dependencies.</p>

<p>Julien Rouhaud sent in a patch to allow setting effective_io_concurrency per tablespace.</p>

<p>&Aacute;lvaro Herrera sent in a patch to ensure that breakage of object_class be obvious.</p>

<p>Andres Freund sent in two revisions of a patch to make heap extension saner.</p>

<p>Pavel Stehule sent in another revision of a patch to add a --strict option to pg_dump.</p>