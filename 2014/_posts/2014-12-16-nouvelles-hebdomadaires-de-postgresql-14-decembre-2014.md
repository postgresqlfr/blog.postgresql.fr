---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 décembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/12/16/Nouvelles-hebdomadaires-de-PostgreSQL-14-décembre-2014"
---


<p>Le <em>meetup</em> du 18 f&eacute;vrier 2015 &agrave; Melbourne accueillera Gabriele Bartolini &agrave; propos de PostgreSQL 9.4 pour les devops. D&eacute;tails ci-apr&egrave;s, et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/melpug/events/219082475/">http://www.meetup.com/melpug/events/219082475/</a></p>

<p>Le <em>Prague PostgreSQL Developer Day</em> (P2D2) 2015 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, les 11 &amp; 12 f&eacute;vrier 2015&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pg_back 1.1, un script shell pour tout sauvegarder de PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/orgrim/pg_back">https://github.com/orgrim/pg_back</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-12/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PGDay pr&eacute;-FOSDEM (30 janvier 2015) et <em>dev room</em> PostgreSQL au FOSDEM (31 janvier - 1<sup>er</sup> f&eacute;vrier 2015)&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/">http://fosdem2015.pgconf.eu/</a></li>

<li>Le <em>Prague PostgreSQL Developer Day</em> (P2D2) 2015 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, les 11 &amp; 12 f&eacute;vrier 2015&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141214235433.GA2932@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove duplicate code in heap_prune_chain(). No need to set tuple tableOid twice. Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2707547193a1e1f1016552cc92f33e8f0d296d4">http://git.postgresql.org/pg/commitdiff/c2707547193a1e1f1016552cc92f33e8f0d296d4</a></li>

<li>Correct recovery_target_action docs. From Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da71632fcfc4e642e9bafb2c0074cad109e59486">http://git.postgresql.org/pg/commitdiff/da71632fcfc4e642e9bafb2c0074cad109e59486</a></li>

<li>Use GetSystemTimeAsFileTime directly in win32. PostgreSQL was calling GetSystemTime followed by SystemTimeToFileTime in the win32 port gettimeofday function. This is not necessary and limits the reported precision to the 1ms granularity that the SYSTEMTIME struct can represent. By using GetSystemTimeAsFileTime we avoid unnecessary conversions and capture timestamps at 100ns granularity, which is then rounded to 1&micro;s granularity for storage in a PostgreSQL timestamp. On most Windows systems this change will actually have no significant effect on timestamp resolution as the system timer tick is typically between 1ms and 15ms depending on what timer resolution currently running applications have requested. You can check this with clockres.exe from sysinternals. Despite the platform limiation this change still permits capture of finer timestamps where the system is capable of producing them and it gets rid of an unnecessary syscall. The higher resolution GetSystemTimePreciseAsFileTime call available on Windows 8 and Windows Server 2012 has the same interface as GetSystemTimeAsFileTime, so switching to GetSystemTimeAsFileTime makes it easier to use the Precise variant later. Craig Ringer, reviewed by David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/519b0757a37254452e013ea0ac95f4e56391608c">http://git.postgresql.org/pg/commitdiff/519b0757a37254452e013ea0ac95f4e56391608c</a></li>

<li>Windows: use GetSystemTimePreciseAsFileTime if available. PostgreSQL on Windows 8 or Windows Server 2012 will now get high-resolution timestamps by dynamically loading the GetSystemTimePreciseAsFileTime function. It'll fall back to to GetSystemTimeAsFileTime if the higher precision variant isn't found, so the same binaries without problems on older Windows releases. No attempt is made to detect the Windows version. Only the presence or absence of the desired function is considered. Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8001fe67a3d66c95861ce1f7075ef03953670d13">http://git.postgresql.org/pg/commitdiff/8001fe67a3d66c95861ce1f7075ef03953670d13</a></li>

