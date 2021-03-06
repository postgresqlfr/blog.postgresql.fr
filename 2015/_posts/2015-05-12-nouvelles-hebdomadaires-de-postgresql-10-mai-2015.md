---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 mai 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/05/12/Nouvelles-hebdomadaires-de-PostgreSQL-10-mai-2015"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>barman 1.4.1, un gestionnaire de sauvegarde et de restauration pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.pgbarman.org/barman-1-4-1-released/">http://www.pgbarman.org/barman-1-4-1-released/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La deuxi&egrave;me <em>Conf&eacute;rence PostgreSQL Suisse</em> se tiendra &agrave; Rapperswil les 25 &amp; 26 juin 2015&nbsp;: 

<a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></li>

<li>Il y aura une session PostgreSQL lors de la <em>database technology conference China 2015</em> &agrave; Beijing entre le 16 et le 18 avril 2015&nbsp;: 

<a target="_blank" href="http://dtcc.it168.com/list_jiabin.html">http://dtcc.it168.com/list_jiabin.html</a></li>

<li>Le pgDay Paris aura lieu le 21 avril 2015&nbsp;: 

<a target="_blank" href="http://pgday.paris/">http://pgday.paris/</a></li>

<li>Le PGDay de Belfort (France) aura lieu le 2 juin 2015&nbsp;: 

<a target="_blank" href="http://select-2-6-2015-as-pgday.org">http://select-2-6-2015-as-pgday.org</a></li>

<li>PGCon 2015 du 16 au 20 juin &agrave; Ottawa, Canada&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/">http://www.pgcon.org/2015/</a></li>

<li>La conf&eacute;rence PGDay UK aura lieu le 7 juillet 2015 &ndash; elle vise les membres de la communaut&eacute; PostgreSQL anglaise. L'appel &agrave; conf&eacute;renciers expire le 13 avril&nbsp;: 

<a target="_blank" href="http://www.postgresqlusergroup.org.uk">http://www.postgresqlusergroup.org.uk</a></li>

<li>Le <em>PGDay Campinas 2015</em> aura lieu &agrave; Campinas (Br&eacute;sil) le 7 ao&ucirc;t. L'appel &agrave; conf&eacute;renciers expire le 31 mai&nbsp;: 

<a target="_blank" href="http://pgdaycampinas.com.br/english/">http://pgdaycampinas.com.br/english/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PostgresOpen 2015, programm&eacute; &agrave; Dallas (Texas) du 16 au 18 septembre, a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.postgresopen.org/callforpapers/">http://2015.postgresopen.org/callforpapers/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>session PostgreSQL n&deg;7</em> (24 septembre 2015 &agrave; Paris) est lanc&eacute; jusqu'au 15 juin 2015&nbsp;: call-for-paper &lt;AT&gt; postgresql-sessions &lt;DOT&gt; org. 

<a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 juin&nbsp;: 

<a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150510233439.GB4821@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Second try at fixing warnings caused by commit 9b43d73b3f9bef27. Commit ef3f9e642d2b2bba suppressed one cause of warnings here, but recent clang on OS X is still unhappy because we're passing a "long" to abs(). The fact that tm_gmtoff is declared as long is no doubt a hangover from days when int might be only 16 bits; but Postgres has never been able to run on such machines, so we can just cast it to int with no worries. For consistency, also cast to int in the other uses of tm_gmtoff in this stanza. Note: this code is still broken on machines that don't follow C99 integer-division-truncates-towards-zero rules. Given the lack of complaints about it, I don't feel a large desire to complicate things enough to cope with the pre-C99 rules. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c90b85e4d9e4ae3bc26459cc54697e1adaa4315f">http://git.postgresql.org/pg/commitdiff/c90b85e4d9e4ae3bc26459cc54697e1adaa4315f</a></li>

<li>Improve procost estimates for some text search functions. The text search functions that involve parsing raw text into lexemes are remarkably CPU-intensive, so estimating them at the same cost as most other built-in functions seems like a mistake; moreover, doing so turns out to discourage the optimizer from using functional indexes on these functions. After some debate, we've agreed to raise procost from 1 to 100 for to_tsvector(), plainto_tsvector(), to_tsquery(), ts_headline(), ts_match_tt(), and ts_match_tq(), which are all the text search functions that parse raw text. Also increase procost for the 2-argument form of ts_rewrite() (tsquery_rewrite_query); while this function doesn't do text parsing, it does execute a user-supplied SQL query, so its previous procost of 1 is clearly a drastic underestimate. It seems reasonable to assign it the same cost we assign to PL functions by default, so 100 is the number here too. I did not bother bumping catversion for this change, since it does not break catalog compatibility with the server executable nor result in any regression test changes. Per complaint from Andrew Gierth and subsequent discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2503982be4ca48f48d2bb6e1d46160b23e4bb268">http://git.postgresql.org/pg/commitdiff/2503982be4ca48f48d2bb6e1d46160b23e4bb268</a></li>

