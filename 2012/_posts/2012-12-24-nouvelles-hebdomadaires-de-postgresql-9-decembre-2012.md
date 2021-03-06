---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 décembre 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/12/24/Nouvelles-hebdomadaires-de-PostgreSQL-9-décembre-2012"
---


<p>Correction de bug avec les versions 9.2.2, 9.1.7, 9.0.11 et 8.4.15. Mettez &agrave; jour d&egrave;s que possible&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/about/news/1430/">http://www.postgresql.org/about/news/1430/</a></p>

<p>PGDG offre maintenant un d&eacute;p&ocirc;t pour les paquets .deb (Debian/Ubuntu)&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/Apt">https://wiki.postgresql.org/wiki/Apt</a></p>

<p>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></p>

<p>La <em>PostgreSQL Session</em> est programm&eacute;e pour le 28 mars 2013 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>E-Maj 1.0.0, une extension PostgreSQL qui offre la possibilit&eacute; de logger les <em>updates</em> faits sur un ou plusieurs ensemble de tables, et de les annuler si besoin est, r&eacute;trogradant l'ensemble de tables &agrave; un &eacute;tat stable pr&eacute;d&eacute;fini&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/emaj/">http://pgfoundry.org/projects/emaj/</a></li>

<li>pg_activity, un utilitaire similaire &agrave; htop pour suivre l'activit&eacute; d'un serveur PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/julmon/pg_activity">https://github.com/julmon/pg_activity</a></li>

<li>pgbouncer 1.5.4, un gestionnaire de connexions l&eacute;ger pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/frs/shownotes.php?release_id=1981">http://pgfoundry.org/frs/shownotes.php?release_id=1981</a></li>

<li>pg_repack 1.1.8, un fork de pg_reorg&nbsp;: 

<a target="_blank" href="http://pgxn.org/dist/pg_repack/">http://pgxn.org/dist/pg_repack/</a></li>

<li>PL/Proxy 2.5, un syst&egrave;me de partitionnement de BDD impl&eacute;ment&eacute; en PL&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/plproxy/">http://pgfoundry.org/projects/plproxy/</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La conf&eacute;rence PGDay du FOSDEM sera tenue juste avant l'ouverture du meeting, le 1er f&eacute;vrier &agrave; Bruxelles, Belgique. Les appels &agrave; conf&eacute;renciers, pour cette conf&eacute;rence et pour le cursus PostgreSQL du FOSDEM, sont lanc&eacute;s&nbsp;: 

<a target="_blank" href="http://fosdem2013.pgconf.eu/callforpapers/">http://fosdem2013.pgconf.eu/callforpapers/</a></li>

<li>Le PGDay 2013 de New-York City aura lieu le 22 mars. La date limite de candidature des conf&eacute;renciers est fix&eacute;e au 7 janvier 2013, midi (heure de New-York). Envois &agrave; l'adresse papers AT nycpug DOT org&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org/speakers">http://pgday.nycpug.org/speakers</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-12/msg00011.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Refactor the code implementing standby-mode logic. It is now easier to see that it's a state machine, making the code easier to understand overall. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a068c391ab0c3f2d3487fd3090a769cc5cb19ba9">http://git.postgresql.org/pg/commitdiff/a068c391ab0c3f2d3487fd3090a769cc5cb19ba9</a></li>

<li>Track the timeline associated with minRecoveryPoint, for more sanity checks. This allows recovery to notice certain incorrect recovery scenarios. If a server has recovered to point X on timeline 5, and you restart recovery, it better be on timeline 5 when it reaches point X again, not on some timeline with a higher ID. This can happen e.g if you a standby server is shut down, a new timeline appears in the WAL archive, and the standby server is restarted. It will try to follow the new timeline, which is wrong because some WAL on the old timeline was already replayed before shutdown. Requires an initdb (or at least pg_resetxlog), because this adds a field to the control file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ce108bf320d23070c53d3437fd3dc799a97310c">http://git.postgresql.org/pg/commitdiff/5ce108bf320d23070c53d3437fd3dc799a97310c</a></li>

