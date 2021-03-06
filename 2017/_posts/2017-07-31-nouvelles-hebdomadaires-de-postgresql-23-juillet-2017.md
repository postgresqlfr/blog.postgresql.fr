---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 juillet 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/07/31/Nouvelles-hebdomadaires-de-PostgreSQL-23-juillet-2017"
---


<p>Le <em>PGDay Australia 2017</em> se tiendra &agrave; Melbourne le 17 novembre. L'appel &agrave; conf&eacute;renciers court jusqu'au 20 ao&ucirc;t&nbsp;: <a target="_blank" href="https://goo.gl/5d9EbT">https://goo.gl/5d9EbT</a> <a target="_blank" href="http://2017.pgday.com.au/">http://2017.pgday.com.au/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>psqlODBC 09.06.0400&nbsp;: <a target="_blank" href="https://odbc.postgresql.org/docs/release.html">https://odbc.postgresql.org/docs/release.html</a></li>

<li>barman 2.2, un gestionnaire de sauvegarde et restauration pour PostgreSQL&nbsp;: <a target="_blank" href="https://www.2ndquadrant.com/en/about/news/announcing-release-barman-2-2/">https://www.2ndquadrant.com/en/about/news/announcing-release-barman-2-2/</a></li>

<li>psycopg2 2.7.2, un connecteur python pour PostgreSQL&nbsp;: <a target="_blank" href="http://initd.org/psycopg/articles/2017/07/22/psycopg-272-released/">http://initd.org/psycopg/articles/2017/07/22/psycopg-272-released/</a></li>

<li>pg_chameleon 1.5, un outil pour r&eacute;pliquer de MySQL vers PostgreSQL&nbsp;: <a target="_blank" href="https://pypi.python.org/pypi/pg_chameleon">https://pypi.python.org/pypi/pg_chameleon</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juillet</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-07/">http://archives.postgresql.org/pgsql-jobs/2017-07/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li><em>PGConf Local&nbsp;: Seattle</em> se tiendra les 11 & 12 ao&ucirc;t 2017&nbsp;: <a target="_blank" href="https://www.pgconf.us/#Seattle2017">https://www.pgconf.us/#Seattle2017</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>PGBR2017 (La PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne). L'appel &agrave; conf&eacute;renciers porte jusqu'au lundi 7 ao&ucirc;t&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170723204617.GA22383@fetter.org">http://www.postgresql.org/message-id/20170723204617.GA22383@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Noah Misch pushed:</p>

<ul>

<li>MSVC: Don't link libpgcommon into pgcrypto. Doing so was useful in 273c458a2b3a0fb73968020ea5e9e35eb6928967 but became obsolete when 818fd4a67d610991757b610755e3065fb99d80a5 caused postgres.exe to provide the relevant symbols. No other loadable module links to libpgcommon directly. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2f7f45a64badec18ce75e44ca35c078f08e2651e">https://git.postgresql.org/pg/commitdiff/2f7f45a64badec18ce75e44ca35c078f08e2651e</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>hash: Fix write-ahead logging bugs related to init forks. One, logging for CREATE INDEX was oblivious to the fact that when an unlogged table is created, *only* operations on the init fork should be logged. Two, init fork buffers need to be flushed after they are written; otherwise, a filesystem-level copy following recovery may do the wrong thing. (There may be a better fix for this issue than the one used here, but this is transposed from the similar logic already present in XLogReadBufferForRedoExtended, and a broader refactoring after beta2 seems inadvisable.) Amit Kapila, reviewed by Ashutosh Sharma, Kyotaro Horiguchi, and Michael Paquier Discussion: <a target="_blank" href="http://postgr.es/m/CAA4eK1JpcMsEtOL_J7WODumeEfyrPi7FPYHeVdS7fyyrCrgp4w@mail.gmail.com">http://postgr.es/m/CAA4eK1JpcMsEtOL_J7WODumeEfyrPi7FPYHeVdS7fyyrCrgp4w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/09c2e7cd2ff0b884625c37ce8249832820c58710">https://git.postgresql.org/pg/commitdiff/09c2e7cd2ff0b884625c37ce8249832820c58710</a></li>

