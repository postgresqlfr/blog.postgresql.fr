---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 avril 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-04-22-nouvelles-hebdomadaires-de-postgresql-19-avril-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-04/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PgDay de Florianopolis aura lieu le 22 mai. Contactez Dickson S. Guedes (guedes AROBASE guedesoft DOT net) pour participer ou proposer une conf&eacute;rence&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/pgday/sc">http://www.postgresql.org.br/eventos/pgday/sc</a></li>

<li>La "Percona Performance Conference" prendra place au "Santa Clara Convention Center", Santa Clara, Californie&nbsp;: 

<a target="_blank" href="http://conferences.percona.com/">http://conferences.percona.com/</a></li>

<li>L'appel aux conf&eacute;rences est lanc&eacute; pour le PgDay de S&atilde;o Paulo, programm&eacute; le 24 avril. Contactez [marins (point) consultoria (a) gmail (point) com] ou [marcelojscosta (a) gmail (point) com] pour participer.</li>

<li>"PostgreSQL Conference, U.S. (JDCon)" organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est consultable &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Il y aura &eacute;galement des PgDays les 29 et 30 avril, respectivement &agrave; Porto Velho (RO) et Ji-Parana (RO). Contactez Luis Fernando Bueno&nbsp;: [proflfbueno (a) gmail (point) com] pour participer.</li>

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

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/release.sgml, make a copy-editing pass over the 8.4 release notes.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, do some copy-editing on description of ts_headline().</li>

<li>In pgsql/src/backend/parser/scan.l, fix broken {xufailed} production that made HEAD fail on select u&amp;42 from table-with-a-u-column; Also fix missing SET_YYLLOC() in the {dolqfailed} production that I suppose this was based on. The latter is a pre-existing bug, but the only effect is to misplace the error cursor by one token, so probably not worth backpatching.</li>

<li>Fix planner to restore its previous level of intelligence about pushing constants through full joins, as in SELECT * FROM tenk1 a FULL JOIN tenk1 b USING (unique1) WHERE unique1 = 42; which should generate a fairly cheap plan where we apply the constraint unique1 = 42 in each relation scan. This had been broken by my patch of 2008-06-27, which is now reverted in favor of a more invasive but hopefully less incorrect approach. That patch was meant to prevent incorrect extraction of OR'd indexclauses from OR conditions above an outer join. To do that correctly we need more information than the outerjoin_delay flag can provide, so add a nullable_relids field to RestrictInfo that records exactly which relations are nulled by outer joins that are underneath a particular qual clause. A side benefit is that we can make the test in create_or_index_quals more specific: it is now smart enough to extract an OR'd indexclause into the outer side of an outer join, even though it must not do so in the inner side. The old coding couldn't distinguish these cases so it could not do either.</li>

<li>In pgsql/src/backend/optimizer/path/costsize.c, bump disable_cost up from 1e8 to 1e10, per gripe from Kris Jurka.</li>

<li>Revise plpgsql's scanner to process comments and string literals in a way more nearly matching the core SQL scanner. The user-visible effects are: 1. Block comments (slash-star comments) now nest, as per SQL spec. 2. In standard_conforming_strings mode, backslash as the last character of a non-E string literal is now correctly taken as an ordinary character; formerly it was misinterpreted as escaping the ending quote. (Since the string also had to pass through the core scanner, this invariably led to syntax errors.) 3. Formerly, backslashes in the format string of RAISE were always treated as quoting the next character, regardless of mode. Now, they are ordinary characters with standard_conforming_strings on, while with it off, they introduce the same set of escapes as in the core SQL scanner. Also, escape_string_warning is now effective for RAISE format strings. These changes make RAISE format strings work just like any other string literal. This is implemented by copying and pasting a lot of logic from the core scanner. It would be a good idea to look into getting rid of plpgsql's scanner entirely in favor of using the core scanner. However, that involves more change than I can justify making during beta --- in particular, the core scanner would have to become re-entrant. In passing, remove the kluge that made the plpgsql scanner emit T_FUNCTION or T_TRIGGER as a made-up first token. That presumably had some value once upon a time, but now it's just useless complication for both the scanner and the grammar.</li>

<li>Fix estimate_num_groups() to not fail on PlaceHolderVars, per report from Stefan Kaltenbrunner. The most reasonable behavior (at least for the near term) seems to be to ignore the PlaceHolderVar and examine its argument instead. In support of this, change the API of pull_var_clause() to allow callers to request recursion into PlaceHolderVars. Currently estimate_num_groups() is the only customer for that behavior, but where there's one there may be others.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, fix textsearch documentation examples to not recommend concatenating separate fields without putting a space between. Per gripe from Rick Schumeyer.</li>

<li>Fix de-escaping checks so that we will reject \000 as well as other invalidly encoded sequences. Per discussion of a couple of days ago.</li>

<li>Rethink the idea of having plpgsql depend on parser/gram.h. Aside from the fact that this is breaking the MSVC build, it's probably not really a good idea to expand the dependencies of gram.h any further than the core parser; for instance the value of SCONST might depend on which bison version you'd built with. Better to expose an additional call point in parser.c, so move what I had put into pl_funcs.c into parser.c. Also PGDLLIMPORT'ify the reference to standard_conforming_strings, per buildfarm results.</li>

<li>Assorted portability fixes for Borland C, from Pavel Golub.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_restore.c, make new strings more alike previously existing messages.</li>

<li>In pgsql/src/bin/pg_dump/pg_restore.c, pg_restore -jN does not equate "multiple jobs", so partly revert the previous patch. Per note from Tom Lane.</li>

<li>In pgsql/src/backend/commands/dbcommands.c, add missing periods.</li>

<li>In pgsql/src/backend/libpq/hba.c, add missing gettext calls around some strings. Also remove quotes around the %s that they expand to, per comment from Tom Lane.</li>

<li>In pgsql/src/backend/utils/adt/arrayfuncs.c, substitute extraneous underscores with spaces.</li>

<li>In pgsql/src/test/regress/expected/arrays.out, fix the regression test error message for array_fill, too. Per note from Andrew Dunstan.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, add libpq error message text on how to handle missing root.crt file.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, reformat 'sslmode' options into an SGML table; improve wording.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, fix SGML markup I broke yesterday.</li>

<li>Remove mention of pre-7.1 inheritance behavior from /ref pages; keep mentions in main documentation.</li>

<li>In pgsql/doc/src/sgml/release.sgml, add Ron Mayer as primary contributor for, "support the IS0 8601 interval syntax" based on private email from Ron.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/pgcrypto/crypt-md5.c, remove beer-ware license from crypt-md5.c, per approval from Poul-Henning Kamp. This makes the file the same standard 2-clause BSD as the rest of PostgreSQL.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>KaiGai Kohei's patch to separate the ACL for SELECT ... FOR UPDATE from UPDATE. Not needed.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Abhijit Menon-Sen sent in another revision of his patch to test quoting in PL/pgSQL.</li>

<li>ITAGAKI Takahiro sent in a patch to implement GetPlatformEncoding() and convert absolute file paths from database encoding to platform encoding.</li>

<li>David Fetter sent in three patches to make \df describe whether a function is normal, aggregate, trigger or windowing and let people choose any or all of those to see.</li>

<li>ITAGAKI Takahiro sent in a WIP patch to solve server-side encoding issues.</li>

<li>Fujii Masao sent in another revision of his trigger patch for pg_standby.</li>

<li>Marko Kreen sent in a patch to add \u and \U as unicode escapes.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patches.</li>

</ul>