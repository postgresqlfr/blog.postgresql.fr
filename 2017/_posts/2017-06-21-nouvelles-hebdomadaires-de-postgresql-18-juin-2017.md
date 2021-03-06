---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 juin 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/06/21/Nouvelles-hebdomadaires-de-PostgreSQL-18-juin-2017"
---


<p>La <em>PGConf.Brazil 2017 OnLine Edition</em> sera en direct depuis le Br&eacute;sil du 10 au 14 juillet 2017&nbsp; <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></p>

<h2>Offres d'emplois autour de PostgreSQL en juin</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-06/">http://archives.postgresql.org/pgsql-jobs/2017-06/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>[ndt: MeetUp à Lyon le 28 juin&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</li>

<li>[ndt: MeetUp à Paris le jeudi 29 juin&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. Le programme est en ligne et les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

<li>PGBR2017 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 30 juin&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay UK 2017 aura lieu &agrave; Londres le 4 juillet 2017&nbsp;: <a target="_blank" href="http://www.pgconf.uk">http://www.pgconf.uk</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170618212538.GA13300@fetter.org">http://www.postgresql.org/message-id/20170618212538.GA13300@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Fix ALTER TABLE doc examples. Patch by Yugo Nagata &lt;nagata@sraoss.co.jp&gt;. Confirmed by Amit Langote, who is the original author of the document part. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/eab86897bd8cbeb21ae8959ca9a095ce7cb663df">https://git.postgresql.org/pg/commitdiff/eab86897bd8cbeb21ae8959ca9a095ce7cb663df</a></li>

<li>Fix typo in PostgreSQL 10.0 release note. Patch by Yugo Nagata. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e800656d9a9b40b2f55afabe76354ab6d93353b3">https://git.postgresql.org/pg/commitdiff/e800656d9a9b40b2f55afabe76354ab6d93353b3</a></li>

<li>Fix document bug regarding read only transactions. It was explained that read only transactions (not in standby) allow to update sequences. This had been wrong since the commit: 05d8a561ff85db1545f5768fe8d8dc9d99ad2ef7 Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170614.110826.425627939780392324.t-ishii%40sraoss.co.jp">https://www.postgresql.org/message-id/20170614.110826.425627939780392324.t-ishii%40sraoss.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6108348c09df33773bed6e0ac762fe47bdcbb9e6">https://git.postgresql.org/pg/commitdiff/6108348c09df33773bed6e0ac762fe47bdcbb9e6</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Stop table sync workers when subscription relation entry is removed. When a table sync worker is in waiting state and the subscription table entry is removed because of a concurrent subscription refresh, the worker could be left orphaned. To avoid that, explicitly stop the worker when the pg_subscription_rel entry is removed. Reported-by: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ddd7b22b225ae41d16ceb218b387645cb9becfdc">https://git.postgresql.org/pg/commitdiff/ddd7b22b225ae41d16ceb218b387645cb9becfdc</a></li>

<li>Stop table sync workers when subscription relation entry is removed. When a table sync worker is in waiting state and the subscription table entry is removed because of a concurrent subscription refresh, the worker could be left orphaned. To avoid that, explicitly stop the worker when the pg_subscription_rel entry is removed. Reported-by: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ddd7b22b225ae41d16ceb218b387645cb9becfdc">https://git.postgresql.org/pg/commitdiff/ddd7b22b225ae41d16ceb218b387645cb9becfdc</a></li>

<li>Trim trailing whitespace. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bf6e4c3c82d349dc311ef795cc8eb7a9badf49eb">https://git.postgresql.org/pg/commitdiff/bf6e4c3c82d349dc311ef795cc8eb7a9badf49eb</a></li>

<li>Fix build of ICU support in Windows. and also any platform that does not have locale_t but enabled ICU. Author: Ashutosh Sharma &lt;ashu.coek88@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/253504fb9f804b6aa7cec9b9b2506fa88accf0dc">https://git.postgresql.org/pg/commitdiff/253504fb9f804b6aa7cec9b9b2506fa88accf0dc</a></li>

<li>Add MSVC build system support for ICU. Author: Ashutosh Sharma &lt;ashu.coek88@gmail.com&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/03c396080ddc77b188a11dd54aa2a075ab2718e0">https://git.postgresql.org/pg/commitdiff/03c396080ddc77b188a11dd54aa2a075ab2718e0</a></li>

<li>Remove "synchronized table states" notice message. It appears to be more confusing than useful. Reported-by: Jeff Janes &lt;jeff.janes@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7f28a7946a37e1716fe12c9e8466dbb868292087">https://git.postgresql.org/pg/commitdiff/7f28a7946a37e1716fe12c9e8466dbb868292087</a></li>

<li>Add ICU_CFLAGS to global CPPFLAGS. The original code only added ICU_CFLAGS to the backend build. But it is also needed for building external modules that include pg_locale.h. So add it to the global CPPFLAGS. (This is only relevant if ICU is not in a compiler default path, so it apparently hasn't bitten many.) <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/94c2ed0ebe005aa6389b02a61e3c16d08035299c">https://git.postgresql.org/pg/commitdiff/94c2ed0ebe005aa6389b02a61e3c16d08035299c</a></li>

<li>doc: Update information_schema documentation for identity columns. This was apparently forgotten in the original patch. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5d8beac8bee344bdf4b05a63b93f06e05d999b39">https://git.postgresql.org/pg/commitdiff/5d8beac8bee344bdf4b05a63b93f06e05d999b39</a></li>

<li>doc: Update external PL list. Add PL/Lua, PL/v8. Remove stale/unmaintained PL/PHP, PL/Py, PL/Ruby, PL/Scheme. Reported-by: Adam Sah &lt;asah@midgard.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2440c442d167d9d081a3e69c4fa78f3b6f8932e9">https://git.postgresql.org/pg/commitdiff/2440c442d167d9d081a3e69c4fa78f3b6f8932e9</a></li>

<li>pg_dump: Fix harmless type mixup. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/791ef001c9fe980e32092227a72ec24a7d66fa3d">https://git.postgresql.org/pg/commitdiff/791ef001c9fe980e32092227a72ec24a7d66fa3d</a></li>

<li>Prevent copying default collation. This will not have the desired effect and might lead to crashes when the copied collation is used. Reported-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/17082a88eadfca79b50c04c5a78a2c38ee4f5d9c">https://git.postgresql.org/pg/commitdiff/17082a88eadfca79b50c04c5a78a2c38ee4f5d9c</a></li>

<li>pg_dump: Allow dumping default collation. This will not work on restore, but it will allow dumping out pg_catalog for research and documentation. Reported-by: Neil Anderson &lt;neil.t.anderson@gmail.com&gt; Bug: #14701 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4955109d2281eacec6af8aee203382ac3991f1cf">https://git.postgresql.org/pg/commitdiff/4955109d2281eacec6af8aee203382ac3991f1cf</a></li>

<li>Use correct ICU path for Windows 32 vs. 64 bit. Author: Ashutosh Sharma &lt;ashu.coek88@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ae1aa28eb6a0adb1ae0b36eb25a7d0ee2ee3db0b">https://git.postgresql.org/pg/commitdiff/ae1aa28eb6a0adb1ae0b36eb25a7d0ee2ee3db0b</a></li>

<li>Improve code comments. Author: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/88c6cff8e71eccac00fe68f4c15530161b99e6c5">https://git.postgresql.org/pg/commitdiff/88c6cff8e71eccac00fe68f4c15530161b99e6c5</a></li>

<li>Fix typo. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f2a886104a6683227bfcb0932dde97d30b123961">https://git.postgresql.org/pg/commitdiff/f2a886104a6683227bfcb0932dde97d30b123961</a></li>

<li>Fix collprovider of predefined collations. An earlier version of the patch had collprovider as an integer and thus set these to 0, but the correct setting is now null. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ec7129b7812ce276520f749d0946875663c34093">https://git.postgresql.org/pg/commitdiff/ec7129b7812ce276520f749d0946875663c34093</a></li>

<li>doc: Fix typo. Author: Julien Rouhaud &lt;julien.rouhaud@dalibo.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/506b565831e6c88666c18a467377c2f98066ccac">https://git.postgresql.org/pg/commitdiff/506b565831e6c88666c18a467377c2f98066ccac</a></li>

<li>libpq: Message style improvements. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2e3fc7a7d322289c70f89199be0a5e899ec7d9b9">https://git.postgresql.org/pg/commitdiff/2e3fc7a7d322289c70f89199be0a5e899ec7d9b9</a></li>

<li>psql: Use more consistent capitalization of some output headings. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/272171279f8676c57b3a8edf7daf792ad55b2c2c">https://git.postgresql.org/pg/commitdiff/272171279f8676c57b3a8edf7daf792ad55b2c2c</a></li>

<li>doc: Update example version numbers in pg_upgrade documentation. The exact numbers don't matter, since they are examples, but it was looking quite dated. For the target version, we now automatically substitute the current major version. The updated example source version should be good for a couple of years. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/39da0f709db4d9f16f46be56ae401df72aab93c0">https://git.postgresql.org/pg/commitdiff/39da0f709db4d9f16f46be56ae401df72aab93c0</a></li>

<li>Put documentation of options and commands in more alphabetical order. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0d9bdbcaae00dac89a82c25e66e4a859130e2fe8">https://git.postgresql.org/pg/commitdiff/0d9bdbcaae00dac89a82c25e66e4a859130e2fe8</a></li>

<li>doc: Whitespace fixes in man pages. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f0cfff9da2c577a19dd6a15ffc7b404693b700bc">https://git.postgresql.org/pg/commitdiff/f0cfff9da2c577a19dd6a15ffc7b404693b700bc</a></li>

<li>Add missing serial comma. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4e88fe8f8f148a45feacb50c2eaed9ca9ddea8bb">https://git.postgresql.org/pg/commitdiff/4e88fe8f8f148a45feacb50c2eaed9ca9ddea8bb</a></li>

<li>Use DEFACLOBJ_ macros in error message instead of hardcoding. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b6966d4627c0297ad42fe2592c66ac2f76e9962e">https://git.postgresql.org/pg/commitdiff/b6966d4627c0297ad42fe2592c66ac2f76e9962e</a></li>

<li>Remove unnecessary IPC::Run inclusion. This is no longer needed because the tests use PostgresNode. Reported-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/878b7d9eaa9cbf5f121f9ee8676d82b22decedf0">https://git.postgresql.org/pg/commitdiff/878b7d9eaa9cbf5f121f9ee8676d82b22decedf0</a></li>

<li>Fix typo in code comment. Author: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6c6a1149b5662f685ddbb0c6dc83eb110992044a">https://git.postgresql.org/pg/commitdiff/6c6a1149b5662f685ddbb0c6dc83eb110992044a</a></li>

<li>psql: Improve display of "for all tables" publications. Show "All tables" property in \dRp and \dRp+. Don't list tables for such publications in \dRp+, since it's redundant and the list could be very long. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; Author: Jeff Janes &lt;jeff.janes@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/915379c3c2613f2b24d4e9c6fa79a43e7c6a86ec">https://git.postgresql.org/pg/commitdiff/915379c3c2613f2b24d4e9c6fa79a43e7c6a86ec</a></li>

<li>doc: Add section about logical replication restrictions. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3ef97e725e2cbb050ff2e88adc36299bafa188c4">https://git.postgresql.org/pg/commitdiff/3ef97e725e2cbb050ff2e88adc36299bafa188c4</a></li>

<li>Fix ICU collation use on Windows. Windows uses a separate code path for libc locales. The code previously ended up there also if an ICU collation should be used, leading to a crash. Reported-by: Ashutosh Sharma &lt;ashu.coek88@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/41839b7abc85f21dd7ce76ab9cd1d7533c53cf9c">https://git.postgresql.org/pg/commitdiff/41839b7abc85f21dd7ce76ab9cd1d7533c53cf9c</a></li>

<li>Use RangeVarGetRelidExtended() in AlterSequence(). This allows us to combine the opening and the ownership check. Reported-by: Robert Haas &lt;robertmhaas@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/94da2a6a9a05776953524424a3d8079e54bc5d94">https://git.postgresql.org/pg/commitdiff/94da2a6a9a05776953524424a3d8079e54bc5d94</a></li>

<li>doc: Add note that COPY commands are published as INSERTs. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/57fb1d677d98d9c02565e47afdbf5e887b095c9f">https://git.postgresql.org/pg/commitdiff/57fb1d677d98d9c02565e47afdbf5e887b095c9f</a></li>

<li>Define HAVE_UCOL_STRCOLLUTF8 on Windows. This should normally be determined by a configure check, but until someone figures out how to do that on Windows, it's better that the code uses the new function by default. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e42645ad92687a2250ad17e1a045da73e54a5064">https://git.postgresql.org/pg/commitdiff/e42645ad92687a2250ad17e1a045da73e54a5064</a></li>

<li>Set statement timestamp in apply worker. This ensures that triggers can see an up-to-date timestamp. Reported-by: Konstantin Evteev &lt;konst583@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/033370179a6d15b2e1b519462d14419d6dc84e73">https://git.postgresql.org/pg/commitdiff/033370179a6d15b2e1b519462d14419d6dc84e73</a></li>

<li>doc: Fix typo. Author: Julien Rouhaud &lt;julien.rouhaud@dalibo.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/806dccee23dfa3dd3b326354255cf0d5cb032f02">https://git.postgresql.org/pg/commitdiff/806dccee23dfa3dd3b326354255cf0d5cb032f02</a></li>

<li>doc: Fix typo. Author: Julien Rouhaud &lt;julien.rouhaud@dalibo.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f6da23f526cf622d2dbcee47695b4aedf8ab2c69">https://git.postgresql.org/pg/commitdiff/f6da23f526cf622d2dbcee47695b4aedf8ab2c69</a></li>

<li>Documentation spell checking and markup improvements. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bbaf9e8f840acb8e4a52dc1809bd2c9b320e9df8">https://git.postgresql.org/pg/commitdiff/bbaf9e8f840acb8e4a52dc1809bd2c9b320e9df8</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix ALTER SEQUENCE OWNED BY to not rewrite the sequence relation. It's not necessary for it to do that, since OWNED BY requires only ordinary catalog updates and doesn't affect future sequence values. And pg_upgrade needs to use OWNED BY without having it change the sequence's relfilenode. Commit 3d79013b9 broke this by making all forms of ALTER SEQUENCE change the relfilenode; that seems to be the explanation for the hard-to-reproduce buildfarm failures we've been seeing since then. Discussion: <a target="_blank" href="https://postgr.es/m/19785.1497215827@sss.pgh.pa.us">https://postgr.es/m/19785.1497215827@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a475e46634dc7abde1d5a6fc7aaa708219383004">https://git.postgresql.org/pg/commitdiff/a475e46634dc7abde1d5a6fc7aaa708219383004</a></li>

<li>Assert that we don't invent relfilenodes or type OIDs in binary upgrade. During pg_upgrade's restore run, all relfilenode choices should be overridden by commands in the dump script. If we ever find ourselves choosing a relfilenode in the ordinary way, someone blew it. Likewise for pg_type OIDs. Since pg_upgrade might well succeed anyway, if there happens not to be a conflict during the regression test run, we need assertions here to keep us on the straight and narrow. We might someday be able to remove the assertion in GetNewRelFileNode, if pg_upgrade is rewritten to remove its assumption that old and new relfilenodes always match. But it's hard to see how to get rid of the pg_type OID constraint, since those OIDs are embedded in user tables in some cases. Back-patch as far as 9.5, because of the risk of back-patches breaking something here even if it works in HEAD. I'd prefer to go back further, but 9.4 fails both assertions due to get_rel_infos()'s use of a temporary table. We can't use the later-branch solution of a CTE for compatibility reasons (cf commit 5d16332e9), and it doesn't seem worth inventing some other way to do the query. (I did check, by dint of changing the Asserts to elog(WARNING), that there are no other cases of unwanted OID assignments during 9.4's regression test run.) Discussion: <a target="_blank" href="https://postgr.es/m/19785.1497215827@sss.pgh.pa.us">https://postgr.es/m/19785.1497215827@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7332c3cbb39026e62f4bd0a8acf3df8f701a9e2f">https://git.postgresql.org/pg/commitdiff/7332c3cbb39026e62f4bd0a8acf3df8f701a9e2f</a></li>

<li>Fix confusion about number of subplans in partitioned INSERT setup. ExecInitModifyTable() thought there was a plan per partition, but no, there's only one. The problem had escaped detection so far because there would only be visible misbehavior if there were a SubPlan (not an InitPlan) in the quals being duplicated for each partition. However, valgrind detected a bogus memory access in test cases added by commit 4f7a95be2, and investigation of that led to discovery of the bug. The additional test case added here crashes without the patch. Patch by Amit Langote, test case by me. Discussion: <a target="_blank" href="https://postgr.es/m/10974.1497227727@sss.pgh.pa.us">https://postgr.es/m/10974.1497227727@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/78a030a441966d91bc7e932ef84da39c3ea7d970">https://git.postgresql.org/pg/commitdiff/78a030a441966d91bc7e932ef84da39c3ea7d970</a></li>

<li>In initdb, defend against assignment of NULL values to not-null columns. Previously, you could write _null_ in a BKI DATA line for a column that's supposed to be NOT NULL and initdb would let it pass, probably breaking subsequent accesses to the row. No doubt the original coding overlooked this simple sanity check because in the beginning we didn't have any way to mark catalog columns NOT NULL at initdb time. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b74701043e396a93f1f18098044741daaf75f761">https://git.postgresql.org/pg/commitdiff/b74701043e396a93f1f18098044741daaf75f761</a></li>

<li>Re-run pgindent. This is just to have a clean base state for testing of Piotr Stefaniak's latest version of FreeBSD indent. I fixed up a couple of places where pgindent would have changed format not-nicely. perltidy not included. Discussion: <a target="_blank" href="https://postgr.es/m/VI1PR03MB119959F4B65F000CA7CD9F6BF2CC0@VI1PR03MB1199.eurprd03.prod.outlook.com">https://postgr.es/m/VI1PR03MB119959F4B65F000CA7CD9F6BF2CC0@VI1PR03MB1199.eurprd03.prod.outlook.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/651902deb1551db8b401fdeab9bdb8a61cee7f9f">https://git.postgresql.org/pg/commitdiff/651902deb1551db8b401fdeab9bdb8a61cee7f9f</a></li>

<li>Disallow set-returning functions inside CASE or COALESCE. When we reimplemented SRFs in commit 69f4b9c85, our initial choice was to allow the behavior to vary from historical practice in cases where a SRF call appeared within a conditional-execution construct (currently, only CASE or COALESCE). But that was controversial to begin with, and subsequent discussion has resulted in a consensus that it's better to throw an error instead of executing the query differently from before, so long as we can provide a reasonably clear error message and a way to rewrite the query. Hence, add a parser mechanism to allow detection of such cases during parse analysis. The mechanism just requires storing, in the ParseState, a pointer to the set-returning FuncExpr or OpExpr most recently emitted by parse analysis. Then the parsing functions for CASE and COALESCE can detect the presence of a SRF in their arguments by noting whether this pointer changes while analyzing their arguments. Furthermore, if it does, it provides a suitable error cursor location for the complaint. (This means that if there's more than one SRF in the arguments, the error will point at the last one to be analyzed not the first. While connoisseurs of parsing behavior might find that odd, it's unlikely the average user would ever notice.) While at it, we can also provide more specific error messages than before about some pre-existing restrictions, such as no-SRFs-within-aggregates. Also, reject at parse time cases where a NULLIF or IS DISTINCT FROM construct would need to return a set. We've never supported that, but the restriction is depended on in more subtle ways now, so it seems wise to detect it at the start. Also, provide some documentation about how to rewrite a SRF-within-CASE query using a custom wrapper SRF. It turns out that the information_schema.user_mapping_options view contained an instance of exactly the behavior we're now forbidding; but rewriting it makes it more clear and safer too. initdb forced because of user_mapping_options change. Patch by me, with error message suggestions from Alvaro Herrera and Andres Freund, pursuant to a complaint from Regina Obe. Discussion: <a target="_blank" href="https://postgr.es/m/000001d2d5de$d8d66170$8a832450$@pcorp.us">https://postgr.es/m/000001d2d5de$d8d66170$8a832450$@pcorp.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0436f6bde8848b7135f19dd7f8548b8c2ae89a34">https://git.postgresql.org/pg/commitdiff/0436f6bde8848b7135f19dd7f8548b8c2ae89a34</a></li>

<li>Fix violations of CatalogTupleInsert/Update/Delete abstraction. In commits 2f5c9d9c9 and ab0289651 we invented an abstraction layer to insulate catalog manipulations from direct heap update calls. But evidently some patches that hadn't landed in-tree at that point didn't get the memo completely. Fix a couple of direct calls to simple_heap_delete to use CatalogTupleDelete instead; these appear to have been added in commits 7c4f52409 and 7b504eb28. This change is purely cosmetic ATM, but there's no point in having an abstraction layer if we allow random code to break it. Masahiko Sawada and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/CAD21AoDOPRSVcwbnCN3Y1n_68ATyTspsU6=ygtHz_uY0VcdZ8A@mail.gmail.com">https://postgr.es/m/CAD21AoDOPRSVcwbnCN3Y1n_68ATyTspsU6=ygtHz_uY0VcdZ8A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a571c7f661a7b601aafcb12196d004cdb8b8cb23">https://git.postgresql.org/pg/commitdiff/a571c7f661a7b601aafcb12196d004cdb8b8cb23</a></li>

<li>Fix no-longer-valid shortcuts in expression_returns_set(). expression_returns_set() used to short-circuit its recursion upon seeing certain node types, such as DistinctExpr, that it knew the executor did not support set-valued arguments for. That was never inherent, though, just a reflection of laziness in execQual.c. With the new implementation of SRFs there is no reason to think that any scalar-valued expression node could not have a set-valued subexpression, except for AggRefs and WindowFuncs where we know there is a parser check rejecting it. And indeed, the shortcut causes unexpected failures for cases such as a SRF underneath DistinctExpr, because the planner stops looking for SRFs too soon. Discussion: <a target="_blank" href="https://postgr.es/m/5259.1497044025@sss.pgh.pa.us">https://postgr.es/m/5259.1497044025@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8e72239e9d961c27f02b242e33fa832c364c7a4b">https://git.postgresql.org/pg/commitdiff/8e72239e9d961c27f02b242e33fa832c364c7a4b</a></li>

<li>Improve release note text about set-returning-function changes. Paul Ramsey griped about this awhile ago, but I'd been holding fire on changing it until we settled what to do about the CASE/COALESCE issue. Discussion: <a target="_blank" href="https://postgr.es/m/CACowWR0AMyUt5fwtvuDqWyYNdp-hQJj9XqSxJR6YM9sKWov=_w@mail.gmail.com">https://postgr.es/m/CACowWR0AMyUt5fwtvuDqWyYNdp-hQJj9XqSxJR6YM9sKWov=_w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a12c09ad86e60a8acb269744b8ee86429dda2cd8">https://git.postgresql.org/pg/commitdiff/a12c09ad86e60a8acb269744b8ee86429dda2cd8</a></li>

<li>Fix low-probability leaks of PGresult objects in the backend. We had three occurrences of essentially the same coding pattern wherein we tried to retrieve a query result from a libpq connection without blocking. In the case where PQconsumeInput failed (typically indicating a lost connection), all three loops simply gave up and returned, forgetting to clear any previously-collected PGresult object. Since those are malloc'd not palloc'd, the oversight results in a process-lifespan memory leak. One instance, in libpqwalreceiver, is of little significance because the walreceiver process would just quit anyway if its connection fails. But we might as well fix it. The other two instances, in postgres_fdw, are somewhat more worrisome because at least in principle the scenario could be repeated, allowing the amount of memory leaked to build up to something worth worrying about. Moreover, in these cases the loops contain CHECK_FOR_INTERRUPTS calls, as well as other calls that could potentially elog(ERROR), providing another way to exit without having cleared the PGresult. Here we need to add PG_TRY logic similar to what exists in quite a few other places in postgres_fdw. Coverity noted the libpqwalreceiver bug; I found the other two cases by checking all calls of PQconsumeInput. Back-patch to all supported versions as appropriate (9.2 lacks postgres_fdw, so this is really quite unexciting for that branch). Discussion: <a target="_blank" href="https://postgr.es/m/22620.1497486981@sss.pgh.pa.us">https://postgr.es/m/22620.1497486981@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a3bed62d44f83283414a82717bc8e96e9f398dcc">https://git.postgresql.org/pg/commitdiff/a3bed62d44f83283414a82717bc8e96e9f398dcc</a></li>

<li>Make configure check for IPC::Run when --enable-tap-tests is specified. The TAP tests mostly don't work without IPC::Run, and the reason for the failure is not immediately obvious from the error messages you get. So teach configure to reject --enable-tap-tests unless IPC::Run exists. Mostly this just involves adding ax_prog_perl_modules.m4 from the GNU autoconf archives. This was discussed last year, but we held off on the theory that we might be switching to CMake soon. That's evidently not happening for v10, so let's absorb this now. Eugene Kazakov and Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/56BDDC20.9020506@postgrespro.ru">https://postgr.es/m/56BDDC20.9020506@postgrespro.ru</a> Discussion: <a target="_blank" href="https://postgr.es/m/CAB7nPqRVKG_CR4Dy_AMfE6DXcr6F7ygy2goa2atJU4XkerDRUg@mail.gmail.com">https://postgr.es/m/CAB7nPqRVKG_CR4Dy_AMfE6DXcr6F7ygy2goa2atJU4XkerDRUg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c254970ad6092d201443cced570450d5b29d4234">https://git.postgresql.org/pg/commitdiff/c254970ad6092d201443cced570450d5b29d4234</a></li>

<li>Teach pgindent to skip files generated by bison or flex automatically. If a .c or .h file corresponds to a .y or .l file, skip indenting it. There's no point in reindenting derived files, and these files tend to confuse pgindent. (Which probably indicates a bug in BSD indent, but I can't get excited about trying to fix it.) For the same reasons, add src/backend/utils/fmgrtab.c to the set of files excluded by src/tools/pgindent/exclude_file_patterns. The point of doing this is that it makes it safe to run pgindent over the tree without doing "make maintainer-clean" first. While these are not the only derived .c/.h files in the tree, they are the only ones pgindent fails on. Removing that prerequisite step results in one less way to mess up a pgindent run, and it's necessary if we ever hope to get to the ease of running pgindent via "make indent". <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cea258b63d9c7a6d0a7c5e91e539bb89df4bc078">https://git.postgresql.org/pg/commitdiff/cea258b63d9c7a6d0a7c5e91e539bb89df4bc078</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix failure to remove dependencies when a partition is detached. Otherwise, dropping the partitioned table will automatically drop any previously-detached children, which would be unfortunate. Ashutosh Bapat and Rahila Syed, reviewed by Amit Langote and by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRdOwHuGj45i25iLQ4QituA0uH6RuLX1h5deD4KBZJ25yg@mail.gmail.com">http://postgr.es/m/CAFjFpRdOwHuGj45i25iLQ4QituA0uH6RuLX1h5deD4KBZJ25yg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ee252f074b88e34ff7ac2b45a73d3cee12b1c671">https://git.postgresql.org/pg/commitdiff/ee252f074b88e34ff7ac2b45a73d3cee12b1c671</a></li>

