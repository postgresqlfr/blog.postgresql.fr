---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 octobre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-10-22-nouvelles-hebdomadaires-de-postgresql-18-octobre-2009 "
---


<p>La Commitfest 2009-09 est maintenant termin&eacute;e. Vous pouvez d&egrave;s &agrave; pr&eacute;sent recommencer &agrave; travailler sur vos propres patchs&nbsp;:)</p>

<p>La "PostgreSQL Conference (JDCon) West" s'est conclue aujourd'hui. Merci &agrave; toutes les merveilleuses personnes de Seattle pour en avoir fait un succ&egrave;s.</p>

<p>[ndt] Fin des inscriptions au PGDay.EU 2009 vendredi 23 au soir. Apr&egrave;s cette date, ce sera sur place avec une majoration.</p>

<p>[ndt] En bordure du PGDay.EU, David Fetter fera une conf&eacute;rence chez Parinux le 10 novembre. Plus d'infos&nbsp;: 

<a target="_blank" href="http://www.parinux.org/content/conference-postgresql-le-mardi-11-novembre-2009">http://www.parinux.org/content/conference-postgresql-le-mardi-11-novembre-2009</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PWN Translator 3.0, un script d'aide &agrave; la traduction des Nouvelles Hebdomadaires de PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pwn-translation/">http://pgfoundry.org/projects/pwn-translation/</a></li>

<li>Benetl 3.2, un outil d'ETL pour fichiers&nbsp;: 

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>Bucardo 4.3.0, un syst&egrave;me de r&eacute;plication capable de g&eacute;rer deux instances "ma&icirc;tres"&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Bucardo">http://bucardo.org/wiki/Bucardo</a></li>

</ul>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20091018">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-10/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

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

<li>Move the handling of SELECT FOR UPDATE locking and rechecking out of execMain.c and into a new plan node type LockRows. Like the recent change to put table updating into a ModifyTable plan node, this increases planning flexibility by allowing the operations to occur below the top level of the plan tree. It's necessary in any case to restore the previous behavior of having FOR UPDATE locking occur before ModifyTable does. This partially refactors EvalPlanQual to allow multiple rows-under-test to be inserted into the EPQ machinery before starting an EPQ test query. That isn't sufficient to fix EPQ's general bogosity in the face of plans that return multiple rows per test row, though. Since this patch is mostly about getting some plan node infrastructure in place and not about fixing ten-year-old bugs, I will leave EPQ improvements for another day. Another behavioral change that we could now think about is doing FOR UPDATE before LIMIT, but that too seems like it should be treated as a followon patch.</li>

<li>Support GRANT/REVOKE ON ALL TABLES/SEQUENCES/FUNCTIONS IN SCHEMA. Petr Jelinek</li>

<li>Use plurals (TABLES, FUNCTIONS, etc) in ALTER DEFAULT PRIVILEGES. We have the keywords as a consequence of the GRANT ALL patch, so we might as well use them and make the ALTER commands read more naturally.</li>

<li>Code review for LIKE INCLUDING patch --- clean up some cosmetic and not so cosmetic stuff.</li>

<li>In pgsql/src/backend/utils/adt/tsvector_op.c, fix ts_stat's failure on empty tsvector. Also insert a couple of Asserts that check for stack overflow. Bogus coding appears to be new in 8.4 --- older releases had a much simpler algorithm here. Per bug #5111.</li>

<li>Add "\pset linestyle ascii/unicode" option to psql, allowing our traditional ASCII-art style of table output to be upgraded to use Unicode box drawing characters if desired. By default, psql will use the Unicode characters whenever client_encoding is UTF8. The patch forces linestyle=ascii in pg_regress usage, ensuring we don't break the regression tests in Unicode locales. Roger Leigh.</li>

<li>Support SQL-compliant triggers on columns, ie fire only if certain columns are named in the UPDATE's SET list. Note: the schema of pg_trigger has not actually changed; we've just started to use a column that was there all along. catversion bumped anyway so that this commit is included in the history of potentially interesting changes to system catalog contents. Itagaki Takahiro.</li>

