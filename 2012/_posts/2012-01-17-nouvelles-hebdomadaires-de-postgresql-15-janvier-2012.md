---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 janvier 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/01/17/Nouvelles-hebdomadaires-de-PostgreSQL-15-janvier-2012"
---


<p>La <em>Commitfest</em> n&deg;4 est lanc&eacute;e. Commencez &agrave; relire ces patchs&nbsp;! 

<a target="_blank" href="https://commitfest.postgresql.org/action/commitfest_view?id=13">https://commitfest.postgresql.org/action/commitfest_view?id=13</a></p>

<p>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague. L'appel &agrave; conf&eacute;renciers est lanc&eacute;. Merci d'envoyer vos propositions, incluant le sujet, une estimation de la dur&eacute;e et vos coordonn&eacute;es &agrave; l'adresse info CHEZ p2d2 POINT cz.</li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-01/msg00007.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_basebackup for keepalive messages. Teach pg_basebackup in streaming mode to deal with keepalive messages. Also change the order of checks to complain at the message rather than block size when a new message is introduced. In passing, switch to using sizeof() instead of hardcoded sizes for WAL protocol structs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b020d228b976821181ac673964f302b2c32f12d">http://git.postgresql.org/pg/commitdiff/6b020d228b976821181ac673964f302b2c32f12d</a></li>

<li>Fix comment language. Per comment from Heikki Linnakangas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ecd359c420203082489e2b5dddd098e34a1b70c">http://git.postgresql.org/pg/commitdiff/4ecd359c420203082489e2b5dddd098e34a1b70c</a></li>

<li>Add .gitignore file for entab. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/822128947eb707830ad1b775c216517c3a54befc">http://git.postgresql.org/pg/commitdiff/822128947eb707830ad1b775c216517c3a54befc</a></li>

<li>Allow a user to kill his own queries using pg_cancel_backend(). Allows a user to use pg_cancel_queries() to cancel queries in other backends if they are running under the same role. pg_terminate_backend() still requires superuser permissions. Short patch, many authors working on the bikeshed: Magnus Hagander, Josh Kupershmidt, Edward Muller, Greg Smith. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0495aaad8b337642830a4d4e82f8b8c02b27b1be">http://git.postgresql.org/pg/commitdiff/0495aaad8b337642830a4d4e82f8b8c02b27b1be</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pathname in pgindent README. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc3f33f6be0be3f7ce25511d4485506ec43e20aa">http://git.postgresql.org/pg/commitdiff/dc3f33f6be0be3f7ce25511d4485506ec43e20aa</a></li>

<li>Typo fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d0b11a0ca347e5b0304004625b7eb6752e32ee7">http://git.postgresql.org/pg/commitdiff/4d0b11a0ca347e5b0304004625b7eb6752e32ee7</a></li>

<li>Fix broken logic in lazy_vacuum_heap. As noted by Tom Lane, the previous coding in this area, which I introduced in commit bbb6e559c4ea0fb4c346beda76736451dc24eb4e, was poorly tested and caused the vacuum's second heap to go into what would have been an infinite loop but for the fact that it eventually caused a memory allocation failure. This version seems to work better. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0dcb315db0043f10073a9a244cea138e9e60edd">http://git.postgresql.org/pg/commitdiff/d0dcb315db0043f10073a9a244cea138e9e60edd</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add compatibility note about grant options on GRANT reference page. Point out in the compatibility section that granting grant options to PUBLIC is not supported by PostgreSQL. This is already mentioned earlier, but since it concerns the information schema, it might be worth pointing out explicitly as a compatibility issue. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/743ed082accbc542294a4408e2e45a6ffb8ec966">http://git.postgresql.org/pg/commitdiff/743ed082accbc542294a4408e2e45a6ffb8ec966</a></li>

<li>pg_dump: Dump foreign options in sorted order 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07123dff778389382f08d2152742bb061d351c21">http://git.postgresql.org/pg/commitdiff/07123dff778389382f08d2152742bb061d351c21</a></li>

<li>Support CREATE TABLE (LIKE ...) with foreign tables and views. Composite types are not yet supported, because parserOpenTable() rejects them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9f2e31cf653bad72debae616521130065e55077">http://git.postgresql.org/pg/commitdiff/a9f2e31cf653bad72debae616521130065e55077</a></li>

