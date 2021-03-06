---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 août 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/08/25/Nouvelles-hebdomadaires-de-PostgreSQL-19-août-2012"
---


<p>MAJ de s&eacute;curit&eacute;&nbsp;: version 9.1.5, 9.0.9, 8.4.13 et 8.3.20 publi&eacute;es. Mettez &agrave; jour d&egrave;s que possible&nbsp;! 

<a target="_blank" href="http://www.postgresql.org/about/news/1407/">http://www.postgresql.org/about/news/1407/</a></p>

<p>Le <em>Postgres Open 2012</em> aura lieu &agrave; Chicago (USA, Illinois) du 17 au 19 septembre 2012. Le programme est publi&eacute; et les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://postgresopen.org/2012/tickets">http://postgresopen.org/2012/tickets</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Pyrseas 0.6.0beta, une bo&icirc;te &agrave; outils pour la gestion de versions sous PostgreSQL, publi&eacute; sur PGXN&nbsp;: 

<a target="_blank" href="https://github.com/jmafc/Pyrseas">https://github.com/jmafc/Pyrseas</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-08/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La 4<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 4 octobre 2012 &agrave; Paris. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/4/">http://www.postgresql-sessions.org/en/4/</a></li>

<li>La <em>PostgreSQL Conference Europe 2012</em> aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

<li>Le PgDay argentin 2012 se tiendra &agrave; l'Universit&eacute; Nationale de Quilmes, &agrave; Bernal pr&egrave;s de Buenos Aires, le 13 novembre. Les sujets couverts concerneront aussi bien les utilisateurs, d&eacute;veloppeurs et contributeurs, que les d&eacute;cideurs et hauts responsables. Pour plus d'informations &agrave; propos de la conf&eacute;rence, consultez le site suivant&nbsp;: 

<a target="_blank" href="http://www.pgday.com.ar/quilmes2012?lang=en">http://www.pgday.com.ar/quilmes2012?lang=en</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-08/msg00009.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add runtime checks for number of query parameters passed to libpq functions. The maximum number of parameters supported by the FE/BE protocol is 65535, as it's transmitted as a 16-bit unsigned integer. However, the nParams arguments to libpq functions are all of type 'int'. We can't change the signature of libpq functions, but a simple bounds check is in order to make it more clear what's going wrong if you try to pass more than 65535 parameters. Per complaint from Jim Vanns. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f86e6ba40c9cc51c81fe1cf650b512ba5b19c86b">http://git.postgresql.org/pg/commitdiff/f86e6ba40c9cc51c81fe1cf650b512ba5b19c86b</a></li>

<li>Fix GiST buffering build bug, which caused "failed to re-find parent" errors. We use a hash table to track the parents of inner pages, but when inserting to a leaf page, the caller of gistbufferinginserttuples() must pass a correct block number of the leaf's parent page. Before gistProcessItup() descends to a child page, it checks if the downlink needs to be adjusted to accommodate the new tuple, and updates the downlink if necessary. However, updating the downlink might require splitting the page, which might move the downlink to a page to the right. gistProcessItup() doesn't realize that, so when it descends to the leaf page, it might pass an out-of-date parent block number as a result. Fix that by returning the block a tuple was inserted to from gistbufferinginserttuples(). This fixes the bug reported by Zden&#283;k J&iacute;lovec. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89911b3ab848915dd64d21ca3d3537470c93f89c">http://git.postgresql.org/pg/commitdiff/89911b3ab848915dd64d21ca3d3537470c93f89c</a></li>