<li>Fix incorrect declaration of citext's regexp_matches() functions. These functions should return SETOF TEXT[], like the core functions they are wrappers for; but they were incorrectly declared as returning just TEXT[]. This mistake had two results: first, if there was no match you got a scalar null result, whereas what you should get is an empty set (zero rows). Second, the 'g' flag was effectively ignored, since you would get only one result array even if there were multiple matches, as reported by Jeff Certain. While ignoring 'g' is a clear bug, the behavior for no matches might well have been thought to be the intended behavior by people who hadn't compared it carefully to the core regexp_matches() functions. So we should tread carefully about introducing this change in the back branches. Still, it clearly is a bug and so providing some fix is desirable. After discussion, the conclusion was to introduce the change in a 1.1 version of the citext extension (as we would need to do anyway); 1.0 still contains the incorrect behavior. 1.1 is the default and only available version in HEAD, but it is optional in the back branches, where 1.0 remains the default version. People wishing to adopt the fix in back branches will need to explicitly do ALTER EXTENSION citext UPDATE TO '1.1'. (I also provided a downgrade script in the back branches, so people could go back to 1.0 if necessary.) This should be called out as an incompatible change in the 9.5 release notes, although we'll also document it in the next set of back-branch release notes. The notes should mention that any views or rules that use citext's regexp_matches() functions will need to be dropped before upgrading to 1.1, and then recreated again afterwards. Back-patch to 9.1. The bug goes all the way back to citext's introduction in 8.4, but pre-9.1 there is no extension mechanism with which to manage the change. Given the lack of previous complaints it seems unnecessary to change this behavior in 9.0, anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b22527f29dba6395a9e950fc655d34914c960f89">http://git.postgresql.org/pg/commitdiff/b22527f29dba6395a9e950fc655d34914c960f89</a></li>

<li>citext's regexp_matches() functions weren't documented, either. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/929ca96584bef1cc7d09a8e57d26d8c3f25a92a4">http://git.postgresql.org/pg/commitdiff/929ca96584bef1cc7d09a8e57d26d8c3f25a92a4</a></li>

<li>Add missing "static" marker. Per buildfarm member pademelon. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c594c750789fd98a19dcdf974b87ba9833995cf5">http://git.postgresql.org/pg/commitdiff/c594c750789fd98a19dcdf974b87ba9833995cf5</a></li>

<li>Code review for foreign/custom join pushdown patch. Commit e7cb7ee14555cc9c5773e2c102efd6371f6f2005 included some design decisions that seem pretty questionable to me, and there was quite a lot of stuff not to like about the documentation and comments. Clean up as follows: * Consider foreign joins only between foreign tables on the same server, rather than between any two foreign tables with the same underlying FDW handler function. In most if not all cases, the FDW would simply have had to apply the same-server restriction itself (far more expensively, both for lack of caching and because it would be repeated for each combination of input sub-joins), or else risk nasty bugs. Anyone who's really intent on doing something outside this restriction can always use the set_join_pathlist_hook. * Rename fdw_ps_tlist/custom_ps_tlist to fdw_scan_tlist/custom_scan_tlist to better reflect what they're for, and allow these custom scan tlists to be used even for base relations. * Change make_foreignscan() API to include passing the fdw_scan_tlist value, since the FDW is required to set that. Backwards compatibility doesn't seem like an adequate reason to expect FDWs to set it in some ad-hoc extra step, and anyway existing FDWs can just pass NIL. * Change the API of path-generating subroutines of add_paths_to_joinrel, and in particular that of GetForeignJoinPaths and set_join_pathlist_hook, so that various less-used parameters are passed in a struct rather than as separate parameter-list entries. The objective here is to reduce the probability that future additions to those parameter lists will result in source-level API breaks for users of these hooks. It's possible that this is even a small win for the core code, since most CPU architectures can't pass more than half a dozen parameters efficiently anyway. I kept root, joinrel, outerrel, innerrel, and jointype as separate parameters to reduce code churn in joinpath.c --- in particular, putting jointype into the struct would have been problematic because of the subroutines' habit of changing their local copies of that variable. * Avoid ad-hocery in ExecAssignScanProjectionInfo. It was probably all right for it to know about IndexOnlyScan, but if the list is to grow we should refactor the knowledge out to the callers. * Restore nodeForeignscan.c's previous use of the relcache to avoid extra GetFdwRoutine lookups for base-relation scans. * Lots of cleanup of documentation and missed comments. Re-order some code additions into more logical places. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a8a4e5cde2b7755e11bde2ea7897bd650622d3e">http://git.postgresql.org/pg/commitdiff/1a8a4e5cde2b7755e11bde2ea7897bd650622d3e</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix two small bugs in json's populate_record_worker. The first bug is not releasing a tupdesc when doing an early return out of the function. The second bug is a logic error in choosing when to do an early return if given an empty jsonb object. Bug reports from Pavel Stehule and Tom Lane respectively. Backpatch to 9.4 where these were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c000fd9a68dae9ebd9d1507ab3995cc178de1e5">http://git.postgresql.org/pg/commitdiff/3c000fd9a68dae9ebd9d1507ab3995cc178de1e5</a></li>

