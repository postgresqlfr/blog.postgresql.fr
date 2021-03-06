---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 février 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/02/16/Nouvelles-hebdomadaires-de-PostgreSQL-16-février-2014"
---


<p>Les MAJ correctives&nbsp; 9.3.3, 9.2.7, 9.1.12, 9.0.16 et 8.4.20 seront bient&ocirc;t disponibles. Pr&eacute;parez-vous &agrave; mettre &agrave; jour&nbsp;!</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 5.0, un analyseur parall&egrave;lisable de logs PostgreSQL &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="http://dalibo.github.io/pgbadger/">http://dalibo.github.io/pgbadger/</a></li>

<li>PG Partition Manager 1.6.0, une extension pour g&eacute;rer un partitionnement bas&eacute; sur un horodatage ou une s&eacute;quence&nbsp;: 

<a target="_blank" href="http://www.keithf4.com/partitioning-with-custom-time-intervals/">http://www.keithf4.com/partitioning-with-custom-time-intervals/</a> <a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay Nordique 2014 aura lieu &agrave; Stockholm (Su&egrave;de) &agrave; l'h&ocirc;tel Hilton le 20 mars 2014&nbsp;: 

<a target="_blank" href="http://2014.nordicpgday.org/">http://2014.nordicpgday.org/</a></li>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140217062348.GC2420@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use memmove() instead of memcpy() for copying overlapping regions. In commit d2495f272cd164ff075bee5c4ce95aed11338a36, I fixed this bug in to_tsquery(), but missed the fact that plainto_tsquery() has the same bug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c2744f1d3a0d2e456f8d52776c976da3eb8d3a0">http://git.postgresql.org/pg/commitdiff/6c2744f1d3a0d2e456f8d52776c976da3eb8d3a0</a></li>

<li>Fix WakeupWaiters() to not wake up an exclusive locker unnecessarily. WakeupWaiters() is supposed to wake up all LW_WAIT_UNTIL_FREE waiters of the slot, but the loop incorrectly also woke up the first LW_EXCLUSIVE waiter, if there was no LW_WAIT_UNTIL_FREE waiters in the queue. Noted by Andres Freund. This code is new in 9.4, so no backpatching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d699ba41349e4ef397222a7223606fa03f4c4870">http://git.postgresql.org/pg/commitdiff/d699ba41349e4ef397222a7223606fa03f4c4870</a></li>

<li>Change the order that pg_xlog and WAL archive are polled for WAL segments. If there is a WAL segment with same ID but different TLI present in both the WAL archive and pg_xlog, prefer the one with higher TLI. Before this patch, the archive was polled first, for all expected TLIs, and only if no file was found was pg_xlog scanned. This was a change in behavior from 9.3, which first scanned archive and pg_xlog for the highest TLI, then archive and pg_xlog for the next highest TLI and so forth. This patch reverts the behavior back to what it was in 9.2. The reason for this is that if for example you try to do archive recovery to timeline 2, which branched off timeline 1, but the WAL for timeline 2 is not archived yet, we would replay past the timeline switch point on timeline 1 using the archived files, before even looking timeline 2's files in pg_xlog Report and patch by Kyotaro Horiguchi. Backpatch to 9.3 where the behavior was changed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d894b41cd12179b710526eba9dc62c2b99abc4d">http://git.postgresql.org/pg/commitdiff/4d894b41cd12179b710526eba9dc62c2b99abc4d</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't generate plain-text HISTORY and src/test/regress/README anymore. Providing this information as plain text was doubtless worth the trouble ten years ago, but it seems likely that hardly anyone reads it in this format anymore. And the effort required to maintain these files (in the form of extra-complex markup rules in the relevant parts of the SGML documentation) is significant. So, let's stop doing that and rely solely on the other documentation formats. Per discussion, the plain-text INSTALL instructions might still be worth their keep, so we continue to generate that file. Rather than remove HISTORY and src/test/regress/README from distribution tarballs entirely, replace them with simple stub files that tell the reader where to find the relevant documentation. This is mainly to avoid possibly breaking packaging recipes that expect these files to exist. Back-patch to all supported branches, because simplifying the markup requirements for release notes won't help much unless we do it in all branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2895415205d86cc7ab55acab5f90fd70a7c68f3c">http://git.postgresql.org/pg/commitdiff/2895415205d86cc7ab55acab5f90fd70a7c68f3c</a></li>

