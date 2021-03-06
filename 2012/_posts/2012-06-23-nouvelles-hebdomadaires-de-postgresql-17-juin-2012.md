---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 juin 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/06/23/Nouvelles-hebdomadaires-de-PostgreSQL-17-juin-2012"
---


<p>La premi&egrave;re <em>CommitFest</em> du cycle de la version 9.3 a commenc&eacute;, et durera jusqu'au 15 juillet 2012. Le ma&icirc;tre de c&eacute;r&eacute;monie est Kevin Grittner&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/CommitFest">http://wiki.postgresql.org/wiki/CommitFest</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour la <em>Postgres Open 2012</em> est lanc&eacute;. Les propositions sont attendues avant le 26 juin minuit&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2012/speaker/">http://postgresopen.org/2012/speaker/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>AnySQL Maestro 12.6, un outil de gestion bas&eacute; sur ODBC, compatible avec PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/datawizard/">http://www.sqlmaestro.com/products/postgresql/datawizard/</a></li>

<li>pg_extractor 1.0.0, un plug-in permettant de personnaliser pg_dump&nbsp;: 

<a target="_blank" href="https://github.com/omniti-labs/pg_extractor">https://github.com/omniti-labs/pg_extractor</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Appel &agrave; conf&eacute;renciers et plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe</em> 2012 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; sponsors est lanc&eacute;&nbsp;: 

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-06/msg00016.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert behaviour of -x/--xlog to 9.1 semantics. To replace it, add -X/--xlog-method that allows the specification of fetch or stream. Do this to avoid unnecessary backwards-incompatiblity. Spotted and suggested by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9af34cdec87d8e60f200ccd5b1b695880412c62b">http://git.postgresql.org/pg/commitdiff/9af34cdec87d8e60f200ccd5b1b695880412c62b</a></li>

<li>Prevent non-streaming replication connections from being selected sync slave. This prevents a pg_basebackup backup session that just does a base backup (no xlog involved at all) from becoming the synchronous slave and thus blocking all access while it runs. Also fixes the problem when a higher priority slave shows up it would become the sync standby before it has reached the STREAMING state, by making sure we can only switch to a walsender that's actually STREAMING. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3595a71e9ce90a2d4c812a9bb34dc24ffc492c2b">http://git.postgresql.org/pg/commitdiff/3595a71e9ce90a2d4c812a9bb34dc24ffc492c2b</a></li>

<li>Reorder basebackup options, to list pg_basebackup first. Since this is the easy way of doing it, it should be listed first. All the old information is retained for those who want the more advanced way. Also adds a subheading for compressing logs, that seems to have been missing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/920febdad5073688fac34664249ab329dced8320">http://git.postgresql.org/pg/commitdiff/920febdad5073688fac34664249ab329dced8320</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_receivexlog: Rename option --dir to --directory. getopt_long() allows abbreviating long options, so we might as well give the option the full name, and users can abbreviate it how they like. Do some general polishing of the --help output at the same time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d754961f799634128fb2d77632e2b53b736ae21">http://git.postgresql.org/pg/commitdiff/7d754961f799634128fb2d77632e2b53b736ae21</a></li>

<li>Improve documentation of postgres -C option. Clarify help (s/return/print/), and explain that this option is for use by other programs, not for user-facing use (it does not print units). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0a6f9c84bedc745af2a3bf1dee5e2a4e79b46af">http://git.postgresql.org/pg/commitdiff/c0a6f9c84bedc745af2a3bf1dee5e2a4e79b46af</a></li>

<li>Add more message pluralization. Even though we can't do much about the case with multiple plurals in one sentence, we can fix the other cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d933092e0ab55ed95615977e50963f969ac9793d">http://git.postgresql.org/pg/commitdiff/d933092e0ab55ed95615977e50963f969ac9793d</a></li>

<li>Improve reporting of permission errors for array types. Because permissions are assigned to element types, not array types, complaining about permission denied on an array type would be misleading to users. So adjust the reporting to refer to the element type instead. In order not to duplicate the required logic in two dozen places, refactor the permission denied reporting for types a bit. pointed out by Yeb Havinga during the review of the type privilege feature 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15b1918e7d3532f0e4ec3455ae6ce45fae09c86f">http://git.postgresql.org/pg/commitdiff/15b1918e7d3532f0e4ec3455ae6ce45fae09c86f</a></li>

