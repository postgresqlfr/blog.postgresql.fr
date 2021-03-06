---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 mai 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/06/01/Nouvelles-hebdomadaires-de-PostgreSQL-27-mai-2012"
---


<p>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

<li>La conf&eacute;rence <em>PostgreSQL China 2012</em> aura lieu du 14 au 17 juin &agrave; P&eacute;kin&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Pgconfchina2012">http://wiki.postgresql.org/wiki/Pgconfchina2012</a></li>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Appel &agrave; conf&eacute;renciers et plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe</em> 2012 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; sponsors est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-05/msg00016.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Document that we deviate from ISO 8601 by not using 'T' on output. Per discussion, we should explain that we follow RFC 3339 and not really the letter of the ISO 8601 spec for timestamp output format. Mostly Brendan Jurd's wording, though I tweaked it to clarify that we do take 'T' on input. Minor additional copy-editing and markup-tweaking, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8be950f5c0a2d8591cfc9955ad4ee4baf50d6131">http://git.postgresql.org/pg/commitdiff/8be950f5c0a2d8591cfc9955ad4ee4baf50d6131</a></li>

<li>Adjust documentation of ALTER TABLE CLUSTER ON for more consistency. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e79da56b85fa69055e872bdb79fb20f800175bc6">http://git.postgresql.org/pg/commitdiff/e79da56b85fa69055e872bdb79fb20f800175bc6</a></li>

<li>Update woefully-obsolete comment. The accurate info about what's in a lock file has been in miscadmin.h for some time, so let's just make this comment point there instead of maintaining a duplicative copy. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/efae4653c98fd201a8a723bceabf182a1005ac0f">http://git.postgresql.org/pg/commitdiff/efae4653c98fd201a8a723bceabf182a1005ac0f</a></li>

<li>Move postmaster's RemovePgTempFiles call to a less randomly chosen place. There is no reason to do this as early as possible in postmaster startup, and good reason not to do it until we have completely created the postmaster's lock file, namely that it might contribute to pg_ctl thinking that postmaster startup has timed out. (This would require a rather unusual amount of time to be spent scanning temp file directories, but we have at least one field report of it happening reproducibly.) Back-patch to 9.1. Before that, pg_ctl didn't wait for additional info to be added to the lock file, so it wasn't a problem. Note that this is not a complete fix to the slow-start issue in 9.1, because we still had identify_system_timezone being run during postmaster start in 9.1. But that's at least a reasonably well-defined delay, with an easy workaround if needed, whereas the temp-files scan is not so predictable and cannot be avoided. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b94ce6e807ce5685bda1dcd36027091ceec6b5a0">http://git.postgresql.org/pg/commitdiff/b94ce6e807ce5685bda1dcd36027091ceec6b5a0</a></li>

<li>Ensure that seqscans check for interrupts at least once per page. If a seqscan encounters many consecutive pages containing only dead tuples, it can remain in the loop in heapgettup for a long time, and there was no CHECK_FOR_INTERRUPTS anywhere in that loop. This meant there were real-world situations where a query would be effectively uncancelable for long stretches. Add a check placed to occur once per page, which should be enough to provide reasonable response time without adding any measurable overhead. Report and patch by Merlin Moncure (though I tweaked it a bit). Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed962fd712bbc0836437c8f789d9152aca5711b5">http://git.postgresql.org/pg/commitdiff/ed962fd712bbc0836437c8f789d9152aca5711b5</a></li>

<li>Fix array overrun in regex code. zaptreesubs() was coded to unconditionally reset a capture subre's corresponding pmatch[] entry. However, in regexes without backrefs, that array is caller-supplied and might not have as many entries as the regex has capturing parens. So check the array length and do nothing if there is no corresponding entry, much as subset() does. Failure to check this resulted in a stack clobber in the case reported by Marko Kreen. This bug appears to have been latent in the regex library from the beginning. It was not exposed because find() called dissect() not cdissect(), and the dissect() code path didn't ever call zaptreesubs() (formerly zapmem()). When I unified dissect() and cdissect() in commit 4dd78bf37aa29d04b3f358b08c4a2fa43cf828e7, the problem was exposed. Now that I've seen this, I'm rather suspicious that we might need to back-patch it; but will refrain for now, for lack of evidence that the case can be hit in the previous coding. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a4c46e0baf2d51117cd4468b28705d01ffcbff9">http://git.postgresql.org/pg/commitdiff/2a4c46e0baf2d51117cd4468b28705d01ffcbff9</a></li>

