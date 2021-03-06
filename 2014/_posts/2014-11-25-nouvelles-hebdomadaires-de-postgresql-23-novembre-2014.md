---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 novembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/11/25/Nouvelles-hebdomadaires-de-PostgreSQL-23-novembre-2014"
---


<p>PostgreSQL 9.4RC1 disponible. Test&nbsp;! 

<a target="_blank" href="https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.4">https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.4</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour le PGDay et la Devroom du FOSDEM 2015 est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/callforpapers/">http://fosdem2015.pgconf.eu/callforpapers/</a></p>

<p>La pgcon japonaise 2014 aura lieu le 5 d&eacute;cembre &agrave; Shinagawa&nbsp;: 

<a target="_blank" href="http://www.postgresql.jp/events/jpug-pgcon2014">http://www.postgresql.jp/events/jpug-pgcon2014</a></p>

<p>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Ora2PG 14.1, un syst&egrave;me de migration depuis Oracle vers PostgreSQL&nbsp;: 

<a target="_blank" href="http://ora2pg.darold.net/">http://ora2pg.darold.net/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PG-Cuba aura lieu les 25 &amp; 26 novembre 2014&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?p=1087#more-1087">http://postgresql.uci.cu/?p=1087#more-1087</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGDay (30 janvier 2015) et la <em>dev room</em> PostgreSQL du FOSDEM (31 janvier au 1<sup>er</sup> f&eacute;vrier 2015) est lanc&eacute;. Date limite des candidatures&nbsp;: 24 novembre 2014&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/callforpapers/">http://fosdem2015.pgconf.eu/callforpapers/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le <em>Nordic PostgreSQL Day 2015</em>, pr&eacute;vu le 11 mars 2015 &agrave; Copenhague (Danemark), est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.nordicpgday.org/cfp/">http://2015.nordicpgday.org/cfp/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf US 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. L'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141124143411.GA4961@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix relpersistence setting in reindex_index. Buildfarm members with CLOBBER_CACHE_ALWAYS advised us that commit 85b506bbfc2937 was mistaken in setting the relpersistence value of the index directly in the relcache entry, within reindex_index. The reason for the failure is that an invalidation message that comes after mucking with the relcache entry directly, but before writing it to the catalogs, would cause the entry to become rebuilt in place from catalogs with the old contents, losing the update. Fix by passing the correct persistence value to RelationSetNewRelfilenode instead; this routine also writes the updated tuple to pg_class, avoiding the problem. Suggested by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f9692b40d1292f1b2640f026561908fd37b7407">http://git.postgresql.org/pg/commitdiff/0f9692b40d1292f1b2640f026561908fd37b7407</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix WAL-logging of B-tree "unlink halfdead page" operation. There was some confusion on how to record the case that the operation unlinks the last non-leaf page in the branch being deleted. _bt_unlink_halfdead_page set the "topdead" field in the WAL record to the leaf page, but the redo routine assumed that it would be an invalid block number in that case. This commit fixes _bt_unlink_halfdead_page to do what the redo routine expected. This code is new in 9.4, so backpatch there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c73669c0e0168923e3f9e787beec980f55af2bd8">http://git.postgresql.org/pg/commitdiff/c73669c0e0168923e3f9e787beec980f55af2bd8</a></li>

<li>Remove obsolete debugging option, RTDEBUG. The r-tree AM that used it was removed back in 2005. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dedae6c211415290cdf5faca4ef874f803af204c">http://git.postgresql.org/pg/commitdiff/dedae6c211415290cdf5faca4ef874f803af204c</a></li>

<li>Add test cases for indexam operations not currently covered. That includes VACUUM on GIN, GiST and SP-GiST indexes, and B-tree indexes large enough to cause page deletions in B-tree. Plus some other special cases. After this patch, the regression tests generate all different WAL record types. Not all branches within the redo functions are covered, but it's a step forward. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88fc71926392115cdc3672807f3903ce43d0ebcf">http://git.postgresql.org/pg/commitdiff/88fc71926392115cdc3672807f3903ce43d0ebcf</a></li>

