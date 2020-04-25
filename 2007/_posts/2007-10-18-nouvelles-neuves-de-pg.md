---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/265"
---


<p><strong>Nouvelles hebdomadaires de Postgres - 7 octobre 2007</strong></p>

<p>Postgres 8.3 bêta 1 disponible&nbsp;:

<a target="_blank" href="http://www.postgresql.org/about/news.872">http://www.postgresql.org/about/news.872</a></p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Une nouvelle interface native Borland Delphi vers PostgreSQL est disponible&nbsp;:

<a target="_blank" href="http://dbslim.berlios.de">http://dbslim.berlios.de</a></li>

<li>PsqlODBC 08.02.0500 a été publié&nbsp;:

<a target="_blank" href="http://psqlodbc.projects.postgresql.org/release.html">http://psqlodbc.projects.postgresql.org/release.html</a></li>

<li>La version 1.0beta1 de pgtreelib est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgtreelib/">http://pgfoundry.org/projects/pgtreelib/</a></li>

<li>PostgresDAC 2.4.0 est sorti&nbsp;:

<a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/">http://microolap.com/products/connectivity/postgresdac/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en octobre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Sean Chittenden présentera les aspects I/O de la gestion d'une base de donnée, au SFPUG le mardi 9 octobre à 19h30. RSVP et plus de détails via le lien&nbsp;:

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/6341717/">http://postgresql.meetup.com/1/calendar/6341717/</a></li>

<li>La PostgreSQL Conference Fall 2007 aura lieu le 20 octobre à l'Université d'État de Portland (Oregon, USA)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Simon Riggs donnera une conférence sur les bases de données et le Web, le 16 octobre à Londres&nbsp;:

<a target="_blank" href="http://www.ukuug.org/events/seminars/databases/booking/">http://www.ukuug.org/events/seminars/databases/booking/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet Postgres&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée religieusement par l'équipe PostgreSQLFr.</em></p>

