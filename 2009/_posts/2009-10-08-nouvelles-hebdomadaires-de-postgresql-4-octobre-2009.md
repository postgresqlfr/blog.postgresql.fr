---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 octobre 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/10/08/Nouvelles-hebdomadaires-de-PostgreSQL-4-octobre-2009"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Bucardo 4.2.1, un syst&egrave;me de r&eacute;plication capable de g&eacute;rer deux instances "ma&icirc;tres"&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Bucardo">http://bucardo.org/wiki/Bucardo</a></li>

<li>pgpool-II 2.2.5, un gestionnaire de connexions et bien d'avantage&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>Marc Balmer a mis en place un wiki (en allemand)&nbsp;: 

<a target="_blank" href="http://www.postgres-support.com/">http://www.postgres-support.com/</a></li>

<li>Un plugin Wordpress rend ce dernier compatible avec PostgreSQL&nbsp;: 

<a target="_blank" href="http://wordpress.org/extend/plugins/postgresql-for-wordpress/">http://wordpress.org/extend/plugins/postgresql-for-wordpress/</a></li>

</ul>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20091004">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>[ndt] Guillaume Lelarge fera une conf&eacute;rence sur les solutions de r&eacute;plication avec PostgreSQL le 16 octobre lors des JDLL 2009 au CPE de Lyon (Villeurbanne)&nbsp;: 

<a target="_blank" href="http://jdll.org/edition-2009">http://jdll.org/edition-2009</a></li>

<li>Une suite de conf&eacute;rences est organis&eacute;e &agrave; Seattle (&Eacute;tat de Washington, &Eacute;tats-Unis) du 16 au 18 octobre 2009&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009. Les inscriptions sont ouvertes&nbsp;! 

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/">http://pgcon.postgresql.org.br/2009/</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

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

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/preproc/README.parser, added some explanation about how the parser is generated, taken from an email by Zoltan Boszormenyi.</li>

