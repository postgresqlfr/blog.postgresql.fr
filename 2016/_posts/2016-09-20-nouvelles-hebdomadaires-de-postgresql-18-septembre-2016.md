---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 septembre 2016"
author: "NBougain"
redirect_from: "index.php?post/2016-09-20-nouvelles-hebdomadaires-de-postgresql-18-septembre-2016 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Kevin Grittner pushed:</p>

<ul>

<li>psql tab completion for CREATE DATABASE ... TEMPLATE ... Sehrope Sarkuni, reviewed by Merlin Moncure &amp; Vitaly Burovoy with some editing by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52803098ab26051c0c9802f3c19edffc90de8843">http://git.postgresql.org/pg/commitdiff/52803098ab26051c0c9802f3c19edffc90de8843</a></li>

<li>Fix recent commit for tab-completion of database template. The details of commit 52803098ab26051c0c9802f3c19edffc90de8843 were based on a misunderstanding of the role inheritance allowing use of a database for a template. While the CREATEDB privilege is not inherited, the database ownership is privileges are. Pointed out by Vitaly Burovoy and Tom Lane. Fix provided by Tom Lane, reviewed by Vitaly Burovoy. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63c1a871940c7c4798788e98fdb1a24408a49d05">http://git.postgresql.org/pg/commitdiff/63c1a871940c7c4798788e98fdb1a24408a49d05</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Raise max setting of checkpoint_timeout to 1d. Previously checkpoint_timeout was capped at 3600s New max setting is 86400s = 24h = 1d Discussion: 32558.1454471895@sss.pgh.pa.us <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3c0d7bd701dae4737c974a59ffa9b366110f9c1">http://git.postgresql.org/pg/commitdiff/c3c0d7bd701dae4737c974a59ffa9b366110f9c1</a></li>

<li>Identify walsenders in pg_stat_activity. Following 8299471c37fff0b walsender procs are now visible in pg_stat_activity. Set query to &acirc;&euro;&tilde;walsender&acirc;&euro;&trade; for walsender procs to allow them to be identified. Discussion:CAB7nPqS8c76KPSufK_HSDeYrbtg+zZ7D0EEkjeM6txSEuCB_jA@mail.gmail.com Michael Paquier, issue raised by Fujii Masao, reviewed by Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc3d4a44e9375f79709f470cb3c83d4ca28fb370">http://git.postgresql.org/pg/commitdiff/fc3d4a44e9375f79709f470cb3c83d4ca28fb370</a></li>

<li>Fix copy/pasto in file identification Daniel Gustafsson <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4068eb9918cbbeaba8042fa6fe0c1f5382f2f05f">http://git.postgresql.org/pg/commitdiff/4068eb9918cbbeaba8042fa6fe0c1f5382f2f05f</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>pg_basebackup: Clean created directories on failure. Like initdb, clean up created data and xlog directories, unless the new -n/--noclean option is specified. Tablespace directories are not cleaned up, but a message is written about that. Reviewed-by: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9083353b15c3cf8e7bbac104a81ad42281178cdf">http://git.postgresql.org/pg/commitdiff/9083353b15c3cf8e7bbac104a81ad42281178cdf</a></li>

<li>Add overflow checks to money type input function. The money type input function did not have any overflow checks at all. There were some regression tests that purported to check for overflow, but they actually checked for the overflow behavior of the int8 type before casting to money. Remove those unnecessary checks and add some that actually check the money input function. Reviewed-by: Fabien COELHO &lt;coelho@cri.ensmp.fr&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/656df624c0d7b50e1714f2a3a14e143e63799a80">http://git.postgresql.org/pg/commitdiff/656df624c0d7b50e1714f2a3a14e143e63799a80</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Docs: assorted minor cleanups. Standardize on "user_name" for a field name in related examples in ddl.sgml; before we had variously "user_name", "username", and "user". The last is flat wrong because it conflicts with a reserved word. Be consistent about entry capitalization in a table in func.sgml. Fix a typo in pgtrgm.sgml. Back-patch to 9.6 and 9.5 as relevant. Alexander Law <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42fd984c0b7b53d1bc961c9ed6bb84fe28eae52b">http://git.postgresql.org/pg/commitdiff/42fd984c0b7b53d1bc961c9ed6bb84fe28eae52b</a></li>

