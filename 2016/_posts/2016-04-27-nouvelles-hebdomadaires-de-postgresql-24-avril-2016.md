---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 avril 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/04/27/Nouvelles-hebdomadaires-de-PostgreSQL-24-avril-2016"
---


<p>Session PostgreSQL le 22 septembre 2016 &agrave; Lyon (France). La date limite de candidature est le 20 mai : envoyez vos propositions &agrave; call-for-paper AT postgresql-sessions DOT org.</p>

<p>Le PostgresOpen 2016 aura lieu &agrave; Dallas (Texas, USA) du 13 au 16 septembre. L'appel &agrave; conf&eacute;renciers &agrave; &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="https://2016.postgresopen.org/callforpapers/">https://2016.postgresopen.org/callforpapers/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>Benetl 4.7, un ETL gratuit pour PostgreSQL&nbsp;: <a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>pgBackRest 1.0, solution simple et fiable de sauvegarde/restauration pour PostgreSQL&nbsp;: <a target="_blank" href="http://www.pgbackrest.org/">http://www.pgbackrest.org/</a></li>

<li>PGroonga 1.0.6, une plate-forme de recherche plein texte pour toutes les langues&nbsp;: <a target="_blank" href="http://groonga.org/en/blog/2016/04/15/pgroonga-1.0.6.html">http://groonga.org/en/blog/2016/04/15/pgroonga-1.0.6.html</a></li>

<li>Postgres-XL 9.5 R1&nbsp;: <a target="_blank" href="http://www.postgres-xl.org/2016/04/postgres-xl-9-5-r1-released/">http://www.postgres-xl.org/2016/04/postgres-xl-9-5-r1-released/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en avril</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-04/">http://archives.postgresql.org/pgsql-jobs/2016-04/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>FOSS4G NA (<em>Free and Open Source Software for Geospatial - North America</em>) se tiendra &agrave; Raleigh, en Caroline du Nord, du 2 au 5 mai 2016&nbsp;: <a target="_blank" href="https://2016.foss4g-na.org/">https://2016.foss4g-na.org/</a></li>

<li>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></li>

<li>Le PGDay suisse sera, cette ann&eacute;e, tenue &agrave; l'Universit&eacute; des Sciences Appliqu&eacute;es (HSR) de Rapperswil le 24 juin 2016&nbsp;: <a target="_blank" href="http://www.pgday.ch/">http://www.pgday.ch/</a></li>

<li>"5432 ... Meet us!" aura lieu &agrave; Milan (Italie) les 28 &amp; 29 juin 2016. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://5432meet.us/">http://5432meet.us/</a></li>

<li>Le <em>PG Day UK</em> aura lieu le 5 juillet 2016&nbsp;: <a target="_blank" href="http://www.pgconf.uk/">http://www.pgconf.uk/</a></li>

<li>Session PostgreSQL le 22 septembre 2016 &agrave; Lyon (France). La date limite de candidature est le 20 mai : envoyez vos propositions &agrave; call-for-paper AT postgresql-sessions DOT org.</li>

<li>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160424215058.GA9189@fetter.org">http://www.postgresql.org/message-id/20160424215058.GA9189@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Document that sequences can also be extension configuration tables. From: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d460c7cc0fd43a7f7184818c67705a878e938b2d">http://git.postgresql.org/pg/commitdiff/d460c7cc0fd43a7f7184818c67705a878e938b2d</a></li>

