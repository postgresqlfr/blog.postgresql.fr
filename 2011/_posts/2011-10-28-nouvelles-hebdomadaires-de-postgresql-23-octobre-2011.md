---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 octobre 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-10-28-nouvelles-hebdomadaires-de-postgresql-23-octobre-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Exclude postmaster.opts from base backups. Noted by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1e25b78f9988b9917de2818febcbf6c845c6ceb">http://git.postgresql.org/pg/commitdiff/d1e25b78f9988b9917de2818febcbf6c845c6ceb</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_dump to dump casts between auto-generated types. The heuristic for when to dump a cast failed for a cast between table rowtypes, as reported by Fr&eacute;d&eacute;ric Rejol. Fix it by setting the "dump" flag for such a type the same way as the flag is set for the underlying table or base type. This won't result in the auto-generated type appearing in the output, since setting its objType to DO_DUMMY_TYPE unconditionally suppresses that. But it will result in dumpCast doing what was intended. Back-patch to 8.3. The 8.2 code is rather different in this area, and it doesn't seem worth any risk to fix a corner case that nobody has stumbled on before. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b246207bd7b553317fd90d7aefd9520eed27609a">http://git.postgresql.org/pg/commitdiff/b246207bd7b553317fd90d7aefd9520eed27609a</a></li>

<li>Remove unnecessary AssertMacro() to suppress gcc 4.6 compiler warning. There's no particular value in doing AssertMacro((tup) != NULL) in front of code that's certain to crash anyway if tup is NULL. And if "tup" is actually the address of a local variable, gcc 4.6 whinges about it. That's arguably pretty broken on gcc's part, but we might as well remove the useless test to silence the warnings. This gets rid of all the -Waddress warnings in the backend; there are some in libpq and psql that are a bit harder to avoid. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c19e0446c049dd41aed62fa398cd809017adf5e">http://git.postgresql.org/pg/commitdiff/7c19e0446c049dd41aed62fa398cd809017adf5e</a></li>

<li>Reject empty pg_hba.conf files. An empty HBA file is surely an error, since it means there is no way to connect to the server. We've not heard identifiable reports of people actually doing that, but this will also close off the case Thom Brown just complained of, namely pointing hba_file at a directory. (On at least some platforms with some directories, it will read as an empty file.) Perhaps this should be back-patched, but given the lack of previous complaints, I won't add extra work for the translators. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e27f52f3a1814e646733f51b8c24547371bef3eb">http://git.postgresql.org/pg/commitdiff/e27f52f3a1814e646733f51b8c24547371bef3eb</a></li>

<li>Suppress -Wunused-result warnings about write() and fwrite(). This is merely an exercise in satisfying pedants, not a bug fix, because in every case we were checking for failure later with ferror(), or else there was nothing useful to be done about a failure anyway. Document the latter cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa90e148ca70a235897b1227f1a7cd1c66bc5368">http://git.postgresql.org/pg/commitdiff/aa90e148ca70a235897b1227f1a7cd1c66bc5368</a></li>

<li>Suppress remaining -Waddress warnings from recent gcc versions. Still an exercise in satisfying pedants. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e331c60ea727f998eb1023e8a2c468692d10032e">http://git.postgresql.org/pg/commitdiff/e331c60ea727f998eb1023e8a2c468692d10032e</a></li>

<li>Fix memory leak in tab completion. This was introduced in commit e49ad77ff958b380ea6fa08c72e2dce97ac56c6b. Fixed in another, more future-proof way in HEAD. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/790fa1fdd8bb32e2e9055dd47d76c2382c51c84a">http://git.postgresql.org/pg/commitdiff/790fa1fdd8bb32e2e9055dd47d76c2382c51c84a</a></li>

<li>Rewrite tab completion's previous-word fetching for more sanity. Make it return empty strings when there are no more words to the left of the current position, instead of sometimes returning NULL and other times returning copies of the leftmost word. Also, fetch the words in one scan, rather than the previous wasteful approach of starting from scratch for each word. Make the code a bit harder to break when someone decides we need more words of context, too. (There was actually a memory leak here, because whoever added prev6_wd neglected to free it.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dce92c6d6abe302c58fd4e4221efed54913aefdb">http://git.postgresql.org/pg/commitdiff/dce92c6d6abe302c58fd4e4221efed54913aefdb</a></li>

