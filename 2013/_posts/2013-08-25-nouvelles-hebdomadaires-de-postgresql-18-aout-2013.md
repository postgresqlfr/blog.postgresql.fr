---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 août 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/08/25/Nouvelles-hebdomadaires-de-PostgreSQL-18-août-2013"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PostGIS 2.1.0, le syst&egrave;me d'information g&eacute;ographique de r&eacute;f&eacute;rence pour PostgreSQL, a &eacute;t&eacute; publi&eacute;&nbsp;: 

<a target="_blank" href="http://postgis.net/2013/08/17/postgis-2-1-0">http://postgis.net/2013/08/17/postgis-2-1-0</a></li>

<li>Publication du livre "PostgreSQL Server Programming"&nbsp;: 

<a target="_blank" href="http://www.2ndquadrant.com/en/books/">http://www.2ndquadrant.com/en/books/</a></li>

<li>Skytools 3.1.5, un ensemble d'outils d&eacute;velopp&eacute; par Skype pour la r&eacute;plication et le failover incluant PgQ, un framework g&eacute;n&eacute;rique de mise en queue, et Londiste, un syst&egrave;me de r&eacute;plication ma&icirc;tre-esclave&nbsp;: 

<a target="_blank" href="https://github.com/markokr/skytools">https://github.com/markokr/skytools</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130819034100.GD24387@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_dump: avoid schema qualification for ALTER ... OWNER. We already use search_path to specify the schema, so there is no need for pg_dump to schema-qualify the name. Also remove dead code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/808f8f5d6da5c79ed10bbe9f721215279a81d1eb">http://git.postgresql.org/pg/commitdiff/808f8f5d6da5c79ed10bbe9f721215279a81d1eb</a></li>

<li>9.3 release notes: move foreign table item. Move item about foreign data wrappers supporting inserts/updates/deletes to object manipulation. From Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b52cd9d022fee0b653af7e586f2053abaf19f20b">http://git.postgresql.org/pg/commitdiff/b52cd9d022fee0b653af7e586f2053abaf19f20b</a></li>

<li>docs: document TRIM "comma" syntax. This syntax is supported by the parser, but is non-standard. _Not_ backpatched to 9.3 in case we change our minds. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5368a23eeb1f530d7c683b207074901c1a5417c4">http://git.postgresql.org/pg/commitdiff/5368a23eeb1f530d7c683b207074901c1a5417c4</a></li>

<li>pg_upgrade: shut down server after auth failure. Register atexit() server shutdown if pg_ctl successfully started the server, but we can't connect to it. Backpatch to 9.3. Per bug report from Pavel Raiskup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac76ec27b933a4f0e1c6840ab1aaef770ed14395">http://git.postgresql.org/pg/commitdiff/ac76ec27b933a4f0e1c6840ab1aaef770ed14395</a></li>

<li>release notes: Update to 9.3 git current. Backpatch to 9.3, of course. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e91f2bb3ee8bb1f4be5bbfe0e43815e47b49aa3f">http://git.postgresql.org/pg/commitdiff/e91f2bb3ee8bb1f4be5bbfe0e43815e47b49aa3f</a></li>

<li>release notes: update 9.3 major feature list. Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/175ec8de470fa5212797d672a2e5f1c79842a9ec">http://git.postgresql.org/pg/commitdiff/175ec8de470fa5212797d672a2e5f1c79842a9ec</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Emit a log message if output is about to be redirected away from stderr. We've seen multiple cases of people looking at the postmaster's original stderr output to try to diagnose problems, not realizing/remembering that their logging configuration is set up to send log messages somewhere else. This seems particularly likely to happen in prepackaged distributions, since many packagers patch the code to change the factory-standard logging configuration to something more in line with their platform conventions. In hopes of reducing confusion, emit a LOG message about this at the point in startup where we are about to switch log output away from the original stderr, providing a pointer to where to look instead. This message will appear as the last thing in the original stderr output. (We might later also try to emit such link messages when logging parameters are changed on-the-fly; but that case seems to be both noticeably harder to do nicely, and much less frequently a problem in practice.) Per discussion, back-patch to 9.3 but not further. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d5282c6f0edbdcb78dd2a6e8068f829fcb2882f">http://git.postgresql.org/pg/commitdiff/3d5282c6f0edbdcb78dd2a6e8068f829fcb2882f</a></li>

