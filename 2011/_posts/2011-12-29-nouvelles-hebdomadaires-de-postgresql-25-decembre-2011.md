---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 décembre 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/12/29/Nouvelles-hebdomadaires-de-PostgreSQL-25-décembre-2011"
---


<p>HTSQL 2.2, un langage de haut-niveau pour les bases de donn&eacute;es relationnelles&nbsp;: 

<a target="_blank" href="http://htsql.org">http://htsql.org</a></p>

<p>psycopg2 2.4.3, un connecteur Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2011/12/12/psycopg-243-released/">http://initd.org/psycopg/articles/2011/12/12/psycopg-243-released/</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-12/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague. L'appel &agrave; conf&eacute;renciers est lanc&eacute;. Merci d'envoyer vos propositions, incluant le sujet, une estimation de la dur&eacute;e et vos coordonn&eacute;es &agrave; l'adresse info CHEZ p2d2 POINT cz.</li>

<li>L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute; pour le FLOSS UK, programm&eacute; du 20 au 22 mars 2012 &agrave; Edimbourg. La date limite de d&eacute;p&ocirc;t des candidatures est fix&eacute;e au 18 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront inform&eacute;s avant le 25 novembre. Les propositions sont &agrave; envoyer &agrave; postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;: 

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2011-12/msg00014.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Teach SP-GiST to do index-only scans. Operator classes can specify whether or not they support this; this preserves the flexibility to use lossy representations within an index. In passing, move constant data about a given index into the rd_amcache cache area, instead of doing fresh lookups each time we start an index operation. This is mainly to try to make sure that spgcanreturn() has insignificant cost; I still don't have any proof that it matters for actual index accesses. Also, get rid of useless copying of FmgrInfo pointers; we can perfectly well use the relcache's versions in-place. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92203624934095163f8b57b5b3d7bbd2645da2c8">http://git.postgresql.org/pg/commitdiff/92203624934095163f8b57b5b3d7bbd2645da2c8</a></li>

<li>Rename updateNodeLink to spgUpdateNodeLink. On reflection, the original name seems way too generic for a global symbol. A quick check shows this is the only exported function name in SP-GiST that doesn't begin with "spg" or contain "SpGist", so the rest of them seem all right. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f57b064fdaa682ddea60f5dc27c0a5d5fcbffab">http://git.postgresql.org/pg/commitdiff/8f57b064fdaa682ddea60f5dc27c0a5d5fcbffab</a></li>

<li>Avoid crashing when we have problems unlinking files post-commit. smgrdounlink takes care to not throw an ERROR if it fails to unlink something, but that caution was rendered useless by commit 3396000684b41e7e9467d1abc67152b39e697035, which put an smgrexists call in front of it; smgrexists *does* throw error if anything looks funny, such as getting a permissions error from trying to open the file. If that happens post-commit, you get a PANIC, and what's worse the same logic appears in the WAL replay code, so the database even fails to restart. Restore the intended behavior by removing the smgrexists call --- it isn't accomplishing anything that we can't do better by adjusting mdunlink's ideas of whether it ought to warn about ENOENT or not. Per report from Joseph Shraibman of unrecoverable crash after trying to drop a table whose FSM fork had somehow gotten chmod'd to 000 permissions. Backpatch to 8.4, where the bogus coding was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0024cd1881447fa7aed58db94df379e593c6630">http://git.postgresql.org/pg/commitdiff/d0024cd1881447fa7aed58db94df379e593c6630</a></li>

<li>Fix gincostestimate to handle ScalarArrayOpExpr reasonably. The original coding of this function overlooked the possibility that it could be passed anything except simple OpExpr indexquals. But ScalarArrayOpExpr is possible too, and the code would probably crash (and surely give ridiculous answers) in such a case. Add logic to try to estimate sanely for such cases. In passing, fix the treatment of inner-indexscan cost estimation: it was failing to scale up properly for multiple iterations of a nestloop. (I think somebody might've thought that index_pages_fetched() is linear, but of course it's not.) Report, diagnosis, and preliminary patch by Marti Raudsepp; I refactored it a bit and fixed the cost estimation. Back-patch into 9.1 where the bogus code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1db5af279441b9ee215b54de424c2af92eeb1ef8">http://git.postgresql.org/pg/commitdiff/1db5af279441b9ee215b54de424c2af92eeb1ef8</a></li>

<li>Update per-column ACLs, not only per-table ACL, when changing table owner. We forgot to modify column ACLs, so privileges were still shown as having been granted by the old owner. This meant that neither the new owner nor a superuser could revoke the now-untraceable-to-table-owner permissions. Per bug #6350 from Marc Balmer. This has been wrong since column ACLs were added, so back-patch to 8.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c31224e257a57fc9ad1c602414d9f6f5f4ce4ae3">http://git.postgresql.org/pg/commitdiff/c31224e257a57fc9ad1c602414d9f6f5f4ce4ae3</a></li>

