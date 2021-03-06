---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 mars 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/03/08/Nouvelles-hebdomadaires-de-PostgreSQL-6-mars-2016"
---


<p>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></p>

<p>[ndt: meetup à Nantes le jeudi 17 mars&nbsp;: <a target="_blank" href="http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/">http://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>barman 1.6.0, un gestionnaire de sauvegarde et restauration pour PostgreSQL&nbsp;: <a target="_blank" href="http://www.pgbarman.org/barman-1-6-0-released/">http://www.pgbarman.org/barman-1-6-0-released/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-03/">http://archives.postgresql.org/pgsql-jobs/2016-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>La premi&egrave;re conf&eacute;rence PostgreSQL pan-asiatique se tiendra les 17 et 19 mars 2016 &agrave; Singapour. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://2016.pgday.asia/">http://2016.pgday.asia/</a></li>

<li>Le PGDay nordique, une s&eacute;rie de conf&eacute;rences sur une seule journ&eacute;e, aura lieu &agrave; Helsinki (Finlande) le 17 mars 2016. Les inscriptions sont encore ouvertes&nbsp;: <a target="_blank" href="http://2016.nordicpgday.org/">http://2016.nordicpgday.org/</a></li>

<li>Les inscriptions pour le PGDay Paris 2016, pr&eacute;vu pour le 31 mars, sont ouvertes&nbsp;: <a target="_blank" href="http://www.pgday.paris/registration/">http://www.pgday.paris/registration/</a></li>

<li>La 8<sup>&egrave;me</sup> Session PostgreSQL aura lieu le 6 avril 2016 &agrave; Lyon (France).</li>

<li>La <em>PGConf US 2016</em> aura lieu les 18, 19 et 20 avril &agrave; New-York City. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://www.pgconf.us/2016/">http://www.pgconf.us/2016/</a></li>

<li>La <em>LinuxFest Northwest</em> aura lieu les 23 et 24 avril 2016 au Coll&egrave;ge Technique de Bellingham (Washington, USA). L'appel &agrave; conf&eacute;renciers est maintenant lanc&eacute;&nbsp;: <a target="_blank" href="http://www.linuxfestnorthwest.org/2016/present">http://www.linuxfestnorthwest.org/2016/present</a></li>

<li>FOSS4G NA (<em>Free and Open Source Software for Geospatial - North America</em>) se tiendra &agrave; Raleigh, en Caroline du Nord, du 2 au 5 mai 2016. Les candidatures de conf&eacute;renciers sont encore accept&eacute;es&nbsp;: <a target="_blank" href="https://2016.foss4g-na.org/cfp">https://2016.foss4g-na.org/cfp</a></li>

<li>La <em>PGCon 2016</em> se tiendra du 17 au 21 mai 2016 &agrave; Ottawa&nbsp;: <a target="_blank" href="http://www.pgcon.org/">http://www.pgcon.org/</a></li>

<li>Le PGDay suisse sera, cette ann&eacute;e, tenue &agrave; l'Universit&eacute; des Sciences Appliqu&eacute;es (HSR) de Rapperswil le 24 juin 2016. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: <a target="_blank" href="http://www.pgday.ch/">http://www.pgday.ch/</a></li>

<li>"5432 ... Meet us!" aura lieu &agrave; Milan (Italie) les 28 &amp; 29 juin 2016. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 mars&nbsp;: <a target="_blank" href="http://5432meet.us/">http://5432meet.us/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160306234210.GE28543@fetter.org">http://www.postgresql.org/message-id/20160306234210.GE28543@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Avoid multiple free_struct_lconv() calls on same data. A failure partway through PGLC_localeconv() led to a situation where the next call would call free_struct_lconv() a second time, leading to free() on already-freed strings, typically leading to a core dump. Add a flag to remember whether we need to do that. Per report from Thom Brown. His example case only provokes the failure as far back as 9.4, but nonetheless this code is obviously broken, so back-patch to all supported branches. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/907e4dd2b104bdcb4af042065a92fcd73d5790ec">http://git.postgresql.org/pg/commitdiff/907e4dd2b104bdcb4af042065a92fcd73d5790ec</a></li>

<li>Fix build under OPTIMIZER_DEBUG. In commit 19a541143a09c067 I replaced RelOptInfo.width with RelOptInfo.reltarget.width, but I missed updating debug_print_rel() for that because it's not compiled by default. Reported by Salvador Fandino, patch by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05893712cc9950b7c4c312aa9d3d444375bf15a2">http://git.postgresql.org/pg/commitdiff/05893712cc9950b7c4c312aa9d3d444375bf15a2</a></li>

<li>Remove useless unary plus. It's harmless, but might confuse readers. Seems to have been introduced in 6bc8ef0b7f1f1df3. Back-patch, just to avoid cosmetic cross-branch differences. Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c110678a47aac87c661785a70061e160cd17713d">http://git.postgresql.org/pg/commitdiff/c110678a47aac87c661785a70061e160cd17713d</a></li>

<li>Improve error message for rejecting RETURNING clauses with dropped columns. This error message was written with only ON SELECT rules in mind, but since then we also made RETURNING-clause targetlists go through the same logic. This means that you got a rather off-topic error message if you tried to add a rule with RETURNING to a table having dropped columns. Ideally we'd just support that, but some preliminary investigation says that it might be a significant amount of work. Seeing that Nicklas Av&Atilde;&copy;n's complaint is the first one we've gotten about this in the ten years or so that the code's been like that, I'm unwilling to put much time into it. Instead, improve the error report by issuing a different message for RETURNING cases, and revise the associated comment based on this investigation. Discussion: 1456176604.17219.9.camel@jordogskog.no <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d8ff5f7db7d58240fac7d5f620308c91485b253">http://git.postgresql.org/pg/commitdiff/8d8ff5f7db7d58240fac7d5f620308c91485b253</a></li>

<li>Suppress scary-looking log messages from async-notify isolation test. I noticed that the async-notify test results in log messages like these: LOG: could not send data to client: Broken pipe FATAL: connection to client lost This is because it unceremoniously disconnects a client session that is about to have some NOTIFY messages delivered to it. Such log messages during a regression test might well cause people to go looking for a problem that doesn't really exist (it did cause me to waste some time that way). We can shut it up by adding an UNLISTEN command to session teardown. Patch HEAD only; this doesn't seem significant enough to back-patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d523564c53ab8f35edf4d20627f0a375a17624d">http://git.postgresql.org/pg/commitdiff/3d523564c53ab8f35edf4d20627f0a375a17624d</a></li>

<li>Improve coverage of pltcl regression tests. Test composite-type arguments and the argisnull and spi_lastoid Tcl commmands. This stuff was not covered before, but needs to be exercised since the upcoming Tcl object-conversion patch changes these code paths (and broke at least one of them). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68c521eb92c3515e3306f51a7fd3f32d16c97524">http://git.postgresql.org/pg/commitdiff/68c521eb92c3515e3306f51a7fd3f32d16c97524</a></li>

<li>Fix TAP tests for older Perls. Commit 7132810c (Retain tempdirs for failed tests) used Test::More's is_passing method, but that was added in Test::More 0.89_01 which is sometime later than Perl 5.10.1. Popular platforms such as RHEL6 don't have that, nevermind some of our older dinosaurs. Do it the hard way. Michael Paquier, based on research by Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b8d7215533ed3128b1b9174eae830d70c0453d0">http://git.postgresql.org/pg/commitdiff/3b8d7215533ed3128b1b9174eae830d70c0453d0</a></li>

<li>Convert PL/Tcl to use Tcl's "object" interfaces. The original implementation of Tcl was all strings, but they improved performance significantly by introducing typed "objects" (integers, lists, code, etc). It's past time we made use of that; that happened in Tcl 8.0 which was released in 1997. This patch also modernizes some of the error-reporting code, which may cause small changes in the spelling of complaints about bad calls to PL/Tcl-provided commands. Jim Nasby and Karl Lehenbauer, reviewed by Victor Wagner <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/287822068246a6ae30bb2c7191de727672ae6328">http://git.postgresql.org/pg/commitdiff/287822068246a6ae30bb2c7191de727672ae6328</a></li>

<li>Make PL/Tcl require Tcl 8.4 or later. As of commit 287822068246a6ae30bb2c7191de727672ae6328, PL/Tcl will not compile against pre-8.0 Tcl, whereas it used to work (more or less anyway) with quite prehistoric versions. As long as we're moving these goalposts, let's reinstall them at someplace that has some thought behind it. This commit sets the minimum allowed Tcl version at 8.4, and rips out some bits of compatibility cruft that are in consequence no longer needed. Reasons for requiring 8.4 include: * 8.4 was released in 2002; there seems little reason to believe that anyone would want to use older versions with Postgres 9.6+. * We have no buildfarm members testing anything older than 8.4, and thus no way to know if it's broken. * We need at least 8.1 to allow enforcement of database encoding security (8.1 standardized Tcl on using UTF8 internally, before that it was pretty unpredictable). * Some versions between 8.1 and 8.4 allowed the backend to become multithreaded, which is disastrous. We need at least 8.4 to be able to disable the Tcl notifier subsystem to prevent that. A small side benefit is that we can make the code more readable by doing s/CONST84/const/g. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2609323eb58ee273ac03a66343447e6a56154d5">http://git.postgresql.org/pg/commitdiff/e2609323eb58ee273ac03a66343447e6a56154d5</a></li>

<li>Fix PL/Tcl's encoding conversion logic. PL/Tcl appears to contain logic to convert strings between the database encoding and UTF8, which is the only encoding modern Tcl will deal with. However, that code has been disabled since commit 034895125d648b86, which made it "#if defined(UNICODE_CONVERSION)" and neglected to provide any way for that symbol to become defined. That might have been all right back in 2001, but these days we take a dim view of allowing strings with incorrect encoding into the database. Remove the conditional compilation, fix warnings about signed/unsigned char conversions, clean up assorted places that didn't bother with conversions. (Notably, there were lots of assumptions that database table and field names didn't need conversion...) Add a regression test based on plpython_unicode. It's not terribly thorough, but better than no test at all. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8c7c93de8e116d802eddfd8821f8f77588aee00">http://git.postgresql.org/pg/commitdiff/c8c7c93de8e116d802eddfd8821f8f77588aee00</a></li>

<li>Create stub functions to support pg_upgrade of old contrib/tsearch2. Commits 9ff60273e35cad6e and dbe2328959e12701 adjusted the declarations of some core functions referenced by contrib/tsearch2's install script, forgetting that in a pg_upgrade situation, we'll be trying to restore operator class definitions that reference the old signatures. We've hit this problem before; solve it in the same way as before, namely by installing stub functions that have the expected signature and just invoke the correct function. Per report from Jeff Janes. (Someday we ought to stop supporting contrib/tsearch2, but I'm not sure today is that day.) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb43e851d6b3fa0c4516efcfdf29a183f7717a43">http://git.postgresql.org/pg/commitdiff/eb43e851d6b3fa0c4516efcfdf29a183f7717a43</a></li>

<li>Fix json_to_record() bug with nested objects. A thinko concerning nesting depth caused json_to_record() to produce bogus output if a field of its input object contained a sub-object with a field name matching one of the requested output column names. Per bug #13996 from Johann Visagie. I added a regression test case based on his example, plus parallel tests for json_to_recordset, jsonb_to_record, jsonb_to_recordset. The latter three do not exhibit the same bug (which suggests that we may be missing some opportunities to share code...) but testing seems like a good idea in any case. Back-patch to 9.4 where these functions were introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9d199f6d3b998929cdb8e8aa61e5cd8db9b220f">http://git.postgresql.org/pg/commitdiff/a9d199f6d3b998929cdb8e8aa61e5cd8db9b220f</a></li>

<li>Make stats regression test robust in the face of parallel query. Historically, the wait_for_stats() function in this test has simply checked for a report of an indexscan on tenk2, corresponding to the last command issued before we expect stats updates to appear. However, with parallel query that indexscan could be done by a parallel worker that will emit its stats counters to the collector before the session's main backend does (a full second before, in fact, thanks to the "pg_sleep(1.0)" added by commit 957d08c81f9cc277). That leaves a sizable window in which an autovacuum-triggered write of the stats files would present a state in which the indexscan on tenk2 appears to have been done, but none of the write updates performed by the test have been. This is evidently the explanation for intermittent failures seen by me and on buildfarm member mandrill. To fix, we should check separately for both the tenk2 seqscan and indexscan counts, since those might be reported by different processes that could be delayed arbitrarily on an overloaded test machine. And we need to check for at least one update-related count. If we ever allow parallel workers to do writes, this will get even more complicated ... but in view of all the other hard problems that will entail, I don't feel a need to solve this one today. Per research by Rahila Syed and myself; part of this patch is Rahila's. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60690a6fe8351995b1eeb9a53f2b634c3bce3a3d">http://git.postgresql.org/pg/commitdiff/60690a6fe8351995b1eeb9a53f2b634c3bce3a3d</a></li>

</ul>

<p>Dean Rasheed pushed:</p>

<ul>

<li>Fix incorrect varlevelsup in security_barrier_replace_vars(). When converting an RTE with securityQuals into a security barrier subquery RTE, ensure that the Vars in the new subquery's targetlist all have varlevelsup = 0 so that they correctly refer to the underlying base relation being wrapped. The original code was creating new Vars by copying them from existing Vars referencing the base relation found elsewhere in the query, but failed to account for the fact that such Vars could come from sublink subqueries, and hence have varlevelsup &gt; 0. In practice it looks like this could only happen with nested security barrier views, where the outer view has a WHERE clause containing a correlated subquery, due to the order in which the Vars are processed. Bug: #13988 Reported-by: Adam Guthrie Backpatch-to: 9.4, where updatable SB views were introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41fedc24626696fdf55d0c43131d91757dbe1c66">http://git.postgresql.org/pg/commitdiff/41fedc24626696fdf55d0c43131d91757dbe1c66</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Make new isolationtester test more stable. The original coding of the test was relying too much on the ordering in which backends are awakened once an advisory lock which they wait for is released. Change the code so that each backend uses its own advisory lock instead, so that the output becomes stable. Also add a few seconds of sleep between lock releases, so that the test isn't broken in overloaded buildfarm animals, as suggested by Tom Lane. Per buildfarm members spoonbill and guaibasaurus. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/19294.1456551587%40sss.pgh.pa.us">https://www.postgresql.org/message-id/19294.1456551587%40sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54638f5708e59e5fd7c79b8315d8c6e810d7bc13">http://git.postgresql.org/pg/commitdiff/54638f5708e59e5fd7c79b8315d8c6e810d7bc13</a></li>

<li>doc: document MANPATH as /usr/local/pgsql/share/man. The docs were advising to use /usr/local/pgsql/man instead, but that's wrong. Reported-By: Slawomir Sudnik Backpatch-To: 9.1 Bug: #13894 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c7c189fc1961f890bc06d6adb6bdfc739f5f927">http://git.postgresql.org/pg/commitdiff/1c7c189fc1961f890bc06d6adb6bdfc739f5f927</a></li>

<li>Fix typos. Author: Amit Langote <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10b4852215a37915e55f034f919a6dc8bc72e988">http://git.postgresql.org/pg/commitdiff/10b4852215a37915e55f034f919a6dc8bc72e988</a></li>

<li>Minor tweaks for new src/test/recovery. Author: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5847397deca66fb4a4b3d2e0dcb3414dd5c4e180">http://git.postgresql.org/pg/commitdiff/5847397deca66fb4a4b3d2e0dcb3414dd5c4e180</a></li>

<li>TAP tests: retain temp dirs on test failure. This makes it easier to study the reason for the failure. Author: Kyotaro Horiguchi Reviewed-By: Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88802e068017bee8cea7a5502a712794e761c7b5">http://git.postgresql.org/pg/commitdiff/88802e068017bee8cea7a5502a712794e761c7b5</a></li>

<li>Add more tests for commit_timestamp feature. These tests verify that 1) WAL replay preserves the stored value, 2) a streaming standby server replays the value obtained from the master, and 3) the behavior is sensible in the face of repeated configuration changes. One annoyance is that tmp_check/ subdir from the TAP tests is clobbered when the pg_regress test runs in the same subdirectory. This is bothersome but not too terrible a problem, since the pg_regress test is not run anyway if the TAP tests fail (unless "make -k" is used). I had these tests around since commit 69e7235c93e2; add them now that we have the recovery test framework in place. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9def031bd2821f35b5f506260d922482648a8bb0">http://git.postgresql.org/pg/commitdiff/9def031bd2821f35b5f506260d922482648a8bb0</a></li>

