---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 décembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/12/24/Nouvelles-hebdomadaires-de-PostgreSQL-21-décembre-2014"
---


<p>Publication de PostgreSQL 9.4&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/docs/9.4/static/release-9-4.html">http://www.postgresql.org/docs/9.4/static/release-9-4.html</a><br>

[fr&nbsp;: <a href="http://blog.postgresql.fr/index.php?post/2014/12/18/PostgreSQL-9.4.0">http://blog.postgresql.fr/index.php?post/2014/12/18/PostgreSQL-9.4.0</a>]</p>

<p>Le groupe Meetup de Moscou c&eacute;l&egrave;brera la sortie de PostgreSQL 9.4 le mardi 23 d&eacute;cembre dans les bureaux de Parallels. D&eacute;tails et RSVP&nbsp;: 

<a target="_blank" href="http://PostgreSQLRussia.org">http://PostgreSQLRussia.org</a></p>

<p>Le PUG de Bulgarie est sur pied&nbsp;: 

<a target="_blank" href="http://bgpug.org/">http://bgpug.org/</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-12/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PGDay pr&eacute;-FOSDEM (30 janvier 2015) et <em>dev room</em> PostgreSQL au FOSDEM (31 janvier - 1<sup>er</sup> f&eacute;vrier 2015)&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/">http://fosdem2015.pgconf.eu/</a></li>

<li>Le <em>Prague PostgreSQL Developer Day</em> (P2D2) 2015 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, les 11 &amp; 12 f&eacute;vrier 2015&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le <em>meetup</em> du 18 f&eacute;vrier 2015 &agrave; Melbourne accueillera Gabriele Bartolini &agrave; propos de PostgreSQL 9.4 pour les devops. D&eacute;tails ci-apr&egrave;s, et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/melpug/events/219082475/">http://www.meetup.com/melpug/events/219082475/</a></li>

<li>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le <em>Nordic PostgreSQL Day 2015</em>, pr&eacute;vu le 11 mars 2015 &agrave; Copenhague (Danemark), est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.nordicpgday.org/cfp/">http://2015.nordicpgday.org/cfp/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf US 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. L'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141222042953.GA15832@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve documentation around parameter-setting and ALTER SYSTEM. The ALTER SYSTEM ref page hadn't been held to a very high standard, nor was the feature well integrated into section 18.1 (parameter setting). Also, though commit 4c4654afe had improved the structure of 18.1, it also introduced a lot of poor wording, imprecision, and outright falsehoods. Try to clean that up. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af06aa822dbc023f3a103278ec381e1c88d67db1">http://git.postgresql.org/pg/commitdiff/af06aa822dbc023f3a103278ec381e1c88d67db1</a></li>

<li>Fix point &lt;-&gt; polygon code for zero-distance case. "PG_RETURN_FLOAT8(x)" is not "return x", except perhaps by accident on some platforms. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9418820efb32e739706cc3860347089315562ee4">http://git.postgresql.org/pg/commitdiff/9418820efb32e739706cc3860347089315562ee4</a></li>

<li>Fix file descriptor leak after failure of a \setshell command in pgbench. If the called command fails to return data, runShellCommand forgot to pclose() the pipe before returning. This is fairly harmless in the current code, because pgbench would then abandon further processing of that client thread; so no more than nclients descriptors could be leaked this way. But it's not hard to imagine future improvements whereby that wouldn't be true. In any case, it's sloppy coding, so patch all branches. Found by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d38e8d30cecea96a088330133e232c465a222d0a">http://git.postgresql.org/pg/commitdiff/d38e8d30cecea96a088330133e232c465a222d0a</a></li>

<li>Suppress bogus statistics when pgbench failed to complete any transactions. Code added in 9.4 would attempt to divide by zero in such cases. Noted while testing fix for missing-pclose problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de8e46f5f5785f4016aabf2aa231faa89a0746fb">http://git.postgresql.org/pg/commitdiff/de8e46f5f5785f4016aabf2aa231faa89a0746fb</a></li>

<li>Fix off-by-one loop count in MapArrayTypeName, and get rid of static array. MapArrayTypeName would copy up to NAMEDATALEN-1 bytes of the base type name, which of course is wrong: after prepending '_' there is only room for NAMEDATALEN-2 bytes. Aside from being the wrong result, this case would lead to overrunning the statically allocated work buffer. This would be a security bug if the function were ever used outside bootstrap mode, but it isn't, at least not in any currently supported branches. Aside from fixing the off-by-one loop logic, this patch gets rid of the static work buffer by having MapArrayTypeName pstrdup its result; the sole caller was already doing that, so this just requires moving the pstrdup call. This saves a few bytes but mainly it makes the API a lot cleaner. Back-patch on the off chance that there is some third-party code using MapArrayTypeName with less-secure input. Pushing pstrdup into the function should not cause any serious problems for such hypothetical code; at worst there might be a short term memory leak. Per Coverity scanning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66709133c7e5506be19bf56a82f45dd150f74732">http://git.postgresql.org/pg/commitdiff/66709133c7e5506be19bf56a82f45dd150f74732</a></li>

<li>Fix poorly worded error message. Adam Brightwell, per report from Mart&iacute;n Marqu&eacute;s. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c977b8cffc76be00fbaab76e3271e05104260ec7">http://git.postgresql.org/pg/commitdiff/c977b8cffc76be00fbaab76e3271e05104260ec7</a></li>

<li>Fix another poorly worded error message. Spotted by &Aacute;lvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c340494235111fb87e46b11ca6a87a7a43795f0f">http://git.postgresql.org/pg/commitdiff/c340494235111fb87e46b11ca6a87a7a43795f0f</a></li>

<li>Allow CHECK constraints to be placed on foreign tables. As with NOT NULL constraints, we consider that such constraints are merely reports of constraints that are being enforced by the remote server (or other underlying storage mechanism). Their only real use is to allow planner optimizations, for example in constraint-exclusion checks. Thus, the code changes here amount to little more than removal of the error that was formerly thrown for applying CHECK to a foreign table. (In passing, do a bit of cleanup of the ALTER FOREIGN TABLE reference page, which had accumulated some weird decisions about ordering etc.) Shigeru Hanada and Etsuro Fujita, reviewed by Kyotaro Horiguchi and Ashutosh Bapat. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc2ac1fb41c2defb8caf825781af75db158fb7a9">http://git.postgresql.org/pg/commitdiff/fc2ac1fb41c2defb8caf825781af75db158fb7a9</a></li>

<li>Improve hash_create's API for selecting simple-binary-key hash functions. Previously, if you wanted anything besides C-string hash keys, you had to specify a custom hashing function to hash_create(). Nearly all such callers were specifying tag_hash or oid_hash; which is tedious, and rather error-prone, since a caller could easily miss the opportunity to optimize by using hash_uint32 when appropriate. Replace this with a design whereby callers using simple binary-data keys just specify HASH_BLOBS and don't need to mess with specific support functions. hash_create() itself will take care of optimizing when the key size is four bytes. This nets out saving a few hundred bytes of code space, and offers a measurable performance improvement in tidbitmap.c (which was not exploiting the opportunity to use hash_uint32 for its 4-byte keys). There might be some wins elsewhere too, I didn't analyze closely. In future we could look into offering a similar optimized hashing function for 8-byte keys. Under this design that could be done in a centralized and machine-independent fashion, whereas getting it right for keys of platform-dependent sizes would've been notationally painful before. For the moment, the old way still works fine, so as not to break source code compatibility for loadable modules. Eventually we might want to remove tag_hash and friends from the exported API altogether, since there's no real need for them to be explicitly referenced from outside dynahash.c. Teodor Sigaev and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a14f13a0abfbf7e7d44a3d2689444d1806aa9dc">http://git.postgresql.org/pg/commitdiff/4a14f13a0abfbf7e7d44a3d2689444d1806aa9dc</a></li>

<li>Improve documentation about CASE and constant subexpressions. The possibility that constant subexpressions of a CASE might be evaluated at planning time was touched on in 9.17.1 (CASE expressions), but it really ought to be explained in 4.2.14 (Expression Evaluation Rules) which is the primary discussion of such topics. Add text and an example there, and revise the &lt;note&gt; under CASE to link there. Back-patch to all supported branches, since it's acted like this for a long time (though 9.2+ is probably worse because of its more aggressive use of constant-folding via replanning of nominally-prepared statements). Pre-9.4, also back-patch text added in commit 0ce627d4 about CASE versus aggregate functions. Tom Lane and David Johnston, per discussion of bug #12273. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b516835897f2a487eedacdb605ac40d52f6b484">http://git.postgresql.org/pg/commitdiff/5b516835897f2a487eedacdb605ac40d52f6b484</a></li>

<li>Docs: clarify treatment of variadic functions with zero variadic arguments. Explain that you have to use "VARIADIC ARRAY[]" to pass an empty array to a variadic parameter position. This was already implicit in the text but it seems better to spell it out. Per a suggestion from David Johnston, though I didn't use his proposed wording. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/699300a146c04e207a8fdec407538cdf5368fde5">http://git.postgresql.org/pg/commitdiff/699300a146c04e207a8fdec407538cdf5368fde5</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Add link to how to specify time zone names to initdb man page 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6457ff93feca5b798def2c41786904fe13cc41d1">http://git.postgresql.org/pg/commitdiff/6457ff93feca5b798def2c41786904fe13cc41d1</a></li>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee3bec5e22f7aed4d9086bec45a8d1821a9e236c">http://git.postgresql.org/pg/commitdiff/ee3bec5e22f7aed4d9086bec45a8d1821a9e236c</a></li>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/733a264ddc1ad29d9cb91cbd712c1ef5f92886c8">http://git.postgresql.org/pg/commitdiff/733a264ddc1ad29d9cb91cbd712c1ef5f92886c8</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add point &lt;-&gt; polygon distance operator. Alexander Korotkov, reviewed by Emre Hasegeli. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4520ba67691fc13bb8be2cc47dd0bf8c7ab94205">http://git.postgresql.org/pg/commitdiff/4520ba67691fc13bb8be2cc47dd0bf8c7ab94205</a></li>

<li>Fix incorrect comment about XLogRecordBlockHeader.data_length field. It does not include the possible full-page image. While at it, reformat the comment slightly to make it more readable. Reported by Rahila Syed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da9f6a78ef84898ccdf7855089aa08e7524dfbdc">http://git.postgresql.org/pg/commitdiff/da9f6a78ef84898ccdf7855089aa08e7524dfbdc</a></li>

<li>Misc comment typo fixes. Backpatch the applicable parts, just to make backpatching future patches easier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d65e16a6ff609701a8780d3cddbae02c6e20926">http://git.postgresql.org/pg/commitdiff/4d65e16a6ff609701a8780d3cddbae02c6e20926</a></li>

<li>Clarify the regexp used to detect source files in MSVC builds. The old pattern would match files with strange extensions like *.ry or *.lpp. Refactor it to only include files with known extensions, and to make it more readable. Per Andrew Dunstan's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce01548d4fdbc06dce59f90a3e4598162b1e8ea1">http://git.postgresql.org/pg/commitdiff/ce01548d4fdbc06dce59f90a3e4598162b1e8ea1</a></li>

<li>Change how first WAL segment on new timeline after promotion is created. Two changes: 1. When copying a WAL segment from old timeline to create the first segment on the new timeline, only copy up to the point where the timeline switch happens, and zero-fill the rest. This avoids corner cases where we might think that the copied WAL from the previous timeline belong to the new timeline. 2. If the timeline switch happens at a segment boundary, don't copy the whole old segment to the new timeline. It's pointless, because it's 100% identical to the old segment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba94518aad23beb800b657bd0cc8c4e7ea43ca33">http://git.postgresql.org/pg/commitdiff/ba94518aad23beb800b657bd0cc8c4e7ea43ca33</a></li>

<li>Fix timestamp in end-of-recovery WAL records. We used time(null) to set a TimestampTz field, which gave bogus results. Noticed while looking at pg_xlogdump output. Backpatch to 9.3 and above, where the fast promotion was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c805d0a813e6c611485bfc9bde9d2a10d1800e5">http://git.postgresql.org/pg/commitdiff/5c805d0a813e6c611485bfc9bde9d2a10d1800e5</a></li>

<li>Fix file descriptor leak at end of recovery. XLogFileInit() returns a file descriptor, which needs to be closed. The leak was short-lived, since the startup process exits shortly afterwards, but it was clearly a bug, nevertheless. Per Coverity report. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ef6c66a2b1ed288a5e4448989d4b85082d22736">http://git.postgresql.org/pg/commitdiff/2ef6c66a2b1ed288a5e4448989d4b85082d22736</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>add missing newline 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4576b9cc46b7a0966b94927b4dcc7d24823cab6a">http://git.postgresql.org/pg/commitdiff/4576b9cc46b7a0966b94927b4dcc7d24823cab6a</a></li>

<li>Have VACUUM log number of skipped pages due to pins. Author: Jim Nasby, some kibitzing by Heikki Linnankangas. Discussion leading to current behavior and precise wording fueled by thoughts from Robert Haas and Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35192f0626ccc1729eb6220a5fa04699fd62e04e">http://git.postgresql.org/pg/commitdiff/35192f0626ccc1729eb6220a5fa04699fd62e04e</a></li>

<li>Use %u to print out BlockNumber variables. Per Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd6e66572b7b5f6bae2b8c8bd62e4862b0a2cf9d">http://git.postgresql.org/pg/commitdiff/cd6e66572b7b5f6bae2b8c8bd62e4862b0a2cf9d</a></li>

<li>pg_event_trigger_dropped_objects: add behavior flags. Add "normal" and "original" flags as output columns to the pg_event_trigger_dropped_objects() function. With this it's possible to distinguish which objects, among those listed, need to be explicitely referenced when trying to replicate a deletion. This is necessary so that the list of objects can be pruned to the minimum necessary to replicate the DROP command in a remote server that might have slightly different schema (for instance, TOAST tables and constraints with different names and such.) Catalog version bumped due to change of function definition. Reviewed by: Abhijit Menon-Sen, Stephen Frost, Heikki Linnakangas, Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ee98d1cbf1cd3b888633b2ee90e0001889c12b9">http://git.postgresql.org/pg/commitdiff/0ee98d1cbf1cd3b888633b2ee90e0001889c12b9</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix commit_ts test suite for systems with coarse timestamp granularity. Noticed on a couple of Windows configurations. Petr Jelinek, reviewed by Michael Paquier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0916eba131530b296f86137759a32f66ffedff7b">http://git.postgresql.org/pg/commitdiff/0916eba131530b296f86137759a32f66ffedff7b</a></li>

<li>Fix previous commit for TAP test suites in VPATH builds. Per buildfarm member crake. Back-patch to 9.4, where the TAP suites were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40c598fa15bef1ea10850aad80914ab797808106">http://git.postgresql.org/pg/commitdiff/40c598fa15bef1ea10850aad80914ab797808106</a></li>

<li>Recognize Makefile line continuations in fetchRegressOpts(). Back-patch to 9.0 (all supported versions). This is mere future-proofing in the context of the master branch, but commit f6dc6dd5ba54d52c0733aaafc50da2fbaeabb8b0 requires it of older branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43b56171b1fbcba8a6309de755545e3c63ac25dd">http://git.postgresql.org/pg/commitdiff/43b56171b1fbcba8a6309de755545e3c63ac25dd</a></li>

<li>Lock down regression testing temporary clusters on Windows. Use SSPI authentication to allow connections exclusively from the OS user that launched the test suite. This closes on Windows the vulnerability that commit be76a6d39e2832d4b88c0e1cc381aa44a7f86881 closed on other platforms. Users of "make installcheck" or custom test harnesses can run "pg_regress --config-auth=DATADIR" to activate the same authentication configuration that "make check" would use. Back-patch to 9.0 (all supported versions). Security: CVE-2014-0067 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f6dc6dd5ba54d52c0733aaafc50da2fbaeabb8b0">http://git.postgresql.org/pg/commitdiff/f6dc6dd5ba54d52c0733aaafc50da2fbaeabb8b0</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix some jsonb issues found by Coverity in recent commits. Mostly these issues concern the non-use of function results. These have been changed to use (void) pushJsonbValue(...) instead of assigning the result to a variable that gets overwritten before it is used. There is a larger issue that we should possibly examine the API for pushJsonbValue(), so that instead of returning a value it modifies a state argument. The current idiom is rather clumsy. However, changing that requires quite a bit more work, so this change should do for the moment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8315930e6a34b616d9840985c85eb0d856dd2df">http://git.postgresql.org/pg/commitdiff/c8315930e6a34b616d9840985c85eb0d856dd2df</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove redundant sentence. Spotted by David Johnston 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb7b5c5c6f8df5fee936c6a26553427166cbdbfe">http://git.postgresql.org/pg/commitdiff/cb7b5c5c6f8df5fee936c6a26553427166cbdbfe</a></li>

<li>Add missing documentation for some vcregress modes. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6964ad95d78a21e6d7aec9727ea9a0af68482c35">http://git.postgresql.org/pg/commitdiff/6964ad95d78a21e6d7aec9727ea9a0af68482c35</a></li>

<li>Update .gitignore for pg_upgrade. Add Windows versions of generated scripts, and make sure we only ignore the scripts int he root directory. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cef0ae498ccbd4b166ee4fe6cb33612646fdc4b5">http://git.postgresql.org/pg/commitdiff/cef0ae498ccbd4b166ee4fe6cb33612646fdc4b5</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix (re-)starting from a basebackup taken off a standby after a failure. When starting up from a basebackup taken off a standby extra logic has to be applied to compute the point where the data directory is consistent. Normal base backups use a WAL record for that purpose, but that isn't possible on a standby. That logic had a error check ensuring that the cluster's control file indicates being in recovery. Unfortunately that check was too strict, disregarding the fact that the control file could also indicate that the cluster was shut down while in recovery. That's possible when the a cluster starting from a basebackup is shut down before the backup label has been removed. When everything goes well that's a short window, but when either restore_command or primary_conninfo isn't configured correctly the window can get much wider. That's because inbetween reading and unlinking the label we restore the last checkpoint from WAL which can need additional WAL. To fix simply also allow starting when the control file indicates "shutdown in recovery". There's nicer fixes imaginable, but they'd be more invasive. Backpatch to 9.2 where support for taking basebackups from standbys was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c303e9e7e5d4ddf04526ed8e821ef4b1c3bc2d12">http://git.postgresql.org/pg/commitdiff/c303e9e7e5d4ddf04526ed8e821ef4b1c3bc2d12</a></li>

<li>Adjust valgrind suppression to the changes in 2c03216d8311. CRC computation is now done in XLogRecordAssemble. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72950dc1d02c6b44c6475485fd5ef8ac277bbdd0">http://git.postgresql.org/pg/commitdiff/72950dc1d02c6b44c6475485fd5ef8ac277bbdd0</a></li>

<li>Define Assert() et al to ((void)0) to avoid pedantic warnings. gcc's -Wempty-body warns about the current usage when compiling postgres without --enable-cassert. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9959abb0122ca2b0e4817e20954e3083c90becdc">http://git.postgresql.org/pg/commitdiff/9959abb0122ca2b0e4817e20954e3083c90becdc</a></li>

<li>Prevent potentially hazardous compiler/cpu reordering during lwlock release. In LWLockRelease() (and in 9.4+ LWLockUpdateVar()) we release enqueued waiters using PGSemaphoreUnlock(). As there are other sources of such unlocks backends only wake up if MyProc-&gt;lwWaiting is set to false; which is only done in the aforementioned functions. Before this commit there were dangers because the store to lwWaitLink could become visible before the store to lwWaitLink. This could both happen due to compiler reordering (on most compilers) and on some platforms due to the CPU reordering stores. The possible consequence of this is that a backend stops waiting before lwWaitLink is set to NULL. If that backend then tries to acquire another lock and has to wait there the list could become corrupted once the lwWaitLink store is finally performed. Add a write memory barrier to prevent that issue. Unfortunately the barrier support has been only added in 9.2. Given that the issue has not knowingly been observed in praxis it seems sufficient to prohibit compiler reordering using volatile for 9.0 and 9.1. Actual problems due to compiler reordering are more likely anyway. Discussion: 20140210134625.GA15246@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/37de8de9e33606a043e98fee64b5595aedaa8254">http://git.postgresql.org/pg/commitdiff/37de8de9e33606a043e98fee64b5595aedaa8254</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove odd blank line in comment. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26674c923d0ecbac2cda039433163d17584fae65">http://git.postgresql.org/pg/commitdiff/26674c923d0ecbac2cda039433163d17584fae65</a></li>

<li>Update .gitignore for config.cache. Also add a comment about why regreesion.* aren't listed in .gitignore. Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccf292cd2ec16c69ddfee3bf72afe113a7595e00">http://git.postgresql.org/pg/commitdiff/ccf292cd2ec16c69ddfee3bf72afe113a7595e00</a></li>

<li>Ensure variables live across calls in generate_series(numeric, numeric). In generate_series_step_numeric(), the variables "start_num" and "stop_num" may be potentially freed until the next call. So they should be put in the location which can survive across calls. But previously they were not, and which could cause incorrect behavior of generate_series(numeric, numeric). This commit fixes this problem by copying them on multi_call_memory_ctx. Andrew Gierth 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19e065c0492c34fbccbd2c3707ba68cff14195a3">http://git.postgresql.org/pg/commitdiff/19e065c0492c34fbccbd2c3707ba68cff14195a3</a></li>

<li>Add memory barriers for PgBackendStatus.st_changecount protocol. st_changecount protocol needs the memory barriers to ensure that the apparent order of execution is as it desires. Otherwise, for example, the CPU might rearrange the code so that st_changecount is incremented twice before the modification on a machine with weak memory ordering. This surprising result can lead to bugs. This commit introduces the macros to load and store st_changecount with the memory barriers. These are called before and after PgBackendStatus entries are modified or copied into private memory, in order to prevent CPU from reordering PgBackendStatus access. Per discussion on pgsql-hackers, we decided not to back-patch this to 9.4 or before until we get an actual bug report about this. Patch by me. Review by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38628db8d8caff21eb6cf8d775c0b2d04cf07b9b">http://git.postgresql.org/pg/commitdiff/38628db8d8caff21eb6cf8d775c0b2d04cf07b9b</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Adjust wording of ALTER TABLESPACE restriction. Report by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfb64fde7bb93fb44ebcb1f1924faec5b5705af7">http://git.postgresql.org/pg/commitdiff/cfb64fde7bb93fb44ebcb1f1924faec5b5705af7</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Eisentraut sent in another revision of a patch to implement TRANSFORMs.</li>

<li>Kaigai Kouhei sent in a patch to add ctidscan as an example of the custom scan interface.</li>

<li>Amit Langote sent in a patch to fix a comment typo in typedef struct BrinTuple.</li>

<li>Marko (johto) Tiikkaja sent in a patch to add a DROP PRIVILEGES OWNED BY functionality.</li>

<li>Peter Eisentraut and Michael Paquier traded patches to move the executables from contrib/ to bin/</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to add a few helper functions for making logical replication easier.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to add a sequence access method.</li>

<li>Alexander Shulgin sent in another revision of a patch to add an ssl_protocols configuration option.</li>

<li>Shigeru HANADA sent in a patch to add push-down JOIN support for foreign tables.</li>

<li>Simon Riggs sent in two revisions of a patch to ensure that logical decoding follows timelines.</li>

<li>Michael Paquier sent in a patch to document some modes of vcregress.pl that had not previously been documented.</li>

<li>Michael Paquier sent in a patch to ensure that analyze_new_cluster.bat and delete_old_cluster.bat not be ignored with vcregress upgradecheck.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to enable asynchronous execution in postgres_fdw.</li>

<li>Simon Riggs sent in a patch to start WALWriter during recovery and make it responsible for fsyncing data, allowing WALReceiver to progress other useful actions.</li>

<li>Christoph Berg sent in a patch to fix an unlikely integer overflow.</li>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Amit Kapila sent in two more revisions of a patch to fix a mismatch between pg_basebackup and Windows.</li>

<li>Alexander Shulgin sent in a patch to allow a different HINT to be sent to the server error log and to the client, which will be useful where there's security sensitive information that's more appropriate for a HINT than a DETAIL message. Alongside this, he sent a patch to log a hint if pg_ident.conf or pg_hba.conf changed since last reload.</li>

<li>Heikki Linnakangas sent in four more revisions of a patch to implement a GiST kNN search queue.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT {UPDATE | IGNORE}, and a patch on top of same to fix a bug.</li>

<li>Adam Brightwell and &Aacute;lvaro Herrera traded patches to implement a role attribute bitmask catalog representation.</li>

<li>Tomas Vondra and Ali Akbar traded patches to decrease memory needlessly consumed by array_agg.</li>

<li>Teodor Sigaev sent in another revision of a patch to add a compress method for SP-GiST.</li>

<li>Marius Timmer sent in another revision of a patch to display sort order options in VERBOSE mode of EXPLAIN.</li>

<li>Alexander Shulgin sent in two more revisions of a patch to track TRUNCATE via pgstat.</li>

<li>Teodor Sigaev and David Rowley traded patches to speed up tidmap by caching pages.</li>

<li>Michael Paquier sent in four more revisions of a patch to compress full-page writes.</li>

<li>Teodor Sigaev sent in two more revisions of a patch to speed up tidmap by hashing BlockNumber.</li>

<li>Simon Riggs sent in another revision of a patch to turn off HOT/Cleanup sometimes.</li>

<li>Simon Riggs and David Rowley traded patches intended to make it possible to treat aggregates more flexibly, including strategies for parallelizing.</li>

<li>Tom Lane sent in a patch to make dynahash select normal hash functions.</li>

<li>Heikki Linnakangas sent in a patch to turn many of the btree_gin macros into real functions.</li>

<li>Mark Dilger sent in another revision of a patch to allow Oid formatting in printf/elog strings.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to implement TABLESAMPLE.</li>

<li>Amit Kapila sent in another revision of a patch to implement parallel sequential scan.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to keep track of transaction commit timestamps.</li>

<li>Heikki Linnakangas sent in a patch to fix an issue with bogus WAL segments archived after promotion by removing the suspect segments at timeline switch.</li>

<li>Heikki Linnakangas sent in a patch to make WAL archival behave more sensibly in standby mode.</li>

<li>&Aacute;lvaro Herrera sent in a patch to distinguish domain constraint from table constraints.</li>

<li>Robert Haas sent in another revision of a patch to implement parallel mode and parallel contexts.</li>

<li>Peter Geoghegan sent in a patch to add a new HINT -- a guess as to what column the user might have intended to reference, to be shown in various contexts where an ERRCODE_UNDEFINED_COLUMN error is raised.</li>

<li>Andrew Dunstan sent in another revision of a patch to fix psql's over-eager use of pagers via a pager_min_lines setting.</li>

<li>Tatsuo Ishii sent in another revision of a patch to fix an infelicity between pgbench -f and vacuum.</li>

<li>Michael Paquier sent in a patch to fix some make problems with the addition of test programs to contrib.</li>

</ul>