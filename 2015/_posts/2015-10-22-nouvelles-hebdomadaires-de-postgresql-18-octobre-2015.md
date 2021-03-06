---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 octobre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/10/22/Nouvelles-hebdomadaires-de-PostgreSQL-18-octobre-2015"
---


<p>Highload++2015 aura lieu les 2 et 3 novembre 2015 &agrave; Moscou (Russie). Informations respectivement en russe et anglais&nbsp;: <a target="_blank" href="http://highload.ru/">http://highload.ru/</a> <a target="_blank" href="http://highload.co">http://highload.co</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgFormatter v1.5, un outil de formatage/coloration syntaxique qui g&egrave;re les mots-clefs de SQL-92, SQL-99, SQL-2003, SQL-2008, SQL-2011 et ceux de PostgreSQL qui ne sont pas standards&nbsp;: <a target="_blank" href="http://sqlformat.darold.net/">http://sqlformat.darold.net/</a></li>

<li>pitrery 1.9, a set of bash scripts to manage PITR backups for PostgreSQL, released. <a target="_blank" href="http://dalibo.github.io/pitrery/">http://dalibo.github.io/pitrery/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en octobre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-10/">http://archives.postgresql.org/pgsql-jobs/2015-10/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche). Le programme a &eacute;t&eacute; publi&eacute;&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PgCUBA du 19 au 23 octobre 2015 &agrave; la Havane. Informations en espagnol ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://www.postgresql.org/about/event/1813/">http://www.postgresql.org/about/event/1813/</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/">http://pgbr.postgresql.org.br/2015/en/</a></li>

<li>La PGConf.DE se tiendra au Lindner Hotel am Michel de Hambourg (Allemagne) les 26 &amp; 27 novembre 2015&nbsp;: <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></li>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de deux jours avec deux programmes qui aura lieu les 21 et 22 janvier 2016 au Pasadena Convention Center &agrave; l'occasion du SCaLE 14X. L'appel &agrave; conf&eacute;renciers expire le 30 octobre 2015&nbsp;: <a target="_blank" href="https://www.socallinuxexpo.org/scale/14x/cfp">https://www.socallinuxexpo.org/scale/14x/cfp</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20151019032551.GA20974@fetter.org">http://www.postgresql.org/message-id/20151019032551.GA20974@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Noah Misch pushed:</p>

<ul>

<li>Use JsonbIteratorToken consistently in automatic variable declarations. Many functions stored JsonbIteratorToken values in variables of other integer types. Also, standardize order relative to other declarations. Expect compilers to generate the same code before and after this change. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7732d49ca211571552bf82b5207deed95c0cc09c">http://git.postgresql.org/pg/commitdiff/7732d49ca211571552bf82b5207deed95c0cc09c</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix "pg_ctl start -w" to test child process status directly. pg_ctl start with -w previously relied on a heuristic that the postmaster would surely always manage to create postmaster.pid within five seconds. Unfortunately, that fails much more often than we would like on some of the slower, more heavily loaded buildfarm members. We have known for quite some time that we could remove the need for that heuristic on Unix by using fork/exec instead of system() to launch the postmaster. This allows us to know the exact PID of the postmaster, which allows near-certain verification that the postmaster.pid file is the one we want and not a leftover, and it also lets us use waitpid() to detect reliably whether the child postmaster has exited or not. What was blocking this change was not wanting to rewrite the Windows version of start_postmaster() to avoid use of CMD.EXE. That's doable in theory but would require fooling about with stdout/stderr redirection, and getting the handling of quote-containing postmaster switches to stay the same might be rather ticklish. However, we realized that we don't have to do that to fix the problem, because we can test whether the shell process has exited as a proxy for whether the postmaster is still alive. That doesn't allow an exact check of the PID in postmaster.pid, but we're no worse off than before in that respect; and we do get to get rid of the heuristic about how long the postmaster might take to create postmaster.pid. On Unix, this change means that a second "pg_ctl start -w" immediately after another such command will now reliably fail, whereas previously it would succeed if done within two seconds of the earlier command. Since that's a saner behavior anyway, it's fine. On Windows, the case can still succeed within the same time window, since pg_ctl can't tell that the earlier postmaster's postmaster.pid isn't the pidfile it is looking for. To ensure stable test results on Windows, we can insert a short sleep into the test script for pg_ctl, ensuring that the existing pidfile looks stale. This hack can be removed if we ever do rewrite start_postmaster(), but that no longer seems like a high-priority thing to do. Back-patch to all supported versions, both because the current behavior is buggy and because we must do that if we want the buildfarm failures to go away. Tom Lane and Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6bcce25801c3fcb219e0d92198889ec88c74e2ff">http://git.postgresql.org/pg/commitdiff/6bcce25801c3fcb219e0d92198889ec88c74e2ff</a></li>

