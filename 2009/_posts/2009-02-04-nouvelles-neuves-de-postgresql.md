---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/02/04/Nouvelles-neuves-de-PostgreSQL"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 1<sup>er</sup> f&eacute;vrier 2009</strong></p>

<p>Des corrections de bugs seront bient&ocirc;t disponibles pour les s&eacute;ries 8.3, 8.2, 8.1, 8.0 et 7.4. Pr&eacute;parez-vous &agrave; mettre &agrave; jour&nbsp;!</p>

<p>Greg Smith a publi&eacute; la version 0.90 de pgtune sur pgfoundry&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgtune/">http://pgfoundry.org/projects/pgtune/</a></p>

<p>L'association des utilisateurs bulgares de PostgreSQL se r&eacute;uniront le 12 f&eacute;vrier 2009 &agrave; 19h au Vinarnata, 19 rue Lavele &agrave; Sofia&nbsp;: 

<a target="_blank" href="http://www.doodle.com/participation.html?pollId=vb788q7v8ybi4z39">http://www.doodle.com/participation.html?pollId=vb788q7v8ybi4z39</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Archiveopteryx 3.0.6, un syst&egrave;me de mails bas&eacute; sur PostgreSQL, est disponible&nbsp;: 

<a target="_blank" href="http://www.archiveopteryx.org/3.0.6">http://www.archiveopteryx.org/3.0.6</a></li>

<li>Le code client de Pgbuildfarm 3.2 est disponible. Mise &agrave; jour&nbsp;! 

<a target="_blank" href="http://pgfoundry.org/frs/download.php/2069/build-farm-3_2.tgz">http://pgfoundry.org/frs/download.php/2069/build-farm-3_2.tgz</a></li>

</ul>

<p><strong>L'astuce de la semaine</strong></p>

<p>Besoin d'unicit&eacute; sur seulement une partie d'une table, comme par exemple les noms des utilisateurs actifs&nbsp;? Utilisez un index partiel d'unicit&eacute;&nbsp;: <tt>CREATE UNIQUE INDEX ON logins&nbsp;(&nbsp;username&nbsp;) WHERE active&nbsp;=&nbsp;true;</tt></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090201">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Richard Broersma fait le lien entre les volontaires pour la rencontre de SCALE (cf. plus bas). Contact : richard POINT broersma CHEZ gmail POINT com.</li>

<li>Le SYDPUG se r&eacute;unira le 3 f&eacute;vrier 2009 &agrave; 18h30 chez Fujitsu Australia, Sydney Nord. Mark Leslie pr&eacute;sentera l'histoire et les motivations de PostGIS&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/sydpug/2009-01/msg00000.php">http://archives.postgresql.org/sydpug/2009-01/msg00000.php</a></li>

<li>Beaucoup des suspects habituels se retrouveront au FOSDEM les 7 &amp; 8 f&eacute;vrier &agrave; Bruxelles, Belgique&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.eu/wiki/FOSDEM_2009">http://wiki.postgresql.eu/wiki/FOSDEM_2009</a></li>

<li>Le JNBPUG se r&eacute;unira le 9 f&eacute;vrier &agrave; 19h au News Cafe sur New Road &agrave; Midrand.</li>

<li>Stephen Frost parlera des permissions "par colonnes" au BWPUG [ndt: Baltimore/Washington], le 9 f&eacute;vrier &agrave; 18h30 dans les bureaux d'OmniTI&nbsp;: 

<a target="_blank" href="http://pugs.postgresql.org/bwpug">http://pugs.postgresql.org/bwpug</a></li>

<li>Le "Prague PostgreSQL Developers' Day 2009" (P2D2) aura lieu le 12 f&eacute;vrier 2009&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/event.808">http://www.postgresql.org/about/event.808</a> Schedule: <a target="_blank" href="http://www.postgres.cz/p2d2/2009/sched_en.html">http://www.postgres.cz/p2d2/2009/sched_en.html</a></li>

<li>Le SFPUG est fier de pr&eacute;senter&nbsp;: Reece Hart, "Unison DB for Computational Biology", le 10 f&eacute;vrier 2009. Locations ouvertes aux les pr&eacute;inscrits&nbsp;: 

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/9351228/">http://postgresql.meetup.com/1/calendar/9351228/</a></li>

<li>PostgreSQL sera au "SCALE" du 20 au 22 f&eacute;vrier &agrave; Los Angeles&nbsp;: 

<a target="_blank" href="http://www.socallinuxexpo.org/">http://www.socallinuxexpo.org/</a></li>

<li>Conf&eacute;rence d'Andreas 'ads' Scherbaum lors du "Perl Workshop 2009" le 25 f&eacute;vrier &agrave; Francfort-sur-le-Main, en Allemagne&nbsp;: 

