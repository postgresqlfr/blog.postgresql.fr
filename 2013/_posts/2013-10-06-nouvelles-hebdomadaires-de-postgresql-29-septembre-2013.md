---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 septembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-10-06-nouvelles-hebdomadaires-de-postgresql-29-septembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix two timeline handling bugs in pg_receivexlog. When a timeline history file is fetched from server, it is initially created with a temporary file name, and renamed to place. However, the temporary file name was constructed using an uninitialized buffer. Usually that meant that the file was created in current directory instead of the target, which usually goes unnoticed, but if the target is on a different filesystem than the current dir, the rename() would fail. Fix that. The second issue is that pg_receivexlog would not take .partial files into account when determining when scanning the target directory for existing WAL files. If the timeline has switched in the server several times in the last WAL segment, and pg_receivexlog is restarted, it would choose a too old starting point. That's not a problem as long as the old WAL segment exists in the server and can be streamed over, but will cause a failure if it's not. Backpatch to 9.3, where this timeline handling code was written. Analysed by Andrew Gierth, bug #8453, based on a bug report on IRC. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b882246e3ab4382b3c9f58e5f85dd8c9e3eb594f">http://git.postgresql.org/pg/commitdiff/b882246e3ab4382b3c9f58e5f85dd8c9e3eb594f</a></li>

<li>Plug memory leak in range_cmp function. B-tree operators are not allowed to leak memory into the current memory context. Range_cmp leaked detoasted copies of the arguments. That caused a quick out-of-memory error when creating an index on a range column. Reported by Marian Krucina, bug #8468. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77ae7f7c356064f5355e004b95f485358dfc1360">http://git.postgresql.org/pg/commitdiff/77ae7f7c356064f5355e004b95f485358dfc1360</a></li>

<li>Fix spurious warning after vacuuming a page on a table with no indexes. There is a rare race condition, when a transaction that inserted a tuple aborts while vacuum is processing the page containing the inserted tuple. Vacuum prunes the page first, which normally removes any dead tuples, but if the inserting transaction aborts right after that, the loop after pruning will see a dead tuple and remove it instead. That's OK, but if the page is on a table with no indexes, and the page becomes completely empty after removing the dead tuple (or tuples) on it, it will be immediately marked as all-visible. That's OK, but the sanity check in vacuum would throw a warning because it thinks that the page contains dead tuples and was nevertheless marked as all-visible, even though it just vacuumed away the dead tuples and so it doesn't actually contain any. Spotted this while reading the code. It's difficult to hit the race condition otherwise, but can be done by putting a breakpoint after the heap_page_prune() call. Backpatch all the way to 8.4, where this code first appeared. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adaba2751f617c0045f72d2ac2d5402cc184fb29">http://git.postgresql.org/pg/commitdiff/adaba2751f617c0045f72d2ac2d5402cc184fb29</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix SSL deadlock risk in libpq. In libpq, we set up and pass to OpenSSL callback routines to handle locking. When we run out of SSL connections, we try to clean things up by de-registering the hooks. Unfortunately, we had a few calls into the OpenSSL library after these hooks were de-registered during SSL cleanup which lead to deadlocking. This moves the thread callback cleanup to be after all SSL-cleanup related OpenSSL library calls. I've been unable to reproduce the deadlock with this fix. In passing, also move the close_SSL call to be after unlocking our ssl_config mutex when in a failure state. While it looks pretty unlikely to be an issue, it could have resulted in deadlocks if we ended up in this code path due to something other than SSL_new failing. Thanks to Heikki for pointing this out. Back-patch to all supported versions; note that the close_SSL issue only goes back to 9.0, so that hunk isn't included in the 8.4 patch. Initially found and reported by Vesa-Matti J Kari; many thanks to both Heikki and Andres for their help running down the specific issue and reviewing the patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b37c90f11e3c239b999f98ffd3bbea6b8253fffa">http://git.postgresql.org/pg/commitdiff/b37c90f11e3c239b999f98ffd3bbea6b8253fffa</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: fix C comment typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7cf5fa262f8be1bc75f390708ceed26d25f1e7d">http://git.postgresql.org/pg/commitdiff/f7cf5fa262f8be1bc75f390708ceed26d25f1e7d</a></li>

