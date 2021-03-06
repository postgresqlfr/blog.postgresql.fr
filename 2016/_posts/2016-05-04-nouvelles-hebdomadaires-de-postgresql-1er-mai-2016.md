---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er mai 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/05/04/Nouvelles-hebdomadaires-de-PostgreSQL-1er-mai-2016"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>Sortie de BigSQL, distribution autour de PostgreSQL&nbsp;: <a target="_blank" href="http://www.bigsql.org">http://www.bigsql.org</a></li>

<li>jpgAgent est un programmateur de t&acirc;ches pour PostgreSQL, &eacute;crit en Java&nbsp;: <a target="_blank" href="https://github.com/Tostino/jpgAgent">https://github.com/Tostino/jpgAgent</a></li>

<li>Ora2PG 18.4, un syst&egrave;me de migration depuis Oracle et MySQL vers PostgreSQL&nbsp;: <a target="_blank" href="https://github.com/darold/ora2pg/blob/master/changelog">https://github.com/darold/ora2pg/blob/master/changelog</a></li>

<li>pgBadger 8.1, un analyseur de log PostgreSQL parall&eacute;lisable &eacute;crit en Perl&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/blob/master/ChangeLog">https://github.com/dalibo/pgbadger/blob/master/ChangeLog</a><br>

D&eacute;veloppement&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/">https://github.com/dalibo/pgbadger/</a></li>

<li>pgCluu 2.5, un programme en Perl pour auditer les performances de PostgreSQL&nbsp;: <a target="_blank" href="http://pgcluu.darold.net/">http://pgcluu.darold.net/</a></li>

<li>pgpool-II 3.5.2, 3.4.6, 3.3.10, 3.2.15, 3.1.18 et pgpoolAdmin 3.5.2 ont &eacute;t&eacute; publi&eacute;s. pgpool-II est un pooler de connexions et un syst&egrave;me de r&eacute;plication pour PostgreSQL&nbsp;: <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mai</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-05/">http://archives.postgresql.org/pgsql-jobs/2016-05/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>FOSS4G NA (<em>Free and Open Source Software for Geospatial - North America</em>) se tiendra &agrave; Raleigh, en Caroline du Nord, du 2 au 5 mai 2016&nbsp;: <a target="_blank" href="https://2016.foss4g-na.org/">https://2016.foss4g-na.org/</a></li>

<li>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></li>

<li>Le PGDay suisse sera, cette ann&eacute;e, tenue &agrave; l'Universit&eacute; des Sciences Appliqu&eacute;es (HSR) de Rapperswil le 24 juin 2016&nbsp;: <a target="_blank" href="http://www.pgday.ch/">http://www.pgday.ch/</a></li>

<li>"5432 ... Meet us!" aura lieu &agrave; Milan (Italie) les 28 &amp; 29 juin 2016. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://5432meet.us/">http://5432meet.us/</a></li>

<li>Le <em>PG Day UK</em> aura lieu le 5 juillet 2016&nbsp;: <a target="_blank" href="http://www.pgconf.uk/">http://www.pgconf.uk/</a></li>

<li>Le PostgresOpen 2016 aura lieu &agrave; Dallas (Texas, USA) du 13 au 16 septembre. L'appel &agrave; conf&eacute;renciers &agrave; &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="https://2016.postgresopen.org/callforpapers/">https://2016.postgresopen.org/callforpapers/</a></li>

<li>Session PostgreSQL le 22 septembre 2016 &agrave; Lyon (France). La date limite de candidature est le 20 mai : envoyez vos propositions &agrave; call-for-paper AT postgresql-sessions DOT org.</li>

<li>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160502054808.GA24944@fetter.org">http://www.postgresql.org/message-id/20160502054808.GA24944@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Fix typo From: Andreas Seltenreich &lt;andreas.seltenreich@credativ.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96687497b640b24772da4e086c7690ee8d840f1c">http://git.postgresql.org/pg/commitdiff/96687497b640b24772da4e086c7690ee8d840f1c</a></li>

<li>Update GETTEXT_FILES after config and controldata refactoring. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63417b4b2e38897ea02fef416bd96113baa3ed45">http://git.postgresql.org/pg/commitdiff/63417b4b2e38897ea02fef416bd96113baa3ed45</a></li>

