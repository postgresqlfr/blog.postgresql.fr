---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 avril 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-04-05-nouvelles-hebdomadaires-de-postgresql-4-avril-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Rework join-removal logic as per recent discussion. In particular this fixes things so that it works for cases where nested removals are possible. The overhead of the optimization should be significantly less, as well.</li>

<li>Fix "constraint_exclusion = partition" logic so that it will also attempt constraint exclusion on an inheritance set that is the target of an UPDATE or DELETE query. Per gripe from Marc Cousin. Back-patch to 8.4 where the feature was introduced.</li>

<li>In pgsql/contrib/pgstattuple/pgstattuple.c, ensure that contrib/pgstattuple functions respond to cancel interrupts reasonably promptly, by adding CHECK_FOR_INTERRUPTS in the per-page loops. Tatsuhito Kasahara.</li>

<li>In pgsql/src/bin/psql/command.c, \ddp should be recognized as such even if user appends S or + to it. Those options do nothing right now, but might be wanted later, and in any case it's confusing for the command to be interpreted as \dd if anything is appended. Per Jaime Casanova.</li>

<li>In pgsql/doc/src/sgml/ref/alter_default_privileges.sgml, minor wording improvement.</li>

<li>In pgsql/src/backend/commands/async.c, improve phrasing of warning message for NOTIFY queue getting too full. Per gripe from Peter Eisentraut.</li>

<li>Fix updateAclDependencies() to not assume that ACL role dependencies can only be added during GRANT and can only be removed during REVOKE; and fix its callers to not lie to it about the existing set of dependencies when instantiating a formerly-default ACL. The previous coding accidentally failed to malfunction so long as default ACLs contain only references to the object's owning role, because that role is ignored by updateAclDependencies. However this is obviously pretty fragile, as well as being an undocumented assumption. The new coding is a few lines longer but IMO much clearer.</li>

<li>Arrange to remove pg_default_acl entries completely if their ACL setting is changed to match the hard-wired default. This avoids accumulating useless catalog entries, and also provides a path for dropping the owning role without using DROP OWNED BY. Per yesterday's complaint from Jaime Casanova, the need to use DROP OWNED BY for that is less than obvious, so providing this alternative method might save some user frustration.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, clean up description of 9.0's incompatible changes in SIMILAR TO and SQL-style substring().</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/recovery.conf.sample, edit recovery.conf.sample so it matches docs. Change standby_mode example to 'on or 'off' rather than 'true' or 'false', as shown in docs. Add restartpoint_command. Add section header for recovery target parameters, matching docs.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, move system startup message prior to any calls out of data directory. This allows us to see what mode the server is in before it starts to perform actions that can block or hang. Otherwise server messages may not appear until after messages that say FATAL the database server is starting up.</li>

<li>Clarify some behaviours of REASSIGN OWNED and DROP OWNED BY.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, check compulsory parameters in recovery.conf in standby_mode, per docs.</li>

