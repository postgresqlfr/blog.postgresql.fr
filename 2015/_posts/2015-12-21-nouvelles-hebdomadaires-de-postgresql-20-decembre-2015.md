---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 décembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/12/21/Nouvelles-hebdomadaires-de-PostgreSQL-20-décembre-2015"
---


<p>PostgreSQL 9.5RC1 disponible. &Agrave; vos tests&nbsp;! <a target="_blank" href="https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5">https://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.5</a></p>

<p>Le PGday annuel indien se tiendra &agrave; Bangalore (&Eacute;tat du Karnataka en Inde) le 26 f&eacute;vrier 2016. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="http://pgday.in">http://pgday.in</a></p>

<p>Le PGDay nordique, une s&eacute;rie de conf&eacute;rences sur une seule journ&eacute;e, aura lieu &agrave; Helsinki (Finlande) le 17 mars 2016. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="http://2016.nordicpgday.org/">http://2016.nordicpgday.org/</a></p>

<h2>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-12/">http://archives.postgresql.org/pgsql-jobs/2015-12/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de deux jours avec deux programmes qui aura lieu les 21 et 22 janvier 2016 au Pasadena Convention Center &agrave; l'occasion du SCaLE 14X. <a target="_blank" href="https://www.socallinuxexpo.org/scale/14x/cfp">https://www.socallinuxexpo.org/scale/14x/cfp</a></li>

<li>FOSDEM PGDay est une conf&eacute;rence d'une journ&eacute;e qui sera tenue avant le FOSDEM &agrave; Bruxelles (Belgique) le 29 janvier 2015. D&eacute;tails et appel &agrave; conf&eacute;renciers ci-apr&egrave;s&nbsp;: <a target="_blank" href="http://fosdem2016.pgconf.eu/">http://fosdem2016.pgconf.eu/</a></li>

<li>Prague PostgreSQL Developer Day 2016 (P2D2 2016) est une conf&eacute;rence sur deux jours, les 17 et 18 f&eacute;vrier 2016, &agrave; Prague (R&eacute;publique Tch&egrave;que). Site en tch&egrave;que&nbsp;: <a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>La premi&egrave;re conf&eacute;rence PostgreSQL pan-asiatique se tiendra en mars 2016 &agrave; Singapour. L'appel &agrave; conf&eacute;renciers est ouvert&nbsp;: <a target="_blank" href="http://2016.pgday.asia/">http://2016.pgday.asia/</a></li>

<li>La <em>PGConf US 2016</em> aura lieu les 18, 19 et 20 avril &agrave; New-York. L'appel &agrave; conf&eacute;renciers expire au 31 janvier 2016, 23:59EST&nbsp;: <a target="_blank" href="http://www.pgconf.us/2016/">http://www.pgconf.us/2016/</a></li>

<li>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20151221041252.GB16788@fetter.org">http://www.postgresql.org/message-id/20151221041252.GB16788@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Andres Freund pushed:</p>

<ul>

<li>Correct statement to actually be the intended assert statement. e3f4cfc7 introduced a LWLockHeldByMe() call, without the corresponding Assert() surrounding it. Spotted by Coverity. Backpatch: 9.1+, like the previous commit <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a3544960eaa114d34e5e83ab19e180c8efcd299">http://git.postgresql.org/pg/commitdiff/2a3544960eaa114d34e5e83ab19e180c8efcd299</a></li>

<li>Fix bug in SetOffsetVacuumLimit() triggered by find_multixact_start() failure. Previously, if find_multixact_start() failed, SetOffsetVacuumLimit() would install 0 into MultiXactState-&gt;offsetStopLimit if it previously succeeded. Luckily, there are no known cases where find_multixact_start() will return an error in 9.5 and above. But if it were to happen, for example due to filesystem permission issues, it'd be somewhat bad: GetNewMultiXactId() could continue allocating mxids even if close to a wraparound, or it could erroneously stop allocating mxids, even if no wraparound is looming. The wrong value would be corrected the next time SetOffsetVacuumLimit() is called, or by a restart. Reported-By: Noah Misch, although this is not his preferred fix Discussion: 20151210140450.GA22278@alap3.anarazel.de Backpatch: 9.5, where the bug was introduced as part of 4f627f <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cca705a5d93446e1a9c775b94c7d5900986c0488">http://git.postgresql.org/pg/commitdiff/cca705a5d93446e1a9c775b94c7d5900986c0488</a></li>

