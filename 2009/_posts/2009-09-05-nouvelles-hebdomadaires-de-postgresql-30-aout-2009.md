---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 août 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-09-05-nouvelles-hebdomadaires-de-postgresql-30-aout-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-08/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La "PyCon Argentina" aura lieu &agrave; Buenos Aires les 4 &amp; 5 septembre 2009&nbsp;: 

<a target="_blank" href="http://ar.pycon.org/2009/">http://ar.pycon.org/2009/</a></li>

<li>SFPUG pr&eacute;sente&nbsp;: Nathan Boley, &laquo;&nbsp;Statistiques et Postgres.&raquo; 8 septembre 2009. D&eacute;tails et webcast en direct&nbsp;: 

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/11030245/">http://postgresql.meetup.com/1/calendar/11030245/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 7 au 11 septembre 2009 sur le sujet "PostgreSQL for Corporate Use". D&eacute;tails ci-dessous&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html">http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html</a></li>

<li>Il y aura une conf&eacute;rence &agrave; Athens (Georgie, &Eacute;tats-Unis) le 19 septembre 2009. L'appel aux conf&eacute;rences est ouvert&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/pgday/athens">http://www.postgresqlconference.org/2009/pgday/athens</a></li>

<li>Une suite de conf&eacute;rences est organis&eacute;e &agrave; Seattle (&Eacute;tat de Washington, &Eacute;tats-Unis) du 16 au 18 octobre 2009. L'appel &agrave; conf&eacute;rences est ouvert&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009. L'appel &agrave; conf&eacute;rences est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/chamadas.en.php">http://pgcon.postgresql.org.br/2009/chamadas.en.php</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech [ndt: ENST ?]&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>L'OpenSQL Camp de Portland est &agrave; la recherche de sponsors. Pensez &agrave; votre voyage d&egrave;s maintenant&nbsp;!&nbsp;:) 

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement &agrave; l'occasion du 10<sup>&egrave;me</sup> anniversaire du JPUG est programm&eacute; pour les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japon&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Run the "tablespace" regression test first not last. The former placement renders useless one of the few test methodologies we have for WAL replay, which is to intentionally crash the system just after completing the regression tests and see if it recovers to the expected database state. The reason is that DROP TABLESPACE forces a checkpoint, so there's essentially no WAL available for replay after the tests complete.</li>

<li>In pgsql/src/bin/psql/input.h, fix inclusions of readline/editline header files so that we only attempt to #include the version of history.h that is in the same directory as the readline.h we are using. This avoids problems in some scenarios where both readline and editline are installed. Report and patch by Zdenek Kotala.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, small correction to previous patch: we shouldn't ReleasePostmasterChildSlot for a dead_end child, because we didn't AssignPostmasterChildSlot.</li>

<li>Try to make silent_mode behave somewhat reasonably. Instead of sending stdout/stderr to /dev/null after forking away from the terminal, send them to postmaster.log within the data directory. Since this opens the door to indefinite logfile bloat, recommend even more strongly that log output be redirected when using silent_mode. Move the postmaster's initial calls of load_hba() and load_ident() down to after we have started the log collector, if we are going to. This is so that errors reported by them will appear in the "usual" place. Reclassify silent_mode as a LOGGING_WHERE, not LOGGING_WHEN, parameter, since it's got absolutely nothing to do with the latter category. In passing, fix some obsolete references to -S ... this option hasn't had that switch letter for a long time. Back-patch to 8.4, since as of 8.4 load_hba() and load_ident() are more picky (and thus more likely to fail) than they used to be. This entire change was driven by a complaint about those errors disappearing into the bit bucket.</li>

<li>In pgsql/src/backend/utils/adt/geo_ops.c, remove some unnecessary variable assignments, per results of "clang" static checker. Paul Matthews.</li>

