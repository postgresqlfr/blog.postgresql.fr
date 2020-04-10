---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-406 "
---



<!--break-->

<p><strong>Offres d'emplois autour de Postgres en janvier</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-01/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>L'AaP pour l'OSCON de juillet 2008 (du 21 au 25) est ouvert. N'hésitez pas à proposer une présentation si vous pouvez être à Portland.</li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="http://fosdem.org/2008/schedule/devroom/bsdpostgresql">http://fosdem.org/2008/schedule/devroom/bsdpostgresql</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 28 et 29 mars 2008 à l'Université du Maryland, College Park&nbsp;. L'appel aux propositions a été lancé&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil). Les propositions de conférences sont attendues avant le 11 janvier&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Put spaces after "RFC".</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/datatype.sgml, fix invalid ipv6 address in example. Per doc comment 7211. Back-patch to 7.4.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix some missed copyright updates.</li>

<li>Update time zone data files to tzdata release 2007k.</li>

<li>Fix plpython's overoptimistic caching of information about the rowtype of a trigger's target table. The rowtype could change from one call to the next, so cope in such cases, while avoiding doing repetitive catalog lookups. Per bug #3847 from Mark Reid. Backpatch to 8.2.x. Likely this fix should go further back, but I can't test it because I no longer have a machine with a pre-2.5 Python installation. (Maybe we should rethink that idea about not supporting Python 2.5 in the older branches.)</li>

<li>Insert ARST into the list of known timezone abbreviations. Back-patch to 7.4.</li>

<li>Forbid ALTER TABLE and CLUSTER when there are pending AFTER-trigger events in the current backend for the target table. These operations move tuples around and would thus invalidate the TIDs stored in the trigger event records. (We need not worry about events in other backends, since acquiring exclusive lock should be enough to ensure there aren't any.) It might be sufficient to forbid only the table-rewriting variants of ALTER TABLE, but in the absence of any compelling use-case, let's just be safe and simple. Per follow-on investigation of bug #3847, though this is not actually the same problem reported therein. Possibly this should be back-patched, but since the case has never been reported from the field, I didn't bother.</li>

<li>Stamp release 8.3RC1.</li>

<li>A long time ago, Peter pointed out that ruleutils.c didn't dump simple constant ORDER/GROUP BY entries properly:

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2001-04/msg00457.php">http://archives.postgresql.org/pgsql-hackers/2001-04/msg00457.php</a> The original solution to that was in fact no good, as demonstrated by today's report from Martin Pitt: <a target="_blank" href="http://archives.postgresql.org/pgsql-bugs/2008-01/msg00027.php">http://archives.postgresql.org/pgsql-bugs/2008-01/msg00027.php</a> We can't use the column-number-reference format for a constant that is a resjunk targetlist entry, a case that was unfortunately not thought of in the original discussion. What we can do instead</li>

<li>(which did not work at the time, but does work in 7.3 and up) is to emit the constant with explicit ::typename decoration, even if it otherwise wouldn't need it. This is sufficient to keep the parser from thinking it's a column number reference, and indeed is probably what the user must have done to get such a thing into the querytree in the first place.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/configure.in, provide a more helpful error message when there is an autoconf version mismatch. Back-patch to 7.3.</li>

<li>In pgsql/doc/src/sgml/release.sgml, 8.3 is possible release on 2008-01-??, not 2007.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update release notes to match CVS HEAD.</li>

<li>In pgsql/doc/src/sgml/release.sgml, move a few release note items from "Utility Commands" to "Object Manipulation".</li>

<li>In pgsql/src/tools/copyright, modify copyright script to handle cases where there is only one year in the copyright.</li>

<li>Correct two more copyrights found by updated script.</li>

<li>Add to TODO: "Allow multiple identical NOTIFY events to always be communicated to the client, rather than sent as a single notification to the listener."</li>

<li>Add URL to TODO: 'Allow AS in "SELECT col AS label" to be optional (not wanted)'</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Pas de déception cette semaine :-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in a patch which changes the behavior of the archiver on shutdown.</li>

<li>Tom Lane sent in a patch to fix some OUTER JOIN misbehavior.</li>

</ul>