<li>Add new OID alias type regrole. The new type has the scope of whole the database cluster so it doesn't behave the same as the existing OID alias types which have database scope, concerning object dependency. To avoid confusion constants of the new type are prohibited from appearing where dependencies are made involving it. Also, add a note to the docs about possible MVCC violation and optimization issues, which are general over the all reg* types. Kyotaro Horiguchi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c90f6769de6a60f842c916d49b404d03bcc503a">http://git.postgresql.org/pg/commitdiff/0c90f6769de6a60f842c916d49b404d03bcc503a</a></li>

<li>Add new OID alias type regnamespace. Catalog version bumped. Kyotaro HORIGUCHI 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb9fa802b32b222b43e28866c20ebb7125779ec3">http://git.postgresql.org/pg/commitdiff/cb9fa802b32b222b43e28866c20ebb7125779ec3</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix the same-rel optimization when creating WAL records. prev_regbuf was never set, and therefore the same-rel flag was never set on WAL records. Report and fix by Zhanq Zq 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec3d976bce7e322c29f1007d19b63b7a3a1a6ee4">http://git.postgresql.org/pg/commitdiff/ec3d976bce7e322c29f1007d19b63b7a3a1a6ee4</a></li>

<li>At promotion, archive last segment from old timeline with .partial suffix. Previously, we would archive the possible-incomplete WAL segment with its normal filename, but that causes trouble if the server owning that timeline is still running, and tries to archive the same segment later. It's not nice for the standby to trip up the master's archival like that. And it's pretty confusing, anyway, to have an incomplete segment in the archive that's indistinguishable from a normal, complete segment. To avoid such confusion, add a .partial suffix to the file. Or to be more precise, make a copy of the old segment under the .partial suffix, and archive that instead of the original file. pg_receivexlog also uses the .partial suffix for the same purpose, to tell apart incompletely streamed files from complete ones. There is no automatic mechanism to use the .partial files at recovery, so they will go unused, unless the administrator manually copies to them to the pg_xlog directory (and removes the .partial suffix). Recovery won't normally need the WAL - when recovering to the new timeline, it will find the same WAL on the first segment on the new timeline instead - but it nevertheless feels better to archive the file with the .partial suffix, for debugging purposes if nothing else. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de7688442f5aaa03da60416a6aa3474738718803">http://git.postgresql.org/pg/commitdiff/de7688442f5aaa03da60416a6aa3474738718803</a></li>

<li>Add macros to check if a filename is a WAL segment or other such file. We had many instances of the strlen + strspn combination to check for that. This makes the code a bit easier to read. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/179cdd098196338880bdbb39c39a788abdad4dd8">http://git.postgresql.org/pg/commitdiff/179cdd098196338880bdbb39c39a788abdad4dd8</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use outerPlanState macro instead of referring to leffttree. This makes the executor code more consistent. It also removes an apparently superfluous NULL test in nodeGroup.c. Qingqing Zhou, reviewed by Tom Lane, and further revised by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40f42d2a34329b0b71a1287d6fd2554298dbb713">http://git.postgresql.org/pg/commitdiff/40f42d2a34329b0b71a1287d6fd2554298dbb713</a></li>

