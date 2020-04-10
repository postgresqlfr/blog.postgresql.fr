---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-417 "
---



<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>PGLessLog (projet d'amélioration des "full-page write" de logs, permettant de réduire leurs volumes) est en ligne&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pglesslog/">http://pgfoundry.org/projects/pglesslog/</a></li>

<li>2ndQuadrant propose à présent des cours sur les performances de PostgreSQL&nbsp;:

<a target="_blank" href="http://www.2ndquadrant.com/training.html">http://www.2ndquadrant.com/training.html</a></li>

<li>pgloader 2.2.5 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgloader/">http://pgfoundry.org/projects/pgloader/</a></li>

<li>PostGis 1.3.2 est disponible&nbsp;:

<a target="_blank" href="http://www.postgis.org/">http://www.postgis.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en décembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>La chasse aux propositions pour les PGCon 2008 ouvre le 19 décembre. Faites chauffer vos stylos&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles. Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un oeil sur&nbsp;:

<a target="_blank" href="http://fosdem.org/2008/schedule/devroom/bsdpostgresql">http://fosdem.org/2008/schedule/devroom/bsdpostgresql</a></li>

<li>La PostgreSQL Conference East '08 est programmée pour les 28 et 29 mars de l'année prochaine&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter, Josh Berkus, Devrim GUNDUZ et Enrico Pirozzi. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/release.sgml, change documentation, change "distributed" checkpoints to "smoothed" checkpoints.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update HOT description to make index column changes clearer.</li>

<li>Remove completed 8.3 TODO items.</li>

<li>In release notes, mention "most" updates are improved with HOT.</li>

<li>In the release notes, mention that the "Overview" items are listed in the sections below in more detail.</li>

<li>FAQ wording and markup fix. Euler Taveira de Oliveira.</li>

<li>Update Brazilian FAQ. Euler Taveira de Oliveira</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Change wording of logged message when cancelling an autovacuum task, using american speling (unlike this commit message). Per complaint from Mike C. on bug #3790 and subsequent discussion.</li>

<li>In pgsql/doc/src/sgml/release.sgml, change the "distributed checkpoint" release note item to Greg Smith's proposed wording.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Remove unused, occasionally confusing graphics building support from pgsql/doc/src/sgml/Makefile.</li>

<li>In pgsql/src/backend/utils/misc/postgresql.conf.sample, Realign the running text in this file to 79 characters wide. Some other copy-editing.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/protocol.sgml, add missing documentation for SSPI packets.</li>

<li>In pgsql/src/tools/msvc/Install.pm, don't try to install README.spi. Hannes Eder.</li>

<li>In pgsql/src/tools/msvc/config.pl, default to integer timestamps being off until 8.4, to correspond to the settings used for other platforms.</li>

<li>In pgsql/src/interfaces/libpq/fe-auth.c, on't send an empty SSPI negotiation packet at the end of the negotiation. Fixes bug #3750</li>

<li>Disable asserts by default on msvc build (to make it the same as in unix)</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Update SGML contrib documentation to catch up with recent changes to the former README files. Albert Cervera i Areny</li>

<li>Add SGML documentation for contrib/spi and contrib/test_parser. The spi documentation is pretty rudimentary, but it's a start.</li>

<li>Remove obsoleted README files.</li>

<li>Improve partitioning example, per Itagaki Takahiro.</li>

<li>Remove contrib/spi/preprocessor, which has been uninteresting ever since we supported standard FOREIGN KEY constraint syntax. It was harmless enough just sitting there, but the prospect of having to document it is surely more work than it's worth.</li>

<li>In pgsql/src/backend/optimizer/plan/planagg.c, fix build_minmax_path() to cope if an IS NULL clause turns up in the indexable-clauses list for a btree index. Formerly it just Asserted that all such clauses were opclauses, but that's no longer true in 8.3. Per bug #3796 from Matthias Schoeneich.</li>

<li>Entity-ify a passel of &amp; &lt; &gt; characters. Per gripe from Devrim.</li>

<li>Correct misattribution of earthdistance module --- according to its old README file, Bruno Wolff did the bulk of the work, but for some reason only Hal Snyder was credited here.</li>

<li>Make an editorial pass over the newly SGML-ified contrib documentation. Fix lots of bad markup, bad English, bad explanations. This commit covers only about half the contrib modules, but I grow weary...</li>

<li>Add missing table entry for lastval(), per Jeff Davis.</li>

<li>In pgsql/contrib/tablefunc/tablefunc.c, clean up a couple of problems in crosstab_hash's use of a hash table. The original coding leaked memory (at least 8K per crosstab_hash call) because it allowed the hash table to be allocated as a child of TopMemoryContext and then never freed it. Fix that by putting the hash table under per_query_ctx, instead. Also get rid of use of a static variable to point to the hash table. Aside from being ugly, that would actively do the wrong thing in the case of re-entrant calls to crosstab_hash, which are at least theoretically possible since it was expecting the static variable to stay valid across a SPI_execute call.</li>

<li>Fix mergejoin cost estimation so that we consider the statistical ranges of the two join variables at both ends: not only trailing rows that need not be scanned because there cannot be a match on the other side, but initial rows that will be scanned without possibly having a match. This allows a more realistic estimate of startup cost to be made, per recent pgsql-performance discussion. In passing, fix a couple of bugs that had crept into mergejoinscansel: it was not quite up to speed for the task of estimating descending-order scans, which is a new requirement in 8.3.</li>

<li>Fix completely-bogus volatility markings on pg_trgm functions.</li>

<li>Fix up the PQconnectionUsedPassword mess: create a separate PQconnectionNeedsPassword function that tells the right thing for whether to prompt for a password, and improve PQconnectionUsedPassword so that it checks whether the password used by the connection was actually supplied as a connection argument, instead of coming from environment or a password file. Per bug report from Mark Cave-Ayland and subsequent discussion.</li>

<li>In pgsql/src/bin/psql/startup.c, fix bogus prompt for password in -u case. Per gripe from Robert Treat.</li>

<li>The E. J. Pratt verse used as a tsearch test case is unfortunately still under copyright in the US and many other places. Substitute a little something from a poet who's more safely dead. Per gripe from Bjorn Munch.</li>

<li>Fix attribution for Rime of the Ancient Mariner (obviously it's been too long since freshman English :-()</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>xeb &lt;AT&gt; mail.ru's patch intended to convert binary integers automatically in libpq on grounds of lack of design discussion and incomplete type coverage.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Andrew Chernow sent in another version of his pgparam patch.</li>

<li>Yoshiyuki Asaba sent in a patch to fix pgbench's time reporting for the -C option.</li>

<li>Tom Lane sent in a patch to fix PQconnectionUsedPassword.</li>

<li>Andrew Dunstan sent in a patch to fix the buildenv.pl/buildenv.bat issue on Windows.</li>

</ul>