<li>Prefix temp data dirs with the node name. This makes it easier to relate the temporary data dirs to each node in a test script. Author: Kyotaro Horiguchi Reviewed-By: Craig Ringer, Alvaro Herrera <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc6077d4d540d821548b704dc6e2f349da736f62">http://git.postgresql.org/pg/commitdiff/cc6077d4d540d821548b704dc6e2f349da736f62</a></li>

<li>Fix mistakes in recovery tests. One test was relying on method remove_tree that isn't implemented in the oldest Perl we support; fix it by using the older rmtree instead. Another test had a typo in a SQL command, which isn't noticed because the PostgresNode-&gt;psql() method doesn't check that queries return correctly. That's undesirable and will also be fixed later on, but for now let's make the test actually work. Author: Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bec1ad4648e71711357caa0ae0030f5ccb911d7">http://git.postgresql.org/pg/commitdiff/5bec1ad4648e71711357caa0ae0030f5ccb911d7</a></li>

<li>perltidy PostgresNode and SimpleTee. Also, mention in README that Perl files should be perltidy'ed. This isn't really the best place (since we have Perl files elsewhere in the tree) and this is already in pgindent's README, but this subdir is likely to get hacked a whole lot more than the other Perl files, so it seems okay to spend two lines on this. Author: Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d9a4301c08148509136c296866196f6b19ee2c2">http://git.postgresql.org/pg/commitdiff/7d9a4301c08148509136c296866196f6b19ee2c2</a></li>

