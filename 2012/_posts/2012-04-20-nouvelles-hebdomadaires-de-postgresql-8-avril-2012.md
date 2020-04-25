---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 avril 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/04/20/Nouvelles-hebdomadaires-de-PostgreSQL-8-avril-2012"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>LuaPgSQL, un binding Lua pour PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/mbalmer/luapgsql">https://github.com/mbalmer/luapgsql</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en Avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-04/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>R&eacute;union du groupe londonien, le 17 avril 2012&nbsp;: 

<a target="_blank" href="http://www.meetup.com/London-PostgreSQL-Meetup-Group/">http://www.meetup.com/London-PostgreSQL-Meetup-Group/</a></li>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-04/msg00002.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for renaming domain constraints 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38b9693fd9847f4dcf6ff2fc469a7f2aac6385d9">http://git.postgresql.org/pg/commitdiff/38b9693fd9847f4dcf6ff2fc469a7f2aac6385d9</a></li>

<li>NLS: Use msgmerge/xgettext --no-wrap and --sort-by-file. The option --no-wrap prevents wars with (most?) editors about proper line wrapping. --sort-by-file ensures consistent file order, for easier diffing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05261ab6246cba9701b8529eba812b8a68c3be8d">http://git.postgresql.org/pg/commitdiff/05261ab6246cba9701b8529eba812b8a68c3be8d</a></li>

<li>Correct various system catalog/view definitions in the documentation. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25028a27c828b8d31a85064f230113a42c0fea81">http://git.postgresql.org/pg/commitdiff/25028a27c828b8d31a85064f230113a42c0fea81</a></li>

<li>Fix some typos in the documentation. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c41948c39288139cd9a592466cd373b6868bb55">http://git.postgresql.org/pg/commitdiff/6c41948c39288139cd9a592466cd373b6868bb55</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Arrange for on_exit_nicely to be thread-safe. Extracted from Joachim Wieland's parallel pg_dump patch, with some additional comments by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e86c61a7eec0fdc6961493a150159fa8fc63b1c">http://git.postgresql.org/pg/commitdiff/5e86c61a7eec0fdc6961493a150159fa8fc63b1c</a></li>

<li>Expose track_iotiming data via the statistics collector. Ants Aasma's original patch to add timing information for buffer I/O requests exposed this data at the relation level, which was judged too costly. I've here exposed it at the database level instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/644828908fb132ee1f1da5b8b7975c0d73d6158a">http://git.postgresql.org/pg/commitdiff/644828908fb132ee1f1da5b8b7975c0d73d6158a</a></li>

<li>Correctly explain units used by function-timing stats functions. The views are in milliseconds, but the raw functions return microseconds. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97e26dc66d47624bdbdee1dbd007a0f4212defcb">http://git.postgresql.org/pg/commitdiff/97e26dc66d47624bdbdee1dbd007a0f4212defcb</a></li>

<li>Publish checkpoint timing information to pg_stat_bgwriter. Greg Smith, Peter Geoghegan, and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b736aef2ec57b520ebadb70cceac0fed3168a5df">http://git.postgresql.org/pg/commitdiff/b736aef2ec57b520ebadb70cceac0fed3168a5df</a></li>

<li>Allow pg_archivecleanup to strip optional file extensions. Greg Smith and Jaime Casanova, reviewed by Alex Shulgin and myself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bbc02243fcf2fbf51b6bacf05a73fa042d3d84a4">http://git.postgresql.org/pg/commitdiff/bbc02243fcf2fbf51b6bacf05a73fa042d3d84a4</a></li>

<li>checkopint -&gt; checkpoint. Report by Guillaume Lelarge. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21cc529698c8d10c6f7c76874d4adc98d27c6187">http://git.postgresql.org/pg/commitdiff/21cc529698c8d10c6f7c76874d4adc98d27c6187</a></li>

