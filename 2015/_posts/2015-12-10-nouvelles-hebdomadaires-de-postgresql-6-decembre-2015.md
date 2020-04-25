---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 décembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/12/10/Nouvelles-hebdomadaires-de-PostgreSQL-06-décembre-2015"
---


<p>La <em>PGConf US 2016</em> aura lieu les 18, 19 et 20 avril &agrave; New-York. L'appel &agrave; conf&eacute;renciers expire au 31 janvier 2016, 23:59EST&nbsp;: <a target="_blank" href="http://www.pgconf.us/2016/">http://www.pgconf.us/2016/</a></p>

<p>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa. L'appel &agrave; conf&eacute;renciers sera lanc&eacute; mardi&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>Postico, une app cliente pour PostgreSQL sous OS X visant les d&eacute;veloppeurs, &eacute;tudiants et analystes&nbsp;: <a target="_blank" href="https://eggerapps.at/postico/">https://eggerapps.at/postico/</a></li>

<li>agg 1.0, un module impl&eacute;mentant l'aggr&eacute;gation en parall&egrave;le pour PostgreSQL 9.5+&nbsp;: <a target="_blank" href="http://www.cybertec.at/en/products/agg-parallel-aggregations-postgresql/">http://www.cybertec.at/en/products/agg-parallel-aggregations-postgresql/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-12/">http://archives.postgresql.org/pgsql-jobs/2015-12/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de deux jours avec deux programmes qui aura lieu les 21 et 22 janvier 2016 au Pasadena Convention Center &agrave; l'occasion du SCaLE 14X. <a target="_blank" href="https://www.socallinuxexpo.org/scale/14x/cfp">https://www.socallinuxexpo.org/scale/14x/cfp</a></li>

<li>FOSDEM PGDay est une conf&eacute;rence d'une journ&eacute;e qui sera tenue avant le FOSDEM &agrave; Bruxelles (Belgique) le 29 janvier 2015. D&eacute;tails et appel &agrave; conf&eacute;renciers ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://fosdem2016.pgconf.eu/">http://fosdem2016.pgconf.eu/</a></li>

<li>Prague PostgreSQL Developer Day 2016 (P2D2 2016) est une conf&eacute;rence sur deux jours, les 17 et 18 f&eacute;vrier 2016, &agrave; Prague (R&eacute;publique Tch&egrave;que). Site en tch&egrave;que&nbsp;: <a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>La premi&egrave;re conf&eacute;rence PostgreSQL pan-asiatique se tiendra en mars 2016 &agrave; Singapour. L'appel &agrave; conf&eacute;renciers est ouvert&nbsp;: <a target="_blank" href="http://2016.pgday.asia/">http://2016.pgday.asia/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20151207050056.GA6554@fetter.org">http://www.postgresql.org/message-id/20151207050056.GA6554@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Avoid caching expression state trees for domain constraints across queries. In commit 8abb3cda0ddc00a0ab98977a1633a95b97068d4e I attempted to cache the expression state trees constructed for domain CHECK constraints for the life of the backend (assuming the domain's constraints don't get redefined). However, this turns out not to work very well, because execQual.c will run those state trees with ecxt_per_query_memory pointing to a query-lifespan context, and in some situations we'll end up with pointers into that context getting stored into the state trees. This happens in particular with SQL-language functions, as reported by Emre Hasegeli, but there are many other cases. To fix, keep only the expression plan trees for domain CHECK constraints in the typcache's data structure, and revert to performing ExecInitExpr (at least) once per query to set up expression state trees in the query's context. Eventually it'd be nice to undo this, but that will require some careful thought about memory management for expression state trees, and it seems far too late for any such redesign in 9.5. This way is still much more efficient than what happened before 8abb3cda0. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec7eef6b1103f92aea94aa79aabd8e0e87973010">http://git.postgresql.org/pg/commitdiff/ec7eef6b1103f92aea94aa79aabd8e0e87973010</a></li>

