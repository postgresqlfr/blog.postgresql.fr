---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 juin 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/06/27/Nouvelles-hebdomadaires-de-PostgreSQL-21-juin-2015"
---


<p>La <em>PostgreSQL Conference Europe 2015</em> qui aura lieu du 27 au 30 octobre accepte &agrave; pr&eacute;sent les inscriptions des auditeurs&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/registration/">http://2015.pgconf.eu/registration/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>L'AMI Linux d'Amazon supporte maintenant pgTap&nbsp;: <a target="_blank" href="https://lambda-linux.io/blog/2015/06/18/announcing-pgtap-support-for-amazon-linux/">https://lambda-linux.io/blog/2015/06/18/announcing-pgtap-support-for-amazon-linux/</a></li>

<li>MJSQLView version 7.03, une interface graphique Java compatible PostgreSQL&nbsp;: <a target="_blank" href="http://myjsqlview.com/">http://myjsqlview.com/</a></li>

<li>PG Partition Manager 2.0.0, une extension permettant de g&eacute;rer le partitionnement des tables&nbsp;: <a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

<li>psycopg2 2.6.1, un connecteur python pour PostgreSQL&nbsp;: <a target="_blank" href="http://initd.org/psycopg/articles/2015/06/16/psycopg-261-released/">http://initd.org/psycopg/articles/2015/06/16/psycopg-261-released/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juin</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-06/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La deuxi&egrave;me <em>Conf&eacute;rence PostgreSQL Suisse</em> se tiendra &agrave; Rapperswil les 25 &amp; 26 juin 2015&nbsp;: <a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></li>

<li>La conf&eacute;rence PGDay UK aura lieu le 7 juillet 2015 - elle vise les membres de la communaut&eacute; PostgreSQL anglaise. L'appel &agrave; conf&eacute;renciers expire le 13 avril&nbsp;: <a target="_blank" href="http://www.postgresqlusergroup.org.uk">http://www.postgresqlusergroup.org.uk</a></li>

<li>Le <em>PGDay Campinas 2015</em> aura lieu &agrave; Campinas (Br&eacute;sil) le 7 ao&ucirc;t. L'appel &agrave; conf&eacute;renciers expire le 31 mai&nbsp;: <a target="_blank" href="http://pgdaycampinas.com.br/english/">http://pgdaycampinas.com.br/english/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PostgresOpen 2015, programm&eacute; &agrave; Dallas (Texas) du 16 au 18 septembre, a &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="http://2015.postgresopen.org/callforpapers/">http://2015.postgresopen.org/callforpapers/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>session PostgreSQL n&deg;7</em> (24 septembre 2015 &agrave; Paris) est lanc&eacute; jusqu'au 15 juin 2015&nbsp;: call-for-paper &lt;AT&gt; postgresql-sessions &lt;DOT&gt; org&nbsp;: <a target="_blank" href="http://www.postgresql-sessions.org/7/about">http://www.postgresql-sessions.org/7/about</a></li>

<li><em>PostgreSQL Conference Europe 2015</em> aura lieu du 27 au 30 octobre au Vienna Marriott Hotel &agrave; Vienne (Autriche). L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 7 ao&ucirc;t&nbsp;: <a target="_blank" href="http://2015.pgconf.eu/">http://2015.pgconf.eu/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 juin&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20150621221026.GB32298@fetter.org">http://www.postgresql.org/message-id/20150621221026.GB32298@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Michael Meskes pushed:</p>

<ul>

<li>Check for out of memory when allocating sqlca. Patch by Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94a484222caece19e381a6941b8d826027ac2e75">http://git.postgresql.org/pg/commitdiff/94a484222caece19e381a6941b8d826027ac2e75</a></li>

