---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 3 novembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-11-08-nouvelles-hebdomadaires-de-postgresql-3-novembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Suppress duplicate-index-entry warning introduced by previous commit. We don't need two index entries for lo_create pointing at the same section. It's a bit pedantic for the toolchain to warn about this, but warn it does. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/438df52df9bf7ade0c042e73e9c83c0a58adb5bb">http://git.postgresql.org/pg/commitdiff/438df52df9bf7ade0c042e73e9c83c0a58adb5bb</a></li>

<li>Improve documentation about usage of FDW validator functions. SGML documentation, as well as code comments, failed to note that an FDW's validator will be applied to foreign-table options for foreign tables using the FDW. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2b51cf1903d5ed5e962ed68b4a4eeb40fe037db">http://git.postgresql.org/pg/commitdiff/c2b51cf1903d5ed5e962ed68b4a4eeb40fe037db</a></li>

<li>Prevent using strncpy with src == dest in TupleDescInitEntry. The C and POSIX standards state that strncpy's behavior is undefined when source and destination areas overlap. While it remains dubious whether any implementations really misbehave when the pointers are exactly equal, some platforms are now starting to force the issue by complaining when an undefined call occurs. (In particular OS X 10.9 has been seen to dump core here, though the exact set of circumstances needed to trigger that remain elusive. Similar behavior can be expected to be optional on Linux and other platforms in the near future.) So tweak the code to explicitly do nothing when nothing need be done. Back-patch to all active branches. In HEAD, this also lets us get rid of an exception in valgrind.supp. Per discussion of a report from Matthias Schmitt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a9473f3cce1a21c25d6cc7569710e832d2b180b">http://git.postgresql.org/pg/commitdiff/9a9473f3cce1a21c25d6cc7569710e832d2b180b</a></li>

<li>Fix old typo in comment. NFAs have children, but their individual states don't. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6756c8ad305f78a1d27875c3d40d3bf271cf4789">http://git.postgresql.org/pg/commitdiff/6756c8ad305f78a1d27875c3d40d3bf271cf4789</a></li>

<li>Fix some odd behaviors when using a SQL-style simple GMT offset timezone. Formerly, when using a SQL-spec timezone setting with a fixed GMT offset (called a "brute force" timezone in the code), the session_timezone variable was not updated to match the nominal timezone; rather, all code was expected to ignore session_timezone if HasCTZSet was true. This is of course obviously fragile, though a search of the code finds only timeofday() failing to honor the rule. A bigger problem was that DetermineTimeZoneOffset() supposed that if its pg_tz parameter was pointer-equal to session_timezone, then HasCTZSet should override the parameter. This would cause datetime input containing an explicit zone name to be treated as referencing the brute-force zone instead, if the zone name happened to match the session timezone that had prevailed before installing the brute-force zone setting (as reported in bug #8572). The same malady could affect AT TIME ZONE operators. To fix, set up session_timezone so that it matches the brute-force zone specification, which we can do using the POSIX timezone definition syntax "&lt;abbrev&gt;offset", and get rid of the bogus lookaside check in DetermineTimeZoneOffset(). Aside from fixing the erroneous behavior in datetime parsing and AT TIME ZONE, this will cause the timeofday() function to print its result in the user-requested time zone rather than some previously-set zone. It might also affect results in third-party extensions, if there are any that make use of session_timezone without considering HasCTZSet, but in all cases the new behavior should be saner than before. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/631dc390f49909a5c8ebd6002cfb2bcee5415a9d">http://git.postgresql.org/pg/commitdiff/631dc390f49909a5c8ebd6002cfb2bcee5415a9d</a></li>

<li>Remove internal uses of CTimeZone/HasCTZSet. The only remaining places where we actually look at CTimeZone/HasCTZSet are abstime2tm() and timestamp2tm(). Now that session_timezone is always valid, we can remove these special cases. The caller-visible impact of this is that these functions now always return a valid zone abbreviation if requested, whereas before they'd return a NULL pointer if a brute-force timezone was in use. In the existing code, the only place I can find that changes behavior is to_char(), whose TZ format code will now print something useful rather than nothing for such zones. (In the places where the returned zone abbreviation is passed to EncodeDateTime, the lack of visible change is because we've chosen the abbreviation used for these zones to match what EncodeTimezone would have printed.) It's likely that there is now a fair amount of removable dead code around the call sites, namely anything that's meant to cope with getting a NULL timezone abbreviation, but I've not made an effort to root that out. This could be back-patched if we decide we'd like to fix to_char()'s behavior in the back branches, but there doesn't seem to be much enthusiasm for that at present. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c8a7f617fd1d38cb0540266e4fca6835f61005a">http://git.postgresql.org/pg/commitdiff/1c8a7f617fd1d38cb0540266e4fca6835f61005a</a></li>

