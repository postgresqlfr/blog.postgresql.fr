---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 janvier 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/02/02/Nouvelles-hebdomadaires-de-PostgreSQL-29-janvier-2012"
---


<p>Il y aura une s&eacute;rie de conf&eacute;rences et &eacute;v&eacute;nements d&eacute;di&eacute;e &agrave; PostgreSQL au FOSDEM, &agrave; Bruxelles les 4 &amp; 5 f&eacute;vrier prochains, en plus des conf&eacute;renciers de la communaut&eacute; PostgreSQL inscrits dans la s&eacute;rie principale&nbsp;: 

<a target="_blank" href="http://fosdem.org/2012/">http://fosdem.org/2012/</a></p>

<p>L'appel &agrave; conf&eacute;renciers pour la PGCon a &eacute;t&eacute; &eacute;tendu jusqu'au 31 janvier 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/papers.php">http://www.pgcon.org/2012/papers.php</a></p>

<p>Le <em>PGDay</em> de New-York aura lieu le 2 avril 2012 au <em>Lighthouse International</em>&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org">http://pgday.nycpug.org</a></p>

<p>Le <em>PGDay</em> fran&ccedil;ais est programm&eacute; le 7 juin 2012 &agrave; Lyon&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague.</li>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-01/msg00015.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqués</strong></p>

<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Simon Riggs a poussé&nbsp;:</p>

<ul>

<li>ALTER &lt;thing&gt; [IF EXISTS] ... allows silent DDL if required, e.g. ALTER FOREIGN TABLE IF EXISTS foo RENAME TO bar. Pavel Stehule

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8a91d9d1c7ec75aaecf13df687ec7b5b0ed35a6">http://git.postgresql.org/pg/commitdiff/b8a91d9d1c7ec75aaecf13df687ec7b5b0ed35a6</a></li>

<li>Resolve timing issue with logging locks for Hot Standby. We log AccessExclusiveLocks for replay onto standby nodes, but because of timing issues on ProcArray it is possible to log a lock that is still held by a just committed transaction that is very soon to be removed. To avoid any timing issue we avoid applying locks made by transactions with InvalidXid. Simon Riggs, bug report Tom Lane, diagnosis Pavan Deolasee

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c172b7b02e6f6008d6dad66ddee8f67faf223c5b">http://git.postgresql.org/pg/commitdiff/c172b7b02e6f6008d6dad66ddee8f67faf223c5b</a></li>

<li>Add new replication mode synchronous_commit = 'write'. Replication occurs only to memory on standby, not to disk, so provides additional performance if user wishes to reduce durability level slightly. Adds concept of multiple independent sync rep queues. Fujii Masao and Simon Riggs

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/443b4821f1649bc617c5ce1f6f3ffc65842a8930">http://git.postgresql.org/pg/commitdiff/443b4821f1649bc617c5ce1f6f3ffc65842a8930</a></li>

<li>Allow pg_basebackup from standby node with safety checking. Base backup follows recommended procedure, plus goes to great lengths to ensure that partial page writes are avoided. Jun Ishizuka and Fujii Masao, with minor modifications

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8366c7803ec3d0591cf2d1226fea1fee947d56c3">http://git.postgresql.org/pg/commitdiff/8366c7803ec3d0591cf2d1226fea1fee947d56c3</a></li>

</ul>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Adjustments to regression tests for security_barrier views. Drop the role we create, so regression tests pass even when run more than once against the same cluster, a problem noted by Tom Lane and Jeff Janes. Also, rename the temporary role so that it starts with "regress_", to make it unlikely that we'll collide with an existing role name while running "make installcheck", per further gripe from Tom Lane.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49562f5eb66f31940dd7b64555bbd81bae952387">http://git.postgresql.org/pg/commitdiff/49562f5eb66f31940dd7b64555bbd81bae952387</a></li>

<li>Make CheckIndexCompatible simpler and more bullet-proof. This gives up the "don't rewrite the index" behavior in a couple of relatively unimportant cases, such as changing between an array type and an unconstrained domain over that array type, in return for making this code more future-proof. Noah Misch

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6eb71ac5527a94be443bc66e68b47b04979906e4">http://git.postgresql.org/pg/commitdiff/6eb71ac5527a94be443bc66e68b47b04979906e4</a></li>

