---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 14 septembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/09/15/Nouvelles-hebdomadaires-de-PostgreSQL-14-septembre-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li><em>Open PostgreSQL Monitoring</em> (OPM) publi&eacute;&nbsp;: 

<a target="_blank" href="http://opm.io/">http://opm.io/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. Les inscriptions et tutoriels sont disponibles &agrave; l'achat&nbsp;: 

<a target="_blank" href="https://postgresopen.org/2014/tickets/">https://postgresopen.org/2014/tickets/</a> <a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

<li>La cinqui&egrave;me &eacute;dition du PgDay argentin est programm&eacute;e pour le 28 novembre 2014 &agrave; Santa Fe. L'appel international &agrave; conf&eacute;renciers court jusqu'au 28 septembre&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.ar/pgday2014">http://www.postgresql.org.ar/pgday2014</a></li>

<li>Le 4<sup>&egrave;me</sup> PgDay &eacute;quatorien aura lieu le mardi 7 octobre en la ville de Quito, int&eacute;gr&eacute; au 5&egrave;me congr&egrave;s international du Logiciel Libre. Envoyez vos propositions de conf&eacute;rences &agrave; ecpug AT postgresql DOT org.</li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140915062608.GA11283@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix psql \s to work with recent libedit, and add pager support. psql's \s (print command history) doesn't work at all with recent libedit versions when printing to the terminal, because libedit tries to do an fchmod() on the target file which will fail if the target is /dev/tty. (We'd already noted this in the context of the target being /dev/null.) Even before that, it didn't work pleasantly, because libedit likes to encode the command history file (to ensure successful reloading), which renders it nigh unreadable, not to mention significantly different-looking depending on exactly which libedit version you have. So let's forget using write_history() for this purpose, and instead print the data ourselves, using logic similar to that used to iterate over the history for newline encoding/decoding purposes. While we're at it, insert the ability to use the pager when \s is printing to the terminal. This has been an acknowledged shortcoming of \s for many years, so while you could argue it's not exactly a back-patchable bug fix it still seems like a good improvement. Anyone who's seriously annoyed at this can use "\s /dev/tty" or local equivalent to get the old behavior. Experimentation with this showed that the history iteration logic was actually rather broken when used with libedit. It turns out that with libedit you have to use previous_history() not next_history() to advance to more recent history entries. The easiest and most robust fix for this seems to be to make a run-time test to verify which function to call. We had not noticed this because libedit doesn't really need the newline encoding logic: its own encoding ensures that command entries containing newlines are reloaded correctly (unlike libreadline). So the effective behavior with recent libedits was that only the oldest history entry got newline-encoded or newline-decoded. However, because of yet other bugs in history_set_pos(), some old versions of libedit allowed the existing loop logic to reach entries besides the oldest, which means there may be libedit ~/.psql_history files out there containing encoded newlines in more than just the oldest entry. To ensure we can reload such files, it seems appropriate to back-patch this fix, even though that will result in some incompatibility with older psql versions (ie, multiline history entries written by a psql with this fix will look corrupted to a psql without it, if its libedit is reasonably up to date). Stepan Rutz and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/750c5ee6ce4410faaa4bf2b8d861100f30d97c73">http://git.postgresql.org/pg/commitdiff/750c5ee6ce4410faaa4bf2b8d861100f30d97c73</a></li>

<li>Preserve AND/OR flatness while extracting restriction OR clauses. The code I added in commit f343a880d5555faf1dad0286c5632047c8f599ad was careless about preserving AND/OR flatness: it could create a structure with an OR node directly underneath another one. That breaks an assumption that's fairly important for planning efficiency, not to mention triggering various Asserts (as reported by Benjamin Smith). Add a trifle more logic to handle the case properly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b4cc493d2b5216c14ba3ee781cbeff56f96d1b7">http://git.postgresql.org/pg/commitdiff/1b4cc493d2b5216c14ba3ee781cbeff56f96d1b7</a></li>

<li>Add width_bucket(anyelement, anyarray). This provides a convenient method of classifying input values into buckets that are not necessarily equal-width. It works on any sortable data type. The choice of function name is a bit debatable, perhaps, but showing that there's a relationship to the SQL standard's width_bucket() function seems more attractive than the other proposals. Petr Jelinek, reviewed by Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e80252d424278abf65b624669c8e6b3fe8587cac">http://git.postgresql.org/pg/commitdiff/e80252d424278abf65b624669c8e6b3fe8587cac</a></li>

<li>Fix JSON regression tests. Commit 95d737ff45a38809130a2c633d9e6bc26c825036 neglected to update expected/json_1.out. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3ec07280cc2bd4201f62cbde9a15a62eb54bc40">http://git.postgresql.org/pg/commitdiff/e3ec07280cc2bd4201f62cbde9a15a62eb54bc40</a></li>

<li>Fix power_var_int() for large integer exponents. The code for raising a NUMERIC value to an integer power wasn't very careful about large powers. It got an outright wrong answer for an exponent of INT_MIN, due to failure to consider overflow of the Abs(exp) operation; which is fixable by using an unsigned rather than signed exponent value after that point. Also, even though the number of iterations of the power-computation loop is pretty limited, it's easy for the repeated squarings to result in ridiculously enormous intermediate values, which can take unreasonable amounts of time/memory to process, or even overflow the internal "weight" field and so produce a wrong answer. We can forestall misbehaviors of that sort by bailing out as soon as the weight value exceeds what will fit in int16, since then the final answer must overflow (if exp &gt; 0) or underflow (if exp &lt; 0) the packed numeric format. Per off-list report from Pavel Stehule. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d352325b88afef6effbd2c3a52930b824944375">http://git.postgresql.org/pg/commitdiff/1d352325b88afef6effbd2c3a52930b824944375</a></li>

<li>Invent PGC_SU_BACKEND and mark log_connections/log_disconnections that way. This new GUC context option allows GUC parameters to have the combined properties of PGC_BACKEND and PGC_SUSET, ie, they don't change after session start and non-superusers can't change them. This is a more appropriate choice for log_connections and log_disconnections than their previous context of PGC_BACKEND, because we don't want non-superusers to be able to affect whether their sessions get logged. Note: the behavior for log_connections is still a bit odd, in that when a superuser attempts to set it from PGOPTIONS, the setting takes effect but it's too late to enable or suppress connection startup logging. It's debatable whether that's worth fixing, and in any case there is a reasonable argument for PGC_SU_BACKEND to exist. In passing, re-pgindent the files touched by this commit. Fujii Masao, reviewed by Joe Conway and Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe550b2ac249af5fbd8e9e19290a4ba43c882f2d">http://git.postgresql.org/pg/commitdiff/fe550b2ac249af5fbd8e9e19290a4ba43c882f2d</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix spinlock implementation for some !solaris sparc platforms. Some Sparc CPUs can be run in various coherence models, ranging from RMO (relaxed) over Phil Sorber (partial) to TSO (total). Solaris has always run CPUs in TSO mode while in userland, but linux didn't use to and the various *BSDs still don't. Unfortunately the sparc TAS/S_UNLOCK were only correct under TSO. Fix that by adding the necessary memory barrier instructions. On sparcv8+, which should be all relevant CPUs, these are treated as NOPs if the current consistency model doesn't require the barriers. Discussion: 20140630222854.GW26930@awork2.anarazel.de Will be backpatched to all released branches once a few buildfarm cycles haven't shown up problems. As I've no access to sparc, this is blindly written. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07968dbfaad03001db632a5c0ce4acccd5e463e2">http://git.postgresql.org/pg/commitdiff/07968dbfaad03001db632a5c0ce4acccd5e463e2</a></li>

<li>Fix typo in solaris spinlock fix. 07968dbfaad03 missed part of the S_UNLOCK define when building for sparcv8+. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50881036b17dc07cc61535d5bf27c56abaa4fbbb">http://git.postgresql.org/pg/commitdiff/50881036b17dc07cc61535d5bf27c56abaa4fbbb</a></li>

<li>Fix typo in 07c8651dd91d5 causing WIN32_ONLY_COMPILER builds to fail. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4c28d1b92c81941e4fc124884e51a7c110316bf">http://git.postgresql.org/pg/commitdiff/b4c28d1b92c81941e4fc124884e51a7c110316bf</a></li>

<li>Add support for optional_argument to our own getopt_long() implementation. 07c8651dd91d5a currently causes compilation errors on mscv (and probably some other) compilers because our getopt_long() implementation doesn't have support for optional_argument. Thus implement optional_argument in our fallback implemenation. It's quite possibly also useful in other cases. Arguably this needs a configure check for optional_argument, but it has existed pretty much since getopt_long() was introduced and thus doesn't seem worth the configure runtime. Normally I'd would not push a patch this fast, but this allows msvc to build again and has low risk as only optional_argument behaviour has changed. Author: Michael Paquier and Andres Freund Discussion: CAB7nPqS5VeedSCxrK=QouokbawgGKLpyc1Q++RRFCa_sjcSVrg@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/311da16439ef69fc2054af3f4377fd4acd29a0e3">http://git.postgresql.org/pg/commitdiff/311da16439ef69fc2054af3f4377fd4acd29a0e3</a></li>

<li>Add new psql help topics, accessible to both --help and \?. Add --help=&lt;topic&gt; for the commandline, and \? &lt;topic&gt; as a backslash command, to show more help than the invocations without parameters do. "commands", "variables" and "options" currently exist as help topics describing, respectively, backslash commands, psql variables, and commandline switches. Without parameters the help commands show their previous topic. Some further wordsmithing or extending of the added help content might be needed; but there seems little benefit delaying the overall feature further. Author: Pavel Stehule, editorialized by many Reviewed-By: Andres Freund, Petr Jelinek, Fujii Masao, MauMau, Abhijit Menon-Sen and Erik Rijkers. Discussion: CAFj8pRDVGuC-nXBfe2CK8vpyzd2Dsr9GVpbrATAnZO=2YQ0s2Q@mail.gmail.com, CAFj8pRA54AbTv2RXDTRxiAd8hy8wxmoVLqhJDRCwEnhdd7OUkw@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07c8651dd91d5aea38bee268acb582674ca4b5ea">http://git.postgresql.org/pg/commitdiff/07c8651dd91d5aea38bee268acb582674ca4b5ea</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move ALTER ... ALL IN to ProcessUtilitySlow. Now that ALTER TABLE .. ALL IN TABLESPACE has replaced the previous ALTER TABLESPACE approach, it makes sense to move the calls down in to ProcessUtilitySlow where the rest of ALTER TABLE is handled. This also means that event triggers will support ALTER TABLE .. ALL (which was the impetus for the original change, though it has other good qualities also). &Aacute;lvaro Herrera Back-patch to 9.4 as the original rework was. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0051c1a142ecaff7828b87315c26c7acbf8e583">http://git.postgresql.org/pg/commitdiff/f0051c1a142ecaff7828b87315c26c7acbf8e583</a></li>

<li>Add 'ignore_nulls' option to row_to_json. Provide an option to skip NULL values in a row when generating a JSON object from that row with row_to_json. This can reduce the size of the JSON object in cases where columns are NULL without really reducing the information in the JSON object. This also makes row_to_json into a single function with default values, rather than having multiple functions. In passing, change array_to_json to also be a single function with default values (we don't add an 'ignore_nulls' option yet- it's not clear that there is a sensible use-case there, and it hasn't been asked for in any case). Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95d737ff45a38809130a2c633d9e6bc26c825036">http://git.postgresql.org/pg/commitdiff/95d737ff45a38809130a2c633d9e6bc26c825036</a></li>

<li>Handle border = 3 in expanded mode. In psql, expanded mode was not being displayed correctly when using the normal ascii or unicode linestyles and border set to '3'. Now, per the documentation, border '3' is really only sensible for HTML and LaTeX formats, however, that's no excuse for ascii/unicode to break in that case, and provisions had been made for psql to cleanly handle this case (and it did, in non-expanded mode). This was broken when ascii/unicode was initially added a good five years ago because print_aligned_vertical_line wasn't passed in the border setting being used by print_aligned_vertical but instead was given the whole printTableContent. There really isn't a good reason for vertical_line to have the entire printTableContent structure, so just pass in the printTextFormat and border setting (similar to how this is handled in horizontal_line). Pointed out by Pavel Stehule, fix by me. Back-patch to all currently-supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82962838d4bea2a20babbd2efacb48b268b4a689">http://git.postgresql.org/pg/commitdiff/82962838d4bea2a20babbd2efacb48b268b4a689</a></li>

<li>Add unicode_{column|header|border}_style to psql With the unicode linestyle, this adds support to control if the column, header, or border style should be single or double line unicode characters. The default remains 'single'. In passing, clean up the border documentation and address some minor formatting/spelling issues. Pavel Stehule, with some additional changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2dabf0e1dda93c860b10bff7b73617e7b090108">http://git.postgresql.org/pg/commitdiff/a2dabf0e1dda93c860b10bff7b73617e7b090108</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow empty content in xml type. The xml type previously rejected "content" that is empty or consists only of spaces. But the SQL/XML standard allows that, so change that. The accepted values for XML "documents" are not changed. Reviewed-by: Ali Akbar &lt;the.apaan@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57b1085df55d092e2a728043ec607db8fdef2483">http://git.postgresql.org/pg/commitdiff/57b1085df55d092e2a728043ec607db8fdef2483</a></li>

<li>doc: Reflect renaming of Mac OS X to OS X bug #10528 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/220bb39dee8044937a963e81be8796e99bd8508b">http://git.postgresql.org/pg/commitdiff/220bb39dee8044937a963e81be8796e99bd8508b</a></li>

<li>Handle old versions of Test::More. Really old versions of Test::More don't support subplans, so skip the tests in that case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75717ce8f0cdca6a6778d0a9a6ef6d3196b9e483">http://git.postgresql.org/pg/commitdiff/75717ce8f0cdca6a6778d0a9a6ef6d3196b9e483</a></li>

<li>Support older versions of "prove". Apparently, older versions of "prove" (couldn't identify the exact version from the changelog) don't look into the t/ directory for tests by default, so specify it explicitly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8632ba6de4f3c61cb247267c6885f025bfadbb84">http://git.postgresql.org/pg/commitdiff/8632ba6de4f3c61cb247267c6885f025bfadbb84</a></li>

<li>Fix vacuumdb --analyze-in-stages --all order. When running vacuumdb --analyze-in-stages --all, it needs to run the first stage across all databases before the second one, instead of running all stages in a database before processing the next one. Also respect the --quiet option with --analyze-in-stages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da24813c2079c67363d5333bab5cfb3fcf969713">http://git.postgresql.org/pg/commitdiff/da24813c2079c67363d5333bab5cfb3fcf969713</a></li>

<li>pg_ctl: Add tests for behavior with nonexistent data directory. This behavior was made more precise in commit 11d205e2bd66cefe0b7d69c02e831cd055cbb5bb. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/839acf9461deb0affb0dd710723cffeb72ffd82f">http://git.postgresql.org/pg/commitdiff/839acf9461deb0affb0dd710723cffeb72ffd82f</a></li>

<li>Run missing documentation tools through "missing". Instead of just erroring out when a tool is missing, wrap the call with the "missing" script that we are already using for bison, flex, and perl, so that the users get a useful error message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2a01439c04404ad8b271f788188c807a3de67d1">http://git.postgresql.org/pg/commitdiff/c2a01439c04404ad8b271f788188c807a3de67d1</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change the spinlock primitives to function as compiler barriers. Previously, they functioned as barriers against CPU reordering but not compiler reordering, an odd API that required extensive use of volatile everywhere that spinlocks are used. That's error-prone and has negative implications for performance, so change it. In theory, this makes it safe to remove many of the uses of volatile that we currently have in our code base, but we may find that there are some bugs in this effort when we do. In the long run, though, this should make for much more maintainable code. Patch by me. Review by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0709b7ee72e4bc71ad07b7120acd117265ab51d0">http://git.postgresql.org/pg/commitdiff/0709b7ee72e4bc71ad07b7120acd117265ab51d0</a></li>

<li>Fix thinko in 0709b7ee72e4bc71ad07b7120acd117265ab51d0. Buildfarm member castoroides is unhappy with this, for entirely understandable reasons. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b26278822c69dd76ef89fd50ecc7cdba9c3f035">http://git.postgresql.org/pg/commitdiff/5b26278822c69dd76ef89fd50ecc7cdba9c3f035</a></li>

<li>Add missing volatile qualifier. Yet another silly mistake in 0709b7ee72e4bc71ad07b7120acd117265ab51d0, again found by buildfarm member castoroides. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68e66923ff629c324e219090860dc9e0e0a6f5d6">http://git.postgresql.org/pg/commitdiff/68e66923ff629c324e219090860dc9e0e0a6f5d6</a></li>

<li>Change NTUP_PER_BUCKET to 1 to improve hash join lookup speed. Since this makes the bucket headers use ~10x as much memory, properly account for that memory when we figure out whether everything fits in work_mem. This might result in some cases that previously used only a single batch getting split into multiple batches, but it's unclear as yet whether we need defenses against that case, and if so, what the shape of those defenses should be. It's worth noting that even in these edge cases, users should still be no worse off than they would have been last week, because commit 45f6240a8fa9d35548eb2ef23dba2c11540aa02a saved a big pile of memory on exactly the same workloads. Tomas Vondra, reviewed and somewhat revised by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cce08f168481c5fc5be4e7e29b968e314f1b41e">http://git.postgresql.org/pg/commitdiff/8cce08f168481c5fc5be4e7e29b968e314f1b41e</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Pack tuples in a hash join batch densely, to save memory. Instead of palloc'ing each HashJoinTuple individually, allocate 32kB chunks and pack the tuples densely in the chunks. This avoids the AllocChunk header overhead, and the space wasted by standard allocator's habit of rounding sizes up to the nearest power of two. This doesn't contain any planner changes, because the planner's estimate of memory usage ignores the palloc overhead. Now that the overhead is smaller, the planner's estimates are in fact more accurate. Tomas Vondra, reviewed by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45f6240a8fa9d35548eb2ef23dba2c11540aa02a">http://git.postgresql.org/pg/commitdiff/45f6240a8fa9d35548eb2ef23dba2c11540aa02a</a></li>

<li>Change the way latency is calculated with pgbench --rate option. The reported latency values now include the "schedule lag" time, that is, the time between the transaction's scheduled start time and the time it actually started. This relates better to a model where requests arrive at a certain rate, and we are interested in the response time to the end user or application, rather than the response time of the database itself. Also, when --rate is used, include the schedule lag time in the log output. The --rate option is new in 9.4, so backpatch to 9.4. It seems better to make this change in 9.4, while we're still in the beta period, than ship a 9.4 version that calculates the values differently than 9.5. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02e3bcc661598275a75a8649b48602dca7aeec79">http://git.postgresql.org/pg/commitdiff/02e3bcc661598275a75a8649b48602dca7aeec79</a></li>

<li>Silence compiler warning on Windows. David Rowley. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ed41529f6ab92b836336fdd096f924838eea1d7">http://git.postgresql.org/pg/commitdiff/0ed41529f6ab92b836336fdd096f924838eea1d7</a></li>

<li>Fix Windows build. I renamed a variable, but missed an #ifdef WIN32 block. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01a2bfd172b21ce86894bfa00f6896f504607ab4">http://git.postgresql.org/pg/commitdiff/01a2bfd172b21ce86894bfa00f6896f504607ab4</a></li>

<li>Simplify calculation of Poisson distributed delays in pgbench --rate mode. The previous coding first generated a uniform random value between 0.0 and 1.0, then converted that to an integer between 1 and 10000, and divided that again by 10000. Those conversions are unnecessary; we can use the double value that pg_erand48() returns directly. While we're at it, put the logic into a helper function, getPoissonRand(). The largest delay generated by the old coding was about 9.2 times the average, because of the way the uniformly distributed value used for the calculation was truncated to 1/10000 granularity. The new coding doesn't have such clamping. With my laptop's DBL_MIN value, the maximum delay with the new coding is about 700x the average. That seems acceptable - any reasonable pgbench session should last long enough to average that out. Backpatch to 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54a2d5b37b790cbfaf568fbbe6d2cc89650551d1">http://git.postgresql.org/pg/commitdiff/54a2d5b37b790cbfaf568fbbe6d2cc89650551d1</a></li>

<li>Remove dead InRecovery check. With the new B-tree incomplete split handling in 9.4, _bt_insert_parent is never called in recovery. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aae7af3df8054d83b3080f94ca98a5698e8b3de0">http://git.postgresql.org/pg/commitdiff/aae7af3df8054d83b3080f94ca98a5698e8b3de0</a></li>

<li>Fix GIN data page split ratio calculation. The code that tried to split a page at 75/25 ratio, when appending to the end of an index, was buggy in two ways. First, there was a silly typo that caused it to just fill the left page as full as possible. But the logic as it was intended wasn't correct either, and would actually have given a ratio closer to 60/40 than 75/25. Gaetano Mendola spotted the typo. Backpatch to 9.4, where this code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/774a78ffe47557313d69c2b27e7d61480a3b9d1f">http://git.postgresql.org/pg/commitdiff/774a78ffe47557313d69c2b27e7d61480a3b9d1f</a></li>

<li>Support Subject Alternative Names in SSL server certificates. This patch makes libpq check the server's hostname against DNS names listed in the X509 subjectAltName extension field in the server certificate. This allows the same certificate to be used for multiple domain names. If there are no SANs in the certificate, the Common Name field is used, like before this patch. If both are given, the Common Name is ignored. That is a bit surprising, but that's the behavior mandated by the relevant RFCs, and it's also what the common web browsers do. This also adds a libpq_ngettext helper macro to allow plural messages to be translated in libpq. Apparently this happened to be the first plural message in libpq, so it was not needed before. Alexey Klyukin, with some kibitzing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acd08d764a361dcebd346227281ff0ca62b60936">http://git.postgresql.org/pg/commitdiff/acd08d764a361dcebd346227281ff0ca62b60936</a></li>

<li>Fix pointer type in size passed to memset. Pointers are all the same size, so it makes no practical difference, but let's be tidy. Found by Coverity, noted off-list by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2df465e696f49bb12c0a362aa6f68f75a752d7a8">http://git.postgresql.org/pg/commitdiff/2df465e696f49bb12c0a362aa6f68f75a752d7a8</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Issue a warning during the creation of hash indexes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84aa8ba128a08e6fdebb2497c7a79ebf18093e12">http://git.postgresql.org/pg/commitdiff/84aa8ba128a08e6fdebb2497c7a79ebf18093e12</a></li>

<li>Implement mxid_age() to compute multi-xid age. Report by Josh Berkus 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36ad1a87a368d837d5c2260b2fd2ff83e976425a">http://git.postgresql.org/pg/commitdiff/36ad1a87a368d837d5c2260b2fd2ff83e976425a</a></li>

<li>pg_upgrade: check for large object size compatibility 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1598a15f4fb0f076a6034d3d3debb9776aff07a">http://git.postgresql.org/pg/commitdiff/e1598a15f4fb0f076a6034d3d3debb9776aff07a</a></li>

<li>pg_upgrade: compare control version, not catalog version. Also modify test for the possibility the large object value might not exist in the old cluster. Fix for commit e1598a15f4fb0f076a6034d3d3debb9776aff07a 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acc8e41681b4c07c60b2663e2e94bbff338189be">http://git.postgresql.org/pg/commitdiff/acc8e41681b4c07c60b2663e2e94bbff338189be</a></li>

<li>doc: improve configuration management section. Patch by David Johnston Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c4654afeb5208c80720b8c373a31c499237989b">http://git.postgresql.org/pg/commitdiff/4c4654afeb5208c80720b8c373a31c499237989b</a></li>

<li>Improve hash creation warning message. This improves the wording of commit 84aa8ba128a08e6fdebb2497c7a79ebf18093e12. Report by Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/849462a9fafbb30856e47f7862543b1aefa95796">http://git.postgresql.org/pg/commitdiff/849462a9fafbb30856e47f7862543b1aefa95796</a></li>

<li>pg_upgrade: adjust C comments 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3c75fcd7a03067d87b830e98e3698b683446762">http://git.postgresql.org/pg/commitdiff/c3c75fcd7a03067d87b830e98e3698b683446762</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add GUC to enable logging of replication commands. Previously replication commands like IDENTIFY_COMMAND were not logged even when log_statements is set to all. Some users who want to audit all types of statements were not satisfied with this situation. To address the problem, this commit adds new GUC log_replication_commands. If it's enabled, all replication commands are logged in the server log. There are many ways to allow us to enable that logging. For example, we can extend log_statement so that replication commands are logged when it's set to all. But per discussion in the community, we reached the consensus to add separate GUC for that. Reviewed by Ian Barwick, Robert Haas and Heikki Linnakangas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ad2a548050fdde07fed93e6c60a4d0a7eba0622">http://git.postgresql.org/pg/commitdiff/4ad2a548050fdde07fed93e6c60a4d0a7eba0622</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Etsuro Fujita sent in another revision of a patch to fix some odd behavior in the PostgreSQL FDW.</li>

<li>Alvaro Herrera sent in another revision of a patch to move a piece of the ALTER TABLESPACE ... MOVE command to a place where triggers can see it.</li>

<li>Fabien COELHO and Mitsumasa KONDO traded patches to add modulo (%) to pgbench.</li>

<li>Etsuro Fujita sent in another revision of a patch to optimize writes to foreign tables in the PostgreSQL FDW.</li>

<li>Alvaro Herrera sent in two more revisions of a patch to implement BRIN (previously minmax) indexes.</li>

<li>Michael Paquier sent in another revision of a patch to refactor the pg_basebackup utilities and support replslot creation and drop in pg_receivexlog.</li>

<li>Petr (PJMODOS) Jelinek sent in another revision of a patch to allow tracking commit timestamps.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to imply cut off the socket if signalled during sending to client.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to add a shutdown_at_recovery_time option to recovery.conf.</li>

<li>Fujii Masao sent in another revision of a patch to add a PENDING_LIST_CLEANUP_SIZE for GIN.</li>

<li>Tomas Vondra sent in five more revisions of a patch to fix a case where bad estimation together with large work_mem generates terribly slow hash joins.</li>

<li>Amit Kapila sent in two more revisions of a patch to scale buffer eviction.</li>

<li>Pavel Stehule sent in another revision of a patch to help PL/pgsql by adding a RAISE...WHEN construct.</li>

<li>Fabien COELHO and Heikki Linnakangas traded patches for a throttling latency limit in pgbench.</li>

<li>Marko (johto) Tiikkaja sent in two more revisions of a patch to add PGP armor headers to the pgcrypto contrib extension.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to process pg_hba.conf keywords in a case-insensitive fashion.</li>

<li>Robert Haas sent in another revision of a patch to add parallelism infrastructure by supporting frontend-backend protocol using a shared-memomry memory queue.</li>

<li>Stephen Frost sent in two more revisions of a patch to implement row-level access control.</li>

<li>Alvaro Herrera and Thomas Munro traded patches to implement SKIP LOCKED DATA.</li>

<li>David Rowley sent in a patch to fix an MSVC isnan warning.</li>

<li>Michael Paquier and Heikki Linnakangas traded patches to fix an issue where there was a suspicious check in the GIN code.</li>

<li>Michael Paquier sent in three revisions of a patch to fix an incorrect initialization of sentPtr in walsender.c.</li>

<li>David Rowley sent in a patch to allow removing INNER JOINs preemptively if certain conditions hold.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Amit Kapila sent in another revision of a patch to fix an issue with pg_basebackup on Windows.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of a patch to implement GROUPING SETS.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to implement PGP signatures for the crypto contrib extension.</li>

<li>Andreas 'ads' Scherbaum sent in another revision of a patch to fix the rounding documentation.</li>

<li>Alvaro Herrera and Simon Riggs traded patches to limit the use of heap-only tuples (HOT) under several conditions.</li>

<li>Heikki Linnakangas sent in a patch to implement compression of full page writes using slice-by-4 for CRCs.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to implement ALTER TABLE ... SET LOGGED.</li>

<li>Peter Geoghegan sent in another revision of a patch to speed up jsonb.</li>

<li>Alexander Korotkov sent in another revision of a patch to add partial sorting, which speeds up certain kinds of plans.</li>

<li>Peter Eisentraut sent in another revision of a patch to check for DocBook XML validity during the build.</li>

<li>Emre Hasegeli and Alexander Korotkov traded patches to implement KNN-GiST with recheck.</li>

</ul>