<li>Recursively fsync() the data directory after a crash. Otherwise, if there's another crash, some writes from after the first crash might make it to disk while writes from before the crash fail to make it to disk. This could lead to data corruption. Back-patch to all supported versions. Abhijit Menon-Sen, reviewed by Andres Freund and slightly revised by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ce439f3379aed857517c8ce207485655000fc8e">http://git.postgresql.org/pg/commitdiff/2ce439f3379aed857517c8ce207485655000fc8e</a></li>

<li>Fix some problems with patch to fsync the data directory. pg_win32_is_junction() was a typo for pgwin32_is_junction(). open() was used not only in a two-argument form, which breaks on Windows, but also where BasicOpenFile() should have been used. Per reports from Andrew Dunstan and David Rowley. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/456ff0863851d70dce679ca3f631392589e31a33">http://git.postgresql.org/pg/commitdiff/456ff0863851d70dce679ca3f631392589e31a33</a></li>

<li>Avoid using a C++ keyword as a structure member name. Per request from Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1998261034ec7a948bb9b25b7cb88d014d371da1">http://git.postgresql.org/pg/commitdiff/1998261034ec7a948bb9b25b7cb88d014d371da1</a></li>

<li>Fix incorrect math in DetermineSafeOldestOffset. The old formula didn't have enough parentheses, so it would do the wrong thing, and it used / rather than % to find a remainder. The effect of these oversights is that the stop point chosen by the logic introduced in commit b69bf30b9bfacafc733a9ba77c9587cf54d06c0c might be rather meaningless. Thomas Munro, reviewed by Kevin Grittner, with a whitespace tweak by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7be47c56af3d3013955c91c2877c08f2a0e3e6a2">http://git.postgresql.org/pg/commitdiff/7be47c56af3d3013955c91c2877c08f2a0e3e6a2</a></li>

<li>Teach autovacuum about multixact member wraparound. The logic introduced in commit b69bf30b9bfacafc733a9ba77c9587cf54d06c0c and repaired in commits 669c7d20e6374850593cb430d332e11a3992bbcf and 7be47c56af3d3013955c91c2877c08f2a0e3e6a2 helps to ensure that we don't overwrite old multixact member information while it is still needed, but a user who creates many large multixacts can still exhaust the member space (and thus start getting errors) while autovacuum stands idly by. To fix this, progressively ramp down the effective value (but not the actual contents) of autovacuum_multixact_freeze_max_age as member space utilization increases. This makes autovacuum more aggressive and also reduces the threshold for a manual VACUUM to perform a full-table scan. This patch leaves unsolved the problem of ensuring that emergency autovacuums are triggered even when autovacuum=off. We'll need to fix that via a separate patch. Thomas Munro and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53bb309d2d5a9432d2602c93ed18e58bd2924e15">http://git.postgresql.org/pg/commitdiff/53bb309d2d5a9432d2602c93ed18e58bd2924e15</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typos. Author: Erik Rijkers &lt;er@xs4all.nl&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad8d6d064cbcc165e3033a6ed56818f711b0ffae">http://git.postgresql.org/pg/commitdiff/ad8d6d064cbcc165e3033a6ed56818f711b0ffae</a></li>

<li>doc: Update installation instructions for new shared libperl/libpython handling 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53f09657676782d5f6ccf563907fde48a6bea13c">http://git.postgresql.org/pg/commitdiff/53f09657676782d5f6ccf563907fde48a6bea13c</a></li>

<li>hstore_plpython: Support tests on Python 2.3. Python 2.3 does not have the sorted() function, so do it the long way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0574cd5aa96b988bb1f0287914dcc8b52fb01bd">http://git.postgresql.org/pg/commitdiff/c0574cd5aa96b988bb1f0287914dcc8b52fb01bd</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16c73e773bc5f2eee6a71c5ec311b8691bf9e832">http://git.postgresql.org/pg/commitdiff/16c73e773bc5f2eee6a71c5ec311b8691bf9e832</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add geometry/range functions to support BRIN inclusion. This commit adds the following functions: box(point) -&gt; box, bound_box(box, box) -&gt; box, inet_same_family(inet, inet) -&gt; bool, inet_merge(inet, inet) -&gt; cidr, range_merge(anyrange, anyrange) -&gt; anyrange. The first of these is also used to implement a new assignment cast from point to box. These functions are the first part of a base to implement an "inclusion" operator class for BRIN, for multidimensional data types. Author: Emre Hasegeli. Reviewed by: Andreas Karlsson 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b6db1f445e14bd189ebc99ce1e5535a1c624613">http://git.postgresql.org/pg/commitdiff/3b6db1f445e14bd189ebc99ce1e5535a1c624613</a></li>

