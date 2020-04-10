---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 mai 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-06-01-nouvelles-hebdomadaires-de-postgresql-24-mai-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay de Junin / Buenos Aires aura lieu le 6 juin &agrave; l'Unnoba&nbsp;: 

<a target="_blank" href="http://www.arpug.com.ar/trac/wiki/PgDayUnnoba">http://www.arpug.com.ar/trac/wiki/PgDayUnnoba</a></li>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel &agrave; conf&eacute;renciers, plus d'infos sous peu&nbsp;!</li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech (ndt: ENST ?)&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Some documentation cleanup for the addition of the KOI8U encoding. Change all (remaining) mentions of KOI8 to the new canonical form KOI8R. Add information about the available conversions for KOI8U.</li>

<li>Refer to tables by id, not by "the following table", because tables are in theory floating elements.</li>

<li>In pgsql/src/backend/catalog/sql_features.txt, update SQL conformance entries for window functions functionality</li>

<li>In pgsql/src/tools/editors/emacs.samples, add some instructions on how to customize emacs for working on the SGML sources.</li>

<li>Add documentation string for LDFLAGS_SL in configure --help output.</li>

<li>In pgsql/src/tools/editors/emacs.samples, fix sgml-mode example. Thanks, Andrew Dunstan.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, convert some messages to use ngettext(). Author: Euler Taveira de Oliveira.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, make pwdfMatchesString() a little more careful about matching * fields.</li>

<li>Fix bug #4814 (wrong subscript in consistent-function call), and add some minimal regression test coverage for matchPartialInPendingList().</li>

<li>Fix LIKE's special-case code for % followed by _. I'm not entirely sure that this case is worth a special code path, but a special code path that gets the boundary condition wrong is definitely no good. Per bug #4821 from Andrew Gierth. In passing, clean up some minor code formatting issues (excess parentheses and blank lines in odd places). Back-patch to 8.3, where the bug was introduced.</li>

<li>Use more-portable coding for the check on handing out the last available relopt_kind value in add_reloption_kind(). Per Zdenek Kotala.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/analyze.c, update relpages and reltuples estimates in stand-alone ANALYZE, even if there's no analyzable attributes or indexes. We also used to report 0 live and dead tuples for such tables, which messed with autovacuum threshold calculations. This fixes bug #4812 reported by George Su. Backpatch back to 8.1.</li>

<li>In pgsql/src/backend/commands/tablecmds.c, silence a gcc compiler warning about non-literal format string with no args when compiling with -Wformat-security. Fujii Masao.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Removed some unneeded variables and comparisons.</li>

<li>More variables gcc moans about.</li>

<li>Removed unsigned/signed mismatches.</li>

<li>Removed comparison of unsigned expression &lt; 0.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/tsvector.c, re-sort tsvector's lexemes in tsvectorrecv instead of emitting an error. Basically, it's needed to support binary dump from 8.3 because the ordering rule was changed. Per discussion with Bruce Momjian.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;;-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in two patches to improve read-only scalability.</li>

<li>Pavel Stehule sent in another revision of the GROUPING SETS patch.</li>

<li>Jim Nasby sent in a patch to add a feature to vacuumdb that allows analyze-only as an option.</li>

<li>Robert Haas sent in a patch to add parenthesized options to EXPLAIN.</li>

<li>Pavel Stehule sent in a patch to clean up some syntax warnings in tsquery_op.c</li>

<li>Zdenek Kotala sent in two patches to do some cleanup to help pg_migrator.</li>

<li>Tatsuhito Kasahara sent in a patch to fix ja.po.</li>

<li>Steve Prentice sent in two versions of a patch to supplement Pavel Stehule's patch for named and mixed notation support in 8.5. Pavel sent in a followup that touches the main parser. Steve sent an updated patch.</li>

<li>Dimitri Fontaine sent in a document patch for GiST extensions.</li>

<li>Adriano Lange sent in a patch implementing 2PO, an alternative to the GEQO for optimizing large joins.</li>

<li>Andres Freund sent in a patch to allow EXPLAIN ANALYZE to show counts of discarded tuples.</li>

</ul>