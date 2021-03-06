---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 mai 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/05/13/Nouvelles-hebdomadaires-de-PostgreSQL-13-mai-2018"
---


<p>Les mises &agrave; jour de s&eacute;curit&eacute; 10.4, 9.6.9, 9.5.13, 9.4.18, et 9.3.23 ont &eacute;t&eacute; publi&eacute;es. Merci de lire l'annonce ci-dessous et d'appliquer la mise &agrave; jour d&egrave;s que possible&nbsp;: <a target="_blank" href="https://www.postgresql.org/about/news/1851/">https://www.postgresql.org/about/news/1851/</a></p>

<p><em>PG Day France 2018</em> aura lieu &agrave; Marseille le 26 juin 2018&nbsp;: <a target="_blank" href="http://pgday.fr/">http://pgday.fr/</a></p>

<p>La PgConf Silicon Valley 2018 aura lieu &agrave; San Francisco du 5 au 7 septembre 2018. L'appel &agrave; conf&eacute;renciers court jusqu'au 12 juin, <em>Anywhere on Earth</em> (AoE) (2018-06-12 23:59:59-12:00) <a target="_blank" href="https://2018.postgresopen.org/callforpapers/">https://2018.postgresopen.org/callforpapers/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgBackRest 2.02, un syst&egrave;me de sauvegarde et restauration pour PostgreSQL&nbsp;: <a target="_blank" href="https://pgbackrest.org/release.html#2.02">https://pgbackrest.org/release.html#2.02</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mai</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-05/">http://archives.postgresql.org/pgsql-jobs/2018-05/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: PostgreSQL Meetup Nantes #10 le 29 mai&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>[ndt: Rencontre PostgreSQL à Lyon le 8 juin, entre midi et 14h&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/" target="_blank">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. Les inscriptions sont ouvertes jusqu'au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

<li>Le PUG de Portland organise un PGDay le 10 septembre 2018 &agrave; Portland, Oregon. L'appel &agrave; conf&eacute;renciers se passe par l&agrave;&nbsp;: <a target="_blank" href="https://goo.gl/forms/E0CiUQGSZGMYwh922">https://goo.gl/forms/E0CiUQGSZGMYwh922</a> <a target="_blank" href="https://pdx.postgresql.us/pdxpgday2018">https://pdx.postgresql.us/pdxpgday2018</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180513190317.GA23101@fetter.org">http://www.postgresql.org/message-id/20180513190317.GA23101@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Remove unused macro. left behind by db3af9feb19f39827e916145f88fa5eca3130cb2 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/659442e40d57af5ea00dfc3d31266ef0cfb8278e">https://git.postgresql.org/pg/commitdiff/659442e40d57af5ea00dfc3d31266ef0cfb8278e</a></li>

<li>doc: Fix minor markup issue. There shouldn't be a line break between two adjacent tags, because that will appear as whitespace in the output. (The rendering engine might in turn collapse that whitespace away, so it might not actually make a difference, but it's more correct this way.) <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/baf21b922a18c2809068238503ebb3797994e615">https://git.postgresql.org/pg/commitdiff/baf21b922a18c2809068238503ebb3797994e615</a></li>

<li>doc: Improve spelling and wording a bit. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a43a4509f8a9249ba6c2734596c029f0430a75bc">https://git.postgresql.org/pg/commitdiff/a43a4509f8a9249ba6c2734596c029f0430a75bc</a></li>

<li>Refine error messages. "JSON" when not referring to a data type should be upper case. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/831f5d11ec7bb8a693c581720d014b3a5ad7d446">https://git.postgresql.org/pg/commitdiff/831f5d11ec7bb8a693c581720d014b3a5ad7d446</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Documentation updates for partitioning. Takayuki Tsunakawa Discussion: <a target="_blank" href="http://postgr.es/m/0A3221C70F24FB45833433255569204D1F965627@G01JPEXMBYT05">http://postgr.es/m/0A3221C70F24FB45833433255569204D1F965627@G01JPEXMBYT05</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f955d7ee166dfa053caa6d1bdb2a28b28b212fe3">https://git.postgresql.org/pg/commitdiff/f955d7ee166dfa053caa6d1bdb2a28b28b212fe3</a></li>

