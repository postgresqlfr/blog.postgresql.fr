---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2009-02-16-nouvelles-neuves-de-postgresql "
---



<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-02/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Ed Borasky fera une conf&eacute;rence sur la visualisation des donn&eacute;es au PDXPUG le 19 f&eacute;vrier de 19 &agrave; 21h &agrave; Portland&nbsp;: 

<a target="_blank" href="http://calagator.org/events/1250456619">http://calagator.org/events/1250456619</a></li>

<li>PostgreSQL sera au "SCALE" du 20 au 22 f&eacute;vrier &agrave; Los Angeles&nbsp;: 

<a target="_blank" href="http://www.socallinuxexpo.org/">http://www.socallinuxexpo.org/</a></li>

<li>Conf&eacute;rence d'Andreas 'ads' Scherbaum lors du "Perl Workshop 2009" le 25 f&eacute;vrier &agrave; Francfort-sur-le-Main, en Allemagne&nbsp;: 

<a target="_blank" href="http://www.perl-workshop.de/talks/151/view">http://www.perl-workshop.de/talks/151/view</a></li>

<li>Le PUG allemand tiendra une rencontre, deux conf&eacute;rences et un atelier lors des Linuxdays de Chemnitz les 14 &amp; 15 mars 2009. Plus d'information ici (alld)&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html">http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html</a></li>

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

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, fix spelling error in docs. Erik Rijkers</li>

<li>In pgsql/doc/src/sgml/ref/pg_dump.sgml, update wording of how to prevent pg_dump from affecting statistics collection.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, clarify PQinitSSL() documentation to mention what the argument controls.</li>

<li>In pgsql/doc/src/sgml/ref/create_table.sgml, remove tabs from SGML.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Update autovacuum to use reloptions instead of a system catalog, for per-table overrides of parameters. This removes a whole class of problems related to misusing the catalog, and perhaps more importantly, gives us pg_dump support for the parameters. Based on a patch by Euler Taveira de Oliveira, heavily reworked by me.</li>

<li>In pgsql/src/bin/psql/describe.c, improve psql \d+ to show TOAST reloptions too. Per complaint from ITAGAKI Takahiro.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Adopt Bob Jenkins' improved hash function for hash_any(). This changes the contents of hash indexes (again), so bump catversion. Kenneth Marshall.</li>

<li>Tweak configure to attempt to add -qnoansialias to CFLAGS whenever running on AIX with a non-gcc compiler. The previous coding would do this only if CC was exactly "xlc"; which is a bad idea, as demonstrated by trouble report from Mihai Criveti.</li>

<li>Change ALTER TABLE SET WITHOUT OIDS to rewrite the whole table to physically get rid of the OID column. This eliminates the problem discovered by Heikki back in November that 8.4's suppression of "unnecessary" junk filtering in INSERT/SELECT could lead to an Assert failure, or storing of oids into a table that shouldn't have them if Asserts are off. While that particular problem could have been solved in other ways, it seems likely to be just a forerunner of things to come if we continue to allow tables to contain rows that disagree with the pg_class.relhasoids setting. It's better to make this operation slow than to sacrifice performance or risk bugs in more common code paths. Also, add ALTER TABLE SET WITH OIDS to rewrite the table to add oids. This was a bit more controversial, but in view of the very small amount of extra code needed given the current ALTER TABLE infrastructure, it seems best to eliminate the asymmetry in features.</li>

<li>Fix UNLISTEN to fall out quickly if the current backend has never executed any LISTEN command. This is more important than it used to be because DISCARD ALL invokes UNLISTEN. Connection-pooled applications making heavy use of DISCARD ALL were seeing significant contention for pg_listener, as reported by Matteo Beccati. It seems unlikely that clients using LISTEN would use pooled connections, so this simple tweak seems sufficient, especially since the pg_listener implementation is slated to go away soon anyway. Back-patch to 8.3, where DISCARD ALL was introduced.</li>

<li>In pgsql/src/backend/catalog/information_schema.sql, a couple of marginal performance hacks for the information_schema views: replace the old recursive-SQL-function implementation of _pg_keysequal() with use of the built-in array containment operators, and change table_constraints' UNION to UNION ALL. Per discussion with Octavio Alvarez. initdb not forced since this doesn't affect results, but you'd need to initdb or reload the information_schema to see the new definitions.</li>

<li>In pgsql/doc/src/sgml/config.sgml, minor wordsmithing.</li>

<li>Teach the planner to treat a partial unique index as proving a variable is unique for a particular query, if the index predicate is satisfied. This requires a bit of reordering of operations so that we check the predicates before doing any selectivity estimates, but shouldn't really cause any noticeable slowdown. Per a comment from Michal Politowski.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/mb/Unicode/UCS_to_most.pl, add possibility to generate only some files, by passing command-line arguments.</li>

<li>In pgsql/src/backend/utils/mb/wchar.c, remove the encoding *numbers* from the comments. They are useless, and make maintenance harder.</li>

<li>Support for KOI8U encoding.</li>

<li>Only unset the locale environment when --no-locale is used (the way it was presumably designed, but didn't act). This allows running the temp install tests in a non-C locale, thus exercising users' real environments better. Document how to change locales for test runs.</li>

<li>Unset language-related locale settings in any case, otherwise psql will speak in tongues and mess up the regression test diffs.</li>

<li>The Czech (cs_CZ) and Slovak (sk_SK) locales sort numbers after letters, instead of vice versa. Update the regression test expectations to support that. In the plpgsql test, adjust the test data so that this isn't an issue. In the char and varchar tests, add new expected files.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/win32env.c, don't call SetEnvironmentVariable() when removing an environment variable, as this seems to crash on at least some versions of MingW. Our current usage of this function does not require it, so it should be ok to ignore.</li>

<li>In pgsql/src/port/kill.c, loop calling CallNamedPipe() several times in case it fails, since it can be transient failures, causing kill() to not properly send signals. Original patch from Steve Marshall, modified by me.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Do not use unsetenv.c on mingw.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in another revision of the recovery infrastructure patch.</li>

<li>Heikki Linnakangas sent in a change to the way subtransaction cache works. This is in aid of Hot Standby.</li>

<li>ITAGAKI Takahiro sent in a patch to reject toast.fillfactor as a reloption, modify the relopt_kind to bit flags, and report the relation type on "unrecognized parameter" errors.</li>

<li>Teodor Sigaev sent in another revision of the fast GIN insert patch.</li>

<li>Pavel Stehule sent in a patch to add in some parser hooks for Oracle-compatible DECODE support.</li>

<li>Jeff Davis sent in a patch to advance xmin more aggressively in long-running transactions.</li>

<li>KaiGai Kohei sent in two more revisions of the SE-PostgreSQL patch.</li>

<li>Alvaro Herrera sent in two revisions of a patch to adjust psql's describe to do the right thing in when talking to different versions of PostgreSQL (pre-8.4 vs. later) pursuant to the reloptions patch.</li>

<li>Fujii Masao sent in another revision of the synchronous replication patch.</li>

<li>Teodor Sigaev sent in another revision of the B-Tree emulation for GIN patch.</li>

<li>Andrew Chernow sent in two revisions of a patch which adds a PQInitCrypto(int) function to libpq so that it's possible to use a crypto library separately from SSL.</li>

</ul>