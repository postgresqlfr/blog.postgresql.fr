---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 janvier 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/01/13/Nouvelles-hebdomadaires-de-PostgreSQL-12-janvier-2014"
---


<p>Les programmes du FOSDEM et du FOSDEM/PGDay ont &eacute;t&eacute; publi&eacute;s&nbsp;: 

<a target="_blank" href="http://www.postgresql.eu/events/schedule/fosdem2014/">http://www.postgresql.eu/events/schedule/fosdem2014/</a></p>

<p>Le PGDay Nordique 2014 aura lieu &agrave; Stockholm (Su&egrave;de) &agrave; l'h&ocirc;tel Hilton le 20 mars 2014. L'appel &agrave; conf&eacute;renciers est ouvert jusqu'au 2 f&eacute;vrier 2014&nbsp;: 

<a target="_blank" href="http://2014.nordicpgday.org/">http://2014.nordicpgday.org/</a></p>

<p>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>psycopg2 2.5.2, un connecteur Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2014/01/07/psycopg-252-released/">http://initd.org/psycopg/articles/2014/01/07/psycopg-252-released/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>FOSDEM PGDay, une conf&eacute;rence d'une journ&eacute;e, tenue avant le FOSDEM &agrave; Bruxelles, aura lieu le 31 janvier 2014. D&eacute;tails&nbsp;: 

<a target="_blank" href="http://fosdem2014.pgconf.eu/">http://fosdem2014.pgconf.eu/</a> <a target="_blank" href="http://fosdem2014.pgconf.eu/registration/">http://fosdem2014.pgconf.eu/registration/</a></li>

<li>La 7<sup>&egrave;me</sup> conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>" (P2D2), organis&eacute;e par le CSPUG (PUG tch&egrave;que et slovaque), aura lieu le 6 f&eacute;vrier 2014 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Infos en langue tch&egrave;que ci-apr&egrave;s. L'appel &agrave; conf&eacute;renciers court jusqu'au 3 janvier 2014&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la PGConf NYC 2014 court jusqu'au 10 janvier 2014. Les notifications seront envoy&eacute;es le 15 janvier&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGCon 2014 est lanc&eacute;. Date limite&nbsp;: 19 janvier 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140113042539.GA16719@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove bogus -K option from pg_dump. I added it to the getopt call by accident in commit 691e595dd9c7786d37d73ccd327f8c2b6f0dace6. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10a82cda67731941c18256e009edad4a784a2994">http://git.postgresql.org/pg/commitdiff/10a82cda67731941c18256e009edad4a784a2994</a></li>

<li>Silence compiler warning on MSVC. MSVC doesn't know that elog(ERROR) doesn't return, and gives a warning about missing return. Silence that. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f68220df92cb56f0452919f51eeef16262ec8f3b">http://git.postgresql.org/pg/commitdiff/f68220df92cb56f0452919f51eeef16262ec8f3b</a></li>

<li>Fix bug in determining when recovery has reached consistency. When starting WAL replay from an online checkpoint, the last replayed WAL record variable was initialized using the checkpoint record's location, even though the records between the REDO location and the checkpoint record had not been replayed yet. That was noted as "slightly confusing" but harmless in the comment, but in some cases, it fooled CheckRecoveryConsistency to incorrectly conclude that we had already reached a consistent state immediately at the beginning of WAL replay. That caused the system to accept read-only connections in hot standby mode too early, and also PANICs with message "WAL contains references to invalid pages". Fix by initializing the variables to the REDO location instead. In 9.2 and above, change CheckRecoveryConsistency() to use lastReplayedEndRecPtr variable when checking if backup end location has been reached. It was inconsistently using EndRecPtr for that check, but lastReplayedEndRecPtr when checking min recovery point. It made no difference before this patch, because in all the places where CheckRecoveryConsistency was called the two variables were the same, but it was always an accident waiting to happen, and would have been wrong after this patch anyway. Report and analysis by Tomonari Katsumata, bug #8686. Backpatch to 9.0, where hot standby was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d59ff6c110162fc6f3f62b160ff451bfda871af0">http://git.postgresql.org/pg/commitdiff/d59ff6c110162fc6f3f62b160ff451bfda871af0</a></li>