<a target="_blank" href="http://www.perl-workshop.de/talks/151/view">http://www.perl-workshop.de/talks/151/view</a></li>

<li>"PostgreSQL Conference, U.S." organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est visible &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/papers.php">http://www.pgcon.org/2009/papers.php</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Message format tuning in ecpg.</li>

<li>Revert updatable views.</li>

<li>Message fix in pgsql/src/interfaces/ecpg/preproc/parse.pl</li>

<li>Translation updates.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.c, whitespace fix in message.</li>

<li>In ecpg, Make messages consistent with existing ones.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Allow extracting and parsing of reloptions from a bare pg_class tuple, and refactor the relcache code that used to do that. This allows other callers (particularly autovacuum) to do the same without necessarily having to open and lock a table.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/pg_locale.c, silence compiler warnings in new win32 locale code when building on mingw. ITAGAKI Takahiro.</li>

<li>In pgsql/src/test/regress/pg_regress.c, silence compiler warning on win32. ITAGAKI Takahiro</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, support running as a service on Windows 7, by not specifying the JOB_OBJECT_UILIMIT_HANDLES flag. Dave Page &amp; Magnus Hagander</li>

<li>Go over all OpenSSL return values and make sure we compare them to the documented API value. The previous code got it right as it's implemented, but accepted too much/too little compared to the API documentation. Per comment from Zdenek Kotala.</li>

<li>In pgsql/src/test/regress/pg_regress.c, change warning-silencing code not to cast the pointer type, instead casting the value of the variable later. Per comments from Tom Lane.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/tsearch2/tsearch2.c, fix bug with multiple evaluation of tsearch2 compatibility trigger, trigger data should be restored. Backpatch only to 8.3 because previous versions don't have such layer.</li>

<li>In pgsql/src/backend/tsearch/spell.c, fix incorrect dereferencing of char* to array's index. Per report from Tommy Gildseth.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Replace argument-checking Asserts with regular test-and-elog checks in all encoding conversion functions. These are not can't-happen cases because it's possible to create a conversion with the wrong conversion function for the specified encoding pair. That would lead to an Assert crash in an Assert-enabled build, or incorrect conversion otherwise, neither of which is desirable. This would be a DOS issue if production databases were customarily built with asserts enabled, but fortunately that's not so. Per an observation by Heikki. Back-patch to all supported branches.</li>

<li>Update time zone data files to tzdata release 2009a: introduces Asia/Kathmandu as the preferred spelling of that zone name, corrects historical DST information for Switzerland and Cuba.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update back-branch release notes.</li>

<li>Defend against null input in analyze_requires_snapshot(), per report from Rushabh Lathia. Back-patch of patch of 2009-01-08. This is necessary in 8.3, as reported by Bjorn Munch. It's not currently necessary in 8.2, AFAICS, but seems best to include it there too.</li>

<li>In pgsql/src/backend/utils/adt/arrayfuncs.c, fix unnest() to handle a toasted input array safely. Per report from Alvaro Herrera.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Check that connection limit is within valid range. IOW, not &lt; -1. It's missing in older versions too, but it doesn't seem worth back-porting. All negative are just harmlessly treated as "no limit", and tightening the check might even brake an application that relies on it.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patch.</li>

<li>KaiGai Kohei sent in two doc patches atop his SE-PostgreSQL patches.</li>

<li>Brendan Jurd sent in an updated patch to correct the meridiem markers.</li>

<li>Zdenek Kotala sent in another revision of his space reservation patch.</li>

<li>Fujii Masao sent in another revision of the synchronous replication patch.</li>

<li>Simon Riggs sent in a bug fix atop the Hot Standby patch.</li>

<li>Heikki Linnakangas sent in two more revisions of the Recovery Infrastructure patch.</li>

<li>Kenneth Marshall sent in another revision of the updated hash functions patch.</li>

<li>Timo Savola sent in a patch which allows people to set a sample percentage for logging.</li>

<li>Alvaro Herrera sent in two more revisions of his patch to add namespaces to reloptions.</li>

<li>Fernando Ike de Oliveira sent in a patch to add \dL, which lists languages, to psql.</li>

<li>Andrew Dunstan sent in another revision of his parallel pg_dump patch.</li>

<li>Euler Taveira de Oliveira sent in two patchs atop Alvaro Herrera's reloptions patch.</li>

<li>Hiroshi Saito sent in three revisions of a patch to generate a .def (DLL symbol export) file for the event log plugin on mingw.</li>

<li>Robert Haas sent in a patch to optimize add_path in the planner.</li>

</ul>