<li>Cygwin build fixes. Get rid of use of dlltool for linking the main postgres executable. dlltool is obsolete and we'd prefer to stop depending on it. Also, include $(LDAP_LIBS_FE) in $(libpq_pgport). (It's not clear that this is really needed, or why it's not a linker bug if it is needed. But reports are that it's needed on current Cygwin.) We might want to back-patch this if it works, but first let's see what the buildfarm thinks. Marco Atzeri 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cba6ffaef3987211fb31ba869eb2a476bad6f6d3">http://git.postgresql.org/pg/commitdiff/cba6ffaef3987211fb31ba869eb2a476bad6f6d3</a></li>

<li>Get rid of use of dlltool in Mingw builds. We are almost completely out of the dlltool game, if this works. Hiroshi Inoue 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/846e91e0223cf9f2821c3ad4dfffffbb929cb027">http://git.postgresql.org/pg/commitdiff/846e91e0223cf9f2821c3ad4dfffffbb929cb027</a></li>

<li>Flush a stray definition of $(DLLTOOL). Even if this is needed, it'd be configure's responsibility to set it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a98d323df2d0839ebb4aab2004c626b64343b76">http://git.postgresql.org/pg/commitdiff/7a98d323df2d0839ebb4aab2004c626b64343b76</a></li>

<li>Make gendef.pl emit DATA annotations for global variables. This should make the MSVC build act more like builds for other platforms, i.e. backend global variables will be automatically available to loadable libraries without need for explicit PGDLLIMPORT marking. Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5eed4d7706749046e74fa2e23823beb43f254fd">http://git.postgresql.org/pg/commitdiff/a5eed4d7706749046e74fa2e23823beb43f254fd</a></li>

<li>Tweak position of $(DLL_DEFFILE) in shared-library link commands. Reading the GNU ld man page suggests that this is order-sensitive and should go in front of library references. Correction to commit 846e91e0223cf9f2821c3ad4dfffffbb929cb027. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b23fd2d8b3cdfea5b6998c1ab95ae3e776a8f832">http://git.postgresql.org/pg/commitdiff/b23fd2d8b3cdfea5b6998c1ab95ae3e776a8f832</a></li>

<li>Remove --enable-auto-import linker switch in Cygwin build. This is expected to make it start failing when contrib modules reference non-PGDLLIMPORT'ed global variables, as the other Windows build methods do. Aside from the value of consistency, the underlying implementation of this switch is pretty ugly and not really something we want to rely on if we have to use PGDLLIMPORT anyway for MSVC. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30657b796c7fdcaf9c0eb9ac53d4bab6399eb65b">http://git.postgresql.org/pg/commitdiff/30657b796c7fdcaf9c0eb9ac53d4bab6399eb65b</a></li>

<li>In XLogReadBufferExtended, don't assume P_NEW yields consecutive pages. In a database that's not yet reached consistency, it's possible that some segments of a relation are not full-size but are not the last ones either. Because of the way smgrnblocks() works, asking for a new page with P_NEW will fill in the last not-full-size segment --- and if that makes it full size, the apparent EOF of the relation will increase by more than one page, so that the next P_NEW request will yield a page past the next consecutive one. This breaks the relation-extension logic in XLogReadBufferExtended, possibly allowing a page update to be applied to some page far past where it was intended to go. This appears to be the explanation for reports of table bloat on replication slaves compared to their masters, and probably explains some corrupted-slave reports as well. Fix the loop to check the page number it actually got, rather than merely Assert()'ing that dead reckoning got it to the desired place. AFAICT, there are no other places that make assumptions about exactly which page they'll get from P_NEW. Problem identified by Greg Stark, though this is not the same as his proposed patch. It's been like this for a long time, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f2aead1ffec6f056dc3c371c2ec6a12d7d5ccd3">http://git.postgresql.org/pg/commitdiff/6f2aead1ffec6f056dc3c371c2ec6a12d7d5ccd3</a></li>

