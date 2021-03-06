---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 janvier 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/01/14/Nouvelles-hebdomadaires-de-PostgreSQL-9-janvier-2011"
---


<p>Le PUG d'Austin [s'est r&eacute;uni] ce mercredi 12 janvier. Le sujet [&eacute;tait] la mise en place de la <em>streaming replication</em>. Pizza gratuite&nbsp;! RSVP &agrave; austinpug CHEZ postgresql POINT org appreci&eacute; mais non-obligatoire&nbsp;: 

<a target="_blank" href="http://pugs.postgresql.org/austinpug">http://pugs.postgresql.org/austinpug</a></p>

<p>Selena Deckelmann parlera de la communaut&eacute; et du d&eacute;veloppement PostgreSQL le 7 f&eacute;vrier 2010 &agrave; 16h, &agrave; l'universit&eacute; d'&eacute;tat de l'Oregon &agrave; Corvallis.</p>

<p>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PostgreSQL LiveCD avec PostgreSQL 9.0.2 sur une base CentOS 5.5&nbsp;: 

<a target="_blank" href="http://www.pglivecd.org/">http://www.pglivecd.org/</a></li>

<li>phpPgAdmin 5.0.2, un outil web d'administration de PostgreSQL&nbsp;: 

<a target="_blank" href="http://phppgadmin.sourceforge.net/">http://phppgadmin.sourceforge.net/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; conf&eacute;renciers pour l'annuel "<em>Prague PostgreSQL Developers' Day</em>", 4&egrave;me &eacute;dition, est lanc&eacute;. L'&eacute;v&eacute;nement sera tenu le 10 f&eacute;vrier 2011 &agrave; l'<em>Universitas Carolinas</em>&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2010-12/msg00009.php">http://archives.postgresql.org/pgsql-announce/2010-12/msg00009.php</a></li>

<li>L'appel &agrave; projets de PostgreSQLFr a &eacute;t&eacute; lanc&eacute;. Les projets doivent concerner PostgreSQL et la communaut&eacute; francophone. Mail &agrave; appel-projets-2010 (AT) postgresql (DOT) fr. 

<a target="_blank" href="http://www.postgresql.fr/appel_a_projets_2010:call_for_projects">http://www.postgresql.fr/appel_a_projets_2010:call_for_projects</a></li>

<li>Un PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011. Proposez vos conf&eacute;rences sur pgday-submissions (AT) googlegroups (DOT) com.</li>

<li>PostgreSQL Conference East 2011&nbsp;: New-York City, du 22 au 25 mars&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;! 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110109">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<ul>

<li>Pavel Stehule reviewed the MULTISET patch.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>perltidy run on the MSVC build system. Forgot this with previuos commit, line it up so it's easier to submit (readable) patches against the MSVC build system. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c0e96b49e588b2a5ab501a2acc03b96ff76cf288">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c0e96b49e588b2a5ab501a2acc03b96ff76cf288</a></li>

<li>Add missing part of replication role docs. Noted by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1996b482859c67726e77b80a263d3cce954e022d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1996b482859c67726e77b80a263d3cce954e022d</a></li>

<li>Add views and functions to monitor hot standby query conflicts. Add the view pg_stat_database_conflicts and a column to pg_stat_database, and the underlying functions to provide the information. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=40d9e94bd7537144d3d379c1fd1264dff5cf4bb2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=40d9e94bd7537144d3d379c1fd1264dff5cf4bb2</a></li>

<li>Bump catversion, forgot in previous commit. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=77745cc7f1617852844dd88ec8ddb48f38e19e9a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=77745cc7f1617852844dd88ec8ddb48f38e19e9a</a></li>

<li>Give superusers REPLIACTION permission by default. This can be overriden by using NOREPLICATION on the CREATE ROLE statement, but by default they will have it, making it backwards compatible and "less surprising" (given that superusers normally override all checks). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=66a8a0428db046d725b88c8b956384c2a4b4a11c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=66a8a0428db046d725b88c8b956384c2a4b4a11c</a></li>

