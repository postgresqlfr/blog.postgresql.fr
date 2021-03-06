---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 mars 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/03/26/Nouvelles-hebdomadaires-de-PostgreSQL-21-mars-2010"
---


<p>Les mises &agrave; jour correctives sont disponibles&nbsp;: 8.4.3, 8.3.10, 8.2.16, 8.1.20, 8.0.24 et 7.4.28. &Agrave; appliquer d&egrave;s que possible&nbsp;!</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>dtester 0.1, une plateforme de tests &eacute;venementiels asynchrones [ndt: issue de Postgres-R, ciblant les syst&egrave;mes distribu&eacute;s]&nbsp;: 

<a target="_blank" href="http://www.bluegap.ch/projects/dtester/">http://www.bluegap.ch/projects/dtester/</a></li>

<li>pgbouncer 1.3.2&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a></li>

<li>pgreplay 0.9.0 beta, un programme permettant de rejouer des requ&ecirc;tes loggu&eacute;es&nbsp;: 

<a target="_blank" href="http://pgreplay.projects.postgresql.org/">http://pgreplay.projects.postgresql.org/</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 9.0 de la semaine</strong></p>

<p>hstore n'est plus limit&eacute; &agrave; 64ko sur les longueurs de clefs, et propose des classes d'op&eacute;rateurs de hachage et de btree, permettant les GROUP BY, DISTINCT, etc.</p>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La "JDCon East" aura lieu &agrave; Philadelphie (Pennsylvanie, &Eacute;tats-Unis) du 25 au 28 mars 2010&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2010/east">http://www.postgresqlconference.org/2010/east</a></li>

<li>Le PUG de San Francisco fera une "F&ecirc;te du Test" le samedi 3 avril de 11h &agrave; 18h. Vid&eacute;o en direct. Aidez &agrave; en faire un &eacute;v&eacute;nement mondial&nbsp;! 

<a target="_blank" href="http://wiki.postgresql.org/wiki/SFPUG_Beta_Test_Day">http://wiki.postgresql.org/wiki/SFPUG_Beta_Test_Day</a></li>

<li>La "Linuxfest Northwest 2010" aura lieu &agrave; Bellingham, Washington, &Eacute;tats-Unis les 24 et 25 avril. Conf&eacute;rences, r&eacute;unions et m&eacute;c&eacute;nat sont possibles&nbsp;: 

<a target="_blank" href="http://linuxfestnorthwest.org/">http://linuxfestnorthwest.org/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 3 au 7 mai 2010 sur le sujet "PostgreSQL for Corporate Use". D&eacute;tails ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html">http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html</a></li>

<li>La PgCon 2010 aura lieu les 20 &amp; 21 mai 2010 &agrave; Ottawa avec des tutoriels les 18 et 19&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2010/registration.php">http://www.pgcon.org/2010/registration.php</a></li>

<li>L'appel aux conf&eacute;renciers pour l'OSBridge est lanc&eacute;&nbsp;! L'&eacute;v&eacute;nement aura lieu du 1er au 4 juin 2010 &agrave; Portland (Oregon)&nbsp;: 

<a target="_blank" href="http://opensourcebridge.org/events/2010/proposals/">http://opensourcebridge.org/events/2010/proposals/</a></li>

<li>L'OSCON aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://www.oscon.com/oscon2010">http://www.oscon.com/oscon2010</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100321">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, remove incorrect comment from GetWriteRecPtr(): the return value is always correct, as described in comments at start of xlog.c</li>

<li>In pgsql/doc/src/sgml/func.sgml, document that trig functions accept/return values in radians.</li>

<li>In pgsql/doc/src/sgml/func.sgml, fix typo in math function docs, spotted by Heikki Linnakangas.</li>

<li>In pgsql/doc/src/sgml/protocol.sgml, fix typo in streaming replication protocol docs.</li>

<li>Add vacuum_defer_cleanup_age to postgresql.conf.sample.</li>

<li>Reset btpo.xact following recovery of btree delete page. Add btpo_xact field into WAL record and reset it from there, rather than using FrozenTransactionId which can lead to some corner case bugs. Problem report and suggested route to a fix from Heikki Linnakangas, details by me.</li>

