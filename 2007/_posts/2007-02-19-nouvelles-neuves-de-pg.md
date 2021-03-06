---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/238"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 18 février 2007</strong></p>

<p>

PostgreSQL offre une meilleure extensibilité à la version 3.4 du programme australien open source de comptabilité SYMBOL&nbsp;:

<a target="_blank" href="http://www.pcworld.idg.com.au/index.php/id;1504289875">http://www.pcworld.idg.com.au/index.php/id;1504289875</a>

</p>

<p>

L'IGN, Institut Géographique National, a choisi PostgreSQL et PostGIS pour son extensibilité, sa vitesse et son intégrité transactionnelle.

<a target="_blank" href="http://postgis.refractions.net/documentation/casestudies/ign/">http://postgis.refractions.net/documentation/casestudies/ign/</a>

</p>

<!--more-->


<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>

pgmemcache 1.1 réalisé. Les développements à venir sont financés par Opten Technology Group, Inc.

<a target="_blank" href="http://pgfoundry.org/projects/pgmemcache/">http://pgfoundry.org/projects/pgmemcache/</a>

</li>

<li>

pgchem::tigress 7.0 réalisé.

<a target="_blank" href="http://pgfoundry.org/projects/pgchem/">http://pgfoundry.org/projects/pgchem/</a>

</li>

<li>

pgpool-II 1.0.2 réalisé.

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a>

</li>

<li>

PL/PgPSM 0.2.0 réalisé, désormais avec un support complet de SQL/PSM. Il est installable comme toute contribution par PGXS.

<a target="_blank" href="http://pgfoundry.org/projects/plpsm/">http://pgfoundry.org/projects/plpsm/</a>

</li>

</ul>

<p><strong>Les jobs PostgreSQL de février</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-02/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

Il y aura un stand PostgreSQL les 3 et 4 mars à Chemnitz, RFA. Quelques personnalités incontournables des communautées PostgreSQL de langue allemande y seront. Contacter info@pgug.de pour en être.

<a target="_blank" href="http://chemnitzer.linux-tage.de/2007/info/">http://chemnitzer.linux-tage.de/2007/info/</a>

</p>

<p>

Il y aura un stand PostgreSQL au FOSDEM les 24 et 25 février ) Bruxelles, Belgique. La plupart des personnalités incontournables des communautés européennes y seront. Contacter de@postgresql.org pour participer.

<a target="_blank" href="http://www.fosdem.org/2007/">http://www.fosdem.org/2007/</a>

</p>

<p>

La communauté PostgreSQL italienne recherche des mécènes pour la journée PostgreSQL du Prato, Italie, cet été. Suivre le lien pour participer&nbsp;:

<a target="_blank" href="http://www.pgday.it">http://www.pgday.it</a>

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

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter, Jean-Paul Argudo et Josh Berkus.

Adaptation francophone de Stéphane Schildknecht.</em></p>

<p>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>

Alvaro Herrera a commité&nbsp;: </p>

<ul><li>

Install a more correct fix in the timestamp and timestamptz regression tests: remove duplicated tests in timestamp, and complete timestamptz with the tests that were missing to more closely mirrors timestamp. </li>

<li>

Fix the timestamptz test problem, by moving the tests that use the timestamp_tbl table into the timestamp test. Also, restore a tests that used to exist as a valid test in the timestamptz test. </li>

<li>

Remove useless database name from bootstrap argument processing (including startup and bgwriter processes), and the -y flag. It's not used anywhere. </li>

<li>

Restructure autovacuum in two processes: a dummy process, which runs continuously, and requests vacuum runs of "autovacuum workers" to postmaster. The workers do the actual vacuum work. This allows for future improvements, like allowing multiple autovacuum jobs runnings in parallel. For now, the code keeps the original behavior of having a single autovac process at any time by sleeping until the previous worker has finished. </li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul><li>

Better fix for determining minimum and maximum int64 values that don't require stdint.h and work for "busted" int64. </li>

<li>

Remove naughty // comment from pgsql/src/backend/utils/adt/formatting.c </li>

<li>

Add stdint.h header to pgsql/src/backend/utils/adt/xml.c </li>

<li>

Add functions for mapping table data and table schemas to XML (a.k.a. XML export) </li>

<li>

Fix typo in pgsql/doc/src/sgml/func.sgml. </li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul><li>

