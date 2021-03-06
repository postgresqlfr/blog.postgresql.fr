---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 septembre 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/09/30/Nouvelles-hebdomadaires-de-PostgreSQL-23-septembre-2012"
---


<p>Les corrections de bugs avec les versions 9.2.1, 9.1.6, 9.0.10, 8.4.14 et 8.3.21 seront bient&ocirc;t disponibles. Pr&eacute;parez-vous &agrave; mettre &agrave; jour.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Another PostgreSQL Diff Tool (apgdiff) 2.4, un outil pour "differ" les bases de donn&eacute;es&nbsp;: 

<a target="_blank" href="http://apgdiff.startnet.biz/">http://apgdiff.startnet.biz/</a></li>

<li>Le module Lua pour PostgreSQL a &eacute;t&eacute; mis &agrave; jour&nbsp;: 

<a target="_blank" href="https://github.com/mbalmer/luapgsql">https://github.com/mbalmer/luapgsql</a></li>

<li>ODB 2.1.0, un ORM pour le C++, compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.codesynthesis.com/~boris/blog/2012/09/18/odb-2-1-0-released/">http://www.codesynthesis.com/~boris/blog/2012/09/18/odb-2-1-0-released/</a></li>

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

<li>Le PGDay &eacute;quatorien de cette ann&eacute;e se tiendra &agrave; Quito le 17 novembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 10 octobre. Envoyez vos propositions &agrave; Jaime Casanova&nbsp;: jaime &lt;AT&gt; 2ndquadrant &lt;DOT&gt; com.</li>

<li style="list-style: none"><a target="_blank" href="https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012">https://wiki.postgresql.org/wiki/PGDay_Ecuador_2012</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-09/msg00014.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Provide adequate documentation of the "table_name *" notation. Somewhere along the line, somebody decided to remove all trace of this notation from the documentation text. It was still in the command syntax synopses, or at least some of them, but with no indication what it meant. This will not do, as evidenced by the confusion apparent in bug #7543; even if the notation is now unnecessary, people will find it in legacy SQL code and need to know what it does. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c64342c861c77504df6c195c9db3e166d0c7491">http://git.postgresql.org/pg/commitdiff/3c64342c861c77504df6c195c9db3e166d0c7491</a></li>

<li>Fix array_typanalyze to work for domains over arrays. Not sure how we missed this case, but we did. Per bug #7551 from Diego de Lima. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f828fae6221d93cbef370f57ab3f234b590ca98">http://git.postgresql.org/pg/commitdiff/3f828fae6221d93cbef370f57ab3f234b590ca98</a></li>

<li>Fix planning of btree index scans using ScalarArrayOpExpr quals. In commit 9e8da0f75731aaa7605cf4656c21ea09e84d2eb1, I improved btree to handle ScalarArrayOpExpr quals natively, so that constructs like "indexedcol IN (list)" could be supported by index-only scans. Using such a qual results in multiple scans of the index, under-the-hood. I went to some lengths to ensure that this still produces rows in index order ... but I failed to recognize that if a higher-order index column is lacking an equality constraint, rescans can produce out-of-order data from that column. Tweak the planner to not expect sorted output in that case. Per trouble report from Robert McGehee. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/807a40c551dd30c8dd5a0b3bd82f5bbb1e7fd285">http://git.postgresql.org/pg/commitdiff/807a40c551dd30c8dd5a0b3bd82f5bbb1e7fd285</a></li>

<li>Update time zone data files to tzdata release 2012f. DST law changes in Fiji. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1f722daccd4789522d7b16211089af6d92eecf0">http://git.postgresql.org/pg/commitdiff/f1f722daccd4789522d7b16211089af6d92eecf0</a></li>