<li>Improve BRIN infra, minmax opclass and regression test. The minmax opclass was using the wrong support functions when cross-datatypes queries were run. Instead of trying to fix the pg_amproc definitions (which apparently is not possible), use the already correct pg_amop entries instead. This requires jumping through more hoops (read: extra syscache lookups) to obtain the underlying functions to execute, but it is necessary for correctness. Author: Emre Hasegeli, tweaked by &Aacute;lvaro Review: Andreas Karlsson Also change BrinOpcInfo to record each stored type's typecache entry instead of just the OID. Turns out that the full type cache is necessary in brin_deform_tuple: the original code used the indexed type's byval and typlen properties to extract the stored tuple, which is correct in Minmax; but in other implementations that want to store something different, that's wrong. The realization that this is a bug comes from Emre also, but I did not use his patch. I also adopted Emre's regression test code (with smallish changes), which is more complete. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db5f98ab4fa44bc563ec62d7b1aada4fc276d9b2">http://git.postgresql.org/pg/commitdiff/db5f98ab4fa44bc563ec62d7b1aada4fc276d9b2</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix indentation that could mask a future bug. Michael Paquier, spotted using Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d678bde655892392878fdfa8a8d4e9390227ab64">http://git.postgresql.org/pg/commitdiff/d678bde655892392878fdfa8a8d4e9390227ab64</a></li>

<li>Fix minor resource leak in pg_dump. Michael Paquier, spotted using Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa7cf3eef4aa994cca086c091782c322f7c416b2">http://git.postgresql.org/pg/commitdiff/aa7cf3eef4aa994cca086c091782c322f7c416b2</a></li>

<li>Properly send SCM status updates when shutting down service on Windows. The Service Control Manager should be notified regularly during a shutdown that takes a long time. Previously we would increaes the counter, but forgot to actually send the notification to the system. The loop counter was also incorrectly initalized in the event that the startup of the system took long enough for it to increase, which could cause the shutdown process not to wait as long as expected. Krystian Bigaj, reviewed by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a241d22ae9f170ac32937dd053676564e58fbc3">http://git.postgresql.org/pg/commitdiff/1a241d22ae9f170ac32937dd053676564e58fbc3</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Makefile: Add comment that doc uninstall clears man directories. Report by Mario Valdez 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82ec7c95b701d18530eb4eed923a305a0d82bdaf">http://git.postgresql.org/pg/commitdiff/82ec7c95b701d18530eb4eed923a305a0d82bdaf</a></li>

<li>doc: adjust ordering of pg_stat_statement paragraphs. Clarify installation instructions. Patch by Ian Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da31c5ed79d93bb02d6ff9cd81497e5151de7b63">http://git.postgresql.org/pg/commitdiff/da31c5ed79d93bb02d6ff9cd81497e5151de7b63</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Represent columns requiring insert and update privileges indentently. Previously, relation range table entries used a single Bitmapset field representing which columns required either UPDATE or INSERT privileges, despite the fact that INSERT and UPDATE privileges are separately cataloged, and may be independently held. As statements so far required either insert or update privileges but never both, that was sufficient. The required permission could be inferred from the top level statement run. The upcoming INSERT ... ON CONFLICT UPDATE feature needs to independently check for both privileges in one statement though, so that is not sufficient anymore. Bumps catversion as stored rules change. Author: Peter Geoghegan. Reviewed-By: Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c8f4836db058d0715bc30a30655d646287ba509">http://git.postgresql.org/pg/commitdiff/2c8f4836db058d0715bc30a30655d646287ba509</a></li>

<li>Remove dependency on ordering in logical decoding upsert test. Buildfarm member magpie sorted the output differently than intended by Peter. "Resolve" the problem by simply not aggregating, it's not that many lines. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/581f4f9657fc3ab08199d02c0a4ea89c658882a6">http://git.postgresql.org/pg/commitdiff/581f4f9657fc3ab08199d02c0a4ea89c658882a6</a></li>

