---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 3 octobre 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-10-05-nouvelles-hebdomadaires-de-postgresql-3-octobre-2010 "
---


<p>Le PgDay.IT 2010 aura lieu à Rome le 10 décembre de cette année. L'appel à conférenciers est lancé&nbsp;:

<a target="_blank" href="http://www.pgday.it/">http://www.pgday.it/</a></p>

<p>Le programme des conférences pour la <em>JDCon West</em> a été publié&nbsp;:

<a target="_blank" href="https://www.postgresqlconference.org/2010/west/talks">https://www.postgresqlconference.org/2010/west/talks</a></p>

<p>Michael Renner parlera de réplication de base de données avec PostgreSQL 9.0 le 12 octobre au Metalab de Vienne (Autriche). Lien et infos. (de_AT)&nbsp;:

<a target="_blank" href="http://metalab.at/wiki/PostgreSQL_repliziert_9.0">http://metalab.at/wiki/PostgreSQL_repliziert_9.0</a></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Another PostgreSQL Diff Tool 2.1, un outil de comparaison de base de données&nbsp;:

<a target="_blank" href="http://apgdiff.startnet.biz/">http://apgdiff.startnet.biz/</a></li>

<li>phpPgAdmin 5.0-beta2, un outil web d'administration pour PostgreSQL&nbsp;:

<a target="_blank" href="http://phppgadmin.sourceforge.net/">http://phppgadmin.sourceforge.net/</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Les inscriptions spéciales "lève-tôt" pour la JDCon West 2010 [ndt: 2-4 nov.] sont ouvertes&nbsp;:

<a target="_blank" href="https://www.postgresqlconference.org/content/pgwest-2010-registration">https://www.postgresqlconference.org/content/pgwest-2010-registration</a></li>

<li>L'appel à conférenciers pour le PGDay.EU 2010, tenu du 6 au 8 décembre à Stuttgart (All.), est lancé&nbsp;:

<a target="_blank" href="http://2010.pgday.eu/callforpapers">http://2010.pgday.eu/callforpapers</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org et en espagnol à pwn (a) arpug.com.ar.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20101003">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<p>Dean Rasheed reviewed Andrew Dunstan's patch to extend ENUMs.</p>

<p>Hitoshi Harada reviewed Pavel Stehule's patch to add median and percentile functions, and suggested ways to implement them in the context of windowing.</p>

<p>Peter Geoghegan reviewed and sent updated patches for the ISN patch originally by Jan Otto.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>Robert Haas a poussé&nbsp;:</p>

<ul>

<li>Add "(change requires restart)" note to some postgresql.conf parameters. Devrim GÜNDÜZ.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2ce003973db82205cec55d596d51e957293019d1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2ce003973db82205cec55d596d51e957293019d1</a></li>

<li>Add a SECURITY LABEL command. This is intended as infrastructure to support integration with label-based mandatory access control systems such as SE-Linux. Further changes (mostly hooks) will be needed, but this is a big chunk of it. KaiGai Kohei and Robert Haas.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4d355a8336e0f2265b31d678ffd1ee5cf9e79fae">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4d355a8336e0f2265b31d678ffd1ee5cf9e79fae</a></li>

<li>Fix duplicate OIDs introduced by SECURITY LABEL patch. Report by Shigeru Hanada.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=eacb22ec476a7bc49bdb2054a76a2b27a429a295">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=eacb22ec476a7bc49bdb2054a76a2b27a429a295</a></li>

<li>Adjust pg_archivecleanup docs to match message changes made 2010-06-17. Erik Rijkers.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f0eb5de9eb56a2eb71cc538f12861b084e7b03b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f0eb5de9eb56a2eb71cc538f12861b084e7b03b</a></li>

</ul>

<p>ITAGAKI Takahiro a poussé&nbsp;:</p>

<ul>

<li>Add DISCARD to the command_no_begin list for AUTOCOMMIT=off. Backpatch to 8.3. Reported by Sergey Burladyan.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d08c698d9d47f9d004fd0bb6212ca80259e2fe9c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d08c698d9d47f9d004fd0bb6212ca80259e2fe9c</a></li>

<li>Only DISCARD ALL should be in the command_no_begin list. We allowes DISCARD PLANS and TEMP in a transaction.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=62b6aaa40b2abb26edf18d1cd00dffcac090f67a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=62b6aaa40b2abb26edf18d1cd00dffcac090f67a</a></li>

</ul>

