---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 février 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/02/23/Nouvelles-hebdomadaires-de-PostgreSQL-23-février-2014"
---


<p>Les versions correctives&nbsp; 9.3.3, 9.2.7, 9.1.12, 9.0.16 et 8.4.20 sont disponibles. Mettez &agrave; jour d&egrave;s que possible&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/news/1506/">http://www.postgresql.org/about/news/1506/</a> [ndt: <a href="http://blog.postgresql.fr/index.php?post/2014/02/20/Sortie-des-versions-correctives-9.3.3%2C-9.2.7%2C-9.1.12%2C-9.0.16-et-8.4.20">version fran&ccedil;aise</a>]</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>La nouvelle version de pgXplorer, une interface graphique pour PostgreSQL (compatible 8.4+), a &eacute;t&eacute; publi&eacute;e. Le code est lib&eacute;r&eacute; sous licence IRC et peut &ecirc;tre trouv&eacute;e sur Github&nbsp;: 

<a target="_blank" href="https://github.com/davyjones/pgXplorer">https://github.com/davyjones/pgXplorer</a></li>

<li>pitrery 1.6 un ensemble de scripts bash pour PostgreSQL permettant de g&eacute;rer les points de sauvegarde PITR&nbsp;: 

<a target="_blank" href="http://dalibo.github.io/pitrery/">http://dalibo.github.io/pitrery/</a></li>

<li>psqlODBC 09.03.0200&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/ftp/odbc/versions/">http://www.postgresql.org/ftp/odbc/versions/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay Nordique 2014 aura lieu &agrave; Stockholm (Su&egrave;de) &agrave; l'h&ocirc;tel Hilton le 20 mars 2014&nbsp;: 

<a target="_blank" href="http://2014.nordicpgday.org/">http://2014.nordicpgday.org/</a></li>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140224052438.GA20587@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve documentation about multixact IDs. Per gripe from Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7f409756dac9fedc12d5aece0f8df5efb8d9e01">http://git.postgresql.org/pg/commitdiff/e7f409756dac9fedc12d5aece0f8df5efb8d9e01</a></li>

<li>Remove broken code that tried to handle OVERLAPS with a single argument. The SQL standard says that OVERLAPS should have a two-element row constructor on each side. The original coding of OVERLAPS support in our grammar attempted to extend that by allowing a single-element row constructor, which it internally duplicated ... or tried to, anyway. But that code has certainly not worked since our List infrastructure was rewritten in 2004, and I'm none too sure it worked before that. As it stands, it ends up building a List that includes itself, leading to assorted undesirable behaviors later in the parser. Even if it worked as intended, it'd be a bit evil because of the possibility of duplicate evaluation of a volatile function that the user had written only once. Given the lack of documentation, test cases, or complaints, let's just get rid of the idea and only support the standard syntax. While we're at it, improve the error cursor positioning for the wrong-number-of-arguments errors, and inline the makeOverlaps() function since it's only called in one place anyway. Per bug #9227 from Joshua Yanovski. Initial patch by Joshua Yanovski, extended a bit by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a222f7fda6a04ab8ec655cd5a9de5ff70ff916c3">http://git.postgresql.org/pg/commitdiff/a222f7fda6a04ab8ec655cd5a9de5ff70ff916c3</a></li>

<li>Fix some missing .gitignore and "make clean" items in ecpg. Some of the files we optionally link in from elsewhere weren't ignored and/or weren't cleaned up at "make clean". Noted while testing on a machine that needs our version of snprintf.c. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52acfd27f11ca586f90c2c1255ca9a4a66766b57">http://git.postgresql.org/pg/commitdiff/52acfd27f11ca586f90c2c1255ca9a4a66766b57</a></li>

<li>Avoid using dllwrap to build pgevent in Mingw builds. If this works, we can get rid of configure's support for locating dllwrap ... but let's see what the buildfarm says, first. Hiroshi Inoue 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f5f485d10cad372a3a0cd8dd70780f1a32f43f0">http://git.postgresql.org/pg/commitdiff/4f5f485d10cad372a3a0cd8dd70780f1a32f43f0</a></li>

<li>Remove inappropriate EXPORTS line. Looks like this gets added later ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae5266f25910d6e084692a7cdbd02b9e52800046">http://git.postgresql.org/pg/commitdiff/ae5266f25910d6e084692a7cdbd02b9e52800046</a></li>