<li>Fix executor/README to reflect disallowing SRFs in UPDATE. The parenthetical comment here is obsoleted by commit a4c35ea1c. Noted by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdc79e1909dc3866a385ffb74bdd6ce6a082a300">http://git.postgresql.org/pg/commitdiff/fdc79e1909dc3866a385ffb74bdd6ce6a082a300</a></li>

<li>Improve parser's and planner's handling of set-returning functions. Teach the parser to reject misplaced set-returning functions during parse analysis using p_expr_kind, in much the same way as we do for aggregates and window functions (cf commit eaccfded9). While this isn't complete (it misses nesting-based restrictions), it's much better than the previous error reporting for such cases, and it allows elimination of assorted ad-hoc expression_returns_set() error checks. We could add nesting checks later if it seems important to catch all cases at parse time. There is one case the parser will now throw error for although previous versions allowed it, which is SRFs in the tlist of an UPDATE. That never behaved sensibly (since it's ill-defined which generated row should be used to perform the update) and it's hard to see why it should not be treated as an error. It's a release-note-worthy change though. Also, add a new Query field hasTargetSRFs reporting whether there are any SRFs in the targetlist (including GROUP BY/ORDER BY expressions). The parser can now set that basically for free during parse analysis, and we can use it in a number of places to avoid expression_returns_set searches. (There will be more such checks soon.) In some places, this allows decontorting the logic since it's no longer expensive to check for SRFs in the tlist --- so I made the checks parallel to the handling of hasAggs/hasWindowFuncs wherever it seemed appropriate. catversion bump because adding a Query field changes stored rules. Andres Freund and Tom Lane Discussion: &lt;24639.1473782855@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4c35ea1c2f05dd5b56739fcd0dc36a4870ea0c0">http://git.postgresql.org/pg/commitdiff/a4c35ea1c2f05dd5b56739fcd0dc36a4870ea0c0</a></li>

<li>Be pickier about converting between Name and Datum. We were misapplying NameGetDatum() to plain C strings in some places. This worked, because it was just a pointer cast anyway, but it's a type cheat in some sense. Use CStringGetDatum instead, and modify the NameGetDatum macro so it won't compile if applied to something that's not a pointer to NameData. This should result in no changes to generated code, but it is logically cleaner. Mark Dilger, tweaked a bit by me Discussion: &lt;EFD8AC94-4C1F-40C1-A5EA-304080089C1B@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55c3391d1e6a201b5b891781d21fe682a8c64fe6">http://git.postgresql.org/pg/commitdiff/55c3391d1e6a201b5b891781d21fe682a8c64fe6</a></li>

<li>Tweak targetlist-SRF tests. Add a test case showing that we don't support SRFs in window-function arguments. Remove a duplicate test case for SRFs in aggregate arguments. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a163c006ca3e6026546ee0f6c487a0dcfc66f82b">http://git.postgresql.org/pg/commitdiff/a163c006ca3e6026546ee0f6c487a0dcfc66f82b</a></li>

<li>Tweak targetlist-SRF tests some more. Seems like it would be good to have a test case documenting the existing behavior for non-top-level SRFs. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0dac5b5174bde3d6fb4b444a2aa4ca1f0091e258">http://git.postgresql.org/pg/commitdiff/0dac5b5174bde3d6fb4b444a2aa4ca1f0091e258</a></li>

<li>Make min_parallel_relation_size's default value platform-independent. The documentation states that the default value is 8MB, but this was only true at BLCKSZ = 8kB, because the default was hard-coded as 1024. Make the code match the docs by computing the default as 8MB/BLCKSZ. Oversight in commit 75be66464, noted pursuant to a gripe from Peter E. Discussion: &lt;90634e20-097a-e4fd-67d5-fb2c42f0dd71@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5472ed3e9bc23eff0b4e457fe564ac667cb69441">http://git.postgresql.org/pg/commitdiff/5472ed3e9bc23eff0b4e457fe564ac667cb69441</a></li>

<li>Add debugging aid "bmsToString(Bitmapset *bms)". This function has no direct callers at present, but it's convenient for manual use in a debugger, rather than having to inspect memory and do bit-counting in your head. In passing, get rid of useless outBitmapset() wrapper around _outBitmapset(); let's just export the function that does the work. Likewise for outToken(). Ashutosh Bapat, tweaked a bit by me Discussion: &lt;CAFjFpRdiht8e1HTVirbubr4YzaON5iZTzFJjq909y4sU8M_6eA@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8c61c9765339351409f06bbf964dcb8c1929e8b">http://git.postgresql.org/pg/commitdiff/d8c61c9765339351409f06bbf964dcb8c1929e8b</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Add more tests for targetlist SRFs. We're considering changing the implementation of targetlist SRFs considerably, and a lot of the current behaviour isn't tested in our regression tests. Thus it seems useful to increase coverage to avoid accidental behaviour changes. It's quite possible that some of the plans here will require adjustments to avoid falling afoul of ordering differences (e.g. hashed group bys). The buildfarm will tell us. Reviewed-By: Tom Lane Discussion: &lt;20160827214829.zo2dfb5jaikii5nw@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfe16d1a5dec0d23c917c37de646256c71e07ee8">http://git.postgresql.org/pg/commitdiff/bfe16d1a5dec0d23c917c37de646256c71e07ee8</a></li>

<li>Address portability issues in bfe16d1a5 test output. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f478b4f19d8e26300ae19e42c26343f5791e32a">http://git.postgresql.org/pg/commitdiff/9f478b4f19d8e26300ae19e42c26343f5791e32a</a></li>

<li>Remove user_relns() SRF from regression tests. The output of the function changes whenever previous (or, as in this case, concurrent) tests leave a table in place. That causes unneeded churn. This should fix failures due to the tests added bfe16d1a5, like on lapwing, caused by the tsrf test running concurrently with misc. Those could also have been addressed by using temp tables, but that test has annoyed me before. Discussion: &lt;27626.1473729905@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0dba54f1666ead71c54ce100b39efda67596d297">http://git.postgresql.org/pg/commitdiff/0dba54f1666ead71c54ce100b39efda67596d297</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Have heapam.h include lockdefs.h rather than lock.h. lockdefs.h was only split from lock.h relatively recently, and represents a minimal subset of the old lock.h. heapam.h only needs that smaller subset, so adjust it to include only that. This requires some corresponding adjustments elsewhere. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/445a38aba26cb80a4506af2248e3b425f795a099">http://git.postgresql.org/pg/commitdiff/445a38aba26cb80a4506af2248e3b425f795a099</a></li>

<li>Improve code comment for GatherPath's single_copy flag. Discussion: 5934.1472642782@sss.pgh.pa.us <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6415ba502bdc540e21f122d4c6c87d4a35f8ec27">http://git.postgresql.org/pg/commitdiff/6415ba502bdc540e21f122d4c6c87d4a35f8ec27</a></li>

<li>pg_buffercache: Allow huge allocations. Otherwise, users who have configured shared_buffers &gt;= 256GB won't be able to use this module. There probably aren't many of those, but it doesn't hurt anything to fix it so that it works. Backpatch to 9.4, where MemoryContextAllocHuge was introduced. The same problem exists in older branches, but there's no easy way to fix it there. KaiGai Kohei <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a503526e455b981718c2d24bd1630fd5b4cf7ac">http://git.postgresql.org/pg/commitdiff/8a503526e455b981718c2d24bd1630fd5b4cf7ac</a></li>

<li>Fix typo in comment. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffccee473682ed18a27d667b7a4f45d802dd61c4">http://git.postgresql.org/pg/commitdiff/ffccee473682ed18a27d667b7a4f45d802dd61c4</a></li>

<li>Clarify policy on marking inherited constraints as valid. Amit Langote and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5225c66336a1e4b46925e9f169086fc70f49736f">http://git.postgresql.org/pg/commitdiff/5225c66336a1e4b46925e9f169086fc70f49736f</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix and clarify comments on replacement selection. These were modified by the patch to only use replacement selection for the first run in an external sort. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c99dd5bfed23d9787dcf7d00197c1ed42bcfdb02">http://git.postgresql.org/pg/commitdiff/c99dd5bfed23d9787dcf7d00197c1ed42bcfdb02</a></li>

<li>Support OpenSSL 1.1.0. Changes needed to build at all: - Check for SSL_new in configure, now that SSL_library_init is a macro. - Do not access struct members directly. This includes some new code in pgcrypto, to use the resource owner mechanism to ensure that we don't leak OpenSSL handles, now that we can't embed them in other structs anymore. - RAND_SSLeay() -&gt; RAND_OpenSSL() Changes that were needed to silence deprecation warnings, but were not strictly necessary: - RAND_pseudo_bytes() -&gt; RAND_bytes(). - SSL_library_init() and OpenSSL_config() -&gt; OPENSSL_init_ssl() - ASN1_STRING_data() -&gt; ASN1_STRING_get0_data() - DH_generate_parameters() -&gt; DH_generate_parameters() - Locking callbacks are not needed with OpenSSL 1.1.0 anymore. (Good riddance!) Also change references to SSLEAY_VERSION_NUMBER with OPENSSL_VERSION_NUMBER, for the sake of consistency. OPENSSL_VERSION_NUMBER has existed since time immemorial. Fix SSL test suite to work with OpenSSL 1.1.0. CA certificates must have the "CA:true" basic constraint extension now, or OpenSSL will refuse them. Regenerate the test certificates with that. The "openssl" binary, used to generate the certificates, is also now more picky, and throws an error if an X509 extension is specified in "req_extensions", but that section is empty. Backpatch to all supported branches, per popular demand. In back-branches, we still support OpenSSL 0.9.7 and above. OpenSSL 0.9.6 should still work too, but I didn't test it. In master, we only support 0.9.8 and above. Patch by Andreas Karlsson, with additional changes by me. Discussion: &lt;20160627151604.GD1051@msg.df7cb.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/593d4e47db7af1a3a5dd6b6b1971f181b5566dbd">http://git.postgresql.org/pg/commitdiff/593d4e47db7af1a3a5dd6b6b1971f181b5566dbd</a></li>

<li>Fix building with LibreSSL. LibreSSL defines OPENSSL_VERSION_NUMBER to claim that it is version 2.0.0, but it doesn't have the functions added in OpenSSL 1.1.0. Add autoconf checks for the individual functions we need, and stop relying on OPENSSL_VERSION_NUMBER. Backport to 9.5 and 9.6, like the patch that broke this. In the back-branches, there are still a few OPENSSL_VERSION_NUMBER checks left, to check for OpenSSL 0.9.8 or 0.9.7. I left them as they were - LibreSSL has all those functions, so they work as intended. Per buildfarm member curculio. Discussion: &lt;2442.1473957669@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c6df67e0c961f68e73e7c1e6312211ed59da00a">http://git.postgresql.org/pg/commitdiff/5c6df67e0c961f68e73e7c1e6312211ed59da00a</a></li>

<li>Fix ecpg -? option on Windows, add -V alias for --version. This makes the -? and -V options work consistently with other binaries. --help and --version are now only recognized as the first option, i.e. "ecpg --foobar --help" no longer prints the help, but that's consistent with most of our other binaries, too. Backpatch to all supported versions. Haribabu Kommi Discussion: &lt;CAJrrPGfnRXvmCzxq6Dy=stAWebfNHxiL+Y_z7uqksZUCkW_waQ@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3fcc98c990ede7d3b415cc06eb6664aac6e7bbbc">http://git.postgresql.org/pg/commitdiff/3fcc98c990ede7d3b415cc06eb6664aac6e7bbbc</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to add a pgstat_report_activity() call to walsender.</p>

<p>Craig Ringer and Pavel St&Auml;&rsaquo;hule traded patches to add xmltable().</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in a patch to add psql tab completion for the recently-added ALTER TYPE &acirc;&euro;&brvbar; RENAME VALUE.</p>

<p>Corey Huinker sent in two more revisions of a patch to let file_fdw access COPY FROM PROGRAM.</p>

<p>Craig Ringer sent in two revisions of a patch to install the Perl TAP tests, add install rules for the isolation tester, and note that src/test/Makefile is not called from src/Makefile.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to move the fsync routines of initdb into src/common, issue fsync more carefully in pg_receivexlog and pg_basebackup [-X] stream, add a --no-sync option to pg_basebackup, and switch pg_basebackup commands in Postgres.pm to use --no-sync.</p>

<p>Etsuro Fujita sent in another revision of a patch to push more FULL JOINs to the PostgreSQL FDW.</p>

<p>Heikki Linnakangas sent in two revisions of a patch to change the way pre-reading in external sort's merge phase works.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement partial sorting.</p>

<p>Mithun Cy sent in another revision of a patch to cache hash index meta page.</p>

<p>Haribabu Kommi sent in a patch to replace most of the getimeofday function calls, except timeofday(user callable) and GetCurrentTimestamp functions with clock_gettime.</p>

<p>Andrew Borodin sent in two more revisions of a patch to implement penalty functions for GiST in the cube contrib extension.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to make PostgresNode.pm the new --noclean option in its call.</p>

<p>KaiGai Kohei sent in another revision of a patch to implement PassDownLimitBound for ForeignScan/CustomScan.</p>

<p>Amit Kapila sent in two more revisions of a patch to implement WAL for hash indexes.</p>

<p>Amit Kapila sent in two more revisions of a patch to implement concurrent hash indexes.</p>

<p>Fabien COELHO sent in another revision of a patch to enable pgbench to store results into variables.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add covering + unique indexes.</p>

<p>Andrew Borodin sent in a patch to change the interpretation of NaN returned from the GiST penalty function from "best fit" to "worst fit."</p>

<p>Tom Lane sent in a PoC patch to put srfs in separate result nodes.</p>

<p>Pavan Deolasee and Claudio Freire traded patches to allow VACUUM to use over 1GB of work_mem.</p>

<p>Thomas Munro sent in another revision of a patch to use kqueue on platforms where it helps.</p>

<p>Craig Ringer sent in another revision of a patch to install the Perl TAP tests, add install rules for isolation tester, and add txid_status(bigint).</p>

<p>Kuntal Ghosh sent in another revision of a patch to add a WAL consistency check facility.</p>

<p>Marco Pfatschbacher sent in a patch to keep one postmaster monitoring pipe per process.</p>

<p>Amit Langote sent in another revision of a patch to implement declarative partitioning.</p>

<p>Rajkumar Raghuwanshi sent in another revision of a patch to enable piecewise joins of partitioned tables.</p>

<p>Daniel V&Atilde;&copy;rit&Atilde;&copy; sent in a patch to create hooks into psql variables to return a boolean indicating whether a change is allowed.</p>

<p>Jeevan Chalke sent in another revision of a patch to enable pushing aggregates to a foreign server.</p>

<p>Masahiko Sawada sent in another revision of a patch to enable quorum commit for multiple synchronous replication.</p>

<p>Stas Kelvich sent in another revision of a patch to speed up 2PC transactions.</p>

<p>Julien Rouhaud sent in another revision of a patch to rename the max-worker-processes GUC to max-parallel-workers.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to refactor psql's tab completion and use that refactoring to implement IF (NOT) EXISTS completion.</p>

<p>MauMau sent in a patch to fix the omission of pg_recvlogical from the Windows installation.</p>

<p>Yury Zhuravlev sent in another revision of a patch to CMake-ify PostgreSQL.</p>