---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 avril 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-04-11-nouvelles-hebdomadaires-de-postgresql-6-avril-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rename GinLogicValue to GinTernaryValue. It's more descriptive. Also, get rid of the enum, and use #defines instead, per Greg Stark's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0cfa34c25a7c8e7017cac346d954016fad0dfc16">http://git.postgresql.org/pg/commitdiff/0cfa34c25a7c8e7017cac346d954016fad0dfc16</a></li>

<li>Rewrite the way GIN posting lists are packed on a page, to reduce WAL volume. Inserting (in retail) into the new 9.4 format GIN posting tree created much larger WAL records than in 9.3. The previous strategy to WAL logging was basically to log the whole page on each change, with the exception of completely unmodified segments up to the first modified one. That was not too bad when appending to the end of the page, as only the last segment had to be WAL-logged, but per Fujii Masao's testing, even that produced 2x the WAL volume that 9.3 did. The new strategy is to keep track of changes to the posting lists in a more fine-grained fashion, and also make the repacking" code smarter to avoid decoding and re-encoding segments unnecessarily. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14d02f0bb352d70d50106e153aca4af9c4b0b842">http://git.postgresql.org/pg/commitdiff/14d02f0bb352d70d50106e153aca4af9c4b0b842</a></li>

<li>Fix typo in comment. Amit Langote 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/554bb3beba27bf4a49edecc40f6c0f249974bc7c">http://git.postgresql.org/pg/commitdiff/554bb3beba27bf4a49edecc40f6c0f249974bc7c</a></li>

<li>Move SizeOfHeapNewCid next to xl_heap_new_cid struct. They belong together, but the xl_heap_rewrite_mapping struct was wedged in between. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7534296b484fa73b064c87cc3a5062ba3803f3b">http://git.postgresql.org/pg/commitdiff/f7534296b484fa73b064c87cc3a5062ba3803f3b</a></li>

<li>Fix bug in the new B-tree incomplete-split code. Inserting a downlink to an internal page clears the incomplete-split flag of the child's left sibling, so the left sibling's LSN also needs to be updated. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/954523cdfe229f1cb99a43a19e291a557ae2822d">http://git.postgresql.org/pg/commitdiff/954523cdfe229f1cb99a43a19e291a557ae2822d</a></li>

<li>Remove dead check for backup block, replace with Assert. We don't use backup blocks with GIN vacuum records anymore, the page is always recreated from scratch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfe992e7eb24fa92f93ee9d31f1f0f515a49c11d">http://git.postgresql.org/pg/commitdiff/cfe992e7eb24fa92f93ee9d31f1f0f515a49c11d</a></li>

<li>Fix bug in the new GIN incomplete-split code. Inserting a downlink to an internal page clears the incomplete-split flag of the child's left sibling, so the left sibling's LSN also needs to be updated and it needs to be marked dirty. The codepath for an insertion got this right, but the case where the internal node is split because of inserting the new downlink missed that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8bbbcb91bae1489471d11fef269533bc4df2f766">http://git.postgresql.org/pg/commitdiff/8bbbcb91bae1489471d11fef269533bc4df2f766</a></li>

<li>Avoid palloc in critical section in GiST WAL-logging. Memory allocation can fail if you run out of memory, and inside a critical section that will lead to a PANIC. Use conservatively-sized arrays in stack instead. There was previously no explicit limit on the number of pages a GiST split can produce, it was only limited by the number of LWLocks that can be held simultaneously (100 at the moment). This patch adds an explicit limit of 75 pages. That should be plenty, a typical split shouldn't produce more than 2-3 page halves. The bug has been there forever, but only backpatch down to 9.1. The code was changed significantly in 9.1, and it doesn't seem worth the risk or trouble to adapt this for 9.0 and 8.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/04e298b826d452ceb838d9fda884a29f229d484d">http://git.postgresql.org/pg/commitdiff/04e298b826d452ceb838d9fda884a29f229d484d</a></li>

<li>Avoid allocations in critical sections. If a palloc in a critical section fails, it becomes a PANIC. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/877b088785b178c50e7976d86c82dfafa4031792">http://git.postgresql.org/pg/commitdiff/877b088785b178c50e7976d86c82dfafa4031792</a></li>

