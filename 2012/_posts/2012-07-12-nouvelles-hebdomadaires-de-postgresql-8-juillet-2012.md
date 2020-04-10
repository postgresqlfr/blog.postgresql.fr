---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 juillet 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-07-12-nouvelles-hebdomadaires-de-postgresql-8-juillet-2012 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Validate xlog record header before enlarging the work area to store it. If the record header is garbled, we're now quite likely to notice it before we try to make a bogus memory allocation and run out of memory. That can still happen, if the xlog record is split across pages (we cannot verify the record header until reading the next page in that scenario), but this reduces the chances. An out-of-memory is treated as a corrupt record anyway, so this isn't a correctness issue, just a case of giving a better error message. Per Amit Kapila's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/567787f216da750b3805aea6fd8aef19e8b882a1">http://git.postgresql.org/pg/commitdiff/567787f216da750b3805aea6fd8aef19e8b882a1</a></li>

<li>Fix mapping of PostgreSQL encodings to Python encodings. Windows encodings, "win1252" and so forth, are named differently in Python, like "cp1252". Also, if the PyUnicode_AsEncodedString() function call fails for some reason, use a plain ereport(), not a PLy_elog(), to report that error. That avoids recursion and crash, if PLy_elog() tries to call PLyUnicode_Bytes() again. This fixes bug reported by Asif Naeem. Backpatch down to 9.0, before that plpython didn't even try these conversions. Jan Urba&#324;ski, with minor comment improvements by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b66de4c6d7208d9ec420b912758377a3533c7a7d">http://git.postgresql.org/pg/commitdiff/b66de4c6d7208d9ec420b912758377a3533c7a7d</a></li>

<li>Revert part of the previous patch that avoided using PLy_elog(). That caused the plpython_unicode regression test to fail on SQL_ASCII encoding, as evidenced by the buildfarm. The reason is that with the patch, you don't get the detail in the error message that you got before. That detail is actually very informative, so rather than just adjust the expected output, let's revert that part of the patch for now to make the buildfarm green again, and figure out some other way to avoid the recursion of PLy_elog() that doesn't lose the detail. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de479e2ed28925ddd2907cad3e2d5dddd3b97199">http://git.postgresql.org/pg/commitdiff/de479e2ed28925ddd2907cad3e2d5dddd3b97199</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove misleading hints about reducing the System V request size. Since the request size will now be ~48 bytes regardless of how shared_buffers et. al. are set, much of this advice is no longer relevant. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a77bff086b9bba94ab6cd6229a74f44d3ec266d">http://git.postgresql.org/pg/commitdiff/6a77bff086b9bba94ab6cd6229a74f44d3ec266d</a></li>

<li>Make oid2name, pgbench, and vacuumlo set fallback_application_name. Amit Kapila, reviewed by Shigeru Hanada and Peter Eisentraut, with some modifications by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17676c785a95b2598c5735c0025f7dc7727a96bc">http://git.postgresql.org/pg/commitdiff/17676c785a95b2598c5735c0025f7dc7727a96bc</a></li>

<li>Increase the maximum initdb-configured value for shared_buffers to 128MB. The old value of 32MB has been around for a very long time, and in the meantime typical system memories have become vastly larger. Also, now that we no longer depend on being able to fit the entirety of our shared memory segment into the system's limit on System V shared memory, there's a much better chance of the higher limit actually proving productive. Per recent discussion on pgsql-hackers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f358428280953643313ee7756e0a8b8ccfde7660">http://git.postgresql.org/pg/commitdiff/f358428280953643313ee7756e0a8b8ccfde7660</a></li>

<li>Documentation cleanups for recent shared memory changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/390bfc643de4faf6df8cb40e71b17791ce61a71e">http://git.postgresql.org/pg/commitdiff/390bfc643de4faf6df8cb40e71b17791ce61a71e</a></li>

<li>More doc cleanups for recent shared memory changes. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/248b5fce0643c5662c60ac7f8bfe4d68b7e96bb4">http://git.postgresql.org/pg/commitdiff/248b5fce0643c5662c60ac7f8bfe4d68b7e96bb4</a></li>

<li>Add wchar -&gt; mb conversion routines. This is infrastructure for Alexander Korotkov's work on indexing regular expression searches. Alexander Korotkov, with a bit of further hackery on the MULE conversion by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72dd6291f216440f6bb61a8733729a37c7e3b2d2">http://git.postgresql.org/pg/commitdiff/72dd6291f216440f6bb61a8733729a37c7e3b2d2</a></li>

