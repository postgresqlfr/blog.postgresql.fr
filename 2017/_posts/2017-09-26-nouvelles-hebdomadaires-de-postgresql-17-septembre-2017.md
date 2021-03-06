---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 septembre 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/09/26/Nouvelles-hebdomadaires-de-PostgreSQL-17-septembre-2017"
---


<p>La <em>PGConf India 2018</em> aura lieu les 22 & 23 f&eacute;vrier 2018 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde). Les propositions sont attendues via <a target="_blank" href="https://goo.gl/forms/F9hRjOIsaNasVOAz2">https://goo.gl/forms/F9hRjOIsaNasVOAz2</a> avant le 31 octobre 2017&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>PostGIS 2.4.0 rc1, le syst&egrave;me d'information g&eacute;ographique de r&eacute;f&eacute;rence pour PostgreSQL&nbsp;: <a target="_blank" href="http://postgis.net/2017/09/13/postgis-2.4.0rc1">http://postgis.net/2017/09/13/postgis-2.4.0rc1</a></li>

<li>PostgreSQL Automatic Failover (PAF) v2.2.0&nbsp;: <a target="_blank" href="https://github.com/dalibo/PAF/releases/tag/v2.2.0">https://github.com/dalibo/PAF/releases/tag/v2.2.0</a></li>

<li>oracle_fdw 2.0.0&nbsp;: <a target="_blank" href="https://laurenz.github.io/oracle_fdw">https://laurenz.github.io/oracle_fdw</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en septembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-09/">http://archives.postgresql.org/pgsql-jobs/2017-09/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li><em>PGConf Local&nbsp;: Seattle</em> aura lieu les 13 et 14 novembre 2017&nbsp;: <a target="_blank" href="https://www.pgconf.us/#Seattle2017">https://www.pgconf.us/#Seattle2017</a></li>

<li>Le <em>PGDay Australia 2017</em> se tiendra &agrave; Melbourne le 17 novembre. L'appel &agrave; conf&eacute;renciers court jusqu'au 8 septembre&nbsp;: <a target="_blank" href="https://goo.gl/5d9EbT">https://goo.gl/5d9EbT</a> <a target="_blank" href="http://2017.pgday.com.au/">http://2017.pgday.com.au/</a></li>

<li>La conf&eacute;rence 2ndQuadrant PostgreSQL 2017 (<em>2Q PGConf</em> en abr&eacute;g&eacute;) sera tenue les 6 et 7 novembre &agrave; New-York City, et le 9 novembre &agrave; Chicago&nbsp;: <a target="_blank" href="http://www.2qpgconf.com/">http://www.2qpgconf.com/</a></li>

<li>Session PostgreSQL le 17 novembre 2017 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 30 septembre &agrave; l'adresse call-for-paper AT postgresql-sessions POINT org. D&eacute;tails par l&agrave;&nbsp;: <a target="_blank" href="http://blog.dalibo.com/2017/08/29/cfp_pgsession9.html">http://blog.dalibo.com/2017/08/29/cfp_pgsession9.html</a></li>

<li><em>PGConf Local&nbsp;: Austin</em> aura lieu les 4 & 5 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="https://www.pgconf.us/conferences/Austin2017">https://www.pgconf.us/conferences/Austin2017</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170918045902.GA4968@fetter.org">http://www.postgresql.org/message-id/20170918045902.GA4968@fetter.org</a></p>

<p>Submit news and announcements by Sunday at 3:00pm EST5EDT. Please send English language ones to david@fetter.org, German language to pwn@pgug.de, Italian language to pwn@itpug.org.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix DROP SUBSCRIPTION hang. When ALTER SUBSCRIPTION DISABLE is run in the same transaction before DROP SUBSCRIPTION, the latter will hang because workers will still be running, not having seen the DISABLE committed, and DROP SUBSCRIPTION will wait until the workers have vacated the replication origin slots. Previously, DROP SUBSCRIPTION killed the logical replication workers immediately only if it was going to drop the replication slot, otherwise it scheduled the worker killing for the end of the transaction, as a result of 7e174fa793a2df89fe03d002a5087ef67abcdde8. This, however, causes the present problem. To fix, kill the workers immediately in all cases. This covers all cases: A subscription that doesn't have a replication slot must be disabled. It was either disabled in the same transaction, or it was already disabled before the current transaction, but then there shouldn't be any workers left and this won't make a difference. Reported-by: Arseny Sher &lt;a.sher@postgrespro.ru&gt; Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/87mv6av84w.fsf%40ars-thinkpad">https://www.postgresql.org/message-id/flat/87mv6av84w.fsf%40ars-thinkpad</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8edacab209957520423770851351ab4013cb0167">https://git.postgresql.org/pg/commitdiff/8edacab209957520423770851351ab4013cb0167</a></li>

<li>Message style fixes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/821fb8cdbf700a8aadbe12d5b46ca4e61be5a8a8">https://git.postgresql.org/pg/commitdiff/821fb8cdbf700a8aadbe12d5b46ca4e61be5a8a8</a></li>

<li>doc: Document function pointer source code style. as implemented in 1356f78ea93395c107cbc75dc923e29a0efccd8a <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3612019a7925012445af29b9ea7af84bd68a5932">https://git.postgresql.org/pg/commitdiff/3612019a7925012445af29b9ea7af84bd68a5932</a></li>

<li>pg_receivewal: Add --endpos option. This is primarily useful for making tests of this utility more deterministic, to avoid the complexity of starting pg_receivewal as a deamon in TAP tests. While this is less useful than the equivalent pg_recvlogical option, users can as well use it for example to enforce WAL streaming up to a end-of-backup position, to save only a minimal amount of WAL. Use this new option to stream WAL data in a deterministic way within a new set of TAP tests. Author: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6d9fa52645e71711410a66b5349df3be0dd49608">https://git.postgresql.org/pg/commitdiff/6d9fa52645e71711410a66b5349df3be0dd49608</a></li>

<li>Allow custom search filters to be configured for LDAP auth. Before, only filters of the form "(&lt;ldapsearchattribute&gt;=&lt;user&gt;)" could be used to search an LDAP server. Introduce ldapsearchfilter so that more general filters can be configured using patterns, like "(|(uid=$username)(mail=$username))" and "(&amp;(uid=$username) (objectClass=posixAccount))". Also allow search filters to be included in an LDAP URL. Author: Thomas Munro Reviewed-By: Peter Eisentraut, Mark Cave-Ayland, Magnus Hagander Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=0XTkYvMci0WRubZcf_1am8=gP=7oJErpsUfRYcKF2gwg@mail.gmail.com">https://postgr.es/m/CAEepm=0XTkYvMci0WRubZcf_1am8=gP=7oJErpsUfRYcKF2gwg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/83aaac41c66959a3ebaec7daadc4885b5f98f561">https://git.postgresql.org/pg/commitdiff/83aaac41c66959a3ebaec7daadc4885b5f98f561</a></li>