<li>Instrument index-only scans to count heap fetches performed. Patch by me; review by Tom Lane, Jeff Davis, and Peter Geoghegan.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f9135d129e915e72c8a2f770689fd72619ead49">http://git.postgresql.org/pg/commitdiff/9f9135d129e915e72c8a2f770689fd72619ead49</a></li>

<li>Damage control for yesterday's CheckIndexCompatible changes. Rip out a regression test that doesn't play well with settings put in place by the build farm, and rewrite the code in CheckIndexCompatible in a hopefully more transparent style.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d35116611e6a1fc10f2298944fbf0e4e1a826be">http://git.postgresql.org/pg/commitdiff/9d35116611e6a1fc10f2298944fbf0e4e1a826be</a></li>

<li>Classify DROP operations by whether or not they are user-initiated. This doesn't do anything useful just yet, but is intended as supporting infrastructure for allowing sepgsql to sensibly check DROP permissions. KaiGai Kohei and Robert Haas

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e549697d1c6b8eeb623c497dc38a5aed4deea1e">http://git.postgresql.org/pg/commitdiff/0e549697d1c6b8eeb623c497dc38a5aed4deea1e</a></li>

<li>Add missing #include, to suppress compiler warning.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/467ff207f51439cadee7857d6a0874f34652ed53">http://git.postgresql.org/pg/commitdiff/467ff207f51439cadee7857d6a0874f34652ed53</a></li>

<li>Be more clear when a new column name collides with a system column name. We now use the same error message for ALTER TABLE .. ADD COLUMN or ALTER TABLE .. RENAME COLUMN that we do for CREATE TABLE. The old message was accurate, but might be confusing to users not aware of our system columns. Vik Reykja, with some changes by me, and further proofreading by Tom Lane

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d1371d3ee5cf7e96d16fb503c27e060df9497f7">http://git.postgresql.org/pg/commitdiff/2d1371d3ee5cf7e96d16fb503c27e060df9497f7</a></li>

<li>Adjust tuplesort.c based on the fact that we never use the OS's qsort(). Our own qsort_arg() implementation doesn't have the defect previously observed to affect only QNX 4, so it seems sufficiently to assert that it isn't broken rather than retesting. Also, update a few comments to clarify why it's valuable to retain a tie-break rule based on CTID during index builds. Peter Geoghegan, with slight tweaks by me.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5a03256c725c09c32a5c498bd7c8799ed3ec2a0">http://git.postgresql.org/pg/commitdiff/c5a03256c725c09c32a5c498bd7c8799ed3ec2a0</a></li>

<li>pg_dump: Move connection-setup code to a separate function. Parallel dump will need to repeat these steps for each new connection, so it's better to have this logic in its own function. Extracted (with some changes) from a much larger patch by Joachim Wieland.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e43166a557d5f28aa66fa15be12fdc6a8ebe380a">http://git.postgresql.org/pg/commitdiff/e43166a557d5f28aa66fa15be12fdc6a8ebe380a</a></li>

<li>Document that analyzing an empty table doesn't update the statistics. Per a suggestion from Sergey Konoplev

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db6de5b71ef2d91dde94fc0de8adf45372bc332d">http://git.postgresql.org/pg/commitdiff/db6de5b71ef2d91dde94fc0de8adf45372bc332d</a></li>

<li>Document that COUNT(*) might not need a seq scan any more. Noted by Josh Kupershmidt.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb6af016fc04392c41106ac866072914bf66ecd0">http://git.postgresql.org/pg/commitdiff/eb6af016fc04392c41106ac866072914bf66ecd0</a></li>

</ul>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Reduce tab outdent of "error handling" GUC comments in postgresql.conf, to match surrounding outdenting.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/890a9992ce78b691e44359236d8b47e3c889581d">http://git.postgresql.org/pg/commitdiff/890a9992ce78b691e44359236d8b47e3c889581d</a></li>

<li>Fix new SQL tablespace location function usage in pg_upgrade to properly check cluster version numbers, and fix missing table alias.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b95aec529014355f4f90c5095993404ff0291b02">http://git.postgresql.org/pg/commitdiff/b95aec529014355f4f90c5095993404ff0291b02</a></li>

