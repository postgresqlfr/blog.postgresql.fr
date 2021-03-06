---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 mai 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/05/09/Nouvelles-hebdomadaires-de-PostgreSQL-6-mai-2018"
---


<p>[ndt: Rencontre PostgreSQL à Lyon le 8 juin, entre midi et 14h&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pg_chameleon 2.0.6, un outil pour r&eacute;pliquer de MySQL vers PostgreSQL&nbsp;: <a target="_blank" href="https://pypi.python.org/pypi/pg_chameleon">https://pypi.python.org/pypi/pg_chameleon</a></li>

<li>repmgr 4.0.5, un gestionnaire de r&eacute;plication pour PostgreSQL&nbsp;: <a target="_blank" href="https://repmgr.org/docs/4.0/release-4.0.5.html">https://repmgr.org/docs/4.0/release-4.0.5.html</a></li>

<li>PyGreSQL 5.0.5, un connecteur Python pour PostgreSQL&nbsp;: <a target="_blank" href="http://www.pygresql.org/contents/changelog.html">http://www.pygresql.org/contents/changelog.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mai</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-05/">http://archives.postgresql.org/pgsql-jobs/2018-05/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: PostgreSQL Meetup Nantes #10 le 29 mai&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. Les inscriptions sont ouvertes jusqu'au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

<li>Le PUG de Portland organise un PGDay le 10 septembre 2018 &agrave; Portland, Oregon. L'appel &agrave; conf&eacute;renciers se passe par l&agrave;&nbsp;: <a target="_blank" href="https://goo.gl/forms/E0CiUQGSZGMYwh922">https://goo.gl/forms/E0CiUQGSZGMYwh922</a> <a target="_blank" href="https://pdx.postgresql.us/pdxpgday2018">https://pdx.postgresql.us/pdxpgday2018</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180506211041.GA19691@fetter.org">http://www.postgresql.org/message-id/20180506211041.GA19691@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Get more info about Windows can't-reattach-to-shared-memory errors. Commit 63ca350ef neglected to probe the state of things *before* the VirtualFree call, which now looks like it might be interesting. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/68e7e973d22274a089ce95200b3782f514f6d2f8">https://git.postgresql.org/pg/commitdiff/68e7e973d22274a089ce95200b3782f514f6d2f8</a></li>

<li>Avoid wrong results for power() with NaN input on more platforms. Buildfarm results show that the modern POSIX rule that 1 ^ NaN = 1 is not honored on *BSD until relatively recently, and really old platforms don't believe that NaN ^ 0 = 1 either. (This is unsurprising, perhaps, since SUSv2 doesn't require either behavior.) In hopes of getting to platform independent behavior, let's deal with all the NaN-input cases explicitly in dpow(). Note that numeric_power() doesn't know either of these special cases. But since that behavior is platform-independent, I think it should be addressed separately, and probably not back-patched. Discussion: <a target="_blank" href="https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A73E741@BPXM05GP.gisp.nec.co.jp">https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A73E741@BPXM05GP.gisp.nec.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6bdf1303b34bc630e8945ae3407ec7e8395c8fe5">https://git.postgresql.org/pg/commitdiff/6bdf1303b34bc630e8945ae3407ec7e8395c8fe5</a></li>

<li>Get still more info about Windows can't-reattach-to-shared-memory errors. After some thought about the info captured so far, it seems possible that MapViewOfFileEx is itself causing some DLL to get loaded into the space just freed by VirtualFree. The previous commit here didn't capture enough info to really prove the case for that, so let's add one more VirtualQuery in between those steps. Also, be sure to capture the post-Map state before we emit any log entries, just in case elog() is invoking some code not previously loaded. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/eb16011f4c08a8c2ddfbf0637b862ee1918dd9b2">https://git.postgresql.org/pg/commitdiff/eb16011f4c08a8c2ddfbf0637b862ee1918dd9b2</a></li>

<li>Fix bogus list-iteration code in pg_regress.c, affecting ecpg tests only. While looking at a recent buildfarm failure in the ecpg tests, I wondered why the pg_regress output claimed the stderr part of the test failed, when the regression diffs were clearly for the stdout part. Looking into it, the reason is that pg_regress.c's logic for iterating over three parallel lists is wrong, and has been wrong since it was written: it advances the "tag" pointer at a different place in the loop than the other two pointers. Fix that. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c5e46c7c3b9333616de9946f8e63df1576a19800">https://git.postgresql.org/pg/commitdiff/c5e46c7c3b9333616de9946f8e63df1576a19800</a></li>

<li>Dump full memory maps around failing Windows reattach code. This morning's results from buildfarm member dory make it pretty clear that something is getting mapped into the just-freed space, but not what that something is. Replace my minimalistic probes with a full dump of the process address space and module space, based on Noah's work at &lt;20170403065106.GA2624300%40tornado.leadboat.com&gt; This is all (probably) to get reverted once we have fixed the problem, but for now we need information. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6ba0cc4bd3a6d738eddf7e8aa2ef7b46cdd9ce8f">https://git.postgresql.org/pg/commitdiff/6ba0cc4bd3a6d738eddf7e8aa2ef7b46cdd9ce8f</a></li>

<li>Remove Windows module-list-dumping code. This code is evidently allocating memory and thus confusing matters even more. Let's see whether we can learn anything with just VirtualQuery. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f7df8043f08a9d00811fb4aa054ed3221f5f9b5e">https://git.postgresql.org/pg/commitdiff/f7df8043f08a9d00811fb4aa054ed3221f5f9b5e</a></li>

<li>Further effort at preventing memory map dump from affecting the results. Rather than elog'ing immediately, push the map data into a preallocated StringInfo. Perhaps this will prevent some of the mid-operation allocations that are evidently happening now. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ce07aff48f15a2fa4f91bc67efe1cb3cc9c14bcf">https://git.postgresql.org/pg/commitdiff/ce07aff48f15a2fa4f91bc67efe1cb3cc9c14bcf</a></li>

