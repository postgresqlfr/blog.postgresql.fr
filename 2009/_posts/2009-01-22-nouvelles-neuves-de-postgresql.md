---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/01/22/Nouvelles-neuves-de-PostgreSQL"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 18 janvier 2009</strong></p>

<p><strong>L'astuce de la semaine</strong></p>

<p>Pour activer, sur une seule base, l'enregistrement des requ&ecirc;tes&nbsp;: ALTER &lt;nom_de_la_base&gt; SET log_statement = 'all'<br>

[ndt: pour un param&eacute;trage global, cf 

<a target="_blank" href="http://docs.postgresql.fr/8.3/runtime-config-logging.html#guc-log-statement">doc</a>]</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090118">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-01/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Richard Broersma fait le lien entre les volontaires pour la rencontre de SCALE (cf. plus bas). Contact &agrave; richard POINT broersma CHEZ gmail POINT com.</li>

<li>Les groupes moscovites de PostgreSQL et MySQL tiendront une table ronde commune le 22 janvier. D&eacute;tails et inscriptions ci-dessous&nbsp;: 

<a target="_blank" href="http://forum.postgresqlrussia.org/viewtopic.php?f=6&amp;t=96">http://forum.postgresqlrussia.org/viewtopic.php?f=6&amp;t=96</a></li>

<li>Le SYDPUG se r&eacute;unira le 3 f&eacute;vrier 2009 &agrave; 18h30 chez Fujitsu Australia, Sydney Nord. Mark Leslie pr&eacute;sentera l'histoire et les motivations de PostGIS&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/sydpug/2009-01/msg00000.php">http://archives.postgresql.org/sydpug/2009-01/msg00000.php</a></li>

<li>Le JNBPUG se r&eacute;unira le 9 f&eacute;vrier &agrave; 19h au News Cafe sur New Road &agrave; Midrand.</li>

<li>Beaucoup des suspects habituels se retrouveront au FOSDEM les 7 &amp; 8 f&eacute;vrier &agrave; Bruxelles, Belgique&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.eu/wiki/FOSDEM_2009">http://wiki.postgresql.eu/wiki/FOSDEM_2009</a></li>

<li>PostgreSQL sera au "SCALE" du 20 au 22 f&eacute;vrier &agrave; Los Angeles&nbsp;: 

<a target="_blank" href="http://www.socallinuxexpo.org/">http://www.socallinuxexpo.org/</a></li>

<li>Conf&eacute;rence d'Andreas 'ads' Scherbaum lors du "Perl Workshop 2009" le 25 f&eacute;vrier &agrave; Francfort-sur-le-Main, en Allemagne&nbsp;: 

<a target="_blank" href="http://www.perl-workshop.de/talks/151/view">http://www.perl-workshop.de/talks/151/view</a></li>

<li>"PostgreSQL Conference, U.S." organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est visible &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/papers.php">http://www.pgcon.org/2009/papers.php</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

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

<li>Add ONLY support to LOCK and TRUNCATE. By default, these commands are now recursive. Note this incompatibility in the release notes.</li>

<li>In pgsql/src/backend/parser/gram.y, use qualified_name instead of relation_expr for commands that have no business with inheritance recursion: ALTER INDEX, ALTER SEQUENCE, ALTER TRIGGER, ALTER VIEW. They would just silently ignore the ONLY. ALTER TABLE has mixed behavior and cannot be dealt with this way because of the resulting shift/reduce conflicts.</li>

<li>In pgsql/doc/src/sgml/ref/select.sgml, add some minimal documentation that the SQL standard requires parentheses after ONLY.</li>

<li>In pgsql/src/tools/make_etags, remove useless (and insecure) temp file handling.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/Makefile, misc.o depends on pg_config_paths.h when --enable-nls is used.</li>

<li>In pgsql/src/pl/tcl/pltcl.c, make error messages match backend style.</li>

