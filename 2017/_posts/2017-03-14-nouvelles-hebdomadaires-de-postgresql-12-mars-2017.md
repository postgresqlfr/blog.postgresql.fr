---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 mars 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/03/14/Nouvelles-hebdomadaires-de-PostgreSQL-12-mars-2017"
---


<p>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>psqlODBC 09.06.0200&nbsp;: <a target="_blank" href="https://odbc.postgresql.org/docs/release.html">https://odbc.postgresql.org/docs/release.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-03/">http://archives.postgresql.org/pgsql-jobs/2017-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PgConf.Russia 2017 se d&eacute;roulera du 15 au 17 mars 2017 &agrave; Moscou&nbsp;: <a target="_blank" href="https://pgconf.ru/en">https://pgconf.ru/en</a></li>

<li>Le PGDay Asia 2017 est programm&eacute; les 17 et 18 mars &agrave; Singapour&nbsp;: <a target="_blank" href="http://2017.pgday.asia/">http://2017.pgday.asia/</a></li>

<li>Le PGDay nordique se tiendra &agrave; Stockholm (Su&egrave;de) au Sheraton Hotel, le 21 mars 2017&nbsp;: <a target="_blank" href="https://2017.nordicpgday.org/">https://2017.nordicpgday.org/</a></li>

<li>Le pgDay Paris 2017 aura lieu &agrave; Paris (France) le 23 mars 2017&nbsp;: <a target="_blank" href="http://2017.pgday.paris/">http://2017.pgday.paris/</a></li>

<li>La <em>PGConf US 2017</em> aura lieu &agrave; Jersey City (New Jersey, USA) du 28 au 31 mars&nbsp;: <a target="_blank" href="http://www.pgconf.us/2017/">http://www.pgconf.us/2017/</a></li>

<li>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/papers.php">http://www.pgcon.org/2017/papers.php</a></li>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170312234158.GB31409@fetter.org">http://www.postgresql.org/message-id/20170312234158.GB31409@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Simon Riggs pushed:</p>

<ul>

<li>Allow partitioned tables to be dropped without CASCADE. Record partitioned table dependencies as DEPENDENCY_AUTO rather than DEPENDENCY_NORMAL, so that DROP TABLE just works. Remove all the tests for partitioned tables where earlier work had deliberately avoided using CASCADE. Amit Langote, reviewed by Ashutosh Bapat and myself <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b4d582d279d784616c228be58af1e39aa430402">http://git.postgresql.org/pg/commitdiff/8b4d582d279d784616c228be58af1e39aa430402</a></li>

<li>Reduce lock levels for table storage params related to planning. The following parameters are now updateable with ShareUpdateExclusiveLock effective_io_concurrency parallel_workers seq_page_cost random_page_cost n_distinct n_distinct_inherited Simon Riggs and Fabr&Atilde;&shy;zio Mello <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21d4e2e20656381b4652eb675af4f6d65053607f">http://git.postgresql.org/pg/commitdiff/21d4e2e20656381b4652eb675af4f6d65053607f</a></li>

<li>Enhance docs for ALTER TABLE lock levels of storage parms. As requested by Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f3a13ff058f15d565a30c16c0c2cb14cc994e42">http://git.postgresql.org/pg/commitdiff/6f3a13ff058f15d565a30c16c0c2cb14cc994e42</a></li>

<li>Ensure ThisTimeLineID is valid before START_REPLICATION. Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ee2197767f648bc21e324e751b84d42af573b43">http://git.postgresql.org/pg/commitdiff/5ee2197767f648bc21e324e751b84d42af573b43</a></li>

<li>Allow pg_dumpall to dump roles w/o user passwords. Add new option --no-role-passwords which dumps roles without passwords. Since we don&acirc;&euro;&trade;t need passwords, we choose to use pg_roles in preference to pg_authid since access may be restricted for security reasons in some configrations. Robins Tharakan and Simon Riggs <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a83d56b38c870ce47b7651385ff2add583bf136">http://git.postgresql.org/pg/commitdiff/9a83d56b38c870ce47b7651385ff2add583bf136</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Reorder the asynchronous libpq calls for replication connection. Per libpq documentation, the initial state must be PGRES_POLLING_WRITING. Failing to do that appears to cause some issues on some Windows systems. From: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e434ad39ae7316bcf35fd578dd34ad7e1ff3c25f">http://git.postgresql.org/pg/commitdiff/e434ad39ae7316bcf35fd578dd34ad7e1ff3c25f</a></li>

<li>Combine several DROP variants into generic DropStmt. Combine DROP of FOREIGN DATA WRAPPER, SERVER, POLICY, RULE, and TRIGGER into generic DropStmt grammar. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6477a8134ace06ef3a45a7ce15813cd398e72d8">http://git.postgresql.org/pg/commitdiff/e6477a8134ace06ef3a45a7ce15813cd398e72d8</a></li>

<li>Replace LookupFuncNameTypeNames() with LookupFuncWithArgs(). The old function took function name and function argument list as separate arguments. Now that all function signatures are passed around as ObjectWithArgs structs, this is no longer necessary and can be replaced by a function that takes ObjectWithArgs directly. Similarly for aggregates and operators. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ca64c6f7105f97ce886bdbbd880f50225bf24ba">http://git.postgresql.org/pg/commitdiff/2ca64c6f7105f97ce886bdbbd880f50225bf24ba</a></li>

<li>Add operator_with_argtypes grammar rule. This makes the handling of operators similar to that of functions and aggregates. Rename node FuncWithArgs to ObjectWithArgs, to reflect the expanded use. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/550214a4efb214dfc9c2a475607deeeea69da858">http://git.postgresql.org/pg/commitdiff/550214a4efb214dfc9c2a475607deeeea69da858</a></li>

<li>Use class_args field in opclass_drop. This makes it consistent with the usage in opclass_item. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63ebd377a6ecd3388596c3ea958e813f23b5f4ae">http://git.postgresql.org/pg/commitdiff/63ebd377a6ecd3388596c3ea958e813f23b5f4ae</a></li>

<li>Remove objname/objargs split for referring to objects. In simpler times, it might have worked to refer to all kinds of objects by a list of name components and an optional argument list. But this doesn't work for all objects, which has resulted in a collection of hacks to place various other nodes types into these fields, which have to be unpacked at the other end. This makes it also weird to represent lists of such things in the grammar, because they would have to be lists of singleton lists, to make the unpacking work consistently. The other problem is that keeping separate name and args fields makes it awkward to deal with lists of functions. Change that by dropping the objargs field and have objname, renamed to object, be a generic Node, which can then be flexibly assigned and managed using the normal Node mechanisms. In many cases it will still be a List of names, in some cases it will be a string Value, for types it will be the existing Typename, for functions it will now use the existing ObjectWithArgs node type. Some of the more obscure object types still use somewhat arbitrary nested lists. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b6d6cf853aab12f0dc2adba7c99c3e458662734">http://git.postgresql.org/pg/commitdiff/8b6d6cf853aab12f0dc2adba7c99c3e458662734</a></li>

<li>Allow dropping multiple functions at once. The generic drop support already supported dropping multiple objects of the same kind at once. But the previous representation of function signatures across two grammar symbols and structure members made this cumbersome to do for functions, so it was not supported. Now that function signatures are represented by a single structure, it's trivial to add this support. Same for aggregates and operators. Reviewed-by: Jim Nasby &lt;Jim.Nasby@BlueTreble.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/583f6c414895e72c710f723fbb3649df664530d7">http://git.postgresql.org/pg/commitdiff/583f6c414895e72c710f723fbb3649df664530d7</a></li>

<li>Fix segfault in ALTER PUBLICATION/SUBSCRIPTION RENAME. From: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; Reported-by: Fujii Masao &lt;masao.fujii@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8957927e642ae15c01f985c17fd6fe00ec68069">http://git.postgresql.org/pg/commitdiff/b8957927e642ae15c01f985c17fd6fe00ec68069</a></li>

<li>pg_waldump: Remove extra newline in error message. fatal_error() already prints out a trailing newline. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/911244610cd08fcdc28bd57db4a0d810cffc5080">http://git.postgresql.org/pg/commitdiff/911244610cd08fcdc28bd57db4a0d810cffc5080</a></li>

<li>Enable replication connections by default in pg_hba.conf. initdb now initializes a pg_hba.conf that allows replication connections from the local host, same as it does for regular connections. The connecting user still needs to have the REPLICATION attribute or be a superuser. The intent is to allow pg_basebackup from the local host to succeed without requiring additional configuration. Michael Paquier &lt;michael.paquier@gmail.com&gt; and me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be37c2120a2a88e5ba852d42952c77b6bf5d5271">http://git.postgresql.org/pg/commitdiff/be37c2120a2a88e5ba852d42952c77b6bf5d5271</a></li>

<li>Use SQL standard error code for nextval. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd603a4d6b5381cb28e993c6219037c2582100c9">http://git.postgresql.org/pg/commitdiff/cd603a4d6b5381cb28e993c6219037c2582100c9</a></li>

<li>Create INSTALL file via XSLT. As before, create an INSTALL.html file for processing with lynx, but use xsltproc and a new XSLT stylesheet instead of jade and DSSSL. Replacing jade with xsltproc removes jade from the requirements for distribution building. Reviewed-by: Magnus Hagander &lt;magnus@hagander.net&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/044d9efb6c97d65247a1287e7676de0ee75b3cfe">http://git.postgresql.org/pg/commitdiff/044d9efb6c97d65247a1287e7676de0ee75b3cfe</a></li>

<li>dblink: Replace some macros by static functions. Also remove some unused code and the no longer useful dblink.h file. Reviewed-by: Tsunakawa, Takayuki &lt;tsunakawa.takay@jp.fujitsu.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acaf7ccb94a3916ea83712671a3563f0eb595558">http://git.postgresql.org/pg/commitdiff/acaf7ccb94a3916ea83712671a3563f0eb595558</a></li>

<li>dblink: Change some StringInfo to StringInfoData. For consistency with other code and to avoid wasting some small amount of memory. From: Tsunakawa, Takayuki &lt;tsunakawa.takay@jp.fujitsu.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22ef6b041a554b7536edb3a79e0b9d5d8403f432">http://git.postgresql.org/pg/commitdiff/22ef6b041a554b7536edb3a79e0b9d5d8403f432</a></li>

<li>Improve gitignore file. One file was listed under a wrong comment. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07a61e16703b5f90650d509e29a724c68efd79ab">http://git.postgresql.org/pg/commitdiff/07a61e16703b5f90650d509e29a724c68efd79ab</a></li>

