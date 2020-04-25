---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 février 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/02/24/Nouvelles-hebdomadaires-de-PostgreSQL-17-février-2013"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Precog 1.1.0, une plateforme d'analyse de donn&eacute;es scientifiques&nbsp;: 

<a target="_blank" href="http://www.precog.com/postgresql">http://www.precog.com/postgresql</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PyPgDay aura lieu le 13 mars au <em>Santa Clara Convention Center</em>, le premier jour de la <em>PyCon</em>. Informations par l&agrave;&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PyPgDay2013">http://wiki.postgresql.org/wiki/PyPgDay2013</a></li>

<li>Le PGDay 2013 de New-York City aura lieu le 22 mars&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org/">http://pgday.nycpug.org/</a></li>

<li>Le PgDay Fr est l'&eacute;v&eacute;nement majeur de la communaut&eacute; francophone. La date limite pour les propositions de conf&eacute;rence est le samedi 24 mars 2013 &agrave; 23h59 CEST&nbsp;: 

<a target="_blank" href="http://pgday.fr/call_for_papers">http://pgday.fr/call_for_papers</a></li>

<li>La <em>PostgreSQL Session</em> est programm&eacute;e pour le 28 mars 2013 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></li>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

<li>La 6&egrave;me conf&eacute;rence annuelle "Prague PostgreSQL Developers Day", organis&eacute;e par le CSPUG (Groupe des utilisateurs tch&egrave;ques et slovaques de PostgreSQL), aura lieu le 30 mai 2013 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Les candidatures des conf&eacute;renciers sont attendues jusqu'au 14 avril &agrave; l'adresse &lt;info AT p2d2 POINT cz&gt;. D'avantage d'informations sur le site&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130218050246.GF6677@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix checkpoint after fast promotion. The intention was to request a regular online checkpoint immediately after end of recovery, when performing "fast promotion". However, because the checkpoint was requested before other backends were allowed to write WAL, the checkpointer process performed a restartpoint rather than a checkpoint. Delay the RequestCheckPoint call until after recovery has truly ended, so that you get a real checkpoint. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b669f416cee77ef9025b80f9c4201688578447d1">http://git.postgresql.org/pg/commitdiff/b669f416cee77ef9025b80f9c4201688578447d1</a></li>

<li>Support unlogged GiST index. The reason this wasn't supported before was that GiST indexes need an increasing sequence to detect concurrent page-splits. In a regular WAL- logged GiST index, the LSN of the page-split record is used for that purpose, and in a temporary index, we can get away with a backend-local counter. Neither of those methods works for an unlogged relation. To provide such an increasing sequence of numbers, create a "fake LSN" counter that is saved and restored across shutdowns. On recovery, unlogged relations are blown away, so the counter doesn't need to survive that either. Jeevan Chalke, based on discussions with Robert Haas, Tom Lane and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62401db45c4feff9be296fa78a8bb7b9947d69de">http://git.postgresql.org/pg/commitdiff/62401db45c4feff9be296fa78a8bb7b9947d69de</a></li>

<li>Update visibility map in the second phase of vacuum. There's a high chance that a page becomes all-visible when the second phase of vacuum removes all the dead tuples on it, so it makes sense to check for that. Otherwise the visibility map won't get updated until the next vacuum. Pavan Deolasee, reviewed by Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdf9e21196a6f58c6021c967dc5776a16190f295">http://git.postgresql.org/pg/commitdiff/fdf9e21196a6f58c6021c967dc5776a16190f295</a></li>

<li>Don't delete unarchived WAL files during crash recovery. Bug reported by Jehan-Guillaume (ioguix) de Rorthais. This was introduced with the change to keep WAL files restored from archive in pg_xlog, in 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9cc7e05c6d82a9781883a016c70d95aa4923122">http://git.postgresql.org/pg/commitdiff/c9cc7e05c6d82a9781883a016c70d95aa4923122</a></li>

<li>Force archive_status of .done for xlogs created by dearchival/replication. This is a forward-patch of commit 6f4b8a4f4f7a2d683ff79ab59d3693714b965e3d, applied to 9.2 back in August. The plan was to do something else in master, but it looks like it's not going to happen, so let's just apply the 9.2 solution to master as well. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2f79ba2691a4863db53003f25538f8806ebd2db">http://git.postgresql.org/pg/commitdiff/c2f79ba2691a4863db53003f25538f8806ebd2db</a></li>

<li>Better fix for "unarchived WAL files get deleted on crash recovery" bug. Revert my earlier fix for the bug that unarchived WAL files get deleted on crash recovery, commit c9cc7e05c6d82a9781883a016c70d95aa4923122. We create a .done file for files streamed or restored from archive, so the WAL file recycling logic used during normal operation works just as well during archive recovery. Per Fujii Masao's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1bd42cd70abdbc946ad64c3c8eaefed4bb8b1145">http://git.postgresql.org/pg/commitdiff/1bd42cd70abdbc946ad64c3c8eaefed4bb8b1145</a></li>