<li>Rework wrap-width calculation in psql's print_aligned_vertical() function. This area was rather heavily whacked around in 6513633b9 and follow-on commits, and it was showing it, because the logic to calculate the allowable data width in wrapped expanded mode had only the vaguest relationship to the logic that was actually printing the data. It was not very close to being right about the conditions requiring overhead columns to be added. Aside from being wrong, it was pretty unreadable and under-commented. Rewrite it so it corresponds to what the printing code actually does. In passing, remove a couple of dead tests in the printing logic, too. Per a complaint from Jeff Janes, though this doesn't look much like his patch because it fixes a number of other corner-case bogosities too. One such fix that's visible in the regression test results is that although the code was attempting to enforce a minimum data width of 3 columns, it sometimes left less space than that available. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e0776bc99553ff229e0d536ed8c78ab9db62464">http://git.postgresql.org/pg/commitdiff/0e0776bc99553ff229e0d536ed8c78ab9db62464</a></li>

<li>Further adjustment to psql's print_aligned_vertical() function. We should ignore output_columns unless it's greater than zero. A zero means we couldn't get any information from ioctl(TIOCGWINSZ); in that case the expected behavior is to print the data at native width, not to wrap it at the smallest possible value. print_aligned_text() gets this consideration right, but print_aligned_vertical() lost track of this detail somewhere along the line. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2287b874546931e2f33cddcafff2bde58459da1b">http://git.postgresql.org/pg/commitdiff/2287b874546931e2f33cddcafff2bde58459da1b</a></li>

<li>Use "g" not "f" format in ecpg's PGTYPESnumeric_from_double(). The previous coding could overrun the provided buffer size for a very large input, or lose precision for a very small input. Adopt the methodology that's been in use in the equivalent backend code for a long time. Per private report from Bas van Schaik. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db4a5cfc76206db82d0b929d96c53de229ef1aa4">http://git.postgresql.org/pg/commitdiff/db4a5cfc76206db82d0b929d96c53de229ef1aa4</a></li>

<li>Further tweaking of print_aligned_vertical(). Don't force the data width to extend all the way to the right margin if it doesn't need to. This reverts the behavior in non-wrapping cases to be what it was in 9.4. Also, make the logic that ensures the data line width is at least equal to the record-header line width a little less obscure. In passing, avoid possible calculation of log10(0). Probably that's harmless, given the lack of field complaints, but it seems risky: conversion of NaN to an integer isn't well defined. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95708e1d8e38bc1f7f6ee02c38dd86dd53b9663c">http://git.postgresql.org/pg/commitdiff/95708e1d8e38bc1f7f6ee02c38dd86dd53b9663c</a></li>

<li>Make gincostestimate() cope with hypothetical GIN indexes. We tried to fetch statistics data from the index metapage, which does not work if the index isn't actually present. If the index is hypothetical, instead extrapolate some plausible internal statistics based on the index page count provided by the index-advisor plugin. There was already some code in gincostestimate() to invent internal stats in this way, but since it was only meant as a stopgap for pre-9.1 GIN indexes that hadn't been vacuumed since upgrading, it was pretty crude. If we want it to support index advisors, we should try a little harder. A small amount of testing says that it's better to estimate the entry pages as 90% of the index, not 100%. Also, estimating the number of entries (keys) as equal to the heap tuple count could be wildly wrong in either direction. Instead, let's estimate 100 entries per entry page. Perhaps someday somebody will want the index advisor to be able to provide these numbers more directly, but for the moment this should serve. Problem report and initial patch by Julien Rouhaud; modified by me to invent less-bogus internal statistics. Back-patch to all supported branches, since we've supported index advisors since 9.0. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fb008c5ee59b04005a8ee6c1006249f729e2b03">http://git.postgresql.org/pg/commitdiff/7fb008c5ee59b04005a8ee6c1006249f729e2b03</a></li>