<li>doc: Restrictions on InitPlans in parallel queries relaxed. This updates the documentation for changes originally made in commit e89a71fb449af2ef74f47be1175f99956cf21524. Patch by me, reviewed (but not entirely endorsed) by Amit Kapila. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmoa+vupW8V_gBonz6hU7WwN2zJ=UTsVWCVB+rN6vaaXfZw@mail.gmail.com">http://postgr.es/m/CA+Tgmoa+vupW8V_gBonz6hU7WwN2zJ=UTsVWCVB+rN6vaaXfZw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ddc1f32ee5073503a396c7a4df32865205dd3970">https://git.postgresql.org/pg/commitdiff/ddc1f32ee5073503a396c7a4df32865205dd3970</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Last-minute updates for release notes. The set of functions that need parallel-safety adjustments isn't the same in 9.6 as 10, so I shouldn't have blindly back-patched that list. Adjust as needed. Also, provide examples of the commands to issue. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f34f0e4c58a31e5edd3aa8a23e171fbcf7e01ff2">https://git.postgresql.org/pg/commitdiff/f34f0e4c58a31e5edd3aa8a23e171fbcf7e01ff2</a></li>

<li>Suppress compiler warnings when building with --enable-dtrace. Most versions of "dtrace -h" drop const qualifiers from the declarations of probe functions (though macOS gets it right). This causes compiler warnings when we pass in pointers to const. Repair by extending our existing post-processing of the probes.h file. To do so, assume that all "char *" arguments should be "const char *"; that seems reasonably safe. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm=2j1pWSruQJqJ91ZDzD8w9ZZDsM4j2C6x75C-VryWg-_w@mail.gmail.com">https://postgr.es/m/CAEepm=2j1pWSruQJqJ91ZDzD8w9ZZDsM4j2C6x75C-VryWg-_w@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/513ff52e81675f26ceb91e8301019546439d73c9">https://git.postgresql.org/pg/commitdiff/513ff52e81675f26ceb91e8301019546439d73c9</a></li>

<li>Update oidjoins regression test for v11. Commit 86f575948 already manually updated the oidjoins test for the new pg_constraint.conparentid =&gt; pg_constraint.oid relationship, but failed to update findoidjoins/README, thus the apparent inconsistency here. Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20180507001811.GA27389@paquier.xyz">https://postgr.es/m/20180507001811.GA27389@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fbb99e5883d88687de4dbd832c2843f600ab3dd8">https://git.postgresql.org/pg/commitdiff/fbb99e5883d88687de4dbd832c2843f600ab3dd8</a></li>

<li>Undo extra chattiness of postmaster logs in TAP tests. Commit 6271fceb8 changed PostgresNode.pm to force log_min_messages = debug1 in all TAP tests, without any discussion and without a concrete need for it. This makes some of the TAP tests noticeably slower (although much of that may be due to poorly-written regexes), and for certain it's bloating the buildfarm logs. Revert the change. Discussion: <a target="_blank" href="https://postgr.es/m/32459.1525657786@sss.pgh.pa.us">https://postgr.es/m/32459.1525657786@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/17551f1a21fa8e70aa0bca1153de03460742565c">https://git.postgresql.org/pg/commitdiff/17551f1a21fa8e70aa0bca1153de03460742565c</a></li>

<li>Count heap tuples in non-SnapshotAny path in IndexBuildHeapRangeScan(). Brown-paper-bag bug in commit 7c91a0364: when we rearranged the placement of "reltuples += 1" statements, we missed including one in this code path. The net effect of that was that CREATE INDEX CONCURRENTLY would set the table's pg_class.reltuples to zero, as would index builds done during bootstrap mode. (It seems like parallel index builds ought to fail similarly, but they don't, perhaps because reltuples is computed in some other way. You certainly couldn't figure that out from the abysmally underdocumented parallelism code in this area.) I was led to this by wondering why initdb seemed to have slowed down as a result of 7c91a0364, as is evident in the buildfarm's timing history. The reason is that every system catalog with indexes had pg_class.reltuples = 0 after bootstrap, causing the planner to make some terrible choices for queries in the post-bootstrap steps. On my workstation, this fix causes the runtime of "initdb -N" to drop from ~2.0 sec to ~1.4 sec, which is almost though not quite back to where it was in v10. That's not much of a deal for production use perhaps, but it makes a noticeable difference for buildfarm and "make check-world" runs, which do a lot of initdbs. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3a675f729ea96c8bf3e764996a0c743500e564ef">https://git.postgresql.org/pg/commitdiff/3a675f729ea96c8bf3e764996a0c743500e564ef</a></li>

