---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 juin 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/06/11/Nouvelles-hebdomadaires-de-PostgreSQL-10-juin-2012"
---


<p>Mises &agrave; jour de s&eacute;curit&eacute;&nbsp;: 9.1.4, 9.0.8, 8.4.12 et 8.3.19. Mettez &agrave; jour d&egrave;s que possible&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/about/news/1398/">http://www.postgresql.org/about/news/1398/</a></p>

<p>F&eacute;licitations &agrave; Kevin Grittner, nouveau <em>committeur</em> PostgreSQL&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2012-06/msg00268.php">http://archives.postgresql.org/pgsql-hackers/2012-06/msg00268.php</a></p>

<p>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Les utilitaires PaGoDump &amp; PaGoRestore GUI sous Windows pour PG v9.1 sont disponibles&nbsp;: 

<a target="_blank" href="http://microolap.com/products/database/pagodump/download/">http://microolap.com/products/database/pagodump/download/</a></li>

<li>pgAdmin v1.14.3, un outil graphique, autonome et multi-plateforme d'administration de PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.pgadmin.org/development/changelog.php">http://www.pgadmin.org/development/changelog.php</a></li>

<li>Postgres-XC 1.0.0, un cluster multi-ma&icirc;tres, sym&eacute;trique, aux performances &eacute;volutives en &eacute;criture et bas&eacute; sur PostgreSQL&nbsp;: 

<a target="_blank" href="http://postgres-xc.sourceforge.net/docs/1_0/">http://postgres-xc.sourceforge.net/docs/1_0/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La conf&eacute;rence <em>PostgreSQL China 2012</em> aura lieu du 14 au 17 juin &agrave; P&eacute;kin&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Pgconfchina2012">http://wiki.postgresql.org/wiki/Pgconfchina2012</a></li>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Appel &agrave; conf&eacute;renciers et plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe</em> 2012 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; sponsors est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-06/msg00012.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix some more bugs in contrib/xml2's xslt_process(). It failed to check for error return from xsltApplyStylesheet(), as reported by Peter Gagarinov. (So far as I can tell, libxslt provides no convenient way to get a useful error message in failure cases. There might be some inconvenient way, but considering that this code is deprecated it's hard to get enthusiastic about putting lots of work into it. So I just made it say "failed to apply stylesheet", in line with the existing error checks.) While looking at the code I also noticed that the string returned by xsltSaveResultToString was never freed, resulting in a session-lifespan memory leak. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9b31e4859df5325b7d3d2cc94b0e907f1cf1d3e">http://git.postgresql.org/pg/commitdiff/d9b31e4859df5325b7d3d2cc94b0e907f1cf1d3e</a></li>

<li>Fix bogus handling of control characters in json_lex_string(). The original coding misbehaved if "char" is signed, and also made the extremely poor decision to print control characters literally when trying to complain about them. Report and patch by Shigeru Hanada. In passing, also fix core dump risk in report_parse_error() should the parse state be something other than what it expects. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3dd8e596812e3adb72aecafb23fbb6a30836c475">http://git.postgresql.org/pg/commitdiff/3dd8e596812e3adb72aecafb23fbb6a30836c475</a></li>

<li>Do unlocked prechecks in bufmgr.c loops that scan the whole buffer pool. DropRelFileNodeBuffers, DropDatabaseBuffers, FlushRelationBuffers, and FlushDatabaseBuffers have to scan the whole shared_buffers pool because we have no index structure that would find the target buffers any more efficiently than that. This gets expensive with large NBuffers. We can shave some cycles from these loops by prechecking to see if the current buffer is interesting before we acquire the buffer header lock. Ordinarily such a test would be unsafe, but in these cases it should be safe because we are already assuming that the caller holds a lock that prevents any new target pages from being loaded into the buffer pool concurrently. Therefore, no buffer tag should be changing to a value of interest, only away from a value of interest. So a false negative match is impossible, while a false positive is safe because we'll recheck after acquiring the buffer lock. Initial testing says that this speeds these loops by a factor of 2X to 3X on common Intel hardware. Patch for DropRelFileNodeBuffers by Jeff Janes (based on an idea of Heikki's); extended to the remaining sequential scans by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8d029a30b5a5fb74b848a8697b1dfa3f66d9697">http://git.postgresql.org/pg/commitdiff/e8d029a30b5a5fb74b848a8697b1dfa3f66d9697</a></li>