<li>Prevent potential overruns of fixed-size buffers. Coverity identified a number of places in which it couldn't prove that a string being copied into a fixed-size buffer would fit. We believe that most, perhaps all of these are in fact safe, or are copying data that is coming from a trusted source so that any overrun is not really a security issue. Nonetheless it seems prudent to forestall any risk by using strlcpy() and similar functions. Fixes by Peter Eisentraut and Jozef Mlich based on Coverity reports. In addition, fix a potential null-pointer-dereference crash in contrib/chkpass. The crypt(3) function is defined to return NULL on failure, but chkpass.c didn't check for that before using the result. The main practical case in which this could be an issue is if libc is configured to refuse to execute unapproved hashing algorithms (e.g., "FIPS mode"). This ideally should've been a separate commit, but since it touches code adjacent to one of the buffer overrun changes, I included it in this commit to avoid last-minute merge issues. This issue was reported by Honza Horak. Security: CVE-2014-0065 for buffer overruns, CVE-2014-0066 for crypt() 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01824385aead50e557ca1af28640460fa9877d51">http://git.postgresql.org/pg/commitdiff/01824385aead50e557ca1af28640460fa9877d51</a></li>

<li>Document risks of "make check" in the regression testing instructions. Since the temporary server started by "make check" uses "trust" authentication, another user on the same machine could connect to it as database superuser, and then potentially exploit the privileges of the operating-system user who started the tests. We should change the testing procedures to prevent this risk; but discussion is required about the best way to do that, as well as more testing than is practical for an undisclosed security problem. Besides, the same issue probably affects some user-written test harnesses. So for the moment, we'll just warn people against using "make check" when there are untrusted users on the same machine. In passing, remove some ancient advice that suggested making the regression testing subtree world-writable if you'd built as root. That looks dangerously insecure in modern contexts, and anyway we should not be encouraging people to build Postgres as root. Security: CVE-2014-0067 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ef325429cad60d7d24504fa25b5318fd4e35379">http://git.postgresql.org/pg/commitdiff/6ef325429cad60d7d24504fa25b5318fd4e35379</a></li>

<li>Last-minute updates for release notes. Add entries for security issues. Security: CVE-2014-0060 through CVE-2014-0067 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b1fab3fd2e17063fb1ec98e8ff5512a6b3da9b6">http://git.postgresql.org/pg/commitdiff/7b1fab3fd2e17063fb1ec98e8ff5512a6b3da9b6</a></li>

<li>Do ScalarArrayOp estimation correctly when array is a stable expression. Most estimation functions apply estimate_expression_value to see if they can reduce an expression to a constant; the key difference is that it allows evaluation of stable as well as immutable functions in hopes of ending up with a simple Const node. scalararraysel didn't get the memo though, and neither did gincost_opexpr/gincost_scalararrayopexpr. Fix that, and remove a now-unnecessary estimate_expression_value step in the subsidiary function scalararraysel_containment. Per complaint from Alexey Klyukin. Back-patch to 9.3. The problem goes back further, but I'm hesitant to change estimation behavior in long-stable release branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77585bce03042e8fee62d8df0dde9c008a904699">http://git.postgresql.org/pg/commitdiff/77585bce03042e8fee62d8df0dde9c008a904699</a></li>

<li>Plug some more holes in encoding conversion. Various places assume that pg_do_encoding_conversion() and pg_server_to_any() will ensure encoding validity of their results; but they failed to do so in the case that the source encoding is SQL_ASCII while the destination is not. We cannot perform any actual "conversion" in that scenario, but we should still validate the string according to the destination encoding. Per bug #9210 from Digoal Zhou. Arguably this is a back-patchable bug fix, but on the other hand adding more enforcing of encoding checks might break existing applications that were being sloppy. On balance there doesn't seem to be much enthusiasm for a back-patch, so fix in HEAD only. While at it, remove some apparently-no-longer-needed provisions for letting pg_do_encoding_conversion() "work" outside a transaction --- if you consider it "working" to silently fail to do the requested conversion. Also, make a few cosmetic improvements in mbutils.c, notably removing some Asserts that are certainly dead code since the variables they assert aren't null are never null, even at process start. (I think this wasn't true at one time, but it is now.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/49c817eab78c6f0ce8c3bf46766b73d6cf3190b7">http://git.postgresql.org/pg/commitdiff/49c817eab78c6f0ce8c3bf46766b73d6cf3190b7</a></li>

