---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 avril 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/04/17/Nouvelles-hebdomadaires-de-PostgreSQL-16-avril-2017"
---


<p>Le PGDay 2017 argentin sera tenu &agrave; Santa Fe le 9 juin 2017. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="http://www.pgday.com.ar">http://www.pgday.com.ar</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pg_partman v3.0.1, un syst&egrave;me de gestion pour le partitionnement des tables&nbsp;: <a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en avril</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-04/">http://archives.postgresql.org/pgsql-jobs/2017-04/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: Meetup à Lyon le mercredi 26 avril : <a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</li>

<li>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/">http://www.pgcon.org/2017/</a></li>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 30 mai&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay UK 2017 aura lieu &agrave; Londres le 4 juillet 2017. L'appel &agrave; conf&eacute;renciers s'&eacute;teint le 20 avril&nbsp;: <a target="_blank" href="http://www.pgconf.uk">http://www.pgconf.uk</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170416230354.GA24896@fetter.org">http://www.postgresql.org/message-id/20170416230354.GA24896@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Joe Conway pushed:</p>

<ul>

<li>Add partitioned table support to sepgsql. The new partitioned table capability added a new relkind, namely RELKIND_PARTITIONED_TABLE. Update sepgsql to treat this new relkind exactly the same way it does RELKIND_RELATION. In addition, add regression test coverage for partitioned tables. Issue raised by Stephen Frost and initial patch by Mike Palmiotto. Review by Tom Lane and Robert Haas, and editorializing by me. Discussion: <a target="_blank" href="https://postgr.es/m/flat/623bcaae-112e-ced0-8c22-a84f75ae0c53%40joeconway.com">https://postgr.es/m/flat/623bcaae-112e-ced0-8c22-a84f75ae0c53%40joeconway.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25542d77dd549940468d1a932809feb9959d717d">http://git.postgresql.org/pg/commitdiff/25542d77dd549940468d1a932809feb9959d717d</a></li>

<li>Make sepgsql regression tests robust vs. collation differences. In commit 25542d77, regression test coverage was added to sepgsql for partitioned tables. Unfortunately it was not robust in the face of collation differences, per the buildfarm. Force "C" collation in order to fix that. Discussion: <a target="_blank" href="https://postgr.es/m/flat/623bcaae-112e-ced0-8c22-a84f75ae0c53%40joeconway.com">https://postgr.es/m/flat/623bcaae-112e-ced0-8c22-a84f75ae0c53%40joeconway.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86fa9b2d1b74cf7e3402c7653f7515b075eacc7b">http://git.postgresql.org/pg/commitdiff/86fa9b2d1b74cf7e3402c7653f7515b075eacc7b</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Document the "replication" option in StartupMessage. It is documented in the Streaming Replication Protocol section, but was missing from the list of options in StartupMessage description. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c4ad8b7bf420a6f598e4b45560cffc40ded0875">http://git.postgresql.org/pg/commitdiff/6c4ad8b7bf420a6f598e4b45560cffc40ded0875</a></li>

<li>Fix indentation. Oops, I forgot to "git add" this to previous commit. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cf5c31964315181e475fc37a5e9ad2204fe3484">http://git.postgresql.org/pg/commitdiff/9cf5c31964315181e475fc37a5e9ad2204fe3484</a></li>

<li>Minor cleanup of backend SCRAM code. Free each SASL message after sending it. It's not a lot of wasted memory, and it's short-lived, but the authentication code in general tries to pfree() stuff, so let's follow the example. Adding the pfree() revealed a little bug in build_server_first_message(). It attempts to keeps a copy of the sent message, but it was missing a pstrdup(), so the pointer started to dangle, after adding the pfree() into CheckSCRAMAuth(). Reword comments and debug messages slightly, while we're at it. Reviewed by Michael Paquier. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/6490b975-5ee1-6280-ac1d-af975b19fb9a@iki.fi">https://www.postgresql.org/message-id/6490b975-5ee1-6280-ac1d-af975b19fb9a@iki.fi</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00707fa58275e370dc445fa7e1130085aa04f37b">http://git.postgresql.org/pg/commitdiff/00707fa58275e370dc445fa7e1130085aa04f37b</a></li>

<li>Improve the SASL authentication protocol. This contains some protocol changes to SASL authentiation (which is new in v10): * For future-proofing, in the AuthenticationSASL message that begins SASL authentication, provide a list of SASL mechanisms that the server supports, for the client to choose from. Currently, it's always just SCRAM-SHA-256. * Add a separate authentication message type for the final server-&gt;client SASL message, which the client doesn't need to respond to. This makes it unambiguous whether the client is supposed to send a response or not. The SASL mechanism should know that anyway, but better to be explicit. Also, in the server, support clients that don't send an Initial Client response in the first SASLInitialResponse message. The server is supposed to first send an empty request in that case, to which the client will respond with the data that usually comes in the Initial Client Response. libpq uses the Initial Client Response field and doesn't need this, and I would assume any other sensible implementation to use Initial Client Response, too, but let's follow the SASL spec. Improve the documentation on SASL authentication in protocol. Add a section describing the SASL message flow, and some details on our SCRAM-SHA-256 implementation. Document the different kinds of PasswordMessages that the frontend sends in different phases of SASL authentication, as well as GSS/SSPI authentication as separate message formats. Even though they're all 'p' messages, and the exact format depends on the context, describing them as separate message formats makes the documentation more clear. Reviewed by Michael Paquier and &Aacute;lvaro Hern&aacute;ndez Tortosa. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqS-aFg0iM3AQOJwKDv_0WkAedRjs1W2X8EixSz+sKBXCQ@mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqS-aFg0iM3AQOJwKDv_0WkAedRjs1W2X8EixSz+sKBXCQ@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f3b87ab780b95c2cc8a591259baefaff4852037">http://git.postgresql.org/pg/commitdiff/4f3b87ab780b95c2cc8a591259baefaff4852037</a></li>

<li>Refactor libpq authentication request processing. Move the responsibility of reading the data from the authentication request message from PQconnectPoll() to pg_fe_sendauth(). This way, PQconnectPoll() doesn't need to know about all the different authentication request types, and we don't need the extra fields in the pg_conn struct to pass the data from PQconnectPoll() to pg_fe_sendauth() anymore. Reviewed by Michael Paquier. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/6490b975-5ee1-6280-ac1d-af975b19fb9a%40iki.fi">https://www.postgresql.org/message-id/6490b975-5ee1-6280-ac1d-af975b19fb9a%40iki.fi</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61bf96cab06390fec66405d3caad789f4417f25a">http://git.postgresql.org/pg/commitdiff/61bf96cab06390fec66405d3caad789f4417f25a</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Move isolationtester's is-blocked query into C code for speed. Commit 4deb41381 modified isolationtester's query to see whether a session is blocked to also check for waits occurring in GetSafeSnapshot. However, it did that in a way that enormously increased the query's runtime under CLOBBER_CACHE_ALWAYS, causing the buildfarm members that use that to run about four times slower than before, and in some cases fail entirely. To fix, push the entire logic into a dedicated backend function. This should actually reduce the CLOBBER_CACHE_ALWAYS runtime from what it was previously, though I've not checked that. In passing, expose a SQL function to check for safe-snapshot blockage, comparable to pg_blocking_pids. This is more or less free given the infrastructure built to solve the other problem, so we might as well. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/20170407165749.pstcakbc637opkax@alap3.anarazel.de">https://postgr.es/m/20170407165749.pstcakbc637opkax@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/511540dadf1166d80b864f63979178f324844060">http://git.postgresql.org/pg/commitdiff/511540dadf1166d80b864f63979178f324844060</a></li>