<li>Make documentation of --help and --version options more consistent. Before, some places didn't document the short options (-? and -V), some documented both, some documented nothing, and they were listed in various orders. Now this is hopefully more consistent and complete. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb7520cc26dcd392e3dce294b685b3a0d6dae9e9">http://git.postgresql.org/pg/commitdiff/bb7520cc26dcd392e3dce294b685b3a0d6dae9e9</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_dump output to a named tar-file archive. "pg_dump -Ft -f filename ..." got broken by my recent commit 4317e0246c645f60c39e6572644cff1cb03b4c65, which I fear I only tested in the output-to-stdout variant. Report and fix by Muhammad Asif Naeem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf0945e8636bf0390ef4569bbbf9763573211e03">http://git.postgresql.org/pg/commitdiff/bf0945e8636bf0390ef4569bbbf9763573211e03</a></li>

<li>Ensure pg_ctl behaves sanely when data directory is not specified. Commit aaa6e1def292cdacb6b27088898793b1b879fedf introduced multiple hazards in the case where pg_ctl is executed with neither a -D switch nor any PGDATA environment variable. It would dump core on machines which are unforgiving about printf("%s", NULL), or failing that possibly give a rather unhelpful complaint about being unable to execute "postgres -C", rather than the logically prior complaint about not being told where the data directory is. Edmund Horner's report suggests that there is another, Windows-specific hazard here, but I'm not the person to fix that; it would in any case only be significant when trying to use a config-only PGDATA pointer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51e61b04f8040f627e7605594095b06c10582fd0">http://git.postgresql.org/pg/commitdiff/51e61b04f8040f627e7605594095b06c10582fd0</a></li>

<li>Minor code review for json.c. Improve commenting, conform to project style for use of ++ etc. No functional changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f871ef74a5560377d541e6d94704f30bcbcdb779">http://git.postgresql.org/pg/commitdiff/f871ef74a5560377d541e6d94704f30bcbcdb779</a></li>

<li>Support Linux's oom_score_adj API as well as the older oom_adj API. The simplest way to handle this is just to copy-and-paste the relevant code block in fork_process.c, so that's what I did. (It's possible that something more complicated would be useful to packagers who want to work with either the old or the new API; but at this point the number of such people is rapidly approaching zero, so let's just get the minimal thing done.) Update relevant documentation as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93f4d7f806613d28842f956a84f31cc41d825503">http://git.postgresql.org/pg/commitdiff/93f4d7f806613d28842f956a84f31cc41d825503</a></li>

<li>Deprecate use of GLOBAL and LOCAL in temp table creation. Aside from adjusting the documentation to say that these are deprecated, we now report a warning (not an error) for use of GLOBAL, since it seems fairly likely that we might change that to request SQL-spec-compliant temp table behavior in the foreseeable future. Although our handling of LOCAL is equally nonstandard, there is no evident interest in ever implementing SQL modules, and furthermore some other products interpret LOCAL as behaving the same way we do. So no expectation of change and no warning for LOCAL; but it still seems a good idea to deprecate writing it. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3bc76bdb0ac600e6b4d1e594e1a077c1efc5154">http://git.postgresql.org/pg/commitdiff/c3bc76bdb0ac600e6b4d1e594e1a077c1efc5154</a></li>

<li>Fix description of SQL-standard meaning of CREATE LOCAL TEMP TABLE. I had this slightly wrong, as noted by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b23db944b9d7f051e2f986cc1f55ade82621218">http://git.postgresql.org/pg/commitdiff/8b23db944b9d7f051e2f986cc1f55ade82621218</a></li>

<li>Revert "Reduce checkpoints and WAL traffic on low activity database server." This reverts commit 18fb9d8d21a28caddb72c7ffbdd7b96d52ff9724. Per discussion, it does not seem like a good idea to allow committed changes to go un-checkpointed indefinitely, as could happen in a low-traffic server; that makes us entirely reliant on the WAL stream with no redundancy that might aid data recovery in case of disk failure. This re-introduces the original problem of hot-standby setups generating a small continuing stream of WAL traffic even when idle, but there are other ways to address that without compromising crash recovery, so we'll revisit that issue in a future release cycle. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8b69d89905e04b910bcd65efce1791477b45d35">http://git.postgresql.org/pg/commitdiff/b8b69d89905e04b910bcd65efce1791477b45d35</a></li>

