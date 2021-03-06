---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 novembre 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/11/13/Nouvelles-hebdomadaires-de-PostgreSQL-6-novembre-2011"
---


<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li><em>ezNcrypt for Databases</em> est maintenant compatible PostgreSQL&nbsp;:

<a target="_blank" href="http://download.gazzang.com/license_request.php">http://download.gazzang.com/license_request.php</a></li>

<li>pgpool-II 3.0.5, un distributeur de connexions et bien d'avantage&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>RHQ 4.2, un outil de gestion et de surveillance de systèmes qui utilise PostgreSQL&nbsp;:

<a target="_blank" href="http://rhq-project.org/">http://rhq-project.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-11/threads.php</a>;</li>

<li>Francophones&nbsp;:

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PGConf.DE 2011</em> est une conférence germanophone tenue le 11 novembre au musée industriel du Rhin à Oberhausen (Allemagne). L'appel à conférenciers est lancé&nbsp;:

<a target="_blank" href="http://2011.pgconf.de/">http://2011.pgconf.de/</a></li>

<li>La cinquième édition du PGDay italien (PGDay.IT 2011) aura lieu le 25 novembre à Prato&nbsp;:

<a target="_blank" href="http://2011.pgday.it/">http://2011.pgday.it/</a></li>

<li>L'appel à conférenciers est lancé pour la <em>PostgreSQL Session #3</em>, programmée le 2 février 2012 à Paris. La date limite de dépôt est le 30 novembre 2011 et les conférenciers sélectionnés seront contactés avant le 14 décembre. Les propositions (en français ou anglais) doivent être envoyées à call-for-paper AT postgresql-sessions DOT org. Plus d'informations sur&nbsp;:

<a target="_blank" href="http://www.postgresql-sessions.org/en/3/">http://www.postgresql-sessions.org/en/3/</a></li>

<li>L'appel à conférenciers a été lancé pour le FLOSS UK, programmé du 20 au 22 mars 2012 à Edimbourg. La date limite de dépôt des candidatures est fixée au 18 novembre 2011 et les conférenciers sélectionnés seront informés avant le 25 novembre. Les propositions sont à envoyer à postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;:

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org et en espagnol à pwn (a) arpug.com.ar.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20111106">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Stop btree indexscans upon reaching nulls in either direction. The existing scan-direction-sensitive tests were overly complex, and failed to stop the scan in cases where it's perfectly legitimate to do so. Per bug #6278 from Maksym Boguk. Back-patch to 8.3, which is as far back as the patch applies easily. Doesn't seem worth sweating over a relatively minor performance issue in 8.2 at this late date. (But note that this was a performance regression from 8.1 and before, so 8.2 is being left as an outlier.)

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6980f817e83c242c29c84a44f1e1f09e566439b7">http://git.postgresql.org/pg/commitdiff/6980f817e83c242c29c84a44f1e1f09e566439b7</a></li>

<li>Fix race condition with toast table access from a stale syscache entry. If a tuple in a syscache contains an out-of-line toasted field, and we try to fetch that field shortly after some other transaction has committed an update or deletion of the tuple, there is a race condition: vacuum could come along and remove the toast tuples before we can fetch them. This leads to transient failures like "missing chunk number 0 for toast value NNNNN in pg_toast_2619", as seen in recent reports from Andrew Hammond and Tim Uckun. The design idea of syscache is that access to stale syscache entries should be prevented by relation-level locks, but that fails for at least two cases where toasted fields are possible: ANALYZE updates pg_statistic rows without locking out sessions that might want to plan queries on the same table, and CREATE OR REPLACE FUNCTION updates pg_proc rows without any meaningful lock at all. The least risky fix seems to be an idea that Heikki suggested when we were dealing with a related problem back in August: forcibly detoast any out-of-line fields before putting a tuple into syscache in the first place. This avoids the problem because at the time we fetch the parent tuple from the catalog, we should be holding an MVCC snapshot that will prevent removal of the toast tuples, even if the parent tuple is outdated immediately after we fetch it. (Note: I'm not convinced that this statement holds true at every instant where we could be fetching a syscache entry at all, but it does appear to hold true at the times where we could fetch an entry that could have a toasted field. We will need to be a bit wary of adding toast tables to low-level catalogs that don't have them already.) An additional benefit is that subsequent uses of the syscache entry should be faster, since they won't have to detoast the field. Back-patch to all supported versions. The problem is significantly harder to reproduce in pre-9.0 releases, because of their willingness to flush every entry in a syscache whenever the underlying catalog is vacuumed (cf CatalogCacheFlushRelation); but there is still a window for trouble.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08e261cbc94ce9a72c0660b2786eaadae9f6fb41">http://git.postgresql.org/pg/commitdiff/08e261cbc94ce9a72c0660b2786eaadae9f6fb41</a></li>

