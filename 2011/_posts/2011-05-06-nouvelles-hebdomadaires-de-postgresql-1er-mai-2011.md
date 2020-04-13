---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er mai 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-05-06-nouvelles-hebdomadaires-de-postgresql-1er-mai-2011 "
---


<p>Magnus Hagander a rejoint l'&eacute;quipe de d&eacute;veloppement du c&oelig;ur de PostgreSQL. F&eacute;licitations&nbsp;!</p>

<p>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

<li>La PG Session 2, sur PostGIS, se tiendra &agrave; Paris le 23 juin. Appel &agrave; conf&eacute;renciers&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/2/">http://www.postgresql-sessions.org/en/2/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110501">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>In libecpg do not set an sqlda field that is 'reserved for future use' unless we know what should be stored in there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5948a6eeaa682aeb1a8f389ae2136915b2a0e990">http://git.postgresql.org/pg/commitdiff/5948a6eeaa682aeb1a8f389ae2136915b2a0e990</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust yywrap macro for non-reentrant scanners for MSVC. The MSVC compiler complains if a macro is called with less arguments than its definition provides for. flex generates a macro with one argument for yywrap, but only supplies the argument for reentrant scanners, so we remove the useless argument in the non-reentrant case to silence the warning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08a0c2dabc3b9d59d72d7a79ed867b8e37d275a7">http://git.postgresql.org/pg/commitdiff/08a0c2dabc3b9d59d72d7a79ed867b8e37d275a7</a></li>

<li>Give getopt() a prototype and modern style arg specs. Welcome to the 1990s. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e0f8f836da9a992c8cbd99c5c06ea40247d6a33">http://git.postgresql.org/pg/commitdiff/7e0f8f836da9a992c8cbd99c5c06ea40247d6a33</a></li>

<li>Prevent perl header overriding our *snprintf macros, and give it a usable PERL_UNUSED_DECL value. This quiets compiler warnings about redefined macros and unused Perl__unused variables. The redefinition of snprintf and vsnprintf is something we want to avoid anyway, if we've gone to the bother of setting up the macros to point to our implementation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77622887449f0fd0eb08b28fe4fa5992c357d45a">http://git.postgresql.org/pg/commitdiff/77622887449f0fd0eb08b28fe4fa5992c357d45a</a></li>

<li>Assorted minor changes to silence Windows compiler warnings. Mostly to do with macro redefinitions or object signedness. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/860be17ec3c19a1aeba0bbe7ecaf30be409ea446">http://git.postgresql.org/pg/commitdiff/860be17ec3c19a1aeba0bbe7ecaf30be409ea446</a></li>

<li>Use terse mode to avoid variable order dependency output in foreign data regression check. Per Tom Lane's suggestion about my gripe about occasional errors noticed on the buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/625744ac43360ca3f4a6d3eccecb6f4c999a1a63">http://git.postgresql.org/pg/commitdiff/625744ac43360ca3f4a6d3eccecb6f4c999a1a63</a></li>

<li>Use an explicit format string to keep the compiler happy. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c43d0791ac5fb765a088d41564cd44747aef42d8">http://git.postgresql.org/pg/commitdiff/c43d0791ac5fb765a088d41564cd44747aef42d8</a></li>

<li>Force use of "%I64d" format for 64 bit ints on MinGW. Both this and "%lld" work, but the compiler's format checking doesn't like "%lld", so we get all sorts of spurious warnings. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52d01c2f52c462d29ae0fdfa44c3cae129148a6d">http://git.postgresql.org/pg/commitdiff/52d01c2f52c462d29ae0fdfa44c3cae129148a6d</a></li>

<li>Remove hard coded formats for INT64 and use configured settings instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b1508af8971c1627cda5bb65f5e9eddb9a1a55e">http://git.postgresql.org/pg/commitdiff/9b1508af8971c1627cda5bb65f5e9eddb9a1a55e</a></li>

<li>Revert "Remove hard coded formats for INT64 and use configured settings instead." This reverts commit 9b1508af8971c1627cda5bb65f5e9eddb9a1a55e. As requested by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/348c10efe08f01872daeeb62f32c8e362fcbba69">http://git.postgresql.org/pg/commitdiff/348c10efe08f01872daeeb62f32c8e362fcbba69</a></li>

