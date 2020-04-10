---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 juillet 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-07-29-nouvelles-hebdomadaires-de-postgresql-25-juillet-2010 "
---



<p><strong>Revues</strong></p>

<p>KaiGai Kohei reviewed Robert Haas's patch to add get_whatever_oid functionality.</p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, portability fixes for Solaris for requirepeer feature patch per report from Dave Page</li>

<li>Add more checks against altering typed tables. 1. Prohibit altering column type. 2. Prohibit changing inheritance. 3. Move checks from Exec to Prep phases in ALTER TABLE code. Backpatched to 9.0</li>

<li>In pgsql/doc/src/sgml/config.sgml, remove tab from SGML file</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, tidy up boolean data type page. Thom Brown.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, fix typo.</li>

<li>In pgsql/doc/src/sgml/xfunc.sgml, add INSERT statement to example so that it can be reproduced from John Gage</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Change the default value of standard_conforming_strings to on. This change should be publicized to driver maintainers at once and release-noted as an incompatibility with previous releases.</li>

<li>Add restart_after_crash GUC. Normally, we automatically restart after a backend crash, but in some cases when PostgreSQL is invoked by clusterware it may be desirable to suppress this behavior, so we provide an option which does this. Since no existing GUC group quite fits, create a new group called "error handling options" for this and the previously undocumented GUC exit_on_error, which is now documented. Review by Fujii Masao.</li>

<li>Make hstore regression tests independent of standard_conforming_strings. Per buildfarm.</li>

<li>Make ECPG regression tests independent of standard_conforming_strings. Per buildfarm, again.</li>

<li>Add \conninfo command to psql, to show current connection info. David Christensen. Reviewed by Steve Singer. Some further changes by me.</li>

<li>In pgsql/src/bin/psql/command.c, have \conninfo mention the port even for local sockets. Per discussion with David Christensen, there can be multiple instances of PG accessible via local sockets, and you need the port to see which one you're actually connected to. David's original patch worked this way, but I inadvertently ripped it out during commit.</li>

<li>Centralize DML permissions-checking logic. Remove bespoke code in DoCopy and RI_Initial_Check, which now instead fabricate call ExecCheckRTPerms with a manufactured RangeTblEntry. This is intended to make it feasible for an enhanced security provider to actually make use of ExecutorCheckPerms_hook, but also has the advantage that RI_Initial_Check can allow use of the fast-path when column-level but not table-level permissions are present. KaiGai Kohei. Reviewed (in an earlier version) by Stephen Frost, and by me. Some further changes to the comments by me.</li>

<li>Add options to force quoting of all identifiers. I've added a quote_all_identifiers GUC which affects the behavior of the backend, and a --quote-all-identifiers argument to pg_dump and pg_dumpall which sets the GUC and also affects the quoting done internally by those applications. Design by Tom Lane; review by Alex Hunsaker; in response to bug #5488 filed by Hartmut Goebel.</li>

<li>In pgsql/src/bin/pg_dump/pg_dumpall.c, fix bogus server version in pg_dumpall --quote-all-identifiers.</li>

<li>In pgsql/src/backend/replication/walsender.c, add missing function prototype. Fujii Masao.</li>

<li>In pgsql/src/backend/access/transam/xact.c, avoid deep recursion when assigning XIDs to multiple levels of subxacts. Backpatch to 8.0. Andres Freund, with cleanup and adjustment for older branches by me.</li>

<li>In pgsql/src/bin/psql/command.c, have psql avoid describing local sockets as host names. We now use the phrase 'via local socket in' rather than 'on host' in both \c and \conninfo output, when applicable. Fujii Masao, with some kibitzing by me.</li>

<li>CREATE TABLE IF NOT EXISTS. Reviewed by Bernd Helmle.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Properly replay CREATE TABLESPACE during crash recovery by deleting directory/symlink before creation. Report from Tom Lane. Backpatch to 9.0.</li>

<li>Prevent pg_upgrade from migrating databases that use reg* data types where the oid is not preserved by pg_upgrade (everything but pg_type). Update documentation. Per bug report from depstein@alliedtesting.com.</li>

<li>In contrib/pg_upgrade, adjust check_for_isn_and_int8_passing_mismatch() so it is called for all migrations. Backpatch to 9.0.</li>

<li>In pgsql/doc/src/sgml/ref/create_table.sgml, remove tabs from sgml file.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Backpatch reservation of shared memory region during backend startup on Windows, so that memory allocated by starting third party DLLs doesn't end up conflicting. The same functionality has been in 8.3 and 8.4 for almost a year, and seems to have solved some of the more common shared memory errors on Windows.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in another revision of the patch to rework DML permisssion checks.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to implement more of SQL/MED.</li>

<li>Pavel Stehule sent in two more revisions of the patch to implement to_string() and to_array().</li>

<li>Etienne Dube sent in a patch to fix a "could not attach to shared memory" issue on Windows in the 8.2 branch.</li>

<li>ITAGAKI Takahiro and Pavel Stehule traded revisions of the string functions patch.</li>

<li>Marc Cousin sent in a patch to correct a cursor declaration in the "migrating from Oracle" section of the PL/pgsql docs.</li>

<li>Daniele Varrazzo sent in a patch to make more links from the libpq docs. This came from actual usage in psycopg.</li>

<li>Satoshi Nagayasu sent in another revision of the patch to redo the ECPG docs.</li>

<li>Alexander Korotkov sent in two more revisions of the patch to make levenshtein functions multibyte-aware.</li>

<li>Leonardo Francalanci sent in another revision of the patch to improve the CLUSTER implentation.</li>

<li>Pavel Stehule sent in two more revisions of the patch to enhance \ef and add \sf (show function) in psql.</li>

<li>Fujii Masao sent in another revision of the patch to do synchronous replication.</li>

<li>Teodor Sigaev sent in another flock of patches implementing K-Nearest-Neighbor for GiST indexes.</li>

<li>Alex Hunsaker sent in two more revisions of the patch to add functional depency inference to GROUP BY.</li>

<li>Kevin Grittner sent in another revision of the patch to make a more correct implementation of hypotenuse.</li>

<li>Joseph Adams sent in a patch to implement the JSON data type.</li>

<li>Mike Fowler sent in another revision of the patch to add XMLEXISTS to the grammar.</li>

<li>Joseph Adams sent in a patch to add a utf8_to_unicode() function, similar to the corresponding unicode_to_utf8() function. Among other things, this smooths the way for the upcoming JSON data type.</li>

</ul>