<li>Add pgreadlink() on Windows to read junction points. Add support for reading back information about the symbolic links we've created with pgsymlink(), which are actually Junction Points. Just as pgsymlink() can only create directory symlinks, pgreadlink() can only read directory symlinks. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=db4d22d0eff091e96d92c82566c9e9d297040b93">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=db4d22d0eff091e96d92c82566c9e9d297040b93</a></li>

<li>Properly install gram.h on MSVC builds. This file is now needed by pgAdmin builds, which started failing since it was missing in the installer builds. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3457514c2d9bac552d4caeb1d3ac5a8d03d3a439">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3457514c2d9bac552d4caeb1d3ac5a8d03d3a439</a></li>

<li>Ensure the directory for gram.h is created on win32. Result of bad testing of my last commit. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=361418be7c23e236d07edf4052de85ab8f32d88d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=361418be7c23e236d07edf4052de85ab8f32d88d</a></li>

<li>Split pg_start_backup() and pg_stop_backup() into two pieces Move the actual functionality into a separate function that's easier to call internally, and change the SQL-callable function to be a wrapper calling this. Also create a pg_abort_backup() function, only callable internally, that does only the most vital parts of pg_stop_backup(), making it safe(r) to call from error handlers. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4448917d51d6f87655ce357cca009634b0a136e4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4448917d51d6f87655ce357cca009634b0a136e4</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update comments in RecordTransactionCommit() to mention unlogged tables. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dc8a14311a4825b6bf7b787764b9f0c3f8d8df8e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dc8a14311a4825b6bf7b787764b9f0c3f8d8df8e</a></li>

<li>Fix crash in ALTER OPERATOR CLASS/FAMILY .. SET SCHEMA. In the previous coding, the parser emitted a List containing a C string, which is no good, because copyObject() can't handle it. Dimitri Fontaine. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7f60be72b0865dd442c4f6164a997ff528a44d85">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7f60be72b0865dd442c4f6164a997ff528a44d85</a></li>

<li>Improve recovery.conf.sample comments. Jehan-Guillaume de Rorthais, with some additional wordsmithing by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a9f72b408325c4abb41b5ab65f8fb79af4c29495">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a9f72b408325c4abb41b5ab65f8fb79af4c29495</a></li>

<li>Document pg_stat_replication, bump catversion since that was overlooked. Itagaki Takahiro, edited by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b4271deb97270d336c9d34ac911748faa5a4892">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b4271deb97270d336c9d34ac911748faa5a4892</a></li>

<li>Remove bogus claims regarding createuser defaults. Josh Kupershmidt. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=af84bee43e356866dc46c95ae5bf77996a8237ff">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=af84bee43e356866dc46c95ae5bf77996a8237ff</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve psql tab completion for CREATE/ALTER ROLE [NO]REPLICATION. Missing support for VALID UNTIL in CREATE ROLE is also added. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=14158f25cd164d65cf174dab9e22b3b4a22962a7">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=14158f25cd164d65cf174dab9e22b3b4a22962a7</a></li>

<li>New system view pg_stat_replication displays activity of wal sender processes. Itagaki Takahiro and Simon Riggs. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a755ea33ae3d772977fa083a8614bb9d4cc36e5a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a755ea33ae3d772977fa083a8614bb9d4cc36e5a</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Work around header misdefines in modern Windows SDK when _WIN32_WINNT is less than 0x0501. Only required for versions 8.2, 8.3 and 8.4., as we defined _WIN32_WINNT as 0x0501 after that. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1d1a43422252576e9a7fa07d8dbfea9c724aa75b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1d1a43422252576e9a7fa07d8dbfea9c724aa75b</a></li>

<li>Allow older branches to be built with Visual Studio 2008. This is a backport of commit df0cdd53 to the 8.2, 8.3 and 8.4 branches. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5739935188ca27b5b6e63d72748af733b5813aa9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5739935188ca27b5b6e63d72748af733b5813aa9</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Simplify functions and parameters used by pg_upgrade. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=25cc7424e3b4d3bd76fa54bfc6907f294b4b99d1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=25cc7424e3b4d3bd76fa54bfc6907f294b4b99d1</a></li>