<li>Preserve Var location information during flatten_join_alias_vars. This allows us to give correct syntax error pointers when complaining about ungrouped variables in a join query with aggregates or GROUP BY. It's pretty much irrelevant for the planner's use of the function, though perhaps it might aid debugging sometimes.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/391af9f7842ba8b8d2195aaf82879662434b97f3">http://git.postgresql.org/pg/commitdiff/391af9f7842ba8b8d2195aaf82879662434b97f3</a></li>

<li>Revert "Stop btree indexscans upon reaching nulls in either direction." This reverts commit 048fffed55ff1d6d346130e4a6b7be434e81e82c. As pointed out by Naoya Anzai, we need to do more work to make that idea handle end-of-index cases, and it is looking like too much risk for a back-patch. So bug #6278 is only going to be fixed in HEAD.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cd7b682427d0e912b3ddf7f4910d52089e0df71">http://git.postgresql.org/pg/commitdiff/5cd7b682427d0e912b3ddf7f4910d52089e0df71</a></li>

<li>Fix btree stop-at-nulls logic properly. As pointed out by Naoya Anzai, my previous try at this was a few bricks shy of a load, because I had forgotten that the initial-positioning logic might not try to skip over nulls at the end of the index the scan will start from. We ought to fix that, because it represents an unnecessary inefficiency, but first let's get the scan-stop logic back to a safe state. With this patch, we preserve the performance benefit requested in bug #6278 for the case of scanning forward into NULLs (in a NULLS LAST index), but the reverse case of scanning backward across NULLs when there's no suitable initial-positioning qual is still inefficient.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/882368e854b6f094f94aca292f390bbd9f44359b">http://git.postgresql.org/pg/commitdiff/882368e854b6f094f94aca292f390bbd9f44359b</a></li>

<li>Avoid scanning nulls at the beginning of a btree index scan. If we have an inequality key that constrains the other end of the index, it doesn't directly help us in doing the initial positioning ... but it does imply a NOT NULL constraint on the index column. If the index stores nulls at this end, we can use the implied NOT NULL condition for initial positioning, just as if it had been stated explicitly. This avoids wasting time when there are a lot of nulls in the column. This is the reverse of the examples given in bugs #6278 and #6283, which were about failing to stop early when we encounter nulls at the end of the indexscan.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a77f8b63d159b88ceb6245fcb5e81a7f9ac9a22">http://git.postgresql.org/pg/commitdiff/1a77f8b63d159b88ceb6245fcb5e81a7f9ac9a22</a></li>

<li>Fix handling of PlaceHolderVars in nestloop parameter management. If we use a PlaceHolderVar from the outer relation in an inner indexscan, we need to reference the PlaceHolderVar as such as the value to be passed in from the outer relation. The previous code effectively tried to reconstruct the PHV from its component expression, which doesn't work since (a) the Vars therein aren't necessarily bubbled up far enough, and (b) it would be the wrong semantics anyway because of the possibility that the PHV is supposed to have gone to null at some point before the current join. Point (a) led to "variable not found in subplan target list" planner errors, but point (b) would have led to silently wrong answers. Per report from Roger Niederland.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e3bf99baa18524de6ef1492cb3057314da97e68">http://git.postgresql.org/pg/commitdiff/7e3bf99baa18524de6ef1492cb3057314da97e68</a></li>

<li>Fix inline_set_returning_function() to allow multiple OUT parameters. inline_set_returning_function failed to distinguish functions returning generic RECORD (which require a column list in the RTE, as well as run-time type checking) from those with multiple OUT parameters (which do not). This prevented inlining from happening. Per complaint from Jay Levitt. Back-patch to 8.4 where this capability was introduced.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/515e813543dad5464c1a226fd068fd4daf26a7f9">http://git.postgresql.org/pg/commitdiff/515e813543dad5464c1a226fd068fd4daf26a7f9</a></li>

