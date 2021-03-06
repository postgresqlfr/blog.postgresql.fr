---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 septembre 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/09/23/Nouvelles-hebdomadaires-de-PostgreSQL-20-septembre-2009"
---


<p>Les inscriptions pour la PGCon Brazil 2009 sont ouvertes&nbsp;: 

<a target="_blank" href="http://pgcon.postgresql.org.br">http://pgcon.postgresql.org.br</a></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090920">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-09/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>[ndt] Guillaume Lelarge fera une conf&eacute;rence sur les solutions de r&eacute;plication avec PostgreSQL le 16 octobre lors des JDLL 2009 au CPE de Lyon (Villeurbanne)&nbsp;: 

<a target="_blank" href="http://jdll.org/edition-2009">http://jdll.org/edition-2009</a></li>

<li>Une suite de conf&eacute;rences est organis&eacute;e &agrave; Seattle (&Eacute;tat de Washington, &Eacute;tats-Unis) du 16 au 18 octobre 2009&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009. Les inscriptions sont ouvertes&nbsp;! 

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/">http://pgcon.postgresql.org.br/2009/</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>L'OpenSQL Camp de Portland est &agrave; la recherche de sponsors. Pensez &agrave; votre voyage d&egrave;s maintenant&nbsp;!&nbsp;:) 

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement &agrave; l'occasion du 10<sup>&egrave;me</sup> anniversaire du JPUG est programm&eacute; pour les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japon&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

<li>Le "Chemnitzer Linuxtage" aura lieu &agrave; Chemnitz (All.) les 13 &amp; 14 mars 2010&nbsp;: 

<a target="_blank" href="http://chemnitzer.linux-tage.de/">http://chemnitzer.linux-tage.de/</a></li>

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

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/Makefile, print builds don't actually depend on html target (anymore).</li>

<li>Add errcontext support to PL/Perl[U]. Alexey Klyukin.</li>

<li>In pgsql/src/backend/utils/misc/guc-file.l, when reloading postgresql.conf, log what parameters actually changed</li>

<li>Improve wording of error message when a postgresql.conf setting is ignored because it can only be set at server start. In particular, hiding the main reason in the detail message was suboptimal.</li>

<li>Easier to translate psql help. Instead of requiring translators to translate the entire SQL command synopses, change create_help.pl to only require them to translate the placeholders, and paste those into the synopsis using a printf mechanism. Make some small updates to the markup to make it easier to parse. Note: This causes msgmerge of gettext 0.17 to segfault. You will need the patch from 

<a target="_blank" href="https://savannah.gnu.org/bugs/?27474">https://savannah.gnu.org/bugs/?27474</a> to make it work. msgmerge usually only runs on babel.postgresql.org, however.</li>

<li>Make the placeholder naming in the synopses of the SQL help more consistent.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/md5.c, fix possible buffer overrun and/or unportable behavior in pg_md5_encrypt() if salt_len == 0. This seems to be mostly academic, since nearly all calling code paths guarantee nonempty salt; the only case that doesn't is PQencryptPassword where the caller could mistakenly pass an empty username. So, fix it but don't bother backpatching. Per ljb.</li>

<li>In pgsql/src/backend/access/gin/ginfast.c, fix two distinct errors in creation of GIN_INSERT_LISTPAGE xlog records. In practice these mistakes were always masked when full_page_writes was on, because XLogInsert would always choose to log the full page, and then ginRedoInsertListPage wouldn't try to do anything. But with full_page_writes off a WAL replay failure was certain. The GIN_INSERT_LISTPAGE record type could probably be eliminated entirely in favor of using XLOG_HEAP_NEWPAGE, but I refrained from doing that now since it would have required a significantly more invasive patch. In passing do a little bit of code cleanup, including making the accounting for free space on GIN list pages more precise. (This wasn't a bug as the errors were always in the conservative direction.) Per report from Simon Riggs. Back-patch to 8.4 which contains the identical code.</li>

<li>Implement "join removal" for cases where the inner side of a left join is unique and is not referenced above the join. In this case the inner side doesn't affect the query result and can be thrown away entirely. Although perhaps nobody would ever write such a thing by hand, it's a reasonably common case in machine-generated SQL. The current implementation only recognizes the case where the inner side is a simple relation with a unique index matching the query conditions. This is enough for the use-cases that have been shown so far, but we might want to try to handle other cases later. Robert Haas, somewhat rewritten by Tom Lane.</li>

