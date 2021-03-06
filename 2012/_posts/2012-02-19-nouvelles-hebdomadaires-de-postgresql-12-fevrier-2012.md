---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 février 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/02/19/Nouvelles-hebdomadaires-de-PostgreSQL-12-février-2012"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgreplay 1.1.0, un rejoueur de requ&ecirc;tes bas&eacute; sur les logs&nbsp;: 

<a target="_blank" href="http://pgreplay.projects.postgresql.org/">http://pgreplay.projects.postgresql.org/</a></li>

<li>Postgres Plus Advanced Server v9.1.2&nbsp;: 

<a target="_blank" href="http://www.enterprisedb.com/download-advanced-server">http://www.enterprisedb.com/download-advanced-server</a></li>

<li>Scalr 2.5 est compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://scalr.net/features/databases/postgres/">http://scalr.net/features/databases/postgres/</a></li>

<li>Version 1.23.0 de tail_n_mail, un programme de surveillance des logs PostgreSQL&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Tail_n_mail">http://bucardo.org/wiki/Tail_n_mail</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le <em>PGDay NYC</em> aura lieu le 2 avril 2012 au <em>Lighthouse International</em> &agrave; New-York&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org">http://pgday.nycpug.org</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-02/msg00006.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>fe-misc.c depends on pg_config_paths.h. Declare this in Makefile to avoid failures in parallel compiles. Author: Lionel Elie Mamane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c88086df3f79ff48d09440d96be17f3307017ed">http://git.postgresql.org/pg/commitdiff/0c88086df3f79ff48d09440d96be17f3307017ed</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove dead declaration. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96abd81744a90511b7cae9299e589412ce1897c9">http://git.postgresql.org/pg/commitdiff/96abd81744a90511b7cae9299e589412ce1897c9</a></li>

<li>pg_dump: Reduce dependencies on global variables. Change various places in the code that are referencing the global Archive object g_fout to instead reference the Archive object fout which is already being passed as a parameter. For parallel pg_dump to work, we're going to need multiple Archive(Handle) objects, so the real solution here is to pass down the Archive object to everywhere that it needs to go, but we might as well pick the low-hanging fruit first. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/622f862868992e3b7ded31d79403a4f63281f44a">http://git.postgresql.org/pg/commitdiff/622f862868992e3b7ded31d79403a4f63281f44a</a></li>

<li>pg_dump: Remove global Archive pointer. Instead, everything that needs the Archive object now gets it as a parameter. This is necessary infrastructure for parallel pg_dump, but is also amply justified by the ugliness of the current code (though a lot more than this is needed to fix that problem). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b157cf21dc2c1cd678580a178d05e0c1fbafd9d">http://git.postgresql.org/pg/commitdiff/3b157cf21dc2c1cd678580a178d05e0c1fbafd9d</a></li>

<li>pg_dump: Further reduce reliance on global variables. This is another round of refactoring to make things simpler for parallel pg_dump. pg_dump.c now issues SQL queries through the relevant Archive object, rather than relying on the global variable g_conn. This commit isn't quite enough to get rid of g_conn entirely, but it makes a big dent in its utilization and, along the way, manages to be slightly less code than before. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1631598ea204a3b05104f25d008b510ff5a5c94a">http://git.postgresql.org/pg/commitdiff/1631598ea204a3b05104f25d008b510ff5a5c94a</a></li>

<li>Add TIMING option to EXPLAIN, to allow eliminating of timing overhead. Sometimes it may be useful to get actual row counts out of EXPLAIN (ANALYZE) without paying the cost of timing every node entry/exit. With this patch, you can say EXPLAIN (ANALYZE, TIMING OFF) to get that. Tomas Vondra, reviewed by Eric Theise, with minor doc changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af7914c6627bcf0b0ca614e9ce95d3f8056602bf">http://git.postgresql.org/pg/commitdiff/af7914c6627bcf0b0ca614e9ce95d3f8056602bf</a></li>

<li>Add a transform function for numeric typmod coercisions. This enables ALTER TABLE to skip table and index rebuilds when a column is changed to an unconstrained numeric, or when the scale is unchanged and the precision does not decrease. Noah Misch, with a few stylistic changes and a fix for an OID collision by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cc0800829a6dda5347497337b0cf43848da4acf">http://git.postgresql.org/pg/commitdiff/3cc0800829a6dda5347497337b0cf43848da4acf</a></li>