<li>Put back AcceptInvalidationMessages calls in heap_openrv(_extended). These calls were removed in commit 4240e429d0c2d889d0cda23c618f94e12c13ade7 as part of a general refactoring and improvement of DDL locking. However, there's a problem not solved by the rewrite, which is that GRANT/REVOKE update pg_class.relacl without taking any particular lock on the target table as such. If another backend fails to do AcceptInvalidationMessages, it won't notice a recently-committed change in ACLs. Bug #7557 from Piotr Czachur demonstrates that there's at least one code path in 9.2.0 in which a command fails to do any AcceptInvalidationMessages calls at all, if the current transaction already holds all the locks it will need. Since we're hard up against the release deadline for 9.2.1, fix this by putting back the AcceptInvalidationMessages calls in heap_openrv and heap_openrv_extended, thereby restoring the historical behavior in this area. We ought to look for a more elegant and perhaps more bulletproof solution, but there's no time for that right now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96cc18eef6489cccefe351baa193f32f12018551">http://git.postgresql.org/pg/commitdiff/96cc18eef6489cccefe351baa193f32f12018551</a></li>

<li>Update release notes for 9.2.1, 9.1.6, 9.0.10, 8.4.14, 8.3.21. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4394fe3dcb105219fc10ff80e0b433659a540eff">http://git.postgresql.org/pg/commitdiff/4394fe3dcb105219fc10ff80e0b433659a540eff</a></li>

<li>Improve ruleutils.c's heuristics for dealing with rangetable aliases. The previous scheme had bugs in some corner cases involving tables that had been renamed since a view was made. This could result in dumped views that failed to reload or reloaded incorrectly, as seen in bug #7553 from Lloyd Albin, as well as in some pgsql-hackers discussion back in January. Also, its behavior for printing EXPLAIN plans was sometimes confusing because of willingness to use the same alias for multiple RTEs (it was Ashutosh Bapat's complaint about that aspect that started the January thread). To fix, ensure that each RTE in the query has a unique unqualified alias, by modifying the alias if necessary (we add "_" and digits as needed to create a non-conflicting name). Then we can just print its variables with that alias, avoiding the confusing and bug-prone scheme of sometimes schema-qualifying variable names. In EXPLAIN, it proves to be expedient to take the further step of only assigning such aliases to RTEs that are actually referenced in the query, since the planner has a habit of generating extra RTEs with the same alias in situations such as inheritance-tree expansion. Although this fixes a bug of very long standing, I'm hesitant to back-patch such a noticeable behavioral change. My experiments while creating a regression test convinced me that actually incorrect output (as opposed to confusing output) occurs only in very narrow cases, which is backed up by the lack of previous complaints from the field. So we may be better off living with it in released branches; and in any case it'd be smart to let this ripen awhile in HEAD before we consider back-patching it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11e131854f8231a21613f834c40fe9d046926387">http://git.postgresql.org/pg/commitdiff/11e131854f8231a21613f834c40fe9d046926387</a></li>

<li>Minor corrections for ALTER TYPE ADD VALUE IF NOT EXISTS patch. Produce a NOTICE when the label already exists, for consistency with other CREATE IF NOT EXISTS commands. Also, fix the code so it produces something more user-friendly than an index violation when the label already exists. This not incidentally enables making a regression test that the previous patch didn't make for fear of exposing an unpredictable OID in the results. Also some wordsmithing on the documentation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31510194cc9d87b355cb56e7d88c18c985d7a32a">http://git.postgresql.org/pg/commitdiff/31510194cc9d87b355cb56e7d88c18c985d7a32a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>libpq: Add missing directory to installdirs target. It prevented the libpq directory from being installable by itself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bcf90cc18b5d8567f2cd4f789a047eb009fa15ec">http://git.postgresql.org/pg/commitdiff/bcf90cc18b5d8567f2cd4f789a047eb009fa15ec</a></li>

<li>pg_upgrade: Remove check for pg_config. It is no longer used, but was still being checked for. bug #7548 from Reinhard Max 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cfd5bb15bb2a1220136bc130d81fa6d1474b23c">http://git.postgresql.org/pg/commitdiff/5cfd5bb15bb2a1220136bc130d81fa6d1474b23c</a></li>

<li>Update translation updates instructions 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a32819a80b03deda7d7e06f2f964255e3842248">http://git.postgresql.org/pg/commitdiff/8a32819a80b03deda7d7e06f2f964255e3842248</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove execdesc.h inclusion from tcopprot.h 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22c734fcdb5321212bacde9b502d36a4cf564b44">http://git.postgresql.org/pg/commitdiff/22c734fcdb5321212bacde9b502d36a4cf564b44</a></li>

