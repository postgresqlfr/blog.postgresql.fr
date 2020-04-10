---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-418 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Benetl 1.5 pour Windows est disponible&nbsp;:

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>Pg::Snapshot et Materialized Views version 0.3.2 ont été publiés&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/snapshot/">http://pgfoundry.org/projects/snapshot/</a></li>

<li>Peter Eisentraut et al. ont lancé le "Debian PostgreSQL Packaging Project"&nbsp;:

<a target="_blank" href="http://pkg-postgresql.alioth.debian.org/">http://pkg-postgresql.alioth.debian.org/</a></li>

<li>Greg Sabino Mullane a rendu MediaWiki compatible avec PostgreSQL 8.3&nbsp;:

<a target="_blank" href="http://people.planetpostgresql.org/greg/index.php?/archives/123-MediaWiki-is-Postgres-8.3-compatible.html">http://people.planetpostgresql.org/greg/index.php?/archives/123-MediaWiki-is-Postgres-8.3-compatible.html</a></li>

<li>MicroOLAP Database Designer 1.2.3 pour PostgreSQL a été publié&nbsp;:

<a target="_blank" href="http://microolap.com/products/database/postgresql-designer/">http://microolap.com/products/database/postgresql-designer/</a></li>

<li>Nagios Plugin pour PostgreSQL 1.2.0 est disponible&nbsp;:

<a target="_blank" href="http://bucardo.org/nagios/">http://bucardo.org/nagios/</a></li>

<li>Les paquets PGCluster versions 1.9, 1.7, 1.5 et 1.3 ont été mis à jour&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgcluster/">http://pgfoundry.org/projects/pgcluster/</a></li>

<li>ptop 3.6.1 beta4 est disponible&nbsp;:

<a target="_blank" href="http://ptop.projects.postgresql.org/">http://ptop.projects.postgresql.org/</a></li>

<li>textsearch-ja 8.3.0 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/textsearch-ja/">http://pgfoundry.org/projects/textsearch-ja/</a></li>

<li>VTD-XML 2.3 a été publié&nbsp;:

<a target="_blank" href="http://sourceforge.net/project/showfiles.php?group_id=110612&amp;package_id=120172">http://sourceforge.net/project/showfiles.php?group_id=110612&amp;package_id=120172</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en février</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Le "PG UK day" aura lieu le 2 avril à Birmingham&nbsp;:

<a target="_blank" href="http://www.postgresql.org.uk/">http://www.postgresql.org.uk/</a></li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 29 et 30 mars 2008 à l'Université du Maryland, College Park&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil)&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/Makefile, observe errors.</li>

<li>Added --htmldir option to pg_config, equivalent to the new configure option.</li>

<li>Refactor backend makefiles to remove lots of duplicate code.</li>

<li>In pgsql/src/backend/access/common/Makefile, remove another target I forgot during the refactoring.</li>

<li>Remove pgsql/src/backend/port/sunos4. This subdirectory has been unused, dead, and broken for 10 years.</li>

<li>More refactoring, so that the SUBSYS.o rules are now all in one place.</li>

<li>Backport fixed AC_FUNC_FSEEKO</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>autoconf 2.61's AC_FUNC_FSEEKO reports success/failure differently, so reorganize code for NetBSD/BSDi port/fseeko.c usage, and make code more modular.</li>

<li>Put fseeko check back in old location, in hopes of silencing build warnings.</li>

<li>Put back code modularization of fseeko() configure checks.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Remove unnecessary opening of other relation in RI_FKey_keyequal_upd_pk and RI_FKey_keyequal_upd_fk, as well as no-longer-needed calls of ri_BuildQueryKeyFull. Aside from saving a few cycles, this avoids needless deadlock risks when an update is not changing the columns that participate in an RI constraint. Per a gripe from Alexey Nalbat. Back-patch to 8.3. Earlier releases did have a need to open the other relation due to the way in which they retrieved information about the RI constraint, so this problem unfortunately can't easily be improved pre-8.3. Tom Lane and Stephan Szabo</li>

