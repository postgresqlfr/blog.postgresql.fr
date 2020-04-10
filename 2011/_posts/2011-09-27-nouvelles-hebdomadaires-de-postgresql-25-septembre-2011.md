---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 septembre 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-09-27-nouvelles-hebdomadaires-de-postgresql-25-septembre-2011 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve reporting of newlocale() failures in CREATE COLLATION. The standardized errno code for "no such locale" failures is ENOENT, which we were just reporting at face value, viz "No such file or directory". Per gripe from Thom Brown, this might confuse users, so add an errdetail message to clarify what it means. Also, report newlocale() failures as ERRCODE_INVALID_PARAMETER_VALUE rather than using errcode_for_file_access(), since newlocale()'s errno values aren't necessarily tied directly to file access failures. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37d4fd2b9d331076292201ab988fe54f09640850">http://git.postgresql.org/pg/commitdiff/37d4fd2b9d331076292201ab988fe54f09640850</a></li>

<li>Suppress "unused function" warning when not HAVE_LOCALE_T. Forgot to consider this case ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2562dcea811eb642e1c5442e1ede9fe268278157">http://git.postgresql.org/pg/commitdiff/2562dcea811eb642e1c5442e1ede9fe268278157</a></li>

<li>Make EXPLAIN ANALYZE report the numbers of rows rejected by filter steps. This provides information about the numbers of tuples that were visited but not returned by table scans, as well as the numbers of join tuples that were considered and discarded within a join plan node. There is still some discussion going on about the best way to report counts for outer-join situations, but I think most of what's in the patch would not change if we revise that, so I'm going to go ahead and commit it as-is. Documentation changes to follow (they weren't in the submitted patch either). Marko Tiikkaja, reviewed by Marc Cousin, somewhat revised by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1972723654947f70409716757aa83f3d93c8fab">http://git.postgresql.org/pg/commitdiff/f1972723654947f70409716757aa83f3d93c8fab</a></li>

<li>Update release notes for 9.1.1, 9.0.5, 8.4.9, 8.3.16, 8.2.22. Man, we fixed a lotta bugs since April. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f70f35031b4dea40ab4fa20638befc430e8ebaa">http://git.postgresql.org/pg/commitdiff/7f70f35031b4dea40ab4fa20638befc430e8ebaa</a></li>

<li>Stamp 8.2.22, 8.3.16, 8.4.9, 9.0.5, 9.1.1.</li>

<li>Update win32tzlist.pl for the new location of our Windows timezone map. I wasn't aware of this script till Magnus Hagander mentioned it just now ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14a183261a1f9b15dc73ad34295d118ada538b5b">http://git.postgresql.org/pg/commitdiff/14a183261a1f9b15dc73ad34295d118ada538b5b</a></li>

<li>Fix our mapping of Windows timezones for Central America. We were mapping "Central America Standard Time" to "CST6CDT", which seems entirely wrong, because according to the Olson timezone database noplace in Central America observes daylight savings time on any regular basis --- and certainly not according to the USA DST rules that are implied by "CST6CDT". (Mexico is an exception, but they can be disregarded since they have a separate timezone name in Windows.) So, map this zone name to plain "CST6", which will provide a fixed UTC offset. As written, this patch will also result in mapping "Central America Daylight Time" to CST6. I considered hacking things so that would still map to CST6CDT, but it seems it would confuse win32tzlist.pl to put those two names in separate entries. Since there's little evidence that any such zone name is used in the wild, much less that CST6CDT would be a good match for it, I'm not too worried about what we do with it. Per complaint from Pratik Chirania. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c5d837e69cf92e906acfa3000d848d4524beee9">http://git.postgresql.org/pg/commitdiff/4c5d837e69cf92e906acfa3000d848d4524beee9</a></li>

<li>Recognize self-contradictory restriction clauses for non-table relations. The constraint exclusion feature checks for contradictions among scan restriction clauses, as well as contradictions between those clauses and a table's CHECK constraints. The first aspect of this testing can be useful for non-table relations (such as subqueries or functions-in-FROM), but the feature was coded with only the CHECK case in mind so we were applying it only to plain-table RTEs. Move the relation_excluded_by_constraints call so that it is applied to all RTEs not just plain tables. With the default setting of constraint_exclusion this results in no extra work, but with constraint_exclusion = ON we will detect optimizations that we missed before (at the cost of more planner cycles than we expended before). Per a gripe from Gunnlaugur &THORN;&oacute;r Briem. Experimentation with his example also showed we were not being very bright about the case where constraint exclusion is proven within a subquery within UNION ALL, so tweak the code to allow set_append_rel_pathlist to recognize such cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7741dd6590073719688891898e85f0cb73453159">http://git.postgresql.org/pg/commitdiff/7741dd6590073719688891898e85f0cb73453159</a></li>

<li>Un-break compression of plain-text output format in pg_dump. pg_dump has historically understood -Z with no -F switch to mean that it should emit a gzip-compressed version of its plain text output. This got broken through a misunderstanding in the 9.1 patch that added directory output format. Restore the former behavior. Per complaint from Roger Niederland and diagnosis by Adrian Klaver. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23fe7a74777eba01835389263418cbe8a546e772">http://git.postgresql.org/pg/commitdiff/23fe7a74777eba01835389263418cbe8a546e772</a></li>

<li>Avoid unnecessary snapshot-acquisitions in BuildCachedPlan. I had copied-and-pasted a claim that we couldn't reach this point when dealing with utility statements, but that was a leftover from when the caller was required to supply a plan to start with. We now will go through here at least once when handling a utility statement, so it seems worth a check to see whether a snapshot is actually needed. (Note that analyze_requires_snapshot is quite a cheap test.) Per suggestion from Yamamoto Takashi. I don't think I believe that this resolves his reported assertion failure; but it's worth changing anyway, just to save a cycle or two. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5aa7a9fe68b2017362421bd853faeb8199a472c">http://git.postgresql.org/pg/commitdiff/d5aa7a9fe68b2017362421bd853faeb8199a472c</a></li>

<li>Fully const-ify PQconnectdbParams, PQconnectStartParams, and PQpingParams. The keywords and values arguments of these functions are more properly declared "const char * const *" than just "const char **". Lionel Elie Mamane, reviewed by Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a571bc233821023afdf8729a3ae5071b2343f65">http://git.postgresql.org/pg/commitdiff/2a571bc233821023afdf8729a3ae5071b2343f65</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix another bit of unlogged-table-induced breakage. Per bug #6205, reported by Abel Abraham Camarillo Ojeda. This isn't a particularly elegant fix, but I'm trying to minimize the chances of causing yet another round of breakage. Adjust regression tests to exercise this case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4893552e21b93149bb60f6204673cce855881a05">http://git.postgresql.org/pg/commitdiff/4893552e21b93149bb60f6204673cce855881a05</a></li>

<li>Add --{no-,}replication flags to createuser. Fujii Masao, reviewed by C&eacute;dric Villemain, with some doc changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b056b716e28562f5c53dfb143725294d44f14d38">http://git.postgresql.org/pg/commitdiff/b056b716e28562f5c53dfb143725294d44f14d38</a></li>

<li>Add missing brackets to chkselinuxenv. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e50b052a3bc5611dbf1a521ac7bc3611695a5f22">http://git.postgresql.org/pg/commitdiff/e50b052a3bc5611dbf1a521ac7bc3611695a5f22</a></li>

<li>Document some more apparently-harmless error messages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5e94ea52b002a049ffa52849f2958c096cc0f92">http://git.postgresql.org/pg/commitdiff/a5e94ea52b002a049ffa52849f2958c096cc0f92</a></li>

<li>Teach sepgsql about database labels. This is still a bit of a hack, but it's better than the old way, for sure. KaiGai Kohei, with one change by me to make it compile 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/291873c1554ceecc71a81c25aef4f1260c15c222">http://git.postgresql.org/pg/commitdiff/291873c1554ceecc71a81c25aef4f1260c15c222</a></li>

<li>Memory barrier support for PostgreSQL. This is not actually used anywhere yet, but it gets the basic infrastructure in place. It is fairly likely that there are bugs, and support for some important platforms may be missing, so we'll need to refine this as we go along. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c8eda6258805223fa412ab55a1f130fbc51afa0">http://git.postgresql.org/pg/commitdiff/0c8eda6258805223fa412ab55a1f130fbc51afa0</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f992679318ceea10f785e8653932f04b4003eef0">http://git.postgresql.org/pg/commitdiff/f992679318ceea10f785e8653932f04b4003eef0</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>synchronous_commit is an enum not a boolean. Jaime Casanova 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5e2f7b0546c0409323af262bdd17a8e19ca3836">http://git.postgresql.org/pg/commitdiff/e5e2f7b0546c0409323af262bdd17a8e19ca3836</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Note that sslmode=require verifies the CA if root cert is present This mode still exists for backwards compatibility, making sslmode=require the same as sslmode=verify-ca when the file is present, but not causing an error when it isn't. Per bug 6189, reported by Srinivas Aji 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33e81fdfaf6a8d92451cd780e5619ac5be0b44c9">http://git.postgresql.org/pg/commitdiff/33e81fdfaf6a8d92451cd780e5619ac5be0b44c9</a></li>

<li>Fix typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0126db2a469c7dbe540354f4ac6691a6c1e3b94e">http://git.postgresql.org/pg/commitdiff/0126db2a469c7dbe540354f4ac6691a6c1e3b94e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Expand pgrminclude to exclude use of macros CppAsString and CppConcat. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/337c0b03614c45516f2c3ec956405713bb264d54">http://git.postgresql.org/pg/commitdiff/337c0b03614c45516f2c3ec956405713bb264d54</a></li>

<li>Document pgrminclude limitations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84bbe57dc128df224614c61f88c350ee9ed92123">http://git.postgresql.org/pg/commitdiff/84bbe57dc128df224614c61f88c350ee9ed92123</a></li>

<li>In pgrminclude, document requirement to use pgcompinclude, and sort files so include removal is more predictable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2594ad74360c647edfd0645c4097d78ff83b4c3b">http://git.postgresql.org/pg/commitdiff/2594ad74360c647edfd0645c4097d78ff83b4c3b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jeff Davis sent in another revision of the patch to create range types.</li>

<li>Peter Geoghegan sent in three revisions of a patch to speed up comparators by inlining them.</li>

<li>Muhammad Asif sent in two revisions of a patch to fix an issue with BSD sockets on HP-UX.</li>

<li>Alexander Korotkov sent in two more revisions of the double sorting split patch.</li>

<li>Fujii Masao sent in another revision of the patch to allow doing a backup from a hot standby.</li>

<li>Pavel Stehule sent in another revision of the patch to remove unnecessary ccache search when an array variable is updated in PL/pgsql.</li>

<li>Yeb Havinga sent in a patch to refine dependency checking in EXTENSIONs.</li>

<li>Magnus Hagander sent in two revisions of a patch to make the TABLE command tab-complete both tables and views in psql. Before, it only tab-completed tables.</li>

<li>Magnus Hagander sent in a patch to add a call to posix_fadvise with POSIX_FADV_DONTNEED on all the files being read when doing a base backup, to help the kernel not to trash the filesystem cache.</li>

<li>Oleg Bartunov sent in another revision of the patch to enable space-partitioned GiST indexes.</li>

<li>Marti Raudsepp sent in another revision of the patch to cache stable expressions with constant arguments.</li>

<li>ITAGAKI Takahiro sent in a patch to allow COPY to support UTF8 files with a byte order mark (BOM).</li>

</ul>