<li>pg_dump: Message style improvements. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6dacc173b6830c515d970698cead9a85663c553">http://git.postgresql.org/pg/commitdiff/b6dacc173b6830c515d970698cead9a85663c553</a></li>

<li>pg_dump: Message style improvements forgotten in b6dacc173b6830c515d970698cead9a85663c553 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3019f432d6fffe6d8e04f5ccc592eb385af96492">http://git.postgresql.org/pg/commitdiff/3019f432d6fffe6d8e04f5ccc592eb385af96492</a></li>

<li>doc: Minor wording changes. From: Dmitry Igrishin &lt;dmitigr@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82881b2b432c9433b45abc96acf49d5d690eb918">http://git.postgresql.org/pg/commitdiff/82881b2b432c9433b45abc96acf49d5d690eb918</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Try harder to detect a port conflict in PostgresNode.pm. Commit fab84c7787f25756 tried to get away without doing an actual bind(), but buildfarm results show that that doesn't get the job done. So we must really bind to the target port --- and at least on my Linux box, we need a listen() as well, or conflicts won't be detected. We rely on SO_REUSEADDR to prevent problems from starting a postmaster on the socket immediately after we've bound to it in the test code. (There may be platforms where that doesn't work too well. But fortunately, we only really care whether this works on Windows, and there the default behavior should be OK.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40e89e2ab89cb2801f6bc02f08dcc24d547530fc">http://git.postgresql.org/pg/commitdiff/40e89e2ab89cb2801f6bc02f08dcc24d547530fc</a></li>

<li>New method for preventing compile-time calculation of degree constants. Commit 65abaab547a5758b tried to prevent the scaling constants used in the degree-based trig functions from being precomputed at compile time, because some compilers do that with functions that don't yield results identical-to-the-last-bit to what you get at runtime. A report from Peter Eisentraut suggests that some recent compilers are smart enough to see through that trick, though. Instead, let's put the inputs to these calculations into non-const global variables, which should be a more reliable way of convincing the compiler that it can't assume that they are compile-time constants. (If we really get desperate, we could mark these variables "volatile", but I do not believe we should have to.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b1a213bbd6599228b2b67f7552ff7cc378797bf">http://git.postgresql.org/pg/commitdiff/6b1a213bbd6599228b2b67f7552ff7cc378797bf</a></li>

<li>Yet more portability hacking for degree-based trig functions. The true explanation for Peter Eisentraut's report of inexact asind results seems to be that (a) he's compiling into x87 instruction set, which uses wider-than-double float registers, plus (b) the library function asin() on his platform returns a result that is wider than double and is not rounded to double width. To fix, we have to force the function's result to be rounded comparably to what happened to the scaling constant asin_0_5. Experimentation suggests that storing it into a volatile local variable is the least ugly way of making that happen. Although only asin() is known to exhibit an observable inexact result, we'd better do this in all the places where we're hoping to get an exact result by scaling. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82311bcdd76904b2cee7567e14e9fb0cf6c6178c">http://git.postgresql.org/pg/commitdiff/82311bcdd76904b2cee7567e14e9fb0cf6c6178c</a></li>

<li>Fix order of shutdown cleanup operations in PostgresNode.pm. Previously, database clusters created by a TAP test were shut down by DESTROY methods attached to the PostgresNode objects representing them. The trouble with that is that if the objects survive into the final global destruction phase (which they do), Perl executes the DESTROY methods in an unspecified order. Thus, the order of shutdown of multiple clusters was indeterminate, which might lead to not-very-reproducible errors getting logged (eg from a slave whose master might or might not get killed first). Worse, the File::Temp objects representing the temporary PGDATA directories might get destroyed before the PostgresNode objects, resulting in attempts to delete PGDATA directories that still have live servers in them. On Windows, this would lead to directory deletion failures; on Unix, it usually had no effects worse than erratic "could not open temporary statistics file "pg_stat/global.tmp": No such file or directory" log messages. While none of this would affect the reported result of the TAP test, which is already determined, it could be very confusing when one is trying to understand from the logs what went wrong with a failed test. To fix, do the postmaster shutdowns in an END block rather than at object destruction time. The END block will execute at a well-defined (and reasonable) time during script termination, and it will stop the postmasters in order of PostgresNode object creation. (Perhaps we should change that to be reverse order of creation, but the main point here is that we now have control which we did not before.) Use "pg_ctl stop", not an asynchronous kill(SIGQUIT), so that we wait for the postmasters to shut down before proceeding with directory deletion. Deletion of temporary directories still happens in an unspecified order during global destruction, but I can see no reason to care about that once the postmasters are stopped. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08af9219060a9526c69f5408b80eee0aa8f707e9">http://git.postgresql.org/pg/commitdiff/08af9219060a9526c69f5408b80eee0aa8f707e9</a></li>

