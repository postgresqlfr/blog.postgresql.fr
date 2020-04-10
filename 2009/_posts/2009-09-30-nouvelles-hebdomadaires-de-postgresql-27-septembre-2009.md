---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 septembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-09-30-nouvelles-hebdomadaires-de-postgresql-27-septembre-2009 "
---



<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-09/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>[ndt] Guillaume Lelarge fera une conf&eacute;rence sur les solutions de r&eacute;plication avec PostgreSQL le 16 octobre lors des JDLL 2009 au CPE de Lyon (Villeurbanne)&nbsp;: 

<a target="_blank" href="http://jdll.org/edition-2009">http://jdll.org/edition-2009</a></li>

<li>Une suite de conf&eacute;rences est organis&eacute;e &agrave; Seattle (&Eacute;tat de Washington, &Eacute;tats-Unis) du 16 au 18 octobre 2009&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009. Les inscriptions sont ouvertes&nbsp;! 

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/">http://pgcon.postgresql.org.br/2009/</a></li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>L'OpenSQL Camp de Portland est &agrave; la recherche de sponsors. Pensez &agrave; votre voyage d&egrave;s maintenant&nbsp;!&nbsp;:) 

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement &agrave; l'occasion du 10<sup>&egrave;me</sup> anniversaire du JPUG est programm&eacute; pour les 20 &amp; 21 novembre 2009 &agrave; Tokyo, Japon&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

<li>Le "Chemnitzer Linuxtage" aura lieu &agrave; Chemnitz (All.) les 13 &amp; 14 mars 2010&nbsp;: 

<a target="_blank" href="http://chemnitzer.linux-tage.de/">http://chemnitzer.linux-tage.de/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Define a new, more extensible syntax for COPY options. This is intentionally similar to the recently revised syntax for EXPLAIN options, ie, (name value, ...). The old syntax is still supported for backwards compatibility, but we intend that any options added in future will be provided only in the new syntax. Robert Haas, Emmanuel Cecchet.</li>

<li>Fix crash if a DROP is attempted on an internally-dependent object. Introduced in 8.4 rewrite of dependency.c. Per bug #5072 from Amit Khandekar.</li>

<li>Implement the DO statement to support execution of PL code without having to create a function for it. Procedural languages now have an additional entry point, namely a function to execute an inline code block. This seemed a better design than trying to hide the transient-ness of the code from the PL. As of this patch, only plpgsql has an inline handler, but probably people will soon write handlers for the other standard PLs. In passing, remove the long-dead LANCOMPILER option of CREATE LANGUAGE. Petr Jelinek.</li>

<li>In pgsql/doc/src/sgml/ref/do.sgml, improve example for DO, per Petr Jelinek.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, fix RelationCacheInitializePhase2 (Phase3, in HEAD) to cope with the possibility of shared-inval messages causing a relcache flush while it tries to fill in missing data in preloaded relcache entries. There are actually two distinct failure modes here: 1. The flush could delete the next-to-be-processed cache entry, causing the subsequent hash_seq_search calls to go off into the weeds. This is the problem reported by Michael Brown, and I believe it also accounts for bug #5074. The simplest fix is to restart the hashtable scan after we've read any new data from the catalogs. It appears that pre-8.4 branches have not suffered from this failure, because by chance there were no other catalogs sharing the same hash chains with the catalogs that RelationCacheInitializePhase2 had work to do for. However that's obviously pretty fragile, and it seems possible that derivative versions with additional system catalogs might be vulnerable, so I'm back-patching this part of the fix anyway. 2. The flush could delete the *current* cache entry, in which case the pointer to the newly-loaded data would end up being stored into an already-deleted Relation struct. As long as it was still deleted, the only consequence would be some leaked space in CacheMemoryContext. But it seems possible that the Relation struct could already have been recycled, in which case this represents a hard-to-reproduce clobber of cached data structures, with unforeseeable consequences. The fix here is to pin the entry while we work on it. In passing, also change RelationCacheInitializePhase2 to Assert that formrdesc() set up the relation's cached TupleDesc (rd_att) with the correct type OID and hasoids values. This is more appropriate than silently updating the values, because the original tupdesc might already have been copied into the catcache. However this part of the patch is not in HEAD because it fails due to some questionable recent changes in formrdesc :-( . That will be cleaned up in a subsequent patch.</li>