<li>Remove release note entry for reverted patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f0fba1794c72dfbc0f82c18f50d2cb0dd82e480">http://git.postgresql.org/pg/commitdiff/0f0fba1794c72dfbc0f82c18f50d2cb0dd82e480</a></li>

<li>Revisit error message details for JSON input parsing. Instead of identifying error locations only by line number (which could be entirely unhelpful with long input lines), provide a fragment of the input text too, placing this info in a new CONTEXT entry. Make the error detail messages conform more closely to style guidelines, fix failure to expose some of them for translation, ensure compiler can check formats against supplied parameters. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80edfd76591fdb9beec061de3c05ef4e9d96ce56">http://git.postgresql.org/pg/commitdiff/80edfd76591fdb9beec061de3c05ef4e9d96ce56</a></li>

<li>Stamp HEAD as 9.3devel. Let the hacking begin ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bed88fceac04042f0105eb22a018a4f91d64400d">http://git.postgresql.org/pg/commitdiff/bed88fceac04042f0105eb22a018a4f91d64400d</a></li>

<li>Stamp library minor versions for 9.3. This includes fixing the MSVC copy of ecpg/preproc's version info, which seems to have been overlooked repeatedly. Can't we fix that so there are not two copies?? 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/357c5493349c5d7603739b9a44384b0e9f35fc25">http://git.postgresql.org/pg/commitdiff/357c5493349c5d7603739b9a44384b0e9f35fc25</a></li>

<li>Flesh out RELEASE_CHANGES instructions for branching in git. We have this info in the wiki, but it should be here too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f32609db72f07d6477a4c7de2565cb244f2af969">http://git.postgresql.org/pg/commitdiff/f32609db72f07d6477a4c7de2565cb244f2af969</a></li>

<li>Add 9.2 branch to git_changelog's list. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80491a19839fd7741805622552f503202780fc52">http://git.postgresql.org/pg/commitdiff/80491a19839fd7741805622552f503202780fc52</a></li>

<li>Fix stats collector to recover nicely when system clock goes backwards. Formerly, if the system clock went backwards, the stats collector would fail to update the stats file any more until the clock reading again exceeds whatever timestamp was last written into the stats file. Such glitches in the clock's behavior are not terribly unlikely on machines not using NTP. Such a scenario has been observed to cause regression test failures in the buildfarm, and it could have bad effects on the behavior of autovacuum, so it seems prudent to install some defenses. We could directly detect the clock going backwards by adding GetCurrentTimestamp calls in the stats collector's main loop, but that would hurt performance on platforms where GetCurrentTimestamp is expensive. To minimize the performance hit in normal cases, adopt a more complicated scheme wherein backends check for clock skew when reading the stats file, and if they see it, signal the stats collector by sending an extra stats inquiry message. The stats collector does an extra GetCurrentTimestamp only when it receives an inquiry with an apparently out-of-order timestamp. To avoid unnecessary GetCurrentTimestamp calls, expand the inquiry messages to carry the backend's current clock reading as well as its stats cutoff time. The latter, being intentionally slightly in-the-past, would trigger more clock rechecks than we need if it were used for this purpose. We might want to backpatch this change at some point, but let's let it shake out in the buildfarm for awhile first. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e18eacbdff2ae2abd5ff38eee725e6399e39b41">http://git.postgresql.org/pg/commitdiff/9e18eacbdff2ae2abd5ff38eee725e6399e39b41</a></li>

