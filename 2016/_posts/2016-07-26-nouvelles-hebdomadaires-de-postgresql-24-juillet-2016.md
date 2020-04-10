---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 juillet 2016"
author: "NBougain"
redirect_from: "index.php?post/2016-07-26-nouvelles-hebdomadaires-de-postgresql-24-juillet-2016 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Correctly set up aggregate FILTER expression in partial-aggregation plans. The aggfilter expression should be removed from the parent (combining) Aggref, since it's not supposed to apply the filter, and indeed cannot because any Vars used in the filter would not be available after the lower-level aggregation step. Per report from Jeff Janes. (This has been broken since the introduction of partial aggregation, I think. The error became obvious after commit 59a3795c2, when setrefs.c began processing the parent Aggref's fields normally and thus would detect such Vars. The special-case coding previously used in setrefs.c skipped over the parent's aggfilter field without processing it. That was broken in its own way because no other setrefs.c processing got applied either; though since the executor would not execute the filter expression, only initialize it, that oversight might not have had any visible symptoms at present.) Report: &lt;CAMkU=1xfuPf2edAe4ZGXTmJpU7jxuKukKyvNtEXwu35B7dvejg@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d85bb1ba79c2792214df9fa17bcc8fac229c11c">http://git.postgresql.org/pg/commitdiff/6d85bb1ba79c2792214df9fa17bcc8fac229c11c</a></li>

<li>Fix regression tests to work in Welsh locale. Welsh (cy_GB) apparently sorts 'dd' after 'f', creating problems analogous to the odd sorting of 'aa' in Danish. Adjust regression test case to not use data that provokes that. Jeff Janes Patch: &lt;CAMkU=1zx-pqcfSApL2pYDQurPOCfcYU0wJorsmY1OrYPiXRbLw@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d7abca901f855d96d823b6edb893b2b4ccf8c2f">http://git.postgresql.org/pg/commitdiff/9d7abca901f855d96d823b6edb893b2b4ccf8c2f</a></li>

<li>Remove GetUserMappingId() and GetUserMappingById(). These functions were added in commits fbe5a3fb7 and a104a017f, but commit 45639a052 removed their only callers. Put the related code in foreign.c back to the way it was in 9.5, to avoid pointless cross-version diffs. Etsuro Fujita Patch: &lt;d674a3f1-6b63-519c-ef3f-f3188ed6a178@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13bf801a255aaa18c43f0d17e24ffdb03a77ca31">http://git.postgresql.org/pg/commitdiff/13bf801a255aaa18c43f0d17e24ffdb03a77ca31</a></li>

<li>Make contrib regression tests safe for Danish locale. In btree_gin and citext, avoid some not-particularly-interesting dependencies on the sorting of 'aa'. In tsearch2, use COLLATE "C" to remove an uninteresting dependency on locale sort order (and thereby allow removal of a variant expected-file). Also, in citext, avoid assuming that lower('I') = 'i'. This isn't relevant to Danish but it does fail in Turkish. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d70d119151d8e3442500be5e372439ef8805ec2b">http://git.postgresql.org/pg/commitdiff/d70d119151d8e3442500be5e372439ef8805ec2b</a></li>

<li>Make pltcl regression tests safe for Danish locale. Another peculiarity of Danish locale is that it has an unusual idea of how to sort upper vs. lower case. One of the pltcl test cases has an issue with that. Now that COLLATE works in all supported branches, we can just change the test to be locale-independent, and get rid of the variant expected file that used to support non-C locales. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95810ed8ee4223cfbad257f2d5f5f7d7da60c971">http://git.postgresql.org/pg/commitdiff/95810ed8ee4223cfbad257f2d5f5f7d7da60c971</a></li>

<li>Make core regression tests safe for Danish locale. Some tests added in 9.5 depended on 'aa' sorting before 'bb', which doesn't hold true in Danish. Use slightly different test data to avoid the problem. Jeff Janes Report: &lt;CAMkU=1w-cEDbA+XHdNb=YS_4wvZbs66Ni9KeSJKAJGNJyOsgQw@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3399cb0f68855886aa1a13a246fa5fc46e304e8">http://git.postgresql.org/pg/commitdiff/b3399cb0f68855886aa1a13a246fa5fc46e304e8</a></li>