<li>Extend the BKI infrastructure to allow system catalogs to be given hand-assigned rowtype OIDs, even when they are not "bootstrapped" catalogs that have handmade type rows in pg_type.h. Give pg_database such an OID. Restore the availability of C macros for the rowtype OIDs of the bootstrapped catalogs. (These macros are now in the individual catalogs' .h files, though, not in pg_type.h.) This commit doesn't do anything especially useful by itself, but it's necessary infrastructure for reverting some ill-considered changes in relcache.c.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, revert my ill-considered change that made formrdesc not insert the correct relation rowtype OID into the relcache entries it builds. This ensures that catcache copies of the relation tupdescs will be fully correct. While the deficiency doesn't seem to have any effect in the current sources, we have been bitten by not-quite-right catcache tupdescs before, so it seems like a good idea to maintain the rule that they should be right.</li>

<li>In pgsql/src/backend/catalog/genbki.sh, hmm, seems a lot of the buildfarm is running versions of awk that don't have gensub(). Use sub() instead, tedious though it be.</li>

<li>Simplify the bootstrap (BKI) code by getting rid of a useless table of all the strings seen during the bootstrap run. There might have been some actual point to doing that, many years ago, but as far as I can see the only value now is to conserve a bit of memory. Even if we cared about wasting a megabyte or so during the initdb run, it'd be far more effective to arrange to release memory at the end of each BKI command, instead of intentionally hanging onto strings that might never be used again. Not maintaining the table probably makes it faster too; but the main point of this patch is to get rid of a couple hundred lines of unnecessary and rather crufty code.</li>

<li>In pgsql/src/tools/msvc/Genbki.pm, ooops, fix to Genbki.pm for ROWTYPE_OID wasn't quite right. Also, make a few spacing tweaks so it produces exactly the same output as genbki.sh.</li>

<li>Sync psql's scanner with recent changes in backend scanner's flex rules. Marko Kreen, Tom Lane.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, make libpq reject non-numeric and out-of-range port numbers with a suitable error message, rather than blundering on and failing with something opaque. Sam Mason.</li>

<li>Replace the array-style TupleTable data structure with a simple List of TupleTableSlot nodes. This eliminates the need to count in advance how many Slots will be needed, which seems more than worth the small increase in the amount of palloc traffic during executor startup. The ExecCountSlots infrastructure is now all dead code, but I'll remove it in a separate commit for clarity. Per a comment from Robert Haas.</li>

<li>Remove no-longer-needed ExecCountSlots infrastructure.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/fsync/test_fsync.c, fsync test files. Prevent creation of 16GB files during fsync testing; only create 16MB files; backpatch to 8.4.X.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Surrogate pair support for U&amp; string and identifier syntax. This is mainly to make the functionality consistent with the proposed \u escape syntax.</li>

<li>Unicode escapes in E'...' strings. Marko Kreen.</li>

<li>In pgsql/src/backend/parser/scan.l, remove backup states from Unicode escapes patch.</li>

<li>In pgsql/src/backend/parser/scan.l, prevent isolated second surrogate in U&amp; syntax.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Jeff Davis's operator exclusion constraints patch. Lots of progress, useful new feature, and will re-submit for the next commitfest.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in a reviewed version of the streaming replication patch.</li>

<li>Heikki Linnakangas sent in a patch atop the Hot Standby patch.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of the GRANT ON ALL IN patch.</li>

<li>Andrew Dunstan sent in a patch to add \ev (edit view) to psql.</li>

<li>Stef Walter sent in two more revisions of the samehost/sameuser patch for pg_hba.conf.</li>

<li>Petr (PJMODOS) Jelinek sent in four more revisions of the DefaultACLs patch.</li>

<li>Michael Paquier sent in another revision of the patch to add shell commands to pgbench.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of the hstore patch.</li>

<li>Roger Leigh sent in another revision of the UTF-8 pretty-print option for psql.</li>

<li>David Wheeler sent in a doc patch to go with Andrew (RhodiumToad) Gierth's hstore patch.</li>

<li>Sam Mason sent in a patch to clean up libpq's port number handling.</li>

<li>Joachim Wieland sent in a patch to fix some performance issues in the information schema.</li>

<li>KaiGai Kohei sent in another revision of the large object ACL patch.</li>

<li>Emmanuel Cecchet sent in another revision of the COPY enhancements patch.</li>

<li>KaiGai Kohei sent in another revision of the ACL rework patch.</li>

<li>Pierre Frederic Caillaud sent in another revision of the bulk inserts patch.</li>

<li>Alvaro Herrera sent in another revision of the patch to allow per-database, per-role GUC settings.</li>

<li>Simon Riggs set up a git repository for Hot Standby, with the eponymous hot_standby branch, at 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=users/simon/postgres.git;a=summary">http://git.postgresql.org/gitweb?p=users/simon/postgres.git;a=summary</a></li>

<li>Brendan Jurd sent in a patch atop ITAGAKI Takahiro's CREATE TABLE LIKE...INCLUDING patch.</li>

<li>Marko Kreen sent in a patch to fix up Unicode escape treatment in psql.</li>

<li>Jim Cox sent in a patch to allow pg_dump to note its version and that of the server it dumps in comments.</li>

<li>Heikki Linnakangas sent in two updated patches for Hot Standby.</li>

<li>ITAGAKI Takahiro sent in another revision of the CREATE TABLE LIKE expansion patch including Brendan Jurd's additions above.</li>

</ul>