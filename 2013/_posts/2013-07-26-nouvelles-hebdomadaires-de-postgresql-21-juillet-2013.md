---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 juillet 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/07/26/Nouvelles-hebdomadaires-de-PostgreSQL-21-juillet-2013"
---


<p>La date limite de l'appel &agrave; conf&eacute;renciers pour la <em>PGConf.EU 2013</em> a &eacute;t&eacute; report&eacute;e au 29 juillet 2013&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour le pgday italien se cl&ocirc;t le 28 juillet 2013&nbsp;: 

<a target="_blank" href="http://2013.pgday.it/index.php/programma/call-for-papers-english/">http://2013.pgday.it/index.php/programma/call-for-papers-english/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PG Partition Manager 1.3.0, une extension pour g&eacute;rer des partitionnements bas&eacute;s sur des dates ou des s&eacute;quences&nbsp;: 

<a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-07/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PostgreSQL Brazil</em> aura lieu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

<li><em>Postgres Open 2013</em> aura lieu &agrave; Chicago, (USA, Illinois) du 16 au 18 septembre. La liste des conf&eacute;rences a &eacute;t&eacute; publi&eacute;e&nbsp;: 

<a target="_blank" href="http://postgresopen.org/">http://postgresopen.org/</a></li>

<li>Le PGDay italien (PGDay.IT) sera tenu &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgday.it/index.php/programma/call-for-papers-english/">http://2013.pgday.it/index.php/programma/call-for-papers-english/</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130722051435.GB8834@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct off-by-one when reading from pipe. In pg_basebackup.c:reached_end_position(), we're reading from an internal pipe with our own background process but we're possibly reading more bytes than will actually fit into our buffer due to an off-by-one error. As we're reading from an internal pipe there's no real risk here, but it's good form to not depend on such convenient arrangements. Bug spotted by the Coverity scanner. Back-patch to 9.2 where this showed up. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03010366b6fb61aac0998f234478cc745ff97b0c">http://git.postgresql.org/pg/commitdiff/03010366b6fb61aac0998f234478cc745ff97b0c</a></li>

<li>Check get_tle_by_resno() result before deref. When creating a sort to support a group by, we need to look up the target entry in the target list by the resno using get_tle_by_resno(). This particular code-path didn't check the result prior to attempting to dereference it, while all other callers did. While I can't see a way for this usage of get_tle_by_resno() to fail (you can't ask for a column to be sorted on which isn't included in the group by), it's probably best to check that we didn't end up with a NULL somehow anyway than risk the segfault. I'm willing to back-patch this if others feel it's necessary, but my guess is new features are what might tickle this rather than anything existing. Missing check spotted by the Coverity scanner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ed22e891f9915b02b753ee8763a8f2438234fc6">http://git.postgresql.org/pg/commitdiff/4ed22e891f9915b02b753ee8763a8f2438234fc6</a></li>

<li>Use correct parameter name for view_option_value. The documentation for ALTER VIEW had a minor copy-and-paste error in defining the parameters. Noticed when reviewing the WITH CHECK OPTION patch. Backpatch to 9.2 where this was first introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2719f6975398727ed492ecbcb2028bd134e5f6b">http://git.postgresql.org/pg/commitdiff/f2719f6975398727ed492ecbcb2028bd134e5f6b</a></li>

<li>WITH CHECK OPTION support for auto-updatable VIEWs. For simple views which are automatically updatable, this patch allows the user to specify what level of checking should be done on records being inserted or updated. For 'LOCAL CHECK', new tuples are validated against the conditionals of the view they are being inserted into, while for 'CASCADED CHECK' the new tuples are validated against the conditionals for all views involved (from the top down). This option is part of the SQL specification. Dean Rasheed, reviewed by Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cbe3ac3e86790d05c569de4585e5075a62a9b41">http://git.postgresql.org/pg/commitdiff/4cbe3ac3e86790d05c569de4585e5075a62a9b41</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>vacuumlo: Use a cursor to limit client-side memory usage. This prevents the client from gobbling up too much memory when the number of large objects to be removed is very large. Andrew Dunstan, reviewed by Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67ccbb080d87a5379dffc1cdff046c4caf534a6c">http://git.postgresql.org/pg/commitdiff/67ccbb080d87a5379dffc1cdff046c4caf534a6c</a></li>