<li>Fix typos 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26e89e7f23194e390ec4326cd0198a1992c2adf0">http://git.postgresql.org/pg/commitdiff/26e89e7f23194e390ec4326cd0198a1992c2adf0</a></li>

<li>initdb: Remove support for crypt authentication method. This was removed from the backend a long time ago, but initdb still thought that it was OK to use in the -A option. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea038d65c2460408296a5708da8bb0bd8f3d00bc">http://git.postgresql.org/pg/commitdiff/ea038d65c2460408296a5708da8bb0bd8f3d00bc</a></li>

<li>pgcrypto: Remove inappropriate const qualifier. The function in question does not in fact ensure that the passed argument is not changed, and the callers don't care much either. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/652300f5392f2d951b368c38f1cf123003e5e21e">http://git.postgresql.org/pg/commitdiff/652300f5392f2d951b368c38f1cf123003e5e21e</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix one-byte buffer overrun in contrib/test_parser. The original coding examined the next character before verifying that there *is* a next character. In the worst case with the input buffer right up against the end of memory, this would result in a segfault. Problem spotted by Paul Guyot; this commit extends his patch to fix an additional case. In addition, make the code a tad more readable by not overloading the usage of *tlen. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89b3c6cc8b560f7f46a6a25b270aed5330c09a0e">http://git.postgresql.org/pg/commitdiff/89b3c6cc8b560f7f46a6a25b270aed5330c09a0e</a></li>

<li>Tweak duplicate-index-column regression test to avoid locale sensitivity. The originally-chosen test case gives different results in es_EC locale because of unusual rule for sorting strings beginning with "LL". Adjust the comparison value to avoid that, while hopefully not introducing new locale dependencies elsewhere. Per report from Jaime Casanova. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de5a08c59de39df07599723cb212ae8297903f48">http://git.postgresql.org/pg/commitdiff/de5a08c59de39df07599723cb212ae8297903f48</a></li>

