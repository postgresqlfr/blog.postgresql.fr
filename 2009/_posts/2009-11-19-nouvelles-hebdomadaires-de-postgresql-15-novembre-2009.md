---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 novembre 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/11/19/Nouvelles-hebdomadaires-de-PostgreSQL-15-novembre-2009"
---


<p>La <i>Commitfest</i> de novembre a d&eacute;but&eacute;. Relisez-vous les uns les autres&nbsp;!</p>

<p>Nouveau sondage&nbsp;: quelle fonctionnalit&eacute; de la 8.5alpha2 avez-vous essay&eacute;e&nbsp;? 

<a target="_blank" href="http://www.postgresql.org/community/">http://www.postgresql.org/community/</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-11/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>"L'OpenSQL Camp" aura lieu les 14 &amp; 15 novembre &agrave; Portland, Oregon&nbsp;: 

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement &agrave; l'occasion du 10<sup>&egrave;me</sup> anniversaire du JPUG est programm&eacute; pour les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japon&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Stefan Keller, de l'universit&eacute; des sciences appliqu&eacute;es de Rapperswil (HSR), animera un s&eacute;minaire intitul&eacute; "Introduction &agrave; PostGIS/PostgreSQL" le 14 janvier 2010 &agrave; Zurich (Suisse)&nbsp;: 

<a target="_blank" href="http://www.gis.hsr.ch/wiki/Agenda">http://www.gis.hsr.ch/wiki/Agenda</a></li>

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

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20091115">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Re-refactor the core scanner's API, in order to get out from under the problem of different parsers having different YYSTYPE unions that they want to use with it. I defined a new union core_YYSTYPE that is just the (very short) list of semantic values returned by the core scanner. I had originally worried that this would require an extra interface layer, but actually we can have parser.c's base_yylex (formerly filtered_base_yylex) take care of that at no extra cost. Names associated with the core scanner are now "core_yy_foo", with "base_yy_foo" being used in the core Bison parser and the parser.c interface layer. This solves the last serious stumbling block to eliminating plpgsql's separate lexer. One restriction that will still be present is that plpgsql and the core will have to agree on the token numbers assigned to tokens that can be returned by the core lexer. Since Bison doesn't seem willing to accept external assignments of those numbers, we'll have to live with decreeing that core and plpgsql grammars declare these tokens first and in the same order.</li>

<li>More incremental refactoring in plpgsql: get rid of gram.y dependencies on yytext. This is a necessary change if we're going to have a lexer interface layer that does lookahead, since yytext won't necessarily be in step with what the grammar thinks is the current token. yylval and yylloc should be the only side-variables that we need to manage when doing lookahead.</li>

<li>In pgsql/src/backend/commands/tablespace.c, revert the temporary patch to work around Snow Leopard readdir() bug. Apple has fixed that bug in 10.6.2, and we should encourage users to update to that version rather than trusting this cosmetic patch. As was recently noted by Stephen Tyler, this patch was only masking the problem in the context of DROP TABLESPACE, but the failure could occur in other places such as pg_xlog cleanup.</li>

<li>Do not build psql's flex module on its own, but instead include it in mainloop.c. This ensures that postgres_fe.h is read before including any system headers, which is necessary to avoid problems on some platforms where we make nondefault selections of feature macros for stdio.h or other headers. We have had this policy for flex modules in the backend for many years, but for some reason it was not applied to psql. Per trouble report from Alexandra Roy and diagnosis by Albe Laurenz.</li>

<li>Remove plpgsql's separate lexer (finally!), in favor of using the core lexer directly. This was a lot of trouble, but should be worth it in terms of not having to keep the plpgsql lexer in step with core anymore. In addition the handling of keywords is significantly better-structured, allowing us to de-reserve a number of words that plpgsql formerly treated as reserved.</li>

<li>Remove pg_parse_string_token() --- not needed anymore.</li>

<li>Make initdb behave sanely when the selected locale has codeset "US-ASCII". Per discussion, this should result in defaulting to SQL_ASCII encoding. The original coding could not support that because it conflated selection of SQL_ASCII encoding with not being able to determine the encoding. Adjust pg_get_encoding_from_locale()'s API to distinguish these cases, and fix callers appropriately. Only initdb actually changes behavior, since the other callers were perfectly content to consider these cases equivalent. Per bug #5178 from Boh Yap. Not going to bother back-patching, since no one has complained before and there's an easy workaround (namely, specify the encoding you want).</li>

