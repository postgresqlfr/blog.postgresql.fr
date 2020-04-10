---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 octobre 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-10-28-nouvelles-hebdomadaires-de-postgresql-25-octobre-2015 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix incorrect handling of lookahead constraints in pg_regprefix(). pg_regprefix was doing nothing with lookahead constraints, which would be fine if it were the right kind of nothing, but it isn't: we have to terminate our search for a fixed prefix, not just pretend the LACON arc isn't there. Otherwise, if the current state has both a LACON outarc and a single plain-color outarc, we'd falsely conclude that the color represents an addition to the fixed prefix, and generate an extracted index condition that restricts the indexscan too much. (See added regression test case.) Terminating the search is conservative: we could traverse the LACON arc (thus assuming that the constraint can be satisfied at runtime) and then examine the outarcs of the linked-to state. But that would be a lot more work than it seems worth, because writing a LACON followed by a single plain character is a pretty silly thing to do. This makes a difference only in rather contrived cases, but it's a bug, so back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f1e642d50b30ec5c9604b6095073012a9a73e93">http://git.postgresql.org/pg/commitdiff/9f1e642d50b30ec5c9604b6095073012a9a73e93</a></li>

<li>Fix incorrect translation of minus-infinity datetimes for json/jsonb. Commit bda76c1c8cfb1d11751ba6be88f0242850481733 caused both plus and minus infinity to be rendered as "infinity", which is not only wrong but inconsistent with the pre-9.4 behavior of to_json(). Fix that by duplicating the coding in date_out/timestamp_out/timestamptz_out more closely. Per bug #13687 from Stepan Perlov. Back-patch to 9.4, like the previous commit. In passing, also re-pgindent json.c, since it had gotten a bit messed up by recent patches (and I was already annoyed by indentation-related problems in back-patching this fix ...) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4355425831fe8f6a68095393e3628cb30d06b3f">http://git.postgresql.org/pg/commitdiff/d4355425831fe8f6a68095393e3628cb30d06b3f</a></li>

<li>Remove redundant CREATEUSER/NOCREATEUSER options in CREATE ROLE et al. Once upon a time we did not have a separate CREATEROLE privilege, and CREATEUSER effectively meant SUPERUSER. When we invented CREATEROLE (in 8.1) we also added SUPERUSER so as to have a less confusing keyword for this role property. However, we left CREATEUSER in place as a deprecated synonym for SUPERUSER, because of backwards-compatibility concerns. It's still there and is still confusing people, as for example in bug #13694 from Justin Catterson. 9.6 will be ten years or so later, which surely ought to be long enough to end the deprecation and just remove these old keywords. Hence, do so. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d371bebd3d16949171282c8252dfd6f82d2e7378">http://git.postgresql.org/pg/commitdiff/d371bebd3d16949171282c8252dfd6f82d2e7378</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Eschew "RESET statement_timeout" in tests. Instead, use transaction abort. Given an unlucky bout of latency, the timeout would cancel the RESET itself. Buildfarm members gharial, lapwing, mereswine, shearwater, and sungazer witness that. Back-patch to 9.1 (all supported versions). The query_canceled test still could timeout before entering its subtransaction; for whatever reason, that has yet to happen on the buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e3b4d9d40244c037bbc6e182ea3fabb9347d482">http://git.postgresql.org/pg/commitdiff/8e3b4d9d40244c037bbc6e182ea3fabb9347d482</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Remove obsolete comment. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d53f808e7eacca1036f9f6b5a271a6269949445d">http://git.postgresql.org/pg/commitdiff/d53f808e7eacca1036f9f6b5a271a6269949445d</a></li>

<li>Be a bit more rigorous about how we cache strcoll and strxfrm results. Commit 0e57b4d8bd9674adaf5747421b3255b85e385534 contained some clever logic that attempted to make sure that we couldn't get confused about whether the last thing we cached was a strcoll() result or a strxfrm() result, but it wasn't quite clever enough, because we can perform further abbreviations after having already performed some comparisons. Introduce an explicit flag in the hopes of making this watertight. Peter Geoghegan, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5be94a9eb15a03d8dbc4a5b52760c8776eb3525e">http://git.postgresql.org/pg/commitdiff/5be94a9eb15a03d8dbc4a5b52760c8776eb3525e</a></li>

