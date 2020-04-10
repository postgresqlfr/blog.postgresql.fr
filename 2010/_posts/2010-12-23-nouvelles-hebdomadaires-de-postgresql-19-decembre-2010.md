---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 décembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-12-23-nouvelles-hebdomadaires-de-postgresql-19-decembre-2010 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Generalize concept of temporary relations to "relation persistence". This commit replaces pg_class.relistemp with pg_class.relpersistence; and also modifies the RangeVar node type to carry relpersistence rather than istemp. It also removes removes rd_istemp from RelationData and instead performs the correct computation based on relpersistence. For clarity, we add three new macros: RelationNeedsWAL(), RelationUsesLocalBuffers(), and RelationUsesTempNamespace(), so that we can clarify the purpose of each check that previous depended on rd_istemp. This is intended as infrastructure for the upcoming unlogged tables patch, as well as for future possible work on global temporary tables. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f7b58fad8f45c69bb67944779dce67e2f481995">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f7b58fad8f45c69bb67944779dce67e2f481995</a></li>

<li>Document replacement of pg_class.relistemp with relpersistence. Noted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d26849ee26e46a689fb7c228f98e10fb46c1b2a8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d26849ee26e46a689fb7c228f98e10fb46c1b2a8</a></li>

<li>Allow plugins to suppress inlining and hook function entry/exit/abort. This is intended as infrastructure to allow an eventual SE-Linux plugin to support trusted procedures. KaiGai Kohei. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d368e1a2a7afad5a0fc711a2ab70a83c36fa57af">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d368e1a2a7afad5a0fc711a2ab70a83c36fa57af</a></li>

<li>Improved tab completion for views with triggers. Allow INSERT INTO, UPDATE, and DELETE FROM to be completed with either the name of a table (as before) or the name of a view with an appropriate INSTEAD OF rule. Along the way, allow CREATE TRIGGER to be completed with INSTEAD OF, as well as BEFORE and AFTER. David Fetter, reviewed by Itagaki Takahiro 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9878e295dc937c664367875dc001b7503df057f1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9878e295dc937c664367875dc001b7503df057f1</a></li>

<li>Instrument checkpoint sync calls. Greg Smith, reviewed by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=34c70c7ac4926495b7ab5ebfe748704313a4c822">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=34c70c7ac4926495b7ab5ebfe748704313a4c822</a></li>

<li>Document timestamptz a little better. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afc8f47b5885716db716a2523c00f7465cb7f415">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afc8f47b5885716db716a2523c00f7465cb7f415</a></li>

<li>Some copy editing of pg_read_binary_file() patch. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=290f1603b4208ca6a13776f744b586a958e98d74">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=290f1603b4208ca6a13776f744b586a958e98d74</a></li>

<li>Waiting for complete startup is now a well-defined operation. Per report from Fujii Masao, and subsequent discussion. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=df142bf82c84de5d0588ae7d52881501abb039ed">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=df142bf82c84de5d0588ae7d52881501abb039ed</a></li>

<li>Reset 'ps' display just once when resolving VXID conflicts. This prevents the word "waiting" from briefly disappearing from the ps status line when ResolveRecoveryConflictWithVirtualXIDs begins a new iteration of the outer loop. Along the way, remove some useless pgstat_report_waiting() calls; the startup process doesn't appear in pg_stat_activity. Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=611fed371227f430e71d0ff7fed037f1006b410d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=611fed371227f430e71d0ff7fed037f1006b410d</a></li>

<li>Try to save a kernel call in ResolveRecoveryConflictWithVirtualXIDs. If there's no work to be done, just exit quickly, before initialization. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8bd4b89e240cc6488f5e1523202cc2d27e9970c0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8bd4b89e240cc6488f5e1523202cc2d27e9970c0</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2010o: DST law changes in Fiji and Samoa. Historical corrections for Hong Kong. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f5e4f743e6a84884156ac86948277df4c672865c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f5e4f743e6a84884156ac86948277df4c672865c</a></li>

