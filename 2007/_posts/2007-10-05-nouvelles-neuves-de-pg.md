---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/223"
---


<p><strong>Nouvelles hebdomadaires de Postgres - 30 Septembre 2007</strong></p>

<p>Restez branchés&nbsp;! Sortie de la bêta 1 de Postgres 8.3 cette semaine&nbsp;!</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Le système de réplication multi-maîtres asynchrone Bucardo 3.0.6 est sorti&nbsp;:

<a target="_blank" href="http://bucardo.org/">http://bucardo.org/</a></li>

<li>PostgreSQL Maestro 7.9 est sorti&nbsp;:

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></li>

<li>Pg::Snapshot et Materialized Views sont disponibles en version 0.3.0a&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/snapshot/">http://pgfoundry.org/projects/snapshot/</a></li>

<li>PgPool-II 1.2.1 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en septembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-09/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>La PostgreSQL Conference Fall 2007 aura lieu le 20 octobre à l'Université d'État de Portland (Oregon, USA)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Simon Riggs donnera une conférence sur les bases de données et le Web, le 16 octobre à Londres&nbsp;:

<a target="_blank" href="http://www.ukuug.org/events/seminars/databases/booking/">http://www.ukuug.org/events/seminars/databases/booking/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet Postgres:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée religieusement par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><em>(Pour plus d'informations sur le récent changement de nom PostgreSQL / Postgres, vous pouvez consulter les derniers ajouts de la <a href="http://www.postgresql.org/docs/faqs.FAQ.html#item1.1">FAQ</a> (cf correctifs de cette semaine) ou survoler la <a href="http://archives.postgresql.org/pgsql-advocacy/2007-08/threads.php#00377">mailing-list pgsql-advocacy</a>)</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Renommage de "PostgreSQL" en "Postgres" à 3 emplacements dans FAQ_DEV.</li>

<li>Renommage de "PostgreSQL" en "Postgres" à 7 emplacements dans la FAQ.</li>

<li>In the release checklist, mention packagers will see the minor upgrade numbering for additional functions.</li>

<li>In pgsql/src/pl/tcl/pltcl.c, update TCL comment to read, "We can only fix this with Tcl &gt;= 8.4, when Tcl_SetNotifier()."</li>

<li>Remove from TODO: "SQL*Net listener that makes PostgreSQL appear as an Oracle database to clients"</li>

<li>Add to TODO: "Implement Boyer-Moore searching in strpos()"</li>

<li>Document that libpq's PQntuples() might overflow.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, add chklocale.c to pgport files for msvc builds, per buildfarm failures.</li>

<li>Properly pass -c parameter to ecpg when building regression tests. Per Michael.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Applied another patch by ITAGAKI Takahiro to get memory allocation thread-safe. He also did some cleaning up.</li>

<li>Applied patch by ITAGAKI Takahiro to get prepare thread-safe in ecpg.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Fix crash of to_tsvector() function on huge input: compareWORD() function didn't return the correct result for word position greater than limit. Per report from Stuart Bishop.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Small string tweaks.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Adjust the new memory limit in the lazy vacuum code to use MaxHeapTuplesPerPage tuples per page instead of fixed 200, to better cope with systems that use a different block size.</li>

<li>Avoid having autovacuum read pgstats data too many times in quick succession. This is problematic for the autovac launcher when there are many databases, so we keep data for a full second before reading it again.</li>

<li>Reduce the size of memory allocations by lazy vacuum when processing a small table, by allocating just enough for a hardcoded number of dead tuples per page. The current estimate is 200 dead tuples per page. Per reports from Jeff Amiel, Erik Jones and Marko Kreen, and subsequent discussion.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Add an extra header byte to TOAST-pointer datums to represent their size explicitly. This means a TOAST pointer takes 18 bytes instead of 17 --- still smaller than in 8.2 --- which seems a good tradeoff to ensure we won't have painted ourselves into a corner if we want to support multiple types of TOAST pointer later on. Per discussion with Greg Stark.</li>

<li>In hopes of un-breaking the buildfarm, add missing file pgsql/src/interfaces/ecpg/test/thread/alloc.pgc from ITAGAKI Takahiro's patch.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, adjust recovery PS display as agreed with Simon: 'waiting for XXX' while the restore_command does its thing, then 'recovering XXX' while processing the segment file. These operations are heavyweight enough that an extra PS display set shouldn't bother anyone.</li>

