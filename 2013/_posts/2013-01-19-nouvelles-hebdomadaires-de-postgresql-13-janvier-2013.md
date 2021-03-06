---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 janvier 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/01/19/Nouvelles-hebdomadaires-de-PostgreSQL-13-janvier-2013"
---


<p>La premi&egrave;re &eacute;dition du PgDay australien (PGDay.AU 2013) aura lieu &agrave; Melbourne le 4 f&eacute;vrier 2013. L'inscription est gratuite. Programme et informations&nbsp;: 

<a target="_blank" href="http://2013.pgday.org.au/">http://2013.pgday.org.au/</a> Inscriptions&nbsp;: <a target="_blank" href="http://www.meetup.com/melpug">http://www.meetup.com/melpug</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La conf&eacute;rence PGDay du FOSDEM sera tenue juste avant l'ouverture du meeting, le 1er f&eacute;vrier &agrave; Bruxelles, Belgique. Les appels &agrave; conf&eacute;renciers, pour cette conf&eacute;rence et pour le cursus PostgreSQL du FOSDEM, sont lanc&eacute;s&nbsp;: 

<a target="_blank" href="http://fosdem2013.pgconf.eu/callforpapers/">http://fosdem2013.pgconf.eu/callforpapers/</a></li>

<li>Le PyPgDay aura lieu le 13 mars au <em>Santa Clara Convention Center</em>, le premier jour de la <em>PyCon</em>. Informations par l&agrave;&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PyPgDay2013">http://wiki.postgresql.org/wiki/PyPgDay2013</a> Submit your proposal here by January 20, 2013: <a target="_blank" href="http://tinyurl.com/PyPgDayCfP">http://tinyurl.com/PyPgDayCfP</a></li>

<li>Le PGDay 2013 de New-York City aura lieu le 22 mars. La date limite de candidature des conf&eacute;renciers est fix&eacute;e au 7 janvier 2013, midi (heure de New-York). Envois &agrave; l'adresse papers CHEZ nycpug POINT org&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org/speakers">http://pgday.nycpug.org/speakers</a></li>

<li>La <em>PostgreSQL Session</em> est programm&eacute;e pour le 28 mars 2013 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></li>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130114055701.GA28351@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix incorrect error message when schema-CREATE permission is absent. Report by me. Fix by KaiGai Kohei. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0dc23f2058b3b2a3ab8c131914aba40f96db19f">http://git.postgresql.org/pg/commitdiff/a0dc23f2058b3b2a3ab8c131914aba40f96db19f</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a logic bug in pgindent. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74570db99c5fc1071762c12e220de2e65593368f">http://git.postgresql.org/pg/commitdiff/74570db99c5fc1071762c12e220de2e65593368f</a></li>

<li>Detect Windows perl linkage parameters in configure script. This means we can now construct a configure test for the library presence. Previously these parameters were only figured out at build time in plperl's GnuMakefile. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fb97ecd137a879831ec6e3dce14c9f2e2a3d6b5">http://git.postgresql.org/pg/commitdiff/7fb97ecd137a879831ec6e3dce14c9f2e2a3d6b5</a></li>

<li>Extend and improve use of EXTRA_REGRESS_OPTS. This is now used by ecpg tests, and not clobbered by pg_upgrade tests. This change won't affect anything that doesn't set this environment variable, but will enable the buildfarm to control exactly what port regression test installs will be running on, and thus to detect possible rogue postmasters more easily. Backpatch to release 9.2 where EXTRA_REGRESS_OPTS was first used. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ae5ee6c9b4dd7cd7e4471a44d371b228a9621c3">http://git.postgresql.org/pg/commitdiff/4ae5ee6c9b4dd7cd7e4471a44d371b228a9621c3</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f31d5baff6cda85554731926bd63268a3c0afa1c">http://git.postgresql.org/pg/commitdiff/f31d5baff6cda85554731926bd63268a3c0afa1c</a></li>

