---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 août 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/08/23/Nouvelles-hebdomadaires-de-PostgreSQL-21-août-2017"
---


<p>Le <em>PGDay Australia 2017</em> se tiendra &agrave; Melbourne le 17 novembre. L'appel &agrave; conf&eacute;renciers court jusqu'au 8 septembre&nbsp;: <a target="_blank" href="https://goo.gl/5d9EbT">https://goo.gl/5d9EbT</a> <a target="_blank" href="http://2017.pgday.com.au/">http://2017.pgday.com.au/</a></p>

<p>[ndt: Meetup le 20 septembre &agrave; Lyon sur PostgreSQL 10&nbsp;: <a target="_blank" href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]

<h2>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-08/">http://archives.postgresql.org/pgsql-jobs/2017-08/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>PGBR2017 (La PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li><em>PGConf Local&nbsp;: Seattle</em> aura lieu les 13 et 14 novembre 2017&nbsp;: <a target="_blank" href="https://www.pgconf.us/#Seattle2017">https://www.pgconf.us/#Seattle2017</a></li>

<li><em>PGConf Local&nbsp;: Austin</em> aura lieu les 4 & 5 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="https://www.pgconf.us/conferences/Austin2017">https://www.pgconf.us/conferences/Austin2017</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170821040127.GA10590@fetter.org">http://www.postgresql.org/message-id/20170821040127.GA10590@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Michael Meskes pushed:</p>

<ul>

<li>Changed ecpg parser to allow RETURNING clauses without attached C variables. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ea0ca75d5d14e0c98782a2188405685af4a475a0">https://git.postgresql.org/pg/commitdiff/ea0ca75d5d14e0c98782a2188405685af4a475a0</a></li>

<li>Allow continuation lines in ecpg cppline parsing. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a4619b26a6a69ab31cab4a0632460647d7f5510f">https://git.postgresql.org/pg/commitdiff/a4619b26a6a69ab31cab4a0632460647d7f5510f</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Absorb -D USE 32BIT TIME T switch from Perl, if relevant. Commit 3c163a7fc's original choice to ignore all #define symbols whose names begin with underscore turns out to be too simplistic. On Windows, some Perl installations are built with -D USE 32BIT TIME T, and we must absorb that or we get the wrong result for sizeof(PerlInterpreter). This effectively re-reverts commit ef58b87df, which injected that symbol in a hacky way, making it apply to all of Postgres not just PL/Perl. More significantly, it did so on *all* 32-bit Windows builds, even when the Perl build to be used did not select this option; so that it fails to work properly with some newer Perl builds. By making this change, we would be introducing an ABI break in 32-bit Windows builds; but fortunately we have not used type time t in any exported Postgres APIs in a long time. So it should be OK, both for PL/Perl itself and for third-party extensions, if an extension library is built with a different USE 32BIT TIME T setting than the core code. Patch by me, based on research by Ashutosh Sharma and Robert Haas. Back-patch to all supported branches, as commit 3c163a7fc was. Discussion: <a target="_blank" href="https://postgr.es/m/CANFyU97OVQ3+Mzfmt3MhuUm5NwPU=-FtbNH5Eb7nZL9ua8=rcA@mail.gmail.com">https://postgr.es/m/CANFyU97OVQ3+Mzfmt3MhuUm5NwPU=-FtbNH5Eb7nZL9ua8=rcA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5a5c2feca3fd858e70ea348822595547e6fa6c15">https://git.postgresql.org/pg/commitdiff/5a5c2feca3fd858e70ea348822595547e6fa6c15</a></li>

