---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 juillet 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-07-21-nouvelles-hebdomadaires-de-postgresql-18-juillet-2010 "
---



<p><strong>Revues</strong></p>

<p>KaiGai Kohei reviewed Robert Haas's patch to add get_whatever_oid functionality.</p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Bump minor library version numbers, for 9.1 release.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, document bump of minor library version numbers.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, spellcheck 9.0 release notes.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, 9.0 release note improvements Erik Rijkers</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, restore pl/pgsql default install release note item.</li>

<li>In pg_upgrade, prevent psql AUTOCOMMIT=off by not loading .psqlrc.</li>

<li>In pgsql/src/tools/fsync/test_fsync.c, print each test_fsync description while test is running, rather than at the end.</li>

<li>In pgsql/contrib/pg_upgrade/exec.c, in pg_upgrade, report /bin directory checks independent of /data checks.</li>

<li>In pgsql/contrib/pg_upgrade/option.c, remove incorrect email address for pg_upgrade bug reports.</li>

<li>In pgsql/contrib/pg_upgrade/server.c, on Win32, pg_upgrade cannot sent any server log output to the log file because of file access limitations on that platform.</li>

<li>Backpatch pg_upgrade fixes to 9.0: 1. In pg_upgrade, prevent psql AUTOCOMMIT=off by not loading .psqlrc. 2. In pg_upgrade, report /bin directory checks independent of /data checks. 3. Remove incorrect email address for pg_upgrade bug reports. 4. On Win32, pg_upgrade cannot sent any server log output to the log file because of file access limitations on that platform.</li>

<li>In pgsql/src/backend/commands/tablespace.c, simplify missing tablespace replay error hint message, but only in HEAD so we don't need to re-translate for 9.0.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, add SO_PEERCRED check in new unix domain socket permission checking code.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Make NestLoop plan nodes pass outer-relation variables into their inner relation using the general PARAM_EXEC executor parameter mechanism, rather than the ad-hoc kluge of passing the outer tuple down through ExecReScan. The previous method was hard to understand and could never be extended to handle parameters coming from multiple join levels. This patch doesn't change the set of possible plans nor have any significant performance effect, but it's necessary infrastructure for future generalization of the concept of an inner indexscan plan. ExecReScan's second parameter is now unused, so it's removed.</li>

<li>Teach EXPLAIN to print PARAM_EXEC Params as the referenced expressions, rather than just $N. This brings the display of nestloop-inner-indexscan plans back to where it's been, and incidentally improves the display of SubPlan parameters as well. In passing, simplify the EXPLAIN code by having it deal primarily in the PlanState tree rather than separately searching Plan and PlanState trees. This is noticeably cleaner for subplans, and about a wash elsewhere. One small difference from previous behavior is that EXPLAIN will no longer qualify local variable references in inner-indexscan plan nodes, since it no longer sees such nodes as possibly referencing multiple tables. Vars referenced through PARAM_EXEC Params are still forcibly qualified, though, so I don't think the display is any more confusing than before. Adjust a couple of examples in the documentation to match this behavior.</li>

