---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 avril 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-04-16-nouvelles-hebdomadaires-de-postgresql-11-avril-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>Assorted tab-completion improvements in psql. Added missing completions for ALTER SEQUENCE name OWNER TO, ALTER TYPE name RENAME TO, ALTER VIEW name ALTER COLUMN, ALTER VIEW name OWNER TO, and ALTER VIEW name SET SCHEMA. Fix wrong completions for ALTER FUNCTION/AGGREGATE name (arguments) where the "arguments" part was ignored, and ALTER ... SET SCHEMA, where "SCHEMA" was considered to be a variable name.</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, add cygwin version check before using cygwin_conv_path(), and use cygwin_conv_to_full_win32_path() in older versions.</li>

<li>In pgsql/src/bin/psql/tab-complete.c, psql tab completion for ALTER DEFAULT PRIVILEGES and USER MAPPING FOR PUBLIC.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ddl.sgml, reword exclusion constriants to mention that the operator can return false or null, per Tom.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>Change some debug ereports to elogs, as requested by translation team.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, further message changes when recovery.conf parameters missing.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/recovery.conf.sample, rename "Log-streaming replication parameters" header to "Standby server parameters" in recovery.conf, to match the grouping in the documentation. Fujii Masao.</li>

<li>Forbid using pg_xlogfile_name() and pg_xlogfile_name_offset() during recovery. We might want to relax this in the future, but ThisTimeLineID isn't currently correct in backends during recovery, so the filename returned was wrong. Fujii Masao.</li>

<li>Allow quotes to be escaped in recovery.conf, by doubling them. This patch also makes the parsing a little bit stricter, rejecting garbage after the parameter value and values with missing ending quotes, for example.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/timezone/pgtz.c, log the actual timezone name that we fail to look up the values for in case the registry data doesn't follow the format we expect, to facilitate debugging.</li>

<li>In pgsql/src/timezone/pgtz.c, proceed to look for the next timezone when matching a localized Windows timezone name where the information in the registry is incomplete, instead of aborting. This fixes cases when the registry information is incomplete for a timezone that is alphabetically before the one that is in use. Per report from Alexander Forschner</li>

<li>In pgsql/src/timezone/pgtz.c, update list of Windows timezones we try to match localized names against to one that's up to date with Windows 2003R2.</li>

<li>In pgsql/src/timezone/pgtz.c, clean up inconsistent commas.</li>

<li>Perltidy run over the MSVC build system files, to clean up code formatting and indentation styles.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix to_char YYY, YY, Y format codes so that FM zero-suppression really works, rather than only sort-of working as the previous attempt had left it. Clean up some unnecessary differences between the way these were coded and the way the YYYY case was coded. Update the regression test cases that proved that it wasn't working.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Make smart shutdown work in combination with Hot Standby/Streaming Replication. At present, killing the startup process does not release any locks it holds, so we must wait to stop the startup and walreceiver processes until all read-only backends have exited. Without this patch, the startup and walreceiver processes never exit, so the server gets permanently stuck in a half-shutdown state. Fujii Masao, with review, docs, and comment adjustments by me.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in two revisions of a patch to downgrade a FATAL message to a WARNING for hot standby when primary_conninfo or restore_command are left out.</li>

<li>Greg Sabino Mullane sent in a patch to show schema name for each table when REINDEX DATABASE is called.</li>

<li>Simon Riggs sent in a patch for Hot Standby to recover prepared transactions when starting up from shutdown.</li>

<li>Heikki Linnakangas sent in a patch to add signaling between walreceiver and startup process.</li>

<li>Heikki Linnakangas sent in a patch to keep a variable in shared memory to track the latest removed WAL segment. This can help with streaming replication in the case of a "disk full" condition on the primary.</li>

<li>Heikki Linnakangas sent in a patch to fix unsafe threading for syslogger on Windows.</li>

<li>Simon Riggs and Heikki Linnakangas traded patches to fix the issue where Hot Standby doesn't work right with shutdowns at an inopportune moment.</li>

<li>Jaime Casanova sent in a WIP patch to fix "make standbycheck".</li>

</ul>