<li>Add SP-GiST support for range types. The implementation is a quad-tree, largely copied from the quad-tree implementation for points. The lower and upper bound of ranges are the 2d coordinates, with some extra code to handle empty ranges. I left out the support for adjacent operator, -|-, from the original patch. Not because there was necessarily anything wrong with it, but it was more complicated than the other operators, and I only have limited time for reviewing. That will follow as a separate patch. Alexander Korotkov, reviewed by Jeff Davis and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/317dd55a9cae160c8d121eaec323a6aea3259fd8">http://git.postgresql.org/pg/commitdiff/317dd55a9cae160c8d121eaec323a6aea3259fd8</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2012e. DST law changes in Morocco; Tokelau has relocated to the other side of the International Date Line; and apparently Olson had Tokelau's GMT offset wrong by an hour even before that. There are also a large number of non-significant changes in this update. Upstream took the opportunity to remove trailing whitespace, and the SCCS-style version numbers on the individual files are gone too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51fd748e5403e34efc83da5a6ff5b79122e40807">http://git.postgresql.org/pg/commitdiff/51fd748e5403e34efc83da5a6ff5b79122e40807</a></li>

<li>Prevent access to external files/URLs via XML entity references. xml_parse() would attempt to fetch external files or URLs as needed to resolve DTD and entity references in an XML value, thus allowing unprivileged database users to attempt to fetch data with the privileges of the database server. While the external data wouldn't get returned directly to the user, portions of it could be exposed in error messages if the data didn't parse as valid XML; and in any case the mere ability to check existence of a file might be useful to an attacker. The ideal solution to this would still allow fetching of references that are listed in the host system's XML catalogs, so that documents can be validated according to installed DTDs. However, doing that with the available libxml2 APIs appears complex and error-prone, so we're not going to risk it in a security patch that necessarily hasn't gotten wide review. So this patch merely shuts off all access, causing any external fetch to silently expand to an empty string. A future patch may improve this. In HEAD and 9.2, also suppress warnings about undefined entities, which would otherwise occur as a result of not loading referenced DTDs. Previous branches don't show such warnings anyway, due to different error handling arrangements. Credit to Noah Misch for first reporting the problem, and for much work towards a solution, though this simplistic approach was not his preference. Also thanks to Daniel Veillard for consultation. Security: CVE-2012-3489 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17351fce4e03f0e448f9332d4774b7d5615d1e48">http://git.postgresql.org/pg/commitdiff/17351fce4e03f0e448f9332d4774b7d5615d1e48</a></li>

<li>Prevent access to external files/URLs via contrib/xml2's xslt_process(). libxslt offers the ability to read and write both files and URLs through stylesheet commands, thus allowing unprivileged database users to both read and write data with the privileges of the database server. Disable that through proper use of libxslt's security options. Also, remove xslt_process()'s ability to fetch documents and stylesheets from external files/URLs. While this was a documented "feature", it was long regarded as a terrible idea. The fix for CVE-2012-3489 broke that capability, and rather than expend effort on trying to fix it, we're just going to summarily remove it. While the ability to write as well as read makes this security hole considerably worse than CVE-2012-3489, the problem is mitigated by the fact that xslt_process() is not available unless contrib/xml2 is installed, and the longstanding warnings about security risks from that should have discouraged prudent DBAs from installing it in security-exposed databases. Reported and fixed by Peter Eisentraut. Security: CVE-2012-3488 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/adc97d03b92fef50608c21059f0509fa97d314f6">http://git.postgresql.org/pg/commitdiff/adc97d03b92fef50608c21059f0509fa97d314f6</a></li>

<li>Update release notes for 9.1.5, 9.0.9, 8.4.13, 8.3.20. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e45ae401811e4fe07d2fc6ca8e44e9e38e0b3ba2">http://git.postgresql.org/pg/commitdiff/e45ae401811e4fe07d2fc6ca8e44e9e38e0b3ba2</a></li>

<li>Resurrect the "last ditch" code path in join_search_one_level(). This essentially reverts commit e54b10a62db2991235fe800c629baef4531a6d67, in which I'd decided that the "last ditch" join logic was useless. The folly of that is now exposed by a report from Pavel Stehule: although the function should always find at least one join in a self-contained join problem, it can still fail to do so in a sub-problem created by artificial from_collapse_limit or join_collapse_limit constraints. Adjust the comments to describe this, and simplify the code a bit to match the new coding of the earlier loop in the function. I'm not terribly happy about this: I still subscribe to the opinion stated in the previous commit message that the "last ditch" code can obscure logic bugs elsewhere. But the alternative seems to be to complicate the earlier tests for does-this-relation-have-a-join-clause to the point where they can tell whether the join clauses link outside the current join sub-problem. And that looks messy, slow, and possibly a source of bugs in itself. In any case, now is not the time to be inserting experimental code into 9.2, so let's just go back to the time-tested solution. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb919e8fde4333d4a627d349a1460b07fc52dd3b">http://git.postgresql.org/pg/commitdiff/eb919e8fde4333d4a627d349a1460b07fc52dd3b</a></li>

