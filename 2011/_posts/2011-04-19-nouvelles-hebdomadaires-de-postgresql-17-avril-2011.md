---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 avril 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/04/19/Nouvelles-hebdomadaires-de-PostgreSQL-17-avril-2011"
---


<p>Les mises à jour de PostgreSQL en versions 9.0.4, 8.4.8, 8.3.15 et 8.2.21 seront bientôt disponibles. Préparez-vous à mettre à jour&nbsp;!</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>tail_n_mail 1.18.1, un logiciel de surveillance de log Postgres&nbsp;:

<a target="_blank" href="http://bucardo.org/wiki/Tail_n_mail">http://bucardo.org/wiki/Tail_n_mail</a></li>

<li>Bucardo 4.4.3, un système de réplication "multi-maîtres" pour PostgreSQL&nbsp;:

<a target="_blank" href="http://bucardo.org/wiki/Bucardo">http://bucardo.org/wiki/Bucardo</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-04/threads.php</a>;</li>

<li>Francophones&nbsp;:

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PUG turque organise une journée événement le 30 avril 2011. Suivez @PgDayTR (en turc) pour d'avantages de détails&nbsp;:

<a target="_blank" href="http://pgday.postgresql.org.tr/2011/">http://pgday.postgresql.org.tr/2011/</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;:

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 à l'Université d'Ottawa, précédé par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

<li>La PG Session 2, sur PostGIS, se tiendra à Paris le 23 juin. Appel à conférenciers&nbsp;:

<a target="_blank" href="http://www.postgresql-sessions.org/en/2/">http://www.postgresql-sessions.org/en/2/</a></li>

<li>pgbr aura lieu à São Paulo (Brésil) les 3 &amp; 4 novembre 2011&nbsp;:

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org et en espagnol à pwn (a) arpug.com.ar.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110417">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>TransferPredicateLocksToNewTarget should initialize a new lock entry's commitSeqNo to that of the old one being transferred, or take the minimum commitSeqNo if it is merging two lock entries. Also, CreatePredicateLock should initialize commitSeqNo for to InvalidSerCommitSeqNo instead of to 0. (I don't think using 0 would actually affect anything, but we should be consistent.) I also added a couple of assertions I used to track this down: a lock's commitSeqNo should never be zero, and it should be InvalidSerCommitSeqNo if and only if the lock is not held by OldCommittedSxact. Dan Ports, to fix leak of predicate locks reported by YAMAMOTO Takashi.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dad1f4638235e5ff5696b948b88ba24cd99b415e">http://git.postgresql.org/pg/commitdiff/dad1f4638235e5ff5696b948b88ba24cd99b415e</a></li>

<li>Fix the size of predicate lock manager's shared memory hash tables at creation. This way they don't compete with the regular lock manager for the slack shared memory, making the behavior more predictable.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c797e7194d969f974abf579cacf30ffdccdbb95">http://git.postgresql.org/pg/commitdiff/7c797e7194d969f974abf579cacf30ffdccdbb95</a></li>

<li>On IA64 architecture, we check the depth of the register stack in addition to the regular stack. The code to do that is platform and compiler specific, add support for the HP-UX native compiler.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b5bb040da63806f7386b3434c38e1fa98860ea88">http://git.postgresql.org/pg/commitdiff/b5bb040da63806f7386b3434c38e1fa98860ea88</a></li>

<li>Revert the patch to check if we've reached end-of-backup also when doing crash recovery, and throw an error if not. hubert depesz lubaczewski pointed out that that situation also happens in the crash recovery following a system crash that happens during an online backup. We might want to do something smarter in 9.1, like put the check back for backups taken with pg_basebackup, but that's for another patch.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54685b1c2b356b4b9c0938f6b8dcc52e173c0400">http://git.postgresql.org/pg/commitdiff/54685b1c2b356b4b9c0938f6b8dcc52e173c0400</a></li>

<li>On HP/UX, the structs used by ioctl(SIOCGLIFCONF) are named differently than on other platforms, and only IPv6 addresses are returned. Because of those two issues, fall back to ioctl(SIOCGIFCONF) on HP/UX, so that it at least compiles and finds IPv4 addresses. This function is currently only used for interpreting samehost/samenet in pg_hba.conf, which isn't that critical.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40e64017f3a4f1f7547dcbc62c2dcf80511ff842">http://git.postgresql.org/pg/commitdiff/40e64017f3a4f1f7547dcbc62c2dcf80511ff842</a></li>

