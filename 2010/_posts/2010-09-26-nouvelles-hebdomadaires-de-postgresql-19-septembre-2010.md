---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 septembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-09-26-nouvelles-hebdomadaires-de-postgresql-19-septembre-2010 "
---



<p><strong>Revues</strong></p>

<p>- Abhijit Menon-Sen reviewed the "Our CLUSTER implementation is pessimal" patch and found two chunks that did not apply cleanly, along with some possible bit rot on copy_heap_data().</p>

<p>- KaiGai Kohei reviewed Peter Eisentraut's patch to extend ALTER TYPE.</p>

<p>- ITAGAKI Takahiro reviewed the SQL/MED(FDW) patch and found some unused new types, a missing error check, a place to improve an error message, and some places to improve consistency in type checks between TABLE and FOREIGN TABLE.</p>

<p>- Tom Lane reviewed Sushant Sinha's url-part extention for text search.</p>

<p>- Hitoshi Harada reviewed Pavel Stehule's WIP patch for median() and percentile(), and found that it left out changes to contrib, had some cosmetic coding style issues, has a possible new out-of-memory condition due to the extra tuplesorts added, contained neither documentation nor new regression tests, doesn't work in windowing function context.</p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/init/postinit.c, process options from the startup packed in walsender. Only few options make sense for walsender, but for example application_name and client_encoding do. We still don't apply per-role settings from pg_db_role_setting, because that would require connecting to a database to read the table. Fujii Masao</li>

<li>In pgsql/src/include/replication/walreceiver.h, remove prototype for non-existent function from walreceiver.h. Tidy up by separating prototypes for functions in walreceiver.c and walreceiverfuncs.c with comments.</li>

<li>In pgsql/src/backend/port/unix_latch.c, add a comment noting that the owner_pid test in OwnLatch is just a sanity check, per request by Jeff Davis.</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, don't warn about an in-progress online backup, when we're recovering from an online backup instead of performing one. pg_ctl can detect that by checking if recovery.conf exists. Backup label file is renamed away early in recovery, so the window where backup label exists during recovery is normally very small, but you can run into it e.g if restore_command is set incorrectly and the startup process never finds even the first WAL segment containing the checkpoint record to start recovery from. Fujii Masao with comments by me.</li>

<li>In pgsql/src/backend/replication/walsender.c, oops, the timeout argument to WaitLatchOrSocket is in microseconds, not milliseconds.</li>

<li>In pgsql/src/backend/replication/walsender.c, don't call OwnLatch while holding a spinlock. OwnLatch can elog() under some "can't happen" scenarios, and spinlocks should only be held for a few instructions anyway. As pointed out by Fujii Masao.</li>

<li>Simplify Windows implementation of latches. There's no need to keep a dynamic pool of event handles, we can permanently assign one for each shared latch. Thanks to that, we no longer need a separate shared memory block for latches, and we don't need to know in advance how many shared latches there is, so you no longer need to remember to update NumSharedLatches when you introduce a new latch to the system.</li>

<li>Use a latch to make startup process wake up and replay immediately when new WAL arrives via streaming replication. This reduces the latency, and also allows us to use a longer polling interval, which is good for energy efficiency. We still need to poll to check for the appearance of a trigger file, but the interval is now 5 seconds (instead of 100ms), like when waiting for a new WAL segment to appear in WAL archive.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, fix two typos in comments, spotted by Fujii Masao and Thom Brown.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/catalogs.sgml, elaborate on what gets stored in pg_authid.rolpasswd. Also, add cross-reference from pg_shadow.passwd to pg_authid.rolpasswd and fix a bit of markup I muffed in my previous commit. Per discussion with Josh Kupershmidt.</li>

<li>In pgsql/src/backend/commands/comment.c, remove duplicated code left behind by my recent refactoring of comment.c. These checks are also present in objectaddress.c, so there's no need to recheck here.</li>

<li>In pgsql/doc/src/sgml/catalogs.sgml, move pg_db_role_setting docs to correct place in alphabetical order.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix join-removal logic for pseudoconstant and outerjoin-delayed quals. In these cases a qual can get marked with the removable rel in its required_relids, but this is just to schedule its evaluation correctly, not because it really depends on the rel. We were assuming that, in effect, we could throw away *all* quals so marked, which is nonsense. Tighten up the logic to be a little more paranoid about which quals belong to the outer join being considered for removal, and arrange for all quals that don't belong to be updated so they will still get evaluated correctly. Also fix another problem that happened to be exposed by this test case, which was that make_join_rel() was failing to notice some cases where a constant-false qual could be used to prove a join relation empty. If it's a pushed-down constant false, then the relation is empty even if it's an outer join, because the qual applies after the outer join expansion. Per report from Nathan Grange. Back-patch into 9.0.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, add a compatibility note about plpgsql's treatment of SELECT INTO rec.fld when fld is of composite type. Per discussion of bug #5644 from Valentine Gogichashvili.</li>

