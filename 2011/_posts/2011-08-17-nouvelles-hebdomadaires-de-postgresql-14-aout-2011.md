---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 août 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-08-17-nouvelles-hebdomadaires-de-postgresql-14-aout-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct the lie in pg_config.h.win32 about having inttypes.h. This lie has been harmless until now, but has been exposed by the change to include postgres.h before the python headers, which in some versions include inttypes.h if HAVE_INTTYPES_H is set. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f54e373d93f72d87ce2cafd7373bd7b0534b2065">http://git.postgresql.org/pg/commitdiff/f54e373d93f72d87ce2cafd7373bd7b0534b2065</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Teach vacuumlo to limit number of removals, via new -l option. Also, handle failure better: don't just blindly keep trying to delete stuff after the transaction has already failed. Tim Lewis, reviewed by Josh Kupershmidt, with further hacking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b69f2e36402aaa222ed03c1769b3de6d5be5f302">http://git.postgresql.org/pg/commitdiff/b69f2e36402aaa222ed03c1769b3de6d5be5f302</a></li>

<li>Teach psql to display the comments on conversions and domains. \dc and \dD now accept a "+" option, which will cause the comments to be displayed. Along the way, correct a few oversights in the previous commit in this area, 3b17efdfdd846c9bfad1637686e6f18198ea3df5 - namely, (1) when \dL+ is used, make description still be the last column, for consistency with what we've done elsewhere; and (2) document the difference between \dC and \dC+. Josh Kupershmidt, with a couple of doc changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9ac00e6ecfaad4d6a3e1ee478b912c7227ae62a">http://git.postgresql.org/pg/commitdiff/c9ac00e6ecfaad4d6a3e1ee478b912c7227ae62a</a></li>

<li>Teach psql to display the comments on SQL/MED objects in verbose mode. The relevant backslash commands already exist, so we're just adding an additional column. With this commit, all objects that have psql backslash commands and accept comments should now display those comments at least in verbose mode. Josh Kupershmidt, with doc additions by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d82a9d2a600b764aabdc37507c50d9229f8310b5">http://git.postgresql.org/pg/commitdiff/d82a9d2a600b764aabdc37507c50d9229f8310b5</a></li>

<li>Change psql's \dd command to do something more useful. Instead of displaying comments on an arbitrary subset of the object types which support them, make \dd display comments on exactly those object types which don't have their own backlash commands. We now regard the display of comments as properly the job of the relevant backslash command (though many of them do so only in verbose mode) rather than something that \dd should be responsible for. However, a handful of object types have no backlash command, so make \dd give information about those. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59414cdedbc2ed418d66eddc0fcaf9dc40fbc27f">http://git.postgresql.org/pg/commitdiff/59414cdedbc2ed418d66eddc0fcaf9dc40fbc27f</a></li>

<li>Unbreak legacy syntax "COMMENT ON RULE x IS y", with no relation name. check_object_ownership() isn't happy about the null relation pointer. We could fix it there, but this seems more future-proof. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5057366eedaccef1f4c25a7c5de0d6c1c5a291f1">http://git.postgresql.org/pg/commitdiff/5057366eedaccef1f4c25a7c5de0d6c1c5a291f1</a></li>

<li>Display both per-table and per-column FDW options in psql's \d output. Along the way, rename "Options" to "FDW Options" in various places for consistency and clarity. Shigeru Hanada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d82d84864ca8ee2960a1a5d7a3f051290ac1e42f">http://git.postgresql.org/pg/commitdiff/d82d84864ca8ee2960a1a5d7a3f051290ac1e42f</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix nested PlaceHolderVar expressions that appear only in targetlists. A PlaceHolderVar's expression might contain another, lower-level PlaceHolderVar. If the outer PlaceHolderVar is used, the inner one certainly will be also, and so we have to make sure that both of them get into the placeholder_list with correct ph_may_need values during the initial pre-scan of the query (before deconstruct_jointree starts). We did this correctly for PlaceHolderVars appearing in the query quals, but overlooked the issue for those appearing in the top-level targetlist; with the result that nested placeholders referenced only in the targetlist did not work correctly, as illustrated in bug #6154. While at it, add some error checking to find_placeholder_info to ensure that we don't try to create new placeholders after it's too late to do so; they have to all be created before deconstruct_jointree starts. Back-patch to 8.4 where the PlaceHolderVar mechanism was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77ba23256404d6f975a80d5402e62f6047c67b3a">http://git.postgresql.org/pg/commitdiff/77ba23256404d6f975a80d5402e62f6047c67b3a</a></li>