<li>In pgsql/src/port/chklocale.c, check for C/POSIX before assuming that nl_langinfo or win32_langinfo will work. Per buildfarm results.</li>

<li>In pgsql/src/backend/utils/misc/guc-file.l, the recent patch to log changes in postgresql.conf settings dumped core if the initial value of a string variable was NULL, which is entirely possible. Noted while experimenting with custom_variable_classes.</li>

<li>Add control knobs for plpgsql's variable resolution behavior, and make the default be "throw error on conflict", as per discussions. The GUC variable is plpgsql.variable_conflict, with values "error", "use_variable", "use_column". The behavior can also be specified per-function by inserting one of #variable_conflict error, #variable_conflict use_variable, #variable_conflict use_column at the start of the function body. The 8.5 release notes will need to mention using "use_variable" to retain backward-compatible behavior, although we should encourage people to migrate to the much less mistake-prone "error" setting. Update the plpgsql documentation to match this and other recent changes.</li>

<li>In pgsql/src/include/nodes/parsenodes.h, avoid assuming that enum CreateStmtLikeOption is unsigned. Zdenek Kotala</li>

<li>In pgsql/src/backend/parser/parse_utilcmd.c, clean up a couple of bizarre code formatting choices in recent CREATE LIKE patch.</li>

<li>Make unaccent's install/uninstall scripts look more like all the others. Set search_path explicitly, don't use IF EXISTS, etc.</li>

<li>Improve planning of Materialize nodes inserted atop the inner input of a mergejoin to shield it from doing mark/restore and refetches. Put an explicit flag in MergePath so we can centralize the logic that knows about this, and add costing logic that considers using Materialize even when it's not forced by the previously-existing considerations. This is in response to a discussion back in August that suggested that materializing an inner indexscan can be helpful when the refetch percentage is high enough.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plpgsql.sgml: PL/pgSQL FOUND, document that GET DIAGNOSTICS is affected by EXECUTE, while FOUND is not.</li>

<li>In pgsql/doc/src/sgml/plpgsql.sgml: PL/pgSQL FOUND, update wording of GET DIAGNOSTICS/FOUND, per David Fetter.</li>

<li>In pgsql/src/backend/utils/adt/timestamp.c, add C comment about why there is no interval_abs(): it is unclear what value to return. 

<a target="_blank" href="http://archives.postgresql.org/pgsql-general/2009-10/msg01031.php">http://archives.postgresql.org/pgsql-general/2009-10/msg01031.php</a> <a target="_blank" href="http://archives.postgresql.org/pgsql-general/2009-11/msg00041.php">http://archives.postgresql.org/pgsql-general/2009-11/msg00041.php</a></li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix longstanding problems in VACUUM caused by untimely interruptions. In VACUUM FULL, an interrupt after the initial transaction has been recorded as committed can cause postmaster to restart with the following error message: PANIC: cannot abort transaction NNNN, it was already committed This problem has been reported many times. In lazy VACUUM, an interrupt after the table has been truncated by lazy_truncate_heap causes other backends' relcache to still point to the removed pages; this can cause future INSERT and UPDATE queries to error out with the following error message: could not read block XX of relation 1663/NNN/MMMM: read only 0 of 8192 bytes The window to this race condition is extremely narrow, but it has been seen in the wild involving a cancelled autovacuum process. The solution for both problems is to inhibit interrupts in both operations until after the respective transactions have been committed. It's not a complete solution, because the transaction could theoretically be aborted by some other error, but at least fixes the most common causes of both problems.</li>

<li>Support optional FROM/IN in FETCH and MOVE. The main motivation for this is that it's required for Informix compatibility in ECPG. This patch makes the ECPG and core grammars a bit closer to one another for these productions. Zoltan Boszormenyi</li>

<li>Document the previous FETCH and MOVE changes.</li>