<li>Map and unmap the shared memory block before risking VirtualFree. The idea here is to get Windows' userspace infrastructure to allocate whatever space it needs for MapViewOfFileEx() before we release the locked-down space that we want to map the shared memory block into. This is a fairly brute-force attempt, and would likely (for example) fail with large shared memory on 32-bit Windows. We could perhaps ameliorate that by mapping only part of the shared memory block in this way, but for the moment I just want to see if this approach will fix dory's problem. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/73042b8d136fe985746dc762fcb2a4356460842d">https://git.postgresql.org/pg/commitdiff/73042b8d136fe985746dc762fcb2a4356460842d</a></li>

<li>Does it help to wait before reattaching?. Revert the map/unmap dance I tried in commit 73042b8d1; that helps not at all. Instead, speculate that the unwanted allocation is being done on another thread, and thus timing variations explain the apparent unpredictability. Temporarily add a 1-second sleep before the VirtualFree call, in hopes that any such other threads will quiesce and not jog our elbow. This is obviously not a desirable long-term fix, but as a means of investigation it seems useful. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/23078689a9921968ac0873b017be6e7f772f10bc">https://git.postgresql.org/pg/commitdiff/23078689a9921968ac0873b017be6e7f772f10bc</a></li>

<li>Tweak new jsonb_plperl test cases to work with old Perl versions. The previous coding here didn't actually produce Inf or NaN double values in Perl versions 5.8.x. Adopt a suggestion from stackoverflow. Discussion: <a target="_blank" href="https://postgr.es/m/28585.1525131438@sss.pgh.pa.us">https://postgr.es/m/28585.1525131438@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/827eb4393c8a06de0c8673888a5734170e218a1d">https://git.postgresql.org/pg/commitdiff/827eb4393c8a06de0c8673888a5734170e218a1d</a></li>

<li>Remove investigative code for can't-reattach-to-shared-memory errors. Revert commits 23078689a, 73042b8d1, ce07aff48, f7df8043f, 6ba0cc4bd, eb16011f4, 68e7e973d, 63ca350ef. We still have a problem here, but somebody who's actually a Windows developer will need to spend time on it. Discussion: <a target="_blank" href="https://postgr.es/m/25495.1524517820@sss.pgh.pa.us">https://postgr.es/m/25495.1524517820@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bcbf2346d69f6006f126044864dd9383d50d87b4">https://git.postgresql.org/pg/commitdiff/bcbf2346d69f6006f126044864dd9383d50d87b4</a></li>

<li>Remove jsonb_plperl test cases for Inf/NaN conversions. It turns out that old Perl versions (before about 5.10) don't have any very reliable way to generate Inf or NaN numeric values. Getting around that would require way more work than is really justified to test the code involved, so let's just drop these new test cases. Discussion: <a target="_blank" href="https://postgr.es/m/28585.1525131438@sss.pgh.pa.us">https://postgr.es/m/28585.1525131438@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6594ee280383b7548b006e7f96c8d06137fced57">https://git.postgresql.org/pg/commitdiff/6594ee280383b7548b006e7f96c8d06137fced57</a></li>

<li>Clean up warnings from -Wimplicit-fallthrough. Recent gcc can warn about switch-case fall throughs that are not explicitly labeled as intentional. This seems like a good thing, so clean up the warnings exposed thereby by labeling all such cases with comments that gcc will recognize. In files that already had one or more suitable comments, I generally matched the existing style of those. Otherwise I went with /* FALLTHROUGH */, which is one of the spellings approved at the more-restrictive-than-default level -Wimplicit-fallthrough=4. (At the default level you can also spell it /* FALL ?THRU */, and it's not picky about case. What you can't do is include additional text in the same comment, so some existing comments containing versions of this aren't good enough.) Testing with gcc 8.0.1 (Fedora 28's current version), I found that I also had to put explicit "break"s after elog(ERROR) or ereport(ERROR); apparently, for this purpose gcc doesn't recognize that those don't return. That seems like possibly a gcc bug, but it's fine because in most places we did that anyway; so this amounts to a visit from the style police. Discussion: <a target="_blank" href="https://postgr.es/m/15083.1525207729@sss.pgh.pa.us">https://postgr.es/m/15083.1525207729@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/41c912cad15955b5f9270ef3688a44e91d410d3d">https://git.postgresql.org/pg/commitdiff/41c912cad15955b5f9270ef3688a44e91d410d3d</a></li>

<li>Fix some assorted compiler warnings on Windows. Don't overflow the result type of constant expressions. Don't negate unsigned types. Define HAVE_STDBOOL_H for Visual C++ 2013 and later. Thomas Munro Reviewed-By: Michael Paquier and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com">https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b2328bf62b6465236e318d31a011ced5dccfd580">https://git.postgresql.org/pg/commitdiff/b2328bf62b6465236e318d31a011ced5dccfd580</a></li>

<li>Fix compiler warning on Windows. Commit 41c912cad caused MSVC to complain that not all control paths return a value. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com">https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fe4ecd08d81cfea7f0512189893cc02cf261ccde">https://git.postgresql.org/pg/commitdiff/fe4ecd08d81cfea7f0512189893cc02cf261ccde</a></li>

<li>Change SIZEOF_BOOL to 1 for Windows. For some reason it was previously defined as 0, which is silly. The only effect was to disable use of &lt;stdbool.h&gt;, which commit b2328bf62 intended to make possible. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com">https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6fe25c1358a2a9612f0b4ce841e68d74e408cebe">https://git.postgresql.org/pg/commitdiff/6fe25c1358a2a9612f0b4ce841e68d74e408cebe</a></li>