<li>Fix pause_at_recovery_target + recovery_target_inclusive combination. If pause_at_recovery_target is set, recovery pauses *before* applying the target record, even if recovery_target_inclusive is set. If you then continue with pg_xlog_replay_resume(), it will apply the target record before ending recovery. In other words, if you log in while it's paused and verify that the database looks OK, ending recovery changes its state again, possibly destroying data that you were tring to salvage with PITR. Backpatch to 9.1, this has been broken since pause_at_recovery_target was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3739e5ab93afb21b69da2e42f6e161ef63aa95c8">http://git.postgresql.org/pg/commitdiff/3739e5ab93afb21b69da2e42f6e161ef63aa95c8</a></li>

<li>If multiple recovery_targets are specified, use the latest one. The docs say that only one of recovery_target_xid, recovery_target_time, or recovery_target_name can be specified. But the code actually did something different, so that a name overrode time, and xid overrode both time and name. Now the target specified last takes effect, whether it's an xid, time or name. With this patch, we still accept multiple recovery_target settings, even though docs say that only one can be specified. It's a general property of the recovery.conf file parser that you if you specify the same option twice, the last one takes effect, like with postgresql.conf. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/815d71deed5df2a91b06da76edbe5bc64965bfea">http://git.postgresql.org/pg/commitdiff/815d71deed5df2a91b06da76edbe5bc64965bfea</a></li>

<li>Refactor checking whether we've reached the recovery target. Makes the replay loop slightly more readable, by separating the concerns of whether to stop and whether to delay, and how to extract the timestamp from a record. This has the user-visible change that the timestamp of the last applied record is now updated after actually applying it. Before, it was updated just before applying it. That meant that pg_last_xact_replay_timestamp() could return the timestamp of a commit record that is in process of being replayed, but not yet applied. Normally the difference is small, but if min_recovery_apply_delay is set, there could be a significant delay between reading a record and applying it. Another behavioral change is that if you recover to a restore point, we stop after the restore point record, not before it. It makes no difference as far as running queries on the server is concerned, as applying a restore point record changes nothing, but if examine the timeline history you will see that the new timeline branched off just after the restore point record, not before it. One practical consequence is that if you do PITR to the new timeline, and set recovery target to the same named restore point again, it will find and stop recovery at the same restore point. Conceptually, I think it makes more sense to consider the restore point as part of the new timeline's history than not. In principle, setting the last-replayed timestamp before actually applying the record was a bug all along, but it doesn't seem worth the risk to backpatch, since min_recovery_apply_delay was only added in 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c945af80cfdaf72adb91d6688fb3a4c4f17c0757">http://git.postgresql.org/pg/commitdiff/c945af80cfdaf72adb91d6688fb3a4c4f17c0757</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add more use of psprintf() 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edc43458d797a5956f4bf39af18cf62abb0077db">http://git.postgresql.org/pg/commitdiff/edc43458d797a5956f4bf39af18cf62abb0077db</a></li>

<li>pg_upgrade: Fix fatal error handling. Restore exiting when pg_log(PG_FATAL) is called directly instead of calling pg_fatal(). Fault introduced in 264aa14a2f687eba8c8cc2a5b6cbd6397973da98. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca607b155e86ce529fc9ac322a232f264cda9ab6">http://git.postgresql.org/pg/commitdiff/ca607b155e86ce529fc9ac322a232f264cda9ab6</a></li>