<li>Write exact xlog position of timeline switch in the timeline history file. This allows us to do some more rigorous sanity checking for various incorrect point-in-time recovery scenarios, and provides more information for debugging purposes. It will also come handy in the upcoming patch to allow timeline switches to be replicated by streaming replication. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32f4de0adfb2037f1402e40b54a5c4043227363f">http://git.postgresql.org/pg/commitdiff/32f4de0adfb2037f1402e40b54a5c4043227363f</a></li>

<li>Downgrade a status message from LOG to DEBUG2. I never intended this to be anything other than a debugging aid, but forgot to change the level before committing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90991c40ebb4f05800a7a3e4da2df7732a1ebe62">http://git.postgresql.org/pg/commitdiff/90991c40ebb4f05800a7a3e4da2df7732a1ebe62</a></li>

<li>Add pgstatginindex() function to get the size of the GIN pending list. Fujii Masao, reviewed by Kyotaro Horiguchi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/357cbaaeae5bc1f385828be97345e7ea24235f92">http://git.postgresql.org/pg/commitdiff/357cbaaeae5bc1f385828be97345e7ea24235f92</a></li>

<li>Oops, meant to change the comment in writeTimeLineHistory. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d67b06fe3e2811f8c2270b8b2b266bf1480152bc">http://git.postgresql.org/pg/commitdiff/d67b06fe3e2811f8c2270b8b2b266bf1480152bc</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Clarify when to use PageSetLSN/PageGetLSN(). Update README to explain prerequisites for correct access to LSN fields of a page. Independent chunk removed from checksums patch to reduce size of patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c563a2ae1c800c93fe5f41d0427e36bef874ba7">http://git.postgresql.org/pg/commitdiff/1c563a2ae1c800c93fe5f41d0427e36bef874ba7</a></li>

<li>Clarify locking for PageGetLSN() in XLogCheckBuffer() 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a764990d8c07c5f8f6c7ff3e8605d482b6778e0">http://git.postgresql.org/pg/commitdiff/7a764990d8c07c5f8f6c7ff3e8605d482b6778e0</a></li>

<li>Refactor inCommit flag into generic delayChkpt flag. Rename PGXACT-&gt;inCommit flag into delayChkpt flag, and generalise comments to allow use in other situations, such as the forthcoming potential use in checksum patch. Replace wait loop to look for VXIDs with delayChkpt set. No user visible changes, not behaviour changes at present. Simon Riggs, reviewed and rebased by Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f21bb9cfb5646e1793dcc9c0ea697bab99afa523">http://git.postgresql.org/pg/commitdiff/f21bb9cfb5646e1793dcc9c0ea697bab99afa523</a></li>

<li>Avoid holding vmbuffer pin after VACUUM. During VACUUM if we pause to perform a cycle of index cleanup we drop the vmbuffer pin, so we should do the same thing when heap scan completes. This avoids holding vmbuffer pin across the main index cleanup in VACUUM, which could be minutes or hours longer than necessary for correctness. Bug report and suggested fix from Pavan Deolasee 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62656617dbe49cca140f3da588a5e311b3fc35ea">http://git.postgresql.org/pg/commitdiff/62656617dbe49cca140f3da588a5e311b3fc35ea</a></li>

<li>Must not reach consistency before XLOG_BACKUP_RECORD When waiting for an XLOG_BACKUP_RECORD the minRecoveryPoint will be incorrect, so we must not declare recovery as consistent before we have seen the record. Major bug allowing recovery to end too early in some cases, allowing people to see inconsistent db. This patch to HEAD and 9.2, other fix required for 9.1 and 9.0 Simon Riggs and Andres Freund, bug report by Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6aa2e49a878d28fbbbe8efe53c3a729a51a01090">http://git.postgresql.org/pg/commitdiff/6aa2e49a878d28fbbbe8efe53c3a729a51a01090</a></li>

