---
layout: post
title: "Nouvelles neuves de PG"
author: "NBougain"
redirect_from: "index.php?post/drupal-409 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 9 Septembre 2007</strong></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Another PostgreSQL Diff Tool 1.0.0_beta26 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/apgdiff/">http://pgfoundry.org/projects/apgdiff/</a></li>

<li>PSQL-Query 0.01 est disponible&nbsp;:

<a target="_blank" href="http://search.cpan.org/%7Eecarroll/PSQL-Query-0.01_01/bin/psql-plus">http://search.cpan.org/~ecarroll/PSQL-Query-0.01_01/bin/psql-plus</a></li>

<li>OpenMFG 2.2 et PostBooks 2.2 ont été publiés&nbsp;:

<a target="_blank" href="http://www.xtuple.com/">http://www.xtuple.com/</a></li>

</ul>

<!--more-->


<!--break-->

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PostgreSQL Conference Fall 2007 aura lieu le 20 octobre à l'Université d'État de Portland (Oregon, USA)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Il y aura une réunion PostgreSQL pendant l'Ohio Linuxfest le 29 septembre, et Robert Treat fera une petite conférence sur les nouveautés de la 8.3&nbsp;:

<a target="_blank" href="http://www.ohiolinux.org/speakers.html#talk1_06">http://www.ohiolinux.org/speakers.html#talk1_06</a></li>

<li>Le SFPUG accueillera Fred Moyer lors du Big Blue Ball of Mud, le 11 septembre à 19:30&nbsp;:

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/6143101/">http://postgresql.meetup.com/1/calendar/6143101/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Improve page split in rtree emulation. Now when a split result has a big misalignement, it tries to split page basing on distribution of box's centers. Per report from Tom Dolafi.</li>

<li>Fix infinite loop in rank_cd for some corner queries. Per Daniele Varrazzo.</li>

<li>Improvements from Heikki Linnakangas.</li>

<li>Improve various checks by Heikki Linnakangas.</li>

<li>Refactor of tsearch code by Heikki Linnakangas with small editorization by me.</li>

<li>Add turkish stopword list. Thanks to Devrim GUNDUZ.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add Hash thread URL to TODO: "<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-09/msg00051.php">http://archives.postgresql.org/pgsql-hackers/2007-09/msg00051.php</a>"</li>

<li>Mark TODO as DONE: "Reduce XID consumption of read-only queries."</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Fix typo in regression Makefile.</li>

<li>Provide for a file specifying non-standard config options for temp install for pg_regress, via --temp-config option. Pick this up in the make file via TEMP_CONFIG setting.</li>

<li>Provide for binary input/output of enums, to fix complaint from Merlin Moncure. This just provides text values, we're not exposing the underlying Oid representation. Catalog version bumped.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg, synced parser and keyword list.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Set the correct context (PGC_SIGHUP) for log_autovacuum, per ITAGAKI Takahiro. Fix grammatical errors in its description.</li>

<li>Code review for GUC revert-values-if-removed-from-postgresql.conf patch; and in passing, fix some bogosities dating from the custom_variable_classes patch. Fix guc-file.l to correctly check changes in custom_variable_classes that are attempted concurrently with additions/removals of custom variables, and don't allow the new setting to be applied in advance of checking it. Clean up messy and undocumented situation for string variables with NULL boot_val. Fix DefineCustomVariable functions to initialize boot_val correctly. Prevent find_option from inserting bogus placeholders for custom variables that are simply inquired about rather than being set.</li>

<li>Replace the former method of determining snapshot xmax --- to wit, calling ReadNewTransactionId from GetSnapshotData --- with a "latestCompletedXid" variable that is updated during transaction commit or abort. Since latestCompletedXid is written only in places that had to lock ProcArrayLock exclusively anyway, and is read only in places that had to lock ProcArrayLock shared anyway, it adds no new locking requirements to the system despite being cluster-wide. Moreover, removing ReadNewTransactionId from snapshot acquisition eliminates the need to take both XidGenLock and ProcArrayLock at the same time. Since XidGenLock is sometimes held across I/O this can be a significant win. Some preliminary benchmarking suggested that this patch has no effect on average throughput but can significantly improve the worst-case transaction times seen in pgbench. Concept by Florian Pflug, implementation by Tom Lane.</li>

<li>Don't take ProcArrayLock while exiting a transaction that has no XID; there is no need for serialization against snapshot-taking because the xact doesn't affect anyone else's snapshot anyway. Per discussion. Also, move various info about the interlocking of transactions and snapshots out of code comments and into a hopefully-more-cohesive discussion in access/transam/README. Also, remove a couple of now-obsolete comments about having to force some WAL to be written to persuade RecordTransactionCommit to do its thing.</li>

<li>Allow CREATE INDEX CONCURRENTLY to disregard transactions in other databases, per gripe from hubert depesz lubaczewski. Patch from Simon Riggs.</li>

<li>Make eval_const_expressions() preserve typmod when simplifying something like null::char(3) to a simple Const node. (It already worked for non-null values, but not when we skipped evaluation of a strict coercion function.) This prevents loss of typmod knowledge in situations such as exhibited in bug #3598. Unfortunately there seems no good way to fix that bug in 8.1 and 8.2, because they simply don't carry a typmod for a plain Const node. In passing I made all the other callers of makeNullConst supply "real" typmod values too, though I think it probably doesn't matter anywhere else.</li>

<li>Volatile-qualify the ProcArray PGPROC pointer in a bunch of routines that examine fields that could change under them. This is just to make really sure that when we are fetching a value 'only once', that's what actually happens. Possibly this is a bug that should be back-patched, but in the absence of solid evidence that it's needed, I won't bother.</li>

<li>Quick hack to make the VXID of a prepared transaction be -1/XID, so that different prepared xacts can be told apart in the pg_locks view. Per suggestion from Florian.</li>

<li>Implement lazy XID allocation: transactions that do not modify any database rows will normally never obtain an XID at all. We already did things this way for subtransactions, but this patch extends the concept to top-level transactions. In applications where there are lots of short read-only transactions, this should improve performance noticeably; not so much from removal of the actual XID-assignments, as from reduction of overhead that's driven by the rate of XID consumption. We add a concept of a "virtual transaction ID" so that active transactions can be uniquely identified even if they don't have a regular XID. This is a much lighter-weight concept: uniqueness of VXIDs is only guaranteed over the short term, and no on-disk record is made about them. Florian Pflug, with some editorialization by Tom.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, sync examples of psql \dF output with current CVS HEAD behavior. Random other wordsmithing.</li>

<li>Support SET FROM CURRENT in CREATE/ALTER FUNCTION, ALTER DATABASE, ALTER ROLE. (Actually, it works as a plain statement too, but I didn't document that because it seems a bit useless.) Unify VariableResetStmt with VariableSetStmt, and clean up some ancient cruft in the representation of same.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in a document update to version 14 of the HOT patch.</li>

<li>Heikki Linnakangas sent in a refactor for the tsearch2 code.</li>

<li>Pavan Deolasee sent in version 15 of the HOT patch.</li>

<li>Andrew Dunstan sent in a patch which adds temp_config configuration.</li>

<li>Greg Smith sent in a patch which does just-in-time background writing.</li>

<li>Tom Lane sent in a WIP patch for latestCompletedXid method of computing snapshot xmax.</li>

<li>Andrew Dunstan sent in a WIP patch to replace MSVC build scripts build.bat and vcregress.bat with build.pl and vcregress.pl respectively.</li>

<li>Sibte Abbas sent in a patch which implements the \# TODO for psql.</li>

</ul>