<li>Use a real RT index when setting up partition tuple routing. Before, we always used a dummy value of 1, but that's not right when the partitioned table being modified is inside of a WITH clause rather than part of the main query. Amit Langote, reported and reviewd by Etsuro Fujita, with a comment change by me. Discussion: <a target="_blank" href="http://postgr.es/m/ee12f648-8907-77b5-afc0-2980bcb0aa37@lab.ntt.co.jp">http://postgr.es/m/ee12f648-8907-77b5-afc0-2980bcb0aa37@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f81a91db4d1c2032632aa5df9fc14be24f5fe5ec">https://git.postgresql.org/pg/commitdiff/f81a91db4d1c2032632aa5df9fc14be24f5fe5ec</a></li>

<li>Reverse-convert row types in ExecWithCheckOptions. Just as we already do in ExecConstraints, and for the same reason: to improve the quality of error messages. Etsuro Fujita, reviewed by Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/56e0baa8-e458-2bbb-7936-367f7d832e43@lab.ntt.co.jp">http://postgr.es/m/56e0baa8-e458-2bbb-7936-367f7d832e43@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c85ec643ff2586e2d144374f51f93bfa215088a2">https://git.postgresql.org/pg/commitdiff/c85ec643ff2586e2d144374f51f93bfa215088a2</a></li>

<li>pg_rewind: Fix busted sanity check. As written, the code would only fail the sanity check if none of the columns returned by the server were of the expected type, but we want it to fail if even one column is not of the expected type. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYuY5zW7JEs+1hSS1D=V5K8h1SQuESrq=bMNeo0B71Sfw@mail.gmail.com">http://postgr.es/m/CA+TgmoYuY5zW7JEs+1hSS1D=V5K8h1SQuESrq=bMNeo0B71Sfw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/063ff9210c54928a2d19f9e826486621809e1b82">https://git.postgresql.org/pg/commitdiff/063ff9210c54928a2d19f9e826486621809e1b82</a></li>

<li>pg_rewind: Fix some problems when copying files &gt;2GB. When incrementally updating a file larger than 2GB, the old code could either fail outright (if the client asked the server for bytes beyond the 2GB boundary) or fail to copy all the blocks that had actually been modified (if the server reported a file size to the client in excess of 2GB), resulting in data corruption. Generally, such files won't occur anyway, but they might if using a non-default segment size or if there the directory contains stray files unrelated to PostgreSQL. Fix by a more prudent choice of data types. Even with these improvements, this code still uses a mix of different types (off_t, size_t, uint64, int64) to represent file sizes and offsets, not all of which necessarily have the same width or signedness, so further cleanup might be in order here. However, at least now they all have the potential to be 64 bits wide on 64-bit platforms. Kuntal Ghosh and Michael Paquier, with a tweak by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAGz5QC+8gbkz=Brp0TgoKNqHWTzonbPtPex80U0O6Uh_bevbaA@mail.gmail.com">http://postgr.es/m/CAGz5QC+8gbkz=Brp0TgoKNqHWTzonbPtPex80U0O6Uh_bevbaA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a46fe6e8be02421ea7e80c5a6d5e388417904fd4">https://git.postgresql.org/pg/commitdiff/a46fe6e8be02421ea7e80c5a6d5e388417904fd4</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Use usleep instead of select for timeouts in PostgresNode.pm. select() for pure timeouts is not portable, and in particular doesn't work on Windows. Discussion: <a target="_blank" href="https://postgr.es/m/186943e0-3405-978d-b19d-9d3335427c86@2ndQuadrant.com">https://postgr.es/m/186943e0-3405-978d-b19d-9d3335427c86@2ndQuadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6c6970a280a50434c28ccd461ba864798f5d2a04">https://git.postgresql.org/pg/commitdiff/6c6970a280a50434c28ccd461ba864798f5d2a04</a></li>

