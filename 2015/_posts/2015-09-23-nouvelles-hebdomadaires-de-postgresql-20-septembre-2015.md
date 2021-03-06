---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 septembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/09/23/Nouvelles-hebdomadaires-de-PostgreSQL-20-septembre-2015"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>Envelopt 1.0.0, une plate-forme web pour cr&eacute;er des applications PostgreSQL&nbsp;: <a target="_blank" href="http://envelope.xyz/">http://envelope.xyz/</a></li>

<li>PostgreDAC 4.6, un connecteur Delphi/C++ vers PostgreSQL, et dbExpress PostgreSQL driver 3.7 &nbsp;: <a target="_blank" href="https://www.devart.com/pgdac/">https://www.devart.com/pgdac/</a></li>

<li>tds_fdw 1.0.4, un wrapper de donn&eacute;es distantes pour MS-SQL Server et Sybase&nbsp;: <a target="_blank" href="https://github.com/GeoffMontee/tds_fdw/releases">https://github.com/GeoffMontee/tds_fdw/releases</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en septembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-09/">http://archives.postgresql.org/pgsql-jobs/2015-09/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La <em>session PostgreSQL n&deg;7</em> aura lieu le 24 septembre 2015 &agrave; Paris (France)&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche). Le programme a &eacute;t&eacute; publi&eacute;&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PgCUBA du 19 au 23 octobre 2015 &agrave; la Havane. Informations en espagnol ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://www.postgresql.org/about/event/1813/">http://www.postgresql.org/about/event/1813/</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. L'appel &agrave; conf&eacute;renciers expire le 31 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/#call-for-papers">http://pgbr.postgresql.org.br/2015/en/#call-for-papers</a></li>

<li>La PGConf.DE se tiendra au Lindner Hotel am Michel de Hambourg (Allemagne) les 26 &amp; 27 novembre 2015&nbsp;: <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150920235548.GA8555@fetter.org">http://www.postgresql.org/message-id/20150920235548.GA8555@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Check existency of table/schema for -t/-n option (pg_dump/pg_restore). Patch provides command line option --strict-names which requires that at least one table/schema should present for each -t/-n option. Pavel Stehule &lt;pavel.stehule@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d02426029b133ee2bbe492a038642359bce3c527">http://git.postgresql.org/pg/commitdiff/d02426029b133ee2bbe492a038642359bce3c527</a></li>

<li>Fix wrong comment in commit d02426029b133ee2bbe492a038642359bce3c527 Per gripe from Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f75928516a55ba69d46328ec5e676c13d163831">http://git.postgresql.org/pg/commitdiff/0f75928516a55ba69d46328ec5e676c13d163831</a></li>

<li>pgbench progress with timestamp. This patch adds an option to replace the "time since pgbench run started" with a Unix epoch timestamp in the progress report so that, for instance, it is easier to compare timelines with pgsql log Fabien COELHO &lt;coelho@cri.ensmp.fr&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1def9063ca3c8ad66a2814a90af95ca22636bf66">http://git.postgresql.org/pg/commitdiff/1def9063ca3c8ad66a2814a90af95ca22636bf66</a></li>

<li>Fix bug introduced by microvacuum for GiST Commit 013ebc0a7b7ea9c1b1ab7a3d4dd75ea121ea8ba7 introduces microvacuum for GiST, deletetion of tuple marked LP_DEAD uses IndexPageMultiDelete while recovery code uses IndexPageTupleDelete in loop. This causes a difference in offset numbers of tuples to delete. Patch introduces usage of IndexPageMultiDelete in GiST except gistplacetopage() where only one tuple is deleted at once. That also slightly improve performance, because IndexPageMultiDelete is more effective. Patch changes WAL format, so bump wal page magic. Bug report from Jeff Janes Diagnostic and patch by Anastasia Lubennikova and me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22f519c92a45eb017bf2e65f36506a75309f8094">http://git.postgresql.org/pg/commitdiff/22f519c92a45eb017bf2e65f36506a75309f8094</a></li>

<li>Add header forgotten in 213335c14529a8d5e2007ec0c256f4cf64d62d3b. Report from Peter Eisentraut <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d63a1720fa0b2ca8452c3a2aa2f6ddbb4f05b640">http://git.postgresql.org/pg/commitdiff/d63a1720fa0b2ca8452c3a2aa2f6ddbb4f05b640</a></li>