<li>Improve castNode notation by introducing list-extraction-specific variants. This extends the castNode() notation introduced by commit 5bcab1114 to provide, in one step, extraction of a list cell's pointer and coercion to a concrete node type. For example, "lfirst_node(Foo, lc)" is the same as "castNode(Foo, lfirst(lc))". Almost half of the uses of castNode that have appeared so far include a list extraction call, so this is pretty widely useful, and it saves a few more keystrokes compared to the old way. As with the previous patch, back-patch the addition of these macros to pg_list.h, so that the notation will be available when back-patching. Patch by me, after an idea of Andrew Gierth's. Discussion: <a target="_blank" href="https://postgr.es/m/14197.1491841216@sss.pgh.pa.us">https://postgr.es/m/14197.1491841216@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f0530f58061b185dc385df42e62d78a18d4ae3e">http://git.postgresql.org/pg/commitdiff/8f0530f58061b185dc385df42e62d78a18d4ae3e</a></li>

<li>Fix pgbench's --progress-timestamp option to print Unix-epoch timestamps. As a consequence of commit 1d63f7d2d, on platforms with CLOCK_MONOTONIC, you got some random timescale or other instead of standard Unix timestamps as expected. I'd attempted to fix pgbench for that change in commits 74baa1e3b and 67a875355, but missed this place. Fix in the same way as those previous commits, ie, just eat the cost of an extra gettimeofday(); one extra syscall per progress report isn't worth sweating over. Per report from Jeff Janes. In passing, use snprintf not sprintf for this purpose. I don't think there's any chance of actual buffer overrun, but it just looks safer. Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1zrQaPwBN+NcBd3pWCb=vWaiL=mmWfJjDJjh-a7eVr-Og@mail.gmail.com">https://postgr.es/m/CAMkU=1zrQaPwBN+NcBd3pWCb=vWaiL=mmWfJjDJjh-a7eVr-Og@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/feffa0e0795a5a99324890a6dd548ba162ec104c">http://git.postgresql.org/pg/commitdiff/feffa0e0795a5a99324890a6dd548ba162ec104c</a></li>

<li>Handle restriction clause lists more uniformly in postgres_fdw. Clauses in the lists retained by postgres_fdw during planning were sometimes bare boolean clauses, sometimes RestrictInfos, and sometimes a mixture of the two in the same list. The comment about that situation didn't come close to telling the full truth, either. Aside from being confusing, this had a couple of bad practical consequences: * waste of planning cycles due to inability to cache per-clause selectivity and cost estimates; * sometimes, RestrictInfos would sneak into the fdw_private list of a finished Plan node, causing failures if, for example, we tried to ship the Plan tree to a parallel worker. (It may well be that it's a bug in the parallel-query logic that we would ever try to ship such a plan to a parallel worker, but in any case this deserves to be cleaned up.) To fix, rearrange so that clause lists in PgFdwRelationInfo are always lists of RestrictInfos, and then strip the RestrictInfos at the last minute when making a Plan node. In passing do a bit of refactoring and comment cleanup in postgresGetForeignPlan and foreign_join_ok. Although the messiness here dates back at least to 9.6, there's no evidence that it causes anything worse than wasted planning cycles in 9.6, so no back-patch for now. Per fuzz testing by Andreas Seltenreich. Tom Lane and Ashutosh Bapat Discussion: <a target="_blank" href="https://postgr.es/m/87tw5x4vcu.fsf@credativ.de">https://postgr.es/m/87tw5x4vcu.fsf@credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28b047875554b29837cded70a19384dae107c61a">http://git.postgresql.org/pg/commitdiff/28b047875554b29837cded70a19384dae107c61a</a></li>

<li>Simplify handling of remote-qual pass-forward in postgres_fdw. Commit 0bf3ae88a encountered a need to pass the finally chosen remote qual conditions forward from postgresGetForeignPlan to postgresPlanDirectModify. It solved that by sticking them into the plan node's fdw_private list, which in hindsight was a pretty bad idea. In the first place, there's no use for those qual trees either in EXPLAIN or execution; indeed they could never safely be used for any post-planning purposes, because they would not get processed by setrefs.c. So they're just dead weight to carry around in the finished plan tree, plus being an attractive nuisance for somebody who might get the idea that they could be used that way. Secondly, because those qual trees (sometimes) contained RestrictInfos, they created a plan-transmission hazard for parallel query, which is how come we noticed a problem. We dealt with that symptom in commit 28b047875, but really a more straightforward and more efficient fix is to pass the data through in a new field of struct PgFdwRelationInfo. So do it that way. (There's no need to revert 28b047875, as it has sufficient reason to live anyway.) Per fuzz testing by Andreas Seltenreich. Discussion: <a target="_blank" href="https://postgr.es/m/87tw5x4vcu.fsf@credativ.de">https://postgr.es/m/87tw5x4vcu.fsf@credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88e902b769e180a232013e265ff9fd582dde125b">http://git.postgresql.org/pg/commitdiff/88e902b769e180a232013e265ff9fd582dde125b</a></li>

<li>Remove bogus redefinition of _MSC_VER. Commit a4777f355 was a shade too mechanical: we don't want to override MSVC's own definition of _MSC_VER, as that breaks tests on its numerical value. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/587d62d8562d658a2a9be60bc4574b6f9e592cb1">http://git.postgresql.org/pg/commitdiff/587d62d8562d658a2a9be60bc4574b6f9e592cb1</a></li>

<li>Mark finished Plan nodes with parallel_safe flags. We'd managed to avoid doing this so far, but it seems pretty obvious that it would be forced on us some day, and this is much the cleanest way of approaching the open problem that parallel-unsafe subplans are being transmitted to parallel workers. Anyway there's no space cost due to alignment considerations, and the time cost is pretty minimal since we're just copying the flag from the corresponding Path node. (At least in most cases ... some of the klugier spots in createplan.c have to work a bit harder.) In principle we could perhaps get rid of SubPlan.parallel_safe, but I thought it better to keep that in case there are reasons to consider a SubPlan unsafe even when its child plan is parallel-safe. This patch doesn't actually do anything with the new flags, but I thought I'd commit it separately anyway. Note: although this touches outfuncs/readfuncs, there's no need for a catversion bump because Plan trees aren't stored on disk. Discussion: <a target="_blank" href="https://postgr.es/m/87tw5x4vcu.fsf@credativ.de">https://postgr.es/m/87tw5x4vcu.fsf@credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/003d80f3dfadd57c6aac8480436ff53ee2c978bd">http://git.postgresql.org/pg/commitdiff/003d80f3dfadd57c6aac8480436ff53ee2c978bd</a></li>

