---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2008/12/29/Nouvelles-neuves-de-PostgreSQL"
---


Joyeux Solstice/Hanoukka/No&euml;l/Yule/... de la part des Nouvelles Hebdomadaires de PostgreSQL&nbsp;:)

<p><strong>Nouvelles hebdomadaires de PostgreSQL - 21 d&eacute;cembre 2008</strong></p>

<p>La "PGCon 2009" aura lieu les 21 &amp; 22 mai 2009 &agrave; l'Universit&eacute; d'Ottawa. &Agrave; noter, un pr&eacute;lude de 2 jours de tutoriaux les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/papers.php">http://www.pgcon.org/2009/papers.php</a></p>

<p>L'&eacute;quipe des RPMs PostgreSQL a publi&eacute; de nouveaux ensembles compil&eacute;s avec l'option --enable-integer-datetimes&nbsp;: 

<a target="_blank" href="http://yum.pgsqlrpms.org/howtoyum.php#idsupporthowto">http://yum.pgsqlrpms.org/howtoyum.php#idsupporthowto</a></p>

<p>Le "PostgreSQL Live CD Project" a mis en place une mailing list pour encourager les retours de la communaut&eacute;&nbsp;: 

<a target="_blank" href="http://www.pglivecd.org/community.php">http://www.pglivecd.org/community.php</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li><strong>mise &agrave; jour de s&eacute;curit&eacute;&nbsp;: phpPgAdmin 4.2.2</strong>&nbsp;: 

<a target="_blank" href="http://phppgadmin.sourceforge.net/">http://phppgadmin.sourceforge.net/</a></li>

<li>Npgsql2 2.0.2&nbsp;: 

<a target="_blank" href="http://www.npgsql.org">http://www.npgsql.org</a></li>

<li>Le "PostgreSQL RPM Building Project" a publi&eacute; la 3&egrave;me version du "PostgreSQL Live CD"&nbsp;: 

<a target="_blank" href="http://www.pglivecd.org">http://www.pglivecd.org</a></li>

<li>PostGIS 1.3.5&nbsp;: 

<a target="_blank" href="http://postgis.refractions.net/">http://postgis.refractions.net/</a></li>

<li>PostgreDAC ver. 2.5.0&nbsp;: 

<a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/download/">http://microolap.com/products/connectivity/postgresdac/download/</a></li>

<li>Database Designer pour PostgreSQL 1.2.7&nbsp;: 

<a target="_blank" href="http://microolap.com/products/database/postgresql-designer/download/">http://microolap.com/products/database/postgresql-designer/download/</a></li>

</ul>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>"L'appel aux conf&eacute;renciers" est lanc&eacute; pour le FOSDEM 2009 [ndt: 7-8 f&eacute;vrier 2009, Bruxelles]. Il y aura une rencontre PostgreSQL et nous y partagerons une salle "d&eacute;veloppeurs" avec les groupes BSD. Proposez vos expos&eacute;s &agrave; l'adresse _fosdem (a) postgresql (point) eu_ avant le 2 janvier 2009.</li>

<li>Le SYDPUG se r&eacute;unira le 3 f&eacute;vrier 2009 &agrave; 18h30. Suivez le lien pour les d&eacute;tails&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/sydpug/">http://archives.postgresql.org/sydpug/</a></li>

<li>Le PUG de Melbourne se met en place. Plus d'informations&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/melbourne-au-pug/">http://archives.postgresql.org/melbourne-au-pug/</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Devrim Gunduz. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Support specifying filename for SSL certificate, key, root certificate store and certificate revokation list by using connection parameters or environment variables. Original patch by Mark Woodward, heavily reworked by Alvaro Herrera and Magnus Hagander.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, teach MSVC build system about building foreign data wrappers. Should fix recent buildfarm breakage.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove our dependencies on MB_CUR_MAX in favor of believing that pg_database_encoding_max_length() predicts the maximum character length returned by wchar2char(). Per Hiroshi Inoue, MB_CUR_MAX isn't usable on Windows because we allow encoding = UTF8 when the locale says differently; and getting rid of it seems a good idea on general principles because it narrows our dependence on libc's locale API just a little bit more. Also install a check for overflow of the buffer size computation.</li>

