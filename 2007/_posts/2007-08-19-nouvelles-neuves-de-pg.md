---
layout: post
title: "Nouvelles neuves de PG"
author: "NBougain"
redirect_from: "index.php?post/drupal-262 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 12 Août 2007</strong></p>

<p>Pour avoir rendu possibles les participations très professionnelles de la LinuxWorldExpo et de l'OSCON, le fond de soutien à PostgreSQL chez SPI tient à remercier les sponsors industriels suivants&nbsp;: Continuent, Open Technology Group, Truviso, CommandPrompt, EnterpriseDB et Once Technologies.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>EnterpriseDB Advanced Server 8.2 est sorti&nbsp;:

<a target="_blank" href="http://www.enterprisedb.com/products/index.do">http://www.enterprisedb.com/products/index.do</a></li>

<li>pgsnmpd 1.0 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgsnmpd/">http://pgfoundry.org/projects/pgsnmpd/</a></li>

<li>SchemaCrawler 5.1 pour PostgreSQL est disponible&nbsp;:

<a target="_blank" href="http://schemacrawler.sourceforge.net/">http://schemacrawler.sourceforge.net/</a></li>

</ul>

<!--break-->

<p><strong>Offres d'emplois autour de PostgreSQL en août</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org et en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Applied Patches</strong></p>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Fix a gradual memory leak in ExecReScanAgg(). Because the aggregation hash table is allocated in a child context of the agg node's memory context, MemoryContextReset() will reset but *not* delete the child context. Since ExecReScanAgg() proceeds to build a new hash table from scratch (in a new sub-context), this results in leaking the header for the previous memory context. Therefore, use MemoryContextResetAndDeleteChildren() instead. Credit: My colleague Sailesh Krishnamurthy at Truviso for isolating the cause of the leak.</li>

<li>Adjust the output of MemoryContextStats() so that the stats for a child memory contexts is indented two spaces to the right of its parent context. This should make it easier to deduce the memory context hierarchy from the output of MemoryContextStats().</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/cvs.sgml, fix incorrect URI for cvs rsync</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Avoid memory leakage across successive calls of regexp_matches() or regexp_split_to_table() within a single query. This is only a partial solution, as it turns out that with enough matches per string these functions can also tickle a repalloc() misbehavior. But fixing that is a topic for a separate patch.</li>

<li>Code review for regexp_matches/regexp_split patch. Refactor to avoid assuming that cached compiled patterns will still be there when the function is next called. Clean up looping logic, thereby fixing bug identified by Pavel Stehule. Share setup code between the two functions, add some comments, and avoid risky mixing of int and size_t variables. Clean up the documentation a tad, and accept all the flag characters mentioned in table 9-19 rather than just a subset.</li>

<li>Fix uninitialized-memory bug in plpython proargnames patch. Per bug #3523</li>

<li>Fix unintended change of output format for createlang/droplang -l. Missed these uses of printQuery() in FETCH_COUNT patch a year ago :-(. Per report from Tomoaki Sato.</li>

<li>Fix search for SGML stylesheets to include the place where Gentoo keeps them. Brendan Jurd</li>

<li>Revise postmaster startup/shutdown logic to eliminate the problem that a constant flow of new connection requests could prevent the postmaster from completing a shutdown or crash restart. This is done by labeling child processes that are "dead ends", that is, we know that they were launched only to tell a client that it can't connect. These processes are managed separately so that they don't confuse us into thinking that we can't advance to the next stage of a shutdown or restart sequence, until the very end where we must wait for them to drain out so we can delete the shmem segment. Per discussion of a misbehavior reported by Keaton Adams. Since this code was baroque already, and my first attempt at fixing the problem made it entirely impenetrable, I took the opportunity to rewrite it in a state-machine style. That eliminates some duplicated code sections and hopefully makes everything a bit clearer.</li>

<li>Fix thinko in multi-autovac-workers code: validity checks made by GUC assign hooks are supposed to be made whether doit is true or not.</li>

<li>Fix pg_restore to guard against unexpected EOF while reading an archive file. Per report and partial patch from Chad Wagner.</li>

<li>Adjust configure so that it sets CFLAGS properly for Intel's icc even if the compiler is not defining __GNUC__. Per report from Dirk Tilger that it is possible for icc to not do that.</li>

<li>In pgsql/src/include/storage/s_lock.h, apparently icc doesn't always define __ICC, and it's more correct to check for __INTEL_COMPILER. Per report from Dirk Tilger. Not back-patched since I don't fully trust it yet ...</li>

</ul>