---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 novembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-11-30-nouvelles-hebdomadaires-de-postgresql-22-novembre-2009 "
---


<p>Un compte-rendu de la conférence "PGCon Brasil 2009" est disponible en portugais&nbsp;:

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/asl/pgcconbr-2009_prest_contas.pdf">http://pgcon.postgresql.org.br/2009/asl/pgcconbr-2009_prest_contas.pdf</a>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>pgstat 1.1&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgstat2/">http://pgfoundry.org/projects/pgstat2/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-11/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La troisième édition du PGday italien sera tenue à l'université de Pise, le 4 décembre. Entrée libre, sponsors bienvenus&nbsp;:

<a target="_blank" href="http://www.pgday.it/">http://www.pgday.it/</a></li>

<li>Stefan Keller, de l'université des sciences appliquées de Rapperswil (HSR), animera un séminaire intitulé "Introduction à PostGIS/PostgreSQL" le 14 janvier 2010 à Zurich (Suisse)&nbsp;:

<a target="_blank" href="http://www.gis.hsr.ch/wiki/Agenda">http://www.gis.hsr.ch/wiki/Agenda</a></li>

<li>Le FOSDEM 2010 aura lieu à Bruxelles les 6 &amp; 7 février 2010&nbsp;:

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

<li>Le "Chemnitzer Linuxtage" aura lieu à Chemnitz (All.) les 13 &amp; 14 mars 2010&nbsp;:

<a target="_blank" href="http://chemnitzer.linux-tage.de/">http://chemnitzer.linux-tage.de/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20091122">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/optimizer/plan/setrefs.c, while doing the final setrefs.c pass over a plan tree, try to match up non-Var sort/group expressions using ressortgroupref labels instead of depending entirely on equal()-ity of the upper node's tlist expressions to the lower node's. This avoids emitting the wrong outputs in cases where there are textually identical volatile sort/group expressions, as for example: SELECT DISTINCT random(), random() FROM generate_series(1,10); Per report from Andrew Gierth. Backpatch to 8.4. Arguably this is wrong all the way back, but the only known case where there's an observable problem is when using hash aggregation to implement DISTINCT, which is new as of 8.4. So for the moment I'll refrain from backpatching further.</li>

<li>Provide a parenthesized-options syntax for VACUUM, analogous to that recently adopted for EXPLAIN. This will allow additional options to be implemented in future without having to make them fully-reserved keywords. The old syntax remains available for existing options, however. Itagaki Takahiro</li>

<li>Add a hook to CREATE/ALTER ROLE to allow an external module to check the strength of database passwords, and create a sample implementation of such a hook as a new contrib module "passwordcheck". Laurenz Albe, reviewed by Takahiro Itagaki.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, fix memory leak in syslogger: logfile_rotate() would leak a copy of the output filename if CSV logging was enabled and only one of the two possible output files got rotated during a particular call (which would, in fact, typically be the case during a size-based rotation). This would amount to about MAXPGPATH (1KB) per rotation, and it's been there since the CSV code was put in, so it's surprising that nobody noticed it before. Per bug #5196 from Thomas Poindessous.</li>

<li>Add a WHEN clause to CREATE TRIGGER, allowing a boolean expression to be checked to determine whether the trigger should be fired. For BEFORE triggers this is mostly a matter of spec compliance; but for AFTER triggers it can provide a noticeable performance improvement, since queuing of a deferred trigger event and re-fetching of the row(s) at end of statement can be short-circuited if the trigger does not need to be fired. Takahiro Itagaki, reviewed by KaiGai Kohei.</li>

<li>Fix display and dumping of UPDATE OR TRUNCATE triggers (a bizarre combination maybe, but we should get it right). Bug noted while reviewing TRIGGER WHEN patch. Already fixed in HEAD.</li>

<li>Refactor ecpg grammar so that it uses the core grammar's unreserved_keyword list, minus a few specific words that have to be treated specially. This replaces a hard-wired list of keywords that would have needed manual maintenance, and was not getting it. The 8.4 coding was already missing these words, causing ecpg to incorrectly treat them as reserved words: CALLED, CATALOG, DEFINER, ENUM, FOLLOWING, INVOKER, OPTIONS, PARTITION, PRECEDING, RANGE, SECURITY, SERVER, UNBOUNDED, WRAPPER. In HEAD we were additionally missing COMMENTS, FUNCTIONS, SEQUENCES, TABLES. Per gripe from Bosco Rama.</li>

