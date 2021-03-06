---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 juillet 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/07/20/Nouvelles-hebdomadaires-de-PostgreSQL-13-juillet-2014"
---


<p>Le 4<sup>&egrave;me</sup> PgDay &eacute;quatorien aura lieu le mardi 7 octobre en la ville de Quito, int&eacute;gr&eacute; au 5&egrave;me congr&egrave;s international du Logiciel Libre. Envoyez vos propositions de conf&eacute;rences &agrave; ecpug AT postgresql DOT org.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Slony-I 2.2.3, un syst&egrave;me de r&eacute;plication bas&eacute; sur les triggers pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en juillet</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-07/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PgDay 2014 de Portland (Oregon, &Eacute;tats-Unis) aura lieu le 6 septembre 2014&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PDXPUGDay2014">https://wiki.postgresql.org/wiki/PDXPUGDay2014</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. Les inscriptions et tutoriels sont disponibles &agrave; l'achat&nbsp;: 

<a target="_blank" href="https://postgresopen.org/2014/tickets/">https://postgresopen.org/2014/tickets/</a> <a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Les inscriptions pour la PGConf.EU 2014 de Madrid, Espagne, du 21 au 24 octobre sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/registration/">http://2014.pgconf.eu/registration/</a></li>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014. L'appel international &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140714041950.GA8825@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: allow upgrades for new-only TOAST tables. Previously, when calculations on the need for toast tables changed, pg_upgrade could not handle cases where the new cluster needed a TOAST table and the old cluster did not. (It already handled the opposite case.) This fixes the "OID mismatch" error typically generated in this case. Backpatch through 9.2 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3088cc37044a303fc50857d8d9e7e44b5c250642">http://git.postgresql.org/pg/commitdiff/3088cc37044a303fc50857d8d9e7e44b5c250642</a></li>

<li>Adjust blank lines around PG_MODULE_MAGIC defines, for consistency. Report by Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a605cd6bd9f689b35676623add0de9b90978bf1">http://git.postgresql.org/pg/commitdiff/6a605cd6bd9f689b35676623add0de9b90978bf1</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_dump, show server and pg_dump versions with or without --verbose. We used to print this information only in verbose mode, but it's argued that it's useful enough to print always; one reason being that this provides some documentation about which Postgres versions the dump is meant to reload into. Jing Wang, reviewed by Jeevan Chalke 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7700597b34fbb26e377f419271f65be1c13c518f">http://git.postgresql.org/pg/commitdiff/7700597b34fbb26e377f419271f65be1c13c518f</a></li>

<li>Don't assume a subquery's output is unique if there's a SRF in its tlist. While the x output of "select x from t group by x" can be presumed unique, this does not hold for "select x, generate_series(1,10) from t group by x", because we may expand the set-returning function after the grouping step. (Perhaps that should be re-thought; but considering all the other oddities involved with SRFs in targetlists, it seems unlikely we'll change it.) Put a check in query_is_distinct_for() so it's not fooled by such cases. Back-patch to all supported branches. David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e2f2d7a0539460dc76dbf76dfae17024d5e031e">http://git.postgresql.org/pg/commitdiff/9e2f2d7a0539460dc76dbf76dfae17024d5e031e</a></li>

<li>Implement IMPORT FOREIGN SCHEMA. This command provides an automated way to create foreign table definitions that match remote tables, thereby reducing tedium and chances for error. In this patch, we provide the necessary core-server infrastructure and implement the feature fully in the postgres_fdw foreign-data wrapper. Other wrappers will throw a "feature not supported" error until/unless they are updated. Ronan Dunklau and Michael Paquier, additional work by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59efda3e50ca4de6a9d5aa4491464e22b6329b1e">http://git.postgresql.org/pg/commitdiff/59efda3e50ca4de6a9d5aa4491464e22b6329b1e</a></li>

