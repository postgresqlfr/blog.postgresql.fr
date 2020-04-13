---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 juin 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-06-12-nouvelles-hebdomadaires-de-postgresql-6-juin-2010 "
---


<p>Le 11 juin 2010, Gabriele Bartolini (de 2<sup>nd</sup>Quadrant Italia) interviendra lors de la conf&eacute;rence italienne sur les Logiciels Libres &agrave; Cagliari, Sardaigne&nbsp;; intervention titr&eacute;e "High Availability of business databases with PostgreSQL" [ndt: Haute Disponibilit&eacute; de bases de donn&eacute;es d'entreprises avec PostgreSQL]&nbsp;: 

<a target="_blank" href="http://www.confsl.org/">http://www.confsl.org/</a></p>

<p>Le 12 juin 2010, le PUG italien fera la promotion de PostgreSQL lors de la conf&eacute;rence italienne sur les Logiciels Libres &agrave; Cagliari, Sardaigne avec une journ&eacute;e enti&egrave;re d'ateliers autour de PostgreSQL allant d'une "Introduction" &agrave; la "Haute Disponibilit&eacute;"&nbsp;: 

<a target="_blank" href="http://www.confsl.org/">http://www.confsl.org/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>ChronicDB v2.2.2, un outil de d&eacute;ploiement de sch&eacute;ma&nbsp;: 

<a target="_blank" href="http://chronicdb.com">http://chronicdb.com</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La "Southeast Linuxfest 2010" aura lieu &agrave; Spartanburg (Caroline du Sud, &Eacute;tats-Unis) du 11 au 13 juin. Nos PG-gourous Joshua Drake et Andrew Dunstan donneront des pr&eacute;sentations &agrave; ne pas manquer&nbsp;: 

<a target="_blank" href="http://southeastlinuxfest.org/">http://southeastlinuxfest.org/</a></li>

<li>Conf&eacute;rence de Michael Renner au Netways OSDC &agrave; Nuremberg (All.) les 23 &amp; 24 juin 2010&nbsp;: 

<a target="_blank" href="http://www.netways.de/osdc/y2010/programm/">http://www.netways.de/osdc/y2010/programm/</a></li>

<li>CHAR(10), la conf&eacute;rence PostgreSQL d&eacute;di&eacute;e au clustering, &agrave; la haute-disponibilit&eacute; et &agrave; la r&eacute;plication vient d'ouvrir les inscriptions en ligne et les r&eacute;servations. 2 &amp; 3 juillet 2010, Oriel College, Universit&eacute; d'Oxford (Royaume-Uni)&nbsp;: 

<a target="_blank" href="http://www.char10.org/">http://www.char10.org/</a></li>

<li>Le PDXPUG Day est programm&eacute; pour le 18 juillet 2010 &agrave; "l'Oregon Convention Center" &agrave; Portland. D'avantage d'informations&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PDXPUGDay2010">http://wiki.postgresql.org/wiki/PDXPUGDay2010</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100606">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/replication/walsender.c, send all outstanding WAL before exiting when smart shutdown is requested. This was broken by my previous patch to send WAL in smaller batches. Patch by Fujii Masao.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, fix obsolete comments that I neglected to update in a previous patch. Fujii Masao.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, reword fsync and full_page_writes docs to be clearer about when to turn them off. Josh Berkus, with slight wording changes by me.</li>

<li>In pgsql/src/pl/plpgsql/src/pl_exec.c, add error hint that PL/pgSQL "EXECUTE of SELECT ... INTO" can be performed by "EXECUTE ... INTO". Jaime Casanova.</li>

<li>In pgsql/doc/src/sgml/docguide.sgml, document how to find TeX overflow boxes in our documentation build, per details from Alvaro Herrera.</li>

<li>In pgsql/doc/src/sgml/docguide.sgml, update TeX overflow documentation page pattern mask, in docs.</li>

<li>In pgsql/doc/src/sgml/docguide.sgml, overflow box is on page after listed page number, per Alvaro.</li>

<li>In pgsql/src/backend/commands/indexcmds.c, show schema name for REINDEX. Greg Sabino Mullane.</li>

<li>In pgsql/doc/src/sgml/extend.sgml, add documentation section "Using C++ for Extensibility". Craig Ringer</li>

<li>In pgsql/doc/src/sgml/extend.sgml, fix SGML markup for tag title.</li>

<li>In pgsql/doc/src/sgml/extend.sgml, mention palloc/pfree for C++ memory allocation in docs.</li>

<li>Comment out C++ docs for later user. Tone down C++ compatibility in 9.0 release notes.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update C++ release note item wording.</li>

<li>In pgsql/doc/src/sgml/func.sgml, document that &amp;&amp; geometric operator is true even if only a point overlaps. David Fetter.</li>

<li>In pgsql/doc/src/sgml/func.sgml, clarify array generate_subscripts() documentation example. Tim Landscheidt.</li>

<li>In pgsql/doc/src/sgml/citext.sgml, document that citext operators must be in the current search path.</li>

<li>In pgsql/doc/src/sgml/extend.sgml, document use of C++ for extension use.</li>

<li>In pgsql/doc/src/sgml/func.sgml, document regexp_matches() better and show example of single-row usage.</li>

<li>In pgsql/doc/src/sgml/extend.sgml, markup fix.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update 9.0 release notes to current.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, fix CREATE TRIGGER release mention, WHERE -&gt; WHEN.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/reassign_owned.sgml, add note about database ownership to REASSIGN OWNED command documentation, per Josh Berkus. Add ALTER DATABASE to the "see also" section, too.</li>

<li>In pgsql/src/include/catalog/pg_control.h, add comments about definitions that may affect PG_CONTROL_VERSION, per recent unintended-initdb-forcing fiasco</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/vcregress.pl, run recently backported plperlu_plperl regression tests when building with MSVC on releases 8.4 and 8.3. Regression tests weren't supported before that.</li>

<li>In pgsql/src/tools/msvc/vcregress.pl, fix regression test name for plperlu_plperl in msvc.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>On clean shutdown during recovery, don't warn about possible corruption. Fujii Masao. Review by Heikki Linnakangas and myself.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, fix dblink to treat connection names longer than NAMEDATALEN-2 (62 bytes). Now long names are adjusted with truncate_identifier() and NOTICE messages are raised if names are actually truncated. Backported to release 8.0.</li>

<li>Replace "slave" to "standby" in documentation for consistent terminology. Almost all of the terms in docs and messages were replaced, but still remains in a few comments and README files in codes.</li>

<li>Ensure default-only storage parameters for TOAST relations to be initialized with proper values. Affected parameters are fillfactor, analyze_threshold, and analyze_scale_factor. Especially uninitialized fillfactor caused inefficient page usage because we built a StdRdOptions struct in which fillfactor is zero if any reloption is set for the toast table. In addition, we disallow toast.autovacuum_analyze_threshold and toast.autovacuum_analyze_scale_factor because we didn't actually support them; they are always ignored. Report by Rumko on pgsql-bugs on 12 May 2010. Analysis by Tom Lane and Alvaro Herrera. Patch by me. Backpatch to 8.4.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/include/catalog/pg_control.h, bump PG_CONTROL_VERSION to account for the incompatible change committed earlier.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, remove link that breaks HISTORY file generation.</li>

<li>Add current WAL end (as seen by walsender, ie, GetWriteRecPtr() result) and current server clock time to Streaming Replication data messages. These are not currently used on the slave side but seem likely to be useful in future, and it'd be better not to change the Streaming Replication protocol after release. Per discussion. Also do some minor code review and cleanup on walsender.c, and improve the protocol documentation.</li>

<li>In pgsql/src/backend/replication/walsender.c, adjust misleading comment in walsender.c. We try to send all WAL data that's been written out from shared memory, but the previous phrasing might be read to say that we send only what's been fsync'd.</li>

<li>In pgsql/doc/src/sgml/func.sgml, improve our explanation of the OVERLAPS operator. Per gripe from Frank van Vugt.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix some inconsistent quoting of wal_level values in messages.</li>

<li>Translation updates for 9.0beta2.</li>

<li>When referring to postgresql.conf syntax, then it's without quotes (wal_level=archive); in narrative it's with double quotes. But never single quotes.</li>

<li>In pgsql/src/backend/libpq/hba.c, fix reference to nonexistent configure option --enable-ssl -&gt; --with-openssl</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag 9.0beta2.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Added variable handling for RETURNING clause to ecpg. While the values were correctly returned they were not moved into C variables as they should be. Closes: Bug #5489.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Bruce Momjian's patches to allow setting wal_keep_segments to -1, which would mean, "never get rid of any." This was agreed not to be a good idea.</li>

<li>Pavel Stehule's patch to add new custom GUCs for date and time formats. Too many GUCs.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao sent in three patches to fix streaming replication.</li>

<li>Jan Urbanski and Tom Lane traded patches to fix tsvector stats.</li>

<li>Peter Eisentraut sent in a patch to allow a client to authenticate a server over unix-domain sockets.</li>

<li>Tom Lane sent in a WIP patch to fix some some misbehavior on INSERT-only tables.</li>

<li>Andy Balholm sent in a WIP patch to allow dividing money by money.</li>

<li>Daniele Varrazzo sent in a patch to implement a regexp_match() function which returns an array rather than a SETOF matches as regexp_matches() does.</li>

<li>KaiGai Kohei sent two different patches intended to close some information leaks in VIEWs.</li>

<li>Dean Rasheed sent in a patch to fix the docs for ALTER TABLE ... DISABLE/ENABLE TRIGGER. They are out of date.</li>

</ul>