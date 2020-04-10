---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 novembre 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-11-16-nouvelles-hebdomadaires-de-postgresql-11-novembre-2012 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix handling of inherited check constraints in ALTER COLUMN TYPE. This case got broken in 8.4 by the addition of an error check that complains if ALTER TABLE ONLY is used on a table that has children. We do use ONLY for this situation, but it's okay because the necessary recursion occurs at a higher level. So we need to have a separate flag to suppress recursion without making the error check. Reported and patched by Pavan Deolasee, with some editorial adjustments by me. Back-patch to 8.4, since this is a regression of functionality that worked in earlier branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ed6546cf75623ba426942a3b71659a66cf7ed68">http://git.postgresql.org/pg/commitdiff/5ed6546cf75623ba426942a3b71659a66cf7ed68</a></li>

<li>Fix missing inclusions. Some platforms require including &lt;netinet/in.h&gt; and/or &lt;arpa/inet.h&gt; to use htonl() and ntohl(). Per build failure locally. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e45e03886c75dd049bcc1b063e0bf34e46a3a62">http://git.postgresql.org/pg/commitdiff/9e45e03886c75dd049bcc1b063e0bf34e46a3a62</a></li>

<li>Don't trash input list structure in does_not_exist_skipping(). The trigger and rule cases need to split up the input name list, but they mustn't corrupt the passed-in data structure, since it could be part of a cached utility-statement parsetree. Per bug #7641. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75af5ae9c017d70531bd49178adfd3103cd40a76">http://git.postgresql.org/pg/commitdiff/75af5ae9c017d70531bd49178adfd3103cd40a76</a></li>

<li>Rename ResolveNew() to ReplaceVarsFromTargetList(), and tweak its API. This function currently lacks the option to throw error if the provided targetlist doesn't have any matching entry for a Var to be replaced. Two of the four existing call sites would be better off with an error, as would the usage in the pending auto-updatable-views patch, so it seems past time to extend the API to support that. To do so, replace the "event" parameter (historically of type CmdType, though it was declared plain int) with a special-purpose enum type. It's unclear whether this function might be called by third-party code. Since many C compilers wouldn't warn about a call site continuing to use the old calling convention, rename the function to forcibly break any such code that hasn't been updated. The old name was none too well chosen anyhow. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcc55dd21aa2ba18b28ba9fa441885ef9c99d3c6">http://git.postgresql.org/pg/commitdiff/dcc55dd21aa2ba18b28ba9fa441885ef9c99d3c6</a></li>

<li>Fix WaitLatch() to return promptly when the requested timeout expires. If the sleep is interrupted by a signal, we must recompute the remaining time to wait; otherwise, a steady stream of non-wait-terminating interrupts could delay return from WaitLatch indefinitely. This has been shown to be a problem for the autovacuum launcher, and there may well be other places now or in the future with similar issues. So we'd better make the function robust, even though this'll add at least one gettimeofday call per wait. Back-patch to 9.2. We might eventually need to fix 9.1 as well, but the code is quite different there, and the usage of WaitLatch in 9.1 is so limited that it's not clearly important to do so. Reported and diagnosed by Jeff Janes, though I rewrote his patch rather heavily. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e7fdcffd6f77187b72b0496d61d782932973af6">http://git.postgresql.org/pg/commitdiff/3e7fdcffd6f77187b72b0496d61d782932973af6</a></li>

