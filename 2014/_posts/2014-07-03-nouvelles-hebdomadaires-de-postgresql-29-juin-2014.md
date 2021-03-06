---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 juin 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/07/03/Nouvelles-hebdomadaires-de-PostgreSQL-29-juin-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PgBackMan 1.0.0, un utilitaire de gestion des sauvegardes logiques g&eacute;n&eacute;r&eacute;es via pg_dump et pg_dumpall&nbsp;: 

<a target="_blank" href="http://www.pgbackman.org/">http://www.pgbackman.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Char(14) et le PGday UK auront lieu les 8 &amp; 9 juillet 2014&nbsp;: 

<a target="_blank" href="http://www.char14.info">http://www.char14.info</a> <a target="_blank" href="http://postgresqlusergroup.org.uk/">http://postgresqlusergroup.org.uk/</a></li>

<li>Le PgDay 2014 de Portland (Oregon, &Eacute;tats-Unis) aura lieu le 6 septembre 2014&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PDXPUGDay2014">https://wiki.postgresql.org/wiki/PDXPUGDay2014</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140630050136.GG1218@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in WAL_DEBUG. The record header was not copied correctly to the buffer that was passed to the rm_desc function. Broken by my rm_desc signature refactoring patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85ba0748ed5aa069643887af84fc28c380b1e815">http://git.postgresql.org/pg/commitdiff/85ba0748ed5aa069643887af84fc28c380b1e815</a></li>

<li>Improve tab-completion of DROP and ALTER ENABLE/DISABLE on triggers and rules. At "DROP RULE/TRIGGER triggername ON ...", tab-complete tables that have a rule/trigger with that name. At "ALTER TABLE tablename ENABLE/DISABLE TRIGGER/RULE ...", tab-complete to rules/triggers on that table. Previously, we would tab-complete to all rules or triggers, not just those that are on that table. Also, filter out internal RI triggers from the list. You can't DROP them, and enabling/disabling them is such a rare (and dangerous) operation that it seems better to hide them. Andreas Karlsson, reviewed by Ian Barwick. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/631e7f6b4e0629077408d3f8caf282627765f3f0">http://git.postgresql.org/pg/commitdiff/631e7f6b4e0629077408d3f8caf282627765f3f0</a></li>

<li>Don't allow foreign tables with OIDs. The syntax doesn't let you specify "WITH OIDS" for foreign tables, but it was still possible with default_with_oids=true. But the rest of the system, including pg_dump, isn't prepared to handle foreign tables with OIDs properly. Backpatch down to 9.1, where foreign tables were introduced. It's possible that there are databases out there that already have foreign tables with OIDs. There isn't much we can do about that, but at least we can prevent them from being created in the future. Patch by Etsuro Fujita, reviewed by Hadi Moshayedi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a87a7dc8b64a99e5e497591dddb37b3ecdfae2eb">http://git.postgresql.org/pg/commitdiff/a87a7dc8b64a99e5e497591dddb37b3ecdfae2eb</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add missing closing parenthesis into max_replication_slots doc. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/394e05996fbb0621cf51c9d99891ca99b0eb2ff2">http://git.postgresql.org/pg/commitdiff/394e05996fbb0621cf51c9d99891ca99b0eb2ff2</a></li>

<li>Fix typo in replication slot function doc. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8ad8bd47306d4c34ab8f7cc6f38225b12f18a3c">http://git.postgresql.org/pg/commitdiff/f8ad8bd47306d4c34ab8f7cc6f38225b12f18a3c</a></li>