<li>Fix memory leak in ecpglib's connect function. Patch by Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af0b49fc98cb3494d1e444a4f5c3364627a3ed5f">http://git.postgresql.org/pg/commitdiff/af0b49fc98cb3494d1e444a4f5c3364627a3ed5f</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Fix comment in fmgr.h to refer to actual function used. FunctionLookup() is long gone if it ever existed, and fmgr_info() is what's now used, so the comments now reflect that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41d798a139b5c94ad8ce10b192141b5bcc03dda3">http://git.postgresql.org/pg/commitdiff/41d798a139b5c94ad8ce10b192141b5bcc03dda3</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Detect setlocale(LC_CTYPE, NULL) clobbering previous return values. POSIX permits setlocale() calls to invalidate any previous setlocale() return values. Commit 5f538ad004aa00cf0881f179f0cde789aad4f47e neglected to account for that. In advance of fixing that bug, switch to failing hard on affected configurations. This is a planned temporary commit to assay buildfarm-represented configurations. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b76e76be460a240e99c33f6fb470dd1d5fe01a2a">http://git.postgresql.org/pg/commitdiff/b76e76be460a240e99c33f6fb470dd1d5fe01a2a</a></li>

<li>Revert "Detect setlocale(LC_CTYPE, NULL) clobbering previous return values." This reverts commit b76e76be460a240e99c33f6fb470dd1d5fe01a2a. The buildfarm yielded no related failures. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f2a378de41bf3e516b8d2c4d65790aeefbfb89d">http://git.postgresql.org/pg/commitdiff/1f2a378de41bf3e516b8d2c4d65790aeefbfb89d</a></li>

<li>Fix failure to copy setlocale() return value. POSIX permits setlocale() calls to invalidate any previous setlocale() return values, but commit 5f538ad004aa00cf0881f179f0cde789aad4f47e neglected to account for setlocale(LC_CTYPE, NULL) doing so. The effect was to set the LC_CTYPE environment variable to an unintended value. pg_perm_setlocale() sets this variable to assist PL/Perl; without it, Perl would undo PostgreSQL's locale settings. The known-affected configurations are 32-bit, release builds using Visual Studio 2012 or Visual Studio 2013. Visual Studio 2010 is unaffected, as were all buildfarm-attested configurations. In principle, this bug could leave the wrong LC_CTYPE in effect after PL/Perl use, which could in turn facilitate problems like corrupt tsvector datums. No known platform experiences that consequence, because PL/Perl on Windows does not use this environment variable. The bug has been user-visible, as early postmaster failure, on systems with Windows ANSI code page set to CP936 for "Chinese (Simplified, PRC)" and probably on systems using other multibyte code pages. (SetEnvironmentVariable() rejects values containing character data not valid under the Windows ANSI code page.) Back-patch to 9.4, where the faulty commit first appeared. Reported by Didi Hu and &aelig;&#382;&mdash;&eacute;&sup1;&ccedil;&uml;&lsaquo;. Reviewed by Tom Lane, though this fix strategy was not his first choice. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0a264a362343287051c4737b01aa3ebe36f21a6">http://git.postgresql.org/pg/commitdiff/f0a264a362343287051c4737b01aa3ebe36f21a6</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Change TAP test framework to not rely on having a chmod executable. This might not work at all on Windows, and is not ever efficient. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca3f43aa48a83013ea50aeee7cd193a5859c4587">http://git.postgresql.org/pg/commitdiff/ca3f43aa48a83013ea50aeee7cd193a5859c4587</a></li>

<li>Add PASSWORD to tab completions for CREATE/ALTER ROLE/USER/GROUP. Jeevan Chalke <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86e4751786bb0dcb29528ef49b067d0e393e4934">http://git.postgresql.org/pg/commitdiff/86e4751786bb0dcb29528ef49b067d0e393e4934</a></li>

<li>Fix corner case in autovacuum-forcing logic for multixact wraparound. Since find_multixact_start() relies on SimpleLruDoesPhysicalPageExist(), and that function looks only at the on-disk state, it's possible for it to fail to find a page that exists in the in-memory SLRU that has not been written yet. If that happens, SetOffsetVacuumLimit() will erroneously decide to force emergency autovacuuming immediately. We should probably fix find_multixact_start() to consider the data cached in memory as well as on the on-disk state, but that's no excuse for SetOffsetVacuumLimit() to be stupid about the case where it can no longer read the value after having previously succeeded in doing so. Report by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed16f73c574660aa0902caa1c0adeba07f8c70a5">http://git.postgresql.org/pg/commitdiff/ed16f73c574660aa0902caa1c0adeba07f8c70a5</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix bogus range_table_mutator() logic for RangeTblEntry.tablesample. Must make a copy of the TableSampleClause node; the previous coding modified the input data structure in-place. Petr Jelinek <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be87143fe90adf8862791aeddd76151e88ce5603">http://git.postgresql.org/pg/commitdiff/be87143fe90adf8862791aeddd76151e88ce5603</a></li>