<li>On Windows, ensure shared memory handle gets closed if not being used. Postmaster child processes that aren't supposed to be attached to shared memory were not bothering to close the shared memory mapping handle they inherit from the postmaster process. That's mostly harmless, since the handle vanishes anyway when the child process exits -- but the syslogger process, if used, doesn't get killed and restarted during recovery from a backend crash. That meant that Windows doesn't see the shared memory mapping as becoming free, so it doesn't delete it and the postmaster is unable to create a new one, resulting in failure to recover from crashes whenever logging_collector is turned on. Per report from Dmitry Vasilyev. It's a bit astonishing that we'd not figured this out long ago, since it's been broken from the very beginnings of out native Windows support; probably some previously-unexplained trouble reports trace to this. A secondary problem is that on Cygwin (perhaps only in older versions?), exec() may not detach from the shared memory segment after all, in which case these child processes did remain attached to shared memory, posing the risk of an unexpected shared memory clobber if they went off the rails somehow. That may be a long-gone bug, but we can deal with it now if it's still live, by detaching within the infrastructure introduced here to deal with closing the handle. Back-patch to all supported branches. Tom Lane and Amit Kapila <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/869f693a36556e9872c4369820ce8289451619f0">http://git.postgresql.org/pg/commitdiff/869f693a36556e9872c4369820ce8289451619f0</a></li>

<li>Fix NULL handling in datum_to_jsonb(). The function failed to adhere to its specification that the "tcategory" argument should not be examined when the input value is NULL. This resulted in a crash in some cases. Per bug #13680 from Boyko Yordanov. In passing, re-pgindent some recent changes in jsonb.c, and fix a rather ungrammatical comment. Diagnosis and patch by Michael Paquier, cosmetic changes by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3587cbc34fe87e1bde6c202daba791b68e44cb3a">http://git.postgresql.org/pg/commitdiff/3587cbc34fe87e1bde6c202daba791b68e44cb3a</a></li>

<li>Improve memory-usage accounting in regular-expression compiler. This code previously counted the number of NFA states it created, and complained if a limit was exceeded, so as to prevent bizarre regex patterns from consuming unreasonable time or memory. That's fine as far as it went, but the code paid no attention to how many arcs linked those states. Since regexes can be contrived that have O(N) states but will need O(N^2) arcs after fixempties() processing, it was still possible to blow out memory, and take a long time doing it too. To fix, modify the bookkeeping to count space used by both states and arcs. I did not bother with including the "color map" in the accounting; it can only grow to a few megabytes, which is not a lot in comparison to what we're allowing for states+arcs (about 150MB on 64-bit machines or half that on 32-bit machines). Looking at some of the larger real-world regexes captured in the Tcl regression test suite suggests that the most that is likely to be needed for regexes found in the wild is under 10MB, so I believe that the current limit has enough headroom to make it okay to keep it as a hard-wired limit. In connection with this, redefine REG_ETOOBIG as meaning "regular expression is too complex"; the previous wording of "nfa has too many states" was already somewhat inapropos because of the error code's use for stack depth overrun, and it was not very user-friendly either. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/538b3b8b359fa77cb7e1507113efb788b4e159c9">http://git.postgresql.org/pg/commitdiff/538b3b8b359fa77cb7e1507113efb788b4e159c9</a></li>

