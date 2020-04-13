---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-280 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - February 03 2008</strong></p>

<p>Attendez-vous à une 8.3 finale cette semaine&nbsp;!

[ndt&nbsp;: à présent publiée, un article la présente sur PostgreSQLFr&nbsp;:

<a target="_blank" href="http://www.postgresqlfr.org/?q=node/1547">http://www.postgresqlfr.org/?q=node/1547</a>]</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<!--break-->

<ul>

<li>psqlODBC 08.03.0100 est disponible&nbsp;:

<a target="_blank" href="http://psqlodbc.projects.postgresql.org/release.html">http://psqlodbc.projects.postgresql.org/release.html</a></li>

<li>Archiveopteryx 2.06 est disponible&nbsp;:

<a target="_blank" href="http://www.archiveopteryx.org/2.06">http://www.archiveopteryx.org/2.06</a></li>

<li>ip4r 1.03 a été publié&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/ip4r/">http://pgfoundry.org/projects/ip4r/</a></li>

<li>Database Designer pour PostgreSQL 1.2.3 a été publié&nbsp;:

<a target="_blank" href="http://microolap.com/products/database/postgresql-designer/">http://microolap.com/products/database/postgresql-designer/</a></li>

<li>pgAdmin III 1.8.2 est disponible&nbsp;:

<a target="_blank" href="http://www.pgadmin.org/">http://www.pgadmin.org/</a></li>

<li>pgTheme v1.0 a été publié&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgtheme/">http://pgfoundry.org/projects/pgtheme/</a></li>

<li>ptop 3.6.1 beta3 est disponible&nbsp;:

<a target="_blank" href="http://ptop.projects.postgresql.org/">http://ptop.projects.postgresql.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en février</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>L'Appel aux Propositions pour l'OSCON expire le 4 février. Envoyez le vôtre dès que vous lirez ces lignes&nbsp;:

<a target="_blank" href="http://en.oreilly.com/oscon2008/public/cfp/13">http://en.oreilly.com/oscon2008/public/cfp/13</a></li>

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

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Minor editorial improvements in documentation of session_replication_role; in particular correct the obsolete claim that it can't be changed once any plans have been cached.</li>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, arrange to ignore SIGPIPE during SSL_read() and SSL_shutdown(), as these are known to write on the socket sometimes and thus we are vulnerable to being killed by the signal if the server happens to go away unexpectedly. Noticed while trying (futilely) to reproduce bug #3902. This bug has been there all along, but since the situation is usually only of interest to developers, I chose not to back-patch the changes.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, fix up closePGconn() so that PQreset() will work on GSSAPI/SSPI connections; the patch for those features put its cleanup code into freePGconn() which is really the wrong place. Remove redundant code from freePGconn() and add comments in hopes of preventing similar mistakes in future. Noticed while trying (futilely) to reproduce bug #3902.</li>

<li>In pgsql/src/backend/libpq/auth.c, don't putenv() a string that is allocated in a context that will go away soon. I suspect this explains bug #3902, though I'm still not able to reproduce that.</li>

<li>Add a GUC variable "synchronize_seqscans" to allow clients to disable the new synchronized-scanning behavior, and make pg_dump disable sync scans so that it will reliably preserve row ordering. Per recent discussions.</li>

<li>Add checks to TRUNCATE, CLUSTER, and REINDEX to prevent performing these operations when the current transaction has any open references to the target relation or index (implying it has an active query using the relation). The need for this was previously recognized in connection with ALTER TABLE, but anything that summarily eliminates tuples or moves them around would confuse an active scan. While this patch does not in itself fix bug #3883 (the deadlock would happen before the new check fires), it will discourage people from attempting the sequence of operations that creates a deadlock risk, so it's at least a partial response to that problem. In passing, add a previously-missing check to REINDEX to prevent trying to reindex another backend's temp table. This isn't a security problem since only a superuser would get past the schema permission checks, but if we are testing for this in other utility commands then surely REINDEX should too.</li>

<li>In pgsql/doc/src/sgml/catalogs.sgml, improve pg_autovacuum documentation to clarify that the enabled field cannot prevent anti-wraparound vacuuming, and to caution against setting unreasonably small values of freeze_max_age. Also put in a notice that this catalog is likely to disappear entirely in some future release. Per discussion of bug #3898 from Steven Flatt.</li>

<li>In pgsql/src/interfaces/libpq/fe-auth.c, fix pg_GSS_error to use conn-&gt;errorMessage more sanely, ie, actually work with the PQExpBuffer code instead of fighting it. This avoids an unnecessary limit on message length and fixes the latent bug that errorMessage.len wasn't getting set.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, remove the old table of "supported platforms" in favor of a link to the buildfarm plus a narrative description of the CPU types and operating systems on which Postgres is likely to work. Now that we've almost completely decoupled CPU and OS considerations, the former tabular style isn't all that enlightening anyway. Perhaps more importantly, no one seems particularly interested in maintaining the table by hand when we have the buildfarm.</li>

<li>In pgsql/doc/src/sgml/release.sgml, mention synchronize_seqscans GUC variable in release notes. Update expected release date.</li>

<li>Fix WaitOnLock() to ensure that the process's "waiting" flag is reset after erroring out of a wait. We can use a PG_TRY block for this, but add a comment explaining why it'd be a bad idea to use it for any other state cleanup. Back-patch to 8.2. Prior releases had the same issue, but only with respect to the process title, which is likely to get reset almost immediately anyway after the transaction aborts, so it seems not worth changing them. In 8.2 and HEAD, the pg_stat_activity "waiting" flag could remain set incorrectly for a long time. Per report from Gurjeet Singh.</li>

<li>In pgsql/doc/src/sgml/config.sgml, move example of turning off synchronous_commit to a more logical place, to wit in the description of that variable rather than some other one.</li>

<li>In pgsql/doc/src/sgml/release.sgml, minor wordsmithing in release notes' description of asynchronous commit.</li>

<li>In pgsql/doc/src/sgml/ref/vacuum.sgml, fix mistaken duplicate reference to max_fsm_pages, per bug #3926. Also make links clickable.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/high-availability.sgml, add "Communication Method" row to HA feature matrix documentation.</li>

<li>Remove duplicate item, "Allow the PITR process to be debugged and data examined" from TODO.</li>

<li>Add to TODO: "Add autonomous transactions."</li>

<li>Add to TODO: "Improve deadlock detection when deleting items from shared buffers."</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, document the idea of creating a symbolic link in /tmp to prevent server spoofing when the socket file has been moved.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, update spoofing /tmp symlink instructions to be more specific about the name of the needed symlink file.</li>

<li>Add comment about possible URL changes for www7.hp.com:</li>

<li>Fix spelling typo in comment.</li>

<li>Update TODO to read: "Improve deadlock detection when a page cleaning lock conflicts with a shared buffer that is pinned."</li>

<li>Update FAQ for most recent release as 8.3.</li>

<li>Stamp 8.3 in CVS. _No_ update of configure/configure.in.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/catalogs.sgml, markup fix from Gevik Babakhani.</li>

<li>In pgsql/doc/src/sgml/keywords.sgml, update keywords table for 8.3.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, improve table reference.</li>

<li>Translation updates.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/gendef.pl, fix test that wrongly excluded some dumpbin symbols. Keep the intermediate symbol file rather then blowing it away, for easier debugging.</li>

<li>In pgsql/src/tools/msvc/gendef.pl, remove 3 hex digit limit on symbol number in recent fix.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/misc/ps_status.c, add pid to the pgident event name on win32. Should fix a problem where two clusters are running under two different service accounts and get colliding names, causing only the first cluster to contain the pgident event description. Per report from Stephen Denne.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>configure tag'd 8.3.0 and built witih autoconf 2.59</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pavel Stehule's patch to allow people to obfuscate PL/PgSQL functions, on grounds of its dependency on contrib/pgcrypto.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dean Rasheed sent in a patch to allow logging of the explain plan for each query.</li>

<li>Gokulakannan Somasundaram sent in another revision of his "thick index" patch.</li>

<li>Gregory Stark sent in a patch for doing prereading while doing bitmap index scans.</li>

<li>Simon Riggs sent in a patch to add TRUNCATE triggers to CVS HEAD. Intended for 8.4.</li>

<li>Tom Lane sent in a patch to fix bug #3921, which complained that CREATE TABLE LIKE INCLUDING INDEXES fails inappropriately for non-superusers.</li>

<li>Peter Eisentraut sent a patch to upgrade to autoconf 2.61 for 8.4</li>

</ul>