<li>Fix sample INSTR function to return 0 if third arg is 0. Laurenz Albe, per a report by Greg Smith that our sample function doesn't quite match Oracle's behavior. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fc32c00d74404a9a535e0e1b8d9437dfd8075db">http://git.postgresql.org/pg/commitdiff/0fc32c00d74404a9a535e0e1b8d9437dfd8075db</a></li>

<li>Reduce messages about implicit indexes and sequences to DEBUG1. Per recent discussion on pgsql-hackers, these messages are too chatty for most users. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d7c734841b3e6cb44de363a8a3d83c35b75b30d9">http://git.postgresql.org/pg/commitdiff/d7c734841b3e6cb44de363a8a3d83c35b75b30d9</a></li>

<li>Fix failure of new wchar-&gt;mb functions to advance from pointer. Bug spotted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6a05fd973a102f7e66c491d3f854864b8d24844">http://git.postgresql.org/pg/commitdiff/f6a05fd973a102f7e66c491d3f854864b8d24844</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Have copyright tool mention that certain files should be updated in back branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b33385b89d30ad3daa63b398e56a5e3822fd59c6">http://git.postgresql.org/pg/commitdiff/b33385b89d30ad3daa63b398e56a5e3822fd59c6</a></li>

<li>Have pg_dump in binary-upgrade mode properly drop user-created extensions that might exist in the new empty cluster databases, like plpgsql. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e00d332615be32d64bbb1f604a783fade3146c0">http://git.postgresql.org/pg/commitdiff/3e00d332615be32d64bbb1f604a783fade3146c0</a></li>

<li>Run newly-configured perltidy script on Perl files. Run on HEAD and 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/042d9ffc282a8c796d2a5babc600c1a6db150dac">http://git.postgresql.org/pg/commitdiff/042d9ffc282a8c796d2a5babc600c1a6db150dac</a></li>

<li>Fix missing regex slash that caused perltidy to get confused on copyright.pl. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/539d38757a4709b5039ed4318567349da06f0690">http://git.postgresql.org/pg/commitdiff/539d38757a4709b5039ed4318567349da06f0690</a></li>

<li>Fix PGDATAOLD and PGDATANEW to properly set pgconfig location, per report from Tom Lane. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2eeb5eb23fa9ad1a2d636bbf2fd68e6709848d23">http://git.postgresql.org/pg/commitdiff/2eeb5eb23fa9ad1a2d636bbf2fd68e6709848d23</a></li>

<li>Update pg_upgrade comments for recent configpath fix. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c742d1dbe759f4c1e3304e5fbca88e061f64978f">http://git.postgresql.org/pg/commitdiff/c742d1dbe759f4c1e3304e5fbca88e061f64978f</a></li>

<li>Fix spacing in copyright.pl after being run with missing regex slash (now added). Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9eb808bf2e5f0ab5cfd1dc7410f3c457a18f6d1">http://git.postgresql.org/pg/commitdiff/b9eb808bf2e5f0ab5cfd1dc7410f3c457a18f6d1</a></li>

<li>Fix copyright.pl to properly skip the .git directory by adding a basename() qualification. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5198ae89924db730d7d3ec3ab7b14c17a22c7f82">http://git.postgresql.org/pg/commitdiff/5198ae89924db730d7d3ec3ab7b14c17a22c7f82</a></li>

<li>Modify copyright.pl so all lines are processed, not just the first match, so files that contain embedded copyrights are updated, e.g. pgsql/help.c. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95203e0833664a1cb221e4f3ad766d167db893b8">http://git.postgresql.org/pg/commitdiff/95203e0833664a1cb221e4f3ad766d167db893b8</a></li>

<li>Have copyright.pl skip updating something that is just the current year, to avoid producing dups, e.g. 2012-2012 Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d17c0135cdf6e478a29080f563da3d65cb441291">http://git.postgresql.org/pg/commitdiff/d17c0135cdf6e478a29080f563da3d65cb441291</a></li>

<li>Run updated copyright.pl on HEAD and 9.2 trees, updating the psql \copyright output to 2012. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c9b406420760a8da4de8d0e2b6336f15caf3c9c">http://git.postgresql.org/pg/commitdiff/3c9b406420760a8da4de8d0e2b6336f15caf3c9c</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Have REASSIGN OWNED work on extensions, too. Per bug #6593, REASSIGN OWNED fails when the affected role has created an extension. Even though the user related to the extension is not nominally the owner, its OID appears on pg_shdepend and thus causes problems when the user is to be dropped. This commit adds code to change the "ownership" of the extension itself, not of the contained objects. This is fine because it's currently only called from REASSIGN OWNED, which would also modify the ownership of the contained objects. However, this is not sufficient for a working ALTER OWNER implementation extension. Back-patch to 9.1, where extensions were introduced. Bug #6593 reported by Emiliano Leporati. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c7b9dc7d037c4465227dc2300ff48019feeba37">http://git.postgresql.org/pg/commitdiff/0c7b9dc7d037c4465227dc2300ff48019feeba37</a></li>

