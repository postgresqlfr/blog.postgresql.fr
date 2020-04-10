---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 août 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-08-15-nouvelles-hebdomadaires-de-postgresql-6-aout-2012 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Now that the diskchecker.pl author has updated the download link on his website, revert the separate link to the download git repository. Backpatch from 9.0 to current. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/04d2956f0df0d95da3dd2d202b9482d24822cc71">http://git.postgresql.org/pg/commitdiff/04d2956f0df0d95da3dd2d202b9482d24822cc71</a></li>

<li>In pg_upgrade, use pg_log() instead of prep_status() for newline-terminated messages, per suggestion from Tom. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8969c4733b15857d6af2ec024a102897bfbfbf2">http://git.postgresql.org/pg/commitdiff/e8969c4733b15857d6af2ec024a102897bfbfbf2</a></li>

<li>Document that, for psql -c, only the result of the last command is returned, per report from Aleksey Tsalolikhin Backpatch to 9.2 and 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b8c798362a4141904f690375ede8a5bb9138623">http://git.postgresql.org/pg/commitdiff/7b8c798362a4141904f690375ede8a5bb9138623</a></li>

<li>Document that trying to exceed temp_file_limit causes a query cancel. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9fb5952cdf8870b430456b0674d64d6df622ee7c">http://git.postgresql.org/pg/commitdiff/9fb5952cdf8870b430456b0674d64d6df622ee7c</a></li>

<li>Add link to synchronous_commit variables in high availability docs. Backpatch to 9.2. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95e750520c47416554765a508b280f96802ff54f">http://git.postgresql.org/pg/commitdiff/95e750520c47416554765a508b280f96802ff54f</a></li>

<li>Reword documentation for concurrent index rebuilds to be clearer. Backpatch to 9.1 and 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4639432597d14f6cb29919eec3f9b4708d152b70">http://git.postgresql.org/pg/commitdiff/4639432597d14f6cb29919eec3f9b4708d152b70</a></li>

<li>Replace pgindent shell script with Perl script. Update perltidy instructions to perltidy Perl files that lack Perl file extensions. pgindent Perl coding by Andrew Dunstan, restructured by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/149ac7d45595f64f7b60833de7f146bc9a599656">http://git.postgresql.org/pg/commitdiff/149ac7d45595f64f7b60833de7f146bc9a599656</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_basebackup: stylistic adjustments. The most user-visible part of this is to change the long options --statusint and --noloop to --status-interval and --no-loop, respectively, per discussion. Also, consistently enclose file names in double quotes, per our conventions; and consistently use the term "transaction log file" to talk about WAL segments. (Someday we may need to go over this terminology and make it consistent across the whole source code.) Finally, reflow the code to better fit in 80 columns, and have pgindent fix it up some more. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f29f011c82310235c8dfb25f7e648601276a802">http://git.postgresql.org/pg/commitdiff/2f29f011c82310235c8dfb25f7e648601276a802</a></li>

<li>Fix memory and file descriptor leaks in pg_receivexlog/pg_basebackup. When the internal loop mode was added, freeing memory and closing filedescriptors before returning became important, and a few cases in the code missed that. This is a backpatch of commit 058a050e to the 9.2 branch, which seems to have been neglected (in error, because the bugs it fixes were introduced in commit 16282ae6 which is present in both master and 9.2). Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/776bdc4c5c019a9556a6622a01a406c6c0fec4c9">http://git.postgresql.org/pg/commitdiff/776bdc4c5c019a9556a6622a01a406c6c0fec4c9</a></li>

<li>Make strings identical 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5f8e7169fca16ffa5d88c41402a408dde1cbdcc">http://git.postgresql.org/pg/commitdiff/f5f8e7169fca16ffa5d88c41402a408dde1cbdcc</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix syslogger so that log_truncate_on_rotation works in the first rotation. In the original coding of the log rotation stuff, we did not bother to make the truncation logic work for the very first rotation after postmaster start (or after a syslogger crash and restart). It just always appended in that case. It did not seem terribly important at the time, but we've recently had two separate complaints from people who expected it to work unsurprisingly. (Both users tend to restart the postmaster about as often as a log rotation is configured to happen, which is maybe not typical use, but still...) Since the initial log file is opened in the postmaster, fixing this requires passing down some more state to the syslogger child process. It's always been like this, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b76356ac22d8322e6074981b4d34ee19cd0dbc8a">http://git.postgresql.org/pg/commitdiff/b76356ac22d8322e6074981b4d34ee19cd0dbc8a</a></li>