<li>Always initialize PartitionBoundInfoData's null_index. This doesn't actually matter at present, because the current code never consults null_index for range partitions. However, leaving it uninitialized is still a bad idea, so let's not do that. Amul Sul, reviewed by Ashutosh Bapat Discussion: <a target="_blank" href="http://postgr.es/m/CAAJ_b94AkEzcx+12ySCnbMDX7=UdF4BjnoBGfMQbB0RNSTo3Ng@mail.gmail.com">http://postgr.es/m/CAAJ_b94AkEzcx+12ySCnbMDX7=UdF4BjnoBGfMQbB0RNSTo3Ng@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/096f1ccd5290286b135822bb282fa884454d4b69">https://git.postgresql.org/pg/commitdiff/096f1ccd5290286b135822bb282fa884454d4b69</a></li>

<li>Teach predtest.c about CHECK clauses to fix partitioning bugs. In a CHECK clause, a null result means true, whereas in a WHERE clause it means false. predtest.c provided different functions depending on which set of semantics applied to the predicate being proved, but had no option to control what a null meant in the clauses provided as axioms. Add one. Use that in the partitioning code when figuring out whether the validation scan on a new partition can be skipped. Rip out the old logic that attempted (not very successfully) to compensate for the absence of the necessary support in predtest.c. Ashutosh Bapat and Robert Haas, reviewed by Amit Langote and incorporating feedback from Tom Lane. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpReT_kq_uwU_B8aWDxR7jNGE=P0iELycdq5oupi=xSQTOw@mail.gmail.com">http://postgr.es/m/CAFjFpReT_kq_uwU_B8aWDxR7jNGE=P0iELycdq5oupi=xSQTOw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b08df9cab777427fdafe633ca7b8abf29817aa55">https://git.postgresql.org/pg/commitdiff/b08df9cab777427fdafe633ca7b8abf29817aa55</a></li>