<li>Fix regular-expression compiler to handle loops of constraint arcs. It's possible to construct regular expressions that contain loops of constraint arcs (that is, ^ $ AHEAD BEHIND or LACON arcs). There's no use in fully traversing such a loop at execution, since you'd just end up in the same NFA state without having consumed any input. Worse, such a loop leads to infinite looping in the pullback/pushfwd stage of compilation, because we keep pushing or pulling the same constraints around the loop in a vain attempt to move them to the pre or post state. Such looping was previously recognized in CVE-2007-4772; but the fix only handled the case of trivial single-state loops (that is, a constraint arc leading back to its source state) ... and not only that, it was incorrect even for that case, because it broke the admittedly-not-very-clearly-stated API contract of the pull() and push() subroutines. The first two regression test cases added by this commit exhibit patterns that result in assertion failures because of that (though there seem to be no ill effects in non-assert builds). The other new test cases exhibit multi-state constraint loops; in an unpatched build they will run until the NFA state-count limit is exceeded. To fix, remove the code added for CVE-2007-4772, and instead create a general-purpose constraint-loop-breaking phase of regex compilation that executes before we do pullback/pushfwd. Since we never need to traverse a constraint loop fully, we can just break the loop at any chosen spot, if we add clone states that can replicate any sequence of arc transitions that would've traversed just part of the loop. Also add some commentary clarifying why we have to have all these machinations in the first place. This class of problems has been known for some time --- we had a report from Marc Mamin about two years ago, for example, and there are related complaints in the Tcl bug tracker. I had discussed a fix of this kind off-list with Henry Spencer, but didn't get around to doing something about it until the issue was rediscovered by Greg Stark recently. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48789c5d23a7f382e3cb721547d5e0af7aaa4585">http://git.postgresql.org/pg/commitdiff/48789c5d23a7f382e3cb721547d5e0af7aaa4585</a></li>

<li>Improve performance of pullback/pushfwd in regular-expression compiler. The previous coding would create a new intermediate state every time it wanted to interchange the ordering of two constraint arcs. Certain regex features such as \Y can generate large numbers of parallel constraint arcs, and if we needed to reorder the results of that, we created unreasonable numbers of intermediate states. To improve matters, keep a list of already-created intermediate states associated with the state currently being considered by the outer loop; we can re-use such states to place all the new arcs leading to the same destination or source. I also took the trouble to redefine push() and pull() to have a less risky API: they no longer delete any state or arc that the caller might possibly have a pointer to, except for the specifically-passed constraint arc. This reduces the risk of re-introducing the same type of error seen in the failed patch for CVE-2007-4772. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a7153661d66a00a03ff117c24fa49480b0699c8">http://git.postgresql.org/pg/commitdiff/6a7153661d66a00a03ff117c24fa49480b0699c8</a></li>

<li>Fix O(N^2) performance problems in regular-expression compiler. Change the singly-linked in-arc and out-arc lists to be doubly-linked, so that arc deletion is constant time rather than having worst-case time proportional to the number of other arcs on the connected states. Modify the bulk arc transfer operations copyins(), copyouts(), moveins(), moveouts() so that they use a sort-and-merge algorithm whenever there's more than a small number of arcs to be copied or moved. The previous method is O(N^2) in the number of arcs involved, because it performs duplicate checking independently for each copied arc. The new method may change the ordering of existing arcs for the destination state, but nothing really cares about that. Provide another bulk arc copying method mergeins(), which is unused as of this commit but is needed for the next one. It basically is like copyins(), but the source arcs might not all come from the same state. Replace the O(N^2) bubble-sort algorithm used in carcsort() with a qsort() call. These changes greatly improve the performance of regex compilation for large or complex regexes, at the cost of extra space for arc storage during compilation. The original tradeoff was probably fine when it was made, but now we care more about speed and less about memory consumption. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/579840ca05e73ac23a3c2616f050333ba853fb34">http://git.postgresql.org/pg/commitdiff/579840ca05e73ac23a3c2616f050333ba853fb34</a></li>