<li>pgcrypto: Make header files stand alone. pgp.h used to require including mbuf.h and px.h first. Include those in pgp.h, so that it can be used without prerequisites. Remove mbuf.h inclusions in .c files where mbuf.h features are not used directly. (px.h was always used.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10a3b165a32e9dd116ba340dd2d2f8c77895418e">http://git.postgresql.org/pg/commitdiff/10a3b165a32e9dd116ba340dd2d2f8c77895418e</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid including tablespaces inside PGDATA twice in base backups. If a tablespace was crated inside PGDATA it was backed up both as part of the PGDATA backup and as the backup of the tablespace. Avoid this by skipping any directory inside PGDATA that contains one of the active tablespaces. Dimitri Fontaine and Magnus Hagander 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b168c5ef2730d0ecaa7462f0b90345b0a3798c16">http://git.postgresql.org/pg/commitdiff/b168c5ef2730d0ecaa7462f0b90345b0a3798c16</a></li>

<li>Move permissions check from do_pg_start_backup to pg_start_backup. And the same for do_pg_stop_backup. The code in do_pg_* is not allowed to access the catalogs. For manual base backups, the permissions check can be handled in the calling function, and for streaming base backups only users with the required permissions can get past the authentication step in the first place. Reported by Antonin Houska, diagnosed by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9544cc0d657ea09d27667c8c70302b06fbe0121b">http://git.postgresql.org/pg/commitdiff/9544cc0d657ea09d27667c8c70302b06fbe0121b</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix LATERAL references to target table of UPDATE/DELETE. I failed to think much about UPDATE/DELETE when implementing LATERAL . The implemented behavior ended up being that subqueries in the FROM or USING clause (respectively) could access the update/delete target table as though it were a lateral reference; which seems fine if they said LATERAL, but certainly ought to draw an error if they didn't. Fix it so you get a suitable error when you omit LATERAL. Per report from Emre Hasegeli. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c051c90082da0b7e5bcaf9aabcbd4f361137cdc">http://git.postgresql.org/pg/commitdiff/0c051c90082da0b7e5bcaf9aabcbd4f361137cdc</a></li>

<li>Save a few cycles in advance_transition_function(). Keep a pre-initialized FunctionCallInfoData in AggStatePerAggData, and re-use that at each row instead of doing InitFunctionCallInfoData each time. This saves only half a dozen assignments and maybe some stack manipulation, and yet that seems to be good for a percent or two of the overall query run time for simple aggregates such as count(*). The cost is that the FunctionCallInfoData (which is about a kilobyte, on 64-bit machines) stays allocated for the duration of the query instead of being short-lived stack data. But we're already paying an equivalent space cost for each regular FuncExpr or OpExpr node, so I don't feel bad about paying it for aggregate functions. The code seems a little cleaner this way too, since the number of things passed to advance_transition_function decreases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6336b8b5772b9856d65ef967e0b9f748f0f7b0b">http://git.postgresql.org/pg/commitdiff/e6336b8b5772b9856d65ef967e0b9f748f0f7b0b</a></li>

<li>Avoid extra AggCheckCallContext() checks in ordered-set aggregates. In the transition functions, we don't really need to recheck this after the first call. I had been feeling paranoid about possibly getting a non-null argument value in some other context; but it's probably game over anyway if we have a non-null "internal" value that's not what we are expecting. In the final functions, the general convention in pre-existing final functions seems to be that an Assert() is good enough, so do it like that here too. This seems to save a few tenths of a percent of overall query runtime, which isn't much, but still it's just overhead if there's not a plausible case where the checks would fire. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/847e46abc92333a5a948d8fa886604832c1db238">http://git.postgresql.org/pg/commitdiff/847e46abc92333a5a948d8fa886604832c1db238</a></li>

<li>Fix "cannot accept a set" error when only some arms of a CASE return a set. In commit c1352052ef1d4eeb2eb1d822a207ddc2d106cb13, I implemented an optimization that assumed that a function's argument expressions would either always return a set (ie multiple rows), or always not. This is wrong however: we allow CASE expressions in which some arms return a set of some type and others just return a scalar of that type. There may be other examples as well. To fix, replace the run-time test of whether an argument returned a set with a static precheck (expression_returns_set). This adds a little bit of query startup overhead, but it seems barely measurable. Per bug #8228 from David Johnston. This has been broken since 8.0, so patch all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/080b7db72ebbec22580237631d6b07d0e1147b01">http://git.postgresql.org/pg/commitdiff/080b7db72ebbec22580237631d6b07d0e1147b01</a></li>

<li>We don't need to include pg_sema.h in s_lock.h anymore. Minor improvement to commit daa7527afc2274432094ebe7ceb03aa41f916607: s_lock.h no longer has any need to mention PGSemaphoreData, so we can rip out the #include that supplies that. In a non-HAVE_SPINLOCKS build, this doesn't really buy much since we still need the #include in spin.h --- but everywhere else, this reduces #include footprint by some trifle, and helps keep the different locking facilities separate. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/220b34331f77effdb46798ddd7cca0cffc1b2858">http://git.postgresql.org/pg/commitdiff/220b34331f77effdb46798ddd7cca0cffc1b2858</a></li>

<li>Remove unnecessary local variables to work around an icc optimization bug. Buildfarm member dunlin has been crashing since commit 8b49a60, but other machines seem fine with that code. It turns out that removing the local variables in ordered_set_startup() that are copies of fields in "qstate" dodges the problem. This might cost a few cycles on register-rich machines, but it's probably a wash on others, and in any case this code isn't performance-critical. Thanks to Jeremy Drake for off-list investigation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/faab7a957d31389f4abfd83784f622c91d076f49">http://git.postgresql.org/pg/commitdiff/faab7a957d31389f4abfd83784f622c91d076f49</a></li>

<li>Add another regression test cross-checking operator and function comments. Add a query that lists all the functions that are operator implementation functions and have a SQL comment that doesn't just say "implementation of XYZ operator". (Note that the preceding test checks that such functions' comments exactly match the corresponding operators' comments.) While it's not forbidden to add more functions to this list, that should only be done when we're encouraging users to use either the function or operator syntax for the functionality, which is a fairly rare situation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28233ffaa436852218113d34aa79b7e54f470ed7">http://git.postgresql.org/pg/commitdiff/28233ffaa436852218113d34aa79b7e54f470ed7</a></li>

<li>Fix compute_scalar_stats() for case that all values exceed WIDTH_THRESHOLD. The standard typanalyze functions skip over values whose detoasted size exceeds WIDTH_THRESHOLD (1024 bytes), so as to limit memory bloat during ANALYZE. However, we (I think I, actually :-() failed to consider the possibility that *every* non-null value in a column is too wide. While compute_minimal_stats() seems to behave reasonably anyway in such a case, compute_scalar_stats() just fell through and generated no pg_statistic entry at all. That's unnecessarily pessimistic: we can still produce valid stanullfrac and stawidth values in such cases, since we do include too-wide values in the average-width calculation. Furthermore, since the general assumption in this code is that too-wide values are probably all distinct from each other, it seems reasonable to set stadistinct to -1 ("all distinct"). Per complaint from Kadri Raudsepp. This has been like this since roughly neolithic times, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6286526207d53e5b31968103adb89b4c9cd21499">http://git.postgresql.org/pg/commitdiff/6286526207d53e5b31968103adb89b4c9cd21499</a></li>

<li>Fix possible crashes due to using elog/ereport too early in startup. Per reports from Andres Freund and Luke Campbell, a server failure during set_pglocale_pgservice results in a segfault rather than a useful error message, because the infrastructure needed to use ereport hasn't been initialized; specifically, MemoryContextInit hasn't been called. One known cause of this is starting the server in a directory it doesn't have permission to read. We could try to prevent set_pglocale_pgservice from using anything that depends on palloc or elog, but that would be messy, and the odds of future breakage seem high. Moreover there are other things being called in main.c that look likely to use palloc or elog too --- perhaps those things shouldn't be there, but they are there today. The best solution seems to be to move the call of MemoryContextInit to very early in the backend's real main() function. I've verified that an elog or ereport occurring immediately after that is now capable of sending something useful to stderr. I also added code to elog.c to print something intelligible rather than just crashing if MemoryContextInit hasn't created the ErrorContext. This could happen if MemoryContextInit itself fails (due to malloc failure), and provides some future-proofing against someone trying to sneak in new code even earlier in server startup. Back-patch to all supported branches. Since we've only heard reports of this type of failure recently, it may be that some recent change has made it more likely to see a crash of this kind; but it sure looks like it's broken all the way back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/910bac5953012198e210848660ea31f27ab08abc">http://git.postgresql.org/pg/commitdiff/910bac5953012198e210848660ea31f27ab08abc</a></li>

<li>Disallow LATERAL references to the target table of an UPDATE/DELETE. On second thought, commit 0c051c90082da0b7e5bcaf9aabcbd4f361137cdc was over-hasty: rather than allowing this case, we ought to reject it for now. That leaves the field clear for a future feature that allows the target table to be re-specified in the FROM (or USING) clause, which will enable left-joining the target table to something else. We can then also allow LATERAL references to such an explicitly re-specified target table. But allowing them right now will create ambiguities or worse for such a feature, and it isn't something we documented 9.3 as supporting. While at it, add a convenience subroutine to avoid having several copies of the ereport for disalllowed-LATERAL-reference cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/158b7fa6a34006bdc70b515e14e120d3e896589b">http://git.postgresql.org/pg/commitdiff/158b7fa6a34006bdc70b515e14e120d3e896589b</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update copyright for 2014. Update all files in head, and files COPYRIGHT and legal.sgml in all back branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e04792a1cbd1763edf72474f6b1fbad2cd0ad31">http://git.postgresql.org/pg/commitdiff/7e04792a1cbd1763edf72474f6b1fbad2cd0ad31</a></li>

<li>Move username lookup functions from /port to /common. Per suggestion from Peter E and Alvaro 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/111022eac64579cc12d20e33146ce01717562b29">http://git.postgresql.org/pg/commitdiff/111022eac64579cc12d20e33146ce01717562b29</a></li>

<li>Adjust pg_upgrade for move of username lookup functions to /common 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/850ade3e32ea12e0c6b2d10c6b628772bf851727">http://git.postgresql.org/pg/commitdiff/850ade3e32ea12e0c6b2d10c6b628772bf851727</a></li>

<li>docs: remove undocumented assign syntax in plpgsql examples. Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd2ace802811c333b0b4e1a28b138fd4774745f3">http://git.postgresql.org/pg/commitdiff/fd2ace802811c333b0b4e1a28b138fd4774745f3</a></li>

<li>Fix pg_dumpall on pre-8.1 servers. rolname did not exist in pg_shadow. Backpatch to 9.3 Report by Andrew Gierth via IRC 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb953ad164ade6ece0c8b8d02ae155980c967d8b">http://git.postgresql.org/pg/commitdiff/bb953ad164ade6ece0c8b8d02ae155980c967d8b</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reduce the number of semaphores used under --disable-spinlocks. Instead of allocating a semaphore from the operating system for every spinlock, allocate a fixed number of semaphores (by default, 1024) from the operating system and multiplex all the spinlocks that get created onto them. This could self-deadlock if a process attempted to acquire more than one spinlock at a time, but since processes aren't supposed to execute anything other than short stretches of straight-line code while holding a spinlock, that shouldn't happen. One motivation for this change is that, with the introduction of dynamic shared memory, it may be desirable to create spinlocks that last for less than the lifetime of the server. Without this change, attempting to use such facilities under --disable-spinlocks would quickly exhaust any supply of available semaphores. Quite apart from that, it's desirable to contain the quantity of semaphores needed to run the server simply on convenience grounds, since using too many may make it harder to get PostgreSQL running on a new platform, which is mostly the point of --disable-spinlocks in the first place. Patch by me; review by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/daa7527afc2274432094ebe7ceb03aa41f916607">http://git.postgresql.org/pg/commitdiff/daa7527afc2274432094ebe7ceb03aa41f916607</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Changed regression test to ecpg test suite for alignment problem just with last commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/192b4aacad45c16a8a9341644479125977366dab">http://git.postgresql.org/pg/commitdiff/192b4aacad45c16a8a9341644479125977366dab</a></li>

<li>Fix descriptor output in ECPG. While working on most platforms the old way sometimes created alignment problems. This should fix it. Also the regresion tests were updated to test for the reported case. Report and fix by MauMau &lt;maumau307@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d685e2424967509f004d9eb6d005dfb58e21d837">http://git.postgresql.org/pg/commitdiff/d685e2424967509f004d9eb6d005dfb58e21d837</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Accept pg_upgraded tuples during multixact freezing. The new MultiXact freezing routines introduced by commit 8e9a16ab8f7 neglected to consider tuples that came from a pg_upgrade'd database; a vacuum run that tried to freeze such tuples would die with an error such as ERROR: MultiXactId 11415437 does no longer exist -- apparent wraparound To fix, ensure that GetMultiXactIdMembers is allowed to return empty multis when the infomask bits are right, as is done in other callsites. Per trouble report from F-Secure. In passing, fix a copy&amp;paste bug reported by Andrey Karpov from VIVA64 from their PVS-Studio static checked, that instead of setting relminmxid to Invalid, we were setting relfrozenxid twice. Not an important mistake because that code branch is about relations for which we don't use the frozenxid/minmxid values at all in the first place, but seems to warrants a fix nonetheless. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/423e1211a86df0d0dd8914223137edbfd4d52400">http://git.postgresql.org/pg/commitdiff/423e1211a86df0d0dd8914223137edbfd4d52400</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove DESCR entries for json operator functions. Per -hackers discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11829ff8b2c877469845c08e5966a704b814ca5f">http://git.postgresql.org/pg/commitdiff/11829ff8b2c877469845c08e5966a704b814ca5f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robert Haas sent in a patch to keep lwlocks in a hash table for dynamic shared memory.</li>

<li>Rajeev Rastogi sent in a patch to fix a case where PostgreSQL as win32 service does not start.</li>

<li>Dean Rasheed sent in three more revisions of a patch to make updateable security barrier views.</li>

<li>Christian Ullrich sent in a patch to prevent Windows from stopping unnecessarily when running in console and a random control-C gets sent.</li>

<li>Ronan Dunklau sent in two revisions of a patch to implement triggers on foreign tables.</li>

<li>Tom Lane sent in a patch to speed up nodeAgg by avoiding redoing InitFunctionCallInfoData for each row.</li>

<li>Dilip Kumar sent in a patch to implement a machine-readable pg_controldata.</li>

<li>Gabriele Bartolini sent in two more revisions of a patch to implement a pg_stat_archiver view.</li>

<li>Peter Geoghegan and Heikki Linnakangas traded patches to implement INSERT ... ON DUPLICATE KEY LOCK FOR UPDATE.</li>

<li>Pavel Raiskup sent in another revision of a patch to make the locale comparison more tolerant.</li>

<li>Andreas Karlsson sent in another revision of a patch to include planning time in EXPLAIN [ANALYZE].</li>

<li>Alexander Korotkov sent in another revision of a patch to improve GIN by having it store more information.</li>

<li>Peter Eisentraut sent in a patch to integrate pg_upgrade analyze_new_cluster.sh into vacuumdb.</li>

<li>Oleg Bartunov sent in another revision of a patch to implement an efficient on-disk representation of nested hstores. Andrew Dunstan used this to add those efficiencies to JSONB. Erik Rijkers pitched in some documentation fixes.</li>

<li>Oskari SaarEnmaa sent in a patch allow the default log_min_error_statement to be overridden per SQLSTATE.</li>

<li>Marko (johto) Tiikkaja sent in a patch to display oprcode and its volatility in \do+.</li>

<li>Etsuro Fujita sent in another revision of a patch to show lossy heap block info in EXPLAIN ANALYZE for bitmap heap scan.</li>

<li>Amit Kapila sent in a patch to fixes both the display of wrong file name and usage of PG_AUTOCONF_FILENAME in ALTER SYSTEM.</li>

<li>Amit Kapila sent in another revision of a patch to improve performance of update operations by reducing the WAL they generate.</li>

<li>Fabr&iacute;zio de Royes Mello sent in two revisions of a patch to remove the newlines at end of generated SQL in src/bin/scripts.</li>

<li>Heikki Linnakangas sent in a patch to add a recovery target called 'immediate' which stops recovery at the earliest time it can do so successfully.</li>

<li>Pavel Stehule sent in two revisions of a patch to allow multiple PL/pgsql plugins.</li>

<li>Oskari Saarenmaa sent in a patch to implement gen_random_uuid().</li>

<li>Steeve Lennmark sent in three revisions of a patch to enable relocating tablespaces in pg_basebackup.</li>

<li>Robert Haas sent in a patch to create a LWLock array for dynamic shared memory.</li>

<li>Bruce Momjian sent in a patch to update pg_resetxlog.c in light of the earlier update to Autoconf 2.69.</li>

<li>David Rowley sent in another revision of a patch to implement inverse transition functions for aggregates.</li>

<li>Craig Ringer sent in a patch to fix double-inclusion of pg_config_os.h when building extensions with Visual Studio.</li>

<li>Amit Kapila sent in a patch to enable retaining dynamic shared memory segments for postmaster lifetime.</li>

<li>Pavel Stehule sent in another revision of a patch to implement an efficient make_timestamp() function which only takes numeric inputs.</li>

<li>Marko (johto) Tiikkaja sent in a patch to make the PL/pgsql version of SELECT ... INTO error out instead of producing unexpected results silently when fed more than one row.</li>

</ul>