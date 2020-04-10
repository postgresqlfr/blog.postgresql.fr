---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 août 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-08-30-nouvelles-hebdomadaires-de-postgresql-29-aout-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Make an editorial pass over the 9.0 release notes. This is mostly about grammar, style, and presentation, though I did find a few small factual errors.</li>

<li>In pgsql/contrib/pg_archivecleanup/pg_archivecleanup.c, make pg_archivecleanup log messages more consistent. Erik Rijkers</li>

<li>Marginal code cleanup for streaming replication. There is no reason that proc.c should have to get involved in this dirty hack for letting the postmaster know which children are walsenders. Revert that file to the way it was, and confine the kluge to pmsignal.c and postmaster.c.</li>

<li>In pgsql/src/backend/commands/explain.c, make EXPLAIN show the function call expression of a FunctionScan plan node, but only in VERBOSE mode. Per discussion.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, further editing of release notes.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update 9.0 release notes for changes since beta4. Note: as usual, bug fixes that were also applied in back branches are not considered material to include in a new major release's notes.</li>

<li>In pgsql/src/bin/psql/command.c, avoid passing signed chars to &lt;ctype.h&gt; functions ... same old portability mistake as always. Per buildfarm member pika.</li>

<li>In pgsql/doc/src/sgml/unaccent.sgml, docs review for unaccent: fix grammar, markup, etc.</li>

<li>In pgsql/src/backend/port/sysv_shmem.c, improve hint message for ENOMEM failure from shmget(). It turns out that some platforms return ENOMEM for a request that violates SHMALL, whereas we were assuming that ENOSPC would always be used for that. Apparently the latter is a Linuxism while ENOMEM is the BSD tradition. Extend the ENOMEM hint to suggest that raising SHMALL might be needed. Per gripe from A.M. Backpatch to 9.0, but not further, because this doesn't seem important enough to warrant creating extra translation work in the stable branches. (If it were, we'd have figured this out years ago.)</li>

<li>In a bit more., document filtering dictionaries in textsearch.sgml. While at it, copy-edit the description of prefix-match marker support in synonym dictionaries, and clarify the description of the default</li>

<li>In pgsql/config/prep_buildtree, don't auto-create the subdirectories holding built documentation in a VPATH build tree. If we actually build the docs in the VPATH tree, those dirs will get created then; but if they're present and empty, they capture the vpathsearch searches in "make install", preventing installation of prebuilt docs that might exist in the source tree. Per bug #5595 from Dmtiriy Igrishin. Fix based on idea from Peter Eisentraut.</li>

<li>In pgsql/src/backend/executor/execQual.c, fix ExecMakeTableFunctionResult to verify that all rows returned by a SRF returning "record" actually do have the same rowtype. This is needed because the parser can't realistically enforce that they will all have the same typmod, as seen in a recent example from David Wheeler. Back-patch to 8.0, which is as far back as we have the notion of RECORD subtypes being distinguished by typmod. Wheeler's example depends on 8.4-and-up features, but I suspect there may be ways to provoke similar failures before 8.4.</li>

<li>Update time zone data files to tzdata release 2010l: DST law changes in Egypt and Palestine. Added new names for two Micronesian timezones: Pacific/Chuuk is now preferred over Pacific/Truk (and the preferred abbreviation is CHUT not TRUT) and Pacific/Pohnpei is preferred over Pacific/Ponape. Historical corrections for Finland.</li>

<li>In pgsql/doc/src/sgml/ddl.sgml, explain automatic creation (or lack of it) of indexes for the various types of constraints. Kevin Grittner.</li>

<li>Document the existence of the socket lock file under unix_socket_directory, which is perhaps not a terribly good spot for it but there doesn't seem to be a better place. Also add a source-code comment pointing out a couple reasons for having a separate lock file. Per suggestion from Greg Smith.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, remove obsolete remark that PQprepare() is more flexible than PREPARE. Spotted by Dmitriy Igrishin. Back-patch to 8.2, which is when the PREPARE statement was improved to allow parameter types to be omitted.</li>

