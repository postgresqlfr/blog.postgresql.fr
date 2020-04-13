---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-248 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 22 Avril 2007</strong></p>

<p>Les versions corrigées 8.2.4, 8.1.9, 8.0.13, 7.4.17 et

7.3.19 sont sorties (détails <a href="http://www.postgresql.org/about/news.791">ici (en)</a>). A vos

mises à jour...</p>

<!--more-->


<strong>Les nouveautés des produits

dérivés</strong>

<ul>

<li>PgBouncer 1.0.7 est sorti : <a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a></li>

<li>pgpool-II est en instance d'inclusion dans Fedora Core et EPEL

(Devrim GUNDUZ)</li>

<li>PL/Proxy 2.0.2 est sorti : <a target="_blank" href="http://pgfoundry.org/projects/plproxy/">http://pgfoundry.org/projects/plproxy/</a></li>

<li>Skytools 2.1.4 est sorti : <a target="_blank" href="http://pgfoundry.org/projects/skytools/">http://pgfoundry.org/projects/skytools/</a></li>

</ul>

<p><strong>PostgreSQL Jobs d'avril</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>Pour PgDay, c'est par là : <a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a></p>

<p>Les souscriptions sont ouvertes pour PGCon 2007 <a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et nouveaux articles : <a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News vous est présenté cette

semaine par David Fetter et Devrim GUNDUZ. Adaptation francophone

de Stéphane Schildknecht, Guillaume de Rorthais,

Cédric Villemain...</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant

dimanche minuit à david@fetter.org. Les propositions en

allemand peuvent être envoyées à

pwn@pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Andrew Dunstan a commité :</p>

<ul>

<li>Document new -with-libxslt build option.</li>

</ul>

<p>Peter Eisentraut a commité :</p>

<ul>

<li>In pgsql/contrib/uuid-ossp/uuid-ossp.sql.in, make some

functions immutable. Thanks, Marko Kreen</li>

<li>Fix typo in contrib/uuid-ossp/README.uuid-ossp.</li>

<li>Joachim Wieland's patch to make configuration parameters fall

back to their default values when they are removed from the

configuration file.</li>

<li>Fix alignment of help output.</li>

<li>A new contrib module uuid-ossp for generating UUID values using

the OSSP UUID library. New configure option --with-ossp-uuid to

activate.</li>

<li>Documentation for UUID type.</li>

<li>Translation updates.</li>

</ul>

<p>Bruce Momjian a commité :</p>

<ul>

<li>Mark TODO as done: "Allow commenting of variables in

postgresql.conf to restore them."</li>

<li>Add comment on why deadlock detection error messages only

prints numbers.</li>

<li>Add script major_release_split to simplify creating release

notes for multiple releases.</li>

<li>Add mention of checking &lt;link&gt; behavior of HISTORY.html

to release checklist.</li>

<li>Remove duplicate text in FAQ, per Magnus Hagander.</li>

<li>Release wording updates for releases 8.2.4, 8.1.9, 8.0.13,

7.4.17, 7.3.19.</li>

<li>Update FAQ to mention most recent release for releases 8.2.4,

8.1.9, 8.0.13, 7.4.17, 7.3.19.</li>

<li>Stamp releases 8.2.4, 8.1.9, 8.0.13, 7.4.17, 7.3.19.</li>

<li>Update FAQ for 8.2.4.</li>

<li>Release note updates for 8.2.4, 8.1.9, 8.0.13, 7.4.17,

7.3.19.</li>

<li>Remove tabs from SGML source files.</li>

<li>Item not done, per Pavel.</li>

<li>Update docs/error message for CSV quote/escape --- must be

ASCII. Backpatch doc change to 8.2.X.</li>

<li>Update error message for COPY with a multi-byte delimiter.</li>

<li>Document that the COPY delimiter must be an ASCII byte, rather

than a multi-byte value. It can also be a single-byte encoded

character if the client and server versions match. Backpatch to

8.2.X.</li>

<li>Mark !PL/PgSQL? TODO sub-item as done: "Add support for WITH

HOLD and SCROLL cursors."</li>

<li>Mark !PL/PgSQL? TODO sub-item as done: "Add MOVE to

cursors"</li>

<li>Add warning about TODO item.</li>

<li>Change TODO from easy to not, per Alvaro Herrera: "Set proper