<li>Rework PostgresNode's psql method. This makes the psql() method much more capable: it captures both stdout and stderr; it now returns the psql exit code rather than stdout; a timeout can now be specified, as can ON_ERROR_STOP behavior; it gained a new "on_error_die" (defaulting to off) parameter to raise an exception if there's any problem. Finally, additional parameters to psql can be passed if there's need for further tweaking. For convenience, a new safe_psql() method retains much of the old behavior of psql(), except that it uses on_error_die on, so that problems like syntax errors in SQL commands can be detected more easily. Many existing TAP test files now use safe_psql, which is what is really wanted. A couple of -&gt;psql() calls are now added in the commit_ts tests, which verify that the right thing is happening on certain errors. Some -&gt;command_fails() calls in recovery tests that were verifying that psql failed also became -&gt;psql() calls now. Author: Craig Ringer. Some tweaks by &Atilde;lvaro Herrera Reviewed-By: Micha&Atilde;&laquo;l Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c83f435a3deca745c666e9778229d64cb2dfc79">http://git.postgresql.org/pg/commitdiff/2c83f435a3deca745c666e9778229d64cb2dfc79</a></li>

<li>pgbench: accept unambiguous builtin prefixes for -b. This makes it easier to use "-b se" instead of typing the full "-b select-only". Author: Fabien Coelho Reviewed-by: Micha&Atilde;&laquo;l Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d561f1caecbbeca2f7adab39a29432923d15b8ef">http://git.postgresql.org/pg/commitdiff/d561f1caecbbeca2f7adab39a29432923d15b8ef</a></li>