<li>pg_upgrade: more C comment fixes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff2a1f5e84ee9984b33ee31e6fb9c6f2760a820e">http://git.postgresql.org/pg/commitdiff/ff2a1f5e84ee9984b33ee31e6fb9c6f2760a820e</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't allow system columns in CHECK constraints, except tableoid. Previously, arbitray system columns could be mentioned in table constraints, but they were not correctly checked at runtime, because the values weren't actually set correctly in the tuple. Since it seems easy enough to initialize the table OID properly, do that, and continue allowing that column, but disallow the rest unless and until someone figures out a way to make them work properly. No back-patch, because this doesn't seem important enough to take the risk of destabilizing the back branches. In fact, this will pose a dump-and-reload hazard for those upgrading from previous versions: constraints that were accepted before but were not correctly enforced will now either be enforced correctly or not accepted at all. Either could result in restore failures, but in practice I think very few users will notice the difference, since the use case is pretty marginal anyway and few users will be relying on features that have not historically worked. Amit Kapila, reviewed by Rushabh Lathia, with doc changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba3d39c96921c96de114f6c22a9572bff24708b5">http://git.postgresql.org/pg/commitdiff/ba3d39c96921c96de114f6c22a9572bff24708b5</a></li>

<li>doc: Clarify that file_fdw options require values. Mike Blackwell and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54990af616ebb31fb1ae04e8aaf332d483a9e3a5">http://git.postgresql.org/pg/commitdiff/54990af616ebb31fb1ae04e8aaf332d483a9e3a5</a></li>

<li>Allow printf-style padding specifications in log_line_prefix. David Rowley, after a suggestion from Heikki Linnakangas. Reviewed by Albe Laurenz, and further edited by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4334639f4bb9fb88c13b8dd5faca22b207248504">http://git.postgresql.org/pg/commitdiff/4334639f4bb9fb88c13b8dd5faca22b207248504</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use @libdir@ in both of regress/{input,output}/security_label.source. Though @libdir@ almost always matches @abs_builddir@ in this context, the test could only fail if they differed. Back-patch to 9.1, where the test was introduced. Hamid Quddus Akhtar 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b43b64caea4457c3a901e88e910f7e8badb5035f">http://git.postgresql.org/pg/commitdiff/b43b64caea4457c3a901e88e910f7e8badb5035f</a></li>

<li>pgbench: Tweak documentation. Fabien COELHO 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/825da2aba8ae7a5824e9fb3823125c5c755ea568">http://git.postgresql.org/pg/commitdiff/825da2aba8ae7a5824e9fb3823125c5c755ea568</a></li>

<li>pgbench: Correct for bias in --rate schedule generation. Previous code gave a mean delay 0.44% below target. This change also has the effect of increasing the maximum possible delay. Fabien COELHO 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2df45a37cd9e32815fe2786cbb3ef905daaa7d2">http://git.postgresql.org/pg/commitdiff/c2df45a37cd9e32815fe2786cbb3ef905daaa7d2</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pgindent comment breakage 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2fc4d6142033e361dee91388d9515be3633763c">http://git.postgresql.org/pg/commitdiff/b2fc4d6142033e361dee91388d9515be3633763c</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix erroneous statements about multiply specified JSON columns. The behaviour in json_populate_record() and json_populate_recordset() was changed during development but the docs were not. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d70f8d5f1b8bfa62a34b79445faae39acdb0363d">http://git.postgresql.org/pg/commitdiff/d70f8d5f1b8bfa62a34b79445faae39acdb0363d</a></li>

<li>Ensure installation dirs are built before contents are installed. C&eacute;dric Villemain 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d942f9d9283f831fc74ed3cf60e6c8362274b36e">http://git.postgresql.org/pg/commitdiff/d942f9d9283f831fc74ed3cf60e6c8362274b36e</a></li>

