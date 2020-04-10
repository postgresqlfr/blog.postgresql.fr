---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 août 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-08-28-nouvelles-hebdomadaires-de-postgresql-10-aout-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Windows doesn't have M_PI; define it ourselves when needed. This should fix the Windows build, broken by commit ed802e7d. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd74a151b5a2498f0909074ebc9e8d8fbe6915b1">http://git.postgresql.org/pg/commitdiff/cd74a151b5a2498f0909074ebc9e8d8fbe6915b1</a></li>

<li>Improve comment. Based on the old comment, it took me a while to figure out what the problem was. The importnat detail is that SSL_read() can return WANT_READ even though some raw data was received from the socket. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec903d20e3b4c1a543dbf057055e4ddbfad4d59e">http://git.postgresql.org/pg/commitdiff/ec903d20e3b4c1a543dbf057055e4ddbfad4d59e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: remove reference to autovacuum_multixact_freeze_max_age. autovacuum_multixact_freeze_max_age was added as a pg_ctl start parameter in 9.3.X to prevent autovacuum from running. However, only some 9.3.X releases have autovacuum_multixact_freeze_max_age as it was added in a minor PG 9.3 release. It also isn't needed because -b turns off autovacuum in 9.1+. Without this fix, trying to upgrade from an early 9.3 release to 9.4 would fail. Report by EDB Backpatch through 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4bd6f6b054f62a4ed70065b7b3fa95c012ae89a">http://git.postgresql.org/pg/commitdiff/b4bd6f6b054f62a4ed70065b7b3fa95c012ae89a</a></li>

<li>pg_upgrade: assume user is install user. The user specified to the upgrade was effectively the install user, but that was not clearly stated in the comments, documentation, or error messages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee646df59ae76d14f76e6fd305c1f9f2eeafd682">http://git.postgresql.org/pg/commitdiff/ee646df59ae76d14f76e6fd305c1f9f2eeafd682</a></li>

<li>pg_upgrade: prevent oid conflicts with new-cluster TOAST tables. Previously, TOAST tables only required in the new cluster could cause oid conflicts if they were auto-numbered and a later conflicting oid had to be assigned. Backpatch through 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c6780fd17aa43ed6362aa682499cc2f9712cc8b">http://git.postgresql.org/pg/commitdiff/4c6780fd17aa43ed6362aa682499cc2f9712cc8b</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve some JSON error messages. These messages are new in 9.4, which hasn't been released yet, so back-patch to REL9_4_STABLE. Daniele Varrazzo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ef99bdce3a6cd3195d7df12093042c16328c71c">http://git.postgresql.org/pg/commitdiff/0ef99bdce3a6cd3195d7df12093042c16328c71c</a></li>

<li>Fix alternate regression test output file. Commit 0ef99bdce3a6cd3195d7df12093042c16328c71c broke this. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/873de34b710196d1e3ce593bd85fa24768e58d6b">http://git.postgresql.org/pg/commitdiff/873de34b710196d1e3ce593bd85fa24768e58d6b</a></li>

<li>Don't require sort support functions to provide a comparator. This could be useful for datatypes like text, where we might want to optimize for some collations but not others. However, this patch doesn't introduce any new sortsupport functions that work this way; it merely revises the code so that future patches may do so. Patch by me. Review by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d41739e5a04b0e93304d24d864b6bfa3efc45f2">http://git.postgresql.org/pg/commitdiff/1d41739e5a04b0e93304d24d864b6bfa3efc45f2</a></li>

