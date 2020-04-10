---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 janvier 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-03-01-nouvelles-hebdomadaires-de-postgresql-5-janvier-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Extract restriction OR clauses whether or not they are indexable. It's possible to extract a restriction OR clause from a join clause that has the form of an OR-of-ANDs, if each sub-AND includes a clause that mentions only one specific relation. While PG has been aware of that idea for many years, the code previously only did it if it could extract an indexable OR clause. On reflection, though, that seems a silly limitation: adding a restriction clause can be a win by reducing the number of rows that have to be filtered at the join step, even if we have to test the clause as a plain filter clause during the scan. This should be especially useful for foreign tables, where the change can cut the number of rows that have to be retrieved from the foreign server; but testing shows it can win even on local tables. Per a suggestion from Robert Haas. As a heuristic, I made the code accept an extracted restriction clause if its estimated selectivity is less than 0.9, which will probably result in accepting extracted clauses just about always. We might need to tweak that later based on experience. Since the code no longer has even a weak connection to Path creation, remove orindxpath.c and create a new file optimizer/util/orclauses.c. There's some additional janitorial cleanup of now-dead code that needs to happen, but it seems like that's a fit subject for a separate commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f343a880d5555faf1dad0286c5632047c8f599ad">http://git.postgresql.org/pg/commitdiff/f343a880d5555faf1dad0286c5632047c8f599ad</a></li>

<li>Remove dead code now that orindxpath.c is history. We don't need make_restrictinfo_from_bitmapqual() anymore at all. generate_bitmap_or_paths() doesn't need to be exported, and we can drop its rather klugy restriction_only flag. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7fbf4b0be509d964041ee13311b9203a035e4ab">http://git.postgresql.org/pg/commitdiff/f7fbf4b0be509d964041ee13311b9203a035e4ab</a></li>

<li>Fix alphabetization in catalogs.sgml. Some recent patches seem not to have grasped the concept that the catalogs are described in alphabetical order. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d7ee4311afb14118d340024ac9e4dd5d2a9d6966">http://git.postgresql.org/pg/commitdiff/d7ee4311afb14118d340024ac9e4dd5d2a9d6966</a></li>

<li>Fix broken support for event triggers as extension members. CREATE EVENT TRIGGER forgot to mark the event trigger as a member of its extension, and pg_dump didn't pay any attention anyway when deciding whether to dump the event trigger. Per report from Moshe Jacobson. Given the obvious lack of testing here, it's rather astonishing that ALTER EXTENSION ADD/DROP EVENT TRIGGER work, but they seem to. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c01bc51f8d596d425d897c833ef11ca3670ea984">http://git.postgresql.org/pg/commitdiff/c01bc51f8d596d425d897c833ef11ca3670ea984</a></li>

<li>Fix contrib/pg_upgrade to clean all the cruft made during "make check". Although these files get cleaned up if the test runs to completion, a failure partway through leaves trash all over the floor. The Makefile ought to be bright enough to get rid of it when you say "make clean". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cf81b737d5bb5f695671479c427c78f95c82119">http://git.postgresql.org/pg/commitdiff/4cf81b737d5bb5f695671479c427c78f95c82119</a></li>