<p>Andrew Dunstan a poussé&nbsp;:</p>

<ul>

<li>Fix MSVC builds for dummy_seclabel breakage.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f00847dc012e9c5219ef0e8e212d173d24700275">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f00847dc012e9c5219ef0e8e212d173d24700275</a></li>

</ul>

<p>Alvaro Herrera a poussé&nbsp;:</p>

<ul>

<li>In doc/src/sgml/ref/security_label.sgml, add missing agg_type nonterminal description in new reference page.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3bb27fb503b421dae5c5d95d75842bbc048f2fab">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3bb27fb503b421dae5c5d95d75842bbc048f2fab</a></li>

</ul>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Add mention of installing pg_upgrade_support in pg_upgrade doc section title, per suggestion from Ian Barwick.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9c5f4f6cb50dd22028acc0b6f20291a5edcac62b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9c5f4f6cb50dd22028acc0b6f20291a5edcac62b</a></li>

<li>Mention in pg_upgrade docs that the proper Win32 service name should be used. Per report from Harald Armin Massa.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6b44b9ba56e02d63425a8d950ef141bb007745ff">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6b44b9ba56e02d63425a8d950ef141bb007745ff</a></li>

<li>Mention that pg_upgrade requires write permission in the current directory. Per report from Harald Armin Massa.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ae9acb677950cf2afa037349b73fa3351d6e1d31">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ae9acb677950cf2afa037349b73fa3351d6e1d31</a></li>

<li>Properly close files after read file failure to prevent potential resource leak. Of course, any such failure aborts pg_upgrade, but might as well be clean about it. Per patch from Grzegorz Jaskiewicz.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f175884520949fbc52908d2f4b2baacde5906ebc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f175884520949fbc52908d2f4b2baacde5906ebc</a></li>

<li>Fix leak patch that was using fclose() instead of close().

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a1bb570de97c71eba3c1b7a067063e8ba28c41d5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a1bb570de97c71eba3c1b7a067063e8ba28c41d5</a></li>

<li>In pg_upgrade, properly handle oids &gt; 231 by using strtoul() internally rather than atol(). Per report from Brian Hirt

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9340fb80b1dba5528c0d16b24985369659a19377">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9340fb80b1dba5528c0d16b24985369659a19377</a></li>

<li>Use macro atooid() for conversion of strings to oids, per suggestion from Tom.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=807005c024aa57b5af729d021263cbf179fd5121">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=807005c024aa57b5af729d021263cbf179fd5121</a></li>

<li>Have pg_upgrade use strtoul(), not strtol().

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe61db6f0ceb508357bcddc39b388e2806cf11d0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe61db6f0ceb508357bcddc39b388e2806cf11d0</a></li>

</ul>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Fix PlaceHolderVar mechanism's interaction with outer joins. The point of a PlaceHolderVar is to allow a non-strict expression to be evaluated below an outer join, after which its value bubbles up like a Var and can be forced to NULL when the outer join's semantics require that. However, there was a serious design oversight in that, namely that we didn't ensure that there was actually a correct place in the plan tree to evaluate the placeholder :-(. It may be necessary to delay evaluation of an outer join to ensure that a placeholder that should be evaluated below the join can be evaluated there. Per recent bug report from Kirill Simonov. Back-patch to 8.4 where the PlaceHolderVar mechanism was introduced.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=eb229505103eb5494c33832d422584bfdee03fc6">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=eb229505103eb5494c33832d422584bfdee03fc6</a></li>

<li>Fix another small oversight in command_no_begin patch. Need a "return false" to prevent tests from continuing after we've moved the "query" pointer. As it stood, it'd accept "DROP DISCARD ALL" as a match.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=112c3fc6db62b39ded8965eddce1f4213308b957">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=112c3fc6db62b39ded8965eddce1f4213308b957</a></li>

<li>Fix incorrect usage of non-strict OR joinclauses in appendrel indexscans. By chance I happened to notice that bug #5076 was still broken in the 8.3 branch, though it worked everywhere else. The reason is that 8.3's version of adjust_appendrel_attrs_mutator neglected to adjust RestrictInfo.nullable_relids. This was an oversight in my patch of 2009-04-16, which I apparently corrected in the later branches on 2009-08-13 without realizing that it affected the 8.3 branch as well. By the time the bug report was filed, it was not reproducible in 8.4. I don't recall if I wrote it off as already fixed, or it just fell through the cracks; but anyway it's been a live bug in 8.3 for a year.</li>