<li>doc: Fix typos. From: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b87b2f4bda1a3b98f8dea867b8bc419ace7a9ea9">http://git.postgresql.org/pg/commitdiff/b87b2f4bda1a3b98f8dea867b8bc419ace7a9ea9</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix typo in docs. Artur Zakirov <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ce8307bd4d6028371c6e8b51bdc6ad260baa03a">http://git.postgresql.org/pg/commitdiff/8ce8307bd4d6028371c6e8b51bdc6ad260baa03a</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Further reduce the number of semaphores used under --disable-spinlocks. Per discussion, there doesn't seem to be much value in having NUM_SPINLOCK_SEMAPHORES set to 1024: under any scenario where you are running more than a few backends concurrently, you really had better have a real spinlock implementation if you want tolerable performance. And 1024 semaphores is a sizable fraction of the system-wide SysV semaphore limit on many platforms. Therefore, reduce this setting's default value to 128 to make it less likely to cause out-of-semaphores problems. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75c24d0f7491f77dfbc0acdf6c18439f288353ef">http://git.postgresql.org/pg/commitdiff/75c24d0f7491f77dfbc0acdf6c18439f288353ef</a></li>

<li>Make partition-lock-release coding more transparent in BufferAlloc(). Coverity complained that oldPartitionLock was possibly dereferenced after having been set to NULL. That actually can't happen, because we'd only use it if (oldFlags &amp; BM_TAG_VALID) is true. But nonetheless Coverity is justified in complaining, because at line 1275 we actually overwrite oldFlags, and then still expect its BM_TAG_VALID bit to be a safe guide to whether to release the oldPartitionLock. Thus, the code would be incorrect if someone else had changed the buffer's BM_TAG_VALID flag meanwhile. That should not happen, since we hold pin on the buffer throughout this sequence, but it's starting to look like a rather shaky chain of logic. And there's no need for such assumptions, because we can simply replace the (oldFlags &amp; BM_TAG_VALID) tests with (oldPartitionLock != NULL), which has identical results and makes it plain to all comers that we don't dereference a null pointer. A small side benefit is that the range of liveness of oldFlags is greatly reduced, possibly allowing the compiler to save a register. This is just cleanup, not an actual bug fix, so there seems no need for a back-patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0382e2d7e330de13e15cea0921a95faa9da3570">http://git.postgresql.org/pg/commitdiff/a0382e2d7e330de13e15cea0921a95faa9da3570</a></li>

<li>Improve regression tests for degree-based trigonometric functions. Print the actual value of each function result that's expected to be exact, rather than merely emitting a NULL if it's not right. Although we print these with extra_float_digits = 3, we should not trust that the platform will produce a result visibly different from the expected value if it's off only in the last place; hence, also include comparisons against the exact values as before. This is a bit bulkier and uglier than the previous printout, but it will provide more information and be easier to interpret if there's a test failure. Discussion: &lt;18241.1461073100@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4db0d2d2fe935e086dfd26c00f707dab298b443c">http://git.postgresql.org/pg/commitdiff/4db0d2d2fe935e086dfd26c00f707dab298b443c</a></li>

<li>Fix memory leak and other bugs in ginPlaceToPage() &amp; subroutines. Commit 36a35c550ac114ca turned the interface between ginPlaceToPage and its subroutines in gindatapage.c and ginentrypage.c into a royal mess: page-update critical sections were started in one place and finished in another place not even in the same file, and the very same subroutine might return having started a critical section or not. Subsequent patches band-aided over some of the problems with this design by making things even messier. One user-visible resulting problem is memory leaks caused by the need for the subroutines to allocate storage that would survive until ginPlaceToPage calls XLogInsert (as reported by Julien Rouhaud). This would not typically be noticeable during retail index updates. It could be visible in a GIN index build, in the form of memory consumption swelling to several times the commanded maintenance_work_mem. Another rather nasty problem is that in the internal-page-splitting code path, we would clear the child page's GIN_INCOMPLETE_SPLIT flag well before entering the critical section that it's supposed to be cleared in; a failure in between would leave the index in a corrupt state. There were also assorted coding-rule violations with little immediate consequence but possible long-term hazards, such as beginning an XLogInsert sequence before entering a critical section, or calling elog(DEBUG) inside a critical section. To fix, redefine the API between ginPlaceToPage() and its subroutines by splitting the subroutines into two parts. The "beginPlaceToPage" subroutine does what can be done outside a critical section, including full computation of the result pages into temporary storage when we're going to split the target page. The "execPlaceToPage" subroutine is called within a critical section established by ginPlaceToPage(), and it handles the actual page update in the non-split code path. The critical section, as well as the XLOG insertion call sequence, are both now always started and finished in ginPlaceToPage(). Also, make ginPlaceToPage() create and work in a short-lived memory context to eliminate the leakage problem. (Since a short-lived memory context had been getting created in the most common code path in the subroutines, this shouldn't cause any noticeable performance penalty; we're just moving the overhead up one call level.) In passing, fix a bunch of comments that had gone unmaintained throughout all this klugery. Report: &lt;571276DD.5050303@dalibo.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bde361fef5ea3c65074a0c95c724fae5ac8a1bb5">http://git.postgresql.org/pg/commitdiff/bde361fef5ea3c65074a0c95c724fae5ac8a1bb5</a></li>