<li>Simplify and improve ProcessStandbyHSFeedbackMessage logic. There's no need to clamp the standby's xmin to be greater than GetOldestXmin's result; if there were any such need this logic would be hopelessly inadequate anyway, because it fails to account for within-database versus cluster-wide values of GetOldestXmin. So get rid of that, and just rely on sanity-checking that the xmin is not wrapped around relative to the nextXid counter. Also, don't reset the walsender's xmin if the current feedback xmin is indeed out of range; that just creates more problems than we already had. Lastly, don't bother to take the ProcArrayLock; there's no need to do that to set xmin. Also improve the comments about this in GetOldestXmin itself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4a0223d008d7c2c9824d846e22b664b2f09cf6e">http://git.postgresql.org/pg/commitdiff/b4a0223d008d7c2c9824d846e22b664b2f09cf6e</a></li>

<li>More cleanup after failed reduced-lock-levels-for-DDL feature. Turns out that use of ShareUpdateExclusiveLock or ShareRowExclusiveLock to protect DDL changes had gotten copied into several places that were not touched by either of Simon's original patches for the feature, and thus neither he nor I thought to revert them. (Indeed, it appears that two of these uses were committed *after* the reversion, which just goes to show that git merging is no panacea.) Change these places to use AccessExclusiveLock again. If we ever manage to resurrect that feature, we're going to have to think a bit harder about how to keep lock level usage in sync for DDL operations that aren't within the AlterTable infrastructure. Two of these bugs are only in HEAD, but one is in the 9.1 branch too. Alvaro Herrera found one of them, I found the other two. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ac5980744149f062ec599015ffe7a7689dd117b">http://git.postgresql.org/pg/commitdiff/5ac5980744149f062ec599015ffe7a7689dd117b</a></li>

<li>Code review for pgstat_get_crashed_backend_activity patch. Avoid possibly dumping core when pgstat_track_activity_query_size has a less-than-default value; avoid uselessly searching for the query string of a successfully-exited backend; don't bother putting out an ERRDETAIL if we don't have a query to show; some other minor stylistic improvements. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9c92a5a3ead738c7de0dffa203a92b4d2fec413">http://git.postgresql.org/pg/commitdiff/f9c92a5a3ead738c7de0dffa203a92b4d2fec413</a></li>

<li>Support synchronization of snapshots through an export/import procedure. A transaction can export a snapshot with pg_export_snapshot(), and then others can import it with SET TRANSACTION SNAPSHOT. The data does not leave the server so there are not security issues. A snapshot can only be imported while the exporting transaction is still running, and there are some other restrictions. I'm not totally convinced that we've covered all the bases for SSI (true serializable) mode, but it works fine for lesser isolation modes. Joachim Wieland, reviewed by Marko Tiikkaja, and rather heavily modified by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb446b689b6681eb57a8a50605e119743190c4db">http://git.postgresql.org/pg/commitdiff/bb446b689b6681eb57a8a50605e119743190c4db</a></li>

<li>Don't trust deferred-unique indexes for join removal. The uniqueness condition might fail to hold intra-transaction, and assuming it does can give incorrect query results. Per report from Marti Raudsepp, though this is not his proposed patch. Back-patch to 9.0, where both these features were introduced. In the released branches, add the new IndexOptInfo field to the end of the struct, to try to minimize ABI breakage for third-party code that may be examining that struct. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f39d5050dc0dce99258381f33f1832c437aff85">http://git.postgresql.org/pg/commitdiff/0f39d5050dc0dce99258381f33f1832c437aff85</a></li>

<li>Improve git_changelog's handling of inconsistent commit orderings. Use the CommitDate not the AuthorDate, as the former is representative of the order in which things went into the main repository, and the latter isn't very; we now have instances where the AuthorDate is as much as a month before the patch really went in. Also, get rid of the "commit order inversions" heuristic, which turns out not to do anything very desirable. Instead we just print commits in strict timestamp order, interpreting the "timestamp" of a merged commit as its timestamp on the newest branch it appears in. This fixes some cases where very ancient commits were being printed relatively early in the report. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7299778a958112b0339ab29365ba0d654bd5d21c">http://git.postgresql.org/pg/commitdiff/7299778a958112b0339ab29365ba0d654bd5d21c</a></li>

<li>Make psql support tab completion of EXECUTE &lt;prepared-statement-name&gt;. Andreas Karlsson, reviewed by Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8140c1bcf355c4925114cc127de476384053dc96">http://git.postgresql.org/pg/commitdiff/8140c1bcf355c4925114cc127de476384053dc96</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make the CHECKPOINT reference page more clear. Josh Kupershmidt, reviewed by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c53d3a9ee1b1c85c7d905fb8ca80d327a55f1dfb">http://git.postgresql.org/pg/commitdiff/c53d3a9ee1b1c85c7d905fb8ca80d327a55f1dfb</a></li>

<li>Document that postmaster.opts is excluded from base backups. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3716ab2c0c87e9a7c03ce86799006accb674ca6f">http://git.postgresql.org/pg/commitdiff/3716ab2c0c87e9a7c03ce86799006accb674ca6f</a></li>

