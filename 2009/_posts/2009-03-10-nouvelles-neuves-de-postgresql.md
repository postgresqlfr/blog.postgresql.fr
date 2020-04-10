---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2009-03-10-nouvelles-neuves-de-postgresql "
---



<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PUG allemand tiendra une rencontre, deux conf&eacute;rences et un atelier lors des Linuxdays de Chemnitz les 14 &amp; 15 mars 2009. Plus d'information ici (alld)&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html">http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html</a></li>

<li>PostgreSQLFr tiendra un stand aux Solutions Linux 2009 &agrave; Paris. Volontaires&nbsp;: sas (a) postgresql (point) fr, ou sur le wiki&nbsp;: 

<a target="_blank" href="http://postgresql.fr/sl2009:start">http://postgresql.fr/sl2009:start</a></li>

<li>"PostgreSQL Conference, U.S." organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est visible &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Michael Renner animera un atelier sur la r&eacute;plication PostgreSQL lors des "Netways OSDC", les 29 et 30 avril 2009, &agrave; Nuremberg (All.)&nbsp;: 

<a target="_blank" href="http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/">http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/papers.php">http://www.pgcon.org/2009/papers.php</a></li>

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

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix usage of char2wchar/wchar2char. Changes: pg_wchar and wchar_t could have different size, so char2wchar doesn't call pg_mb2wchar_with_len to prevent out-of-bound memory bug. Make char2wchar/wchar2char symmetric, now they should not be called with C-locale because mbstowcs/wcstombs oftenly doesn't work correct with C-locale. Text parser uses pg_mb2wchar_with_len directly in case of C-locale and multibyte encoding Per bug report by Hiroshi Inoue and following discussion. Backpatch up to 8.2 when multi-byte support was implemented in tsearch.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>When we are in error recursion trouble, arrange to suppress translation and encoding conversion of any elog/ereport message being sent to the frontend. This generalizes a patch that I put in last October, which suppressed translation of only specific messages known to be associated with recursive can't-translate-the-message behavior. As shown in bug #4680, we need a more general answer in order to have some hope of coping with broken encoding conversion setups. This approach seems a good deal less klugy anyway. Patch in all supported branches.</li>

<li>In pgsql/src/backend/utils/error/elog.c, ooops ... fix some confusion between gettext() and _() in my previous patch. This has moved around in past releases, so just copying-and-pasting from HEAD didn't work as intended.</li>

<li>In pgsql/src/backend/utils/adt/float.c, put back our old workaround for machines that declare cbrt() in math.h but fail to provide the function itself. Not sure how we escaped testing anything later than 7.3 on such cases, but they still exist, as per Andr? Volpato's report about AIX 5.3.</li>

<li>Fix column privilege checking for cases where parent and child have different attribute numbering. Also, a parent whole-row reference should not require select privilege on child columns that aren't inherited from the parent. Problem diagnosed by KaiGai Kohei, though this isn't exactly his patch.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, remove documentation of log_restartpoints setting, which is obsoleted in favor of log_checkpoints. Fujii Masao</li>

<li>Teach the planner to support index access methods that only implement amgettuple or only implement amgetbitmap, instead of the former assumption that every AM supports both APIs. Extracted with minor editorialization from Teodor Sigaev's fast-GIN-insert patch; whatever becomes of that, this seems like a simple and reasonable generalization of the index AM interface spec.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/include/storage/lwlock.h, remove the placeholder LWLockId in place of the removed FreeSpaceLock. As pointed out by ITAGAKI Takahiro, we split SInvalLock into two in 8.4, so to keep the numbers of the rest of the locks unchanged from 8.3, we don't need a placeholder.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, fix copy-pasto in the patch to allow background writer to run during recovery: if background writer or pgstat process dies during recovery (or any other child process, but those two are the only ones running), send SIGQUIT to the startup process using correct pid.</li>

<li>In pgsql/src/backend/commands/functioncmds.c, add some sanity checks to CREATE CAST ... WITHOUT FUNCTION. Disallow composite, enum and array types, as those are surely not binary-compatible with anything else because of the embedded OIDs. Inspired by bug report by Oleg Serov.</li>