<li>Clarify that COPY FREEZE is not a hard rule. Remove message when FREEZE not honoured, clarify reasons in comments and docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1eb6cee499d19fc9204e059ba37fc2dac32e2f25">http://git.postgresql.org/pg/commitdiff/1eb6cee499d19fc9204e059ba37fc2dac32e2f25</a></li>

<li>Optimize COPY FREEZE with CREATE TABLE also. Jeff Davis, additional test by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f023f929702efc9fd4230267b0f0e8d72ba5067">http://git.postgresql.org/pg/commitdiff/1f023f929702efc9fd4230267b0f0e8d72ba5067</a></li>

<li>Correct xmax test for COPY FREEZE 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef754fb51b8a40c3b3dc0f3cc42f62eff77649db">http://git.postgresql.org/pg/commitdiff/ef754fb51b8a40c3b3dc0f3cc42f62eff77649db</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Attempt to unbreak MSVC builds broken by f21bb9cfb5646e1793dcc9c0ea697bab99afa523. We can't use type uint, so use uint32. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5652e50d5669a8a4d8a282845ea6e26197ae10b">http://git.postgresql.org/pg/commitdiff/d5652e50d5669a8a4d8a282845ea6e26197ae10b</a></li>

<li>Revert "Add mode where contrib installcheck runs each module in a separately named database." This reverts commit e2b3c21b05c78c3a726b189242e41d4aa4422bf1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc5c1bbbeb3e00699f87407eebf2933595e9d93b">http://git.postgresql.org/pg/commitdiff/fc5c1bbbeb3e00699f87407eebf2933595e9d93b</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix documentation of path(polygon) function. Obviously, this returns type "path", but somebody made a copy-and-pasteo long ago. Dagfinn Ilmari Manns&aring;ker 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bdd5d410b7926cd135e3fa8ce31b3849e133ebe1">http://git.postgresql.org/pg/commitdiff/bdd5d410b7926cd135e3fa8ce31b3849e133ebe1</a></li>

<li>Update release notes for 9.2.2, 9.1.7, 9.0.11, 8.4.15, 8.3.22. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7510bec607741a6d9de1ff7ecb0b34c7d3f2815f">http://git.postgresql.org/pg/commitdiff/7510bec607741a6d9de1ff7ecb0b34c7d3f2815f</a></li>

<li>Attempt to un-break Windows builds with USE_LDAP. The buildfarm shows this case is entirely broken, and I'm betting the reason is lack of any include file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdf498c5d76915954cb5d5c6097eb67eb94560c8">http://git.postgresql.org/pg/commitdiff/cdf498c5d76915954cb5d5c6097eb67eb94560c8</a></li>

<li>Ensure recovery pause feature doesn't pause unless users can connect. If we're not in hot standby mode, then there's no way for users to connect to reset the recoveryPause flag, so we shouldn't pause. The code was aware of this but the test to see if pausing was safe was seriously inadequate: it wasn't paying attention to reachedConsistency, and besides what it was testing was that we could legally enter hot standby, not that we have done so. Get rid of that in favor of checking LocalHotStandbyActive, which because of the coding in CheckRecoveryConsistency is tantamount to checking that we have told the postmaster to enter hot standby. Also, move the recoveryPausesHere() call that reacts to asynchronous recoveryPause requests so that it's not in the middle of application of a WAL record. I put it next to the recoveryStopsHere() call --- in future those are going to need to interact significantly, so this seems like a good waystation. Also, don't bother trying to read another WAL record if we've already decided not to continue recovery. This was no big deal when the code was written originally, but now that reading a record might entail actions like fetching an archive file, it seems a bit silly to do it like that. Per report from Jeff Janes and subsequent discussion. The pause feature needs quite a lot more work, but this gets rid of some indisputable bugs, and seems safe enough to back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af4aba2f05de46d8f619b75582f8741dc0afbbe0">http://git.postgresql.org/pg/commitdiff/af4aba2f05de46d8f619b75582f8741dc0afbbe0</a></li>