<li>Reduce the initial size of local lock hash to 16 entries. The hash table is seq scanned at transaction end, to release all locks, and making the hash table larger than necessary makes that slower. With very simple queries, that overhead can amount to a few percent of the total CPU time used. At the moment, backend startup needs 6 locks, and a simple query with one table and index needs 3 locks. 16 is enough for even quite complicated transactions, and it will grow automatically if it fills up.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c37c1e3b2a7ba7b5519e5e366720e7444878a78">http://git.postgresql.org/pg/commitdiff/4c37c1e3b2a7ba7b5519e5e366720e7444878a78</a></li>

<li>setlocale() on Windows doesn't work correctly if the locale name contains apostrophes or dots. There isn't much hope of Microsoft fixing it any time soon, it's been like that for ages, so we better work around it. So, map a few common Windows locale names known to cause problems to aliases that work.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5a7bf8c11c8b66c822bbb1a6c90e1a14425bd6e">http://git.postgresql.org/pg/commitdiff/d5a7bf8c11c8b66c822bbb1a6c90e1a14425bd6e</a></li>

<li>On Windows, if the encoding implied by locale is not allowed as a server-encoding, fall back to UTF-8. It happens at least with the Chinese locale, which implies BIG5. This is safe, because on Windows all locales are compatible with UTF-8.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f943dc8fe1377d93253fad9f01e4b0aa8599bbd">http://git.postgresql.org/pg/commitdiff/1f943dc8fe1377d93253fad9f01e4b0aa8599bbd</a></li>

</ul>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Teach pattern_fixed_prefix() about collations. This is necessary, not optional, now that ILIKE and regexes are collation aware --- else we might derive a wrong comparison constant for index optimized pattern matches.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c381a55b0fa1c4ca328211e39df8e1a715129cb">http://git.postgresql.org/pg/commitdiff/3c381a55b0fa1c4ca328211e39df8e1a715129cb</a></li>

<li>Fix RI_Initial_Check to use a COLLATE clause when needed in its query. If the referencing and referenced columns have different collations, the parser will be unable to resolve which collation to use unless it's helped out in this way. The effects are sometimes masked, if we end up using a non-collation-sensitive plan; but if we do use a mergejoin we'll see a failure, as recently noted by Robert Haas. The SQL spec states that the referenced column's collation should be used to resolve RI checks, so that's what we do. Note however that we currently don't append a COLLATE clause when writing a query that examines only the referencing column. If we ever support collations that have varying notions of equality, that will have to be changed. For the moment, though, it's preferable to leave it off so that we can use a normal index on the referencing column.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/921b993677e165607029a52e7f866bbd112345a5">http://git.postgresql.org/pg/commitdiff/921b993677e165607029a52e7f866bbd112345a5</a></li>

<li>Be more wary of missing statistics in eqjoinsel_semi(). In particular, if we don't have real ndistinct estimates for both sides, fall back to assuming that half of the left-hand rows have join partners. This is what was done in 8.2 and 8.3 (cf nulltestsel() in those versions). It's pretty stupid but it won't lead us to think that an antijoin produces no rows out, as seen in recent example from Uwe Schroeder.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f5d2fe3029b181fe773a02f1d4b34624c357634">http://git.postgresql.org/pg/commitdiff/3f5d2fe3029b181fe773a02f1d4b34624c357634</a></li>

<li>Suppress compiler warnings about "value computed is not used". The recent patch to remove gcc 4.6 warnings created some new ones, at least on my rather old gcc version. Try to make everybody happy by casting to "void" when we just want to discard the result.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88543ecfec9c754b5f14b898bccbc68d941748b3">http://git.postgresql.org/pg/commitdiff/88543ecfec9c754b5f14b898bccbc68d941748b3</a></li>

<li>Pass collations to functions in FunctionCallInfoData, not FmgrInfo. Since collation is effectively an argument, not a property of the function, FmgrInfo is really the wrong place for it; and this becomes critical in cases where a cached FmgrInfo is used for varying purposes that might need different collation settings. Fix by passing it in FunctionCallInfoData instead. In particular this allows a clean fix for bug #5970 (record_cmp not working). This requires touching a bit more code than the original method, but nobody ever thought that collations would not be an invasive patch...

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d64713df7e5996ab3ab337b5e0901cf2c53773f9">http://git.postgresql.org/pg/commitdiff/d64713df7e5996ab3ab337b5e0901cf2c53773f9</a></li>

<li>Fix broken pg_dump query. The 8.4 branch failed when talking to 7.0 servers. Per testing requested by Bruce.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2f9219e7053bf2395c50b198379d1073dbc2298">http://git.postgresql.org/pg/commitdiff/a2f9219e7053bf2395c50b198379d1073dbc2298</a></li>

