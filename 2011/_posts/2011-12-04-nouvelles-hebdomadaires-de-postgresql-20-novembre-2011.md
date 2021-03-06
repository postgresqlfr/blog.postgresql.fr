---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 novembre 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/12/04/Nouvelles-hebdomadaires-de-PostgreSQL-20-novembre-2011"
---


<p>FOSDEM 2012 - PostgreSQL Devroom: l'appel &agrave; conf&eacute;renciers est ouvert jusqu'au 20 d&eacute;cembre 2011&nbsp;: 

<a target="_blank" href="https://www.postgresql.eu/events/callforpapers/fosdem2012/">https://www.postgresql.eu/events/callforpapers/fosdem2012/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>plpgsql_lint beta&nbsp;: 

<a target="_blank" href="https://github.com/okbob/plpgsql_lint">https://github.com/okbob/plpgsql_lint</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me &eacute;dition du PGDay italien (PGDay.IT 2011) aura lieu le 25 novembre &agrave; Prato&nbsp;: 

<a target="_blank" href="http://2011.pgday.it/">http://2011.pgday.it/</a></li>

<li>L'appel &agrave; conf&eacute;renciers est lanc&eacute; pour la <em>PostgreSQL Session #3</em>, programm&eacute;e le 2 f&eacute;vrier 2012 &agrave; Paris. La date limite de d&eacute;p&ocirc;t est le 30 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront contact&eacute;s avant le 14 d&eacute;cembre. Les propositions (en fran&ccedil;ais ou anglais) doivent &ecirc;tre envoy&eacute;es &agrave; call-for-paper AT postgresql-sessions DOT org. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/3/">http://www.postgresql-sessions.org/en/3/</a></li>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague. L'appel &agrave; conf&eacute;renciers est lanc&eacute;. Merci d'envoyer vos propositions, incluant le sujet, une estimation de la dur&eacute;e et vos coordonn&eacute;es &agrave; l'adresse info CHEZ p2d2 POINT cz.</li>

<li>L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute; pour le FLOSS UK, programm&eacute; du 20 au 22 mars 2012 &agrave; Edimbourg. La date limite de d&eacute;p&ocirc;t des candidatures est fix&eacute;e au 18 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront inform&eacute;s avant le 25 novembre. Les propositions sont &agrave; envoyer &agrave; postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;: 

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20111120">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Run pgindent on range type files, per request from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdaa45fd4b09c64d634818e52ef7a2191ce40667">http://git.postgresql.org/pg/commitdiff/cdaa45fd4b09c64d634818e52ef7a2191ce40667</a></li>

<li>Rerun pgindent with updated typedef list. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a2586c1d0d458235b3241834f3f755410301c64">http://git.postgresql.org/pg/commitdiff/1a2586c1d0d458235b3241834f3f755410301c64</a></li>

<li>Remove pg_upgrade function no longer called (dir_matching_filenames). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b735757c3254679af6d6e768e4c59f937e650eb5">http://git.postgresql.org/pg/commitdiff/b735757c3254679af6d6e768e4c59f937e650eb5</a></li>

<li>Fix pg_upgrade's pg_scandir_internal() to properly handle a NULL pattern, which is used on PG 9.1 and HEAD (but not pre-9.1). Fixes crash on Windows. Backpatched to 9.1. Reported by Mark Dilger 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/988f907d2437ea0b45aa0002178610bb9d8a399a">http://git.postgresql.org/pg/commitdiff/988f907d2437ea0b45aa0002178610bb9d8a399a</a></li>

<li>Fix pg_upgrade's pg_scandir_internal() the right way. Backpatch to 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee3ef8f30c4241e95f761c41501979dfd4f22c6a">http://git.postgresql.org/pg/commitdiff/ee3ef8f30c4241e95f761c41501979dfd4f22c6a</a></li>

<li>Remove scandir() requirement in pg_upgrade; instead just use readdir() --- we were not using the scandir pattern filtering anyway. This also removes the scandir requirement in configure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7012b5edb7f12be9f9d2816bb64fcb80515cc18c">http://git.postgresql.org/pg/commitdiff/7012b5edb7f12be9f9d2816bb64fcb80515cc18c</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix copyright notices, other minor editing in new range-types code. No functional changes in this commit (except I could not resist the temptation to re-word a couple of error messages). This is just manual cleanup after pgindent to make the code look reasonably like other PG code, in preparation for more detailed code review to come. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1585362856d4da17113ba2e4ba46cf83cba0cf2">http://git.postgresql.org/pg/commitdiff/f1585362856d4da17113ba2e4ba46cf83cba0cf2</a></li>

