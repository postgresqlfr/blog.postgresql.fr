---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er août 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/08/04/Nouvelles-hebdomadaires-de-PostgreSQL-1er-août-2010"
---


<p>PostgreSQL 9.0 beta 4 est disponible. Testez&nbsp;! [ndt: <a href="http://blog.postgresql.fr/index.php?post/2010/08/02/PostgreSQL-9.0-Beta-4-disponible">annonce (fr)</a>] 

<a target="_blank" href="http://www.postgresql.org/developer/beta">http://www.postgresql.org/developer/beta</a></p>

<p>Job::Machine 0.011, un gestionnaire de queue en Perl utilisant PostgreSQL&nbsp;: 

<a target="_blank" href="http://search.cpan.org/dist/Job-Machine/">http://search.cpan.org/dist/Job-Machine/</a></p>

<p>pgAdmin 1.10.5, une interface graphique de gestion pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.pgadmin.org/download/">http://www.pgadmin.org/download/</a></p>

<p>pg_sample 0.01, un utilitaire permettant d'exporter un petit &eacute;chantillon d'une base de donn&eacute;es&nbsp;: 

<a target="_blank" href="http://github.com/mla/pg_sample">http://github.com/mla/pg_sample</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-08/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Reuven Lerner donnera un cours de 5 jours sur PostgreSQL du 1er au 5 ao&ucirc;t au "Hi-Tech College" de Herzliya (Isra&euml;l)&nbsp;: 

<a target="_blank" href="http://www.hi-tech.co.il/college/default.asp?PageID=12&amp;CourseNum=4288">http://www.hi-tech.co.il/college/default.asp?PageID=12&amp;CourseNum=4288</a></li>

<li>La FrOSCon 2010 aura lieu &agrave; St. Augustin (Allemagne) les 21 &amp; 22 ao&ucirc;t 2010. Le PUG allemand a obtenu sa propre salle de dev. et est &agrave; la recherche de conf&eacute;renciers. Plus de d&eacute;tails&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html">http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la "West" est lanc&eacute; jusqu'au 5 septembre 2010. D&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100801">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<p>KaiGai Kohei reviewed Robert Haas's patch to add get_whatever_oid functionality.</p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/xfunc.sgml, add table creation and population to example. From John Gage.</li>

<li>In pgsql/doc/src/sgml/perform.sgml, fix grammar. Backpatched to 8.1.</li>

<li>In pgsql/contrib/xml2/README.xml2, spelling fix.</li>

<li>Spelling fixes.</li>

<li>In pgsql/src/bin/psql/common.c, show psql timing output even in quiet mode. These two settings ought to be independent of each other.</li>

<li>In pgsql/contrib/chkpass/chkpass.sql.in, remove wildly obsolete type attribute externallength from chkpass.</li>

<li>Fix indentation of verbatim block elements. Block elements with verbatim formatting (literallayout, programlisting, screen, synopsis) should be aligned at column 0 independent of the surrounding SGML, because whitespace is significant, and indenting them creates erratic whitespace in the output. The CSS stylesheets already take care of indenting the output. Assorted markup improvements to go along with it.</li>

<li>Translation updates for 9.0beta4.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In PL/Perl[U], ensure $_SHARED is declared in the main:: namespace, per bugs #5570 and #5571. Author: Alex Hunsaker</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In postgresql.conf.sample, use on/off rather than true/false. We used to be consistent about this, but my recent patch to add a restart_after_crash GUC failed to follow the existing convention. Report and patch from Fujii Masao.</li>

<li>In pgsql/doc/src/sgml/plpgsql.sgml, fix typo in PL/pgsql code example. Backpatch to 8.4. Marc Cousin. Review by Kevin Grittner.</li>

<li>Add ssl_cipher() and ssl_version() functions to contrib/sslinfo. Review by Dave Page.</li>

