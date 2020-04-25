---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 avril 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/04/18/Nouvelles-hebdomadaires-de-PostgreSQL-12-avril-2009"
---


<p>Le PUG italien pr&eacute;sentera un aper&ccedil;u de PostgreSQL aux &eacute;tudiants informaticiens de l'universit&eacute; de Pise, le vendredi 8 mai&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/event.856">http://www.postgresql.org/about/event.856</a></p>

<p>Le PgDay de Florianopolis aura lieu le 22 mai. Contactez Dickson S. Guedes (guedes AROBASE guedesoft DOT net) pour participer ou proposer une conf&eacute;rence&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/pgday/sc">http://www.postgresql.org.br/eventos/pgday/sc</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>py-postgresql 0.8, un ensemble de programmes Python pour utilisation dans et hors du moteur de PostgreSQL&nbsp;: 

<a target="_blank" href="http://python.projects.postgresql.org/docs/0.8/">http://python.projects.postgresql.org/docs/0.8/</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 8.4 de la semaine</strong></p>

<p>psql est &agrave; pr&eacute;sent "multi-version", ce qui signifie que vos commandes en "backslash" fonctionneront m&ecirc;me si vous vous connectez, avec cette nouvelle version de psql, &agrave; un vieux serveur.</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>Le moyen le plus simple d'&eacute;liminer les doublons dans une table dont la clef naturelle est manquante est de lancer un CREATE TABLE AS ... GROUP BY vers une nouvelle table, TRUNCATE, puis recopier les donn&eacute;es vers la table d'origine. Et, bien s&ucirc;r, ne pas oublier de configurer la clef naturelle&nbsp;!</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090412">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-04/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PgDay de Brasilia aura lieu le 17 avril. Contactez [fernando.ike (a) gmail (point) com] ou [eduardo (a) planejamento (point) gov (point) br] pour participer&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/drupal6/eventos/pgday/df">http://www.postgresql.org.br/drupal6/eventos/pgday/df</a></li>

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

<li style="list-style: none; display: inline">

<p>Le PgDay de Florianopolis aura lieu le 22 mai. Contactez Dickson S. Guedes (guedes AROBASE guedesoft DOT net) pour participer ou proposer une conf&eacute;rence&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/pgday/sc">http://www.postgresql.org.br/eventos/pgday/sc</a></p>

</li>

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

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Rename the new CREATE DATABASE options to set collation and ctype into LC_COLLATE and LC_CTYPE, per discussion on pgsql-hackers.</li>

<li>Tell gettext which codeset to use by calling bind_textdomain_codeset(). We already did that on Windows, but it's needed on other platforms too when LC_CTYPE=C. With other locales, we enforce (or trust) that the codeset of the locale matches the server encoding so we don't need to bind it explicitly. It should do no harm in that case either, but I don't have full faith in the PG encoding -&gt; OS codeset mapping table yet. Per recent discussion on pgsql-hackers.</li>

<li>In pgsql/src/backend/utils/init/postinit.c, oops, mustn't call textdomain() when compiling without --enable-nls</li>

<li>Quote string literals correctly in the new CREATE SERVER statements and binary upgrade UPDATE statements.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix 'all at one page bug' in picksplit method of R-tree emulation. Add defense from buggy user-defined picksplit to GiST.</li>

<li>Fix 'all at one page bug' in picksplit method of R-tree emulation. Add defense from buggy user-defined picksplit to GiST.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/keywords.sgml, correct keywords table for status of COLLATE vs LC_COLLATE.</li>

<li>In pgsql/doc/src/sgml/fuzzystrmatch.sgml, document the fact that fuzzystrmatch doesn't work in multibyte encodings.</li>

<li>Add an optional parameter to pg_start_backup() that specifies whether to do the checkpoint in immediate or lazy mode. This is to address complaints that pg_start_backup() takes a long time even when there's no need to minimize its I/O consumption.</li>

<li>In pgsql/contrib/fuzzystrmatch/fuzzystrmatch.c, defend against non-ASCII letters in fuzzystrmatch code. The functions still don't behave very sanely for multibyte encodings, but at least they won't be indexing off the ends of static arrays.</li>

<li>In pgsql/contrib/pg_freespacemap/pg_freespacemap.c, remove useless (leftover?) extern declaration.</li>

<li>Allow leading and trailing spaces around NaN in numeric_in. Sam Mason, rewritten a bit by Tom Lane.</li>

<li>Remove psql's ancient hack that suppressed functions taking or returning cstring from the output of \df. Now that the default behavior is to exclude all system functions, the de-cluttering rationale for this behavior seems pretty weak; and it was always quite confusing/unhelpful if you were actually looking for I/O functions. (Not to mention if you were looking for encoding converters or other cases that might take or return cstring.)</li>

<li>Fix the plpgsql memory leak exhibited in bug #4677. That leak was introduced by my patch of 2007-01-28 to use per-subtransaction ExprContexts/EStates: since we re-prepared any expression tree when the current subtransaction ID changed, we'd accumulate more and more leaked expression state trees in the outermost subtransaction if the same function was executed at multiple levels of subtransaction nesting. To fix, go back to the previous scheme where there was only one EState per transaction for simple plpgsql expressions. We really only need an ExprContext per subtransaction, not a whole EState, so it's possible to keep prepared expression state trees in the one EState throughout the transaction. This should be more efficient as well as not leaking memory for cases involving lots of subtransactions. The added regression test is the case that inspired the 2007-01-28 patch in the first place, just to make sure we didn't go backwards. The current memory leak complaint is unfortunately hard to test for in the regression test framework, though manual testing shows it's fixed. Although this is a pre-existing bug, I'm not back-patching because I'd like to see this method get some field testing first. Consider back-patching if it gets through 8.4beta unscathed.</li>