<li>Revert "Force use of "%I64d" format for 64 bit ints on MinGW." This reverts commit 52d01c2f52c462d29ae0fdfa44c3cae129148a6d. The UINT64_FORMAT bit broke the buildfarm, so I'm reverting the whole thing pending further investigation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6693fec0e8dec81a9b149494cbdb90e454b6119e">http://git.postgresql.org/pg/commitdiff/6693fec0e8dec81a9b149494cbdb90e454b6119e</a></li>

<li>Use a macro variable PG_PRINTF_ATTRIBUTE for the style used for checking printf type functions. The style is set to "printf" for backwards compatibility everywhere except on Windows, where it is set to "gnu_printf", which eliminates hundreds of false error messages from modern versions of gcc arising from %m and %ll{d,u} formats. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c02d5b7c27d740830379244db4b9ef111bbf0fc8">http://git.postgresql.org/pg/commitdiff/c02d5b7c27d740830379244db4b9ef111bbf0fc8</a></li>

<li>Add some casts to try to silence most of the remaining format warnings on MinGW-W64. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab0ba6e73ae9b3c9956126bdcd3c410238a27244">http://git.postgresql.org/pg/commitdiff/ab0ba6e73ae9b3c9956126bdcd3c410238a27244</a></li>

<li>Add some casts to try to silence most of the remaining format warnings on MinGW-W64. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab0ba6e73ae9b3c9956126bdcd3c410238a27244">http://git.postgresql.org/pg/commitdiff/ab0ba6e73ae9b3c9956126bdcd3c410238a27244</a></li>

<li>Use non-literal format for possibly non-standard strftime formats. Per recent -hackers discussion. The formats in question are %G and %V, and cause warnings on MinGW at least. We assume the ecpg application knows what it's doing if it passes these formats to the library. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c49e4ae1f886e74efb4bc94c09b993098232d5f9">http://git.postgresql.org/pg/commitdiff/c49e4ae1f886e74efb4bc94c09b993098232d5f9</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix SSI-related assertion failure. Bug #5899, reported by Marko Tiikkaja. Heikki Linnakangas, reviewed by Kevin Grittner and Dan Ports. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b429519d8d1b6ac16e36dacba58ef77f77a621ca">http://git.postgresql.org/pg/commitdiff/b429519d8d1b6ac16e36dacba58ef77f77a621ca</a></li>

<li>Regression tests for TOAST. Kevin Grittner, per discussion of bug #5989 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97e83468513399039878e4a630d577c8b7f5b2db">http://git.postgresql.org/pg/commitdiff/97e83468513399039878e4a630d577c8b7f5b2db</a></li>

<li>Add fast paths for cases when no serializable transactions are running. Dan Ports. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02e6a115cc6149551527a45545fd1ef8d37e6aa0">http://git.postgresql.org/pg/commitdiff/02e6a115cc6149551527a45545fd1ef8d37e6aa0</a></li>

<li>Remove partial and undocumented GRANT .. FOREIGN TABLE support. Instead, foreign tables are treated just like views: permissions can be granted using GRANT privilege ON [TABLE] foreign_table_name TO role, and revoked similarly. GRANT/REVOKE .. FOREIGN TABLE is no longer supported, just as we don't support GRANT/REVOKE .. VIEW. The set of accepted permissions for foreign tables is now identical to the set for regular tables, and views. Per report from Thom Brown, and subsequent discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be90032e0d1cf473bdd99aee94218218f59f29f1">http://git.postgresql.org/pg/commitdiff/be90032e0d1cf473bdd99aee94218218f59f29f1</a></li>

<li>Refactor broken CREATE TABLE IF NOT EXISTS support. Per bug #5988, reported by Marko Tiikkaja, and further analyzed by Tom Lane, the previous coding was broken in several respects: even if the target table already existed, a subsequent CREATE TABLE IF NOT EXISTS might try to add additional constraints or sequences-for-serial specified in the new CREATE TABLE statement. In passing, this also fixes a minor information leak: it's no longer possible to figure out whether a schema to which you don't have CREATE access contains a sequence named like "x_y_seq" by attempting to create a table in that schema called "x" with a serial column called "y". Some more refactoring of this code in the future might be warranted, but that will need to wait for a later major release. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68ef051f5cf16f82a5368067a40ffba3c340b0d3">http://git.postgresql.org/pg/commitdiff/68ef051f5cf16f82a5368067a40ffba3c340b0d3</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add postmaster/postgres undocumented -b option for binary upgrades. This option turns off autovacuum, prevents non-super-user connections, and enables oid setting hooks in the backend. The code continues to use the old autoavacuum disable settings for servers with earlier catalog versions. This includes a catalog version bump to identify servers that support the -b option. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/76dd09bbec893c02376e3440a6a86a3b994d804c">http://git.postgresql.org/pg/commitdiff/76dd09bbec893c02376e3440a6a86a3b994d804c</a></li>

