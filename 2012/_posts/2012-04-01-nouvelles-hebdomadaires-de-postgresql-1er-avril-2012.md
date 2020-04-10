---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er avril 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-04-01-nouvelles-hebdomadaires-de-postgresql-1er-avril-2012 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Code cleanup for heap_freeze_tuple. It used to be case that lazy vacuum could call this function with only a shared lock on the buffer, but neither lazy vacuum nor any other code path does that any more. Simplify the code accordingly and clean up some related, obsolete comments.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7386089d23c748af142ec7e3668fa0dd164eaf99">http://git.postgresql.org/pg/commitdiff/7386089d23c748af142ec7e3668fa0dd164eaf99</a></li>

<li>New GUC, track_iotiming, to track I/O timings. Currently, the only way to see the numbers this gathers is via EXPLAIN (ANALYZE, BUFFERS), but the plan is to add visibility through the stats collector and pg_stat_statements in subsequent patches. Ants Aasma, reviewed by Greg Smith, with some further changes by me.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40b9b957694cf7749c420c6c51a7e1d3c9b1fec1">http://git.postgresql.org/pg/commitdiff/40b9b957694cf7749c420c6c51a7e1d3c9b1fec1</a></li>

<li>Expose track_iotiming information via pg_stat_statements. Ants Aasma, reviewed by Greg Smith, with very minor tweaks by me.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b4f346611431361339253203d486789e4babb02">http://git.postgresql.org/pg/commitdiff/5b4f346611431361339253203d486789e4babb02</a></li>

<li>pg_test_timing utility, to measure clock monotonicity and timing cost. Ants Aasma, Greg Smith

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cee523867db29c0bfc5de7ec638ce0a4ad9b3817">http://git.postgresql.org/pg/commitdiff/cee523867db29c0bfc5de7ec638ce0a4ad9b3817</a></li>

<li>Doc fix for pg_test_timing. Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c272da8c49ac5531ceea57cd13d56dbdf761a82">http://git.postgresql.org/pg/commitdiff/9c272da8c49ac5531ceea57cd13d56dbdf761a82</a></li>

<li>pg_basebackup: Error message improvements. Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81f6bbe8ade8c90f23f9286ca9ca726d3e0e310f">http://git.postgresql.org/pg/commitdiff/81f6bbe8ade8c90f23f9286ca9ca726d3e0e310f</a></li>

<li>pg_basebackup: Error handling fixes. Thomas Ogrisegg and Fujii Masao

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ada763cfcd0978cf95ebb0587f40a45b5cb57594">http://git.postgresql.org/pg/commitdiff/ada763cfcd0978cf95ebb0587f40a45b5cb57594</a></li>

<li>Attempt to unbreak pg_test_timing on Windows. Per buildfarm, and Álvaro Herrera.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f63527c82177c73197789468384a064d9d750d9">http://git.postgresql.org/pg/commitdiff/7f63527c82177c73197789468384a064d9d750d9</a></li>

<li>pg_test_timing: Lame hack to work around compiler warning. Fujii Masao, plus a comment by me. While I'm at it, correctly tabify this chunk of code.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f427c1353d92c41069197b31ea6c8b89f24cd11">http://git.postgresql.org/pg/commitdiff/3f427c1353d92c41069197b31ea6c8b89f24cd11</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Remove dead assignment found by Coverity

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcb33b1c6417cbeaf2c7d24eece0edf7cc0adfa7">http://git.postgresql.org/pg/commitdiff/dcb33b1c6417cbeaf2c7d24eece0edf7cc0adfa7</a></li>

<li>Improve PL/Python database access function documentation. Organize the function descriptions as a list instead of running text, for easier access.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/206bec11bd9214873e3703898958789324480b1f">http://git.postgresql.org/pg/commitdiff/206bec11bd9214873e3703898958789324480b1f</a></li>