<li>In immediate shutdown, postmaster should not exit till children are gone. This adjusts commit 82233ce7ea42d6ba519aaec63008aff49da6c7af so that the postmaster does not exit until all its child processes have exited, even if the 5-second timeout elapses and we have to send SIGKILL. There is no great value in having the postmaster process quit sooner, and doing so can mislead onlookers into thinking that the cluster is fully terminated when actually some child processes still survive. This effect might explain recent test failures on buildfarm member hamster, wherein we failed to restart a cluster just after shutting it down with "pg_ctl stop -m immediate". I also did a bit of code review/beautification, including fixing a faulty use of the Max() macro on a volatile expression. Back-patch to 9.4. In older branches, the postmaster never waited for children to exit during immediate shutdowns, and changing that would be too much of a behavioral change. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48913db887e6a41fa3f1b6cdf80ee89e38f21d9d">http://git.postgresql.org/pg/commitdiff/48913db887e6a41fa3f1b6cdf80ee89e38f21d9d</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Clamp autovacuum launcher sleep time to 5 minutes. This avoids the problem that it might go to sleep for an unreasonable amount of time in unusual conditions like the server clock moving backwards an unreasonable amount of time. (Simply moving the server clock forward again doesn't solve the problem unless you wake up the autovacuum launcher manually, say by sending it SIGHUP). Per trouble report from Prakash Itnal in <a target="_blank" href="https://www.postgresql.org/message-id/CAHC5u79-UqbapAABH2t4Rh2eYdyge0Zid-X=Xz-ZWZCBK42S0Q@mail.gmail.com">https://www.postgresql.org/message-id/CAHC5u79-UqbapAABH2t4Rh2eYdyge0Zid-X=Xz-ZWZCBK42S0Q@mail.gmail.com</a> Analyzed independently by Haribabu Kommi and Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da1a9d0f5bed1f93908be9233a4fef39b988e505">http://git.postgresql.org/pg/commitdiff/da1a9d0f5bed1f93908be9233a4fef39b988e505</a></li>

<li>Fix thinko in comment (launcher -&gt; worker) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c400a3f2bf4bb93a60cefc09416d37fc3dab8ed">http://git.postgresql.org/pg/commitdiff/3c400a3f2bf4bb93a60cefc09416d37fc3dab8ed</a></li>

<li>Fix BRIN supported operators table. Some of the entries in the inclusion opclasses where missing operators, and we had an entry for inet_inclusion_ops instead of network_inclusion_ops. Sort the operators within each opclass by strategy number, just to make it easier to spot mistakes. Also sort the rows by data type name, rather than OID. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1443a165db007462c5044ad8d03d919ac4323e6d">http://git.postgresql.org/pg/commitdiff/1443a165db007462c5044ad8d03d919ac4323e6d</a></li>

<li>Add transforms to pg_get_object_address and friends. This was missed when transforms were added by commit cac76582053ef8e. Extracted from a larger patch. Author: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad89a5d115b3b4025f3c135f95f722e7e4becf13">http://git.postgresql.org/pg/commitdiff/ad89a5d115b3b4025f3c135f95f722e7e4becf13</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>PL/Perl: Add alternative expected file for Perl 5.22 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/103382abf87453d6555755da8f9fbef0b9965f81">http://git.postgresql.org/pg/commitdiff/103382abf87453d6555755da8f9fbef0b9965f81</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Add missing check for wal_debug GUC. 9a20a9b2 added a new elog(), enabled when WAL_DEBUG is defined. The other WAL_DEBUG dependant messages check for the wal_debug GUC, but this one did not. While at it replace 'upto' with 'up to'. Discussion: 20150610110253.GF3832@alap3.anarazel.de Backpatch to 9.4, the first release containing 9a20a9b2. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90231cd5188c43da94f58f7a839eee9286d0f864">http://git.postgresql.org/pg/commitdiff/90231cd5188c43da94f58f7a839eee9286d0f864</a></li>