<li>Check for stack overflow in transformSetOperationTree(). Since transformSetOperationTree() recurses, it can be driven to stack overflow with enough UNION/INTERSECT/EXCEPT clauses in a query. Add a check to ensure it fails cleanly instead of crashing. Per report from Matthew Gerber (though it's not clear whether this is the only thing going wrong for him). Historical note: I think the reasoning behind not putting a check here in the beginning was that the check in transformExpr() ought to be sufficient to guard the whole parser. However, because transformSetOperationTree() recurses all the way to the bottom of the set-operation tree before doing any analysis of the statement's expressions, that check doesn't save it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34f3b396a6554903007031b0541781b7ecdd6e4d">http://git.postgresql.org/pg/commitdiff/34f3b396a6554903007031b0541781b7ecdd6e4d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, set synchronous_commit=off for the new cluster, to improve performance when restoring the schema from the old cluster. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed5699dd1b883e193930448b7ad532e233de0bd7">http://git.postgresql.org/pg/commitdiff/ed5699dd1b883e193930448b7ad532e233de0bd7</a></li>

<li>In pg_upgrade docs, mention using base backup as part of rsync for logical replication upgrades. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c90dcd6d2c76402ce307b0d44958c6ca274f2c39">http://git.postgresql.org/pg/commitdiff/c90dcd6d2c76402ce307b0d44958c6ca274f2c39</a></li>

<li>Add URLs to document why DLLIMPORT is needed on Windows. Per email from Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa69670e4296321b51251d34e9bd2c4bc17aab75">http://git.postgresql.org/pg/commitdiff/aa69670e4296321b51251d34e9bd2c4bc17aab75</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make the streaming replication protocol messages architecture-independent. We used to send structs wrapped in CopyData messages, which works as long as the client and server agree on things like endianess, timestamp format and alignment. That's good enough for running a standby server, which has to run on the same platform anyway, but it's useful for tools like pg_receivexlog to work across platforms. This breaks protocol compatibility of streaming replication, but we never promised that to be compatible across versions, anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/add6c3179a4d4fa3e62dd3e86a00f23303336bac">http://git.postgresql.org/pg/commitdiff/add6c3179a4d4fa3e62dd3e86a00f23303336bac</a></li>

<li>Teach pg_basebackup and pg_receivexlog to reply to server keepalives. Without this, the connection will be killed after timeout if wal_sender_timeout is set in the server. Original patch by Amit Kapila, modified by me to fit recent changes in the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9dad56441e4bc5d20c34bd56daf8e72df1b22d3">http://git.postgresql.org/pg/commitdiff/a9dad56441e4bc5d20c34bd56daf8e72df1b22d3</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't try to use a unopened relation. Commit 4c9d0901 mistakenly introduced a call to TransferPredicateLocksToHeapRelation() on an index relation that had been closed a few lines above. Moving up an index_open() call that's below is enough to fix the problem. Discovered by me while testing an unrelated patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ee5c40b06f098910ed0fc5fd72fb2744776ccbb">http://git.postgresql.org/pg/commitdiff/4ee5c40b06f098910ed0fc5fd72fb2744776ccbb</a></li>

<li>Remove leftover LWLockRelease() call. This code was refactored in d5497b95 but an extra LWLockRelease call was left behind. Per report from Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa12cb7f0241c767a072c980d75780c9ec036e01">http://git.postgresql.org/pg/commitdiff/fa12cb7f0241c767a072c980d75780c9ec036e01</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>XSLT stylesheet: Add slash to directory name. Some versions of the XSLT stylesheets don't handle the missing slash correctly (they concatenate directory and file name without the slash). This might never have worked correctly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/732740e7d440baac832fbce9a000193a55a35d43">http://git.postgresql.org/pg/commitdiff/732740e7d440baac832fbce9a000193a55a35d43</a></li>

<li>doc: "only relevant" -&gt; "relevant only". Karl O. Pinc 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42218f29af41c430b94e0d074f404816de4ba278">http://git.postgresql.org/pg/commitdiff/42218f29af41c430b94e0d074f404816de4ba278</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Chen Huajun's patch to fix the errcontext() function. Not all compilers support the varargs macros on which it depends.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in another revision of the \gset patch for psql.</li>

<li>Karl O. Pinc sent in two more revisions of a patch to fix some table formatting in the docs.</li>

<li>Robert Haas sent in a patch to fix a failure to infer types in functions.</li>

<li>Laurenz Albe sent in a patch extending libpq to support combinations of text and binary results.</li>

<li>Amit Kapila sent in another revision of the patch to improve performance for update operations by reducing WAL activity.</li>

<li>Fujii Masao sent in a patch which adds a pgstatginindex() function.</li>

<li>Fujii Masao sent in two patches to make walreceiver detect network partitions faster, one by not checking for integer_datetimes, the other by removing redundant GetCurrentTimestamp() calls from XLogWalRcvSendReply() and XLogWalRcvSendHSFeedback(), where --enable-integer-datetimes is on.</li>

<li>Jeff Janes sent in a patch to fix the bug where autovacuum is being starved by sinval messages. The approach taken involves adding a poll timeout.</li>

<li>Jeff Janes sent in a patch to fix pg_dump for pg_upgrade purposes.</li>

<li>Jon Erdman sent in two revisions of a patch to indicate a function's security status (invoker or definer) in \df+ output.</li>

<li>Tom Lane sent in three revisions of a patch to fix an oversight in buffer locking during hot standby replay.</li>

<li>Tomas Vondra sent in another revision of a patch to allow admins to cut down the amount of output in pg_bench via sampling every five seconds rather than constantly.</li>

<li>Tomas Vondra sent in another revision of the patch to make dropping multiple tables quicker.</li>

<li>Tomas Vondra sent in another revision of a patch to enable writing aggregate input to the log.</li>

</ul>