<li>Add 'tap_tests' flag in config_default.pl. This makes the flag more visible for testers using the default file as a template, increasing the likelyhood that the test suite will be run. Also have the flag be displayed in the fake "configure" output, if set. This patch is two new lines only, but perltidy decides to shift things around which makes it appear a bit bigger. Author: Micha&Atilde;&laquo;l Paquier Reviewed-by: Craig Ringer Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqRet6UAP2APhZAZw%3DVhJ6w-Q-gGLdZkrOqFgd2vc9-ZDw%40mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqRet6UAP2APhZAZw%3DVhJ6w-Q-gGLdZkrOqFgd2vc9-ZDw%40mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52fe6f4e02f89f6230994988af9abc23b332b83e">http://git.postgresql.org/pg/commitdiff/52fe6f4e02f89f6230994988af9abc23b332b83e</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>UCS_to_most.pl: Make executable, for consistency with other scripts <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a3e06baa2e42a5018dcd6afda31255b4e772518">http://git.postgresql.org/pg/commitdiff/9a3e06baa2e42a5018dcd6afda31255b4e772518</a></li>

<li>Add Unicode map generation scripts as rule prerequisites. That way, the rules will trigger when the scripts change. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd6cf3f237c9aeb4dad1ac3ec2008c5768fe4c1b">http://git.postgresql.org/pg/commitdiff/bd6cf3f237c9aeb4dad1ac3ec2008c5768fe4c1b</a></li>

