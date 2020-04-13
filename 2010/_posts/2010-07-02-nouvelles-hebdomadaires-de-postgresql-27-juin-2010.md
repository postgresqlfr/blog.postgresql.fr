---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 juin 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-07-02-nouvelles-hebdomadaires-de-postgresql-27-juin-2010 "
---


<p>PostgreSQL est &agrave; la recherche de citations/t&eacute;moignages pour la publication de la version 9.0. Si vous attendez avec impatience une ou plusieurs des fonctionnalit&eacute;s de la 9.0, et que vous repr&eacute;sentez une entreprise ou une organisation gouvernementale ou non, envoyez-nous s'il vous plait votre participation &agrave; josh@postgresql.org.</p>

<p>PGXN, le "PostgreSQL Extension Network", inspir&eacute; du CPAN, a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.pgxn.org/">http://www.pgxn.org/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Slony-I 2.0.4, un syst&egrave;me de r&eacute;plication-en-cascade-ma&icirc;tre-&agrave;-multiples-esclaves pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

<li>Benetl 3.5, un outil d'ETL pour PostgreSQL, sp&eacute;cialis&eacute; dans les fichiers&nbsp;: 

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>Muldis-D 0.130.0, une sp&eacute;cification pour un langage objet-relationnel pr&eacute;vu pour utiliser, entre autres syst&egrave;mes, PostgreSQL&nbsp;: 

<a target="_blank" href="http://muldis.com/Muldis_D.html">http://muldis.com/Muldis_D.html</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>CHAR(10), la conf&eacute;rence PostgreSQL d&eacute;di&eacute;e au clustering, &agrave; la haute-disponibilit&eacute; et &agrave; la r&eacute;plication vient d'ouvrir les inscriptions en ligne et les r&eacute;servations. 2 &amp; 3 juillet 2010, Oriel College, Universit&eacute; d'Oxford (Royaume-Uni)&nbsp;: 

<a target="_blank" href="http://www.char10.org/">http://www.char10.org/</a></li>

<li>Le PDXPUG Day est programm&eacute; pour le 18 juillet 2010 &agrave; "l'Oregon Convention Center" &agrave; Portland. D'avantage d'informations&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PDXPUGDay2010">http://wiki.postgresql.org/wiki/PDXPUGDay2010</a></li>

<li>L'OSCON aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://www.oscon.com/oscon2010">http://www.oscon.com/oscon2010</a></li>

<li>La FrOSCon 2010 aura lieu &agrave; St. Augustin, Allemagne les 21 &amp; 22 ao&ucirc;t 2010. Le PUG allemand a obtenu sa propre salle de dev. et est &agrave; la recherche de conf&eacute;renciers. Plus de d&eacute;tails&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html">http://andreas.scherbaum.la/blog/archives/711-FrOSCon-2010-PostgreSQL-devroom-Call-for-papers.html</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100627">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, in a PL/pgSQL "FOR cursor" statement, the statements executed in the loop might close the cursor, rendering the Portal pointer to it invalid. Closing the cursor in the middle of the loop is not a very sensible thing to do, but we must handle it gracefully and throw an error instead of crashing.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Minor markup improvements for Hot Standby documentation.</li>

<li>Deprecate the use of =&gt; as an operator name. In HEAD, emit a warning when an operator named =&gt; is defined. In both HEAD and the backbranches (except in 8.2, where contrib modules do not have documentation), document that hstore's text =&gt; text operator may be removed in a future release, and encourage the use of the hstore(text, text) function instead. This function only exists in HEAD (previously, it was called tconvert), so backpatch it back to 8.2, when hstore was added. Per discussion.</li>

<li>In pgsql/contrib/hstore/expected/hstore.out, updated expected-output file for hstore. This is an oversight in my previous patch to deprecate =&gt; as an operator name. Per buildfarm.</li>

<li>Add TCP keepalive support to libpq. This adds four additional connection parameters to libpq: keepalives, keepalives_idle, keepalives_count, and keepalives_interval. keepalives default to on, per discussion, but can be turned off by specifying keepalives=0. The remaining parameters, where supported, can be used to adjust how often keepalives are sent and how many can be lost before the connection is broken. The immediate motivation for this patch is to make sure that walreceiver will eventually notice if the master reboots without closing the connection cleanly, but it should be helpful in other cases as well. Tollef Fog Heen, Fujii Masao, and me.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, add stray "else" that seems to have gone missing.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, further 9.0 release notes updates. Josh Berkus.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, some copy-editing of the Hot Standby documentation. Thanks to Joshua Tolley for the review.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, make AIX suggestions about disabling ipv6 more version-sensitive. Chris Browne, based on a report from John Pierce.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, rewrite docs for new libpq keepalive parameters. The revised documentation makes it more clear that these are client-side parameters, rather than server side parameters. It also puts the main point of each parameter first, and consolidates the conditions under which it might be ignored in a single list at the end.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/pg_ctl-ref.sgml, update pg_ctl docs to explain server output behavior differences on win32 and non-win32 platforms.</li>

<li>Fix pg_upgrade's use of pg_ctl on Win32 to not send command and sever output to the same file, because it is impossible. Also set user name for pg_dumpall in pg_upgrade.</li>

<li>Add username designations to all pg_upgrade utility calls that support it.</li>

<li>In pgsql/doc/src/sgml/ref/alter_table.sgml, mention that when alter rewrites a table, indexes are also rebuilt.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix log_temp_files docs and comments to say bytes not kilobytes. stat(2) field st_size returns bytes not kilobytes. Bug found during recent performance tuning for PostgreSQL user.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in tok_is_keyword(): it was looking at the wrong union variant of YYSTYPE, and hence returning the wrong answer for cases where a plpgsql "unreserved keyword" really does conflict with a variable name. Obviously I didn't test this enough :-(. Per bug #5524 from Peter Gagarinov.</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_custom.c, fix pg_restore so parallel restore doesn't fail when the input file doesn't contain data offsets (which it won't, if pg_dump thought its output wasn't seekable). To do that, remove an unnecessarily aggressive error check, and instead fail if we get to the end of the archive without finding the desired data item. Also improve the error message to be more specific about the cause of the problem. Per discussion of recent report from Igor Neyman. Back-patch to 8.4 where parallel restore was introduced.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Guillaume Lelarge sent in a patch to add a CHECK_FOR_INTERRUPTS call to the copy_relation_data(), copy_dir(), and copy_file() functions, which fixes an issue where cancelling ALTER TABLE ... SET TABLESPACE and ALTER DATABASE ... SET TABLESPACE did not work.</li>

<li>Heikki Linnakangas sent in a patch to fix an issue where the server would crash while trying to read an expression using pg_get_expr().</li>

<li>Andrew Dunstan sent in a WIP patch to make ENUMs alterable.</li>

<li>Kevin Grittner sent in a cleaned-up version of the patch to allow dividing money by money.</li>

<li>Peter Eisentraut sent in a patch to make PostgreSQL compile under clang.</li>

<li>Peter Eisentraut sent in another revision of the patch which allows ommission of non-aggregate columns in certain situations in GROUP BY.</li>

<li>Pavel Baros sent in a patch to implement materialized views.</li>

<li>Robert Haas sent in a patch to simplify emode_for_corrupt_record.</li>

<li>Mark Fowler sent in another revision of the patch to add an xpath_exists function.</li>

<li>Mark Fowler sent in another revision of the patch to add XMLEXISTS to the grammar.</li>

<li>Robert Haas sent in a patch to allow suppressing crash recovery after a crash, per discussion on -performance about a volatile version of PostgreSQL.</li>

</ul>