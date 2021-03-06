---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 16 mars 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/03/28/Nouvelles-hebdomadaires-de-PostgreSQL-16-mars-2014"
---


<p>Surveillez l'arriv&eacute;e des correctifs 9.3.4, etc. qui ne tarderont plus, et pr&eacute;parez-vous &agrave; mettre &agrave; jour.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>MJSQLView Version 3.48, une interface graphique en Java et compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://myjsqlview.org">http://myjsqlview.org</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay Nordique 2014 aura lieu &agrave; Stockholm (Su&egrave;de) &agrave; l'h&ocirc;tel Hilton le 20 mars 2014&nbsp;: 

<a target="_blank" href="http://2014.nordicpgday.org/">http://2014.nordicpgday.org/</a></li>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140317065804.GA2948@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Teach on_exit_reset() to discard pending cleanups for dsm. If a postmaster child invokes fork() and then calls on_exit_reset, that should be sufficient to let it exit() without breaking anything, but dynamic shared memory broke that by not updating on_exit_reset() to discard callbacks registered with dynamic shared memory segments. Per investigation of a complaint from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb9a0c7987466b130fbced01ab5d5481cf3a16df">http://git.postgresql.org/pg/commitdiff/cb9a0c7987466b130fbced01ab5d5481cf3a16df</a></li>

<li>Allow logical decoding via the walsender interface. In order for this to work, walsenders need the optional ability to connect to a database, so the "replication" keyword now allows true or false, for backward-compatibility, and the new value "database" (which causes the "dbname" parameter to be respected). walsender needs to loop not only when idle but also when sending decoded data to the user and when waiting for more xlog data to decode. This means that there are now three separate loops inside walsender.c; although some refactoring has been done here, this is still a bit ugly. Andres Freund, with contributions from &Aacute;lvaro Herrera, and further review by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a991ef8692ed0d170b44958a81a6bd70e90585c">http://git.postgresql.org/pg/commitdiff/5a991ef8692ed0d170b44958a81a6bd70e90585c</a></li>

<li>Allow dynamic shared memory segments to be kept until shutdown. Amit Kapila, reviewed by Kyotaro Horiguchi, with some further changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8722017bbcbc95e311bbaa6d21cd028e296e5e35">http://git.postgresql.org/pg/commitdiff/8722017bbcbc95e311bbaa6d21cd028e296e5e35</a></li>

<li>Comment fixes related to logical decoding. Andres Freund, per complaints by Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/890194f14d6ff6838d79215b8ba62786185aa9a2">http://git.postgresql.org/pg/commitdiff/890194f14d6ff6838d79215b8ba62786185aa9a2</a></li>

<li>Fix incorrect assertion about historical snapshots. Also fix some nearby comments. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/336a578b8c8866490e0d9069f10c17ba14f4705a">http://git.postgresql.org/pg/commitdiff/336a578b8c8866490e0d9069f10c17ba14f4705a</a></li>

<li>test_decoding: Documentation fix. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0b4c355c2f4e26735d28372c49f4661621988f2">http://git.postgresql.org/pg/commitdiff/a0b4c355c2f4e26735d28372c49f4661621988f2</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix tracking of psql script line numbers during \copy from another place. Commit 08146775acd8bfe0fcc509c71857abb928697171 changed do_copy() to temporarily scribble on pset.cur_cmd_source. That was a mighty ugly bit of code in any case, but in particular it broke handleCopyIn's ability to tell whether it was reading from the current script source file (in which case pset.lineno should be incremented for each line of COPY data), or from someplace else (in which case it shouldn't). The former case still worked, the latter not so much. The visible effect was that line numbers reported for errors in a script file would be wrong if there were an earlier \copy that was reading anything other than inline-in-the-script-file data. To fix, introduce another pset field that holds the file do_copy wants the COPY code to use. This is a little bit ugly, but less so than passing the file down explicitly through several layers that aren't COPY-specific. Extracted from a larger patch by Kumar Rajeev Rastogi; that patch also changes printing of COPY command tags, which is not a bug fix and shouldn't get back-patched. This particular idea was from a suggestion by Amit Khandekar, if I'm reading the thread correctly. Back-patch to 9.2 where the faulty code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e85a5ffba8ae559b612b6fbc07acf1b16636887e">http://git.postgresql.org/pg/commitdiff/e85a5ffba8ae559b612b6fbc07acf1b16636887e</a></li>