<li>Fix problems related to RangeTblEntry members enrname and enrtuples. Commit 18ce3a4ab22d2984f8540ab480979c851dae5338 failed to update the comments in parsenodes.h for the new members, and made only incomplete updates to src/backend/nodes Thomas Munro, per a report from Noah Misch. Discussion: <a target="_blank" href="http://postgr.es/m/20170611062525.GA1628882@rfd.leadboat.com">http://postgr.es/m/20170611062525.GA1628882@rfd.leadboat.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f32d57fd7088a558dadbe21b9859b09d2f877c19">https://git.postgresql.org/pg/commitdiff/f32d57fd7088a558dadbe21b9859b09d2f877c19</a></li>

</ul>

<p>Dean Rasheed pushed:</p>

<ul>

<li>Teach relation_is_updatable() about partitioned tables. Table partitioning, introduced in commit f0e44751d7, added a new relkind - RELKIND_PARTITIONED_TABLE. Update relation_is_updatable() to handle it. Specifically, partitioned tables and simple views built on top of them are updatable. This affects the SQL-callable functions pg_relation_is_updatable() and pg_column_is_updatable(), and the views information_schema.views and information_schema.columns. Dean Rasheed, reviewed by Ashutosh Bapat. Discussion: <a target="_blank" href="https://postgr.es/m/CAEZATCXnbiFkMXgF4Ez1pmM2c-tS1z33bSq7OGbw7QQhHov%2B6Q%40mail.gmail.com">https://postgr.es/m/CAEZATCXnbiFkMXgF4Ez1pmM2c-tS1z33bSq7OGbw7QQhHov%2B6Q%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b6263cd851ef245a5dc38119448e029ca1592da4">https://git.postgresql.org/pg/commitdiff/b6263cd851ef245a5dc38119448e029ca1592da4</a></li>