<li>Fix two new-in-9.0 bugs in hstore. There was an incorrect Assert in hstoreValidOldFormat(), which would cause immediate core dumps when attempting to work with pre-9.0 hstore data, but of course only in an assert-enabled build. Also, ghstore_decompress() incorrectly applied DatumGetHStoreP() to a datum that wasn't actually an hstore, but rather a ghstore (ie, a gist signature bitstring). That used to be harmless, but could now result in misbehavior if the hstore format conversion code happened to trigger. In reality, since ghstore is not marked toastable (and doesn't need to be), this function is useless anyway; we can lobotomize it down to returning the passed-in pointer. Both bugs found by Andrew Gierth, though this isn't exactly his proposed patch.</li>

<li>In pgsql/doc/src/sgml/plpgsql.sgml, fix bad grammar.</li>

<li>Stamp 9.0 release notes with expected release date; also some last-minute copy-editing.</li>

<li>In pgsql/src/backend/access/transam/README, add some documentation about how we WAL-log filesystem actions. Per a question from Robert Haas.</li>

<li>In pgsql/src/backend/parser/analyze.c, give a suitable HINT when an INSERT's data source is a RowExpr containing the same number of columns expected by the insert. This suggests that there were extra parentheses that converted the intended column list into a row expression. Original patch by Marko Tiikkaja, rather heavily editorialized by me.</li>

<li>In pgsql/src/backend/commands/copy.c, make sure we wait for protocol-level EOF when ending binary COPY IN. The previous coding just terminated the COPY immediately after seeing the EOF marker (-1 where a row field count is expected). The expected CopyDone or CopyFail message just got thrown away later, since we weren't in COPY mode anymore. This behavior complicated matters for the JDBC driver, and arguably was the wrong thing in any case since a CopyFail message after the marker wouldn't be honored. Note that there is a behavioral change here: extra data after the EOF marker was silently ignored before, but now it will cause an error. Hence not back-patching, although this is arguably a bug. Per report and patch by Kris Jurka.</li>

<li>Fix several broken $PostgreSQL$ keywords. Noted while experimenting with Magnus's script to remove these.</li>

<li>In pgsql/src/backend/utils/mb/Unicode/UCS_to_GB18030.pl, replace last remaining $Id$ with $PostgreSQL$.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Translation updates for 9.0.0.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster/postmaster.c, treat exit code 128 (ERROR_WAIT_NO_CHILDREN) as non-fatal on Win32, since it can happen when a process fails to start when the system is under high load. Per several bug reports and many peoples investigation. Back-patch to 8.4, which is as far back as the "deadman-switch" for shared memory access exists.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag v9.0.0 ... the big day approaches.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/heap/README.HOT, update HOT README about when single-page vacuums happen.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Teodor Sigaev sent in another revision of the patches to add K-Nearest-Neighbor support to GiST indexes.</li>

<li>Heikki Linnakangas sent in two revisions of a patch using the new latch facility to reduce walreceiver latency.</li>

<li>Hitoshi Harada sent in two revisions of a patch to allow top-level DML (INSERT, UPDATE, DELETE) in CTEs (WITH queries).</li>

<li>KaiGai Kohei sent in another revision of the security label patch.</li>

<li>Kevin Grittner sent in another revision of the patch to do serializable snapshot isolation.</li>

<li>Bernd Helmle sent in another revision of the patch to fix a mismatch between ALTER TABLE ... ALTER COLUMN and table inheritance.</li>

<li>Fujii Masao sent in two more revisions of the synchronous replication patch.</li>

<li>ITAGAKI Takahiro sent in a patch, inspired by Joseph Adams's Google Summer of Code work, to add JSON. Joseph Adams sent in a patch based on it.</li>

<li>SAKAMOTO Masahiko sent in three revisions of a patch to add FDW (foreign data wrapper) support, which is part of SQL/MED (Management of External Data).</li>

<li>Peter Eisentraut sent in another WIP patch to implement per-column collation.</li>

<li>Fujii Masao sent in a patch to adjust signal handling during recovery.</li>

<li>Fujii Masao sent in two revisions of a patch to add a user-callable function to trigger failover in replication.</li>

<li>Simon Riggs sent in a WIP patch which uses latches to adjust behavior of the startup process.</li>

<li>Peter Eisentraut sent in another revision of the patch to extend ALTER TYPE for composite types.</li>

<li>Fujii Masao sent in a patch to add a new function to libpq which is used to send an ACK back from walreceiver.</li>

<li>Kevin Grittner sent in another revision of the patch to do serializable row locks.</li>

<li>Robert Haas sent in a patch to add a pg_opfamily_is_visible() function.</li>

</ul>