<li>Fix bogus code for extracting extended-statistics data from syscache. statext_dependencies_load and statext_ndistinct_load were not up to snuff, in addition to being randomly different from each other. In detail: * Deserialize the fetched bytea value before releasing the syscache entry, not after. This mistake causes visible regression test failures when running with -DCATCACHE_FORCE_RELEASE. Since it's not exposed by -DCLOBBER_CACHE_ALWAYS, I think there may be no production hazard here at present, but it's at least a latent bug. * Use DatumGetByteaPP not DatumGetByteaP to save a detoasting cycle for short stats values; the deserialize function has to be, and is, prepared for short-header values since its other caller uses PP. * Use a test-and-elog for null stats values in both functions, rather than a test-and-elog in one case and an Assert in the other. Perhaps Asserts would be sufficient in both cases, but I don't see a good argument for them being different. * Minor cosmetic changes to make these functions more visibly alike. Backpatch to v10 where this code came in. Amit Langote, minor additional hacking by me Discussion: <a target="_blank" href="https://postgr.es/m/1349aabb-3a1f-6675-9fc0-65e2ce7491dd@lab.ntt.co.jp">https://postgr.es/m/1349aabb-3a1f-6675-9fc0-65e2ce7491dd@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/447dbf7aa7909bca76048042d6734ee8f5249d0f">https://git.postgresql.org/pg/commitdiff/447dbf7aa7909bca76048042d6734ee8f5249d0f</a></li>

<li>Fix assorted compiler warnings seen in the buildfarm. Failure to use DatumGetFoo/FooGetDatum macros correctly, or at all, causes some warnings about sign conversion. This is just cosmetic at the moment but in principle it's a type violation, so clean up the instances I could find. autoprewarm.c and sharedfileset.c contained code that unportably assumed that pid_t is the same size as int. We've variously dealt with this by casting pid_t to int or to unsigned long for printing purposes; I went with the latter. Fix uninitialized-variable warning in RestoreGUCState. This is a live bug in some sense, but of no great significance given that nobody is very likely to care what "line number" is associated with a GUC that hasn't got a source file recorded. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fbb2e9a030ee7a3fa20ce402e4b1da9809b4eb52">https://git.postgresql.org/pg/commitdiff/fbb2e9a030ee7a3fa20ce402e4b1da9809b4eb52</a></li>

<li>Suppress some compiler warnings in plperl on Windows. Perl's XSUB.h header defines macros to replace libc functions. Our header port_win32.h does something similar earlier, so XSUB.h causes compiler warnings about macro redefinition. Undefine our macros before including XSUB.h. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com">https://postgr.es/m/CAEepm%3D3%3DTDYEXUEcHpEx%2BTwc31wo7PA0oBAiNt6sWmq93MW02A%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0996e4be047fbf476dacea5ffad42cdd3a36b731">https://git.postgresql.org/pg/commitdiff/0996e4be047fbf476dacea5ffad42cdd3a36b731</a></li>

<li>Improve our method for probing the availability of ARM CRC instructions. Instead of depending on glibc's getauxval() function, just try to execute the CRC code, and trap SIGILL if that happens. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/HE1PR0801MB1323D171938EABC04FFE7FA9E3110@HE1PR0801MB1323.eurprd08.prod.outlook.com">https://postgr.es/m/HE1PR0801MB1323D171938EABC04FFE7FA9E3110@HE1PR0801MB1323.eurprd08.prod.outlook.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1c72ec6f498945eb5981cdedd448aec3977477c8">https://git.postgresql.org/pg/commitdiff/1c72ec6f498945eb5981cdedd448aec3977477c8</a></li>

<li>Further improve code for probing the availability of ARM CRC instructions. Andrew Gierth pointed out that commit 1c72ec6f4 would yield the wrong answer on big-endian ARM systems, because the data being CRC'd would be different. To fix that, and avoid the rather unsightly hard-wired constant, simply compare the hardware and software implementations' results. While we're at it, also log the resulting decision at DEBUG1, and error out if the hw and sw results unexpectedly differ. Also, since this file must compile for both frontend and backend, avoid incorrect dependencies on backend-only headers. In passing, add a comment to postmaster.c about when the CRC function pointer will get initialized. Thomas Munro, based on complaints from Andrew Gierth and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/HE1PR0801MB1323D171938EABC04FFE7FA9E3110@HE1PR0801MB1323.eurprd08.prod.outlook.com">https://postgr.es/m/HE1PR0801MB1323D171938EABC04FFE7FA9E3110@HE1PR0801MB1323.eurprd08.prod.outlook.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a7a7387575b87a7ae551307a24835f549d530d14">https://git.postgresql.org/pg/commitdiff/a7a7387575b87a7ae551307a24835f549d530d14</a></li>

