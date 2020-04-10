---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 février 2016"
author: "NBougain"
redirect_from: "index.php?post/2016-03-01-nouvelles-hebdomadaires-de-postgresql-28-fevrier-2016 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix wrong keysize in PrivateRefCountHash creation. In 4b4b680c3 I accidentally used sizeof(PrivateRefCountArray) instead of sizeof(PrivateRefCountEntry) when creating the refcount overflow hashtable. As the former is bigger than the latter, this luckily only resulted in a slightly increased memory usage when many buffers are pinned in a backend. Reported-By: Takashi Horikawa Discussion: 73FA3881462C614096F815F75628AFCD035A48C3@BPXM01GP.gisp.nec.co.jp Backpatch: 9.5, where thew new ref count infrastructure was introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea56b06cf77a6932a74f9d4ec6c950a333d1527d">http://git.postgresql.org/pg/commitdiff/ea56b06cf77a6932a74f9d4ec6c950a333d1527d</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Remove redundant PGPROC.lockGroupLeaderIdentifier field. We don't really need this field, because it's either zero or redundant with PGPROC.pid. The use of zero to mark "not a group leader" is not necessary since we can just as well test whether lockGroupLeader is NULL. This does not save very much, either as to code or data, but the simplification seems worthwhile anyway. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73bf8715aa7430bd003516bde448507fbe789c05">http://git.postgresql.org/pg/commitdiff/73bf8715aa7430bd003516bde448507fbe789c05</a></li>

<li>Create a function to reliably identify which sessions block which others. This patch introduces "pg_blocking_pids(int) returns int[]", which returns the PIDs of any sessions that are blocking the session with the given PID. Historically people have obtained such information using a self-join on the pg_locks view, but it's unreasonably tedious to do it that way with any modicum of correctness, and the addition of parallel queries has pretty much broken that approach altogether. (Given some more columns in the view than there are today, you could imagine handling parallel-query cases with a 4-way join; but ugh.) The new function has the following behaviors that are painful or impossible to get right via pg_locks: 1. Correctly understands which lock modes block which other ones. 2. In soft-block situations (two processes both waiting for conflicting lock modes), only the one that's in front in the wait queue is reported to block the other. 3. In parallel-query cases, reports all sessions blocking any member of the given PID's lock group, and reports a session by naming its leader process's PID, which will be the pg_backend_pid() value visible to clients. The motivation for doing this right now is mostly to fix the isolation tests. Commit 38f8bdcac4982215beb9f65a19debecaf22fd470 lobotomized isolationtester's is-it-waiting query by removing its ability to recognize nonconflicting lock modes, as a crude workaround for the inability to handle soft-block situations properly. But even without the lock mode tests, the old query was excessively slow, particularly in CLOBBER_CACHE_ALWAYS builds; some of our buildfarm animals fail the new deadlock-hard test because the deadlock timeout elapses before they can probe the waiting status of all eight sessions. Replacing the pg_locks self-join with use of pg_blocking_pids() is not only much more correct, but a lot faster: I measure it at about 9X faster in a typical dev build with Asserts, and 3X faster in CLOBBER_CACHE_ALWAYS builds. That should provide enough headroom for the slower CLOBBER_CACHE_ALWAYS animals to pass the test, without having to lengthen deadlock_timeout yet more and thus slow down the test for everyone else. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52f5d578d6c29bf254e93c69043b817d4047ca67">http://git.postgresql.org/pg/commitdiff/52f5d578d6c29bf254e93c69043b817d4047ca67</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>MSVC: Clean tmp_check directory of pg_controldata test suite. Back-patch to 9.4, where the suite was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41635887835d54715a2fd4745dbf0fdb99f57f4f">http://git.postgresql.org/pg/commitdiff/41635887835d54715a2fd4745dbf0fdb99f57f4f</a></li>

<li>Clean the last few TAP suite tmp_check directories. Back-patch to 9.5, where the suites were introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25924ac47abde5330ca502e23796e9d37cd1ae68">http://git.postgresql.org/pg/commitdiff/25924ac47abde5330ca502e23796e9d37cd1ae68</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Enable parallelism for prepared statements and extended query protocol. Parallel query can't handle running a query only partially rather than to completion. However, there seems to be no way to run a statement prepared via SQL PREPARE other than to completion, so we can enable it there without a problem. The situation is more complicated for the extend query protocol. libpq seems to provide no way to send an Execute message with a non-zero rowcount, but some other client might. If that happens, and a parallel plan was chosen, we'll execute the parallel plan without using any workers, which may be somewhat inefficient but should still work. Hopefully this won't be a problem; users can always set max_parallel_degree=0 to avoid choosing parallel plans in the first place. Amit Kapila, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57a6a72b6bc98f3003e87bc31de4b9c2c89fe019">http://git.postgresql.org/pg/commitdiff/57a6a72b6bc98f3003e87bc31de4b9c2c89fe019</a></li>