<li>Disallow extensions from owning the schema they are assigned to. This situation creates a dependency loop that confuses pg_dump and probably other things. Moreover, since the mental model is that the extension "contains" schemas it owns, but "is contained in" its extschema (even though neither is strictly true), having both true at once is confusing for people too. So prevent the situation from being set up. Reported and patched by Thom Brown. Back-patch to 9.1 where extensions were added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d642b59417d5d4a62d126ca12a80da45d2a3fbf">http://git.postgresql.org/pg/commitdiff/4d642b59417d5d4a62d126ca12a80da45d2a3fbf</a></li>

<li>Fix rescan logic in nodeCtescan. The previous coding essentially assumed that nodes would be rescanned in the same order they were initialized in; or at least that the "leader" of a group of CTEscans would be rescanned before any others were required to execute. Unfortunately, that isn't even a little bit true. It's possible to devise queries in which the leader isn't rescanned until other CTEscans on the same CTE have run to completion, or even in which the leader never gets a rescan call at all. The fix makes the leader specially responsible only for initial creation and final destruction of the tuplestore; rescan resets are now a symmetrically shared responsibility. This means that we might reset the tuplestore multiple times when restarting a plan subtree containing multiple CTEscans; but resetting an already-empty tuplestore is cheap enough that that doesn't seem like a problem. Per report from Adam Mackler; the new regression test cases are based on his example query. Back-patch to 8.4 where CTE scans were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c5316931f2ec6b47aa4b98e2c3ca704907aca24">http://git.postgresql.org/pg/commitdiff/4c5316931f2ec6b47aa4b98e2c3ca704907aca24</a></li>

<li>Suppress possibly-uninitialized-variable warning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56ba337e6fdff1e7ecb916f3037c666a30a98af0">http://git.postgresql.org/pg/commitdiff/56ba337e6fdff1e7ecb916f3037c666a30a98af0</a></li>

<li>Allow create_index_paths() to consider multiple join bitmapscan paths. In the initial cut at the "parameterized paths" feature, I'd simplified create_index_paths() to the point where it would only generate a single parameterized bitmap path per relation. Experimentation with an example supplied by Josh Berkus convinces me that that's not good enough: we really need to consider a bitmap path for each possible outer relation. Otherwise we have regressions relative to pre-9.2 versions, in which the planner picks a plain indexscan where it should have used a bitmap scan in queries involving three or more tables. Indeed, after fixing this, several queries in the regression tests show improved plans as a result of using bitmap not plain indexscans. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5983923d81d6327bdacf9d439a1536c4c8c4c15">http://git.postgresql.org/pg/commitdiff/f5983923d81d6327bdacf9d439a1536c4c8c4c15</a></li>

<li>Check LIBXML_VERSION instead of testing in configure script. We had put a test for libxml2's xmlStructuredErrorContext variable in configure, but of course that doesn't work on Windows builds. The next best alternative seems to be to test the LIBXML_VERSION symbol provided by xmlversion.h. Per report from Talha Bin Rizwan, though this fixes it in a different way than his proposed patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/470d0b9789981bc91a8ef2654911d80ab6a6be57">http://git.postgresql.org/pg/commitdiff/470d0b9789981bc91a8ef2654911d80ab6a6be57</a></li>

<li>Copy-editing for recent window-functions documentation rewrite. Fix grammar, put back some removed information, rearrange for clarity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18226849ea12c566fb2b3be505448e0ba289ea10">http://git.postgresql.org/pg/commitdiff/18226849ea12c566fb2b3be505448e0ba289ea10</a></li>