<li>In pg_upgrade, fix backward logging display of link operations. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0857a8449826867711a9c1f99088bd13731ac192">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0857a8449826867711a9c1f99088bd13731ac192</a></li>

<li>In pg_upgrade, copy pg_largeobject_metadata and its index for 9.0+ servers because, like pg_largeobject, it is a system table whose contents are not dumped by pg_dump --schema-only. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3302334b48e2be6eb2c01dcf500363dbd4f22e59">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3302334b48e2be6eb2c01dcf500363dbd4f22e59</a></li>

<li>Clarify pg_upgrade's creation of the map file structure. Also clean up pg_dump's calling of pg_upgrade_support functions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5cff5b577918cf29e0ba3a35158c27cfe2de280c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5cff5b577918cf29e0ba3a35158c27cfe2de280c</a></li>

<li>In pg_upgrade, adjust transfer_relfile()'s parameters to be more logical. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b1f2a94fa2bebbc74d392a18e4ac1d1e558485fc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b1f2a94fa2bebbc74d392a18e4ac1d1e558485fc</a></li>

<li>Fix for recent pg_upgrade commit to fix large objects relfilenode handling. (metadata user ids still an open issue). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a45beaac642147ebf2e561cce62967d244c343c6">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a45beaac642147ebf2e561cce62967d244c343c6</a></li>

<li>Update pg_upgrade C comments. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e66e43988a334ca58c584a0652d29dff61e698b9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e66e43988a334ca58c584a0652d29dff61e698b9</a></li>

<li>Rename pg_upgrade variables, for clarity. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56a9adcb96ead8569582aa1f0f77a8fa9e24c189">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56a9adcb96ead8569582aa1f0f77a8fa9e24c189</a></li>

<li>Update documentation to say that \lo_import sets :LASTOID, not lo_insert. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1aad44f988dbebbdde986478f25096037c6dd931">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1aad44f988dbebbdde986478f25096037c6dd931</a></li>

<li>Improve C comments about backend variables set by pg_upgrade_support functions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=46d28820b6d213bf26b24ecd289a1c466ecf1956">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=46d28820b6d213bf26b24ecd289a1c466ecf1956</a></li>

<li>Force pg_upgrade's to preserve pg_class.oid, not pg_class.relfilenode. Toast tables have identical pg_class.oid and pg_class.relfilenode, but for clarity it is good to preserve the pg_class.oid. Update comments regarding what is preserved, and do some variable/function renaming for clarity. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2896c87ce4dc789722296f010eaefd5cbb86ece3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2896c87ce4dc789722296f010eaefd5cbb86ece3</a></li>

<li>Fix pg_upgrade of large object permissions by preserving pg_auth.oid, which is stored in pg_largeobject_metadata. No backpatch to 9.0 because you can't migrate from 9.0 to 9.0 with the same catversion (because of tablespace conflict), and a pre-9.0 migration to 9.0 has not large object permissions to migrate. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d8d3d2a4f37f6df5d0118b7f5211978cca22091a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d8d3d2a4f37f6df5d0118b7f5211978cca22091a</a></li>

<li>Fix C indenting in pg_upgrade function. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=519c008a966251e45d683738d89f238e5c801781">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=519c008a966251e45d683738d89f238e5c801781</a></li>

<li>In pg_upgrade, track only one copy of namespace/relname in FileNameMap because the old and new values are identical. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f75383e6e8263cd98582edb0b3884132ad9e368a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f75383e6e8263cd98582edb0b3884132ad9e368a</a></li>

<li>Simplify pg_upgrade C comment about what is preserved. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3095643d374ca79e5aa347cefbaebdcf70169386">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3095643d374ca79e5aa347cefbaebdcf70169386</a></li>

<li>More pg_upgrade relfilenode C comments added. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2f657e4d720d08b26234f3b9e40e347f3cc42220">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2f657e4d720d08b26234f3b9e40e347f3cc42220</a></li>