<li>Fix behavior of printTable() and friends with externally-invoked pager. The formatting modes that depend on knowledge of the terminal window width did not work right when printing a query result that's been fetched in sections (as a result of FETCH_SIZE). ExecQueryUsingCursor() would force use of the pager as soon as there's more than one result section, and then print.c would see an output file pointer that's not stdout and incorrectly conclude that the terminal window width isn't relevant. This has been broken all along for non-expanded "wrapped" output format, and as of 9.5 the issue affects expanded mode as well. The problem also caused "\pset expanded auto" mode to invariably *not* switch to expanded output in a segmented result, which seems to me to be exactly backwards. To fix, we need to pass down an "is_pager" flag to inform the print.c subroutines that some calling level has already replaced stdout with a pager pipe, so they should (a) not do that again and (b) nonetheless honor the window size. (Notably, this makes the first is_pager test in print_aligned_text() not be dead code anymore.) This patch is a bit invasive because there are so many existing calls of printQuery()/printTable(), but fortunately all but a couple can just pass "false" for the added parameter. Back-patch to 9.5 but no further. Given the lack of field complaints, it's not clear that we should change the behavior in stable branches. Also, the API change for printQuery()/printTable() might possibly break third-party code, again something we don't like to do in stable branches. However, it's not quite too late to do this in 9.5, and with the larger scope of the problem there, it seems worth doing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8ff060ecd5fc2dd20021743518d376a11a0bfd8">http://git.postgresql.org/pg/commitdiff/d8ff060ecd5fc2dd20021743518d376a11a0bfd8</a></li>

<li>Clean up some psql issues around handling of the query output file. Formerly, if "psql -o foo" failed to open the output file "foo", it would print an error message but then carry on as though -o had not been specified at all. This seems contrary to expectation: a program that cannot open its output file normally fails altogether. Make psql do exit(1) after reporting the error. If "\o foo" failed to open "foo", it would print an error message but then reset the output file to stdout, as if the argument had been omitted. This is likewise pretty surprising behavior. Make it keep the previous output state, instead. psql keeps SIGPIPE interrupts disabled when it is writing to a pipe, either a pipe specified by -o/\o or a transient pipe opened for purposes such as using a pager on query output. The logic for this was too simple and could sometimes re-enable SIGPIPE when a -o pipe was still active, thus possibly leading to an unexpected psql crash later. Fixing the last point required getting rid of the kluge in PrintQueryTuples and ExecQueryUsingCursor whereby they'd transiently change the global queryFout state, but that seems like good cleanup anyway. Back-patch to 9.5 but not further; these are minor-enough issues that changing the behavior in stable branches doesn't seem appropriate. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/344cdff2c1541e7a1249299a33723aabeafa0b0c">http://git.postgresql.org/pg/commitdiff/344cdff2c1541e7a1249299a33723aabeafa0b0c</a></li>

<li>Further improve documentation of the role-dropping process. In commit 1ea0c73c2 I added a section to user-manag.sgml about how to drop roles that own objects; but as pointed out by Stephen Frost, I neglected that shared objects (databases or tablespaces) may need special treatment. Fix that. Back-patch to supported versions, like the previous patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63acfb79ab53d3833ad035728fb67a6c3018778f">http://git.postgresql.org/pg/commitdiff/63acfb79ab53d3833ad035728fb67a6c3018778f</a></li>

<li>Create TestLib.pm's tempdir underneath tmp_check/, not out in the open. This way, existing .gitignore entries and makefile clean actions will automatically apply to the tempdir, should it survive a TAP test run (which can happen if the user control-C's out of the run, for example). Michael Paquier, per a complaint from me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db0723631ef1460e9e795c6d13abb19da403a3f1">http://git.postgresql.org/pg/commitdiff/db0723631ef1460e9e795c6d13abb19da403a3f1</a></li>

<li>Update xindex.sgml for recent additions to GIST opclass API. Commit d04c8ed9044ec added another support function to the GIST API, but overlooked mentioning it in xindex.sgml's summary of index support functions. Anastasia Lubennikova <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0cfb02cec9650492365c6a9eca2dfce3671096d">http://git.postgresql.org/pg/commitdiff/b0cfb02cec9650492365c6a9eca2dfce3671096d</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix obsolete comment. It's amazing how fast things become obsolete these days. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3690dc6b03e7f3da9ddccf1d48b9314a37654a41">http://git.postgresql.org/pg/commitdiff/3690dc6b03e7f3da9ddccf1d48b9314a37654a41</a></li>