<li>Avoid transferring parallel-unsafe subplans to parallel workers. Commit 5e6d8d2bb allowed parallel workers to execute parallel-safe subplans, but it transmitted the query's entire list of subplans to the worker(s). Since execMain.c blindly does ExecInitNode and later ExecEndNode on every list element, this resulted in parallel-unsafe plan nodes nonetheless getting started up and shut down in parallel workers. That seems mostly harmless as far as core plan node types go (but maybe not so much for Gather?). But it resulted in postgres_fdw opening and then closing extra remote connections, and it's likely that other non-parallel-safe FDWs or custom scan providers would have worse reactions. To fix, just make ExecSerializePlan replace parallel-unsafe subplans with NULLs in the cut-down plan tree that it transmits to workers. This relies on ExecInitNode and ExecEndNode to do nothing on NULL input, but they do anyway. If anything else is touching the dropped subplans in a parallel worker, that would be a bug to be fixed. (This thus provides a strong guarantee that we won't try to do something with a parallel-unsafe subplan in a worker.) This is, I think, the last fix directly occasioned by Andreas Seltenreich's bug report of a few days ago. Tom Lane and Amit Kapila Discussion: <a target="_blank" href="https://postgr.es/m/87tw5x4vcu.fsf@credativ.de">https://postgr.es/m/87tw5x4vcu.fsf@credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16ebab68862bb5d3595b8c8df083f650d9d7cd20">http://git.postgresql.org/pg/commitdiff/16ebab68862bb5d3595b8c8df083f650d9d7cd20</a></li>

<li>Speed up hash_index regression test. Commit f5ab0a14e made this test take substantially longer than it used to. With a bit more care, we can get the runtime back down while achieving the same, or even a bit better, code coverage. Mithun Cy Discussion: <a target="_blank" href="https://postgr.es/m/CAD__Ouh-qaEb+rD7Uy-4g3xQYOrhPzHs-a_TrFAjiQ5azAW5+w@mail.gmail.com">https://postgr.es/m/CAD__Ouh-qaEb+rD7Uy-4g3xQYOrhPzHs-a_TrFAjiQ5azAW5+w@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a8bc39b08aa83694f22ea56a8626e91e28a0227">http://git.postgresql.org/pg/commitdiff/4a8bc39b08aa83694f22ea56a8626e91e28a0227</a></li>

<li>Move bootstrap-time lookup of regproc OIDs into genbki.pl. Formerly, the bootstrap backend looked up the OIDs corresponding to names in regproc catalog entries using brute-force searches of pg_proc. It was somewhat remarkable that that worked at all, since it was used while populating other pretty-fundamental catalogs like pg_operator. And it was also quite slow, and getting slower as pg_proc gets bigger. This patch moves the lookup work into genbki.pl, so that the values in postgres.bki for regproc columns are always numeric OIDs, an option that regprocin() already supported. Perl isn't the world's speediest language, so this about doubles the time needed to run genbki.pl (from 0.3 to 0.6 sec on my machine). But we only do that at most once per build. The time needed to run initdb drops significantly --- on my machine, initdb --no-sync goes from 1.8 to 1.3 seconds. So this is a small net win even for just one initdb per build, and it becomes quite a nice win for test sequences requiring many initdb runs. Strip out the now-dead code for brute-force catalog searching in regprocin. We'd also cargo-culted similar logic into regoperin and some (not all) of the other reg*in functions. That is all dead code too since we currently have no need to load such values during bootstrap. I removed it all, reasoning that if we ever need such functionality it'd be much better to do it in a similar way to this patch. There might be some simplifications possible in the backend now that regprocin doesn't require doing catalog reads so early in bootstrap. I've not looked into that, though. Andreas Karlsson, with some small adjustments by me Discussion: <a target="_blank" href="https://postgr.es/m/30896.1492006367@sss.pgh.pa.us">https://postgr.es/m/30896.1492006367@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e39f06cfe65acbecedf42a660f577c3fca47bcc">http://git.postgresql.org/pg/commitdiff/5e39f06cfe65acbecedf42a660f577c3fca47bcc</a></li>

<li>Fix regexport.c to behave sanely with lookaround constraints. regexport.c thought it could just ignore LACON arcs, but the correct behavior is to treat them as satisfiable while consuming zero input (rather reminiscently of commit 9f1e642d5). Otherwise, the emitted simplified-NFA representation may contain no paths leading from initial to final state, which unsurprisingly confuses pg_trgm, as seen in bug #14623 from Jeff Janes. Since regexport's output representation has no concept of an arc that consumes zero input, recurse internally to find the next normal arc(s) after any LACON transitions. We'd be forced into changing that representation if a LACON could be the last arc reaching the final state, but fortunately the regex library never builds NFAs with such a configuration, so there always is a next normal arc. Back-patch to 9.3 where this logic was introduced. Discussion: <a target="_blank" href="https://postgr.es/m/20170413180503.25948.94871@wrigleys.postgresql.org">https://postgr.es/m/20170413180503.25948.94871@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cfaffc0ddc73dab6857c094f98b28761898cc6d">http://git.postgresql.org/pg/commitdiff/6cfaffc0ddc73dab6857c094f98b28761898cc6d</a></li>

<li>Further fix pg_trgm's extraction of trigrams from regular expressions. Commit 9e43e8714 turns out to have been insufficient: not only is it necessary to track tentative parent links while considering a set of arc removals, but it's necessary to track tentative flag additions as well. This is because we always merge arc target states into arc source states; therefore, when considering a merge of the final state with some other, it is the other state that will acquire a new TSTATE_FIN bit. If there's another arc for the same color trigram that would cause merging of that state with the initial state, we failed to recognize the problem. The test cases for the prior commit evidently only exercised situations where a tentative merge with the initial state occurs before one with the final state. If it goes the other way around, we'll happily merge the initial and final states, either producing a broken final graph that would never match anything, or triggering the Assert added by the prior commit. It's tempting to consider switching the merge direction when the merge involves the final state, but I lack the time to analyze that idea in detail. Instead just keep track of the flag changes that would result from proposed merges, in the same way that the prior commit tracked proposed parent links. Along the way, add some more debugging support, because I'm not entirely confident that this is the last bug here. And tweak matters so that the transformed.dot file uses small integers rather than pointer values to identify states; that makes it more readable if you're just eyeballing it rather than fooling with Graphviz. And rename a couple of identically named struct fields to reduce confusion. Per report from Corey Csuhta. Add a test case based on his example. (Note: this case does not trigger the bug under 9.3, apparently because its different measurement of costs causes it to stop merging states before it hits the failure. I spent some time trying to find a variant that would fail in 9.3, without success; but I'm sure such cases exist.) Like the previous patch, back-patch to 9.3 where this code was added. Report: <a target="_blank" href="https://postgr.es/m/E2B01A4B-4530-406B-8D17-2F67CF9A16BA@csuhta.com">https://postgr.es/m/E2B01A4B-4530-406B-8D17-2F67CF9A16BA@csuhta.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1dffabed49054a81b6005a363ab2da4aee0aab9e">http://git.postgresql.org/pg/commitdiff/1dffabed49054a81b6005a363ab2da4aee0aab9e</a></li>