<li>In pg_upgrade, when checking for the plpython library, we must check for "plpython2" when upgrading from pre-PG 9.1. Patch to head and 9.1. Per report from Peter Eisentraut.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfe443ab9d42b4ffe950608f01c3a4bdc2895c7b">http://git.postgresql.org/pg/commitdiff/cfe443ab9d42b4ffe950608f01c3a4bdc2895c7b</a></li>

<li>Improve plpython fix comment in pg_upgrade.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7f2c79a6eebccd94aade2b03d40a2caeba8a5c3">http://git.postgresql.org/pg/commitdiff/a7f2c79a6eebccd94aade2b03d40a2caeba8a5c3</a></li>

<li>Now that the shared library name can be adjusted in the library test, have pg_upgrade allocate a maximum fixed size buffer for testing the library file name, rather than base the allocation on the library name. Backpatch to 9.1.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d5aae7afacc564ead2af88c76b13cfc55750556">http://git.postgresql.org/pg/commitdiff/6d5aae7afacc564ead2af88c76b13cfc55750556</a></li>

<li>Fix pg_upgrade --help text for --user to not use a plural cluster name.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3946c281613e549d5686ad3f5b298549b0eb0efe">http://git.postgresql.org/pg/commitdiff/3946c281613e549d5686ad3f5b298549b0eb0efe</a></li>

</ul>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Suppress possibly-uninitialized-variable warning seen with older gcc versions.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/beef89567e3a0e3e1c753754a474065c5ad632fe">http://git.postgresql.org/pg/commitdiff/beef89567e3a0e3e1c753754a474065c5ad632fe</a></li>

<li>Suppress variable-clobbered-by-longjmp warning seen with older gcc versions.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f26c9896b3da1b6aa5c560c4743f22a2a6c84919">http://git.postgresql.org/pg/commitdiff/f26c9896b3da1b6aa5c560c4743f22a2a6c84919</a></li>

<li>Use parameterized paths to generate inner indexscans more flexibly. This patch fixes the planner so that it can generate nestloop-with- inner-indexscan plans even with one or more levels of joining between the indexscan and the nestloop join that is supplying the parameter. The executor was fixed to handle such cases some time ago, but the planner was not ready. This should improve our plans in many situations where join ordering restrictions formerly forced complete table scans. There is probably a fair amount of tuning work yet to be done, because of various heuristics that have been added to limit the number of parameterized paths considered. However, we are not going to find out what needs to be adjusted until the code gets some real-world use, so it's time to get it in there where it can be tested easily. Note API change for index AM amcostestimate functions. I'm not aware of any non-core index AMs, but if there are any, they will need minor adjustments.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2fa76d80ba571d4de8992de6386536867250474">http://git.postgresql.org/pg/commitdiff/e2fa76d80ba571d4de8992de6386536867250474</a></li>

<li>Undo 8.4-era lobotomization of subquery pullup rules. After the planner was fixed to convert some IN/EXISTS subqueries into semijoins or antijoins, we had to prevent it from doing that in some cases where the plans risked getting much worse. The reason the plans got worse was that in the unoptimized implementation, subqueries could reference parameters from the outer query at any join level, and so full table scans could be avoided even if they were one or more levels of join below where the semi/anti join would be. Now that we have sufficient mechanism in the planner to handle such cases properly, it should no longer be necessary to play dumb here. This reverts commits 07b9936a0f10d746e5076239813a5e938f2f16be and cd1f0d04bf06938c0ee5728fc8424d62bcf2eef3. The latter was a stopgap fix that wasn't really sufficiently analyzed at the time. Rather than just restricting ourselves to cases where the new join can be stacked on the right-hand input, we should also consider whether it can be stacked on the left-hand input.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0816fad6eebddb8f1f0e21635e46625815d690b9">http://git.postgresql.org/pg/commitdiff/0816fad6eebddb8f1f0e21635e46625815d690b9</a></li>

<li>Fix error detection in contrib/pgcrypto's encrypt_iv() and decrypt_iv(). Due to oversights, the encrypt_iv() and decrypt_iv() functions failed to report certain types of invalid-input errors, and would instead return random garbage values. Marko Kreen, per report from Stefan Kaltenbrunner

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8b4b84360e5ea145d12d372305b50f6774b0366">http://git.postgresql.org/pg/commitdiff/a8b4b84360e5ea145d12d372305b50f6774b0366</a></li>