<li>Return FALSE instead of throwing error for comparisons with empty ranges. Change range_before, range_after, range_adjacent to return false rather than throwing an error when one or both input ranges are empty. The original definition is unnecessarily difficult to use, and also can result in undesirable planner failures since the planner could try to compare an empty range to something else while deriving statistical estimates. (This was, in fact, the cause of repeatable regression test failures on buildfarm member jaguar, as well as intermittent failures elsewhere.) Also tweak rangetypes regression test to not drop all the objects it creates, so that the final state of the regression database contains some rangetype objects for pg_dump testing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/851c83fc81917c61b063c875fc1bca489dfcc482">http://git.postgresql.org/pg/commitdiff/851c83fc81917c61b063c875fc1bca489dfcc482</a></li>

<li>Return NULL instead of throwing error when desired bound is not available. Change range_lower and range_upper to return NULL rather than throwing an error when the input range is empty or the relevant bound is infinite. Per discussion, throwing an error seems likely to be unduly hard to work with. Also, this is more consistent with the behavior of the constructors, which treat NULL as meaning an infinite bound. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f9e33063cea270166fba12d89fe49876f814398">http://git.postgresql.org/pg/commitdiff/4f9e33063cea270166fba12d89fe49876f814398</a></li>

<li>Update oidjoins regression test to match git HEAD. This is mostly to add some sanity checking for the pg_range catalog. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4165d5b6d7d2e399edbc6d027039358794aa8f04">http://git.postgresql.org/pg/commitdiff/4165d5b6d7d2e399edbc6d027039358794aa8f04</a></li>

<li>Fix alignment and toasting bugs in range types. A range type whose element type has 'd' alignment must have 'd' alignment itself, else there is no guarantee that the element value can be used in-place. (Because range_deserialize uses att_align_pointer which forcibly aligns the given pointer, violations of this rule did not lead to SIGBUS but rather to garbage data being extracted, as in one of the added regression test cases.) Also, you can't put a toast pointer inside a range datum, since the referenced value could disappear with the range datum still present. For consistency with the handling of arrays and records, I also forced decompression of in-line-compressed bound values. It would work to store them as-is, but our policy is to avoid situations that might result in double compression. Add assorted regression tests for this, and bump catversion because of fixes to built-in pg_type entries. Also some marginal cleanup of inconsistent/unnecessary error checks. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad50934eaadb626de682defe0ad270bbf31e92a2">http://git.postgresql.org/pg/commitdiff/ad50934eaadb626de682defe0ad270bbf31e92a2</a></li>

<li>Restructure function-internal caching in the range type code. Move the responsibility for caching specialized information about range types into the type cache, so that the catalog lookups only have to occur once per session. Rearrange APIs a bit so that fn_extra caching is actually effective in the GiST support code. (Use of OidFunctionCallN is bad enough for performance in itself, but it also prevents the function from exploiting fn_extra caching.) The range I/O functions are still not very bright about caching repeated lookups, but that seems like material for a separate patch. Also, avoid unnecessary use of memcpy to fetch/store the range type OID and flags, and don't use the full range_deserialize machinery when all we need to see is the flags value. Also fix API error in range_gist_penalty --- it was failing to set *penalty for any case involving an empty range. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37ee4b75db8f979da6d67ba153d068b012394b46">http://git.postgresql.org/pg/commitdiff/37ee4b75db8f979da6d67ba153d068b012394b46</a></li>

<li>Improve caching in range type I/O functions. Cache the the element type's I/O info across calls, not only the range type's info. In passing, also clean up hash_range a bit more. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/04da3232907680caad3445928c97a246c626a14a">http://git.postgresql.org/pg/commitdiff/04da3232907680caad3445928c97a246c626a14a</a></li>

<li>Code review for range-types catalog entries. Fix assorted infelicities, such as dependency on OIDs that aren't hardwired, as well as outright misdeclaration of daterange_canonical(), which resulted in crashes if you invoked it directly. Add some more regression tests to try to catch similar mistakes in future. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4509033a00df5f49c42a21772d8d617efe83e549">http://git.postgresql.org/pg/commitdiff/4509033a00df5f49c42a21772d8d617efe83e549</a></li>

<li>Fix range_cmp_bounds for the case of equal-valued exclusive bounds. Also improve its comments and related regression tests. Jeff Davis, with some further adjustments by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf4f96b5e264f1c0f5d8694f11c6f9f5b3132b3b">http://git.postgresql.org/pg/commitdiff/bf4f96b5e264f1c0f5d8694f11c6f9f5b3132b3b</a></li>