<li>Improve initdb's query for generating default descriptions a little. While poking into initdb's performance, I noticed that this query wasn't being done very intelligently. By forcing it to execute obj_description() for each pg_proc/pg_operator join row, we were essentially setting up a nestloop join to pg_description, which is not a bright query plan when there are hundreds of outer rows. Convert the check for a "deprecated" operator into a NOT EXISTS so that it can be done as a hashed antijoin. On my workstation this reduces the time for this query from ~ 35ms to ~ 10ms. Which is not a huge win, but it adds up over buildfarm runs. In passing, insert forced query breaks (\n\n, in single-user mode) after each SQL-query file that initdb sources, and after some relatively new queries in setup_privileges(). This doesn't make a lot of difference normally, but it will result in briefer, saner error messages if anything goes wrong. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dec10340d5ba63cf338dea256ac0fa66c649bf9e">https://git.postgresql.org/pg/commitdiff/dec10340d5ba63cf338dea256ac0fa66c649bf9e</a></li>

<li>Improve inefficient regexes in vacuumdb TAP test. The regexes used in 102_vacuumdb_stages.pl to check the postmaster log for expected output contained several places with ".*.*", which is underdetermined and can cause exponential runtime growth in Perl's regex matcher (since it's not bright enough not to waste time seeing whether different splits of the same substring would allow a match). We were fortunate that the amount of text in the postmaster log was generally not enough to make the runtime go to the moon; although commit 6271fceb8 had been on the hairy edge of an obvious problem, thanks to its increasing the default log verbosity to DEBUG1. Experimentation shows that anyone who tried to run this test case with an even higher log verbosity would have been in for serious pain. But even at default logging level, fixing this saves several hundred ms on my workstation, more on slower buildfarm members. Remove the extra ".*"s, restoring more-or-less-linear matching speed. Back-patch to 9.4 where the test case was added, mostly in case anyone tries to do related debugging in a back branch. Discussion: <a target="_blank" href="https://postgr.es/m/32459.1525657786@sss.pgh.pa.us">https://postgr.es/m/32459.1525657786@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c63913ca7d1df241149a02fddf9819952b998028">https://git.postgresql.org/pg/commitdiff/c63913ca7d1df241149a02fddf9819952b998028</a></li>

<li>Update time zone data files to tzdata release 2018e. DST law changes in North Korea. Redefinition of "daylight savings" in Ireland, as well as for some past years in Namibia and Czechoslovakia. Additional historical corrections for Czechoslovakia. With this change, the IANA database models Irish timekeeping as following "standard time" in summer, and "daylight savings" in winter, so that the daylight savings offset is one hour behind standard time not one hour ahead. This does not change their UTC offset (+1:00 in summer, 0:00 in winter) nor their timezone abbreviations (IST in summer, GMT in winter), though now "IST" is more correctly read as "Irish Standard Time" not "Irish Summer Time". However, the "is_dst" column in the pg_timezone_names view will now be true in winter and false in summer for the Europe/Dublin zone. Similar changes were made for Namibia between 1994 and 2017, and for Czechoslovakia between 1946 and 1947. So far as I can find, no Postgres internal logic cares about which way tm_isdst is reported; in particular, since commit b2cbced9e we do not rely on it to decide how to interpret ambiguous timestamps during DST transitions. So I don't think this change will affect any Postgres behavior other than the timezone-view outputs. Discussion: <a target="_blank" href="https://postgr.es/m/30996.1525445902@sss.pgh.pa.us">https://postgr.es/m/30996.1525445902@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/234bb985c574d1ed9e63d382b327ac3d3e329c56">https://git.postgresql.org/pg/commitdiff/234bb985c574d1ed9e63d382b327ac3d3e329c56</a></li>