<li>In pgsql/src/backend/catalog/information_schema.sql, make the columns is_insertable_into and is_updatable behave uniformly correctly. They are supposed to examine which kinds of rules are present, which they did in some of the info schema views but not in others.</li>

<li>In pgsql/src/tools/make_etags, avoid version-control system directories when creating TAGS. Besides being wasteful, this can collide with repostory metadata on case-insensitive file sytems.</li>

<li>In pgsql/src/nls-global.mk, make .pot files depend on the makefiles, so that they are updated when the file or trigger function lists are changed.</li>

<li>In pgsql/src/interfaces/ecpg/test/Makefile, build needed things in src/test/regress/ first. And some build rules normalization.</li>

<li>NLS cleanup in ecpglib Replace leftover instances of _() by ecpg_gettext(), the latter being the correct way to refer to the library's message catalog, instead of the one of the program using the library. Drop NLS support for ecpg_log(), which is a debugging instrument similar to elog() in the backend. We cannot support NLS in the ecpg compatlib, because that requires ecpg_gettext, which is in ecpglib, which is not a dependency of compatlib. It doesn't seem worthwhile to worry about this, since the only translatable string is "out of memory", and gettext probably won't be able to do much without memory either. Adjust messages to project style.</li>

<li>In pgsql/src/pl/tcl/nls.mk, remove unneeded GETTEXT_TRIGGERS.</li>

<li>Cleanup pass over PL/Python NLS. Add translation support to PLy_elog and PLy_exception_set, and clarify some error messages.</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, remove period from primary error message.</li>

<li>Wordsmithing in pgsql/src/interfaces/ecpg/ecpglib/error.c.</li>

<li>plpython_error.out is for Python 2.4, plpython_error_3.out is for Python 2.5, as it was previously.</li>

<li>In pgsql/src/pl/plpython/expected/plpython_error_1.out, manual attempt to update this file.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/executor/nodeBitmapHeapscan.c, tweak order of operations in BitmapHeapNext() to avoid the case of prefetching the same page we are nanoseconds away from reading for real. There should be something left to do on the current page before we consider issuing a prefetch.</li>

