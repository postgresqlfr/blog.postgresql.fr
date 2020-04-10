---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 janvier 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-01-23-nouvelles-hebdomadaires-de-postgresql-11-janvier-2015 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f1d7313aa8deb0529edbef4ac157561c37d4e2f">http://git.postgresql.org/pg/commitdiff/9f1d7313aa8deb0529edbef4ac157561c37d4e2f</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix oversight in recent pg_basebackup fix causing pg_receivexlog failures. A oversight in 2c0a485896 causes 'could not create archive status file "...": No such file or directory' errors in pg_receivexlog if the target directory doesn't happen to contain a arch aAS FM SM tatus directory. That's due to a stupidly left over 'true' constant instead of mark_done being passed down to ProcessXLogDataMsg(). The bug is only present in the master branch, and luckily wasn't released. Spotted by Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c9e4cdbf2ec876dbb71aa80a4cc18662fbd41c2">http://git.postgresql.org/pg/commitdiff/3c9e4cdbf2ec876dbb71aa80a4cc18662fbd41c2</a></li>

<li>Correctly handle relcache invalidation corner case during logical decoding. When using a historic snapshot for logical decoding it can validly happen that a relation that's in the relcache isn't visible to that historic snapshot. E.g. if a newly created relation is referenced in the query that uses the SQL interface for logical decoding and a sinval reset occurs. The earlier commit that fixed the error handling for that corner case already improves the situation as a ERROR is better than hitting an assertion... But it's obviously not good enough. So additionally allow that case without an error if a historic snapshot is set up - that won't allow an invalid entry to stay in the cache because it's a) already marked invalid and will thus be rebuilt during the next access b) the syscaches will be reset at the end of decoding. There might be prettier solutions to handle this case, but all that we could think of so far end up being much more complex than this quite simple fix. This fixes the assertion failures reported by the buildfarm (markhor, tick, leech) after the introduction of new regression tests in 89fd41b390a4. The failure there weren't actually directly caused by CLOBBER_CACHE_ALWAYS but the extraordinary long runtimes due to it lead to sinval resets triggering the behaviour. Discussion: 22459.1418656530@sss.pgh.pa.us Backpatch to 9.4 where logical decoding was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3fabed070530271771c2345dd7f60b0b28f0aae3">http://git.postgresql.org/pg/commitdiff/3fabed070530271771c2345dd7f60b0b28f0aae3</a></li>

<li>Improve relcache invalidation handling of currently invisible relations. The corner case where a relcache invalidation tried to rebuild the entry for a referenced relation but couldn't find it in the catalog wasn't correct. The code tried to RelationCacheDelete/RelationDestroyRelation the entry. That didn't work when assertions are enabled because the latter contains an assertion ensuring the refcount is zero. It's also more generally a bad idea, because by virtue of being referenced somebody might actually look at the entry, which is possible if the error is trapped and handled via a subtransaction abort. Instead just error out, without deleting the entry. As the entry is marked invalid, the worst that can happen is that the invalid (and at some point unused) entry lingers in the relcache. Discussion: 22459.1418656530@sss.pgh.pa.us There should be no way to hit this case &lt; 9.4 where logical decoding introduced a bug that can hit this. But since the code for handling the corner case is there it should do something halfway sane, so backpatch all the the way back. The logical decoding bug will be handled in a separate commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31912d01d8d860ffaafb386437d149e1749962ab">http://git.postgresql.org/pg/commitdiff/31912d01d8d860ffaafb386437d149e1749962ab</a></li>

<li>Remove comment that was intended to have been removed before commit. Noticed by Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f454144a34c2288418292ae7b01495724cfda359">http://git.postgresql.org/pg/commitdiff/f454144a34c2288418292ae7b01495724cfda359</a></li>

<li>Move comment about sun cc's __machine_rw_barrier being a full barrier. I'd accidentally written the comment besides the read barrier, instead of the full barrier, implementation. Noticed by Oskari Saarenmaa 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93be0950070b5bcb22600cb1cbb62f93c058a5dd">http://git.postgresql.org/pg/commitdiff/93be0950070b5bcb22600cb1cbb62f93c058a5dd</a></li>