<li>Add PG_RETURN_UINT16 macro. Manuel Kniep 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73cfa37afe3243c0ccdc6ae72cfcc53a37761521">http://git.postgresql.org/pg/commitdiff/73cfa37afe3243c0ccdc6ae72cfcc53a37761521</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in C comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49d1e03d64f36a345c92901c4d13bf683f99eeec">http://git.postgresql.org/pg/commitdiff/49d1e03d64f36a345c92901c4d13bf683f99eeec</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change ParseConfigFp() so that it doesn't process unused entry of each parameter. When more than one setting entries of same parameter exist in the configuration file, PostgreSQL uses only entry appearing last in configuration file scan. Since the other entries are not used, ParseConfigFp() doesn't need to process them, but previously it did that. This problematic behavior caused the configuration file scan to detect invalid settings of unused entries (e.g., existence of multiple entries of PGC_POSTMASTER parameter) and log the messages complaining about them. This commit changes the configuration file scan so that it processes only last entry of each parameter. Note that when multiple entries of same parameter exist both in postgresql.conf and postgresql.auto.conf, unused entries in postgresql.conf are still processed only at postmaster startup. The problem has existed since old version, but a user is more likely to encounter it since 9.4 where ALTER SYSTEM command was introduced. So back-patch to 9.4. Amit Kapila, slightly modified by me. Per report from Christoph Berg. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3da0d4d1a47e2049ae16aa30bb7bf3105dc8c45">http://git.postgresql.org/pg/commitdiff/e3da0d4d1a47e2049ae16aa30bb7bf3105dc8c45</a></li>

<li>Refactor pg_receivexlog main loop code, for readability, take 2. Previously the source codes for processing the received data and handling the end of stream were included in pg_receivexlog main loop. This commit splits out them as separate functions. This is useful for improving the readability of main loop code and making the future pg_receivexlog-related patch simpler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6805e02c66eac3857ef1a3d6cfd1ffeea64d9447">http://git.postgresql.org/pg/commitdiff/6805e02c66eac3857ef1a3d6cfd1ffeea64d9447</a></li>

<li>Add -F option to pg_receivexlog, for specifying fsync interval. This allows us to specify the maximum time to issue fsync to ensure the received WAL file is safely flushed to disk. Without this, pg_receivexlog always flushes WAL file only when it's closed and which can cause WAL data to be lost at the event of a crash. Furuya Osamu, heavily modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3dad73e71f08abd86564d5090a58ca71740e07e0">http://git.postgresql.org/pg/commitdiff/3dad73e71f08abd86564d5090a58ca71740e07e0</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in docs. s/XIDs XIDs/XIDs/ in one place in maintenance.sgml. Guillaume Lelarge 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1add956ac70384a99ed6606e2963a5a53f567add">http://git.postgresql.org/pg/commitdiff/1add956ac70384a99ed6606e2963a5a53f567add</a></li>

