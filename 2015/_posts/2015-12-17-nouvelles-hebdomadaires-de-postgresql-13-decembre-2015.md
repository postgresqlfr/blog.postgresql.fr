---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 décembre 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-12-17-nouvelles-hebdomadaires-de-postgresql-13-decembre-2015 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Clean up some problems in new Perl test code. Noted by Tom Lane: - PostgresNode had a BEGIN block which created files, contrary to perlmod suggestions to do that only on INIT blocks. - Assign ports randomly rather than starting from 90600. Noted by Noah Misch: - Change use of no-longer-set PGPORT environment variable to $node-&gt;port - Don't start a server in pg_controldata test - PostgresNode was reading the PID file incorrectly; test the right thing, and chomp the line we read from the PID file. - Remove an unused $devnull variable - Use 'pg_ctl kill' instead of "kill" directly, for Windos portability. - Make server log names more informative. Author: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9821492ee417a5910a60f3d1f2ed24c062eab4e0">http://git.postgresql.org/pg/commitdiff/9821492ee417a5910a60f3d1f2ed24c062eab4e0</a></li>

<li>PostgresNode: wrap correctly around port number range end. Per note from Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ac5d9b31637b1856c7ac9cb625bcca694a2790a">http://git.postgresql.org/pg/commitdiff/7ac5d9b31637b1856c7ac9cb625bcca694a2790a</a></li>

<li>Fix commit timestamp initialization. This module needs explicit initialization in order to replay WAL records in recovery, but we had broken this recently following changes to make other (stranger) scenarios work correctly. To fix, rework the initialization sequence so that it always takes place before WAL replay commences for both master and standby. I could have gone for a more localized fix that just added a "startup" call for the master server, but it seemed better to restructure the existing callers as well so that the whole thing made more sense. As a drawback, there is more control logic in xlog.c now than previously, but doing otherwise meant passing down the ControlFile flag, which seemed uglier as a whole. This also meant adding a check to not re-execute ActivateCommitTs if it had already been called. Reported by Fujii Masao. Backpatch to 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69e7235c93e2965cc0e17186bd044e4c54997c19">http://git.postgresql.org/pg/commitdiff/69e7235c93e2965cc0e17186bd044e4c54997c19</a></li>

<li>For REASSIGN OWNED for foreign user mappings As reported in bug #13809 by Alexander Ashurkov, the code for REASSIGN OWNED hadn't gotten word about user mappings. Deal with them in the same way default ACLs do, which is to ignore them altogether; they are handled just fine by DROP OWNED. The other foreign object cases are already handled correctly by both commands. Also add a REASSIGN OWNED statement to foreign_data test to exercise the foreign data objects. (The changes are just before the "cleanup" phase, so it shouldn't remove any existing live test.) Reported by Alexander Ashurkov, then independently by Jaime Casanova. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c1615531f4945e5af78ddf1d43af11b6d7b48fd">http://git.postgresql.org/pg/commitdiff/8c1615531f4945e5af78ddf1d43af11b6d7b48fd</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix another oversight in checking if a join with LATERAL refs is legal. It was possible for the planner to decide to join a LATERAL subquery to the outer side of an outer join before the outer join itself is completed. Normally that's fine because of the associativity rules, but it doesn't work if the subquery contains a lateral reference to the inner side of the outer join. In such a situation the outer join *must* be done first. join_is_legal() missed this consideration and would allow the join to be attempted, but the actual path-building code correctly decided that no valid join path could be made, sometimes leading to planner errors such as "failed to build any N-way joins". Per report from Andreas Seltenreich. Back-patch to 9.3 where LATERAL support was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e19db0c09719d7919a8fdd96a1fffe7efd2df93">http://git.postgresql.org/pg/commitdiff/7e19db0c09719d7919a8fdd96a1fffe7efd2df93</a></li>

<li>Simplify LATERAL-related calculations within add_paths_to_joinrel(). While convincing myself that commit 7e19db0c09719d79 would solve both of the problems recently reported by Andreas Seltenreich, I realized that add_paths_to_joinrel's handling of LATERAL restrictions could be made noticeably simpler and faster if we were to retain the minimum possible parameterization for each joinrel (that is, the set of relids supplying unsatisfied lateral references in it). We already retain that for baserels, in RelOptInfo.lateral_relids, so we can use that field for joinrels too. I re-pgindent'd the files touched here, which affects some unrelated comments. This is, I believe, just a minor optimization not a bug fix, so no back-patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edca44b1525b3d591263d032dc4fe500ea771e0e">http://git.postgresql.org/pg/commitdiff/edca44b1525b3d591263d032dc4fe500ea771e0e</a></li>