<li>Fix comments. Some of these comments were copied and pasted without updating them, some of them were duplicates. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc074bf6c1a5305a5e23067c6d9a377840add303">http://git.postgresql.org/pg/commitdiff/cc074bf6c1a5305a5e23067c6d9a377840add303</a></li>

<li>Add prerequisite for KOI8-U.TXT. This was missed when the encoding was added. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1fa2a6b1d4023e7c5890d095364dea0e0bf24a59">http://git.postgresql.org/pg/commitdiff/1fa2a6b1d4023e7c5890d095364dea0e0bf24a59</a></li>

<li>Add missing rules related to EUC_JIS_2004 and SHIFT_JIS_2004 encodings. This was apparently forgotten in commit 75c6519ff68dbb97f73b13e9976fb8075bbde7b8. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a4a813c993ed767e2c2952f7a89a75ce6e56b6b">http://git.postgresql.org/pg/commitdiff/7a4a813c993ed767e2c2952f7a89a75ce6e56b6b</a></li>

<li>Make some adjustments in variable assignments. These variables aren't really used for anything interesting, but it seems the existing grouping was somewhat nonsensical. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b497abc6022f7ac13e8a59d9b3a14f8ba6d39791">http://git.postgresql.org/pg/commitdiff/b497abc6022f7ac13e8a59d9b3a14f8ba6d39791</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Extend pgbench's expression syntax to support a few built-in functions. Fabien Coelho, reviewed mostly by Michael Paquier and me, but also by Heikki Linnakangas, BeomYong Lee, Kyotaro Horiguchi, Oleksander Shulgin, and &Atilde;lvaro Herrera. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e137f846df2431ce9c61202dcea21ee4a6d7822">http://git.postgresql.org/pg/commitdiff/7e137f846df2431ce9c61202dcea21ee4a6d7822</a></li>

<li>Fix mistake in extensible node code. I believe that I (rhaas) introduced this bug while editing the patch that became bcac23de73b89b001fbc628d84471a392e928d1c. Report and patch from KaiGai Kohei. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aec64e8f45209b084fa33482de3831bc68b18913">http://git.postgresql.org/pg/commitdiff/aec64e8f45209b084fa33482de3831bc68b18913</a></li>

<li>Fix incorrect comment. PQmblen and PQdsplen return information about characters, not words. Kyotaro Horiguchi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/212bba93ce52e5605f8b7fc1ede2e7aef797c372">http://git.postgresql.org/pg/commitdiff/212bba93ce52e5605f8b7fc1ede2e7aef797c372</a></li>

<li>Change the format of the VM fork to add a second bit per page. The new bit indicates whether every tuple on the page is already frozen. It is cleared only when the all-visible bit is cleared, and it can be set only when we vacuum a page and find that every tuple on that page is both visible to every transaction and in no need of any future vacuuming. A future commit will use this new bit to optimize away full-table scans that would otherwise be triggered by XID wraparound considerations. A page which is merely all-visible must still be scanned in that case, but a page which is all-frozen need not be. This commit does not attempt that optimization, although that optimization is the goal here. It seems better to get the basic infrastructure in place first. Per discussion, it's very desirable for pg_upgrade to automatically migrate existing VM forks from the old format to the new format. That, too, will be handled in a follow-on patch. Masahiko Sawada, reviewed by Kyotaro Horiguchi, Fujii Masao, Amit Kapila, Simon Riggs, Andres Freund, and others, and substantially revised by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a892234f830e832110f63fc0a2afce2fb21d1584">http://git.postgresql.org/pg/commitdiff/a892234f830e832110f63fc0a2afce2fb21d1584</a></li>

<li>postgres_fdw: When sending ORDER BY, always include NULLS FIRST/LAST. Previously, we included NULLS FIRST when appropriate but relied on the default behavior to be NULLS LAST. This is, however, not true for a sort in descending order and seems like a fragile assumption anyway. Report by Rajkumar Raghuwanshi. Patch by Ashutosh Bapat. Review comments from Michael Paquier and Tom Lane. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3bea3f88d5fc3517042ba83d2906979256da2442">http://git.postgresql.org/pg/commitdiff/3bea3f88d5fc3517042ba83d2906979256da2442</a></li>

<li>Fix the way GetExistingLocalJoinPath is documented. The old approach made it look like it was an FDW callback, which it is not. Per a gripe from Stephen Frost. Patch by me, reviewed by Ashutosh Bapat. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33b5eab7ab82a355629257f1b11fd9fcf4ff6f28">http://git.postgresql.org/pg/commitdiff/33b5eab7ab82a355629257f1b11fd9fcf4ff6f28</a></li>

