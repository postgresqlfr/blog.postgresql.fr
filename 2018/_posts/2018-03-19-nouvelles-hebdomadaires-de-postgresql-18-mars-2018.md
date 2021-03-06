---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 mars 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/03/19/Nouvelles-hebdomadaires-de-PostgreSQL-18-mars-2018"
---


<p>La <em>PGConf US 2018</em> aura lieu &agrave; Jersey City (New Jersey, &Eacute;tats-Unis) du 16 au 20 avril 2018&nbsp;: <a target="_blank" href="https://pgconf.org/conferences/2018">https://pgconf.org/conferences/2018</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pg_back 1.5, un script de sauvegarde pour PostgreSQL&nbsp;: <a target="_blank" href="https://github.com/orgrim/pg_back">https://github.com/orgrim/pg_back</a></li>

<li>pspg 1.0.0, un paginateur con&ccedil;u pour PostgreSQL&nbsp;: <a target="_blank" href="https://github.com/okbob/pspg">https://github.com/okbob/pspg</a></li>

<li>BDR 1.0.5, un syst&egrave;me de r&eacute;plication BDD bas&eacute; sur PostgreSQL et utilisant des WAL logiques (fonctionnant par ligne plut&ocirc;t que par page/bloc sur disque)&nbsp;: <a target="_blank" href="https://www.2ndquadrant.com/en/resources/bdr/">https://www.2ndquadrant.com/en/resources/bdr/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-03/">http://archives.postgresql.org/pgsql-jobs/2018-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PGConf APAC 2018 se tiendra &agrave; Singapour du 22 au 24 mars 2018&nbsp;: <a target="_blank" href="http://2018.pgconfapac.org/">http://2018.pgconfapac.org/</a></li>

<li>La conf&eacute;rence germanophone <em>PostgreSQL Conference 2018</em> aura lieu le 13 avril 2018 &agrave; Berlin&nbsp;: <a target="_blank" href="http://2018.pgconf.de/">http://2018.pgconf.de/</a></li>

<li>La <em>PGConfNepal 2018</em> se tiendra les 4 & 5 mai 2018 &agrave; l'universit&eacute; de Katmandou, Dulikhel, N&eacute;pal&nbsp;: <a target="_blank" href="https://postgresconf.org/conferences/Nepal2018">https://postgresconf.org/conferences/Nepal2018</a></li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. L'appel &agrave; conf&eacute;renciers court du 6 f&eacute;vrier au 14 avril 2018, et les inscriptions sont ouvertes du 6 f&eacute;vrier au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180318221506.GA24540@fetter.org">http://www.postgresql.org/message-id/20180318221506.GA24540@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Remove doc sentence no longer applicable. Amit Langote <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c4af6960e3d82968c51995937c12bd4885183caa">https://git.postgresql.org/pg/commitdiff/c4af6960e3d82968c51995937c12bd4885183caa</a></li>

<li>docs: Fix typo: a -&gt; an. David Rowley <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3beb46ae8118f64d94518ba105b5e5c79e2ce194">https://git.postgresql.org/pg/commitdiff/3beb46ae8118f64d94518ba105b5e5c79e2ce194</a></li>

<li>doc: Reword restriction on partition keys in unique indexes. New wording from David G. Johnston, who noticed the unreadable original also. Include his suggested test case as well. Fix a typo I noticed elsewhere while doing this. Discussion: <a target="_blank" href="https://postgr.es/m/CAKFQuwY4Ld7ecxL_KAmaxwt0FUu5VcPPN2L4dh+3BeYbrdBa5g@mail.gmail.com">https://postgr.es/m/CAKFQuwY4Ld7ecxL_KAmaxwt0FUu5VcPPN2L4dh+3BeYbrdBa5g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/63cbee6a786028790abc6ae9b9606366bae5e01d">https://git.postgresql.org/pg/commitdiff/63cbee6a786028790abc6ae9b9606366bae5e01d</a></li>

<li>Avoid having two PKs in a partition. If a table containing a primary key is attach as partition to a partitioned table which has a primary key with a different definition, we would happily create a second one in the new partition. Oops. It turns out that this is because an error check in DefineIndex is executed only if you tell it that it's being run by ALTER TABLE, and the original code here wasn't. Change it so that it does. Added a couple of test cases for this, also. A previously working test started to fail in a different way than before patch because the new check is called earlier; change the PK to plain UNIQUE so that the new behavior isn't invoked, so that the test continues to verify what we want it to verify. Reported by: Noriyoshi Shinoda Discussion: <a target="_blank" href="https://postgr.es/m/DF4PR8401MB102060EC2615EC9227CC73F7EEDF0@DF4PR8401MB1020.NAMPRD84.PROD.OUTLOOK.COM">https://postgr.es/m/DF4PR8401MB102060EC2615EC9227CC73F7EEDF0@DF4PR8401MB1020.NAMPRD84.PROD.OUTLOOK.COM</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1f8a3327a9db9a8a662fb39fdcde2337acffa68c">https://git.postgresql.org/pg/commitdiff/1f8a3327a9db9a8a662fb39fdcde2337acffa68c</a></li>

<li>Log when a BRIN autosummarization request fails. Autovacuum's 'workitem' request queue is of limited size, so requests can fail if they arrive more quickly than autovacuum can process them. Emit a log message when this happens, to provide better visibility of this. Backpatch to 10. While this represents an API change for AutoVacuumRequestWork, that function is not yet prepared to deal with external modules calling it, so there doesn't seem to be any risk (other than log spam, that is.) Author: Masahiko Sawada Reviewed-by: Fabr&iacute;zio Mello, Ildar Musin, &Aacute;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/CAD21AoB1HrQhp6_4rTyHN5kWEJCEsG8YzsjZNt-ctoXSn5Uisw@mail.gmail.com">https://postgr.es/m/CAD21AoB1HrQhp6_4rTyHN5kWEJCEsG8YzsjZNt-ctoXSn5Uisw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/484a4a08abe316212d67d84bb8705b06e44f862d">https://git.postgresql.org/pg/commitdiff/484a4a08abe316212d67d84bb8705b06e44f862d</a></li>