<li>Last-minute updates for release notes. Security: CVE-2018-1115 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b56d5f230fae5fccf4fb9f255dfa78b01afed0d9">https://git.postgresql.org/pg/commitdiff/b56d5f230fae5fccf4fb9f255dfa78b01afed0d9</a></li>

<li>Doc: fix overenthusiastic markup. I get "WARNING: nested link may be undefined in output: &lt;xref @linkend = 'pgbench'&gt; nested inside parent element link" from this. Also remove some trailing whitespace. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d9fcf7f5e387c29427ff37b5e0fb0763f9a2b10a">https://git.postgresql.org/pg/commitdiff/d9fcf7f5e387c29427ff37b5e0fb0763f9a2b10a</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Clean up some perlcritic warnings. In Catalog.pm, mark eval of a string instead of a block as allowed. Disallow perlcritic completely in Gen_dummy_probes.pl, as it's generated code. Protect a couple of lines in plperl code from perltidy, so that the annotation for perlcritic stays on the same line as the construct it would otherwise object to. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d2c1512ac48c1c25dfec07d341e9b74e57f6fbc4">https://git.postgresql.org/pg/commitdiff/d2c1512ac48c1c25dfec07d341e9b74e57f6fbc4</a></li>

<li>Add a script and a config file to run perlcritic. This is similar to what we do to run perltidy. For now we only run at severity level 5. Over time we can improve our perl code and reduce the severity level. Discussion: <a target="_blank" href="https://postgr.es/m/86aa2a3a-0c68-21fb-9560-84ad6914d561@2ndQuadrant.com">https://postgr.es/m/86aa2a3a-0c68-21fb-9560-84ad6914d561@2ndQuadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/91703ca2144e58d041c132fb7ff06a6d1721e904">https://git.postgresql.org/pg/commitdiff/91703ca2144e58d041c132fb7ff06a6d1721e904</a></li>

<li>Restrict vertical tightness to parentheses in Perl code. The vertical tightness settings collapse vertical whitespace between opening and closing brackets (parentheses, square brakets and braces). This can make data structures in particular harder to read, and is not very consistent with our style in non-Perl code. This patch restricts that setting to parentheses only, and reformats all the perl code accordingly. Not applying this to parentheses has some unfortunate effects, so the consensus is to keep the setting for parentheses and not for the others. The diff for this patch does highlight some places where structures should have trailing commas. They can be added manually, as there is no automatic tool to do so. Discussion: <a target="_blank" href="https://postgr.es/m/a2f2b87c-56be-c070-bfc0-36288b4b41c1@2ndQuadrant.com">https://postgr.es/m/a2f2b87c-56be-c070-bfc0-36288b4b41c1@2ndQuadrant.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/35361ee78890ce5b559a710c8fa2fdfa843eb280">https://git.postgresql.org/pg/commitdiff/35361ee78890ce5b559a710c8fa2fdfa843eb280</a></li>

<li>perltidy some recent code changes before changing perltidy settings. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/286bb240e1c8e279efa2d805c7f700abfb771925">https://git.postgresql.org/pg/commitdiff/286bb240e1c8e279efa2d805c7f700abfb771925</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Improve jsonb cast error message. Initial variant of error message didn't follow style of another casting error messages and wasn't informative. Per gripe from Robert Haas. Reviewer: Tom Lane Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/CA%2BTgmob08StTV9yu04D0idRFNMh%2BUoyKax5Otvrix7rEZC8rMw%40mail.gmail.com#CA+Tgmob08StTV9yu04D0idRFNMh+UoyKax5Otvrix7rEZC8rMw@mail.gmail.com">https://www.postgresql.org/message-id/flat/CA%2BTgmob08StTV9yu04D0idRFNMh%2BUoyKax5Otvrix7rEZC8rMw%40mail.gmail.com#CA+Tgmob08StTV9yu04D0idRFNMh+UoyKax5Otvrix7rEZC8rMw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/cb5d94295986298af666534970f9bb3715574646">https://git.postgresql.org/pg/commitdiff/cb5d94295986298af666534970f9bb3715574646</a></li>