<li>Teach RemoveRoleFromObjectPolicy() about partitioned tables. Table partitioning, introduced in commit f0e44751d7, added a new relkind - RELKIND_PARTITIONED_TABLE. Update RemoveRoleFromObjectPolicy() to handle it, otherwise DROP OWNED BY will fail if the role has any RLS policies referring to partitioned tables. Dean Rasheed, reviewed by Amit Langote. Discussion: <a target="_blank" href="https://postgr.es/m/CAEZATCUnNOKN8sLML9jUzxecALWpEXK3a3W7y0PgFR4%2Buhgc%3Dg%40mail.gmail.com">https://postgr.es/m/CAEZATCUnNOKN8sLML9jUzxecALWpEXK3a3W7y0PgFR4%2Buhgc%3Dg%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f356ec57444e42e53474ad5a029cdf6dca195069">https://git.postgresql.org/pg/commitdiff/f356ec57444e42e53474ad5a029cdf6dca195069</a></li>

<li>Teach PL/pgSQL about partitioned tables. Table partitioning, introduced in commit f0e44751d7, added a new relkind - RELKIND_PARTITIONED_TABLE. Update a couple of places in PL/pgSQL to handle it. Specifically plpgsql_parse_cwordtype() and build_row_from_class() needed updating in order to make table%ROWTYPE and table.col%TYPE work for partitioned tables. Dean Rasheed, reviewed by Amit Langote. Discussion: <a target="_blank" href="https://postgr.es/m/CAEZATCUnNOKN8sLML9jUzxecALWpEXK3a3W7y0PgFR4%2Buhgc%3Dg%40mail.gmail.com">https://postgr.es/m/CAEZATCUnNOKN8sLML9jUzxecALWpEXK3a3W7y0PgFR4%2Buhgc%3Dg%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d3c3f2b1e25cc96d3078bf4d47a2f58fefb70560">https://git.postgresql.org/pg/commitdiff/d3c3f2b1e25cc96d3078bf4d47a2f58fefb70560</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Avoid bogus TwoPhaseState locking sequences. The optimized code in 728bd991c3c4 contains a few invalid locking sequences. To wit, the original code would try to acquire an lwlock that it already holds. Avoid this by moving lock acquisitions to higher-level code, and install appropriate assertions in low-level that the correct mode is held. Authors: Michael Paquier, &#65533;lvaro Herrera Reported-By: chuanting wang Bug: #14680 Discussion: <a target="_blank" href="https://postgr.es/m/20170531033228.1487.10124@wrigleys.postgresql.org">https://postgr.es/m/20170531033228.1487.10124@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e90ceeaa495f5f40f224bcf84d2b0700eae8d7a3">https://git.postgresql.org/pg/commitdiff/e90ceeaa495f5f40f224bcf84d2b0700eae8d7a3</a></li>