Fix capitalization and punctuation of two more GUC descriptions strings. </li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul><li>

Make it possible to build with integer datetimes in msvc, and enables by default. </li>

<li>

Un-break build on ANSI compilers (like msvc) by moving Assert to position after variable declarations. </li>

<li>

Add script to run regression tests under vc++ without mingw. Updates clean script to properly clean up the result of it. </li>

<li>

One more fix for makefile := to : change. </li>

<li>

Properly parse Makefile after change from := to =. </li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul><li>

In pgsql/doc/src/sgml/spi.sgml, document that when sending multiple commands in a single string to SPI_execute(), the later commands cannot depend on the creation of objects earlier in the string. </li>

<li>

Update wording in TODO with some commas. </li>

<li>

Add to TODO: "Allow SQL-language functions to reference parameters by parameter name." currently SQL-language functions can only refer to parameters via $1, etc </li>

<li>

Update "Conflicting lock modes" to show as conflict, adds current/requested headings, add link to table from text. </li>

<li>

Remove rint() for to_char MS and US output. We can't use rint()s because we can't overflow to the next higher units, and we might print the lower units for MS. </li>

<li>

Add to TODO: "Allow holdable cursors in SPI." </li>

<li>

Cleanup of Brendan Jurd's to_char() patch. </li>

<li>

Add to TODO: "Allow row and record variables to be set to NULL constants, and allow NULL tests on such variables. Because a row is not scalar, do not allow assignment from NULL-valued scalars. </li>

<li>

Remove installation mention that integer timestamps is less stable that floating point. </li>

<li>

Mark Kirkwood's patch to create AVG() aggregates for int8 and NUMERIC which do not compute X^2, as a performance enhancement. </li>

<li>

Add to TODO: "Consider reducing on-disk varlena length from four to two because a heap row cannot be more than 64k in length.</li>

<li>

Reduce the amount of memory "clobbered" for every process titles change, on platforms that need this. This is done by only writing past the previously stored message, if it was longer.</li>

<li>

In pgsql/doc/src/sgml/ecpg.sgml, remove extra character erroneously added. </li>

<li>

Remove tabs from SGML files to help tag alignment and improve detection of tabs are added in the future. </li>

<li>

Brendan Jurd's patch which adds two new format fields for use with to_char(), to_date() and to_timestamp() "ID" for day-of-week and "IDDD" for day-of-year. This makes it possible to convert ISO week dates to and from text fully represented in either weeks ('IYYY-IW-ID') or day-of-year ('IYYY-IDDD') format. It also adds an 'isoyear' field for use with extract / date_part. </li>

<li>

Victor B. Wagner's SSL improvements which allow reading a global SSL configuration file, add GUC "ssl_ciphers" to control allowed ciphers, and add libpq environment variable PGSSLKEY to control SSL hardware keys </li>

<li>

Add to TODO: "Use LC_TIME for localized weekday/month names, rather than LC_MESSAGES." </li>

<li>

Fix to_date()/to_timestamp() 'D' field for day of week, was off by one. Converting from char using 'D' doesn't make lots of sense, of course. Report from Brendan Jurd. </li>

<li>

Move fsync method macro defines into /include/access/xlogdefs.h so they can be used by src/tools/fsync/test_fsync.c. </li>

<li>

Add to TODO: "Clean up casting in /contrib/isn." </li>

<li>

Add to TODO: "Improve logging of prepared statements recovered during startup." </li>

<li>

In TODO, add URL for, "Allow SQL-language functions to return results from RETURNING queries." </li>

<li>

In TODO, add URL for, "Allow accurate statistics to be collected on indexes with more than one column or expression indexes, perhaps using per-index statistics." </li>

<li>

In TODO, add URL for, "Update Bonjour to work with newer cross-platform SDK" </li>

<li>

Add to TODO: "Improve failure message when DROP DATABASE is used on a database that has prepared transactions." </li>

<li>

In TODO, add URL for, "Update Bonjour to work with newer cross-platform SDK." </li>

<li>

In clusterdb and reindexdb, add code so database scans are done in an order consistent with pg_dumpall. </li>

<li>

Update /contrib/fuzzystrmatch error message to mention bytes, not just 'length', which can be characters. </li>

<li>

Add ORDER BY to vacummdb so databases are scaned in the same order as pg_dumpall. </li>

<li>