<li>Avoid creating PlaceHolderVars immediately within PlaceHolderVars. Such a construction is useless since the lower PlaceHolderVar is already nullable; no need to make it more so. Noted while pursuing bug #6154. This is just a minor planner efficiency improvement, since the final plan will come out the same anyway after PHVs are flattened. So not worth the risk of back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cff60f2dfa470d5736a19d36eb910844e31db764">http://git.postgresql.org/pg/commitdiff/cff60f2dfa470d5736a19d36eb910844e31db764</a></li>

<li>Documentation improvement and minor code cleanups for the latch facility. Improve the documentation around weak-memory-ordering risks, and do a pass of general editorialization on the comments in the latch code. Make the Windows latch code more like the Unix latch code where feasible; in particular provide the same Assert checks in both implementations. Fix poorly-placed WaitLatch call in syncrep.c. This patch resolves, for the moment, concerns around weak-memory-ordering bugs in latch-related code: we have documented the restrictions and checked that existing calls meet them. In 9.2 I hope that we will install suitable memory barrier instructions in SetLatch/ResetLatch, so that their callers don't need to be quite so careful. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e15a4db5e65e43271f8d20750d6500ab12632d0">http://git.postgresql.org/pg/commitdiff/4e15a4db5e65e43271f8d20750d6500ab12632d0</a></li>

<li>Measure WaitLatch's timeout parameter in milliseconds, not microseconds. The original definition had the problem that timeouts exceeding about 2100 seconds couldn't be specified on 32-bit machines. Milliseconds seem like sufficient resolution, and finer grain than that would be fantasy anyway on many platforms. Back-patch to 9.1 so that this aspect of the latch API won't change between 9.1 and later releases. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f17ffd8660243382809b8023ff3d38fbfac4e8b">http://git.postgresql.org/pg/commitdiff/9f17ffd8660243382809b8023ff3d38fbfac4e8b</a></li>

<li>Change the autovacuum launcher to use WaitLatch instead of a poll loop. In pursuit of this (and with the expectation that WaitLatch will be needed in more places), convert the latch field that was already added to PGPROC for sync rep into a generic latch that is activated for all PGPROC-owning processes, and change many of the standard backend signal handlers to set that latch when a signal happens. This will allow WaitLatch callers to be wakened properly by these signals. In passing, fix a whole bunch of signal handlers that had been hacked to do things that might change errno, without adding the necessary save/restore logic for errno. Also make some minor fixes in unix_latch.c, and clean up bizarre and unsafe scheme for disowning the process's latch. Much of this has to be back-patched into 9.1. Peter Geoghegan, with additional work by Tom 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4dab3d5ae1498eb4246e54225a48cf667ab693da">http://git.postgresql.org/pg/commitdiff/4dab3d5ae1498eb4246e54225a48cf667ab693da</a></li>

<li>Back-patch assorted latch-related fixes. Fix a whole bunch of signal handlers that had been hacked to do things that might change errno, without adding the necessary save/restore logic for errno. Also make some minor fixes in unix_latch.c, and clean up bizarre and unsafe scheme for disowning the process's latch. While at it, rename the PGPROC latch field to procLatch for consistency with 9.2. Issues noted while reviewing a patch by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/989f530d3f793ed1c990d705d0958bfd2a533b85">http://git.postgresql.org/pg/commitdiff/989f530d3f793ed1c990d705d0958bfd2a533b85</a></li>

<li>Add a bit of debug logging to backend_read_statsfile(). This is in hopes of learning more about what causes "pgstat wait timeout" warnings in the buildfarm. This patch should probably be reverted once we've learned what we can. As coded, it will result in regression test "failures" at half the delay that the existing code does, so I expect to see a few more than before. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79b2ee20c8a041a85dd230c4e787bef22edae57b">http://git.postgresql.org/pg/commitdiff/79b2ee20c8a041a85dd230c4e787bef22edae57b</a></li>

