---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 août 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-09-01-nouvelles-hebdomadaires-de-postgresql-30-aout-2015 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Tweak wording of syntax error messages about bad CONTINUE/EXIT statements. Try to avoid any possible confusion about what these messages mean. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18391a8f0649f40bb841e6492895551fd873f79b">http://git.postgresql.org/pg/commitdiff/18391a8f0649f40bb841e6492895551fd873f79b</a></li>

<li>Fix potential platform dependence in gist regression test. The results of the KNN-search test cases were indeterminate, as they asked the system to sort pairs of points that are exactly equidistant from the query reference point. It's a bit surprising that we've seen no platform-specific failures from this in the buildfarm. Perhaps IEEE-float math is well enough standardized that no such failures will ever occur on supported platforms ... but since this entire regression test has yet to be shipped in any non-alpha release, that seems like an unduly optimistic assumption. Tweak the queries so that the correct output is uniquely defined. (The other queries in this test are also underdetermined; but it looks like they are regurgitating index rows in insertion order, so for the moment assume that that behavior is stable enough.) Per Greg Stark's experiments with VAX. Back-patch to 9.5 where this test script was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e39c4afcfa0fb2c708e49e54089118d9b4ba5f89">http://git.postgresql.org/pg/commitdiff/e39c4afcfa0fb2c708e49e54089118d9b4ba5f89</a></li>

<li>Limit the verbosity of memory context statistics dumps. We had a report from Stefan Kaltenbrunner of a case in which postmaster log files overran available disk space because multiple backends spewed enormous context stats dumps upon hitting an out-of-memory condition. Given the lack of similar reports, this isn't a common problem, but it still seems worth doing something about. However, we don't want to just blindly truncate the output, because that might prevent diagnosis of OOM problems. What seems like a workable compromise is to limit the dump to 100 child contexts per parent, and summarize the space used within any additional child contexts. That should help because practical cases where the dump gets long will typically be huge numbers of siblings under the same parent context; while the additional debugging value from seeing details about individual siblings beyond 100 will not be large, we hope. Anyway it doesn't take much code or memory space to do this, so let's try it like this and see how things go. Since the summarization mechanism requires passing totals back up anyway, I took the opportunity to add a "grand total" line to the end of the printout. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b5ef8f2d070c075811ec04a0fcb745d67c7fe3f">http://git.postgresql.org/pg/commitdiff/7b5ef8f2d070c075811ec04a0fcb745d67c7fe3f</a></li>

<li>Further tweak wording of error messages about bad CONTINUE/EXIT statements. Per discussion, a little more verbosity seems called for. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/781ed2bfa35f0a8a7ad1029d3a7d7687c73d86a0">http://git.postgresql.org/pg/commitdiff/781ed2bfa35f0a8a7ad1029d3a7d7687c73d86a0</a></li>

<li>Docs: be explicit about datatype matching for lead/lag functions. The default argument, if given, has to be of exactly the same datatype as the first argument; but this was not stated in so many words, and the error message you get about it might not lead your thought in the right direction. Per bug #13587 from Robert McGehee. A quick scan says that these are the only two built-in functions with two anyelement arguments and no other polymorphic arguments. There are plenty of cases of, eg, anyarray and anyelement, but those seem less likely to confuse. For instance this doesn't seem terribly hard to figure out: "function array_remove(integer[], numeric) does not exist". So I've contented myself with fixing these two cases. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94324abfb945bd470ec63f5745a0a2e2c218989c">http://git.postgresql.org/pg/commitdiff/94324abfb945bd470ec63f5745a0a2e2c218989c</a></li>

<li>Speed up HeapTupleSatisfiesMVCC() by replacing the XID-in-progress test. Rather than consulting TransactionIdIsInProgress to see if an in-doubt transaction is still running, consult XidInMVCCSnapshot. That requires the same or fewer cycles as TransactionIdIsInProgress, and what's far more important, it does not access shared data structures (at least in the no-subxip-overflow case) so it incurs no contention. Furthermore, we would have had to check XidInMVCCSnapshot anyway before deciding that we were allowed to see the tuple. There should never be a case where XidInMVCCSnapshot says a transaction is done while TransactionIdIsInProgress says it's still running. The other way around is quite possible though. The result of that difference is that HeapTupleSatisfiesMVCC will no longer set hint bits on tuples whose source transactions recently finished but are still running according to our snapshot. The main cost of delaying the hint-bit setting is that repeated visits to a just-committed tuple, by transactions none of which have snapshots new enough to see the source transaction as done, will each execute TransactionIdIsCurrentTransactionId, which they need not have done before. However, that's normally just a small overhead, and no contention costs are involved; so it seems well worth the benefit of removing TransactionIdIsInProgress calls during the life of the source transaction. The core idea for this patch is due to Jeff Janes, who also did the legwork proving its performance benefits. His original proposal was to swap the order of TransactionIdIsInProgress and XidInMVCCSnapshot calls in some cases within HeapTupleSatisfiesMVCC. That was a bit messy though. The idea that we could dispense with calling TransactionIdIsInProgress altogether was mine, as is the final patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a7d0701814a4e293efad22091d6f6fb441bbe1c">http://git.postgresql.org/pg/commitdiff/8a7d0701814a4e293efad22091d6f6fb441bbe1c</a></li>