<li>Add some useful cross-references to the CREATE EXTENSION reference page. Per a suggestion from Josh Kupershmidt, though I modified his patch quite a lot.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd95a1d3dd52cb9848d54ab9962156f666c4ca39">http://git.postgresql.org/pg/commitdiff/dd95a1d3dd52cb9848d54ab9962156f666c4ca39</a></li>

<li>Update time zone data files to tzdata release 2011f. DST law changes in Chile, Cuba, Falkland Islands, Morocco, Samoa, Turkey. Historical corrections for South Australia, Alaska, Hawaii.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/170aeb54074ae2e21b22b79d1dd5c665700f7025">http://git.postgresql.org/pg/commitdiff/170aeb54074ae2e21b22b79d1dd5c665700f7025</a></li>

<li>Ensure mark_dummy_rel doesn't create dangling pointers in RelOptInfos. When we are doing GEQO join planning, the current memory context is a short-lived context that will be reset at the end of geqo_eval(). However, the RelOptInfos for base relations are set up before that and then re-used across many GEQO cycles. Hence, any code that modifies a baserel during join planning has to be careful not to put pointers to the short-lived context into the baserel struct. mark_dummy_rel got this wrong, leading to easy-to-reproduce-once-you-know-how crashes in 8.4, as reported off-list by Leo Carson of SDSC. Some improvements made in 9.0 make it difficult to demonstrate the crash in 9.0 or HEAD; but there's no doubt that there's still a risk factor here, so patch all branches that have the function. (Note: 8.3 has a similar function, but it's only applied to joinrels and thus is not a hazard.)

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eca75a12a27d28b972fc269c1c8813cd8eb15441">http://git.postgresql.org/pg/commitdiff/eca75a12a27d28b972fc269c1c8813cd8eb15441</a></li>

<li>Update release notes for releases 9.0.4, 8.4.8, 8.3.15, and 8.2.21.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98eded936c1e81e6af5a4228ba3eb7b6352d6c91">http://git.postgresql.org/pg/commitdiff/98eded936c1e81e6af5a4228ba3eb7b6352d6c91</a></li>

<li>Guard against incoming rowcount estimate of NaN in cost_mergejoin(). Although rowcount estimates really ought not be NaN, a bug elsewhere could perhaps result in that, and that would cause Assert failure in cost_mergejoin, which I believe to be the explanation for bug #5977 from Anton Kuznetsov. Seems like a good idea to expend a couple more cycles to prevent that, even though the real bug is elsewhere. Not back-patching, though, because we don't encourage running production systems with Asserts on.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72826fb362c4aada6d2431df0b706df448806c02">http://git.postgresql.org/pg/commitdiff/72826fb362c4aada6d2431df0b706df448806c02</a></li>

<li>Suppress unused-function warning on non-WIN32 builds.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff5565f0a4aa3c584792d220a3e566369a77f479">http://git.postgresql.org/pg/commitdiff/ff5565f0a4aa3c584792d220a3e566369a77f479</a></li>

<li>Prevent incorrect updates of pg_index while reindexing pg_index itself. The places that attempt to change pg_index.indcheckxmin during a reindexing operation cannot be executed safely if pg_index itself is the subject of the operation. This is the explanation for a couple of recent reports of VACUUM FULL failing with ERROR: duplicate key value violates unique constraint "pg_index_indexrelid_index" DETAIL: Key (indexrelid)=(2678) already exists. However, there isn't any real need to update indcheckxmin in such a situation, if we assume that pg_index can never contain a truly broken HOT chain. This assumption holds if new indexes are never created on it during concurrent operations, which is something we don't consider safe for any system catalog, not just pg_index. Accordingly, modify the code to not manipulate indcheckxmin when reindexing any system catalog. Back-patch to 8.3, where HOT was introduced. The known failure scenarios involve 9.0-style VACUUM FULL, so there might not be any real risk before 9.0, but let's not assume that.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b6106ccfea21e86943f881edcf3cfc03661a415">http://git.postgresql.org/pg/commitdiff/4b6106ccfea21e86943f881edcf3cfc03661a415</a></li>

<li>Clean up collation processing in prepunion.c. This area was a few bricks shy of a load, and badly under-commented too. We have to ensure that the generated targetlist entries for a set-operation node expose the correct collation for each entry, since higher-level processing expects the tlist to reflect the true ordering of the plan's output. This hackery wouldn't be necessary if SortGroupClause carried collation info ... but making it do so would inject more pain in the parser than would be saved here. Still, we might want to rethink that sometime.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/121f49a00e432ee9cfad7270d99504350cd1015f">http://git.postgresql.org/pg/commitdiff/121f49a00e432ee9cfad7270d99504350cd1015f</a></li>