<li>Avoid portability issues in autoprewarm.c. autoprewarm.c mostly considered the number of blocks it might be dealing with as being int64. This is unnecessary, because NBuffers is declared as int, and there's been no suggestion that we might widen it in the foreseeable future. Moreover, using int64 is problematic because the code expected INT64_FORMAT to work with fscanf(), something we don't guarantee, and which indeed fails on some older buildfarm members. On top of that, the module randomly used uint32 rather than int64 variables to hold block counters in several places, so it would fail anyway if we ever did have NBuffers wider than that; and it also supposed that pg_qsort could sort an int64 number of elements, which is wrong on 32-bit machines (though no doubt a 32-bit machine couldn't actually have that many buffers). Hence, change all these variables to plain int. In passing, avoid shadowing one variable named i with another, and avoid casting away const in apw_compare_blockinfo. Discussion: <a target="_blank" href="https://postgr.es/m/7773.1525288909@sss.pgh.pa.us">https://postgr.es/m/7773.1525288909@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cddc4dc6c6c9bc6f9e8e7f81b5264e7265a5c070">https://git.postgresql.org/pg/commitdiff/cddc4dc6c6c9bc6f9e8e7f81b5264e7265a5c070</a></li>

<li>Rearrange makefile rules for running Gen_fmgrtab.pl. Make these rules look more like the ones associated with genbki.pl, to wit: * Use a stamp file to record when we last ran the script, instead of relying on the timestamps of the individual output files. * Take the knowledge out of backend/Makefile and put it in utils/Makefile where it belongs. I moved down the handling of errcodes.h and probes.h too, although those continue to be built by separate processes. In itself, this is just much-needed cleanup with little practical effect. However, by decoupling these makefile rules from the timestamps of the generated header files, we open the door to not advancing those timestamps unnecessarily, which will be taken advantage of by the next commit. msvc/Solution.pm should be taught to do things similarly, but I'll leave that for another commit. Discussion: <a target="_blank" href="https://postgr.es/m/16925.1525376229@sss.pgh.pa.us">https://postgr.es/m/16925.1525376229@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9bf28f96c7eb0c3630ef034679c426c2ee289aca">https://git.postgresql.org/pg/commitdiff/9bf28f96c7eb0c3630ef034679c426c2ee289aca</a></li>

<li>Avoid overwriting unchanged output files in genbki.pl and Gen_fmgrtab.pl. If a particular output file already exists with the contents it should have, leave it alone, so that its mod timestamp is not advanced. In builds using --enable-depend, this can avoid the need to recompile .c files whose included files didn't actually change. It's not clear whether it saves much of anything for users of ccache; but the cost of doing the file comparisons seems to be negligible, so we might as well do it. For developers using the MSVC toolchain, this will create a regression: msvc/Solution.pm will sometimes run genbki.pl or Gen_fmgrtab.pl unnecessarily. I'll look into fixing that separately. Discussion: <a target="_blank" href="https://postgr.es/m/16925.1525376229@sss.pgh.pa.us">https://postgr.es/m/16925.1525376229@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1f1cd9b5ddc6e7464c1c7416bcce7007fe3bc88c">https://git.postgresql.org/pg/commitdiff/1f1cd9b5ddc6e7464c1c7416bcce7007fe3bc88c</a></li>

<li>Blindly try to fix MSVC build's use of genbki.pl and Gen_fmgrtab.pl. We need to use a stamp file to record the runs of these scripts, as is done on the Unix side. I think I got it right, but can't test. While at it, extend this handmade dependency logic to also check the generating script files, as the makefiles do. Discussion: <a target="_blank" href="https://postgr.es/m/16925.1525376229@sss.pgh.pa.us">https://postgr.es/m/16925.1525376229@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bad51a49a4c0ee2dd87191f8aea5ca839c9dbf15">https://git.postgresql.org/pg/commitdiff/bad51a49a4c0ee2dd87191f8aea5ca839c9dbf15</a></li>

<li>Sync our copy of the timezone library with IANA release tzcode2018e. The non-cosmetic changes involve teaching the "zic" tzdata compiler about negative DST. While I'm not currently intending that we start using negative-DST data right away, it seems possible that somebody would try to use our copy of zic with bleeding-edge IANA data. So we'd better be out in front of this change code-wise, even though it doesn't matter for the data file we're shipping. Discussion: <a target="_blank" href="https://postgr.es/m/30996.1525445902@sss.pgh.pa.us">https://postgr.es/m/30996.1525445902@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b45f6613e0a475f908d93dbaa8612ccb9395f666">https://git.postgresql.org/pg/commitdiff/b45f6613e0a475f908d93dbaa8612ccb9395f666</a></li>

<li>First-draft release notes for 10.4. As usual, the release notes for other branches will be made by cutting these down, but put them up for community review first. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/488ccfe40a865e3f3c6343e2de026c37ba5a7d50">https://git.postgresql.org/pg/commitdiff/488ccfe40a865e3f3c6343e2de026c37ba5a7d50</a></li>

<li>Fix precedence problem in new Perl code. I think this bit of commit 1f1cd9b5d didn't do quite what I meant :-( <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/59cb323053f4ed582d4e71acaeb5770603f074db">https://git.postgresql.org/pg/commitdiff/59cb323053f4ed582d4e71acaeb5770603f074db</a></li>

<li>Revert "Test conversion of NaN between float4 and float8.". This reverts commit 55e0e458170c76c1a0074cd550a13ec47e38a3fa. It's served its purpose of demonstrating what was wrong on buildfarm member opossum. We could consider putting some kind of single-purpose hack into ftod() to make the test pass there; but I don't think it's worth the trouble, since there are surely many other places whether this platform bug could manifest. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5c4c771dafefa7d0ee80a6bd6955b7a3940452a1">https://git.postgresql.org/pg/commitdiff/5c4c771dafefa7d0ee80a6bd6955b7a3940452a1</a></li>

<li>Put in_range_float4_float8's work in-line. In commit 8b29e88cd, I'd dithered about whether to make in_range_float4_float8 be a standalone copy of the float in-range logic or have it punt to in_range_float8_float8. I went with the latter, which saves code space though at the cost of performance and readability. However, it emerges that this tickles a compiler or hardware bug on buildfarm member opossum. Test results from commit 55e0e4581 show conclusively that widening a float4 NaN to float8 produces Inf, not NaN, on that machine; which accounts perfectly for the window RANGE test failures it's been showing. We can dodge this problem by making in_range_float4_float8 be an independent function, so that it checks for NaN inputs before widening them. Ordinarily I'd not be very excited about working around such obviously broken functionality; but given that this was a judgment call to begin with, I don't mind reversing it. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cb3e9e40bc993128cd51795ea60ff7bed78cebb5">https://git.postgresql.org/pg/commitdiff/cb3e9e40bc993128cd51795ea60ff7bed78cebb5</a></li>

<li>Fix bootstrap parser so that its keywords are unreserved words. Mark Dilger pointed out that the bootstrap parser does not allow any of its keywords to appear as column values unless they're quoted, and proposed dealing with that by quoting such values in genbki.pl. Looking closer, though, we also have that problem with respect to table, column, and type names appearing in the .bki file: the parser would fail if any of those matched any of its keywords. While so far there have been no conflicts (that I've heard of), this seems like a booby trap waiting to catch somebody. Rather than clutter genbki.pl with enough quoting logic to handle all that, let's make the bootstrap parser grow up a little bit and treat its keywords as unreserved. Experimentation shows that it's fairly easy to do so with the exception of _null_, which I don't have a big problem with keeping as a reserved word. The only change needed is that we can't have the "close" command take an optional table name: it has to either require or forbid the table name to avoid shift/reduce conflicts. genbki.pl has historically always included the table name, so I took that option. The implementation has bootscanner.l passing forward the string value of each keyword, in case bootparse.y needs that. This avoids needing to know the precise spelling of each keyword in bootparse.y, which is good because that's not always obvious from the token name. Discussion: <a target="_blank" href="https://postgr.es/m/3024FC91-DB6D-4732-B31C-DF772DF039A0@gmail.com">https://postgr.es/m/3024FC91-DB6D-4732-B31C-DF772DF039A0@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d160882a17403d61bc04c5745493e027e60165ce">https://git.postgresql.org/pg/commitdiff/d160882a17403d61bc04c5745493e027e60165ce</a></li>