<li>doc: Document default scope in LDAP URL. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/58bd60995f1c7470c0542f591b303bcc586a5d5f">https://git.postgresql.org/pg/commitdiff/58bd60995f1c7470c0542f591b303bcc586a5d5f</a></li>

<li>doc: Remove useless marked section. This was left around when this text was moved from installation.sgml in c5ba11f8fb1701441b96a755ea410b96bfe36170. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2eeaa74b5ba20bc75bbaf10837a1ae966094d6cc">https://git.postgresql.org/pg/commitdiff/2eeaa74b5ba20bc75bbaf10837a1ae966094d6cc</a></li>

<li>Define LDAP_NO_ATTRS if necessary. Commit 83aaac41c66959a3ebaec7daadc4885b5f98f561 introduced the use of LDAP_NO_ATTRS to avoid requesting a dummy attribute when doing search+bind LDAP authentication. It turns out that not all LDAP implementations define that macro, but its value is fixed by the protocol so we can define it ourselves if it's missing. Author: Thomas Munro Reported-By: Ashutosh Sharma Discussion: <a target="_blank" href="https://postgr.es/m/CAE9k0Pm6FKCfPCiAr26-L_SMGOA7dT_k0%2B3pEbB8%2B-oT39xRpw%40mail.gmail.com">https://postgr.es/m/CAE9k0Pm6FKCfPCiAr26-L_SMGOA7dT_k0%2B3pEbB8%2B-oT39xRpw%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1a2fdc99a4b341feb6c01304e58f01dd0e095d9a">https://git.postgresql.org/pg/commitdiff/1a2fdc99a4b341feb6c01304e58f01dd0e095d9a</a></li>

<li>Improve error message in WAL sender. The previous error message when attempting to run a general SQL command in a physical replication WAL sender was a bit sloppy. Reported-by: Fujii Masao &lt;masao.fujii@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/61975d6c2cf5bbcf40a2e3160914ecad7a21df1a">https://git.postgresql.org/pg/commitdiff/61975d6c2cf5bbcf40a2e3160914ecad7a21df1a</a></li>

<li>doc: Remove incorrect SCRAM protocol documentation. The documentation claimed that one should send "pg_same_as_startup_message" as the user name in the SCRAM messages, but this did not match the actual implementation, so remove it. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/089880ba9af5f95e1a3b050874a90dbe5c33fd61">https://git.postgresql.org/pg/commitdiff/089880ba9af5f95e1a3b050874a90dbe5c33fd61</a></li>

<li>Fix bool/int type confusion. Using ++ on a bool variable doesn't work well when stdbool.h is in use. The original BSD code appears to use int here, so use that instead. Reviewed-by: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0ec2e908babfbfde83a3925680f06b16408739ff">https://git.postgresql.org/pg/commitdiff/0ec2e908babfbfde83a3925680f06b16408739ff</a></li>

<li>Remove BoolPtr type. Not used and doesn't seem useful. Reviewed-by: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8951c65df2701a4620ea43f12b9fbabdb653c164">https://git.postgresql.org/pg/commitdiff/8951c65df2701a4620ea43f12b9fbabdb653c164</a></li>

<li>Avoid use of bool in thread_test.c. It's not necessary for such a small program, and it causes unnecessary extra work to get the correct definition of bool, more so if we are going to introduce stdbool.h later. Reviewed-by: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0c4b879b74f891c19b3b431c5f34f94e50daa09b">https://git.postgresql.org/pg/commitdiff/0c4b879b74f891c19b3b431c5f34f94e50daa09b</a></li>

<li>adminpack: Add test suite. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b28dfa6d6f4e9a7a518d3c22b28375cad8a22272">https://git.postgresql.org/pg/commitdiff/b28dfa6d6f4e9a7a518d3c22b28375cad8a22272</a></li>

<li>pg_archivecleanup: Add test suite. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/98470fdfa72b78ec49dea9a25e658876e6e51989">https://git.postgresql.org/pg/commitdiff/98470fdfa72b78ec49dea9a25e658876e6e51989</a></li>

<li>passwordcheck: Add test suite. Also improve one error message. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/af7211e92dc2bba66f90de9e5bea6ae5fa914c61">https://git.postgresql.org/pg/commitdiff/af7211e92dc2bba66f90de9e5bea6ae5fa914c61</a></li>

<li>lo: Add test suite. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4cb89d830626d009ed6a4482bed3a141c5039a7c">https://git.postgresql.org/pg/commitdiff/4cb89d830626d009ed6a4482bed3a141c5039a7c</a></li>

<li>isn: Fix debug code. The ISN_DEBUG code did not compile. Fix that code, don't hide it behind an #ifdef, make it run when building with asserts, and make it error out instead of just logging if it fails. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9b6cb4650bc6a56114000678c1944afdb95f8333">https://git.postgresql.org/pg/commitdiff/9b6cb4650bc6a56114000678c1944afdb95f8333</a></li>

<li>fuzzystrmatch: Add test suite. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6141123a827a47d02b8b6c8eb97643c33aa4461d">https://git.postgresql.org/pg/commitdiff/6141123a827a47d02b8b6c8eb97643c33aa4461d</a></li>

<li>chkpass: Add test suite. Reviewed-by: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8423bf4f25ecd7afdd1d89adfbf29ea28992678f">https://git.postgresql.org/pg/commitdiff/8423bf4f25ecd7afdd1d89adfbf29ea28992678f</a></li>

<li>Add LDAP authentication test suite. Like the SSL test suite, this will not be run by default. Reviewed-by: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f0e60ee4bc04fd4865dbaf2139d50d6fe71c1bc3">https://git.postgresql.org/pg/commitdiff/f0e60ee4bc04fd4865dbaf2139d50d6fe71c1bc3</a></li>

