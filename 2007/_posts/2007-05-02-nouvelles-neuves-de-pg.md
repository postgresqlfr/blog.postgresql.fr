---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-250 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 29 Avril 2007</strong></p>

<p>Les versions corrigées 8.2.4, 8.1.9, 8.0.13, 7.4.17 et 7.3.19 sont sorties (détails <a href="http://www.postgresql.org/about/news.791">ici (en)</a>). A vos mises à jour...</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>EnterpriseDB 8.2 est sorti :

<a target="_blank" href="http://www.enterprisedb.com/news_events/press_releases/04_23_07.do">

http://www.enterprisedb.com/news_events/press_releases/04_23_07.do</a></li>

<li>Un dictionnaire italien avec recherche full-text a été publié sous licence GPL :

<a target="_blank" href="http://www.develer.com/%7Epiro/ispell-italian/italian-fts.html">http://www.develer.com/~piro/ispell-italian/italian-fts.html</a></li>

<li>Continuent Uni/Cluster pour PostgreSQL 2007 est arrivé :

<a target="_blank" href="http://www.continuent.com/index.php?option=com_content&amp;task=view&amp;id=212&amp;Itemid=169">

http://www.continuent.com/index.php?option=com_content&amp;task=view&amp;id=212&amp;Itemid=169</a></li>

</ul>

<p><strong>PostgreSQL Jobs d'avril</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>En route pour le PgDay ! <a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a></p>

<p>Les inscriptions pour la PGCon 2007 sont ouvertes <a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL: <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives and occasional new articles: <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News vous est présenté cette semaine par David Fetter. Adaptation francophone de ...</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Michael Meskes committed:</p>

<ul>

<li>Removed non-existant function from extern.h</li>

<li>Inlined two functions to get rid of va_list problems on some archs.</li>

</ul>

<p>Tom Lane committed:</p>

<ul>

<li>Implement rate-limiting logic on how often backends will attempt to send messages to the stats collector. This avoids the problem that enabling stats_row_level for autovacuum has a significant overhead for short read-only transactions, as noted by Arjen van der Meijden. We can  void an extra gettimeofday call by piggybacking on the one done for WAL-logging xact commit or abort (although that doesn't help read-only transactions, since they don't WAL-log anything). In my proposal for this, I noted that we could change the WAL log entries for commit/abort to record full TimestampTz precision, instead of only time_t as at present. That's not done in this patch, but will be committed separately.</li>

<li>Marginal performance hack: use a dedicated routine instead of copyObject to copy nodes that are known to be Vars during plan reference adjustment. Saves useless memzero operation as well as the big switch in copyObject.</li>

<li>Marginal performance hack: avoid unnecessary work in expression_tree_mutator. We can just palloc, instead of using makeNode, when we are going to overwrite the whole node anyway in the FLATCOPY macro. Also, use FLATCOPY instead of copyObject for common node types Var and Const.</li>

<li>Marginal performance hack: remove the loop that used to be needed to look through a freelist for a chunk of adequate size. For a long time now, all elements of a given freelist have been exactly the same allocated size, so we don't need a loop. Since the loop never iterated more than once, you'd think this wouldn't matter much, but it makes a noticeable savings in a simple test --- perhaps because the compiler isn't optimizing on a mistaken assumption that the loop would repeat. AllocSetAlloc is called often enough that saving even a couple of instructions is worthwhile.</li>

<li>Modify processing of DECLARE CURSOR and EXPLAIN so that they can resolve the types of unspecified parameters when submitted via extended query protocol. This worked in 8.2 but I had broken it during plancache changes. DECLARE CURSOR is now treated almost exactly like a plain SELECT through parse analysis, rewrite, and planning; only just before sending to the executor do we divert it away to ProcessUtility. This requires a special-case check in a number of places, but practically all of them were already special-casing SELECT INTO, so it's not too ugly. (Maybe it would be a good idea to merge the two by treating IntoClause as a form of utility statement? Not going to worry about that now, though.) That approach doesn't work for EXPLAIN, however, so for that I punted and used a klugy solution of running parse analysis an extra time if under extended query protocol.</li>

<li>Fix dynahash.c to suppress hash bucket splits while a hash_seq_search() scan is in progress on the same hashtable. This seems the least invasive way to fix the recently-recognized problem that a split could cause the scan to visit entries twice or (with much lower probability) miss them entirely. The only field-reported problem caused by this is the "failed to re-find shared lock object" PANIC in COMMIT PREPARED reported by Michel Dorochevsky, which was caused by multiply visited entries. However, it seems certain that mdsync() is vulnerable to missing required  sync's due to missed entries, and I am fearful that RelationCacheInitializePhase2() might be at risk as well. Because of that and the generalized  azard presented by this bug, back-patch all the supported branches. Along the way, fix pg_prepared_statement() and pg_cursor() to not assume that  he hashtables they are examining will stay static between calls. This is risky regardless of the newly noted dynahash problem, because hash_seq_search() has never promised to cope with deletion of table entries other than the just-returned one. There may be no bug here because the only supported way to call these functions is via ExecMakeTableFunctionResult() which will cycle them to completion before doing anything very  nteresting, but it seems best to get rid of the assumption. This affects 8.2 and HEAD only, since those functions weren't there earlier.</li>