<li>Release notes for 10.4, 9.6.9, 9.5.13, 9.4.18, 9.3.23. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2667e019c61f392c6af28afeee43dbfdcc943d28">https://git.postgresql.org/pg/commitdiff/2667e019c61f392c6af28afeee43dbfdcc943d28</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Ignore file generated during pg_upgrade testing. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0146e32f9f54f8bc556307c4204a404f18c5663b">https://git.postgresql.org/pg/commitdiff/0146e32f9f54f8bc556307c4204a404f18c5663b</a></li>

<li>clean up pg_upgrade tmp_check under MSVC. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bb779006f4e1881de2c80409225e57e3a3e17d40">https://git.postgresql.org/pg/commitdiff/bb779006f4e1881de2c80409225e57e3a3e17d40</a></li>

<li>Allow MSYS as well as MINGW in Msys uname. Msys2's uname -s outputs a string beginning MSYS rather than MINGW as is output by Msys. Allow either in pg_upgrade's test.sh. Backpatch to all live branches. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/608a710195a4be20ad5f3e97b24db76aebe02808">https://git.postgresql.org/pg/commitdiff/608a710195a4be20ad5f3e97b24db76aebe02808</a></li>

<li>Provide for testing on python3 modules when under MSVC. This should have been done some years ago as promised in commit c4dcdd0c2. However, better late than never. Along the way do a little housekeeping, including using a simpler test for the python version being tested, and removing a redundant subroutine parameter. These changes only apply back to release 9.5. Backpatch to all live releases. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/966268c7621c4bca534961440b497a3270395fc2">https://git.postgresql.org/pg/commitdiff/966268c7621c4bca534961440b497a3270395fc2</a></li>

<li>Clear severity 5 perlcritic warnings from vcregress.pl. My recent update for python3 support used some idioms that are unapproved. This fixes them. Backpatch to all live branches like the original. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2b9bdda74485909a4a3067bf0ba3f0821e82660e">https://git.postgresql.org/pg/commitdiff/2b9bdda74485909a4a3067bf0ba3f0821e82660e</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Don't do logical replication of TRUNCATE of zero tables. When due to publication configuration, a TRUNCATE change ends up with zero tables to be published, don't send the message out, just skip it. It's not wrong, but obviously useless overhead. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/92e1583b439ffab1d20419998895932e4fbe32fd">https://git.postgresql.org/pg/commitdiff/92e1583b439ffab1d20419998895932e4fbe32fd</a></li>

<li>Write error messages about duplicate OIDs to stderr. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c5679256e93d8022b3cdd146a28f6a362a3c79e3">https://git.postgresql.org/pg/commitdiff/c5679256e93d8022b3cdd146a28f6a362a3c79e3</a></li>

<li>Remove "Generating" output from catalog scripts. So by default, they don't output anything if everything is well. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/867f8a1a-6cf0-d835-78d8-0844e4936241%402ndquadrant.com">https://www.postgresql.org/message-id/867f8a1a-6cf0-d835-78d8-0844e4936241%402ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/33a1c2145cd5eba2148e8288997f1d70058fc920">https://git.postgresql.org/pg/commitdiff/33a1c2145cd5eba2148e8288997f1d70058fc920</a></li>

<li>Remove plperl isnan hack. The code previously undefined isnan because of a compiler warning on MinGW. Since we now need to use isnan, we can't do that anymore. We might need a different solution if the compiler warning is too annoying. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b04ebca6cd845c0a51da71efa3e2c57d32e823cd">https://git.postgresql.org/pg/commitdiff/b04ebca6cd845c0a51da71efa3e2c57d32e823cd</a></li>

<li>doc: Update limitations of partitions. David Rowley, Amit Langote <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5a6ab0a1b157a27da7160565ee2f1815e94a6122">https://git.postgresql.org/pg/commitdiff/5a6ab0a1b157a27da7160565ee2f1815e94a6122</a></li>

<li>Document that subscription tests require hstore. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fa94fa6d8293c3a3cfdf0514f8bbd40b68bf3beb">https://git.postgresql.org/pg/commitdiff/fa94fa6d8293c3a3cfdf0514f8bbd40b68bf3beb</a></li>

<li>Prevent infinity and NaN in jsonb/plperl transform. jsonb uses numeric internally, and numeric can store NaN, but that is not allowed by jsonb on input, so we shouldn't store it. Also prevent infinity to get a consistent error message. (numeric input would reject infinity anyway.) Reported-by: Dagfinn Ilmari Manns&#65533;ker &lt;ilmari@ilmari.org&gt; Reviewed-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e348e7ae5727a6da8678036d748e5c5af7deb6c9">https://git.postgresql.org/pg/commitdiff/e348e7ae5727a6da8678036d748e5c5af7deb6c9</a></li>

<li>doc: Correct update on limitations of partitions. Amit Langote <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bcded2609ade6204badde506025b414c8e6ef0cd">https://git.postgresql.org/pg/commitdiff/bcded2609ade6204badde506025b414c8e6ef0cd</a></li>