<li>Improve libpq's error recovery for connection loss during COPY. In pqSendSome, if the connection is already closed at entry, discard any queued output data before returning. There is no possibility of ever sending the data, and anyway this corresponds to what we'd do if we'd detected a hard error while trying to send(). This avoids possible indefinite bloat of the output buffer if the application keeps trying to send data (or even just keeps trying to do PQputCopyEnd, as psql indeed will). Because PQputCopyEnd won't transition out of PGASYNC_COPY_IN state until it's successfully queued the COPY END message, and pqPutMsgEnd doesn't distinguish a queuing failure from a pqSendSome failure, this omission allowed an infinite loop in psql if the connection closure occurred when we had at least 8K queued to send. It might be worth refactoring so that we can make that distinction, but for the moment the other changes made here seem to offer adequate defenses. To guard against other variants of this scenario, do not allow PQgetResult to return a PGRES_COPY_XXX result if the connection is already known dead. Make sure it returns PGRES_FATAL_ERROR instead. Per report from Stephen Frost. Back-patch to all active branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa4440f51628d692f077d54b8313aea31af087ea">http://git.postgresql.org/pg/commitdiff/fa4440f51628d692f077d54b8313aea31af087ea</a></li>

<li>Improve text of stub HISTORY file. Per Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dea5a8c402b11819a24a06f1e110c371a908d359">http://git.postgresql.org/pg/commitdiff/dea5a8c402b11819a24a06f1e110c371a908d359</a></li>

<li>Improve cross-references between minor version release notes. We have a practice of providing a "bread crumb" trail between the minor versions where the migration section actually tells you to do something. Historically that was just plain text, eg, "see the release notes for 9.2.4"; but if you're using a browser or PDF reader, it's a lot nicer if it's a live hyperlink. So use "&lt;xref&gt;" instead. Any argument against doing this vanished with the recent decommissioning of plain-text release notes. Vik Fearing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a6f136c4676bd183b5c1145387eedd837c56ffa">http://git.postgresql.org/pg/commitdiff/4a6f136c4676bd183b5c1145387eedd837c56ffa</a></li>

<li>Fix length checking for Unicode identifiers containing escapes (U&amp;"..."). We used the length of the input string, not the de-escaped string, as the trigger for NAMEDATALEN truncation. AFAICS this would only result in sometimes printing a phony truncation warning; but it's just luck that there was no worse problem, since we were violating the API spec for truncate_identifier(). Per bug #9204 from Joshua Yanovski. This has been wrong since the Unicode-identifier support was added, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44c216330201126d12e466442c667a8e091decd3">http://git.postgresql.org/pg/commitdiff/44c216330201126d12e466442c667a8e091decd3</a></li>

<li>Clean up error cases in psql's COPY TO STDOUT/FROM STDIN code. Adjust handleCopyOut() to stop trying to write data once it's failed one time. For typical cases such as out-of-disk-space or broken-pipe, additional attempts aren't going to do anything but waste time, and in any case clean truncation of the output seems like a better behavior than randomly dropping blocks in the middle. Also remove dubious (and misleadingly documented) attempt to force our way out of COPY_OUT state if libpq didn't do that. If we did have a situation like that, it'd be a bug in libpq and would be better fixed there, IMO. We can hope that commit fa4440f51628d692f077d54b8313aea31af087ea took care of any such problems, anyway. Also fix longstanding bug in handleCopyIn(): PQputCopyEnd() only supports a non-null errormsg parameter in protocol version 3, and will actively fail if one is passed in version 2. This would've made our attempts to get out of COPY_IN state after a failure into infinite loops when talking to pre-7.4 servers. Back-patch the COPY_OUT state change business back to 9.2 where it was introduced, and the other two fixes into all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8f00a46bc4ae77c09f4564f3b3c675fb9e51974">http://git.postgresql.org/pg/commitdiff/b8f00a46bc4ae77c09f4564f3b3c675fb9e51974</a></li>