<li>Execute 18 tests for src/bin/scripts/t/090.. Some requests count as two tests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1135aabab5dad2f4e79aade3c907bd7a51ac263a">http://git.postgresql.org/pg/commitdiff/1135aabab5dad2f4e79aade3c907bd7a51ac263a</a></li>

<li>Silence REINDEX. Previously REINDEX DATABASE and REINDEX SCHEMA produced a stream of NOTICE messages. Removing that since it is inconsistent for such a command to produce output without a VERBOSE option. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae4e6887a4eaa62ff3e47a16a8b2b6a91fa6a514">http://git.postgresql.org/pg/commitdiff/ae4e6887a4eaa62ff3e47a16a8b2b6a91fa6a514</a></li>

<li>REINDEX SCHEMA. Add new SCHEMA option to REINDEX and reindexdb. Sawada Masahiko Reviewed by Michael Paquier and Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe263d115a7dd16095b8b8f1e943aff2bb4574d2">http://git.postgresql.org/pg/commitdiff/fe263d115a7dd16095b8b8f1e943aff2bb4574d2</a></li>

<li>Further changes to REINDEX SCHEMA. Ensure we reindex indexes built on Mat Views. Based on patch from Micheal Paquier Add thorough tests to check that indexes on tables, toast tables and mat views are reindexed. Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2646d2d4a9d8b978fda0d0d1affae4788a30f604">http://git.postgresql.org/pg/commitdiff/2646d2d4a9d8b978fda0d0d1affae4788a30f604</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Fix DocBook table column count declaration. This was broken in 618c9430a82860c84a3be2711eec2c3b43573b2a. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/611d46ea67c0863ab1d97c73c8cead1ed5ca82f0">http://git.postgresql.org/pg/commitdiff/611d46ea67c0863ab1d97c73c8cead1ed5ca82f0</a></li>

<li>Fix typo. Author: Fabr&iacute;zio de Royes Mello &lt;fabriziomello@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7442a8899751c804c7def0407fd1756360917754">http://git.postgresql.org/pg/commitdiff/7442a8899751c804c7def0407fd1756360917754</a></li>

<li>SSL tests: Silence pg_ctl output. Otherwise the pg_ctl start and stop messages get mixed up with the TAP output, which isn't technically valid. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce37eff06df66dcd2091c76c0d29178b55e1e407">http://git.postgresql.org/pg/commitdiff/ce37eff06df66dcd2091c76c0d29178b55e1e407</a></li>

<li>SSL tests: Remove trailing blank lines 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f8607860b4ef3668350a47e9488aee3d640da75">http://git.postgresql.org/pg/commitdiff/2f8607860b4ef3668350a47e9488aee3d640da75</a></li>

<li>doc: Move website-stylesheet setting to a more appropriate location 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7afc2336cd9ce294894fcb750ab8c8cf51bf6bce">http://git.postgresql.org/pg/commitdiff/7afc2336cd9ce294894fcb750ab8c8cf51bf6bce</a></li>

<li>doc: Fix markup 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c50423c0feac69a4d810f17145536d6844fad01e">http://git.postgresql.org/pg/commitdiff/c50423c0feac69a4d810f17145536d6844fad01e</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_xlogdump/.gitignore: add committsdesc.c. Author: Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcbfc00aba1ee4329fea20ad58e13a84848df993">http://git.postgresql.org/pg/commitdiff/dcbfc00aba1ee4329fea20ad58e13a84848df993</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a regression test suite for SSL support. It's not run by the global "check" or "installcheck" targets, because the temporary installation it creates accepts TCP connections from any user the same host, which is insecure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e39250c644ea7cd3904e4e24570db21a209cf97f">http://git.postgresql.org/pg/commitdiff/e39250c644ea7cd3904e4e24570db21a209cf97f</a></li>

<li>Use correct macro for reltablespace. It's an OID. WRITE_UINT_FIELD is identical to WRITE_OID_FIELD, but let's be tidy. Mark Dilger 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10eb7dfa9b7499d603d09a141b9ae4e36b14393f">http://git.postgresql.org/pg/commitdiff/10eb7dfa9b7499d603d09a141b9ae4e36b14393f</a></li>

