---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 juillet 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/07/19/Nouvelles-hebdomadaires-de-PostgreSQL-16-juillet-2017"
---


<p>PostgreSQL 10 Beta 2 disponible. &Agrave; vos tests&nbsp;! <a target="_blank" href="https://www.postgresql.org/about/news/1763/">https://www.postgresql.org/about/news/1763/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgpool-II versions 3.6.5, 3.5.9, 3.4.12, 3.3.16 et 3.2.21 publi&eacute;es. <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juillet</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-07/">http://archives.postgresql.org/pgsql-jobs/2017-07/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PGBR2017 (La PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li><em>PGConf Local&nbsp;: Seattle</em> se tiendra les 11 & 12 ao&ucirc;t 2017&nbsp;: <a target="_blank" href="https://www.pgconf.us/#Seattle2017">https://www.pgconf.us/#Seattle2017</a></li>

<li>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre. L'appel &agrave; conf&eacute;renciers court jusqu'au 9 juillet&nbsp;: <a target="_blank" href="http://2017.pgday.it/en/blog/call-for-papers">http://2017.pgday.it/en/blog/call-for-papers</a> <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170716183539.GD29412@fetter.org">http://www.postgresql.org/message-id/20170716183539.GD29412@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Doc: clarify wording about tool requirements in sourcerepo.sgml. Original wording had confusingly vague antecedent for "they", so replace that with a more repetitive but clearer formulation. In passing, make the link to the installation requirements section more specific. Per gripe from Martin Mai, though this is not the fix he initially proposed. Discussion: <a target="_blank" href="https://postgr.es/m/CAN_NWRu-cWuNaiXUjV3m4H-riWURuPW=j21bSaLADs6rjjzXgQ@mail.gmail.com">https://postgr.es/m/CAN_NWRu-cWuNaiXUjV3m4H-riWURuPW=j21bSaLADs6rjjzXgQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3834abe90c7359319d1909fdb69a40963276a690">https://git.postgresql.org/pg/commitdiff/3834abe90c7359319d1909fdb69a40963276a690</a></li>

<li>Doc: desultory copy-editing for v10 release notes. Improve many item descriptions, improve markup, relocate some items that seemed to be in the wrong section. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/749eceff4a1f9740391b126c81af9fd4bf3b1eaa">https://git.postgresql.org/pg/commitdiff/749eceff4a1f9740391b126c81af9fd4bf3b1eaa</a></li>

<li>Doc: remove claim that PROVE_FLAGS defaults to '--verbose'. Commit e9c81b601 changed this, but missed updating the documentation. The adjacent claim that we use TAP tests only in src/bin seems pretty obsolete as well. Minor other copy-editing. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/260ba8525a6365cfb3251d619767cc6ae19ddff8">https://git.postgresql.org/pg/commitdiff/260ba8525a6365cfb3251d619767cc6ae19ddff8</a></li>

<li>On Windows, retry process creation if we fail to reserve shared memory. We've heard occasional reports of backend launch failing because pgwin32_ReserveSharedMemoryRegion() fails, indicating that something has already used that address space in the child process. It's not very clear what, given that we disable ASLR in Windows builds, but suspicion falls on antivirus products. It'd be better if we didn't have to disable ASLR, anyway. So let's try to ameliorate the problem by retrying the process launch after such a failure, up to 100 times. Patch by me, based on previous work by Amit Kapila and others. This is a longstanding issue, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAA4eK1+R6hSx6t_yvwtx+NRzneVp+MRqXAdGJZChcau8Uij-8g@mail.gmail.com">https://postgr.es/m/CAA4eK1+R6hSx6t_yvwtx+NRzneVp+MRqXAdGJZChcau8Uij-8g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/45e004fb4e3937dbdabf6d5c1706f1a02fdceb94">https://git.postgresql.org/pg/commitdiff/45e004fb4e3937dbdabf6d5c1706f1a02fdceb94</a></li>

<li>Stamp 10beta2. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/42171e2cd23c8307bbe0ec64e901f58e297db1c3">https://git.postgresql.org/pg/commitdiff/42171e2cd23c8307bbe0ec64e901f58e297db1c3</a></li>