<li>Add support for INSERT ... ON CONFLICT DO NOTHING/UPDATE. The newly added ON CONFLICT clause allows to specify an alternative to raising a unique or exclusion constraint violation error when inserting. ON CONFLICT refers to constraints that can either be specified using a inference clause (by specifying the columns of a unique constraint) or by naming a unique or exclusion constraint. DO NOTHING avoids the constraint violation, without touching the pre-existing row. DO UPDATE SET ... [WHERE ...] updates the pre-existing tuple, and has access to both the tuple proposed for insertion and the existing tuple; the optional WHERE clause can be used to prevent an update from being executed. The UPDATE SET and WHERE clauses have access to the tuple proposed for insertion using the "magic" EXCLUDED alias, and to the pre-existing tuple using the table name or its alias. This feature is often referred to as upsert. This is implemented using a new infrastructure called "speculative insertion". It is an optimistic variant of regular insertion that first does a pre-check for existing tuples and then attempts an insert. If a violating tuple was inserted concurrently, the speculatively inserted tuple is deleted and a new attempt is made. If the pre-check finds a matching tuple the alternative DO NOTHING or DO UPDATE action is taken. If the insertion succeeds without detecting a conflict, the tuple is deemed inserted. To handle the possible ambiguity between the excluded alias and a table named excluded, and for convenience with long relation names, INSERT INTO now can alias its target table. Bumps catversion as stored rules change. Author: Peter Geoghegan, with significant contributions from Heikki Linnakangas and Andres Freund. Testing infrastructure by Jeff Janes. Reviewed-By: Heikki Linnakangas, Andres Freund, Robert Haas, Simon Riggs, Dean Rasheed, Stephen Frost and many others. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/168d5805e4c08bed7b95d351bf097cff7c07dd65">http://git.postgresql.org/pg/commitdiff/168d5805e4c08bed7b95d351bf097cff7c07dd65</a></li>

<li>Minor ON CONFLICT related comments and doc fixes. Geoff Winkless, Stephen Frost, Peter Geoghegan and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8898e9169c851c2b8c98f981c1c4755a5758f8e">http://git.postgresql.org/pg/commitdiff/e8898e9169c851c2b8c98f981c1c4755a5758f8e</a></li>

<li>Fix two problems in infer_arbiter_indexes(). The first is a pretty simple bug where a relcache entry is used after the relation is closed. In this particular situation it does not appear to have bad consequences unless compiled with RELCACHE_FORCE_RELEASE. The second is that infer_arbiter_indexes() skipped indexes that aren't yet valid according to indcheckxmin. That's not required here, because uniqueness checks don't care about visibility according to an older snapshot. While thats not really a bug, it makes things undesirably non-deterministic. There is some hope that this explains a test failure on buildfarm member jaguarundi. Discussion: 9096.1431102730@sss.pgh.pa.us 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bab64ef9e8bc56fa5db9bd41cefb54c3d8051dbe">http://git.postgresql.org/pg/commitdiff/bab64ef9e8bc56fa5db9bd41cefb54c3d8051dbe</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove reference to src/tools/backend/index.html. src/tools/backend was removed back in 63f1ccd, but backend/storage/lmgr/README didn't get the memo. Author: Amit Langote 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/195fbd40123b85ba8a44ca273b17d699e30ec6a8">http://git.postgresql.org/pg/commitdiff/195fbd40123b85ba8a44ca273b17d699e30ec6a8</a></li>

<li>Add pg_file_settings view and function. The function and view added here provide a way to look at all settings in postgresql.conf, any #include'd files, and postgresql.auto.conf (which is what backs the ALTER SYSTEM command). The information returned includes the configuration file name, line number in that file, sequence number indicating when the parameter is loaded (useful to see if it is later masked by another definition of the same parameter), parameter name, and what it is set to at that point. This information is updated on reload of the server. This is unfiltered, privileged, information and therefore access is restricted to superusers through the GRANT system. Author: Sawada Masahiko, various improvements by me. Reviewers: David Steele 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a97e0c3354ace5d74c6873cd5e98444757590be8">http://git.postgresql.org/pg/commitdiff/a97e0c3354ace5d74c6873cd5e98444757590be8</a></li>

<li>Bump catversion for pg_file_settings. Pointed out by Andres (thanks!) Apologies for not including it in the initial patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b342fb591ebb556cab18fc999c8710e9733e5bb">http://git.postgresql.org/pg/commitdiff/4b342fb591ebb556cab18fc999c8710e9733e5bb</a></li>