<li>pg_dump: Small message adjustment for consistency

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd024c22f1fff083065b42af555a3552721fabfd">http://git.postgresql.org/pg/commitdiff/dd024c22f1fff083065b42af555a3552721fabfd</a></li>

<li>Run maintainer-check on all PO files, not only configured ones. The intent is to allow configure --enable-nls=xx for installation speed and size, but have maintainer-check check all source files regardless.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e1c72079abcc160e84cdcd879f2dca2a6956dea">http://git.postgresql.org/pg/commitdiff/4e1c72079abcc160e84cdcd879f2dca2a6956dea</a></li>

<li>Tweak markup to avoid extra whitespace in man pages

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03f0c08f4730f3c80b65221749267b6436eac576">http://git.postgresql.org/pg/commitdiff/03f0c08f4730f3c80b65221749267b6436eac576</a></li>

<li>initdb: Mark more messages for translation. Some Windows-only messages had apparently been forgotten so far. Also make the wording of the messages more consistent with similar messages other parts, such as pg_ctl and pg_regress.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2005b77b8f336f4c2bd00185b4a63fe6582bf7a8">http://git.postgresql.org/pg/commitdiff/2005b77b8f336f4c2bd00185b4a63fe6582bf7a8</a></li>

<li>Add new files to NLS file lists. Some of these are newly added, some are older and were forgotten, some don't contain any translatable strings right now but look like they could in the future.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/194b5ea3d0722f94e8a6ba9cec03b858cc8c9370">http://git.postgresql.org/pg/commitdiff/194b5ea3d0722f94e8a6ba9cec03b858cc8c9370</a></li>

<li>Replace printf format %i by %d. see also ce8d7bb6440710058503d213b2aafcdf56a5b481

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d1361b6b77242f519c3cbb10fede4478ba6444f">http://git.postgresql.org/pg/commitdiff/1d1361b6b77242f519c3cbb10fede4478ba6444f</a></li>

<li>pgxs: Supply default values for BISON and FLEX variables. Otherwise, the availability of these variables depends on what happened to be available at the time the PostgreSQL build was configured.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ca365bff28e52dc14500df84e7b3230d4c292eb">http://git.postgresql.org/pg/commitdiff/6ca365bff28e52dc14500df84e7b3230d4c292eb</a></li>

<li>Fix recently introduced typo in NLS file lists

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5633df2582bedc93c2fb37555b7376eb51518bd5">http://git.postgresql.org/pg/commitdiff/5633df2582bedc93c2fb37555b7376eb51518bd5</a></li>

<li>NLS: Seed Language field in PO header. Use msgmerge --lang option to seed the Language field, recently introduced by gettext, in the header of the new PO file.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2cc5c347440e48bc4d0e4ed083db2f3966a0e90">http://git.postgresql.org/pg/commitdiff/c2cc5c347440e48bc4d0e4ed083db2f3966a0e90</a></li>

</ul>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Silence compiler warning about uninitialized variable.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98316e211b60cb160247171e3557b40a247c4610">http://git.postgresql.org/pg/commitdiff/98316e211b60cb160247171e3557b40a247c4610</a></li>

<li>Bend parse location rules for the convenience of pg_stat_statements. Generally, the parse location assigned to a multiple-token construct is the location of its leftmost token. This commit breaks that rule for the syntaxes TYPENAME 'LITERAL' and CAST(CONSTANT Alexander Shulgin TYPENAME) --- the resulting Const will have the location of the literal string, not the typename or CAST keyword. The cases where this matters are pretty thin on the ground (no error messages in the regression tests change, for example), and it's unlikely that any user would be confused anyway by an error cursor pointing at the literal. But still it's less than consistent. The reason for changing it is that contrib/pg_stat_statements wants to know the parse location of the original literal, and it was agreed that this is the least unpleasant way to preserve that information through parse analysis. Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d3fcc4c2e137417ef470d604fee5e452b22f6a7">http://git.postgresql.org/pg/commitdiff/5d3fcc4c2e137417ef470d604fee5e452b22f6a7</a></li>