<li>Fix bug with whole-row references to append subplans. ExecEvalWholeRowVar incorrectly supposed that it could "bless" the source TupleTableSlot just once per query. But if the input is coming from an Append (or, perhaps, other cases?) more than one slot might be returned over the query run. This led to "record type has not been registered" errors when a composite datum was extracted from a non-blessed slot. This bug has been there a long time; I guess it escaped notice because when dealing with subqueries the planner tends to expand whole-row Vars into RowExprs, which don't have the same problem. It is possible to trigger the problem in all active branches, though, as illustrated by the added regression test. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d68581483564ec0fbfdc255e493c4f5bd165e55e">http://git.postgresql.org/pg/commitdiff/d68581483564ec0fbfdc255e493c4f5bd165e55e</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. This typo was accidentally added by recent commit 4cbd128. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6048896e4c9679cba89242d77f02ceba01c791d1">http://git.postgresql.org/pg/commitdiff/6048896e4c9679cba89242d77f02ceba01c791d1</a></li>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cbd12832839830fe58bb5d9d4ba7e2ec84952ce">http://git.postgresql.org/pg/commitdiff/4cbd12832839830fe58bb5d9d4ba7e2ec84952ce</a></li>

<li>Add new ECHO mode 'errors' that displays only failed commands in psql. When the psql variable ECHO is set to 'erros', only failed SQL commands are printed to standard error output. Also this patch adds -b option into psql. This is equivalent to setting the variable ECHO to 'errors'. Pavel Stehule, reviewed by Fabr&iacute;zio de Royes Mello, Samrat Revagade, Kumar Rajeev Rastogi, Abhijit Menon-Sen, and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b214c5dd1de37764797b3fb9164af3c885a7b86">http://git.postgresql.org/pg/commitdiff/5b214c5dd1de37764797b3fb9164af3c885a7b86</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Fix spacing in verbatim environments 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53166fe248c1b4b211094e80e54e5ab330dbf957">http://git.postgresql.org/pg/commitdiff/53166fe248c1b4b211094e80e54e5ab330dbf957</a></li>

<li>doc: Link text to table by id 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/889313c76b2d0f3388e3008fb309bb71d4c9978b">http://git.postgresql.org/pg/commitdiff/889313c76b2d0f3388e3008fb309bb71d4c9978b</a></li>

<li>Update key words table for 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56abcf6b829adcbadcc73e4eb06caefb50d110bd">http://git.postgresql.org/pg/commitdiff/56abcf6b829adcbadcc73e4eb06caefb50d110bd</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8522f21400570fdf6af38c32a2522a5465dccfd5">http://git.postgresql.org/pg/commitdiff/8522f21400570fdf6af38c32a2522a5465dccfd5</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80ddd04b4d66ad6564b6d77ffc2bd8fb5e0dcdfa">http://git.postgresql.org/pg/commitdiff/80ddd04b4d66ad6564b6d77ffc2bd8fb5e0dcdfa</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve error messages for bytea decoding failures. Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f73474382cb304b4f043e5de89c28b0365c04156">http://git.postgresql.org/pg/commitdiff/f73474382cb304b4f043e5de89c28b0365c04156</a></li>

<li>Fix error hint style. Mistake caught by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b043985b7aaf62f6978a0c567c8340ad9cf1ad67">http://git.postgresql.org/pg/commitdiff/b043985b7aaf62f6978a0c567c8340ad9cf1ad67</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add autocompletion of locale keywords for CREATE DATABASE. Adds support for autocomplete of LC_COLLATE and LC_CTYPE to the CREATE DATABASE command in psql. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/deee42ab015d54baa1b9e0165bf3635dab4f9f7a">http://git.postgresql.org/pg/commitdiff/deee42ab015d54baa1b9e0165bf3635dab4f9f7a</a></li>

