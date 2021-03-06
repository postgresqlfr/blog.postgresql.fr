---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 mai 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/06/01/Nouvelles-hebdomadaires-de-PostgreSQL-29-mai-2011"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgmp 1.0, une extension &agrave; PostgreSQL g&eacute;rant l'<a href="http://fr.wikipedia.org/wiki/Arithm%C3%A9tique_multipr%C3%A9cision">arithm&eacute;tique multipr&eacute;cision</a>, a &eacute;t&eacute; publi&eacute;e sur PGXN&nbsp;: 

<a target="_blank" href="http://pgmp.projects.postgresql.org/">http://pgmp.projects.postgresql.org/</a> <a target="_blank" href="http://pgxn.org/dist/pgmp/">http://pgxn.org/dist/pgmp/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PG Session 2, sur PostGIS, se tiendra &agrave; Paris le 23 juin. Le programme est disponible sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/2/">http://www.postgresql-sessions.org/en/2/</a></li>

<li>CHAR(11), la conf&eacute;rence PostgreSQL sur le <em>clustering</em>, la haute disponibilit&eacute; et la r&eacute;plication accepte &agrave; pr&eacute;sent les inscriptions et r&eacute;servations. Dates&nbsp;: 11 &amp; 12 juillet 2011 &agrave; Cambridge, Royaume-Uni&nbsp;: 

<a target="_blank" href="http://www.char11.org/">http://www.char11.org/</a></li>

<li>La "PgCon China" 2011 aura lieu &agrave; Guangzhou (Canton) les 15 &amp; 16 juillet 2011&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Pgconchina2011">http://wiki.postgresql.org/wiki/Pgconchina2011</a></li>

<li>Le PDXPUG se chargera d'accueillir le PgDay, dimanche 24 juillet 2011, la veille de l'OSCON &agrave; Portland dans l'Oregon (&Eacute;tats-Unis). Plus de d&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://pugs.postgresql.org/node/1663">http://pugs.postgresql.org/node/1663</a></li>

<li>Postgres Open 2011, conf&eacute;rence ayant pour th&egrave;me les "&eacute;volutions brutales dans l'industrie de la base de donn&eacute;es", aura lieu du 14 au 16 septembre 2011 &agrave; Chicago (Illinois, &Eacute;tats-Unis) &agrave; l'h&ocirc;tel "<em>Westin Michigan Avenue</em>"&nbsp;: 

<a target="_blank" href="http://postgresopen.org">http://postgresopen.org</a></li>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San Jose (Californie, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110529">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Install defenses against overflow in BuildTupleHashTable(). The planner can sometimes compute very large values for numGroups, and in cases where we have no alternative to building a hashtable, such a value will get fed directly to BuildTupleHashTable as its nbuckets parameter. There were two ways in which that could go bad. First, BuildTupleHashTable declared the parameter as "int" but most callers were passing "long"s, so on 64-bit machines undetected overflow could occur leading to a bogus negative value. The obvious fix for that is to change the parameter to "long", which is what I've done in HEAD. In the back branches that seems a bit risky, though, since third-party code might be calling this function. So for them, just put in a kluge to treat negative inputs as INT_MAX. Second, hash_create can go nuts with extremely large requested table sizes (notably, my_log2 becomes an infinite loop for inputs larger than LONG_MAX/2). What seems most appropriate to avoid that is to bound the initial table size request to work_mem. This fixes bug #6035 reported by Daniel Schreiber. Although the reported case only occurs back to 8.4 since it involves WITH RECURSIVE, I think it's a good idea to install the defenses in all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/299d1716525c659f0e02840e31fbe4dea3cc796c">http://git.postgresql.org/pg/commitdiff/299d1716525c659f0e02840e31fbe4dea3cc796c</a></li>

