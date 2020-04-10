---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 décembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-12-17-nouvelles-hebdomadaires-de-postgresql-13-decembre-2009 "
---



<p><strong>Revues</strong></p>

<p>Greg Smith reviewed the ACL patch for large objects.</p>

<p>Euler Taveira de Oliveira reviewed the EXPLAIN BUFFERS patch.</p>

<p>Jaime Casanova reviewed Zoltan Boszormenyi's ECPG patch to add SQLDA support.</p>

<p>Jaime Casanova reviewed Jeff Janes's XLogInsert patch and said he'd mark it, "ready for committer." Greg Smith's review was less positive.</p>

<p>ITAGAKI Takahiro reviewed Michael Paquier's patch to allow launching shell commands from pgbench.</p>

<p>Greg Smith reviewed the documentation in Zdenek Kotala's patch to add "init" as a pg_ctl option.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Add exclusion constraints, which generalize the concept of uniqueness to support any indexable commutative operator, not just equality. Two rows violate the exclusion constraint if "row1.col OP row2.col" is TRUE for each of the columns in the constraint. Jeff Davis, reviewed by Robert Haas.</li>

<li>Update time zone data files to tzdata release 2009s: DST law changes in Antarctica, Argentina, Bangladesh, Fiji, Novokuznetsk, Pakistan, Palestine, Samoa, Syria. Also historical corrections for Hong Kong.</li>

<li>Update release notes for releases 8.4.2, 8.3.9, 8.2.15, 8.1.19, 8.0.23, 7.4.27.</li>

<li>In pgsql/src/backend/executor/execMain.c, ensure that the result tuple of an EvalPlanQual cycle gets materialized before we zap the input tuple. Otherwise, pass-by-reference columns of the result slot are likely to contain just references to the input tuple, leading to big trouble if the pfree'd space is reused. Per trouble report from Jaime Casanova. This is a new bug in the recent rewrite of EvalPlanQual, so nothing to back-patch.</li>

<li>In pgsql/contrib/pgbench/pgbench.c, arrange to generate different random sequences in the different child processes of a pgbench run, when we are using -j &gt; 1 and are emulating threads via fork(). Otherwise the children all inherit the same random sequence state and produce the same random-number sequence. In the threaded case the different threads will share one RNG state, so they will produce different subsets of one sequence, which is maybe more correlated than a purist would like but will not be "the same". So we leave that case alone. First noticed by Takahiro Itagaki, and is also part of the explanation for the pgbench misbehavior recently reported by Jaime Casanova.</li>