<li>Use one transaction while reading postgres.bki, not one per line. AFAICT, the only actual benefit of closing a bootstrap transaction is to reclaim transient memory. We can do that a lot more cheaply by just doing a MemoryContextReset on a suitable context. This gets the runtime of the "bootstrap" phase of initdb down to the point where, at least by eyeball, it's quite negligible compared to the rest of the phases. Per discussion with Andres Freund. Discussion: <a target="_blank" href="https://postgr.es/m/9244.1492106743@sss.pgh.pa.us">https://postgr.es/m/9244.1492106743@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85a0781334a204c15c9c6ea9d3e6c75334c2beb6">http://git.postgresql.org/pg/commitdiff/85a0781334a204c15c9c6ea9d3e6c75334c2beb6</a></li>

<li>Avoid passing function pointers across process boundaries. We'd already recognized that we can't pass function pointers across process boundaries for functions in loadable modules, since a shared library could get loaded at different addresses in different processes. But actually the practice doesn't work for functions in the core backend either, if we're using EXEC_BACKEND. This is the cause of recent failures on buildfarm member culicidae. Switch to passing a string function name in all cases. Something like this needs to be back-patched into 9.6, but let's see if the buildfarm likes it first. Petr Jelinek, with a bunch of basically-cosmetic adjustments by me Discussion: <a target="_blank" href="https://postgr.es/m/548f9c1d-eafa-e3fa-9da8-f0cc2f654e60@2ndquadrant.com">https://postgr.es/m/548f9c1d-eafa-e3fa-9da8-f0cc2f654e60@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32470825d36d99a81347ee36c181d609c952c061">http://git.postgresql.org/pg/commitdiff/32470825d36d99a81347ee36c181d609c952c061</a></li>

<li>More cleanup of manipulations of hash indexes' hasho_flag field. Not much point in defining test macros for the flag bits if we don't use 'em. Amit Kapila <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/083dc95a14c05bdaeec3015508ca1d16fc7483b5">http://git.postgresql.org/pg/commitdiff/083dc95a14c05bdaeec3015508ca1d16fc7483b5</a></li>

<li>Clean up manipulations of hash indexes' hasho_flag field. Standardize on testing a hash index page's type by doing (opaque-&gt;hasho_flag &amp; LH_PAGE_TYPE) == LH_xxx_PAGE. Various places were taking shortcuts like opaque-&gt;hasho_flag &amp; LH_BUCKET_PAGE which while not actually wrong, is still bad practice because it encourages use of opaque-&gt;hasho_flag &amp; LH_UNUSED_PAGE which *is* wrong (LH_UNUSED_PAGE == 0, so the above is constant false). hash_xlog.c's hash_mask() contained such an incorrect test. This also ensures that we mask out the additional flag bits that hasho_flag has accreted since 9.6. pgstattuple's pgstat_hash_page(), for one, was failing to do that and was thus actively broken. Also fix assorted comments that hadn't been updated to reflect the extended usage of hasho_flag, and fix some macros that were testing just "(hasho_flag &amp; bit)" to use the less dangerous, project-approved form "((hasho_flag &amp; bit) != 0)". Coverity found the bug in hash_mask(); I noted the one in pgstat_hash_page() through code reading. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2040bb4a0b50ef0434a1a723f00d040ab4f1c06f">http://git.postgresql.org/pg/commitdiff/2040bb4a0b50ef0434a1a723f00d040ab4f1c06f</a></li>

<li>Fix erroneous cross-reference in comment. Seems to have been introduced in commit c219d9b0a. I think there indeed was a "tupbasics.h" in some early drafts of that refactoring, but it didn't survive into the committed version. Amit Kapila <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfba563bc5d80263637a3cfba6a572c20949defe">http://git.postgresql.org/pg/commitdiff/bfba563bc5d80263637a3cfba6a572c20949defe</a></li>

<li>Provide a way to control SysV shmem attach address in EXEC_BACKEND builds. In standard non-Windows builds, there's no particular reason to care what address the kernel chooses to map the shared memory segment at. However, when building with EXEC_BACKEND, there's a risk that the chosen address won't be available in all child processes. Linux with ASLR enabled (which it is by default) seems particularly at risk because it puts shmem segments into the same area where it maps shared libraries. We can work around that by specifying a mapping address that's outside the range where shared libraries could get mapped. On x86_64 Linux, 0x7e0000000000 seems to work well. This is only meant for testing/debugging purposes, so it doesn't seem necessary to go as far as providing a GUC (or any user-visible documentation, though we might change that later). Instead, it's just controlled by setting an environment variable PG_SHMEM_ADDR to the desired attach address. Back-patch to all supported branches, since the point here is to remove intermittent buildfarm failures on EXEC_BACKEND animals. Owners of affected animals will need to add a suitable setting of PG_SHMEM_ADDR to their build_env configuration. Discussion: <a target="_blank" href="https://postgr.es/m/7036.1492231361@sss.pgh.pa.us">https://postgr.es/m/7036.1492231361@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a74740fbd3bb89cd626f6e98417847f696e60bd8">http://git.postgresql.org/pg/commitdiff/a74740fbd3bb89cd626f6e98417847f696e60bd8</a></li>

<li>Sync addRangeTableEntryForENR() with its peer functions. addRangeTableEntryForENR had a check for pstate != NULL, which Coverity pointed out was rather useless since it'd already dereferenced pstate before that. More to the point, we'd established policy in commit bc93ac12c that we'd require non-NULL pstate for all addRangeTableEntryFor* functions; this test was evidently copied-and-pasted from some older version of one of those functions. Make it look more like the others. In passing, make an elog message look more like the rest of the code, too. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1888b59b511b42290a6fcfa87e35323d128c4f6">http://git.postgresql.org/pg/commitdiff/a1888b59b511b42290a6fcfa87e35323d128c4f6</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix whitespace. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/244f1c89070c1a661623bf1eaddf1307f8f598a3">http://git.postgresql.org/pg/commitdiff/244f1c89070c1a661623bf1eaddf1307f8f598a3</a></li>