<li>Put back code inadvertently deleted from exit_nicely. Report by Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/662ca285a6f8fee5616eb2770f889ee94a040afa">http://git.postgresql.org/pg/commitdiff/662ca285a6f8fee5616eb2770f889ee94a040afa</a></li>

<li>Teach SLRU code to avoid replacing I/O-busy pages. Patch by me; review by Tom Lane and others. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ae5133b1cf478d516666f2003bc68ba0edb84c7">http://git.postgresql.org/pg/commitdiff/3ae5133b1cf478d516666f2003bc68ba0edb84c7</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a couple of contrib/dblink bugs. dblink_exec leaked temporary database connections if any error occurred after connection setup, for example SELECT dblink_exec('...connect string...', 'select 1/0'); Add a PG_TRY block to ensure PQfinish gets done when it is needed. (dblink_record_internal is on the hairy edge of needing similar treatment, but seems not to be actively broken at the moment.) Also, in 9.0 and up, only one of the three functions using tuplestore return mode was properly checking that the query context would allow a tuplestore result. Noted while reviewing dblink patch. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d843ed21164275dfbfefa486bb00bca91380cdf0">http://git.postgresql.org/pg/commitdiff/d843ed21164275dfbfefa486bb00bca91380cdf0</a></li>

<li>Fix syslogger to not lose log coherency under high load. The original coding of the syslogger had an arbitrary limit of 20 large messages concurrently in progress, after which it would just punt and dump message fragments to the output file separately. Our ambitions are a bit higher than that now, so allow the data structure to expand as necessary. Reported and patched by Andrew Dunstan; some editing by Tom 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c17e863bc7677a54d6da5bbb2868cca2cd9b30c1">http://git.postgresql.org/pg/commitdiff/c17e863bc7677a54d6da5bbb2868cca2cd9b30c1</a></li>

<li>Remove useless PGRES_COPY_BOTH "support" in psql. There is no existing or foreseeable case in which psql should see a PGRES_COPY_BOTH PQresultStatus; and if such a case ever emerges, it's a pretty good bet that these code fragments wouldn't do the right thing anyway. Remove them, and let the existing default cases do the appropriate thing, namely emit an "unexpected PQresultStatus" bleat. Noted while working on libpq row processor patch, for which I was considering adding a PGRES_SUSPENDED status code --- the same default-case treatment would be appropriate for that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb917e1544612c187c74fed1a990e26820514c8a">http://git.postgresql.org/pg/commitdiff/cb917e1544612c187c74fed1a990e26820514c8a</a></li>

<li>Add a "row processor" API to libpq for better handling of large results. Traditionally libpq has collected an entire query result before passing it back to the application. That provides a simple and transactional API, but it's pretty inefficient for large result sets. This patch allows the application to process each row on-the-fly instead of accumulating the rows into the PGresult. Error recovery becomes a bit more complex, but often that tradeoff is well worth making. Kyotaro Horiguchi, reviewed by Marko Kreen and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92785dac2ee7026948962cd61c4cd84a2d052772">http://git.postgresql.org/pg/commitdiff/92785dac2ee7026948962cd61c4cd84a2d052772</a></li>

<li>Improve efficiency of dblink by using libpq's new row processor API. This patch provides a test case for libpq's row processor API. contrib/dblink can deal with very large result sets by dumping them into a tuplestore (which can spill to disk) --- but until now, the intermediate storage of the query result in a PGresult meant memory bloat for any large result. Now we use a row processor to convert the data to tuple form and dump it directly into the tuplestore. A limitation is that this only works for plain dblink() queries, not dblink_send_query() followed by dblink_get_result(). In the latter case we don't know the desired tuple rowtype soon enough. While hack solutions to that are possible, a different user-level API would probably be a better answer. Kyotaro Horiguchi, reviewed by Marko Kreen and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f922ef88e43b3084cdddf4b5ffe525a00896a90">http://git.postgresql.org/pg/commitdiff/6f922ef88e43b3084cdddf4b5ffe525a00896a90</a></li>