<li>pg_dump: Fix dumping of publications. Dumping a publication with more than one table crashed pg_dump. patch by Amit Langote &lt;Langote_Amit_f8@lab.ntt.co.jp&gt;, test by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de75281637b762b4ccfb776366c44251e6864d0a">http://git.postgresql.org/pg/commitdiff/de75281637b762b4ccfb776366c44251e6864d0a</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix user-after-free bug. Introduced by commit aea5d298362e881b13d95a48c5ae116879237389. Patch from Amit Kapila. Issue discovered independently by Amit Kapila and Ashutosh Sharma. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f6fa29f18aa84743185ee7ada97f277459228a7">http://git.postgresql.org/pg/commitdiff/7f6fa29f18aa84743185ee7ada97f277459228a7</a></li>

<li>Fix incorrect comments. Commit 19dc233c32f2900e57b8da4f41c0f662ab42e080 introduced these comments. Michael Paquier noticed that one of them had a typo, but a bigger problem is that they were not an accurate description of what the code was doing. Patch by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/12a2544cb5f9e1f8541d1b941da6d9dae15f50a5">http://git.postgresql.org/pg/commitdiff/12a2544cb5f9e1f8541d1b941da6d9dae15f50a5</a></li>

<li>Mark pg_start_backup and pg_stop_backup as parallel-restricted. They depend on backend-private state that will not be synchronized by the parallel machinery, so they should not be marked parallel-safe. This issue also exists in 9.6, but we obviously can't do anything about 9.6 clusters that already exist. Possibly this could be back-patched so that future 9.6 clusters would come out OK, or possibly we should back-patch some other fix, but that would need more discussion. David Steele, reviewed by Michael Paquier Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYCWfO2UM-t=HUMFJyxJywLDiLL0nAJpx88LKtvBvNECw@mail.gmail.com">http://postgr.es/m/CA+TgmoYCWfO2UM-t=HUMFJyxJywLDiLL0nAJpx88LKtvBvNECw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fe3c644a73198941e9a502958c24727dc4a6434">http://git.postgresql.org/pg/commitdiff/9fe3c644a73198941e9a502958c24727dc4a6434</a></li>

<li>Fix parallel hash join path search. When the very cheapest path is not parallel-safe, we want to instead use the cheapest unparameterized path that is. The old code searched innerrel-&gt;cheapest_parameterized_paths, but that isn't right, because the path we want may not be in that list. Search innerrel-&gt;pathlist instead. Spotted by Dilip Kumar. Discussion: <a target="_blank" href="http://postgr.es/m/CAFiTN-szCEcZrQm0i_w4xqSaRUTOUFstNu32Zn4rxxDcoa8gnA@mail.gmail.com">http://postgr.es/m/CAFiTN-szCEcZrQm0i_w4xqSaRUTOUFstNu32Zn4rxxDcoa8gnA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/655393a022bd653e2b48dbf20b69236981e35195">http://git.postgresql.org/pg/commitdiff/655393a022bd653e2b48dbf20b69236981e35195</a></li>

<li>Preparatory refactoring for parallel merge join support. Extract the logic used by hash_inner_and_outer into a separate function, get_cheapest_parallel_safe_total_inner, so that it can also be used to plan parallel merge joins. Also, add a require_parallel_safe argument to the existing function get_cheapest_path_for_pathkeys, because parallel merge join needs to find the cheapest path for a given set of pathkeys that is parallel-safe, not just the cheapest one overall. Patch by me, reviewed by Dilip Kumar. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYOv+dFK0MWW6366dFj_xTnohQfoBDrHyB7d1oZhrgPjA@mail.gmail.com">http://postgr.es/m/CA+TgmoYOv+dFK0MWW6366dFj_xTnohQfoBDrHyB7d1oZhrgPjA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a71f10189dc10a2fe422158a2c9409e0f77c6b9e">http://git.postgresql.org/pg/commitdiff/a71f10189dc10a2fe422158a2c9409e0f77c6b9e</a></li>

<li>Fix wrong word in comment. Third time's the charm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd87a5ed65f2b4f3bdf07c9664a64696c86d17be">http://git.postgresql.org/pg/commitdiff/cd87a5ed65f2b4f3bdf07c9664a64696c86d17be</a></li>

<li>Document what values postgres_fdw sets for each parameter it sets. David Rader, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/889a3f4892b271c502f74082a352447408f6292d">http://git.postgresql.org/pg/commitdiff/889a3f4892b271c502f74082a352447408f6292d</a></li>

<li>Remove duplicated word. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/508dabaf39e1f66cbe3fc54d2b66f010aa59c66b">http://git.postgresql.org/pg/commitdiff/508dabaf39e1f66cbe3fc54d2b66f010aa59c66b</a></li>

<li>Fix relcache reference leak. Reported by Kevin Grittner. Faulty commit identified by Tom Lane. Patch by Amit Langote, reviewed by Michael Paquier. Discussion: <a target="_blank" href="http://postgr.es/m/CACjxUsOHbH1=99u8mGxmLHfy5hov4ENEpvM6=3ARjos7wG7rtQ@mail.gmail.com">http://postgr.es/m/CACjxUsOHbH1=99u8mGxmLHfy5hov4ENEpvM6=3ARjos7wG7rtQ@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d88d06cd0783933b7103d42d3f101baa22b37292">http://git.postgresql.org/pg/commitdiff/d88d06cd0783933b7103d42d3f101baa22b37292</a></li>

<li>Give partitioned table "p" in regression tests a less generic name. And don't drop it, so that we improve the coverage of the pg_upgrade regression tests. Amit Langote, per a gripe from Tom Lane Discussion: <a target="_blank" href="http://postgr.es/m/9071.1488863082@sss.pgh.pa.us">http://postgr.es/m/9071.1488863082@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa56671836e6f80dc3bdc917dfc860ac10b822be">http://git.postgresql.org/pg/commitdiff/aa56671836e6f80dc3bdc917dfc860ac10b822be</a></li>

<li>Consider parallel merge joins. Commit 45be99f8cd5d606086e0a458c9c72910ba8a613d took the position that performing a merge join in parallel was not likely to work out well, but this conclusion was greeted with skepticism even at the time. Whether it was true then or not, it's clearly not true any more now that we have parallel index scan. Dilip Kumar, reviewed by Amit Kapila and by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFiTN-v3=cM6nyFwFGp0fmvY4=kk79Hq9Fgu0u8CSJ-EEq1Tiw@mail.gmail.com">http://postgr.es/m/CAFiTN-v3=cM6nyFwFGp0fmvY4=kk79Hq9Fgu0u8CSJ-EEq1Tiw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bc7dafa9bebbdaa1bbf0da0798d29a8bdaf6a8f">http://git.postgresql.org/pg/commitdiff/3bc7dafa9bebbdaa1bbf0da0798d29a8bdaf6a8f</a></li>

<li>Properly initialize variable. Commit 3bc7dafa9bebbdaa1bbf0da0798d29a8bdaf6a8f forgot to do this. Noted while experimenting with valgrind. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/506f05423a7c60eef8ed8b5430d03be1fec138a2">http://git.postgresql.org/pg/commitdiff/506f05423a7c60eef8ed8b5430d03be1fec138a2</a></li>

<li>Improve postgresql.conf.sample comments about parallel workers. David Rowley, reviewed by Amit Kapila Discussion: <a target="_blank" href="http://postgr.es/m/CAKJS1f8gPEUPscj6kSqpveMnnx9_3ZypzwsKstv+8atx6VmjBg@mail.gmail.com">http://postgr.es/m/CAKJS1f8gPEUPscj6kSqpveMnnx9_3ZypzwsKstv+8atx6VmjBg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b87dd8d7ae33ef5c70671674c08bbff066738bf">http://git.postgresql.org/pg/commitdiff/2b87dd8d7ae33ef5c70671674c08bbff066738bf</a></li>

<li>hash: Refactor hash index creation. The primary goal here is to move all of the related page modifications to a single section of code, in preparation for adding write-ahead logging. In passing, rename _hash_metapinit to _hash_init, since it initializes more than just the metapage. Amit Kapila. The larger patch series of which this is a part has been reviewed and tested by &Atilde;lvaro Herrera, Ashutosh Sharma, Mark Kirkwood, Jeff Janes, and Jesper Pedersen. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38305398cdc029e3a74bfad1815cb33f5b087336">http://git.postgresql.org/pg/commitdiff/38305398cdc029e3a74bfad1815cb33f5b087336</a></li>

<li>tidbitmap: Support shared iteration. When a shared iterator is used, each call to tbm_shared_iterate() returns a result that has not yet been returned to any process attached to the shared iterator. In other words, each cooperating processes gets a disjoint subset of the full result set, but all results are returned exactly once. This is infrastructure for parallel bitmap heap scan. Dilip Kumar. The larger patch set of which this is a part has been reviewed and tested by (at least) Andres Freund, Amit Khandekar, Tushar Ahuja, Rafia Sabih, Haribabu Kommi, and Thomas Munro. Discussion: <a target="_blank" href="http://postgr.es/m/CAFiTN-uc4=0WxRGfCzs-xfkMYcSEWUC-Fon6thkJGjkh9i=13A@mail.gmail.com">http://postgr.es/m/CAFiTN-uc4=0WxRGfCzs-xfkMYcSEWUC-Fon6thkJGjkh9i=13A@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98e6e89040a0534ca26914c66cae9dd49ef62ad9">http://git.postgresql.org/pg/commitdiff/98e6e89040a0534ca26914c66cae9dd49ef62ad9</a></li>

<li>Fix parallel index and index-only scans to fall back to serial. Parallel executor nodes can't assume that parallel execution will happen in every case where the plan calls for it, because it might not work out that way. However, parallel index scan and parallel index-only scan failed to do the right thing here. Repair. Amit Kapila, per a report from me. Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1Kq5qb_u2AOoda5XBB91vVWz90w=LgtRLgsssriS8pVTw@mail.gmail.com">http://postgr.es/m/CAA4eK1Kq5qb_u2AOoda5XBB91vVWz90w=LgtRLgsssriS8pVTw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09529a70bb5a77935d086d651c63396767d240d7">http://git.postgresql.org/pg/commitdiff/09529a70bb5a77935d086d651c63396767d240d7</a></li>

<li>Remove inclusion of postgres.h from a few header files. Thomas Munro, per project policy articuled by Andres Freund and Tom Lane. Discussion: <a target="_blank" href="http://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com">http://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9528604ccb05f545be7ca2bad161877fd3d9c13">http://git.postgresql.org/pg/commitdiff/d9528604ccb05f545be7ca2bad161877fd3d9c13</a></li>

