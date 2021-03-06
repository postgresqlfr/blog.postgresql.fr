---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 juillet 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/07/26/Nouvelles-hebdomadaires-de-PostgreSQL-24-juillet-2011"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgbuildfarm client 4.6&nbsp;: 

<a target="_blank" href="https://github.com/PGBuildFarm/client-code">https://github.com/PGBuildFarm/client-code</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-07/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PGDay Porto Alegre</em> est programm&eacute; pour le 19 ao&ucirc;t 2011 &agrave; Porto Alegre (Br&eacute;sil)&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/2011/pgday/rs">http://www.postgresql.org.br/eventos/2011/pgday/rs</a></li>

<li>Postgres Open 2011, conf&eacute;rence ayant pour th&egrave;me les "&eacute;volutions brutales dans l'industrie de la base de donn&eacute;es", aura lieu du 14 au 16 septembre 2011 &agrave; Chicago (Illinois, &Eacute;tats-Unis) &agrave; l'h&ocirc;tel "<em>Westin Michigan Avenue</em>"&nbsp;: 

<a target="_blank" href="http://postgresopen.org">http://postgresopen.org</a></li>

<li>Le <em>PG-Day Denver 2011</em> aura lieu le samedi 17 septembre 2011 dans le campus Auraria pr&egrave;s de Denver, Colorado&nbsp;: 

<a target="_blank" href="http://pgday.consistentstate.com/">http://pgday.consistentstate.com/</a></li>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San Jos&eacute; (Californie, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

<li><em>PGConf.DE 2011</em> est une conf&eacute;rence germanophone tenue le 11 novembre au mus&eacute;e industriel du Rhin &agrave; Oberhausen (Allemagne). L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2011.pgconf.de/">http://2011.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110724">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_opfamily_is_visible. We already have similar functions for many other object types, including operator classes, so it seems like we should have this one, too. Extracted from a larger patch by Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b59d2fe4970e689a50e802960ef0812acaf88221">http://git.postgresql.org/pg/commitdiff/b59d2fe4970e689a50e802960ef0812acaf88221</a></li>

<li>Create a "fast path" for acquiring weak relation locks. When an AccessShareLock, RowShareLock, or RowExclusiveLock is requested on an unshared database relation, and we can verify that no conflicting locks can possibly be present, record the lock in a per-backend queue, stored within the PGPROC, rather than in the primary lock table. This eliminates a great deal of contention on the lock manager LWLocks. This patch also refactors the interface between GetLockStatusData() and pg_lock_status() to be a bit more abstract, so that we don't rely so heavily on the lock manager's internal representation details. The new fast path lock structures don't have a LOCK or PROCLOCK structure to return, so we mustn't depend on that for purposes of listing outstanding locks. Review by Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cba8999b343648c4c528432ab3d51400194e93b">http://git.postgresql.org/pg/commitdiff/3cba8999b343648c4c528432ab3d51400194e93b</a></li>

<li>Avoid index rebuild for no-rewrite ALTER TABLE .. ALTER TYPE. Noah Misch. Review and minor cosmetic changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/367bc426a1c22b9f6badb06cd41fc438fd034639">http://git.postgresql.org/pg/commitdiff/367bc426a1c22b9f6badb06cd41fc438fd034639</a></li>

<li>Remove superfluous variable. Reported by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdd61237d6265fa355afa772ca3eee39e4905bcb">http://git.postgresql.org/pg/commitdiff/cdd61237d6265fa355afa772ca3eee39e4905bcb</a></li>