<li>Avoid odd portability problem in TestLib.pm's slurp_file function. For unclear reasons, this function doesn't always read the expected data in some old Perl versions. Rewriting it to avoid use of ARGV seems to dodge the problem, and this version is clearer anyway if you ask me. In passing, also improve error message in adjacent append_to_file function. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/938d797b84467ebbaed432da72d1d7f7bb266110">http://git.postgresql.org/pg/commitdiff/938d797b84467ebbaed432da72d1d7f7bb266110</a></li>

<li>Make failure to open psql's --log-file fatal. Commit 344cdff2c made failure to open the target of --output fatal. For consistency, the --log-file switch should behave similarly. Like the previous commit, back-patch to 9.5 but no further. Daniel Verite <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/521f0458dcd7bb28636250cdfce9b1a3020cff4c">http://git.postgresql.org/pg/commitdiff/521f0458dcd7bb28636250cdfce9b1a3020cff4c</a></li>

<li>Accept flex &gt; 2.5.x on Windows, too. Commit 32f15d05c fixed this in configure, but missed the similar check in the MSVC scripts. Michael Paquier, per report from Victor Wagner <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c779c49e39372c21214ad2dc5864dd78caee82d">http://git.postgresql.org/pg/commitdiff/9c779c49e39372c21214ad2dc5864dd78caee82d</a></li>

<li>Still more fixes for planner's handling of LATERAL references. More fuzz testing by Andreas Seltenreich exposed that the planner did not cope well with chains of lateral references. If relation X references Y laterally, and Y references Z laterally, then we will have to scan X on the inside of a nestloop with Z, so for all intents and purposes X is laterally dependent on Z too. The planner did not understand this and would generate intermediate joins that could not be used. While that was usually harmless except for wasting some planning cycles, under the right circumstances it would lead to "failed to build any N-way joins" or "could not devise a query plan" planner failures. To fix that, convert the existing per-relation lateral_relids and lateral_referencers relid sets into their transitive closures; that is, they now show all relations on which a rel is directly or indirectly laterally dependent. This not only fixes the chained-reference problem but allows some of the relevant tests to be made substantially simpler and faster, since they can be reduced to simple bitmap manipulations instead of searches of the LateralJoinInfo list. Also, when a PlaceHolderVar that is due to be evaluated at a join contains lateral references, we should treat those references as indirect lateral dependencies of each of the join's base relations. This prevents us from trying to join any individual base relations to the lateral reference source before the join is formed, which again cannot work. Andreas' testing also exposed another oversight in the "dangerous PlaceHolderVar" test added in commit 85e5e222b1dd02f1. Simply rejecting unsafe join paths in joinpath.c is insufficient, because in some cases we will end up rejecting *all* possible paths for a particular join, again leading to "could not devise a query plan" failures. The restriction has to be known also to join_is_legal and its cohort functions, so that they will not select a join for which that will happen. I chose to move the supporting logic into joinrels.c where the latter functions are. Back-patch to 9.3 where LATERAL support was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acfcd45cacb6df23edba4cb3753a2be594238a99">http://git.postgresql.org/pg/commitdiff/acfcd45cacb6df23edba4cb3753a2be594238a99</a></li>

<li>Get rid of the planner's LateralJoinInfo data structure. I originally modeled this data structure on SpecialJoinInfo, but after commit acfcd45cacb6df23 that looks like a pretty poor decision. All we really need is relid sets identifying laterally-referenced rels; and most of the time, what we want to know about includes indirect lateral references, a case the LateralJoinInfo data was unsuited to compute with any efficiency. The previous commit redefined RelOptInfo.lateral_relids as the transitive closure of lateral references, so that it easily supports checking indirect references. For the places where we really do want just direct references, add a new RelOptInfo field direct_lateral_relids, which is easily set up as a copy of lateral_relids before we perform the transitive closure calculation. Then we can just drop lateral_info_list and LateralJoinInfo and the supporting code. This makes the planner's handling of lateral references noticeably more efficient, and shorter too. Such a change can't be back-patched into stable branches for fear of breaking extensions that might be looking at the planner's data structures; but it seems not too late to push it into 9.5, so I've done so. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4fcf48450d38e28e69e629c779a7866183d8ea41">http://git.postgresql.org/pg/commitdiff/4fcf48450d38e28e69e629c779a7866183d8ea41</a></li>