<li>Fix calculation of maximum statistics-message size. The PGSTAT_NUM_TABENTRIES macro should have been updated when new fields were added to struct PgStat_MsgTabstat in commit 644828908, but it wasn't. Fix that. Also, add a static assertion that we didn't overrun the intended size limit on stats messages. This will not necessarily catch every mistake in computing the maximum array size for stats messages, but it will catch ones that have practical consequences. (The assertion in fact doesn't complain about the aforementioned error in PGSTAT_NUM_TABENTRIES, because that was not big enough to cause the array length to increase.) No back-patch, as there's no actual bug in existing releases; this is just in the nature of future-proofing. Mark Dilger and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7ef273e1cebb913cd4a524fcf3b42caa41bd431">http://git.postgresql.org/pg/commitdiff/a7ef273e1cebb913cd4a524fcf3b42caa41bd431</a></li>

<li>Ooops, should use double not single quotes in StaticAssertStmt(). That's what I get for testing this on an older compiler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a3b4aeecfe9870fd5895cf362cd1e92544ec885a">http://git.postgresql.org/pg/commitdiff/a3b4aeecfe9870fd5895cf362cd1e92544ec885a</a></li>

<li>Fix typo in comment. classifyClauses was renamed to classifyConditions somewhere along the line, but this comment didn't get the memo. Ian Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9929975666904bcad6df5cb8fe73451fd4910621">http://git.postgresql.org/pg/commitdiff/9929975666904bcad6df5cb8fe73451fd4910621</a></li>

<li>Fix header comment for bitncmp(). The result is an int less than, equal to, or greater than zero, in the style of memcmp (and, in fact, exactly the output of memcmp in some cases). This comment previously said -1, 1, or 0, which was an overspecification, as noted by Emre Hasegeli. All of the existing callers appear to be fine with the actual behavior, so just fix the comment. In passing, improve infelicitous formatting of some call sites. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5858cf8ab2c7a186fab050725992d6ef640e38a5">http://git.postgresql.org/pg/commitdiff/5858cf8ab2c7a186fab050725992d6ef640e38a5</a></li>

<li>Fix translatability markings in psql, and add defenses against future bugs. Several previous commits have added columns to various \d queries without updating their translate_columns[] arrays, leading to potentially incorrect translations in NLS-enabled builds. Offenders include commit 893686762 (added prosecdef to \df+), c9ac00e6e (added description to \dc+) and 3b17efdfd (added description to \dC+). Fix those cases back to 9.3 or 9.2 as appropriate. Since this is evidently more easily missed than one would like, in HEAD also add an Assert that the supplied array is long enough. This requires an API change for printQuery(), so it seems inappropriate for back branches, but presumably all future changes will be tested in HEAD anyway. In HEAD and 9.3, also clean up a whole lot of sloppiness in the emitted SQL for \dy (event triggers): lack of translatability due to failing to pass words-to-be-translated through gettext_noop(), inadequate schema qualification, and sloppy formatting resulting in unnecessarily ugly -E output. Peter Eisentraut and Tom Lane, per bug #8702 from Sergey Burladyan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92459e7a7f87f91fc3012bea9eef870cf464d91f">http://git.postgresql.org/pg/commitdiff/92459e7a7f87f91fc3012bea9eef870cf464d91f</a></li>

<li>Cache catalog lookup data across groups in ordered-set aggregates. The initial commit of ordered-set aggregates just did all the setup work afresh each time the aggregate function is started up. But in a GROUP BY query, the catalog lookups need not be repeated for each group, since the column datatypes and sort information won't change. When there are many small groups, this makes for a useful, though not huge, performance improvement. Per suggestion from Andrew Gierth. Profiling of these cases suggests that it might be profitable to avoid duplicate lookups within tuplesort startup as well; but changing the tuplesort APIs would have much broader impact, so I left that for another day. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b49a6044d06b557047210dba2735081bb037e96">http://git.postgresql.org/pg/commitdiff/8b49a6044d06b557047210dba2735081bb037e96</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Do not use an empty hostname. When trying to connect to a given database libecpg should not try using an empty hostname if no hostname was given. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c957ec83eeefa8b6d3179f3af0a5dc338d2252b">http://git.postgresql.org/pg/commitdiff/7c957ec83eeefa8b6d3179f3af0a5dc338d2252b</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rename walLogHints to wal_log_hints for easier grepping. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b351841fa0b90cb72f5f63c56f06e4511850ac4">http://git.postgresql.org/pg/commitdiff/4b351841fa0b90cb72f5f63c56f06e4511850ac4</a></li>

<li>Aggressively freeze tables when CLUSTER or VACUUM FULL rewrites them. We haven't wanted to do this in the past on the grounds that in rare cases the original xmin value will be needed for forensic purposes, but commit 37484ad2aacef5ec794f4dd3d5cf814475180a78 removes that objection, so now we can. Per extensive discussion, among many people, on pgsql-hackers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cff1879f8d03cb729368722ca823a4bf74c0cac">http://git.postgresql.org/pg/commitdiff/3cff1879f8d03cb729368722ca823a4bf74c0cac</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Wrap multixact/members correctly during extension. In the 9.2 code for extending multixact/members, the logic was very simple because the number of entries in a members page was a proper divisor of 2^32, and thus at 2^32 wraparound the logic for page switch was identical than at any other page boundary. In commit 0ac5ad5134f I failed to realize this and introduced code that was not able to go over the 2^32 boundary. Fix that by ensuring that when we reach the last page of the last segment we correctly zero the initial page of the initial segment, using correct uint32-wraparound-safe arithmetic. Noticed while investigating bug #8673 reported by Serge Negodyuck, as diagnosed by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a50d97625497b76e3dc7c4aa22cd2c70317ec54d">http://git.postgresql.org/pg/commitdiff/a50d97625497b76e3dc7c4aa22cd2c70317ec54d</a></li>

<li>Handle 5-char filenames in SlruScanDirectory. Original users of slru.c were all producing 4-digit filenames, so that was all that that code was prepared to handle. Changes to multixact.c in the course of commit 0ac5ad5134f made pg_multixact/members create 5-digit filenames once a certain threshold was reached, which SlruScanDirectory wasn't prepared to deal with; in particular, 5-digit-name files were not removed during truncation. Change that routine to make it aware of those files, and have it process them just like any others. Right now, some pg_multixact/members directories will contain a mixture of 4-char and 5-char filenames. A future commit is expected fix things so that each slru.c user declares the correct maximum width for the files it produces, to avoid such unsightly mixtures. Noticed while investigating bug #8673 reported by Serge Negodyuck. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/638cf09e76d70dd83d8123e7079be6c0532102d2">http://git.postgresql.org/pg/commitdiff/638cf09e76d70dd83d8123e7079be6c0532102d2</a></li>

<li>Handle wraparound during truncation in multixact/members. In pg_multixact/members, relying on modulo-2^32 arithmetic for wraparound handling doesn't work all that well. Because we don't explicitely track wraparound of the allocation counter for members, it is possible that the "live" area exceeds 2^31 entries; trying to remove SLRU segments that are "old" according to the original logic might lead to removal of segments still in use. To fix, have the truncation routine use a tailored SlruScanDirectory callback that keeps track of the live area in actual use; that way, when the live range exceeds 2^31 entries, the oldest segments still live will not get removed untimely. This new SlruScanDir callback needs to take care not to remove segments that are "in the future": if new SLRU segments appear while the truncation is ongoing, make sure we don't remove them. This requires examination of shared memory state to recheck for false positives, but testing suggests that this doesn't cause a problem. The original coding didn't suffer from this pitfall because segments created when truncation is running are never considered to be removable. Per Andres Freund's investigation of bug #8673 reported by Serge Negodyuck. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/722acf51a0d074d19782ad7e97ebe3fdb63fbb87">http://git.postgresql.org/pg/commitdiff/722acf51a0d074d19782ad7e97ebe3fdb63fbb87</a></li>

<li>Restore some comments lost during 15732b34e8c8. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a3e82a7f94e63979032ee84b2f8b0c93d441fbd">http://git.postgresql.org/pg/commitdiff/1a3e82a7f94e63979032ee84b2f8b0c93d441fbd</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Christian Kruse sent in a pair of patches to improve the log messages generated by log_lock_waits.</li>

<li>Andreas Karlsson sent in a patch to improve the previous patch which uses partial sorting to improve the speed of plan execution. This patch reuses the tuplesort state.</li>

<li>Christian Kruse sent in two revisions of a patch to show relation and tuple infos of a lock to acquire.</li>

<li>Dimitri Fontaine and Magnus Hagander traded patches to fix pg_basebackup with tablespaces found in $PGDATA.</li>

<li>Peter Eisentraut sent in a patch to introduce more psprintf()s to replace hard-coded palloc(N) + sprintf() and similar constructs.</li>

<li>David Rowley sent in two more revisions of a patch to implement inverse transition functions for aggregates.</li>

<li>David Rowley sent in a patch to remove some apparently duplicate if conditions.</li>

<li>Wim Lewis sent in a patch to make various variables read-only (const).</li>

<li>Fabien COELHO sent in a patch to fix a bug in the ISN extension checksum.</li>

<li>Andrew Dunstan sent in a WIP patch to implement json_to_record, json_to_recordset, json_object, json_build_array, json_build_object, and json_object_agg.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT...ON DUPLICATE KEY LOCK FOR UPDATE.</li>

<li>Amit Kapila sent in a patch to remove the non-existent -K option from pg_dump.</li>

<li>Gabriele Bartolini sent in two revisions of a patch to implement a pg_stat_archiver view.</li>

<li>Ian Lawrence Barwick sent in a patch to fix a typo in a comment in postgres_fdw/postgres_fdw.c.</li>

<li>Emre Hasegeli sent in another revision of a patch to add GiST indexing support for inet datatypes.</li>

<li>Robert Haas sent in a patch to handle a case where in DSM, something tries to release a lwlock it hadn't acquired, by printing the pointer.</li>

</ul>