<li>Fix intermittent crash in DROP INDEX CONCURRENTLY. When deleteOneObject closes and reopens the pg_depend relation, we must see to it that the relcache pointer held by the calling function (typically performMultipleDeletions) is updated. Usually the relcache entry is retained so that the pointer value doesn't change, which is why the problem had escaped notice ... but after a cache flush event there's no guarantee that the same memory will be reassigned. To fix, change the recursive functions' APIs so that we pass around a "Relation *" not just "Relation". Per investigation of occasional buildfarm failures. This is trivial to reproduce with -DCLOBBER_CACHE_ALWAYS, which points up the sad lack of any buildfarm member running that way on a regular basis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e31d524867130d3c54b8d5f4c5ed59e2fcd07867">http://git.postgresql.org/pg/commitdiff/e31d524867130d3c54b8d5f4c5ed59e2fcd07867</a></li>

<li>Improve pl/pgsql to support composite-type expressions in RETURN. For some reason lost in the mists of prehistory, RETURN was only coded to allow a simple reference to a composite variable when the function's return type is composite. Allow an expression instead, while preserving the efficiency of the original code path in the case where the expression is indeed just a composite variable's name. Likewise for RETURN NEXT. As is true in various other places, the supplied expression must yield exactly the number and data types of the required columns. There was some discussion of relaxing that for pl/pgsql, but no consensus yet, so this patch doesn't address that. Asif Rehman, reviewed by Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31a891857a128828d47d93c63e041f3b69cbab70">http://git.postgresql.org/pg/commitdiff/31a891857a128828d47d93c63e041f3b69cbab70</a></li>

<li>Support automatically-updatable views. This patch makes "simple" views automatically updatable, without the need to create either INSTEAD OF triggers or INSTEAD rules. "Simple" views are those classified as updatable according to SQL-92 rules. The rewriter transforms INSERT/UPDATE/DELETE commands on such views directly into an equivalent command on the underlying table, which will generally have noticeably better performance than is possible with either triggers or user-written rules. A view that has INSTEAD OF triggers or INSTEAD rules continues to operate the same as before. For the moment, security_barrier views are not considered simple. Also, we do not support WITH CHECK OPTION. These features may be added in future. Dean Rasheed, reviewed by Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a99c42f291421572aef2b0a9360294c7d89b8bc7">http://git.postgresql.org/pg/commitdiff/a99c42f291421572aef2b0a9360294c7d89b8bc7</a></li>

<li>Fix assorted bugs in privileges-for-types patch. Commit 729205571e81b4767efc42ad7beb53663e08d1ff added privileges on data types, but there were a number of oversights. The implementation of default privileges for types missed a few places, and pg_dump was utterly innocent of the whole concept. Per bug #7741 from Nathan Alden, and subsequent wider investigation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b46c92112bf5afb2476d951b9817ebd8daa7b753">http://git.postgresql.org/pg/commitdiff/b46c92112bf5afb2476d951b9817ebd8daa7b753</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, fix bug where no users were dumped in pg_dumpall binary-upgrade mode; instead only skip dumping the current user. This bug was introduced in during the removal of split_old_dump(). Bug discovered during local testing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db00d837c17cebf3769fd3b6655812e2d3776f5d">http://git.postgresql.org/pg/commitdiff/db00d837c17cebf3769fd3b6655812e2d3776f5d</a></li>

<li>Revert initdb --sync-only patch that had incorrect commit messages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/25d1ed04a2c4d176f6428b9eed57344e50f44d77">http://git.postgresql.org/pg/commitdiff/25d1ed04a2c4d176f6428b9eed57344e50f44d77</a></li>

<li>Add initdb --sync-only option to sync the data directory to durable storage. Have pg_upgrade use it, and enable server options fsync=off and full_page_writes=off. Document that users turning fsync from off to on should run initdb --sync-only. [ Previous commit was incorrectly applied as a git merge. ] 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/630cd14426dc1daf85163ad417f3a224eb4ac7b0">http://git.postgresql.org/pg/commitdiff/630cd14426dc1daf85163ad417f3a224eb4ac7b0</a></li>

