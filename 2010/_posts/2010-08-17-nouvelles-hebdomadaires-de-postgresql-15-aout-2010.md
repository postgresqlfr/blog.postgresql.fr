---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 août 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/08/17/Nouvelles-hebdomadaires-de-PostgreSQL-15-août-2010"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Npgsql 2.0.10, un connecteur [ndt: <em>data provider</em>] .NET / PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.npgsql.org">http://www.npgsql.org</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La FrOSCon 2010 aura lieu &agrave; St. Augustin (Allemagne) les 21 &amp; 22 ao&ucirc;t 2010. Le PUG allemand a obtenu sa propre salle de dev. et est &agrave; la recherche de conf&eacute;renciers. Plus de d&eacute;tails&nbsp;: 

<a target="_blank" href="http://psoos.blogspot.com/2010/08/postgresql-at-froscon-2010.html">http://psoos.blogspot.com/2010/08/postgresql-at-froscon-2010.html</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la "West" est lanc&eacute; jusqu'au 5 septembre 2010. D&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100815">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Modify the handling of RAISE without parameters so that the error it throws can be caught in the same places that could catch an ordinary RAISE ERROR in the same location. The previous coding insisted on throwing the error from the block containing the active exception handler; which is arguably more surprising, and definitely unlike Oracle's behavior. Not back-patching, since this is a pretty obscure corner case. The risk of breaking somebody's code in a minor version update seems to outweigh any possible benefit. Piyush Newe, reviewed by David Fetter.</li>

<li>Fix incorrect logic in plpgsql for cleanup after evaluation of non-simple expressions. We need to deal with this when handling subscripts in an array assignment, and also when catching an exception. In an Assert-enabled build these omissions led to Assert failures, but I think in a normal build the only consequence would be short-term memory leakage; which may explain why this wasn't reported from the field long ago. Back-patch to all supported versions. 7.4 doesn't have exceptions, but otherwise these bugs go all the way back. Heikki Linnakangas and Tom Lane.</li>

<li>Add three-parameter forms of array_to_string and string_to_array, to allow better handling of NULL elements within the arrays. The third parameter is a string that should be used to represent a NULL element, or should be translated into a NULL element, respectively. If the third parameter is NULL it behaves the same as the two-parameter form. There are two incompatible changes in the behavior of the two-parameter form of string_to_array. First, it will return an empty (zero-element) array rather than NULL when the input string is of zero length. Second, if the field separator is NULL, the function splits the string into individual characters, rather than returning NULL as before. These two changes make this form fully compatible with the behavior of the new three-parameter form. Pavel Stehule, reviewed by Brendan Jurd.</li>

<li>Remove the arbitrary (and undocumented) limit on the number of parameter=value pairs that can be handled by xslt_process(). There is much else to do here, but this patch seems useful in its own right for as long as this code survives. Pavel Stehule, reviewed by Mike Fowler.</li>

<li>Extend psql's \e and \ef commands so that a line number can be specified, and the editor's cursor will be initially placed on that line. In \e the lines are counted with respect to the query buffer, while in \ef they are counted with line 1 = first line of function body. These choices are useful for positioning the cursor on the line of a previously-reported error. To avoid assumptions about what switch the user's editor takes for this purpose, invent a new psql variable EDITOR_LINENUMBER_SWITCH with (at present) no default value. One incompatibility from previous behavior is that "\e 1234" will now take "1234" as a line number not a file name. There are at least two ways to select a numerically-named file if you really want to. Pavel Stehule, reviewed by Jan Urbanski, with further editing by Robert Haas and Tom Lane.</li>

<li>Add the ability to compute per-statement latencies (ie, average execution times) to pgbench. Florian Pflug, reviewed by Greg Smith.</li>

<li>In pgsql/contrib/pgbench/pgbench.c, get rid of a bunch of dubious error handling code in pgbench by just erroring out immediately on any out-of-memory condition. It's rather pointless to imagine that pgbench will be able to continue usefully after a malloc failure, and in any case there were a number of unchecked mallocs.</li>

