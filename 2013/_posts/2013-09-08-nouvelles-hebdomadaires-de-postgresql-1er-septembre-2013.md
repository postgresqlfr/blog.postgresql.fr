---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er septembre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/09/08/Nouvelles-hebdomadaires-de-PostgreSQL-1er-septembre-2013"
---


<p><em>Open Source Software for Business</em> (OSS4B) 2013 aura lieu &agrave; Prato (Toscane, Italie) les 19 &amp; 20 septembre. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://www.oss4b.it/">http://www.oss4b.it/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Mimeo 1.0.0, une extension de r&eacute;plication apportant de multiples moyens de r&eacute;plication avec un minimum de manipulations et de privil&egrave;ges&nbsp;: 

<a target="_blank" href="https://github.com/omniti-labs/mimeo">https://github.com/omniti-labs/mimeo</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-09/threads.php</a></li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>Postgres Open 2013</em> aura lieu &agrave; Chicago, (USA, Illinois) du 16 au 18 septembre&nbsp;: 

<a target="_blank" href="http://postgresopen.org/">http://postgresopen.org/</a></li>

<li>La <em>PostgreSQL Conference China</em> de 2103 aura lieu les 26 &amp; 27 octobre &agrave; Hangzhou. Informations&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/Pgconf_cn2013">https://wiki.postgresql.org/wiki/Pgconf_cn2013</a><br>

Inscriptions&nbsp;: 

<a target="_blank" href="http://bbs.pgsqldb.com/client/bm.php">http://bbs.pgsqldb.com/client/bm.php</a></li>

<li>Le PGDay italien (PGDay.IT) sera tenu &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgday.it/index.php/programma/call-for-papers-english/">http://2013.pgday.it/index.php/programma/call-for-papers-english/</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130902051139.GB10080@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Explain that ereport doesn't return for ERROR or higher levels. Christophe Pettus 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d00ab630668a15e86b584b39187ef3bf3154511">http://git.postgresql.org/pg/commitdiff/8d00ab630668a15e86b584b39187ef3bf3154511</a></li>

<li>Partially restore comments discussing enum renumbering hazards. As noted by Tom Lane, commit 813fb0315587d32e3b77af1051a0ef517d187763 was overly optimistic about how safe it is to concurrently change enumsortorder values under MVCC catalog scan semantics. Restore some of the previous text, with hopefully-correct adjustments for the new state of play. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9e2e2db5c2090a880028fd8c1debff474640f50">http://git.postgresql.org/pg/commitdiff/c9e2e2db5c2090a880028fd8c1debff474640f50</a></li>

<li>Allow discovery of whether a dynamic background worker is running. Using the infrastructure provided by this patch, it's possible either to wait for the startup of a dynamically-registered background worker, or to poll the status of such a worker without waiting. In either case, the current PID of the worker process can also be obtained. As usual, worker_spi is updated to demonstrate the new functionality. Patch by me. Review by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/090d0f2050647958865cb495dff74af7257d2bb4">http://git.postgresql.org/pg/commitdiff/090d0f2050647958865cb495dff74af7257d2bb4</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix some "translator:" comments mangled by pgindent 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/673b527534893a4a8adb3cdef52fc645c13598ce">http://git.postgresql.org/pg/commitdiff/673b527534893a4a8adb3cdef52fc645c13598ce</a></li>

<li>Initialize cached OID to Invalid in new hash entries. Andres Freund; bug detected by valgrind 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e246cfc95f020b5fcb20a1fb946efe77113edf00">http://git.postgresql.org/pg/commitdiff/e246cfc95f020b5fcb20a1fb946efe77113edf00</a></li>

<li>Make error wording more consistent 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9381cb5229da1f3556909585b38ada347d798161">http://git.postgresql.org/pg/commitdiff/9381cb5229da1f3556909585b38ada347d798161</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Accept multiple -I, -P, -T and -n options in pg_restore. We already did this for -t (--table) in 9.3, but missed the other similar options. For consistency, allow all of them to be specified multiple times. Unfortunately it's too late to sneak this into 9.3, so commit to master only. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da85fb4747ac0b7f787ef7a402adea2747e32d8e">http://git.postgresql.org/pg/commitdiff/da85fb4747ac0b7f787ef7a402adea2747e32d8e</a></li>

