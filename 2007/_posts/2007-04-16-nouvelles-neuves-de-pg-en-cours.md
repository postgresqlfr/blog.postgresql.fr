---
layout: post
title: "Nouvelles neuves de PG (en cours)"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/247"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 15 avril 2007</strong></p>

<p>

De nombreuses discussions pendant la courte (nous l'espérons) préiode d'après gel des fonctionnalités. </p>

<!--more-->


<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>

PgBouncer 1.0.6 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a>

</li>

<li>

PostgreSQL PHP Generator réalisé&nbsp;:

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/phpgenerator/">http://www.sqlmaestro.com/products/postgresql/phpgenerator/</a>

</li>

<li>

Skytools 2.1.3 dans les bacs&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/skytools/">http://pgfoundry.org/projects/skytools/</a>

</li>

</ul>

<p><strong>PostgreSQL Jobs d'Avril</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-04/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

Pour PgDay, c'est par là&nbsp;!

<a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a>

</p>

<p>

Les souscriptions sont ouvertes pour PGCon 2007&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et nouveaux articles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p><em>

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter.

Adaptation francophone de Stéphane Schildknecht, Guillaume de Rorthais, Cédric Villemain...

</em></p>

<p>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tatsuo Ishii a commité&nbsp;:</p>

<ul>

<li>

Make JOHAB a client-only encoding per discussions in pgsql-hackers "Server-side support of all encodings" around 2007/3/26. initdb required&nbsp;;</li>

<li>

Fix description how to create conversion function.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>

Add --with-libxslt configure option&nbsp;;</li>

<li>

Revert change to build xml2 until a better fix is found&nbsp;;</li>

<li>

Enable building contrib/xml2 if configured using --with-libxml. If this breaks things due to missing libxslt, then I'll have to revert it, but let's see if it breaks the buildfarm.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>

Minor fixes for the EXPLAIN reference page. Mention the fact that EXPLAIN ANALYZE can sometimes be significantly slower than running the same query normally, and make some minor markup improvements&nbsp;;</li>

<li>

Fixes for RESET SESSION patch, per Alvaro. Fix a typo in the RESET ref page (sorry, my fault!), and simplify the coding of ResetTempTableNamespace()&nbsp;;</li>

<li>

RESET SESSION, plus related new DDL commands. Patch from Marko Kreen, reviewed by Neil Conway. This patch adds the following DDL command variants: RESET SESSION, RESET TEMP, RESET PLANS, CLOSE ALL, and DEALLOCATE ALL. RESET SESSION is intended for use by connection pool software and the like, in order to reset a client session to something close to its initial state. Note that while most of these command variants can be executed inside a transaction block (but are not transaction-aware!), RESET SESSION cannot. While this is inconsistent, it is intended to catch programmer mistakes: RESET SESSION in an open transaction block is probably unintended.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>

ITAGAKI Takahiro's patch to allow \timing in psql to have a better resolution than ~15ms on Windows&nbsp;;</li>

<li>

ITAGAKI Takahiro's patch to Add O_DIRECT support on Windows&nbsp;;</li>

<li>

Install debugger symbols (in their own directory) </li>

<li>

Enable IPV6 when building with MSVC&nbsp;;</li>

<li>

Add cancel handlers so it's possible to Ctrl-C clusterdb, reindexdb and vacuumdb. ITAGAKI Takahiro, with minor fixes from me.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>

Avoid running build_index_pathkeys() in situations where there cannot possibly be any useful pathkeys --- to wit, queries with neither any join clauses nor any ORDER BY request. It's nearly free to check for this case and it saves a useful fraction of the planning time for simple queries&nbsp;;</li>

<li>

Rearrange mdsync() looping logic to avoid the problem that a sufficiently fast flow of new fsync requests can prevent mdsync() from ever completing. This was an unforeseen consequence of a patch added in Mar 2006 to prevent the fsync request queue from overflowing. Problem identified by Heikki Linnakangas and independently by ITAGAKI Takahiro; fix based on ideas from Takahiro-san, Heikki, and Tom. Back-patch as far as 8.1 because a previous back-patch introduced the problem into 8.1 ..&nbsp;;</li>

<li>

Code review for btree page split WAL reduction patch. Make it actually work (original code *always* created a full-page image for the left page, thus leaving the intended savings unrealized), avoid risk of not having enough room on the page during xlog restore, squeeze out another couple bytes in the xlog record, clean up neglected comments&nbsp;;</li>

<li>

Minor tweaking of index special-space definitions so that the various index types can be reliably distinguished by examining the special space on an index page. Per my earlier proposal, plus the realization that there's no need for btree's vacuum cycle ID to cycle through every possible 16-bit value. Restricting its range a little costs nearly nothing and eliminates the possibility of collisions. Memo to self: remember to make bitmap indexes play along with this scheme, assuming that patch ever gets accepted.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>

Update TODO: "Consider reducing on-disk varlena length from four bytes to two because a heap row cannot be more than 64k in length." </li>

<li>

Update Win32 FAQ HTML version to match corrected text version&nbsp;;</li>

<li>

Mark TODO as done "Add RESET SESSION command to reset all session state." </li>

<li>

Update TODO text, per Gregory Stark: "Allow single-byte header storage for array elements." </li>

<li>

Add to TODO: "Allow single-byte header storage for arrays." </li>

<li>

Add to TODO: "Have WITH CONSTRAINTS also create constraint indexes." </li>

<li>

Add URL for TODO: "Simplify ability to create partitioned tables." </li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>

Fix spelling: SYMETRIC -&gt; SYMMETRIC in 8.1 docs. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>

No one was disappointed this week :-) </li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Nikolay Samokhvalov sent in a new revision of his patch to implement xpath_array with namespaces&nbsp;;</li>

<li>

Tom Lane sent in a patch intended to fix the mdsync never-ending loop problem&nbsp;;</li>

<li>

Alvaro Herrera sent in version 6 of his autovacuum multiworkers patch&nbsp;;</li>

<li>

Pavan Deolasee sent in a new version of his CREATE INDEX CONCURRENTLY patch&nbsp;;</li>

<li>

Nikhils sent in a patch to allow UPDATE to use subselects&nbsp;;</li>

<li>

Merlin Moncure sent in a patch to suppress psql timing output in quiet mode&nbsp;;</li>

<li>

Alvaro Herrera sent in version 9 of his autovacuum multiworkers patch&nbsp;;</li>

<li>

Tom Lane sent in a patch intended to fix the choose_bitmap_and problem reported by Steve Conley.</li>

</ul>