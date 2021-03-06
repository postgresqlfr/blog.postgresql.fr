---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 mars 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/03/07/Nouvelles-hebdomadaires-de-PostgreSQL-4-mars-2012"
---


<p>Publication des mises &agrave; jour de s&eacute;curit&eacute;&nbsp;: 9.1.3, 9.0.7, 8.4.11 et 8.3.18. Mettez &agrave; jour imm&eacute;diatement si les vuln&eacute;rabilit&eacute;s vous concernent, &agrave; la prochaine occasion sinon. 

<a target="_blank" href="http://www.postgresql.org/about/news/1377/">http://www.postgresql.org/about/news/1377/</a></p>

<p>[ndt: 

<a target="_blank" href="http://blog.postgresql.fr/index.php?post/2012/02/27/Mise-%C3%A0-jour-mineures-de-PostgreSQL-%3A-9.1.3%2C-9.0.7%2C-8.4.11%2C-8.3.18">annonce en fran&ccedil;ais</a> (fr)]</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgAdmin III v1.14.2, un outil graphique d'administration pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.pgadmin.org/development/changelog.php">http://www.pgadmin.org/development/changelog.php</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay Austin 2012 est programm&eacute; pour le 28 mars&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/event/1379/">http://www.postgresql.org/about/event/1379/</a></li>

<li>Le PGDay DC 2012 est programm&eacute; pour le 30 mars&nbsp;: 

<a target="_blank" href="http://pgday.bwpug.org">http://pgday.bwpug.org</a></li>

<li>Le <em>PGDay NYC</em> aura lieu le 2 avril 2012 au <em>Lighthouse International</em> &agrave; New-York&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org">http://pgday.nycpug.org</a></li>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-03/msg00001.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove arbitrary limitation on length of common name in SSL certificates. Both libpq and the backend would truncate a common name extracted from a certificate at 32 bytes. Replace that fixed-size buffer with dynamically allocated string so that there is no hard limit. While at it, remove the code for extracting peer_dn, which we weren't using for anything; and don't bother to store peer_cn longer than we need it in libpq. This limit was not so terribly unreasonable when the code was written, because we weren't using the result for anything critical, just logging it. But now that there are options for checking the common name against the server host name (in libpq) or using it as the user's name (in the server), this could result in undesirable failures. In the worst case it even seems possible to spoof a server name or user name, if the correct name is exactly 32 bytes and the attacker can persuade a trusted CA to issue a certificate in which that string is a prefix of the certificate's common name. (To exploit this for a server name, he'd also have to send the connection astray via phony DNS data or some such.) The case that this is a realistic security threat is a bit thin, but nonetheless we'll treat it as one. Back-patch to 8.4. Older releases contain the faulty code, but it's not a security problem because the common name wasn't used for anything interesting. Reported and patched by Heikki Linnakangas Security: CVE-2012-0867 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/077711c2e3e86384d19d833233bd35e05b921cfc">http://git.postgresql.org/pg/commitdiff/077711c2e3e86384d19d833233bd35e05b921cfc</a></li>

<li>Convert newlines to spaces in names written in pg_dump comments. pg_dump was incautious about sanitizing object names that are emitted within SQL comments in its output script. A name containing a newline would at least render the script syntactically incorrect. Maliciously crafted object names could present a SQL injection risk when the script is reloaded. Reported by Heikki Linnakangas, patch by Robert Haas Security: CVE-2012-0868 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89e0bac86dbca40dfc321926205f2a90d3da5437">http://git.postgresql.org/pg/commitdiff/89e0bac86dbca40dfc321926205f2a90d3da5437</a></li>

