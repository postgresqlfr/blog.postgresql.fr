---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 mai 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/05/12/Nouvelles-hebdomadaires-de-PostgreSQL-9-mai-2010"
---


<p>PostgreSQL 9.0 beta 1 a &eacute;t&eacute; publi&eacute;e. &Agrave; vos tests&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/developer/beta">http://www.postgresql.org/developer/beta</a></p>

<p>Le "Prague PostgreSQL Test Day" aura lieu le 21 mai 2010 &agrave; Prague, R&eacute;publique Tch&egrave;que&nbsp;: 

<a target="_blank" href="http://www.nic.cz/page/747/test-the-new-beta-version-of-postgresql-in-the-cz.nic-laboratories/">http://www.nic.cz/page/747/test-the-new-beta-version-of-postgresql-in-the-cz.nic-laboratories/</a></p>

<p>Le nouveau bureau de l'association PostgreSQLFr a &eacute;t&eacute; &eacute;lu avec, &agrave; sa t&ecirc;te, le pr&eacute;sident Jean-Christophe Arnu, le vice-pr&eacute;sident C&eacute;dric Villeman, le tr&eacute;sorier St&eacute;phane Schildknecht et le secr&eacute;taire Patrick Francelle. D'avantage de d&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://www.postgresql.fr/asso:elections">http://www.postgresql.fr/asso:elections</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgfincore, 0.41, un ensemble de fonctions de gestion bas-niveau des relations, utilisant mincore pour explorer la m&eacute;moire cache&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgfincore/">http://pgfoundry.org/projects/pgfincore/</a></li>

<li>James W. Pye a publi&eacute; une nouvelle version de PL/Python3&nbsp;: 

<a target="_blank" href="http://python.projects.postgresql.org/backend/">http://python.projects.postgresql.org/backend/</a></li>

<li>RHQ 3.0.0.B05, un gestionnaire syst&egrave;me et outil de surveillance utilisant PostgreSQL&nbsp;: 

<a target="_blank" href="http://rhq-project.org/">http://rhq-project.org/</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 9.0 de la semaine</strong></p>

<p>Vous pouvez cr&eacute;er des d&eacute;clencheurs propres &agrave; une colonne, c'est-&agrave;-dire des d&eacute;clencheurs qui ne se mettent en branle qu'&agrave; la modification de certaines colonnes. La syntaxe, comme d&eacute;crite dans SQL:2008, est CREATE TRIGGER nom_du_trigger (BEFORE|AFTER) UPDATE OF col1 [,col2...coln] ON nom_de_la_table FOR EACH ROW EXECUTE PROCEDURE fonction_declenchee();</p>

<p><strong>Offres d'emplois autour de PostgreSQL en Mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PgCon 2010 aura lieu les 20 &amp; 21 mai 2010 &agrave; Ottawa avec des tutoriels les 18 et 19&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2010/registration.php">http://www.pgcon.org/2010/registration.php</a></li>

<li>Les inscriptions sont ouvertes pour l'Open Source Bridge et les conf&eacute;rences sont annonc&eacute;es&nbsp;! L'&eacute;v&eacute;nement aura lieu du 1er au 4 juin 2010 &agrave; Portland (Oregon)&nbsp;: 

<a target="_blank" href="http://opensourcebridge.org/events/2010/proposals/">http://opensourcebridge.org/events/2010/proposals/</a></li>

<li>Michael Renner tiendra une conf&eacute;rence au AMOOCON qui aura lieu du 4 au 6 juin 2010&nbsp;: 

<a target="_blank" href="http://www.amoocon.de/speakers/214">http://www.amoocon.de/speakers/214</a></li>

<li>La "Southeast Linuxfest 2010" aura lieu &agrave; Spartanburg (Caroline du Sud, &Eacute;tats-Unis) les 12 &amp; 13 juin. Participations/r&eacute;unions et m&eacute;c&eacute;nats encore proposables&nbsp;: 

<a target="_blank" href="http://southeastlinuxfest.org/">http://southeastlinuxfest.org/</a></li>

<li>L'OSCON aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://www.oscon.com/oscon2010">http://www.oscon.com/oscon2010</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100509">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Add cross-reference from wal_level to hot_standby setting. Update the PITR documentation to mention that you need to set wal_level to 'archive' or 'hot_standby', to enable WAL archiving. Per Simon Riggs's request.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, change "literal" tag to the more appropriate "firstterm", when describing what "eventually consistent" means.</li>

