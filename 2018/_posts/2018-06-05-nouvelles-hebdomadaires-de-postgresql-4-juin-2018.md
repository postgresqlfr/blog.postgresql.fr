---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 juin 2018"
author: "NBougain"
redirect_from: "index.php?post/2018-06-05-nouvelles-hebdomadaires-de-postgresql-4-juin-2018 "
---



<h2>Correctifs appliqu&eacute;s</h2>

<p>Bruce Momjian pushed:</p>

<ul>

<li>doc: adjust DECLARE docs to mention FOR UPDATE behavior. Reported-by: Peter Eisentraut Discussion: <a target="_blank" href="https://postgr.es/m/8dc63ba7-dc56-fc7c-fc16-4fae03e3bfe6@2ndquadrant.com">https://postgr.es/m/8dc63ba7-dc56-fc7c-fc16-4fae03e3bfe6@2ndquadrant.com</a> Author: Peter Eisentraut, Tom Lane, me Backpatch-through: 9.3 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/99164e6952917009929026a9a11e4a500f599c40">https://git.postgresql.org/pg/commitdiff/99164e6952917009929026a9a11e4a500f599c40</a></li>

<li>doc: mark 'replaceable' parameter for backup program listing. Reported-by: Liudmila Mantrova Discussion: <a target="_blank" href="https://postgr.es/m/f3e2c0f5-5266-d626-58d7-b77e1b29d870@postgrespro.ru">https://postgr.es/m/f3e2c0f5-5266-d626-58d7-b77e1b29d870@postgrespro.ru</a> Author: Liudmila Mantrova Backpatch-through: 9.3 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6a75b58065c8da69a259657fc40d18e76157f265">https://git.postgresql.org/pg/commitdiff/6a75b58065c8da69a259657fc40d18e76157f265</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Return a value from Install.pm's lcopy function. Commit 3a7cc727c was a little over eager about adding an explicit return to this function, whose value is checked in most call sites. This change reverses that and returns the expected value explicitly. It also adds a check to the one call site lacking one. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/01deec5f8ae64b5120cc8c93d54fe0e19e477b02">https://git.postgresql.org/pg/commitdiff/01deec5f8ae64b5120cc8c93d54fe0e19e477b02</a></li>

<li>Fix compile-time warnings on all perl code. This patch does two things. First, it silences a number of compile-time warnings in the msvc tools files, mainly those due to the fact that in some cases we have more than one package per file. Second it supplies a dummy Perl library with just enough of the Windows API referred to in our code to let it run these checks cleanly, even on Unix machines where the code is never supposed to run. The dummy library should only be used for that purpose, as its README notes. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0039049fb1d76afef05d550823b27731ad7d7b3d">https://git.postgresql.org/pg/commitdiff/0039049fb1d76afef05d550823b27731ad7d7b3d</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Initialize new jsonb iterator to zero. Use palloc0() instead of palloc() to create a new JsonbIterator. Otherwise, the isScalar field is sometimes not initialized. There is probably no impact in practice, but it's cleaner this way and it avoids future problems. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3c9cf069454d80b0b4a54a0a90941a88a97b1122">https://git.postgresql.org/pg/commitdiff/3c9cf069454d80b0b4a54a0a90941a88a97b1122</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Move _bt_upgrademetapage() into critical section. Any changes on page should be done in critical section, so move _bt_upgrademetapage into critical section. Improve comment. Found by Amit Kapila during post-commit review of 857f9c36. Author: Amit Kapila <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/08186dc05b3eed9c1f29b3349b122487d84ef3eb">https://git.postgresql.org/pg/commitdiff/08186dc05b3eed9c1f29b3349b122487d84ef3eb</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Fix grammar. Reported-by: Pavlo Golub Author: Micha&#65533;l Paquier Discussion: <a target="_blank" href="https://postgr.es/m/152741547.20180530101229@cybertec.at">https://postgr.es/m/152741547.20180530101229@cybertec.at</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d3b10f0d64e90e9c78b8adc24ab3e38b30ef60bd">https://git.postgresql.org/pg/commitdiff/d3b10f0d64e90e9c78b8adc24ab3e38b30ef60bd</a></li>