<li>Fix a pg_dump output ordering problem introduced in 8.3 by the addition of array types for composite types. Although pg_dump understood it wasn't supposed to dump these array types as separate objects, it must include them in the dependency ordering analysis, and it was improperly assigning them the same relatively-high sort priority as regular types. This resulted in effectively moving composite types and tables up to that same high priority, which broke any ordering requirements that weren't explicitly enforced by dependencies. In particular user-defined operator classes, which should come out before tables, failed to do so. Per report from Brendan Jurd. In passing, also fix an ill-considered decision to give text search objects the same sort priority as functions and operators --- the sort result looks a lot nicer if different object types are kept separate. The recent foreign-data patch had copied that decision, making the sort ordering even messier :-(</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Simplify the writing of amoptions routines by introducing a convenience fillRelOptions routine that stores the parsed values in the struct using a table-based approach. Per Tom suggestion. Also remove the "continue" in HANDLE_*_RELOPTION macros, which were useless and in spirit they were assuming too much of how the macros were going to be used. (Note that these macros are now unused, but the intention is to introduce some usage in a future autovacuum patch, which is why they weren't completely removed.) Also, do not call the string validation routine when not validating. It seems less error-prone this way, per commentary on the amoptions SGML docs.</li>

<li>Backpatch to 7.4 the part of 1.84 (from the 8.0 timeline) that wasn't already patched, viz. str_numth(). The rest of that patch was already applied as part of 1.69.2.1. Per report and patch from Andreas 'ads' Scherbaum.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, document how pglesslog can be used to reduce the storage requirements of PITR.</li>

<li>Renable threading build for Solaris 2.5, per report from Andrew Chernow.</li>

<li>Check nsl library for gethostbyname_r() on all platforms (HP-UX uses it too).</li>

<li>In pgsql/src/port/thread.c, remove empty #ifdef block.</li>

<li>Make 'find' syntax consistent; add .git exclusion to make_ctags.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, add documentation mention that full page writes have to be enabled for full pages to be restored during recovery. Per private report from Michael Renner</li>

<li>In pgsql/GNUmakefile.in, modify distdir rule to skip .git directory.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-auth.c, remove special-handling of usernames with Kerberos authentication. We will now always use the system username as the default, and not try to pick it up from the kerberos ticket. This fixes the spurious error messages that show up on kerberos-enabled builds when not actually using kerberos, and puts it in line with how other authentication methods work.</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, throw an error when using -C and -1 at the same time in pg_restore. It's not possible to do CREATE DATABASE inside a transaction, so previously we just got a server error instead. Backpatch to 8.2, which is where the -1 feature appeared.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, remove broken Assertions that failed if a statement executed in PL/pgSQL is rewritten into another kind of statement, for example if an INSERT is rewritten into an UPDATE. Back-patch to 8.3 and 8.2. For HEAD, Tom suggested inventing a new SPI_OK_REWRITTEN return code, but that's not a backportable solution. I'll do that as a separate patch, this patch will do as a stopgap measure for HEAD too in the meanwhile.</li>

<li>In pgsql/doc/src/sgml/func.sgml, change explanation of pg_switch_xlog()'s return value to match code.</li>

<li>Add vacuum_freeze_table_age GUC option, to control when VACUUM should ignore the visibility map and scan the whole table, to advance relfrozenxid.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/wparser_def.c, fix generation too long headline with ShortWords. Per 

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2008-09/msg01088.php">http://archives.postgresql.org/pgsql-hackers/2008-09/msg01088.php</a></li>

<li>Fix URL generation in headline. Only tag lexeme will be replaced by space. Per 

<a target="_blank" href="http://archives.postgresql.org/pgsql-bugs/2008-12/msg00013.php">http://archives.postgresql.org/pgsql-bugs/2008-12/msg00013.php</a></li>

<li>In pgsql/contrib/tsearch2/expected/tsearch2.out, sync output of tsearch2 regression test.</li>

<li>In pgsql/contrib/tsearch2/rank.c, fix uninitialized variables in get_covers.</li>

</ul>

<p>Neil Conway a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/create_user_mapping.sgml, fix typo.</li>

<li>In pgsql/doc/src/sgml/ref/create_server.sgml, fix an ungrammatical statement.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Koichi Suzuki sent in another revision of the PITR improvement patch.</li>

<li>Bernd Helmle sent in another revision of his patch to make VIEWs updateable.</li>

<li>Magnus Hagander sent in a patch which improves the error and message when the incompatible options -1 and -c are called together.</li>

<li>KaiGai Kohei sent in a WIP patch to fix some edge cases in the column-level privileges patch.</li>

<li>KaiGai Kohei sent in five more revisions of his SE-PostgreSQL patches.</li>

<li>Alvaro Herrera sent in two revisions of a patch which adds namespaces to reloptions.</li>

<li>Robert Haas sent in a patch which helps fix log rotation.</li>

<li>Fujii Masao sent in another revision of his synchronous replication patch.</li>

<li>KaiGai Kohei sent in a patch which puts invocations of markColumnForSelectPriv() in transformJoinUsingClause() to mark those columns used.</li>

<li>Stephen Frost sent in four more revisions of his column-level privileges patch.</li>

<li>Ramon Lawrence and Bryce Cutt sent in another revision of the patch to improve the performance of multi-batchhash join for skewed data sets.</li>

<li>Simon Riggs sent in three more revisions of the hot standby patch.</li>

<li>Alvaro Herrera sent in a patch to move a tablespace.c call from smgr.c into the new storage.c.</li>

<li>Teodor Sigaev sent in another revision of the patch to add B-Tree emulation to GIN.</li>

<li>Teodor Sigaev sent in another revision of the GIN improvements patch.</li>

<li>Peter Eisentraut sent in an update to Bernd Helmle's patch for updateable views.</li>

<li>Alan Li sent in a patch which fixes some compiler warnings in gcc 4.3.2.</li>

</ul>