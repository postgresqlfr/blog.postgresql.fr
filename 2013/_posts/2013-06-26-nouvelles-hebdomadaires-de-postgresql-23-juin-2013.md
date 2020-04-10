---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 juin 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-06-26-nouvelles-hebdomadaires-de-postgresql-23-juin-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Jeff Davis a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add buffer_std flag to MarkBufferDirtyHint(). MarkBufferDirtyHint() writes WAL, and should know if it's got a standard buffer or not. Currently, the only callers where buffer_std is false are related to the FSM. In passing, rename XLOG_HINT to XLOG_FPI, which is more descriptive. Back-patch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8fd1a09f382f04c41128fded4d56da2127ce92d">http://git.postgresql.org/pg/commitdiff/b8fd1a09f382f04c41128fded4d56da2127ce92d</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: Re-allow -1 together with -c or -l 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3c86ae2aff67676a49ec84240f1d6a482f359cb">http://git.postgresql.org/pg/commitdiff/c3c86ae2aff67676a49ec84240f1d6a482f359cb</a></li>

<li>initdb: Add blank line before output about checksums. This maintains the logical grouping of the output better. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8df54b9fad9b7954b71c63b86a6c587fc6748099">http://git.postgresql.org/pg/commitdiff/8df54b9fad9b7954b71c63b86a6c587fc6748099</a></li>

<li>Further update CREATE FUNCTION documentation about argument names. More languages than SQL and PL/pgSQL actually support parameter names. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c54e87a86d6e73aa3a3b7710fa3db33297792d4">http://git.postgresql.org/pg/commitdiff/4c54e87a86d6e73aa3a3b7710fa3db33297792d4</a></li>

<li>Clarify terminology standalone backend vs. single-user mode. Most of the documentation uses "single-user mode", so use that in the code as well. Adjust the documentation to match the new error message wording. Also add a documentation index entry for "single-user mode". Based-on-patch-by: Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7dfd5cd21c0091e467b16b31a10e20bbedd0a836">http://git.postgresql.org/pg/commitdiff/7dfd5cd21c0091e467b16b31a10e20bbedd0a836</a></li>

<li>doc: Fix date in EPUB manifest. If there is no &lt;date&gt; element, the publication date for the EPUB manifest is taken from the copyright year. But something like "1996-2013" is not a legal date specification. So the EPUB output currently fails epubcheck. Put in a separate &lt;date&gt; element with the current year. Put it in legal.sgml, because copyright.pl already instructs to update that manually, so it hopefully won't be missed. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dab1603e5238d3abce9f7a3a7b9450888cc07c70">http://git.postgresql.org/pg/commitdiff/dab1603e5238d3abce9f7a3a7b9450888cc07c70</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix docs on lock level for ALTER TABLE VALIDATE. ALTER TABLE .. VALIDATE CONSTRAINT previously gave incorrect details about lock levels and therefore incomplete reasons to use the option. Initial bug report and fix from Marko Tiikkaja Reworded by me to include comments by Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/073d7cb513f5de44530f4bdbaaa4b5d4cce5f984">http://git.postgresql.org/pg/commitdiff/073d7cb513f5de44530f4bdbaaa4b5d4cce5f984</a></li>

