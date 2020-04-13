---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er novembre 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-11-04-nouvelles-hebdomadaires-de-postgresql-1er-novembre-2015 "
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>PGroonga 1.0.0, une plate-forme de recherche plein texte pour toutes les langues&nbsp;: <a target="_blank" href="http://groonga.org/en/blog/2015/10/29/pgroonga-1.0.0.html">http://groonga.org/en/blog/2015/10/29/pgroonga-1.0.0.html</a></li>

<li>tds_fdw 1.0.6, un wrapper de donn&eacute;es distantes pour MS-SQL Server et Sybase&nbsp;: <a target="_blank" href="https://github.com/GeoffMontee/tds_fdw/releases">https://github.com/GeoffMontee/tds_fdw/releases</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en novembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-11/">http://archives.postgresql.org/pgsql-jobs/2015-11/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Highload++2015 aura lieu les 2 et 3 novembre 2015 &agrave; Moscou (Russie). Informations respectivement en russe et anglais&nbsp;: <a target="_blank" href="http://highload.ru/">http://highload.ru/</a> <a target="_blank" href="http://highload.co/">http://highload.co/</a></li>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/">http://pgbr.postgresql.org.br/2015/en/</a></li>

<li><em>Postgres Conference China</em> 2015 aura lieu du 20 au 22 novembre 2015 &agrave; Beijing&nbsp;: <a target="_blank" href="http://postgres2015.eventdove.com/">http://postgres2015.eventdove.com/</a> <a target="_blank" href="http://postgrescluster2015.eventdove.com/">http://postgrescluster2015.eventdove.com/</a></li>

<li>La PGConf.DE se tiendra au Lindner Hotel am Michel de Hambourg (Allemagne) les 26 &amp; 27 novembre 2015&nbsp;: <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></li>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de deux jours avec deux programmes qui aura lieu les 21 et 22 janvier 2016 au Pasadena Convention Center &agrave; l'occasion du SCaLE 14X. L'appel &agrave; conf&eacute;renciers expire le 30 octobre 2015&nbsp;: <a target="_blank" href="https://www.socallinuxexpo.org/scale/14x/cfp">https://www.socallinuxexpo.org/scale/14x/cfp</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20151101233927.GA7054@fetter.org">http://www.postgresql.org/message-id/20151101233927.GA7054@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Measure string lengths only once. Bernd Helmle complained that CreateReplicationSlot() was assigning the same value to the same variable twice, so we could remove one of them. Code inspection reveals that we can actually remove both assignments: according to the author the assignment was there for beauty of the strlen line only, and another possible fix to that is to put the strlen in its own line, so do that. To be consistent within the file, refactor all duplicated strlen() calls, which is what we do elsewhere in the backend anyway. In basebackup.c, snprintf already returns the right length; no need for strlen afterwards. Backpatch to 9.4, where replication slots were introduced, to keep code identical. Some of this is older, but the patch doesn't apply cleanly and it's only of cosmetic value anyway. Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/BE2FD71DEA35A2287EA5F018@eje.credativ.lan">http://www.postgresql.org/message-id/BE2FD71DEA35A2287EA5F018@eje.credativ.lan</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0cd836a4e818f049716e47fe81bf5d4800509c57">http://git.postgresql.org/pg/commitdiff/0cd836a4e818f049716e47fe81bf5d4800509c57</a></li>

<li>Cleanup commit timestamp module activaction, again Further tweak commit_ts.c so that on a standby the state is completely consistent with what that in the master, rather than behaving differently in the cases that the settings differ. Now in standby and master the module should always be active or inactive in lockstep. Author: Petr Jel&Atilde;&shy;nek, with some further tweaks by &Atilde;lvaro Herrera. Backpatch to 9.5, where commit timestamps were introduced. Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/5622BF9D.2010409@2ndquadrant.com">http://www.postgresql.org/message-id/5622BF9D.2010409@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/531d21b75ff6b18ea8638c736a05326ebd519f49">http://git.postgresql.org/pg/commitdiff/531d21b75ff6b18ea8638c736a05326ebd519f49</a></li>

