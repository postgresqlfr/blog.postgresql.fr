---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 décembre 2012"
author: "NBougain"
redirect_from: "index.php?post/2013-01-06-nouvelles-hebdomadaires-de-postgresql-30-decembre-2012 "
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>dbForge Data Compare pour PostgreSQL, un outil de diff&eacute;renciation et de synchronisation de donn&eacute;es pour PostgreSQL qui permet de passer en revue toutes les diff&eacute;rences entre des tables et ex&eacute;cuter le script automatiquement g&eacute;n&eacute;r&eacute; pour r&eacute;soudre ces diff&eacute;rends&nbsp; 

<a target="_blank" href="http://www.devart.com/dbforge/postgresql/datacompare/">http://www.devart.com/dbforge/postgresql/datacompare/</a></li>

<li>pgFormatter v1.1, un outil de formatage/mise en forme/coloration syntaxique en ligne g&eacute;rant les mots clefs des standards SQL-92, SQL-99, SQL-2003, SQL-2008, SQL-2011 et ceux de PostgreSQL 

<a target="_blank" href="http://sqlformat.darold.net/">http://sqlformat.darold.net/</a></li>

<li>PG Jobmon version 1.0.0, une extension pour logger hors du syst&egrave;me transactionnel et surveiller l'ex&eacute;cution de fonctions&nbsp;: 

<a target="_blank" href="https://github.com/omniti-labs/pg_jobmon">https://github.com/omniti-labs/pg_jobmon</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-12/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La conf&eacute;rence PGDay du FOSDEM sera tenue juste avant l'ouverture du meeting, le 1er f&eacute;vrier &agrave; Bruxelles, Belgique. Les appels &agrave; conf&eacute;renciers, pour cette conf&eacute;rence et pour le cursus PostgreSQL du FOSDEM, sont lanc&eacute;s&nbsp;: 

<a target="_blank" href="http://fosdem2013.pgconf.eu/callforpapers/">http://fosdem2013.pgconf.eu/callforpapers/</a></li>

<li>Il y aura un PyPgDay le 13 mars 2013, le premier jour de la PyCon, au p&ocirc;le de conventions de Santa Clara&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PyPgDay2013">http://wiki.postgresql.org/wiki/PyPgDay2013</a> Soumettez votre proposition avant le 20 janvier 2013 &agrave; cette adresse&nbsp;: <a target="_blank" href="http://tinyurl.com/PyPgDayCfP">http://tinyurl.com/PyPgDayCfP</a></li>

<li>Le PGDay 2013 de New-York City aura lieu le 22 mars. La date limite de candidature des conf&eacute;renciers est fix&eacute;e au 7 janvier 2013, midi (heure de New-York). Envois &agrave; l'adresse papers AT nycpug DOT org&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org/speakers">http://pgday.nycpug.org/speakers</a></li>

<li>PostgreSQL Session will be held on March 28th, 2013 in Paris, France. The Call for Papers is open. 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></li>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2013-01/msg00000.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add function prototype from previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2dcb2ebee2ec830fbe547459b2176238efc2a3e0">http://git.postgresql.org/pg/commitdiff/2dcb2ebee2ec830fbe547459b2176238efc2a3e0</a></li>

<li>Fix more weird compiler messages caused by unmatched function prototypes. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42fa810c144cb76c911cc664244bc369911eb840">http://git.postgresql.org/pg/commitdiff/42fa810c144cb76c911cc664244bc369911eb840</a></li>

<li>Keep rd_newRelfilenodeSubid across overflow. Teach RelationCacheInvalidate() to keep rd_newRelfilenodeSubid across rel cache message overflows, so that behaviour is now fully deterministic. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae9aba69a8608c6e5df01ee4f20c4799f5d2850c">http://git.postgresql.org/pg/commitdiff/ae9aba69a8608c6e5df01ee4f20c4799f5d2850c</a></li>

<li>Update comments on rd_newRelfilenodeSubid. Ensure comments accurately reflect state of code given new understanding, and recent changes. Include example code from Noah Misch to illustrate how rd_newRelfilenodeSubid can be reset deterministically. No code changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2b32180649fe9105e784ad0519fe243605f78a3">http://git.postgresql.org/pg/commitdiff/c2b32180649fe9105e784ad0519fe243605f78a3</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix some minor issues in view pretty-printing. Code review for commit 2f582f76b1945929ff07116cd4639747ce9bb8a1: don't use a static variable for what ought to be a deparse_context field, fix non-multibyte-safe test for spaces, avoid useless and potentially O(N2) (though admittedly with a very small constant) calculations of wrap positions when we aren't going to wrap. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f88b080030682adf359248c9cb7f8b2068a539e">http://git.postgresql.org/pg/commitdiff/3f88b080030682adf359248c9cb7f8b2068a539e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_upgrade --jobs parameter. Add pg_upgrade --jobs, which allows parallel dump/restore of databases, which improves performance. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f1b9e4efd94fc644f5de5377829d42e48c3c758">http://git.postgresql.org/pg/commitdiff/6f1b9e4efd94fc644f5de5377829d42e48c3c758</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Replace "NOTE" with proper markup 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/925ce77c0359eff9310f7954294f257dafb0c2db">http://git.postgresql.org/pg/commitdiff/925ce77c0359eff9310f7954294f257dafb0c2db</a></li>

