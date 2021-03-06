---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 janvier 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/02/03/Nouvelles-hebdomadaires-de-PostgreSQL-31-janvier-2016"
---


<p>"5432 ... Meet us!" aura lieu &agrave; Milan (Italie) les 28 &amp; 29 juin 2016. L'appel &agrave; conf&eacute;renciers court jusqu'au 28 f&eacute;vrier&nbsp;: <a target="_blank" href="http://5432meet.us/">http://5432meet.us/</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>faker_fdw 0.1.0, un wrapper de donn&eacute;es distantes qui g&eacute;n&egrave;re des donn&eacute;es factices et al&eacute;atoires&nbsp;: <a target="_blank" href="https://github.com/guedes/faker_fdw">https://github.com/guedes/faker_fdw</a></li>

<li>PostgreDAC 3.1.0, un connecteur Delphi/C++ vers PostgreSQL&nbsp;: <a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/download/">http://microolap.com/products/connectivity/postgresdac/download/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en janvier</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-01/">http://archives.postgresql.org/pgsql-jobs/2016-01/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Prague PostgreSQL Developer Day 2016 (P2D2 2016) est une conf&eacute;rence sur deux jours, les 17 et 18 f&eacute;vrier 2016, &agrave; Prague (R&eacute;publique Tch&egrave;que). Site en tch&egrave;que&nbsp;: <a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le PGday annuel indien se tiendra &agrave; Bangalore (&Eacute;tat du Karnataka en Inde) le 26 f&eacute;vrier 2016&nbsp;: <a target="_blank" href="http://pgday.in">http://pgday.in</a></li>

<li>La premi&egrave;re conf&eacute;rence PostgreSQL pan-asiatique se tiendra les 16 et 17 mars 2016 &agrave; Singapour&nbsp;: <a target="_blank" href="http://2016.pgday.asia/">http://2016.pgday.asia/</a></li>

<li>Le PGDay nordique, une s&eacute;rie de conf&eacute;rences sur une seule journ&eacute;e, aura lieu &agrave; Helsinki (Finlande) le 17 mars 2016. Les inscriptions sont encore ouvertes&nbsp;: <a target="_blank" href="http://2016.nordicpgday.org/">http://2016.nordicpgday.org/</a></li>

<li>La 8<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 6 avril 2016 &agrave; Lyon (France). L'appel &agrave; conf&eacute;renciers court jusqu'au 29 f&eacute;vrier &agrave; l'adresse call-for-paper AT postgresql-sessions POINT org.</li>

<li>La <em>PGConf US 2016</em> aura lieu les 18, 19 et 20 avril &agrave; New-York&nbsp;: <a target="_blank" href="http://www.pgconf.us/2016/">http://www.pgconf.us/2016/</a></li>

<li>La <em>LinuxFest Northwest</em> aura lieu les 23 et 24 avril 2016 au Coll&egrave;ge Technique de Bellingham (Washington, USA). L'appel &agrave; conf&eacute;renciers est maintenant lanc&eacute;&nbsp;: <a target="_blank" href="http://www.linuxfestnorthwest.org/2016/present">http://www.linuxfestnorthwest.org/2016/present</a></li>

<li>FOSS4G NA (<em>Free and Open Source Software for Geospatial - North America</em>) se tiendra &agrave; Raleigh, en Caroline du Nord, du 2 au 5 mai 2016. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="https://2016.foss4g-na.org/cfp">https://2016.foss4g-na.org/cfp</a></li>

<li>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></li>