<li>Prefer pg_any_to_server/pg_server_to_any over pg_do_encoding_conversion. A large majority of the callers of pg_do_encoding_conversion were specifying the database encoding as either source or target of the conversion, meaning that we can use the less general functions pg_any_to_server/pg_server_to_any instead. The main advantage of using the latter functions is that they can make use of a cached conversion-function lookup in the common case that the other encoding is the current client_encoding. It's notationally cleaner too in most cases, not least because of the historical artifact that the latter functions use "char *" rather than "unsigned char *" in their APIs. Note that pg_any_to_server will apply an encoding verification step in some cases where pg_do_encoding_conversion would have just done nothing. This seems to me to be a good idea at most of these call sites, though it partially negates the performance benefit. Per discussion of bug #9210. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/769065c1b2471f484bb48bb58a8bdcf1d12a419c">http://git.postgresql.org/pg/commitdiff/769065c1b2471f484bb48bb58a8bdcf1d12a419c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix capitalization in README. Vik Fearing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/876f78d57566a60e443d40f7c789c36566749e2f">http://git.postgresql.org/pg/commitdiff/876f78d57566a60e443d40f7c789c36566749e2f</a></li>

<li>Add a pg_lsn data type, to represent an LSN. Robert Haas and Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d03a83f4d0736ba869fa6f93973f7623a27038a">http://git.postgresql.org/pg/commitdiff/7d03a83f4d0736ba869fa6f93973f7623a27038a</a></li>

<li>pg_lsn macro naming and type behavior revisions. Change pg_lsn_mi so that it can return negative values when subtracting LSNs, and clean up some perhaps ill-considered macro names. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/844a28a9dd1a48045ad1db9246da5e2783c9bd40">http://git.postgresql.org/pg/commitdiff/844a28a9dd1a48045ad1db9246da5e2783c9bd40</a></li>

<li>Switch various builtin functions to use pg_lsn instead of text. The functions in slotfuncs.c don't exist in any released version, but the changes to xlogfuncs.c represent backward-incompatibilities. Per discussion, we're hoping that the queries using these functions are few enough and simple enough that this won't cause too much breakage for users. Michael Paquier, reviewed by Andres Freund and further modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f289c2b7d00f07f13f679092f7c71f78950e9da">http://git.postgresql.org/pg/commitdiff/6f289c2b7d00f07f13f679092f7c71f78950e9da</a></li>

<li>Document pg_replslot in storage.sgml. Per an observation from Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b3cf9ba9d3d12ad95c0a06cef04f9097a9c65cf">http://git.postgresql.org/pg/commitdiff/7b3cf9ba9d3d12ad95c0a06cef04f9097a9c65cf</a></li>

<li>Further code review for pg_lsn data type. Change input function error messages to be more consistent with what is done elsewhere. Remove a bunch of redundant type casts, so that the compiler will warn us if we screw up. Don't pass LSNs by value on platforms where a Datum is only 32 bytes, per buildfarm. Move macros for packing and unpacking LSNs to pg_lsn.h so that we can include access/xlogdefs.h, to avoid an unsatisfied dependency on XLogRecPtr. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/694e3d139a9d090c58494428bebfadad216419da">http://git.postgresql.org/pg/commitdiff/694e3d139a9d090c58494428bebfadad216419da</a></li>

<li>Avoid repeated name lookups during table and index DDL. If the name lookups come to different conclusions due to concurrent activity, we might perform some parts of the DDL on a different table than other parts. At least in the case of CREATE INDEX, this can be used to cause the permissions checks to be performed against a different table than the index creation, allowing for a privilege escalation attack. This changes the calling convention for DefineIndex, CreateTrigger, transformIndexStmt, transformAlterTableStmt, CheckIndexCompatible (in 9.2 and newer), and AlterTable (in 9.1 and older). In addition, CheckRelationOwnership is removed in 9.2 and newer and the calling convention is changed in older branches. A field has also been added to the Constraint node (FkConstraint in 8.4). Third-party code calling these functions or using the Constraint node will require updating. Report by Andres Freund. Patch by Robert Haas and Andres Freund, reviewed by Tom Lane. Security: CVE-2014-0062 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f173040e324f6c2eebb90d86cf1b0cdb5890f0a">http://git.postgresql.org/pg/commitdiff/5f173040e324f6c2eebb90d86cf1b0cdb5890f0a</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix comment; checkpointer, not bgwriter, performs checkpoints since 9.2. Amit Langote 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/057152b37c8dbbddf87de2be32314a3d4fec5d5e">http://git.postgresql.org/pg/commitdiff/057152b37c8dbbddf87de2be32314a3d4fec5d5e</a></li>

<li>Improve comment on setting data_checksum GUC. There was an extra space there, and "fixed" wasn't very descriptive. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8f09ca436dbeda5350a0864adeaa22f920692382">http://git.postgresql.org/pg/commitdiff/8f09ca436dbeda5350a0864adeaa22f920692382</a></li>

