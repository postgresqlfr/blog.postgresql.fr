---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 juillet 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/07/28/Nouvelles-hebdomadaires-de-PostgreSQL-22-juillet-2012"
---


<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-07/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-07/msg00009.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid pre-determining index names during CREATE TABLE LIKE parsing. Formerly, when trying to copy both indexes and comments, CREATE TABLE LIKE had to pre-assign names to indexes that had comments, because it made up an explicit CommentStmt command to apply the comment and so it had to know the name for the index. This creates bad interactions with other indexes, as shown in bug #6734 from Daniele Varrazzo: the preassignment logic couldn't take any other indexes into account so it could choose a conflicting name. To fix, add a field to IndexStmt that allows it to carry a comment to be assigned to the new index. (This isn't a user-exposed feature of CREATE INDEX, only an internal option.) Now we don't need preassignment of index names in any situation. I also took the opportunity to refactor DefineIndex to accept the IndexStmt as such, rather than passing all its fields individually in a mile-long parameter list. Back-patch to 9.2, but no further, because it seems too dangerous to change IndexStmt or DefineIndex's API in released branches. The bug exists back to 9.0 where CREATE TABLE LIKE grew the ability to copy comments, but given the lack of prior complaints we'll just let it go unfixed before 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c92be3c0595d504a1516e7e158d085150ff1c4dc">http://git.postgresql.org/pg/commitdiff/c92be3c0595d504a1516e7e158d085150ff1c4dc</a></li>

<li>Put back storage/proc.h in postmaster.c. I took this out thinking it wasn't needed anymore, but the EXEC_BACKEND code still needs it. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57b9bdda39e05d127f6930045d289ffc9935c971">http://git.postgresql.org/pg/commitdiff/57b9bdda39e05d127f6930045d289ffc9935c971</a></li>

<li>Improve coding around the fsync request queue. In all branches back to 8.3, this patch fixes a questionable assumption in CompactCheckpointerRequestQueue/CompactBgwriterRequestQueue that there are no uninitialized pad bytes in the request queue structs. This would only cause trouble if (a) there were such pad bytes, which could happen in 8.4 and up if the compiler makes enum ForkNumber narrower than 32 bits, but otherwise would require not-currently-planned changes in the widths of other typedefs; and (b) the kernel has not uniformly initialized the contents of shared memory to zeroes. Still, it seems a tad risky, and we can easily remove any risk by pre-zeroing the request array for ourselves. In addition to that, we need to establish a coding rule that struct RelFileNode can't contain any padding bytes, since such structs are copied into the request array verbatim. (There are other places that are assuming this anyway, it turns out.) In 9.1 and up, the risk was a bit larger because we were also effectively assuming that struct RelFileNodeBackend contained no pad bytes, and with fields of different types in there, that would be much easier to break. However, there is no good reason to ever transmit fsync or delete requests for temp files to the bgwriter/checkpointer, so we can revert the request structs to plain RelFileNode, getting rid of the padding risk and saving some marginal number of bytes and cycles in fsync queue manipulation while we are at it. The savings might be more than marginal during deletion of a temp relation, because the old code transmitted an entirely useless but nonetheless expensive-to-process ForgetRelationFsync request to the background process, and also had the background process perform the file deletion even though that can safely be done immediately. In addition, make some cleanup of nearby comments and small improvements to the code in CompactCheckpointerRequestQueue/CompactBgwriterRequestQueue. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73b796a52c50d6f44400c99eff1a01c89d08782f">http://git.postgresql.org/pg/commitdiff/73b796a52c50d6f44400c99eff1a01c89d08782f</a></li>

<li>Improve pg_upgrade's load_directory() function. Error out on out-of-memory, rather than returning -1, which the sole existing caller wasn't checking for anyway. There doesn't seem to be any use-case for making the caller check for failure here. Detect failure return from readdir(). Use a less platform-dependent method of calculating the entrysize. It's possible, but not yet confirmed, that this explains bug #6733, in which Mike Wilson reports a pg_upgrade crash that did not occur in 9.1. (Note that load_directory is effectively new code in 9.2, at least on platforms that have scandir().) Fix up comments, avoid uselessly using two counters, reduce the number of realloc calls to something sane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d6ec663bb701b7192822f83a6a1cf4f7574d67e">http://git.postgresql.org/pg/commitdiff/3d6ec663bb701b7192822f83a6a1cf4f7574d67e</a></li>