<li>Extend the unknowns-are-same-as-known-inputs type resolution heuristic. For a very long time, one of the parser's heuristics for resolving ambiguous operator calls has been to assume that unknown-type literals are of the same type as the other input (if it's known). However, this was only used in the first step of quickly checking for an exact-types match, and thus did not help in resolving matches that require coercion, such as matches to polymorphic operators. As we add more polymorphic operators, this becomes more of a problem. This patch adds another use of the same heuristic as a last-ditch check before failing to resolve an ambiguous operator or function call. In particular this will let us define the range inclusion operator in a less limited way (to come in a follow-on patch). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a8b9fb5499d8646661a57edd3c88c3107622ff8">http://git.postgresql.org/pg/commitdiff/1a8b9fb5499d8646661a57edd3c88c3107622ff8</a></li>

<li>Declare range inclusion operators as taking anyelement not anynonarray. Use of anynonarray was a crude hack to get around ambiguity versus the array inclusion operators of the same names. My previous patch to extend the parser's type resolution heuristics makes that unnecessary, so use the more general declaration instead. This eliminates a wart that these operators couldn't be used with ranges over arrays, which are otherwise supported just fine. Also, mark range_before and range_after as commutator operators, per discussion with Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/709aca59608395eef9ceb7dcb79fd9d03a0709ef">http://git.postgresql.org/pg/commitdiff/709aca59608395eef9ceb7dcb79fd9d03a0709ef</a></li>

<li>Do missed autoheader run for previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6438f66226e37851e11a93edebae0198a875100">http://git.postgresql.org/pg/commitdiff/f6438f66226e37851e11a93edebae0198a875100</a></li>

<li>Further review of range-types patch. Lots of documentation cleanup today, and still more type_sanity tests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1a233af66ed14d225ac2d5e7948a5cc8ed2cde6">http://git.postgresql.org/pg/commitdiff/a1a233af66ed14d225ac2d5e7948a5cc8ed2cde6</a></li>

<li>Avoid floating-point underflow while tracking buffer allocation rate. When the system is idle for awhile after activity, the "smoothed_alloc" state variable in BgBufferSync converges slowly to zero. With standard IEEE float arithmetic this results in several iterations with denormalized values, which causes kernel traps and annoying log messages on some poorly-designed platforms. There's no real need to track such small values of smoothed_alloc, so we can prevent the kernel traps by forcing it to zero as soon as it's too small to be interesting for our purposes. This issue is purely cosmetic, since the iterations don't happen fast enough for the kernel traps to pose any meaningful performance problem, but still it seems worth shutting up the log messages. The kernel log messages were previously reported by a number of people, but kudos to Greg Matthews for tracking down exactly where they were coming from. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40d35036bb160d5724305454d41c68ab1637ee6f">http://git.postgresql.org/pg/commitdiff/40d35036bb160d5724305454d41c68ab1637ee6f</a></li>

<li>Further code review for range types patch. Fix some bugs in coercion logic and pg_dump; more comment cleanup; minor cosmetic improvements. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b985d48779146b7ba969b0963614ad7683589bc8">http://git.postgresql.org/pg/commitdiff/b985d48779146b7ba969b0963614ad7683589bc8</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't elide blank lines when accumulating psql command history. This can change the meaning of queries, if the blank line happens to occur in the middle of a quoted literal, as per complaint from Tomas Vondra. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff4fd4bf53c5512427f8ecea08d6ca7777efa2c5">http://git.postgresql.org/pg/commitdiff/ff4fd4bf53c5512427f8ecea08d6ca7777efa2c5</a></li>

<li>Restructure get_object_address() so it's safe against concurrent DDL. This gives a much better error message when the object of interest is concurrently dropped and avoids needlessly failing when the object of interest is concurrently dropped and recreated. It also improves the behavior of two concurrent DROP IF EXISTS operations targeted at the same object; as before, one will drop the object, but now the other will emit the usual NOTICE indicating that the object does not exist, instead of rolling back. As a fringe benefit, it's also slightly less code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3ad5d02c9cd8a4c884cd78480f221afe8ce5590">http://git.postgresql.org/pg/commitdiff/b3ad5d02c9cd8a4c884cd78480f221afe8ce5590</a></li>

<li>Remove ancient downcasing code from procedural language operations. A very long time ago, language names were specified as literals rather than identifiers, so this code was added to do case-folding. But that style has ben deprecated for many years so this isn't needed any more. Language names will still be downcased when specified as unquoted identifiers, but quoted identifiers or the old style using string literals will be left as-is. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67dc4eed42186ba6a2456578899bfd38d003201a">http://git.postgresql.org/pg/commitdiff/67dc4eed42186ba6a2456578899bfd38d003201a</a></li>