<li>Add an Assertion that you don't palloc within a critical section. This caught a bunch of cases doing that already, which I just fixed in previous commit. This is the assertion itself. Per Tom Lane's idea. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a170ee9e0ebd7021cb1190fabd5b0cbe2effb8e">http://git.postgresql.org/pg/commitdiff/4a170ee9e0ebd7021cb1190fabd5b0cbe2effb8e</a></li>

<li>In checkpoint, move the check for in-progress xacts out of critical section. GetVirtualXIDsDelayingChkpt calls palloc, which isn't safe in a critical section. I thought I covered this case with the exemption for the checkpointer, but CreateCheckPoint is also called from the startup process. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9e7873bbbdee76a49e76ddaa49787cab112bb2e">http://git.postgresql.org/pg/commitdiff/d9e7873bbbdee76a49e76ddaa49787cab112bb2e</a></li>

<li>Move multixid allocation out of critical section. It can fail if you run out of memory. This call was added in 9.3, so backpatch to 9.3 only. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1236f4b7ba2c05542f44d07c0a9ffbec3b66295">http://git.postgresql.org/pg/commitdiff/b1236f4b7ba2c05542f44d07c0a9ffbec3b66295</a></li>

<li>Fix another palloc in critical section. Also add a regression test for a GIN index with enough items with the same key, so that a GIN posting tree gets created. Apparently none of the existing GIN tests were large enough for that. This code is new, no backpatching required. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffbba6ee1244901b492fe268ea94f72e35aedf38">http://git.postgresql.org/pg/commitdiff/ffbba6ee1244901b492fe268ea94f72e35aedf38</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in logical decoding code. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f0e4be453ffd27b5f5e6c115172091abda3a38f">http://git.postgresql.org/pg/commitdiff/3f0e4be453ffd27b5f5e6c115172091abda3a38f</a></li>

<li>Count buffers dirtied due to hints in pgBufferUsage.shared_blks_dirtied. Previously, such buffers weren't counted, with the possible result that EXPLAIN (BUFFERS) and pg_stat_statements would understate the true number of blocks dirtied by an SQL statement. Back-patch to 9.2, where this counter was introduced. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/066254cea117a5a40d21401f754c83cc163378ae">http://git.postgresql.org/pg/commitdiff/066254cea117a5a40d21401f754c83cc163378ae</a></li>

<li>test_decoding: Update .gitignore. Commit 7317d8d961f210c3a6b20972cd605bcd9bffb06e changed the set of things that need to be ignored, but neglected to update .gitignore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f95b723eb207ca8fe2a0391b444db23b386617b">http://git.postgresql.org/pg/commitdiff/0f95b723eb207ca8fe2a0391b444db23b386617b</a></li>

<li>Mark FastPathStrongRelationLocks volatile. Otherwise, the compiler might decide to move modifications to data within this structure outside the enclosing SpinLockAcquire / SpinLockRelease pair, leading to shared memory corruption. This may or may not explain a recent lmgr-related buildfarm failure on prairiedog, but it needs to be fixed either way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bc15a8bfbc7856bc3426dc9ab99567eebbb64d3">http://git.postgresql.org/pg/commitdiff/4bc15a8bfbc7856bc3426dc9ab99567eebbb64d3</a></li>

<li>Fix some compiler warnings that clang emits with -pedantic. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59202fae0434c98beb4994c5fe4df354a6af31e6">http://git.postgresql.org/pg/commitdiff/59202fae0434c98beb4994c5fe4df354a6af31e6</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Doc: improve discussion of reverse+forward host name lookup in pg_hba.conf. Fix some grammatical issues and make it a bit more readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6eff0accfe6b6170d10b91df769ea523b50927b8">http://git.postgresql.org/pg/commitdiff/6eff0accfe6b6170d10b91df769ea523b50927b8</a></li>