<li>Fix query-based tab completion for multibyte characters. The existing code confuses the byte length of the string (which is relevant when passing it to pg_strncasecmp) with the character length of the string (which is relevant when it is used with the SQL substring function). Separate those two concepts. Report and patch by Kyotaro Horiguchi, reviewed by Thomas Munro and reviewed and further revised by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9445db925e78c2c4fb12067ad5618e2aecabe109">http://git.postgresql.org/pg/commitdiff/9445db925e78c2c4fb12067ad5618e2aecabe109</a></li>

<li>Fix InitializeSessionUserId not to deference NULL rolename pointer. Dmitriy Sarafannikov, reviewed by Michael Paquier and Haribabu Kommi, with a minor fix by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/546cd0d7664ee0f120ef3b267d4303190bdfdb94">http://git.postgresql.org/pg/commitdiff/546cd0d7664ee0f120ef3b267d4303190bdfdb94</a></li>

<li>Minor optimizations based on ParallelContext having nworkers_launched. Originally, we didn't have nworkers_launched, so code that used parallel contexts had to be preprared for the possibility that not all of the workers requested actually got launched. But now we can count on knowing the number of workers that were successfully launched, which can shave off a few cycles and simplify some code slightly. Amit Kapila, reviewed by Haribabu Kommi, per a suggestion from Peter Geoghegan. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df4685fb0cad1c75970b6e8d0aacca4d03545e04">http://git.postgresql.org/pg/commitdiff/df4685fb0cad1c75970b6e8d0aacca4d03545e04</a></li>

<li>Fix SerializeSnapshot not to overrun the allocated space. Rushabh Lathia <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17b124d30317eb194dc8b2fa86b1ebc5b09ac8f3">http://git.postgresql.org/pg/commitdiff/17b124d30317eb194dc8b2fa86b1ebc5b09ac8f3</a></li>

<li>Minor improvements to transaction manager README. A simple SELECT is handled by PortalRunSelect, not ProcessQuery. Also, the previous indentation was unclear: change it so that a deeper level of indentation indicates that the outer function calls the inner one. Stas Kelvich <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fcde8a5c80e46e9e92f50f62093cba5899312fd">http://git.postgresql.org/pg/commitdiff/6fcde8a5c80e46e9e92f50f62093cba5899312fd</a></li>

<li>Fix typo in comment. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/708020eb7b08395626707fef0010547bf5764409">http://git.postgresql.org/pg/commitdiff/708020eb7b08395626707fef0010547bf5764409</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>logical decoding: fix decoding of a commit's commit time. When adding replication origins in 5aa235042, I somehow managed to set the timestamp of decoded transactions to InvalidXLogRecptr when decoding one made without a replication origin. Fix that, and the wrong type of the new commit_time variable. This didn't trigger a regression test failure because we explicitly don't show commit timestamps in the regression tests, as they obviously are variable. Add a test that checks that a decoded commit's timestamp is within minutes of NOW() from before the commit. Reported-By: Weiping Qu Diagnosed-By: Artur Zakirov Discussion: 56D4197E.9050706@informatik.uni-kl.de, 56D42918.1010108@postgrespro.ru Backpatch: 9.5, where 5aa235042 originates. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c17aac69dcae610b08c5965161151cd282f16bc">http://git.postgresql.org/pg/commitdiff/7c17aac69dcae610b08c5965161151cd282f16bc</a></li>

<li>Force synchronous_commit=on in test_decoding's concurrent_ddl_dml.spec. Otherwise running installcheck-force on a server with synchronous_commit=off will result in the tests failing. All the other tests already do so... Backpatch: 9.4, where logical decoding was added <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1986c3c440151b056877b446e7d9c2861906aa26">http://git.postgresql.org/pg/commitdiff/1986c3c440151b056877b446e7d9c2861906aa26</a></li>

<li>logical decoding: old/newtuple in spooled UPDATE changes was switched around. Somehow I managed to flip the order of restoring old &amp; new tuples when de-spooling a change in a large transaction from disk. This happens to only take effect when a change is spooled to disk which has old/new versions of the tuple. That only is the case for UPDATEs where he primary key changed or where replica identity is changed to FULL. The tests didn't catch this because either spooled updates, or updates that changed primary keys, were tested; not both at the same time. Found while adding tests for the following commit. Backpatch: 9.4, where logical decoding was added <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bda14d54cf24dedcd2011559a53cc62702e421b">http://git.postgresql.org/pg/commitdiff/0bda14d54cf24dedcd2011559a53cc62702e421b</a></li>

<li>logical decoding: Fix handling of large old tuples with replica identity full. When decoding the old version of an UPDATE or DELETE change, and if that tuple was bigger than MaxHeapTupleSize, we either Assert'ed out, or failed in more subtle ways in non-assert builds. Normally individual tuples aren't bigger than MaxHeapTupleSize, with big datums toasted. But that's not the case for the old version of a tuple for logical decoding; the replica identity is logged as one piece. With the default replica identity btree limits that to small tuples, but that's not the case for FULL. Change the tuple buffer infrastructure to separate allocate over-large tuples, instead of always going through the slab cache. This unfortunately requires changing the ReorderBufferTupleBuf definition, we need to store the allocated size someplace. To avoid requiring output plugins to recompile, don't store HeapTupleHeaderData directly after HeapTupleData, but point to it via t_data; that leaves rooms for the allocated size. As there's no reason for an output plugin to look at ReorderBufferTupleBuf-&gt;t_data.header, remove the field. It was just a minor convenience having it directly accessible. Reported-By: Adam Dratwi&Aring;&bdquo;ski Discussion: CAKg6ypLd7773AOX4DiOGRwQk1TVOQKhNwjYiVjJnpq8Wo+i62Q@mail.gmail.com <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8f621c43a599b35dc004ee09627bf4688cbbb84">http://git.postgresql.org/pg/commitdiff/c8f621c43a599b35dc004ee09627bf4688cbbb84</a></li>

