---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 octobre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/10/14/Nouvelles-hebdomadaires-de-PostgreSQL-6-octobre-2013"
---


<p>L'appel international &agrave; conf&eacute;renciers pour le PgDay &eacute;quatorien, int&eacute;gr&eacute; &agrave; la <em>Feria Internacional del Libro</em> &agrave; Quito, &Eacute;quateur, a &eacute;t&eacute; lanc&eacute;. &Eacute;crivez &agrave; ecpug &lt;AT&gt; postgresql &lt;DOT&gt; org. D&eacute;tails (en espagnol) ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PGDay_Ecuador_2013">https://wiki.postgresql.org/wiki/PGDay_Ecuador_2013</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay italien (PGDay.IT) sera tenu le 25 octobre &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Inscriptions et infos&nbsp;: 

<a target="_blank" href="http://2013.pgday.it">http://2013.pgday.it</a></li>

<li>La <em>PostgreSQL Conference China</em> de 2103 aura lieu les 26 &amp; 27 octobre &agrave; Hangzhou. Informations&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/Pgconf_cn2013">https://wiki.postgresql.org/wiki/Pgconf_cn2013</a><br>

Inscriptions&nbsp;: 

<a target="_blank" href="http://bbs.pgsqldb.com/client/bm.php">http://bbs.pgsqldb.com/client/bm.php</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

<li>La quatri&egrave;me &eacute;dition du PGDay argentin se tiendra le 14 novembre 2013 &agrave; Buenos Aires, Argentine. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 28 septembre&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PGDay_Argentina_2013">http://wiki.postgresql.org/wiki/PGDay_Argentina_2013</a></li>

<li>Le PGDay cubain aura lieu en novembre 2013&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/">http://postgresql.uci.cu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20131007052157.GA2538@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix snapshot leak if lo_open called on non-existent object. lo_open registers the currently active snapshot, and checks if the large object exists after that. Normally, snapshots registered by lo_open are unregistered at end of transaction when the lo descriptor is closed, but if we error out before the lo descriptor is added to the list of open descriptors, it is leaked. Fix by moving the snapshot registration to after checking if the large object exists. Reported by Pavel Stehule. Backpatch to 8.4. The snapshot registration system was introduced in 8.4, so prior versions are not affected (and not supported, anyway). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/357f7521384df34c697b3544115622520a6a0e9f">http://git.postgresql.org/pg/commitdiff/357f7521384df34c697b3544115622520a6a0e9f</a></li>

<li>In bms_add_member(), use repalloc() if the bms needs to be enlarged. Previously bms_add_member() would palloc a whole-new copy of the existing set, copy the words, and pfree the old one. repalloc() is potentially much faster, and more importantly, this is less surprising if CurrentMemoryContext is not the same as the context the old set is in. bms_add_member() still allocates a new bitmapset in CurrentMemoryContext if NULL is passed as argument, but that is a lot less likely to induce bugs. Nicholas White. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee01d848f39400c8524c66944ada6fde47894978">http://git.postgresql.org/pg/commitdiff/ee01d848f39400c8524c66944ada6fde47894978</a></li>

<li>Minor GIN code refactoring. It makes for cleaner code to have separate Get/Add functions for PostingItems and ItemPointers. A few callsites that have to deal with both types need to be duplicated because of this, but all the callers have to know which one they're dealing with anyway. Overall, this reduces the amount of casting required. Extracted from Alexander Korotkov's larger patch to change the data page format. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2b175b94851e59765cc87243d8faf923e3d820b">http://git.postgresql.org/pg/commitdiff/c2b175b94851e59765cc87243d8faf923e3d820b</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Ensure installation dirs are built before contents are installed (v2). Push dependency on installdirs down to individual targets. Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eebdea08bb6c185dd7e7542f35565a2c12ab1342">http://git.postgresql.org/pg/commitdiff/eebdea08bb6c185dd7e7542f35565a2c12ab1342</a></li>

<li>Add missing condition for pg_depend in hstore migration script. Error noted by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ce569babddf7bc76657390032cb6cf6793476cc">http://git.postgresql.org/pg/commitdiff/7ce569babddf7bc76657390032cb6cf6793476cc</a></li>

<li>Document support for VPATH builds of extensions. C&eacute;dric Villemain and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e1cb733f96cff04f6c9116c166fec54bc1e18c6">http://git.postgresql.org/pg/commitdiff/2e1cb733f96cff04f6c9116c166fec54bc1e18c6</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove broken PGXS code for pg_xlogdump. With the PGXS boilerplate in place, pg_xlogdump currently fails with an ominous error message that certain targets cannot be built because certain files do not exist. Remove that and instead throw a quick error message alerting the user of the actual problem, which should be easier to diagnose that the statu quo. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dddc91ddd33d5db07463f2f3f3a044ab98042cf1">http://git.postgresql.org/pg/commitdiff/dddc91ddd33d5db07463f2f3f3a044ab98042cf1</a></li>