<li>Avoid integer overflow in hstore_to_json(). The length of the output buffer was calculated based on the size of the argument hstore. On a sizeof(int) == 4 platform and a huge argument, it could overflow, causing a too small buffer to be allocated. Refactor the function to use a StringInfo instead of pre-allocating the buffer. Makes it shorter and more readable, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c5783ff301ae3e470000c918bfc2395129de4c5">http://git.postgresql.org/pg/commitdiff/0c5783ff301ae3e470000c918bfc2395129de4c5</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Disable RandomizedBaseAddress on MSVC builds. The ASLR in Windows 8/Windows 2012 can break PostgreSQL's shared memory. It doesn't fail every time (which is explained by the Random part in ASLR), but can fail with errors abut failing to reserve shared memory region. MauMau, reviewed by Craig Ringer 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f3e17b4827b61ad84e0774e3e43da4c57c4487f">http://git.postgresql.org/pg/commitdiff/7f3e17b4827b61ad84e0774e3e43da4c57c4487f</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Clarify documentation page header customization code. The customization overrode the fast-forward code with its custom Up link. So this is no longer really the fast-forward feature, so we might as well turn that off and override the non-ff template instead, thus removing one mental indirection. Fix the wrong column span declaration. Clarify and update the documentation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c059dffd83384fa0c2fe6050429d601355bc3af">http://git.postgresql.org/pg/commitdiff/8c059dffd83384fa0c2fe6050429d601355bc3af</a></li>

<li>pg_basebackup: Add support for relocating tablespaces. Tablespaces can be relocated in plain backup mode by specifying one or more -T olddir=newdir options. Author: Steeve Lennmark &lt;steevel@handeldsbanken.se&gt; Reviewed-by: Peter Eisentraut &lt;peter_e@gmx.net&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb05f3ce83d225dd0f39f8860ce04082753e9e98">http://git.postgresql.org/pg/commitdiff/fb05f3ce83d225dd0f39f8860ce04082753e9e98</a></li>

<li>configure.in: Use dnl in place of # where appropriate. The comment added by ed011d9754fd4b76eac0eaa8c057fcfc0c302a6a used #, which means it gets copied into configure, but it doesn't make sense there. So use dnl, which gets dropped when creating configure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c65856b7b444a5e804d4f694438e7444811d26b">http://git.postgresql.org/pg/commitdiff/2c65856b7b444a5e804d4f694438e7444811d26b</a></li>

<li>doc: Improve DocBook XML validity. DocBook XML is superficially compatible with DocBook SGML but has a slightly stricter DTD that we have been violating in a few cases. Although XSLT doesn't care whether the document is valid, the style sheets don't necessarily process invalid documents correctly, so we need to work toward fixing this. This first commit moves the indexterms in refentry elements to an allowed position. It has no impact on the output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb4eefe7bf518e42c73797ea37b033a5d8a8e70a">http://git.postgresql.org/pg/commitdiff/bb4eefe7bf518e42c73797ea37b033a5d8a8e70a</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Prevent privilege escalation in explicit calls to PL validators. The primary role of PL validators is to be called implicitly during CREATE FUNCTION, but they are also normal functions that a user can call explicitly. Add a permissions check to each validator to ensure that a user cannot use explicit validator calls to achieve things he could not otherwise achieve. Back-patch to 8.4 (all supported versions). Non-core procedural language extensions ought to make the same two-line change to their own validators. Andres Freund, reviewed by Tom Lane and Noah Misch. Security: CVE-2014-0061 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/537cbd35c893e67a63c59bc636c3e888bd228bc7">http://git.postgresql.org/pg/commitdiff/537cbd35c893e67a63c59bc636c3e888bd228bc7</a></li>

<li>Shore up ADMIN OPTION restrictions. Granting a role without ADMIN OPTION is supposed to prevent the grantee from adding or removing members from the granted role. Issuing SET ROLE before the GRANT bypassed that, because the role itself had an implicit right to add or remove members. Plug that hole by recognizing that implicit right only when the session user matches the current role. Additionally, do not recognize it during a security-restricted operation or during execution of a SECURITY DEFINER function. The restriction on SECURITY DEFINER is not security-critical. However, it seems best for a user testing his own SECURITY DEFINER function to see the same behavior others will see. Back-patch to 8.4 (all supported versions). The SQL standards do not conflate roles and users as PostgreSQL does; only SQL roles have members, and only SQL users initiate sessions. An application using PostgreSQL users and roles as SQL users and roles will never attempt to grant membership in the role that is the session user, so the implicit right to add or remove members will never arise. The security impact was mostly that a role member could revoke access from others, contrary to the wishes of his own grantor. Unapproved role member additions are less notable, because the member can still largely achieve that by creating a view or a SECURITY DEFINER function. Reviewed by Andres Freund and Tom Lane. Reported, independently, by Jonas Sundman and Noah Misch. Security: CVE-2014-0060 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fea164a72a7bfd50d77ba5fb418d357f8f2bb7d0">http://git.postgresql.org/pg/commitdiff/fea164a72a7bfd50d77ba5fb418d357f8f2bb7d0</a></li>