<li>Tweak partitioning documentation wording. For clarity, precision, grammar. Author: Justin Pryzby Reviewed-by: Amit Langote, &#65533;lvaro Herrera Discussion: <a target="_blank" href="https://postgr.es/m/20180523213513.GM30060@telsasoft.com">https://postgr.es/m/20180523213513.GM30060@telsasoft.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/12b9affb32a636777062b3feb5816621363fc108">https://git.postgresql.org/pg/commitdiff/12b9affb32a636777062b3feb5816621363fc108</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Reconcile nodes/*funcs.c with PostgreSQL 11 work. This covers new fields in two outfuncs.c functions having no readfuncs.c counterpart. Thus, this changes only debugging output. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ef3109500030030b0e8d3c1d7f2b409d702cc49a">https://git.postgresql.org/pg/commitdiff/ef3109500030030b0e8d3c1d7f2b409d702cc49a</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&#65533;l Paquier sent in another revision of a patch to support channel binding in various TLS implementations.</p>

<p>Andres Freund and &#65533;lvaro Herrera traded patches to ensure relcache entries for nailed relations are accurate.</p>

<p>Craig Ringer sent in two revisions of a patch to install pg_isolation_regress, not just isolationtester.</p>

<p>Micha&#65533;l Paquier sent in two revisions of a patch to ensure that pg_replication_slot_advance returns NULL instead of 0/0 when a slot is not advanced.</p>

<p>Micha&#65533;l Paquier sent in two more revisions of a patch to rework scram_channel_binding to protect from downgrade attacks.</p>

<p>Vik Fearing sent in a patch to implement tab completion in psql for TABLE.</p>

<p>Craig Ringer sent in another revision of a patch to PANIC when we detect a possible fsync I/O error instead of retrying fsync.</p>

<p>Edmund Horner sent in a patch to remove a redundant psql tab-completion for CREATE PUBLICATION.</p>

<p>Justin Pryzby sent in a patch to add psql tab completions for several of the new VACUUM and ANALYZE options.</p>

<p>Micha&#65533;l Paquier sent in a patch to support tls-server-end-point on old version (1.0.0 and 1.0.1) of OpenSSL.</p>

<p>Daniel Gustafsson sent in two revisions of a patch to change uses of bms_num_members() without storing the returned count to use bms_membership(), which is optimized for that case.</p>

<p>Manuel Kniep sent in a patch to enable passing PGOPTIONS to pg_regress.</p>

<p>Daniel Gustafsson sent in a patch to avoid extra Sort nodes between WindowAggs when sorting can be reused.</p>

<p>Adrien Nayrat sent in two revisions of a patch to add a new GUC, log_sample_rate, to reduce the number of queries are actually logged.</p>

<p>David Rowley sent in a patch to allow direct lookups of AppendRelInfo by child relid.</p>

<p>Teodor Sigaev sent in two revisions of a patch to optimize GROUP BY by allowing reordering the columns, which then enables using n_distinct to speed up the process.</p>

<p>Carter Thaxton sent in another revision of a patch to add a --where option to pg_dump, which allows dumping prearranged subsets of the data.</p>

<p>James Coleman sent in another revision of a patch to implement incremental sort.</p>

<p>Micha&#65533;l Paquier sent in two revisions of a patch to fix and document lock handling for in-memory replication xslot data and fix a couple of bugs with replication slot advancing feature.</p>

<p>Justin Pryzby sent in another revision of a patch to fix some of the documentation for partition pruning.</p>

<p>L&#65533;titia Avrot sent in a patch to document the fact that CHECK constraints cannot reliably span tables, at least under pg_dump(all).</p>

<p>Amit Kapila sent in a patch to do some cosmetic cleanups for the patch which speeds up adding columns with defaults other than NULL.</p>

<p>Dmitry Dolgov sent in a patch to check for stable expressions in partition pruning.</p>

<p>Emre Hasegeli sent in another revision of a patch to fix the floating point handling in geometric types.</p>