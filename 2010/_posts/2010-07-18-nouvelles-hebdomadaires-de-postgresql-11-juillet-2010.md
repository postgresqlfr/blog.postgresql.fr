---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 juillet 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/07/18/Nouvelles-hebdomadaires-de-PostgreSQL-11-juillet-2010"
---


<p>PostgreSQL 9.0 beta 3 sera bient&ocirc;t disponible [ndt: <a href="http://blog.postgresql.fr/index.php?post/2010/07/13/Sortie-de-la-verion-beta-3-de-PostgreSQL-9.0">article d&eacute;di&eacute;</a>].Pr&eacute;parez-vous &agrave; tester&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/developer/beta">http://www.postgresql.org/developer/beta</a></p>

<p>Rassemblement PostgreSQL/PostGIS le 14 juillet 2010 &agrave; 18h, &agrave; Zurich (Suisse) au bOm kultur caf&eacute; &amp; bar &agrave; l'ETH [ndt: institut f&eacute;d&eacute;ral technologique] Zurich. Informations et inscriptions (informelles)&nbsp;: 

<a target="_blank" href="http://www.gis.hsr.ch/wiki/Agenda">http://www.gis.hsr.ch/wiki/Agenda</a></p>

<p>Reuven Lerner donnera un cours de 5 jours sur PostgreSQL du 1er au 5 ao&ucirc;t au "Hi-Tech College" de Herzliya (Isra&euml;l)&nbsp;: 

<a target="_blank" href="http://www.hi-tech.co.il/college/default.asp?PageID=12&amp;CourseNum=4288">http://www.hi-tech.co.il/college/default.asp?PageID=12&amp;CourseNum=4288</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Benetl 3.5, un ETL pour fichiers utilisant PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>DataArchitect 4.2, un outil de dessin de diagramme relationnel et d'ing&eacute;nierie inverse compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.thekompany.com/products/dataarchitect/">http://www.thekompany.com/products/dataarchitect/</a></li>

<li>PostgreSQL Maestro 10.7, un outil d'administration graphique pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></li>

<li>Muldis-D 0.130.0, une sp&eacute;cification pour un langage objet-relationnel pr&eacute;vu pour utiliser, entre autres syst&egrave;mes, PostgreSQL&nbsp;: 

<a target="_blank" href="http://muldis.com/Muldis_D.html">http://muldis.com/Muldis_D.html</a></li>

<li>RHQ 3.0.0, une application de gestion et de surveillance&nbsp;: 

<a target="_blank" href="http://rhq-project.org/">http://rhq-project.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-07/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PDXPUG Day est programm&eacute; pour le 18 juillet 2010 &agrave; "l'Oregon Convention Center" &agrave; Portland. D'avantage d'informations&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PDXPUGDay2010">http://wiki.postgresql.org/wiki/PDXPUGDay2010</a></li>

<li>L'OSCON aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://www.oscon.com/oscon2010">http://www.oscon.com/oscon2010</a></li>

<li>La FrOSCon 2010 aura lieu &agrave; St. Augustin, Allemagne les 21 &amp; 22 ao&ucirc;t 2010. Le PUG allemand a obtenu sa propre salle de dev. et est &agrave; la recherche de conf&eacute;renciers. Plus de d&eacute;tails&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html">http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100711">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<p>KaiGai Kohei reviewed Robert Haas's patch to add get_whatever_oid functionality.</p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Improve pg_dump's checkSeek() function to verify the functioning of ftello as well as fseeko, and to not assume that fseeko(fp, 0, SEEK_CUR) proves anything. Also improve some related comments. Per my observation that the SEEK_CUR test didn't actually work on some platforms, and subsequent discussion with Robert Haas. Back-patch to 8.4. In earlier releases it's not that important whether we get the hasSeek test right, but with parallel restore it matters.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, add compatibility note warning that plpgsql is now stricter about the column datatypes of composite results, per gripe from Marcel Asio. Some desultory copy-editing of plpgsql-related sections of the release notes.</li>

<li>Get rid of some more stuff in pg_upgrade that duplicates c.h or port.h.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, fix assorted misstatements and poor wording in the descriptions of the I/O formats for geometric types. Per bug #5536 from Jon Strait, and my own testing. Back-patch to all supported branches, since this doco has been wrong right along -- we certainly haven't changed the I/O behavior of these types in many years.</li>