<li>Use binary search instead of brute-force scan in findNamespace(). The previous coding presented a significant bottleneck when dumping databases containing many thousands of schemas, since the total time spent searching would increase roughly as O(N2) in the number of objects. Noted by Jeff Janes, though I rewrote his proposed patch to use the existing findObjectByOid infrastructure. Since this is a longstanding performance bug, backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73cc7d3b240e1d46b1996382e5735a820f8bc3f7">http://git.postgresql.org/pg/commitdiff/73cc7d3b240e1d46b1996382e5735a820f8bc3f7</a></li>

<li>Fix string truncation to be multibyte-aware in text_name and bpchar_name. Previously, casts to name could generate invalidly-encoded results. Also, make these functions match namein() more exactly, by consistently using palloc0() instead of ad-hoc zeroing code. Back-patch to all supported branches. Karl Schnaitter and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d3b97d1488ba868f6bab12eeaf0b9ae75fad2566">http://git.postgresql.org/pg/commitdiff/d3b97d1488ba868f6bab12eeaf0b9ae75fad2566</a></li>

<li>Prevent synchronized scanning when systable_beginscan chooses a heapscan. The only interesting-for-performance case wherein we force heapscan here is when we're rebuilding the relcache init file, and the only such case that is likely to be examining a catalog big enough to be syncscanned is RelationBuildTupleDesc. But the early-exit optimization in that code gets broken if we start the scan at a random place within the catalog, so that allowing syncscan is actually a big deoptimization if pg_attribute is large (at least for the normal case where the rows for core system catalogs have never been changed since initdb). Hence, prevent syncscan here. Per my testing pursuant to complaints from Jeff Frost and Greg Sabino Mullane, though neither of them seem to have actually hit this specific problem. Back-patch to 8.3, where syncscan was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/532fe28dade9291b7a7f7de3920a4d997bbd86a1">http://git.postgresql.org/pg/commitdiff/532fe28dade9291b7a7f7de3920a4d997bbd86a1</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_ctl: Sort signal list in --help output. The list was neither logical nor numerical nor alphabetical. Let's go with alphabetical. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdf8bcb8d93b4365f124e994c31687b39b619253">http://git.postgresql.org/pg/commitdiff/cdf8bcb8d93b4365f124e994c31687b39b619253</a></li>

<li>libpq: Add missing file to GETTEXT_FILES list. For the record, fe-print.c is also missing, but it's sort of deprecated, and the string internationalization there has some issues, and it doesn't seem worth fixing that. So let's leave that out. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c39a09089130fb2eeccd6eacdc3d12aa69f84de">http://git.postgresql.org/pg/commitdiff/4c39a09089130fb2eeccd6eacdc3d12aa69f84de</a></li>

<li>Add small example about pg_archivecleanup -x option. Every time I read this I had doubts about whether the argument to the -x option should include the dot (yes). A small example should clarify this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92a953fbf8c90c3b316fbc275767efb6994f1589">http://git.postgresql.org/pg/commitdiff/92a953fbf8c90c3b316fbc275767efb6994f1589</a></li>

<li>pg_standby: Remove tabs from string literals. And align a bit better with the rest of the debug output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72155b29a864d3621795f6cd1528d8e54cc3c671">http://git.postgresql.org/pg/commitdiff/72155b29a864d3621795f6cd1528d8e54cc3c671</a></li>

<li>Update SQL key word list to SQL:2011. For space reasons, drop SQL:1999 and SQL:2003. Only keep the latest two and SQL-92 for historical comparison. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ace397e9d24eddc56e7dffa921f506117b602d78">http://git.postgresql.org/pg/commitdiff/ace397e9d24eddc56e7dffa921f506117b602d78</a></li>

<li>PL/Perl: Avoid compiler warning from clang. Use SvREFCNT_inc_simple_void() instead of SvREFCNT_inc() to avoid warning about unused return value. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8b92b6090f14a3a84d2b904eff1794e21047fae">http://git.postgresql.org/pg/commitdiff/a8b92b6090f14a3a84d2b904eff1794e21047fae</a></li>

<li>Suppress -Wunused-result warning about write(). This is related to aa90e148ca70a235897b1227f1a7cd1c66bc5368, but this code is only used under -DLINUX_OOM_ADJ, so it was apparently overlooked then. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27314d32a883e3c4667d8249c3d4760fed917a12">http://git.postgresql.org/pg/commitdiff/27314d32a883e3c4667d8249c3d4760fed917a12</a></li>

<li>Update SQL features list. Set E081 Basic Privileges to supported, since by the letter of it, we support it, even though not all possible forms of USAGE privileges are implemented. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/388d2516792bb22d461d0b2af38730bfdcbf9027">http://git.postgresql.org/pg/commitdiff/388d2516792bb22d461d0b2af38730bfdcbf9027</a></li>