<li>Silence compiler warning about variable being used uninitialized. It's a false positive - the variable is only used when 'onleft' is true, and it is initialized in that case. But the compiler doesn't necessarily see that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f464042161fb980578c33fedc2742c5a4d941fa2">http://git.postgresql.org/pg/commitdiff/f464042161fb980578c33fedc2742c5a4d941fa2</a></li>

<li>Revamp the WAL record format. Each WAL record now carries information about the modified relation and block(s) in a standardized format. That makes it easier to write tools that need that information, like pg_rewind, prefetching the blocks to speed up recovery, etc. There's a whole new API for building WAL records, replacing the XLogRecData chains used previously. The new API consists of XLogRegister* functions, which are called for each buffer and chunk of data that is added to the record. The new API also gives more control over when a full-page image is written, by passing flags to the XLogRegisterBuffer function. This also simplifies the XLogReadBufferForRedo() calls. The function can dig the relation and block number from the WAL record, so they no longer need to be passed as arguments. For the convenience of redo routines, XLogReader now disects each WAL record after reading it, copying the main data part and the per-block data into MAXALIGNed buffers. The data chunks are not aligned within the WAL record, but the redo routines can assume that the pointers returned by XLogRecGet* functions are. Redo routines are now passed the XLogReaderState, which contains the record in the already-disected format, instead of the plain XLogRecord. The new record format also makes the fixed size XLogRecord header smaller, by removing the xl_len field. The length of the "main data" portion is now stored at the end of the WAL record, and there's a separate header after XLogRecord for it. The alignment padding at the end of XLogRecord is also removed. This compansates for the fact that the new format would otherwise be more bulky than the old format. Reviewed by Andres Freund, Amit Kapila, Michael Paquier, Alvaro Herrera, Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c03216d831160bedd72d45f712601b6f7d03f1c">http://git.postgresql.org/pg/commitdiff/2c03216d831160bedd72d45f712601b6f7d03f1c</a></li>

<li>Add pageinspect functions for inspecting GIN indexes. Patch by me, Peter Geoghegan and Michael Paquier, reviewed by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a82bc6f8ab38be3ed095f1c86866900b145f0f6">http://git.postgresql.org/pg/commitdiff/3a82bc6f8ab38be3ed095f1c86866900b145f0f6</a></li>

<li>Fix bogus comments in XLogRecordAssemble. Pointed out by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f5dcb56cb1877f7ed6b0f3f72cc26c4e060aa61">http://git.postgresql.org/pg/commitdiff/8f5dcb56cb1877f7ed6b0f3f72cc26c4e060aa61</a></li>

<li>Add a comment to regress.c explaining what it contains. Ian Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b10a97b819a2594c97188bac02d87b550908a692">http://git.postgresql.org/pg/commitdiff/b10a97b819a2594c97188bac02d87b550908a692</a></li>

<li>No need to call XLogEnsureRecordSpace when the relation is unlogged. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/622983ea6964fc55f1ad3063d3d7b8f5de8e8816">http://git.postgresql.org/pg/commitdiff/622983ea6964fc55f1ad3063d3d7b8f5de8e8816</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2014j. DST law changes in the Turks &amp; Caicos Islands (America/Grand_Turk) and in Fiji. New zone Pacific/Bougainville for portions of Papua New Guinea. Historical changes for Korea and Vietnam. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc241488b0f9bde3e14094bfaf0d7987fafb6600">http://git.postgresql.org/pg/commitdiff/bc241488b0f9bde3e14094bfaf0d7987fafb6600</a></li>

<li>Update 9.4 release notes for commits through today. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/832054044f68080eaebccd771e21fdd56824db20">http://git.postgresql.org/pg/commitdiff/832054044f68080eaebccd771e21fdd56824db20</a></li>