<li>Simplify reindex_relation's API. For what seem entirely historical reasons, a bitmask "flags" argument was recently added to reindex_relation without subsuming its existing boolean argument into that bitmask. This seems a bit bizarre, so fold them together.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d3320d3d256eed7ea3deb8383348f2021e6a247">http://git.postgresql.org/pg/commitdiff/2d3320d3d256eed7ea3deb8383348f2021e6a247</a></li>

<li>Add an Assert that indexam.c isn't used on an index awaiting reindexing. This might have caught the recent embarrassment over trying to modify pg_index while its indexes were being rebuilt. Noah Misch

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2f60a3ab055fb61c8e1056a7c5652f1dec85e00">http://git.postgresql.org/pg/commitdiff/d2f60a3ab055fb61c8e1056a7c5652f1dec85e00</a></li>

<li>foreach() and list_delete() don't mix. Fix crash when releasing duplicate entries in the encoding conversion cache list, caused by releasing the current entry of the list being chased by foreach(). We have a standard idiom for handling such cases, but this loop wasn't using it. This got broken in my recent rewrite of GUC assign hooks. Not sure how I missed this when testing the modified code, but I did. Per report from Peter.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88dc6fa7a164c306d8a1295769edb818d8520a3f">http://git.postgresql.org/pg/commitdiff/88dc6fa7a164c306d8a1295769edb818d8520a3f</a></li>

<li>Support a COLLATE clause in plpgsql variable declarations. This allows the usual rules for assigning a collation to a local variable to be overridden. Per discussion, it seems appropriate to support this rather than forcing all local variables to have the argument-derived collation.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c94732585647437291ec3f4a9902eeffc65a6945">http://git.postgresql.org/pg/commitdiff/c94732585647437291ec3f4a9902eeffc65a6945</a></li>

<li>Add check for matching column collations in ALTER TABLE ... INHERIT. The other DDL operations that create an inheritance relationship were checking for collation match already, but this one got missed. Also fix comments that failed to mention collation checks.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49a642ab1802ea4cd80f9c184e7699219688197f">http://git.postgresql.org/pg/commitdiff/49a642ab1802ea4cd80f9c184e7699219688197f</a></li>

<li>Fix pg_dump to handle collations applied to columns of composite types. CREATE TYPE and ALTER TYPE ADD ATTRIBUTE handle this, so I suppose it's an intended feature, but pg_dump didn't know about it.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acfa1f45ed3ee2144581954c77769056bd149f5c">http://git.postgresql.org/pg/commitdiff/acfa1f45ed3ee2144581954c77769056bd149f5c</a></li>

<li>Document COLLATE option in CREATE TYPE reference page. Curiously, it was already documented in ALTER TYPE ADD ATTRIBUTE, but not here.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d4617126f6d708c5777b378d9ef282fb2c08930">http://git.postgresql.org/pg/commitdiff/2d4617126f6d708c5777b378d9ef282fb2c08930</a></li>

<li>Fix assorted infelicities in collation handling in psql's describe.c. In \d, be more careful to print collation only if it's not the default for the column's data type. Avoid assuming that the name "default" is magic. Fix \d on a composite type so that it will print per-column collations. It's no longer the case that a composite type cannot have modifiers. (In consequence, the expected outputs for composite-type regression tests change.) Fix \dD so that it will print collation for a domain, again only if it's not the same as the base type's collation.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c29abc8b6f5334ac2f7046a33b233776ead12395">http://git.postgresql.org/pg/commitdiff/c29abc8b6f5334ac2f7046a33b233776ead12395</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Clean up most -Wunused-but-set-variable warnings from gcc 4.6. This warning is new in gcc 4.6 and part of -Wall. This patch cleans up most of the noise, but there are some still warnings that are trickier to remove.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5caa3479c2efd31fca1b271db687e5e57c7de2d4">http://git.postgresql.org/pg/commitdiff/5caa3479c2efd31fca1b271db687e5e57c7de2d4</a></li>

<li>Translation updates.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65a188e549a8bf7d0e180d7bbbf6823e77c953bb">http://git.postgresql.org/pg/commitdiff/65a188e549a8bf7d0e180d7bbbf6823e77c953bb</a></li>

<li>Rename pg_regress option --multibyte to --encoding. Also refactor things a little bit so that the same methods for setting test locale and encoding can be used everywhere.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f536d4194293f900577c728bfa4e62075a4c7da0">http://git.postgresql.org/pg/commitdiff/f536d4194293f900577c728bfa4e62075a4c7da0</a></li>