<li>Fix CLUSTER/VACUUM FULL for toast values owned by recently-updated rows. In commit 7b0d0e9356963d5c3e4d329a917f5fbb82a2ef05, I made CLUSTER and VACUUM FULL try to preserve toast value OIDs from the original toast table to the new one. However, if we have to copy both live and recently-dead versions of a row that has a toasted column, those versions may well reference the same toast value with the same OID. The patch then led to duplicate-key failures as we tried to insert the toast value twice with the same OID. (The previous behavior was not very desirable either, since it would have silently inserted the same value twice with different OIDs. That wastes space, but what's worse is that the toast values inserted for already-dead heap rows would not be reclaimed by subsequent ordinary VACUUMs, since they go into the new toast table marked live not deleted.) To fix, check if the copied OID already exists in the new toast table, and if so, assume that it stores the desired value. This is reasonably safe since the only case where we will copy an OID from a previous toast pointer is when toast_insert_or_update was given that toast pointer and so we just pulled the data from the old table; if we got two different values that way then we have big problems anyway. We do have to assume that no other backend is inserting items into the new toast table concurrently, but that's surely safe for CLUSTER and VACUUM FULL. Per bug #6393 from Maxim Boguk. Back-patch to 9.0, same as the previous patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21b446dd0927f8f2a187d9461a0d3f11db836f77">http://git.postgresql.org/pg/commitdiff/21b446dd0927f8f2a187d9461a0d3f11db836f77</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Refactor XLogInsert a bit. The rdata entries for backup blocks are now constructed before acquiring WALInsertLock, which slightly reduces the time the lock is held. Although I could not measure any benefit in benchmarks, the code is more readable this way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c808f89c2841dd847555898a8db45fcd69e913b">http://git.postgresql.org/pg/commitdiff/9c808f89c2841dd847555898a8db45fcd69e913b</a></li>

<li>Remove useless 'needlock' argument from GetXLogInsertRecPtr. It was always passed as 'true'. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b9dea04b5cd8b1b2f8041e4aece9d573f007eb1">http://git.postgresql.org/pg/commitdiff/1b9dea04b5cd8b1b2f8041e4aece9d573f007eb1</a></li>

<li>Make superuser imply replication privilege. The idea of a privilege that superuser doesn't have doesn't make much sense, as a superuser can do whatever he wants through other means, anyway. So instead of granting replication privilege to superusers in CREATE USER time by default, allow replication connection from superusers whether or not they have the replication privilege. Patch by Noah Misch, per discussion on bug report #6264 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00c5f55061df52ccfd82eae16f054e08818ad0ff">http://git.postgresql.org/pg/commitdiff/00c5f55061df52ccfd82eae16f054e08818ad0ff</a></li>

<li>Fix poll() implementation of WaitLatchOrSocket to notice postmaster death. When the remote end of the pipe is closed, select() reports the fd as readable, but poll() has a separate POLLHUP return code for that. Spotted by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2b4af535eb733ba0c2ea6eeb2b14cac7f1ca4be">http://git.postgresql.org/pg/commitdiff/b2b4af535eb733ba0c2ea6eeb2b14cac7f1ca4be</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Validate number of steps specified in permutation. A permutation that specifies more steps than defined causes isolationtester to crash, so avoid that. Using less steps than defined should probably not be a problem, but no spec currently does that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50363c8f86f89fe611ba417575218978917f1ac0">http://git.postgresql.org/pg/commitdiff/50363c8f86f89fe611ba417575218978917f1ac0</a></li>

<li>Avoid NULL pointer dereference in isolationtester 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2a75837ccaa3b0da996969674b631dc3f778838">http://git.postgresql.org/pg/commitdiff/d2a75837ccaa3b0da996969674b631dc3f778838</a></li>

<li>Detect invalid permutations in isolationtester. isolationtester is now able to continue running other permutations when it detects that one of them is invalid, which is useful during initial development of spec files. Author: Alexander Shulgin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7064fd06489e069d38a9d67c5322265cb8f7ceec">http://git.postgresql.org/pg/commitdiff/7064fd06489e069d38a9d67c5322265cb8f7ceec</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor but necessary improvements to WAL keepalives. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f1787c253967617a0e34fa4bfb7b2ab184ad484">http://git.postgresql.org/pg/commitdiff/3f1787c253967617a0e34fa4bfb7b2ab184ad484</a></li>

<li>Correctly initialise shared recoveryLastRecPtr in recovery. Previously we used ReadRecPtr rather than EndRecPtr, which was not a serious error but caused pg_stat_replication to report incorrect replay_location until at least one WAL record is replayed. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5530623d0326e96e40b8d54275da256ca0fb6856">http://git.postgresql.org/pg/commitdiff/5530623d0326e96e40b8d54275da256ca0fb6856</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve efficiency of recent changes to plperl's sv2cstr(). Along the way, add a missing dependency in the GNUmakefile. Alex Hunsaker, with a slight adjustment by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01d83ffdcae92f75dbfd41de0b4213d241edd394">http://git.postgresql.org/pg/commitdiff/01d83ffdcae92f75dbfd41de0b4213d241edd394</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Eisentraut sent in a patch to make variable-length pg_catalog fields invisible in pg_* C structs.</li>

<li>Joel Jacobson sent in two revisions of a patch to create call graphs for UDF function calls inside PostgreSQL.</li>

<li>Joachim Wieland sent in a patch to allow master databases to send NOTIFYs to replicas.</li>

<li>Robert Haas and Andrew Dunstan traded patches to add JSON types and associated infrastructure.</li>

<li>Ryan Kelly and Heikki Linnakangas traded patches to allow breaking out of hung connection attempts in libpq.</li>

<li>KaiGai Kohei sent in a patch to add a new GUC: sepgsql.client_label, which allows a client process to switch its privileges into another one, as long as the system security policy allows this transition.</li>

<li>KaiGai Kohei sent a patch to add OAT_DROP object access hook around the permission checks of object deletion.</li>

<li>David Fetter sent in a patch by Dan Scales to add double-write, which among other things gets durability guarantees without the same overhead as full_page_writes.</li>

<li>Robert Haas sent in a patch intended to ensure checkpoint writeback via sync_file_range where this call is available.</li>

<li>Simon Riggs sent in another revision of the patch to allow logging messages for archive recovery progress.</li>

<li>Peter Eisentraut sent in a patch to add .colnames() and .coltypes() methods to PL/PythonU.</li>

<li>Peter Eisentraut sent in a patch to make psql's tab completion preserve the case the completion was started in rather than unconditionally upper-casing keywords.</li>

<li>Peter Eisentraut sent in a patch to add a command ALTER TABLE ... RENAME CONSTRAINT.</li>

<li>Thomas Munro sent in a patch to rename sequences automatically in cases where this makes sense.</li>

<li>Scott Mead sent in another revision of the patch to allow introspecting "IDLE IN TRANSACTION" situations.</li>

<li>Noah Misch sent in another revision of the patch to collect frequency statistics for arrays.</li>

<li>Simon Riggs sent in another revision of the patch to remove CLOG contention caused by dirty CLOG LRU.</li>

<li>Kevin Grittner and Tom Lane traded patches to fix bug #6123 

<a target="_blank" href="http://archives.postgresql.org/pgsql-bugs/2011-07/msg00138.php">http://archives.postgresql.org/pgsql-bugs/2011-07/msg00138.php</a></li>

<li>Robert Haas sent in a patch to measure spinning.</li>

<li>Simon Riggs sent in a patch to simulate CLOG contention.</li>

<li>Simon Riggs sent in a patch to add a new -x option for pgbench which executes the given command once after connection of each session.</li>

<li>Simon Riggs sent in a patch to ensure that the correct code, ERRCODE_READ_ONLY_SQL_TRANSACTION, be sent in all remaining cases for illegal actions on a standby.</li>

<li>Fujii Masao sent in a patch to add a "write" replication mode for synchronous replication.</li>

<li>Fujii Masao sent in another revision of the patch to allow taking an online base backup from a standby.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add triggers on commands.</li>

<li>Robert Haas sent in a patch to fix an issue where concurrent CREATE TABLE/DROP SCHEMA can leave inconsistent leftovers.</li>

<li>Greg Smith sent in a patch to speed up dblink by creating and using a new libpq tuple storage system.</li>

<li>Fujii Masao sent in a patch intended to correct an issue where replay_location indicates an incorrect location.</li>

<li>Robert Haas sent in a patch which shows Heap Fetches in EXPLAIN for index-only scans.</li>

<li>Tomas Vondra sent in another revision of the patch to allow EXPLAIN ANALYZE with rows but not timing information.</li>

<li>Alvaro Herrera sent in another revision of the patch to add foreign key locks.</li>

<li>Marco Nenciarini sent in another revision of the patch to make it possible to enforce arrays of foreign keys.</li>

<li>Peter Eisentraut sent in a patch to implement specific -A (auth) options for initdb, namely --auth-local and --auth-host.</li>

<li>Heikki Linnakangas sent in another revision of the patch to move work outside WALInsertLock.</li>

<li>Peter Eisentraut sent in a patch to allow GUC control of the location of server-side SSL files.</li>

<li>Peter Eisentraut sent in a patch to allow using the NUL byte as a field or record separator in psql output.</li>

<li>Noah Misch sent in a patch to make psql's filename completion work with filenames that contain one or more spaces.</li>

<li>Noah Misch sent in a patch to fix several infelicities in psql's handling of COPY.</li>

<li>Matthew Draper sent in a patch to allow SQL language functions to reference parameters by name. And there was much rejoicing!</li>

<li>Peter Eisentraut sent in a patch to clean up a lot of warnings in assert-free builds.</li>

<li>Jaime Casanova sent in a patch to add a pg_stats_recovery view.</li>

<li>Ants Aasma sent in another revision of the patch to add timing of buffer I/O requests.</li>

<li>Peter Eisentraut sent in a patch to change the exit() calls in libraries to abort()s.</li>

<li>Simon Riggs sent in a patch to enable keepalive on quiet systems that are replicating.</li>

<li>Jaime Casanova sent in a patch which adds checks to pg_basebackup to ensure that the system-set number of fields is actually there.</li>

<li>Greg Smith sent in a patch to add a GUC which rate-limits VACUUMs in kB/sec.</li>

<li>Simon Riggs sent in a patch to change the walrestore process so it asynchronously executes restore_command while recovery continues working.</li>

<li>Joachim Wieland sent in another revision of the patch to parallelize pg_dump.</li>

<li>Kevin Grittner sent in another revision of the patch to add a function which shows trigger depth.</li>

<li>Peter Geoghegan sent in another revision of the patch to allow group commit.</li>

<li>Jeff Janes sent in a patch to calculate memory for sorts more precisely and use it more efficiently.</li>

<li>Kevin Grittner sent in another revision of the patch to generalize trigger functionality for any operation after each row of any table with a primary key. This is called trigger_change_notification.</li>

</ul>