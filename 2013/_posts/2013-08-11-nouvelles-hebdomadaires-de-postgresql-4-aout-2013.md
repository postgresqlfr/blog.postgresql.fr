---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 août 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/08/11/Nouvelles-hebdomadaires-de-PostgreSQL-4-août-2013"
---


<p>Le calendrier pour le Postgres Open a &eacute;t&eacute; publi&eacute; sur le site&nbsp;: 

<a target="_blank" href="http://postgresopen.org/">http://postgresopen.org/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Pgpool Global Development Group a le plaisir d'annoncer la publication de pgpool-II 3.3.0 et de pgpoolAdmin 3.3.0. Vous pouvez les t&eacute;l&eacute;charger aux emplacements suivants&nbsp;: 

<a target="_blank" href="http://www.pgpool.net/download.php?f=pgpool-II-3.3.0.tar.gz">pgpool-II-3.3.0</a> et <a target="_blank" href="http://www.pgpool.net/download.php?f=pgpoolAdmin-3.3.0.tar.gz">pgpoolAdmin-3.3.0</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-08/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PostgreSQL Brazil</em> aura lieu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

<li><em>Postgres Open 2013</em> aura lieu &agrave; Chicago, (USA, Illinois) du 16 au 18 septembre&nbsp;: 

<a target="_blank" href="http://postgresopen.org/">http://postgresopen.org/</a></li>

<li>Le PGDay italien (PGDay.IT) sera tenu &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Un appel international &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgday.it/index.php/programma/call-for-papers-english/">http://2013.pgday.it/index.php/programma/call-for-papers-english/</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130805023417.GB1487@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make sure float4in/float8in accept all standard spellings of "infinity". The C99 and POSIX standards require strtod() to accept all these spellings (case-insensitively): "inf", "+inf", "-inf", "infinity", "+infinity", "-infinity". However, pre-C99 systems might accept only some or none of these, and apparently Windows still doesn't accept "inf". To avoid surprising cross-platform behavioral differences, manually check for each of these spellings if strtod() fails. We were previously handling just "infinity" and "-infinity" that way, but since C99 is most of the world now, it seems likely that applications are expecting all these spellings to work. Per bug #8355 from Basil Peace. It turns out this fix won't actually resolve his problem, because Python isn't being this careful; but that doesn't mean we shouldn't be. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/221e92f64c6e136e550ec2592aac3ae0d4623209">http://git.postgresql.org/pg/commitdiff/221e92f64c6e136e550ec2592aac3ae0d4623209</a></li>

<li>- Fix regexp_matches() handling of zero-length matches. We'd find the same match twice if it was of zero length and not immediately adjacent to the previous match. replace_text_regexp() got similar cases right, so adjust this search logic to match that. Note that even though the regexp_split_to_xxx() functions share this code, they did not display equivalent misbehavior, because the second match would be considered degenerate and ignored. Jeevan Chalke, with some cosmetic changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d074b4e50d11768ab6da696b13d40ec05e4823fb">http://git.postgresql.org/pg/commitdiff/d074b4e50d11768ab6da696b13d40ec05e4823fb</a></li>

<li>Fix contrib/cube and contrib/seg to build with bison 3.0. These modules used the YYPARSE_PARAM macro, which has been deprecated by the bison folk since 1.875, and which they finally removed in 3.0. Adjust the code to use the replacement facility, %parse-param, which is a much better solution anyway since it allows specification of the type of the extra parser parameter. We can thus get rid of a lot of unsightly casting. Back-patch to all active branches, since somebody might try to build a back branch with up-to-date tools. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55cbfa5366b78d93cd1ff8c4c622b552985344f6">http://git.postgresql.org/pg/commitdiff/55cbfa5366b78d93cd1ff8c4c622b552985344f6</a></li>

</ul>

<p>Gregory Stark a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add SQL Standard WITH ORDINALITY support for UNNEST (and any other SRF). Author: Andrew Gierth, David Fetter Reviewers: Dean Rasheed, Jeevan Chalke, Stephen Frost 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c62736cc37f6812d1ebb41ea5a86ffe60564a1f0">http://git.postgresql.org/pg/commitdiff/c62736cc37f6812d1ebb41ea5a86ffe60564a1f0</a></li>

<li>Sync ECPG with WITH ORDINALITY changes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69b7d59a744134e33bbe51dab44dd4113c83b7fb">http://git.postgresql.org/pg/commitdiff/69b7d59a744134e33bbe51dab44dd4113c83b7fb</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: clarify C comment about Windows thread struct pointers. Backpatch to 9.3 to keep source trees consistent. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/000b65fd2b9fa0880a255043f50f562b8e8287b0">http://git.postgresql.org/pg/commitdiff/000b65fd2b9fa0880a255043f50f562b8e8287b0</a></li>