<li>Require execute permission on the trigger function for CREATE TRIGGER. This check was overlooked when we added function execute permissions to the system years ago. For an ordinary trigger function it's not a big deal, since trigger functions execute with the permissions of the table owner, so they couldn't do anything the user issuing the CREATE TRIGGER couldn't have done anyway. However, if a trigger function is SECURITY DEFINER, that is not the case. The lack of checking would allow another user to install it on his own table and then invoke it with, essentially, forged input data; which the trigger function is unlikely to realize, so it might do something undesirable, for instance insert false entries in an audit log table. Reported by Dinesh Kumar, patch by Robert Haas Security: CVE-2012-0866 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/891e6e7bfd9bb72687522af08c18689f795cb60a">http://git.postgresql.org/pg/commitdiff/891e6e7bfd9bb72687522af08c18689f795cb60a</a></li>

<li>Last-minute release note updates. Security: CVE-2012-0866, CVE-2012-0867, CVE-2012-0868 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2ce60703ab431a1d6c10f50587ea5f5e984af2e">http://git.postgresql.org/pg/commitdiff/b2ce60703ab431a1d6c10f50587ea5f5e984af2e</a></li>

<li>Fix thinko in new match_join_clauses_to_index() logic. We don't need to constrain the other side of an indexable join clause to not be below an outer join; an example here is SELECT FROM t1 LEFT JOIN t2 ON t1.a = t2.b LEFT JOIN t3 ON t2.c = t3.d; We can consider an inner indexscan on t3.d using c = d as indexqual, even though t2.c is potentially nulled by a previous outer join. The comparable logic in orindxpath.c has always worked that way, but I was being overly cautious here. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0140a11b9ba5b22e1e4807e178bca770d46c3e28">http://git.postgresql.org/pg/commitdiff/0140a11b9ba5b22e1e4807e178bca770d46c3e28</a></li>

<li>Move CRC tables to libpgport, and provide them in a separate include file. This makes it much more convenient to build tools for Postgres that are separately compiled and require a matching CRC implementation. To prevent multiple copies of the CRC polynomial tables being introduced into the postgres binaries, they are now included in the static library libpgport that is mainly meant for replacement system functions. That seems like a bit of a kludge, but there's no better place. This cleans up building of the tools pg_controldata and pg_resetxlog, which previously had to build their own copies of pg_crc.o. In the future, external programs that need access to the CRC tables can include the tables directly from the new header file pg_crc_tables.h. Daniel Farina, reviewed by Abhijit Menon-Sen and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c02a00d440b90ead12658ce6ec9f4eee95dd0a3">http://git.postgresql.org/pg/commitdiff/5c02a00d440b90ead12658ce6ec9f4eee95dd0a3</a></li>

<li>Fix MSVC builds for previous patch's addition of a src/port file. (And why in the world is this OBJS list not being scraped from the corresponding Makefile?) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cae5810ebaaabb54171d9953bdd9cc802f0d135">http://git.postgresql.org/pg/commitdiff/8cae5810ebaaabb54171d9953bdd9cc802f0d135</a></li>

<li>Simplify references to backslash-doubling in func.sgml. Several places were still written as though standard_conforming_strings didn't exist, much less be the default. Now that it is on by default, we can simplify the text and just insert occasional notes suggesting that you might have to think harder if it's turned off. Per discussion of a suggestion from Hannes Frederic Sowa. Back-patch to 9.1 where standard_conforming_strings was made the default. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5c1a1969dd838189e5cc936c15cb40e13fb6d68">http://git.postgresql.org/pg/commitdiff/a5c1a1969dd838189e5cc936c15cb40e13fb6d68</a></li>