<li>In pgsql/src/pl/plpython/expected/plpython_unicode_0.out, first committed version of plpython_unicode_0.out did not actually contain the required \200 bytes. Let's see if this commit works, or if CVS is messing it up.</li>

<li>In pgsql/src/backend/libpq/auth.c, rewrite pam_passwd_conv_proc to be more robust: avoid assuming that the pam_message array contains exactly one PAM_PROMPT_ECHO_OFF message. Instead, deal with however many messages there are, and don't throw error for PAM_ERROR_MSG and PAM_TEXT_INFO messages. This logic is borrowed from openssh 5.2p1, which hopefully has seen more real-world PAM usage than we have. Per bug #5121 from Ryan Douglas, which turned out to be caused by the conv_proc being called with zero messages. Apparently that is normal behavior given the combination of Linux pam_krb5 with MS Active Directory as the domain controller. Patch all the way back, since this code has been essentially untouched since 7.4. (Surprising we've not heard complaints before.)</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>CREATE LIKE INCLUDING COMMENTS and STORAGE, and INCLUDING ALL shortcut. Itagaki Takahiro.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Add new PGC_S_DATABASE_USER enum value to several places missed by my patch last week. Per note and patch from Jeff Davis.</li>

<li>Avoid using trivial usernames in foreign_data regression test. Martin Pihlak.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/func.sgml, replace unmatched " by " to avoid throwing off syntax highlighters.</li>

<li>Add alternative expected file for unicode test for client encoding not UTF8.</li>

<li>In the configure check for the Python distutils module, use a less obscure shell construct to hide away the stderr output. Python 3.1 actually core dumps on the current invocation ( 

<a target="_blank" href="http://bugs.python.org/issue7111),">http://bugs.python.org/issue7111),</a> but the new version also has the more general advantage of saving the error message in config.log for analysis.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/auth.c, raise the maximum authentication token (Kerberos ticket) size in GSSAPI and SSPI athentication methods. While the old 2000 byte limit was more than enough for Unix Kerberos implementations, tickets issued by Windows Domain Controllers can be much larger. Ian Turner.</li>

<li>In pgsql/src/backend/libpq/auth.c, rename the new MAX_AUTH_TOKEN_LENGTH #define to PG_MAX_AUTH_MAX_TOKEN_LENGTH, to make it more obvious that it's a PostgreSQL internal limit, not something that comes from system header files.</li>

<li>In pgsql/src/bin/scripts/vacuumdb.c, FREEZE and VERBOSE options were in wrong order in the VACUUM command that vacuumdb produces. Per report by Thom Brown.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Made ECPG more robust against applications freeing strings, based on patch send in by Zoltan Boszormenyi.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>Write to the Windows eventlog in UTF16, converting the message encoding as necessary. Itagaki Takahiro with some changes from me.</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, fix typo in previous release as reported by Itagaki Takahiro, but missed by me.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Laurenz Albe sent in another revision of the patch to create a hook to test password cryptgraphic strength along with a contrib module to use the hook.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to fix encoding issues and eventlog on Win32.</li>

<li>KaiGai Kohei sent in another revision of the patch for large object ACLs.</li>

<li>Dave Page sent in a WIP patch to add an application_name GUC which optionally shows the name of the connecting application.</li>

<li>Peter Eisentraut sent in an updated version of the per-column trigger patch.</li>

<li>KaiGai Kohei sent in another revision of the ACL rework patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the per-column trigger patch.</li>

<li>Zoltan Boszormenyi sent a patch that makes ECPG more robust against applications that free() strings by storing its own copy of the prepared statement name.</li>

<li>ITAGAKI Takahiro sent in a patch to prevent table rewrites caused by ALTER TABLE from writing WALs.</li>

<li>Heikki Linnakangas sent in an updated patch for Hot Standby.</li>

<li>ITAGAKI Takahiro sent in a patch for contrib/auto_explain which adds EXPLAIN (ANALYZE|BUFFERS).</li>

<li>ITAGAKI Takahiro sent in a WIP patch to add WHEN to triggers.</li>

<li>Dave Page sent in another revision of the patch to add an application_name GUC and supporting features for same.</li>

</ul>