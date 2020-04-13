---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 mai 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-06-10-nouvelles-hebdomadaires-de-postgresql-31-mai-2009 "
---


<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>La version 1.0 de Sonar, une plate-forme open-source de gestion qualité de développement, supporte à présent PostgreSQL&nbsp;:

<a target="_blank" href="http://sonar.codehaus.org/">http://sonar.codehaus.org/</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 8.4 de la semaine</strong></p>

<p>array_agg(): La procédure standard SQL pour aggréger des valeurs dans un tableau. C'est maintenant officiel... et plus rapide.</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>Si vos requêtes avec agrégats sont lentes, essayez d'augmenter work_mem.</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090531">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-06/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay de Junin / Buenos Aires aura lieu le 6 juin à l'Unnoba&nbsp;:

<a target="_blank" href="http://www.arpug.com.ar/trac/wiki/PgDayUnnoba">http://www.arpug.com.ar/trac/wiki/PgDayUnnoba</a></li>

<li style="list-style-type: none; list-style-image: none; list-style-position: outside; display: inline;">

<p>La communauté PostgreSQL/PostGIS se réunira à Zurich le 6 juin 2009. Détails (de_CH)&nbsp;:

<a target="_blank" href="http://gis.hsr.ch/wiki/PostgreSQL-PostGIS-H%C3%B6ck">http://gis.hsr.ch/wiki/PostgreSQL-PostGIS-Höck</a></p>

</li>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel à conférenciers, plus d'infos sous peu&nbsp;!</li>

<li>La "PGCon Brazil" prendra place à l'Unicamp de Campinas (État de São Paulo) les 23 &amp; 24 octobre 2009.</li>

<li>Le PGDay.EU 2009 est programmé pour les 6 &amp; 7 novembre 2009 à Telecom ParisTech (ndt: ENST ?)&nbsp;:

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>Vos propositions de conférences sont attendues pour le 10<sup>ème</sup> anniversaire du JPUG. Le rassemblement aura lieu les 20 &amp; 21 novembre 2009 à Tokyo, Japan&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter, Josh Berkus et Guillaume Smet. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Add range checks to time_recv() and timetz_recv(), to prevent binary input of time values that would not be accepted via textual input. Per gripe from Andrew McNamara. This is potentially a back-patchable bug fix, but for the moment it doesn't seem sufficiently high impact to justify doing that.</li>

<li>Remove unused declarations of EncodeTimeOnly and DecodeTimeOnly.</li>

<li>Allow the second argument of pg_get_expr() to be just zero when deparsing an expression that's not supposed to contain variables. Per discussion with Gevik Babakhani, this eliminates the need for an ugly kluge (namely, specifying some unrelated relation name). Remove one such kluge from pg_dump.</li>

<li>Remove the useless and rather inconsistent return values of EncodeDateOnly, EncodeTimeOnly, EncodeDateTime, EncodeInterval. These don't have any good reason to fail, and their callers were mostly not checking anyway.</li>

<li>Improve documentation about function volatility: mention the snapshot visibility effects in a couple of places where people are likely to look for it. Per discussion of recent question from Karl Nack.</li>

<li>Ignore RECHECK in CREATE OPERATOR CLASS, just throwing a NOTICE, instead of throwing an error as 8.4 had been doing. The error interfered with porting old database definitions (particularly for pg_migrator) without really buying any safety. Per bug #4817 and subsequent discussion.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, improve release note explanation of the change in libpq's handling of default usernames versus Kerberos tickets. Per confusion about what bug #4824 was really about.</li>

<li>In pgsql/src/backend/catalog/index.c, update obsolete comment in index_drop(). When the comment was written, queries frequently took no lock at all on individual indexes. That's not true any more, but we still need lock on the parent table to make it safe to use cached lists of index OIDs.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, remove tabs from SGML file.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, document that forking while having open libpq connections is not advised.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-exec.c, reverting patch just in case a compiler treats this enum as signed.</li>

<li>Change macros to make gcc quiet when parsing.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Fix compiler warnings on Sun Studio of the sort '"tsquery_op.c", line 193: warning: syntax error: empty declaration.' Zdenek Kotala.</li>

<li>Fix to use the same format specifiers in both branches of a ngettext(). Zdenek Kotala.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/auth.c, properly return the usermap result when doing gssapi authentication. Without this, the username was in practice never matched against the kerberos principal used to log in.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, when archiving is enabled, rotate the last WAL segment at shutdown so that all transactions are archived. Original patch by Guillaume Smet.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>