<li>Remove CTimeZone/HasCTZSet, root and branch. These variables no longer have any useful purpose, since there's no reason to special-case brute force timezones now that we have a valid session_timezone setting for them. Remove the variables, and remove the SET/SHOW TIME ZONE code that deals with them. The user-visible impact of this is that SHOW TIME ZONE will now show a POSIX-style zone specification, in the form "&lt;+-offset&gt;-+offset", rather than an interval value when a brute-force zone has been set. While perhaps less intuitive, this is a better definition than before because it's actually possible to give that string back to SET TIME ZONE and get the same behavior, unlike what used to happen. We did not previously mention the angle-bracket syntax when describing POSIX timezone specifications; add some documentation so that people can figure out what these strings do. (There's still quite a lot of undocumented functionality there, but anybody who really cares can go read the POSIX spec to find out about it. In practice most people seem to prefer Olsen-style city names anyway.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45f64f1bbf19283795762df6a54f9aa74fee05f7">http://git.postgresql.org/pg/commitdiff/45f64f1bbf19283795762df6a54f9aa74fee05f7</a></li>

<li>Ensure all files created for a single BufFile have the same resource owner. Callers expect that they only have to set the right resource owner when creating a BufFile, not during subsequent operations on it. While we could insist this be fixed at the caller level, it seems more sensible for the BufFile to take care of it. Without this, some temp files belonging to a BufFile can go away too soon, eg at the end of a subtransaction, leading to errors or crashes. Reported and fixed by Andres Freund. Back-patch to all active branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bffd1ce92cb4e3e44c3c0ff8cdd4a5a2a8be5e3c">http://git.postgresql.org/pg/commitdiff/bffd1ce92cb4e3e44c3c0ff8cdd4a5a2a8be5e3c</a></li>

<li>Retry after buffer locking failure during SPGiST index creation. The original coding thought this case was impossible, but it can happen if the bgwriter or checkpointer processes decide to write out an index page while creation is still proceeding, leading to a bogus "unexpected spgdoinsert() failure" error. Problem reported by Jonathan S. Katz. Teodor Sigaev 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24ace4053d42e2c48af8c15d598622e488fb9502">http://git.postgresql.org/pg/commitdiff/24ace4053d42e2c48af8c15d598622e488fb9502</a></li>

<li>Prevent memory leaks from accumulating across printtup() calls. Historically, printtup() has assumed that it could prevent memory leakage by pfree'ing the string result of each output function and manually managing detoasting of toasted values. This amounts to assuming that datatype output functions never leak any memory internally; an assumption we've already decided to be bogus elsewhere, for example in COPY OUT. range_out in particular is known to leak multiple kilobytes per call, as noted in bug #8573 from Godfried Vanluffelen. While we could go in and fix that leak, it wouldn't be very notationally convenient, and in any case there have been and undoubtedly will again be other leaks in other output functions. So what seems like the best solution is to run the output functions in a temporary memory context that can be reset after each row, as we're doing in COPY OUT. Some quick experimentation suggests this is actually a tad faster than the retail pfree's anyway. This patch fixes all the variants of printtup, except for debugtup() which is used in standalone mode. It doesn't seem worth worrying about query-lifespan leaks in standalone mode, and fixing that case would be a bit tedious since debugtup() doesn't currently have any startup or shutdown functions. While at it, remove manual detoast management from several other output-function call sites that had copied it from printtup(). This doesn't make a lot of difference right now, but in view of recent discussions about supporting "non-flattened" Datums, we're going to want that code gone eventually anyway. Back-patch to 9.2 where range_out was introduced. We might eventually decide to back-patch this further, but in the absence of known major leaks in older output functions, I'll refrain for now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b006f4ddb988568081f8290fac77f9402b137120">http://git.postgresql.org/pg/commitdiff/b006f4ddb988568081f8290fac77f9402b137120</a></li>

<li>Get rid of more cases of the "must detoast before output function" meme. I missed that json.c was doing this too, because for some bizarre reason it wasn't doing it adjacent to the output function call. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e36ce0c7f7b329b25f92cf440fd88fcc695de101">http://git.postgresql.org/pg/commitdiff/e36ce0c7f7b329b25f92cf440fd88fcc695de101</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Work around NetBSD shell issue in pg_upgrade test script. The NetBSD shell apparently returns non-zero from an unset command if the variable is already unset. This matters when, as in pg_upgrade's test.sh, we are working under 'set -e'. To protect against this, we first set the PG variables to an empty string before unsetting them completely. Error found on buildfarm member coypu, solution from R&eacute;mi Zara. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c737a2e5641a324d3987750b73928c481a5254a0">http://git.postgresql.org/pg/commitdiff/c737a2e5641a324d3987750b73928c481a5254a0</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Modify dynamic shared memory code to use Size rather than uint64. This is more consistent with what we do elsewhere. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2aecaea15556f9986759f3455609bcafb0a3992">http://git.postgresql.org/pg/commitdiff/d2aecaea15556f9986759f3455609bcafb0a3992</a></li>

<li>Avoid too-large shift on 32-bit Windows. Apparently, shifts greater than or equal to the width of the type are undefined, and can surprisingly produce a non-zero value. Amit Kapila, with a comment by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/343bb134ea20d3b7286c620c15a067da79cab724">http://git.postgresql.org/pg/commitdiff/343bb134ea20d3b7286c620c15a067da79cab724</a></li>

<li>Use appendStringInfoString instead of appendStringInfo where possible. This shaves a few cycles, and generally seems like good programming practice. David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cacbdd78106526d7c4f11f90b538f96ba8696fb0">http://git.postgresql.org/pg/commitdiff/cacbdd78106526d7c4f11f90b538f96ba8696fb0</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix subquery reference to non-populated MV in CMV. A subquery reference to a matview should be allowed by CREATE MATERIALIZED VIEW WITH NO DATA, just like a direct reference is. Per bug report from Laurent Sartran. Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be420fa02e69f084a0eeac6d2cb5424551aad495">http://git.postgresql.org/pg/commitdiff/be420fa02e69f084a0eeac6d2cb5424551aad495</a></li>

<li>Acquire appropriate locks when rewriting during RMV. Since the query has not been freshly parsed when executing REFRESH MATERIALIZED VIEW, locks must be explicitly taken before rewrite. Backpatch to 9.3. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a781d57dcd027df32d15ee2378b84d0c4d005d1">http://git.postgresql.org/pg/commitdiff/2a781d57dcd027df32d15ee2378b84d0c4d005d1</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Changed test case slightly so it doesn't have an unused typedef. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84a05d479e7d1287caaca24a36b30d62cdc78924">http://git.postgresql.org/pg/commitdiff/84a05d479e7d1287caaca24a36b30d62cdc78924</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Asif Naeem sent in another revision of a patch to patch a vulnerability in the Windows version of psql.</li>

<li>Nigel Heron sent in another revision of a patch to add stats for network traffic.</li>

<li>Amit Kapila sent in a patch to fix an issue where in the Windows implementation of dynamic shared memory, the Size calculation for creating dynamic shared memory is assuming that requested size for creation of dynamic shared memory segment is uint64, which is no longer the correct type.</li>

<li>Abhijit Menon-Sen sent in a patch to round the size of dynamic shared memory up a multiple of 2MB unconditionally, and adds a DEBUG1 log message when the attempt with MAP_HUGETLB fails, falling back to ordinary mmap.</li>

<li>Gurjeet Singh sent in a patch to shave a few instructions from child-process startup sequence.</li>

<li>Kyotaro HORIGUCHI sent in a WIP patch to enable using indexes in a UNION query.</li>

<li>MauMau sent in three revisions of a patch to fix a bug where PostgreSQL fails to start on Windows if it crashes after tablespace creation.</li>

<li>Robert Haas sent in a set of patches to: 1. add the concept of on_dsm_detach hooks. 2. provide a facility for sizing a dynamic shared memory segment before creation, and for dividing it up into chunks after it's been created. 3. Create an infrastructure for sending and receiving messages of arbitrary length using ring buffers stored in shared memory (presumably dynamic shared memory, but hypothetically the main shared memory segment could be used). 4. a demonstration of how to use the various background worker and dynamic shared memory facilities introduced over the course of the 9.4 release cycle, and the facilities introduced by patches #1-#3 of this series, to actually do something interesting.</li>

<li>Kyotaro HORIGUCHI sent in a patch to get more from indexes in the UNION [ALL] cases.</li>

<li>Kyotaro HORIGUCHI sent in a patch to add a fallocate() system call to improve sequential read/write peformance.</li>

<li>Antonin Houska sent in a patch to allow a reference to the parent query from any sublink.</li>

<li>Etsuro Fujita sent in a patch to show lossy heap block info in the EXPLAIN ANALYZE output for bitmap heap scans.</li>

<li>Kevin Grittner sent in a patch to silence some compiler warnings.</li>

<li>Mitsumasa KONDO sent in a patch to add an "accurate" option to pgbench.</li>

<li>Teodor Sigaev sent in a patch to fix a bug in SP-GiST index creation.</li>

<li>Craig Ringer sent in a patch to add writer-side checks to row-based access control.</li>

<li>Mika Eloranta sent in a patch to fix a bug in pg_receivelog where it calculated the xlog segment number incorrectly when started after the previous instance was interrupted.</li>

<li>Andres Freund sent in a patch to fix an issue where it currently is possible that buffile.c segments get created belonging to the wrong resource owner leading to WARNINGs ala "temporary file leak: File %d still referenced", ERRORs like "write failed", asserts and segfaults.</li>

</ul>