<li>Cosmetic improvements in plpython's make rule for libpython import library. This build technique is remarkably ugly, but that doesn't mean it has to be unreadable too. Be a bit more liberal with the vertical whitespace, and give the .def file a proper dependency, just in case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7983e989d9cafc9cef49becfee054e34b1ed9b4">http://git.postgresql.org/pg/commitdiff/a7983e989d9cafc9cef49becfee054e34b1ed9b4</a></li>

<li>In mingw builds, make our own import library for libperl. Borrow the method already used by plpython. This is pretty ugly, but it might fix the build failure exhibited by buildfarm member narwhal since commit 846e91e0223cf9f2821c3ad4dfffffbb929cb027. Hiroshi Inoue 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02b61dd08f9973eee3058c458afba7b9336230dc">http://git.postgresql.org/pg/commitdiff/02b61dd08f9973eee3058c458afba7b9336230dc</a></li>

<li>Suggest shell here-documents instead of psql -c for multiple commands. The documentation suggested using "echo | psql", but not the often-superior alternative of a here-document. Also, be more direct about suggesting that people avoid -c for multiple commands. Per discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ea081bbd73bffed2bd4b0300fe9d99afec465ce">http://git.postgresql.org/pg/commitdiff/1ea081bbd73bffed2bd4b0300fe9d99afec465ce</a></li>

<li>In mingw builds, make our own import library for libtcl, too. Per buildfarm results. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcbf39774ff3159e17c614a24740ce00fdb14620">http://git.postgresql.org/pg/commitdiff/dcbf39774ff3159e17c614a24740ce00fdb14620</a></li>

<li>Update regression testing instructions. This documentation never got the word about the existence of check-world or installcheck-world. Revise to recommend use of those, and document all the subsidiary test suites. Do some minor wordsmithing elsewhere, too. In passing, remove markup related to generation of plain-text regression test instructions, since we don't do that anymore. Back-patch to 9.1 where check-world was added. (installcheck-world exists in 9.0; but since check-world doesn't, this patch would need additional work to cover that branch, and it doesn't seem worth the effort.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2128c52f5c476276fcaa2bc49b31f6d445365f95">http://git.postgresql.org/pg/commitdiff/2128c52f5c476276fcaa2bc49b31f6d445365f95</a></li>

<li>Fix fat-fingered makefile changes for pltcl. I put the OBJS assignments in the wrong order. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/638b153f2a23dadbbc5079c30f062a10be42ad11">http://git.postgresql.org/pg/commitdiff/638b153f2a23dadbbc5079c30f062a10be42ad11</a></li>

<li>Update time zone data files to tzdata release 2013i. DST law changes in Jordan; historical changes in Cuba. Also, remove the zones Asia/Riyadh87, Asia/Riyadh88, and Asia/Riyadh89. Per the upstream announcement: The files solar87, solar88, and solar89 are no longer distributed. They were a negative experiment -- that is, a demonstration that tz data can represent solar time only with some difficulty and error. Their presence in the distribution caused confusion, as Riyadh civil time was generally not solar time in those years. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e04641f4b4d1578f00160878f1f3f801f38221cb">http://git.postgresql.org/pg/commitdiff/e04641f4b4d1578f00160878f1f3f801f38221cb</a></li>

