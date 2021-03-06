---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 août 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/08/15/Nouvelles-hebdomadaires-de-PostgreSQL-12-août-2012"
---


<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-08/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-08/msg00003.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>fsync backup_label after pg_start_backup(). Dave Kerr 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f04fc67f71f7cb29ccedb2e7ddf443b9e52b958">http://git.postgresql.org/pg/commitdiff/0f04fc67f71f7cb29ccedb2e7ddf443b9e52b958</a></li>

<li>Fix minor bug in XLogFileRead() that accidentally worked. Cascading replication copied the incoming file into pg_xlog but didn't set path correctly, so the first attempt to open file failed causing it to loop around and look for file in pg_xlog. So the earlier coding worked, but accidentally rather than by design. Spotted by Fujii Masao, fix by Fujii Masao and Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8143a56854a4f46968b12badb5b008f448e08ef5">http://git.postgresql.org/pg/commitdiff/8143a56854a4f46968b12badb5b008f448e08ef5</a></li>

<li>Doc correction to point out that 9.2+ can overwrite pg_xlog files. Noted by Noah Misch, patch by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42020a89c740846870f9e42274e8730f1986edd3">http://git.postgresql.org/pg/commitdiff/42020a89c740846870f9e42274e8730f1986edd3</a></li>

<li>Force archive_status of .done for xlogs created by dearchival/replication. This prevents spurious attempts to archive xlog files after promotion of standby, a bug introduced by cascading replication patch in 9.2. Fujii Masao, simplified and extended to cover streaming by Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f4b8a4f4f7a2d683ff79ab59d3693714b965e3d">http://git.postgresql.org/pg/commitdiff/6f4b8a4f4f7a2d683ff79ab59d3693714b965e3d</a></li>

<li>Ensure all replication message info is available and correct via WalRcv 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87d8bd7c9fdc63d892968e1248e639c8078af615">http://git.postgresql.org/pg/commitdiff/87d8bd7c9fdc63d892968e1248e639c8078af615</a></li>

<li>Turn off WalSender keepalives by default, users can enable if desired 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da4efa13d801ccc179f1d2c24d8a60c4a2f8ede9">http://git.postgresql.org/pg/commitdiff/da4efa13d801ccc179f1d2c24d8a60c4a2f8ede9</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix redundant wording 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a42a3ffd898114e6e19dafe0911b23921b288f4">http://git.postgresql.org/pg/commitdiff/3a42a3ffd898114e6e19dafe0911b23921b288f4</a></li>

<li>Fix typo in comment 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92ec0370eb65c4f059f2b60ee6e458b312bb7cbf">http://git.postgresql.org/pg/commitdiff/92ec0370eb65c4f059f2b60ee6e458b312bb7cbf</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_upgrade file share violation on Windows created by the commit 4741e9afb93f0d769655b2d18c2b73b86f281010. This was done by adding an optional second log file parameter to exec_prog(), and closing and reopening the log file between system() calls. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbcfa90bb8ceb77f7763b6ae16bcbb777849ccee">http://git.postgresql.org/pg/commitdiff/fbcfa90bb8ceb77f7763b6ae16bcbb777849ccee</a></li>

<li>Fix to_char(), to_date(), and to_timestamp() to handle negative/BC century specifications just like positive/AD centuries. Previously the behavior was either wrong or inconsistent with positive/AD handling. Centuries without years now always assume the first year of the century, which is now documented. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac78c4178bec7b252d22a39515ad6efd6c1a7d7e">http://git.postgresql.org/pg/commitdiff/ac78c4178bec7b252d22a39515ad6efd6c1a7d7e</a></li>

<li>Add additional C comments for to_date/to_char() fixes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2751740ab5c01b2ffc8afdb86b4c2c2bf37203e0">http://git.postgresql.org/pg/commitdiff/2751740ab5c01b2ffc8afdb86b4c2c2bf37203e0</a></li>