<li>Remove ph_may_need from PlaceHolderInfo, with attendant simplifications. The planner logic that attempted to make a preliminary estimate of the ph_needed levels for PlaceHolderVars seems to be completely broken by lateral references. Fortunately, the potential join order optimization that this code supported seems to be of relatively little value in practice; so let's just get rid of it rather than trying to fix it. Getting rid of this allows fairly substantial simplifications in placeholder.c, too, so planning in such cases should be a bit faster. Issue noted while pursuing bugs reported by Jeremy Evans and Antonin Houska, though this doesn't in itself fix either of their reported cases. What this does do is prevent an Assert crash in the kind of query illustrated by the added regression test. (I'm not sure that the plan for that query is stable enough across platforms to be usable as a regression test output ... but we'll soon find out from the buildfarm.) Back-patch to 9.3. The problem case can't arise without LATERAL, so no need to touch older branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b1d3d92c3ec1179c65756f60a1eb477793488ea">http://git.postgresql.org/pg/commitdiff/1b1d3d92c3ec1179c65756f60a1eb477793488ea</a></li>

<li>Fix planner problems with LATERAL references in PlaceHolderVars. The planner largely failed to consider the possibility that a PlaceHolderVar's expression might contain a lateral reference to a Var coming from somewhere outside the PHV's syntactic scope. We had a previous report of a problem in this area, which I tried to fix in a quick-hack way in commit 4da6439bd8553059766011e2a42c6e39df08717f, but Antonin Houska pointed out that there were still some problems, and investigation turned up other issues. This patch largely reverts that commit in favor of a more thoroughly thought-through solution. The new theory is that a PHV's ph_eval_at level cannot be higher than its original syntactic level. If it contains lateral references, those don't change the ph_eval_at level, but rather they create a lateral-reference requirement for the ph_eval_at join relation. The code in joinpath.c needs to handle that. Another issue is that createplan.c wasn't handling nested PlaceHolderVars properly. In passing, push knowledge of lateral-reference checks for join clauses into join_clause_is_movable_to. This is mainly so that FDWs don't need to deal with it. This patch doesn't fix the original join-qual-placement problem reported by Jeremy Evans (and indeed, one of the new regression test cases shows the wrong answer because of that). But the PlaceHolderVar problems need to be fixed before that issue can be addressed, so committing this separately seems reasonable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e7e29c75ad441450f9b8287bd51c13521641e3b">http://git.postgresql.org/pg/commitdiff/9e7e29c75ad441450f9b8287bd51c13521641e3b</a></li>

<li>Fix thinko in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1d5fce7cf11d596b2617a5696fd8eb5ebff2b33">http://git.postgresql.org/pg/commitdiff/f1d5fce7cf11d596b2617a5696fd8eb5ebff2b33</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update Emacs configuration. Update emacs.samples with new configuration snippets that match pgindent et al. formatting more accurately and follow Emacs Lisp best practices better. Add .dir-locals.el with a subset of that configuration for casual editing and viewing. Reviewed-by: Dimitri Fontaine &lt;dimitri@2ndQuadrant.fr&gt; Reviewed-by: Noah Misch &lt;noah@leadboat.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e3e8e4daaefba47ad7a8b82320531992470b5df">http://git.postgresql.org/pg/commitdiff/5e3e8e4daaefba47ad7a8b82320531992470b5df</a></li>

<li>Improve error message when view is not updatable. Avoid using the term "updatable" in confusing ways. Suggest a trigger first, before a rule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32f7c0ae1725031e8ed3620e06e94007a171d6d5">http://git.postgresql.org/pg/commitdiff/32f7c0ae1725031e8ed3620e06e94007a171d6d5</a></li>

<li>Treat timeline IDs as unsigned in replication parser. Timeline IDs are unsigned ints everywhere, except the replication parser treated them as signed ints. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/229fb58d4ff6fc4cd61fc5045edeb25f7fc4800e">http://git.postgresql.org/pg/commitdiff/229fb58d4ff6fc4cd61fc5045edeb25f7fc4800e</a></li>