<li>Remove wal_sender_delay GUC, because it's no longer useful. The latch infrastructure is now capable of detecting all cases where the walsender loop needs to wake up, so there is no reason to have an arbitrary timeout. Also, modify the walsender loop logic to follow the standard pattern of ResetLatch, test for work to do, WaitLatch. The previous coding was both hard to follow and buggy: it would sometimes busy-loop despite having nothing available to do, eg between receipt of a signal and the next time it was caught up with new WAL, and it also had interesting choices like deciding to update to WALSNDSTATE_STREAMING on the strength of information known to be obsolete. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cff75130b5f63e45423c2ed90d6f2e84c21ef840">http://git.postgresql.org/pg/commitdiff/cff75130b5f63e45423c2ed90d6f2e84c21ef840</a></li>

<li>Teach unix_latch.c to use poll() where available. poll() is preferred over select() on platforms where both are available, because it tends to be a bit faster and it doesn't have an arbitrary limit on the range of FD numbers that can be accessed. The FD range limit does not appear to be a risk factor for any 9.1 usages, so this doesn't need to be back-patched, but we need to have it in place if we keep on expanding the uses of WaitLatch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a180776f7a1c4554f214bd9e67bd63bfaf33e339">http://git.postgresql.org/pg/commitdiff/a180776f7a1c4554f214bd9e67bd63bfaf33e339</a></li>

<li>Fix incorrect timeout handling during initial authentication transaction. The statement start timestamp was not set before initiating the transaction that is used to look up client authentication information in pg_authid. In consequence, enable_sig_alarm computed a wrong value (far in the past) for statement_fin_time. That didn't have any immediate effect, because the timeout alarm was set without reference to statement_fin_time; but if we subsequently blocked on a lock for a short time, CheckStatementTimeout would consult the bogus value when we cancelled the lock timeout wait, and then conclude we'd timed out, leading to immediate failure of the connection attempt. Thus an innocent "vacuum full pg_authid" would cause failures of concurrent connection attempts. Noted while testing other, more serious consequences of vacuum full on system catalogs. We should set the statement timestamp before StartTransactionCommand(), so that the transaction start timestamp is also valid. I'm not sure if there are any non-cosmetic effects of it not being valid, but the xact timestamp is at least sent to the statistics machinery. Back-patch to 9.0. Before that, the client authentication timeout was done outside any transaction and did not depend on this state to be valid. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/592b615d71caac8a3504276a805a6fd024c40041">http://git.postgresql.org/pg/commitdiff/592b615d71caac8a3504276a805a6fd024c40041</a></li>

<li>Fix unsafe order of operations in foreign-table DDL commands. When updating or deleting a system catalog tuple, it's necessary to acquire RowExclusiveLock on the catalog before looking up the tuple; otherwise a concurrent VACUUM FULL on the catalog might move the tuple to a different TID before we can apply the update. Coding patterns that find the tuple via a table scan aren't at risk here, but when obtaining the tuple from a catalog cache, correct ordering is important; and several routines in foreigncmds.c got it wrong. Noted while running the regression tests in parallel with VACUUM FULL of assorted system catalogs. For consistency I moved all the heap_open calls to the starts of their functions, including a couple for which there was no actual bug. Back-patch to 8.4 where foreigncmds.c was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52994e9e5686b10a92bc93ec0f4e15c7fbc18242">http://git.postgresql.org/pg/commitdiff/52994e9e5686b10a92bc93ec0f4e15c7fbc18242</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix grammar and spelling in log message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b6c8436d7e696cced4db14c885eff23f87dc712">http://git.postgresql.org/pg/commitdiff/5b6c8436d7e696cced4db14c885eff23f87dc712</a></li>

<li>Change the way string relopts are allocated. Don't try to allocate the default value for a string relopt in the same palloc chunk as the relopt_string struct. That didn't work too well if you added a built-in string relopt in the stringRelOpts array, as it's not possible to have an initializer for a variable length struct in C. This makes the code slightly simpler too. While we're at it, move the call to validator function in add_string_reloption to before the allocation, so that if someone does pass a bogus default value, we don't leak memory. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77949a2913b3cbaa7b2e2a73f014d541e251f18b">http://git.postgresql.org/pg/commitdiff/77949a2913b3cbaa7b2e2a73f014d541e251f18b</a></li>

