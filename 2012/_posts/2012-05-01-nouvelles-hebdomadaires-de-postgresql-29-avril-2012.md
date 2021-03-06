---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 avril 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/05/01/Nouvelles-hebdomadaires-de-PostgreSQL-29-avril-2012"
---


<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-04/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

<li>La <em>PostgreSQL Conference Europe</em> 2012 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; sponsors est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-04/msg00018.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor improvements for CHECK NO INHERIT documentation. Fix typo spotted by Thom Brown, and improve wording in another area where Thom spotted a typo. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d435d57e1f8ec7e51d40722854252875d8cc6eb">http://git.postgresql.org/pg/commitdiff/9d435d57e1f8ec7e51d40722854252875d8cc6eb</a></li>

<li>Reduce hash size for compute_array_stats, compute_tsvector_stats. The size is only a hint, but a big hint chews up a lot of memory without apparently improving performance much. Analysis and patch by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85efd5f06593b80bbe01e541d78b336c1077213e">http://git.postgresql.org/pg/commitdiff/85efd5f06593b80bbe01e541d78b336c1077213e</a></li>

<li>Rearrange lazy_scan_heap to avoid visibility map race conditions. We must set the visibility map bit before releasing our exclusive lock on the heap page; otherwise, someone might clear the heap page bit before we set the visibility map bit, leading to a situation where the visibility map thinks the page is all-visible but it's really not. This problem has existed since 8.4, but it wasn't critical before we had index-only scans, since the worst case scenario was that the page wouldn't get vacuumed until the next scan_all vacuum. Along the way, a couple of minor, related improvements: (1) if we pause the heap scan to do an index vac cycle, release any visibility map page we're holding, since really long-running pins are not good for a variety of reasons; and (2) warn if we see a page that's marked all-visible in the visibility map but not on the page level, since that should never happen any more (it was allowed in previous releases, but not in 9.2). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ab9b2f3b79177e501a1ef90ed004cc68788abaf">http://git.postgresql.org/pg/commitdiff/7ab9b2f3b79177e501a1ef90ed004cc68788abaf</a></li>

<li>Lots of doc corrections. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d4b60f2f25bedee257aaf6f2f4ac77028629b87">http://git.postgresql.org/pg/commitdiff/5d4b60f2f25bedee257aaf6f2f4ac77028629b87</a></li>

<li>Another typographical correction. Noted by Guillaume Smet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4f06b70c9ac1473591d705990a8b601915ce4bd">http://git.postgresql.org/pg/commitdiff/e4f06b70c9ac1473591d705990a8b601915ce4bd</a></li>

<li>Casts to or from a domain type are ignored; warn and document. Prohibiting this outright would break dumps taken from older versions that contain such casts, which would create far more pain than is justified here. Per report by Jaime Casanova and subsequent discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ce7f18e92e9687308ed5d9e516eb7e2f0decadb">http://git.postgresql.org/pg/commitdiff/3ce7f18e92e9687308ed5d9e516eb7e2f0decadb</a></li>

<li>Remove prototype for nonexistent function. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca1e1a8da11d188df738ba67632c0805a00d3f27">http://git.postgresql.org/pg/commitdiff/ca1e1a8da11d188df738ba67632c0805a00d3f27</a></li>

<li>Prevent index-only scans from returning wrong answers under Hot Standby. The alternative of disallowing index-only scans in HS operation was discussed, but the consensus was that it was better to treat marking a page all-visible as a recovery conflict for snapshots that could still fail to see XIDs on that page. We may in the future try to soften this, so that we simply force index scans to do heap fetches in cases where this may be an issue, rather than throwing a hard conflict. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3424bff90f40532527b9cf4f2ad9eaff750682f7">http://git.postgresql.org/pg/commitdiff/3424bff90f40532527b9cf4f2ad9eaff750682f7</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix minor stylistic issue 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/225d9c063820237c979c918cf735bf98cbd566c0">http://git.postgresql.org/pg/commitdiff/225d9c063820237c979c918cf735bf98cbd566c0</a></li>

<li>entab: Improve makefile. A few simplifications and stylistic improvements, found while grepping around for makefile problems elsewhere. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8bd44677df7f5139afa6d6a2d8f5a92e2db54cba">http://git.postgresql.org/pg/commitdiff/8bd44677df7f5139afa6d6a2d8f5a92e2db54cba</a></li>

<li>Standardize indentation of XSL files. Predominant standard is two spaces, so adjust outliers to that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2856c51c86857f2df674a37609515d26311062e9">http://git.postgresql.org/pg/commitdiff/2856c51c86857f2df674a37609515d26311062e9</a></li>

