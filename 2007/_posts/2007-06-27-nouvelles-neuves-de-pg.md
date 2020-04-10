---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-249 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Archiveopteryx 2.01 est sorti&nbsp;:

<a target="_blank" href="http://www.archiveopteryx.org/2.01.html">http://www.archiveopteryx.org/2.01.html</a></li>

<li>PgBouncer 1.0.8 vient de paraître&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a></li>

<li>pgpool-HA 1.1.0 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>pgpool-II 1.1.1 est également disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>pgsnmpd 1.0 beta 1 a été publié, à présent avec le support de RDBMS-MIB (RFC 1697) sous PostgreSQL 8.x&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgsnmpd/">http://pgfoundry.org/projects/pgsnmpd/</a></li>

<li>PL/R fonctionne maintenant sous Windows&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/plr/">http://pgfoundry.org/projects/plr/</a></li>

<li>Proximus Report Builder 2.0 alpha released&nbsp;:

<a target="_blank" href="http://www.ibs.lv/en/category/proximus_report_builder">http://www.ibs.lv/en/category/proximus_report_builder</a></li>

</ul>

<p><strong>Jobs PostgreSQL en Juin</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-06/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>Les inscriptions pour les pgday.it du 6 et 7 juillet sont ouvertes. L'événement aura lieu en Toscane, à Prato (Italie).</p>

<p>Quelques URLs à noter&nbsp;:</p>

<ul>

<li>Le programme&nbsp;:

<a target="_blank" href="http://www.pgday.it/it/generale/programma">http://www.pgday.it/it/generale/programma</a></li>

<li>Inscription&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/generale/registrazione">http://www.pgday.it/en/generale/registrazione</a></li>

<li>Site web dédié&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/">http://www.pgday.it/en/</a></li>

<li>Sponsoriser l'événement&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/sponsorizzazioni/come">http://www.pgday.it/en/sponsorizzazioni/come</a></li>

<li>...en commandant un T-shirt PostgreSQL ?

<a target="_blank" href="http://www.prato.linux.it/node/30">http://www.prato.linux.it/node/30</a></li>

<li>Moyens de transport&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/logistica/raggiungere_prato">http://www.pgday.it/en/logistica/raggiungere_prato</a></li>

<li>Hébergement&nbsp;:

<a target="_blank" href="http://www.pgday.it/en/logistica/dove_dormire">http://www.pgday.it/en/logistica/dove_dormire</a></li>

<li>... et un peu de tourisme dans les vallées de Toscane&nbsp;:

<a target="_blank" href="http://www.pgday.it/it/node/158">http://www.pgday.it/it/node/158</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/%21GeneralBits/">http://www.varlena.com/!GeneralBits/</a></li>

</ul>

<p><em>Les PostgreSQL Weekly News vous sont présentées cette semaine par David Fetter et Devrim Gunduz. Adaptation francophone par la communauté PostgresqlFr.</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant dimanche minuit à david</em> chez <em>fetter</em> point <em>org. Les propositions en allemand peuvent être envoyées à pwn</em> chez <em>pgug</em> point <em>de.</em></p>

<p><em>Si vous trouvez utile le résumé des patchs ou avez des suggestions d'amélioration, n'hésitez pas à écrire à david</em> chez <em>fetter</em> point <em>org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisenetraut a commité&nbsp;:</p>

<ul>

<li>Update examples of create/drop scripts.</li>

<li>Update password example.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Solution.pm, quiet warnings about redefined PGPORT macros for MSVC.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>In psql, when running a SELECT query using a cursor, flush the query output after each FETCH. This ensures that incremental results are available to clients that are executing long-running SELECT queries via the FETCH_COUNT feature.</li>

<li>Remove some empty columns from a few system catalog tables in the SGML docs.</li>

<li>Minor code cleanup: calling FreeFile() before ereport(ERROR) is not necessary, since files opened via AllocateFile() are closed automatically as part of error recovery.</li>

<li>Remove duplicate #include from pgsql/src/backend/parser/analyze.c.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Simon Riggs's patch which removes the comment about modifying tab-complete.c for userset GUC.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Separate parse-analysis for utility commands out of parser/analyze.c (which now deals only in optimizable statements), and put that code into a new file parser/parse_utilcmd.c. This helps clarify and enforce the design rule that utility statements shouldn't be processed during the regular parse analysis phase; all interpretation of their meaning should happen after they are given to ProcessUtility to execute. (We need this because we don't retain any locks for a utility statement that's in a plan cache, nor have any way to detect that it's stale.) We are also able to simplify the API for parse_analyze() and related routines, because they will now always return exactly one Query structure. In passing, fix bug #3403 concerning trying to add a serial column to an existing temp table (this is largely Heikki's work, but we needed all that restructuring to make it safe).</li>

