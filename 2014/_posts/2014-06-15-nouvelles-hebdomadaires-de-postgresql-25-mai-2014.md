---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 mai 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/06/15/Nouvelles-hebdomadaires-de-PostgreSQL-25-mai-2014"
---


<p>F&eacute;licitations &agrave; Andres Freund pour son nouveau statut de commiteur PostgreSQL.</p>

<p>Les <em>Commitfests</em> pour la 9.5 commenceront les 15 juin, 15 ao&ucirc;t, 15 octobre, 15 d&eacute;cembre et 15 f&eacute;vrier. La Beta sera disponible en juin 2015.</p>

<p>La premi&egrave;re PgConf suisse aura lieu le 24 juin 2014 au HSR Hochschule f&uuml;r Technik Rapperswil. 

<a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></p>

<p>Le deuxi&egrave;me Hangout singapourien aura lieu le 28 mai 2014 &agrave; 16h30(SGT). RSVP&nbsp;: 

<a target="_blank" href="https://plus.google.com/u/0/events/cvpgsaauh8i1l8a7k22jqu5t0jo">https://plus.google.com/u/0/events/cvpgsaauh8i1l8a7k22jqu5t0jo</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>DBD::Pg version 3.2.1 (driver Postgres pour Perl): 

<a target="_blank" href="http://search.cpan.org/dist/DBD-Pg/">http://search.cpan.org/dist/DBD-Pg/</a></li>

<li>pg_repack 1.2, un utilitaire pour retirer les r&eacute;sidus et r&eacute;ordonner physiquement les <em>clustered index</em> en ligne&nbsp;: 

<a target="_blank" href="http://reorg.github.io/pg_repack/">http://reorg.github.io/pg_repack/</a></li>

<li>MAJ de s&eacute;curit&eacute; 2.0.6 et 2.1.13 pour PostGIS, le syst&egrave;me g&eacute;ographique de r&eacute;f&eacute;rence pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://postgis.net/2014/05/19/postgis-2.0.6_and_2.1.3">http://postgis.net/2014/05/19/postgis-2.0.6_and_2.1.3</a></li>

<li>tds_fdw 1.0.0, un <em>foreign data wrapper</em> pour MS-SQL Server et Sybase&nbsp;: 

<a target="_blank" href="https://github.com/GeoffMontee/tds_fdw/releases">https://github.com/GeoffMontee/tds_fdw/releases</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Char(14) et le PGday UK auront lieu les 8 &amp; 9 juillet 2014&nbsp;: 

<a target="_blank" href="http://www.char14.info">http://www.char14.info</a> <a target="_blank" href="http://postgresqlusergroup.org.uk/">http://postgresqlusergroup.org.uk/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>La PGConf europ&eacute;enne 2014 se tiendra &agrave; Madrid (Espagne) du 21 au 24 octobre, &agrave; l'h&ocirc;tel Miguel Angel&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/">http://2014.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140526041842.GB18543@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: improve 9.4 release notes. Patch by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d30d4b9d725211859c63a18e458015636d24b94">http://git.postgresql.org/pg/commitdiff/4d30d4b9d725211859c63a18e458015636d24b94</a></li>

<li>doc: 9.4 release note adjustements. Text from David G Johnston 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b05d1e3c0b2477797cd04b1e8dd1d3b91306e671">http://git.postgresql.org/pg/commitdiff/b05d1e3c0b2477797cd04b1e8dd1d3b91306e671</a></li>

<li>doc: adjust JSONB 9.4 release note item. Report by Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/009ca5e7821d742ed118a87c756c857895f3ffdd">http://git.postgresql.org/pg/commitdiff/009ca5e7821d742ed118a87c756c857895f3ffdd</a></li>

<li>doc: 9.4 release notes update for pg_bench line limit item. Report by David Johnston 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a61308fba6f474c840192052bca8c86df95927c">http://git.postgresql.org/pg/commitdiff/6a61308fba6f474c840192052bca8c86df95927c</a></li>

<li>doc: add ALTER TABLE lock level item as major 9.4 item. Report by Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e1b5d3f014206f6bdf3dc48d50ecec9dee10fd6">http://git.postgresql.org/pg/commitdiff/2e1b5d3f014206f6bdf3dc48d50ecec9dee10fd6</a></li>