<li>Add tests for foreign partitions. Amit Langote, reviewed by Ashutosh Bapat Discussion: <a target="_blank" href="http://postgr.es/m/475dd52c-be4a-9b32-6d54-3044a00c93d9@lab.ntt.co.jp">http://postgr.es/m/475dd52c-be4a-9b32-6d54-3044a00c93d9@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d130c7abc85f828dced6c134a5fcbff3215c497">http://git.postgresql.org/pg/commitdiff/0d130c7abc85f828dced6c134a5fcbff3215c497</a></li>

<li>Support parallel bitmap heap scans. The index is scanned by a single process, but then all cooperating processes can iterate jointly over the resulting set of heap blocks. In the future, we might also want to support using a parallel bitmap index scan to set up for a parallel bitmap heap scan, but that's a job for another day. Dilip Kumar, with some corrections and cosmetic changes by me. The larger patch set of which this is a part has been reviewed and tested by (at least) Andres Freund, Amit Khandekar, Tushar Ahuja, Rafia Sabih, Haribabu Kommi, Thomas Munro, and me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFiTN-uc4=0WxRGfCzs-xfkMYcSEWUC-Fon6thkJGjkh9i=13A@mail.gmail.com">http://postgr.es/m/CAFiTN-uc4=0WxRGfCzs-xfkMYcSEWUC-Fon6thkJGjkh9i=13A@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f35742ccb7aa53ee3ed8416bbb378b0c3eeb6bb9">http://git.postgresql.org/pg/commitdiff/f35742ccb7aa53ee3ed8416bbb378b0c3eeb6bb9</a></li>

<li>Add a Gather Merge executor node. Like Gather, we spawn multiple workers and run the same plan in each one; however, Gather Merge is used when each worker produces the same output ordering and we want to preserve that output ordering while merging together the streams of tuples from various workers. (In a way, Gather Merge is like a hybrid of Gather and MergeAppend.) This works out to a win if it saves us from having to perform an expensive Sort. In cases where only a small amount of data would need to be sorted, it may actually be faster to use a regular Gather node and then sort the results afterward, because Gather Merge sometimes needs to wait synchronously for tuples whereas a pure Gather generally doesn't. But if this avoids an expensive sort then it's a win. Rushabh Lathia, reviewed and tested by Amit Kapila, Thomas Munro, and Neha Sharma, and reviewed and revised by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAGPqQf09oPX-cQRpBKS0Gq49Z+m6KBxgxd_p9gX8CKk_d75HoQ@mail.gmail.com">http://postgr.es/m/CAGPqQf09oPX-cQRpBKS0Gq49Z+m6KBxgxd_p9gX8CKk_d75HoQ@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/355d3993c53ed62c5b53d020648e4fbcfbf5f155">http://git.postgresql.org/pg/commitdiff/355d3993c53ed62c5b53d020648e4fbcfbf5f155</a></li>

<li>Fix a couple of planner bugs in Gather Merge. Neha Sharma reported these to Rushabh Lathia just after I commit 355d3993c53ed62c5b53d020648e4fbcfbf5f155 went in. The patch is Rushabh's, with input from me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ee92e1c9b570f90d043e5b033a19b67497ea1f6">http://git.postgresql.org/pg/commitdiff/0ee92e1c9b570f90d043e5b033a19b67497ea1f6</a></li>

<li>Fix bug in parallel tidbitmap iteration. Avoid computing idxpages[istate-&gt;spageptr] until after checking that istate-&gt;spageptr is a legal index. Dilip Kumar, per a report from David Rowley Discussion: <a target="_blank" href="http://postgr.es/m/CAKJS1f8OtrHE+-P+=E=4ycnL29e9idZKuaTQ6o2MbhvGN9D8ig@mail.gmail.com">http://postgr.es/m/CAKJS1f8OtrHE+-P+=E=4ycnL29e9idZKuaTQ6o2MbhvGN9D8ig@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a468c343b31aabead7d3a5e11079bfcddbfd667">http://git.postgresql.org/pg/commitdiff/6a468c343b31aabead7d3a5e11079bfcddbfd667</a></li>

<li>Document some new parallel query capabilities. This updates the text for parallel index scan, parallel index-only scan, parallel bitmap heap scan, and parallel merge join. It also expands the discussion of parallel joins slightly. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoZnCUoM31w3w7JSakVQJQOtcuTyX=HLUr-X1rto2=2bjw@mail.gmail.com">http://postgr.es/m/CA+TgmoZnCUoM31w3w7JSakVQJQOtcuTyX=HLUr-X1rto2=2bjw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/054637d2e08cda6a096f48cc99696136a06f4ef5">http://git.postgresql.org/pg/commitdiff/054637d2e08cda6a096f48cc99696136a06f4ef5</a></li>

<li>Document lack of validation when attaching foreign partitions. Ashutosh Bapat, revised a bit by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRdLaCa-1wJase0=YWG5o3cJnbuUt_vrqm2TDBKM_vQ_oA@mail.gmail.com">http://postgr.es/m/CAFjFpRdLaCa-1wJase0=YWG5o3cJnbuUt_vrqm2TDBKM_vQ_oA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b54aad8e34bd6299093e965c50f4a23da96d7cc3">http://git.postgresql.org/pg/commitdiff/b54aad8e34bd6299093e965c50f4a23da96d7cc3</a></li>

<li>Use group updates when setting transaction status in clog. Commit 0e141c0fbb211bdd23783afa731e3eef95c9ad7a introduced a mechanism to reduce contention on ProcArrayLock by having a single process clear XIDs in the procArray on behalf of multiple processes, reducing the need to hand the lock around. Use a similar mechanism to reduce contention on CLogControlLock. Testing shows that this very significantly reduces the amount of time waiting for CLogControlLock on high-concurrency pgbench tests run on a large multi-socket machines; whether that translates into a TPS improvement depends on how much of that contention is simply shifted to some other lock, particularly WALWriteLock. Amit Kapila, with some cosmetic changes by me. Extensively reviewed, tested, and benchmarked over a period of about 15 months by Simon Riggs, Robert Haas, Andres Freund, Jesper Pedersen, and especially by Tomas Vondra and Dilip Kumar. Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1L_snxM_JcrzEstNq9P66++F4kKFce=1r5+D1vzPofdtg@mail.gmail.com">http://postgr.es/m/CAA4eK1L_snxM_JcrzEstNq9P66++F4kKFce=1r5+D1vzPofdtg@mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1LyR2A+m=RBSZ6rcPEwJ=rVi1ADPSndXHZdjn56yqO6Vg@mail.gmail.com">http://postgr.es/m/CAA4eK1LyR2A+m=RBSZ6rcPEwJ=rVi1ADPSndXHZdjn56yqO6Vg@mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/91d57161-d3ea-0cc2-6066-80713e4f90d7@2ndquadrant.com">http://postgr.es/m/91d57161-d3ea-0cc2-6066-80713e4f90d7@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccce90b398673d55b0387b3de66639b1b30d451b">http://git.postgresql.org/pg/commitdiff/ccce90b398673d55b0387b3de66639b1b30d451b</a></li>

<li>Throw an error if a DATA() line contains wrong # of attributes. David Christensen, reviewed by Dagfinn Ilmari Manns&Atilde;&yen;ker Discussion: <a target="_blank" href="http://postgr.es/m/20170215154018.fs5vwtqhp5d2sifs@veeddeux.attlocal.net">http://postgr.es/m/20170215154018.fs5vwtqhp5d2sifs@veeddeux.attlocal.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7666e73a2e9e0e91a9f3b246a4299b44daadcbf8">http://git.postgresql.org/pg/commitdiff/7666e73a2e9e0e91a9f3b246a4299b44daadcbf8</a></li>

<li>Revert "Use group updates when setting transaction status in clog.". This reverts commit ccce90b398673d55b0387b3de66639b1b30d451b. This optimization is unsafe, at least, of rollbacks and rollbacks to savepoints, but I'm concerned there may be other problematic cases as well. Therefore, I've decided to revert this pending further investigation. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/390811750d1647ed81a462da3af7f1fd66166e95">http://git.postgresql.org/pg/commitdiff/390811750d1647ed81a462da3af7f1fd66166e95</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Avoid dangling pointer to relation name in RLS code path in DoCopy(). With RLS active, "COPY tab TO ..." failed under -DRELCACHE_FORCE_RELEASE, and would sometimes fail without that, because it used the relation name directly from the relcache as part of the parsetree it's building. That becomes a potentially-dangling pointer as soon as the relcache entry is closed, a bit further down. Typical symptom if the relcache entry chanced to get cleared would be "relation does not exist" error with a garbage relation name, or possibly a core dump; but if you were really truly unlucky, the COPY might copy from the wrong table. Per report from Andrew Dunstan that regression tests fail with -DRELCACHE_FORCE_RELEASE. The core tests now pass for me (but have not tried "make check-world" yet). Discussion: <a target="_blank" href="https://postgr.es/m/7b52f900-0579-cda9-ae2e-de5da17090e6@2ndQuadrant.com">https://postgr.es/m/7b52f900-0579-cda9-ae2e-de5da17090e6@2ndQuadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8df75b0a470f477dad75a7408e429e10c13fc07">http://git.postgresql.org/pg/commitdiff/a8df75b0a470f477dad75a7408e429e10c13fc07</a></li>

<li>Repair incorrect pg_dump labeling for some comments and security labels. We attached no schema label to comments for procedural languages, casts, transforms, operator classes, operator families, or text search objects. The first three categories of objects don't really have schemas, but pg_dump treats them as if they do, and it seems like the TocEntry fields for their comments had better match the TocEntry fields for the parent objects. (As an example of a possible hazard, the type names in a CAST will be formatted with the assumption of a particular search_path, so failing to ensure that this same path is active for the COMMENT ON command could lead to an error or to attaching the comment to the wrong cast.) In the last six cases, this was a flat-out error --- possibly mine to begin with, but it was a long time ago. The security label for a procedural language was likewise not correctly labeled as to schema, and both the comment and security label for a procedural language were not correctly labeled as to owner. In simple cases the restore would accidentally work correctly anyway, since these comments and security labels would normally get emitted right after the owning object, and so the search path and active user would be correct anyhow. But it could fail in corner cases; for example a schema-selective restore would omit comments it should include. Giuseppe Broccolo noted the oversight, and proposed the correct fix, for text search dictionary objects; I found the rest by cross-checking other dumpComment() calls. These oversights are ancient, so back-patch all the way. Discussion: <a target="_blank" href="https://postgr.es/m/CAFzmHiWwwzLjzwM4x5ki5s_PDMR6NrkipZkjNnO3B0xEpBgJaA@mail.gmail.com">https://postgr.es/m/CAFzmHiWwwzLjzwM4x5ki5s_PDMR6NrkipZkjNnO3B0xEpBgJaA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/299990ba16ab75b09b7fed61322f1f23fdc7cf4c">http://git.postgresql.org/pg/commitdiff/299990ba16ab75b09b7fed61322f1f23fdc7cf4c</a></li>

