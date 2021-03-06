---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/03/05/Nouvelles-neuves-de-PostgreSQL"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 1<sup>er</sup> mars 2009</strong></p>

<p>PostgreSQLFr tiendra un stand aux Solutions Linux 2009 &agrave; Paris. Volontaires&nbsp;: sas (a) postgresql (point) fr, ou sur le wiki&nbsp;: 

<a target="_blank" href="http://postgresql.fr/sl2009:start">http://postgresql.fr/sl2009:start</a></p>

<p>Le PUG de Denver se r&eacute;unira le 27 mars. Restez branch&eacute;s pour les d&eacute;tails.</p>

<p>Michael Renner animera un atelier sur la r&eacute;plication PostgreSQL lors des "Netways OSDC" 2009 &agrave; Nuremberg (All.)&nbsp;: 

<a target="_blank" href="http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/">http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Npgsql2 2.0.3, une API .Net pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.npgsql.org">http://www.npgsql.org</a></li>

<li>pgpool-II 2.2, un gestionnaire de connexions et bien plus, ainsi que son interface graphique pgpoolAdmin 2.2&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>Simpycity, un syst&egrave;me de mapping en Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="https://projects.commandprompt.com/public/simpycity/">https://projects.commandprompt.com/public/simpycity/</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 8.4 de la semaine</strong></p>

<p>pg_stat_statements. Ce module en "contrib" de Itagaki Takahiro vous donnera, en quasi-temps r&eacute;el, un "Top 25 des requ&ecirc;tes" &agrave; la pgFouine sur vos bases de donn&eacute;es.</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>L'"autovacuum" est fortement conseill&eacute; pour la plupart des applications de BD, &agrave; une exception pr&egrave;s&nbsp;: le chargement massif de donn&eacute;es, avec un ETL ou une restauration de base par exemple.</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090301">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

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

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter, Josh Berkus et Devrim Gunduz. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Change the signaling of end-of-recovery. Startup process now indicates end of recovery by exiting with exit code 0, like in previous releases. Per Tom's suggestion.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, put back a "continue" that went missing in the changes to start background writer in WAL recovery.</li>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, set isnull for errm and sqlstate local variables when they're free'd. Because they are out of scope for any code after that anyway, leaving isnull true should be harmless. However, PL/pgSQL Debugger doesn't seem to care about the scoping and crashed, per report by Robert Walker (bug #4635). And it's good to be tidy for debugging purposes too. Fix in 8.3, 8.2 and 8.1 branches, CVS HEAD was fixed earlier already. Analysis and fix by Ashesh Vashi and Dave Page.</li>

<li>In pgsql/src/backend/commands/conversioncmds.c, in CREATE CONVERSION, test that the given function is a valid conversion function for the specified source and destination encodings. We do that by calling the function with an empty string. If it can't perform the requested conversion, it will throw an error. Backport to 7.4 - 8.3. Per bug report #4680 by Denis Afonin.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, add quotes to message.</li>

<li>Add the possibility to specify an explicit validator function for foreign-data wrappers (similar to procedural languages). This way we don't need to retain the nearly empty libraries, and we are more free in how to implement the wrapper API in the future.</li>

<li>Don't append epoch to log_filename if no format specifier is given. Robert Haas</li>

<li>Sort the output of --help mostly alphabetical, make it align better, make help of pg_dump and pg_dumpall more similar.</li>

<li>Remove feof(stdin) calls related to when to prompt for a password, leftovers from when the password was read from stdin.</li>

<li>In pgsql/contrib/vacuumlo/vacuumlo.c, clean up help (-?) output.</li>

<li>In pgsql/src/bin/pg_config/pg_config.c, use the same style in the help synopsis that other programs are using.</li>

<li>Add a -w/--no-password option that prevents all password prompts to all programs that have a -W/--password option. In passing, remove the ancient PSQL_ALWAYS_GET_PASSWORDS compile option.</li>

<li>Final removal of -q options, which haven't done anything since 8.3 and were marked for removal in 8.4.</li>

<li>Fix the inconsistent and wrong claims that the option value in CREATE FOREIGN DATA WRAPPER/SERVER/USER MAPPING is optional.</li>

<li>Equip the programs installed by contrib with proper --help and --version options and normally formatted help output.</li>

<li>In pgsql/src/bin/psql/help.c, add the long options to the psql --help display, where they were curiously missing. Since this touches most lines of the help output, also change the mix of puts and printf calls to printf everywhere, for easier code editing and reviewing.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/describe.c, fix psql's \dD to show only one row per domain, even when the domain has multiple check constraints.</li>

<li>Repair a longstanding bug in CLUSTER and the rewriting variants of ALTER TABLE: if the command is executed by someone other than the table owner (eg, a superuser) and the table has a toast table, the toast table's pg_type row ends up with the wrong typowner, ie, the command issuer not the table owner. This is quite harmless for most purposes, since no interesting permissions checks consult the pg_type row. However, it could lead to unexpected failures if one later tries to drop the role that issued the command (in 8.1 or 8.2), or strange warnings from pg_dump afterwards (in 8.3 and up, which will allow the DROP ROLE because we don't create a "redundant" owner dependency for table rowtypes). Problem identified by Cott Lang. Back-patch to 8.1. The problem is actually far older --- the CLUSTER variant can be demonstrated in 7.0 --- but it's mostly cosmetic before 8.1 because we didn't track ownership dependencies before 8.1. Also, fixing it before 8.1 would require changing the call signature of heap_create_with_catalog(), which seems to carry a nontrivial risk of breaking add-on modules.</li>

