---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 octobre 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/10/15/Nouvelles-hebdomadaires-de-PostgreSQL-10-octobre-2010"
---


<p>La date limite de l'appel &agrave; conf&eacute;renciers pour la <em>MySQL Conf</em> est le 25 octobre. Mail &agrave; Selena Deckelman (selenamarie &lt;AT&gt; gmail &lt;DOT&gt; com) pour un retour, une conseil &agrave; la candidature, ou une aide pour trouver des id&eacute;es&nbsp;: 

<a target="_blank" href="http://en.oreilly.com/mysql2011/public/cfp/126">http://en.oreilly.com/mysql2011/public/cfp/126</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Another PostgreSQL Diff Tool 2.2.2, un outil de comparaison de base de donn&eacute;es&nbsp;: 

<a target="_blank" href="http://apgdiff.startnet.biz/">http://apgdiff.startnet.biz/</a></li>

<li>Slony-I 2.0.5, un syst&egrave;me de r&eacute;plication "ma&icirc;tre vers esclaves en cascade" pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Michael Renner parlera de r&eacute;plication de base de donn&eacute;es avec PostgreSQL 9.0 le 12 octobre au Metalab de Vienne (Autriche). Lien et infos. (de_AT)&nbsp;: 

<a target="_blank" href="http://metalab.at/wiki/PostgreSQL_repliziert_9.0">http://metalab.at/wiki/PostgreSQL_repliziert_9.0</a></li>

<li>PgDay.IT 2010 aura lieu &agrave; Rome le 10 d&eacute;cembre de cette ann&eacute;e. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.pgday.it/">http://www.pgday.it/</a></li>

<li>Les inscriptions sp&eacute;ciales "l&egrave;ve-t&ocirc;t" pour la JDCon West 2010 [ndt: 2-4 nov.] sont ouvertes&nbsp;: 

<a target="_blank" href="https://www.postgresqlconference.org/content/pgwest-2010-registration">https://www.postgresqlconference.org/content/pgwest-2010-registration</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PGDay.EU 2010, tenu du 6 au 8 d&eacute;cembre &agrave; Stuttgart (All.), est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2010.pgday.eu/callforpapers">http://2010.pgday.eu/callforpapers</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20101010">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<ul>

<li>ITAGAKI Takahiro reviewed the patch to fix some access control leaks in views.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Undo some poorly-thought-out "proofreading improvements". Per Tatsuhito Kasahara. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d79a1a138e5dc9bc190b907e754268e819678a2a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d79a1a138e5dc9bc190b907e754268e819678a2a</a></li>

<li>Use a separate interpreter for each calling SQL userid in plperl and pltcl. There are numerous methods by which a Perl or Tcl function can subvert the behavior of another such function executed later; for example, by redefining standard functions or operators called by the target function. If the target function is SECURITY DEFINER, or is called by such a function, this means that any ordinary SQL user with Perl or Tcl language usage rights can do essentially anything with the privileges of the target function's owner. To close this security hole, create a separate Perl or Tcl interpreter for each SQL userid under which plperl or pltcl functions are executed within a session. However, all plperlu or pltclu functions run within a session still share a single interpreter, since they all execute at the trust level of a database superuser anyway. Note: this change results in a functionality loss when libperl has been built without the "multiplicity" option: it's no longer possible to call plperl functions under different userids in one session, since such a libperl can't support multiple interpreters in one process. However, such a libperl already failed to support concurrent use of plperl and plperlu, so it's likely that few people use such versions with Postgres. Security: CVE-2010-3433 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=50595b5fce2e15b5ef26b057799b4a4cdd1c10e8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=50595b5fce2e15b5ef26b057799b4a4cdd1c10e8</a></li>

