---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 mars 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-04-07-nouvelles-hebdomadaires-de-postgresql-17-mars-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix thinko in matview patch. "break" instead of "continue" suppressed view expansion for views appearing later in the range table. Per report from Erikjan Rijkers. While at it, improve the associated comment a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41eef0ff75c3ea905513ae46f795c0409635fac8">http://git.postgresql.org/pg/commitdiff/41eef0ff75c3ea905513ae46f795c0409635fac8</a></li>

<li>Avoid generating bad remote SQL for INSERT ... DEFAULT VALUES. "INSERT INTO foo() VALUES ()" is invalid syntax, so don't do that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f9cc41daf08be802933dc788517743719ee0949">http://git.postgresql.org/pg/commitdiff/8f9cc41daf08be802933dc788517743719ee0949</a></li>

<li>Fix postgres_fdw's issues with inconsistent interpretation of data values. For datatypes whose output formatting depends on one or more GUC settings, we have to worry about whether the other server will interpret the value the same way it was meant. pg_dump has been aware of this hazard for a long time, but postgres_fdw needs to deal with it too. To fix data retrieval from the remote server, set the necessary remote GUC settings at connection startup. (We were already assuming that settings made then would persist throughout the remote session.) To fix data transmission to the remote server, temporarily force the relevant GUCs to the right values when we're about to convert any data values to text for transmission. This is all pretty grotty, and not very cheap either. It's tempting to think of defining one uber-GUC that would override any settings that might render printed data values unportable. But of course, older remote servers wouldn't know any such thing and would still need this logic. While at it, revert commit f7951eef89be78c50ea2241f593d76dfefe176c9, since this provides a real fix. (The timestamptz given in the error message returned from the "remote" server will now reliably be shown in UTC.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc3f281ffb0a5d9b187e7a7b7de4a045809ff683">http://git.postgresql.org/pg/commitdiff/cc3f281ffb0a5d9b187e7a7b7de4a045809ff683</a></li>

<li>Avoid row-processing-order dependency in postgres_fdw regression test. A test intended to provoke an error on the remote side was coded in such a way that multiple rows should be updated, so the output would vary depending on which one was processed first. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0247d43dd9c4ba3d2e121f98e3d5adcf769ab1e3">http://git.postgresql.org/pg/commitdiff/0247d43dd9c4ba3d2e121f98e3d5adcf769ab1e3</a></li>

<li>Allow default expressions to be attached to columns of foreign tables. There's still some discussion about exactly how postgres_fdw ought to handle this case, but there seems no debate that we want to allow defaults to be used for inserts into foreign tables. So remove the core-code restrictions that prevented it. While at it, get rid of the special grammar productions for CREATE FOREIGN TABLE, and instead add explicit FEATURE_NOT_SUPPORTED error checks for the disallowed cases. This makes the grammar a shade smaller, and more importantly results in much more intelligible error messages for unsupported cases. It's also one less thing to fix if we ever start supporting constraints on foreign tables. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0c6dfeecfcc860858b04617a9d96eaee1d82c66">http://git.postgresql.org/pg/commitdiff/a0c6dfeecfcc860858b04617a9d96eaee1d82c66</a></li>

<li>Fix contrib/postgres_fdw's handling of column defaults. Adopt the position that only locally-defined defaults matter. Any defaults defined in the remote database do not affect insertions performed through a foreign table (unless they are for columns not known to the foreign table). While it'd arguably be more useful to permit remote defaults to be used, making that work in a consistent fashion requires far more work than seems possible for 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50c19fc76f05124b80fc4c5d20a359c5dbf017af">http://git.postgresql.org/pg/commitdiff/50c19fc76f05124b80fc4c5d20a359c5dbf017af</a></li>

<li>Fix documentation oversight. Mention that PlanForeignModify's result must be copiable by copyObject. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/209f675f0f9094015414eee39c435ed3bf65d82a">http://git.postgresql.org/pg/commitdiff/209f675f0f9094015414eee39c435ed3bf65d82a</a></li>

<li>Introduce less-bogus handling of collations in contrib/postgres_fdw. Treat expressions as being remotely executable only if all collations used in them are determined by Vars of the foreign table. This means that, if the foreign server gets different answers than we do, it's the user's fault for not having marked the foreign table columns with collations equivalent to the remote table's. This rule allows most simple expressions such as "var &lt; 'constant'" to be sent to the remote side, because the constant isn't determining the collation (the Var's collation would win). There's still room for improvement, but it's hard to see how to do it without a lot more knowledge and/or assumptions about what the remote side will do. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed3ddf918b59545583a4b374566bc1148e75f593">http://git.postgresql.org/pg/commitdiff/ed3ddf918b59545583a4b374566bc1148e75f593</a></li>

<li>Avoid inserting Result nodes that only compute identity projections. The planner sometimes inserts Result nodes to perform column projections (ie, arbitrary scalar calculations) above plan nodes that lack projection logic of their own. However, we did that even if the lower plan node was in fact producing the required column set already; which is a pretty common case given the popularity of "SELECT * FROM ...". Measurements show that the useless plan node adds non-negligible overhead, especially when there are many columns in the result. So add a check to avoid inserting a Result node unless there's something useful for it to do. There are a couple of remaining places where unnecessary Result nodes could get inserted, but they are (a) much less performance-critical, and (b) coded in such a way that it's hard to avoid inserting a Result, because the desired tlist is changed on-the-fly in subsequent logic. We'll leave those alone for now. Kyotaro Horiguchi; reviewed and further hacked on by Amit Kapila and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4387cf956b9eb13aad569634e0c4df081d76e2e3">http://git.postgresql.org/pg/commitdiff/4387cf956b9eb13aad569634e0c4df081d76e2e3</a></li>

<li>Minor fixes for hstore_to_json_loose(). Fix unportable use of isdigit(), get rid of useless calculations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2754991ba6e513a07c15b4058df13d58f8c55ba">http://git.postgresql.org/pg/commitdiff/c2754991ba6e513a07c15b4058df13d58f8c55ba</a></li>

<li>Avoid inserting no-op Limit plan nodes. This was discussed in connection with the patch to avoid inserting no-op Result nodes, but not actually implemented therein. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a1832eb085e5bca198735e5d0e766a3cb61b8fc">http://git.postgresql.org/pg/commitdiff/1a1832eb085e5bca198735e5d0e766a3cb61b8fc</a></li>

<li>Extend format() to handle field width and left/right alignment. This change adds some more standard sprintf() functionality to format(). Pavel Stehule, reviewed by Dean Rasheed and Kyotaro Horiguchi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73e7025bd8eed941a068f0a7a71e02dca8d38d1c">http://git.postgresql.org/pg/commitdiff/73e7025bd8eed941a068f0a7a71e02dca8d38d1c</a></li>

<li>Improve error reporting in code that checks for buffer refcount leaks. Formerly we just Assert'ed that each refcount was zero, which was quick and easy but failed to provide a good overview of what was wrong. Change the code so that we'll call PrintBufferLeakWarning() for each buffer with a nonzero refcount, and then Assert at the end of the loop. This costs nothing in runtime and might ease diagnosis of some bugs. Greg Smith, reviewed by Satoshi Nagayasu, further tweaked by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dcafdbcde1baf256891be6af77868b84889b435d">http://git.postgresql.org/pg/commitdiff/dcafdbcde1baf256891be6af77868b84889b435d</a></li>

<li>Improve the documentation about commit_delay. Clarify the docs explaining what commit_delay does, and add a recommendation about a useful value for it, namely half of the single-page fsync time reported by pg_test_fsync. This is informed by testing of the new-in-9.3 implementation of commit_delay; in prior versions it was far harder to arrive at a useful setting. In passing, do some wordsmithing and markup-fixing in the same general area. Also, change pg_test_fsync's default time-per-test from 2 seconds to 5. The old value was about the minimum at which the results could be taken seriously at all, and so seems a tad optimistic as a default. Peter Geoghegan, reviewed by Noah Misch; some additional editing by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70ec2f8f4392f4e3d379c2c759789d631ffeec10">http://git.postgresql.org/pg/commitdiff/70ec2f8f4392f4e3d379c2c759789d631ffeec10</a></li>

<li>Add lock_timeout configuration parameter. This GUC allows limiting the time spent waiting to acquire any one heavyweight lock. In support of this, improve the recently-added timeout infrastructure to permit efficiently enabling or disabling multiple timeouts at once. That reduces the performance hit from turning on lock_timeout, though it's still not zero. Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi, reviewed by Tom Lane, Stephen Frost, and Hari Babu 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d43837d03067487560af481474ae985df894f786">http://git.postgresql.org/pg/commitdiff/d43837d03067487560af481474ae985df894f786</a></li>

<li>Move pqsignal() to libpgport. We had two copies of this function in the backend and libpq, which was already pretty bogus, but it turns out that we need it in some other programs that don't use libpq (such as pg_test_fsync). So put it where it probably should have been all along. The signal-mask-initialization support in src/backend/libpq/pqsignal.c stays where it is, though, since we only need that in the backend. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da5aeccf64b37a8e9bd3cb605848590595dbcbf8">http://git.postgresql.org/pg/commitdiff/da5aeccf64b37a8e9bd3cb605848590595dbcbf8</a></li>

<li>Fix inclusions in pg_receivexlog.c. Apparently this was depending on pqsignal.h for &lt;signal.h&gt;. Not sure why I didn't see the failure on my other machine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c68b5eff13b97ecaaa87b24406455fafe568aa3f">http://git.postgresql.org/pg/commitdiff/c68b5eff13b97ecaaa87b24406455fafe568aa3f</a></li>

<li>Fix inclusions in pgbench.c. Apparently this was depending on pqsignal.h for &lt;signal.h&gt;. Not sure why I didn't see the failure on my other machine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c41cb695cc5f90eee3d2226ad09016381700ca7">http://git.postgresql.org/pg/commitdiff/8c41cb695cc5f90eee3d2226ad09016381700ca7</a></li>

<li>Re-include pqsignal() in libpq. We need this in non-ENABLE_THREAD_SAFETY builds, and also to satisfy the exports.txt entry; while it might be a good idea to remove the latter, I'm hesitant to do so except in the context of an intentional ABI break. At least we don't have a separately maintained source file for it anymore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1fae823ee46a26e7e557591d659351835742537">http://git.postgresql.org/pg/commitdiff/b1fae823ee46a26e7e557591d659351835742537</a></li>

<li>initdb needs pqsignal() even on Windows. I had thought we weren't using this version of pqsignal() at all on Windows, but that's wrong --- initdb is using it (and coping with the POSIX-ish semantics of bare signal() :-(). So allow the file to be built in WIN32+FRONTEND case, and add it to the MSVC build logic. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2a203a1903367135457f12e0032626f96ef04ca">http://git.postgresql.org/pg/commitdiff/e2a203a1903367135457f12e0032626f96ef04ca</a></li>

<li>Use pqsignal() in contrib programs rather than calling signal(2) directly. The semantics of signal(2) are more variable than one could wish; in particular, on strict-POSIX platforms the signal handler will be reset to SIG_DFL when the signal is delivered. This demonstrably breaks pg_test_fsync's use of SIGALRM. The other changes I made are not absolutely necessary today, because the called handlers all exit the program anyway. But it seems like a good general practice to use pqsignal() exclusively in Postgres code, now that we have it available everywhere. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c07fbf40bd0276e4be02fc72cba6b1cd62da301">http://git.postgresql.org/pg/commitdiff/3c07fbf40bd0276e4be02fc72cba6b1cd62da301</a></li>

<li>Improve signal-handler lockout mechanism in timeout.c. Rather than doing a fairly-expensive setitimer() call to prevent interrupts from happening, let's just invent a simple boolean flag that the signal handler is required to check. This is not only faster but considerably more robust than before, since the previous code effectively assumed that only ITIMER_REAL events would ever fire the SIGALRM handler, which is obviously something that can be broken easily by third-party code. Zolt&aacute;n B&ouml;sz&ouml;rm&eacute;nyi and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ac7facdd3990baf47efc124e9d7229422a06452">http://git.postgresql.org/pg/commitdiff/6ac7facdd3990baf47efc124e9d7229422a06452</a></li>

<li>Increase timeout delays in new timeouts isolation test. Buildfarm member friarbird doesn't like this test as-committed, evidently because it's so slow that the test framework doesn't reliably notice that the backend is waiting before the timeout goes off. (This is not totally surprising, since friarbird builds with -DCLOBBER_CACHE_ALWAYS.) Increase the timeout delay from 1 second to 2 in hopes of resolving that problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c855750fc0ba9bd30fa397eafbfee354908bbca">http://git.postgresql.org/pg/commitdiff/4c855750fc0ba9bd30fa397eafbfee354908bbca</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix orthotypographical mistake. Apparently I lost some of the edits I had done on this page for commit 0ac5ad5134. Per note from Etsuro Fujita, although I didn't use his patch. Make some of the wording in the affected section a bit more complete, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ba0119308e74e522c75662147d89d154f45bb5d">http://git.postgresql.org/pg/commitdiff/1ba0119308e74e522c75662147d89d154f45bb5d</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in dumping prior releases due to MV REFRESH dependency checking. Reports and suggested patches from Fujii Masao and Andrew Dunstan. Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a18b72adcd3632aa21ebf84cc6ed1caf46ba43da">http://git.postgresql.org/pg/commitdiff/a18b72adcd3632aa21ebf84cc6ed1caf46ba43da</a></li>

<li>Add regression test for MV join to view. This would have caught a bug in the initial patch, and seems like a good thing to test going forward. Per bug report by Erik Rijkers and fix by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d7ff13ed5626ecdac2bb0b356445ff4192810aa">http://git.postgresql.org/pg/commitdiff/8d7ff13ed5626ecdac2bb0b356445ff4192810aa</a></li>

<li>Revert unnecessary change in MV call to checkRuleResultList(). Due to a misreading of the function's comment block, there was an unneeded change to a call in rewriteDefine.c. There is, in fact no reason to pass false for a MV; it should be true just like a view. Fixes issue pointed out by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb60e7296c2cf15195802b4596496b179bdc905a">http://git.postgresql.org/pg/commitdiff/fb60e7296c2cf15195802b4596496b179bdc905a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add regression tests for XML mapping of domains. Pavel St&#283;hule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/788bce13d3249ddbcdf3443ee078145f4888ab45">http://git.postgresql.org/pg/commitdiff/788bce13d3249ddbcdf3443ee078145f4888ab45</a></li>

<li>pg_controldata: Undo message spelling change 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea1aee88e343969ad7122a18aff7a43e789dbbd7">http://git.postgresql.org/pg/commitdiff/ea1aee88e343969ad7122a18aff7a43e789dbbd7</a></li>

<li>pg_resetxlog: Capitalize placeholder in --help output 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2bef5f7db5f3afdbbb3f58b8eff49f0bc7ef790">http://git.postgresql.org/pg/commitdiff/d2bef5f7db5f3afdbbb3f58b8eff49f0bc7ef790</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add cost estimation of range @&gt; and &lt;@ operators. The estimates are based on the existing lower bound histogram, and a new histogram of range lengths. Bump catversion, because the range length histogram now needs to be present in statistic slot kind 6, or you get an error on @&gt; and &lt;@ queries. (A re-ANALYZE would be enough to fix that, though) Alexander Korotkov, with some refactoring by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59d0bf9dca58b237902c2fd1507e8bc5d54d4a63">http://git.postgresql.org/pg/commitdiff/59d0bf9dca58b237902c2fd1507e8bc5d54d4a63</a></li>

<li>Change the way UESCAPE is lexed, to reduce the size of the flex tables. The error rule used to avoid backtracking with the U&amp;'...' UESCAPE 'x' syntax bloated the flex tables, so refactor that. This patch makes the error rule shorter, by introducing a new exclusive flex state that's entered after parsing U&amp;'...'. This shrinks the postgres binary by about 220kB. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5ff502fceadc7c203b0d7a11b45c73f1b421f69">http://git.postgresql.org/pg/commitdiff/a5ff502fceadc7c203b0d7a11b45c73f1b421f69</a></li>

<li>Also update psqlscan.l with the UESCAPE error rule changes. Even though this patch had no user-visible difference, better keep the code in psqlscan.l sync with the backend lexer. And of course it's nice to shrink the psql binary, too. Ecpg's version of the lexer doesn't have the error rule, it doesn't try to avoid backing up, so it doesn't need to be modified. As reminded by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7559c0101afa33bfb4e104036ca46adac900111">http://git.postgresql.org/pg/commitdiff/f7559c0101afa33bfb4e104036ca46adac900111</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Extend object-access hook machinery to support post-alter events. This also slightly widens the scope of what we support in terms of post-create events. KaiGai Kohei, with a few changes, mostly to the comments, by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05f3f9c7b2922b2a064418b5cd87b372d1b73412">http://git.postgresql.org/pg/commitdiff/05f3f9c7b2922b2a064418b5cd87b372d1b73412</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>robins sent in three revisions of a patch to test sequences in the regression tests.</li>

<li>Jeff Davis and Ants Aasma traded patches to add page checksums.</li>

<li>Michael Paquier sent in another revision of a patch to overhaul recovery.conf.</li>

<li>Amit Kapila sent in another revision of a patch to micro-optimize pglz.</li>

<li>Michael Paquier sent in two more revisions of a patch to add REINDEX CONCURRENTLY.</li>

<li>Joe Conway sent in a patch to ensure that an extension's tables' data is only dumped in the extension's absence if named explicitly in pg_dump.</li>

<li>Michael Paquier sent in a patch to fix an assertion failure during promotion of a replica to master.</li>

<li>Zoltan Boszormenyi and Amit Kapila traded patches to allow postgresql.conf values to be changed via SQL.</li>

<li>Pavel Stehule sent in a patch to detect orphaned locks.</li>

<li>Alvaro Herrera sent in another revision of a patch to add sql_drop event triggers.</li>

<li>Alvaro Herrera sent in another revision of a patch to add in-catalog Extension Scripts and Control parameters.</li>

<li>Kevin Grittner sent in two revisions of a patch to fix an assertion failure in materialized views.</li>

<li>Hadi Moshayedi sent in a patch to improve the performance of NUMERIC's AVG().</li>

<li>Marti Raudsepp sent in a patch to fix the fact that version() mixes host and target architectures in cross-compiles.</li>

</ul>