<li>Improve planner's handling of duplicated index column expressions. It's potentially useful for an index to repeat the same indexable column or expression in multiple index columns, if the columns have different opclasses. (If they share opclasses too, the duplicate column is pretty useless, but nonetheless we've allowed such cases since 9.0.) However, the planner failed to cope with this, because createplan.c was relying on simple equal() matching to figure out which index column each index qual is intended for. We do have that information available upstream in indxpath.c, though, so the fix is to not flatten the multi-level indexquals list when putting it into an IndexPath. Then we can rely on the sublist structure to identify target index columns in createplan.c. There's a similar issue for index ORDER BYs (the KNNGIST feature), so introduce a multi-level-list representation for that too. This adds a bit more representational overhead, but we might more or less buy that back by not having to search for matching index columns anymore in createplan.c; likewise btcostestimate saves some cycles. Per bug #6351 from Christian Rudolph. Likely symptoms include the "btree index keys must be ordered by attribute" failure shown there, as well as "operator MMMM is not a member of opfamily NNNN". Although this is a pre-existing problem that can be demonstrated in 9.0 and 9.1, I'm not going to back-patch it, because the API changes in the planner seem likely to break things such as index plugins. The corner cases where this matters seem too narrow to justify possibly breaking things in a minor release. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2c2c2e8b1df7dfdb01e7e6f6191a569ce3c3195">http://git.postgresql.org/pg/commitdiff/e2c2c2e8b1df7dfdb01e7e6f6191a569ce3c3195</a></li>

<li>Rethink representation of index clauses' mapping to index columns. In commit e2c2c2e8b1df7dfdb01e7e6f6191a569ce3c3195 I made use of nested list structures to show which clauses went with which index columns, but on reflection that's a data structure that only an old-line Lisp hacker could love. Worse, it adds unnecessary complication to the many places that don't much care which clauses go with which index columns. Revert to the previous arrangement of flat lists of clauses, and instead add a parallel integer list of column numbers. The places that care about the pairing can chase both lists with forboth(), while the places that don't care just examine one list the same as before. The only real downside to this is that there are now two more lists that need to be passed to amcostestimate functions in case they care about column matching (which btcostestimate does, so not passing the info is not an option). Rather than deal with 11-argument amcostestimate functions, pass just the IndexPath and expect the functions to extract fields from it. That gets us down to 7 arguments which is better than 11, and it seems more future-proof against likely additions to the information we keep about an index path. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/472d3935a2793343e450ba7cda4adbc323a984c3">http://git.postgresql.org/pg/commitdiff/472d3935a2793343e450ba7cda4adbc323a984c3</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow CHECK constraints to be declared ONLY. This makes them enforceable only on the parent table, not on children tables. This is useful in various situations, per discussion involving people bitten by the restrictive behavior introduced in 8.4. Authors: Nikhil Sontakke, Alex Hunsaker Reviewed by Robert Haas and myself 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61d81bd28dbec65a6b144e0cd3d0bfe25913c3ac">http://git.postgresql.org/pg/commitdiff/61d81bd28dbec65a6b144e0cd3d0bfe25913c3ac</a></li>

<li>Forgot catversion bump on previous patch. Per Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05e992e90e49aa5bca7e2b290ab736bfec97a7c1">http://git.postgresql.org/pg/commitdiff/05e992e90e49aa5bca7e2b290ab736bfec97a7c1</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for privileges on types. This adds support for the more or less SQL-conforming USAGE privilege on types and domains. The intent is to be able restrict which users can create dependencies on types, which restricts the way in which owners can alter types. reviewed by Yeb Havinga 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/729205571e81b4767efc42ad7beb53663e08d1ff">http://git.postgresql.org/pg/commitdiff/729205571e81b4767efc42ad7beb53663e08d1ff</a></li>

<li>Add ALTER DOMAIN ... RENAME You could already rename domains using ALTER TYPE, but with this new command it is more consistent with how other commands treat domains as a subcategory of types. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f90dd28062db2128a340fbe02f55829f15ab5561">http://git.postgresql.org/pg/commitdiff/f90dd28062db2128a340fbe02f55829f15ab5561</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Shave a few cycles in string_agg(). Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f0e4bb82e408090c0366c63a9ff4c0f7c4b0a8e">http://git.postgresql.org/pg/commitdiff/7f0e4bb82e408090c0366c63a9ff4c0f7c4b0a8e</a></li>

<li>sepgsql: Check CREATE permissions for some object types. KaiGai Kohei, reviewed by Dimitri Fontaine and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1042a348421bc16f4d4307228a9951e38a984f1">http://git.postgresql.org/pg/commitdiff/e1042a348421bc16f4d4307228a9951e38a984f1</a></li>

<li>Take fewer snapshots. When a PORTAL_ONE_SELECT query is executed, we can opportunistically reuse the parse/plan shot for the execution phase. This cuts down the number of snapshots per simple query from 2 to 1 for the simple protocol, and 3 to 2 for the extended protocol. Since we are only reusing a snapshot taken early in the processing of the same protocol message, the change shouldn't be user-visible, except that the remote possibility of the planning and execution snapshots being different is eliminated. Note that this change does not make it safe to assume that the parse/plan snapshot will certainly be reused; that will currently only happen if PortalStart() decides to use the PORTAL_ONE_SELECT strategy. It might be worth trying to provide some stronger guarantees here in the future, but for now we don't. Patch by me; review by Dimitri Fontaine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d573e239f03506920938bf0be56c868d9c3416da">http://git.postgresql.org/pg/commitdiff/d573e239f03506920938bf0be56c868d9c3416da</a></li>

<li>Improve behavior of concurrent CLUSTER. In the previous coding, a user could queue up for an AccessExclusiveLock on a table they did not have permission to cluster, thus potentially interfering with access by authorized users who got stuck waiting behind the AccessExclusiveLock. This approach avoids that. cluster() has the same permissions-checking requirements as REINDEX TABLE, so this commit moves the now-shared callback to tablecmds.c and renames it, per discussion with Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbe24a6dd8fb224b9585f25b882d5ffdb55a0ba5">http://git.postgresql.org/pg/commitdiff/cbe24a6dd8fb224b9585f25b882d5ffdb55a0ba5</a></li>

<li>Don't forget to de-escape the password field in .pgpass. This has been broken just about forever (or more specifically, commit 7f4981f4af1700456f98ac3f2b2d84959919ec81) and nobody noticed until Richard Huxton reported it recently. Analysis and fix by Ross Reedstrom, although I didn't use his patch. This doesn't seem important enough to back-patch and is mildly backward incompatible, so I'm just doing this in master. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d15e3ec4fcb735875a8a70a09ec0c62153c3329">http://git.postgresql.org/pg/commitdiff/8d15e3ec4fcb735875a8a70a09ec0c62153c3329</a></li>

<li>Add a security_barrier option for views. When a view is marked as a security barrier, it will not be pulled up into the containing query, and no quals will be pushed down into it, so that no function or operator chosen by the user can be applied to rows not exposed by the view. Views not configured with this option cannot provide robust row-level security, but will perform far better. Patch by KaiGai Kohei; original problem report by Heikki Linnakangas (in October 2009!). Review (in earlier versions) by Noah Misch and others. Design advice by Tom Lane and myself. Further review and cleanup by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e4611c0234d89e288a53351f775c59522baed7c">http://git.postgresql.org/pg/commitdiff/0e4611c0234d89e288a53351f775c59522baed7c</a></li>

<li>Catversion bump for commit 0e4611c0234d89e288a53351f775c59522baed7c. It changed the format of stored rules. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99b60fc04e53c09ca630d2798acb3768a778dc47">http://git.postgresql.org/pg/commitdiff/99b60fc04e53c09ca630d2798acb3768a778dc47</a></li>

<li>Typo fixes. All noted by Jaime Casanova. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0510b62d91151b9d8c1fe1aa15c9cf3ffe9bf25b">http://git.postgresql.org/pg/commitdiff/0510b62d91151b9d8c1fe1aa15c9cf3ffe9bf25b</a></li>

<li>Add bytea_agg, parallel to string_agg. Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5448c7d31b5af66a809e6580bae9bd31448bfa7">http://git.postgresql.org/pg/commitdiff/d5448c7d31b5af66a809e6580bae9bd31448bfa7</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jeff Davis sent in another revision of the patch to fix GiST indexing in range types.</li>

<li>Magnus Hagander sent in another revisions of the patch to allow users to kill their own queries.</li>

<li>Peter Eisentraut sent in a patch to disable prompting by default in the createuser utility.</li>

<li>Heikki Linnakangas sent in two revisions of a patch to move more work outside WALInsertLock.</li>

<li>Phil Sorber sent in three more revision of a patch to improve relation size functions such as pg_relation_size() to avoid producing an error when called against a no-longer-visible relation.</li>

<li>Marti Raudsepp sent in a patch to enable min()/max() optimization for the bool_and and bool_or aggregates.</li>

<li>Tomas Vondra sent in two revisions of a patch to track temp files in pg_stat_database.</li>

<li>Alvaro Herrera sent in a WIP patch to separate the default search order of columns from the on-disk representation.</li>

<li>Simon Riggs sent in a WIP patch to fix some contention issues in CLOG.</li>

<li>Marti Raudsepp sent in a patch to fix handling of erroneous float values, at least on some platforms.</li>

<li>Andrew Dunstan sent in a patch to make pretty-printing of view definions do something that resembles actual pretty-printing. The previous way was quite ugly in common cases.</li>

<li>Tomas Vondra sent in two revisions of a patch to allow EXPLAIN ANALYZE to instrument rows, but not timing.</li>

<li>Simon Riggs sent in a patch to enable 16-bit page checksums.</li>

<li>Alexander Bj&ouml;rnhagen sent in a patch to add a GUC to control whether a master configured with synchronous_commit = on is allowed to stop waiting for standby WAL sync when all synchronous standby WAL senders are disconnected.</li>

</ul>