<li>Reduce the memory requirement for large ispell dictionaries. This patch eliminates per-chunk palloc overhead for most small allocations needed in the representation of an ispell dictionary. This saves close to a factor of 2 on the current Czech ispell data. While it doesn't cover every last small allocation in the ispell code, we are at the point of diminishing returns, because about 95% of the allocations are covered already. Pavel Stehule, rather heavily revised by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3e5f9412d0a818be77c974e5af710928097b91f3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3e5f9412d0a818be77c974e5af710928097b91f3</a></li>

<li>Clean up temporary-memory management during ispell dictionary loading. Add explicit initialization and cleanup functions to spell.c, and keep all working state in the already-existing ISpellDict struct. This lets us get rid of a static variable along with some extremely shaky assumptions about usage of child memory contexts. This commit is just code beautification and has no impact on functionality or performance, but it opens the way to a less-grotty implementation of Pavel Stehule's memory-saving hack, which will follow shortly. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b910def24e85c1c4ff993eae0fe511271fc8682">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9b910def24e85c1c4ff993eae0fe511271fc8682</a></li>

<li>Teach CLUSTER to use seqscan-and-sort when it's faster than indexscan. ... or at least, when the planner's cost estimates say it will be faster. Leonardo Francalanci, reviewed by Itagaki Takahiro and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3ba11d3df2115b04171a8eda8e0389e02578d8d0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3ba11d3df2115b04171a8eda8e0389e02578d8d0</a></li>

<li>Eliminate some repetitive coding in tuplesort.c. Use a macro LogicalTapeReadExact() to encapsulate the error check when we want to read an exact number of bytes from a "tape". Per a suggestion of Takahiro Itagaki. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=26a7b48e10bea67be719f5bb88cbaa8d4ec1c9b3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=26a7b48e10bea67be719f5bb88cbaa8d4ec1c9b3</a></li>

<li>Improve logging in VACUUM FULL VERBOSE and CLUSTER VERBOSE. This patch resurrects some of the information that could be logged by the old, now-dead implementation of VACUUM FULL, in particular counts of live and dead tuples and the time taken for the table rebuild proper. There's still no logging about the ensuing index rebuilds, though. Itagaki Takahiro. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9cc8c84e738737baed4b7edeaaa2bee35ad38847">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9cc8c84e738737baed4b7edeaaa2bee35ad38847</a></li>

<li>Fix sloppy usage of TRIGGER_FIRED_BEFORE/TRIGGER_FIRED_AFTER. Various places were testing TRIGGER_FIRED_BEFORE() where what they really meant was !TRIGGER_FIRED_AFTER(), or vice versa. This needs to be cleaned up because there are about to be more than two possible states. We might want to note this in the 9.1 release notes as something for trigger authors to double-check. For consistency's sake I also changed some places that assumed that TRIGGER_FIRED_FOR_ROW and TRIGGER_FIRED_FOR_STATEMENT are necessarily mutually exclusive; that's not in immediate danger of breaking, but it's still sloppier than it should be. Extracted from Dean Rasheed's patch for triggers on views. I'm committing this separately since it's an identifiable separate issue, and is the only reason for the patch to touch most of these particular files. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=caaf2e84698940c093e6cf6203014883e4fb18c5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=caaf2e84698940c093e6cf6203014883e4fb18c5</a></li>

<li>Support triggers on views. This patch adds the SQL-standard concept of an INSTEAD OF trigger, which is fired instead of performing a physical insert/update/delete. The trigger function is passed the entire old and/or new rows of the view, and must figure out what to do to the underlying tables to implement the update. So this feature can be used to implement updatable views using trigger programming style rather than rule hacking. In passing, this patch corrects the names of some columns in the information_schema.triggers view. It seems the SQL committee renamed them somewhere between SQL:99 and SQL:2003. Dean Rasheed, reviewed by Bernd Helmle; some additional hacking by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2ec993a7cbdd8e251817ac6bbc9a704ce8346f73">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2ec993a7cbdd8e251817ac6bbc9a704ce8346f73</a></li>