<li>Reload config file in startup process on SIGHUP. Fujii Masao.</li>

<li>Add MUST (Mauritius Island Summer Time) to the list of known abbreviations. Mauritius began using DST in the summer 2008-2009; the Olson library has been updated already. Xavier Bugaud</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/hba.c, log a warning instead of shutting down the system if we can't load pg_hba.conf on reload (for example due to a permission error). Selena Deckelmann.</li>

<li>In pgsql/src/backend/libpq/hba.c, change hba load failure message to LOG instead of WARNING. Per comment from Tom Lane.</li>

<li>In pgsql/src/backend/libpq/hba.c, make pg_hba parsing report all errors in the file before aborting the load, instead of just reporting the first one. Selena Deckelmann</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, fix MSVC build for new ways to pull in keywords.c and kwlookup.c.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/file/fd.c, don't actively violate the system limit of maximum open files (RLIMIT_NOFILE). This avoids irritating kernel logs (if system overstep violations are enabled) and also the grsecurity alert when starting PostgreSQL. Original patch by Jacek Drobiecki.</li>

<li>Add new SQL:2008 error codes for invalid LIMIT and OFFSET values. Remove unused nonstandard error code that was perhaps intended for this but never used.</li>

<li>Provide some proper minimal documentation for the pg_dump(all) --binary-upgrade option. We don't want to commit to what it does, but hiding it will only cause confusion.</li>

<li>In pgsql/src/backend/parser/scan.l, clarify to the translator that yyerror() deals with the translation of "syntax error", not the literal string. I was previously confused on this matter, but I have now verified that everything is translated properly.</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, message tuning.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Separate the key word list that lived in keywords.c into a new header file kwlist.h, to avoid having to link the backend object file into other programs like pg_dump. We can now simply symlink a single source file from the backend (kwlookup.c, containing the shared routine ScanKeywordLookup) and compile it locally, which is a lot cleaner.</li>

<li>In pgsql/src/bin/scripts/Makefile, avoid MSVC breakage caused by my previous commit by not using a variable in the src/bin/scripts Makefile.</li>

<li>On Windows, call bind_textdomain_codeset on domains other than the default one, too, so that the codeset is properly mapped on the newly added PL domains.</li>

<li>Add comments about kwlookup.c expectations.</li>

<li>pg_bind_textdomain_codeset must exist only on ENABLE_NLS.</li>

<li>Revert pg_bind_textdomain_codeset to a existant-but-empty function when ENABLE_NLS is not defined, for better compatibility of the backend with modules compiled the other way. Per note from Tom Lane after my previous commit.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ceoption cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Bryce Cutt sent in another revision of the patch to improve the performance of multi-batchHash join for skewed data sets.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patches.</li>

<li>Fujii Masao sent in another revision of his PITR performance improvement patch.</li>

<li>Josh Tolley sent in a back-patch for 8.3 intended to duplicate Selena Deckelmann's, "Issue WARNING instead of FATAL when reload can't read pg_hba.conf" behavior applied to HEAD this week.</li>

<li>Heikki Linnakangas sent in a patch for pg_standby which changes its behavior on receiving a SIGQUIT, to immediately killing pg_standby, triggering the FATAL death of the startup process, too.</li>

<li>Fujii Masao sent in another revision of the synchronous replication patch.</li>

<li>Teodor Sigaev sent in another revision of the fast insert GIN patch.</li>

<li>Teodor Sigaev sent in another revision of the B-Tree emulation for GIN patch.</li>

<li>Pavel Stehule sent in another revision of the mixed named notation in functions.</li>

<li>Robert Lor sent in a two revisions of a patch to add Theo Schlossnagle's Dtrace probes.</li>

<li>Zdenek Kotala sent in a patch to fix regression tests for the Czech locale.</li>

<li>Andrew Dunstan sent in an optimization for parallel pg_restore.</li>

<li>Gregory Stark sent in a patch to head off a potential conflict between indexes created concurrently and HOT.</li>

<li>Selena Deckelmann sent in a patch to have ParseConfigFile report all parsing errors, then bail.</li>

</ul>