<li>Fix bugs in manipulation of PgBackendStatus.st_clienthostname. Initialization of this field was not being done according to the st_changecount protocol (it has to be done within the changecount increment range, not outside). And the test to see if the value should be reported as null was wrong. Noted while perusing uses of Port.remote_hostname. This was wrong from the introduction of this code (commit 4a25bc145), so back-patch to 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/682c5bbec5d9533d2d654d6a096c36bbae9f5bd0">http://git.postgresql.org/pg/commitdiff/682c5bbec5d9533d2d654d6a096c36bbae9f5bd0</a></li>

<li>De-anonymize the union in JsonbValue. Needed for strict C89 compliance. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f33a71a7865a1dd54f04b370e2637f88665f8db8">http://git.postgresql.org/pg/commitdiff/f33a71a7865a1dd54f04b370e2637f88665f8db8</a></li>

<li>Fix assorted issues in client host name lookup. The code for matching clients to pg_hba.conf lines that specify host names (instead of IP address ranges) failed to complain if reverse DNS lookup failed; instead it silently didn't match, so that you might end up getting a surprising "no pg_hba.conf entry for ..." error, as seen in bug #9518 from Mike Blackwell. Since we don't want to make this a fatal error in situations where pg_hba.conf contains a mixture of host names and IP addresses (clients matching one of the numeric entries should not have to have rDNS data), remember the lookup failure and mention it as DETAIL if we get to "no pg_hba.conf entry". Apply the same approach to forward-DNS lookup failures, too, rather than treating them as immediate hard errors. Along the way, fix a couple of bugs that prevented us from detecting an rDNS lookup error reliably, and make sure that we make only one rDNS lookup attempt; formerly, if the lookup attempt failed, the code would try again for each host name entry in pg_hba.conf. Since more or less the whole point of this design is to ensure there's only one lookup attempt not one per entry, the latter point represents a performance bug that seems sufficient justification for back-patching. Also, adjust src/port/getaddrinfo.c so that it plays as well as it can with this code. Which is not all that well, since it does not have actual support for rDNS lookup, but at least it should return the expected (and required by spec) error codes so that the main code correctly perceives the lack of functionality as a lookup failure. It's unlikely that PG is still being used in production on any machines that require our getaddrinfo.c, so I'm not excited about working harder than this. To keep the code in the various branches similar, this includes back-patching commits c424d0d1052cb4053c8712ac44123f9b9a9aa3f2 and 1997f34db4687e671690ed054c8f30bb501b1168 into 9.2 and earlier. Back-patch to 9.1 where the facility for hostnames in pg_hba.conf was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc752505a99a4e2c781a070d3d42a25289c22e3c">http://git.postgresql.org/pg/commitdiff/fc752505a99a4e2c781a070d3d42a25289c22e3c</a></li>

<li>Avoid promising that "ADD COLUMN ... DEFAULT NULL" is free. The system realizes that DEFAULT NULL is dummy in simple cases, but not if a cast function (such as a length coercion) needs to be applied. It's dubious that suppressing that function call would be appropriate, anyway. For the moment, let's just adjust the docs to say that you should omit the DEFAULT clause if you don't want a rewrite to happen. Per gripe from Amit Langote. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/879808e5197c374e431e81fb5599dfea533bb9aa">http://git.postgresql.org/pg/commitdiff/879808e5197c374e431e81fb5599dfea533bb9aa</a></li>

<li>Fix documentation about joining pg_locks to other views. The advice to join to pg_prepared_xacts via the transaction column was not updated when the transaction column was replaced by virtualtransaction. Since it's not quite obvious how to do that join, give an explicit example. For consistency also give an example for the adjacent case of joining to pg_stat_activity. And link-ify the view references too, just because we can. Per bug #9840 from Alexey Bashtanov. Michael Paquier and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42c6236f37988b4cb067f3fc908b247e70177496">http://git.postgresql.org/pg/commitdiff/42c6236f37988b4cb067f3fc908b247e70177496</a></li>

<li>Code review for commit d26888bc4d1e539a82f21382b0000fe5bbf889d9. Mostly, copy-edit the comments; but also fix it to not reject domains over arrays. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/741364bf5caeeae79b83bbdba778805d286622ba">http://git.postgresql.org/pg/commitdiff/741364bf5caeeae79b83bbdba778805d286622ba</a></li>

