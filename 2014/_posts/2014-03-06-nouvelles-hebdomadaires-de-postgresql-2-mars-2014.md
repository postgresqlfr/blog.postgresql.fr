---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 mars 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-03-06-nouvelles-hebdomadaires-de-postgresql-2-mars-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove a couple of comments from the pg_lsn regression test. Previously, one of these was a negative test case, but that got changed along the way and the comments didn't get the memo. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb818b53d47c77eb58bfce57516fab93d0e6965d">http://git.postgresql.org/pg/commitdiff/bb818b53d47c77eb58bfce57516fab93d0e6965d</a></li>

<li>Use pg_lsn data type in pg_stat_replication, too. Michael Paquier, per a suggestion from Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6615e77439a3c8c26c0091a616f00eefdea22604">http://git.postgresql.org/pg/commitdiff/6615e77439a3c8c26c0091a616f00eefdea22604</a></li>

<li>pg_basebackup: Skip only the *contents* of pg_replslot. Include the directory itself. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/278c94209b90b8e241f64ea4ce2d955b63b1f5d7">http://git.postgresql.org/pg/commitdiff/278c94209b90b8e241f64ea4ce2d955b63b1f5d7</a></li>

<li>Show xid and xmin in pg_stat_activity and pg_stat_replication. Christian Kruse, reviewed by Andres Freund and myself, with further minor adjustments by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd1a3bccca241a998b4ebf39d67202698e5fa599">http://git.postgresql.org/pg/commitdiff/dd1a3bccca241a998b4ebf39d67202698e5fa599</a></li>

<li>Update a few comments to mention materialized views. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf6aa68bbd78e3119d5156616b474fea47e10a33">http://git.postgresql.org/pg/commitdiff/cf6aa68bbd78e3119d5156616b474fea47e10a33</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>docs: document behavior of CHAR() comparisons with chars &lt; space. Space trimming rather than space-padding causes unusual behavior, which might not be standards-compliant. Also remove recently-added now-redundant C comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8457d0beca731bf062bb0d126870d9a291ab47a5">http://git.postgresql.org/pg/commitdiff/8457d0beca731bf062bb0d126870d9a291ab47a5</a></li>

<li>Allow single-point polygons to be converted to circles. This allows finding the center of a single-point polygon and converting it to a point. Per report from Josef Grahn 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/423f69ab64a6e51fbdd97a83c1dc55d68ca6190d">http://git.postgresql.org/pg/commitdiff/423f69ab64a6e51fbdd97a83c1dc55d68ca6190d</a></li>

<li>Fix markup for CHAR() doc patch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f05bedaf23a50979125159ac881094175edf9eb">http://git.postgresql.org/pg/commitdiff/3f05bedaf23a50979125159ac881094175edf9eb</a></li>

<li>pg_dump: fix subtle memory leak in func and arg signature processing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d613861b9523c143db427d1bf26b9769319ca102">http://git.postgresql.org/pg/commitdiff/d613861b9523c143db427d1bf26b9769319ca102</a></li>

<li>psql: add separate \d display for disabled system triggers Previously if you disabled all triggers, only user triggers would show as disabled Per report from Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bad548d981636ceb79492a1b7f607f22f0867de">http://git.postgresql.org/pg/commitdiff/4bad548d981636ceb79492a1b7f607f22f0867de</a></li>

<li>docs: remove unnecessary references to old PG versions 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f14a6f703a26ec12f4da6f53f107dd260fbb9db">http://git.postgresql.org/pg/commitdiff/6f14a6f703a26ec12f4da6f53f107dd260fbb9db</a></li>

<li>Increase work_mem and maintenance_work_mem defaults by 4x. New defaults are 4MB and 64MB. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/848ae330a497b4d430d93bd813f93c40d2bb0157">http://git.postgresql.org/pg/commitdiff/848ae330a497b4d430d93bd813f93c40d2bb0157</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update and clarify ssl_ciphers default. Write HIGH:MEDIUM instead of DEFAULT:!LOW:!EXP for clarity. Order 3DES last to work around inappropriate OpenSSL default. Remove !MD5 and @STRENGTH, because they are irrelevant. Add clarifying documentation. Effectively, the new default is almost the same as the old one, but it is arguably easier to understand and modify. Author: Marko Kreen &lt;markokr@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32001ab0b7b4ee143e195f100543f531757a555b">http://git.postgresql.org/pg/commitdiff/32001ab0b7b4ee143e195f100543f531757a555b</a></li>