<li>Reject duplicate column names in foreign key referenced-columns lists. Such cases are disallowed by the SQL spec, and even if we wanted to allow them, the semantics seem ambiguous: how should the FK columns be matched up with the columns of a unique index? (The matching could be significant in the presence of opclasses with different notions of equality, so this issue isn't just academic.) However, our code did not previously reject such cases, but instead would either fail to match to any unique index, or generate a bizarre opclass-lookup error because of sloppy thinking in the index-matching code. David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9da86753735ab89b0ee685aea985b25c4218ca0b">http://git.postgresql.org/pg/commitdiff/9da86753735ab89b0ee685aea985b25c4218ca0b</a></li>

<li>Further cleanup of JSON-specific error messages. Fix an obvious typo in json_build_object()'s complaint about invalid number of arguments, and make the errhint a bit more sensible too. Per discussion about how to word the improved hint, change the few places in the documentation that refer to JSON object field names as "names" to say "keys" instead, since that's what we've said in the vast majority of places in the docs. Arguably "name" is more correct, since that's the terminology used in RFC 7159; but we're stuck with "key" in view of the naming of json_object_keys() so let's at least be self-consistent. I adjusted a few code comments to match this as well, and failed to resist the temptation to clean up some odd whitespace choices in the same area, as well as a useless duplicate PG_ARGISNULL() check. There's still quite a bit of code that uses the phrase "field name" in non-user- visible ways, so I left those usages alone. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/495cadda5ed55f63db9a91d174b6fad0e1816204">http://git.postgresql.org/pg/commitdiff/495cadda5ed55f63db9a91d174b6fad0e1816204</a></li>

<li>Clean up handling of unknown-type inputs in json_build_object and friends. There's actually no need for any special case for unknown-type literals, since we only need to push the value through its output function and unknownout() works fine. The code that was here was completely bizarre anyway, and would fail outright in cases that should work, not to mention suffering from some copy-and-paste bugs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92f57c9ae95668636bc77d3cda3edbdfd83320d9">http://git.postgresql.org/pg/commitdiff/92f57c9ae95668636bc77d3cda3edbdfd83320d9</a></li>

<li>Clarify type resolution behavior for domain types. The user documentation was vague and not entirely accurate about how we treat domain inputs for ambiguous operators/functions. Clarify that, and add an example and some commentary. Per a recent question from Adam Mackler. It's acted like this ever since we added domains, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6aa61580e08d58909b2a8845a4087b7699335ee0">http://git.postgresql.org/pg/commitdiff/6aa61580e08d58909b2a8845a4087b7699335ee0</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Small message fixes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f25e0bf5e0af01a687395a76e676dadeb4a60d0a">http://git.postgresql.org/pg/commitdiff/f25e0bf5e0af01a687395a76e676dadeb4a60d0a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Etsuro Fujita sent in another revision of a patch to optimize writes to foreign tables using the PostgreSQL FDW.</li>

<li>Alexander Korotkov sent in another revision of a patch to add KNN-GiST with recheck.</li>

<li>Heikki Linnakangas sent in a patch to create an SSL regression test suite.</li>

<li>Fabien COELHO sent in two more revisions of a patch to add modulo to pgbench.</li>

<li>Jeff Davis sent in two more revisions of a patch to implement better memory accounting, infrastructure for a memory-bounded HashAgg.</li>

<li>Fujii Masao sent in a patch to add PGC_SU_BACKEND.</li>

<li>Jeff Janes sent in a patch to fix one of the regression tests changed by another patch which fixed redundant i18n strings in json.</li>

<li>Fujii Masao sent in two more revisions of a patch to add a synchrounous mode to pg_receivexlog.</li>

<li>Robert Haas and Peter Geoghegan traded patches to add an optional comparator for B-Tree sort support.</li>

<li>David Rowley sent in two more revisions of a patch to allow certain SEMI and ANTI join removals.</li>

<li>Alvaro Herrera and Heikki Linnakangas traded patches to implement minmax indexes.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to add plpgsql.extra_warnings='num_into_expressions'.</li>

<li>Marko (johto) Tiikkaja sent in two revisions of a patch to enable PGP signatures in the pgcrypto extenstion.</li>

<li>Tatsuo Ishii and Fabien COELHO started patching pgbench to ensure that its parameters are checked better.</li>

<li>Etsuro Fujita sent in two revisions of a patch to compute attr_needed for child rels. As there were already two different places this functionality was used, this patch factored out the functionality in order to add a third use case, namely allowing foreign tables to be in table inheritance hierarchies.</li>

<li>Heikki Linnakangas sent in another revision of a patch to Invent a new internal API for interfacing with SSLv3.</li>

<li>Fujii Masao sent in a patch to enable specifying the unit in storage parameters.</li>

<li>Pavel Stehule and Fujii Masao traded patches to allow tab completion for \pset variables in psql.</li>

<li>Marko (johto) Tiikkaja sent in a patch to add PGP armor headers in the pgcrypto extension.</li>

<li>MauMau sent in another revision of a patch to fix an unconditional truncation that should have been a conditional truncation for temporary relations.</li>

<li>Fujii Masao sent in a patch to add a new GIN index storage parameter "PENDING_LIST_CLEANUP_SIZE" which specifies the maximum size of GIN pending list.</li>

<li>Michael Paquier sent in a patch to add support for N synchronous standby servers for N &gt; 1.</li>

<li>Jeff Davis sent in a patch to enable memory-bounded HashAgg.</li>

</ul>