---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 février 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/02/20/Nouvelles-hebdomadaires-de-PostgreSQL-14-février-2010"
---


<p>Bonne Année du Tigre de la part du "PostgreSQL Global Development Group"&nbsp;!</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>pgpool-II 2.3.2.1, un gestionnaire de connexions et bien plus&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>Skytools 2.1.11, un système de réplication en Python&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/skytools/">http://pgfoundry.org/projects/skytools/</a></li>

</ul>

<p><strong>La fonctionnalité 9.0 de la semaine</strong></p>

<p>Les messages d'erreur sur les violations de contrainte d'unicité sont maintenant plus détaillés.</p>

<p><strong>Offres d'emplois autour de PostgreSQL en février</strong></p>

<ul>

<li>Internationales&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-02/threads.php</a>;</li>

<li>Francophones&nbsp;:

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PUG germanophone aura un stand dans le "Project Lounge" du hall 2 au Cebit 2010 du 2 au 6 mars 2010 à Hanovre&nbsp;:

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html">http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html</a></li>

<li>Le PUG allemand aura un stand aux Linuxdays de Chemnitz les 13 et 14 mars 2010. Andreas (ads) Scherbaum y donnera une conférence sur PostgreSQL 9.0 et dirigera un atelier sur la configuration de PostgreSQL&nbsp;: <a href="http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html" target="_blank">http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html</a>

<a target="_blank" href="http://chemnitzer.linux-tage.de/2010/vortraege/plan.html">http://chemnitzer.linux-tage.de/2010/vortraege/plan.html</a></li>

<li>La "Linuxfest Northwest 2010" aura lieu à Bellingham, Washington, États-Unis les 24 et 25 avril. Conférences, réunions et mécénat sont proposables&nbsp;:

<a target="_blank" href="http://linuxfestnorthwest.org/">http://linuxfestnorthwest.org/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 3 au 7 mai 2010 sur le sujet "PostgreSQL for Corporate Use". Détails ci-dessous&nbsp;:

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html">http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html</a></li>

<li>La PgCon 2010 aura lieu les 20 &amp; 21 mai 2010 à Ottawa avec des tutoriels les 18 et 19. L'appel à conférenciers est lancé&nbsp;!

<a target="_blank" href="http://www.pgcon.org/2010/registration.php">http://www.pgcon.org/2010/registration.php</a></li>

<li>L'appel aux propositions est lancé pour l'OSCON, qui aura lieu à Portland (Oregon) du 19 au 23 juillet 2010&nbsp;:

<a target="_blank" href="http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8">http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100214">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqués</strong></p>

<p>Simon Riggs a commité&nbsp;:</p>

<ul>

<li>Revoke augmentation of WAL records for btree delete, per discussion.</li>

<li>In pgsql/src/backend/storage/ipc/standby.c, fix typo bug in Hot Standby from recent refactoring. Bug introduced into code recently patched by Andres Freund, so quickly fixed by him when bug report from Tatsuo Ishii arrived.</li>

<li>Introduce WAL records to log reuse of btree pages, allowing conflict resolution during Hot Standby. Page reuse interlock requested by Tom. Analysis and patch by me.</li>

<li>Re-enable max_standby_delay = -1 using deadlock detection on startup process. If startup waits on a buffer pin we send a request to all backends to cancel themselves if they are holding the buffer pin required and they are also waiting on a lock. If not, startup waits until max_standby_delay before cancelling any backend waiting for the requested buffer pin.</li>

<li>Fix relcache init file invalidation during Hot Standby for the case where a database has a non-default tablespaceid. Pass thru MyDatabaseId and MyDatabaseTableSpace to allow file path to be re-created in standby and correct invalidation to take place in all cases. Update and rework xact_commit_desc() debug messages. Bug report from Tom by code inspection. Fix by me.</li>

<li>In pgsql/src/backend/storage/ipc/standby.c, improvements to ps message of startup process during Hot Standby. Message is reset earlier and potential bug avoided. Andres Freund</li>

</ul>

<p>Robert Haas a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/func.sgml, minor documentation improvements for new string_agg aggregate.</li>

