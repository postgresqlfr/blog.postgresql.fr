---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 octobre 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/10/15/Nouvelles-hebdomadaires-de-PostgreSQL-14-octobre-2012"
---


<p>La 6<sup>&egrave;me</sup> conf&eacute;rence annuelle <em>Highload++</em> aura lieu les 22 &amp; 23 octobre 2012 &agrave; Moscou (Russie)&nbsp;: 

<a target="_blank" href="http://highload.co/">http://highload.co/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Barman 1.1.0, un gestionnaire de sauvegarde et restauration pour PostgreSQL, a &eacute;t&eacute; publi&eacute;. Cette version apporte : compatibilit&eacute; 9.2, possibilit&eacute; de lancer des scripts avant/apr&egrave;s le backup et des paquets Debian/Ubuntu&nbsp;: 

<a target="_blank" href="http://www.pgbarman.org">http://www.pgbarman.org</a></li>

<li>pgpool-II 3.2.1, 3.1.5 et 3.0.9, un <em>middleware</em> polyvalent qui permet le <em>connection pooling</em>, la r&eacute;plication, la r&eacute;partition de charge, l'ex&eacute;cution en parall&egrave;le et d'avantage&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

<li>Skytools 3.1.1, un ensemble d'outils d&eacute;velopp&eacute;s par Skype pour la r&eacute;plication et le failover incluant PgQ, un framework g&eacute;n&eacute;rique de gestion de queue, et Londiste, un syst&egrave;me de r&eacute;plication ma&icirc;tre-esclave&nbsp;: 

<a target="_blank" href="https://github.com/markokr/skytools">https://github.com/markokr/skytools</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PostgreSQL Conference Europe 2011</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Il y aura un PGDay &eacute;galement le 9 novembre 2012 &agrave; l'USP de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16949">http://www.postgresql.org.br/node/16949</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

<li>Le PGDay &eacute;quatorien de cette ann&eacute;e se tiendra &agrave; Quito le 17 novembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 10 octobre. Envoyez vos propositions &agrave; Jaime Casanova&nbsp;: jaime &lt;AT&gt; 2ndquadrant &lt;DOT&gt; com&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012">https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012</a></li>

<li>La sixi&egrave;me &eacute;dition du PGDay italien aura lieu &agrave; Prato, Toscane, le 23 novembre 2012. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;, conf&eacute;rences et pr&eacute;sentations en anglais sont accept&eacute;es. Informations anglophones sur le processus de candidature disponibles ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="http://2012.pgday.it/call-for-papers/international-call-for-papers/">http://2012.pgday.it/call-for-papers/international-call-for-papers/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-10/msg00005.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix walsender handling of postmaster shutdown, to not go into endless loop. This bug was introduced by my patch to use the regular die/quickdie signal handlers in walsender processes. I tried to make walsender exit at next CHECK_FOR_INTERRUPTS() by setting ProcDiePending, but that's not enough, you need to set InterruptPending too. On second thoght, it was not a very good way to make walsender exit anyway, so use proc_exit(0) instead. Also, send a CommandComplete message before exiting; that's what we did before, and you get a nicer error message in the standby that way. Reported by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c0e2b918252e753ea648dd6a7c18a054bed951b">http://git.postgresql.org/pg/commitdiff/9c0e2b918252e753ea648dd6a7c18a054bed951b</a></li>

<li>Say ANALYZE, not VACUUM, in error message on analyze in hot standby. Tomonaru Katsumata 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b28cc92d7d7c9557aab5088666140330fce48b1d">http://git.postgresql.org/pg/commitdiff/b28cc92d7d7c9557aab5088666140330fce48b1d</a></li>

<li>Remove stray newline in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b77aebabfbe9155ea88ee9e11fa126315473b86">http://git.postgresql.org/pg/commitdiff/0b77aebabfbe9155ea88ee9e11fa126315473b86</a></li>

<li>Put the logic to wait for WAL in standby mode to a separate function. This is just refactoring with no user-visible effect, to make the code more readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff8f160bf4322c4294deaa0e64ed26467283d525">http://git.postgresql.org/pg/commitdiff/ff8f160bf4322c4294deaa0e64ed26467283d525</a></li>

<li>Fix silly bug in previous refactoring. I extracted the refactoring patch from a larger patch that contained other changes too, but missed one unintentional change and didn't test enough... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d8c81ac867d919b7d11120b01a6a327fef6a2ef">http://git.postgresql.org/pg/commitdiff/2d8c81ac867d919b7d11120b01a6a327fef6a2ef</a></li>

