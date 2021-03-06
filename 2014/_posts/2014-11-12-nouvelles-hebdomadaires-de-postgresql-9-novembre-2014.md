---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 novembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/11/12/Nouvelles-hebdomadaires-de-PostgreSQL-9-novembre-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Bucardo 5.2.0, un syst&egrave;me de r&eacute;plication multi-source, multi-cible&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Bucardo">http://bucardo.org/wiki/Bucardo</a></li>

<li>pgpool-II 3.3.4, un gestionnaire de connexions et un syst&egrave;me de r&eacute;plication pour PostgreSQL, et pgpoolAdmin 3.4, son interface web d'administration&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

<li>PostgreSQL PHP Generator 14.10, un g&eacute;n&eacute;rateur graphique CRUD d'application web pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/phpgenerator/">http://www.sqlmaestro.com/products/postgresql/phpgenerator/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>[ndt: meetup &agrave; Lyon le 19 novembre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/">http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/</a>]</li>

<li>PG-Cuba aura lieu les 25 &amp; 26 novembre 2014&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?p=1087#more-1087">http://postgresql.uci.cu/?p=1087#more-1087</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGDay (30 janvier 2015) et la <em>dev room</em> PostgreSQL du FOSDEM (31 janvier au 1<sup>er</sup> f&eacute;vrier 2015) est lanc&eacute;. Date limite des candidatures&nbsp;: 24 novembre 2014&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/callforpapers/">http://fosdem2015.pgconf.eu/callforpapers/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf NYC 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. l'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141109214705.GO21846@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Docs: fix incorrect spelling of contrib/pgcrypto option. pgp_sym_encrypt's option is spelled "sess-key", not "enable-session-key". Spotted by Jeff Janes. In passing, improve a comment in pgp-pgsql.c to make it clearer that the debugging options are intentionally undocumented. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f443de873e500de999a2d165731a0356b79a6ed7">http://git.postgresql.org/pg/commitdiff/f443de873e500de999a2d165731a0356b79a6ed7</a></li>

<li>Drop no-longer-needed buffers during ALTER DATABASE SET TABLESPACE. The previous coding assumed that we could just let buffers for the database's old tablespace age out of the buffer arena naturally. The folly of that is exposed by bug #11867 from Marc Munro: the user could later move the database back to its original tablespace, after which any still-surviving buffers would match lookups again and appear to contain valid data. But they'd be missing any changes applied while the database was in the new tablespace. This has been broken since ALTER SET TABLESPACE was introduced, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33f80f8480434f02beb940b8f0627d534f3fd3af">http://git.postgresql.org/pg/commitdiff/33f80f8480434f02beb940b8f0627d534f3fd3af</a></li>

<li>Fix volatility markings of some contrib I/O functions. In general, datatype I/O functions are supposed to be immutable or at worst stable. Some contrib I/O functions were, through oversight, not marked with any volatility property at all, which made them VOLATILE. Since (most of) these functions actually behave immutably, the erroneous marking isn't terribly harmful; but it can be user-visible in certain circumstances, as per a recent bug report from Joe Van Dyk in which a cast to text was disallowed in an expression index definition. To fix, just adjust the declarations in the extension SQL scripts. If we were being very fussy about this, we'd bump the extension version numbers, but that seems like more trouble (for both developers and users) than the problem is worth. A fly in the ointment is that chkpass_in actually is volatile, because of its use of random() to generate a fresh salt when presented with a not-yet-encrypted password. This is bad because of the general assumption that I/O functions aren't volatile: the consequence is that records or arrays containing chkpass elements may have input behavior a bit different from a bare chkpass column. But there seems no way to fix this without breaking existing usage patterns for chkpass, and the consequences of the inconsistency don't seem bad enough to justify that. So for the moment, just document it in a comment. Since we're not bumping version numbers, there seems no harm in back-patching these fixes; at least future installations will get the functions marked correctly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66c029c842629958b3ae0d389f24ea3407225723">http://git.postgresql.org/pg/commitdiff/66c029c842629958b3ae0d389f24ea3407225723</a></li>