<li>Make spelling more uniform 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d2cd99a60cfb62951c9ec21f9d12c36c8cfa607">http://git.postgresql.org/pg/commitdiff/9d2cd99a60cfb62951c9ec21f9d12c36c8cfa607</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix potential corruption of lock table in CREATE/DROP INDEX CONCURRENTLY. If VirtualXactLock() has to wait for a transaction that holds its VXID lock as a fast-path lock, it must first convert the fast-path lock to a regular lock. It failed to take the required "partition" lock on the main shared-memory lock table while doing so. This is the direct cause of the assert failure in GetLockStatusData() recently observed in the buildfarm, but more worryingly it could result in arbitrary corruption of the shared lock table if some other process were concurrently engaged in modifying the same partition of the lock table. Fortunately, VirtualXactLock() is only used by CREATE INDEX CONCURRENTLY and DROP INDEX CONCURRENTLY, so the opportunities for failure are fewer than they might have been. In passing, improve some comments and be a bit more consistent about order of operations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c00dc337b8752ec959e27bfdc58e13f3d305154a">http://git.postgresql.org/pg/commitdiff/c00dc337b8752ec959e27bfdc58e13f3d305154a</a></li>

<li>Add explicit configure-time checks for perl.h and libperl.so. Although most platforms seem to package Perl in such a way that these files are present even in basic Perl installations, Debian does not. Hence, make an effort to fail during configure rather than build if --with-perl was given and these files are lacking. Per gripe from Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f3ed51f8e197e9bbf18737a1aa1148ed730f7d8">http://git.postgresql.org/pg/commitdiff/1f3ed51f8e197e9bbf18737a1aa1148ed730f7d8</a></li>

<li>Test linking libperl.so using only Perl's required libraries. It appears that perl_embed_ldflags should already mention all the libraries that are required by libperl.so itself. So let's try the test link with just those and not the other LIBS we've found up to now. This should more nearly reproduce what will happen when plperl is linked, and perhaps will fix buildfarm member okapi's problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d5a160ca3af8f9488d2556fb28b9941d4926ff7">http://git.postgresql.org/pg/commitdiff/9d5a160ca3af8f9488d2556fb28b9941d4926ff7</a></li>

<li>Last-gasp attempt to save libperl.so configure probe. I notice that plperl's makefile adds the -I for $perl_archlibexp/CORE at the end of CPPFLAGS not the beginning. It seems somewhat unlikely that the include search order has anything to do with why buildfarm member okapi is failing, but I'm about out of other ideas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1b735ae35f225927c95746babafaa84e39c3325">http://git.postgresql.org/pg/commitdiff/e1b735ae35f225927c95746babafaa84e39c3325</a></li>

<li>Redesign the planner's handling of index-descent cost estimation. Historically we've used a couple of very ad-hoc fudge factors to try to get the right results when indexes of different sizes would satisfy a query with the same number of index leaf tuples being visited. In commit 21a39de5809cd3050a37d2554323cc1d0cbeed9d I tweaked one of these fudge factors, with results that proved disastrous for larger indexes. Commit bf01e34b556ff37982ba2d882db424aa484c0d07 fudged it some more, but still with not a lot of principle behind it. What seems like a better way to address these issues is to explicitly model index-descent costs, since that's what's really at stake when considering diferent indexes with similar leaf-page-level costs. We tried that once long ago, and found that charging random_page_cost per page descended through was way too much, because upper btree levels tend to stay in cache in real-world workloads. However, there's still CPU costs to think about, and the previous fudge factors can be seen as a crude attempt to account for those costs. So this patch replaces those fudge factors with explicit charges for the number of tuple comparisons needed to descend the index tree, plus a small charge per page touched in the descent. The cost multipliers are chosen so that the resulting charges are in the vicinity of the historical (pre-9.2) fudge factors for indexes of up to about a million tuples, while not ballooning unreasonably beyond that, as the old fudge factor did (even more so in 9.2). To make this work accurately for btree indexes, add some code that allows extraction of the known root-page height from a btree. There's no equivalent number readily available for other index types, but we can use the log of the number of index pages as an approximate substitute. This seems like too much of a behavioral change to risk back-patching, but it should improve matters going forward. In 9.2 I'll just revert the fudge-factor change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31f38f28b00cbe2b9267205359e3cf7bafa1cb97">http://git.postgresql.org/pg/commitdiff/31f38f28b00cbe2b9267205359e3cf7bafa1cb97</a></li>