<li>Fix thinko in previous commit. Since postgres.h includes palloc.h, definitions that affect the latter must be present before the former is included. Per buildfarm results 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/878daf2e72755feadbfb8d21aad26dafd8658086">http://git.postgresql.org/pg/commitdiff/878daf2e72755feadbfb8d21aad26dafd8658086</a></li>

<li>Improve replication connection timeouts. Rename replication_timeout to wal_sender_timeout, and add a new setting called wal_receiver_timeout that does the same at the walreceiver side. There was previously no timeout in walreceiver, so if the network went down, for example, the walreceiver could take a long time to notice that the connection was lost. Now with the two settings, both sides of a replication connection will detect a broken connection similarly. It is no longer necessary to manually set wal_receiver_status_interval to a value smaller than the timeout. Both wal sender and receiver now automatically send a "ping" message if more than 1/2 of the configured timeout has elapsed, and it hasn't received any messages from the other end. Amit Kapila, heavily edited by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f60fdd7015b032bf49273c99f80913d57eac284">http://git.postgresql.org/pg/commitdiff/6f60fdd7015b032bf49273c99f80913d57eac284</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add #define for UUIDOID. Phil Sorber and Thom Brown. Reviewed by Laurenz Albe. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08c8058ce90cf4b2644cabfa7e5f66e9da8ddd7d">http://git.postgresql.org/pg/commitdiff/08c8058ce90cf4b2644cabfa7e5f66e9da8ddd7d</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for easily declaring static inline functions. We already had those, but they forced modules to spell out the function bodies twice. Eliminate some duplicates we had already grown. Extracted from a somewhat larger patch from Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/976fa10d20ec9882229020fa16f4d74263066a40">http://git.postgresql.org/pg/commitdiff/976fa10d20ec9882229020fa16f4d74263066a40</a></li>

<li>Rename USE_INLINE to PG_USE_INLINE. The former name was too likely to conflict with symbols from external headers; and, as seen in recent buildfarm failures in member spoonbill, it has now happened at least in plpython. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f46baf601d889b374ba5e5f4b8280fee5aa19a7f">http://git.postgresql.org/pg/commitdiff/f46baf601d889b374ba5e5f4b8280fee5aa19a7f</a></li>

<li>restore permission bits 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7491616a93e02856a44d4bd3b026610fe58704e">http://git.postgresql.org/pg/commitdiff/f7491616a93e02856a44d4bd3b026610fe58704e</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Code review for 64-bit-large-object patch. Fix broken-on-bigendian-machines byte-swapping functions, add missed update of alternate regression expected file, improve error reporting, remove some unnecessary code, sync testlo64.c with current testlo.c (it seems to have been cloned from a very old copy of that), assorted cosmetic improvements. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26fe56481c0f7baa705f0b3265b5a0676f894a94">http://git.postgresql.org/pg/commitdiff/26fe56481c0f7baa705f0b3265b5a0676f894a94</a></li>

<li>Fix lo_read, lo_write, lo_truncate to cope with "size_t" length parameters. libpq defines these functions as accepting "size_t" lengths ... but the underlying backend functions expect signed int32 length parameters, and so will misinterpret any value exceeding INT_MAX. Fix the libpq side to throw error rather than possibly doing something unexpected. This is a bug of long standing, but I doubt it's worth back-patching. The problem is really pretty academic anyway with lo_read/lo_write, since any caller expecting sane behavior would have to have provided a multi-gigabyte buffer. It's slightly more pressing with lo_truncate, but still we haven't supported large objects over 2GB until now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e924c007dbb74f8f7dbdb75810c9b9a8ed6d3ec">http://git.postgresql.org/pg/commitdiff/0e924c007dbb74f8f7dbdb75810c9b9a8ed6d3ec</a></li>

<li>Fix lo_export usage in example programs. lo_export returns -1, not zero, on failure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f52c5165e1d067ba94f92e5f149c19109b6fed60">http://git.postgresql.org/pg/commitdiff/f52c5165e1d067ba94f92e5f149c19109b6fed60</a></li>

<li>Fix lo_import and lo_export to return useful error messages more often. I found that these functions tend to return -1 while leaving an empty error message string in the PGconn, if they suffer some kind of I/O error on the file. The reason is that lo_close, which thinks it's executed a perfectly fine SQL command, clears the errorMessage. The minimum-change workaround is to reorder operations here so that we don't fill the errorMessage until after lo_close. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc433317ae2b0494dea4526b89dc7bb90a65d79b">http://git.postgresql.org/pg/commitdiff/bc433317ae2b0494dea4526b89dc7bb90a65d79b</a></li>