<li>Augment EXPLAIN output with more details on Hash nodes. We show the number of buckets, the number of batches (and also the original number if it has changed), and the peak space used by the hash table. Minor executor changes to track peak space used.</li>

<li>Tighten integrity checks on ALTER TABLE ... ALTER COLUMN ... RENAME. When a column is renamed, we recursively rename the same column in all descendent tables. But if one of those tables also inherits that column from a table outside the inheritance hierarchy rooted at the named table, we must throw an error. The previous coding correctly prohibited the rename when the parent had inherited the column from elsewhere, but overlooked the case where the parent was OK but a child table also inherited the same column from a second, unrelated parent. For now, not backpatched due to lack of complaints from the field. KaiGai Kohei, with further changes by me. Reviewed by Bernd Helme and Tom Lane.</li>

<li>Fold FindConversion() into FindConversionByName() and remove ACL check. All callers of FindConversionByName() already do suitable permissions checking already apart from this function, but this is not just dead code removal: the unnecessary permissions check can actually lead to spurious failures - there's no reason why inability to execute the underlying function should prohibit renaming the conversion, for example. (The error messages in these cases were also rather poor: FindConversion would return InvalidOid, eventually leading to a complaint that the conversion "did not exist", which was not correct.) KaiGai Kohei.</li>

<li>Wrap calls to SearchSysCache and related functions using macros. The purpose of this change is to eliminate the need for every caller of SearchSysCache, SearchSysCacheCopy, SearchSysCacheExists, GetSysCacheOid, and SearchSysCacheList to know the maximum number of allowable keys for a syscache entry (currently 4). This will make it far easier to increase the maximum number of keys in a future release should we choose to do so, and it makes the code shorter, too. Design and review by Tom Lane.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plperl.sgml, remove tabs in sgml.</li>

<li>Proofreading improvements for the Administration documentation book.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, mention "unquoted" identifiers are case-insensitive.</li>

<li>In pgsql/contrib/intagg/Makefile, rewrite intagg/Makefile from scratch, to avoid copyright mention.</li>

<li>In pgsql/doc/src/sgml/Makefile, add SGML 'check-tabs' Makefile rule to check for tabs.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, update high availability/replication documentation chart for new hot standby featureset.</li>

<li>Add C comments that HEAP_MOVED_* define usage is only for pre-9.0 binary upgrades.</li>

<li>In pgsql/src/backend/tcop/pquery.c, improve C comment about why we return "0 0" for some tags.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Fixed NaN/Infinity problems in ECPG for float/double/numeric/decimal by making it OS independant. Patch done by Zoltán Böszörményi.</li>

<li>Fixed some typos in ECPG regression test suite that resulted in regression test failures on some architectures. Fix by Zoltan Boszormenyi</li>

<li>Streamlined array handling code in libecpg a little bit, in the process fixing yet another incorrect log output.</li>

<li>Usage of isnan() in ECPG regression tests probably needs '#include ' as well.</li>

<li>First try to make this one ecpg regression test work on Windows too. I'm just trying to figure out the minimal amount of defines needed.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>The particular table names used in the new inheritance regression test are prone to sort differently in different locales, as seen in buildfarm results. Let's cast to name not text to avoid that.</li>

