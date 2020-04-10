---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 décembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2014-01-01-nouvelles-hebdomadaires-de-postgresql-29-decembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix portability issue in ordered-set patch. Overly compact coding in makeOrderedSetArgs() led to a platform dependency: if the compiler chose to execute the subexpressions in the wrong order, list_length() might get applied to an already-modified List, giving a value we didn't want. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf63c641cae2063a0442d73d49af295301cec61b">http://git.postgresql.org/pg/commitdiff/cf63c641cae2063a0442d73d49af295301cec61b</a></li>

<li>Fix ANALYZE failure on a column that's a domain over a range. Most other range operations seem to work all right on domains, but this one not so much, at least not since commit 918eee0c. Per bug #8684 from Brett Neumeier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4eeda92d86250b702ee6f88fcad2340e5e7d8747">http://git.postgresql.org/pg/commitdiff/4eeda92d86250b702ee6f88fcad2340e5e7d8747</a></li>

<li>Fix inadequately-tested code path in tuplesort_skiptuples(). Per report from Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1def747db68b234b54b784c74dfbe329f5478b79">http://git.postgresql.org/pg/commitdiff/1def747db68b234b54b784c74dfbe329f5478b79</a></li>

<li>Undo autoconf 2.69's attempt to #define _DARWIN_USE_64_BIT_INODE. Defining this symbol causes OS X 10.5 to use a buggy version of readdir(), which can sometimes fail with EINVAL if the previously-fetched directory entry has been deleted or renamed. In later OS X versions that bug has been repaired, but we still don't need the #define because it's on by default. So this is just an all-around bad idea, and we can do without it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed011d9754fd4b76eac0eaa8c057fcfc0c302a6a">http://git.postgresql.org/pg/commitdiff/ed011d9754fd4b76eac0eaa8c057fcfc0c302a6a</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revise documentation for new freezing method. Commit 37484ad2aacef5ec794f4dd3d5cf814475180a78 invalidated a good chunk of documentation, so patch it up to reflect the new state of play. Along the way, patch remaining documentation references to FrozenXID to say instead FrozenTransactionId, so that they match the way we actually spell it in the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d43760b624b7cebc35e5f9c60d2e1439cbe9b220">http://git.postgresql.org/pg/commitdiff/d43760b624b7cebc35e5f9c60d2e1439cbe9b220</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a09e3fd77661e22f5000098e7b0bfcc6751d7c18">http://git.postgresql.org/pg/commitdiff/a09e3fd77661e22f5000098e7b0bfcc6751d7c18</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b986270bd4bec964d239cd73f7aaf5131a6996fa">http://git.postgresql.org/pg/commitdiff/b986270bd4bec964d239cd73f7aaf5131a6996fa</a></li>

<li>Update grammar. From: Etsuro Fujita &lt;fujita.etsuro@lab.ntt.co.jp&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71812a98cb8cfbcf9c3376e0c93fcb4c8e373a54">http://git.postgresql.org/pg/commitdiff/71812a98cb8cfbcf9c3376e0c93fcb4c8e373a54</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Properly detect invalid JSON numbers when generating JSON. Instead of looking for characters that aren't valid in JSON numbers, we simply pass the output string through the JSON number parser, and if it fails the string is quoted. This means among other things that money and domains over money will be quoted correctly and generate valid JSON. Fixes bug #8676 reported by Anderson Cristian da Silva. Backpatched to 9.2 where JSON generation was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/29dcf7ded5ef8533376689a85c5b242fc7ace01d">http://git.postgresql.org/pg/commitdiff/29dcf7ded5ef8533376689a85c5b242fc7ace01d</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix misplaced right paren bugs in pgstatfuncs.c. The bug would only show up if the C sockaddr structure contained zero in the first byte for a valid address; otherwise it would fail to fail, which is probably why it went unnoticed for so long. Patch submitted by Joel Jacobson after seeing an article by Andrey Karpov in which he reports finding this through static code analysis using PVS-Studio. While I was at it I moved a definition of a local variable referenced in the buggy code to a more local context. Backpatch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a133bf7031ad5b62281b21dbd6b2097d3d400f0d">http://git.postgresql.org/pg/commitdiff/a133bf7031ad5b62281b21dbd6b2097d3d400f0d</a></li>

<li>Don't attempt to limit target database for pg_restore. There was an apparent attempt to limit the target database for pg_restore to version 7.1.0 or later. Due to a leading zero this was interpreted as an octal number, which allowed targets with version numbers down to 2.87.36. The lowest actual release above that was 6.0.0, so that was effectively the limit. Since the success of the restore attempt will depend primarily on on what statements were generated by the dump run, we don't want pg_restore trying to guess whether a given target should be allowed based on version number. Allow a connection to any version. Since it is very unlikely that anyone would be using a recent version of pg_restore to restore to a pre-6.0 database, this has little to no practical impact, but it makes the code less confusing to read. Issue reported and initial patch suggestion from Joel Jacobson based on an article by Andrey Karpov reporting on issues found by PVS-Studio static code analyzer. Final patch based on analysis by Tom Lane. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47f50262e7ce5ba37940d8a94198b7a7f4892c0e">http://git.postgresql.org/pg/commitdiff/47f50262e7ce5ba37940d8a94198b7a7f4892c0e</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in another revision of a patch to implement shared memory message queues.</li>

<li>Michael Paquier sent in a patch to align the internal name of wal_log_hints with its external name.</li>

<li>Andres Freund sent in a WIP patch to remove system columns from pg_attribute.</li>

<li>Robert Haas sent in a patch to implement a pg_tuple_header function.</li>

<li>Andreas Karlsson sent in two revisions of a patch to allow including planning time in EXPLAIN [ANALYZE].</li>

<li>Sergey Muraviov sent in another revision of a patch to improve how psql displays wide output.</li>

<li>Michael Paquier sent in a patch to add a pg_prewarm--unpackaged--1.0.sql to the new pg_prewarm contrib module.</li>

<li>Vik Fearing sent in a patch to implement CREATE TABLESPACE ... SET ...</li>

<li>MauMau sent in a patch to fix an issue where an ECPG application crashes due to SIGBUS on SPARC Solaris.</li>

<li>MauMau sent in a patch to fix an issue where "pg_ctl stop" times out when it should respond quickly.</li>

<li>Joel Jacobson sent in a patch to fix an issue where compare returned value by socket() against PGINVALID_SOCKET instead of &lt; 0.</li>

<li>David Rowley sent in two more revisions of a patch to implement inverse transition functions for aggregates.</li>

<li>Marko Kreen sent in a patch to fix an issue where memset was being used in a dangerous way in pg_crypto. The patch replaces memset in places where it might be optimized away with px_memset.</li>

<li>Etsuro Fujita sent in another revision of a patch to show lossy heap block info in EXPLAIN ANALYZE for bitmap heap scan.</li>

<li>David Rowley sent in a patch to fix an issue where the diff options on Windows would wrongly hide whitespace changes deemed important.</li>

<li>David Rowley sent in a patch to prevent a possible overflow in work_mem calculations.</li>

<li>Tom Lane sent in a patch to generalize OR-clause extraction for foreign tables.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to implement partial sorting.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT...ON DUPLICATE KEY LOCK FOR UPDATE.</li>

</ul>