permissions on non-system schemas during db creation."</li>

</ul>

<p>Magnus Hagander a commité :</p>

<ul>

<li>Joachim Wieland's patch to fix the build for directories with

spaces in them by quoting properly.</li>

<li>Don't try to build uuid-ossp on msvc.</li>

<li>Enable building of 64-bit libpq using visual studio 8 and the

win32.mak file. Enable building with kerberos support using the

win32.mak file. Patch by Hiroshi Saito and Magnus Hagander.</li>

<li>Change default build to release, to be consistent with unix

build. Make it possible to set the default from builenv.bat. Per

request from Dave Page.</li>

<li>Silence mingw compiler warning.</li>

<li>Merlin Moncure's patch which prevents psql from writing timing

output in quiet mode.</li>

<li>Enable IPV6 for all MSVC builds, including the VC6 libpq-only

build. Per request from Hiroshi Saito.</li>

</ul>

<p>Alvaro Herrera a commité :</p>

<ul>

<li>Silence compiler warnings, per Bruce.</li>

<li>Enable configurable log of autovacuum actions. Initial patch

from Simon Riggs, additional code and docs by me. Per

discussion.</li>

<li>Add a multi-worker capability to autovacuum. This allows

multiple worker processes to be running simultaneously. Also, now

autovacuum processes do not count towards the max_connections

limit; they are counted separately from regular processes, and are

limited by the new GUC variable autovacuum_max_workers. The

launcher now has intelligence to launch workers on each database

every autovacuum_naptime seconds, limited only on the max amount of

worker slots available. Also, the global worker I/O utilization is

limited by the vacuum cost-based delay feature. Workers are

"balanced" so that the total I/O consumption does not exceed the

established limit. This part of the patch was contributed by

ITAGAKI Takahiro.</li>

</ul>

<p>Tom Lane a commité :</p>

<ul>

<li>Remove some of the most blatant brain-fade in the recent guc

patch (it's so nice to have a buildfarm member that actively

rejects naked uses of strcasecmp). This coding is still pretty

awful, though, since it's going to be O(N^2) in the number of guc

variables. May I direct your attention to bsearch?</li>

<li>Some further performance tweaks for planning large inheritance

trees that are mostly excluded by constraints: do the CE test a bit

earlier to save some adjust_appendrel_attrs() work on excluded

children, and arrange to use array indexing rather than rt_fetch()

to fetch RTEs in the main body of the planner. The latter is

something I'd wanted to do for awhile anyway, but seeing

list_nth_cell() as 35% of the runtime gets one's attention.</li>

<li>Avoid useless work during set_plain_rel_pathlist() when the

relation will be excluded by constraint exclusion anyway. Greg

Stark.</li>

<li>Tweak make_inh_translation_lists() to check the common case

wherein parent and child attnums are the same, before it grovels

through each and every child column looking for a name match. Saves

some time in large inheritance trees, per example from Greg

Stark.</li>

<li>Improve the way in which CatalogCacheComputeHashValue combines

multiple key values: don't throw away perfectly good hash bits, and

increase the shift distances so as to provide more separation in

the common case where some of the key values are small integers

(and so their hashes are too, because hashfunc.c doesn't try all

that hard). This reduces the runtime of SearchCatCache by a factor

of 4 in an example provided by Greg Stark, in which the planner

spends a whole lot of time searching the two-key STATRELATT cache.

It seems unlikely to hurt in other cases, but maybe we could do

even better?</li>

<li>Adjust pgstat_initstats() to avoid repeated searches of the

TabStat arrays when a relation is opened multiple times in the same

transaction. This is particularly useful for system catalogs, which

we may heap_open or index_open many times in a transaction, and it

doesn't really cost anything extra even if the rel is touched but

once. Motivated by study of an example from Greg Stark, in which

pgstat_initstats() accounted for an unreasonably large fraction of

the runtime.</li>

<li>Tweak set_rel_width() to avoid redundant executions of

getrelid(). In very large queries this accounts for a noticeable

fraction of planning time. Per an example from Greg Stark.</li>

<li>Sync timezone data with 2007e zic release.</li>

<li>Fix missed PACKAGE_STRING.</li>

<li>Fix plpgsql to avoid reference to already-freed memory when

returning a pass-by-reference data type and the RETURN statement is

