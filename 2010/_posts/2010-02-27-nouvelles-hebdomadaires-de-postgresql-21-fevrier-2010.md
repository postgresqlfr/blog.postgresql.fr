---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 février 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-02-27-nouvelles-hebdomadaires-de-postgresql-21-fevrier-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Gregory Stark a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/copydir.c, temporarily disable fsyncing the database directory in CREATE DATABASE until we can work out portability issues the build farm uncovered. In passing avoid fsyncing subdirectories twice.</li>

<li>In pgsql/src/port/copydir.c, revert prior patch to fsync directories until portability problems exposed by build farm can be sorted out.</li>

<li>In pgsql/src/backend/commands/explain.c, revert to showing buffer counts in explain (buffers)</li>

<li>In pgsql/src/port/copydir.c, oops, don't forget to rewind the directory before scanning it to fsync files in CREATE DATABASE</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/vacuum.c, fix typo in comment.</li>

<li>Move main error message text in plperl into errmsg from errdetail, and move the context information into errcontext instead of errmsg. This makes them better conform to our guidelines. Also remove a few errcode declarations that were providing the default value ERRCODE_INTERNAL_ERROR.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, fix another stupid typo... Jan Urbanski</li>

<li>Add emulation of non-blocking sockets to the win32 socket/signal layer, and use this in pq_getbyte_if_available. It's only a limited implementation which switches the whole emulation layer to non-blocking mode, but that's enough as long as non-blocking is only used during a short period of time, and only one socket is accessed during this time.</li>

<li>In pgsql/src/backend/port/win32/socket.c, another typo fix. Thom Brown.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_dump_sort.c, when sorting functions in pg_dump, break ties (same name) by number of arguments.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, preliminary release notes for 9.0alpha4.</li>

<li>Translation updates for 9.0alpha4</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, small corrections to message output targets in pg_ctl. 1. The message "server stopped" should be affected by the -s option, just like "server started" already was. 2. The message "could not start server" should consistently go to stderr.</li>

<li>Version stamp 9.0alpha4.</li>

<li>Revert version stamping in wrong branch.</li>

<li>Version stamp 9.0alpha4 (in the right branch).</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/do.sgml, fix synopsis of DO statement.</li>

<li>In pgsql/src/bin/psql/tab-complete.c, support new syntax and improve handling of parentheses in psql tab-completion. Newly supported syntax includes: ALTER {TABLE|INDEX|TABLESPACE} {SET|RESET} with options, ALTER TABLE ALTER COLUMN {SET|RESET} with options, ALTER TABLE ALTER COLUMN SET STORAGE, CREATE INDEX CONCURRENTLY, CREATE INDEX ON (without name), CREATE INDEX ... USING with pg_am.amname instead of hard-corded names, CREATE TRIGGER with events, and DROP AGGREGATE function with arguments</li>

<li>Logger should not shutdown before any other threads are alive. Change list_concat() to free the second argument in the function.</li>

<li>In pgsql/src/backend/utils/adt/date.c, date_recv should accept infinities. Reported by James William Pye.</li>

<li>Fix STOP WAL LOCATION in backup history files no to return the next segment of XLOG_BACKUP_END record even if the the record is placed at a segment boundary. Furthermore the previous implementation could return nonexistent segment file name when the boundary is in segments that has "FE" suffix. We never use segments with "FF" suffix. Backpatch to 8.0, where hot backup was introduced. Reported by Fujii Masao.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In ECPG, do not check NaN values for infinity. Some system are not able to handle this. Zoltan Boszormenyi.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Clarify documentation on the behavior of unnamed bind queries.</li>

<li>In pgsql/src/backend/utils/mb/Unicode/UCS_to_GB18030.pl, remove personal copyright now that file has been rewritten using existing *.pl conversion script. Andreas 'ads' Scherbaum</li>

<li>Have SELECT and CREATE TABLE AS queries return a row count. While this is invisible in psql, other interfaces, like libpq, make this value visible. Zoltan Boszormenyi.</li>

<li>Prevent psql version banner from being printed by the \c command if the versions match, per report from Peter Eisentraut.</li>

<li>Honor to_char() "FM" specification in YYY, YY, and Y; it was already honored by YYYY. Also document Oracle "toggle" FM behavior. Per report from Guy Rouillier</li>

<li>Move log_error_verbosity GUC setting to "What to log" section, and document the behavior of terse and verbose output options.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, wordsmithing of HS and SR documentation, with some wording improvements from Erik Rijkers too.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, add missing close tag.</li>

<li>Hot Standby documentation updates. Greg Smith.</li>

<li>In pgsql/doc/src/sgml/query.sgml, remove mention that binary distributions pre-compile the tutorial files.</li>

<li>First pass over client applications documentation proofreading. Gabrielle Roth.</li>

<li>Document --version and --help options for all client applications (they all support it). Per report from Josh Kupershmidt</li>