<li>Add a transform function for varbit typmod coercisions. This enables ALTER TABLE to skip table and index rebuilds when the new type is unconstraint varbit, or when the allowable number of bits is not decreasing. Noah Misch, with review and a fix for an OID collision by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7d7dade8afe19847510efe44be191c35e1ce26c">http://git.postgresql.org/pg/commitdiff/f7d7dade8afe19847510efe44be191c35e1ce26c</a></li>

<li>Support fls(). The immediate impetus for this is that Noah Misch's patch to elide unnecessary table and index rebuilds when changing typmod for temporal types uses it; and this is extracted from that patch, with some further commentary by me. But it seems logically separate from the remainder of the patch, so I'm committing it separately; this is not the first time someone has wanted fls() in the backend and probably won't be the last. If we end up using this in more performance-critical spots it may be worthwhile to add some architecture-specific optimizations to our src/port version of fls() - e.g. any x86 platform can implement this using the assembly instruction BSRL. But performance won't matter a bit for assessing typmod changes, so I'm not worried about that right now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f658dc851a73fc309a61be2503c29ed78a1592e">http://git.postgresql.org/pg/commitdiff/4f658dc851a73fc309a61be2503c29ed78a1592e</a></li>

<li>Fix typos pointed out by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af7dd696b00fe666fec3642e103acafe33002765">http://git.postgresql.org/pg/commitdiff/af7dd696b00fe666fec3642e103acafe33002765</a></li>

<li>Add transform functions for various temporal typmod coercisions. This enables ALTER TABLE to skip table and index rebuilds in some cases. Noah Misch, with trivial changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c13897983a0006e658fb7c6410d72ca59fb87136">http://git.postgresql.org/pg/commitdiff/c13897983a0006e658fb7c6410d72ca59fb87136</a></li>

<li>Add a comment to AdjustIntervalForTypmod to reduce chance of future bugs. It's not entirely evident how the logic here relates to the interval_transform function, so let's clue people in that they need to check that if the rules change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d429ebe347a5f1404cc3c50234e1c93f8db2bb53">http://git.postgresql.org/pg/commitdiff/d429ebe347a5f1404cc3c50234e1c93f8db2bb53</a></li>

<li>Improve interval_transform function to detect a few more cases. Noah Misch, per a review comment from me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6656588575abd13016989be1a276b1b60be49b69">http://git.postgresql.org/pg/commitdiff/6656588575abd13016989be1a276b1b60be49b69</a></li>

<li>Attempt to fix MSVC builds and other fls-related breakage. Thanks to Andrew Dunstan for bringing this to my attention. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd7c84185c160bb0d95bd265182f24f1f6c21924">http://git.postgresql.org/pg/commitdiff/dd7c84185c160bb0d95bd265182f24f1f6c21924</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add locking around WAL-replay modification of shared-memory variables. Originally, most of this code assumed that no Postgres backends could be running concurrently with it, and so no locking could be needed. That assumption fails in Hot Standby. While it's still true that Hot Standby backends should never change values like nextXid, they can examine them, and consistency is important in some cases such as when computing a snapshot. Therefore, prudence requires that WAL replay code obtain the relevant locks when modifying such variables, even though it can examine them without taking a lock. We were following that coding rule in some places but not all. This commit applies the coding rule uniformly to all updates of ShmemVariableCache and MultiXactState fields; a search of the replay routines did not find any other cases that seemed to be at risk. In addition, this commit fixes a longstanding thinko in replay of NEXTOID and checkpoint records: we tried to advance nextOid only if it was behind the value in the WAL record, but the comparison would draw the wrong conclusion if OID wraparound had occurred since the previous value. Better to just unconditionally assign the new value, since OID assignment shouldn't be happening during replay anyway. The additional locking seems to be more in the nature of future-proofing than fixing any live bug, so I am not going to back-patch it. The NEXTOID fix will be back-patched separately. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6d76d7c82ebebb7210029f7382c0ebe2c558bca">http://git.postgresql.org/pg/commitdiff/c6d76d7c82ebebb7210029f7382c0ebe2c558bca</a></li>