<li>Various improvements of skipping index scan during vacuum techniques. * Change vacuum_cleanup_index_scale_factor GUC to PGC_USERSET. vacuum_cleanup_index_scale_factor GUC was defined as PGC_SIGHUP. But this GUC affects not only autovacuum. So it might be useful to change it from user session in order to influence manually runned VACUUM. * Add missing tab-complete support for vacuum_cleanup_index_scale_factor reloption. * Fix condition for B-tree index cleanup. Zero value of vacuum_cleanup_index_scale_factor means that user wants B-tree index cleanup to be never skipped. * Documentation and comment improvements Authors: Justin Pryzby, Alexander Korotkov, Liudmila Mantrova Reviewed by: all authors and Robert Haas Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/flat/20180502023025.GD7631%40telsasoft.com">https://www.postgresql.org/message-id/flat/20180502023025.GD7631%40telsasoft.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8e12f4a250d250a89153da2eb9b91c31bb80c483">https://git.postgresql.org/pg/commitdiff/8e12f4a250d250a89153da2eb9b91c31bb80c483</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Remove useless 'default' clause. Author: Michael Paquier Reviewed-by: Amit Langote Reviewed-by: &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/20180424012042.GD1570@paquier.xyz">https://postgr.es/m/20180424012042.GD1570@paquier.xyz</a> Discussion: <a target="_blank" href="https://postgr.es/m/20180509061039.GC11897@paquier.xyz">https://postgr.es/m/20180509061039.GC11897@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c775fb9e18ace94e61d5d9587b5667f7baaca459">https://git.postgresql.org/pg/commitdiff/c775fb9e18ace94e61d5d9587b5667f7baaca459</a></li>

<li>Make gen_partprune_steps static. There's no need to export this function, so don't. Micha&#65533;l didn't actually write the patch, but we list him as first author because with a trivial one like this, intellectual authorship is as important (if not more) as bit shovelling. Author: Micha&#65533;l Paquier, Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/c91299c4-199b-0f16-339b-a29d6d2a39ee@lab.ntt.co.jp">https://postgr.es/m/c91299c4-199b-0f16-339b-a29d6d2a39ee@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d1e2cac5ff7eaf3e9feac419205b3e08052be961">https://git.postgresql.org/pg/commitdiff/d1e2cac5ff7eaf3e9feac419205b3e08052be961</a></li>

<li>Fix assorted partition pruning bugs. match_clause_to_partition_key failed to consider COERCION_PATH_ARRAYCOERCE cases in scalar-op-array expressions, so it was possible to crash the server easily. To handle this case properly (ie. prune partitions) we would need to run a bit of executor code during planning. Maybe it can be improved, but for now let's just not crash. Add a test case that used to trigger the crash. Author: Micha&#65533;l Paquier match_clause_to_partition_key failed to indicate that operators that don't have a commutator in a btree opclass are unsupported. It is possible for this to cause a crash later if such an operator is used in a scalar-op-array expression. Add a test case that used to the crash. Author: Amit Langote One caller of gen_partprune_steps_internal in match_clause_to_partition_key was too optimistic about the former never returning an empty step list. Rid it of its innocence. (Having fixed the bug above, I no longer know how to exploit this, so no test case for it, but it remained a bug.) Revise code flow a little bit, for succintness. Author: &#65533;lvaro Herrera Reported-by: Marina Polyakova Reviewed-by: Micha&#65533;l Paquier Reviewed-by: Amit Langote Reviewed-by: &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/ff8f9bfa485ff961d6bb43e54120485b@postgrespro.ru">https://postgr.es/m/ff8f9bfa485ff961d6bb43e54120485b@postgrespro.ru</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d758d9702e2f64f08565e18eb6cb7991efa2dc16">https://git.postgresql.org/pg/commitdiff/d758d9702e2f64f08565e18eb6cb7991efa2dc16</a></li>