<li>Add a --brief option to git_changelog. In commit c0b050192, Andres introduced the idea of including one-line commit references in our major release notes. Teach git_changelog to emit a (lightly adapted) version of that format, so that we don't have to laboriously add it to the notes after the fact. The default output isn't changed, since I anticipate still using that for minor release notes. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8067c8f86b5f4516ee204a119a750329f7d126ee">http://git.postgresql.org/pg/commitdiff/8067c8f86b5f4516ee204a119a750329f7d126ee</a></li>

<li>Clean up parsing of synchronous_standby_names GUC variable. Commit 989be0810dffd08b added a flex/bison lexer/parser to interpret synchronous_standby_names. It was done in a pretty crufty way, though, making assorted end-use sites responsible for calling the parser at the right times. That was not only vulnerable to errors of omission, but made it possible that lexer/parser errors occur at very undesirable times, and created memory leakages even if there was no error. Instead, perform the parsing once during check_synchronous_standby_names and let guc.c manage the resulting data. To do that, we have to flatten the parsed representation into a single hunk of malloc'd memory, but that is not very hard. While at it, work a little harder on making useful error reports for parsing problems; the previous code felt that "synchronous_standby_names parser returned 1" was an appropriate user-facing error message. (To be fair, it did also log a syntax error message, but separately from the GUC problem report, which is at best confusing.) It had some outright bugs in the face of invalid input, too. I (tgl) also concluded that we need to restrict unquoted names in synchronous_standby_names to be just SQL identifiers. The previous coding would accept darn near anything, which (1) makes the quoting convention both nearly-unnecessary and formally ambiguous, (2) makes it very hard to understand what is a syntax error and what is a creative interpretation of the input as a standby name, and (3) makes it impossible to further extend the syntax in future without a compatibility break. I presume that we're intending future extensions of the syntax, else this parsing infrastructure is massive overkill, so (3) is an important objection. Since we've taken a compatibility hit for non-identifier names with this change anyway, we might as well lock things down now and insist that users use double quotes for standby names that aren't identifiers. Kyotaro Horiguchi and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c804fbdfb472cf71db33609258b8e1aaad81943">http://git.postgresql.org/pg/commitdiff/4c804fbdfb472cf71db33609258b8e1aaad81943</a></li>

<li>Use memmove() not memcpy() to slide some pointers down. The previous coding here was formally undefined, though it seems to accidentally work on most platforms in the buildfarm. Caught by some OpenBSD platforms in which libc contains an assertion check for overlapping areas passed to memcpy(). Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad520ec4acb8f0cdb143b63519be95a9549fa826">http://git.postgresql.org/pg/commitdiff/ad520ec4acb8f0cdb143b63519be95a9549fa826</a></li>

<li>Revert "Convert contrib/seg's bool-returning SQL functions to V1 call convention." This reverts commit c8e81afc60093b199a128ccdfbb692ced8e0c9cd. That turns out to have been based on a faulty diagnosis of why the VS2015 build was misbehaving. Instead, we need to fix DatumGetBool(). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f050423052bc9265d4cd27555058435edd4bef87">http://git.postgresql.org/pg/commitdiff/f050423052bc9265d4cd27555058435edd4bef87</a></li>

<li>Adjust DatumGetBool macro, this time for sure. Commit 23a41573c attempted to fix the DatumGetBool macro to ignore bits in a Datum that are to the left of the actual bool value. But it did that by casting the Datum to bool; and on compilers that use C99 semantics for bool, that ends up being a whole-word test, not a 1-byte test. This seems to be the true explanation for contrib/seg failing in VS2015. To fix, use GET_1_BYTE() explicitly. I think in the previous patch, I'd had some idea of not having to commit to bool being exactly 1 byte wide, but regardless of what the compiler's bool is, boolean columns and Datums are certainly 1 byte wide. The previous fix was (eventually) back-patched into all active versions, so do likewise with this one. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23b09e15b9f40baeff527ca4dbc40afc823dd962">http://git.postgresql.org/pg/commitdiff/23b09e15b9f40baeff527ca4dbc40afc823dd962</a></li>

