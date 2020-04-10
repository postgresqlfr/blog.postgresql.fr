---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 janvier 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-01-08-nouvelles-hebdomadaires-de-postgresql-2-janvier-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Break up long line, per Leslie S Satenstein. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c7f0038d73d82ac64e19191ff94d59208534a4ea">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c7f0038d73d82ac64e19191ff94d59208534a4ea</a></li>

<li>Avoid unnecessary public struct declaration in slru.h. Instead, declare a public wrapper of the sole function using it for external callers, so that they don't have to always pass a NULL argument. Author: Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=55573990cac93d9f17a5c3ef19946415f8244903">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=55573990cac93d9f17a5c3ef19946415f8244903</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix ill-chosen use of "private" as an argument and struct field name. "private" is a keyword in C++, so this breaks the poorly-enforced policy that header files should be include-able in C++ code. Per report from Craig Ringer and some investigation with cpluspluscheck. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=275411912d96c160547a219cb3223efa3737f90d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=275411912d96c160547a219cb3223efa3737f90d</a></li>

<li>Tweak cpluspluscheck to avoid directly #include'ing gram.h. gram.h has ordering dependencies, which are satisfied when it's included from gramparse.h, but might not be if it's pulled in directly. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a977db6f1c3f399e5eaeb2514c72f38bdb8319e8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a977db6f1c3f399e5eaeb2514c72f38bdb8319e8</a></li>

<li>Fix failure of executor/hashjoin.h to compile standalone. Noted while experimenting with cpluspluscheck. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=37b61a69f30e0aefcb49a4ad64d6884cd96fe397">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=37b61a69f30e0aefcb49a4ad64d6884cd96fe397</a></li>

<li>Rearrange cpluspluscheck to check just one .h file at a time. This is slower than the original coding but avoids the problem of including files in an unpredictable order. Aside from being more trustworthy, we can get rid of some exclusions that were formerly made for what turn out to be ordering or re-inclusion problems. I also modified it to include libpq's exported files in the check. ecpg should be included as well, but I'm unclear on which ecpg .h files are meant to be included by clients. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c61f81b3196fe9757901e90e3fc1b30283d3995">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c61f81b3196fe9757901e90e3fc1b30283d3995</a></li>

<li>Rename the C functions bitand(), bitor() to bit_and(), bit_or(). This is to avoid use of the C++ keywords "bitand" and "bitor" in the header file utils/varbit.h. Note the functions' SQL-level names are not changed, only their C-level names. In passing, make some comments in varbit.c conform to project-standard layout. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=84fc571395f6986d912cda6c09826cb10caee7f0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=84fc571395f6986d912cda6c09826cb10caee7f0</a></li>

<li>Remove -fno-operator-names switch from cpluspluscheck. No longer needed now that bitand() and bitor() have been renamed. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f79136439f250f3eab6792870353a83ad993e71f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f79136439f250f3eab6792870353a83ad993e71f</a></li>

<li>Fix ill-advised placement of PGRES_COPY_BOTH enum value. It must be added at the end of the ExecStatusType enum to avoid ABI breakage compared to previous libpq versions. Noted by Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=81a530a65eb867a366828daa7a8757727214ecad">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=81a530a65eb867a366828daa7a8757727214ecad</a></li>