<li>Make CREATE TYPE print warnings if a datatype's I/O functions are volatile. This is a followup to commit 43ac12c6e6e397fd9142ed908447eba32d3785b2, which added regression tests checking that I/O functions of built-in types are not marked volatile. Complaining in CREATE TYPE should push developers of add-on types to fix any misdeclared functions in their types. It's just a warning not an error, to avoid creating upgrade problems for what might be just cosmetic mis-markings. Aside from adding the warning code, fix a number of types that were sloppily created in the regression tests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/465d7e1882bc1f316c7cb2a68e751c34b403e8d7">http://git.postgresql.org/pg/commitdiff/465d7e1882bc1f316c7cb2a68e751c34b403e8d7</a></li>

<li>Remove the last vestige of server-side autocommit. Long ago we briefly had an "autocommit" GUC that turned server-side autocommit on and off. That behavior was removed in 7.4 after concluding that it broke far too much client-side logic, and making clients cope with both behaviors was impractical. But the GUC variable was left behind, so as not to break any client code that might be trying to read its value. Enough time has now passed that we should remove the GUC completely. Whatever vestigial backwards-compatibility benefit it had is outweighed by the risk of confusion for newbies who assume it ought to do something, as per a recent complaint from Wolfgang Wilhelm. In passing, adjust what seemed to me a rather confusing documentation reference to libpq's autocommit behavior. libpq as such knows nothing about autocommit, so psql is probably what was meant. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/525a489915cad1c5b2fc39e43e8005025afe63b2">http://git.postgresql.org/pg/commitdiff/525a489915cad1c5b2fc39e43e8005025afe63b2</a></li>

<li>Fix normalization of numeric values in JSONB GIN indexes. The default JSONB GIN opclass (jsonb_ops) converts numeric data values to strings for storage in the index. It must ensure that numeric values that would compare equal (such as 12 and 12.00) produce identical strings, else index searches would have behavior different from regular JSONB comparisons. Unfortunately the function charged with doing this was completely wrong: it could reduce distinct numeric values to the same string, or reduce equivalent numeric values to different strings. The former type of error would only lead to search inefficiency, but the latter type of error would cause index entries that should be found by a search to not be found. Repairing this bug therefore means that it will be necessary for 9.4 beta testers to reindex GIN jsonb_ops indexes, if they care about getting correct results from index searches involving numeric data values within the comparison JSONB object. Per report from Thomas Fanghaenel. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4875931938b27924fe8d6f91bbdb09e2e5a29d0a">http://git.postgresql.org/pg/commitdiff/4875931938b27924fe8d6f91bbdb09e2e5a29d0a</a></li>

<li>Cope with more than 64K phrases in a thesaurus dictionary. dict_thesaurus stored phrase IDs in uint16 fields, so it would get confused and even crash if there were more than 64K entries in the configuration file. It turns out to be basically free to widen the phrase IDs to uint32, so let's just do so. This was complained of some time ago by David Boutin (in bug #7793); he later submitted an informal patch but it was never acted on. We now have another complaint (bug #11901 from Luc Ouellette) so it's time to make something happen. This is basically Boutin's patch, but for future-proofing I also added a defense against too many words per phrase. Note that we don't need any explicit defense against overflow of the uint32 counters, since before that happens we'd hit array allocation sizes that repalloc rejects. Back-patch to all supported branches because of the crash risk. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6e37b35cda9a88dfd938dd61e9986dd93cc6dd3">http://git.postgresql.org/pg/commitdiff/d6e37b35cda9a88dfd938dd61e9986dd93cc6dd3</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>pqmq.h needs to include something that defines StringInfo. Reported by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/585e0b9b277ad3b17a582b20daa8d09bd0ace8bd">http://git.postgresql.org/pg/commitdiff/585e0b9b277ad3b17a582b20daa8d09bd0ace8bd</a></li>

<li>Fix thinko in commit 2bd9e412f92bc6a68f3e8bcb18e04955cc35001d. Obviously, every translation unit should not be declaring this separately. It needs to be PGDLLIMPORT as well, to avoid breaking third-party code that uses any of the functions that the commit mentioned above changed to macros. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c30be9787bd9808631b72843b0a93f06ce775dd0">http://git.postgresql.org/pg/commitdiff/c30be9787bd9808631b72843b0a93f06ce775dd0</a></li>