<li>Fix mishandling of equivalence-class tests in parameterized plans. Given a three-or-more-way equivalence class, such as X.Y = Y.Y = Z.Z, it was possible for the planner to omit one of the quals needed to enforce that all members of the equivalence class are actually equal. This only happened in the case of a parameterized join node for two of the relations, that is a plan tree like Nested Loop -&gt; Scan X -&gt; Nested Loop -&gt; Scan Y -&gt; Scan Z Filter: Z.Z = X.X The eclass machinery normally expects to apply X.X = Y.Y when those two relations are joined, but in this shape of plan tree they aren't joined until the top node --- and, if the lower nested loop is marked as parameterized by X, the top node will assume that the relevant eclass condition(s) got pushed down into the lower node. On the other hand, the scan of Z assumes that it's only responsible for constraining Z.Z to match any one of the other eclass members. So one or another of the required quals sometimes fell between the cracks, depending on whether consideration of the eclass in get_joinrel_parampathinfo() for the lower nested loop chanced to generate X.X = Y.Y or X.X = Z.Z as the appropriate constraint there. If it generated the latter, it'd erroneously suppose that the Z scan would take care of matters. To fix, force X.X = Y.Y to be generated and applied at that join node when this case occurs. This is *extremely* hard to hit in practice, because various planner behaviors conspire to mask the problem; starting with the fact that the planner doesn't really like to generate a parameterized plan of the above shape. (It might have been impossible to hit it before we tweaked things to allow this plan shape for star-schema cases.) Many thanks to Alexander Kirkouski for submitting a reproducible test case. The bug can be demonstrated in all branches back to 9.2 where parameterized paths were introduced, so back-patch that far. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/207d5a656e2ecc98a1db5bdc22ea306f7f7c8d62">http://git.postgresql.org/pg/commitdiff/207d5a656e2ecc98a1db5bdc22ea306f7f7c8d62</a></li>

<li>Remove warning about num_sync being too large in synchronous_standby_names. If we're not going to reject such setups entirely, throwing a WARNING in check_synchronous_standby_names() is unhelpful, because it will cause the warning to be logged again every time the postmaster receives SIGHUP. Per discussion, just remove the warning. In passing, improve the documentation for synchronous_commit, which had not gotten the word that now there can be more than one synchronous standby. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17d5db352c1780f4721664f67bc3a3f3b1cf933c">http://git.postgresql.org/pg/commitdiff/17d5db352c1780f4721664f67bc3a3f3b1cf933c</a></li>

<li>Fix planner crash from pfree'ing a partial path that a GatherPath uses. We mustn't run generate_gather_paths() during add_paths_to_joinrel(), because that function can be invoked multiple times for the same target joinrel. Not only is it wasteful to build GatherPaths repeatedly, but a later add_partial_path() could delete the partial path that a previously created GatherPath depends on. Instead establish the convention that we do generate_gather_paths() for a rel only just before set_cheapest(). The code was accidentally not broken for baserels, because as of today there never is more than one partial path for a baserel. But that assumption obviously has a pretty short half-life, so move the generate_gather_paths() calls for those cases as well. Also add some generic comments explaining how and why this all works. Per fuzz testing by Andreas Seltenreich. Report: &lt;871t5pgwdt.fsf@credativ.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c45bf5751b6338488bd79ce777210285531da373">http://git.postgresql.org/pg/commitdiff/c45bf5751b6338488bd79ce777210285531da373</a></li>

<li>Small improvements to OPTIMIZER_DEBUG code. Now that Paths have their own rows field, print that rather than the parent relation's rowcount. Show the relid sets associated with Paths using table names rather than numbers; since this code is able to print simple Var references using table names, it seems a bit silly that print_relids can't. Print the cheapest_parameterized_paths list for a RelOptInfo, and include information about a parameterized path's required_outer rels. Noted while trying to use this feature to debug Alexander Kirkouski's recent bug report. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a2435e6995133c9d872ef9cb51432f0b678b978">http://git.postgresql.org/pg/commitdiff/2a2435e6995133c9d872ef9cb51432f0b678b978</a></li>