<li>Fix multiple assignments to a column of a domain type. We allow INSERT and UPDATE commands to assign to the same column more than once, as long as the assignments are to subfields or elements rather than the whole column. However, this failed when the target column was a domain over array rather than plain array. Fix by teaching process_matched_tle() to look through CoerceToDomain nodes, and add relevant test cases. Also add a group of test cases exercising domains over array of composite. It's doubtless accidental that CREATE DOMAIN allows this case while not allowing straight domain over composite; but it does, so we'd better make sure we don't break it. (I could not find any documentation mentioning either side of that, so no doc changes.) It's been like this for a long time, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/4206.1499798337@sss.pgh.pa.us">https://postgr.es/m/4206.1499798337@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b1cb32fb62c9951c9ba35cb774fb8beec9090cb7">https://git.postgresql.org/pg/commitdiff/b1cb32fb62c9951c9ba35cb774fb8beec9090cb7</a></li>

<li>Avoid integer overflow while sifting-up a heap in tuplesort.c. If the number of tuples in the heap exceeds approximately INT_MAX/2, this loop's calculation "2*i+1" could overflow, resulting in a crash. Fix it by using unsigned int rather than int for the relevant local variables; that shouldn't cost anything extra on any popular hardware. Per bug #14722 from Sergey Koposov. Original patch by Sergey Koposov, modified by me per a suggestion from Heikki Linnakangas to use unsigned int not int64. Back-patch to 9.4, where tuplesort.c grew the ability to sort as many as INT_MAX tuples in-memory (commit 263865a48). Discussion: <a target="_blank" href="https://postgr.es/m/20170629161637.1478.93109@wrigleys.postgresql.org">https://postgr.es/m/20170629161637.1478.93109@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/512f67c8d02cc558f9c269cc848b0f0f788c4fe1">https://git.postgresql.org/pg/commitdiff/512f67c8d02cc558f9c269cc848b0f0f788c4fe1</a></li>

<li>Fix ruleutils.c for domain-over-array cases, too. Further investigation shows that ruleutils isn't quite up to speed either for cases where we have a domain-over-array: it needs to be prepared to look past a CoerceToDomain at the top level of field and element assignments, else it decompiles them incorrectly. Potentially this would result in failure to dump/reload a rule, if it looked like the one in the new test case. (I also added a test for EXPLAIN; that output isn't broken, but clearly we need more test coverage here.) Like commit b1cb32fb6, this bug is reachable in cases we already support, so back-patch all the way. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bc2d716ad09fceeb391c755f78c256ddac9d3b9f">https://git.postgresql.org/pg/commitdiff/bc2d716ad09fceeb391c755f78c256ddac9d3b9f</a></li>

<li>Fix dumping of FUNCTION RTEs that contain non-function-call expressions. The grammar will only accept something syntactically similar to a function call in a function-in-FROM expression. However, there are various ways to input something that ruleutils.c won't deparse that way, potentially leading to a view or rule that fails dump/reload. Fix by inserting a dummy CAST around anything that isn't going to deparse as a function (which is one of the ways to get something like that in there in the first place). In HEAD, also make use of the infrastructure added by this to avoid emitting unnecessary parentheses in CREATE INDEX deparsing. I did not change that in back branches, thinking that people might find it to be unexpected/unnecessary behavioral change. In HEAD, also fix incorrect logic for when to add extra parens to partition key expressions. Somebody apparently thought they could get away with simpler logic than pg_get_indexdef_worker has, but they were wrong --- a counterexample is PARTITION BY LIST ((a[1])). Ignoring the prettyprint flag for partition expressions isn't exactly a nice solution anyway. This has been broken all along, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/10477.1499970459@sss.pgh.pa.us">https://postgr.es/m/10477.1499970459@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a3ca72ae9ac14acb2b1b9cd207ac0c8a01f1439a">https://git.postgresql.org/pg/commitdiff/a3ca72ae9ac14acb2b1b9cd207ac0c8a01f1439a</a></li>