<li>Get rid of the rather fuzzily defined FlattenedSubLink node type in favor of making pull_up_sublinks() construct a full-blown JoinExpr tree representation of IN/EXISTS SubLinks that it is able to convert to semi or anti joins. This makes pull_up_sublinks() a shade more complex, but the gain in semantic clarity is worth it. I still have more to do in this area to address the previously-discussed problems, but this commit in itself fixes at least one bug in HEAD, as shown by added regression test case.</li>

<li>In pgsql/src/backend/utils/adt/ruleutils.c, fix an old problem in decompilation of CASE constructs: the ruleutils.c code looks for a CaseTestExpr to figure out what the parser did, but it failed to consider the possibility that an implicit coercion might be inserted above the CaseTestExpr. This could result in an Assert failure in some cases (but correct results if Asserts weren't enabled), or an "unexpected CASE WHEN clause" error in other cases. Per report from Alan Li. Back-patch to 8.1; problem doesn't exist before that because CASE was implemented differently.</li>

<li>Remove outdated join_1.out regression test comparison file. This has been broken for more than a month, so evidently it's not needed, at least not for any configuration in the buildfarm. We can correct it and replace it later if we find something that still needs it.</li>

<li>In pgsql/src/backend/optimizer/util/pathnode.c, improve create_unique_path to not be fooled by unrelated clauses that happen to be syntactically part of a semijoin clause. For example given WHERE EXISTS(SELECT ... WHERE upper.var = lower.var AND some-condition) where some-condition is just a restriction on the lower relation, we can use unique-ification on lower.var after having applied some-condition within the scan on lower.</li>

<li>Tighten up join ordering rules to account for recent more-careful analysis of the associativity of antijoins. Also improve optimizer/README discussion of outer join ordering rules.</li>

<li>In pgsql/src/backend/optimizer/prep/prepjointree.c, temporarily (I hope) disable flattening of IN/EXISTS sublinks that are within the ON clause of an outer join. Doing so is semantically correct but results in de-optimizing queries that were structured to take advantage of the sublink style of execution, as seen in recent complaint from Kevin Grittner. Since the user can get the other behavior by reorganizing his query, having the flattening happen automatically is just a convenience, and that doesn't justify breaking existing applications. Eventually it would be nice to re-enable this, but that seems to require a significantly different approach to outer joins in the executor.</li>

<li>Reduce the maximum value of vacuum_cost_delay and autovacuum_vacuum_cost_delay to 100ms (from 1000). This still seems to be comfortably larger than the useful range of the parameter, and it should help discourage people from picking uselessly large values. Tweak the documentation to recommend small values, too. Per discussion of a couple weeks ago.</li>

<li>In pgsql/src/backend/optimizer/path/pathkeys.c, shave a few cycles in compare_pathkeys() by checking for pointer-identical input lists before we grovel through the lists. This doesn't save much, but testing shows that the case of both inputs NIL is common enough that it saves something. And this is used enough to be a hotspot.</li>

<li>Fix buffer allocations in encoding conversion routines so that they won't fail on zero-length inputs. This isn't an issue in normal use because the conversion infrastructure skips calling the converters for empty strings. However a problem was created by yesterday's patch to check whether the right conversion function is supplied in CREATE CONVERSION. The most future-proof fix seems to be to make the converters safe for this corner case.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, remove references to foreign data wrapper libraries, since they have been removed. This should unbreak the msvc build again.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/xml.c, don't mangle xml and xpath unless xml is not in fact a well-formed document, in xpath(). If mangling xpath, make a saner attempt where xpath expression does not begin with '/'.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>James Pye's patch which changes the behavior of xpath processing to account for fragments. Returned for review as it changes a functionality in a non-bug-fixing way.</li>

<li>Sushint Sinhas's patch to add space when FragmentDelimiter is specified in tsearch2. Functionality is available via less invasive means.</li>

<li>Pavel Stehule's patch to support a mix of named parameters and default values for functions. Too much ambiguity in interpretation.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in two more revisions of his SE-PostgreSQL patches.</li>

<li>Alan Li sent in a patch to fix a back-end assertion failure which can be triggered by defining a VIEW with CASE on a table.</li>

<li>Martin Pihlak sent in a patch to have the \d commands treat information schema as system objects, making them invisible by default. They are still visible via the \d*S commands.</li>

<li>Damien Clochard sent in a patch to psql which shows tables which inherit a given table when invoking \d table.</li>

<li>Heikki Linnakangas sent in a WIP patch for Hot Standby showing how transaction tracking could work using "unobserved xids," now actually all master transactions, alone.</li>

<li>Robert Lor sent in a doc patch for the recently added DTrace probes.</li>

<li>Dave Page sent in a patch from Ashesh Vashi which fixes a PL/PgSQL bug in 8.3 where after setting state_var-&gt;value and errm_var-&gt;value to null, state_var-&gt;isnull and errm_var-&gt;isnull are not set correspondingly.</li>

<li>Peter Eisentraut sent in a patch to add SQL:2008 error codes for LIMIT and OFFSET values.</li>

<li>Peter Eisentraut sent in a patch which prevents PostgreSQL from violating the system limit of maximum open files.</li>

</ul>