<li>Fix tab completion for ALTER ... TABLESPACE ... OWNED BY. Previously the completion used the wrong word to match 'BY'. This was introduced brokenly, in b2de2a. While at it, also add completion of IN TABLESPACE ... OWNED BY and fix comments referencing nonexistent syntax. Reported-By: Michael Paquier Author: Michael Paquier and Andres Freund Discussion: CAB7nPqSHDdSwsJqX0d2XzjqOHr==HdWiubCi4L=Zs7YFTUne8w@mail.gmail.com Backpatch: 9.4, like the commit introducing the bug <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/130d94a7b868f5b6df512e5fde94a64e5e71178b">http://git.postgresql.org/pg/commitdiff/130d94a7b868f5b6df512e5fde94a64e5e71178b</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix out-of-memory error handling in ParameterDescription message processing. If libpq ran out of memory while constructing the result set, it would hang, waiting for more data from the server, which might never arrive. To fix, distinguish between out-of-memory error and not-enough-data cases, and give a proper error message back to the client on OOM. There are still similar issues in handling COPY start messages, but let's handle that as a separate patch. Michael Paquier, Amit Kapila and me. Backpatch to all supported versions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b96bf445a42b1cb2a435854f9825c38253f79a2">http://git.postgresql.org/pg/commitdiff/7b96bf445a42b1cb2a435854f9825c38253f79a2</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Remove xmlparse(document '') test This one test was behaving differently between the ubuntu fix for CVE-2015-7499 and the base "expected" file. It's not worth having yet another version of the expected file for this test, so drop it. Perhaps at some point when all distros have settled down to the same behavior on this test, it can be restored. Problem found by me on libxml2 (2.9.1+dfsg1-3ubuntu4.6). Solution suggested by Tom Lane. Backpatch to 9.5, where the test was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2f1765ce0770e813971336bb4603099d24cbe57">http://git.postgresql.org/pg/commitdiff/e2f1765ce0770e813971336bb4603099d24cbe57</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Add missing CHECK_FOR_INTERRUPTS in lseg_inside_poly. Apparently, there are bugs in this code that cause it to loop endlessly. That bug still needs more research, but in the meantime it's clear that the loop is missing a check for interrupts so that it can be cancelled timely. Backpatch to 9.1 -- this has been missing since 49475aab8d0d. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d8f3d5d11f7304c82ce1383bbb491ec6abcffc4">http://git.postgresql.org/pg/commitdiff/0d8f3d5d11f7304c82ce1383bbb491ec6abcffc4</a></li>

<li>Rework internals of changing a type's ownership. This is necessary so that REASSIGN OWNED does the right thing with composite types, to wit, that it also alters ownership of the type's pg_class entry -- previously, the pg_class entry remained owned by the original user, which caused later other failures such as the new owner's inability to use ALTER TYPE to rename an attribute of the affected composite. Also, if the original owner is later dropped, the pg_class entry becomes owned by a non-existant user which is bogus. To fix, create a new routine AlterTypeOwner_oid which knows whether to pass the request to ATExecChangeOwner or deal with it directly, and use that in shdepReassignOwner rather than calling AlterTypeOwnerInternal directly. AlterTypeOwnerInternal is now simpler in that it only modifies the pg_type entry and recurses to handle a possible array type; higher-level tasks are handled by either AlterTypeOwner directly or AlterTypeOwner_oid. I took the opportunity to add a few more objects to the test rig for REASSIGN OWNED, so that more cases are exercised. Additional ones could be added for superuser-only-ownable objects (such as FDWs and event triggers) but I didn't want to push my luck by adding a new superuser to the tests on a backpatchable bug fix. Per bug #13666 reported by Chris Pacejo. Backpatch to 9.5. (I would back-patch this all the way back, except that it doesn't apply cleanly in 9.4 and earlier because 59367fdf9 wasn't backpatched. If we decide that we need this in earlier branches too, we should backpatch both.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/756e7b4c9db1fa713b886068643257c823baddaf">http://git.postgresql.org/pg/commitdiff/756e7b4c9db1fa713b886068643257c823baddaf</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Add missing cleanup logic in pg_rewind/t/005_same_timeline.pl test. Per Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db81329eed6b1f54bbdd9049bcdba556f2b4737d">http://git.postgresql.org/pg/commitdiff/db81329eed6b1f54bbdd9049bcdba556f2b4737d</a></li>