<li>Fix pg_restore to complain if any arguments remain after parsing the switches and input file name, per bug #5617 from Leo Shklovskii. Rearrange the corresponding code in pg_dump and pg_dumpall so that all three programs handle this in a consistent, straightforward fashion. Back-patch to 9.0, but no further. Although this is certainly a bug, it's possible that people have scripts that will be broken by the added error check, so it seems better not to change the behavior in stable branches.</li>

<li>Fix Assert failure in PushOverrideSearchPath when trying to restore a search path that specifies useTemp, but there is no active temp schema in the current session. (This can happen if the path was saved during a transaction that created a temp schema and was later rolled back.) For existing callers it's sufficient to ignore the useTemp flag in this case, though we might later want to offer an option to create a fresh temp schema. So far as I can tell this is just an Assert failure: in a non-assert build, the code would push a zero onto the new search path, which is useless but not very harmful. Per bug report from Heikki. Back-patch to 8.3; prior versions don't have this code.</li>

<li>Add xml_is_well_formed, xml_is_well_formed_document, xml_is_well_formed_content functions to the core XML code. Per discussion, the former depends on XMLOPTION while the others do not. These supersede a version previously offered by contrib/xml2. Mike Fowler, reviewed by Pavel Stehule.</li>

<li>Minor #include cleanup. I just noticed that libpq's pqsignal.h was violating our general inclusion style guidelines by explicitly including postgres_fe.h. Remove that, and put it in pqsignal.c where it belongs.</li>

<li>In pgsql/src/bin/psql/help.c, clean up failure to use ClosePager() where appropriate. Also prevent possible repeat opening of pager in helpSQL().</li>

<li>In pgsql/src/include/storage/backendid.h, myBackendId now needs to be PGDLLIMPORT, so that contrib modules can access it on Windows. Per buildfarm.</li>

<li>Add a \sf (show function) command to psql, for those times when you need to look at a function but don't wish to fire up an editor. Pavel Stehule, reviewed by Jan Urbanski</li>

<li>Fix \ef and \sf to not fail on functions with nonnull probin. Update comment about them in pg_get_functiondef.</li>

<li>In pgsql/src/backend/optimizer/util/clauses.c, fix planner to make a reasonable assumption about the amount of memory space used by array_agg(), string_agg(), and similar aggregate functions that use "internal" as their transition datatype. The previous coding thought this took *no* extra space, since "internal" is pass-by-value; but actually these aggregates typically consume a great deal of space. Per bug #5608 from Itagaki Takahiro, and fix suggestion from Hitoshi Harada. Back-patch to 8.4, where array_agg was introduced.</li>

<li>In pgsql/doc/src/sgml/pgbench.sgml, avoid unnecessary use of TPS acronym. Robert Haas, per gripe from Erik Rijkers.</li>

<li>In pgsql/doc/src/sgml/pgarchivecleanup.sgml, improve pgarchivecleanup documentation, per comments from Satoshi Nagayasu.</li>

<li>In pgsql/doc/src/sgml/func.sgml, clarify bit numbering in get_bit/set_bit etc. Per gripe from Zoltan Boszormenyi.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, assorted improvements to backup/restore documentation, per Thom Brown.</li>

<li>In pgsql/src/bin/psql/mbprint.c, fix psql's copy of utf2ucs() to match the backend's copy exactly; in particular, propagate a fix in the test to see whether a UTF8 character has length 4 bytes. This is likely of little real-world consequence because 5-or-more-byte UTF8 sequences are not supported by Postgres nor seen anywhere in the wild, but still we may as well get it right. Problem found by Joseph Adams. Bug is aboriginal, so back-patch all the way.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In the libpq docs, provide stable target anchors for libpq functions. Daniele Varrazzo.</li>

<li>Use double quotes rather than double quotes for libpq target anchors. Per observation from Tom Lane that the previous patch to these files was not consistent with what is done elsewhere in the docs.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, fix incorrect errno definitions in ECPG manual. ecpgerrno.h hasn't materially changed since PostgreSQL 7.4, so this has been wrong for a very long time. Back-patch all the way. Satoshi Nagayasu.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, fix one more incorrect errno definition in the ECPG manual. Again, back-patch all the way to 7.4.</li>