<li>Fix some bogus direct uses of realloc(). pg_dump/parallel.c was using realloc() directly with no error check. While the odds of an actual failure here seem pretty low, Coverity complains about it, so fix by using pg_realloc() instead. While looking for other instances, I noticed a couple of places in psql that hadn't gotten the memo about the availability of pg_realloc. These aren't bugs, since they did have error checks, but verbosely inconsistent code is not a good thing. Back-patch as far as 9.3. 9.2 did not have pg_dump/parallel.c, nor did it have pg_realloc available in all frontend code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b13e5c6c0e8a6b797370fb91d207031df5e784a">http://git.postgresql.org/pg/commitdiff/8b13e5c6c0e8a6b797370fb91d207031df5e784a</a></li>

<li>Update comments in find_typedef. These comments don't seem to have been touched in a long time. Make them describe the current implementation rather than what was here last century, and be a bit more explicit about the unreferenced-typedefs issue. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7aa8d9e56c18b1df9d924f144c06d921131a137e">http://git.postgresql.org/pg/commitdiff/7aa8d9e56c18b1df9d924f144c06d921131a137e</a></li>

<li>Don't require bleeding-edge timezone data in timestamptz regression test. The regression test cases added in commits b2cbced9e et al depended in part on the Russian timezone offset changes of Oct 2014. While this is of no particular concern for a default Postgres build, it was possible for a build using --with-system-tzdata to fail the tests if the system tzdata database wasn't au courant. Bjorn Munch and Christoph Berg both complained about this while packaging 9.4rc1, so we probably shouldn't insist on the system tzdata being up-to-date. Instead, make an equivalent test using a zone change that occurred in Venezuela in 2007. With this patch, the regression tests should pass using any tzdata set from 2012 or later. (I can't muster much sympathy for somebody using --with-system-tzdata on a machine whose system tzdata is more than three years out-of-date.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d7af8fbe7349cbebb576459c9b5f54dfcc6216a">http://git.postgresql.org/pg/commitdiff/8d7af8fbe7349cbebb576459c9b5f54dfcc6216a</a></li>

<li>Improve documentation's description of JOIN clauses. In bug #12000, Andreas Kunert complained that the documentation was misleading in saying "FROM T1 CROSS JOIN T2 is equivalent to FROM T1, T2". That's correct as far as it goes, but the equivalence doesn't hold when you consider three or more tables, since JOIN binds more tightly than comma. I added a &lt;note&gt; to explain this, and ended up rearranging some of the existing text so that the note would make sense in context. In passing, rewrite the description of JOIN USING, which was unnecessarily vague, and hadn't been helped any by somebody's reliance on markup as a substitute for clear writing. (Mostly this involved reintroducing a concrete example that was unaccountably removed by commit 032f3b7e166cfa28.) Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8372304e3594a1d67737df779f098d9ae9937603">http://git.postgresql.org/pg/commitdiff/8372304e3594a1d67737df779f098d9ae9937603</a></li>

<li>Add missing case for CustomScan. Per KaiGai Kohei. In passing improve formatting of some code added in commit 30d7ae3c, because otherwise pgindent will make a mess of it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9e0255c6fbedda50aae6aa7479f0c5a8f90b831">http://git.postgresql.org/pg/commitdiff/f9e0255c6fbedda50aae6aa7479f0c5a8f90b831</a></li>