<li>Install our "missing" script where PGXS builds can find it. This allows sane behavior in a PGXS build done on a machine where build tools such as bison are missing. Jim Nasby <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dccf8e9e608824ce15d3b2d7ee63afbf1147c5e9">http://git.postgresql.org/pg/commitdiff/dccf8e9e608824ce15d3b2d7ee63afbf1147c5e9</a></li>

<li>Add an expected-file to match behavior of latest libxml2. Recent releases of libxml2 do not provide error context reports for errors detected at the very end of the input string. This appears to be a bug, or at least an infelicity, introduced by the fix for libxml2's CVE-2015-7499. We can hope that this behavioral change will get undone before too long; but the security patch is likely to spread a lot faster/further than any follow-on cleanup, which means this behavior is likely to be present in the wild for some time to come. As a stopgap, add a variant regression test expected-file that matches what you get with a libxml2 that acts this way. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/085423e3e326da1b52f41aa86126f2a064a7db25">http://git.postgresql.org/pg/commitdiff/085423e3e326da1b52f41aa86126f2a064a7db25</a></li>

<li>Doc: update external URLs for PostGIS project. Paul Ramsey <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d96cd077bedcf822db7348bc564b44df8b2ab23">http://git.postgresql.org/pg/commitdiff/6d96cd077bedcf822db7348bc564b44df8b2ab23</a></li>

<li>Code and docs review for multiple -c and -f options in psql. Commit d5563d7df94488bf drew complaints from Coverity, which quite correctly complained that one copy of each -c or -f string was being leaked. What's more, simple_action_list_append was allocating enough space for still a third copy of each string as part of the SimpleActionListCell, even though that coding method had been superseded by a separate strdup operation. There were some other minor coding infelicities too. The documentation needed more work as well, eg it forgot to explain that -c causes psql not to accept any interactive input. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcbbf82d2b6caf7b156f2ec35b322e23caf1e99e">http://git.postgresql.org/pg/commitdiff/fcbbf82d2b6caf7b156f2ec35b322e23caf1e99e</a></li>

<li>Docs: document that psql's "\i -" means read from stdin. This has worked that way for a long time, maybe always, but you would not have known it from the documentation. Also back-patch the notes I added to HEAD earlier today about behavior of the "-f -" switch, which likewise have been valid for many releases. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7bd149ce2aa6af8910604eb45cc202798f563781">http://git.postgresql.org/pg/commitdiff/7bd149ce2aa6af8910604eb45cc202798f563781</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Allow foreign and custom joins to handle EvalPlanQual rechecks. Commit e7cb7ee14555cc9c5773e2c102efd6371f6f2005 provided basic infrastructure for allowing a foreign data wrapper or custom scan provider to replace a join of one or more tables with a scan. However, this infrastructure failed to take into account the need for possible EvalPlanQual rechecks, and ExecScanFetch would fail an assertion (or just overwrite memory) if such a check was attempted for a plan containing a pushed-down join. To fix, adjust the EPQ machinery to skip some processing steps when scanrelid == 0, making those the responsibility of scan's recheck method, which also has the responsibility in this case of correctly populating the relevant slot. To allow foreign scans to gain control in the right place to make use of this new facility, add a new, optional RecheckForeignScan method. Also, allow a foreign scan to have a child plan, which can be used to correctly populate the slot (or perhaps for something else, but this is the only use currently envisioned). KaiGai Kohei, reviewed by Robert Haas, Etsuro Fujita, and Kyotaro Horiguchi. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/385f337c9f39b21dca96ca4770552a10a6d5af24">http://git.postgresql.org/pg/commitdiff/385f337c9f39b21dca96ca4770552a10a6d5af24</a></li>

<li>psql: Support multiple -c and -f options, and allow mixing them. To support this, we must reconcile some historical anomalies in the behavior of -c. In particular, as a backward-incompatibility, -c no longer implies --no-psqlrc. Pavel Stehule (code) and Catalin Iacob (documentation). Review by Michael Paquier and myself. Proposed behavior per Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5563d7df94488bf0ab52ac0678e8a07e5b8297e">http://git.postgresql.org/pg/commitdiff/d5563d7df94488bf0ab52ac0678e8a07e5b8297e</a></li>