<li>Improve performance of fixempties() pass in regular-expression compiler. The previous coding took something like O(N^4) time to fully process a chain of N EMPTY arcs. We can't really do much better than O(N^2) because we have to insert about that many arcs, but we can do lots better than what's there now. The win comes partly from using mergeins() to amortize de-duplication of arcs across multiple source states, and partly from exploiting knowledge of the ordering of arcs for each state to avoid looking at arcs we don't need to consider during the scan. We do have to be a bit careful of the possible reordering of arcs introduced by the sort-merge coding of the previous commit, but that's not hard to deal with. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5b7d103bc4a97a64f9e8ca83192a96767d9a34c">http://git.postgresql.org/pg/commitdiff/f5b7d103bc4a97a64f9e8ca83192a96767d9a34c</a></li>

<li>Miscellaneous cleanup of regular-expression compiler. Revert our previous addition of "all" flags to copyins() and copyouts(); they're no longer needed, and were never anything but an unsightly hack. Improve a couple of infelicities in the REG_DEBUG code for dumping the NFA data structure, including adding code to count the total number of states and arcs. Add a couple of missed error checks. Add some more documentation in the README file, and some regression tests illustrating cases that exceeded the state-count limit and/or took unreasonable amounts of time before this set of patches. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/afdfcd3f7617c9b7be5966d66ddabdc2e92eb99b">http://git.postgresql.org/pg/commitdiff/afdfcd3f7617c9b7be5966d66ddabdc2e92eb99b</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Improve INSERT .. ON CONFLICT error message. Peter Geoghegan, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8dd19af50950d4933da7ad60f93388e9d0eb851">http://git.postgresql.org/pg/commitdiff/b8dd19af50950d4933da7ad60f93388e9d0eb851</a></li>

<li>Have dtrace depend on object files directly, not objfiles.txt Per Mark Johnston, this resolves a build error on FreeBSD related to the fact that dtrace is modifying the generated object files under the hood. Consequently, without this, dtrace gets reinvoked at install time because the object files have been updated. This is a pretty hacky fix, but it shouldn't hurt anything, and it's not clear that it's worth expending any more effort for a feature that not too many people are using. Patch by Mark Johnston. This is arguably back-patchable as a bug fix to the build system, but I'm not certain enough of the consequences to try that. Let's see what the buildfarm (and our packagers) think of this change on master first. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73537828537239923a0f827a92b20502a3efa52d">http://git.postgresql.org/pg/commitdiff/73537828537239923a0f827a92b20502a3efa52d</a></li>

<li>Allow FDWs to push down quals without breaking EvalPlanQual rechecks. This fixes a long-standing bug which was discovered while investigating the interaction between the new join pushdown code and the EvalPlanQual machinery: if a ForeignScan appears on the inner side of a paramaterized nestloop, an EPQ recheck would re-return the original tuple even if it no longer satisfied the pushed-down quals due to changed parameter values. This fix adds a new member to ForeignScan and ForeignScanState and a new argument to make_foreignscan, and requires changes to FDWs which push down quals to populate that new argument with a list of quals they have chosen to push down. Therefore, I'm only back-patching to 9.5, even though the bug is not new in 9.5. Etsuro Fujita, reviewed by me and by Kyotaro Horiguchi. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fc4c26db5120bd90348b6ee3101fcddfdf54800">http://git.postgresql.org/pg/commitdiff/5fc4c26db5120bd90348b6ee3101fcddfdf54800</a></li>

<li>Revert "Have dtrace depend on object files directly, not objfiles.txt" This reverts commit 73537828537239923a0f827a92b20502a3efa52d. Per report from Tom Lane, this breaks parallel builds. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08fbad0afd62690cc82990c0504529ef238ac24d">http://git.postgresql.org/pg/commitdiff/08fbad0afd62690cc82990c0504529ef238ac24d</a></li>