<li>Fix handling of wide datetime input/output. Many server functions use the MAXDATELEN constant to size a buffer for parsing or displaying a datetime value. It was much too small for the longest possible interval output and slightly too small for certain valid timestamp input, particularly input with a long timezone name. The long input was rejected needlessly; the long output caused interval_out() to overrun its buffer. ECPG's pgtypes library has a copy of the vulnerable functions, which bore the same vulnerabilities along with some of its own. In contrast to the server, certain long inputs caused stack overflow rather than failing cleanly. Back-patch to 8.4 (all supported versions). Reported by Daniel Sch&uuml;ssler, reviewed by Tom Lane. Security: CVE-2014-0063 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4318daecc959886d001a6e79c6ea853e8b1dfb4b">http://git.postgresql.org/pg/commitdiff/4318daecc959886d001a6e79c6ea853e8b1dfb4b</a></li>

<li>Predict integer overflow to avoid buffer overruns. Several functions, mostly type input functions, calculated an allocation size such that the calculation wrapped to a small positive value when arguments implied a sufficiently-large requirement. Writes past the end of the inadvertent small allocation followed shortly thereafter. Coverity identified the path_in() vulnerability; code inspection led to the rest. In passing, add check_stack_depth() to prevent stack overflow in related functions. Back-patch to 8.4 (all supported versions). The non-comment hstore changes touch code that did not exist in 8.4, so that part stops at 9.0. Noah Misch and Heikki Linnakangas, reviewed by Tom Lane. Security: CVE-2014-0064 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31400a673325147e1205326008e32135a78b4d8a">http://git.postgresql.org/pg/commitdiff/31400a673325147e1205326008e32135a78b4d8a</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Emre Hasegeli sent in another revision of a patch to improve the display of wide tables in psql.</li>

<li>SAWADA Masahiko sent in a patch to fix an issue where pg_basebackup skips the pg_replslot directory.</li>

<li>Bruce Momjian sent in a patch to update the defaults for work_mem and maintenance_work_mem to post-1990s server specifications.</li>

<li>Etsuro Fujita sent in a patch to fix an issue where create_foreignscan_path() does not set the rowcounts based on ParamPathInfo when the path is a parameterized path.</li>

<li>Heikki Linnakangas sent in two more revisions of a patch to fix a memory ordering issue in LWLockRelease, WakeupWaiters, and WALInsertSlotRelease.</li>

<li>Mitsumasa KONDO and Fabien COELHO traded patches to create an option for pgbench to use a Guassian distribution.</li>

<li>Emre Hasegeli sent in two more revisions of a patch to add GiST indexing support for inet types.</li>

<li>Pavel Stehule sent in another revision of a patch to add an --if-exists option for pg_dump.</li>

<li>Alvaro Herrera and Pavel Stehule traded patches to implement a new make_timestamp() function.</li>

<li>Florian Pflug sent in two more revisions of a patch to implement inverse transition functions for aggregates.</li>

<li>Hiroshi Inoue sent in a patch to simplify and correct linking to Perl on Mingw.</li>

<li>Michael Paquier sent in a patch to quiet a compiler warning which whas recently introduced into pg_backup_archiver.c.</li>

<li>Kaigai Kouhei sent in two more revisions of a patch to implement custom scan nodes and use same.</li>

<li>Rajeev Rastogi sent in two more revisions of a patch to fix an issue where the PostgreSQL Service on Windows does not start if data directory given is relative path.</li>

<li>Ronan Dunklau sent in a patch to implement IMPORT FOREIGN SCHEMA.</li>

<li>Christian Kruse sent in three more revisions of a patch to show xid and xmin in pg_stat_activity and pg_stat_replication.</li>

<li>Tomas Vondra sent in a patch to fix an issue where pgstat_recv_dropdb(), instead of building path to the temporary file in pg_stat_tmp, builds a path to the permanent file in pg_stat.</li>

<li>Christian Kruse sent in another revision of a patch to show relation and tuple information of a lock to acquire.</li>

<li>Michael Paquier sent in a patch to update the pageinspect extension so it can see page_header with pg_lsn datatype.</li>

<li>Rukh Meski sent in a patch to implement UPDATE/DELETE ... ORDER BY ... LIMIT ...</li>

</ul>