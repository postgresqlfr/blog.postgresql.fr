---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 février 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/02/18/Nouvelles-hebdomadaires-de-PostgreSQL-15-février-2015"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgpool-II versions 3.4.1, 3.3.5, 3.2.10, 3.1.13 et 3.0.17 publi&eacute;es avec pgpoolAdmin 3.4.1. pgpool-II est un pooler de connexions et un syst&egrave;me de r&eacute;plication pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a> <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Yum_Repository">http://pgpool.net/mediawiki/index.php/Yum_Repository</a></li>

<li>psycopg2 2.6 et 2.5.5, un connecteur Python for PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2015/02/09/psycopg-26-and-255-released/">http://initd.org/psycopg/articles/2015/02/09/psycopg-26-and-255-released/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le <em>meetup</em> du 18 f&eacute;vrier 2015 &agrave; Melbourne accueillera Gabriele Bartolini &agrave; propos de PostgreSQL 9.4 pour les devops. D&eacute;tails ci-apr&egrave;s, et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/melpug/events/219082475/">http://www.meetup.com/melpug/events/219082475/</a></li>

<li>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></li>

<li>Les inscriptions pour le <em>Nordic PostgreSQL Day 2015</em>, pr&eacute;vu le 11 mars 2015 &agrave; Copenhague (Danemark), sont ouvertes&nbsp;: 

<a target="_blank" href="http://2015.nordicpgday.org/registration/">http://2015.nordicpgday.org/registration/</a></li>

<li>PGConf US 2015 aura lieu du 25 au 27 mars 2015 &agrave; New-York City&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

<li>PGCon 2015 du 16 au 20 juin &agrave; Ottawa, Canada&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/">http://www.pgcon.org/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150216012926.GC32028@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move pg_lzcompress.c to src/common. The meta data of PGLZ symbolized by PGLZ_Header is removed, to make the compression and decompression code independent on the backend-only varlena facility. PGLZ_Header is being used to store some meta data related to the data being compressed like the raw length of the uncompressed record or some varlena-related data, making it unpluggable once PGLZ is stored in src/common as it contains some backend-only code paths with the management of varlena structures. The APIs of PGLZ are reworked at the same time to do only compression and decompression of buffers without the meta-data layer, simplifying its use for a more general usage. On-disk format is preserved as well, so there is no incompatibility with previous major versions of PostgreSQL for TOAST entries. Exposing compression and decompression APIs of pglz makes possible its use by extensions and contrib modules. Especially this commit is required for upcoming WAL compression feature so that the WAL reader facility can decompress the WAL data by using pglz_decompress. Michael Paquier, reviewed by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40bede5477bb5bce98ce9548841cb414634c26f7">http://git.postgresql.org/pg/commitdiff/40bede5477bb5bce98ce9548841cb414634c26f7</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix MSVC build. When I moved pg_crc.c from src/port to src/common, I forgot to modify MSVC build script accordingly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc761b170c5e7b4ef22ed918f4785ec1fabe62cd">http://git.postgresql.org/pg/commitdiff/cc761b170c5e7b4ef22ed918f4785ec1fabe62cd</a></li>