<li>Reduce the scaling factor for attstattarget to number-of-lexemes from 100 to 10, to compensate for the recent change in default statistics target. The original number was pulled out of the air anyway :-( , but it was picked in the context of the old default, so holding the default size of the MCELEM array constant seems the best thing. Per discussion.</li>

<li>Remove newly-added regression test cases that referenced pg_stats. The proposed fix for this is a behavioral change that probably shouldn't get back-patched, and it doesn't seem worth putting a workaround into a back branch.</li>

<li>Arrange for the pg_foo_is_visible and has_foo_privilege families of functions to return NULL, instead of erroring out, if the target object is specified by OID and we can't find that OID in the catalogs. Since these functions operate internally on SnapshotNow rules, there is a race condition when using them in user queries: the query's MVCC snapshot might "see" a catalog row that's already committed dead, leading to a failure when the inquiry function is applied. Returning NULL should generally provide more convenient behavior. This issue has been complained of before, and in particular we are now seeing it in the regression tests due to another recent patch.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/misc.c, fix cast-away-const problem as well as bogus calculation of required buffer size.</li>

<li>Code review for CREATE OR REPLACE VIEW patch. Do things in a saner order to result in hopefully-less-confusing error messages when the new definition isn't compatible with the old; minor other cleanup.</li>

<li>Department of second thoughts: further experimentation with CREATE OR REPLACE VIEW suggests that it'd be worth spelling the error messages out in a little more detail. This seems to help with localizing the problem.</li>

<li>In pgsql/src/backend/access/heap/heapam.c, make heap_update() set newtup-&gt;t_tableOid correctly, for consistency with the other major heapam.c functions. The only known consequence of this omission is that UPDATE RETURNING failed to return the correct value for "tableoid", as per report from KaiGai Kohei. Back-patch to 8.2. Arguably it's wrong all the way back; but without evidence of visible breakage before RETURNING was added, I'll desist from patching the older branches.</li>

<li>Code review for function default parameters patch. Fix numerous problems as per recent discussions. In passing this also fixes a couple of bugs in the previous variadic-parameters patch.</li>

<li>In pgsql/src/backend/executor/execQual.c, fix oversight in my recent patch to allow ExecMakeFunctionResult to handle materialize-mode set results. Since it now uses the ReturnSetInfo node to hold internal state, we need to be sure to set up the node even when the immediately called function doesn't return set (but does have a set-valued argument). Per report from Anupama Aherrao.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, add a couple of cross-references to the docs about enum types, per a recent gripe that the info is hard to find.</li>

<li>When we added the ability to have zero-element ARRAY[] constructs by adding an explicit cast to show the intended array type, we forgot to teach ruleutils.c to print out such constructs properly. Found by noting bogus output from recent changes in polymorphism regression test.</li>

<li>Add a new column proiswindow to pg_proc. It doesn't actually do anything useful yet, but I'm tired of re-merging this aspect of the window functions patch.</li>

<li>In pgsql/src/backend/commands/foreigncmds.c, fix various confusions of pointers and OIDs, unsafe assumptions about nulls, etc. I think this will fix the current buildfarm issues ...</li>

<li>In pgsql/src/backend/parser/gram.y, add missing semicolon, per buildfarm results. Martin Pihlak</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Do not try to change a const variable.</li>

<li>Applied patch by ITAGAKI Takahiro to fix segfault in ecpg on non-glibc systems.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/pg_standby/pg_standby.c, add missing 'break' in Win32 switch statement, reported by Martin Zaun</li>

<li>In pgsql/contrib/pg_standby/pg_standby.c, add comment about GNUWin32's cp not having the file system problem.</li>

<li>In pgsql/doc/src/sgml/pgstandby.sgml, add documentation that pg_standby sleeps on Win32 because of 'copy' behavior.</li>

<li>In pgsql/contrib/pg_standby/pg_standby.c, improve comment about why sleep is used by pg_standby to handle 'copy' file size problem.</li>

<li>In pgsql/doc/src/sgml/rules.sgml, fix wording of section comparing triggers and rules; old wording as confusing.</li>

<li>The attached patch contains a couple of fixes in the existing probes and includes a few new ones: Fixed compilation errors on OS X for probes that use typedefs. Fixed a number of probes to pass ForkNumber per the relation forks patch. The new probes are those that were taken out from the previous submitted patch and required simple fixes. Will submit the other probes that may require more discussion in a separate patch. Robert Lor.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, update documentation table describing how shared memory is used by various facilities.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, clarify documentation that journaling is not required for WAL or data files.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, add "not" to wal journaling text.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Solution.pm, attempt to fix MSVC breakage from Major Version patch.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/runtime.sgml, add note to the shared memory sizing table about needing to use page count in shared_buffers and wal_buffers, not size in bytes. Per discussion.</li>

<li>In pgsql/src/bin/psql/describe.c, have psql's \d+ print reloptions. Extracted from Euler Taveira de Oliveira's reloptions patch for autovacuum and revised by me. Note that there doesn't seem to be a way to display an index's reloptions.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Don't reset pg_class.reltuples and relpages in VACUUM, if any pages were skipped. We could update relpages anyway, but it seems better to only update it together with reltuples, because we use the reltuples/relpages ratio in the planner. Also don't update n_live_tuples in pgstat. ANALYZE in VACUUM ANALYZE now needs to update pg_class, if the VACUUM-phase didn't do so. Added some boolean-passing to let analyze_rel know if it should update pg_class or not. I also moved the relcache invalidation (to update rd_targblock) from vac_update_relstats to where RelationTruncate is called, because vac_update_relstats is not called for partial vacuums anymore. It's more obvious to send the invalidation close to the truncation that requires it. Per report by Ned T. Crigler.</li>

<li>In pgsql/src/backend/commands/foreigncmds.c, don't use OidIsValid to check the return value of transformGenericOptions, because transformGenericOptions returns an array, not an Oid. I'm not sure if this fixes the crashes seen in buildfarm, but it should be fixed anyway.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/truncate.sgml, add note that TRUNCATE uses an access exclusive lock. This apparently surprised/confused some users.</li>

<li>SQL/MED catalog manipulation facilities. This doesn't do any remote or external things yet, but it gives modules like plproxy and dblink a standardized and future-proof system for managing their connection information. Martin Pihlak and Peter Eisentraut</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Zdenek Kotala sent in a patch as infrastructure for pg_upgrade to reserve space for the upgrade.</li>

<li>Pavel Stehule sent in a patch to allow for mixed notation with named parameters.</li>

<li>Robert Treat sent in a patch to fix PL/Perl's treatment of bytea.</li>

<li>Emmanuel Cecchet sent in another revision of his auto-partitioning patch.</li>

<li>Fujii Masao sent in another revision of his patch to implement synchronous replication.</li>

<li>Emmanuel Cecchet sent in two more revisions of his patch to give temp tables better transaction behavior.</li>

<li>Zdenek Kotala sent in another version of his patch to reserve pages before in-place upgrades.</li>

<li>Simon Riggs sent in another revision of his rmgr hooks patch.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patch.</li>

<li>Muhammad Asif sent in another revision of his plugin patch.</li>

<li>Alvaro Herrera sent in two patches to improve the reloptions mechanism.</li>

<li>Teodor Sigaev sent in another revision of his patch to implement B-Tree emulation for GIN indexes.</li>

<li>Abhijit Menon-Sen sent in a revised version of the pg_dump_role patch.</li>

<li>Andreas 'ads' Scherbaum sent in a patch which adds storage information to psql's \l+</li>

<li>Tom Lane sent in a patch to implement some of the grammar structures for the OLAP functions.</li>

<li>Jeff Davis sent in an updated patch for Teodor Sigaev's GIN improvements.</li>

</ul>