<li>Avoid transaction-commit race condition while receiving a NOTIFY message. Use TransactionIdIsInProgress, then TransactionIdDidCommit, to distinguish whether a NOTIFY message's originating transaction is in progress, committed, or aborted. The previous coding could accept a message from a transaction that was still in-progress according to the PGPROC array; if the client were fast enough at starting a new transaction, it might fail to see table rows added/updated by the message-sending transaction. Which of course would usually be the point of receiving the message. We noted this type of race condition long ago in tqual.c, but async.c overlooked it. The race condition probably cannot occur unless there are multiple NOTIFY senders in action, since an individual backend doesn't send NOTIFY signals until well after it's done committing. But if two senders commit in close succession, it's certainly possible that we could see the second sender's message within the race condition window while responding to the signal from the first one. Per bug #9557 from Marko Tiikkaja. This patch is slightly more invasive than what he proposed, since it removes the now-redundant TransactionIdDidAbort call. Back-patch to 9.0, where the current NOTIFY implementation was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7bae0284eeb0863220260e0d5ac80f0b37053690">http://git.postgresql.org/pg/commitdiff/7bae0284eeb0863220260e0d5ac80f0b37053690</a></li>

<li>Allow psql to print COPY command status in more cases. Previously, psql would print the "COPY nnn" command status only for COPY commands executed server-side. Now it will print that for frontend copies too (including \copy). However, we continue to suppress the command status for COPY TO STDOUT, since in that case the copy data has been routed to the same place that the command status would go, and there is a risk of the status line being mistaken for another line of COPY data. Doing that would break existing scripts, and it doesn't seem worth the benefit --- this case seems fairly analogous to SELECT, for which we also suppress the command status. Kumar Rajeev Rastogi, with substantial review by Amit Khandekar 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f70a78bc1f5556546d809a8164b9ba6a907f266f">http://git.postgresql.org/pg/commitdiff/f70a78bc1f5556546d809a8164b9ba6a907f266f</a></li>

<li>Prevent interrupts while reporting non-ERROR elog messages. This should eliminate the risk of recursive entry to syslog(3), which appears to be the cause of the hang reported in bug #9551 from James Morton. Arguably, the real problem here is auth.c's willingness to turn on ImmediateInterruptOK while executing fairly wide swaths of backend code. We may well need to work at narrowing the code ranges in which the authentication_timeout interrupt is enabled. For the moment, though, this is a cheap and reasonably noninvasive fix for a field-reported failure; the other approach would be complex and not necessarily bug-free itself. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c461cb92f295788446fbd5659b92e279244c725">http://git.postgresql.org/pg/commitdiff/6c461cb92f295788446fbd5659b92e279244c725</a></li>

<li>Update time zone data files to tzdata release 2014a. DST law changes in Fiji, Turkey; historical changes in Israel, Ukraine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aba7f56779f9ca231f6b612f1566771e3a9380e8">http://git.postgresql.org/pg/commitdiff/aba7f56779f9ca231f6b612f1566771e3a9380e8</a></li>

<li>First-draft release notes for 9.3.4. As usual, the release notes for older branches will be made by cutting these down, but put them up for community review first. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3c9f23250fc445568b2aefab8bcdc25371cff5b">http://git.postgresql.org/pg/commitdiff/e3c9f23250fc445568b2aefab8bcdc25371cff5b</a></li>

<li>Fix advertised dispsize for libpq's sslmode connection parameter. "8" was correct back when "disable" was the longest allowed value, but since "verify-full" was added, it should be "12". Given the lack of complaints, I wouldn't be surprised if nobody is actually using these values ... but still, if they're in the API, they should be right. Noticed while pursuing a different problem. It's been wrong for quite a long time, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f4051e363c1757a5fa05825a361d9dd0e54508bc">http://git.postgresql.org/pg/commitdiff/f4051e363c1757a5fa05825a361d9dd0e54508bc</a></li>

<li>Fix unportable shell-script syntax in pg_upgrade's test.sh. I discovered the hard way that on some old shells, the locution FOO="" unset FOO does not behave the same as FOO=""; unset FOO and in fact leaves FOO set to an empty string. test.sh was inconsistently spelling it different ways on adjacent lines. This got broken relatively recently, in commit c737a2e56, so the lack of field reports to date doesn't represent a lot of evidence that the problem is rare. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0268d21e5d3c732bf5543d68a6d870e4eee7e673">http://git.postgresql.org/pg/commitdiff/0268d21e5d3c732bf5543d68a6d870e4eee7e673</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix race condition in B-tree page deletion. In short, we don't allow a page to be deleted if it's the rightmost child of its parent, but that situation can change after we check for it.</li>