<li>Improve comments for TSLexeme data structure. Mostly, clean up long-ago pgindent damage.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0d2f05a0d433ab68ec378744ff920562a5ef681">http://git.postgresql.org/pg/commitdiff/a0d2f05a0d433ab68ec378744ff920562a5ef681</a></li>

<li>Fix bogus code in contrib/ tsearch dictionary examples. Both dict_int and dict_xsyn were blithely assuming that whatever memory palloc gives back will be pre-zeroed. This would typically work for just about long enough to run their regression tests, and no longer :-(. The pre-9.0 code in dict_xsyn was even lamer than that, as it would happily give back a pointer to the result of palloc(0), encouraging its caller to access off the end of memory. Again, this would just barely fail to fail as long as memory contained nothing but zeroes. Per a report from Rodrigo Hjort that code based on these examples didn't work reliably.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3e3087d8717c26cd1c4581ba29274ac214eb816">http://git.postgresql.org/pg/commitdiff/e3e3087d8717c26cd1c4581ba29274ac214eb816</a></li>

<li>Don't assume that a tuple's header size is unchanged during toasting. This assumption can be wrong when the toaster is passed a raw on-disk tuple, because the tuple might pre-date an ALTER TABLE ADD COLUMN operation that added columns without rewriting the table. In such a case the tuple's natts value is smaller than what we expect from the tuple descriptor, and so its t_hoff value could be smaller too. In fact, the tuple might not have a null bitmap at all, and yet our current opinion of it is that it contains some trailing nulls. In such a situation, toast_insert_or_update did the wrong thing, because to save a few lines of code it would use the old t_hoff value as the offset where heap_fill_tuple should start filling data. This did not leave enough room for the new nulls bitmap, with the result that the first few bytes of data could be overwritten with null flag bits, as in a recent report from Hubert Depesz Lubaczewski. The particular case reported requires ALTER TABLE ADD COLUMN followed by CREATE TABLE AS SELECT * FROM ... or INSERT ... SELECT * FROM ..., and further requires that there be some out-of-line toasted fields in one of the tuples to be copied; else we'll not reach the troublesome code. The problem can only manifest in this form in 8.4 and later, because before commit a77eaa6a95009a3441e0d475d1980259d45da072, CREATE TABLE AS or INSERT/SELECT wouldn't result in raw disk tuples getting passed directly to heap_insert --- there would always have been at least a junkfilter in between, and that would reconstitute the tuple header with an up-to-date t_natts and hence t_hoff. But I'm backpatching the tuptoaster change all the way anyway, because I'm not convinced there are no older code paths that present a similar risk.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/039680affb1b925e8e5c9578b0ab05fa326452fe">http://git.postgresql.org/pg/commitdiff/039680affb1b925e8e5c9578b0ab05fa326452fe</a></li>

<li>Un-break horology regression test. Adjust ill-considered timezone-dependent tests added in commit 8a3d33c8e6c681d512f79af4a521ee0c02befcef so that they won't fail on DST transition days. Per all-pink buildfarm.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/362f731dde94b10f8a01e80fddd2bf99c4f66587">http://git.postgresql.org/pg/commitdiff/362f731dde94b10f8a01e80fddd2bf99c4f66587</a></li>

</ul>

<p>Magnus Hagander a poussé&nbsp;:</p>

<ul>

<li>Document that multiple LDAP servers can be specified

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/589adb86ee826190d2b6e744d117eee1fa6bbf75">http://git.postgresql.org/pg/commitdiff/589adb86ee826190d2b6e744d117eee1fa6bbf75</a></li>

<li>Pre-pad WAL files when streaming transaction log. Instead of filling files as they appear, pre-pad the WAL files received when streaming xlog the same way that the server does. Data is streamed into a .partial file which is then renamed()d into palce when it's complete, but it will always be 16MB. This also means that the starting position for pg_receivexlog is now simply right after the last complete segment, and we never need to deal with partial segments there. Patch by me, review by Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7cc8437bbff99cbc7f07f852f5169ba1356a414">http://git.postgresql.org/pg/commitdiff/e7cc8437bbff99cbc7f07f852f5169ba1356a414</a></li>

<li>Properly close replication connection in pg_receivexlog

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b06105c7d999752177f98fdad20278d57804f8f">http://git.postgresql.org/pg/commitdiff/3b06105c7d999752177f98fdad20278d57804f8f</a></li>

<li>Add missing space in comment

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6187df15320fbd958389358f5d4086b694c892ec">http://git.postgresql.org/pg/commitdiff/6187df15320fbd958389358f5d4086b694c892ec</a></li>

<li>Make psql \d on a sequence show the table/column owning it

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f81a1f6688c2901d82c02158e9c865f5538246d">http://git.postgresql.org/pg/commitdiff/6f81a1f6688c2901d82c02158e9c865f5538246d</a></li>

<li>Show statistics target for columns in \d+ on a table

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ebcadba29fd1aeef76a4c0c4d1d2adad62fe945a">http://git.postgresql.org/pg/commitdiff/ebcadba29fd1aeef76a4c0c4d1d2adad62fe945a</a></li>

<li>Update regression tests for \d+ modification. Noted by Tom

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a6e4076b73b16575373c4a99d3301cdb929fd03">http://git.postgresql.org/pg/commitdiff/3a6e4076b73b16575373c4a99d3301cdb929fd03</a></li>

</ul>

<p>Simon Riggs a poussé&nbsp;:</p>

<ul>

<li>Split work of bgwriter between 2 processes: bgwriter and checkpointer. bgwriter is now a much less important process, responsible for page cleaning duties only. checkpointer is now responsible for checkpoints and so has a key role in shutdown. Later patches will correct doc references to the now old idea that bgwriter performs checkpoints. Has beneficial effect on performance at high write rates, but mainly refactoring to more easily allow changes for power reduction by simplifying previously tortuous code around required to allow page cleaning and checkpointing to time slice in the same process. Patch by me, Review by Dickson Guedes

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/806a2aee3791244bf0f916729bfdb5489936e068">http://git.postgresql.org/pg/commitdiff/806a2aee3791244bf0f916729bfdb5489936e068</a></li>

<li>Add new file for checkpointer.c

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf405ba8e460051e715d0a91442b579e590328ce">http://git.postgresql.org/pg/commitdiff/bf405ba8e460051e715d0a91442b579e590328ce</a></li>

<li>Have checkpointer send stats once each processing loop. Noted by Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ba182056faac66012aad8dedf2cb50ba511d989">http://git.postgresql.org/pg/commitdiff/3ba182056faac66012aad8dedf2cb50ba511d989</a></li>

<li>Comment changes to show bgwriter no longer performs checkpoints.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3ebaad45b473f3a53de2cd2a5252cd653aa46f3">http://git.postgresql.org/pg/commitdiff/f3ebaad45b473f3a53de2cd2a5252cd653aa46f3</a></li>

<li>Fix timing of Startup CLOG and MultiXact during Hot Standby. Patch by me, bug report by Chris Redekop, analysis by Florian Pflug

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8409b39d1dae28f063b378b9edee1a657845503">http://git.postgresql.org/pg/commitdiff/f8409b39d1dae28f063b378b9edee1a657845503</a></li>

<li>Start Hot Standby faster when initial snapshot is incomplete. If the initial snapshot had overflowed then we can start whenever the latest snapshot is empty, not overflowed or as we did already, start when the xmin on primary was higher than xmax of our starting snapshot, which proves we have full snapshot data. Bug report by Chris Redekop

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10b7c686e52a6d1bb10194ebf9331ef06f044d46">http://git.postgresql.org/pg/commitdiff/10b7c686e52a6d1bb10194ebf9331ef06f044d46</a></li>

<li>Remove spurious entry from missed catch while patch juggling

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2296e62a326dfd16ecae590f2f29773fd4348e7f">http://git.postgresql.org/pg/commitdiff/2296e62a326dfd16ecae590f2f29773fd4348e7f</a></li>

<li>Derive oldestActiveXid at correct time for Hot Standby. There was a timing window between when oldestActiveXid was derived and when it should have been derived that only shows itself under heavy load. Move code around to ensure correct timing of derivation. No change to StartupSUBTRANS() code, which is where this failed. Bug report by Chris Redekop

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86e33648992cfc104836ab1fbb6e654308beb4a5">http://git.postgresql.org/pg/commitdiff/86e33648992cfc104836ab1fbb6e654308beb4a5</a></li>

<li>Refactor xlog.c to create src/backend/postmaster/startup.c. Startup process now has its own dedicated file, just like all other special/background processes. Reduces role and size of xlog.c

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9aceb6ab3c202a5bf00d5f00436bb6ad285fc0bf">http://git.postgresql.org/pg/commitdiff/9aceb6ab3c202a5bf00d5f00436bb6ad285fc0bf</a></li>

<li>Reduce checkpoints and WAL traffic on low activity database server Previously, we skipped a checkpoint if no WAL had been written since last checkpoint, though this does not appear in user documentation. As of now, we skip a checkpoint until we have written at least one enough WAL to switch the next WAL file. This greatly reduces the level of activity and number of WAL messages generated by a very low activity server. This is safe because the purpose of a checkpoint is to act as a starting place for a recovery, in case of crash. This patch maintains minimal WAL volume for replay in case of crash, thus maintaining very low crash recovery time.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18fb9d8d21a28caddb72c7ffbdd7b96d52ff9724">http://git.postgresql.org/pg/commitdiff/18fb9d8d21a28caddb72c7ffbdd7b96d52ff9724</a></li>

<li>Update more comments about checkpoints being done by bgwriter

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/750f70b0fe91258f9f99b1d04a510e5b035e9249">http://git.postgresql.org/pg/commitdiff/750f70b0fe91258f9f99b1d04a510e5b035e9249</a></li>

<li>Improve docs for timing and skipping of checkpoints. Greg Smith

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43342891861cc2d08dea2b1c8b190e15e5a36551">http://git.postgresql.org/pg/commitdiff/43342891861cc2d08dea2b1c8b190e15e5a36551</a></li>

<li>Move user functions related to WAL into xlogfuncs.c

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a030bfa6e41edae8a9a68dc8cef7fc7813f69a0a">http://git.postgresql.org/pg/commitdiff/a030bfa6e41edae8a9a68dc8cef7fc7813f69a0a</a></li>

</ul>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Allow pg_upgrade to upgrade an old cluster that doesn't have a 'postgres' database.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a50d860ae1dfca56148dd41692b963bb859bf1d6">http://git.postgresql.org/pg/commitdiff/a50d860ae1dfca56148dd41692b963bb859bf1d6</a></li>

<li>Update pg_upgrade comment on missing 'postgres' database.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09d1174e5ad3ec7c90c99e2ad4dd896368b018ce">http://git.postgresql.org/pg/commitdiff/09d1174e5ad3ec7c90c99e2ad4dd896368b018ce</a></li>

<li>Adjust pg_upgrade "new database skip" code, e.g. 'postgres', to more cleanly handle old/new database mismatches.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84b8fcaa923259d6f7daf228183ecbeb924dc950">http://git.postgresql.org/pg/commitdiff/84b8fcaa923259d6f7daf228183ecbeb924dc950</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Clean up whitespace and indentation in parser and scanner files. These are not touched by pgindent, so clean them up a bit manually.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/654e1f96b0642124fb2996f1b7e64140b2898f14">http://git.postgresql.org/pg/commitdiff/654e1f96b0642124fb2996f1b7e64140b2898f14</a></li>

<li>Add note about using GNU tar warning options for base backups

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39b2d9ffb01ab356f6f5e0d441472ade7608b12a">http://git.postgresql.org/pg/commitdiff/39b2d9ffb01ab356f6f5e0d441472ade7608b12a</a></li>

<li>Fix archive_command example. The given archive_command example didn't use %p or %f, which wouldn't really work in practice.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27ef415a716d75de3213cb6bcd6cf20e24eb0f4f">http://git.postgresql.org/pg/commitdiff/27ef415a716d75de3213cb6bcd6cf20e24eb0f4f</a></li>

</ul>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Initialize myProcLocks queues just once, at postmaster startup. In assert-enabled builds, we assert during the shutdown sequence that the queues have been properly emptied, and during process startup that we are inheriting empty queues. In non-assert enabled builds, we just save a few cycles.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2891b46a4b04b80e1fe28ad0bfd75b40e97ea3e">http://git.postgresql.org/pg/commitdiff/c2891b46a4b04b80e1fe28ad0bfd75b40e97ea3e</a></li>

<li>Check the return value of getcwd(), instead of assuming success. Kevin Grittner

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9f48b572c773ab88d02e26ccb5b6ff5fea64c05">http://git.postgresql.org/pg/commitdiff/c9f48b572c773ab88d02e26ccb5b6ff5fea64c05</a></li>

<li>Silence bogus compiler warning.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b76c61f1e862f5e8e41ffc7154e83688742aab0e">http://git.postgresql.org/pg/commitdiff/b76c61f1e862f5e8e41ffc7154e83688742aab0e</a></li>

</ul>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>Support range data types. Selectivity estimation functions are missing for some range type operators, which is a TODO. Jeff Davis

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4429f6a9e3e12bb4af6e3677fbc78cd80f160252">http://git.postgresql.org/pg/commitdiff/4429f6a9e3e12bb4af6e3677fbc78cd80f160252</a></li>

<li>Oops, forgot to fix the catversion when I committed the range types patch. It was inadvertently changed to 201111111, which is a wrong date. Change it to current date, and remove the comment that was supposed to remind me to fix it before committing.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/780571cc9fcfc1d2c4a0212c19975f2ef0b2eb42">http://git.postgresql.org/pg/commitdiff/780571cc9fcfc1d2c4a0212c19975f2ef0b2eb42</a></li>

</ul>

<p>Andrew Dunstan a poussé&nbsp;:</p>

<ul>

<li>Do not treat a superuser as a member of every role for HBA purposes. This makes it possible to use reject lines with group roles. Andrew Dunstan, reviewed by Robert Haas.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94cd0f1ad8af722a48a30a1087377b52ca99d633">http://git.postgresql.org/pg/commitdiff/94cd0f1ad8af722a48a30a1087377b52ca99d633</a></li>

<li>Role membership of superusers is only by explicit membership for HBA. Document that this rule applies to 'samerole' as well as to named roles. Per gripe from Tom Lane.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f66c8252ab9a64dd49a0af2b481a2621dd008768">http://git.postgresql.org/pg/commitdiff/f66c8252ab9a64dd49a0af2b481a2621dd008768</a></li>

</ul>

<p>Alvaro Herrera a poussé&nbsp;:</p>

<ul>

<li>Implement a dry-run mode for isolationtester. This mode prints out the permutations that would be run by the given spec file, in the same format used by the permutation lines in spec files. This helps in building new spec files. Author: Alexander Shulgin, with some tweaks by me

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ed36056751cc900418871b39595100cbb06de21">http://git.postgresql.org/pg/commitdiff/7ed36056751cc900418871b39595100cbb06de21</a></li>

<li>Unbreak isolationtester on Win32. I broke it in a previous commit because I neglected to install the necessary incantations to have getopt() work on Windows. Per red blots in buildfarm.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e145891c984540a86788f88b604c766c934b17ea">http://git.postgresql.org/pg/commitdiff/e145891c984540a86788f88b604c766c934b17ea</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Scott Mead sent in two revisions of a patch to see some context around &lt;IDLE&gt; IN TRANSACTION.</li>

<li>Shigeru HANADA sent in another revision of the patch to add a PostgreSQL FDW.</li>

<li>Peter Eisentraut sent in another revision of the patch to enable psql to switch automatically between normal and \x mode depending on the width of the output.</li>

<li>Robert Haas sent in three revisions of a patch to drop the "=&gt;" notation from hstore.</li>

<li>Andrew Dunstan sent in another revision of the patch to add an --exclude-table-data option to pg_dump.</li>

<li>KaiGai Kohei sent in two more revisions of the patch to fix certain types of information leaks in VIEWs.</li>

<li>Andrew Dunstan sent in another revision of the patch to add a \setenv command to psql.</li>

<li>KaiGai Kohei sent in a patch to add checks for INSERT permission on new tables constructed by SELECT INTO or CREATE TABLE AS.</li>

<li>Simon Riggs and Robert Haas traded revisions of a patch to skip busy pages during VACUUM.</li>

<li>Alvaro Herrera sent in another revision of the patch to add foreign key locks.</li>

<li>Pavan Deolasee sent in a patch to store hot members of PGPROC out of band, a performance optimization.</li>

<li>Gabriele Bartolini sent in a WIP patch to allow arrays to be foreign keys to scalar primary keys.</li>

<li>Tomas Vondra sent in a patch that would allow optional "cleaning" of queries tracked in pg_stat_statements, compressing the result and making it more readable.</li>

<li>Greg Smith sent in a patch adds a new function to the pageinspect extension for measuring total free space, in either tables or indexes. It returns the free space as a percentage, so higher numbers mean more bloat.</li>

<li>J Smith sent in a fix to some corner-case bugs in the unaccent module.</li>

</ul>