<li>RELEASE_NOTES: Fix typo. Jan Urba&#324;ski 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea7d504998cc26fd849b0ea89a7ffcd8f1f530f1">http://git.postgresql.org/pg/commitdiff/ea7d504998cc26fd849b0ea89a7ffcd8f1f530f1</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix obsolete comment. load_hba and load_ident load stuff in a separate memory context nowadays, not in the current memory context. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d5e9730e5c2aa912778b9e8728c0b5ebd807d9a">http://git.postgresql.org/pg/commitdiff/9d5e9730e5c2aa912778b9e8728c0b5ebd807d9a</a></li>

<li>Parse pg_ident.conf when it's loaded, keeping it in memory in parsed format. Similar changes were done to pg_hba.conf earlier already, this commit makes pg_ident.conf to behave the same as pg_hba.conf. This has two user-visible effects. First, if pg_ident.conf contains multiple errors, the whole file is parsed at postmaster startup time and all the errors are immediately reported. Before this patch, the file was parsed and the errors were reported only when someone tries to connect using an authentication method that uses the file, and the parsing stopped on first error. Second, if you SIGHUP to reload the config files, and the new pg_ident.conf file contains an error, the error is logged but the old file stays in effect. Also, regular expressions in pg_ident.conf are now compiled only once when the file is loaded, rather than every time the a user is authenticated. That should speed up authentication if you have a lot of regexps in the file. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c45e3a3c682f855ecda7fd671969ee5e91929bf">http://git.postgresql.org/pg/commitdiff/7c45e3a3c682f855ecda7fd671969ee5e91929bf</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow IF NOT EXISTS when add a new enum label. If the label is already in the enum the statement becomes a no-op. This will reduce the pain that comes from our not allowing this operation inside a transaction block. Andrew Dunstan, reviewed by Tom Lane and Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d12b68cd7a93e279c8c690749b334c9f59ac7fa">http://git.postgresql.org/pg/commitdiff/6d12b68cd7a93e279c8c690749b334c9f59ac7fa</a></li>

<li>Fix docs typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcc1576687a122059db311791e45e2c5edc5d89b">http://git.postgresql.org/pg/commitdiff/fcc1576687a122059db311791e45e2c5edc5d89b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Joachim Wieland sent in another revision of the patch to implement parallel pg_dump.</li>

<li>Heikki Linnakangas sent in two different revisions of the patch to create a facility to read transaction logs.</li>

<li>Marco Nenciarini sent in another revision of the patch to enable support for array element foreign keys.</li>

<li>Amit Kapila sent in a set of tests for writeable views. In response, Dean Rasheed sent in another revision of the patch implementing same.</li>

<li>Shigeru HANADA and Pavel Stehule traded patches to add \gset, which sets psql variables to the row in the output of the SQL query it executes.</li>

<li>Heikki Linnakangas sent in another revision of the patch to help XLogInsert scale better.</li>

<li>Tomas Vondra sent in another revision of the patch to aggregate pg_bench information in the log.</li>

<li>Selena Deckelmann sent in another revision of the patch to improve the way "include" directives in postgresql.conf work.</li>

<li>Amit Kapila and Pavel Stehule traded test cases and patches for the feature to get the number of rows processed by COPY.</li>

<li>Karl O. Pinc sent in three revisions of a patch to add a --truncate-tables option to pg_restore.</li>

<li>Amit Kapila sent in another revision of the patch to allow detecting network partitions more quickly during replication.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of the patch to add CREATE SCHEMA IF NOT EXISTS.</li>

<li>Andres Freund sent in a design document for WAL-based logical replication.</li>

<li>KaiGai Kohei sent in another revision of the patch to allow writes on FDWs.</li>

<li>Satoshi Nagayasu sent in a PoC patch to implement load balancing in libpq.</li>

<li>Karl O. Pinc sent in a doc patch to add a warning about how partial database restores work.</li>

<li>Karl O. Pinc sent in a doc patch to add a link from CREATE TABLE to CREATE TABLE AS.</li>

<li>Karl O. Pinc sent in a doc patch clarifying which system catalog tables have OIDs vs. ordinary PRIMARY KEYs.</li>

</ul>