<li>Rename function for consistency. Avoid using prefix "staext" when everything else uses "statext". Author: Kyotaro HORIGUCHI Discussion: <a target="_blank" href="https://postgr.es/m/20170615.140041.165731947.horiguchi.kyotaro@lab.ntt.co.jp">https://postgr.es/m/20170615.140041.165731947.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3ab7912c18b6df4d6843d0e0cd6183e7f4912cbb">https://git.postgresql.org/pg/commitdiff/3ab7912c18b6df4d6843d0e0cd6183e7f4912cbb</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Don't force-assign transaction id when exporting a snapshot. Previously we required every exported transaction to have an xid assigned. That was used to check that the exporting transaction is still running, which in turn is needed to guarantee that that necessary rows haven't been removed in between exporting and importing the snapshot. The exported xid caused unnecessary problems with logical decoding, because slot creation has to wait for all concurrent xid to finish, which in turn serializes concurrent slot creation. It also prohibited snapshots to be exported on hot-standby replicas. Instead export the virtual transactionid, which avoids the unnecessary serialization and the inability to export snapshots on standbys. This changes the file name of the exported snapshot, but since we never documented what that one means, that seems ok. Author: Petr Jelinek, slightly editorialized by me Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/f598b4b8-8cd7-0d54-0939-adda763d8c34@2ndquadrant.com">https://postgr.es/m/f598b4b8-8cd7-0d54-0939-adda763d8c34@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6c2003f8a1bbc7c192a2e83ec51581c018aa162f">https://git.postgresql.org/pg/commitdiff/6c2003f8a1bbc7c192a2e83ec51581c018aa162f</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: Fix pg_upgrade standby server upgrade docs. It was unsafe to instruct users to start/stop the server after pg_upgrade was run but before the standby servers were rsync'ed. The new instructions avoid this. RELEASE NOTES: This fix should be mentioned in the minor release notes. Reported-by: Dmitriy Sarafannikov and Sergey Burladyan Discussion: <a target="_blank" href="https://postgr.es/m/87wp8o506b.fsf@seb.koffice.internal">https://postgr.es/m/87wp8o506b.fsf@seb.koffice.internal</a> Backpatch-through: 9.5, where standby server upgrade instructions first appeared <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0f33a719fdbb5d8c43839ea0d2c90cd03e2af2d2">https://git.postgresql.org/pg/commitdiff/0f33a719fdbb5d8c43839ea0d2c90cd03e2af2d2</a></li>

