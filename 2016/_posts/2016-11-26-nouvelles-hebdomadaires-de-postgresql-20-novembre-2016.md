---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 novembre 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/11/26/Nouvelles-hebdomadaires-de-PostgreSQL-20-novembre-2016"
---


<p>Le nouveau magazine PostgreSQL est disponible&nbsp;! <a target="_blank" href="http://www.pgmag.org/">http://www.pgmag.org/</a></p>

<p>La <em>PGconf.ASIA 2016</em> aura lieu les 1, 2 &amp; 3 d&eacute;cembre &agrave; Tokyo (Japon). Les inscriptions sont ouvertes. Il y aura une <em>UnConference</em> le 1er d&eacute;cembre avec une inscription s&eacute;par&eacute;e et requise&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/registration/">http://www.pgconf.asia/EN/registration/</a> <a target="_blank" href="http://www.pgconf.asia/EN/day-0/">http://www.pgconf.asia/EN/day-0/</a></p>

<p>La <em>PGConf India 2017</em> aura lieu les 2 &amp; 3 mars 2017 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde). Les propositions sont attendues sur &lt;papers AT pgconf DOT in&gt; jusqu'au 31 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgpool-II 3.6 beta1&nbsp;: <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Developer_releases">http://pgpool.net/mediawiki/index.php/Developer_releases</a></li>

<li><em>Amazon RDS</em> propose PostgreSQL 9.6.1&nbsp;: <a target="_blank" href="https://aws.amazon.com/rds/postgresql/">https://aws.amazon.com/rds/postgresql/</a></li>

<li>pg_squeeze 1.0 beta1, un outil pour automatiser le nettoyage&nbsp;: <a target="_blank" href="http://www.cybertec.at/en/products/pg_squeeze-postgresql-extension-to-auto-rebuild-bloated-tables/">http://www.cybertec.at/en/products/pg_squeeze-postgresql-extension-to-auto-rebuild-bloated-tables/</a></li>

<li>DB Doc 3.2, un outil automatique de documentation des sch&eacute;mas de bases de donn&eacute;es PostgreSQL pour Windows&nbsp;: <a target="_blank" href="http://www.yohz.com/dbdoc_details.htm">http://www.yohz.com/dbdoc_details.htm</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en novembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-11/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>CHAR(16) aura lieu &agrave; New York le 6 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://charconference.org/">http://charconference.org/</a></li>

<li>Le PGDay.IT 2016 aura lieu &agrave; Prato le 13 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>PostgreSQL@SCaLE aura lieu les 2 &amp; 3 mars 2017 au centre des conventions de Pasadena, comme partie du SCaLE 15X. L'appel &agrave; conf&eacute;renciers court jusqu'au 15 novembre 2016&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/15x/cfp">http://www.socallinuxexpo.org/scale/15x/cfp</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20161120225904.GB23469@fetter.org">http://www.postgresql.org/message-id/20161120225904.GB23469@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Fix duplication in ALTER MATERIALIZE VIEW synopsis. Commit 3c4cf080879b should have removed SET TABLESPACE from the synopsis of ALTER MATERIALIZE VIEW as a possible "action" when it added a separate line for it in the main command listing, but failed to. Repair. Backpatch to 9.4, like the aforementioned commit. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ce4f597abc530b3b59bcf3a3964f31e50054bcd">http://git.postgresql.org/pg/commitdiff/8ce4f597abc530b3b59bcf3a3964f31e50054bcd</a></li>

