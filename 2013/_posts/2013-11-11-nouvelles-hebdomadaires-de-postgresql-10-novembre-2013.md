---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 novembre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/11/11/Nouvelles-hebdomadaires-de-PostgreSQL-10-novembre-2013"
---


<p>La prochaine <em>CommitFest</em> d&eacute;marre le 15 novembre 2013. Pr&eacute;parez-vous &agrave; la relecture de patches&nbsp;!</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 4.1, un analyseur parall&eacute;lisable de logs PostgreSQL &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="http://dalibo.github.io/pgbadger/">http://dalibo.github.io/pgbadger/</a></li>

<li>pg_repack 1.2.0-beta1, un utilitaire pour nettoyer les chutes des tables &amp; index, et r&eacute;tablir le tri fourni par les index <em>cluster</em>&nbsp;: 

<a target="_blank" href="http://reorg.github.io/pg_repack/">http://reorg.github.io/pg_repack/</a></li>

<li>PostgreSQL SIDU 5.1, une interface web pour administration de bases de donn&eacute;es&nbsp;: 

<a target="_blank" href="http://topnew.net/sidu">http://topnew.net/sidu</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La quatri&egrave;me &eacute;dition du PGDay argentin se tiendra le 14 novembre 2013 &agrave; Buenos Aires, Argentine&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PGDay_Argentina_2013">http://wiki.postgresql.org/wiki/PGDay_Argentina_2013</a></li>

<li>La prochaine r&eacute;union du PUG indien aura lieu &agrave; Pune le 16 novembre 2013. Infos &amp; RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/events/146224752/">http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/events/146224752/</a><br>

Conf&eacute;rences&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/messages/boards/thread/38935632/">http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/messages/boards/thread/38935632/</a></li>

<li>Le PGDay cubain aura lieu les 28 &amp; 29 novembre 2013&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?page_id=474">http://postgresql.uci.cu/?page_id=474</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20131111055819.GA4195@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix parsing of xlog file name in pg_receivexlog. The parsing of WAL filenames of segments larger than &gt; 255 was broken, making pg_receivexlog unable to restart streaming after stopping it. The bug was introduced by the changes in 9.3 to represent WAL segment number as a 64-bit integer instead of two ints, log and seg. To fix, replace the plain sscanf call with XLogFromFileName macro, which does the conversion from log+seg to a 64-bit integer correcly. Reported by Mika Eloranta. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2103430179c6be37d68364c84d68d5211472f528">http://git.postgresql.org/pg/commitdiff/2103430179c6be37d68364c84d68d5211472f528</a></li>

<li>Misc GIN refactoring. Merge the isEnoughSpace and placeToPage functions in the b-tree interface into one function that tries to put a tuple on page, and returns false if it doesn't fit. Move createPostingTree function to gindatapage.c, and change its contract so that it can be passed more items than fit on the root page. It's in a better position than the callers to know how many items fit. Move ginMergeItemPointers out of gindatapage.c, into a separate file. These changes make no difference now, but reduce the footprint of Alexander Korotkov's upcoming patch to pack item pointers more tightly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ecaa4708e5dde5e9f72cdb066780acb4b12ee0ec">http://git.postgresql.org/pg/commitdiff/ecaa4708e5dde5e9f72cdb066780acb4b12ee0ec</a></li>

<li>Fix missing argument and function prototypes. Not sure how I missed these in previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ea53256a856693dc8e8e1ce5ce26b3438d2e341">http://git.postgresql.org/pg/commitdiff/0ea53256a856693dc8e8e1ce5ce26b3438d2e341</a></li>

<li>Fix setting of right bound at GIN page split. Broken by my refactoring. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fde7172d932bc0c6e62be50293876916efada016">http://git.postgresql.org/pg/commitdiff/fde7172d932bc0c6e62be50293876916efada016</a></li>