<li>Handle elog(FATAL) during ROLLBACK more robustly. Stress testing by Andreas Seltenreich disclosed longstanding problems that occur if a FATAL exit (e.g. due to receipt of SIGTERM) occurs while we are trying to execute a ROLLBACK of an already-failed transaction. In such a case, xact.c is in TBLOCK ABORT state, so that AbortOutOfAnyTransaction would skip AbortTransaction and go straight to CleanupTransaction. This led to an assert failure in an assert-enabled build (due to the ROLLBACK's portal still having a cleanup hook) or without assertions, to a FATAL exit complaining about "cannot drop active portal". The latter's not disastrous, perhaps, but it's messy enough to want to improve it. We don't really want to run all of AbortTransaction in this code path. The minimum required to clean up the open portal safely is to do AtAbort Memory and AtAbort Portals. It seems like a good idea to do AtAbort Memory unconditionally, to be entirely sure that we are starting with a safe CurrentMemoryContext. That means that if the main loop in AbortOutOfAnyTransaction does nothing, we need an extra step at the bottom to restore CurrentMemoryContext = TopMemoryContext, which I chose to do by invoking AtCleanup Memory. This'll result in calling AtCleanup Memory twice in many of the paths through this function, but that seems harmless and reasonably inexpensive. The original motivation for the assertion in AtCleanup Portals was that we wanted to be sure that any user-defined code executed as a consequence of the cleanup hook runs during AbortTransaction not CleanupTransaction. That still seems like a valid concern, and now that we've seen one case of the assertion firing --- which means that exactly that would have happened in a production build --- let's replace the Assert with a runtime check. If we see the cleanup hook still set, we'll emit a WARNING and just drop the hook unexecuted. This has been like this a long time, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/877ey7bmun.fsf@ansel.ydns.eu">https://postgr.es/m/877ey7bmun.fsf@ansel.ydns.eu</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5b6289c1e07dc45f09c3169a189e60d2fcaec2b3">https://git.postgresql.org/pg/commitdiff/5b6289c1e07dc45f09c3169a189e60d2fcaec2b3</a></li>

<li>Final pgindent + perltidy run for v10. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/21d304dfedb4f26d0d6587d9ac39b1b5c499bb55">https://git.postgresql.org/pg/commitdiff/21d304dfedb4f26d0d6587d9ac39b1b5c499bb55</a></li>

<li>Stamp HEAD as 11devel. Note that we no longer require any manual adjustments to shared-library minor version numbers, cf commit a3bce17ef. So this should be everything. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9f14dc393bd441dd9251bea2a5a3ad7f889b03c5">https://git.postgresql.org/pg/commitdiff/9f14dc393bd441dd9251bea2a5a3ad7f889b03c5</a></li>

<li>Distinguish wait-for-connection from wait-for-write-ready on Windows. The API for WaitLatch and friends followed the Unix convention in which waiting for a socket connection to complete is identical to waiting for the socket to accept a write. While Windows provides a select(2) emulation that agrees with that, the native WaitForMultipleObjects API treats them as quite different --- and for some bizarre reason, it will report a not-yet-connected socket as write-ready. libpq itself has so far escaped dealing with this because it waits with select(), but in libpqwalreceiver.c we want to wait using WaitLatchOrSocket. The semantics mismatch resulted in replication connection failures on Windows, but only for remote connections (apparently, localhost connections complete immediately, or at least too fast for anyone to have noticed the problem in single-machine testing). To fix, introduce an additional WL SOCKET CONNECTED wait flag for WaitLatchOrSocket, which is identical to WL SOCKET WRITEABLE on non-Windows, but results in waiting for FD CONNECT events on Windows. Ideally, we would also distinguish the two conditions in the API for PQconnectPoll(), but changing that API at this point seems infeasible. Instead, cheat by checking for PQstatus() == CONNECTION STARTED to determine that we're still waiting for the connection to complete. (This is a cheat mainly because CONNECTION STARTED is documented as an internal state rather than something callers should rely on. Perhaps we ought to change the documentation ... but this patch doesn't.) Per reports from Jobin Augustine and Igor Neyman. Back-patch to v10 where commit 1e8a85009 exposed this longstanding shortcoming. Andres Freund, minor fix and some code review/beautification by me Discussion: <a target="_blank" href="https://postgr.es/m/CAHBggj8g2T+ZDcACZ2FmzX9CTxkWjKBsHd6NkYB4i9Ojf6K1Fw@mail.gmail.com">https://postgr.es/m/CAHBggj8g2T+ZDcACZ2FmzX9CTxkWjKBsHd6NkYB4i9Ojf6K1Fw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f3a4d7e7c290ba630ba0e6e6f009ac27cd3feb03">https://git.postgresql.org/pg/commitdiff/f3a4d7e7c290ba630ba0e6e6f009ac27cd3feb03</a></li>

<li>Simplify plpgsql's check for simple expressions. plpgsql wants to recognize expressions that it can execute directly via ExecEvalExpr() instead of going through the full SPI machinery. Originally the test for this consisted of recursively groveling through the post-planning expression tree to see if it contained only nodes that plpgsql recognized as safe. That was a major maintenance headache, since it required updating plpgsql every time we added any kind of expression node. It was also kind of expensive, so over time we added various pre-planning checks to try to short-circuit having to do that. Robert Haas pointed out that as of the SRF-processing changes in v10, particularly the addition of Query.hasTargetSRFs, there really isn't any reason to make the recursive scan at all: the initial checks cover everything we really care about. We do have to make sure that those checks agree with what inline function() considers, so that inlining of a function that formerly wasn't inlined can't cause an expression considered simple to become non-simple. Hence, delete the recursive function exec simple check node(), and tweak those other tests to more exactly agree with inline function(). Adjust some comments and function naming to match. Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmoZGZpwdEV2FQWaVxA">https://postgr.es/m/CA+TgmoZGZpwdEV2FQWaVxA</a> qZXsQE1DAS5Fu8fwxXDNvfndiUQ@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/00418c61244138bd8ac2de58076a1d0dd4f539f3">https://git.postgresql.org/pg/commitdiff/00418c61244138bd8ac2de58076a1d0dd4f539f3</a></li>

<li>Avoid out-of-memory in a hash join with many duplicate inner keys. The executor is capable of splitting buckets during a hash join if too much memory is being used by a small number of buckets. However, this only helps if a bucket's population is actually divisible; if all the hash keys are alike, the tuples still end up in the same new bucket. This can result in an OOM failure if there are enough inner keys with identical hash values. The planner's cost estimates will bias it against choosing a hash join in such situations, but not by so much that it will never do so. To mitigate the OOM hazard, explicitly estimate the hash bucket space needed by just the inner side's most common value, and if that would exceed work mem then add disable cost to the hash cost estimate. This approach doesn't account for the possibility that two or more common values would share the same hash value. On the other hand, work mem is normally a fairly conservative bound, so that eating two or more times that much space is probably not going to kill us. If we have no stats about the inner side, ignore this consideration. There was some discussion of making a conservative assumption, but that would effectively result in disabling hash join whenever we lack stats, which seems like an overreaction given how seldom the problem manifests in the field. Per a complaint from David Hinkle. Although this could be viewed as a bug fix, the lack of similar complaints weighs against back- patching; indeed we waited for v11 because it seemed already rather late in the v10 cycle to be making plan choice changes like this one. Discussion: <a target="_blank" href="https://postgr.es/m/32013.1487271761@sss.pgh.pa.us">https://postgr.es/m/32013.1487271761@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4867d7f62f7363909526d84d8fa1e9cf434cffc6">https://git.postgresql.org/pg/commitdiff/4867d7f62f7363909526d84d8fa1e9cf434cffc6</a></li>