<li>Update pg_xlogdump's .gitignore for brindesc.c. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99e8f08fab6fb8a10cb5ef060b9e4973b671d27d">http://git.postgresql.org/pg/commitdiff/99e8f08fab6fb8a10cb5ef060b9e4973b671d27d</a></li>

<li>Use the sortsupport infrastructure in more cases. This removes some fmgr overhead from cases such as btree index builds. Peter Geoghegan, reviewed by Andreas Karlsson and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ea86e6e65dd2da3e9a3464484985d48328e7fe3">http://git.postgresql.org/pg/commitdiff/5ea86e6e65dd2da3e9a3464484985d48328e7fe3</a></li>

<li>Introduce custom path and scan providers. This allows extension modules to define their own methods for scanning a relation, and get the core code to use them. It's unclear as yet how much use this capability will find, but we won't find out if we never commit it. KaiGai Kohei, reviewed at various times and in various levels of detail by Shigeru Hanada, Tom Lane, Andres Freund, &Aacute;lvaro Herrera, and myself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b03e5951bf0a1a8868db13f02049cf686a82165">http://git.postgresql.org/pg/commitdiff/0b03e5951bf0a1a8868db13f02049cf686a82165</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Switch to CRC-32C in WAL and other places. The old algorithm was found to not be the usual CRC-32 algorithm, used by Ethernet et al. We were using a non-reflected lookup table with code meant for a reflected lookup table. That's a strange combination that AFAICS does not correspond to any bit-wise CRC calculation, which makes it difficult to reason about its properties. Although it has worked well in practice, seems safer to use a well-known algorithm. Since we're changing the algorithm anyway, we might as well choose a different polynomial. The Castagnoli polynomial has better error-correcting properties than the traditional CRC-32 polynomial, even if we had implemented it correctly. Another reason for picking that is that some new CPUs have hardware support for calculating CRC-32C, but not CRC-32, let alone our strange variant of it. This patch doesn't add any support for such hardware, but a future patch could now do that. The old algorithm is kept around for tsquery and pg_trgm, which use the values in indexes that need to remain compatible so that pg_upgrade works. While we're at it, share the old lookup table for CRC-32 calculation between hstore, ltree and core. They all use the same table, so might as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5028f22f6eb0579890689655285a4778b4ffc460">http://git.postgresql.org/pg/commitdiff/5028f22f6eb0579890689655285a4778b4ffc460</a></li>

<li>Remove support for 64-bit CRC. It hasn't been used for anything for a long time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/404bc51cde9dce1c674abe4695635612f08fe27e">http://git.postgresql.org/pg/commitdiff/404bc51cde9dce1c674abe4695635612f08fe27e</a></li>

<li>Remove obsolete cases from GiST update redo code. The code that generated a record to clear the F_TUPLES_DELETED flag hasn't existed since we got rid of old-style VACUUM FULL. I kept the code that sets the flag, although it's not used for anything anymore, because it might still be interesting information for debugging purposes that some tuples have been deleted from a page. Likewise, the code to turn the root page from non-leaf to leaf page was removed when we got rid of old-style VACUUM FULL. Remove the code to replay that action, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2effb72e682a7dbdc9a8a60a80c22ec1fa9d8079">http://git.postgresql.org/pg/commitdiff/2effb72e682a7dbdc9a8a60a80c22ec1fa9d8079</a></li>

<li>Fix generation of SP-GiST vacuum WAL records. I broke these in 8776faa81cb651322b8993422bdd4633f1f6a487. Backpatch to 9.4, where that was done. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1961b1c131e4211f3dc86ff2be971e430ab2a23d">http://git.postgresql.org/pg/commitdiff/1961b1c131e4211f3dc86ff2be971e430ab2a23d</a></li>