<li>Improve legibility of numeric literal. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cde11fa3c003407fc6c4ddc427d57e588ea17d1c">https://git.postgresql.org/pg/commitdiff/cde11fa3c003407fc6c4ddc427d57e588ea17d1c</a> Merge large_object.sql test into largeobject.source. It seems pretty confusing to have tests named both largeobject and large_object. The latter is of very recent vintage (commit ff992c074), so get rid of it in favor of merging into the former. Also, enable the LO comment test that was added by commit 70ad7ed4e, since the later commit added the then-missing pg_upgrade functionality. The large_object.sql test case is almost completely redundant with that, but not quite: it seems like creating a user-defined LO with an OID in the system range might be an interesting case for pg_upgrade, so let's keep it. Like the earlier patch, back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/18665.1500306372@sss.pgh.pa.us">https://postgr.es/m/18665.1500306372@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a570feaf927b73c5036fa47ea949ca51f2687950">https://git.postgresql.org/pg/commitdiff/a570feaf927b73c5036fa47ea949ca51f2687950</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Merge large_object.sql test into largeobject.source. It seems pretty confusing to have tests named both largeobject and large_object. The latter is of very recent vintage (commit ff992c074), so get rid of it in favor of merging into the former. Also, enable the LO comment test that was added by commit 70ad7ed4e, since the later commit added the then-missing pg_upgrade functionality. The large_object.sql test case is almost completely redundant with that, but not quite: it seems like creating a user-defined LO with an OID in the system range might be an interesting case for pg_upgrade, so let's keep it. Like the earlier patch, back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/18665.1500306372@sss.pgh.pa.us">https://postgr.es/m/18665.1500306372@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a570feaf927b73c5036fa47ea949ca51f2687950">https://git.postgresql.org/pg/commitdiff/a570feaf927b73c5036fa47ea949ca51f2687950</a></li>

<li>Doc: explain dollar quoting in the intro part of the pl/pgsql chapter. We're throwing people into the guts of the syntax with not much context; let's back up one step and point out that this goes inside a literal in a CREATE FUNCTION command. Per suggestion from Kurt Kartaltepe. Discussion: <a target="_blank" href="https://postgr.es/m/CACawnnyWAmH+au8nfZhLiFfWKjXy4d0kY+eZWfcxPRnjVfaa_Q@mail.gmail.com">https://postgr.es/m/CACawnnyWAmH+au8nfZhLiFfWKjXy4d0kY+eZWfcxPRnjVfaa_Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/533463307bf67e1bb7acc345ba7ea535c6aebb78">https://git.postgresql.org/pg/commitdiff/533463307bf67e1bb7acc345ba7ea535c6aebb78</a></li>

<li>Doc: fix thinko in v10 release notes. s/log_destination/log_directory/, per Jov in bug #14749. Report: <a target="_blank" href="https://postgr.es/m/20170718082444.9229.99690@wrigleys.postgresql.org">https://postgr.es/m/20170718082444.9229.99690@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fb9bd4b0469e06d96c8cfff86d231401b0916736">https://git.postgresql.org/pg/commitdiff/fb9bd4b0469e06d96c8cfff86d231401b0916736</a></li>

<li>Fix serious performance problems in json(b) to_tsvector(). In an off-list followup to bug #14745, Bob Jones complained that to_tsvector() on a 2MB jsonb value took an unreasonable amount of time and space --- enough to draw the wrath of the OOM killer on his machine. On my machine, his example proved to require upwards of 18 seconds and 4GB, which seemed pretty bogus considering that to_tsvector() on the same data treated as text took just a couple hundred msec and 10 or so MB. On investigation, the problem is that the implementation scans each string element of the json(b) and converts it to tsvector separately, then applies tsvector_concat() to join those separate tsvectors. The unreasonable memory usage came from leaking every single one of the transient tsvectors --- but even without that mistake, this is an O(N^2) or worse algorithm, because tsvector_concat() has to repeatedly process the words coming from earlier elements. We can fix it by accumulating all the lexeme data and applying make_tsvector() just once. As a side benefit, that also makes the desired adjustment of lexeme positions far cheaper, because we can just tweak the running "pos" counter between JSON elements. In passing, try to make the explanation of that tweak more intelligible. (I didn't think that a barely-readable comment far removed from the actual code was helpful.) And do some minor other code beautification. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b4c6d31c0be0f5c42a75d50afcf13bdd392db4a1">https://git.postgresql.org/pg/commitdiff/b4c6d31c0be0f5c42a75d50afcf13bdd392db4a1</a></li>