within an EXCEPTION block. Bug introduced by my fix of 2007-01-28

to use per-subtransaction ExprContexts/EStates; since that wasn't

back-patched into older branches, only 8.2 and HEAD are affected.

Per report from Gary Winslow.</li>

<li>Cancel pending fsync requests during WAL replay of DROP

DATABASE, per bug report from David Darville. Back-patch as far as

8.1, which may or may not have the problem but it seems a safe

change anyway.</li>

<li>Fix condition for whether end_heap_rewrite must fsync, per

Heikki Linnakangas.</li>

<li>Don't assume rd_smgr stays open across all of a rewriteheap

operation; doing so can result in crash if an sinval reset occurs

meanwhile. I believe this explains intermittent buildfarm failures

in cluster test.</li>

<li>Rewrite choose_bitmap_and() to make it more robust in the

presence of competing alternatives for indexes to use in a bitmap

scan. The former coding took estimated selectivity as an overriding

factor, causing it to sometimes choose indexes that were much

slower to scan than ones with a slightly worse selectivity. It was

also too narrow-minded about which combinations of indexes to

consider ANDing. The rewrite makes it pay more attention to index

scan cost than selectivity; this seems sane since it's impossible

to have very bad selectivity with low cost, whereas the reverse

isn't true. Also, we now consider each index alone, as well as

adding each index to an AND-group led by each prior index, for a

total of about O(N^2) rather than O(N) combinations considered.

This makes the results much less dependent on the exact order in

which the indexes are considered. It's still a lot cheaper than an

O(2^N) exhaustive search. A prefilter step eliminates all but the

cheapest of those indexes using the same set of WHERE conditions,

to keep the effective value of N down in scenarios where the DBA

has created lots of partially-redundant indexes.</li>

<li>Fix erroneous column counts in some documentation tables. Brian

Gough.</li>

<li>Temporarily re-add derived files, in hopes of straightening out

their CVS status. And remove 'em again ...</li>

<li>Tweak clean_encoding_name() API to avoid need to cast away

const. Kris Jurka</li>

<li>Fix pg_dump to not crash if -t or a similar switch is used to

select a serial sequence for dumping without also selecting its

owning table. Make it not try to emit ALTER SEQUENCE OWNED BY in

this situation. Per report from Michael Nolan.</li>

<li>Make plancache store cursor options so it can pass them to

planner during a replan. I had originally thought this was not

necessary, but the new SPI facilities create a path whereby queries

planned with non-default options can get into the cache, so it is

necessary.</li>

<li>Support scrollable cursors (ie, 'direction' clause in FETCH) in

plpgsql. Pavel Stehule, reworked a bit by Tom.</li>

<li>Expose more cursor-related functionality in SPI: specifically,

allow access to the planner's cursor-related planning options, and

provide new FETCH/MOVE routines that allow access to the full power

of those commands. Small refactoring of planner(), pg_plan_query(),

and pg_plan_queries() APIs to make it convenient to pass the

planning options down from SPI. This is the core-code portion of

Pavel Stehule's patch for scrollable cursor support in plpgsql;

I'll review and apply the plpgsql changes separately.</li>

</ul>

<p><strong>Correctifs rejetés (à ce

jour)</strong></p>

<p>Pas de déception cette semaine :-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro a envoyé un patch qui supprime certains

avertissements avec MingW.</li>

<li>Kris Jurka a envoyé un patch qui supprime un

avertissement à propos d'une constante dans

src/backend/utils/mb/encnames.c</li>

<li>Arul Shaji a proposé une nouvelle version de son

implémentation permettant de COPYé des sorties de

logs au format csv.</li>

<li>ITAGAKI Takahiro a proposé une autre version de son

patch de vérification de répartition de charge.</li>

<li>Heikki Linnakangas a envoyé un patch qui

réconcilie son précédent "HOT" patch avec les

MVCC-safe CLUSTER.</li>

<li>Pavel Stehule a envoyé un patch amélioré

qui ajoute MOVE à !PL/PgSQL? .</li>

<li>Guillaume Lelarge a envoyé un patch de documentation qui

explique pourquoi stats_row_level doit être activé si

l'utilisateur veut pouvoir obtenir la durée

d'exécution du dernier vacuum/analyze.</li>

</ul>