<li>Remove very-obsolete estimates of shmem usage from postgresql.conf.sample. runtime.sgml used to contain a table of estimated shared memory consumption rates for max_connections and some other GUCs. Commit 390bfc643 removed that on the well-founded grounds that (a) we weren't maintaining the entries well and (b) it no longer mattered so much once we got out from under SysV shmem limits. But it missed that there were even-more-obsolete versions of some of those numbers in comments in postgresql.conf.sample. Remove those too. Back-patch to 9.3 where the aforesaid commit went in. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79a84743096d661c6d085f40065c4b13b63acf6c">http://git.postgresql.org/pg/commitdiff/79a84743096d661c6d085f40065c4b13b63acf6c</a></li>

<li>Stamp 9.6beta3. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b11e9bbc41d1906360f1fbaab133118e703de75a">http://git.postgresql.org/pg/commitdiff/b11e9bbc41d1906360f1fbaab133118e703de75a</a></li>

<li>Doc: improve discussion of plpgsql's GET DIAGNOSTICS, other minor fixes. 9.4 added a second description of GET DIAGNOSTICS that was totally independent of the existing one, resulting in each description lying to the extent that it claimed the set of status items it described was complete. Fix that, and do some minor markup improvement. Also some other small fixes per bug #14258 from Dilian Palauzov. Discussion: &lt;20160718181437.1414.40802@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ade64d05a0c9c77def776f64ea399697c3cd7f61">http://git.postgresql.org/pg/commitdiff/ade64d05a0c9c77def776f64ea399697c3cd7f61</a></li>

<li>Doc: fix table of BRIN operator strategy numbers. brin-extensibility-inclusion-table was confused in places about the difference between strategy 4 (RTOverRight) and strategy 5 (RTRight). Alexander Law <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82bbfc75c1bc3338b7208f1a7664878de0d3c59b">http://git.postgresql.org/pg/commitdiff/82bbfc75c1bc3338b7208f1a7664878de0d3c59b</a></li>

<li>Remove obsolete comment. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65632082b7eb3c7d56f1b42e1df452d0f66bc189">http://git.postgresql.org/pg/commitdiff/65632082b7eb3c7d56f1b42e1df452d0f66bc189</a></li>

<li>Establish conventions about global object names used in regression tests. To ensure that "make installcheck" can be used safely against an existing installation, we need to be careful about what global object names (database, role, and tablespace names) we use; otherwise we might accidentally clobber important objects. There's been a weak consensus that test databases should have names including "regression", and that test role names should start with "regress_", but we didn't have any particular rule about tablespace names; and neither of the other rules was followed with any consistency either. This commit moves us a long way towards having a hard-and-fast rule that regression test databases must have names including "regression", and that test role and tablespace names must start with "regress_". It's not completely there because I did not touch some test cases in rolenames.sql that test creation of special role names like "session_user". That will require some rethinking of exactly what we want to test, whereas the intent of this patch is just to hit all the cases in which the needed renamings are cosmetic. There is no enforcement mechanism in this patch either, but if we don't add one we can expect that the tests will soon be violating the convention again. Again, that's not such a cosmetic change and it will require discussion. (But I did use a quick-hack enforcement patch to find these cases.) Discussion: &lt;16638.1468620817@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18555b1323bd225c7882e80723c52f25ce60afed">http://git.postgresql.org/pg/commitdiff/18555b1323bd225c7882e80723c52f25ce60afed</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Clear all-frozen visibilitymap status when locking tuples. Since a892234 &amp; fd31cd265 the visibilitymap's freeze bit is used to avoid vacuuming the whole relation in anti-wraparound vacuums. Doing so correctly relies on not adding xids to the heap without also unsetting the visibilitymap flag. Tuple locking related code has not done so. To allow selectively resetting all-frozen - to avoid pessimizing heap_lock_tuple - allow to selectively reset the all-frozen with visibilitymap_clear(). To avoid having to use visibilitymap_get_status (e.g. via VM_ALL_FROZEN) inside a critical section, have visibilitymap_clear() return whether any bits have been reset. There's a remaining issue (denoted by XXX): After the PageIsAllVisible() check in heap_lock_tuple() and heap_lock_updated_tuple_rec() the page status could theoretically change. Practically that currently seems impossible, because updaters will hold a page level pin already. Due to the next beta coming up, it seems better to get the required WAL magic bump done before resolving this issue. The added flags field fields to xl_heap_lock and xl_heap_lock_updated require bumping the WAL magic. Since there's already been a catversion bump since the last beta, that's not an issue. Reviewed-By: Robert Haas, Amit Kapila and Andres Freund Author: Masahiko Sawada, heavily revised by Andres Freund Discussion: CAEepm=3fWAbWryVW9swHyLTY4sXVf0xbLvXqOwUoDiNCx9mBjQ@mail.gmail.com Backpatch: - <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eca0f1db14ac92d91d54eca8eeff2d15ccd797fa">http://git.postgresql.org/pg/commitdiff/eca0f1db14ac92d91d54eca8eeff2d15ccd797fa</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Translation updates Source-Git-URL: git://git.postgresql.org/git/pgtranslation/messages.git Source-Git-Hash: 3d71988dffd3c0798a8864c55ca4b7833b48abb1 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d676065690d5101d95a6b34797ee2a93514a7c3">http://git.postgresql.org/pg/commitdiff/7d676065690d5101d95a6b34797ee2a93514a7c3</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typos in comments and debug message. Antonin Houska <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55d57359f2ebebabd0387b437c9e3ef80312582f">http://git.postgresql.org/pg/commitdiff/55d57359f2ebebabd0387b437c9e3ef80312582f</a></li>