<li>Get rid of useless global variable in pg_upgrade. Since the scandir() emulation was taken out of pg_upgrade, there's no longer any need for scandir_file_pattern to exist as a global variable. Replace it with a local in the one remaining function that was making use of it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/faf26bf1175530cc97ce3e804ff10dc2be7026d3">http://git.postgresql.org/pg/commitdiff/faf26bf1175530cc97ce3e804ff10dc2be7026d3</a></li>

<li>Fix management of pendingOpsTable in auxiliary processes. mdinit() was misusing IsBootstrapProcessingMode() to decide whether to create an fsync pending-operations table in the current process. This led to creating a table not only in the startup and checkpointer processes as intended, but also in the bgwriter process, not to mention other auxiliary processes such as walwriter and walreceiver. Creation of the table in the bgwriter is fatal, because it absorbs fsync requests that should have gone to the checkpointer; instead they just sit in bgwriter local memory and are never acted on. So writes performed by the bgwriter were not being fsync'd which could result in data loss after an OS crash. I think there is no live bug with respect to walwriter and walreceiver because those never perform any writes of shared buffers; but the potential is there for future breakage in those processes too. To fix, make AuxiliaryProcessMain() export the current process's AuxProcType as a global variable, and then make mdinit() test directly for the types of aux process that should have a pendingOpsTable. Having done that, we might as well also get rid of the random bool flags such as am_walreceiver that some of the aux processes had grown. (Note that we could not have fixed the bug by examining those variables in mdinit(), because it's called from BaseInit() which is run by AuxiliaryProcessMain() before entering any of the process-type-specific code.) Back-patch to 9.2, where the problem was introduced by the split-up of bgwriter and checkpointer processes. The bogus pendingOpsTable exists in walwriter and walreceiver processes in earlier branches, but absent any evidence that it causes actual problems there, I'll leave the older branches alone. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a9c30a8a1d3a786abc4b8d95f0182463f66f919">http://git.postgresql.org/pg/commitdiff/4a9c30a8a1d3a786abc4b8d95f0182463f66f919</a></li>

<li>Fix statistics breakage from bgwriter/checkpointer process split. ForwardFsyncRequest() supposed that it could only be called in regular backends, which used to be true; but since the splitup of bgwriter and checkpointer, it is also called in the bgwriter. We do not want to count such calls in pg_stat_bgwriter.buffers_backend statistics, so fix things so that they aren't. (It's worth noting here that this implies an alarmingly large increase in the expected amount of cross-process fsync request traffic, which may well mean that the process splitup was not such a hot idea.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80e373c3a8c43812bdc98fe0d433b9990acce5ad">http://git.postgresql.org/pg/commitdiff/80e373c3a8c43812bdc98fe0d433b9990acce5ad</a></li>

<li>Send only one FORGET_RELATION_FSYNC request when dropping a relation. We were sending one per fork, but a little bit of refactoring allows us to send just one request with forknum == InvalidForkNumber. This not only reduces pressure on the shared-memory request queue, but saves repeated traversals of the checkpointer's hash table. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3072b7bade26d4cf72ad453ad7d3323927b1ea64">http://git.postgresql.org/pg/commitdiff/3072b7bade26d4cf72ad453ad7d3323927b1ea64</a></li>

<li>Rethink checkpointer's fsync-request table representation. Instead of having one hash table entry per relation/fork/segment, just have one per relation, and use bitmapsets to represent which specific segments need to be fsync'd. This eliminates the need to scan the whole hash table to implement FORGET_RELATION_FSYNC, which fixes the O(N2) behavior recently demonstrated by Jeff Janes for cases involving lots of TRUNCATE or DROP TABLE operations during a single checkpoint cycle. Per an idea from Robert Haas. (FORGET_DATABASE_FSYNC still sucks, but since dropping a database is a pretty expensive operation anyway, we'll live with that.) In passing, improve the delayed-unlink code: remove the pass over the list in mdpreckpt, since it wasn't doing anything for us except supporting a useless Assert in mdpostckpt, and fix mdpostckpt so that it will absorb fsync requests every so often when clearing a large backlog of deletion requests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be86e3dd5b42c33387ae976c014e6276c9439f7f">http://git.postgresql.org/pg/commitdiff/be86e3dd5b42c33387ae976c014e6276c9439f7f</a></li>

<li>Fix whole-row Var evaluation to cope with resjunk columns (again). When a whole-row Var is reading the result of a subquery, we need it to ignore any "resjunk" columns that the subquery might have evaluated for GROUP BY or ORDER BY purposes. We've hacked this area before, in commit 68e40998d058c1f6662800a648ff1e1ce5d99cba, but that fix only covered whole-row Vars of named composite types, not those of RECORD type; and it was mighty klugy anyway, since it just assumed without checking that any extra columns in the result must be resjunk. A proper fix requires getting hold of the subquery's targetlist so we can actually see which columns are resjunk (whereupon we can use a JunkFilter to get rid of them). So bite the bullet and add some infrastructure to make that possible. Per report from Andrew Dunstan and additional testing by Merlin Moncure. Back-patch to all supported branches. In 8.3, also back-patch commit 292176a118da6979e5d368a4baf27f26896c99a5, which for some reason I had not done at the time, but it's a prerequisite for this change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e617e29aaccfdd1b85af7f50dc83aa6dd7ef550">http://git.postgresql.org/pg/commitdiff/8e617e29aaccfdd1b85af7f50dc83aa6dd7ef550</a></li>

<li>Account for SRFs in targetlists in planner rowcount estimates. We made use of the ROWS estimate for set-returning functions used in FROM, but not for those used in SELECT targetlists; which is a bit of an oversight considering there are common usages that require the latter approach. Improve that. (I had initially thought it might be worth folding this into cost_qual_eval, but after investigation concluded that that wouldn't be very helpful, so just do it separately.) Per complaint from David Johnston. Back-patch to 9.2, but not further, for fear of destabilizing plan choices in existing releases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31c7c642b6419b43eff903285e3da65e3f1901d6">http://git.postgresql.org/pg/commitdiff/31c7c642b6419b43eff903285e3da65e3f1901d6</a></li>

<li>Suppress volatile-related warning seen in some compilers. Antique versions of gcc complain about vars that are initialized outside PG_TRY and then modified within it. Rather than marking the var volatile, expend one more line of code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f115d98b984c80e635392aed10cc6185d1f8f4b">http://git.postgresql.org/pg/commitdiff/1f115d98b984c80e635392aed10cc6185d1f8f4b</a></li>

<li>Use --nosync during make check's initdb call. We left this out of commit b966dd6c4228d696b291c1cdcb5ab8c8475fefa8 so as to get some more buildfarm testing of the new fsync code in initdb. But since no problems have turned up, it's probably time to save the cycles. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c4f5b4bc5385b37d062451642abd384536eeeb3">http://git.postgresql.org/pg/commitdiff/2c4f5b4bc5385b37d062451642abd384536eeeb3</a></li>

<li>Improve copydir() code for the case that fsync is off. We should avoid calling sync_file_range or posix_fadvise in this case, since (a) we don't really care if the data gets synced, and might as well save the kernel calls; (b) at least on Linux we know that the kernel might block us until it's scheduled the write. Also, avoid making a useless second traversal of the directory tree if we're not actually going to call fsync(2) after all. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d46a57ddcad394e514bbefb193a4a03e766f163">http://git.postgresql.org/pg/commitdiff/2d46a57ddcad394e514bbefb193a4a03e766f163</a></li>

<li>Fix name collision between concurrent regression tests. Commit f5bcd398addcbeb785f0513cf28cba5d1ecd2c8a introduced a test using a table named "circles" in inherit.sql. Unfortunately, the concurrently executed constraints test was already using that table name, so the parallel regression tests would sometimes fail. Rename table to dodge the problem. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b71258af5613e627bb2b3b1e1874abe5c0226dc4">http://git.postgresql.org/pg/commitdiff/b71258af5613e627bb2b3b1e1874abe5c0226dc4</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add comment why seemingly dead code is necessary 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a76c857eba977a91a07ab752d4811eb5734f0b5c">http://git.postgresql.org/pg/commitdiff/a76c857eba977a91a07ab752d4811eb5734f0b5c</a></li>

<li>Remove unreachable code. The Solaris Studio compiler warns about these instances, unlike more mainstream compilers such as gcc. But manual inspection showed that the code is clearly not reachable, and we hope no worthy compiler will complain about removing this code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd16f9480ac67ab0c6b0102d110cd5121ed9ab46">http://git.postgresql.org/pg/commitdiff/dd16f9480ac67ab0c6b0102d110cd5121ed9ab46</a></li>

<li>Show step titles in the pg_upgrade man page. The upstream XSLT stylesheets missed that case. found by &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6ce58c01056fa0f475ea468f1633890f6a1d74c">http://git.postgresql.org/pg/commitdiff/d6ce58c01056fa0f475ea468f1633890f6a1d74c</a></li>

<li>PL/Python: Remove PLy_result_ass_item. It is apparently no longer used after the new slicing support was implemented (a97207b6908f1d4a7d19b37b818367bb0171039f), so let's remove the dead code and see if anything cares. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71f2dd23210f9607d1584fad89e0f8df9750e921">http://git.postgresql.org/pg/commitdiff/71f2dd23210f9607d1584fad89e0f8df9750e921</a></li>

<li>pg_dump: Simplify mkdir() error checking. mkdir() can check for errors itself. We don't need to code that ourselves again. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ca03aa41488a9f08dffe64724eb04692174350c">http://git.postgresql.org/pg/commitdiff/8ca03aa41488a9f08dffe64724eb04692174350c</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Introduce timeout handling framework. Management of timeouts was getting a little cumbersome; what we originally had was more than enough back when we were only concerned about deadlocks and query cancel; however, when we added timeouts for standby processes, the code got considerably messier. Since there are plans to add more complex timeouts, this seems a good time to introduce a central timeout handling module. External modules register their timeout handlers during process initialization, and later enable and disable them as they see fit using a simple API; timeout.c is in charge of keeping track of which timeouts are in effect at any time, installing a common SIGALRM signal handler, and calling setitimer() as appropriate to ensure timely firing of external handlers. timeout.c additionally supports pluggable modules to add their own timeouts, though this capability isn't exercised anywhere yet. Additionally, as of this commit, walsender processes are aware of timeouts; we had a preexisting bug there that made those ignore SIGALRM, thus being subject to unhandled deadlocks, particularly during the authentication phase. This has already been fixed in back branches in commit 0bf8eb2a, which see for more details. Main author: Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi. Some review and cleanup by &Aacute;lvaro Herrera. Extensive reworking by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f34c68f09671c4566854c7e20e9253d4f335c0b0">http://git.postgresql.org/pg/commitdiff/f34c68f09671c4566854c7e20e9253d4f335c0b0</a></li>

<li>Remove recently added PL/Perl encoding tests. These only pass cleanly on UTF8 and SQL_ASCII encodings, besides the Japanese encoding in which they were originally written, which is clearly not good enough. Since the functionality they test has not ever been tested from PL/Perl, the best answer seems to be to remove the new tests completely. Per buildfarm results and ensuing discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65558995a214026ec544326465711588eafd2e95">http://git.postgresql.org/pg/commitdiff/65558995a214026ec544326465711588eafd2e95</a></li>

<li>connoinherit may be true only for CHECK constraints. The code was setting it true for other constraints, which is bogus. Doing so caused bogus catalog entries for such constraints, and in particular caused an error to be raised when trying to drop a constraint of types other than CHECK from a table that has children, such as reported in bug #6712. In 9.2, additionally ignore connoinherit=true for other constraint types, to avoid having to force initdb; existing databases might already contain bogus catalog entries. Includes a catversion bump (in HEAD only). Bug report from Miroslav &Scaron;ulc Analysis from Amit Kapila and Noah Misch; Amit also contributed the patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5bcd398addcbeb785f0513cf28cba5d1ecd2c8a">http://git.postgresql.org/pg/commitdiff/f5bcd398addcbeb785f0513cf28cba5d1ecd2c8a</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Syntax support and documentation for event triggers. They don't actually do anything yet; that will get fixed in a follow-on commit. But this gets the basic infrastructure in place, including CREATE/ALTER/DROP EVENT TRIGGER; support for COMMENT, SECURITY LABEL, and ALTER EXTENSION .. ADD/DROP EVENT TRIGGER; pg_dump and psql support; and documentation for the anticipated initial feature set. Dimitri Fontaine, with review and a bunch of additional hacking by me. Thom Brown extensively reviewed earlier versions of this patch set, but there's not a whole lot of that code left in this commit, as it turns out. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3855968f328918b6cd1401dd11d109d471a54d40">http://git.postgresql.org/pg/commitdiff/3855968f328918b6cd1401dd11d109d471a54d40</a></li>

<li>Make new event trigger facility actually do something. Commit 3855968f328918b6cd1401dd11d109d471a54d40 added syntax, pg_dump, psql support, and documentation, but the triggers didn't actually fire. With this commit, they now do. This is still a pretty basic facility overall because event triggers do not get a whole lot of information about what the user is trying to do unless you write them in C; and there's still no option to fire them anywhere except at the very beginning of the execution sequence, but it's better than nothing, and a good building block for future work. Along the way, add a regression test for ALTER LARGE OBJECT, since testing of event triggers reveals that we haven't got one. Dimitri Fontaine and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a0e4d36ebd7f477822d5bae41ba121a40d22ccc">http://git.postgresql.org/pg/commitdiff/3a0e4d36ebd7f477822d5bae41ba121a40d22ccc</a></li>

<li>Temporary patch to try to debug why event trigger patch broke Windows. Apologies for the ugliness. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a248208a038d7847ef98996c6b70209d782415c">http://git.postgresql.org/pg/commitdiff/0a248208a038d7847ef98996c6b70209d782415c</a></li>

<li>Repair plpgsql_validator breakage. Commit 3a0e4d36ebd7f477822d5bae41ba121a40d22ccc arranged to reference stack-allocated variables after they were out of scope. That's no good, so let's arrange to not do that after all. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0635c0b524368862da08271fbca626faf44290a2">http://git.postgresql.org/pg/commitdiff/0635c0b524368862da08271fbca626faf44290a2</a></li>

<li>Revert temporary patch to debug Windows breakage. This reverts commit 0a248208a038d7847ef98996c6b70209d782415c. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed0af3324702685cce63aed0641b4cbb45816b50">http://git.postgresql.org/pg/commitdiff/ed0af3324702685cce63aed0641b4cbb45816b50</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Refactor the way code is shared between some range type functions. Functions like range_eq, range_before etc. are exposed at the SQL-level, but they're also used internally by the GiST consistent support function. The code sharing was done by a hack, TrickFunctionCall2, which relied on the knowledge that all the functions used fn_extra the same way. This commit splits the functions into internal versions that take a TypeCacheEntry as argument, and thin wrappers to expose the functions at the SQL-level. The internal versions can then be called directly and in a less hacky way from the GiST consistent function. This is just cosmetic, but backpatch to 9.2 anyway, to avoid having a different version of this code in the 9.2 branch. That would make backpatching fixes in this area more difficult. Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7a4add6c4243cbcf50a554bce4c34cb72a344b5">http://git.postgresql.org/pg/commitdiff/a7a4add6c4243cbcf50a554bce4c34cb72a344b5</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove prepared transactions from main isolation test schedule. There is no point in running this test when prepared transactions are disabled, which is the default. New make targets that include the test are provided. This will save some useless waste of cycles on buildfarm machines. Backpatch to 9.1 where these tests were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae55d9fbe3871a5e6309d9b91629f1b0ff2b8cba">http://git.postgresql.org/pg/commitdiff/ae55d9fbe3871a5e6309d9b91629f1b0ff2b8cba</a></li>

<li>Remove now unneeded results file for disabled prepared transactions case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1e5705c9fa6a46d5f284101765085182d3eb600">http://git.postgresql.org/pg/commitdiff/a1e5705c9fa6a46d5f284101765085182d3eb600</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in another revision of the patch to fix some issues in pg_receivexlog.</li>

<li>Pavel Stehule sent in another revison of the patch to enhance error fields.</li>

<li>Amit Kapila sent in a patch to enable pg_resetxlog to restore from WAL files.</li>

<li>Jan Urbanski sent in two more revisions of a patch to fix the mapping of PostgreSQL encodings to Python encodings.</li>

<li>Tom Lane sent in a patch to fix an issue with row literals.</li>

<li>Andres Freund sent in another revision of the patch to add XLogReader functionality.</li>

<li>Joel Jacobson sent in a patch to make pg_dump dump overloaded functions in a deterministic order.</li>

<li>Alvaro Herrera sent in two revisions of a patch to move the extra parameters of a CHECK constraint from before the parenthesized boolean expression to after it, clarifying what's being affected by the parameters.</li>

<li>Jeff Janes sent in a patch to re-order vacuuming in pg_bench -i.</li>

<li>Andrew Dunstan sent in a WIP patch to add a settable ceiling on shared_buffers.</li>

<li>Marko Kreen sent in another revision of the one-row-at-a-time interface for libpq.</li>

<li>Zoltan Boszormenyi sent in another revision of the lock timeout patch.</li>

</ul>