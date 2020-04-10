---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 mai 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-05-23-nouvelles-hebdomadaires-de-postgresql-19-mai-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix handling of OID wraparound while in standalone mode. If OID wraparound should occur while in standalone mode (unlikely but possible), we want to advance the counter to FirstNormalObjectId not FirstBootstrapObjectId. Otherwise, user objects might be created with OIDs in the system-reserved range. That isn't immediately harmful but it poses a risk of conflicts during future pg_upgrade operations. Noted by Andres Freund. Back-patch to all supported branches, since all of them are supported sources for pg_upgrade operations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9c336c78638c191642b18628c306d1c1573fb12">http://git.postgresql.org/pg/commitdiff/e9c336c78638c191642b18628c306d1c1573fb12</a></li>

<li>Allow CREATE FOREIGN TABLE to include SERIAL columns. The behavior is that the required sequence is created locally, which is appropriate because the default expression will be evaluated locally. Per gripe from Brad Nicholson that this case was refused with a confusing error message. We could have improved the error message but it seems better to just allow the case. Also, remove ALTER TABLE's arbitrary prohibition against being applied to foreign tables, which was pretty inconsistent considering we allow it for views, sequences, and other relation types that aren't even called tables. This is needed to avoid breaking pg_dump, which sometimes emits column defaults using separate ALTER TABLE commands. (I think this can happen even when the default is not associated with a sequence, so that was a pre-existing bug once we allowed column defaults for foreign tables.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b14206862278347a379f2bb72d92d16fb9dcea45">http://git.postgresql.org/pg/commitdiff/b14206862278347a379f2bb72d92d16fb9dcea45</a></li>

<li>Fix some uses of "the quick brown fox". If we're going to quote a well-known pangram, we should quote it accurately. Per gripe from Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7bfc7e42cebf80507f9c9965dc4a572e9fb76a4">http://git.postgresql.org/pg/commitdiff/e7bfc7e42cebf80507f9c9965dc4a572e9fb76a4</a></li>

<li>Fix fd.c to preserve errno where needed. PathNameOpenFile failed to ensure that the correct value of errno was returned to its caller after a failure (because it incorrectly supposed that free() can never change errno). In some cases this would result in a user-visible failure because an expected ENOENT errno was replaced with something else. Bogus EINVAL failures have been observed on OS X, for example. There were also a couple of places that could mangle an important value of errno if FDDEBUG was defined. While the usefulness of that debug support is highly debatable, we might as well make it safe to use, so add errno save/restore logic to the DO_DB macro. Per bug #8167 from Nelson Minar, diagnosed by RhodiumToad. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6563fb2b45146852601e63828308fe04fb03b9e9">http://git.postgresql.org/pg/commitdiff/6563fb2b45146852601e63828308fe04fb03b9e9</a></li>

<li>Fix crash when trying to display a NOTIFY rule action. Fixes oversight in commit 2ffa740be9d96a3743ecb7e42391c53d0760c65a. Per report from Josh Kupershmidt. I think we've broken this case before, so let's add a regression test this time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/403bd6a18b8ec5aeee51c08360441c3c3c239d8f">http://git.postgresql.org/pg/commitdiff/403bd6a18b8ec5aeee51c08360441c3c3c239d8f</a></li>

<li>Clarify documentation of EXPLAIN (TIMING OFF) option. Clarify that this option doesn't suppress measurement of the statement's total runtime. Greg Smith 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2af0971f35a4a7b87312b83782d9bb0cc6a40ad0">http://git.postgresql.org/pg/commitdiff/2af0971f35a4a7b87312b83782d9bb0cc6a40ad0</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Fix order of options on pgbench man page 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd1710248795a495547a96f16d16592ad45f6943">http://git.postgresql.org/pg/commitdiff/bd1710248795a495547a96f16d16592ad45f6943</a></li>

<li>doc: Fix some whitespace issues in the man pages 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9bb274f902987b271e2f0dd844fb610de4f024b">http://git.postgresql.org/pg/commitdiff/a9bb274f902987b271e2f0dd844fb610de4f024b</a></li>

<li>pg_upgrade: Replace tabs in output string constants by spaces 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2b920cded4db973a7b69a628e109f2aee63012a">http://git.postgresql.org/pg/commitdiff/d2b920cded4db973a7b69a628e109f2aee63012a</a></li>

<li>doc: Add \dm command to psql man page 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2a480af889b5d9abce4181e49b6398f0e24b808">http://git.postgresql.org/pg/commitdiff/a2a480af889b5d9abce4181e49b6398f0e24b808</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>release docs: mention PL/pgSQL as supporting event triggers in PG 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f472012a3257d022dd36c6b5e30ad8d223d0ccea">http://git.postgresql.org/pg/commitdiff/f472012a3257d022dd36c6b5e30ad8d223d0ccea</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove unused regression test files. euc_* and mule_internal test cases were identical to the ones in src/test/mb. sql_ascii didn't exist elsewhere, but has been broken since 2001, and doesn't seem very interesting anyway. drop.sql hasn't been used since 2000, when regress.sh was removed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0cab7903bf695bf305bd4c01f99e0e28d233d91">http://git.postgresql.org/pg/commitdiff/d0cab7903bf695bf305bd4c01f99e0e28d233d91</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove single space on end of a line in xlog.c. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c94dff4c3c18595a9d6d8a97020145c1155de473">http://git.postgresql.org/pg/commitdiff/c94dff4c3c18595a9d6d8a97020145c1155de473</a></li>

<li>Emit msg correctly for timeline-crossing crash 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1781744cfcfeed6e3ad2e4d52dbd475a95be03a0">http://git.postgresql.org/pg/commitdiff/1781744cfcfeed6e3ad2e4d52dbd475a95be03a0</a></li>

<li>Init crash recovery using the latest available TLI. This simplifies the handling of crashes after fast promotion and various minor cases that can exist in short timing windows around that case. Broad fix to bug reported by Michael Paquier on -hackers, approach prompted by Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4337a0dcbd29e5b11c2157f808916de62de05e4">http://git.postgresql.org/pg/commitdiff/d4337a0dcbd29e5b11c2157f808916de62de05e4</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Noah Misch sent in a patch to implement MemoryContextAllocHuge() and repalloc_huge()</li>

<li>Peter Geoghegan sent in a patch to ensure that all "loaded library..." messages are DEBUG1, regardless of whether local_preload_libraries or shared_preload_libraries is involved, and regardless of EXEC_BACKEND.</li>

<li>Robins Tharakan sent in a patch to add more tests for ASYNC.</li>

<li>Heikki Linnakangas sent in a patch to improve LWLocks by using compare-and-swap CPU instructions where available.</li>

<li>Peter Eisentraut sent in a patch to make psql delay setting up its cancel handler until after a database connection is established.</li>

<li>Mark Kirkwood sent in a patch to add pg_stat_get_changes_since_analyze() and associated columns to system views.</li>

<li>Amit Kapila sent in two revisions of a patch to move unused buffers to freelist.</li>

<li>Maciej Gajewski sent in a patch to cache and query result histories in psql.</li>

<li>Peter Geoghegan sent in another revision of a patch to replace our quicksort_arg with timsort_arg.</li>

<li>Amit Langote sent four patches intended to allow logging PAM auth failure.</li>

<li>Jon Nelson sent in three more revisions of a patch to use fallocate where available, reducing the time it takes to write a WAL file.</li>

<li>Dean Rasheed sent in a patch to ensure that views atop writeable foreign tables are writeable along with changes to catalog views showing foreign tables' writeability.</li>

<li>Amul Sul sent in a patch to add a connection request wait time to psql.</li>

<li>Cedric Villemain sent in a WIP patch to fix a case where 9.3 breaks extensions.</li>

<li>Heikki Linnakangas sent in a patch to fix a quoting issue in pg_basebackup.</li>

<li>Joe Abbate sent in a patch to fix an issue in the release notes about DROP TABLE ... IF EXISTS.</li>

<li>Dan Farina sent in a set of patches to enrich the auth mechanism in libpq.</li>

<li>Greg Smith sent in a WIP patch to track block write statistics.</li>

<li>Chris Farmiloe sent in a patch to hook the privilege system to LISTEN/NOTIFY.</li>

</ul>