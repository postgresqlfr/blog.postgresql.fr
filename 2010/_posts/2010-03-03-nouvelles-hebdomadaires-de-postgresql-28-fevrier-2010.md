---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 février 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-03-03-nouvelles-hebdomadaires-de-postgresql-28-fevrier-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Move documentation of all recovery.conf option to a new chapter. They used to be scattered between the "backup and restore" and "streaming replication" chapters.</li>

<li>Fix streaming replication starting at the very first WAL segment. Per complaint from Greg Stark.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, small streaming replication document improvements. Be more explicit that it's asynchronous.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, fix typo. Fujii Masao.</li>

<li>In pgsql/doc/src/sgml/recovery-config.sgml, clarify that the connection string for primary_conninfo is in the same format as in PQconnectdb(). As pointed out by Thom Brown.</li>

<li>Document max_standby_delay=-1 option, now that it's allowed again.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/storage/file/fd.c, adjust pg_fsync_writethrough so that it will set errno when failing on a platform that doesn't support this operation. The former coding would allow an unrelated errno to be reported, which would be quite misleading. Not sure if this has anything to do with the current buildfarm failures, but it's certainly bogus as-is.</li>

<li>In pgsql/src/port/copydir.c, let's try forcing errno to zero before issuing fsync. The current buildfarm results claiming EBADF seem improbable enough that I'm not convinced fsync is really returning that --- could it be failing to set errno at all?</li>

<li>In pgsql/src/port/copydir.c, some platforms reject fsync() on files opened O_RDONLY.</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_tar.c, minor style policing for error messages in pg_dump tar code. Notably, change "dumping data out of order is not supported" to "restoring data out of order is not supported", because you get that error during pg_restore not pg_dump. Also fix some comments that didn't look so good after being pgindented as perhaps they did originally.</li>

<li>In pgsql/doc/src/sgml/ref/pg_dump.sgml, clarify statements about tar archive format.</li>

<li>Fix configure's regexp for extracting the Perl version number from perl -v output. Per bug #5339, Perl 5.11 has changed the format of that output enough to break the previous coding. Alex Hunsaker</li>

<li>Add an OR REPLACE option to CREATE LANGUAGE. This operates in the same way as other CREATE OR REPLACE commands, ie, it replaces everything but the ownership and ACL lists of an existing entry, and requires the caller to have owner privileges for that entry. While modifying an existing language has some use in development scenarios, in typical usage all the "replaced" values come from pg_pltemplate so there will be no actual change in the language definition. The reason for adding this is mainly to allow programs to ensure that a language exists without triggering an error if it already does exist. This commit just adds and documents the new option. A followon patch will use it to clean up some unpleasant cases in pg_dump and pg_regress.</li>

<li>In pgsql/src/test/regress/pg_regress.c, make pg_regress use CREATE OR REPLACE LANGUAGE, so that --load-language will work whether or not the specified language is preinstalled. This responds to some complaints about having to change test scripts because plpgsql is preinstalled as of 9.0.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, use CREATE OR REPLACE LANGUAGE in pg_dump to avoid the need for a couple of significantly uglier kluges that were working around the change in plpgsql's preinstalled status.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, un-break pg_dump for the case of zero-column tables. This was evidently broken by the CREATE TABLE OF TYPE patch. It would have been noticed if anyone had bothered to try dumping and restoring the regression database ...</li>

<li>Fix patch for printing backend and pg_dump versions so that it works in a desirable fashion in archive-dump cases, ie you should get the pg_dump version not the pg_restore version.</li>

<li>Allow zero-dimensional (ie, empty) arrays in contrib/ltree operations. The main motivation for changing this is bug #4921, in which it's pointed out that it's no longer safe to apply ltree operations to the result of ARRAY(SELECT ...) if the sub-select might return no rows. Before 8.3, the ARRAY() construct would return NULL, which might or might not be helpful but at least it wouldn't result in an error. Now it returns an empty array which results in a failure for no good reason, since the ltree operations are all perfectly capable of dealing with zero-element arrays. As far as I can find, these ltree functions are the only places where zero array dimensionality is rejected unnecessarily. Back-patch to 8.3 to prevent behavioral regression of queries that worked in older releases.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, make pg_stop_backup's reporting a bit more verbose in hopes of making error cases less intimidating for novices. Per discussion. Greg Smith.</li>

<li>In pgsql/doc/src/sgml/plperl.sgml, improve warning about creating nested named subroutines in plperl. Per discussion.</li>