<li>In pgsql/contrib/isn/isn.sql.in, properly mark mergeable/hashable equality operators (found by opr_sanity testing). Combine the formerly independent opclasses for the various ISN types into opfamilies. The latter causes some extra bleating from opr_sanity, since the module doesn't provide complete sets of cross-type operators, but it's still a good idea because it will give the planner more information to work with. The missing cross-type operators no longer pose a risk of unexpected planner errors in 8.3, so there's no need to insist on filling them in (and I gather it wouldn't be very sound semantically to add them all).</li>

<li>In pgsql/contrib/seg/seg.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/pg_trgm/pg_trgm.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/ltree/ltree.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/intarray/_int.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/hstore/hstore.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/cube/cube.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/contrib/chkpass, remove bogus commutator marking --- the module doesn't actually supply any commutator operator for =(chkpass,text), so this was creating a shell operator that would fail on use. Found by opr_sanity testing.</li>

<li>In pgsql/contrib/btree_gist/btree_gist.sql.in, support functions for index opclasses should be immutable. Found by running opr_sanity on contrib modules.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, make recovery show the current input WAL segment name in the startup process' PS display. After a suggestion by Simon (not exactly his patch though).</li>

<li>Disallow CLUSTER using an invalid index (that is, one left over from a failed CREATE INDEX CONCURRENTLY). Such an index might not have entries for every heap row and thus clustering with it would result in silent data loss. The scenario requires a pretty foolish DBA, but still ...</li>

<li>Improve consistency of the error messages generated when you try to use ALTER TABLE on a composite type or ALTER TYPE on a table's rowtype. We already rejected these cases, but the error messages were a bit random and didn't always provide a HINT to use the other command type.</li>

<li>Defend against openssl libraries that fail on keys longer than 128 bits; which is the case at least on some Solaris versions. Marko Kreen</li>

<li>Defend against openssl libraries that fail on keys longer than 128 bits; which is the case at least on some Solaris versions. Marko Kreen. Back-patched to 8.2.</li>

<li>Make archive recovery always start a new timeline, rather than only when a recovery stop time was used. This avoids a corner-case risk of trying to overwrite an existing archived copy of the last WAL segment, and seems simpler and cleaner all around than the original definition. Per example from Jon Colverson and subsequent analysis by Simon. Back-patched to 8.0</li>

<li>Make use of additional chklocale.c entries to reject locales that we cannot support.</li>

<li>Teach chklocale.c about a few names for frontend-only encodings, since this will allow initdb to reject attempts to initdb in a locale that uses such an encoding. We'll probably find out more such names during beta ...</li>

<li>In pgsql/src/port/chklocale.c on OS X, assume that an empty-string result for nl_langinfo(CODESET) means UTF-8. Per examination of /usr/share/locale in 10.4.10.</li>

<li>Change initdb and CREATE DATABASE to actively reject attempts to create databases with encodings that are incompatible with the server's LC_CTYPE locale, when we can determine that (which we can on most modern platforms, I believe). C/POSIX locale is compatible with all encodings, of course, so there is still some usefulness to CREATE DATABASE's ENCODING option, but this will insulate us against all sorts of recurring complaints caused by mismatched settings. I moved initdb's existing LC_CTYPE-to-encoding mapping knowledge into a new src/port/ file so it could be shared by CREATE DATABASE.</li>

<li>Tweak initdb's text search configuration selection code so it can cope with LANG settings like 'es_ES@euro'.</li>

<li>Fix typos in two comments. Spotted by Brendan Jurd</li>

<li>Tweak pgbench.c to remove the hidden assumption that a WIN32 machine couldn't possibly HAVE_GETOPT. I believe this is the most appropriate form of the patch submitted 2007-08-07 by Hiroshi Saito, though not having a Windows build environment I won't know for sure till I see the buildfarm results.</li>

<li>Define the FRONTEND symbol in postgres_fe.h, which allows us to eliminate duplicative -DFRONTEND flags from many Makefiles. We still need Makefile control of the symbol in a few places that compile frontend-or-backend src/port/ files, but it's a lot cleaner than before. Hiroshi Saito</li>

<li>Add virtual transaction IDs to CSVLOG output, so that messages coming from the same transaction can be identified even when no regular XID was assigned. This seems essential after addition of the lazy-XID patch. Also some minor code cleanup in write_csvlog().</li>

