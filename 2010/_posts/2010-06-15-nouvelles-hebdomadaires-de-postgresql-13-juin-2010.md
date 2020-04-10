---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 juin 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-06-15-nouvelles-hebdomadaires-de-postgresql-13-juin-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/uninstall_dblink.sql, add missed function dblink_connect_u(text[,text]) to uninstall script</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/walreceiver.c, avoid useless snprintf() call when update_process_title is turned off. Fujii Masao.</li>

<li>In pgsql/src/pl/plpython/plpython.c, fix quite-bogus handling of arrays in plpython datum-to-PyObject conversion. Per bug #5497 from David Gardner.</li>

<li>In pgsql/src/bin/scripts/vacuumdb.c, add missing 'Z' letter to getopt_long call --- the newly added --analyze-only switch did not work in its short form -Z. Josh Berkus</li>

<li>In pgsql/doc/src/sgml/Makefile, Postgres.txt should get cleaned by 'make clean'.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plhandler.sgml, make procedural language handler reference C-language function docs. Based on suggestions from Jonathan Leto and Joshua Tolley.</li>

<li>In pgsql/src/backend/commands/explain.c, attempt to fix EXPLAIN (FORMAT YAML) quoting to behave sanely. The previous code failed to quote in many cases where quoting was necessary - YAML has loads of special characters, including -:[]{},"'|*&amp; - so quote much more aggressively, and only refrain from quoting things where it seems fairly clear that it isn't necessary. Per report from Dean Rasheed.</li>

<li>In pgsql/src/backend/catalog/pg_largeobject.c, remove stray word from comment.</li>

<li>In pgsql/src/backend/commands/explain.c, quote all string values in EXPLAIN (FORMAT YAML) output. While my previous attempt seems to always produce valid YAML, it doesn't always produce YAML that means what it appears to mean, because of tokens like "0xa" and "true", which without quotes will be interpreted as integer or Boolean literals. So, instead, just quote everything that's not known to be a number, as we do for JSON. Dean Rasheed, with some changes to the comments by me.</li>

<li>Fix ALTER LARGE OBJECT and GRANT ... ON LARGE OBJECT for large OIDs. The previous coding failed for OIDs too large to be represented by a signed integer.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, fix typo.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, fix misplaced modifier. As suggested by Ian Barwick.</li>

</ul>

<p>Tatsuo Ishii a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/walreceiver.c, fix typo in the header comment. Per request from Masao Fujii.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, fix connection leak in dblink when dblink_connect() or dblink_connect_u() end with "duplicate connection name" errors. Backported to release 7.4.</li>

<li>In pgsql/contrib/dblink/dblink.c, avoid "identifier will be truncated" warning in dblink when connection string is longer than NAMEDATALEN. The previous fix for long connection name broke the behavior.</li>

<li>In pgsql/contrib/dblink/dblink.c, fix incorrect change in dblink introduced by the previous commit "Fix connection leak in dblink".</li>

<li>Rename restartpoint_command to archive_cleanup_command.</li>

<li>In pgsql/src/backend/storage/ipc/standby.c, remove max_standby_delay message from ps display of recovery process in waiting status. The parameter is not so interesting in ps display because it is referable in postgresql.conf.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, make the walwriter close its handle to an old xlog segment if it's no longer the current one. Not doing this would leave the walwriter with a handle to a deleted file if there was nothing for it to do for a long period of time, preventing the file from being completely removed. Reported by Tollef Fog Heen, and thanks to Heikki for some hand-holding with the patch.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In standby mode, respect checkpoint_segments in addition to checkpoint_timeout to trigger restartpoints. We used to deliberately only do time-based restartpoints, because if checkpoint_segments is small we would spend time doing restartpoints more often than really necessary. But now that restartpoints are done in bgwriter, they're not as disruptive as they used to be. Secondly, because streaming replication stores the streamed WAL files in pg_xlog, we want to clean it up more often to avoid running out of disk space when checkpoint_timeout is large and checkpoint_segments small. Patch by Fujii Masao, with some minor changes by me.</li>

<li>Return NULL instead of 0/0 in pg_last_xlog_receive_location() and pg_last_xlog_replay_location(). Per Robert Haas's suggestion, after Itagaki Takahiro pointed out an issue in the docs. Also, some wording changes in the docs by me.</li>

<li>Make TriggerFile variable static. It's not used outside xlog.c. Fujii Masao.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/syntax.sgml, add index entry for ::, per complaint from John Gage.</li>

<li>In pgsql/doc/src/sgml/ref/alter_table.sgml, update ALTER TABLE docs to account for exclusion and deferrable uniqueness constraints. Dean Rasheed.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update text of 9.0 release notes. Josh Berkus.</li>

<li>In pgsql/doc/src/sgml/Makefile, add space between after "&gt;" in "&gt;$@" in SGML Makefile, for clarity.</li>

<li>In pgsql/doc/src/sgml/Makefile, add SGML Makefile rule for single-page text, postgres.txt.</li>

<li>Have pg_upgrade create its output files in the current directory, rather than in a subdirectory of the $HOME directory, or $TMP in Windows.</li>

<li>In pgsql/doc/src/sgml/Makefile, remove lynx -stdin flag for postgres.text.</li>

<li>In pgsql/src/test/regress/pg_regress.c, add missing --use-existing --help mention from regression binary. Jan Urbanski</li>

<li>In pgsql/contrib/pg_upgrade/pg_upgrade.h, update pg_upgrade C comment about cwd.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Add a regression test case for bug #5497.</li>

<li>In pgsql/src/pl/plpython/expected/README, update Python version information.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, fix typo/bug, found by Clang compiler.</li>

<li>Add target to build HTML documentation as single page.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in a patch per Andrew Dunstan to clarify that to use a pgpass file to connect to Streaming Replica standbys, it is necessary to use a * for the database field.</li>

<li>Peter Eisentraut sent in a WIP patch to allow GROUP BY to infer functional dependencies and not require that the target list include all non-aggregated columns when it finds them, per the SQL standard.</li>

<li>Alexander Korotkov sent in another revision of the patch to allow multi-byte character sets in Levenshtein functions in the supplied module for fuzzy string matching.</li>

<li>Joel Jacobson sent in another revision of the patch to add a pg_stat_transaction system view.</li>

<li>Robert Haas sent in a patch to deprecate =&gt; and add ==&gt; to the hstore module, per discussion.</li>

</ul>