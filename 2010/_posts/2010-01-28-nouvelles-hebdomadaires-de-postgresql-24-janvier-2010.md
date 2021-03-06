---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 janvier 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/01/28/Nouvelles-hebdomadaires-de-PostgreSQL-24-janvier-2010"
---


<p>"PostgreSQL: Das Praxisbuch" [ndt: PostgreSQL, guide pratique] par Thomas Pfeiffer et Andreas Wenk, a &eacute;t&eacute; publi&eacute;. 

<a target="_blank" href="http://www.pg-praxisbuch.de">http://www.pg-praxisbuch.de</a></p>

<p><strong>La fonctionnalit&eacute; 8.5 de la semaine</strong></p>

<p>La syntaxe DROP IF EXISTS fonctionne &agrave; pr&eacute;sent sur les colonnes et les contraintes.</p>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-01/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; conf&eacute;rencier pour "East" est lanc&eacute; avec, comme date limite, le 30 janvier 2010. D&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le PGDay-Cuba 2010 sera tenu du 4 au 6 f&eacute;vrier 2010 &agrave; l'Universit&eacute; des Sciences Informatiques, &agrave; La Havane. Sont invit&eacute;s les participants de Cuba, de la R&eacute;publique Dominicaine et du Venezuela.</li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.postgresql.eu/events/schedule/fosdem2010/">http://www.postgresql.eu/events/schedule/fosdem2010/</a></li>

<li>Le PUG allemand aura un stand dans le "Project Lounge" du hall 2 au Cebit 2010 du 2 au 6 mars 2010 &agrave; Hanovre&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html">http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html</a></li>

<li>Le PUG allemand aura un stand au Linuxdays de Chemnitz les 13 et 14 mars 2010&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html">http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html</a></li>

<li>La "Linuxfest Northwest 2010" aura lieu &agrave; Bellingham, Washington, &Eacute;tats-Unis les 24 et 25 avril. Conf&eacute;rences, r&eacute;unions et m&eacute;c&eacute;nat sont proposables&nbsp;: 

<a target="_blank" href="http://linuxfestnorthwest.org/">http://linuxfestnorthwest.org/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 3 au 7 mai 2010 sur le sujet "PostgreSQL for Corporate Use". D&eacute;tails ci-dessous&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html">http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html</a></li>

<li>La PgCon 2010 aura lieu les 20 &amp; 21 mai 2010 &agrave; Ottawa avec des tutoriels les 18 et 19. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;! 

<a target="_blank" href="http://www.pgcon.org/2010/papers.php">http://www.pgcon.org/2010/papers.php</a></li>

<li>L'appel aux propositions est lanc&eacute; pour l'OSCON, qui aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8">http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100124">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<ul>

<li>Hitoshi Harada reviewed Magnus Hagander's patch to add RADIUS authentication.</li>

<li>Hitoshi Harada reviewed the Typed Table patch. It needs work.</li>

<li>Gregory Stark reviewed the patch to speed up CREATE DATABASE.</li>

<li>Brad T. Sliger reviewed the patch to pretty-print trigger functions. The first patch no longer applied cleanly, but the second one did.</li>

<li>Kevin Grittner reviewed the patch to allow substring and replace to get and set bit values.</li>

<li>Jeff Davis reviewed Joachim Wieland's patch to fix listen and notify behavior when the queue is full.</li>

<li>Michael Meskes reviewed Zoltan Boszormenyi's patch to add out-of-scope cursor support in ECPG native mode. There were some issues with the header files. Zoltan Boszormenyi fixed this in a later patch.</li>

<li>Jaime Casanova reviewed Zoltan Boszormenyi's lock_timeout GUC patch and pronounced it "Ready for Committer."</li>

<li>Pavel Stehule reviewed Hitoshi Harada's new patch to add more frame options to windowing functions and pronounced it "Ready for Committer."</li>

<li>Andreas Freund reviewed Gregory Stark's patch to speed up CREATE DATABASE.</li>

<li>David Wheeler reviewed Pavel Stehule's patch to add a listagg() aggregate.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/gin/ginscan.c, fix incorrect comparison of scan key in GIN. Per report from Vyacheslav Kalinin.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/optimizer/plan/subselect.c, fix an oversight in convert_EXISTS_sublink_to_join: we can't convert an EXISTS that contains a WITH clause. This would usually lead to a "could not find CTE" error later in planning, because the WITH wouldn't get processed at all. Noted while playing with an example from Ken Marshall.</li>

<li>Add "USING expressions" option to plpgsql's OPEN cursor FOR EXECUTE. This is the last EXECUTE-like plpgsql statement that was missing the capability of inserting parameter values via USING. Pavel Stehule, reviewed by Itagaki Takahiro.</li>