<li>Apply pg_get_serial_sequence() to identity column sequences as well. Bug: #14813 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3012061b8653a57a098c85f06f1f80ec9576711b">https://git.postgresql.org/pg/commitdiff/3012061b8653a57a098c85f06f1f80ec9576711b</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Doc: update v10 release notes through today. Add item about number of times statement-level triggers will be fired. Rearrange the compatibility items into (what seems to me) a less random ordering. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/68ab9acd8557a9401a115a5369a14bf0a169e8e7">https://git.postgresql.org/pg/commitdiff/68ab9acd8557a9401a115a5369a14bf0a169e8e7</a></li>

<li>Allow rel_is_distinct_for() to look through RelabelType below OpExpr. This lets it do the right thing for, eg, varchar columns. Back-patch to 9.5 where this logic appeared. David Rowley, per report from Kim Rose Carlsen Discussion: <a target="_blank" href="https://postgr.es/m/VI1PR05MB17091F9A9876528055D6A827C76D0@VI1PR05MB1709.eurprd05.prod.outlook.com">https://postgr.es/m/VI1PR05MB17091F9A9876528055D6A827C76D0@VI1PR05MB1709.eurprd05.prod.outlook.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6f44fe7f121ac7c29c1ac8553e4e209f9c3bfbcb">https://git.postgresql.org/pg/commitdiff/6f44fe7f121ac7c29c1ac8553e4e209f9c3bfbcb</a></li>

<li>Fix possible dangling pointer dereference in trigger.c. AfterTriggerEndQuery correctly notes that the query_stack could get repalloc'd during a trigger firing, but it nonetheless passes the address of a query_stack entry to afterTriggerInvokeEvents, so that if such a repalloc occurs, afterTriggerInvokeEvents is already working with an obsolete dangling pointer while it scans the rest of the events. Oops. The only code at risk is its "delete_ok" cleanup code, so we can prevent unsafe behavior by passing delete_ok = false instead of true. However, that could have a significant performance penalty, because the point of passing delete_ok = true is to not have to re-scan possibly a large number of dead trigger events on the next time through the loop. There's more than one way to skin that cat, though. What we can do is delete all the "chunks" in the event list except the last one, since we know all events in them must be dead. Deleting the chunks is work we'd have had to do later in AfterTriggerEndQuery anyway, and it ends up saving rescanning of just about the same events we'd have gotten rid of with delete_ok = true. In v10 and HEAD, we also have to be careful to mop up any per-table after_trig_events pointers that would become dangling. This is slightly annoying, but I don't think that normal use-cases will traverse this code path often enough for it to be a performance problem. It's pretty hard to hit this in practice because of the unlikelihood of the query_stack getting resized at just the wrong time. Nonetheless, it's definitely a live bug of ancient standing, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/2891.1505419542@sss.pgh.pa.us">https://postgr.es/m/2891.1505419542@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/27c6619e9c8ff80cd78c7f66443aa005734cda90">https://git.postgresql.org/pg/commitdiff/27c6619e9c8ff80cd78c7f66443aa005734cda90</a></li>

<li>Prefer argument name over "$n" for the refname of a plpgsql argument. If a function argument has a name, use that as the "refname" of the PLpgSQL_datum representing the argument, instead of $n as before. This allows better error messages in some cases. Pavel Stehule, reviewed by Jeevan Chalke Discussion: <a target="_blank" href="https://postgr.es/m/CAFj8pRB9GyU2U1Sb2ssgP26DZ_yq-FYDfpvUvGQ=k4R=yOPVjg@mail.gmail.com">https://postgr.es/m/CAFj8pRB9GyU2U1Sb2ssgP26DZ_yq-FYDfpvUvGQ=k4R=yOPVjg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b8060e41b5994a3cffb3ececaab10ed39b8d5dfd">https://git.postgresql.org/pg/commitdiff/b8060e41b5994a3cffb3ececaab10ed39b8d5dfd</a></li>

<li>Fix RecursiveCopy.pm to cope with disappearing files. When copying from an active database tree, it's possible for files to be deleted after we see them in a readdir() scan but before we can open them. (Once we've got a file open, we don't expect any further errors from it getting unlinked, though.) Tweak RecursiveCopy so it can cope with this case, so as to avoid irreproducible test failures. Back-patch to 9.6 where this code was added. In v10 and HEAD, also remove unused "use RecursiveCopy" in one recovery test script. Michael Paquier and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/24621.1504924323@sss.pgh.pa.us">https://postgr.es/m/24621.1504924323@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e183530550dc1b73d24fb5ae7d84e85286e88ffb">https://git.postgresql.org/pg/commitdiff/e183530550dc1b73d24fb5ae7d84e85286e88ffb</a></li>

<li>Add psql variables to track success/failure of SQL queries. This patch adds ERROR, SQLSTATE, and ROW_COUNT, which are updated after every query, as well as LAST_ERROR_MESSAGE and LAST_ERROR_SQLSTATE, which are updated only when a query fails. The expected usage of these is for scripting. Fabien Coelho, reviewed by Pavel Stehule Discussion: <a target="_blank" href="https://postgr.es/m/alpine.DEB.2.20.1704042158020.12290@lancre">https://postgr.es/m/alpine.DEB.2.20.1704042158020.12290@lancre</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/69835bc8988812c960f4ed5aeee86b62ac73602a">https://git.postgresql.org/pg/commitdiff/69835bc8988812c960f4ed5aeee86b62ac73602a</a></li>

<li>Distinguish selectivity of &lt; from &lt;= and &gt; from &gt;=. Historically, the selectivity functions have simply not distinguished &lt; from &lt;=, or &gt; from &gt;=, arguing that the fraction of the population that satisfies the "=" aspect can be considered to be vanishingly small, if the comparison value isn't any of the most-common-values for the variable. (If it is, the code path that executes the operator against each MCV will take care of things properly.) But that isn't really true unless we're dealing with a continuum of variable values, and in practice we seldom are. If "x = const" would estimate a nonzero number of rows for a given const value, then it follows that we ought to estimate different numbers of rows for "x &lt; const" and "x &lt;= const", even if the const is not one of the MCVs. Handling this more honestly makes a significant difference in edge cases, such as the estimate for a tight range (x BETWEEN y AND z where y and z are close together). Hence, split scalarltsel into scalarltsel/scalarlesel, and similarly split scalargtsel into scalargtsel/scalargesel. Adjust &lt;= and &gt;= operator definitions to reference the new selectivity functions. Improve the core ineq_histogram_selectivity() function to make a correction for equality. (Along the way, I learned quite a bit about exactly why that function gives good answers, which I tried to memorialize in improved comments.) The corresponding join selectivity functions were, and remain, just stubs. But I chose to split them similarly, to avoid confusion and to prevent the need for doing this exercise again if someone ever makes them less stubby. In passing, change ineq_histogram_selectivity's clamp for extreme probability estimates so that it varies depending on the histogram size, instead of being hardwired at 0.0001. With the default histogram size of 100 entries, you still get the old clamp value, but bigger histograms should allow us to put more faith in edge values. Tom Lane, reviewed by Aleksander Alekseev and Kuntal Ghosh Discussion: <a target="_blank" href="https://postgr.es/m/12232.1499140410@sss.pgh.pa.us">https://postgr.es/m/12232.1499140410@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7d08ce286cd5854d58152e428c28636a616bdc42">https://git.postgresql.org/pg/commitdiff/7d08ce286cd5854d58152e428c28636a616bdc42</a></li>