<li>In pgsql/doc/src/sgml/config.sgml, change wording so that you don't need to understand that wal_levels form a hierarchy. Per Simon Riggs's suggestion.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, need to hold ControlFileLock while updating control file. Update minRecoveryPoint in control file when replaying a parameter change record, to ensure that we don't allow hot standby on WAL generated without wal_level='hot_standby' after a standby restart.</li>

<li>In pgsql/doc/src/sgml/intarray.sgml, fix incorrect parameter tag in docs, spotted by KOIZUMI Satoru.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/mvcc.sgml, remove spurious dot, per bug #5446 reported by Koizumi Satoru.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix backpatching error in recent patch for ALTER USER f RESET ALL behavior. The argument list for array_set() changed in 8.2 (in connection with allowing nulls in arrays) but the newer argument list was used in the patches applied to 8.1 and 8.0 branches. The patch for 7.4 was OK though. Per compiler warnings.</li>

<li>In pgsql/src/bin/psql/psqlscan.l, fix psql to not go into infinite recursion when expanding a variable that refers to itself (directly or indirectly). Instead, print a message when recursion is detected, and don't expand the repeated reference. Per bug #5448 from Francis Markham. Back-patch to 8.0. Although the issue exists in 7.4 as well, it seems impractical to fix there because of the lack of any state stack that could be used to track active expansions.</li>

<li>In pgsql/src/makefiles/Makefile.linux, on Linux, use --enable-new-dtags when specifying -rpath to linker. This should allow LD_LIBRARY_PATH to work as desired. Per trouble report from Andy Colson.</li>

<li>Work around a subtle portability problem in use of printf %s format. Depending on which spec you read, field widths and precisions in %s may be counted either in bytes or characters. Our code was assuming bytes, which is wrong at least for glibc's implementation, and in any case libc might have a different idea of the prevailing encoding than we do. Hence, for portable results we must avoid using anything more complex than just "%s" unless the string to be printed is known to be all-ASCII. This patch fixes the cases I could find, including the psql formatting failure reported by Hernan Gonzalez. In HEAD only, I also added comments to some places where it appears safe to continue using "%.*s".</li>

<li>Adjust comments about avoiding use of printf's %.*s. My initial impression that glibc was measuring the precision in characters (which is what the Linux man page says it does) was incorrect. It does take the precision to be in bytes, but it also tries to truncate the string at a character boundary. The bottom line remains the same: it will mess up if the string is not in the encoding it expects, so we need to avoid %.*s anytime there's a significant risk of that. Previous code changes are still good, but adjust the comments to reflect this knowledge. Per research by Hernan Gonzalez.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, fix typo: PGTYPES_NUM_OVERFLOW should be PGTYPES_NUM_UNDERFLOW. Noted by KOIZUMI Satoru.</li>

<li>In pgsql/src/backend/replication/walsender.c, fix missing static declaration for XLogRead().</li>

<li>In pgsql/src/bin/psql/print.c, suppress signed-vs-unsigned-char warning.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/chklocale.c, code page for EUC-KR is surely 51949.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/ecpglib/connect.c, ECPG connect routine only checked for NULL to find empty parameters, but user and password can also be "".</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in a patch to remove the limit on the number of parameters passed to xslt_process() in contrib/xml2. It had been 10.</li>

<li>Simon Riggs sent in a WIP patch to change max_standby_delay to rely on WAL receipt timestamp instead of log timestamp, per suggestion from Tom Lane.</li>

<li>Pavel Stehule sent in a patch to add new optional arguments to string_to_array() and array_to_string() which allow for an explicit NULL string rather than to have NULL disappear unconditionally.</li>

<li>Peter Eisentraut sent in a patch to fix bug 5447, which relates to VPATH builds.</li>

<li>Simon Riggs sent in a patch intended to fix the issue where Hot Standby/Streaming Replication databases have slower queries on replicas than origin.</li>

<li>Pavel Stehule sent in a patch to create to_string() and to_array() functions which include NULL handling different from the current "eliminate NULLs" behavior of array_to_string() and string_to_array().</li>

<li>Andy Lester and Robert Haas traded patches to clarify some CLUSTER behavior.</li>

<li>Joel Jacobson and ITAGAKI Takahiro traded patches to add some new stat transaction views for 9.1.</li>

<li>Nikhil Sontakke sent in two revisions of a patch intended to change the behavior of memory with set-returning functions.</li>

<li>Simon Riggs sent in a patch intended to fix some behavior with Hot Standby.</li>

<li>Simon Riggs sent in a patch to add a SQLSTATE for Hot Standby.</li>

<li>Robert Haas sent in a patch to avert doom around temprels.</li>

</ul>