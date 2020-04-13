---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-405 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 27 janvier 2008</strong></p>

<ul>

<li>La 8.3 RC2 est à votre disposition. Un petit test ?

<a target="_blank" href="http://www.postgresql.org/developer/beta">http://www.postgresql.org/developer/beta</a></li>

<li>Félicitations à Selena Deckelmann pour son nouveau de travail de liaison inter-PUG.</li>

<li>Attendez-vous à un serveur PUG mis à jour dans le courant de la semaine&nbsp;:

<a target="_blank" href="http://pugs.postgresql.org/">http://pugs.postgresql.org/</a></li>

<li>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Devrim Gunduz.</li>

</ul>

<!--more-->


<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>ip4r 1.02 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/ip4r/">http://pgfoundry.org/projects/ip4r/</a></li>

<li>pg_proboscis 0.9.4 a été publié&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/python/">http://pgfoundry.org/projects/python/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en janvier</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Le PUG Européen va élire son nouveau bureau de direction. Si vous souhaitez suggérer un candidat ou simplement pour le règlement du vote&nbsp;:

<a target="_blank" href="http://www.pgug.eu/election.txt">http://www.pgug.eu/election.txt</a></li>

<li>Le "Prague PostgreSQL Developers' Day 2008" aura lieu le 13 février&nbsp;:

<a target="_blank" href="http://www.dbsvet.cz/view.php?cisloclanku=2008011101">http://www.dbsvet.cz/view.php?cisloclanku=2008011101</a></li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Le FOSDEM a organisé son rendez-vous habituel au Bier Circus à Bruxelles, le vendredi 22 février à 20h&nbsp;:

<a target="_blank" href="http://www.beerintheevening.com/pubs/s/27/27650/Le_Bier_Circus/Brussels">http://www.beerintheevening.com/pubs/s/27/27650/Le_Bier_Circus/Brussels</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="https://www.bsdwiki.de/FOSDEM_2008">https://www.bsdwiki.de/FOSDEM_2008</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 28 et 29 mars 2008 à l'Université du Maryland, College Park&nbsp;. L'appel aux propositions a été lancé&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil)&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/catalog/pg_enum.c, split error message.</li>

<li>In pgsql/src/backend/catalog/pg_shdepend.c, improve lock level choices in pg_shdepend.c. Noticed by Tom Lane.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix psql \h output for case of no parameters (ie, list all the known commands) to format properly for the actually needed column width, instead of having a hard-wired assumption about the longest command name length. Also make it respond to the current screen width. In passing, const-ify the constant table.</li>

<li>Fix !RS_isRegis() to agree exactly with RS_compile()'s idea of what's a valid regis. Correct the latter's oversight that a bracket-expression needs to be terminated. Reduce the ereports to elogs, since they are now not expected to ever be hit (thus addressing Alvaro's original complaint). In passing, const-ify the string argument to RS_compile.</li>

<li>In pgsql/doc/src/sgml/config.sgml, improve description of bgwriter_lru_multiplier, per discussion.</li>

<li>Reference pgAdmin as a typical client-side tool, rather than the no-longer-maintained PgAccess. Per Erik Rijkers.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, avoid mathematical inconsistency in example about avoiding division by zero with a CASE expression. Per gripe from Russell Smith.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, provide a concrete example of parameter expansion in archive_command. Per discussion of bug #3877. Simon Riggs, some fixes by moi.</li>

<li>In pgsql/src/include/utils/timestamp.h, prevent integer overflow within the integer-datetimes version of TimestampTzPlusMilliseconds. An integer argument of more than INT_MAX/1000 milliseconds (ie, about 35 minutes) would provoke a wrong result, resulting in incorrect enforcement of statement_timestamp values larger than that. Bug was introduced in my rewrite of 2006-06-20, which fixed some other overflow risks, but missed this one :-( Per report from Elein.</li>

<li>In pgsql/src/backend/utils/adt/ri_triggers.c, release any detoasted copies of arrays that are made temporarily in ri_FetchConstraintInfo, to avoid a query-duration memory leak when that routine is called by RI_FKey_keyequal_upd_fk (which isn't executed in a short-lived context). This problem was latent when the routine was added in February, but it didn't become serious until the varvarlena patch made it quite likely that the fields being examined would be "toasted" (ie, have short headers). Per report from Stephen Denne.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, fix two different copy-and-paste-os in CSV log rotation logic; one that led to a double-pfree crash and another that effectively disabled size-based rotation for CSV logs. Also suppress a memory leak and make some trivial cosmetic improvements. Per bug #3901 from Chris Hoover and additional code-reading.</li>

<li>Change StatementCancelHandler() to check the DoingCommandRead flag to decide whether to execute an immediate interrupt, rather than testing whether LockWaitCancel() cancelled a lock wait. The old way misclassified the case where we were blocked in ProcWaitForSignal(), and arguably would misclassify any other future additions of new ImmediateInterruptOK states too. This allows reverting the old kluge that gave LockWaitCancel() a return value, since no callers care anymore. Improve comments in the various implementations of PGSemaphoreLock() to explain that on some platforms, the assumption that semop() exits after a signal is wrong, and so we must ensure that the signal handler itself throws elog if we want cancel or die interrupts to be effective. Per testing related to bug #3883, though this patch doesn't solve those problems fully. Perhaps this change should be back-patched, but since pre-8.3 branches aren't really relying on autovacuum to respond to SIGINT, it doesn't seem critical for them.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Provide a clearer error message if the pg_control version number looks wrong because of mismatched byte ordering.</li>

<li>Change /contrib to contrib for consistency.</li>

<li>Andrew Dunstan commited:</li>

<li>In pgsql/src/pl/plperl/plperl.c, work around for perl 5.10 bug - fix due to perl hacker Simon Cozens.</li>

<li>In pgsql/src/pl/plperl/plperl.c, document the fix for perl 5.10 with the following comment: "The temporary enabling of the caller opcode here is to work around a bug in perl 5.10, which unkindly changed the way its Safe.pm works, without notice. It is quite safe, as caller is informational only, and in any case we only enable it while we load the 'strict' module."</li>

<li>In pgsql/doc/src/sgml/plperl.sgml, fix example of de-escaping bytea argument, per Florian Weimer. Also fix example of escaping bytea return value. Both cases did not handle backslash values properly.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Simon Riggs's patch to reduce the contention on SInvalLock, due to its untestedness.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tom Lane sent in a patch for renaming constraints along with the corresponding indexes.</li>

<li>Simon Riggs sent in a doc patch for bug 3877 (re: WAL/PITR).</li>

<li>Greg Sabino Mullane sent in a patch to add a useful response to 'help' and variants in psql.</li>

<li>Hiroshi Saito sent in a patch to fix testlo on Windows.</li>

<li>Gokulakannan Somasundaram sent in two more revisions of his thick index patch.</li>

<li>Pavel Stehule sent in a WIP patch for variadic functions.</li>

<li>Neil Conway sent in an updated version of Gregory Stark's non-recursive WITH patch with the WITH RECURSIVE parts trimmed out.</li>

<li>Tom Lane sent in a patch which adds a GUC variable to allow clients to disable the new synchronized-scanning behavior, and make pg_dump disable sync scans so that it will reliably preserve row ordering.</li>

</ul>