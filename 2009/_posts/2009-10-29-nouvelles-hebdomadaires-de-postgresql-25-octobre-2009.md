---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 octobre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-10-29-nouvelles-hebdomadaires-de-postgresql-25-octobre-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>LISA 09 ("Large Installation and Systems Administration conference"&nbsp;: conf&eacute;rence sur les grandes installations et administration syst&egrave;me) sera tenue du 1er au 6 novembre 2009. Il y aura une rencontre PostgreSQL les mercredi et jeudi&nbsp;: 

<a target="_blank" href="http://www.usenix.org/event/lisa09/">http://www.usenix.org/event/lisa09/</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>[ndt] En bordure du PGDay.EU, David Fetter fera une conf&eacute;rence chez Parinux le 10 novembre. Plus d'infos&nbsp;: 

<a target="_blank" href="http://www.parinux.org/content/conference-postgresql-le-mardi-11-novembre-2009">http://www.parinux.org/content/conference-postgresql-le-mardi-11-novembre-2009</a></li>

<li>L'OpenSQL Camp de Portland est &agrave; la recherche de sponsors. Pensez &agrave; votre voyage d&egrave;s maintenant&nbsp;!&nbsp;:) 

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement &agrave; l'occasion du 10<sup>&egrave;me</sup> anniversaire du JPUG est programm&eacute; pour les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japon&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

<li>Le "Chemnitzer Linuxtage" aura lieu &agrave; Chemnitz (All.) les 13 &amp; 14 mars 2010&nbsp;: 

<a target="_blank" href="http://chemnitzer.linux-tage.de/">http://chemnitzer.linux-tage.de/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/RELEASE_CHANGES, update translation updating procedure. This pertains to some changes I made to automatically exclude translations below the 80% minimum.</li>

<li>Translations update for 8.5alpha2</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, preliminary release notes for 8.5alpha2.</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, finalize 8.5alpha2 release notes, with updates from Josh Berkus.</li>

<li>Version stamp 8.5alpha2.</li>

<li>When querying a table with child tables, do not check permissions on the child tables. This was found to be useless and confusing in virtually all cases, and also contrary to the SQL standard.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove add_missing_from GUC and associated parser support for "implicit RTEs". Per recent discussion, add_missing_from has been deprecated for long enough to consider removing, and it's getting in the way of planned parser refactoring. The system now always behaves as though add_missing_from were OFF.</li>

<li>Remove regex_flavor GUC, so that regular expressions are always "advanced" style by default. Per discussion, there seems to be hardly anything that really relies on being able to change the regex flavor, so the ability to select it via embedded options ought to be enough for any stragglers. Also, if we didn't remove the GUC, we'd really be morally obligated to mark the regex functions non-immutable, which'd possibly create performance issues.</li>

<li>Re-implement EvalPlanQual processing to improve its performance and eliminate a lot of strange behaviors that occurred in join cases. We now identify the "current" row for every joined relation in UPDATE, DELETE, and SELECT FOR UPDATE/SHARE queries. If an EvalPlanQual recheck is necessary, we jam the appropriate row into each scan node in the rechecking plan, forcing it to emit only that one row. The former behavior could rescan the whole of each joined relation for each recheck, which was terrible for performance, and what's much worse could result in duplicated output tuples. Also, the original implementation of EvalPlanQual could not re-use the recheck execution tree --- it had to go through a full executor init and shutdown for every row to be tested. To avoid this overhead, I've associated a special runtime Param with each LockRows or ModifyTable plan node, and arranged to make every scan node below such a node depend on that Param. Thus, by signaling a change in that Param, the EPQ machinery can just rescan the already-built test plan. This patch also adds a prohibition on set-returning functions in the targetlist of SELECT FOR UPDATE/SHARE. This is needed to avoid the duplicate-output-tuple problem. It seems fairly reasonable since the other restrictions on SELECT FOR UPDATE are meant to ensure that there is a unique correspondence between source tuples and result tuples, which an output SRF destroys as much as anything else does.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dave Page sent in two more revisions of the patch to make the connecting application name available for display and modification via a GUC.</li>

<li>Dean Rasheed sent in a WIP patch to scale up deferred UNIQUE constraints.</li>

<li>ITAGAKI Takahiro sent in a patch to implement a process utility hook.</li>

<li>ITAGAKI Takahiro sent in a patch to allow psql to and use Byte Order Marks.</li>

<li>ITAGAKI Takahiro sent in another revision of a patch which adds the option to add an SQL:2008-compliant WHEN clause to trigger definitions.</li>

<li>Marko (johto) Tiikkaja sent in a WIP patch implementing writeable CTEs.</li>

<li>ITAGAKI Takahiro sent in a WIP patch to make VACUUM FULL unneeded</li>

<li>Magnus Hagander sent in a patch to parse all configuration files in a directory. This is, among other things, infrastructure for tools which could manipulate such files.</li>

<li>Roger Leigh sent in three more revisions of the Unicode pretty-print patch for psql.</li>

<li>Jeff Davis sent in another revision of the operator exclusion constraints patch.</li>

</ul>