<li>Document why pg_upgrade preserves pg_auth.oid (because they are stored in pg_largeobject_metadata). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=133641a48eb9a3406fda7014a60fd42dfecfa089">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=133641a48eb9a3406fda7014a60fd42dfecfa089</a></li>

<li>In pg_upgrade, remove unnecessary separate handling of toast tables now that we restore by oid; they can be handled like regular tables when creating the file mapping structure. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a60b32b3dcb4d49a60c96558ce405764ac17c799">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a60b32b3dcb4d49a60c96558ce405764ac17c799</a></li>

<li>In pg_upgrade, clarify use of install_db_support_functions(). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ebaf648ad2e471b2e2003ecfe4740ce27226c02a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ebaf648ad2e471b2e2003ecfe4740ce27226c02a</a></li>

<li>In pg_upgrade, remove functions that did sequential array scans looking up relations, but rather order old/new relations and use the same array index value for both. This should speed up pg_upgrade for databases with many relations. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=002c105a0706bd1c1e939fe0f47ecdceeae6c52d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=002c105a0706bd1c1e939fe0f47ecdceeae6c52d</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update sequence_1.out for recent changes in sequence regression test. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6c596c29a3666830d089facf9d6c7f44b4d0e9f2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6c596c29a3666830d089facf9d6c7f44b4d0e9f2</a></li>

<li>Fix GIN to support null keys, empty and null items, and full index scans. Per my recent proposal(s). Null key datums can now be returned by extractValue and extractQuery functions, and will be stored in the index. Also, placeholder entries are made for indexable items that are NULL or contain no keys according to extractValue. This means that the index is now always complete, having at least one entry for every indexed heap TID, and so we can get rid of the prohibition on full-index scans. A full-index scan is implemented much the same way as partial-match scans were already: we build a bitmap representing all the TIDs found in the index, and then drive the results off that. Also, introduce a concept of a "search mode" that can be requested by extractQuery when the operator requires matching to empty items (this is just as cheap as matching to a single key) or requires a full index scan (which is not so cheap, but it sure beats failing or giving wrong answers). The behavior remains backward compatible for opclasses that don't return any null keys or request a non-default search mode. Using these features, we can now make the GIN index opclass for anyarray behave in a way that matches the actual anyarray operators for &amp;&amp;, &lt;@, @&gt;, and = ... which it failed to do before in assorted corner cases. This commit fixes the core GIN code and ginarrayprocs.c, updates the documentation, and adds some simple regression test cases for the new behaviors using the array operators. The tsearch and contrib GIN opclass support functions still need to be looked over and probably fixed. Another thing I intend to fix separately is that this is pretty inefficient for cases where more than one scan condition needs a full-index search: we'll run duplicate GinScanEntrys, each one of which builds a large bitmap. There is some existing logic to merge duplicate GinScanEntrys but it needs refactoring to make it work for entries belonging to different scan keys. Note that most of gin.h has been split out into a new file gin_private.h, so that gin.h doesn't export anything that's not supposed to be used by GIN opclasses or the rest of the backend. I did quite a bit of other code beautification work as well, mostly fixing comments and choosing more appropriate names for things. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=73912e7fbd1b52c51d914214abbec1cda64595f2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=73912e7fbd1b52c51d914214abbec1cda64595f2</a></li>

<li>Fix the built-in GIN support procedure declarations in pg_proc.h. Add more "internal" arguments so that these pg_proc entries reflect the current preferred API. This is purely a cosmetic change, since GIN doesn't actually consult the pg_proc entry when calling a support function. Accordingly, no catversion bump. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a032d50128f30029651806030f71d594ed6b29e1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a032d50128f30029651806030f71d594ed6b29e1</a></li>

<li>Ooops, forgot to fix contrib/tsearch2's references to GIN support funcs. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=541fc3d4df66a5e51d172a78288069bd92dda0c8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=541fc3d4df66a5e51d172a78288069bd92dda0c8</a></li>