<li>Update release notes for releases 9.0.2, 8.4.6, 8.3.13, 8.2.19, and 8.1.23. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9224c8ec2f6dcfed6daa3f94597b870ec31c8d8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9224c8ec2f6dcfed6daa3f94597b870ec31c8d8</a></li>

<li>Fix contrib/seg's GiST picksplit method. This patch replaces Guttman's generalized split method with a simple sort-by-center-points algorithm. Since the data is only one-dimensional we don't really need the slow and none-too-stable Guttman method. This is in part a bug fix, since seg has the same size_alpha versus size_beta typo that was recently fixed in contrib/cube. It seems prudent to apply this rather aggressive fix only in HEAD, though. Back branches will just get the typo fix. Alexander Korotkov, reviewed by Yeb Havinga. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2a6ebe70fb2f7ec97a08dc07214fe2ca571d2780">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2a6ebe70fb2f7ec97a08dc07214fe2ca571d2780</a></li>

<li>Fix up getopt() reset management so it works on recent mingw. The mingw people don't appear to care about compatibility with non-GNU versions of getopt, so force use of our own copy of getopt on Windows. Also, ensure that we make use of optreset when using our own copy. Per report from Andrew Dunstan. Back-patch to all versions supported on Windows. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5cdd65f3241ce10c66953228daef60df7b3966d1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5cdd65f3241ce10c66953228daef60df7b3966d1</a></li>

<li>Remove optreset from src/port/ implementations of getopt and getopt_long. We don't actually need optreset, because we can easily fix the code to ensure that it's cleanly restartable after having completed a scan over the argv array; which is the only case we need to restart in. Getting rid of it avoids a class of interactions with the system libraries and allows reversion of my change of yesterday in postmaster.c and postgres.c. Back-patch to 8.4. Before that the getopt code was a bit different anyway. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=61b53695fbbedb7fa9d394e71bf2affdc494e6b0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=61b53695fbbedb7fa9d394e71bf2affdc494e6b0</a></li>

<li>Improve comments around startup_hacks() code. These comments were not updated when we added the EXEC_BACKEND mechanism for Windows, even though it rendered them inaccurate. Also unify two unnecessarily-separate #ifdef __alpha code blocks. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=14ed7735f5bb5275da13891c4bb106c198d00b53">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=14ed7735f5bb5275da13891c4bb106c198d00b53</a></li>

<li>Fix erroneous parsing of tsquery input "... &amp; !(subexpression) | ..." After parsing a parenthesized subexpression, we must pop all pending ANDs and NOTs off the stack, just like the case for a simple operand. Per bug #5793. Also fix clones of this routine in contrib/intarray and contrib/ltree, where input of types query_int and ltxtquery had the same problem. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=abc10262696e53773c9a8c9f279bbd464b464190">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=abc10262696e53773c9a8c9f279bbd464b464190</a></li>

<li>Fix up handling of simple-form CASE with constant test expression. eval_const_expressions() can replace CaseTestExprs with constants when the surrounding CASE's test expression is a constant. This confuses ruleutils.c's heuristic for deparsing simple-form CASEs, leading to Assert failures or "unexpected CASE WHEN clause" errors. I had put in a hack solution for that years ago (see commit 514ce7a331c5bea8e55b106d624e55732a002295 of 2006-10-01), but bug #5794 from Peter Speck shows that that solution failed to cover all cases. Fortunately, there's a much better way, which came to me upon reflecting that Peter's "CASE TRUE WHEN" seemed pretty redundant: we can "simplify" the simple-form CASE to the general form of CASE, by simply omitting the constant test expression from the rebuilt CASE construct. This is intuitively valid because there is no need for the executor to evaluate the test expression at runtime; it will never be referenced, because any CaseTestExprs that would have referenced it are now replaced by constants. This won't save a whole lot of cycles, since evaluating a Const is pretty cheap, but a cycle saved is a cycle earned. In any case it beats kluging ruleutils.c still further. So this patch improves const-simplification and reverts the previous change in ruleutils.c. Back-patch to all supported branches. The bug exists in 8.1 too, but it's out of warranty. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1b19e2c0baedb959650a27f25bd8537bd51d60b0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1b19e2c0baedb959650a27f25bd8537bd51d60b0</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Translation updates for 9.0.2, 8.4.6, 8.3.13, 8.2.19, 8.1.23.</li>