<li>psql: Remove notice about readline from --version output. This was from a time when readline support wasn't standard. And it doesn't help analyzing current line editing library problems. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e497c731b481aac15fed5cd006fcd64f2f00de0">http://git.postgresql.org/pg/commitdiff/8e497c731b481aac15fed5cd006fcd64f2f00de0</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Repair out-of-date information in src/backend/storage/buffer/README. In commit d526575f893c1a4e05ebd307e80203536b213a6d, we changed things so that buffer usage counts are incremented when the buffer is pinned, rather than when it is unpinned, but the README file didn't get the memo. Report by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/219c024c64ced7ce497fe455b1e3dd7b70012775">http://git.postgresql.org/pg/commitdiff/219c024c64ced7ce497fe455b1e3dd7b70012775</a></li>

<li>Prevent pg_basebackup when integer_datetimes flag doesn't match. Magnus Hagander, reviewed by Fujii Masao, with slight wording changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/304aa339b20df9f9ba6f4d93175e05098f6fd1c1">http://git.postgresql.org/pg/commitdiff/304aa339b20df9f9ba6f4d93175e05098f6fd1c1</a></li>

<li>Release note improvements. Document some more things as incompatibilities, and improve wording of another item. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b536458e73a8d9294817228f06961913f6faa551">http://git.postgresql.org/pg/commitdiff/b536458e73a8d9294817228f06961913f6faa551</a></li>

<li>Fix error message for COMMENT/SECURITY LABEL ON COLUMN xxx IS 'yyy' When the column name is an unqualified name, rather than table.column, the error message complains about too many dotted names, which is wrong. Report by Peter Eisentraut based on examination of the sepgsql regression test output, but the problem also affects COMMENT. New wording as suggested by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fbe5a317de6c91826ae2c91f73f780bb0d6489e">http://git.postgresql.org/pg/commitdiff/8fbe5a317de6c91826ae2c91f73f780bb0d6489e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove reviewers from 9.2 release notes; improve attributions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a46e25189b428e1ff8af5ba19c6f32287277575">http://git.postgresql.org/pg/commitdiff/8a46e25189b428e1ff8af5ba19c6f32287277575</a></li>

<li>9.2 release notes: GiST index improvements are for all geometric index types, per Alexander Korotkov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/007522e6b4c32d7ae67a2ff7f568eb2f0bd257f6">http://git.postgresql.org/pg/commitdiff/007522e6b4c32d7ae67a2ff7f568eb2f0bd257f6</a></li>

<li>Fix reindexdb manual page to say --maintenance-db controls what is reindexed, not vacuumed (typo). Per report from Thomas REISS 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6b7170c33b4795cc519137528523bd3c4933edb">http://git.postgresql.org/pg/commitdiff/e6b7170c33b4795cc519137528523bd3c4933edb</a></li>

<li>Fix markup for HISTORY generation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0013a665b75a62f6110bff99273b1015b4aa60fe">http://git.postgresql.org/pg/commitdiff/0013a665b75a62f6110bff99273b1015b4aa60fe</a></li>

<li>Add 9.2 release note authorship mentions for Heikki and Alexander Korotkov, per Alexander Korotkov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9c895ee6f336084048f4c8cc76b81afb4535e58">http://git.postgresql.org/pg/commitdiff/b9c895ee6f336084048f4c8cc76b81afb4535e58</a></li>

<li>Improve wording of 9.2 clog release note item. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13477c0197cb4826b03c559a23f4bc838e61d4fb">http://git.postgresql.org/pg/commitdiff/13477c0197cb4826b03c559a23f4bc838e61d4fb</a></li>

<li>Mention Peter Geoghegan as primary author of pg_stat_statements changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db2cd074824d1cd3c7b7397b7c7230100d7a78a3">http://git.postgresql.org/pg/commitdiff/db2cd074824d1cd3c7b7397b7c7230100d7a78a3</a></li>

<li>Adjust pg_upgrade to output a separate log file for pg_ctl output on Windows, to avoid opening a file by multiple processes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/476291bef0985e242685fcd37866fec7ab1b97c7">http://git.postgresql.org/pg/commitdiff/476291bef0985e242685fcd37866fec7ab1b97c7</a></li>

<li>Remove PL/Perl null array 9.2 release note item, per Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eeef7bd2da8f99a5f5abd9d495663001c2fccd12">http://git.postgresql.org/pg/commitdiff/eeef7bd2da8f99a5f5abd9d495663001c2fccd12</a></li>