<li>Make simpler-simple-expressions code cope with a Gather plan. Commit 00418c612 expected that the plan generated for a simple-expression query would always be a plain Result node. However, if force parallel mode is on, the planner might stick a Gather atop that. Cope by looking through the Gather. For safety, assert that the Gather's tlist is trivial. Per buildfarm. Discussion: <a target="_blank" href="https://postgr.es/m/23425.1502822098@sss.pgh.pa.us">https://postgr.es/m/23425.1502822098@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b73f1b5c29e0ace5a281bc13ce09dea30e1b66de">https://git.postgresql.org/pg/commitdiff/b73f1b5c29e0ace5a281bc13ce09dea30e1b66de</a></li>

<li>Make the planner assume that the entries in a VALUES list are distinct. Previously, if we had to estimate the number of distinct values in a VALUES column, we fell back on the default behavior used whenever we lack statistics, which effectively is that there are Min(# of entries, 200) distinct values. This can be very badly off with a large VALUES list, as noted by Jeff Janes. We could consider actually running an ANALYZE-like scan on the VALUES, but that seems unduly expensive, and anyway it could not deliver reliable info if the entries are not all constants. What seems like a better choice is to assume that the values are all distinct. This will sometimes be just as wrong as the old code, but it seems more likely to be more nearly right in many common cases. Also, it is more consistent with what happens in some related cases, for example WHERE x = ANY(ARRAY[1,2,3,...,n]) and WHERE x = ANY(VALUES (1),(2),(3),...,(n)) now are estimated similarly. This was discussed some time ago, but consensus was it'd be better to slip it in at the start of a development cycle not near the end. (It should've gone into v10, really, but I forgot about it.) Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1xHkyPa8VQgGcCNg3RMFFvVxUdOpus1gKcFuvVi0w6Acg@mail.gmail.com">https://postgr.es/m/CAMkU=1xHkyPa8VQgGcCNg3RMFFvVxUdOpus1gKcFuvVi0w6Acg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2b74303637edc09cf692fbfab3fd93a5e47ccabf">https://git.postgresql.org/pg/commitdiff/2b74303637edc09cf692fbfab3fd93a5e47ccabf</a></li>

<li>Extend the default rules file for contrib/unaccent with Vietnamese letters. Improve generate unaccent rules.py to handle composed characters whose base is another composed character rather than a plain letter. The net effect of this is to add a bunch of multi-accented Vietnamese characters to unaccent.rules. Original complaint from Kha Nguyen, diagnosis of the script's shortcoming by Thomas Munro. Dang Minh Huong and Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/CALo3sF6EC8cy1F2JUz=GRf5h4LMUJTaG3qpdoiLrNbWEXL-tRg@mail.gmail.com">https://postgr.es/m/CALo3sF6EC8cy1F2JUz=GRf5h4LMUJTaG3qpdoiLrNbWEXL-tRg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ec0a69e49bf41a37b5c2d6f6be66d8abae00ee05">https://git.postgresql.org/pg/commitdiff/ec0a69e49bf41a37b5c2d6f6be66d8abae00ee05</a></li>

<li>Add missing "static" marker. Per pademelon. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/963af96920fabf5fd7ee28ecc96521f371c13a4b">https://git.postgresql.org/pg/commitdiff/963af96920fabf5fd7ee28ecc96521f371c13a4b</a></li>

<li>Further tweaks to compiler flags for PL/Perl on Windows. It now emerges that we can only rely on Perl to tell us we must use -D USE 32BIT TIME T if it's Perl 5.13.4 or later. For older versions, revert to our previous practice of assuming we need that symbol in all 32-bit Windows builds. This is not ideal, but inquiring into which compiler version Perl was built with seems far too fragile. In any case, we had not previously had complaints about these old Perl versions, so let's assume this is Good Enough. (It's still better than the situation ante commit 5a5c2feca, in that at least the effects are confined to PL/Perl rather than the whole PG build.) Back-patch to all supported versions, like 5a5c2feca and predecessors. Discussion: <a target="_blank" href="https://postgr.es/m/CANFyU97OVQ3+Mzfmt3MhuUm5NwPU=-FtbNH5Eb7nZL9ua8=rcA@mail.gmail.com">https://postgr.es/m/CANFyU97OVQ3+Mzfmt3MhuUm5NwPU=-FtbNH5Eb7nZL9ua8=rcA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b5178c5d08ca59e30f9d9428fa6fdb2741794e65">https://git.postgresql.org/pg/commitdiff/b5178c5d08ca59e30f9d9428fa6fdb2741794e65</a></li>

<li>Fix ExecReScanGatherMerge. Not surprisingly, since it'd never ever been tested, ExecReScanGatherMerge didn't work. Fix it, and add a regression test case to exercise it. Amit Kapila Discussion: <a target="_blank" href="https://postgr.es/m/CAA4eK1JkByysFJNh9M349u">https://postgr.es/m/CAA4eK1JkByysFJNh9M349u</a> nNjqETuEnY y1VUc kJiU0bxtaQ@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a2b70c89ca1a5fcf6181d3c777d82e7b83d2de1b">https://git.postgresql.org/pg/commitdiff/a2b70c89ca1a5fcf6181d3c777d82e7b83d2de1b</a></li>

<li>Temporarily revert test case from a2b70c89ca1a5fcf6181d3c777d82e7b83d2de1b. That code patch was good as far as it went, but the associated test case has exposed fundamental brain damage in the parallel scan mechanism, which is going to take nontrivial work to correct. In the interests of getting the buildfarm back to green so that unrelated work can proceed, let's temporarily remove the test case. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a20aac890a89e6f88e841dedbbfa8d9d5f7309fc">https://git.postgresql.org/pg/commitdiff/a20aac890a89e6f88e841dedbbfa8d9d5f7309fc</a></li>

<li>Fix possible core dump in parallel restore when using a TOC list. Commit 3eb9a5e7c unintentionally introduced an ordering dependency into restore toc entries prefork(). The existing coding of reduce dependencies() contains a check to skip moving a TOC entry to the ready list if it wasn't initially in the pending list. This used to suffice to prevent reduce dependencies() from trying to move anything into the ready list during restore toc entries prefork(), because the pending list stayed empty throughout that phase; but it no longer does. The problem doesn't manifest unless the TOC has been reordered by SortTocFromFile, which is how I missed it in testing. To fix, just add a test for ready list == NULL, converting the call with NULL from a poor man's sanity check into an explicit command not to touch TOC items' list membership. Clarify some of the comments around this; in particular, note the primary purpose of the check for pending list membership, which is to ensure that we can't try to restore the same item twice, in case a TOC list forces it to be restored before its dependency count goes to zero. Per report from Fabr&iacute;zio de Royes Mello. Back-patch to 9.3, like the previous commit. Discussion: <a target="_blank" href="https://postgr.es/m/CAFcNs+pjuv0JL">https://postgr.es/m/CAFcNs+pjuv0JL</a> x4+=71TPUPjdLHOXA4YfT32myj OrrZb4ohA@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b1c2d76a2fcef812af0be3343082414d401909c8">https://git.postgresql.org/pg/commitdiff/b1c2d76a2fcef812af0be3343082414d401909c8</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Fix logical replication protocol doc detail. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; Reported-by: Kyle Conroy &lt;kyle@kyleconroy.com&gt; Bug: #14775 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/79e5de690efce6e7aaa9c60e10389a8bc58c1617">https://git.postgresql.org/pg/commitdiff/79e5de690efce6e7aaa9c60e10389a8bc58c1617</a></li>

<li>Fix typo. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7f1bb1d7346b67a62e8ec59f79f8284cb7fb4394">https://git.postgresql.org/pg/commitdiff/7f1bb1d7346b67a62e8ec59f79f8284cb7fb4394</a></li>

<li>doc: Improve PDF bookmarks. Also create PDF bookmarks/ToC entries for subsections of reference pages. This was a regression from the previous jadetex-based build. Reported-by: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/270fec9f0bc9082ed99f0c447d450bd8cd92be73">https://git.postgresql.org/pg/commitdiff/270fec9f0bc9082ed99f0c447d450bd8cd92be73</a></li>

<li>Simplify some code in logical replication launcher. Avoid unnecessary locking calls when a subscription is disabled. Author: Yugo Nagata &lt;nagata@sraoss.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e42351ae07c19bb4eaedbdce8ccd4dfb4e905069">https://git.postgresql.org/pg/commitdiff/e42351ae07c19bb4eaedbdce8ccd4dfb4e905069</a></li>

<li>doc: Add missing logical replication protocol message. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/34a23a34269519e19b5da3ea4e29e4e0abadfee3">https://git.postgresql.org/pg/commitdiff/34a23a34269519e19b5da3ea4e29e4e0abadfee3</a></li>

<li>Fix logical replication protocol comparison logic. Since we currently only have one protocol, this doesn't make much of a difference other than the error message. Author: Yugo Nagata &lt;nagata@sraoss.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/70b573b2677eb5ef28515e824e5027e26ce21d77">https://git.postgresql.org/pg/commitdiff/70b573b2677eb5ef28515e824e5027e26ce21d77</a></li>

<li>psql: Add tab completion for \pset pager. Author: Pavel Stehule &lt;pavel.stehule@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0f0ee68e94319e3f32baf3c18dcae1d5842b0d5c">https://git.postgresql.org/pg/commitdiff/0f0ee68e94319e3f32baf3c18dcae1d5842b0d5c</a></li>

<li>Include foreign tables in information schema.table privileges. This appears to have been an omission in the original commit 0d692a0dc9f. All related information schema views already include foreign tables. Reported-by: Nicolas Thauvin &lt;nicolas.thauvin@dalibo.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0659465caa042b958e544e8b1857d8d7de03a83f">https://git.postgresql.org/pg/commitdiff/0659465caa042b958e544e8b1857d8d7de03a83f</a></li>

<li>doc: Document pg receivewal exit behavior and status. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0a2d43d988eef2aee679582ba1b72b2587cbaab2">https://git.postgresql.org/pg/commitdiff/0a2d43d988eef2aee679582ba1b72b2587cbaab2</a></li>

<li>Initialize replication slot catalog xmin in procarray. Although not confirmed and probably rare, if the newly allocated memory is not already zero, this could possibly have caused some problems. Also reorder the initializations slightly so they match the order of the struct definition. Author: Wong, Yi Wen &lt;yiwong@amazon.com&gt; Reviewed-by: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4d4c89171598424b31175ef9b600ac87a9a61023">https://git.postgresql.org/pg/commitdiff/4d4c89171598424b31175ef9b600ac87a9a61023</a></li>

<li>Fix up some misusage of appendStringInfo() and friends. Change to appendStringInfoChar() or appendStringInfoString() where those can be used. Author: David Rowley &lt;david.rowley@2ndquadrant.com&gt; Reviewed-by: Ashutosh Bapat &lt;ashutosh.bapat@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/77d05706beb115b412728bd94dce16d83795583d">https://git.postgresql.org/pg/commitdiff/77d05706beb115b412728bd94dce16d83795583d</a></li>

<li>pg receivewal: Improve verbose mode. Some informational messages showed up even if verbose mode was not used. Move them to verbose mode. Author: Michael Paquier &lt;michael.paquier@gmail.com&gt; Reviewed-by: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/514731af58765f62b23309805270a07eae86c2c0">https://git.postgresql.org/pg/commitdiff/514731af58765f62b23309805270a07eae86c2c0</a></li>

<li>Correct representation of foreign tables in information schema. tables.table type is supposed to be 'FOREIGN' rather than 'FOREIGN TABLE' according to the SQL standard. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9b5140fb503eb50634cd7e080d41f4d9af41e0a6">https://git.postgresql.org/pg/commitdiff/9b5140fb503eb50634cd7e080d41f4d9af41e0a6</a></li>

<li>doc: Add logical replication to comparison matrix. Author: Steve Singer &lt;steve@ssinger.info&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/346d5bf1ca33bcf27eda5d23fba3999e6356b905">https://git.postgresql.org/pg/commitdiff/346d5bf1ca33bcf27eda5d23fba3999e6356b905</a></li>

<li>doc: Update URL of DocBook XSL stylesheets. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4395f7daf3b40ecbd316bd2a68c253a56013a538">https://git.postgresql.org/pg/commitdiff/4395f7daf3b40ecbd316bd2a68c253a56013a538</a></li>

<li>pg dump: Support using synchronized snapshots on standbys. This became possible by commit 6c2003f8a1bbc7c192a2e83ec51581c018aa162f. This just makes pg dump aware of it and updates the documentation. Author: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cf851519d40e85c8129515c06532515386eaf41c">https://git.postgresql.org/pg/commitdiff/cf851519d40e85c8129515c06532515386eaf41c</a></li>

<li>doc: Fix table column count. Author: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bfe089e3724ad8f9c8922165738d837b8641a6e6">https://git.postgresql.org/pg/commitdiff/bfe089e3724ad8f9c8922165738d837b8641a6e6</a></li>

<li>doc: Update RFC URLs. Consistently use the IETF HTML links instead of a random mix of different sites and formats. Correct one RFC number and fix one broken link. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d54285935072175aac1c446e15ec778b08a8fd75">https://git.postgresql.org/pg/commitdiff/d54285935072175aac1c446e15ec778b08a8fd75</a></li>

<li>Fix creation of ICU comments for keyword variants. It would create the comment referring to the keyword-less parent locale. This was broken in ddb5fdc068635d003a0d1c303cb109d1cb3ebeb1. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/24620fc52bd9d4139748591b6cce7327fd299684">https://git.postgresql.org/pg/commitdiff/24620fc52bd9d4139748591b6cce7327fd299684</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Expand coverage of parallel gather merge a bit. Previously paths reaching heap compare slots weren't covered. Author: Rushabh Lathia Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAGPqQf3C+3PBujb+7m=ceWeii4-vBY=XS99LjzrpkpefvzJbFg@mail.gmail.com">https://postgr.es/m/CAGPqQf3C+3PBujb+7m=ceWeii4-vBY=XS99LjzrpkpefvzJbFg@mail.gmail.com</a> <a target="_blank" href="https://postgr.es/m/27200.1502482851@sss.pgh.pa.us">https://postgr.es/m/27200.1502482851@sss.pgh.pa.us</a> Backpatch: 10, where gather merge was introduced <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d2bc501573d98ff5541271dca94fb5f7a004ecbf">https://git.postgresql.org/pg/commitdiff/d2bc501573d98ff5541271dca94fb5f7a004ecbf</a></li>

<li>Partially flatten struct tupleDesc so that it can be used in DSM. TupleDesc's attributes were already stored in contiguous memory after the struct. Go one step further and get rid of the array of pointers to attributes so that they can be stored in shared memory mapped at different addresses in each backend. This won't work for TupleDescs with contraints and defaults, since those point to other objects, but for many purposes only attributes are needed. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com">https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c6293249dc178f52dd508c3e6ff353af41c90b58">https://git.postgresql.org/pg/commitdiff/c6293249dc178f52dd508c3e6ff353af41c90b58</a></li>

<li>Change tupledesc-&gt;attrs[n] to TupleDescAttr(tupledesc, n). This is a mechanical change in preparation for a later commit that will change the layout of TupleDesc. Introducing a macro to abstract the details of where attributes are stored will allow us to change that in separate step and revise it in future. Author: Thomas Munro, editorialized by Andres Freund Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com">https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2cd70845240087da205695baedab6412342d1dbe">https://git.postgresql.org/pg/commitdiff/2cd70845240087da205695baedab6412342d1dbe</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>pg dump: Add a --load-via-partition-root option. Rushabh Lathia, reviewed and somewhat revised by me. Testing by Rajkumar Raghuwanshi. Discussion: <a target="_blank" href="http://postgr.es/m/CAGPqQf0C1he087bz9xRBOGZBuESYz9X=Fp8Ca">http://postgr.es/m/CAGPqQf0C1he087bz9xRBOGZBuESYz9X=Fp8Ca</a> g+TfHgAff75g@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/23d7680d04b958de327be96ffdde8f024140d50e">https://git.postgresql.org/pg/commitdiff/23d7680d04b958de327be96ffdde8f024140d50e</a></li>

<li>Add missing call to ExecReScanGatherMerge. Amit Kapila Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1KeQWZOoDmDmGMwuqzPW9JhRS+ditQVFdAfGjNmMZzqMQ@mail.gmail.com">http://postgr.es/m/CAA4eK1KeQWZOoDmDmGMwuqzPW9JhRS+ditQVFdAfGjNmMZzqMQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1295a777882b8ed180a854e249f91be565a99422">https://git.postgresql.org/pg/commitdiff/1295a777882b8ed180a854e249f91be565a99422</a></li>

<li>Avoid unnecessary single-child Append nodes. Before commit d3cc37f1d801a6b5cad9bf179274a8, an inheritance parent whose only children were temp tables of other sessions would end up as a simple scan of the parent; but with that commit, we end up with an Append node, per a report from Ashutosh Bapat. Tweak the logic so that we go back to the old way, and update the function header comment for partitioning while we're at it. Ashutosh Bapat, reviewed by Amit Langote and adjusted by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpReWJr1yTkHU=OqiMBmcYCMoSW3VPR39RBuQ">http://postgr.es/m/CAFjFpReWJr1yTkHU=OqiMBmcYCMoSW3VPR39RBuQ</a> ovwDFBT5Q@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d57929afc7063431f80a0ac4c510fc39aacd22e6">https://git.postgresql.org/pg/commitdiff/d57929afc7063431f80a0ac4c510fc39aacd22e6</a></li>

<li>Teach adjust appendrel attrs( multilevel) to do multiple translations. Currently, child relations are always base relations, so when we translate parent relids to child relids, we only need to translate a singler relid. However, the proposed partition-wise join feature will create child joins, which will mean we need to translate a set of parent relids to the corresponding child relids. This is preliminary refactoring to make that possible. Ashutosh Bapat. Review and testing of the larger patch set of which this is a part by Amit Langote, Rajkumar Raghuwanshi, Rafia Sabih, Thomas Munro, Dilip Kumar, and me. Some adjustments, mostly cosmetic, by me. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobQK80vtXjAsPZWWXd7c8u13G86gmuLupN+uUJjA+i4nA@mail.gmail.com">http://postgr.es/m/CA+TgmobQK80vtXjAsPZWWXd7c8u13G86gmuLupN+uUJjA+i4nA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/480f1f4329f1bf8bfbbcda8ed233851e1b110ad4">https://git.postgresql.org/pg/commitdiff/480f1f4329f1bf8bfbbcda8ed233851e1b110ad4</a></li>

<li>Assorted preparatory refactoring for partition-wise join. Instead of duplicating the logic to search for a matching ParamPathInfo in multiple places, factor it out into a separate function. Pass only the relevant bits of the PartitionKey to partition bounds equal instead of the whole thing, because partition-wise join will want to call this without having a PartitionKey available. Adjust allow star schema join and calc nestloop required outer to take relevant Relids rather than the entire Path, because partition-wise join will want to call it with the top-parent relids to determine whether a child join is allowable. Ashutosh Bapat. Review and testing of the larger patch set of which this is a part by Amit Langote, Rajkumar Raghuwanshi, Rafia Sabih, Thomas Munro, Dilip Kumar, and me. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobQK80vtXjAsPZWWXd7c8u13G86gmuLupN+uUJjA+i4nA@mail.gmail.com">http://postgr.es/m/CA+TgmobQK80vtXjAsPZWWXd7c8u13G86gmuLupN+uUJjA+i4nA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e139f1953f29db245f60a7acb72fccb1e05d2442">https://git.postgresql.org/pg/commitdiff/e139f1953f29db245f60a7acb72fccb1e05d2442</a></li>

<li>Remove bogus line from comment. Spotted by Tom Lane Discussion: <a target="_blank" href="http://postgr.es/m/27897.1502901074@sss.pgh.pa.us">http://postgr.es/m/27897.1502901074@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/79f457e53ac37b5d383845c410e5a41457d74950">https://git.postgresql.org/pg/commitdiff/79f457e53ac37b5d383845c410e5a41457d74950</a></li>

<li>Attempt to clarify comments related to force parallel mode. Per discussion with Tom Lane. Discussion: <a target="_blank" href="http://postgr.es/m/28589.1502902172@sss.pgh.pa.us">http://postgr.es/m/28589.1502902172@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1e56883a528eb623c9a55ec7e43b4eee3722014b">https://git.postgresql.org/pg/commitdiff/1e56883a528eb623c9a55ec7e43b4eee3722014b</a></li>

<li>Refactor validation of new partitions a little bit. Move some logic that is currently in ATExecAttachPartition to separate functions to facilitate future code reuse. Ashutosh Bapat and Jeevan Ladhe Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmobbnamyvii0pRdg9pp">http://postgr.es/m/CA+Tgmobbnamyvii0pRdg9pp</a> jLHSUvq7u5SiRrVV0tEFFU58Tg@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ecfe59e50fb8316ab7fc653419cd724c8b7a7dd7">https://git.postgresql.org/pg/commitdiff/ecfe59e50fb8316ab7fc653419cd724c8b7a7dd7</a></li>

<li>Don't lock tables in RelationGetPartitionDispatchInfo. Instead, lock them in the caller using find all inheritors so that they get locked in the standard order, minimizing deadlock risks. Also in RelationGetPartitionDispatchInfo, avoid opening tables which are not partitioned; there's no need. Amit Langote, reviewed by Ashutosh Bapat and Amit Khandekar Discussion: <a target="_blank" href="http://postgr.es/m/91b36fa1-c197-b72f-ca6e-56c593bae68c@lab.ntt.co.jp">http://postgr.es/m/91b36fa1-c197-b72f-ca6e-56c593bae68c@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/54cde0c4c05807321d3f4bf96a97c376e3fa91cb">https://git.postgresql.org/pg/commitdiff/54cde0c4c05807321d3f4bf96a97c376e3fa91cb</a></li>

<li>Fix interaction of triggers, partitioning, and EXPLAIN ANALYZE. Add a new EState member es leaf result relations, so that the trigger code knows about ResultRelInfos created by tuple routing. Also make sure ExplainPrintTriggers knows about partition-related ResultRelInfos. Etsuro Fujita, reviewed by Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/57163e18-8e56-da83-337a-22f2c0008051@lab.ntt.co.jp">http://postgr.es/m/57163e18-8e56-da83-337a-22f2c0008051@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c4b841ba6aa9252ab9dacd59d317aba8cfa9b31a">https://git.postgresql.org/pg/commitdiff/c4b841ba6aa9252ab9dacd59d317aba8cfa9b31a</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Fix error handling path in autovacuum launcher. The original code (since 00e6a16d01) was assuming aborting the transaction in autovacuum launcher was sufficient to release all resources, but in reality the launcher runs quite a lot of code out of any transactions. Re-introduce individual cleanup calls to make abort more robust. Reported-by: Robert Haas Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmobQVbz4K">https://postgr.es/m/CA+TgmobQVbz4K</a> +RSmiM9HeRKpy3vS5xnbkL95gSEnWijzprKQ@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d9a622cee162775ae42aa5c1ac592760d0d777d9">https://git.postgresql.org/pg/commitdiff/d9a622cee162775ae42aa5c1ac592760d0d777d9</a></li>

<li>Simplify autovacuum work-item implementation. The initial implementation of autovacuum work-items used a dynamic shared memory area (DSA). However, it's argued that dynamic shared memory is not portable enough, so we cannot rely on it being supported everywhere; at the same time, autovacuum work-items are now a critical part of the server, so it's not acceptable that they don't work in the cases where dynamic shared memory is disabled. Therefore, let's fall back to a simpler implementation of work-items that just uses autovacuum's main shared memory segment for storage. Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmobQVbz4K">https://postgr.es/m/CA+TgmobQVbz4K</a> +RSmiM9HeRKpy3vS5xnbkL95gSEnWijzprKQ@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/31ae1638ce35c23979f9bcbb92c6bb51744dbccb">https://git.postgresql.org/pg/commitdiff/31ae1638ce35c23979f9bcbb92c6bb51744dbccb</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Use atomic ops to hand out pages to scan in parallel scan. With a lot of CPUs, the spinlock that protects the current scan location in a parallel scan can become a bottleneck. Use an atomic fetch-and-add instruction instead. David Rowley Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAKJS1f9tgsPhqBcoPjv9">https://www.postgresql.org/message-id/CAKJS1f9tgsPhqBcoPjv9</a> KUPZvTLCZ4jy%3DB%3DbhqgaKn7cYzm-w@mail.gmail.com <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3cda10f41bfed7e34b0db7013b66dd40a5f75926">https://git.postgresql.org/pg/commitdiff/3cda10f41bfed7e34b0db7013b66dd40a5f75926</a></li>

<li>Remove dedicated B-tree root-split record types. Since commit 40dae7ec53, which changed the way b-tree page splitting works, there has been no difference in the handling of root, and non-root split WAL records. We don't need to distinguish them anymore If you're worried about the loss of debugging information, note that usually a root split record will normally be followed by a WAL record to create the new root page. The root page will also have the BTP ROOT flag set on the page itself, and there is a pointer to it from the metapage. Author: Aleksander Alekseev Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170406122116.GA11081@e733.localdomain">https://www.postgresql.org/message-id/20170406122116.GA11081@e733.localdomain</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0c504a80cf2e6f66df2cdea563e879bf4abd1629">https://git.postgresql.org/pg/commitdiff/0c504a80cf2e6f66df2cdea563e879bf4abd1629</a></li>

<li>Fix shm toc.c to always return buffer-aligned memory. Previously, if you passed a non-aligned size to shm toc create(), the memory returned by shm toc allocate() would be similarly non-aligned. This was exposed by commit 3cda10f41b, which allocated structs containing a pg atomic uint64 field with shm toc allocate(). On systems with MAXIMUM ALIGNOF = 4, such structs still need to be 8-bytes aligned, but the memory returned by shm toc allocate() was only 4-bytes aligned. It's quite bogus that we abuse BUFFERALIGN to align the structs for pg atomic uint64. It doesn't really have anything to do with buffers. But that's a separate issue. This ought to fix the buildfarm failures on 32-bit x86 systems. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/7e0a73a5-0df9-1859-b8ae-9acf122dc38d@iki.fi">https://www.postgresql.org/message-id/7e0a73a5-0df9-1859-b8ae-9acf122dc38d@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ac883ac453e9c479f397780918f235c440b7a02f">https://git.postgresql.org/pg/commitdiff/ac883ac453e9c479f397780918f235c440b7a02f</a></li>

<li>Fix pg atomic u64 initialization. As Andres pointed out, pg atomic init u64 must be used to initialize an atomic variable, before it can be accessed with the actual atomic ops. Trying to use pg atomic write u64 on an uninitialized variable leads to a failure with the fallback implementation that uses a spinlock. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170816191346.d3ke5tpshhco4bnd%40alap3.anarazel.de">https://www.postgresql.org/message-id/20170816191346.d3ke5tpshhco4bnd%40alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dcd052c8d20c5359c55f2a101f10a8e6341233cd">https://git.postgresql.org/pg/commitdiff/dcd052c8d20c5359c55f2a101f10a8e6341233cd</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Amit Kapila sent in another revision of a patch to parallelize queries containing initplans.</p>

<p>Micha&euml;l Paquier sent in a patch to simplify ACL handling for large objects and removal of superuser() checks.</p>

<p>Mark Rofail sent in two more revisions of a patch to implement foreign key arrays.</p>

<p>Masahiko Sawada sent in another revision of a patch to implement block level parallel vacuum.</p>

<p>Fabien COELHO sent in another revision of a patch to add more functions and operators to pgbench.</p>

<p>Marko Tiikkaja sent in a patch to implement INSERT .. ON CONFLICT DO SELECT [FOR ..]</p>

<p>Masahiko Sawada sent in a patch to enable logging the explicit relation name in VACUUM VERBOSE logs.</p>

<p>&Aacute;lvaro Herrera sent in a patch to release lwlocks in autovacuum launcher error handling path.</p>

<p>Peter Eisentraut sent in a patch to document TR 35 collation options for ICU.</p>

<p>Tom Lane and Robert Haas traded commnet patches to clarify force parallel.</p>

<p>Robert Haas sent in two more revisions of a patch to implement auto prewarm.</p>

<p>Etsuro Fujita sent in a patch to ensure that stats for triggers on partitioned tables are shown in EXPLAIN ANALYZE.</p>

<p>Nathan Bossart sent in another revision of a patch to allow users to specify multiple tables in VACUUM commands.</p>

<p>Tobias Bussmann sent in a patch to make \gx does work when \set FETCH COUNT n is done.</p>

<p>Thomas Munro sent in two more revisions of a patch to enable sharing record typmods among backends.</p>

<p>Masahiko Sawada sent in another revision of a patch to move extension locks out of the heavyweight lock manager.</p>

<p>Masahiko Sawada sent in another revision of a patch to pgbench to allow skipping creating primary keys after initialization.</p>

<p>Konstantin Knizhnik sent in a patch to do some secondary index access optimizations.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to check the PSQL_PAGER environment variable in psql.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to allow sorting describe (\d) commands in psql.</p>

<p>Heikki Linnakangas sent in a patch to fix shm_toc alignment.</p>

<p>Peter Eisentraut sent in a patch to to use stdbool.h.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to remove the 1MB size limit in tsvector.</p>

<p>Robert Haas sent in two revisions of a patch to allow hash functions to have a second, optional support function.</p>

<p>Adrien NAYRAT sent in a patch to fix the docs for the multivariate histograms and MCV lists patch.</p>

<p>Beena Emerson sent in two more revisions of a patch to enable default partitions for declarative range partitions.</p>

<p>Oliver Ford sent in two more revisions of a patch to fix number skipping in to_number.</p>

<p>Antonin Houska sent in another revision of a patch to implement aggregate pushdown.</p>

<p>Peter Eisentraut sent in a patch to do some assorted cleanup including removing some dead code from contrib/fuzzystrmatch, our own definition of NULL, unnecessary parentheses in return statements, unnecessary casts in contrib/cube, and the endof macro, and dropping excessive dereferencing of function pointers.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix a postgres_fdw bug.</p>

<p>Dilip Kumar sent in another revision of a patch to improve bitmap costing for lossy pages.</p>

<p>Masahiko Sawada sent in another revision of a patch to improve messaging during logical replication worker startup, split the SetSubscriptionRelState function into two, allow syscache access to subscriptions in database-less processes, and improve locking for subscriptions and subscribed relations.</p>

<p>Jeevan Ladhe sent in another revision of a patch to add support for default partition in declarative partitioning.</p>

<p>Masahiko Sawada sent in a patch to add a documentation warning about FIRST.</p>

<p>Konstantin Knizhnik and Douglas Doole traded patches to enable passing LIMIT to a FDW.</p>

<p>Daniel Gustafsson sent in another revision of a patch to allow running SSL tests against different binaries, add support for Apple Secure Transport SSL library, document Secure Transport, and fix SSL tests for connstrings with spaces.</p>

<p>David Steele sent in two revisions of a patch to update the low-level backup documentation to match actual behavior.</p>

<p>Vinayak Pokale sent in a patch to add WHENEVER statement DO CONTINUE support for ECPG.</p>

<p>Michael Banck sent in a patch to add an option to create a replication slot in pg_basebackup if not yet present.</p>

<p>Thomas Munro sent in another revision of a patch to implement parallel hashing.</p>

<p>Vesa-Matti J Kari sent in a patch to add HISTIGNORE for psql.</p>

<p>Simon Riggs sent in a patch to exclude special values in recovery target time.v1.patch.</p>

<p>Pavel St&#283;hule sent in four more revisions of a patch to fix some possible encoding issues with libxml2 functions.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench TAP tests.</p>