---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 décembre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/01/01/Nouvelles-hebdomadaires-de-PostgreSQL-22-décembre-2013"
---


<p>L'appel &agrave; conf&eacute;renciers pour la PGConf NYC 2014 court jusqu'au 10 janvier 2014. Les notifications seront envoy&eacute;es le 15 janvier&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>psqlODBC 09.03.0100&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/ftp/odbc/versions/">http://www.postgresql.org/ftp/odbc/versions/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-12/threads.php</a></li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>FOSDEM PGDay, une conf&eacute;rence d'une journ&eacute;e, tenue avant le FOSDEM &agrave; Bruxelles, aura lieu le 31 janvier 2014. D&eacute;tails&nbsp;: 

<a target="_blank" href="http://fosdem2014.pgconf.eu/">http://fosdem2014.pgconf.eu/</a> <a target="_blank" href="http://fosdem2014.pgconf.eu/registration/">http://fosdem2014.pgconf.eu/registration/</a></li>

<li>La 7<sup>&egrave;me</sup> conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>" (P2D2) aura lieu le 6 f&eacute;vrier 2014 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Infos en langue tch&egrave;que ci-apr&egrave;s. L'appel &agrave; conf&eacute;renciers court jusqu'au 3 janvier 2014&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGCon 2014 est lanc&eacute;. Date limite&nbsp;: 19 janvier 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20131223061554.GD15630@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Mark variables 'static' where possible. Move GinFuzzySearchLimit to ginget.c. Per "clang -Wmissing-variable-declarations" output, posted by Andres Freund. I didn't silence all those warnings, though, only the most obvious cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30b96549ab41ce23399256d4ea9723a05c139558">http://git.postgresql.org/pg/commitdiff/30b96549ab41ce23399256d4ea9723a05c139558</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rework tuple freezing protocol. Tuple freezing was broken in connection to MultiXactIds; commit 8e53ae025de9 tried to fix it, but didn't go far enough. As noted by Noah Misch, freezing a tuple whose Xmax is a multi containing an aborted update might cause locks in the multi to go ignored by later transactions. This is because the code depended on a multixact above their cutoff point not having any lock-only member older than the cutoff point for Xids, which is easily defeated in READ COMMITTED transactions. The fix for this involves creating a new MultiXactId when necessary. But this cannot be done during WAL replay, and moreover multixact examination requires using CLOG access routines which are not supposed to be used during WAL replay either; so tuple freezing cannot be done with the old freeze WAL record. Therefore, separate the freezing computation from its execution, and change the WAL record to carry all necessary information. At WAL replay time, it's easy to re-execute freezing because we don't need to re-compute the new infomask/Xmax values but just take them from the WAL record. While at it, restructure the coding to ensure all page changes occur in a single critical section without much room for failures. The previous coding wasn't using a critical section, without any explanation as to why this was acceptable. In replication scenarios using the 9.3 branch, standby servers must be upgraded before their master, so that they are prepared to deal with the new WAL record once the master is upgraded; failure to do so will cause WAL replay to die with a PANIC message. Later upgrade of the standby will allow the process to continue where it left off, so there's no disruption of the data in the standby in any case. Standbys know how to deal with the old WAL record, so it's okay to keep the master running the old code for a while. In master, the old freeze WAL record is gone, for cleanliness' sake; there's no compatibility concern there. Backpatch to 9.3, where the original bug was introduced and where the previous fix was backpatched. &Aacute;lvaro Herrera and Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b97e6823b949624afdc3ce4c92b29a80429715f">http://git.postgresql.org/pg/commitdiff/3b97e6823b949624afdc3ce4c92b29a80429715f</a></li>