<li>Fix plpgsql named-cursor-parameter feature for variable name conflicts. The parser got confused if a cursor parameter had the same name as a plpgsql variable. Reported and diagnosed by Yeb Havinga, though this isn't exactly his proposed fix. Also, some mostly-but-not-entirely-cosmetic adjustments to the original named-cursor-parameter patch, for code readability and better error diagnostics. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05dbd4a7734e09bd1f835f4197d9befa1c00c4f3">http://git.postgresql.org/pg/commitdiff/05dbd4a7734e09bd1f835f4197d9befa1c00c4f3</a></li>

<li>Update obsolete comment. Somebody didn't bother to fix this comment while adding foreign table support to the code below it. In passing, remove the explicit calling-out of relkind letters, which adds complexity to the comment but doesn't help in understanding the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a75b08066ab4b426b1bd056fed81302e5a5d5371">http://git.postgresql.org/pg/commitdiff/a75b08066ab4b426b1bd056fed81302e5a5d5371</a></li>

<li>Allow statistics to be collected for foreign tables. ANALYZE now accepts foreign tables and allows the table's FDW to control how the sample rows are collected. (But only manual ANALYZEs will touch foreign tables, for the moment, since among other things it's not very clear how to handle remote permissions checks in an auto-analyze.) contrib/file_fdw is extended to support this. Etsuro Fujita, reviewed by Shigeru Hanada, some further tweaking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/263d9de66b867b7800fac82c222e004b795b724a">http://git.postgresql.org/pg/commitdiff/263d9de66b867b7800fac82c222e004b795b724a</a></li>

<li>Dept of second thoughts: improve the API for AnalyzeForeignTable. If we make the initially-called function return the table physical-size estimate, acquire_inherited_sample_rows will be able to use that to allocate numbers of samples among child tables, when the day comes that we want to support foreign tables in inheritance trees. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cea49fe82fedcf125eb99a780099eaf47a326b03">http://git.postgresql.org/pg/commitdiff/cea49fe82fedcf125eb99a780099eaf47a326b03</a></li>

<li>Fix broken comparetup_datum code. Commit 337b6f5ecf05b21b5e997986884d097d60e4e3d0 contained the entirely fanciful assumption that it had made comparetup_datum unreachable. Reported and patched by Takashi Yamamoto. Fix up some not terribly accurate/useful comments from that commit, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17b985b1a068e120feb05bb61be6328f4fef8090">http://git.postgresql.org/pg/commitdiff/17b985b1a068e120feb05bb61be6328f4fef8090</a></li>

<li>Fix misleading output from gin_desc(). XLOG_GIN_UPDATE_META_PAGE and XLOG_GIN_DELETE_LISTPAGE records were printed with a list link field labeled as "blkno", which was confusing, especially when the link was empty (InvalidBlockNumber). Print the metapage block number instead, since that's what's actually being updated. We could include the link values too as a separate field, but not clear it's worth the trouble. Back-patch to 8.4 where the dubious code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ab4db52c0d45763adee3981da4325e7c353e443">http://git.postgresql.org/pg/commitdiff/0ab4db52c0d45763adee3981da4325e7c353e443</a></li>

<li>Update URL for pgtclng project. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d75829a682fdf832fe9d044b28be597d3f058ec8">http://git.postgresql.org/pg/commitdiff/d75829a682fdf832fe9d044b28be597d3f058ec8</a></li>

<li>Remove useless variable to suppress compiler warning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a25ef7a5f68728f7f78f798a98c26b773c45937e">http://git.postgresql.org/pg/commitdiff/a25ef7a5f68728f7f78f798a98c26b773c45937e</a></li>

<li>Further adjustment of comment about qsort_tuple. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95b9c333b25463283ba07c5ba7dbe79b4e8b4480">http://git.postgresql.org/pg/commitdiff/95b9c333b25463283ba07c5ba7dbe79b4e8b4480</a></li>

