---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 octobre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-10-14-nouvelles-hebdomadaires-de-postgresql-11-octobre-2009 "
---



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

<li>Federico Campoli fera une pr&eacute;sentation PostgreSQL lors de la journ&eacute;es Linux de Pise organis&eacute;e par le GULP, le 24 octobre 2009. Informations en italien ci-dessous&nbsp;: 

<a target="_blank" href="http://linuxday2009.gulp.linux.it/">http://linuxday2009.gulp.linux.it/</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech. Les inscriptions sont ouvertes&nbsp;: 

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

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Create an ALTER DEFAULT PRIVILEGES command, which allows users to adjust the privileges that will be applied to subsequently-created objects. Such adjustments are always per owning role, and can be restricted to objects created in particular schemas too. A notable benefit is that users can override the traditional default privilege settings, eg, the PUBLIC EXECUTE privilege traditionally granted by default for functions. Petr (PJMODOS) Jelinek.</li>

<li>Change CREATE TABLE so that column default expressions coming from different inheritance parent tables are compared using equal(), instead of doing strcmp() on the nodeToString representation. The old implementation was always a tad cheesy, and it finally fails completely as of 8.4, now that the node tree might contain syntax location information. equal() knows it's supposed to ignore those fields, but strcmp() hardly can. Per recent report from Scott Ribe.</li>

<li>Support use of function argument names to identify which actual arguments match which function parameters. The syntax uses AS, for example funcname(value AS arg1, anothervalue AS arg2). Pavel Stehule.</li>

<li>Update plhandler.sgml to describe validators and inline handlers for procedural languages.</li>

<li>Remove very ancient tuple-counting infrastructure (IncrRetrieved() and friends). This code has all been ifdef'd out for many years, and doesn't seem to have any prospect of becoming any more useful in the future. EXPLAIN ANALYZE is what people use in practice, and I think if we did want process-wide counters we'd be more likely to put in dtrace events for that than try to resurrect this code. Get rid of it so as to have one less detail to worry about while refactoring execMain.c.</li>

<li>Split the processing of INSERT/UPDATE/DELETE operations out of execMain.c. They are now handled by a new plan node type called ModifyTable, which is placed at the top of the plan tree. In itself this change doesn't do much, except perhaps make the handling of RETURNING lists and inherited UPDATEs a tad less klugy. But it is necessary preparation for the intended extension of allowing RETURNING queries inside WITH. Marko (johto) Tiikkaja.</li>

<li>Improve similar_escape() in two different ways: 1. Stop escaping ? and {. As of SQL:2008, SIMILAR TO is defined to have POSIX-compatible interpretation of ? as well as {m,n} and related constructs, so we should allow these things through to our regex engine. 2. Escape ^ and $. It appears that our regex engine will treat ^^ at the beginning of the string the same as ^, and similarly for $$ at the end of the string, which meant that SIMILAR TO was effectively ignoring ^ at the start of the pattern and $ at the end. Since these are not supposed to be metacharacters, this is a bug. The second part of this is arguably a back-patchable bug fix, but I'm hesitant to do that because it might break applications that are expecting something like "col SIMILAR TO '^foo$'" to work like a POSIX pattern. Seems safer to only change it at a major version boundary. Per discussion of an example from Doug Gorley.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/Makefile, unbreak doc/src/sgml maintainer-clean rule on VPATH builds.</li>

<li>In pgsql/doc/src/sgml/Makefile, really unbreak maintainer-clean. (Or rather, unbreak what the previous commit broke)</li>

<li>Fix snapshot management, take two. Partially revert the previous patch I installed and replace it with a more general fix: any time a snapshot is pushed as Active, we need to ensure that it will not be modified in the future. This means that if the same snapshot is used as CurrentSnapshot, it needs to be copied separately. This affects serializable transactions only, because CurrentSnapshot has already been copied by RegisterSnapshot and so PushActiveSnapshot does not think it needs another copy. However, CommandCounterIncrement would modify CurrentSnapshot, whereas ActiveSnapshots must not have their command counters incremented. I say "partially" because the regression test I added for the previous bug has been kept. (This restores 8.3 behavior, because before snapmgr.c existed, any snapshot set as Active was copied.) Per bug report from Stuart Bishop.</li>

<li>Make it possibly to specify GUC params per user and per database. Create a new catalog pg_db_role_setting where they are now stored, and better encapsulate the code that deals with settings into its realm. The old datconfig and rolconfig columns are removed. psql has gained a \drds command to display the settings. Backwards compatibility warning: while the backwards-compatible system views still have the config columns, they no longer completely represent the configuration for a user or database. Catalog version bumped.</li>

<li>Add the new psql command \drds to the psql docs, help and tab completion. I also thank Bernd Helmle for the documentation help on the previous settings patch, which I forgot on the commit message.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/Makefile, clean up the clean rules of the documentation. Most things should be cleaned by "make clean", except the parts that are shipped in the tarball. These rules had gotten a bit out of whack after the various restructurings of the documentation build rules.</li>

<li>Use pg_get_triggerdef in pg_dump. Add a variant of pg_get_triggerdef with a second argument "pretty" that causes the output to be formatted in the way pg_dump used to do. Use this variant in pg_dump with server versions &gt;= 8.5. This insulates pg_dump from most future trigger feature additions, such as the upcoming column triggers patch. Itagaki Takahiro.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix off-by-one bug in bitncmp(): When comparing a number of bits divisible by 8, bitncmp() may dereference a pointer one byte out of bounds. Chris Mikkelson (bug 5101).</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in another revision of the buffer usage patch for EXPLAIN and pg_stat_statements.</li>

<li>Zoltan Boszormenyi sent in another revision of the SQLDA patch for ECPG.</li>

<li>Martin Pihlak sent in a patch to fix a regression test breakage in foreign data wrappers when a system user exists with the same name.</li>

<li>Andrew (RhodiumToad) Gierth sent in a WIP patch to add ORDER BY to array_agg() per SQL:2008.</li>

<li>Emmanuel Cecchet sent in another revision of the COPY enhancement patch.</li>

<li>Roger Leigh sent in four more revisions of the patch to do Unicode pretty-printing in psql.</li>

<li>KaiGai Kohei sent in two more revisions of the patch for large object access controls.</li>

<li>Andreas 'ads' Scherbaum sent in another revision of the patch to add CREATE OR REPLACE LANGUAGE.</li>

<li>Simon Riggs sent in another revision of the Hot Standby patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to fix the console and eventlog issues on Win32.</li>

<li>Simon Riggs sent in a patch to add more "if (InHotStandby)" tests to Hot Standby.</li>

<li>Simon Riggs sent in a patch to fix a subtransaction issue in Hot Standby.</li>

<li>Zoltan Boszormenyi sent in two more revisions of the SQLDA patch for ECPG along with a doc patch intended to go with.</li>

<li>Laurenz Albe sent in patches to add a hook which allows checking cryptographic strength of passwords, a module which uses the hook and documentation for the module.</li>

<li>Petr (PJMODOS) Jelinek sent in another revsion of the GRANT ON ALL IN SCHEMA patch.</li>

</ul>