<li>Fix pgtest to return proper error code based on 'make' return code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99ed473acb47cb0cda47032e3d2392beca569d59">http://git.postgresql.org/pg/commitdiff/99ed473acb47cb0cda47032e3d2392beca569d59</a></li>

<li>Adjust pgtest coding to be less complex. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/914b1301cc7b4c1ffba9f4c037e6e76f8e787e05">http://git.postgresql.org/pg/commitdiff/914b1301cc7b4c1ffba9f4c037e6e76f8e787e05</a></li>

<li>Prevent pg_upgrade from crashing if it can't write to the current directory. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85642ec00b5e0c58d2504b10c079693b8fb28cc5">http://git.postgresql.org/pg/commitdiff/85642ec00b5e0c58d2504b10c079693b8fb28cc5</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix memory leaks in event trigger code. Spotted by Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eea65943c605215456d0f55f65e1ec802f5e221e">http://git.postgresql.org/pg/commitdiff/eea65943c605215456d0f55f65e1ec802f5e221e</a></li>

<li>Fix cache flush hazard in event trigger cache. Bug spotted by Jeff Davis using -DCLOBBER_CACHE_ALWAYS. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21786db81fca3fca0a17da3f58cc6590615e1580">http://git.postgresql.org/pg/commitdiff/21786db81fca3fca0a17da3f58cc6590615e1580</a></li>

<li>Make psql -1 &lt; file behave as expected. Previously, the -1 option was silently ignored. Also, emit an error if -1 is used in a context where it won't be respected, to avoid user confusion. Original patch by Fabien COELHO, but this version is quite different from the original submission. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be690e291d59e8d0c9f4df59abe09f1ff6cc0da9">http://git.postgresql.org/pg/commitdiff/be690e291d59e8d0c9f4df59abe09f1ff6cc0da9</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Tweak new Perl pgindent for compatibility with middle-aged Perls. We seem to have a rough policy that our Perl scripts should work with Perl 5.8, so make this one do so. Main change is to not use the newfangled \h character class in regexes; "[ \t]" is a serviceable replacement. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5078be480412790e4f1b2aeda04f8c65fc7a3b93">http://git.postgresql.org/pg/commitdiff/5078be480412790e4f1b2aeda04f8c65fc7a3b93</a></li>

<li>Implement SQL-standard LATERAL subqueries. This patch implements the standard syntax of LATERAL attached to a sub-SELECT in FROM, and also allows LATERAL attached to a function in FROM, since set-returning function calls are expected to be one of the principal use-cases. The main change here is a rewrite of the mechanism for keeping track of which relations are visible for column references while the FROM clause is being scanned. The parser "namespace" lists are no longer lists of bare RTEs, but are lists of ParseNamespaceItem structs, which carry an RTE pointer as well as some visibility-controlling flags. Aside from supporting LATERAL correctly, this lets us get rid of the ancient hacks that required rechecking subqueries and JOIN/ON and function-in-FROM expressions for invalid references after they were initially parsed. Invalid column references are now always correctly detected on sight. In passing, remove assorted parser error checks that are now dead code by virtue of our having gotten rid of add_missing_from, as well as some comments that are obsolete for the same reason. (It was mainly add_missing_from that caused so much fudging here in the first place.) The planner support for this feature is very minimal, and will be improved in future patches. It works well enough for testing purposes, though. catversion bump forced due to new field in RangeTblEntry. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ebaaa49445eb1ba7b299bbea3a477d4e4c0430b">http://git.postgresql.org/pg/commitdiff/5ebaaa49445eb1ba7b299bbea3a477d4e4c0430b</a></li>