<li>Fix non-equivalence of VARIADIC and non-VARIADIC function call formats. For variadic functions (other than VARIADIC ANY), the syntaxes foo(x,y,...) and foo(VARIADIC ARRAY[x,y,...]) should be considered equivalent, since the former is converted to the latter at parse time. They have indeed been equivalent, in all releases before 9.3. However, commit 75b39e790 made an ill-considered decision to record which syntax had been used in FuncExpr nodes, and then to make equal() test that in checking node equality --- which caused the syntaxes to not be seen as equivalent by the planner. This is the underlying cause of bug #9817 from Dmitry Ryabov. It might seem that a quick fix would be to make equal() disregard FuncExpr.funcvariadic, but the same commit made that untenable, because the field actually *is* semantically significant for some VARIADIC ANY functions. This patch instead adopts the approach of redefining funcvariadic (and aggvariadic, in HEAD) as meaning that the last argument is a variadic array, whether it got that way by parser intervention or was supplied explicitly by the user. Therefore the value will always be true for non-ANY variadic functions, restoring the principle of equivalence. (However, the planner will continue to consider use of VARIADIC as a meaningful difference for VARIADIC ANY functions, even though some such functions might disregard it.) In HEAD, this change lets us simplify the decompilation logic in ruleutils.c, since the funcvariadic/aggvariadic flag tells directly whether to print VARIADIC. However, in 9.3 we have to continue to cope with existing stored rules/views that might contain the previous definition. Fortunately, this just means no change in ruleutils.c, since its existing behavior effectively ignores funcvariadic for all cases other than VARIADIC ANY functions. In HEAD, bump catversion to reflect the fact that FuncExpr.funcvariadic changed meanings; this is sort of pro forma, since I don't believe any built-in views are affected. Unfortunately, this patch doesn't magically fix everything for affected 9.3 users. After installing 9.3.5, they might need to recreate their rules/views/indexes containing variadic function calls in order to get everything consistent with the new definition. As in the cited bug, the symptom of a problem would be failure to use a nominally matching index that has a variadic function call in its definition. We'll need to mention this in the 9.3.5 release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c7b353959931ae8e95177fe0a138b8119db9b802">http://git.postgresql.org/pg/commitdiff/c7b353959931ae8e95177fe0a138b8119db9b802</a></li>

<li>Fix bogus time printout in walreceiver's debug log messages. The displayed sendtime and receipttime were always exactly equal, because somebody forgot that timestamptz_to_str returns a static buffer (thereby simplifying life for most callers, at the cost of complicating it for those who need two results concurrently). Apply the same pstrdup solution used by the other call sites with this issue. Back-patch to 9.2 where the faulty code was introduced. Per bug #9849 from Haruka Takatsuka, though this is not exactly his patch. Possibly we should change timestamptz_to_str's API, but I wouldn't want to do so in the back branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8120c7452a51a773ad7a249b55557439f39d41ef">http://git.postgresql.org/pg/commitdiff/8120c7452a51a773ad7a249b55557439f39d41ef</a></li>

<li>Make sure -D is an absolute path when starting server on Windows. This is needed because Windows services may get started with a different current directory than where pg_ctl is executed. We want relative -D paths to be interpreted relative to pg_ctl's CWD, similarly to what happens on other platforms. In support of this, move the backend's make_absolute_path() function into src/port/path.c (where it probably should have been long since) and get rid of the rather inferior version in pg_regress. Kumar Rajeev Rastogi, reviewed by MauMau 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9aca51250681d2e8d18ed1d73e7cd1283d1cf303">http://git.postgresql.org/pg/commitdiff/9aca51250681d2e8d18ed1d73e7cd1283d1cf303</a></li>

<li>Preserve errno across free(). Dept. of second thoughts: free() isn't guaranteed not to change errno. Make sure we report the right error if getcwd() fails. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2209c0f8618bbed257975055e017efab139e3fa3">http://git.postgresql.org/pg/commitdiff/2209c0f8618bbed257975055e017efab139e3fa3</a></li>