<li>Allow child-relation entries to be made in ec_has_const EquivalenceClasses. This fixes an oversight in commit 11cad29c91524aac1d0b61e0ea0357398ab79bf8, which introduced MergeAppend plans. Before that happened, we never particularly cared about the sort ordering of scans of inheritance child relations, since appending their outputs together would destroy any ordering anyway. But now it's important to be able to match child relation sort orderings to those of the surrounding query. The original coding of add_child_rel_equivalences skipped ec_has_const EquivalenceClasses, on the originally-correct grounds that adding child expressions to them was useless. The effect of this is that when a parent variable is equated to a constant, we can't recognize that index columns on the equivalent child variables are not sort-significant; that is, we can't recognize that a child index on, say, (x, y) is able to generate output in "ORDER BY y" order when there is a clause "WHERE x = constant". Adding child expressions to the (x, constant) EquivalenceClass fixes this, without any downside that I can see other than a few more planner cycles expended on such queries. Per recent gripe from Robert McGehee. Back-patch to 9.1 where MergeAppend was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44634e474fcb9dcd92b16fe3a0fb1d8a91e69353">http://git.postgresql.org/pg/commitdiff/44634e474fcb9dcd92b16fe3a0fb1d8a91e69353</a></li>

<li>Collect and use element-frequency statistics for arrays. This patch improves selectivity estimation for the array &lt;@, &amp;&amp;, and @&gt; (containment and overlaps) operators. It enables collection of statistics about individual array element values by ANALYZE, and introduces operator-specific estimators that use these stats. In addition, ScalarArrayOpExpr constructs of the forms "const = ANY/ALL (array_column)" and "const &lt;&gt; ANY/ALL (array_column)" are estimated by treating them as variants of the containment operators. Since we still collect scalar-style stats about the array values as a whole, the pg_stats view is expanded to show both these stats and the array-style stats in separate columns. This creates an incompatible change in how stats for tsvector columns are displayed in pg_stats: the stats about lexemes are now displayed in the array-related columns instead of the original scalar-related columns. There are a few loose ends here, notably that it'd be nice to be able to suppress either the scalar-style stats or the array-element stats for columns for which they're not useful. But the patch is in good enough shape to commit for wider testing. Alexander Korotkov, reviewed by Noah Misch and Nathan Boley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e5e167aaea4ceb355a6e20eec96c4f7d05527ab">http://git.postgresql.org/pg/commitdiff/0e5e167aaea4ceb355a6e20eec96c4f7d05527ab</a></li>

<li>Improve histogram-filling loop in new compute_array_stats() code. Do "frac" arithmetic in int64 to prevent overflow with large statistics targets, and improve the comments so people have some chance of understanding how it works. Alexander Korotkov and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4fb694aebc524f2085152d8c98a85e01ef6136f4">http://git.postgresql.org/pg/commitdiff/4fb694aebc524f2085152d8c98a85e01ef6136f4</a></li>

<li>Remove useless "rough estimate" path from mcelem_array_contained_selec. The code in this function that tried to cope with a missing count histogram was quite ineffective for anything except a perfectly flat distribution. Furthermore, since we were already punting for missing MCELEM slot, it's rather useless to sweat over missing DECHIST: there are no cases where ANALYZE will create the first but not the second. So just simplify the code by punting rather than pretending we can do something useful. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2eed7891008cbf2b7d3868b3d77751b33ed09ad">http://git.postgresql.org/pg/commitdiff/e2eed7891008cbf2b7d3868b3d77751b33ed09ad</a></li>

<li>Rewrite GiST support code for rangetypes. This patch installs significantly smarter penalty and picksplit functions for ranges, making GiST indexes for them smaller and faster to search. There is no on-disk format change, so no catversion bump, but you'd need to REINDEX to get the benefits for any existing index. Alexander Korotkov, reviewed by Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80da9e68fdd70b796b3a7de3821589513596c0f7">http://git.postgresql.org/pg/commitdiff/80da9e68fdd70b796b3a7de3821589513596c0f7</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Call check_keywords.pl in maintainer-check. For that purpose, have check_keywords.pl print errors to stderr and return a useful exit status. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bf8603c7a9153cada7e32eb0cf7ac1feb1d3b56">http://git.postgresql.org/pg/commitdiff/9bf8603c7a9153cada7e32eb0cf7ac1feb1d3b56</a></li>