<li>Don't send protocol messages to a shm_mq that no longer exists. Commit 2bd9e412f92bc6a68f3e8bcb18e04955cc35001d introduced a mechanism for relaying protocol messages from a background worker to another backend via a shm_mq. However, there was no provision for shutting down the communication channel. Therefore, a protocol message sent late in the shutdown sequence, such as a DEBUG message resulting from cranking up log_min_messages, could crash the server. To fix, install an on_dsm_detach callback that disables sending messages to the shm_mq when the associated DSM is detached. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ad5c27bb565c26a4b12ea3343331c80f121f269">http://git.postgresql.org/pg/commitdiff/2ad5c27bb565c26a4b12ea3343331c80f121f269</a></li>

<li>Transfer current command counter ID to parallel workers. Commit 924bcf4f16d54c55310b28f77686608684734f42 correctly forbade parallel workers to modify the command counter while in parallel mode, but it inexplicably neglected to actually transfer the current command counter from leader to workers. This can result in the workers seeing a different set of tuples from the leader, which is bad. Repair. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/423ec0877ff29bc78e48e50362dbcde351a1f025">http://git.postgresql.org/pg/commitdiff/423ec0877ff29bc78e48e50362dbcde351a1f025</a></li>

<li>Tighten up application of parallel mode checks. Commit 924bcf4f16d54c55310b28f77686608684734f42 failed to enforce parallel mode checks during the commit of a parallel worker, because we exited parallel mode prior to ending the transaction so that we could pop the active snapshot. Re-establish parallel mode during parallel worker commit. Without this, it's far too easy for unsafe actions during the pre-commit sequence to crash the server instead of hitting the error checks as intended. Just to be extra paranoid, adjust a couple of the sanity checks in xact.c to check not only IsInParallelMode() but also IsParallelWorker(). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94b4f7e2a635c3027a23b07086f740615b56aa64">http://git.postgresql.org/pg/commitdiff/94b4f7e2a635c3027a23b07086f740615b56aa64</a></li>

<li>Invalidate caches after cranking up a parallel worker transaction. Starting a parallel worker transaction changes our notion of which XIDs are in-progress or committed, and our notion of the current command counter ID. Therefore, our view of these caches prior to starting this transaction may no longer valid. Defend against that by clearing them. This fixes a bug in commit 924bcf4f16d54c55310b28f77686608684734f42. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6de6d96d971c76c8d7bd3b31e6f182906137f913">http://git.postgresql.org/pg/commitdiff/6de6d96d971c76c8d7bd3b31e6f182906137f913</a></li>

<li>Fix a problem with parallel workers being unable to restore role. check_role() tries to verify that the user has permission to become the requested role, but this is inappropriate in a parallel worker, which needs to exactly recreate the master's authorization settings. So skip the check in that case. This fixes a bug in commit 924bcf4f16d54c55310b28f77686608684734f42. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82b37765c76b8b2daf6cad3dfb5e5b4a2776d56f">http://git.postgresql.org/pg/commitdiff/82b37765c76b8b2daf6cad3dfb5e5b4a2776d56f</a></li>

<li>Mark more functions parallel-restricted or parallel-unsafe. Commit 7aea8e4f2daa4b39ca9d1309a0c4aadb0f7ed81b was overoptimistic about the degree of safety associated with running various functions in parallel mode. Functions that take a table name or OID as an argument are at least parallel-restricted, because the table might be temporary, and we currently don't allow parallel workers to touch temporary tables. Functions that take a query as an argument are outright unsafe, because the query could be anything, including a parallel-unsafe query. Also, the queue of pending notifications is backend-private, so adding to it from a worker doesn't behave correctly. We could fix this by transferring the worker's queue of pending notifications to the master during worker cleanup, but that seems like more trouble than it's worth for now. In addition to adjusting the pg_proc.h markings, also add an explicit check for this in async.c. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/816e336f12ecabdc834d4cc31bcf966b2dd323dc">http://git.postgresql.org/pg/commitdiff/816e336f12ecabdc834d4cc31bcf966b2dd323dc</a></li>