<li>Fix handling of data-modifying CTE subplans in EvalPlanQual. We can't just skip initializing such subplans, because the referencing CTE node will expect to find the subplan available when it initializes. That in turn means that ExecInitModifyTable must allow the case (which actually it needed to do anyway, since there's no guarantee that ModifyTable is exactly at the top of the CTE plan tree). So move the complaint about not being allowed in EvalPlanQual mode to execution instead of initialization. Testing turned up yet another problem, which is that we'd try to re-initialize the result relation's index list, leading to leaks and dangling pointers. Per report from Phil Sorber. Back-patch to 9.1 where data-modifying CTEs were introduced.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c1719bc68ec1c347e7c80c3735bf3373e765f35">http://git.postgresql.org/pg/commitdiff/7c1719bc68ec1c347e7c80c3735bf3373e765f35</a></li>

<li>Add simple tests of EvalPlanQual using the isolationtester infrastructure. Much more could be done here, but at least now we have *some* automated test coverage of that mechanism. In particular this tests the writable-CTE case reported by Phil Sorber. In passing, remove isolationtester's arbitrary restriction on the number of steps in a permutation list. I used this so that a single spec file could be used to run several related test scenarios, but there are other possible reasons to want a step series that's not exactly a permutation. Improve documentation and fix a couple other nits as well.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/759d9d67695783f6d04a85aba383a41c5382548c">http://git.postgresql.org/pg/commitdiff/759d9d67695783f6d04a85aba383a41c5382548c</a></li>

<li>Fix handling of init_plans list in inheritance_planner(). Formerly we passed an empty list to each per-child-table invocation of grouping_planner, and then merged the results into the global list. However, that fails if there's a CTE attached to the statement, because create_ctescan_plan uses the list to find the plan referenced by a CTE reference; so it was unable to find any CTEs attached to the outer UPDATE or DELETE. But there's no real reason not to use the same list throughout the process, and doing so is simpler and faster anyway. Per report from Josh Berkus of "could not find plan for CTE" failures. Back-patch to 9.1 where we added support for WITH attached to UPDATE or DELETE. Add some regression test cases, too.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ec6581c0cdddfda767641f535116ee9a0412149">http://git.postgresql.org/pg/commitdiff/4ec6581c0cdddfda767641f535116ee9a0412149</a></li>

<li>Update statement about sorting of character-string data. The sort order is no longer fixed at database creation time, but can be controlled via COLLATE. Noted by Thomas Kellerer.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17d3233e1bfd9fbe856f032a542f2c595e79ca01">http://git.postgresql.org/pg/commitdiff/17d3233e1bfd9fbe856f032a542f2c595e79ca01</a></li>

<li>Add caution about multiple unique indexes breaking plpgsql upsert example. Per Phil Sorber, though I didn't use his wording exactly.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed6e0545f5f6e9977c8410e04244138b567c5a73">http://git.postgresql.org/pg/commitdiff/ed6e0545f5f6e9977c8410e04244138b567c5a73</a></li>

<li>Fix pushing of index-expression qualifications through UNION ALL. In commit 57664ed25e5dea117158a2e663c29e60b3546e1c, I made the planner wrap non-simple-variable outputs of appendrel children (IOW, child SELECTs of UNION ALL subqueries) inside PlaceHolderVars, in order to solve some issues with EquivalenceClass processing. However, this means that any upper-level WHERE clauses mentioning such outputs will now contain PlaceHolderVars after they're pushed down into the appendrel child, and that prevents indxpath.c from recognizing that they could be matched to index expressions. To fix, add explicit stripping of PlaceHolderVars from index operands, same as we have long done for RelabelType nodes. Add a regression test covering both this and the plain-UNION case (which is a totally different code path, but should also be able to do it). Per bug #6416 from Matteo Beccati. Back-patch to 9.1, same as the previous change.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b28ffd0fcc583c1811e5295279e7d4366c3cae6c">http://git.postgresql.org/pg/commitdiff/b28ffd0fcc583c1811e5295279e7d4366c3cae6c</a></li>