<li>Further consolidation of DROP statement handling. This gets rid of an impressive amount of duplicative code, with only minimal behavior changes. DROP FOREIGN DATA WRAPPER now requires object ownership rather than superuser privileges, matching the documentation we already have. We also eliminate the historical warning about dropping a built-in function as unuseful. All operations are now performed in the same order for all object types handled by dropcmds.c. KaiGai Kohei, with minor revisions by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc6d1006bda783cc002c61a5f072905849dbde4b">http://git.postgresql.org/pg/commitdiff/fc6d1006bda783cc002c61a5f072905849dbde4b</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Applied Zoltan Boszormenyi's patch to correctly align interval and timestamp data in ecpg's sqlda. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/309411a69eb40215fbf37ac16facc10aea7998e5">http://git.postgresql.org/pg/commitdiff/309411a69eb40215fbf37ac16facc10aea7998e5</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't quote language name. It's been deprecated for ages according to Tom Lane, and it breaks now given the previous patch anyway. Per buildfarm 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b44dda715884487b92f14a0ea4addeaf163af802">http://git.postgresql.org/pg/commitdiff/b44dda715884487b92f14a0ea4addeaf163af802</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid marking buffer dirty when VACUUM has no work to do. When wal_level = 'hot_standby' we touched the last page of the relation during a VACUUM, even if nothing else had happened. That would alter the LSN of the last block and set the mtime of the relation file unnecessarily. Noted by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1458cc495ff800cd176a1c2e56d8b62680d9b71">http://git.postgresql.org/pg/commitdiff/c1458cc495ff800cd176a1c2e56d8b62680d9b71</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Yeb Havinga sent in two more revisions of the patch to add named parameters to cursor calls.</li>

<li>Greg Smith sent in another revision of the patch to restructure how core extensions are placed in the source tree.</li>

<li>Bruce Momjian sent in a patch to fix an infelicity between pg_dump and malloc.</li>

<li>Jaime Casanova sent in another revision of the patch to measure relation free space.</li>

<li>Shigeru HANADA sent in another revision of the patch to remove useless columns from the system catalog table entries associated with foreign tables.</li>

<li>Simon Riggs sent in a PoC patch to add group commit.</li>

<li>Andrew Dunstan sent in another revision of the patch to create distinctions in pg_dump/pg_restore among pre-data, data, and post-data as distinct entities.</li>

<li>Shigeru HANADA sent in another revision of the patch to make it possible for the server to push JOINs to the foreign server, along with infrastructure for same.</li>

<li>Greg Smith sent in another revision of the patch to allow displaying accumulated autovacuum cost.</li>

<li>Julien Tachoires sent in another revision of the patch to allow moving a table, its TOAST table, or both to a new tablespace.</li>

<li>Shigeru HANADA sent in a new flock of patches to enable a pgsql_fdw.</li>

<li>Scott Mead sent in two more revisions of a patch to introspect states that are "&lt;IDLE&gt; in transaction."</li>

<li>Laurenz Albe sent in two more revisions of a patch to allow disabling SSL compression.</li>

<li>KaiGai Kohei sent in another flock of patches refactoring DDL, one part of which (DROP) Robert Haas updated and committed.</li>

<li>KaiGai Kohei sent in another revision of the patch to allow object creation hooks, which sepgsql will eventually use.</li>

<li>Simon Riggs sent in a patch to optimize XLogInsert().</li>

<li>Robert Haas and Pavan Deolasee traded patches to implement a new refactor of the locking system called FlexLocks.</li>

<li>Peter Eisentraut sent in a patch for type privileges.</li>

<li>Josh Kupershmidt sent in a patch to fix an infelicity in psql's \ir feature.</li>

<li>Greg Smith sent in a revived version of an old patch to allow including a whole directory in postgresql.conf.</li>

<li>Greg Smith sent in a patch to add an "include if exists" directive in postgresql.conf.</li>

<li>Edward Muller sent in another revision of the patch to allow users to kill their own queries.</li>

<li>Zoltan Boszormenyi sent in a patch to allow FETCH read-ahead in ECPG.</li>

<li>Tom Lane sent in a patch to avoid losing column names in some cases.</li>

<li>Etsuro Fujita sent in another revision of the patch that makes it possible to collect statistics on FDW data, including an implementation for the CSV FDW.</li>

<li>Andres Freund sent in two revisions of a patch to collapse a long chain of "ifs" in eval_const_expressions_mutator into a "switch" statement.</li>

<li>KaiGai Kohei sent in another revision of the patch to add a permission check on SELECT INTO.</li>

<li>Andres Freund sent in a patch to allow the combination of (plan off, rewrite off) in EXPLAIN for benchmarking.</li>

</ul>