<li>Improve make_tsvector() to handle empty input, and simplify its callers. It seemed a bit silly that each caller of make_tsvector() was laboriously special-casing the situation where no lexemes were found, when it would be easy and much more bullet-proof to make make_tsvector() handle that. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/04a2c7f412d01da8100de79b13df4fd39e15ce25">https://git.postgresql.org/pg/commitdiff/04a2c7f412d01da8100de79b13df4fd39e15ce25</a></li>

<li>Doc: add missing note about permissions needed to change log_lock_waits. log_lock_waits is PGC_SUSET, but config.sgml lacked the standard boilerplate sentence noting that. Report: <a target="_blank" href="https://postgr.es/m/20170719100838.19352.16320@wrigleys.postgresql.org">https://postgr.es/m/20170719100838.19352.16320@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5752dcd45bd8b9a9115d4be12b9a391464884a39">https://git.postgresql.org/pg/commitdiff/5752dcd45bd8b9a9115d4be12b9a391464884a39</a></li>

<li>Add static assertions about pg_control fitting into one disk sector. When pg_control was first designed, sizeof(ControlFileData) was small enough that a comment seemed like plenty to document the assumption that it'd fit into one disk sector. Now it's nearly 300 bytes, raising the possibility that somebody would carelessly add enough stuff to create a problem. Let's add a StaticAssertStmt() to ensure that the situation doesn't pass unnoticed if it ever occurs. While at it, rename PG_CONTROL_SIZE to PG_CONTROL_FILE_SIZE to make it clearer what that symbol means, and convert the existing runtime comparisons of sizeof(ControlFileData) vs. PG_CONTROL_FILE_SIZE to be static asserts --- we didn't have that technology when this code was first written. Discussion: <a target="_blank" href="https://postgr.es/m/9192.1500490591@sss.pgh.pa.us">https://postgr.es/m/9192.1500490591@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3cb29c42f990522131535eea75c691fb23191685">https://git.postgresql.org/pg/commitdiff/3cb29c42f990522131535eea75c691fb23191685</a></li>

<li>Fix dumping of outer joins with empty qual lists. Normally, a JoinExpr would have empty "quals" only if it came from CROSS JOIN syntax. However, it's possible to get to this state by specifying NATURAL JOIN between two tables with no common column names, and there might be other ways too. The code previously printed no ON clause if "quals" was empty; that's right for CROSS JOIN but syntactically invalid if it's some type of outer join. Fix by printing ON TRUE in that case. This got broken by commit 2ffa740be, which stopped using NATURAL JOIN syntax in ruleutils output due to its brittleness in the face of column renamings. Back-patch to 9.3 where that commit appeared. Per report from Tushar Ahuja. Discussion: <a target="_blank" href="https://postgr.es/m/98b283cd-6dda-5d3f-f8ac-87db8c76a3da@enterprisedb.com">https://postgr.es/m/98b283cd-6dda-5d3f-f8ac-87db8c76a3da@enterprisedb.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/eb145fdfea91ee5dc6d7aad0309527f810f7c90a">https://git.postgresql.org/pg/commitdiff/eb145fdfea91ee5dc6d7aad0309527f810f7c90a</a></li>