<li>logical decoding: Tell reorderbuffer about all xids. Logical decoding's reorderbuffer keeps transactions in an LSN ordered list for efficiency. To make that's efficiently possible upper-level xids are forced to be logged before nested subtransaction xids. That only works though if these records are all looked at: Unfortunately we didn't do so for e.g. row level locks, which are otherwise uninteresting for logical decoding. This could lead to errors like: "ERROR: subxact logged without previous toplevel record". It's not sufficient to just look at row locking records, the xid could appear first due to a lot of other types of records (which will trigger the transaction to be marked logged with MarkCurrentTransactionIdLoggedIfAny). So invent infrastructure to tell reorderbuffer about xids seen, when they'd otherwise not pass through reorderbuffer.c. Reported-By: Jarred Ward Bug: #13844 Discussion: 20160105033249.1087.66040@wrigleys.postgresql.org Backpatch: 9.4, where logical decoding was added <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9e903f3cbbd00c7ba7d4974e6852c3d2cbf4447">http://git.postgresql.org/pg/commitdiff/d9e903f3cbbd00c7ba7d4974e6852c3d2cbf4447</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Add prefix to pl/pgsql global variables and functions. Rename pl/pgsql global variables to always have a plpgsql_ prefix, so they don't conflict with other shared libraries loaded. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c90996a4cbfe02639f2ba31d22f9159832de869">http://git.postgresql.org/pg/commitdiff/6c90996a4cbfe02639f2ba31d22f9159832de869</a></li>

<li>Fix typos. Author: Guillaume Lelarge <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b46259b46b3d34e6858afbf3d28c30cef12652b">http://git.postgresql.org/pg/commitdiff/2b46259b46b3d34e6858afbf3d28c30cef12652b</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Revert buggy optimization of index scans 606c0123d627 attempted to reduce cost of index scans using &gt; and &lt; strategies, though got that completely wrong in a few complex cases. Revert whole patch until we find a safe optimization. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c7111d11b188bd631a63c98e9aab8532176007c3">http://git.postgresql.org/pg/commitdiff/c7111d11b188bd631a63c98e9aab8532176007c3</a></li>

</ul>

<p>Teodor Sigaev pushed:</p>

<ul>

<li>Fix Windows build broken by d78a7d9c7fa3e9cd494b906f065fe7b7fe9fb9a5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e7557dc8d5b2008b0b096cd730d16c8562690fc">http://git.postgresql.org/pg/commitdiff/0e7557dc8d5b2008b0b096cd730d16c8562690fc</a></li>

<li>Improve support of Hunspell in ispell dictionary. Now it's possible to load recent version of Hunspell for several languages. To handle these dictionaries Hunspell patch adds support for: * FLAG long - sets the double extended ASCII character flag type * FLAG num - sets the decimal number flag type (from 1 to 65535) * AF parameter - alias for flag's set Also it moves test dictionaries into separate directory. Author: Artur Zakirov with editorization by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d78a7d9c7fa3e9cd494b906f065fe7b7fe9fb9a5">http://git.postgresql.org/pg/commitdiff/d78a7d9c7fa3e9cd494b906f065fe7b7fe9fb9a5</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Ignore recovery_min_apply_delay until recovery has reached consistent state. Previously recovery_min_apply_delay was applied even before recovery had reached consistency. This could cause us to wait a long time unexpectedly for read-only connections to be allowed. It's problematic because the standby was useless during that wait time. This patch changes recovery_min_apply_delay so that it's applied once the database has reached the consistent state. That is, even if the delay is set, the standby tries to replay WAL records as fast as possible until it has reached consistency. Author: Michael Paquier Reviewed-By: Julien Rouhaud Reported-By: Greg Clough Backpatch: 9.4, where recovery_min_apply_delay was added Bug: #13770 Discussion: <a target="_blank" href="http://www.postgresql.org/message-id/20151111155006.2644.84564@wrigleys.postgresql.org">http://www.postgresql.org/message-id/20151111155006.2644.84564@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d34794f7d5566effd342dd0ebaca3de3b48656f0">http://git.postgresql.org/pg/commitdiff/d34794f7d5566effd342dd0ebaca3de3b48656f0</a></li>

</ul>

<p>Joe Conway pushed:</p>

<ul>

<li>Expose control file data via SQL accessible functions. Add four new SQL accessible functions: pg_control_system(), pg_control_checkpoint(), pg_control_recovery(), and pg_control_init() which expose a subset of the control file data. Along the way move the code to read and validate the control file to src/common, where it can be shared by the new backend functions and the original pg_controldata frontend program. Patch by me, significant input, testing, and review by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc7d70ea05deca9dfc6a25043d406b57cc8f6c30">http://git.postgresql.org/pg/commitdiff/dc7d70ea05deca9dfc6a25043d406b57cc8f6c30</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Peter Eisentraut sent in another revision of a patch add pg_ctl promote wait.</p>

