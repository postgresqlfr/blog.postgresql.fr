---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 décembre 2015"
author: "NBougain"
redirect_from: "index.php?post/2016-01-01-nouvelles-hebdomadaires-de-postgresql-27-decembre-2015 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Stephen Frost pushed:</p>

<ul>

<li>Make viewquery a copy in rewriteTargetView() Rather than expect the Query returned by get_view_query() to be read-only and then copy bits and pieces of it out, simply copy the entire structure when we get it. This addresses an issue where AcquireRewriteLocks, which is called by acquireLocksOnSubLinks(), scribbles on the parsetree passed in, which was actually an entry in relcache, leading to segfaults with certain view definitions. This also future-proofs us a bit for anyone adding more code to this path. The acquireLocksOnSubLinks() was added in commit c3e0ddd40. Back-patch to 9.3 as that commit was. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f8cb1e23485bd6d45e8865760436e1a5ce65a6d">http://git.postgresql.org/pg/commitdiff/6f8cb1e23485bd6d45e8865760436e1a5ce65a6d</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix calculation of space needed for parsed words in tab completion. Yesterday in commit d854118c8, I had a serious brain fade leading me to underestimate the number of words that the tab-completion logic could divide a line into. On input such as "(((((", each character will get seen as a separate word, which means we do indeed sometimes need more space for the words than for the original line. Fix that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5a4370aea3580f5f7f59a77e41fde62f2be12d8">http://git.postgresql.org/pg/commitdiff/f5a4370aea3580f5f7f59a77e41fde62f2be12d8</a></li>

<li>Allow omitting one or both boundaries in an array slice specifier. Omitted boundaries represent the upper or lower limit of the corresponding array subscript. This allows simpler specification of many common use-cases. (Revised version of commit 9246af6799819847faa33baf441251003acbb8fe) YUriy Zhuravlev <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6efbded6e4672c597a6f0dc0f09263e7db7369ff">http://git.postgresql.org/pg/commitdiff/6efbded6e4672c597a6f0dc0f09263e7db7369ff</a></li>

<li>In pg_dump, remember connection passwords no matter how we got them. When pg_dump prompts the user for a password, it remembers the password for possible re-use by parallel worker processes. However, libpq might have extracted the password from a connection string originally passed as "dbname". Since we don't record the original form of dbname but break it down to host/port/etc, the password gets lost. Fix that by retrieving the actual password from the PGconn. (It strikes me that this whole approach is rather broken, as it will also lose other information such as options that might have been present in the connection string. But we'll leave that problem for another day.) In passing, get rid of rather silly use of malloc() for small fixed-size arrays. Back-patch to 9.3 where parallel pg_dump was introduced. Report and fix by Zeus Kronion, adjusted a bit by Michael Paquier and me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1aa41e3eae3746e05d0e23286ac740a9a6cee7df">http://git.postgresql.org/pg/commitdiff/1aa41e3eae3746e05d0e23286ac740a9a6cee7df</a></li>

<li>Improve handling of password reuse in src/bin/scripts programs. This reverts most of commit 83dec5a71 in favor of having connectDatabase() store the possibly-reusable password in a static variable, similar to the coding we've had for a long time in pg_dump's version of that function. To avoid possible problems with unwanted password reuse, make callers specify whether it's reasonable to attempt to re-use the password. This is a wash for cases where re-use isn't needed, but it is far simpler for callers that do want that. Functionally there should be no difference. Even though we're past RC1, it seems like a good idea to back-patch this into 9.5, like the prior commit. Otherwise, if there are any third-party users of connectDatabase(), they'll have to deal with an API change in 9.5 and then another one in 9.6. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff402ae11b4d33e0e46c2730f63033d3631b8010">http://git.postgresql.org/pg/commitdiff/ff402ae11b4d33e0e46c2730f63033d3631b8010</a></li>

<li>Avoid VACUUM FULL altogether in initdb. Commit ed7b3b3811c5836a purported to remove initdb's use of VACUUM FULL, as had been agreed to in a pghackers discussion back in Dec 2014. But it missed this one ... <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01e386a325549b7755739f31308de4be8eea110d">http://git.postgresql.org/pg/commitdiff/01e386a325549b7755739f31308de4be8eea110d</a></li>

<li>Fix factual and grammatical errors in comments for struct _tableInfo. Amit Langote, further adjusted by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96cd61a16958d3a64da697c3ef31eee5e10141a0">http://git.postgresql.org/pg/commitdiff/96cd61a16958d3a64da697c3ef31eee5e10141a0</a></li>

<li>Docs typo fix. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bee172fcd586bccd3a3ba067592d639b7600aa04">http://git.postgresql.org/pg/commitdiff/bee172fcd586bccd3a3ba067592d639b7600aa04</a></li>

<li>Docs: fix erroneously-given function name. pg_replication_session_is_setup() exists nowhere; apparently this is meant to refer to pg_replication_origin_session_is_setup(). Adrien Nayrat <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71dd092c0177af14a00bbb18a8aebbed0d389f05">http://git.postgresql.org/pg/commitdiff/71dd092c0177af14a00bbb18a8aebbed0d389f05</a></li>

<li>Remove unnecessary row ordering dependency in pg_rewind test suite. t/002_databases.pl was expecting to see a specific physical order of the rows in pg_database. I broke that in HEAD with commit 01e386a325549b77, but I'd say it's a pretty fragile test methodology in any case, so fix it in 9.5 as well. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9246fbf665327870370d1088bfc9efdfd2719ec">http://git.postgresql.org/pg/commitdiff/a9246fbf665327870370d1088bfc9efdfd2719ec</a></li>

<li>Fix brin_summarize_new_values() to check index type and ownership. brin_summarize_new_values() did not check that the passed OID was for an index at all, much less that it was a BRIN index, and would fail in obscure ways if it wasn't (possibly damaging data first?). It also lacked any permissions test; by analogy to VACUUM, we should only allow the table's owner to summarize. Noted by Jeff Janes, fix by Michael Paquier and me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d2b31e30e2931b3edb5ab9d0eafca13e7bcffe5">http://git.postgresql.org/pg/commitdiff/3d2b31e30e2931b3edb5ab9d0eafca13e7bcffe5</a></li>

<li>Include typmod when complaining about inherited column type mismatches. MergeAttributes() rejects cases where columns to be merged have the same type but different typmod, which is correct; but the error message it printed didn't show either typmod, which is unhelpful. Changing this requires using format_type_with_typemod() in place of TypeNameToString(), which will have some minor side effects on the way some type names are printed, but on balance this is an improvement: the old code sometimes printed one type according to one set of rules and the other type according to the other set, which could be confusing in its own way. Oddly, there were no regression test cases covering any of this behavior, so add some. Complaint and fix by Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fec1ad94dfc5ddacfda8d249bf4b3c739da8f7a1">http://git.postgresql.org/pg/commitdiff/fec1ad94dfc5ddacfda8d249bf4b3c739da8f7a1</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>postgres_fdw: Consider requesting sorted data so we can do a merge join. When use_remote_estimate is enabled, consider adding ORDER BY to the query we sending to the remote server so that we can use that ordered data for a merge join. Commit f18c944b6137329ac4a6b2dce5745c5dc21a8578 arranges to push down the query pathkeys, which seems like the case mostly likely to be a win, but testing shows this can sometimes win, too. For a regular table, we know which indexes are present and therefore test whether the ordering provided by each such index is useful. Here, we take the opposite approach: guess what orderings would be useful if they could be generated cheaply, and then ask the remote side what those will cost. Ashutosh Bapat, with very substantial cosmetic revisions by me. Also reviewed by Rushabh Lathia. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccd8f97922944566d26c7d90eb67ab7848ee9905">http://git.postgresql.org/pg/commitdiff/ccd8f97922944566d26c7d90eb67ab7848ee9905</a></li>

<li>Comment improvements for abbreviated keys. Peter Geoghegan and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ba3f3bc65f1176250b942e14fd9e4975a5d3913">http://git.postgresql.org/pg/commitdiff/0ba3f3bc65f1176250b942e14fd9e4975a5d3913</a></li>

<li>Change Gather not to use a physical tlist. This should have been part of the original commit, but was missed. Pushing data between processes is expensive, so we definitely want to project away unneeded columns here, just as we do for other nodes like Sort and Hash that care about the volume of data. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51d152f18e124cc07c293756cc16014ba218b2df">http://git.postgresql.org/pg/commitdiff/51d152f18e124cc07c293756cc16014ba218b2df</a></li>

<li>Read from the same worker repeatedly until it returns no tuple. The original coding read tuples from workers in round-robin fashion, but performance testing shows that it works much better to read enough to empty one queue before moving on to the next. I believe the reason for this is that, with the old approach, we could easily wake up a worker repeatedly to write only one new tuple into the shm_mq each time. With this approach, by the time the process gets scheduled, it has a decent chance of being able to fill the entire buffer in one go. Patch by me. Dilip Kumar helped with performance testing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc7fcab5e36b9597857fa7e3fa6d9ba54aaea167">http://git.postgresql.org/pg/commitdiff/bc7fcab5e36b9597857fa7e3fa6d9ba54aaea167</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Remove unnecessary escaping in C character literals '\"' is more commonly written simply as '"'. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30c0c4bf12cc56a7a6c2b7f874e2cd4c95cd3491">http://git.postgresql.org/pg/commitdiff/30c0c4bf12cc56a7a6c2b7f874e2cd4c95cd3491</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Improve the gin index scan performance in pg_trgm. Previous coding assumes too pessimistic upper bound of similarity in consistent method of GIN. Author: Fornaroli Christophe with comments by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25bfa7efd037a3c44d6a2989d18f55758090e8a9">http://git.postgresql.org/pg/commitdiff/25bfa7efd037a3c44d6a2989d18f55758090e8a9</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Improve SECURITY LABEL tab completion Add DATABASE, EVENT TRIGGER, FOREIGN TABLE, ROLE, and TABLESPACE to tab completion for SECURITY LABEL. Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8014c44e8275b2fedfc4740c911577c6f1668b56">http://git.postgresql.org/pg/commitdiff/8014c44e8275b2fedfc4740c911577c6f1668b56</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Add forgotten CHECK_FOR_INTERRUPT calls in pgcrypto's crypt(). Both Blowfish and DES implementations of crypt() can take arbitrarily long time, depending on the number of rounds specified by the caller; make sure they can be interrupted. Author: Andreas Karlsson. Reviewer: Jeff Janes. Backpatch to 9.1. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/743229a67e24aaee3f671bc5692100fe94c47436">http://git.postgresql.org/pg/commitdiff/743229a67e24aaee3f671bc5692100fe94c47436</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Michael Paquier sent in another revision of a patch to fix bug #13685.</p>

<p>Michael Paquier sent in another revision of a patch to add in-core regression tests for replication, cascading, archiving, PITR, etc.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement parallel aggregation.</p>

<p>Amit Kapila sent in another revision of a patch to speed up clog access by increasing CLOG buffers.</p>

<p>Simon Riggs sent in a patch to avoid the "pin scan" on standbys.</p>

<p>Victor Wagner sent in another revision of a patch to implement failover on libpq connect level.</p>

<p>Artur Zakirov and Pavel St&Auml;&rsaquo;hule traded patches to fix %TYPE and add %ARRAYTYPE and %ELEMENTTYPE to PL/pgsql.</p>

<p>Stephen Frost sent in two more revisions of a patch to add a note regarding permissions in pg_catalog, reserve the "pg_" namespace for roles, and create default roles.</p>

<p>Etsuro Fujita sent in two more revisions of a patch to optimize writes to the PostgreSQL FDW.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to fix some issues in psql's tab completion for CREATE/DROP INDEX.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add a pg_size_bytes() function.</p>

<p>Noah Misch sent in another revision of a patch to speed up writing out stats.</p>

<p>Aleksander Alekseev sent in another revision of a patch to fix lock contention for HASHHDR.mutex.</p>

<p>YUriy Zhuravlev sent in another revision of a patch to extend the array slice syntax.</p>

<p>Tomas Vondra sent in another revision of a patch to add multivariate statistics.</p>

<p>Robert Haas sent in another revision of a patch to add parallel joins.</p>

<p>Haribabu Kommi sent in another revision of a patch to add a pg_hba_lookup function to get all matching pg_hba.conf entries.</p>

<p>Peter Geoghegan sent in a patch to test a maximum order for external sort runs.</p>

<p>Michael Paquier sent in a patch to fix a typo in the pg_rewind docs.</p>

<p>David Rowley sent in another revision of a patch to make it possible to combine aggregates. This is infrastructure for, among other things, making these easier to parallelize and shard.</p>

<p>Ildus Kurbangaliev sent in three more revisions of a patch to add GiST support for UUIDs.</p>

<p>Daniel Verit&Atilde;&copy; sent in another revision of a patch to add a \crosstabview command to psql.</p>

<p>Aleksander Alekseev sent in two more revisions of a patch to improve performance of tables with many partitions.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to refactor lwlock tranches.</p>

<p>Alexander Korotkov sent in another revision of a patch to rework the access method interface.</p>

<p>SAWADA Masahiko sent in a patch to allow sending multiple options to ALTER ROLE...(RE)SET</p>

<p>Jeff Janes sent in another revision of a patch to eliminate spurious standby query cancellations.</p>

<p>Emre Hasegeli sent in another revision of a patch to add a BRIN correlation cost estimate.</p>

<p>SAWADA Masahiko sent in another revision of a patch to support N (N &gt; 1) synchronous standby servers.</p>

<p>Vinayak Pokale sent in another revision of a patch to implement a VACUUM progress checker.</p>

<p>Teodor Sigaev sent in a patch to support OR clauses in index scans.</p>

<p>Joe Conway sent in another revision of a patch to expose pg_controldata and pg_config as functions.</p>

<p>Jeff Janes sent in a patch to avoid endless futile table locks in vacuuming.</p>

<p>Artur Zakirov sent in another revision of a patch to add fuzzy substring searching to the pg_trgm extension.</p>

<p>Peter Geoghegan sent in a patch to make some fixes and changes to the INSERT documentation.</p>