<li>logical replication: fix OID type mapping mechanism. The logical replication type map seems to have been misused by its only caller -- it would try to use the remote OID as input for local type routines, which unsurprisingly could result in bogus "cache lookup failed for type XYZ" errors, or random other type names being picked up if they happened to use the right OID. Fix that, changing Oid logicalrep_typmap_getid(Oid remoteid) to char *logicalrep_typmap_gettypname(Oid remoteid) which is more useful. If the remote type is not part of the typmap, this simply prints "unrecognized type" instead of choking trying to figure out -- a pointless exercise (because the only input for that comes from replication messages, which are not under the local node's control) and dangerous to boot, when called from within an error context callback. Once that is done, it comes to light that the local OID in the typmap entry was not being used for anything; the type/schema names are what we need, so remove local type OID from that struct. Once you do that, it becomes pointless to attach a callback to regular syscache invalidation. So remove that also. Reported-by: Dang Minh Huong Author: Masahiko Sawada Reviewed-by: &Aacute;lvaro Herrera, Petr Jel&iacute;nek, Dang Minh Huong, Atsushi Torikoshi Discussion: <a target="_blank" href="https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A6BE964@BPXM05GP.gisp.nec.co.jp">https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A6BE964@BPXM05GP.gisp.nec.co.jp</a> Discussion: <a target="_blank" href="https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A6C4B0A@BPXM05GP.gisp.nec.co.jp">https://postgr.es/m/75DB81BEEA95B445AE6D576A0A5C9E936A6C4B0A@BPXM05GP.gisp.nec.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/24c0a6c649768f428929e76dd7f5012ec9b93ce1">https://git.postgresql.org/pg/commitdiff/24c0a6c649768f428929e76dd7f5012ec9b93ce1</a></li>

<li>test_ddl_deparse: Don't use pg_class as source for a matview. Doing so causes a pg_upgrade of a database containing these objects to fail whenever pg_class changes. And it's pointless anyway: we have more interesting tables anyhow. Discussion: <a target="_blank" href="https://postgr.es/m/CAD5tBc+s8pW9WvH2+_z=B4x95FD4QuzZKcaMpff_9H4rS0VU1A@mail.gmail.com">https://postgr.es/m/CAD5tBc+s8pW9WvH2+_z=B4x95FD4QuzZKcaMpff_9H4rS0VU1A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e69f5e0efcaf3f26381e56a1507cdf401bf1bdfd">https://git.postgresql.org/pg/commitdiff/e69f5e0efcaf3f26381e56a1507cdf401bf1bdfd</a></li>

<li>restrict -&gt; pg_restrict. So that it works on MSVC, too. Author: Micha&euml;l Paquier Discussion: <a target="_blank" href="https://postgr.es/m/29889.1520968202@sss.pgh.pa.us">https://postgr.es/m/29889.1520968202@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8d1b805fcc57be47d3269a13eb01d993fe768295">https://git.postgresql.org/pg/commitdiff/8d1b805fcc57be47d3269a13eb01d993fe768295</a></li>

<li>test_ddl_deparse: rename matview. Should have done this in e69f5e0efca ... Per note from Tom Lane. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a446a1c70f65c6c68598c2160b530606fa1b5c38">https://git.postgresql.org/pg/commitdiff/a446a1c70f65c6c68598c2160b530606fa1b5c38</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix CREATE TABLE / LIKE with bigint identity column. CREATE TABLE / LIKE with a bigint identity column would fail on platforms where long is 32 bits. Copying the sequence values used makeInteger(), which would truncate the 64-bit sequence data to 32 bits. To fix, use makeFloat() instead, like the parser. (This does not actually make use of floats, but stores the values as strings.) Bug: #15096 Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/377b5ac4845c5ffbf992ee95c32d7d16d38b9081">https://git.postgresql.org/pg/commitdiff/377b5ac4845c5ffbf992ee95c32d7d16d38b9081</a></li>

<li>Change internal integer representation of Value node. A Value node would store an integer as a long. This causes needless portability risks, as long can be of varying sizes. Change it to use int instead. All code using this was already careful to only store 32-bit values anyway. Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6cf86f435472b27bbc5e22c713bca08aa2d94af7">https://git.postgresql.org/pg/commitdiff/6cf86f435472b27bbc5e22c713bca08aa2d94af7</a></li>

<li>Fix compiler warning. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8df5a1c868cc28f89ac6221cff8e2b5c952d0eb6">https://git.postgresql.org/pg/commitdiff/8df5a1c868cc28f89ac6221cff8e2b5c952d0eb6</a></li>

<li>Support INOUT arguments in procedures. In a top-level CALL, the values of INOUT arguments will be returned as a result row. In PL/pgSQL, the values are assigned back to the input arguments. In other languages, the same convention as for return a record from a function is used. That does not require any code changes in the PL implementations. Reviewed-by: Pavel Stehule &lt;pavel.stehule@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/33803f67f1c4cb88733cce61207bbf2bd5b599cc">https://git.postgresql.org/pg/commitdiff/33803f67f1c4cb88733cce61207bbf2bd5b599cc</a></li>

<li>Remove pg_class.relhaspkey. It is not used for anything internally, and it cannot be relied on for external uses, so it can just be removed. To correct recommended way to check for a primary key is in pg_index. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/b1a24c6c-6913-f89c-674e-0704f0ed69db@2ndquadrant.com">https://www.postgresql.org/message-id/flat/b1a24c6c-6913-f89c-674e-0704f0ed69db@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f66e8bf875f691db4c5d0173fc39b5a9c3ec969c">https://git.postgresql.org/pg/commitdiff/f66e8bf875f691db4c5d0173fc39b5a9c3ec969c</a></li>

<li>Fix more format truncation issues. Fix the warnings created by the compiler warning options -Wformat-overflow=2 -Wformat-truncation=2, supported since GCC 7. This is a more aggressive variant of the fixes in 6275f5d28a1577563f53f2171689d4f890a46881, which GCC 7 warned about by default. The issues are all harmless, but some dubious coding patterns are cleaned up. One issue that is of external interest is that BGW_MAXLEN is increased from 64 to 96. Apparently, the old value would cause the bgw_name of logical replication workers to be truncated in some circumstances. But this doesn't actually add those warning options. It appears that the warnings depend a bit on compilation and optimization options, so it would be annoying to have to keep up with that. This is more of a once-in-a-while cleanup. Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3a4b891964a531aa7d242a48fcd9e41379863ead">https://git.postgresql.org/pg/commitdiff/3a4b891964a531aa7d242a48fcd9e41379863ead</a></li>

<li>Move strtoint() to common. Several places used similar code to convert a string to an int, so take the function that we already had and make it globally available. Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/17bb62501787c56e0518e61db13a523d47afd724">https://git.postgresql.org/pg/commitdiff/17bb62501787c56e0518e61db13a523d47afd724</a></li>

<li>Add tests for reinit.c. This tests how the different forks of unlogged tables behave in crash recovery. Author: David Steele &lt;david@pgmasters.net&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/df411e7c664ee9a2395eb8c7a74ceddea818d489">https://git.postgresql.org/pg/commitdiff/df411e7c664ee9a2395eb8c7a74ceddea818d489</a></li>

<li>Rename TransactionChain functions. We call this thing a "transaction block" everywhere except in a few functions, where it is mysteriously called a "transaction chain". In the SQL standard, a transaction chain is something different. So rename these functions to match the common terminology. Reviewed-by: Alvaro Herrera &lt;alvherre@alvh.no-ip.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/04700b685f31508036456bea4d92533e5ceee9d6">https://git.postgresql.org/pg/commitdiff/04700b685f31508036456bea4d92533e5ceee9d6</a></li>

<li>Improve savepoint error messages. Include the savepoint name in the error message and rephrase it a bit to match common style. Reviewed-by: Alvaro Herrera &lt;alvherre@alvh.no-ip.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81148856b0310e7b0e578508ace44c0aefcbee07">https://git.postgresql.org/pg/commitdiff/81148856b0310e7b0e578508ace44c0aefcbee07</a></li>

<li>Change transaction state debug strings to match enum symbols. In some cases, these were different for no apparent reason, making debugging unnecessarily mysterious. Reviewed-by: Alvaro Herrera &lt;alvherre@alvh.no-ip.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4120864b9e0a2a119786a1839d7c0988d0523ec0">https://git.postgresql.org/pg/commitdiff/4120864b9e0a2a119786a1839d7c0988d0523ec0</a></li>

<li>Simplify parse representation of savepoint commands. Instead of embedding the savepoint name in a list and then requiring complex code to unpack it, just add another struct field to store it directly. Reviewed-by: Alvaro Herrera &lt;alvherre@alvh.no-ip.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ec87efde8dbc670467468860c5d577dc805dae5e">https://git.postgresql.org/pg/commitdiff/ec87efde8dbc670467468860c5d577dc805dae5e</a></li>

<li>Update function comments. After a6542a4b6870a019cd952d055d2e7af2da2fe102, some function comments were misplaced. Fix that. Reviewed-by: Alvaro Herrera &lt;alvherre@alvh.no-ip.org&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8d47a908626bf0800dc6a01f4ff2b2bc15cdaf86">https://git.postgresql.org/pg/commitdiff/8d47a908626bf0800dc6a01f4ff2b2bc15cdaf86</a></li>

<li>Add ssl_passphrase_command setting. This allows specifying an external command for prompting for or otherwise obtaining passphrases for SSL key files. This is useful because in many cases there is no TTY easily available during service startup. Also add a setting ssl_passphrase_command_supports_reload, which allows supporting SSL configuration reload even if SSL files need passphrases. Reviewed-by: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8a3d9425290ff5f6434990349886afae9e1c6008">https://git.postgresql.org/pg/commitdiff/8a3d9425290ff5f6434990349886afae9e1c6008</a></li>

<li>Set libpq sslcompression to off by default. Since SSL compression is no longer recommended, turn the default in libpq from on to off. OpenSSL 1.1.0 and many distribution packages already turn compression off by default, so such a server won't accept compression anyway. So this will mainly affect users of older OpenSSL installations. Also update the documentation to make clear that this setting is no longer recommended. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/595cf3b1-4ffe-7f05-6f72-f72b7afa7993%402ndquadrant.com">https://www.postgresql.org/message-id/flat/595cf3b1-4ffe-7f05-6f72-f72b7afa7993%402ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e3bdb2d92600ed45bd46aaf48309a436a9628218">https://git.postgresql.org/pg/commitdiff/e3bdb2d92600ed45bd46aaf48309a436a9628218</a></li>

</ul>

<p>Michael Meskes pushed:</p>

<ul>

<li>Set connection back to NULL after freeing it. Patch by Jeevan Ladhe &lt;jeevan.ladhe@enterprisedb.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b32fad52e94307261471d05a79c70f8382d71657">https://git.postgresql.org/pg/commitdiff/b32fad52e94307261471d05a79c70f8382d71657</a></li>

<li>Fix double frees in ecpg. Patch by Patrick Krecker &lt;patrick@judicata.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/db2fc801f66a70969cbdd5673ed9d02025c70695">https://git.postgresql.org/pg/commitdiff/db2fc801f66a70969cbdd5673ed9d02025c70695</a></li>

<li>Fixed compiler warnings in test case. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/20ba33dadedc46bad2eba5ca3c42bc500c36ade0">https://git.postgresql.org/pg/commitdiff/20ba33dadedc46bad2eba5ca3c42bc500c36ade0</a></li>

<li>Add Oracle like handling of char arrays. In some cases Oracle Pro*C handles char array differently than ECPG. This patch adds a Oracle compatibility mode to make ECPG behave like Pro*C. Patch by David Rader &lt;davidr@openscg.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3b7ab4380440d7b14ee390fabf39f6d87d7491e2">https://git.postgresql.org/pg/commitdiff/3b7ab4380440d7b14ee390fabf39f6d87d7491e2</a></li>

<li>Fix closing of incorrectly named cursor. Patch by "Shinoda, Noriyoshi" &lt;noriyoshi.shinoda@hpe.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e400840b1d92cb6a654c30a6aca68ba31eb8afbb">https://git.postgresql.org/pg/commitdiff/e400840b1d92cb6a654c30a6aca68ba31eb8afbb</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Avoid holding AutovacuumScheduleLock while rechecking table statistics. In databases with many tables, re-fetching the statistics takes some time, so that this behavior seriously decreases the available concurrency for multiple autovac workers. There's discussion afoot about more complete fixes, but a simple and back-patchable amelioration is to claim the table and release the lock before rechecking stats. If we find out there's no longer a reason to process the table, re-taking the lock to un-claim the table is cheap enough. (This patch is quite old, but got lost amongst a discussion of more aggressive fixes. It's not clear when or if such a fix will be accepted, but in any case it'd be unlikely to get back-patched. Let's do this now so we have some improvement for the back branches.) In passing, make the normal un-claim step take AutovacuumScheduleLock not AutovacuumLock, since that is what is documented to protect the wi_tableoid field. This wasn't an actual bug in view of the fact that readers of that field hold both locks, but it creates some concurrency penalty against operations that need only AutovacuumLock. Back-patch to all supported versions. Jeff Janes Discussion: <a target="_blank" href="https://postgr.es/m/26118.1520865816@sss.pgh.pa.us">https://postgr.es/m/26118.1520865816@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/38f7831d703be98aaece8af6625faeab5123a02c">https://git.postgresql.org/pg/commitdiff/38f7831d703be98aaece8af6625faeab5123a02c</a></li>

<li>When updating reltuples after ANALYZE, just extrapolate from our sample. The existing logic for updating pg_class.reltuples trusted the sampling results only for the pages ANALYZE actually visited, preferring to believe the previous tuple density estimate for all the unvisited pages. While there's some rationale for doing that for VACUUM (first that VACUUM is likely to visit a very nonrandom subset of pages, and second that we know for sure that the unvisited pages did not change), there's no such rationale for ANALYZE: by assumption, it's looked at an unbiased random sample of the table's pages. Furthermore, in a very large table ANALYZE will have examined only a tiny fraction of the table's pages, meaning it cannot slew the overall density estimate very far at all. In a table that is physically growing, this causes reltuples to increase nearly proportionally to the change in relpages, regardless of what is actually happening in the table. This has been observed to cause reltuples to become so much larger than reality that it effectively shuts off autovacuum, whose threshold for doing anything is a fraction of reltuples. (Getting to the point where that would happen seems to require some additional, not well understood, conditions. But it's undeniable that if reltuples is seriously off in a large table, ANALYZE alone will not fix it in any reasonable number of iterations, especially not if the table is continuing to grow.) Hence, restrict the use of vac_estimate_reltuples() to VACUUM alone, and in ANALYZE, just extrapolate from the sample pages on the assumption that they provide an accurate model of the whole table. If, by very bad luck, they don't, at least another ANALYZE will fix it; in the old logic a single bad estimate could cause problems indefinitely. In HEAD, let's remove vac_estimate_reltuples' is_analyze argument altogether; it was never used for anything and now it's totally pointless. But keep it in the back branches, in case any third-party code is calling this function. Per bug #15005. Back-patch to all supported branches. David Gould, reviewed by Alexander Kuzmenkov, cosmetic changes by me Discussion: <a target="_blank" href="https://postgr.es/m/20180117164916.3fdcf2e9@engels">https://postgr.es/m/20180117164916.3fdcf2e9@engels</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d04900de7d0cb5b6ecb6d5bf9fdb6f3105824f81">https://git.postgresql.org/pg/commitdiff/d04900de7d0cb5b6ecb6d5bf9fdb6f3105824f81</a></li>