<li>Ooops, forgot to remove solar87 and friends from src/timezone/Makefile. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c5143a0b58259df723ed2473ae11d45d08a8b24">http://git.postgresql.org/pg/commitdiff/1c5143a0b58259df723ed2473ae11d45d08a8b24</a></li>

<li>Use --disable-auto-import linker switch in Mingw builds, too. This is evidently the default on buildfarm member narwhal, but that is a pretty ancient Mingw version, and there is reason to think that more recent versions of GNU ld have this feature turned on by default. Since we are trying to achieve consistency of link behavior across all Windows toolchains, let's just make sure here. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c9acd5c86a71b8ab73bc139eb5e0ad292b9a7d4">http://git.postgresql.org/pg/commitdiff/1c9acd5c86a71b8ab73bc139eb5e0ad292b9a7d4</a></li>

<li>Centralize getopt-related declarations in a new header file pg_getopt.h. We used to have externs for getopt() and its API variables scattered all over the place. Now that we find we're going to need to tweak the variable declarations for Cygwin, it seems like a good idea to have just one place to tweak. In this commit, the variables are declared "#ifndef HAVE_GETOPT_H". That may or may not work everywhere, but we'll soon find out. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60ff2fdd9970ba29f5267317a5e7354d2658c1e5">http://git.postgresql.org/pg/commitdiff/60ff2fdd9970ba29f5267317a5e7354d2658c1e5</a></li>

<li>Fix unportable coding in DetermineSleepTime(). We should not assume that struct timeval.tv_sec is a long, because it ain't necessarily. (POSIX says that it's a time_t, which might well be 64 bits now or in the future; or for that matter might be 32 bits on machines with 64-bit longs.) Per buildfarm member panther. Back-patch to 9.3 where the dubious coding was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0ee42d59b797603d645df8876ae3abf6d016f1e">http://git.postgresql.org/pg/commitdiff/f0ee42d59b797603d645df8876ae3abf6d016f1e</a></li>

<li>Fix unportable coding in BackgroundWorkerStateChange(). PIDs aren't necessarily ints; our usual practice for printing them is to explicitly cast to long. Per buildfarm member rover_firefly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/643f75ca9b5b3883395576aaf5246b67270a657b">http://git.postgresql.org/pg/commitdiff/643f75ca9b5b3883395576aaf5246b67270a657b</a></li>

<li>On Windows, expect to find Tcl DLL in bin directory not lib directory. Still another step in the continuing saga of trying to get --disable-auto-import to work. Hiroshi Inoue 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56caaf195e996919088d532832a2a57ca33431b2">http://git.postgresql.org/pg/commitdiff/56caaf195e996919088d532832a2a57ca33431b2</a></li>

<li>First-draft release notes for 9.3.3. As usual, the release notes for older branches will be made by cutting these down, but put them up for community review first. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cefd3e507d7cc402225e5da100d05dcafb90c0bd">http://git.postgresql.org/pg/commitdiff/cefd3e507d7cc402225e5da100d05dcafb90c0bd</a></li>

<li>Improve release notes per comments from Andres Freund. Make a bit more noise about the timeout-interrupt bug. Also, remove the release note entry for commit 423e1211a; that patch fixed a problem introduced post-9.3.2, so there's no need to document it in the release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fd994e40cb42b56d6bdef07e1bd7ac79270816b">http://git.postgresql.org/pg/commitdiff/8fd994e40cb42b56d6bdef07e1bd7ac79270816b</a></li>

<li>PGDLLIMPORT'ify DateStyle and IntervalStyle. This is needed on Windows to support contrib/postgres_fdw. Although it's been broken since last March, we didn't notice until recently because there were no active buildfarm members that complained about missing PGDLLIMPORT marking. Efforts are underway to improve that situation, in support of which we're delaying fixing some other cases of global variables that should be marked PGDLLIMPORT. However, this case affects 9.3, so we can't wait any longer to fix it. I chose to mark DateOrder as well, though it's not strictly necessary for postgres_fdw. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5cf60682e4c61e7cc35c5024abf52ed561775ea">http://git.postgresql.org/pg/commitdiff/a5cf60682e4c61e7cc35c5024abf52ed561775ea</a></li>