<li>Fix TwoPhaseGetDummyBackendId(). This was broken in commit ed0b409d22346b1b027a4c2099ca66984d94b6dd, which revised the GlobalTransactionData struct to not include the associated PGPROC as its first member, but overlooked one place where a cast was used in reliance on that equivalence. The most effective way of fixing this seems to be to create a new function that looks up the GlobalTransactionData struct given the XID, and make both TwoPhaseGetDummyBackendId and TwoPhaseGetDummyProc rely on that. Per report from Robert Ross. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db108349bf7fe7fe82e2ff32e42436cfbc4f37dc">http://git.postgresql.org/pg/commitdiff/db108349bf7fe7fe82e2ff32e42436cfbc4f37dc</a></li>

<li>Update isolation tests' README file. The directions explaining about running the prepared-transactions test were not updated in commit ae55d9fbe3871a5e6309d9b91629f1b0ff2b8cba. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/633f2fbd8835b5a46959e2fda88003f45f7fdba0">http://git.postgresql.org/pg/commitdiff/633f2fbd8835b5a46959e2fda88003f45f7fdba0</a></li>

<li>Merge parser's p_relnamespace and p_varnamespace lists into a single list. Now that we are storing structs in these lists, the distinction between the two lists can be represented with a couple of extra flags while using only a single list. This simplifies the code and should save a little bit of palloc traffic, since the majority of RTEs are represented in both lists anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f630157496a70f8ece4fd4c27eeead88c74b9015">http://git.postgresql.org/pg/commitdiff/f630157496a70f8ece4fd4c27eeead88c74b9015</a></li>

<li>Centralize the logic for detecting misplaced aggregates, window funcs, etc. Formerly we relied on checking after-the-fact to see if an expression contained aggregates, window functions, or sub-selects when it shouldn't. This is grotty, easily forgotten (indeed, we had forgotten to teach DefineIndex about rejecting window functions), and none too efficient since it requires extra traversals of the parse tree. To improve matters, define an enum type that classifies all SQL sub-expressions, store it in ParseState to show what kind of expression we are currently parsing, and make transformAggregateCall, transformWindowFuncCall, and transformSubLink check the expression type and throw error if the type indicates the construct is disallowed. This allows removal of a large number of ad-hoc checks scattered around the code base. The enum type is sufficiently fine-grained that we can still produce error messages of at least the same specificity as before. Bringing these error checks together revealed that we'd been none too consistent about phrasing of the error messages, so standardize the wording a bit. Also, rewrite checking of aggregate arguments so that it requires only one traversal of the arguments, rather than up to three as before. In passing, clean up some more comments left over from add_missing_from support, and annotate some tests that I think are dead code now that that's gone. (I didn't risk actually removing said dead code, though.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eaccfded98a9c677d3a2e849c1747ec90e8596a6">http://git.postgresql.org/pg/commitdiff/eaccfded98a9c677d3a2e849c1747ec90e8596a6</a></li>

<li>Update overlooked comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a67d6d9a78fc7ae84e37b8984f2ecbb40a587400">http://git.postgresql.org/pg/commitdiff/a67d6d9a78fc7ae84e37b8984f2ecbb40a587400</a></li>

<li>Support having multiple Unix-domain sockets per postmaster. Replace unix_socket_directory with unix_socket_directories, which is a list of socket directories, and adjust postmaster's code to allow zero or more Unix-domain sockets to be created. This is mostly a straightforward change, but since the Unix sockets ought to be created after the TCP/IP sockets for safety reasons (better chance of detecting a port number conflict), AddToDataDirLockFile needs to be fixed to support out-of-order updates of data directory lockfile lines. That's a change that had been foreseen to be necessary someday anyway. Honza Horak, reviewed and revised by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9b0cbe98bd783e24a8c4d8d8ac472a494b81292">http://git.postgresql.org/pg/commitdiff/c9b0cbe98bd783e24a8c4d8d8ac472a494b81292</a></li>