<li>Clean up duplicate role and schema names in regression tests. Since these names are global, using the same ones in different regression tests creates a hazard of test failures if any two such scripts run concurrently. Let's establish a policy of not doing that. In the cases where a conflict existed, I chose to rename both sides: in principle one script or the other could've been left in possession of the common name, but that seems to just invite more trouble of the same sort. There are a number of places where scripts are using names that seem unduly generic, but in the absence of actual conflicts I left them alone. In addition, fix insert.sql's use of "someone_else" as a role name. That's a flat out violation of longstanding project policy, so back-patch that change to v10 where the usage appeared. The rest of this is just future-proofing, as no two of these scripts are actually run concurrently in the existing parallel_schedule. Conflicts of schema-qualified names also exist, but will be dealt with separately. Discussion: <a target="_blank" href="https://postgr.es/m/4627.1521070268@sss.pgh.pa.us">https://postgr.es/m/4627.1521070268@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fb7db40ad26c3384f81d471442743076ade3f82a">https://git.postgresql.org/pg/commitdiff/fb7db40ad26c3384f81d471442743076ade3f82a</a></li>

<li>Clean up duplicate table and function names in regression tests. Many of the objects we create during the regression tests are put in the public schema, so that using the same names in different regression tests creates a hazard of test failures if any two such scripts run concurrently. This patch cleans up a bunch of latent hazards of that sort, as well as two live hazards. The current situation in this regard is far worse than it was a year or two back, because practically all of the partitioning-related test cases have reused table names with enthusiasm. I despaired of cleaning up that mess within the five most-affected tests (create_table, alter_table, insert, update, inherit); fortunately those don't run concurrently. Other than partitioning problems, most of the issues boil down to using names like "foo", "bar", "tmp", etc, without thought for the fact that other test scripts might use similar names concurrently. I've made an effort to make all such names more specific. One of the live hazards was that commit 7421f4b8 caused with.sql to create a table named "test", conflicting with a similarly-named table in alter_table.sql; this was exposed in the buildfarm recently. The other one was that join.sql and transactions.sql both create tables named "foo" and "bar"; but join.sql's uses of those names date back only to December or so. Since commit 7421f4b8 was back-patched to v10, back-patch a minimal fix for that problem. The rest of this is just future-proofing. Discussion: <a target="_blank" href="https://postgr.es/m/4627.1521070268@sss.pgh.pa.us">https://postgr.es/m/4627.1521070268@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2cf8c7aa48559699f0607f5cb77b661156ad9750">https://git.postgresql.org/pg/commitdiff/2cf8c7aa48559699f0607f5cb77b661156ad9750</a></li>

