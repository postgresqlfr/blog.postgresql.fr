---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-279 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>DBD::Pg 2.0.0_5 (RC5) est disponible&nbsp;:

<a target="_blank" href="http://search.cpan.org/%7Edbdpg/DBD-Pg/Pg.pm">http://search.cpan.org/~dbdpg/DBD-Pg/Pg.pm</a></li>

<li>PGCluster-1.5.0rc17 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgcluster/">http://pgfoundry.org/projects/pgcluster/</a></li>

<li>pg_proboscis 0.9.3 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/python/">http://pgfoundry.org/projects/python/</a></li>

<li>IT-PUG a créé un plugin Firefox de recherche sur la documentation PostgreSQL&nbsp;:

<a target="_blank" href="http://www.itpug.org/index.en.html">http://www.itpug.org/index.en.html</a></li>

<li>Visual SQL Builder Pre-Alpha 0.3 est disponible, et a besoin de contributeurs et de testeurs&nbsp;:

<a target="_blank" href="http://sourceforge.net/projects/vsqlbuilder">http://sourceforge.net/projects/vsqlbuilder</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en janvier</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La première réunion du NYPUG se fera au Skylight Diner le 22 janvier à 19h30. RSVP to josh (a) postgresql (.) org&nbsp;:

<a target="_blank" href="http://skylightdinernyc.com/">http://skylightdinernyc.com/</a></li>

<li>Le PUG Européen va élire son nouveau bureau de direction. Si vous souhaitez suggérer un candidat ou pour le réglement du vote&nbsp;:

<a target="_blank" href="http://www.pgug.eu/election.txt">http://www.pgug.eu/election.txt</a></li>

<li>"Quoi de neuf dans PostgreSQL 8.3&nbsp;?" - petit déjeuner avec Bruce Momjian le 24 janvier 2008 à Londres. Envoyez un mail pour l'invitation&nbsp;: info.emea (a) enterprisedb (.) com</li>

<li>Le "Prague PostgreSQL Developers' Day 2008" aura lieu le 13 février&nbsp;:

<a target="_blank" href="http://www.dbsvet.cz/view.php?cisloclanku=2008011101">http://www.dbsvet.cz/view.php?cisloclanku=2008011101</a></li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="https://www.bsdwiki.de/FOSDEM_2008">https://www.bsdwiki.de/FOSDEM_2008</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 28 et 29 mars 2008 à l'Université du Maryland, College Park&nbsp;. L'appel aux propositions a été lancé&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil). Les propositions de conférences sont attendues avant le 11 janvier&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Robert Treat. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, set valid return values even in case of an error to prevent segfaults.</li>

<li>In ecpg, re-enabled variables in fetch/move command.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster/autovacuum.c, mark autovacuum entries in pg_stat_activity so that they can be easily distinguished from user-invoked commands. Per suggestion from Tom Lane.</li>

<li>In pgsql/src/backend/postmaster/autovacuum.c, backpatch my fix of rev 1.48 to avoid a division-by-zero error in the cost-limit vacuum code. Per trouble report from Joshua Drake.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix an ancient oversight in libpq's handling of V3-protocol COPY OUT mode: we need to be able to swallow NOTICE messages, and potentially also ParameterStatus messages (although the latter would be a bit weird), without exiting COPY OUT state. Fix it, and adjust the protocol documentation to emphasize the need for this. Per off-list report from Alexander Galler.</li>

<li>In pgsql/src/backend/utils/misc/guc.c, avoid cluttering the postmaster log with bogus complaints during transaction abort, per my note from a couple days ago.</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, prevent pg_dump from dumping the comment (if any) on the 'public' schema. This is to avoid uselessly requiring superuser permissions to restore the dump without errors. Pretty grotty, but no better alternative seems available, at least not in the near term.</li>

<li>In pgsql/doc/src/sgml/errcodes.sgml, somebody forgot to add the "NOT AN XML DOCUMENT" ERRCODE everywhere it should go ...</li>

<li>In pgsql/src/backend/tsearch/wparser.c, tweak new error message to conform to style guidelines.</li>