<li>Honor PGCTLTIMEOUT environment variable for pg_regress' startup wait. In commit 2ffa86962077c588 we made pg_ctl recognize an environment variable PGCTLTIMEOUT to set the default timeout for starting and stopping the postmaster. However, pg_regress uses pg_ctl only for the "stop" end of that; it has bespoke code for starting the postmaster, and that code has historically had a hard-wired 60-second timeout. Further buildfarm experience says it'd be a good idea if that timeout were also controlled by PGCTLTIMEOUT, so let's make it so. Like the previous patch, back-patch to all active branches. Discussion: &lt;13969.1461191936@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbabb70f35bb0e5bac84b9f15ecadc82868ad9f9">http://git.postgresql.org/pg/commitdiff/cbabb70f35bb0e5bac84b9f15ecadc82868ad9f9</a></li>

<li>PGDLLIMPORT-ify old_snapshot_threshold. Revert commit 7cb1db1d9599f0a09d6920d2149d956ef6d88b0e, which represented a misunderstanding of the problem (if snapmgr.h weren't already included in bufmgr.h, things wouldn't compile anywhere). Instead install what I think is the real fix. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14216649f3dc8bd9839702440dd593e958b0920b">http://git.postgresql.org/pg/commitdiff/14216649f3dc8bd9839702440dd593e958b0920b</a></li>

<li>Fix ruleutils.c's dumping of ScalarArrayOpExpr containing an EXPR_SUBLINK. When we shoehorned "x op ANY (array)" into the SQL syntax, we created a fundamental ambiguity as to the proper treatment of a sub-SELECT on the righthand side: perhaps what's meant is to compare x against each row of the sub-SELECT's result, or perhaps the sub-SELECT is meant as a scalar sub-SELECT that delivers a single array value whose members should be compared against x. The grammar resolves it as the former case whenever the RHS is a select_with_parens, making the latter case hard to reach --- but you can get at it, with tricks such as attaching a no-op cast to the sub-SELECT. Parse analysis would throw away the no-op cast, leaving a parsetree with an EXPR_SUBLINK SubLink directly under a ScalarArrayOpExpr. ruleutils.c was not clued in on this fine point, and would naively emit "x op ANY ((SELECT ...))", which would be parsed as the first alternative, typically leading to errors like "operator does not exist: text = text[]" during dump/reload of a view or rule containing such a construct. To fix, emit a no-op cast when dumping such a parsetree. This might well be exactly what the user wrote to get the construct accepted in the first place; and even if she got there with some other dodge, it is a valid representation of the parsetree. Per report from Karl Czajkowski. He mentioned only a case involving RLS policies, but actually the problem is very old, so back-patch to all supported branches. Report: &lt;20160421001832.GB7976@moraine.isi.edu&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f7c85b820814810f985a270e92cde4c12ceded4">http://git.postgresql.org/pg/commitdiff/1f7c85b820814810f985a270e92cde4c12ceded4</a></li>