<li>Fix msvc/ecpg_regression.proj for recent ECPG test additions. Commit 3b7ab4380 added some tests that require ecpg to be given the new "-C ORACLE" switch. Teach the MSVC build infrastructure about that. Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/8299.1521154647@sss.pgh.pa.us">https://postgr.es/m/8299.1521154647@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/84a3611cccfa41f29d14a5b1ab4bcc58fba9b25b">https://git.postgresql.org/pg/commitdiff/84a3611cccfa41f29d14a5b1ab4bcc58fba9b25b</a></li>

<li>Mop-up for letting VOID-returning SQL functions end with a SELECT. Part of the intent in commit fd1a421fe was to allow SQL functions that are declared to return VOID to contain anything, including an unrelated final SELECT, the same as SQL-language procedures can. However, the planner's inlining logic didn't get that memo. Fix it, and add some regression tests covering this area, since evidently we had none. In passing, clean up some typos in comments in create_function_3.sql, and get rid of its none-too-safe assumption that DROP CASCADE notice output is immutably ordered. Per report from Prabhat Sahu. Discussion: <a target="_blank" href="https://postgr.es/m/CANEvxPqxAj6nNHVcaXxpTeEFPmh24Whu+23emgjiuKrhJSct0A@mail.gmail.com">https://postgr.es/m/CANEvxPqxAj6nNHVcaXxpTeEFPmh24Whu+23emgjiuKrhJSct0A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/877cdf11eaa9cabcb9b1e3c1bef0760fe08efdc3">https://git.postgresql.org/pg/commitdiff/877cdf11eaa9cabcb9b1e3c1bef0760fe08efdc3</a></li>