<li>Fix s_lock.h PPC assembly code to be compatible with native AIX assembler. On recent AIX it's necessary to configure gcc to use the native assembler (because the GNU assembler hasn't been updated to handle AIX 6+). This caused PG builds to fail with assembler syntax errors, because we'd try to compile s_lock.h's gcc asm fragment for PPC, and that assembly code relied on GNU-style local labels. We can't substitute normal labels because it would fail in any file containing more than one inlined use of tas(). Fortunately, that code is stable enough, and the PPC ISA is simple enough, that it doesn't seem like too much of a maintenance burden to just hand-code the branch offsets, removing the need for any labels. Note that the AIX assembler only accepts "$" for the location counter pseudo-symbol. The usual GNU convention is "."; but it appears that all versions of gas for PPC also accept "$", so in theory this patch will not break any other PPC platforms. This has been reported by a few people, but Steve Underwood gets the credit for being the first to pursue the problem far enough to understand why it was failing. Thanks also to Noah Misch for additional testing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c41a1215f04912108068b909569551f42059db29">http://git.postgresql.org/pg/commitdiff/c41a1215f04912108068b909569551f42059db29</a></li>

</ul>

<p>Joe Conway pushed:</p>

<ul>

<li>Reestablish alignment of pg_controldata output. Until 9.4, pg_controldata output was all aligned. At some point during 9.5 development, a new item was added, namely "Current track_commit_timestamp setting:" which is two characters too long to be aligned with the rest of the output. Fix this by removing the noise word "Current" and adding the requisite number of padding spaces. Since the six preceding items are also similar in nature, remove "Current" and pad those as well in order to maintain overall consistency. Backpatch to 9.5 where new offending item was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56c8ce8f6573d4943a621d09ebb6fe767f16d61e">http://git.postgresql.org/pg/commitdiff/56c8ce8f6573d4943a621d09ebb6fe767f16d61e</a></li>

<li>Fix sepgsql regression tests. The regression tests for sepgsql were broken by changes in the base distro as-shipped policies. Specifically, definition of unconfined_t in the system default policy was changed to bypass multi-category rules, which the regression test depended on. Fix that by defining a custom privileged domain (sepgsql_regtest_superuser_t) and using it instead of system's unconfined_t domain. The new sepgsql_regtest_superuser_t domain performs almost like the current unconfined_t, but restricted by multi-category policy as the traditional unconfined_t was. The custom policy module is a self defined domain, and so should not be affected by related future system policy changes. However, it still uses the unconfined_u:unconfined_r pair for selinux-user and role. Those definitions have not been changed for several years and seem less risky to rely on than the unconfined_t domain. Additionally, if we define custom user/role, they would need to be manually defined at the operating system level, adding more complexity to an already non-standard and complex regression test. Back-patch to 9.3. The regression tests will need more work before working correctly on 9.2. Starting with 9.2, sepgsql has had dependencies on libselinux versions that are only available on newer distros with the changed set of policies (e.g. RHEL 7.x). On 9.1 sepgsql works fine with the older distros with original policy set (e.g. RHEL 6.x), and on which the existing regression tests work fine. We might want eventually change 9.1 sepgsql regression tests to be more independent from the underlying OS policies, however more work will be needed to make that happen and it is not clear that it is worth the effort. Kohei KaiGai with review by Adam Brightwell and me, commentary by Stephen, Alvaro, Tom, Robert, and others. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/794e2558be670be65a8fdb52b99438a67cd74631">http://git.postgresql.org/pg/commitdiff/794e2558be670be65a8fdb52b99438a67cd74631</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>9.5 release notes: mention lack of char() sort improvements. Report by Peter Geoghegan. Backpatch through 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8190f2dfef0c8cf17acb678b7d24f68e4c80a44e">http://git.postgresql.org/pg/commitdiff/8190f2dfef0c8cf17acb678b7d24f68e4c80a44e</a></li>