<li>Fix oversight in tsearch type check. Use IsBinaryCoercible() method instead of custom is_expected_type/is_text_type functions which was introduced when tsearch2 was moved into core. Per report by David E. Wheeler. Analysis by Tom Lane. Patch by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9acb9007de30b3daaa9efc16763c3bc6e3e0a92d">http://git.postgresql.org/pg/commitdiff/9acb9007de30b3daaa9efc16763c3bc6e3e0a92d</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Improve log messages related to tablespace_map file. This patch changes the log message which is logged when the server successfully renames backup_label file to *.old but fails to rename tablespace_map file during the shutdown. Previously the WARNING message "online backup mode was not canceled" was logged in that case. However this message is confusing because the backup mode is treated as canceled whenever backup_label is successfully renamed. So this commit makes the server log the message "online backup mode canceled" in that case. Also this commit changes errdetail messages so that they follow the error message style guide. Back-patch to 9.5 where tablespace_map file is introduced. Original patch by Amit Kapila, heavily modified by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10fbb79f1a918124f39fc8a87b8d19db3712202f">http://git.postgresql.org/pg/commitdiff/10fbb79f1a918124f39fc8a87b8d19db3712202f</a></li>

<li>Fix comment regarding the meaning of infinity for timeline history entry. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05ec71eea265622e1a311c9de3d3b186924e736a">http://git.postgresql.org/pg/commitdiff/05ec71eea265622e1a311c9de3d3b186924e736a</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Add POLICY to COMMENT documentation. COMMENT supports POLICY but the documentation hadn't caught up with that fact. Patch by Charles Clavadetscher Back-patch to 9.5 where POLICY was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6820094d1ad37429f910cf46e9f3771ebe93347c">http://git.postgresql.org/pg/commitdiff/6820094d1ad37429f910cf46e9f3771ebe93347c</a></li>

<li>Enforce ALL/SELECT policies in RETURNING for RLS. For the UPDATE/DELETE RETURNING case, filter the records which are not visible to the user through ALL or SELECT policies from those considered for the UPDATE or DELETE. This is similar to how the GRANT system works, which prevents RETURNING unless the caller has SELECT rights on the relation. Per discussion with Robert, Dean, Tom, and Kevin. Back-patch to 9.5 where RLS was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f3b2a8883c47b6710152a8e157f8a02656d0e68">http://git.postgresql.org/pg/commitdiff/4f3b2a8883c47b6710152a8e157f8a02656d0e68</a></li>

<li>RLS refactoring. This refactors rewrite/rowsecurity.c to simplify the handling of the default deny case (reducing the number of places where we check for and add the default deny policy from three to one) by splitting up the retrival of the policies from the application of them. This also allowed us to do away with the policy_id field. A policy_name field was added for WithCheckOption policies and is used in error reporting, when available. Patch by Dean Rasheed, with various mostly cosmetic changes by me. Back-patch to 9.5 where RLS was introduced to avoid unnecessary differences, since we're still in alpha, per discussion with Robert. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22eaf35c1d247407b7cf1fffb310a26cd9b9ceb1">http://git.postgresql.org/pg/commitdiff/22eaf35c1d247407b7cf1fffb310a26cd9b9ceb1</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Revert "Fix an O(N^2) problem in foreign key references". Commit 5ddc72887a012f6a8b85707ef27d85c274faf53d does not actually work because it will happily blow away ri_constraint_cache entries that are in active use in outer call levels. In any case, it's a very ugly, brute-force solution to the problem of limiting the cache size. Revert until it can be redesigned. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d9e8db9e56beb0501d168779ae9644587924061">http://git.postgresql.org/pg/commitdiff/3d9e8db9e56beb0501d168779ae9644587924061</a></li>

<li>Remove no-longer-used T_PrivGrantee node tag. Oversight in commit 31eae6028eca4365e7165f5f33fee1ed0486aee0, which replaced PrivGrantee nodes with RoleSpec nodes. Spotted by Yugo Nagata. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad584a08c1f19742bf971a52b71a073b9cfcfd50">http://git.postgresql.org/pg/commitdiff/ad584a08c1f19742bf971a52b71a073b9cfcfd50</a></li>

<li>Don't use "#" as an abbreviation for "number" in PL/Tcl error messages. Also, rewrite one error message to make it follow our message style guidelines better. Euler Taveira and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d0fc1d54b465d4a40b3cf89908438533680e7f3">http://git.postgresql.org/pg/commitdiff/4d0fc1d54b465d4a40b3cf89908438533680e7f3</a></li>