<li>Remove dead code in win32.h. There's no longer a need for the MSVC-version-specific code stanza that forcibly redefines errno code symbols, because since commit 73838b52 we're unconditionally redefining them in the stanza before this one anyway. Now it's merely confusing and ugly, so get rid of it; and improve the comment that explains what's going on here. Although this is just cosmetic, back-patch anyway since I'm intending to back-patch some less-cosmetic changes in this same hunk of code. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e54528155a3c4159b01327534691c3342a371cab">http://git.postgresql.org/pg/commitdiff/e54528155a3c4159b01327534691c3342a371cab</a></li>

<li>Improve TranslateSocketError() to handle more Windows error codes. The coverage was rather lean for cases that bind() or listen() might return. Add entries for everything that there's a direct equivalent for in the set of Unix errnos that elog.c has heard of. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/125ad539a275db5ab8f4647828b80a16d02eabd2">http://git.postgresql.org/pg/commitdiff/125ad539a275db5ab8f4647828b80a16d02eabd2</a></li>

<li>Fix planner failure with full join in RHS of left join. Given a left join containing a full join in its righthand side, with the left join's joinclause referencing only one side of the full join (in a non-strict fashion, so that the full join doesn't get simplified), the planner could fail with "failed to build any N-way joins" or related errors. This happened because the full join was seen as overlapping the left join's RHS, and then recent changes within join_is_legal() caused that function to conclude that the full join couldn't validly be formed. Rather than try to rejigger join_is_legal() yet more to allow this, I think it's better to fix initsplan.c so that the required join order is explicit in the SpecialJoinInfo data structure. The previous coding there essentially ignored full joins, relying on the fact that we don't flatten them in the joinlist data structure to preserve their ordering. That's sufficient to prevent a wrong plan from being formed, but as this example shows, it's not sufficient to ensure that the right plan will be formed. We need to work a bit harder to ensure that the right plan looks sane according to the SpecialJoinInfos. Per bug #14105 from Vojtech Rylko. This was apparently induced by commit 8703059c6 (though now that I've seen it, I wonder whether there are related cases that could have failed before that); so back-patch to all active branches. Unfortunately, that patch also went into 9.0, so this bug is a regression that won't be fixed in that branch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80f66a9ad06eafa91ffc5ff19c725c7f393c242e">http://git.postgresql.org/pg/commitdiff/80f66a9ad06eafa91ffc5ff19c725c7f393c242e</a></li>

<li>Fix unexpected side-effects of operator_precedence_warning. The implementation of that feature involves injecting nodes into the raw parsetree where explicit parentheses appear. Various places in parse_expr.c that test to see "is this child node of type Foo" need to look through such nodes, else we'll get different behavior when operator_precedence_warning is on than when it is off. Note that we only need to handle this when testing untransformed child nodes, since the AEXPR_PAREN nodes will be gone anyway after transformExprRecurse. Per report from Scott Ribe and additional code-reading. Back-patch to 9.5 where this feature was added. Report: &lt;ED37E303-1B0A-4CD8-8E1E-B9C4C2DD9A17@elevated-dev.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/abb164655c703a5013b7fcf83f855a071895dc91">http://git.postgresql.org/pg/commitdiff/abb164655c703a5013b7fcf83f855a071895dc91</a></li>