<li>Lobotomize typmod check in convert_tuples_by_position, back branches only. convert_tuples_by_position was rejecting attempts to coerce a record field with -1 typmod to the same type with a non-default typmod. This is in fact the "correct" thing to do (since we're just going to do a type relabeling, not invoke any length-conversion cast function); but it results in rejecting valid cases like bug #6020, because the source record's tupdesc is built from Params that don't have typmod assigned. Since that's a regression from previous versions, which accepted this code, we have to do something about it. In HEAD, I've fixed the problem properly by causing the Params to receive the correct typmods; but the potential for incidental behavioral changes seems high enough to make it unattractive to make the same change in released branches. (And it couldn't be fixed that way in 8.4 anyway...) Hence this patch just modifies convert_tuples_by_position to not complain if either the input or the output tupdesc has typmod -1. This is still a shade tighter checking than we did before 9.0, since before that plpgsql failed to consider typmods at all when checking record compatibility. (convert_tuples_by_position is currently used only by plpgsql, so we're not affecting other behavior.) Back-patch to 8.4, since we recently back-ported convert_tuples_by_position into that branch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e48433e9f81d6aceef2b538f1783fbcc91e1074f">http://git.postgresql.org/pg/commitdiff/e48433e9f81d6aceef2b538f1783fbcc91e1074f</a></li>

<li>Make plpgsql complain about conflicting IN and OUT parameter names. The core CREATE FUNCTION code only enforces that IN parameter names are non-duplicate, and that OUT parameter names are separately non-duplicate. This is because some function languages might not have any confusion between the two. But in plpgsql, such names are all in the same namespace, so we'd better disallow it. Per a recent complaint from Dan S. Not back-patching since this is a small issue and the change could cause unexpected failures if we started to enforce it in a minor release. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59a4a571d396ec00a7e363dca8b2f5eb2d8307ad">http://git.postgresql.org/pg/commitdiff/59a4a571d396ec00a7e363dca8b2f5eb2d8307ad</a></li>

<li>Avoid uninitialized bits in the result of QTN2QT(). Found with additional valgrind testing. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc24fb418d8da7ed93f9cd936f7da8fc7e0381bf">http://git.postgresql.org/pg/commitdiff/cc24fb418d8da7ed93f9cd936f7da8fc7e0381bf</a></li>

<li>Adjust configure's probe for libselinux so it rejects too-old versions. We need at least version 2.0.93, so probe for a function that was added in that version. Kaigai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ff1f6a78c4fb48337f671f1586839cef5d4b940">http://git.postgresql.org/pg/commitdiff/8ff1f6a78c4fb48337f671f1586839cef5d4b940</a></li>

<li>Cleanup for pull-up-isReset patch. Clear isReset before, not after, calling the context-specific alloc method, so as to preserve the option to do a tail call in MemoryContextAlloc (and also so this code isn't assuming that a failed alloc call won't have changed the context's state before failing). Fix missed direct invocation of reset method. Reformat a comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b23aeb6519651146cf35b2b91d24596f37b40794">http://git.postgresql.org/pg/commitdiff/b23aeb6519651146cf35b2b91d24596f37b40794</a></li>

<li>Grammar cleanup for src/test/isolation/README. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/446d5d32aedcca378578c8fe1c2eed34df92a238">http://git.postgresql.org/pg/commitdiff/446d5d32aedcca378578c8fe1c2eed34df92a238</a></li>

<li>Suppress extensions in partial dumps. We initially had pg_dump emit CREATE EXTENSION commands unconditionally. However, pg_dump has long been in the habit of not dumping procedural language definitions when a --schema or --table switch is given. It seems appropriate to handle extensions the same way, since like PLs they are SQL objects that are not in any particular schema. Per complaint from Adrian Schreyer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b158d1baed859971c1aa792bff6a7e1f721cf91">http://git.postgresql.org/pg/commitdiff/7b158d1baed859971c1aa792bff6a7e1f721cf91</a></li>

<li>Adjust configure to use "+Olibmerrno" with HP-UX C compiler, if possible. This is reported to be necessary on some versions of that OS. In service of this, cause PGAC_PROG_CC_CFLAGS_OPT to reject switches that result in compiler warnings, since on yet other versions of that OS, the switch does nothing except provoke a warning. Report and patch by Ibrar Ahmed, further tweaking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44404f394517f89a0bebb1aaace6e64ad79d2817">http://git.postgresql.org/pg/commitdiff/44404f394517f89a0bebb1aaace6e64ad79d2817</a></li>

<li>Make decompilation of optimized CASE constructs more robust. We had some hacks in ruleutils.c to cope with various odd transformations that the optimizer could do on a CASE foo WHEN "CaseTestExpr = RHS" clause. However, the fundamental impossibility of covering all cases was exposed by Heikki, who pointed out that the "=" operator could get replaced by an inlined SQL function, which could contain nearly anything at all. So give up on the hacks and just print the expression as-is if we fail to recognize it as "CaseTestExpr = RHS". (We must cover that case so that decompiled rules print correctly; but we are not under any obligation to make EXPLAIN output be 100% valid SQL in all cases, and already could not do so in some other cases.) This approach requires that we have some printable representation of the CaseTestExpr node type; I used "CASE_TEST_EXPR". Back-patch to all supported branches, since the problem case fails in all. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3987e9e62046bd800d8d08566ed49fee1ae6cb86">http://git.postgresql.org/pg/commitdiff/3987e9e62046bd800d8d08566ed49fee1ae6cb86</a></li>

<li>Preserve caller's memory context in ProcessCompletedNotifies(). This is necessary to avoid long-term memory leakage, because the main loop in PostgresMain expects to be executing in MessageContext, and hence is a bit sloppy about freeing stuff that is only needed for the duration of processing the current client message. The known case of an actual leak is when encoding conversion has to be done on the incoming command string, but there might be others. Per report from Per-Olov Esgard. Back-patch to 9.0, where the bug was introduced by the LISTEN/NOTIFY rewrite. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90857b48e1f69dbca52f498bd444190d36dbd73f">http://git.postgresql.org/pg/commitdiff/90857b48e1f69dbca52f498bd444190d36dbd73f</a></li>

<li>Improve corner cases in pg_ctl's new wait-for-postmaster-startup code. With "-w -t 0", we should report "still starting up", not "ok". If we fall out of the loop without ever being able to call PQping (because we were never able to construct a connection string), report "no response", not "ok". This gets rid of corner cases in which we'd claim the server had started even though it had not. Also, if the postmaster.pid file is not there at any point after we've waited 5 seconds, assume the postmaster has failed and report that, rather than almost-certainly-fruitlessly continuing to wait. The pidfile should appear almost instantly even when there is extensive startup work to do, so 5 seconds is already a very conservative figure. This part is per a gripe from MauMau --- there might be better ways to do it, but nothing simple enough to get done for 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bae3bc9be4a025df089f0a0c2f547fa538a97bc">http://git.postgresql.org/pg/commitdiff/0bae3bc9be4a025df089f0a0c2f547fa538a97bc</a></li>

<li>Fix null-dereference crash in parse_xml_decl(). parse_xml_decl's header comment says you can pass NULL for any unwanted output parameter, but it failed to honor this contract for the "standalone" flag. The only currently-affected caller is xml_recv, so the net effect is that sending a binary XML value containing a standalone parameter in its xml declaration would crash the backend. Per bug #6044 from Christopher Dillard. In passing, remove useless initializations of parse_xml_decl's output parameters in xml_parse. Back-patch to 8.3, where this code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e1365a9650678a531106120e40676a9417971f1">http://git.postgresql.org/pg/commitdiff/5e1365a9650678a531106120e40676a9417971f1</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c58b945e23e63a0baca67b216a5225b34de84cce">http://git.postgresql.org/pg/commitdiff/c58b945e23e63a0baca67b216a5225b34de84cce</a></li>

<li>Add a "local" replication sample entry. Also adjust alignment a bit to distinguish commented out from comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f50655900a865d65d17bb79f57f1d8c48b1cb266">http://git.postgresql.org/pg/commitdiff/f50655900a865d65d17bb79f57f1d8c48b1cb266</a></li>

<li>Message improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8d45152fa04c77370fc16faf0727c0f52739f0a">http://git.postgresql.org/pg/commitdiff/c8d45152fa04c77370fc16faf0727c0f52739f0a</a></li>

<li>Put options in some sensible order. For the --help output and reference pages of pg_dump, pg_dumpall, pg_restore, put the options in some consistent, mostly alphabetical, and consistent order, rather than newest option last or something like that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3439e40f9afa5e8702c8e3e7d0b09a0cb4b07e73">http://git.postgresql.org/pg/commitdiff/3439e40f9afa5e8702c8e3e7d0b09a0cb4b07e73</a></li>

<li>Remove literal tabs from message strings 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d7d6386d701ebf36a4de4c2a8c32826a999e437">http://git.postgresql.org/pg/commitdiff/4d7d6386d701ebf36a4de4c2a8c32826a999e437</a></li>

<li>Avoid compiler warning when building without zlib. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b6dabc452b9357e39b63a94c109e2293f13a555">http://git.postgresql.org/pg/commitdiff/1b6dabc452b9357e39b63a94c109e2293f13a555</a></li>

<li>Allow pg_basebackup compressed tar output to stdout 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d68714b29c42d10437b56372d6b0a1dda1e7d7f5">http://git.postgresql.org/pg/commitdiff/d68714b29c42d10437b56372d6b0a1dda1e7d7f5</a></li>

<li>Correct description of log_connections and log_disconnections. The previous claim when these parameters could be changed was incorrect. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb0defe5230f3773feb334a01b990c9eaaca301b">http://git.postgresql.org/pg/commitdiff/cb0defe5230f3773feb334a01b990c9eaaca301b</a></li>

<li>Add pg_basebackup -z option for compression with default level 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fa79755bd393cdfadb6197164cbe01498474be3">http://git.postgresql.org/pg/commitdiff/6fa79755bd393cdfadb6197164cbe01498474be3</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve hash_array() logic for combining hash values. The new logic is less vulnerable to transpositions. This invalidates the contents of hash indexes built with the old functions; hence, bump catversion. Dean Rasheed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7149b128dc12ece64c182962dc4f882ea7559d0c">http://git.postgresql.org/pg/commitdiff/7149b128dc12ece64c182962dc4f882ea7559d0c</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix integer overflow in text_format function, reported by Dean Rasheed. In the passing, clarify the comment on why text_format_nv wrapper is needed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34be83b7e142a718c7a831c9df9763aa83fe4cd5">http://git.postgresql.org/pg/commitdiff/34be83b7e142a718c7a831c9df9763aa83fe4cd5</a></li>

<li>Replace strdup() with pstrdup(), to avoid leaking memory. It's been like this since the seg module was introduced, so backpatch to 8.2 which is the oldest supported version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7541d32e86b739afb41e711a4c790aed446dd0e2">http://git.postgresql.org/pg/commitdiff/7541d32e86b739afb41e711a4c790aed446dd0e2</a></li>

<li>Check the return code of pthread_create(). Otherwise we go into an infinite loop if it fails, which is what what happened on my HP-UX box. (I think the reason it failed on that box is a misconfiguration on my behalf, but that's no reason to hang.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/336db7e3474508b46a0e6bdb013a8bee5aac9adf">http://git.postgresql.org/pg/commitdiff/336db7e3474508b46a0e6bdb013a8bee5aac9adf</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, do case-insensitive checks of locale, encoding, and ctype because these are often inconsistently capitalized. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11c08c3fd79f1fd5a83f9156fc1c43c7be3453ce">http://git.postgresql.org/pg/commitdiff/11c08c3fd79f1fd5a83f9156fc1c43c7be3453ce</a></li>

<li>Add C comment about why we don't spell out "month" in interval values. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0711a8b2b340ee0b0a7fd7ea2ac0fa6aee4708ae">http://git.postgresql.org/pg/commitdiff/0711a8b2b340ee0b0a7fd7ea2ac0fa6aee4708ae</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Convert builddoc.bat into a perl script that actually works. The old .bat file wasn't working for reasons that are unclear, and which it did not seem worth the trouble to ascertain. The new perl script has been tested and is known to work. Soon it will be tested regularly on the buildfarm. The .bat file is kept as a simple wrapper for the perl script. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c3604ae7fa1602e00b639447e894f9d59f9d297">http://git.postgresql.org/pg/commitdiff/8c3604ae7fa1602e00b639447e894f9d59f9d297</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Drop "meaning" column from error code table. This is currently the same as the condition name, so it doesn't add any value, only clutter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/420dcaaeb1a3be51b6417da59ce69d7954369211">http://git.postgresql.org/pg/commitdiff/420dcaaeb1a3be51b6417da59ce69d7954369211</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove unused variable. C&eacute;dric Villemain 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c60a77508ee4f4d895629905265d79feaab108c">http://git.postgresql.org/pg/commitdiff/4c60a77508ee4f4d895629905265d79feaab108c</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in another revision of the patch to make the visibility map crash-safe.</li>

<li>Alexander Korotkov sent in two more revisions of the patch to collect statistics for array columns.</li>

<li>Aaron Swenson sent in a patch which changes the pg_ctl exit status when the server is not running to 3, which the Linux Standard Base Core Specification 3.1 requires.</li>

<li>Alexander Korotkov sent in a patch for GiST which moves the GISTInsertStack structure from parent to child. This simplifies coding and allows maintaining parts of the tree in GISTInsertStack structures.</li>

<li>Jaime Casanova sent in two more revisions of the patch to add a new column to IDENTIFY_SYSTEM.</li>

<li>Leonardo Francalanci sent in three more revisions of the patch to use less space in xl_xact_commit.</li>

<li>Josh Kupershmidt sent in another revision of the patch to allow \dd to show constraint comments.</li>

<li>Kevin Grittner sent in patches to convert from row to tuple locking, and to document same.</li>

<li>Noah Misch sent in a patch to further help the domain/array mismatch.</li>

<li>Fujii Masao sent in a WIP patch to allow for cascading replication.</li>

<li>Peter Geoghegan sent in two more revisions of the patch which monitiors and acts on postmaster death via latches on both *n*x and Windows.</li>

<li>Stephen Frost sent in a PoC patch to Pre-allocate ListCells.</li>

<li>Tom Lane sent in a patch to change how vacuum analyzes reltuples.</li>

<li>MauMau sent in a patch to help distinguish PostgreSQL instances in the Windows event log.</li>

<li>Josh Kupershmidt sent in a patch to enable some new tab completions for COMMENT ON in psql.</li>

<li>Jeff Janes sent in a patch to add an option to pgbench which stresses the executor.</li>

</ul>