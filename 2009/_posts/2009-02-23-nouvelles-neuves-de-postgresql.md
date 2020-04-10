---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2009-02-23-nouvelles-neuves-de-postgresql "
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

<li>In pgsql/src/bin/pg_dump/pg_dump.c, uppercase keywords.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, wrap some long queries.</li>

<li>Add pg_dump --binary-upgrade flag to be used by binary upgrade utilities. The new code allows transfer of dropped column information to the upgraded server.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, add missing newline.</li>

<li>Have pg_dump/pg_dumpall --binary-upgrade restore frozenids for relations and databases.</li>

<li>Add --freeze option to vacuumdb.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove gettext trigger write_stderr(), which isn't used by PLs.</li>

<li>In pgsql/src/pl/plpgsql/src/plpgsql.h, redefine _() to dgettext() instead of gettext() so that it uses the plpgsql text domain, instead of the postgres one (or whatever the default may be).</li>

<li>Mark 3rd argument of validate_tupdesc_compat() for translation, instead of marking up each instance separately.</li>

<li>In pgsql/src/pl/plpgsql/src/nls.mk, add plpgsql_yyerror to gettext triggers.</li>

<li>In pgsql/src/pl/plpgsql/src/scan.l, add _() calls for the argument of plpgsql_yyerror() so it actually gets translated somehow.</li>

<li>Message wordsmithing</li>

<li>In pgsql/src/pl/plperl/nls.mk, remove croak and Perl_croak from gettext triggers. While we could selectively mark up their arguments for translation, the Perl xsubpp tool generates a bunch of additional Perl_croak calls that we cannot control, so we'd be creating a confusing mix of translated and untranslated messages of a similar kind. This is something that might deserve a more comprehensive solution later. Also remove _ from gettext triggers, because it wasn't used. Use SPI.c instead of SPI.xs as source file for xgettext, because the .xs format isn't really supported in xgettext.</li>

<li>In pgsql/src/Makefile.global.in, add an implicit rule %.c -&gt; %.i for running the C preprocessor. I occasionally use this for debugging, and it seems wasteful to have to reinvent this all the time.</li>

<li>Wordsmithing for PL/Perl messages</li>

<li>In pgsql/src/pl/plperl/plperl.c, another small message tweak.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Start background writer during archive recovery. Background writer now performs its usual buffer cleaning duties during archive recovery, and it's responsible for performing restartpoints. This requires some changes in postmaster. When the startup process has done all the initialization and is ready to start WAL redo, it signals the postmaster to launch the background writer. The postmaster is signaled again when the point in recovery is reached where we know that the database is in consistent state. Postmaster isn't interested in that at the moment, but that's the point where we could let other backends in to perform read-only queries. The postmaster is signaled third time when the recovery has ended, so that postmaster knows that it's safe to start accepting connections. The startup process now traps SIGTERM, and performs a "clean" shutdown. If you do a fast shutdown during recovery, a shutdown restartpoint is performed, like a shutdown checkpoint, and postmaster kills the processes cleanly. You still have to continue the recovery at next startup, though. Currently, the background writer is only launched during archive recovery. We could launch it during crash recovery as well, but it seems better to keep that codepath as simple as possible, for the sake of robustness. And it couldn't do any restartpoints during crash recovery anyway, so it wouldn't be that useful. log_restartpoints is gone. Use log_checkpoints instead. This is yet to be documented. This whole operation is a pre-requisite for Hot Standby, but has some value of its own whether the hot standby patch makes 8.4 or not. Simon Riggs, with lots of modifications by me.</li>

<li>In pgsql/src/include/storage/proc.h, increase NUM_AUXILIARY_PROCS, now that the startup process can co-exist with other auxiliary processes for a short period. As witnessed by buildfarm member dungbeetle.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, fix bogus comment, from the patch to start bgwriter during archive recovery.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove the special cases to prevent minus-zero results in float4 and float8 unary minus operators. We weren't attempting to prevent minus zero anywhere else; in view of our gradual trend to make the float datatypes more IEEE standard compliant, we should allow minus zero here rather than disallow it elsewhere. We don't, however, expect that all platforms will produce minus zero, so we need to adjust the one affected regression test to allow both results. Per discussion of bug #4660. (In passing, clean up a couple other minor infelicities in float.c.)</li>

<li>In pgsql/src/backend/optimizer/path/joinrels.c, improve comments about semijoin implementation strategy, per a question from Robert Haas.</li>

<li>In pgsql/src/backend/optimizer/plan/initsplan.c, simplify overcomplicated (and overly restrictive) test to see whether an IS NULL condition is rendered redundant by detection of an antijoin. If we know that a join is an antijoin, then *any* Var coming out of its righthand side must be NULL, not only the joining column(s). Also, it's still gonna be null after being passed up through higher joins, whether they're outer joins or not. I was misled by a faulty analogy to reduce_outer_joins() in the original coding. But consider select * from a left join b on a.x = b.y where b.y is null and b.z is null; The first IS NULL condition justifies deciding that the join is an antijoin (if the = is strict) and then the second one is just plain redundant.</li>

<li>In pgsql/doc/src/sgml/config.sgml, add note that inlined SQL functions aren't tracked by track_functions.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, reconnect to the right database when using parallel restore with -C. Fixes bug reported by Olivier Prenant</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Teodor Sigaev sent in two variants of the GIN fast insert patch, then a follow-up patch per feedback from Robert Haas.</li>

<li>Robert Haas sent in another revision of the patch to improve the performance of multi-batchhash joins for skewed data sets.</li>

<li>Andrew Chernow sent in a patch which implements PQinitSecure in libpq and a follow-up patch to fix a bug in the first one.</li>

<li>Heikki Linnakangas sent in a patch which makes the postmaster wait for a startup process signal in particular before allowing general access.</li>

<li>ITAGAKI Takahiro sent in a patch to allow parse_bool* to take 'on' and 'off' as options.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patches.</li>

<li>Adriano Lange sent in a patch to allow graph representation of structures in the optimizer.</li>

</ul>