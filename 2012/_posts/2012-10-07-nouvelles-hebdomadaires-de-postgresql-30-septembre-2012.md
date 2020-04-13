---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 septembre 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-10-07-nouvelles-hebdomadaires-de-postgresql-30-septembre-2012 "
---


<p>Les versions correctives 9.2.1, 9.1.6, 9.0.10, 8.4.14 et 8.3.21 sont maintenant disponibles. Mettez &agrave; jour d&egrave;s que possible&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/about/news/1416/">http://www.postgresql.org/about/news/1416/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>openBarter 0.4.2, une extension PostgreSQL impl&eacute;mentant les pr&eacute;mices d'un mod&egrave;le pour march&eacute; de troc&nbsp;: 

<a target="_blank" href="http://olivierch.github.com/openBarter/">http://olivierch.github.com/openBarter/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PGDay programm&eacute; le 3 octobre 2012 &agrave; l'UNICAMP, Campinas, &eacute;tat de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16948">http://www.postgresql.org.br/node/16948</a></li>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Il y aura un PGDay &eacute;galement le 9 novembre 2012 &agrave; l'USP de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16949">http://www.postgresql.org.br/node/16949</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

<li>Le PGDay &eacute;quatorien de cette ann&eacute;e se tiendra &agrave; Quito le 17 novembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 10 octobre. Envoyez vos propositions &agrave; Jaime Casanova&nbsp;: jaime &lt;AT&gt; 2ndquadrant &lt;DOT&gt; com&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012">https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012</a></li>

<li>La sixi&egrave;me &eacute;dition du PGDay italien aura lieu &agrave; Prato, Toscane, le 23 novembre 2012. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;, conf&eacute;rences et pr&eacute;sentations en anglais sont accept&eacute;es. Informations anglaises sur le processus de candidature disponibles ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="http://2012.pgday.it/call-for-papers/international-call-for-papers/">http://2012.pgday.it/call-for-papers/international-call-for-papers/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-09/msg00000.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Prevent emitting "ALTER VIEW foo SET ()". Small oversight in commit 0f524ea0cf388a149f362e48a33c01662eeddc04 ... per report from Grazvydas Valeika. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce9eee39d18822902cd8cb05a4e16fc0683b49d6">http://git.postgresql.org/pg/commitdiff/ce9eee39d18822902cd8cb05a4e16fc0683b49d6</a></li>

<li>Fix examples of how to use "su" while starting the server. The syntax "su -c 'command' username" is not accepted by all versions of su, for example not OpenBSD's. More portable is "su username -c 'command'". So change runtime.sgml to recommend that syntax. Also, add a -D switch to the OpenBSD example script, for consistency with other examples. Per Denis Lapshin and G&aacute;bor Hidv&eacute;gi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d8cbeb0c3f48c6c204b742b6891a9e5e5031d15">http://git.postgresql.org/pg/commitdiff/7d8cbeb0c3f48c6c204b742b6891a9e5e5031d15</a></li>

<li>Add new EVENT keyword to unreserved_keyword production. Once again, somebody who ought to know better forgot this. We really need some automated cross-check on the keyword-list productions, I think. Per report from Brian Weaver. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc68ac86b1c8b19ec6a2064c8a24e1c124f77f7f">http://git.postgresql.org/pg/commitdiff/fc68ac86b1c8b19ec6a2064c8a24e1c124f77f7f</a></li>

<li>Make plpgsql's unreserved keywords more unreserved. There were assorted places where unreserved keywords were not treated the same as T_WORD (that is, a random unrecognized identifier). Fix them. It might not always be possible to allow this, but it is in all these places, so I don't see any downside. Per gripe from Jim Wilson. Arguably this is a bug fix, but given the lack of other complaints and the ease of working around it (just quote the word), I won't risk back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bac95fd4740e3ac13baf5c2ad38b9c9dc26f9c9d">http://git.postgresql.org/pg/commitdiff/bac95fd4740e3ac13baf5c2ad38b9c9dc26f9c9d</a></li>