<li>Fix typos. Alexander Law <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/094ea692ee46c2af8c4d249b8fae6e4289102828">http://git.postgresql.org/pg/commitdiff/094ea692ee46c2af8c4d249b8fae6e4289102828</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Add comment &amp; docs about no vacuum truncation with sto. Omission noted by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c15aac53f3421fd38ae145118d3204f055ba955">http://git.postgresql.org/pg/commitdiff/1c15aac53f3421fd38ae145118d3204f055ba955</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Remove unused structure member. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1091402b5aa4873cf8321e204f929731765c82bc">http://git.postgresql.org/pg/commitdiff/1091402b5aa4873cf8321e204f929731765c82bc</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Make the AIX case of Makefile.shlib safe for parallel make. Use our typical approach, from src/backend/parser. Back-patch to 9.1 (all supported versions). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8564ef034333c6ba6fd3d0c6ecf18214a4e988b">http://git.postgresql.org/pg/commitdiff/e8564ef034333c6ba6fd3d0c6ecf18214a4e988b</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Emre Hasegeli sent another revision of the patch to fix some floating point comparison inconsistencies of the geometric types.</p>

<p>Haribabu Kommi sent another revision of the patch to implement multi-tenancy using row-based access controls.</p>

<p>Ashutosh Bapat sent in a patch to implement the logic to assess whether two partitioned tables can be joined using the partition-wise join technique described earlier.</p>

<p>Masahiko Sawada sent in a patch to rename file number of sync_rep.pl to fill in a gap.</p>

<p>David Fetter sent in two revisions of a patch to make it possible to disallow UPDATEs and DELETEs which include no WHERE clause.</p>

<p>Kyotaro HORIGUCHI sent in patches to add the reason why we use replayEndRecPtr as recovery-end point, and fix the documentation about pg_stop_backup.</p>

<p>Kyotaro HORIGUCHI sent in another flock of patches in service of asynchronous and vectorized execution.</p>

<p>Amit Langote sent in a patch to fix an oversight in the interaction of marking constraints as (IN)VALID and table inheritance.</p>

<p>Etsuro Fujita sent in a patch to remove some lightly-used user mapping helper functions.</p>

<p>Mithun Cy sent in a patch to cache the meta page of Hash index in backend-private memory.</p>

<p>Anton Dign&ouml;s sent in a patch to add temporal query processing with range types.</p>

<p>Amit Kapila sent in a patch to fix a concurrency issue in the freeze map code.</p>

<p>Thomas Munro sent in a patch to fix the problem of LWLocks not working in DSM segments by adding a non-circular variant of the dlist interface that uses NULL list termination.</p>

<p>Andrew Borodin sent in another revision of the patch to optimize memmoves in gistplacetopage for fixed-size updates.</p>