<li>Update contrib/seg for new scalarlesel/scalargesel selectivity functions. I somehow missed this module in commit 7d08ce286. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/44ba2920644903d7dfceda810e5facdbcbab58a8">https://git.postgresql.org/pg/commitdiff/44ba2920644903d7dfceda810e5facdbcbab58a8</a></li>

<li>Adjust unstable regression test case. Test queries added by commit 69835bc89 are giving unexpected results on some smaller buildfarm critters. I think probably the seqscan logic is kicking in to cause the scans to not start at the beginning of the table. Add ORDER BY to make them be indexscans instead. Per buildfarm member chipmunk. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/76e134fefd7de0554536e1b8d45a1878f96cf9c0">https://git.postgresql.org/pg/commitdiff/76e134fefd7de0554536e1b8d45a1878f96cf9c0</a></li>

<li>Avoid duplicate typedef for SharedRecordTypmodRegistry. This isn't our usual solution for such problems, and older compilers (not terribly old, either) don't like it. Per buildfarm and local testing. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fba366555659fc1dc66a825196be3cc68640d289">https://git.postgresql.org/pg/commitdiff/fba366555659fc1dc66a825196be3cc68640d289</a></li>

<li>Don't use anonymous unions. Commit cc5f81366c36b3dd8f02bd9be1cf75b2cc8482bd introduced a language feature that is not acceptable to strict C89 compilers. Thomas Munro Per buildfarm. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/eaa4070543c2e36f0521f831d051265139875254">https://git.postgresql.org/pg/commitdiff/eaa4070543c2e36f0521f831d051265139875254</a></li>

<li>Get rid of shared_record_typmod_registry_worker_detach; it doesn't work. This code is unsafe, as proven by buildfarm failures, because it tries to access shared memory that might already be gone. It's also unnecessary, because we're about to exit the process anyway and so the record type cache should never be accessed again. The idea was to lay some foundations for someday recycling workers --- which would require attaching to a different shared tupdesc registry --- but that will require considerably more thought. In the meantime let's save some bytes by just removing the nonfunctional code. Problem identification, and proposal to fix by removing functionality from the detach function, by Thomas Munro. I went a bit further by removing the function altogether. Discussion: <a target="_blank" href="https://postgr.es/m/E1dsguX-00056N-9x@gemulon.postgresql.org">https://postgr.es/m/E1dsguX-00056N-9x@gemulon.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/71aa4801a8184eb422c6bf51631bda76f1011278">https://git.postgresql.org/pg/commitdiff/71aa4801a8184eb422c6bf51631bda76f1011278</a></li>