<li>release notes: abbreviated key speedup only for varchar/text. Report by Peter Geoghegan. Backpatch through 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16d4f94e67d9b5f965b593dfb9d529bd5aaaeed9">http://git.postgresql.org/pg/commitdiff/16d4f94e67d9b5f965b593dfb9d529bd5aaaeed9</a></li>

<li>dblink docs: fix typo to use "connname" (3 n's), not "conname". This makes the parameter names match the documented prototype names. Report by Erwin Brandstetter. Backpatch through 9.0 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/119cf760d01c2a41d68ff489ad3c3b7eddc974f0">http://git.postgresql.org/pg/commitdiff/119cf760d01c2a41d68ff489ad3c3b7eddc974f0</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Simplify Perl chmod calls. The Perl chmod function already takes multiple file arguments, so we don't need a separate looping function. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c86762a242b81395d5f72b106adfe371cd33c67e">http://git.postgresql.org/pg/commitdiff/c86762a242b81395d5f72b106adfe371cd33c67e</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Clarify what some historic terms in rewriteHandler.c mean. Discussion: 20150827131352.GF2435@awork2.anarazel.de <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0f0d8097be17ae7f03fc79f622e9c95026b338a">http://git.postgresql.org/pg/commitdiff/c0f0d8097be17ae7f03fc79f622e9c95026b338a</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Ensure locks are acquired on RLS-added relations. During fireRIRrules(), get_row_security_policies can add to securityQuals and withCheckOptions. Make sure to lock any relations added at that point and before firing RIR rules on those expressions. Back-patch to 9.5 where RLS was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ba9e2b778af7a8d040283db6cee11fb03cf9f4a">http://git.postgresql.org/pg/commitdiff/2ba9e2b778af7a8d040283db6cee11fb03cf9f4a</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>David Rowley sent in two more revisions of a patch to improve the performance of outer joins where the outer side is unique.</p>

<p>Alexander Korotkov sent in another revision of a patch to rework the access method interface.</p>

<p>Simon Riggs sent in a patch to optimize some locking in clog.</p>

<p>Joe Conway sent in another revision of a patch to expose pg_controldata and pg_config as functions.</p>

<p>Amit Kapila sent in another revision of a patch to reduce contention on ProcArrayLock.</p>

<p>Michael Paquier sent in two revisions of a patch to fix some breakage in the SSL test suite.</p>

<p>SAWADA Masahiko sent in another revision of a patch to add a "frozen" bit to the visibility map.</p>

<p>Michael Paquier sent in a patch to enable replication roles to use file access functions.</p>

<p>Qingqing Zhou sent in two revisions of a patch to optimize out CTEs with subqueries in certain situations.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in two more revisions of a patch to allow sending multiple commands to psql on the command line.</p>

<p>Etsuro Fujita sent in another revision of a patch to square foreign join pushdown with EvalPlanQual.</p>

<p>Fabien COELHO sent in another revision of a patch to add checkpoint_sort and checkpoint_flush_to_disk configuration parameters and corresponding functionality.</p>

<p>Amit Kapila sent in a patch to allow pgbench to have a single-writer, multi-reader test.</p>

<p>Jeff Janes sent in a patch to move a some sleep-backoff-retry code from its current location to its only call site, ResolveRecoveryConflictWithVirtualXIDs.</p>

<p>&Atilde;&tilde;yvind A. Holm sent in a patch to add a git version to version_stamp.pl.</p>

<p>Alexander Shulgin sent in another revision of a patch to add a \uri command to psql.</p>

<p>Kyotaro HORIGUCHI sent in a patch to implement a quick check for cross-column correlation.</p>

<p>Kyotaro HORIGUCHI sent in a patch to use psql's scanner to allow multi-statement pgbench scripts.</p>

<p>Thomas Munro sent in a patch to document that background workers sending NOTIFYs should call ProcessCompletedNotifies explicitly after committing the enclosing transaction so that any notifications can be delivered.</p>

<p>Daniel Verite sent in a patch to add a \rotate command to psql.</p>

<p>Jeff Janes sent in a patch to update src/backend/storage/buffer/README to reflect current reality.</p>

<p>David Rowley sent in a patch to improve the performance of create_foreignscan_plan/ExecInitForeignScan.</p>

<p>Alexander Shulgin sent in a patch to make it possible to use signals to dump out a currently executing backend's query plan.</p>

<p>Kevin Grittner sent in a patch to add a flush to SimpleTee in src/test/perl.</p>

<p>Jeff Janes sent in another revision of a patch to fix a GIN vacuum bug, this time with lighter-weight locking.</p>