<li>Don't ignore tuple locks propagated by our updates. If a tuple was locked by transaction A, and transaction B updated it, the new version of the tuple created by B would be locked by A, yet visible only to B; due to an oversight in HeapTupleSatisfiesUpdate, the lock held by A wouldn't get checked if transaction B later deleted (or key-updated) the new version of the tuple. This might cause referential integrity checks to give false positives (that is, allow deletes that should have been rejected). This is an easy oversight to have made, because prior to improved tuple locks in commit 0ac5ad5134f it wasn't possible to have tuples created by our own transaction that were also locked by remote transactions, and so locks weren't even considered in that code path. It is recommended that foreign keys be rechecked manually in bulk after installing this update, in case some referenced rows are missing with some referencing row remaining. Per bug reported by Daniel Wood in CAPweHKe5QQ1747X2c0tA=5zf4YnS2xcvGf13Opd-1Mq24rF1cQ@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11ac4c73cb89551d7e0d0180b58d82186f072f8d">http://git.postgresql.org/pg/commitdiff/11ac4c73cb89551d7e0d0180b58d82186f072f8d</a></li>

<li>Optimize updating a row that's locked by same xid. Updating or locking a row that was already locked by the same transaction under the same Xid caused a MultiXact to be created; but this is unnecessary, because there's no usefulness in being able to differentiate two locks by the same transaction. In particular, if a transaction executed SELECT FOR UPDATE followed by an UPDATE that didn't modify columns of the key, we would dutifully represent the resulting combination as a multixact -- even though a single key-update is sufficient. Optimize the case so that only the strongest of both locks/updates is represented in Xmax. This can save some Xmax's from becoming MultiXacts, which can be a significant optimization. This missed optimization opportunity was spotted by Andres Freund while investigating a bug reported by Oliver Seemann in message CANCipfpfzoYnOz5jj=UZ70_R=CwDHv36dqWSpwsi27vpm1z5sA@mail.gmail.com and also directly as a performance regression reported by Dong Ye in message d54b8387.000012d8.00000010@YED-DEVD1.vmware.com Reportedly, this patch fixes the performance regression. Since the missing optimization was reported as a significant performance regression from 9.2, backpatch to 9.3. Andres Freund, tweaked by &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13aa6244313df2315b0952a9e7f6e68bb09c9d98">http://git.postgresql.org/pg/commitdiff/13aa6244313df2315b0952a9e7f6e68bb09c9d98</a></li>

<li>Make stdout unbuffered. This ensures that all stdout output is flushed immediately, to match stderr. This eliminates the need for fflush(stdout) calls sprinkled all over the place. Per Daniel Wood in message 519A79C6.90308@salesforce.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73bcb76b77c2e47dd066a1961309cf950cf19412">http://git.postgresql.org/pg/commitdiff/73bcb76b77c2e47dd066a1961309cf950cf19412</a></li>

<li>isolationtester: Ensure stderr is unbuffered, too 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6eda3e9c27781dec369542a9b20cba7c3d832a5e">http://git.postgresql.org/pg/commitdiff/6eda3e9c27781dec369542a9b20cba7c3d832a5e</a></li>

<li>Avoid useless palloc during transaction commit. We can allocate the initial relations-to-drop array when first needed, instead of at function entry; this avoids allocating it when the function is not going to do anything, which is most of the time. Backpatch to 9.3, where this behavior was introduced by commit 279628a0a7cf5. There's more that could be done here, such as possible reworking of the code to avoid having to palloc anything, but that doesn't sound as backpatchable as this relatively minor change. Per complaint from Noah Misch in 20131031145234.GA621493@tornado.leadboat.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6130208e75c98d76b526ac2ac08cedbd17b9f00d">http://git.postgresql.org/pg/commitdiff/6130208e75c98d76b526ac2ac08cedbd17b9f00d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Comment: COPY comment improvement. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dba5a9dda9adbda16a72c46e1c012ee6552c248a">http://git.postgresql.org/pg/commitdiff/dba5a9dda9adbda16a72c46e1c012ee6552c248a</a></li>

<li>Fix incorrect error message reported for non-existent users. Previously, lookups of non-existent user names could return "Success"; it will now return "User does not exist" by resetting errno. This also centralizes the user name lookup code in libpgport. Report and analysis by Nicolas Marchildon; patch by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/613c6d26bd42dd8c2dd0664315be9551475b8864">http://git.postgresql.org/pg/commitdiff/613c6d26bd42dd8c2dd0664315be9551475b8864</a></li>