<li>Remove no-longer-needed phony typedefs in genbki.h. Now that we have a policy of hiding varlena catalog fields behind "#ifdef CATALOG_VARLEN", there is no need for their type names to be acceptable to the C compiler. And experimentation shows that it does not matter to pgindent either. (If it did, we'd have problems anyway, since these typedefs are unreferenced so far as the C compiler is concerned, and find_typedef fails to identify such typedefs.) Hence, remove the phony typedefs that genbki.h provided to make some varlena field definitions compilable. In passing, rearrange #define's into what seemed a more logical order. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5111ea9ca049a650b63cdcb2551c330c2f998b1">http://git.postgresql.org/pg/commitdiff/c5111ea9ca049a650b63cdcb2551c330c2f998b1</a></li>

<li>Fix another oversight in CustomScan patch. disuse_physical_tlist() must work for all plan types handled by create_scan_plan(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03e574af5f5d4682ce3ae6dc401ba126c70ce2ea">http://git.postgresql.org/pg/commitdiff/03e574af5f5d4682ce3ae6dc401ba126c70ce2ea</a></li>

<li>Fix another oversight in CustomScan patch. execCurrent.c's search_plan_tree() must recognize a CustomScan on the target relation. This would only be helpful for custom providers that support CurrentOfExpr quals, which is probably a bit far-fetched, but it's not impossible I think. But even without assuming that, we need to recognize a scanned-relation match so that we will properly throw error if the desired relation is being scanned with both a CustomScan and a regular scan (ie, self-join). Also recognize ForeignScanState for similar reasons. Supporting WHERE CURRENT OF on a foreign table is probably even more far-fetched than it is for custom scans, but I think in principle you could do it with postgres_fdw (or another FDW that supports the ctid column). This would be a back-patchable bug fix if existing FDWs handled CurrentOfExpr, but I doubt any do so I won't bother back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/081a6048cff07a83591ebcb08b676a771ae58d2b">http://git.postgresql.org/pg/commitdiff/081a6048cff07a83591ebcb08b676a771ae58d2b</a></li>

<li>Initial code review for CustomScan patch. Get rid of the pernicious entanglement between planner and executor headers introduced by commit 0b03e5951bf0a1a8868db13f02049cf686a82165. Also, rearrange the CustomFoo struct/typedef definitions so that all the typedef names are seen as used by the compiler. Without this pgindent will mess things up a bit, which is not so important perhaps, but it also removes a bizarre discrepancy between the declaration arrangement used for CustomExecMethods and that used for CustomScanMethods and CustomPathMethods. Clean up the commentary around ExecSupportsMarkRestore to reflect the rather large change in its API. Const-ify register_custom_path_provider's argument. This necessitates casting away const in the function, but that seems better than forcing callers of the function to do so (or else not const-ify their method pointer structs, which was sort of the whole point). De-export fix_expr_common. I don't like the exporting of fix_scan_expr or replace_nestloop_params either, but this one surely has got little excuse. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a34fa8ee7cc757671632dc4dcae4f21e8f2e2357">http://git.postgresql.org/pg/commitdiff/a34fa8ee7cc757671632dc4dcae4f21e8f2e2357</a></li>

<li>Remove dead code supporting mark/restore in SeqScan, TidScan, ValuesScan. There seems no prospect that any of this will ever be useful, and indeed it's questionable whether some of it would work if it ever got called; it's certainly not been exercised in a very long time, if ever. So let's get rid of it, and make the comments about mark/restore in execAmi.c less wishy-washy. The mark/restore support for Result nodes is also currently dead code, but that's due to planner limitations not because it's impossible that it could be useful. So I left it in. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adbfab119b308a7e0e6b1305de9be222cfd5c85b">http://git.postgresql.org/pg/commitdiff/adbfab119b308a7e0e6b1305de9be222cfd5c85b</a></li>

<li>Simplify API for initially hooking custom-path providers into the planner. Instead of register_custom_path_provider and a CreateCustomScanPath callback, let's just provide a standard function hook in set_rel_pathlist. This is more flexible than what was previously committed, is more like the usual conventions for planner hooks, and requires less support code in the core. We had discussed this design (including centralizing the set_cheapest() calls) back in March or so, so I'm not sure why it wasn't done like this already. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2ea2285e978d9289084846a3343cef7d261d880">http://git.postgresql.org/pg/commitdiff/c2ea2285e978d9289084846a3343cef7d261d880</a></li>

<li>Rearrange CustomScan API. Make it work more like FDW plans do: instead of assuming that there are expressions in a CustomScan plan node that the core code doesn't know about, insist that all subexpressions that need planner attention be in a "custom_exprs" list in the Plan representation. (Of course, the custom plugin can break the list apart again at executor initialization.) This lets us revert the parts of the patch that exposed setrefs.c and subselect.c processing to the outside world. Also revert the GetSpecialCustomVar stuff in ruleutils.c; that concept may work in future, but it's far from fully baked right now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/447770404cce5ce86174fa4809784c4e5d0a0a76">http://git.postgresql.org/pg/commitdiff/447770404cce5ce86174fa4809784c4e5d0a0a76</a></li>

<li>Fix mishandling of system columns in FDW queries. postgres_fdw would send query conditions involving system columns to the remote server, even though it makes no effort to ensure that system columns other than CTID match what the remote side thinks. tableoid, in particular, probably won't match and might have some use in queries. Hence, prevent sending conditions that include non-CTID system columns. Also, create_foreignscan_plan neglected to check local restriction conditions while determining whether to set fsSystemCol for a foreign scan plan node. This again would bollix the results for queries that test a foreign table's tableoid. Back-patch the first fix to 9.3 where postgres_fdw was introduced. Back-patch the second to 9.2. The code is probably broken in 9.1 as well, but the patch doesn't apply cleanly there; given the weak state of support for FDWs in 9.1, it doesn't seem worth fixing. Etsuro Fujita, reviewed by Ashutosh Bapat, and somewhat modified by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c58101117d25f174c8d8013befdc33c632922d0">http://git.postgresql.org/pg/commitdiff/9c58101117d25f174c8d8013befdc33c632922d0</a></li>

<li>Get rid of redundant production in plpgsql grammar. There may once have been a reason for the intermediate proc_stmts production in the plpgsql grammar, but it isn't doing anything useful anymore, so let's collapse it into proc_sect. Saves some code and probably a small number of nanoseconds per statement list. In passing, correctly alphabetize keyword lists to match pl_scanner.c; note that for "rowtype" vs "row_count", pl_scanner.c must sort on the basis of the lower-case spelling. Noted while fooling with a patch to de-reserve more plpgsql keywords. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2dc3f57726199408902ba87eaaf7b95d1223744">http://git.postgresql.org/pg/commitdiff/e2dc3f57726199408902ba87eaaf7b95d1223744</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add --synchronous option to pg_receivexlog, for more reliable WAL writing. Previously pg_receivexlog flushed WAL data only when WAL file was switched. Then 3dad73e added -F option to pg_receivexlog so that users could control how frequently sync commands were issued to WAL files. It also allowed users to make pg_receivexlog flush WAL data immediately after writing by specifying 0 in -F option. However feedback messages were not sent back immediately even after a flush location was updated. So even if WAL data was flushed in real time, the server could not see that for a while. This commit removes -F option from and adds --synchronous to pg_receivexlog. If --synchronous is specified, like the standby's wal receiver, pg_receivexlog flushes WAL data as soon as there is WAL data which has not been flushed yet. Then it sends back the feedback message identifying the latest flush location to the server. This option is useful to make pg_receivexlog behave as sync standby by using replication slot, for example. Original patch by Furuya Osamu, heavily rewritten by me. Reviewed by Heikki Linnakangas, Alvaro Herrera and Sawada Masahiko. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4f99d20294950576d552dcaf9ce5b9bdc4233a3">http://git.postgresql.org/pg/commitdiff/c4f99d20294950576d552dcaf9ce5b9bdc4233a3</a></li>

<li>Fix pg_receivexlog --slot so that it doesn't prevent the server shutdown. When pg_receivexlog --slot is connecting to the server, at the shutdown of the server, walsender keeps waiting for the last WAL record to be replicated and flushed in pg_receivexlog. But previously pg_receivexlog issued sync command only when WAL file was switched. So there was the case where the last WAL was never flushed and walsender had to keep waiting infinitely. This caused the server shutdown to get stuck. pg_recvlogical handles this problem by calling fsync() when it receives the request of immediate reply from the server. That is, at shutdown, walsender sends the request, pg_recvlogical receives it, flushes the last WAL record, and sends the flush location back to the server. Since walsender can see that the last WAL record is successfully flushed, it can exit cleanly. This commit introduces the same logic as pg_recvlogical has, to pg_receivexlog. Back-patch to 9.4 where pg_receivexlog was changed so that it can use the replication slot. Original patch by Michael Paquier, rewritten by me. Bug report by Furuya Osamu. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f66c20b317578838a39a1de8014c4363bdc98b9a">http://git.postgresql.org/pg/commitdiff/f66c20b317578838a39a1de8014c4363bdc98b9a</a></li>

<li>Fix bug in the test of file descriptor of current WAL file in pg_receivexlog. In pg_receivexlog, in order to check whether the current WAL file is being opened or not, its file descriptor has to be checked against -1 as an invalid value. But, oops, 7900e94 added the incorrect test checking the descriptor against 1. This commit fixes that bug. Back-patch to 9.4 where the bug was added. Spotted by Magnus Hagander 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5f4df7264ec73abda41eb78b81cf430b33f7606">http://git.postgresql.org/pg/commitdiff/d5f4df7264ec73abda41eb78b81cf430b33f7606</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_dump --snapshot option. Allows pg_dump to use a snapshot previously defined by a concurrent session that has either used pg_export_snapshot() or obtained a snapshot when creating a logical slot. When this option is used with parallel pg_dump, the snapshot defined by this option is used and no new snapshot is taken. Simon Riggs and Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be1cc8f46f57a04e69d9e4dd268d34da885fe6eb">http://git.postgresql.org/pg/commitdiff/be1cc8f46f57a04e69d9e4dd268d34da885fe6eb</a></li>

<li>Reduce btree scan overhead for &lt; and &gt; strategies. For &lt;, &lt;=, &gt; and &gt;= strategies, mark the first scan key as already matched if scanning in an appropriate direction. If index tuple contains no nulls we can skip the first Author: Rajeev Rastogi. Reviewer: Haribabu Kommi. Rework of the code and comments by Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/606c0123d627b37d5ac3f7c2c97cd715dde7842f">http://git.postgresql.org/pg/commitdiff/606c0123d627b37d5ac3f7c2c97cd715dde7842f</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid file descriptor leak in pg_test_fsync. This can cause problems on Windows, where files that are still open can't be unlinked. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0165553619107f990cb7872f4a9573598319581">http://git.postgresql.org/pg/commitdiff/a0165553619107f990cb7872f4a9573598319581</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix suggested layout for PGXS makefile. Custom rules must come after pgxs inclusion, not before, because any rule added before pgxs will break the default 'all' target. Author: C&eacute;dric Villemain &lt;cedric@2ndquadrant.fr&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8dc626defec23016dd5988208d8704b858b9d21d">http://git.postgresql.org/pg/commitdiff/8dc626defec23016dd5988208d8704b858b9d21d</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make psql's \sf and \ef honor ECHO_HIDDEN. These commands were calling the database direct rather than calling PSQLexec like other slash commands that needed database data. The code is also changed not to pass the connection as a parameter to the helper functions. It's available in a global variable, and that's what PSQLexec uses. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4d28175a13d47a747b33e87c0f808b2ef57c0cd">http://git.postgresql.org/pg/commitdiff/e4d28175a13d47a747b33e87c0f808b2ef57c0cd</a></li>

<li>Fix an error in psql that overcounted output lines. This error counted the first line of a cell as "extra". The effect was to cause far too frequent invocation of the pager. In most cases this can be worked around (for example, by using the "less" pager with the -F flag), so don't backpatch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4077fb4d1d34ad04dfb95ba676c2b43ea1f1da53">http://git.postgresql.org/pg/commitdiff/4077fb4d1d34ad04dfb95ba676c2b43ea1f1da53</a></li>

<li>Rework echo_hidden for \sf and \ef from commit e4d2817. PSQLexec's error reporting turns out to be too verbose for this case, so revert to using PQexec instead with minimal error reporting. Prior to calling PQexec, we call a function that mimics just the echo_hidden piece of PSQLexec. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eca2b9ba3e1e65c2ac880578bfb3cbeed1cb1d26">http://git.postgresql.org/pg/commitdiff/eca2b9ba3e1e65c2ac880578bfb3cbeed1cb1d26</a></li>

<li>Fix memory leaks introduced by commit eca2b9b 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02d5ab6a86aa941109cecd9e6ebe73a67e8bf545">http://git.postgresql.org/pg/commitdiff/02d5ab6a86aa941109cecd9e6ebe73a67e8bf545</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Detect PG_PRINTF_ATTRIBUTE automatically. This eliminates gobs of "unrecognized format function type" warnings under MinGW compilers predating GCC 4.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b779168ffe330d137b8b4329a7710c8bf1f7e661">http://git.postgresql.org/pg/commitdiff/b779168ffe330d137b8b4329a7710c8bf1f7e661</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Etsuro Fujita sent in another revision of a patch to allow foreign tables to participate in table inheritance hierarchies.</li>

<li>Jeff Davis and Tomas Vondra traded patches to do better memory accounting, in part as infrastructure for a memory-bounded HashAgg.</li>

<li>Michael Paquier sent in a patch to fix CLOBBER_CACHE_ALWAYS.</li>

<li>Michael Paquier sent in another revision of a patch to track number of files marked as ready for archiving in pg_stat_archiver.</li>

<li>SAWADA Masahiko sent in another revision of a patch to implement REINDEX SCHEMA, in this case as an option to reindexdb.</li>

<li>Heikki Linnakangas sent in two PoC patches to deal with a performance problem in PageRepairFragmentation.</li>

<li>Petr (PJMODOS) Jelinek and Simon Riggs traded patches to add a shutdown_at_recovery_target option to recovery.conf.</li>

<li>Dimitri Fontaine sent in three more revisions of a patch to add "table rewrite" as an event which can fire an event trigger.</li>

<li>Adam Brightwell sent in a patch to add int64-to-int8 mapping in Catalog.pm.</li>

<li>Magnus Hagander sent in another revision of a patch to add a pg_stat_ssl view.</li>

<li>Aaron W. Swenson sent in a patch to replace configure.in with configure dot ac.</li>

<li>Heikki Linnakangas sent in a patch to add some more tests for WALs.</li>

<li>Peter Geoghegan sent in two revisions of a patch to create an amcheck utility, a generalization of his previous btreecheck.</li>

<li>Michael Paquier sent in a patch to uppercase some SQL keywords in the BRIN documents.</li>

<li>Amit Kapila sent in another revision of a patch to fix some infelicities between pg_basebackup and Windows.</li>

<li>Peter Eisentraut sent in a series of patches which: Fix SHLIB_PREREQS use in contrib, allowing PGXS builds, allow the user to set VPATH directly, and clean up some makefile changes that weren't needed.</li>

<li>Abhijit Menon-Sen sent in a patch to use slice-by-8 for CRC, which increased the performance of that operation by a factor of 4+.</li>

<li>Adam Brightwell sent in another revision of a patch to fix Catalog.pm for role attributes.</li>

<li>Laurenz Albe sent in a patch to disallow changing functions which are part of an index definition.</li>

<li>Michael Paquier sent in a patch to enable GIN code managing entry insertion not to distinguish fresh from old indexes.</li>

<li>Robert Haas sent in another revision of a patch to add infrastructure to save and restore GUC values.</li>

<li>Michael Paquier sent in a patch to add fillfactor as storage parameter for GIN indexes.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to track commit timestamps.</li>

<li>Adam Brightwell sent in another revision of a patch to clean up superuser shortcuts.</li>

<li>Alexander Shulgin sent in another revision of a patch to turn recovery.conf into GUCs.</li>

<li>&Aacute;lvaro Herrera added some opfamilies for BRIN indexes which should help make them more useful.</li>

<li>Marko (johto) Tiikkaja sent in two revisions of a patch to make the HINTs more useful for certain types common mistakes in UPDATE.</li>

<li>Amit Kapila sent in another revision of a patch to parallelize vacuumdb.</li>

<li>David Rowley sent in another revision of a patch to support SEMI and ANTI join removal in certain cases.</li>

<li>Tom Lane sent in a patch to remove 17 of PL/pgsql's reserved words.</li>

</ul>