<li>Fix race condition in GIN posting tree page deletion. If a page is deleted, and reused for something else, just as a search is following a rightlink to it from its left sibling, the search would continue scanning whatever the new contents of the page are. That could lead to incorrect query results, or even something more curious if the page is reused for a different kind of a page. To fix, modify the search algorithm to lock the next page before releasing the previous one, and refrain from deleting pages from the leftmost branch of the tree. Add a new Concurrency section to the README, explaining why this works. There is a lot more one could say about concurrency in GIN, but that's for another patch. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac4ab97ec05ea900db0f14d428cae2e79832e02d">http://git.postgresql.org/pg/commitdiff/ac4ab97ec05ea900db0f14d428cae2e79832e02d</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix format code used to print dsm request sizes. Per report from Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dddc34408aa6ca535e89cb26653014bb019bc263">http://git.postgresql.org/pg/commitdiff/dddc34408aa6ca535e89cb26653014bb019bc263</a></li>

<li>Add the notion of REPLICA IDENTITY for a table. Pending patches for logical replication will use this to determine which columns of a tuple ought to be considered as its candidate key. Andres Freund, with minor, mostly cosmetic adjustments by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07cacba983ef79be4a84fcd0e0ca3b5fcb85dd65">http://git.postgresql.org/pg/commitdiff/07cacba983ef79be4a84fcd0e0ca3b5fcb85dd65</a></li>

<li>doc: Clarify under what circumstances pg_dump needs superuser access. Inspired by, but different from, a patch from Ivan Lezhnjov IV 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/636b868f17a6d38c0f9e099ea8f389a555403f9e">http://git.postgresql.org/pg/commitdiff/636b868f17a6d38c0f9e099ea8f389a555403f9e</a></li>

<li>Fix pg_isolation_regress to work outside its build directory. This makes it possible to, for example, use the isolation tester to test a contrib module. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b4d52f2095be96ca238ce41f6963ec56376491f">http://git.postgresql.org/pg/commitdiff/9b4d52f2095be96ca238ce41f6963ec56376491f</a></li>

<li>Fix ECPG compiler warning. Commit 9b4d52f2095be96ca238ce41f6963ec56376491f failed to notice that pg_regress_ecpg needed updating. This patch was independently submitted by both David Rowley and Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dca09ac53329e92d73f45674957c26d3d7ae5117">http://git.postgresql.org/pg/commitdiff/dca09ac53329e92d73f45674957c26d3d7ae5117</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix breakage of MV column name list usage. Per bug report from Tomonari Katsumata. Back-patch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/732758db4c8226b74a6ea7a90bc8c3cd15f5fe86">http://git.postgresql.org/pg/commitdiff/732758db4c8226b74a6ea7a90bc8c3cd15f5fe86</a></li>

<li>Lock relation used to generate fresh data for RMV. The relation should not be accessible to any other process, but it should be locked for consistency. Since this is not known to cause any bug, it will not be back-patch, at least for now. Per report from Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2636ecf78b608f7faf1a0a7ff9b56fa54b7710db">http://git.postgresql.org/pg/commitdiff/2636ecf78b608f7faf1a0a7ff9b56fa54b7710db</a></li>

<li>Keep heap open until new heap generated in RMV. Early close became apparent when invalidation messages were processed in a new location under CLOBBER_CACHE_ALWAYS builds, due to additional locking. Back-patch to 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5829082a57be8bcbc5f75cd28d935730b783c6d2">http://git.postgresql.org/pg/commitdiff/5829082a57be8bcbc5f75cd28d935730b783c6d2</a></li>

<li>Silence benign warnings from clang version 3.0-6ubuntu3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b64b5ccb6a9c6877080b8ef86790e738031089d5">http://git.postgresql.org/pg/commitdiff/b64b5ccb6a9c6877080b8ef86790e738031089d5</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix some obsolete information in src/backend/optimizer/README. Constant quals aren't handled the same way they used to be. Also, add mention of a couple more major steps in grouping_planner. Per complaint a couple months back from Etsuro Fujita. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6331de1d44f01d408aa48c5c996bae8932f7a072">http://git.postgresql.org/pg/commitdiff/6331de1d44f01d408aa48c5c996bae8932f7a072</a></li>