<li>Fix documentation of regular expression character-entry escapes. The docs claimed that \uhhhh would be interpreted as a Unicode value regardless of the database encoding, but it's never been implemented that way: \uhhhh and \xhhhh actually mean exactly the same thing, namely the character that pg_mb2wchar translates to 0xhhhh. Moreover we were falsely dismissive of the usefulness of Unicode code points above FFFF. Fix that. It's been like this for ages, so back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0f18cde7e40f1f6412bb35e8645888cd620682f">http://git.postgresql.org/pg/commitdiff/d0f18cde7e40f1f6412bb35e8645888cd620682f</a></li>

<li>Sync regex code with Tcl 8.6.4. Sync our regex code with upstream changes since last time we did this, which was Tcl 8.5.11 (see commit 08fd6ff37f71485e2fc04bc6ce07d2a483c36702). The only functional change here is to disbelieve that an octal escape is three digits long if it would exceed \377. That's a bug fix, but it's a minor one and could change the interpretation of working regexes, so don't back-patch. In addition to that, s/INFINITY/DUPINF/ to eliminate the risk of collisions with &lt;math.h&gt;'s macro, and s/LOCAL/NOPROP/ because that also seems like an unnecessarily collision-prone macro name. There were some other cosmetic changes in their copy that I did not adopt, notably a rather half-hearted attempt at renaming some of the C functions in a more verbose style. (I'm not necessarily against the concept, but renaming just a few functions in the package is not an improvement.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b44d92b67b65a76f92448b5a282aae72820ac676">http://git.postgresql.org/pg/commitdiff/b44d92b67b65a76f92448b5a282aae72820ac676</a></li>

<li>Fix low-probability memory leak in regex execution. After an internal failure in shortest() or longest() while pinning down the exact location of a match, find() forgot to free the DFA structure before returning. This is pretty unlikely to occur, since we just successfully ran the "search" variant of the DFA; but it could happen, and it would result in a session-lifespan memory leak since this code uses malloc() directly. Problem seems to have been aboriginal in Spencer's library, so back-patch all the way. In passing, correct a thinko in a comment I added awhile back about the meaning of the "ntree" field. I happened across these issues while comparing our code to Tcl's version of the library. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9c0c728afe734b7087dbb9a4bc16d5b682d139d">http://git.postgresql.org/pg/commitdiff/d9c0c728afe734b7087dbb9a4bc16d5b682d139d</a></li>

<li>Be more wary about partially-valid LOCALLOCK data in RemoveLocalLock(). RemoveLocalLock() must consider the possibility that LockAcquireExtended() failed to palloc the initial space for a locallock's lockOwners array. I had evidently meant to cope with this hazard when the code was originally written (commit 1785acebf2ed14fd66955e2d9a55d77a025f418d), but missed that the pfree needed to be protected with an if-test. Just to make sure things are left in a clean state, reset numLockOwners as well. Per low-memory testing by Andreas Seltenreich. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba51774d87a2a0402628f7bd68295c0b2913cc25">http://git.postgresql.org/pg/commitdiff/ba51774d87a2a0402628f7bd68295c0b2913cc25</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix whitespace <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/000a21336b8e218deb856f73dc8972073cb8a649">http://git.postgresql.org/pg/commitdiff/000a21336b8e218deb856f73dc8972073cb8a649</a></li>

<li>Review program help output for wording and formatting <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5878a377ba47a39d8d3ecc1240986916eb9dbaf5">http://git.postgresql.org/pg/commitdiff/5878a377ba47a39d8d3ecc1240986916eb9dbaf5</a></li>

<li>Order some new options on man pages more sensibly, minor improvements <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/213335c14529a8d5e2007ec0c256f4cf64d62d3b">http://git.postgresql.org/pg/commitdiff/213335c14529a8d5e2007ec0c256f4cf64d62d3b</a></li>

<li>Remove trailing slashes from directories in find command. BSD find is not very smart and ends up writing double slashes into the output in those cases. Also, xgettext is not very smart and splits the file names incorrectly in those cases, resulting in slightly incorrect file names being written into the POT file. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2dd10613e7fdd40cb4f543d86e7ef19f6d0a6e4">http://git.postgresql.org/pg/commitdiff/f2dd10613e7fdd40cb4f543d86e7ef19f6d0a6e4</a></li>

<li>Simplify GETTEXT_FILES list <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85eda7e92c936470515b73682cacabe972e69adc">http://git.postgresql.org/pg/commitdiff/85eda7e92c936470515b73682cacabe972e69adc</a></li>

<li>Add missing serial comma <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a1e15e4a911502bbfb2f36a18e6b930b6caf85d">http://git.postgresql.org/pg/commitdiff/4a1e15e4a911502bbfb2f36a18e6b930b6caf85d</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Determine whether it's safe to attempt a parallel plan for a query. Commit 924bcf4f16d54c55310b28f77686608684734f42 introduced a framework for parallel computation in PostgreSQL that makes most but not all built-in functions safe to execute in parallel mode. In order to have parallel query, we'll need to be able to determine whether that query contains functions (either built-in or user-defined) that cannot be safely executed in parallel mode. This requires those functions to be labeled, so this patch introduces an infrastructure for that. Some functions currently labeled as safe may need to be revised depending on how pending issues related to heavyweight locking under paralllelism are resolved. Parallel plans can't be used except for the case where the query will run to completion. If portal execution were suspended, the parallel mode restrictions would need to remain in effect during that time, but that might make other queries fail. Therefore, this patch introduces a framework that enables consideration of parallel plans only when it is known that the plan will be run to completion. This probably needs some refinement; for example, at bind time, we do not know whether a query run via the extended protocol will be execution to completion or run with a limited fetch count. Having the client indicate its intentions at bind time would constitute a wire protocol break. Some contexts in which parallel mode would be safe are not adjusted by this patch; the default is not to try parallel plans except from call sites that have been updated to say that such plans are OK. This commit doesn't introduce any parallel paths or plans; it just provides a way to determine whether they could potentially be used. I'm committing it on the theory that the remaining parallel sequential scan patches will also get committed to this release, hopefully in the not-too-distant future. Robert Haas and Amit Kapila. Reviewed (in earlier versions) by Noah Misch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7aea8e4f2daa4b39ca9d1309a0c4aadb0f7ed81b">http://git.postgresql.org/pg/commitdiff/7aea8e4f2daa4b39ca9d1309a0c4aadb0f7ed81b</a></li>

<li>Add new function planstate_tree_walker. ExplainPreScanNode knows how to iterate over a generic tree of plan states; factor that logic out into a separate walker function so that other code, such as upcoming patches for parallel query, can also use it. Patch by me, reviewed by Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8dd401aa07b91d46f81e51321523864d32843523">http://git.postgresql.org/pg/commitdiff/8dd401aa07b91d46f81e51321523864d32843523</a></li>

<li>Glue layer to connect the executor to the shm_mq mechanism. The shm_mq mechanism was built to send error (and notice) messages and tuples between backends. However, shm_mq itself only deals in raw bytes. Since commit 2bd9e412f92bc6a68f3e8bcb18e04955cc35001d, we have had infrastructure for one message to redirect protocol messages to a queue and for another backend to parse them and do useful things with them. This commit introduces a somewhat analogous facility for tuples by adding a new type of DestReceiver, DestTupleQueue, which writes each tuple generated by a query into a shm_mq, and a new TupleQueueFunnel facility which reads raw tuples out of the queue and reconstructs the HeapTuple format expected by the executor. The TupleQueueFunnel abstraction supports reading from multiple tuple streams at the same time, but only in round-robin fashion. Someone could imaginably want other policies, but this should be good enough to meet our short-term needs related to parallel query, and we can always extend it later. This also makes one minor addition to the shm_mq API that didn' seem worth breaking out as a separate patch. Extracted from Amit Kapila's parallel sequential scan patch. This code was originally written by me, and then it was revised by Amit, and then it was revised some more by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a4e6893aa080b9094dadbe0e65f8a75fee41ac6">http://git.postgresql.org/pg/commitdiff/4a4e6893aa080b9094dadbe0e65f8a75fee41ac6</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Let compiler handle size calculation of bool types. Back in the day this did not work, but modern compilers should handle it themselves. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/293fd7c77e40cdf06b7a9eb6db95379be8869b04">http://git.postgresql.org/pg/commitdiff/293fd7c77e40cdf06b7a9eb6db95379be8869b04</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Honour TEMP_CONFIG when testing pg_upgrade This setting contains extra configuration for the temp instance, as used in pg_regress' --temp-config flag. Backpatch to 9.2 where test.sh was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f7c804ba155cc696297f06a819721f36a731181">http://git.postgresql.org/pg/commitdiff/5f7c804ba155cc696297f06a819721f36a731181</a></li>

<li>Cache argument type information in json(b) aggregate functions. These functions have been looking up type info for every row they process. Instead of doing that we only look them up the first time through and stash the information in the aggregate state object. Affects json_agg, json_object_agg, jsonb_agg and jsonb_object_agg. There is plenty more work to do in making these more efficient, especially the jsonb functions, but this is a virtually cost free improvement that can be done right away. Backpatch to 9.5 where the jsonb variants were introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c00c3249e3247d24751d97ff6f26603810593414">http://git.postgresql.org/pg/commitdiff/c00c3249e3247d24751d97ff6f26603810593414</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Egon Kocjan sent in a patch to add a command line option for pg_ctl on Windows to redirect logging of errors (write_stderr).</p>

<p>Teodor Sigaev sent in another revision of a patch to add GiST support for UUIDs.</p>

<p>Franck Verrot sent in two more revisions of a patch to report column for which type coercion fails.</p>

<p>Andres Freund sent in a patch to move PinBuffer and UnpinBuffer to atomics.</p>

<p>Andrew Dunstan sent in a patch to cache type info in json_agg and friends.</p>

<p>Kyotaro HORIGUCHI sent in a patch to enable index-only scans with partial indexes.</p>

<p>Alexander Shulgin sent in three more revisions of a patch to enable getting the query plans of running queries using auto_explain and signals.</p>

<p>Petr Jelinek sent in a patch to remove the on start check for track_commit_timestamp being same in config and control file.</p>

<p>Peter Eisentraut sent in a patch mostly of historical interest to fix some SSL issues.</p>

<p>Fabien COELHO sent in another revision of a patch to mark pgbench progress with timestamps.</p>

<p>Jesper Pedersen sent in three revisions of a patch to add additional LWLOCK_STATS statistics.</p>

<p>Fabien COELHO sent in two more revisions of a patch to extend pgbench expressions with functions.</p>

<p>Petr Jelinek sent in two more revisions of a patch to implement CREATE EXTENSION ... CASCADE.</p>

<p>Amit Langote sent in a patch to remove obsolete cross-references to set_append_rel_pathlist in comments.</p>

<p>Kyotaro HORIGUCHI sent in a patch to remove the no-longer-needed T_PrivGrantee from NodeTag in src/include/nodes/nodes.h.</p>

<p>Thomas Munro sent in a patch to remove obsolete use of volatile in walsender.c, walreceiver.c, walreceiverfuncs.</p>

<p>Anastasia Lubennikova and Teodor Sigaev traded patches to add a microvacuum for gist.</p>

<p>Thomas Munro sent in two more revisions of a patch to add a setting which makes synchronous commit apply.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement pg_rewind target switch.</p>

<p>Daniel Verit&eacute; sent in two more revisions of a patch to add a \rotate command to psql.</p>

<p>Michael Paquier sent in another revision of a patch to improve test coverage of extensions with pg_dump.</p>

<p>Dean Rasheed sent in two revisions of a patch to fix some numerical issues with some transcendental functions on NUMERIC.</p>

<p>Alexander Korotkov sent in a patch to fix the LW_SHARED_MASK macro.</p>

<p>Euler Taveira de Oliveira sent in a patch to standardize some sentences in pg_resetxlog.</p>

<p>Michael Paquier sent in another revision of a patch to fix some pg_rewind usability issues.</p>

<p>Jan Wieck and Tom Lane traded patches to fix an O(N^2) issue in foreign key references.</p>

<p>Robert Haas sent in a patch to number plan nodes in anticipation of parallelization work to follow.</p>

<p>SAWADA Masahiko sent in another revision of a patch to add a "frozen" bit to the visibility map.</p>

<p>Nikolay Shaplov sent in another revision of a patch to pageinspect which allows showing tuple data.</p>

<p>Teodor Sigaev sent in another revision of a patch to add pages deleted from pending list to FSM.</p>

<p>Alexander Korotkov sent in another revision of a patch to rework the access method interface.</p>

<p>Adrian Vondendriesch sent in a patch to make pg_size_pretty handle negative values.</p>