<li>Le PGDay suisse sera, cette ann&eacute;e, tenue &agrave; l'Universit&eacute; des Sciences Appliqu&eacute;es (HSR) de Rapperswil le 24 juin 2016. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="http://www.pgday.ch/">http://www.pgday.ch/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160201051108.GA654@fetter.org">http://www.postgresql.org/message-id/20160201051108.GA654@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Revert "Fix broken multibyte regression tests." This reverts commit efc1610b64b04e7cf08cc1d6c608ede8b7d5ff07. The commit was plain wrong as pointed out in: <a target="_blank" href="http://www.postgresql.org/message-id/27771.1448736909@sss.pgh.pa.us">http://www.postgresql.org/message-id/27771.1448736909@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad2e233385ee3e441454f20a02ac0f68f7873bc2">http://git.postgresql.org/pg/commitdiff/ad2e233385ee3e441454f20a02ac0f68f7873bc2</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Various fixes to REFRESH MATERIALIZED VIEW tab completion. Masahiko Sawada, Fujii Masao, Kevin Grittner <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/879d71393de001880e031255e41ca322c6027713">http://git.postgresql.org/pg/commitdiff/879d71393de001880e031255e41ca322c6027713</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Improve ResourceOwners' behavior for large numbers of owned objects. The original coding was quite fast so long as objects were always released in reverse order of addition; otherwise, it degenerated into O(N^2) behavior due to searching for the array element to delete. Improve matters by switching to hashed storage when the number of objects of a given type exceeds 64. (The cutover point is open to discussion, of course, but some simple performance testing suggests that hashing has enough overhead to be a loser below there.) Also, refactor resowner.c so that we don't need N copies of the array management code. Since all the resource IDs the code currently needs to deal with are either pointers or integers, it seems sufficient to create a one-size-fits-all infrastructure in which everything is converted to a Datum for storage. Aleksander Alekseev, reviewed by Stas Kelvich, further fixes by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc988fbb0bf60a83b628b5615e6bade5ae9ae6f4">http://git.postgresql.org/pg/commitdiff/cc988fbb0bf60a83b628b5615e6bade5ae9ae6f4</a></li>

<li>Fix startup so that log prefix %h works for the log_connections message. We entirely randomly chose to initialize port-&gt;remote_host just after printing the log_connections message, when we could perfectly well do it just before, allowing %h and %r to work for that message. Per gripe from Artem Tomyuk. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8682a7155bee06667c5773e1ca6499a670338b0">http://git.postgresql.org/pg/commitdiff/b8682a7155bee06667c5773e1ca6499a670338b0</a></li>

<li>Fix incorrect pattern-match processing in psql's \det command. listForeignTables' invocation of processSQLNamePattern did not match up with the other ones that handle potentially-schema-qualified names; it failed to make use of pg_table_is_visible() and also passed the name arguments in the wrong order. Bug seems to have been aboriginal in commit 0d692a0dc9f0e532. It accidentally sort of worked as long as you didn't inquire too closely into the behavior, although the silliness was later exposed by inconsistencies in the test queries added by 59efda3e50ca4de6 (which I probably should have questioned at the time, but didn't). Per bug #13899 from Reece Hart. Patch by Reece Hart and Tom Lane. Back-patch to all affected branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e22470471e9ed7010fcbc4a18b0a461d088d7c7">http://git.postgresql.org/pg/commitdiff/7e22470471e9ed7010fcbc4a18b0a461d088d7c7</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Mostly mechanical cleanup of pgbench pgindent for recent commits; also change some variables from int to boolean, which is how they are really used. Mostly submitted by Fabien Coelho; this is in preparation to commit further patches to the file. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b3cc1af2f9ba7b0e30054b30e28bd2cc4175b78">http://git.postgresql.org/pg/commitdiff/5b3cc1af2f9ba7b0e30054b30e28bd2cc4175b78</a></li>

<li>pgbench: improve multi-script support. Previously, it was possible to specify one or several custom scripts to run, or only one of the builtin scripts. With this patch it is also possible to specify to run the builtin scripts multiple times, using the new -b option. Also, unify the code for both cases; this eases future pgbench improvements. Author: Fabien Coelho Review: Micha&Atilde;&laquo;l Paquier, &Atilde;lvaro Herrera <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8bea3d2219844887e170471f223ba100b3c17571">http://git.postgresql.org/pg/commitdiff/8bea3d2219844887e170471f223ba100b3c17571</a></li>

<li>Fix spi_worker mention in bgworker documentation. The documentation mentioned contrib/ but the module was moved to src/test/modules/ by commit 22dfd116a127a of 9.5 era. Problem pointed out by Dickson Guedes in bug #13896 Backpatch-to: 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e37483857dc4cf7106a47847620a074b1c921142">http://git.postgresql.org/pg/commitdiff/e37483857dc4cf7106a47847620a074b1c921142</a></li>