<li>pg_dump/pg_dumpall: remove unnecessary SQL trailing semicolons. Patch by Ian Lawrence Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8eb29194fc1711308804e8d4238a002a1cd35afe">http://git.postgresql.org/pg/commitdiff/8eb29194fc1711308804e8d4238a002a1cd35afe</a></li>

<li>pg_test_fsync: expand ops/sec display. Expand ops/sec by two digits to maintain alignment on servers with fast I/O subsystems, e.g. can now display &lt; 10M ops/sec with consistent alignment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43f6388931fa71d7c2885fa54804c7cdff7d9f62">http://git.postgresql.org/pg/commitdiff/43f6388931fa71d7c2885fa54804c7cdff7d9f62</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Restore REINDEX constraint validation. Refactoring as part of commit 8ceb24568054232696dddc1166a8563bc78c900a had the unintended effect of making REINDEX TABLE and REINDEX DATABASE no longer validate constraints enforced by the indexes in question; REINDEX INDEX still did so. Indexes marked invalid remained so, and constraint violations arising from data corruption went undetected. Back-patch to 9.0, like the causative commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16f38f72ab2b8a3b2d45ba727d213bb31111cea4">http://git.postgresql.org/pg/commitdiff/16f38f72ab2b8a3b2d45ba727d213bb31111cea4</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix inaccurate description of tablespace. Currently we don't need to update the pg_tablespace catalog after redefining the symbolic links to the tablespaces because pg_tablespace.spclocation column was removed in PostgreSQL 9.2. Back patch to 9.2 where pg_tablespace.spclocation was removed. Ian Barwick, with minor change by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee08a78a8104ce4e98ce67dc404b9d6ee3a1425a">http://git.postgresql.org/pg/commitdiff/ee08a78a8104ce4e98ce67dc404b9d6ee3a1425a</a></li>

<li>Fix typo in comment. Hitoshi Harada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c876fb42417739dbb19540ef61f6cd75752eb16e">http://git.postgresql.org/pg/commitdiff/c876fb42417739dbb19540ef61f6cd75752eb16e</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a couple of inconsequential typos in new header 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3142cf6dd5c0308633e36fabbd13bb51bdec1ff2">http://git.postgresql.org/pg/commitdiff/3142cf6dd5c0308633e36fabbd13bb51bdec1ff2</a></li>

<li>Fix mis-indented lines. Per Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a59516b6311a6c2acc89448c94913ebae598f02a">http://git.postgresql.org/pg/commitdiff/a59516b6311a6c2acc89448c94913ebae598f02a</a></li>

<li>Fix crash in error report of invalid tuple lock. My tweak of these error messages in commit c359a1b082 contained the thinko that a query would always have rowMarks set for a query containing a locking clause. Not so: when declaring a cursor, for instance, rowMarks isn't set at the point we're checking, so we'd be dereferencing a NULL pointer. The fix is to pass the lock strength to the function raising the error, instead of trying to reverse-engineer it. The result not only is more robust, but it also seems cleaner overall. Per report from Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88c556680ca3faa40f7428c7705455d744a9859e">http://git.postgresql.org/pg/commitdiff/88c556680ca3faa40f7428c7705455d744a9859e</a></li>

<li>Fix old visibility bug in HeapTupleSatisfiesDirty. If a tuple is locked but not updated by a concurrent transaction, HeapTupleSatisfiesDirty would return that transaction's Xid in xmax, causing callers to wait on it, when it is not necessary (in fact, if the other transaction had used a multixact instead of a plain Xid to mark the tuple, HeapTupleSatisfiesDirty would have behave differently and *not* returned the Xmax). This bug was introduced in commit 3f7fbf85dc5b42, dated December 1998, so it's almost 15 years old now. However, it's hard to see this misbehave, because before we had NOWAIT the only consequence of this is that transactions would wait for slightly more time than necessary; so it's not surprising that this hasn't been reported yet. Craig Ringer and Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/706f9dd914c64a41e06b5fbfd62d6d6dab43eeb8">http://git.postgresql.org/pg/commitdiff/706f9dd914c64a41e06b5fbfd62d6d6dab43eeb8</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow a context to be passed in for error handling. As pointed out by Tom Lane, we can allow other users of the error handler callbacks to provide their own memory context by adding the context to use to ErrorData and using that instead of explicitly using ErrorContext. This then allows GetErrorContextStack() to be called from inside exception handlers, so modify plpgsql to take advantage of that and add an associated regression test for it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ddef1a39c6798ffae899acd08ff92329dd304085">http://git.postgresql.org/pg/commitdiff/ddef1a39c6798ffae899acd08ff92329dd304085</a></li>