<li>Ensure no xid gaps during Hot Standby startup. In some cases with higher numbers of subtransactions it was possible for us to incorrectly initialize subtrans leading to complaints of missing pages. Bug report by Sergey Konoplev. Analysis and fix by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f09121b4edee8b4d4cdd4ee0a8cffacee7b85f7">http://git.postgresql.org/pg/commitdiff/1f09121b4edee8b4d4cdd4ee0a8cffacee7b85f7</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix the create_index regression test for Danish collation. In Danish collations, there are letter combinations which sort higher than 'Z'. A test for values &gt; 'WA' was picking up rows where the value started with 'Ants Aasma', causing the test to fail. Backpatch to 9.2, where the failing test was added. Per report from Svenne Krap and analysis by Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8791627b8f9a9ce44603beec447bc6f18bfd9a36">http://git.postgresql.org/pg/commitdiff/8791627b8f9a9ce44603beec447bc6f18bfd9a36</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Modernize entab source code. Remove halt.c, improve comments, rename manual page file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f979599b2068f036405f1b51a9c4260619b06941">http://git.postgresql.org/pg/commitdiff/f979599b2068f036405f1b51a9c4260619b06941</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support TB (terabyte) memory unit in GUC variables. Patch by Simon Riggs, reviewed by Jeff Janes and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bab54e383dd102001753366d3c124f706c7967dd">http://git.postgresql.org/pg/commitdiff/bab54e383dd102001753366d3c124f706c7967dd</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a comment warning against use of pg_usleep() for long sleeps. Follow-up to commit 873ab97219caabeb2f7b390268a4fe01e2b7518c, in which I noted that WaitLatch was a better solution in the commit log message, but neglected to add any documentation in the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c1a71d36f5d667f3c2236e0e015a48f809ca240">http://git.postgresql.org/pg/commitdiff/8c1a71d36f5d667f3c2236e0e015a48f809ca240</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Fetter sent in another revision of a patch to implement makeFuncArgs.</li>

<li>Andres Freund sent in a patch to clarify an error message on Linux.</li>

<li>Robins Tharakan sent in another revision of a patch to add regression tests for SET xxx.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to add more information to GIN indexes.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to add ordering in GIN indexes.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to add fast scan to GIN indexes.</li>

<li>Ian Link sent in a patch to improve the fast GIN cache.</li>

<li>Michael Paquier sent in five more revisions of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Jeff Davis sent in another revision of a patch to have pg_filedump take checksums, among other things, into account.</li>

<li>Amit Langote sent in a patch to correct a comment in heaptuple.c.</li>

<li>Cedric Villemain sent in a patch to fix a bug and add new features to pgxs.</li>

<li>Etsuro Fujita sent in four more revisions of a patch to remove unused targets.</li>

<li>Nicholas White and Troels Nielsen traded patches to allow the SQL standard IGNORE/RESPECT NULLS in lead and lag window functions.</li>

<li>Heikki Linnakangas sent in two more revisions of a patch to scale XLogInserts.</li>

<li>Amit Kapila sent in another revision of a patch to allow changing GUCs persistently from SQL.</li>

<li>Fabien COELHO sent in another revision of a patch to add long options to pgbench.</li>

<li>Andres Freund sent in a patch to create a new contrib module: xidfuncs.</li>

<li>Jeff Janes sent in another revision of a patch to add a startup option to pgbench.</li>

<li>Josh Kupershmidt sent in a patch to rename the specs directory to something that won't interfer with certain OSs.</li>

<li>Andres Freund sent in another revision of a patch to create infrastructure for and implement examples of pluggable compressors.</li>

<li>Gurjeet Singh sent in a patch to implement a function pg_test_reload_conf() which allows you to know whether the changes you've made to configuration parameters have actually taken effect after a SIGHUP.</li>

<li>KONDO Mitsumasa sent in another revision of a patch to add --progress to pgbench.</li>

<li>Andres Freund sent in two more revisions of the set of patches to implement WAL decoding.</li>

<li>David Fetter sent in another revision of a patch to implement FILTER, this time without the restriction that certain types of subqueries couldn't be in the FILTER clause. Dean Rasheed sent in a patch on top of same to make FILTER an unreserved word.</li>

<li>Alexander Korotkov sent in a patch to fix an irregularity in trigram indexes.</li>

<li>Andres Freund sent in a WIP patch to fix a corner case in CASE.</li>

<li>Andrew Dunstan sent in a patch to fix pg_dump for foreign tables in the pg_upgrade scenario.</li>

<li>Fabien COELHO sent in another revision of a patch to implement CREATE CAST...AS EXPLICIT.</li>

<li>Simon Riggs and Heikki Linnakangas traded patches to fix how hashes work in some edge cases.</li>

<li>Fabien COELHO sent in another revision of a patch to implement pgbench --throttle.</li>

<li>Noah Misch sent in another revision of a patch to make Windows behave better with different encodings.</li>

</ul>