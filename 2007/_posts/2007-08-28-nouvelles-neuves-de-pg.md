---
layout: post
title: "Nouvelles neuves de PG"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/411"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 26 Août 2007</strong></p>

<p>Les travaux continuent sur la future version 8.3 incluant nativement la recherche de texte TSearch2.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Entityspaces pour PostgreSQL est disponible&nbsp;:

<a target="_blank" href="http://www.entityspaces.net/blog/2007/08/22/EntitySpacesNowHasPostgreSQLSupport.aspx">http://www.entityspaces.net/blog/2007/08/22/EntitySpacesNowHasPostgreSQLSupport.aspx</a></li>

<li>AM Software Design a ouvert un forum pour la communauté PostgreSQL&nbsp;:

<a target="_blank" href="http://www.amsoftwaredesign.com/smf/index.php">http://www.amsoftwaredesign.com/smf/index.php</a></li>

<li>pgloader 2.2.1 est disponible&nbsp;:

<a target="_blank" href="http://pgloader.projects.postgresql.org/">http://pgloader.projects.postgresql.org/</a></li>

</ul>

<!--break-->

<p><strong>Offres d'emplois autour de PostgreSQL en août</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>Aucun événement local cette semaine.</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org et en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Migration de Tsearch2 vers le coeur. Le gros de ce travail a été effectué par Oleg Bartunov et Teodor Sigaev, mais j'ai pas mal retouché donc si quelque chose va de travers, c'est probablement de mon fait. La documentation est pour le moment inexistante, mais la mise en place du patch permettra de lancer les tests de portabilité.</li>

<li>Fix a couple of misbehaviors rooted in the fact that the default creation namespace isn't necessarily first in the search path (there could be implicit schemas ahead of it).</li>

<li>Remove the 'not in' operator (!!=). This was a hangover from Berkeley days that was obsolete the moment we had IN (SELECT ...) capability. It's arguably a security hole since it applied no permissions check to the table it searched, and since it was never documented anywhere, removing it seems more appropriate than fixing it.</li>

<li>Require SELECT privilege on a table to do dblink_get_pkey(). This is not all that exciting when the system catalogs are readable by all, but some people try to lock them down, and would not like this sort of end run ...</li>

<li>Restrict pg_relation_size to relation owner, pg_database_size to DB owner, and pg_tablespace_size to superusers. Perhaps we could weaken the first case to just require SELECT privilege, but that doesn't work for the other cases, so use ownership as the common concept.</li>

<li>Make currtid() functions require SELECT privileges on the target table. While it's not clear that TID linkage info is of any great use to a nefarious user, it's certainly unexpected that these functions wouldn't insist on read privileges.</li>

<li>Restrict pgrowlocks function to superusers. (This might be too strict, but no permissions check at all is certainly no good.) Clean up usage of some deprecated APIs.</li>

<li>Restrict pgstattuple functions to superusers. (This might be too strict, but no permissions check at all is certainly no good.) Clean up usage of some deprecated APIs.</li>

<li>In pgsql/contrib/hstore, clean up usage of some deprecated APIs, particularly schema-unsafe usage of RelationNameGetTupleDesc()</li>

<li>Code review for btreefuncs additions: restrict to superusers to avoid exposing user data to others, and clean up usage of deprecated APIs.</li>

<li>Make ARRAY(SELECT ...) return an empty array, rather than a NULL, when the sub-select returns zero rows. Per complaint from Jens Schicke. Since this is more in the nature of a definition change than a bug, not back-patched.</li>

<li>Adjust with-system-tzdata patch to not attempt to install a symlink, but just hardwire the specified timezone database path into the executable. Per discussion, this avoids some packaging disadvantages of using a symlink.</li>

<li>Fix brain fade in DefineIndex(): it was continuing to access the table's relcache entry after having heap_close'd it. This could lead to misbehavior if a relcache flush wiped out the cache entry meanwhile. In 8.2 there is a very real risk of CREATE INDEX CONCURRENTLY using the wrong relid for locking and waiting purposes. I think the bug is only cosmetic in 8.0 and 8.1, because their transgression is limited to using RelationGetRelationName(rel) in an ereport message immediately after heap_close, and there's no way (except with special debugging options) for a cache flush to occur in that interval. Not quite sure that it's cosmetic in 7.4, but seems best to patch anyway. Found by trying to run the regression tests with CLOBBER_CACHE_ALWAYS enabled. Maybe we should try to do that on a regular basis --- it's awfully slow, but perhaps some fast buildfarm machine could do it once in awhile.</li>

<li>Simplify implementation of ts_debug() function --- use a join instead of redundant sub-selects. initdb not forced, since this is just a cosmetic change, but the new code won't show up till you do one.</li>

<li>Some more tsearch docs work --- sync names with CVS-tip reality, some minor rewording, some markup fixups. Lots left to do here ...</li>