<li>Run check_keywords.pl anytime gram.c is rebuilt. This script is a bit slow, but still it only takes a fraction of the time the bison run does, so the overhead doesn't seem intolerable. And we definitely need some mechanical aid here, because people keep missing the need to add new keywords to the appropriate keyword-list production. While at it, I moved check_keywords.pl from src/tools into src/backend/parser where it's actually used, and did some very minor cleanup on the script. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55c1687a97c3c2b6cbf7c1b45830b49f03641908">http://git.postgresql.org/pg/commitdiff/55c1687a97c3c2b6cbf7c1b45830b49f03641908</a></li>

<li>Fix btmarkpos/btrestrpos to handle array keys. This fixes another error in commit 9e8da0f75731aaa7605cf4656c21ea09e84d2eb1. I neglected to make the mark/restore functionality save and restore the current set of array key values, which led to strange behavior if an IndexScan with ScalarArrayOpExpr quals was used as the inner side of a mergejoin. Per bug #7570 from Melese Tesfaye. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70bc5833195daf64a200ac7b4a8c9aff65cf966f">http://git.postgresql.org/pg/commitdiff/70bc5833195daf64a200ac7b4a8c9aff65cf966f</a></li>

<li>Fix tar files emitted by pg_dump and pg_basebackup to be POSIX conformant. Both programs got the "magic" string wrong, causing standard-conforming tar implementations to believe the output was just legacy tar format without any POSIX extensions. This doesn't actually matter that much, especially since pg_dump failed to fill the POSIX fields anyway, but still there is little point in emitting tar format if we can't be compliant with the standard. In addition, pg_dump failed to write the EOF marker correctly (there should be 2 blocks of zeroes not just one), pg_basebackup put the numeric group ID in the wrong place, and both programs had a pretty brain-dead idea of how to compute the checksum. Fix all that and improve the comments a bit. pg_restore is modified to accept either the correct POSIX-compliant "magic" string or the previous value. This part of the change will need to be back-patched to avoid an unnecessary compatibility break when a previous version tries to read tar-format output from 9.3 pg_dump. Brian Weaver and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05b555d12bc2ad0d581f48a12b45174db41dc10d">http://git.postgresql.org/pg/commitdiff/05b555d12bc2ad0d581f48a12b45174db41dc10d</a></li>

<li>Fix bugs in "restore.sql" script emitted in pg_dump tar output. The tar output module did some very ugly and ultimately incorrect hacking on COPY commands to try to get them to work in the context of restoring a deconstructed tar archive. In particular, it would fail altogether for table names containing any upper-case characters, since it smashed the command string to lower-case before modifying it (and, just to add insult to injury, did that in a way that would fail in multibyte encodings). I don't see any particular value in being flexible about the case of the command keywords, since the string will just have been created by dumpTableData, so let's get rid of the whole case-folding thing. Also, it doesn't seem to meet the POLA for the script to restore data only in COPY mode, so add \i commands to make it have comparable behavior in --inserts mode. Noted while looking at the tar-output code in connection with Brian Weaver's patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff75219e9f58f0cee1578e6d4175fe36b6bab3e3">http://git.postgresql.org/pg/commitdiff/ff75219e9f58f0cee1578e6d4175fe36b6bab3e3</a></li>

<li>Add infrastructure for compile-time assertions about variable types. Currently, the macros only work with fairly recent gcc versions, but there is room to expand them to other compilers that have comparable features. Heavily revised and autoconfiscated version of a patch by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea473fb2dee7dfe61f8fbdfac9d9da87d84e564e">http://git.postgresql.org/pg/commitdiff/ea473fb2dee7dfe61f8fbdfac9d9da87d84e564e</a></li>

