---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 2 juin 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-06-08-nouvelles-hebdomadaires-de-postgresql-2-juin-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Documentation fix for ALTER TYPE .. RENAME. The documentation for ALTER TYPE .. RENAME claimed to support a RESTRICT/CASCADE option at the 'type' level, which wasn't implemented and doesn't make a whole lot of sense to begin with. What is supported, and previously undocumented, is ALTER TYPE .. RENAME ATTRIBUTE .. RESTRICT/CASCADE. I've updated the documentation and back-patched this to 9.1 where it was first introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05624220c413eba1d7da38586dfb9aa6a8e9623d">http://git.postgresql.org/pg/commitdiff/05624220c413eba1d7da38586dfb9aa6a8e9623d</a></li>

<li>Post-pgindent cleanup. Make slightly better decisions about indentation than what pgindent is capable of. Mostly breaking out long function calls into one line per argument, with a few other minor adjustments. No functional changes- all whitespace. pgindent ran cleanly (didn't change anything) after. Passes all regressions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/551938ae2284975b53d665fa8a82a7e1f3514dda">http://git.postgresql.org/pg/commitdiff/551938ae2284975b53d665fa8a82a7e1f3514dda</a></li>

<li>Minor spelling fixes. Fix a few spelling mistakes. Per bug report #8193 from Lajos Veres. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c9fc28a7f12e27d530e2657c9dc6080fbfbe8a14">http://git.postgresql.org/pg/commitdiff/c9fc28a7f12e27d530e2657c9dc6080fbfbe8a14</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade docs: mention need to set parameters for vacuumdb. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f80e55054bb40421ee414558818cf944a6b48b7e">http://git.postgresql.org/pg/commitdiff/f80e55054bb40421ee414558818cf944a6b48b7e</a></li>

<li>pgindent run for release 9.3. This is the first run of the Perl-based pgindent script. Also update pgindent instructions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9af4159fce6654aa0e081b00d02bca40b978745c">http://git.postgresql.org/pg/commitdiff/9af4159fce6654aa0e081b00d02bca40b978745c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Document auto_explain.log_timing. Tomas Vondra 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07ab261ef3a9575a4a2bd3045b222d7b3dee2c46">http://git.postgresql.org/pg/commitdiff/07ab261ef3a9575a4a2bd3045b222d7b3dee2c46</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>postgresql.conf.sample: Improve whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97a11fd0e3055ab82d562930b38027b054e6c8e0">http://git.postgresql.org/pg/commitdiff/97a11fd0e3055ab82d562930b38027b054e6c8e0</a></li>

<li>doc: Fix claim that query is passed as ASCII text. Ian Lawrence Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eff8055afb7c89c2d2629d35b074ca617a3c2310">http://git.postgresql.org/pg/commitdiff/eff8055afb7c89c2d2629d35b074ca617a3c2310</a></li>

<li>Remove whitespace from end of lines 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b5a3998a104ef5918b50e207be0aa86e085d49d">http://git.postgresql.org/pg/commitdiff/8b5a3998a104ef5918b50e207be0aa86e085d49d</a></li>

<li>Minor spell checking 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d7eb6f46de900f6664918cda3b5e6f922a0a2356">http://git.postgresql.org/pg/commitdiff/d7eb6f46de900f6664918cda3b5e6f922a0a2356</a></li>

<li>Add new source files to nls.mk 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01497e738e58b0a5d87706353f28eccc5bea9591">http://git.postgresql.org/pg/commitdiff/01497e738e58b0a5d87706353f28eccc5bea9591</a></li>

<li>doc: Remove paragraph about typesetting conventions. They no longer match reality with the web site style sheets, and it is difficult to keep the up to date in a CSS world. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dedf7e9919a2dc42370c0b218728e1556985de6a">http://git.postgresql.org/pg/commitdiff/dedf7e9919a2dc42370c0b218728e1556985de6a</a></li>

<li>Fix whitespace issues in the man pages. See 00b0c73f1f2b98a7d09de63aaa14d6498ac521ae for an explanation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93874ce064836e45220978e2656cbf62eba766ed">http://git.postgresql.org/pg/commitdiff/93874ce064836e45220978e2656cbf62eba766ed</a></li>

<li>Another man page whitespace fix 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22b36412c73fdae960cc6bef58eb16a26d14b700">http://git.postgresql.org/pg/commitdiff/22b36412c73fdae960cc6bef58eb16a26d14b700</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix unportable usage of isspace(). Must cast char argument to unsigned to avoid doing the wrong thing with high-bit-set characters. Oversight in commit 30b5ede7157e34e77c7914b8ecfd55aa8da6edc3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a149d8bd56edc2f06643118ed8aac8bce6ebad6d">http://git.postgresql.org/pg/commitdiff/a149d8bd56edc2f06643118ed8aac8bce6ebad6d</a></li>

<li>Allow type_func_name_keywords in some places where they weren't before. This change makes type_func_name_keywords less reserved than they were before, by allowing them for role names, language names, EXPLAIN and COPY options, and SET values for GUCs; which are all places where few if any actual keywords could appear instead, so no new ambiguities are introduced. The main driver for this change is to allow "COPY ... (FORMAT BINARY)" to work without quoting the word "binary". That is an inconsistency that has been complained of repeatedly over the years (at least by Pavel Golub, Kurt Lidl, and Simon Riggs); but we hadn't thought of any non-ugly solution until now. Back-patch to 9.0 where the COPY (FORMAT BINARY) syntax was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c92edad48796119c83d7dbe6c33425d1924626d">http://git.postgresql.org/pg/commitdiff/2c92edad48796119c83d7dbe6c33425d1924626d</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Thom Brown sent in a patch to correct a flock of typos.</li>

<li>Amit Kapila sent in another revision of a patch to allow postgresql.conf values to be changed via SQL.</li>

<li>Szymon Guz sent in a patch to fix conversion for Decimal arguments in plpython functions.</li>

<li>Robert Haas sent in a patch to preserve forensic information when we freeze.</li>

<li>Bruce Momjian sent in a patch to change the -u parameter for username to the more customary (and consistent with other utilities) -U.</li>

<li>Cedric Villemain sent in a flock of patches intended to un-break "make install" of certain extensions.</li>

<li>Joe Conway sent in three more revisions of a patch to fix cases where dumping extensions fails.</li>

<li>Heikki Linnakangas sent in another revision of a patch to scale xlog inserts.</li>

<li>Andres Freund sent in a patch to ensure that all_visible WAL records operate on an intialized page.</li>

<li>Jeff Davis sent in another revision of a patch to eliminate PD_ALL_VISIBLE.</li>

<li>Andres Freund sent in a WIP patch to add support for multiple kinds of external toast datums.</li>

<li>Dean Rasheed sent in a patch to make array_remove() do the right thing with a 0-D array.</li>

<li>Fabien COELHO sent in another revision of a patch to add a --progress option to pgbench.</li>

<li>Fabien COELHO sent in another revision of a patch to add a --throttle option to pgbench.</li>

<li>Fujii Masao sent in another revision of a patch to add pg_isready.</li>

</ul>