<li>In initdb.c, rename some newly created functions, and move the directory creation and xlog symlink creation to separate functions. Per suggestions from Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26374f2a0fc02b76a91b7565e908dbae99a3b5f9">http://git.postgresql.org/pg/commitdiff/26374f2a0fc02b76a91b7565e908dbae99a3b5f9</a></li>

<li>Restore set -x in pg_upgrade/test.sh, so the user can see what is being executed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f227656076aded21673fe4b5a831fe28e76c785">http://git.postgresql.org/pg/commitdiff/2f227656076aded21673fe4b5a831fe28e76c785</a></li>

<li>In pg_upgrade testing script, turn off command echo at the end so status report is clearer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c47d261c07c77d1261c048e5cc1236000188ce86">http://git.postgresql.org/pg/commitdiff/c47d261c07c77d1261c048e5cc1236000188ce86</a></li>

<li>In initdb.c, move auth warning code into main() from secondary function. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a84c30dda57a177487336785927503064c6bd529">http://git.postgresql.org/pg/commitdiff/a84c30dda57a177487336785927503064c6bd529</a></li>

<li>Improve pg_upgrade's status display Pg_upgrade displays file names during copy and database names during dump/restore. Andrew Dunstan identified three bugs: 1. long file names were being truncated to 60 _leading_ characters, which often do not change for long file names 2. file names were truncated to 60 characters in log files 3. carriage returns were being output to log files This commit fixes these --- it prints 60 _trailing_ characters to the status display, and full path names without carriage returns to log files. It also suppresses status output to the log file unless verbose mode is used. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6dd9584507199a6222ff2d6a40028bba69c9175e">http://git.postgresql.org/pg/commitdiff/6dd9584507199a6222ff2d6a40028bba69c9175e</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix build of LDAP URL feature. Some code was not ifdef'ed out for non-LDAP builds. patch from Bruce Momjian 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec8d1e32dd0a9801e62b8217b9305b6bc2119119">http://git.postgresql.org/pg/commitdiff/ec8d1e32dd0a9801e62b8217b9305b6bc2119119</a></li>

<li>Add support for LDAP URLs. Allow specifying LDAP authentication parameters as RFC 4516 LDAP URLs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa2fec0a18e4d23272c78916ef318078c920611a">http://git.postgresql.org/pg/commitdiff/aa2fec0a18e4d23272c78916ef318078c920611a</a></li>

<li>Update iso.org page link. The old one is responding with 404. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d12d9f595e1c6bc6e62b7b423762fc03ad923899">http://git.postgresql.org/pg/commitdiff/d12d9f595e1c6bc6e62b7b423762fc03ad923899</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Include isinf.o in libecpg if isinf() is not available on the system. Patch done by Jiang Guiqing &lt;jianggq@cn.fujitsu.com&gt;. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac99ca68d76947f438fb7e4b98d7c4ef32b1a4af">http://git.postgresql.org/pg/commitdiff/ac99ca68d76947f438fb7e4b98d7c4ef32b1a4af</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update comment at top of index_create. I neglected to update it in commit f4c4335. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e15cdb2ae7da5c1f9d8ca2ad970b98ca1cc4947">http://git.postgresql.org/pg/commitdiff/5e15cdb2ae7da5c1f9d8ca2ad970b98ca1cc4947</a></li>