<li>Scan the buffer pool just once, not once per fork, during relation drop. This provides a speedup of about 4X when NBuffers is large enough. There is also a useful reduction in sinval traffic, since we only do CacheInvalidateSmgr() once not once per fork. Simon Riggs, reviewed and somewhat revised by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ece01aae479227d9836294b287d872c5a6146a11">http://git.postgresql.org/pg/commitdiff/ece01aae479227d9836294b287d872c5a6146a11</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Backpatch error message fix from 81f6bbe8ade8c90f23f9286ca9ca726d3e0e310f. Without this, pg_basebackup doesn't tell you why it failed when for example there is a file in the data directory that the backend doesn't have permissions to read. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c3532876f8360df10692baf77a0b79c41ee001e">http://git.postgresql.org/pg/commitdiff/5c3532876f8360df10692baf77a0b79c41ee001e</a></li>

<li>Add example of archive_command to use with pg_receivexlog 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/778201200b4a5b287fe931e20ae804e8398d4872">http://git.postgresql.org/pg/commitdiff/778201200b4a5b287fe931e20ae804e8398d4872</a></li>

<li>Fix typo. Noted by Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e57c2c5b2e8fdd1e233454b21c60e1600464728">http://git.postgresql.org/pg/commitdiff/1e57c2c5b2e8fdd1e233454b21c60e1600464728</a></li>

<li>Use strerror(errno) instead of %m. Found by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92135ea0ed8f75daa86cd94301cedc7f5b714e3c">http://git.postgresql.org/pg/commitdiff/92135ea0ed8f75daa86cd94301cedc7f5b714e3c</a></li>

<li>Error message capitalization fix 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c1abc00fa1f469a2805e88abac0fa8b094b4427">http://git.postgresql.org/pg/commitdiff/7c1abc00fa1f469a2805e88abac0fa8b094b4427</a></li>

<li>Fix pg_basebackup/pg_receivexlog for floating point timestamps. Since the replication protocol deals with TimestampTz, we need to care for the floating point case as well in the frontend tools. Fujii Masao, with changes from Magnus Hagander 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0b4c5a20a5e5076225ba440a921f4b46f1159ee">http://git.postgresql.org/pg/commitdiff/a0b4c5a20a5e5076225ba440a921f4b46f1159ee</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix more crash-safe visibility map bugs, and improve comments. In lazy_scan_heap, we could issue bogus warnings about incorrect information in the visibility map, because we checked the visibility map bit before locking the heap page, creating a race condition. Fix by rechecking the visibility map bit before we complain. Rejigger some related logic so that we rely on the possibly-outdated all_visible_according_to_vm value as little as possible. In heap_multi_insert, it's not safe to clear the visibility map bit before beginning the critical section. The visibility map is not crash-safe unless we treat clearing the bit as a critical operation. Specifically, if the transaction were to error out after we set the bit and before entering the critical section, we could end up writing the heap page to disk (with the bit cleared) and crashing before the visibility map page made it to disk. That would be bad. heap_insert has this correct, but somehow the order of operations got rearranged when heap_multi_insert was added. Also, add some more comments to visibilitymap_test, lazy_scan_heap, and IndexOnlyNext, expounding on concurrency issues. Per extensive code review by Andres Freund, and further review by Tom Lane, who also made the original report about the bogus warnings. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b50991eedb458a81d875d049f48fb62ab1685c0d">http://git.postgresql.org/pg/commitdiff/b50991eedb458a81d875d049f48fb62ab1685c0d</a></li>