<li>Avoid pin scan for replay of XLOG_BTREE_VACUUM in all cases Replay of XLOG_BTREE_VACUUM during Hot Standby was previously thought to require complex interlocking that matched the requirements on the master. This required an O(N) operation that became a significant problem with large indexes, causing replication delays of seconds or in some cases minutes while the XLOG_BTREE_VACUUM was replayed. This commit skips the &acirc;&euro;&oelig;pin scan&acirc;&euro; that was previously required, by observing in detail when and how it is safe to do so, with full documentation. The pin scan is skipped only in replay; the VACUUM code path on master is not touched here. No tests included. Manual tests using an additional patch to view WAL records and their timing have shown the change in WAL records and their handling has successfully reduced replication delay. This is a back-patch of commits 687f2cd7a015, 3e4b7d87988f, b60284261375 by Simon Riggs, to branches 9.4 and 9.5. No further backpatch is possible because this depends on catalog scans being MVCC. I (&Atilde;lvaro) additionally updated a slight problem in the README, which explains why this touches the 9.6 and master branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f65b94f63962e9f7e144a469bc1750286ddaee27">http://git.postgresql.org/pg/commitdiff/f65b94f63962e9f7e144a469bc1750286ddaee27</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Allow individual TAP tests to be run via PROVE_TESTS. Add a new optional Makefile variable PROVE_TESTS that, if passed as a space-separated list of paths relative to the Makefile invoking $(prove_check) or $(prove_installcheck), runs just those tests instead of t/*.pl . From: Craig Ringer &lt;craig@2ndquadrant.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ca7b0bf016364c74d38f66c7050be915bfea908">http://git.postgresql.org/pg/commitdiff/9ca7b0bf016364c74d38f66c7050be915bfea908</a></li>

<li>Build HTML documentation using XSLT stylesheets by default. The old DSSSL build is still available for a while using the make target "oldhtml". <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e36ddab11735052841b4eff96642187ec9a8a7bc">http://git.postgresql.org/pg/commitdiff/e36ddab11735052841b4eff96642187ec9a8a7bc</a></li>

<li>doc: Further XSLT HTML build performance optimization. Cut out some expensive stuff from the HTML head element that we don't really need. This was previously discussed as part of e8306745e3504c642f7abad411139d5630e29fac, but ended up separate because it changes the output contents slightly. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/380895f2deb18ed9e7a8be69961af2ed221ba9d3">http://git.postgresql.org/pg/commitdiff/380895f2deb18ed9e7a8be69961af2ed221ba9d3</a></li>

<li>Add pg_sequences view. Like pg_tables, pg_views, and others, this view contains information about sequences in a way that is independent of the system catalog layout but more comprehensive than the information schema. To help implement the view, add a new internal function pg_sequence_last_value() to return the last value of a sequence. This is kept separate from pg_sequence_parameters() to separate querying run-time state from catalog-like information. Reviewed-by: Andreas Karlsson &lt;andreas@proxel.se&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67dc4ccbb2e1c27da823eced66d9217a5652cbb0">http://git.postgresql.org/pg/commitdiff/67dc4ccbb2e1c27da823eced66d9217a5652cbb0</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typo in comment. The function was renamed in 908e23473, but the comment never learned about it. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c99f876e9a1e2a9a04d02a8aaf046cd9125e9264">http://git.postgresql.org/pg/commitdiff/c99f876e9a1e2a9a04d02a8aaf046cd9125e9264</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Provide NO_INSTALLCHECK option for pgxs. This allows us to avoid running the regression tests in contrib modules like pg_stat_statement in a less ugly manner. Discussion: &lt;22432.1478968242@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffa8c3d8521bbd7c6da497264f1a12572a1ff713">http://git.postgresql.org/pg/commitdiff/ffa8c3d8521bbd7c6da497264f1a12572a1ff713</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>pgbench: Increase maximum size of log filename from 64 to MAXPGPATH. Commit 41124a91e61fc6d9681c1e8b15ba30494e84d643 allowed the transaction log file prefix to be changed but left in place the existing 64-character limit on the total length of a log file name. It's possible that could be inconvenient for somebody, so increase the limit to MAXPGPATH, which ought to be enough for anybody. Per a suggestion from Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56eba9b8a1120c861868dd3d86d927a9e3182880">http://git.postgresql.org/pg/commitdiff/56eba9b8a1120c861868dd3d86d927a9e3182880</a></li>

<li>Fix broken statement in UCS_to_most.pl. This has been wrong for a very long time, and it's puzzling to me how it ever worked for anyone. Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00c6d8077f39191a6f61a847ce7d55073d8f5a6f">http://git.postgresql.org/pg/commitdiff/00c6d8077f39191a6f61a847ce7d55073d8f5a6f</a></li>