<li>Allow "-C variable" and "--describe-config" even to root users. There's no really compelling reason to refuse to do these read-only, non-server-starting options as root, and there's at least one good reason to allow -C: pg_ctl uses -C to find out the true data directory location when pointed at a config-only directory. On Windows, this is done before dropping administrator privileges, which means that pg_ctl fails for administrators if and only if a config-only layout is used. Since the root-privilege check is done so early in startup, it's a bit awkward to check for these switches. Make the somewhat arbitrary decision that we'll only skip the root check if -C is the first switch. This is not just to make the code a bit simpler: it also guarantees that we can't misinterpret a --boot mode switch. (While AuxiliaryProcessMain doesn't currently recognize any such switch, it might have one in the future.) This is no particular problem for pg_ctl, and since the whole behavior is undocumented anyhow, it's not a documentation issue either. (--describe-config only works as the first switch anyway, so this is no restriction for that case either.) Back-patch to 9.2 where pg_ctl first began to use -C. MauMau, heavily edited by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b203c57bb778d90bb8728be19e78825134d5820f">http://git.postgresql.org/pg/commitdiff/b203c57bb778d90bb8728be19e78825134d5820f</a></li>

<li>Fix tablespace creation WAL replay to work on Windows. The code segment that removes the old symlink (if present) wasn't clued into the fact that on Windows, symlinks are junction points which have to be removed with rmdir(). Backpatch to 9.0, where the failing code was introduced. MauMau, reviewed by Muhammad Asif Naeem and Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/abe075dfffe2ef7e76ebbf5717fa3823f9a70a1f">http://git.postgresql.org/pg/commitdiff/abe075dfffe2ef7e76ebbf5717fa3823f9a70a1f</a></li>

<li>ecpg/ecpglib must build the src/port files it uses with -DFRONTEND. Remarkably, this hasn't been noticed before, though it surely should have been happening since around the fall of the Byzantine empire. Commit 438b529604 changed path.c to depend on FRONTEND, and that exposed the omission, per buildfarm reports. I'm suspicious that some other subdirectories are missing this too, but this one change is enough to make ecpg tests pass for me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44c5d387eafb4ba1a032f8d7b13d85c553d69181">http://git.postgresql.org/pg/commitdiff/44c5d387eafb4ba1a032f8d7b13d85c553d69181</a></li>

<li>Fix processing of PGC_BACKEND GUC parameters on Windows. EXEC_BACKEND builds (i.e., Windows) failed to absorb values of PGC_BACKEND parameters if they'd been changed post-startup via the config file. This for example prevented log_connections from working if it were turned on post-startup. The mechanism for handling this case has always been a bit of a kluge, and it wasn't revisited when we implemented EXEC_BACKEND. While in a normal forking environment new backends will inherit the postmaster's value of such settings, EXEC_BACKEND backends have to read the settings from the CONFIG_EXEC_PARAMS file, and they were mistakenly rejecting them. So this case has always been broken in the Windows port; so back-patch to all supported branches. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6862ca6970d11c47996d99e49a1cf8b55ef9b40d">http://git.postgresql.org/pg/commitdiff/6862ca6970d11c47996d99e49a1cf8b55ef9b40d</a></li>

<li>Block signals earlier during postmaster startup. Formerly, we set up the postmaster's signal handling only when we were about to start launching subprocesses. This is a bad idea though, as it means that for example a SIGINT arriving before that will kill the postmaster instantly, perhaps leaving lockfiles, socket files, shared memory, etc laying about. We'd rather that such a signal caused orderly postmaster termination including releasing of those resources. A simple fix is to move the PostmasterMain stanza that initializes signal handling to an earlier point, before we've created any such resources. Then, an early-arriving signal will be blocked until we're ready to deal with it in the usual way. (The only part that really needs to be moved up is blocking of signals, but it seems best to keep the signal handler installation calls together with that; for one thing this ensures the kernel won't drop any signals we wished to get. The handlers won't get invoked in any case until we unblock signals in ServerLoop.) Per a report from MauMau. He proposed changing the way "pg_ctl stop" works to deal with this, but that'd just be masking one symptom not fixing the core issue. It's been like this since forever, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d8117e1f38d7240e99d57e624a9d880872c7e98">http://git.postgresql.org/pg/commitdiff/5d8117e1f38d7240e99d57e624a9d880872c7e98</a></li>