<li>In pgsql/src/backend/optimizer/path/joinpath.c, marginal code cleanup in joinpath.c: factor out clause variable-membership tests into a small common subroutine, and eliminate an unnecessary difference in the order in which conditions are tested. Per a comment from Robert Haas.</li>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, a bit more wordsmithing on the COPY CSV NULL business.</li>

<li>In pgsql/src/backend/optimizer/path/joinpath.c, rename new subroutine, per discussion with Robert Haas.</li>

<li>In pgsql/src/bin/psql/.cvsignore, sql_help.c needs to be cvsignore'd.</li>

<li>In pgsql/src/bin/psql/copy.c, remove a couple hundred lines of ugly and tedious-to-maintain code by not trying to parse COPY options exactly in psql's \copy support. Instead, just send the options as-is and let the backend sort it out. Emmanuel Cecchet.</li>

<li>Allow plpgsql IN parameters to be assigned to. Since the parameters are just preinitialized local variables, this does not affect the function's semantics as seen by callers; allowing assignment simply avoids the need to create more local variables in some cases. In any case we were being rather inconsistent since only scalar parameters were getting marked constant. No documentation change, since parameters were never documented as being marked constant anyway. Steve Prentice.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Applied ECPG patch by Zoltan Boszormenyi to add missing ";" to rule in pgc.l.</li>

<li>In ECPG, added patch by Bernd Helmle that adds a low level function that returns the current transaction status.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, CSV NULL Documentation. Clarify documentation of CSV's output of NULL values, per suggestion from Magnus. Backpatch to 8.4.X.</li>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, CSV NULL Documentation. Update docs to clearly explain NULL value matching behavior, per Andrew Dunstan. Backpatch to 8.4.X.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/gist/gistproc.c, fix incorrect arguments for gist_box_penalty call. The bug could be observed only for secondary page split (i.e. for non-first columns of index). Patch by Paul Ramsey.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Solution.pm, fix MSVC build breakage from psql help changes. Per Josh Williams.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in two more revisions of the patch for named/mixed notation in PL/pgsql.</li>

<li>Pierre Frederic Caillaud sent in another revision of the LWlocks instrumentation patch.</li>

<li>Heikki Linnakangas sent in two more WIP patches for index-only quals.</li>

<li>ITAGAKI Takahiro sent in another revision of the per-column trigger patch.</li>

<li>KaiGai Kohei sent in another revision of the ACL refactoring patch.</li>

<li>Fujii Masao sent in another revision of the streaming replication patch.</li>

<li>Magnus Hagander sent in a WIP patch to refactor the syslogger infrastructure, which he has been working on with Josh Tolley.</li>

<li>Andrew (RhodiumToad) Gierth sent in two more revisions of the hstore patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to fix encoding issues vs. eventlog on win32.</li>

<li>Jeff Davis sent in another revision of the generalized index constraints patch.</li>

<li>Simon Riggs sent in a giant patch to implement Hot Standby.</li>

<li>Robert Haas sent in a patch to fix his earlier join removal patch.</li>

<li>ITAGAKI Takahiro sent an updated patch to fix query cancel issues in dblink.</li>

<li>Abhijit Menon-Sen sent in patches to change logging parameters.</li>

<li>Heikki Linnakangas sent in a patch to add a vacuumfull contrib module, per discussion.</li>

<li>Emmanuel Cecchet sent in five more revisions of a patch to add generic options to COPY.</li>

<li>Michael Paquier sent in two more updated patches adding shell commands to pgbench.</li>

<li>Stef Walter sent in another revision of the samehost/samenet patch for pg_hba.conf.</li>

<li>Robert Fleming sent in two revisions of a patch to allow PostgreSQL to do an LDAP search to determine the user's DN.</li>

<li>Zdenek Kotala sent in a patch to add an init option to pg_ctl.</li>

<li>Heikki Linnakangas sent a WIP patch to make walreceiver a stand-alone program. This is for streaming replication.</li>

<li>Zoltan Boszormenyi sent in another patch for SQLDA support in ECPG.</li>

<li>Zoltan Boszormenyi sent in two revisions of a DESCRIBE patch for ECPG.</li>

<li>Zoltan Boszormenyi sent in a patch to fix a memory leak in NUMERIC in ECPG.</li>

<li>Pavel Stehule sent in another revision of the patch to fix handling of MOVE and FETCH in PL/pgsql.</li>

<li>Bernd Helmle sent in a revision of the patch to allow more complex user and database default GUCs.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of the default ACLs patch.</li>

<li>Pierre Frederic Caillaud sent in another revision of the LWLock instrumentation patch.</li>

</ul>