<li>Add WaitForLockers in lmgr, refactoring index.c code. This is in support of a future REINDEX CONCURRENTLY feature. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15732b34e8c856bf94469b78ab49446430a9c203">http://git.postgresql.org/pg/commitdiff/15732b34e8c856bf94469b78ab49446430a9c203</a></li>

<li>Make some isolationtester specs more complete. Also, make sure they pass on all transaction isolation levels. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/46d89546546eff837909ce0dbbb3301a97f01145">http://git.postgresql.org/pg/commitdiff/46d89546546eff837909ce0dbbb3301a97f01145</a></li>

<li>isolationtester: Allow tuples to be returned in more places. Previously, isolationtester would forbid returning tuples in session-specific teardown (but not global teardown), as well as in global setup. Allow these places to return tuples, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f0777ba0fcfc8274b69f39de10f8d905b9f89ba">http://git.postgresql.org/pg/commitdiff/4f0777ba0fcfc8274b69f39de10f8d905b9f89ba</a></li>

<li>add multixact-no-deadlock to schedule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1310d4cab21c250f666a173690671cf95eead6b7">http://git.postgresql.org/pg/commitdiff/1310d4cab21c250f666a173690671cf95eead6b7</a></li>

<li>Fix various bugs in postmaster SIGKILL processing. Clamp the minimum sleep time during immediate shutdown or crash to a minimum of zero, not a maximum of one second. The previous code could result in a negative sleep time, leading to failure in select() calls. Also, on crash recovery, reset AbortStartTime as soon as SIGKILL is sent or abort processing has commenced instead of waiting until the startup process completes. Reset AbortStartTime as soon as SIGKILL is sent, too, to avoid doing that repeatedly. Per trouble report from Jeff Janes on CAMkU=1xd3=wFqZwwuXPWe4BQs3h1seYo8LV9JtSjW5RodoPxMg@mail.gmail.com Author: MauMau 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf2617981ceb88bdcd3cba58308d68f0c4ea3de2">http://git.postgresql.org/pg/commitdiff/bf2617981ceb88bdcd3cba58308d68f0c4ea3de2</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust C comments that would be wrap-able. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d50f2812108af287879c72b8cc5856d7db5b72b6">http://git.postgresql.org/pg/commitdiff/d50f2812108af287879c72b8cc5856d7db5b72b6</a></li>

<li>doc: fix hstore_to_json_loose() doc wording 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb5d87e5f3b827f5b26fe551006655d80c063d66">http://git.postgresql.org/pg/commitdiff/eb5d87e5f3b827f5b26fe551006655d80c063d66</a></li>

<li>Issue error on SET outside transaction block in some cases. Issue error for SET LOCAL/CONSTRAINTS/TRANSACTION outside a transaction block, as they have no effect. Per suggestion from Morten Hustveit 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a54141aebcafa02cba5204596758dadbbeb0f78e">http://git.postgresql.org/pg/commitdiff/a54141aebcafa02cba5204596758dadbbeb0f78e</a></li>

<li>pg_upgrade doc: link mode additions. Mention that link mode uses less disk space, and uses junction points on Windows. Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85fa8293ad5621eaa747fbb62681b40d1b15dfa7">http://git.postgresql.org/pg/commitdiff/85fa8293ad5621eaa747fbb62681b40d1b15dfa7</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix copy/paste error 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/542131c9e75b6d7bd068e514dae0e2b5ac708203">http://git.postgresql.org/pg/commitdiff/542131c9e75b6d7bd068e514dae0e2b5ac708203</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Set up cancel handler later. The cancel handler was uselessly set up even before the first connection was opened. By setting it up afterwards, the user can use Ctrl+C to abort psql if the initial connection attempt hangs. Reviewed-by: Dean Rasheed &lt;dean.a.rasheed@gmail.com&gt; Reviewed-by: Ryan Kelly &lt;rpkelly22@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9099e4afe0e4101bc79f078be3e15639a048e633">http://git.postgresql.org/pg/commitdiff/9099e4afe0e4101bc79f078be3e15639a048e633</a></li>

<li>doc: Correct psycopg URL 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/627882d0d8ad34c336b98ceb4eb90940fcd392cc">http://git.postgresql.org/pg/commitdiff/627882d0d8ad34c336b98ceb4eb90940fcd392cc</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Make \pset without arguments show all settings. Gilles Darold, reviewed by Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c64e68fd9f1132fec563fb5de53dc3bcccb5fc3b">http://git.postgresql.org/pg/commitdiff/c64e68fd9f1132fec563fb5de53dc3bcccb5fc3b</a></li>