<li>Improve contrib/pg_trgm's heuristics for regexp index searches. When extracting trigrams from a regular expression for search of a GIN or GIST trigram index, it's useful to penalize (preferentially discard) trigrams that contain whitespace, since those are typically far more common in the index than trigrams not containing whitespace. Of course, this should only be a preference not a hard rule, since we might otherwise end up with no trigrams to search for. The previous coding tended to produce fairly inefficient trigram search sets for anchored regexp patterns, as reported by Erik Rijkers. This patch penalizes whitespace-containing trigrams, and also reduces the target number of extracted trigrams, since experience suggests that the original coding tended to select too many trigrams to search for. Alexander Korotkov, reviewed by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80a5cf643adb496abe577a1ca6dc0c476d849c19">http://git.postgresql.org/pg/commitdiff/80a5cf643adb496abe577a1ca6dc0c476d849c19</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reduce lock levels of some ALTER TABLE cmds: VALIDATE CONSTRAINT CLUSTER ON, SET WITHOUT CLUSTER, ALTER COLUMN SET STATISTICS, ALTER COLUMN SET (), and ALTER COLUMN RESET (). All other sub-commands use AccessExclusiveLock. Simon Riggs and Noah Misch. Reviews by Robert Haas and Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5550d5fec66aa74caad1f79b79826ec64898688">http://git.postgresql.org/pg/commitdiff/e5550d5fec66aa74caad1f79b79826ec64898688</a></li>

<li>Isolation test files for ALTER TABLE patch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f14a6bbedb79adce2298d0d4f5e2abe8563e0eca">http://git.postgresql.org/pg/commitdiff/f14a6bbedb79adce2298d0d4f5e2abe8563e0eca</a></li>

<li>Extra warnings and errors for PL/pgSQL. Infrastructure to allow plpgsql.extra_warnings plpgsql.extra_errors Initial extra checks only for shadowed_variables Marko Tiikkaja and Petr Jelinek Reviewed by Simon Riggs and Pavel St&#283;hule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d8f1de1bc04bf8ddda6548156ef32f46e13dd50">http://git.postgresql.org/pg/commitdiff/7d8f1de1bc04bf8ddda6548156ef32f46e13dd50</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in another revision of a patch to add a new parameter RollbackError to control rollback behavior on error.</li>

<li>Edward Behn sent in a patch to allow returning array of composites from PL/Python.</li>

<li>Etsuro Fujita sent in two more revisions of a patch to allow foreign tables to be part of table inheritance hierarchies.</li>

<li>Yugo Nagata and Robert Haas traded patches to add to_regclass and friends.</li>

<li>Peter Geoghegan sent in another revision of a patch to add a B-Tree support function.</li>

<li>Bruce Momjian sent in a patch to fix an issue with socket handling on Windows.</li>

<li>Fabien COELHO sent in another revision of a patch to add a Gaussian distribution option to pgbench.</li>

<li>Kumar Rajeev Rastogi sent in a patch to document the usage of CREATE DATABASE with template specified.</li>

<li>Adrian Vondendriesch sent in two more revisions of a patch to provide a allback_application_name in contrib/pgbench, oid2name, and dblink.</li>

<li>Ashutosh Bapat sent in a patch to fix an infelicity in how ECPG handles types.</li>

<li>Michael Paquier sent in a patch to include replication slot data in base backups.</li>

<li>Florian Pflug and Dean Rasheed traded patches to add inverse transition functions for aggregates.</li>

<li>Abhijit Menon-Sen sent in a patch to add a fastbloat module.</li>

<li>Robert Haas sent in a draft patch to get rid of the dynamic shared memory state file.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the WAL format and API.</li>

<li>Kumar Rajeev Rastogi sent in a patch to fix an issue where CREATE TABLE failed to fail on invalid syntax.</li>

<li>Emre Hasegeli sent in another revision of a patch to add GiST indexing support for inet data types.</li>

</ul>