<li>Set client encoding explicitly in plpython_unicode test. This will (hopefully) eliminate the need for the plpython_unicode_0.out expected file.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5809a6458450a59f8c4a7a25beaefc81cff563d1">http://git.postgresql.org/pg/commitdiff/5809a6458450a59f8c4a7a25beaefc81cff563d1</a></li>

</ul>

<p>Andrew Dunstan a poussé&nbsp;:</p>

<ul>

<li>Don't make "replication" magical as a user name, only as a database name, in pg_hba.conf. Per gripe from Josh Berkus. Backported from commit ed557a373c406bbb2a1843544ebbd856ca4cac47.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/290bb9b61c64afdb7b733837c0a00427b58745aa">http://git.postgresql.org/pg/commitdiff/290bb9b61c64afdb7b733837c0a00427b58745aa</a></li>

</ul>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Fix pg_upgrade crash. Fix pg_upgrade crash in 9.0 caused by a new cluster database that doesn't exist in the old cluster; instead throw an error. This was reported to me by EnterpriseDB testing staff. This bug does not exist in git head.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/052e621cc2c25166037fe9fadd3082ae70045fec">http://git.postgresql.org/pg/commitdiff/052e621cc2c25166037fe9fadd3082ae70045fec</a></li>

</ul>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Avoid incorrectly granting replication to roles created with NOSUPERUSER. Andres Freund

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a49c95c734d58385e9c5e335088da1cd54e2344">http://git.postgresql.org/pg/commitdiff/0a49c95c734d58385e9c5e335088da1cd54e2344</a></li>

<li>Fix toast table creation. Instead of using slightly-too-clever heuristics to decide when we must create a TOAST table, just check whether one is needed every time the table is altered. Checking whether a toast table is needed is cheap enough that we needn't worry about doing it on every ALTER TABLE command, and the previous coding is apparently prone to accidental breakage: commit 04e17bae50a73af524731fa11210d5c3f7d8e1f9 broken ALTER TABLE .. SET STORAGE, which moved some actions from AT_PASS_COL_ATTRS to AT_PASS_MISC, and commit 6c5723998594dffa5d47c3cf8c96ccf89c033aae broke ALTER TABLE .. ADD COLUMN by changing the way that adding columns recurses into child tables. Noah Misch, with one comment change by me

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39a68e5c6ca7b41b889e773ca58535324af69630">http://git.postgresql.org/pg/commitdiff/39a68e5c6ca7b41b889e773ca58535324af69630</a></li>

<li>Remove obsolete comment. The lock level for adding a parent table is now ShareUpdateExclusiveLock; see commit fbcf4b92aa64d4577bcf25925b055316b978744a. This comment didn't get updated to match, but it doesn't seem important to mention this detail here, so rather than updating it now, just take it out.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c80b57d0775eb2015b7672fd8b20c63846d2a0d">http://git.postgresql.org/pg/commitdiff/0c80b57d0775eb2015b7672fd8b20c63846d2a0d</a></li>

<li>Advise Debian/Ubuntu users to use openjade1.3. The latest openjade packages for Ubuntu 10.10 seg fault when building our documentation. Josh Berkus

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07e58cbe19d78027eec8fd3e414220903b125c97">http://git.postgresql.org/pg/commitdiff/07e58cbe19d78027eec8fd3e414220903b125c97</a></li>

</ul>

<p>Marc Fournier a poussé&nbsp;:</p>

<ul>

<li>Tag 9.0.4, 8.4.8, 8.3.15, and 8.2.21.</li>

</ul>

<p>Magnus Hagander a poussé&nbsp;:</p>

<ul>

<li>Note that Bison on GnuWin32 has trouble with paths with spaces. Peter Eisentraut

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3affae58b795fb238bed17c35cadcefabdc1f0ee">http://git.postgresql.org/pg/commitdiff/3affae58b795fb238bed17c35cadcefabdc1f0ee</a></li>

<li>Specify which versions of the Platform SDK are supported. Anything including Visual Studio 2010 compilers is not yet supported for building on Windows.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e1526eddd34bf78327a9e7be3db47a60b59b688">http://git.postgresql.org/pg/commitdiff/9e1526eddd34bf78327a9e7be3db47a60b59b688</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Roman Zotov sent in another revision of the patch to turn PREFERRED for type from a boolean to an int2, which allows for an expression of precedence.</li>

<li>Robert Haas sent in a patch to fix a bug in recoveryStopsHere().</li>

<li>Greg Smith sent in a patch to remove some of the magic from running pgindent.</li>

<li>Andrew Dunstan sent in two revisions of a patch to remove pgindent magic in different ways from Greg Smith's.</li>

</ul>