<li>Reclassify DEFAULT as a column_constraint item in the CREATE TABLE syntax. This is how it was documented originally, but several years ago somebody decided that DEFAULT isn't a type of constraint. Well, the grammar thinks it is. The documentation was wrong in two ways: it alleged that DEFAULT had to appear before any other kind of constraint, and it alleged that you can't prefix a DEFAULT clause with a "CONSTRAINT name" clause, when in fact you can. (The latter behavior probably isn't SQL-standard, but our grammar has always allowed it.) This patch responds to Fujii Masao's observation that the ALTER TABLE documentation mistakenly implied that you couldn't include DEFAULT in ALTER TABLE ADD COLUMN; though this isn't the way he proposed fixing it. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=31d2efaef507f280f4df895e1730a9ec8c31aa12">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=31d2efaef507f280f4df895e1730a9ec8c31aa12</a></li>

<li>Ooops, no DATE_IS_NOBEGIN/DATE_IS_NOEND in 8.3 or 8.2 ... I heard the siren call of git cherry-pick, but should have lashed myself to the mast. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f588805c882883fdb26f43ddb10ac5088517e72">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f588805c882883fdb26f43ddb10ac5088517e72</a></li>

<li>Avoid unexpected conversion overflow in planner for distant date values. The "date" type supports a wider range of dates than int64 timestamps do. However, there is pre-int64-timestamp code in the planner that assumes that all date values can be converted to timestamp with impunity. Fortunately, what we really need out of the conversion is always a double (float8) value; so even when the date is out of timestamp's range it's possible to produce a sane answer. All we need is a code path that doesn't try to force the result into int64. Per trouble report from David Rericha. Back-patch to all supported versions. Although this is surely a corner case, there's not much point in advertising a date range wider than timestamp's if we will choke on such values in unexpected places. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2ba1e994c4d17dc3d4b8d48d3933c96d09127e1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2ba1e994c4d17dc3d4b8d48d3933c96d09127e1</a></li>

<li>Improve pg_upgrade's checks for required executables. Don't insist on pg_dumpall and psql being present in the old cluster, since they are not needed. Do insist on pg_resetxlog being present (in both old and new), since we need it. Also check for pg_config, but only in the new cluster. Remove the useless attempt to call pg_config in the old cluster; we don't need to know the old value of --pkglibdir. (In the case of a stripped-down migration installation there might be nothing there to look at anyway, so any future change that might reintroduce that need would have to be considered carefully.) Per my attempts to build a minimal previous-version installation to support pg_upgrade. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=88c803457a53d2f83168519f0651e6dc258003b5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=88c803457a53d2f83168519f0651e6dc258003b5</a></li>

<li>Support RIGHT and FULL OUTER JOIN in hash joins. This is advantageous first because it allows us to hash the smaller table regardless of the outer-join type, and second because hash join can be more flexible than merge join in dealing with arbitrary join quals in a FULL join. For merge join all the join quals have to be mergejoinable, but hash join will work so long as there's at least one hashjoinable qual --- the others can be any condition. (This is true essentially because we don't keep per-inner-tuple match flags in merge join, while hash join can do so.) To do this, we need a has-it-been-matched flag for each tuple in the hashtable, not just one for the current outer tuple. The key idea that makes this practical is that we can store the match flag in the tuple's infomask, since there are lots of bits there that are of no interest for a MinimalTuple. So we aren't increasing the size of the hashtable at all for the feature. To write this without turning the hash code into even more of a pile of spaghetti than it already was, I rewrote ExecHashJoin in a state-machine style, similar to ExecMergeJoin. Other than that decision, it was pretty straightforward. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f4e4b3274317d9ce30de7e7e5b04dece7c4e1791">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f4e4b3274317d9ce30de7e7e5b04dece7c4e1791</a></li>

<li>Move symbols for ExecMergeJoin's state machine into nodeMergejoin.c. There's no reason for these values to be known anywhere else. After doing this, executor/execdefs.h is vestigial and can be removed. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7b464015577e6e7544a7aacf19ca55b271e740ac">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7b464015577e6e7544a7aacf19ca55b271e740ac</a></li>

<li>Invert and rename flag variable to improve code readability. No change in functionality. Per discussion with Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39c8dd66204ebfea9c1c6a7a9ca38b7419dbe8a1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39c8dd66204ebfea9c1c6a7a9ca38b7419dbe8a1</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update SGML docs describing the contents of the postmaster.pid file, per change to the file for pg_ctl. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0a023a14fc8df6edf7734763da3870897b9c1dd8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0a023a14fc8df6edf7734763da3870897b9c1dd8</a></li>

<li>Mark unaccent functions as STABLE, rather than defaulting to VOLATILE. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c0577c92a84cc477a88fe6868c16c4a7e3348b11">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c0577c92a84cc477a88fe6868c16c4a7e3348b11</a></li>