<li>Fix logging of pages skipped due to pins during vacuum. The new logging introduced in 35192f06 made the incorrect assumption that scan_all vacuums would always wait for buffer pins; but they only do so if the page actually needs to be frozen. Fix that inaccuracy by removing the difference in log output based on scan_all and just always remove the same message. I chose to keep the split log message from the original commit for now, it seems likely that it'll be of use in the future. Also merge the line about buffer pins in autovacuum's log output into the existing "pages: ..." line. It seems odd to have a separate line about pins, without the "topic: " prefix others have. Also rename the new 'pinned_pages' variable to 'pinskipped_pages' because it actually tracks the number of pages that could *not* be pinned. Discussion: 20150104005324.GC9626@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17eaae9897781c6dcc622b9327899329e4d2a4df">http://git.postgresql.org/pg/commitdiff/17eaae9897781c6dcc622b9327899329e4d2a4df</a></li>

<li>Fix alignment of pg_atomic_uint64 variables on some 32bit platforms. I failed to recognize that pg_atomic_uint64 wasn't guaranteed to be 8 byte aligned on some 32bit platforms - which it has to be on some platforms to guarantee the desired atomicity and which we assert. As this is all compiler specific code anyway we can just rely on compiler specific tricks to enforce alignment. I've been unable to find concrete documentation about the version that introduce the sunpro alignment support, so that might need additional guards. I've verified that this works with gcc x86 32bit, but I don't have access to any other 32bit environment. Discussion: op.xpsjdkil0sbe7t@vld-kuci. Per report from Vladimir Kokovi&Auml;&Dagger;. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db4ec2ffce3549225619cae51d828224a11a165f">http://git.postgresql.org/pg/commitdiff/db4ec2ffce3549225619cae51d828224a11a165f</a></li>

<li>Provide a generic fallback for pg_compiler_barrier using an extern function. If the compiler/arch combination does not provide compiler barriers, provide a fallback. That fallback simply consists out of a function call into a externally defined function. That should guarantee compiler barrierer semantics except for compilers that do inter translation unit/global optimization - those better provide an actual compiler barrier. Hopefully this fixes Tom's report of linker failures due to pg_compiler_barrier_impl not being provided. I'm not backpatching this commit as it builds on the new atomics infrastructure. If we decide an equivalent fix needs to be backpatched, I'll do so in a separate commit. Discussion: 27746.1420930690@sss.pgh.pa.us. Per report from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de6429a8fdd3538e977b482d90389785d733e373">http://git.postgresql.org/pg/commitdiff/de6429a8fdd3538e977b482d90389785d733e373</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix broken pg_dump code for dumping comments on event triggers. This never worked, I think. Per report from Marc Munro. In passing, fix funny spacing in the COMMENT ON command as a result of excess space in the "label" string. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adfc157dd91471e995f3aa72e0fb5b50ecd93575">http://git.postgresql.org/pg/commitdiff/adfc157dd91471e995f3aa72e0fb5b50ecd93575</a></li>

<li>Fix libpq's behavior when /etc/passwd isn't readable. Some users run their applications in chroot environments that lack an /etc/passwd file. This means that the current UID's user name and home directory are not obtainable. libpq used to be all right with that, so long as the database role name to use was specified explicitly. But commit a4c8f14364c27508233f8a31ac4b10a4c90235a9 broke such cases by causing any failure of pg_fe_getauthname() to be treated as a hard error. In any case it did little to advance its nominal goal of causing errors in pg_fe_getauthname() to be reported better. So revert that and instead put some real error-reporting code in place. This requires changes to the APIs of pg_fe_getauthname() and pqGetpwuid(), since the latter had departed from the POSIX-specified API of getpwuid_r() in a way that made it impossible to distinguish actual lookup errors from "no such user". To allow such failures to be reported, while not failing if the caller supplies a role name, add a second call of pg_fe_getauthname() in connectOptions2(). This is a tad ugly, and could perhaps be avoided with some refactoring of PQsetdbLogin(), but I'll leave that idea for later. (Note that the complained-of misbehavior only occurs in PQsetdbLogin, not when using the PQconnect functions, because in the latter we will never bother to call pg_fe_getauthname() if the user gives a role name.) In passing also clean up the Windows-side usage of GetUserName(): the recommended buffer size is 257 bytes, the passed buffer length should be the buffer size not buffer size less 1, and any error is reported by GetLastError() not errno. Per report from Christoph Berg. Back-patch to 9.4 where the chroot failure case was introduced. The generally poor reporting of errors here is of very long standing, of course, but given the lack of field complaints about it we won't risk changing these APIs further back (even though they're theoretically internal to libpq). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/080eabe2e8a184ff40b7380aaaa9418714acace9">http://git.postgresql.org/pg/commitdiff/080eabe2e8a184ff40b7380aaaa9418714acace9</a></li>

