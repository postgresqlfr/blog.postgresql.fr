---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 septembre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-09-12-nouvelles-hebdomadaires-de-postgresql-5-septembre-2010 "
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgpool-II 3.0beta3, un gestionnaire de connexions et bien d'avantage&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; conf&eacute;renciers pour le PGDay.EU 2010, tenu du 6 au 8 d&eacute;cembre &agrave; Stuttgart (All.), est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2010.pgday.eu/callforpapers">http://2010.pgday.eu/callforpapers</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100905">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/ipc/procsignal.c, fix typo in comment.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/ipc/procarray.c, teach GetOldestXmin() about KnownAssignedXids during recovery. Very minor issue, though this is required for a later patch. Reported by Heikki Linnakangas.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, truncate subtrans after each restartpoint. Issue reported by Harald Kolb, patch by Fujii Masao, review by me.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, fix misleading DEBUG2 issued during RemoveOldXlogFiles().</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlogutils.c, fix oversight in RelFileNodeBackend patch: CreateFakeRelcacheEntry needs to initialize the rd_backend field of a fake Relation entry correctly. Fortunately, that is easy, since only non-temp relations should ever be mentioned in the WAL stream.</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, cosmetic fixes for KnownAssignedXidsGetOldestXmin, per Fujii Masao.</li>

<li>In pgsql/src/include/port/solaris.h, back-port into 8.2 an old fix to ensure that BYTE_ORDER gets set correctly on 64-bit Intel Solaris. Per my proposal yesterday, 8.2 is where we will start considering this platform supported. While this patch itself could easily go into older branches, there's not a huge amount of point unless we also make some significantly-more-invasive changes in the spinlock support.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, improve release notes' description of Teodor Sigaev's fixes for polygon overlaps and contains operators.</li>

<li>Clarify documentation of handling of null arguments for aggregates. Per discussion.</li>

<li>Fix up flushing of composite-type typcache entries to be driven directly by SI invalidation events, rather than indirectly through the relcache. In the previous coding, we had to flush a composite-type typcache entry whenever we discarded the corresponding relcache entry. This caused problems at least when testing with RELCACHE_FORCE_RELEASE, as shown in recent report from Jeff Davis, and might result in real-world problems given the kind of unexpected relcache flush that that test mechanism is intended to model. The new coding decouples relcache and typcache management, which is a good thing anyway from a structural perspective. The cost is that we have to search the typcache linearly to find entries that need to be flushed. There are a couple of ways we could avoid that, but at the moment it's not clear it's worth any extra trouble, because the typcache contains very few entries in typical operation. Back-patch to 8.2, the same as some other recent fixes in this general area. The patch could be carried back to 8.0 with some additional work, but given that it's only hypothetical whether we're fixing any problem observable in the field, it doesn't seem worth the work now.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, clean up some bad grammar and punctuation in description of ecpg's decimal type. Per KOIZUMI Satoru.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, clean up description of ecpg's dtcvfmtasc function. Per KOIZUMI Satoru.</li>

<li>9.1alpha1 release notes.</li>

<li>In HEAD only, revert kluge solution for preventing misuse of pg_get_expr(). A data-type-based solution, which is much cleaner and more bulletproof, will follow shortly. It seemed best to make this a separate commit though.</li>

<li>Install a data-type-based solution for protecting pg_get_expr(). Since the code underlying pg_get_expr() is not secure against malformed input, and can't practically be made so, we need to prevent miscreants from feeding arbitrary data to it. We can do this securely by declaring pg_get_expr() to take a new datatype "pg_node_tree" and declaring the system catalog columns that hold nodeToString output to be of that type. There is no way at SQL level to create a non-null value of type pg_node_tree. Since the backend-internal operations that fill those catalog columns operate below the SQL level, they are oblivious to the datatype relabeling and don't need any changes.</li>

<li>In pgsql/src/backend/utils/misc/ps_status.c, pad the ps_status display with nulls, not blanks, on Darwin. A long time ago, this didn't work nicely, but it seems to work on all recent versions of OS X. The blank-pad method is less desirable since it results in lots of extra space in ps' output. Per Alexey Klyukin.</li>

<li>In pgsql/src/backend/catalog/pg_constraint.c, GROUP BY can only infer functional dependency from non-deferrable primary keys. Peter's original patch had this right, but I dropped the check while revising the code to search pg_constraint instead of pg_index. Spotted by Dean Rasheed.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/create_aggregate.sgml, add missing markup for translatability.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/catalog/objectaddress.c, fix typo. Pointed out by Kevin Grittner.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marko (johto) Tiikkaja sent in a patch to make all query list snapshot handling work like EXPLAIN ANALYZE's code does. Apart from cleanup, this is infrastructure for writeable CTEs.</li>

<li>Heikki Linnakangas sent in two more revisions of the "latch" patch, now with Windows support.</li>

<li>KaiGai Kohei sent in another revision of the patch to add security label support.</li>

<li>ITAGAKI Takahiro sent in a patch to improve CLUSTER and CLUSTER VERBOSE. It is intended to be applied atop sorted_cluster-20100721.patch.</li>

<li>KaiGai Kohei sent in two more revisions of the patch to plug leaky views.</li>

<li>Suchant Sinha sent in two revisions of a patch to support multiple words in the same position in text search.</li>

<li>Pavel Stehule sent in another WIP patch to add "format" functions.</li>

<li>Pavel Stehule sent in another WIP patch to (de)serialize the textsearch ISpell dictionary.</li>

<li>Hans-Juergen Schoenig sent in another revision of the patch to push sorts into partitions.</li>

<li>Bruce Momjian sent in three revisions of a patch to force pg_controldata into English.</li>

<li>KaiGai Kohei sent in a patch to allow external security providers to check privileges to create a new relation and to inform the security labels to be assigned on the new one.</li>

<li>Hans-Juergen Schoenig sent in an revision of the patch to do merge-append, updated to 9.1-to-be.</li>

<li>Heikki Linnakangas sent in a WIP patch to allow streaming a base backup from a master.</li>

<li>Kevin Grittner sent in a patch correcting usages of "serializable" in the code.</li>

</ul>