<li>Fix code to properly pull out shared memory key now that the postmaster.pid file is larger than in previous major versions. This is a bug introduced when I added lines to the file recently. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bada44a2a2ac6f33bd355c9acc0dfaa3d4890e54">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bada44a2a2ac6f33bd355c9acc0dfaa3d4890e54</a></li>

<li>Another fix for larger postmaster.pid files. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b4d3792daa6032016325ae50e80dfae12eb95820">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b4d3792daa6032016325ae50e80dfae12eb95820</a></li>

<li>Doc wording improvement: taken -&gt; accepted. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0be88f8739813067207314b3f88424ee8568d206">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0be88f8739813067207314b3f88424ee8568d206</a></li>

<li>Include the first valid listen address in pg_ctl to improve server start "wait" detection and add postmaster start time to help determine if the postmaster is actually using the specified data directory. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=30aeda439456d14e713a5693461bcd62035f1d9d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=30aeda439456d14e713a5693461bcd62035f1d9d</a></li>

<li>In pg_upgrade, rename "CLUSTERNAME" to "CLUSTER_NAME". 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f82b3e58f8876c330927b0e6562936c184a7bc6f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f82b3e58f8876c330927b0e6562936c184a7bc6f</a></li>

<li>In pg_upgrade, remove use of whichCluster, and just pass old/new cluster pointers, which simplifies the code. This was not possible in 9.0 because everything was in a single nested struct, but is possible now. Per suggestion from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6e6bee987ff4b6d650eec9f20fd477269d95e295">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6e6bee987ff4b6d650eec9f20fd477269d95e295</a></li>

<li>Furter pg_upgrade optimizations to reduce function call argument count. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=67c9e4442f2521ff2ad62aa4d409269ea684ac0a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=67c9e4442f2521ff2ad62aa4d409269ea684ac0a</a></li>

<li>Stamp copyrights for year 2011. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5d950e3b0c75d65dd09f8ca5f76cd429a0aabbdc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5d950e3b0c75d65dd09f8ca5f76cd429a0aabbdc</a></li>

<li>Add #include &lt;time.h&gt; to pg_ctl.c to fix compiler warning. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=92a73d219052ab4d393ebe7b5362aa7d414156e7">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=92a73d219052ab4d393ebe7b5362aa7d414156e7</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix list of functions that are restricted to superusers. Move the list of what's restricted to superusers into the table itself, so it doesn't get missed again. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=06004319be74709ae8684260f0f130e86128a9ed">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=06004319be74709ae8684260f0f130e86128a9ed</a></li>

<li>Add REPLICATION privilege for ROLEs. This privilege is required to do Streaming Replication, instead of superuser, making it possible to set up a Streaming Replication slave that doesn't have write permissions on the master. Superuser privileges do NOT override this check, so in order to use the default superuser account for replication it must be explicitly granted the REPLICATION permissions. This is backwards incompatible change, in the interest of higher default security. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b8aff8c192e2f313f90395d114c58a9ef84f97f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b8aff8c192e2f313f90395d114c58a9ef84f97f</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>No release notes update, just advance the date. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5f96409fd748e519d4a061d678e4552e66f0019">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5f96409fd748e519d4a061d678e4552e66f0019</a></li>

<li>Remove tabs in SGML. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=17cb9e8c984746d3bbdf0d94367a0c5a6e2b6aee">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=17cb9e8c984746d3bbdf0d94367a0c5a6e2b6aee</a></li>

<li>Allow casting a table's row type to the table's supertype if it's a typed table. This is analogous to the existing facility that allows casting a row type to a supertable's row type. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6a208aa40438652e2f3129a63af5d08ae53d9398">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6a208aa40438652e2f3129a63af5d08ae53d9398</a></li>