<li>Fix WITH attached to a nested set operation (UNION/INTERSECT/EXCEPT). Parse analysis neglected to cover the case of a WITH clause attached to an intermediate-level set operation; it only handled WITH at the top level or WITH attached to a leaf-level SELECT. Per report from Adam Mackler. In HEAD, I rearranged the order of SelectStmt's fields to put withClause with the other fields that can appear on non-leaf SelectStmts. In back branches, leave it alone to avoid a possible ABI break for third-party code. Back-patch to 8.4 where WITH support was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6ce81f55a3c6932d5f88bc89374f404688f054e">http://git.postgresql.org/pg/commitdiff/f6ce81f55a3c6932d5f88bc89374f404688f054e</a></li>

<li>Add documentation cross-reference for JSON functions. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c0fecdaefb10212d65652607833a4c8061e64e9">http://git.postgresql.org/pg/commitdiff/7c0fecdaefb10212d65652607833a4c8061e64e9</a></li>

<li>Replace libpq's "row processor" API with a "single row" mode. After taking awhile to digest the row-processor feature that was added to libpq in commit 92785dac2ee7026948962cd61c4cd84a2d052772, we've concluded it is over-complicated and too hard to use. Leave the core infrastructure changes in place (that is, there's still a row processor function inside libpq), but remove the exposed API pieces, and instead provide a "single row" mode switch that causes PQgetResult to return one row at a time in separate PGresult objects. This approach incurs more overhead than proper use of a row processor callback would, since construction of a PGresult per row adds extra cycles. However, it is far easier to use and harder to break. The single-row mode still affords applications the primary benefit that the row processor API was meant to provide, namely not having to accumulate large result sets in memory before processing them. Preliminary testing suggests that we can probably buy back most of the extra cycles by micro-optimizing construction of the extra results, but that task will be left for another day. Marko Kreen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41b9c8452b9df3a431dffc346890f926d17d47ad">http://git.postgresql.org/pg/commitdiff/41b9c8452b9df3a431dffc346890f926d17d47ad</a></li>

<li>Update release notes for libpq feature change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7719ed04bc4b8f08dab85ffe9c79a52fdb4756dd">http://git.postgresql.org/pg/commitdiff/7719ed04bc4b8f08dab85ffe9c79a52fdb4756dd</a></li>

<li>Fix race conditions associated with SPGiST redirection tuples. The correct test for whether a redirection tuple is removable is whether tuple's xid &lt; RecentGlobalXmin, not OldestXmin; the previous coding failed to protect index searches being done in concurrent transactions that have no XID. This mirrors the recent fix in btree's page recycling logic made in commit d3abbbebe52eb1e59e621c880ad57df9d40d13f2. Also, WAL-log the newest XID of any removed redirection tuple on an index page, and apply ResolveRecoveryConflictWithSnapshot during InHotStandby WAL replay. This protects against concurrent Hot Standby transactions possibly needing to see the redirection tuple(s). Per my query of 2012-03-12 and subsequent discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/962e0cc71e839c58fb9125fa85511b8bbb8bdbee">http://git.postgresql.org/pg/commitdiff/962e0cc71e839c58fb9125fa85511b8bbb8bdbee</a></li>

<li>Stamp 9.2beta3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f30b05b8a468d0240d18251dbf2907793da676ba">http://git.postgresql.org/pg/commitdiff/f30b05b8a468d0240d18251dbf2907793da676ba</a></li>

<li>In SPGiST replay, do conflict resolution before modifying the page. In yesterday's commit 962e0cc71e839c58fb9125fa85511b8bbb8bdbee, I added the ResolveRecoveryConflictWithSnapshot call in the wrong place. I correctly put it before spgRedoVacuumRedirect itself would modify the index page --- but not before RestoreBkpBlocks, so replay of a record with a full-page image would modify the page before kicking off any conflicting HS transactions. Oops. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1793f2e0ce4ee5c713f27d0bdacc7d99b9103ac">http://git.postgresql.org/pg/commitdiff/c1793f2e0ce4ee5c713f27d0bdacc7d99b9103ac</a></li>

<li>Improve underdocumented btree_xlog_delete_get_latestRemovedXid() code. As noted by Noah Misch, btree_xlog_delete_get_latestRemovedXid is critically dependent on the assumption that it's examining a consistent state of the database. This was undocumented though, so the seemingly-unrelated check for no active HS sessions might be thought to be merely an optional optimization. Improve comments, and add an explicit check of reachedConsistency just to be sure. This function returns InvalidTransactionId (thereby killing all HS transactions) in several cases that are not nearly unlikely enough for my taste. This commit doesn't attempt to fix those deficiencies, just document them. Back-patch to 9.2, not from any real functional need but just to keep the branches more closely synced to simplify possible future back-patching. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f786e91a75b2f64527dcf321e754b6448fcad7fe">http://git.postgresql.org/pg/commitdiff/f786e91a75b2f64527dcf321e754b6448fcad7fe</a></li>

<li>Fix bugs with parsing signed hh:mm and hh:mm:ss fields in interval input. DecodeInterval() failed to honor the "range" parameter (the special SQL syntax for indicating which fields appear in the literal string) if the time was signed. This seems inappropriate, so make it work like the not-signed case. The inconsistency was introduced in my commit f867339c0148381eb1d01f93ab5c79f9d10211de, which as noted in its log message was only really focused on making SQL-compliant literals work per spec. Including a sign here is not per spec, but if we're going to allow it then it's reasonable to expect it to work like the not-signed case. Also, remove bogus setting of tmask, which caused subsequent processing to think that what had been given was a timezone and not an hh:mm(:ss) field, thus confusing checks for redundant fields. This seems to be an aboriginal mistake in Lockhart's commit 2cf1642461536d0d8f3a1cf124ead0eac04eb760. Add regression test cases to illustrate the changed behaviors. Back-patch as far as 8.4, where support for spec-compliant interval literals was added. Range problem reported and diagnosed by Amit Kapila, tmask problem by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3152bf722fe334b70281256dbb74d9cb1e3643e1">http://git.postgresql.org/pg/commitdiff/3152bf722fe334b70281256dbb74d9cb1e3643e1</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Perform conversion from Python unicode to string/bytes object via UTF-8. We used to convert the unicode object directly to a string in the server encoding by calling Python's PyUnicode_AsEncodedString function. In other words, we used Python's routines to do the encoding. However, that has a few problems. First of all, it required keeping a mapping table of Python encoding names and PostgreSQL encodings. But the real killer was that Python doesn't support EUC_TW and MULE_INTERNAL encodings at all. Instead, convert the Python unicode object to UTF-8, and use PostgreSQL's encoding conversion functions to convert from UTF-8 to server encoding. We were already doing the same in the other direction in PLyUnicode_FromString, so this is more consistent, too. Note: This makes SQL_ASCII to behave more leniently. We used to map SQL_ASCII to Python's 'ascii', which on Python means strict 7-bit ASCII only, so you got an error if the python string contained anything but pure ASCII. You no longer get an error; you get the UTF-8 representation of the string instead. Backpatch to 9.0, where these conversions were introduced. Jan Urba&#324;ski 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ff15883b1b4bcefb2278313a3137a688ebda505">http://git.postgresql.org/pg/commitdiff/3ff15883b1b4bcefb2278313a3137a688ebda505</a></li>

<li>Put back plpython_unicode_2.out for SQL_ASCII case. This alternative expected output file is required when using SQL_ASCII as the client and server encoding. The python encoding conversion used to throw an error on that, but it is now accepted and you get the UTF-8 representation of the string. I thought that case was already covered by the other expected output files, but the buildfarm says otherwise. This is only required on REL9_2_STABLE. In 9.1, we explicitly set client_encoding to UTF-8 to avoid this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fb54e91b3b5ff2f73039cc1ba9b0c2d9022418e">http://git.postgresql.org/pg/commitdiff/8fb54e91b3b5ff2f73039cc1ba9b0c2d9022418e</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Complain with proper error message if streaming stops prematurely. In particular, with a controlled shutdown of the master, pg_basebackup with streaming log could terminate without an error message, even though the backup is not consistent. In passing, fix a few cases where walfile wasn't properly set to -1 after closing. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/254316f5a240621ea417329bd26320c53e283020">http://git.postgresql.org/pg/commitdiff/254316f5a240621ea417329bd26320c53e283020</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Warn more vigorously about the non-transactional behavior of sequences. Craig Ringer, edited fairly heavily by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95282d3522f4a35fc0aa6b77110bae1e0d8d207f">http://git.postgresql.org/pg/commitdiff/95282d3522f4a35fc0aa6b77110bae1e0d8d207f</a></li>

<li>Typo fixes for previous commit. Noted by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b112df8421abce1c61bcfd385490050604a6d4e3">http://git.postgresql.org/pg/commitdiff/b112df8421abce1c61bcfd385490050604a6d4e3</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alvaro Herrera sent in another revision of the patch to make NOT NULL constraints visible in pg_catalog.</li>

<li>Qi Huang sent in another revision of the patch to add a pg_stat_lwlocks view.</li>

<li>Amit Kapila sent in a patch to compute the max LSN of data pages.</li>

<li>Marco Nenciarini sent in another revision of the patch to allow array elements to be enforced foreign keys. The new syntax in the patch is ELEMENT REFERENCES.</li>

<li>Fabian Coelho sent in two revisions of a patch to make psql -1 &lt; file work just as psql -1f file does, i.e. attempt to run the entire contents of STDIN as one transaction.</li>

<li>Etsuro Fujita sent in a patch to allow the sortedness of CSV tables to be used in planning for the file_fdw.</li>

<li>Amit Kapila sent in a PoC patch to reduce the amount of WAL generated for updates.</li>

<li>Alexander Korotkov sent in a patch to collect statistics and selectivity estimation for ranges.</li>

<li>Tom Lane sent in a WIP patch to add LATERAL, and there was much rejoicing.</li>

</ul>