<li>Refer to the default foreign key match style as MATCH SIMPLE internally. Previously we followed the SQL92 wording, "MATCH &lt;unspecified&gt;", but since SQL99 there's been a less awkward way to refer to the default style. In addition to the code changes, pg_constraint.confmatchtype now stores this match style as 's' (SIMPLE) rather than 'u' (UNSPECIFIED). This doesn't affect pg_dump or psql because they use pg_get_constraintdef() to reconstruct foreign key definitions. But other client-side code might examine that column directly, so this change will have to be marked as an incompatibility in the 9.3 release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5297bdfe4c4a47376c41b96161fb55c2294a0b1">http://git.postgresql.org/pg/commitdiff/f5297bdfe4c4a47376c41b96161fb55c2294a0b1</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Copy-editing of release notes. Remove a couple of items that were actually back-patched bug fixes. Add additional details to a couple of items which lacked a description. Improve attributions for a couple of items I was involved with. A few other miscellaneous corrections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99b3135e33949da601014800694ae6905ed1075f">http://git.postgresql.org/pg/commitdiff/99b3135e33949da601014800694ae6905ed1075f</a></li>

<li>Mark JSON error detail messages for translation. Per gripe from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36b7e3da17bcca4efe5584d95c386cec2a221a13">http://git.postgresql.org/pg/commitdiff/36b7e3da17bcca4efe5584d95c386cec2a221a13</a></li>

<li>Make \conninfo print SSL information. Alastair Turner, per suggestion from Bruce Momjian. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7582e0be78bc031803e274d428381e0b6077b810">http://git.postgresql.org/pg/commitdiff/7582e0be78bc031803e274d428381e0b6077b810</a></li>

<li>Remove RELKIND_UNCATALOGED. This may have been important at some point in the past, but it no longer does anything useful. Review by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2c86a1ccd17145eeed2377ff7930e2ccbf5869e">http://git.postgresql.org/pg/commitdiff/d2c86a1ccd17145eeed2377ff7930e2ccbf5869e</a></li>

<li>Remove misplaced sanity check from heap_create(). Even when allow_system_table_mods is not set, we allow creation of any type of SQL object in pg_catalog, except for relations. And you can get relations into pg_catalog, too, by initially creating them in some other schema and then moving them with ALTER .. SET SCHEMA. So this restriction, which prevents relations (only) from being created in pg_catalog directly, is fairly pointless. If we need a safety mechanism for this, it should be placed further upstream, so that it affects all SQL objects uniformly, and picks up both CREATE and SET SCHEMA. For now, just rip it out, per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a475c6036752c26dca538632b68fd2cc592976b7">http://git.postgresql.org/pg/commitdiff/a475c6036752c26dca538632b68fd2cc592976b7</a></li>

<li>Add new function log_newpage_buffer. When I implemented the ginbuildempty() function as part of implementing unlogged tables, I falsified the note in the header comment for log_newpage. Although we could fix that up by changing the comment, it seems cleaner to add a new function which is specifically intended to handle this case. So do that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cd015bea38b8a59feb84bf238a880a3b503cf5f">http://git.postgresql.org/pg/commitdiff/6cd015bea38b8a59feb84bf238a880a3b503cf5f</a></li>

<li>During transaction cleanup, release locks before deleting files. There's no need to hold onto the locks until the files are needed, and by doing it this way, we reduce the impact on other backends who may be awaiting locks we hold. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd80073445ff5d72ad42923ba3d017541feae103">http://git.postgresql.org/pg/commitdiff/cd80073445ff5d72ad42923ba3d017541feae103</a></li>

<li>New SQL functions pg_backup_in_progress() and pg_backup_start_time(). Darold Gilles, reviewed by Gabriele Bartolini and others, rebased by Marco Nenciarini. Stylistic cleanup and OID fixes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68de499bda40fdf1395b714bb63febad61046700">http://git.postgresql.org/pg/commitdiff/68de499bda40fdf1395b714bb63febad61046700</a></li>

<li>Doc corrections for pg_is_in_backup patch. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c616d85f6b6c7bd160c71583e2445b460eee8e3d">http://git.postgresql.org/pg/commitdiff/c616d85f6b6c7bd160c71583e2445b460eee8e3d</a></li>

<li>Improve readability and error messages in pg_backup_start_time. Gurjeet Singh, with corrections by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8507c2f8564b709bb6a3cc86e9599f6129f45c8e">http://git.postgresql.org/pg/commitdiff/8507c2f8564b709bb6a3cc86e9599f6129f45c8e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, verify that the install user has the same oid on both clusters, and make sure the new cluster has no additional users. Backpatch to 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9212e379c55564c8b6cdc8585b74606e90ec1ea">http://git.postgresql.org/pg/commitdiff/b9212e379c55564c8b6cdc8585b74606e90ec1ea</a></li>