<li>Support --with-extra-version equivalent functionality in MSVC build. Adds a configuration parameter, extraver, that is appended to the version number when built. Michael Paquier, reviewed by Muhammad Asif Naeem 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d9a0e85bd6ab4fe5268a1d759a787f72ff9333e">http://git.postgresql.org/pg/commitdiff/8d9a0e85bd6ab4fe5268a1d759a787f72ff9333e</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix decoding of consecutive MULTI_INSERTs emitted by one heap_multi_insert(). Commit 1b86c81d2d fixed the decoding of toasted columns for the rows contained in one xl_heap_multi_insert record. But that's not actually enough, because heap_multi_insert() will actually first toast all passed in rows and then emit several *_multi_insert records; one for each page it fills with tuples. Add a XLOG_HEAP_LAST_MULTI_INSERT flag which is set in xl_heap_multi_insert-&gt;flag denoting that this multi_insert record is the last emitted by one heap_multi_insert() call. Then use that flag in decode.c to only set clear_toast_afterwards in the right situation. Expand the number of rows inserted via COPY in the corresponding regression test to make sure that more than one heap page is filled with tuples by one heap_multi_insert() call. Backpatch to 9.4 like the previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/626bfad6cc5701eb385b8995e1431ad6a5f24928">http://git.postgresql.org/pg/commitdiff/626bfad6cc5701eb385b8995e1431ad6a5f24928</a></li>

<li>Minimal psql tab completion support for SET search_path. Complete SET search_path = ... to non-temporary and non-toast schemas. Since there pretty much is no use case to add those to the search path and there can be many it's helpful to exclude them. It'd be nicer to complete multiple search path elements, but that's not easy. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd409519bd19911d2d2cba64415447d2fa9d766b">http://git.postgresql.org/pg/commitdiff/bd409519bd19911d2d2cba64415447d2fa9d766b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Abhijit Menon-Sen sent in another revision of a patch to introduce XLogLockBlockRangeForCleanup().</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to add a --stats option to xlogdump.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Etsuro Fujita sent in a WIP patch to optimize updating foreign tables in the PostgreSQL FDW.</li>

<li>David Rowley sent in two more revisions of a patch to allow removing LEFT JOINs under certain circumstances.</li>

<li>Haribabu Kommi sent in another revision of a patch to add min() and max() for the inet data type.</li>

<li>Amit Kapila sent in another revision of a patch to fix an issue with duplicate parameters in ALTER SYSTEM.</li>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>SAWADA Masahiko and Jeevan Chalke traded patches to add line number as prompt option to psql.</li>

<li>Alvaro Herrera sent in another revision of a patch to add minmax indexes.</li>

<li>Tomonari Katsumata sent in a patch to ensure that rounding up time value is not less than its unit.</li>

<li>Furuya Osamu sent in another revision of a patch to add a synchronous mode to pg_receivexlog.</li>

<li>SAWADA Masahiko sent in a patch to fix an issue in timeout of pg_receivexlog --status-interval.</li>

<li>Alvaro Herrera sent in a patch to fix the README in anticipation of another patch for CSN-based snapshots.</li>

<li>Kyotaro HORIGUCHI and Michael Paquier traded patches to fix an issue in WAL replay.</li>

<li>Jeff Davis sent in another revision of a patch to allow IGNORE NULLS in the lead() and lag() windowing functions.</li>

<li>Jeff Davis sent in two revisions of a patch to Allow multi-byte characters as escape in SIMILAR TO and SUBSTRING.</li>

<li>Tom Lane sent in another revision of a patch to allow NOT IN to use ANTI joins.</li>

<li>Tomas Vondra sent in two more revisions of a patch to tweak NTUP_PER_BUCKET.</li>

<li>Ali Akbar sent in another revision of a patch to fix xpath() to return namespace definitions.</li>

<li>Etsuro Fujita sent in a patch to fix an incorrect comment in postgres_fdw.c.</li>

<li>Christoph Martin sent in a patch to fix the search_path default value separator.</li>

<li>Etsuro Fujita sent in a patch to add information on exact/lossy blocks for a bitmap heap scan when both the numbers of exact/lossy pages retrieved by the node are zero.</li>

<li>Noah Misch sent in a patch to fix an OpenLDAP issue.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to add ALTER TABLE ... SET LOGGED.</li>

<li>Christoph Berg sent in another revision of a patch to secure "make check."</li>

<li>Magnus Hagander sent in a patch to include SSL compression info in a psql header.</li>

<li>Emre Hesegeli sent in a patch to add selectivity estimation for inet operators.</li>

<li>Tomas Vondra sent in another revision of a patch to fix an issue where bad estimation together with large work_mem generates slow hash joins.</li>

</ul>