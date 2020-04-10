---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 avril 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-04-23-nouvelles-hebdomadaires-de-postgresql-18-avril-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Change the logic to decide when to delete old WAL segments, so that it doesn't take into account how far the WAL senders are. This way a hung WAL sender doesn't prevent old WAL segments from being recycled/removed in the primary, ultimately causing the disk to fill up. Instead add standby_keep_segments setting to control how many old WAL segments are kept in the primary. This also makes it more reliable to use streaming replication without WAL archiving, assuming that you set standby_keep_segments high enough.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, adjust paragraph about monitoring streaming replication, now that we have standby_keep_segments.</li>

<li>In pgsql/src/backend/replication/walsender.c, need to use the start pointer of a block we read from WAL segment in the calculation, not the end pointer, as pointed out by Fujii Masao.</li>

<li>Update the location of last removed WAL segment in shared memory only after actually removing one, so that if we can't remove segments because WAL archiving is lagging behind, we don't unnecessarily forbid streaming the old not-yet-archived segments that are still perfectly valid. Per suggestion from Fujii Masao.</li>

<li>Allow Hot Standby to begin from a shutdown checkpoint. Patch by Simon Riggs &amp; me.</li>

<li>In pgsql/doc/src/sgml/config.sgml, fix typo, spotted by Erik Rijkers.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, in standby mode, suppress repeated LOG messages about a corrupt record, which just indicates that we've reached the end of valid WAL found in the standby.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, on Windows, syslogger runs in two threads. The main thread processes config reload and rotation signals, and a helper thread reads messages from the pipe and writes them to the log file. However, server code isn't generally thread-safe, so if both try to do e.g palloc()/pfree() at the same time, bad things will happen. To fix that, use a critical section (which is like a mutex) to enforce that only one the threads are active at a time.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, spell out full archive directory specification in 'test -f' continuous archiving example, per suggestion from Greg Smith.</li>

<li>In pgsql/doc/src/sgml/config.sgml, remove example of archive_command from configure section; instead have users look at the referenced section for examples, per idea from Greg Smith.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, add "SSD" acronym mention for solid state drive mention.</li>

<li>In pgsql/doc/src/sgml/xtypes.sgml, doc change: anyways -&gt; anyway; Erik Rijkers</li>

<li>In pgsql/src/backend/access/transam/xlog.c, doc change: effect -&gt; affect, per Robert Haas.</li>

<li>Document that autovacuum cannot vacuum or analyze temporary tables.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/walreceiver.c, only try to do a graceful disconnect if we've successfully loaded the shared library with the disconnect function in it. Fixes segmentation fault reported by Jeff Davis. Fujii Masao.</li>

<li>In pgsql/doc/src/sgml/config.sgml, fix typo. Fujii Masao.</li>

<li>Add script to enumerate the timezones in the Windows registry and compare it with the list we have in pgtz.c, showing any differences.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, fix minor typo in comment in xlog.c.</li>

<li>Tune GetSnapshotData() during Hot Standby by avoiding loop through normal backends. Makes code clearer also, since we avoid various Assert()s. Performance of snapshots taken during recovery no longer depends upon number of read-only backends.</li>

<li>Remove some additional changes in previous commit that belong elsewhere.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, improve sequence and sense of messages from pg_stop_backup(). Now doesn't report it is waiting until it actually is waiting, plus message doesn't appear until at least 5 seconds wait, so we avoid reporting the wait before we've given the archiver a reasonable time to wake up and archive the file we just created earlier in the function. Also add new unconditional message to confirm safe completion. Now a normal, healthy execution does not report waiting at all, just safe completion.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/gist/README, typo fix. Kevin Grittner.</li>

<li>In pgsql/doc/src/sgml/config.sgml, provide better guidance for adjusting shared_buffers.</li>

<li>Provide better guidance for adjusting shared_buffers. This change was previously committed to HEAD, but the consensus seems to be in favor of back-patching it. I'm only backpatching as far as 8.3.X, however, because it's not clear to me to what degree this advice applies to older branches, and in any case our first advice to anyone attempting to tune those versions is likely to be "upgrade".</li>

<li>Add an 'enable_material' GUC. The logic for determining whether to materialize has been significantly overhauled for 9.0. In case there should be any doubt about whether materialization is a win in any particular case, this should provide a convenient way of seeing what happens without it; but even with enable_material turned off, we still materialize in cases where it is required for correctness. Thanks to Tom Lane for the review.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/cache/relcache.c, fix a problem introduced by my patch of 2010-01-12 that revised the way relcache reload works. In the patched code, a relcache entry in process of being rebuilt doesn't get unhooked from the relcache hash table; which means that if a cache flush occurs due to sinval queue overrun while we're rebuilding it, the entry could get blown away by RelationCacheInvalidate, resulting in crash or misbehavior. Fix by ensuring that an entry being rebuilt has positive refcount, so it won't be seen as a target for removal if a cache flush occurs. (This will mean that the entry gets rebuilt twice in such a scenario, but that's okay.) It appears that the problem can only arise within a transaction that has previously reassigned the relfilenode of a pre-existing table, via TRUNCATE or a similar operation. Per bug #5412 from Rusty Conover. Back-patch to 8.2, same as the patch that introduced the problem. I think that the failure can't actually occur in 8.2, since it lacks the rd_newRelfilenodeSubid optimization, but let's make it work like the later branches anyway. Patch by Heikki Linnakangas, slightly editorialized on by me.</li>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, fix plpgsql's exec_eval_expr() to ensure it returns a sane type OID even when the expression is a query that returns no rows. So far as I can tell, the only caller that actually fails when a garbage OID is returned is exec_stmt_case(), which is new in 8.4 --- in all other cases, we might make a useless trip through casting logic, but we won't fail since the isnull flag will be set. Hence, backpatch only to 8.4, just in case there are apps out there that aren't expecting an error to be thrown if the query returns more or less than one column. (Which seems unlikely, since the error would be thrown if the query ever did return a row; but it's possible there's some never-exercised code out there.) Per report from Mario Splivalo.</li>

<li>In pgsql/src/timezone/pgtz.c, improve message style for messages associated with not being able to identify the system time zone setting. Per recent discussion.</li>

<li>In pgsql/src/bin/psql/copy.c, fix psql's \copy to not insert spaces around dots and commas in the text of the SELECT query in \copy (SELECT ...) commands. This is unnecessary and breaks numeric literals, as seen in bug #5411 from Vitalii Tymchyshyn. This change has already been made in passing in HEAD; backpatch to 8.2 through 8.4 (earlier releases don't have COPY (SELECT ...) at all).</li>

<li>In pgsql/src/pl/plperl/plperl.c, fix bogus order of cleanup steps in plperl_inline_handler. Per Alex Hunsaker.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/catalog/sql_features.txt, update XML features list.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, IP port -&gt; TCP port. Backpatched to 8.1, where this first appeared.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, improve punctuation.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in a patch which fixes an issue with smart shutdown.</li>

<li>Fujii Masao and Magnus Hagander traded patches to fix the issue where walreceiver is uninterruptible on win32.</li>

<li>Heikki Linnakangas sent in a patch to fix an issue with error messages in WALs for streaming replication.</li>

<li>Heikki Linnakangas and Simon Riggs sent one and three patches, respectively, intended to deal with the issue where queries on a hot standby server are much slower that ones on the origin.</li>

<li>Tom Lane sent in a patch to fix an issue where Windows time zone files are not updated as frequently as they need to be, causing odd failure cases.</li>

</ul>