<li>In pgsql/doc/src/sgml/wal.sgml, document that many solid-state drives have volatile write-back caches.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, clarify documentation about username mapping when authenticating with GSSAPI or Kerberos. Ian Turner.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, make 'include_realm' ordering consistent in the docs, to match recent doc change.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Clean up package namespace use and use of Safe in plperl. Prevent use of another buggy version of Safe.pm. Only register the exit handler if we have successfully created an interpreter. Change log level of perl warnings from NOTICE to WARNING. The infrastructure is there if in future we decide to allow DBAs to specify extra modules that will be allowed in trusted code. However, for now the relevant variables are declared as lexicals rather than as package variables, so that they are not (or should not be) accessible. Mostly code from Tim Bunce, reviewed by Alex Hunsaker, with some tweaks by me.</li>

<li>Add query text to auto_explain output. Still to be done: fix docs and fix regression failures under auto_explain.</li>

<li>In PL/Perl, use a fatal warning check with what looks like a more portable error message. Error noticed by Tom and buildfarm member kite.</li>

<li>In pgsql/doc/src/sgml/auto-explain.sgml, adjust sample auto-explain output to reflect query text inclusion.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Replace the pg_listener-based LISTEN/NOTIFY mechanism with an in-memory queue. In addition, add support for a "payload" string to be passed along with each notify event. This implementation should be significantly more efficient than the old one, and is also more compatible with Hot Standby usage. There is not yet any facility for Hiroshi Saito slaves to receive notifications generated on the master, although such a thing is possible in future. Joachim Wieland, reviewed by Jeff Davis; also hacked on by me.</li>

<li>In pgsql/src/backend/commands/async.c, make NOTIFY_PAYLOAD_MAX_LENGTH depend explicitly on BLCKSZ and NAMEDATALEN, so this code doesn't go nuts with smaller than default BLCKSZ or larger than default NAMEDATALEN. The standard value is still exactly 8000.</li>

<li>In pgsql/doc/src/sgml/ref/notify.sgml, tweak description of payload parameter.</li>

<li>In pgsql/src/backend/utils/misc/guc.c, log_error_verbosity is now LOGGING_WHAT category.</li>

<li>In pgsql/src/pl/plpgsql/src/pl_funcs.c, prevent #option dump from crashing on FORI statement with null step. Reported by Pavel Stehule.</li>

<li>When updating ShmemVariableCache from a checkpoint record, be sure to set all the values derived from oldestXid, not just that field. Brain fade in one of my patches associated with flat file removal, exposed by a report from Fujii Masao. With this change, xidVacLimit should always be valid, so remove a couple of bits of complexity associated with the previous assumption that sometimes it wouldn't get set right away.</li>

<li>Stamp HEAD as 9.0devel, and update various places that were referring to 8.5 (hope I got 'em all). Per discussion, this release will be 9.0 not 8.5.</li>

<li>In pgsql/src/backend/commands/async.c, take care to reprocess an uncommitted notify message. Oversight in my changes to cope with possible errors during message processing; spotted by Joachim Wieland.</li>

<li>Fix up pg_dump's treatment of large object ownership and ACLs. We now emit a separate archive entry for each BLOB, and use pg_dump's standard methods for dealing with its ownership, ACL if any, and comment if any. This means that switches like --no-owner and --no-privileges do what they're supposed to. Preliminary testing says that performance is still reasonable even with many blobs, though we'll have to see how that shakes out in the field. KaiGai Kohei, revised by me.</li>

<li>In pgsql/src/backend/utils/mmgr/portalmem.c, force READY portals into FAILED state when a transaction or subtransaction is aborted, if they were created within the failed xact. This prevents ExecutorEnd from being run on them, which is a good idea because they may contain references to tables or other objects that no longer exist. In particular this is hazardous when auto_explain is active, but it's really rather surprising that nobody has seen an issue with this before. I'm back-patching this to 8.4, since that's the first version that contains auto_explain or an ExecutorEnd hook, but I wonder whether we shouldn't back-patch further.</li>

<li>Fix ExecEvalArrayRef to pass down the old value of the array element or slice being assigned to, in case the expression to be assigned is a FieldStore that would need to modify that value. The need for this was foreseen some time ago, but not implemented then because we did not have arrays of composites. Now we do, but the point evidently got overlooked in that patch. Net result is that updating a field of an array element doesn't work right, as illustrated if you try the new regression test on an unpatched backend. Noted while experimenting with EXPLAIN VERBOSE, which has also got some issues in this area. Backpatch to 8.3, where arrays of composites were introduced.</li>

<li>Provide some rather hokey ways for EXPLAIN to print FieldStore and assignment ArrayRef expressions that are not in the immediate context of an INSERT or UPDATE targetlist. Such cases never arise in stored rules, so ruleutils.c hadn't tried to handle them. However, they do occur in the targetlists of plans derived from such statements, and now that EXPLAIN VERBOSE tries to print targetlists, we need some way to deal with the case. I chose to represent an assignment ArrayRef as "array[subscripts] := source", which is fairly reasonable and doesn't omit any information. However, FieldStore is problematic because the planner will fold multiple assignments to fields of the same composite column into one FieldStore, resulting in a structure that is hard to understand at all, let alone display comprehensibly. So in that case I punted and just made it print the source expression(s). Backpatch to 8.4 --- the lack of functionality exists in older releases, but doesn't seem to be important for lack of anything that would call it.</li>

<li>In pgsql/src/pl/plpython/plpython.c, volatile-ize all five places where we expect a PG_TRY block to restore old memory context in plpython. Before only one of them was marked volatile, but per report from Zdenek Kotala, some compilers do the wrong thing here.</li>

<li>Reduce the rescan cost estimate for Materialize nodes to cpu_operator_cost per tuple, instead of the former cpu_tuple_cost. It is sane to charge less than cpu_tuple_cost because Materialize never does any qual-checking or projection, so it's got less overhead than most plan node types. In particular, we want to have the same charge here as is charged for readout in cost_sort. That avoids the problem recently exhibited by Teodor wherein the planner prefers a useless sort over a materialize step in a context where a lot of rescanning will happen. The rescan costs should be just about the same for both node types, so make their estimates the same. Not back-patching because all of the current logic for rescan cost estimates is new in 9.0. The old handling of rescans is sufficiently not-sane that changing this in that structure is a bit pointless, and might indeed cause regressions.</li>

<li>Clean up handling of XactReadOnly and RecoveryInProgress checks. Add some checks that seem logically necessary, in particular let's make real sure that Hiroshi Saito slave sessions cannot create temp tables. (If they did they would think that temp tables belonging to the master's session with the same BackendId were theirs. We *must* not allow myTempNamespace to become set in a slave session.) Change setval() and nextval() so that they are only allowed on temp sequences in a read-only transaction. This seems consistent with what we allow for table modifications in read-only transactions. Since an Hiroshi Saito slave can't have a temp sequence, this also provides a nicer cure for the setval PANIC reported by Erik Rijkers. Make the error messages more uniform, and have them mention the specific command being complained of. This seems worth the trifling amount of extra code, since people are likely to see such messages a lot more than before.</li>