<li>Update GIN support function definitions for contrib/intarray. The underlying C code still needs work, but this at least gets its current regression test passing again. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=69c26c57cfb4194b8cdc69b48b8a71dad1f92bac">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=69c26c57cfb4194b8cdc69b48b8a71dad1f92bac</a></li>

<li>Refactor GIN's handling of duplicate search entries. The original coding could combine duplicate entries only when they originated from the same qual condition. In particular it could not combine cases where multiple qual conditions all give rise to full-index scan requests, which is an expensive case well worth optimizing. Refactor so that duplicates are recognized across all the quals. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56a57473a999b0497e63bde3e303beda5a3c0ff3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56a57473a999b0497e63bde3e303beda5a3c0ff3</a></li>

<li>Remove pg_am.amindexnulls. The only use we have had for amindexnulls is in determining whether an index is safe to cluster on; but since the addition of the amclusterable flag, that usage is pretty redundant. In passing, clean up assorted sloppiness from the last patch that touched pg_am.h: Natts_pg_am was wrong, and ambuildempty was not documented. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7e2f906201c8bb95f7fb17e56b8740c38bda5441">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7e2f906201c8bb95f7fb17e56b8740c38bda5441</a></li>

<li>Add array_contains_nulls() function in arrayfuncs.c. This will support fixing contrib/intarray (and probably other places) so that they don't have to fail on arrays that contain a null bitmap but no live null entries. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=adf328c0e1bfde90b944d53f7197fc436bc0c707">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=adf328c0e1bfde90b944d53f7197fc436bc0c707</a></li>

<li>Fix up gincostestimate for new extractQuery API. The only reason this wasn't crashing while testing the core anyarray operators was that it was disabled for those cases because of passing the wrong type information to get_opfamily_proc :-(. So fix that too, and make it insist on finding the support proc --- in hindsight, silently doing nothing is not as sane a coping mechanism as all that. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4d1b76e49eb848b046ddb1beb0f4589816ec8261">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4d1b76e49eb848b046ddb1beb0f4589816ec8261</a></li>

