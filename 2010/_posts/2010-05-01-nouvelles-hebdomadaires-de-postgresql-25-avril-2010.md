---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 avril 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-05-01-nouvelles-hebdomadaires-de-postgresql-25-avril-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Add wrapper function libpqrcv_PQexec() in the walreceiver that uses async libpq to send queries, making the waiting for responses interruptible on platforms where PQexec() can't normally be interrupted by signals, such as win32. Fujii Masao and Magnus Hagander.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/nbtree/nbtxlog.c, fix uninitialized local variables. Not sure why gcc doesn't complain about these --- maybe because they're effectively unused? MSVC does complain though, per buildfarm.</li>

<li>Move the responsibility for calling StartupXLOG into InitPostgres, for those process types that go through InitPostgres; in particular, bootstrap and standalone-backend cases. This ensures that we have set up a PGPROC and done some other basic initialization steps (corresponding to the if (IsUnderPostmaster) block in AuxiliaryProcessMain) before we attempt to run WAL recovery in a standalone backend. As was discovered last September, this is necessary for some corner-case code paths during WAL recovery, particularly end-of-WAL cleanup. Moving the bootstrap case here too is not necessary for correctness, but it seems like a good idea since it reduces the number of distinct code paths.</li>

<li>In pgsql/src/backend/replication/walreceiver.c, fix code that doesn't work on machines with strict alignment requirements: must use memcpy here rather than struct assignment. In passing, rearrange some randomly-ordered declarations to be a tad less random.</li>

<li>Arrange for client authentication to occur before we select a specific database to connect to. This is necessary for the walsender code to work properly (it was previously using an untenable assumption that template1 would always be available to connect to). This also gets rid of a small security shortcoming that was introduced in the original patch to eliminate the flat authentication files: before, you could find out whether or not the requested database existed even if you couldn't pass the authentication checks. The changes needed to support this are mainly just to treat pg_authid and pg_auth_members as nailed relations, so that we can read them without having to be able to locate real pg_class entries for them. This mechanism was already debugged for pg_database, but we hadn't recognized the value of applying it to those catalogs too. Since the current code doesn't have support for accessing toast tables before we've brought up all of the relcache, remove pg_authid's toast table to ensure that no one can store an out-of-line toasted value of rolpassword. The case seems quite unlikely to occur in practice, and was effectively unsupported anyway in the old "flatfiles" implementation. Update genbki.pl to actually implement the same rules as bootstrap.c does for not-nullability of catalog columns. The previous coding was a bit cheesy but worked all right for the previous set of bootstrap catalogs. It does not work for pg_authid, where rolvaliduntil needs to be nullable. Initdb forced due to minor catalog changes (mainly the toast table removal).</li>

<li>Move the check for whether walreceiver has authenticated as a superuser from walsender.c, where it didn't really belong, to postinit.c where it does belong (and is essentially free, too).</li>

<li>Fix pg_hba.conf matching so that replication connections only match records with database = replication. The previous coding would allow them to match ordinary records too, but that seems like a recipe for security breaches. Improve the messages associated with no-such-pg_hba.conf entry to report replication connections as such, since that's now a critical aspect of whether the connection matches. Make some cursory improvements in the related documentation, too.</li>

<li>Enforce superuser permissions checks during ALTER ROLE/DATABASE SET, rather than during define_custom_variable(). This entails rejecting an ALTER command if the target variable doesn't have a known (non-placeholder) definition, unless the calling user is superuser. When the variable *is* known, we can correctly apply the rule that only superusers can issue ALTER for SUSET parameters. This allows define_custom_variable to apply ALTER's values for SUSET parameters at module load time, secure in the knowledge that only a superuser could have set the ALTER value. This change fixes a longstanding gotcha in the usage of SUSET-level custom parameters; which is a good thing to fix now that plpgsql defines such a parameter.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/ipc/procarray.c, check RecoveryInProgress() while holding ProcArrayLock during snapshots. This prevents a rare, yet possible race condition at the exact moment of transition from recovery to normal running.</li>