<li>Remove unnecessary overhead in backend's large-object operations. Do read/write permissions checks at most once per large object descriptor, not once per lo_read or lo_write call as before. The repeated tests were quite useless in the read case since the snapshot-based tests were guaranteed to produce the same answer every time. In the write case, the extra tests could in principle detect revocation of write privileges after a series of writes has started --- but there's a race condition there anyway, since we'd check privileges before performing and certainly before committing the write. So there's no real advantage to checking every single time, and we might as well redefine it as "only check the first time". On the same reasoning, remove the LargeObjectExists checks in inv_write and inv_truncate. We already checked existence when the descriptor was opened, and checking again doesn't provide any real increment of safety that would justify the cost. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e0cce0265921dca2e8ea9485c194465a7e19703">http://git.postgresql.org/pg/commitdiff/7e0cce0265921dca2e8ea9485c194465a7e19703</a></li>

<li>Fix PGXS support for building loadable modules on AIX. Building a shlib on AIX requires use of the mkldexport.sh script, but we failed to install that, preventing its use from non-source-tree contexts. Also, Makefile.aix had the wrong idea about where to find the installed copy of the postgres.imp symbol file used by AIX. Per report from John Pierce. Patch all the way back, since this has been broken since the beginning of PGXS. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f88fa971aafcf5204052d1dd114c739a0e751c2">http://git.postgresql.org/pg/commitdiff/3f88fa971aafcf5204052d1dd114c739a0e751c2</a></li>

<li>Set procost to 10 for each of the pg_foo_is_visible() functions. The idea here is to make sure the planner will evaluate these functions last not first among the filter conditions in psql pattern search and tab-completion queries. We've discussed this several times, and there was consensus to do it back in August, but we didn't want to do it just before a release. Now seems like a safer time. No catversion bump, since this catalog change doesn't create a backend incompatibility nor any regression test result changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a80889a7359e720107b881bcd3e8fd47f3874e36">http://git.postgresql.org/pg/commitdiff/a80889a7359e720107b881bcd3e8fd47f3874e36</a></li>

<li>Update obsolete text in fdwhandler.sgml. Etsuro Fujita, with some wording adjustment by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/392b2e5010ddce24bcb1a9d38adb1d06f01fb543">http://git.postgresql.org/pg/commitdiff/392b2e5010ddce24bcb1a9d38adb1d06f01fb543</a></li>

<li>Update obsolete comment. We no longer use GetNewOidWithIndex on pg_largeobject; rather, pg_largeobject_metadata's regular OID column is considered the repository of OIDs for large objects. The special functionality is still needed for TOAST tables however. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/864db11683df44dae51f8f9fc8a4c124e100d2f3">http://git.postgresql.org/pg/commitdiff/864db11683df44dae51f8f9fc8a4c124e100d2f3</a></li>

<li>Create an improved FDW option validator function for contrib/dblink. dblink now has its own validator function dblink_fdw_validator(), which is better than the core function postgresql_fdw_validator() because it gets the list of legal options from libpq instead of having a hard-wired list. Make the dblink extension module provide a standard foreign data wrapper dblink_fdw that encapsulates use of this validator, and recommend use of that wrapper instead of making up wrappers on the fly. Unfortunately, because ad-hoc wrappers *were* recommended practice previously, it's not clear when we can get rid of postgresql_fdw_validator without causing upgrade problems. But this is a step in the right direction. Shigeru Hanada, reviewed by KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8255566f9d479fdfeea09da3141d26afdbb5abe2">http://git.postgresql.org/pg/commitdiff/8255566f9d479fdfeea09da3141d26afdbb5abe2</a></li>

<li>Remove configure-option-dependent test cases from dblink tests. The HINTs generated for these error cases vary across builds. We could try to work around that, but the test cases aren't really useful enough to justify taking any trouble. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3bf3ea2b61c312cc813edd9bb43aa338ae9288c">http://git.postgresql.org/pg/commitdiff/c3bf3ea2b61c312cc813edd9bb43aa338ae9288c</a></li>