<li>Another round of planner fixes for LATERAL. Formerly, subquery pullup had no need to examine other entries in the range table, since they could not contain any references to the subquery being pulled up. That's no longer true with LATERAL, so now we need to be able to visit rangetable subexpressions to replace Vars referencing the pulled-up subquery. Also, this means that extract_lateral_references must be unsurprised at encountering lateral PlaceHolderVars, since such might be created when pulling up a subquery that's underneath an outer join with respect to the lateral reference. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/084a29c94f94b5a08aec9f68f3cfaf252f4fa17c">http://git.postgresql.org/pg/commitdiff/084a29c94f94b5a08aec9f68f3cfaf252f4fa17c</a></li>

<li>Make use of LATERAL in information_schema.sequences view. It said "XXX: The following could be improved if we had LATERAL" ... so let's do that. No catversion bump since either version of the view works fine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c246eb5aafe66d5537b468d6da2116c462775faf">http://git.postgresql.org/pg/commitdiff/c246eb5aafe66d5537b468d6da2116c462775faf</a></li>

<li>Allow OLD and NEW in multi-row VALUES within rules. Now that we have LATERAL, it's fairly painless to allow this case, which was left as a TODO in the original multi-row VALUES implementation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/092d7ded29f36b0539046b23b81b9f0bf2d637f1">http://git.postgresql.org/pg/commitdiff/092d7ded29f36b0539046b23b81b9f0bf2d637f1</a></li>

<li>Remove obsolete comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a91f885f11c561ae2a1209c7ebc52fadc85137fb">http://git.postgresql.org/pg/commitdiff/a91f885f11c561ae2a1209c7ebc52fadc85137fb</a></li>

<li>Fix typo in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b2a237cee800ca11fb0415cc5484a46a8c1770d">http://git.postgresql.org/pg/commitdiff/9b2a237cee800ca11fb0415cc5484a46a8c1770d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In documentation, change "recommendable" to "recommended", per consultation with word definitions. Backpatch to 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d96cf94049d8df2197d040a395fb46926ea9f2a">http://git.postgresql.org/pg/commitdiff/1d96cf94049d8df2197d040a395fb46926ea9f2a</a></li>

<li>Add pg_settings units display for "commit_delay" (ms). Also remove unnecessary units designation in postgresql.conf.sample. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e74727440c4d3df443dbd3d0a2201751883316ce">http://git.postgresql.org/pg/commitdiff/e74727440c4d3df443dbd3d0a2201751883316ce</a></li>

<li>Add doc example of restricting large object trigger firing to only updates of the column of interest. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e84cccff28e52ab76aa3d3e88bd815dc36d24d8">http://git.postgresql.org/pg/commitdiff/9e84cccff28e52ab76aa3d3e88bd815dc36d24d8</a></li>

<li>Add more limited large object trigger example. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/864de654c8271ab7f9fb8397fcc665ffed93645c">http://git.postgresql.org/pg/commitdiff/864de654c8271ab7f9fb8397fcc665ffed93645c</a></li>

<li>Revert "commit_delay" change; just add comment that we don't have a microsecond specification. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/03bda4535ee119d3dae7226faebed089925ace7e">http://git.postgresql.org/pg/commitdiff/03bda4535ee119d3dae7226faebed089925ace7e</a></li>

<li>Properly escape usernames in initdb, so names with single-quotes are supported. Also add assert to catch future breakage. Also, improve documentation that "double"-quotes must be used in pg_hba.conf (not single quotes). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a973296598f2d1eec48138a2ce4f3e63410d9ed0">http://git.postgresql.org/pg/commitdiff/a973296598f2d1eec48138a2ce4f3e63410d9ed0</a></li>

<li>Document that foreign "version" and "type" values are only useful to certain foreign data wrappers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc5f20057f8666107f37d0c97fd6614054e72edc">http://git.postgresql.org/pg/commitdiff/fc5f20057f8666107f37d0c97fd6614054e72edc</a></li>

