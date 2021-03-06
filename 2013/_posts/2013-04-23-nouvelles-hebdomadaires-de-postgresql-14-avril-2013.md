---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 avril 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/04/23/Nouvelles-hebdomadaires-de-PostgreSQL-14-avril-2013"
---


<p>Premier rassemblement utilisateurs/d&eacute;veloppeurs Postgres-XC apr&egrave;s le <em>Cluster Summit</em>&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PgCon2013CanadaClusterSummit#PostgresXC_Summit">https://wiki.postgresql.org/wiki/PgCon2013CanadaClusterSummit#PostgresXC_Summit</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Ora2PG 11.1, un syst&egrave;me de migration depuis Oracle vers PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.dalibo.org/ora2pg_11_faster_oracle_to_postgresql_migrations">http://www.dalibo.org/ora2pg_11_faster_oracle_to_postgresql_migrations</a></li>

<li>pg_activity 1.0.1&nbsp;: 

<a target="_blank" href="https://github.com/julmon/pg_activity/">https://github.com/julmon/pg_activity/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-04/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-04/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

<li>La 6&egrave;me conf&eacute;rence annuelle "Prague PostgreSQL Developers Day", organis&eacute;e par le CSPUG (Groupe des utilisateurs tch&egrave;ques et slovaques de PostgreSQL), aura lieu le 30 mai 2013 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Les candidatures des conf&eacute;renciers sont attendues jusqu'au 14 avril &agrave; l'adresse &lt;info AT p2d2 POINT cz&gt;. D'avantage d'informations sur le site&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le PgDay Fr est l'&eacute;v&eacute;nement majeur de la communaut&eacute; francophone. Il aura lieu le 13 juin 2013 &agrave; Nantes (France)&nbsp;: 

<a target="_blank" href="http://pgday.fr/">http://pgday.fr/</a></li>

<li>Les appels &agrave; conf&eacute;renciers pour le <em>Char(13)</em> et le <em>PGday UK</em>, respectivement les 11 et 12 juillet 2013, sont lanc&eacute;s et seront clos le 19 avril 2013. Pour le Char(13), &eacute;crivez &agrave; speakers AT char13 DOT info&nbsp;; pour le PGday UK, speakers AT postgresqlusergroup DOT org DOT uk.</li>

<li><em>PostgreSQL Brazil</em> aura lieu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

<li>Notez la date&nbsp;! <em>Postgres Open 2013</em> aura lieu &agrave; Chicago (Illinois, USA) du 16 au 18 septembre. Hotel Sax&nbsp;: 

<a target="_blank" href="https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865">https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865</a> Inscriptions pour les l&egrave;ve-t&ocirc;t&nbsp;: <a target="_blank" href="http://postgresopen-eac2.eventbrite.com/">http://postgresopen-eac2.eventbrite.com/</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130415023259.GE5337@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Skip extraneous locking in XLogCheckBuffer(). Heikki reported comment was wrong, so fixed code to match the comment: we only need to take additional locking precautions when we have a shared lock on the buffer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5787c6730e7a848ef95d5c4194e27614ea8e6e41">http://git.postgresql.org/pg/commitdiff/5787c6730e7a848ef95d5c4194e27614ea8e6e41</a></li>

<li>Avoid tricky race condition recording XLOG_HINT. We copy the buffer before inserting an XLOG_HINT to avoid WAL CRC errors caused by concurrent hint writes to buffer while share locked. To make this work we refactor RestoreBackupBlock() to allow an XLOG_HINT to avoid the normal path for backup blocks, which assumes the underlying buffer is exclusive locked. Resulting code completely changes layout of XLOG_HINT WAL records, but this isn't even beta code, so this is a low impact change. In passing, avoid taking WALInsertLock for full page writes on checksummed hints, remove related cruft from XLogInsert() and improve xlog_desc record for XLOG_HINT. Andres Freund Bug report by Fujii Masao, testing by Jeff Janes and Jaime Casanova, review by Jeff Davis and Simon Riggs. Applied with changes from review and some comment editing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47c4333189c9eb5ac1f95adc90213e61996f53c4">http://git.postgresql.org/pg/commitdiff/47c4333189c9eb5ac1f95adc90213e61996f53c4</a></li>

