---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 avril 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-04-20-nouvelles-hebdomadaires-de-postgresql-15-avril-2012 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove link to ODBCng project from the docs. Thom Browne pointed out that the URL was out of date, and Devrim G&Uuml;ND&Uuml;Z pointed out that the project isn't maintained anymore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/140a4fbf1a87891a79a2c61a08416828d39f286a">http://git.postgresql.org/pg/commitdiff/140a4fbf1a87891a79a2c61a08416828d39f286a</a></li>

<li>Fix typos in docs, some words were doubled. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb9bc5d9fb66a6065bd1c3f71a4b5bae5af89c90">http://git.postgresql.org/pg/commitdiff/fb9bc5d9fb66a6065bd1c3f71a4b5bae5af89c90</a></li>

<li>Point the URL to PL/py directly to the page about the procedural language. It used to point to a top-level page that contains client-side tools as well. It was hard to find the procedural language there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/442da68f73e679ae8a799c249e3bf1fc1a3ee28d">http://git.postgresql.org/pg/commitdiff/442da68f73e679ae8a799c249e3bf1fc1a3ee28d</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Save a few cycles while creating "sticky" entries in pg_stat_statements. There's no need to sit there and increment the stats when we know all the increments would be zero anyway. The actual additions might not be very expensive, but skipping acquisition of the spinlock seems like a good thing. Pushing the logic about initialization of the usage count down into entry_alloc() allows us to do that while making the code actually simpler, not more complex. Expansion on a suggestion by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e969f9a78008d6a09abf8646f1338e2dff447cbf">http://git.postgresql.org/pg/commitdiff/e969f9a78008d6a09abf8646f1338e2dff447cbf</a></li>

<li>Don't bother copying empty support arrays in a zero-column MergeJoin. The case could not arise when this code was originally written, but it can now (since we made zero-column MergeJoins work for the benefit of FULL JOIN ON TRUE). I don't think there is any actual bug here, but we might as well treat it consistently with other uses of COPY_POINTER_FIELD(). Per comment from Ashutosh Bapat. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d515365a611a58241019c59a62b0cb79584aa725">http://git.postgresql.org/pg/commitdiff/d515365a611a58241019c59a62b0cb79584aa725</a></li>

<li>Fix an Assert that turns out to be reachable after all. estimate_num_groups() gets unhappy with create table empty(); select * from empty except select * from empty e2; I can't see any actual use-case for such a query (and the table is illegal per SQL spec), but it seems like a good idea that it not cause an assert failure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65fd91333e45114c5d9a07d3d4f6a4786df48768">http://git.postgresql.org/pg/commitdiff/65fd91333e45114c5d9a07d3d4f6a4786df48768</a></li>

<li>Adjust various references to GEQO being non-deterministic. It's still non-deterministic in some sense ... but given fixed settings and identical planning problems, it will now always choose the same plan, so we probably shouldn't tar it with that brush. Per bug #6565 from Guillaume Cottenceau. Back-patch to 9.0 where the behavior was fixed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c94b43ce39f3ee48db04fb8284de0db12526af92">http://git.postgresql.org/pg/commitdiff/c94b43ce39f3ee48db04fb8284de0db12526af92</a></li>

<li>Measure epoch of timestamp-without-time-zone from local not UTC midnight. This patch reverts commit 191ef2b407f065544ceed5700e42400857d9270f and thereby restores the pre-7.3 behavior of EXTRACT(EPOCH FROM timestamp-without-tz). Per discussion, the more recent behavior was misguided on a couple of grounds: it makes it hard to get a non-timezone-aware epoch value for a timestamp, and it makes this one case dependent on the value of the timezone GUC, which is incompatible with having timestamp_part() labeled as immutable. The other behavior is still available (in all releases) by explicitly casting the timestamp to timestamp with time zone before applying EXTRACT. This will need to be called out as an incompatible change in the 9.2 release notes. Although having mutable behavior in a function marked immutable is clearly a bug, we're not going to back-patch such a change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d9819f7e3be3c4186f0398d007d2fef8809da6a">http://git.postgresql.org/pg/commitdiff/0d9819f7e3be3c4186f0398d007d2fef8809da6a</a></li>

<li>Make pg_tablespace_location(0) return the database's default tablespace. This definition is convenient when applying the function to the reltablespace column of pg_class, since that's what zero means there; and it doesn't interfere with any other plausible use of the function. Per gripe from Bruce Momjian. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3769fa5fc64298143cf535c8a06921793598e458">http://git.postgresql.org/pg/commitdiff/3769fa5fc64298143cf535c8a06921793598e458</a></li>