<li>Update contrib/unaccent documentation about its unaccent.rules file. Commit 1bbd52cb9a4aa61a didn't bother with such niceties. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6376a16ba24a5a097fc739b9c79ab555be4d9f1a">http://git.postgresql.org/pg/commitdiff/6376a16ba24a5a097fc739b9c79ab555be4d9f1a</a></li>

<li>Add a --non-master-only option to git_changelog. This has the inverse effect of --master-only. It's needed to help find cases where a commit should not be described in major release notes because it was back-patched into older branches, though not at the same time as the HEAD commit. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8473b7f95fbe8ef25dccd23ff94a4e363797bd90">http://git.postgresql.org/pg/commitdiff/8473b7f95fbe8ef25dccd23ff94a4e363797bd90</a></li>

</ul>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Fix C comment typo and redundant test <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e65953be4f540dce31f17db2934ee58365077272">http://git.postgresql.org/pg/commitdiff/e65953be4f540dce31f17db2934ee58365077272</a></li>

<li>Add a few entries to the tail of time mapping, to see old values. Without a few entries beyond old_snapshot_threshold, the lookup would often fail, resulting in the more aggressive pruning or vacuum being skipped often enough to matter. This was very clearly shown by a python test script posted by Ants Aasma, and was likely a factor in an earlier but somewhat less clear-cut test case posted by Jeff Janes. This patch makes no change to the logic, per se -- it just makes the array of mapping entries big enough to make lookup misses based on timing much less likely. An occasional miss is still possible if a thread stalls for more than 10 minutes, but that does not create any problem with correctness of behavior. Besides, if things are so busy that a thread is stalling for more than 10 minutes, it is probably OK to skip the more aggressive cleanup at that particular point in time. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c3e8039f450eb99b3a73272d0a1661195747d1b">http://git.postgresql.org/pg/commitdiff/7c3e8039f450eb99b3a73272d0a1661195747d1b</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typo in comment. Author: Daniel Gustafsson <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7351ced425f3937f0a61adb4ade1d4b93bf751d">http://git.postgresql.org/pg/commitdiff/b7351ced425f3937f0a61adb4ade1d4b93bf751d</a></li>

<li>Fix typo. Author: Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a03bda323b0713aeaacfd0050be76df9e6b06a13">http://git.postgresql.org/pg/commitdiff/a03bda323b0713aeaacfd0050be76df9e6b06a13</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Enable parallel query by default. Change max_parallel_degree default from 0 to 2. It is possible that this is not a good idea, or that we should go with 1 worker rather than 2, but we won't find out without trying it. Along the way, reword the documentation for max_parallel_degree a little bit to hopefully make it more clear. Discussion: 20160420174631.3qjjhpwsvvx5bau5@alap3.anarazel.de <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77cd477c4ba885cfa1ba67beaa82e06f2e182b85">http://git.postgresql.org/pg/commitdiff/77cd477c4ba885cfa1ba67beaa82e06f2e182b85</a></li>

<li>Fix pg_get_functiondef to dump parallel-safety markings. Ashutosh Sharma <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ac3be2e763d9b971352819f285dd51519e0aeb9">http://git.postgresql.org/pg/commitdiff/2ac3be2e763d9b971352819f285dd51519e0aeb9</a></li>

<li>Fix EXPLAIN VERBOSE output for parallel aggregate. The way that PartialAggregate and FinalizeAggregate plan nodes were displaying output columns before was bogus. Now, FinalizeAggregate produces the same outputs as an Aggregate would have produced, while PartialAggregate produces each of those outputs prefixed by the word PARTIAL. Discussion: 12585.1460737650@sss.pgh.pa.us Patch by me, reviewed by David Rowley. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59eb55127906b943ff155240eebc161df8edb62f">http://git.postgresql.org/pg/commitdiff/59eb55127906b943ff155240eebc161df8edb62f</a></li>

<li>Remove mergeHyperLogLog. It's buggy. If somebody needs this later, they'll need to put back a non-buggy vesion of it. Discussion: CAM3SWZT-i6R9JU5YXa8MJUou2_r3LfGJZpQ9tYa1BYxfkj0=cQ@mail.gmail.com Discussion: CAM3SWZRUOLsYoTT83QgdUy9D8ehYWm_nvbrrfcOOzikiRfFY7g@mail.gmail.com Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/360ca27a9b9793f3939c9f70de77c1272a110362">http://git.postgresql.org/pg/commitdiff/360ca27a9b9793f3939c9f70de77c1272a110362</a></li>