<li>Regression tests for LOCK TABLE. Robins Tharakan, reviewed by Szymon Guz, substantially revised by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac33c7e2c1304dffcf107065d7fc04232a8a94fa">http://git.postgresql.org/pg/commitdiff/ac33c7e2c1304dffcf107065d7fc04232a8a94fa</a></li>

<li>Assert that syscache lookups don't happen outside transactions. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42c80c696e9c8323841180029cc62741c21bd356">http://git.postgresql.org/pg/commitdiff/42c80c696e9c8323841180029cc62741c21bd356</a></li>

<li>Tab completion for \lo_import. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4403a9d7913043d99de9e13a9b54c57ed0c4501c">http://git.postgresql.org/pg/commitdiff/4403a9d7913043d99de9e13a9b54c57ed0c4501c</a></li>

<li>Allow background workers to be started dynamically. There is a new API, RegisterDynamicBackgroundWorker, which allows an ordinary user backend to register a new background writer during normal running. This means that it's no longer necessary for all background workers to be registered during processing of shared_preload_libraries, although the option of registering workers at that time remains available. When a background worker exits and will not be restarted, the slot previously used by that background worker is automatically released and becomes available for reuse. Slots used by background workers that are configured for automatic restart can't (yet) be released without shutting down the system. This commit adds a new source file, bgworker.c, and moves some of the existing control logic for background workers there. Previously, there was little enough logic that it made sense to keep everything in postmaster.c, but not any more. This commit also makes the worker_spi contrib module into an extension and adds a new function, worker_spi_launch, which can be used to demonstrate the new facility. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f7485a0cde92aa4ba235a1ffe4dda0ca0b6cc9a">http://git.postgresql.org/pg/commitdiff/7f7485a0cde92aa4ba235a1ffe4dda0ca0b6cc9a</a></li>

<li>doc: Fix typos in conversion names. David Christensen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8fb821afc2ce37b48b678251480b52e6b116868">http://git.postgresql.org/pg/commitdiff/c8fb821afc2ce37b48b678251480b52e6b116868</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix PQconninfoParse error message handling. The returned error message already includes a newline, but the callers were adding their own when printing it out. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/233bfe06735411f08d231764dfd3a6fcf7aef9a3">http://git.postgresql.org/pg/commitdiff/233bfe06735411f08d231764dfd3a6fcf7aef9a3</a></li>

<li>doc: Remove tab from SGML file 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8b1d1befeab17453eb2977e83a45649e6ed8790">http://git.postgresql.org/pg/commitdiff/e8b1d1befeab17453eb2977e83a45649e6ed8790</a></li>

<li>Clean up new JSON API typedefs. The new JSON API uses a bit of an unusual typedef scheme, where for example OkeysState is a pointer to okeysState. And that's not applied consistently either. Change that to the more usual PostgreSQL style where struct typedefs are upper case, and use pointers explicitly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff41a5de0995f01a98b6fbc3a0c774b9a53e609a">http://git.postgresql.org/pg/commitdiff/ff41a5de0995f01a98b6fbc3a0c774b9a53e609a</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for REFRESH MATERIALIZED VIEW CONCURRENTLY. This allows reads to continue without any blocking while a REFRESH runs. The new data appears atomically as part of transaction commit. Review questioned the Assert that a matview was not a system relation. This will be addressed separately. Reviewed by Hitoshi Harada, Robert Haas, Andres Freund. Merged after review with security patch f3ab5d4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc1965a99bf87005f431804bbda0f723887a04d6">http://git.postgresql.org/pg/commitdiff/cc1965a99bf87005f431804bbda0f723887a04d6</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add --progress option to show progress report. Patch contributed by Fabien COELHO, reviewed by KONDO Mitsumasa. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a87f308b33457670f9ab4bc622678e5d285b9c2">http://git.postgresql.org/pg/commitdiff/4a87f308b33457670f9ab4bc622678e5d285b9c2</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix systable_recheck_tuple() for MVCC scan snapshots. Since this function assumed non-MVCC snapshots, it broke when commit 568d4138c646cd7cd8a837ac244ef2caf27c6bb8 switched its one caller from SnapshotNow scans to MVCC-snapshot scans. Reviewed by Robert Haas, Tom Lane and Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffcf654547ef38555203e6d716f47b7065a0a87d">http://git.postgresql.org/pg/commitdiff/ffcf654547ef38555203e6d716f47b7065a0a87d</a></li>

