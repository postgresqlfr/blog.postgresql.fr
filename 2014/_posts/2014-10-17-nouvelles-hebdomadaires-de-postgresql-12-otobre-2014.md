---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 otobre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/10/17/Nouvelles-hebdomadaires-de-PostgreSQL-12-otobre-2014"
---


<p>PostgreSQL 9.4 Beta 3 publi&eacute;e. TEST&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/about/news/1547/">http://www.postgresql.org/about/news/1547/</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf NYC 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. l'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></p>

[ndt: meetup &agrave; Lyon le 19 novembre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/">http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/</a>]

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 6.2, un analyseur parall&eacute;lis&eacute; de logs PostgreSQL &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="https://sourceforge.net/projects/pgbadger/">https://sourceforge.net/projects/pgbadger/</a> D&eacute;veloppement&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/">https://github.com/dalibo/pgbadger/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me &eacute;dition du PgDay argentin est programm&eacute;e pour le 28 novembre 2014 &agrave; Santa Fe. L'appel international &agrave; conf&eacute;renciers court jusqu'au 28 septembre&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.ar/pgday2014">http://www.postgresql.org.ar/pgday2014</a></li>

<li>Le 4<sup>&egrave;me</sup> PgDay &eacute;quatorien aura lieu le mardi 7 octobre en la ville de Quito, int&eacute;gr&eacute; au 5&egrave;me congr&egrave;s international du Logiciel Libre. Envoyez vos propositions de conf&eacute;rences &agrave; ecpug AT postgresql DOT org.</li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Les inscriptions pour la PGConf.EU 2014 de Madrid, Espagne, du 21 au 24 octobre sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/registration/">http://2014.pgconf.eu/registration/</a></li>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014. L'appel international &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141013053040.GA18882@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rename pg_recvlogical's --create/--drop to --create-slot/--drop-slot. A future patch (9.5 only) adds slot management to pg_receivexlog. The verbs create/drop don't seem descriptive enough there. It seems better to rename pg_recvlogical's commands now, in beta, than live with the inconsistency forever. The old form (e.g. --drop) will still be accepted by virtue of most getopt_long() options accepting abbreviations for long commands. Backpatch to 9.4 where pg_recvlogical was introduced. Author: Michael Paquier and Andres Freund Discussion: CAB7nPqQtt79U6FmhwvgqJmNyWcVCbbV-nS72j_jyPEopERg9rg@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8b6cba84a986ae9154f748e44709a17d6723191">http://git.postgresql.org/pg/commitdiff/c8b6cba84a986ae9154f748e44709a17d6723191</a></li>

<li>Add support for managing physical replication slots to pg_receivexlog. pg_receivexlog already has the capability to use a replication slot to reserve WAL on the upstream node. But the used slot currently has to be created via SQL. To allow using slots directly, without involving SQL, add --create-slot and --drop-slot actions, analogous to the logical slot manipulation support in pg_recvlogical. Author: Michael Paquier Discussion: CABUevEx+zrOHZOQg+dPapNPFRJdsk59b=TSVf30Z71GnFXhQaw@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9f38c7a555dd5a6b81100c6d1e4aa68342d8771">http://git.postgresql.org/pg/commitdiff/d9f38c7a555dd5a6b81100c6d1e4aa68342d8771</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Clean up Create/DropReplicationSlot query buffer. CreateReplicationSlot() and DropReplicationSlot() were not cleaning up the query buffer in some cases (mostly error conditions) which meant a small leak. Not generally an issue as the error case would result in an immediate exit, but not difficult to fix either and reduces the number of false positives from code analyzers. In passing, also add appropriate PQclear() calls to RunIdentifySystem(). Pointed out by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/273b29dbe96b1584dd66615cf8dc83e7e6ae7386">http://git.postgresql.org/pg/commitdiff/273b29dbe96b1584dd66615cf8dc83e7e6ae7386</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix array overrun in ecpg's version of ParseDateTime(). The code wrote a value into the caller's field[] array before checking to see if there was room, which of course is backwards. Per report from Michael Paquier. I fixed the equivalent bug in the backend's version of this code way back in 630684d3a130bb93, but failed to think about ecpg's copy. Fortunately this doesn't look like it would be exploitable for anything worse than a core dump: an external attacker would have no control over the single word that gets written. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55bfdd1cfd991af0864535bbca24a606e8be7e45">http://git.postgresql.org/pg/commitdiff/55bfdd1cfd991af0864535bbca24a606e8be7e45</a></li>

<li>Fix bogus optimization in JSONB containment tests. When determining whether one JSONB object contains another, it's okay to make a quick exit if the first object has fewer pairs than the second: because we de-duplicate keys within objects, it is impossible that the first object has all the keys the second does. However, the code was applying this rule to JSONB arrays as well, where it does *not* hold because arrays can contain duplicate entries. The test was really in the wrong place anyway; we should do it within JsonbDeepContains, where it can be applied to nested objects not only top-level ones. Report and test cases by Alexander Korotkov; fix by Peter Geoghegan and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a50de13127b7657f32f14dc17beb2e15a3a4777">http://git.postgresql.org/pg/commitdiff/4a50de13127b7657f32f14dc17beb2e15a3a4777</a></li>

<li>Improve documentation about JSONB array containment behavior. Per gripe from Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25ad5a52847699527ddba6e86aa353075e578e9b">http://git.postgresql.org/pg/commitdiff/25ad5a52847699527ddba6e86aa353075e578e9b</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in elog message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c421efd21330f2e5bed253b4a53d7ea5e084edf6">http://git.postgresql.org/pg/commitdiff/c421efd21330f2e5bed253b4a53d7ea5e084edf6</a></li>

<li>Extend shm_mq API with new functions shm_mq_sendv, shm_mq_set_handle. shm_mq_sendv sends a message to the queue assembled from multiple locations. This is expected to be used by forthcoming patches to allow frontend/backend protocol messages to be sent via shm_mq, but might be useful for other purposes as well. shm_mq_set_handle associates a BackgroundWorkerHandle with an already-existing shm_mq_handle. This solves a timing problem when creating a shm_mq to communicate with a newly-launched background worker: if you attach to the queue first, and the background worker fails to start, you might block forever trying to do I/O on the queue; but if you start the background worker first, but then die before attaching to the queue, the background worrker might block forever trying to do I/O on the queue. This lets you attach before starting the worker (so that the worker is protected) and then associate the BackgroundWorkerHandle later (so that you are also protected). Patch by me, reviewed by Stephen Frost. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7bb0e97407c32cbf7245ef91fcc27d120c81e872">http://git.postgresql.org/pg/commitdiff/7bb0e97407c32cbf7245ef91fcc27d120c81e872</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Implement SKIP LOCKED for row-level locks This clause changes the behavior of SELECT locking clauses in the presence of locked rows: instead of causing a process to block waiting for the locks held by other processes (or raise an error, with NOWAIT), SKIP LOCKED makes the new reader skip over such rows. While this is not appropriate behavior for general purposes, there are some cases in which it is useful, such as queue-like tables. Catalog version bumped because this patch changes the representation of stored rules. Reviewed by Craig Ringer (based on a previous attempt at an implementation by Simon Riggs, who also provided input on the syntax used in the current patch), David Rowley, and &Aacute;lvaro Herrera. Author: Thomas Munro 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df630b0dd5ea2de52972d456f5978a012436115e">http://git.postgresql.org/pg/commitdiff/df630b0dd5ea2de52972d456f5978a012436115e</a></li>

<li>Split builtins.h to a new header ruleutils.h. The new header contains many prototypes for functions in ruleutils.c that are not exposed to the SQL level. Reviewed by Andres Freund and Michael Paquier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b1c2a0f2066672b24f6257ec9b8d78a1754f494">http://git.postgresql.org/pg/commitdiff/7b1c2a0f2066672b24f6257ec9b8d78a1754f494</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix broken example in PL/pgSQL document. Back-patch to all supported branches. Marti Raudsepp, per a report from Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f19f0ee7160e9aa0bec69146a02e544b9030191b">http://git.postgresql.org/pg/commitdiff/f19f0ee7160e9aa0bec69146a02e544b9030191b</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change the way encoding and locale checks are done in pg_upgrade. Lc_collate and lc_ctype have been per-database settings since server version 8.4, but pg_upgrade was still treating them as cluster-wide options. It fetched the values for the template0 databases in old and new cluster, and compared them. That's backwards; the encoding and locale of the template0 database doesn't matter, as template0 is guaranteed to contain only ASCII characters. But if there are any other databases that exist on both clusters (in particular template1 and postgres databases), their encodings and locales must be compatible. Also, make the locale comparison more lenient. If the locale names are not equal, try to canonicalize both of them by passing them to setlocale(). We used to do that only when upgrading from 9.1 or below, but it seems like a good idea even with newer versions. If we change the canonical form of a locale, this allows pg_upgrade to still work. I'm about to do just that to fix bug #11431, by mapping a locale name that contains non-ASCII characters to a pure-ASCII alias of the same locale. No backpatching, because earlier versions of pg_upgrade still support upgrading from 8.3 servers. That would be more complicated, so it doesn't seem worth it, given that we haven't received any complaints about this from users. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33755e8edf149dabfc0ed9b697a84f70b0cca0de">http://git.postgresql.org/pg/commitdiff/33755e8edf149dabfc0ed9b697a84f70b0cca0de</a></li>

<li>Remove unnecessary initialization of local variables. Oops, forgot these in the previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/733be2a5cd124b28a15d5d09de9b227691e6c5a0">http://git.postgresql.org/pg/commitdiff/733be2a5cd124b28a15d5d09de9b227691e6c5a0</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>docs: remove mention that attnotnull should be changed. Report by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80e6af1272750595c02e910bde907e30c592579b">http://git.postgresql.org/pg/commitdiff/80e6af1272750595c02e910bde907e30c592579b</a></li>

<li>regression: adjust polygon diagrams to not use tabs. Also, small diagram adjustments. Patch by Emre Hasegeli 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f2e5a8a84f39ec027d1018f655b85b1b1513701">http://git.postgresql.org/pg/commitdiff/4f2e5a8a84f39ec027d1018f655b85b1b1513701</a></li>

<li>pg_upgrade: prefix Unix shell script name output with "./". This more clearly suggests the current directory. While this also works on Windows, it might be confusing. Report by Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc9c612767f20f28f35f06d709d59ed8477bfe32">http://git.postgresql.org/pg/commitdiff/dc9c612767f20f28f35f06d709d59ed8477bfe32</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Message improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7a08c80283c8d564933381b24c1993d49926e15">http://git.postgresql.org/pg/commitdiff/b7a08c80283c8d564933381b24c1993d49926e15</a></li>

<li>pg_recvlogical: Improve --help output. List the actions first, as they are the most important options. Group the other options more sensibly, consistent with the man page. Correct a few typographical errors, clarify some things. Also update the pg_receivexlog --help output to make it a bit more consistent with that of pg_recvlogical. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0fb59d8bd7711fb8f08a4371074f07c62617d78">http://git.postgresql.org/pg/commitdiff/a0fb59d8bd7711fb8f08a4371074f07c62617d78</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_ctl: Cast DWORD values to avoid -Wformat warnings. This affects pg_ctl alone, because pg_ctl takes the exceptional step of calling Windows API functions in a Cygwin build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27a23f9dfe81e324e5e51e04aad364bcaaff1096">http://git.postgresql.org/pg/commitdiff/27a23f9dfe81e324e5e51e04aad364bcaaff1096</a></li>

<li>Suppress dead, unportable src/port/crypt.c code. This file used __int64, which is specific to native Windows, rather than int64. Suppress the long-unused union field of this type. Noticed on Cygwin x86_64 with -lcrypt not installed. Back-patch to 9.0 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/772945b4dfb6cc7354e79e23e2552d2d3712d5a1">http://git.postgresql.org/pg/commitdiff/772945b4dfb6cc7354e79e23e2552d2d3712d5a1</a></li>

<li>Fix quoting in the add_to_path Makefile macro. The previous quoting caused "make -C src/bin check" to ignore, rather than add to, any LD_LIBRARY_PATH content from the environment. Back-patch to 9.4, where the macro was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/494affbd900d1c90de17414a575af1a085c3e37a">http://git.postgresql.org/pg/commitdiff/494affbd900d1c90de17414a575af1a085c3e37a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Etsuro Fujita sent in a patch to improve the autoanalyze messages on inheritance trees.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the format and API of WALs.</li>

<li>Heikki Linnakangas sent in another revision of a patch to implement an SSL regression test suite.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to implement CINE for indexes.</li>

<li>Ali Akbar sent in two more revisions of a patch to implement generate_series(numeric, numeric).</li>

<li>Ali Akbar sent in another revision of a patch to fix xpath() to return namespace definitions.</li>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>&Aacute;lvaro Herrera sent in another revision of a patch to implement BRIN indexes.</li>

<li>Feike Steenbergen sent in a patch to add regression tests for autocommit-off mode for psql and fix some omissions, and another to backpatch it to 9.2+.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement (INSERT|UPDATE) ... ON CONFLICT...</li>

<li>Heikki Linnakangas sent in a patch to implement page inspection functions for GIN indexes.</li>

<li>Tom Lane sent in a patch to help fix the mess that is timezone abbreviations.</li>

<li>&Aacute;lvaro Herrera sent in three more revisions of a patch to refactor pg_dump to remove global variables.</li>

<li>Fujii Masao sent in another revision of a patch to add a pending_list_cleanup_size GUC and associated machinery.</li>

<li>Heikki Linnakangas sent in a patch to fix the CRC algorithm so it matches what the documents say it is.</li>

<li>Michael Paquier sent in three more revisions of a patch to ensure that .ready files not appear on replicas.</li>

<li>Robert Haas sent in two patches to defer some AtStart* allocations.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to fix a situation where it was impossible to escape from a blocked send().</li>

<li>Andres Freund sent in three more revisions of a patch to implement wait-free LW_SHARED acquisition.</li>

<li>Heikki Linnakangas sent in another revision of a patch to add a throttling latency limit to pgbench.</li>

<li>Fujii Masao sent in a patch to allow ALTER ROLE/DATABASE SET to set PGC_BACKEND and PGC_SU_BACKEND parameters.</li>

<li>Amit Kapila sent in another revision of a patch to scale buffer eviction.</li>

<li>Peter Geoghegan sent in a patch to remove an obsolete reference to _bt_tuplecompare() within tuplesort.c.</li>

<li>Kyotaro HORIGUCHI sent in a patch to arrange things so ALTER USER/ROLE now takes CURRENT_USER as user name, rewrite the sysnopsis of the documents for ALTER USER and ALTER ROLE so as to they have exactly same syntax, and modify the syntax of ALTER USER so as to be an alias of ALTER ROLE.</li>

<li>Craig Ringer sent in another revision of a patch to use a faster, higher precision timer API on Windows.</li>

<li>Michael Paquier sent in a patch to fix some docs around row-level locking.</li>

<li>Peter Geoghegan sent in a patch to see that B-Tree index builds use sortsupport.</li>

<li>Noah Misch sent in a patch to fix an error caused by the fact that Darwin's setlocale() can start a thread.</li>

<li>Fabr&iacute;zio de Royes Mello sent in a patch to get rid the toast table for pg_seclabel.</li>

<li>Peter Geoghegan sent in a patch to make B-Tree and CLUSTER sortsupport use abbreviation and fix PG_CACHE_LINE_SIZE bit rot.</li>

<li>Bruce Momjian and Peter Eisentraut traded patches to deal with some psql output changes in 9.4-to-be.</li>

<li>Ali Akbar sent in two revisions of a patch to create array_agg() for arrays.</li>

<li>Michael Paquier sent in a patch to create a new header quote.h in include/utils that groups all the quote-related functions.</li>

<li>Tomas Vondra sent in a WIP patch to implement multivariate statistics.</li>

<li>&Aacute;lvaro Herrera sent in another revision of a patch to add CREATE support to event triggers.</li>

<li>SAWADA Masahiko sent in a patch to implement REINDEX SCHEMA.</li>

</ul>