<li>Problem: We check that the page to be deleted is not the rightmost child of its parent, and then lock its left sibling, the page itself, its right sibling, and the parent, in that order. However, if the parent page is split after the check but before acquiring the locks, the target page might become the rightmost child, if the split happens at the right place. That leads to an error in vacuum (I reproduced this by setting a breakpoint in debugger): ERROR: failed to delete rightmost child 41 of block 3 in index "foo_pkey" We currently re-check that the page is still the rightmost child, and throw the above error if it's not. We could easily just give up rather than throw an error, but that approach doesn't scale to half-dead pages. To recap, although we don't normally allow deleting the rightmost child, if the page is the *only* child of its parent, we delete the child page and mark the parent page as half-dead in one atomic operation. But before we do that, we check that the parent can later be deleted, by checking that it in turn is not the rightmost child of the grandparent (potentially recursing all the way up to the root). But the same situation can arise there - the grandparent can be split while we're not holding the locks. We end up with a half-dead page that we cannot delete. To make things worse, the keyspace of the deleted page has already been transferred to its right sibling. As the README points out, the keyspace at the grandparent level is "out-of-whack" until the half-dead page is deleted, and if enough tuples with keys in the transferred keyspace are inserted, the page might get split and a downlink might be inserted into the grandparent that is out-of-order. That might not cause any serious problem if it's transient (as the README ponders), but is surely bad if it stays that way.</li>

<li>Solution: This patch changes the page deletion algorithm to avoid that problem. After checking that the topmost page in the chain of to-be-deleted pages is not the rightmost child of its parent, and then deleting the pages from bottom up, unlink the pages from top to bottom. This way, the intermediate stages are similar to the intermediate stages in page splitting, and there is no transient stage where the keyspace is "out-of-whack". The topmost page in the to-be-deleted chain doesn't have a downlink pointing to it, like a page split before the downlink has been inserted. This also allows us to get rid of the cleanup step after WAL recovery, if we crash during page deletion. The deletion will be continued at next VACUUM, but the tree is consistent for searches and insertions at every step. This bug is old, all supported versions are affected, but this patch is too big to back-patch (and changes the WAL record formats of related records). We have not heard any reports of the bug from users, so clearly it's not easy to bump into. Maybe backpatch later, after this has had some field testing. Reviewed by Kevin Grittner and Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/efada2b8e920adfdf7418862e939925d2acd1b89">http://git.postgresql.org/pg/commitdiff/efada2b8e920adfdf7418862e939925d2acd1b89</a></li>

<li>In WAL replay, restore GIN metapage unconditionally to avoid torn page. We don't take a full-page image of the GIN metapage; instead, the WAL record contains all the information required to reconstruct it from scratch. But to avoid torn page hazards, we must re-initialize it from the WAL record every time, even if it already has a greater LSN, similar to how normal full page images are restored. This was highly unlikely to cause any problems in practice, because the GIN metapage is small. We rely on an update smaller than a 512 byte disk sector to be atomic elsewhere, at least in pg_control. But better safe than sorry, and this would be easy to overlook if more fields are added to the metapage so that it's no longer small. Reported by Noah Misch. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fecfc2b913c4be5eeed24b32ef51a3239580bd1e">http://git.postgresql.org/pg/commitdiff/fecfc2b913c4be5eeed24b32ef51a3239580bd1e</a></li>

<li>Items on GIN data pages are no longer always 6 bytes; update gincostestimate. Also improve the comments a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17d787a3b160eefb2ff4a3fdf12ca1fedc02cbc1">http://git.postgresql.org/pg/commitdiff/17d787a3b160eefb2ff4a3fdf12ca1fedc02cbc1</a></li>

<li>Only WAL-log the modified portion in an UPDATE, if possible. When a row is updated, and the new tuple version is put on the same page as the old one, only WAL-log the part of the new tuple that's not identical to the old. This saves significantly on the amount of WAL that needs to be written, in the common case that most fields are not modified. Amit Kapila, with a lot of back and forth with me, Robert Haas, and others. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a3115f0d9ec1ac93b82156535dc00b10172a4fe7">http://git.postgresql.org/pg/commitdiff/a3115f0d9ec1ac93b82156535dc00b10172a4fe7</a></li>

<li>Fix a couple of typos in docs. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16ff08b79443cb1a9963e77530b307156d904d8b">http://git.postgresql.org/pg/commitdiff/16ff08b79443cb1a9963e77530b307156d904d8b</a></li>