<li>Add a &lt;tip&gt; that log_line_prefix should usually end with a space to provide visual separation from the rest of the log line; I've been noticing lately that quite a few newbies fail to figure this out for themselves. Also a little editorial cleanup of the log_line_prefix description.</li>

<li>Allow trailing whitespace in parse_real(), for consistency with parse_int() and with itself (strtod allows leading whitespace, so it seems odd not to allow trailing whitespace). parse_bool remains not-whitespace-friendly, but this is generically true for non-numeric GUC variables, so I'll desist from changing it.</li>

<li>Provide a HINT listing the allowed unit names when a GUC variable seems to contain a wrong unit specification, per discussion. In passing, fix the code to avoid unnecessary integer overflows when converting units, and to detect overflows when they do occur.</li>

<li>Add a caveat pointing out that constraint exclusion doesn't work with constraints the planner is unable to disprove, hence simple btree-compatible conditions should be used. We've seen people try to get cute with stuff like date_part(something) = something at least twice now. Even if we wanted to try to teach predtest.c about the properties of date_part, most of the useful variants aren't immutable so nothing could be proved.</li>

<li>Restrict deadlock_timeout to the range for which the implementation actually works sanely, viz not 0 and not more than INT_MAX/1000 (else TimestampTzPlusMilliseconds can overflow). Per discussion with Greg Stark. Since this is a superuser-only setting and there was not previously any big reason to change it, not worth back-patching.</li>

<li>transformColumnDefinition failed to complain about create table foo (bar int default null default 3); due to not thinking about the special-case handling of DEFAULT NULL. Problem noticed while investigating bug #3396.</li>

<li>CREATE DOMAIN ... DEFAULT NULL failed because gram.y special-cases DEFAULT NULL and DefineDomain didn't. Bug goes all the way back to original coding of domains. Per bug #3396 from Sergey Burladyan.</li>

<li>Only log 'process acquired lock' if we actually did get the lock. This test seems inessential right now since the only control path for not getting the lock is via CHECK_FOR_INTERRUPTS which won't return control to ProcSleep, but it would be important if we ever allow the deadlock code to kill someone else's transaction instead of our own.</li>

<li>Code review for log_lock_waits patch. Don't try to issue log messages from within a signal handler (this might be safe given the relatively narrow code range in which the interrupt is enabled, but it seems awfully risky); do issue more informative log messages that tell what is being waited for and the exact length of the wait; minor other code cleanup. Greg Stark and Tom Lane</li>

<li>Arrange for quote_identifier() and pg_dump to not quote keywords that are unreserved according to the grammar. The list of unreserved words has gotten extensive enough that the unnecessary quoting is becoming a bit of an eyesore. To do this, add knowledge of the keyword category to keywords.c's table. (Someday we might be able to generate keywords.c's table and the keyword lists in gram.y from a common source.) For the moment, lie about WITH's status in the table so it will still get quoted --- this is because of the expectation that WITH will become reserved when the SQL recursive-queries patch gets done. I didn't force initdb because this affects nothing on-disk; but note that a few regression tests have changed expected output.</li>

<li>Back-patch 8.2 fix that complains if trying to extend a relation encounters a buffer containing a non-zeroed page. This seems appropriate now that the 8.2 fix has been seen to save at least one user from data loss due to a buggy kernel (per report from Jaime Silvela 7-May-07). I'd go further back than 8.1, except that the 8.0-to-8.1 bufmgr changes are large enough that the patch doesn't work immediately; I'm hesitant to make a change without more extensive analysis than I have time for now.</li>

<li>Update obsolete comment: it's no longer the case that mdread() will allow reads beyond EOF, except by special coercion.</li>

<li>Marginal hacking to improve the speed of COPY OUT.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Germán Caamaño's patch to output EXPLAIN results as XML</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in two version of a patch which cancels autovacuum workers conflicting with DROP TABLE, TRUNCATE and CLUSTER.</li>

<li>Alvaro Herrera sent in two versions of a patch fixing up the autovacuum process handling code.</li>

<li>Simon Riggs sent in another version of his Numeric508 patch.</li>

<li>Ireneusz Pluta sent in an updated patch to make PostgreSQL use ICU.</li>

<li>Dariusz Suchojad sent in a documentation patch which clarfies the fact that qualified DO ALSO RULEs can only be rewritten into SELECT, INSERT, UPDATE or DELETE. In particular, NOTIFYs can only occur on an unqualified RULE.</li>

</ul>