<li>pgbench: refactor handling of stats tracking. This doesn't add any functionality but just shuffles things around so that it can be reused and improved later. Author: Fabien Coelho Reviewed-by: Michael Paquier, &Atilde;lvaro Herrera <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b60376649600268b75e1e8be86a6a6fe7fb9b3c3">http://git.postgresql.org/pg/commitdiff/b60376649600268b75e1e8be86a6a6fe7fb9b3c3</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix volatility marking of pg_size_pretty function. pg_size_pretty function should be marked immutable rather than volatile because it always returns the same result given the same argument. Pavel Stehule <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e09507a272e32bf203a51cc3cbb4d34028cba331">http://git.postgresql.org/pg/commitdiff/e09507a272e32bf203a51cc3cbb4d34028cba331</a></li>

<li>Add gin_clean_pending_list function to clean up GIN pending list. This function cleans up the pending list of the GIN index by moving entries in it to the main GIN data structure in bulk. It returns the number of pages cleaned up from the pending list. This function is useful, for example, when the pending list needs to be cleaned up *quickly* to improve the performance of the search using GIN index. VACUUM can do the same thing, too, but it may take days to run on a large table. Jeff Janes, reviewed by Julien Rouhaud, Jaime Casanova, Alvaro Herrera and me. Discussion: CAMkU=1x8zFkpfnozXyt40zmR3Ub_kHu58LtRmwHUKRgQss7=iQ@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f46eaf035440564e7dae3b03916735b92c83248">http://git.postgresql.org/pg/commitdiff/7f46eaf035440564e7dae3b03916735b92c83248</a></li>

<li>Fix typos in comments and doc overriden -&gt; overridden. The misspelling in create_extension.sgml was introduced in b67aaf2, so no need to backpatch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62e2ddd4ca47756372f2788256f445bba6bb492c">http://git.postgresql.org/pg/commitdiff/62e2ddd4ca47756372f2788256f445bba6bb492c</a></li>

<li>Fix syntax descriptions for replication commands in logicaldecoding.sgml Patch-by: Oleksandr Shulgin Reviewed-by: Craig Ringer and Fujii Masao Backpatch-through: 9.4 where logical decoding was introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c35c4ec45443cfb36893ce15769659c60fb80f3b">http://git.postgresql.org/pg/commitdiff/c35c4ec45443cfb36893ce15769659c60fb80f3b</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix cross-version pg_dump for aggregate combine functions. Fixes a defect in commit a7de3dc5c346e07e0439275982569996e645b3c2. David Rowley, per report from Jeff Janes, who also checked that the fix works. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/025b2f339260b727e113a01a20b616a336bff00a">http://git.postgresql.org/pg/commitdiff/025b2f339260b727e113a01a20b616a336bff00a</a></li>

<li>Assert that create_unique_path returns non-NULL. Per off-list discussion with Tom Lane and Michael Paquier, Coverity gets unhappy if this is not done. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eaf7b1f6432480e93d8c6824fbd503761a1c1a4f">http://git.postgresql.org/pg/commitdiff/eaf7b1f6432480e93d8c6824fbd503761a1c1a4f</a></li>

<li>Add [NO]BYPASSRLS options to CREATE USER and ALTER USER docs. Patch-by: Filip Rembia&Aring;&sbquo;kowski Reviewed-by: Robert Haas Backpatch-through: 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80db1ca2d79338c35bb3e01f2aecad78c2231b06">http://git.postgresql.org/pg/commitdiff/80db1ca2d79338c35bb3e01f2aecad78c2231b06</a></li>

<li>Avoid multiple foreign server connections when all use same user mapping. Previously, postgres_fdw's connection cache was keyed by user OID and server OID, but this can lead to multiple connections when it's not really necessary. In particular, if all relevant users are mapped to the public user mapping, then their connection options are certainly the same, so one connection can be used for all of them. While we're cleaning things up here, drop the "server" argument to GetConnection(), which isn't really needed. This saves a few cycles because callers no longer have to look this up; the function itself does, but only when establishing a new connection, not when reusing an existing one. Ashutosh Bapat, with a few small changes by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96198d94cb7adc664bda341842dc8db671d8be72">http://git.postgresql.org/pg/commitdiff/96198d94cb7adc664bda341842dc8db671d8be72</a></li>