<li>Tweak index costing for problems with partial indexes. btcostestimate() makes an estimate of the number of index tuples that will be visited based on knowledge of which index clauses can actually bound the scan within nbtree. However, it forgot to account for partial indexes in this calculation, with the result that the cost of the index scan could be significantly overestimated for a partial index. Fix that by merging the predicate with the abbreviated indexclause list, in the same way as we do with the full list to estimate how many heap tuples will be visited. Also, slightly increase the "fudge factor" that's meant to give preference to smaller indexes over larger ones. While this is applied to all indexes, it's most important for partial indexes since it can be the only factor that makes a partial index look cheaper than a similar full index. Experimentation shows that the existing value is so small as to easily get swamped by noise such as page-boundary-roundoff behavior. I'm tempted to kick it up more than this, but will refrain for now. Per report from Ruben Blanco. These are long-standing issues, but given the lack of prior complaints I'm not going to risk changing planner behavior in back branches by back-patching.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21a39de5809cd3050a37d2554323cc1d0cbeed9d">http://git.postgresql.org/pg/commitdiff/21a39de5809cd3050a37d2554323cc1d0cbeed9d</a></li>

<li>Fix typo in comment. Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd243b3e40c24cd7c6b0db80bb39061f8f85af7b">http://git.postgresql.org/pg/commitdiff/dd243b3e40c24cd7c6b0db80bb39061f8f85af7b</a></li>

<li>Assorted comment fixes, mostly just typos, but some obsolete statements. YAMAMOTO Takashi

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad10853b30b84d89905e023afa599de3a1fea4c6">http://git.postgresql.org/pg/commitdiff/ad10853b30b84d89905e023afa599de3a1fea4c6</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Remove quotes around format_type_be() output. format_type_be() takes care of any needed quoting itself.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89dda5f2979fbe277809369ff88832ab39e83ff0">http://git.postgresql.org/pg/commitdiff/89dda5f2979fbe277809369ff88832ab39e83ff0</a></li>

<li>Do not access indclass through Form_pg_index. Normally, accessing variable-length members of catalog structures past the first one doesn't work at all. Here, it happened to work because indnatts was checked to be 1, and so the defined FormData_pg_index layout, using int2vector[1] and oidvector[1] for variable-length arrays, happened to match the actual memory layout. But it's a very fragile assumption, and it's not in a performance-critical path, so code it properly using heap_getattr() instead. bug analysis by Tom Lane

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a3f745f160d8334ad978676828d3926ac949f43">http://git.postgresql.org/pg/commitdiff/8a3f745f160d8334ad978676828d3926ac949f43</a></li>

<li>Hide most variable-length fields from Form_pg_* structs. Those fields only appear in the structs so that genbki.pl can create the BKI bootstrap files for the catalogs. But they are not actually usable from C. So hiding them can prevent coding mistakes, saves stack space, and can help the compiler. In certain catalogs, the first variable-length field has been kept visible after manual inspection. These exceptions are noted in C comments. reviewed by Tom Lane

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8137f2c32322c624e0431fac1621e8e9315202f9">http://git.postgresql.org/pg/commitdiff/8137f2c32322c624e0431fac1621e8e9315202f9</a></li>

<li>Disallow ALTER DOMAIN on non-domain type everywhere. This has been the behavior already in most cases, but through omission, ALTER DOMAIN / OWNER TO and ALTER DOMAIN / SET SCHEMA would silently work on non-domain types as well.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27874583627e049a049dc1327deb12a02a7013ab">http://git.postgresql.org/pg/commitdiff/27874583627e049a049dc1327deb12a02a7013ab</a></li>

<li>Revert unfortunate whitespace change. In e5e2fc842c418432756d8b5825ff107c6c5fc4c3, blank lines were removed after a comment block, which now looks as though the comment refers to the immediately following code, but it actually refers to the preceding code. So put the blank lines back.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf90562aa464e3a9afedde5f0007058f381d00fe">http://git.postgresql.org/pg/commitdiff/bf90562aa464e3a9afedde5f0007058f381d00fe</a></li>