<li>PL/Python: Improve error messages 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65ca8e68b7b21de7641d8ec9b7d4b9a2dd5e081d">http://git.postgresql.org/pg/commitdiff/65ca8e68b7b21de7641d8ec9b7d4b9a2dd5e081d</a></li>

<li>psql: Tab completion updates. Add/complete support for: ALTER DOMAIN / VALIDATE CONSTRAINT, ALTER DOMAIN / RENAME, ALTER DOMAIN / RENAME CONSTRAINT, ALTER TABLE / RENAME CONSTRAINT, 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc71ceab57d763f8f443346badd8e826b3b09e6e">http://git.postgresql.org/pg/commitdiff/cc71ceab57d763f8f443346badd8e826b3b09e6e</a></li>

<li>PL/Python: Accept strings in functions returning composite types.. Before 9.1, PL/Python functions returning composite types could return a string and it would be parsed using record_in. The 9.1 changes made PL/Python only expect dictionaries, tuples, or objects supporting getattr as output of composite functions, resulting in a regression and a confusing error message, as the strings were interpreted as sequences and the code for transforming lists to database tuples was used. Fix this by treating strings separately as before, before checking for the other types. The reason why it's important to support string to database tuple conversion is that trigger functions on tables with composite columns get the composite row passed in as a string (from record_out). Without supporting converting this back using record_in, this makes it impossible to implement pass-through behavior for these columns, as PL/Python no longer accepts strings for composite values. A better solution would be to fix the code that transforms composite inputs into Python objects to produce dictionaries that would then be correctly interpreted by the Python-&gt;PostgreSQL counterpart code. But that would be too invasive to backpatch to 9.1, and it is too late in the 9.2 cycle to attempt it. It should be revisited in the future, though. Reported as bug #6559 by Kirill Simonov. Jan Urba&#324;ski 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba3e4157a7d0c7e963a8b800a30b9789aea6dd96">http://git.postgresql.org/pg/commitdiff/ba3e4157a7d0c7e963a8b800a30b9789aea6dd96</a></li>

<li>PL/Python: Update list of supported environment variables 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05dd9fb18d6572f1467f995085b1de324d0ad028">http://git.postgresql.org/pg/commitdiff/05dd9fb18d6572f1467f995085b1de324d0ad028</a></li>

<li>Change return type of ExceptionalCondition to void and mark it noreturn. In ancient times, it was thought that this wouldn't work because of TrapMacro/AssertMacro, but changing those to use a comma operator appears to work without compiler warnings. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81107282a5ff1490a0a4ded193cbc61e69cda537">http://git.postgresql.org/pg/commitdiff/81107282a5ff1490a0a4ded193cbc61e69cda537</a></li>

<li>Simplify makefile rule. Instead of writing out the .c -&gt; .o rule, use the default one, so that dependency tracking can be used. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2227bb9c948d2dcc167d414630ed3bae7f31db83">http://git.postgresql.org/pg/commitdiff/2227bb9c948d2dcc167d414630ed3bae7f31db83</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Another trivial comment-typo fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9873001e6d1177d543a2e46273e738d726670f1f">http://git.postgresql.org/pg/commitdiff/9873001e6d1177d543a2e46273e738d726670f1f</a></li>

<li>Fix edge-case behavior of pg_next_dst_boundary(). Due to rather sloppy thinking (on my part, I'm afraid) about the appropriate behavior for boundary conditions, pg_next_dst_boundary() gave undefined, platform-dependent results when the input time is exactly the last recorded DST transition time for the specified time zone, as a result of fetching values one past the end of its data arrays. Change its specification to be that it always finds the next DST boundary *after* the input time, and adjust code to match that. The sole existing caller, DetermineTimeZoneOffset, doesn't actually care about this distinction, since it always uses a probe time earlier than the instant that it does care about. So it seemed best to me to change the API to make the result=1 and result=0 cases more consistent, specifically to ensure that the "before" outputs always describe the state at the given time, rather than hacking the code to obey the previous API comment exactly. Per bug #6605 from Sergey Burladyan. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c62b8eaae11aaa69a2b71bc63f9f78ca72eb412c">http://git.postgresql.org/pg/commitdiff/c62b8eaae11aaa69a2b71bc63f9f78ca72eb412c</a></li>

<li>Fix planner's handling of RETURNING lists in writable CTEs. setrefs.c failed to do "rtoffset" adjustment of Vars in RETURNING lists, which meant they were left with the wrong varnos when the RETURNING list was in a subquery. That was never possible before writable CTEs, of course, but now it's broken. The executor fails to notice any problem because ExecEvalVar just references the ecxt_scantuple for any normal varno; but EXPLAIN breaks when the varno is wrong, as illustrated in a recent complaint from Bartosz Dmytrak. Since the eventual rtoffset of the subquery is not known at the time we are preparing its plan node, the previous scheme of executing set_returning_clause_references() at that time cannot handle this adjustment. Fortunately, it turns out that we don't really need to do it that way, because all the needed information is available during normal setrefs.c execution; we just have to dig it out of the ModifyTable node. So, do that, and get rid of the kluge of early setrefs processing of RETURNING lists. (This is a little bit of a cheat in the case of inherited UPDATE/DELETE, because we are not passing a "root" struct that corresponds exactly to what the subplan was built with. But that doesn't matter, and anyway this is less ugly than early setrefs processing was.) Back-patch to 9.1, where the problem became possible to hit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fa82c980935ef4aee18fabe8da20ae2198b052a">http://git.postgresql.org/pg/commitdiff/9fa82c980935ef4aee18fabe8da20ae2198b052a</a></li>