<li>Add pg_table_size() and pg_indexes_size() to provide more user-friendly wrappers around the pg_relation_size() function. Bernd Helmle, reviewed by Greg Smith.</li>

<li>In pgsql/src/backend/optimizer/util/clauses.c, fix thinko in my recent change to put an explicit argisrow field in NullTest: when the planner splits apart a ROW(...) IS NULL test, the argisrow values of the component tests have to be determined from the component field types, not copied from the original NullTest (in which argisrow is surely true).</li>

<li>When doing a parallel restore, we must guard against out-of-range dependency dump IDs, because the array we're using is sized according to the highest dump ID actually defined in the archive file. In a partial dump there could be references to higher dump IDs that weren't dumped. Treat these the same as references to in-range IDs that weren't dumped. (The whole thing is a bit scary because the missing objects might have been part of dependency chains, which we won't know about. Not much we can do though --- throwing an error is probably overreaction.) Also, reject parallel restore with pre-1.8 archive version (made by pre-8.0 pg_dump). In these old versions the dependency entries are OIDs, not dump IDs, and we don't have enough information to interpret them. Per bug #5288 from Jon Erdman.</li>

<li>In pgsql/src/backend/Makefile, well, the systemtap guys moved the goalposts again: with the latest version, we *must* generate probes.o or the dtrace probes don't work. Revert our workaround for their previous bug. Details at 

<a target="_blank" href="https://bugzilla.redhat.com/show_bug.cgi?id=557266">https://bugzilla.redhat.com/show_bug.cgi?id=557266</a></li>

<li>In pgsql/src/backend/utils/adt/dbsize.c, insert CHECK_FOR_INTERRUPTS calls into loops in dbsize.c, to ensure that the various disk-size-reporting functions will respond to query cancel reasonably promptly even in very large databases. Per report from Kevin Grittner.</li>

<li>Fix assorted core dumps and Assert failures that could occur during AbortTransaction or AbortSubTransaction, when trying to clean up after an error that prevented (sub)transaction start from completing: 1. access to TopTransactionResourceOwner that might not exist 2. assert failure in AtEOXact_GUC, if AtStart_GUC not called yet 3. assert failure or core dump in AfterTriggerEndSubXact, if AfterTriggerBeginSubXact not called yet. Per testing by injecting elog(ERROR) at successive steps in StartTransaction and StartSubTransaction. It's not clear whether all of these cases could really occur in the field, but at least one of them is easily exposed by simple stress testing, as per my accidental discovery yesterday.</li>

<li>Apply Tcl_Init() to the "hold" interpreter created by pltcl. You might think this is unnecessary since that interpreter is never used to run code --- but it turns out that's wrong. As of Tcl 8.5, the "clock" command (alone among builtin Tcl commands) is partially implemented by loaded-on-demand Tcl code, which means that it fails if there's not unknown-command support, and also that it's impossible to run it directly in a safe interpreter. The way they get around the latter is that Tcl_CreateSlave() automatically sets up an alias command that forwards any execution of "clock" in a safe slave interpreter to its parent interpreter. Thus, when attempting to execute "clock" in trusted pltcl, the command actually executes in the "hold" interpreter, where it will fail if unknown-command support hasn't been introduced by sourcing the standard init.tcl script, which is done by Tcl_Init(). (This is a pretty dubious design decision on the Tcl boys' part, if you ask me ... but they didn't.) Back-patch all the way. It's not clear that anyone would try to use ancient versions of pltcl with a recent Tcl, but it's not clear they wouldn't, either. Also add a regression test using "clock", in branches that have regression test support for pltcl. Per recent trouble report from Kyle Bateman.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/nodes/read.c, cast slightly abused enum to int, so that GCC 4.5 won't warn about switch cases that are not part of the enum's definition.</li>

<li>In pgsql/src/backend/commands/typecmds.c, before attempting to create a composite type, check whether a type of that name already exists, so we'd get an error message about a "type" instead of about a "relation", because the composite type code shares code with relation creation.</li>

<li>Fix several oversights in previous commit - attribute options patch. I failed to 'cvs add' the new files and also neglected to bump catversion.</li>

<li>Fix mismatched tags introduced by attribute options patch. Thanks to Devrim GUNDUZ for the report.</li>

<li>Add user-specific .pg_service.conf file. This extends the existing pg_service.conf facility to first look for a service definition file in the user's home directory.</li>