<li>Fix BRIN free space computations A bug in the original free space computation made it possible to return a page which wasn't actually able to fit the item. Since the insertion code isn't prepared to deal with PageAddItem failing, a PANIC resulted ("failed to add BRIN tuple [to new page]"). Add a macro to encapsulate the correct computation, and use it in brin_getinsertbuffer's callers before calling that routine, to raise an early error. I became aware of the possiblity of a problem in this area while working on ccc4c074994d734. There's no archived discussion about it, but it's easy to reproduce a problem in the unpatched code with something like CREATE TABLE t (a text); CREATE INDEX ti ON t USING brin (a) WITH (pages_per_range=1); for length in `seq 8000 8196` do psql -f - &lt;&lt;EOF TRUNCATE TABLE t; INSERT INTO t VALUES ('z'), (repeat('a', $length)); EOF done Backpatch to 9.5, where BRIN was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21a4e4a4c9fe417e2462b6f90f6b0e49e32ceba6">http://git.postgresql.org/pg/commitdiff/21a4e4a4c9fe417e2462b6f90f6b0e49e32ceba6</a></li>

<li>Document BRIN's inclusion opclass framework Backpatch to 9.5 -- this should have been part of b0b7be61337, but we didn't have 38b03caebc5de either at the time. Author: Emre Hasegeli Revised by: Ian Barwick Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/CAE2gYzyB39Q9up_-TO6FKhH44pcAM1x6n_Cuj15qKoLoFihUVg@mail.gmail.com">http://www.postgresql.org/message-id/CAE2gYzyB39Q9up_-TO6FKhH44pcAM1x6n_Cuj15qKoLoFihUVg@mail.gmail.com</a> <a target="_blank" href="http://www.postgresql.org/message-id/562DA711.3020305@2ndquadrant.com">http://www.postgresql.org/message-id/562DA711.3020305@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c15898c1d5d53602de097905a90f3dd176e8e7fd">http://git.postgresql.org/pg/commitdiff/c15898c1d5d53602de097905a90f3dd176e8e7fd</a></li>

<li>Fix secondary expected output for commit_ts test Per red wall in buildfarm <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dbe6f434ee1852f08c011065467a6cfc5ce10864">http://git.postgresql.org/pg/commitdiff/dbe6f434ee1852f08c011065467a6cfc5ce10864</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Make Gather node projection-capable. The original Gather code failed to mark a Gather node as not able to do projection, but it couldn't, even though it did call initialize its projection info via ExecAssignProjectionInfo. There doesn't seem to be any good reason for this node not to have projection capability, so clean things up so that it does. Without this, plans using Gather nodes might need to carry extra Result nodes to do projection. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8538a6307049590ddb5ba127b2ecac6308844d60">http://git.postgresql.org/pg/commitdiff/8538a6307049590ddb5ba127b2ecac6308844d60</a></li>

<li>Fix incorrect message in ATWrongRelkindError. Mistake introduced by commit 3bf3ab8c563699138be02f9dc305b7b77a724307. Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9dcce7123e1b0012fcf7f8b8761b34aebb66986d">http://git.postgresql.org/pg/commitdiff/9dcce7123e1b0012fcf7f8b8761b34aebb66986d</a></li>

<li>Add missing serial comma, for consistency. Amit Langote, per Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d45565162494c75eae91481eda17dc0c8ecab5db">http://git.postgresql.org/pg/commitdiff/d45565162494c75eae91481eda17dc0c8ecab5db</a></li>

<li>Fix typo in bgworker.c <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6baec92fc48387da8164d50f5699a7162267718">http://git.postgresql.org/pg/commitdiff/c6baec92fc48387da8164d50f5699a7162267718</a></li>

