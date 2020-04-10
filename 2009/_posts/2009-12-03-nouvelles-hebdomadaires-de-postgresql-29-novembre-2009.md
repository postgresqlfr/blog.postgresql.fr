---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 novembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-12-03-nouvelles-hebdomadaires-de-postgresql-29-novembre-2009 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix an old bug in multixact and two-phase commit. Prepared transactions can be part of multixacts, so allocate a slot for each prepared transaction in the "oldest member" array in multixact.c. On PREPARE TRANSACTION, transfer the oldest member value from the current backends slot to the prepared xact slot. Also save and recover the value from the 2PC state file. The symptom of the bug was that after a transaction prepared, a shared lock still held by the prepared transaction was sometimes ignored by other transactions. Fix back to 8.1, where both 2PC and multixact were introduced.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/win32.mak, add missing library to standalone libpq build on Win32. Hiroshi Saito.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Use diff's -w switch only on Windows, to avoid problems with inconsistent newline representations. Per buildfarm results and subsequent discussion. Sync up a couple of other places that had their own policies.</li>

<li>Simplify psql's new linestyle behavior to default to linestyle=ascii all the time, rather than hoping we can tell whether the terminal supports UTF8 characters. Per discussion.</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, fix missing end tag, per Jeff Davis.</li>

<li>Eliminate a lot of list-management overhead within join_search_one_level by adding a requirement that build_join_rel add new join RelOptInfos to the appropriate list immediately at creation. Per report from Robert Haas, the list_concat_unique_ptr() calls that this change eliminates were taking the lion's share of the runtime in larger join problems. This doesn't do anything to fix the fundamental combinatorial explosion in large join problems, but it should push out the threshold of pain a bit further. Note: because this changes the order in which joinrel lists are built, it might result in changes in selected plans in cases where different alternatives have exactly the same costs. There is one example in the regression tests.</li>

<li>Add support for an application_name parameter, which is displayed in pg_stat_activity and recorded in log entries. Dave Page, reviewed by Andres Freund.</li>

<li>Add support for anonymous code blocks (DO blocks) to PL/Perl. Patch by Joshua Tolley, reviews by Brendan Jurd and Tim Bunce.</li>

<li>Make pg_stat_activity.application_name visible to all users, rather than being hidden when current_query is. Relocate it to a column position more consistent with that behavior. Per discussion.</li>

<li>Add some opr_sanity checks that the lengths of the various argument-info arrays in a pg_proc entry match. Seems like an easy mistake to make when manually adjusting these values in a pg_proc.h entry.</li>

<li>In pgsql/src/pl/plperl/plperl.c, fix session-lifespan memory leak when a plperl function is redefined: we have to tell Perl it can release its compiled copy of the function text. Noted by Alexey Klyukin. Back-patch to 8.2 --- the problem exists further back, but this patch won't work without modification, and it's probably not worth the trouble.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Add PG_MODULE_MAGIC and some missing include files to examples. Euler Taveira de Oliveira.</li>

<li>In pgsql/doc/src/sgml/func.sgml, fix syntax in extract() examples. Erik Rijkers.</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, remove prefix "ERROR:" from some messages, to make everything consistent</li>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, error when a specified connection service is not found, instead of ignoring it.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/ecpglib/misc.c, made function better readable.</li>

<li>Added dynamic cursor names to ecpg. Almost the whole patch was done by Boszormenyi Zoltan, with only a minor tweak or two from me.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.addons, synced addon rules after some renamings.</li>

<li>In pgsql/src/interfaces/ecpg/ChangeLog, forgot to add dynamic cursors to Changelog.</li>

<li>In ECPG, added missing files.</li>

<li>In ECPG, added script to check if all rule re-definition in ecpg.addons are indeed used in the build process. If not the build process will stop with an error message.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/data.c, if no result is given NOTFOUND should be returned. Check for empty result string too.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.addons, remove */ characters from declare cursor statements before putting them into a comment.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/vacuumdb.sgml, document ath vacuumdb --analyze does analyze _also_, not in place of vacuum.</li>

<li>Improve test descriptions displayed during test_fsync; increase default loops to 5k.</li>

<li>Add link to external fsync testing script and our fsync test tool.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marko (johto) Tiikkaja sent in another revision of the writeable CTE patch. Tom Lane responded with another one.</li>

<li>Teodor Sigaev sent in a patch to add red-black trees to GIN.</li>

<li>Teodor Sigaev sent in a patch to add some point operations for GiST.</li>

<li>Teodor Sigaev sent in a patch to add a supplied module which does K-nearest-neighbor efficiently using GiST.</li>

<li>Alexey Klyukin sent in a patch to improve PL/Perl's support for PostgreSQL arrays.</li>

<li>Daniel Farina sent in a group of patches to allow COPY TO FUNCTION and add support to same to dblink.</li>

<li>Andrew Dunstan sent in a patch to allow ragged COPYing.</li>

<li>Per a review by Jeff Janes, ITAGAKI Takahiro sent in another revision of the patch to add a BUFFERS option to EXPLAIN.</li>

<li>Tim Bunce sent in two revisions of a patch refactoring PL/Perl[U] per discussion.</li>

<li>Zdenek Kotala sent in a patch to refactor the path Docbook uses so it works better on Solaris.</li>

<li>Jeff Davis sent on three more revisions of the operator exclusion constraints patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the partitioning syntax patch.</li>

<li>Magnus Hagander sent in a patch to add git to the PostgreSQL official documentation.</li>

<li>Teodor Sigaev sent in two revisions of a WIP patch to add k-nearest-neighbor searches to GiST.</li>

<li>Robert Haas sent in another revision of the patch to allow people to set random_page_cost and seq_page_cost per tablespace.</li>

<li>Simon Riggs sent in a patch to fix some issues in hot standby.</li>

<li>Jeff Davis sent in a doc patch atop the new VACUUM FULL patch.</li>

<li>Hitoshi Harada sent in another revision of the patch to add more ROWS options for frames in windowing functions.</li>

<li>Magnus Hagander sent in a patch to fix LDAP.</li>

<li>Kurt Harriman sent in a patch to remove a gcc dependency in the definition of inline functions.</li>

</ul>