<li>Fix broken link-command-line ordering for libpgfeutils. In the frontend Makefiles that pull in libpgfeutils, we'd generally done it like this: LDFLAGS += -L$(top_builddir)/src/fe_utils -lpgfeutils $(libpq_pgport) That method is badly broken, as seen in bug #14742 from Chris Ruprecht. The -L flag for src/fe_utils ends up being placed after whatever random -L flags are in LDFLAGS already. That puts us at risk of pulling in libpgfeutils.a from some previous installation rather than the freshly built one in src/fe_utils. Also, the lack of an "override" is hazardous if someone tries to specify some LDFLAGS on the make command line. The correct way to do it is like this: override LDFLAGS := -L$(top_builddir)/src/fe_utils -lpgfeutils $(libpq_pgport) $(LDFLAGS) so that libpgfeutils, along with libpq, libpgport, and libpgcommon, are guaranteed to be pulled in from the build tree and not from any referenced system directory, because their -L flags will appear first. In some places we'd been even lazier and done it like this: LDFLAGS += -L$(top_builddir)/src/fe_utils -lpgfeutils -lpq which is subtly wrong in an additional way: on platforms where we can't restrict the symbols exported by libpq.so, it allows libpgfeutils to latch onto libpgport and libpgcommon symbols from libpq.so, rather than directly from those static libraries as intended. This carries hazards like those explained in the comments for the libpq_pgport macro. In addition to fixing the broken libpgfeutils usages, I tried to standardize on using $(libpq_pgport) like so: override LDFLAGS := $(libpq_pgport) $(LDFLAGS) even where libpgfeutils is not in the picture. This makes no difference right now but will hopefully discourage future mistakes of the same ilk. And it's more like the way we handle CPPFLAGS in libpq-using Makefiles. In passing, just for consistency, make pgbench include PTHREAD_LIBS the same way everyplace else does, ie just after LIBS rather than in some random place in the command line. This might have practical effect if there are -L switches in that macro on some platform. It looks to me like the MSVC build scripts are not affected by this error, but someone more familiar with them than I might want to double check. Back-patch to 9.6 where libpgfeutils was introduced. In 9.6, the hazard this error creates is that a reinstallation might link to the prior installation's copy of libpgfeutils.a and thereby fail to absorb a minor-version bug fix. Discussion: <a target="_blank" href="https://postgr.es/m/20170714125106.9231.13772@wrigleys.postgresql.org">https://postgr.es/m/20170714125106.9231.13772@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c95275fc202c231e867d2f0a00e8d18621b67f0d">https://git.postgresql.org/pg/commitdiff/c95275fc202c231e867d2f0a00e8d18621b67f0d</a></li>