<li>Remove obsolete example of CSV log file name from log_filename document. 7380b63 changed log_filename so that epoch was not appended to it when no format specifier is given. But the example of CSV log file name with epoch still left in log_filename document. This commit removes such obsolete example. This commit also documents the defaults of log_directory and log_filename. Backpatch to all supported versions. Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de42ed401a9622917b09f549d80946dda35c5f3f">http://git.postgresql.org/pg/commitdiff/de42ed401a9622917b09f549d80946dda35c5f3f</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Check for interrupts during tuple-insertion loops. Normally, this won't matter too much; but if I/O is really slow, for example because the system is overloaded, we might write many pages before checking for interrupts. A single toast insertion might write up to 1GB of data, and a multi-insert could write hundreds of tuples (and their corresponding TOAST data). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c922353b1c7e7fe5fa506664ccf0c87a0abfdda2">http://git.postgresql.org/pg/commitdiff/c922353b1c7e7fe5fa506664ccf0c87a0abfdda2</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: remove pg_multixact files left by initdb. This fixes a bug that caused vacuum to fail when the '0000' files left by initdb were accessed as part of vacuum's cleanup of old pg_multixact files. Backpatch through 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f7482733a90a2e0d8917a41d823306975f291ee">http://git.postgresql.org/pg/commitdiff/0f7482733a90a2e0d8917a41d823306975f291ee</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix handling of nested JSON objects in json_populate_recordset and friends. populate_recordset_object_start() improperly created a new hash table (overwriting the link to the existing one) if called at nest levels greater than one. This resulted in previous fields not appearing in the final output, as reported by Matti Hameister in bug #10728. In 9.4 the problem also affects json_to_recordset. This perhaps missed detection earlier because the default behavior is to throw an error for nested objects: you have to pass use_json_as_text = true to see the problem. In addition, fix query-lifespan leakage of the hashtable created by json_populate_record(). This is pretty much the same problem recently fixed in dblink: creating an intended-to-be-temporary context underneath the executor's per-tuple context isn't enough to make it go away at the end of the tuple cycle, because MemoryContextReset is not MemoryContextResetAndDeleteChildren. Michael Paquier and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57d8c1270e1538d1f02e4fa1cdb1d8ded82f7c70">http://git.postgresql.org/pg/commitdiff/57d8c1270e1538d1f02e4fa1cdb1d8ded82f7c70</a></li>

<li>Cosmetic improvements in jsonfuncs.c. Re-pgindent, remove a lot of random vertical whitespace, remove useless (if not counterproductive) inline markings, get rid of unnecessary zero-padding of strings for hashtable searches. No functional changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d2d7ad5aba6fdabd58a2a829038596f48cae723">http://git.postgresql.org/pg/commitdiff/8d2d7ad5aba6fdabd58a2a829038596f48cae723</a></li>

<li>Rationalize error messages within jsonfuncs.c. I noticed that the functions in jsonfuncs.c sometimes printed error messages that claimed I'd called some other function. Investigation showed that this was from repurposing code into "worker" functions without taking much care as to whether it would mention the right SQL-level function if it threw an error. Moreover, there was a weird mismash of messages that contained a fixed function name, messages that used %s for a function name, and messages that constructed a function name out of spare parts, like "json%s_populate_record" (which, quite aside from being ugly as sin, wasn't even sufficient to cover all the cases). This would put an undue burden on our long-suffering translators. Standardize on inserting the SQL function name with %s so as to reduce the number of translatable strings, and pass function names around as needed to make sure we can report the right one. Fix up some gratuitous variations in wording, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/798e2357905f759913166d4f5be249e76a84c662">http://git.postgresql.org/pg/commitdiff/798e2357905f759913166d4f5be249e76a84c662</a></li>

<li>Forward-patch regression test for "could not find pathkey item to sort". Commit a87c729153e372f3731689a7be007bc2b53f1410 already fixed the bug this is checking for, but the regression test case it added didn't cover this scenario. Since we managed to miss the fact that there was a bug at all, it seems like a good idea to propagate the extra test case forward to HEAD. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/344eed91e9d5bfea698b30351abde69ea4e893a8">http://git.postgresql.org/pg/commitdiff/344eed91e9d5bfea698b30351abde69ea4e893a8</a></li>