<li>In pg_upgrade, report pre-PG 8.1 plpython helper functions left in the public schema that no longer point to valid shared object libraries, and suggest a solution. Backpatch to 9.1 (already in head) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f3326175a951e3ff9e62c310d686a681883899f">http://git.postgresql.org/pg/commitdiff/0f3326175a951e3ff9e62c310d686a681883899f</a></li>

<li>Improve pg_upgrade wording for pg_ctl start failure; could be connection failure. Backpatch to 9.2. Per report from Evan D. Hoffman 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/877b55c61962b480080a818b95dd462d5a7fe68d">http://git.postgresql.org/pg/commitdiff/877b55c61962b480080a818b95dd462d5a7fe68d</a></li>

<li>Update pgindent Perl indentation instructions based on feedback from &Agrave;lvaro and Noah Misch. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6e02074371b39f9bfd7323c95102e4af53b34c6">http://git.postgresql.org/pg/commitdiff/d6e02074371b39f9bfd7323c95102e4af53b34c6</a></li>

<li>In pgindent, suppress reading the perltidy RC file using --noprofile. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0acd97825916bd341dfc6061a0713e0c56901571">http://git.postgresql.org/pg/commitdiff/0acd97825916bd341dfc6061a0713e0c56901571</a></li>

<li>Remove 'for' loop perltidy argument, and move args to perltidyrc file. Backpatch to 9.2. Per suggestion from Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47463a809870a736fcd2a4c6896c0f54be831f51">http://git.postgresql.org/pg/commitdiff/47463a809870a736fcd2a4c6896c0f54be831f51</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Noah Misch sent in a patch to restrict changing a function's state of CALLED ON NULL INPUT to the those roles which have permission to use the language.</li>

<li>Jeff Davis sent in another revision of the patch to add 16-bit page checksums.</li>

<li>Jeff Davis sent in two more revisions of the patch to fix the way fsync happens during initdb.</li>

<li>Amit Kapila sent in another revision of the patch to provide fallback_application_name in places where it's not yet provided.</li>

<li>Andres Freund sent in 16 patches implementing different parts of Logical Replication/BDR.</li>

<li>Alexander Korotkov sent in a patch to implement quad-tree SP-GiST indexing on ranges.</li>

<li>Marco Nenciarini sent in a patch to implement array_remove for 1-D arrays and array_replace.</li>

<li>Shigeru HANADA sent in another revision of a patch to add a pgsql_fdw.</li>

<li>Robert Haas sent in a WIP patch implementing metapages for all relations.</li>

<li>KaiGai Kohei sent in a patch implementing row-level access control.</li>

<li>Alvaro Herrera sent in another revision of the foreign key locks patch.</li>

<li>Heikki Linnakangas sent in a flock of patches to change the WAL format: one to use a 64-bit segment number, instead of the log/seg combination; the second to include the xl_rem_len field, used for continuation records, unconditionally in the xlog page header; the third to allow WAL record header to be split across pages.</li>

<li>Robert Haas sent in another revision of the patch to allow measuring spinning on lwlocks.</li>

<li>Peter Eisentraut sent in a patch implementing TRANSFORMs, namely SQL-callable bits of code transforming PostgreSQL data structures to and from ones in PLs.</li>

<li>Honza Horak sent in a patch to allow an instance to answer on more than one unix socket.</li>

<li>Marko Kreen sent in two revisions of a patch to allow libpq to return a row at a time rather than buffering the entire result set before returning the first row.</li>

<li>Dimitri Fontaine sent in yet another patch implementing event triggers.</li>

<li>Alvaro Herrera sent in two revisions of a patch which splits htup.h in two pieces, one public and one private.</li>

<li>Tom Lane sent in a patch to change the behavior of ON UPDATE SET DEFAULT/SET NULL to set all columns, per the change to the SQL standard.</li>

<li>Josh Kupershmidt sent in another revision of the patch to fix several infelicities in tab completion for DROP FUNCTION in psql.</li>

</ul>