<li>Add const qualifiers where they are accidentally cast away. This only produces warnings under -Wcast-qual, but it's more correct and consistent in any case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/973e9fb294dc05a384ecae7623923ae53cb81806">http://git.postgresql.org/pg/commitdiff/973e9fb294dc05a384ecae7623923ae53cb81806</a></li>

<li>psql: Improve error display for psql -f -. Running "psql -f -" used to print psql:&lt;stdin&gt;:1: ERROR: blah but that got broken between 8.4 and 9.0 (commit b291c0fba83a1e93868e2f69c03be195d620f30c), and now it printed psql:-:1: ERROR: blah This reverts to the old behavior and cleans up some code that was left dead or useless by the mentioned commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89c2f573a392e3995fffc619d4faed23f8649269">http://git.postgresql.org/pg/commitdiff/89c2f573a392e3995fffc619d4faed23f8649269</a></li>

<li>Don't link pg_isolation_regress with libpq. It's not necessary and can only create confusion about which libpq installation should be used. Also remove some dead code from the makefile that was apparently copied from elsewhere. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36a1a8c33d0d400b246dec8395990725b98801b7">http://git.postgresql.org/pg/commitdiff/36a1a8c33d0d400b246dec8395990725b98801b7</a></li>

<li>Small possible clarification in pg_basebackup reference page. The &lt;literal&gt; markup is not visible as distinct on man pages, which creates a bit of confusion when looking at the documentation of the pg_basebackup -l option. Rather than reinventing the entire font system for man pages to remedy this, just put some quotes around this particular case, which should also help in other output formats. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc8765e91c743d87f5658387b41e3a61cde54116">http://git.postgresql.org/pg/commitdiff/bc8765e91c743d87f5658387b41e3a61cde54116</a></li>

<li>ecpg: Clean up some const usage 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d41f510c807ce8b12c572196e2ae8f3817ac253a">http://git.postgresql.org/pg/commitdiff/d41f510c807ce8b12c572196e2ae8f3817ac253a</a></li>

<li>Add COLLATION FOR expression. reviewed by Jaime Casanova 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6688d2878e516314418274ee95c5c30412351933">http://git.postgresql.org/pg/commitdiff/6688d2878e516314418274ee95c5c30412351933</a></li>

<li>Re-add "make check" target in src/test/isolation/Makefile. This effectively reverts 7886cc73ad12fb9b5a729b6c8152f11a309f5d65, which was done under the impression that isolationtester needs libpq, which it no longer does (and never really did). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e5f4300fdcadac1bfd72a7d1a0225030226c800">http://git.postgresql.org/pg/commitdiff/8e5f4300fdcadac1bfd72a7d1a0225030226c800</a></li>

<li>Fix incorrect uses of gzFile. gzFile is already a pointer, so code like: gzFile *handle = gzopen(...) is wrong. This used to pass silently because gzFile used to be defined as void*, and you can assign a void* to a void**. But somewhere between zlib versions 1.2.3.4 and 1.2.6, the definition of gzFile was changed to struct gzFile_s *, and with that new definition this usage causes compiler warnings. So remove all those extra pointer decorations. There is a related issue in pg_backup_archiver.h, where FILE *FH; /* General purpose file handle */ is used throughout pg_dump as sometimes a real FILE* and sometimes a gzFile handle, which also causes warnings now. This is not yet fixed here, because it might need more code restructuring. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d923125b77c5d698bb8107a533a21627582baa43">http://git.postgresql.org/pg/commitdiff/d923125b77c5d698bb8107a533a21627582baa43</a></li>

