---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 octobre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/10/31/Nouvelles-hebdomadaires-de-PostgreSQL-19-octobre-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgpool-II 3.3.4 beta1&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Les inscriptions pour la PGConf.EU 2014 de Madrid, Espagne, du 21 au 24 octobre sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/registration/">http://2014.pgconf.eu/registration/</a></li>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

<li>[ndt: meetup &agrave; Lyon le 19 novembre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/">http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/214027472/</a>]</li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf NYC 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. l'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141020042835.GA2268@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Increase number of hash join buckets for underestimate. If we expect batching at the very beginning, we size nbuckets for "full work_mem" (see how many tuples we can get into work_mem, while not breaking NTUP_PER_BUCKET threshold). If we expect to be fine without batching, we start with the 'right' nbuckets and track the optimal nbuckets as we go (without actually resizing the hash table). Once we hit work_mem (considering the optimal nbuckets value), we keep the value. At the end of the first batch, we check whether (nbuckets != nbuckets_optimal) and resize the hash table if needed. Also, we keep this value for all batches (it's OK because it assumes full work_mem, and it makes the batchno evaluation trivial). So the resize happens only once. There could be cases where it would improve performance to allow the NTUP_PER_BUCKET threshold to be exceeded to keep everything in one batch rather than spilling to a second batch, but attempts to generate such a case have so far been unsuccessful; that issue may be addressed with a follow-on patch after further investigation. Tomas Vondra with minor format and comment cleanup by me Reviewed by Robert Haas, Heikki Linnakangas, and Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30d7ae3c76d2de144232ae6ab328ca86b70e72c3">http://git.postgresql.org/pg/commitdiff/30d7ae3c76d2de144232ae6ab328ca86b70e72c3</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add --latency-limit option to pgbench. This allows transactions that take longer than specified limit to be counted separately. With --rate, transactions that are already late by the time we get to execute them are skipped altogether. Using --latency-limit with --rate allows you to "catch up" more quickly, if there's a hickup in the server causing a lot of transactions to stall momentarily. Fabien COELHO, reviewed by Rukh Meski and heavily refactored by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98aed6c721763f2472ccd23b834baed9f83a944b">http://git.postgresql.org/pg/commitdiff/98aed6c721763f2472ccd23b834baed9f83a944b</a></li>

<li>Fix typo in docs. Shigeru Hanada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ff5047d52ab84dad682ad140b6992c294580eb1">http://git.postgresql.org/pg/commitdiff/0ff5047d52ab84dad682ad140b6992c294580eb1</a></li>

<li>Fix deadlock with LWLockAcquireWithVar and LWLockWaitForVar. LWLockRelease should release all backends waiting with LWLockWaitForVar, even when another backend has already been woken up to acquire the lock, i.e. when releaseOK is false. LWLockWaitForVar can return as soon as the protected value changes, even if the other backend will acquire the lock. Fix that by resetting releaseOK to true in LWLockWaitForVar, whenever adding itself to the wait queue. This should fix the bug reported by MauMau, where the system occasionally hangs when there is a lot of concurrent WAL activity and a checkpoint. Backpatch to 9.4, where this code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e0d97d77bf0875e4d5cc7dedfe701d9999bf678c">http://git.postgresql.org/pg/commitdiff/e0d97d77bf0875e4d5cc7dedfe701d9999bf678c</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: improve USING and NATURAL JOIN descriptions. Patch by David G Johnston 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/032f3b7e166cfa2818b0a9572324e362bf8895df">http://git.postgresql.org/pg/commitdiff/032f3b7e166cfa2818b0a9572324e362bf8895df</a></li>

<li>doc: mention TM is ignored for to_date/to_timestamp(). Report by Goulven Guillard 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8660b40d0c59e4880f246fa91e2137ddd13655d8">http://git.postgresql.org/pg/commitdiff/8660b40d0c59e4880f246fa91e2137ddd13655d8</a></li>

<li>doc: mention more changes needed to use huge pages. Report by Laurence Parry 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ebd33f27ab023ef0e72ba162f2974ec49d96e8e3">http://git.postgresql.org/pg/commitdiff/ebd33f27ab023ef0e72ba162f2974ec49d96e8e3</a></li>

<li>C comments: adjust execTuples.c for new structure. Report by Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe65280fea7e3c930727ed74328613a4410e487a">http://git.postgresql.org/pg/commitdiff/fe65280fea7e3c930727ed74328613a4410e487a</a></li>

<li>docs: error for adding _validated_ domains for existing uses. Report by David G Johnston 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ab96d18f94d5e8c2deab8a6126632a194ea32f1">http://git.postgresql.org/pg/commitdiff/7ab96d18f94d5e8c2deab8a6126632a194ea32f1</a></li>

<li>Consistently use NULL for invalid GUC unit strings. Patch by Euler Taveira 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6c8e8d7aca9ab175e6aefef9974b65bd589dd80">http://git.postgresql.org/pg/commitdiff/d6c8e8d7aca9ab175e6aefef9974b65bd589dd80</a></li>

<li>doc: restrictions on alter database moving default tablespace. Mention tablespace must be empty and no one connected to the database. Report by Josh Berkus 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97d554871c3d186db831b35c0eabe6d496e4f54b">http://git.postgresql.org/pg/commitdiff/97d554871c3d186db831b35c0eabe6d496e4f54b</a></li>

<li>interval: tighten precision specification. interval precision can only be specified after the "interval" keyword if no units are specified. Previously we incorrectly checked the units to see if the precision was legal, causing confusion. Report by Alvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/417f92484da8c9a124e7eece8dbfb71f688a0104">http://git.postgresql.org/pg/commitdiff/417f92484da8c9a124e7eece8dbfb71f688a0104</a></li>

<li>Shorten warning about hash creation. Also document that PITR is also affected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b87671f1b63a0c9cf264afc209e3acebdb52477f">http://git.postgresql.org/pg/commitdiff/b87671f1b63a0c9cf264afc209e3acebdb52477f</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Fix \? output alignment. This was inadvertently changed in commit c64e68fd. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ce09e614805d2965baaf33e0d6bcbbb04aa9414">http://git.postgresql.org/pg/commitdiff/7ce09e614805d2965baaf33e0d6bcbbb04aa9414</a></li>

<li>doc: Fix copy-and-paste mistakes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5dc4b50b028f430f639c74f5d449ac8ec27d3cf5">http://git.postgresql.org/pg/commitdiff/5dc4b50b028f430f639c74f5d449ac8ec27d3cf5</a></li>

<li>doc: Improve ALTER VIEW / SET documentation. The way the ALTER VIEW / SET options were listed in the synopsis was very confusing. Move the list to the main description, similar to how the ALTER TABLE reference page does it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db75e524856634ce1c41fc1233e85abbb716ef6e">http://git.postgresql.org/pg/commitdiff/db75e524856634ce1c41fc1233e85abbb716ef6e</a></li>

<li>doc: Clean up pg_recvlogical reference page. This needed a general cleanup of wording, typos, outdated terminology, formatting, and hard-to-understand and borderline incorrect information. Also tweak the pg_receivexlog page a bit to make the two more consistent. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52c1ae22d6a4daf1c1c01fc9244f8ebae5402b1a">http://git.postgresql.org/pg/commitdiff/52c1ae22d6a4daf1c1c01fc9244f8ebae5402b1a</a></li>

<li>Allow setting effective_io_concurrency even on unsupported systems. This matches the behavior of other parameters that are unsupported on some systems (e.g., ssl). Also document the default value. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7feaccc21791d9d745bac013e5e0396bdde2d81c">http://git.postgresql.org/pg/commitdiff/7feaccc21791d9d745bac013e5e0396bdde2d81c</a></li>

<li>psql: Improve \pset without arguments. Revert the output of the individual backslash commands that change print settings back to the 9.3 way (not showing the command name in parentheses). Implement \pset without arguments separately, showing all settings with values in a table form. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6895866510c5f4185f50ae7d6810d9ffd7701a9e">http://git.postgresql.org/pg/commitdiff/6895866510c5f4185f50ae7d6810d9ffd7701a9e</a></li>

<li>initdb: Fix compiler error in USE_PREFETCH case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49d182e61ebca00762531718b3bafa9107ccee17">http://git.postgresql.org/pg/commitdiff/49d182e61ebca00762531718b3bafa9107ccee17</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_dump: Reduce use of global variables. Most pg_dump.c global variables, which were passed down individually to dumping routines, are now grouped as members of the new DumpOptions struct, which is used as a local variable and passed down into routines that need it. This helps future development efforts; in particular it is said to enable a mode in which a parallel pg_dump run can output multiple streams, and have them restored in parallel. Also take the opportunity to clean up the pg_dump header files somewhat, to avoid circularity. Author: Joachim Wieland, revised by &Aacute;lvaro Herrera Reviewed by Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0eea8047bf0e15b402b951e383e39236bdfe57d5">http://git.postgresql.org/pg/commitdiff/0eea8047bf0e15b402b951e383e39236bdfe57d5</a></li>

<li>Blind attempt at fixing Win32 pg_dump issues. Per buildfarm failures 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/076d29a1eed5fe51fb2b25b98fcde9dd7c506902">http://git.postgresql.org/pg/commitdiff/076d29a1eed5fe51fb2b25b98fcde9dd7c506902</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Print planning time only in EXPLAIN ANALYZE, not plain EXPLAIN. We've gotten enough push-back on that change to make it clear that it wasn't an especially good idea to do it like that. Revert plain EXPLAIN to its previous behavior, but keep the extra output in EXPLAIN ANALYZE. Per discussion. Internally, I set this up as a separate flag ExplainState.summary that controls printing of planning time and execution time. For now it's just copied from the ANALYZE option, but we could consider exposing it to users. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90063a7612e2730f7757c2a80ba384bbe7e35c4b">http://git.postgresql.org/pg/commitdiff/90063a7612e2730f7757c2a80ba384bbe7e35c4b</a></li>

<li>Support timezone abbreviations that sometimes change. Up to now, PG has assumed that any given timezone abbreviation (such as "EDT") represents a constant GMT offset in the usage of any particular region; we had a way to configure what that offset was, but not for it to be changeable over time. But, as with most things horological, this view of the world is too simplistic: there are numerous regions that have at one time or another switched to a different GMT offset but kept using the same timezone abbreviation. Almost the entire Russian Federation did that a few years ago, and later this month they're going to do it again. And there are similar examples all over the world. To cope with this, invent the notion of a "dynamic timezone abbreviation", which is one that is referenced to a particular underlying timezone (as defined in the IANA timezone database) and means whatever it currently means in that zone. For zones that use or have used daylight-savings time, the standard and DST abbreviations continue to have the property that you can specify standard or DST time and get that time offset whether or not DST was theoretically in effect at the time. However, the abbreviations mean what they meant at the time in question (or most recently before that time) rather than being absolutely fixed. The standard abbreviation-list files have been changed to use this behavior for abbreviations that have actually varied in meaning since 1970. The old simple-numeric definitions are kept for abbreviations that have not changed, since they are a bit faster to resolve. While this is clearly a new feature, it seems necessary to back-patch it into all active branches, because otherwise use of Russian zone abbreviations is going to become even more problematic than it already was. This change supersedes the changes in commit 513d06ded et al to modify the fixed meanings of the Russian abbreviations; since we've not shipped that yet, this will avoid an undesirably incompatible (not to mention incorrect) change in behavior for timestamps between 2011 and 2014. This patch makes some cosmetic changes in ecpglib to keep its usage of datetime lookup tables as similar as possible to the backend code, but doesn't do anything about the increasingly obsolete set of timezone abbreviation definitions that are hard-wired into ecpglib. Whatever we do about that will likely not be appropriate material for back-patching. Also, a potential free() of a garbage pointer after an out-of-memory failure in ecpglib has been fixed. This patch also fixes pre-existing bugs in DetermineTimeZoneOffset() that caused it to produce unexpected results near a timezone transition, if both the "before" and "after" states are marked as standard time. We'd only ever thought about or tested transitions between standard and DST time, but that's not what's happening when a zone simply redefines their base GMT offset. In passing, update the SGML documentation to refer to the Olson/zoneinfo/ zic timezone database as the "IANA" database, since it's now being maintained under the auspices of IANA. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2cbced9eef20692b51a84d68d469627f4fc43ac">http://git.postgresql.org/pg/commitdiff/b2cbced9eef20692b51a84d68d469627f4fc43ac</a></li>

<li>Re-pgindent src/bin/pg_dump/*. Seems to have gotten rather messy lately, as a consequence of a couple of large recent commits. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7584649a1c58029a83a7a57d74cedcf1af434c97">http://git.postgresql.org/pg/commitdiff/7584649a1c58029a83a7a57d74cedcf1af434c97</a></li>

<li>Fix core dump in pg_dump --binary-upgrade on zero-column composite type. This reverts nearly all of commit 28f6cab61ab8958b1a7dfb019724687d92722538 in favor of just using the typrelid we already have in pg_dump's TypeInfo struct for the composite type. As coded, it'd crash if the composite type had no attributes, since then the query would return no rows. Back-patch to all supported versions. It seems to not really be a problem in 9.0 because that version rejects the syntax "create type t as ()", but we might as well keep the logic similar in all affected branches. Report and fix by Rushabh Lathia. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c38a1d4ecce849b1e105f59ccca5a926181e4f0">http://git.postgresql.org/pg/commitdiff/5c38a1d4ecce849b1e105f59ccca5a926181e4f0</a></li>

<li>Avoid core dump in _outPathInfo() for Path without a parent RelOptInfo. Nearly all Paths have parents, but a ResultPath representing an empty FROM clause does not. Avoid a core dump in such cases. I believe this is only a hazard for debugging usage, not for production, else we'd have heard about it before. Nonetheless, back-patch to 9.1 where the troublesome code was introduced. Noted while poking at bug #11703. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ba062ee44c35b4dc49ccf869fe48f3c6f5f926f">http://git.postgresql.org/pg/commitdiff/5ba062ee44c35b4dc49ccf869fe48f3c6f5f926f</a></li>

<li>Declare mkdtemp() only if we're providing it. Follow our usual style of providing an "extern" for a standard library function only when we're also providing the implementation. This avoids issues when the system headers declare the function slightly differently than we do, as noted by Caleb Welton. We might have to go to the extent of probing to see if the system headers declare the function, but let's not do that until it's demonstrated to be necessary. Oversight in commit 9e6b1bf258170e62dac555fc82ff0536dfe01d29. Back-patch to all supported branches, as that was. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60f8133dc95d8d55ac52186eb9988559816cac49">http://git.postgresql.org/pg/commitdiff/60f8133dc95d8d55ac52186eb9988559816cac49</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_dump for UPDATE policies. pg_dump had the wrong character for update and so was failing when attempts were made to pg_dump databases with UPDATE policies. Pointed out by Fujii Masao (thanks!) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/389573fd19edd255736c50dfd0fd779da7535a7b">http://git.postgresql.org/pg/commitdiff/389573fd19edd255736c50dfd0fd779da7535a7b</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in handling of connections that pg_receivexlog creates. Previously pg_receivexlog created new connection for WAL streaming even though another connection which had been established to create or delete the replication slot was being left. This caused the unused connection to be left uselessly until pg_receivexlog exited. This bug was introduced by the commit d9f38c7. This patch changes pg_receivexlog so that the connection for the replication slot is reused for WAL streaming. Andres Freund, slightly modified by me, reviewed by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/504c717599b20cdaf09e9d7b6ecd152cc7a3a71a">http://git.postgresql.org/pg/commitdiff/504c717599b20cdaf09e9d7b6ecd152cc7a3a71a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to track commit timestamps.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to add an access method for sequences.</li>

<li>Andrew Dunstan and Pavel Stehule traded patches to add some missing functionality to JSON[B].</li>

<li>Michael Paquier sent in another revision of a patch to add generate_series(numeric, numeric).</li>

<li>Michael Paquier sent in another revision of a patch to split builtins.h to quote.h.</li>

<li>SAWADA Masahiko sent in a patch to drop any statistics of a table after it's truncated.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to add CINE for materialized views.</li>

<li>Marco Nenciarini sent in another WIP revision of a patch to implement incremental backup.</li>

<li>Marti Raudsepp sent in a patch to unify checks for catalog modification.</li>

<li>Amit Kapila sent in another revision of a patch to scale shared buffer eviction.</li>

<li>Etsuro Fujita sent in two more revisions of a patch to allow foreign tables to be in a table inheritance hierarchy.</li>

<li>Dimitri Fontaine sent in two revisions of a patch to add a new type of event trigger: table_rewrite.</li>

<li>Robert Haas sent in a patch to implement group locking, a support for parallelism.</li>

<li>Stephen Frost sent in a patch to add a few additional role attributes (all requested by users or clients in various forums) for common operations which currently require superuser privileges.</li>

<li>Robert Haas sent in a WIP patch to create a dynahash replacement for buffer table.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to implement pg_audit, an extension.</li>

<li>David Rowley sent in another revision of a patch to enable inner join removals under certain conditions.</li>

<li>Alexander Korotkov sent in a WIP patch to re-add access method extensibility, and an extension using this machinery.</li>

<li>&Aacute;lvaro Herrera sent in another revision of a patch to enable replicating DROP commands across servers.</li>

<li>Lucas Lersch sent in a patch to log buffer request trace data.</li>

<li>Atri Sharma sent in a patch to implement UPDATE table SET(*)= and similar constructs.</li>

<li>Adam Brightwell sent in a patch to implement a directory permission system that allows for providing a directory read/write capability to directories for COPY TO/FROM and Generic File Access Functions to non-superusers.</li>

<li>Jeff Davis sent in another revision of a patch to allow better memory accounting for use in an eventual memory-bounded hash aggregate.</li>

<li>SAWADA Masahiko and Fabr&iacute;zio de Royes Mello traded patches to implement REINDEX SCHEMA.</li>

<li>Michael Banck sent in a patch to log a notice that checkpoint is to be written on shutdown.</li>

<li>Michael Paquier sent in another revision of a patch to give better support of exported snapshots to pg_dump.</li>

<li>Rahila Syed sent in another revision of a patch to compress full-page writes.</li>

<li>Craig Ringer sent in a patch to detect custom-format dumps in psql and emit a useful error.</li>

<li>Pavel Stehule sent in another revision of a patch to add an Assert statement to PL/pgsql.</li>

<li>Craig Ringer sent in a patch to add an errhint_log, akin to errdetail_log. This allows a different HINT to be sent to the server error log and to the client, which will be useful where there's security sensitive information that's more appropriate for a HINT than a DETAIL message.</li>

<li>Furuya Osamu sent in another revision of a patch to pg_receivexlog --status-interval to add fsync feedback.</li>

<li>Fujii Masao sent in a patch to fix an infelicity between RETURNING and POLICY.</li>

<li>Fujii Masao sent in a patch to fix a bug in recovery mode.</li>

<li>Andreas 'ads' Scherbaum sent in another revision of a patch to better describe PostgreSQL's rounding behavior.</li>

<li>Dag-Erling Sm&oslash;rgrav sent in a patch to add ssl_protocols configuration option.</li>

<li>Adam Brightwell sent in another revision of a patch to add a has_privs_of_role() function.</li>

<li>Ali Akbar sent in another revision of a patch to add array_agg() functionality for array types.</li>

<li>Emre Hasegeli sent in a patch to add a BRIN range operator class.</li>

<li>Marko (johto) Tiikkaja sent in a patch to fix a bug where a comment in the pg_crypto extension refers to the wrong file.</li>

</ul>