<li>Rewrite interaction of parallel mode with parallel executor support. In the previous coding, before returning from ExecutorRun, we'd shut down all parallel workers. This was dead wrong if ExecutorRun was called with a non-zero tuple count; it had the effect of truncating the query output. To fix, give ExecutePlan control over whether to enter parallel mode, and have it refuse to do so if the tuple count is non-zero. Rewrite the Gather logic so that it can cope with being called outside parallel mode. Commit 7aea8e4f2daa4b39ca9d1309a0c4aadb0f7ed81b is largely to blame for this problem, though this patch modifies some subsequently-committed code which relied on the guarantees it purported to make. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfc78d7196eb28cd4e3d6c24f7e607bacecf1129">http://git.postgresql.org/pg/commitdiff/bfc78d7196eb28cd4e3d6c24f7e607bacecf1129</a></li>

<li>Prohibit parallel query when the isolation level is serializable. In order for this to be safe, the code which hands true serializability will need to taught that the SIRead locks taken by a parallel worker pertain to the same transaction as those taken by the parallel leader. Some further changes may be needed as well. Until the necessary adaptations are made, don't generate parallel plans in serializable mode, and if a previously-generated parallel plan is used after serializable mode has been activated, run it serially. This fixes a bug in commit 7aea8e4f2daa4b39ca9d1309a0c4aadb0f7ed81b. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a53c06a13eb4669d08ce8a5199aee51f88dd453e">http://git.postgresql.org/pg/commitdiff/a53c06a13eb4669d08ce8a5199aee51f88dd453e</a></li>

<li>Remove cautions about using volatile from spin.h. Commit 0709b7ee72e4bc71ad07b7120acd117265ab51d0 obsoleted this comment but neglected to update it. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/78652a3332128c89ae369e03698f7212ca73d022">http://git.postgresql.org/pg/commitdiff/78652a3332128c89ae369e03698f7212ca73d022</a></li>

<li>Remove volatile qualifiers from dynahash.c, shmem.c, and sinvaladt.c Prior to commit 0709b7ee72e4bc71ad07b7120acd117265ab51d0, access to variables within a spinlock-protected critical section had to be done through a volatile pointer, but that should no longer be necessary. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/430008b5a7ac395ab3057377104148e80718045c">http://git.postgresql.org/pg/commitdiff/430008b5a7ac395ab3057377104148e80718045c</a></li>

<li>Remove volatile qualifiers from proc.c and procarray.c Prior to commit 0709b7ee72e4bc71ad07b7120acd117265ab51d0, access to variables within a spinlock-protected critical section had to be done through a volatile pointer, but that should no longer be necessary. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d53e3d5fe0b97ebcec5340dc4f44faf2b1a5d52f">http://git.postgresql.org/pg/commitdiff/d53e3d5fe0b97ebcec5340dc4f44faf2b1a5d52f</a></li>

<li>Allow a parallel context to relaunch workers. This may allow some callers to avoid the overhead involved in tearing down a parallel context and then setting up a new one, which means releasing the DSM and then allocating and populating a new one. I suspect we'll want to revise the Gather node to make use of this new capability, but even if not it may be useful elsewhere and requires very little additional code. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0b0d84b3d663a148022e900ebfc164284a95f55">http://git.postgresql.org/pg/commitdiff/b0b0d84b3d663a148022e900ebfc164284a95f55</a></li>