<li>Replace max_standby_delay with two parameters, max_standby_archive_delay and max_standby_streaming_delay, and revise the implementation to avoid assuming that timestamps found in WAL records can meaningfully be compared to clock time on the standby server. Instead, the delay limits are compared to the elapsed time since we last obtained a new WAL segment from archive or since we were last "caught up" to WAL data arriving via streaming replication. This avoids problems with clock skew between primary and standby, as well as other corner cases that the original coding would misbehave in, such as the primary server having significant idle time between transactions. Per my complaint some time ago and considerable ensuing discussion. Do some desultory editing on the hot standby documentation, too.</li>

<li>Make vacuum_defer_cleanup_age be PGC_SIGHUP level, since it's not sensible to have different values in different processes of the primary server. Also put it into the "Streaming Replication" GUC category; it doesn't belong in "Standby Servers" because you use it on the master not the standby. In passing also correct guc.c's idea of wal_keep_segments' category.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, don't set recoveryLastXTime when replaying a checkpoint --- that was a bogus idea from the start since the variable is only meant to track commit/abort events. This patch reverts the logic around the variable to what it was in 8.4, except that the value is now kept in shared memory rather than a static variable, so that it can be reported correctly by CreateRestartPoint (which is executed in the bgwriter).</li>

<li>Split the LDFLAGS make variable into two parts: LDFLAGS is now used for linking both executables and shared libraries, and we add on LDFLAGS_EX when linking executables or LDFLAGS_SL when linking shared libraries. This provides a significantly cleaner way of dealing with link-time switches than the former behavior. Also, make sure that the various platform-specific %.so: %.o rules incorporate LDFLAGS and LDFLAGS_SL; most of them missed that before. (I did not add these variables for the platforms that invoke $(LD) directly, however. It's not clear if we can do that safely, since for the most part we assume these variables use CC command-line syntax.) Per gripe from Aaron Swenson and subsequent investigation.</li>

<li>Fix a few single-file (MODULES, not MODULE_big) contrib makefiles that were supposing that they should set SHLIB_LINK rather than LDFLAGS_SL. Since these don't go through Makefile.shlib that was a no-op on most platforms. Also regularize the few platform-specific Makefiles that did pay attention to SHLIB_LINK: it seems that the real value of that is to pull in BE_DLLLIBS, so do that instead. Per buildfarm failures on cygwin.</li>

<li>In pgsql/src/makefiles/pgxs.mk, make sure LDFLAGS come before LIBS when linking contrib programs. Solaris, at least, seems to be sensitive to the relative order of -L and -l switches, so this is needed. Per buildfarm results.</li>

<li>In pgsql/src/makefiles/pgxs.mk, dept. of third thoughts: PG_LIBS may contain a -L switch, so it had better stay in front of LDFLAGS.</li>

<li>In pgsql/src/makefiles/Makefile.aix, allow for LDFLAGS_SL already having a value in Makefile.aix. Per buildfarm results.</li>

<li>In pgsql/src/Makefile.shlib, still more third thoughts: when linking shared libraries, LDFLAGS probably needs to appear before anything placed in SHLIB_LINK. This is because SHLIB_LINK is typically a subset of LIBS, and LIBS has to appear after LDFLAGS on platforms that are sensitive to the relative order of -L and -l switches.</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, undo pgindent breakage (again). Per buildfarm.</li>

<li>In pgsql/src/Makefile.global.in, accept slightly grotty coding in Makefile.global in order to keep the -L flag for src/port/ in front of any -L flags placed in LDFLAGS by configure. This undoes an L-flag-ordering change that I had thought would be safe, but seems to be making at least one buildfarm member fail --- the only theory for orca's failure that I can think of is that it's got an old copy of libpgport.a in /usr/lib. Also allow for LDFLAGS_SL to be set by contrib makefiles before they invoke Makefile.global.</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, adjust mbutils.c so it won't get broken by future pgindent runs. To do that, replace L'\0' by (WCHAR) 0. Perhaps someday we should teach pgindent about wide-character literals, but so long as this is the only use-case in the entire Postgres sources, a workaround seems easier.</li>

<li>Fix "cannot handle unplanned sub-select" error that can occur when a sub-select contains a join alias reference that expands into an expression containing another sub-select. Per yesterday's report from Merlin Moncure and subsequent off-list investigation. Back-patch to 7.4. Older versions didn't attempt to flatten sub-selects in ways that would trigger this problem.</li>

<li>Fix variant float8 expected files to have exactly the expected spacing. This wasn't important when we used diff's -w (--ignore-all-space) option to compare regression result files, but it is now. Per buildfarm member canary, which evidently has been offline since we did that in November, but came to life again today.</li>

<li>In pgsql/src/backend/access/transam/xlogutils.c, update obsolete comment. Noted by Josh Tolley.</li>

<li>In pgsql/doc/src/sgml/ref/create_operator.sgml, add a cross-reference to precedence information to CREATE OPERATOR's documentation. Per suggestion from Marc Cousin.</li>

<li>In pgsql/src/pl/plpython/plpython.c, minor kibitzing on previous patch from Peter Eisentraut which guards against using PL/PythonU2 and PL/PythonU3 in the same session: no need to run check more than once. (_PG_init should be called only once anyway, but as long as it's got an internal guard against repeat calls, that should be in front of the version check.)</li>

<li>Stamp HEAD as 9.1devel. (And there was much rejoicing.)</li>

<li>In pgsql/src/backend/utils/adt/ruleutils.c, fix ruleutils' get_variable() to print something useful for Vars referencing resjunk outputs of subquery tlists, instead of throwing an error. Per bug #5548 from Daniel Grace. We might at some point find we ought to back-patch this further than 9.0, but I think that such Vars can only occur as resjunk members of upper-level tlists, in which case the problem can't arise because prior versions didn't print resjunk tlist items in EXPLAIN VERBOSE.</li>

<li>In pgsql/src/backend/utils/cache/lsyscache.c, avoid an Assert failure in deconstruct_array() by making get_attstatsslot() use the actual element type of the array it's disassembling, rather than trusting the type OID passed in by its caller. This is needed because sometimes the planner passes in a type OID that's only binary-compatible with the target column's type, rather than being an exact match. Per an example from Bernd Helmle. Possibly we should refactor get_attstatsslot/free_attstatsslot to not expect the caller to supply type ID data at all, but for now I'll just do the minimum-change fix. Back-patch to 7.4. Bernd's test case only crashes back to 8.0, but since these subroutines are the same in 7.4, I suspect there may be variant cases that would crash 7.4 as well.</li>

<li>In pgsql/doc/src/sgml/sources.sgml, add a note about preferred window width to the section about code formatting conventions.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/high-availability.sgml, remove tab from SGML.</li>

<li>Add new Non-Durable Settings documentation section. Document that synchronous_commit can lose transactions in a db crash, not just a OS crash.</li>

<li>Fix doc double-wording in non-durable patch. Report from Thom Brown.</li>

<li>In pgsql/src/backend/access/transam/xact.c, add C comment about why synchronous_commit=off behavior can lose committed transactions in a postmaster crash.</li>

<li>In pgsql/doc/src/sgml/config.sgml, document that shared_preload_libraries and local_preload_libraries lowercase the library names, unless double-quoted.</li>

<li>In documentation, use "lower case"/"upper case" consistently (use space between words).</li>

<li>In pgsql/doc/src/sgml/config.sgml, document that /bin/true on Windows is implemented by 'REM'.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update 9.0 release notes so streaming replication and hot standby is not assumed to require continuous archiving. Per report from Fujii Masao.</li>

<li>In pgsql/contrib/pg_upgrade/pg_upgrade.h, remove port.h prototypes from pg_upgrade.h, per report from Robert Haas.</li>

<li>In pgsql/src/backend/commands/tablespace.c, issue 'mkdir' hint when replying CREATE TABLESPACE in recovery mode. Per idea from Fujii Masao.</li>

<li>Add CVS tags to pg_upgrade and pg_upgrade_support files, per request from Tom Lane.</li>

<li>Add copyrights to pg_upgrade and pg_upgrade_tools files, per Tom Lane.</li>

<li>Make pg_upgrade copyrights just 2010, not 2010-2010.</li>

<li>In pgsql/doc/src/sgml/func.sgml, document more clearly on XML namespaces inside xpath function. Nikolay Samokhvalov.</li>

<li>In pgsql/doc/src/sgml/config.sgml, remove SGML tab.</li>

<li>In pgsql/src/tools/fsync/test_fsync.c, report test_fynsc times in tests per second, instead of total seconds.</li>

<li>In pgsql/src/tools/fsync/test_fsync.c, simplify test_fsync duration computation.</li>

<li>Update pgindent testing instructions.</li>

<li>pgindent run for 9.0, second run.</li>

<li>In pgsql/src/tools/pgindent/README, mention why one C file fails pgindent.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, document the interaction of write-barrier-enabled file systems, and BBU caches, per June email thread.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, doc change: effected -&gt; affected, per correction from Matthew Wakeling.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update release notes for 9.0 beta 3.</li>

<li>Properly report errno/out-of-disk-space error from pg_upgrade when in copy mode, per report from depstein@alliedtesting.com. Patch suggestion from Magnus. Backpatch to 9.0.X.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/sources.sgml, add guidelines for formatting errcontext strings</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, add note clarifying that XML fragments don't accept DTDs, per complaint from Craig Ringer.</li>

<li>Use different function names for plpython3 handlers, to avoid clashes in pg_pltemplate. This should have a catversion bump, but it's still being debated whether it's worth it during beta.</li>

<li>Message tuning.</li>

<li>In pgsql/doc/src/sgml/plpython.sgml, add note that using PL/Python 2 and 3 in the same session will probably crash.</li>

<li>Install safeguard against running PL/Python 2 and 3 in the same session.</li>

<li>Translation updates for 9.0beta3.</li>

<li>In pgsql/doc/src/sgml/plperl.sgml, some small changes: wrapped long code-lines for pdf, fix typo. Erik Rijkers</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, emode_for_corrupt_record shouldn't reduce LOG messages to WARNING. In non-interactive sessions, WARNING sorts below LOG.</li>

<li>In pgsql/src/backend/commands/tablecmds.c, allow ALTER TABLE .. SET TABLESPACE to be interrupted. Backpatch to 8.0, where tablespaces were introduced. Guillaume Lelarge</li>

<li>In pgsql/src/port/copydir.c, allow copydir() to be interrupted. This makes ALTER DATABASE .. SET TABLESPACE and CREATE DATABASE more sensitive to interrupts. Backpatch to 8.4, where ALTER DATABASE .. SET TABLESPACE was introduced. We could go back further, but in the absence of complaints about the CREATE DATABASE case it doesn't seem worth it. Guillaume Lelarge, with a small correction by me.</li>

<li>Move copydir.c from src/port to src/backend/storage/file. The previous commit to make copydir() interruptible prevented postgres.exe from linking on MinGW and Cygwin, because on those platforms libpgport_srv.a can't freely reference symbols defined by the backend. Since that code is already backend-specific anyway, just move the whole file into the backend rather than adding further kludges to deal with the symbols needed by CHECK_FOR_INTERRUPTS(). This probably needs some further cleanup, but this commit just moves the file as-is, which should hopefully be enough to turn the buildfarm green again.</li>

<li>Remove hstore % text[] operator; use slice() function instead. David Wheeler, with one small correction by me.</li>

<li>Additional cross-references to window functions documentation. Erik Rijkers.</li>

<li>Allow REASSIGNED OWNED to handle opclasses and opfamilies. Backpatch to 8.3, which is as far back as we have opfamilies. The opclass portion could probably be backpatched to 8.2, when REASSIGN OWNED was added, but for now I have not done that. Asko Tiidumaa, with minor adjustments by me.</li>

<li>Support setting the keepalive idle time on MacOS X. MacOS X uses TCP_KEEPALIVE rather than TCP_KEEPIDLE for this purpose. Thanks to Fujii Masao for the review.</li>

<li>Make log_temp_files based on kB, and revert docs &amp; comments to match. Per extensive discussion on pgsql-hackers. We are deliberately not back-patching this even though the behavior of 8.3 and 8.4 is unquestionably broken, for fear of breaking existing users of this parameter. This incompatibility should be release-noted.</li>

<li>Add a hook in ExecCheckRTPerms(). This hook allows a loadable module to gain control when table permissions are checked. It is expected to be used by an eventual SE-PostgreSQL implementation, but there are other possible applications as well. A sample contrib module can be found in the archives at: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2010-05/msg01095.php">http://archives.postgresql.org/pgsql-hackers/2010-05/msg01095.php</a> Robert Haas and Stephen Frost.</li>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, clarify that "psql -c" ignores psqlrc files. Tim Landscheidt</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, correct missing/misspelled surname.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, unbreak MSVC builds by removing copydir.c from list of libpgport files</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>stringToNode() and deparse_expression_pretty() crash on invalid input, but we have nevertheless exposed them to users via pg_get_expr(). It would be too much maintenance effort to rigorously check the input, so put a hack in place instead to restrict pg_get_expr() so that the argument must come from one of the system catalog columns known to contain valid expressions. Per report from Rushabh Lathia. Backpatch to 7.4 which is the oldest supported version at the moment.</li>

<li>The previous fix in CVS HEAD and 8.4 for handling the case where a cursor being used in a PL/pgSQL FOR loop is closed was inadequate, as Tom Lane pointed out. The bug affects FOR statement variants too, because you can close an implicitly created cursor too by guessing the "&lt;unnamed portal X&gt;" name created for it. To fix that, "pin" the portal to prevent it from being dropped while it's being used in a PL/pgSQL FOR loop. Backpatch all the way to 7.4 which is the oldest supported version.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Add support for TCP keepalives on Windows, both for backend and the new libpq support.</li>

<li>Make the Windows tcp keepalive support depend on the existance of the SIO_KEEPALIVE_VALS define instead of just WIN32, since MingW doesn't support this API (yet?).</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>tag beta3</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in another revision of the patch to suppress automatic recovery after backend crash. This is for a volatile caching version of PostgreSQL.</li>

<li>Robert Haas sent in another revision of the patch to add get_whatever_oid functionality.</li>

<li>Magnus Hagander sent in two revisions of a patch to fix keepalives on Win32.</li>

<li>Robert Haas sent in a patch to implmenet a warning message in pg_standby.</li>

<li>Mike Fowler sent in another revision of the xpath_exists patch.</li>

<li>Peter Eisentraut sent in another revision of the patch to allow server authentication over Unix-domain sockets.</li>

<li>Mike Fowler sent in another revision of patch to add XMLEXISTS to the grammar.</li>

<li>Robert Haas sent in two revisions of a patch to fix keepalives on OSX.</li>

<li>Bruce Momjian sent in a patch to show a hint only in recovery after a crash of Hot Standby/Streaming Replication.</li>

<li>Fujii Masao sent in an updated patch to fix the docs re: checkpoint_segments and keep_wal_segments for Hot Standby/Streaming Replication.</li>

<li>Martin Pihlak sent in two revisions of a patch to add a GUC log_file_mode which allows specifying the creation mode for log files. This would enable, for example, permitting readers other than the system PostgreSQL user to read the log files PostgreSQL generates.</li>

<li>Teodor Sigaev sent in a patch to implement more accurate cost estimation function for GIN index scans.</li>

<li>Markus Shiltknecht sent in a patch to add a lock-based dynamic shared memory allocator, which lets components delay memory allocation rather than allocate all needed memory in advance.</li>

<li>Pavel Stehule sent in a patch to add parameters to DO statements.</li>

<li>Robert Haas sent in three more revisions of a patch to implement get_whatever_oid, a refactoring which to a large extent centralizes get_*_oid logic.</li>

<li>Robert Haas sent in a patch to fix log_temp_files docs and comments to say kilobytes rather than bytes.</li>

<li>Greg Smith sent in another revision of the patch to make pgbench more 64-bit-clean.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to help make CLUSTER behave better.</li>

<li>Mike Fowler sent in two more revisions of a patch to add an xml_is_well_formed function.</li>

<li>Rajanikant Chirmade sent in a patch to make downcase_truncate_identifier() multibyte-character-aware.</li>

<li>Pavel Stehule sent in two more revisions of the string functions for 9.1.</li>

<li>Robert Haas sent in another revision of the patch to include the backend ID in relpath of temp rels.</li>

<li>Pavel Baros sent in another revision of the patch to add materialized views.</li>

<li>Kevin Grittner sent in another revision of the patch to implement predicate locking, in part a prerequisite for better serialization.</li>

<li>Robert Haas sent in a patch to slim down the representation of numerics by about two bytes.</li>

<li>Zhai Boxuan sent in a patch to implement a MERGE command.</li>

<li>Erik Rijkers sent in a patch to fix the contrib makefile to include the stringfunc patch.</li>

</ul>