<li>Add locking around SSL_context usage in libpq. I've been working with Nick Phillips on an issue he ran into when trying to use threads with SSL client certificates. As it turns out, the call in initialize_SSL() to SSL_CTX_use_certificate_chain_file() will modify our SSL_context without any protection from other threads also calling that function or being at some other point and trying to read from SSL_context. To protect against this, I've written up the attached (based on an initial patch from Nick and much subsequent discussion) which puts locks around SSL_CTX_use_certificate_chain_file() and all of the other users of SSL_context which weren't already protected. Nick Phillips, much reworked by Stephen Frost Back-patch to 9.0 where we started loading the cert directly instead of using a callback. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aad2a630b1b163038ea904e16a59e409020f5828">http://git.postgresql.org/pg/commitdiff/aad2a630b1b163038ea904e16a59e409020f5828</a></li>

<li>Improve handling of pthread_mutex_lock error case. We should really be reporting a useful error along with returning a valid return code if pthread_mutex_lock() throws an error for some reason. Add that and back-patch to 9.0 as the prior patch. Pointed out by Alvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8359ed806f3300b79f110f1ac216c58c0732d05c">http://git.postgresql.org/pg/commitdiff/8359ed806f3300b79f110f1ac216c58c0732d05c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove SnapshotNow and HeapTupleSatisfiesNow. We now use MVCC catalog scans, and, per discussion, have eliminated all other remaining uses of SnapshotNow, so that we can now get rid of it. This will break third-party code which is still using it, which is intentional, as we want such code to be updated to do things the new way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/813fb0315587d32e3b77af1051a0ef517d187763">http://git.postgresql.org/pg/commitdiff/813fb0315587d32e3b77af1051a0ef517d187763</a></li>

<li>Assorted bgworker-related comment fixes. Per gripes by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/149e38e5ee02731d505946ced0f7bfc547c0e374">http://git.postgresql.org/pg/commitdiff/149e38e5ee02731d505946ced0f7bfc547c0e374</a></li>

<li>Fix typo in comment. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05ee328d66b700832cff61f59894ced7878fbfdb">http://git.postgresql.org/pg/commitdiff/05ee328d66b700832cff61f59894ced7878fbfdb</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve comments for IncrementalMaintenance DML enabling functions. Move the static functions after the comment and expand the comment. Per complaint from Andres Freund, although using different comment text. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f31c149f13e4495051e014bab6fbe5e8ec4f56f1">http://git.postgresql.org/pg/commitdiff/f31c149f13e4495051e014bab6fbe5e8ec4f56f1</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Andrew (RhodiumToad) Gierth and Gregory Stark traded patches to clean up the grammar pursuant to discussion around the WITH ORDINALITY patch.</li>

<li>Andrew Tipton sent in a patch to add various JSON manipulation functions.</li>

<li>Amit Kapila sent in another revision of a patch to add ALTER SYSTEM.</li>

<li>Pavel Stehule sent in a patch to allow database owners to cancel the queries of roles which are not superuser.</li>

<li>Andres Freund sent in a PoC patch to allow computing VARSIZE_ANY(PTR) during debugging.</li>

<li>Stefan Radomski sent in a patch to reserve connections for replication roles.</li>

<li>Gregory Stark sent in a patch to improve the performance of WITH ORDINALITY.</li>

<li>Ivan Lezhnjov IV sent in another revision of a patch to fix the documentation of backups.</li>

<li>Stefan Radomski sent in another revision of a patch to allow throttling backups.</li>

<li>MauMau sent in two revisions of a patch to fix a bug where disk space in pg_xlog increases during archive recovery.</li>

<li>Fujii Masao sent in a patch to fix a bug which caused an assertion failure in immediate shutdown mode.</li>

<li>Alvaro Herrera sent in a WIP patch to change the behavior of IS NULL in the catalog.</li>

<li>Dimitri Fontaine sent in two more revisions of a patch to implement EXTENSION TEMPLATEs.</li>

<li>Craig Ringer sent in a patch to fix a bug where FOR SHARE|UPDATE NOWAIT will still block if they have to follow a ctid chain.</li>

<li>Antonin Houska sent in a WIP patch to do partial matches using range key entries.</li>

<li>Alvaro Herrera sent in a patch to extend SLRU in a way that prevents a pg_upgrade failure.</li>

<li>Tomonari Katsumata sent in another revision of a patch to fix fast promotion of a replica to master.</li>

<li>Ian Lawrence Barwick sent in two revisions of a patch to show the object schema in verbose output in pg_dump/pg_restore.</li>

<li>-- Sent via pgsql-announce mailing list (pgsql-announce@postgresql.org) To make changes to your subscription: 

<a target="_blank" href="http://www.postgresql.org/mailpref/pgsql-announce">http://www.postgresql.org/mailpref/pgsql-announce</a></li>

</ul>