<li>doc: remove mention of Windows junction points by pg_upgrade. pg_upgrade never used Windows junction points but instead always used Windows hard links. Reported-by: Adrian Klaver Discussion: <a target="_blank" href="https://postgr.es/m/6a638c60-90bb-4921-8ee4-5fdad68f8b09@aklaver.com">https://postgr.es/m/6a638c60-90bb-4921-8ee4-5fdad68f8b09@aklaver.com</a> Backpatch-through: 9.3, where the mention first appeared <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/07fb943335f3cdd11a9146ae6fdee237cc83c5f6">https://git.postgresql.org/pg/commitdiff/07fb943335f3cdd11a9146ae6fdee237cc83c5f6</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Reconcile nodes/*funcs.c with PostgreSQL 10 work. The _equalTableFunc() omission of coltypmods has semantic significance, but I did not track down resulting user-visible bugs, if any. The other changes are cosmetic only, affecting order. catversion bump due to readfuncs.c field order change. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/39ac55918fc31b9bf88185d28ebe7ddc58d01181">https://git.postgresql.org/pg/commitdiff/39ac55918fc31b9bf88185d28ebe7ddc58d01181</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix dependency, when changing a function's argument/return type. When a new base type is created using the old-style procedure of first creating the input/output functions with "opaque" in place of the base type, the "opaque" argument/return type is changed to the final base type, on CREATE TYPE. However, we did not create a pg_depend record when doing that, so the functions were left not depending on the type. Fixes bug #14706, reported by Karen Huddleston. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20170614232259.1424.82774@wrigleys.postgresql.org">https://www.postgresql.org/message-id/20170614232259.1424.82774@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/30681c830d69ca88cf66105c94e63d3e4d905681">https://git.postgresql.org/pg/commitdiff/30681c830d69ca88cf66105c94e63d3e4d905681</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typos in comments. Author: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bb1f8f9e5bb13af43ab65faa98ae898a68995070">https://git.postgresql.org/pg/commitdiff/bb1f8f9e5bb13af43ab65faa98ae898a68995070</a></li>