<li>Avoid problems with OID wraparound during WAL replay. Fix a longstanding thinko in replay of NEXTOID and checkpoint records: we tried to advance nextOid only if it was behind the value in the WAL record, but the comparison would draw the wrong conclusion if OID wraparound had occurred since the previous value. Better to just unconditionally assign the new value, since OID assignment shouldn't be happening during replay anyway. The consequences of a failure to update nextOid would be pretty minimal, since we have long had the code set up to obtain another OID and try again if the generated value is already in use. But in the worst case there could be significant performance glitches while such loops iterate through many already-used OIDs before finding a free one. The odds of a wraparound happening during WAL replay would be small in a crash-recovery scenario, and the length of any ensuing OID-assignment stall quite limited anyway. But neither of these statements hold true for a replication slave that follows a WAL stream for a long period; its behavior upon going live could be almost unboundedly bad. Hence it seems worth back-patching this fix into all supported branches. Already fixed in HEAD in commit c6d76d7c82ebebb7210029f7382c0ebe2c558bca. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1b8a84dec30b44e6a0b306f95961f5426cb8368">http://git.postgresql.org/pg/commitdiff/f1b8a84dec30b44e6a0b306f95961f5426cb8368</a></li>

<li>Avoid throwing ERROR during WAL replay of DROP TABLESPACE. Although we will not even issue an XLOG_TBLSPC_DROP WAL record unless removal of the tablespace's directories succeeds, that does not guarantee that the same operation will succeed during WAL replay. Foreseeable reasons for it to fail include temp files created in the tablespace by Hot Standby backends, wrong directory permissions on a standby server, etc etc. The original coding threw ERROR if replay failed to remove the directories, but that is a serious overreaction. Throwing an error aborts recovery, and worse means that manual intervention will be needed to get the database to start again, since otherwise the same error will recur on subsequent attempts to replay the same WAL record. And the consequence of failing to remove the directories is only that some probably-small amount of disk space is wasted, so it hardly seems justified to throw an error. Accordingly, arrange to report such failures as LOG messages and keep going when a failure occurs during replay. Back-patch to 9.0 where Hot Standby was introduced. In principle such problems can occur in earlier releases, but Hot Standby increases the odds of trouble significantly. Given the lack of field reports of such issues, I'm satisfied with patching back as far as the patch applies easily. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fc78efcec01fd5e857278556ad4312ae94ecc58">http://git.postgresql.org/pg/commitdiff/5fc78efcec01fd5e857278556ad4312ae94ecc58</a></li>

<li>Fix postmaster to attempt restart after a hot-standby crash. The postmaster was coded to treat any unexpected exit of the startup process (i.e., the WAL replay process) as a catastrophic crash, and not try to restart it. This was OK so long as the startup process could not have any sibling postmaster children. However, if a hot-standby backend crashes, we SIGQUIT the startup process along with everything else, and the resulting exit is hardly "unexpected". Treating it as such meant we failed to restart a standby server after any child crash at all, not only a crash of the WAL replay process as intended. Adjust that. Back-patch to 9.0 where hot standby was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/442231d7f71764b8c628044e7ce2225f9aa43b67">http://git.postgresql.org/pg/commitdiff/442231d7f71764b8c628044e7ce2225f9aa43b67</a></li>

<li>Mark some more I/O-conversion-invoking functions as stable not volatile. When written, textanycat, anytextcat, quote_literal, and quote_nullable were marked volatile, because they could invoke arbitrary type-specific output functions as part of casting their anyelement arguments to text. Since then, we have defined a project policy that I/O functions must not be volatile, as per commit aab353a60b95aadc00f81da0c6d99bde696c4b75. So these functions can safely be downgraded to stable. Most of the time this makes no difference since they'll get inlined anyway, but as noted by Andrew Dunstan, there are cases where the volatile marking prevents optimizations that the planner does before function inlining. (I think I might have overlooked these functions in the earlier commit on the grounds that inlining would make it moot, but not so --- tgl) This change results in a change in the expected output of the json regression tests, because the planner can now flatten a sub-select that it failed to before. The old output is preferable, but getting that back will require some as-yet-unfinished work on RowExpr handling. Marti Raudsepp 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3db6524fe63f0598dcb2b307bb422bc126f2b15d">http://git.postgresql.org/pg/commitdiff/3db6524fe63f0598dcb2b307bb422bc126f2b15d</a></li>