<li>Forgot an #include in the previous patch :-( 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/47a2adc83c492aed92b6754fe40b485b9fe5929e">http://git.postgresql.org/pg/commitdiff/47a2adc83c492aed92b6754fe40b485b9fe5929e</a></li>

<li>pg_upgrade: abstract out copying of files from old cluster to new. Currently only pg_clog is copied, but some other directories could need the same treatment as well, so create a subroutine to do it. Extracted from my (somewhat larger) FOR KEY SHARE patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/666d494d19dbd5dc7a177709a2f7069913f8ab89">http://git.postgresql.org/pg/commitdiff/666d494d19dbd5dc7a177709a2f7069913f8ab89</a></li>

<li>Convert libpq regress script to Perl. This should ease its use on the Windows build environment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a184e4db83c80d28103774ced984c7790fbd44ba">http://git.postgresql.org/pg/commitdiff/a184e4db83c80d28103774ced984c7790fbd44ba</a></li>

<li>Update libpq test expected output. Commit 2b443063 changed wording for some of the error messages, but neglected updating the regress output to match. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adb9b7d53be5a3a0cae8b7a71c28a3e8c7628769">http://git.postgresql.org/pg/commitdiff/adb9b7d53be5a3a0cae8b7a71c28a3e8c7628769</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve documentation about MULE encoding. This commit improves the comments in pg_wchar.h and creates #define symbols for some formerly hard-coded values. No substantive code changes. Tatsuo Ishii and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09022de1f55708bcfe8b2bf206d818055c34d49e">http://git.postgresql.org/pg/commitdiff/09022de1f55708bcfe8b2bf206d818055c34d49e</a></li>

<li>Remove support for using wait3() in place of waitpid(). All Unix-oid platforms that we currently support should have waitpid(), since it's in V2 of the Single Unix Spec. Our git history shows that the wait3 code was added to support NextStep, which we officially dropped support for as of 9.2. So get rid of the configure test, and simplify the macro spaghetti in reaper(). Per suggestion from Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc548b2296df3fe039bf68e196bfd883338e0faa">http://git.postgresql.org/pg/commitdiff/fc548b2296df3fe039bf68e196bfd883338e0faa</a></li>

<li>Don't try to trim "../" in join_path_components(). join_path_components() tried to remove leading ".." components from its tail argument, but it was not nearly bright enough to do so correctly unless the head argument was (a) absolute and (b) canonicalized. Rather than try to fix that logic, let's just get rid of it: there is no correctness reason to remove "..", and cosmetic concerns can be taken care of by a subsequent canonicalize_path() call. Per bug #6715 from Greg Davidson. Back-patch to all supported branches. It appears that pre-9.2, this function is only used with absolute paths as head arguments, which is why we'd not noticed the breakage before. However, third-party code might be expecting this function to work in more general cases, so it seems wise to back-patch. In HEAD and 9.2, also make some minor cosmetic improvements to callers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85254199478bcf49d0ac83fdf22d6bcf35ceccb1">http://git.postgresql.org/pg/commitdiff/85254199478bcf49d0ac83fdf22d6bcf35ceccb1</a></li>

<li>Simplify and document regex library's compact-NFA representation. The previous coding abused the first element of a cNFA state's arcs list to hold a per-state flag bit, which was confusing, undocumented, and not even particularly efficient. Get rid of that in favor of a separate "stflags" vector. Since there's only one bit in use, I chose to allocate a char per state; we could possibly replace this with a bitmap at some point, but that would make accesses a little slower. It's already about 8X smaller than before, so let's not get overly tense. Also document the representation better than it was before, which is to say not at all. This patch is a byproduct of investigations towards extracting a "fixed prefix" string from the compact-NFA representation of regex patterns. Might need to back-patch it if we decide to back-patch that fix, but for now it's just code cleanup so I'll just put it in HEAD. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6aae3042be5249e672b731ebeb21875b5343010">http://git.postgresql.org/pg/commitdiff/c6aae3042be5249e672b731ebeb21875b5343010</a></li>