<li>Add relkind 'I' to catalog.sgml's list relkinds. Commit 8b08f7d4820f added a relkind for local partitioned indexes, but failed to add it to pg_class's list of possible relkinds. Repair. Author: Peter Geoghegan, Micha&#65533;l Paquier Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-WzkOKptQiE51Bh4_xeEHhaBwHkZkGtKizrFMgEkfUuRRQg@mail.gmail.com">https://postgr.es/m/CAH2-WzkOKptQiE51Bh4_xeEHhaBwHkZkGtKizrFMgEkfUuRRQg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/550091f218ce9bff92e3753332142ed6917c27d5">https://git.postgresql.org/pg/commitdiff/550091f218ce9bff92e3753332142ed6917c27d5</a></li>

<li>pgstatindex, pageinspect: handle partitioned indexes. Commit 8b08f7d4820f failed to update these modules to at least give non-broken error messages for partitioned indexes. Add appropriate error support to them. Peter G. was complaining about a problem of unfriendly error messages; while we haven't fixed that yet, subsequent discussion let to discovery of these unhandled cases. Author: Micha&#65533;l Paquier Reported-by: Peter Geoghegan Discussion: <a target="_blank" href="https://postgr.es/m/CAH2-WzkOKptQiE51Bh4_xeEHhaBwHkZkGtKizrFMgEkfUuRRQg@mail.gmail.com">https://postgr.es/m/CAH2-WzkOKptQiE51Bh4_xeEHhaBwHkZkGtKizrFMgEkfUuRRQg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bef5fcc36be3d08ec123889a0c82f5e07a63ff88">https://git.postgresql.org/pg/commitdiff/bef5fcc36be3d08ec123889a0c82f5e07a63ff88</a></li>

<li>pgstatindex: HASH -&gt; hash. Fix the lone error message in the whole source tree to use capitalized HASH when referring to hash indexes, making it look like all the other messages. Someday it would be good to standardize 'B-Tree', 'B-tree', 'btree', and random other spellings, too, but that's a larger patch ... Author: &#65533;lvaro Herrera <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c8478f4fd908b5a122b5638018bbb749ac0e862f">https://git.postgresql.org/pg/commitdiff/c8478f4fd908b5a122b5638018bbb749ac0e862f</a></li>

<li>docs: Rework sections on partition pruning/exclusion. Explain partition pruning more thoroughly, in a section above the one that explains constraint exclusion, since the new feature is the one that will be used more extensively from now on. Move some of the material from the constraint exclusion subsection to the one on partition pruning, so that we can explain the legacy method by explaining the differences with the new one instead of repeating it. Author: David Rowley, &#65533;lvaro Herrera Reviewed-by: Amit Langote, David G. Johnston, Justin Pryzby Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f8PECxEi1YQ9nhVtshtfOMHUzAMm_Zp4gGCOCnMPjEKJA@mail.gmail.com">https://postgr.es/m/CAKJS1f8PECxEi1YQ9nhVtshtfOMHUzAMm_Zp4gGCOCnMPjEKJA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bebc46931a1215567d4aabaebb406848f5a82340">https://git.postgresql.org/pg/commitdiff/bebc46931a1215567d4aabaebb406848f5a82340</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>adminpack: Revoke EXECUTE on pg_logfile_rotate(). In 9.6, we moved a number of functions over to using the GRANT system to control access instead of having hard-coded superuser checks. As it turns out, adminpack was creating another function in the catalog for one of those backend functions where the superuser check was removed, specifically pg_rotate_logfile(), but it didn't get the memo about having to REVOKE EXECUTE on the alternative-name function (pg_logfile_rotate()), meaning that in any installations with adminpack on 9.6 and higher, any user is able to run the pg_logfile_rotate() function, which then calls pg_rotate_logfile() and rotates the logfile. Fix by adding a new version of adminpack (1.1) which handles the REVOKE. As this function should have only been available to the superuser, this is a security issue, albeit a minor one. In HEAD, move the changes implemented for adminpack up to be adminpack 2.0 instead of 1.1. Security: CVE-2018-1115 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/7b347409fa2776fbaa4ec9c57365f48a2bbdb80c">https://git.postgresql.org/pg/commitdiff/7b347409fa2776fbaa4ec9c57365f48a2bbdb80c</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: clarify that CREATE TABLE ... _AS_ can be parallelized. CREATE TABLE without AS doesn't have anything to parallelize. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/25468994cab87ab7e946b6866937ee642fc1261d">https://git.postgresql.org/pg/commitdiff/25468994cab87ab7e946b6866937ee642fc1261d</a></li>