<li>PL/Python DO handler. Also cleaned up some redundancies between the primary error messages and the error context in PL/Python. Hannu Valtonen.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Add pg_stat_reset_shared('bgwriter') to reset the cluster-wide shared statistics of the bgwriter. Greg Smith.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, add missing closing tag.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/libpq.sgml, reformat documentation of libpq escaping functions. Modify the "Escaping Strings for Inclusion in SQL Commands" section to use a &lt;variablelist&gt; as the preceding and following sections do, and merge the "Escaping Binary Strings for Inclusion in SQL Commands" section into it. This changes only the formatting of these sections, not the content. It is intended to lay the groundwork for a follow-on patch to add some new escaping functions, but it makes sense to commit this first, for clarity.</li>

<li>In pgsql/doc/src/sgml/plperl.sgml, fix doc build, which was broken by PL/perl utility functions patch.</li>

<li>Add new escaping functions PQescapeLiteral and PQescapeIdentifier. PQescapeLiteral is similar to PQescapeStringConn, but it relieves the caller of the need to know how large the output buffer should be, and it provides the appropriate quoting (in addition to escaping special characers within the string). PQescapeIdentifier provides similar functionality for escaping identifiers. Per recent discussion with Tom Lane.</li>

<li>In pgsql/src/interfaces/libpq/fe-exec.c, fix unsafe loop test, and declare as_ident as bool rather than int.</li>

<li>Replace ALTER TABLE ... SET STATISTICS DISTINCT with a more general mechanism. Attributes can now have options, just as relations and tablespaces do, and the reloptions code is used to parse, validate, and store them. For simplicity and because these options are not performance critical, we store them in a separate cache rather than the main relcache. Thanks to Alex Hunsaker for the review.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Add utility functions to PLPerl: quote_literal, quote_nullable, quote_ident, encode_bytea, decode_bytea, looks_like_number, encode_array_literal, encode_array_constructor. Split SPI.xs into two - SPI.xs now contains only SPI functions. Remainder are in new Util.xs. Some more code and documentation cleanup along the way, as well as adding some CVS markers to files missing them. Original patch from Tim Bunce, with a little editing from me.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, build plperl's new Util.xs</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, fix typo in Mkvcbuild.pl</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Rethink the way walreceiver is linked into the backend. Instead than shoving walreceiver as whole into a dynamically loaded module, split the libpq-specific parts of it into dynamically loaded module and keep the rest in the main backend binary. Although Tom fixed the Windows compilation problems with the old walreceiver module already, this is a cleaner division of labour and makes the code more readable. There's also the prospect of adding new transport methods as pluggable modules in the future, which this patch makes easier, though for now the API between libpqwalreceiver and walreceiver process should be considered private. The libpq-specific module is now in src/backend/replication/libpqwalreceiver, and the part linked with postgres binary is in src/backend/replication/walreceiver.c.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, adjust MSVC build script too, now that the walreceiver dynamic module has been renamed.</li>

<li>Adjust windows makefiles too, now that the walreceiver dynamic module has been renamed.</li>

<li>In pgsql/src/backend/replication/libpqwalreceiver/libpqwalreceiver.c, add missing "!= NULL", for the sake of consistency. Fujii Masao</li>

<li>Now that much of walreceiver has been pulled back into the postgres binary, revert PGDLLIMPORT decoration of global variables. I'm not sure if there's any real harm from unnecessary PGDLLIMPORTs, but these are all internal variables that external modules really shouldn't be messing with. ThisTimeLineID still needs PGDLLIMPORT.</li>

<li>Write a WAL record whenever we perform an operation without WAL-logging that would've been WAL-logged if archiving was enabled. If we encounter such records in archive recovery anyway, we know that some data is missing from the log. A WARNING is emitted in that case. Original patch by Fujii Masao, with changes by me.</li>

<li>In pgsql/src/backend/replication/libpqwalreceiver/Makefile, fix bogus subdir setting. Again. I must've unfixed it by accident while moving files around.</li>

<li>In pgsql/src/backend/replication/walsender.c, fix bogus comments.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/ipc/procarray.c, better internal documentation of locking for Hot Standby conflict resolution. Discuss the reasons for the lock type we hold on ProcArrayLock while deriving the conflict list. Cover the idea of false positive conflicts and seemingly strange effects on snapshot derivation.</li>

<li>In pgsql/src/backend/tcop/postgres.c, add missing flag reset to ensure subsequent manual cancelation gives correct reason.</li>

<li>In Hot Standby, Startup process sets SIGALRM when waiting for buffer pin. If woken by alarm we send SIGUSR1 to all backends requesting that they check to see if they are blocking Startup process. If so, they throw ERROR/FATAL as for other conflict resolutions. Deadlock stop gap removed. max_standby_delay = -1 option removed to prevent deadlock. Review by Andres Freund and Hiroyuki Yamada.</li>

