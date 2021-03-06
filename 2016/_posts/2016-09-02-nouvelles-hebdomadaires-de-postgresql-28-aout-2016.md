---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 août 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/09/02/Nouvelles-hebdomadaires-de-PostgreSQL-28-août-2016"
---


<p>[ndt: <a href="http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">MeetUp</a> en cours d'organisation à Nantes.]</p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>LuaPgSQL-1.6.1, un <em>binding</em> Lua compatible libpq&nbsp;: <a target="_blank" href="https://github.com/arcapos/luapgsql">https://github.com/arcapos/luapgsql</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-08/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PostgresOpen 2016 aura lieu &agrave; Dallas (Texas, USA) du 13 au 16 septembre&nbsp;: <a target="_blank" href="https://2016.postgresopen.org/">https://2016.postgresopen.org/</a></li>

<li>Session PostgreSQL le 22 septembre 2016 &agrave; Lyon (France)&nbsp;: <a target="_blank" href="http://blog.dalibo.com/2016/05/13/CFP-pgsession-lyon.html">http://blog.dalibo.com/2016/05/13/CFP-pgsession-lyon.html</a></li>

<li><em>Postgres Vision 2016</em> aura lieu &agrave; San Francisco du 11 au 13 octobre 2016&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>La <em>PostgreSQL Conference Europe 2016</em> aura lieu &agrave; Tallin, Estonie, du 1er au 4 novembre 2016. Les inscriptions sp&eacute;ciales &laquo;&nbsp;l&egrave;ve-t&ocirc;t&nbsp;&raquo; sont ouvertes jusqu'au 14 septembre&nbsp;: <a target="_blank" href="http://2016.pgconf.eu/registration/">http://2016.pgconf.eu/registration/</a></li>

<li>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></li>

<li>CHAR(16) aura lieu &agrave; New York le 6 d&eacute;cembre 2016. L'appel &agrave; conf&eacute;renciers court jusqu'au 13 septembre, minuit (EDT)&nbsp;: <a target="_blank" href="http://charconference.org/">http://charconference.org/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160828231710.GA19651@fetter.org">http://www.postgresql.org/message-id/20160828231710.GA19651@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Noah Misch pushed:</p>

<ul>

<li>Retire escapeConnectionParameter(). It is redundant with appendConnStrVal(), which became an extern function in commit 41f18f021a0882eccbeca62e2ed4b66c6b96e9c9. This changes the handling of out-of-memory and of certain inputs for which quoting is optional, but pg_basebackup has no need for unusual treatment thereof. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9132c014290d02435999c81892fa8b0b384497d8">http://git.postgresql.org/pg/commitdiff/9132c014290d02435999c81892fa8b0b384497d8</a></li>

<li>Build libpgfeutils before src/bin/pg_basebackup programs. Oversight in commit 9132c014290d02435999c81892fa8b0b384497d8. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03951987283b99d5002227ab89f896bab772b7ec">http://git.postgresql.org/pg/commitdiff/03951987283b99d5002227ab89f896bab772b7ec</a></li>

<li>Build libpgfeutils before pg_isready. Every program having -lpgfeutils in LDFLAGS must have this dependency, whether or not the program uses a libpgfeutils symbol. Back-patch to 9.6, where libpgfeutils was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6418a0919c2c161cf2ed65bc930a06c9c2d85da">http://git.postgresql.org/pg/commitdiff/b6418a0919c2c161cf2ed65bc930a06c9c2d85da</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>initdb now needs submake-libpq and submake-libpgfeutils. More fallout from commit a00c58314. Pointed out by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/234309fa87739f7a3ac99de815d181b50f2542e7">http://git.postgresql.org/pg/commitdiff/234309fa87739f7a3ac99de815d181b50f2542e7</a></li>

<li>Refactor some network.c code to create cidr_set_masklen_internal(). Merge several copies of "copy an inet value and adjust the mask length" code to create a single, conveniently C-callable function. This function is exported for future use by inet SPGiST support, but it's good cleanup anyway since we had three slightly-different-for-no-good-reason copies. (Extracted from a larger patch, to separate new code from refactoring of old code) Emre Hasegeli <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b405b3e04779fc0a026c9c6ac3e06194948b253">http://git.postgresql.org/pg/commitdiff/7b405b3e04779fc0a026c9c6ac3e06194948b253</a></li>

<li>Improve SP-GiST opclass API to better support unlabeled nodes. Previously, the spgSplitTuple action could only create a new upper tuple containing a single labeled node. This made it useless for opclasses that prefer to work with fixed sets of nodes (labeled or otherwise), which meant that restrictive prefixes could not be used with such node definitions. Change the output field set for the choose() method to allow it to specify any valid node set for the new upper tuple, and to specify which of these nodes to place the modified lower tuple in. In addition to its primary use for fixed node sets, this feature could allow existing opclasses that use variable node sets to skip a separate spgAddNode action when splitting a tuple, by setting up the node needed for the incoming value as part of the spgSplitTuple action. However, care would have to be taken to add the extra node only when it would not make the tuple bigger than before. (spgAddNode can enlarge the tuple, spgSplitTuple can't.) This is a prerequisite for an upcoming SP-GiST inet opclass, but is being committed separately to increase the visibility of the API change. In passing, improve the documentation about the traverse-values feature that was added by commit ccd6eb49a. Emre Hasegeli, with cosmetic adjustments and documentation rework by me Discussion: &lt;CAE2gYzxtth9qatW_OAqdOjykS0bxq7AYHLuyAQLPgT7H9ZU0Cw@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2ddee63b43b27d6c6af169342af10db19bd3a1a">http://git.postgresql.org/pg/commitdiff/d2ddee63b43b27d6c6af169342af10db19bd3a1a</a></li>

<li>Create an SP-GiST opclass for inet/cidr. This seems to offer significantly better search performance than the existing GiST opclass for inet/cidr, at least on data with a wide mix of network mask lengths. (That may suggest that the data splitting heuristics in the GiST opclass could be improved.) Emre Hasegeli, with mostly-cosmetic adjustments by me Discussion: &lt;CAE2gYzxtth9qatW_OAqdOjykS0bxq7AYHLuyAQLPgT7H9ZU0Cw@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77e2906821e2aec3c0807866a84c2934feeac8be">http://git.postgresql.org/pg/commitdiff/77e2906821e2aec3c0807866a84c2934feeac8be</a></li>

<li>Fix network_spgist.c build failures from missing AF_INET definition. AF_INET is apparently defined in something that's pulled in automatically on Linux, but the buildfarm says that's not true everywhere. Comparing to network_gist.c suggests that including &lt;sys/socket.h&gt; ought to fix it, and the POSIX standard concurs. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32909a57f9fb131eab8971a6d9845b55bbcb9091">http://git.postgresql.org/pg/commitdiff/32909a57f9fb131eab8971a6d9845b55bbcb9091</a></li>

<li>Suppress compiler warnings in non-cassert builds. With Asserts off, these variables are set but never used, resulting in warnings from pickier compilers. Fix that with our standard solution. Per report from Jeff Janes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71e006f031310f77ab72881c47a7d8f41df748bb">http://git.postgresql.org/pg/commitdiff/71e006f031310f77ab72881c47a7d8f41df748bb</a></li>

<li>Fix improper repetition of previous results from a hashed aggregate. ExecReScanAgg's check for whether it could re-use a previously calculated hashtable neglected the possibility that the Agg node might reference PARAM_EXEC Params that are not referenced by its input plan node. That's okay if the Params are in upper tlist or qual expressions; but if one appears in aggregate input expressions, then the hashtable contents need to be recomputed when the Param's value changes. To avoid unnecessary performance degradation in the case of a Param that isn't within an aggregate input, add logic to the planner to determine which Params are within aggregate inputs. This requires a new field in struct Agg, but fortunately we never write plans to disk, so this isn't an initdb-forcing change. Per report from Jeevan Chalke. This has been broken since forever, so back-patch to all supported branches. Andrew Gierth, with minor adjustments by me Report: &lt;CAM2+6=VY8ykfLT5Q8vb9B6EbeBk-NGuLbT6seaQ+Fq4zXvrDcA@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c00fad2864350508f666da1a2c04e0cbe9cbf58">http://git.postgresql.org/pg/commitdiff/2c00fad2864350508f666da1a2c04e0cbe9cbf58</a></li>

<li>Fix small query-lifespan memory leak in bulk updates. When there is an identifiable REPLICA IDENTITY index on the target table, heap_update leaks the id_attrs bitmapset. That's not many bytes, but it adds up over enough rows, since the code typically runs in a query-lifespan context. Bug introduced in commit e55704d8b, which did a rather poor job of cloning the existing use-pattern for RelationGetIndexAttrBitmap(). Per bug #14293 from Zhou Digoal. Back-patch to 9.4 where the bug was introduced. Report: &lt;20160824114320.15676.45171@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae4760d667c71924932ab32e14996b5be1831fc6">http://git.postgresql.org/pg/commitdiff/ae4760d667c71924932ab32e14996b5be1831fc6</a></li>

<li>Fix instability in parallel regression tests. Commit f0c7b789a added a test case in case.sql that creates and then drops both an '=' operator and the type it's for. Given the right timing, that can cause a "cache lookup failed for type" failure in concurrent sessions, which see the '=' operator as a potential match for '=' in a query, but then the type is gone by the time they inquire into its properties. It might be nice to make that behavior more robust someday, but as a back-patchable solution, adjust the new test case so that the operator is never visible to other sessions. Like the previous commit, back-patch to all supported branches. Discussion: &lt;5983.1471371667@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2533ff0aa518d4d31391db279cf08e538fae5931">http://git.postgresql.org/pg/commitdiff/2533ff0aa518d4d31391db279cf08e538fae5931</a></li>

<li>Fix logic for adding "parallel worker" context line to worker errors. The previous coding here was capable of adding a "parallel worker" context line to errors that were not, in fact, returned from a parallel worker. Instead of using an errcontext callback to add that annotation, just paste it onto the message by hand; this looks uglier but is more reliable. Discussion: &lt;19757.1472151987@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbf28b6b52c269188262a87247adb2c359acd6c5">http://git.postgresql.org/pg/commitdiff/fbf28b6b52c269188262a87247adb2c359acd6c5</a></li>

<li>Fix assorted small bugs in ThrowErrorData(). Copy the palloc'd strings into the correct context, ie ErrorContext not wherever the source ErrorData is. This would be a large bug, except that it appears that all catchers of thrown errors do either EmitErrorReport or CopyErrorData before doing anything that would cause transient memory contexts to be cleaned up. Still, it's wrong and it will bite somebody someday. Fix failure to copy cursorpos and internalpos. Utter the appropriate incantations involving recursion_depth, so that we'll behave sanely if we get an error inside pstrdup. (In general, the body of this function ought to act like, eg, errdetail().) Per code reading induced by Jakob Egger's report. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8529036b53298c0555670b4a81ed7349c44aeeb4">http://git.postgresql.org/pg/commitdiff/8529036b53298c0555670b4a81ed7349c44aeeb4</a></li>

<li>Put static forward declarations in elog.c back into same order as code. The guiding principle for the last few patches in this area apparently involved throwing darts. Cosmetic only, but back-patch to 9.6 because there is no reason for 9.6 and HEAD to diverge yet in this file. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45a36e68539dcd7095a257b49f6f38ae77dec30d">http://git.postgresql.org/pg/commitdiff/45a36e68539dcd7095a257b49f6f38ae77dec30d</a></li>

<li>Fix potential memory leakage from HandleParallelMessages(). HandleParallelMessages leaked memory into the caller's context. Since it's called from ProcessInterrupts, there is basically zero certainty as to what CurrentMemoryContext is, which means we could be leaking into long-lived contexts. Over the processing of many worker messages that would grow to be a problem. Things could be even worse than just a leak, if we happened to service the interrupt while ErrorContext is current: elog.c thinks it can reset that on its own whim, possibly yanking storage out from under HandleParallelMessages. Give HandleParallelMessages its own dedicated context instead, which we can reset during each call to ensure there's no accumulation of wasted memory. Discussion: &lt;16610.1472222135@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/78dcd027e8f7ed213f69da932853dc4b7cb9cb44">http://git.postgresql.org/pg/commitdiff/78dcd027e8f7ed213f69da932853dc4b7cb9cb44</a></li>

<li>Add a nonlocalized version of the severity field to client error messages. This has been requested a few times, but the use-case for it was never entirely clear. The reason for adding it now is that transmission of error reports from parallel workers fails when NLS is active, because pq_parse_errornotice() wrongly assumes that the existing severity field is nonlocalized. There are other ways we could have fixed that, but the other options were basically kluges, whereas this way provides something that's at least arguably a useful feature along with the bug fix. Per report from Jakob Egger. Back-patch into 9.6, because otherwise parallel query is essentially unusable in non-English locales. The problem exists in 9.5 as well, but we don't want to risk changing on-the-wire behavior in 9.5 (even though the possibility of new error fields is specifically called out in the protocol document). It may be sufficient to leave the issue unfixed in 9.5, given the very limited usefulness of pq_parse_errornotice in that version. Discussion: &lt;A88E0006-13CB-49C6-95CC-1A77D717213C@eggerapps.at&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26fa446da64716f12ab3a623434c644fcb344b2e">http://git.postgresql.org/pg/commitdiff/26fa446da64716f12ab3a623434c644fcb344b2e</a></li>

<li>Add macros to make AllocSetContextCreate() calls simpler and safer. I found that half a dozen (nearly 5%) of our AllocSetContextCreate calls had typos in the context-sizing parameters. While none of these led to especially significant problems, they did create minor inefficiencies, and it's now clear that expecting people to copy-and-paste those calls accurately is not a great idea. Let's reduce the risk of future errors by introducing single macros that encapsulate the common use-cases. Three such macros are enough to cover all but two special-purpose contexts; those two calls can be left as-is, I think. While this patch doesn't in itself improve matters for third-party extensions, it doesn't break anything for them either, and they can gradually adopt the simplified notation over time. In passing, change TopMemoryContext to use the default allocation parameters. Formerly it could only be extended 8K at a time. That was probably reasonable when this code was written; but nowadays we create many more contexts than we did then, so that it's not unusual to have a couple hundred K in TopMemoryContext, even without considering various dubious code that sticks other things there. There seems no good reason not to let it use growing blocks like most other contexts. Back-patch to 9.6, mostly because that's still close enough to HEAD that it's easy to do so, and keeping the branches in sync can be expected to avoid some future back-patching pain. The bugs fixed by these changes don't seem to be significant enough to justify fixing them further back. Discussion: &lt;21072.1472321324@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea268cdc9a2631da4a5748b00059a9fd43470d0e">http://git.postgresql.org/pg/commitdiff/ea268cdc9a2631da4a5748b00059a9fd43470d0e</a></li>

<li>Update 9.6 release notes through today. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a6f0dc701b2f84839761783e87c49d43cd3e31df">http://git.postgresql.org/pg/commitdiff/a6f0dc701b2f84839761783e87c49d43cd3e31df</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Run select_parallel test by itself. Remove the plpgsql wrapping that hides the context. So now the test will fail if the work doesn't actually happen in a parallel worker. Run the test in its own test group to ensure it won't run out of resources for that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9472d72561d285e8c138f3e1276f3110f55e515">http://git.postgresql.org/pg/commitdiff/f9472d72561d285e8c138f3e1276f3110f55e515</a></li>

<li>doc: Fix XSLT speedup with older upstream stylesheet versions. From: Alexander Law &lt;exclusion@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e4cc1fc51c77b3af22d8ff7163565c5ba96f310">http://git.postgresql.org/pg/commitdiff/0e4cc1fc51c77b3af22d8ff7163565c5ba96f310</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Improve header comment for LockHasWaitersRelation. Dimitry Ivanov spotted a typo, and I added a bit of wordsmithing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af5743851d7d526fadfeb9726e2b3d8b1fc5026d">http://git.postgresql.org/pg/commitdiff/af5743851d7d526fadfeb9726e2b3d8b1fc5026d</a></li>

<li>Fix possible sorting error when aborting use of abbreviated keys. Due to an error in the abbreviated key abort logic, the most recently processed SortTuple could be incorrectly marked NULL, resulting in an incorrect final sort order. In the worst case, this could result in a corrupt btree index, which would need to be rebuild using REINDEX. However, abbrevation doesn't abort very often, not all data types use it, and only one tuple would end up in the wrong place, so the practical impact of this mistake may be somewhat limited. Report and patch by Peter Geoghegan. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/008c4135ccf67e74239a17a85f912d1a51b6349e">http://git.postgresql.org/pg/commitdiff/008c4135ccf67e74239a17a85f912d1a51b6349e</a></li>

<li>Remove duplicate word from comment. Erik Rijkers <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff36700c3ba2180047b4103de440ffaa34889b72">http://git.postgresql.org/pg/commitdiff/ff36700c3ba2180047b4103de440ffaa34889b72</a></li>

<li>Add txid_current_ifassigned(). Add a variant of txid_current() that returns NULL if no transaction ID is assigned. This version can be used even on a standby server, although it will always return NULL since no transaction IDs can be assigned during recovery. Craig Ringer, per suggestion from Jim Nasby. Reviewed by Petr Jelinek and by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86f31695f3b54211226949de519063bbf248e8c4">http://git.postgresql.org/pg/commitdiff/86f31695f3b54211226949de519063bbf248e8c4</a></li>

<li>Remove duplicate function prototype. Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19998730aea97137e2516af0516c683a1261ba1f">http://git.postgresql.org/pg/commitdiff/19998730aea97137e2516af0516c683a1261ba1f</a></li>

<li>Extend dsm API with a new function dsm_unpin_segment. If you have previously pinned a segment and decide that you don't actually want to keep it around until shutdown, this new API lets you remove the pin. This is pretty trivial except on Windows, where it requires closing the duplicate handle that was used to implement the pin. Thomas Munro and Amit Kapila, reviewed by Amit Kapila and by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fda682e542c9acd368588e50a1993fecd3b73e2">http://git.postgresql.org/pg/commitdiff/0fda682e542c9acd368588e50a1993fecd3b73e2</a></li>

<li>postgres_fdw: Cosmetic cleanup. Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcb7a54bd1cdbf5cca9549e8485cd34a28c7cf87">http://git.postgresql.org/pg/commitdiff/dcb7a54bd1cdbf5cca9549e8485cd34a28c7cf87</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>doc: fix typo in recent patch. Reported-by: Jeff Janes Backpatch-through: 9.6 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2e016f8d55ee029c5d6ec853ff6802aaf49fb0a">http://git.postgresql.org/pg/commitdiff/f2e016f8d55ee029c5d6ec853ff6802aaf49fb0a</a></li>

<li>doc: fix incorrect 'literal' tags. Discussion: dcc4113d-1eda-4f60-d1c5-f50eee160bad@gmail.com. Author: Alexander Law &lt;exclusion@gmail.com&gt;. Backpatch-through: 9.6 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff066481b0485b1a4e414de3abcaae0bda02b1e1">http://git.postgresql.org/pg/commitdiff/ff066481b0485b1a4e414de3abcaae0bda02b1e1</a></li>

<li>doc: more replacement of &lt;literal&gt; with something better. Reported-by: Alexander Law Author: Alexander Law Backpatch-through: 9.6 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca9cb940d23dc8869a635fa27a08e60837b17c07">http://git.postgresql.org/pg/commitdiff/ca9cb940d23dc8869a635fa27a08e60837b17c07</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Remove unnecessary #include. Accidentally added in 8b65cf4c5edabdcae45ceaef7b9ac236879aae50. Pointed out by &Aacute;lvaro Herrera <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cd3864075622b203d530f1a710818777859304e">http://git.postgresql.org/pg/commitdiff/5cd3864075622b203d530f1a710818777859304e</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Support OID system column in postgres_fdw. You can use ALTER FOREIGN TABLE SET WITH OIDS on a foreign table, but the oid column read out as zeros, because the postgres_fdw didn't know about it. Teach postgres_fdw how to fetch it. Etsuro Fujita, with an additional test case by me. Discussion: &lt;56E90A76.5000503@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae025a15988f5491903cd3a2075f308c2773f711">http://git.postgresql.org/pg/commitdiff/ae025a15988f5491903cd3a2075f308c2773f711</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&euml;l Paquier sent in another revision of a patch to avoid crashes in pg_basebackup.</p>

<p>Micha&euml;l Paquier sent in a patch to clean up parts of the make system.</p>

<p>Heikki Linnakangas sent in a patch to fix a race condition in GetOldestActiveTransactionId().</p>

<p>Tom Lane sent in a patch to arrange better locale-specific-character-class handling for regexps.</p>

<p>Micha&euml;l Paquier sent in a patch to disallow \r and \n characters in database and role names.</p>

<p>Craig Ringer sent in another revision of a patch to add pipelining (batch) support for libpq.</p>

<p>Gabriele Bartolini, Micha&euml;l Paquier, and Simon Riggs traded patches to fix an issue where pg_receivexlog does not report flush position with --synchronous.</p>

<p>Thomas Munro sent in a patch to fix an error in Linux's fallocate() that could a bus error.</p>

<p>Amit Kapila and Thomas Munro traded patches to add dsm_unpin_segment().</p>

<p>Craig Ringer sent in two more revisions of a patch to add txid_status(bigint) for transaction traceability.</p>

<p>Heikki Linnakangas sent in another revision of a patch to add CSN-based snapshots.</p>

<p>Ashutosh Sharma sent in another revision of a patch to add some tests for hash index coverage.</p>

<p>Amit Kapila sent in two more revisions of a patch to add WAL logging for hash indexes.</p>

<p>Aleksander Alekseev and Heikki Linnakangas traded patches to fix the RBTree iteration interface.</p>

<p>Kuntal Ghosh sent in two more revisions of a patch to add a WAL consistency check facility.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to track wait events for latches.</p>

<p>Fabien COELHO sent in a patch to fix pgbench stats when using \sleep.</p>

<p>Stephen Frost sent in another revision of a patch to remove all superuser() checks from pgstattuple.</p>

<p>Masahiko Sawada sent in a WIP patch to add block level parallel vacuum.</p>

<p>Micha&euml;l Paquier sent in two more revisions of a patch to add LSN as a recovery target.</p>

<p>Pavel Stehule sent in two more revisions of a patch to add xmltable().</p>

<p>Mart&iacute;n Marqu&eacute;s and Micha&euml;l Paquier traded patches to fix some issues where pg_dump would dump objects created by extensions separately from the extensions themselves.</p>

<p>Tom Lane sent in a patch to wire into the planner the assumption that VALUES() provided are distinct.</p>

<p>Dagfinn Ilmari Manns&aring;ker sent in another revision of a patch to add ALTER TYPE RENAME VALUE.</p>

<p>Andrew Gierth sent in a patch to fix an issue with some LATERAL queries.</p>

<p>Masahiko Sawada sent in another revision of a patch to make lazy_scan_heap faster.</p>

<p>Artur Zakirov sent in two more revisions of a patch to fix a bug in to_timestamp().</p>

<p>Petr Jelinek sent in another revision of a patch to implement logical replication.</p>

<p>Takayuki Tsunakawa sent in a patch to fix an issue that could cause cascaded replicas to stick.</p>

<p>Mithun Cy sent in another revision of a patch to implement failover at the libpq connect level.</p>

<p>Masahiko Sawada sent in a patch to support 2PC with foreign servers and use that infrastructure to update the PostgreSQL FDW.</p>

<p>Amit Langote sent in another revision of a patch to add declarative partitioning.</p>

<p>Dilip Kumar sent in another revision of a patch to fix a cache lookup failure.</p>

<p>Brandur sent in a patch to add SortSupport for Postgres' macaddr.</p>

<p>Tom Lane sent in a patch to add a nonlocalized error severity diagnostic.</p>

<p>Andreas Karlsson sent in a patch to remove OpenSSL &lt; 0.9.8 on the grounds that it's no longer supported even by OpenSSL, and supporting it breaks newer versions.</p>

<p>Andres Freund sent in another revision of a patch to implement targetlist SRFs using ROWS FROM().</p>

<p>Joe Conway sent in another revision of a patch to add some RLS-related docs.</p>