<li>Show default privileges in information schema. Hitherto, the information schema only showed explicitly granted privileges that were visible in the *acl catalog columns. If no privileges had been granted, the implicit privileges were not shown. To fix that, add an SQL-accessible version of the acldefault() function, and use that inside the aclexplode() calls to substitute the catalog-specific default privilege set for null values. reviewed by Abhijit Menon-Sen

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b376ec6fa57bc76037014ede29498e2d1611968e">http://git.postgresql.org/pg/commitdiff/b376ec6fa57bc76037014ede29498e2d1611968e</a></li>

</ul>

<p>Alvaro Herrera a poussé&nbsp;:</p>

<ul>

<li>Add pg_trigger_depth() function. This reports the depth level of triggers currently in execution, or zero if not called from inside a trigger. No catversion bump in this patch, but you have to initdb if you want access to the new function. Author: Kevin Grittner

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74ab96a45ef6259aa6a86a781580edea8488511a">http://git.postgresql.org/pg/commitdiff/74ab96a45ef6259aa6a86a781580edea8488511a</a></li>

<li>Have \copy go through SendQuery. This enables a bunch of features, notably ON_ERROR_ROLLBACK. It also makes COPY failure (either in the server or psql) as a whole behave more sanely in psql. Additionally, having more commands in the same command line as COPY works better (though since psql splits lines at semicolons, this doesn't matter much unless you're using -c). Also tighten a couple of switches on PQresultStatus() to add PGRES_COPY_BOTH support and stop assuming that unknown statuses received are errors; have those print diagnostics where warranted. Author: Noah Misch

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08146775acd8bfe0fcc509c71857abb928697171">http://git.postgresql.org/pg/commitdiff/08146775acd8bfe0fcc509c71857abb928697171</a></li>

</ul>

<p>Magnus Hagander a poussé&nbsp;:</p>

<ul>

<li>Track temporary file count and size in pg_stat_database. Add counters for number and size of temporary files used for spill-to-disk queries for each database to the pg_stat_database view. Tomas Vondra, review by Magnus Hagander

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc3347484a7bf9eddb98e4352d84599cae9a31c6">http://git.postgresql.org/pg/commitdiff/bc3347484a7bf9eddb98e4352d84599cae9a31c6</a></li>

<li>Add deadlock counter to pg_stat_database. Adds a counter that tracks number of deadlocks that occurred in each database to pg_stat_database. Magnus Hagander, reviewed by Jaime Casanova

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61cb8c5abb9235c3106af6c6a6e60d94cb1eee80">http://git.postgresql.org/pg/commitdiff/61cb8c5abb9235c3106af6c6a6e60d94cb1eee80</a></li>

<li>Fix a copy/pasted typo in several comments

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7729e22d83b31afa1009f190bf0f4838cc8feaf8">http://git.postgresql.org/pg/commitdiff/7729e22d83b31afa1009f190bf0f4838cc8feaf8</a></li>

<li>Fix wording, per Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9f14bb4acf3e5caff97ef0a639c3ee911932e1c">http://git.postgresql.org/pg/commitdiff/c9f14bb4acf3e5caff97ef0a639c3ee911932e1c</a></li>

<li>Prevent logging "failed to stat file: success" for temp files. This was broken in commit bc3347484a7bf9eddb98e4352d84599cae9a31c6, the addition of statistics counters for temp files. Reported by Thom Brown

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/672614cf2137b2a3778c69de8d73770d84790e44">http://git.postgresql.org/pg/commitdiff/672614cf2137b2a3778c69de8d73770d84790e44</a></li>

</ul>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>Make bgwriter sleep longer when it has no work to do, to save electricity. To make it wake up promptly when activity starts again, backends nudge it by setting a latch in MarkBufferDirty(). The latch is kept set while bgwriter is active, so there is very little overhead from that when the system is busy. It is only armed before going into longer sleep. Peter Geoghegan, with some changes by me.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d90eaaa89a007e0d365f49d6436f35d2392cfeb">http://git.postgresql.org/pg/commitdiff/6d90eaaa89a007e0d365f49d6436f35d2392cfeb</a></li>

<li>Fix sentence in docs: checkpoints are not done by bgwriter anymore.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4bad4e1e1c7269b906f3b005fc322537630efcf">http://git.postgresql.org/pg/commitdiff/d4bad4e1e1c7269b906f3b005fc322537630efcf</a></li>