<li>CLUSTER specified the wrong namespace when renaming toast tables of temporary relations (they don't live in pg_toast). This caused an Assert failure in assert-enabled builds. So far as I can see, in a non-assert build it would only have messed up the checks for conflicting names, so a failure would be quite improbable but perhaps not impossible.</li>

<li>In pgsql/src/backend/storage/ipc/standby.c, fix assorted poorly-thought-out message strings: use %u not %d for printing OIDs, avoid random line breaks in strings somebody might grep for.</li>

<li>Assorted cleanups in preparation for using a map file to support altering the relfilenode of currently-not-relocatable system catalogs. 1. Get rid of inval.c's dependency on relfilenode, by not having it emit smgr invalidations as a result of relcache flushes. Instead, smgr sinval messages are sent directly from smgr.c when an actual relation delete or truncate is done. This makes considerably more structural sense and allows elimination of a large number of useless smgr inval messages that were formerly sent even in cases where nothing was changing at the physical-relation level. Note that this reintroduces the concept of nontransactional inval messages, but that's okay --- because the messages are sent by smgr.c, they will be sent in Hot Standby slaves, just from a lower logical level than before. 2. Move setNewRelfilenode out of catalog/index.c, where it never logically belonged, into relcache.c; which is a somewhat debatable choice as well but better than before. (I considered catalog/storage.c, but that seemed too low level.) Rename to RelationSetNewRelfilenode. 3. Cosmetic cleanups of some other relfilenode manipulations.</li>

<li>Fix timing-sensitive regression test result I just created :-( --- the DROP USER at the end of the cluster.sql test could fail, if the temp table created in the previous session hadn't finished getting dropped. Unluckily, I didn't see this in several repetitions of the parallel regression tests, but it's popping up on quite a few buildfarm machines.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/execute.c, add #include --- guessing the lack of this is why Windows machines are all rejecting isinf() calls in this file.</li>

<li>In pgsql/src/backend/parser/parse_utilcmd.c, fix unwarranted assumption that a cached rowtype would stick around for the lifespan of the CreateStmt. Per buildfarm member jaguar.</li>

<li>Forgot to back-patch CLUSTER test fix to 8.4.</li>

<li>Restructure CLUSTER/newstyle VACUUM FULL/ALTER TABLE support so that swapping of old and new toast tables can be done either at the logical level (by swapping the heaps' reltoastrelid links) or at the physical level (by swapping the relfilenodes of the toast tables and their indexes). This is necessary infrastructure for upcoming changes to support CLUSTER/VAC FULL on shared system catalogs, where we cannot change reltoastrelid. The physical swap saves a few catalog updates too. We unfortunately have to keep the logical-level swap logic because in some cases we will be adding or deleting a toast table, so there's no possibility of a physical swap. However, that only happens as a consequence of schema changes in the table, which we do not need to support for system catalogs, so such cases aren't an obstacle for that. In passing, refactor the cluster support functions a little bit to eliminate unnecessarily-duplicated code; and fix the problem that while CLUSTER had been taught to rename the final toast table at need, ALTER TABLE had not.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, three out of four of us like this phrasing better.</li>

<li>In pgsql/src/port/rint.c, avoid changing the sign of zero. Per buildfarm failures.</li>

<li>Create a "relation mapping" infrastructure to support changing the relfilenodes of shared or nailed system catalogs. This has two key benefits: 1. The new CLUSTER-based VACUUM FULL can be applied safely to all catalogs. 2. We no longer have to use an unsafe reindex-in-place approach for reindexing shared catalogs. CLUSTER on nailed catalogs now works too, although I left it disabled on shared catalogs because the resulting pg_index.indisclustered update would only be visible in one database. Since reindexing shared system catalogs is now fully transactional and crash-safe, the former special cases in REINDEX behavior have been removed; shared catalogs are treated the same as non-shared. This commit does not do anything about the recently-discussed problem of deadlocks between VACUUM FULL/CLUSTER on a system catalog and other concurrent queries; will address that in a separate patch. As a stopgap, parallel_schedule has been tweaked to run vacuum.sql by itself, to avoid such failures during the regression tests.</li>

<li>In pgsql/src/backend/utils/cache/relmapper.c, looks like we need #include here on some platforms. Per buildfarm.</li>

<li>Work around deadlock problems with VACUUM FULL/CLUSTER on system catalogs, as per my recent proposal. First, teach IndexBuildHeapScan to not wait for INSERT_IN_PROGRESS or DELETE_IN_PROGRESS tuples to commit unless the index build is checking uniqueness/exclusion constraints. If it isn't, there's no harm in just indexing the in-doubt tuple. Second, modify VACUUM FULL/CLUSTER to suppress reverifying uniqueness/exclusion constraint properties while rebuilding indexes of the target relation. This is reasonable because these commands aren't meant to deal with corrupted-data situations. Constraint properties will still be rechecked when an index is rebuilt by a REINDEX command. This gets us out of the problem that new-style VACUUM FULL would often wait for other transactions while holding exclusive lock on a system catalog, leading to probable deadlock because those other transactions need to look at the catalogs too. Although the real ultimate cause of the problem is a debatable choice to release locks early after modifying system catalogs, changing that choice would require pretty serious analysis and is not something to be undertaken lightly or on a tight schedule. The present patch fixes the problem in a fairly reasonable way and should also improve the speed of VACUUM FULL/CLUSTER a little bit.</li>

<li>Remove old-style VACUUM FULL (which was known for a little while as VACUUM FULL INPLACE), along with a boatload of subsidiary code and complexity. Per discussion, the use case for this method of vacuuming is no longer large enough to justify maintaining it; not to mention that we don't wish to invest the work that would be needed to make it play nicely with Hot Standby. Aside from the code directly related to old-style VACUUM FULL, this commit removes support for certain WAL record types that could only be generated within VACUUM FULL, redirect-pointer removal in heap_page_prune, and nontransactional generation of cache invalidation sinval messages (the last being the sticking point for Hot Standby). We still have to retain all code that copes with finding HEAP_MOVED_OFF and HEAP_MOVED_IN flag bits on existing tuples. This can't be removed as long as we want to support in-place update from pre-9.0 databases.</li>

<li>In pgsql/src/backend/access/gist/gistvacuum.c, remove some more dead VACUUM-FULL-only code.</li>

<li>Remove CatalogCacheFlushRelation, and the reloidattr infrastructure that was needed by nothing else. The restructuring I just finished doing on cache management exposed to me how silly this routine was. Its function was to go into the catcache and blow away all entries related to a given relation when there was a relcache flush on that relation. However, there is no point in removing a catcache entry if the catalog row it represents is still valid --- and if it isn't valid, there must have been a catcache entry flush on it, because that's triggered directly by heap_update or heap_delete on the catalog row. So this routine accomplished nothing except to blow away valid cache entries that we'd very likely be wanting in the near future to help reconstruct the relcache entry. Dumb. On top of which, it required a subtle and easy-to-get-wrong attribute in syscache definitions, ie, the column containing the OID of the related relation if any. Removing that is a very useful maintenance simplification.</li>

<li>In pgsql/src/backend/commands/vacuum.c, fix serious performance bug in new implementation of VACUUM FULL: cluster_rel necessarily builds an all-new toast table, so it's useless to then go and VACUUM FULL the toast table.</li>

<li>Create an official API function for C functions to use to check if they are being called as aggregates, and to get the aggregate transition state memory context if needed. Use it instead of poking directly into AggState and WindowAggState in places that shouldn't know so much. We should have done this in 8.4, probably, but better late than never. Revised version of a patch by Hitoshi Harada.</li>

<li>In pgsql/src/backend/commands/vacuumlazy.c, rearrange lazy-vacuum code a little bit to reduce the window between truncating the table and transaction commit. This isn't really making it safe, but at least there is no good reason to do free space map cleanup within the risk window. Don't lock out cancel interrupts until we have to, either.</li>

<li>In pgsql/src/backend/storage/freespace/freespace.c, allow free space map vacuuming to be interrupted.</li>

<li>Fix up rickety handling of relation-truncation interlocks. Move rd_targblock, rd_fsm_nblocks, and rd_vm_nblocks from relcache to the smgr relation entries, so that they will get reset to InvalidBlockNumber whenever an smgr-level flush happens. Because we now send smgr invalidation messages immediately (not at end of transaction) when a relation truncation occurs, this ensures that other backends will reset their values before they next access the relation. We no longer need the unreliable assumption that a VACUUM that's doing a truncation will hold its AccessExclusive lock until commit --- in fact, we can intentionally release that lock as soon as we've completed the truncation. This patch therefore reverts (most of) Alvaro's patch of 2009-11-10, as well as my marginal hacking on it yesterday. We can also get rid of assorted no-longer-needed relcache flushes, which are far more expensive than an smgr flush because they kill a lot more state. In passing this patch fixes smgr_redo's failure to perform visibility-map truncation, and cleans up some rather dubious assumptions in freespace.c and visibilitymap.c about when rd_fsm_nblocks and rd_vm_nblocks can be out of date.</li>

<li>In pgsql/src/backend/optimizer/plan/planner.c, improve planner's choices about when to use hashing vs sorting for DISTINCT. The previous coding missed a bet by sometimes picking the "sorted" path from query_planner even though hashing would be preferable. To fix, we have to be willing to make the choice sooner. This contorts things a little bit, but I thought of a factorization that makes it not too awful.</li>

<li>In pgsql/src/backend/utils/misc/rbtree.c, suppress uninitialized-variable warning.</li>

<li>Extend the set of frame options supported for window functions. This patch allows the frame to start from CURRENT ROW (in either RANGE or ROWS mode), and it also adds support for ROWS n PRECEDING and ROWS n FOLLOWING start and end points. (RANGE value PRECEDING/FOLLOWING isn't there yet --- the grammar works, but that's all.) Hitoshi Harada, reviewed by Pavel Stehule</li>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, don't choke when exec_move_row assigns a synthesized null to a column that happens to be composite itself. Per bug #5314 from Oleg Serov. Backpatch to 8.0 --- 7.4 has got too many other shortcomings in composite-type support to make this worth worrying about in that branch.</li>

<li>Tweak the order of processing of WITH clauses so that they are processed before we start analyzing the parent statement. This is to make it more clear that the WITH isn't affected by anything in the parent. I don't believe there's any actual bug here, because the stuff that was being done before WITH didn't affect subqueries; but it's certainly a potential for error (and apparently misled Marko into committing some real errors...).</li>

<li>Support inlining various small performance-critical functions on non-GCC compilers, by applying a configure check to see if the compiler will accept an unreferenced "static inline foo ..." function without warnings. It is believed that such warnings are the only reason not to declare inlined functions in headers, if the compiler understands "inline" at all. Kurt Harriman</li>

<li>In pgsql/src/include/utils/palloc.h, don't expose the inline definition of MemoryContextSwitchTo when FRONTEND is defined. Its reference to CurrentMemoryContext causes link failures on some platforms, evidently because the inline function gets compiled despite lack of use. Per buildfarm member warthog.</li>

<li>In pgsql/doc/src/sgml/ref/create_function.sgml, document the behavior of STRICT VARIADIC functions.</li>

<li>In pgsql/doc/src/sgml/ref/create_function.sgml, ooops, let's get the non-null vs null bit right ...</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tutorial/basics.source, remove copyright mention of Andrew Yu, per author's permission. Backpatch to 8.4.X.</li>

<li>In pgsql/src/port/rint.c, rewrite rint() to enable removal of copyright mention; patch from Nathan Wagner. Function is simpler too.</li>

<li>Remove /contrib/isn copyright mention for German Mendez Bravo, with author's permission.</li>

<li>In pgsql/doc/src/sgml/plperl.sgml, improve PL/Perl documentation of database access functions. Alexey Klyukin.</li>

<li>Have tab checking as part of gmake check.</li>

<li>Properly document that OVER and WINDOW are Postgres reserved words.</li>

<li>In pgsql/src/backend/utils/init/postinit.c, add C comment about process_settings() setting order.</li>

<li>Document that archive_timeout will force new WAL files even if a single checkpoint has happened, and recommend adjusting checkpoint_timeout to reduce the impact of this.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, mention warm and now "hot" standby servers in the high availability docs.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, remove tabs from sgml.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Make RADIUS authentication use pg_getaddrinfo_all() to get address of the server. Gets rid of a fairly ugly hack for Solaris, and also provides hostname and IPV6 support.</li>

<li>In pgsql/src/backend/port/win32/mingwcompat.c, define the value for in6addr_any on MingW, since it provides the struct only in the header files and not in any libraries, yet declare it as an extern.</li>

<li>In pgsql/src/backend/port/win32/mingwcompat.c, typo fix, per Thom Brown.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, make the msvc build system ask python about details of version and installation prefix, instead of assuming it will always be following the default layout. All information we need is not available on Windows, but the number of assumptions are at least fewer this way than before. Based on suggestions from James William Pye.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>Add a message type header to the CopyData messages sent from primary to standby in streaming replication. While we only have one message type at the moment, adding a message type header makes this easier to extend.</li>

<li>Move the responsibility of writing a "unlogged WAL operation" record from heap_sync() to the callers, because heap_sync() is sometimes called even if the operation itself is WAL-logged. This eliminates the bogus unlogged records from CLUSTER that Simon Riggs reported, patch by Fujii Masao.</li>

<li>Add a note to the documentation of pg_standby that it's important that the postgres process has permissions to delete the trigger file, per suggestion by Mason Hale. Also fix pg_standby to do a more predictable exit(200) instead of the current exit(-1) when the unlink of the trigger file fails anyway. This only affects 8.3 branch. Older versions didn't have pg_standby, and in 8.4 upwards pg_standby is no longer responsible for deleting the trigger file; it's supposed to be done by recovery_end_command instead.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, remove piece of code to zero out minRecoveryPoint when starting crash recovery. It's zeroed out whenever a checkpoint is written, so the only scenario where the removed code did anything is when you kill archive recovery, remove recovery.conf, and start up the server, so that it goes into crash recovery instead. That's a "don't do that" scenario, but it seems better to not clear minRecoveryPoint but instead update it like we do in archive recovery, which is what will now happen.</li>

<li>In pgsql/src/backend/catalog/storage.c, remove obsolete comment about 'fsm' argument, which isn't an argument anymore.</li>

<li>Move "Warm Standby Servers for High Availability" and "Hot Standby" sections under "High Availability, Load Balancing, and Replication" chapter. Streaming replication chapter needs a lot more work, but this commit just moves things around.</li>

<li>In pgsql/src/backend/access/gin/ginxlog.c, fix bug in GIN WAL redo cleanup function: don't free fake relcache entry while it's still being used. Backpatch to 8.4, where the fake relcache method was introduced.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, now that streaming replication switches between streaming mode and restoring from archive, the last WAL segment is not necessarily open at the end of recovery. Fix assertion that assumed that. Fujii Masao, fixing the assertion failure reported by Martin Pihlak.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, check for partial WAL files in standby mode. If restore_command restores a partial WAL file, assume it's because the file is just being copied to the archive and treat it the same as "file not found" in standby mode. pg_standby has a similar check, so it seems reasonable to have the same level of protection in the built-in standby mode.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, if primary_conninfo is not set, don't try to establish streaming connection.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, clean up Streaming Replication documentation a little bit. A lot more needs to be done, but it's a step forward.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, reduce the chatter to the log when starting a standby server. Don't echo all the recovery.conf options. Don't emit the "initializing recovery connections" message, which doesn't mean anything to a user. Remove the "starting archive recovery" message and replace the "automatic recovery in progress" message with a more informative message saying whether the server is doing PITR, normal archive recovery, or standby mode.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, update Hot Standby documentation to reflect the change in the LOG messages printed at startup. As pointed out by Simon Riggs.</li>

</ul>

<p>Joe Conway a commité&nbsp;:</p>

<ul>

<li>Check to ensure the number of primary key fields supplied does not exceed the total number of non-dropped source table fields for dblink_build_sql_*(). Addresses bug report from Rushabh Lathia. Backpatch all the way to the 7.3 branch.</li>

<li>Modify recently added PQconnectdbParams() with new argument, expand_dbname. If expand_dbname is non-zero and dbname contains an = sign, it is taken as a conninfo string in exactly the same way as if it had been passed to PQconnectdb. This is equivalent to the way PQsetdbLogin() works, allowing PQconnectdbParams() to be a complete alternative. Also improve the way the new function is called from psql and replace a previously missed call to PQsetdbLogin() in psql. Additionally use PQconnectdbParams() for pg_dump and friends, and the bin/scripts command line utilities such as vacuumdb, createdb, etc. Finally, update the documentation for the new parameter, as well as the nuances of precedence in cases where key words are repeated or duplicated in the conninfo string.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Generic implementation of red-black binary tree. It's planned to use in several places, but for now only GIN uses it during index creation. Using self-balanced tree greatly speeds up index creation in corner cases with preordered data.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Free reference in correct Perl context. Backpatch to release 8.2. Patch from Tim Bunce.</li>

<li>Add plperl.on_plperl_init and plperl.on_plperlu_init settings for language-specific startup. Rename recently added plperl.on_perl_init to plperl.on_init. Also, code cleanup for utf8 hack. Patch from Tim Bunce, reviewed by Alex Hunsaker.</li>

<li>Add regression test files inadvertantly omitted in plperl.on_plperl_init patch.</li>

</ul>

<p>Gregory Stark a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/port/copydir.c, make CREATE DATABASE safe against losing whole files by fsyncing the directory and not just the individual files. Back-patch to 8.1 -- before that we just called "cp -r" and never fsynced anything anyways.</li>

<li>Speed up CREATE DATABASE by deferring the fsyncs until after copying all the data and using posix_fadvise to nudge the OS into flushing it earlier. This also hopefully makes CREATE DATABASE avoid spamming the cache. Tests show a big speedup on Linux at least on some filesystems. Idea and patch from Andres Freund.</li>

<li>In pgsql/src/backend/commands/explain.c, display explain buffers measurements in memory units rather than blocks. Also show "Total Buffer Usage" to hint that these are totals not averages per loop.</li>

</ul>

<p>ITAGAKI Takahiro a commité&nbsp;:</p>

<ul>

<li>Add psql tab completion for DO blocks. Also adjust documentation of DO. Patch from David Fetter and subsequent discussion.</li>

<li>In pgsql/src/port/copydir.c, remove an unused variable 'dirfd'.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Leonardo Francalanci sent in another revision of the patch to speed up CLUSTER.</li>

<li>Robert Haas sent in a patch to let psql use Zoltan Boszormenyi's patch to provide a rowcount utility for SELECTs.</li>

<li>Simon Riggs sent in another revision of the patch to fix deadlock detection in hot standby.</li>

<li>Jesper Krogh sent in a patch to enable per-table configuration of TOAST_TUPLES_PER_PAGE.</li>

<li>ITAGAKI Takahiro sent in a patch to fix the behavior of the new VACUUM FULL with temp relations.</li>

<li>Fujii Masao sent in a patch to write an XLOG UNLOGGED record if WAL logging was skipped.</li>

<li>Joachim Wieland sent in four more revisions of the patch fixing LISTEN/NOTIFY behavior when the queue is full.</li>

<li>Zoltan Boszormenyi sent in four more revisions of the patch to provide a rowcount utility for SELECTs.</li>

<li>Leonardo Francalanci sent in two more revisions of the patch to fix CLUSTER behavior.</li>

<li>KaiGai Kohei sent in four more revisions of a patch to help fix large object access controls.</li>

<li>Marko (johto) Tiikkaja sent in six more revisions of the patch to add write operations to CTEs.</li>

<li>Bruce Momjian sent in a patch to fix the repeated banner issue in psql.</li>

<li>Bruce Momjian sent in a patch to control the behavior of FM in formatting strings.</li>

<li>Fujii Masao and Thom Brown sent in doc patches for Streaming Replication.</li>

<li>Marko (johto) Tiikkaja and Tom Lane sent patches (2 and 1 respectively) to fix writeable CTE behavior with empty relations.</li>

<li>ITAGAKI Takahiro sent in a patch to add the TRUNCATE+COPY optimization and --jobs=1 to pg_restore.</li>

<li>Simon Riggs sent in a patch to implement pg_standby for use as an archive_cleanup_command with a new -a option to do so.</li>

<li>Robert Haas sent in two revisions of a patch to support K-Nearest-Neighbor GiST search.</li>

<li>Arie Bikker sent in three more revisions of a patch to improve xpath support.</li>

<li>Andreas Freund sent in a patch to change FATAL to ERROR in cancelling an " in transaction" connection.</li>

<li>Simon Riggs sent in a patch to optimize GetConflictingVirtualXIDs() in roughly the same manner currently used in TransactionIdIsInProgress().</li>

<li>Andreas Freund sent in a patch to fix subtransaction cancellation in Hot Standby.</li>

</ul>