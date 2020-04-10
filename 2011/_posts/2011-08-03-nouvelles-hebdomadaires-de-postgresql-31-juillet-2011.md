---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 juillet 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-08-03-nouvelles-hebdomadaires-de-postgresql-31-juillet-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add new pgbench switch, --unlogged-tables. This entails adjusting pgbench to use getopt_long() rather than getopt(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d6fee09eba8474d9a69c08bf716f3e2d31e5fdf">http://git.postgresql.org/pg/commitdiff/2d6fee09eba8474d9a69c08bf716f3e2d31e5fdf</a></li>

<li>Add new pgbench options, --tablespace and --index-tablespace. Per a request from Greg Smith. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c26395661ce549621db6fa93c0abb9cdbac9837">http://git.postgresql.org/pg/commitdiff/7c26395661ce549621db6fa93c0abb9cdbac9837</a></li>

<li>Improvements to SQL/MED documentation. Laurenz Albe, somewhat modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5af8eed9201e50bc5c761809ff57ef1ace91502">http://git.postgresql.org/pg/commitdiff/f5af8eed9201e50bc5c761809ff57ef1ace91502</a></li>

<li>Add some environment checks prior to sepgsql regression testing. This probably needs more work, but it's a start. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cca49d8a0d969e1c0f08779e8230466e395b813">http://git.postgresql.org/pg/commitdiff/8cca49d8a0d969e1c0f08779e8230466e395b813</a></li>

<li>Clarify which relkinds accept column comments. Per discussion with Josh Kupershmidt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c80be8a816ac4bf8b910aaaec599c683804bcd77">http://git.postgresql.org/pg/commitdiff/c80be8a816ac4bf8b910aaaec599c683804bcd77</a></li>

<li>Only display column comments for relkinds that support them. Josh Kupershmidt, with minor modifications by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c18f3f0e15738633231b31d8937b2710b38975f">http://git.postgresql.org/pg/commitdiff/8c18f3f0e15738633231b31d8937b2710b38975f</a></li>

<li>Fix typo. Noted by Josh Kupershmidt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8302803ab225e87458037b922aceee9864d9f54">http://git.postgresql.org/pg/commitdiff/a8302803ab225e87458037b922aceee9864d9f54</a></li>

<li>Move new pgbench options to correct section of --help output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60fb25a3f56bd78e961cc7263e5ae11e1eceeb5e">http://git.postgresql.org/pg/commitdiff/60fb25a3f56bd78e961cc7263e5ae11e1eceeb5e</a></li>

<li>Reduce sinval synchronization overhead. Testing shows that the overhead of acquiring and releasing SInvalReadLock and msgNumLock on high-core count boxes can waste a lot of CPU time and hurt performance. This patch adds a per-backend flag that allows us to skip all that locking in most cases. Further testing shows that this improves performance even when sinval traffic is very high. Patch by me. Review and testing by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4fbe392f8ff6ff1a66b488eb7197eef9e1770a4">http://git.postgresql.org/pg/commitdiff/b4fbe392f8ff6ff1a66b488eb7197eef9e1770a4</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Silence compiler warning about uninitialized variable. It is set correctly on the only path that uses it, but the compiler can't know that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74e6d37276564d4be1f60d9edb76d7d066395773">http://git.postgresql.org/pg/commitdiff/74e6d37276564d4be1f60d9edb76d7d066395773</a></li>

<li>Don't build replacement getpeereid function on mingw. Windows doesn't have Unix sockets, so it's not needed, and moreover causes compile warnings. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9737310d5f9b87b5edb3674b5d34eea2f198a0b">http://git.postgresql.org/pg/commitdiff/c9737310d5f9b87b5edb3674b5d34eea2f198a0b</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Replace printf format %i by %d. They are identical, but the overwhelming majority of the code uses %d, so standardize on that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce8d7bb6440710058503d213b2aafcdf56a5b481">http://git.postgresql.org/pg/commitdiff/ce8d7bb6440710058503d213b2aafcdf56a5b481</a></li>

<li>Add missing newlines at end of error messages 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e67efb01e886d69d40d1cd87fba4507e8bb1035e">http://git.postgresql.org/pg/commitdiff/e67efb01e886d69d40d1cd87fba4507e8bb1035e</a></li>

<li>Minor message style adjustment 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fe8150827693fca429a01b1cf2914f7f14d3b2d">http://git.postgresql.org/pg/commitdiff/0fe8150827693fca429a01b1cf2914f7f14d3b2d</a></li>

<li>Add host name resolution information to pg_hba.conf error messages. This is to be able to analyze issues with host names in pg_hba.conf. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a0fa9cad9939f53f0b496d95d7e7fd9cfab0e9c">http://git.postgresql.org/pg/commitdiff/8a0fa9cad9939f53f0b496d95d7e7fd9cfab0e9c</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Check to see whether libxml2 handles error context the way we expect. It turns out to be possible to link against a libxml2.so that does this differently than the version we configured and built against, so we need a runtime check to avoid bizarre behavior. Per report from Bernd Helmle. Patch by Florian Pflug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1420fcf7d9e899b3378e25f5e21776f6461b4a4">http://git.postgresql.org/pg/commitdiff/c1420fcf7d9e899b3378e25f5e21776f6461b4a4</a></li>

<li>Fix pg_restore's direct-to-database mode for standard_conforming_strings. pg_backup_db.c contained a mini SQL lexer with which it tried to identify boundaries between SQL commands, but that code was not designed to cope with standard_conforming_strings, and would get the wrong answer if a backslash immediately precedes a closing single quote in such a string, as per report from Julian Mehnle. The bug only affects direct-to-database restores from archive files made with standard_conforming_strings = on. Rather than complicating the code some more to try to fix that, let's just rip it all out. The only reason it was needed was to cope with COPY data embedded into ordinary archive entries, which was a layout that was used only for about the first three weeks of the archive format's existence, and never in any production release of pg_dump. Instead, just rely on the archive file layout to tell us whether we're printing COPY data or not. This bug represents a data corruption hazard in all releases in which standard_conforming_strings can be turned on, ie 8.2 and later, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6545a901aaf84cb05212bb6a7674059908f527c3">http://git.postgresql.org/pg/commitdiff/6545a901aaf84cb05212bb6a7674059908f527c3</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_update to properly test for the data directory's existence on Win32. Backpatch to 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a31dc392d684627d0943fe67491bea91c5e619aa">http://git.postgresql.org/pg/commitdiff/a31dc392d684627d0943fe67491bea91c5e619aa</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Timothy D. F. Lewis sent in another revision of a patch which allows people to set the maximum number of large objects which can be vacuumed.</li>

<li>Alexey Klyukin sent in another revision of the patch intended to validate configuration files.</li>

<li>Jeff Janes sent in a patch to allow running pgbench in single-transaction mode.</li>

<li>Florian Pflug sent in another revision of a patch intended to fix a failure mode in XML.</li>

<li>Heikki Linnakangas sent in another revision of the patch to build GiST indexes faster.</li>

<li>Josh Kupershmidt sent in another revision of the patch to display object comments in psql.</li>

<li>Aron Wieck sent in another revision of the vacuumlo patch.</li>

<li>Pavel Stehule sent in another revision of the patch to enhance error reporting.</li>

<li>Alvaro Herrera sent in another revision of the FOR KEY LOCK patch.</li>

<li>Robert Haas sent in another revision of the patch intended to reduce the number of sinval calls.</li>

<li>Nikhil Sontakke sent in two revisions of a patch to allow CHECK constraints to be only on parent tables in an inheritance (partition) hierarchy.</li>

<li>Alvaro Herrera sent in another revision of the patch to catalog NOT NULL constraints.</li>

<li>Peter Geoghegan sent in another revision of the patch intended to reduce power consumption when idle.</li>

<li>Andrew Dunstan sent in a patch to clean up PL/PythonU.</li>

<li>Shigeru HANADA sent in another revision of the patch to add per-column options to foreign data wrappers.</li>

<li>Robert Haas sent in two revisions of a patch intended to reduce internal contention in pgbench.</li>

</ul>