<li>Allow CREATE TABLE (LIKE ...) from composite type. The only reason this didn't work before was that parserOpenTable() rejects composite types. So use relation_openrv() directly and manually do the errposition() setup that parserOpenTable() does. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b59ca98209d45f5689fe9de22a7429d4cf09d40c">http://git.postgresql.org/pg/commitdiff/b59ca98209d45f5689fe9de22a7429d4cf09d40c</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>ALTER TABLE: skip FK validation when it's safe to do so. We already skip rewriting the table in these cases, but we still force a whole table scan to validate the data. This can be skipped, and thus we can make the whole ALTER TABLE operation just do some catalog touches instead of scanning the table, when these two conditions hold: (a) Old and new pg_constraint.conpfeqop match exactly. This is actually stronger than needed; we could loosen things by way of operator families, but it'd require a lot more effort. (b) The functions, if any, implementing a cast from the foreign type to the primary opcintype are the same. For this purpose, we can consider a binary coercion equivalent to an exact type match. When the opcintype is polymorphic, require that the old and new foreign types match exactly. (Since ri_triggers.c does use the executor, the stronger check for polymorphic types is no mere future-proofing. However, no core type exercises its necessity.) Author: Noah Misch Committer's note: catalog version bumped due to change of the Constraint node. I can't actually find any way to have such a node in a stored rule, but given that we have "out" support for them, better be safe. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb3a7c2b95a28e57c56562d48d2a3aa5eeb7fa29">http://git.postgresql.org/pg/commitdiff/cb3a7c2b95a28e57c56562d48d2a3aa5eeb7fa29</a></li>

<li>psql: when tab-completing, use quotes on file names that need them. psql backslash commands that deal with file or directory names require quotes around those that have spaces, single quotes, or backslashes. However, tab-completing such names does not provide said quotes, and is thus almost useless with them. This patch fixes the problem by having a wrapper function around rl_filename_completion_function that dequotes on input and quotes on output. This eases dealing with such names. Author: Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41e3c94cac0e68257126b2d264dc5e877e892490">http://git.postgresql.org/pg/commitdiff/41e3c94cac0e68257126b2d264dc5e877e892490</a></li>

<li>Fix typo in comment. Haifeng Liu 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58e9f974dcfae7c4c445631afad47d80deb83160">http://git.postgresql.org/pg/commitdiff/58e9f974dcfae7c4c445631afad47d80deb83160</a></li>

<li>Remove TOAST table from pg_database. The only toastable column now is datacl, but we don't really support long ACLs anyway. The TOAST table should have been removed when the pg_db_role_setting catalog was introduced in commit 2eda8dfb52ed9962920282d8384da8bb4c22514d, but I forgot to do that. Per -hackers discussion on March 2011. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3433c6ba002f711a60352c3518f30cda73d06087">http://git.postgresql.org/pg/commitdiff/3433c6ba002f711a60352c3518f30cda73d06087</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correctly detect SSI conflicts of prepared transactions after crash. A prepared transaction can get new conflicts in and out after preparing, so we cannot rely on the in- and out-flags stored in the statefile at prepare- time. As a quick fix, make the conservative assumption that after a restart, all prepared transactions are considered to have both in- and out-conflicts. That can lead to unnecessary rollbacks after a crash, but that shouldn't be a big problem in practice; you don't want prepared transactions to hang around for a long time anyway. Dan Ports 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6a7271958e61fe8029087a34483437292f41f6f">http://git.postgresql.org/pg/commitdiff/d6a7271958e61fe8029087a34483437292f41f6f</a></li>

<li>When a GiST page is split during index build, it might not have a buffer. Previously it was thought that it's impossible as the code stands, because insertions create buffers as tuples are cascaded downwards, and index split also creaters buffers eagerly for all halves. But the example from Jay Levitt demonstrates that it can happen, when the root page is split. It's in fact OK if the buffer doesn't exist, so we just need to remove the sanity check. In fact, we've been discussing the possibility of destroying empty buffers to conserve memory, which would render the sanity check completely useless anyway. Fix by Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2502f45979fca76a6b19a07c98d7a41737a3dc7b">http://git.postgresql.org/pg/commitdiff/2502f45979fca76a6b19a07c98d7a41737a3dc7b</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a rule to optionally build docs with the stylesheet from the website. For those of us who prefer the formatting of the docs using the website stylesheets. Use "make STYLE=website draft" (for example) to use. The stylesheet itself is referenced directly to the website, so there is currently no copy of it stored in the source repository. Thus, docs built with it will only look correct if the browser can access the website when viewing them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8efb0bc57eb350bd991fd32c96e38a13bfe7f120">http://git.postgresql.org/pg/commitdiff/8efb0bc57eb350bd991fd32c96e38a13bfe7f120</a></li>