<li>In ECPG, applied patch by Zoltan Boszormenyi to fix memory leak in decimal handling.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plperl/plperl.c, convert a perl array to a postgres array when returned by Set Returning Functions as well as +non SRFs. Backpatch to 8.1 where these facilities were introduced. with a little help from Abhijit Menon-Sen.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix equivclass.c's not-quite-right strategy for handling X=X clauses. The original coding correctly noted that these aren't just redundancies (they're effectively X IS NOT NULL, assuming = is strict). However, they got treated that way if X happened to be in a single-member EquivalenceClass already, which could happen if there was an ORDER BY X clause, for instance. The simplest and most reliable solution seems to be to not try to process such clauses through the EquivalenceClass machinery; just throw them back for traditional processing. The amount of work that'd be needed to be smarter than that seems out of proportion to the benefit. Per bug #5084 from Bernt Marius Johnsen, and analysis by Andrew Gierth.</li>

<li>Allow MOVE FORWARD n, MOVE BACKWARD n, MOVE FORWARD ALL, MOVE BACKWARD ALL in plpgsql. Clean up a couple of corner cases in the MOVE/FETCH syntax. Pavel Stehule.</li>

<li>Assorted improvements in contrib/hstore. Remove the 64K limit on the lengths of keys and values within an hstore. (This changes the on-disk format, but the old format can still be read.) Add support for btree/hash opclasses for hstore --- this is not so much for actual indexing purposes as to allow use of GROUP BY, DISTINCT, etc. Add various other new functions and operators. Andrew (RhodiumToad) Gierth.</li>

<li>In pgsql/contrib/hstore/hstore_op.c, fix bogus Assert, per buildfarm results.</li>

<li>Support "samehost" and "samenet" specifications in pg_hba.conf, by enumerating the machine's IP interfaces to look for a match. Stef Walter.</li>

<li>Fix erroneous handling of shared dependencies (ie dependencies on roles) in CREATE OR REPLACE FUNCTION. The original code would update pg_shdepend as if a new function was being created, even if it wasn't, with two bad consequences: pg_shdepend might record the wrong owner for the function, and any dependencies for roles mentioned in the function's ACL would be lost. The fix is very easy: just don't touch pg_shdepend at all when doing a function replacement. Also update the CREATE FUNCTION reference page, which never explained exactly what changes and doesn't change in a function replacement. In passing, fix the CREATE VIEW reference page similarly; there's no code bug there, but the docs didn't say what happens.</li>

<li>Make sure that GIN fast-insert and regular code paths enforce the same tuple size limit. Improve the error message for index-tuple-too-large so that it includes the actual size, the limit, and the index name. Sync with the btree occurrences of the same error. Back-patch to 8.4 because it appears that the out-of-sync problem is occurring in the field. Teodor Sigaev and Tom Lane.</li>

<li>In pgsql/src/backend/postmaster/pgstat.c, fix an oversight in an 8.3-era patch: pgstat_initstats should allow stats to be collected for sequences. Report and fix by Akira Kurosawa.</li>

<li>Fix a couple of issues in recent patch to print updates to postgresql.conf settings: avoid calling superuser() in contexts where it's not defined, don't leak the transient copies of GetConfigOption output, and avoid the whole exercise in postmaster child processes. I found that actually no current caller of GetConfigOption has any use for its internal check of GUC_SUPERUSER_ONLY. But rather than just remove that entirely, it seemed better to add a parameter indicating whether to enforce the check. Per report from Simon and subsequent testing.</li>

<li>In pgsql/src/backend/libpq/hba.c, fix assorted memory leaks in pg_hba.conf parsing. Over a sufficiently large number of SIGHUP cycles, these would have run the postmaster out of memory. Noted while testing memory-leak scenario in postgresql.conf configuration-change-printing patch.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/stylesheet.dsl, add tooltips to the header links, and make title a link to the home page based on an idea by Richard Huxton.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Ensure that a cursor has an immutable snapshot throughout its lifespan. The old coding was using a regular snapshot, referenced elsewhere, that was subject to having its command counter updated. Fix by creating a private copy of the snapshot exclusively for the cursor. Backpatch to 8.4, which is when the bug was introduced during the snapshot management rewrite.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, document the purpose of the GUC listen_addresses.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in more fixes atop earlier Hot Standby patches.</li>

<li>Abhijit Menon-Sen sent in another patch to fix return_next in PL/Perl for arrays.</li>

<li>ITAGAKI Takahiro sent in two more revisions of the patch expanding the functionality of CREATE TABLE LIKE...</li>

<li>KaiGai Kohei sent in another revision of the large object ACL patch.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to refactor the executor to have nodes for INSERT, UPDATE and DELETE. This is among other things infrastructure for the Writeable CTE feature.</li>

<li>Alvaro Herrera sent in missing files from the patch to add per-ROLE, per-database GUC settings, then a patch for psql to make it display same.</li>

<li>Devrim GUNDUZ sent in a doc patch which updates links to some external projects.</li>

<li>Euler Taveira de Oliveira sent in a reviewed version of ITAGAKI Takahiro's patch to include buffer usage in EXPLAIN.</li>

<li>Brad T. Sliger sent in a revised version of the patch to allow Unicode codes for pretty-printing in psql.</li>

<li>KaiGai Kohei sent in a patch atop the ACL rework patch to eliminate permission checks in FindConversion() and EnableDisableRule().</li>

<li>Alvaro Herrera sent in three more revisions of the per-ROLE, per-database GUC patch.</li>

<li>Robert Leigh sent in two more revisions of the patch to add UTF8 pretty-printing to psql.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of the DefaulsACLs patch and a follow-up patch with adjusted docs.</li>

<li>Laurenz Albe sent in a patch to add a hook for checking password strength, per discussion.</li>

<li>Heikki Linnakangas sent in another patch for Hot Standby.</li>

<li>David Gould sent in a patch to limit the amount of memory allocated per session.</li>

<li>Brendan Jurd sent in a patch for the named/mixed notation for PL/pgsql.</li>

<li>ITAGAKI Takahiro sent in another revision of the buffer usage patch for EXPLAIN.</li>

<li>Fujii Masao sent in another revision of the Streaming Replication patch.</li>

<li>Jeff Davis sent in another revision of the mixed/named function notation patch for PL/pgsql.</li>

<li>Roger Leigh sent in another revision of the Unicode pretty-printing patch for psql, this time with a switch to change to ASCII format in UTF-8 locales.</li>

<li>KaiGai Kohei sent in another revision of the ACL rework patch.</li>

<li>Bernd Helmle sent in a patch atop the per-ROLE, per-database GUC settings patch which adds ALTER ROLE ... IN DATABASE functionality.</li>

<li>Pavel Stehule sent in another revision of the named/mixed PL/pgsql parameter notation based in part on Brendan Jurd's and Jeff Davis's patches.</li>

<li>Zoltan Boszormenyi sent in another ECPG patch for Informix compatibility.</li>

<li>Zoltan Boszormenyi sent another flock of patches for dynamic cursor names in ECPG.</li>

<li>Alvaro Herrera sent in a patch to remove the useless pushing of an active snapshot on PortalStart.</li>

<li>Ian Small sent in a patch which does alphagram fuzzy string matching.</li>

<li>Joe Conway sent in a patch to fix a memory leak in dblink.</li>

</ul>