<li>Implement the FILTER clause for aggregate function calls. This is SQL-standard with a few extensions, namely support for subqueries and outer references in clause expressions. catversion bump due to change in Aggref and WindowFunc. David Fetter, reviewed by Dean Rasheed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b560ec1b0d7b910ce13edc51ffaafaca72136e3b">http://git.postgresql.org/pg/commitdiff/b560ec1b0d7b910ce13edc51ffaafaca72136e3b</a></li>

<li>Comment on why planagg.c punts "MIN(x ORDER BY y)". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a8e9f298e7b8158296e1ea72ca8987323c10edf">http://git.postgresql.org/pg/commitdiff/7a8e9f298e7b8158296e1ea72ca8987323c10edf</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in previous pgbench --progress patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/750f43685b1b88d4281074940cdcea0e328593aa">http://git.postgresql.org/pg/commitdiff/750f43685b1b88d4281074940cdcea0e328593aa</a></li>

<li>Fix pgstattuple functions to use regclass-type as the argument. This allows us to specify the target relation with several expressions, 'relname', 'schemaname.relname' and OID in all pgstattuple functions. pgstatindex() and pg_relpages() could not accept OID as the argument so far. Per discussion on -hackers, we decided to keep two types of interfaces, with regclass-type and TEXT-type argument, for each pgstattuple function because of the backward-compatibility issue. The functions which have TEXT-type argument will be deprecated in the future release. Patch by Satoshi Nagayasu, reviewed by Rushabh Lathia and Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1dc118660b8f12d3bdec94b6f6e1068966ca62e9">http://git.postgresql.org/pg/commitdiff/1dc118660b8f12d3bdec94b6f6e1068966ca62e9</a></li>

<li>Fix typo in update scripts for some contrib modules. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f9e39bc9993c18686f0950f9b9657c7c97c7450">http://git.postgresql.org/pg/commitdiff/6f9e39bc9993c18686f0950f9b9657c7c97c7450</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix end-of-loop optimization in pglz_find_match() function. After the recent pglz optimization patch, the next/prev pointers in the hash table are never NULL, INVALID_ENTRY_PTR is used to represent invalid entries instead. The end-of-loop check in pglz_find_match() function didn't get the memo. The result was the same from a correctness point of view, but because the NULL-check would never fail, the tiny optimization turned into a pessimization. Reported by Stephen Frost, using Coverity scanner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f2adace1ec025908b5189f0773b4eaab3d228d5">http://git.postgresql.org/pg/commitdiff/3f2adace1ec025908b5189f0773b4eaab3d228d5</a></li>