<li>Adjust comment in .history file to match recovery target specified. Comment present since 8.0 was never fully meaningful, since two recovery targets cannot be specified. Refactor recovery target type to make this change and associated code easier to understand. No change in function. Bug report arising from internal support question.</li>

<li>In pgsql/src/include/access/xlog_internal.h, update XLOG_PAGE_MAGIC to recognise WAL format changes.</li>

<li>In pgsql/src/backend/replication/libpqwalreceiver/libpqwalreceiver.c, minor tweaks on libpqrcv_connect(): ensure conninfo_repl[] is correctly sized and expand comment to explain otherwise undocumented use of replication connection parameter.</li>

<li>Add connection messages for streaming replication. log_connections was broken for a replication connection and no messages were displayed on either standby or primary, at any debug level. Connection messages needed to diagnose session drop/reconnect events. Use LOG mode for now, discuss lowering in later releases.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, clarify docs about database parameter in streaming replication primary_conninfo. Docs were unclear on whether or not database=replication was required, nor did they mention the FATAL error this causes if database parameter is mentioned explicitly, whatever its value.</li>

<li>In pgsql/src/include/access/nbtree.h, further corrections of mismatching struct and btree SizeOf macros. In this case, correction is to remove now unused fields from struct. Since these were unused and full of garbage anyway, no version change.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/walsender.c, throw a nicer error message if a standby server attempts to connect while the master is still in recovery. We don't support cascading slaves yet. Patch by Fujii Masao, with slightly changed wording.</li>

<li>Add restartpoint_command option to recovery.conf. Fix bug in %r handling in recovery_end_command, it always came out as 0 because InRedo was cleared before recovery_end_command was executed. Also, always take ControlFileLock when reading checkpoint location for %r. The recovery_end_command bug and the missing locking was present in 8.4 as well, that part of this patch will be backported separately.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, fix bug in %r handling in recovery_end_command, it always came out as 0 because InRedo was cleared before recovery_end_command was executed. Also, always take ControlFileLock when reading checkpoint location for %r. That didn't matter before, but in 8.4 bgwriter is active during recovery and can modify the control file concurrently.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/create_index.sgml, fix incorrect example in CREATE INDEX reference page, per Josh Kupershmidt. Also fix and uncomment an old example of creating a GIST index, and make a couple of other minor editorial adjustments.</li>

<li>Pass incompletely-transformed aggregate argument lists as separate parameters to transformAggregateCall, instead of abusing fields in Aggref to carry them temporarily. No change in functionality but hopefully the code is a bit clearer now. Per gripe from Gokulakannan Somasundaram.</li>

<li>In pgsql/doc/src/sgml/func.sgml, fix missing parentheses for current_query(), per bug #5378. Also make a couple other minor editorial improvements.</li>

<li>In pgsql/src/include/access/nbtree.h, fix oversight in btpo.xact patch; it was in fact installing garbage in the xact field on replay, due to not writing out all the data in the wal log struct.</li>

<li>Modify error context callback functions to not assume that they can fetch catalog entries via SearchSysCache and related operations. Although, at the time that these callbacks are called by elog.c, we have not officially aborted the current transaction, it still seems rather risky to initiate any new catalog fetches. In all these cases the needed information is readily available in the caller and so it's just a matter of a bit of extra notation to pass it to the callback. Per crash report from Dennis Koegel. I've concluded that the real fix for his problem is to clear the error context stack at entry to proc_exit, but it still seems like a good idea to make the callbacks a bit less fragile for other cases. Backpatch to 8.4. We could go further back, but the patch doesn't apply cleanly. In the absence of proof that this fixes something and isn't just paranoia, I'm not going to expend the effort.</li>

<li>In pgsql/src/backend/storage/ipc/ipc.c, clear error_context_stack and debug_query_string at the beginning of proc_exit, so that we won't try to attach any context printouts to messages that get emitted while exiting. Per report from Dennis Koegel, the context functions won't necessarily work after we've started shutting down the backend, and it seems possible that debug_query_string could be pointing at freed storage as well. The context information doesn't seem particularly relevant to such messages anyway, so there's little lost by suppressing it. Back-patch to all supported branches. I can only demonstrate a crash with log_disconnections messages back to 8.1, but the risk seems real in 8.0 and before anyway.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Update broken and permanently moved links.</li>