<li>Convert contrib/seg's bool-returning SQL functions to V1 call convention. It appears that we can no longer get away with using V0 call convention for bool-returning functions in newer versions of MSVC. The compiler seems to generate code that doesn't clear the higher-order bits of the result register, causing the bool result Datum to often read as "true" when "false" was intended. This is not very surprising, since the function thinks it's returning a bool-width result but fmgr_oldstyle assumes that V0 functions return "char *"; what's surprising is that that hack worked for so long on so many platforms. The only functions of this description in core+contrib are in contrib/seg, which we'd intentionally left mostly in V0 style to serve as a warning canary if V0 call convention breaks. We could imagine hacking things so that they're still V0 (we'd have to redeclare the bool-returning functions as returning some suitably wide integer type, like size_t, at the C level). But on the whole it seems better to convert 'em to V1. We can still leave the pointer- and int-returning functions in V0 style, so that the test coverage isn't gone entirely. Back-patch to 9.5, since our intention is to support VS2015 in 9.5 and later. There's no SQL-level change in the functions' behavior so back-patching should be safe enough. Discussion: &lt;22094.1461273324@sss.pgh.pa.us&gt; Michael Paquier, adjusted some by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8e81afc60093b199a128ccdfbb692ced8e0c9cd">http://git.postgresql.org/pg/commitdiff/c8e81afc60093b199a128ccdfbb692ced8e0c9cd</a></li>

<li>Rename strtoi() to strtoint(). NetBSD has seen fit to invent a libc function named strtoi(), which conflicts with the long-established static functions of the same name in datetime.c and ecpg's interval.c. While muttering darkly about intrusions on application namespace, we'll rename our functions to avoid the conflict. Back-patch to all supported branches, since this would affect attempts to build any of them on recent NetBSD. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ab3595e5bb53a8fc2cd231320b1af1ae3ed68e0">http://git.postgresql.org/pg/commitdiff/0ab3595e5bb53a8fc2cd231320b1af1ae3ed68e0</a></li>

<li>Improve PostgresNode.pm's logic for detecting already-in-use ports. Buildfarm members bowerbird and jacana have shown intermittent "could not bind IPv4 socket" failures in the BinInstallCheck stage since mid-December, shortly after commits 1caef31d9e550408 and 9821492ee417a591 changed the logic for selecting which port to use in temporary installations. One plausible explanation is that we are randomly selecting ports that are already in use for some non-Postgres purpose. Although the code tried to defend against already-in-use ports, it used pg_isready to probe the port which is quite unhelpful: if some non-Postgres server responds at the given address, pg_isready will generally say "no response", leading to exactly the wrong conclusion about whether the port is free. Instead, let's use a simple TCP connect() call to see if anything answers without making assumptions about what it is. Note that this means there's no direct check for a conflicting Unix socket, but that should be okay because there should be no other Unix sockets in use in the temporary socket directory created for a test run. This is only a partial solution for the TCP case, since if the port number is in use for an outgoing connection rather than a listening socket, we'll fail to detect that. We could try to bind() to the proposed port as a means of detecting that case, but that would introduce its own failure modes, since the system might consider the address to remain reserved for some period of time after we drop the bound socket. Close study of the errors returned by bowerbird and jacana suggests that what we're seeing there may be conflicts with listening not outgoing sockets, so let's try this and see if it improves matters. It's certainly better than what's there now, in any case. Michael Paquier, adjusted by me to work on non-Windows as well as Windows <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fab84c7787f25756a9d7bcb8bc89145d237e8e85">http://git.postgresql.org/pg/commitdiff/fab84c7787f25756a9d7bcb8bc89145d237e8e85</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Revert no-op changes to BufferGetPage(). The reverted changes were intended to force a choice of whether any newly-added BufferGetPage() calls needed to be accompanied by a test of the snapshot age, to support the "snapshot too old" feature. Such an accompanying test is needed in about 7% of the cases, where the page is being used as part of a scan rather than positioning for other purposes (such as DML or vacuuming). The additional effort required for back-patching, and the doubt whether the intended benefit would really be there, have indicated it is best just to rely on developers to do the right thing based on comments and existing usage, as we do with many other conventions. This change should have little or no effect on generated executable code. Motivated by the back-patching pain of Tom Lane and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a343e223a5c33a7283a6d8b255c9dbc48dbc5061">http://git.postgresql.org/pg/commitdiff/a343e223a5c33a7283a6d8b255c9dbc48dbc5061</a></li>

<li>Inline initial comparisons in TestForOldSnapshot(). Even with old_snapshot_threshold = -1 (which disables the "snapshot too old" feature), performance regressions were seen at moderate to high concurrency. For example, a one-socket, four-core system running 200 connections at saturation could see up to a 2.3% regression, with larger regressions possible on NUMA machines. By inlining the early (smaller, faster) tests in the TestForOldSnapshot() function, the i7 case dropped to a 0.2% regression, which could easily just be noise, and is clearly an improvement. Further testing will show whether more is needed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11e178d0dc4bc2328ae4759090b3c48b07023fab">http://git.postgresql.org/pg/commitdiff/11e178d0dc4bc2328ae4759090b3c48b07023fab</a></li>

<li>Include snapmgr.h in blscan.c. Windows builds on buildfarm are failing because old_snapshot_threshold is not found in the bloom filter contrib module. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7cb1db1d9599f0a09d6920d2149d956ef6d88b0e">http://git.postgresql.org/pg/commitdiff/7cb1db1d9599f0a09d6920d2149d956ef6d88b0e</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Update backup documentation for new APIs. This includes the rest of the documentation that was not included in 7117685. A larger restructure would still be wanted, but with this commit the documentation of the new features is complete. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfb863f20a2a005ac89f393265d4c37ad9baab41">http://git.postgresql.org/pg/commitdiff/cfb863f20a2a005ac89f393265d4c37ad9baab41</a></li>

<li>Add putenv support for msvcrt from Visual Studio 2013. This was missed when VS 2013 support was added. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f633b404cb3be6139f8dfdea00538489ffef9ab">http://git.postgresql.org/pg/commitdiff/9f633b404cb3be6139f8dfdea00538489ffef9ab</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Forbid parallel Hash Right Join or Hash Full Join. That won't work. You'll get bogus null-extended rows. Mithun Cy <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c75e1a36b6b2f3ad9f76ae661f42586c92c6f7c">http://git.postgresql.org/pg/commitdiff/9c75e1a36b6b2f3ad9f76ae661f42586c92c6f7c</a></li>

<li>Add pg_dump support for the new PARALLEL option for aggregates. This was an oversight in commit 41ea0c23761ca108e2f08f6e3151e3cb1f9652a1. Fabr&iacute;zio de Royes Mello, per a report from Tushar Ahuja <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4e0f183826e85fd43248d5047eddf393c3d8a30">http://git.postgresql.org/pg/commitdiff/b4e0f183826e85fd43248d5047eddf393c3d8a30</a></li>

<li>postgres_fdw: Don't push down certain full joins. If there's a filter condition on either side of a full outer join, it is neither correct to attach it to the join's ON clause nor to throw it into the toplevel WHERE clause. Just don't push down the join in that case. To maximize the number of cases where we can still push down full joins, push inner join conditions into the ON clause at the first opportunity rather than postponing them to the top-level WHERE clause. This produces nicer SQL, anyway. This bug was introduced in e4106b2528727c4b48639c0e12bf2f70a766b910. Ashutosh Bapat, per report from Rajkumar Raghuwanshi. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b1f9ce1d9e8dcae2bcd93b2becffaba5e4f3049">http://git.postgresql.org/pg/commitdiff/5b1f9ce1d9e8dcae2bcd93b2becffaba5e4f3049</a></li>

<li>Allow queries submitted by postgres_fdw to be canceled. This fixes a problem which is not new, but with the advent of direct foreign table modification in 0bf3ae88af330496517722e391e7c975e6bad219, it's somewhat more likely to be annoying than previously. So, arrange for a local query cancelation to propagate to the remote side. Michael Paquier, reviewed by Etsuro Fujita. Original report by Thom Brown. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f039eaac7131ef2a4cf63a10cf98486f8bcd09d2">http://git.postgresql.org/pg/commitdiff/f039eaac7131ef2a4cf63a10cf98486f8bcd09d2</a></li>

<li>Fix assorted defects in 09adc9a8c09c9640de05c7023b27fb83c761e91c. That commit increased all shared memory allocations to the next higher multiple of PG_CACHE_LINE_SIZE, but it didn't ensure that allocation started on a cache line boundary. It also failed to remove a couple other pieces of now-useless code. BUFFERALIGN() is perhaps obsolete at this point, and likely should be removed at some point, too, but that seems like it can be left to a future cleanup. Mistakes all pointed out by Andres Freund. The patch is mine, with a few extra assertions which I adopted from his version of this fix. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f84280ae94b43b75dcf32aef433545335e7bb16">http://git.postgresql.org/pg/commitdiff/9f84280ae94b43b75dcf32aef433545335e7bb16</a></li>

<li>Comment improvements for ForeignPath. It's not necessarily just scanning a base relation any more. Amit Langote and Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36f69faeff540cd93de0b6aa7c2d2a7781d637a6">http://git.postgresql.org/pg/commitdiff/36f69faeff540cd93de0b6aa7c2d2a7781d637a6</a></li>

<li>Prevent possible crash reading pg_stat_activity. Also, avoid reading PGPROC's wait_event field twice, once for the wait event and again for the wait_event_type, because the value might change in the middle. Petr Jelinek and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4a586c4860477ddae6d4f9cef88486f0e37c37e">http://git.postgresql.org/pg/commitdiff/c4a586c4860477ddae6d4f9cef88486f0e37c37e</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>Properly mark initRectBox() as taking 'void' args. Was part of box type in SP-GiST index patch. Reported-by: Emre Hasegeli <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/915cee4595060fd536a7c997e37e4a535c3e0d4f">http://git.postgresql.org/pg/commitdiff/915cee4595060fd536a7c997e37e4a535c3e0d4f</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix documentation &amp; config inconsistencies around 428b1d6b2. Several issues: 1) checkpoint_flush_after doc and code disagreed about the default 2) new GUCs were missing from postgresql.conf.sample 3) Outdated source-code comment about bgwriter_flush_after's default 4) Sub-optimal categories assigned to new GUCs 5) Docs suggested backend_flush_after is PGC_SIGHUP, but it's PGC_USERSET. 6) Spell out int as integer in the docs, as done elsewhere Reported-By: Magnus Hagander, Fujii Masao Discussion: CAHGQGwETyTG5VYQQ5C_srwxWX7RXvFcD3dKROhvAWWhoSBdmZw@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f91d87d43d021db92c6edd966a4bb8c3a81ae39">http://git.postgresql.org/pg/commitdiff/8f91d87d43d021db92c6edd966a4bb8c3a81ae39</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Micha&euml;l Paquier sent in a patch to ensure that a reserved role is never a member of another role or group.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix the documentation for synchronous_standby_names.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to fix synchronous replication update configuration.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to fix an OOM in libpq and infinite loop with getCopyStart().</p>