<li>Add a C API for parallel heap scans. Using this API, one backend can set up a ParallelHeapScanDesc to which multiple backends can then attach. Each tuple in the relation will be returned to exactly one of the scanning backends. Only forward scans are supported, and rescans must be carefully coordinated. This is not exposed to the planner or executor yet. The original version of this code was written by me. Amit Kapila reviewed it, tested it, and improved it, including adding support for synchronized scans, per review comments from Jeff Davis. Extensive testing of this and related patches was performed by Haribabu Kommi. Final cleanup of this patch by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee7ca559fcf404f9a3bd99da85c8f4ea9fbc2e92">http://git.postgresql.org/pg/commitdiff/ee7ca559fcf404f9a3bd99da85c8f4ea9fbc2e92</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>pg_upgrade: reorder controldata checks to match program output Also improve comment for how float8_pass_by_value is used. Backpatch through 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa7f9493a02f5981c09b924323f0e7a58a32f2ed">http://git.postgresql.org/pg/commitdiff/aa7f9493a02f5981c09b924323f0e7a58a32f2ed</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Fix bogus comments Author: Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/817588bc2bd684b630da11ca068505dbd985de10">http://git.postgresql.org/pg/commitdiff/817588bc2bd684b630da11ca068505dbd985de10</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Fix order of arguments in ecpg generated typedef command. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d07fea542f18f3d4bc5413a5fc23d69b9fcb631c">http://git.postgresql.org/pg/commitdiff/d07fea542f18f3d4bc5413a5fc23d69b9fcb631c</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Robert Haas sent in a flock of parallelism-related fixes.</p>

<p>Robert Haas and Amit Kapila traded patches for parallel sequential scan.</p>

<p>Peter Geoghegan sent in a patch to set a sentinel value in the SortSupport code.</p>

<p>kolo hhmow sent in a patch to add an rhost option to PAM auth.</p>

<p>Robbie Harwood sent in another revision of a patch to add GSSAPI encryption support.</p>

<p>Michael Paquier sent in a patch to fix TAP tests on Windows.</p>

<p>Alexander Korotkov sent in another revision of a patch to use pg_rewind when target timeline was switched.</p>

<p>Craig Ringer sent in a patch to fix a typo in replorigin_sesssion_origin.</p>

<p>Victor Wagner sent in another revision of a patch to implement failover on the libpq connect level.</p>

<p>Ashutosh Bapat and Robert Haas traded patches to get sorted data from a foreign server.</p>

<p>Peter Geoghegan sent in two more revisions of a patch to the SortSupport code to correctly distinguish the contents of text buffers.</p>

<p>Kevin Grittner sent in another revision of a patch to implement "snapshot too old," this one configured by time.</p>

<p>Craig Ringer sent in two revisions of a patch to expose origin_id to logical decoding callacks, the lack of which was causing functionality issues.</p>

<p>Dmitry Vasilyev, Amit Kapila, and Kyotaro HORIGUCHI traded patches to fix an issue where some failures on Windows were being caused by too-aggressive error raising.</p>

<p>Michael Paquier sent in another revision of a patch to add some overflow checks in helpful places.</p>

<p>Alexander Korotkov sent in another revision of a patch to do partial sorting.</p>

<p>Jinyu Zhang sent in another revision of a patch to optimize memory allocation in function 'bringetbitmap'.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement DROP DATABASE ... FORCE.</p>

<p>Tom Lane sent in a WIP patch to add lookbehind constraints to the regex engine.</p>

<p>Joe Conway sent in a patch to add a hook for SET ROLE.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in two revisions of a patch to add a PL/PythonU wrapper for ereport().</p>

<p>Joe Conway sent in a patch to add a TYPE expression.</p>

<p>Petr Jelinek sent in a patch to add a variable to the shmem which is used for module activation tracking - set to true in ActiveCommitTs() and false in DeactivateCommitTs().</p>

<p>Simon Riggs and Shay Rojansky sent in competing ideas for a way to deal with the fact that ssl_renegotiation limit has been removed as of 9.5.</p>

<p>Jeff Janes sent in a patch to add tab completion for extension versions.</p>

<p>Thomas Munro sent in another revision of a patch to refactor psql's tab-complete.c into a state easier to understand and extend.</p>