---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 septembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/09/14/Nouvelles-hebdomadaires-de-PostgreSQL-13-septembre-2015"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgbouncer 1.6.1, un pooler l&eacute;ger de connexions &agrave; PostgreSQL (mise &agrave; jour de s&eacute;curit&eacute;)&nbsp;: <a target="_blank" href="https://pgbouncer.github.io/2015/09/pgbouncer-1-6-1/">https://pgbouncer.github.io/2015/09/pgbouncer-1-6-1/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en septembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-09/">http://archives.postgresql.org/pgsql-jobs/2015-09/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PostgresOpen 2015 aura lieu &agrave; Dallas (Texas, USA) du 16 au 18 septembre&nbsp;: <a target="_blank" href="http://2015.postgresopen.org/">http://2015.postgresopen.org/</a></li>

<li>La <em>session PostgreSQL n&deg;7</em> aura lieu le 24 septembre 2015 &agrave; Paris (France)&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li>Le PGDay.IT 2015 aura lieu &agrave; Prato le 23 octobre 2015&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>PostgreSQL Conference Europe 2015 will be held on October 27-30 in the Vienna Marriott Hotel, in Vienna, Austria. The schedule is posted. <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PgCUBA du 19 au 23 octobre 2015 &agrave; la Havane. Informations en espagnol ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://www.postgresql.org/about/event/1813/">http://www.postgresql.org/about/event/1813/</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. L'appel &agrave; conf&eacute;renciers expire le 31 ao&ucirc;t&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/#call-for-papers">http://pgbr.postgresql.org.br/2015/en/#call-for-papers</a></li>

<li>La PGConf.DE se tiendra au Lindner Hotel am Michel de Hambourg (Allemagne) les 26 &amp; 27 novembre 2015&nbsp;: <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150913232302.GA19348@fetter.org">http://www.postgresql.org/message-id/20150913232302.GA19348@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Update site address of Snowball project <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1c44e1af62f7247610ee80bb355ef7084c24001">http://git.postgresql.org/pg/commitdiff/a1c44e1af62f7247610ee80bb355ef7084c24001</a></li>

<li>Add pages deleted from pending list to FSM. Add pages deleted from GIN's pending list during cleanup to free space map immediately. Clean up process could be initiated by ordinary insert but adding page to FSM might occur only at vacuum. On some workload like never-vacuumed insert-only tables it could cause a huge bloat. Jeff Janes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e95680832854cf300e64c10de9cc2f586df558e8">http://git.postgresql.org/pg/commitdiff/e95680832854cf300e64c10de9cc2f586df558e8</a></li>

<li>Make GIN's cleanup pending list process interruptable. Cleanup process could be called by ordinary insert/update and could take a lot of time. Add vacuum_delay_point() to make this process interruptable. Under vacuum this call will also throttle a vacuum process to decrease system load, called from insert/update it will not throttle, and that reduces a latency. Backpatch for all supported branches. Jeff Janes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e26692248ada18417199b47bc2e4e1648d530953">http://git.postgresql.org/pg/commitdiff/e26692248ada18417199b47bc2e4e1648d530953</a></li>

<li>Microvacuum for GIST. Mark index tuple as dead if it's pointed by kill_prior_tuple during ordinary (search) scan and remove it during insert process if there is no enough space for new tuple to insert. This improves select performance because index will not return tuple marked as dead and improves insert performance because it reduces number of page split. Anastasia Lubennikova &lt;a.lubennikova@postgrespro.ru&gt; with minor editorialization by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/013ebc0a7b7ea9c1b1ab7a3d4dd75ea121ea8ba7">http://git.postgresql.org/pg/commitdiff/013ebc0a7b7ea9c1b1ab7a3d4dd75ea121ea8ba7</a></li>

<li>Fix oversight in 013ebc0a7b7ea9c1b1ab7a3d4dd75ea121ea8ba7 commit. Declaration of variable inside code block. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/223936e22691ccae02be7e2980b6f565518bff19">http://git.postgresql.org/pg/commitdiff/223936e22691ccae02be7e2980b6f565518bff19</a></li>

</ul>

<p>Gregory Stark pushed:</p>

<ul>

<li>Change type of DOW/DOY to UNITS <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37239ef8c9fa72e0f73a307cc413a03a743878d3">http://git.postgresql.org/pg/commitdiff/37239ef8c9fa72e0f73a307cc413a03a743878d3</a></li>

</ul>

<p>Jeff Davis pushed:</p>