<li>In pgsql/src/backend/optimizer/util/predtest.c, allow predicate_refuted_by() to deduce that NOT A refutes A. We had originally made the stronger assumption that NOT A refutes any B if B implies A, but this fails in three-valued logic, because we need to prove B is false not just that it's not true. However the logic does go through if B is equal to A. Recognizing this limited case is enough to handle examples that arise when we have simplified "bool_var = true" or "bool_var = false" to just "bool_var" or "NOT bool_var". If we had not done that simplification then the btree-operator proof logic would have been able to prove that the expressions were contradictory, but only for identical expressions being compared to the constants; so handling identical A and B covers all the same cases. The motivation for doing this is to avoid unexpected asymmetrical behavior when a partitioned table uses a boolean partitioning column, as in today's gripe from Dominik Sander. Back-patch to 8.2, which is as far back as predicate_refuted_by attempts to do anything at all with NOTs.</li>

<li>Back-patch addition of ssl_renegotiation_limit into 7.4 through 8.1.</li>

<li>In pgsql/src/backend/utils/mb/mbutils.c, undo some more pgindent breakage. Per buildfarm.</li>

<li>Entity-ify a few new uses of literal &lt;, &gt;, and &amp;.</li>

<li>Insert a hack into get_float8_nan (both core and ecpg copies) to deal with the fact that NetBSD/mips is currently broken, as per buildfarm member pika. Also add regression tests to ensure that get_float8_nan and get_float4_nan are exercised even on platforms where they are not needed by float8in/float4in. Zoltan Boszormenyi and Tom Lane.</li>

<li>Assorted code cleanup for contrib/xml2. No change in functionality, just make it a bit less ugly in places.</li>

<li>Fix up memory management problems in contrib/xml2. Get rid of the code that attempted to funnel libxml2's memory allocations into palloc. We already knew from experience with the core xml datatype that trying to do this is simply not reliable. Unlike the core code, I did not bother adding a lot of PG_TRY/PG_CATCH logic to try to ensure that everything is cleaned up on error exit. Hence, we might leak some memory if one of these functions fails partway through. Given the deprecated status of this contrib module and the fact that errors partway through the functions shouldn't be too common, it doesn't seem worth worrying about. Also fix a separate bug in xpath_table, that it did the wrong things if given a result tuple descriptor with less than 2 columns. While such a case isn't very useful in practice, we shouldn't fail or stomp memory when it occurs. Add some simple regression tests based on all the reported crash cases that I have on hand. This should be back-patched, but let's see if the buildfarm likes it first.</li>

<li>Back-patch changes of 2009-05-13 in xml.c's memory management to 8.3. I was afraid to do this when these changes were first made, but now that 8.4 has seen some field use it should be all right to back-patch. These changes are really quite necessary in order to give xml.c any hope of co-existing with loadable modules that also wish to use libxml2.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, briefly document in two places that pg_dump and pg_dumpall cannot be used for continuous archiving.</li>

<li>Use the term "bundled distribution" instead of "official distribution" in configure warnings.</li>

<li>In pgsql/doc/src/sgml/protocol.sgml, remove protocol documentation paragraph about environment variable passing being "covered elsewhere", per Dave Page.</li>

<li>Revert configure warning to use "official distribution".</li>

<li>Document that pg_ctl cares about the PGHOST environment variable.</li>

<li>In pgsql/doc/src/sgml/ref/create_table.sgml, remove long-commented-out paragraph in documentation about function inheritance in create table, per Andrew Dunstan.</li>

<li>In pgsql/doc/src/sgml/ref/pg_restore.sgml, update pg_restore documentation to show new pg_restore custom listing format. Pavel Golub.</li>

<li>Supress convertion of zero hours to '12' for intervals when using to_char with Hitoshi Harada, e.g. to_char(interval '0d 0h 12m 44s', 'DD HH24 MI SS'); now returns: '00 00 12 44' not: '00 12 12 44'.</li>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, make documentation more direct about the handling of COPY files based on the client encoding.</li>

<li>In pgsql/src/backend/utils/adt/formatting.c, secondary patch to fix interval to_char() for "HH" where hours &gt;= 12.</li>

<li>Revert recent change of to_char('HH12') handling for intervals; instead improve documentation, and add C comment.</li>

<li>In pgsql/doc/src/sgml/ref/copy.sgml, revert recent COPY manual change about encoding; add mention of "server".</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, have pg_dump (-v) verbose mode output the pg_dump and server versions in text output mode, like we do in custom output mode. Jim Cox</li>

<li>Update startup scripts for Linux and FreeBSD. Kevin Grittner.</li>

<li>In pgsql/contrib/start-scripts/freebsd, modify freebsd start script to just exit 0 with message.</li>