<li>In pgsql/src/backend/catalog/catalog.c, put a CHECK_FOR_INTERRUPTS call into the loops that try to find a unique new OID or new relfilenode. If the existing OIDs are sufficiently densely populated, this could take a long time (perhaps even be an infinite loop), so it seems wise to allow the system to respond to a cancel interrupt here. Per a gripe from Jacky Leng. Backpatch as far as 8.1. Older versions just fail on OID collision, instead of looping.</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, fix mistakes in pg_ctl's code for "start -w" that tries to cope with non-default settings for the postmaster's port number. The code to parse command line options and postgresql.conf entries wasn't quite right about whitespace or quotes, and it was coded in a not-very-readable way too. Per bug #3969 from Itagaki Takahiro, though this is more extensive than his proposed patch (which fixed only the whitespace problem). This code has been broken since it was put in in 8.0, so patch all the way back.</li>

<li>In pgsql/src/test/regress/pg_regress.c, make pg_regress -V consistent with the corresponding code in other programs: use puts with a compile-time-constant string.</li>

<li>Rename miscadmin.h's PG_VERSIONSTR macro to PG_BACKEND_VERSIONSTR to make it a bit clearer what it is, and get rid of duplicate definitions in initdb and pg_ctl.</li>

<li>Change the declaration of struct varlena so that the length word is represented as "char ...[4]" not "int32". Since the length word is never supposed to be accessed via this struct member anyway, this won't break any existing code that is following the rules. The advantage is that C compilers will no longer assume that a pointer to struct varlena is word-aligned, which prevents incorrect optimizations in TOAST-pointer access and perhaps other places. gcc doesn't seem to do this (at least not at -O2), but the problem is demonstrable on some other compilers. I changed struct inet as well, but didn't bother to touch a lot of other struct definitions in which it wouldn't make any difference because there were other fields forcing int alignment anyway. Hopefully none of those struct definitions are used for accessing unaligned Datums.</li>

<li>In pgsql/src/backend/utils/misc/help_config.c, avoid trying to print a NULL char pointer in --describe-config. On some platforms this works, but on some it crashes. Zdenek Kotala</li>

<li>Use our own getopt() and getopt_long() on Solaris, because that platform's versions don't handle long options the way we want. Per Zdenek Kotala.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Solution.pm, unbreak MSVC build after recent addition of HTMLDIR.</li>

<li>In pgsql/src/timezone/strftime.c, fix function prototype to silence compiler warnings.</li>

<li>In pgsql/src/tools/msvc/Project.pm, un-break msvc port yet again (it started pulling in the Darwin port files, which obviously didn't compile).</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster/autovacuum.c, change error message to be able to differentiate the two cases. Per suggestion from Jaime Casanova.</li>

<li>Improve error messages emitted when VACUUM and ANALYZE skip a table. Per gripe from Clodoaldo Pinto Neto.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Aucun déçu cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Gevik Babakhani sent in a patch to fix MSVC compilation on MSVC.</li>

<li>Tatsuhito Kasahara sent in two revisions of a patch intended to change pgstatindex.c and pgstattuple.sql, where some variables are defined with int type, to a larger numeric type, which in turn allows for larger tables.</li>

<li>Davd Page sent in a patch which fixes initdb failures on Windows stemming from recent security-related changes to that platform.</li>

<li>Zdenek Kotala sent in three revisions of a patch intended to fix non-portable getopt() code.</li>

<li>Neil Conway sent in a patch to fix some memory leaks in the implementaiton of set-returning functions.</li>

<li>Peter Eisentraut sent in a patch links the backend in one piece instead of many SUBSYS.so files.</li>

<li>Robert Lor sent in a patch to change the DTrace probes from the DTRACE_PROBEn implementation to the header macro implementation so that the probes can be used on OSs other than Solaris including OSX Tiger.</li>

<li>Heikki Linnakangas sent in an optimization for CopyReadLineText which should speed up COPY operations in many common cases.</li>

</ul>