<ul>

<li>Add log_line_prefix option 'n' for Unix epoch. Prints time as Unix epoch with milliseconds. Tomas Vondra, reviewed by Fabien Coelho. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f828654e1097bdbb40fedebd9ac1ea045b183e15">http://git.postgresql.org/pg/commitdiff/f828654e1097bdbb40fedebd9ac1ea045b183e15</a></li>

<li>Coordinate log_line_prefix options 'm' and 'n' to share a timeval. Commit f828654e introduced the 'n' option, but it invoked gettimeofday() independently of the 'm' option. If both options were in use (or multiple 'n' options), or if 'n' was in use along with csvlog, then the reported times could be different for the same log message. To fix, initialize a global variable with gettimeofday() once per log message, and use that for both formats. Don't bother coordinating the time for the 't' option, which has much lower resolution. Per complaint by Alvaro Herrera. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1e1862a123b6904d51fd0a607e30f5832bf9a1f">http://git.postgresql.org/pg/commitdiff/b1e1862a123b6904d51fd0a607e30f5832bf9a1f</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Add more sanity checks in contrib/sslinfo. We were missing a few return checks on OpenSSL calls. Should be pretty harmless, since we haven't seen any user reports about problems, and this is not a high-traffic module anyway; still, a bug is a bug, so backpatch this all the way back to 9.0. Author: Michael Paquier, while reviewing another sslinfo patch <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d94c36a45ab457cf43bad76656f77778b3318523">http://git.postgresql.org/pg/commitdiff/d94c36a45ab457cf43bad76656f77778b3318523</a></li>

<li>contrib/sslinfo: add ssl_extension_info SRF. This new function provides information about SSL extensions present in the X509 certificate used for the current connection. Extension version updated to version 1.1. Author: &ETH;&rdquo;&ETH;&frac14;&ETH;&cedil;&Ntilde;&sbquo;&Ntilde;&euro;&ETH;&cedil;&ETH;&sup1; &ETH;&rsquo;&ETH;&frac34;&Ntilde;&euro;&ETH;&frac34;&ETH;&frac12;&ETH;&cedil;&ETH;&frac12; (Dmitry Voronin) Reviewed by: Michael Paquier, Heikki Linnakangas, &Atilde;lvaro Herrera <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49124613f134b04594b1a5c46368eb0a5db16d4b">http://git.postgresql.org/pg/commitdiff/49124613f134b04594b1a5c46368eb0a5db16d4b</a></li>

<li>Fix error message wording in previous sslinfo commit <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/665a00c9e2598e3be366cb9f99c0a04a51dd8c7a">http://git.postgresql.org/pg/commitdiff/665a00c9e2598e3be366cb9f99c0a04a51dd8c7a</a></li>

<li>Allow per-tablespace effective_io_concurrency. Per discussion, nowadays it is possible to have tablespaces that have wildly different I/O characteristics from others. Setting different effective_io_concurrency parameters for those has been measured to improve performance. Author: Julien Rouhaud. Reviewed by: Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1aba62ec635f5852bc45ce65482366e541e61ff5">http://git.postgresql.org/pg/commitdiff/1aba62ec635f5852bc45ce65482366e541e61ff5</a></li>

<li>Add missing ReleaseBuffer call in BRIN revmap code. I think this particular branch is actually dead, but the analysis to prove that is not trivial, so instead take the weasel way. Reported by Jinyu Zhang Backpatch to 9.5, where BRIN was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cd6538345858aec128945b58265a8d5560777dc">http://git.postgresql.org/pg/commitdiff/5cd6538345858aec128945b58265a8d5560777dc</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>In the pg_rewind test suite, receive WAL fully before promoting. If a transaction never reaches the standby, later tests find unexpected cluster state. A "tail-copy: query result matches" test failure has been the usual symptom. Among the buildfarm members having run this test suite, most have exhibited that symptom at least once. Back-patch to 9.5, where pg_rewind was introduced. Michael Paquier, reported by Christoph Berg. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/582fbffb0ccc79de76a459df670b86d109d37ca5">http://git.postgresql.org/pg/commitdiff/582fbffb0ccc79de76a459df670b86d109d37ca5</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Improve tab-completion for GRANT and REVOKE. Thomas Munro, reviewed by Michael Paquier, modified by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f8880704a697312d8d10ab3a2ad7ffe4b5e3dfd">http://git.postgresql.org/pg/commitdiff/2f8880704a697312d8d10ab3a2ad7ffe4b5e3dfd</a></li>