<li>Some refinement for the "fast path" lock patch. 1. In GetLockStatusData, avoid initializing instance before we've ensured that the array is large enough. Otherwise, if repalloc moves the block around, we're hosed. 2. Add the word "Relation" to the name of some identifiers, to avoid assuming that the fast-path mechanism will only ever apply to relations (though these particular parts certainly will). Some of the macros could possibly use similar treatment, but the names are getting awfully long already. 3. Add a missing word to comment in AtPrepare_Locks(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e5ac74c1249820ca55481223a95b9124b4a4f95">http://git.postgresql.org/pg/commitdiff/8e5ac74c1249820ca55481223a95b9124b4a4f95</a></li>

<li>Minor improvement to pg_seclabel documentation. This is a bit more consistent with the way pg_description is documented, and also include a useful cross-link. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/550cd074f9436c0500c1718e792d3d72a304bf8b">http://git.postgresql.org/pg/commitdiff/550cd074f9436c0500c1718e792d3d72a304bf8b</a></li>

<li>Improve sepgsql and SECURITY LABEL documentation. KaiGai Kohei, based on feedback from Yeb Havinga, with some corrections by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d79a601fd9ec59772395d16b33fe79296021a350">http://git.postgresql.org/pg/commitdiff/d79a601fd9ec59772395d16b33fe79296021a350</a></li>

<li>Support SECURITY LABEL on databases, tablespaces, and roles. This requires a new shared catalog, pg_shseclabel. Along the way, fix the security_label regression tests so that they don't monkey with the labels of any pre-existing objects. This is unlikely to matter in practice, since only the label for the "dummy" provider was being manipulated. But this way still seems cleaner. KaiGai Kohei, with fairly extensive hacking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/463f2625a5fb183b6a8925ccde98bb3889f921d9">http://git.postgresql.org/pg/commitdiff/463f2625a5fb183b6a8925ccde98bb3889f921d9</a></li>

<li>Unbreak unlogged tables. I broke this in commit 5da79169d3e9f0fab47da03318c44075b3f824c5, which was obviously insufficiently well tested. Add some regression tests in the hope of making future slip-ups more likely to be noticed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f1be5a67a758499beab0082b6e63b3040913268">http://git.postgresql.org/pg/commitdiff/6f1be5a67a758499beab0082b6e63b3040913268</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove claim that the project is not represented in the SQL working group We have a few people involved there now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ed8f6c517ba6bada6bfb9a4dd4216e3b97bc2ba">http://git.postgresql.org/pg/commitdiff/7ed8f6c517ba6bada6bfb9a4dd4216e3b97bc2ba</a></li>

<li>Note that information_schema.sql_languages was removed in SQL:2008 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3835855589d8fe8bd5ea0fa51a5a539756223612">http://git.postgresql.org/pg/commitdiff/3835855589d8fe8bd5ea0fa51a5a539756223612</a></li>

<li>Put inline declaration before return type. gcc -Wextra complains that the other way around is obsolescent, and this was the only place where it was written in this order. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf6be7af2532da6674dcb9335c0953044a787427">http://git.postgresql.org/pg/commitdiff/bf6be7af2532da6674dcb9335c0953044a787427</a></li>

<li>Change debug message from ereport to elog 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30f854537d0d2e9220976fe7016c909daabea612">http://git.postgresql.org/pg/commitdiff/30f854537d0d2e9220976fe7016c909daabea612</a></li>

<li>Fix typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6307fff3586294214e3f256035b82bbba9a9054a">http://git.postgresql.org/pg/commitdiff/6307fff3586294214e3f256035b82bbba9a9054a</a></li>

<li>Change EDITOR_LINENUMBER_SWITCH to an environment variable. Also change "switch" to "arg" because "switch" is a bit of a sloppy term. So the environment variable is called PSQL_EDITOR_LINENUMBER_ARG. Set "+" as hardcoded default value on Unix (since "vi" is the hardcoded default editor), so many users won't have to configure this at all. Move the documentation around a bit to centralize the editor configuration under environment variables, rather than repeating bits of it under every backslash command that invokes an editor. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79b3ca06d820032ad84446e0a021b56422172d86">http://git.postgresql.org/pg/commitdiff/79b3ca06d820032ad84446e0a021b56422172d86</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Made ecpglib write double with a precision of 15 digits. Patch originally by Akira Kurosawa &lt;kurosawa-akira@mxc.nes.nec.co.jp&gt;. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f8a273c4d2433de57f6f0356f44ab47b7387641">http://git.postgresql.org/pg/commitdiff/8f8a273c4d2433de57f6f0356f44ab47b7387641</a></li>

<li>Adapted expected result for latest change to ecpglib. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3406dd22fdd794d90c75a1272a57db8faa7c826d">http://git.postgresql.org/pg/commitdiff/3406dd22fdd794d90c75a1272a57db8faa7c826d</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add GET STACKED DIAGNOSTICS plpgsql command to retrieve exception info. This is more SQL-spec-compliant, more easily extensible, and better performing than the old method of inventing special variables. Pavel Stehule, reviewed by Shigeru Hanada and David Wheeler 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d4890c0c5d27dfdf7d1a8816d7bdcdba3c39d21">http://git.postgresql.org/pg/commitdiff/3d4890c0c5d27dfdf7d1a8816d7bdcdba3c39d21</a></li>

<li>Rewrite libxml error handling to be more robust. libxml reports some errors (like invalid xmlns attributes) via the error handler hook, but still returns a success indicator to the library caller. This causes us to miss some errors that are important to report. Since the "generic" error handler hook doesn't know whether the message it's getting is for an error, warning, or notice, stop using that and instead start using the "structured" error handler hook, which gets enough information to be useful. While at it, arrange to save and restore the error handler hook setting in each libxml-using function, rather than assuming we can set and forget the hook. This should improve the odds of working nicely with third-party libraries that also use libxml. In passing, volatile-ize some local variables that get modified within PG_TRY blocks. I noticed this while testing with an older gcc version than I'd previously tried to compile xml.c with. Florian Pflug and Tom Lane, with extensive review/testing by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cacd42d62cb2ddf32135b151f627780a5509780f">http://git.postgresql.org/pg/commitdiff/cacd42d62cb2ddf32135b151f627780a5509780f</a></li>

<li>Ensure that xpath() escapes special characters in string values. Without this it's possible for the output to not be legal XML, as illustrated by the added regression test cases. NB: this change will need to be called out as an incompatibility in the 9.2 release notes, since it's possible somebody was relying on the old behavior, even though it's clearly wrong. Florian Pflug, reviewed by Radoslaw Smogura 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aaf15e5c1cf8d2c27d2f9841343f00027762cb4e">http://git.postgresql.org/pg/commitdiff/aaf15e5c1cf8d2c27d2f9841343f00027762cb4e</a></li>

<li>Make xpath() do something useful with XPath expressions that return scalars. Previously, xpath() simply returned an empty array if the expression did not yield a node set. This is useless for expressions that return scalars, such as one with name() at the top level. Arrange to return the scalar value as a single-element xml array, instead. (String values will be suitably escaped.) This change will also cause xpath_exists() to return true, not false, for such expressions. Florian Pflug, reviewed by Radoslaw Smogura 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ce7676aa03a2501fde949fea211ba5cd84c2ded">http://git.postgresql.org/pg/commitdiff/0ce7676aa03a2501fde949fea211ba5cd84c2ded</a></li>

<li>Fix PQsetvalue() to avoid possible crash when adding a new tuple. PQsetvalue unnecessarily duplicated the logic in pqAddTuple, and didn't duplicate it exactly either --- pqAddTuple does not care what is in the tuple-pointer array positions beyond the last valid entry, whereas the code in PQsetvalue assumed such positions would contain NULL. This led to possible crashes if PQsetvalue was applied to a PGresult that had previously been enlarged with pqAddTuple, for instance one built from a server query. Fix by relying on pqAddTuple instead of duplicating logic, and not assuming anything about the contents of res-&gt;tuples[res-&gt;ntups]. Back-patch to 8.4, where PQsetvalue was introduced. Andrew Chernow 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9f0dbc39df88ea7672352d3e7070d2603491bec">http://git.postgresql.org/pg/commitdiff/a9f0dbc39df88ea7672352d3e7070d2603491bec</a></li>

<li>Rethink behavior of CREATE OR REPLACE during CREATE EXTENSION. The original implementation simply did nothing when replacing an existing object during CREATE EXTENSION. The folly of this was exposed by a report from Marc Munro: if the existing object belongs to another extension, we are left in an inconsistent state. We should insist that the object does not belong to another extension, and then add it to the current extension if not already a member. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/988cccc620dd8c16d77f88ede167b22056176324">http://git.postgresql.org/pg/commitdiff/988cccc620dd8c16d77f88ede167b22056176324</a></li>

<li>Use OpenSSL's SSL_MODE_ACCEPT_MOVING_WRITE_BUFFER flag. This disables an entirely unnecessary "sanity check" that causes failures in nonblocking mode, because OpenSSL complains if we move or compact the write buffer. The only actual requirement is that we not modify pending data once we've attempted to send it, which we don't. Per testing and research by Martin Pihlak, though this fix is a lot simpler than his patch. I put the same change into the backend, although it's less clear whether it's necessary there. We do use nonblock mode in some situations in streaming replication, so seems best to keep the same behavior in the backend as in libpq. Back-patch to all supported releases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0c23026b2499ba9d6797359241ade076a5a677d">http://git.postgresql.org/pg/commitdiff/d0c23026b2499ba9d6797359241ade076a5a677d</a></li>

<li>Improve libpq's error reporting for SSL failures. In many cases, pqsecure_read/pqsecure_write set up useful error messages, which were then overwritten with useless ones by their callers. Fix this by defining the responsibility to set an error message to be entirely that of the lower-level function when using SSL. Back-patch to 8.3; the code is too different in 8.2 to be worth the trouble. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fee476da952a1f02f7ccf6e233fb4824c2bf6af4">http://git.postgresql.org/pg/commitdiff/fee476da952a1f02f7ccf6e233fb4824c2bf6af4</a></li>

<li>Fix previous patch so it also works if not USE_SSL (mea culpa). On balance, the need to cover this case changes my mind in favor of pushing all error-message generation duties into the two fe-secure.c routines. So do it that way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bcf23ba4bf8323f875168c5dbc93265a140753e8">http://git.postgresql.org/pg/commitdiff/bcf23ba4bf8323f875168c5dbc93265a140753e8</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Cascading replication feature for streaming log-based replication. Standby servers can now have WALSender processes, which can work with either WALReceiver or archive_commands to pass data. Fully updated docs, including new conceptual terms of sending server, upstream and downstream servers. WALSenders terminated when promote to master. Fujii Masao, review, rework and doc rewrite by Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5286105800c7d5902f98f32e11b209c471c0c69c">http://git.postgresql.org/pg/commitdiff/5286105800c7d5902f98f32e11b209c471c0c69c</a></li>

<li>Introduce sending servers as new category for replication params. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bd8ed31b76fde16ee00c123751e25019e4d9854">http://git.postgresql.org/pg/commitdiff/4bd8ed31b76fde16ee00c123751e25019e4d9854</a></li>

<li>Minor doc additions for cascading replication. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ba77bce9378cb9c5fb89a4d30bf77c2a17b0d64">http://git.postgresql.org/pg/commitdiff/6ba77bce9378cb9c5fb89a4d30bf77c2a17b0d64</a></li>

<li>Remove O(N2) performance issue with multiple SAVEPOINTs. Subtransaction locks now released en masse at main commit, rather than repeatedly re-scanning for locks as we ascend the nested transaction tree. Split transaction state TBLOCK_SUBEND into two states, TBLOCK_SUBCOMMIT and TBLOCK_SUBRELEASE to allow the commit path to be optimised using the existing code in ResourceOwnerRelease() which appears to have been intended for this usage, judging from comments therein. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7cb7122800ec996d4849ce9b4ad3065db19a2aae">http://git.postgresql.org/pg/commitdiff/7cb7122800ec996d4849ce9b4ad3065db19a2aae</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add expected regress output on stricter isolation levels. These new files allow the new FK tests on isolationtester to pass on the serializable and repeatable read isolation levels (which are untested by the buildfarm). Author: Kevin Grittner Reviewed by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0eae1a2eeb6c0e9deffeccad2f9921d8e561fb5">http://git.postgresql.org/pg/commitdiff/a0eae1a2eeb6c0e9deffeccad2f9921d8e561fb5</a></li>

<li>Make isolationtester more robust on locked commands. Noah Misch diagnosed the buildfarm problems in the isolation tests partly as failure to differentiate backends properly; the old code was using backend IDs, which is not good enough because a new backend might use an already used ID. Use PIDs instead. Also, the code was purposely careless about other concurrent activity, because it isn't expected; and in fact, it doesn't affect the vast majority of the time. However, it can be observed that autovacuum can block tables for long enough to cause sporadic failures. The new code accounts for that by ignoring locks held by processes not explicitly declared in our spec file. Author: Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8dfc892327b1a1e14efe110b0f1f267ef56c7a9">http://git.postgresql.org/pg/commitdiff/c8dfc892327b1a1e14efe110b0f1f267ef56c7a9</a></li>

<li>Increase deadlock_timeout to 100ms in FK isolation tests. The previous value of 20ms is dangerously close to the time actually spent just waiting for the deadlock to happen, so on occasion it causes the test to fail simply because the other session didn't get to run early enough, not managing to cause the deadlock that needs to be detected. With this new value, it's expected that most machines on normal load will be able to pass the test. Author: Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6db0e4e0e382cd5683a767424d05a0361af232a">http://git.postgresql.org/pg/commitdiff/d6db0e4e0e382cd5683a767424d05a0361af232a</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, use pg_strudup(), for consistency. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b43fddee4cbc1bca71546e15e898d19bee7bcb1">http://git.postgresql.org/pg/commitdiff/6b43fddee4cbc1bca71546e15e898d19bee7bcb1</a></li>

<li>In pg_upgrade, fix the -l/log option to work on Windows. Also, double-quote the log file name in all places, to allow (on all platforms) log file names with spaces. Back patch to 9.0 and 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17a16eeb7c4fd0c6dce80521247a20d76706b2bb">http://git.postgresql.org/pg/commitdiff/17a16eeb7c4fd0c6dce80521247a20d76706b2bb</a></li>

<li>In pg_upgrade, add C comment about why we don't try to do shared file writes for logging. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43aa40e1551b9e8d30b376de6d6a9b976ae54332">http://git.postgresql.org/pg/commitdiff/43aa40e1551b9e8d30b376de6d6a9b976ae54332</a></li>

<li>In pg_upgrade on Windows, check if the directory is writable by actually creating and removing a file because access() doesn't work on that platform. Backpatch to 9.1 where this check was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/081a5518c0a7dcccfc76a12ae9d593648b68ce53">http://git.postgresql.org/pg/commitdiff/081a5518c0a7dcccfc76a12ae9d593648b68ce53</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Unbreak Windows builds broken by EDITOR_LINENUMBER_ARG change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e399eb74d96270bf1d4a0bb9f4503cac3d90c1e2">http://git.postgresql.org/pg/commitdiff/e399eb74d96270bf1d4a0bb9f4503cac3d90c1e2</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alexander Korotkov sent in two more revisions of the patch to do fast GiST index builds.</li>

<li>Peter Eisentraut sent in a patch to allow reporting of hostnames from pg_hba.conf in error messages.</li>

<li>KaiGai Kohei and Yeb Havinga traded revisions of the patch to create a userspace access vector cache.</li>

<li>Josh Kupershmidt sent in two more revisions of the patch to allow psql's \dd to show constraint comments.</li>

<li>Robert Haas sent in another revision of a patch to enable lazy vxid locks.</li>

<li>Kevin Grittner sent in two revisions of a patch to fix bug 6123.</li>

<li>Robert Haas sent in a patch to eliminate sinval in several places where it was slowing things down.</li>

<li>Alvaro Herrera sent in a patch to catalog NOT NULL constraints.</li>

<li>Josh Kupershmidt sent in a patch to fix some wrong descriptions in \d+, and an patch for 8.4 which documents the fact that it's possible to put comments on index columns.</li>

<li>Hitoshi Harada and Yeb Havinga traded patches to optimize aggregates in JOINs.</li>

<li>Josh Kupershmidt sent in another revision of the patch to fix describe comments in psql.</li>

<li>Laurenz Albe sent in a doc patch explaining more about how foreign data wrappers work from the implementor's point of view.</li>

<li>Florian Pflug sent in a patch, per discussion around a similar issue in JSON, which changes behavior in cases of non-UTF8-encoded content.</li>

<li>Andrew Dunstan sent in a patch to clean up python usage in the source code for PL/PythonU.</li>

</ul>