<li>Get rid of bogus separate pg_proc entries for json_extract_path operators. These should not have existed to begin with, but there was apparently some misunderstanding of the purpose of the opr_sanity regression test item that checks for operator implementation functions with their own comments. The idea there is to check for unintentional violations of the rule that operator implementation functions shouldn't be documented separately .... but for these functions, that is in fact what we want, since the variadic option is useful and not accessible via the operator syntax. Get rid of the extra pg_proc entries and fix the regression test and documentation to be explicit about what we're doing here. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f71136eeeb5c6a234e19a245db7ae1484fc7bf4f">http://git.postgresql.org/pg/commitdiff/f71136eeeb5c6a234e19a245db7ae1484fc7bf4f</a></li>

<li>Disallow pushing volatile qual expressions down into DISTINCT subqueries. A WHERE clause applied to the output of a subquery with DISTINCT should theoretically be applied only once per distinct row; but if we push it into the subquery then it will be evaluated at each row before duplicate elimination occurs. If the qual is volatile this can give rise to observably wrong results, so don't do that. While at it, refactor a little bit to allow subquery_is_pushdown_safe to report more than one kind of restrictive condition without indefinitely expanding its argument list. Although this is a bug fix, it seems unwise to back-patch it into released branches, since it might de-optimize plans for queries that aren't giving any trouble in practice. So apply to 9.4 but not further back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1147035203a47a424b2399fc74829d097b7061e4">http://git.postgresql.org/pg/commitdiff/1147035203a47a424b2399fc74829d097b7061e4</a></li>

<li>Allow pushdown of WHERE quals into subqueries with window functions. We can allow this even without any specific knowledge of the semantics of the window function, so long as pushed-down quals will either accept every row in a given window partition, or reject every such row. Because window functions act only within a partition, such a case can't result in changing the window functions' outputs for any surviving row. Eliminating entire partitions in this way obviously can reduce the cost of the window-function computations substantially. The fly in the ointment is that it's hard to be entirely sure whether this is true for an arbitrary qual condition. This patch allows pushdown if (a) the qual references only partitioning columns, and (b) the qual contains no volatile functions. We are at risk of incorrect results if the qual can produce different answers for values that the partitioning equality operator sees as equal. While it's not hard to invent cases for which that can happen, it seems to seldom be a problem in practice, since no one has complained about a similar assumption that we've had for many years with respect to DISTINCT. The potential performance gains seem to be worth the risk. David Rowley, reviewed by Vik Fearing; some credit is due also to Thomas Mayer who did considerable preliminary investigation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d222585a9f7a18f2d793785c82be4c877b90c461">http://git.postgresql.org/pg/commitdiff/d222585a9f7a18f2d793785c82be4c877b90c461</a></li>

<li>Remove use_json_as_text options from json_to_record/json_populate_record. The "false" case was really quite useless since all it did was to throw an error; a definition not helped in the least by making it the default. Instead let's just have the "true" case, which emits nested objects and arrays in JSON syntax. We might later want to provide the ability to emit sub-objects in Postgres record or array syntax, but we'd be best off to drive that off a check of the target field datatype, not a separate argument. For the functions newly added in 9.4, we can just remove the flag arguments outright. We can't do that for json_populate_record[set], which already existed in 9.3, but we can ignore the argument and always behave as if it were "true". It helps that the flag arguments were optional and not documented in any useful fashion anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a749a23d7af4dba9b3468076ec561d2cbf69af09">http://git.postgresql.org/pg/commitdiff/a749a23d7af4dba9b3468076ec561d2cbf69af09</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't allow relminmxid to go backwards during VACUUM FULL. We were allowing a table's pg_class.relminmxid value to move backwards when heaps were swapped by VACUUM FULL or CLUSTER. There is a similar protection against relfrozenxid going backwards, which we neglected to clone when the multixact stuff was rejiggered by commit 0ac5ad5134f276. Backpatch to 9.3, where relminmxid was introduced. As reported by Heikki in 