<li>Add gin_fuzzy_search_limit to postgresql.conf.sample. This was forgotten in 8a3631f (commit that originally added the parameter) and 0ca9907 (commit that added the documentation later that year). Back-patch to all supported versions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/043113e7982942279d940f9bf0e3a5a4b66b9aa7">http://git.postgresql.org/pg/commitdiff/043113e7982942279d940f9bf0e3a5a4b66b9aa7</a></li>

<li>Remove files signaling a standby promotion request at postmaster startup. This commit makes postmaster forcibly remove the files signaling a standby promotion request. Otherwise, the existence of those files can trigger a promotion too early, whether a user wants that or not. This removal of files is usually unnecessary because they can exist only during a few moments during a standby promotion. However there is a race condition: if pg_ctl promote is executed and creates the files during a promotion, the files can stay around even after the server is brought up to new master. Then, if new standby starts by using the backup taken from that master, the files can exist at the server startup and should be removed in order to avoid an unexpected promotion. Back-patch to 9.1 where promote signal file was introduced. Problem reported by Feike Steenbergen. Original patch by Michael Paquier, modified by me. Discussion: 20150528100705.4686.91426@wrigleys.postgresql.org <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96f6a0cb41ee06673960019f0026b1b0fd1e644d">http://git.postgresql.org/pg/commitdiff/96f6a0cb41ee06673960019f0026b1b0fd1e644d</a></li>

<li>Correct description of PageHeaderData layout in documentation. Back-patch to 9.3 where PageHeaderData layout was changed. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1b28885177aff123cafe5a7f694555af33ad4e9">http://git.postgresql.org/pg/commitdiff/a1b28885177aff123cafe5a7f694555af33ad4e9</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>psql: Generic tab completion support for enum and bool GUCs. Author: Pavel Stehule Reviewed-By: Andres Freund Discussion: 5594FE7A.5050205@iki.fi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ae16798f0f9d2d941e50062b579c28c9b946c9e">http://git.postgresql.org/pg/commitdiff/3ae16798f0f9d2d941e50062b579c28c9b946c9e</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Lock all relations referred to in updatable views. Even views considered "simple" enough to be automatically updatable may have mulitple relations involved (eg: in a where clause). We need to make sure and lock those relations when rewriting the query. Back-patch to 9.3 where updatable views were added. Pointed out by Andres, patch thanks to Dean Rasheed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3e0ddd403d74b161cd83cdccbb0adc45788934f">http://git.postgresql.org/pg/commitdiff/c3e0ddd403d74b161cd83cdccbb0adc45788934f</a></li>

<li>Fix typo in setrefs.c. We're adding OIDs, not TIDs, to invalItems. Pointed out by Etsuro Fujita. Back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e460d4bd633462bdee34c61ad7c073aec0a941a">http://git.postgresql.org/pg/commitdiff/1e460d4bd633462bdee34c61ad7c073aec0a941a</a></li>

<li>Fix typo in create_policy.sgml. WTIH -&gt; WITH. Pointed out by Dmitriy Olshevskiy. Backpatch to 9.5 where create_policy.sgml was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7bf508e6b527bc6c28cd5ddba99a23d27780e94">http://git.postgresql.org/pg/commitdiff/e7bf508e6b527bc6c28cd5ddba99a23d27780e94</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix minor bug in regexp makesearch() function. The list-wrangling here was done wrong, allowing the same state to get put into the list twice. The following loop then would clone it twice. The second clone would wind up with no inarcs, so that there was no observable misbehavior AFAICT, but a useless state in the finished NFA isn't an especially good thing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91cf3135b9079bf44ee9b4b445531987cdb7deee">http://git.postgresql.org/pg/commitdiff/91cf3135b9079bf44ee9b4b445531987cdb7deee</a></li>

<li>Fix setrefs.c comment properly. The "typo" alleged in commit 1e460d4bd was actually a comment that was correct when written, but I missed updating it in commit b5282aa89. Use a slightly less specific (and hopefully more future-proof) description of what is collected. Back-patch to 9.2 where that commit appeared, and revert the comment to its then-entirely-correct state before that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87efbc2be12b07c77b7fa2d54d029329f56d6677">http://git.postgresql.org/pg/commitdiff/87efbc2be12b07c77b7fa2d54d029329f56d6677</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Spell checking <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/103ef2021110e66c2b3b87af4b0a901683b0275e">http://git.postgresql.org/pg/commitdiff/103ef2021110e66c2b3b87af4b0a901683b0275e</a></li>