<li>pgbench: Fix help message. Add NUM placeholder to -t option in help message. It got lost in 79cddb18419778be3202c971b3f21cdd90f7b719. Author: Fabien COELHO &lt;coelho@cri.ensmp.fr&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/192d8e04bd3112965d47bb4dc6747ee984abaf07">http://git.postgresql.org/pg/commitdiff/192d8e04bd3112965d47bb4dc6747ee984abaf07</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use SnapshotDirty rather than an active snapshot to probe index endpoints. If there are lots of uncommitted tuples at the end of the index range, get_actual_variable_range() ends up fetching each one and doing an MVCC visibility check on it, until it finally hits a visible tuple. This is bad enough in isolation, considering that we don't need an exact answer only an approximate one. But because the tuples are not yet committed, each visibility check does a TransactionIdIsInProgress() test, which involves scanning the ProcArray. When multiple sessions do this concurrently, the ensuing contention results in horrid performance loss. 20X overall throughput loss on not-too-complicated queries is easy to demonstrate in the back branches (though someone's made it noticeably less bad in HEAD). We can dodge the problem fairly effectively by using SnapshotDirty rather than a normal MVCC snapshot. This will cause the index probe to take uncommitted tuples as good, so that we incur only one tuple fetch and test even if there are many such tuples. The extent to which this degrades the estimate is debatable: it's possible the result is actually a more accurate prediction than before, if the endmost tuple has become committed by the time we actually execute the query being planned. In any case, it's not very likely that it makes the estimate a lot worse. SnapshotDirty will still reject tuples that are known committed dead, so we won't give bogus answers if an invalid outlier has been deleted but not yet vacuumed from the index. (Because btrees know how to mark such tuples dead in the index, we shouldn't have a big performance problem in the case that there are many of them at the end of the range.) This consideration motivates not using SnapshotAny, which was also considered as a fix. Note: the back branches were using SnapshotNow instead of an MVCC snapshot, but the problem and solution are the same. Per performance complaints from Bartlomiej Romanski, Josh Berkus, and others. Back-patch to 9.0, where the issue was introduced (by commit 40608e7f949fb7e4025c0ddd5be01939adc79eec). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fccebe421d0c410e6378fb281419442c84759213">http://git.postgresql.org/pg/commitdiff/fccebe421d0c410e6378fb281419442c84759213</a></li>

<li>Remove dependency on database encoding in citext regression test. Testing convert_to(..., 'ISO-8859-1') fails if there isn't a conversion function available from the database encoding to ISO-8859-1. This has been broken since day one, but the breakage was hidden by pg_do_encoding_conversion's failure to complain, up till commit 49c817eab78c6f0ce8c3bf46766b73d6cf3190b7. Since the data being converted in this test is plain ASCII, no actual conversion need happen (and if it did, it would prove little about citext anyway). So that we still have some code coverage of the convert() family of functions, let's switch to using convert_from, with SQL_ASCII as the specified source encoding. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1161d895d826950cbb736e5872935f3f53cc2e27">http://git.postgresql.org/pg/commitdiff/1161d895d826950cbb736e5872935f3f53cc2e27</a></li>

<li>Allow regex operations to be terminated early by query cancel requests. The regex code didn't have any provision for query cancel; which is unsurprising given its non-Postgres origin, but still problematic since some operations can take a long time. Introduce a callback function to check for a pending query cancel or session termination request, and call it in a couple of strategic spots where we can make the regex code exit with an error indicator. If we ever actually split out the regex code as a standalone library, some additional work will be needed to let the cancel callback function be specified externally to the library. But that's straightforward (certainly so by comparison to putting the locale-dependent character classification logic on a similar arms-length basis), and there seems no need to do it right now. A bigger issue is that there may be more places than these two where we need to check for cancels. We can always add more checks later, now that the infrastructure is in place. Since there are known examples of not-terribly-long regexes that can lock up a backend for a long time, back-patch to all supported branches. I have hopes of fixing the known performance problems later, but adding query cancel ability seems like a good idea even if they were all fixed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9662143f0c35d64d7042fbeaf879df8f0b54be32">http://git.postgresql.org/pg/commitdiff/9662143f0c35d64d7042fbeaf879df8f0b54be32</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>btbuild no longer calls _bt_doinsert(), update comment. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00976f202ce13daf15ec6e8de37f87fc9904b5e2">http://git.postgresql.org/pg/commitdiff/00976f202ce13daf15ec6e8de37f87fc9904b5e2</a></li>