<li>Allow opclasses to provide tri-valued GIN consistent functions. With the GIN "fast scan" feature, GIN can skip items without fetching all the keys for them, if it can prove that they don't match regardless of those keys. So far, it has done the proving by calling the boolean consistent function with all combinations of TRUE/FALSE for the unfetched keys, but since that's O(n^2), it becomes unfeasible with more than a few keys. We can avoid calling consistent with all the combinations, if we can tell the operator class implementation directly which keys are unknown. This commit includes a triConsistent function for the built-in array and tsvector opclasses. Alexander Korotkov, with some changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5608ea26a1f51998ad3cf987c3f0bda643c87a8">http://git.postgresql.org/pg/commitdiff/c5608ea26a1f51998ad3cf987c3f0bda643c87a8</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Show PIDs of lock holders and waiters in log_lock_waits log message. Christian Kruse, reviewed by Kumar Rajeev Rastogi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/588fb5071545ce6e8ffb6a88e146789560e6c879">http://git.postgresql.org/pg/commitdiff/588fb5071545ce6e8ffb6a88e146789560e6c879</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>C comments: remove odd blank lines after #ifdef WIN32 lines 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/886c0be3f65bdbb68e86ec2d66a8c1a4c34b2923">http://git.postgresql.org/pg/commitdiff/886c0be3f65bdbb68e86ec2d66a8c1a4c34b2923</a></li>

<li>C comments: remove odd blank lines after #ifdef WIN32 lines. A few more 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/242c2737fbec05a756e516f6e2fec4b739cc49d1">http://git.postgresql.org/pg/commitdiff/242c2737fbec05a756e516f6e2fec4b739cc49d1</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Cleanups from the remove-native-krb5 patch. krb_srvname is actually not available anymore as a parameter server-side, since with gssapi we accept all principals in our keytab. It's still used in libpq for client side specification. In passing remove declaration of krb_server_hostname, where all the functionality was already removed. Noted by Stephen Frost, though a different solution than his suggestion 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0294023a6b1c5df7683707a77238ab634d4ea8c1">http://git.postgresql.org/pg/commitdiff/0294023a6b1c5df7683707a77238ab634d4ea8c1</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make punctuation consistent 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2861e8e9cb7bcf7ca7839378743a4a881b67edcf">http://git.postgresql.org/pg/commitdiff/2861e8e9cb7bcf7ca7839378743a4a881b67edcf</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2b959478c97a53c93bea7c695a3684db1c084d7">http://git.postgresql.org/pg/commitdiff/e2b959478c97a53c93bea7c695a3684db1c084d7</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>plperl: Fix memory leak in hek2cstr. Backpatch all the way back to 9.1, where it was introduced by commit 50d89d42. Reported by Sergey Burladyan in #9223 Author: Alex Hunsaker 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd1154edec5484390d7dcd05d12287ccc81c30e8">http://git.postgresql.org/pg/commitdiff/bd1154edec5484390d7dcd05d12287ccc81c30e8</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to get more from indexes.</li>

<li>Dimitri Fontaine sent in another revision of a patch to implement a control path for extensions.</li>

<li>Kyotaro HORIGUCHI and Etsuro Fujita traded patches to allow foreign tables to be part of table inheritance.</li>

<li>Alvaro Herrera sent in another revision of a patch to store extension options.</li>

<li>Christian Kruse and Amit Kapila traded patches to show relation and tuple infos of a lock to acquire.</li>

<li>Peter Geoghegan, Alexander Korotkov and Andrew Dunstan traded patches around jsonb and nested hstore.</li>

<li>Mitsumasa KONDO and Heikki Linnakangas traded patches to allow Gaussian distribution as an option in pgbench.</li>

<li>Pavel Stehule sent in another revision of a patch to allow choosing more different border styles using Unicode characters in psql.</li>

<li>Kaigai Kouhei sent in two more flocks of patches to implement custom plan nodes.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implemnt cache-only table scans.</li>

<li>Andres Freund sent in another revision of a patch to implement changeset extraction.</li>

<li>Rukh Meski sent in two more revisions of a patch to implement UPDATE/DELETE ... ORDER BY ... LIMIT ...</li>

<li>Bruce Momjian sent in another revision of a patch to fix a pg_archivecleanup bug.</li>

<li>Andres Freund and Heikki Linnakangas traded patches to fix an issue with memory ordering in LWLockRelease, WakeupWaiters, WALInsertSlotRelease.</li>

<li>Vaishnavi Prabakaran sent in a patch to implement a VIEW of pg_hba.conf.</li>

<li>Kyotaro HORIGUCHI sent in a patch to fix an issue where archive recovery doesn't complete in some situations.</li>

<li>Joshua Yanovski sent in a WIP patch to improve the way (partial index)-only scans work.</li>

<li>Peter Geoghegan and Andrew Dunstan traded patches for jsonb.</li>

<li>Haribabu Kommi sent in a PoC patch to check whether a buffer pool split can improve performance.</li>

<li>Michael Paquier sent in a patch to fix a typo.</li>

</ul>