<a target="_blank" href="http://www.postgresql.org/message-id/52401AEA.9000608@vmware.com">http://www.postgresql.org/message-id/52401AEA.9000608@vmware.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7e51d9c06e6a0da50abbbd0603ecb80f0b6f02b">http://git.postgresql.org/pg/commitdiff/b7e51d9c06e6a0da50abbbd0603ecb80f0b6f02b</a></li>

<li>Have multixact be truncated by checkpoint, not vacuum. Instead of truncating pg_multixact at vacuum time, do it only at checkpoint time. The reason for doing it this way is twofold: first, we want it to delete only segments that we're certain will not be required if there's a crash immediately after the removal; and second, we want to do it relatively often so that older files are not left behind if there's an untimely crash. Per my proposal in 

<a target="_blank" href="http://www.postgresql.org/message-id/20140626044519.GJ7340@eldon.alvh.no-ip.org">http://www.postgresql.org/message-id/20140626044519.GJ7340@eldon.alvh.no-ip.org</a> we now execute the truncation in the checkpointer process rather than as part of vacuum. Vacuum is in only charge of maintaining in shared memory the value to which it's possible to truncate the files; that value is stored as part of checkpoints also, and so upon recovery we can reuse the same value to re-execute truncate and reset the oldest-value-still-safe-to-use to one known to remain after truncation. Per bug reported by Jeff Janes in the course of his tests involving bug #8673. While at it, update some comments that hadn't been updated since multixacts were changed. Backpatch to 9.3, where persistency of pg_multixact files was introduced by commit 0ac5ad5134f2. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f741300c90141ee274f19a13629ae03a9806b598">http://git.postgresql.org/pg/commitdiff/f741300c90141ee274f19a13629ae03a9806b598</a></li>

<li>Fix broken Assert() introduced by 8e9a16ab8f7f0e58. Don't assert MultiXactIdIsRunning if the multi came from a tuple that had been share-locked and later copied over to the new cluster by pg_upgrade. Doing that causes an error to be raised unnecessarily: MultiXactIdIsRunning is not open to the possibility that its argument came from a pg_upgraded tuple, and all its other callers are already checking; but such multis cannot, obviously, have transactions still running, so the assert is pointless. Noticed while investigating the bogus pg_multixact/offsets/0000 file left over by pg_upgrade, as reported by Andres Freund in 

<a target="_blank" href="http://www.postgresql.org/message-id/20140530121631.GE25431@alap3.anarazel.de">http://www.postgresql.org/message-id/20140530121631.GE25431@alap3.anarazel.de</a> Backpatch to 9.3, as the commit that introduced the buglet. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2770576486265c2ce35b64e875028672a3bb7b5">http://git.postgresql.org/pg/commitdiff/b2770576486265c2ce35b64e875028672a3bb7b5</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove Alpha and Tru64 support. Support for running postgres on Alpha hasn't been tested for a long while. Due to Alpha's uniquely lax cache coherency model it's a hard to develop for platform (especially blindly!) and thought to be unlikely to currently work correctly. As Alpha is the only supported architecture for Tru64 drop support for it as well. Tru64's support has ended 2012 and it has been in maintenance-only mode for much longer. Also remove stray references to __ksr__ and ultrix defines. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a6d488cb538c8761658f0f7edfc40cecc8c29f2d">http://git.postgresql.org/pg/commitdiff/a6d488cb538c8761658f0f7edfc40cecc8c29f2d</a></li>

<li>Add cluster_name GUC which is included in process titles if set. When running several postgres clusters on one OS instance it's often inconveniently hard to identify which "postgres" process belongs to which postgres instance. Add the cluster_name GUC, whose value will be included as part of the process titles if set. With that processes can more easily identified using tools like 'ps'. To avoid problems with encoding mismatches between postgresql.conf, consoles, and individual databases replace non-ASCII chars in the name with question marks. The length is limited to NAMEDATALEN to make it less likely to truncate important information at the end of the status. Thomas Munro, with some adjustments by me and review by a host of people. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51adcaa0df81da5e94b582d47de64ebb17129937">http://git.postgresql.org/pg/commitdiff/51adcaa0df81da5e94b582d47de64ebb17129937</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>rohtodeveloper sent in a patch to make PostgreSQL more compatible with MS SQL Server.</li>