<li>Add new message for explicit rejection by pg_hba.conf. Implicit rejection retains same message as before.</li>

<li>Fix oversight in collecting values for cleanup_info records. vacuum_log_cleanup_info() now generates log records with a valid latestRemovedXid set in all cases. Also be careful not to zero the value when we do a round of vacuuming part-way through lazy_scan_heap(). Incidentally, this reduces frequency of conflicts in Hot Standby.</li>

<li>Relax locking during GetCurrentVirtualXIDs(). Earlier improvements to handling of btree delete records mean that all snapshot conflicts on standby now have a valid, useful latestRemovedXid. Our earlier approach using LW_EXCLUSIVE was useful when we didnt always have a valid value, though is no longer useful or necessary. Asserts added to code path to prove and ensure this is the case. This will reduce contention and improve performance of larger Hot Standby servers.</li>

<li>In pgsql/src/backend/commands/vacuumlazy.c, only send cleanup_info messages if VACUUM removes any tuples. There is no other purpose for this message type than to report the latestRemovedXid of removed tuples, prior to index scans. Removes overlooked path for sending invalid latestRemovedXid. Fixes buildfarm failure on centaur.</li>

<li>Further reductions in Hot Standby conflict processing. These come from the realistion that HEAP2_CLEAN records don't always remove user visible data, so conflict processing for them can be skipped. Confirm validity using Assert checks, clarify circumstances under which we log heap_cleanup_info records. Tuning arises from bug fixing of earlier safety check failures.</li>

<li>Optimise btree delete processing when no active backends. Clarify comments, downgrade a message to DEBUG and remove some debug counters. Direct from ideas by Heikki Linnakangas.</li>

<li>Make CheckRequiredParameterValues() depend upon correct combination of parameters. Fix bug report by Robert Haas that error message and hint was incorrect if wrong mode parameters specified on master. Internal changes only. Proposals for parameter simplification on master/primary still under way.</li>

<li>Previous patch revoked following objections.</li>

<li>Add missing optimizer hooks for function cost and number of rows. Closely follow design of other optimizer hooks: if hook exists retrieve value from plugin; if still not set then get from cache.</li>

<li>Patch revoked because of objections.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Update docs as to when WAL logging can be skipped. In 8.4 and prior, WAL-logging could potentially be skipped whenever archive_mode=off. With streaming replication, this is now true only if max_wal_senders=0. Fujii Masao, with light copyediting by me.</li>

<li>Rename standby_keep_segments to wal_keep_segments. Also, make the name of the GUC and the name of the backing variable match. Alnong the way, clean up a couple of slight typographical errors in the related docs.</li>

<li>Fix various instances of "the the". Two of these were pointed out by Erik Rijkers; the rest I found.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/pg_locale.c, fix encoding issue when lc_monetary or lc_numeric are different encoding from lc_ctype, that could happen on Windows. We need to change lc_ctype together with lc_monetary or lc_numeric, and convert strings in lconv from lc_ctype encoding to the database encoding. The bug reported by Mikko, original patch by Hiroshi Inoue, with changes by Bruce and me.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/misc/guc.c, fix message punctuation.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/pg_locale.c, add C comments for recent to_char('L') fix for Win32.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Simon Riggs's patch to speed up ALTER TABLE...SET TABLESPACE. Timing is not right for 9.0.</li>

<li>Nikhil Sontakke's patch to estimate the costs of SRFs.</li>

<li>Simon Riggs's patch to make the "ALL" in GRANT ... ON ALL optional.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in a patch to cause walsender not to consume superuser_reserved_connection slots.</li>

<li>Simon Riggs sent in a patch to implement prefetching during replay of btree delete records. The patch is intended to fix a performance issue reported by Erik Rijkers where a Hot Standby slave's performance is much lower than on the master's.</li>

<li>Bruce Momjian sent in a patch per prior discussion to re-order the timestamps displayed in the pg_stat_activity view.</li>

<li>Robert Haas sent in a WIP patch to ush isTemp down into the smgr layer. This is intended to be infrastructure for global temporary tables per the SQL standard.</li>

</ul>