<li>Allow full SSL certificate verification (wherein libpq checks its host name parameter against server cert's CN field) to succeed in the case where both host and hostaddr are specified. As with the existing precedents for Kerberos, GSSAPI, SSPI, it is the calling application's responsibility that host and hostaddr match up --- we just use the host name as given. Per bug #5559 from Christopher Head. In passing, make the error handling and messages for the no-host-name-given failure more consistent among these four cases, and correct a lie in the documentation: we don't attempt to reverse-lookup host from hostaddr if host is missing. Back-patch to 8.4 where SSL cert verification was introduced.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, fix several problems in pg_dump's handling of SQL/MED objects, notably failure to dump a PUBLIC user mapping correctly, as per bug #5560 from Shigeru Hanada. Use the pg_user_mappings view rather than trying to access pg_user_mapping directly, so that the code doesn't fail when run by a non-superuser. And clean up some minor carelessness such as unsafe usage of fmtId(). Back-patch to 8.4 where this code was added.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, use an &lt;xref&gt; for restore_command reference. Marko Tiikkaja.</li>

<li>In pgsql/src/backend/commands/opclasscmds.c, remove duplicate code in DefineOpFamily(). The code was probably meant to be this way all along, since the subroutine CreateOpFamily previously had only one caller. But it wasn't. KaiGai Kohei.</li>

<li>In pgsql/src/backend/executor/execUtils.c, remove a sanity check in the exclusion-constraint code that prevented users from defining non-self-conflicting constraints. Jeff Davis. Note: I (tgl) objected to removing this check in 9.0 on the grounds that it was an important sanity check in new, poorly tested code. However, it should be all right to remove it for 9.1, since we'll get field testing from the 9.0 branch.</li>

<li>Add support for dividing money by money (yielding a float8 result) and for casting between money and numeric. Andy Balholm, reviewed by Kevin Grittner</li>

<li>Add a log_file_mode GUC that allows control of the file permissions set on log files created by the syslogger process. In passing, make unix_file_permissions display its value in octal, same as log_file_mode now does. Martin Pihlak</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, fix thinko in recent patch: 'sock' should be 'conn-&gt;sock'.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, fix up poor handling of unsupported-platform case in requirepeer patch.</li>

<li>Allow ORDER BY/GROUP BY/etc items to match targetlist items regardless of any implicit casting previously applied to the targetlist item. This is reasonable because the implicit cast, by definition, wasn't written by the user; so we are preserving the expected behavior that ORDER BY items match textually equivalent tlist items. The case never arose before because there couldn't be any implicit casting of a top-level SELECT item before we process ORDER BY etc. But now it can arise in the context of aggregates containing ORDER BY clauses, since the "targetlist" is the already-casted list of arguments for the aggregate. The net effect is that the datatype used for ORDER BY/DISTINCT purposes is the aggregate's declared input type, not that of the original input column; which is a bit debatable but not horrendous, and to do otherwise would require major rework that doesn't seem justified. Per bug #5564 from Daniel Grace. Back-patch to 9.0 where aggregate ORDER BY was implemented.</li>

<li>In pgsql/src/backend/utils/error/elog.c, remove unnecessary "Not safe to send CSV data" complaint from elog.c's fallback path when CSV logging is configured but not yet operational. It's sufficient to send the message to stderr, as we were already doing, and the "Not safe" gripe has already confused at least two core members ... Backpatch to 9.0, but not further --- doesn't seem appropriate to change this behavior in stable branches.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/mmgr/portalmem.c, oops, in the previous fix to prevent a cursor that's being used in a FOR loop from being dropped, I missed subtransaction cleanup. Pinned portals must be dropped at subtransaction cleanup just as they are at main transaction cleanup. Per bug #5556 by Robert Walker. Backpatch to 8.0, 7.4 didn't have subtransactions.</li>

<li>Add a paragraph explaining what restartpoints are. Mention that wal_keep_segments does not take effect during recovery. Fujii Masao</li>

<li>In pgsql/doc/src/sgml/wal.sgml, fix typo spotted by Thom Brown.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Add server authentication over Unix-domain sockets. This adds a libpq connection parameter requirepeer that specifies the user name that the server process is expected to run under. Reviewed by KaiGai Kohei.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in another revision of the patch reworking DML permissions.</li>

<li>Marko (johto) Tiikkaja sent in another WIP patch implementing writeable CTEs.</li>

<li>Greg Smith sent in another revision of the patch to make pgbench 64-bit clean.</li>

<li>Pavel Stehule sent in two more revisions of the patch to add left, right, reverse and concat functions to core, and printf and concat_ws functions to contrib.</li>

<li>Markus Wanner sent in a flock of patches to add a background worker infrastructure which could be used, for example, in doing parallel queries.</li>

<li>Alexander Korotkov sent in another revision of the patch to speed up levenshtein distance for multi-byte character sets.</li>

<li>Tom Lane sent in a patch to trace only PlanState trees in EXPLAIN. Currently, both PlanState and Plan get traced.</li>

<li>Peter Eisentraut sent in a proof-of-concept patch to implement per-column collation.</li>

<li>Mark Wong sent in another version of the patch to allow multiple -f's in the invocation of psql.</li>

<li>Pavel Stehule sent in another revision of the patch to preload text search dictionaries.</li>

<li>Robert Haas sent in another revision of the patch to suppress automatic recovery after a back-end crash, per review from Fujii Masao.</li>

<li>KaiGai Kohei sent in two separate patches to add security labels to database objects.</li>

<li>Fujii Masao sent in a patch intended to allow various levels of synchronous replication via a replication_mode parameter for recovery.conf in Hot Standby/Streaming Replication. It also provides some infrastructure for a quorum commit feature.</li>

<li>Yeb Havinga sent in another revision of the patch to allow for five-key syscaches, which is infrastructure for, among other things, K-Nearest-Neighbor GiST searches.</li>

<li>Robert Haas sent in a patch to make standard_conforming_strings on by default.</li>

<li>Simon Riggs sent in another revision of the patch to reduce the lock level required by ALTER TABLE, CREATE TRIGGER and CREATE RULE.</li>

<li>Boxuan Zhai sent in another revision of the patch to add MERGE.</li>

<li>Jeff Davis sent in another revision of the patch to add a "not equals" operator for contrib/btree_gist.</li>

<li>Brendan Jurd sent in another revision of the to_string(), to_array(), etc. patch.</li>

<li>Jan Urbanski sent in another revision of the patch to add functionality to \ef (edit function) and add \sf (show function) to psql.</li>

<li>Kevin Grittner sent in another revision of the patch to do true serializability.</li>

<li>David Christensen sent in another revision of the patch to add \conninfo to psql.</li>

<li>Bruce Momjian sent in three revisions of a patch intended to fix a breakage of CREATE TABLESPACE during crash recovery.</li>

</ul>