<li>Teach psql to do tab completion for names of psql variables. Completion is supported in the context of \set and when interpolating a variable value using :foo etc. In passing, fix some places in tab-complete.c that weren't following project style for comment formatting. Pavel Stehule, reviewed by Itagaki Takahiro. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b48b9cb3a46d80401b122fd10780e8c623983a26">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b48b9cb3a46d80401b122fd10780e8c623983a26</a></li>

<li>Improve the planner's simplification of NOT constructs. This patch merges the responsibility for NOT-flattening into eval_const_expressions' processing. It wasn't done that way originally because prepqual.c is far older than eval_const_expressions. But putting this work into eval_const_expressions saves one pass over the qual trees, and in fact saves even more than that because we can exploit the knowledge that the subexpressions have already been recursively simplified. Doing it this way also lets us do it uniformly over all expressions, whereas prepqual.c formerly just did it at top level to save cycles. That should improve the planner's ability to recognize logically-equivalent constructs. While at it, also add the ability to fold a NOT into BooleanTest and NullTest constructs (the latter only for the scalar-datatype case). Per discussion of bug #5702. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=220e45bf325b061b8dbd7451f87cedc07da61706">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=220e45bf325b061b8dbd7451f87cedc07da61706</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct docs for behaviour of ALTER DATABASE .. RENAME during Hot Standby. Actual behaviour did not match documented behaviour and we have agreed that it should be the docs that change. Spotted by Bernd Helmle. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bdf45797abe53a9e2bebd54e5475591e468a0ad1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bdf45797abe53a9e2bebd54e5475591e468a0ad1</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve WAL reliability documentation, and add more cross-references to it. In particular, we are now more explicit about the fact that you may need wal_sync_method=fsync_writethrough for crash-safety on some platforms, including MaxOS X. There's also now an explicit caution against assuming that the default setting of wal_sync_method is either crash-safe or best for performance. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=694c56af2b586551afda624901d6dec951b58027">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=694c56af2b586551afda624901d6dec951b58027</a></li>

<li>Warn that views can be safely used to hide columns, but not rows. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56ccff59806793198020a6a3d154bbce6dfb7a06">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56ccff59806793198020a6a3d154bbce6dfb7a06</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Single-word clarification in postgresql.conf log_truncate_on_rotation comment. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f7dbddac69d01fb27484ad27c1d042f36f55ea12">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f7dbddac69d01fb27484ad27c1d042f36f55ea12</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Extensive ECPG documentation improvements. Satoshi Nagayasu, reviewed and revised by Peter Eisentraut. Since this introduces new refentries that we probably don't want to publish as man pages, tweak man page stylesheet to omit man pages without manvolnum element. Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f7b15b5098ee89a2628129fbbef9901bded9d27b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f7b15b5098ee89a2628129fbbef9901bded9d27b</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dean Rasheed sent in three revsisions of a patch to implement median and percentile aggregates.</li>

<li>Marko (johto) Tiikkaja sent in two revisions of a patch to fix snapshot-taking inconsistencies, in the process deprecating pg_parse_and_rewrite.</li>

<li>KaiGai Kohei sent in a patch to fix some of the access control leaks in views, and Robert Haas sent in two revisions of a patch documenting same.</li>

<li>Marko (johto) Tiikkaja and Hitoshi Harada traded patches to allow top-level DML (INSERT, UPDATE, DELETE) in CTEs.</li>

<li>Bernd Helmle sent in another revision of the patch to extend NOT NULL constraints.</li>

<li>Alexander Korotkov sent in two more revisions of the patch to improve the Levenshtein functions to work with multi-byte character sets.</li>

<li>Craig Ringer sent in two revisions of a patch to enable crash dumps on Windows. Crash dumps are a Windows-specific debugging feature.</li>

<li>Gurjeet Singh sent in two revisions of a patch to allow labeling an existing unique index, which could, for example, be created concurrently, as a primary key.</li>

<li>Simon Riggs sent in a WIP patch to implement synchronous replication with user-controlled durability specified on the master.</li>

</ul>