<li>Doc: explicitly point out that enum values can't be dropped. This was not stated in so many words anywhere. Document it to make clear that it's a design limitation and not just an oversight or documentation omission. Discussion: <a target="_blank" href="https://postgr.es/m/152089733343.1222.6927268289645380498@wrigleys.postgresql.org">https://postgr.es/m/152089733343.1222.6927268289645380498@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/013c0baaddd9df7e1f940184a8ab8e478214b46c">https://git.postgresql.org/pg/commitdiff/013c0baaddd9df7e1f940184a8ab8e478214b46c</a></li>

<li>Fix query-lifespan memory leakage in repeatedly executed hash joins. ExecHashTableCreate allocated some memory that wasn't freed by ExecHashTableDestroy, specifically the per-hash-key function information. That's not a huge amount of data, but if one runs a query that repeats a hash join enough times, it builds up. Fix by arranging for the data in question to be kept in the hashtable's hashCxt instead of leaving it "loose" in the query-lifespan executor context. (This ensures that we'll also clean up anything that the hash functions allocate in fn_mcxt.) Per report from Amit Khandekar. It's been like this forever, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAJ3gD9cFofAWGvcxLOxDHC=B0hjtW8yGmUsF2hdGh97CM38=7g@mail.gmail.com">https://postgr.es/m/CAJ3gD9cFofAWGvcxLOxDHC=B0hjtW8yGmUsF2hdGh97CM38=7g@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9e17bdb8a525ff89c4535cd153dc0f2fa813ea59">https://git.postgresql.org/pg/commitdiff/9e17bdb8a525ff89c4535cd153dc0f2fa813ea59</a></li>

<li>Fix WHERE CURRENT OF when the referenced cursor uses an index-only scan. "UPDATE/DELETE WHERE CURRENT OF cursor_name" failed, with an error message like "cannot extract system attribute from virtual tuple", if the cursor was using a index-only scan for the target table. Fix it by digging the current TID out of the indexscan state. It seems likely that the same failure could occur for CustomScan plans and perhaps some FDW plan types, so that leaving this to be treated as an internal error with an obscure message isn't as good an idea as it first seemed. Hence, add a bit of heaptuple.c infrastructure to let us deliver a more on-topic message. I chose to make the message match what you get for the case where execCurrentOf can't identify the target scan node at all, "cursor "foo" is not a simply updatable scan of table "bar"". Perhaps it should be different, but we can always adjust that later. In the future, it might be nice to provide hooks that would let custom scan providers and/or FDWs deal with this in other ways; but that's not a suitable topic for a back-patchable bug fix. It's been like this all along, so back-patch to all supported branches. Yugo Nagata and Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/20180201013349.937dfc5f.nagata@sraoss.co.jp">https://postgr.es/m/20180201013349.937dfc5f.nagata@sraoss.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8f5ac440430ab1d4b0309a76df278caa87018beb">https://git.postgresql.org/pg/commitdiff/8f5ac440430ab1d4b0309a76df278caa87018beb</a></li>

