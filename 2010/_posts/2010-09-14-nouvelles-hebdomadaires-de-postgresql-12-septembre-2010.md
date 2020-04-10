---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 septembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-09-14-nouvelles-hebdomadaires-de-postgresql-12-septembre-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>Modify pg_upgrade to set/restore all environment variables related to collation/encoding to match English when reading controldata. This now matches the English variable setting used by pg_regress.c. Backpatch to 9.0.X.</li>

<li>Doc fixes: 1. Remove excessive table cells. 2. Moving function parameters into function tags rather than having them being considered separate. 3. Add return type column on XML2 contrib module functions list and removing return types from function. 4. Add table header to XML2 contrib parameter table. Thom Brown. Backpatch to 9.0.X.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, re-add documentation for Win32 copy syntax for archive_command. Backpatch to 9.0.X.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, don't try aligning comments for new archive_command Win32 doc example; it doesn't work. Backpatch to 9.0.X.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/syntax.sgml, clarify that surrogate pairs are not encoded in UTF-8 directly.</li>

<li>Add tip about building plpython 2 and 3. Fix link to Python docs.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/installation.sgml, remove obsolete claim that gzip is needed while installing PG's documentation. It isn't, now that we ship the docs as loose files rather than a sub-tarball. Also adjust the wording in a couple of places to make the lists of required software read more consistently.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Cursor names in the backend are not case-sensitve. This change makes sure that ecpg also does not regard cursor names as case-sensitive. Thanks to Zoltan Boszormenyi for the patch.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Introduce latches. A latch is a boolean variable, with the capability to wait until it is set. Latches can be used to reliably wait until a signal arrives, which is hard otherwise because signals don't interrupt select() on some platforms, and even when they do, there's race conditions. On Unix, latches use the so called self-pipe trick under the covers to implement the sleep until the latch is set, without race conditions. On Windows, Windows events are used. Use the new latch abstraction to sleep in walsender, so that as soon as a transaction finishes, walsender is woken up to immediately send the WAL to the standby. This reduces the latency between master and standby, which is good. Preliminary work by Fujii Masao. The latch implementation is by me, with helpful comments from many people.</li>

<li>In pgsql/src/backend/port/unix_latch.c, add missing #includes, needed on some platforms. This should make the unixware buildfarm animals happy again.</li>

</ul>

<p>Joe Conway a commit&eacute;&nbsp;:</p>

<ul>

<li>SERIALIZABLE transactions are actually implemented beneath the covers with transaction snapshots, i.e. a snapshot registered at the beginning of a transaction. Change variable naming and comments to reflect this reality in preparation for a future, truly serializable mode, e.g. Serializable Snapshot Isolation (SSI). For the moment transaction snapshots are still used to implement SERIALIZABLE, but hopefully not for too much longer. Patch by Kevin Grittner and Dan Ports with review and some minor wording changes by me.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/catalogs.sgml, link from pg_shadow docs to pg_authid docs. Per discussion with Josh Kupershmidt.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dean Rasheed sent in two more revisions of the patch to add triggers to views.</li>

<li>Thom Brown sent in a doc patch to fix some layout and markup issues.</li>

<li>Alvaro Herrera sent in a patch to fix a shortcoming in the has_*_privilege() functions where PUBLIC wasn't a recognized role.</li>

<li>KaiGai Kohei sent in another patch to fix leaky views.</li>

<li>Teodor Sigaev sent in another revision of the patch for gincostestimate.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to make all query list snapshot handling work like EXPLAIN ANALYZE's code does.</li>

<li>Pavel Stehule sent in a patch intended to reduce the persistent allocated memory for tsearch and ispell dictionaries.</li>

<li>Sushant Sinha sent in another revision of the patch to add support for multiple words in the same position in text search.</li>

<li>Hans-Juergen Schoenig sent in a patch to add an RB tree library in a place where it can help with searching large numbers of partitions.</li>

<li>Pavel Stehule sent in new versions of the format() and stringfunc patches.</li>

<li>Joe Conway sent in another revision of the patch to differentiate transaction isolation from serializable isolation in code and comments.</li>

<li>Magnus Hagander sent in two revisions of a patch to fix the issue where sometimes Windows processes return 128.</li>

<li>Tom Lane sent in a patch intended to help fix an issue with phantom files for the CVS to git migration.</li>

<li>Fujii Masao sent in another revision of the patch to add synchronous replication.</li>

<li>Fujii Masao sent in two revisions of a patch intended to fix an issue where walsender doesn't process options passed in the startup packet.</li>

</ul>