<li>Remove vestigial grammar support for CHARACTER ... CHARACTER SET option. The SQL standard says that you should be able to write "CHARACTER SET foo" as part of the declaration of a char-type column. We don't implement that, but a rough form of support has existed in gram.y since commit f10b63923. That's now sat there for nigh 20 years without anyone fleshing it out --- and even if someone did, the contemplated approach of having separate data type name(s) for every character set certainly isn't what we'd do today. Let's just remove the grammar production; if anyone is ever motivated to work on this, reinventing the grammar support is a trivial fraction of what they'd have to do. And we've never documented anything about supporting such a clause. Per gripe from Neha Khatri. Discussion: <a target="_blank" href="https://postgr.es/m/CAFO0U+-iOS5oYN5v3SBuZvfhPUTRrkDFEx8w7H17B07Rwg3YUA@mail.gmail.com">https://postgr.es/m/CAFO0U+-iOS5oYN5v3SBuZvfhPUTRrkDFEx8w7H17B07Rwg3YUA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11324e408f0e3a25621c611467927c644894b30d">http://git.postgresql.org/pg/commitdiff/11324e408f0e3a25621c611467927c644894b30d</a></li>

<li>Fix pgbench's failure to honor the documented long-form option "--builtin". Not only did it not accept --builtin as a synonym for -b, but what it did accept as a synonym was --tpc-b (huh?), which it got even further wrong by marking as no_argument, so that if you did try that you got a core dump. I suppose this is leftover from some early design for the new switches added by commit 8bea3d221, but it's still pretty sloppy work. Per bug #14580 from Stepan Pesternikov. Back-patch to 9.6 where the error was introduced. Report: <a target="_blank" href="https://postgr.es/m/20170307123347.25054.73207@wrigleys.postgresql.org">https://postgr.es/m/20170307123347.25054.73207@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef2662394455578f6c57e99a7896c69bdd9fbd74">http://git.postgresql.org/pg/commitdiff/ef2662394455578f6c57e99a7896c69bdd9fbd74</a></li>

<li>Clean up test_ifaddrs a bit. We customarily #include &lt;netinet/in.h&gt; before &lt;arpa/inet.h&gt;; according to our git history (cf commit 527f8babc) there used to be platform(s) where &lt;arpa/inet.h&gt; didn't compile otherwise. That's probably not really an issue anymore, but since test_ifaddrs.c is the one and only place in our code that's not following that rule, bring it into line. Also remove #include &lt;sys/socket.h&gt;, as that's duplicative given that libpq/ifaddr.h does so (via pqcomm.h). In passing, add a .gitignore file so nobody accidentally commits the test_ifaddrs executable, as I nearly did. I see no particular need to back-patch this, as it's just neatnik-ism considering we don't build test_ifaddrs by default, or even document it anywhere. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03cf2219346aa78ecd1b6d4501a7697692a43c62">http://git.postgresql.org/pg/commitdiff/03cf2219346aa78ecd1b6d4501a7697692a43c62</a></li>

<li>Invent start_proc parameters for PL/Tcl. Define GUCs pltcl.start_proc and pltclu.start_proc. When set to a nonempty value at the time a new Tcl interpreter is created, the parameterless pltcl or pltclu function named by the GUC is called to allow user-controlled initialization to occur within the interpreter. This is modeled on plv8's start_proc parameter, and also has much in common with plperl's on_init feature. It allows users to fully replace the "modules" feature that was removed in commit 817f2a586. Since an initializer function could subvert later Tcl code in nearly arbitrary ways, mark both GUCs as SUSET for now. It would be nice to find a way to relax that someday; but the corresponding GUCs in plperl are also SUSET, and there's not been much complaint. Discussion: <a target="_blank" href="https://postgr.es/m/22067.1488046447@sss.pgh.pa.us">https://postgr.es/m/22067.1488046447@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d2b1f305dc78d536d80cfb4bb2ac4d7104453db">http://git.postgresql.org/pg/commitdiff/0d2b1f305dc78d536d80cfb4bb2ac4d7104453db</a></li>

<li>Silence compiler warnings in tbm_prepare_shared_iterate(). Maybe Robert's compiler can convince itself that these variables are never used uninitialized, but mine can't. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/270d7dd8a5a7128fc2b859f3bf95e2c1fb45be79">http://git.postgresql.org/pg/commitdiff/270d7dd8a5a7128fc2b859f3bf95e2c1fb45be79</a></li>

<li>Use doubly-linked block lists in aset.c to reduce large-chunk overhead. Large chunks (those too large for any palloc freelist) are managed as separate blocks. Formerly, realloc'ing or pfree'ing such a chunk required O(N) time in a context with N blocks, since we had to traipse down the singly-linked block list to locate the block's predecessor before we could fix the list links. This can result in O(N^2) runtime in situations where large numbers of such chunks are manipulated within one context. Cases like that were not foreseen in the original design of aset.c, and indeed didn't arise until fairly recently. But such problems can now occur in reorderbuffer.c and in hash joining, both of which make repeated large requests without scaling up their request size as they do so, and which will free their requests in not-necessarily-LIFO order. To fix, change the block list from singly-linked to doubly-linked. This adds another 4 or 8 bytes to ALLOC_BLOCKHDRSZ, but that doesn't seem like unacceptable overhead, since aset.c's blocks are normally 8K or more, and never less than 1K in current practice. In passing, get rid of some redundant AllocChunkGetPointer() calls in AllocSetRealloc (the compiler might be smart enough to optimize these away anyway, but no need to assume that) and improve AllocSetCheck's checking of block header fields. Back-patch to 9.4 where reorderbuffer.c appeared. We could take this further back, but currently there's no evidence that it would be useful. Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1x1hvue1XYrZoWk_omG0Ja5nBvTdvgrOeVkkeqs71CV8g@mail.gmail.com">https://postgr.es/m/CAMkU=1x1hvue1XYrZoWk_omG0Ja5nBvTdvgrOeVkkeqs71CV8g@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff97741bc810390db6dd4da0f31ee1e93c8d3abb">http://git.postgresql.org/pg/commitdiff/ff97741bc810390db6dd4da0f31ee1e93c8d3abb</a></li>

<li>Silence compiler warnings in BitmapHeapNext(). Same disease as 270d7dd8a5a7128fc2b859f3bf95e2c1fb45be79. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15d03e597662847e13428a8b3ce9dd59c38decf3">http://git.postgresql.org/pg/commitdiff/15d03e597662847e13428a8b3ce9dd59c38decf3</a></li>