<li>Remove configure test for nonstandard variants of getpwuid_r(). We had code that supposed that some platforms might offer a nonstandard version of getpwuid_r() with only four arguments. However, the 5-argument definition has been standardized at least since the Single Unix Spec v2, which is our normal reference for what's portable across all Unix-oid platforms. (What's more, this wasn't the only pre-standardization version of getpwuid_r(); my old HPUX 10.20 box has still another signature.) So let's just get rid of the now-useless configure step. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8883bae33b55a52105b1b58d0e42c5a6bda09627">http://git.postgresql.org/pg/commitdiff/8883bae33b55a52105b1b58d0e42c5a6bda09627</a></li>

<li>Fix portability breakage in pg_dump. Commit 0eea8047bf0e15b402b951e383e39236bdfe57d5 introduced some overly optimistic assumptions about what could be in a local struct variable's initializer. (This might in fact be valid code according to C99, but I've got at least one pre-C99 compiler that falls over on those nonconstant address expressions.) There is no reason whatsoever for main()'s workspace to not be static, so revert long_options[] to a static and make the DumpOptions struct static as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44096f1c6644a97c92da6c96dc1d8d4e200d4a38">http://git.postgresql.org/pg/commitdiff/44096f1c6644a97c92da6c96dc1d8d4e200d4a38</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update copyright for 2015. Backpatch certain files through 9.0 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4baaf863eca5412e07a8441b3b7e7482b7a8b21a">http://git.postgresql.org/pg/commitdiff/4baaf863eca5412e07a8441b3b7e7482b7a8b21a</a></li>

<li>Simplify post-copyright update instructions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/338c10b7f9157ac2fb6a785505f800f4fd919577">http://git.postgresql.org/pg/commitdiff/338c10b7f9157ac2fb6a785505f800f4fd919577</a></li>

<li>Clarify which files need manual copyright updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/29c18d919e3e45fcb0c40747636c3bc2c79253ae">http://git.postgresql.org/pg/commitdiff/29c18d919e3e45fcb0c40747636c3bc2c79253ae</a></li>

<li>Document that Perl's Tie might add a trailing newline. Report by Stefan Kaltenbrunner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb075178ec7f04545f43f455ae93e6c9ef6ef160">http://git.postgresql.org/pg/commitdiff/cb075178ec7f04545f43f455ae93e6c9ef6ef160</a></li>

<li>pg_upgrade: fix one-byte per empty db memory leak. Report by Tatsuo Ishii, Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac7009abd228362042edd10e6b12556ddef35171">http://git.postgresql.org/pg/commitdiff/ac7009abd228362042edd10e6b12556ddef35171</a></li>

<li>docs: improve CREATE TRIGGER defer options list. Report by Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62f5e447fd09074d82052a7232822d1e80d25a08">http://git.postgresql.org/pg/commitdiff/62f5e447fd09074d82052a7232822d1e80d25a08</a></li>

</ul>

<p>&Atilde;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in plpython error message 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91539c56986da740fd733765b06920cc73aaf33e">http://git.postgresql.org/pg/commitdiff/91539c56986da740fd733765b06920cc73aaf33e</a></li>