<li>Jeff Janes sent in another revision of a patch to enable tab completion for setting search_path in psql.</li>

<li>David Rowley sent in two more revisions of a patch to allow removal of certain cases of LEFT JOIN.</li>

<li>Furuya Osamu and Fujii Masao traded patches to add a synchronous mode to pg_receivexlog.</li>

<li>Abhijit Menon-Sen sent in a patch to add a pg_audit contrib module.</li>

<li>Pavel Stehule, Petr (PJMODOS) Jelinek, and Abhijit Menon-Sen traded patches to add --help-variables to psql.</li>

<li>Pavan Deolasee and Heikki Linnakangas traded patches to fix a bug in SP-GiST.</li>

<li>David Rowley sent in two more revisions of a patch to allow NOT IN to use anti-JOINs.</li>

<li>Fabr&iacute;zio de Royes Mello sent in two revisions of a patch to allow pg_filedump to work in PostgreSQL 9.4.</li>

<li>John Lumby sent in another revision of a patch to allow extended prefetching using asynchronous I/O where available.</li>

<li>Amit Kapila sent in another revision of a patch to help scale shared buffer eviction.</li>

<li>Pavel Stehule sent in another revision of a patch to allow logging only failed queries in psql.</li>

<li>Ian Lawrence Barwick sent in another revision of a patch to add RETURNING PRIMARY KEY.</li>

<li>Dilip Kumar sent in two more revisions of a patch to allow vacuumdb to use &gt;1 core.</li>

<li>Vik Fearing sent in three revisions of a patch to enable ALTER SYSTEM RESET.</li>

<li>Andres Freund sent in another revision of a patch to do atomic operations in a more systematic way based on available hardware.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to enable ALTER TABLE ... SET LOGGED.</li>

<li>Andreas Karlsson sent in a patch to fix a bug in his prior patch to allow using SChannel instead of OpenSSL for SSL.</li>

<li>Michael Paquier sent in another revision of a patch to extend MSVC scripts to support --with-extra-version.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to support built-in binning functions.</li>

<li>Michael Paquier sent in two more revisions of a patch to fix some WAL replay bugs.</li>

<li>Andres Freund sent in another revision of a patch to simulate memory barriers with spinlocks for platforms lacking the former.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to allow setting a new system identifier using pg_resetxlog.</li>

<li>Vik Fearing sent in another revision of a patch to allowing SQL access for setting database attributes.</li>

<li>Tomas Vondra sent in four revisions of a patch to fix an issue where bad estimation together with large work_mem generates slow hash joins.</li>

<li>Kyotaro HORIGUCHI sent in a patch to enable pg_resetxlog to clear backup start/end locations.</li>

<li>Rajeev Rastogi sent in another revision of a patch to enable autonomous transactions.</li>

<li>Noah Misch sent in a patch to fix an issue where pgstat_heap() consults freed memory.</li>

<li>Asbj&oslash;rn Sloth T&oslash;nnesen sent in three revisions of a patch to add tau, (a.k.a. 2 pi) to PostgreSQL.</li>

<li>David Fetter sent in a patch to implement a C-based trigger function atop Kevin Grittner's patch to enable row access in per-statement AFTER triggers.</li>

<li>Pavel Stehule sent in a patch to allows ignoring nulls in the row_to_json() function.</li>

<li>Matheus de Oliveira sent in a patch to allow using a real temporary tablespace.</li>

<li>Pavel Stehule sent in another revision of a patch to enable psql unicode border line styles.</li>

<li>Mohammad Alhashash and Abhijit Menon-Sen traded patches to allow empty targets in unaccent dictionary.</li>

<li>Kevin Grittner sent in another revision of a patch to send transaction commit/rollback stats to the stats collector unconditionally.</li>

<li>Thomas Munro sent in another revision of a patch to to implement SKIP LOCKED DATA.</li>

</ul>