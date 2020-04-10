---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 mai 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-05-10-nouvelles-hebdomadaires-de-postgresql-2-mai-2010 "
---



<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>When we're restricting who can connect, don't allow new walsenders. Normal superuser processes are allowed to connect even when the database system is shutting down, or when fewer than superuser_reserved_connection slots remain. This is intended to make sure an administrator can log in and troubleshoot, so don't extend these same courtesies to users connecting for replication.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/pg_locale.c, add comments about why we set LC_CTYPE in WIN32 for time when we don't actually access it, per information from Hiroshi Inoue.</li>

<li>Reorder pg_stat_activity columns to be more consistent, using layout suggested by Tom Lane. Catalog version bumped due to system view change.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, document that pgpool can be used with master/slave servers to avoid problems with non-deterministic functions.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update 9.0 release notes to current; add major items and introductory text.</li>

<li>Move alpha release notes into a separate file; re-align sgml tags.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, doc fix -- last major item should not be a bullet.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, documentation fix: CREATE TRIGGER 'WHERE' -&gt; 'WHEN'. Selena Deckelmann.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/wparser_def.c, add missing newlines in WPARSER_TRACE output.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, update documentation to match pg_stat_activity changes.</li>

<li>Replace the KnownAssignedXids hash table with a sorted-array data structure, and be more tense about the locking requirements for it, to improve performance in Hot Standby mode. In passing fix a few bugs and improve a number of comments in the existing Hot Standby code. Simon Riggs, with some editorialization by Tom Lane.</li>

<li>In pgsql/src/backend/parser/parse_relation.c, fix stupid typo in refnameRangeTblEntry() --- mea maxima culpa. Per report from Josh Berkus.</li>