<li>In pg_upgrade, avoid one start/stop of the postmaster; use the -w (wait) flag for pg_ctl start/stop; remove the unused "quiet" flag in the functions for starting/stopping the postmaster. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44091442db7e0d9fd7f0495f09d725fc92d940b5">http://git.postgresql.org/pg/commitdiff/44091442db7e0d9fd7f0495f09d725fc92d940b5</a></li>

<li>Now that pg_upgrade uses -w in pg_ctl, remove loop that retried testing the connection; also restructure the libpq connection code. This patch also removes the unused variable postmasterPID and fixes a libpq structure leak that was in the testing loop. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c4d2bd9141034bd27977794f52003fd6f7d01f0">http://git.postgresql.org/pg/commitdiff/6c4d2bd9141034bd27977794f52003fd6f7d01f0</a></li>

<li>Reword documentation for NUMERIC with no specified precision. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ce83b5bdc532e716c39b6a04f1edda7e5e66cc7">http://git.postgresql.org/pg/commitdiff/8ce83b5bdc532e716c39b6a04f1edda7e5e66cc7</a></li>

<li>Doc wording improvement for NUMERIC limit paragraph. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dedcc48c567e443912d761a3616298678a4ec825">http://git.postgresql.org/pg/commitdiff/dedcc48c567e443912d761a3616298678a4ec825</a></li>

<li>Lowercase status labels in pg_stat_replication view. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a71b641309ea982593edf1f28d408c21885897b">http://git.postgresql.org/pg/commitdiff/5a71b641309ea982593edf1f28d408c21885897b</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support "make check" in contrib. Added a new option --extra-install to pg_regress to arrange installing the respective contrib directory into the temporary installation. This is currently not yet supported for Windows MSVC builds. Updated the .gitignore files for contrib modules to ignore the leftovers of a temp-install check run. Changed the exit status of "make check" in a pgxs build (which still does nothing) to 0 from 1. Added "make check" in contrib to top-level "make check-world". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8ebe3bcc5debfcf2bf588aee138944688b682c0">http://git.postgresql.org/pg/commitdiff/f8ebe3bcc5debfcf2bf588aee138944688b682c0</a></li>

<li>Fix binary upgrade of altered typed tables. Instead of dumping them as CREATE TABLE ... OF, dump them as normal tables with the usual special processing for dropped columns, and then attach them to the type afterward, using ALTER TABLE ... OF. This is analogous to the existing handling of inherited tables. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2ef8929ae1c1b65f4b9582409463a9a2f009706">http://git.postgresql.org/pg/commitdiff/b2ef8929ae1c1b65f4b9582409463a9a2f009706</a></li>

<li>Rewrite installation makefile rules without for loops. install-sh can install multiple files at once, so for loops are not necessary. This was already changed for the rest of the code some time ago, but pgxs.mk was apparently forgotten, and the obsolete coding style has now been copied to the PLs as well. This also fixes the problem that the for loops in question did not catch errors. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b106195b1731ce5d68e8bb5c421f09a4aae9e96a">http://git.postgresql.org/pg/commitdiff/b106195b1731ce5d68e8bb5c421f09a4aae9e96a</a></li>

<li>Catch errors in for loop in makefile. Add "|| exit" so that the rule aborts when a command fails. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c436a79e0f4e11f80c5878a0309ce60f79e17b1">http://git.postgresql.org/pg/commitdiff/5c436a79e0f4e11f80c5878a0309ce60f79e17b1</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_size_pretty() to avoid overflow for inputs close to INT64_MAX. The expression that tried to round the value to the nearest Tim Bunce could overflow, leading to bogus output as reported in bug #5993 from Nicola Cossu. This isn't likely to ever happen in the intended usage of the function (if it could, we'd be needing to use a wider datatype instead); but it's not hard to give the expected output, so let's do so. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af0f20092c8662bf7610fab07b8a1e354abba67f">http://git.postgresql.org/pg/commitdiff/af0f20092c8662bf7610fab07b8a1e354abba67f</a></li>