<li>Fix Assert failure in ExpandColumnRefStar --- what I thought was a can't happen condition can happen given incorrect input. The real problem is that gram.y should try harder to distinguish * from "*" --- the latter is a legal column name per spec, and someday we ought to treat it that way. However fixing that is too invasive for a back-patch, and it's too late for the 8.3 cycle too. So just reduce the Assert to a plain elog for now. Per report from NikhilS.</li>

<li>Some small tuptoaster improvements from Greg Stark. Avoid unnecessary decompression of an already-compressed external value when we have to copy it; save a few cycles when a value is too short for compression; and annotate various lines that are currently unreachable.</li>

<li>Minor improvements in backup and recovery.</li>

<li>Create a function variable "join_search_hook" to let plugins override the join search order portion of the planner; this is specifically intended to simplify developing a replacement for GEQO planning. Patch by Julius Stroffek, editorialized on by me. I renamed make_one_rel_by_joins to standard_join_search and make_rels_by_joins to join_search_one_level to better reflect their place within this scheme.</li>

<li>In the integer-datetimes case, date2timestamp and date2timestamptz need to check for overflow because the legal range of type date is actually wider than timestamp's. Problem found by Neil Conway.</li>

<li>Use SYSV semaphores rather than POSIX on Darwin &gt;= 6.0 (i.e., OS X 10.2 and up), per Chris Marcellino. This avoids consuming O(N^2) file descriptors to support N backends. Tests suggest it's about a wash for small installations, but large ones would have a problem.</li>

<li>Change on-disk representation of NUMERIC datatype so that the sign_dscale word comes before the weight instead of after. This will allow future binary-compatible extension of the representation to support compact formats, as discussed on pgsql-hackers around 2007/06/18. The reason to do it now is that we've already pretty well broken any chance of simple in-place upgrade from 8.2 to 8.3, but it's possible that 8.3 to 8.4 (or whenever we get around to squeezing NUMERIC) could otherwise be data-compatible.</li>

<li>Dept. of second thoughts: fix loop in BgBufferSync so that the exit when bgwriter_lru_maxpages is exceeded leaves the loop variables in the expected state. In the original coding, we'd fail to advance next_to_clean, causing that buffer to be probably-uselessly rechecked next time, and also have an off-by-one idea of the number of buffers scanned.</li>

<li>Just-in-time background writing strategy. This code avoids re-scanning buffers that cannot possibly need to be cleaned, and estimates how many buffers it should try to clean based on moving averages of recent allocation requests and density of reusable buffers. The patch also adds a couple more columns to pg_stat_bgwriter to help measure the effectiveness of the bgwriter. Greg Smith, building on his own work and ideas from several other people, in particular a much older patch from Itagaki Takahiro.</li>

<li>Simplify and rename some GUC variables, per various recent discussions.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Exclude contrib/tsearch2 from regression tests.</li>

<li>Turn build and vcregress .bat files into pure one line wrappers for the perl scripts. Remove the now superfluous getregress.pl.</li>

<li>Use proper search for contrib makefiles in vcregress.pl</li>

<li>Fix typo in vcregress.pl</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, add comments re text &lt;-&gt; bytea internal equivalence in convert routines.</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, use correct PG_GETARG macro in pg_convert.</li>

<li>Remove "convert 'blah' using conversion_name" facility, because if it produces text it is an encoding hole and if not it's incompatible with the spec, whatever the spec means (which we're not sure about anyway).</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Petr (PJMODOS) Jelinek's patch which chklocale.c to pgportfiles in Mkvcbuild the perl module. Magnus Hagander had already applied a similar one.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Petr (PJMODOS) Jelinek sent in two versions of a patch which implments ALTER TYPE RENAME.</li>

<li>Hannes Eder sent in a patch to add __FUNCTION__ support for MS VC7.</li>

<li>Dave Page sent in three versions of a patch which adds BIO OpenSSL where needed.</li>

<li>ITAGAKI Takahiro sent in two patches to clean up ecpg.</li>

<li>Jaime Casanova sent in a patch which merges relation_open_nowait with relation_open.</li>

<li>Tom Lane sent a patch to undo the removal of dead-space tracking.</li>

<li>Pavel Stehule sent in another version of his PL/PSM patch.</li>

<li>Andrew Dunstan sent in a patch which implements a one-value pattern cache for the multi-byte encoding case for ILIKE.</li>

<li>Brendan Jurd sent in a patch which adds a quote_qualified_identifier along with regression tests.</li>

<li>Tom Raney sent in a patch to speed up creation of hash indexes.</li>

</ul>