<li>Fix building with WAL_DEBUG. Now that the backup blocks are appended to the WAL record in xloginsert.c, XLogInsert doesn't see them anymore and cannot remove them from the version reconstructed for xlog_outdesc. This makes running with wal_debug=on more expensive, as we now make (unnecessary) temporary copies of the backup blocks, but it doesn't seem worth convoluting the code to keep that optimization. Reported by Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7250d8535b11d6443a9b27299e586c3df0654302">http://git.postgresql.org/pg/commitdiff/7250d8535b11d6443a9b27299e586c3df0654302</a></li>

<li>Move the backup-block logic from XLogInsert to a new file, xloginsert.c. xlog.c is huge, this makes it a little bit smaller, which is nice. Functions related to putting together the WAL record are in xloginsert.c, and the lower level stuff for managing WAL buffers and such are in xlog.c. Also move the definition of XLogRecord to a separate header file. This causes churn in the #includes of all the files that write WAL records, and redo routines, but it avoids pulling in xlog.h into most places. Reviewed by Michael Paquier, Alvaro Herrera, Andres Freund and Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2076db2aea766c4c828dccc34ae35f614129000d">http://git.postgresql.org/pg/commitdiff/2076db2aea766c4c828dccc34ae35f614129000d</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Move misplaced paragraph 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e809fa2c80e051ed49a3ed2206dc055a10d588a4">http://git.postgresql.org/pg/commitdiff/e809fa2c80e051ed49a3ed2206dc055a10d588a4</a></li>

<li>doc: Update pg_receivexlog note. The old note about how to use pg_receivexlog as an alternative to archive_command was obsoleted by replication slots. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/552faefd68f1cec6bbaf0a038d8d410b59edb17f">http://git.postgresql.org/pg/commitdiff/552faefd68f1cec6bbaf0a038d8d410b59edb17f</a></li>

<li>pg_basebackup: Adjust tests for long file name issues. Work around accidental test failures because the working directory path is too long by creating a temporary directory in the (hopefully shorter) system location, symlinking that to the working directory, and creating the tablespaces using the shorter path. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/926f5cea472676b8378f02cd80c2c5f86226d981">http://git.postgresql.org/pg/commitdiff/926f5cea472676b8378f02cd80c2c5f86226d981</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>C comment: mention why the Gregorian calendar is used pre-1582 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/171c377a0abe12d1418540dc154feccd9355995e">http://git.postgresql.org/pg/commitdiff/171c377a0abe12d1418540dc154feccd9355995e</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Implement IF NOT EXIST for CREATE INDEX. Fabr&iacute;zio de Royes Mello, reviewed by Marti Raudsepp, Adam Brightwell and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08309aaf74ee879699165ec8a2d53e56f2d2e947">http://git.postgresql.org/pg/commitdiff/08309aaf74ee879699165ec8a2d53e56f2d2e947</a></li>

<li>Fix typo in comment. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2b8a2c7ec1098e7b98160ccdc0e3a513964fb08">http://git.postgresql.org/pg/commitdiff/d2b8a2c7ec1098e7b98160ccdc0e3a513964fb08</a></li>

<li>Prevent the unnecessary creation of .ready file for the timeline history file. Previously .ready file was created for the timeline history file at the end of an archive recovery even when WAL archiving was not enabled. This creation is unnecessary and causes .ready file to remain infinitely. This commit changes an archive recovery so that it creates .ready file for the timeline history file only when WAL archiving is enabled. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5332b8cec54192c5d7b0ad67dc5668ccb917eeef">http://git.postgresql.org/pg/commitdiff/5332b8cec54192c5d7b0ad67dc5668ccb917eeef</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix serial schedule. Test misc depends on brin, but it was earlier in the serial schedule file. I didn't notice this because I only run the parallel schedule, but the buildfarm exposed my folly ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e892e04efdc92abf53260e0bb0092cc48060e22">http://git.postgresql.org/pg/commitdiff/0e892e04efdc92abf53260e0bb0092cc48060e22</a></li>