<li>Move pg_crc.c to src/common, and remove pg_crc_tables.h. To get CRC functionality in a client program, you now need to link with libpgcommon instead of libpgport. The CRC code has nothing to do with portability, so libpgcommon is a better home. (libpgcommon didn't exist when pg_crc.c was originally moved to src/port.) Remove the possibility to get CRC functionality by just #including pg_crc_tables.h. I'm not aware of any extensions that actually did that and couldn't simply link with libpgcommon. This also moves the pg_crc.h header file from src/include/utils to src/include/common, which will require changes to any external programs that currently does #include "utils/pg_crc.h". That seems acceptable, as include/common is clearly the right home for it now, and the change needed to any such programs is trivial. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c619c2351f7ec429b6ddce519c939f7b8465d711">http://git.postgresql.org/pg/commitdiff/c619c2351f7ec429b6ddce519c939f7b8465d711</a></li>

<li>Speed up CRC calculation using slicing-by-8 algorithm. This speeds up WAL generation and replay. The new algorithm is significantly faster with large inputs, like full-page images or when inserting wide rows. It is slower with tiny inputs, i.e. less than 10 bytes or so, but the speedup with longer inputs more than make up for that. Even small WAL records at least have 24 byte header in the front. The output is identical to the current byte-at-a-time computation, so this does not affect compatibility. The new algorithm is only used for the CRC-32C variant, not the legacy version used in tsquery or the "traditional" CRC-32 used in hstore and ltree. Those are not as performance critical, and are usually only applied over small inputs, so it seems better to not carry around the extra lookup tables to speed up those rare cases. Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/025c02420de990c15a90e9e3f86fcfbc5b59ee88">http://git.postgresql.org/pg/commitdiff/025c02420de990c15a90e9e3f86fcfbc5b59ee88</a></li>

<li>Simplify waiting logic in reading from / writing to client. The client socket is always in non-blocking mode, and if we actually want blocking behaviour, we emulate it by sleeping and retrying. But we have retry loops at different layers for reads and writes, which was confusing. To simplify, remove all the sleeping and retrying code from the lower levels, from be_tls_read and secure_raw_read and secure_raw_write, and put all the logic in secure_read() and secure_write(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80788a431e9bff06314a054109fdea66ac538199">http://git.postgresql.org/pg/commitdiff/80788a431e9bff06314a054109fdea66ac538199</a></li>

<li>Simplify the way OpenSSL renegotiation is initiated in server. At least in all modern versions of OpenSSL, it is enough to call SSL_renegotiate() once, and then forget about it. Subsequent SSL_write() and SSL_read() calls will finish the handshake. The SSL_set_session_id_context() call is unnecessary too. We only have one SSL context, and the SSL session was created with that to begin with. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/272923a0a6956187471df4f032eee06559520390">http://git.postgresql.org/pg/commitdiff/272923a0a6956187471df4f032eee06559520390</a></li>

<li>Fix broken #ifdef for __sparcv8. Rob Rowan. Backpatch to all supported versions, like the patch that added the broken #ifdef. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33e879c4e9f485405fc19b663392d8635714d020">http://git.postgresql.org/pg/commitdiff/33e879c4e9f485405fc19b663392d8635714d020</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor cleanup/code review for "indirect toast" stuff. Fix some issues I noticed while fooling with an extension to allow an additional kind of toast pointer. Much of this is just comment improvement, but there are a couple of actual bugs, which might or might not be reachable today depending on what can happen during logical decoding. An example is that toast_flatten_tuple() failed to cover the possibility of an indirection pointer in its input. Back-patch to 9.4 just in case that is reachable now. In HEAD, also correct some really minor issues with recent compression reorganization, such as dangerously underparenthesized macros. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc4de01db3a210e988dc88b585d7c38e6e7054c7">http://git.postgresql.org/pg/commitdiff/bc4de01db3a210e988dc88b585d7c38e6e7054c7</a></li>

<li>Fix GEQO to not assume its join order heuristic always works. Back in commit 400e2c934457bef4bc3cc9a3e49b6289bd761bc0 I rewrote GEQO's gimme_tree function to improve its heuristic for modifying the given tour into a legal join order. In what can only be called a fit of hubris, I supposed that this new heuristic would *always* find a legal join order, and ripped out the old logic that allowed gimme_tree to sometimes fail. The folly of this is exposed by bug #12760, in which the "greedy" clumping behavior of merge_clump() can lead it into a dead end which could only be recovered from by un-clumping. We have no code for that and wouldn't know exactly what to do with it if we did. Rather than try to improve the heuristic rules still further, let's just recognize that it *is* a heuristic and probably must always have failure cases. So, put back the code removed in the previous commit to allow for failure (but comment it a bit better this time). It's possible that this code was actually fully correct at the time and has only been broken by the introduction of LATERAL. But having seen this example I no longer have much faith in that proposition, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a179f36f7c612d3560a72396c559cd876dfab6b">http://git.postgresql.org/pg/commitdiff/1a179f36f7c612d3560a72396c559cd876dfab6b</a></li>

<li>Fix pg_dump's heuristic for deciding which casts to dump. Back in 2003 we had a discussion about how to decide which casts to dump. At the time pg_dump really only considered an object's containing schema to decide what to dump (ie, dump whatever's not in pg_catalog), and so we chose a complicated idea involving whether the underlying types were to be dumped (cf commit a6790ce85752b67ad994f55fdf1a450262ccc32e). But users are allowed to create casts between built-in types, and we failed to dump such casts. Let's get rid of that heuristic, which has accreted even more ugliness since then, in favor of just looking at the cast's OID to decide if it's a built-in cast or not. In passing, also fix some really ancient code that supposed that it had to manufacture a dependency for the cast on its cast function; that's only true when dumping from a pre-7.3 server. This just resulted in some wasted cycles and duplicate dependency-list entries with newer servers, but we might as well improve it. Per gripes from a number of people, most recently Greg Sabino Mullane. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9feefedf9e92066fa6609d1e1e17b4892d81716f">http://git.postgresql.org/pg/commitdiff/9feefedf9e92066fa6609d1e1e17b4892d81716f</a></li>

<li>Fix more memory leaks in failure path in buildACLCommands. We already had one go at this issue in commit d73b7f973db5ec7e, but we failed to notice that buildACLCommands also leaked several PQExpBuffers along with a simply malloc'd string. This time let's try to make the fix a bit more future-proof by eliminating the separate exit path. It's still not exactly critical because pg_dump will curl up and die on failure; but since the amount of the potential leak is now several KB, it seems worth back-patching as far as 9.2 where the previous fix landed. Per Coverity, which evidently is smarter than clang's static analyzer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9179444d070713f53a97bc8f5c898a8304424c4d">http://git.postgresql.org/pg/commitdiff/9179444d070713f53a97bc8f5c898a8304424c4d</a></li>

<li>Fix minor memory leak in ident_inet(). We'd leak the ident_serv data structure if the second pg_getaddrinfo_all (the one for the local address) failed. This is not of great consequence because a failure return here just leads directly to backend exit(), but if this function is going to try to clean up after itself at all, it should not have such holes in the logic. Try to fix it in a future-proof way by having all the failure exits go through the same cleanup path, rather than "optimizing" some of them. Per Coverity. Back-patch to 9.2, which is as far back as this patch applies cleanly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58146d35deed3bd3e05ce4b5ba529e4e4a369ddb">http://git.postgresql.org/pg/commitdiff/58146d35deed3bd3e05ce4b5ba529e4e4a369ddb</a></li>

<li>Fix missing PQclear() in libpqrcv_endstreaming(). This omission leaked one PGresult per WAL streaming cycle, which possibly would never be enough to notice in the real world, but it's still a leak. Per Coverity. Back-patch to 9.3 where the error was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f38a281a3d4a7cbcf9de2f676d44336d57b7717">http://git.postgresql.org/pg/commitdiff/4f38a281a3d4a7cbcf9de2f676d44336d57b7717</a></li>

<li>Avoid returning undefined bytes in chkpass_in(). We can't really fix the problem that the result is defined to depend on random(), so it is still going to fail the "unstable input conversion" test in parse_type.c. However, we can at least satify valgrind. (It looks like this code used to be valgrind-clean, actually, until somebody did a careless s/strncpy/strlcpy/g on it.) In passing, let's just make real sure that chkpass_out doesn't overrun its output buffer. No need for backpatch, I think, since this is just to satisfy debugging tools. Asif Naeem 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80986e85aafd64165efc7f45b330f2f213713032">http://git.postgresql.org/pg/commitdiff/80986e85aafd64165efc7f45b330f2f213713032</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fixed array handling in ecpg. When ecpg was rewritten to the new protocol version not all variable types were corrected. This patch rewrites the code for these types to fix that. It also fixes the documentation to correctly tell the status of array handling. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f393fc923ec77f25fd37e16fd8ccb480df82ebb">http://git.postgresql.org/pg/commitdiff/1f393fc923ec77f25fd37e16fd8ccb480df82ebb</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in logicaldecoding.sgml. Author: Tatsuo Ishii. Backpatch to 9.4, where logical decoding was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8785e6e378f919827d851926ea0f400f08afd477">http://git.postgresql.org/pg/commitdiff/8785e6e378f919827d851926ea0f400f08afd477</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: preserve freeze info for postgres/template1 dbs. pg_database.datfrozenxid and pg_database.datminmxid were not preserved for the 'postgres' and 'template1' databases. This could cause missing clog file errors on access to user tables and indexes after upgrades in these databases. Backpatch through 9.0 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/866f3017a88b9cb639f05c9ad413e5eafe0266e3">http://git.postgresql.org/pg/commitdiff/866f3017a88b9cb639f05c9ad413e5eafe0266e3</a></li>

<li>pg_upgrade: improve checksum mismatch error message. Patch by Greg Sabino Mullane, slight adjustments by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc01efa5ccdd9804b0c97d4d9b651ba9360ebb11">http://git.postgresql.org/pg/commitdiff/dc01efa5ccdd9804b0c97d4d9b651ba9360ebb11</a></li>

<li>pg_upgrade: quote directory names in delete_old_cluster script. This allows the delete script to properly function when special characters appear in directory paths, e.g. spaces. Backpatch through 9.0 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/056764b10248bff702d9d7b8b97690668eaf1c93">http://git.postgresql.org/pg/commitdiff/056764b10248bff702d9d7b8b97690668eaf1c93</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_regress: Write processed input/*.source into output dir. Before, it was writing the processed files into the input directory, which is incorrect in a vpath build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64cdbbc48cade73d7b0831444a62e19fd4a342f8">http://git.postgresql.org/pg/commitdiff/64cdbbc48cade73d7b0831444a62e19fd4a342f8</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor housekeeping on JSON docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5b31e29f0128b1c3c1caeeef81b0986cebdcd03">http://git.postgresql.org/pg/commitdiff/c5b31e29f0128b1c3c1caeeef81b0986cebdcd03</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tatsuo Ishii and Michael Paquier traded patches to fix some incompatible options in pgbench.</li>

<li>David Steele sent in two more revisions of a patch to implement pgaudit.</li>

<li>Jan Urba&#324;ski sent in two revisions of a patch to fix broken multi-threaded SSL callback handling in libpq.</li>

<li>Rahila Syed sent in three more revisions of a patch to implement compression of full-page writes.</li>

<li>Peter Geoghegan and Heikki Linnakangas traded patches to implement INSERT ... ON CONFLICT {UPDATE | IGNORE}.</li>

<li>Heikki Linnakangas sent in two revisions of a patch to use use Intel SSE4.2 CRC instructions where available.</li>

<li>Michael Paquier sent in three more revisions of a patch to implement table-level autovacuum_min_duration.</li>

<li>Michael Paquier sent in a patch to add a wal_retrieve_retry_interval.</li>

<li>Kyotaro HORIGUCHI sent in two revisions of a patch to fix an issue where pg_basebackup fails silently.</li>

<li>Tom Lane sent in two revisions of a patch to manipulate complex types as non-contiguous structures in-memory.</li>

<li>Etsuro Fujita sent in another revision of a patch to fix ExplainModifyTarget to work as expected.</li>

<li>Michael Paquier sent in a patch to add palloc_extended for frontend and backend, and another to rework handling of OOM when allocating record buffer in XLOG reader.</li>

<li>Anastasia Lubennikova sent in two more revisions of a patch to allow index-only scans for GiST indexes.</li>

<li>Emre Hasegeli sent in another revision of a patch to add a BRIN range operator class.</li>

<li>Robert Haas sent in two more revisions of a patch to implement parallel mode and parallel contexts.</li>

<li>Marco Nenciarini sent in another revision of a patch to implement file-based incremental backup.</li>

<li>Marco Nenciarini sent in another revision of a patch to fix pg_check_dir.</li>

<li>Michael Paquier sent in a patch to fix an odd assertion using VACOPT_FREEZE in vacuum.c.</li>

<li>Teodor Sigaev sent in a patch to implement some of the intarray features for all arrays.</li>

<li>Teodor Sigaev sent in another revision of a patch to add a compress method for SP-GiST.</li>

<li>Heikki Linnakangas sent in another revision of a patch to redesign checkpoint_segments.</li>

<li>Heikki Linnakangas sent in a patch to refactor unit conversions.</li>

<li>Atri Sharma sent in another revision of a patch to implement UPDATE ... SET(*) =.</li>

<li>Asif Naeem sent in a patch to fix chkpass to work under RANDOMIZE_ALLOCATED_MEMORY.</li>

<li>Kevin Grittner sent in two revisions of a patch to fix an issue manifesting as "multiple backends attempting to wait for pincount 1".</li>

<li>Kevin Grittner sent in a patch to help control bloat in the face of old snapshots.</li>

<li>Peter Eisentraut sent in a patch to speed up make check-world.</li>

<li>&Aacute;lvaro Herrera sent in another revision of a patch to add CREATE ALTER, GRANT/REVOKE, COMMENT ON, and SECURITY LABEL command deparsing support to event triggers.</li>

<li>Peter Eisentraut sent in a patch to add a pg_settings.pending_restart column.</li>

<li>Peter Eisentraut sent in a patch to use forward slashes exclusively in Windows builds, making it possible at least in theory to build such on non-Windows machines.</li>

<li>Kevin Grittner sent in a patch to allow a "snapshot too old" error.</li>

<li>Andrew Dunstan sent in two revisions of a patch to add mogrify and indent to JSONB.</li>

<li>Robert Haas sent in another revision of a patch to allow assessing parallel safety.</li>

<li>Alexander Korotkov sent in another revision of a patch to implement KNN-GiST with recheck.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement join replacement with foreign-/custom-scan.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to implement a sequence access method.</li>

<li>Tomas Vondra sent in a PoC patch to implement a mmap-based memory context / allocator.</li>

<li>Emre Hasegeli sent in another revision of a patch to implement selectivity estimation for inet operators.</li>

<li>Andres Freund sent in another revision of a patch to implement replication identifiers.</li>

<li>David Steele sent in a patch to fix some dependency issues in the documentation build for OSX.</li>

<li>Andrew (RhodiumToad) Gierth and Tomas Vondra traded patches to fix some really bad blowups with hash outer join and nulls.</li>

</ul>