<li>Add some infrastructure for contrib/pg_stat_statements. Add a queryId field to Query and PlannedStmt. This is not used by the core backend, except for being copied around at appropriate times. It's meant to allow plug-ins to track a particular query forward from parse analysis to execution. The queryId is intentionally not dumped into stored rules (and hence this commit doesn't bump catversion). You could argue that choice either way, but it seems better that stored rule strings not have any dependency on plug-ins that might or might not be present. Also, add a post_parse_analyze_hook that gets invoked at the end of parse analysis (but only for top-level analysis of complete queries, not cases such as analyzing a domain's default-value expression). This is mainly meant to be used to compute and assign a queryId, but it could have other applications. Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a40fa613b516b97c37d87ac1b21fb7aa8a2f2c1b">http://git.postgresql.org/pg/commitdiff/a40fa613b516b97c37d87ac1b21fb7aa8a2f2c1b</a></li>

<li>Improve contrib/pg_stat_statements to lump "similar" queries together. pg_stat_statements now hashes selected fields of the analyzed parse tree to assign a "fingerprint" to each query, and groups all queries with the same fingerprint into a single entry in the pg_stat_statements view. In practice it is expected that queries with the same fingerprint will be equivalent except for values of literal constants. To make the display more useful, such constants are replaced by "?" in the displayed query strings. This mechanism currently supports only optimizable queries (SELECT, INSERT, UPDATE, DELETE). Utility commands are still matched on the basis of their literal query strings. There remain some open questions about how to deal with utility statements that contain optimizable queries (such as EXPLAIN and SELECT INTO) and how to deal with expiring speculative hashtable entries that are made to save the normalized form of a query string. However, fixing these issues should require only localized changes, and since there are other open patches involving contrib/pg_stat_statements, it seems best to go ahead and commit what we've got. Peter Geoghegan, reviewed by Daniel Farina

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7313cc016344a5705eb3e6916d8c4ea849c57975">http://git.postgresql.org/pg/commitdiff/7313cc016344a5705eb3e6916d8c4ea849c57975</a></li>

<li>Improve handling of utility statements containing plannable statements. When tracking nested statements, contrib/pg_stat_statements formerly double-counted the execution costs of utility statements that directly contain an executable statement, such as EXPLAIN and DECLARE CURSOR. This was not obvious since the ProcessUtility and Executor hooks would each add their measured costs to the same stats table entry. However, with the new implementation that hashes utility and plannable statements differently, this showed up as seemingly-duplicate stats entries. Fix that by disabling the Executor hooks when the query has a queryId of zero, which was the case already for such statements but is now more clearly specified in the code. (The zero queryId was causing problems anyway because all such statements would add to a single bogus entry.) The PREPARE/EXECUTE case still results in counting the same execution in two different stats table entries, but it should be much less surprising to users that there are two entries in such cases. In passing, include a CommonTableExpr's ctename in the query hash. I had left it out originally on the grounds that we wanted to omit all inessential aliases, but since RTE_CTE RTEs are hashing their referenced names, we'd better hash the CTE names too to make sure we don't hash semantically different queries the same.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e0e4ebe38469a777e3c585e1d97383f974c19b8c">http://git.postgresql.org/pg/commitdiff/e0e4ebe38469a777e3c585e1d97383f974c19b8c</a></li>

<li>Improve contrib/pg_stat_statements' handling of PREPARE/EXECUTE statements. It's actually more useful for the module to ignore these. Ignoring EXECUTE (and not incrementing the nesting level) allows the executor hooks to charge the time to the underlying prepared query, which shows up as a stats entry with the original PREPARE as query string (possibly modified by suppression of constants, which might not be terribly useful here but it's not worth avoiding). This is much more useful than cluttering the stats table with a distinct entry for each textually distinct EXECUTE. Experimentation with this idea shows that it's also preferable to ignore PREPARE. If we don't, we get two stats table entries, one with the query string hash and one with the jumble-derived hash, but with the same visible query string (modulo those constants). This is confusing and not very helpful, since the first entry will only receive costs associated with initial planning of the query, which is not something counted at all normally by pg_stat_statements. (And if we do start tracking planning costs, we'd want them blamed on the other hash table entry anyway.)

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/566a1d43cf6bfcc7f9385b581d98e07eab282cdd">http://git.postgresql.org/pg/commitdiff/566a1d43cf6bfcc7f9385b581d98e07eab282cdd</a></li>

<li>Fix dblink's failure to report correct connection name in error messages. The DBLINK_GET_CONN and DBLINK_GET_NAMED_CONN macros did not set the surrounding function's conname variable, causing errors to be incorrectly reported as having occurred on the "unnamed" connection in some cases. This bug was actually visible in two cases in the regression tests, but apparently whoever added those cases wasn't paying attention. Noted by Kyotaro Horiguchi, though this is different from his proposed patch. Back-patch to 8.4; 8.3 does not have the same type of error reporting so the patch is not relevant.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b75fbe91910df323a8d3e1d92a8bb4dd0d5e88a9">http://git.postgresql.org/pg/commitdiff/b75fbe91910df323a8d3e1d92a8bb4dd0d5e88a9</a></li>

<li>Add PGDLLIMPORT to ScanKeywords and NumScanKeywords. Per buildfarm, this is now needed by contrib/pg_stat_statements.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e83854d71bb05403768a97a415a129b0081564b">http://git.postgresql.org/pg/commitdiff/5e83854d71bb05403768a97a415a129b0081564b</a></li>

<li>Fix glitch recently introduced in psql tab completion. Over-optimization (by me, looks like :-() broke the case of recognizing a word boundary just before a quoted identifier. Reported and diagnosed by Dean Rasheed.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a52e6fe7bcf86f7e52d7b1d6f59260cb57b565fa">http://git.postgresql.org/pg/commitdiff/a52e6fe7bcf86f7e52d7b1d6f59260cb57b565fa</a></li>

<li>Rename frontend keyword arrays to avoid conflict with backend. ecpg and pg_dump each contain keyword arrays with structure similar to the backend's keyword array. Up to now, we actually named those arrays the same as the backend's and relied on parser/keywords.h to declare them. This seems a tad too cute, though, and it breaks now that we need to PGDLLIMPORT-decorate the backend symbols. Rename to avoid the problem. Per buildfarm. (It strikes me that maybe we should get rid of the separate keywords.c files altogether, and just define these arrays in the modules that use them, but that's a rather more invasive change.)

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c252a17d828756e2f7d635f69eace53aaf983420">http://git.postgresql.org/pg/commitdiff/c252a17d828756e2f7d635f69eace53aaf983420</a></li>

<li>Fix O(N2) behavior in pg_dump for large numbers of owned sequences. The loop that matched owned sequences to their owning tables required time proportional to number of owned sequences times number of tables; although this work was only expended in selective-dump situations, which is probably why the issue wasn't recognized long since. Refactor slightly so that we can perform this work after the index array for findTableByOid has been set up, reducing the time to O(M log N). Per gripe from Mike Roest. Since this is a longstanding performance bug, backpatch to all supported versions.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d8117abefdae69dbec7465adf2c68f5cd0412ac">http://git.postgresql.org/pg/commitdiff/0d8117abefdae69dbec7465adf2c68f5cd0412ac</a></li>

<li>Fix O(N2) behavior in pg_dump when many objects are in dependency loops. Combining the loop workspace with the record of already-processed objects might have been a cute trick, but it behaves horridly if there are many dependency loops to repair: the time spent in the first step of findLoop() grows as O(N2). Instead use a separate flag array indexed by dump ID, which we can check in constant time. The length of the workspace array is now never more than the actual length of a dependency chain, which should be reasonably short in all cases of practical interest. The code is noticeably easier to understand this way, too. Per gripe from Mike Roest. Since this is a longstanding performance bug, backpatch to all supported versions.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5881c036a913d31a5b0f56519cce76ca3b3e587">http://git.postgresql.org/pg/commitdiff/d5881c036a913d31a5b0f56519cce76ca3b3e587</a></li>

</ul>

<p>Andrew Dunstan a poussé&nbsp;:</p>

<ul>

<li>Remove now redundant pgpipe code.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2c1740dc275543a46721ed254ba3623f63d2204">http://git.postgresql.org/pg/commitdiff/d2c1740dc275543a46721ed254ba3623f63d2204</a></li>

<li>Unbreak Windows builds broken by pgpipe removal.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aeca65022609282f004e8332910938abd4eefbd6">http://git.postgresql.org/pg/commitdiff/aeca65022609282f004e8332910938abd4eefbd6</a></li>

</ul>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>Inherit max_safe_fds to child processes in EXEC_BACKEND mode. Postmaster sets max_safe_fds by testing how many open file descriptors it can open, and that is normally inherited by all child processes at fork(). Not so on EXEC_BACKEND, ie. Windows, however. Because of that, we effectively ignored max_files_per_process on Windows, and always assumed a conservative default of 32 simultaneous open files. That could have an impact on performance, if you need to access a lot of different files in a query. After this patch, the value is passed to child processes by save/restore_backend_variables() among many other global variables. It has been like this forever, but given the lack of complaints about it, I'm not backpatching this.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5762a4d9098ac0cba789ddd26286ac85c2d316f2">http://git.postgresql.org/pg/commitdiff/5762a4d9098ac0cba789ddd26286ac85c2d316f2</a></li>

</ul>

<p>Simon Riggs a poussé&nbsp;:</p>

<ul>

<li>Correct epoch of txid_current() when executed on a Hot Standby server. Initialise ckptXidEpoch from starting checkpoint and maintain the correct value as we roll forwards. This allows GetNextXidAndEpoch() to return the correct epoch when executed during recovery. Backpatch to 9.0 when the problem is first observable by a user. Bug report from Daniel Farina

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68219aaf6b8c6214e5f4a6124bd5607254aad6b3">http://git.postgresql.org/pg/commitdiff/68219aaf6b8c6214e5f4a6124bd5607254aad6b3</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Kyotaro HORIGUCHI sent in two more revisions of the patch to create a new tuple storage format for libpq and use same in dblink.</li>

<li>Shigeru HANADA sent in two more revisions of the patch to add a PostgreSQL FDW along with infrastructure for same.</li>

<li>Peter Eisentraut and Alexander Shulgin traded patches to add a URI format for connection strings in libpq.</li>

<li>Fujii Masao sent in two revisions of a patch to make pg_basebackup exit on error.</li>

<li>Ants Aasma sent in a patch to use lazy hash aggregation to speed up cases where no actual aggregates are used.</li>

<li>Dimitri Fontaine sent in two more revisions of the patch to add finer dependencies for EXTENSIONs.</li>

<li>Marco Nenciarini sent in another revision of the patch to allow each element of an array to be an enforced foreign key reference.</li>

<li>Peter Eisentraut sent in a patch to fix some infelicities between pgxs, bison and flexx.</li>

<li>Andrew Dunstan and Joachim Wieland traded patches to implement parallel pg_dump.</li>

<li>Zoltan Boszormenyi sent in two more revisions of the ECPG FETCH readahead patch.</li>

<li>Daniel Farina sent in another revision of the patch to allow same-role pg_terminate_backend.</li>

<li>Pavel Stehule sent in another revision of the CHECK TRIGGER functionality for PL/pgsql.</li>

<li>Peter Eisentraut sent in a patch which reverts the default capitalization behavior in psql's tab completion to that prior to a previous patch while expanding the tunability of that capitalization with tab completion.</li>

<li>Robert Haas sent in two patches to measure lwlock-related latency spikes.</li>

<li>Heikki Linnakangas sent in a patch to set stack_base_ptr in autovacuum.</li>

</ul>