<li>Support configuration reload in logical replication workers. Author: Michael Paquier &lt;michael.paquier@gmail.com&gt; Reviewed-by: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; Reported-by: Fujii Masao &lt;masao.fujii@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26ad194cb0a6b955e155d44fb52a74212ce85759">http://git.postgresql.org/pg/commitdiff/26ad194cb0a6b955e155d44fb52a74212ce85759</a></li>

<li>Fix typo in comment. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56dd8e85c40fef3e3c2c10afa186ee30416ec507">http://git.postgresql.org/pg/commitdiff/56dd8e85c40fef3e3c2c10afa186ee30416ec507</a></li>

<li>Use weaker locks when updating pg_subscription_rel. The previously used ShareRowExclusiveLock, while technically probably more correct, led to deadlocks during seemingly unrelated operations and thus a poor experience. Use RowExclusiveLock, like for most similar catalog operations. In some care cases, the user might see an error from DDL commands. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/13592.1490851519%40sss.pgh.pa.us">https://www.postgresql.org/message-id/flat/13592.1490851519%40sss.pgh.pa.us</a> Author: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/521fd4795e3ec3d0b263b62e5eb58e1557be9c86">http://git.postgresql.org/pg/commitdiff/521fd4795e3ec3d0b263b62e5eb58e1557be9c86</a></li>

<li>Remove some tabs in SQL code in C string literals. This is not handled uniformly throughout the code, but at least nearby code can be consistent. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35b5f7b608fa1ae12d07cd475c382c5f1341648d">http://git.postgresql.org/pg/commitdiff/35b5f7b608fa1ae12d07cd475c382c5f1341648d</a></li>

<li>doc: Tweak CSS. Tweak CSS a bit to match latest similar changes to web site style. Also move some CSS out of the HTML to the stylesheet so that the web site stylesheet can override it. This should ensure that notes and such are back to being centered. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6f9f8a24cdf1bc8a714c65dc45fd67fef59217a">http://git.postgresql.org/pg/commitdiff/f6f9f8a24cdf1bc8a714c65dc45fd67fef59217a</a></li>

<li>pg_dump: Dump subscriptions by default. Dump subscriptions if the current user is a superuser, otherwise write a warning and skip them. Remove the pg_dump option --include-subscriptions. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/e4fbfad5-c6ac-fd50-6777-18c84b34eb2f@2ndquadrant.com">https://www.postgresql.org/message-id/e4fbfad5-c6ac-fd50-6777-18c84b34eb2f@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c31671f9b5f6eee9b6726baad2db1795c94839d1">http://git.postgresql.org/pg/commitdiff/c31671f9b5f6eee9b6726baad2db1795c94839d1</a></li>

<li>pg_dump: Always dump subscriptions NOCONNECT. This removes the pg_dump option --no-subscription-connect and makes it the default. Dumping a subscription so that it activates right away when restored is not very useful, because the state of the publication server is unclear. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/e4fbfad5-c6ac-fd50-6777-18c84b34eb2f@2ndquadrant.com">https://www.postgresql.org/message-id/e4fbfad5-c6ac-fd50-6777-18c84b34eb2f@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9254e675bde7dc2d976d207450c559d914c0dd6">http://git.postgresql.org/pg/commitdiff/a9254e675bde7dc2d976d207450c559d914c0dd6</a></li>

<li>pg_dumpall: Allow --no-role-passwords and --binary-upgrade together. This was introduced as part of the patch to add --no-role-passwords, but while it's an unusual combination, there is no actual reason to prevent it. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff46f2a0534560367ba748ac9d859a2cf05ce3fc">http://git.postgresql.org/pg/commitdiff/ff46f2a0534560367ba748ac9d859a2cf05ce3fc</a></li>