<p>Thomas Munro sent in two more revisions of a patch to add 'causal reads.'</p>

<p>Joe Conway and Pavel St&Auml;&rsaquo;hule traded patches to add a SET ROLE hook.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement access method extensibility.</p>

<p>Kaigai Kouhei sent in a patch to rework the serialization/deserialization interface for CustomScan.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to fix a bug where setting OPTIMIZER_DEBUG broke the compilation.</p>

<p>Teodor Sigaev sent in another revision of a patch to make OR use indexes.</p>

<p>Dmitry Dolgov sent in another revision of a patch to add a jsonb_insert() function.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to implement generic logical WAL messages.</p>

<p>Peter Geoghegan sent in a patch to add amcheck, a B-Tree integrity checking tool.</p>

<p>Peter Eisentraut sent in another revision of a patch to remove the "archive" WAL level.</p>

<p>Abhijit Menon-Sen sent in a patch to add a DEPENDENCY_AUTO_EXTENSION dependency type.</p>

<p>Fabr&Atilde;&shy;zio de Royes Mello sent in a patch to reduce lock levels others reloptions in ALTER TABLE.</p>

<p>Iacob Catalin and Pavel St&Auml;&rsaquo;hule traded patches to implement ereport in PL/PythonU.</p>

<p>Stephen Frost sent in a patch to make pg_dump dump ACLs for pg_catalog objects.</p>

<p>&Atilde;lvaro Herrera sent in a patch to fix pg_dump and copy for huge (~1 GB) lines.</p>

<p>Kevin Grittner sent in two more revisions of a patch to implement "snapshot too old" configured by time.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to fix OOM error handling in COPY protocol of libpq.</p>

<p>Peter Eisentraut sent in a patch to fix the jumble that is the state of the pg_resetxlog documentation.</p>

<p>Pavan Deolasee sent in a patch to WAL log only the necessary part of 2PC GID.</p>

<p>Stephen Frost sent in another revision of a patch to implement default roles.</p>

<p>Julien Rouhaud sent in two more revisions of a patch to add hooks to autovacuum and add a pg_stat_autovacuum to use same.</p>

<p>Dilip Kumar sent in two more revisions of a patch to help scale relation extension.</p>

<p>Alexander Korotkov sent in another revision of a patch to move PinBuffer and UnpinBuffer to atomics.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement partial sort.</p>

<p>Roma Sokolov sent in another revision of a patch to fix DROP OPERATOR to reset links to itself on commutator and negator.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to add covering + unique indexes.</p>

<p>Craig Ringer sent in three more revisions of a patch to allow logical slots to follow timeline switches.</p>

<p>Etsuro Fujita sent in another revision of a patch to improve write performance in the PostgreSQL FDW.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to fix handling of --enable-tap-tests in MSVC scripts.</p>

<p>Robert Haas sent in a patch to add a contrib module to examine the visibility map.</p>

<p>Tomas Vondra sent in another revision of a patch to add multivariate statistics for query planning.</p>

<p>&Atilde;lvaro Herrera sent in a patch to fix the omission of BRIN from the CREATE OPERATOR CLASS documentation.</p>

<p>Tomas Vondra sent in a patch to check DBEntry,stats_timestamp in pgstat_recv_inquiry() and ignore requests that are already resolved by the last write.</p>

<p>Haribabu Kommi sent in another revision of a patch to add a pg_hba_lookup() function.</p>

<p>Emre Hasegeli sent in a patch to add SP-GiST support for inet datatypes.</p>

<p>Alexander Shulgin sent in another revision of a patch to account for NULLs in ANALYZE more strictly and try to account for skewed distributions in ANALYZE.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add ELEMENT OF to PL/pgsql declarations.</p>

<p>Mithun Cy sent in another revision of a patch to cache data in GetSnapshotData.</p>

<p>Kyotaro HORIGUCHI sent in a patch to allow :: casts to tab complete in psql.</p>

<p>SAWADA Masahiko sent in two more revisions of a patch to allow N&gt;1 synchronous standbys.</p>

<p>Robert Haas sent in another revision of a patch to fix an issue that manifested with the postgres_fdw in force_parallel_mode on ppc.</p>

<p>Amit Kapila and Thom Brown traded patches to replace pg_stat_activity.waiting with something more descriptive.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two more revisions of a patch to support VS 2015.</p>

<p>David Rowley and Haribabu Kommi traded patches to implement parallel aggregate.</p>

<p>Fabien COELHO sent in three more revisions of a patch to add pgbench stats per script, etc.</p>

<p>Petr Jel&Atilde;&shy;nek sent in another revision of a patch to add a sequence access method.</p>

<p>Fabien COELHO sent in another revision of a patch to extend pgbench expressions with functions.</p>

<p>Amit Langote sent in two more revisions of a patch to implement a vacuum progress checker.</p>

<p>Tom Lane sent in two more revisions of a patch to path-ify the upper planner.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to ensure that xlog fsync happens in a way that does not lose data.</p>

<p>Guillaume Lelarge sent in a patch to fix a typo in the psql documentation.</p>