<li>doc: link/caps fixes for 9.4 release notes. Report by Tomonari Katsumata 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37828e87aec2eb0c15655d4ad753644be851e59f">http://git.postgresql.org/pg/commitdiff/37828e87aec2eb0c15655d4ad753644be851e59f</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix non-C89-compatible coding in pgbench. C89 says that compound initializers may only contain constant expressions; a restriction violated by commit 89d00cbe. While we've had no actual field complaints about this, C89 is still the project standard, and it's not saving all that much code to break compatibility here. So let's adhere to the old restriction. In passing, replace a bunch of hardwired constants "256" with sizeof(target-variable), just because the latter is more readable and less breakable. And const-ify where possible. Back-patch to 9.3 where the nonportable code was added. Andres Freund and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e41cc470bb57a0f3a765fa44b77ef104b5a5a01e">http://git.postgresql.org/pg/commitdiff/e41cc470bb57a0f3a765fa44b77ef104b5a5a01e</a></li>

<li>Update obsolete comment. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0841ecd2518d4505b96132b764b918ab5d21ad4">http://git.postgresql.org/pg/commitdiff/a0841ecd2518d4505b96132b764b918ab5d21ad4</a></li>

<li>Prevent auto_explain from changing the output of a user's EXPLAIN. Commit af7914c6627bcf0b0ca614e9ce95d3f8056602bf, which introduced the EXPLAIN (TIMING) option, for some reason coded explain.c to look at planstate-&gt;instrument-&gt;need_timer rather than es-&gt;timing to decide whether to print timing info. However, the former flag might get set as a result of contrib/auto_explain wanting timing information. We certainly don't want activation of auto_explain to change user-visible statement behavior, so fix that. Also fix an independent bug introduced in the same patch: in the code path for a never-executed node with a machine-friendly output format, if timing was selected, it would fail to print the Actual Rows and Actual Loops items. Per bug #10404 from Tomonari Katsumata. Back-patch to 9.2 where the faulty code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e416830a296f440acd67afd8599dde5411021fc4">http://git.postgresql.org/pg/commitdiff/e416830a296f440acd67afd8599dde5411021fc4</a></li>

<li>Allow total number of transactions in pgbench to exceed INT_MAX. Change the total-transactions counters from int32 to int64 to accommodate cases where we do more than 2^31 transactions during a run. This patch does not change the INT_MAX limit on explicit "-t" parameters, but it does allow the product of the -t and -c parameters to exceed INT_MAX, or allow a -T limit that is large enough that more than 2^31 transactions can be completed. While pgbench did not actually fail in such cases, it did print an incorrect total-transactions count, and some of the derived numbers such as TPS would have been wrong as well. Tomas Vondra 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a65fb350717360c505de9df411024d47e55710b">http://git.postgresql.org/pg/commitdiff/9a65fb350717360c505de9df411024d47e55710b</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix incorrect column name in pg_stat_replication document. Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb56812144bb310f7cb2f63e53d6d58f30df95b5">http://git.postgresql.org/pg/commitdiff/eb56812144bb310f7cb2f63e53d6d58f30df95b5</a></li>

<li>Fix typo in JSON function document. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f097d70b7227c1f9aa2ed0af1d6deb05367ef657">http://git.postgresql.org/pg/commitdiff/f097d70b7227c1f9aa2ed0af1d6deb05367ef657</a></li>

<li>Fix typo in comment. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06db9cce22efeb2a2cffa69491dd576adb77b655">http://git.postgresql.org/pg/commitdiff/06db9cce22efeb2a2cffa69491dd576adb77b655</a></li>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19a683f69f4bc630ee04f2938e13e46397eb7a2d">http://git.postgresql.org/pg/commitdiff/19a683f69f4bc630ee04f2938e13e46397eb7a2d</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix backup-block numbering in redo of b-tree split. I got the backup block numbers off-by-one in the commit that changed the way incomplete-splits are handled. I blame the comments, which said "backup block 1" and "backup block 2", even though the backup blocks are numbered starting from 0, in the macros and functions used in replay. Fix the comments and the code. Per Jeff Janes' bug report about corruption caused by torn page writes. The incorrect code is new in git master, but backpatch the comment change down to 9.0, where the numbering in the redo-side macros was changed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c91a9b5a285e20e54cf90f3660ce51ce3a5c2ef4">http://git.postgresql.org/pg/commitdiff/c91a9b5a285e20e54cf90f3660ce51ce3a5c2ef4</a></li>

<li>Message style fixes to pg_recvlogical. Lowercase help statements. Use an existing message to reduce the number of strings to be translated. Euler Taveira 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e92f780123ca862970816d3fa70d3baf2fcbea4">http://git.postgresql.org/pg/commitdiff/4e92f780123ca862970816d3fa70d3baf2fcbea4</a></li>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51f41e8c0a0b9ce00734ed4702d16601cc55c280">http://git.postgresql.org/pg/commitdiff/51f41e8c0a0b9ce00734ed4702d16601cc55c280</a></li>