<li>Minor rewording of README comments 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e60d20a35e436cef3c454bfeab34d8ea71b54910">http://git.postgresql.org/pg/commitdiff/e60d20a35e436cef3c454bfeab34d8ea71b54910</a></li>

<li>README comments on checksums on page holes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4b94b85156192b839a3c840f8aaf0cf8699a8c8">http://git.postgresql.org/pg/commitdiff/a4b94b85156192b839a3c840f8aaf0cf8699a8c8</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix calculation of how many segments to retain for wal_keep_segments. KeepLogSeg function was broken when we switched to use a 64-bit int for the segment number. Per report from Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/594041311c8263832258d35632aa3eebf9371fd1">http://git.postgresql.org/pg/commitdiff/594041311c8263832258d35632aa3eebf9371fd1</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support indexing of regular-expression searches in contrib/pg_trgm. This works by extracting trigrams from the given regular expression, in generally the same spirit as the previously-existing support for LIKE searches, though of course the details are far more complicated. Currently, only GIN indexes are supported. We might be able to make it work with GiST indexes later. The implementation includes adding API functions to backend/regex/ to provide a view of the search NFA created from a regular expression. These functions are meant to be generic enough to be supportable in a standalone version of the regex library, should that ever happen. Alexander Korotkov, reviewed by Heikki Linnakangas and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ccae48f44d993351e1f881761bd6c556ebd6638">http://git.postgresql.org/pg/commitdiff/3ccae48f44d993351e1f881761bd6c556ebd6638</a></li>

<li>Make contrib/pg_trgm also support regex searches with GiST indexes. This wasn't addressed in the original patch, but it doesn't take very much additional code to cover the case, so let's get it done. Since pg_trgm 1.1 hasn't been released yet, I just changed the definition of what's in it, rather than inventing a 1.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f5b8beb64d481c28a483090d10099c8d619c797">http://git.postgresql.org/pg/commitdiff/6f5b8beb64d481c28a483090d10099c8d619c797</a></li>