<li>Remove bogus while-loop. Commit abf5c5c9a4f142b3343614746bb9e99a794f8e7b added a bogus while- statement after the for(;;)-loop. It went unnoticed in testing, because it was dead code. Report by KONDO Mitsumasa. Backpatch to 9.3. The commit that introduced this was also applied to 9.2, but not the bogus while-loop part, because the code in 9.2 looks quite different. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8a42b150fa83de0a058843a4d9d61af3d98e333">http://git.postgresql.org/pg/commitdiff/d8a42b150fa83de0a058843a4d9d61af3d98e333</a></li>

</ul>

<p>Jeff Davis a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix crash in json_to_record(). json_to_record() depends on get_call_result_type() for the tuple descriptor of the record that should be returned, but in some cases that cannot be determined. Add a guard to check if the tuple descriptor has been properly resolved, similar to other callers of get_call_result_type(). Also add guard for two other callers of get_call_result_type() in jsonfuncs.c. Although json_to_record() is the only actual bug, it's a good idea to follow convention. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/486ea0b19e08c10ff53e36e46209a928df048281">http://git.postgresql.org/pg/commitdiff/486ea0b19e08c10ff53e36e46209a928df048281</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix WAL replay of locking an updated tuple We were resetting the tuple's HEAP_HOT_UPDATED flag as well as t_ctid on WAL replay of a tuple-lock operation, which is incorrect when the tuple is already updated. Back-patch to 9.3. The clearing of both header elements was there previously, but since no update could be present on a tuple that was being locked, it was harmless. Bug reported by Peter Geoghegan and Greg Stark in CAM3SWZTMQiCi5PV5OWHb+bYkUcnCk=O67w0cSswPvV7XfUcU5g@mail.gmail.com and CAM-w4HPTOeMT4KP0OJK+mGgzgcTOtLRTvFZyvD0O4aH-7dxo3Q@mail.gmail.com respectively; diagnosis by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6bfa88acd3df830a5f7e8677c13512b1b50ae813">http://git.postgresql.org/pg/commitdiff/6bfa88acd3df830a5f7e8677c13512b1b50ae813</a></li>

<li>Allow BASE_BACKUP to be throttled. A new MAX_RATE option allows imposing a limit to the network transfer rate from the server side. This is useful to limit the stress that taking a base backup has on the server. pg_basebackup is now able to specify a value to the server, too. Author: Antonin Houska Patch reviewed by Stefan Radomski, Andres Freund, Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi, Fujii Masao, and &Aacute;lvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef5856fd9b77ef9d0d0c31fb314bb61bbfb1d704">http://git.postgresql.org/pg/commitdiff/ef5856fd9b77ef9d0d0c31fb314bb61bbfb1d704</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Various Coverity-spotted fixes A number of issues were identified by the Coverity scanner and are addressed in this patch. None of these appear to be security issues and many are mostly cosmetic changes. Short comments for each of the changes follows. Correct the semi-colon placement in be-secure.c regarding SSL retries. Remove a useless comparison-to-NULL in proc.c (value is dereferenced prior to this check and therefore can't be NULL). Add checking of chmod() return values to initdb. Fix a couple minor memory leaks in initdb. Fix memory leak in pg_ctl- involves free'ing the config file contents. Use an int to capture fgetc() return instead of an enum in pg_dump. Fix minor memory leaks in pg_dump. (note minor change to convertOperatorReference()'s API) Check fclose()/remove() return codes in psql. Check fstat(), find_my_exec() return codes in psql. Various ECPG memory leak fixes. Check find_my_exec() return in ECPG. Explicitly ignore pqFlush return in libpq error-path. Change PQfnumber() to avoid doing an strdup() when no changes required. Remove a few useless check-against-NULL's (value deref'd beforehand). Check rmtree(), malloc() results in pg_regress. Also check get_alternative_expectfile() return in pg_regress. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1aebbb6a86e96d7b8f3035ac730dfc24652496c">http://git.postgresql.org/pg/commitdiff/b1aebbb6a86e96d7b8f3035ac730dfc24652496c</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Josh Berkus sent in a patch to clarify documentation for the upcoming jsonb type.</li>