<p>Fujii Masao sent in a patch to add error checks to BRIN summarize new values.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to do hot standby checkpoints.</p>

<p>Amit Langote sent in two more revisions of a patch to implement declarative partitioning.</p>

<p>Amit Langote sent in two revisions of a patch to fix some issues in the Bloom documentation.</p>

<p>David Rowley sent in two more revisions of a patch to fix EXPLAIN VERBOSE with parallel aggregate.</p>

<p>Ants Aasma sent in another revision of a patch to update old snapshot map once per tick.</p>

<p>Dmitry Ivanov sent in a patch to fix some of the documentation for the new phrase search capability.</p>

<p>Micha&euml;l Paquier sent in a patch to change contrib/seg/ to convert functions to use the V1 declaration.</p>

<p>Juergen Hannappel sent in a patch to add an option to pg_dumpall to exclude tables from the dump.</p>

<p>Andres Freund sent in a patch to keep from opening formally non-existant segments in _mdfd_getseg().</p>

<p>Thomas Munro sent in a patch to implement kqueue for *BSD.</p>

<p>Amit Kapila sent in a patch to fix an old snapshot threshold performance issue.</p>

<p>Noah Misch sent in a patch to add xlc atomics.</p>

<p>Andres Freund sent in a patch to emit invalidations to standby for transactions without xid.</p>

<p>Andrew Dunstan sent in a patch to add transactional enum additions.</p>

<p>Andrew Dunstan sent in a patch to add VS2015 support.</p>

<p>Simon Riggs sent in a patch to fix some suspicious behaviour on applying XLOG_HEAP2_VISIBLE.</p>