<li>Remove pre-7.4 documentaiton mentions, now that 8.0 is the oldest supported release.</li>

<li>Revert removal of pre-7.4 documenation behavior mentions.</li>

<li>In pgsql/doc/src/sgml/ref/pg_restore.sgml, document that pg_restore -t can use -n for its schema qualification.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, clearly document that timestamp alone means timestamp without timezone, per SQL standard, and mention 7.3 behavior at the end.</li>

<li>In pgsql/src/backend/utils/adt/formatting.c, add C comment that do_to_timestamp() lacks error checking.</li>

<li>In pgsql/doc/src/sgml/config.sgml, document clearly the meaning of none/all for log_statements.</li>

<li>In pgsql/doc/src/sgml/ref/create_function.sgml, document that after triggers that need to see changed rows should not be marked stable.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, remove 'emphasis' markup inside literal; not allowed.</li>

<li>In pgsql/src/tools/pgindent/README, update pgindent instructions to avoid changes to flex output files.</li>

<li>In pgsql/src/tools/pgindent/typedefs.pl, add pgindent typedefs file to CVS.</li>

<li>pgindent run for 9.0.</li>

<li>In pgsql/src/tools/pgindent/README, update pgindent instructions.</li>

<li>In pgsql/doc/src/sgml/perform.sgml, document pg_restore --jobs as a performance enhancement.</li>

<li>Call output file typedefs.list; update README.</li>

<li>In pgsql/src/bin/scripts/vacuumdb.c in vacuumdb --help, call analyze "statistics", not "hints".</li>

<li>In pgsql/src/tools/pgindent/README, document why pgindent wants a fresh CVS checkout.</li>

<li>In pgsql/src/tools/pgindent/README, update pgindent docs to use maintainer-clean.</li>

<li>In pgsql/src/tools/pgindent/README, wording improvements to README.</li>

<li>Revert pgindent changes to ecpg include files that are part of ecpg regession test output, and update pgindent script to avoid them in the future.</li>

<li>In pgsql/src/tools/pgindent/README, suggest gmake installcheck-world for pgindent testing.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, document ATAPI drive flush command, and mention SSD drives.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, use &lt;&gt; for libpq #include in example programs, per suggestion from Josh Berkus.</li>

<li>In pgsql/doc/src/sgml/config.sgml, document trace_recovery_messages() parameter as an enum, not string. Fujii Masao.</li>

<li>Document ATAPI FLUSH CACHE EXT.</li>

<li>In pgsql/src/backend/utils/adt/pg_locale.c, back out unintended change to pg_locale.c.</li>

<li>Update complex locale example in the documentation.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/dblink/dblink.c, remove useless codes to initialize TupleDesc from dblink_exec.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/mvcc.sgml, remove stray semicolon, per report from Sandro (strk) Santilli strk AT keybit DOT net.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plperl.sgml, fix typos, per Richard Huxton</li>

<li>Add configuration parameter ssl_renegotiation_limit to control how often we do SSL session key renegotiation. Can be set to 0 to disable renegotiation completely, which is required if a broken SSL library is used (broken patches to CVE-2009-3555 a known cause) or when using a client library that can't do renegotiation. Back-patch to 8.2.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Make sure ecpg uses the same header files in the same order as the backend.</li>

</ul>

<p>Gregory Stark a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/copydir.c, second try at fsyncing directories in CREATE DATABASE. Let's see what the build farm says of opening directories read-only and ignoring EBADF from fsync of directories.</li>

<li>In pgsql/src/port/copydir.c, Add EPERM to the list of return codes to expect from opening directories based on Vista results</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Magnus Hagander sent in a patch to fix the SSL negotiation issue.</li>

<li>Fujii Masao sent in a doc patch for Hot Standby.</li>

<li>Simon Riggs sent in a patch to add a pg_abort_backup() function per discussion about Hot Standby/Streaming Replication.</li>

<li>Gabrielle Roth sent in a doc patch explaining which statements get logged at different levels of log_level in postgresql.conf.</li>

<li>Fujii Masao sent in a patch for streaming replication to use lastPageTLI instead of curFileTLI as the timeline of the last applied record.</li>

<li>Teodor Sigaev sent in a patch against tsearch2 which allows for underscores.</li>

<li>ITAGAKI Takahiro sent in a cleanup for the sequential scan code.</li>

<li>Piyush Newe sent in a patch to change the error message thrown in ambiguous cases of the argument.function notation.</li>

<li>Hiroshi Inoue and Bruce Momjian sent in patches to get to_char to do the right thing on Windows with UTF-8 encoding.</li>

</ul>