<li>Improve handling of ereport(ERROR) and elog(ERROR). In commit 71450d7fd6c7cf7b3e38ac56e363bff6a681973c, we added code to inform suitably-intelligent compilers that ereport() doesn't return if the elevel is ERROR or higher. This patch extends that to elog(), and also fixes a double-evaluation hazard that the previous commit created in ereport(), as well as reducing the emitted code size. The elog() improvement requires the compiler to support __VA_ARGS__, which should be available in just about anything nowadays since it's required by C99. But our minimum language baseline is still C89, so add a configure test for that. The previous commit assumed that ereport's elevel could be evaluated twice, which isn't terribly safe --- there are already counterexamples in xlog.c. On compilers that have __builtin_constant_p, we can use that to protect the second test, since there's no possible optimization gain if the compiler doesn't know the value of elevel. Otherwise, use a local variable inside the macros to prevent double evaluation. The local-variable solution is inferior because (a) it leads to useless code being emitted when elevel isn't constant, and (b) it increases the optimization level needed for the compiler to recognize that subsequent code is unreachable. But it seems better than not teaching non-gcc compilers about unreachability at all. Lastly, if the compiler has __builtin_unreachable(), we can use that instead of abort(), resulting in a noticeable code savings since no function call is actually emitted. However, it seems wise to do this only in non-assert builds. In an assert build, continue to use abort(), so that the behavior will be predictable and debuggable if the "impossible" happens. These changes involve making the ereport and elog macros emit do-while statement blocks not just expressions, which forces small changes in a few call sites. Andres Freund, Tom Lane, Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b853eb97182079dcd30b4f52576bd5d6c275ee71">http://git.postgresql.org/pg/commitdiff/b853eb97182079dcd30b4f52576bd5d6c275ee71</a></li>

<li>Update comments for elog_start(). Forgot I was going to do this as part of the previous patch ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24dd0502a106102d81782de4966c476fd0ab2efa">http://git.postgresql.org/pg/commitdiff/24dd0502a106102d81782de4966c476fd0ab2efa</a></li>

<li>Prevent very-low-probability PANIC during PREPARE TRANSACTION. The code in PostPrepare_Locks supposed that it could reassign locks to the prepared transaction's dummy PGPROC by deleting the PROCLOCK table entries and immediately creating new ones. This was safe when that code was written, but since we invented partitioning of the shared lock table, it's not safe --- another process could steal away the PROCLOCK entry in the short interval when it's on the freelist. Then, if we were otherwise out of shared memory, PostPrepare_Locks would have to PANIC, since it's too late to back out of the PREPARE at that point. Fix by inventing a dynahash.c function to atomically update a hashtable entry's key. (This might possibly have other uses in future.) This is an ancient bug that in principle we ought to back-patch, but the odds of someone hitting it in the field seem really tiny, because (a) the risk window is small, and (b) nobody runs servers with maxed-out lock tables for long, because they'll be getting non-PANIC out-of-memory errors anyway. So fixing it in HEAD seems sufficient, at least until the new code has gotten some testing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2065dd2834e832eb820f1fbcd16746d6af1f6037">http://git.postgresql.org/pg/commitdiff/2065dd2834e832eb820f1fbcd16746d6af1f6037</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow parallel copy/link in pg_upgrade. This patch implements parallel copying/linking of files by tablespace using the --jobs option in pg_upgrade. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a89c46f9bc314ed549245d888da09b8c5cace104">http://git.postgresql.org/pg/commitdiff/a89c46f9bc314ed549245d888da09b8c5cace104</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't attempt to write recovery.conf when -R is not specified. Fixes segmentation fault during regular use. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5ed1376c61b341939ef3f54996a5c5af3408a06">http://git.postgresql.org/pg/commitdiff/b5ed1376c61b341939ef3f54996a5c5af3408a06</a></li>

