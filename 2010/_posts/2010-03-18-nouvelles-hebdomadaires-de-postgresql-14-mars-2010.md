---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 mars 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-03-18-nouvelles-hebdomadaires-de-postgresql-14-mars-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/hba.c, disallow gssapi authentication on local connections, since it requires a hostname to function. Noted by Zdenek Kotala.</li>

<li>In pgsql/src/interfaces/libpq/fe-auth.c, require hostname to be set when using GSSAPI authentication. Without it, the GSSAPI libraries crash. Noted by Zdenek Kotala.</li>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, add missing space in example. Tim Landscheidt.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/ecpglib/error.c, better test the content of the SQLSTATE string in ecpglib than the pointer.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/error.c, backport fix from HEAD that makes ecpglib give the right SQLSTATE if the connection disappears.</li>

<li>Ecpg now adds a unique counter to its varchar struct definitions to make these definitions unique, too. It used to use the linenumber but in the rare case of two definitions in one line this was not unique.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/command.c, return proper exit code (3) from psql when ON_ERROR_STOP=on and --single-transaction are both used and the failure happens in commit, e.g. failed deferred trigger. Also properly free BEGIN/COMMIT result structures from --single-transaction. Per report from Dominic Bevacqua</li>

<li>In pgsql/doc/src/sgml/config.sgml, remove unnecessary comma in documentation.</li>

<li>In pgsql/doc/src/sgml/config.sgml, re-add comma, oops.</li>

<li>In pgsql/src/timezone/zic.c, small adjustment by pgindent.</li>

<li>In pgsql/src/backend/tsearch/wparser_def.c, allow underscores in tsearch email addressses, per RFC 5322 and report by Dan O'Hara. Patch by Teodor Sigaev</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, document what user name email symbols are supported by tsearch.</li>

<li>Add libpq warning message if the .pgpass-retrieved password fails. Add ERRCODE_INVALID_PASSWORD sqlstate error code.</li>

<li>In pgsql/src/backend/libpq/pqcomm.c, move TCP keepalive macro definition. Jaime Casanova</li>

<li>In pgsql/src/backend/libpq/pqcomm.c, move more tcp keepalive macros to be consistent.</li>

<li>In pgsql/src/backend/libpq/pqcomm.c, revert all keepalive moves, reevaluate.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plperl/plperl.c, add checks for valid encoding of query strings passed to SPI by plperl.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2010e: DST law changes in Fiji, Samoa, Chile; corrections to recent changes in Paraguay and Bangladesh.</li>

<li>Improve PL/Perl documentation of database access functions. (Backpatch to 8.4 of a patch previously applied by Bruce Momjian to CVS HEAD) Alexey Klyukin.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plperl/plperl.c, use SvROK(sv) rather than directly checking SvTYPE(sv) == SVt_RV in plperl. The latter is considered unwarranted chumminess with the implementation, and can lead to crashes with recent Perl versions. Report and fix by Tim Bunce. Back-patch to all versions containing the questionable coding pattern.</li>

<li>Preliminary release notes for releases 8.4.3, 8.3.10, 8.2.16, 8.1.20, 8.0.24, 7.4.28.</li>

<li>In pgsql/src/include/catalog/pg_constraint.h, update comment for pg_constraint.conindid to mention that it's used for exclusion constraints. Not sure how we managed to update the comment for it in catalogs.sgml but miss this one.</li>

<li>Simplify a couple of pg_dump and psql \d queries about index constraints by joining to pg_constraint.conindid, instead of the former technique of joining indirectly through pg_depend. This is much more straightforward and probably faster as well. I had originally desisted from changing these queries when conindid was added because I was worried about losing performance, but if we join on conrelid as well as conindid then the index on conrelid can be used when pg_constraint is large.</li>

<li>In pgsql/src/bin/psql/describe.c, modify psql's \d printout to fold exclusion constraints in with regular indexes, rather than printing them twice. Per my gripe when the exclusion constraint feature was committed.</li>

<li>In pgsql/src/backend/access/common/reloptions.c, add missing reset of need_initialization in reloptions code. This resulted in useless extra work during every call of parseRelOptions, but no bad effects other than that. Noted by Alvaro Herrera.</li>

<li>In pgsql/src/timezone/pgtz.c, fix a commented-out block of code that pgindent didn't understand properly; it's been making that comment uglier with each run.</li>

<li>In pgsql/src/backend/postmaster/pgstat.c, add some logging code for unexpected cases, particularly being unable to read a stats file for reasons other than ENOENT, and having to reset last_statrequest because it's later than current time in the collector. Not clear if this will shed any light on the "pgstat wait timeout" business, but it seems like a good idea in general. In passing, do some message-style-police work on recently-added pgstat_reset_shared_counters code.</li>

<li>Update oidjoins regression test for 9.0.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>pg_start_backup() can use a share lock to lock ControlFileLock instead of an exclusive lock. The change is almost for code cleanup. Since there seems to be no performance benefits from it, backports should not be needed. Fujii Masao</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/tablecmds.c, fix incorrect comment about permissions checking being done in utility.c. Noted while reviewing a patch from KaiGai Kohei.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/ipc/standby.c, fix comment which was apparently copy-pasted from another function.</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, fix bug in KnownAssignedXidsMany(). I saw this when looking at the assertion failure reported by Erik Rijkers, but this alone doesn't explain the failure.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag 8.4.3, 8.3.10, 8.2.16, 8.1.20, 8.0.24, and 7.4.28.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/runtime.sgml, update shared memory configuration information for Linux In particular, the assertion that shmall is sufficiently sized by default is slowly becoming untrue.</li>

<li>In pgsql/doc/src/sgml/plpython.sgml, add some more structure and bits of information to PL/Python documentation</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Dag-Erling Smorgrav's patch to address build issues on Windows XP with the MinGW toolkit. The actual fix will be to de-support --disable-shared.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in a patch which adds a new function pg_last_checkpoint_start_location() that reports the XLOG location where the last checkpoint or restartpoint started, i.e. the REDO starting location.</li>

<li>Pavel Stehule sent in two revisions of a patch for 9.1 which adds a some string functions including format(), sprintf() and concat_*().</li>

<li>Fujii Masao sent in a patch which makes it possible to interrupt walreceiver on win32.</li>

<li>KaiGai Kohei sent in another revision of the patch to disallow renaming system-initialized objects such as the "columns" in sequences.</li>

</ul>