<li>Fix overflow handling in plpgsql's integer FOR loops. The test to exit the loop if the integer control value would overflow an int32 turns out not to work on some ICC versions, as it's dependent on the assumption that the compiler will execute the code as written rather than "optimize" it. ICC lacks any equivalent of gcc's -fwrapv switch, so it was optimizing on the assumption of no integer overflow, and that breaks this. Rewrite into a form that in fact does not do any overflowing computations. Per Tomas Vondra and buildfarm member fulmar. It's been like this for a long time, although it was not till we added a regression test case covering the behavior (in commit dd2243f2a) that the problem became apparent. Back-patch to all supported versions. Discussion: <a target="_blank" href="https://postgr.es/m/50562fdc-0876-9843-c883-15b8566c7511@2ndquadrant.com">https://postgr.es/m/50562fdc-0876-9843-c883-15b8566c7511@2ndquadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2dbee9f19f6c6ac6c013f668611492486e623807">https://git.postgresql.org/pg/commitdiff/2dbee9f19f6c6ac6c013f668611492486e623807</a></li>

<li>Doc: note that statement-level view triggers require an INSTEAD OF trigger. If a view lacks an INSTEAD OF trigger, DML on it can only work by rewriting the command into a command on the underlying base table(s). Then we will fire triggers attached to those table(s), not those for the view. This seems appropriate from a consistency standpoint, but nowhere was the behavior explicitly documented, so let's do that. There was some discussion of throwing an error or warning if a statement trigger is created on a view without creating a row INSTEAD OF trigger. But a simple implementation of that would result in dump/restore ordering hazards. Given that it's been like this all along, and we hadn't heard a complaint till now, a documentation improvement seems sufficient. Per bug #15106 from Pu Qun. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/152083391168.1215.16892140713507052796@wrigleys.postgresql.org">https://postgr.es/m/152083391168.1215.16892140713507052796@wrigleys.postgresql.org</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a4678320471380e5159a8d6e89466d74d6ee1739">https://git.postgresql.org/pg/commitdiff/a4678320471380e5159a8d6e89466d74d6ee1739</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Let Parallel Append over simple UNION ALL have partial subpaths. A simple UNION ALL gets flattened into an appendrel of subquery RTEs, but up until now it's been impossible for the appendrel to use the partial paths for the subqueries, so we can implement the appendrel as a Parallel Append but only one with non-partial paths as children. There are three separate obstacles to removing that limitation. First, when planning a subquery, propagate any partial paths to the final_rel so that they are potentially visible to outer query levels (but not if they have initPlans attached, because that wouldn't be safe). Second, after planning a subquery, propagate any partial paths for the final_rel to the subquery RTE in the outer query level in the same way we do for non-partial paths. Third, teach finalize_plan() to account for the possibility that the fake parameter we use for rescan signalling when the plan contains a Gather (Merge) node may be propagated from an outer query level. Patch by me, reviewed and tested by Amit Khandekar, Rajkumar Raghuwanshi, and Ashutosh Bapat. Test cases based on examples by Rajkumar Raghuwanshi. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmoa6L9A1nNCk3aTDVZLZ4KkHDn1+tm7mFyFvP+uQPS7bAg@mail.gmail.com">http://postgr.es/m/CA+Tgmoa6L9A1nNCk3aTDVZLZ4KkHDn1+tm7mFyFvP+uQPS7bAg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0927d2f46ddd4cf7d6bf2cc84b3be923e0aedc52">https://git.postgresql.org/pg/commitdiff/0927d2f46ddd4cf7d6bf2cc84b3be923e0aedc52</a></li>

<li>Pass additional arguments to a couple of grouping-related functions. get_number_of_groups() and make_partial_grouping_target() currently fish information directly out of the PlannerInfo; in the former case, the target list, and in the latter case, the HAVING qual. This works fine if there's only one grouping relation, but if the pending patch for partition-wise aggregate gets committed, we'll have multiple grouping relations and must therefore use appropriately translated versions of these values for each one. To make that simpler, pass the values to be used as arguments. Jeevan Chalke. The larger patch series of which this patch is a part was also reviewed and tested by Antonin Houska, Rajkumar Raghuwanshi, David Rowley, Dilip Kumar, Konstantin Knizhnik, Pascal Legrand, Rafia Sabih, and me. Discussion: <a target="_blank" href="http://postgr.es/m/CAM2+6=UqFnFUypOvLdm5TgC+2M=-E0Q7_LOh0VDFFzmk2BBPzQ@mail.gmail.com">http://postgr.es/m/CAM2+6=UqFnFUypOvLdm5TgC+2M=-E0Q7_LOh0VDFFzmk2BBPzQ@mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/CAM2+6=W+L=C4yBqMrgrfTfNtbtmr4T53-hZhwbA2kvbZ9VMrrw@mail.gmail.com">http://postgr.es/m/CAM2+6=W+L=C4yBqMrgrfTfNtbtmr4T53-hZhwbA2kvbZ9VMrrw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/648a6c7bd815f98b35709bd56f9f1ca276b33ae6">https://git.postgresql.org/pg/commitdiff/648a6c7bd815f98b35709bd56f9f1ca276b33ae6</a></li>

<li>Split create_grouping_paths into degenerate and non-degenerate cases. There's no functional change here, or at least I hope there isn't, just code rearrangement. The rearrangement is motivated by partition-wise aggregate, which doesn't need to consider the degenerate case but wants to reuse the logic for the ordinary case. Based loosely on a patch from Ashutosh Bapat and Jeevan Chalke, but I whacked it around pretty heavily. The larger patch series of which this patch is a part was also reviewed and tested by Antonin Houska, Rajkumar Raghuwanshi, David Rowley, Dilip Kumar, Konstantin Knizhnik, Pascal Legrand, Rafia Sabih, and me. Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRewpqCmVkwvq6qrRjmbMDpN0CZvRRzjd8UvncczA3Oz1Q@mail.gmail.com">http://postgr.es/m/CAFjFpRewpqCmVkwvq6qrRjmbMDpN0CZvRRzjd8UvncczA3Oz1Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1466bcfa4a83ba88b55cfcebb99080800627613a">https://git.postgresql.org/pg/commitdiff/1466bcfa4a83ba88b55cfcebb99080800627613a</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Add COSTS off to two EXPLAIN using tests. Discussion: <a target="_blank" href="https://postgr.es/m/20180312222023.i4sgkbl4oqtstus3@alap3.anarazel.de">https://postgr.es/m/20180312222023.i4sgkbl4oqtstus3@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4f63e85eb149792492a703f01a3a5b89bf5509a7">https://git.postgresql.org/pg/commitdiff/4f63e85eb149792492a703f01a3a5b89bf5509a7</a></li>

<li>Expand AND/OR regression tests around NULL handling. Previously there were no tests verifying that NULL handling in AND/OR was correct (i.e. that NULL rather than false is returned if expression doesn't return true). Author: Andres Freund <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1e22166e5ebbc3df7684209657ea58ba880546d6">https://git.postgresql.org/pg/commitdiff/1e22166e5ebbc3df7684209657ea58ba880546d6</a></li>

<li>Add 'unit' parameter to ExplainProperty{Integer,Float}. This allows to deduplicate some existing code, but mainly avoids some duplication in upcoming commits. In passing, fix variable names indicating wrong unit (seconds instead of ms). Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20180314002740.cah3mdsonz5mxney@alap3.anarazel.de">https://postgr.es/m/20180314002740.cah3mdsonz5mxney@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7a50bb690b4837d29e715293c156cff2fc72885c">https://git.postgresql.org/pg/commitdiff/7a50bb690b4837d29e715293c156cff2fc72885c</a></li>

<li>Make ExplainPropertyInteger accept 64bit input, remove *Long variant. 'long' is not useful type across platforms, as it's 32bit on 32 bit platforms, and even on some 64bit platforms (e.g. windows) it's still only 32bits wide. As ExplainPropertyInteger should never be performance critical, change it to accept a 64bit argument and remove ExplainPropertyLong. Author: Andres Freund Discussion: <a target="_blank" href="https://postgr.es/m/20180314164832.n56wt7zcbpzi6zxe@alap3.anarazel.de">https://postgr.es/m/20180314164832.n56wt7zcbpzi6zxe@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f3e4b95edb6cbf0cd41dc9ff0c884bfdc425e6fb">https://git.postgresql.org/pg/commitdiff/f3e4b95edb6cbf0cd41dc9ff0c884bfdc425e6fb</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Fix comment for ExecProcessReturning. resultRelInfo is the argument for the function, not projectReturning. Author: Etsuro Fujita Discussion: <a target="_blank" href="https://postgr.es/m/5AA8E11E.1040609@lab.ntt.co.jp">https://postgr.es/m/5AA8E11E.1040609@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/97d18ce27da47de2de60de8dfca8e364e71ff6fe">https://git.postgresql.org/pg/commitdiff/97d18ce27da47de2de60de8dfca8e364e71ff6fe</a></li>

<li>Fix function-header comments in planner.c. In b5635948ab1, a couple of function header comments weren't changed, or weren't changed correctly, to reflect the arguments being passed into the functions. Specifically, get_number_of_groups() had the wrong argument name in the commit and create_grouping_paths() wasn't updated even though the arguments had been changed. The issue with create_grouping_paths() was noticed by Ashutosh Bapat, while I discovered the issue with get_number_of_groups() by looking to see if there were any similar issues from that commit. Discussion: <a target="_blank" href="https://postgr.es/m/CAFjFpRcbp4702jcp387PExt3fNCt62QJN8++DQGwBhsW6wRHWA@mail.gmail.com">https://postgr.es/m/CAFjFpRcbp4702jcp387PExt3fNCt62QJN8++DQGwBhsW6wRHWA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6b960aae90164cf85cf629e0af9286f97a9e51df">https://git.postgresql.org/pg/commitdiff/6b960aae90164cf85cf629e0af9286f97a9e51df</a></li>

<li>Fix typo in add_paths_to_append_rel(). The comment should have been referring to the number of workers, not the number of paths. Author: Ashutosh Bapat Discussion: <a target="_blank" href="https://postgr.es/m/CAFjFpRcbp4702jcp387PExt3fNCt62QJN8++DQGwBhsW6wRHWA@mail.gmail.com">https://postgr.es/m/CAFjFpRcbp4702jcp387PExt3fNCt62QJN8++DQGwBhsW6wRHWA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1f7b8967ef192fad75f72dd5eb12b188647b3670">https://git.postgresql.org/pg/commitdiff/1f7b8967ef192fad75f72dd5eb12b188647b3670</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix pg_recvlogical for pre-10 versions. In e170b8c8, protection against modified search_path was added. However, PostgreSQL versions prior to 10 does not accept SQL commands over a replication connection, so the protection would generate a syntax error. Since we cannot run SQL commands on it, we are also not vulnerable to the issue that e170b8c8 fixes, so we can just skip this command for older versions. Author: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8d2814f274def85f39fbe997d454b01628cb5667">https://git.postgresql.org/pg/commitdiff/8d2814f274def85f39fbe997d454b01628cb5667</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Ashutosh Bapat sent in another revision of a patch to implement an advanced partition matching algorithm for partition-wise join.</p>

<p>Amit Khandekar sent in another revision of a patch to fix a concurrency bug in UPDATE of partition-key.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to support a prefix operator for text with SP-GiST indexes.</p>

<p>Nikita Glukhov sent in another revision of a patch to add a JSONB TRANSFORM for PL/PythonU.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to protect syscache from bloating with negative cache entries.</p>

<p>Anthony Bykov and Nikita Glukhov traded patches to add a JSONB TRANSFORM for PL/Perl.</p>

<p>John Naylor sent in two more revisions of a patch to rationalize how bootstrap data is handled.</p>

<p>Ashutosh Bapat, Jeevan Chalke, and Robert Haas traded patches to implement partition-wise aggregation/grouping.</p>

<p>Amul Sul sent in another revision of a patch to restrict concurrent update/delete with UPDATE of partition key.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to reset the temp schema in order to unblock autovacuum, the blocking of which could lead to XID wraparound.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to use base backup exclusion filters to reduce data transferred with pg_rewind.</p>

<p>Oleg Ivanov sent in another revision of a patch to implement generic WAL compression.</p>

<p>David Steele sent in another revision of a patch to exclude temporary relations from base backup.</p>

<p>Peter Eisentraut sent in a patch to deal with some of the fallout from changing to stdbool.h.</p>

<p>David Steele sent in another revision of a patch to add regression tests for reinit.c.</p>

<p>Andrew Dunstan sent in two more revisions of a patch to make ALTER TABLE ... ADD COLUMN ... DEFAULT [not null] work faster.</p>

<p>Amit Kapila sent in another revision of a patch to implement predicate locking for hash indexes.</p>

<p>Ashutosh Bapat sent in another revision of a patch to fix an infelicity between parallel append and a simple UNION ALL.</p>

<p>Amit Langote sent in two more revisions of a patch to lay down infrastructure for faster partition pruning.</p>

<p>Robert Haas sent in another revision of a patch to enable parallel seq scan for slow functions.</p>

<p>Nathan Bossart sent in another revision of a patch to enable pg_upgrade to clusters with a different WAL segment size.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to implement custom compression methods.</p>

<p>Thomas Munro sent in a patch to fix a performance regression in REFRESH MATERIALIZED VIEW CONCURRENTLY.</p>

<p>Pavan Deolasee and Fabien COELHO traded patches to make inserts with mostly-monotonically increasing values faster.</p>

<p>Amit Langote sent in another revision of a patch to fix a bug where inserts into partitioned table could cause a crash.</p>

<p>David Steele sent in another revision of a patch to allow a configurable file mode mask.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to fix an issue that manifested as cascaded standby unable to start after a clean shutdown.</p>

<p>Nikita Glukhov sent in another revision of a patch to implement JSON_TABLE from SQL/JSON.</p>

<p>Nikita Glukhov sent in another revision of a patch to implement json_path from SQL/JSON.</p>

<p>Konstantin Knizhnik sent in a patch to make the implementation of WaitLatchOrSocket more efficient.</p>

<p>Kyotaro HORIGUCHI and Micha&euml;l Paquier traded patches to fix a bug where pg_get_functiondef forgets about most GUC_LIST_INPUT GUCs.</p>

<p>Nikita Glukhov sent in another revision of a patch to add functions from SQL/JSON.</p>

<p>Daniel Gustafsson and Michael Banck traded patches to make it possible to enable checksums online.</p>

<p>Peter Eisentraut sent in another revision of a patch to improve handling of heap rewrites in logical decoding.</p>

<p>Kyotaro HORIGUCHI sent in a patch to fix an issue where PQHost() has undefined behavior when the connect string contains both host and hostaddr types.</p>

<p>Micha&euml;l Paquier sent in a patch to fix a problem while setting the fpw with SIGHUP.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to add extra checks to PL/pgsql.</p>

<p>Pavel St&#283;hule sent in a patch to give PROCEDUREs in PL/pgsql the same parameter naming facilities functions have.</p>

<p>Shubham Barai sent in another revision of a patch to enable predicate locking on GIN indexes.</p>

<p>Peter Eisentraut sent in a patch to enable nested CALL with transactions.</p>

<p>Daniel Gustafsson sent in a patch to make links to external pages in the documents HTTPS where they had been HTTP.</p>

<p>Claudio Freire sent in another revision of a patch to enable VACUUM to use &gt;1GB of work_mem.</p>

<p>Fabien COELHO sent in another revision of a patch to manipulate random seeds in pgbench.</p>

<p>Daniel Gustafsson and Chapman Flack traded patches to zero the headers of unused pages after WAL switch, and add a test to ensure that WAL segment is zeroed out.</p>

<p>Hongyuan Ma sent in a patch against the performance farm code to add apps directory, model classes, and a db_tools directory.</p>

<p>Michael Banck sent in another revision of a patch to verify checksums during basebackups.</p>

<p>Huong Dangminh sent in a patch to fix an issue where it was possible to get a segmentation fault when using GROUPING SETS with all unsortable columns.</p>

<p>&Aacute;lvaro Herrera sent in another revision of a patch to implement ON CONFLICT DO UPDATE for partitioned tables.</p>

<p>Joe Wildish sent in another revision of a patch to implement SQL ASSERTIONs.</p>

<p>Alexander Kuzmenkov sent in a patch to fix an issue where IndexJoin had a memory problem using SP-GiST and boxes.</p>

<p>Isaac Morland sent in a PoC patch to make more flexible permissions for REFRESH MATERIALIZED VIEW.</p>