<li>Mention in the docs that bgwriter now sleeps longer when it has no work to do.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e92b5872faeb01f1865bb00556ec7be0ef006ee">http://git.postgresql.org/pg/commitdiff/2e92b5872faeb01f1865bb00556ec7be0ef006ee</a></li>

<li>Fix copy-paste error in docs. Dean Rasheed

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59c67ecdd39725aaee0db6e09f399c8e6c248f22">http://git.postgresql.org/pg/commitdiff/59c67ecdd39725aaee0db6e09f399c8e6c248f22</a></li>

<li>Initialize the new bgwriterLatch field properly. Peter Geoghegan

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf3fff6326299deca77c1387df31d24aea36e2e1">http://git.postgresql.org/pg/commitdiff/cf3fff6326299deca77c1387df31d24aea36e2e1</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Noah Misch sent in another revision of the patch to collect statistics for arrays.</li>

<li>Jim Mlodgensky and Heikki Linnakangas traded patches to add a new GUC for welcome messages.</li>

<li>Matthew Draper sent in another revision of the patch to enable SQL language functions to reference parameters by name.</li>

<li>Simon Riggs sent in another revision of the patch to have a WAL restore process during recovery.</li>

<li>Simon Riggs sent in another revision of the freelist_wait_stats patch.</li>

<li>Alexander Korotkov and Jeff Davis traded patches for GiST indexing on range types.</li>

<li>Alvaro Herrera sent in two more revisions of the FOREIGN KEY LOCK patch.</li>

<li>Jaime Casanova sent in another revision of the relation_free_space patch.</li>

<li>Thomas Ogrisegg sent in a patch intended to fix a bug in pg_basebackup, which exits with 0 even if it had errors while writing the backup to disk when the backup file is to be sent to stdout.</li>

<li>Fujii Masao sent an add-on patch to the one which adds a "write" synchrounous replication mode to modify postgresql.conf appropriately.</li>

<li>Noah Misch sent in another revision of the patch to prevent unneeded table rewrites in certain types of ALTER TABLE...ALTER TYPE operations.</li>

<li>Heikki Linnakangas sent in two more revisions of the GROUP COMMIT patch, reviews by Robert Haas, Jeff Janes and Jesper Krogh.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add triggers to commands in general.</li>

<li>Abhijit Menon-Sen and Pavel Stehule traded revisions of a patch to allow better debugging of overloaded functions.</li>

<li>Abhijit Menon-Sen sent in a patch atop Andrew Dunstan's patch to add {query,array,row}-to-json functionality.</li>

<li>KaiGai Kohei sent in another revision of the patch to plug certain types of information leaks in views.</li>

<li>Abhijit Menon-Sen sent in a patch to fix some infelicities in Peter Eisentraut's patch to enable using \0 as a field or record separator.</li>

<li>Jaime Casanova sent in another revision of the patch to add a pg_stats_recovery view.</li>

<li>Abhijit Menon-Sen sent in a fix to Daniel Farina's patch which factors out the various crc32 implementations in the code base.</li>

<li>Kyotaro HORIGUCHI sent in another revision of the patch to add a new libpq tuple storage and use same to speed up dblink. Reviews by Marko Kreen and Merlin Moncure.</li>

<li>Peter Geoghegan sent in another revision of the fast path sort patch.</li>

<li>Marti Raudsepp sent in another revision of the patch to cache stable expressions with constant arguments.</li>

<li>Luben Karavelov sent in a patch to enable limited cover density ranking in text search. Reviews by Oleg Bartunov and Sushant Sinha.</li>

<li>Dan Scales sent in another WIP patch implementing double-write with the suggested double-write buffers per feedback from Heikki Linnakangas and Simon Riggs.</li>

<li>Jeff Janes sent in a patch to allow simulating log contention in pg_bench.</li>

<li>Dean Rasheed sent in a patch to fix a performance regression in index-only scans.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of the patch to enable CHECK FUNCTION.</li>

<li>Simon Riggs sent in another revision of the DROP INDEX CONCURRENTLY patch.</li>

<li>Simon Riggs sent in another revision of the patch intended to reduce CLOG contention.</li>

</ul>