<li>doc: Correct description of LDAP authentication. Parts of the description had claimed incorrect pg_hba.conf option names for LDAP authentication. Laurenz Albe. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/103cc89362accb04cf37a9063e51eac04d489e89">http://git.postgresql.org/pg/commitdiff/103cc89362accb04cf37a9063e51eac04d489e89</a></li>

<li>Fix compiler warning about uninitialized variable 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e690209eec61f8b70c57f8feeab0a3cd853103b">http://git.postgresql.org/pg/commitdiff/0e690209eec61f8b70c57f8feeab0a3cd853103b</a></li>

<li>doc: Correct description of ldapurl. The ldapurl option doesn't actually support specifying a user name and password. Laurenz Albe. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7eb559a86d773e0105ae5823e0c776c3af3c3fe2">http://git.postgresql.org/pg/commitdiff/7eb559a86d773e0105ae5823e0c776c3af3c3fe2</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove unused NextLogPage macro. Commit 061e7efb1b did away with its last caller, but neglected to remove the actual definition. Author: Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eaa1f7220ae83997b56adcae1fbb7b2e92bfc050">http://git.postgresql.org/pg/commitdiff/eaa1f7220ae83997b56adcae1fbb7b2e92bfc050</a></li>

<li>Assign InvalidXLogRecPtr instead of MemSet(0) For consistency. Author: Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24eca7977ed208de33791af8890975ffcf086598">http://git.postgresql.org/pg/commitdiff/24eca7977ed208de33791af8890975ffcf086598</a></li>

<li>Remove obsolete XLogRecPtr macros. This gets rid of XLByteLT, XLByteLE, XLByteEQ and XLByteAdvance. These were useful for brevity when XLogRecPtrs were split in xlogid/xrecoff; but now that they are simple uint64's, they are just clutter. The only downside to making this change would be ease of backporting patches, but that has been negated by other substantive changes to the involved code anyway. The clarity of simpler expressions makes the change worthwhile. Most of the changes are mechanical, but in a couple of places, the patch author chose to invert the operator sense, making the code flow more logical (and more in line with preceding comments). Author: Andres Freund Eyeballed by Dimitri Fontaine and Alvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ab3af46ddd2f2c2b248f1ffdb688b394d4bb387">http://git.postgresql.org/pg/commitdiff/5ab3af46ddd2f2c2b248f1ffdb688b394d4bb387</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust more backend functions to return OID rather than void. This is again intended to support extensions to the event trigger functionality. This may go a bit further than we need for that purpose, but there's some value in being consistent, and the OID may be useful for other purposes also. Dimitri Fontaine 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82b1b213cad3a69cf5f3dfaa81687c14366960fc">http://git.postgresql.org/pg/commitdiff/82b1b213cad3a69cf5f3dfaa81687c14366960fc</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Keep timeline history files restored from archive in pg_xlog. The cascading standby patch in 9.2 changed the way WAL files are treated when restored from the archive. Before, they were restored under a temporary filename, and not kept in pg_xlog, but after the patch, they were copied under pg_xlog. This is necessary for a cascading standby to find them, but it also means that if the archive goes offline and a standby is restarted, it can recover back to where it was using the files in pg_xlog. It also means that if you take an offline backup from a standby server, it includes all the required WAL files in pg_xlog. However, the same change was not made to timeline history files, so if the WAL segment containing the checkpoint record contains a timeline switch, you will still get an error if you try to restart recovery without the archive, or recover from an offline backup taken from the standby. With this patch, timeline history files restored from archive are copied into pg_xlog like WAL files are, so that pg_xlog contains all the files required to recover. This is a corner-case pre-existing issue in 9.2, but even more important in master where it's possible for a standby to follow a timeline switch through streaming replication. To make that possible, the timeline history files must be present in pg_xlog. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60df192aea0e6458f20301546e11f7673c102101">http://git.postgresql.org/pg/commitdiff/60df192aea0e6458f20301546e11f7673c102101</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dimitri Fontaine sent in four more revisions of a patch to add EVENT triggers.</li>

<li>Pavel Stehule sent in a patch to add a regrole type.</li>

<li>Andrew Dunstan sent in another WIP patch for the JSON API.</li>

<li>Peter Bex sent in a patch intended to improve password hashing by adding bcrypt.</li>

<li>Alvaro Herrera and Heikki Linnakangas traded patches to fix bgworkers in the EXEC_BACKEND case.</li>

<li>Kyotaro HORIGUCHI sent in two more revisions of a patch to reduce the amount of WAL generated during update operations.</li>

<li>Alvaro Herrera sent in another revision of a patch to implement foreign key locks.</li>

<li>Heikki Linnakangas sent in a patch to fix a performance regression in dynamic SQL by eliminating some unneeded copying of the parse- and plan trees.</li>

<li>Pavel Stehule sent in a patch to implement SQL:2011 named parameters.</li>

<li>Dan Farina sent in four revisions of a patch to establish a maximum under-estimate of the number of calls for a given pg_stat_statements entry. That means the number of calls to the canonical form of the query is between 'calls' and 'calls + calls_underest'.</li>

<li>Pavel Stehule sent in another revision of a patch to enhance error fields in PL/pgsql.</li>

<li>Tom Lane sent in a patch to make view dump/restore safe at the column-alias level.</li>

<li>Craig Ringer sent in a patch to change the Windows build docs to point to flex and bison from msys.</li>

</ul>