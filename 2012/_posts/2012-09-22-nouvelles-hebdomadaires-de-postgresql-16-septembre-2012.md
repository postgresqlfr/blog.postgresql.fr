---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 septembre 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/09/22/Nouvelles-hebdomadaires-de-PostgreSQL-16-septembre-2012"
---


<p>PGDay programm&eacute; le 3 octobre 2012 &agrave; l'UNICAMP, Campinas, &eacute;tat de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16948">http://www.postgresql.org.br/node/16948</a></p>

<p>Il y aura un PGDay &eacute;galement le 9 novembre 2012 &agrave; l'USP de S&atilde;o Paulo&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/node/16949">http://www.postgresql.org.br/node/16949</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgAdmin v1.16.0 un outil graphique d'administration disponible sur de nombreuses plate-formes&nbsp;: 

<a target="_blank" href="http://www.pgadmin.org/development/changelog.php">http://www.pgadmin.org/development/changelog.php</a></li>

<li>pgbouncer 1.5.3, un gestionnaire l&eacute;ger de connexions &agrave; PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/frs/shownotes.php?release_id=1981">http://pgfoundry.org/frs/shownotes.php?release_id=1981</a></li>

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

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

<li>Le PGDay &eacute;quatorien de cette ann&eacute;e se tiendra &agrave; Quito le 17 novembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute; jusqu'au 10 octobre. Envoyez vos propositions &agrave; Jaime Casanova&nbsp;: jaime &lt;AT&gt; 2ndquadrant &lt;DOT&gt; com.</li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-09/msg00010.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add vcregress.pl target for checking pg_upgrade. This follows recent addition of Windows/Mingw testing. Backpatch to Release 9.2 so we can get some buildfarm testing going. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1d021e5d2f58170c7900c8766c4633e5f2328ee">http://git.postgresql.org/pg/commitdiff/a1d021e5d2f58170c7900c8766c4633e5f2328ee</a></li>

<li>Fix catalog docs to reflect connoinherit change in 09ff76f. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c328a9b0455f6bf8c0d8695c06e2da6925f73d3">http://git.postgresql.org/pg/commitdiff/7c328a9b0455f6bf8c0d8695c06e2da6925f73d3</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo: lexemes misspelled in full text search docs. Dan Scott 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bc0d2e2cfa8ac523524dccf6f849989c6739083">http://git.postgresql.org/pg/commitdiff/4bc0d2e2cfa8ac523524dccf6f849989c6739083</a></li>

<li>Fix typo in comment for pclose_check() function. Backpatch to 9.2. Etsuro Fujita. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b896f511f8dbeac9f09cc54c6cb62bdff25e501">http://git.postgresql.org/pg/commitdiff/6b896f511f8dbeac9f09cc54c6cb62bdff25e501</a></li>

<li>Fix documentation reference to maximum allowed for autovacuum_freeze_max_age. The documentation mentioned setting autovacuum_freeze_max_age to "its maximum allowed value of a little less than two billion". This led to a post asking about the exact maximum allowed value, which is precisely two billion, not "a little less". Based on question by Radovan Jablonovsky. Backpatch to 8.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/327542645e698a4c85dde8229c21361f96688808">http://git.postgresql.org/pg/commitdiff/327542645e698a4c85dde8229c21361f96688808</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix logical errors in tsquery selectivity estimation for prefix queries. I made multiple errors in commit 97532f7c29468010b87e40a04f8daa3eb097f654, stemming mostly from failure to think about the available frequency data as being element frequencies not value frequencies (so that occurrences of different elements are not mutually exclusive). This led to sillinesses such as estimating that "word" would match more rows than "word:*". The choice to clamp to a minimum estimate of DEFAULT_TS_MATCH_SEL also seems pretty ill-considered in hindsight, as it would frequently result in an estimate much larger than the available data suggests. We do need some sort of clamp, since a pattern not matching any of the MCELEMs probably still needs a selectivity estimate of more than zero. I chose instead to clamp to at least what a non-MCELEM word would be estimated as, preserving the property that "word:*" doesn't get an estimate less than plain "word", whether or not the word appears in MCELEM. Per investigation of a gripe from Bill Martin, though I suspect that his example case actually isn't even reaching the erroneous code. Back-patch to 9.1 where this code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1faf866acecaf354bc15a6948857ecd3000ba807">http://git.postgresql.org/pg/commitdiff/1faf866acecaf354bc15a6948857ecd3000ba807</a></li>

<li>Fix a couple other leftover uses of 'conisonly' terminology. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a93e7100866c717ca2f43af48dbd1c3755a9a62">http://git.postgresql.org/pg/commitdiff/9a93e7100866c717ca2f43af48dbd1c3755a9a62</a></li>