<li>Fix planner to pass correct collation to operator selectivity estimators. We can do this without creating an API break for estimation functions by passing the collation using the existing fmgr functionality for passing an input collation as a hidden parameter. The need for this was foreseen at the outset, but we didn't get around to making it happen in 9.1 because of the decision to sort all pg_statistic histograms according to the database's default collation. That meant that selectivity estimators generally need to use the default collation too, even if they're estimating for an operator that will do something different. The reason it's suddenly become more interesting is that regexp interpretation also uses a collation (for its LC_TYPE not LC_COLLATE property), and we no longer want to use the wrong collation when examining regexps during planning. It's not that the selectivity estimate is likely to change much from this; rather that we are thinking of caching compiled regexps during planner estimation, and we won't get the intended benefit if we cache them with a different collation than the executor will use. Back-patch to 9.1, both because the regexp change is likely to get back-patched and because we might as well get this right in all collation-supporting branches, in case any third-party code wants to rely on getting the collation. The patch turns out to be minuscule now that I've done it ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7ef6d7e248cd39b8a4a7630776ec3924feeafa6">http://git.postgresql.org/pg/commitdiff/e7ef6d7e248cd39b8a4a7630776ec3924feeafa6</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove references to PostgreSQL bundled on Solaris. Also remove special references to downloads off pgfoundry since they are not correct - downloads are done through the main website. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d80785e6ed872acfc4ec156e540e16db878a81d3">http://git.postgresql.org/pg/commitdiff/d80785e6ed872acfc4ec156e540e16db878a81d3</a></li>

<li>Remove references to pgfoundry as recommended hosting platform. pgfoundry is deprectaed and no longer accepting new projects, so we really shouldn't be directing people there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51fc406819a06799e77ecfa751557318e16e4677">http://git.postgresql.org/pg/commitdiff/51fc406819a06799e77ecfa751557318e16e4677</a></li>

<li>Remove reference to default wal_buffers being 8. This hasn't been true since 9.1, when the default was changed to -1. Remove the reference completely, keeping the discussion of the parameter and it's shared memory effects on the config page. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/817d870cf990698cbc6672068e6af5405c2ae7a4">http://git.postgresql.org/pg/commitdiff/817d870cf990698cbc6672068e6af5405c2ae7a4</a></li>

<li>Always treat a standby returning an an invalid flush location as async. This ensures that a standby such as pg_receivexlog will not be selected as sync standby - which would cause the master to block waiting for a location that could never happen. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c4b468692804a232e324962d968e61c1837a13a">http://git.postgresql.org/pg/commitdiff/0c4b468692804a232e324962d968e61c1837a13a</a></li>

<li>Set the write location in the pg_receivexlog status messages. This makes it possible for the master to track how much data has actually been written my pg_receivexlog - and not just how much has been sent towards it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dbc6fcf35d4fa95ea2fd4d7bbd9e56be560c1ef9">http://git.postgresql.org/pg/commitdiff/dbc6fcf35d4fa95ea2fd4d7bbd9e56be560c1ef9</a></li>

<li>Remove duplicate, unnecessary, variable declaration 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10e0dd8f91364635b73103c5e207b48b811da5b5">http://git.postgresql.org/pg/commitdiff/10e0dd8f91364635b73103c5e207b48b811da5b5</a></li>

<li>Fix function argument tab completion for schema-qualified or quoted function names. Dean Rasheed, reviewed by Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3644a63984cbdba2c78c22fd9a0cdb0f4701b600">http://git.postgresql.org/pg/commitdiff/3644a63984cbdba2c78c22fd9a0cdb0f4701b600</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alvaro Herrera and Zoltan Boszormenyi traded patches for the timeout framework and lock_timeout, which depends on same.</li>

<li>Kyotaro HORIGUCHI sent in two different revisions of a patch to fix an infelicity in PL/Perl's handling of UTF-8 in SQL_ASCII-encoded databases.</li>

<li>Hans-Juergen Schoenig sent in a rebased patch to add Bloom filters.</li>

<li>Dimitri Fontaine and Robert Haas exchanged a flurry of patches implementing event triggers.</li>

<li>Joel Jacobson sent in three revisions of a patch to output overloaded functions in deterministic order in pg_dump.</li>

<li>Pavel Stehule and Peter Geoghegan traded patches to enhance error fields.</li>

<li>Alvaro Herrera sent in another revision of the patch to implement foreign key locks.</li>

<li>Fujii Masao sent in a patch which removes support for using wait3() in place of waitpid(). No currently used system needs it.</li>

<li>Peter Eisentraut sent in another revision of the patch to implement TRANSFORMs.</li>

<li>Pavel Stehule sent in two more revisions of the code to allow using parameters in PL/pgsql DO blocks.</li>

<li>Satoshi Nagayasu sent in two revisions of a patch to add functions to get and reset statistics of WAL buffer writes (flushes) caused by the WAL buffer's becoming full.</li>

<li>Tom Lane sent in a patch to fix the issues in regex_fixed_prefix() by compiling the regex using the regex library and then looking at the compiled NFA representation to see if there must be a fixed prefix.</li>

</ul>