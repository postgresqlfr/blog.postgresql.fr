---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 août 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/08/20/Nouvelles-hebdomadaires-de-PostgreSQL-16-août-2015"
---


<h2>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-08/">http://archives.postgresql.org/pgsql-jobs/2015-08/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PostgresOpen 2015 aura lieu &agrave; Dallas (Texas, USA) du 16 au 18 septembre&nbsp;: <a target="_blank" href="http://2015.postgresopen.org/">http://2015.postgresopen.org/</a></li>

<li>La <em>session PostgreSQL n&deg;7</em> aura lieu le 24 septembre 2015 &agrave; Paris (France)&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche)&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. L'appel &agrave; conf&eacute;renciers expire le 31 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/#call-for-papers">http://pgbr.postgresql.org.br/2015/en/#call-for-papers</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150817004748.GA9362@fetter.org">http://www.postgresql.org/message-id/20150817004748.GA9362@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix copy &amp; paste mistake in pg_get_replication_slots(). XLogRecPtr was compared with InvalidTransactionId instead of InvalidXLogRecPtr. As both are defined to the same value this doesn't cause any actual problems, but it's still wrong. Backpatch: 9.4-master, bug was introduced in 9.4 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c4b25accebb5d35358bb0c19b841d8d9b064e46">http://git.postgresql.org/pg/commitdiff/5c4b25accebb5d35358bb0c19b841d8d9b064e46</a></li>

<li>Don't start to stream after pg_receivexlog --create-slot. Immediately starting to stream after --create-slot is inconvenient in a number of situations (e.g. when configuring a slot for use in recovery.conf) and it's easy to just call pg_receivexlog twice in the rest of the cases. Author: Michael Paquier Discussion: CAB7nPqQ9qEtuDiKY3OpNzHcz5iUA+DUX9FcN9K8GUkCZvG7+Ew@mail.gmail.com Backpatch: 9.5, where the option was introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70fd0e14e806a4d0ed31b19d92e1f9f140ef686d">http://git.postgresql.org/pg/commitdiff/70fd0e14e806a4d0ed31b19d92e1f9f140ef686d</a></li>

<li>Add confirmed_flush column to pg_replication_slots. There's no reason not to expose both restart_lsn and confirmed_flush since they have rather distinct meanings. The former is the oldest WAL still required and valid for both physical and logical slots, whereas the latter is the location up to which a logical slot's consumer has confirmed receiving data. Most of the time a slot will require older WAL (i.e. restart_lsn) than the confirmed position (i.e. confirmed_flush_lsn). Author: Marko Tiikkaja, editorialized by me Discussion: 559D110B.1020109@joh.to <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f811c2d6f51b13b71adff99e82894dd48cee055">http://git.postgresql.org/pg/commitdiff/3f811c2d6f51b13b71adff99e82894dd48cee055</a></li>

<li>Minor cleanups in slot related code. Fix a bunch of typos, and remove two superflous includes. Author: Gurjeet Singh Discussion: CABwTF4Wh_dBCzTU=49pFXR6coR4NW1ynb+vBqT+Po=7fuq5iCw@mail.gmail.com Backpatch: 9.4 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b425b7c02ccdabe3fb3a538d9174273a15f1e2e">http://git.postgresql.org/pg/commitdiff/3b425b7c02ccdabe3fb3a538d9174273a15f1e2e</a></li>

<li>Introduce macros determining if a replication slot is physical or logical. These make the code a bit easier to read, and make it easier to add a more explicit notion of a slot's type at some point in the future. Author: Gurjeet Singh Discussion: CABwTF4Wh_dBCzTU=49pFXR6coR4NW1ynb+vBqT+Po=7fuq5iCw@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/093d0c83c1d210167d122da92459a0677e04ffc9">http://git.postgresql.org/pg/commitdiff/093d0c83c1d210167d122da92459a0677e04ffc9</a></li>