<li>Doc: clarify description of degenerate NATURAL joins. Claiming that NATURAL JOIN is equivalent to CROSS JOIN when there are no common column names is only strictly correct if it's an inner join; you can't say e.g. CROSS LEFT JOIN. Better to explain it as meaning JOIN ON TRUE, instead. Per a suggestion from David Johnston. Discussion: <a target="_blank" href="https://postgr.es/m/CAKFQuwb+mYszQhDS9f_dqRrk1=Pe-S6D=XMkAXcDf4ykKPmgKQ@mail.gmail.com">https://postgr.es/m/CAKFQuwb+mYszQhDS9f_dqRrk1=Pe-S6D=XMkAXcDf4ykKPmgKQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ed3dc224e5aabd3cb0a5c348107f973fe5b10b0d">https://git.postgresql.org/pg/commitdiff/ed3dc224e5aabd3cb0a5c348107f973fe5b10b0d</a></li>

<li>In v10 release notes, call out sequence changes as a compatibility item. The previous description didn't make it clear that this change potentially breaks applications, partly because the entry wasn't even in the compatibility-hazard section. Move and clarify. Discussion: <a target="_blank" href="https://postgr.es/m/603f3f0a-f89d-ae8b-1da9-a92fac16086d@enterprisedb.com">https://postgr.es/m/603f3f0a-f89d-ae8b-1da9-a92fac16086d@enterprisedb.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/866f4a7c210857aa342bf901558d170325094dde">https://git.postgresql.org/pg/commitdiff/866f4a7c210857aa342bf901558d170325094dde</a></li>

<li>Re-establish postgres_fdw connections after server or user mapping changes. Previously, postgres_fdw would keep on using an existing connection even if the user did ALTER SERVER or ALTER USER MAPPING commands that should affect connection parameters. Teach it to watch for catcache invals on these catalogs and re-establish connections when the relevant catalog entries change. Per bug #14738 from Michal Lis. In passing, clean up some rather crufty decisions in commit ae9bfc5d6 about where fields of ConnCacheEntry should be reset. We now reset all the fields whenever we open a new connection. Kyotaro Horiguchi, reviewed by Ashutosh Bapat and myself. Back-patch to 9.3 where postgres_fdw appeared. Discussion: <a target="_blank" href="https://postgr.es/m/20170710113917.7727.10247@wrigleys.postgresql.org">https://postgr.es/m/20170710113917.7727.10247@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8bf58c0d9bd336868e2d6489f11dc094cad9ad91">https://git.postgresql.org/pg/commitdiff/8bf58c0d9bd336868e2d6489f11dc094cad9ad91</a></li>

<li>Stabilize postgres_fdw regression tests. The new test cases added in commit 8bf58c0d9 turn out to have output that can vary depending on the lc_messages setting prevailing on the test server. Hide the remote end's error messages to ensure stable output. This isn't a terribly desirable solution; we'd rather know that the connection failed for the expected reason and not some other one. But there seems little choice for the moment. Per buildfarm. Discussion: <a target="_blank" href="https://postgr.es/m/18419.1500658570@sss.pgh.pa.us">https://postgr.es/m/18419.1500658570@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/88f48b57fd33289c26c78ecb28c5f2a1c7a4ac6c">https://git.postgresql.org/pg/commitdiff/88f48b57fd33289c26c78ecb28c5f2a1c7a4ac6c</a></li>

<li>Doc: update versioning information in libpq.sgml. The descriptions of PQserverVersion and PQlibVersion hadn't been updated for the new two-part version-numbering approach. Fix that. In passing, remove some trailing whitespace elsewhere in the file. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e22efaabf16e3972b91893d89597407d142fb309">https://git.postgresql.org/pg/commitdiff/e22efaabf16e3972b91893d89597407d142fb309</a></li>

<li>Update expected results for collate.linux.utf8 regression test. I believe this changed as a consequence of commit 54baa4813: trying to clone the "C" collation now produces a true clone with collencoding -1, hence the error message if it's duplicate no longer specifies an encoding. Per buildfarm member crake, which apparently hadn't been running this test for the last few weeks. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/991c8b04fc5d61a308bb00ea34a7ff710051c53f">https://git.postgresql.org/pg/commitdiff/991c8b04fc5d61a308bb00ea34a7ff710051c53f</a></li>