<li>Put the logic to decide which synchronous standby is active into a function. This avoids duplicating the code. Michael Paquier, reviewed by Simon Riggs and me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1332e98c441b40300670f55a4303bf69cd8b226">http://git.postgresql.org/pg/commitdiff/b1332e98c441b40300670f55a4303bf69cd8b226</a></li>

<li>Remove duplicate #define. Mark Dilger 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50f2c0687fabde9c665df66f77b464c539d927a9">http://git.postgresql.org/pg/commitdiff/50f2c0687fabde9c665df66f77b464c539d927a9</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix minor thinko in convertToJsonb(). The amount of space to reserve for the value's varlena header is VARHDRSZ, not sizeof(VARHDRSZ). The latter coding accidentally failed to fail because of the way the VARHDRSZ macro is currently defined; but if we ever change it to return size_t (as one might reasonably expect it to do), convertToJsonb() would have failed. Spotted by Mark Dilger. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24688f4e5a7d5fadde0e43a5b123432d81577d82">http://git.postgresql.org/pg/commitdiff/24688f4e5a7d5fadde0e43a5b123432d81577d82</a></li>

<li>Fix assorted confusion between Oid and int32. In passing, also make some debugging elog's in pgstat.c a bit more consistently worded. Back-patch as far as applicable (9.3 or 9.4; none of these mistakes are really old). Mark Dilger identified and patched the type violations; the message rewordings are mine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06d5803ffa1ea5a42295c9266f30557e44a99de7">http://git.postgresql.org/pg/commitdiff/06d5803ffa1ea5a42295c9266f30557e44a99de7</a></li>

<li>Fix completely broken REINDEX SCHEMA testcase. Aside from not testing the case it claimed to test (namely a permissions failure), it left a login-capable role lying around, which quite aside from possibly being a security hole would cause subsequent regression runs to fail since the role would already exist. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58af84f4bba5c87b352cf40e276e287fd289bd77">http://git.postgresql.org/pg/commitdiff/58af84f4bba5c87b352cf40e276e287fd289bd77</a></li>

<li>Make rowsecurity test clean up after itself, too. Leaving global objects like roles hanging around is bad practice. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0845264642d855d92c63c5d05a4ef83245ca16c5">http://git.postgresql.org/pg/commitdiff/0845264642d855d92c63c5d05a4ef83245ca16c5</a></li>

<li>Fix corner case where SELECT FOR UPDATE could return a row twice. In READ COMMITTED mode, if a SELECT FOR UPDATE discovers it has to redo WHERE-clause checking on rows that have been updated since the SELECT's snapshot, it invokes EvalPlanQual processing to do that. If this first occurs within a non-first child table of an inheritance tree, the previous coding could accidentally re-return a matching row from an earlier, already-scanned child table. (And, to add insult to injury, I think this could make it miss returning a row that should have been returned, if the updated row that this happens on should still have passed the WHERE qual.) Per report from Kyotaro Horiguchi; the added isolation test is based on his test case. This has been broken for quite awhile, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2db576ba8c449fcaf61ae7aa14ed62e63ebf5924">http://git.postgresql.org/pg/commitdiff/2db576ba8c449fcaf61ae7aa14ed62e63ebf5924</a></li>

<li>Fix planning of SELECT FOR UPDATE on child table with partial index. Ordinarily we can omit checking of a WHERE condition that matches a partial index's condition, when we are using an indexscan on that partial index. However, in SELECT FOR UPDATE we must include the "redundant" filter condition in the plan so that it gets checked properly in an EvalPlanQual recheck. The planner got this mostly right, but improperly omitted the filter condition if the index in question was on an inheritance child table. In READ COMMITTED mode, this could result in incorrectly returning just-updated rows that no longer satisfy the filter condition. The cause of the error is using get_parse_rowmark() when get_plan_rowmark() is what should be used during planning. In 9.3 and up, also fix the same mistake in contrib/postgres_fdw. It's currently harmless there (for lack of inheritance support) but wrong is wrong, and the incorrect code might get copied to someplace where it's more significant. Report and fix by Kyotaro Horiguchi. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/462bd95705a0c23ba0b0ba60a78d32566a0384c1">http://git.postgresql.org/pg/commitdiff/462bd95705a0c23ba0b0ba60a78d32566a0384c1</a></li>