<li>Modify the built-in text search parser to handle URLs more nearly according to RFC 3986. In particular, these characters now terminate the path part of a URL: '"', '&lt;', '&gt;', '\', '^', '`', '{', '|', '}'. The previous behavior was inconsistent and depended on whether a "?" was present in the path. Per gripe from Donald Fraser and spec research by Kevin Grittner. This is a pre-existing bug, but not back-patching since the risks of breaking existing applications seem to outweigh the benefits.</li>

<li>Fix contrib/tsearch2 expected results to match recent changes in URL parsing.</li>

<li>Modify ShmemInitStruct and ShmemInitHash to throw errors internally, rather than returning NULL for some-but-not-all failures as they used to. Remove now-redundant tests for NULL from call sites. We had to do something about this because many call sites were failing to check for NULL; and changing it like this seems a lot more useful and mistake-proof than adding checks to the call sites without them.</li>

<li>In pgsql/src/bin/pg_controldata/pg_controldata.c, pg_controldata needs #define FRONTEND, same as pg_resetxlog. Per buildfarm results from dawn_bat.</li>

<li>Minor editorializing on pg_controldata and pg_resetxlog: adjust some message wording, deal explicitly with some fields that were being silently left zero.</li>

<li>In pgsql/src/backend/catalog/information_schema.sql, modify information_schema._pg_keysequal() to avoid search path risk when contrib/intarray is loaded. Per bug #5417 from Kenaniah Cerny. Not forcing initdb since backend doesn't directly depend on this, and few people have run into it.</li>

<li>In pgsql/doc/src/sgml/perform.sgml, fix typo, per Thom Brown.</li>

<li>In pgsql/doc/src/sgml/jadetex.cfg, install a workaround for 'TeX capacity exceeded' problem when building PDF output for recent versions of the documentation. There is probably a better answer out there somewhere, but we need something now so we can build beta releases.</li>

<li>Rename the parameter recovery_connections to hot_standby, to reduce possible confusion with streaming-replication settings. Also, change its default value to "off", because of concern about executing new and poorly-tested code during ordinary non-replicating operation. Per discussion. In passing do some minor editing of related documentation.</li>

<li>Adjust error checks in pg_start_backup and pg_stop_backup to make it possible to perform a backup without archive_mode being enabled. This gives up some user-error protection in order to improve usefulness for streaming-replication scenarios. Per discussion.</li>

<li>Fix a couple of places where the result of fgets() wasn't checked. This is mostly to suppress compiler warnings, although in principle the cases could result in undesirable behavior. Martin Pitt.</li>

<li>In pgsql/src/pl/plpython/plpython.c, fix multiple memory leaks in PLy_spi_execute_fetch_result: it would leak memory if the result had zero rows, and also if there was any sort of error while converting the result tuples into Python data. Reported and partially fixed by Andres Freund. Back-patch to all supported versions. Note: I haven't tested the 7.4 fix. 7.4's configure check for python is so obsolete it doesn't work on my current machines :-(. The logic change is pretty straightforward though.</li>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, improve COPY documentation to clarify that it doesn't copy data to or from child tables. Per gripe from Jaime Casanova.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, update our information about OS X shared memory configuration: it's now possible to set most of the SHM kernel parameters without a reboot. Also, reorder the paragraph to explain the modern configuration method first. There are probably not too many people who still care about how to do it on OS X 10.3 or older.</li>

<li>In pgsql/src/pl/plpython/plpython.c, fix leakage of proc-related storage in plpython's inline handler. Per report from Andres Freund.</li>

<li>In pgsql/doc/src/sgml/Makefile, adjust postgres.xml rule so that make will notice a failure exit from osx. The previous coding had it in a pipe, which on most shells won't report the error. Per experimentation with a bug report from Vladimir Kokovic. This doesn't actually fix his problem, but it does explain why make didn't report that there was a problem.</li>

<li>In pgsql/doc/src/sgml/Makefile, install hack workaround for failure of 'make all' in VPATH builds. It appears that gmake gets confused if postgres.sgml is not present in the working directory, and instantiates some default rule or other that would let postgres.sgml be built from postgres.xml. I haven't been able to track down exactly where that's coming from, but the problem can be dodged by specifying srcdir explicitly in the rule for postgres.xml. Per report from Vladimir Kokovic.</li>

<li>In pgsql/src/backend/port/sysv_shmem.c, add code to InternalIpcMemoryCreate() to handle the case where shmget() returns EINVAL for an existing shared memory segment. Although it's not terribly sensible, that behavior does meet the POSIX spec because EINVAL is the appropriate error code when the existing segment is smaller than the requested size, and the spec explicitly disclaims any particular ordering of error checks. Moreover, it does in fact happen on OS X and probably other BSD-derived kernels. (We were able to talk NetBSD into changing their code, but purging that behavior from the wild completely seems unlikely to happen.) We need to distinguish collision with a pre-existing segment from invalid size request in order to behave sensibly, so it's worth some extra code here to get it right. Per report from Gavin Kistner and subsequent investigation. Back-patch to all supported versions, since any of them could get used with a kernel having the debatable behavior.</li>

<li>Clean up some awkward, inaccurate, and inefficient processing around MaxStandbyDelay. Use the GUC units mechanism for the value, and choose more appropriate timestamp functions for performing tests with it. Make the ps_activity manipulation in ResolveRecoveryConflictWithVirtualXIDs have behavior similar to ps_activity code elsewhere, notably not updating the display when update_process_title is off and not truncating the display contents at an arbitrarily-chosen length. Improve the docs to be explicit about what MaxStandbyDelay actually measures, viz the difference between primary and standby servers' clocks, and the possible hazards if their clocks aren't in sync.</li>

<li>In pgsql/src/backend/access/heap/heapam.c, fix replay of XLOG_HEAP_NEWPAGE WAL records to pay attention to the forknum field of the WAL record. The previous coding always wrote to the main fork, resulting in data corruption if the page was meant to go into a non-default fork. At present, the only operation that can produce such WAL records is ALTER TABLE/INDEX SET TABLESPACE when executed with archive_mode = on. Data corruption would be observed on standby slaves, and could occur on the master as well if a database crash and recovery occurred after committing the ALTER and before the next checkpoint. Per report from Gordon Shannon. Back-patch to 8.4; the problem doesn't exist in earlier branches because we didn't have a concept of multiple relation forks then.</li>

<li>In pgsql/src/backend/access/heap/heapam.c, improve printing of XLOG_HEAP_NEWPAGE records to include the forknum.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, if a base backup is cancelled by server shutdown or crash, throw an error in WAL recovery when it sees the shutdown checkpoint record. It's more user-friendly to find out about it at that point than at the end of recovery, and you're not left wondering why your hot standby server never opens up for read-only connections.</li>

<li>In pgsql/doc/src/sgml/recovery-config.sgml, add recovery.conf parameters to the documentation index, per suggestion by Fujii Masao.</li>

<li>Introduce wal_level GUC to explicitly control if information needed for archival or hot standby should be WAL-logged, instead of deducing that from other options like archive_mode. This replaces recovery_connections GUC in the primary, where it now has no effect, but it's still used in the standby to enable/disable hot standby. Remove the WAL-logging of "unlogged operations", like creating an index without WAL-logging and fsyncing it at the end. Instead, we keep a copy of the wal_mode setting and the settings that affect how much shared memory a hot standby server needs to track master transactions (max_connections, max_prepared_xacts, max_locks_per_xact) in pg_control. Whenever the settings change, at server restart, write a WAL record noting the new settings and update pg_control. This allows us to notice the change in those settings in the standby at the right moment, they used to be included in checkpoint records, but that meant that a changed value was not reflected in the standby until the first checkpoint after the change. Bump PG_CONTROL_VERSION and XLOG_PAGE_MAGIC. Whack XLOG_PAGE_MAGIC back to the sequence it used to follow, before hot standby and subsequent patches changed it to 0x9003.</li>

<li>In pgsql/src/backend/access/nbtree/nbtxlog.c, fix handling of b-tree reuse WAL records when hot standby is disabled, and add missing code in btree_desc for them. This fixes the bug with "tree_redo: unknown op code 208" error reported by Jaime Casanova.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plpgsql.sgml, reformat code examples in plpgsql docs for better readability in PDF output. Erik Rijkers</li>

<li>In pgsql/doc/src/sgml/perform.sgml, make pg_stats example query result a bit less wide, and add comment about pg_stats.inherited</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/chklocale.c, add CP949 as an alias for UHC encoding. pg_get_encoding_from_locale() with kor locale on Windows can use the path. Reported by Hiroshi Inoue.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-protocol3.c, fix typo that had the code check the same thing twice. Fujii Masao.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag for 9.0beta1.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, mention that max_standby_delay has units of milliseconds. Units are mentioned for all other parameters where the default is expressed in a different unit.</li>

<li>In pgsql/doc/src/sgml/regress.sgml, docs for standbycheck regression tests.</li>

<li>Update standbycheck test output with new ERROR message changes. No changes to tests and no changes in accepted server behaviour.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marko (johto) Tiikkaja sent in a patch to throw a more informative warning when people use extra parentheses in INSERT statements.</li>

<li>Simon Riggs sent in another revision of the patch to fix the issue where queries on the Hot Standby slave ran much slower than the same queries on the master.</li>

<li>Heikki Linnakangas sent in a patch to relax the checks in pg_start/stop_backup() so they can be used as long as wal_level &gt;= 'archive', even when archiving is disabled.</li>

<li>Simon Riggs sent in a patch intended to improve the performance of btree_xlog_vacuum().</li>

<li>Zoltan Boszormenyi sent in two revisions of a patch intended for 9.1 which adds synchronous replication atop Hot Standby/Streaming Replication.</li>

<li>Aftab Hussain sent in a patch to add PKST (Pakstan Summer Time) to the time zone list.</li>

<li>Robert Haas sent in a patch to implement CINE (Create If Not Exists) for tables.</li>

<li>Greg Sabino Mullane sent in a patch to show the schema along with the table involved in a COPY error.</li>

</ul>