<p><em>(Pour plus d'informations sur le récent changement de nom PostgreSQL / Postgres, vous pouvez consulter les derniers ajouts de la <a href="http://www.postgresql.org/docs/faqs.FAQ.html#item1.1">FAQ</a> ou survoler la <a href="http://archives.postgresql.org/pgsql-advocacy/2007-08/threads.php#00377">mailing-list pgsql-advocacy</a>)</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Jan Wieck a commité&nbsp;:</p>

<ul>

<li>Added the Skytools extended transaction ID module to contrib as discussed on CORE previously. This module offers transaction ID's containing the original XID and the transaction epoch as a bigint value to the user level. It also provides a special txid_snapshot data type that contains an entire transactions visibility snapshot information, which is useful to determine if a particular txid was visible to a transaction or not. The module has been tested by porting Slony-I from using its original xxid data type.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>A few improvements to analyze and vacuum sections in documentation: add "see also" entries for autovacuum in analyze and vacuum reference pages, and enhance usage of cross-references in the maintenance page.</li>

<li>In pgsql/doc/src/sgml/func.sgml, change &amp;pi; to plain "pi" in index entry, to avoid double escaping issues.</li>

<li>In pgsql/doc/src/sgml/Makefile, clean up the doc makefile for draft HTML generation. It no longer works to do "make DRAFT=Y html"; you need to use "make draft" (which was also supported previously).</li>

<li>In pgsql/doc/src/sgml/Makefile, remove stylesheet.css file on "make clean", created only on VPATH builds.</li>

<li>In pgsql/doc/src/sgml/maintenance.sgml, fix missing parenthesis, per Guillaume Lelarge.</li>

<li>Fix SGML markup, from Guillaume Lelarge.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>tag it 8.3beta1 ... the beta cycle begins</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Two fixes for the release notes from Guillaume Smet. In passing, make a minor markup improvement.</li>

<li>First pass at SGML-ifying the 8.3 release notes. Plenty of improvements left to made, but this is a start.</li>

<li>Various minor improvements to the 8.3 release notes.</li>

<li>Fix a compiler warning on Win32. Hannes Eder.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, replaced tabs with spaces.</li>

<li>In ecpg, removed newline at end of exports files.</li>

<li>In ecpg, added def-files to all: target so they are build everytime.</li>

<li>Argh, missing dll in filename in pgsql/src/interfaces/ecpg/compatlib and pgsql/src/interfaces/ecpg/pgtypeslib.</li>

<li>In pgsql/src/interfaces/ecpg/compatlib/Makefile, add snprintf.c for some systems.</li>

<li>In pgsql/src/interfaces/ecpg/compatlib/exports.txt, stripped two symbols that are needed.</li>

<li>In pgsql/src/interfaces/ecpg/compatlib/Makefile, also build snprintf from pgport if needed.</li>

<li>Remove exports.list into clean target.</li>

<li>Also created export list for pgytpeslib and compatlib. Set pgtypes library version to 3.0. Set compat library version to 3.0.</li>

<li>Cleaned up ecpglib and renamed functions that do not need to be exported. Created export list for ecpglib.</li>

<li>Hopefully fixed some stuff that causes Windows builds to fail on ecpg.</li>

<li>In ecpg testing code, made new test also work without threading enabled.</li>

<li>Removed pgsql/src/interfaces/ecpg/test/expected/thread-descriptor.stdout.diff. No idea where this file came from.</li>

<li>In ecpg, ITAGAKI Takahiro added thread-safe descriptor handling.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/regex: regc_color.c, make dumpcolors() have tolerable performance when using 32-bit chr, as we do (and upstream Tcl doesn't). The loop limit might be subject to negotiation if anyone ever tries to do regex debugging in Far Eastern languages, but for now 1000 seems plenty. CHR_MAX was right out :-(</li>

<li>Adjust some regex debugging printouts to not give wrong-format-width warnings on a 64-bit machine. Noted while chasing a recent regex bug report.</li>

<li>Adjust regcustom.h so that all those assert() calls in the regex package are converted to Postgres Assert() macros, instead of using &lt;assert.h&gt; as formerly. No difference in production builds, but --enable-cassert debug builds will get better coverage for regex testing.</li>

<li>Fix plperl and pltcl to include the name of the current function when passing on errors from the language interpreter. (plpython seems fairly OK about this already.) Per gripe from Robert Kleemann.</li>

<li>In pgsql/doc/src/sgml/release.sgml, remove some cross-references that don't seem to work in HISTORY generation ... we should figure this out later ...</li>

<li>Fix distprep and maintainer-clean targets so that ecpg's .def files are made and removed at the correct times.</li>

<li>Add .cvsignore files to suppress CVS gripes about ecpg .def files.</li>

<li>Some desultory markup improvements in the new release notes.</li>

<li>Results from buildfarm show that ecpglib was depending on pg_strcasecmp, which evidently it got as an unofficial export from pgtypeslib.</li>

<li>Keep the planner from failing on "WHERE false AND something IN (SELECT ...)". eval_const_expressions simplifies this to just "WHERE false", but we have already done pull_up_IN_clauses so the IN join will be done, or at least planned, anyway. The trouble case comes when the sub-SELECT is itself a join and we decide to implement the IN by unique-ifying the sub-SELECT outputs: with no remaining reference to the output Vars in WHERE, we won't have propagated the Vars up to the upper join point, leading to "variable not found in subplan target lists" error. Fix by adding an extra scan of in_info_list and forcing all Vars mentioned therein to be propagated up to the IN join point. Per bug report from Miroslav Sulc.</li>

<li>Stamp 8.3beta1, except in configure.in/configure.</li>

<li>Update timezone data files to release 2007h of the zic database. Might as well have the latest when we wrap 8.3beta1.</li>

<li>In ecpg, DLL_DEFFILE should be defined when PORTNAME is win32, not when it isn't, per the example of libpq/Makefile.</li>

<li>In pgsql/src/backend/postmaster/bgwriter.c, change Assert() to a plain test and elog, just to see if that works around the icc bug exhibited by buildfarm member dugong.</li>

<li>Second pass at 8.3 release notes: put items in a bit more logical order where possible, add overview and incompatibilities lists, minor cleanups. The SGML-ification still leaves much to be desired.</li>

<li>Teach chklocale.c how to extract encoding info from Windows locale names. ITAGAKI Takahiro</li>

<li>Some editorial improvements for recently-added ALTER SEQUENCE/VIEW documentation. Heikki and Tom</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/descriptor.c, suppress compiler warning in non-threaded build.</li>

<li>Tweak recently-added tests to suppress scary-looking warnings on 64-bit machines about casts between pointers and integers of different sizes. While they're harmless, we shouldn't expect users to have to go through and figure that out for themselves.</li>

<li>Minor improvements to hack for old OpenSSL libraries: avoid unused variable warning on Windows, improve comment.</li>

<li>In gsql/src/interfaces/ecpg/compatlib/Makefile, fix command for fetching snprintf.c.</li>

<li>First cut at 8.3 release notes. SGML markup is nonexistent, and the 'overview' and 'incompatibilities' summary lists remain to be written. But I think all the raw info is there (indeed maybe too verbose).</li>

<li>Cope with ERR_set_mark() and ERR_pop_to_mark() not existing in older OpenSSL libraries --- just don't call them if they're not there. This might possibly lead to misleading error messages, but we'll just have to live with that.</li>

<li>In pgsql/doc/src/sgml/catalogs.sgml, add catalogs.sgml documentation for text search catalogs.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, add note warning against use of pre-8.4 multithreaded Tcl.</li>

<li>Avoid assuming that struct varattrib_pointer doesn't get padded by the compiler --- at least on ARM, it does. I suspect that the varvarlena patch has been creating larger-than-intended toast pointers all along on ARM, but it wasn't exposed until the latest tweak added some Asserts that calculated the expected size in a different way. We could probably have fixed this by adding __attribute__packed as is done for ItemPointerData, but struct varattrib_pointer isn't really all that useful anyway, so it seems cleanest to just get rid of it and have only struct varattrib_1b_e. Per results from buildfarm member quagga.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, attempt to open certificate file "manually" using fopen before trying BIO functions. Helps problem with older versions of OpenSSL that lacks error stack functions and would show an incorrect error message for file-not-found-or-not-openable. The problem may still exist for other errors, but file open error is by far the most common one.</li>

<li>Build two more .DEF files for ecpg instead of using default ones.</li>

<li>More detailed error msg (with stack trace) if a file copy fails in pgsql/src/tools/msvc/Install.pm.</li>

<li>Use snprintf from libpgport in ecpg compatlib. Required since we restricted exports from ecpglib.</li>

<li>Fix commandlines for final two ECPG regression tests in pgsql/src/tools/msvc/ecpg_regression.proj.</li>

<li>Fix typo in pgsql/src/interfaces/ecpg/ecpglib/exports.txt.</li>

<li>In pgsql/src/tools/msvc, build DEF file for libecpg instead of generating a default one.</li>

<li>Make ECPG regression tests run with -c only for array_of_struct.pgc on MSVC. Fix strange nonstandard version of __stdcall specifyer in thread tests on win32.</li>

<li>Fix typo in pgsql/src/tools/msvc/vcregress.pl.</li>

<li>Default to thread safety on, and support more CPU options. Also make sure that a CPU option is actually chosen. Hiroshi Saito</li>

<li>Use BIO functions to avoid passing FILE * pointers to OpenSSL functions. This fixes potential crashes on old versions of OpenSSL and the requirement on "Applink" in new versions when building with MSVC and using different runtimes. Dave Page with fixes from me.</li>

<li>In pgsql/src/interfaces/libpq/win32.mak, build with /GS on 64-bit to work with modern Platform SDK. Hiroshi Saito</li>

<li>Enable __FUNCTION__ on MSVC builds. Hannes Eder</li>

</ul>

<p>D'Arcy J.M. Cain a commité&nbsp;:</p>

<ul>

<li>Add some examples to pgsql/contrib/chkpass/README.chkpass.</li>

<li>Fix a minor typo in pgsql/contrib/chkpass/README.chkpass.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/pgcvslog, add comment about cvs branch numbers.</li>

<li>Add pgcvslog '-d' capability to allow stripping of commit messages that have back branch activity. This will be useful for creating release notes for major releases.</li>

<li>In pgsql/src/tools/pgcvslog, update pgcvslog text to simply "&lt;branch&gt;"</li>

<li>Fixup for new pgcvslog feature.</li>

<li>In pgsql/src/tools/pgcvslog, have pgcvslog mark back-branch commits with "&lt;back-patch&gt;".</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Richard Rowell sent in two revisions of a patch to inline stable SQL set returning UDFs.</li>

<li>Brendan Jurd sent in a patch to get rid of some redundant code by creating a widely useful set of functions to convert between text and C string in the backend.</li>

<li>Euler Taveira de Oliveira sent in an updated FAQ in Brazilian Portuguese.</li>

</ul>