<li>Remove incorrect HINT for use of ALTER FOREIGN TABLE on the wrong relkind. Per discussion, removing the hint seems better than correcting it because the adjacent analogous cases in RenameRelation don't have any hints, and nobody seems to have missed 'em. Shigeru Hanada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6dab96abaa8bd6775658d26517e288f4d5f6448f">http://git.postgresql.org/pg/commitdiff/6dab96abaa8bd6775658d26517e288f4d5f6448f</a></li>

<li>Complain if pg_hba.conf contains "hostssl" but SSL is disabled. Most commenters agreed that this is more friendly than silently failing to match the line during actual connection attempts. Also, this will prevent corner cases that might arise when trying to handle such a line when the SSL code isn't turned on. An example is that specifying clientcert=1 in such a line would formerly result in a completely misleading complaint that root.crt wasn't present, as seen in a recent report from Marc-Andre Laverdiere. While we could have instead fixed that specific behavior, it seems likely that we'd have a continuing stream of such bizarre behaviors if we keep on allowing hostssl lines when SSL is disabled. Back-patch to 8.4, where clientcert was introduced. Earlier versions don't have this specific issue, and the code is enough different to make this patch not applicable without more work than it seems worth. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c464a0657b0cdaa7fa645d53621be10963cb7741">http://git.postgresql.org/pg/commitdiff/c464a0657b0cdaa7fa645d53621be10963cb7741</a></li>

<li>Rephrase some not-supported error messages in pg_hba.conf processing. In a couple of places we said "not supported on this platform" for cases that aren't really platform-specific, but could depend on configuration options such as --with-openssl. Use "not supported by this build" instead, as that doesn't convey the impression that you can't fix it without moving to another OS; that's also more consistent with the wording used for an identical error case in guc.c. No back-patch, as the clarity gain is small enough to not be worth burdening translators with back-branch changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71e7083532d8f6ad0cf345c3cc534b0307e816a8">http://git.postgresql.org/pg/commitdiff/71e7083532d8f6ad0cf345c3cc534b0307e816a8</a></li>

<li>Fix array- and path-creating functions to ensure padding bytes are zeroes. Per recent discussion, it's important for all computed datums (not only the results of input functions) to not contain any ill-defined (uninitialized) bits. Failing to ensure that can result in equal() reporting that semantically indistinguishable Consts are not equal, which in turn leads to bizarre and undesirable planner behavior, such as in a recent example from David Johnston. We might eventually try to fix this in a general manner by allowing datatypes to define identity-testing functions, but for now the path of least resistance is to expect datatypes to force all unused bits into consistent states. Per some testing by Noah Misch, array and path functions seem to be the only ones presenting risks at the moment, so I looked through all the functions in adt/array*.c and geo_ops.c and fixed them as necessary. In the array functions, the easiest/safest fix is to allocate result arrays with palloc0 instead of palloc. Possibly in future someone will want to look into whether we can just zero the padding bytes, but that looks too complex for a back-patchable fix. In the path functions, we already had a precedent in path_in for just zeroing the one known pad field, so duplicate that code as needed. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18c0b4eccdc86ffb7eccc2c6facfe382537ab877">http://git.postgresql.org/pg/commitdiff/18c0b4eccdc86ffb7eccc2c6facfe382537ab877</a></li>

<li>Add comments about the need to avoid uninitialized bits in datatype values. There was already one recommendation in the documentation about writing C functions to ensure padding bytes are zeroes, but make it stronger. Also fix an example that was still using direct assignment to a varlena length word, which no longer works since the varvarlena changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f6c75b541385eb2d48f7ef62c1c323ec2642134">http://git.postgresql.org/pg/commitdiff/4f6c75b541385eb2d48f7ef62c1c323ec2642134</a></li>

<li>Make a quick copy-editing pass over the 9.1 release notes. Also remove the material about this being an alpha release. The notes still need a lot of work, but they're more or less presentable as a beta version now. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb1051eb2d5eef060b64788cbec8459c46427fca">http://git.postgresql.org/pg/commitdiff/bb1051eb2d5eef060b64788cbec8459c46427fca</a></li>