<li>Update SQL features list <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2ae8f1e35d85e4e24a724ef64c47deb126368f7">http://git.postgresql.org/pg/commitdiff/b2ae8f1e35d85e4e24a724ef64c47deb126368f7</a></li>

<li>doc: Remove dead links. The web pages of Andy Dong at Berkeley don't exist anymore, and he is no longer there. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c193b8ca9d05e8167b6deb057c06a7580fa517a3">http://git.postgresql.org/pg/commitdiff/c193b8ca9d05e8167b6deb057c06a7580fa517a3</a></li>

<li>Add noreturn attribute. per gcc -Wsuggest-attribute=noreturn <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5217d696833b15ed5d3c5e858e7f20836defa95">http://git.postgresql.org/pg/commitdiff/b5217d696833b15ed5d3c5e858e7f20836defa95</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>When trace_lwlocks is used, identify individual lwlocks by name. Naming the individual lwlocks seems like something that may be useful for other types of debugging, monitoring, or instrumentation output, but this commit just implements it for the specific case of trace_lwlocks. Patch by me, reviewed by Amit Kapila and Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa65de042f5828968f2f6cd65f45c543a40cc3e6">http://git.postgresql.org/pg/commitdiff/aa65de042f5828968f2f6cd65f45c543a40cc3e6</a></li>

<li>Fix build problems in commit aa65de042f5828968f2f6cd65f45c543a40cc3e6. The previous way didn't work for vpath builds, and make distprep was busted too. Reported off-list by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ccc4e972eb85829a8fe8d39fc5ce4d770ac2e2e">http://git.postgresql.org/pg/commitdiff/2ccc4e972eb85829a8fe8d39fc5ce4d770ac2e2e</a></li>

<li>Install lwlocknames.h even in vpath builds. Per buildfarm member crake. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7212a9997e592fe72e2095a5f4f37071787d849">http://git.postgresql.org/pg/commitdiff/a7212a9997e592fe72e2095a5f4f37071787d849</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Fix an O(N^2) problem in foreign key references. Commit 45ba424f improved foreign key lookups during bulk updates when the FK value does not change. When restoring a schema dump from a database with many (say 100,000) foreign keys, this cache would grow very big and every ALTER TABLE command was causing an InvalidateConstraintCacheCallBack(), which uses a sequential hash table scan. This could cause a severe performance regression in restoring a schema dump (including during pg_upgrade). The patch uses a heuristic method of detecting when the hash table should be destroyed and recreated. InvalidateConstraintCacheCallBack() adds the current size of the hash table to a counter. When that sum reaches 1,000,000, the hash table is flushed. This fixes the regression without noticeable harm to the bulk update use case. Jan Wieck. Backpatch to 9.3 where the performance regression was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ddc72887a012f6a8b85707ef27d85c274faf53d">http://git.postgresql.org/pg/commitdiff/5ddc72887a012f6a8b85707ef27d85c274faf53d</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>pg_dump, pg_upgrade: allow postgres/template1 tablespace moves. Modify pg_dump to restore postgres/template1 databases to non-default tablespaces by switching out of the database to be moved, then switching back. Also, to fix potentially cases where the old/new tablespaces might not match, fix pg_upgrade to process new/old tablespaces separately in all cases. Report by Marti Raudsepp Patch by Marti Raudsepp, me Backpatch through 9.0 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f8d090b8966ef098f45537d42e47e296210145f">http://git.postgresql.org/pg/commitdiff/7f8d090b8966ef098f45537d42e47e296210145f</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Fix the fastpath rule for jsonb_concat with an empty operand. To prevent perverse results, we now only return the other operand if it's not scalar, and if both operands are of the same kind (array or object). Original bug complaint and patch from Oskari Saarenmaa, extended by me to cover the cases of different kinds of jsonb. Backpatch to 9.5 where jsonb_concat was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7e3ac2d51130d707792e657facc58c160182342">http://git.postgresql.org/pg/commitdiff/e7e3ac2d51130d707792e657facc58c160182342</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Thomas Munro sent in a patch to use memcmp() rather than numeric_cmp() in certain aggregation scenarios.</p>

<p>Thomas Munro sent in a patch to stabilize the pg_rewind TAP test.</p>

<p>Thomas Munro sent in another revision of a patch to add a GUC which allows synchronous commit to mean "apply."</p>

<p>Petr Jelinek and Michael Paquier traded patches to allow CREATE EXTENSION ... CASCADE, which would include all its dependencies.</p>