<li>Code review for NextValueExpr expression node type. Add missing infrastructure for this node type, notably in ruleutils.c where its lack could demonstrably cause EXPLAIN to fail. Add outfuncs/readfuncs support. (outfuncs support is useful today for debugging purposes. The readfuncs support may never be needed, since at present it would only matter for parallel query and NextValueExpr should never appear in a parallelizable query; but it seems like a bad idea to have a primnode type that isn't fully supported here.) Teach planner infrastructure that NextValueExpr is a volatile, parallel-unsafe, non-leaky expression node with cost cpu_operator_cost. Given its limited scope of usage, there *might* be no live bug today from the lack of that knowledge, but it's certainly going to bite us on the rear someday. Teach pg_stat_statements about the new node type, too. While at it, also teach cost_qual_eval() that MinMaxExpr, SQLValueFunction, XmlExpr, and CoerceToDomain should be charged as cpu_operator_cost. Failing to do this for SQLValueFunction was an oversight in my commit 0bb51aa96. The others are longer-standing oversights, but no time like the present to fix them. (In principle, CoerceToDomain could have cost much higher than this, but it doesn't presently seem worth trying to examine the domain's constraints here.) Modify execExprInterp.c to execute NextValueExpr as an out-of-line function; it seems quite unlikely to me that it's worth insisting that it be inlined in all expression eval methods. Besides, providing the out-of-line function doesn't stop anyone from inlining if they want to. Adjust some places where NextValueExpr support had been inserted with the aid of a dartboard rather than keeping it in the same order as elsewhere. Discussion: <a target="_blank" href="https://postgr.es/m/23862.1499981661@sss.pgh.pa.us">https://postgr.es/m/23862.1499981661@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/decb08ebdf07f2fea4b6bb43380366ef5defbafb">https://git.postgresql.org/pg/commitdiff/decb08ebdf07f2fea4b6bb43380366ef5defbafb</a></li>

<li>Improve comments for execExpr.c's isAssignmentIndirectionExpr(). I got confused about why this function doesn't need to recursively search the expression tree for a CaseTestExpr node. After figuring that out, add a comment to save the next person some time. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e9b64824a067f8180e2553127467d7522516122c">https://git.postgresql.org/pg/commitdiff/e9b64824a067f8180e2553127467d7522516122c</a></li>

<li>Improve comments for execExpr.c's handling of FieldStore subexpressions. Given this code's general eagerness to use subexpressions' output variables as temporary workspace, it's not exactly clear that it is safe for FieldStore to tell a newval subexpression that it can write into the same variable that is being supplied as a potential input. Document the chain of assumptions needed for that to be safe. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/de2af6e001a3d6aeb2a10a802e73af8c7d1d3405">https://git.postgresql.org/pg/commitdiff/de2af6e001a3d6aeb2a10a802e73af8c7d1d3405</a></li>

</ul>

<p>Andrew Gierth pushed:</p>

<ul>

<li>Fix COPY's handling of transition tables with indexes. Commit c46c0e5202e8cfe750c6629db7852fdb15d528f3 failed to pass the TransitionCaptureState object to ExecARInsertTriggers() in the case where it's using heap_multi_insert and there are indexes. Repair. Thomas Munro, from a report by David Fetter Discussion: <a target="_blank" href="https://postgr.es/m/20170708084213.GA14720%40fetter.org">https://postgr.es/m/20170708084213.GA14720%40fetter.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1add0b15f117769f619af12720bea2f73d4f7359">https://git.postgresql.org/pg/commitdiff/1add0b15f117769f619af12720bea2f73d4f7359</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix check for empty hostname. As reported by Arthur Zakirov, Gcc 7.1 complained about this with -Wpointer-compare. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAKNkYnybV_NFVacGbW=VspzAo3TwRJFNi+9iBob66YqQMZopwg@mail.gmail.com">https://www.postgresql.org/message-id/CAKNkYnybV_NFVacGbW=VspzAo3TwRJFNi+9iBob66YqQMZopwg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4d06f1f858d0fea01a2cde74d8b831a823776355">https://git.postgresql.org/pg/commitdiff/4d06f1f858d0fea01a2cde74d8b831a823776355</a></li>

<li>Fix missing tag in the docs. Masahiko Sawada Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAD21AoBCwcTNMdrVWq8T0hoOs2mWSYq9PRJ_fr6SH8HdO+m=0g@mail.gmail.com">https://www.postgresql.org/message-id/CAD21AoBCwcTNMdrVWq8T0hoOs2mWSYq9PRJ_fr6SH8HdO+m=0g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d137a6dc239bd32b424826acbb25277ac611ddb1">https://git.postgresql.org/pg/commitdiff/d137a6dc239bd32b424826acbb25277ac611ddb1</a></li>

<li>Allow multiple hostaddrs to go with multiple hostnames. Also fix two other issues, while we're at it: * In error message on connection failure, if multiple network addresses were given as the host option, as in "host=127.0.0.1,127.0.0.2", the error message printed the address twice. * If there were many more ports than hostnames, the error message would always claim that there was one port too many, even if there was more than one. For example, if you gave 2 hostnames and 5 ports, the error message claimed that you gave 2 hostnames and 3 ports. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi">https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7b02ba62e9ffad5b14c24756a0c2aeae839c9d05">https://git.postgresql.org/pg/commitdiff/7b02ba62e9ffad5b14c24756a0c2aeae839c9d05</a></li>

<li>Allow multiple hostaddrs to go with multiple hostnames. Also fix two other issues, while we're at it: * In error message on connection failure, if multiple network addresses were given as the host option, as in "host=127.0.0.1,127.0.0.2", the error message printed the address twice. * If there were many more ports than hostnames, the error message would always claim that there was one port too many, even if there was more than one. For example, if you gave 2 hostnames and 5 ports, the error message claimed that you gave 2 hostnames and 3 ports. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi">https://www.postgresql.org/message-id/10badbc6-4d5a-a769-623a-f7ada43e14dd@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7b02ba62e9ffad5b14c24756a0c2aeae839c9d05">https://git.postgresql.org/pg/commitdiff/7b02ba62e9ffad5b14c24756a0c2aeae839c9d05</a></li>

<li>Remove unnecessary braces, to match the surrounding style. Mostly in the new subscription-related commands. Backport the few that were also present in older versions. Thomas Munro Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAEepm=3CyW1QmXcXJXmqiJXtXzFDc8SvSfnxkEGD3Bkv2SrkeQ@mail.gmail.com">https://www.postgresql.org/message-id/CAEepm=3CyW1QmXcXJXmqiJXtXzFDc8SvSfnxkEGD3Bkv2SrkeQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/09ed6c7e6765ac4638d1aad2d0babaeaecda5594">https://git.postgresql.org/pg/commitdiff/09ed6c7e6765ac4638d1aad2d0babaeaecda5594</a></li>

<li>Fix ordering of operations in SyncRepWakeQueue to avoid assertion failure. Commit 14e8803f1 removed the locking in SyncRepWaitForLSN, but that introduced a race condition, where SyncRepWaitForLSN might see syncRepState already set to SYNC_REP_WAIT_COMPLETE, but the process was not yet removed from the queue. That tripped the assertion, that the process should no longer be in the uqeue. Reorder the operations in SyncRepWakeQueue to remove the process from the queue first, and update syncRepState only after that, and add a memory barrier in between to make sure the operations are made visible to other processes in that order. Fixes bug #14721 reported by Const Zhang. Analysis and fix by Thomas Munro. Backpatch down to 9.5, where the locking was removed. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170629023623.1480.26508%40wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170629023623.1480.26508%40wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/49a3360209ba07d385f1a9e619854bbbe1b7005f">https://git.postgresql.org/pg/commitdiff/49a3360209ba07d385f1a9e619854bbbe1b7005f</a></li>

<li>Fix variable and type name in comment. Kyotaro Horiguchi Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170711.163441.241981736.horiguchi.kyotaro@lab.ntt.co.jp">https://www.postgresql.org/message-id/20170711.163441.241981736.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ca906f68f22bf2076349394a5f28caf1f6e6f2f7">https://git.postgresql.org/pg/commitdiff/ca906f68f22bf2076349394a5f28caf1f6e6f2f7</a></li>

<li>Reduce memory usage of tsvector type analyze function. compute_tsvector_stats() detoasted and kept in memory every tsvector value in the sample, but that can be a lot of memory. The original bug report described a case using over 10 gigabytes, with statistics target of 10000 (the maximum). To fix, allocate a separate copy of just the lexemes that we keep around, and free the detoasted tsvector values as we go. This adds some palloc/pfree overhead, when you have a lot of distinct lexemes in the sample, but it's better than running out of memory. Fixes bug #14654 reported by James C. Reviewed by Tom Lane. Backport to all supported versions. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170514200602.1451.46797@wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170514200602.1451.46797@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/da11977de9c685ef808d3a293727f9ce26753ec4">https://git.postgresql.org/pg/commitdiff/da11977de9c685ef808d3a293727f9ce26753ec4</a></li>

<li>Fix race between GetNewTransactionId and GetOldestActiveTransactionId. The race condition goes like this: 1. GetNewTransactionId advances nextXid e.g. from 100 to 101 2. GetOldestActiveTransactionId reads the new nextXid, 101 3. GetOldestActiveTransactionId loops through the proc array. There are no active XIDs there, so it returns 101 as the oldest active XID. 4. GetNewTransactionid stores XID 100 to MyPgXact-&gt;xid So, GetOldestActiveTransactionId returned XID 101, even though 100 only just started and is surely still running. This would be hard to hit in practice, and even harder to spot any ill effect if it happens. GetOldestActiveTransactionId is only used when creating a checkpoint in a master server, and the race condition can only happen on an online checkpoint, as there are no backends running during a shutdown checkpoint. The oldestActiveXid value of an online checkpoint is only used when starting up a hot standby server, to determine the starting point where pg_subtrans is initialized from. For the race condition to happen, there must be no other XIDs in the proc array that would hold back the oldest-active XID value, which means that the missed XID must be a top transaction's XID. However, pg_subtrans is not used for top XIDs, so I believe an off-by-one error is in fact inconsequential. Nevertheless, let's fix it, as it's clearly wrong and the fix is simple. This has been wrong ever since hot standby was introduced, so backport to all supported versions. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/e7258662-82b6-7a45-56d4-99b337a32bf7@iki.fi">https://www.postgresql.org/message-id/e7258662-82b6-7a45-56d4-99b337a32bf7@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/74fc83869e169470e91363546d945002e71e54ab">https://git.postgresql.org/pg/commitdiff/74fc83869e169470e91363546d945002e71e54ab</a></li>

<li>Fix pg_basebackup output to stdout on Windows. When writing a backup to stdout with pg_basebackup on Windows, put stdout to binary mode. Any CR bytes in the output will otherwise be output incorrectly as CR+LF. In the passing, standardize on using "_setmode" instead of "setmode", for the sake of consistency. They both do the same thing, but according to MSDN documentation, setmode is deprecated. Fixes bug #14634, reported by Henry Boehlert. Patch by Haribabu Kommi. Backpatch to all supported versions. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170428082818.24366.13134@wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170428082818.24366.13134@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8046465c2ecf6841ad80265f84294edd98aefd8b">https://git.postgresql.org/pg/commitdiff/8046465c2ecf6841ad80265f84294edd98aefd8b</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Translation updates. Source-Git-URL: git://git.postgresql.org/git/pgtranslation/messages.git Source-Git-Hash: c5a8de3653bb1af6b0eb41cc6bf090c5522df52b <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6c774caf0ea6977f00af4225192915f0a602ea3d">https://git.postgresql.org/pg/commitdiff/6c774caf0ea6977f00af4225192915f0a602ea3d</a></li>

<li>commit_ts test: Set node name in test. Otherwise, the script output has a lot of pointless warnings. This was forgotten in 9def031bd2821f35b5f506260d922482648a8bb0 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ca793c59a51e94cedf8cbea5c29668bf8fa298f3">https://git.postgresql.org/pg/commitdiff/ca793c59a51e94cedf8cbea5c29668bf8fa298f3</a></li>

<li>Fix typo in v10 release notes. The new functions return a list of files in the corresponding directory, not the name of the directory itself. Pointed out by Gianni Ciolli. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2036f71b751152e443beecfdd8bffbb4e17447c2">https://git.postgresql.org/pg/commitdiff/2036f71b751152e443beecfdd8bffbb4e17447c2</a></li>

<li>pg_upgrade i18n: Fix "%s server/cluster" wording. The original wording was impossible to translate correctly. Discussion: <a target="_blank" href="https://postgr.es/m/20170523002827.lzc2jkzh2gubclqb@alvherre.pgsql">https://postgr.es/m/20170523002827.lzc2jkzh2gubclqb@alvherre.pgsql</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/837255cc81fb59b12f5a70ac2a8a9850bccf13e0">https://git.postgresql.org/pg/commitdiff/837255cc81fb59b12f5a70ac2a8a9850bccf13e0</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Fix vcregress.pl PROVE_FLAGS bug in commit 93b7d9731f. This change didn't adjust the publicly visible taptest function, causing buildfarm failures on bowerbird. Backpatch to 9.4 like previous change. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fd2487e49f406471c11fc337b3e06dcb8579c809">https://git.postgresql.org/pg/commitdiff/fd2487e49f406471c11fc337b3e06dcb8579c809</a></li>

<li>fix typo. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/deb0129a222ec6b189d5d198cf77012591f300d8">https://git.postgresql.org/pg/commitdiff/deb0129a222ec6b189d5d198cf77012591f300d8</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&#65533;l Paquier sent in another revision of a patch to fix an issue where pg_receivewal and messages were printed in non-verbose mode.</p>

<p>Mithun Cy sent in another revision of a patch to cache data in GetSnapshotData().</p>

<p>Thomas Munro sent in another revision of a patch to share record typmods among backends.</p>

<p>Ashutosh Bapat sent in another revision of a patch to skip partitions which can't be part of the path.</p>

<p>Amit Langote sent in a patch to properly set the ri_RangeTableIndex of partition result rels and correctly format the row shown in the WITH CHECK OPTION error message.</p>

<p>Alexander Korotkov sent in two revisions of a patch to double the shared memory allocation for SLRU LWLocks.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to enable partition-wise joins for declaratively partitioned tables.</p>

<p>Marina Polyakova sent in another revision of a patch to correct some pgbench serialization and deadlock errors.</p>

<p>Alik Khilazhev and Fabien COELHO traded patches to add a Zipfian distribution to pgbench.</p>

<p>Kyotaro HORIGUCHI and Amit Kapila traded patches to fix an issue where hash index on unlogged tables doesn't behave as expected.</p>

<p>Claudio Freire sent in three more revisions of a patch to enable VACUUM to use over 1GB of work_mem.</p>

<p>Masahiko Sawada sent in two more revisions of a patch to fix pg_stop_backup(wait_for_archive := true) on standby servers.</p>

<p>Amit Langote sent in another revision of a patch to cope with differing attnos in ATExecAttachPartition code and teach ATExecAttachPartition to skip validation in more cases.</p>

<p>Thomas Munro sent in a patch to tell DSA that atomic u64 is always available.</p>

<p>Amit Kapila sent in another revision of a patch to adjust the cost based on whether the below node is projection-capable.</p>

<p>Jeevan Ladhe sent in another revision of a patch to add support for default partitions in declaratively partitioned tables.</p>

<p>Mark Rofail sent in another revision of a patch to allow foreign keys to arrays using GIN indexes.</p>

<p>Masahiko Sawada sent in a patch to fix a typo in pg_upgrade/info.c.</p>

<p>Etsuro Fujita sent in a patch to fix a bug in ExecModifyTable() and some trigger issues for foreign tables.</p>

<p>Amit Khandekar sent in a patch to generate the result rels in canonical order.</p>

<p>Heikki Linnakangas sent in a patch to always use 2048 bit DH parameters for OpenSSL ephemeral DH ciphers.</p>

<p>Amit Langote sent in two revisions of a patch to update the description of \d[S+] that \? emits in psql.</p>

<p>Kyotaro HORIGUCHI sent in two revisions of a patch to ensure that PgFDW connection gets invalidated correctly by ALTER SERVER/ALTER USER MAPPING.</p>

<p>Ashutosh Bapat sent in a patch to replace lfirst() with lfirst_node() appropriately in planner.c.</p>

<p>&#65533;lvaro Herrera sent in a patch to fix some more race conditions in logical replication.</p>

<p>Thomas Munro sent in a patch to add more flexible LDAP auth search filters.</p>

<p>Thomas Munro sent in a patch to shore up inadequate infrastructure for NextValueExpr.</p>

<p>Ashutosh Sharma sent in a patch to fix an issue where PL/Perl didn't work on Windows.</p>

<p>Beena Emerson sent in another revision of a patch to implement default partitions for declarative partitions on RANGE.</p>

<p>Mithun Cy sent in another revision of a patch to implement auto_prewarm.</p>

<p>Haribabu Kommi sent in a patch to fix pg_basebackup Windows tar mode to stdout and replace setmode with _setmode function.</p>

<p>&#65533;lvaro Herrera sent in a patch to fix a bug in locking an update tuple chain.</p>

<p>Haribabu Kommi sent in a WIP patch to replace tuple with slot. This is infrastructure for pluggable storage engines.</p>

<p>Micha&#65533;l Paquier sent in a patch to add an -E (encoding) switch to pg_dumpall.</p>

<p>Julien Rouhaud sent in a patch to fix an issue which manifested as a segfault in HEAD when too many nested functions were called.</p>