<li>Prevent NaN in jsonb/plpython transform. As in e348e7ae5727a6da8678036d748e5c5af7deb6c9 for jsonb/plperl, prevent putting a NaN into a jsonb numeric field. Tests for this had been removed in 6278a2a262b63faaf47eb2371f6bcb5b6e3ff118, but in case they are ever resurrected: This would change the output of the test1nan() function to an error. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/40f52b16dd31aa9ddc3bd42daa78459562693567">https://git.postgresql.org/pg/commitdiff/40f52b16dd31aa9ddc3bd42daa78459562693567</a></li>

<li>Fix SPI error cleanup and memory leak. Since the SPI stack has been moved from TopTransactionContext to TopMemoryContext, setting _SPI_stack to NULL in AtEOXact_SPI() leaks memory. In fact, we don't need to do that anymore: We just leave the allocated stack around for the next SPI use. Also, refactor the SPI cleanup so that it is run both at transaction end and when returning to the main loop on an exception. The latter is necessary when a procedure calls a COMMIT or ROLLBACK command that itself causes an error. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/30c66e77be1d890c3cca766259c0bec80bcac1b5">https://git.postgresql.org/pg/commitdiff/30c66e77be1d890c3cca766259c0bec80bcac1b5</a></li>

<li>Tweak tests to support Python 3.7. Python 3.7 removes the trailing comma in the repr() of BaseException (see &lt;<a target="_blank" href="https://bugs.python.org/issue30399%3E),">https://bugs.python.org/issue30399&gt;),</a> leading to test output differences. Work around that by composing the equivalent test output in a more manual way. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fa03769e4c4bf0911da71fba2501006b05ea195a">https://git.postgresql.org/pg/commitdiff/fa03769e4c4bf0911da71fba2501006b05ea195a</a></li>

<li>Update expected files for older Python versions. neglected in commit fa03769e4c4bf0911da71fba2501006b05ea195a <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7d8679975f650d1150d706c8b6a5f04f08dcdd00">https://git.postgresql.org/pg/commitdiff/7d8679975f650d1150d706c8b6a5f04f08dcdd00</a></li>

<li>pg_dump: Use current_database() instead of PQdb(). For querying pg_database about information about the database being dumped, look up by using current_database() instead of the value obtained from PQdb(). When using a connection proxy, the value from PQdb() might not be the real name of the database. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1cd2445c9985719ea1bb9f644373481c8702af64">https://git.postgresql.org/pg/commitdiff/1cd2445c9985719ea1bb9f644373481c8702af64</a></li>

<li>Remove extra newlines after PQerrorMessage(). <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2f52518773bb01384ef20831fd9d8c76dbd59dc5">https://git.postgresql.org/pg/commitdiff/2f52518773bb01384ef20831fd9d8c76dbd59dc5</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs comments: clarify why not to use UTF8 still in docs. Back branches still are SGML. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3960fa5f6396865ded34d9276324e9a31857cff1">https://git.postgresql.org/pg/commitdiff/3960fa5f6396865ded34d9276324e9a31857cff1</a></li>

<li>doc comments: rendering engines are another UTF8 restriction. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81ff9ec8f8b12e03f76062000b322da6568bc941">https://git.postgresql.org/pg/commitdiff/81ff9ec8f8b12e03f76062000b322da6568bc941</a></li>

<li>docs: Remove tabs recently introduced by me. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7f6570b3a8d1aa8e90ab0868eefa5a4236b0ada3">https://git.postgresql.org/pg/commitdiff/7f6570b3a8d1aa8e90ab0868eefa5a4236b0ada3</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix interaction of foreign tuple routing with remote triggers. Without these fixes, changes to the inserted tuple made by remote triggers are ignored when building local RETURNING tuples. In the core code, call ExecInitRoutingInfo at a later point from within ExecInitPartitionInfo so that the FDW callback gets invoked after the returning list has been built. But move CheckValidResultRel out of ExecInitRoutingInfo so that it can happen at an earlier stage. In postgres_fdw, refactor assorted deparsing functions to work with the RTE rather than the PlannerInfo, which saves us having to construct a fake PlannerInfo in cases where we don't have a real one. Then, we can pass down a constructed RTE that yields the correct deparse result when no real one exists. Unfortunately, this necessitates a hack that understands how the core code manages RT indexes for update tuple routing, which is ugly, but we don't have a better idea right now. Original report, analysis, and patch by Etsuro Fujita. Heavily refactored by me. Then worked over some more by Amit Langote. Discussion: <a target="_blank" href="http://postgr.es/m/5AD4882B.10002@lab.ntt.co.jp">http://postgr.es/m/5AD4882B.10002@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/37a3058bc7c8224d4c0d8b36176d821636a1f90e">https://git.postgresql.org/pg/commitdiff/37a3058bc7c8224d4c0d8b36176d821636a1f90e</a></li>

<li>Remove now-unnecessary cast. Etsuro Fujita Discussion: <a target="_blank" href="http://postgr.es/m/5AE99BA7.9060001@lab.ntt.co.jp">http://postgr.es/m/5AE99BA7.9060001@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a365f52d58317e3b24e06564e1f6474ffa3221d4">https://git.postgresql.org/pg/commitdiff/a365f52d58317e3b24e06564e1f6474ffa3221d4</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Improve representation of 'moved partitions' indicator on deleted tuples. Previously a tuple that has been moved to a different partition (see f16241bef7c), set the block number on the old tuple to an invalid value to indicate that fact. But the tuple offset was left untouched. That turned out to trigger a wal_consistency_checking failure as reported by Peter Geoghegan, as the offset wasn't always overwritten during WAL replay. Heikki observed that we're wasting valuable data by not putting information also in the offset. Thus set that to MovedPartitionsOffsetNumber when a tuple indicates it has moved. We continue to set the block number to MovedPartitionsBlockNumber, as that seems more likely to cause problems for code not updated to know about moved tuples. As t_ctid's offset number is now always set, this refinement also fixes the wal_consistency_checking issue. This technically is a minor disk format break, with previously created moved tuples not being recognized anymore. But since there not even has been a beta release since f16241bef7c... Reported-By: Peter Geoghegan Author: Heikki Linnakangas, Amul Sul Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-Wzm9ty+1BX7-GMNJ=xPRg67oJTVeDNdA9LSyJJtMgRiCMA@mail.gmail.com">https://postgr.es/m/CAH2-Wzm9ty+1BX7-GMNJ=xPRg67oJTVeDNdA9LSyJJtMgRiCMA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1667148a4dd98cea28b8b53d57dbc1eece1b0b5c">https://git.postgresql.org/pg/commitdiff/1667148a4dd98cea28b8b53d57dbc1eece1b0b5c</a></li>

<li>Further -Wimplicit-fallthrough cleanup. Tom's earlier commit in 41c912cad159 didn't update a few cases that are only encountered with the non-standard --with-llvm config flag. Additionally there's also one case that appears to be a deficiency in gcc's (up to trunk as of a few days ago) detection of "fallthrough" comments - changing the placement slightly fixes that. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20180502003239.wfnqu7ekz7j7imm4@alap3.anarazel.de">https://postgr.es/m/20180502003239.wfnqu7ekz7j7imm4@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2993435dbae5deb8d2f6c2a715690a5aef4eddb8">https://git.postgresql.org/pg/commitdiff/2993435dbae5deb8d2f6c2a715690a5aef4eddb8</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix some sloppiness in the new BufFileSize() and BufFileAppend() functions. There were three related issues: * BufFileAppend() incorrectly reset the seek position on the 'source' file. As a result, if you had called BufFileRead() on the file before calling BufFileAppend(), it got confused, and subsequent calls would read/write at wrong position. * BufFileSize() did not work with files opened with BufFileOpenShared(). * FileGetSize() only worked on temporary files. To fix, change the way BufFileSize() works so that it works on shared files. Remove FileGetSize() altogether, as it's no longer needed. Remove buffilesize from TapeShare struct, as the leader process can simply call BufFileSize() to get the tape's size, there's no need to pass it through shared memory anymore. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAH2-WznEDYe_NZXxmnOfsoV54oFkTdMy7YLE2NPBLuttO96vTQ@mail.gmail.com">https://www.postgresql.org/message-id/CAH2-WznEDYe_NZXxmnOfsoV54oFkTdMy7YLE2NPBLuttO96vTQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/445e31bdc749e56376993232e5c2cc4931161322">https://git.postgresql.org/pg/commitdiff/445e31bdc749e56376993232e5c2cc4931161322</a></li>

<li>Remove remaining references to version-0 calling convention in docs. Support for version-0 calling convention was removed in PostgreSQL v10. Change the SPI example to use version 1 convention, so that it actually works. Author: John Naylor Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAJVSVGVydmhLBdm80Rw3G8Oq5TnA7eCxUv065yoZfNfLbF1tzA@mail.gmail.com">https://www.postgresql.org/message-id/CAJVSVGVydmhLBdm80Rw3G8Oq5TnA7eCxUv065yoZfNfLbF1tzA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f66912b0a0387aab5f5bbcd9d56ab92200395d2e">https://git.postgresql.org/pg/commitdiff/f66912b0a0387aab5f5bbcd9d56ab92200395d2e</a></li>

<li>Fix scenario where streaming standby gets stuck at a continuation record. If a continuation record is split so that its first half has already been removed from the master, and is only present in pg_wal, and there is a recycled WAL segment in the standby server that looks like it would contain the second half, recovery would get stuck. The code in XLogPageRead() incorrectly started streaming at the beginning of the WAL record, even if we had already read the first page. Backpatch to 9.4. In principle, older versions have the same problem, but without replication slots, there was no straightforward mechanism to prevent the master from recycling old WAL that was still needed by standby. Without such a mechanism, I think it's reasonable to assume that there's enough slack in how many old segments are kept around to not run into this, or you have a WAL archive. Reported by Jonathon Nelson. Analysis and patch by Kyotaro HORIGUCHI, with some extra comments by me. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CACJqAM3xVz0JY1XFDKPP%2BJoJAjoGx%3DGNuOAshEDWCext7BFvCQ%40mail.gmail.com">https://www.postgresql.org/message-id/CACJqAM3xVz0JY1XFDKPP%2BJoJAjoGx%3DGNuOAshEDWCext7BFvCQ%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0668719801838aa6a8bda330ff9b3d20097ea844">https://git.postgresql.org/pg/commitdiff/0668719801838aa6a8bda330ff9b3d20097ea844</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Fix pg_dump support for pre-8.2 versions. Unify indnkeys/indnatts/indnkeyatts usage for all version of query to get index information, remove indnkeys column from query as unused. Author: Marina Polyakova Noticed by: Peter Eisentraut <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ac7a7e328f3e7eb89874860e554517c24dac9150">https://git.postgresql.org/pg/commitdiff/ac7a7e328f3e7eb89874860e554517c24dac9150</a></li>

<li>Add HOLD_INTERRUPTS section into FinishPreparedTransaction. If an interrupt arrives in the middle of FinishPreparedTransaction and any callback decide to call CHECK_FOR_INTERRUPTS (e.g. RemoveTwoPhaseFile can write a warning with ereport, which checks for interrupts) then it's possible to leave current GXact undeleted. Backpatch to all supported branches Stas Kelvich Discussion: i<a target="_blank" href="https://www.postgresql.org/message-id/3AD85097-A3F3-4EBA-99BD-C38EDF8D2949@postgrespro.ru">https://www.postgresql.org/message-id/3AD85097-A3F3-4EBA-99BD-C38EDF8D2949@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8f9be261f43772ccee2eae94d971bac6557cbe6a">https://git.postgresql.org/pg/commitdiff/8f9be261f43772ccee2eae94d971bac6557cbe6a</a></li>

<li>Re-think predicate locking on GIN indexes. The principle behind the locking was not very well thought-out, and not documented. Add a section in the README to explain how it's supposed to work, and change the code so that it actually works that way. This fixes two bugs: 1. If fast update was turned on concurrently, subsequent inserts to the pending list would not conflict with predicate locks that were acquired earlier, on entry pages. The included 'predicate-gin-fastupdate' test demonstrates that. To fix, make all scans acquire a predicate lock on the metapage. That lock represents a scan of the pending list, whether or not there is a pending list at the moment. Forget about the optimization to skip locking/checking for locks, when fastupdate=off. 2. If a scan finds no match, it still needs to lock the entry page. The point of predicate locks is to lock the gabs between values, whether or not there is a match. The included 'predicate-gin-nomatch' test tests that case. In addition to those two bug fixes, this removes some unnecessary locking, following the principle laid out in the README. Because all items in a posting tree have the same key value, a lock on the posting tree root is enough to cover all the items. (With a very large posting tree, it would possibly be better to lock the posting tree leaf pages instead, so that a "skip scan" with a query like "A & B", you could avoid unnecessary conflict if a new tuple is inserted with A but !B. But let's keep this simple.) Also, some spelling fixes. Author: Heikki Linnakangas with some editorization by me Review: Andrey Borodin, Alexander Korotkov Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/0b3ad2c2-2692-62a9-3a04-5724f2af9114@iki.fi">https://www.postgresql.org/message-id/0b3ad2c2-2692-62a9-3a04-5724f2af9114@iki.fi</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0bef1c0678d94436f80450d562a866bb6fa5e509">https://git.postgresql.org/pg/commitdiff/0bef1c0678d94436f80450d562a866bb6fa5e509</a></li>

