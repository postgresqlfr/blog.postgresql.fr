---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 novembre 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/11/24/Nouvelles-hebdomadaires-de-PostgreSQL-21-novembre-2010"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>DiffKit 0.8.2, un outil de comparaison de tables avec support de PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.diffkit.org">http://www.diffkit.org</a></li>

<li>PostgreDAC 2.6.0, un <em>builder</em> Delphi/C++ pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/download/">http://microolap.com/products/connectivity/postgresdac/download/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; projets de PostgreSQLFr a &eacute;t&eacute; lanc&eacute;. Les projets doivent concerner PostgreSQL et la communaut&eacute; francophone. Mail &agrave; appel-projets-2010 (AT) postgresql (DOT) fr. 

<a target="_blank" href="http://www.postgresql.fr/appel_a_projets_2010:appel">http://www.postgresql.fr/appel_a_projets_2010:appel</a></li>

<li>Les inscriptions pour le PGDay.EU 2010 tenu du 6 au 8 d&eacute;cembre &agrave; Stuttgart sont ouvertes [ndt: <b>jusqu'au 26 novembre</b>]&nbsp;: 

<a target="_blank" href="http://2010.pgday.eu/register">http://2010.pgday.eu/register</a></li>

<li>Pour les "l&egrave;ves-t&ocirc;ts", les inscriptions au PGDay.IT, qui aura lieu le 10 d&eacute;cembre 2010 &agrave; Rome, sont ouvertes et le programme a &eacute;t&eacute; publi&eacute;&nbsp;: 

<a target="_blank" href="http://2010.pgday.it/">http://2010.pgday.it/</a></li>

<li>Le FOSDEM est l'un des plus grand &eacute;v&eacute;nements autour du Libre et de l'Open Source&nbsp;; il a lieu annuellement &agrave; Bruxelles et rassemble environ 4000 personnes. La prochaine &eacute;dition est programm&eacute;e pour les 5 &amp; 6 f&eacute;vrier 2011. Envoyez vos propositions &agrave; l'adresse fosdem AT postgresql POINT eu. 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html">http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html</a></li>

<li>Le PGDay est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011. Proposez vos conf&eacute;rences sur pgday-submissions (AT) googlegroups (DOT) com.</li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20101121">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<ul>

<li>Steve Singer reviewed the patch to extend ALTER TABLE to allow creating a primary key from an extant index, suggesting some changes in the documentation and error handling.</li>

<li>Robert Haas reviewed the KNN-GiST patch, pointing out places where it re-uses machinery with now-misleading names, along with some cases it doesn't handle.</li>

<li>Robert Haas reviewed the patch for ALTER OBJECT ... SET SCHEMA, noting a lack of regression tests and tab completion support for psql.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid spurious Hot Standby conflicts from btree delete records. Similar conflicts were already avoided for related record types. Massive over-caution resulted in a usability bug. Clear theoretical basis for doing this is now confirmed by me. Request to remove from Heikki (twice), over-caution by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52010027efc8757fdd830a4d0113763a501259bc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52010027efc8757fdd830a4d0113763a501259bc</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix copy-and-pasteo. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ae4b17edeebc6670ba222a8cfbb1658d02203d29">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ae4b17edeebc6670ba222a8cfbb1658d02203d29</a></li>

<li>Add pg_describe_object function. This function is useful to obtain textual descriptions of objects as stored in pg_depend. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6cc2deb86e9183262493a6537700ee305fb3e096">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6cc2deb86e9183262493a6537700ee305fb3e096</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix copy-and-pasteo a little more completely. copydir.c is no longer in src/port 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=20cf8ae478c2712d4c211b49868e334357f05356">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=20cf8ae478c2712d4c211b49868e334357f05356</a></li>

<li>Remove outdated comments from the regression test files. Since 2004, int2 and int4 operators do detect overflow; this was fixed by commit 4171bb869f234281a13bb862d3b1e577bf336242. Extracted from a larger patch by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8d70ed84ba577abf9e985518024fb92e2081dac9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8d70ed84ba577abf9e985518024fb92e2081dac9</a></li>

<li>Add new buffers_backend_fsync field to pg_stat_bgwriter. This new field counts the number of times that a backend which writes a buffer out to the OS must also fsync() it. This happens when the bgwriter fsync request queue is full, and is generally detrimental to performance, so it's good to know when it's happening. Along the way, log a new message at level DEBUG1 whenever we fail to hand off an fsync, so that the problem can also be seen in examination of log files (if the logging level is cranked up high enough). Greg Smith, with minor tweaks by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3134d8863e8473e3ed791e27d484f9e548220411">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3134d8863e8473e3ed791e27d484f9e548220411</a></li>

<li>Document the dummy_seclabel contrib module. KaiGai Kohei, with editing and markup fixes by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=45768d10e3abd513b4c959efeb5907798f2fac3f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=45768d10e3abd513b4c959efeb5907798f2fac3f</a></li>

<li>Minor corrections to dummy_seclabel documentation. Problems noted by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1fc2d60d8c9d8096373e94a8f8c9b28d2082b7d3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1fc2d60d8c9d8096373e94a8f8c9b28d2082b7d3</a></li>

<li>Speed up conversion of signed integers to C strings. A hand-coded implementation turns out to be much faster than calling printf(). In passing, add a few more regresion tests. Andres Freund, with assorted, mostly cosmetic changes. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fc115b2e981f8c63165ca86a23215380a3fda66">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fc115b2e981f8c63165ca86a23215380a3fda66</a></li>

<li>Attempt to fix breakage caused by signed integer conversion patch. Use INT_MIN rather than INT32_MIN as we do elsewhere in the code, and try to work around nonexistence of INT64_MIN if necessary. Adjust the new regression tests to something hopefully saner, per observation by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=815810ed315a6d21203ec75a11f742f5ed655418">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=815810ed315a6d21203ec75a11f742f5ed655418</a></li>

<li>Update int8-exp-three-digits.out to match new contents of int8.out. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e8bf683fbee935181e207d7171630194ed01f6a1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e8bf683fbee935181e207d7171630194ed01f6a1</a></li>

<li>Expose quote_literal_cstr() from core. This eliminates the need for inefficient implementions of this functionality in both contrib/dblink and contrib/tablefunc, so remove them. The upcoming patch implementing an in-core format() function will also require this functionality. In passing, add some regression tests. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4343c0e546b216ab38a3397a4f0f7476d557b352">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4343c0e546b216ab38a3397a4f0f7476d557b352</a></li>

<li>Minor cleanup of indxpath.c. Eliminate some superfluous notational complexity around match_clause_to_indexcol(), and rip out the DoneMatchingIndexKeys crock. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=99bc012d5198bdfd2aa67336f645dbf887bb0ec9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=99bc012d5198bdfd2aa67336f645dbf887bb0ec9</a></li>

<li>Add new SQL function, format(text). Currently, three conversion format specifiers are supported: %s for a string, %L for an SQL literal, and %I for an SQL identifier. The latter two are deliberately designed not to overlap with what sprintf() already supports, in case we want to add more of sprintf()'s functionality here later. Patch by Pavel Stehule, heavily revised by me. Reviewed by Jeff Janes and, in earlier versions, by Itagaki Takahiro and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=750487077802861a2accd94164166747ec311fa4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=750487077802861a2accd94164166747ec311fa4</a></li>

<li>Bump catversion. Should have done this as part of format(text) patch. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=506070be34dcdf35fd91c12c6745c745716de1d4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=506070be34dcdf35fd91c12c6745c745716de1d4</a></li>

<li>Put back accidentally-deleted quote_literal() regression tests. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=95dacf85939b213584ae5d50cbddf87eb687e582">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=95dacf85939b213584ae5d50cbddf87eb687e582</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix aboriginal mistake in plpython's set-returning-function support. We must stay in the function's SPI context until done calling the iterator that returns the set result. Otherwise, any attempt to invoke SPI features in the python code called by the iterator will malfunction. Diagnosis and patch by Jan Urbanski, per bug report from Jean-Baptiste Quenot. Back-patch to 8.2; there was no support for SRFs in previous versions of plpython. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=add0ea88e7722b48d1f3a7c38e3cfd7f1e854674">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=add0ea88e7722b48d1f3a7c38e3cfd7f1e854674</a></li>

<li>Make TRUNCATE ... RESTART IDENTITY restart sequences transactionally. In the previous coding, we simply issued ALTER SEQUENCE RESTART commands, which do not roll back on error. This meant that an error between truncating and committing left the sequences out of sync with the table contents, with potentially bad consequences as were noted in a Warning on the TRUNCATE man page. To fix, create a new storage file (relfilenode) for a sequence that is to be reset due to RESTART IDENTITY. If the transaction aborts, we'll automatically revert to the old storage file. This acts just like a rewriting ALTER TABLE operation. A penalty is that we have to take exclusive lock on the sequence, but since we've already got exclusive lock on its owning table, that seems unlikely to be much of a problem. The interaction of this with usual nontransactional behaviors of sequence operations is a bit weird, but it's hard to see what would be completely consistent. Our choice is to discard cached-but-unissued sequence values both when the RESTART is executed, and at rollback if any; but to not touch the currval() state either time. In passing, move the sequence reset operations to happen before not after any AFTER TRUNCATE triggers are fired. The previous ordering was not logically sensible, but was forced by the need to minimize inconsistency if the triggers caused an error. Transactional rollback is a much better solution to that. Patch by Steve Singer, rather heavily adjusted by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=511e902b51c2a1c0d012426ceb6486b1202120f3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=511e902b51c2a1c0d012426ceb6486b1202120f3</a></li>

<li>Further fallout from the MergeAppend patch. Fix things so that top-N sorting can be used in child Sort nodes of a MergeAppend node, when there is a LIMIT and no intervening joins or grouping. Actually doing this on the executor side isn't too bad, but it's a bit messier to get the planner to cost it properly. Per gripe from Robert Haas. In passing, fix an oversight in the original top-N-sorting patch: query_planner should not assume that a LIMIT can be used to make an explicit sort cheaper when there will be grouping or aggregation in between. Possibly this should be back-patched, but I'm not sure the mistake is serious enough to be a real problem in practice. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6fbc323c8042303a737028f9da7616896bccc517">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6fbc323c8042303a737028f9da7616896bccc517</a></li>

<li>Dept of second thoughts: don't try to push LIMIT below a SRF. If we have Limit-&gt;Result-&gt;Sort, the Result might be projecting a tlist that contains a set-returning function. If so, it's possible for the SRF to sometimes return zero rows, which means we could need to fetch more than N rows from the Sort in order to satisfy LIMIT N. So top-N sorting cannot be used in this scenario. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=48c348f86ce09c668af7cf271757c3f156f28344">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=48c348f86ce09c668af7cf271757c3f156f28344</a></li>

<li>Improve plpgsql's error reporting for no-such-column cases. Given a column reference foo.bar, where there is a composite plpgsql variable foo but it doesn't contain a column bar, the pre-9.0 coding would immediately throw a "record foo has no field bar" error. In 9.0 the parser hook instead falls through to let the core parser see if it can resolve the reference. If not, you get a complaint about "missing FROM-clause entry for table foo", which while in some sense correct isn't terribly helpful. Complicate things a bit so that we can throw the old error message if neither the core parser nor the hook are able to resolve the column reference, while not changing the behavior in any other case. Per bug #5757 from Andrey Galkin. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe24d781612700646bfb3e08925e34c43926f9df">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe24d781612700646bfb3e08925e34c43926f9df</a></li>

<li>Improve relation width estimation for subqueries. As per the ancient comment for set_rel_width, it really wasn't much good for relations that aren't plain tables: it would never find any stats and would always fall back on datatype-based estimates, which are often pretty silly. Fix that by copying up width estimates from the subquery planning process. At some point we might want to do this for CTEs too, but that would be a significantly more invasive patch because the sub-PlannerInfo is no longer accessible by the time it's needed. I refrained from doing anything about that, partly for fear of breaking the unmerged CTE-related patches. In passing, also generate less bogus width estimates for whole-row Vars. Per a gripe from Jon Nelson. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0f61d4dd1b4f95832dcd81c9688dac56fd6b5687">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0f61d4dd1b4f95832dcd81c9688dac56fd6b5687</a></li>

<li>Fix leakage of cost_limit when multiple autovacuum workers are active. When using default autovacuum_vac_cost_limit, autovac_balance_cost relied on VacuumCostLimit to contain the correct global value ... but after the first time through in a particular worker process, it didn't, because we'd trashed it in previous iterations. Depending on the state of other autovac workers, this could result in a steady reduction of the effective cost_limit setting as a particular worker processed more and more tables, causing it to go slower and slower. Spotted by Simon Poole (bug #5759). Fix by saving and restoring the GUC variables in the loop in do_autovacuum. In passing, improve a few comments. Back-patch to 8.3 ... the cost rebalancing code has been buggy since it was put in. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b58c25055ef6d7097618c680f6768689a110d529">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b58c25055ef6d7097618c680f6768689a110d529</a></li>

<li>Assorted further cleanup for integer-conversion patch. Avoid depending on LL notation, which is likely to not work in pre-C99 compilers; don't pointlessly use INT32_MIN/INT64_MIN in code that has the numerical value hard-wired into it anyway; remove some gratuitous style inconsistencies between pg_ltoa and pg_lltoa; fix int2 test case so it actually tests int2. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d1d8462d99620cd4384d77b0908d50a49c38eb31">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d1d8462d99620cd4384d77b0908d50a49c38eb31</a></li>

<li>Further cleanup of indxpath logic related to IndexOptInfo.opfamily array. We no longer need the terminating zero entry in opfamily[], so get rid of it. Also replace assorted ad-hoc looping logic with simple for and foreach constructs. This code is now noticeably more readable than it was an hour ago; credit to Robert for seeing that it could be simplified. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=89a368418c56125f79f46a81229e824d519f9718">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=89a368418c56125f79f46a81229e824d519f9718</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>The GiST scan algorithm uses LSNs to detect concurrent pages splits, but temporary indexes are not WAL-logged. We used a constant LSN for temporary indexes, on the assumption that we don't need to worry about concurrent page splits in temporary indexes because they're only visible to the current session. But that assumption is wrong, it's possible to insert rows and split pages in the same session, while a scan is in progress. For example, by opening a cursor and fetching some rows, and INSERTing new rows before fetching some more. Fix by generating fake increasing LSNs, used in place of real LSNs in temporary GiST indexes. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2edc5cd493ce3d7834026970e9d3cd00e203f51a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2edc5cd493ce3d7834026970e9d3cd00e203f51a</a></li>

<li>Remove unused parameter. Patch by Shigeru Hanada. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ecf70b916b480ce26c710942f9111115d9e63e88">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ecf70b916b480ce26c710942f9111115d9e63e88</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Send paramHandle to subprocesses as 64-bit on Win64. The handle to the shared memory segment containing startup parameters was sent as 32-bit even on 64-bit systems. Since HANDLEs appear to be allocated sequentially this shouldn't be a problem until we reach 232 open handles in the postmaster, but a 64-bit value should be sent across as 64-bit, and not zero out the top 32 bits. Noted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4acf99b2f3bb665d2febef183ede5f08b8f7545d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4acf99b2f3bb665d2febef183ede5f08b8f7545d</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Require VALUE keyword when extending an enum type. Based on a patch from Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7fcf68e8632e757a50352c9567bb630ed285201">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b7fcf68e8632e757a50352c9567bb630ed285201</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Additional fixes for parallel make. Add some additional dependencies to constrain the build order to prevent parallel make from failing. In the case of src/Makefile, this is likely to be too complicated to be worth maintaining, so just add .NOTPARALLEL to get the old for-loop-like behavior. More fine-tuning might be necessary for some platforms or configurations. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cfad144f894b306fc300f5d03ea52a32d4624db0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cfad144f894b306fc300f5d03ea52a32d4624db0</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alexander Korotkov sent in two revisions of a patch to fix the picksplit function for contrib/seg.</li>

<li>Robert Haas sent in another revision of the patch to add custom code for int(32|64)-to-text conversions. These are much faster than the older code.</li>

<li>Peter Eisentraut sent in a patch intended to fix some misbehavior in parallel make on Darwin.</li>

<li>Peter Eisentraut sent in another revision of the patch to add per-column collation.</li>

<li>Greg Sabino Mullane sent in a patch to fix an infelicity with the clang compiler, which doesn't like to see gcc directives.</li>

<li>Robert Haas sent in another set of WIP patches to implement unlogged tables.</li>

<li>Heikki Linnakangas sent in a patch to rewrite how GiST does its insertions for better behavior with WAL logging.</li>

<li>KaiGai Kohei sent in another revision of the patch to allow switching security labels.</li>

<li>Alvaro Herrera sent in a patch to add a describe_object function.</li>

<li>ITAGAKI Takahiro sent in another WIP patch to implement MULTISETs and add some new functions for ARRAYs.</li>

<li>Fujii Masao sent in a patch to fix the documentation of libpq for synchronous replication.</li>

<li>Marko (johto) Tiikkaja sent in a patch to have EXPLAIN ANALYZE show the nubmer of rows a plan qual filtered in from a node's input.</li>

<li>Pavel Stehule sent in another revision of the patch to add formatting functions.</li>

<li>Shigeru HANADA sent in another revision of the SQL/MED patch.</li>

<li>Bruce Momjian sent in another revision of the patch to fix some errors in libpq's handling of host and addresses for IPv4 and IPv6.</li>

<li>Radoslaw Smogura sent in an experimental JDBC driver.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add ALTER OBJECT ... SET SCHEMA to those objects where this is not already possible.</li>

<li>Joachim Wieland sent in two more patches in support of parallel pg_dump, one for modular I/O compression in pg_dump, the other for a directory-structured dump format.</li>

</ul>