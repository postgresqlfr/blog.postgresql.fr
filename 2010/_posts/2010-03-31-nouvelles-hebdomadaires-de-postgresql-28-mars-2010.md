---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 mars 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-03-31-nouvelles-hebdomadaires-de-postgresql-28-mars-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/test/preproc/strings.pgc, fixed ECPG regression test to make sure it uses absolute paths for include files instead of relative ones which break vpath builds.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix an oversight in join-removal optimization: we have to check not only for plain Vars that are generated in the inner rel and used above the join, but also for PlaceHolderVars. Per report from Oleg Kolyhalin.</li>

<li>In pgsql/src/test/regress/output/constraints.source, fix regression test breakage from recent change in default name of exclusion-constraint index.</li>

<li>In pgsql/src/backend/postmaster/pgstat.c, now that we know last_statrequest &gt; last_statwrite can be observed in the buildfarm, expend a little more effort on the log message for it.</li>

<li>In pgsql/src/backend/libpq/hba.c, fix thinko in log message for "sameuser" ident map mismatch: the provided and authenticated usernames were swapped. Reported by Bryan Henderson in bug #5386. Also clean up poorly-maintained header comment for this function.</li>

<li>In pgsql/contrib/intarray/_int_gin.c, fix ginint4_queryextract() to actually do what it was intended to do for an unsatisfiable query, such as indexcol &amp;&amp; empty_array. It should return -1 to tell GIN no scan is required; but silly typo disabled the logic for that, resulting in unnecessary "GIN indexes do not support whole-index scans" error. Per bug report from Jeff Trout. Back-patch to 8.3 where the logic was introduced.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Re-order createuser and vacuumedb documentation options, for consistency. Gabrielle Roth.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, properly credit Simon Riggs for functions pg_last_xlog_replay_location, etc.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, add back other xlog() function author names.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, typo fix from Erik (breinbaas) Rijkers.</li>

<li>Document in postgresql.conf that the max_standby_delay default is 30 'seconds'.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/indexcmds.c, shorten suffix of automatically created indexes to "_excl" when using exclusion constraints, in line with string length of other pre-9.0 suffixes.</li>

<li>In pgsql/src/backend/replication/walsender.c, reduce CPU utilisation of WALSender process. Process was using 10% CPU doing nothing, caused by naptime specified in milliseconds yet units of pg_usleep() parameter is microseconds. Correctly specifying units reduces call frequency by 1000. Reduction in CPU consumption verified.</li>

<li>In pgsql/src/backend/utils/init/postinit.c, change replication connection log format to allow for a database called replication. Add host and port details, following format of messages in BackendInitialize().</li>

<li>In pgsql/src/backend/replication/walsender.c, additional thoughts on WALSender cpu reduction. Use long type and alter a comment to reduce confusion.</li>

<li>Modify some new and pre-existing messages for translatability.</li>

<li>Derive latestRemovedXid for btree deletes by reading heap pages. The WAL record for btree delete contains a list of tids, even when backup blocks are present. We follow the tids to their heap tuples, taking care to follow LP_REDIRECT tuples. We ignore LP_DEAD tuples on the understanding that they will always have xmin/xmax earlier than any LP_NORMAL tuples referred to by killed index tuples. Iff all tuples are LP_DEAD we return InvalidTransactionId. The heap relfilenode is added to the WAL record, requiring API changes to pass down the heap Relation. XLOG_PAGE_MAGIC updated.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>Each worker thread will have its own log file in pgbench to avoid interleaved writes. The first worker still uses "pgbench_log.&lt;pid&gt;" for the name, but additional workers use "pgbench_log.&lt;pid&gt;.&lt;serial-number&gt;" instead. Reported by Greg Smith.</li>

<li>Remove CRs for each line in pgbench.sgml.</li>

<li>Clean up logging codes and add documentation. Add English documentation. Split warm-standby and internal module documentation. Change the default for pg_statsinfo.syslog_line_prefix to 't %p '. Support non-default log_error_verbosity. Support local, GMT and UTC for log_timezone, but we cannot support others because postgres uses own timezone implemntation. Simplify codes for log_line_prefix.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.addons, remove useless double assignment GCC 4.5 complained about it.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/README, update description of walrcv_receive() function to match reality.</li>

<li>In pgsql/src/backend/replication/walsender.c, flush CopyOutResponse when starting streaming in walsender, so that it's not delayed until the first WAL record is sent. Fujii Masao.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/Makefile.global.in, mark "installcheck-parallel", "world", "install-world" and "installcheck-world" make targets as PHONY. Fujii Masao.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Prevent ALTER USER f RESET ALL from removing the settings that were put there by a superuser -- "ALTER USER f RESET setting" already disallows removing such a setting. Apply the same treatment to ALTER DATABASE d RESET ALL when run by a database owner that's not superuser.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Devrim GUNDUZ sent in a patch to update the Turkish stop words in tsearch2.</li>

<li>Fujii Masao sent in a doc patch for walreceiver per suggestion from Hitoshi Harada.</li>

<li>Heikki Linnakangas sent a doc patch clarifying use of double-quoted strings in pg_hba.conf. This became more relevant because of the special replication database, as distinct from some database named "replication" (with quotes).</li>

<li>Heikki Linnakangas and Fujii Masao sent in patches to try various ways to get WALs when the database is in recovery mode.</li>

<li>Andrew Dunstan sent in a WIP patch to fix an xmlconcat bug.</li>

<li>Fujii Masao sent in another revision of the patch to fix the issue where walreceiver is not interruptible on Windows.</li>

<li>Fujii Masao sent in a patch to fix a typo in a comment in pgsql/src/backend/access/transam/xlog.c.</li>

<li>Tom Lane sent in a WIP patch to fix an issue with join removal.</li>

</ul>