<li>Add function pg_xlog_location_diff to help comparisons. Comparing two xlog locations are useful for example when calculating replication lag. Euler Taveira de Oliveira, reviewed by Fujii Masao, and some cleanups from me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc5ac3686580079bd4ea26bf027178786d77a9ee">http://git.postgresql.org/pg/commitdiff/bc5ac3686580079bd4ea26bf027178786d77a9ee</a></li>

<li>More carefully validate xlog location string inputs. Now that we have validate_xlog_location, call it from the previously existing functions taking xlog locatoins as a string input. Suggested by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/141b89826ddb82b3afa7cf5e048d28a3d8e1c45c">http://git.postgresql.org/pg/commitdiff/141b89826ddb82b3afa7cf5e048d28a3d8e1c45c</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Provide environment overrides for psql file locations. PSQL_HISTORY provides an alternative for the command history file, and PSQLRC provides an alternative location for the .psqlrc file. Review by David Wheeler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34c978442c55dd13a3a8c6b90fd4380dad02f3da">http://git.postgresql.org/pg/commitdiff/34c978442c55dd13a3a8c6b90fd4380dad02f3da</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dimitri Fontaine, Andres Freund and Thom Brown sent in parts of the grand unified patch to implement command triggers.</li>

<li>Marti Raudsepp sent in a patch to make heap_open()/heap_close() consistently, which kicked off a short discussion about an implicit behavior of heap_open() that things depend on, including third-party things.</li>

<li>Josh Kupershmidt sent in a patch to fix a misleading error message from connectMaintenanceDatabase().</li>

<li>Kyotaro HORIGUCHI sent in another revision of the patch to create in libpq and use in dblink, a more space-efficient tuple storage mechanism.</li>

<li>Robert Haas sent in a WIP patch to set a new buffer flag BM_BGWRITER_CLEANED to every buffer the background writer cleans.</li>

<li>Bruce Momjian sent in two revisions of a patch to clarify pg_upgrade --logfile along with its documentation.</li>

<li>Alexander Shulgin sent in another revision of the patch to add URI connection string support to libpq.</li>

<li>Alvaro Herrera and Pavel Stehule traded revisions of the patch to add CHECK FUNCTION functionality to PostgreSQL.</li>

<li>Peter Geoghegan sent in another revision of the patch to normalize pg_stat_statements based in part on a review by Daniel Farina.</li>

<li>Simon Riggs sent in four more revisions of the patch to add some hints to COPY for large bulk loads.</li>

<li>Shigeru HANADA sent in another revision of the patch to add a PostgreSQL FDW.</li>

<li>Marti Raudsepp sent in another revision of the patch to enable caching the results of stable expressions with constant arguments.</li>

<li>Gilles Darold sent in two patches which embody two different approaches to implement a pg_is_in_exclusive_backup() function.</li>

<li>Robert Haas sent in a patch to add sortsupport to TEXT types.</li>

<li>Yeb Havinga sent in another revision of the patch to add a GUC named sepgsql.client_label.</li>

<li>Simon Riggs sent in three more revisions of a patch to make TRUNCATE more MVCC-safe.</li>

<li>Daniele Varazzo sent in a patch to improves the array selectivity estimation for = ANY and &lt;&gt; ALL, hence for the IN/NOT IN operators.</li>

<li>Jeff Janes sent in a patch to fix some cases of how sort memory grows.</li>

</ul>