<li>Revert commit 0725065b37b8b0e9074a624a8d3e3ac1844fc820. The previous commit was intended to make psql show the full path name when doing a \s (history save), but it was very badly implemented and would show confusing if not outright wrong information in many situations; for instance if the path name given to \s is absolute, or if \cd commands involving relative paths have been issued. Consensus seems to be that we don't especially need this functionality in \s, and certainly not in \s alone. So revert rather than trying to fix it up. Per gripe from Ian Barwick. Although the bogus behavior exists in all supported versions, I'm not back-patching, because the work created for translators (by change of a translatable message) would probably outweigh the value of what is after all a mostly-cosmetic change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d4e6133c681f0038861e5cf8707302bd80917fa0">http://git.postgresql.org/pg/commitdiff/d4e6133c681f0038861e5cf8707302bd80917fa0</a></li>

<li>Improve the error message given for modifying a window with frame clause. For rather inscrutable reasons, SQL:2008 disallows copying-and-modifying a window definition that has any explicit framing clause. The error message we gave for this only made sense if the referencing window definition itself contains an explicit framing clause, which it might well not. Moreover, in the context of an OVER clause it's not exactly obvious that "OVER (windowname)" implies copy-and-modify while "OVER windowname" does not. This has led to multiple complaints, eg bug #5199 from Iliya Krapchatov. Change to a hopefully more intelligible error message, and in the case where we have just "OVER (windowname)", add a HINT suggesting that omitting the parentheses will fix it. Also improve the related documentation. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/920c8261d58c10de7e68d99c8dd21a9650928d59">http://git.postgresql.org/pg/commitdiff/920c8261d58c10de7e68d99c8dd21a9650928d59</a></li>

<li>Support default arguments and named-argument notation for window functions. These things didn't work because the planner omitted to do the necessary preprocessing of a WindowFunc's argument list. Add the few dozen lines of code needed to handle that. Although this sounds like a feature addition, it's really a bug fix because the default-argument case was likely to crash previously, due to lack of checking of the number of supplied arguments in the built-in window functions. It's not a security issue because there's no way for a non-superuser to create a window function definition with defaults that refers to a built-in C function, but nonetheless people might be annoyed that it crashes rather than producing a useful error message. So back-patch as far as the patch applies easily, which turns out to be 9.2. I'll put a band-aid in earlier versions as a separate patch. (Note that these features still don't work for aggregates, and fixing that case will be harder since we represent aggregate arg lists as target lists not bare expression lists. There's no crash risk though because CREATE AGGREGATE doesn't accept defaults, and we reject named-argument notation when parsing an aggregate call.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb45c640411af61279bea044f8d108f9da96b735">http://git.postgresql.org/pg/commitdiff/bb45c640411af61279bea044f8d108f9da96b735</a></li>

<li>Be more robust when strerror() doesn't give a useful result. glibc, at least, is capable of returning "???" instead of anything useful if it doesn't like the setting of LC_CTYPE. If this happens, or in the previously-known case of strerror() returning an empty string, try to print the C macro name for the error code ("EACCES" etc). Only if we don't have the error code in our compiled-in list of popular error codes (which covers most though not quite all of what's called out in the POSIX spec) will we fall back to printing a numeric error code. This should simplify debugging. Note that this functionality is currently only provided for %m in backend ereport/elog messages. That may be sufficient, since we don't fool with the locale environment in frontend clients, but it's foreseeable that we might want similar code in libpq for instance. There was some talk of back-patching this, but let's see how the buildfarm likes it first. It seems likely that at least some of the POSIX-defined error code symbols don't exist on all platforms. I don't want to clutter the entire list with #ifdefs, but we may need more than are here now. MauMau, edited by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e68816cc2567642c6fcca4eaac66c25e0ae5ced">http://git.postgresql.org/pg/commitdiff/8e68816cc2567642c6fcca4eaac66c25e0ae5ced</a></li>

