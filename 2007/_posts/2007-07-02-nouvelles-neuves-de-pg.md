---
layout: post
title: "Nouvelles neuves de PG"
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/186"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL du 1er Juillet 2007</strong></p>

<ul><li><p>Le PgDay.it a débuté cette semaine. Il comprend des présentations assurées par Josh Berkus, Federico Campoli, Paolo Cavallini, David Fetter et Enrico Pirozzi.</p>

</li></ul>

<!--more-->


<strong>Nouvelles des produits dérivés</strong>

<ul>

<li><p>Le site ht://miner dispose maintenant d'une version en anglais&nbsp;:

<a href="http://www.htminer.it/en/">http://www.htminer.it/en/</a></p>

</li>

<li><p>PostgreSQL Maestro 7.6 est sorti&nbsp;:

<a href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></p>

</li>

<li><p>SE-!PostgreSQL? 1.0 Beta est sorti&nbsp;:

<a href="http://code.google.com/p/sepgsql/">http://code.google.com/p/sepgsql/</a></p>

</li>

<li><p>Slony-I 1.2.10 est sorti&nbsp;:

<a href="http://slony.info/">http://slony.info/</a></p>

</li>

</ul>

<p><strong>Action locales autour de PostgreSQL</strong></p>

<ul>

<li>PDXPUG Day se déroulant à l'OSCON lance un appel à conférencier. Grace à la générosité d'O'Reilly, nous aurons droit à une journée entière de sessions de PostgreSQL le jour précédent l'OSCON (Dimanche 22 juillet). Changez les dates de vos tickets d'avion et inscrivez vous aux conférences!

<a href="http://developer.postgresql.org/index.php/OSCON07PGDay">http://developer.postgresql.org/index.php/OSCON07PGDay</a></li>

<li>Pgday.it se déroule au Prato, Toscane, en Italie le 6 et 7 juillet. C'est cette semaine!!!

Quelques URLs importantes&nbsp;:

<ul>

<li>Déroulement&nbsp;:

<a href="http://www.pgday.it/it/generale/programma">http://www.pgday.it/it/generale/programma</a></li>

<li>Inscription&nbsp;:

<a href="http://www.pgday.it/en/generale/registrazione%3C/a%3E%3C/li%3E%0A%3Cli%3ESite%20web%20du%20PGDay%C2%A0:%20%0A%3Ca%20href=" http:="" www.pgday.it="" en="">http://www.pgday.it/en/</a></li>

<li>Campagne de sponsoring&nbsp;:

<a href="http://www.pgday.it/en/sponsorizzazioni/come">http://www.pgday.it/en/sponsorizzazioni/come</a></li>

<li>Comment s'y rendre&nbsp;:

<a href="http://www.pgday.it/en/logistica/raggiungere_prato">http://www.pgday.it/en/logistica/raggiungere_prato</a></li>

<li>Hôtellerie au Patro&nbsp;:

<a href="http://www.pgday.it/en/logistica/dove_dormire">http://www.pgday.it/en/logistica/dove_dormire</a></li>

<li>T-shirts PostgreSQL officiels&nbsp;:

<a href="http://www.prato.linux.it/node/30">http://www.prato.linux.it/node/30</a></li>

<li>Key-signing Party&nbsp;:

<a href="http://www.pgday.it/en/keysigning">http://www.pgday.it/en/keysigning</a></li>

</ul>

</li>

</ul>

<p><strong>PostgreSQL dans la presse</strong></p>

<ul>

<li>Planet PostgreSQL: <a href="http://www.planetpostgresql.org/">

http://www.planetpostgresql.org/</a></li>

<li>General Bits, archives et nouveaux articles occasionnels sur&nbsp;:

<a href="http://www.varlena.com/%21GeneralBits/">http://www.varlena.com/!GeneralBits/</a></li>

</ul>

<p><em>

PostgreSQL Weekly News (en langue anglaise) est écrit cette semaine par David Fetter</em></p>

<p><strong><em>Attention&nbsp;: pour apparaitre dans les prochains numéros de PostgreSQL Weekly news, assurez vous d'avoir envoyé vos informations à <a href="mailto:david_at_fetter_dot_org">David Fetter</a> avant dimanche à 15:00, fuseau Pacifique (Pacific Time).</em></strong></p>

<p><strong>Corrections appliquées</strong></p>

<p>

Bruce Momjian a committé:

</p>

<ul>

<li>Mark TODO as done: "Reduce checkpoint performance degredation by forcing data to disk."

</li>

</ul>

Neil Conway a commité&nbsp;:

<ul>

<li>A patch which makes \df+ tell whether a function is IMMUTABLE, STABLE or VOLATILE.

</li>

</ul>

Tom Lane a commité&nbsp;:

<ul>

<li>Reduce the maximum sleep interval in the autovac launcher to 1 second, so that it responds to SIGQUIT reasonably promptly even on machines where SA_RESTART signals restart a sleep from scratch. (This whole area could stand some rethinking, but for now make it work like the other processes do.) Also some marginal stylistic cleanups.

</li>

<li>Treat the autovac launcher more like a regular backend, in that we wait for it to die before telling the bgwriter to initiate shutdown checkpoint. Since it's connected to shared memory, this seems more prudent than the alternative of letting it quit asynchronously. Resolves my complaint of yesterday about repeated shutdown checkpoints in CVS HEAD.

</li>