<li>Update parallel executor support to reuse the same DSM. Commit b0b0d84b3d663a148022e900ebfc164284a95f55 purported to make it possible to relaunch workers using the same parallel context, but it had an unpleasant race condition: we might reinitialize after the workers have sent their last control message but before they have dettached the DSM, leaving to crashes. Repair by introducing a new ParallelContext operation, ReinitializeParallelDSM. Adjust execParallel.c to use this new support, so that we can rescan a Gather node by relaunching workers but without needing to recreate the DSM. Amit Kapila, with some adjustments by me. Extracted from latest parallel sequential scan patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a1f8611f2582df0a16bcd35caed2e1526387643">http://git.postgresql.org/pg/commitdiff/3a1f8611f2582df0a16bcd35caed2e1526387643</a></li>

<li>doc: security_barrier option is a Boolean, not a string. Mistake introduced by commit 5bd91e3a835b5d5499fee5f49fc7c0c776fe63dd. Hari Babu <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5057b2b34813ca114bc808cb56b7a7fcde64393">http://git.postgresql.org/pg/commitdiff/c5057b2b34813ca114bc808cb56b7a7fcde64393</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Message style improvements. Message style, plurals, quoting, spelling, consistency with similar messages <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8d585c0915939a42acdb529d8e0eb832935d45f">http://git.postgresql.org/pg/commitdiff/a8d585c0915939a42acdb529d8e0eb832935d45f</a></li>

<li>Remove some remains from Alpha support removal <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5130e8ee09e5ae605f3aa944a31dd9021c1d3dd">http://git.postgresql.org/pg/commitdiff/c5130e8ee09e5ae605f3aa944a31dd9021c1d3dd</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Docs: add example clarifying use of nested JSON containment. Show how this can be used in practice to make queries simpler and more flexible. Also, draw an explicit contrast to the existence operator, which doesn't work that way. Peter Geoghegan and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23937a4253490bf0c06aef0b8658270176f52de4">http://git.postgresql.org/pg/commitdiff/23937a4253490bf0c06aef0b8658270176f52de4</a></li>

<li>Implement lookbehind constraints in our regular-expression engine. A lookbehind constraint is like a lookahead constraint in that it consumes no text; but it checks for existence (or nonexistence) of a match *ending* at the current point in the string, rather than one *starting* at the current point. This is a long-requested feature since it exists in many other regex libraries, but Henry Spencer had never got around to implementing it in the code we use. Just making it work is actually pretty trivial; but naive copying of the logic for lookahead constraints leads to code that often spends O(N^2) time to scan an N-character string, because we have to run the match engine from string start to the current probe point each time the constraint is checked. In typical use-cases a lookbehind constraint will be written at the start of the regex and hence will need to be checked at every character --- so O(N^2) work overall. To fix that, I introduced a third copy of the core DFA matching loop, paralleling the existing longest() and shortest() loops. This version, matchuntil(), can suspend and resume matching given a couple of pointers' worth of storage space. So we need only run it across the string once, stopping at each interesting probe point and then resuming to advance to the next one. I also put in an optimization that simplifies one-character lookahead and lookbehind constraints, such as "(?=x)" or "(?&lt;!\w)", into AHEAD and BEHIND constraints, which already existed in the engine. This avoids the overhead of the LACON machinery entirely for these rather common cases. The net result is that lookbehind constraints run a factor of three or so slower than Perl's for multi-character constraints, but faster than Perl's for one-character constraints ... and they work fine for variable-length constraints, which Perl gives up on entirely. So that's not bad from a competitive perspective, and there's room for further optimization if anyone cares. (In reality, raw scan rate across a large input string is probably not that big a deal for Postgres usage anyway; so I'm happy if it's linear.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/12c9a04008870c283931d6b3b648ee21bbc2cfda">http://git.postgresql.org/pg/commitdiff/12c9a04008870c283931d6b3b648ee21bbc2cfda</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Fix serialization anomalies due to race conditions on INSERT. On insert the CheckForSerializableConflictIn() test was performed before the page(s) which were going to be modified had been locked (with an exclusive buffer content lock). If another process acquired a relation SIReadLock on the heap and scanned to a page on which an insert was going to occur before the page was so locked, a rw-conflict would be missed, which could allow a serialization anomaly to be missed. The window between the check and the page lock was small, so the bug was generally not noticed unless there was high concurrency with multiple processes inserting into the same table. This was reported by Peter Bailis as bug #11732, by Sean Chittenden as bug #13667, and by others. The race condition was eliminated in heap_insert() by moving the check down below the acquisition of the buffer lock, which had been the very next statement. Because of the loop locking and unlocking multiple buffers in heap_multi_insert() a check was added after all inserts were completed. The check before the start of the inserts was left because it might avoid a large amount of work to detect a serialization anomaly before performing the all of the inserts and the related WAL logging. While investigating this bug, other SSI bugs which were even harder to hit in practice were noticed and fixed, an unnecessary check (covered by another check, so redundant) was removed from heap_update(), and comments were improved. Back-patch to all supported branches. Kevin Grittner and Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/585e2a3b1a57cd7f763a9203e77563c729d6104e">http://git.postgresql.org/pg/commitdiff/585e2a3b1a57cd7f763a9203e77563c729d6104e</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Zeus Kronion sent in a patch to fix an issue with parallel workers in pg_dump.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement multi-tenancy with RLS.</p>