<li>Fix SQL-spec incompatibilities in new transition table feature. The standard says that all changes of the same kind (insert, update, or delete) caused in one table by a single SQL statement should be reported in a single transition table; and by that, they mean to include foreign key enforcement actions cascading from the statement's direct effects. It's also reasonable to conclude that if the standard had wCTEs, they would say that effects of wCTEs applying to the same table as each other or the outer statement should be merged into one transition table. We weren't doing it like that. Hence, arrange to merge tuples from multiple update actions into a single transition table as much as we can. There is a problem, which is that if the firing of FK enforcement triggers and after-row triggers with transition tables is interspersed, we might need to report more tuples after some triggers have already seen the transition table. It seems like a bad idea for the transition table to be mutable between trigger calls. There's no good way around this without a major redesign of the FK logic, so for now, resolve it by opening a new transition table each time this happens. Also, ensure that AFTER STATEMENT triggers fire just once per statement, or once per transition table when we're forced to make more than one. Previous versions of Postgres have allowed each FK enforcement query to cause an additional firing of the AFTER STATEMENT triggers for the referencing table, but that's certainly not per spec. (We're still doing multiple firings of BEFORE STATEMENT triggers, though; is that something worth changing?) Also, forbid using transition tables with column-specific UPDATE triggers. The spec requires such transition tables to show only the tuples for which the UPDATE trigger would have fired, which means maintaining multiple transition tables or else somehow filtering the contents at readout. Maybe someday we'll bother to support that option, but it looks like a lot of trouble for a marginal feature. The transition tables are now managed by the AfterTriggers data structures, rather than being directly the responsibility of ModifyTable nodes. This removes a subtransaction-lifespan memory leak introduced by my previous band-aid patch 3c4359521. In passing, refactor the AfterTriggers data structures to reduce the management overhead for them, by using arrays of structs rather than several parallel arrays for per-query-level and per-subtransaction state. I failed to resist the temptation to do some copy-editing on the SGML docs about triggers, above and beyond merely documenting the effects of this patch. Back-patch to v10, because we don't want the semantics of transition tables to change post-release. Patch by me, with help and review from Thomas Munro. Discussion: <a target="_blank" href="https://postgr.es/m/20170909064853.25630.12825@wrigleys.postgresql.org">https://postgr.es/m/20170909064853.25630.12825@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0f79440fb0b4c5a9baa9a95570c01828a9093802">https://git.postgresql.org/pg/commitdiff/0f79440fb0b4c5a9baa9a95570c01828a9093802</a></li>

<li>Doc: add example of transition table use in a trigger. I noticed that there were exactly no complete examples of use of a transition table in a trigger function, and no clear description of just how you'd do it either. Improve that. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/936df5ba80a46fb40bfc93da49a709cbc0aafe5e">https://git.postgresql.org/pg/commitdiff/936df5ba80a46fb40bfc93da49a709cbc0aafe5e</a></li>

<li>Fix bogus size calculation introduced by commit cc5f81366. The elements of RecordCacheArray are TupleDesc, not TupleDesc *. Those are actually the same size, so that this error is harmless, but it's still wrong --- and it might bite us someday, if TupleDesc ever became a struct, say. Per Coverity. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cad22075bc2ce9c1fbe61e8d3969d4dbdb5bc1f3">https://git.postgresql.org/pg/commitdiff/cad22075bc2ce9c1fbe61e8d3969d4dbdb5bc1f3</a></li>

<li>Ensure that BEFORE STATEMENT triggers fire the right number of times. Commit 0f79440fb introduced mechanism to keep AFTER STATEMENT triggers from firing more than once per statement, which was formerly possible if more than one FK enforcement action had to be applied to a given table. Add a similar mechanism for BEFORE STATEMENT triggers, so that we don't have the unexpected situation of firing BEFORE STATEMENT triggers more often than AFTER STATEMENT. As with the previous patch, back-patch to v10. Discussion: <a target="_blank" href="https://postgr.es/m/22315.1505584992@sss.pgh.pa.us">https://postgr.es/m/22315.1505584992@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fd31f9f033213e2ebf00b57ef837e1828c338fc4">https://git.postgresql.org/pg/commitdiff/fd31f9f033213e2ebf00b57ef837e1828c338fc4</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Constify numeric.c. This allows the compiler/linker to move the static variables to a read-only segment. Not all the signature changes are necessary, but it seems better to apply const in a consistent manner. Reviewed-By: Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/20170910232154.asgml44ji2b7lv3d@alap3.anarazel.de">https://postgr.es/m/20170910232154.asgml44ji2b7lv3d@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c1898c3e1e235ae35b4759d233253eff221b976a">https://git.postgresql.org/pg/commitdiff/c1898c3e1e235ae35b4759d233253eff221b976a</a></li>

<li>Introduce BYTES unit for GUCs. This is already useful for track_activity_query_size, and will further be used in a later commit making the WAL segment size configurable. Author: Beena Emerson Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAOG9ApEu8bXVwBxkOO9J7ZpM76TASK_vFMEEiCEjwhMmSLiaqQ@mail.gmail.com">https://postgr.es/m/CAOG9ApEu8bXVwBxkOO9J7ZpM76TASK_vFMEEiCEjwhMmSLiaqQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6e7baa322773ff8c79d4d8883c99fdeff5bfa679">https://git.postgresql.org/pg/commitdiff/6e7baa322773ff8c79d4d8883c99fdeff5bfa679</a></li>

<li>Properly check interrupts in execScan.c. During the development of d47cfef711 the CFI()s in ExecScan() were moved back and forth, ending up in the wrong place. Thus queries that largely spend their time in ExecScan(), and have neither projection nor a qual, can't be cancelled in a timely manner. Reported-By: Jeff Janes Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1weDXp8eLLPt9SO1LEUsJYYK9cScaGhLKpuN+WbYo9b5g@mail.gmail.com">https://postgr.es/m/CAMkU=1weDXp8eLLPt9SO1LEUsJYYK9cScaGhLKpuN+WbYo9b5g@mail.gmail.com</a> Backpatch: 10, as d47cfef711 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1ab973ab600dc4295dbbd38d1643f9bd26f81d8e">https://git.postgresql.org/pg/commitdiff/1ab973ab600dc4295dbbd38d1643f9bd26f81d8e</a></li>

<li>Perform only one ReadControlFile() during startup. Previously we read the control file in multiple places. But soon the segment size will be configurable and stored in the control file, and that needs to be available earlier than it currently is needed. Instead of adding yet another place where it's read, refactor things so there's a single processing of the control file during startup (in EXEC_BACKEND that's every individual backend's startup). Author: Andres Freund Discussion: <a target="_blank" href="http://postgr.es/m/20170913092828.aozd3gvvmw67gmyc@alap3.anarazel.de">http://postgr.es/m/20170913092828.aozd3gvvmw67gmyc@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8356753c212a5865469c9befc4cf1e637a9d8bbc">https://git.postgresql.org/pg/commitdiff/8356753c212a5865469c9befc4cf1e637a9d8bbc</a></li>

<li>Remove TupleDesc remapping logic from tqueue.c. With the introduction of a shared memory record typmod registry, it is no longer necessary to remap record typmods when sending tuples between backends so most of tqueue.c can be removed. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com">https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6b65a7fe62e129d5c2b85cd74d6a91d8f7564608">https://git.postgresql.org/pg/commitdiff/6b65a7fe62e129d5c2b85cd74d6a91d8f7564608</a></li>

<li>Add support for coordinating record typmods among parallel workers. Tuples can have type RECORDOID and a typmod number that identifies a blessed TupleDesc in a backend-private cache. To support the sharing of such tuples through shared memory and temporary files, provide a typmod registry in shared memory. To achieve that, introduce per-session DSM segments, created on demand when a backend first runs a parallel query. The per-session DSM segment has a table-of-contents just like the per-query DSM segment, and initially the contents are a shared record typmod registry and a DSA area to provide the space it needs to grow. State relating to the current session is accessed via a Session object reached through global variable CurrentSession that may require significant redesign further down the road as we figure out what else needs to be shared or remodelled. Author: Thomas Munro Reviewed-By: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com">https://postgr.es/m/CAEepm=0ZtQ-SpsgCyzzYpsXS6e=kZWqk3g5Ygn3MDV7A8dabUA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cc5f81366c36b3dd8f02bd9be1cf75b2cc8482bd">https://git.postgresql.org/pg/commitdiff/cc5f81366c36b3dd8f02bd9be1cf75b2cc8482bd</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>PG 10 release notes: update PL/Tcl functions item. Update attribution of PL/Tcl functions item from Jim Nasby to Karl Lehenbauer. Reported-by: Jim Nasby Discussion: <a target="_blank" href="https://postgr.es/m/ed42f3d6-4251-dabc-747f-1ff936763b2b@nasby.net">https://postgr.es/m/ed42f3d6-4251-dabc-747f-1ff936763b2b@nasby.net</a> Backpatch-through: 10 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3126433ae7464ffc25a8317110e79defaa3d8865">https://git.postgresql.org/pg/commitdiff/3126433ae7464ffc25a8317110e79defaa3d8865</a></li>

<li>PG 10 release notes: change trigger transition tables. Add attribution of trigger transition tables for Thomas Munro. Reported-by: Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2bDFgr4ut+1-QjKQY4MA=5ek8Ap3nyB19y2tpTL6xxtA@mail.gmail.com">https://postgr.es/m/CAEepm=2bDFgr4ut+1-QjKQY4MA=5ek8Ap3nyB19y2tpTL6xxtA@mail.gmail.com</a> Backpatch-through: 10 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/57e1c007939447ecf8c2d2aa2f507124613324ad">https://git.postgresql.org/pg/commitdiff/57e1c007939447ecf8c2d2aa2f507124613324ad</a></li>

<li>docs: improve pg_upgrade rsync instructions. This explains how rsync accomplishes updating standby servers and clarifies the instructions. Reported-by: Andreas Joseph Krogh Discussion: <a target="_blank" href="https://postgr.es/m/VisenaEmail.10.2b4049e43870bd16.15d898d696f@tc7-visena">https://postgr.es/m/VisenaEmail.10.2b4049e43870bd16.15d898d696f@tc7-visena</a> Backpatch-through: 9.5 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2d4a614e1ec34a746aca43d6a02aa3344dcf5fd4">https://git.postgresql.org/pg/commitdiff/2d4a614e1ec34a746aca43d6a02aa3344dcf5fd4</a></li>

<li>docs: improve pg_upgrade standby instructions. This makes it clear that pg_upgrade standby upgrade instructions should only be used in link mode, adds examples, and explains how rsync works with links. Reported-by: Andreas Joseph Krogh Discussion: <a target="_blank" href="https://postgr.es/m/VisenaEmail.6c.c0e592c5af4ef0a2.15e785dcb61@tc7-visena">https://postgr.es/m/VisenaEmail.6c.c0e592c5af4ef0a2.15e785dcb61@tc7-visena</a> Backpatch-through: 9.5 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9521ce4a7a1125385fb4de9689f345db594c516a">https://git.postgresql.org/pg/commitdiff/9521ce4a7a1125385fb4de9689f345db594c516a</a></li>

<li>docs: adjust "link mode" mention in pg_upgrade streaming steps. Backpatch-through: 9.5 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/82e367ddbfdf798ea8a30da15db3984017277342">https://git.postgresql.org/pg/commitdiff/82e367ddbfdf798ea8a30da15db3984017277342</a></li>

<li>docs: clarify pg_upgrade docs regarding standbys and rsync. Document that rsync is an _optional_ way to upgrade standbys, suggest rsync option --dry-run, and mention a way of upgrading one standby from another using rsync. Also clarify some instructions by specifying if they operate on the old or new clusters. Reported-by: Stephen Frost, Magnus Hagander Discussion: <a target="_blank" href="https://postgr.es/m/20170914191250.GB6595@momjian.us">https://postgr.es/m/20170914191250.GB6595@momjian.us</a> Backpatch-through: 9.5 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/04b64b8ddf9926950fe86d7d489825c46665dc01">https://git.postgresql.org/pg/commitdiff/04b64b8ddf9926950fe86d7d489825c46665dc01</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Fixed ECPG to correctly handle out-of-scope cursor declarations with pointers. or array variables. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/35e15688269a2af13f4cddff0c13536a9a42115d">https://git.postgresql.org/pg/commitdiff/35e15688269a2af13f4cddff0c13536a9a42115d</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Fix ordering in pg_dump of GRANTs. The order in which GRANTs are output is important as GRANTs which have been GRANT'd by individuals via WITH GRANT OPTION GRANTs have to come after the GRANT which included the WITH GRANT OPTION. This happens naturally in the backend during normal operation as we only change existing ACLs in-place, only add new ACLs to the end, and when removing an ACL we remove any which depend on it also. Also, adjust the comments in acl.h to make this clear. Unfortunately, the updates to pg_dump to handle initial privileges involved pulling apart ACLs and then combining them back together and could end up putting them back together in an invalid order, leading to dumps which wouldn't restore. Fix this by adjusting the queries used by pg_dump to ensure that the ACLs are rebuilt in the same order in which they were originally. Back-patch to 9.6 where the changes for initial privileges were done. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d2e40b310aea1050fd499f62f391329f2c331f6a">https://git.postgresql.org/pg/commitdiff/d2e40b310aea1050fd499f62f391329f2c331f6a</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Set partitioned_rels appropriately when UNION ALL is used. In most cases, this omission won't matter, because the appropriate locks will have been acquired during parse/plan or by AcquireExecutorLocks. But it's a bug all the same. Report by Ashutosh Bapat. Patch by me, reviewed by Amit Langote. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRdHb_ZnoDTuBXqrudWXh3H1ibLkr6nHsCFT96fSK4DXtA@mail.gmail.com">http://postgr.es/m/CAFjFpRdHb_ZnoDTuBXqrudWXh3H1ibLkr6nHsCFT96fSK4DXtA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1555566d9ee1a996a28cc4601840a67831112695">https://git.postgresql.org/pg/commitdiff/1555566d9ee1a996a28cc4601840a67831112695</a></li>

<li>Fix inconsistent capitalization. Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/a83a0899-19f5-594c-9aac-3ba0f16989a1@lab.ntt.co.jp">http://postgr.es/m/a83a0899-19f5-594c-9aac-3ba0f16989a1@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/42651bdd68a123544d5bfd0773a170aa3b443f1b">https://git.postgresql.org/pg/commitdiff/42651bdd68a123544d5bfd0773a170aa3b443f1b</a></li>

<li>Make RelationGetPartitionDispatchInfo expand depth-first. With this change, the order of leaf partitions as returned by RelationGetPartitionDispatchInfo should now be the same as the order used by expand_inherited_rtentry. This will make it simpler for future patches to match up the partition dispatch information with the planner data structures. The new code is also, in my opinion anyway, simpler and easier to understand. Amit Langote, reviewed by Amit Khandekar. I also reviewed and made a few cosmetic revisions. Discussion: <a target="_blank" href="http://postgr.es/m/d98d4761-5071-1762-501e-0e15047c714b@lab.ntt.co.jp">http://postgr.es/m/d98d4761-5071-1762-501e-0e15047c714b@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/77b6b5e9ceca04dbd6f0f6cd3fc881519acc8714">https://git.postgresql.org/pg/commitdiff/77b6b5e9ceca04dbd6f0f6cd3fc881519acc8714</a></li>

<li>Add missing tags to GetCommandLogLevel. Otherwise, log_statement = 'ddl' causes errors if those statement types are used. Michael Paquier, reviewed by Ashutosh Sharma Discussion: <a target="_blank" href="http://postgr.es/m/CAB7nPqStC3HkE76Q1MnHsVd1vF1Td9zXApzYadzDMyLMRkkGrw@mail.gmail.com">http://postgr.es/m/CAB7nPqStC3HkE76Q1MnHsVd1vF1Td9zXApzYadzDMyLMRkkGrw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81276fdd3931d286e62b86b2512a517de2ba2de8">https://git.postgresql.org/pg/commitdiff/81276fdd3931d286e62b86b2512a517de2ba2de8</a></li>

<li>Test coverage for CREATE/ALTER FOREIGN DATA WRAPPER .. HANDLER. Amit Langote, per a suggestion from Mark Dilger. Reviewed by Marc Dilger and Ashutosh Bapat. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpReL0oeN7SCpnsEPbqJhB2Bp1wnH1uvbOF_w6KEuv6ZXvg@mail.gmail.com">http://postgr.es/m/CAFjFpReL0oeN7SCpnsEPbqJhB2Bp1wnH1uvbOF_w6KEuv6ZXvg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/60cd2f8a2d1a1e763b2df015e2e660caa9e39a67">https://git.postgresql.org/pg/commitdiff/60cd2f8a2d1a1e763b2df015e2e660caa9e39a67</a></li>

<li>After a MINVALUE/MAXVALUE bound, allow only more of the same. In the old syntax, which used UNBOUNDED, we had a similar restriction, but commit d363d42bb9a4399a0207bd3b371c966e22e06bd3, which changed the syntax, eliminated it. Put it back. Patch by me, reviewed by Dean Rasheed. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmobs+pLPC27tS3gOpEAxAffHrq5w509cvkwTf9pF6cWYbg@mail.gmail.com">http://postgr.es/m/CA+Tgmobs+pLPC27tS3gOpEAxAffHrq5w509cvkwTf9pF6cWYbg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9361f6f54e3ff9bab84e80d4b1e15be79b48d60e">https://git.postgresql.org/pg/commitdiff/9361f6f54e3ff9bab84e80d4b1e15be79b48d60e</a></li>

<li>Expand partitioned table RTEs level by level, without flattening. Flattening the partitioning hierarchy at this stage makes various desirable optimizations difficult. The original use case for this patch was partition-wise join, which wants to match up the partitions in one partitioning hierarchy with those in another such hierarchy. However, it now seems that it will also be useful in making partition pruning work using the PartitionDesc rather than constraint exclusion, because with a flattened expansion, we have no easy way to figure out which PartitionDescs apply to which leaf tables in a multi-level partition hierarchy. As it turns out, we end up creating both rte-&gt;inh and !rte-&gt;inh RTEs for each intermediate partitioned table, just as we previously did for the root table. This seems unnecessary since the partitioned tables have no storage and are not scanned. We might want to go back and rejigger things so that no partitioned tables (including the parent) need !rte-&gt;inh RTEs, but that seems to require some adjustments not related to the core purpose of this patch. Ashutosh Bapat, reviewed by me and by Amit Langote. Some final adjustments by me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRd=1venqLL7oGU=C1dEkuvk2DJgvF+7uKbnPHaum1mvHQ@mail.gmail.com">http://postgr.es/m/CAFjFpRd=1venqLL7oGU=C1dEkuvk2DJgvF+7uKbnPHaum1mvHQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0a480502b092195a9b25a2f0f199a21d592a9c57">https://git.postgresql.org/pg/commitdiff/0a480502b092195a9b25a2f0f199a21d592a9c57</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>src/test/ldap: Fix test function in Linux port. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c29145f00df2aa873672ab9f1b3fc4ec6a0ec05d">https://git.postgresql.org/pg/commitdiff/c29145f00df2aa873672ab9f1b3fc4ec6a0ec05d</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Yuto Hayamizu sent in a patch to mitigate the fact that filter cost is estimated to be too high.</p>

<p>Etsuro Fujita sent in another revision of a patch to add support for tuple routing to foreign partitions.</p>

<p>Fabien COELHO sent in two more revisions of a patch to pgbench which fixes meta command only scripts.</p>

<p>Konstantin Knizhnik sent in two more revisions of a patch to implement autoprepare.</p>

<p>Nathan Bossart sent in four more revisions of a patch to allow VACUUM to take multiple tables and error out on duplicate columns in ANALYZE calls.</p>

<p>Michael Banck sent in two more revisions of a patch to add an option to create a replication slot in pg_basebackup if not yet present.</p>

<p>Andrey Borodin sent in two more revisions of a patch to allow GiST opcalsses without (de)compression functions.</p>

<p>Peter Geoghegan sent in another revision of a patch to remove replacement selection sort from the code.</p>

<p>Amit Kapila sent in a patch to change metapage usage for hash and b-tree indexes.</p>

<p>Micha&euml;l Paquier sent in a patch to remove wal_keep_segments as the default configuration in PostgresNode.pm.</p>

<p>Tom Lane sent in another revision of a patch to improve OR conditions on joined columns.</p>

<p>Tom Lane sent in another revision of a patch to fix an infelicity between eval_const_expressions and ScalarArrayOpExpr.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to add custom compression methods.</p>

<p>Yura Sokolov sent in another revision of a patch to improve compactify_tuples by implementing a bucket sort with one pass of stable prefix sort on high 8 bits of offset and insertion sort for buckets larger than 1 element, and simplify PageRepairFragmentation.</p>

<p>Simon Riggs sent in another revision of a patch to add toast_tuple_target().</p>

<p>Tomas Vondra sent in another revision of a patch to implement multivariate histograms and multivariate MCV lists.</p>

<p>Haribabu Kommi sent in two more revisions of a patch to implement a pg_stat_wal_write statistics view.</p>

<p>Elvis Pranskevichus sent in a patch to add a session_read_only GUC.</p>

<p>Fabien COELHO sent in a patch to fix a pgbench regression test failure.</p>

<p>Thomas Munro sent in another revision of a patch to support huge pages on Windows.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to fix wal_level_minimal.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to enable PL/pgsql functions to take composite types as arguments.</p>

<p>Hadi Moshayedi sent in a patch to call RelationDropStorage() for broader range of object drops.</p>

<p>Jing Wang sent in two more revisions of a patch to support to COMMENT ON DATABASE CURRENT_DATABASE.</p>

<p>Thomas Munro sent in another revision of a patch to allow custom search filters to be configured for LDAP auth, add LDAP authentication test suite, and add tests for ldapsearchfilter functionality.</p>

<p>Jeevan Ladhe and Amit Langote traded patches to optimize default partition scanning while adding new partition.</p>

<p>Ashutosh Bapat sent in a patch to ensure that the correct range table entry is being used in the planner for joins between declaratively partitioned tables.</p>

<p>Amit Langote sent in four more revisions of a patch to set pd_lower correctly in the GIN metapage, BRIN metapage, and SP-GiST metapage.</p>

<p>Tom Lane sent in another revision of a patch to enable making arrays of domains.</p>

<p>Amit Langote sent in another revision of a patch to add some enhancments for \d+ output of partitioned tables.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to add some new optional checks to PL/pgsql.</p>

<p>Vaishnavi Prabakaran sent in another revision of a patch to add batch/pipelining support to libpq.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to enable restricting maximum keep segments by replication slots.</p>

<p>Victor Drobny sent in another revision of a patch to add queryto_tsquery().</p>

<p>Thomas Munro sent in a patch to define LDAP_NO_ATTRS if necessary.</p>

<p>Peter Moser sent in another revision of a patch to add temporal processing primitives.</p>

<p>David Steele sent in another revision of a patch to refactor OpenFile() permissions.</p>

<p>Adrian Escoms sent in two revisions of a patch to fix some inconsistencies between pg_settings and postgresql.conf.</p>

<p>Pierre Ducroquet sent in another revision of a patch to allow a pg_basebackup when a tablespace is shared between two versions.</p>

<p>Andres Freund and Beena Emerson traded patches to allow setting the default WAL segment size at initdb time.</p>

<p>Pierre Ducroquet sent in another revision of a patch to port most calls of atoi(optarg) to strcol.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to fix a race between SELECT and ALTER TABLE NO INHERIT.</p>

<p>Amit Khandekar sent in two more revisions of a patch to implement hash partitioning.</p>

<p>Amul Sul sent in another revision of a patch to set the ctid.ip_blkid to InvalidBlockNumber while moving a tuple to the another partition.</p>

<p>Thomas Munro sent in two more revisions of a patch to improve the LDAP cleanup code in error paths and log diagnostic messages if errors occur during LDAP auth.</p>

<p>Ashutosh Bapat sent in a patch to reparamterize partial nestloop paths in response to a bug report.</p>

<p>Mark Rofail sent in another revision of a patch to implement foreign key arrays.</p>

<p>Peter Eisentraut and Masahiko Sawada traded patches to fix an issue where DROP SUBSCRIPTION hangs if sub is disabled in the same transaction.</p>

<p>Amit Kapila sent in another revision of a patch to make parallel paths include tlist cost.</p>

<p>Amit Kapila sent in another revision of a patch to ensure that GatherMerge pushes target list.</p>

<p>Andres Freund sent in a patch to improve catcache/syscache performance.</p>

<p>Andres Freund sent in a patch to fix a binary search bottleneck in fmgr_isbuiltin() by replacing it with a hash table.</p>

<p>Amit Langote sent in a patch to move some of the partitioning code to the executor.</p>

<p>Alexey Chernyshov sent in another revision of a patch to add citext_pattern_ops to the citext contrib module.</p>

<p>Thomas Munro sent in another revision of a patch to implement parallel hash.</p>

<p>Amit Langote sent in a patch to teach ATExecAttachPartition to skip validation in more cases.</p>

<p>Alexander Korotkov sent in two more revisions of a patch to implement 64-bit XIDs.</p>

<p>Haribabu Kommi sent in another revision of a patch to add the infrastructure for pluggable storage by changing the Create Access method to include storage handler, adding storage AM API hooks and related functions, addadding a storageam handler to the relation structure, adding a tuple visibility function, slot hooks, a tuple insert API and scan functions to the storage AM, and moving HeapScanDesc usage outside the heap.</p>

<p>Amul Sul sent in two more revisions of a patch to add hash partitioning.</p>

<p>Konstantin Knizhnik sent in three more revisions of a patch to add projection autotuning.</p>

<p>Andres Freund sent in two revisions of a patch to speed up pgstat_report_activity by moving multibyte-aware truncation to the read side.</p>

<p>Andres Freund sent in a patch to fix an issue where SendRowDescriptionMessage() was slow for queries with a lot of columns by adding more efficient functions to pqformat API, improving the performance of SendRowDescriptionMessage, adding an inline murmurhash32(int32) function, replacing the binary search in fmgr_isbuiltin with hashtable, adding a pg_noinline macro to c.h, improving sys/catcache performance, and improving the getBaseTypeAndTypemod() performance for builtin types.</p>

<p>Alexander Korotkov sent in two more revisions of a patch to implement incremental sort.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to implement partition-wise join for join between (declaratively) partitioned tables.</p>

<p>Peter Eisentraut sent in a patch to use stdbool.h instead of rolling our own.</p>

<p>Jeff Janes sent in a patch to fix issues around superuser as it pertains to foreign tables.</p>

<p>Amit Kapila sent in another revision of a patch to parallelize queries containing initplans.</p>

<p>Ivan Kartyshov sent in another revision of a patch to deal with long-running transactions on subscriber nodes.</p>

<p>Amit Langote sent in a patch to add some optimizer data structures for partitioned rels, make some planner-side changes for partition-pruning, make some interface changes for partition_bound_{cmp/bsearch}, implement get_partitions_for_keys(), and add more tests for the new partitioning-related planning code.</p>

<p>Dmitry Dolgov sent in another revision of a patch to implement generic type subscripting.</p>

<p>Thomas Munro sent in a patch to add coverage tests for partition-wise join for join between (declaratively) partitioned tables.</p>

<p>Chen Huajun sent in a patch to make pg_rewind to not copy useless WAL files.</p>

<p>Nikita Glukhov sent in another revision of a patch to add the SQL standard SQL/JSON feature.</p>

<p>David Rowley sent in a patch to fix join removal in subqueries.</p>

<p>Peter Geoghegan sent in a patch to allow ICU to use SortSupport on Windows with UTF-8.</p>

<p>Andres Freund sent in a patch to fix an issue which manifested on crash and restart.</p>

<p>Dilip Kumar sent in another revision of a patch to improve bitmap_cost.</p>

<p>Andreas Karlsson sent in another revision of a patch to support GnuTLS for SSL.</p>

<p>Rosser Schwarz sent in another revision of a patch to add --if-exists to pg_recvlogical.</p>

<p>Amit Kapila sent in a patch to fix worker startup failures.</p>

<p>Dilip Kumar sent in another revision of a patch to improve bitmap costing for lossy pages.</p>