<li>Add #ifdef guards for some POSIX error symbols that Windows doesn't like. Per buildfarm results. It looks like the older the Windows version, the more errno codes it hasn't got ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8dace66e0735ca39b779922d02c24ea2686e6521">http://git.postgresql.org/pg/commitdiff/8dace66e0735ca39b779922d02c24ea2686e6521</a></li>

<li>Fix generation of MergeAppend plans for optimized min/max on expressions. Before jamming a desired targetlist into a plan node, one really ought to make sure the plan node can handle projections, and insert a buffering Result plan node if not. planagg.c forgot to do this, which is a hangover from the days when it only dealt with IndexScan plan types. MergeAppend doesn't project though, not to mention that it gets unhappy if you remove its possibly-resjunk sort columns. The code accidentally failed to fail for cases in which the min/max argument was a simple Var, because the new targetlist would be equivalent to the original "flat" tlist anyway. For any more complex case, it's been broken since 9.1 where we introduced the ability to optimize min/max using MergeAppend, as reported by Raphael Bauduin. Fix by duplicating the logic from grouping_planner that decides whether we need a Result node. In 9.2 and 9.1, this requires back-porting the tlist_same_exprs() function introduced in commit 4387cf956b9eb13aad569634e0c4df081d76e2e3, else we'd uselessly add a Result node in cases that worked before. It's rather tempting to back-patch that whole commit so that we can avoid extra Result nodes in mainline cases too; but I'll refrain, since that code hasn't really seen all that much field testing yet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e900bc00f77da8d5c28812c49f48858755fba44">http://git.postgresql.org/pg/commitdiff/5e900bc00f77da8d5c28812c49f48858755fba44</a></li>

<li>Prevent display of dropped columns in row constraint violation messages. ExecBuildSlotValueDescription() printed "null" for each dropped column in a row being complained of by ExecConstraints(). This has some sanity in terms of the underlying implementation, but is of course pretty surprising to users. To fix, we must pass the target relation's descriptor to ExecBuildSlotValueDescription(), because the slot descriptor it had been using doesn't get labeled with attisdropped markers. Per bug #8408 from Maxim Boguk. Back-patch to 9.2 where the feature of printing row values in NOT NULL and CHECK constraint violation messages was introduced. Michael Paquier and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c28b289bf365ab11f23460d02a43667f6a8b8bc7">http://git.postgresql.org/pg/commitdiff/c28b289bf365ab11f23460d02a43667f6a8b8bc7</a></li>

<li>Make LOCK_PRINT &amp; PROCLOCK_PRINT expand to ((void) 0) when not in use. This avoids warnings from more-anal-than-average compilers, and might prevent hidden syntax problems in the future. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20803d7881c3865edede170579f55261140b5d0d">http://git.postgresql.org/pg/commitdiff/20803d7881c3865edede170579f55261140b5d0d</a></li>

<li>Fix subtly-wrong volatility checking in BeginCopyFrom(). contain_volatile_functions() is best applied to the output of expression_planner(), not its input, so that insertion of function default arguments and constant-folding have been done. (See comments at CheckMutability, for instance.) It's perhaps unlikely that anyone will notice a difference in practice, but still we should do it properly. In passing, change variable type from Node* to Expr* to reduce the net number of casts needed. Noted while perusing uses of contain_volatile_functions(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/060b22a99a67e01aa097f1a21d2123f166ccdb15">http://git.postgresql.org/pg/commitdiff/060b22a99a67e01aa097f1a21d2123f166ccdb15</a></li>