<li>Clean up a few parallelism-related things that pgindent wants to mangle. In nodeFuncs.c, pgindent wants to introduce spurious indentation into the definitions of planstate_tree_walker and planstate_walk_subplans. Fix that by spreading the definition out across several lines, similar to what is already done for other walker functions in that file. In execParallel.c, in the definition of SharedExecutorInstrumentation, pgindent wants to insert more whitespace between the type name and the member name. That causes it to mangle comments later on the line. Fix by moving the comments out of line. Now that we have a bit more room, add some more details that may be useful to the next person reading this code. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8126eaee2fed7cbc4e9fd6ba8713977ccacd77fe">http://git.postgresql.org/pg/commitdiff/8126eaee2fed7cbc4e9fd6ba8713977ccacd77fe</a></li>

<li>Update typedefs.list file in preparation for pgindent run In addition to adding new typedefs, I also re-sorted the file so that various entries add piecemeal, mostly or entirely by me, were alphabetized the same way as other entries in the file. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acb51bd71d16921cc18cd434d8e70ab0705d6856">http://git.postgresql.org/pg/commitdiff/acb51bd71d16921cc18cd434d8e70ab0705d6856</a></li>

<li>Remove inadvertently commited vim swapfile. If you were wondering what editor I use, now you know. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b33dc7766509be27bda62a8de7889b26dc2a366c">http://git.postgresql.org/pg/commitdiff/b33dc7766509be27bda62a8de7889b26dc2a366c</a></li>

<li>Tighten up sanity checks for parallel aggregate in execQual.c. David Rowley <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf402ba7340f66defe25bffa8621a54fd579196e">http://git.postgresql.org/pg/commitdiff/cf402ba7340f66defe25bffa8621a54fd579196e</a></li>

<li>Change postgresql.conf.sample to say that fsync=off will corrupt data. Discussion: 24748.1461764666@sss.pgh.pa.us Per a suggestion from Craig Ringer. This wording from Tom Lane, following discussion. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a31212b429cd3397fb3147b1a584ae33224454a6">http://git.postgresql.org/pg/commitdiff/a31212b429cd3397fb3147b1a584ae33224454a6</a></li>

<li>Fix wrong word. Commit a31212b429cd3397fb3147b1a584ae33224454a6 was a little too hasty. Per report from Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/372ff7cae254ac110e2dd25f81cb000c61b60413">http://git.postgresql.org/pg/commitdiff/372ff7cae254ac110e2dd25f81cb000c61b60413</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Fix tsearch docs. Remove mention of setweight(tsquery) which wasn't included in 9.6. Also replace old forgotten phrase operator to new one. Dmitry Ivanov <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1e3c76066f0066a8a9bb09b80cd97f11e4b2dc4">http://git.postgresql.org/pg/commitdiff/f1e3c76066f0066a8a9bb09b80cd97f11e4b2dc4</a></li>

<li>Prevent multiple cleanup process for pending list in GIN. Previously, ginInsertCleanup could exit early if it detects that someone else is cleaning up the pending list, without waiting for that someone else to finish the job. But in this case vacuum could miss tuples to be deleted. Cleanup process now locks metapage with a help of heavyweight LockPage(ExclusiveLock), and it guarantees that there is no another cleanup process at the same time. Lock is taken differently depending on caller of cleanup process: any vacuums and gin_clean_pending_list() will be blocked until lock becomes available, ordinary insert uses conditional lock to prevent indefinite waiting on lock. Insert into pending list doesn't use this lock, so insertion isn't blocked. Also, patch adds stopping of cleanup process when at-start-cleanup-tail is reached in order to prevent infinite cleanup in case of massive insertion. But it will stop only for automatic maintenance tasks like autovacuum. Patch introduces choice of limit of memory to use: autovacuum_work_mem, maintenance_work_mem or work_mem depending on call path. Patch for previous releases should be reworked due to changes between 9.6 and previous ones in this area. Discover and diagnostics by Jeff Janes and Tomas Vondra Patch by me with some ideas of Jeff Janes <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2c79e14d998cd31f860854bc9210b37b457bb01">http://git.postgresql.org/pg/commitdiff/e2c79e14d998cd31f860854bc9210b37b457bb01</a></li>