<li>libpq: Report strerror on pthread_mutex_lock() failure 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe885c6e36667f2fbbf98d1f2f9657ee32acb1c1">http://git.postgresql.org/pg/commitdiff/fe885c6e36667f2fbbf98d1f2f9657ee32acb1c1</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove Assert that matview is not in system schema from REFRESH. We don't want to prevent an extension which creates a matview from being installed in pg_catalog. Issue was raised by Hitoshi Harada. Backpatched to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2cd368678e6bcf95d0f66c12e470d163b7a27b6">http://git.postgresql.org/pg/commitdiff/e2cd368678e6bcf95d0f66c12e470d163b7a27b6</a></li>

<li>Don't allow ALTER MATERIALIZED VIEW ADD UNIQUE. Was accidentally allowed, but not documented and lacked support for rename or drop once created. Per report from Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f78b1715c8c1d6655d169e6c8ac384c9a01ac60">http://git.postgresql.org/pg/commitdiff/3f78b1715c8c1d6655d169e6c8ac384c9a01ac60</a></li>

<li>Remove relcache entry invalidation in REFRESH MATERIALIZED VIEW. This was added as part of the attempt to support unlogged matviews along with a populated status. It got missed when unlogged support was removed pre-commit. Noticed by Noah Misch. Back-patched to 9.3 branch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28154bb23b8f4a080c030b4f326e3a6fd351f9c8">http://git.postgresql.org/pg/commitdiff/28154bb23b8f4a080c030b4f326e3a6fd351f9c8</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add tab completion for \dx in psql 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62e28b3e41353dd79802113b3e9f2a81246146f0">http://git.postgresql.org/pg/commitdiff/62e28b3e41353dd79802113b3e9f2a81246146f0</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05cbce6f30b9037f035f76f5cdf45fca3e9dd012">http://git.postgresql.org/pg/commitdiff/05cbce6f30b9037f035f76f5cdf45fca3e9dd012</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move more bgworker code to bgworker.c; also, some renaming. Per discussion on pgsql-hackers. Michael Paquier, slightly modified by me. Original suggestion from Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2dee7998f93062e2ae7fcc9048ff170e528d1724">http://git.postgresql.org/pg/commitdiff/2dee7998f93062e2ae7fcc9048ff170e528d1724</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dean Rasheed sent in a WIP patch to extend auto-updatable views to support views containing a mix of updatable and non-updatable columns. This is basically the "columns" part of SQL Feature T111, "Updatable joins, unions, and columns".</li>

<li>Etsuro Fujita sent in two more revisions of a patch to improve the performance of ORDINALITY.</li>

<li>Andrew (RhodiumToad) Gierth sent in a WIP patch which implements a method for expanding multiple SRFs in parallel that does not have the surprising LCM behaviour of SRFs-in-select-list. (Functions returning fewer rows are padded with nulls instead.) It then uses this method combined with a parse-time hack to implement the (intended to be) spec-conforming behaviour of UNNEST with multiple parameters, including flattening of composite results.</li>

<li>Robert Haas sent in a PoC patch to allow additional "dynamic" memory segments.</li>

<li>Etsuro Fujita sent in a patch to update the README in src/backend/optimizer to reflect current realities.</li>

<li>Rushabh Lathia sent in two more revisions of a patch to throw an error when years with &gt;4 digits are used in a timestamptz type.</li>

<li>Robert Haas sent in a patch to fix a bug where pgstat_reset_remove_files ignores its argument.</li>

<li>Michael Cronenworth and Andrew Dunstan traded patches to fix Windows socket error checking for MinGW.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to implement ECPG fetch readahead.</li>

<li>Peter Eisentraut sent in a patch to fix an issue with libpq thread locking during SSL connection start.</li>

<li>Robert Haas sent in another revision of a patch to rearrange the code for dynamic background workers.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to add support of "IF NOT EXISTS" to the remaining "CREATE" statements where such a clause would make sense.</li>

</ul>