<li>Further wordsmithing on 9.3.3 release notes. No substantive changes, but reorder some items and improve some descriptions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/734ff84b086e098e6106f19c4146357c5eaa9594">http://git.postgresql.org/pg/commitdiff/734ff84b086e098e6106f19c4146357c5eaa9594</a></li>

<li>Revert to using --enable-auto-import in Cygwin builds. Disabling auto-import requires that all libraries we use be careful about declspecs for exported variables; and it seems they aren't. This means that Cygwin will not give us useful info about missing PGDLLIMPORT markers; but it's probably sufficient that MSVC and Mingw builds do. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d6e2d4abf77c422714448e5f4270fdb1a84d973">http://git.postgresql.org/pg/commitdiff/8d6e2d4abf77c422714448e5f4270fdb1a84d973</a></li>

<li>Fix unportable coding in tarCreateHeader(). uid_t and gid_t might be wider than int on some platforms. Per buildfarm member brolga. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1c802712c369af4085c365cb79c3063b8407ef4">http://git.postgresql.org/pg/commitdiff/a1c802712c369af4085c365cb79c3063b8407ef4</a></li>

<li>PGDLLIMPORT-ify MainLWLockArray, ProcDiePending, proc_exit_inprogress. These are needed in HEAD to make assorted contrib modules build on Windows. Now that all the MSVC and Mingw buildfarm members seem to be on the same page about the need for them, we can have some confidence that future problems of this ilk will be detected promptly; there seems nothing more to be learned by delaying this fix further. I chose to mark QueryCancelPending as well, since it's easy to imagine code that wants to touch ProcDiePending also caring about QueryCancelPending. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa1f0d785921b34a98562a806aed2c3d34aaf7be">http://git.postgresql.org/pg/commitdiff/fa1f0d785921b34a98562a806aed2c3d34aaf7be</a></li>

<li>Release notes for 9.3.3, 9.2.7, 9.1.12, 9.0.16, 8.4.20. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0983315b1d37cc17b2174dad87449d8402e357ee">http://git.postgresql.org/pg/commitdiff/0983315b1d37cc17b2174dad87449d8402e357ee</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>scripts: Remove newlines from end of generated SQL. This results in spurious empty lines in the server log. Instead, add the newlines only when printing out the --echo output. In some cases, this was already done, leading to two newlines being printed. Clean that up as well. From: Fabr&iacute;zio de Royes Mello &lt;fabriziomello@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d3c4c471553265e7517be24bae64b81967f6df40">http://git.postgresql.org/pg/commitdiff/d3c4c471553265e7517be24bae64b81967f6df40</a></li>

<li>Fix typo. Stefan Kaltenbrunner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f2ca0075c4bd42351cd48b3e6889f11f0e03e65">http://git.postgresql.org/pg/commitdiff/0f2ca0075c4bd42351cd48b3e6889f11f0e03e65</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Postgres date-style date-only output is ISO. Backpatch to 9.3 Report from MauMau 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c9db4a5a4b5e8fe1142b1ea6659b225b7641a76">http://git.postgresql.org/pg/commitdiff/8c9db4a5a4b5e8fe1142b1ea6659b225b7641a76</a></li>

<li>pg_test_fsync: add C comment about direct I/O and write size failure. Report from Marti Raudsepp 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9bb944cd879949cf454b941f2b8fa7b00fcc1e4">http://git.postgresql.org/pg/commitdiff/f9bb944cd879949cf454b941f2b8fa7b00fcc1e4</a></li>

<li>pg_upgrade: dramatically reduce memory consumption. Report from Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a2e40aaaad6d9d8a2c6a61817542a2d8c369935">http://git.postgresql.org/pg/commitdiff/2a2e40aaaad6d9d8a2c6a61817542a2d8c369935</a></li>