<li>Update 9.5 release notes through today. Also do another round of copy-editing, and fix up remaining FIXME items. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bfc7f5dd5dc641b475c27b872d6df21c20c75af1">http://git.postgresql.org/pg/commitdiff/bfc7f5dd5dc641b475c27b872d6df21c20c75af1</a></li>

<li>Document use of Subject Alternative Names in SSL server certificates. Commit acd08d764 did not bother with updating the documentation. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0625dbb0b96e2ecd557eb5bcdc458679123951db">http://git.postgresql.org/pg/commitdiff/0625dbb0b96e2ecd557eb5bcdc458679123951db</a></li>

<li>Cope with Readline's failure to track SIGWINCH events outside of input. It emerges that libreadline doesn't notice terminal window size change events unless they occur while collecting input. This is easy to stumble over if you resize the window while using a pager to look at query output, but it can be demonstrated without any pager involvement. The symptom is that queries exceeding one line are misdisplayed during subsequent input cycles, because libreadline has the wrong idea of the screen dimensions. The safest, simplest way to fix this is to call rl_reset_screen_size() just before calling readline(). That causes an extra ioctl(TIOCGWINSZ) for every command; but since it only happens when reading from a tty, the performance impact should be negligible. A more valid objection is that this still leaves a tiny window during entry to readline() wherein delivery of SIGWINCH will be missed; but the practical consequences of that are probably negligible. In any case, there doesn't seem to be any good way to avoid the race, since readline exposes no functions that seem safe to call from a generic signal handler --- rl_reset_screen_size() certainly isn't. It turns out that we also need an explicit rl_initialize() call, else rl_reset_screen_size() dumps core when called before the first readline() call. rl_reset_screen_size() is not present in old versions of libreadline, so we need a configure test for that. (rl_initialize() is present at least back to readline 4.0, so we won't bother with a test for it.) We would need a configure test anyway since libedit's emulation of libreadline doesn't currently include such a function. Fortunately, libedit seems not to have any corresponding bug. Merlin Moncure, adjusted a bit by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ec477dc8108339dcb6bb944fa93d19cafb6fff7">http://git.postgresql.org/pg/commitdiff/2ec477dc8108339dcb6bb944fa93d19cafb6fff7</a></li>

<li>Fix improper initialization order for readline. Turns out we must set rl_basic_word_break_characters *before* we call rl_initialize() the first time, because it will quietly copy that value elsewhere --- but only on the first call. (Love these undocumented dependencies.) I broke this yesterday in commit 2ec477dc8108339d; like that commit, back-patch to all active branches. Per report from Pavel Stehule. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aee7705be5b75d8e7873a32c4a0dd0afe1ae5928">http://git.postgresql.org/pg/commitdiff/aee7705be5b75d8e7873a32c4a0dd0afe1ae5928</a></li>

<li>Adjust behavior of single-user -j mode for better initdb error reporting. Previously, -j caused the entire input file to be read in and executed as a single command string. That's undesirable, not least because any error causes the entire file to be regurgitated as the "failing query". Some experimentation suggests a better rule: end the command string when we see a semicolon immediately followed by two newlines, ie, an empty line after a query. This serves nicely to break up the existing examples such as information_schema.sql and system_views.sql. A limitation is that it's no longer possible to write such a sequence within a string literal or multiline comment in a file meant to be read with -j; but there are no instances of such a problem within the data currently used by initdb. (If someone does make such a mistake in future, it'll be obvious because they'll get an unterminated-literal or unterminated-comment syntax error.) Other than that, there shouldn't be any negative consequences; you're not forced to end statements that way, it's just a better idea in most cases. In passing, remove src/include/tcop/tcopdebug.h, which is dead code because it's not included anywhere, and hasn't been for more than ten years. One of the debug-support symbols it purported to describe has been unreferenced for at least the same amount of time, and the other is removed by this commit on the grounds that it was useless: forcing -j mode all the time would have broken initdb. The lack of complaints about that, or about the missing inclusion, shows that no one has tried to use TCOP_DONTUSENEWLINE in many years. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66d947b9d302f1fd6de3d156e6ec61f52e1dc2cb">http://git.postgresql.org/pg/commitdiff/66d947b9d302f1fd6de3d156e6ec61f52e1dc2cb</a></li>

<li>Use just one standalone-backend session for initdb's post-bootstrap steps. Previously, each subroutine in initdb fired up its own standalone backend session. Over time we'd grown as many as fifteen of these sessions, and the cumulative startup and shutdown work for them was getting pretty noticeable. Combining things so that all these steps share a single backend session cuts a good 10% off the total runtime of initdb, more if you're not fsync'ing. The main stumbling block to doing this before was that some of the sessions were run with -j and some not. The improved definition of -j mode implemented by my previous commit makes it possible to fix that by running all the post-bootstrap steps with -j; we just have to use double instead of single newlines to end command strings. (This is only absolutely necessary around the VACUUM and CREATE DATABASE steps, since those can't be run in a transaction block. But it seems best to make them all use double newlines so that the commands remain separate for error-reporting purposes.) A minor disadvantage is that since initdb can't tell how much of its output the backend has executed, we can no longer have the per-step progress reporting initdb used to print. But things are fast enough nowadays that that's not really all that useful anyway. In passing, add more const decoration to some of the static arrays in initdb.c. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4a8812cf64b142685e39a69694c5276601f40e4">http://git.postgresql.org/pg/commitdiff/c4a8812cf64b142685e39a69694c5276601f40e4</a></li>

<li>Remove unreferenced function declarations. datapagemap_create() and datapagemap_destroy() were declared extern, but they don't actually exist anywhere. Per YUriy Zhuravlev and Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d0c50ffa0bdb683c28bfe0e79d23d87111da2aa">http://git.postgresql.org/pg/commitdiff/3d0c50ffa0bdb683c28bfe0e79d23d87111da2aa</a></li>

<li>Adopt a more compact, less error-prone notation for tab completion code. Replace tests like else if (pg_strcasecmp(prev4_wd, "CREATE") == 0 &amp;&amp; pg_strcasecmp(prev3_wd, "TRIGGER") == 0 &amp;&amp; (pg_strcasecmp(prev_wd, "BEFORE") == 0 || pg_strcasecmp(prev_wd, "AFTER") == 0)) with new notation like this: else if (TailMatches4("CREATE", "TRIGGER", MatchAny, "BEFORE|AFTER")) In addition, provide some macros COMPLETE_WITH_LISTn() to reduce the amount of clutter needed to specify a small number of predetermined completion alternatives. This makes the code substantially more compact: tab-complete.c gets over a thousand lines shorter in this patch, despite the addition of a couple of hundred lines of infrastructure for the new notations. The new way of specifying match rules seems a whole lot more readable and less error-prone, too. There's a lot more that could be done now to make matching faster and more reliable; for example I suspect that most of the TailMatches() rules should now be Matches() rules. That would allow them to be skipped after a single integer comparison if there aren't the right number of words on the line, and it would reduce the risk of unintended matches. But for now, (mostly) refrain from reworking any match rules in favor of just converting what we've got into the new notation. Thomas Munro, reviewed by Michael Paquier, some adjustments by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d37b816dc9e8f976c8913296781e08cbd45c5af1">http://git.postgresql.org/pg/commitdiff/d37b816dc9e8f976c8913296781e08cbd45c5af1</a></li>

<li>Add missing COSTS OFF to EXPLAIN commands in rowsecurity.sql. Commit e5e11c8cc added a bunch of EXPLAIN statements without COSTS OFF to the regression tests. This is contrary to project policy since it results in unnecessary platform dependencies in the output (it's just luck that we didn't get buildfarm failures from it). Per gripe from Mike Wilson. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/654218138b819df66c1b90d39a12ca6a75b9ff65">http://git.postgresql.org/pg/commitdiff/654218138b819df66c1b90d39a12ca6a75b9ff65</a></li>

<li>Teach psql's tab completion to consider the entire input string. Up to now, the tab completion logic has only examined the last few words of the current input line; "last few" being originally as few as four words, but lately up to nine words. Furthermore, it only looked at what libreadline considers the current line of input, which made it rather myopic if you split your command across lines. This was tolerable, sort of, so long as the match patterns were only designed to consider the last few words of input; but with the recent addition of HeadMatches() and Matches() matching rules, we really have to do better if we want those to behave sanely. Hence, change the code to break the entire line down into words, and to include any previous lines in the command buffer along with the active readline input buffer. This will be a little bit slower than the previous coding, but some measurements say that even a query of several thousand characters can be parsed in a hundred or so microseconds on modern machines; so it's really not going to be significant for interactive tab completion. To reduce the cost some, I arranged to avoid the per-word malloc calls that used to occur: all the words are now kept in one malloc'd buffer. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d854118c8df8c413d069f7e88bb01b9e18e4c8ed">http://git.postgresql.org/pg/commitdiff/d854118c8df8c413d069f7e88bb01b9e18e4c8ed</a></li>

<li>Remove silly completion for "DELETE FROM tabname ...". psql offered USING, WHERE, and SET in this context, but SET is not a valid possibility here. Seems to have been a thinko in commit f5ab0a14ea83eb6c which added DELETE's USING option. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99ccb2309263183f0f3d838b79f3e07ad8cc6a63">http://git.postgresql.org/pg/commitdiff/99ccb2309263183f0f3d838b79f3e07ad8cc6a63</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Collect the global OR of hasRowSecurity flags for plancache We carry around information about if a given query has row security or not to allow the plancache to use that information to invalidate a planned query in the event that the environment changes. Previously, the flag of one of the subqueries was simply being copied into place to indicate if the query overall included RLS components. That's wrong as we need the global OR of all subqueries. Fix by changing the code to match how fireRIRules works, which is results in OR'ing all of the flags. Noted by Tom. Back-patch to 9.5 where RLS was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5e11c8cca7ae298895430102217fa6d77cfb2a3">http://git.postgresql.org/pg/commitdiff/e5e11c8cca7ae298895430102217fa6d77cfb2a3</a></li>

<li>Improve CREATE POLICY documentation Clarify that SELECT policies are now applied when SELECT rights are required for a given query, even if the query is an UPDATE or DELETE query. Pointed out by Noah. Additionally, note the risk regarding concurrently open transactions where a relation which controls access to the rows of another relation are updated and the rows of the primary relation are also being modified. Pointed out by Peter Geoghegan. Back-patch to 9.5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43cd468cf01007f39312af05c4c92ceb6de8afd8">http://git.postgresql.org/pg/commitdiff/43cd468cf01007f39312af05c4c92ceb6de8afd8</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Provide a way to predefine LWLock tranche IDs. It's a bit cumbersome to use LWLockNewTrancheId(), because the returned value needs to be shared between backends so that each backend can call LWLockRegisterTranche() with the correct ID. So, for built-in tranches, use a hard-coded value instead. This is motivated by an upcoming patch adding further built-in tranches. Andres Freund and Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3fed417452b226d9bd85a3a54d7056b06eb14897">http://git.postgresql.org/pg/commitdiff/3fed417452b226d9bd85a3a54d7056b06eb14897</a></li>

<li>Move buffer I/O and content LWLocks out of the main tranche. Move the content lock directly into the BufferDesc, so that locking and pinning a buffer touches only one cache line rather than two. Adjust the definition of BufferDesc slightly so that this doesn't make the BufferDesc any larger than one cache line (at least on platforms where a spinlock is only 1 or 2 bytes). We can't fit the I/O locks into the BufferDesc and stay within one cache line, so move those to a completely separate tranche. This leaves a relatively limited number of LWLocks in the main tranche, so increase the padding of those remaining locks to a full cache line, rather than allowing adjacent locks to share a cache line, hopefully reducing false sharing. Performance testing shows that these changes make little difference on laptop-class machines, but help significantly on larger servers, especially those with more than 2 sockets. Andres Freund, originally based on an earlier patch by Simon Riggs. Review and cosmetic adjustments (including heavy rewriting of the comments) by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6150a1b08a9fe7ead2b25240be46dddeae9d98e1">http://git.postgresql.org/pg/commitdiff/6150a1b08a9fe7ead2b25240be46dddeae9d98e1</a></li>

<li>Teach mdnblocks() not to create zero-length files. It's entirely surprising that mdnblocks() has the side effect of creating new files on disk, so let's make it not do that. One consequence of the old behavior is that, if running on a damaged cluster that is missing a file, mdnblocks() can recreate the file and allow a subsequent _mdfd_getseg() for a higher segment to succeed. This happens because, while mdnblocks() stops when it finds a segment that is shorter than 1GB, _mdfd_getseg() has no such check, and thus the empty file created by mdnblocks() can allow it to continue its traversal and find higher-numbered segments which remain. It might be a good idea for _mdfd_getseg() to actually verify that each segment it finds is exactly 1GB before proceeding to the next one, but that would involve some additional system calls, so for now I'm just doing this much. Patch by me, per off-list analysis by Kevin Grittner and Rahila Syed. Review by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/049469e7e7cfe0c69d30385952e2576b63230283">http://git.postgresql.org/pg/commitdiff/049469e7e7cfe0c69d30385952e2576b63230283</a></li>

<li>Mark CHECK constraints declared NOT VALID valid if created with table. FOREIGN KEY constraints have behaved this way for a long time, but for some reason the behavior of CHECK constraints has been inconsistent up until now. Amit Langote and Amul Sul, with assorted tweaks by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f27a6b15e6566fba7748d0d9a3fc5bcfd52c4a1b">http://git.postgresql.org/pg/commitdiff/f27a6b15e6566fba7748d0d9a3fc5bcfd52c4a1b</a></li>

<li>Speed up CREATE INDEX CONCURRENTLY's TID sort. Encode TIDs as 64-bit integers to speed up comparisons. This seems to speed things up on all platforms, but is even more beneficial when 8-byte integers are passed by value. Peter Geoghegan. Design suggestions and review by Tom Lane. Review also by Simon Riggs and by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b648b70342fbe712383e8cd76dc8f7feaba9aaa3">http://git.postgresql.org/pg/commitdiff/b648b70342fbe712383e8cd76dc8f7feaba9aaa3</a></li>

<li>Fix typo in comment. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a51698bae86f748279ecedcae018925b5af5b2d">http://git.postgresql.org/pg/commitdiff/9a51698bae86f748279ecedcae018925b5af5b2d</a></li>

<li>Fix copy-and-paste error in logical decoding callback. This could result in the error context misidentifying where the error actually occurred. Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4496226782c47e78b428babbcc16dec4f7329f2b">http://git.postgresql.org/pg/commitdiff/4496226782c47e78b428babbcc16dec4f7329f2b</a></li>

<li>Fix TupleQueueReaderNext not to ignore its nowait argument. This was a silly goof on my (rhaas's) part. Report and fix by Rushabh Lathia. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bdfcb52c5d1446a1f19cc8bf16d44911658bcac">http://git.postgresql.org/pg/commitdiff/2bdfcb52c5d1446a1f19cc8bf16d44911658bcac</a></li>

<li>Remove duplicate word. Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e7b335930200f71115fccd4903d04fe4de42021">http://git.postgresql.org/pg/commitdiff/6e7b335930200f71115fccd4903d04fe4de42021</a></li>

<li>pgbench: Change terminology from "threshold" to "parameter". Per a recommendation from Tomas Vondra, it's more helpful to refer to the value that determines how skewed a Gaussian or exponential distribution is as a parameter rather than a threshold. Since it's not quite too late to get this right in 9.5, where it was introduced, back-patch this. Most of the patch changes only comments and documentation, but a few pgbench messages are altered to match. Fabien Coelho, reviewed by Michael Paquier and by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c7042a7d7871b47dae3c9777c8020e41dedee89">http://git.postgresql.org/pg/commitdiff/3c7042a7d7871b47dae3c9777c8020e41dedee89</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Cube extension kNN support. Introduce distance operators over cubes: &lt;#&gt; taxicab distance, &lt;-&gt; euclidean distance, and &lt;=&gt; Chebyshev distance. Also add kNN support of those distances in GiST opclass. Author: Stas Kelvich <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33bd250f6c4cc309f4eeb657da80f1e7743b3e5c">http://git.postgresql.org/pg/commitdiff/33bd250f6c4cc309f4eeb657da80f1e7743b3e5c</a></li>

<li>Allow to omit boundaries in array subscript. Permit omitting lower, upper, or both boundaries in array subscript for selecting slice of array. Author: YUriy Zhuravlev <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9246af6799819847faa33baf441251003acbb8fe">http://git.postgresql.org/pg/commitdiff/9246af6799819847faa33baf441251003acbb8fe</a></li>

<li>Revert 9246af6799819847faa33baf441251003acbb8fe because I miss too much. Patch is returned to commitfest process. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bbbd807097092c7f292872e7da02eee35d67e54b">http://git.postgresql.org/pg/commitdiff/bbbd807097092c7f292872e7da02eee35d67e54b</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix whitespace <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/529fd74c090c6ea4237631522277441bc3ff657f">http://git.postgresql.org/pg/commitdiff/529fd74c090c6ea4237631522277441bc3ff657f</a></li>

<li>psql: Review of new help output strings <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69e7c44fc66a1d0dcc6021e696d57e200a189888">http://git.postgresql.org/pg/commitdiff/69e7c44fc66a1d0dcc6021e696d57e200a189888</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Amit Langote sent in another revision of a patch to fix an error in find_inheritance_children().</p>

<p>Craig Ringer sent in another revision of a patch to add logical decoding for sequence advances.</p>

<p>Tomas Vondra sent in a patch to postpone building buckets to the end of Hash (in HashJoin).</p>

<p>Aleksander Alekseev sent in another revision of a patch to speed up identification of resource owners, one outcome of which will be to speed up accesses to tables with many partitions.</p>

<p>Daniel Verit&Atilde;&copy; and Pavel St&Auml;&rsaquo;hule traded patches to implement \crosstabview in psql.</p>

<p>Michael Paquier sent in three more revisions of a patch to extend pgbench expressions with functions.</p>

<p>Andreas Karlsson sent in a patch to make it possible to cancel a query which is running the crypt() function with the bf or xdes hashing algorithm by adding a CHECK_FOR_INTERRUPTS() call every round.</p>

<p>Andres Freund sent in a patch to make a faster PageIsVerified() for the all zeroes case and improve scalability of md.c for large relations.</p>

<p>David Rowley sent in three more revisions of a patch to improve for joins where outer side is unique.</p>

<p>Aleksander Alekseev sent in a patch to ensure that the initial sizes of the PROCLOCK and LOCK hash tables be the same as max_size, saving time that would have been spent expanding them.</p>

<p>Haribabu Kommi sent in another revision of a patch to add parallel aggregation.</p>

<p>Tomas Vondra sent in a patch to add a bloom filter in Hash Joins with batches.</p>

<p>Haribabu Kommi sent in another revision of a patch to add a pg_hba_lookup() function to get all matching pg_hba.conf entries.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench stats per script, etc.</p>

<p>Haribabu Kommi sent in another revision of a patch to implement multi-tenancy with RLS.</p>

<p>Jesper Pedersen sent in another revision of a patch to add new LWLOCK_STATS statistics.</p>

<p>Tatsuro Yamada sent in a patch to fix a typo in regress/sql/privileges.sql.</p>

<p>David Rowley sent in another revision of a patch to implement combining aggregates, useful in parallelizing aggregation.</p>

<p>SAWADA Masahiko sent in another revision of a patch to support for N synchronous standby servers for N&gt;1.</p>

<p>Amit Langote sent in a patch to fix a comment typo in pg_upgrade.c.</p>

<p>Aleksander Alekseev sent in a patch to fix lock contention for HASHHDR.mutex.</p>

<p>Michael Paquier sent in a patch to fix a psql call in pg_upgrade.</p>

<p>SAWADA Masahiko sent in another revision of a patch to add a "frozen" bit to the visibility map.</p>

<p>Peter Geoghegan sent in another revision of a patch to reuse abbreviated keys during second pass of ordered [set] aggregates.</p>

<p>Ashutosh Bapat and Robert Haas traded patches to allow foreign scans to be sorted on the remote side.</p>

<p>Alexander Korotkov sent in a patch to improve statistics for array types.</p>

<p>Michael Paquier sent in a patch to add a system view and function to report WAL receiver.</p>

<p>Robert Haas sent in another revision of a patch to implement parallel joins, and better parallel explain.</p>

<p>Artur Zakirov sent in a patch to add fuzzy substring searching with the pg_trgm extension.</p>

<p>David Rowley sent in a patch to wrap error code paths in unlikely().</p>

<p>Mithun Cy sent in a patch to cache data in GetSnapshotData().</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add a pg_size_bytes() to transform human-readable byte sizes into bytes.</p>

<p>Michael Paquier sent in another revision of a patch to reduce some unneeded WAL logging in hot standby.</p>