<li>Add missing quotation mark. This fix accidentally got left out of the previous commit. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f6b041f76e6de0fa2921131a23bda794ffb83bb">http://git.postgresql.org/pg/commitdiff/2f6b041f76e6de0fa2921131a23bda794ffb83bb</a></li>

<li>Only try to push down foreign joins if the user mapping OIDs match. Previously, the foreign join pushdown infrastructure left the question of security entirely up to individual FDWs, but it would be easy for a foreign data wrapper to inadvertently open up subtle security holes that way. So, make it the core code's job to determine which user mapping OID is relevant, and don't attempt join pushdown unless it's the same for all relevant relations. Per a suggestion from Tom Lane. Shigeru Hanada and Ashutosh Bapat, reviewed by Etsuro Fujita and KaiGai Kohei, with some further changes by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbe5a3fb73102c2cfec11aaaa4a67943f4474383">http://git.postgresql.org/pg/commitdiff/fbe5a3fb73102c2cfec11aaaa4a67943f4474383</a></li>

<li>postgres_fdw: Refactor deparsing code for locking clauses. The upcoming patch to allow join pushdown in postgres_fdw needs to use this code multiple times, which requires moving it to deparse.c. That seems like a good idea anyway, so do that now both on general principle and to simplify the future patch. Inspired by a patch by Shigeru Hanada and Ashutosh Bapat, but I did it a little differently than what that patch did. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b88ef201d46e6519b5e0589358c952a4c0f5bf0f">http://git.postgresql.org/pg/commitdiff/b88ef201d46e6519b5e0589358c952a4c0f5bf0f</a></li>

<li>Migrate PGPROC's backendLock into PGPROC itself, using a new tranche. Previously, each PGPROC's backendLock was part of the main tranche, and the PGPROC just contained a pointer. Now, the actual LWLock is part of the PGPROC. As with previous, similar patches, this makes it significantly easier to identify these lwlocks in LWLOCK_STATS or Trace_lwlocks output and improves modularity. Author: Ildus Kurbangaliev Reviewed-by: Amit Kapila, Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b319356f0e94a6482c726cf4af96597c211d8d6e">http://git.postgresql.org/pg/commitdiff/b319356f0e94a6482c726cf4af96597c211d8d6e</a></li>

<li>Migrate replication slot I/O locks into a separate tranche. This is following in a long train of similar changes and for the same reasons - see b319356f0e94a6482c726cf4af96597c211d8d6e and fe702a7b3f9f2bc5bf6d173166d7d55226af82c8 inter alia. Author: Amit Kapila Reviewed-by: Alexander Korotkov, Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2251179e6ad3a865d2f55e1832fab34608fcce43">http://git.postgresql.org/pg/commitdiff/2251179e6ad3a865d2f55e1832fab34608fcce43</a></li>

<li>postgres_fdw: More preliminary refactoring for upcoming join pushdown. The code that generates a complete SQL query for a given foreign relation was repeated in two places, and they didn't quite agree: the EXPLAIN case left out the locking clause. Centralize the code so we get the same behavior everywhere, and adjust calling conventions and which functions are static vs. extern accordingly . Centralize the code so we get the same behavior everywhere, and adjust calling conventions and which functions are static vs. extern accordingly. Ashutosh Bapat, reviewed and slightly adjusted by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc592c48c58d9c1920f8e2063756dcbcce79e4dd">http://git.postgresql.org/pg/commitdiff/cc592c48c58d9c1920f8e2063756dcbcce79e4dd</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix whitespace <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9217bf3961c8420ca38bbe10819fb022185b9744">http://git.postgresql.org/pg/commitdiff/9217bf3961c8420ca38bbe10819fb022185b9744</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Fix error in documentated use of mingw-w64 compilers Error reported by Igal Sapir. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7dc09c138493424e32876894c2c68ddecff3afc6">http://git.postgresql.org/pg/commitdiff/7dc09c138493424e32876894c2c68ddecff3afc6</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Michael Paquier sent in a patch to ensure that fsyncs actually fsync in the case of renaming.</p>

<p>Corey Huinker and Michael Paquier traded revisions of a patch to add generate_series(date,date) and generate_series(date,date,integer).</p>