<li>Improve comments about partitioned hash table freelists. While I couldn't find any live bugs in commit 44ca4022f, the comments seemed pretty far from adequate; in particular it was not made plain that "borrowing" entries from other freelists is critical for correctness. Try to improve the commentary. A couple of very minor code style tweaks, as well. Discussion: <a target="_blank" href="https://postgr.es/m/10593.1500670709@sss.pgh.pa.us">https://postgr.es/m/10593.1500670709@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ab2324fd468c4bc6d8b012552550ed951d97339a">https://git.postgresql.org/pg/commitdiff/ab2324fd468c4bc6d8b012552550ed951d97339a</a></li>

<li>Fix pg_dump's handling of event triggers. pg_dump with the --clean option failed to emit DROP EVENT TRIGGER commands for event triggers. In a closely related oversight, it also did not emit ALTER OWNER commands for event triggers. Since only superusers can create event triggers, the latter oversight is of little practical consequence ... but if we're going to record an owner for event triggers, then surely pg_dump should preserve it. Per complaint from Greg Atkins. Back-patch to 9.3 where event triggers were introduced. Discussion: <a target="_blank" href="https://postgr.es/m/20170722191142.yi4e7tzcg3iacclg@gmail.com">https://postgr.es/m/20170722191142.yi4e7tzcg3iacclg@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/93f039b4944fdf806f029ed46cf192bc9021d8e7">https://git.postgresql.org/pg/commitdiff/93f039b4944fdf806f029ed46cf192bc9021d8e7</a></li>

</ul>

<p>Dean Rasheed pushed:</p>

<ul>

<li>Use MINVALUE/MAXVALUE instead of UNBOUNDED for range partition bounds. Previously, UNBOUNDED meant no lower bound when used in the FROM list, and no upper bound when used in the TO list, which was OK for single-column range partitioning, but problematic with multiple columns. For example, an upper bound of (10.0, UNBOUNDED) would not be collocated with a lower bound of (10.0, UNBOUNDED), thus making it difficult or impossible to define contiguous multi-column range partitions in some cases. Fix this by using MINVALUE and MAXVALUE instead of UNBOUNDED to represent a partition column that is unbounded below or above respectively. This syntax removes any ambiguity, and ensures that if one partition's lower bound equals another partition's upper bound, then the partitions are contiguous. Also drop the constraint prohibiting finite values after an unbounded column, and just document the fact that any values after MINVALUE or MAXVALUE are ignored. Previously it was necessary to repeat UNBOUNDED multiple times, which was needlessly verbose. Note: Forces a post-PG 10 beta2 initdb. Report by Amul Sul, original patch by Amit Langote with some additional hacking by me. Discussion: <a target="_blank" href="https://postgr.es/m/CAAJ_b947mowpLdxL3jo3YLKngRjrq9+Ej4ymduQTfYR+8=YAYQ@mail.gmail.com">https://postgr.es/m/CAAJ_b947mowpLdxL3jo3YLKngRjrq9+Ej4ymduQTfYR+8=YAYQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d363d42bb9a4399a0207bd3b371c966e22e06bd3">https://git.postgresql.org/pg/commitdiff/d363d42bb9a4399a0207bd3b371c966e22e06bd3</a></li>