<li>Avoid memory leakage when a series of subtransactions invoke AFTER triggers that are fired at end-of-statement (as is the normal case for foreign keys, for example). In this situation the per-subxact deferred trigger context is always empty when subtransaction exit is reached; so we could free it, but were not doing so, leading to an intratransaction leak of 8K or more per subtransaction. Per off-list example from Viatcheslav Kalinin subsequent to bug #3418 (his original bug report omitted a foreign key constraint needed to cause this leak). Back-patch to 8.2; prior versions were not using per-subxact contexts for deferred triggers, so did not have this leak.

</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, fix comments not updated in recent patch.

</li>

<li>In pgsql/src/backend/postmaster/autovacuum.c, add 'volatile' to suppress 'variable might be clobbered by longjmp' warning emitted by some versions of gcc.

</li>

<li>Improve logging of checkpoints. Patch by Greg Smith, worked over by Heikki Linnakangas and a little bit by me.

</li>

<li>Fix computation of PG_VERSION_NUM by configure: remove unnecessary and unportable backslashes in awk script (per Patrick Welche), and add brackets to prevent autoconf from mangling sed's regexp (the sed call here never did what was expected).

</li>

<li>In pgsql/doc/src/sgml/backup.sgml, add a note that pg_start_backup will take awhile because of new distributed checkpoint behavior. Explain how to work around this by issuing a manual CHECKPOINT command. Per discussion with Heikki Linnakangas.

</li>

<li>Fix a passel of ancient bugs in to_char(), including two distinct buffer overruns (neither of which seem likely to be exploitable as security holes, fortunately, since the provoker can't control the data written). One of these is due to choosing to stomp on the output of a called function, which is bad news in any case; make it treat the called functions' results as read-only. Avoid some unnecessary palloc/pfree traffic too; it's not really helpful to free small temporary objects, and again this is presuming more than it ought to about the nature of the results of called functions. Per report from Patrick Welche and additional code-reading by Imad.

</li>

<li>Fix incorrect tests for undef Perl values in some places in plperl.c. The correct test for defined-ness is SvOK(sv), not anything involving SvTYPE. Per bug #3415 from Matt Taylor. Back-patch as far as 8.0; no apparent problem in 7.x.

</li>

<li>Implement "distributed" checkpoints in which the checkpoint I/O is spread over a fairly long period of time, rather than being spat out in a burst. This happens only for background checkpoints carried out by the bgwriter; other cases, such as a shutdown checkpoint, are

still done at full speed. Remove the "all buffers" scan in the bgwriter, and associated stats infrastructure, since this seems no longer very useful when the checkpoint itself is properly throttled. Original patch by Itagaki Takahiro, reworked by Heikki Linnakangas,

and some minor API editorialization by me.

</li>

<li>Fix PGXS conventions so that extensions can be built against Postgres installations whose pg_config program does not appear first in the PATH. Per gripe from Eddie Stanley and subsequent

discussions with Fabien Coelho and others.

</li>

</ul>

Magnus Hagander a commité&nbsp;:

<ul>

<li>Add notes about configuring Visual Studio Express for use with the Platform SDK.

</li>

<li>Andrew Dunstan's patch which adds extra checks for buildfarm to pick up errors when running on XP or earlier versions of Windows.

</li>

</ul>

Alvaro Herrera a commité&nbsp;:

<ul>

<li>Avoid crash in interrupted autovacuum worker, caused by leaving the current memory context pointing at a context not long lived enough. Also, create a fake PortalContext where to store the vac_context, if only to avoid having it be a top-level memory context.

</li>

<li>Arrange for SIGINT in autovacuum workers to cancel the current table and continue with the schedule. Change current uses of SIGINT to abort a worker into SIGTERM, which keeps the old behaviour of terminating the process. Patch from ITAGAKI Takahiro, with some editorializing of my own.

</li>

<li>Remove unused "caller" argument from stringToQualifiedNameList.

</li>

<li>Remove unused BAD_LOCATION definition.

</li>

<li>Improve autovacuum launcher's ability to detect a problem in worker startup, by having the postmaster signal it when certain failures occur. This requires the postmaster setting a flag in shared memory, but should be as safe as the pmsignal.c code is. Also make sure the launcher honor's a postgresql.conf change turning it off on SIGHUP.

</li>

</ul>

<p><strong>Correctifs rejetés(pour l'instant)</strong></p>

<ul>

<li>Alvaro Herrera's patch to remove SIBackendInit?'s return value.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Zdenek Kotala sent in a patch reflecting New Zealand's new DST rules.

</li>

<li>Gregory Stark sent in a patch to create reserved words for OLAP windowing functions.

</li>

<li>ITAGAKI Takahiro sent in a bug fix for pgstat_drop_relation.

</li>

<li>Pavan Deolasee sent in another version of his HOT patch.

</li>

<li>Dave Page sent in a patch which fixes some bugs in pg_ctl on Windows.

</li>

<li>Jacob Rief sent in a patch to make SPI-header-files safe for C++ compilers.

</li>

<li>Patrick Welche sent in a patch intended to address some issues with using XML on OpenBSD.

</li>

<li>Andrew Dunstan sent in two revisions of a patch intended to allow logging to CSV files.

</li>

<li>Heikki Linnakangas sent in a document update for pg_start_backup, notifying people that it may now take longer to finish.

</li>

<li>Kevin Grittner sent in two revisions of a document patch intended to clarify how warm standby works.

</li>

<li>Robert Treat sent in a patch to improve dblink's connection security.

</li>

<li>David Fetter sent in a two revisions of a patch which implements ALTER [VIEW | SEQUENCE] RENAME TO.

</li>

</ul>