<li>Background worker processes. Background workers are postmaster subprocesses that run arbitrary user-specified code. They can request shared memory access as well as backend database connections; or they can just use plain libpq frontend database connections. Modules listed in shared_preload_libraries can register background workers in their _PG_init() function; this is early enough that it's not necessary to provide an extra GUC option, because the necessary extra resources can be allocated early on. Modules can install more than one bgworker, if necessary. Care is taken that these extra processes do not interfere with other postmaster tasks: only one such process is started on each ServerLoop iteration. This means a large number of them could be waiting to be started up and postmaster is still able to quickly service external connection requests. Also, shutdown sequence should not be impacted by a worker process that's reasonably well behaved (i.e. promptly responds to termination signals.) The current implementation lets worker processes specify their start time, i.e. at what point in the server startup process they are to be started: right after postmaster start (in which case they mustn't ask for shared memory access), when consistent state has been reached (useful during recovery in a HOT standby server), or when recovery has terminated (i.e. when normal backends are allowed). In case of a bgworker crash, actions to take depend on registration data: if shared memory was requested, then all other connections are taken down (as well as other bgworkers), just like it were a regular backend crashing. The bgworker itself is restarted, too, within a configurable timeframe (which can be configured to be never). More features to add to this framework can be imagined without much effort, and have been discussed, but this seems good enough as a useful unit already. An elementary sample module is supplied. Author: &Aacute;lvaro Herrera. This patch is loosely based on prior patches submitted by KaiGai Kohei, and unsubmitted code by Simon Riggs. Reviewed by: KaiGai Kohei, Markus Wanner, Andres Freund, Heikki Linnakangas, Simon Riggs, Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da07a1e856511dca59cbb1357616e26baa64428e">http://git.postgresql.org/pg/commitdiff/da07a1e856511dca59cbb1357616e26baa64428e</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Erik Rijkers sent in tests for the regexp search optimizations.</li>

<li>Andrew Dunstan sent in a patch to make it possible for old versions of make to work when creating separate databases for contrib modules during "make check"</li>

<li>Dimitri Fontaine sent in two more revisions of a patch to implement CREATE EXTENSION default_full_version.</li>

<li>Michael Paquier sent in a patch to fix a missing argument to UpdateIndexRelation().</li>

<li>KaiGai Kohei sent in two more revisions of a patch to implement writeable foreign tables.</li>

<li>Amit Kapila sent in two more revisions of a patch to compute the max LSN of data pages.</li>

<li>Andres Freund sent in a patch to fix an infelicity in LDAP URLs.</li>

<li>Pavan Deolasee sent in a patch to help in Hot Standby conflict resolution handling.</li>

<li>Alexander Korotkov and Tomas Vondra traded new revisions of patches to store additional information in GIN indexes.</li>

<li>Jeff Davis sent in another revision of a patch to add page checksums.</li>

<li>Phil Sorber sent in two more revisions of a patch to create a pg_ping utility.</li>

<li>Jeff Davis sent in another revision of a patch to remove PD_ALL_VISIBLE.</li>

<li>Dimitri Fontaine sent in another revision of a patch to enable dumping an extension's script.</li>

<li>Pavan Deolasee sent in a patch to help fix an infelicity in pg_dump with respect to its read-only mode.</li>

<li>Pavan Deolasee sent in two revisions of a patch to make VACUUM more efficient.</li>

<li>Shigeru HANADA and Tomas Vondra traded patches to optimize dropping multiple tables in a single transaction.</li>

<li>Amit Kapila sent in another revision of a patch to improve performance by reducing WAL traffic for update operations.</li>

<li>Bruce Momjian sent in two more revisions of a patch to fix a pg_upgrade issue when it runs into invalid indexes.</li>

<li>Pavan Deolasee sent in some optimizations in lazy_scan_heap.</li>

<li>Dan Farina sent in two revisions of a patch sketching out a hook into the logging collector.</li>

<li>Tomas Vondra sent in another revision of a patch to change pgbench by aggregating info written into log.</li>

<li>Tomas Vondra sent in another revision of a patch to allow trimming the log message output.</li>

<li>Jan Wieck sent in another revision of a patch to fix an infelicity in autovacuum.</li>

<li>Tomas Vondra sent in another revision of a patch to add new statistics for WAL dirty buffer writes.</li>

<li>KaiGai Kohei sent in another revision of a patch to create OAT_POST_ALTER object access hooks.</li>

<li>Michael Paquier sent in two more revisions of a patch to add REINDEX CONCURRENTLY.</li>

</ul>