<li>docs: initial draft of PG 11 release notes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5631c99d2a374e17abcb2ff63f58fcaf5c3a5248">https://git.postgresql.org/pg/commitdiff/5631c99d2a374e17abcb2ff63f58fcaf5c3a5248</a></li>

<li>doc: markup for PG 11 release notes and included email tips. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6186d0bd615ed2eb921ad13ccdf4ceed19d3f7a8">https://git.postgresql.org/pg/commitdiff/6186d0bd615ed2eb921ad13ccdf4ceed19d3f7a8</a></li>

<li>docs: more PG 11 markup and email suggestions. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fb68638ae8af3d5f5a9dcddb8e513f21b2797361">https://git.postgresql.org/pg/commitdiff/fb68638ae8af3d5f5a9dcddb8e513f21b2797361</a></li>

<li>doc: update PG 11 rel. notes for ALTER TABLE's non-null default. Reported-by: Peter Geoghegan <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8c6227a2f3cdf144c4de135329fd76eb66f5684a">https://git.postgresql.org/pg/commitdiff/8c6227a2f3cdf144c4de135329fd76eb66f5684a</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&#65533;l Paquier sent in a patch to remove some newlines no longer needed when PQErrorMessage is used.</p>

<p>Alexander Kuzmenkov sent in another revision of a patch to make pg_ctl play better with logrotate.</p>

<p>Amit Langote sent in another revision of a patch to fix how get_partition_operator looks up the operator.</p>

<p>Micha&#65533;l Paquier sent in a patch to make guc_malloc/strdup/realloc available to plugins.</p>

<p>Ildar Musin sent in another revision of a patch to add a MAP syntax for arrays.</p>

<p>Robert Haas sent in two revisions of a patch to improve the documentation for parallel append.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to fix a bug that manifested as expression errors with "FOR UPDATE" and postgres_fdw with partition wise join enabled.</p>

<p>&#65533;lvaro Herrera sent in another revision of a patch to fix gaps in modules with handling of partitioned indexes.</p>

<p>Craig Ringer sent in another revision of a patch to PANIC when we detect a possible fsync I/O error instead of retrying fsync.</p>

<p>Ashutosh Bapat sent in a patch to add a test case accessing system columns from a trigger function.</p>

<p>Pavel Raiskup sent in a patch to implement shared library symbol versioning and clean up the libpq build to support same.</p>

<p>Tom Lane sent in a patch to check the /etc/localtime symlink for zone name, a test much shorter than the one initdb currently runs.</p>

<p>David Rowley sent in three revisions of a patch to remove a needless additional partition check in INSERT.</p>

<p>Etsuro Fujita sent in two revisions of a patch to modify make_modifytable so that in case of an inherited UPDATE/DELETE, it passes to PlanDirectModify the per-child modified subroot, not the parent root, for the FDW to get the foreign-join RelOptInfo from the given root in PlanDirectModify.</p>

<p>Heikki Linnakangas sent in a patch to add a hook for extensions which can get notified when query cancel or DIE signal is received, then use same for PL/PythonU.</p>

<p>Pavan Deolasee sent in a WIP patch to always clear the minRecoveryPoint after promotion to ensure that crash recovery always run to the end if a just-promoted standby crashes before completing its first regular checkpoint.</p>

<p>Amit Langote sent in a patch to error out even before calling DefineIndex on foreign partitions.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to enable asynchronous execution and use that machinery in the PostgreSQL FDW.</p>

<p>Peter Eisentraut and Tom Lane traded patches to do lazy detoasting.</p>