<li>Revert misguided change to postgres_fdw FOR UPDATE/SHARE code. In commit 462bd95705a0c23ba0b0ba60a78d32566a0384c1, I changed postgres_fdw to rely on get_plan_rowmark() instead of get_parse_rowmark(). I still think that's a good idea in the long run, but as Etsuro Fujita pointed out, it doesn't work today because planner.c forces PlanRowMarks to have markType = ROW_MARK_COPY for all foreign tables. There's no urgent reason to change this in the back branches, so let's just revert that part of yesterday's commit rather than trying to design a better solution under time pressure. Also, add a regression test case showing what postgres_fdw does with FOR UPDATE/SHARE. I'd blithely assumed there was one already, else I'd have realized yesterday that this code didn't work. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ec8760fc87ecde0516e511f1c55aec627b01ea7">http://git.postgresql.org/pg/commitdiff/8ec8760fc87ecde0516e511f1c55aec627b01ea7</a></li>

<li>Avoid instability in output of new REINDEX SCHEMA test. The planner seems to like to do this join query as a hash join, making the output ordering machine-dependent; worse, it's a hash on OIDs, so that it's a bit astonishing that the result doesn't change from run to run even on one machine. Add an ORDER BY to get consistent results. Per buildfarm. I also suppressed output from the final DROP SCHEMA CASCADE, to avoid occasional failures similar to those fixed in commit 81d815dc3ed74a7d. That hasn't been observed in the buildfarm yet, but it seems likely to happen in future if we leave it as-is. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c5c70df45714f38c033bb1a272d8db4f2dc8a2f">http://git.postgresql.org/pg/commitdiff/1c5c70df45714f38c033bb1a272d8db4f2dc8a2f</a></li>

<li>Repair corner-case bug in array version of percentile_cont(). The code for advancing through the input rows overlooked the case that we might already be past the first row of the row pair now being considered, in case the previous percentile also fell between the same two input rows. Report and patch by Andrew Gierth; logic rewritten a bit for clarity by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0f479113abaf28f1c9ed25d856ffe6fd4bb7dc9">http://git.postgresql.org/pg/commitdiff/b0f479113abaf28f1c9ed25d856ffe6fd4bb7dc9</a></li>

<li>Improve recovery target settings documentation. Commit 815d71dee hadn't bothered to update the documentation to match the behavioral change, and a lot of other text in this section was badly in need of copy-editing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e311cd6ded096122a5f2b5cbe91bc3a9f0dda3cb">http://git.postgresql.org/pg/commitdiff/e311cd6ded096122a5f2b5cbe91bc3a9f0dda3cb</a></li>

<li>Update 9.4 release notes. Set release date, do a final pass of wordsmithing, improve some other new-in-9.4 documentation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0923b01e3e64d4985ffbdf8ec912e25ad02e0c0c">http://git.postgresql.org/pg/commitdiff/0923b01e3e64d4985ffbdf8ec912e25ad02e0c0c</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add json_strip_nulls and jsonb_strip_nulls functions. The functions remove object fields, including in nested objects, that have null as a value. In certain cases this can lead to considerably smaller datums, with no loss of semantic information. Andrew Dunstan, reviewed by Pavel Stehule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/237a8824430c607fce1eafde0c625744d50a455c">http://git.postgresql.org/pg/commitdiff/237a8824430c607fce1eafde0c625744d50a455c</a></li>