<li>Fix dependencies generated during ALTER TABLE ADD CONSTRAINT USING INDEX. This command generated new pg_depend entries linking the index to the constraint and the constraint to the table, which match the entries made when a unique or primary key constraint is built de novo. However, it did not bother to get rid of the entries linking the index directly to the table. We had considered the issue when the ADD CONSTRAINT USING INDEX patch was written, and concluded that we didn't need to get rid of the extra entries. But this is wrong: ALTER COLUMN TYPE wasn't expecting such redundant dependencies to exist, as reported by Hubert Depesz Lubaczewski. On reflection it seems rather likely to break other things as well, since there are many bits of code that crawl pg_depend for one purpose or another, and most of them are pretty naive about what relationships they're expecting to find. Fortunately it's not that hard to get rid of the extra dependency entries, so let's do that. Back-patch to 9.1, where ALTER TABLE ADD CONSTRAINT USING INDEX was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b53800355f9b3a4a4ee6e5e610accab77af8d1c3">http://git.postgresql.org/pg/commitdiff/b53800355f9b3a4a4ee6e5e610accab77af8d1c3</a></li>

<li>Add link from COPY ref page to psql \copy. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83af58f6b5657840f5924332fccecca1e3556abe">http://git.postgresql.org/pg/commitdiff/83af58f6b5657840f5924332fccecca1e3556abe</a></li>

<li>Fix some issues with LATERAL(SELECT UNION ALL SELECT). The LATERAL marking has to be propagated down to the UNION leaf queries when we pull them up. Also, fix the formerly stubbed-off set_append_rel_pathlist(). It does already have enough smarts to cope with making a parameterized Append path at need; it just has to not assume that there *must* be an unparameterized path. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e76af54137c051cafcb1e39f68383a31d1d55ff6">http://git.postgresql.org/pg/commitdiff/e76af54137c051cafcb1e39f68383a31d1d55ff6</a></li>

<li>More fixes for planner's handling of LATERAL. Re-allow subquery pullup for LATERAL subqueries, except when the subquery is below an outer join and contains lateral references to relations outside that outer join. If we pull up in such a case, we risk introducing lateral cross-references into outer joins' ON quals, which is something the code is entirely unprepared to cope with right now; and I'm not sure it'll ever be worth coping with. Support lateral refs in VALUES (this seems to be the only additional path type that needs such support as a consequence of re-allowing subquery pullup). Put in a slightly hacky fix for joinpath.c's refusal to consider parameterized join paths even when there cannot be any unparameterized ones. This was causing "could not devise a query plan for the given query" failures in queries involving more than two FROM items. Put in an even more hacky fix for distribute_qual_to_rels() being unhappy with join quals that contain references to rels outside their syntactic scope; which is to say, disable that test altogether. Need to think about how to preserve some sort of debugging cross-check here, while not expending more cycles than befits a debugging cross-check. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1774d2c8193a322706f681dd984ac439d3a9dbb">http://git.postgresql.org/pg/commitdiff/c1774d2c8193a322706f681dd984ac439d3a9dbb</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix upper limit of superuser_reserved_connections, add limit for wal_senders. Should be limited to the maximum number of connections excluding autovacuum workers, not including. Add similar check for max_wal_senders, which should never be higher than max_connections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3055ab4fb5839a872bfe354b2b5ac31e6903ed6">http://git.postgresql.org/pg/commitdiff/b3055ab4fb5839a872bfe354b2b5ac31e6903ed6</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in a patch to allow pretty-printing queries.</li>

<li>Alexander Korotkov sent in another revision of the patch to make SP-GiST for ranges more efficient using 2-d mapping and quad-tree.</li>

<li>Pavel Stehule sent in another revision of the patch to allow assigning a single-row query's target list to a corresponding list of psql variables using a new command \gset.</li>

<li>Fujii Masao sent in a patch to fix a bug in pg_trgm.</li>

<li>Jeff Davis sent in another revision of the patch to add 16-bit checksums to data pages.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to improve statistics and selectivity estimation for ranges.</li>

<li>Craig Ringer sent in a patch to implement value_to_json for single-datum conversion.</li>

</ul>