<li>Include previous TLI in end-of-recovery and shutdown checkpoint records. This isn't used for anything but a sanity check at the moment, but it could be highly valuable for debugging purposes. It could also be used to recreate timeline history by traversing WAL, which seems useful. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7803e9327db3788f68d820c19f4081afb79edd12">http://git.postgresql.org/pg/commitdiff/7803e9327db3788f68d820c19f4081afb79edd12</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add noreturn attributes to some error reporting functions 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0cb1fac3b19f01025b63d2cdceabb8767185da28">http://git.postgresql.org/pg/commitdiff/0cb1fac3b19f01025b63d2cdceabb8767185da28</a></li>

<li>doc: Add make target to produce EPUB from DocBook 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff64fd49ce91534ebbfd5774a8715b11bfc09b97">http://git.postgresql.org/pg/commitdiff/ff64fd49ce91534ebbfd5774a8715b11bfc09b97</a></li>

<li>pgindent: Fix order in instructions. The previous order of steps didn't literally work, because git clean -fdx would delete the downloaded typedefs.list. Also, pgindent needs to be called with a path when one is in at the top of the build tree. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e6c8da16a51e24a33bf4afeb311ca5d0ecd2b21">http://git.postgresql.org/pg/commitdiff/8e6c8da16a51e24a33bf4afeb311ca5d0ecd2b21</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't build libpgcommon_srv.a just yet. It's empty, and some archivers do not support that case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f980b0e17d95e77dc2822eb7855d072a5874d9a">http://git.postgresql.org/pg/commitdiff/0f980b0e17d95e77dc2822eb7855d072a5874d9a</a></li>

<li>Rename "string" pstrdup argument to "in". The former name collides with a symbol also used in the isolation test's parser, causing assorted failures in certain platforms. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e81ddde2c62ada7f818114ca961d80d42370e32">http://git.postgresql.org/pg/commitdiff/0e81ddde2c62ada7f818114ca961d80d42370e32</a></li>

<li>Create libpgcommon, and move pg_malloc et al to it. libpgcommon is a new static library to allow sharing code among the various frontend programs and backend; this lets us eliminate duplicate implementations of common routines. We avoid libpgport, because that's intended as a place for porting issues; per discussion, it seems better to keep them separate. The first use case, and the only implemented by this patch, is pg_malloc and friends, which many frontend programs were already using. At the same time, we can use this to provide palloc emulation functions for the frontend; this way, some palloc-using files in the backend can also be used by the frontend cleanly. To do this, we change palloc() in the backend to be a function instead of a macro on top of MemoryContextAlloc(). This was previously believed to cause loss of performance, but this implementation has been tweaked by Tom and Andres so that on modern compilers it provides a slight improvement over the previous one. This lets us clean up some places that were already with localized hacks. Most of the pg_malloc/palloc changes in this patch were authored by Andres Freund. Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi also independently provided a form of that. libpgcommon infrastructure was authored by &Aacute;lvaro. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8396447cdbdff0b62914748de2fec04281dc9114">http://git.postgresql.org/pg/commitdiff/8396447cdbdff0b62914748de2fec04281dc9114</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Create libpgcommon, and move pg_malloc et al to it libpgcommon is a new static library to allow sharing code among the various frontend programs and backend; this lets us eliminate duplicate implementations of common routines. We avoid libpgport, because that's intended as a place for porting issues; per discussion, it seems better to keep them separate. The first use case, and the only implemented by this patch, is pg_malloc and friends, which many frontend programs were already using. At the same time, we can use this to provide palloc emulation functions for the frontend; this way, some palloc-using files in the backend can also be used by the frontend cleanly. To do this, we change palloc() in the backend to be a function instead of a macro on top of MemoryContextAlloc(). This was previously believed to cause loss of performance, but this implementation has been tweaked by Tom and Andres so that on modern compilers it provides a slight improvement over the previous one. This lets us clean up some places that were already with localized hacks. Most of the pg_malloc/palloc changes in this patch were authored by Andres Freund. Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi also independently provided a form of that. libpgcommon infrastructure was authored by &Aacute;lvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8396447cdbdff0b62914748de2fec04281dc9114">http://git.postgresql.org/pg/commitdiff/8396447cdbdff0b62914748de2fec04281dc9114</a></li>

