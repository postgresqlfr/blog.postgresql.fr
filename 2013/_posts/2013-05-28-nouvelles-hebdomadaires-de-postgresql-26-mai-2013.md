---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 26 mai 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-05-28-nouvelles-hebdomadaires-de-postgresql-26-mai-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix escaping in generated recovery.conf file. In the primary_conninfo line that "pg_basebackup -R" generates, single quotes in parameter values need to be escaped into \\'; the libpq parser requires the quotes to be escaped into \', and recovery.conf parser requires the \ to be escaped into \\. Also, don't quote parameter values unnecessarily, to make the connection string prettier. Most options in a libpq connection string don't need quoting. Reported by Hari Babu, closer analysis by Zoltan Boszormenyi, although I didn't use his patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30b5ede7157e34e77c7914b8ecfd55aa8da6edc3">http://git.postgresql.org/pg/commitdiff/30b5ede7157e34e77c7914b8ecfd55aa8da6edc3</a></li>

<li>Print line number correctly in COPY. When COPY uses the multi-insert method to insert a batch of tuples into the heap at a time, incorrect line number was printed if something went wrong in inserting the index tuples (primary key failure, for exampl), or processing after row triggers. Fixes bug #8173 reported by Lloyd Albin. Backpatch to 9.2, where the multi- insert code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2ef289363f52b9dd5950c88a65803b585d86ad8">http://git.postgresql.org/pg/commitdiff/e2ef289363f52b9dd5950c88a65803b585d86ad8</a></li>

<li>Remove pageinspect--1.0.sql We're not installing it anymore. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/230e92c82b9b911ea743dce7ab7a1abcd0250f30">http://git.postgresql.org/pg/commitdiff/230e92c82b9b911ea743dce7ab7a1abcd0250f30</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Documentation spell checking and markup improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/256f6ba78a379733ff05d3c3d2239ca7fc56fb9e">http://git.postgresql.org/pg/commitdiff/256f6ba78a379733ff05d3c3d2239ca7fc56fb9e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>9.3 release docs: fix DROP TABLE IF EXISTS. Patch from Joe Abbate. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/efc7952c89f3079c86156fae313255eadcd4a5e7">http://git.postgresql.org/pg/commitdiff/efc7952c89f3079c86156fae313255eadcd4a5e7</a></li>

<li>9.3 release notes: fix SGML markup for DROP TABLE IF EXISTS 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8955dac2518b47cf902c22e972426309217c7d8a">http://git.postgresql.org/pg/commitdiff/8955dac2518b47cf902c22e972426309217c7d8a</a></li>

<li>9.3 release notes: improve cached plan mention Per suggestion from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc41ef4791eb44709f18c1678957509e23abdf98">http://git.postgresql.org/pg/commitdiff/bc41ef4791eb44709f18c1678957509e23abdf98</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Maintain ThisTimeLineID correctly in checkpointer. checkpointer needs to reset ThisTimeLineID after a restartpoint to allow installing/recycling new WAL files. If recovery has already ended this would leave ThisTimeLineID set incorrectly and so we must reset it otherwise later checkpoints do not have the correct timeline. Bug report by Heikki Linnakangas. Further investigation by Heikki and myself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75a192638f93636a144a02461baae90b9fe98fd7">http://git.postgresql.org/pg/commitdiff/75a192638f93636a144a02461baae90b9fe98fd7</a></li>

<li>After fast promotion use CHECKPOINT_FORCE. Not necessary for correctness, just to make log_checkpoints output look less singular. Requested by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22a27ef113d50cad73097c0be247f06d6527363c">http://git.postgresql.org/pg/commitdiff/22a27ef113d50cad73097c0be247f06d6527363c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. Pavan Deolasee 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6eb971bd64073d5208ad7c51aa36b75089d55bef">http://git.postgresql.org/pg/commitdiff/6eb971bd64073d5208ad7c51aa36b75089d55bef</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Chris Farmiloe sent in a WIP patch to implement ASYNC privileges.</li>

<li>Dean Rasheed sent in another revision of a patch to make views atop foreign tables writeable in the cases where they would have been writeable as local tables.</li>

<li>Heikki Linnakangas sent in another revision of a patch to improve LWLocks by using the native compare-and-swap instruction on the architectures where it is available.</li>

<li>Simon Riggs sent in a patch to make it possible to set work_mem in TB.</li>

<li>Robert Haas sent in two revisions of a patch to implement MVCC catalog access.</li>

<li>Robins Tharakan sent in a patch to add more regression tests for CREATE OPERATOR.</li>

<li>Robins Tharakan sent in a patch to add more regression tests for ALTER OPERATOR FAMILY.. ADD / DROP.</li>

<li>Robins Tharakan sent in a patch to add more regression tests for LOCK TABLE.</li>

<li>Fabr&iacute;zio de Royes Mello sent in a patch to make .gitignore ignore tags and .swp files.</li>

<li>Jon Nelson sent in another revision of a patch to use fallocate or posix_fallocate, depending which one is available, to speed new WAL file creation.</li>

<li>Gurjeet Singh sent in two revisions of a patch to make large chains of AND and OR not break the parser.</li>

<li>Robins Tharakan sent in a patch to add more regression tests for SET.</li>

<li>Maciej Gajewski sent in a patch to enable searching through the history of prior results in psql.</li>

</ul>