<li>Clean up the mess around EXPLAIN and materialized views. Revert the matview-related changes in explain.c's API, as per recent complaint from Robert Haas. The reason for these appears to have been principally some ill-considered choices around having intorel_startup do what ought to be parse-time checking, plus a poor arrangement for passing it the view parsetree it needs to store into pg_rewrite when creating a materialized view. Do the latter by having parse analysis stick a copy into the IntoClause, instead of doing it at runtime. (On the whole, I seriously question the choice to represent CREATE MATERIALIZED VIEW as a variant of SELECT INTO/CREATE TABLE Alexander Shulgin, because that means injecting even more complexity into what was already a horrid legacy kluge. However, I didn't go so far as to rethink that choice ... yet.) I also moved several error checks into matview parse analysis, and made the check for external Params in a matview more accurate. In passing, clean things up a bit more around interpretOidsOption(), and fix things so that we can use that to force no-oids for views, sequences, etc, thereby eliminating the need to cons up "oids = false" options when creating them. catversion bump due to change in IntoClause. (I wonder though if we really need readfuncs/outfuncs support for IntoClause anymore.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b337904213337db5026ef0a756a447588023935">http://git.postgresql.org/pg/commitdiff/0b337904213337db5026ef0a756a447588023935</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust ExplainOneQuery_hook_type to take a DestReceiver argument. The materialized views patch adjusted ExplainOneQuery to take an additional DestReceiver argument, but failed to add a matching argument to the definition of ExplainOneQuery_hook. This is a problem for users of the hook that want to call ExplainOnePlan. Fix by adding the missing argument. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bf42a5f3b62cde41cb366d3442585429c6d9c50">http://git.postgresql.org/pg/commitdiff/0bf42a5f3b62cde41cb366d3442585429c6d9c50</a></li>

<li>Remove duplicate initialization in XLogReadRecord. Per a note from Dickson S. Guedes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cff7b9dd6d39ed5f6bb3914870c7d0602f88242">http://git.postgresql.org/pg/commitdiff/4cff7b9dd6d39ed5f6bb3914870c7d0602f88242</a></li>

<li>sepgql: Use getObjectIdentity rather than getObjectDescription. KaiGai Kohei, based on a suggestion from &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b620fdabba3fd3c00587fb586f74eb7dc6eca223">http://git.postgresql.org/pg/commitdiff/b620fdabba3fd3c00587fb586f74eb7dc6eca223</a></li>

<li>Minor wording corrections for object-access hook stuff. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d017bf41a32d08885f00a274603ed2e50816fe7f">http://git.postgresql.org/pg/commitdiff/d017bf41a32d08885f00a274603ed2e50816fe7f</a></li>

<li>sepgsql: Enforce db_procedure:{execute} permission. To do this, we add an additional object access hook type, OAT_FUNCTION_EXECUTE. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8a54e936bdf4c31b395a2ab7d7bc98eefa6dbad">http://git.postgresql.org/pg/commitdiff/f8a54e936bdf4c31b395a2ab7d7bc98eefa6dbad</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Create a distinction between a populated matview and a scannable one. The intent was that being populated would, long term, be just one of the conditions which could affect whether a matview was scannable; being populated should be necessary but not always sufficient to scan the relation. Since only CREATE and REFRESH currently determine the scannability, names and comments accidentally conflated these concepts, leading to confusion. Also add missing locking for the SQL function which allows a test for scannability, and fix a modularity violatiion. Per complaints from Tom Lane, although its not clear that these will satisfy his concerns. Hopefully this will at least better frame the discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52e6e33ab495cb2b0e694ee480ba7c6394315053">http://git.postgresql.org/pg/commitdiff/52e6e33ab495cb2b0e694ee480ba7c6394315053</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix hstore_to_json_loose example in docs. Marti Raudsepp. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66c01707c6ac9ce7cc7a7e45d0892f6506f1680b">http://git.postgresql.org/pg/commitdiff/66c01707c6ac9ce7cc7a7e45d0892f6506f1680b</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make worker_spi sample code more complete. Make use of some GUC variables, and add SIGHUP handling to reload the config file. Patch submitted by Guillaume Lelarge. Also, report to pg_stat_activity. Per report from Marc Cousin, add setting of statement start time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e543631f3c162ab5f6020b1d0209e0353ca2229a">http://git.postgresql.org/pg/commitdiff/e543631f3c162ab5f6020b1d0209e0353ca2229a</a></li>

<li>Fix SIGUSR1 handling by unconnected bgworkers. Latch activity was not being detected by non-database-connected workers; the SIGUSR1 signal handler which is normally in charge of that was set to SIG_IGN. Create a simple handler to call latch_sigusr1_handler instead. Robert Haas (bug report and suggested fix) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f62ab623adc63023c6aee22e2a6fe190439ca0c3">http://git.postgresql.org/pg/commitdiff/f62ab623adc63023c6aee22e2a6fe190439ca0c3</a></li>

<li>Fix SIGHUP handling by unconnected bgworkers. Add a SignalUnconnectedWorkers() call so that non-database-connected background workers are also notified when postmaster is SIGHUPped. Previously, only database-connected workers were. Michael Paquier (bug report and fix) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61a7d576f2a287ef59071da9d9d7a0cd473ed98b">http://git.postgresql.org/pg/commitdiff/61a7d576f2a287ef59071da9d9d7a0cd473ed98b</a></li>

<li>Remove quotes around SQL statement in error message 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cd18a88b604ec2a9940d894f36e1bfdb22daf78">http://git.postgresql.org/pg/commitdiff/6cd18a88b604ec2a9940d894f36e1bfdb22daf78</a></li>

<li>Fix confusion between ObjectType and ObjectClass. Per report by Will Leinweber and Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a76edb1880d99744453dd275f30e0361281caab">http://git.postgresql.org/pg/commitdiff/6a76edb1880d99744453dd275f30e0361281caab</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update the description for the graphical installers. Remove references to "one click", as we're not supposed to call them that anymore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d334b337b41e0c2e660324af2502dc9a5a691a02">http://git.postgresql.org/pg/commitdiff/d334b337b41e0c2e660324af2502dc9a5a691a02</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Update DTrace information. The old web site link no longer worked, and some information was outdated. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82b55c9769ac1ae6146ab34b6e5fe49251e79a90">http://git.postgresql.org/pg/commitdiff/82b55c9769ac1ae6146ab34b6e5fe49251e79a90</a></li>

<li>Fix sporadic rebuilds for .pc files. The build of .pc (pkg-config) files depends on all makefiles in use, and in dependency tracking mode, the previous coding ended up including /dev/null as a makefile. Apparently, on some platforms the modification time of /dev/null changes sporadically, and so the .pc files would end up being rebuilt every so often. Fix that by changing the makefile code to do without using /dev/null. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba66752d278818b6b8797aec2e36cccf727db055">http://git.postgresql.org/pg/commitdiff/ba66752d278818b6b8797aec2e36cccf727db055</a></li>

<li>pg_ctl: Add idempotent option. This changes the behavior of the start and stop actions to exit successfully if the server was already started or stopped. This changes the default behavior of the start action: Before, if the server was already running, it would print a message and succeed. Now, that situation will result in an error. When running in idempotent mode, no message is printed and pg_ctl exits successfully. It was considered to just make the idempotent behavior the default and only option, but pg_upgrade needs the old behavior. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87306184580c9c49717b00d48a2f9e717f21e0a8">http://git.postgresql.org/pg/commitdiff/87306184580c9c49717b00d48a2f9e717f21e0a8</a></li>

<li>Add serial comma 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e08fdf13107b6685047cf055c7966845c8c96f90">http://git.postgresql.org/pg/commitdiff/e08fdf13107b6685047cf055c7966845c8c96f90</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Document that git_changelog needs updating for major version stamping. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be55f3b85966034028a8f162b8a6ca1deca66103">http://git.postgresql.org/pg/commitdiff/be55f3b85966034028a8f162b8a6ca1deca66103</a></li>

<li>pgindent: fix downloading of BSD indent binary. Also fix accessing pgentab binary and tar. Gurjeet Singh 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8daa4e960e15eb31e141585968c91cc666889585">http://git.postgresql.org/pg/commitdiff/8daa4e960e15eb31e141585968c91cc666889585</a></li>

<li>pgindent: improve error messages. per suggestion from Gurjeet Singh 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5003f94f661d3eff0c44774576fe2f1ae202da86">http://git.postgresql.org/pg/commitdiff/5003f94f661d3eff0c44774576fe2f1ae202da86</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Etsuro Fujita sent in a patch to remove unused targets from the tlist.</li>

<li>KaiGai Kohei sent in a flock of patches to improve sepgsql.</li>

<li>Ants Aasma and Simon Riggs traded patches to improve page checksums.</li>

<li>Jeff Davis sent in two more patches to clarify and improve page checksums.</li>

<li>Christoph Berg sent in a patch to pg_regress accept --host=/tmp.</li>

<li>Jeff Janes sent in a patch to improve autovacuum's locking behavior.</li>

<li>Miguel Angel de Blas Burdalo sent in a patch to creat a function SPI_gettypmod(), which returns a field's typemod from a TupleDesc.</li>

<li>Robins Tharakan sent in a patch to add regression tests for COLLATE.</li>

<li>Dimitri Fontaine sent in another revision of a patch to improve and clarify the sql_drop event for event triggers feature.</li>

<li>Heikki Linnakangas sent in a patch to reduce the memory usage of index relcache entries.</li>

<li>Stephen Frost sent in a patch to modify ExecChooseHashTableSize() so it ignore NTUP_PER_BUCKET, essentially treating it as 1, when work_mem is large enough to fit the entire hash table, which also implies that there is only one batch.</li>

</ul>