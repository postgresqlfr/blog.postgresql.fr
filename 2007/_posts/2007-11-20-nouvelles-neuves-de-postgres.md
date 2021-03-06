---
layout: post
title: "Nouvelles neuves de Postgres"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/415"
---


<p><strong>Nouvelles hebdomadaires de Postgres - 18 novembre 2007</strong></p>

<ul>

<li>19 décembre&nbsp;: ouverture de la chasse aux propositions pour les PGCon 2008. Faites chauffer vos stylos&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li><em>Continuent</em> a offert deux serveurs à l'association PostgreSQLFr et deux autres pour le futur regroupement européen. Dalibo, mécène de PostgreSQLFr depuis 2005, les hébergera gracieusement tous les quatre.</li>

<li>Le projet PostgreSQL a besoin de contacts régionaux&nbsp;! Venez partager l'exaltation et la gloire en nous aidant à porter la bonne nouvelle de la version 8.3 à la presse et aux communautés de votre région. Les besoins les plus pressants se situent en Inde, Afrique, Asie du Sud-Est, Mexique et les Îles du Pacifique. N'hésitez plus et contactez josh (a) postgresql . org .</li>

<li>La 8.3 Beta 3 sera là sous peu. Continuez à tester&nbsp;!</li>

</ul>

<!--more-->


<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Lightning Admin version 1.3.4 build 44 est sortie&nbsp;:

<a target="_blank" href="http://www.amsoftwaredesign.com/down_loads">http://www.amsoftwaredesign.com/down_loads</a></li>

<li>pgloader 2.2.3 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgloader/">http://pgfoundry.org/projects/pgloader/</a></li>

<li>Slony-I 1.2.12 est disponible&nbsp;:

<a target="_blank" href="http://slony.info/">http://slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en novembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Conférence de Josh Berkus au FOSS.IN. On vous attend pour un grand BoF&nbsp;!

<a target="_blank" href="http://www.foss.in/">http://www.foss.in/</a></li>

<li>Les PgCon.BR prendront place à Sao Paulo les 7 &amp; 8 décembre&nbsp;:

<a target="_blank" href="http://pgcon.postgresql.org.br/index.en.html">http://pgcon.postgresql.org.br/index.en.html</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/initdb/initdb.c, fix inconsistent message wording, and split off a couple of duplicated strings.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Fix tsvectorout() and tsqueryout() to escape backslesh, add test of that. Patch by Bruce Momjian. Backpatch is needed, but it's impossible to apply it directly.</li>

<li>Backpatch: Fix tsvector_out() and tsquery_out() to escape backslesh, add test of that. Patch by Bruce Momjian.</li>

</ul>

<p>Marc Fournier a commité&nbsp;:</p>

<ul>

<li>Update files for beta3</li>

<li>Remove pre-tag checks so that I can tag ...</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, make synopses of -t option consistent.</li>

<li>In pgsql/src/bin/pg_dump/pg_dumpall.c, make help synopsis consistent.</li>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, add to synopsis that timeout option also applies to stop mode.</li>

<li>Message improvements in pgsql/src/backend/libpq/auth.c and pgsql/src/backend/postmaster/postmaster.c</li>

<li>Update config.guess and config.sub.</li>

<li>Translation updates.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, when logging the recovery.conf parameters, show them quoted as they would appear in the configuration file.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Add note about deprecating krb5 authentication in favour of GSSAPI, per discussions (a long time ago). Documentation only, we keep full support in the code.</li>

<li>Make cvs tagging trigger a replication of the repository just as a commit does.</li>

<li>Clean out a bunch of files in CVSROOT that aren't used anymore (and haven't been used for years - in some cases possibly never).</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>I find that an out-of-the-box installation of OSSP uuid 1.6.0 installs itself as libuuid, not libossp-uuid which was the only case expected by our build support. Install a configure test to determine which name to use (and to check that the library is present at all).</li>

<li>Undo damage from yesterday's script "cleanup".</li>

<li>In pgsql/contrib/adminpack, fix insufficient search-path paranoia in SQL function definitions. Remove setting of search_path in install/uninstall scripts, since unlike other contrib modules this one does not want to let you change the installation schema.</li>