<li>Allow EXPLAIN (ANALYZE, VERBOSE) to display per-worker statistics. The original parallel sequential scan commit included only very limited changes to the EXPLAIN output. Aggregated totals from all workers were displayed, but there was no way to see what each individual worker did or to distinguish the effort made by the workers from the effort made by the leader. Per a gripe by Thom Brown (and maybe others). Patch by me, reviewed by Amit Kapila. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b287df70e4080350aa471ecca428be145581dd4d">http://git.postgresql.org/pg/commitdiff/b287df70e4080350aa471ecca428be145581dd4d</a></li>

<li>Remove redundant sentence. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c00239ea6a0612cd7d1cd604ffc5b6f73ef9fb09">http://git.postgresql.org/pg/commitdiff/c00239ea6a0612cd7d1cd604ffc5b6f73ef9fb09</a></li>

<li>Fix typo. Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/348bcd864530b4860d0fd0ffe8532f590a5779f7">http://git.postgresql.org/pg/commitdiff/348bcd864530b4860d0fd0ffe8532f590a5779f7</a></li>

<li>Improve ALTER POLICY tab completion. Complete "ALTER POLICY" with a policy name, as we do for DROP POLICY. And, complete "ALTER POLICY polname ON" with a table name that has such a policy, as we do for DROP POLICY, rather than with any table name at all. Masahiko Sawada <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b469bd7c4dc3649c74b746545210b435df319cb">http://git.postgresql.org/pg/commitdiff/8b469bd7c4dc3649c74b746545210b435df319cb</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Improve performance in freeing memory contexts The single linked list of memory contexts could result in O(N^2) performance to free a set of contexts if they were not freed in reverse order of creation. In many cases the reverse order was used, but there were some significant exceptions that caused real- world performance problems. Rather than requiring all callers to care about the order in which contexts were freed, and hunting down and changing all existing cases where the wrong order was used, we add one pointer per memory context so that the implementation details are not so visible. Jan Wieck <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25c539233044c235e97fd7c9dc600fb5f08fe065">http://git.postgresql.org/pg/commitdiff/25c539233044c235e97fd7c9dc600fb5f08fe065</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix ON CONFLICT UPDATE bug breaking AFTER UPDATE triggers. ExecOnConflictUpdate() passed t_ctid of the to-be-updated tuple to ExecUpdate(). That's problematic primarily because of two reason: First and foremost t_ctid could point to a different tuple. Secondly, and that's what triggered the complaint by Stanislav, t_ctid is changed by heap_update() to point to the new tuple version. The behavior of AFTER UPDATE triggers was therefore broken, with NEW.* and OLD.* tuples spuriously identical within AFTER UPDATE triggers. To fix both issues, pass a pointer to t_self of a on-stack HeapTuple instead. Fixing this bug lead to one change in regression tests, which previously failed due to the first issue mentioned above. There's a reasonable expectation that test fails, as it updates one row repeatedly within one INSERT ... ON CONFLICT statement. That is only possible if the second update is triggered via ON CONFLICT ... SET, ON CONFLICT ... WHERE, or by a WITH CHECK expression, as those are executed after ExecOnConflictUpdate() does a visibility check. That could easily be prohibited, but given it's allowed for plain UPDATEs and a rare corner case, it doesn't seem worthwhile. Reported-By: Stanislav Grozev Author: Andres Freund and Peter Geoghegan Discussion: CAA78GVqy1+LisN-8DygekD_Ldfy=BJLarSpjGhytOsgkpMavfQ@mail.gmail.com Backpatch: 9.5, where ON CONFLICT was introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84ac126ee728ede5b6370d60dd2b1c299f49ed2f">http://git.postgresql.org/pg/commitdiff/84ac126ee728ede5b6370d60dd2b1c299f49ed2f</a></li>