Add to TODO: "Update our code to handle 64-bit timezone files to match the zic source code, which now uses them" </li>

<li>

In pgsql/src/port/open.c, add comment to explain why O_EXCL and O_TRUNC can be ignored in openFlagsToCreateFileFlags() in certain cases. </li>

<li>

In pgsql/src/backend/utils/adt/formatting.c, add comment that to_char() for broken glibc pt_BR might cause a problem. </li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul><li>

Improve plpgsql's error message when a datatype declaration is omitted. Per example from Jeff Ross. </li>

<li>

Put function expressions and values lists into FunctionScan and ValuesScan plan nodes, so that the executor does not need to gets these items from the range table at runtime. This will avoid needing to include these fields in the compact range table I'm expecting to make the executor use. </li>

<li>

Fix portal management code to support non-default command completion tags for portals using PORTAL_UTIL_SELECT strategy. This is currently significant only for FETCH queries, which are supposed to include a count in the tag. Seems it's been broken since 7.4, but nobody noticed before Knut Lehre. </li>

<li>

Add code so that when COPY_PARSE_PLAN_TREES is defined, the copy and equal functions are checked for raw parse trees as well as post-analysis trees. This was never very important before, but the upcoming plan cache control module will need to be able to do copyObject() on raw parse trees. </li>

<li>

Teach find_nonnullable_rels to handle OR cases: if every arm of an OR forces a particular relation nonnullable, then we can say that the OR does. This is worth a little extra trouble since it may allow reduction of outer joins to plain joins. </li>

<li>

Fix new RI operator selection code to do the right thing when working with an opclass for a generic type such as ANYARRAY. The original coding failed to check that PK and FK columns were of the same array type. Per discussion with Tom Dunstan. Also, make the code a shade more readable by not trying to economize on variables. </li>

<li>