<li>In pgsql/contrib/sslinfo, fix more script breakage.</li>

<li>Fix a few contrib regression test scripts that hadn't gotten the word about best practice for including the module creation scripts: to wit that you should suppress NOTICE messages. This avoids creating regression failures by adding or removing comment lines in the module scripts.</li>

<li>Replace the now-incompatible-with-core contrib/tsearch2 module with a compatibility package. This supports importing dumps from past versions using tsearch2, and provides the old names and API for most functions that were changed. (rewrite(ARRAY[...]) is a glaring omission, though.) Pavel Stehule and Tom Lane</li>

<li>Re-add contrib/tsearch2 to the set of buildable contrib modules.</li>

<li>Update description of contrib/tsearch2.</li>

<li>Ooops, missed one file to remove: pgsql/contrib/tsearch2/tsearch.sql.in</li>

<li>Resurrect the code for the rewrite(ARRAY[...]) aggregate function, and put it into contrib/tsearch2 compatibility module.</li>

<li>contrib/tsearch2 need not be special-cased any longer.</li>

<li>Clean up some stray references to tsearch2.</li>

<li>Add some quick documentation for tsearch2 compatibility module.</li>

<li>Clean up some now-obsolete references to GBorg.</li>

<li>Move contrib docs to an appendix (next door to External Projects). Change title to Additional Supplied Modules. Improve discussion of how to build and install 'em.</li>

<li>Update discussion of tsearch2 migration. I'm not entirely sure about the division of material between here and the tsearch2 contrib page, but at least it's not obviously unfinished any more.</li>

<li>Add an Accept parameter to "simple" dictionaries. The default of true gives the old behavior; selecting false allows the dictionary to be used as a filter ahead of other dictionaries, because it will pass on rather than accept words that aren't in its stopword list. Jan Urbanski</li>

<li>In pgsql/src/backend/postmaster/bgwriter.c, fix incorrect calculation of elapsed_xlogs. Itagaki Takahiro</li>

<li>Add a rank/(rank+1) normalization option to ts_rank(). While the usefulness of this seems a bit marginal, if it's useful enough to be shown in the manual then we probably ought to support doing it without double evaluation of the ts_rank function. Per my proposal earlier today.</li>

<li>Adjust example to reduce confusion between a tsvector column and an index, per Simon Riggs.</li>

<li>Prevent re-use of a deleted relation's relfilenode until after the next checkpoint. This guards against an unlikely data-loss scenario in which we re-use the relfilenode, then crash, then replay the deletion and recreation of the file. Even then we'd be OK if all insertions into the new relation had been WAL-logged ... but that's not guaranteed given all the no-WAL-logging optimizations that have recently been added. Patch by Heikki Linnakangas, per a discussion last month.</li>

<li>Update timezone data files to release 2007i of the zic database.</li>

<li>In pgsql/src/backend/storage/smgr/md.c, use ftruncate() not truncate() in mdunlink. Seems Windows doesn't support the latter.</li>

<li>Add snb_ru_init(internal) to list of stub functions in tsearch2 compatibility module. Needed to support loading of 8.1-era tsearch2 configuration data.</li>