<li>Revise memory management for libxml calls. Instead of keeping libxml's data in whichever context happens to be current during a call of an xml.c function, use a dedicated context that will not go away until we explicitly delete it (which we do at transaction end or subtransaction abort). This makes recovery after an error much simpler --- we don't have to individually delete the data structures created by libxml. Also, we need to initialize and cleanup libxml only once per transaction (if there's no error) instead of once per function call, so it should be a bit faster. We'll need to keep an eye out for intra-transaction memory leaks, though. Alvaro and Tom.</li>

<li>In pgsql/src/backend/commands/cluster.c, prevent CLUSTER from decreasing a relation's relfrozenxid. Bug introduced in rewrite to make CLUSTER MVCC-safe.</li>

<li>Be less wishy-washy in the documentation and comments about whether a ParameterStatus message can be sent during COPY OUT: it's definitely possible, since COPY from a SELECT subquery can trigger any user-defined function.</li>

<li>- In pgsql/contrib/start-scripts/osx/PostgreSQL<a href="http://example.com/new.php?page=PostgreSQL">?</a>,"&gt;http://example.com/new.php?page=PostgreSQL"&gt;?, remove inappropriate cd commands, per David Wheeler. Also make the PATH responsive to</li>

<li>the installation prefix, which was the apparent intent of the previous edit, but not well executed.</li>

<li>Fix ALTER INDEX RENAME so that if the index belongs to a unique or primary key constraint, the constraint is renamed as well. This avoids inconsistent situations that could confuse pg_dump (not to mention humans). We might at some point provide ALTER TABLE RENAME CONSTRAINT as a more general solution, but there seems no reason not to allow doing it this way too. Per bug #3854 and related discussions.</li>

<li>Fix pgsql/src/backend/optimizer/plan/subselect.c to avoid assuming that a SubLink's testexpr references each subquery output column exactly once left-to-right. Although this is the case in the original parser output, it might not be so after rewriting and constant-folding, as illustrated by bug #3882 from Jan Mate. Instead scan the subquery's target list to obtain needed per-column information; this is duplicative of what the parser did, but only a couple dozen lines need be copied, and we can clean up a couple of notational uglinesses. Bug was introduced in 8.2 as part of revision of SubLink representation.</li>

<li>Insert into getCopyDataMessage() the same logic that already existed in the main code path for enlarging libpq's input buffer in one swoop when needing to read a long data message. Without this, the code will double the buffer size, read more data, notice it still hasn't got the whole message, and repeat till it finally has a large enough buffer. Which wastes a lot of data-moving effort and also memory (since malloc probably can't do anything very useful with the freed-up smaller buffers). Not sure why this wasn't there already; certainly the COPY data path is a place where we're quite likely to see long data messages. I'm not backpatching though, since this is just a marginal performance issue rather than a real bug.</li>

<li>In pgsql/src/test/regress/pg_regress.c, make pg_regress clean out the testtablespace directory only on Windows. On other platforms it's better to let the Makefile handle it, but we want the regression tests to be invokable without make on Windows. A batch file would be a better solution, but no time for that before 8.3. Per my discovery that this breaks testing under SELinux, and subsequent discussion.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add to TODO: "Add the ability to automatically create materialized views. Right now materialized views require the user to create triggers on the main table to keep the summary table current. SQL syntax should be able to manager the triggers and summary table automatically. A more sophisticated implementation would automatically retrieve from the summary table when the main table is referenced, if possible."</li>

<li>In FAQ, most recent Postgres version is 8.2.6, per report from Robert Treat.</li>

<li>Improve usage message for pgindent.</li>

<li>Update Japanese FAQ. Jun Kuwamura.</li>

<li>Stamp release for 8.3RC2; configure will be stamped by packager.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/wparser.c, add check of headline method presence. Per report by Yoshiyuki Asaba.</li>

<li>In pgsql/src/backend/tsearch/spell.c, fix core dump with buffer-overrun from too-long infinitive. Add checking of using fixed length arrays to prevent array's overrun. Per report by Hannes Dorbath and comments by Tom Lane.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Document the fact that COPY always uses the client encoding.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/pgcrypto.sgml, typo fix per Erik Rijkers.</li>

<li>Marko Kreen's updates to pgsql/doc/src/sgml/pgcrypto.sgml which touch on SHA1, SHA224, SHA256, SHA384 and SHA512 encryption and change references to RFC 2440 to RFC 4880.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>must commit after autoconf ... and yes, I used the right autoconf</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Pas de déception cette semaine&nbsp;!</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tom Lane sent in a revision of Alvaro Herrera's XML memory allocation patch.</li>

</ul>