<li>Add new FDW API to test for parallel-safety. This is basically a bug fix; the old code assumes that a ForeignScan is always parallel-safe, but for postgres_fdw, for example, this is definitely false. It should be true for file_fdw, though, since a worker can read a file from the filesystem just as well as any other backend process. Original patch by Thomas Munro. Documentation, and changes to the comments, by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35746bc348b6bf1f690fe17f4f80cfb68e22f504">http://git.postgresql.org/pg/commitdiff/35746bc348b6bf1f690fe17f4f80cfb68e22f504</a></li>

<li>On second thought, disable parallelism for prepared statements. CREATE TABLE .. AS EXECUTE can turn an apparently read-only query into a write operation, which parallel query can't handle. It's a bit of a shame that requires us to avoid parallel query for queries prepared via PREPARE in all cases, but for right now it does. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7bea19d0a9d3e6975418ffe685fb510bd31ab434">http://git.postgresql.org/pg/commitdiff/7bea19d0a9d3e6975418ffe685fb510bd31ab434</a></li>

<li>Respect TEMP_CONFIG when running contrib regression tests. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9117985b6ba9beda4f280f596035649fc23b6233">http://git.postgresql.org/pg/commitdiff/9117985b6ba9beda4f280f596035649fc23b6233</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Fix typos Backpatch to: 9.4 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/343f709c0691abdc779bec91fa3587dda259808e">http://git.postgresql.org/pg/commitdiff/343f709c0691abdc779bec91fa3587dda259808e</a></li>

<li>Add README in src/test and src/test/modules. Author: Craig Ringer Reviewed by: Micha&Atilde;&laquo;l Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bda0b081984011ba5347bf3eecc95b71833de082">http://git.postgresql.org/pg/commitdiff/bda0b081984011ba5347bf3eecc95b71833de082</a></li>

<li>Add POD docs to PostgresNode. Also, the dump_info method got split into another method that returns the stuff as a string instead of just printing it to stdout. Add a new README in src/test/perl too. Author: Craig Ringer Reviewed by: Micha&Atilde;&laquo;l Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e64009303d4e2434abafbdafe4d571cc4f279d39">http://git.postgresql.org/pg/commitdiff/e64009303d4e2434abafbdafe4d571cc4f279d39</a></li>

<li>Move some code from RewindTest into PostgresNode. Some code in the RewindTest test suite is more generally useful than just for that suite, so put it where other test suites can reach it. Some postgresql.conf parameters change their default values when a cluster is initialized with 'allows_streaming' than the previous behavior; most notably, autovacuum is no longer turned off. (Also, we no longer call pg_ctl promote with -w, but that flag doesn't actually do anything in promote so there's no behavior change.) Author: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89ac7004dadf4116d9b180bb5ff64b64bfce94b1">http://git.postgresql.org/pg/commitdiff/89ac7004dadf4116d9b180bb5ff64b64bfce94b1</a></li>

<li>Apply last revision of recovery patch. I applied the previous-to-last revision of Micha&Atilde;&laquo;l's submitted patch instead of the last; these two tweaks pointed out by Craig were left out of the previous commit by accident. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74d58425c70f9f7f1cb5d7f428ceaa1b56aa081d">http://git.postgresql.org/pg/commitdiff/74d58425c70f9f7f1cb5d7f428ceaa1b56aa081d</a></li>

<li>Add a test framework for recovery. This long-awaited framework is an expansion of the existing PostgresNode stuff to support additional features for recovery testing; the recovery tests included in this commit are a starting point that cover some of the recovery features we have. More scripts are expected to be added later. Author: Micha&Atilde;&laquo;l Paquier, a bit of help from Amir Rohan. Reviewed by: Amir Rohan, Stas Kelvich, Kyotaro Horiguchi, Victor Wagner, Craig Ringer, &Atilde;lvaro Herrera. Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/CAB7nPqTf7V6rswrFa=q_rrWeETUWagP=h8LX8XAov2Jcxw0DRg@mail.gmail.com">http://www.postgresql.org/message-id/CAB7nPqTf7V6rswrFa=q_rrWeETUWagP=h8LX8XAov2Jcxw0DRg@mail.gmail.com</a> Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/trinity-b4a8035d-59af-4c42-a37e-258f0f28e44a-1443795007012@3capp-mailcom-lxa08">http://www.postgresql.org/message-id/trinity-b4a8035d-59af-4c42-a37e-258f0f28e44a-1443795007012@3capp-mailcom-lxa08</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49148645f7f30f461b09618b5342b37425f33b22">http://git.postgresql.org/pg/commitdiff/49148645f7f30f461b09618b5342b37425f33b22</a></li>