<li>Put back &lt;float.h&gt; in a few files that need it for _isnan(). Further fallout from commit c29aff959: there are some files that need &lt;float.h&gt;, and were getting it from datatype/timestamp.h, but it was not apparent in my (tgl's) testing because the requirement for &lt;float.h&gt; exists only on certain Windows toolchains. Report and patch by David Rowley. Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f-BHceaFzZScFapDV48gUVM2CAOBfhkgffdqXzFb+kwew@mail.gmail.com">https://postgr.es/m/CAKJS1f-BHceaFzZScFapDV48gUVM2CAOBfhkgffdqXzFb+kwew@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86dbbf20d8496ede77566873d1e22cd11c1e544c">http://git.postgresql.org/pg/commitdiff/86dbbf20d8496ede77566873d1e22cd11c1e544c</a></li>

<li>Suppress compiler warning in non-USE_LIBXML builds. Compilers that don't realize that ereport(ERROR) doesn't return complained that XmlTableGetValue() failed to return a value. Also, make XmlTableFetchRow's non-USE_LIBXML case look more like the other ones. As coded, it could lead to "unreachable code" warnings with USE_LIBXML enabled. Oversights in commit fcec6caaf. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f379121093deb5465b01d93ebe9410d96c6cd093">http://git.postgresql.org/pg/commitdiff/f379121093deb5465b01d93ebe9410d96c6cd093</a></li>

<li>Suppress compiler warning in slab.c. Compilers that don't realize that elog(ERROR) doesn't return complained that SlabRealloc() failed to return a value. While at it, fix the rather muddled header comment for the function. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f899e7d37ece937740c99164dd846c4b6f884eb">http://git.postgresql.org/pg/commitdiff/2f899e7d37ece937740c99164dd846c4b6f884eb</a></li>

<li>Document intentional violations of header inclusion policy. Although there are good reasons for our policy of including postgres.h as the first #include in every .c file, never from .h files, there are two places where it seems expedient to violate the policy because the alternative is to modify externally-supplied .c files. (In the case of the regexp library, the idea that it's externally-supplied is kind of at odds with reality, but I haven't entirely given up hope that it will become a standalone project some day.) Add some comments to make it explicit that this is a policy violation and provide the reasoning. In passing, move #include "miscadmin.h" out of regcomp.c and into regcustom.h, which is where it should be if we're taking this reasoning seriously at all. Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com">https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com</a> Discussion: <a target="_blank" href="https://postgr.es/m/11634.1488932128@sss.pgh.pa.us">https://postgr.es/m/11634.1488932128@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6b059ec740a6affce9a069f1210d161068317e3">http://git.postgresql.org/pg/commitdiff/d6b059ec740a6affce9a069f1210d161068317e3</a></li>

<li>Bring plpgsql into line with header inclusion policy. We have a project policy that every .c file should start by including postgres.h, postgres_fe.h, or c.h as appropriate; and then there is no need for any .h file to explicitly include any of these. (The core reason for this policy is to make it easy to verify that pg_config_os.h is included before any system headers such as &lt;stdio.h&gt;; without that, we have portability issues on some platforms due to variation in largefile options across different modules in the backend. Also, if .h files were responsible for choosing which of these key headers to include, .h files that need to be includable in either frontend or backend compiles would be in trouble.) plpgsql was blithely ignoring this policy, so whack it upside the head until it complies. I also chose to standardize on including plpgsql's own .h files after all core-system headers that it pulls in. That could've been done either way, but this way seems saner. Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com">https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com</a> Discussion: <a target="_blank" href="https://postgr.es/m/11634.1488932128@sss.pgh.pa.us">https://postgr.es/m/11634.1488932128@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08da52859a1fadeac10aab621c6c793791ec1f2c">http://git.postgresql.org/pg/commitdiff/08da52859a1fadeac10aab621c6c793791ec1f2c</a></li>

<li>Fix inclusions of postgres_fe.h from .h files. We have a project policy that every .c file should start by including postgres.h, postgres_fe.h, or c.h as appropriate; and then there is no need for any .h file to explicitly include any of these. Fix a few headers that were violating this policy by including postgres_fe.h. Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com">https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com</a> Discussion: <a target="_blank" href="https://postgr.es/m/11634.1488932128@sss.pgh.pa.us">https://postgr.es/m/11634.1488932128@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9722bb5757c5e90617be685bf127911b63efe08d">http://git.postgresql.org/pg/commitdiff/9722bb5757c5e90617be685bf127911b63efe08d</a></li>

<li>Fix inclusions of c.h from .h files. We have a project policy that every .c file should start by including postgres.h, postgres_fe.h, or c.h as appropriate; and then there is no need for any .h file to explicitly include any of these. Fix a few headers that were violating this policy by including c.h. Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com">https://postgr.es/m/CAEepm=2zCoeq3QxVwhS5DFeUh=yU6z81pbWMgfOB8OzyiBwxzw@mail.gmail.com</a> Discussion: <a target="_blank" href="https://postgr.es/m/11634.1488932128@sss.pgh.pa.us">https://postgr.es/m/11634.1488932128@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a72f0365db4168e7d720608fe3ac0ca3fe9355df">http://git.postgresql.org/pg/commitdiff/a72f0365db4168e7d720608fe3ac0ca3fe9355df</a></li>

<li>Fix timestamptz regression test to still work with latest IANA zone data. The IANA timezone crew continues to chip away at their project of removing timezone abbreviations that have no real-world currency from their database. The tzdata2017a update removes all such abbreviations for South American zones, as well as much of the Pacific. This breaks some test cases in timestamptz.sql that were expecting America/Santiago and America/Caracas to have non-numeric abbreviations. The test cases involving America/Santiago seem to have selected that zone more or less at random, so just replace it with America/New_York, which is of similar longitude. The cases involving America/Caracas are harder since they were chosen to test a time-varying zone abbreviation around a point where it changed meaning in the backwards direction. Fortunately, Europe/Moscow has a similar case in 2014, and the MSK/MSD abbreviations are well enough attested that IANA seems unlikely to decide to remove them from the database in future. With these changes, this regression test should pass when using any IANA zone database from 2015 or later. One could wish that there were a few years more daylight on how out-of-date your zone database can be ... but really the --with-system-tzdata option is only meant for use on platforms where the zone database is kept up-to-date pretty faithfully, so I do not think this is a big objection. Discussion: <a target="_blank" href="https://postgr.es/m/6749.1489087470@sss.pgh.pa.us">https://postgr.es/m/6749.1489087470@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f077e1b2e374fadc443b6aa9fa54ad9bb6f908c7">http://git.postgresql.org/pg/commitdiff/f077e1b2e374fadc443b6aa9fa54ad9bb6f908c7</a></li>

<li>Fix hard-coded relkind constants in pg_dump.c. Although it's reasonable to expect that most of these constants will never change, that does not make it good programming style to hard-code the value rather than using the RELKIND_FOO macros. There were only a few such violations, and all relatively new AFAICT. Existing style is mostly to inject relkind values into constructed query strings using %c. I did not bother to touch places that did it like that, but really a better technique is to stringify the RELKIND macro, at least in places where you'd want single quotes around the code character. That avoids any runtime effort and keeps the RELKIND symbol close to where it's used. Discussion: <a target="_blank" href="https://postgr.es/m/11145.1488931324@sss.pgh.pa.us">https://postgr.es/m/11145.1488931324@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe797b4a6a69ec0c9bf6ff992eac20c4084fda41">http://git.postgresql.org/pg/commitdiff/fe797b4a6a69ec0c9bf6ff992eac20c4084fda41</a></li>

<li>Make CppAsString2() more visible in c.h. For some reason this standard C string-processing hack was buried in an NLS-related section of c.h. Put it beside CppAsString() so that people are more likely to find it and not be tempted to reinvent local copies, as I nearly did. And provide a more helpful comment, too. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cfc4deeb9e6bd8162bd85dce5809d4d7aea2b66">http://git.postgresql.org/pg/commitdiff/9cfc4deeb9e6bd8162bd85dce5809d4d7aea2b66</a></li>

<li>Fix hard-coded relkind constants in psql/describe.c. Although it's reasonable to expect that most of these constants will never change, that does not make it good programming style to hard-code the value rather than using the RELKIND_FOO macros. Discussion: <a target="_blank" href="https://postgr.es/m/11145.1488931324@sss.pgh.pa.us">https://postgr.es/m/11145.1488931324@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/395bfaae8e786eb17fc9dd79e4636f97c9d9b820">http://git.postgresql.org/pg/commitdiff/395bfaae8e786eb17fc9dd79e4636f97c9d9b820</a></li>

<li>Fix portability problem in Catalog.pm. Commit 7666e73a2 introduced a dependency on filehandles' input_line_number method, but apparently that's a Perl neologism. Use $. instead, which works at least back to Perl 5.10, and hopefully back to 5.8. Jeff Janes Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1wuQW=xVfu-14A4VCvxO0ohkD3m9vk6HOj_dprQoKNAQw@mail.gmail.com">https://postgr.es/m/CAMkU=1wuQW=xVfu-14A4VCvxO0ohkD3m9vk6HOj_dprQoKNAQw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15bb93e28e49fdf4f28d509c07d1527886acb3e2">http://git.postgresql.org/pg/commitdiff/15bb93e28e49fdf4f28d509c07d1527886acb3e2</a></li>

<li>Fix hard-coded relkind constants in assorted src/bin files. Although it's reasonable to expect that most of these constants will never change, that does not make it good programming style to hard-code the value rather than using the RELKIND_FOO macros. Discussion: <a target="_blank" href="https://postgr.es/m/11145.1488931324@sss.pgh.pa.us">https://postgr.es/m/11145.1488931324@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcd778eb703c154c0fbba249e17c21b7ae4de19b">http://git.postgresql.org/pg/commitdiff/fcd778eb703c154c0fbba249e17c21b7ae4de19b</a></li>

<li>Add .gitignore to contrib/amcheck. Oversight in commit 3717dc149. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/574268e37b3b7b3449eb0034013443d88f4bd320">http://git.postgresql.org/pg/commitdiff/574268e37b3b7b3449eb0034013443d88f4bd320</a></li>

<li>Fix hard-coded relkind constants in assorted other files. Although it's reasonable to expect that most of these constants will never change, that does not make it good programming style to hard-code the value rather than using the RELKIND_FOO macros. I think I've now gotten all the hard-coded references in C code. Unfortunately there's no equally convenient way to parameterize SQL files ... Discussion: <a target="_blank" href="https://postgr.es/m/11145.1488931324@sss.pgh.pa.us">https://postgr.es/m/11145.1488931324@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c2635e26f6f4e34b3b606c0fc79d0e111953a74">http://git.postgresql.org/pg/commitdiff/9c2635e26f6f4e34b3b606c0fc79d0e111953a74</a></li>

<li>Un-break things on IPv6-less platforms. Commit be37c2120 forgot to teach initdb about commenting out the IPv6 replication entry that it caused to exist in pg_hba.conf.sample. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a83e4b4f31c7afa5f7360086ebb1916cc99a4dbe">http://git.postgresql.org/pg/commitdiff/a83e4b4f31c7afa5f7360086ebb1916cc99a4dbe</a></li>

<li>Change the relkind for partitioned tables from 'P' to 'p'. Seven of the eight other relkind codes are lower-case, so it wasn't consistent for this one to be upper-case. Fix it while we still can. Historical notes: the reason for the lone exception, i.e. sequences being 'S', is that 's' was once used for "special" relations. Also, at one time the partitioned-tables patch used both 'P' and 'p', but that got changed, leaving only a surprising choice behind. This also fixes a couple little bits of technical debt, such as type_sanity.sql not knowing that 'm' is a legal value for relkind. Discussion: <a target="_blank" href="https://postgr.es/m/27899.1488909319@sss.pgh.pa.us">https://postgr.es/m/27899.1488909319@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b358b42f8eb6156a82ac9a41fc4e8335c8dc37a">http://git.postgresql.org/pg/commitdiff/8b358b42f8eb6156a82ac9a41fc4e8335c8dc37a</a></li>

<li>Sanitize newlines in object names in "pg_restore -l" output. Commits 89e0bac86 et al replaced newlines with spaces in object names printed in SQL comments, but we neglected to consider that the same names are also printed by "pg_restore -l", and a newline would render the output unparseable by "pg_restore -L". Apply the same replacement in "-l" output. Since "pg_restore -L" doesn't actually examine any object names, only the dump ID field that starts each line, this is enough to fix things for its purposes. The previous fix was treated as a security issue, and we might have done that here as well, except that the issue was reported publicly to start with. Anyway it's hard to see how this could be exploited for SQL injection; "pg_restore -L" doesn't do much with the file except parse it for leading integers. Per bug #14587 from Milos Urbanek. Back-patch to all supported versions. Discussion: <a target="_blank" href="https://postgr.es/m/20170310155318.1425.30483@wrigleys.postgresql.org">https://postgr.es/m/20170310155318.1425.30483@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f39ddd843667c68f760cb4cf23c89c1f1d9aebb8">http://git.postgresql.org/pg/commitdiff/f39ddd843667c68f760cb4cf23c89c1f1d9aebb8</a></li>

<li>Reduce log verbosity of startup/shutdown for launcher subprocesses. There's no really good reason why the autovacuum launcher and logical replication launcher should announce themselves at startup and shutdown by default. Users don't care that those processes exist, and it's inconsistent that those background processes announce themselves while others don't. So, reduce those messages from LOG to DEBUG1 level. I was sorely tempted to reduce the "starting logical replication worker for subscription ..." message to DEBUG1 as well, but forebore for now. Those processes might possibly be of direct interest to users, at least until logical replication is a lot better shaken out than it is today. Discussion: <a target="_blank" href="https://postgr.es/m/19479.1489121003@sss.pgh.pa.us">https://postgr.es/m/19479.1489121003@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ec4c8584c45ee784a95e02c40bb643430dee32a">http://git.postgresql.org/pg/commitdiff/6ec4c8584c45ee784a95e02c40bb643430dee32a</a></li>

<li>contrib/amcheck needs RecentGlobalXmin to be PGDLLIMPORT'ified. Per buildfarm. Maybe some of the other xmin variables in snapmgr.h ought to get this too, but for the moment I'm just interested in un-breaking the buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56018bf26eec1a0b4bf20303c98065a8eb1b0c5d">http://git.postgresql.org/pg/commitdiff/56018bf26eec1a0b4bf20303c98065a8eb1b0c5d</a></li>

<li>Improve postmaster's logging of listen socket creation. When one of the kernel calls in the socket()/bind()/listen() sequence fails, include the specific address we're trying to bind to in the log message. This greatly eases debugging of network misconfigurations. Also, after successfully setting up a listen socket, report its address in the log, to ease verification that the expected addresses were bound. There was some debate about whether to print this message at LOG level or only DEBUG1, but the majority of votes were for the former. Discussion: <a target="_blank" href="https://postgr.es/m/9564.1489091245@sss.pgh.pa.us">https://postgr.es/m/9564.1489091245@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9dfa5c9776649f769d537dd0923003b35f128de">http://git.postgresql.org/pg/commitdiff/f9dfa5c9776649f769d537dd0923003b35f128de</a></li>

<li>Add a "subtransaction" command to PL/Tcl. This allows rolling back the effects of some SPI commands without having to fail the entire PL/Tcl function. Victor Wagner, reviewed by Pavel Stehule Discussion: <a target="_blank" href="https://postgr.es/m/20170108205750.2dab04a1@wagner.wagner.home">https://postgr.es/m/20170108205750.2dab04a1@wagner.wagner.home</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b58fd4a9cab21e9d937a4e369bab31b3a5d24710">http://git.postgresql.org/pg/commitdiff/b58fd4a9cab21e9d937a4e369bab31b3a5d24710</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>pg_upgrade: Fix large object COMMENTS, SECURITY LABELS. When performing a pg_upgrade, we copy the files behind pg_largeobject and pg_largeobject_metadata, allowing us to avoid having to dump out and reload the actual data for large objects and their ACLs. Unfortunately, that isn't all of the information which can be associated with large objects. Currently, we also support COMMENTs and SECURITY LABELs with large objects and these were being silently dropped during a pg_upgrade as pg_dump would skip everything having to do with a large object and pg_upgrade only copied the tables mentioned to the new cluster. As the file copies happen after the catalog dump and reload, we can't simply include the COMMENTs and SECURITY LABELs in pg_dump's binary-mode output but we also have to include the actual large object definition as well. With the definition, comments, and security labels in the pg_dump output and the file copies performed by pg_upgrade, all of the data and metadata associated with large objects is able to be successfully pulled forward across a pg_upgrade. In 9.6 and master, we can simply adjust the dump bitmask to indicate which components we don't want. In 9.5 and earlier, we have to put explciit checks in in dumpBlob() and dumpBlobs() to not include the ACL or the data when in binary-upgrade mode. Adjustments made to the privileges regression test to allow another test (large_object.sql) to be added which explicitly leaves a large object with a comment in place to provide coverage of that case with pg_upgrade. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/20170221162655.GE9812@tamriel.snowman.net">https://postgr.es/m/20170221162655.GE9812@tamriel.snowman.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff992c074e308ade204a38eb43a6d19c8403414e">http://git.postgresql.org/pg/commitdiff/ff992c074e308ade204a38eb43a6d19c8403414e</a></li>

<li>pg_dump: Properly handle public schema ACLs with --clean. pg_dump has always handled the public schema in a special way when it comes to the "--clean" option. To wit, we do not drop or recreate the public schema in "normal" mode, but when we are run in "--clean" mode then we do drop and recreate the public schema. When running in "--clean" mode, the public schema is dropped and then recreated and it is recreated with the normal schema-default privileges of "nothing". This is unlike how the public schema starts life, which is to have CREATE and USAGE GRANT'd to the PUBLIC role, and that is what is recorded in pg_init_privs. Due to this, in "--clean" mode, pg_dump would mistakenly only dump out the set of privileges required to go from the initdb-time privileges on the public schema to whatever the current-state privileges are. If the privileges were not changed from initdb time, then no privileges would be dumped out for the public schema, but with the schema being dropped and recreated, the result was that the public schema would have no ACLs on it instead of what it should have, which is the initdb-time privileges. Practically speaking, this meant that pg_dump with --clean mode dumping a database where the ACLs on the public schema were not changed from the default would, upon restore, result in a public schema with *no* privileges GRANT'd, not matching the state of the existing database (where the initdb-time privileges would have been CREATE and USAGE to the PUBLIC role for the public schema). To fix, adjust the query in getNamespaces() to ignore the pg_init_privs entry for the public schema when running in "--clean" mode, meaning that the privileges for the public schema would be dumped, correctly, as if it was going from a newly-created schema to the current state (which is, indeed, what will happen during the restore thanks to the DROP/CREATE). Only the public schema is handled in this special way by pg_dump, no other initdb-time objects are dropped/recreated in --clean mode. Back-patch to 9.6 where the bug was introduced. Discussion: <a target="_blank" href="https://postgr.es/m/3534542.o3cNaKiDID%40techfox">https://postgr.es/m/3534542.o3cNaKiDID%40techfox</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/330b84d8c40864007833e05dc9d849c4bda77240">http://git.postgresql.org/pg/commitdiff/330b84d8c40864007833e05dc9d849c4bda77240</a></li>

<li>psql: Add \gx command. It can often be useful to use expanded mode output (\x) for just a single query. Introduce a \gx which acts exactly like \g except that it will force expanded output mode for that one \gx call. This is simpler than having to use \x as a toggle and also means that the user doesn't have to worry about the current state of the expanded variable, or resetting it later, to ensure a given query is always returned in expanded mode. Primairly Christoph's patch, though I did tweak the documentation and help text a bit, and re-indented the tab completion section. Author: Christoph Berg Reviewed By: Daniel Verite Discussion: <a target="_blank" href="https://postgr.es/m/20170127132737.6skslelaf4txs6iw%40msg.credativ.de">https://postgr.es/m/20170127132737.6skslelaf4txs6iw%40msg.credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2678efd43f17db7dfa04e0ca076ea01275cd9bc">http://git.postgresql.org/pg/commitdiff/b2678efd43f17db7dfa04e0ca076ea01275cd9bc</a></li>

<li>Expose explain's SUMMARY option. This exposes the existing explain summary option to users to allow them to choose if they wish to have the planning time and totalled run time included in the EXPLAIN result. The existing default behavior is retained if SUMMARY is not specified- running explain without analyze will not print the summary lines (just the planning time, currently) while running explain with analyze will include the summary lines (both the planning time and the totalled execution time). Users who wish to see the summary information for plain explain can now use: EXPLAIN (SUMMARY ON) query; Users who do not want to have the summary printed for an analyze run can use: EXPLAIN (ANALYZE ON, SUMMARY OFF) query; With this, we can now also have EXPLAIN ANALYZE queries included in our regression tests by using: EXPLAIN (ANALYZE ON, TIMING OFF, SUMMARY off) query; I went ahead and added an example of this, which will hopefully not make the buildfarm complain. Author: Ashutosh Bapat Discussion: <a target="_blank" href="https://postgr.es/m/CAFjFpReE5z2h98U2Vuia8hcEkpRRwrauRjHmyE44hNv8-xk+XA@mail.gmail.com">https://postgr.es/m/CAFjFpReE5z2h98U2Vuia8hcEkpRRwrauRjHmyE44hNv8-xk+XA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9b1a0dd403ec0931213c66d5f979a3d3e8e7e30">http://git.postgresql.org/pg/commitdiff/f9b1a0dd403ec0931213c66d5f979a3d3e8e7e30</a></li>

<li>Add relkind checks to certain contrib modules. The contrib extensions pageinspect, pg_visibility and pgstattuple only work against regular relations which have storage. They don't work against foreign tables, partitioned (parent) tables, views, et al. Add checks to the user-callable functions to return a useful error message to the user if they mistakenly pass an invalid relation to a function which doesn't accept that kind of relation. In passing, improve some of the existing checks to use ereport() instead of elog(), add a function to consolidate common checks where appropriate, and add some regression tests. Author: Amit Langote, with various changes by me Reviewed by: Michael Paquier and Corey Huinker Discussion: <a target="_blank" href="https://postgr.es/m/ab91fd9d-4751-ee77-c87b-4dd704c1e59c@lab.ntt.co.jp">https://postgr.es/m/ab91fd9d-4751-ee77-c87b-4dd704c1e59c@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c08d82f38ebf763b79bd43ae34b7310ee47aaacd">http://git.postgresql.org/pg/commitdiff/c08d82f38ebf763b79bd43ae34b7310ee47aaacd</a></li>

<li>pgstattuple: Fix typo partitiond -&gt; partitioned. Pointed out by Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90e91e242fe99582b6d2dc18177e79d99c91695d">http://git.postgresql.org/pg/commitdiff/90e91e242fe99582b6d2dc18177e79d99c91695d</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Make simplehash.h grow hashtable in additional cases. Increase the size when either the distance between actual and optimal slot grows too large, or when too many subsequent entries would have to be moved. This addresses reports that the simplehash performed, sometimes considerably, worse than dynahash. The reason turned out to be that insertions into the hashtable where, due to the use of parallel query, in effect done from another hashtable, in hash-value order. If the target hashtable, due to mis-estimation, was sized a lot smaller than the source table(s) that lead to very imbalanced tables; a lot of entries in many close-by buckets from the source tables were inserted into a single, wider, bucket on the target table. As the growth factor was solely computed based on the fillfactor, the performance of the table decreased further and further. b81b5a96f424531b was an attempt to address this problem for hash aggregates (but not for bitmap scans), but it turns out that the current method of mixing hash values often actually leaves neighboring hash-values close to each other, just in different value range. It might be worth revisiting that independently of the performance issues addressed in this patch.. To address that problem resize tables in two additional cases: Firstly when the optimal position for an entry would be far from the actual position, secondly when many entries would have to be moved to make space for the new entry (while satisfying the robin hood property). Due to the additional resizing threshold it seems possible, and testing confirms that so far, that a higher fillfactor doesn't hurt performance and saves a bit of memory. It seems better to increase it now, before a release containing any of this code, rather than wonder in some later release. The various boundaries aren't determined in a particularly scientific manner, they might need some fine-tuning. In all my tests the new code now, even with parallelism, performs at least as good as the old code, in several scenarios significantly better. Reported-By: Dilip Kumar, Robert Haas, Kuntal Ghosh Discussion: <a target="_blank" href="https://postgr.es/m/CAFiTN-vagvuAydKG9VnWcoK=ADAhxmOa4ZTrmNsViBBooTnriQ@mail.gmail.com">https://postgr.es/m/CAFiTN-vagvuAydKG9VnWcoK=ADAhxmOa4ZTrmNsViBBooTnriQ@mail.gmail.com</a> <a target="_blank" href="https://postgr.es/m/CAGz5QC+=fNTYgzMLTBUNeKt6uaWZFXJbkB5+7oWm-n9DwVxcLA@mail.gmail.com">https://postgr.es/m/CAGz5QC+=fNTYgzMLTBUNeKt6uaWZFXJbkB5+7oWm-n9DwVxcLA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4c62a6b623d6eef88218158e9fa3cf974c6c7e5">http://git.postgresql.org/pg/commitdiff/d4c62a6b623d6eef88218158e9fa3cf974c6c7e5</a></li>

<li>Add amcheck extension to contrib. This is the beginning of a collection of SQL-callable functions to verify the integrity of data files. For now it only contains code to verify B-Tree indexes. This adds two SQL-callable functions, validating B-Tree consistency to a varying degree. Check the, extensive, docs for details. The goal is to later extend the coverage of the module to further access methods, possibly including the heap. Once checks for additional access methods exist, we'll likely add some "dispatch" functions that cover multiple access methods. Author: Peter Geoghegan, editorialized by Andres Freund Reviewed-By: Andres Freund, Tomas Vondra, Thomas Munro, Anastasia Lubennikova, Robert Haas, Amit Langote Discussion: CAM3SWZQzLMhMwmBqjzK+pRKXrNUZ4w90wYMUWfkeV8mZ3Debvw@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3717dc149ecf44b8be95350a68605ba7299474fd">http://git.postgresql.org/pg/commitdiff/3717dc149ecf44b8be95350a68605ba7299474fd</a></li>

<li>amcheck: editorialize variable name &amp; comment. No exclusive lock is taken anymore... <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcd8d25d38b5f42ec4ae77a673813c2dc279ccf7">http://git.postgresql.org/pg/commitdiff/fcd8d25d38b5f42ec4ae77a673813c2dc279ccf7</a></li>

<li>Enable 64 bit atomics on ARM64. Previously they were disabled due to performance concerns on 32bit arm, where 64bit atomics are often implemented via kernel traps. Author: Roman Shaposhnik Discussion: <a target="_blank" href="http://postgr.es/m/CA+ULb+uErkFuXUCCXWHYvnV5KnAyjGUzzRcPA-M0cgO+Hm4RSA@mail.gmail.com">http://postgr.es/m/CA+ULb+uErkFuXUCCXWHYvnV5KnAyjGUzzRcPA-M0cgO+Hm4RSA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8f1430ae709c0018a217c77893754f38b3c5b93">http://git.postgresql.org/pg/commitdiff/f8f1430ae709c0018a217c77893754f38b3c5b93</a></li>

<li>Improve expression evaluation test coverage. Upcoming patches are revamping expression evaluation significantly. It therefore seems prudent to try to ensure that the coverage of the existing evaluation code is high. This commit adds coverage for the cases that can reasonably be tested. There's still a bunch of unreachable error messages and such, but otherwise this achieves nearly full regression test coverage (with the exception of the unused GetAttributeByNum/GetAttributeByName). Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20170310194021.ek4bs4bl2khxkmll@alap3.anarazel.de">https://postgr.es/m/20170310194021.ek4bs4bl2khxkmll@alap3.anarazel.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce38949ba23ab311f274aa4196be09d18d30e5a6">http://git.postgresql.org/pg/commitdiff/ce38949ba23ab311f274aa4196be09d18d30e5a6</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Refactor SHA2 functions and move them to src/common/. This way both frontend and backends can use them. The functions are taken from pgcrypto, which now fetches the source files it needs from src/common/. A new interface is designed for the SHA2 functions, which allow linking to either OpenSSL or the in-core stuff taken from KAME as needed. Michael Paquier, reviewed by Robert Haas. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqTGKuTM5jiZriHrNaQeVqp5e_iT3X4BFLWY_HyHxLvySQ%40mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqTGKuTM5jiZriHrNaQeVqp5e_iT3X4BFLWY_HyHxLvySQ%40mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/273c458a2b3a0fb73968020ea5e9e35eb6928967">http://git.postgresql.org/pg/commitdiff/273c458a2b3a0fb73968020ea5e9e35eb6928967</a></li>

<li>Add regression tests for passwords. Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1fff35d872321015a87ca55042384b83f51dedcf">http://git.postgresql.org/pg/commitdiff/1fff35d872321015a87ca55042384b83f51dedcf</a></li>

<li>Fix comments in SCRAM-SHA-256 patch. Amit Kapila. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55acfcbffd7d11db8c10cd94ba44bfe5974894e0">http://git.postgresql.org/pg/commitdiff/55acfcbffd7d11db8c10cd94ba44bfe5974894e0</a></li>

<li>Support SCRAM-SHA-256 authentication (RFC 5802 and 7677). This introduces a new generic SASL authentication method, similar to the GSS and SSPI methods. The server first tells the client which SASL authentication mechanism to use, and then the mechanism-specific SASL messages are exchanged in AuthenticationSASLcontinue and PasswordMessage messages. Only SCRAM-SHA-256 is supported at the moment, but this allows adding more SASL mechanisms in the future, without changing the overall protocol. Support for channel binding, aka SCRAM-SHA-256-PLUS is left for later. The SASLPrep algorithm, for pre-processing the password, is not yet implemented. That could cause trouble, if you use a password with non-ASCII characters, and a client library that does implement SASLprep. That will hopefully be added later. Authorization identities, as specified in the SCRAM-SHA-256 specification, are ignored. SET SESSION AUTHORIZATION provides more or less the same functionality, anyway. If a user doesn't exist, perform a "mock" authentication, by constructing an authentic-looking challenge on the fly. The challenge is derived from a new system-wide random value, "mock authentication nonce", which is created at initdb, and stored in the control file. We go through these motions, in order to not give away the information on whether the user exists, to unauthenticated users. Bumps PG_CONTROL_VERSION, because of the new field in control file. Patch by Michael Paquier and Heikki Linnakangas, reviewed at different stages by Robert Haas, Stephen Frost, David Steele, Aleksander Alekseev, and many others. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqRbR3GmFYdedCAhzukfKrgBLTLtMvENOmPrVWREsZkF8g%40mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqRbR3GmFYdedCAhzukfKrgBLTLtMvENOmPrVWREsZkF8g%40mail.gmail.com</a> Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqSMXU35g%3DW9X74HVeQp0uvgJxvYOuA4A-A3M%2B0wfEBv-w%40mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqSMXU35g%3DW9X74HVeQp0uvgJxvYOuA4A-A3M%2B0wfEBv-w%40mail.gmail.com</a> Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/55192AFE.6080106@iki.fi">https://www.postgresql.org/message-id/55192AFE.6080106@iki.fi</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/818fd4a67d610991757b610755e3065fb99d80a5">http://git.postgresql.org/pg/commitdiff/818fd4a67d610991757b610755e3065fb99d80a5</a></li>

<li>A collection of small fixes for the SCRAM patch. * Add required #includes for htonl. Per buildfarm members pademelon/gaur. * Remove unnecessary "#include &lt;utils/memutils&gt;". * Fix checking for empty string in pg_SASL_init. (Reported by Peter Eisentraut and his compiler) * Move code in pg_SASL_init to match the recent changes (commit ba005f193d) to pg_fe_sendauth() function, where it's copied from. * Return value of malloc() was not checked for NULL in scram_SaltedPassword(). Fix by avoiding the malloc(). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95c1dbcdfffcc3a77e693c3c2759e26a01f465c8">http://git.postgresql.org/pg/commitdiff/95c1dbcdfffcc3a77e693c3c2759e26a01f465c8</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix grammar. Reported by Jeremy Finzel <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7fa016d68b51bc385b75f9d5cffef79e5671981">http://git.postgresql.org/pg/commitdiff/b7fa016d68b51bc385b75f9d5cffef79e5671981</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix connection leak in DROP SUBSCRIPTION command, take 2. Commit 898a792eb8283e31efc0b6fcbc03bbcd5f7df667 fixed the connection leak issue, but it was an unreliable way of bugfix. This bugfix was assuming that walrcv_command() subroutine cannot throw an error, but it's untenable assumption. For example, if it will be changed so that an error is thrown, connection leak issue will happen again. This patch ensures that the connection is closed even when walrcv_command() subroutine throws an error. Patch by me, reviewed by Petr Jelinek and Michael Paquier Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/2058.1487704345@sss.pgh.pa.us">https://www.postgresql.org/message-id/2058.1487704345@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77d21970ae19418f321e6a76ddf1a57ae999c77a">http://git.postgresql.org/pg/commitdiff/77d21970ae19418f321e6a76ddf1a57ae999c77a</a></li>

<li>Prevent logical rep workers with removed subscriptions from starting. Any logical rep workers must have their subscription entries in pg_subscription. To ensure this, we need to prevent the launcher from starting new worker corresponding to the subscription that DROP SUBSCRIPTION command is removing. To implement this, previously LogicalRepLauncherLock was introduced and held until the end of transaction running DROP SUBSCRIPTION. But using LWLock for that purpose was not valid. Instead, this commit changes DROP SUBSCRIPTION so that it takes AccessExclusiveLock on pg_subscription, in order to ensure that the launcher cannot see any subscriptions being removed. Also this commit gets rid of LogicalRepLauncherLock. Patch by me, reviewed by Petr Jelinek Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAHGQGwHPi8ky-yANFfe0sgmhKtsYcQLTnKx07bW9S7-Rn1746w@mail.gmail.com">https://www.postgresql.org/message-id/CAHGQGwHPi8ky-yANFfe0sgmhKtsYcQLTnKx07bW9S7-Rn1746w@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4eafdcc27608dfb8a3afa3155d6ae07f66179782">http://git.postgresql.org/pg/commitdiff/4eafdcc27608dfb8a3afa3155d6ae07f66179782</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Support XMLTABLE query expression. XMLTABLE is defined by the SQL/XML standard as a feature that allows turning XML-formatted data into relational form, so that it can be used as a &lt;table primary&gt; in the FROM clause of a query. This new construct provides significant simplicity and performance benefit for XML data processing; what in a client-side custom implementation was reported to take 20 minutes can be executed in 400ms using XMLTABLE. (The same functionality was said to take 10 seconds using nested PostgreSQL XPath function calls, and 5 seconds using XMLReader under PL/Python). The implemented syntax deviates slightly from what the standard requires. First, the standard indicates that the PASSING clause is optional and that multiple XML input documents may be given to it; we make it mandatory and accept a single document only. Second, we don't currently support a default namespace to be specified. This implementation relies on a new executor node based on a hardcoded method table. (Because the grammar is fixed, there is no extensibility in the current approach; further constructs can be implemented on top of this such as JSON_TABLE, but they require changes to core code.) Author: Pavel Stehule, &Atilde;lvaro Herrera Extensively reviewed by: Craig Ringer Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRAgfzMD-LoSmnMGybD0WsEznLHWap8DO79+-GTRAPR4qA@mail.gmail.com">https://postgr.es/m/CAFj8pRAgfzMD-LoSmnMGybD0WsEznLHWap8DO79+-GTRAPR4qA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcec6caafa2346b6c9d3ad5065e417733bd63cd9">http://git.postgresql.org/pg/commitdiff/fcec6caafa2346b6c9d3ad5065e417733bd63cd9</a></li>

<li>Fix XMLTABLE on older libxml2. libxml2 older than 2.9.1 does not have xmlXPathSetContextNode (released in 2013, so reasonable platforms have trouble). That function is fairly trivial, so I have inlined it in the one added caller. This passes tests on my machine; let's see what the buildfarm thinks about it. Per joint complaint from Tom Lane and buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9f66f92533b2bfd7abf289219152091b7697e87">http://git.postgresql.org/pg/commitdiff/a9f66f92533b2bfd7abf289219152091b7697e87</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Fix a potential double-free in ecpg. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1ca82d0a226f22438a1cf4ba0ed3460e6db692b">http://git.postgresql.org/pg/commitdiff/d1ca82d0a226f22438a1cf4ba0ed3460e6db692b</a></li>

</ul>

<p>Joe Conway pushed:</p>

<ul>

<li>Fix ancient connection leak in dblink. When using unnamed connections with dblink, every time a new connection is made, the old one is leaked. Fix that. This has been an issue probably since dblink was first committed. Someone complained almost ten years ago, but apparently I decided not to pursue it at the time, and neither did anyone else, so it slipped between the cracks. Now that someone else has complained, fix in all supported branches. Discussion: (orig) +<a target="_blank" href="https://postgr.es/m/flat/F680AB59-6D6F-4026-9599-1BE28880273D%40decibel.org#F680AB59-6D6F-4026-9599-1BE28880273D@decibel.org">https://postgr.es/m/flat/F680AB59-6D6F-4026-9599-1BE28880273D%40decibel.org#F680AB59-6D6F-4026-9599-1BE28880273D@decibel.org</a> Discussion: (new) <a target="_blank" href="https://postgr.es/m/flat/0A3221C70F24FB45833433255569204D1F6ADF8C@G01JPEXMBYT05">https://postgr.es/m/flat/0A3221C70F24FB45833433255569204D1F6ADF8C@G01JPEXMBYT05</a> Reported by: Jim Nasby and Takayuki Tsunakawa <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd1e23e93bc12b7d084dc2acf9f80e9ea1f1e6de">http://git.postgresql.org/pg/commitdiff/cd1e23e93bc12b7d084dc2acf9f80e9ea1f1e6de</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Jim Nasby sent in another revision of a patch to add SPI_execute_callback() and a callback-based DestReceiver, and modify plpython to use same.</p>

<p>Etsuro Fujita, Ashutosh Bapat, and David Rowley traded patches to fix an issue where foreign Join pushdowns were not working properly for outer joins.</p>

<p>Amit Langote sent in two more revisions of a patch to avoid creating scan nodes for partitioned tables and not allocate storage for partitioned tables.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to use a radix tree for character conversion.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to fix some infelicities between logical replication and database encoding.</p>

<p>Masahiko Sawada sent in a patch to update the documentation to reflect the fact that oldestxmin is now shown in VACUUM.</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in another revision of a patch to fix many perlcritic exceptions.</p>

<p>Kyotaro HORIGUCHI sent in a patch to add a WAL relief vent for replication slots.</p>

<p>Takeshi Ideriha sent in another revision of a patch to add DECLARE STATEMENT to ECPG.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to logical replication apply to run with sync commit off by default.</p>

<p>Robert Haas sent in a patch to fix the computation of parallel workers to distinguish "can't have a heap page" from "found zero heap pages."</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to remove NamedLWLockTrancheArray.</p>

<p>Masahiko Sawada sent in another revision of a patch to add a GUC for cleanup indexes threshold.</p>

<p>Thomas Munro sent in two more revisions of a patch to add a [parallel [shared]] hash.</p>

<p>Aleksander Alekseev sent in three more revisions of a patch to make declarative partitioning work faster when large numbers of partitions are present.</p>

<p>Masahiko Sawada sent in another revision of a patch to report the number of skipped frozen pages by manual VACUUM.</p>

<p>David Steele sent in another revision of a patch to add a configurable file mode mask.</p>

<p>Amos Bird sent in a patch to make psql show indexes with type info.</p>

<p>Andreas Karlsson sent in a patch to rename the default log directory from pg_log to log.</p>

<p>Petr Jel&Atilde;&shy;nek and Peter Eisentraut traded patches to allow enable an existing data copy for logical replication.</p>

<p>Andres Freund sent in another revision of a patch to speed up expression processing.</p>

<p>Jan Mich&Atilde;&iexcl;lek sent in another revision of a patch to allow formatting tables in psql as markdown, mediawiki, and rst.</p>

<p>Masahiko Sawada sent in another revision of a patch to allow transactions across foreign tables.</p>

<p>Masahiko Sawada sent in a patch to document the fact that PREPARE TRANSACTION is now part of ECPG.</p>

<p>Simon Riggs and Dean Rasheed traded patches to speed up replay of AccessExclusiveLock.</p>

<p>Tomas Vondra sent in another revision of a patch to implement two slab-like memory allocators.</p>

<p>David Rowley sent in a patch to fix some warnings in the slab-like memory allocators patch.</p>

<p>Haribabu Kommi sent in another revision of a patch to refactor handling of database attributes between pg_dump and pg_dumpall.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement a pg_stat_sql view.</p>

<p>Pavan Deolasee sent in another revision of a patch to skip all-visible pages during second HeapScan of CREATE INDEX CONCURRENTLY.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to implement SASLprep.</p>

<p>Ivan Kartyshov sent in two more revisions of a patch to make async slave to wait for lsn to be replayed.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two revisions of a patch to add clause PASSWORD (val USING protocol) to CREATE/ALTER ROLE.</p>

<p>Rafia Sabih and Robert Haas traded patches to enable parallelism for queries coming from SQL or other PL functions.</p>

<p>Daniel V&Atilde;&copy;rit&Atilde;&copy; and Vaishnavi Prabakaran traded patches to add batch/pipelining support for libpq.</p>

<p>Takayuki Tsunakawa sent in a patch to refactor strinfo in dblink.</p>

<p>Daniel V&Atilde;&copy;rit&Atilde;&copy; and Vaishnavi Prabakaran traded patches to add batch/pipelining support for libpq.</p>

<p>Takayuki Tsunakawa sent in a patch to refactor strinfo in dblink.</p>

<p>Amit Khandekar sent in two more revisions of a patch to implement parallel append.</p>

<p>Kevin Grittner sent in two more revisions of a patch to add transition table support for, among other things, statement triggers and materialized view refreshes.</p>

<p>Kuntal Ghosh sent in another revision of a patch to add WAL consistency check support for hash indexes.</p>

<p>Andrew Gierth sent in two more revisions of a patch to add hash support for grouping sets.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to support huge pages on Windows.</p>

<p>Craig Ringer sent in a patch to fix an off-by-one error in logical slot resource retention.</p>

<p>Rushabh Lathia sent in another revision of a patch to add wait events for disk I/O.</p>

<p>Amit Langote sent in a patch to use ALTER FOREIGN TABLE with foreign table in tests.</p>

<p>&Atilde;lvaro Herrera sent in another revision of a patch to add WARM.</p>

<p>Victor Wagner sent in three more revisions of a patch to add explicit subtransactions for PL/Tcl.</p>

<p>Peter Eisentraut sent in another revision of a patch to cast result of copyObject() to correct type.</p>

<p>Peter Eisentraut sent in another revision of a patch to implement ICU integration.</p>

<p>Amit Langote sent in another revision of a patch to fix an infelicity between declarative partitioning and ON CONFLICT.</p>

<p>Amit Langote sent in another revision of a patch to improve the documents on declarative partitioning.</p>

<p>Amit Langote sent in a patch to fix a bug in get_partition_for_tuple.</p>

<p>Peter Geoghegan sent in a patch to fix the amcheck build on Windows.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to fix remote position tracking in logical replication.</p>

<p>Kuntal Ghosh sent in another revision of a patch to expose wait events for non-backends.</p>

<p>Beena Emerson sent in another revision of a patch to allow increasing the default WAL segment size.</p>

<p>Vinayak Pokale sent in another revision of a patch to add an ANALYZE command progress checker.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two more revisions of a patch to fix unlogged flushes.</p>

<p>Surafel Temesgen and Pavel St&Auml;&rsaquo;hule traded patches to implement CORRESPONDING.</p>

<p>Tom Lane sent in two revisions of a patch to upgrade the postmaster's log messages about bind/listen errors.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to change references of password encryption to hashing.</p>

<p>Nikita Glukhov sent in another revision of a patch to fix a bug in SP-GiST box_ops.</p>

<p>Ashutosh Bapat sent in another revision of a patch to implement partition-wise join for join between (declaratively) partitioned tables.</p>

<p>Dmitry Dolgov sent in another revision of a patch to add FTS support for JSON[B].</p>

<p>Thomas Munro sent in another revision of a patch to fix SERIALIZABLE isolation for parallel query.</p>

<p>Nikhil Sontakke sent in another revision of a patch to speed up two-phase transactions.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in a patch to add VERBOSE_SORT_COLUMNS and VERBOSE_SORT_DIRECTION to psql.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in a patch to add default namespaces for XPath expressions.</p>

<p>Tom Lane and Andres Freund traded patches to speed up running all the tests.</p>

<p>Tom Lane sent in another revision of a patch to add \if and friends to psql.</p>

<p>Nikolay Shaplov sent in another revision of a patch to move all am-related reloption code into src/backend/access/[am-name] and get rid of relopt_kind for custom AM.</p>

<p>Stephen Frost sent in two more revisions of a patch to add macaddr 64 bit (EUI-64) datatype support.</p>

<p>Peter Geoghegan sent in another revision of a patch to add parallel tuplesort (for parallel B-Tree index creation).</p>