<li>Handle PQresultErrorField(PG_DIAG_SQLSTATE) returning NULL in streamutil.c. In ff27db5d I missed that PQresultErrorField() may return NULL if there's no sqlstate associated with an error. Spotted-By: Coverity Reported-By: Michael Paquier Discussion: CAB7nPqQ3o10SY6NVdU4pjq85GQTN5tbbkq2gnNUh2fBNU3rKyQ@mail.gmail.com Backpatch: 9.5, like ff27db5d <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7685963eeb16c377c2e0ff7b1852b7a8bc527270">http://git.postgresql.org/pg/commitdiff/7685963eeb16c377c2e0ff7b1852b7a8bc527270</a></li>

<li>Fix two off-by-one errors in bufmgr.c. In 4b4b680c I passed a buffer index number (starting from 0) instead of a proper Buffer id (which start from 1 for shared buffers) in two places. This wasn't noticed so far as one of those locations isn't compiled at all (PrintPinnedBufs) and the other one (InvalidBuffer) requires a unlikely, but possible, set of circumstances to trigger a symptom. To reduce the likelihood of such incidents a bit also convert existing open coded mappings from buffer descriptors to buffer ids with BufferDescriptorGetBuffer(). Author: Qingqing Zhou Reported-By: Qingqing Zhou Discussion: CAJjS0u2ai9ooUisKtkV8cuVUtEkMTsbK8c7juNAjv8K11zeCQg@mail.gmail.com Backpatch: 9.5 where the private ref count infrastructure was introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d25fbf9f3ecffb5c80a9201a6310e74da24556a4">http://git.postgresql.org/pg/commitdiff/d25fbf9f3ecffb5c80a9201a6310e74da24556a4</a></li>

<li>Remove duplicated assignment in pg_create_physical_replication_slot. Reported-By: Gurjeet Singh <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4b059fddecefd5f473e539b28277874ab83f32f">http://git.postgresql.org/pg/commitdiff/a4b059fddecefd5f473e539b28277874ab83f32f</a></li>

<li>Allow pg_create_physical_replication_slot() to reserve WAL. When creating a physical slot it's often useful to immediately reserve the current WAL position instead of only doing after the first feedback message arrives. That e.g. allows slots to guarantee that all the WAL for a base backup will be available afterwards. Logical slots already have to reserve WAL during creation, so generalize that logic into being usable for both physical and logical slots. Catversion bump because of the new parameter. Author: Gurjeet Singh Reviewed-By: Andres Freund Discussion: CABwTF4Wh_dBCzTU=49pFXR6coR4NW1ynb+vBqT+Po=7fuq5iCw@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fcd88511f8e69e38defb1272e0042ef4bab2feb">http://git.postgresql.org/pg/commitdiff/6fcd88511f8e69e38defb1272e0042ef4bab2feb</a></li>

<li>Use the correct type for TableInfo-&gt;relreplident. Mistakenly relreplident was stored as a bool. That works today as c.h typedefs bool to a char, but isn't very future proof. Discussion: 20150812084351.GD8470@awork2.anarazel.de Backpatch: 9.4 where replica identity was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8015fe7f54c6410866d3751783c48e0dabfacde">http://git.postgresql.org/pg/commitdiff/a8015fe7f54c6410866d3751783c48e0dabfacde</a></li>

<li>Don't use 'bool' as a struct member name in help_config.c. Doing so doesn't work if bool is a macro rather than a typedef. Although c.h spends some effort to support configurations where bool is a preexisting macro, help_config.c has existed this way since 2003 (b700a6), and there have not been any reports of problems. Backpatch anyway since this is as riskless as it gets. Discussion: 20150812084351.GD8470@awork2.anarazel.de Backpatch: 9.0-master <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c772c7453e3e1fa97e3ef0d7e90b22c7f4ea721">http://git.postgresql.org/pg/commitdiff/6c772c7453e3e1fa97e3ef0d7e90b22c7f4ea721</a></li>

<li>vacuumdb: Don't assign negative values to a boolean. Since a17923204736 (vacuumdb: enable parallel mode) -1 has been assigned to a boolean. That can, justifiedly, trigger compiler warnings. There's also no need for ternary logic, result was only ever set to 0 or -1. So don't. Discussion: 20150812084351.GD8470@awork2.anarazel.de Backpatch: 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d4bd77568493309914217251dce5bd51f4a72b7">http://git.postgresql.org/pg/commitdiff/1d4bd77568493309914217251dce5bd51f4a72b7</a></li>