<li>Remove recently reintroduced CVS keyword 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=843a490f0aeccd5b61a30c37d2ffaae26d192329">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=843a490f0aeccd5b61a30c37d2ffaae26d192329</a></li>

</ul>

<p>Marc Fournier a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tag 9.0.2, 8.4.6, 8.3.13, 8.2.19, 8.1.23.</li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use "upgrade" in preference over "migrate" in pg_upgrade messages and documentation. (Many were left over from the old pg_migrator naming.) 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=16b5e08decc8207ae35589add387dce9b62669de">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=16b5e08decc8207ae35589add387dce9b62669de</a></li>

<li>Fix crash caused by NULL lookup when reporting IP address of failed libpq connection, per report from Magnus. This happens only on GIT master and only on Win32 because that is the platform where "" maps to an IP address (localhost). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=48da2b87e3f292534a26d3bacc2a13f7b62a34c8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=48da2b87e3f292534a26d3bacc2a13f7b62a34c8</a></li>

<li>Properly print the IP number and "localhost" for failed localhost connections when the server is down, on Win32. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7e95337d586185c91f8af3fbcb0a6b380b4ba1c7">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7e95337d586185c91f8af3fbcb0a6b380b4ba1c7</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_read_binary_file() and whole-file-at-once versions of pg_read_file(). One of the usages of the binary version is to read files in a different encoding from the server encoding. Dimitri Fontaine and Itagaki Takahiro. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03db44eae3e065174d5e29888b8d98c39b1f520b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03db44eae3e065174d5e29888b8d98c39b1f520b</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add some minor missing error checks. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e359b8496d11befb63d4734874d997909c44ad83">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e359b8496d11befb63d4734874d997909c44ad83</a></li>

<li>Simplify SignalSomeChildren(BACKEND_TYPE_ALL) to SignalChildren(). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=16ca75baebc56cebc6590691a0b474ee1922519c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=16ca75baebc56cebc6590691a0b474ee1922519c</a></li>

<li>Fix inconsequential FILE pointer leakage. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=83c759ea0ea8ffe07c45e6fd2c489cebce2caad6">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=83c759ea0ea8ffe07c45e6fd2c489cebce2caad6</a></li>

<li>Avoid clobbering errno, per comment from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cd1fefa973968ff4e3760a9593f70fe2da0def48">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cd1fefa973968ff4e3760a9593f70fe2da0def48</a></li>

<li>Remove unnecessary definition for autovacuum in SignalSomeChildren. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b68193c0c7a7cfbc4aead3910cd492be63c0cd8b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b68193c0c7a7cfbc4aead3910cd492be63c0cd8b</a></li>

<li>set_ps_display when calling functions via fastpath. This improves tag output by log_line_prefix. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3026027ec3a795745e8e80fc9f204bebc97be58e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3026027ec3a795745e8e80fc9f204bebc97be58e</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Backpatch plperl GNUmakefile fixes to allow building release 8.2 on Mingw with a modern perl. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2f63551cdafcdec4169557122522229aa2530e8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2f63551cdafcdec4169557122522229aa2530e8</a></li>

