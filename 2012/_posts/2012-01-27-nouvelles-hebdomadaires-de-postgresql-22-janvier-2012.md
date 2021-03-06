---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 janvier 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/01/27/Nouvelles-hebdomadaires-de-PostgreSQL-22-janvier-2012"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Version 2.19.0 de check_postgres, un outil de surveillance de PostgreSQL&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/check_postgres">http://bucardo.org/wiki/check_postgres</a></li>

<li>PostgreSQL XC 0.97, une solution de cluster multi-ma&icirc;tre synchrone, souple sur les performances en &eacute;criture, bas&eacute;e sur PostgreSQL 9.1&nbsp;: 

<a target="_blank" href="http://sourceforge.net/projects/postgres-xc/">http://sourceforge.net/projects/postgres-xc/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague.</li>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-01/msg00009.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqués</strong></p>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Prevent adding relations to a concurrently dropped schema. In the previous coding, it was possible for a relation to be created via CREATE TABLE, CREATE VIEW, CREATE SEQUENCE, CREATE FOREIGN TABLE, etc. in a schema while that schema was meanwhile being concurrently dropped. This led to a pg_class entry with an invalid relnamespace value. The same problem could occur if a relation was moved using ALTER .. SET SCHEMA while the target schema was being concurrently dropped. This patch prevents both of those scenarios by locking the schema to which the relation is being added using AccessShareLock, which conflicts with the AccessExclusiveLock taken by DROP. As a desirable side effect, this also prevents the use of CREATE OR REPLACE VIEW to queue for an AccessExclusiveLock on a relation on which you have no rights: that will now fail immediately with a permissions error, before trying to obtain a lock. We need similar protection for all other object types, but as everything other than relations uses a slightly different set of code paths, I'm leaving that for a separate commit. Original complaint (as far as I could find) about CREATE by Nikhil Sontakke; risk for ALTER .. SET SCHEMA pointed out by Tom Lane; further details by Dan Farina; patch by me; review by Hitoshi Harada.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1575fbcb795fc331f46588b4520c4bca7e854d5c">http://git.postgresql.org/pg/commitdiff/1575fbcb795fc331f46588b4520c4bca7e854d5c</a></li>

<li>fastgetattr is in access/htup.h, not access/heapam.h. Noted by Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/754b8140a1a5ceb12343fd89423da5cc86ce5328">http://git.postgresql.org/pg/commitdiff/754b8140a1a5ceb12343fd89423da5cc86ce5328</a></li>

<li>Catch fatal flex errors in the GUC file lexer. This prevents the postmaster from unexpectedly croaking if postgresql.conf contains something like: include 'invalid_directory_name' Noah Misch. Reviewed by Tom Lane and myself.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b496a3583ecb3f70bb4d13f8275dbb7e5b26100">http://git.postgresql.org/pg/commitdiff/4b496a3583ecb3f70bb4d13f8275dbb7e5b26100</a></li>

<li>Regression tests for security_barrier views. KaiGai Kohei

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/504f0c5d5d2955c05458e1a8d5f4fbba4cac07cd">http://git.postgresql.org/pg/commitdiff/504f0c5d5d2955c05458e1a8d5f4fbba4cac07cd</a></li>

<li>Add bitwise AND, OR, and NOT operators for macaddr data type. Brendan Jurd, reviewed by Fujii Masao.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc53a1e7ccfa762bda70e1b6a15bfd929bf1b4e3">http://git.postgresql.org/pg/commitdiff/cc53a1e7ccfa762bda70e1b6a15bfd929bf1b4e3</a></li>

<li>Clarify that bgwriter no longer handles checkpoints. Text by Peter Geoghegan.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8397bd6d909620457b532e252ce2e437c787d4f">http://git.postgresql.org/pg/commitdiff/c8397bd6d909620457b532e252ce2e437c787d4f</a></li>

<li>Triggered change notifications. Kevin Grittner, reviewed (in earlier versions) by Álvaro Herrera

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e3323d41dc45e93700a3420fd27ca05db6a64a7">http://git.postgresql.org/pg/commitdiff/6e3323d41dc45e93700a3420fd27ca05db6a64a7</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>psql: Fix memory leak. The command \password username leaked memory.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b9f774090d58a950ef0535b51bc377ab62b795c">http://git.postgresql.org/pg/commitdiff/1b9f774090d58a950ef0535b51bc377ab62b795c</a></li>