<li>Change "name" nonterminal in cursor-related productions to cursor_name. This is a preparatory patch for allowing a dynamic cursor name be used in the ECPG grammar. Zoltan Boszormenyi.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/describe.c, in psql \du, separate the role attributes by comma instead of newline, for an arguably more pleasant display.</li>

<li>In pgsql/src/backend/tsearch/wparser_def.c, make text search parser accept underscores in XML attributes (bug #5075).</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/gin/ginget.c, fix multicolumn GIN's wrong results with fastupdate enabled. User-defined consistent functions believes the check array contains at least one true element which was not a true for scanning pending list. Per report from Yury Don.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/parser/parse_expr.c, when you do "ARRAY[...]::domain", where domain is a domain over an array type, we need to check domain constraints. We used to do it correctly, but 8.4 introduced a separate code path for the "ARRAY[]::arraytype" case to infer the type of an empty ARRAY construct from the cast target, and forgot to take domains into account. Per report from Florian G. Pflug.</li>

<li>In pgsql/src/backend/parser/parse_expr.c, a better fix for the "ARRAY[...]::domain" problem. The previous patch worked, but the transformed ArrayExpr claimed to have a return type of "domain", even though the domain constraint was only checked by the enclosing CoerceToDomain node. With this fix, the ArrayExpr is correctly labeled with the base type of the domain. Per gripe by Tom Lane.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Add inheritable ACE when creating a restricted token for execution on Win32. Also refactor the code around it to be more clear. Jesse Morris.</li>

<li>Backpatch the inheritable-ACE patch for Win32 to 8.2 as well, except for the pg_regress part which did not support admin execution in 8.2.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Josh Tolley sent in another revision of the patch to add in-line (DO) functions to PL/Perl[U]. Brendan Jurd sent some cleanups for it.</li>

<li>Heikki Linnakangas sent in another revision of the Hot Standby patch.</li>

<li>Emmanuel Cecchet sent in two more revisions of the patch to add partitioning support to COPY.</li>

<li>Joachim Wieland sent in a patch to add a payload to LISTEN/NOTIFY.</li>

<li>ITAGAKI Takahiro sent in another revision of the table partitioning patch.</li>

<li>Peter Eisentraut sent in another revision of the patch for PL/PythonU array support.</li>

<li>Peter Eisentraut sent in a patch to add Python 3.1 to PL/PythonU.</li>

<li>ITAGAKI Takahiro sent in an update version of the TRIGGER with WHEN patch.</li>

<li>Andres Freund sent in another revision of the application name logging patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the VACUUM FULL refactoring patch.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patch.</li>

<li>Andrew (RhodiumToad) Gierth sent in a patch to add ORDER BY to the inside of aggregates for the non-WINDOW context.</li>

<li>KaiGai Kohei sent in another revision of the patch to add ACLs for large objects.</li>

<li>Zdenek Kotala sent in a patch to add dtrace probes for memory management.</li>

<li>Zdenek Kotala sent in another revision of that patch to add dtrace probe groups for executor and slru.</li>

<li>Andrew (RhodiumToad) Gierth sent in a doc patch for the aggregate ORDER BY patch.</li>

<li>Hitoshi Harada sent in a patch to add more frame types (ROWS n PRECEDING/FOLLOWING) to windowing frames.</li>

<li>George Gensure sent in a patch intended to report the schema along with the table name on errors.</li>

<li>Robert Haas sent in a patch to allow you to set random_page_cost and seq_page_cost at the granularity of tablespace.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the Writeable CTE patch.</li>

<li>Heikki Linnakangas sent in another revision of the Hot Standby patch.</li>

<li>Florian Pflug sent in a patch to allow inspection of rowtypes in SQL and PL/pgsql.</li>

<li>Pavel Stehule sent in another revision of the function typmod patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the VACUUM refactoring patch.</li>

<li>Jeff Davis sent in another revision of the operator exclusion constraints patch.</li>

<li>Roger Leigh sent in three more revisions of the Unicode formatting patch for psql output.</li>

<li>Pavel Stehule sent in a patch to allow using psql variables as actual query parameters.</li>

<li>ITAGAKI Takahiro sent in a review of Greg Sabino Mullane's patch to add YAML output as an option for EXPLAIN [ANALYZE].</li>

</ul>