<li>Fix ALTER TABLE ... SET TABLESPACE for unlogged relations. Changing the tablespace of an unlogged relation did not WAL log the creation and content of the init fork. Thus, after a standby is promoted, unlogged relation cannot be accessed anymore, with errors like: ERROR: 58P01: could not open file "pg_tblspc/...": No such file or directory Additionally the init fork was not synced to disk, independent of the configured wal_level, a relatively small durability risk. Investigation of that problem also brought to light that, even for permanent relations, the creation of !main forks was not WAL logged, i.e. no XLOG_SMGR_CREATE record were emitted. That mostly turns out not to be a problem, because these files were created when the actual relation data is copied; nonexistent files are not treated as an error condition during replay. But that doesn't work for empty files, and generally feels a bit haphazard. Luckily, outside init and main forks, empty forks don't occur often or are not a problem. Add the required WAL logging and syncing to disk. Reported-By: Michael Paquier Author: Michael Paquier and Andres Freund Discussion: 20151210163230.GA11331@alap3.anarazel.de Backpatch: 9.1, where unlogged relations were introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f54d0629ec8bc17de932c83fc9872c31bb8da68f">http://git.postgresql.org/pg/commitdiff/f54d0629ec8bc17de932c83fc9872c31bb8da68f</a></li>

<li>Fix bug leading to restoring unlogged relations from empty files. At the end of crash recovery, unlogged relations are reset to the empty state, using their init fork as the template. The init fork is copied to the main fork without going through shared buffers. Unfortunately WAL replay so far has not necessarily flushed writes from shared buffers to disk at that point. In normal crash recovery, and before the introduction of 'fast promotions' in fd4ced523 / 9.3, the END_OF_RECOVERY checkpoint flushes the buffers out in time. But with fast promotions that's not the case anymore. To fix, force WAL writes targeting the init fork to be flushed immediately (using the new FlushOneBuffer() function). In 9.5+ that flush can centrally be triggered from the code dealing with restoring full page writes (XLogReadBufferForRedoExtended), in earlier releases that responsibility is in the hands of XLOG_HEAP_NEWPAGE's replay function. Backpatch to 9.1, even if this currently is only known to trigger in 9.3+. Flushing earlier is more robust, and it is advantageous to keep the branches similar. Typical symptoms of this bug are errors like 'ERROR: index "..." contains unexpected zero page at block 0' shortly after promoting a node. Reported-By: Thom Brown Author: Andres Freund and Michael Paquier Discussion: 20150326175024.GJ451@alap3.anarazel.de Backpatch: 9.1- <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3f4cfc7aa33f40b2b283676c9f0d5bf7ef08ccd">http://git.postgresql.org/pg/commitdiff/e3f4cfc7aa33f40b2b283676c9f0d5bf7ef08ccd</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Improve some messages <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a351705d8a7fbbc98c2449786d2ddfa845f21b6a">http://git.postgresql.org/pg/commitdiff/a351705d8a7fbbc98c2449786d2ddfa845f21b6a</a></li>

<li>pg_rewind: Don't error if the two clusters are already on the same timeline This previously resulted in an error and a nonzero exit status, but after discussion this should rather be a noop with a zero exit status. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b34e5563849edc12896bf5754e8fe7b88012697">http://git.postgresql.org/pg/commitdiff/6b34e5563849edc12896bf5754e8fe7b88012697</a></li>

<li>doc: Add some markup <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19e7ca893808f5415f9024930c56e2c4b9c16b0b">http://git.postgresql.org/pg/commitdiff/19e7ca893808f5415f9024930c56e2c4b9c16b0b</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Handle dependencies properly in ALTER POLICY. ALTER POLICY hadn't fully considered partial policy alternation (eg: change just the roles on the policy, or just change one of the expressions) when rebuilding the dependencies. Instead, it would happily remove all dependencies which existed for the policy and then only recreate the dependencies for the objects referred to in the specific ALTER POLICY command. Correct that by extracting and building the dependencies for all objects referenced by the policy, regardless of if they were provided as part of the ALTER POLICY command or were already in place as part of the pre-existing policy. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed8bec915ec570bd90d86710392fe0c181fd08fe">http://git.postgresql.org/pg/commitdiff/ed8bec915ec570bd90d86710392fe0c181fd08fe</a></li>

<li>Handle policies during DROP OWNED BY. DROP OWNED BY handled GRANT-based ACLs but was not removing roles from policies. Fix that by having DROP OWNED BY remove the role specified from the list of roles the policy (or policies) apply to, or the entire policy (or policies) if it only applied to the role specified. As with ACLs, the DROP OWNED BY caller must have permission to modify the policy or a WARNING is thrown and no change is made to the policy. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/833728d4c8832f1d37e7aeaa723c8bc4045df32e">http://git.postgresql.org/pg/commitdiff/833728d4c8832f1d37e7aeaa723c8bc4045df32e</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Properly initialize write, flush and replay locations in walsender slots. These would leak random xlog positions if a walsender used for backup would a walsender slot previously used by a replication walsender. In passing also fix a couple of cases where the xlog pointer is directly compared to zero instead of using XLogRecPtrIsInvalid, noted by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/263c19572bd4947b4cf977d61db11b74b1745570">http://git.postgresql.org/pg/commitdiff/263c19572bd4947b4cf977d61db11b74b1745570</a></li>