<li>In pgsql/src/port/copydir.c, fix multiple copy and paste-o's. No wonder this code didn't work.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix pq_getbyte_if_available() function. It was confused on what it returns if no data is immediately available. Patch by me with numerous fixes from Fujii Masao and Magnus Hagander.</li>

<li>In pgsql/src/backend/commands/sequence.c, forbid setval() during recovery. This prevents the PANIC reported by Erik Rijkers. Patch by Andres Freund.</li>

<li>Don't use O_DIRECT when writing WAL files if archiving or streaming is enabled. Bypassing the kernel cache is counter-productive in that case, because the archiver/walsender process will read from the WAL file soon after it's written, and if it's not cached the read will cause a physical read, eating I/O bandwidth available on the WAL drive. Also, walreceiver process does unaligned writes, so disable O_DIRECT in walreceiver process for that reason too.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove incorrect statement that PostgreSQL 8.4 has no default parameters. Tom Lane already removed this from HEAD as par of the plpgsql variable resolution behavior patch, but this part of his patch also applies to 8.4.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/high-availability.sgml, copy editing of Hot Standby docs. Some clarifications, addition of missing items and minor edits.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Fujii Masao's patch to add 3 parameters for keepalive to libpq. Postponed to the 9.1 cycle.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in a document patch for pg_stop_backup() which clarifies the usage of the WAL file name in the backup history file.</li>

<li>Tim Bunce sent in a patch to fix a couple of loose ends in PL/Perl, namely: move on_proc_exit() call to after the plperl_*_init() calls, and don't allow use of Safe version 2.21 as that's broken for PL/Perl.</li>

<li>Magnus Hagander sent in a patch to allow putting a RADIUS secret in a file.</li>

<li>ITAGAKI Takahiro sent in a patch against autoexplain per a bug report from Andrew Dunstan.</li>

<li>Fujii Masao sent in two revisions of a patch to remove O_DIRECT from walreceiver, which fixes an issue on win32.</li>

<li>Tim Bunce sent in a patch to implement PostgreSQL::PLPerl::Call.</li>

<li>Bruce Momjian sent in a patch clarifying the handling of prepared statements.</li>

<li>Fujii Masao sent in a patch to forbid starting a standby during recovery, hence forbidding cascading standby.</li>

<li>Heikki Linnakangas sent in a patch to disable O_DIRECT when archiving or streaming is enabled. This is to help with the win32 issue.</li>

<li>Greg Smith sent in a doc patch for Hot Standby.</li>

<li>Bruce Momjian sent in a patch to remove references to libxml2 on platforms where it is not thread-safe.</li>

<li>Heikki Linnakangas sent in a doc patch for streaming replication.</li>

<li>Zoltan Boszormenyi sent in another revision of the lock_timeout GUC patch.</li>

</ul>