<li>In pgsql/src/backend/tcop/postgres.c, add explanatory detail to Hot Standby cancelation error messages with errdetail(). Add errhint() to suggest retry in certain cases.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>Adjust psql to use pg_get_triggerdef(pretty=true) to remove extra ()'s from description of triggers with WHEN clause. Thanks to Brad T. Sliger for the review.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Applied patch by Zoltan Boszormenyi to fix problem in auto-prepare mode if the connection is closed and re-opened and the previously prepared query is issued again.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/prepare.c, make argument const char * as per ITAGAKI Takahiro's suggestion.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/docguide.sgml, document that the HTML documentation must be built before the PDF documentation.</li>

<li>Revert mention that HTML documentation has to be built first. Now require gmake 3.79.1 or later to build source/sgml.</li>

</ul>

<p>Joe Conway a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, rewrite dblink_record_internal() and dblink_fetch() to use a tuplestore (SFRM_Materialize mode) to return tuples. Since we don't return from the dblink function in tuplestore mode, release the PGresult with a PG_CATCH block on error. Also rearrange to share the same code to materialize the tuplestore. Patch by Takahiro Itagaki.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in another revision of the SQL syntax patch for partitioning.</li>

<li>Per review, Leonardo Francalanci sent in another revision of the patch to allow substring() and replace() to get and set bit values.</li>

<li>Robert Haas sent in two more revisions of the patch to add quoting behavior to psql variables.</li>

<li>ITAGAKI Takahiro sent in another revision of the pretty-printed trigger patch for psql per feedback from Brad T. Sliger.</li>

<li>Arnaud Betremieux sent in a patch atop the listen/notify patch for "full queue" which adds a send_notify SQL function that calls the Async_Notify C function.</li>

<li>Zoltan Boszormenyi sent in another revision of the ECPG patch to add out-of-scope cursor support in native mode per review by Michael Meskes.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to fix auto-prepare. Zoltan Boszormenyi sent another patch in response.</li>

<li>Hitoshi Harada sent in another revision of the patch to make ROWS and RANGE more capable in windowing functions.</li>

<li>David Christensen sent in two revisions of a patch for psql which pulls up context-specific help when people type in certain mysql-centric commands.</li>

<li>Gregory Stark sent in another revision of the patch to speed up CREATE DATABASE.</li>

<li>Simon Riggs sent in two revisions of a patch to fix a problem where a hot standby node can freeze when the startup process calls LockBufferForCleanup(), the second per review by Hiroyuki Yamada.</li>

<li>Magnus Hagander sent in a patch to sync the git repo with CVS.</li>

<li>Zoltan Boszormenyi sent in another revision of the lock_timeout GUC patch.</li>

<li>Heikki Linnakangas sent in another streaming replication patch.</li>

<li>Leonardo Francalanci sent in another revision of the patch to let substring/replace get and set bit values. Kevin Grittner reviewed and sent in an updated patch.</li>

<li>Kevin Grittner sent in another revision of the SIREAD locks patch for truly serializable transaction isolation.</li>

<li>Pavel Stehule sent in two more revisions of the psql variable quoting patch.</li>

<li>Guillaume Lelarge sent in another revision of the application name patch.</li>

<li>Heikki Linnakangas sent in a patch intended to fix streaming replication on Win32.</li>

<li>Fujii Masao sent in a patch to help streaming replication deal with a "disk full" condition on the primary.</li>

<li>Peter Eisentraut sent in a patch intended to make the error message for duplicate keys more specific in the primary key case.</li>

<li>Joachim Wieland sent in another revision of the patch to fix the case when queue is full on LISTEN/NOTIFY.</li>

<li>Alex Hunsaker sent in a patch to fix some minor items atop Tim Bunce's patch to fix PL/Perl.</li>

<li>KaiGai Kohei sent in another revision of the patch to add access controls to large objects.</li>

<li>David Christensen sent in a patch to add a regschema OID type. This would be castable.</li>

<li>Bernd Helmle sent in another revision of the patch to fix multiply inherited column names in ALTER TABLE...RENAME.</li>

<li>Hitoshi Harada sent in another revision of the patch to expand windowing functions along the lines of ROWS and RANGE.</li>

<li>Robert Haas sent in a patch to add hash details to EXPLAIN.</li>

<li>Teodor Sigaev sent in another revision of the patch to add red-black trees to GIN.</li>

<li>Magnus Hagander sent in another revision of the patch to add RADIUS authentication.</li>

<li>KaiGai Kohei sent in two patches to refactor the ALTER TABLE privilege checks.</li>

<li>Magnus Hagander sent in two revisions of a patch to add functions which can reset a single statistics counter.</li>

</ul>