<li>Support min/max index optimizations on boolean columns. Since bool_and() is equivalent to min(), and bool_or() to max(), we might as well let them be index-optimized in the same way. The practical value of this is debatable at best, but it seems nearly cost-free to enable it. Code-wise, we need only adjust the entries in pg_aggregate. There is a measurable planning speed penalty for a query involving one of these aggregates, but it is only a few percent in simple cases, so that seems acceptable. Marti Raudsepp, reviewed by Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbba55d6d792b55f6b448a31fc14aef84510967c">http://git.postgresql.org/pg/commitdiff/cbba55d6d792b55f6b448a31fc14aef84510967c</a></li>

<li>Check misplaced window functions before checking aggregate/group by sanity. If somebody puts a window function in WHERE, we should complain about that in so many words. The previous coding tended to complain about the window function's arguments instead, which is likely to be misleading to users who are unclear on the semantics of window functions; as seen for example in bug #6440 from Matyas Novak. Just another example of how "add new code at the end" is frequently a bad heuristic. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb7c84fae8a6780d836687aa2c9655eb936ebd25">http://git.postgresql.org/pg/commitdiff/cb7c84fae8a6780d836687aa2c9655eb936ebd25</a></li>

<li>Fix up dumping conditions for extension configuration tables. Various filters that were meant to prevent dumping of table data were not being applied to extension config tables, notably --exclude-table-data and --no-unlogged-table-data. We also would bogusly try to dump data from views, sequences, or foreign tables, should an extension try to claim they were config tables. Fix all that, and refactor/redocument to try to make this a bit less fragile. This reverts the implementation, though not the feature, of commit 7b070e896ca835318c90b02c830a5c4844413b64, which had broken config-table dumping altogether :-(. It is still the case that the code will dump config-table data even if --schema is specified. That behavior was intentional, as per the comments in getExtensionMembership, so I think it requires some more discussion before we change it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d77354eaec53ed469a6f2444813ff3a4fd9d7a48">http://git.postgresql.org/pg/commitdiff/d77354eaec53ed469a6f2444813ff3a4fd9d7a48</a></li>

<li>Throw error sooner for unlogged GiST indexes. Throwing an error only after we've built the main index fork is pretty unfriendly when the table already contains data. Per gripe from Jay Levitt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/331bf6712c71a1c110bc52423eede8b4bac221a1">http://git.postgresql.org/pg/commitdiff/331bf6712c71a1c110bc52423eede8b4bac221a1</a></li>

<li>Add ORDER BY to a query to prevent occasional regression test failures. Per buildfarm, we sometimes get row-ordering variations in the output. This also makes this query look more like numerous other ones in the same test file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d06e2d200562837afa18058937f20460a3ea526a">http://git.postgresql.org/pg/commitdiff/d06e2d200562837afa18058937f20460a3ea526a</a></li>

<li>Fix pg_dump for better handling of inherited columns. Revise pg_dump's handling of inherited columns, which was last looked at seriously in 2001, to eliminate several misbehaviors associated with inherited default expressions and NOT NULL flags. In particular make sure that a column is printed in a child table's CREATE TABLE command if and only if it has attislocal = true; the former behavior would sometimes cause a column to become marked attislocal when it was not so marked in the source database. Also, stop relying on textual comparison of default expressions to decide if they're inherited; instead, don't use default-expression inheritance at all, but just install the default explicitly at each level of the hierarchy. This fixes the search-path-related misbehavior recently exhibited by Chester Young, and also removes some dubious assumptions about the order in which ALTER TABLE SET DEFAULT commands would be executed. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00bc96bd2b6646c73a073aa91dc68ed4718cf5f3">http://git.postgresql.org/pg/commitdiff/00bc96bd2b6646c73a073aa91dc68ed4718cf5f3</a></li>

<li>Fix brain fade in previous pg_dump patch. In pre-7.3 databases, pg_attribute.attislocal doesn't exist. The easiest way to make sure the new inheritance logic behaves sanely is to assume it's TRUE, not FALSE. This will result in printing child columns even when they're not really needed. We could work harder at trying to reconstruct a value for attislocal, but there is little evidence that anyone still cares about dumping from such old versions, so just do the minimum necessary to have a valid dump. I had this correct in the original draft of the patch, but for some unaccountable reason decided it wasn't necessary to change the value. Testing against an old server shows otherwise... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97dc3c8a147c01da38570e4be7b4979af918dca2">http://git.postgresql.org/pg/commitdiff/97dc3c8a147c01da38570e4be7b4979af918dca2</a></li>

<li>Fix oversight in pg_dump's handling of extension configuration tables. If an extension has not been selected to be dumped (perhaps because of a --schema or --table switch), the contents of its configuration tables surely should not get dumped either. Per gripe from Hubert Depesz Lubaczewski. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59de132f9a578ae5d2909228484a61309df986e0">http://git.postgresql.org/pg/commitdiff/59de132f9a578ae5d2909228484a61309df986e0</a></li>

<li>Fix I/O-conversion-related memory leaks in plpgsql. Datatype I/O functions are allowed to leak memory in CurrentMemoryContext, since they are generally called in short-lived contexts. However, plpgsql calls such functions for purposes of type conversion, and was calling them in its procedure context. Therefore, any leaked memory would not be recovered until the end of the plpgsql function. If such a conversion was done within a loop, quite a bit of memory could get consumed. Fix by calling such functions in the transient "eval_econtext", and adjust other logic to match. Back-patch to all supported versions. Andres Freund, Jan Urba&#324;ski, Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58a9596ed4a509467e1781b433ff9c65a4e5b5ce">http://git.postgresql.org/pg/commitdiff/58a9596ed4a509467e1781b433ff9c65a4e5b5ce</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow the connection keyword array to carry all seven items in ecpglib. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ee23b53beb851d60c0eff9bde8fd7a303270720">http://git.postgresql.org/pg/commitdiff/0ee23b53beb851d60c0eff9bde8fd7a303270720</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>When building with LWLOCK_STATS, initialize the stats in LWLockWaitUntilFree. If LWLockWaitUntilFree was called before the first LWLockAcquire call, you would either crash because of access to uninitialized array or account the acquisition incorrectly. LWLockConditionalAcquire doesn't have this problem because it doesn't update the lwlock stats. In practice, this never happens because there is no codepath where you would call LWLockWaitUntilfree before LWLockAcquire after a new process is launched. But that's just accidental, there's no guarantee that that's always going to be true in the future. Spotted by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15ad6f1510f8979a39e4c39078c742b5fdb121ce">http://git.postgresql.org/pg/commitdiff/15ad6f1510f8979a39e4c39078c742b5fdb121ce</a></li>

<li>Fix typo in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ece8ecae88fd7fd8616429790bd70ca2ffad260">http://git.postgresql.org/pg/commitdiff/5ece8ecae88fd7fd8616429790bd70ca2ffad260</a></li>

<li>Rename LWLockWaitUntilFree to LWLockAcquireOrWait. LWLockAcquireOrWait makes it more clear that the lock is acquired if it's free. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a01560cbb78ff363fc7d70298328aa23f05bfb5">http://git.postgresql.org/pg/commitdiff/1a01560cbb78ff363fc7d70298328aa23f05bfb5</a></li>

<li>Add new keywords SNAPSHOT and TYPES to the keyword list in gram.y. These were added to kwlist.h as unreserved keywords in separate patches, but authors forgot to add them to the corresponding list in gram.y. Because of that, even though they were supposed to be unreserved keywords, they could not be used as identifiers. src/tools/check_keywords.pl is your friend. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82e73ba0d1f8990a76a20b3a57957e633945fb2b">http://git.postgresql.org/pg/commitdiff/82e73ba0d1f8990a76a20b3a57957e633945fb2b</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>createuser: Disable prompting by default. Do not prompt when options were not specified. Assume --no-createdb, --no-createrole, --no-superuser by default. Also disable prompting for user name in dropdb, unless --interactive was specified. reviewed by Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a347f96b99741e44276cdd481a72d04f1b2ac5fc">http://git.postgresql.org/pg/commitdiff/a347f96b99741e44276cdd481a72d04f1b2ac5fc</a></li>

<li>pg_regress: Use target-specific variable instead of overriding make rule. Use a target-specific variable to add to CPPFLAGS instead of writing a custom .c -&gt; .o rule. This will ensure that dependency tracking is used when enabled. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d66b31c94faf2b8b8aac9d273c8cd1708a54887e">http://git.postgresql.org/pg/commitdiff/d66b31c94faf2b8b8aac9d273c8cd1708a54887e</a></li>

<li>pg_dump: Add some const qualifiers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e09509bd33d691b2d2d3473b4e112efd59518b31">http://git.postgresql.org/pg/commitdiff/e09509bd33d691b2d2d3473b4e112efd59518b31</a></li>

<li>psql: Support zero byte field and record separators. Add new psql settings and command-line options to support setting the field and record separators for unaligned output to a zero byte, for easier interfacing with other shell tools. reviewed by Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/169c8a911260bd5a8b6910c458afa57a1ae29627">http://git.postgresql.org/pg/commitdiff/169c8a911260bd5a8b6910c458afa57a1ae29627</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add opensp as a requirement for building the docs on Debian --- tested on Debian Squeeze. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a870c7fdbca71e2c651fd80b3dec902c49040c7a">http://git.postgresql.org/pg/commitdiff/a870c7fdbca71e2c651fd80b3dec902c49040c7a</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Have pg_receivexlog always send an invalid log position in status messages. This prevents pg_basebackup and pg_receivexlog from becoming a synchronous standby in case 'write' is used for synchronous_commit. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d7ea9193d18d29bea82b30604cdd087e90c5ee27">http://git.postgresql.org/pg/commitdiff/d7ea9193d18d29bea82b30604cdd087e90c5ee27</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marco Nenciarini sent in another revision of the patch to allow the elements of arrays to be enforced as foreign keys.</li>

<li>Fujii Masao sent in two revisions of a patch to fix incorrect handling of the timeout in pg_receivexlog.</li>

<li>Marko Kreen sent in another revision of the patch to create a new tuple storage in libpq and use same to make dblink more efficient in some cases.</li>

<li>Chetan Suttraway sent in another revision of the patch to implement SPI_gettypemod().</li>

<li>Fujii Masao sent in a patch to fix an issue where pg_basebackup -x stream from the standby gets stuck.</li>

<li>Chetan Suttraway sent in a patch to prevent the specification of conflicting transaction read/write options.</li>

<li>Euler Taveira de Oliveira sent in another revision of the patch to do xlog location arithmetic.</li>

<li>Shigeru HANADA sent in two more revisions of the patch to add a PostgreSQL FDW.</li>

<li>Marti Raudsepp sent in another revision of a patch to remove an optimization barrier involving the volatility of text-any concatenation.</li>

<li>Alvaro Herrera and Alex Hunsaker traded patches to fix an issue with missing keywords in make.</li>

<li>Peter Eisentraut sent in a patch to fix some of the missing things in psql's SELECT tab completion.</li>

<li>Marti Raudsepp sent in a patch to make TRUNCATE more MVCC-safe.</li>

<li>Peter Geoghegan sent in another revision of the patch for fast-path ordering, b-tree index creation time.</li>

<li>Alex Hunsaker sent in a patch to fix a bug in PL/Perl in databases encoded as SQL_ASCII.</li>

<li>Shigeru HANADA sent in another revision of the patch to collect statistics on CSV files attached via FDW.</li>

<li>Jean-Baptiste Quenot sent in a patch to fix an issue with PL/Python's handling of result metadata.</li>

<li>Kevin Grittner sent in a patch to ensure that if a GUC has a check function, it is run on a RESET just like it is on a SET, to make sure that the resulting value is valid to set within the context.</li>

<li>Andrew Dunstan sent in two revisions of a patch to fix a case where auto_explain can produce invalid JSON.</li>

<li>Jeff Janes sent in a WIP patch to to set XLP_FIRST_IS_CONTRECORD, this being part of the continuing effort to move more work outside WALInsertLock.</li>

<li>Vik Reykja sent in a patch to optimize referential integrity checks.</li>

</ul>