<li>Add several generator functions for jsonb that exist for json. The functions are: to_jsonb(), jsonb_object(), jsonb_build_object(), jsonb_build_array(), jsonb_agg(), and jsonb_object_agg(). Also along the way some better logic is implemented in json_categorize_type() to match that in the newly implemented jsonb_categorize_type(). Andrew Dunstan, reviewed by Pavel Stehule and Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e354ab9fe9e7c3b0a7a40f226c76bd5cf6438d0">http://git.postgresql.org/pg/commitdiff/7e354ab9fe9e7c3b0a7a40f226c76bd5cf6438d0</a></li>

<li>Add CINE option for CREATE TABLE Alexander Shulgin and CREATE MATERIALIZED VIEW. Fabr&iacute;zio de Royes Mello reviewed by Rushabh Lathia. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e39b6f953e8c699eacd676314574ed5869ebacef">http://git.postgresql.org/pg/commitdiff/e39b6f953e8c699eacd676314574ed5869ebacef</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to add a shutdown_at_recovery_target option to recovery.conf.</li>

<li>Euler Taveira de Oliveira sent in a patch to bring the documentation of pg_receivexlog into line with its new functionality.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT {UPDATE | IGNORE}.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to add a sequence access method.</li>

<li>Alexander Shulgin sent in two revisions of a patch to track TRUNCATEs in pgstat transaction stats.</li>

<li>Robert Haas and Heikki Linnakangas traded patches to advance local xmin more aggressively.</li>

<li>Etsuro Fujita sent in another revision of a patch to allow foreign tables to be part of table inheritance hierarchies.</li>

<li>&Aacute;lvaro Herrera sent in a patch to implement logical column ordering.</li>

<li>David Rowley sent in another revision of a patch to allow removing INNER JOIN under some circumstances.</li>

<li>Matt Newell sent in another revision of a patch to enable libpq pipelining.</li>

<li>Heikki Linnakangas improved the performance of k-Nearest-Neighbor GiST index searches using a Pairing Heap 

<a target="_blank" href="http://en.wikipedia.org/wiki/Pairing_heap.">http://en.wikipedia.org/wiki/Pairing_heap.</a></li>

<li>Petr (PJMODOS) Jelinek sent in a patch to implement TABLESAMPLE.</li>

<li>Jeff Davis sent in another revision of a patch to implement a memory-bounded HashAgg.</li>

<li>Mark Dilger sent in a WIP patch to allow printf formatting for Oids.</li>

<li>Kyotaro HORIGUCHI and Tom Lane traded patches to fix an issue where some queries return duplicate rows after FOR UPDATE was blocked, in other words, after getting HeapTupleUpdated in ExecLockRows.</li>

<li>Simon Riggs sent in another revision of a patch to turn off heap-only tuple cleanup under some circumstances.</li>

<li>Heikki Linnakangas and Michael Paquier traded patches to refactor the code for sync node detection.</li>

<li>Peter Eisentraut sent in a patch to ensure that VPATH builds not write to the source tree.</li>

<li>Kyotaro HORIGUCHI sent in a patch to fix an issue where SELECT FROM &lt;inheritance parent&gt; WHERE &lt;cond&gt; FOR UPDATE may return results which does not match the &lt;cond&gt;.</li>

<li>Alexander Shulgin sent in another revision of a patch to turn recovery.conf into GUCs.</li>

<li>Robert Haas sent in a patch to add two new concepts: parallel mode, and parallel contexts.</li>

<li>Heikki Linnakangas sent in a patch to place pg_rewind, a tool that allows repurposing an old master server as a new standby server, after promotion, even if the old master was not shut down cleanly, in contrib/.</li>

<li>Andreas Karlsson sent in a patch to reduce the required lock strength of trigger and foreign key DDL.</li>

<li>Tatsuo Ishii sent in a patch to pgbench from exiting when the pg_bench_* tables do not exist.</li>

<li>Michael Paquier sent in another revision of a patch to allow compressing full-page writes.</li>

<li>Ali Akbar sent in a test for the patch to fix xpath() to return namespace definitions.</li>

<li>Emre Hasegeli sent in another revision of a patch to implement a BRIN range operator class.</li>

</ul>