<li>Christian Kruse sent in another revision of a patch to show xid and xmin in pg_stat_activity and pg_stat_replication.</li>

<li>Michael Paquier sent in two more revisions of a patch to change the pageinspect extension use the new LSN type.</li>

<li>Andres Freund sent in another flock of patches aimed at changeset extraction.</li>

<li>Christian Kruse sent in two more revisions of a patch to show relationinfo and tupleinfo of a lock to acquire.</li>

<li>Shigeru HANADA sent in a patch to fix an infelicity in the custom scan patches.</li>

<li>Pavel Stehule sent in another revision of a patch to change selfuncs to use a cached SnapshotDirty instead of repeated calls to GetActiveSnapshot().</li>

<li>Peter Eisentraut sent in a patch to correct the way Windows libraries get installed.</li>

<li>Yugo Nagata sent in another revision of a patch to implement to_regclass, etc.</li>

<li>Sergey Burladyan and Alex Hunsaker traded patches to fix a memory leak in PL/PerlU.</li>

<li>Tom Lane sent in a patch to avoid having deeply nested AND/OR trees in the parser.</li>

<li>Andrew Dunstan and Erik Rijkers sent in patches re: nested hstore and jsonb, built on same.</li>

<li>Alexander Korotkov sent in another revision of a patch to add a fast GIN scan.</li>

<li>Alvaro Herrera sent in a patch to fix an data corruption bug.</li>

<li>Noah Misch sent in another revision of a patch to fix the fact that UNION ALL on partitioned tables won't use indexes.</li>

<li>Christian Kruse sent in three more revisions of a patch to use MAP_HUGETLB where supported.</li>

<li>Michael Paquier sent in a patch to create a define macro for the LSN type's oid in pg_type.h for use by extension developers.</li>

<li>Andres Freund sent in a patch to fix an issue where VACUUM FULL/CLUSTER doesn't update pg_class's pg_class.relfrozenxid.</li>

<li>Jing Wang sent in a patch to report versions of the server of pg_dump as comments in the output.</li>

<li>Peter Eisentraut sent in another revision of a patch to add tests for client programs.</li>

<li>Fabien COELHO sent in a patch to fix an omission in pgbench's help output.</li>

<li>Dimitri Fontaine sent in two more revisions of a patch to add an extension control path.</li>

<li>Simon Riggs and Vik Fearing traded patches to reduce the lock levels needed for ALTER TABLE.</li>

<li>Alvaro Herrera and Pavel Stehule traded patches for the upcoming make_timestamp function.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to allow storing custom reloptions.</li>

<li>Alvaro Herrera and Pavel Stehule traded patches to add --if-exists as an option for pg_dump.</li>

<li>Noah Misch sent in a patch to make "make check" harder to use as a vulnerability.</li>

<li>Kyotaro HORIGUCHI and Heikki Linnakangas traded patches to fix an issue where a hot standby doesn't come up in some situations.</li>

<li>Pavel Stehule sent in a patch to allow showing only failed queries in psql.</li>

<li>Alexander Korotkov sent in another revision of a patch to optimize the regex case for trigram indexes.</li>

<li>Sean Chittenden sent in a patch to fix an omission where pg_dump -Fd doesn't return write(2)'s return status, which was causing it to return success when it had in fact failed.</li>

<li>Pavel Stehule sent in a patch to add a --help-variables option to psql.</li>

<li>Andrew Dunstan and Ian Lawrence Barwick traded patches to add a FORCE_NULL option for copy COPY in CSV mode.</li>

</ul>