---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 7 juin 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/06/10/Nouvelles-hebdomadaires-de-PostgreSQL-7-juin-2009"
---


<p>L'appel aux conférenciers est lancé pour la "PGCon Brazil"&nbsp;!

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/chamadas.en.php">http://pgcon.postgresql.org.br/2009/chamadas.en.php</a></p>

<p>L'ITPUG sera à la Conférence Italienne pour le Logiciel Libre qui se tiendra à Bologne les 12 &amp; 13 juin. Gabriele Bartolini sera présente, "Étudiants et open-source&nbsp;: le cas PostgreSQL", samedi 13 juin à 10h35&nbsp;:

<a target="_blank" href="http://www.confsl.org/">http://www.confsl.org/</a></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>pgtheme, un thème développé spécialement pour Drupal 6.x, est disponible&nbsp;:

<a target="_blank" href="http://drupal.org/project/pgtheme">http://drupal.org/project/pgtheme</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 8.4 de la semaine</strong></p>

<p>quote_nullable: similaire à quote_literal, mais retourne la chaîne "NULL" lorsque l'argument fourni est NULL.</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>Le module 'ltree' des "contribs" est une implémentation des arborescences indexées et peut s'avérer utile pour représenter un système de fichier ou une hiérarchie similaire dans votre base.</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090607">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel à conférenciers, plus d'infos sous peu&nbsp;!</li>

<li>La "PGCon Brazil" prendra place à l'Unicamp de Campinas (État de São Paulo) les 23 &amp; 24 octobre 2009.</li>

<li>Le PGDay.EU 2009 est programmé pour les 6 &amp; 7 novembre 2009 à Telecom ParisTech (ndt: ENST ?)&nbsp;:

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>Vos propositions de conférences sont attendues pour le 10<sup>ème</sup> anniversaire du JPUG. Le rassemblement aura lieu les 20 &amp; 21 novembre 2009 à Tokyo, Japan&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix DecodeInterval to report an error for multiple occurrences of DAY, WEEK, YEAR, DECADE, CENTURY, or MILLENIUM fields, just as it always has done for other types of fields. The previous behavior seems to have been a hack to avoid defining bit-positions for all these field types in DTK_M() masks, rather than something that was really considered to be desired behavior. But there is room in the masks for these, and we really need to tighten up at least the behavior of DAY and YEAR fields to avoid unexpected behavior associated with the 8.4 changes to interpret ambiguous fields based on the interval qualifier (typmod) value. Per my example and proposed patch.</li>

<li>Change AdjustIntervalForTypmod to not discard higher-order field values on the grounds that they don't fit into the specified interval qualifier (typmod). This behavior, while of long standing, is clearly wrong per spec --- for example the value INTERVAL '999' SECOND means 999 seconds and should not be reduced to less than 60 seconds. In some cases there could be grounds to raise an error if higher-order field values are not given as zero; for example '1 year 1 month'::INTERVAL MONTH should arguably be taken as an error rather than equivalent to 13 months. However our internal representation doesn't allow us to do that in a fashion that would consistently reject all and only the cases that a strict reading of the spec would suggest. Also, seeing that for example INTERVAL '13' MONTH will print out as '1 year 1 mon', we have to be careful not to create a situation where valid data will fail to dump and reload. The present patch therefore takes the attitude of not throwing an error in any such case. We might want to revisit that in future but it would take more redesign than seems prudent in late beta. Per a complaint from Sebastien Flaesch and subsequent discussion. While at other times we might have just postponed such an issue to the next development cycle, 8.4 already has changed the parsing of interval literals quite a bit in an effort to accept all spec-compliant cases correctly. This seems like a change that should be part of that rather than coming along later.</li>

<li>In pgsql/doc/src/sgml/config.sgml, Remove the old advice to keep from_collapse_limit less than geqo_threshold, instead just pointing out that a larger value may trigger use of GEQO. Per Robert Haas. In passing, do a bit of wordsmithing on the Genetic Query Optimizer section.</li>

<li>In pgsql/src/backend/commands/copy.c, improve comment about 'if (1)' hack in copy.c macros.</li>

<li>In pgsql/src/bin/initdb/initdb.c, change rather bizarre code ordering in get_id(). This isn't strictly cosmetic --- I'm wondering if geteuid could have side effects on errno, thus possibly resulting in a misleading error message after failure of getpwuid.</li>

<li>In pgsql/src/backend/tsearch/ts_selfuncs.c, fix tsquerysel() to not fail on an empty TSQuery. Per report from Tatsuo Ishii.</li>

<li>Clean up ecpg's use of mmerror(): const-ify the format argument, add an __attribute__() marker so that gcc can validate the format string against the actual arguments, get rid of overcomplicated and unsafe usage in base_yyerror().</li>