<p>Corey Huinker sent in two more revisions of a patch to allow limiting FETCH by bytes.</p>

<p>Kaigai Kouhei sent in another revision of a patch to add CustomScan support and an example.</p>

<p>Vinayak Pokale sent in two more revisions of a patch to implement a vacuum progress checker.</p>

<p>Amit Kapila sent in two more revisions of a patch to expand pg_stat_activity to chow waiting.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in two more revisions of a patch to add pg_size_bytes().</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add num_notnulls().</p>

<p>Stas Kelvich sent in a patch to speed up two-phase commits by reading state files into memory during the replay of prepare, and if checkpoint/restartpoint occurs between prepare and commit, to move the data to files.</p>

<p>Craig Ringer sent in two more revisions of a patch to implement failover slots.</p>

<p>SAWADA Masahiko sent in two revisions of a patch to check for a suitable index to use in REFRESH MATERIALIZED VIEW CONCURRENTLY.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to allow async-capable nodes to run the node before ExecProcNode().</p>

<p>Pavel St&Auml;&rsaquo;hule and Iacob Catalin traded patches to add an ereport function to PL/PythonU.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add covering unique indexes.</p>

<p>Etsuro Fujita sent in a patch to fix some capitalizations in fdwhandlers.sgml.</p>

<p>Erik Rijkers sent in a patch to fix some typos in the pgbench docs.</p>

<p>Aleksander Alekseev sent in another revision of a patch to optimize dynahashes.</p>

<p>Stas Kelvich sent in another revision of a patch to add tsvector editing functions.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to better support %TYPE in PL/pgsql.</p>

<p>Jos&Atilde;&copy; Arthur Benetasso Villanova sent in another revision of a patch to log operating system usernames connecting via unix socket.</p>

<p>Fabien COELHO sent in a patch to fix a couple of minor bugs in pgbench.</p>

<p>Ashutosh Bapat sent in a patch to keep from making separate DB connections to remote servers when not needed in FDWs.</p>

<p>Artur Zakirov sent in a patch to fix some infelicities in tsearch2 parsing.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to add a sequence access method.</p>

<p>Peter Eisentraut sent in two more revisions of a patch to integrate better with systemd.</p>

<p>Michael Paquier sent in three more revisions of a patch to avoid unneeded checkpoints.</p>

<p>Noah Misch sent in two revisions of a patch to fix an issue that could cause a backend crash with nested CREATE TEMP TABLE invocations.</p>

<p>Fabien COELHO and Michael Paquier traded patches to extend pgbench expressions with functions.</p>

<p>Amit Kapila sent in a patch to reduce the number of WAL writes.</p>

<p>Dilip Kumar sent in another revision of a patch to help scale relation extensions.</p>

<p>Artur Zakirov sent in two more revisions of a patch to improve Hunspell dictionary support.</p>

<p>Michael Paquier sent in a patch to fix some comment typos.</p>

<p>Etsuro Fujita sent in another revision of a patch to make foreign table writes more efficient.</p>

<p>Kaigai Kouhei sent in two more revisions of a patch to add CustomScan under a Gather node.</p>

<p>Anastasia Lubennikova sent in three more revisions of a patch to compress B-Trees in a way that's analogous to that just used for GIN.</p>

<p>Ashutosh Bapat sent in two more revisions of a patch to make read operations on the PostgreSQL FDW more efficient.</p>

<p>Fujii Masao and SAWADA Masahiko traded patches to fix tab completion options for SET/RESET in psql.</p>

<p>Alexander Korotkov sent in another revision of a patch to enable creating access methods with an example for Bloom filters.</p>

<p>Alexander Korotkov sent in a patch to refactor SLRU tranches.</p>

<p>Ashutosh Bapat sent in a patch to move the code to deparse SELECT statements into a function deparseSelectStmtForRel().</p>

<p>Vitaly Burovoy sent in a patch to fix an overflow in EXTRACT.</p>

<p>Vik Fearing sent in another revision of a patch to add an idle-in-transaction timeout.</p>

<p>Thomas Munro sent in a patch to detect SSI conflicts before reporting constraint violations.</p>

<p>Vitaly Burovoy sent in a patch to make the behavior of all versions of the "isinf" function be similar.</p>