<li>Silently ignore any nonexistent schemas that are listed in search_path. Previously we attempted to throw an error or at least warning for missing schemas, but this was done inconsistently because of implementation restrictions (in many cases, GUC settings are applied outside transactions so that we can't do system catalog lookups). Furthermore, there were exceptions to the rule even in the beginning, and we'd been poking more and more holes in it as time went on, because it turns out that there are lots of use-cases for having some irrelevant items in a common search_path value. It seems better to just adopt a philosophy similar to what's always been done with Unix PATH settings, wherein nonexistent or unreadable directories are silently ignored. This commit also fixes the documentation to point out that schemas for which the user lacks USAGE privilege are silently ignored. That's always been true but was previously not documented. This is mostly in response to Robert Haas' complaint that 9.1 started to throw errors or warnings for missing schemas in cases where prior releases had not. We won't adopt such a significant behavioral change in a back branch, so something different will be needed in 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/880bfc3287dd68cfe90d10d9597d7b0fd2dae3e5">http://git.postgresql.org/pg/commitdiff/880bfc3287dd68cfe90d10d9597d7b0fd2dae3e5</a></li>

<li>Fix cost estimation for indexscan filter conditions. cost_index's method for estimating per-tuple costs of evaluating filter conditions (a/k/a qpquals) was completely wrong in the presence of derived indexable conditions, such as range conditions derived from a LIKE clause. This was largely masked in common cases as a result of all simple operator clauses having about the same costs, but it could show up in a big way when dealing with functional indexes containing expensive functions, as seen for example in bug #6579 from Istvan Endredy. Rejigger the calculation to give sane answers when the indexquals aren't a subset of the baserestrictinfo list. As a side benefit, we now do the calculation properly for cases involving join clauses (ie, parameterized indexscans), which we always overestimated before. There are still cases where this is an oversimplification, such as clauses that can be dropped because they are implied by a partial index's predicate. But we've never accounted for that in cost estimates before, and I'm not convinced it's worth the cycles to try to do so. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/732bfa2448c77bba5d98f485a387da77e1df8395">http://git.postgresql.org/pg/commitdiff/732bfa2448c77bba5d98f485a387da77e1df8395</a></li>

<li>Assorted spelling corrections. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81e3e4fd14f82e93edfda8621727040ab3c70840">http://git.postgresql.org/pg/commitdiff/81e3e4fd14f82e93edfda8621727040ab3c70840</a></li>

<li>Remove the "last ditch" code path in join_search_one_level(). So far as I can tell, it is no longer possible for this heuristic to do anything useful, because the new weaker definition of have_relevant_joinclause means that any relation with a joinclause must be considered joinable to at least one other relation. It would still be possible for the code block to be entered, for example if there are join order restrictions that prevent any join of the current level from being formed; but in that case it's just a waste of cycles to attempt to form cartesian joins, since the restrictions will still apply. Furthermore, IMO the existence of this code path can mask bugs elsewhere; we would have noticed the problem with cartesian joins a lot sooner if this code hadn't compensated for it in the simplest case. Accordingly, let's remove it and see what happens. I'm committing this separately from the prerequisite changes in have_relevant_joinclause, just to make the question easier to revisit if there is some fault in my logic. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e54b10a62db2991235fe800c629baef4531a6d67">http://git.postgresql.org/pg/commitdiff/e54b10a62db2991235fe800c629baef4531a6d67</a></li>

<li>Weaken the planner's tests for relevant joinclauses. We should be willing to cross-join two small relations if that allows us to use an inner indexscan on a large relation (that is, the potential indexqual for the large table requires both smaller relations). This worked in simple cases but fell apart as soon as there was a join clause to a fourth relation, because the existence of any two-relation join clause caused the planner to not consider clauseless joins between other base relations. The added regression test shows an example case adapted from a recent complaint from Benoit Delbosc. Adjust have_relevant_joinclause, have_relevant_eclass_joinclause, and has_relevant_eclass_joinclause to consider that a join clause mentioning three or more relations is sufficient grounds for joining any subset of those relations, even if we have to do so via a cartesian join. Since such clauses are relatively uncommon, this shouldn't affect planning speed on typical queries; in fact it should help a bit, because the latter two functions in particular get significantly simpler. Although this is arguably a bug fix, I'm not going to risk back-patching it, since it might have currently-unforeseen consequences. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3ffd05b02468b1a53de31a322cedf195576a625">http://git.postgresql.org/pg/commitdiff/e3ffd05b02468b1a53de31a322cedf195576a625</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove documentation mention of pglesslog, which was added in 2009 because there was only a beta for 9.0 and it does not compile on 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8213624fc95574c9bdd60cadd10ccd180df95217">http://git.postgresql.org/pg/commitdiff/8213624fc95574c9bdd60cadd10ccd180df95217</a></li>

<li>Update documentation to more clearly label the streaming replication option. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75fcb935bc162b466eadac95e6eec6a0c415d18e">http://git.postgresql.org/pg/commitdiff/75fcb935bc162b466eadac95e6eec6a0c415d18e</a></li>

<li>Re-add documentation recommendation to use gzip/gunzip for archive file storage. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17665f61155babff93ff916f1d080dcc9b5397d3">http://git.postgresql.org/pg/commitdiff/17665f61155babff93ff916f1d080dcc9b5397d3</a></li>

<li>Fix pg_upgrade to properly upgrade a table that is stored in the cluster default tablespace, but part of a database that is in a user-defined tablespace. Caused "file not found" error during upgrade. Per bug report from Ants Aasma. Backpatch to 9.1 and 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38458e45736efeb0d82739305c77c529c9cf0e1e">http://git.postgresql.org/pg/commitdiff/38458e45736efeb0d82739305c77c529c9cf0e1e</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Improve tab completion of WITH. Only match when WITH is the first word, as WITH may appear in many other contexts. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b8c99c386d318b434829ac0c9ba935fb5e53d18">http://git.postgresql.org/pg/commitdiff/6b8c99c386d318b434829ac0c9ba935fb5e53d18</a></li>

<li>NLS: Initialize Project-Id-Version field by xgettext. Since xgettext provides options to do this now, we might as well use them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb821b91c86a85a37572c9062902f94a5efba528">http://git.postgresql.org/pg/commitdiff/eb821b91c86a85a37572c9062902f94a5efba528</a></li>

<li>Consistently quote encoding and locale names in messages 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64e1309c76aca35e32e62e69fc11e96aadfb2615">http://git.postgresql.org/pg/commitdiff/64e1309c76aca35e32e62e69fc11e96aadfb2615</a></li>

<li>Rename bytea_agg to string_agg and add delimiter argument. Per mailing list discussion, we would like to keep the bytea functions parallel to the text functions, so rename bytea_agg to string_agg, which already exists for text. Also, to satisfy the rule that we don't want aggregate functions of the same name with a different number of arguments, add a delimiter argument, just like string_agg for text already has. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0cc526e8b1e821dfced692a68e4c8978c2bdbc1">http://git.postgresql.org/pg/commitdiff/c0cc526e8b1e821dfced692a68e4c8978c2bdbc1</a></li>

<li>Fix typo. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3a3aac8452c0af53d510b4f042ff5ee939a1799">http://git.postgresql.org/pg/commitdiff/f3a3aac8452c0af53d510b4f042ff5ee939a1799</a></li>

<li>Document that VALUES can be used in WITH 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aacc50d1758632550bebc4911857b323d65f0996">http://git.postgresql.org/pg/commitdiff/aacc50d1758632550bebc4911857b323d65f0996</a></li>

<li>Update contrib/README. Remove lots of outdated information that is duplicated by the better-maintained SGML documentation. In particular, remove the outdated listing of contrib modules. Update the installation instructions to mention CREATE EXTENSION, but don't go into too much detail. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48ea558313fae4409d0e76facde041674678cba2">http://git.postgresql.org/pg/commitdiff/48ea558313fae4409d0e76facde041674678cba2</a></li>

<li>PL/Python: Fix crash when colnames() etc. called without result set. The result object methods colnames() etc. would crash when called after a command that did not produce a result set. Now they throw an exception. discovery and initial patch by Jean-Baptiste Quenot 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c03523ed3fc65e219068aff536330ce451f63ca7">http://git.postgresql.org/pg/commitdiff/c03523ed3fc65e219068aff536330ce451f63ca7</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Accept postgres:// URIs in libpq connection functions. postgres:// URIs are an attempt to "stop the bleeding" in this general area that has been said to occur due to external projects adopting their own syntaxes. The syntaxes supported by this patch: postgres://[user[:pwd]@][unix-socket][:port[/dbname]][?param1=value1&amp;...] postgres://[user[:pwd]@][net-location][:port][/dbname][?param1=value1&amp;...] should be enough to cover most interesting cases without having to resort to "param=value" pairs, but those are provided for the cases that need them regardless. libpq documentation has been shuffled around a bit, to avoid stuffing all the format details into the PQconnectdbParams description, which was already a bit overwhelming. The list of keywords has moved to its own subsection, and the details on the URI format live in another subsection. This includes a simple test program, as requested in discussion, to ensure that interesting corner cases continue to work appropriately in the future. Author: Alexander Shulgin Some tweaking by &Aacute;lvaro Herrera, Greg Smith, Daniel Farina, Peter Eisentraut Reviewed by Robert Haas, Alexey Klyukin (offlist), Heikki Linnakangas,Marko Kreen, and others Oh, it also supports postgresql:// but that's probably just an accident. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b035cb9db7aa7c0f28581b23feb10d3c559701f6">http://git.postgresql.org/pg/commitdiff/b035cb9db7aa7c0f28581b23feb10d3c559701f6</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update lazy_scan_heap header comment. The previous comment described how things worked in PostgreSQL 8.2 and prior. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5630eddf1efe7c374fe8e8bdeaba3c70f8cd628b">http://git.postgresql.org/pg/commitdiff/5630eddf1efe7c374fe8e8bdeaba3c70f8cd628b</a></li>

<li>Fix typo in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61167bfaf2af3bc0bbf3ba9c8ff14f10a483f9ff">http://git.postgresql.org/pg/commitdiff/61167bfaf2af3bc0bbf3ba9c8ff14f10a483f9ff</a></li>

<li>Grammar corrections. Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7167fcd21bc05e9114b1ededb835c5bc8610a6b0">http://git.postgresql.org/pg/commitdiff/7167fcd21bc05e9114b1ededb835c5bc8610a6b0</a></li>

<li>Add Peter Geoghegan as additional author of pg_stat_statements. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd93425cd1e9b66ad99cfee819c928b202b63ee6">http://git.postgresql.org/pg/commitdiff/cd93425cd1e9b66ad99cfee819c928b202b63ee6</a></li>

<li>pg_size_pretty(numeric). The output of the new pg_xlog_location_diff function is of type numeric, since it could theoretically overflow an int8 due to signedness; this provides a convenient way to format such values. Fujii Masao, with some beautification by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a2d7ad76f5f275ef2d6a57e1a61d5bf756349e8">http://git.postgresql.org/pg/commitdiff/4a2d7ad76f5f275ef2d6a57e1a61d5bf756349e8</a></li>

<li>Rename synchronous_commit='write' to 'remote_write'. Fujii Masao, per discussion on pgsql-hackers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea6a2d8d47b9368f50fb7f4cca206895e6127a0a">http://git.postgresql.org/pg/commitdiff/ea6a2d8d47b9368f50fb7f4cca206895e6127a0a</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add description of long options for '-c', '-D', '-l' and '-s'. Per discussion of hackers list on 2012/3/10 "missing description initdb manual". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4db16d303b24ba5c9a6ddf8c2d70f6fd2da36d7">http://git.postgresql.org/pg/commitdiff/d4db16d303b24ba5c9a6ddf8c2d70f6fd2da36d7</a></li>

<li>Add missing descriptions about '--timeout' and '--mode' to help message. They are already implemented in the source code. Suggestions about the message formatting from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4efbb7d04f3481da1aaf75630c1203203f400b66">http://git.postgresql.org/pg/commitdiff/4efbb7d04f3481da1aaf75630c1203203f400b66</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Etsuro Fujita's patch to fix a typo in a comment.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Vikash S. sent in a patch intended to allow psql to take multiple -f (file) arguments on the command line.</li>

<li>Robert Haas sent in another revision of the patch implementing pg_prewarm.</li>

<li>Robert Haas sent in another revision of a patch to fix a bug in fastpath locking.</li>

<li>Zoltan Boszormenyi sent in another revision of the patch for ECPG FETCH readahead.</li>

<li>Josh Kupershmidt sent in another revision of the patch to fix psql tab completion in the WITH case of CREATE/ALTER USER/ROLE.</li>

<li>Zoltan Boszormenyi sent in new versions of two patches: timeout framework and lock timeout.</li>

<li>Nikhil Sontakke sent in a patch implementing CHECK ONLY in CREATE/ALTER TABLE.</li>

<li>Heikki Linnakangas sent in a patch to allow compiling PL/pgsql-related items as EXTENSIONs.</li>

<li>Robert Haas sent in several patches to test different scenarios for memory usage during sorting.</li>

<li>Etsuro Fujita sent in a patch to add some validating machinery to FDWs and used same to check NULLness in the file_fdw.</li>

<li>Heikki Linnakangas sent in a patch to ensure that the right domain is used in errcontext() calls.</li>

<li>Tatsuo Ishii sent in a patch ensuring that pg_ctl --help actually documents all options the code makes available.</li>

</ul>