<li>Move pg_upgrade_support global variables to their own include file. Previously their declarations were spread around to avoid accidental access. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/527fdd9df11eb338fdd372d16f62cd067de5204b">http://git.postgresql.org/pg/commitdiff/527fdd9df11eb338fdd372d16f62cd067de5204b</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add ALTER SYSTEM command to edit the server configuration file. Patch contributed by Amit Kapila. Reviewed by Hari Babu, Masao Fujii, Boszormenyi Zoltan, Andres Freund, Greg Smith and others. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65d6e4cb5c62371dae6c236a7e709d503ae6ddf8">http://git.postgresql.org/pg/commitdiff/65d6e4cb5c62371dae6c236a7e709d503ae6ddf8</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow on-detach callbacks for dynamic shared memory segments. Just as backends must clean up their shared memory state (releasing lwlocks, buffer pins, etc.) before exiting, they must also perform any similar cleanups related to dynamic shared memory segments they have mapped before unmapping those segments. So add a mechanism to ensure that. Existing on_shmem_exit hooks include both "user level" cleanup such as transaction abort and removal of leftover temporary relations and also "low level" cleanup that forcibly released leftover shared memory resources. On-detach callbacks should run after the first group but before the second group, so create a new before_shmem_exit function for registering the early callbacks and keep on_shmem_exit for the regular callbacks. (An earlier draft of this patch added an additional argument to on_shmem_exit, but that had a much larger footprint and probably a substantially higher risk of breaking third party code for no real gain.) Patch by me, reviewed by KaiGai Kohei and Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/001a573a2011d605f2a6e10aee9996de8581d099">http://git.postgresql.org/pg/commitdiff/001a573a2011d605f2a6e10aee9996de8581d099</a></li>

<li>Fix compiler warning. get_user_name returns const char *, but we were assigning the result to a char * variable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6bb9d3017c173fa6102010d83ced7ad4409e5a49">http://git.postgresql.org/pg/commitdiff/6bb9d3017c173fa6102010d83ced7ad4409e5a49</a></li>

<li>pg_prewarm, a contrib module for prewarming relationd data. Patch by me. Review by &Aacute;lvaro Herrera, Amit Kapila, Jeff Janes, Gurjeet Singh, and others. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c32afe53c2e87a56e2ff930798a5588db0f7a516">http://git.postgresql.org/pg/commitdiff/c32afe53c2e87a56e2ff930798a5588db0f7a516</a></li>

<li>Change the way we mark tuples as frozen. Instead of changing the tuple xmin to FrozenTransactionId, the combination of HEAP_XMIN_COMMITTED and HEAP_XMIN_INVALID, which were previously never set together, is now defined as HEAP_XMIN_FROZEN. A variety of previous proposals to freeze tuples opportunistically before vacuum_freeze_min_age is reached have foundered on the objection that replacing xmin by FrozenTransactionId might hinder debugging efforts when things in this area go awry; this patch is intended to solve that problem by keeping the XID around (but largely ignoring the value to which it is set). Third-party code that checks for HEAP_XMIN_INVALID on tuples where HEAP_XMIN_COMMITTED might be set will be broken by this change. To fix, use the new accessor macros in htup_details.h rather than consulting the bits directly. HeapTupleHeaderGetXmin has been modified to return FrozenTransactionId when the infomask bits indicate that the tuple is frozen; use HeapTupleHeaderGetRawXmin when you already know that the tuple isn't marked commited or frozen, or want the raw value anyway. We currently do this in routines that display the xmin for user consumption, in tqual.c where it's known to be safe and important for the avoidance of extra cycles, and in the function-caching code for various procedural languages, which shouldn't invalidate the cache just because the tuple gets frozen. Robert Haas and Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37484ad2aacef5ec794f4dd3d5cf814475180a78">http://git.postgresql.org/pg/commitdiff/37484ad2aacef5ec794f4dd3d5cf814475180a78</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in docs for min_recovery_apply_delay. Bernd Helmle 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f83a75451f96ecf950b6b8e29f487723d481ce1b">http://git.postgresql.org/pg/commitdiff/f83a75451f96ecf950b6b8e29f487723d481ce1b</a></li>