<li>Put back ssl_renegotiation_limit parameter, but only allow 0. Per a report from Shay Rojansky, Npgsql sends ssl_renegotiation_limit=0 in the startup packet because it does not support renegotiation; other clients which have not attempted to support renegotiation might well behave similarly. The recent removal of this parameter forces them to break compatibility with either current PostgreSQL versions, or previous ones. Per discussion, the best solution is to accept the parameter but only allow a value of 0. Shay Rojansky, edited a little by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84ef9c596e0ef7476cd995349767204022610466">http://git.postgresql.org/pg/commitdiff/84ef9c596e0ef7476cd995349767204022610466</a></li>

<li>Remove duplicate word. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc486fb96968a519cc6e0d90654b46738026ee5c">http://git.postgresql.org/pg/commitdiff/dc486fb96968a519cc6e0d90654b46738026ee5c</a></li>

<li>Fix incorrect comment in plannodes.h Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1c466c5dd75002eb482b10fd0cafef7c6e3f697">http://git.postgresql.org/pg/commitdiff/a1c466c5dd75002eb482b10fd0cafef7c6e3f697</a></li>

<li>Add header comments to execParallel.c and nodeGather.c. Patch by me, per a note from Simon Riggs. Reviewed by Amit Kapila and Amit Langote. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a219fa15bf802d69621e71c43d1a09515bcdc50">http://git.postgresql.org/pg/commitdiff/1a219fa15bf802d69621e71c43d1a09515bcdc50</a></li>

<li>Fix a couple of bugs in recent parallelism-related commits. Commit 816e336f12ecabdc834d4cc31bcf966b2dd323dc added the wrong error check to async.c; sending restrictions is restricted to the leader, not altogether unsafe. Commit 3bd909b220930f21d6e15833a17947be749e7fde added ExecShutdownNode to traverse the planstate tree and call shutdown functions, but made a Gather node, the only node that actually has such a function, abort the tree traversal, which is wrong. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bde39eed0cafb82bc94c40e95d96b5cf47b6f719">http://git.postgresql.org/pg/commitdiff/bde39eed0cafb82bc94c40e95d96b5cf47b6f719</a></li>

<li>Fix typos in comments. CharSyam <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31ba62ce32940146b6c818e9bf30b2555797c43d">http://git.postgresql.org/pg/commitdiff/31ba62ce32940146b6c818e9bf30b2555797c43d</a></li>

<li>shm_mq: Fix failure to notice a dead counterparty when nowait is used. The shm_mq mechanism was intended to optionally notice when the process on the other end of the queue fails to attach to the queue. It does this by allowing the user to pass a BackgroundWorkerHandle; if the background worker in question is launched and dies without attaching to the queue, then we know it never will. This logic works OK in blocking mode, but when called with nowait = true we fail to notice that this has happened due to an asymmetry in the logic. Repair. Reported off-list by Rushabh Lathia. Patch by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2ccb5f4e6c81305386edb34daf7d1d1e1ee112a">http://git.postgresql.org/pg/commitdiff/b2ccb5f4e6c81305386edb34daf7d1d1e1ee112a</a></li>

<li>Add two missing cases to ATWrongRelkindError. This way, we produce a better error message if someone tries to do something like ALTER INDEX .. ALTER COLUMN .. SET STORAGE. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/872101bede26444324059ba0f27c3b1c8b8140f6">http://git.postgresql.org/pg/commitdiff/872101bede26444324059ba0f27c3b1c8b8140f6</a></li>