<li>Remove incorrect comment. Author: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7f5cb14e3c507973392e90b25cb4d36932dd42da">https://git.postgresql.org/pg/commitdiff/7f5cb14e3c507973392e90b25cb4d36932dd42da</a></li>

<li>Fix copy/paste error in docs. Author: Julien Rouhaud &lt;julien.rouhaud@dalibo.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81a4dcf2f2f92dc01ce0cf318dc9fabfb3021bd7">https://git.postgresql.org/pg/commitdiff/81a4dcf2f2f92dc01ce0cf318dc9fabfb3021bd7</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Jeevan Ladhe sent in two more revisions of a patch to add support for a default declarative partition.</p>

<p>Thomas Munro sent in another revision of a patch to ensure that there are two transition table tuplestores for the ON CONFLICT DO UPDATE case, one for updated tuples, and the other for inserted tuples.</p>

<p>Haribabu Kommi sent in another revision of a patch to put in the infrastructure for pluggable storage.</p>

<p>Tom Lane sent in a patch to check that pg_upgrade never generates a new pg_type OID and ensures that relfilenodes are all assigned.</p>

<p>Amit Langote sent in a patch to teach pgrowlocks to check relkind before scanning.</p>

<p>Jeevan Ladhe sent in a patch to fix possible optimizations in ATExecAttachPartition().</p>