<li>PL/Python: Update example. Change the usesavedplan() example to use a more modern Python style using the .setdefault() function.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f6b46c9c0ca3d96acbebc5499c32ee6369e1eec">http://git.postgresql.org/pg/commitdiff/6f6b46c9c0ca3d96acbebc5499c32ee6369e1eec</a></li>

<li>psql: Add support for tab completion of GRANT/REVOKE role. Previously, only GRANT/REVOKE privilege was supported. reviewed by Pavel Stehule

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95c63b5e3209cfc8d91d7956407032fc6fe89640">http://git.postgresql.org/pg/commitdiff/95c63b5e3209cfc8d91d7956407032fc6fe89640</a></li>

</ul>

<p>Alvaro Herrera a poussé&nbsp;:</p>

<ul>

<li>Disallow merging ONLY constraints in children tables. When creating a child table, or when attaching an existing table as child of another, we must not allow inheritable constraints to be merged with non-inheritable ones, because then grandchildren would not properly get the constraint. This would violate the grandparent's expectations. Bugs noted by Robert Haas. Author: Nikhil Sontakke

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b11247aadf857bbcbfc765191273973d9ca9dd7">http://git.postgresql.org/pg/commitdiff/3b11247aadf857bbcbfc765191273973d9ca9dd7</a></li>

</ul>

<p>Magnus Hagander a poussé&nbsp;:</p>

<ul>

<li>Fix warning about unused variable

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae137bcaab7dd0b1ee58020d93ce8f07e36d4d49">http://git.postgresql.org/pg/commitdiff/ae137bcaab7dd0b1ee58020d93ce8f07e36d4d49</a></li>

<li>Show psql timing output for failed queries as well as successful ones. This is useful for example when a long-runing statement such as CREATE INDEX fails after a long time.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2106c55ac8dacc52bf6483925529fd3ab99b94c4">http://git.postgresql.org/pg/commitdiff/2106c55ac8dacc52bf6483925529fd3ab99b94c4</a></li>

<li>Separate state from query string in pg_stat_activity. This separates the state (running/idle/idleintransaction etc) into it's own field ("state"), and leaves the query field containing just query text. The query text will now mean "current query" when a query is running and "last query" in other states. Accordingly,the field has been renamed from current_query to query. Since backwards compatibility was broken anyway to make that, the procpid field has also been renamed to pid - along with the same field in pg_stat_replication for consistency. Scott Mead and Magnus Hagander, review work from Greg Smith

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f42b546fd87a80be30c53a0f2c897acb826ad52">http://git.postgresql.org/pg/commitdiff/4f42b546fd87a80be30c53a0f2c897acb826ad52</a></li>

<li>Further doc cleanups from the pg_stat_activity changes. Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a65023e7decf5f5ba9b17bd86db8fe1ea4b6c331">http://git.postgresql.org/pg/commitdiff/a65023e7decf5f5ba9b17bd86db8fe1ea4b6c331</a></li>

<li>Get rid of itemizedlist inside table. This renders badly on the website, and in this particular case also doesn't actually add anything to the readability...

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/356fddfa0ff612a40cc85f8374f9cd058585687f">http://git.postgresql.org/pg/commitdiff/356fddfa0ff612a40cc85f8374f9cd058585687f</a></li>

<li>Check number of fields in IDENTIFY_SYSTEM response. Jaime Casanova

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c14534957bb93df76bc66516aa03476de0069213">http://git.postgresql.org/pg/commitdiff/c14534957bb93df76bc66516aa03476de0069213</a></li>

<li>Typo fix. Guillaume Lelarge

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4993a49b7cf1d23dfe1f9e1a85d9411b8ff57454">http://git.postgresql.org/pg/commitdiff/4993a49b7cf1d23dfe1f9e1a85d9411b8ff57454</a></li>

</ul>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>Fix corner case in cleanup of transactions using SSI. When the only remaining active transactions are READ ONLY, we do a "partial cleanup" of committed transactions because certain types of conflicts aren't possible anymore. For committed r/w transactions, we release the SIREAD locks but keep the SERIALIZABLEXACT. However, for committed r/o transactions, we can go further and release the SERIALIZABLEXACT too. The problem was with the latter case: we were returning the SERIALIZABLEXACT to the free list without removing it from the finished list. The only real change in the patch is the SHMQueueDelete line, but I also reworked some of the surrounding code to make it obvious that r/o and r/w transactions are handled differently -- the existing code felt a bit too clever. Dan Ports

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/326b922e8b2d65257a635b5f80e5de0f15dffd3a">http://git.postgresql.org/pg/commitdiff/326b922e8b2d65257a635b5f80e5de0f15dffd3a</a></li>