<li>Improve the recently-added support for properly pluralized error messages by extending the ereport() API to cater for pluralization directly. This is better than the original method of calling ngettext outside the elog.c code because (1) it avoids double translation, which wastes cycles and in the worst case could give a wrong result; and (2) it avoids having to use a different coding method in PL code than in the core backend. The client-side uses of ngettext are not touched since neither of these concerns is very pressing in the client environment. Per my proposal of yesterday.</li>

<li>Remove a couple of debugging messages that have been #ifdef'd out for ages. Seems silly to ask translators to expend work on these, especially in pluralized variants.</li>

<li>Trivial code style cleanup around a couple of ngettext calls.</li>

<li>GIN's ItemPointerIsMin, ItemPointerIsMax, and ItemPointerIsLossyPage macros should use GinItemPointerGetBlockNumber/ GinItemPointerGetOffsetNumber, not ItemPointerGetBlockNumber/ ItemPointerGetOffsetNumber, because the latter will Assert() on ip_posid == 0, ie a "Min" pointer. (Thus, ItemPointerIsMin has never worked at all, but it seems unused at present.) I'm not certain that the case can occur in normal functioning, but it's blowing up on me while investigating Tatsuo-san's data corruption problem. In any case it seems like a problem waiting to bite someone. Back-patch just in case this really is a problem for somebody in the field.</li>

<li>Fix a serious bug introduced into GIN in 8.4: now that MergeItemPointers() is supposed to remove duplicate heap TIDs, we have to be sure to reduce the tuple size and posting-item count accordingly in addItemPointersToTuple(). Failing to do so resulted in the effective injection of garbage TIDs into the index contents, ie, whatever happened to be in the memory palloc'd for the new tuple. I'm not sure that this fully explains the index corruption reported by Tatsuo Ishii, but the test case I'm using no longer fails.</li>

<li>In pgsql/src/pl/plperl/plperl.c, move variable declaration to avoid 'unused variable' warning when the ifdef doesn't trigger. Not worth back-patching. Per buildfarm reports.</li>

<li>Improve the IndexVacuumInfo/IndexBulkDeleteResult API to allow somewhat sane behavior in cases where we don't know the heap tuple count accurately; in particular partial vacuum, but this also makes the API a bit more useful for ANALYZE. This patch adds "estimated_count" flags to both structs so that an approximate count can be flagged as such, and adjusts the logic so that approximate counts are not used for updating pg_class.reltuples. This fixes my previous complaint that VACUUM was putting ridiculous values into pg_class.reltuples for indexes. The actual impact of that bug is limited, because the planner only pays attention to reltuples for an index if the index is partial; which probably explains why beta testers hadn't noticed a degradation in plan quality from it. But it needs to be fixed. The whole thing is a bit messy and should be redesigned in future, because reltuples now has the potential to drift quite far away from reality when a long period elapses with no non-partial vacuums. But this is as good as it's going to get for 8.4.</li>

<li>Revert my patch of 2009-04-04 that removed contrib/intarray's definitions of the &lt;@ and @&gt; operators. These are not in fact equivalent to the built-in anyarray operators of the same names, because they have different behavior for empty arrays, namely they don't think empty arrays are contained in anything. That is mathematically wrong, no doubt, but until we can persuade GIN indexes to implement the mathematical definition we should probably not change this. Another reason for not changing it now is that we can't yet ensure the opclasses will be updated correctly in a dump-and-reload upgrade. Per recent discussions.</li>

</ul>

<p>Joe Conway a commité&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, fix dblink_get_result() as reported by Oleksiy Shchukin. Refactor a bit while we're at it per request by Tom Lane. Specifically, don't try to perform dblink_send_query() via dblink_record_internal() -- it was inappropriate and ugly.</li>

<li>Add support for using SQL/MED compliant FOREIGN DATA WRAPPER, SERVER, and USER MAPPING as method to supply dblink connect parameters. Per mailing list and PGCon discussions.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, only recycle normal files in pg_xlog as WAL segments. pg_standby creates symbolic links with the -l option, and as Fujii Masao pointed out we ended up overwriting files in the archive directory before this patch. Patch by Aidan Van Dyk, Fujii Masao and me.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, add example of how to generate the session identifier from pg_stat_activity.</li>

<li>In pgsql/src/backend/commands/copy.c, add comment about why "((void) 0)" is used in copy macros.</li>

<li>Wording improvement for recent sesssion identifier SQL query.</li>

<li>In pgsql/doc/src/sgml/config.sgml, wording improvement for recent sesssion identifier SQL query.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, remove sleep() from backup script example; not needed anymore. Fujii Masao.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Initialise perl library as documented in perl API. Backpatch to release 7.4.</li>

<li>Search for versioned perl library instead of using hardcoded name on Windows. Backpatch to release 8.3</li>

<li>Adjust recent PERL_SYS_INIT3 call to avoid platforms where it might fail, and to remove compilation warning. Backpatch the release 7.4.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>