<li>Add DISCARD SEQUENCES command. DISCARD ALL will now discard cached sequence information, as well. Fabr&iacute;zio de Royes Mello, reviewed by Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi, with some further tweaks by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d90ced8bb22194cbb45f58beb0961251103aeff5">http://git.postgresql.org/pg/commitdiff/d90ced8bb22194cbb45f58beb0961251103aeff5</a></li>

<li>Fix silly thinko in ResetSequenceCaches. Report from Kevin Hale Boyes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f1ef79095762e8e3e908592f0cf37c53da54028">http://git.postgresql.org/pg/commitdiff/0f1ef79095762e8e3e908592f0cf37c53da54028</a></li>

<li>doc: Add missing words to bgworker docs. Maciek Sakrejda 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4655b607f34836ae19f262bfdfe95c0be74d920c">http://git.postgresql.org/pg/commitdiff/4655b607f34836ae19f262bfdfe95c0be74d920c</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>pgbench: Elaborate latency reporting. Isolate transaction latency (elapsed time between submitting first command and receiving response to last command) from client-side delays pertaining to the --rate schedule. Under --rate, report schedule lag as defined in the documentation. Report latency standard deviation whenever we collect the measurements to do so. All of these changes affect --progress messages and the final report. Fabien COELHO, reviewed by Pavel Stehule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d6c0f10ef4f34d757e49a9815c22045d8ba6980">http://git.postgresql.org/pg/commitdiff/2d6c0f10ef4f34d757e49a9815c22045d8ba6980</a></li>

<li>pgbench: Remove stray use of "float" math. Oversight in commit 4a87f308b33457670f9ab4bc622678e5d285b9c2. Fabien COELHO 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e00a3850d4a7729a112967c204fa95b40cc54ca">http://git.postgresql.org/pg/commitdiff/8e00a3850d4a7729a112967c204fa95b40cc54ca</a></li>

<li>pgbench: Comment on thread timing hazards. Reviewed by Fabien COELHO. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7db0dc0eac4512253c2ec0e6bea60ecd2d7bea27">http://git.postgresql.org/pg/commitdiff/7db0dc0eac4512253c2ec0e6bea60ecd2d7bea27</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Rowley sent in a patch to use AppendStringInfo[type] functions instead of bare AppendStringInfo in various places throughout the source code.</li>

<li>Amit Kapila sent in another revision of a patch to implement ALTER SYSTEM.</li>

<li>Nicholas White sent in two more revisions of a patch to implement RESPECT/IGNORE NULLS in the LEAD and LAG window functions.</li>

<li>Andres Freund sent another flock of patches intended to be infrastructure for logical changeset extraction and replay.</li>

<li>Pavel Stehule sent in a patch atop the one for \pset which makes autocomplete work better.</li>

<li>Heikki Linnakangas sent in another revision of a patch to implement UNNEST with multiple arguments and TABLE with multiple functions.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Peter Eisentraut sent in another revision of a patch to use asprintf() where available.</li>

<li>Oskari Saarenmaa sent in a patch to add file cloning using BTRFS tools as an alternative data transfer method to pg_upgrade.</li>

<li>Rushabh Lathia sent in another revision of a patch to have INSERT et al throw an error when a year field has length greater than 4 for the timestamptz data type.</li>

<li>Kevin Grittner sent in three more revisions of a patch to fix an SSI freezing bug.</li>

<li>Sawada Masahiko sent in another revision of a patch to allow fail-back without a fresh backup.</li>

<li>Pavel Stehule sent in two revisions of a patch to optimize updates to fixed-length arrays.</li>

<li>KaiGai Kohei sent in another revision of a patch to insert machinery and examples for custom plan nodes.</li>

<li>Sameer Thakur sent in another revision of a patch to extend pg_stat_statements.</li>

<li>David Rowley sent in another revision of a patch to ensure that his previous patch to ensure that space reserved for WAL matches what is written doesn't break on 32-bit machines.</li>

<li>David Rowley sent in two revisions of a patch to improve performance of the column-wise INSERTs option in pg_dump.</li>

<li>Heikki Linnakangas sent in another revision of a patch to improve GIN index performance by adding more information to the index.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to add a plpgsql.print_strict_params GUC and associated machinery.</li>

<li>Noah Misch sent in a documentation patch to hold a place in pgbench for fixing an issue where estimation and short runs can be noticeably different.</li>

</ul>