<li>BRIN: Block Range Indexes. BRIN is a new index access method intended to accelerate scans of very large tables, without the maintenance overhead of btrees or other traditional indexes. They work by maintaining "summary" data about block ranges. Bitmap index scans work by reading each summary tuple and comparing them with the query quals; all pages in the range are returned in a lossy TID bitmap if the quals are consistent with the values in the summary tuple, otherwise not. Normal index scans are not supported because these indexes do not store TIDs. As new tuples are added into the index, the summary information is updated (if the block range in which the tuple is added is already summarized) or not; in the latter case, a subsequent pass of VACUUM or the brin_summarize_new_values() function will create the summary information. For data types with natural 1-D sort orders, the summary info consists of the maximum and the minimum values of each indexed column within each page range. This type of operator class we call "Minmax", and we supply a bunch of them for most data types with B-tree opclasses. Since the BRIN code is generalized, other approaches are possible for things such as arrays, geometric types, ranges, etc; even for things such as enum types we could do something different than minmax with better results. In this commit I only include minmax. Catalog version bumped due to new builtin catalog entries. There's more that could be done here, but this is a good step forwards. Loosely based on ideas from Simon Riggs; code mostly by &Aacute;lvaro Herrera, with contribution by Heikki Linnakangas. Patch reviewed by: Amit Kapila, Heikki Linnakangas, Robert Haas. Testing help from Jeff Janes, Erik Rijkers, Emanuel Calvo. p.s.: The research leading to these results has received funding from the European Union's Seventh Framework Programme (FP7/2007-2013) under grant agreement n&deg; 318633. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7516f5259411c02ae89e49084452dc342aadb2ae">http://git.postgresql.org/pg/commitdiff/7516f5259411c02ae89e49084452dc342aadb2ae</a></li>

<li>Fix some coding issues in BRIN. Reported by David Rowley: variadic macros are a problem. Get rid of them using a trick suggested by Tom Lane: add extra parentheses where needed. In the future we might decide we don't need the calls at all and remove them, but it seems appropriate to keep them while this code is still new. Also from David Rowley: brininsert() was trying to use a variable before initializing it. Fix by moving the brin_form_tuple call (which initializes the variable) to within the locked section. Reported by Peter Eisentraut: can't use "new" as a struct member name, because C++ compilers will choke on it, as reported by cpluspluscheck. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b89ee54e20e722bb91f388667586a2e0986f197b">http://git.postgresql.org/pg/commitdiff/b89ee54e20e722bb91f388667586a2e0986f197b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Abhijit Menon-Sen sent in another revision of a patch to implement pg_audit.</li>

<li>Alexey Vasiliev sent in two revisions of a patch to add a recovery_timeout option to control the timeout of restore_command nonzero status code.</li>

<li>Rahila Syed sent in two more revisions of a patch to allow compressing full-page writes.</li>

<li>Andrew Dunstan sent in a patch to add a utility function to look up the cast function for a from/to pair of types.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the WAL format and APIs.</li>

<li>Ali Akbar sent in another revision of a patch to fix xpath() to return namespace definitions.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT ...</li>

<li>Adam Brightwell sent in another revision of a patch to replace some of the superuser() shortcuts with more specific role checks.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Robert Haas sent in a PoC patch to implement group locking.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to fsync PGDATA recursively in the case of crash recovery.</li>

<li>Fujii Masao sent in another revision of a patch to add a GIN GUC pending_list_cleanup_size.</li>

<li>Jim Nasby sent in a patch to retry failed attempts to obtain the cleanup lock on a buffer during VACUUM.</li>

<li>Etsuro Fujita sent in another revision of a patch to allow foreign tables to be part of table inheritance hierarchies.</li>

<li>Dimitri Fontaine sent in another revision of a patch to add event triggers for table rewrites.</li>

<li>Fujii Masao sent in another revision of a patch to add fsync feedback to pg_receivexlog --status-interval.</li>

<li>Michael Paquier sent in a patch to add a dedicated macro to grab a relation's persistence.</li>

<li>Ad sent in another revision of a patch to add jsonb generator functions.</li>

<li>Michael Paquier sent in another revision of a patch to move all quote-related functions into a single header quote.h.</li>

<li>Michael Banck sent in a patch to add a log_min_duration_transaction GUC.</li>

<li>Tom Lane sent in two revisions of a patch to fix an infelicity between index-only scans and row_to_json.</li>

<li>Magnus Hagander sent in a patch to re-order the views in the stats docs for clarity.</li>

</ul>