<li>Correct type of waitMode variable in ExecInsertIndexTuples(). It was a bool, even though it should be CEOUC_WAIT_MODE. That's unlikely to have a negative effect with the current definition of bool (char), but it's definitely wrong. Discussion: 20150812084351.GD8470@awork2.anarazel.de Backpatch: 9.5, where ON CONFLICT was merged <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9dec81a5493bc31fdbbf69b5fafe0d4452a38f1">http://git.postgresql.org/pg/commitdiff/f9dec81a5493bc31fdbbf69b5fafe0d4452a38f1</a></li>

<li>Don't use function definitions looking like old-style ones. This fixes a bunch of somewhat pedantic warnings with new compilers. Since by far the majority of other functions definitions use the (void) style it just seems to be consistent to do so as well in the remaining few places. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e95126cf048b08d7ff5eb72ec33737e9e27c08f8">http://git.postgresql.org/pg/commitdiff/e95126cf048b08d7ff5eb72ec33737e9e27c08f8</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Work around an apparent bug in the Msys DTK perl's regex engine. Several versions of the perl that comes with the Msys DTK have been found to have a bug that fails to recognize a ' before a multiline $ in some circumstances. To work around the problem, use a character class for the '. Another solution would have been to use \n instead of $, but that would have changed the test semantics very slightly. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7293e3271bf618eeb2d4779a15fc516a69fe463">http://git.postgresql.org/pg/commitdiff/e7293e3271bf618eeb2d4779a15fc516a69fe463</a></li>

<li>More fixes to allow pg_rewind tests to run on Msys. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15c3a1b45b480f6478555e9ddbc6093bd031d12c">http://git.postgresql.org/pg/commitdiff/15c3a1b45b480f6478555e9ddbc6093bd031d12c</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Temporarily(?) remove BRIN isolation test. Commit 2834855cb added a not-very-carefully-thought-out isolation test to check a BRIN index bug fix. The test depended on the availability of the pageinspect contrib module, which meant it did not work in several common testing scenarios such as "make check-world". It's not clear whether we want a core test depending on a contrib module like that, but in any case, failing to deal with the possibility that the module isn't present in the installation-under-test is not acceptable. Remove that test pending some better solution. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a1e14c62b739a754335c088474e12f42a6763bd">http://git.postgresql.org/pg/commitdiff/6a1e14c62b739a754335c088474e12f42a6763bd</a></li>

<li>Further mucking with PlaceHolderVar-related restrictions on join order. Commit 85e5e222b1dd02f135a8c3bf387d0d6d88e669bd turns out not to have taken care of all cases of the partially-evaluatable-PlaceHolderVar problem found by Andreas Seltenreich's fuzz testing. I had set it up to check for risky PHVs only in the event that we were making a star-schema-based exception to the param_source_rels join ordering heuristic. However, it turns out that the problem can occur even in joins that satisfy the param_source_rels heuristic, in which case allow_star_schema_join() isn't consulted. Refactor so that we check for risky PHVs whenever the proposed join has any remaining parameterization. Back-patch to 9.2, like the previous patch (except for the regression test case, which only works back to 9.3 because it uses LATERAL). Note that this discovery implies that problems of this sort could've occurred in 9.2 and up even before the star-schema patch; though I've not tried to prove that experimentally. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4200a92862604d6fcb726fbe7a3e2b38c1dc6837">http://git.postgresql.org/pg/commitdiff/4200a92862604d6fcb726fbe7a3e2b38c1dc6837</a></li>

<li>Accept alternate spellings of __sparcv7 and __sparcv8. Apparently some versions of gcc prefer __sparc_v7__ and __sparc_v8__. Per report from Waldemar Brodkorb. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f64ec6fd28bcd2be9b6b0ad3a5a630e117db601">http://git.postgresql.org/pg/commitdiff/1f64ec6fd28bcd2be9b6b0ad3a5a630e117db601</a></li>