<p>Alexander Korotkov sent in another revision of a patch to add CREATE ACCESS METHOD.</p>

<p>Andres Freund sent in a PoC patch to separate Buffer LWLocks.</p>

<p>Etsuro Fujita sent in another revision of a patch to make FDW join pushdown and EvalPlanQual work together.</p>

<p>Pavel St&Auml;&rsaquo;hule and Alexander Shulgin traded patches to make it possible to get the explain of a running query by sending the backend a signal.</p>

<p>Michael Paquier sent in a patch to fix some messages in the SSL info functions.</p>

<p>Nathan Wagner sent in a patch to adjust the GEQO mutation swaps to avoid having to re-pick ties, and change the initialization and shuffling algorithm for the gene array to use an in-place Fisher-Yates shuffling algorithm.</p>

<p>Rajeev Rastogi sent in a patch to allow dumping memory context information to a file.</p>

<p>Jeff Janes sent in a patch to fix the tab completion for ALTER INDEX in psql.</p>

<p>Rugal Bernstein sent in a patch to add a better translation version of Chinese for psql/po/zh_CN.po file.</p>

<p>Robert Haas sent in another revision of a patch to allow the isolation tester to have &gt;1 waiting process.</p>

<p>Thomas Munro sent in another revision of a patch to make psql's tab-complete.c easier to understand and maintain.</p>

<p>Michael Paquier sent in another revision of a patch to improve test coverage of extensions with pg_dump.</p>

<p>Stephen Frost sent in two more revisions of a patch to improve logging of TAP tests.</p>

<p>Robbie Harwood sent in another revision of a patch to add GSSAPI encryption support.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in four more revisions of a patch to add a parse_ident() function.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench progress with timestamp.</p>

<p>Etsuro Fujita sent in another revision of a patch to improve create_foreignscan_plan/ExecInitForeignScan.</p>

<p>Ashutosh Bapat sent in another revision of a patch to add tests for background worker notify.</p>

<p>Andres Freund sent in another revision of a patch to update the documented compiler requirements.</p>

<p>David Fetter sent in a patch to rework some test for contrib/tablefunc for legibility.</p>

<p>Michael Paquier sent in a patch to fix a typo in timeline.h regarding the meaning of infinity for a timeline history entry.</p>

<p>Fujii Masao sent in two more revisions of a patch to improve cancelbackup messages.</p>

<p>Fabien COELHO sent in another revision of a patch to add GUCs checkpoint_sort and checkpoint_warning.</p>

<p>Stephen Frost sent in a patch to remove the notion of SECURITY_ROW_LEVEL_DISABLED entirely.</p>

<p>Beena Emerson sent in another revision of a patch to add support for N synchronous standby servers.</p>

<p>Takashi Horikawa sent in four revisions of a patch to partition checkpointing.</p>

<p>&ETH;&scaron;&ETH;&frac34;&Ntilde;&Ntilde;&sbquo;&Ntilde; &ETH;&scaron;&Ntilde;&fnof;&ETH;&middot;&ETH;&frac12;&ETH;&micro;&Ntilde;&dagger;&ETH;&frac34;&ETH;&sup2; (Kostya Kuznetzov) sent in a patch to add a new GiST vacuum.</p>

<p>Alexander Korotkov sent in another revision of a patch to rework the access method interface.</p>

<p>YUriy Zhuravlev sent in another revision of a patch to move PinBuffer and UnpinBuffer to atomics.</p>

<p>Etsuro Fujita sent in a patch to update some comments in pathnode.c.</p>

<p>Andrew Dunstan sent in a patch to fix the way jsonbconcat works.</p>

<p>Rahila Syed sent in two more revisions of a patch to add a VACUUM progress checker.</p>

<p>Amit Kapila sent in another revision of a patch to speed up clog access by increasing CLOG buffers.</p>

<p>Teodor Sigaev sent in another revision of a patch to add a --strict-names option to pg_dump.</p>

<p>David Rowley sent in another revision of a patch to make timestamptz_out less slow.</p>

<p>Charles Clavadetscher sent in four revisions of a patch to add COMMENT ON POLICY.</p>

<p>Kaigai Kouhei sent in a patch to fix a regtest policy for 9.2.</p>

<p>Ildus Kurbangaliev sent in another revision of a patch to refactor LWLock tranches.</p>

<p>Dean Rasheed and Stephen Frost traded patches to refactor RLS.</p>