<li>Work around make changes on modern Mingw to allow release 8.2 regression tests to work. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=43a7206fcca3f77503be481565b2a855b9044550">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=43a7206fcca3f77503be481565b2a855b9044550</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make GUC variables for syslog and SSL always visible. Make the variables visible (but not used) even when support is not compiled in. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4754dbf4c3f857a496b0d29af74786c73d1a8401">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4754dbf4c3f857a496b0d29af74786c73d1a8401</a></li>

<li>Document unavailable parameters in some configurations. Add a note to user-facing parameters that can be removed completely (and not just empty) by #ifdef's depending on build configuration. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8b4d3d44dc7d64aaafd2269d3da8d2873137c691">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8b4d3d44dc7d64aaafd2269d3da8d2873137c691</a></li>

<li>Support for collecting crash dumps on Windows. Add support for collecting "minidump" style crash dumps on Windows, by setting up an exception handling filter. Crash dumps will be generated in PGDATA/crashdumps if the directory is created (the existance of the directory is used as on/off switch for the generation of the dumps). Craig Ringer and Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dcb09b595f88a3bca6097a6acc17bf2ec935d55f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dcb09b595f88a3bca6097a6acc17bf2ec935d55f</a></li>

<li>Remove thread dumping constant that requires newer Platform SDK. Since we're not multithreaded it only provides marginally useful information, and it does require a newer version of the Platform SDK than we target. We may want to reconsider this in the future along with a fix for MinGW. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d382828f6ed1edc0f123934d53c52065ecc425c9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d382828f6ed1edc0f123934d53c52065ecc425c9</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Gurjeet Singh sent in a patch with an improved syntax for adding a primary key using an existing index.</li>

<li>Heikki Linnakangas sent in another revision of the patch to rewrite how GiST inserts work.</li>

<li>Shigeru HANADA sent in two more revisions of the core functionality for FOREIGN DATA WRAPPER, part of the SQL/MED specification.</li>

<li>Marko (johto) Tiikkaja sent in a patch which allows advisory locks to be released automatically when the transaction ends.</li>

<li>ITAGAKI Takahiro sent in a patch to export some functions from copy.c, which will be useful for SQL/MED file operations, among other things.</li>

<li>Florian Pflug sent in another revision of the serializable lock consistency patch. Heikki Linnakangas sent in some typo fixes for same.</li>

<li>Florian Pflug sent in two revisions of a fix for the serializable lock consistency patch.</li>

<li>Shigeru HANADA sent in another revision of the patch to implement a file foreign data wrapper.</li>

<li>Shigeru HANADA sent in a patch to use the exported COPY functions in the above file_fdw patch.</li>

<li>Heikki Linnakangas sent in another revision of the patch to fix the GiST insert algorithm.</li>

<li>Alex Hunsaker sent in two revisions of a patch to fix an issue with PL/PerlU's treatment of utf8.</li>

<li>ITAGAKI Takahiro sent in a patch to add pg_read_binary_file().</li>

<li>Dimitri Fontaine sent in three more revisions of the patch to add extensions.</li>

<li>Magnus Hagander sent in a patch to allow libpq to check its version.</li>

<li>Peter Eisentraut sent in a patch to fix an issue with localtimestamp inside certain queries.</li>

<li>Pavel Stehule sent in another revision of the patch to add FOREACH...IN ARRAY to PL/pgsql.</li>

<li>Robert Haas sent in a patch to fix an issue with unlogged tables vs. xlog.</li>

<li>Pavel Stehule sent in a patch to factor out some redundant code from pl_exec.c.</li>

<li>Robert Haas sent in another revision of the patch to relax synchronous commit behavior when no WAL is written.</li>

<li>Peter Eisentraut sent in a patch to allow casting a table's row type to the table's supertype if it is a typed table.</li>

<li>Peter Eisentraut sent in a WIP patch which would switch psql from normal to expanded and vice versa depending on the width of the terminal window it's in.</li>

<li>Tomas Vondra sent in another revision of the patch to keep a timestamp of the last stats reset by database, table and function.</li>

</ul>