<li>Prevent to use magic constants. Use macroses for definition amstrategies/amsupport fields instead of hardcoded values. Author: Nikolay Shaplov with addition for contrib/bloom <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8467f7da8685dbc47187864e5afe130d9c63fff">http://git.postgresql.org/pg/commitdiff/f8467f7da8685dbc47187864e5afe130d9c63fff</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Impose a full barrier in generic-xlc.h atomics functions. pg_atomic_compare_exchange_*_impl() were providing only the semantics of an acquire barrier. Buildfarm members hornet and mandrill revealed this deficit beginning with commit 008608b9d51061b1f598c197477b3dc7be9c4a64. While we have no report of symptoms in 9.5, we can't rule out the possibility of certain compilers, hardware, or extension code relying on these functions' specified barrier semantics. Back-patch to 9.5, where commit b64d92f1a5602c55ee8b27a7ac474f03b7aee340 introduced atomics. Reviewed by Andres Freund. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/213c7df0337278c71c98e90605dc83023db1a80e">http://git.postgresql.org/pg/commitdiff/213c7df0337278c71c98e90605dc83023db1a80e</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Don't open formally non-existent segments in _mdfd_getseg(). Before this commit _mdfd_getseg(), in contrast to mdnblocks(), did not verify whether all segments leading up to the to-be-opened one, were RELSEG_SIZE sized. That is e.g. not the case after truncating a relation, because later segments just get truncated to zero length, not removed. Once a "non-existent" segment has been opened in a session, mdnblocks() will return wrong results, causing errors like "could not read block %u in file" when accessing blocks. Closing the session, or the later arrival of relevant invalidation messages, would "fix" the problem. That, so far, was mostly harmless, because most segment accesses are only done after an mdnblocks() call. But since 428b1d6b29ca we try to open segments that might have been deleted, to trigger kernel writeback from a backend's queue of recent writes. To fix check segment sizes in _mdfd_getseg() when opening previously unopened segments. In practice this shouldn't imply a lot of additional lseek() calls, because mdnblocks() will most of the time already have opened all relevant segments. This commit also fixes a second problem, namely that _mdfd_getseg( EXTENSION_RETURN_NULL) extends files during recovery, which is not desirable for the mdwriteback() case. Add EXTENSION_REALLY_RETURN_NULL, which does not behave that way, and use it. Reported-By: Thom Brown Author: Andres Freund, Abhijit Menon-Sen Reviewd-By: Robert Haas, Fabien Coehlo Discussion: CAA-aLv6Dp_ZsV-44QA-2zgkqWKQq=GedBX2dRSrWpxqovXK=Pg@mail.gmail.com Fixes: 428b1d6b29ca599c5700d4bc4f4ce4c5880369bf <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72a98a639574d2e25ed94652848555900c81a799">http://git.postgresql.org/pg/commitdiff/72a98a639574d2e25ed94652848555900c81a799</a></li>

<li>Emit invalidations to standby for transactions without xid. So far, when a transaction with pending invalidations, but without an assigned xid, committed, we simply ignored those invalidation messages. That's problematic, because those are actually sent for a reason. Known symptoms of this include that existing sessions on a hot-standby replica sometimes fail to notice new concurrently built indexes and visibility map updates. The solution is to WAL log such invalidations in transactions without an xid. We considered to alternatively force-assign an xid, but that'd be problematic for vacuum, which might be run in systems with few xids. Important: This adds a new WAL record, but as the patch has to be back-patched, we can't bump the WAL page magic. This means that standbys have to be updated before primaries; otherwise "PANIC: standby_redo: unknown op code 32" errors can be encountered. XXX: Reported-By: &ETH;&rsquo;&ETH;&deg;&Ntilde;&ETH;&cedil;&ETH;&raquo;&Ntilde;&OElig;&ETH;&micro;&ETH;&sup2; &ETH;&rdquo;&ETH;&frac14;&ETH;&cedil;&Ntilde;&sbquo;&Ntilde;&euro;&ETH;&cedil;&ETH;&sup1;, Masahiko Sawada Discussion: CAB-SwXY6oH=9twBkXJtgR4UC1NqT-vpYAtxCseME62ADwyK5OA@mail.gmail.com CAD21AoDpZ6Xjg=gFrGPnSn4oTRRcwK1EBrWCq9OqOHuAcMMC=w@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6ff84b06a68b71719aa1aaa5f6704d8db1b51f8">http://git.postgresql.org/pg/commitdiff/c6ff84b06a68b71719aa1aaa5f6704d8db1b51f8</a></li>