<li>In pgsql/src/backend/utils/misc/guc-file.l, treat EOF like \n for line-counting purposes in ParseConfigFile, per bug #4752. Fujii Masao</li>

<li>Remove SQL-compatibility function cardinality(). It is not exactly clear how this ought to behave for multi-dimensional arrays. Per discussion, not having it at all seems better than having it with what might prove to be the wrong behavior. We can always add it later when we have consensus on the correct behavior.</li>

<li>In pgsql/doc/src/sgml/gin.sgml, update GIN limitations documentation to match current reality.</li>

<li>Update time zone data files to tzdata release 2009e: DST law changes in Argentina/San_Luis, Cuba, Jordan (historical correction only), Morocco, Palestine, Syria, Tunisia.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update release notes through yesterday; some minor wordsmithing.</li>

<li>Add cross-references from the DECLARE and FETCH reference pages to the plpgsql documentation about cursors. Per a suggestion from Matthew Wakeling.</li>

<li>In pgsql/src/bin/pg_dump/pg_dumpall.c, fix pg_dumpall so that when --clean is specified, it drops roles and tablespaces in an order that has some chance of working. Per a complaint from Kevin Bailey. This is a pre-existing bug, but given the lack of prior complaints I'm not sure it's worth back-patching. In most cases failure of the DROP commands wouldn't be that important anyway. In passing, fix syntax errors in dumpCreateDB()'s queries for old servers; these were apparently introduced in recent binary_upgrade patch.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/tab-complete.c, adjust psql tab completion for new \d 'S' flag behavior; adjust code to be more flexible about additional modifiers for \d commands.</li>

<li>In pgsql/doc/src/sgml/maintenance.sgml, add documentation mention of 'check_postgres.pl' in Routine Database Maintenance Tasks section.</li>

<li>In pgsql/doc/src/sgml/maintenance.sgml, doc change in new patch, stand-alone -&gt; standalone.</li>

<li>In pgsql/src/backend/utils/misc/postgresql.conf.sample, display postgresql.conf unit options in an easier-to-understand, 2-column format.</li>

<li>In pgsql/src/backend/utils/misc/postgresql.conf.sample, document in postgresql.conf that the default units for log_min_duration_statement is milliseconds.</li>

<li>In pgsql/src/backend/utils/misc/postgresql.conf.sample, properly align equals signs in new postgresql.conf units comments.</li>

<li>Add unit documentation for various postgresql.conf settings.</li>

<li>In pgsql/doc/src/sgml/trigger.sgml, add doc link to section about how to compile triggers.</li>

<li>Remove FAQ and FAQ_DEV ASCII and HTML files from CVS; now on the wiki. Per-language files kept for transator usage.</li>

<li>In pgsql/doc/src/sgml/release.sgml, add release note item: Add Japanese message translations</li>

<li>In pgsql/doc/src/sgml/release.sgml, add attribution for: Add Japanese message translations (Japan PostgreSQL Users Group).</li>

<li>More GUC units doc updates. Euler Taveira de Oliveira.</li>

<li>Disable effective_io_concurrency on Solaris because posix_fadvise() is no-op on that platform.</li>

<li>In pgsql/src/backend/utils/misc/guc.c, revert addition of units to GUC descriptions; doesn't affect postgresql.conf.</li>

<li>In pgsql/src/bin/psql/tab-complete.c, improve tab completion for \ef. Andrew (RhodiumToad) Gierth.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, improve documentation about how checkpoint spreads I/O activity.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, no more need to update FAQs.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, clarify documentation references to pg_stat_get_blocks_fetched and pg_stat_get_blocks_hit, per suggestion from Robert Haas.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, document how *_blks_read statistics columns are computed.</li>

<li>In pgsql/doc/src/sgml/release.sgml, clarify SSL _user_ authentication in release notes.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, wording improvement for SSL user certificate authentication.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, wording improvement.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, better document libpq sslverify behavior as requiring root.crt.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, more wording clarification of sslverify setting.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/mb/mbutils.c, add entry in the encoding number to OS name table for KOI8-U.</li>

<li>XMLATTRIBUTES() should send the attribute values through map_sql_value_to_xml_value() instead of directly through the data type output function. This is per SQL standard, and consistent with XMLELEMENT().</li>

<li>Translation updates for 8.4 beta.</li>

<li>Update config.guess and config.sub</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, add URL for config.guess/sub updates.</li>

<li>In pgsql/src/bin/psql/help.c, message improvement.</li>

<li>In pgsql/src/bin/psql/print.c, message fix (I guess this was a cruise replace mistake.)</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, support Perl 5.10 and TCL 8.5 in MSVC builds. We should probably have a better way to do this (meaning something not hardcoded) eventually, but this fixes the problem for 8.4. Dave Page.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Commit and tag beta1.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/psql/common.c, make string more alike other similar messages.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, fix logic to detect conflicts or blocks involving exclusive locks in parallel restore items. If a currently running item needs an exclusive lock on any item that the candidate items needs any sort of lock on, or vice versa, then the candidate item is not allowed to run now, and must wait till later.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in another revision of his transformationHook patch.</li>

<li>Pavel Stehule sent in a patch to add EEEE format support to to_char.</li>

<li>Taro Minowa(Higepon) sent in a patch to auto-delete large objects when the referencing row is deleted.</li>

<li>Fujii Masao sent in another revision of his new trigger option for standby patch.</li>

<li>Magnus Hagander sent in a patch to fix path separator issues on Windows.</li>

<li>ITAGAKI Takahiro sent in an updated version of the sampling profiler patch.</li>

<li>David Fetter sent in three patches to account for windowing functions in psql.</li>

<li>Abhijit Menon-Sen sent in a patch to add tests for quoting and other abuses in functions.</li>

</ul>