<li>In pgsql/src/backend/access/heap/heapam.c, fix possible page corruption by ALTER TABLE .. SET TABLESPACE. If a zeroed page is present in the heap, ALTER TABLE .. SET TABLESPACE will set the LSN and TLI while copying it, which is wrong, and heap_xlog_newpage() will do the same thing during replay, so the corruption propagates to any standby. Note, however, that the bug can't be demonstrated unless archiving is enabled, since in that case we skip WAL logging altogether, and the LSN/TLI are not set. Back-patch to 8.0; prior releases do not have tablespaces. Analysis and patch by Jeff Davis. Adjustments for back-branches and minor wordsmithing by me.</li>

<li>In pgsql/contrib/fuzzystrmatch/fuzzystrmatch.c, avoid using text_to_cstring() in levenshtein functions. Operating directly on the underlying varlena saves palloc and memcpy overhead, which testing shows to be significant. Extracted from a larger patch by Alexander Korotkov.</li>

<li>Make details of the Numeric representation private to numeric.c. Review by Tom Lane.</li>

<li>Make psql distinguish between unique indices and unique constraints. Josh Kupershmidt. Reviewing and kibitzing by Kevin Grittner and me.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Rewrite the rbtree routines so that an RBNode is the first field of the struct representing a tree entry, rather than being a separately allocated piece of storage. This API is at least as clean as the old one (if not more so --- there were some bizarre choices in there) and it permits a very substantial memory savings, on the order of 2X in ginbulk.c's usage.</li>

<li>Fix an additional set of problems in GIN's handling of lossy page pointers. Although the key-combining code claimed to work correctly if its input contained both lossy and exact pointers for a single page in a single TID stream, in fact this did not work, and could not work without pretty fundamental redesign. Modify keyGetItem so that it will not return such a stream, by handling lossy-pointer cases a bit more explicitly than we did before. Per followup investigation of a gripe from Artur Dabrowski. An example of a query that failed given his data set is select count(*) from search_tab where (to_tsvector('german', keywords ) @@ to_tsquery('german', 'ee:* | dd:*')) and (to_tsvector('german', keywords ) @@ to_tsquery('german', 'aa:*')); Back-patch to 8.4 where the lossy pointer code was introduced.</li>

<li>In pgsql/src/backend/tsearch/ts_selfuncs.c, add some knowledge about prefix matches to tsmatchsel(). It's not terribly bright, but it beats assuming that a prefix match behaves identically to an exact match, which is what the code was doing before :-(. Noted while experimenting with Artur Dobrowski's example.</li>

<li>Fix ANALYZE's ancient deficiency of not trying to collect stats for expression indexes when the index column type (the opclass opckeytype) is different from the expression's datatype. When coded, this limitation wasn't worth worrying about because we had no intelligence to speak of in stats collection for the datatypes used by such opclasses. However, now that there's non-toy estimation capability for tsvector queries, it amounts to a bug that ANALYZE fails to do this. The fix changes struct VacAttrStats, and therefore constitutes an API break for custom typanalyze functions. Therefore we can't back-patch it into released branches, but it was agreed that 9.0 isn't yet frozen hard enough to make such a change unacceptable. Ergo, back-patch to 9.0 but no further. The API break had better be mentioned in 9.0 release notes.</li>

<li>Back-patch fix for renaming asyncCommitLSN to asyncXactLSN. AIUI this was supposed to go into 9.0 as well as HEAD.</li>

<li>Fix an ancient typo that prevented the detection of conflicting fields when interval input "invalid" was specified together with other fields. Spotted by Neil Conway with the help of a clang warning. Although this has been wrong since the interval code was written more than 10 years ago, it doesn't affect anything beyond which error message you get for a wrong input, so not worth back-patching very far.</li>

<li>Tweak a couple of macros in the regex code to suppress compiler warnings from "clang". The VERR changes make an assignment unconditional, which is probably easier to read/understand anyway, and one can hardly argue that it's worth shaving cycles off the case of reporting another error when one has already been detected. The INSIST change limits where that macro can be used, but not in a way that creates a problem for any existing call.</li>

