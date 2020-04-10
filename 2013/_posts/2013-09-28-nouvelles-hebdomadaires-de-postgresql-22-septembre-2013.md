---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 septembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-09-28-nouvelles-hebdomadaires-de-postgresql-22-septembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a GUC to report whether data page checksums are enabled. Bernd Helmle 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0892ecbc015930dde2cee9ad464b9b70fdb7667e">http://git.postgresql.org/pg/commitdiff/0892ecbc015930dde2cee9ad464b9b70fdb7667e</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rename various "freeze multixact" variables. It seems to make more sense to use "cutoff multixact" terminology throughout the backend code; "freeze" is associated with replacing of an Xid with FrozenTransactionId, which is not what we do for MultiXactIds. Andres Freund Some adjustments by &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd778e9d888454fdd2c25c66fc268ba9844eb125">http://git.postgresql.org/pg/commitdiff/dd778e9d888454fdd2c25c66fc268ba9844eb125</a></li>

<li>Remove `proc` argument from LockCheckConflicts. This has been unused since commit 8563ccae2caf. Noted by Antonin Houska 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1247ea28cbc834bd6750b569537baff4e35edf79">http://git.postgresql.org/pg/commitdiff/1247ea28cbc834bd6750b569537baff4e35edf79</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Typo fix. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86a174bff0730791c5c262d646d4fe28c2485be1">http://git.postgresql.org/pg/commitdiff/86a174bff0730791c5c262d646d4fe28c2485be1</a></li>

<li>Documentation correction. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb3b79ffd4c456b49325df0002dbc4cb6a3741e7">http://git.postgresql.org/pg/commitdiff/eb3b79ffd4c456b49325df0002dbc4cb6a3741e7</a></li>

<li>Fix compiler warning in WaitForBackgroundWorkerStartup(). Per complaint from Andrew Gierth. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/496439d943565bdb6cb2eef534cce551c30e8a0f">http://git.postgresql.org/pg/commitdiff/496439d943565bdb6cb2eef534cce551c30e8a0f</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. Ian Lawrence Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e5f6e59134c4829060321b875e86c538adc0914">http://git.postgresql.org/pg/commitdiff/6e5f6e59134c4829060321b875e86c538adc0914</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Ronan Dunklau sent in another revision of a patch to add triggers to foreign tables.</li>

<li>Wang Shuo sent in another revision of a patch to skip rewriting the table for allowable changes to NUMERIC columns via ALTER TABLE.</li>

<li>Dean Rasheed and Marko (johto) Tiikkaja traded patches to expand the writeability of VIEWs by determining which can be changed in a sane way.</li>

<li>Alvaro Herrera and Jaime Casanova traded patches for minmax indexes.</li>

<li>Alvaro Herrera sent in a patch to refactor relscan_details.h out of relscan.h to reduce unneeded #includes of the same header.</li>

<li>Heikki Linnakangas sent in another revision of an instrumentation patch to with two functions: one to consume N xids, making it faster to hit the creation of new XID ranges and wraparound, The other, print_xidlsnranges(), to print out the contents of the current XID-LSN range array.</li>

<li>Samrat Revagade and Sawada Masahiko traded patches to make it possible to fail back without first creating a fresh backup.</li>

<li>Rushabh Lathia sent in another revision of a patch to disallow year fields of length greater than 4 in all cases.</li>

<li>Hamid Quddus Akhtar sent in a patch to fix a bug in output/security_label.source where it refers to abs_builddir instead of libdir.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to implement a GUC plpgsql.print_strict_params which gives more detail about parameter problems in PL/pgsql functions when set.</li>

<li>Jeevan Chalke sent in another revision of a patch to create a simple date constructor for numeric values.</li>

<li>Sameer Thakur and Daniel Farina traded patches to fix some mis-countings in pg_stat_statements.</li>

<li>Rushabh Lathia, Robert Haas, and Amit Kapila traded patches to fix an inconsistency in checking for table inheritance.</li>

<li>Andres Freund sent in two more flocks of patches which are inteded to be infrastructure for logical changeset replication.</li>

<li>Alexander Korotkov sent in two more revisions of a patch to improve GIN indexing by adding some additional information.</li>

<li>Alexander Korotkov sent in a patch to fix KNN-GiST behaviour with NaN.</li>

<li>Pavel Stehule sent in another revision of a patch to add LOB utility functions load_lo and make_lo.</li>

<li>Vik Fearing sent in a patch to fix the interaction between relocatable extensions and pg_dump/pg_restore.</li>

<li>Andres Freund sent in another revision of a patch to allow custom GUCs to be nested more than one level.</li>

<li>KONDO Mitsumasa sent in a patch to add a Gaussian distribution to pgbench.</li>

<li>David Rowley sent in three more revisions of a patch to allow formatting in log_line_prefix.</li>

<li>Robert Haas sent in another revision of a patch to implement dynamic shared memory.</li>

<li>Mike Blackwell sent in a doc patch to clarify the OPTIONS clause in contrib/file_fdw.</li>

<li>Alvaro Herrera sent in a patch to handle SSL renegotiation cleanly.</li>

<li>Heikki Linnakangas sent in a patch to detect an issue where freezing incorrectly releases any predicate locks.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement row-level access control, this time with a mitigation for a side-channel attach to which the previous patch was vulnerable.</li>

<li>Vik Fearing sent in another revision of a patch to implement pg_sleep(interval).</li>

<li>Fabien COELHO sent in a flock of patches improving pgbench progress reports.</li>

<li>Didier (did447 AT gmail DOT com) sent in a patch to fix a small memory leak in guc-file.l ParseConfigFile.</li>

<li>Stas Kelvich sent in a patch to add kNN search for cubes with euclidean, taxicab and Chebyshev distances.</li>

</ul>