<li>shm_mq: Repair breakage from previous commit. If the counterparty writes some data into the queue and then detaches, it's wrong to return SHM_MQ_DETACHED right away. If we do that, we fail to read whatever was written. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1480ec1d3bacb9acb08ec09f22bc25bc033115b">http://git.postgresql.org/pg/commitdiff/a1480ec1d3bacb9acb08ec09f22bc25bc033115b</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Move documentation of max_wal_size to better position <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/984ae04a2c35e4cd0066ef2e2fb364299ff51c36">http://git.postgresql.org/pg/commitdiff/984ae04a2c35e4cd0066ef2e2fb364299ff51c36</a></li>

<li>doc: Improve markup and fine-tune replication protocol documentation <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4a618aa1ec420f40198e89ef1afd7a4e8cfcecf">http://git.postgresql.org/pg/commitdiff/e4a618aa1ec420f40198e89ef1afd7a4e8cfcecf</a></li>

<li>doc: Add advice on updating checkpoint_segments to max_wal_size with suggestion from Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f2977b3ec2fbb98ee36045d4e2be81ca4c293e0">http://git.postgresql.org/pg/commitdiff/8f2977b3ec2fbb98ee36045d4e2be81ca4c293e0</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Thomas Munro sent in three more revisions of a patch to macro-ize psql's tab-complete.c.</p>

<p>YUriy Zhuravlev sent in a patch to allow leaving the ends off an array slice, so foo[2:] would mean the slice of the 1-D foo array going from index 2 to the end.</p>

<p>Craig Ringer sent in another revision of a patch to send replication origin on commit in logical replication.</p>

<p>SAWADA Masahiko sent in a patch to support multi sync replication.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix some infelicities between foreign join pushdown and EvalPlanQual.</p>

<p>Michael Paquier sent in another revision of a patch to ensure that overflow checks not be optimized away.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement partial sorting.</p>

<p>Laurenz Albe sent in a patch to move documentation for min_wal_size before max_wal_size.</p>

<p>&Aacute;lvaro Herrera sent in another revision of a patch to add a variable to shmem which is used for module activation tracking.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement multi-tenancy with RLS.</p>

<p>Rahila Syed sent in another revision of a patch to implement a VACUUM progress checker.</p>

<p>Rajeev Rastogi and Robert Haas traded patches to fix an issue which caused dangling backend processes.</p>

<p>SAWADA Masahiko sent in two more revisions of a patch to add a "frozen" bit to the visibility map.</p>

<p>Amit Kapila sent in two more revisions of a patch to implement parallel sequential scans.</p>

<p>Taiki Kondo sent in another revision of a patch to consider table partitions when doing join pushdown.</p>

<p>Euler Taveira de Oliveira sent in a patch to fix a duplicate assignment in walsender code.</p>

<p>Euler Taveira de Oliveira sent in a patch to fix some errors in pg_recvlogical.</p>

<p>Ashutosh Bapat sent in another revision of a patch to implement getting sorted data from a foreign server.</p>

<p>Jeff Janes sent in another revision of a patch to make COPY FREEZE and PD_ALL_VISIBLE work together.</p>

<p>Victor Wagner sent in another revision of a patch to implement failover on the libpq connect level.</p>

<p>Dinesh Kumar sent in another revision of a patch to add a pg_report_log() function callable from SQL.</p>

<p>Robert Haas sent in a patch to strengthen planner infrastructure for parallelism.</p>

<p>Robert Haas sent in a patch to fix problems with ParamListInfo serialization mechanism.</p>

<p>Robert Haas sent in a patch set to modify the tqueue infrastructure to support transient record types, and using same, make Gather node projection-capable.</p>

<p>Michael Paquier sent in another revision of a patch to add = and &lt;&gt; operators for xid vs. int.</p>

<p>Jeff Janes sent in a patch to fix psql wrapped format expanded output.</p>

<p>Sandro Santilli sent in another revision of a patch to add an extensions_path GUC.</p>

<p>Etsuro Fujita and Amit Langote each sent in patches to add an Oxford comma to the same error message.</p>

<p>Ian Lawrence Barwick sent in another revision of a patch to improve BRIN documentation for inclusion opclass.</p>