<li>Fix assorted corner-case bugs in contrib/intarray. The array containment operators now behave per mathematical expectation for empty arrays (ie, an empty array is contained in anything). Both these operators and the query_int operators now work as expected in GiST and GIN index searches, rather than having corner cases where the index searches gave different answers. Also, fix unexpected failures where the operators would claim that an array contained nulls, when in fact there was no longer any null present (similar to bug #5784). The restriction to not have nulls is still there, as removing it would take a lot of added code complexity and probably slow things down significantly. Also, remove the arbitrary restriction to 1-D arrays; unlike the other restriction, this was buying us nothing performance-wise. Assorted cosmetic improvements and marginal performance improvements, too. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fdf2dbda3f49310b20780ad7b290da935cd2335d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fdf2dbda3f49310b20780ad7b290da935cd2335d</a></li>

<li>Use array_contains_nulls instead of ARR_HASNULL on user-supplied arrays. This applies the fix for bug #5784 to remaining places where we wish to reject nulls in user-supplied arrays. In all these places, there's no reason not to allow a null bitmap to be present, so long as none of the current elements are actually null. I did not change some other places where we are looking at system catalog entries or aggregate transition values, as the presence of a null bitmap in such an array would be suspicious. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=304845075ce0eb9045af50ed32c688a0cb8dd490">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=304845075ce0eb9045af50ed32c688a0cb8dd490</a></li>

<li>Fix up core tsquery GIN support for new extractQuery API. No need for the empty-prefix-match kluge to force a full scan anymore. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52fd2d65a33c9c33b29788e9df89d7716f1ec0bc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=52fd2d65a33c9c33b29788e9df89d7716f1ec0bc</a></li>

<li>Fix crash in the new GiST insertion code, when an update splits the root page. This bug was exercised by contrib/intarray/bench, as noted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ca63029eac379d82f78a985a5d4068b9954deb02">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ca63029eac379d82f78a985a5d4068b9954deb02</a></li>

<li>Improve comment. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=327b25768217f5d4fd82770d0ab449814548f094">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=327b25768217f5d4fd82770d0ab449814548f094</a></li>

<li>Update contrib/hstore for new GIN extractQuery API. In particular, make hstore @&gt; '' succeed for all hstores, likewise hstore ?&amp; '{}'. Previously the results were inconsistent and could depend on whether you were using a GiST index, GIN index, or seqscan. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ba398969cd1b32c550345bcf6b713deeb0a7d1de">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ba398969cd1b32c550345bcf6b713deeb0a7d1de</a></li>

<li>Update contrib/pg_trgm for new GIN extractQuery API. No actual change in functionality ... just get rid of uselessly complex code to pass the number of keys via extra_data. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=be0c3ea2d30ba225f0249ae88d6b0bdf3b753162">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=be0c3ea2d30ba225f0249ae88d6b0bdf3b753162</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve array_upper example. The previous example didn't make it clear whether array_upper returned the last element or the index of the last element. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9e4961b7d599ff42accf324a3c080c5095785c9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9e4961b7d599ff42accf324a3c080c5095785c9</a></li>

<li>Improve markup of unnest example. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7f40e30309b5c8f19b1ac86c463ab0ea99907873">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7f40e30309b5c8f19b1ac86c463ab0ea99907873</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>In ecpg's parser removed a fixed length limit for constants defining an array dimension. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=833a2b57bcbebda29fc1eb0b98c0d94ae2c31b7b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=833a2b57bcbebda29fc1eb0b98c0d94ae2c31b7b</a></li>

<li>There is no need to have to identical functions in ecpg thus removing one of them. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1066dbfb85462116e4ed3d889a686f1e48333467">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1066dbfb85462116e4ed3d889a686f1e48333467</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Christian Ullrich sent in a patch which allows for SSPI client authentication on non-Windows builds.</li>

<li>Brar Piening sent in another revision of the patch to add Visual Studio 2010/Windows SDK 7.1 support.</li>

<li>Andrew Dunstan sent in a patch to allow MSVC 2008 to be used on back branches.</li>

<li>Jeff Davis sent in a WIP patch to implement RANGE types.</li>

<li>ITAGAKI Takahiro sent in two patches to implement pg_stat_walsender. The first is a generic formatter for host and port. The second adds the actual system view.</li>

<li>Dimitri Fontaine sent in another revision of the patch which allows pg_dump to support EXTENSIONs.</li>

<li>Dimitri Fontaine sent in a patch to allow upgrading extensions.</li>

<li>Simon Riggs sent in a patch which implements pg_stat_replication_activity in response to ITAGAKI Takahiro's pg_stat_walsender patch.</li>

<li>Shigeru HANADA sent in a patch which removes the requirement that FDWs have USAGE privilege in SQL/MED. This is per the standard.</li>

<li>Shigeru HANADA sent in a pair of patches which implement fdw_handler and foreign_scan, both for SQL/MED.</li>

<li>KaiGai Kohei sent in another revision of the patch to add sepgsql as a contrib module.</li>

<li>Magnus Hagander sent in a patch to implement streaming base backups.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to add MULTISET.</li>

<li>Gurjeet Singh sent in another revision of the patch to add a UNIQUE constraint using extant indexes.</li>

<li>Tom Lane sent in a patch to fix GIN for empty/null/full-scan cases.</li>

<li>ITAGAKI Takahiro sent in another version of the patch to export some of the COPY functions for use in, among other things, foreign data wrappers for files.</li>

<li>Joachim Wieland sent in another revision of the patch to export snapshots.</li>

<li>Joachim Wieland sent in another revision of the patches to do directory-format parallel pg_dump.</li>

<li>Heikki Linnakangas sent in a patch to give streaming base backups a bison grammar.</li>

<li>Magnus Hagander sent in an updated patch to stream base backups.</li>

<li>Alexander Korotkov sent in another revision of the patch to add wildcards to the trigram contrib module.</li>

<li>Andreas Karlsson sent in a patch to add an obj_unique_identifier() function.</li>

<li>Noah Misch sent in a flock of patches intended to make the process of altering a column's type more efficient.</li>

</ul>