<li>In pgsql/src/template/darwin, don't try to force use of -no-cpp-precomp on OS X. It's been five years since Apple shipped a compiler that needed this switch, and there's increasing interest in using other compilers that won't accept the switch at all. Better to let anybody who still needs the switch inject it via CPPFLAGS. Per gripe from Neil Conway.</li>

<li>Also, fix minor memory leaks in code called by ginEntryInsert, in particular in ginInsertValue and entryFillRoot, as well as ginEntryInsert itself. These leaks resulted in the GIN index build context continuing to bloat even after we'd filled it to maintenance_work_mem and started to dump data out to the index. In combination these fixes restore the GIN index build code to honoring the maintenance_work_mem limit about as well as it did in 8.4. Speed seems on par with 8.4 too, maybe even a bit faster, for a non-pathological case in which HEAD was formerly slower. Back-patch to 9.0 so we don't have a performance regression from 8.4.</li>

<li>Fix potential failure when hashing the output of a subplan that produces a pass-by-reference datatype with a nontrivial projection step. We were using the same memory context for the projection operation as for the temporary context used by the hashtable routines in execGrouping.c. However, the hashtable routines feel free to reset their temp context at any time, which'd lead to destroying input data that was still needed. Report and diagnosis by Tao Ma. Back-patch to 8.1, where the problem was introduced by the changes that allowed us to work with "virtual" tuples instead of materializing intermediate tuple values everywhere. The earlier code looks quite similar, but it doesn't suffer the problem because the data gets copied into another context as a result of having to materialize ExecProject's output tuple.</li>

<li>In pgsql/src/backend/executor/nodeLockRows.c, fix oversight in new EvalPlanQual logic: the second loop over the ExecRowMark list in ExecLockRows() forgot to allow for the possibility that some of the rowmarks are for child tables that aren't relevant to the current row. Per report from Kenichiro Tanaka.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, work around a documentation toolchain problem by replacing the "AIX-fixlevels" table with a &lt;variablelist&gt; carrying the same information. Previously the 9.0 documentation was failing to build as a US-size PDF file. It's quite obscure what the real problem is or why this avoids it, but we need a hack now so we can build docs for beta4. In passing do a bit of editing in the AIX installation docs, in particular remove a long-obsolete claim that the regression tests are likely to fail.</li>

<li>In pgsql/src/backend/commands/tablecmds.c, fix another longstanding problem in copy_relation_data: it was blithely assuming that a local char[] array would be aligned on at least a word boundary. There are architectures on which that is pretty much guaranteed to NOT be the case ... and those arches also don't like non-aligned memory accesses, meaning that log_newpage() would crash if it ever got invoked. Even on Intel-ish machines there's a potential for a large performance penalty from doing I/O to an inadequately aligned buffer. So palloc it instead. Backpatch to 8.0 --- 7.4 doesn't have this code.</li>

<li>In pgsql/src/include/catalog/pg_proc.h, clean up some inconsistencies in the volatility marking of various I/O related functions. Per today's discussion, we will henceforth assume that datatype I/O functions are either stable or immutable, never volatile. (This implies in particular that domain CHECK constraint expressions shouldn't be volatile, since domain_in executes them.) In turn, functions that execute the I/O functions of arbitrary datatypes should always be labeled stable. This affects the labeling of array_to_string, which was unsafely marked immutable, and record_in, record_out, record_recv, record_send, domain_in, domain_recv, which were over-conservatively marked volatile. The array I/O functions were already marked stable, which is correct per this policy but would have been wrong if we maintained domain_in as volatile. Back-patch to 9.0, along with an earlier fix to correctly mark cash_in and cash_out as stable not immutable (since they depend on lc_monetary). No catversion bump --- the implications of this are not currently severe enough to justify a forced initdb.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update release notes for 9.0 beta 4. Back-patch some changes that were made only in HEAD.</li>

<li>Improved version of patch to protect pg_get_expr() against misuse: look through join alias Vars to avoid breaking join queries, and move the test to someplace where it will catch more possible ways of calling a function. We still ought to throw away the whole thing in favor of a data-type-based solution, but that's not feasible in the back branches. This needs to be back-patched further than 9.0, but I don't have time to do so today. Committing now so that the fix gets into 9.0beta4.</li>