<li>Use a non-locking initial test in TAS_SPIN on x86_64. Testing done in 2011 by Tom Lane concluded that this is a win on Intel Xeons and AMD Opterons, but it was not changed back then, because of an old comment in tas() that suggested that it's a huge loss on older Opterons. However, didn't have separate TAS() and TAS_SPIN() macros back then, so the comment referred to doing a non-locked initial test even on the first access, in uncontended case. I don't have access to older Opterons, but I'm pretty sure that doing an initial unlocked test is unlikely to be a loss while spinning, even though it might be for the first access. We probably should do the same on 32-bit x86, but I'm afraid of changing it without any testing. Hence just add a note to the x86 implementation suggesting that we probably should do the same there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b03d196be055450c7260749f17347c2d066b4254">http://git.postgresql.org/pg/commitdiff/b03d196be055450c7260749f17347c2d066b4254</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reset the binary heap in MergeAppend rescans. Failing to do so can cause queries to return wrong data, error out or crash. This requires adding a new binaryheap_reset() method to binaryheap.c, but that probably should have been there anyway. Per bug #8410 from Terje Elde. Diagnosis and patch by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e2b71d2d0381f7acc820a2400580a1e3a6add8c">http://git.postgresql.org/pg/commitdiff/8e2b71d2d0381f7acc820a2400580a1e3a6add8c</a></li>

<li>Add test case for bug #8410. Per Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac2d0e464aef5bbef1308abf0154986b3982714d">http://git.postgresql.org/pg/commitdiff/ac2d0e464aef5bbef1308abf0154986b3982714d</a></li>

<li>Improve regression test for #8410. The previous version of the query disregarded the result of the MergeAppend instead of checking its results. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/abd3f8ca4b84707adba2e6d69413c724715cceb3">http://git.postgresql.org/pg/commitdiff/abd3f8ca4b84707adba2e6d69413c724715cceb3</a></li>

<li>Update 9.3 release notes. Some corrections, a lot of copy-editing. Set projected release date as 2013-09-09. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f49f8de074c37d7af5441f79e5569b9e463d0b09">http://git.postgresql.org/pg/commitdiff/f49f8de074c37d7af5441f79e5569b9e463d0b09</a></li>

<li>Update "Using EXPLAIN" documentation examples using current code. It seems like a good idea to update these examples since some fairly basic planner behaviors have changed in 9.3; notably that the startup cost for an indexscan plan node is no longer invariably estimated at 0.00. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/244c8b466a743d1ec18a7d841bf42669699b3b56">http://git.postgresql.org/pg/commitdiff/244c8b466a743d1ec18a7d841bf42669699b3b56</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Rowley and Vik Fearing traded patches to allow formatting in log_line_prefix.</li>

<li>Tarvi Pillessaar sent in another revision of a patch to add detail part for the "process x is still waiting for" lock message to show information about the lock holder and also show what the lock holder is actually doing.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of a patch to add UNNEST with multiple arguments and TABLE with multiple functions.</li>

<li>Pavel Stehule sent in another revision of a patch to improve NUMERIC performance.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Heikki Linnakangas sent a trio of patches to: separate pg_dump -E from PGCLIENTENCODING, set client_encoding='auto' in all the client utilities, as already done in psql, and use iconv(3) in pg_restore to do encoding conversion in the client.</li>

<li>Alvaro Herrera sent in a patch to move src/port/pgcheckdir.c to src/common/checkdir.c and add the shareable part of postmaster's current checkDataDir code into it, as pg_check_dir_permissions.</li>

<li>Andres Freund sent in a patch to error out when building pg_xlogdump with PGXS.</li>

<li>Dimitri Fontaine sent in three more revisions of a patch to implement extension templates.</li>

<li>Heikki Linnakangas sent in another revision of a patch to allow freezing without write I/O.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement row-level access controls.</li>

<li>Sawada Masahiko sent in another revision of a patch to fix synchronous standby priorities.</li>

<li>MauMau sent in another revision of a patch to clarify which versions of Solaris are supported.</li>

<li>Wang Shuo sent in a patch to allow disabling constraints by name and re-enabling them later.</li>

<li>Fujii Masao sent in a patch to allow compressing certain full-page writes.</li>

<li>KONDO Mitsumasa sent in a patch to add an option to pgbench which would checkpoint before starting the benchmark.</li>

<li>Andres Freund sent in more revisions of patches which are infrastructure for logical replication.</li>

<li>Tom Lane sent in a patch to enable variadic aggregates.</li>

<li>Peter Geoghegan sent in a patch to enable INSERT...ON DUPLICATE KEY IGNORE, and there was much rejoicing.</li>

<li>Stefan Kaltenbrunner sent in a patch to add an elevel argument to ProcessGUCArray and then call it with NOTICE in the case that check_function_bodies is true.</li>

<li>Jeff Janes sent in a patch to add the disable cost to the cost of materializing the inner scan when materialization is disabled.</li>

</ul>