<li>Add some more regression tests for DROP IF EXISTS. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3301c83536e9da1e573e24ded2e610062dbf9cdc">http://git.postgresql.org/pg/commitdiff/3301c83536e9da1e573e24ded2e610062dbf9cdc</a></li>

<li>Consolidate DROP handling for some object types. This gets rid of a significant amount of duplicative code. KaiGai Kohei, reviewed in earlier versions by Dimitri Fontaine, with further review and cleanup by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82a4a777d94bec965ab2f1d04b6e6a3f0447b377">http://git.postgresql.org/pg/commitdiff/82a4a777d94bec965ab2f1d04b6e6a3f0447b377</a></li>

<li>Remove a few of the new DROP-IF-EXISTS regression tests. Commit 3301c83536e9da1e573e24ded2e610062dbf9cdc broke the build farm. Let's try to fix that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bf08994934d8e561c2cacc4fb4fc7e7eb602d2e">http://git.postgresql.org/pg/commitdiff/0bf08994934d8e561c2cacc4fb4fc7e7eb602d2e</a></li>

<li>Add "skipping" to the NOTICE produced by DROP OPERATOR CLASS IF EXISTS. This makes this message consistent with all the other similar notices produced by other DROP IF EXISTS commands. Noted by KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d751018d881f415a61787424d900ae8a7126da3">http://git.postgresql.org/pg/commitdiff/1d751018d881f415a61787424d900ae8a7126da3</a></li>

<li>Fix get_object_namespace() not to think extensions are "in" a schema. extnamespace means something altogether different in this context. Mostly by accident, this coding error (introduced in my commit 82a4a777d94bec965ab2f1d04b6e6a3f0447b377) broke the buildfarm instead of just silently doing the wrong thing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f3362d4b7430079bb53a954e372955eb285cf52">http://git.postgresql.org/pg/commitdiff/8f3362d4b7430079bb53a954e372955eb285cf52</a></li>

<li>Fix DROP OPERATOR FAMILY IF EXISTS. Essentially, the "IF EXISTS" portion was being ignored, and an error thrown anyway if the opfamily did not exist. I broke this in commit fd1843ff8979c0461fb3f1a9eab61140c977e32d; so backpatch to 9.1.X. Report and diagnosis by KaiGai Kohei. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/980261929f2b8c40d6be1979ff81c943cad907b3">http://git.postgresql.org/pg/commitdiff/980261929f2b8c40d6be1979ff81c943cad907b3</a></li>

<li>Try to log current the query string when a backend crashes. To avoid minimize risk inside the postmaster, we subject this feature to a number of significant limitations. We very much wish to avoid doing any complex processing inside the postmaster, due to the posssibility that the crashed backend has completely corrupted shared memory. To that end, no encoding conversion is done; instead, we just replace anything that doesn't look like an ASCII character with a question mark. We limit the amount of data copied to 1024 characters, and carefully sanity check the source of that data. While these restrictions would doubtless be unacceptable in a general-purpose logging facility, even this limited facility seems like an improvement over the status quo ante. Marti Raudsepp, reviewed by PDXPUG and myself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8e8b5a6e20bf471d83059aebe64bca16f184057">http://git.postgresql.org/pg/commitdiff/c8e8b5a6e20bf471d83059aebe64bca16f184057</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix overly-complicated usage of errcode_for_file_access(). No need to do "errcode(errcode_for_file_access())", just "errcode_for_file_access()" is enough. The extra errcode() call is useless but harmless, so there's no user-visible bug here. Nevertheless, backpatch to 9.1 where this code were added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b436c72f61adf5efab435c282bfb13a29508d475">http://git.postgresql.org/pg/commitdiff/b436c72f61adf5efab435c282bfb13a29508d475</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Kerem Kat sent in two more revisions of a patch to add CORRESPONDING set operations.</li>

<li>Jun Ishiduka sent in two more revisions of the patch to allow taking a base backup from a hot standby.</li>

<li>KaiGai Kohei sent in two more revisions of the patch to unite DROP into a single framework.</li>

<li>Fujii Masao sent in another revision of the patch to fix an issue where it is possible to drop transactions in streaming replication.</li>

<li>Florian Pflug sent in a patch to document how to build the docs on OS/X with MacPorts.</li>

<li>Etsuro Fujita sent in another revision of the patch to allow running ANALYZE on CSV files via the FDW supplied module interface.</li>

<li>Wojciech Mu&#322;a and Pavel Stehule traded new revisions of the patch to allow arrays of %TYPE in PL/pgsql.</li>

</ul>