<li>Fix cross-type case in partial row matching for hashed subplans. When hashing a subplan like "WHERE (a, b) NOT IN (SELECT x, y FROM ...)", findPartialMatch() attempted to match rows using the hashtable's internal equality operators, which of course are for x and y's datatypes. What we need to use are the potentially cross-type operators for a=x, b=y, etc. Failure to do that leads to wrong answers or even crashes. The scope for problems is limited to cases where we have different types with compatible hash functions (else we'd not be using a hashed subplan), but for example int4 vs int8 can cause the problem. Per bug #7597 from Bo Jensen. This has been wrong since the hashed-subplan code was written, so patch all the way back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4816d2ea3250b0f1e43d8b5521b9bf951821a945">http://git.postgresql.org/pg/commitdiff/4816d2ea3250b0f1e43d8b5521b9bf951821a945</a></li>

<li>Make equal() ignore CoercionForm fields for better planning with casts. This change ensures that the planner will see implicit and explicit casts as equivalent for all purposes, except in the minority of cases where there's actually a semantic difference (as reflected by having a 3-argument cast function). In particular, this fixes cases where the EquivalenceClass machinery failed to consider two references to a varchar column as equivalent if one was implicitly cast to text but the other was explicitly cast to text, as seen in bug #7598 from Vaclav Juza. We have had similar bugs before in other parts of the planner, so I think it's time to fix this problem at the core instead of continuing to band-aid around it. Remove set_coercionform_dontcare(), which represents the band-aid previously in use for allowing matching of index and constraint expressions with inconsistent cast labeling. (We can probably get rid of COERCE_DONTCARE altogether, but I don't think removing that enum value in back branches would be wise; it's possible there's third party code referring to it.) Back-patch to 9.2. We could go back further, and might want to once this has been tested more; but for the moment I won't risk destabilizing plan choices in long-since-stable branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71e58dcfb9ee47064a3ccfeba66a5bdf026380b5">http://git.postgresql.org/pg/commitdiff/71e58dcfb9ee47064a3ccfeba66a5bdf026380b5</a></li>

<li>Fix unportable format string. Per compiler warning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/427fd88552c5ee6e239b776dfa763489251809bc">http://git.postgresql.org/pg/commitdiff/427fd88552c5ee6e239b776dfa763489251809bc</a></li>

<li>Get rid of COERCE_DONTCARE. We don't need this hack any more. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a29f7ed5544ef583747c0dcc3fc2afac1fb191ef">http://git.postgresql.org/pg/commitdiff/a29f7ed5544ef583747c0dcc3fc2afac1fb191ef</a></li>

<li>Fix oversight in new code for printing rangetable aliases. In commit 11e131854f8231a21613f834c40fe9d046926387, I missed the case of a CTE RTE that doesn't have a user-defined alias, but does have an alias assigned by set_rtable_names(). Per report from Peter Eisentraut. While at it, refactor slightly to reduce code duplication. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b728e5c6e0ce6b6d6f54b92b390f14aa1aca6db">http://git.postgresql.org/pg/commitdiff/8b728e5c6e0ce6b6d6f54b92b390f14aa1aca6db</a></li>

<li>Split up process latch initialization for more-fail-soft behavior. In the previous coding, new backend processes would attempt to create their self-pipe during the OwnLatch call in InitProcess. However, pipe creation could fail if the kernel is short of resources; and the system does not recover gracefully from a FATAL error right there, since we have armed the dead-man switch for this process and not yet set up the on_shmem_exit callback that would disarm it. The postmaster then forces an unnecessary database-wide crash and restart, as reported by Sean Chittenden. There are various ways we could rearrange the code to fix this, but the simplest and sanest seems to be to split out creation of the self-pipe into a new function InitializeLatchSupport, which must be called from a place where failure is allowed. For most processes that gets called in InitProcess or InitAuxiliaryProcess, but processes that don't call either but still use latches need their own calls. Back-patch to 9.1, which has only a part of the latch logic that 9.2 and HEAD have, but nonetheless includes this bug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e81e8f9342b037246b284bad15e42e21b1929301">http://git.postgresql.org/pg/commitdiff/e81e8f9342b037246b284bad15e42e21b1929301</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove generation of repl_gram.h. It was apparently never necessary. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6d45222969a82aff0e9f115842c87136d429479">http://git.postgresql.org/pg/commitdiff/b6d45222969a82aff0e9f115842c87136d429479</a></li>

<li>Remove _FORTIFY_SOURCE. Apparently, on some glibc versions this causes warnings when optimization is not enabled. Altogether, there appear to be too many incompatibilities surrounding this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab112068b657a2bd30a7f953c732e2ee75a606f5">http://git.postgresql.org/pg/commitdiff/ab112068b657a2bd30a7f953c732e2ee75a606f5</a></li>

<li>Refactor flex and bison make rules. Numerous flex and bison make rules have appeared in the source tree over time, and they are all virtually identical, so we can replace them by pattern rules with some variables for customization. Users of pgxs will also be able to benefit from this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8521d131941be5a177270bc428fa8e684cd645b5">http://git.postgresql.org/pg/commitdiff/8521d131941be5a177270bc428fa8e684cd645b5</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add microsecs/op display to pg_test_fsync utility e.g. fsync 2103.613 ops/sec ( 475 microsecs/op) Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82e429794b348cd80c1d1b011e21ffac98bc6e88">http://git.postgresql.org/pg/commitdiff/82e429794b348cd80c1d1b011e21ffac98bc6e88</a></li>

<li>Use tablespace_option consistently on doc page. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2190377113cd24b0929b30a8c386433d4759fb50">http://git.postgresql.org/pg/commitdiff/2190377113cd24b0929b30a8c386433d4759fb50</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, issue proper error message when we can't open PG_VERSION. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9701a1d7df8c7a088ed7c37316fe4118a507015">http://git.postgresql.org/pg/commitdiff/a9701a1d7df8c7a088ed7c37316fe4118a507015</a></li>

<li>In our source code, make a copy of getopt's 'optarg' string arguments, rather than just storing a pointer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49ec613201b2e9debdf9e9ad9a2ad7c6c8083729">http://git.postgresql.org/pg/commitdiff/49ec613201b2e9debdf9e9ad9a2ad7c6c8083729</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Unbreak MSVC builds after recent Makefile refactoring. Based on a suggestion by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e583ffe947de7a6e3be49a0f267234616f390485">http://git.postgresql.org/pg/commitdiff/e583ffe947de7a6e3be49a0f267234616f390485</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Amit Kapila sent in another revision of the patch to increase performance of update operations by decreasing WAL volume.</li>

<li>KaiGai Kohei sent in another revision of the patch to add row-level access control.</li>

<li>Andres Freund sent in a patch to make MemSetLoop stop ignoring the 'val' parameter.</li>

<li>Peter Geoghegan sent in a patch to fix the FORTIFY_SOURCE fix of earlier.</li>

<li>Peter Geoghegan and Alvaro Herrera traded new revisions of the patch to add embedded lists.</li>

<li>Noah Misch and Brar Piening traded revisions of the patch to allow compiling with Microsoft Visual Studio 2012 RC.</li>

<li>Alexander Korotkov sent in another revision of the patch to sharpen statistics and selectivity estimation for ranges.</li>

<li>Shigeru HANADA sent in another revision of the patch to add a FDW for PostgreSQL.</li>

<li>Heikki Linnakangas sent in another revision of the patch to ease switching timeline over streaming replication.</li>

<li>S&eacute;bastien Lardi&egrave;re sent in two revisions of a patch to add TRUNCATE IF EXISTS functionality.</li>

<li>Vik Reykja sent in two revisions of a patch to add DEALLOCATE IF EXISTS functionality.</li>

<li>Marco Nenciarini sent in another revision of the patch to add array ELEMENT foreign keys.</li>

<li>Joel Jacobson sent in another revision of the patch to ensure that pg_dump dumps functions in a deterministic order.</li>

<li>Pavel Stehule sent in another revision of the patch to add enhanced error fields.</li>

<li>Zoltan Boszormenyi sent in five more revisions of a patch to make pg_basebackup configure and start standby.</li>

<li>Marcus Wanner sent in a patch to fix an issue where WAL_DEBUG logs spurious data.</li>

<li>Dean Rasheed sent in another revision of the patch to make VIEWs updateable automatically where appropriate.</li>

<li>Abhijit Menon-Sen sent in a patch to clarify the meanings of tup_returned and tup_fetched.</li>

<li>Dimitri Fontaine sent in another revision of the patch to deparse DDL in service of event triggers.</li>

<li>Pavel Stehule and Shigeru HANADA traded patches to add \gset to psql, setting a set of variables to the row returned.</li>

<li>Bruce Momjian sent in a patch to fix log_line_prefix and session display.</li>

<li>Michael Paquier sent in another revision of the patch to add REINDEX CONCURRENTLY.</li>

<li>Guillaume Lelarge sent in a patch to fix a bug in pg_restore -c.</li>

<li>Fujii Masao sent in a patch to fix a typo in Heikki Linnakangas's patch to ensure that standbys detect network partitions faster.</li>

<li>KaiGai Kohei sent in another revision of the patch to extend the arguments of OAT_POST_CREATE for sepgsql.</li>

<li>Phil Sorber sent in a WIP patch to create a pg_ping utility.</li>

<li>Andrew Dunstan sent in another revision of the patch to allow pg_dump to run in parallel.</li>

<li>Satoshi Nagayasu sent in two more revisions of a patch to add a pg_stat_lwlocks view.</li>

<li>Gilles Darold sent in a patch to add IF EXISTS to DROP statements in pg_restore, bullet-proofing same against that type of confusing failure.</li>

<li>Josh Kupershmidt sent in a patch to fix the string escaping in tutorial/syscat.source, as it had not kept up with standards_conforming_strings' modern default.</li>

</ul>