<li>Fix privilege dumping from servers too old to have that type of privilege. pg_dump produced fairly silly GRANT/REVOKE commands when dumping types from pre-9.2 servers, and when dumping functions or procedural languages from pre-7.3 servers. Those server versions lack the typacl, proacl, and/or lanacl columns respectively, and pg_dump substituted default values that were in fact incorrect. We ended up revoking all the owner's own privileges for the object while granting all privileges to PUBLIC. Of course the owner would then have those privileges again via PUBLIC, so long as she did not try to revoke PUBLIC's privileges; which may explain the lack of field reports. Nonetheless this is pretty silly behavior. The stakes were raised by my recent patch to make pg_dump dump shell types, because 9.2 and up pg_dump would proceed to emit bogus GRANT/REVOKE commands for a shell type if dumping from a pre-9.2 server; and the server will not accept GRANT/REVOKE commands for a shell type. (Perhaps it should, but that's a topic for another day.) So the resulting dump script wouldn't load without errors. The right thing to do is to act as though these objects have default privileges (null ACL entries), which causes pg_dump to print no GRANT/REVOKE commands at all for them. That fixes the silly results and also dodges the problem with shell types. In passing, modify getProcLangs() to be less creatively different about how to handle missing columns when dumping from older server versions. Every other data-acquisition function in pg_dump does that by substituting appropriate default values in the version-specific SQL commands, and I see no reason why this one should march to its own drummer. Its use of "SELECT *" was likewise not conformant with anyplace else, not to mention it's not considered good SQL style for production queries. Back-patch to all supported versions. Although 9.0 and 9.1 pg_dump don't have the issue with typacl, they are more likely than newer versions to be used to dump from ancient servers, so we ought to fix the proacl/lanacl issues all the way back. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b861678f50747727c00ffa671e7c2f2f5d25300d">http://git.postgresql.org/pg/commitdiff/b861678f50747727c00ffa671e7c2f2f5d25300d</a></li>

<li>Fix broken markup, and copy-edit a bit. Fix docs build failure introduced by commit 6fcd88511f8e69e3. I failed to resist the temptation to rearrange the description of pg_create_physical_replication_slot(), too. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/750fc78bca7c5cff7459d02315cf7fed4f4ce3a9">http://git.postgresql.org/pg/commitdiff/750fc78bca7c5cff7459d02315cf7fed4f4ce3a9</a></li>

<li>Postpone extParam/allParam calculations until the very end of planning. Until now we computed these Param ID sets at the end of subquery_planner, but that approach depends on subquery_planner returning a concrete Plan tree. We would like to switch over to returning one or more Paths for a subquery, and in that representation the necessary details aren't fully fleshed out (not to mention that we don't really want to do this work for Paths that end up getting discarded). Hence, refactor so that we can compute the param ID sets at the end of planning, just before set_plan_references is run. The main change necessary to make this work is that we need to capture the set of outer-level Param IDs available to the current query level before exiting subquery_planner, since the outer levels' plan_params lists are transient. (That's not going to pose a problem for returning Paths, since all the work involved in producing that data is part of expression preprocessing, which will continue to happen before Paths are produced.) On the plus side, this change gets rid of several existing kluges. Eventually I'd like to get rid of SS_finalize_plan altogether in favor of doing this work during set_plan_references, but that will require some complex rejiggering because SS_finalize_plan needs to visit subplans and initplans before the main plan. So leave that idea for another day. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68fa28f77146653f1fcaa530d2f2f161bf5de479">http://git.postgresql.org/pg/commitdiff/68fa28f77146653f1fcaa530d2f2f161bf5de479</a></li>

<li>Fix some possible low-memory failures in regexp compilation. newnfa() failed to set the regex error state when malloc() fails. Several places in regcomp.c failed to check for an error after calling subre(). Each of these mistakes could lead to null-pointer-dereference crashes in memory-starved backends. Report and patch by Andreas Seltenreich. Back-patch to all branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a0258c31808c514755e3bba03cb052084c4887c">http://git.postgresql.org/pg/commitdiff/8a0258c31808c514755e3bba03cb052084c4887c</a></li>