<li>Make typography consistent in the GRANT and REVOKE documentation.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, fix peculiar, untranslatable message concatenation attempt</li>

<li>Message style tuning for PL/Perl(U).</li>

<li>Don't link PL/Python against LOCALMODLIBS. This variable is apparently only for Python internally. In newer releases of Python this variable pulls in more and more libraries that users are less likely to have, leading to potential build failures.</li>

<li>Use data-type specific conversion functions also in plpy.execute. In PLy_spi_execute_plan, use the data-type specific Python-to-PostgreSQL conversion function instead of passing everything through InputFunctionCall as a string. The equivalent fix was already done months ago for function parameters and return values, but this other gateway between Python and PostgreSQL was apparently forgotten. As a result, data types that need special treatment, such as bytea, would misbehave when used with plpy.execute.</li>

<li>In pgsql/src/pl/plperl/plperl.c, message style tuning.</li>

<li>Prevent the injection of invalidly encoded strings by PL/Python into PostgreSQL with a few strategically placed pg_verifymbstr calls.</li>

<li>Also print the libpq error message when lo_create or lo_open fails.</li>

<li>Message tuning.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, typo fixes. Fujii Masao.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/RELEASE_CHANGES, mention way to get commit details for release notes.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update sgml release note markup suggestions.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, create 9.0 release notes; keep 9.0-alpha release notes in place.</li>

<li>Move server-side languages up one section in the 9.0 release notes.</li>

<li>In 9.0 release notes, move libpq/ecpg up into their own sections, like I did with server-side languages.</li>

<li>Add links to documentation sections in 9.0 release notes. Also update tagging instructions, and add id tags to a few documentation sections.</li>

<li>Add more 9.0 release note documentation links.</li>

<li>Remove 9.0 release notes xref's to HISTORY.html can be built. Document this restriction.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/tablecmds.c, forbid renaming columns of objects whose column names are system-generated. KaiGai Kohei, with adjustments to the comments.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In src/interfaces/ecpg/preproc/ecpg.trailer, fixed ecpg parser to allow more than one C preprocessor command inside a declare section.</li>

<li>ECPG only copied #include statements instead of processing them according to commandline option "-i". This change fixes this and adds a test case. It also honors #include_next, although this is probably never used for embedded SQL.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/prepare.c, correctly name functions in debug output in ecpglib. When the functions were refactored the debug output wasn't adjusted.</li>

<li>Adjusted regression test results to the change I made in debug output for ecpglib.</li>

<li>ECPG's parser now accepts and handles variables as arguments for the FREE command. Informix allows variables as argument to the embedded SQL command FREE. Given that we only allow freeing cursors via FREE for compatibility reasons only we should do the same.</li>

<li>In pgsql/src/tools/msvc/ecpg_regression.proj, adding special command line option that is now needed for the one ecpg regression test that was changed.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in four revisions of a patch to reduce the memory usage in ispell dictionaries.</li>

<li>ITAGAKI Takahiro and Greg Smith sent in patches to implement per-thread log files for pgbench -l.</li>

<li>Heikki Linnakangas sent in a patch which adds a restartpoint_command option to recovery.conf which is executed at every restartpoint in streaming replication. It is analogous to the recovery_end_command, which cleans up old WALs, and like recovery_end_command, takes a parameter %r which tells it about the oldest WAL to retain.</li>

<li>KaiGai Kohei sent in a patch for 9.1 which refactors access control for ALTER TABLE.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to fix the locale issue on Windows.</li>

<li>Alvaro Herrera sent in a patch to deal with the RESET ALL access control issue.</li>

<li>Yeb Havinga sent in a patch which changes EXPLAIN output to show the actual parameters.</li>

<li>Heikki Linnakangas sent in a patch to keep trying to make progess in recovery in standby mode by attempting to restore files first from archive, then pg_xlog, then streaming from master.</li>

<li>Tim Landscheidt sent in a patch to clarify the generate_subscripts() docs.</li>

</ul>