<li>Improve multixact emergency autovacuum logic. Previously autovacuum was not necessarily triggered if space in the members slru got tight. The first problem was that the signalling was tied to values in the offsets slru, but members can advance much faster. Thats especially a problem if old sessions had been around that previously prevented the multixact horizon to increase. Secondly the skipping logic doesn't work if the database was restarted after autovacuum was triggered - that knowledge is not preserved across restart. This is especially a problem because it's a common panic-reaction to restart the database if it gets slow to anti-wraparound vacuums. Fix the first problem by separating the logic for members from offsets. Trigger autovacuum whenever a multixact crosses a segment boundary, as the current member offset increases in irregular values, so we can't use a simple modulo logic as for offsets. Add a stopgap for the second problem, by signalling autovacuum whenver ERRORing out because of boundaries. Discussion: 20150608163707.GD20772@alap3.anarazel.de Backpatch into 9.3, where it became more likely that multixacts wrap around. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/667912aee649c3608e003568e4b47d95251b1c8c">http://git.postgresql.org/pg/commitdiff/667912aee649c3608e003568e4b47d95251b1c8c</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>David Rowley sent in a patch to let the executor notice when multiple aggregates in a query share a transition function, executing the common ones only once per row.</p>

<p>David Rowley sent in another revision of a patch to improve some appendStringInfo* calls.</p>

<p>Petr Jelinek sent in a patch to extend CREATE EXTENSION to include its dependencies via the optional RECURSIVE keyword.</p>

<p>Fabien COELHO sent in another revision of a patch to fix pgbench --progress report under (very) low rate.</p>

<p>Tomas Vondra sent in a patch to teach the expression walker about RestrictInfo.</p>

<p>Amit Kapila sent in a patch to rename mapfile if backupfile not present.</p>

<p>Vik Fearing sent in a patch to add tab completion to psql for CREATE SEQUENCE.</p>

<p>Michael Paquier sent in a patch to reproduce a problem with pg_rewind.</p>

<p>Michael Paquier sent in a patch to make process_remote_file ignore files named as pg_xlog/xlogtemp.*.</p>

<p>SAWADA Masahiko sent in a patch to give the GIN function of pageinspect a consistent data type.</p>

<p>Fabien COELHO sent in another revision of a patch to smooth checkpoint flushing.</p>

<p>Tomas Vondra sent in another revision of a patch to make a better ndistinct estimator.</p>

<p>Brendan Jurd sent in two revisions of a patch to add a new built-in function pg_notify_queue_saturation().</p>

<p>Michael Paquier sent in three more revisions of a patch to improve the way TAP tests log their output using IPC::Run::run.</p>

<p>Michael Paquier sent in a patch to add a missing -w switch to the pg_ctl stop call in pg_regress.</p>

<p>Robert Haas, Tom Lane, and Dean Rasheed traded patches to fix some infelicities recently introduced in the table inheritance part of the planner.</p>

<p>Marti Raudsepp sent in a patch to fix pg_upgrade when postgres template1 aren't in the default database.</p>

<p>Petr Jelinek sent in another revision of a patch to implement tab completion in psql for TABLESAMPLE.</p>

<p>&Atilde;lvaro Herrera sent in a patch to add pg_get_multixact_members() and pg_get_multixact_range().</p>

<p>Thomas Munro sent in a patch to fix an issue where the get_relation_info comment was out of sync with the code nearby.</p>

<p>Andres Freund sent in a patch to rework the way multixact truncations work with the goal of making them WAL logged.</p>

<p>Fabien COELHO sent in a patch to allow backslash-continuations in custom scripts.</p>