<li>In pgsql/src/backend/storage/smgr/md.c, fix stupid typo in recently-added code :-(</li>

<li>Add a couple of notes pointing out that GIN index build time is very sensitive to maintenance_work_mem (something I just learned the hard way).</li>

<li>Re-do configure with autoconf 2.59</li>

<li>In pgsql/doc/src/sgml/release.sgml, fix markup that doesn't work in HISTORY generation.</li>

<li>Repair still another bug in the btree page split WAL reduction patch: it failed for splits of non-leaf pages because in such pages the first data key on a page is suppressed, and so we can't just copy the first key from the right page to reconstitute the left page's high key. Problem found by Koichi Suzuki, patch by Heikki.</li>

<li>GIN index build's allocatedMemory counter needs to be long, not uint32. Else, in a 64-bit machine with maintenance_work_mem set to above 4Gb, the counter overflows and we never recognize having reached the maintenance_work_mem limit. I believe this explains out-of-memory failure recently reported by Sean Davis. This is a bug, so backpatch to 8.2.</li>

<li>Improve GIN index build's tracking of memory usage by using GetMemoryChunkSpace, not just the palloc request size. This brings the allocatedMemory counter close enough to reality (as measured by MemoryContextStats printouts) that I think we can get rid of the arbitrary factor-of-2 adjustment that was put into the code initially. Given the sensitivity of GIN build to work memory size, not using as much of work memory as we're allowed to seems a pretty bad idea.</li>

<li>Remove no-longer-accurate claim that REINDEX won't invalidate cached plans.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/high-availability.sgml, change replication chart title to "No waiting for multiple servers".</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, no master server overhead for middleware replication.</li>

<li>Adjust script to be consistent (thanks Tom for the fix).</li>

<li>Add CVS version labels to all install/uninstall scripts in contrib/.</li>

<li>In pgsql/contrib/ltree/expected/ltree.out, adjust expected file for new CVS version label.</li>

<li>In pgsql/config/install-sh, modify OS/X Darin test to actually work, (no $template)</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, add link to Postgres-R glossary from our documentation (has helpful terms defined).</li>

<li>In pgsql/config/install-sh, again properly fix Darwin strip.</li>

<li>Update release notes to current CVS.</li>

<li>In FAQ, remove reference to gborg, instead reference pgfoundry.</li>

<li>In FAQ_DEV, refer to pgfoundry instead of gborg.</li>

<li>FAQ markup cleanup.</li>

<li>In pgsql/doc/src/sgml/release.sgml, properly capitalize "Migrate To Version"; seems we always had that wrong.</li>

<li>Capitalize "Migration to Version".</li>

<li>In pgsql/doc/src/sgml/release.sgml, mention that GSSAPI is preferred over Kerberos authentication because GSSAPI is industry-standard.</li>

<li>Document that /contrib/tsearch2 now contains a compatibility interface.</li>

<li>Add more detail for non-TEXT cast release item.</li>

<li>pgindent run for 8.3.</li>

<li>Add blank lines to pgindent.</li>

<li>Update pgindent with current typedefs.</li>

<li>Update pgtools README to be clearer about typdefs.</li>

<li>Update README to suggest 'gmake distclean'. Add library typedefs.</li>

<li>In pgsql/src/tools/pgindent/README, beef up README instructions, again.</li>

<li>Re-run pgindent with updated list of typedefs. (Updated README should avoid this problem in the future.)</li>

<li>Fix pgindent to properly handle 'else' and single-line comments on the same line; previous fix was only partial. Re-run pgindent on files that need it.</li>

<li>Modify LOOPBYTE/LOOPBIT macros to be more logical; rather than have the for() body passed as a parameter, make the macros act as simple headers to code blocks. This allows pgindent to be run on these files.</li>

<li>Cleanup for new else/comment handling.</li>

<li>Run pgindent on remaining files now that LOOPBYTE is a usable macro.</li>

<li>Better guard token used by pgindent.</li>

<li>Small comment spacing improvement.</li>

<li>Add FAQ items about "Postgres" alias usage, remove old reference.</li>

<li>Simplify wording in FAQ.</li>

<li>In pgsql/doc/src/sgml/release.sgml, add release note that "Postgres" is now documented as an acceptable alias.</li>

<li>Fix a few mentions of "Postgres" that slipped into the release notes.</li>

<li>In pgsql/doc/src/sgml/release.sgml, simplify TEXT cast working; spelling fixes to release notes.</li>

<li>Wordsmith improvements to first half of release notes, move TEXT cast item to #1 incompatibility slot.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Greg Sabino Mullane's patch to change the default_statistics_target setting from 10 to 100, pending testing.</li>

<li>Peter Eisentraut's patch to make psql -f complain if the -f is actually a directory. "Too far from the scene of the crime."</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in a patch which adds Postgres dialects for Hibernate.</li>

<li>Simon Riggs sent in a patch which clarifies the name of the column used in the text search index example so everybody is clear it is a column name.</li>

<li>Zdenek Kotala sent in two more versions of his patch to remove pg_dump's dependency on postgres.h.</li>

<li>Zoltan Boszormenyi sent in a patch to fix a misbehavior where loading the output of pg_dump -n does not put the schema back in place.</li>

<li>Tom Lane sent in a patch to fix ANALYZE's over-counting dead rows.</li>

</ul>