<li>Implement remaining fields of information_schema.sequences view. Add new function pg_sequence_parameters that returns a sequence's start, minimum, maximum, increment, and cycle values, and use that in the view. (bug #5662; design suggestion by Tom Lane) Also slightly adjust the view's column order and permissions after review of SQL standard. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39b88432968a2f4c01c20948f12bf9c8e388474d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39b88432968a2f4c01c20948f12bf9c8e388474d</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support unlogged tables. The contents of an unlogged table aren't WAL-logged; thus, they are not available on standby servers and are truncated whenever the database system enters recovery. Indexes on unlogged tables are also unlogged. Unlogged GiST indexes are not currently supported. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=53dbc27c62d8e1b6c5253feba04a5094cb8fe046">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=53dbc27c62d8e1b6c5253feba04a5094cb8fe046</a></li>

<li>Bump XLOG_PAGE_MAGIC. The unlogged tables patch (commit 53dbc27c62d8e1b6c5253feba04a5094cb8fe046, 2010-12-29) should have done this, since it changes the format of an XLOG_SMGR_CREATE record. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d2bc1c9907115f5773927febf823c8d7ae92155b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d2bc1c9907115f5773927febf823c8d7ae92155b</a></li>

<li>Minor wordsmithing. As suggested by Tom Lane, in response to a gripe from Leslie S Satenstein. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6600d5e91c754789002ed794c18cb856c190f58f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6600d5e91c754789002ed794c18cb856c190f58f</a></li>

<li>Fix pg_dump support for security labels on columns. Along the way, correct an erroneous comment. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7acf6cc4a1ae53fcd5b4a8a702c43a267f33ba3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d7acf6cc4a1ae53fcd5b4a8a702c43a267f33ba3</a></li>

<li>Basic foreign table support. Foreign tables are a core component of SQL/MED. This commit does not provide a working SQL/MED infrastructure, because foreign tables cannot yet be queried. Support for foreign table scans will need to be added in a future patch. However, this patch creates the necessary system catalog structure, syntax support, and support for ancillary operations such as COMMENT and SECURITY LABEL. Shigeru Hanada, heavily revised by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0d692a0dc9f0e532c67c577187fe5d7d323cb95b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0d692a0dc9f0e532c67c577187fe5d7d323cb95b</a></li>

<li>Fix typo. Noted by Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e657b55e661577cf664949bce78068e2922f594f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e657b55e661577cf664949bce78068e2922f594f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in a WIP patch to reduce the lock levels for ADD and DROP COLUMN.</li>

<li>Robert Haas sent in another patch implementing core SQL/MED functionality.</li>

<li>Magnus Hagander sent another revision of the patch to monitor recovery conflict.</li>

<li>Robert Haas sent in two revisions of a patch to rationalize the error reporting for unsupported operations on various types of database object.</li>

<li>Peter Geoghegan sent in a patch to change the canonical name of CTEs to CTE rather than "WITH queries."</li>

<li>Teodor Sigaev sent in a patch which reworks btree_gist to have a new API.</li>

<li>Jan Urbanski sent some Perl programs to generate error codes and documentation for same from a single source.</li>

<li>Karl Lehenbauer sent in three revisions of a patch to add table function support to PL/Tcl.</li>

<li>Joel Jacobson sent in three revisions of a patch to add a --split option to pg_dump.</li>

<li>Mark Kirkwood sent in two revisions of a patch intended to fix some infelicities in cmd_standby.</li>

<li>Robert Haas sent in another revision of the patch to future-proof relkind tests.</li>

<li>Jan Urbanski sent in a patch which prevents PL/PythonU from removing a function's arguments from its globals dict after calling it.</li>

<li>Dimitri Fontaine sent in a patch to implement extension upgrades and a follow-on patch to fix some infelicities in it.</li>

<li>Kevin Grittner sent in a patch to make use the SLRU infrastructure in SSI. SSI is how truly SERIALIZABLE isolation will be implemented.</li>

<li>Tatsuo Ishii sent in two more revisions of a patch to fix pg_terminate_backend().</li>

<li>Jan Urbanski sent in another flock of patches to refactor PL/PythonU.</li>

<li>Hannu Valtonen sent in a patch to support negative index values when fetching arrays.</li>

</ul>