<li>xlogreader.c: Fix report_invalid_record translatability flag. For some reason I overlooked in GETTEXT_TRIGGERS that the right argument be read by gettext in 7fcbf6a405ffc12a4546a25b98592ee6733783fc. This will drop the translation percentages for the backend all the way back to 9.3 ... Problem reported by Heikki. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/045c68ad219047f42b3cf9ce0d0cda017979d16a">http://git.postgresql.org/pg/commitdiff/045c68ad219047f42b3cf9ce0d0cda017979d16a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix namespace handling in xpath function. Previously, the xml value resulting from an xpath query would not have namespace declarations if the namespace declarations were attached to an ancestor element in the input xml value. That means the output value was not correct XML. Fix that by running the result value through xmlCopyNode(), which produces the correct namespace declarations. Author: Ali Akbar &lt;the.apaan@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79af9a1d2668c9edc8171f03c39e7fed571eeb98">http://git.postgresql.org/pg/commitdiff/79af9a1d2668c9edc8171f03c39e7fed571eeb98</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't open a WAL segment for writing at end of recovery. Since commit ba94518a, we used XLogFileOpen to open the next segment for writing, but if the end-of-recovery happens exactly at a segment boundary, the new segment might not exist yet. (Before ba94518a, XLogFileOpen was correct, because we would open the previous segment if the switch happened at the boundary.) Instead of trying to create it if necessary, it's simpler to not bother opening the segment at all. XLogWrite() will open or create it soon anyway, after writing the checkpoint or end-of-recovery record. Reported by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e78d81e883d7987de8da559d985958335820cc8">http://git.postgresql.org/pg/commitdiff/1e78d81e883d7987de8da559d985958335820cc8</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>docs: Reword CREATE POLICY documentation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39f2594ba54657f3fa8d0fe230447e673bcba2a4">http://git.postgresql.org/pg/commitdiff/39f2594ba54657f3fa8d0fe230447e673bcba2a4</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>On Darwin, refuse postmaster startup when multithreaded. The previous commit introduced its report at LOG level to avoid surprises at minor release upgrade time. Compel users deploying the next major release to also deploy the reported workaround. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2048e5b88198213ae15c4b59ddbe124f1a5dc2b7">http://git.postgresql.org/pg/commitdiff/2048e5b88198213ae15c4b59ddbe124f1a5dc2b7</a></li>

<li>Always set the six locale category environment variables in main(). Typical server invocations already achieved that. Invalid locale settings in the initial postmaster environment interfered, as could malloc() failure. Setting "LC_MESSAGES=pt_BR.utf8 LC_ALL=invalid" in the postmaster environment will now choose C-locale messages, not Brazilian Portuguese messages. Most localized programs, including all PostgreSQL frontend executables, do likewise. Users are unlikely to observe changes involving locale categories other than LC_MESSAGES. CheckMyDatabase() ensures that we successfully set LC_COLLATE and LC_CTYPE; main() sets the remaining three categories to locale "C", which almost cannot fail. Back-patch to 9.0 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fdba8ceb071a3512d5685f1cd4f971ab4d562d1">http://git.postgresql.org/pg/commitdiff/6fdba8ceb071a3512d5685f1cd4f971ab4d562d1</a></li>

<li>Reject ANALYZE commands during VACUUM FULL or another ANALYZE. vacuum()'s static variable handling makes it non-reentrant; an ensuing null pointer deference crashed the backend. Back-patch to 9.0 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e415b469b33ba328765e39fd62edcd28f30d9c3c">http://git.postgresql.org/pg/commitdiff/e415b469b33ba328765e39fd62edcd28f30d9c3c</a></li>

<li>On Darwin, detect and report a multithreaded postmaster. Darwin --enable-nls builds use a substitute setlocale() that may start a thread. Buildfarm member orangutan experienced BackendList corruption on account of different postmaster threads executing signal handlers simultaneously. Furthermore, a multithreaded postmaster risks undefined behavior from sigprocmask() and fork(). Emit LOG messages about the problem and its workaround. Back-patch to 9.0 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/894459e59ffa5c7fee297b246c17e1f72564db1d">http://git.postgresql.org/pg/commitdiff/894459e59ffa5c7fee297b246c17e1f72564db1d</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move rowsecurity event trigger test. The event trigger test for rowsecurity can cause problems for other tests which are run in parallel with it. Instead of running that test in the rowsecurity set, move it to the event_trigger set, which runs isolated from other tests. Also reverts 7161b08, which moved rowsecurity into its own test group. That's no longer necessary, now that the event trigger test is gone from the rowsecurity set of tests. Pointed out by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c219cbfed339122303266a01150c4fb8dde73fd1">http://git.postgresql.org/pg/commitdiff/c219cbfed339122303266a01150c4fb8dde73fd1</a></li>