<li>Make contain_volatile_functions/contain_mutable_functions look into SubLinks. This change prevents us from doing inappropriate subquery flattening in cases such as dangerous functions hidden inside a sub-SELECT in the targetlist of another sub-SELECT. That could result in unexpected behavior due to multiple evaluations of a volatile function, as in a recent complaint from Etienne Dube. It's been questionable from the very beginning whether these functions should look into subqueries (as noted in their comments), and this case seems to provide proof that they should. Because the new code only descends into SubLinks, not SubPlans or InitPlans, the change only affects the planner's behavior during prepjointree processing and not later on --- for example, you can still get it to use a volatile function in an indexqual if you wrap the function in (SELECT ...). That's a historical behavior, for sure, but it's reasonable given that the executor's evaluation rules for subplans don't depend on whether there are volatile functions inside them. In any case, we need to constrain the behavioral change as narrowly as we can to make this reasonable to back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b97ee66cc1f9319f7b457e7d8a78aab711da2dda">http://git.postgresql.org/pg/commitdiff/b97ee66cc1f9319f7b457e7d8a78aab711da2dda</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace issues found by git diff --check, add gitattributes. Set per file type attributes in .gitattributes to fine-tune whitespace checks. With the associated cleanups, the tree is now clean for git 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/001e114b8d59f4eaf2a314a2bc5e57078afdf82f">http://git.postgresql.org/pg/commitdiff/001e114b8d59f4eaf2a314a2bc5e57078afdf82f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Rowley sent in a patch to change some uses of appendPQExpBuffer to appendPQExpBufferStr.</li>

<li>Michael Paquier sent in two revisions of a patch to remove the 'archive' wal_level.</li>

<li>Atri Sharma sent in another revision of a patch to implement WITHIN GROUP.</li>

<li>Heikki Linnakangas and Andres Freund trade patches to fix an issue where there was a missing RelationCloseSmgr in FreeFakeRelcacheEntry.</li>

<li>Alexander Korotkov and Heikki Linnakangas traded patches to improve GIN indexes by adding information to them.</li>

<li>Arul Shaji Arulappan sent in a patch to add NCHAR and NVARCHAR types.</li>

<li>Heikki Linnakangas sent in a patch to fix an issue where certain types of failures on insertion into a b-tree can cause havoc.</li>

<li>Sameer Thakur sent in another revision of a patch to prevent underestimates from propagating in pg_stat_statements.</li>

<li>Andres Freund sent in a patch to add cassert-only checks against unlocked use of relations.</li>

<li>Oskari Saarenmaa sent in two more revisions of a patch to identify whether a PostgreSQL build is from a standard released version.</li>

<li>Rajeev Rastogi sent in a patch to split the pg_resetxlog output into pre- and post-sections, per TODO.</li>

<li>Andres Freund sent in another revision of a patch to implement some infrastructure for logical changesets.</li>

<li>KaiGai Kohei sent in a pair of patches which add a custom scan node and use same to allow pushing down JOINs to a remote data store, in this case via the PostgreSQL FDW.</li>

<li>Marko Kreen sent in a pair of patches to the SSL implementation, one which adds a GUC option to prefer server cipher order, the other which supports ECDH key excange.</li>

<li>Andres Freund sent in two patches to make better atomics, taking the capabilities of common CPUs into account.</li>

<li>Dean Rasheed sent in a WIP patch to make security barrier views updateable.</li>

<li>David Rowley sent in a patch to fix an unused variable warning on Windows build.</li>

<li>Andres Freund sent in two more revisions of a patch to fix an ALTER TABLE regression test issue.</li>

<li>Tom Lane sent in a patch to check volatility within sublinks and disallow pullup of a subquery when it's found.</li>

<li>Dilip Kumar sent in two revisions of a patch to allow vacuumdb to use more than one core.</li>

<li>Etsuro Fujita sent in a patch to improve the code in tidbitmap.c and make it more efficient in the process.</li>

<li>Robert Haas sent in another revision of a patch to allow on-detach callbacks for shared memory segments.</li>

<li>Alvaro Herrera sent a WIP patch for CREATE EVENT TRIGGER.</li>

<li>Nigel Heron sent in another revision of a patch to collect and report on statistics for network traffic.</li>

<li>Alvaro Herrera sent in another revision of a patch to implement min-max indexes.</li>

<li>Peter Eisentraut sent in a patch to implement parameter_default in the information schema.</li>

</ul>