<li>Change pg_stat_statements order of release note items, per Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7672366a89dcccd0ba14eecdbc41b641480eb1e0">http://git.postgresql.org/pg/commitdiff/7672366a89dcccd0ba14eecdbc41b641480eb1e0</a></li>

<li>Clarify 9.2 release notes items about pg_stat_statements, to better document fix of double counting and read/write count addition, per Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32cebaaed5127c1dd2ad616051065bf4c7652afa">http://git.postgresql.org/pg/commitdiff/32cebaaed5127c1dd2ad616051065bf4c7652afa</a></li>

<li>On Windows, have pg_upgrade use different two files to log pg_ctl start/stop output, to fix file share error reported by Edmund Horner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d226e236c6ccdd27f1fd42aaab070762d1b70275">http://git.postgresql.org/pg/commitdiff/d226e236c6ccdd27f1fd42aaab070762d1b70275</a></li>

<li>Have pg_upgrade only use one extra log file for Win32, not two. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45ca31d6a7eaf91dc65fd5cf2b140320feb3fa3f">http://git.postgresql.org/pg/commitdiff/45ca31d6a7eaf91dc65fd5cf2b140320feb3fa3f</a></li>

<li>Add pg_update C comment about problems with plpython_call_handler(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4696fa68f88f371e9da77cc0319fa0b947fd911">http://git.postgresql.org/pg/commitdiff/d4696fa68f88f371e9da77cc0319fa0b947fd911</a></li>

<li>Add C comment explaining why we can't exclude checking functions in the pg_catalog schema, even though they are not explicitly dumped (they are implicitly dumped, e.g. create language plperl). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20a3830b81d07aca1b8c3e954b4bc49d0847c51d">http://git.postgresql.org/pg/commitdiff/20a3830b81d07aca1b8c3e954b4bc49d0847c51d</a></li>

<li>Improve pg_upgrade C comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4498a3407acfff83ab791d0d9764c70566ab840f">http://git.postgresql.org/pg/commitdiff/4498a3407acfff83ab791d0d9764c70566ab840f</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add missing PQfinish() calls. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77f93cb32d8711926b07030c1c73a57a7bc66911">http://git.postgresql.org/pg/commitdiff/77f93cb32d8711926b07030c1c73a57a7bc66911</a></li>

<li>Fix base backup streaming xlog from standby. When backing up from a standby server, the backup process will not automatically switch xlog segment. So we must accept a partially transferred xlog file in this case, but rename it into position anyway. In passing, merge the two callbacks for segment end and stop stream into a single callback, since their implementations were close to identical, and rename this callback to reflect that it stops streaming rather than continues it. Patch by Magnus Hagander, review by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31d965819bdaa971ae007a67611e78ec1d185f14">http://git.postgresql.org/pg/commitdiff/31d965819bdaa971ae007a67611e78ec1d185f14</a></li>

<li>Fix handling of pg_stat_statements.stat temporary file. Write the file to a temporary name and then rename() it into the permanent name, to ensure it can't end up half-written and corrupt in case of a crash during shutdown. Unlink the file after it has been read so it's removed from the data directory and not included in base backups going to replication slaves. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b97db61dd0bffb0843eb2ea9be054d925e88ef1">http://git.postgresql.org/pg/commitdiff/2b97db61dd0bffb0843eb2ea9be054d925e88ef1</a></li>

<li>Make pg_recievexlog by default loop on connection failures. Avoids the need for an external script in the most common scenario. Behavior can be overridden using the -n/--noloop commandline parameter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16282ae688de2b320cf176e9be8a89e4dfc60698">http://git.postgresql.org/pg/commitdiff/16282ae688de2b320cf176e9be8a89e4dfc60698</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alexander Korotkov sent in another revision of the patch to add conversion from pg_wchar to multibyte.</li>

<li>Gurjeet Singh sent in a patch to add a new syntax allowing joining multiple CREATE INDEX statements with commas, that signifying that the indexes are to be created all in one pass.</li>

<li>Heikki Linnakangas sent in a patch to speed up the new buffering GiST build code.</li>

<li>Andrew Dunstan sent in a patch to fix a problem with pg_dump and pg_restore --data-only.</li>

<li>Marti Raudsepp sent in a patch to mark as "skipped" sorts of 0 or 1 tuple in EXPLAIN.</li>

<li>Fujii Masao sent in a patch to add a pg_size_pretty(int) function.</li>

<li>Pavel Stehule sent in a patch to add a "shell" output format for psql which optimizes the output for use by the shell.</li>

</ul>