<li>Add tab completion for ALTER SYSTEM SET in psql. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/084e385a2fc0b596ff6aa0ede8d360a889a6c084">http://git.postgresql.org/pg/commitdiff/084e385a2fc0b596ff6aa0ede8d360a889a6c084</a></li>

<li>Rename wal_log_hintbits to wal_log_hints, per discussion on pgsql-hackers. Sawada Masahiko 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/961bf59fb7a7e4fab751e20e9372de7ab37c5649">http://git.postgresql.org/pg/commitdiff/961bf59fb7a7e4fab751e20e9372de7ab37c5649</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Upgrade to Autoconf 2.69 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94b899b829657332bda856ac3f06153d09077bd1">http://git.postgresql.org/pg/commitdiff/94b899b829657332bda856ac3f06153d09077bd1</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in another revision of a patch to implement a CustomScan API and use same in FDWs.</li>

<li>Andres Freund sent in a patch to prevent "replica identity" messages from being sent for system tables.</li>

<li>Tatsuo Ishii sent in two more revisions of a patch to implement a toregclass.</li>

<li>MauMau sent in two revisions of a patch to fix an issue where disk space increases unnecessarily while performing archive recovery.</li>

<li>Heikki Linnakangas sent in a flock of patches to improve GIN indexing by storing some additional information.</li>

<li>David Rowley sent in five more revisions of a patch to implement inverse transition functions.</li>

<li>MauMau sent in a patch to fix an issue where ECPG does not recognize service files.</li>

<li>Emre Hasegeli sent in a patch to implement GiST indexing support for inet datatypes.</li>

<li>Mitsumasa KONDO sent in another revision of a patch to optimize kernel readahead using buffer access strategy.</li>

<li>Pavel Stehule sent in two more revisions of a patch to implement a simple function to make timestamps.</li>

<li>Christian Kruse sent in a patch to show xid and xmin in pg_stat_activity and pg_stat_replication.</li>

<li>Maciek Sakrejda sent in a patch to fix the documentation for VACUUM FREEZE, which was missing a reference to the vacuum_freeze_table_age GUC.</li>

<li>Robert Haas sent in two more revisions of a patch to preserve forensic information when freezing.</li>

<li>Robert Haas sent in another revision of a patch to implement CLUSTER FREEZE.</li>

<li>MauMau sent in two more revisions of a patch to fix an issue where pg_ctl always uses the same event source.</li>

<li>Marko (johto) Tiikkaja sent in a patch to implement a one-argument form of array_length which requires (i.e. errors out unless) the following conditions hold: that the array is one-dimensional; that its lowest bound is 1.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT...ON DUPLICATE KEY LOCK FOR UPDATE.</li>

<li>Haribabu Kommi sent in another revision of a patch to allow specifying an alternate pg_xlog directory in pg_basebackup.</li>

<li>MauMau sent in a patch to fix a bug in psql where \copy doesn't end if the backend is killed.</li>

<li>Pavel Stehule sent in another revision of a patch to add an if-exists option to pg_dump and pg_restore.</li>

<li>Oskari Saarenmaa sent in a patch to make various variables read-only (const).</li>

<li>Pavel Stehule sent in a patch to implement a make_interval function similar to the make_timestamp functions already submitted.</li>

<li>Pavel Raiskup sent in a patch to make pg_upgrade's locale comparison more tolerant.</li>

<li>Fabien COELHO sent in a patch to fix a bug in the ISN extension.</li>

<li>Amit Kapila sent in a patch to fix an issue with ALTER SYSTEM where error_conf_filename was not displayed.</li>

<li>Alexander Korotkov sent in another WIP revision of a patch to implement partial sorting as a planner optimization.</li>

<li>Amit Kapila sent in a patch to fix an issue with ALTER SYSTEM where PGC_BACKEND GUCs were not being handled correctly.</li>

</ul>