<p>Victor Wagner sent in another revision of a patch to implement failover at the libpq connect level.</p>

<p>Ashutosh Bapat sent in three more revisions of a patch to get sorted data from a foreign server.</p>

<p>Nathan Wagner and David Fetter sent in two revisions of a patch to add fortnights as a unit of time measurement.</p>

<p>Robert Haas sent in a patch to modify tqueue infrastructure to support transient record types.</p>

<p>Valery Popov sent in a patch to add a max_recursion_depth parameter to blunt the effects of out-of-control WITH RECURSIVE queries.</p>

<p>Michael Paquier sent in another revision of a patch to allow showing tuple data in the pageinspect contrib extension.</p>

<p>David Rowley sent in a patch to make tlist_matches_tupdesc() more efficient.</p>

<p>Marko Tiikkaja sent in a patch to add \pset true/false to psql.</p>

<p>Marko Tiikkaja sent in a patch to add a new aggregate, onlyvalue, which returns the single distinct non-NULL value from the input values and raises an exception if some number other than one distinct non-NULL value exists.</p>

<p>Rahila Syed sent in another revision of a patch to implement a vacuum progress checker.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement ereport() in PL/PythonU.</p>

<p>Stas Kelvich sent in another revision of a patch to add KNN support to the cube contrib extension.</p>

<p>Alexander Korotkov sent in two more revisions of a patch to move PinBuffer and UnpinBuffer to atomics.</p>

<p>SAWADA Masahiko sent in two more revisions of a patch to add a "frozen" bit to the visibility map.</p>

<p>Amit Langote sent in another revision of a patch to implement declarative partitioning.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to enhance the types usable in PL/pgsql.</p>

<p>Fabien COELHO sent in another revision of a patch to extend pgbench expressions with functions.</p>

<p>Jim Nasby sent in a patch to install config/missing.</p>

<p>Konstantin Knizhnik sent in a patch to add an extensible transaction manager API.</p>

<p>Marko Tiikkaja sent in a patch to allow COPY (query) to use INSERT/UPDATE/DELETE...RETURNING in addition to SELECT, TABLE, and VALUES.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add an optional --group-command parameter to psql, which lets it execute multiple commands from the shell command line.</p>

<p>Peter Geoghegan sent in a patch to correct a comment in strxfrm cache.</p>

<p>Alexander Lebedev sent in a patch to add support for box type in SP-GiST index.</p>

<p>Dean Rasheed sent in a patch to add trigonometric functions that take degree measurements as inputs.</p>