<li>Make it reasonably safe to use pg_ctl to start the postmaster from a boot-time script. To do this, have pg_ctl pass down its parent shell's PID in an environment variable PG_GRANDPARENT_PID, and teach CreateLockFile() to disregard that PID as a false match if it finds it in postmaster.pid. This allows us to cope with one level of postgres-owned shell process even with pg_ctl in the way, so it's just as safe as starting the postmaster directly. You still have to be careful about how you write the initscript though. Adjust the comments in contrib/start-scripts/ to not deprecate use of pg_ctl. Also, fix the ROTATELOGS option in the OSX script, which was indulging in exactly the sort of unsafe coding that renders this fix pointless :-( . A pipe inside the "sudo" will probably result in more than one postgres-owned process hanging around.</li>

<li>In pgsql/src/Makefile.shlib, make the .DEF file generation rules safe against tabs in exports.txt. Per bug #5016, although I think the MSVC build scripts may need a similar fix.</li>

<li>Modify the definition of window-function PARTITION BY and ORDER BY clauses so that their elements are always taken as simple expressions over the query's input columns. It originally seemed like a good idea to make them act exactly like GROUP BY and ORDER BY, right down to the SQL92-era behavior of accepting output column names or numbers. However, that was not such a great idea, for two reasons: 1. It permits circular references, as exhibited in bug #5018: the output column could be the one containing the window function itself. (We actually had a regression test case illustrating this, but nobody thought twice about how confusing that would be.) 2. It doesn't seem like a good idea for, eg, "lead(foo) OVER (ORDER BY foo)" to potentially use two completely different meanings for "foo". Accordingly, narrow down the behavior of window clauses to use only the SQL99-compliant interpretation that the expressions are simple expressions.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, non-Windows EXEC_BACKEND path was broken by recent write_inheritable_socket change ... it's got to return true.</li>

<li>Remove useless code that propagated FrontendProtocol to a backend via a PostgresMain switch. In point of fact, FrontendProtocol is already set in a backend process, since ProcessStartupPacket() is executed inside the backend --- it hasn't been run by the postmaster for many years. And if it were, we'd still certainly want FrontendProtocol to be set before we get as far as PostgresMain, so that startup errors get reported in the right protocol. -v might have some future use in standalone backends, so I didn't go so far as to remove the switch outright. Also, initialize FrontendProtocol to 0 not PG_PROTOCOL_LATEST. The only likely result of presetting it like that is to mask failure-to-set-it mistakes.</li>

<li>Remove the use of the pg_auth flat file for client authentication. (That flat file is now completely useless, but removal will come later.) To do this, postpone client authentication into the startup transaction that's run by InitPostgres. We still collect the startup packet and do SSL initialization (if needed) at the same time we did before. The AuthenticationTimeout is applied separately to startup packet collection and the actual authentication cycle. (This is a bit annoying, since it means a couple extra syscalls; but the signal handling requirements inside and outside a transaction are sufficiently different that it seems best to treat the timeouts as completely independent.) A small security disadvantage is that if the given database name is invalid, this will be reported to the client before any authentication happens. We could work around that by connecting to database "postgres" instead, but consensus seems to be that it's not worth introducing such surprising behavior. Processing of all command-line switches and GUC options received from the client is now postponed until after authentication. This means that PostAuthDelay is much less useful than it used to be --- if you need to investigate problems during InitPostgres you'll have to set PreAuthDelay instead. However, allowing an unauthenticated user to set any GUC options whatever seems a bit too risky, so we'll live with that.</li>

<li>Remove duplicate variable initializations identified by clang static checker. One of these represents a nontrivial bug (a promptly-leaked palloc), so backpatch. Greg Stark</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, remove some useless assignments of the result of fread(). Quiets warnings from clang static checker, and makes the code more readable anyway IMO.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_backup_custom.c, remove unused variable. Per Grzegorz Jaskiewicz's report from LLVM static checker.</li>

<li>Avoid calling kill() in a postmaster signal handler. This causes problems when the system load is high, per report from Zdenek Kotala in &lt;1250860954.1239.114.camel@localhost&gt;; instead of calling kill directly, have the signal handler set a flag which is checked in ServerLoop. This way, the handler can return before being called again by a subsequent signal sent from the autovacuum launcher. Also, increase the sleep in the launcher in this failure path to 1 second. Backpatch to 8.3, which is when the signalling between autovacuum launcher/postmaster was introduced. Also, add a couple of ReleasePostmasterChildSlot calls in error paths; this part backpatched to 8.4 which is when the child slot stuff was introduced.</li>

<li>Fix handling of autovacuum reloptions. In the original coding, setting a single reloption would cause default values to be used for all the other reloptions. This is a problem particularly for autovacuum reloptions. Itagaki Takahiro</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Make PL/Python tests more compatible with Python 3. This changes a bunch of incidentially used constructs in the PL/Python regression tests to equivalent constructs in cases where Python 3 no longer supports the old syntax. Support for older Python versions is unchanged.</li>

<li>Use generic attribute management in PL/Python. Switch the implementation of the plan and result types to generic attribute management, as described at &lt; 

<a target="_blank" href="http://docs.python.org/extending/newtypes.html%3E.">http://docs.python.org/extending/newtypes.html&gt;.</a> This modernizes and simplifies the code a bit and prepares for Python 3.1, where the old way doesn't work anymore.</li>

<li>Enhanced error context support in PL/Python. Extract the "while creating return value" and "while modifying trigger row" parts of some error messages into another layer of error context. This will simplify the upcoming patch to improve data type support, but it can stand on its own.</li>

<li>In pgsql/doc/src/sgml/stylesheet.css, update the documentation CSS stylesheet to current web site style.</li>

<li>In pgsql/doc/src/sgml/stylesheet.css, correct my overly enthusiastic CSS simplification.</li>

<li>In pgsql/src/backend/parser/Makefile, add -Wno-error to CFLAGS from gram.o as long as it's broken.</li>

<li>Update of install-sh, mkinstalldirs, and associated configury. Update install-sh to that from Autoconf 2.63, plus our Darwin-specific changes (which I simplified a bit). install-sh is now able to install multiple files in one run, so we could simplify our makefiles sometime. install-sh also now has a -d option to create directories, so we don't need mkinstalldirs anymore. Use AC_PROG_MKDIR_P in configure.in, so we can use mkdir -p when available instead of install-sh -d. For consistency with the rest of the world, the corresponding make variable has been renamed from $(mkinstalldirs) to $(MKDIR_P).</li>

<li>Derived files that are shipped in the distribution used to be built in the source directory even for out-of-tree builds. They are now also built in the build tree. This should be more convenient for certain developers' workflows, and shouldn't really break anything else.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Update release notes for 7.4.26, 8.0.22, 8.1.18, 8.2.14, 8.3.8, 8.4.1.</li>

<li>In pgsql/src/tools/pgcvslog, remove handling of CVS entries for TODO/FAQ, because they are removed now.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, in the checkpoint written at the end of archive recovery, the WAL page header was incorrectly initialized with timeline ID 0. That rendered the WAL page unrecoverable, making a subsequent archive recovery stop at that point. ThisTimeLineID needs to be initialized before calling AdvanceXLInsertBuffer(). This fixes bug #5011 reported by James Bardin. Backpatch to 8.4, as the bug was introduced by the changes to use of bgwriter for writing the end-of-archive-recovery checkpoint. Patch by Tom Lane.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/compatlib/exports.txt, exports.txt needs to use spaces as separators, not tabs, to work properly with the sed rules.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Paul Matthews sent in another revision of the patch to implement hypot().</li>

<li>Tom Lane sent in a WIP patch to move HBA validation after startup, which is intended to fix a problem reported by Andrew Dunstan with silent startup mode.</li>

<li>Pavel Stehule sent in another revision of the patch to fix named/mixed notation.</li>

<li>KaiGai Kohei sent in a patch to redo the access control facilities.</li>

<li>Roger Leigh sent in an updated patch to allow psql to use Unicode formatting characters for pretty-printing.</li>

<li>Alvaro Herrera sent in a WIP patch to allow for per-role, per-database default GUC settings.</li>

<li>Andrew Dunstan sent in three revisions of a patch to make the output of the pretty print option for pg_get_viewdef() more readable.</li>

<li>Kevin Grittner sent in two revisions of a LSB conforming launcher script.</li>

<li>Grzegorz Jaskiewicz sent in a patch to fix some issues raised by the clang reports.</li>

<li>Roger Leigh sent in another revision of the Unicode pretty-printing patch for psql.</li>

<li>Pavel Stehule sent in a WIP patch to make cursor operations in PL/pgsql feature-complete and compatible with that in SQL.</li>

<li>Robert Haas sent in another revision of the join removal patch.</li>

<li>KaiGai Kohei sent in a patch which adds access control features to large objects.</li>

<li>Paul Matthews sent in two more revisions of the hypot() patch.</li>

<li>Greg Sabino Mullane sent in a patch to add YAML as an output format for EXPLAIN.</li>

<li>Peter Eisentraut sent in a patch to log parameter changes.</li>

<li>Jeff Janes sent in a patch to implement Simon Riggs' LWLock Queue Jumping idea.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of the GRANT ON ALL IN schema patch.</li>

<li>Marko (johto) Tiikkaja sent in a WIP patch to refactor the executor in preparation for making (INSERT|UPDATE|DELETE)...RETURNING work inside CTEs.</li>

</ul>