<p>Micha&#65533;l Paquier sent in a patch to ensure that pg_receivewal and messages are printed only in verbose mode.</p>

<p>Masahiko Sawada sent in a patch to make RemoveSubscriptionRel use CatalogTupleDelete() rather than the curren simple_heap_delete.</p>

<p>Masahiko Sawada sent in a patch to disallow ALTER SUBSCRIPTION SET PUBLICATION WITH (refresh = true) and ALTER SUBSCRIPTION REFRESH PUBLICATION inside a transaction block.</p>

<p>Bruce Momjian sent in two revisions of a patch to clarify the documentation around hint bits as it relates to pg_upgrade.</p>

<p>Peter Eisentraut sent in a patch to fix the output of char node fields.</p>

<p>Christian Ullrich sent in a patch to make setlocale() aware of multithreading to avoid crash.</p>

<p>Etsuro Fujita sent in a patch to update comments in nodeModifyTable.c.</p>

<p>Mithun Cy sent in another revision of a patch to implement auto_prewarm.</p>

<p>Beena Emerson sent in another revision of a patch to implement default partitions for range partitions.</p>

<p>Surafel Temesgen sent in another revision of a patch to disallow multiple queries per PQexec().</p>

<p>Marina Polyakova sent in a patch to improve pgbench by removing serialization and deadlock errors, setting the correct default transaction isolation level, reporting per-statement serialization and deadlock failures, and fixing the documentation.</p>

<p>Etsuro Fujita sent in a patch to add a missing comment for create_modifytable_path.</p>

<p>Justin Pryzby sent in a patch to make showusage() get memory fields from getrusage().</p>

<p>Amit Khandekar sent in another revision of a patch to make UPDATEs on declaratively partitioned tables which change the partition key to actually move the affected rows to the appropriate partitions.</p>

<p>Fabien COELHO sent in another revision of a patch to add TAP tests for pgbench.</p>

<p>Jeff Janes sent in another revision of a patch to prevent subscription workers from signalling the WAL writer too much.</p>

<p>Peter Eisentraut sent in a WIP patch to tweak publication fetching in psql.</p>

<p>QL Zhuo sent in two revisions of a patch to ensure that filepath/filename are not downcased while loading libraries.</p>

<p>Fabien COELHO sent in another revision of a patch to implement \gdesc in psql.</p>

<p>Ashutosh Sharma sent in three more revisions of a patch to fix ICU on Windows.</p>

<p>Etsuro Fujita sent in another revision of a patch to adjust inherited update tlists.</p>

<p>Konstantin Knizhnik sent in a patch to implement AES encryption in the backend.</p>

<p>Fabien COELHO sent in another revision of a patch to add a special variable to psql to reflect the last query status.</p>

<p>Shubham Barai sent in two revisions of a patch to implement predicate locking in GiST indexes.</p>

<p>Mark Rofail sent in a patch to add a record to pg_proc (src/include/catalog/pg_proc.h), modify opr_sanity regression check expected results to account for it, implement a low-level function called `array_contains_elem` as an equivalent to `array_contain_compare` but accepts anyelement instead of anyarray as the right operand.</p>

<p>Julien Rouhaud sent in a patch to fix a typo in insert.sgml.</p>