<li>Make the new partition regression tests locale-independent. The order of partitions listed by \d+ is in general locale-dependent. Rename the partitions in the test added by d363d42bb9 to force them to be listed in a consistent order. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/68f785fd522bca9372cce965ac10cbd8c239c076">https://git.postgresql.org/pg/commitdiff/68f785fd522bca9372cce965ac10cbd8c239c076</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Fix double shared memory allocation. SLRU buffer lwlocks are allocated twice by oversight in commit fe702a7b3f9f2bc5bf6d173166d7d55226af82c8 where that locks were moved to separate tranche. The bug doesn't have user-visible effects except small overspending of shared memory. Backpatch to 9.6 where it was introduced. Alexander Korotkov with small editorization by me. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7e1fb4c59e4ac86de2640d0f3453fde270ec1ff8">https://git.postgresql.org/pg/commitdiff/7e1fb4c59e4ac86de2640d0f3453fde270ec1ff8</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Fix typo in comment. Commit fd31cd265138 renamed the variable to skipping_blocks, but forgot to update this comment. Noticed while inspecting code. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/de38489b926e3e5af84f22cf4788fe4498e13c72">https://git.postgresql.org/pg/commitdiff/de38489b926e3e5af84f22cf4788fe4498e13c72</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Amit Kapila sent in another revision of a patch to parallelize queries containing initplans.</p>

<p>Shubham Barai sent in another revision of a patch to add predicate locking for GIN indexes.</p>

<p>Thomas Munro sent in two more revisions of a patch to add more flexible LDAP filters.</p>

<p>Alik Khilazhev sent in another revision of a patch to add Zipfian distributions to pgbench.</p>

<p>Andres Freund sent in two revisions of a patch to move ExecProcNode from dispatch to callback based model.</p>

<p>Alexey Chernyshov sent in a patch to add citext_pattern_ops to the citext contrib module.</p>

<p>Yura Sokolov sent in another revision of a patch to fix performance degradation of contended LWLock on NUMA.</p>

<p>Yugo Nagata sent in a patch to ensure that all statistics are sent after a few DML are performed.</p>

<p>Marina Polyakova sent in another revision of a patch to precalculate stable functions.</p>

<p>Yura Sokolov sent in two revisions of a patch to increase the size of the vacuum ring buffer.</p>

<p>Mark Rofail sent in another revision of a patch to add foreign key arrays.</p>

<p>Victor Drobny sent in a patch to add queryto_tsquery(), which takes a 'google like' query string and translates it to tsquery.</p>

<p>Robins Tharakan sent in two revisions of a patch to add --no-comments to pg_dump.</p>

<p>Mark Dilger sent in two revisions of a patch to remove abstime and friends from the main line code base.</p>

<p>Fabien COELHO sent in a patch to fix the documentation of random_exponential.</p>

<p>Etsuro Fujita sent in two more revisions of a patch to fix the rewrite tlist.</p>

<p>Jeevan Ladhe sent in another revision of a patch to add support for default partitions in declarative partitions.</p>

<p>Yugo Nagata sent in a patch to fix incorrect comments of XLByteToSeg() and XLByteToPrevSeg().</p>

<p>Thomas Munro sent in three revisions of a patch to fix join selectivity for &lt;&gt; comparisons.</p>

<p>Craig Ringer sent in two revisions of a patch to introduce heap_infomask_flags to decode infomask and infomask2.</p>

<p>Micha&#65533;l Paquier sent in a patch to check for objaddr nullness.</p>

<p>Etsuro Fujita sent in two revisions of a patch to fix mishandling of WITH CHECK OPTION constraints in direct foreign table modification.</p>

<p>Yugo Nagata and Fabr&#65533;zio de Royes Mello traded patches to add hooks for session_start and session_end.</p>

<p>Yura Sokolov sent in another revision of a patch to make an improvement to compactify_tuples by simplifyin PageRepairFragmentation.</p>

<p>Alexey Chernyshov sent in a patch to add functions on GIN and GiST indexes to pageinspect.</p>

<p>Hadi Moshayedi move the declarations of ExplainBeginGroup()/ExplainEndGroup() from explain.c to explain.h.</p>

<p>Marina Polyakova sent in another revision of a patch to pgbench to retry transactions with serialization or deadlock errors.</p>

<p>Mengxing Liu sent in another revision of a patch to eliminate O(N^2) scaling from rw-conflict tracking in serializable transactions using a skip list.</p>

<p>Dima Pavlov sent in a patch to improve perfomance for index search ANY(ARRAY[]) condition with single item.</p>