<li>In pgsql/doc/src/sgml/stylesheet-man.xsl, allow for more room in the man page title, so that "CREATE TEXT SEARCH CONFIGURATION" is not truncated.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/plpython.sgml, add some documentation about PL/Python limitations. Suggested by Steve White (bug #5272)</li>

<li>In pgsql/doc/src/sgml/plpython.sgml, add some information about what it means for PL/Python to be untrusted. Similar information already appears in the PL/Perl and PL/Tcl chapters.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, add note that XML Schema validation is not supported. Requested by Andrew Lardinois.</li>

<li>Separate targets "make docs" and "make install-docs" for the documentation. It is no longer installed by default, but included in "make world"/"make install-world". Documentation updated accordingly. Also, fix vpathsearch function to work when calling make install-docs without previous make docs.</li>

<li>In pgsql/src/backend/libpq/auth.c, message tuning.</li>

<li>In pgsql/doc/src/sgml/Makefile, fix the build and install rules for man pages with SQL section != 7. The previous coding failed in various scenarios possibly including vpath builds and doing make install without preceding make all.</li>

<li>Remove unnecessary xref endterm attributes and title ids. The endterm attribute is mainly useful when the toolchain does not support automatic link target text generation for a particular situation. In the past, this was required by the man page tools for all reference page links, but that is no longer the case, and it now actually gets in the way of proper automatic link text generation. The only remaining use cases are currently xrefs to refsects.</li>

<li>In pgsql/doc/src/sgml/func.sgml, clarify documentation of to_char EEEE pattern.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/type.c, message quoting style tuning.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/misc/postgresql.conf.sample, add comma missing from postgresql.conf comment.</li>

<li>In pgsql/src/backend/access/nbtree/nbtxlog.c, properly initialize local varaible in btree_xlog_delete_get_latestRemovedXid(). This variable was only tested in assert builds.</li>

<li>Change recovery.conf.sample to match postgresql.conf by showing only default values, with example comments.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, document why 'cp -i</li>

<li>In pgsql/doc/src/sgml/backup.sgml, clarify ellipses use in archive_command example, per Josh Kupershmidt.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, Revert change that prevented ellipses from looking like ../.</li>

<li>Improve 9.0 release notes by removing extra parentheses and linking to a more appropriate place for exclusion constraints.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, use test -e rather than test -f.</li>

<li>In pgsql/doc/src/sgml/release-9.0.sgml, add full names for release note item authors.</li>

<li>In pgsql/doc/src/sgml/ddl.sgml, add contraint exclusion section to contraint docs. ITAGAKI Takahiro.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, change test -e to test -f in docs, for portability.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/transam/xlog.c, change the retry-loop in standby mode to also try restoring files from pg_xlog directory. This is essential for replaying WAL records that were streamed from the master, after a standby server restart. If a corrupt record is seen in a file restored from the archive or streamed from the master, log it as a WARNING and keep retrying. If the corruption is permanent, and not just a glitch in the whatever copies the files to the archive or a network error not caught by CRC checks in TCP for example, we will keep retrying and logging the WARNING indefinitely. But that's better than shutting down completely, the standby is still useful for running read-only queries. In PITR the recovery ends at such a corrupt record, which is a bit questionable, but that's the behavior we had in previous releases and we don't feel like chaning it now. It does make sense for tools like pg_standby.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, enhance documentation of the built-in standby mode, explaining the retry loop in standby mode, trying to restore from archive, pg_xlog and streaming. Move sections around to make the high availability chapter more coherent: the most prominent part is now a "Log-Shipping Standby Servers" section that describes what a standby server is (like the old "Warm Standby Servers for High Availability" section), and how to set up a warm standby server, including streaming replication, using the built-in standby mode. The pg_standby method is described in another section called "Alternative method for log shipping", with the added caveat that it doesn't work with streaming replication.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, mention that if special keywords like "sameuser" and "replication" are quoted in pg_hba.conf, they lose their special meaning.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, enhance standby documentation. Original patch by Fujii Masao, with heavy editing and bitrot-fixing after my other commit.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, fix typos, spotted by Thom Brown.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, don't pass an invalid file handle to dup2(). That causes a crash on Windows, thanks to a feature in CRT called Parameter Validation. Backpatch to 8.2, which is the oldest version supported on Windows. In 8.2 and 8.3 also backpatch the earlier change to use DEVNULL instead of NULL_DEV #define for a /dev/null-like device. NULL_DEV was hard-coded to "/dev/null" regardless of platform, which didn't work on Windows, while DEVNULL works on all platforms. Restarting syslogger didn't work on Windows on versions 8.3 and below because of that.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Give a more precise error message if a variable is re-used as cursor name in ecpg.</li>

<li>Applied Zoltan's patch to make ecpg spit out warnings if a local variable hides a global one with the same name.</li>

<li>Zoltan Boszormenyi beautified his hidden-variable-patch for ecpg. This also makes sure we get an error message instead of a warning if the variable have different types.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/type.c, FATAL errors are meant to stop ecpg immediately, e.g. because the syntax is corrupted. This error, however, does is not a compilation problem but a runtime one, so we can keep compiling but still have to declare ERROR.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.c, make ecpg in line with other compilers in that it deletes its output if there was an error processing the input file. Work done by Zoltan Boszormenyi.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>Refer to max_wal_senders in a more consistent fashion. The error message now makes explicit reference to the GUC that must be changed to fix the problem, using wording suggested by Tom Lane. Along the way, rename the GUC from MaxWalSenders to max_wal_senders for consistency and grep-ability.</li>

<li>Version stamp 9.0alpha5.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Use a file of patterns of filenames to exclude from pgindent runs, instead if using multiple invocations of egrep. Add perl ppport.h to the current list.</li>

<li>Sync perl's ppport.h on all branches back to 7.4 with recent update on HEAD, ensuring we can build older branches with modern Perl installations.</li>

<li>In pgsql/contrib/fuzzystrmatch/dmetaphone.c, make dmetaphone.c safe for pgindent and fussy compilers. Still to do: make it properly encoding aware w.r.t. chars U+00C7 and U+00D1.</li>

<li>In pgsql/src/tools/pgindent/pgindent, exclude unwanted typedef symbols in pgindent, including FD_SET which is found on some Windows platforms. Also, silence unnecessary messages and +make awk happier about literal '*' on some platforms.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/pageinspect/heapfuncs.c, fix minor typos in comments. Josh Kupershmidt.</li>

<li>Update a number of broken links in comments. Josh Kupershmidt.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/pg_ctl/pg_ctl.c, use a new API rather than a deprecated one in in cygwin. cygwin_conv_to_full_win32_path should be replaced with cygwin_conv_path.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Christensen sent in a patch for 9.1 to add a -C option to initdb, which would then allow people to set various postgresql.conf directives.</li>

<li>Robert Haas sent in a patch to add the maximum number of keys for a syscache from 4 to 5. This is support infrastructure, at first, for K-Nearest Neighbor GiST searches.</li>

<li>ITAGAKI Takahiro sent in a patch to fix an issue with PG_MODULE_MAGIC on Windows builds with MSVC.</li>

<li>Pavel Stehule sent in a patch to allow psql's \ef (edit function) to take an optional "lines offset" option, and adds a \sf[+] to show the body.</li>

<li>Fujii Masao sent in a doc patch for streaming replication.</li>

<li>Fujii Masao sent in two updated patches to add a new smart shutdown mode for hot standby and streaming replication.</li>

<li>Fujii Masao sent in another revision of a patch for streaming replication which adds handling for timeline and location to pg_xlogfile_name().</li>

<li>Mike Lewis sent in two revisions of a patch to detoast the headers for arrays in contrib/intarray before detoasting what's needed of the rest. This makes accesses to large arrays faster.</li>

<li>Fujii Masao and Thom Brown traded patches to clarify messages around error conditions for streaming replication.</li>

<li>ITAGAKI Takahiro sent in a doc patch which adds exclusion constraints as a primary index term.</li>

<li>Zoltan Boszormenyi sent in a patch for ECPG intended to resolve an issue with standard DECLARE behavior on cursors.</li>

<li>Pavel Stehule sent in two more revisions of the fulltext dictionary preload patch using mmap().</li>

<li>Zoltan Boszormenyi sent in another revision of the ECPG patch to check for variables hidden by local ones.</li>

<li>Peter Eisentraut sent in a patch to change casts and operators to include pg_catalog qualification.</li>

<li>Fujii Masao sent in a patch per Heikki Linnakangas's suggestion to make ReservedBackends = superuser_reserved_connections + max_wal_senders and MaxBackends = max_connections + autovacuum_max_workers + max_wal_senders + 1.</li>

<li>Yeb Havinga sent in another version of the patch to make EXPLAIN's subplans clearer.</li>

<li>Zoltan Boszormenyi sent in a WIP patch for ECPG which deletes the output file when certain kinds of error occur.</li>

</ul>