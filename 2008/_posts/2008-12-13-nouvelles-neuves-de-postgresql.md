---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2008-12-13-nouvelles-neuves-de-postgresql "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 7 d&eacute;cembre 2008</strong></p>

<p>Lorenzo Alberton a r&eacute;dig&eacute; un article comparant la gestion de la casse des caract&egrave;res par plusieurs SGBDR&nbsp;: 

<a target="_blank" href="http://www.alberton.info/dbms_identifiers_and_case_sensitivity.html">http://www.alberton.info/dbms_identifiers_and_case_sensitivity.html</a></p>

<p>Fedora 10 a maintenant son propre d&eacute;p&ocirc;t de "pgsqlrpms"&nbsp;: 

<a target="_blank" href="http://yum.pgsqlrpms.org/">http://yum.pgsqlrpms.org/</a></p>

<p>(<a href="http://www.postgresql.org/community/weeklynews/pwn20081207">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>perl-DBD-PG 2.11.6&nbsp;: 

<a target="_blank" href="http://search.cpan.org/dist/DBD-Pg/">http://search.cpan.org/dist/DBD-Pg/</a></li>

<li>check_postgres 2.5.0&nbsp;: 

<a target="_blank" href="http://bucardo.org/check_postgres/">http://bucardo.org/check_postgres/</a></li>

<li>Hubert (depesz) Lubaczewski a publi&eacute; un outil d'analyse du "EXPLAIN ANALYZE"&nbsp;: 

<a target="_blank" href="http://www.depesz.com/index.php/2008/12/04/explaindepeszcom/">http://www.depesz.com/index.php/2008/12/04/explaindepeszcom/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>"L'appel aux conf&eacute;renciers" est lanc&eacute; pour le FOSDEM 2009 [ndt: 7-8 f&eacute;vrier 2009, Bruxelles]. Il y aura une rencontre PostgreSQL et nous y partagerons une salle "d&eacute;veloppeurs" avec les groupes BSD. Proposez vos expos&eacute;s &agrave; l'adresse _fosdem (a) postgresql (point) eu_ avant le 2 janvier 2009.</li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Devrim Gunduz. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Fixed typo in pgsql/doc/src/sgml/installation.sgml.</li>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, small correction.</li>

<li>In pgsql/doc/src/sgml/ref/select.sgml, add braces to clarify syntax synopsis.</li>

<li>In pgsql/doc/src/sgml/keywords.sgml, update key words table to 8.4 and SQL:2008.</li>

<li>In pgsql/GNUmakefile.in, call genhtml with --prefix option so local build paths don't appear in the coverage output.</li>

<li>Default values for function arguments. Pavel Stehule, with some tweaks by Peter Eisentraut</li>

<li>In pgsql/src/backend/utils/adt/misc.c, better descriptions in pg_get_keywords(), consistent with the documentation appendix on key words. catdesc was originally intended as computer-readable, but since we ended up adding catcode, we can have more elaborate descriptions.</li>

<li>Set up ar, dlltool, dllwrap, and windres for cross-compiling if necessary. Plus some makefile cleanup. Part of a patch from Richard Evans</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Removed port testing from ecpg.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/vcregress.pl, remove the last traces of --temp-port.</li>

<li>Ensure that the contents of a holdable cursor don't depend on out-of-line toasted values, since those could get dropped once the cursor's transaction is over. Per bug #4553 from Andrew Gierth. Back-patch as far as 8.1. The bug actually exists back to 7.4 when holdable cursors were introduced, but this patch won't work before 8.1 without significant adjustments. Given the lack of field complaints, it doesn't seem worth the work (and risk of introducing new bugs) to try to make a patch for the older branches.</li>

<li>Fix an oversight in the code that makes transitive-equality deductions from outer join clauses. Given, say, ... FROM a LEFT JOIN b ON a.a1 = b.b1 WHERE a.a1 = 42; we'll deduce a clause b.b1 = 42 and then mark the original join clause redundant (we can't remove it completely for reasons I don't feel like squeezing into this log entry). However the original implementation of that wasn't bulletproof, because clause_selectivity() wouldn't honor this_selec if given nonzero varRelid --- which in practice meant that it worked as desired *except* when considering index scan quals. Which resulted in bogus underestimation of the size of the indexscan result for an inner indexscan in an outer join, and consequently a possibly bad choice of indexscan vs. bitmap scan. Fix by introducing an explicit test into clause_selectivity(). Also, to make sure we don't trigger that test in corner cases, change the convention to be that this_selec &gt; 1, not this_selec = 1, means it's been marked redundant. Per trouble report from Scara Maccai. Back-patch to 8.2, where the problem was introduced.</li>

<li>In pgsql/src/backend/optimizer/plan/subselect.c, don't try to optimize EXISTS subqueries with empty FROM-lists: we need to form a join and that case doesn't have anything to join to. (We could probably make it work if we didn't pull up the subquery, but it seems to me that the case isn't worth extra code.) Per report from Greg Stark.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/formatting.c, modify the new to_timestamp implementation so that end-of-format-string is treated like a non-digit separator. This fixes the inconsistency in examples like: to_timestamp('2008-01-2', 'YYYY-Michael Meskes-DD') didn't work, while to_timestamp('2008-1-02', 'YYYY-Michael Meskes-DD') did.</li>

<li>In pgsql/src/backend/utils/adt/tsginidx.c, use PG_GETARG_TEXT_PP instead of PG_GETARG_TEXT_P in the new gin_cmp_tslexeme and gin_cmp_prefix functions. Should shave off a few cycles from GIN operations.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, if pg_stop_backup() is called just after switching to a new xlog file, wait for the previous instead of the new file to be archived. Based on patch by Simon Riggs.</li>

<li>Small comment fixes in pgsql/src/backend/storage/freespace/freespace.c.</li>

<li>Introduce visibility map. The visibility map is a bitmap with one bit per heap page, where a set bit indicates that all tuples on the page are visible to all transactions, and the page therefore doesn't need vacuuming. It is stored in a new relation fork. Lazy vacuum uses the visibility map to skip pages that don't need vacuuming. Vacuum is also responsible for setting the bits in the map. In the future, this can hopefully be used to implement index-only-scans, but we can't currently guarantee that the visibility map is always 100% up-to-date. In addition to the visibility map, there's a new PD_ALL_VISIBLE flag on each heap page, also indicating that all tuples on the page are visible to all transactions. It's important that this flag is kept up-to-date. It is also used to skip visibility tests in sequential scans, which gives a small performance gain on seqscans.</li>

<li>In pgsql/src/include/catalog/catversion.h, forgot to bump catalog version in the visibility map patch.</li>

<li>Utilize the visibility map in autovacuum, too. There was an oversight in the visibility map patch that because autovacuum always sets VacuumStmt-&gt;freeze_min_age, visibility map was never used for autovacuum, only for manually launched vacuums. This patch introduces a new scan_all field to VacuumStmt, indicating explicitly whether the visibility map should be used, or the whole relation should be scanned, to advance relfrozenxid. Anti-wraparound vacuums still need to scan all pages.</li>

<li>In pgsql/src/backend/access/heap/visibilitymap.c, MAPSIZE macro needs to use MAXALIGN(SizeOfPageHeaderData) instead of SizeOfPageHeaderData, like PageGetContents does. Per report by Pavan Deolasee.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/misc/guc.c, minor code embellishments.</li>

<li>Fix a couple of snapshot management bugs in the new ResourceOwner world: non-writable large objects need to have their snapshots registered on the transaction resowner, not the current portal's, because it must persist until the large object is closed (which the portal does not). Also, ensure that the serializable snapshot is recorded by the transaction resource owner too, even when a subtransaction has changed the current resource owner before serializable is taken. Per bug reports from Pavan Deolasee.</li>

<li>Desultorily enclose programlisting tags in CDATA, to get rid of some obnoxious SGML-escaping.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Change wildcard cerfificate mapping to be much smaller - we now only match the * character at the beginning of a pattern, and it does not match subdomains. Since this means we no longer need fnmatch, remove the imported implementation from port, along with the autoconf check for it.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, documentation for wildcard certificates patch.</li>

<li>Properly unregister OpenSSL callbacks when libpq is done with it's connection. This is required for applications that unload the libpq library (such as PHP) in which case we'd otherwise have pointers to these functions when they no longer exist. This needs a bit more testing before we can consider a backpatch, so not doing that yet. In passing, remove unused functions in backend/libpq. Bruce Momjian and Magnus Hagander, per report and analysis by Russell Smith.</li>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, comment said we don't free the lockarray, and why. The proper fix is to make the code do what the comment says...</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, fix typo in recent SSL unload patch. Kris Jurka</li>

<li>In pgsql/doc/src/sgml/wal.sgml, document that non-data journaling is a recommended mount option.</li>

<li>Allow CREATE OR REPLACE VIEW to add columns to the _end_ of the view. Robert Haas.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/gist/gistscan.c, initialize GISTScanOpaque-&gt;qual_ok even if there is no conditions.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;&ccedil;u cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Hitoshi Harada sent in four more revisions of his windowing functions patch.</li>

<li>Pavel Stehule sent in another revision of his default values for function parameters patch.</li>

<li>Zdenek Kotala sent in a patch updating the pg_upgrade script.</li>

<li>Magnus Hagander sent a patch to update the docs for work_mem so it points to autovacuum_max_workers.</li>

<li>Hannes Eder sent in a patch to add a skyline operator.</li>

<li>Heikki Linnakangas sent in a patch to speed up GIN index builds.</li>

<li>ITAGAKI Takahiro sent in another patch implementing pg_stat_statements.</li>

<li>Alvaro Herrera sent in two revisions of a patch to fix an assert bug in lo_open().</li>

<li>Euler Taveira da Oliviera sent in a patch which enhances portability of "designated initializers."</li>

<li>KaiGai Kohei sent in two more sets of SE-PostgreSQL patches.</li>

<li>David Rowley sent in some doc massaging for Hitoshi Harada's windowing functions patch.</li>

<li>Martin Pihlak sent in another revision of his SQL/MED connection manager patch.</li>

<li>Heikki Linnakangas sent in another patch for the visibility map.</li>

<li>Heikki Linnakangas sent in a patch to fix pg_stop_backup.</li>

<li>Emmanuel Cecchet sent in another patch to fix temp table behavior in transactions.</li>

<li>Josh Williams sent in a patch to make \d display a sequence's owner in psql.</li>

<li>Kurt Harriman sent in a flock of patches to allow people to use C++ in SPI code, etc. Discussion is ongoing.</li>

</ul>