<li>Improve psql's tabular display of wrapped-around data by inserting markers in the formerly-always-blank columns just to left and right of the data. Different marking is used for a line break caused by a newline in the data than for a straight wraparound. A newline break is signaled by a "+" in the right margin column in ASCII mode, or a carriage return arrow in UNICODE mode. Wraparound is signaled by a dot in the right margin as well as the following left margin in ASCII mode, or an ellipsis symbol in the same places in UNICODE mode. "\pset linestyle old-ascii" is added to make the previous behavior available if anyone really wants it. In passing, this commit also cleans up a few regression test files that had unintended spacing differences from the current actual output. Roger Leigh, reviewed by Gabrielle Roth and other members of PDXPUG.</li>

<li>In pgsql/src/test/regress/expected/xmlmap.out, ooops, forgot to check the libxml cases for psql output wrapping change.</li>

<li>In pgsql/src/test/regress/pg_regress.c, remove -w (--ignore-all-space) option from pg_regress's diff calls. We have used -w for a long time as a means of reducing the reported diff volume when one element of a result table isn't of the expected width. However, most of the time the results just pass anyway, so this isn't as important as it once was. Meanwhile, the risk of missing potentially significant deviations has gone up, particularly with psql's ability to report error cursor positions. So, let's switch over to space-sensitive comparisons. Per my proposal of yesterday. (All the expected files that I can test here seem to be ready for this already, but we'll see what the buildfarm thinks about others.)</li>

<li>In pgsql/src/test/regress/output/largeobject_1.source, adjust expected-results spacing per buildfarm results.</li>

<li>In pgsql/doc/src/sgml/ref/psql-ref.sgml, assorted wordsmithing on the documentation of \pset --- try to make it a bit more consistent and less obviously written by different people at different times.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_dump/pg_restore.c, typo: dump -&gt; restore. Fixed in 8.4 and 8.5 Author: Guillaume Lelarge &lt;guillaume@lelarge.info&gt;</li>

<li>In pgsql/src/bin/psql/mainloop.c, ignore UTF-8-encoded Unicode byte-order mark at the beginning of a file if the client encoding is UTF-8. A limited version of a patch proposed by Itagaki Takahiro</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Revert backpatch of inheritable-ACE patch for Win32, since it broke compatibility with pre-Windows 2000 versions.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/optimizer/path/allpaths.c, remove superfluous curly brace, fixing compilation with OPTIMIZER_DEBUG. Jan Urbanski.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in another revision of the VACUUM FULL refactoring patch.</li>

<li>Josh Tolley sent in three more revisions of the patch to enable PL/Perl[U] anonymous DO blocks. Tim Bunce sent in a patch atop same loosening some restrictions.</li>

<li>Zoltan Boszormenyi sent in new revisions of the patches for ECPG implementing dynamic cursor names, SQLDA support, DESCRIBE [OUTPUT] and out-of-scope cursor support in Informix mode.</li>

<li>Alvaro Herrera sent in a patch to add copydatum to SPI.</li>

<li>Pavel Stehule sent in another revision of the patch to allow SQL to use psql parameters.</li>

<li>Heikki Linnakangas sent in a patch intended to fix a bug in the interaction between multixacts and prepared transactions.</li>

<li>Alex Hunsaker sent in a patch atop Marko (johto) Tiikkaja's writeable CTE patch along with a review.</li>

<li>Pavel Stehule sent in a patch to add a USING clause to OPEN FOR EXECUTE in PL/pgsql.</li>

<li>Robert Haas sent in a patch atop Jeff Davis's patch to replace the existing strategy numbers with operator OIDs.</li>

<li>Hannu Valtonen sent in a patch to add in-line (DO) support to PL/PythonU.</li>

<li>Euler Taveira de Oliveira sent in a doc patch which adds a PG_MODULE_MAGIC block to C examples.</li>

<li>George Gensure sent in a patch to reference function parameters by name.</li>

<li>Joachim Wieland sent in two more revisions of the patch to add payloads to NOTIFY.</li>

<li>James Pye sent in a patch to add the PL/Python3 language.</li>

<li>Emmanuel Cecchet sent in three more revisions of the partitioning grammar patch.</li>

<li>David Wheeler sent in a doc patch for hstore.</li>

<li>Hiroshi Saito sent in a patch to fix win32.mak.</li>

<li>Andrew Dunstan sent in a WIP patch to log queries automatically in auto-explain.</li>

</ul>