<li>Fix synonym-dict breakage introduced in last patch :-(. Minor other cleanups.</li>

<li>Rename built-in Snowball stemmer dictionaries to be english_stem, russian_stem, etc. Per discussion.</li>

<li>Heikki Linnakangas' patch to clean up some problems in the tsearch patch.</li>

<li>Fix combo_decrypt() to throw an error for zero-length input when using a padded encryption scheme. Formerly it would try to access res[(unsigned) -1], which resulted in core dumps on 64-bit machines, and was certainly trouble waiting to happen on 32-bit machines (though in at least the known case it was harmless because that byte would be overwritten after return). Per report from Ken Colson; fix by Marko Kreen.</li>

<li>Fix possible core dump from pgbench -d option. Julius Stroffek</li>

<li>Suppress testing the options of CREATE TEXT SEARCH DICTIONARY during initdb. We should create all the standard dictionaries even though some of them may not work in template1's encoding. Per Teodor.</li>

<li>Propagate Magnus' fix for Windows snowball build into Makefile.cygwin.</li>

<li>In pgsql/doc/src/sgml/ref/alter_tsconfig.sgml, fix cut-n-paste-o.</li>

<li>Fix VPATH-build problem in new tsearch makefile, per Chad Wagner.</li>

<li>Remove option to change parser of an existing text search configuration. This prevents needing to do complex and poorly-defined updates of the mapping table if the new parser has different token types than the old. Per discussion.</li>

<li>Text search doc updates --- first cut at syncing the existing docs with the final syntax decisions.</li>

<li>In pgsql/src/backend/tsearch/dict_synonym.c, missed updating dsynonym_init for new dictionary parameter method.</li>

<li>In pgsql/src/bin/psql/describe.c, make \dFt and \dFt+ do something different --- omitting the function names in the former case seems more consistent with the behavior of other \dF commands.</li>

<li>Simplify the syntax of CREATE/ALTER TEXT SEARCH DICTIONARY by treating the init options of the template as top-level options in the syntax. This also makes ALTER a bit easier to use, since options can be replaced individually. I also made these statements verify that the tmplinit method will accept the new settings before they get stored; in the original coding you didn't find out about mistakes until the dictionary got invoked. Under the hood, init methods now get options as a List of DefElem instead of a raw text string --- that lets tsearch use existing options-pushing code instead of duplicating functionality.</li>

<li>Simplify CREATE TEXT SEARCH CONFIGURATION by eliminating the separate 'with map' parameter; as things now stand there's really not much point in specifying a config-to-copy if you don't copy its map. Also, use COPY instead of TEMPLATE as the key word for a config-to-copy, so as to avoid confusion with text search templates. Per discussion; the just-committed reference page for the command already describes it this way.</li>

<li>First rough cut at text search documentation: bare bones reference pages for the new SQL commands. I also committed Bruce's text search introductory chapter, as-is except for fixing some markup errors, so that there would be a place for the reference pages to link to.</li>

<li>Exclude snowball/libstemmer/ files from the set processed by pgindent. There's not much point in prettifying machine-generated code, and it seems best to keep these files exactly like upstream anyway. Also add some notes about why various files are excluded.</li>

<li>In pgsql/src/backend/parser, avoid using TEXT as a Bison symbol, since this provokes warnings on Windows builds. In passing, fix an obsolete comment, per gripe from Greg Stark.</li>

<li>In pgsql/src/backend/utils/adt/tsgistidx.c, remove extraneous semicolon --- buildfarm member bear, for one, objects to it.</li>

<li>Fix cash_mul_int4 and cash_div_int4 for overenthusiastic substitution of int64 for int32. Per reports from Merlin Moncure and Andrew Chernow.</li>

<li>Fix money type's send/receive functions to conform to recent widening of the datatype to int64. Per Andrew Chernow.</li>

<li>In pgsql/src/backend/utils/adt/varbit.c, fix potential access-off-the-end-of-memory in varbit_out(): it fetched the byte after the last full byte of the bit array, regardless of whether that byte was part of the valid data or not. Found by buildfarm testing. Thanks to Stefan Kaltenbrunner for nailing down the cause.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, fix a small 64-bit problem in tsearch patch. Suppress uninitialized-variable warning.</li>

</ul>

<p>Tatsuo Ishii a commité&nbsp;:</p>

<ul>

<li>The upper limit for -c option of pgbench is now obtained from (FD_SETSIZE - 10) rather than a hardwired number.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Reduce memory requirements for writing CSVlogs, so it will work with about the same amount of memory in ErrorContext as standard logs.</li>

<li>Unbreak ECPG tests for VPATH builds.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg, cleaned up some more and removed some duplicates.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Fix typo in FAQ_DEV.</li>

<li>Add book to FAQ_DEV: "Transactional Information Systems by Gerhard Weikum, Kaufmann"</li>

<li>Uppercase keywords in regression tsearch test scripts.</li>

<li>Remove tabs from pgsql/doc/src/sgml/config.sgml.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Build snowball DLL for tsearch-in-core. (Still needs to build the .sql output files, but this handles the C part of the build)</li>

<li>In pgsql/src/makefiles/Makefile.win32, don't define BUILDING_DLL for snowball lib. Should fix build problems on mingw and probably cygwin.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Add configure option --with-system-tzdata to use operating system time zone database.</li>

</ul>

<p><strong>Correctifs rejetés</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavan Deolasee sent in version 14 of the HOT patch, now with support for partial and expressional indexes.</li>

<li>Merlin Moncure sent in a third version of his PGparam extension for libpq.</li>

<li>Andrew Chernow sent in version 0.4 of PGparam extension to libpq.</li>

<li>Julius Stroffek sent in another version of his optimizer hook patch.</li>

<li>Stefan Kaltenbrunner sent in a patch to clean up some of the tab completion code in psql and add tsearch2 support to it.</li>

</ul>