<li>Add handling for GatherPath to print_path. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c7485a82c3e29103757db75bb9ff8dac597387dc">http://git.postgresql.org/pg/commitdiff/c7485a82c3e29103757db75bb9ff8dac597387dc</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Use pg_rewind when target timeline was switched Allow pg_rewind to work when target timeline was switched. Now user can return promoted standby to old master. Target timeline history becomes a global variable. Index in target timeline history is used in function interfaces instead of specifying TLI directly. Thus, SimpleXLogPageRead() can easily start reading XLOGs from next timeline when current timeline ends. Author: Alexander Korotkov Review: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e50cda78404d6400b1326a996a4fabb144871151">http://git.postgresql.org/pg/commitdiff/e50cda78404d6400b1326a996a4fabb144871151</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Fix broken subroutine call in TestLib. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2983cfd9d64d352c68431010b2525daf2b8bc79">http://git.postgresql.org/pg/commitdiff/a2983cfd9d64d352c68431010b2525daf2b8bc79</a></li>

<li>Refactor Perl test code. The original code was a bit clunky; make it more amenable for further reuse by creating a new Perl package PostgresNode, which is an object-oriented representation of a single server, with some support routines such as init, start, stop, psql. This serves as a better basis on which to build further test code, and enables writing tests that use more than one server without too much complication. This commit modifies a lot of the existing test files, mostly to remove explicit calls to system commands (pg_ctl) replacing them with method calls of a PostgresNode object. The result is quite a bit more straightforward. Also move some initialization code to BEGIN and INIT blocks instead of having it straight in as top-level code. This commit also introduces package RecursiveCopy so that we can copy whole directories without having to depend on packages that may not be present on vanilla Perl 5.8 installations. I also ran perltidy on the modified files, which changes some code sites that are not otherwise touched by this patch. I tried to avoid this, but it ended up being more trouble than it's worth. Authors: Michael Paquier, &Atilde;lvaro Herrera Review: Noah Misch <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1caef31d9e550408d0cbc5788a422dcb69736df5">http://git.postgresql.org/pg/commitdiff/1caef31d9e550408d0cbc5788a422dcb69736df5</a></li>

<li>Further tweak commit_timestamp behavior. As pointed out by Fujii Masao, we weren't quite there on a standby behaving sanely: first because we were failing to acquire the correct state in the case where no XLOG_PARAMETER_CHANGE message was sent (because a checkpoint had already happened after the setting was changed in the master, and then the standby was restarted); and second because promoting the standby with the feature enabled failed to activate it if the master had the feature disabled. This patch fixes both those misbehaviors hopefully without re-introducing any old problems. Also change the hint emitted in a standby together with the error message about the feature being disabled, to make it point out that the place to chance the setting is the master. Otherwise, if the setting is already enabled in the standby, it is very confusing to have it say that the setting must be enabled ... Authors: &Atilde;lvaro Herrera, Petr Jel&Atilde;&shy;nek. Backpatch to 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/820ddb2c2f162ef1b086d870e9da0702834b6f32">http://git.postgresql.org/pg/commitdiff/820ddb2c2f162ef1b086d870e9da0702834b6f32</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Add serial comma <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f15b820a5c60b10f3ac1b2fdb37d534ecb0a4bf8">http://git.postgresql.org/pg/commitdiff/f15b820a5c60b10f3ac1b2fdb37d534ecb0a4bf8</a></li>

<li>doc: Fix markup and improve placeholder names <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ff1a11a2d9797f5d48fc1994faa40f738ba9b7e">http://git.postgresql.org/pg/commitdiff/9ff1a11a2d9797f5d48fc1994faa40f738ba9b7e</a></li>

<li>psql: Improve spelling <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77a7bb3da2479833c200a96b028fbfbe4312a201">http://git.postgresql.org/pg/commitdiff/77a7bb3da2479833c200a96b028fbfbe4312a201</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Instruct Coverity using an assertion. This should make Coverity deduce that plperl_call_perl_func() does not dereference NULL argtypes. Back-patch to 9.5, where the affected code was introduced. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4b686af0b8ff2d2557b4fec7e5938abb9249167">http://git.postgresql.org/pg/commitdiff/d4b686af0b8ff2d2557b4fec7e5938abb9249167</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Pavel St&Auml;&rsaquo;hule sent in two more revisions of a patch to add a custom function for converting human readable sizes to bytes.</p>