<li>Fix typo in execMain.c. Wee -&gt; We. Pointed out by Etsuro Fujita. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4fda14845c3215a15aa9aa0b844119d2c28c475">http://git.postgresql.org/pg/commitdiff/c4fda14845c3215a15aa9aa0b844119d2c28c475</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in a patch to complain about OOM of XLOG reader allocation in logical decoding code.</li>

<li>Andres Freund sent in a patch to improve handling of relcache invalidations to currently invisible relations.</li>

<li>Petr (PJMODOS) Jelinek sent in two revisions of a patch to fix handlign of event triggers in pg_dump.</li>

<li>Michael Paquier sent in a patch to add a restore_command_retry_interval to control retries of restore_command.</li>

<li>Fabien COELHO sent in two more revisions of a patch to add modulo (%) to pg_bench.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to track commit timestamps.</li>

<li>Atri Sharma sent in a patch to add functionality to specify ORDER BY in CREATE FUNCTION for SRFs.</li>

<li>Heikki Linnakangas sent in three more revisions of a patch to add pg_rewind.</li>

<li>Michael Paquier sent in two more revisions of a patch to add compression of full-page writes.</li>

<li>Kaigai Kouhei sent in another revision of a patch to add ctid scans as an example of the custom scan interface.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of a patch to add GROUPING SETS.</li>

<li>Andrew Dunstan sent in a patch to add min and max execute statement time in pg_stat_statement.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to bring XLOG_PARAMETER_CHANGE into line with the new handling of wal_log_hints.</li>

<li>Robert Haas sent in two more revisions of a patch to implement parallel mode and parallel contexts.</li>

<li>Peter Eisentraut sent in another revision of a patch to turn recovery.conf into GUCs.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom and foreign join interface.</li>

<li>Marius Timmer sent in another revision of a patch to add sort order to EXPLAIN output.</li>

<li>Tomas Vondra sent in another revision of a patch to do better memory accounting for memory-bounded hashaggs, another to do the aforementioned hashaggs, and a third to change hashcontext to aggcontext where needed.</li>

<li>Michael Paquier and Alexander Korotkov traded patches to add a fillfactor for GIN indexes.</li>

<li>Marco Nenciarini sent in a patch to implement a LSN map, one of whose outcomes will likely be incremental backup.</li>

<li>Craig Ringer sent in a patch to make server_version_num a GUC_REPORT.</li>

<li>Dean Rasheed sent in a patch to fix the documentation for CREATE POLICY.</li>

<li>Aaron Botsis sent in another revision of a patch to allow parsing JSON with embedded double quotes.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to implement TABLESAMPLE.</li>

<li>David Fetter sent in three more revisions of a patch to fix psql's mis-handling of connect string and URI parameters with \c[onnect].</li>

<li>Tomas Vondra and Ali Akbar traded patches to decrease the memory needed for array_agg().</li>

<li>David Rowley sent in another revision of a patch to allow removing INNER JOINs under some circumstances.</li>

<li>Amit Kapila sent in another revision of a patch to enable parallel sequential scans.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to allow asynchronous execution of postgres_fdw.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch set to do better CRCs, depending on availability.</li>

<li>Dean Rasheed sent in a patch to improve RLS qual pushdowns by checking whether leakage is significant in direct terms like row contents.</li>

<li>Bruce Momjian sent in a patch to make PQputCopyEnd adhere to its API contract.</li>

<li>Andres Freund sent in a flock of patches intended to fix an issue that originally manifested as inability to escape from a blocked send().</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT {UPDATE | IGNORE}.</li>

</ul>