<li>Add C comment that '=' is not documented for plpgsql assignment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d9a6ae8555da4a7de0046c61264748602ff6086">http://git.postgresql.org/pg/commitdiff/1d9a6ae8555da4a7de0046c61264748602ff6086</a></li>

<li>Document why you can't use date_trunc("week") on intervals. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74f4881d7cc9c69cb0e0b236f06d1ebf9859a737">http://git.postgresql.org/pg/commitdiff/74f4881d7cc9c69cb0e0b236f06d1ebf9859a737</a></li>

<li>On second thought, explain why date_trunc("week") on interval values is not supported in the error message, rather than the docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/083b9133aa0e5e91d74ba46b530a74989223324d">http://git.postgresql.org/pg/commitdiff/083b9133aa0e5e91d74ba46b530a74989223324d</a></li>

<li>In psql, if the is no connection object, e.g. due to a server crash, require all parameters for \c, rather than using the defaults, which might be wrong. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe21fcaf8d91a71c15ff25276f9fa81e0cd1dba9">http://git.postgresql.org/pg/commitdiff/fe21fcaf8d91a71c15ff25276f9fa81e0cd1dba9</a></li>

<li>Update C comment to NOTICE to reflect previous commit changing the error level, per report from Tom. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41fa3dfb0a266d424fa5d87962cf7a543fe421e2">http://git.postgresql.org/pg/commitdiff/41fa3dfb0a266d424fa5d87962cf7a543fe421e2</a></li>

<li>Add C comment about new \c parameter requirement for crashed connections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d55f1b852d4fe87f2a4d16ea3f0ce11a7019a352">http://git.postgresql.org/pg/commitdiff/d55f1b852d4fe87f2a4d16ea3f0ce11a7019a352</a></li>

<li>Properly document that NEW is unassigned in plpgsql for DELETE (not NULL), and OLD is unassigned for INSERT, and NEW/OLD are unassigned (not NULL) for statement-level triggers. Per report from Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0729271adf9145900f59ec7a2053695bd551f4b1">http://git.postgresql.org/pg/commitdiff/0729271adf9145900f59ec7a2053695bd551f4b1</a></li>

<li>Add CREATE FOREIGN TABLE doc reference to CREATE SERVER. Per suggestion from Ray Stell 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16d508ccbc6f228c8c38dffbe9d295ac449c809b">http://git.postgresql.org/pg/commitdiff/16d508ccbc6f228c8c38dffbe9d295ac449c809b</a></li>

<li>Document that pg_ctl -w allows for the entry of an SSL passphase on startup. Per report from Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ff55ebe3dc790ebd80f9a26fa3d05867aee728e">http://git.postgresql.org/pg/commitdiff/6ff55ebe3dc790ebd80f9a26fa3d05867aee728e</a></li>

<li>Document that PGDATA has to point to the configuration files, rather than the actual data storage directory. Per suggestion from Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/077908aed726b0e1605ed27156d7ebcf93a64d5d">http://git.postgresql.org/pg/commitdiff/077908aed726b0e1605ed27156d7ebcf93a64d5d</a></li>

<li>Fix SGML markup; missing tag. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de3773d951bfc85d8860295248cf91db524a4ef8">http://git.postgresql.org/pg/commitdiff/de3773d951bfc85d8860295248cf91db524a4ef8</a></li>

<li>Revert: In docs, change a few cases of "not important" to "unimportant". Per request from Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c1b2f5daa678b94861ab29ccc0252e4f2eb40ff">http://git.postgresql.org/pg/commitdiff/5c1b2f5daa678b94861ab29ccc0252e4f2eb40ff</a></li>

<li>In docs, clarify that, without ORDER BY, the window frame is all rows in the partition. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6ce4c13229c64c01393c86be220b532a0244d87">http://git.postgresql.org/pg/commitdiff/c6ce4c13229c64c01393c86be220b532a0244d87</a></li>

<li>In docs, change a few cases of "not important" to "unimportant". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c97f6a0cb1692180699694c287c2a5965d10683">http://git.postgresql.org/pg/commitdiff/7c97f6a0cb1692180699694c287c2a5965d10683</a></li>