<li>Support explicit placement of the temporary-table schema within search_path. This is needed to allow a security-definer function to set a  ruly secure value of search_path. Without it, a malicious user can use temporary objects to execute code with the privileges of the  ecurity-definer function. Even pushing the temp schema to the back of the search path is not quite good enough, because a function or operator at  he back of the path might still capture control from one nearer the front due to having a more exact datatype match. Hence, disable searching the  emp schema altogether for functions and operators. Security: CVE-2007-2138</li>

</ul>

<p>Bruce Momjian committed:</p>

<ul>

<li>Update TODO, change version number, "Make standard_conforming_strings the default in 8.4?"</li>

<li>In TODO, mark "PL/PgSQL <a target="_blank" href="http://example.com/new.php?page=PgSQL">http://example.com/new.php?page=PgSQL</a> MOVE" as done.</li>

<li>Remove tabs from installation.sgml.</li>

<li>Jun Kuwamura's update to the Japanese FAQs.</li>

<li>Fix typo in FAQ.</li>

<li>Update FAQ item on upgrades.</li>

</ul>

<p>Magnus Hagander committed:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, properly set MODULE_PATHNAME based on module name instead of incorrectly based on directory name. Fixes  he generation of .sql files in contrib/spi. Per complaint from Dave Page.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, libpgtypes is a client lib, should not link with backend.</li>

<li>In pgsql/src/tools/msvc/Solution.pm, generate "fake configure output" for pg_config, so that external builds like Slony can figure out which options were enabled in the build.</li>

<li>Dave Page's patch to install libpgport.lib as needed by some client programs.</li>

<li>Dave Page's patch to install headers in the same directory structure as Mingw.</li>

<li>In pgsql/src/backend/port/win32_sema.c, set maximum semaphore count to 32767 instead of 1. Fixes errorcode 298 when unlocking a semaphore more than once. Back-patched to 8.2. Per report from Marcin Waldowski.</li>

<li>In pgsql/src/tools/msvc/Install.pm, don't try to install uuid-ossp since we don't build it. Per buildfarm member mastodon.</li>

</ul>

<p>Neil Conway committed:</p>

<ul>

<li>Support for MOVE in !PL/PgSQL <a target="_blank" href="http://example.com/new.php?page=PgSQL">http://example.com/new.php?page=PgSQL</a>. Initial patch from Magnus, some improvements by Pavel Stehule, and reviewed by Neil Conway.</li>

<li>Add support for IN as alternative to FROM in !PL/PgSQL <a target="_blank" href="http://example.com/new.php?page=PgSQL">http://example.com/new.php?page=PgSQL</a>'s FETCH statement, for consistency with the backend's FETCH command. Patch from Pavel Stehule, reviewed by Neil Conway.</li>

<li>Remove no-longer-true statement from the docs. Since the default config now enables row-level stats, the out of the box stats volume is no longer particularly low.</li>

<li>Another tweak for tab completion of CREATE TEMP. Instead of only completing CREATE { TEMP | TEMPORARY } TABLE, we should also suggest VIEW and SEQUENCE. Per Greg Sabino Mullane.</li>

<li>Consistency tweaks for a table in the SGML docs: we don't terminate table entries describing functions with periods.</li>

<li>Minor enhancement to psql tab completion. If we see "CREATE TEMPORARY", we can complete "TABLE". The previous coding only looked for "CREATE TEMP". Note that I didn't add TEMPORARY to the list of suggested completions after we've seen "CREATE", since TEMP is equivalent and more concise. But if the user has already manually typed TEMPORARY, we may as well complete TABLE for them.</li>

<li>Minor tweak for DISCARD ref page.</li>

<li>Rename the newly-added commands for discarding session state. RESET SESSION, RESET PLANS, and RESET TEMP are now DISCARD ALL, DISCARD PLANS,  nd DISCARD TEMP, respectively. This is to avoid confusion with the pre-existing RESET variants: the DISCARD commands are not actually similar to RESET. Patch from Marko Kreen, with some minor editorialization.</li>

<li>Minor consistency tweak for SGML docs.</li>

<li>Fix newly-introduced documentation typo in pgsql/doc/src/sgml/ref/create_function.sgml</li>

<li>Heikki Linnakangas's patch which fixes LOCK_DEBUG compilation in the 8.2 branch; HEAD was fixed earlier.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Aucune déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Theo Schlossnagle sent in a patch to correct PL/Perl's handling of bytea input types.</li>

<li>ITAGAKI Takahiro sent in version 4.1 of his Load Distributed Checkpoint patch.</li>

<li>ITAGAKI Takahiro sent in a patch to fix autovacuum startup.</li>

<li>Gregory Stark sent in another revision of his SORT/LIMIT optimization.</li>

<li>Neil Conway sent in a patch to allow hashing NUMERICs.</li>

</ul>