<li>Provide some static-assertion functionality on all compilers. On reflection (especially after noticing how many buildfarm critters have __builtin_types_compatible_p but not _Static_assert), it seems like we ought to try a bit harder to make these macros do something everywhere. The initial cut at it would have been no help to code that is compiled only on platforms without _Static_assert, for instance; and in any case not all our contributors do their initial coding on the latest gcc version. Some googling about static assertions turns up quite a bit of prior art for making it work in compilers that lack _Static_assert. The method that seems closest to our needs involves defining a struct with a bit-field that has negative width if the assertion condition fails. There seems no reliable way to get the error message string to be output, but throwing a compile error with a confusing message is better than missing the problem altogether. In the same spirit, if we don't have __builtin_types_compatible_p we can at least insist that the variable have the same width as the type. This won't catch errors such as "wrong pointer type", but it's far better than nothing. In addition to changing the macro definitions, adjust a compile-time-constant Assert in contrib/hstore to use StaticAssertStmt, so we can get some buildfarm coverage on whether that macro behaves sanely or not. There's surely more places that could be converted, but this is the first one I came across. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d0aa5d29175c539db1981be27dbbf059be6f3b1">http://git.postgresql.org/pg/commitdiff/0d0aa5d29175c539db1981be27dbbf059be6f3b1</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for include_dir in config file. This allows easily splitting configuration into many files, deployed in a directory. Magnus Hagander, Greg Smith, Selena Deckelmann, reviewed by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a0c81a12c7e6c5ac1557b0f1f4a581f23fd4ca7">http://git.postgresql.org/pg/commitdiff/2a0c81a12c7e6c5ac1557b0f1f4a581f23fd4ca7</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade test: Disable fsync in initdb and postgres calls. This mirrors the behavior of pg_regress and makes the test run much faster. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10bfe81deeb8dc2af2204dbeebf3dda62f1ae263">http://git.postgresql.org/pg/commitdiff/10bfe81deeb8dc2af2204dbeebf3dda62f1ae263</a></li>

<li>Produce textual error messages for LDAP issues instead of numeric codes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edc9109c42299ea8d7d897647967cf65d638617c">http://git.postgresql.org/pg/commitdiff/edc9109c42299ea8d7d897647967cf65d638617c</a></li>

<li>PL/Python: Convert oid to long/int. oid is a numeric type, so transform it to the appropriate Python numeric type like the other ones. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db0af74af28663e060e8c5d6f8dd0927bb572f25">http://git.postgresql.org/pg/commitdiff/db0af74af28663e060e8c5d6f8dd0927bb572f25</a></li>

<li>PL/Python: Remove workaround for returning booleans in Python &lt;2.3. Since Python 2.2 is no longer supported, we can now use Py_RETURN_TRUE and Py_RETURN_FALSE instead of the old workaround. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be0dfbad3671ed2503a2a661e70b48c5b364e069">http://git.postgresql.org/pg/commitdiff/be0dfbad3671ed2503a2a661e70b48c5b364e069</a></li>

<li>Add _FORTIFY_SOURCE to default compiler options for linux template. Many distributors use this, so we might as well see the warnings as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/997fa75d6b1522658d4464396cb91264f642634a">http://git.postgresql.org/pg/commitdiff/997fa75d6b1522658d4464396cb91264f642634a</a></li>

<li>Disable _FORTIFY_SOURCE with ICC There are apparently some incompatibilities, per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97ec9621572054be96b0447395f5fa2438a4d6cb">http://git.postgresql.org/pg/commitdiff/97ec9621572054be96b0447395f5fa2438a4d6cb</a></li>

<li>psql: Mark table headers in \drds output for translation 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26fd82ddf1273d5df20b892fc02c8ca756d2e2bc">http://git.postgresql.org/pg/commitdiff/26fd82ddf1273d5df20b892fc02c8ca756d2e2bc</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Have pg_terminate/cancel_backend not ERROR on non-existent processes. This worked fine for superusers, but not for ordinary users trying to cancel their own processes. Tweak the order the checks are done in so that we correctly return SIGNAL_BACKEND_ERROR (which current callers know to ignore without erroring out) so that an ordinary user can loop through a resultset without fearing that a process might exit in the middle of said looping -- causing the remaining processes to go unsignalled. Incidentally, the last in-core caller of IsBackendPid() is now gone. However, the function is exported and must remain in place, because there are plenty of callers in external modules. Author: Josh Kupershmidt Reviewed by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae90ffada4cb27c9194797c43d864a86ce88d72c">http://git.postgresql.org/pg/commitdiff/ae90ffada4cb27c9194797c43d864a86ce88d72c</a></li>