<li>Limit the number of number of tapes used for a sort to 501. Gigantic numbers of tapes don't work out well. Original patch by Peter Geoghegan; comments entirely rewritten by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc19c1801bd2dbee1043b0c0b62e07747d30ea1c">http://git.postgresql.org/pg/commitdiff/fc19c1801bd2dbee1043b0c0b62e07747d30ea1c</a></li>

<li>Reserve zero as an invalid DSM handle. Previously, the handle for the control segment could not be zero, but some other DSM segment could potentially have a handle value of zero. However, that means that if someone wanted to store a dsm_handle that might or might not be valid, they would need a separate boolean to keep track of whether the associated value is legal. That's annoying, so change things so that no DSM segment can ever have a handle of 0 - or as we call it here, DSM_HANDLE_INVALID. Thomas Munro. This was submitted as part of a much larger patch to add an malloc-like allocator for dynamic shared memory, but this part seems like a good idea independently of the rest of the patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b40b4dd9e10ea701c8d47ccba9407fc32ed384e5">http://git.postgresql.org/pg/commitdiff/b40b4dd9e10ea701c8d47ccba9407fc32ed384e5</a></li>

<li>Remove or reduce verbosity of some debug messages. The debug messages that merely print StartTransactionCommand, CommitTransactionCommand, ProcessUtilty, or ProcessQuery with no additional details seem to be useless. Get rid of them. The transaction status messages produced by ShowTransactionState are occasionally useful, but they are extremely verbose, producing multiple lines of log output every time they fire, which can happens multiple times per transaction. So, reduce the level to DEBUG5; avoid emitting an extra line just to explain which debug point is at issue; and tighten up the rest of the message so it doesn't use quite so much horizontal space. With these changes, it's possible to run a somewhat busy system with a log level even as high as DEBUG4, whereas previously anything above DEBUG2 would flood the log with output that probably wasn't really all that useful. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a43f1939d5dcd02f4df1604a68392332168e4be0">http://git.postgresql.org/pg/commitdiff/a43f1939d5dcd02f4df1604a68392332168e4be0</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Account for catalog snapshot in PGXACT-&gt;xmin updates. The CatalogSnapshot was not plugged into SnapshotResetXmin()'s accounting for whether MyPgXact-&gt;xmin could be cleared or advanced. In normal transactions this was masked by the fact that the transaction snapshot would be older, but during backend startup and certain utility commands it was possible to re-use the CatalogSnapshot after MyPgXact-&gt;xmin had been cleared, meaning that recently-deleted rows could be pruned even though this snapshot could still see them, causing unexpected catalog lookup failures. This effect appears to be the explanation for a recent failure on buildfarm member piculet. To fix, add the CatalogSnapshot to the RegisteredSnapshots heap whenever it is valid. In the previous logic, it was possible for the CatalogSnapshot to remain valid across waits for client input, but with this change that would mean it delays advance of global xmin in cases where it did not before. To avoid possibly causing new table-bloat problems with clients that sit idle for long intervals, add code to invalidate the CatalogSnapshot before waiting for client input. (When the backend is busy, it's unlikely that the CatalogSnapshot would be the oldest snap for very long, so we don't worry about forcing early invalidation of it otherwise.) In passing, remove the CatalogSnapshotStale flag in favor of using "CatalogSnapshot != NULL" to represent validity, as we do for the other special snapshots in snapmgr.c. And improve some obsolete comments. No regression test because I don't know a deterministic way to cause this failure. But the stress test shown in the original discussion provokes "cache lookup failed for relation 1255" within a few dozen seconds for me. Back-patch to 9.4 where MVCC catalog scans were introduced. (Note: it's quite easy to produce similar failures with the same test case in branches before 9.4. But MVCC catalog scans were supposed to fix that.) Discussion: &lt;16447.1478818294@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffaa44cb559db332baeee7d25dedd74a61974203">http://git.postgresql.org/pg/commitdiff/ffaa44cb559db332baeee7d25dedd74a61974203</a></li>