<li>Make header self-contained. Add necessary include files for things used in the header. (signal.h needed for sig_atomic_t.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d04eac1148a491177cf107fbedc678bcc68b4e31">http://git.postgresql.org/pg/commitdiff/d04eac1148a491177cf107fbedc678bcc68b4e31</a></li>

<li>pg_dump: Dump comments and security labels for publication and subscriptions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf615fbaa9893af42ba0f58a02dd52107bde0048">http://git.postgresql.org/pg/commitdiff/cf615fbaa9893af42ba0f58a02dd52107bde0048</a></li>

<li>Remove trailing spaces in some output. Author: Alexander Law &lt;exclusion@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/674677c705f11464857e6dfd0a0d6104656d9c4a">http://git.postgresql.org/pg/commitdiff/674677c705f11464857e6dfd0a0d6104656d9c4a</a></li>

<li>Remove useless trailing spaces in queries in C strings. Author: Alexander Law &lt;exclusion@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c22327f269eb3bec25327b0e620bdca082e4628">http://git.postgresql.org/pg/commitdiff/0c22327f269eb3bec25327b0e620bdca082e4628</a></li>

<li>Remove pstrdup of TextDatumGetCString. The result of TextDatumGetCString is already palloc'ed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25371a72b95aab43b0a3547ead4d3286c1128351">http://git.postgresql.org/pg/commitdiff/25371a72b95aab43b0a3547ead4d3286c1128351</a></li>

<li>Add option to modify sync commit per subscription. This also changes default behaviour of subscription workers to synchronous_commit = off. Author: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/887227a1cc861d87ca0f175cf8bd1447554090eb">http://git.postgresql.org/pg/commitdiff/887227a1cc861d87ca0f175cf8bd1447554090eb</a></li>

<li>Fix typo in comment. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e5f9a6dc0a9e417544692db56d2c80a64dd83c7">http://git.postgresql.org/pg/commitdiff/6e5f9a6dc0a9e417544692db56d2c80a64dd83c7</a></li>

<li>Catversion bump. for commit 887227a1cc861d87ca0f175cf8bd1447554090eb <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67c2def11d49de05aacd959ecdffc6736f52efee">http://git.postgresql.org/pg/commitdiff/67c2def11d49de05aacd959ecdffc6736f52efee</a></li>

<li>Report statistics in logical replication workers. Author: Stas Kelvich &lt;s.kelvich@postgrespro.ru&gt; Author: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; Reported-by: Fujii Masao &lt;masao.fujii@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/139eb9673cb84c76f493af7e68301ae204199746">http://git.postgresql.org/pg/commitdiff/139eb9673cb84c76f493af7e68301ae204199746</a></li>

<li>doc: Fix typo. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a617ab3e691aec56725960e6d28c98c8af6ddaa">http://git.postgresql.org/pg/commitdiff/5a617ab3e691aec56725960e6d28c98c8af6ddaa</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix reporting of violations in ExecConstraints, again. We decided in f1b4c771ea74f42447dccaed42ffcdcccf3aa694 to pass the original slot to ExecConstraints(), but that breaks when there are BEFORE ROW triggers involved. So we need to do reverse-map the tuples back to the original descriptor instead, as Amit originally proposed. Amit Langote, reviewed by Ashutosh Bapat. One overlooked comment fixed by me. Discussion: <a target="_blank" href="http://postgr.es/m/b3a17254-6849-e542-2353-bde4e880b6a4@lab.ntt.co.jp">http://postgr.es/m/b3a17254-6849-e542-2353-bde4e880b6a4@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0a8ae7be392aa09dd7e148ff662013e8e148893">http://git.postgresql.org/pg/commitdiff/c0a8ae7be392aa09dd7e148ff662013e8e148893</a></li>

<li>Fix possibile deadlock when dropping partitions. heap_drop_with_catalog and RangeVarCallbackForDropRelation should lock the parent before locking the target relation. Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/29588799-a8ce-b0a2-3dae-f39ff6d35922@lab.ntt.co.jp">http://postgr.es/m/29588799-a8ce-b0a2-3dae-f39ff6d35922@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/258cef12540fa1cb244881a0f019cefd698c809e">http://git.postgresql.org/pg/commitdiff/258cef12540fa1cb244881a0f019cefd698c809e</a></li>

<li>Fix failure when a shared tidbitmap has only one page. Commit 98e6e89040a0534ca26914c66cae9dd49ef62ad9 made inadequate provision for the case of a single-page shared tidbitmap. It allocate space for a shared PagetableEntry, but failed to initialize it. Report by Thomas Munro. Patch by Dilip Kumar, with some comment changes by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAEepm=19Cmnfbi-j2Bw-a6yGPeHE1OVhKvvKz9bRBTJGKfGHMA@mail.gmail.com">http://postgr.es/m/CAEepm=19Cmnfbi-j2Bw-a6yGPeHE1OVhKvvKz9bRBTJGKfGHMA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c3b59abf4c476843bca23de7fb66d647627f30e">http://git.postgresql.org/pg/commitdiff/4c3b59abf4c476843bca23de7fb66d647627f30e</a></li>

<li>Fix confusion of max_parallel_workers mechanism following crash. Commit b460f5d6693103076dc554aa7cbb96e1e53074f9 failed to contemplate the possibilit that a parallel worker registered before a crash would be unregistered only after the crash; if that happened, we'd end up with parallel_terminate_count &gt; parallel_register_count and the system would refuse to launch any more parallel workers. The easiest way to fix that seems to be to forget BGW_NEVER_RESTART workers in ResetBackgroundWorkerCrashTimes() rather than leaving them around to be cleaned up after the conclusion of the restart, so that they go away before rather than after shared memory is reset. To make sure that this fix is water-tight, don't allow parallel workers to be anything other than BGW_NEVER_RESTART, so that after recovering from a crash, 0 is guaranteed to be the correct starting value for parallel_register_count. The core code wouldn't do this anyway, but somebody might try to do it in extension code. Report by Thomas Vondra. Patch by me, reviewed by Kuntal Ghosh. Discussion: <a target="_blank" href="http://postgr.es/m/CAGz5QC+AVEVS+3rBKRq83AxkJLMZ1peMt4nnrQwczxOrmo3CNw@mail.gmail.com">http://postgr.es/m/CAGz5QC+AVEVS+3rBKRq83AxkJLMZ1peMt4nnrQwczxOrmo3CNw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ff518699f19dd0a5076f5090bac8400b8233f7f">http://git.postgresql.org/pg/commitdiff/8ff518699f19dd0a5076f5090bac8400b8233f7f</a></li>

<li>Add an Assert() to max_parallel_workers enforcement. To prevent future bugs along the lines of the one corrected by commit 8ff518699f19dd0a5076f5090bac8400b8233f7f, or find any that remain in the current code, add an Assert() that the difference between parallel_register_count and parallel_terminate_count is in a sane range. Kuntal Ghosh, with considerable tidying-up by me, per a suggestion from Neha Khatri. Reviewed by Tomas Vondra. Discussion: <a target="_blank" href="http://postgr.es/m/CAFO0U+-E8yzchwVnvn5BeRDPgX2z9vZUxQ8dxx9c0XFGBC7N1Q@mail.gmail.com">http://postgr.es/m/CAFO0U+-E8yzchwVnvn5BeRDPgX2z9vZUxQ8dxx9c0XFGBC7N1Q@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6599c9ac3340b6cd3d86a0a7f866b80a009fecab">http://git.postgresql.org/pg/commitdiff/6599c9ac3340b6cd3d86a0a7f866b80a009fecab</a></li>

<li>Allow a rule on partitioned table to be renamed. Commit f0e44751d7175fa3394da2c8f85e3ceb3cdbfe63 should have updated this code, but did not. Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/52d9c443-ec78-5c8a-7a77-0f34aad12b82@lab.ntt.co.jp">http://postgr.es/m/52d9c443-ec78-5c8a-7a77-0f34aad12b82@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02af7857e5694b13c21401d1982ac21d31e27dee">http://git.postgresql.org/pg/commitdiff/02af7857e5694b13c21401d1982ac21d31e27dee</a></li>

<li>Code review for c94e6942cefe7d20c5feed856e27f672734b1e2b. validateCheckConstraint() shouldn't try to access the storage for a partitioned table, because it no longer has any. Creating a _RETURN table on a partitioned table shouldn't be allowed, both because there's no value in it and because trying to do so would involve a validation scan against its nonexistent storage. Amit Langote, reviewed by Tom Lane. Regression test outputs updated to pass by me. Discussion: <a target="_blank" href="http://postgr.es/m/e5c3cbd3-1551-d6f8-c9e2-51777d632fd2@lab.ntt.co.jp">http://postgr.es/m/e5c3cbd3-1551-d6f8-c9e2-51777d632fd2@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d5fede4a900d135745c1fa5a70dcfe0b3359e3d">http://git.postgresql.org/pg/commitdiff/1d5fede4a900d135745c1fa5a70dcfe0b3359e3d</a></li>

<li>Fix pgstattuple's handling of unused hash pages. Hash indexes can contain both pages which are all-zeroes (i.e. PageIsNew()) and pages which have been initialized but currently aren't used. The latter category can happen either when a page has been reserved but not yet used or when it is used for a time and then freed. pgstattuple was only prepared to deal with the pages that are actually-zeroes, which it called zero_pages. Rename the column to unused_pages (extension version 1.5 is as-yet-unreleased) and make it count both kinds of unused pages. Along the way, slightly tidy up the way we test for pages of various types. Robert Haas and Ashutosh Sharma, reviewed by Amit Kapila Discussion: <a target="_blank" href="http://postgr.es/m/CAE9k0PkTtKFB3YndOyQMjwuHx+-FtUP1ynK8E-nHtetoow3NtQ@mail.gmail.com">http://postgr.es/m/CAE9k0PkTtKFB3YndOyQMjwuHx+-FtUP1ynK8E-nHtetoow3NtQ@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cc27566c1a8d659c15b9eea2413dcc07a7a42c9">http://git.postgresql.org/pg/commitdiff/9cc27566c1a8d659c15b9eea2413dcc07a7a42c9</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix initialization of dsa.c free area counter. The backend local copy of dsa_area_control-&gt;freed_segment_counter was not properly initialized / maintained. This could, if unlucky, lead to keeping attached to a segment for too long. Found via valgrind bleat on buildfarm animal skink. Author: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/20170407164935.obsf2jipjfos5zei@alap3.anarazel.de">https://postgr.es/m/20170407164935.obsf2jipjfos5zei@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c45b1d2283c6631b990de25098ea389a1b96277a">http://git.postgresql.org/pg/commitdiff/c45b1d2283c6631b990de25098ea389a1b96277a</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Run most pg_dump and pg_dumpall tests with --no-sync. Commit 96a7128b made pg_dump and pg_dumpall sync their output by default. However, there's no great need for that in testing, and it could impose a performance penalty, so we add the --no-sync flag to most of the test cases. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3820c63da8d0e59e2bd4476e91968f03be5dd041">http://git.postgresql.org/pg/commitdiff/3820c63da8d0e59e2bd4476e91968f03be5dd041</a></li>

<li>Downcase "Wincrypt.h". This is consistent with how we refer to other Windows include files, and prevents a failure when cross-compiling on a system with case sensitive file names. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0eba6be1b8d37fa368a45795ba350d46cc86df54">http://git.postgresql.org/pg/commitdiff/0eba6be1b8d37fa368a45795ba350d46cc86df54</a></li>

<li>Make sure to run one initdb TAP test with no TZ set. That way we make sure that initdb's time zone setting code is exercised. This doesn't add an extra test, it just alters an existing test. Discussion: &lt;<a target="_blank" href="https://postgr.es/m/5807.1492229253@sss.pgh.pa.us%3E">https://postgr.es/m/5807.1492229253@sss.pgh.pa.us&gt;</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/033b969edde62c84ee15b53972ee638150a28c90">http://git.postgresql.org/pg/commitdiff/033b969edde62c84ee15b53972ee638150a28c90</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Document that bytea is best represented as char * in C for ecpg. Patch by Kato, Sho &lt;kato-sho@jp.fujitsu.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a6940bdcb9ef87a54459deac5699a61cfdbc696c">http://git.postgresql.org/pg/commitdiff/a6940bdcb9ef87a54459deac5699a61cfdbc696c</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Remove support for bcc and msvc standalone libpq builds. This removes the support for building just libpq using Borland C++ or Visual C++. This has not worked properly for years, and given the number of complaints it's clearly not worth the maintenance burden. Building libpq using the standard MSVC build system is of course still supported, along with mingw. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6da56f3f84d430671d5edd8f9336bd744c089e31">http://git.postgresql.org/pg/commitdiff/6da56f3f84d430671d5edd8f9336bd744c089e31</a></li>

<li>Remove symbol WIN32_ONLY_COMPILER. This used to mean "Visual C++ except in those parts where Borland C++ was supported where it meant one of those". Now that we don't support Borland C++ anymore, simplify by using _MSC_VER which is the normal way to detect Visual C++. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4777f35565b80ae10605d6d417e5d173156f7da">http://git.postgresql.org/pg/commitdiff/a4777f35565b80ae10605d6d417e5d173156f7da</a></li>

<li>Fix reversed check of return value from sync. While at it also update the comments in walmethods.h to make it less likely for mistakes like this to appear in the future (thanks to Tom for improvements to the comments). And finally, in passing change the return type of walmethod.getlasterror to being const, also per suggestion from Tom. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b935eb7da37254a18c48acc7b07517c8dfbb2339">http://git.postgresql.org/pg/commitdiff/b935eb7da37254a18c48acc7b07517c8dfbb2339</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: Improve window function docs. Specifically, the behavior of general-purpose and statistical aggregates as window functions was not clearly documented, and terms were inconsistently used. Also add docs about the difference between cume_dist and percent_rank, rather than just the formulas. Discussion: 20170406214918.GA5757@momjian.us <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c1a4726eba5bb8c0772db8a8efe0315d71887fb">http://git.postgresql.org/pg/commitdiff/1c1a4726eba5bb8c0772db8a8efe0315d71887fb</a></li>

<li>doc: clearify pg_upgrade default copy behavior. Reported-by: Marek &lt;marek.cvoren@gmail.com&gt; Discussion: 20170328110253.2695.62609@wrigleys.postgresql.org <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e298b8dbb3220a0d5e073e0ad6a8afd35042c2a">http://git.postgresql.org/pg/commitdiff/1e298b8dbb3220a0d5e073e0ad6a8afd35042c2a</a></li>

<li>git_changelog: improve instructions for finding branch commits. Specifically, use '--summary' with 'git show'. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/854854019a282b6e74f586a3ee8c88c791193d32">http://git.postgresql.org/pg/commitdiff/854854019a282b6e74f586a3ee8c88c791193d32</a></li>

<li>git_changelog: improve comment. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1c86a55762c81ffbcf3985f7eb711026d40824f">http://git.postgresql.org/pg/commitdiff/e1c86a55762c81ffbcf3985f7eb711026d40824f</a></li>

<li>docs: update major release instructions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06fc54cd4355caf8e271ffc864885ccaa879159e">http://git.postgresql.org/pg/commitdiff/06fc54cd4355caf8e271ffc864885ccaa879159e</a></li>

<li>doc: add missing sect1 close tag. Fixes commit 4f3b87ab780b95c2cc8a591259baefaff4852037 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/885fea5a34b036983379688d707b2a20735ebe4a">http://git.postgresql.org/pg/commitdiff/885fea5a34b036983379688d707b2a20735ebe4a</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Add max_sync_workers_per_subscription to postgresql.conf.sample. This commit also does * add REPLICATION_SUBSCRIBERS into config_group * mark max_logical_replication_workers and max_sync_workers_per_subscription as REPLICATION_SUBSCRIBERS parameters * move those parameters into "Subscribers" section in postgresql.conf.sample Author: Masahiko Sawada, Petr Jelinek and me Reported-by: Masahiko Sawada Discussion: <a target="_blank" href="http://postgr.es/m/CAD21AoAonSCoa=v=87ZO3vhfUZA1k_E2XRNHTt=xioWGUa+0ug@mail.gmail.com">http://postgr.es/m/CAD21AoAonSCoa=v=87ZO3vhfUZA1k_E2XRNHTt=xioWGUa+0ug@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff7bce174390ae063c122ab04020bd4ee070d6ad">http://git.postgresql.org/pg/commitdiff/ff7bce174390ae063c122ab04020bd4ee070d6ad</a></li>

<li>Improve tab-completion of DDL for publication and subscription. Author: Masahiko Sawada Discussion: <a target="_blank" href="http://postgr.es/m/CAD21AoC32YgtateNqTFXzTJmHHe6hXs4cpJTND3n-Ts8f-aMqw@mail.gmail.com">http://postgr.es/m/CAD21AoC32YgtateNqTFXzTJmHHe6hXs4cpJTND3n-Ts8f-aMqw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c525f740661104e3d8578a133ed6b4a8cd7028ac">http://git.postgresql.org/pg/commitdiff/c525f740661104e3d8578a133ed6b4a8cd7028ac</a></li>

<li>Improve documentations for ALTER PUBLICATION and ALTER SUBSCRIPTION. Discussion: <a target="_blank" href="http://postgr.es/m/CAD21AoC32YgtateNqTFXzTJmHHe6hXs4cpJTND3n-Ts8f-aMqw@mail.gmail.com">http://postgr.es/m/CAD21AoC32YgtateNqTFXzTJmHHe6hXs4cpJTND3n-Ts8f-aMqw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a6e7d591d0129bc7f1f186cb40a6ebd7963956ab">http://git.postgresql.org/pg/commitdiff/a6e7d591d0129bc7f1f186cb40a6ebd7963956ab</a></li>

<li>Move pg_stat_progress_vacuum to the table of Dynamic Statistics Views in doc. Previously the description about pg_stat_progress_vacuum was in the table of "Collected Statistics Views" in the doc. But since it repors dynamic information, i.e., the current progress of VACUUM, its description should be in the table of "Dynamic Statistics Views". Back-patch to 9.6 where pg_stat_progress_vacuum was added. Author: Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/7ab51b59-8d4d-6193-c60a-b75f222efb12@lab.ntt.co.jp">http://postgr.es/m/7ab51b59-8d4d-6193-c60a-b75f222efb12@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a3e8d7b503c25e009b9f591554617a2434c72eb">http://git.postgresql.org/pg/commitdiff/7a3e8d7b503c25e009b9f591554617a2434c72eb</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Mention pg_index changes also cause relcache invalidation. Amit Langote, additional line by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c2ecddcffba979ce3457bce3655136b6230a127">http://git.postgresql.org/pg/commitdiff/2c2ecddcffba979ce3457bce3655136b6230a127</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Remove pg_stats_ext view. It was created as equivalent of pg_stats, but since the code underlying pg_statistic_ext is more convenient than the one for pg_statistic, pg_stats_ext is no longer useful. Author: David Rowley Reviewed-by: Tomas Vondra Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f9zAkPUf9nQrqpFBAsrOHvb5eYa2FVNsmCJy1wegcO_TQ@mail.gmail.com">https://postgr.es/m/CAKJS1f9zAkPUf9nQrqpFBAsrOHvb5eYa2FVNsmCJy1wegcO_TQ@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d5facfd9ab66c819ed583b2614b0560405a6aa2">http://git.postgresql.org/pg/commitdiff/3d5facfd9ab66c819ed583b2614b0560405a6aa2</a></li>

<li>Catversion bump forgotten in previous commit. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27bcc372b1b323f2d6e0958a05a66b119cfdda38">http://git.postgresql.org/pg/commitdiff/27bcc372b1b323f2d6e0958a05a66b119cfdda38</a></li>

<li>Fix XMLTABLE synopsis, add XMLNAMESPACES example. Add a missing comma in the synopsis after the XMLNAMESPACES clause. Also, add an example illustrating the use of that clause. Author: Arjen Nienhuis and Pavel St&#283;hule <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73c1748d833617c6ba19750236f8e09beedb132a">http://git.postgresql.org/pg/commitdiff/73c1748d833617c6ba19750236f8e09beedb132a</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&euml;l Paquier sent in another revision of a patch to use base64-based encoding for stored and server keys in SCRAM verifiers, move the routine to build SCRAM verifier into src/common/, refactor frontend-side random number generation, extend PQencryptPassword with a hashing method, and extend psql's \password and createuser to handle SCRAM.</p>

<p>Micha&euml;l Paquier sent in a patch to change pg_hba.conf to refer to SASL, the thing being implemented, instead of SCRAM, one implementation of it.</p>

<p>Ildar Musin sent in a patch to factor out some repetitive code in RI triggers.</p>

<p>Peter Eisentraut sent in two revisions of a patch to fix some warnings generated by gcc7.</p>

<p>David Rowley sent in a patch to allow extended stats on foreign and partitioned tables.</p>

<p>Peter Eisentraut and Bruce Momjian traded patches to fix an issue around HTML rendering in the new documentation toolchain.</p>

<p>Jeff Davis sent in two more revisions of a patch to implement range merge joins.</p>

<p>Alexander Kuzmenkov sent in a patch to implement an index-only count(*) for indexes supporting bitmap scans.</p>

<p>Craig Ringer and Mithun Cy traded patches to make TAP tests run faster.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to fix wal_level_minimal.</p>

<p>Amit Langote sent in three more revisions of a patch to fix how pg_dump emits partition attributes.</p>

<p>Masahiko Sawada sent in another revision of a patch to make pg_stat_replication.sync priority report NULL if in quorum-based sync replication, and a different one to change the comments and documentation.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to make huge pages work on Windows.</p>

<p>Craig Ringer sent in a patch to fix undefined var warnings in PostgresNode with timeout.</p>

<p>Dmitry Ivanov sent in a patch to fix an issue with the custom scan API.</p>

<p>Ashutosh Bapat sent in three more revisions of a patch to fix reporting of violation in ExecConstraints.</p>

<p>Thomas Munro sent in another revision of a patch to implement [[Parallel] Shared] Hash.</p>

<p>Yorick Peterse sent in another revision of a patch to document hot standby config order mentioning all standby servers.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to reimplement pg_upgrade's test as a TAP test.</p>

<p>Pierre Ducroquet sent in a patch to check the results of atoi in pg_basebackup argument parsing.</p>

<p>Amit Langote sent in a patch to ensure that duplicate addition to publication is a no-op.</p>

<p>Petr Jel&iacute;nek sent in another revision of a patch to set range table for CopyFrom in tablesync.</p>

<p>Petr Jel&iacute;nek sent in another revision of a patch to reserve global xmin for create slot snasphot export, ensure that on-disk snapshots are not used for snapshot export in logical decoding, prevent snapshot builder xmin from going backwards, fix xl_running_xacts usage in snapshot builder, and skip unnecessary snapshot builds.</p>

<p>Amit Langote sent in a patch to fix a typo in partition.c.</p>

<p>Jeff Janes and Pavan Deolasee traded patches to fix an issue that manifested as PANIC in pg_commit_ts slru after crashes.</p>

<p>Masahiko Sawada sent in a patch to fix a comment typo in xlogutils.c.</p>

<p>Jeff Janes sent in a patch to fix an issue that manifested as failed recovery with the new faster 2PC code.</p>