<li>Undo mistaken tightening in join_is_legal(). One of the changes I made in commit 8703059c6b55c427 turns out not to have been such a good idea: we still need the exception in join_is_legal() that allows a join if both inputs already overlap the RHS of the special join we're checking. Otherwise we can miss valid plans, and might indeed fail to find a plan at all, as in recent report from Andreas Seltenreich. That code was added way back in commit c17117649b9ae23d, but I failed to include a regression test case then; my bad. Put it back with a better explanation, and a test this time. The logic does end up a bit different than before though: I now believe it's appropriate to make this check first, thereby allowing such a case whether or not we'd consider the previous SJ(s) to commute with this one. (Presumably, we already decided they did; but it was confusing to have this consideration in the middle of the code that was handling the other case.) Back-patch to all active branches, like the previous patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfe30a72fa80528997357cb0780412736767e8c4">http://git.postgresql.org/pg/commitdiff/cfe30a72fa80528997357cb0780412736767e8c4</a></li>

<li>Improve regression test case to avoid depending on system catalog stats. In commit 95f4e59c32866716 I added a regression test case that examined the plan of a query on system catalogs. That isn't a terribly great idea because the catalogs tend to change from version to version, or even within a version if someone makes an unrelated regression-test change that populates the catalogs a bit differently. Usually I try to make planner test cases rely on test tables that have not changed since Berkeley days, but I got sloppy in this case because the submitted crasher example queried the catalogs and I didn't spend enough time on rewriting it. But it was a problem waiting to happen, as I was rudely reminded when I tried to port that patch into Salesforce's Postgres variant :-(. So spend a little more effort and rewrite the query to not use any system catalogs. I verified that this version still provokes the Assert if 95f4e59c32866716's code fix is reverted. I also removed the EXPLAIN output from the test, as it turns out that the assertion occurs while considering a plan that isn't the one ultimately selected anyway; so there's no value in risking any cross-platform variation in that printout. Back-patch to 9.2, like the previous patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a0779a397a5ec44a37d3f7d1b2e4c4359e06c2f">http://git.postgresql.org/pg/commitdiff/6a0779a397a5ec44a37d3f7d1b2e4c4359e06c2f</a></li>

<li>Repair unsafe use of shared typecast-lookup table in plpgsql DO blocks. DO blocks use private simple_eval_estates to avoid intra-transaction memory leakage, cf commit c7b849a89. I had forgotten about that while writing commit 0fc94a5ba, but it means that expression execution trees created within a DO block disappear immediately on exiting the DO block, and hence can't safely be linked into plpgsql's session-wide cast hash table. To fix, give a DO block a private cast hash table to go with its private simple_eval_estate. This is less efficient than one could wish, since DO blocks can no longer share any cast lookup work with other plpgsql execution, but it shouldn't be too bad; in any case it's no worse than what happened in DO blocks before commit 0fc94a5ba. Per bug #13571 from Feike Steenbergen. Preliminary analysis by Oleksandr Shulgin. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83604cc42353b6c0de2a3f3ac31f94759a9326ae">http://git.postgresql.org/pg/commitdiff/83604cc42353b6c0de2a3f3ac31f94759a9326ae</a></li>