<li>Fix incorrect make maintainer-clean rule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7feecedccef078bb9f39188db2f75c1481b45cc3">http://git.postgresql.org/pg/commitdiff/7feecedccef078bb9f39188db2f75c1481b45cc3</a></li>

<li>Improve management of "sticky" entries in contrib/pg_stat_statements. This patch addresses a deficiency in the previous pg_stat_statements patch. We want to give sticky entries an initial "usage" factor high enough that they probably will stick around until their query is completed. However, if the query never completes (eg it gets an error during execution), the entry shouldn't persist indefinitely. Manage this by starting out with a usage setting equal to the (approximate) median usage value within the whole hashtable, but decaying the value much more aggressively than we do for normal entries. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5375491f8e391224b48e4bb449995a4642183ea">http://git.postgresql.org/pg/commitdiff/d5375491f8e391224b48e4bb449995a4642183ea</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add DROP INDEX CONCURRENTLY [IF EXISTS], uses ShareUpdateExclusiveLock 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cb53654dbdb4c386369eb988062d0bbb6de725e">http://git.postgresql.org/pg/commitdiff/8cb53654dbdb4c386369eb988062d0bbb6de725e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Stamp libraries versions for 9.2 (better late than never). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d24ac36f4fb99824425c81a64a5e36f3e91a7656">http://git.postgresql.org/pg/commitdiff/d24ac36f4fb99824425c81a64a5e36f3e91a7656</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Do stack-depth checking in all postmaster children. We used to only initialize the stack base pointer when starting up a regular backend, not in other processes. In particular, autovacuum workers can run arbitrary user code, and without stack-depth checking, infinite recursion in e.g an index expression will bring down the whole cluster. The comment about PL/Java using set_stack_base() is not yet true. As the code stands, PL/java still modifies the stack_base_ptr variable directly. However, it's been discussed in the PL/Java mailing list that it should be changed to use the function, because PL/Java is currently oblivious to the register stack used on Itanium. There's another issues with PL/Java, namely that the stack base pointer it sets is not really the base of the stack, it could be something close to the bottom of the stack. That's a separate issue that might need some further changes to this code, but that's a different story. Backpatch to all supported releases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef3883d130cb553003015f3da7fa59415da6f5c9">http://git.postgresql.org/pg/commitdiff/ef3883d130cb553003015f3da7fa59415da6f5c9</a></li>

<li>set_stack_base() no longer needs to be called in PostgresMain. This was a thinko in previous commit. Now that stack base pointer is now set in PostmasterMain and SubPostmasterMain, it doesn't need to be set in PostgresMain anymore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03529a3ff999b0e4770b3e0b8e342400e383db98">http://git.postgresql.org/pg/commitdiff/03529a3ff999b0e4770b3e0b8e342400e383db98</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Etsuro Fujita and Shigeru HANADA traded patches to implement various parts of a PostgreSQL FDW.</li>

<li>Gilles Darold sent in some patches to help tell when PostgreSQL is in backup mode.</li>

<li>Josh Kupershmidt sent in a patch to fix psql's tab completion for WITH under some circumstances.</li>

<li>Heikki Linnakangas and Pavel Stehule traded versions of the CHECK TRIGGER patch.</li>

<li>Joachim Wieland sent in two more revisions of the patch to make pg_dump able to operate in parallel.</li>

<li>Yeb Havinga sent in two revisions of a patch intended to fix an issue with cursor arguments in named notation.</li>

<li>Zoltan Boszormenyi sent in five revisions of a patch to implement a framework to simplify and correctly nest multiplexing more than two timeout sources into the same SIGALRM signal handler.</li>

<li>Robert Haas sent in a patch to fix the SLRU replacement algorithm.</li>

<li>Peter Eisentraut sent in a patch to rename bytea_agg() to string_agg(), which now covers bytea types.</li>

<li>Peter Geoghegan sent in a patch to do some speedups in pg_stat_statements.</li>

<li>Alvaro Herrera sent in another revision of the patch to add URI support to libpq, along with some documentation fo the changes.</li>

</ul>