<li>Fix case of window function + aggregate + GROUP BY expression. In commit 1bc16a946008a7cbb33a9a06a7c6765a807d7f59 I added a minor optimization to drop the component variables of a GROUP BY expression from the target list computed at the aggregation level of a query, if those Vars weren't referenced elsewhere in the tlist. However, I overlooked that the window-function planning code would deconstruct such expressions and thus need to have access to their component variables. Fix it to not do that. While at it, I removed the distinction between volatile and nonvolatile window partition/order expressions: the code now computes all of them at the aggregation level. This saves a relatively expensive check for volatility, and it's unclear that the resulting plan isn't better anyway. Per bug #7535 from Louis-David Mitterrand. Back-patch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a20993608a65b9896b4c05cb7061bc60d6f1840a">http://git.postgresql.org/pg/commitdiff/a20993608a65b9896b4c05cb7061bc60d6f1840a</a></li>

<li>Keep plperl's current_call_data record on the stack, instead of palloc'ing. This at least saves some palloc overhead, and should furthermore reduce the risk of anything going wrong, eg somebody resetting the context the current_call_data record was in. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9afc6481117d2dd936e752da0424a2b6b05f6459">http://git.postgresql.org/pg/commitdiff/9afc6481117d2dd936e752da0424a2b6b05f6459</a></li>

<li>Add a regression test case based on bug #7516. Given what we now know about the cause of this bug, it seems like it'd be a real good idea to include it in the plperl regression tests, so as to catch any platform-specific cases where the code gets misoptimized. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8fbbcf37f22c5e8361da939ad0fc4be18a34ca9">http://git.postgresql.org/pg/commitdiff/b8fbbcf37f22c5e8361da939ad0fc4be18a34ca9</a></li>

<li>Back-patch fix and test case for bug #7516. Back-patch commits 9afc6481117d2dd936e752da0424a2b6b05f6459 and b8fbbcf37f22c5e8361da939ad0fc4be18a34ca9. The first of these is really a minor code cleanup to save a few cycles, but it turns out to provide a workaround for the misoptimization problem described in bug #7516. The second commit adds a regression test case. Back-patch the fix to all active branches. The test case only works as far back as 9.0, because it relies on plpgsql which isn't installed by default before that. (I didn't have success modifying it into an all-plperl form that still provoked a crash, though this may just reflect my lack of Perl-fu.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97d8ad170f7a118ed1237b00e6140ec892c11c89">http://git.postgresql.org/pg/commitdiff/97d8ad170f7a118ed1237b00e6140ec892c11c89</a></li>

<li>Improve largeobject regression test to show size of object read from file. The idea here is to provide a more easily diagnosable failure diff when the problem is that tenk.data has been DOS-ified, as I believe to be happening currently on buildfarm member hamerkop. Per suggestion from Magnus Hagander. Also, sync output/largeobject_1.source with current regression test. Failure to do that in commit 3a0e4d36ebd7f477822d5bae41ba121a40d22ccc turns out to be the real reason that hamerkop has been complaining. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd9b4f16894b98cffade9a77d87b910a939d10c5">http://git.postgresql.org/pg/commitdiff/bd9b4f16894b98cffade9a77d87b910a939d10c5</a></li>