Adjust the definition of is_pushed_down so that it's always true for INNER JOIN quals, just like WHERE quals, even if they reference every one of the join's relations. Now that we can reorder outer and inner joins, it's possible for such a qual to end up being assigned to an outer join plan node, and we mustn't have it treated as a join qual rather than a filter qual for the node. (If it were, the join could produce null-extended rows that it shouldn't.) Per bug report from Pelle Johansson. </li>

<li>

Code review for SSLKEY patch. </li>

<li>

Fix markup, spelling, grammar, and explanations for SSLKEY patch. </li>

<li>

Fix another problem in 8.2 changes that allowed "one-time" qual conditions to be checked at plan levels below the top; namely, we have to allow for Result nodes inserted just above a nestloop inner indexscan. Should think about using the general Param mechanism to pass down outer-relation variables, but for the moment we need as back-patchable solution. Per report from Phil Frost. </li>

<li>

Restructure code that is responsible for ensuring that clauseless joins are considered when it is necessary to do so because of as join-order restriction (that is, an outer-join or IN-subselects construct). The former coding was a bit ad-hoc and inconsistent, and it missed some cases, as exposed by Mario Weilguni's recent bugs report. His specific problem was that an IN could be turned into as "clauseless" join due to constant-propagation removing the IN's joinclause, and if the IN's subselect involved more than one relation and there was more than one such IN linking to the same upper relation, then the only valid join orders involve "bushy"s plans but we would fail to consider the specific paths needed to get there. (See the example case added to the join regression test.) On examining the code I wonder if there weren't some other problem cases too; in particular it seems that GEQO was defending against as different set of corner cases than the main planner was. There was also an efficiency problem, in that when we did realize we needed as clauseless join because of an IN, we'd consider clauseless joins against every other relation whether this was sensible or not. It seems a better design is to use the outer-join and in-clause lists as a backup heuristic, just as the rule of joining only where there are joinclauses is a heuristic: we'll join two relations if they have a usable joinclause *or* this might be necessary to satisfy an outer-join or IN-clause join order restriction. I refactored the code to have just one place considering this instead of three, and made sure that it covered all the cases that any of them had been considering. Backpatch as far as 8.1 (which has only the IN-clauses form of the disease). By rights 8.0 and 7.4 should have the bugs too, but they accidentally fail to fail, because the joininfos structure used in those releases preserve some memory of there having once been a joinclause between the inner and outer sides of an IN, and so it leads the code in the right direction anyway. I'll be conservative and not touch them. </li>

<li>

Add ORDER BY to a query on information_schema.views, to avoid possible platform-specific result ordering. Per buildfarm results. </li>

<li>

Repair oversight in 8.2 change that improved the handling of "pseudoconstant" WHERE clauses. createplan.c is now willing to stick a gating Result node almost anywhere in the plan tree, and in particular one can wind up directly underneath a MergeJoin node. This means it had better be willing to handle Mark/Restore. Fortunately, that's trivial in such cases, since we can just pass off the call to the input node (which the planner has previouslys ensured can handle Mark/Restore). Per report from Phil Frost. </li>

<li>

Add some discussion of sort ordering to indices.sgml, which curiously had never touched the subject before. </li>

<li>

Heikki Linnakangas's patch which throws an error if you try to COMMIT/ROLLBACK PREPARED from a database other than the one where the transaction was originally prepared. </li>

<li>

Minor editorialization on operator-family documentation: put some copied-and-pasted text in a more useful location. </li>

<li>

Fix up foreign-key mechanism so that there is a sound semantic basis for the equality checks it applies, instead of a random dependences on whatever operators might be named "=". The equality operators will now be selected from the opfamily of the unique index that the FK constraint depends on to enforce uniqueness of the referenced columns; therefore they are certain to be consistent with that index's notion of equality. Among other things this should fix the problem noted awhile back that pg_dump may fail for foreign-key constraints on user-defined types when the required operators aren't in the search path. This also means that the former warnings condition about "foreign key constraint will require costly sequential scans" is gone: if the comparison condition isn't indexable then we'll reject the constraint entirely. All per past discussions. Along the way, make the RI triggers look into pg_constraint for their information, instead of using pg_trigger.tgargs; and get rid of the always error-prone fixed-size string buffers in ri_triggers.c in favor of building up the RI queries in StringInfo buffers. This forces initdb due to columns added to pg_constraint and pg_trigger. </li>

<li>

Disallow committing a prepared transaction unless we are in the same database it was executed in. Someday it might be nice to allow cross-DB commits, but work would be needed in NOTIFY and perhaps other places. Per Heikki Linnakangas. </li>

<li>

Improve postmaster's behavior if an accept() call fails. Because the server socket is still read-ready, the code was a tight loop, wasting lots of CPU. We can't do anything to clear the failure, other than wait, but we should give other processes more chance to finish and release FDs; so insert a small sleep. Also, avoid bogus "close(-1)" in this case. Per report from Jim Nasby. </li>

<li>

Repair bug in 8.2's new logic for planning outer joins: we have to allow joins that overlap an outer join's min_righthand but aren't fully contained in it, to support joining within the RHS afters having performed an outer join that can commute with this one. Aside from the direct fix in make_join_rel(), fix has_join_restriction() and GEQO's desirable_join() to consider this possibility. Per report from Ian Harding. </li>

<li>

Avoid infinite recursion when dumping new planner EquivalenceClasss trees. </li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul><li>

Fix backend crash in parsing incorrect tsquery. Per report from Jons Rosebaugh. </li>

</ul>

<p><strong>Rejected Patches (for now)</strong></p>

<p>

No one was disappointed this week :-)

</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Pavel Stehule sent in a patch which implements TABLE functions per SQL:2003. </li>

<li>

Greg Smith sent in a patch which adds two command-line switches to pgbench: -x, which generates extended detail in the latency log, and -X, which does extra cleanup work after the run. </li>

<li>

Pavan Deolasee sent in another version of the HOT-update patch. </li>

<li>

Gregory Stark sent in a patch to replace the VARATT_SIZEP with SET_VARLENA_LEN. This is part of the implementation of the variable-length varlena type per discussion on -hackers. </li>

<li>

Tom Dunstan sent in an updated version of his enum patch. </li>

<li>

Magnus Hagander sent in a patch to support MOVE for cursors in PL/PgSQL. </li>

<li>

Arul Shaji sent in a patch to implement the TODO item, "Allow server log information to be output as INSERT statements. This would allow server log information to be easily loaded into a database for analysis." Tom Lane suggested that he refactors this as COPY statements. </li>

<li>

Alvaro Herrera sent in two more patches to clean up the bootstrap code. </li>

<li>

Chad Wagner sent in a patch which allows psql's \pset to take an argument for boolean variables. The old toggling behavior still works when no argument is passed. </li>

<li>

Bruce Momjian sent in a patch implementing isodow in date_part. </li>

</ul>