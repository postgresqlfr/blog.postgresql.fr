---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2009-03-26-nouvelles-neuves-de-postgresql "
---



<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PostgreSQLFr tiendra un stand aux Solutions Linux 2009 &agrave; Paris. Volontaires&nbsp;: sas (a) postgresql (point) fr, ou sur le wiki&nbsp;: 

<a target="_blank" href="http://postgresql.fr/sl2009:start">http://postgresql.fr/sl2009:start</a></li>

<li>Les inscriptions pour la "PostgreSQL Conference (JDCon) East 2009" sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://www.postgresql.us/purchase">http://www.postgresql.us/purchase</a></li>

<li>Kevin Kempter fera une pr&eacute;sentation des sauvegardes et des r&eacute;cup&eacute;rations lors de la premi&egrave;re r&eacute;union du PUG de Denver, le 8 avril 2009&nbsp;: 

<a target="_blank" href="http://www.diapug.org/Meeting.html">http://www.diapug.org/Meeting.html</a></li>

<li>"PostgreSQL Conference, U.S." organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est visible &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

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

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, add -w option to --help output. It was apparently forgotten when -w was implemented.</li>

<li>Rename pg_restore -m to -j, and add documentation about what good numbers are. Per discussion on -hackers.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/datetime.c, document that datetime year '0' is considered in a recent century, not just '00'.</li>

<li>In pgsql/src/backend/utils/adt/datetime.c, improve zero-year comments.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, clarify 'cert' authentication documention.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, clarify libpq 'sslverify' documentation wording.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/release.sgml, add just-assigned CVE number to release notes for recent security issue.</li>

<li>In pgsql/doc/src/sgml/intarray.sgml, be more clear about when to use gist__int_ops vs. gist__intbig_ops. Per suggestion from Ron Mayer.</li>

<li>Optimize multi-batch hash joins when the outer relation has a nonuniform distribution, by creating a special fast path for the (first few) most common values of the outer relation. Tuples having hashvalues matching the MCVs are effectively forced to be in the first batch, so that we never write them out to the batch temp files. Bryce Cutt and Ramon Lawrence, with some editorialization by me.</li>

<li>Remove the datetime keywords ABSTIME and RELTIME, which we'd been treating as noise words for the last twelve years, for compatibility with Berkeley-era output formatting of the special INVALID values for those datatypes. Considering that the datatypes themselves have been deprecated for awhile, this is taking backwards compatibility a little far. Per gripe from Josh Berkus.</li>

<li>Remove the -d and -D options of pg_dump and pg_dumpall. The functionality is still available, but you must now write the long equivalent --inserts or --column-inserts. This change is made to eliminate confusion with the use of -d to specify a database name in most other Postgres client programs. Original patch by Greg Sabino Mullane, modified per subsequent discussion.</li>

<li>Clean up pg_SSPI_error() coding a little bit: make the messages more consistent, translate where intended, const-ify declarations. Resolves a gripe from Alvaro Herrera as well as some stuff I didn't like.</li>

<li>Add isExtend to the parameters of the buffer_read_start and buffer_read_done DTrace probes, so that ordinary reads can be distinguished from relation extension operations. Move buffer_read_start probe to before the smgrnblocks() call that's needed in the isExtend case, since really that step should be charged as part of the time needed for the extension operation. (This makes it slightly harder to match the read_start with the associated read_done, since now you can't match them on blockNumber, but it should still be possible since isExtend operations on the same relation can never be interleaved.) Per recent discussion. In passing, add the page identity (forkNum/blockNum) to the parameters of the buffer_flush_start/buffer_flush_done probes, which were unaccountably lacking the info.</li>

<li>More fixes for 8.4 DTrace probes. Remove useless BUFFER_HIT/BUFFER_MISS probes --- the BUFFER_READ_DONE probe provides the same information and more besides. Expand the LOCK_WAIT_START/DONE probe arguments so that there's actually some chance of telling what is being waited for. Update and clean up the documentation.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster, fix Windows-specific race condition in syslogger. This could've been the cause of the "could not write to log file: Bad file descriptor" errors reported at 

<a target="_blank" href="http://archives.postgresql.org//pgsql-general/2008-06/msg00193.php">http://archives.postgresql.org//pgsql-general/2008-06/msg00193.php</a> Backpatch to 8.3, the race condition was introduced by the CSV logging patch. Analysis and patch by Gurjeet Singh.</li>

<li>Add seven kanji characters defined in the Windows 950 codepage to our big5/win950 &lt;-&gt; UTF8 conversion tables. Per report by Roger Chang.</li>

<li>Fix case of the just resurrected UCS_to_BIG5.pl script, and update Makefile to use it.</li>

<li>In pgsql/contrib/pg_standby/pg_standby.c, don't intercept SIGQUIT as a signal to trigger failover; that's what postmaster uses for immediate shutdown. Trap SIGUSR1 as the preferred signal for that. Per report by Fujii Masao and subsequent discussion on -hackers.</li>

<li>In pgsql/contrib/pg_standby/pg_standby.c, don't set the signal handler for SIGQUIT on Windows. Buildfarm shows that reinstalling the default signal handler doesn't work as it is on Windows. Presumably core dumps on SIGQUIT are not a problem on Windows, so rather than figure out what header files or other changes are required to make it work, just don't bother.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Koichi Suzuki sent in another revision of the PITR performance improvement patch.</li>

<li>Magnus Hagander sent in a patch which changes the path separator for files on windows to a backslash unconditionally.</li>

<li>Teodor Sigaev sent in another revision of the patch to add B-Tree emulation to GIN indexes.</li>

<li>Shrish Purohit sent in another revision of the Thick Index patch.</li>

<li>Michael Renner sent in a doc patch to clarify between redo and checkpoint records.</li>

<li>Pavel Stehule sent in a WIP patch to add transformationHook.</li>

<li>Sergey Burladyan sent in a patch to check for ngettext in configure, add some new macros for ngettext, and change psql's "(1 row)" messages to _P(...) macros.</li>

<li>Tom Lane sent in a patch which fixes some libxml incompatibilities.</li>

</ul>