<li>Don't truncate away non-key attributes for leftmost downlinks. nbtsort.c does not need to truncate away non-key attributes for the minimum key of the leftmost page on a level, since this is only used to build a minus infinity downlink for the level's leftmost page. Truncating away non-key attributes in advance of truncating away all attributes in _bt_sortaddtup() does not affect the correctness of CREATE INDEX, but it is misleading. Author: Peter Geoghegan Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAH2-WzkAS2M3ussHG-s_Av=Zo6dPjOxyu5fNRkYnxQV+YzGQ4w@mail.gmail.com">https://www.postgresql.org/message-id/CAH2-WzkAS2M3ussHG-s_Av=Zo6dPjOxyu5fNRkYnxQV+YzGQ4w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2a9e04f0a8ada12d4af4f095e4dbe164e2983bce">https://git.postgresql.org/pg/commitdiff/2a9e04f0a8ada12d4af4f095e4dbe164e2983bce</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Don't mark pages all-visible spuriously. Dan Wood diagnosed a long-standing problem that pages containing tuples that are locked by multixacts containing live lockers may spuriously end up as candidates for getting their all-visible flag set. This has the long-term effect that multixacts remain unfrozen; this may previously pass undetected, but since commit XYZ it would be reported as "ERROR: found multixact 134100944 from before relminmxid 192042633" because when a later vacuum tries to freeze the page it detects that a multixact that should have gotten frozen, wasn't. Dan proposed a (correct) patch that simply sets a variable to its correct value, after a bogus initialization. But, per discussion, it seems better coding to avoid the bogus initializations altogether, since they could give rise to more bugs later. Therefore this fix rewrites the logic a little bit to avoid depending on the bogus initializations. This bug was part of a family introduced in 9.6 by commit a892234f830e; later, commit 38e9f90a227d fixed most of them, but this one was unnoticed. Authors: Dan Wood, Pavan Deolasee, &#65533;lvaro Herrera Reviewed-by: Masahiko Sawada, Pavan Deolasee, &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/84EBAC55-F06D-4FBE-A3F3-8BDA093CE3E3@amazon.com">https://postgr.es/m/84EBAC55-F06D-4FBE-A3F3-8BDA093CE3E3@amazon.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d2599ecfcc74fea9fad1720a70210a740c716730">https://git.postgresql.org/pg/commitdiff/d2599ecfcc74fea9fad1720a70210a740c716730</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Thomas Munro sent in a patch to avoid counting zero-filled buffers as 'read' in EXPLAIN.</p>