<li>Consistently set all fields in pg_stat_replication to null instead of 0. Previously the "sent" field would be set to 0 and all other xlog pointers be set to NULL if there were no valid values (such as when in a backup sending walsender). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a91bdf67c49ade2bdf6474607b64f9f0083db4a6">http://git.postgresql.org/pg/commitdiff/a91bdf67c49ade2bdf6474607b64f9f0083db4a6</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Michael Paquier sent in four more revisions of a patch to add in-core regression tests for replication, cascading, archiving, PITR, etc.</p>

<p>Stas Kelvich sent in another revision of a patch to add tsvector editing functions.</p>

<p>Stas Kelvich sent in another revision of a patch to add KNN support to the cube extension.</p>

<p>Fujii Masao sent in another revision of a patch to fix some error messages when connecting to older DBs.</p>

<p>YUriy Zhuravlev sent in another revision of a patch to extend the array slice syntax.</p>

<p>Haribabu Kommi sent in two more revisions of a patch to add a pg_hba_lookup function to get all matching pg_hba.conf entries.</p>

<p>Amit Langote and Amul Sul traded patches to fix some issues around NOT VALID constraints.</p>

<p>Etsuro Fujita sent in a patch to adjust a comment in src/backend/optimizer/plan/setrefs.c to be more inclusive.</p>

<p>SAWADA Masahiko sent in a patch to add tab completion to psql for the new RLS feature.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in three more revisions of a patch to add a \crosstabview command to psql.</p>

<p>Alexander Korotkov sent in another revision of a patch to move PinBuffer and UnpinBuffer to atomics.</p>

<p>Gregory Stark sent in a patch to add logical tape size to TRACE_SORT output and replace the selection sort base case with the optimal open case statement.</p>

<p>Victor Wagner sent in another revision of a patch to implement failover on the libpq connect level.</p>

<p>Stas Kelvich sent in two revisions of a patch to speed up 2PC transactions.</p>

<p>Robert Haas sent in a patch to fix an issue where a wrongly-deleted file could cause index scans and sequential scans to have totally different ideas about how many accessible blocks there are in a relation.</p>

<p>Alexander Korotkov sent in another revision of a patch to help make ResourceOwner more efficient for tables with many (thousands) partitions.</p>

<p>SAWADA Masahiko sent in two more revisions of a patch to support multiple synchronous standby servers.</p>

<p>Alexander Korotkov sent in two more revisions of a patch to rework the access method interface.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to make tab-complete easier to maintain using regex.</p>

<p>Thomas Munro sent in two more revisions of a patch to make tab-complete easier to maintain using macros.</p>

<p>Haribabu Kommi sent in two more revisions of a patch to implement parallel aggregates.</p>

<p>Aleksander Alekseev sent in a patch to fix an issue where there was unnecessary lock contention for HASHHDR.mutex.</p>

<p>Caleb Welton sent in a patch to make bootstrap (bki) changes less painful.</p>

<p>Michael Paquier sent in a patch to fix a bug in psql's tab completion for ALL IN TABLESPACE.</p>

<p>Amit Kapila sent in another revision of a patch to speed up clog access by increasing CLOG buffers.</p>

<p>Andres Freund sent in another revision of a patch to rework the way multixact truncations work.</p>

<p>Tomas Vondra sent in a patch to track the last known XLOG segment in the control file.</p>

<p>Peter Geoghegan sent in a patch to speed up CREATE INDEX CONCURRENTLY's TID sort.</p>

<p>Andres Freund sent in a patch to define an enum of builtin LWLock tranches, and move buffer LWLocks out of the main array and increase padding of locks.</p>

<p>Tom Lane refactored the way bootstrapping is done for more sanity.</p>

<p>Tomas Vondra sent in a patch to add a pg_current_xlog_flush_location() function.</p>

<p>Michael Paquier sent in a patch to fix some bugs in psql's tab completion for CREATE INDEX.</p>

<p>Craig Ringer sent in a patch to add logical decoding for sequence advances.</p>