<li>Properly install ecpg_compat and pgtypes libraries on msvc. JiangGuiqing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e650a55cda9291bbeebd6b1aa6aedbd3d15e622">http://git.postgresql.org/pg/commitdiff/6e650a55cda9291bbeebd6b1aa6aedbd3d15e622</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Takeshi Yamamuro sent in a patch to speed up compression in pg_lzcompress.c.</li>

<li>Peter Eisentraut sent in a patch to add a str handler to PL/Python.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to make pg_basebackup recvlog nonblocking.</li>

<li>Tomas Vondra sent in two more revisions of a patch to optimize dropping multiple tables in a transaction.</li>

<li>Alvaro Herrera and KaiGai Kohei traded patches reworking the ALTER commands.</li>

<li>Noah Misch sent in two revisions of a patch to improve heap cleanup.</li>

<li>Dimitri Fontaine sent in a patch implementing TEMPLATEs for EXTENSIONs, a capability intended to help allow adding all-text installs of templates.</li>

<li>Andrew Dunstan sent in two more revisions of a patch to add a JSON API along with a stand-alone JSON parser patch.</li>

<li>Peter Eisentraut sent in a patch to allow psql's \l to accept patterns.</li>

<li>KaiGai Kohei sent in a patch to fix some infelicities in ALTER SCHEMA.</li>

<li>Josh Kupershmidt sent in a patch to fix some poor examples in the pg_dump README.</li>

<li>Andres Freund sent in a patch to centralize the Assert* macros into c.h so it's common between backend/frontend.</li>

<li>Andres Freund sent in another revision of a patch to add an xlogreader functionality.</li>

<li>Andres Freund sent in a patch to remove an extra space in running_xact's _desc function.</li>

<li>Andres Freund sent in another revision of a patch to add a pg_xlogdump contrib module.</li>

<li>Andres Freund sent in a patch to make relpathbackend return a statically result instead of palloc()'ing it.</li>

<li>Peter Eisentraut implemented parameter_default for the information schema.</li>

<li>Fujii Masao sent in a patch to fix a segfault in pg_basebackup.</li>

<li>Alvaro Herrera sent in another revision of a patch to add information to event triggers.</li>

<li>Amit Kapila sent in another revision of a patch to reduce WAL traffic on updates to improve performance.</li>

<li>Greg Smith sent in a patch to fix an issue where a buffer assertion was tripping under repeat pgbench load.</li>

<li>Amit Kapila sent in another revision of a patch to enable changing postgresql.conf via SQL.</li>

<li>Andres Freund sent in a patch to use pg_malloc instead of an unchecked malloc in pg_resetxlog.</li>

<li>Andres Freund sent in a patch to provide common malloc wrappers and palloc et al. emulation for frontend'ish environs</li>

<li>Amit Kapila sent in another revision of a patch to avoid doing extra WAL during checkpoints.</li>

<li>Alvaro Herrera sent in another revision of a patch to implement foreign key locks.</li>

<li>Hitoshi Harada sent in a patch to ensure that TO_DATE() receives dates in its valid range.</li>

<li>Pavel Stehule sent in a patch to support the missing ECHO_HIDDEN behavior in the \sf functionality of psql.</li>

<li>Peter Eisentraut sent in a patch to allow privileges on untrusted languages.</li>

<li>Andrew Dunstan sent in a patch to enhance JSON generation.</li>

<li>Simon Riggs sent in a WIP patch to allow logging the plans of cancelled queries.</li>

<li>Jan Urbanski sent in a patch to fix the SQL syntax of a comment in src/backend/executor/execProcnode.c</li>

<li>Simon Riggs sent in a patch to ensure that src/backend/storage/lmgr/lock.c hashes once to match the comment in it and save cycles.</li>

<li>Aaron W. Swenson sent in a patch to ensure that pg_ctl promote returns 3 per Linux Standard Base Core Specification 3.1.</li>

<li>Bruce Momjian sent in a patch to add the long-requested LaTeX longtable format to psql.</li>

<li>Andrew Dunstan sent in a patch to enable psql to produce binary output.</li>

<li>Marko Kreen sent in a patch to fix pgcrypto seeding when SSL is on.</li>

<li>Stephen Frost sent in a patch to add COPY ... COMPRESSED.</li>

</ul>