<li>Rewrite the key-combination logic in GIN's keyGetItem() and scanGetItem() routines to make them behave better in the presence of "lossy" index pointers. The previous coding was outright incorrect for some cases, as recently reported by Artur Dabrowski: scanGetItem would fail to return index entries in cases where one index key had multiple exact pointers on the same page as another key had a lossy pointer. Also, keyGetItem was extremely inefficient for cases where a single index key generates multiple "entry" streams, such as an @@ operator with a multiple-clause tsquery. The presence of a lossy page pointer in any one stream defeated its ability to use the opclass consistentFn, resulting in probing many heap pages that didn't really need to be visited. In Artur's example case, a query like WHERE tsvector @@ to_tsquery('a &amp; b') was about 50X slower than the theoretically equivalent WHERE tsvector @@ to_tsquery('a') AND tsvector @@ to_tsquery('b') The way that I chose to fix this was to have GIN call the consistentFn twice with both TRUE and FALSE values for the in-doubt entry stream, returning a hit if either call produces TRUE, but not if they both return FALSE. The code handles this for the case of a single in-doubt entry stream, but punts (falling back to the stupid behavior) if there's more than one lossy reference to the same page. The idea could be scaled up to deal with multiple lossy references, but I think that would probably be wasted complexity. At least to judge by Artur's example, such cases don't occur often enough to be worth trying to optimize. Back-patch to 8.4. 8.3 did not have lossy GIN index pointers, so not subject to these problems.</li>

<li>In pgsql/src/backend/tsearch/ts_selfuncs.c, tweak tsmatchsel() so that it examines the structure of the tsquery whenever possible (ie, whenever the tsquery is a constant), even when no statistics are available for the tsvector. For example, foo @@ 'a &amp; b'::tsquery can be expected to be more selective than foo @@ 'a'::tsquery, whether or not we know anything about foo. We use DEFAULT_TS_MATCH_SEL as the assumed selectivity of individual query terms when no stats are available, then combine the terms according to the query's AND/OR structure as usual. Per experimentation with Artur Dabrowski's example. (The fact that there are no stats available in that example is a problem in itself, but nonetheless tsmatchsel should be smarter about the case.) Back-patch to 8.4 to keep all versions of tsmatchsel() in sync.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>Add explicit regression tests for ALTER TABLE lock levels. Use this to catch a couple of lock level assignments that slipped through manual testing, per Peter Eisentraut.</li>

<li>Rename asyncCommitLSN to asyncXactLSN to reflect changed role in 9.0. Transaction aborts now record their LSN to avoid corner case behaviour in Streaming Replication/Hot Standby, hence change of name of variables and functions. As pointed out by Fujii Masao. Cosmetic changes only.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag for beta4.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in a patch to add ssl_version() and ssl_cipher() to contrib/sslinfo.</li>

<li>KaiGai Kohei sent in two more patches implementing SECURITY LABEL.</li>

<li>Boxuan Zhai sent in two more revisions of the WIP patch for MERGE.</li>

<li>Alexander Korotkov sent in two more revisions of the patch to make levenshtein multibyte-aware in contrib/fuzzystrmatch.</li>

<li>Fujii Masao sent in another revision of the patch to do synchronous replication.</li>

<li>Simon Riggs sent in another patch to reduce the needed locking for ALTER TABLE.</li>

<li>Florian Pflug sent in another revision of the patch to show individual statement latencies in pgbench output.</li>

<li>Erik Rijkers sent in a patch to fix an oversight in the variadic function docs.</li>

<li>Robert Haas sent in another revision of the patch to reduce the on-disk size of NUMERICs.</li>

<li>Zoltan Boszormenyi sent in another WIP patch to add a lock_timeout GUC.</li>

<li>Henk Enting sent in a patch to help with the intersection of CHECK constraints and multiple inheritance.</li>

</ul>