<li>Adjust largeobject_1.source per buildfarm. Looks like the correct size of DOS-ified tenk.data is 680800 not 680801. (I got the latter from a version of unix2dos that appends a trailing ^Z, which evidently is not git's practice.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2899e3d6e4729ffd386a07501ff6bdc3d074120f">http://git.postgresql.org/pg/commitdiff/2899e3d6e4729ffd386a07501ff6bdc3d074120f</a></li>

<li>Rethink heuristics for choosing index quals for parameterized paths. Some experimentation with examples similar to bug #7539 has convinced me that indxpath.c's original implementation of parameterized-path generation was several bricks shy of a load. In general, if we are relying on a particular outer rel or set of outer rels for a parameterized path, the path should use every indexable join clause that's available from that rel or rels. Any join clauses that get left out of the indexqual will end up getting applied as plain filter quals (qpquals), and that's generally a significant loser compared to having the index AM enforce them. (This is particularly true with btree, which can skip the index scan entirely if it can see that the given indexquals are mutually contradictory.) The original heuristics failed to ensure this, though, and were overly complicated anyway. Rewrite to make the code explicitly identify each useful set of outer rels and then select all applicable join clauses for each one. The one plan that changes in the regression tests is in fact for the better according to the planner's cost estimates. (Note: this is not a correctness issue but just a matter of plan quality. I don't yet know what is going on in bug #7539, but I don't expect this change to fix that.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b8968f25232ad09001bf35ab4cc59f5a501193e">http://git.postgresql.org/pg/commitdiff/3b8968f25232ad09001bf35ab4cc59f5a501193e</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Properly set relpersistence for fake relcache entries. This can result in buffers failing to be properly flushed at checkpoint time, leading to data loss. Report, diagnosis, and patch by Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/beb850e1d873f8920a78b9b9ee27e9f87c95592f">http://git.postgresql.org/pg/commitdiff/beb850e1d873f8920a78b9b9ee27e9f87c95592f</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Add more constraint completion: ALTER DOMAIN ... DROP/RENAME/VALIDATE CONSTRAINT, ALTER TABLE ... RENAME/VALIDATE CONSTRAINT, COMMENT ON CONSTRAINT, SET CONSTRAINTS, 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05cf0ea8d1c94260cd11811b646ef7b16c148719">http://git.postgresql.org/pg/commitdiff/05cf0ea8d1c94260cd11811b646ef7b16c148719</a></li>

<li>PL/Python: Improve Python 3 regression test setup. Currently, we are making mangled copies of plpython/{expected,sql} to plpython/python3/{expected,sql}, and run the tests in plpython/python3. This has the disadvantage that the regression.diffs file, if any, ends up in plpython/python3, which is not the normal location. If we instead make the mangled copies in plpython/{expected,sql}/python3/, we can run the tests from the normal directory, regression.diffs ends up the normal place, and the pg_regress invocation also becomes a lot simpler. It's also more obvious at run time what's going on, because the tests end up being named "python3/something" in the test output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2e3bea3afe9618764a8f15cc7d6d95036b7638b">http://git.postgresql.org/pg/commitdiff/b2e3bea3afe9618764a8f15cc7d6d95036b7638b</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bufmgr so CHECKPOINT_END_OF_RECOVERY behaves as a shutdown checkpoint. Recovery code documents clearly that a shutdown checkpoint is executed at end of recovery - a shutdown checkpoint WAL record is written but the buffer manager had been altered to treat end of recovery as a normal checkpoint. This bug exacerbates the bufmgr relpersistence bug. Bug spotted by Andres Freund, patch by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64e196b6efbd58893a4381013a35c84b167b4856">http://git.postgresql.org/pg/commitdiff/64e196b6efbd58893a4381013a35c84b167b4856</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in a patch to add an argument to the OAT_POST_CREATE hook which inform extensions of the context of object creation.</li>

<li>Tatsuo Ishii sent in a patch to increase the size of large objects (LOs) from 32- to 64-bit.</li>

<li>Heikki Linnakangas sent a WIP patch to allow changing timelines via streaming replication alone. This would allow a cluster with more than two nodes to be reshaped without recourse to WALs.</li>

<li>Shigeru HANADA sent in a patch to move the postgresql_fdw_validator function into dblink.</li>

<li>Amit Kapila sent in two more revisions of the patch to enable a stand-alone backend which uses the full FE/BE protocol.</li>

<li>Jeff Davis and Kevin Grittner traded patches to document the interactions of SSI, subtransactions and read-only transactions.</li>

<li>Brar Piening sent in another revision of the patch to make PostgreSQL compile with Microsoft Visual Studio 2012.</li>

<li>Etsuro Fujita sent in a patch to add hooks for pre- and post-processor executables for COPY.</li>

<li>Kyotaro HORIGUCHI sent in a patch to improve performance of queries on partitioned tables.</li>

<li>Kyotaro HORIGUCHI sent in a patch to reduce the number of palloc()s in numeric operations.</li>

<li>Shigeru HANADA sent in a patch to implement PostgreSQL FDW as a contrib extension.</li>

<li>Jeff Davis sent in another WIP patch implementing page checksums.</li>

<li>Amit Kapila sent in two revisions of a patch to fix an infelicity in checks in the case of table inheritance.</li>

<li>Amit Kapila sent in another revision of the patch to have a separate timeout parameter for walreceiver in aid of helping replication detect network partitions faster.</li>

<li>Alvaro Herrera sent in another revision of the patch to add an embedded list interface.</li>

<li>Andres Freund sent in a patch which adds singly- and doubly-linked lists which can be easily embedded into other data structures and can be used without any additional memory allocations.</li>

<li>Andres Freund sent in a patch to implement a minimal binary heap.</li>

<li>Andres Freund sent in a patch to add support for a generic WAL reading facility, XLogReader.</li>

<li>Andres Freund sent in a patch to add a simple xlogdump tool.</li>

<li>Andres Freund sent in a patch to add a new syscache to fetch a pg_class entry via (reltablespace, relfilenode).</li>

<li>Andres Freund sent in a patch to log enough data into the WAL to reconstruct logical changes from it if wal_level is set to 'logical'.</li>

<li>Andres Freund sent in a patch to make InvalidateSystemCaches public.</li>

<li>Andres Freund sent in a patch to introduce WAL decoding via catalog time travel.</li>

<li>Andres Freund sent in a patch to add a new relmapper.c function RelationMapFilenodeToOid() that acts as an inverse of RelationMapOidToFilenode().</li>

<li>Andres Freund sent in a patch to add a new function pg_relation_by_filenode to lookup up a relation given the tablespace and the filenode OIDs.</li>

<li>Gurjeet Singh sent in a patch to include c.h in src/include/access/xlog.h and src/include/utils/timestamp.h per output from some IDEs.</li>

<li>Tomas Vondra sent in a patch to control the amount of logging pgbench does by setting an optional "logging step" parameter which takes a parameter of either the number of lines to go until the next line is logged, or a percentage.</li>

</ul>