<li>Modify create_index regression test to avoid intermittent failures. We have been seeing intermittent buildfarm failures due to a query sometimes not using an index-only scan plan, because a background auto-ANALYZE prevented the table's all-visible bits from being set immediately, thereby causing the estimated cost of an index-only scan to go up considerably. Adjust the test case so that a bitmap index scan is preferred instead, which serves equally well for the purpose the test case is actually meant for. (Of course, it would be better to eliminate the interference from auto-ANALYZE, but I see no low-risk way to do that, so any such fix will have to be left for 9.3 or later.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6d5f67b5b98b1685f9158e9d00a726afb2ae789">http://git.postgresql.org/pg/commitdiff/d6d5f67b5b98b1685f9158e9d00a726afb2ae789</a></li>

<li>Fix oversight in recent parameterized-path patch. bitmap_scan_cost_est() has to be able to cope with a BitmapOrPath, but I'd taken a shortcut that didn't work for that case. Noted by Heikki. Add some regression tests since this area is evidently under-covered. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c85aa39fc08df44e1ce67e651bda4cf7e331580">http://git.postgresql.org/pg/commitdiff/7c85aa39fc08df44e1ce67e651bda4cf7e331580</a></li>

<li>Improve documentation around historical calendar rules. Get rid of section 8.5.6 (Date/Time Internals), which appears to confuse people more than it helps, and anyway discussion of Postgres' internal datetime calculation methods seems pretty out of place here. Instead, make datatype.sgml just say that we follow the Gregorian calendar (a bit of specification not previously present anywhere in that chapter :-() and link to the History of Units appendix for more info. Do some mild editorialization on that appendix, too, to make it clearer that we are following proleptic Gregorian calendar rules rather than anything more historically accurate. Per a question from Florence Cousin and subsequent discussion in pgsql-docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92df2203437603d40417fe711c3cb7066ac4fdf5">http://git.postgresql.org/pg/commitdiff/92df2203437603d40417fe711c3cb7066ac4fdf5</a></li>

<li>Fix syslogger's rotation disable/re-enable logic. If it fails to open a new log file, the syslogger assumes there's something wrong with its parameters (such as log_directory), and stops attempting automatic time-based or size-based log file rotations. Sending it SIGHUP is supposed to start that up again. However, the original coding for that was really bogus, involving clobbering a couple of GUC variables and hoping that SIGHUP processing would restore them. Get rid of that technique in favor of maintaining a separate flag showing we've turned rotation off. Per report from Mark Kirkwood. Also, the syslogger will automatically attempt to create the log_directory directory if it doesn't exist, but that was only happening at startup. For consistency and ease of use, it should do the same whenever the value of log_directory is changed by SIGHUP. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/537b26695389ae67adc4fbbe04254bc527a11128">http://git.postgresql.org/pg/commitdiff/537b26695389ae67adc4fbbe04254bc527a11128</a></li>