<li>Fix misc typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57b7e83b0d5e192c01e261b76ff0ed0ccd73c37c">http://git.postgresql.org/pg/commitdiff/57b7e83b0d5e192c01e261b76ff0ed0ccd73c37c</a></li>

<li>Fix error when trying to delete page with half-dead left sibling. The new page deletion code didn't cope with the case the target page's right sibling was marked half-dead. It failed a sanity check which checked that the downlinks in the parent page match the lower level, because a half-dead page has no downlink. To cope, check for that condition, and just give up on the deletion if it happens. The vacuum will finish the deletion of the half-dead page when it gets there, and on the next vacuum after that the empty can be deleted. Reported by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8da31837803e95f26642019d859c3309d1c125fa">http://git.postgresql.org/pg/commitdiff/8da31837803e95f26642019d859c3309d1c125fa</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix spurious tab character 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e12d7320ca494fd05134847e300feedb2d4a5969">http://git.postgresql.org/pg/commitdiff/e12d7320ca494fd05134847e300feedb2d4a5969</a></li>

<li>Small typo and formatting fixes in postgresql.conf.sample 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a5faaa90718b0ce259f43bfae8d629cc040a67c">http://git.postgresql.org/pg/commitdiff/0a5faaa90718b0ce259f43bfae8d629cc040a67c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove unnecessary cleanup code. This is all inside a block guarded by op == DSM_OP_ATTACH, so it can never be the case that op == DSM_OP_CREATE. Reported by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11ad3b35c25de6edcaa8a7695cb1d58650c546d3">http://git.postgresql.org/pg/commitdiff/11ad3b35c25de6edcaa8a7695cb1d58650c546d3</a></li>

<li>Andres Freund pushed</li>

<li>Silence a couple of spurious valgrind warnings in inval.c. Define padding bytes in SharedInvalidationMessage structs to be defined. Otherwise the sinvaladt.c ringbuffer, which is accessed by multiple processes, will cause spurious valgrind warnings about undefined memory being used. That's because valgrind remembers the undefined bytes from the last local process's store, not realizing that another process has written since, filling the previously uninitialized bytes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0564bbe7a1690f025f4424d5a12cb6af9d428c48">http://git.postgresql.org/pg/commitdiff/0564bbe7a1690f025f4424d5a12cb6af9d428c48</a></li>

<li>Don't allocate memory inside an Assert() iff in a critical section. HeapTupleHeaderGetCmax() asserts that it is only used if the tuple has been updated by the current transaction. That check is correct and sensible but requires allocating memory if xmax is a multixact. When wal_level is set to logical cmax needs to be included in a wal record , generated inside a critical section, which can trigger the assertion added in 4a170ee9e. Reported-By: Steve Singer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fa93530c878a0e23147a65f7d9a62802b22a995">http://git.postgresql.org/pg/commitdiff/9fa93530c878a0e23147a65f7d9a62802b22a995</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jeff Davis sent in a patch to add some Assert()s to the range types SP-GiST code.</li>

<li>Teodor Sigaev sent in a patch to fix a memory leak in SP-GiST.</li>

<li>Yuto HAYAMIZU sent in a patch intended to fix a bug where the postmaster crashes with assertion and LWLOCK_STATS enabled.</li>

<li>Michael Paquier sent in two revisions of a doc patch to add a mention of logical slots in CREATE_REPLICATION_SLOT for the replication protocol.</li>

<li>David Rowley sent in another revision of a patch to allow join removals for more join types.</li>

<li>Shigeru HANADA sent in a patch to fix worker_spi to run as non-dynamic background worker.</li>

<li>Vik Fearing sent in a patch to add SQL access to database attributes.</li>

<li>Ronan Dunklau sent in another revision of a patch to add IMPORT FOREIGN SCHEMA.</li>

<li>Anastasia Lubennikova sent in a patch to add index-only scans for GiST.</li>

<li>Michael Paquier and Andres Freund traded patches to fix an issue where pg_recvlogical is not accepting -I to specify start LSN position.</li>

<li>Matteo Beccati sent in a patch to replace OSSP-UUID for Linux and BSD.</li>

<li>Michael Paquier sent in a patch to fix some typos in Solution.pm, one of the MSVC scripts.</li>

</ul>