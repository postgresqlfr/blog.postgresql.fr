---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 juillet 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-07-10-nouvelles-hebdomadaires-de-postgresql-5-juillet-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-07/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le pgDay San Jose est programm&eacute; pour le dimanche 19 juillet, juste avant l'OSCON. Inscription ci-dessous&nbsp;: 

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/10626647">http://postgresql.meetup.com/1/calendar/10626647</a></li>

<li>L'"OpenSQL Camp" aura lieu les 22 &amp; 23 ao&ucirc;t &agrave; S<sup>t</sup> Augustin (All.), pr&egrave;s de Bonn et de Cologne. La date limite pour les propositions de conf&eacute;rences est le 19 juillet 2009&nbsp;: 

<a target="_blank" href="http://opensqlcamp.org/Events/2009/Call_for_Participation">http://opensqlcamp.org/Events/2009/Call_for_Participation</a></li>

<li>Le PUG allemand a obtenu un emplacement d&eacute;veloppeur au FrOSCon le dimanche 23 ao&ucirc;t 2009. L'appel &agrave; conf&eacute;rences est ouvert&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/573-Call-for-Papers-fuer-den-PostgreSQL-Devroom-auf-der-FrOSCon-2009.html">http://andreas.scherbaum.la/blog/archives/573-Call-for-Papers-fuer-den-PostgreSQL-Devroom-auf-der-FrOSCon-2009.html</a></li>

<li>L'appel &agrave; conf&eacute;rences pour la "PyCon Argentina" est lanc&eacute; jusqu'&agrave; la date du 29 juin 2009, 23h59 ART [ndt: UTC-3 ?]. La conf&eacute;rence elle-m&ecirc;me aura lieu &agrave; Buenos Aires les 4 &amp; 5 septembre 2009&nbsp;: 

<a target="_blank" href="http://ar.pycon.org/2009/rfp/">http://ar.pycon.org/2009/rfp/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 7 au 11 septembre 2009 sur le sujet "PostgreSQL for Corporate Use". D&eacute;tails ci-dessous&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html">http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html</a></li>

<li style="list-style: none; display: inline">

<p>Il y aura une conf&eacute;rence &agrave; Athens (Georgie, &Eacute;tats-Unis) le 19 septembre 2009. L'appel aux conf&eacute;rences est ouvert&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/pgday/athens">http://www.postgresqlconference.org/2009/pgday/athens</a></p>

</li>

<li>Une suite de conf&eacute;rences est organis&eacute;e &agrave; Seattle (&Eacute;tat de Washington, &Eacute;tats-Unis) du 16 au 18 octobre 2009. L'appel &agrave; conf&eacute;rences est ouvert&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009. L'appel &agrave; conf&eacute;rences est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/chamadas.en.php">http://pgcon.postgresql.org.br/2009/chamadas.en.php</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech [ndt: ENST ?]&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>Vos propositions de conf&eacute;rences sont attendues pour le 10<sup>&egrave;me</sup> anniversaire du JPUG. Le rassemblement aura lieu les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japan&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter, Josh Berkus et Devrim Gunduz. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/include/Makefile, add missed src/include/foreign subdirectory to the set installed into INSTALLDIR/include/server/. Itagaki Takahiro</li>

<li>Stamp HEAD as 8.5devel.</li>

<li>Remove useless References column for pg_listener catalog description. Per Shigehiro Honda.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, fix up pg_dump's --binary-upgrade option so that it behaves properly with inherited columns and check constraints. Per my recent trouble report.</li>

<li>Fix handling of changed-Param signaling for CteScan plan nodes. We were using the "cteParam" as a proxy for the possibility that the underlying CTE plan depends on outer-level variables or Params, but that doesn't work very well because it sometimes causes calling subqueries to be treated as SubPlans when they could be InitPlans. This is inefficient and also causes the outright failure exhibited in bug #4902. Instead, leave the cteParam out of it and copy the underlying CTE plan's extParams directly. Per bug #4902 from Marko (johto) Tiikkaja.</li>

<li>In pgsql/src/backend/parser/gram.y, per SQL spec (in particular, the grammar in SQL:2008 7.13) we should allow parentheses around the &lt;query expression body&gt; that follows a WITH clause, eg with cte(foo) as ( values(0) ) ((select foo from cte)); This seems to be just an oversight/thinko in gram.y. Noted while experimenting with bug #4902.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Regression test for XML mapping functionality. I wrote this one while chasing down some bugs in the closing days of 8.4. It could be useful in the long run. This area of the code had no test coverage at all before.</li>

<li>Upgrade to Autoconf 2.63. This upgrades the configure infrastructure to the latest Autoconf version. Some notable news are: the workaround for the broken fseeko() test is gone, checking for unknown options is now provided by Autoconf itself, and fixes for Mac OS X.</li>

<li>In pgsql/src/bin/psql/describe.c, have \d show child tables that inherit from the specified parent. As per discussion, \d shows only the number of child tables, because that could be hundreds, when used for partitioning. \d+ shows the actual list. Damien Clochard</li>

<li>Add log_line_prefix placeholder %e to contain the current SQL state. Guillaume Smet</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Lars Kanis sent in a patch to extend user mappings in pg_ident.conf.</li>

<li>Robert Haas sent in another revision of his generated header file handling patch.</li>

<li>Jeremy Kerr sent in three revisions of a patch to avoid manual shift-and-test logic in AllocSetFreeIndex.</li>

<li>Robert Haas sent in a patch to autogenerate headers and bki.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patches.</li>

<li>Hans-Juergen Schoenig sent in a patch to transform a tsvector to table format.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of his GRANT ON ALL IN SCHEMA patch.</li>

<li>Fujii Masao sent in a patch to provide support for multiplexing the SIGUSR1 signal.</li>

<li>Fujii Masao sent in a patch to provide support for non-blocking communication between a frontend and a backend.</li>

<li>Zoltan Boszormenyi sent in two revisions of a patch to add a "string" pseudo-type to ECPG.</li>

<li>Gregory Stark sent in a WIP patch to add a Merge Append node, part of querying partitioned tables more efficiently.</li>

<li>Jeff Davis sent in a WIP patch to allow generalized UNIQUE constraints such as "doesn't overlap."</li>

<li>Dimitri Fontaine sent in a patch to allow people to run process_local_preload_libraries from within a transaction.</li>

</ul>