<li>Add possible alternate tool for pgrminclude, from Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c04b9c1f3df93746661925dc09fb68ce026520c4">http://git.postgresql.org/pg/commitdiff/c04b9c1f3df93746661925dc09fb68ce026520c4</a></li>

<li>Rewrite window function reference section to more clearly explain keywords and concepts, based on suggestions by Florian Pflug. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5816d11af6334e94132bc73939d7c12b3cff792">http://git.postgresql.org/pg/commitdiff/d5816d11af6334e94132bc73939d7c12b3cff792</a></li>

<li>Add warning about pg_ctl restart and the use of relative paths on the command-line. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c99016f1d0ad122aaf9dca83b033277f97e55bd3">http://git.postgresql.org/pg/commitdiff/c99016f1d0ad122aaf9dca83b033277f97e55bd3</a></li>

<li>Document that tab completation can interfere with some SQL commands. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1037f2f646d7c018c8968336afe3584a8c6e654d">http://git.postgresql.org/pg/commitdiff/1037f2f646d7c018c8968336afe3584a8c6e654d</a></li>

<li>Add URL for include file visualization tool. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86d0d16f8ae4b5da4fd7330c09d5ddd7d88b62f4">http://git.postgresql.org/pg/commitdiff/86d0d16f8ae4b5da4fd7330c09d5ddd7d88b62f4</a></li>

<li>Delete inaccurate C comment about FSM and adding pages, per Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33259576563f74d6c34b2f9e3292a54c66e9fd47">http://git.postgresql.org/pg/commitdiff/33259576563f74d6c34b2f9e3292a54c66e9fd47</a></li>

<li>Update 'int' protocol documentation mention to be "signed", per request from Dmitriy Igrishin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/305557984dd964ac397c6752e9d0f14646b60f15">http://git.postgresql.org/pg/commitdiff/305557984dd964ac397c6752e9d0f14646b60f15</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Craig Ringer sent in another revision of the patch to add a value_to_json for single-datum.</li>

<li>Dean Rasheed sent in another WIP revision of the patch to make views update-able in the cases where that makes sense.</li>

<li>Pavel Stehule sent in two revisions of a patch to implement shared "status" variables.</li>

<li>KaiGai Kohei sent in another revision of the patch to refactor ALTER into a single consistent framework.</li>

<li>Kevin Grittner sent in three revisions of a patch to fix SERIALIZABLE isolation mode on Windows.</li>

<li>Etsuro Fujita sent in two revisions of a patch to fix an issue with relative file placements for COPY, the first changing the behavior, the second leaving the extant behavior in place and documenting same.</li>

<li>Pavel Stehule sent in another revision of the patch to enable COPY to show the number of rows processed.</li>

<li>Peter Geoghegan sent in another revision of the patch to add grow_memtuples for sorts.</li>

<li>Peter Eisentraut sent in a patch to unlink the pid file on postmaster exit.</li>

<li>Bruce Momjian sent in a patch to adjust how psql handles quoting of its own variables when interacting with the shell.</li>

<li>Fabr&iacute;zio de Royes Mello sent in five revisions of a patch to add CREATE SCHEMA IF NOT EXISTS.</li>

<li>Bruce Momjian sent in a patch to change call sites in psql call the error reporting function rather than decide willy-nilly whether to send the output to stdout.</li>

<li>Alvaro Herrera sent in another revision of the patch to add foreign key locks.</li>

<li>Jeff Janes sent in two revisions of a patch to add tab completion to CLUSTER VERBOSE in psql.</li>

<li>Alexander Korotkov sent in a separate patch to add adjacent support for SP-GiST indexes in the case of range types.</li>

<li>Phil Sorber sent in a patch which enables users to control the display of boolean values in psql.</li>

<li>Tom Lane sent in a patch to adjust the behavior of rewrite rules in the case of WITH and LATERAL.</li>

<li>Jeff Janes sent in a patch to fix tab completion for DROP CONSTRAINT in psql.</li>

<li>Craig Ringer sent in a doc patch to clarify that not everything in PostgreSQL is controlled under MVCC.</li>

</ul>