<li>Improve messages for too many private files/dirs. Per Alexey Parshin.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ac144d5c2906cc4b45423ac6575653a8df1b3d0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ac144d5c2906cc4b45423ac6575653a8df1b3d0</a></li>

<li>Update release notes for releases 9.0.1, 8.4.5, 8.3.12, 8.2.18, 8.1.22, 8.0.26, and 7.4.30.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5683ea0423752cca323e528cb160273ad794054">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a5683ea0423752cca323e528cb160273ad794054</a></li>

<li>Fix back-branch breakage from ill-advised last-minute commit.</li>

<li>Throw an appropriate error if ALTER COLUMN TYPE finds a dependent trigger. Actually making this case work, if the column is used in the trigger's WHEN condition, will take some new code that probably isn't appropriate to back-patch. For now, just throw a FEATURE_NOT_SUPPORTED error rather than allowing control to reach the "unexpected object" case. Per bug #5688 from Daniel Grace. Back-patch to 9.0 where the possibility of such a dependency was introduced.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f0b62e8c28026f5d1d3693087f7b4aef6a191af">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f0b62e8c28026f5d1d3693087f7b4aef6a191af</a></li>

<li>Remove excess argument to open(2). Many compilers don't complain about this, but some do, and it's certainly wrong. Back-patch to 8.4 where the error was introduced. Mark Kirkwood.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e77f605d431c488983d6c96cb3513c691bf1907c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e77f605d431c488983d6c96cb3513c691bf1907c</a></li>

<li>Behave correctly if INSERT ... VALUES is decorated with additional clauses. In versions 8.2 and up, the grammar allows attaching ORDER BY, LIMIT, FOR UPDATE, or WITH to VALUES, and hence to INSERT ... VALUES. But the special-case code for VALUES in transformInsertStmt() wasn't expecting any of those, and just ignored them, leading to unexpected results. Rather than complicate the special-case path, just ensure that the presence of any of those clauses makes us treat the query as if it had a general SELECT. Per report from Hitoshi Harada.

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3a13f12b3a18da0a61571cb134fdecea03a10d6f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3a13f12b3a18da0a61571cb134fdecea03a10d6f</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Update ecpglib error code listing. Satoshi Nagayasu

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe48d9471eea6a5e8f8162bfed7d8f7c264904ab">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe48d9471eea6a5e8f8162bfed7d8f7c264904ab</a></li>

<li>Add/fix caching on some configure checks

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=804a786c958d44fdf3b2e2d4774618f919759dc8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=804a786c958d44fdf3b2e2d4774618f919759dc8</a></li>

<li>Translation updates for 9.0.1, 8.4.5, 8.3.12, 8.2.18, 8.1.22, 8.0.26, and 7.4.30.</li>

</ul>

<p>Marc Fournier a poussé&nbsp;:</p>

<ul>

<li>Tag 9.0.1, 8.4.5, 8.3.12, 8.2.18, 8.1.22, 8.0.26, and 7.4.30.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tom Lane sent in a patch to fix a bug in subquery JOIN ordering.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to make CLUSTER operations more efficient.</li>

<li>Grzegorz Jaskiewicz sent in a patch to fix an issue where it's possible to dereference a null pointer in byteaout().</li>

<li>Greg Smith sent in an updated version of Boxuan Zhai's patch to implement MERGE.</li>

<li>Bernd Helmle sent in an updated revision of the patch to add triggers to views.</li>

<li>Pavel Stehule sent in another revision of the patch to add formatting functions.</li>

<li>Fujii Masao sent in another revision of the patch to change libpq for synchronous replication.</li>

<li>Andrew Dunstan sent in another revision of the patch to extend ENUMs.</li>

<li>Robert Haas sent in another revision of the patch to implement merge-append.</li>

<li>Gurjeet Singh sent in a patch to allow people to replace a primary key with another index.</li>

<li>Pavel Stehule sent in three revisions of a patch to add FOR...IN [array] to PL/pgsql.</li>

<li>Pavel Stehule sent in a patch to implement a subscripts function.</li>

<li>Gregory Stark sent in a patch to add gtrusage profiling to EXPLAIN output.</li>

<li>Pavel Stehule sent in three more revisions of a patch to add median and percentile functions.</li>

<li>Hitoshi Harada sent in another revision of the patch to add DML (INSERT, UPDATE, DELETE) to the top level of CTEs.</li>

</ul>