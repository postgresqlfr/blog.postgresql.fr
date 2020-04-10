---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 3 mai 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-05-07-nouvelles-hebdomadaires-de-postgresql-3-mai-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en May</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PgDay de Florianopolis aura lieu le 22 mai. Contactez Dickson S. Guedes (guedes AROBASE guedesoft DOT net) pour participer ou proposer une conf&eacute;rence&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/pgday/sc">http://www.postgresql.org.br/eventos/pgday/sc</a></li>

<li>La "Percona Performance Conference" prendra place au "Santa Clara Convention Center", Santa Clara, Californie&nbsp;: 

<a target="_blank" href="http://conferences.percona.com/">http://conferences.percona.com/</a></li>

<li>L'appel aux conf&eacute;rences est lanc&eacute; pour le PgDay de S&atilde;o Paulo, programm&eacute; le 24 avril. Contactez [marins (point) consultoria (a) gmail (point) com] ou [marcelojscosta (a) gmail (point) com] pour participer.</li>

<li>"PostgreSQL Conference, U.S. (JDCon)" organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est consultable &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Il y aura &eacute;galement des PgDays les 29 et 30 avril, respectivement &agrave; Porto Velho (RO) et Ji-Parana (RO). Contactez Luis Fernando Bueno&nbsp;: [proflfbueno (a) gmail (point) com] pour participer.</li>

<li>Michael Renner animera un atelier sur la r&eacute;plication PostgreSQL lors des "Netways OSDC", les 29 et 30 avril 2009, &agrave; Nuremberg (All.)&nbsp;: 

<a target="_blank" href="http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/">http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/">http://www.pgcon.org/2009/</a></li>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel &agrave; conf&eacute;renciers, plus d'infos sous peu&nbsp;!</li>

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

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Proofreading adjustments for first two parts of documentation (Tutorial and SQL).</li>

<li>In pgsql/src/bin/scripts/vacuumdb.c, in VACUUM, FREEZE must be before ANALYZE; fix this in vacuumdb. Docs are already correct.</li>

<li>Blank line Makefile cleanups.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/parser/gram.y, move SERVER to the right place in the alphabetically sorted keyword list.</li>

<li>Add pgsql/src/tools/check_keywords.pl script to perform some basic sanity checks to the keyword lists in gram.y and kwlist.h. It checks that all lists are in alphabetical order, and that all keywords present in gram.y are listed in kwlist.h in the right category, and that all keywords in kwlist.h are also in gram.y. What's still missing is to check that all keywords defined with "%token &lt;keyword&gt;" in gram.y are present in one of the keyword lists in gram.y.</li>

<li>In pgsql/src/tools/check_keywords.pl, clean up check_keywords.pl script, making it 'strict' and removing a few leftover unused variables. Laurent Laborde.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Improve pull_up_subqueries logic so that it doesn't insert unnecessary PlaceHolderVar nodes in join quals appearing in or below the lowest outer join that could null the subquery being pulled up. This improves the planner's ability to recognize constant join quals, and probably helps with detection of common sort keys (equivalence classes) as well.</li>

<li>In pgsql/src/backend/utils/adt/datetime.c, when checking for datetime field overflow, we should allow a fractional-second part that rounds up to exactly 1.0 second. The previous coding rejected input like "00:12:57.9999999999999999999999999999", with the exact number of nines needed to cause failure varying depending on float-timestamp option and possibly on platform. Obviously this should round up to the next integral second, if we don't have enough precision to distinguish the value from that. Per bug #4789 from Robert Kruus. In passing, fix a missed check for fractional seconds in one copy of the "is it greater than 24:00:00" code. Broken all the way back, so patch all the way back.</li>

<li>In pgsql/src/pl/plpgsql/src/gram.y, fix a couple of cases where the plpgsql grammar looked for T_WORD and failed to consider the possibility that it would get T_SCALAR, T_RECORD, or T_ROW instead because the word happens to match a plpgsql variable name. In particular, give "duplicate declaration" rather than generic "syntax error" if the same identifier is declared twice in the same block, as per my recent complaint. Also behave more sanely when decl_aliasitem or proc_condition or opt_lblname is coincidentally not T_WORD. Refactor the related productions a bit to reduce duplication. This is a longstanding bug, but it doesn't seem critical enough to back-patch.</li>

<li>Fix plpgsql's EXIT so that an EXIT without a label only matches a loop, never a BEGIN block. This is required for Oracle compatibility and is also plainly stated to be the behavior by our original documentation (up until 8.1, in which the docs were adjusted to match the code's behavior; but actually the old docs said the correct thing and the code was wrong). Not back-patched because this introduces an incompatibility that could break working applications. Requires release note.</li>

<li>Split the release notes into a separate file for each (active) major branch, as per my recent proposal. release.sgml itself is now just a stub that should change rarely; ideally, only once per major release to add a new include line. Most editing work will occur in the release-N.N.sgml files. To update a back branch for a minor release, just copy the appropriate release-N.N.sgml file(s) into the back branch. This commit doesn't change the end-product documentation at all, only the source layout. However, it makes it easy to start omitting ancient information from newer branches' documentation, should we ever decide to do that.</li>

<li>We don't need major_release_split any more.</li>

<li>Install some simple defenses in postmaster startup to help ensure a useful error message if the installation directory layout is messed up (or at least, something more useful than the behavior exhibited in bug #4787). During postmaster startup, check that get_pkglib_path resolves as a readable directory; and if ParseTzFile() fails to open the expected timezone abbreviation file, check the possibility that the directory is missing rather than just the specified file. In case of either failure, issue a hint suggesting that the installation is broken. These two checks cover the lib/ and share/ trees of a full installation, which should take care of most scenarios where a sysadmin decides to get cute.</li>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, fix already-obsolete hint message ... sslverify parameter is no more.</li>

<li>In pgsql/src/backend/utils/misc/guc.c, fix assign_pgstat_temp_directory() to ensure the directory path is canonicalized. Avoid the need to elog(FATAL) on out-of-memory.</li>

<li>Fix unintelligible description created by removing only part of a parenthetical remark.</li>

<li>In pgsql/doc/src/sgml/func.sgml, fix mis-description of XML Schema functions, per discussion.</li>

<li>In pgsql/src/bin/pg_resetxlog/pg_resetxlog.c, fix pg_resetxlog to remove archive status files along with WAL segment files. Fujii Masao.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, fix missed usage of DLNewElem().</li>

</ul>

<p>Tatsuo Ishii a commit&eacute;&nbsp;:</p>

<ul>

<li>pdate UTF-8 &lt;--&gt; EUC_KR, JOHAB, UHC mappings. Patch contributed by Chuck McDevitt.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster/postmaster.c, avoid a memory allocation in the backend startup code, to avoid having to check whether it failed. Modelled after catcache.c's usage of DlList, per suggestion from Tom Lane.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alvaro Herrera sent in a doc patch for autovacuum about when ANALYZE is recommended.</li>

<li>Robert Haas sent in another revision of the ALTER COLUMN...SET DISTINCT patch.</li>

<li>Robert Haas sent in a patch to replace a couple of references to files that no longer exist in the source tree with references to the appropriate URLs.</li>

</ul>