<p>Amit Langote sent in a patch to fix an issue where stats_ext test fails with -DCATCACHE_FORCE_RELEASE.</p>

<p>Stas Kelvich sent in a patch to implement global snapshots.</p>

<p>Micha&#65533;l Paquier sent in a patch to fix gaps in modules with handling of partitioned indexes.</p>

<p>John Naylor sent in a patch to replace the /ad hoc/ format for conversion functions.</p>

<p>Dmitry Dolgov sent in a patch to enable logging statistics for full-page writes.</p>

<p>Robert Haas sent in a patch to fix an issue which caused explain buffers to have the wrong counter with parallel plans.</p>

<p>Peter Eisentraut sent in a patch to PL/pgSQL to flatten TOAST data in nonatomic context.</p>

<p>Tom Lane sent in a patch to prevents overwriting unchanged headers.</p>

<p>Aleksandr Parfenov sent in a patch to optimize the use of immutable functions as relations.</p>

<p>Ildar Musin sent in a patch to add a MAP syntax for applying functions to arrays.</p>

<p>Sergei Kornilov sent in a patch to enable reloading recovery.conf during recovery.</p>

<p>&#65533;lvaro Herrera sent in another revision of a patch to fix a bug which resulted in VM map freeze corruption.</p>

<p>Takayuki Tsunakawa sent in a patch to correct some omissions from the documentation of the new table partitioning feature.</p>

<p>Thomas Munro sent in a patch to fix const warnings when building with --enable-dtrace.</p>

<p>Andrew Dunstan sent in two revisions of a patch to add some vertical whitespace to structures so that the enclosing braces etc appear on their own lines.</p>