<li>Add alter_generic regression test. This makes refactoring of parts of the ALTER command safe(r) because we ensure no change in functionality. Author: KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff7e5b4841eeedfb9cefec6226f4dca5b8840276">http://git.postgresql.org/pg/commitdiff/ff7e5b4841eeedfb9cefec6226f4dca5b8840276</a></li>

<li>Add alternative expected output for alter_generic. The original only expected file failed to consider machines without non-default collation support. Per buildfarm. Also, move the test to another parallel group; the one it was originally put in is already full according to comments in the schedule file. Per note from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/811ca1300bf8eb50ff1a84082619ba770126cdc9">http://git.postgresql.org/pg/commitdiff/811ca1300bf8eb50ff1a84082619ba770126cdc9</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove checks for now long outdated compilers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e9876dc32495976af525fa29922648a02c8ef9b">http://git.postgresql.org/pg/commitdiff/6e9876dc32495976af525fa29922648a02c8ef9b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in another revision of the patch to add a write interface for FDWs and implement same in file_fdw.</li>

<li>Zoltan Boszormenyi sent in another revision of the lock_timeout/SIGALARM framework patch.</li>

<li>Bruce Momjian sent in two revisions of a patch to fix an encoding-related bug in pg_upgrade.</li>

<li>Andres Freund sent in two revisions of a patch to fix a concurrency issue in DROP INDEX CONCURRENTLY.</li>

<li>Karl O. Pinc sent in two more revisions of the patch to document which parts of the catalog have oid as their only uniqueness, and which have other primary keys.</li>

<li>Amit Kapila and Heikki Linnakangas traded patches to improve update performance by reducing the amount of WAL written for same.</li>

<li>Nozomi Anzai sent in another revision of the patch to enable 64-bit large objects.</li>

<li>Satoshi Nagayasu sent in another revision of the patch to add new statistics for dirty write buffers.</li>

<li>Heikki Linnakangas sent in a set of patches to allow switching timelines during replication.</li>

<li>Bruce Momjian sent in a patch to fix an infelicity in the --new-port option of pg_upgrade.</li>

<li>Alvaro Herrera sent in two more revisions of the patch to enable generic background workers.</li>

<li>Dimitri Fontaine sent in two revisions of a patch to fix some pg_dump infelicities with respect to EXTENSIONs.</li>

<li>Karl O. Pinc sent in patch (psql_remove_include.patch) replaces the #include of psqlscan.c at the bottom of mainloop.c with the %top{} flex feature.</li>

<li>Pavel Stehule sent in another revision of the patch to allow COPY to get the number of rows processed.</li>

<li>Heikki Linnakangas sent in another revision of the patch to help scale XLogInsert.</li>

<li>Karl O. Pinc sent in two patches: pg_temp-toindex.patch, which puts pg_temp into the index of the docs. (Line lengths are ugly so the change can be easily reviewed.), and pg_temp-reformat.patch, which reformats the doc source after the above patch. (Fixes line length.)</li>

<li>Karl O. Pinc sent in two revisions of a patch to index search_path where it's used to secure functions.</li>

<li>Karl O. Pinc sent in a patch which normalizes "search_path" as the thing indexed and uses a secondary index term to distinguish the configuration parameter from the run-time setting.</li>

<li>Karl O. Pinc sent in two revisions of a documentation patch to describe the additive nature of the permission system.</li>

<li>Andres Freund sent in another revision of the patch to add and then use embedded lists.</li>

<li>Jeff Janes sent in a patch to document that the size of shared_buffers was increased from 32MB to 128MB.</li>

</ul>