<li>Correct sundry errors in Hot Standby-related comments. Fujii Masao.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, reorder docs on lexical structure slightly for clarity. Thom Brown.</li>

<li>In pgsql/src/backend/access/transam/xact.c, make RecordTransactionCommit() respect wal_level. Since the only purpose of WAL-logging SharedInvalidationMessages is to support Hot Standby operation, they needn't be included when wal_level &lt; hot_standby. Back-patch to 9.0. Review by Heikki Linnakanagas and Fujii Masao.</li>

<li>Include the backend ID in the relpath of temporary relations. This allows us to reliably remove all leftover temporary relation files on cluster startup without reference to system catalogs or WAL; therefore, we no longer include temporary relations in XLOG_XACT_COMMIT and XLOG_XACT_ABORT WAL records. Since these changes require including a backend ID in each SharedInvalSmgrMsg, the size of the SharedInvalidationMessage.id field has been reduced from two bytes to one, and the maximum number of connections has been reduced from INT_MAX / 4 to 223-1. It would be possible to remove these restrictions by increasing the size of SharedInvalidationMessage by 4 bytes, but right now that doesn't seem like a good trade-off. Review by Jaime Casanova and Tom Lane.</li>

<li>Fix assorted dtrace breakage caused by patch to include backend IDs in temp relpaths. Per buildfarm.</li>

<li>Further dtrace adjustments for the backend-IDs-in-relpath patch. Update the documentation, and back out a few ill-considered changes whose folly I failed to realize for failure to read the documentation.</li>

<li>Add doc link and additional index reference to pgcrypto. Kevin Grittner, with markup adjustments.</li>

<li>In pgsql/src/backend/storage/lmgr/lmgr.c, make LockDatabaseObject() AcceptInvalidationMessages(). This is appropriate for the same reasons we already do it in LockSharedObject(): things might have changed while we were waiting for the lock. There doesn't seem to be a live bug here at the moment, but that's mostly because it isn't currently used for very much.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/explain.sgml, add EXPLAIN documentation example. Gabrielle Roth. Backpatch to 9.0.X.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, properly lowercase identifiers, uppercase keywords, in doc examples.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, back out syntax case changes --- seems they were intentional.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/datatype.sgml, &lt;example&gt; is a floating element, so it's use is inappropriate when the surrounding text refers to the example inline.</li>

<li>Add some links to tables in the docs.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/arrayfuncs.c, the sanity check added to array_recv() wa a bit too tight; we must continue to accept an empty array with dimension information. array_send() can output such arrays. Per report from Vladimir Shakhov.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Erik Rijkers sent in a doc patch for pgbench defining TPS to mean "transactions per second."</li>

<li>Kris Jurka sent in another revision of the patch to fix COPY IN.</li>

<li>Peter Eisentraut sent in a patch to allow specifying hosts by name in pg_hba.conf.</li>

<li>Pavel Stehule sent in another revision of the GROUPING SETS patch.</li>

<li>Robert Haas sent in a patch to reduce the size of the id for SharedInvalidationMessages to one byte.</li>

<li>Boxuan Zhai sent in four more revisions of the MERGE patch, and Heikki Linnakangas responded with a cleaned-up one.</li>

<li>Joseph Adams sent in two more WIP patches to add the JSON type, the second adding it as a core type rather than the previous contrib.</li>

<li>Fujii Masao sent in a patch to align the docs and code for trace_recovery_messages.</li>

<li>Greg Smith sent in another revision of the patch to add individual statement latencies to pgbench.</li>

<li>Joseph Adams sent in a patch to fix utf8-to-unicode.</li>

<li>Joseph Adams sent in some general utility functions for, among other things, enum handling in C stored procedures.</li>

<li>Zoltan Boszormenyi sent in a WIP patch to add replication to the SQL syntax.</li>

<li>Dean Rasheed sent in another WIP patch to implement triggers on views.</li>

<li>Robert Haas sent in another revision of the patch to refactor comment.c.</li>

</ul>