<li>Rename 'gmake' to 'make' in docs and recommended commands. This simplifies the docs and makes it easier to cut/paste command lines. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2fc80e8e8304913c8dd1090bb2976632c0f4a8c3">http://git.postgresql.org/pg/commitdiff/2fc80e8e8304913c8dd1090bb2976632c0f4a8c3</a></li>

<li>Revert gmake/make release note changes. Backbranch release note changes cause merge conflicts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/993c3961a4166a766c9b0a67701e9c82432550cc">http://git.postgresql.org/pg/commitdiff/993c3961a4166a766c9b0a67701e9c82432550cc</a></li>

<li>pg_upgrade: document use of file system and COW snapshots 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bcec58cf1ebf20ea237be042d3ef774f887557a9">http://git.postgresql.org/pg/commitdiff/bcec58cf1ebf20ea237be042d3ef774f887557a9</a></li>

<li>pg_upgrade: mention the need for tablespace snapshots in docs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f735ae831d3c249378280050b104ff751dfc668">http://git.postgresql.org/pg/commitdiff/3f735ae831d3c249378280050b104ff751dfc668</a></li>

<li>pgcrypto: clarify 'md5' (hash) table entry. Per suggestion from Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/474cb24df7f6f85a936e87314edeb2deb92365cd">http://git.postgresql.org/pg/commitdiff/474cb24df7f6f85a936e87314edeb2deb92365cd</a></li>

<li>docs: improve CREATE FUNCTION docs about language case and quoting. Report from Marc Mamin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de4b6558be4285d8186e16f33ab474d619bb0cf6">http://git.postgresql.org/pg/commitdiff/de4b6558be4285d8186e16f33ab474d619bb0cf6</a></li>

<li>Add C comment about problems with CHAR() space trimming 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c57d11fca3b87daa741151f75085e2554ee310f">http://git.postgresql.org/pg/commitdiff/9c57d11fca3b87daa741151f75085e2554ee310f</a></li>

<li>psql: Add C comment about gset_prefix being freed later 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0d8947acb8b4300cc771b0d5a2f53e4e5148a40">http://git.postgresql.org/pg/commitdiff/a0d8947acb8b4300cc771b0d5a2f53e4e5148a40</a></li>

<li>Remove use of sscanf in pg_upgrade, and add C comment to pg_dump. Per report from Jackie Chang 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32be1c8e900b89a89ec5e3a064c6b6010869d062">http://git.postgresql.org/pg/commitdiff/32be1c8e900b89a89ec5e3a064c6b6010869d062</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Kill pg_basebackup background process when exiting. If an error occurs in the foreground (backup) process of pg_basebackup, and we exit in a controlled way, the background process (streaming xlog process) would stay around and keep streaming. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63ab2befe0d2332a5571f46c1a2c0af9447c6a4b">http://git.postgresql.org/pg/commitdiff/63ab2befe0d2332a5571f46c1a2c0af9447c6a4b</a></li>

<li>Add missing include, required on some platforms. Noted by the buildfarm and Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48870dd9f752db7f953dde54b3d16e82d529e0db">http://git.postgresql.org/pg/commitdiff/48870dd9f752db7f953dde54b3d16e82d529e0db</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Separate multixact freezing parameters from xid's. Previously we were piggybacking on transaction ID parameters to freeze multixacts; but since there isn't necessarily any relationship between rates of Xid and multixact consumption, this turns out not to be a good idea. Therefore, we now have multixact-specific freezing parameters: vacuum_multixact_freeze_min_age: when to remove multis as we come across them in vacuum (default to 5 million, i.e. early in comparison to Xid's default of 50 million) vacuum_multixact_freeze_table_age: when to force whole-table scans instead of scanning only the pages marked as not all visible in visibility map (default to 150 million, same as for Xids). Whichever of both which reaches the 150 million mark earlier will cause a whole-table scan. autovacuum_multixact_freeze_max_age: when for cause emergency, uninterruptible whole-table scans (default to 400 million, double as that for Xids). This means there shouldn't be more frequent emergency vacuuming than previously, unless multixacts are being used very rapidly. Backpatch to 9.3 where multixacts were made to persist enough to require freezing. To avoid an ABI break in 9.3, VacuumStmt has a couple of fields in an unnatural place, and StdRdOptions is split in two so that the newly added fields can go at the end. Patch by me, reviewed by Robert Haas, with additional input from Andres Freund and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/801c2dc72cb3c68a7c430bb244675b7a68fd541a">http://git.postgresql.org/pg/commitdiff/801c2dc72cb3c68a7c430bb244675b7a68fd541a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in another revision of a patch to make it possible to have multiple PL/pgsql plugins.</li>