<li>Make pg_relation_size() and friends return NULL if the object doesn't exist. That avoids errors when the functions are used in queries like "SELECT pg_relation_size(oid) FROM pg_class", and a table is dropped concurrently. Phil Sorber

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa352d662e57fa150158b9cb0a8f127250f8c97f">http://git.postgresql.org/pg/commitdiff/fa352d662e57fa150158b9cb0a8f127250f8c97f</a></li>

</ul>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Add pg_upgrade C comment about why we check all relkinds for regtypes.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ecf7a2ea387a409f6152c05f60e5765c7436b8df">http://git.postgresql.org/pg/commitdiff/ecf7a2ea387a409f6152c05f60e5765c7436b8df</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Geoghegan and Heikki Linnakangas traded new revisions of the GROUP COMMIT patch.</li>

<li>Greg Smith sent in a patch to publish checkpoint timing and sync files summary data to pg_stat_bgwriter.</li>

<li>Greg Smith sent in a patch to implement an unconditional checkpoint sync pause.</li>

<li>Andrew Dunstan sent in another revision of the patch to make pretty-printing view definitions actually print them prettily.</li>

<li>Fujii Masao sent in another revision of the patch to add a "write" replication mode.</li>

<li>Magnus Hagander sent in a patch to patch add a counter for the number of deadlocks in a database to pg_stat_database.</li>

<li>Tom Lane sent in a WIP patch for parameterized inner paths.</li>

<li>Fujii Masao sent in another revision of the patch to allow taking a base backup from a hot standby. Steve Singer reviewed same.</li>

<li>Alexander Korotkov sent in two more revisions of the patch to collect frequency statistics for arrays, the second per review by Noah Misch.</li>

<li>Kyotaro HORIGUCHI sent in another revision of the patch to speed dblink using a new libpq tuple storage system. Marko Kreen and Marc Mamin reviewed.</li>

<li>Greg Smith sent in a patch to add a pg_test_timing.</li>

<li>Tomas Vondra sent in another revision of the patch to track temp files in pg_stat_database. Magnus Hagander reviewed same.</li>

<li>Heikki Linnakangas sent in another revision of the bgwriter latch patch intended to save energy.</li>

<li>Daniel Farina sent in two revisions of a patch to factor out the various CRC32 implementations in the PostgreSQL source code, per reviews by Tom Lane and Robert Haas.</li>

<li>Martin Pihlak sent in two more revisions of the patch to add logging hooks.</li>

<li>Martin Pihlak sent in another revision of the patch to generate call graphs in real time, per review by Joel Jacobson.</li>

<li>KaiGai Kohei sent in two more revisions of the patch to implement sepgsql's DROP permissions.</li>

<li>Peter Geoghegan sent in another revision of the fast path sorting patch.</li>

<li>Simon Riggs sent in another revision of the patch to implement DROP INDEX CONCURRENTLY, reviewed by Robert Haas.</li>

<li>Peter Eisentraut sent in another revision of the collation for expression patch.</li>

<li>Simon Riggs sent in two more revisions of the walrestore patch, per reviews by Fujii Masao.</li>

<li>Heikki Linnakangas sent in another revision of the patch to move work out of WALInsertLock(), per review by Robert Haas.</li>

<li>Dimitri Fontaine sent in another revision of the inline EXTENSION patch per review by Robert Haas.</li>

<li>Euler Taveira de Oliveira sent in two more patches to implement xlog arithmetic.</li>

<li>Noah Misch sent in another revision of the patch to avoid FK validations for no-rewrite ALTER TABLE ALTER TYPE.</li>

<li>Noah Misch sent in a patch to fix a defective test case.</li>

<li>Simon Riggs sent in another revision of a patch to fix certain kinds of CLOG contention.</li>

<li>KaiGai Kohei sent in two more revisions of the patch to add a LEAKPROOOF attribute to functions per review by Robert Haas.</li>

<li>Peter Eisentraut sent in another revision of the patch to remove unused-variable warnings in assert-free builds.</li>

<li>KaiGai Kohei sent in a patch to fix some infelicities in the changes that plug certain kinds of information leakage in views.</li>

<li>Julien Tachoires sent in another revision of the patch to allow toast tables to be moved to a different tablespace.</li>

<li>Mikko Tiihonen sent in another revision of the patch to create a new, more space-efficient serialization for arrays with fix-length elements.</li>

<li>Tom Lane sent in a patch to fix bug 6123.</li>

</ul>