<li>Use a new hstore extension version for added json functions. This should have been done when the json functionality was added to hstore in 9.3.0. To handle this correctly, the upgrade script therefore uses conditional logic by using plpgsql in a DO statement to add the two new functions and the new cast. If hstore_to_json_loose is detected as already present and dependent on the hstore extension nothing is done. This will require that the database be loaded with plpgsql. People who have installed the earlier and spurious 1.1 version of hstore will need to do: ALTER EXTENSION hstore UPDATE; to pick up the new functions properly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a18167510f4c385329697588ce5132cbf95779c3">http://git.postgresql.org/pg/commitdiff/a18167510f4c385329697588ce5132cbf95779c3</a></li>

<li>Fix makefile broken by hstore fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42bf7fc1de4d25c92b244fabe1a6b1cbec99f151">http://git.postgresql.org/pg/commitdiff/42bf7fc1de4d25c92b244fabe1a6b1cbec99f151</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct comment of pgbench "filler" columns. Pavan Deolasee 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/514b3194e80ec71bdbc92798ea946d7b51ea7ac2">http://git.postgresql.org/pg/commitdiff/514b3194e80ec71bdbc92798ea946d7b51ea7ac2</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in two more revisions of a patch to improve the performance of AVG on NUMERICs.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to improve GIN performance by adding information to what's stored.</li>

<li>Fabien COELHO sent in three more patches intended to improve pgbench.</li>

<li>Andres Freund sent in a patch to use critical section when ensuring empty pages are initialized during vacuum.</li>

<li>Stas Kelvich sent in another revision of a patch to add point support to the cube extension.</li>

<li>Laurenz Albe sent in another revision of a patch to fix the use of a deprecated OpenLDAP API.</li>

<li>Stas Kelvich sent in a patch to implement support for different storage types for cubes.</li>

<li>Stas Kelvich sent in a patch to fix the split algorithm implemented in cube extension.</li>

<li>Alvaro Herrera sent in four more revisions of a patch to implement minmax indexing.</li>

<li>Bruce Momjian sent in another revision of a patch to issue a warning when calling SET TRANSACTION outside transaction block.</li>

<li>Kevin Grittner sent in three more revisions of a patch to implement a record_identical operator.</li>

<li>Heikki Linnakangas sent in two more revisions of a patch to implement freezing without write I/O.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Heikki Linnakangas sent in another revision of a patch to fix two bugs exposed in the attempt to fix the SSI freezing bug. The first is in heap_hot_search_buffer(), where the PredicateLockTuple() call is passed wrong offset number. heapTuple-&gt;t_self is set to the tid of the first tuple in the chain that's visited, not the one actually being read. The second is that CheckForSerializableConflictIn() uses the tuple's t_ctid field instead of t_self to check for exiting predicate locks on the tuple. If the tuple was updated, but the updater rolled back, t_ctid points to the aborted dead tuple.</li>

<li>Ivan Lezhnjov IV, Robert Haas, and Karl O. Pinc sent in patches clarifying non-superuser backups.</li>

<li>Andres Freund sent in a patch to improve performance by creating a wait free LW_SHARED acquisition method.</li>

<li>Merlin Moncure sent in a patch to fix an issue where the CPU could go to 100% and stay there that replaces the spinlock with a read barrier based on a suggestion made by Andres Freund.</li>

<li>Chris Browne sent in a patch to add a "-g / --roles" option for createuser.</li>

<li>Andres Freund sent in another flock of patches intended to be infrastructure for logical changeset replication.</li>

<li>Amit Kapila sent in another revision of a patch to allow changing system parameters via SQL persistently across restarts.</li>

<li>Ian Lawrence Barwick sent in a patch to Allow COPY in CSV mode to control whether a quoted zero-length string is treated as NULL.</li>

<li>Gilles Darold sent in another revision of a patch to make psql's pset print out the current configuration if not given an argument.</li>

<li>Nicholas White sent in a patch to use repalloc in the patch that allows LAG and LEAD functions to ignore NULLs if told to.</li>

</ul>