<li>Reduce PANIC to ERROR in some occasionally-reported btree failure cases. This patch changes _bt_split() and _bt_pagedel() to throw a plain ERROR, rather than PANIC, for several cases that are reported from the field from time to time: 1. right sibling's left-link doesn't match; 2. PageAddItem failure during _bt_split(); 3. parent page's next child isn't right sibling during _bt_pagedel(). In addition the error messages for these cases have been made a bit more verbose, with additional values included. The original motivation for PANIC here was to capture core dumps for subsequent analysis. But with so many users whose platforms don't capture core dumps by default, or who are unprepared to analyze them anyway, it's hard to justify a forced database restart when we can fairly easily detect the problems before we've reached the critical sections where PANIC would be necessary. It is not currently known whether the reports of these messages indicate well-hidden bugs in Postgres, or are a result of storage-level malfeasance; the latter possibility suggests that we ought to try to be more robust even if there is a bug here that's ultimately found. Backpatch to 8.2. The code before that is sufficiently different that it doesn't seem worth the trouble to back-port further.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>Add string functions: concat(), concat_ws(), left(), right(), and reverse(). Pavel Stehule, reviewed by me.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, update autovacuum_freeze_max_age documentation to mention that the default is low because of pg_clog file removal. Backpatch to 9.0.X.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, clarifications for 9.0 release notes Josh Berkus</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, fix awkward wording in Incrementally Updated Backups docs. Backpatch to 9.0.X.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, update release notes, per comments from Simon Riggs.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, remove docs for "Incrementally Updated Backups" because it was of questionable reliability; information moved to a wiki: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Incrementally_Updated_Backups">http://wiki.postgresql.org/wiki/Incrementally_Updated_Backups</a> Backpatch to 9.0.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/Makefile.global.in, when in automatic dependency mode, never delete any intermediate files automatically. Otherwise, the following could happen: When starting from a clean source tree, the first build would delete the intermediate file, but also create the dependency file, which mentions the intermediate file, thus making it non-intermediate. The second build will then need to rebuild the now non-intermediate missing file. So the second build will do work even though nothing had changed. One place where this happens is the .c -&gt; .o -&gt; .so chain for some contrib modules.</li>

<li>In pgsql/doc/src/sgml/catalogs.sgml, add missing description of reloftype field.</li>

<li>In pgsql/src/pl/plpython/plpython.c, catch null pointer returns from PyCObject_AsVoidPtr and PyCObject_FromVoidPtr. This is reproducibly possible in Python 2.7 if the user turned PendingDeprecationWarning into an error, but it's theoretically also possible in earlier versions in case of exceptional conditions. Backpatched to 8.0.</li>

<li>Translation updates for 9.0rc1.</li>

<li>Small refactoring of makeVar() from a TargetEntry.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, remove duplicate translatable phrase.</li>

<li>Improve wording for privilege description on certain failure messages; the original misleadingly suggests that only access is meant, causing confusion. Per recent trouble report by Robert McGehee on pgsql-admin.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>tag rc1 ... final stretch ...</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Rewrite comment code for better modularity, and add necessary locking. Review by Alvaro Herrera, KaiGai Kohei, and Tom Lane.</li>

<li>In pgsql/src/backend/catalog/objectaddress.c, insert additional compiler placation into objectaddress.c. Peter Eisentraut reports that some bits of the "address" variable in get_object_address() give "may be used uninitialized" warnings; this likes the only excuse his compiler could have for thinking that's possible.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Andrew Dunstan sent in a WIP patch to allow enums to be extended.</li>

<li>Boxuan Zhai sent in another revisions of the patch to add MERGE, this time with support for table inheritance.</li>

<li>Bruce Momjian sent in a doc patch for incrementally updated backups.</li>

<li>Magnus Hagander sent in a patch which handles a Windows failure case.</li>

<li>KaiGai Kohei sent in another revision of the patch to add a security hook on authorization.</li>

<li>Zoltan Boszormenyi sent in a patch to fix ECPG's handling of mixed-case cursor names.</li>

<li>Heikki Linnakangas sent in a patch to add latches to the back-end.</li>

<li>Andrew Dunstan sent in another WIP patch to implement extensible enums.</li>

<li>Heikki Linnakangas sent in a patch intended to speed up parts of COPY.</li>

<li>Alexander Korotkov sent in a patch to add a levenshtein_less_equal function to contrib/fuzzystrmatch.</li>

<li>Thom Brown sent in a doc patch to fix some inconsistent markup.</li>

<li>Kevin Grittner sent in another revision of the SIREAD patch for true serializability, along with one which enables true serializability for GiST indexes.</li>

</ul>