<li>Add isolationtester spec for old heapam.c bug. In 0e5680f4737a, I fixed a bug in heapam that caused spurious deadlocks when multiple updates concurrently attempted to modify the old version of an updated tuple whose new version was key-share locked. I proposed an isolationtester spec file that reproduced the bug, but back then isolationtester wasn't mature enough to be able to run it. Now that 38f8bdcac498 is in the tree, we can have this spec file too. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20141212205254.GC1768%40alvh.no-ip.org">https://www.postgresql.org/message-id/20141212205254.GC1768%40alvh.no-ip.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9578135f769072e2597b88402f256a398279c91">http://git.postgresql.org/pg/commitdiff/c9578135f769072e2597b88402f256a398279c91</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Respect TEMP_CONFIG when pg_regress_check and friends are called. This reverts commit 9117985b6ba9beda4f280f596035649fc23b6233 in favor of a more general solution. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87cc6b57a911bf439ff9e53f1eddba58e9749ffe">http://git.postgresql.org/pg/commitdiff/87cc6b57a911bf439ff9e53f1eddba58e9749ffe</a></li>

<li>Allow multiple --temp-config arguments to pg_regress. This means that if, for example, TEMP_CONFIG is set and a Makefile explicitly sets a temp-config file, both will now be used. Patch from John Gorman. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26fdff1b8f76f3c47d4e19be7c4aef3cdcd3393c">http://git.postgresql.org/pg/commitdiff/26fdff1b8f76f3c47d4e19be7c4aef3cdcd3393c</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Amit Kapila sent in another revision of a patch to extend pg_stat_activity with wait_type_event.</p>

<p>Corey Huinker sent in another revision of a patch to add \gexec to psql.</p>

<p>Rushabh Lathia sent in another revision of a patch to help fix some slowness in FDW DML.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to add new authentication methods with SCRAM as one example.</p>

<p>Vitaly Burovoy sent in a patch to fix handling of negative years.</p>

<p>Ashutosh Bapat sent in another revision of a patch to push sorted joins down to FDWs.</p>

<p>Fujii Masao sent in a patch to add tab completion in psql to CREATE USER MAPPING.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a pair of patches, one which extends XLogInsert() with an extra argument for flags, the other which introduces XLogInsertExtended with this extra argument and leaves XLogInsert() alone.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to fix a potential data loss bug on ext4 filesystems.</p>

<p>Craig Ringer sent in another revision of a patch to implement failover slots.</p>

<p>Tomas Vondra and Mark Dilger traded patches to improve GROUP BY estimation.</p>

<p>Tomas Vondra and Kyotaro HORIGUCHI traded patches to allow index-only scans with partial indexes.</p>

<p>Jim Nasby sent in another revision of a patch to convert PL/Tcl from strings to objects.</p>

<p>Thomas Munro sent in two more revisions of a patch to make the PostgreSQL in parallel mode safer on PPC.</p>

<p>Teodor Sigaev sent in two more revisions of a patch to fix a GIN corruption bug.</p>

<p>Vitaly Burovoy sent in a patch to fix some overflows in timstamp[tz].</p>

<p>Iacob Catalin and Pavel St&Auml;&rsaquo;hule traded patches to add an ereport function to PL/PythonU.</p>

<p>Mithun Cy sent in another revision of a patch to cache data in GetSnapshotData().</p>

<p>Kyotaro HORIGUCHI and SAWADA Masahiko traded patches to support N&gt;1 synchronous standby servers.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to add generic WAL messages.</p>

<p>Julien Rouhaud sent in a patch to ensure that the CREATE OPERATOR CLASS documentation mentions that BRIN indexes also support the STORAGE parameter.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix wrong comments for PQmblen() and PQdsplen().</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix identifier completion with multibyte characters.</p>

<p>Peter Eisentraut sent in a patch to add table qualifications to some tags in pg_dump.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to add "IF [NOT] EXISTS" support to psql's tab completion.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in four more revisions of a patch to add new regression tests for recovery, etc.</p>

<p>Peter Eisentraut sent in a patch to introduce new configuration parameters syslog_sequence_numbers and syslog_split_lines.</p>

<p>Amit Kapila sent in another revision of a patch to speed up CLOG access.</p>

<p>Vitaly Burovoy sent in a patch to allow infinite values in to_timestamp.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add a raw format to COPY.</p>

<p>Vinayak Pokure sent in another revision of a patch to add a vacuum progress checker.</p>

<p>Roma Sokolov sent in two revisions of a patch to fix DROP OPERATOR to reset links to itself on commutator and negator.</p>

<p>Ivan Kartyshov sent in two revisions of a patch to add a pg_oldest_xlog_location() function.</p>

<p>Simon Riggs sent in two revisions of a patch to fix an issue with relcache invalidation on a physical replica.</p>

<p>Amit Langote sent in a patch to fix a typo in src/backend/utils/init/postinit.c.</p>

<p>Joe Conway sent in two more revisions of a patch to add control data functions.</p>

<p>Tom Lane sent in a WIP patch to path-ify the upper planner. And there was much rejoicing.</p>

<p>Jim Nasby sent in a patch to improve error handling in PL/Tcl.</p>