<li>Allow DOS-style line endings in ~/.pgpass files. On Windows, libc will mask \r\n line endings for us, since we read the password file in text mode. But that doesn't happen on Unix. People who share password files across both systems might have \r\n line endings in a file they use on Unix, so as a convenience, ignore trailing \r. Per gripe from Josh Berkus. In passing, put the existing check for empty line somewhere where it's actually useful, ie after stripping the newline not before. Vik Fearing, adjusted a bit by me Discussion: &lt;0de37763-5843-b2cc-855e-5d0e5df25807@agliodbs.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a7481930c788e9d74a154aac0c8b401fc6a81f9">http://git.postgresql.org/pg/commitdiff/0a7481930c788e9d74a154aac0c8b401fc6a81f9</a></li>

<li>Check that result tupdesc has exactly 1 column in return_next scalar case. This should always be true, but since we're relying on a tuple descriptor passed from outside pltcl itself, let's check. Per a gripe from Coverity. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ecd1974377ffb4d6d72874ba14fcd23965b1792">http://git.postgresql.org/pg/commitdiff/4ecd1974377ffb4d6d72874ba14fcd23965b1792</a></li>

<li>Re-pgindent src/bin/pg_dump/* Cleanup for recent patches --- it's not much change, but I got annoyed while re-indenting the view-rule fix I'm working on. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcf70e0dbca1432959be5f3557acd546d639c9ba">http://git.postgresql.org/pg/commitdiff/fcf70e0dbca1432959be5f3557acd546d639c9ba</a></li>

<li>Improve pg_dump/pg_restore --create --if-exists logic. Teach it not to complain if the dropStmt attached to an archive entry is actually spelled CREATE OR REPLACE VIEW, since that will happen due to an upcoming bug fix. Also, if it doesn't recognize a dropStmt, have it print a WARNING and then emit the dropStmt unmodified. That seems like a much saner behavior than Assert'ing or dumping core due to a null-pointer dereference, which is what would happen before :-(. Back-patch to 9.4 where this option was introduced. Discussion: &lt;19092.1479325184@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac888986fc656c0badb0a4918b3581e2ebcb154a">http://git.postgresql.org/pg/commitdiff/ac888986fc656c0badb0a4918b3581e2ebcb154a</a></li>

<li>Fix pg_dump's handling of circular dependencies in views. pg_dump's traditional solution for breaking a circular dependency involving a view was to create the view with CREATE TABLE and then later issue CREATE RULE "_RETURN" ... to convert the table to a view, relying on the backend's very very ancient code that supports making views that way. We've wanted to get rid of that kluge for a long time, but the thing that finally motivates doing something about it is the recognition that this method fails with the --clean option, because it leads to issuing DROP RULE "_RETURN" followed by DROP TABLE --- and the backend won't let you drop a view's _RETURN rule. Instead, let's break circular dependencies by initially creating the view using CREATE VIEW AS SELECT NULL::columntype AS columnname, ... (so that it has the right column names and types to support external references, but no dependencies beyond the column data types), and then later dumping the ON SELECT rule using the spelling CREATE OR REPLACE VIEW. This method wasn't available when this code was originally written, but it's been possible since PG 7.3, so it seems fine to start relying on it now. To solve the --clean problem, make the dropStmt for an ON SELECT rule be CREATE OR REPLACE VIEW with the same dummy target list as above. In this way, during the DROP phase, we first reduce the view to have no extra dependencies, and then we can drop it entirely when we've gotten rid of whatever had a circular dependency on it. (Note: this should work adequately well with the --if-exists option, since the CREATE OR REPLACE VIEW will go through whether the view exists or not. It could fail if the view exists with a conflicting column set, but we don't really support --clean against a non-matching database anyway.) This allows cleaning up some other kluges inside pg_dump, notably that we don't need a notion of reloptions attached to a rule anymore. Although this is a bug fix, commit to HEAD only for now. The problem's existed for a long time and we've had relatively few complaints, so it doesn't really seem worth taking risks to fix it in the back branches. We might revisit that choice if no problems emerge. Discussion: &lt;19092.1479325184@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8c05aff56be92dda889abc89e3f3921d1c29c30">http://git.postgresql.org/pg/commitdiff/d8c05aff56be92dda889abc89e3f3921d1c29c30</a></li>

<li>Code review for GUC serialization/deserialization code. The serialization code dumped core for a string-valued GUC whose value is NULL, which is a legal state. The infrastructure isn't capable of transmitting that state exactly, but fortunately, transmitting an empty string instead should be close enough (compare, eg, commit e45e990e4). The code potentially underestimated the space required to format a real-valued variable, both because it made an unwarranted assumption that %g output would never be longer than %e output, and because it didn't count right even for %e format. In practice this would pretty much always be masked by overestimates for other variables, but it's still wrong. Also fix boundary-case error in read_gucstate, incorrect handling of the case where guc_sourcefile is non-NULL but zero length (not clear that can happen, but if it did, this code would get totally confused), and confusingly useless check for a NULL result from read_gucstate. Andreas Seltenreich discovered the core dump; other issues noted while reading nearby code. Back-patch to 9.5 where this code was introduced. Michael Paquier and Tom Lane Discussion: &lt;871sy78wno.fsf@credativ.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13671b4b22ae4bd345c62e7c0b41d717b8a2e19b">http://git.postgresql.org/pg/commitdiff/13671b4b22ae4bd345c62e7c0b41d717b8a2e19b</a></li>

<li>Fix latent costing error in create_merge_append_path. create_merge_append_path should use the path rowcount it just computed, not rel-&gt;tuples, for costing purposes. Those numbers should always be the same at present, but if we ever support parameterized MergeAppend paths (a case this function is otherwise prepared for), the former would be right and the latter wrong. No need for back-patch since the problem is only latent. Ashutosh Bapat Discussion: &lt;CAFjFpRek+cLCnTo24youuGtsq4zRphEB8EUUPjDxZjnL4n4HYQ@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0832f2db68cc43524a240db47d0428cc9525723e">http://git.postgresql.org/pg/commitdiff/0832f2db68cc43524a240db47d0428cc9525723e</a></li>

<li>Prevent multicolumn expansion of "foo.*" in an UPDATE source expression. Because we use transformTargetList() for UPDATE as well as SELECT tlists, the code accidentally tried to expand a "*" reference into several columns. This is nonsensical, because the UPDATE syntax provides exactly one target column to put the value into. The immediate result was that transformUpdateTargetList() got confused and reported "UPDATE target count mismatch --- internal error". It seems better to treat such a reference as a plain whole-row variable, as it would be in other contexts. (This could produce useful results when the target column is of composite type.) Fix by tweaking transformTargetList() to perform *-expansion only conditionally, depending on its exprKind parameter. Back-patch to 9.3. The problem exists further back, but a fix would be much more invasive before that, because transformTargetList() wasn't told what kind of list it was working on. Doesn't seem worth the trouble given the lack of field reports. (I only noticed it because I was checking the code while trying to improve the documentation about how we handle "foo.*".) Discussion: &lt;4308.1479595330@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5f365f3ab21a345b7a109bc0411895536e9fa69">http://git.postgresql.org/pg/commitdiff/c5f365f3ab21a345b7a109bc0411895536e9fa69</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Clean up pg_dump tests, re-enable BLOB testing Add a loop to check that each test covers all of the pg_dump runs. We (I) had been a bit sloppy when adding new runs and not making sure to mark if they should be under like or unlike for each test, this loop makes sure that the test system will complain if any are forgotten in the future. The loop also correctly handles the 'catch all' cases, which are used to avoid running unnecessary specific checks when a single catch-all can be done (eg: a no-acl run should not have any GRANT commands). Also, re-enable the testing of blobs, but use lo_from_bytea() instead of trying to be cute and writing out to a file and then reading it back in with psql, which proved to be difficult for some buildfarm members. This allows us to add support for testing the --no-blobs option which will be getting added shortly, provided the buildfarm doesn't blow up on this. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f91f323b4feef0371cd3db51be3007e44abd5e8">http://git.postgresql.org/pg/commitdiff/8f91f323b4feef0371cd3db51be3007e44abd5e8</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Tomas Vondra sent in another revision of a patch to add two slab-like memory allocators.</p>

<p>Laurenz Albe sent in another revision of a patch to ensure that writes are synced to disk.</p>

<p>Micha&Atilde;&laquo;l Paquier and Robert Haas traded patches to add SCRAM auth with provisions for more types.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to fix a situation where a cascaded standby gets stuck and can't catch up.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to add asynchronous execution.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to rework psql's tab completion system.</p>

<p>Magnus Hagander sent in a patch to add a capability to jsonb_delete to accept an array of keys rather than a singleton one.</p>

<p>Kuntal Ghosh sent in another revision of a patch to add a WAL consistency check facility.</p>

<p>Thomas Munro sent in another revision of a patch to enable SERIALIZABLE isolation mode on standby servers.</p>

<p>Thomas Munro sent in another revision of a patch to create dynamic shared memory areas.</p>

<p>Masahiko Sawada sent in another revision of a patch to enable quorum commit for multiple synchronous standbys.</p>

<p>Craig Ringer sent in two more revisions of a patch to enable logical decoding timeline following.</p>

<p>Andrew Borodin sent in another revision of a patch to implement lazy GiST indexing.</p>

<p>Mark Kirkwood sent in another revision of a patch to switch to the CMake build system.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in three more revisions of a patch to implement \setfileref in psql.</p>

<p>Etsuro Fujita and Ashutosh Bapat traded patches to push down more full joins to FDWs.</p>

<p>Amit Langote sent in three more revisions of a patch to implement declarative partitioning.</p>

<p>Magnus Hagander sent in a patch to log "snapshot too old" conditions.</p>

<p>Laurenz Albe and Tobias Bussmann traded patches to enable parallel prepared statement execution.</p>

<p>Karl O. Pinc and Gilles Darold traded patches to implement pg_current_logfile().</p>

<p>Daniel V&Atilde;&copy;rit&Atilde;&copy; sent in another revision of a patch to add capabilities to psql hooks for variables.</p>

<p>Ramon Lawrence sent in another revision of a patch to implement Gather Merge.</p>

<p>Christian Ullrich sent in another revision of a patch to add putenv support for msvcrt from Visual Studio 2013.</p>

<p>Rahila Syed sent in a patch to fix some issues that can result in an invalid collation error.</p>

<p>Haribabu Kommi sent in another revision of a patch to add a pg_hba_file_settings view.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two more revisions of a patch to fix cleanup of unlogged tables.</p>

<p>Claudio Freire sent in another revision of a patch to enable vacuum to use more than 1GB of work mem.</p>

<p>Craig Ringer sent in a patch to document that perl 5.8.4 or higher is required for TAP tests.</p>

<p>Craig Ringer sent in a patch to allow walsender to exit on conflict with recovery.</p>

<p>Etsuro Fujita sent in a patch to push down more UPDATEs/DELETEs in the postgres_fdw.</p>

<p>Kyotaro HORIGUCHI sent in two approaches to fix an issue where WALs were being recycled too aggressively in synchronous replication. The first injects a pause. The second blocks WAL insertion until sync replication reaches the first surviving segments.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two more revisions of a patch to clean up orphan temp tables with autovacuum.</p>

<p>Mithun Cy sent in two more revisions of a patch to implement failover on the libpq connect level.</p>

<p>Ashutosh Bapat sent in a patch to fix estimated tuple counts for appendrel.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement xmltable().</p>

<p>Stephen Frost sent in a doc patch to clarify that blobs are considered data and not schema for pg_dump purposes.</p>

<p>John Gorman sent in a patch to speed up dynamic shared memory hash tables.</p>

<p>Gilles Darold sent in a patch to add psql tab completion for ALTER DEFAULT PRIVILEGES.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to add logical replication.</p>