<li>Fix printing of whole-row Vars at top level of a SELECT targetlist. Normally whole-row Vars are printed as "tabname.*". However, that does not work at top level of a targetlist, because per SQL standard the parser will think that the "*" should result in column-by-column expansion; which is not at all what a whole-row Var implies. We used to just print the table name in such cases, which works most of the time; but it fails if the table name matches a column name available anywhere in the FROM clause. This could lead for instance to a view being interpreted differently after dump and reload. Adding parentheses doesn't fix it, but there is a reasonably simple kluge we can use instead: attach a no-op cast, so that the "*" isn't syntactically at top level anymore. This makes the printing of such whole-row Vars a lot more consistent with other Vars, and may indeed fix more cases than just the reported one; I'm suspicious that cases involving schema qualification probably didn't work properly before, either. Per bug report and fix proposal from Abbas Butt, though this patch is quite different in detail from his. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6f7d4fdc516b2b597f8c2cd011c41c2729dab45">http://git.postgresql.org/pg/commitdiff/d6f7d4fdc516b2b597f8c2cd011c41c2729dab45</a></li>

<li>Clear I/O timing counters after sending them to the stats collector. This oversight caused the reported times to accumulate in an O(N2) fashion the longer a backend runs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdbad241f41362aaf09f913722a541e04e048742">http://git.postgresql.org/pg/commitdiff/cdbad241f41362aaf09f913722a541e04e048742</a></li>

<li>Adjust timing units in pg_stat_statements. Display total time and I/O timings in milliseconds, for consistency with the units used for timings in the core statistics views. The columns remain of float8 type, so that sub-msec precision is available. (At some point we will probably want to convert the core views to use float8 type for the same reason, but this patch does not touch that issue.) This is a release-note-requiring change in the meaning of the total_time column. The I/O timing columns are new as of 9.2, so there is no compatibility impact from redefining them. Do some minor copy-editing in the documentation, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93f94e356d47ea20ca7c2fcb65cbb746049fe4d1">http://git.postgresql.org/pg/commitdiff/93f94e356d47ea20ca7c2fcb65cbb746049fe4d1</a></li>

<li>Make a copy-editing pass over the new documentation for statistics views. Fix a bunch of typos, improve markup, make wording more uniform, rearrange some material. No substantive changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aebe989477ac5a9f7b59ae464ec68ec45975ed3f">http://git.postgresql.org/pg/commitdiff/aebe989477ac5a9f7b59ae464ec68ec45975ed3f</a></li>

<li>Further editorialization on the new documentation for statistics views. Get rid of the per-column documentation of underlying functions, which did far more to clutter the view descriptions than it did to be helpful, and was rather incomplete and typo-ridden anyway. Instead suggest that people consult the definitions of the standard views to see the underlying functions. The older functions for obtaining individual facts about backends are now somewhat obsoleted by pg_stat_get_activity, which means that they are not documented by any standard view. So I put that information into a separate table. (Maybe we should just deprecate them instead?) In passing, fix a couple more documentation errors. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f2b0893871cce1ffb77ac7f13b3fba227e6f11f">http://git.postgresql.org/pg/commitdiff/5f2b0893871cce1ffb77ac7f13b3fba227e6f11f</a></li>

<li>Rename track_iotiming GUC to track_io_timing. This spelling seems significantly more readable to me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/309c64745ea145d7c731e1fe610631b2b84e7e88">http://git.postgresql.org/pg/commitdiff/309c64745ea145d7c731e1fe610631b2b84e7e88</a></li>

<li>Rename I/O timing statistics columns to blk_read_time and blk_write_time. This seems more consistent with the pre-existing choices for names of other statistics columns. Rename assorted internal identifiers to match. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1dd89eadcd2648d7ca0baed3c7af16a04eb1aa26">http://git.postgresql.org/pg/commitdiff/1dd89eadcd2648d7ca0baed3c7af16a04eb1aa26</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add options to git_changelog for use in major release note creation: --details-after --master-only --oldest-first 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/993ce4e6c9f23d385d60f1fd4aee01bdf050de24">http://git.postgresql.org/pg/commitdiff/993ce4e6c9f23d385d60f1fd4aee01bdf050de24</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Zoltan Boszormenyi sent in another version of the patches to create a lock timeout framework and use same.</li>

<li>Alexander Korotkov sent in a patch to convert from pg_wchar to multibyte, and Erik Rijkers followed up with some regression tests for same.</li>

<li>KaiGai Kohei sent in another revision of the patch to add generic extra daemons.</li>

<li>Noah Misch sent in a patch to fix an issue where psql does not include a row count when auto-expanded output (\x auto) is set.</li>

<li>Kevin Grittner sent in a patch to fix an issue where setting defautl_transaction_isolation to serializable (SSI) broke Hot Standbys.</li>

<li>Robert Haas sent in a patch to modify "smart" shutdown mode to disconnect sessions that are not in a transaction (or as soon as they no longer are) but leaves in-progress transactions alone;</li>

<li>Noah Misch sent in a patch to allow TEMP tables on a hot standby.</li>

</ul>