<p>Julien Rouhaud sent in a patch to make it possible to use hypothetical GIN indexes.</p>

<p>Kyotaro HORIGUCHI sent in a patch to enable asynchronous execution, which may speed up queries with long planning times.</p>

<p>David Rowley sent in two revisions of a patch to remove functionally dependent GROUP BY columns.</p>

<p>Rahila Syed sent in another revision of a patch to add a VACUUM progress checker.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement ereport as a PL/PythonU function.</p>

<p>YUriy Zhuravlev sent in three more revisions of a patch to add some functionality to array slicing.</p>

<p>SAWADA Masahiko sent in three more revisions of a patch to add a "frozen" bit to the visibility map.</p>

<p>Daniel Verit&Atilde;&copy; sent in another revision of a patch to add \rotate to psql.</p>

<p>Pavel St&Auml;&rsaquo;hule, Robert Haas, and Michael Paquier traded patches to allow psql to handle multiple commands, expressed as multiple -c options, from the command line.</p>

<p>Artur Zakirov sent in another revision of a patch to improve Hunspell dictionary support in fulltext search.</p>

<p>Alexander Korotkov sent in another revision of a patch to use pg_rewind when target timeline was switched.</p>

<p>Tomas Vondra sent in a patch to add explicit fsync on the parent directory after all the rename() calls in timeline.c, xlog.c, xlogarchive.c and pgarch.c, and add START/END_CRIT_SECTION markers around the new fsync_fname calls (except for those in timeline.c, as the START/END_CRIT_SECTION is not available there).</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add covering unique indexes.</p>

<p>Alexander Shulgin sent in a patch to create more stable query plans via more predictable column statistics.</p>

<p>Robert Haas sent in two more revisions of a patch to fix some infelicities between foreign join pushdown and EvalPlanQual.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement parse_ident().</p>

<p>David Rowley sent in another revision of a patch to implement combining aggregates, which is foundational work for parallel aggregation.</p>

<p>Ashutosh Bapat sent in another revision of a patch to implement foreign join pushdown in the PostgreSQL FDW.</p>

<p>Julian Schauder and Craig Ringer traded patches to add 'waiting for replication' to pg_stat_activity.state.</p>

<p>Robert Haas sent in another revision of a patch to improve parallel explain and JOIN.</p>

<p>Haribabu Kommi sent in three more revisions of a patch to add a pg_hba_lookup function to get all matching pg_hba.conf entries.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to add a psql level filter for column outputs.</p>

<p>Kaigai Kouhei sent in another revision of a patch to add 'extnodename' fields in ForeignPath and ForeignScan, and embed ExtensibleNodeMethods in CustomPathMethods, CustomScanMethods and CustomExecMethods.</p>

<p>Michael Paquier sent in another revision of a patch to fix TAP checks.</p>

<p>Aleksander Alekseev sent in a patch to fix some bottlenecks for tables with many (in this case thousands of) partitions.</p>

<p>Michael Paquier sent in another revision of a patch to ensure consistent on-disk state of UNLOGGED indexes at recovery.</p>

<p>Amit Kapila sent in a patch to fix parallel buffer usage.</p>

<p>Stephen Frost sent in two more revisions of a patch to handle dependencies properly in ALTER POLICY.</p>

<p>Ildus Kurbangaliev sent in a patch to add support of partial decompression for datums.</p>

<p>David Rowley sent in a patch to add equivalence class filters.</p>

<p>Peter Geoghegan sent in another revision of a patch to quicksort when performing external sorts, use "tuple proper" memory pool for tuplesort merge, and perform memory prefetching when writing memtuples.</p>

<p>Peter Geoghegan sent in a patch to fix a documentation typo in INSERT in the exclusion constraints section.</p>