<li>Fix assert failure at end of recovery, broken by XLogInsert scaling patch. Initialization of the first XLOG buffer at end-of-recovery was broken for the case that the last read WAL record ended at a page boundary. Instead of trying to copy the last full xlog page to the buffer cache in that case, just set shared state so that the next page is initialized when the first WAL record after startup is inserted. (that's what we did in earlier version, too) To make the shared state required for that case less surprising, replace the XLogCtl-&gt;curridx variable, which was the index of the latest initialized buffer, with an XLogRecPtr of how far the buffers have been initialized. That also allows us to get rid of the XLogRecEndPtrToBufIdx macro. While we're at it, make a similar change for XLogCtl-&gt;Write.curridx, getting rid of that variable and calculating the next buffer to write from XLogCtl-&gt;LogwrtResult instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59c02a36f0ef317958b2d14313b5c8e41cfd9be6">http://git.postgresql.org/pg/commitdiff/59c02a36f0ef317958b2d14313b5c8e41cfd9be6</a></li>

<li>Fix variable names mentioned in comment to match the code. Also, in another comment, explain why holding an insertion slot is a critical section. Per review by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/107cbc90a7564b6cd773c56ad3da8b66c7377df5">http://git.postgresql.org/pg/commitdiff/107cbc90a7564b6cd773c56ad3da8b66c7377df5</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a few problems in barrier.h. On HPPA, implement pg_memory_barrier() as pg_compiler_barrier(), which should be correct since this arch doesn't do memory access reordering, and is anyway better than the completely-nonfunctional-on-this-arch dummy_spinlock code. (But note this patch only fixes things for gcc, not for builds with HP's compiler.) Also, fix incorrect default definition of pg_memory_barrier as a macro requiring an argument. Also, fix incorrect spelling of "#elif" as "#else if" in icc code path (spotted by pgindent). This doesn't come close to fixing all of the functional and stylistic deficiencies in barrier.h, but at least it un-breaks my personal build. Now that we're actually using barriers in the code, this file is going to need some serious attention. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89779bf2c8f9aa480e0ceb8883f93e9d65c43a6e">http://git.postgresql.org/pg/commitdiff/89779bf2c8f9aa480e0ceb8883f93e9d65c43a6e</a></li>

<li>Fix direct access to Relation-&gt;rd_indpred. Should use RelationGetIndexPredicate(), since rd_indpred is just a cache that is not computed until/unless demanded. Per buildfarm failure on CLOBBER_CACHE_ALWAYS animals; diagnosis and fix by Hitoshi Harada. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/405a468b02dd80a069b95c4eb9838cb6a562eddd">http://git.postgresql.org/pg/commitdiff/405a468b02dd80a069b95c4eb9838cb6a562eddd</a></li>

<li>Fix regex match failures for backrefs combined with non-greedy quantifiers. An ancient logic error in cfindloop() could cause the regex engine to fail to find matches that begin later than the start of the string. This function is only used when the regex pattern contains a back reference, and so far as we can tell the error is only reachable if the pattern is non-greedy (i.e. its first quantifier uses the ? modifier). Furthermore, the actual match must begin after some potential match that satisfies the DFA but then fails the back-reference's match test. Reported and fixed by Jeevan Chalke, with cosmetic adjustments by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2bd904955e2221eddf01110b1f25002de2aaa83">http://git.postgresql.org/pg/commitdiff/e2bd904955e2221eddf01110b1f25002de2aaa83</a></li>

<li>Add checks for valid multibyte character length in UtfToLocal, LocalToUtf. This is mainly to suppress "uninitialized variable" warnings from very recent versions of gcc. But it seems like a good robustness thing anyway, not to mention that we might someday decide to support 6-byte UTF8. Per report from Karol Trzcionka. No back-patch since there's no reason at the moment to think this is more than cosmetic. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9f37e6661ec654f7252bfc23e084c9e2ca5db14">http://git.postgresql.org/pg/commitdiff/d9f37e6661ec654f7252bfc23e084c9e2ca5db14</a></li>

<li>Fix error handling in PLy_spi_execute_fetch_result(). If an error is thrown out of the datatype I/O functions called by this function, we need to do subtransaction cleanup, which the previous coding entirely failed to do. Fortunately, both existing callers of this function already have proper cleanup logic, so re-throwing the exception is enough. Also, postpone creation of the resultset tupdesc until after the I/O conversions are complete, so that we won't leak memory in TopMemoryContext when such an error happens. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3b10c39038c20457ef058c7f4e5589c28a84f1c">http://git.postgresql.org/pg/commitdiff/b3b10c39038c20457ef058c7f4e5589c28a84f1c</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move checking an explicit VARIADIC "any" argument into the parser. This is more efficient and simpler. It does mean that an untyped NULL can no longer be used in such cases, which should be mentioned in Release Notes, but doesn't seem a terrible loss. The workaround is to cast the NULL to some array type. Pavel Stehule, reviewed by Jeevan Chalke. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d26888bc4d1e539a82f21382b0000fe5bbf889d9">http://git.postgresql.org/pg/commitdiff/d26888bc4d1e539a82f21382b0000fe5bbf889d9</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Initialize day of year value. There are cases where the day of year value in struct tm is used, but it never got calculated. Problem found by Coverity scan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2c1c3308f33a293152e65bbc0d25e7976dde23d">http://git.postgresql.org/pg/commitdiff/a2c1c3308f33a293152e65bbc0d25e7976dde23d</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix HeapTupleSatisfiesVacuum on aborted updater xacts. By using only the macro that checks infomask bits HEAP_XMAX_IS_LOCKED_ONLY to verify whether a multixact is not an updater, and not the full HeapTupleHeaderIsOnlyLocked, it would come to the wrong result in case of a multixact containing an aborted update; therefore returning the wrong result code. This would cause predicate.c to break completely (as in bug report #8273 from David Leverton), and certain index builds would misbehave. As far as I can tell, other callers of the bogus routine would make harmless mistakes or not be affected by the difference at all; so this was a pretty narrow case. Also, no other user of the HEAP_XMAX_IS_LOCKED_ONLY macro is as careless; they all check specifically for the HEAP_XMAX_IS_MULTI case, and they all verify whether the updater is InvalidXid before concluding that it's a valid updater. So there doesn't seem to be any similar bug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6737aa72ba7621d4db8e09210c65eecafc42b616">http://git.postgresql.org/pg/commitdiff/6737aa72ba7621d4db8e09210c65eecafc42b616</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in another revision of a patch to change recovery.conf parameters to GUCs.</li>

<li>Gurjeet Singh sent in another revision of a patch to speed up processing of long chains of AND and OR conditions.</li>

<li>Robins Tharakan sent in another revision of a patch to add regression tests for ROLE (USER).</li>

<li>Robins Tharakan sent in another revision of a patch to add regression tests for SCHEMA.</li>

<li>Robins Tharakan sent in another revision of a patch to add regression tests for SEQUENCE.</li>

<li>Satoshi Nagayasu sent in two more revisions of a patch to change pgstattuple/pgstatindex to use regclass-type as the argument.</li>

<li>Amit Kapila sent in another revision of a patch to implement ALTER SYSTEM.</li>

<li>Satoshi Nagayasu and Kyotaro HORIGUCHI traded patches to add visibility map information to pg_freespace.</li>

<li>Fabien COELHO, and Tatsuo Ishii traded patches to implement pgbench --throttle.</li>

<li>Hari Babu sent in another revision of a patch to improve performance by reducing WAL for update operations.</li>

<li>David Fetter sent in a patch to allow foreign tables to be partitions of local tables.</li>

<li>Robert Haas sent in a patch to get rid of SnapshotNow.</li>

<li>Greg Smith sent in another revision of a patch to implement row-level accesss control.</li>

<li>Atri Sharma sent in a PoC patch to implement WITHIN GROUP, one application of which is median.</li>

<li>Karol Trzcionka sent in two more revisions of a patch to implement UPDATE ... RETURNING BEFORE/AFTER.</li>

<li>Tom Lane sent in a patch to prevent tuple-table leakage in plpgsql.</li>

<li>Heikki Linnakangas sent in a WIP patch to do segment-at-a-time writes of dirty buffers in checkpoints.</li>

<li>Noah Misch sent in a patch to make all REINDEXes re-validate constraints, as this behavior had accidentally been removed by an earlier patch.</li>

<li>Quan Zongliang sent in a patch to improve performance for Chinese-language databases.</li>

</ul>