<li>Tag 9.1beta1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/993c5e59047dd568d4831f7ec5c6199acd21f17f">http://git.postgresql.org/pg/commitdiff/993c5e59047dd568d4831f7ec5c6199acd21f17f</a></li>

<li>Rewrite pg_size_pretty() to avoid compiler bug. Convert it to use successive shifts right instead of increasing a divisor. This is probably a tad more efficient than the original coding, and it's nicer-looking than the previous patch because we don't need a special case to avoid overflow in the last branch. But the real reason to do it is to avoid a Solaris compiler bug, as per results from buildfarm member moa. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd2e2d09aa1d5ba198e09e6d936ff1bba7f62895">http://git.postgresql.org/pg/commitdiff/fd2e2d09aa1d5ba198e09e6d936ff1bba7f62895</a></li>

<li>Remove special case for xmin == xmax in HeapTupleSatisfiesVacuum(). VACUUM was willing to remove a committed-dead tuple immediately if it was deleted by the same transaction that inserted it. The idea is that such a tuple could never have been visible to any other transaction, so we don't need to keep it around to satisfy MVCC snapshots. However, there was already an exception for tuples that are part of an update chain, and this exception created a problem: we might remove TOAST tuples (which are never part of an update chain) while their parent tuple stayed around (if it was part of an update chain). This didn't pose a problem for most things, since the parent tuple is indeed dead: no snapshot will ever consider it visible. But MVCC-safe CLUSTER had a problem, since it will try to copy RECENTLY_DEAD tuples to the new table. It then has to copy their TOAST data too, and would fail if VACUUM had already removed the toast tuples. Easiest fix is to get rid of the special case for xmin == xmax. This may delay reclaiming dead space for a little bit in some cases, but it's by far the most reliable way to fix the issue. Per bug #5998 from Mark Reid. Back-patch to 8.3, which is the oldest version with MVCC-safe CLUSTER. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44e4bbf75d56e643b6afefd5cdcffccb68cce414">http://git.postgresql.org/pg/commitdiff/44e4bbf75d56e643b6afefd5cdcffccb68cce414</a></li>

<li>Make CLUSTER lock the old table's toast table before copying data. We must lock out autovacuuming of the old toast table before computing the OldestXmin horizon we will use. Otherwise, autovacuum could start on the toast table later, compute a later OldestXmin horizon, and remove as DEAD toast tuples that we still need (because we think their parent tuples are only RECENTLY_DEAD). Per further thought about bug #5998. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83b7584944b3a9df064cccac06822093f1a83793">http://git.postgresql.org/pg/commitdiff/83b7584944b3a9df064cccac06822093f1a83793</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>timeline is not needed in BaseBackup(). This code was accidentally part of the patch, it's only needed for the code that's for 9.2. Not needing the timeline also removes the need to call IDENTIFY_SYSTEM. Noted by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6693eb72c014e5e8bc2f7f3221ebd5507fdbe8ec">http://git.postgresql.org/pg/commitdiff/6693eb72c014e5e8bc2f7f3221ebd5507fdbe8ec</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>The arguments to pg_ctl kill are not optional - remove brackets in the docs. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39850c7fdb82bd7c64dbb759c5754e29fc0af5f2">http://git.postgresql.org/pg/commitdiff/39850c7fdb82bd7c64dbb759c5754e29fc0af5f2</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Bruce Momjian sent in a patch to correct the case of some status messages for Sync Rep.</li>

<li>Alvaro Herrera sent in a patch to the docs makefile to add HISTORY to the default build.</li>

<li>Merlin Moncure sent in a patch to fix a bug in tsearch/spell.c where ALLOC_CHUNK_LIMIT_RATIO could be too large, which would waste space in malloc'ed blocks.</li>

<li>Heikki Linnakangas sent in another revision of a patch to fix a memory leak in FDW.</li>

<li>Dan Ports sent in a patch to add comments about memory ordering in SSI.</li>

<li>Peter Eisentraut sent in a patch to add a pg_upgrade check.</li>

<li>Zoltan Boszormenyi sent in a WIP patch to enable cross-column statistics and extra expression statistics.</li>

<li>Noah Misch sent in another revision of the patch to fix an incompatibility between ALTER TYPE DROP where there is a composite-type column and pg_upgrade.</li>

<li>Gabriele Bartolini sent in a patch to smooth replication during VACUUM FULL.</li>

<li>Kevin Grittner sent in another revision of the patch to fix DDL with SSI.</li>

</ul>