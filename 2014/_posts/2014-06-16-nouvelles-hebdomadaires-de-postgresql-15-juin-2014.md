---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 juin 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/06/16/Nouvelles-hebdomadaires-de-PostgreSQL-15-juin-2014"
---


<p>Le PgDay 2014 de Portland (Oregon, &Eacute;tats-Unis) aura lieu le 6 septembre 2014&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PDXPUGDay2014">https://wiki.postgresql.org/wiki/PDXPUGDay2014</a></p>

<p>[ndt: <em>meetup</em> &agrave; Paris ce mercredi et PHPTour &agrave; Lyon : <a href="http://tapoueh.org/blog/2014/06/16-conferences-francaises.html" target="_blank">http://tapoueh.org/blog/2014/06/16-conferences-francaises.html</a>]</p>

<p><strong>Offres d'emplois autour de PostgreSQL en juin</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-06/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La premi&egrave;re PgConf suisse aura lieu le 24 juin 2014 au HSR Hochschule f&uuml;r Technik Rapperswil&nbsp;: 

<a target="_blank" href="http://www.postgres-conference.ch/">http://www.postgres-conference.ch/</a></li>

<li>Char(14) et le PGday UK auront lieu les 8 &amp; 9 juillet 2014&nbsp;: 

<a target="_blank" href="http://www.char14.info">http://www.char14.info</a> <a target="_blank" href="http://postgresqlusergroup.org.uk/">http://postgresqlusergroup.org.uk/</a></li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>La PGConf europ&eacute;enne 2014 se tiendra &agrave; Madrid (Espagne) du 21 au 24 octobre, &agrave; l'h&ocirc;tel Miguel Angel&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/">http://2014.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140616024945.GB29714@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Wrap multixact/members correctly during extension, take 2. In a50d97625497b7 I already changed this, but got it wrong for the case where the number of members is larger than the number of entries that fit in the last page of the last segment. As reported by Serge Negodyuck in a followup to bug #8673. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0b263baab3e927fe4b4f35755b91ac8d1db8fe0">http://git.postgresql.org/pg/commitdiff/b0b263baab3e927fe4b4f35755b91ac8d1db8fe0</a></li>

<li>Fix typos 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7937910781a823382b3f76b4b811791804431927">http://git.postgresql.org/pg/commitdiff/7937910781a823382b3f76b4b811791804431927</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix infinite loop when splitting inner tuples in SPGiST text indexes. Previously, the code used a node label of zero both for strings that contain no bytes beyond the inner tuple's prefix, and for cases where an "allTheSame" inner tuple has to be split to allow a string with a different next byte to be inserted into it. Failing to distinguish these cases meant that if a string ending with the current prefix needed to be inserted into an allTheSame tuple, we got into an infinite loop, because after splitting the tuple we'd descend into the child allTheSame tuple and then find we need to split again. To fix, instead use -1 and -2 as the node labels for these two cases. This requires widening the node label type from "char" to int2, but fortunately SPGiST stores all pass-by-value node label types in their Datum representation, which means that this change is transparently upward compatible so far as the on-disk representation goes. We continue to recognize zero as a dummy node label for reading purposes, but will not attempt to push new index entries down into such a label, so that the loop won't occur even when dealing with an existing index. Per report from Teodor Sigaev. Back-patch to 9.2 where the faulty code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c170655cc81fd5e3c152e951c52247171bb57611">http://git.postgresql.org/pg/commitdiff/c170655cc81fd5e3c152e951c52247171bb57611</a></li>

<li>Forward-port regression test for bug #10587 into 9.3 and HEAD. Although this bug is already fixed in post-9.2 branches, the case triggering it is quite different from what was under consideration at the time. It seems worth memorializing this example in HEAD just to make sure it doesn't get broken again in future. Extracted from commit 187ae17300776f48b2bd9d0737923b1bf70f606e. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab76208e3df6841b3770edeece57d0f048392237">http://git.postgresql.org/pg/commitdiff/ab76208e3df6841b3770edeece57d0f048392237</a></li>

<li>Stamp HEAD as 9.5devel. Let the hacking begin ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a24c104b9a6e4fef0892b2a0b70f4073378e6544">http://git.postgresql.org/pg/commitdiff/a24c104b9a6e4fef0892b2a0b70f4073378e6544</a></li>

<li>Stamp shared-library minor version numbers for 9.5. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bd82dd39eb80587b53f7a3af33bf8b2d49632af">http://git.postgresql.org/pg/commitdiff/3bd82dd39eb80587b53f7a3af33bf8b2d49632af</a></li>

<li>Fix ancient encoding error in hungarian.stop. When we grabbed this file off the Snowball project's website, we mistakenly supposed that it was in LATIN1 encoding, but evidently it was actually in LATIN2. This resulted in &#337; (o-double-acute, U+0151, which is code 0xF5 in LATIN2) being misconverted into &otilde; (o-tilde, U+00F5), as complained of in bug #10589 from Zolt&aacute;n S&ouml;r&ouml;s. We'd have messed up u-double-acute too, but there aren't any of those in the file. Other characters used in the file have the same codes in LATIN1 and LATIN2, which no doubt helped hide the problem for so long. The error is not only ours: the Snowball project also was confused about which encoding is required for Hungarian. But dealing with that will require source-code changes that I'm not at all sure we'll wish to back-patch. Fixing the stopword file seems reasonably safe to back-patch however. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd90b5d574f7b882a35fe345359643cb1ff2e67e">http://git.postgresql.org/pg/commitdiff/fd90b5d574f7b882a35fe345359643cb1ff2e67e</a></li>

<li>Remove unnecessary output expressions from unflattened subqueries. If a sub-select-in-FROM gets flattened into the upper query, then we naturally get rid of any output columns that are defined in the sub-select text but not actually used in the upper query. However, this doesn't happen when it's not possible to flatten the subquery, for example because it contains GROUP BY, LIMIT, etc. Allowing the subquery to compute useless output columns is often fairly harmless, but sometimes it has significant performance cost: the unused output might be an expensive expression, or it might be a Var from a relation that we could remove entirely (via the join-removal logic) if only we realized that we didn't really need that Var. Situations like this are common when expanding views, so it seems worth taking the trouble to detect and remove unused outputs. Because the upper query's Var numbering for subquery references depends on positions in the subquery targetlist, we don't want to renumber the items we leave behind. Instead, we can implement "removal" by replacing the unwanted expressions with simple NULL constants. This wastes a few cycles at runtime, but not enough to justify more work in the planner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55d5b3c08279b487cfa44d4b6e6eea67a0af89e4">http://git.postgresql.org/pg/commitdiff/55d5b3c08279b487cfa44d4b6e6eea67a0af89e4</a></li>

<li>Rename lo_create(oid, bytea) to lo_from_bytea(). The previous naming broke the query that libpq's lo_initialize() uses to collect the OIDs of the server-side functions it requires, because that query effectively assumes that there is only one function named lo_create in the pg_catalog schema (and likewise only one lo_open, etc). While we should certainly make libpq more robust about this, the naive query will remain in use in the field for the foreseeable future, so it seems the only workable choice is to use a different name for the new function. lo_from_bytea() won a small straw poll. Back-patch into 9.4 where the new function was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/154146d208de7518bb6c8131dc8d2361f7f36f56">http://git.postgresql.org/pg/commitdiff/154146d208de7518bb6c8131dc8d2361f7f36f56</a></li>

<li>Add regression test to prevent future breakage of legacy query in libpq. Memorialize the expected output of the query that libpq has been using for many years to get the OIDs of large-object support functions. Although we really ought to change the way libpq does this, we must expect that this query will remain in use in the field for the foreseeable future, so until we're ready to break compatibility with old libpq versions we'd better check the results stay the same. See the recent lo_create() fiasco. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2dd352d4b01648cac0354c754d9617b2e61f065d">http://git.postgresql.org/pg/commitdiff/2dd352d4b01648cac0354c754d9617b2e61f065d</a></li>

<li>Remove inadvertent copyright violation in largeobject regression test. Robert Frost is no longer with us, but his copyrights still are, so let's stop using "Stopping by Woods on a Snowy Evening" as test data before somebody decides to sue us. Wordsworth is more safely dead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2783bee3045d6190dcff0ccf985c4e60a660f99">http://git.postgresql.org/pg/commitdiff/d2783bee3045d6190dcff0ccf985c4e60a660f99</a></li>

<li>Preserve exposed type of subquery outputs when substituting NULLs. I thought I could get away with hardcoded int4 here, but the buildfarm says differently. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d4444a6fc011b7e2ca16386cf9f1c9f25c114e5">http://git.postgresql.org/pg/commitdiff/9d4444a6fc011b7e2ca16386cf9f1c9f25c114e5</a></li>

<li>Adjust largeobject regression test to leave a couple of LOs behind. Since we commonly test pg_dump/pg_restore by seeing whether they can dump and restore the regression test database, it behooves us to include some large objects in that test scenario. I tried to include a comment on one of these large objects to improve the test scenario further ... but it turns out that pg_upgrade fails to preserve comments on large objects, and its regression test notices the discrepancy. So uncommenting that COMMENT is a TODO for later. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70ad7ed4e88d9de3273f2f875cfaa044a35dfa97">http://git.postgresql.org/pg/commitdiff/70ad7ed4e88d9de3273f2f875cfaa044a35dfa97</a></li>

<li>Improve tuplestore's error messages for I/O failures. We should report the errno when we get a failure from functions like BufFileWrite. "ERROR: write failed" is unreasonably taciturn for a case that's well within the realm of possibility; I've seen it a couple times in the buildfarm recently, in situations that were probably out-of-disk-space, but it'd be good to see the errno to confirm it. I think this code was originally written without assuming that the buffile.c functions would return useful errno; but most other callers *are* assuming that, and a quick look at the buffile code gives no reason to suppose otherwise. Also, a couple of the old messages were phrased on the assumption that a short read might indicate a logic bug in tuplestore itself; but that code's pretty well tested by now, so a filesystem-level problem seems much more likely. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6554656ea2043c5bb877b427237dc5ddd7c5e5c8">http://git.postgresql.org/pg/commitdiff/6554656ea2043c5bb877b427237dc5ddd7c5e5c8</a></li>

<li>Fix pg_restore's processing of old-style BLOB COMMENTS data. Prior to 9.0, pg_dump handled comments on large objects by dumping a bunch of COMMENT commands into a single BLOB COMMENTS archive object. With sufficiently many such comments, some of the commands would likely get split across bufferloads when restoring, causing failures in direct-to-database restores (though no problem would be evident in text output). This is the same type of issue we have with table data dumped as INSERT commands, and it can be fixed in the same way, by using a mini SQL lexer to figure out where the command boundaries are. Fortunately, the COMMENT commands are no more complex to lex than INSERTs, so we can just re-use the existing lexer for INSERTs. Per bug #10611 from Jacek Zalewski. Back-patch to all active branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c81e63d85f0c2c39d3fdfd8b95fc1ead6fdcb89f">http://git.postgresql.org/pg/commitdiff/c81e63d85f0c2c39d3fdfd8b95fc1ead6fdcb89f</a></li>

<li>Improve predtest.c's ability to reason about operator expressions. We have for a long time been able to prove implications and refutations between clauses structured like "expr op const" with the same subexpression and btree-related operators; for example that "x &lt; 4" implies "x &lt;= 5". The implication machinery is needed to detect usability of partial indexes, and the refutation machinery is needed to implement constraint exclusion. This patch extends that machinery to make proofs for operator expressions involving the same two immutable-but-not-necessarily-just-Const input expressions, ie does "expr1 op1 expr2" prove or refute "expr1 op2 expr2" or "expr2 op2 expr1"? An important example is that we can now prove "x = y" given "y = x", which formerly the code could not deduce unless x or y was a constant. We can make use of the system's knowledge of operator commutator and negator pairs, and can also make use of btree opclass relationships, for example "x &lt; y" implies "x &lt;= y" and refutes "x &gt; y" (notice that neither of these could be proven just from commutator or negator links). Inspired by a gripe from Brian Dunavant. This seems more like a new feature than a bug fix, though, so no back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f8c23c4d31d4a0e801041733deb2c7cfa577b32">http://git.postgresql.org/pg/commitdiff/3f8c23c4d31d4a0e801041733deb2c7cfa577b32</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a26ae56f5173f1f8990ccf134730b964506f29ba">http://git.postgresql.org/pg/commitdiff/a26ae56f5173f1f8990ccf134730b964506f29ba</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Consistently define BUILDING_DLL during builds of src/port for Windows. The MSVC build process already did so; this fixes the principal build process to match. Both processes already did likewise for src/common. This lets server builds of src/port reference postgres.exe data symbols. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd31794df7dc53719740aa8e2ea1578ea2b87285">http://git.postgresql.org/pg/commitdiff/bd31794df7dc53719740aa8e2ea1578ea2b87285</a></li>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d098b236f301d8e805f3c4d7fe940230c65d7a88">http://git.postgresql.org/pg/commitdiff/d098b236f301d8e805f3c4d7fe940230c65d7a88</a></li>

<li>Have configuration templates augment, not replace, LDFLAGS. This preserves user-specified LDFLAGS; we already kept user-specified CFLAGS and CPPFLAGS. Given the shortage of complaints and the fact that any problem caused is likely to appear at build time, no back-patch. Dag-Erling Sm&oslash;rgrav and Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d92b158555452ba62ee3caf5c5546fd4a8cba5b">http://git.postgresql.org/pg/commitdiff/4d92b158555452ba62ee3caf5c5546fd4a8cba5b</a></li>

<li>Harden pg_filenode_relation test against concurrent DROP TABLE. Per buildfarm member prairiedog. Back-patch to 9.4, where the test was introduced. Reviewed by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3fdd257a430ff581090740570af9f266bb893e3">http://git.postgresql.org/pg/commitdiff/f3fdd257a430ff581090740570af9f266bb893e3</a></li>

<li>Adjust 9.4 release notes. Back-patch to 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7205d81573cb0c979f2d463a1d9edb6f97c94aa">http://git.postgresql.org/pg/commitdiff/a7205d81573cb0c979f2d463a1d9edb6f97c94aa</a></li>

<li>emacs.samples: Reliably override ".dir-locals.el". Back-patch to 9.4, where .dir-locals.el was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81300ea4443766aad2631fad8d02d09dd66954a2">http://git.postgresql.org/pg/commitdiff/81300ea4443766aad2631fad8d02d09dd66954a2</a></li>

<li>Add mkdtemp() to libpgport. This function is pervasive on free software operating systems; import NetBSD's implementation. Back-patch to 8.4, like the commit that will harness it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e6b1bf258170e62dac555fc82ff0536dfe01d29">http://git.postgresql.org/pg/commitdiff/9e6b1bf258170e62dac555fc82ff0536dfe01d29</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Consistency improvements for slot and decoding code. Change the order of checks in similar functions to be the same; remove a parameter that's not needed anymore; rename a memory context and expand a couple of comments. Per review comments from Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e04a9ccd2ccd6e31cc4af6b08257a0a186d0fce8">http://git.postgresql.org/pg/commitdiff/e04a9ccd2ccd6e31cc4af6b08257a0a186d0fce8</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change the signature of rm_desc so that it's passed a XLogRecord. Just feels more natural, and is more consistent with rm_redo. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ef0b6784c7d7258cae314cb46558873edaf9c0a">http://git.postgresql.org/pg/commitdiff/0ef0b6784c7d7258cae314cb46558873edaf9c0a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Ian Lawrence Barwick sent in a patch to add RETURNING PRIMARY KEY syntax for DML.</li>

<li>MauMau sent in two revisions of a patch to fix a memory leak in contrib/dblink.</li>

<li>Furuya Osamu sent in another revision of a patch to add a synchronous mode to pg_receivexlog.</li>

<li>Gurjeet Singh sent in two revisions of a patch to add a GUC to control a child backend's oom_score_adj.</li>

<li>Heikki Linnakangas sent in a patch to invent a new internal API for interfacing with SSL, which allows a non-OpenSSL implementation, and another patch to implement same with Windows SChannel.</li>

<li>Fabr&iacute;zio de Royes Mello sent in a patch to implement ALTER TABLE ... SET LOGGED.</li>

<li>Sergey Muraviov sent in another revision of a patch to fix wrapping in extended mode in the default pager for psql.</li>

<li>Fujii Masao sent in a patch to add a log_replication_command GUC, which causes replication commands to be logged.</li>

<li>David Johnston sent in a doc patch for setting configuration parameters.</li>

<li>Christoph Berg sent in a patch to fix some lacunae in DSM.</li>

<li>SAWADA Masahiko sent in a patch to add line number as prompt option to psql.</li>

<li>Noah Misch sent in a patch to fix an issue which arises when conflicting LDAP libraries have been loaded.</li>

<li>Jaime Casanova sent in a patch to move the reloptions of views into its own structure.</li>

<li>Noah Misch sent in a patch to add a check for that mapping relation oids to filenodes and back is done correctly.</li>

<li>Amit Kapila sent in another revision of a patch to prohibit ALTER SYSTEM from setting the data directory, which could result in a recursive definition.</li>

<li>Kyotaro HORIGUCHI sent in a patch to make PG to use index for longer pathkeys than index columns when all of the following conditions hold: the index is a unique index; all index columns are NOT NULL, and the index column list is a subset of query_pathkeys.</li>

<li>Michael Paquier sent in a patch to add a buffer capture facility to check the consistency of WAL replay.</li>

<li>Abhijit Menon-Sen sent in a patch to introduce a function XLogLockBlockRangeForCleanup().</li>

<li>Heikki Linnakangas sent in another revision of a patch to implement CSN-based snapshots.</li>

<li>Kyotaro HORIGUCHI sent in a patch to add the function to clear backup location information to pg_resetxlog.</li>

<li>Rahila Syed sent in a patch to do compression of full-page writes in the WAL using the pglz, lz4 and snappy algorithms.</li>

<li>Quan Zongliang sent in a patch to extend PL/pgSQL to define multi variables once, assigning only the last if an assignment is included.</li>

<li>Fujii Masao sent in a patch to make log_disconnections PGC_SUSET rather than PGC_BACKEND.</li>

<li>Alvaro Herrera sent in a patch to enable replicating DROP commands across servers in logical replication.</li>

<li>Alvaro Herrera sent in a patch to make ALTER TABLESPACE MOVE a separate command tag.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to implement a function called varwidth_bucket which does binning with variable bucket width.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to make it possible to change the system identifier of the cluster in pg_control.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Alvaro Herrera sent in another revision of a patch to add CREATE support to event triggers.</li>

<li>Gurjeet Singh sent in another revision of a patch to implement pg_hibernator.</li>

<li>Heikki Linnakangas sent in two more revisions of a patch to change the WAL format and API.</li>

<li>Alvaro Herrera sent in a patch to fix a crash which happens when assertions are disabled and WAL_DEBUG turned on.</li>

<li>Alvaro Herrera sent in another revision of a patch to implement min_max indexes.</li>

<li>Kevin Grittner sent in a patch to add delta relations in AFTER triggers.</li>

</ul>