<li>Improve documentation about MVCC-unsafe utility commands. The table-rewriting forms of ALTER TABLE are MVCC-unsafe, in much the same way as TRUNCATE, because they replace all rows of the table with newly-made rows with a new xmin. (Ideally, concurrent transactions with old snapshots would continue to see the old table contents, but the data is not there anymore --- and if it were there, it would be inconsistent with the table's updated rowtype, so there would be serious implementation problems to fix.) This was nowhere documented though, and the problem was only documented for TRUNCATE in a note in the TRUNCATE reference page. Create a new "Caveats" section in the MVCC chapter that can be home to this and other limitations on serializable consistency. In passing, fix a mistaken statement that VACUUM and CLUSTER would reclaim space occupied by a dropped column. They don't reconstruct existing tuples so they couldn't do that. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5869cbfef48fdfa6b8f108c6c395601e8ad27250">http://git.postgresql.org/pg/commitdiff/5869cbfef48fdfa6b8f108c6c395601e8ad27250</a></li>

<li>Add docs about postgres_fdw's setting of search_path and other GUCs. This behavior wasn't documented, but it should be because it's user-visible in triggers and other functions executed on the remote server. Per question from Adam Fuchs. Back-patch to 9.3 where postgres_fdw was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/522400a5198f63823406202e18fdaf3621619d98">http://git.postgresql.org/pg/commitdiff/522400a5198f63823406202e18fdaf3621619d98</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Don't include rel.h when relcache.h is sufficient. Trivial change to reduce exposure of rel.h. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4901b2f49536f439f79d067a9b30a7a837d6c72b">http://git.postgresql.org/pg/commitdiff/4901b2f49536f439f79d067a9b30a7a837d6c72b</a></li>

<li>Close some holes in BRIN page assignment. In some corner cases, it is possible for the BRIN index relation to be extended by brin_getinsertbuffer but the new page not be used immediately for anything by its callers; when this happens, the page is initialized and the FSM is updated (by brin_getinsertbuffer) with the info about that page, but these actions are not WAL-logged. A later index insert/update can use the page, but since the page is already initialized, the initialization itself is not WAL-logged then either. Replay of this sequence of events causes recovery to fail altogether. There is a related corner case within brin_getinsertbuffer itself, in which we extend the relation to put a new index tuple there, but later find out that we cannot do so, and do not return the buffer; the page obtained from extension is not even initialized. The resulting page is lost forever. To fix, shuffle the code so that initialization is not the responsibility of brin_getinsertbuffer anymore, in normal cases; instead, the initialization is done by its callers (brin_doinsert and brin_doupdate) once they're certain that the page is going to be used. When either those functions determine that the new page cannot be used, before bailing out they initialize the page as an empty regular page, enter it in FSM and WAL-log all this. This way, the page is usable for future index insertions, and WAL replay doesn't find trying to insert tuples in pages whose initialization didn't make it to the WAL. The same strategy is used in brin_getinsertbuffer when it cannot return the new page. Additionally, add a new step to vacuuming so that all pages of the index are scanned; whenever an uninitialized page is found, it is initialized as empty and WAL-logged. This closes the hole that the relation is extended but the system crashes before anything is WAL-logged about it. We also take this opportunity to update the FSM, in case it has gotten out of date. Thanks to Heikki Linnakangas for finding the problem that kicked some additional analysis of BRIN page assignment code. Backpatch to 9.5, where BRIN was introduced. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20150723204810.GY5596@postgresql.org">https://www.postgresql.org/message-id/20150723204810.GY5596@postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccc4c074994d734aefb9810af79a762df3c0e974">http://git.postgresql.org/pg/commitdiff/ccc4c074994d734aefb9810af79a762df3c0e974</a></li>

<li>Fix unitialized variables. As complained by clang, reported by Andres Freund. Brown paper bag bug in ccc4c074994d. Add some comments, too. Backpatch to 9.5, like that one. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcbf455842eac10c331a866f559bb3875bcb8c37">http://git.postgresql.org/pg/commitdiff/fcbf455842eac10c331a866f559bb3875bcb8c37</a></li>

<li>Use materialize SRF mode in brin_page_items. This function was using the single-value-per-call mechanism, but the code relied on a relcache entry that wasn't kept open across calls. This manifested as weird errors in buildfarm during the short time that the "brin-1" isolation test lived. Backpatch to 9.5, where it was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94d626ff5a82422825976c096e250b07657cd6f7">http://git.postgresql.org/pg/commitdiff/94d626ff5a82422825976c096e250b07657cd6f7</a></li>

<li>Re-add BRIN isolation test. This time, instead of using a core isolation test, put it on its own test module; this way it can require the pageinspect module to be present before running. The module's Makefile is loosely modeled after test_decoding's, so that it's easy to add further tests for either pg_regress or isolationtester later. Backpatch to 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/672e3ec0e93e3d2d5549b95f73b2a3ab58714146">http://git.postgresql.org/pg/commitdiff/672e3ec0e93e3d2d5549b95f73b2a3ab58714146</a></li>

<li>MSVC: Exclude 'brin' contrib module. The build script is not able to parse the Makefile, so remove it. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d67616c74395aede8795e785d565b96b735f3f6e">http://git.postgresql.org/pg/commitdiff/d67616c74395aede8795e785d565b96b735f3f6e</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Fix declaration of isarray variable. Found and fixed by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c396f2b83dbf2af9a6b3fa137f73017f5dcf7266">http://git.postgresql.org/pg/commitdiff/c396f2b83dbf2af9a6b3fa137f73017f5dcf7266</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Run autoheader to add a few missing #defines to pg_config.h.in. These are emitted by the new ax_pthread.m4 script version. They are not used for anything in PostgreSQL, but let's keep the generated header file up-to-date. Andres Freund <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36e863bbd42f5815cecbda2397950ea1ca36a81a">http://git.postgresql.org/pg/commitdiff/36e863bbd42f5815cecbda2397950ea1ca36a81a</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>PL/Python: Make tests pass with Python 3.5. The error message wording for AttributeError has changed in Python 3.5. For the plpython_error test, add a new expected file. In the plpython_subtransaction test, we didn't really care what the exception is, only that it is something coming from Python. So use a generic exception instead, which has a message that doesn't vary across versions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f16d52269a196f7f303abe3b978d95ade265f05f">http://git.postgresql.org/pg/commitdiff/f16d52269a196f7f303abe3b978d95ade265f05f</a></li>

<li>Update key words table for 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/845405a7d8dc79f498fe77e3aeeb02ef841b0196">http://git.postgresql.org/pg/commitdiff/845405a7d8dc79f498fe77e3aeeb02ef841b0196</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Encoding PG_UHC is code page 949. This fixes presentation of non-ASCII messages to the Windows event log and console in rare cases involving Korean locale. Processes like the postmaster and checkpointer, but not processes attached to databases, were affected. Back-patch to 9.4, where MessageEncoding was introduced. The problem exists in all supported versions, but this change has no effect in the absence of the code recognizing PG_UHC MessageEncoding. Noticed while investigating bug #13427 from Dmitri Bourlatchkov. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec79978dd059d51c8c28efae949d115987588011">http://git.postgresql.org/pg/commitdiff/ec79978dd059d51c8c28efae949d115987588011</a></li>

<li>Restore old pgwin32_message_to_UTF16() behavior outside transactions. Commit 49c817eab78c6f0ce8c3bf46766b73d6cf3190b7 replaced with a hard error the dubious pg_do_encoding_conversion() behavior when outside a transaction. Reintroduce the historic soft failure locally within pgwin32_message_to_UTF16(). This fixes errors when writing messages in less-common encodings to the Windows event log or console. Back-patch to 9.4, where the aforementioned commit first appeared. Per bug #13427 from Dmitri Bourlatchkov. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43adc7a7147da2404bd4df0d8a93ca3bd3a8adc6">http://git.postgresql.org/pg/commitdiff/43adc7a7147da2404bd4df0d8a93ca3bd3a8adc6</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Reject isolation test specifications with duplicate step names. alter-table-1.spec has such a case, so change one instance of step rx1 to rx3 instead. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43b4a16817c8b5568cec72f3b0e1c8209f5ac7f7">http://git.postgresql.org/pg/commitdiff/43b4a16817c8b5568cec72f3b0e1c8209f5ac7f7</a></li>

<li>Remove bogus step from test_decoding isolation tests. Commit 43b4a16817c8b5568cec72f3b0e1c8209f5ac7f7 made the isolation tester reject duplicate step names, and it turns out that the test_decoding module's concurrent_ddl_dml isolation test has a duplicate name. I think the second definition isn't actually getting used, so just remove it. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5243a35825cf32db5863459be1f3afcc6b6461e0">http://git.postgresql.org/pg/commitdiff/5243a35825cf32db5863459be1f3afcc6b6461e0</a></li>

<li>Remove unused expected-output file. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8bd42fe5c715c478a4b3ceb77cb28ef9f18b5486">http://git.postgresql.org/pg/commitdiff/8bd42fe5c715c478a4b3ceb77cb28ef9f18b5486</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Reduce lock levels for ALTER TABLE SET autovacuum storage options. Reduce lock levels down to ShareUpdateExclusiveLock for all autovacuum-related relation options when setting them using ALTER TABLE. Add infrastructure to allow varying lock levels for relation options in later patches. Setting multiple options together uses the highest lock level required for any option. Works for both main and toast tables. Fabr&Atilde;&shy;zio Mello, reviewed by Michael Paquier, mild edit and additional regression tests from myself <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47167b7907a802ed39b179c8780b76359468f076">http://git.postgresql.org/pg/commitdiff/47167b7907a802ed39b179c8780b76359468f076</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Franck Verrot sent in a patch to mention column name in error messages.</p>

<p>Jeff Janes sent in a patch to adjust the documentation of gin_leafpage_items in the pageinspect extension to specify that only compressed pages are supported.</p>

<p>Bruce Momjian sent in a patch to fix a bug where pg_upgrade fails when postgres/template1 isn't in default tablespace.</p>

<p>Jeff Janes sent in a patch to fix the FSM versus GIN pending list bloat issue.</p>

<p>Fabien COELHO sent in three more revisions of a patch to add a checkpoint_sort GUC.</p>

<p>Jeff Janes sent in another revision of a patch to make more sane default statistics for array types.</p>

<p>Fabien COELHO sent in a patch to fix a bug in pgbench where gbench does not report skipped transactions (-L) counts properly.</p>

<p>Michael Paquier sent in a patch to fix a situation with TransactionIdGetCommitTsData and its dereferenced pointers.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to add a contrib module to launch foreign transaction resolver to resolve unresolved transactions prepared on foreign servers.</p>

<p>Jeff Janes sent in two revisions of a patch to make GIN pending clean up interruptible.</p>

<p>Michael Paquier sent in another revision of a patch to allow using SCRAM authentication instead of MD5 password hashing.</p>

<p>Andres Freund sent in a patch to convert fastgetattr() and heap_getattr() into inline functions. This is in service of upping the compiler requirements for 9.6 and later.</p>

<p>Etsuro Fujita and Kaigai Kouhei traded patches for evaluating qual pushdowns to foreign servers and fixing their relationship to EvalPlanQual.</p>

<p>Andres Freund sent in a patch to change some buffer and page related macros to inline functions.</p>

<p>Jeff Janes sent in a patch to expose GIN pending list clean up to SQL.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add a libpq context filter.</p>

<p>Marko Tiikkaja sent in a patch to add a count_nulls(VARIADIC "any").</p>

<p>Taiki Kondo sent in a patch to implement a hash join pushdown for tables partitioned by hash.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add a --strict-names option to pg_dump.</p>

<p>Haribabu Kommi sent in a PoC patch to implement more isolated multi-tenancy via RLS.</p>

<p>Michael Paquier sent in two more revisions of a patch to add regression tests for recovery.</p>

<p>Andrew Dunstan sent in two more revisions of a patch to fix TAP tests on Windows.</p>

<p>Robert Haas sent in a patch to allow the isolation tester to run with more than one waiting process.</p>

<p>Dickson S. Guedes sent in a patch to allow, "semester" in date_part, etc., which turned out to be local. Current trends go towards "half," which is less ambiguous in its meaning.</p>

<p>Andres Freund sent in a WIP patch to decrease usage of lock.h further. This is part of the drive toward requiring more recent compilers for 9.6+.</p>

<p>Marko Tiikkaja sent in a patch to add support for RADIUS passwords longer than 16 octets.</p>

<p>David Rowley sent in a patch to improve how get_base_rel_indexes() works by changing its return type and adding a parameter.</p>