<li>In pgsql/src/backend/utils/adt/varbit.c, fix integer-to-bit-string conversions to handle the first fractional byte correctly when the output bit width is wider than the given integer by something other than a multiple of 8 bits. This has been wrong since I first wrote that code for 8.0 :-( . Kudos to Roman Kononov for being the first to notice, though I didn't use his patch. Per bug #5237.</li>

<li>Fix a bug introduced when set-returning SQL functions were made inline-able: we have to cope with the possibility that the declared result rowtype contains dropped columns. This fails in 8.4, as per bug #5240. While at it, be more paranoid about inserting binary coercions when inlining. The pre-8.4 code did not really need to worry about that because it could not inline at all in any case where an added coercion could change the behavior of the function's statement. However, when inlining a SRF we allow sorting, grouping, and set-ops such as UNION. In these cases, modifying one of the targetlist entries that the sort/group/setop depends on could conceivably change the behavior of the function's statement --- so don't inline when such a case applies.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Update CVS documentation to be more current and add documentation about git mirror. Remove information about cvsup and documentation that's more about cvs than our use of cvs. Backpatch to 8.4 so we get the git information up on the website as soon as possible.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, replace broken link to custom local gettext package with one to the main GNU site for gettext.</li>

<li>Fix a couple of broken links to third-party sites.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, update size references in installation instructions to be a bit more up-to-date with current versions.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, add notes about updating disk and shared memory size information in the documentation when doing new major release.</li>

<li>Allow LDAP authentication to operate in search+bind mode, meaning it does a search for the user in the directory first, and then binds with the DN found for this user. This allows for LDAP logins in scenarios where the DN of the user cannot be determined simply by prefix and suffix, such as the case where different users are located in different containers. The old way of authentication can be significantly faster, so it's kept as an option. Robert Fleming and Magnus Hagander</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Translation updates.</li>

<li>Add init[db] option to pg_ctl. pg_ctl gets a new mode that runs initdb. Adjust the documentation a bit to not assume that initdb is the only way to run database cluster initialization. But don't replace initdb as the canonical way. Zdenek Kotala.</li>

<li>PL/Python array support. Support arrays as parameters and return values of PL/Python functions.</li>

</ul>

<p>Robert Haas a commité&nbsp;:</p>

<ul>

<li>In pgsql/contrib/fuzzystrmatch/fuzzystrmatch.c, fix levenshtein with costs. The previous code multiplied by the cost in only 3 of the 7 relevant locations. Marcin Mank, slightly adjusted by Robert Haas.</li>

<li>Export ExplainBeginOutput() and ExplainEndOutput() for auto_explain. Without these functions, anyone outside of explain.c can't actually use ExplainPrintPlan, because the ExplainState won't be initialized properly. The user-visible result of this was a crash when using auto_explain with the JSON output format. Report by Euler Taveira de Oliveira. Analysis by Tom Lane. Patch by Robert Haas.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>Tag 8.4.2, 8.3.9, 8.2.15, 8.1.19, 8.0.23, 7.4.27.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Add YAML to list of EXPLAIN formats. Greg Sabino Mullane, reviewed by Takahiro Itagaki.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Properly define ENABLE_THREAD_SAFETY in conflgure, per suggestion from Peter Eisentraut.</li>

</ul>

<p>ITAGAKI Takahiro a commité&nbsp;:</p>

<ul>

<li>Add large object access control. A new system catalog pg_largeobject_metadata manages ownership and access privileges of large objects. KaiGai Kohei, reviewed by Jaime Casanova.</li>

<li>Additional fixes for large object access control. Use pg_largeobject_metadata.oid instead of pg_largeobject.loid to enumerate existing large objects in pg_dump, pg_restore, and contrib modules.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in three more revision of the ACL patch for large objects per feedback from Greg Smith and ITAGAKI Takahiro. ITAGAKI Takahiro sent in two patches atop them to fix some issues with pg_restore and contrib.</li>

<li>ITAGAKI Takahiro sent in two more revisions of the VACUUM FULL patch.</li>

<li>ITAGAKI Takahiro sent in a patch to fix a bug in the auto_explain patch.</li>

<li>Michael Paquier sent in two more revisions of the patch to add shell commands to pgbench, per review from Greg Smith. ITAGAKI Takahiro sent in another one.</li>

<li>Magnus Hagander sent in a doc patch for CVS and git.</li>

<li>Zdenek Kotala sent in two more revisions of the pg_ctl init extension per review from Greg Smith.</li>

<li>ITAGAKI Takahiro sent in three more revisions of the EXPLAIN BUFFERS patch per feedback from Euler Taveira de Oliveira. Robert Haas sent in some doc and idiom changes atop those, then ITAGAKI Takahiro sent in yet another revision.</li>

<li>Fujii Masao sent in a patch for the January 2010 commitfest which adds XLOG UNLOGGED to how WALs are handled.</li>

<li>Marcin Mank sent in and Robert Haas reviewed and fixed a patch to fix a bug in Levenshtein distance calculation in contrib/fuzzystrmatch.</li>

<li>Bruce Momjian sent in a patch to install PL/pgsql by default. Tom Lane reviewed same.</li>

<li>Joachim Wieland sent in another revision of the patch to add payloads to LISTEN and NOTIFY.</li>

<li>Zdenek Kotala sent in a WIP patch to add dtrace probes for the memory manager. Bernd Helmle sent in an updated revision which splits it into executor and slru parts.</li>

<li>Robert Haas sent in a patch to fix an issue where ALTER TABLE ... RENAME COLUMN can change a VIEW.</li>

<li>Andreas Freund sent in another revision of the patch to make tsearch's parser more efficient.</li>

<li>Peter Eisentraut sent in a WIP patch for PL/Python3.</li>

<li>Robert Haas sent in a fix atop the EXPLAIN YAML patch.</li>

<li>Simon Riggs sent in another revision of the Hot Standby patch.</li>

<li>KaiGai Kohei sent in two reworked patched for an ACE (Access Control Extension) framework.</li>

<li>James Pye sent in another revision of the PL/Python3 patch.</li>

</ul>