<li>If backup-end record is not seen, and we reach end of recovery from a streamed backup, throw an error and refuse to start up. The restore has not finished correctly in that case and the data directory is possibly corrupt. We already errored out in case of archive recovery, but could not during crash recovery because we couldn't distinguish between the case that pg_start_backup() was called and the database then crashed (must not error, data is OK), and the case that we're restoring from a backup and not all the needed WAL was replayed (data can be corrupt). To distinguish those cases, add a line to backup_label to indicate whether the backup was taken with pg_start/stop_backup(), or by streaming (ie. pg_basebackup). This requires re-initdb, because of a new field added to the control file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41f9ffd928b6fdcedd685483e777b0fa71ece47c">http://git.postgresql.org/pg/commitdiff/41f9ffd928b6fdcedd685483e777b0fa71ece47c</a></li>

<li>Oops, we're working on version 9.2 already, not 9.1. Update the PG_CONTROL_VERSION accordingly; I updated it wrong in previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f1b70a7cf957b88433f871f3732ad5701b6ad8b">http://git.postgresql.org/pg/commitdiff/1f1b70a7cf957b88433f871f3732ad5701b6ad8b</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use clearer notation for getnameinfo() return handling. Writing if (getnameinfo(...)) {handle_error()}; reads quite strangely, so use something like if (getnameinfo(...) != 0) {handle_error()}; instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f4a9da0a150ead846be33c38f665f4337a81054e">http://git.postgresql.org/pg/commitdiff/f4a9da0a150ead846be33c38f665f4337a81054e</a></li>

<li>Fix typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7431cb251a6c36ea520f955dd03d4b35b0f0f3e4">http://git.postgresql.org/pg/commitdiff/7431cb251a6c36ea520f955dd03d4b35b0f0f3e4</a></li>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85612039b9eab75c2a29399f3a394acd4ca4cc3f">http://git.postgresql.org/pg/commitdiff/85612039b9eab75c2a29399f3a394acd4ca4cc3f</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add major features list and introductory text for 9.1 release notes. Backpatch to 9.1, obviously. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb72adc82e933f135369d846c2151c7694ffaa36">http://git.postgresql.org/pg/commitdiff/eb72adc82e933f135369d846c2151c7694ffaa36</a></li>

<li>Make USECS_PER_* timestamp macros visible even when we are not using integer timestamps. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d7bd5dec9e073018d9c2bea51d8e271cf5a5af6">http://git.postgresql.org/pg/commitdiff/6d7bd5dec9e073018d9c2bea51d8e271cf5a5af6</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in a patch which replaces lseek() with fstat() to get file sizes.</li>

<li>Alex Hunsaker sent in a patch to fix an issue with PL/Perl's signal handling.</li>

<li>Robert Haas sent in a patch to fix an issue where WaitLatch is vulnerable to weak memory ordering issues.</li>

<li>Heikki Linnakangas sent in a patch enforcing that all WAL has been replayed after restoring from backup.</li>

<li>Alexander Korotkov and Heikki Linnakangas traded patches for fast GiST index build.</li>

<li>David Byrne sent in a patch intended to fix a mismatch in pg_upgrades count for current and new relations.</li>

<li>Robert Haas sent in another revision of the patch to allow index-only scans, and there was much rejoicing.</li>

<li>Shigeru HANADA sent in a patch to make the output of fdw options clearer in psql.</li>

<li>Simon Riggs sent in a patch intended to fix some lameness in the buffer replacement strategy.</li>

<li>Heikki Linnakangas sent in a patch to allow inserting heap tuples up to a page worth at a time in COPY. Previously, the procedure was to insert heap tuples individually.</li>

<li>David Fetter sent in a patch to make the copyright program idempoetent and cross-platform.</li>

<li>Alex Hunsaker sent in a patch to make PL/Perl handle empty arrays better.</li>

<li>Tom Lane sent in a patch intended to to fix VACUUM FULL/CLUSTER so that they don't change existing toast item OIDs when vacuuming a system catalog.</li>

</ul>

</html>