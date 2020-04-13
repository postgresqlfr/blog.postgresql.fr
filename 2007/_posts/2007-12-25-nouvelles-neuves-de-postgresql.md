---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-408 "
---


<p><strong>Nouvelles hebdomadaires de Postgres - 23 décembre 2007</strong></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Le plugin check_postgres 1.1.0 pour Nagios est disponible&nbsp;:

<a target="_blank" href="http://bucardo.org/nagios_postgres/">http://bucardo.org/nagios_postgres/</a></li>

<li>Npgsql 2 Beta2 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/npgsql/">http://pgfoundry.org/projects/npgsql/</a></li>

<li>phpPgAdmin 4.2 beta 1 est disponible&nbsp;:

<a target="_blank" href="http://phppgadmin.sourceforge.net/">http://phppgadmin.sourceforge.net/</a></li>

<li>ptop 3.6.1 beta 2 est sorti&nbsp;:

<a target="_blank" href="http://ptop.projects.postgresql.org/">http://ptop.projects.postgresql.org/</a></li>

</ul>

<!--more-->


<!--break-->

<p><strong>Offres d'emplois autour de Postgres en décembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="http://fosdem.org/2008/schedule/devroom/bsdpostgresql">http://fosdem.org/2008/schedule/devroom/bsdpostgresql</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 28 et 29 mars 2008 à l'Université du Maryland, College Park&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil). Les propositions de conférences sont attendues avant le 11 janvier&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, fixed a few minor glitches pointed out by splint.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Make all msvc build scripts use buildenv.pl, not buildenv.bat. Andrew Dunstan</li>

<li>In pgsql/src/tools/msvc/clean.bat, remove unnecessary logo output from msbuild when cleaning ecpg regression test outputs.</li>

<li>On win32, loop when opening files if sharing- or lock-violation errors occur. Hopefully, this will make it possible to recover from broken antivirus and/or backup software that locks our files.</li>

<li>In pgsql/src/interfaces/libpq/Makefile, libpq needs pgsleep on win32 because of the changes to port/open.c.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/oracle_compat.c, fix thinko in encoding check for chr().</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/runtime.sgml, improve wording re: OOM killer.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, update archive_command example to use || test, rather than if [].</li>

<li>Remove tab in SGML file.</li>

<li>Update pg_ctl/kill docs.</li>

<li>Modify pgindent to use an external typedefs file rather than included list. Remove pgjindent.</li>

<li>In pgsql/src/tools/find_typedef, update find_typedefs to handle simple 'typedef X' cases, per request from Tom Lane.</li>

<li>Remove paragraph about Linux OOM killer and fork(). Instead link to article about OOM.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, properly indent SGML paragraph.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Some desultory copy-editing on the backup/restore docs.</li>

<li>Make path_recv() and poly_recv() reject paths/polygons containing no points. The zero-point case is sensible so far as the data structure is concerned, so maybe we ought to allow it sometime; but right now the textual input routines for these types don't allow it, and it seems that not all the functions for the types are prepared to cope. Report and patch by Merlin Moncure. Back-patched to 7.4.</li>

<li>Make archiver process report its progress in PS display. Per proposal by Simon Riggs, though not exactly his patch.</li>

<li>When given a nonzero column number, pg_get_indexdef() is only supposed to print the index key variable or expression for that column. It was mistakenly printing ASC/DESC/NULLS FIRST/NULLS LAST decoration too --- and not only for the target column, but all columns. Someday we should have an option to extract that info (and the opclass decoration as well) for a single index column ... but today is not that day. Per bug #3829 and subsequent discussion.</li>

<li>In pgsql/doc/src/sgml/func.sgml, fix a small typo, per Jan Urbanski.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Gokulakannan Somasun's patch for NULL bitmap optimization on grounds of lack of evidence for its efficacy and correctness.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<p>[ndt&nbsp;: grand vide cette semaine. Joyeux Noël à tous ceux qui lisent jusqu'ici&nbsp;!]</p>