<li>When using libpq URI syntax, error out on invalid parameter names. Dan Farina 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b5548a3d524e3b37d49f79f707d2119ecdfa303">http://git.postgresql.org/pg/commitdiff/3b5548a3d524e3b37d49f79f707d2119ecdfa303</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Wake WALSender to reduce data loss at failover for async commit. WALSender now woken up after each background flush by WALwriter, avoiding multi-second replication delay for an all-async commit workload. Replication delay reduced from 7s with default settings to 200ms and often much less, allowing significantly reduced data loss at failover. Andres Freund and Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c8a4e9be2730342cbca85150a2a9d876aa77ff6">http://git.postgresql.org/pg/commitdiff/2c8a4e9be2730342cbca85150a2a9d876aa77ff6</a></li>

<li>Fix bug in early startup of Hot Standby with subtransactions. When HS startup is deferred because of overflowed subtransactions, ensure that we re-initialize KnownAssignedXids for when both existing and incoming snapshots have non-zero qualifying xids. Fixes bug #6661 reported by Valentine Gogichashvili. Analysis and fix by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37255705399b57b2e413814799f0bc9b94fda14a">http://git.postgresql.org/pg/commitdiff/37255705399b57b2e413814799f0bc9b94fda14a</a></li>

<li>Add ERROR msg for GLOBAL/LOCAL TEMP is not yet implemented 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72335a20156b19be3a53ef686e0b31140c6f38e5">http://git.postgresql.org/pg/commitdiff/72335a20156b19be3a53ef686e0b31140c6f38e5</a></li>

<li>Revert error message on GLOBAL/LOCAL pending further discussion 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28ac7972873bd314d4837807396fe44571b5cb50">http://git.postgresql.org/pg/commitdiff/28ac7972873bd314d4837807396fe44571b5cb50</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d0109bd2776ce918821f360e951270caa96ba8a">http://git.postgresql.org/pg/commitdiff/5d0109bd2776ce918821f360e951270caa96ba8a</a></li>

<li>Documentation spell and markup checking 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5baf6da71701abcb76487d9de68f7d7dc6c365e9">http://git.postgresql.org/pg/commitdiff/5baf6da71701abcb76487d9de68f7d7dc6c365e9</a></li>

<li>Documentation style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1438cf5c6f54d0a887c7fbef91163efda5daa0f">http://git.postgresql.org/pg/commitdiff/f1438cf5c6f54d0a887c7fbef91163efda5daa0f</a></li>

<li>Make include files work without having to include other ones first 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8570114dc1a7a655043d94a6eb1ebf295f1d3647">http://git.postgresql.org/pg/commitdiff/8570114dc1a7a655043d94a6eb1ebf295f1d3647</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update pgindent install instructions and update typedef list. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60801944fa105252b48ea5688d47dfc05c695042">http://git.postgresql.org/pg/commitdiff/60801944fa105252b48ea5688d47dfc05c695042</a></li>

<li>Run pgindent on 9.2 source tree in preparation for first 9.3 commit-fest. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/927d61eeff78363ea3938c818d07e511ebaf75cf">http://git.postgresql.org/pg/commitdiff/927d61eeff78363ea3938c818d07e511ebaf75cf</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in another revision of the patch to fix incorrect handling of the timeout in pg_receivexlog.</li>

<li>Ants Aasma sent in another revision of the lockfree getbuffer patch.</li>

<li>Robert Haas sent in a patch to remove the heap check when creating objects in pg_catalog.</li>

<li>Kyotaro HORIGUCHI sent in a patch to add a new WalRcvStarted() function to check whether streaming replication is on and to determine whether to delay checkpoints using GetLogReplayRecPtr() when WalRcvStarted() it returns true.</li>

<li>Robert Haas sent in two revisions of a patch to add a log_newpage_buffer() function and reshuffle responsibility for using it.</li>

<li>Kyotaro HORIGUCHI sent in a patch to skip checkpoint on promoting from streaming replication.</li>

<li>Amit Kapila sent in a WIP patch to provide a fallback_application_name in pgbench.</li>

<li>Dean Rasheed sent in a patch to improve the error hint from DROP FUNCTION in the case of a conflicting function by including the command which would allow dropping the old function in same.</li>

<li>Noah Misch sent in a patch which does the unlink() for DROP after releasing existing locks.</li>

<li>Jeff Janes sent in a patch to fix cases of quadratic behavior in pg_dump on a large number of objects.</li>

</ul>