<li>Modify pg_stat_get_activity to build a tuplestore. This updates pg_stat_get_activity() to build a tuplestore for its results instead of using the old-style multiple-call method. This simplifies the function, though that wasn't the primary motivation for the change, which is that we may turn it into a helper function which can filter the results (or not) much more easily. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f91feba8776eb66008cdb73b3a8c0c7c08cc54d9">http://git.postgresql.org/pg/commitdiff/f91feba8776eb66008cdb73b3a8c0c7c08cc54d9</a></li>

<li>Change default for include_realm to 1. The default behavior for GSS and SSPI authentication methods has long been to strip the realm off of the principal, however, this is not a secure approach in multi-realm environments and the use-case for the parameter at all has been superseded by the regex-based mapping support available in pg_ident.conf. Change the default for include_realm to be '1', meaning that we do NOT remove the realm from the principal by default. Any installations which depend on the existing behavior will need to update their configurations (ideally by leaving include_realm set to 1 and adding a mapping in pg_ident.conf, but alternatively by explicitly setting include_realm=0 prior to upgrading). Note that the mapping capability exists in all currently supported versions of PostgreSQL and so this change can be done today. Barring that, existing users can update their configurations today to explicitly set include_realm=0 to ensure that the prior behavior is maintained when they upgrade. This needs to be noted in the release notes. Per discussion with Magnus and Peter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a0884176fdfa51551d6a3b26fa0e1b216c3e4c2">http://git.postgresql.org/pg/commitdiff/9a0884176fdfa51551d6a3b26fa0e1b216c3e4c2</a></li>

<li>Improve ParseConfigFp comment wrt head/tail. The head_p and tail_p pointers passed to ParseConfigFp() are actually input/output parameters, not strictly output paramaters. This updates the function comment to reflect that. Per discussion with Tom. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0cf56f14dd15532fec930b502cb6457023b01ef8">http://git.postgresql.org/pg/commitdiff/0cf56f14dd15532fec930b502cb6457023b01ef8</a></li>

<li>Correct reindexdb documentation. --schema takes a schema, not a table. Author: Sawada Masahiko 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0a4b20bb9f91bdc0d60ff8732ee0195b0dfdd73">http://git.postgresql.org/pg/commitdiff/f0a4b20bb9f91bdc0d60ff8732ee0195b0dfdd73</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in a patch to fix a potential pointer dereference in plperl.c caused by transforms patch.</li>

<li>Petr Korobeinikov sent in a patch to add \ev and \sv to edit and show the creation scripts for views, respectively, to psql.</li>

<li>&Aacute;lvaro Herrera sent in two more revisions of a patch to add deparsing utilities.</li>

<li>Arjen Nienhuis sent in a patch to have GB18030 handle more than 2-byte Unicode code points.</li>

<li>Fabien COELHO sent in two more revisions of a patch to extend pgbench expressions with functions.</li>

<li>Emre Hasegeli and &Aacute;lvaro Herrera traded patches to add a BRIN range operator class.</li>

<li>Tom Lane sent in another revision of a patch to manipulate complex types as non-contiguous structures in-memory.</li>

<li>Tomas Vondra sent in another revision of a patch to add multivariate statistics.</li>

<li>Fabien COELHO sent in a patch to pgbench to allow '=' in \set.</li>

<li>SAWADA Masahiko and Fabr&iacute;zio de Royes Mello traded patches to add REINDEX ... VERBOSE.</li>

<li>Stephen Frost sent in two more revisions of a patch to add default roles for sets of administrative functions.</li>

<li>Fabien COELHO sent in another revision of a patch to remove nclients/nthreads constraint from pgbench.</li>

<li>Stas Kelvich sent in another revision of a patch to add kNN support for the cube extension.</li>

<li>Michael Paquier sent in a patch to redefine subxcnt as uint32 for consistency with xcnt.</li>

<li>Michael Paquier sent in a patch to make more precise the rounding behavior of numeric and double precision in docs.</li>

<li>Kaigai Kouhei sent in three more revisions of a patch to add a custom/foreign join API.</li>

<li>Kaigai Kouhei sent in a patch to fix regtest policy for sepgsql.</li>

<li>Tom Lane sent in a patch to fix a bug in HOT.</li>

</ul>