<li>Remember asking for feedback during walsender shutdown. Since 5a991ef8 we're explicitly asking for feedback from the receiving side when shutting down walsender, if there's not yet replicated data. Unfortunately we didn't remember (i.e. set waiting_for_ping_response to true) having asked for feedback, leading to scenarios in which replies were requested at a high frequency. I can't reproduce this problem on my laptop, I think that's because the problem requires a significant TCP window to manifest due to the !pq_is_send_pending() condition. But since this clearly is a bug, let's fix it. There's quite possibly more wrong than just this though. While fiddling with WalSndDone(), I rewrote a hard to understand comment about looking at the flush vs. the write position. Reported-By: Nick Cleaton, Magnus Hagander Author: Nick Cleaton Discussion: CAFgz3kus=rC_avEgBV=+hRK5HYJ8vXskJRh8yEAbahJGTzF2VQ@mail.gmail.com CABUevExsjROqDcD0A2rnJ6HK6FuKGyewJr3PL12pw85BHFGS2Q@mail.gmail.com Backpatch: 9.4, were 5a991ef8 introduced the use of feedback messages during shutdown. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59455018a8120bb3c02680b0f9764492c5283d99">http://git.postgresql.org/pg/commitdiff/59455018a8120bb3c02680b0f9764492c5283d99</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Support building with Visual Studio 2015. Adjust the way we detect the locale. As a result the minumum Windows version supported by VS2015 and later is Windows Vista. Add some tweaks to remove new compiler warnings. Remove documentation references to the now obsolete msysGit. Michael Paquier, somewhat edited by me, reviewed by Christian Ullrich. Backpatch to 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fb54de9aa4ffb792ea63af853146021ae501f12">http://git.postgresql.org/pg/commitdiff/0fb54de9aa4ffb792ea63af853146021ae501f12</a></li>

<li>Fix typo in VS2015 patch. reported by Christian Ullrich <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7dc549238eabe6a634af3e24520f2c3f5667f76f">http://git.postgresql.org/pg/commitdiff/7dc549238eabe6a634af3e24520f2c3f5667f76f</a></li>

<li>Fix comment whitespace in VS2105 patch. per gripe from Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d34e7b2812467279b95060a4db8d9f4fc4be0e40">http://git.postgresql.org/pg/commitdiff/d34e7b2812467279b95060a4db8d9f4fc4be0e40</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Stephen Frost sent in another revision of a patch to fix pg_dump for catalog ACLs.</p>

<p>Sehrope Sarkuni sent in a patch to add jsonb_compact(...) for whitespace-free jsonb to text.</p>

<p>Peter Eisentraut sent in another revision of a patch to fix an OpenSSL error queue bug.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to fix synchronous replication update configuration.</p>

<p>Ashutosh Sharma sent in a patch to allow pg_basebackup to create pg_stat_tmp and pg_replslot as an empty directories if they are symbolic links.</p>

<p>Etsuro Fujita sent in a patch to fix subtransaction callbacks in the PostgreSQL FDW.</p>

<p>Christian Ullrich sent in three revisions of a patch to enable parallel builds with MSVC.</p>

<p>Dean Rasheed sent in a patch to fix an issue in psql's \ev feature which adds support for missing VIEW options like WITH CHECK OPTION.</p>

<p>Daniel Gustafsson sent in a patch to remove some unused macros from contrib.</p>

<p>Julien Rouhaud sent in two revisions of a patch to fix an issue with FK joins that could cause a segfault.</p>

<p>Craig Ringer sent in a patch to allow a stop LSN to be specified to pg_recvlogical.</p>

<p>Andreas Karlsson sent in a patch to fix the parallel safety markings for some built-in functions that got missed in the shuffle.</p>

<p>Ian Lawrence Barwick sent in a patch to add tab completion to psql's \l command.</p>

<p>Amit Kapila sent in a patch to fix an issue sqlsmith uncovered in apply_projection_to_path.</p>