<li>Fix contrib/pg_trgm's similarity() function for trigram-free strings. Cases such as similarity('', '') produced a NaN result due to computing 0/0. Per discussion, make it return zero instead. This appears to be the basic cause of bug #7867 from Michele Baravalle, although it remains unclear why her installation doesn't think Cyrillic letters are letters. Back-patch to all active branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9728eda7925b6d42621b38c48e91ef9ab8d90cbc">http://git.postgresql.org/pg/commitdiff/9728eda7925b6d42621b38c48e91ef9ab8d90cbc</a></li>

<li>Fix CVE-2013-0255 properly. Revert commit ab0f7b6089fd215f6ce6081e2e222c38d643a526 (in HEAD only) in favor of the proper solution, which is to declare enum_recv() correctly in the system catalogs. It should be declared to take type "internal" not "cstring". Also improve the type_sanity regression test, which should have caught this typo, so that it actually would. Most of the relevant checks on the signature of type I/O functions should not have been restricted to basetypes/pseudotypes, as they should apply to any type's I/O functions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71627f3d1964ef9831ea7997d2f4ac5617c718cc">http://git.postgresql.org/pg/commitdiff/71627f3d1964ef9831ea7997d2f4ac5617c718cc</a></li>

<li>Invent pre-commit/pre-prepare/pre-subcommit events for xact callbacks. Currently it's only possible for loadable modules to get control during post-commit cleanup of a transaction. That doesn't work too well if they want to do something that could throw an error; for example, an FDW might need to issue a remote commit, which could well fail. To improve matters, extend the existing APIs for XactCallback and SubXactCallback functions to provide new pre-commit events for this purpose. The release notes will need to mention that existing callback functions should be checked to make sure they don't do something unwanted when one of the new event types occurs. In the examples within our source tree, contrib/sepgsql was fine but plpgsql had been a bit too cute. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdaf44862beba24c12434d31df556fab25fd3ee7">http://git.postgresql.org/pg/commitdiff/fdaf44862beba24c12434d31df556fab25fd3ee7</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_upgrade log file cleanup code. Recent pg_upgrade parallel improvements introduced a bug that prevented cleanup of per-database log files. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74205266d4925b54bf1d77bae7b0e7f60f68840a">http://git.postgresql.org/pg/commitdiff/74205266d4925b54bf1d77bae7b0e7f60f68840a</a></li>

<li>pg_upgrade: conditionally create cluster delete script. If users create tablespaces inside the old cluster directory, it is impossible for the delete script to delete _only_ the old cluster files, so don't create a script in that case, and issue a message to the user. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4765dd79219b9697d84f5c2c70f3fe00455609a1">http://git.postgresql.org/pg/commitdiff/4765dd79219b9697d84f5c2c70f3fe00455609a1</a></li>

<li>Warn about initdb using mount-points. Add code to detect and warn about trying to initdb or create pg_xlog on mount points. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17f15239325a88581bb4f9cf91d38005f1f52d69">http://git.postgresql.org/pg/commitdiff/17f15239325a88581bb4f9cf91d38005f1f52d69</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jeff Janes sent in a patch to bgbench which allows any arbitrary command to be executed upon the start up of each connection intended for benchmarking.</li>

<li>Andrew Dunstan sent in another revision of a patch to add a JSON API.</li>

<li>Manlio Perillo sent in a patch against libpq to send a Describe Portal message in PQsendPrepare.</li>

<li>Pavel Stehule and Dean Rasheed traded patches to fix the behavior of the width specifier in the format function in cases of mixed positional and ordered placeholders.</li>

<li>Michael Paquier sent in two more revisions of a patch to add REINDEX CONCURRENTLY.</li>

<li>Amit Kapila sent in another revision of a patch to implement identity projection.</li>

<li>Alvaro Herrera and Andres Freund traded patches to implement xlogdump.</li>

<li>Jonathan Rogers sent in a WIP patch to use BTRFS file cloning facilities to speed up CREATE DATABASE operations.</li>

<li>Amit Kapila sent in another revision of a patch to allow changing postgresql.conf settings via SQL.</li>

<li>David Fetter sent in two more revisions of a patch to add an optional FILTER clause to aggregates.</li>

<li>Alvaro Herrera and Tomas Vondra traded patches to split stats file per database.</li>

<li>Fujii Masao sent in another revision of a patch to prevent archiving restored WALs.</li>

<li>Bruce Momjian sent in a patch to go with subtle hints about mounting a PGDATA directories and similar at the root as opposed to a previous version that looked for filesystem-specific things like "lost+found".</li>

<li>Kevin Grittner sent in another revision of a patch to implement materialized views.</li>

<li>Andres Freund sent in an RfC patch to implement indirect TOAST support.</li>

<li>Pavel Stehule sent in another revision of a patch to implement function body checking for PL/pgsql.</li>

</ul>