<li>Alexander Korotkov and Marti Raudsepp traded patches for partial sort.</li>

<li>Hiroshi Inoue and Andres Freund traded patches to fix an issue with PGDLLIMPORT on Windows.</li>

<li>David Fetter sent in another revision of a patch to add UPDATE ... RETURNING BEFORE/AFTER.</li>

<li>Mitsumasa KONDO sent in another revision of a patch to add min and max execute statement times to pg_stat_statement.</li>

<li>Mark Kirkwood and Haribabu Kommi traded patches to fix an infelicity in autovacuum_cost_delay.</li>

<li>Bruce Momjian sent in a patch to display disabled system triggers separately from user ones in psql.</li>

<li>Christian Kruse sent in another revision of a patch to show xid and xmin in pg_stat_activity and pg_stat_replication.</li>

<li>MauMau sent in another revision of a patch to fix an issue where the WALs get much larger than needed during point-in-time recovery.</li>

<li>Gregory Stark and Tom Lane traded patches intended to fix an issue where the standby's data can be much larger than the primary's, even though theoretically they should be exact copies.</li>

<li>Vik Fearing sent in a patch to fix the documentation for nextVictimBuffer.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to store custom relopts.</li>

<li>Tom Lane sent in a patch to fix an issue with issue with GIN inserts under very high load.</li>

<li>Mitsumasa KONDO and Fabien COELHO traded patches to add a Gaussian distribution option to pgbench.</li>

<li>Bruce Momjian sent in two more revisions of a patch to remove references to long-unsupported versions of PostgreSQL from the documentation.</li>

<li>Amit Kapila sent in three more revisions of a patch to improve performance by reducing WAL for update operations.</li>

<li>Andres Freund sent in two more patch sets for logical changesets.</li>

<li>David Beck sent in a patch to add a hook after raw parsing, but before analyze.</li>

<li>Etsuro Fujita sent in another revision of a patch to implement INHERIT support for foreign tables.</li>

<li>Andres Freund sent in a patch to fix an omission in abfd192b where one of the error cases wasn't changed when WalSndLoop was changed to be able to return.</li>

<li>Andres Freund sent in a patch to separate two tests in WalSndLoop(), as they don't have the dependency the current statement would imply.</li>

<li>Bruce Momjian sent in two revisions of a patch to fix a memory leak in psql.</li>

<li>Andres Freund sent in patches to fix a memory ordering issue in LWLockRelease, WakeupWaiters, and WALInsertSlotRelease by using volatiles to avoid reordering.</li>

<li>Peter Eisentraut sent in a patch to hack together a fix for uuid-ossp on OSX.</li>

<li>Peter Eisentraut sent in another revision of a patch to allow for relocating tablespaces in pg_basebackup.</li>

<li>Bruce Momjian sent in another revision of a patch to fix an issue where abnormal heap fetches were occurring after VACUUM FULL.</li>

<li>Sergey Muraviov sent in another revision of a patch to make displaying wide tables in psql look better.</li>

<li>David Fetter sent in another revision of a patch to enable CREATE FOREIGN TABLE (... LIKE ...).</li>

</ul>