---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 juin 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/06/26/Nouvelles-hebdomadaires-de-PostgreSQL-25-juin-2017"
---


<p>PGDay.IT 2017 aura lieu &agrave; Milan (Italie) le 13 octobre. L'appel &agrave; conf&eacute;renciers court jusqu'au 9 juillet&nbsp;: <a target="_blank" href="http://2017.pgday.it/en/blog/call-for-papers">http://2017.pgday.it/en/blog/call-for-papers</a> <a target="_blank" href="http://pgday.it">http://pgday.it</a></p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>PL/Java 1.5.1-BETA1&nbsp;: <a target="_blank" href="http://tada.github.io/pljava/">http://tada.github.io/pljava/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juin</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-06/">http://archives.postgresql.org/pgsql-jobs/2017-06/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>[ndt: MeetUp à Lyon le 28 juin&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</li>

<li>[ndt: MeetUp à Paris le jeudi 29 juin&nbsp;: <a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. Le programme est en ligne et les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

<li>PGBR2017 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) du 14 au 16 septembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 30 juin&nbsp;: <a target="_blank" href="https://pgbr.postgresql.org.br/2017/">https://pgbr.postgresql.org.br/2017/</a></li>

<li>Le PostgresOpen aura lieu &agrave; San Francisco du 6 au 8 septembre&nbsp;: <a target="_blank" href="https://2017.postgresopen.org/">https://2017.postgresopen.org/</a></li>

<li>Le PGDay UK 2017 aura lieu &agrave; Londres le 4 juillet 2017&nbsp;: <a target="_blank" href="http://www.pgconf.uk">http://www.pgconf.uk</a></li>

<li>La <em>PGConf.Brazil 2017 OnLine Edition</em> sera en direct depuis le Br&eacute;sil du 10 au 14 juillet 2017&nbsp; <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

<li>Le PGDay Austin 2017 aura lieu le samedi 26 ao&ucirc;t&nbsp;: <a target="_blank" href="https://pgdayaustin2017.postgresql.us">https://pgdayaustin2017.postgresql.us</a></li>

<li>La <em>PostgreSQL Conference Europe 2017</em> aura lieu du 24 au 27 octobre 2017 au Warsaw Marriott Hotel, &agrave; Varsovie (Pologne)&nbsp;: <a target="_blank" href="https://2017.pgconf.eu/">https://2017.pgconf.eu/</a></li>

<li>La PGConf.ASIA 2017 aura lieu &agrave; Akihabara (Tokyo, Japon) du 4 au 6 d&eacute;cembre 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 31 juillet 2017. Envoyez vos candidatures &agrave; pgconf-asia-2017-submission AT pgconf DOT asia&nbsp;: <a target="_blank" href="http://www.pgconf.asia/EN/2017/">http://www.pgconf.asia/EN/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170626062420.GB475@fetter.org">http://www.postgresql.org/message-id/20170626062420.GB475@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Improve PostgreSQL 10.0 release note regarding pg_current_logfile(). Author: Yugo Nagata <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b4166a8df914f56b3b7d2dc1b74897e7525c5cea">https://git.postgresql.org/pg/commitdiff/b4166a8df914f56b3b7d2dc1b74897e7525c5cea</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix leaking of small spilled subtransactions during logical decoding. When, during logical decoding, a transaction gets too big, it's contents get spilled to disk. Not just the top-transaction gets spilled, but *also* all of its subtransactions, even if they're not that large themselves. Unfortunately we didn't clean up such small spilled subtransactions from disk. Fix that, by keeping better track of whether a transaction has been spilled to disk. Author: Andres Freund Reported-By: Dmitriy Sarafannikov, Fabr&#65533;zio de Royes Mello Discussion: <a target="_blank" href="https://postgr.es/m/1457621358.355011041@f382.i.mail.ru">https://postgr.es/m/1457621358.355011041@f382.i.mail.ru</a> <a target="_blank" href="https://postgr.es/m/CAFcNs+qNMhNYii4nxpO6gqsndiyxNDYV0S=JNq0v_sEE+9PHXg@mail.gmail.com">https://postgr.es/m/CAFcNs+qNMhNYii4nxpO6gqsndiyxNDYV0S=JNq0v_sEE+9PHXg@mail.gmail.com</a> Backpatch: 9.4-, where logical decoding was introduced <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/3bdea167eb01491a4898e977d308508374e97bfa">https://git.postgresql.org/pg/commitdiff/3bdea167eb01491a4898e977d308508374e97bfa</a></li>

<li>Fix possibility of creating a "phantom" segment after promotion. When promoting a standby just after a XLOG_SWITCH record was replayed, and next segment(s) are already are locally available (via walsender, restore_command + trigger/recovery target), that segment could accidentally be recycled onto the past of the new timeline. Later checkpointer would create a .ready file for it, assuming there was an error during creation, and it would get archived. That causes trouble if another standby is later brought up from a basebackup from before the timeline creation, because it would try to read the segment, because XLogFileReadAnyTLI just tries all possible timelines, which doesn't have valid contents. Thus replay would fail. The problem, if already occurred, can be fixed by removing the segment and/or having restore_command filter it out. The reason for the creation of such "phantom" segments was, that after an XLOG_SWITCH record the EndOfLog variable points to the beginning of the next segment, and RemoveXlogFile() used XLByteToPrevSeg(). Normally RemoveXlogFile() doing so is harmless, because the last segment will still exist preventing InstallXLogFileSegment() from causing harm, but just after promotion there's no previous segment on the new timeline. Fix that by using XLByteToSeg() instead of XLByteToPrevSeg(). Author: Andres Freund Reported-By: Greg Burek Discussion: <a target="_blank" href="https://postgr.es/m/20170619073026.zcwpe6mydsaz5ygd@alap3.anarazel.de">https://postgr.es/m/20170619073026.zcwpe6mydsaz5ygd@alap3.anarazel.de</a> Backpatch: 9.2-, bug older than all supported versions <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fb886c153bc168eeb1c3fd2f24562b5b808357d6">https://git.postgresql.org/pg/commitdiff/fb886c153bc168eeb1c3fd2f24562b5b808357d6</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>On Windows, make pg_dump use binary mode for compressed plain text output. The combination of -Z -Fp and output to stdout resulted in corrupted output data, because we left stdout in text mode, resulting in newline conversion being done on the compressed stream. Switch stdout to binary mode for this case, at the same place where we do it for non-text output formats. Report and patch by Kuntal Ghosh, tested by Ashutosh Sharma and Neha Sharma. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAGz5QCJPvbBjXAmJuGx1B_41yVCetAJhp7rtaDf7XQGWuB1GSw@mail.gmail.com">https://postgr.es/m/CAGz5QCJPvbBjXAmJuGx1B_41yVCetAJhp7rtaDf7XQGWuB1GSw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bd61d5a194ac24f0c282ed414e1378846f78dee4">https://git.postgresql.org/pg/commitdiff/bd61d5a194ac24f0c282ed414e1378846f78dee4</a></li>

<li>Avoid regressions in foreign-key-based selectivity estimates. David Rowley found that the "use the smallest per-column selectivity" heuristic applied in some cases by get_foreign_key_join_selectivity() was badly off if the FK columns are independent, producing estimates much worse than we got before that code was added in 9.6. One case where that heuristic was used was for LEFT and FULL outer joins with the referenced rel on the outside of the join. But we should not really need to special-case those here. eqjoinsel() never has had such a special case; the correction is applied by calc_joinrel_size_estimate() instead. Let's just estimate such cases like inner joins and rely on that later adjustment. (I think there was something of a thinko here, in that the comments seem to be thinking about the selectivity as defined for semi/anti joins; but that shouldn't apply to left/full joins.) Add a regression test exercising such a case to show that this is sane in at least some cases. The other case where we used that heuristic was for SEMI/ANTI outer joins, either if the referenced rel was on the outside, or if it was on the inside but was part of a join within the RHS. In either case, the FK doesn't give us a lot of traction towards estimating the selectivity. To ensure that we don't have regressions from what happened before 9.6, let's punt by ignoring the FK in such cases and applying the traditional selectivity calculation. (We might be able to improve on that later, but for now I just want to be sure it's not worse than 9.5.) Report and patch by David Rowley, simplified a bit by me. Back-patch to 9.6 where this code was added. Discussion: <a target="_blank" href="https://postgr.es/m/CAKJS1f8NO8oCDcxrteohG6O72uU1saEVT9qX=R8pENr5QWerXw@mail.gmail.com">https://postgr.es/m/CAKJS1f8NO8oCDcxrteohG6O72uU1saEVT9qX=R8pENr5QWerXw@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d8e6b84bd2ac045cdbae231012ab5ea4471a02cd">https://git.postgresql.org/pg/commitdiff/d8e6b84bd2ac045cdbae231012ab5ea4471a02cd</a></li>

<li>Fix materialized-view documentation oversights. When materialized views were added, psql's \d commands were made to treat them as a separate object category ... but not everyplace in the documentation or comments got the memo. Noted by David Johnston. Back-patch to 9.3 where matviews came in. Discussion: <a target="_blank" href="https://postgr.es/m/CAKFQuwb27M3VXRhHErjCpkWwN9eKThbqWb1=trtoXi9_ejqPXQ@mail.gmail.com">https://postgr.es/m/CAKFQuwb27M3VXRhHErjCpkWwN9eKThbqWb1=trtoXi9_ejqPXQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d14c85ed1abb5d01b10313715ab73aadb9a7a7af">https://git.postgresql.org/pg/commitdiff/d14c85ed1abb5d01b10313715ab73aadb9a7a7af</a></li>

<li>Don't downcase entries within shared_preload_libraries et al. load_libraries(), which processes the various xxx_preload_libraries GUCs, was parsing them using SplitIdentifierString() which isn't really appropriate for values that could be path names: it downcases unquoted text, and it doesn't allow embedded whitespace unless quoted. Use SplitDirectoriesString() instead. That also allows us to simplify load_libraries() a bit, since canonicalize_path() is now done for it. While this definitely seems like a bug fix, it has the potential to break configuration settings that accidentally worked before because of the downcasing behavior. Also, there's an easy workaround for the bug, namely to double-quote troublesome text. Hence, no back-patch. QL Zhuo, tweaked a bit by me Discussion: <a target="_blank" href="https://postgr.es/m/CAB-oJtxHVDc3H+Km3CjB9mY1VDzuyaVH_ZYSz7iXcRqCtb93Ew@mail.gmail.com">https://postgr.es/m/CAB-oJtxHVDc3H+Km3CjB9mY1VDzuyaVH_ZYSz7iXcRqCtb93Ew@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a69dfe5f40f77d586e8d4d9ecfc39d81612c7dda">https://git.postgresql.org/pg/commitdiff/a69dfe5f40f77d586e8d4d9ecfc39d81612c7dda</a></li>

<li>Upgrade documentation connected with shared_preload_libraries et al. Noplace in the documentation actually defined what these variables contain. Define them as lists of arguments for LOAD, and improve that command's documentation a bit. Discussion: <a target="_blank" href="https://postgr.es/m/CAB-oJtxHVDc3H+Km3CjB9mY1VDzuyaVH_ZYSz7iXcRqCtb93Ew@mail.gmail.com">https://postgr.es/m/CAB-oJtxHVDc3H+Km3CjB9mY1VDzuyaVH_ZYSz7iXcRqCtb93Ew@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ba63dbd9edc0d58e5f0891ead979674b1b45ad17">https://git.postgresql.org/pg/commitdiff/ba63dbd9edc0d58e5f0891ead979674b1b45ad17</a></li>

<li>Make opr_sanity test complain about built-in functions marked prosecdef. Currently, there are no built-in functions that are SECURITY DEFINER. But we just found an instance where one was mistakenly marked that way, so it seems prudent to add a test about it. If we ever grow some functions that are intentionally SECURITY DEFINER, we can alter the expected output of this test, or adjust the query to filter out functions for which it's okay. Per suggestion from Robert Haas. Discussion: <a target="_blank" href="https://postgr.es/m/CA+TgmoYXg7McY33+jbWmG=rS-HNUur0S6W8Q8kVNFf7epFimVA@mail.gmail.com">https://postgr.es/m/CA+TgmoYXg7McY33+jbWmG=rS-HNUur0S6W8Q8kVNFf7epFimVA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d412f79381935186dc8f95fd2dc30227a82f012f">https://git.postgresql.org/pg/commitdiff/d412f79381935186dc8f95fd2dc30227a82f012f</a></li>

<li>Final pgindent run with old pg_bsd_indent (version 1.3). This is just to have a clean basis for comparison with the results of the new version (which will indeed end up reverting some of these changes...) Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9ef2dbefc7fb3ac22e1528bc22a41a5c6c6a9539">https://git.postgresql.org/pg/commitdiff/9ef2dbefc7fb3ac22e1528bc22a41a5c6c6a9539</a></li>

<li>Initial pgindent run with pg_bsd_indent version 2.0. The new indent version includes numerous fixes thanks to Piotr Stefaniak. The main changes visible in this commit are: * Nicer formatting of function-pointer declarations. * No longer unexpectedly removes spaces in expressions using casts, sizeof, or offsetof. * No longer wants to add a space in "struct structname *varname", as well as some similar cases for const- or volatile-qualified pointers. * Declarations using PG_USED_FOR_ASSERTS_ONLY are formatted more nicely. * Fixes bug where comments following declarations were sometimes placed with no space separating them from the code. * Fixes some odd decisions for comments following case labels. * Fixes some cases where comments following code were indented to less than the expected column 33. On the less good side, it now tends to put more whitespace around typedef names that are not listed in typedefs.list. This might encourage us to put more effort into typedef name collection; it's not really a bug in indent itself. There are more changes coming after this round, having to do with comment indentation and alignment of lines appearing within parentheses. I wanted to limit the size of the diffs to something that could be reviewed without one's eyes completely glazing over, so it seemed better to split up the changes as much as practical. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/e3860ffa4dd0dad0dd9eea4be9cc1412373a8c89">https://git.postgresql.org/pg/commitdiff/e3860ffa4dd0dad0dd9eea4be9cc1412373a8c89</a></li>

<li>Phase 2 of pgindent updates. Change pg_bsd_indent to follow upstream rules for placement of comments to the right of code, and remove pgindent hack that caused comments following #endif to not obey the general rule. Commit e3860ffa4dd0dad0dd9eea4be9cc1412373a8c89 wasn't actually using the published version of pg_bsd_indent, but a hacked-up version that tried to minimize the amount of movement of comments to the right of code. The situation of interest is where such a comment has to be moved to the right of its default placement at column 33 because there's code there. BSD indent has always moved right in units of tab stops in such cases --- but in the previous incarnation, indent was working in 8-space tab stops, while now it knows we use 4-space tabs. So the net result is that in about half the cases, such comments are placed one tab stop left of before. This is better all around: it leaves more room on the line for comment text, and it means that in such cases the comment uniformly starts at the next 4-space tab stop after the code, rather than sometimes one and sometimes two tabs after. Also, ensure that comments following #endif are indented the same as comments following other preprocessor commands such as #else. That inconsistency turns out to have been self-inflicted damage from a poorly-thought-through post-indent "fixup" in pgindent. This patch is much less interesting than the first round of indent changes, but also bulkier, so I thought it best to separate the effects. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c7b8998ebbf310a156aa38022555a24d98fdbfb4">https://git.postgresql.org/pg/commitdiff/c7b8998ebbf310a156aa38022555a24d98fdbfb4</a></li>

<li>Phase 3 of pgindent updates. Don't move parenthesized lines to the left, even if that means they flow past the right margin. By default, BSD indent lines up statement continuation lines that are within parentheses so that they start just to the right of the preceding left parenthesis. However, traditionally, if that resulted in the continuation line extending to the right of the desired right margin, then indent would push it left just far enough to not overrun the margin, if it could do so without making the continuation line start to the left of the current statement indent. That makes for a weird mix of indentations unless one has been completely rigid about never violating the 80-column limit. This behavior has been pretty universally panned by Postgres developers. Hence, disable it with indent's new -lpl switch, so that parenthesized lines are always lined up with the preceding left paren. This patch is much less interesting than the first round of indent changes, but also bulkier, so I thought it best to separate the effects. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/382ceffdf7f620d8f2d50e451b4167d291ae2348">https://git.postgresql.org/pg/commitdiff/382ceffdf7f620d8f2d50e451b4167d291ae2348</a></li>

<li>Remove entab and associated detritus. We don't need this anymore, because pg_bsd_indent has been taught to follow the same tab-vs-space rules that entab used to enforce. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/81f056c7256f01a39ecc926bf6a4d2d1fa525633">https://git.postgresql.org/pg/commitdiff/81f056c7256f01a39ecc926bf6a4d2d1fa525633</a></li>

<li>Manually un-break a few URLs that pgindent used to insist on splitting. These will no longer get re-split by pgindent runs, so it's worth cleaning them up now. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/780b3a4c43fd47867825d5d628e96a0966e63aa8">https://git.postgresql.org/pg/commitdiff/780b3a4c43fd47867825d5d628e96a0966e63aa8</a></li>

<li>Adjust pgindent script to use pg_bsd_indent 2.0. Update version-checking code and list of switches. Delete obsolete quasi-support for using GNU indent. Remove a lot of no-longer-needed workarounds for bugs of the old version, and improve comments for the hacks that remain. Update run_build() subroutine to fetch the pg_bsd_indent code from the newly established git repo for it. In passing, fix pgindent to not overwrite files that require no changes; this makes it a bit more friendly to run on a built tree. Adjust relevant documentation. Remove indent.bsd.patch; it's not relevant anymore (and was obsolete long ago anyway). Likewise remove pgcppindent, since we're no longer in the business of shipping C++ code. Piotr Stefaniak is responsible for most of the algorithmic changes to the pgindent script; I did the rest. Discussion: <a target="_blank" href="https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org">https://postgr.es/m/E1dAmxK-0006EE-1r@gemulon.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/30527.1495162840@sss.pgh.pa.us">https://postgr.es/m/30527.1495162840@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8ff6d4ec7840b0af56f1207073f44b7f2afae96d">https://git.postgresql.org/pg/commitdiff/8ff6d4ec7840b0af56f1207073f44b7f2afae96d</a></li>

<li>Add testing to detect errors of omission in "pin" dependency creation. It's essential that initdb.c's setup_depend() scan each system catalog that could contain objects that need to have "p" (pin) entries in pg_depend or pg_shdepend. Forgetting to add that, either when a catalog is first invented or when it first acquires DATA() entries, is an obvious bug hazard. We can detect such omissions at reasonable cost by probing every OID-containing system catalog to see whether the lowest-numbered OID in it is pinned. If so, the catalog must have been properly accounted for in setup_depend(). If the lowest OID is above FirstNormalObjectId then the catalog must have been empty at the end of initdb, so it doesn't matter. There are a small number of catalogs whose first entry is made later in initdb than setup_depend(), resulting in nonempty expected output of the test, but these can be manually inspected to see that they are OK. Any future mistake of this ilk will manifest as a new entry in the test's output. Since pg_conversion is already in the test's output, add it to the set of catalogs scanned by setup_depend(). That has no effect today (hence, no catversion bump here) but it will protect us if we ever do add pin-worthy conversions. This test is very much like the catalog sanity checks embodied in opr_sanity.sql and type_sanity.sql, but testing pg_depend doesn't seem to fit naturally into either of those scripts' charters. Hence, invent a new test script misc_sanity.sql, which can be a home for this as well as tests on any other catalogs we might want in future. Discussion: <a target="_blank" href="https://postgr.es/m/8068.1498155068@sss.pgh.pa.us">https://postgr.es/m/8068.1498155068@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8be8510cf89d4e150816941029d7cdddfe9aa474">https://git.postgresql.org/pg/commitdiff/8be8510cf89d4e150816941029d7cdddfe9aa474</a></li>

<li>Fix memory leakage in ICU encoding conversion, and other code review. Callers of icu_to_uchar() neglected to pfree the result string when done with it. This results in catastrophic memory leaks in varstr_cmp(), because of our prevailing assumption that btree comparison functions don't leak memory. For safety, make all the call sites clean up leaks, though I suspect that we could get away without it in formatting.c. I audited callers of icu_from_uchar() as well, but found no places that seemed to have a comparable issue. Add function API specifications for icu_to_uchar() and icu_from_uchar(); the lack of any thought-through specification is perhaps not unrelated to the existence of this bug in the first place. Fix icu_to_uchar() to guarantee a nul-terminated result; although no existing caller appears to care, the fact that it would have been nul-terminated except in extreme corner cases seems ideally designed to bite someone on the rear someday. Fix ucnv_fromUChars() destCapacity argument --- in the worst case, that could perhaps have led to a non-nul-terminated result, too. Fix icu_from_uchar() to have a more reasonable definition of the function result --- no callers are actually paying attention, so this isn't a live bug, but it's certainly sloppily designed. Const-ify icu_from_uchar()'s input string for consistency. That is not the end of what needs to be done to these functions, but it's as much as I have the patience for right now. Discussion: <a target="_blank" href="https://postgr.es/m/1955.1498181798@sss.pgh.pa.us">https://postgr.es/m/1955.1498181798@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b6159202c99d4021fb078cede90b26f94883143d">https://git.postgresql.org/pg/commitdiff/b6159202c99d4021fb078cede90b26f94883143d</a></li>

<li>Rethink behavior of pg_import_system_collations(). Marco Atzeri reported that initdb would fail if "locale -a" reported the same locale name more than once. All previous versions of Postgres implicitly de-duplicated the results of "locale -a", but the rewrite to move the collation import logic into C had lost that property. It had also lost the property that locale names matching built-in collation names were silently ignored. The simplest way to fix this is to make initdb run the function in if-not-exists mode, which means that there's no real use-case for non if-not-exists mode; we might as well just drop the boolean argument and simplify the function's definition to be "add any collations not already known". This change also gets rid of some odd corner cases caused by the fact that aliases were added in if-not-exists mode even if the function argument said otherwise. While at it, adjust the behavior so that pg_import_system_collations() doesn't spew "collation foo already exists, skipping" messages during a re-run; that's completely unhelpful, especially since there are often hundreds of them. And make it return a count of the number of collations it did add, which seems like it might be helpful. Also, re-integrate the previous coding's property that it would make a deterministic selection of which alias to use if there were conflicting possibilities. This would only come into play if "locale -a" reports multiple equivalent locale names, say "de_DE.utf8" and "de_DE.UTF-8", but that hardly seems out of the question. In passing, fix incorrect behavior in pg_import_system_collations()'s ICU code path: it neglected CommandCounterIncrement, which would result in failures if ICU returns duplicate names, and it would try to create comments even if a new collation hadn't been created. Also, reorder operations in initdb so that the 'ucs_basic' collation is created before calling pg_import_system_collations() not after. This prevents a failure if "locale -a" were to report a locale named that. There's no reason to think that that ever happens in the wild, but the old coding would have survived it, so let's be equally robust. Discussion: <a target="_blank" href="https://postgr.es/m/20c74bc3-d6ca-243d-1bbc-12f17fa4fe9a@gmail.com">https://postgr.es/m/20c74bc3-d6ca-243d-1bbc-12f17fa4fe9a@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0b13b2a7712b6f91590b7589a314240a14520c2f">https://git.postgresql.org/pg/commitdiff/0b13b2a7712b6f91590b7589a314240a14520c2f</a></li>

<li>Fix incorrect buffer-length argument to uloc_getDisplayName(). The maxResultSize argument of uloc_getDisplayName is the number of UChars in the output buffer, not the number of bytes. In principle this could result in a stack smash, although at least in my Fedora 25 install there are no ICU locales with display names long enough to overrun the buffer. But it's easily proven to be wrong by reducing the length of displayname to around 20, whereupon a stack smash does happen. (This is a rather scary bug, because the same mistake could easily have been made in other places; but in a quick code search looking at uses of UChar I could not find any other instances.) <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d1fcc622987c1a5b490b956d89f36ac9fed8f9d1">https://git.postgresql.org/pg/commitdiff/d1fcc622987c1a5b490b956d89f36ac9fed8f9d1</a></li>

<li>Further hacking on ICU collation creation and usage. pg_import_system_collations() refused to create any ICU collations if the current database's encoding didn't support ICU. This is wrongheaded: initdb must initialize pg_collation in an encoding-independent way since it might be used in other databases with different encodings. The reason for the restriction seems to be that get_icu_locale_comment() used icu_from_uchar() to convert the UChar-format display name, and that unsurprisingly doesn't know what to do in unsupported encodings. But by the same token that the initial catalog contents must be encoding-independent, we can't allow non-ASCII characters in the comment strings. So we don't really need icu_from_uchar() here: just check for Unicode codes outside the ASCII range, and if there are none, the format conversion is trivial. If there are some, we can simply not install the comment. (In my testing, this affects only Norwegian Bokm&#65533;l, which has given us trouble before.) For paranoia's sake, also check for non-ASCII characters in ICU locale names, and skip such locales, as we do for libc locales. I don't currently have a reason to believe that this will ever reject anything, but then again the libc maintainers should have known better too. With just the import changes, ICU collations can be found in pg_collation in databases with unsupported encodings. This resulted in more or less clean failures at runtime, but that's not how things act for unsupported encodings with libc collations. Make it work the same as our traditional behavior for libc collations by having collation lookup take into account whether is_encoding_supported_by_icu(). Adjust documentation to match. Also, expand Table 23.1 to show which encodings are supported by ICU. catversion bump because of likely change in pg_collation/pg_description initial contents in ICU-enabled builds. Discussion: <a target="_blank" href="https://postgr.es/m/20c74bc3-d6ca-243d-1bbc-12f17fa4fe9a@gmail.com">https://postgr.es/m/20c74bc3-d6ca-243d-1bbc-12f17fa4fe9a@gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ddb5fdc068635d003a0d1c303cb109d1cb3ebeb1">https://git.postgresql.org/pg/commitdiff/ddb5fdc068635d003a0d1c303cb109d1cb3ebeb1</a></li>

<li>Doc: minor improvements for collation-related man pages. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/de0c60b7d3f69c75c69c6577ae44caa3aae44800">https://git.postgresql.org/pg/commitdiff/de0c60b7d3f69c75c69c6577ae44caa3aae44800</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>doc: Improve logical replication security setup info. Reported-by: Jeff Janes &lt;jeff.janes@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1c25ef6363f38253e5ac080373eef7f3305fa5dc">https://git.postgresql.org/pg/commitdiff/1c25ef6363f38253e5ac080373eef7f3305fa5dc</a></li>

<li>Change pg_get_publication_tables to prosecdef false. This was apparently a mistake in the original commit. Reported-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/20d7d68b098dde6106e6c382e787c8b10c4403df">https://git.postgresql.org/pg/commitdiff/20d7d68b098dde6106e6c382e787c8b10c4403df</a></li>

<li>Tweak publication fetching in psql. Viewing a table with \d in psql also shows the publications at table is in. If a publication is concurrently dropped, this shows an error, because the view pg_publication_tables internally uses pg_get_publication_tables(), which uses a catalog snapshot. This can be particularly annoying if a for-all-tables publication is concurrently dropped. To avoid that, write the query in psql differently. Expose the function pg_relation_is_publishable() to SQL and write the query using that. That still has a risk of being affected by concurrent catalog changes, but in this case it would be a table drop that causes problems, and then the psql \d command wouldn't be interesting anymore anyway. Reported-by: Tom Lane &lt;tgl@sss.pgh.pa.us&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a2141c42f9ebc51b4501a4fafea9dd3fb7eda23d">https://git.postgresql.org/pg/commitdiff/a2141c42f9ebc51b4501a4fafea9dd3fb7eda23d</a></li>

<li>Fix typo in code comment. Author: Masahiko Sawada &lt;sawada.mshk@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/15c91568cfa4777892207a85000fdfd72b59b677">https://git.postgresql.org/pg/commitdiff/15c91568cfa4777892207a85000fdfd72b59b677</a></li>

<li>Restart logical replication launcher when killed. Author: Yugo Nagata &lt;nagata@sraoss.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f669c09989bda894d6ba01634ccb229f0687c08a">https://git.postgresql.org/pg/commitdiff/f669c09989bda894d6ba01634ccb229f0687c08a</a></li>

<li>Reformat comments about ResultRelInfo. Also add a comment on its new member PartitionRoot. Reported-by: Etsuro Fujita &lt;fujita.etsuro@lab.ntt.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/113b0045e20d40f726a0a30e33214455e4f1385e">https://git.postgresql.org/pg/commitdiff/113b0045e20d40f726a0a30e33214455e4f1385e</a></li>

<li>Teach pgrowlocks to check relkind before scanning. Author: Amit Langote &lt;Langote_Amit_f8@lab.ntt.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b56818abd450a87e2e3cb03b2cf3eede73487926">https://git.postgresql.org/pg/commitdiff/b56818abd450a87e2e3cb03b2cf3eede73487926</a></li>

<li>Fix replication with replica identity full. The comparison with the target rows on the subscriber side was done with datumIsEqual(), which can have false negatives. For instance, it didn't work reliably for text columns. So use the equality operator provided by the type cache instead. Also add more user documentation about replica identity requirements. Reported-by: Tatsuo Ishii &lt;ishii@sraoss.co.jp&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/08859bb5c2cebc132629ca838113d27bb31b990c">https://git.postgresql.org/pg/commitdiff/08859bb5c2cebc132629ca838113d27bb31b990c</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>pg_upgrade: start/stop new server after pg_resetwal. When commit 0f33a719fdbb5d8c43839ea0d2c90cd03e2af2d2 removed the instructions to start/stop the new cluster before running rsync, it was now possible for pg_resetwal/pg_resetxlog to leave the final WAL record at wal_level=minimum, preventing upgraded standby servers from reconnecting. This patch fixes that by having pg_upgrade unconditionally start/stop the new cluster after pg_resetwal/pg_resetxlog has run. Backpatch through 9.2 since, though the instructions were added in PG 9.5, they worked all the way back to 9.2. Discussion: <a target="_blank" href="https://postgr.es/m/20170620171844.GC24975@momjian.us">https://postgr.es/m/20170620171844.GC24975@momjian.us</a> Backpatch-through: 9.2 <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b710248dd3f90c46bd4208e6bf1290048b9d76cd">https://git.postgresql.org/pg/commitdiff/b710248dd3f90c46bd4208e6bf1290048b9d76cd</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix typo in comment. Etsuro Fujita <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/ba1f017069dd87d309e2716bf08a40df42b29baa">https://git.postgresql.org/pg/commitdiff/ba1f017069dd87d309e2716bf08a40df42b29baa</a></li>

</ul>

<p>Dean Rasheed pushed:</p>

<ul>

<li>Prevent table partitions from being turned into views. A table partition must be a table, not a view, so don't allow a "_RETURN" rule to be added that would convert an existing table partition into a view. Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/CAEZATCVzFcAjZwC1bTFvJ09skB_sgkF4SwPKMywev-XTnimp9Q%40mail.gmail.com">https://postgr.es/m/CAEZATCVzFcAjZwC1bTFvJ09skB_sgkF4SwPKMywev-XTnimp9Q%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bcbf392ec84362040faf72daad22c647c74e2b2a">https://git.postgresql.org/pg/commitdiff/bcbf392ec84362040faf72daad22c647c74e2b2a</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Fix typo in comment. Author: Masahiko Sawada <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f0415a30e0bd56c9badecf097e8568ec1b3e3b0e">https://git.postgresql.org/pg/commitdiff/f0415a30e0bd56c9badecf097e8568ec1b3e3b0e</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Update comment to account for table partitioning. Ashutosh Bapat and Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/CAFjFpRcG_NaAv6cDHD-9VfGdvB8maAtSfB=fTQr5+kxP2_sXzg@mail.gmail.com">http://postgr.es/m/CAFjFpRcG_NaAv6cDHD-9VfGdvB8maAtSfB=fTQr5+kxP2_sXzg@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1300276042f9c4b9db10825f0b4431da423ebb57">https://git.postgresql.org/pg/commitdiff/1300276042f9c4b9db10825f0b4431da423ebb57</a></li>

<li>psql: Restore alphabetical order in words_after_create. Rushabh Lathia Discussion: <a target="_blank" href="http://postgr.es/m/CAGPqQf3yKG0Eo04ePfLPG_-KTo=7ZkxbGDVUWfSGN35Y3SG+PA@mail.gmail.com">http://postgr.es/m/CAGPqQf3yKG0Eo04ePfLPG_-KTo=7ZkxbGDVUWfSGN35Y3SG+PA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/da6bf130750dec5bcaab0696b00c513c17b14ff9">https://git.postgresql.org/pg/commitdiff/da6bf130750dec5bcaab0696b00c513c17b14ff9</a></li>

<li>postgres_fdw: Move function prototype to correct section. Etsuro Fujita, reviewed by Ashutosh Bapat. Discussion: <a target="_blank" href="http://postgr.es/m/93a9c487-9920-a38f-da96-503422c50f59@lab.ntt.co.jp">http://postgr.es/m/93a9c487-9920-a38f-da96-503422c50f59@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2c77903b2bfba01f159138ba34b95d4b470395a8">https://git.postgresql.org/pg/commitdiff/2c77903b2bfba01f159138ba34b95d4b470395a8</a></li>

<li>Update out-of-date comment in vacuumlazy.c. Commit 15c121b3ed7eb2f290e19533e41ccca734d23574 seems to have overlooked the need to trim this part of the comment. Pavan Deolasee Discussion: <a target="_blank" href="http://postgr.es/m/CABOikdPq_9+cWRNZ0RLKTwuZyj=uL85X=Usifa-CbPee1ZCM5A@mail.gmail.com">http://postgr.es/m/CABOikdPq_9+cWRNZ0RLKTwuZyj=uL85X=Usifa-CbPee1ZCM5A@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2a6db5eba69c0d6c842360f836cadd20e6cd9a0c">https://git.postgresql.org/pg/commitdiff/2a6db5eba69c0d6c842360f836cadd20e6cd9a0c</a></li>

<li>Document partitioned_rels in create_modifytable_path header comment. Etsuro Fujita, slightly adjusted by me. Discussion: <a target="_blank" href="http://postgr.es/m/e87c4a6d-23d7-5e7c-e8db-44ed418eb5d1@lab.ntt.co.jp">http://postgr.es/m/e87c4a6d-23d7-5e7c-e8db-44ed418eb5d1@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6af9f1bd4bcbb0de15e826205b8e60632147dbe2">https://git.postgresql.org/pg/commitdiff/6af9f1bd4bcbb0de15e826205b8e60632147dbe2</a></li>

</ul>

<p>&#65533;lvaro Herrera pushed:</p>

<ul>

<li>Fix IF NOT EXISTS in CREATE STATISTICS. I misplaced the IF NOT EXISTS clause in commit 7b504eb282, before the word STATISTICS. Put it where it belongs. Patch written independently by Amit Langote and myself. I adopted his submitted test case with a slight edit also. Reported-by: Bruno Wolff III Discussion: <a target="_blank" href="https://postgr.es/m/20170621004237.GB8337@wolff.to">https://postgr.es/m/20170621004237.GB8337@wolff.to</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5dfd564b1001f20c9def6ae938a92f39ddbd9984">https://git.postgresql.org/pg/commitdiff/5dfd564b1001f20c9def6ae938a92f39ddbd9984</a></li>

<li>Fix autovacuum launcher attachment to its DSA. The autovacuum launcher doesn't actually do anything with its DSA other than creating it and attaching to it, but it's been observed that after longjmp'ing to the standard error handling block (for example after getting SIGINT) the autovacuum enters an infinite loop reporting that it cannot attach to its DSA anymore (which is correct, because it's already attached to it.) Fix by only attempting to attach if not already attached. I introduced this bug together with BRIN autosummarization in 7526e10224f0. Reported-by: Yugo Nagata. Author: Thomas Munro. I added the comment to go with it. Discussion: <a target="_blank" href="https://postgr.es/m/20170621211538.0c9eae73.nagata@sraoss.co.jp">https://postgr.es/m/20170621211538.0c9eae73.nagata@sraoss.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a4f06606a328664d79f34b6041e816908d93e063">https://git.postgresql.org/pg/commitdiff/a4f06606a328664d79f34b6041e816908d93e063</a></li>

<li>Fix typo in comment. Once upon a time, WAL pointers could be NULL, but no longer. We talk about "valid" now. Reported-by: Amit Langote Discussion: <a target="_blank" href="https://postgr.es/m/33e9617d-27f1-eee8-3311-e27af98eaf2b@lab.ntt.co.jp">https://postgr.es/m/33e9617d-27f1-eee8-3311-e27af98eaf2b@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/82c1507e3067d6d7884e823b09c921f9119dbe6f">https://git.postgresql.org/pg/commitdiff/82c1507e3067d6d7884e823b09c921f9119dbe6f</a></li>

<li>Fix typos in README.dependencies. There was a logic error in a formula, reported by Atsushi Torokoshi. Ashutosh Bapat furthermore recommended to change notation for a variable that was re-using a letter from a previous formula, though his proposed patch contained a small error in attributing what the new letter is for. Also, instead of his proposed d' I ended up using e, to avoid confusing the reader with quotes which are used differently in the explaining prose. Bugs appeared in commit 2686ee1b7ccfb9214064d4d2a98ea77382880306. Reported-by: Atsushi Torikoshi, Ashutosh Bapat Discussion: <a target="_blank" href="https://postgr.es/m/CAFjFpRd03YojT4wyuDcjhCfYuygfWfnt68XGn2CKv=rcjRCtTA@mail.gmail.com">https://postgr.es/m/CAFjFpRd03YojT4wyuDcjhCfYuygfWfnt68XGn2CKv=rcjRCtTA@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/da2322883b9e50b1aac70a3b6eaf2a4f0e486469">https://git.postgresql.org/pg/commitdiff/da2322883b9e50b1aac70a3b6eaf2a4f0e486469</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Minor corrections to high availability docs. Startup process is displayed in pg_stat_activity, noted by Yugo Nagata. Transactions can be resolved at end of recovery. Author: Yugo Nagata, with addition by me <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a79122b06194927d2b79465f335b94f2b4472816">https://git.postgresql.org/pg/commitdiff/a79122b06194927d2b79465f335b94f2b4472816</a></li>

<li>Improve replication lag interpolation after idle period. After sitting idle and fully replayed for a while and then encountering a new burst of WAL activity, we interpolate between an ancient sample and the not-yet-reached one for the new traffic. That produced a corner case report of lag after receiving first new reply from standby, which might sometimes be a large spike. Correct this by resetting last_read time and handle that new case. Author: Thomas Munro <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/9ea3c64124af039219aa5030d7af675dce5daa60">https://git.postgresql.org/pg/commitdiff/9ea3c64124af039219aa5030d7af675dce5daa60</a></li>

<li>Revert 1f30295eab65eddaa88528876ab66e7095f4bb65. Reported-by: Tom Lane <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/829f12e2690c0442e156069092b05f1edc78b08a">https://git.postgresql.org/pg/commitdiff/829f12e2690c0442e156069092b05f1edc78b08a</a></li>

<li>Fix typo in comment in SerializeSnapshot. Author: Masahiko Sawada <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a15b47df357d6c9ac6ebc2ce63bb24c6faddd44c">https://git.postgresql.org/pg/commitdiff/a15b47df357d6c9ac6ebc2ce63bb24c6faddd44c</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Craig Ringer sent in a patch to introduce "constant StringInfo"</p>

<p>Ashutosh Sharma sent in two more revisions of a patch to detect the ICU version on Windows.</p>

<p>Amit Kapila sent in another revision of a patch to enable updating a partition key with the effect of moving the affected rows to the appropriate partition.</p>

<p>Masahiko Sawada sent in a patch to make table sync workers check their relation subscription state at the end of COPY and exit if it has disappeared, instead of killing table sync worker in DDL.</p>

<p>Shubham Barai sent in two more revisions of a patch of a patch to implement predicate locking in GiST index.</p>

<p>Micha&#65533;l Paquier sent in another revision of a patch to refactor the routine to test connection to SSL server, support channel binding 'tls-unique' in SCRAM, add connection parameters "saslname" and "saslchannelbinding", and implement channel binding tls-server-end-point for SCRAM.</p>

<p>Mengxing Liu sent in a patch to eliminate O(N^2) scaling from rw-conflict tracking in serializable transactions.</p>

<p>Konstantin Knizhnik sent in a patch to implement an ASOF join type.</p>

<p>Daniel Gustafsson sent in two revisions of a patch to add an optional message to user when terminating/cancelling backend.</p>

<p>Mark Rofail sent in two more revisions of a patch to implement foreign key arrays.</p>

<p>Haribabu Kommi sent in another revision of a patch to add Visual Studio 2017 build support.</p>

<p>Daniel V&#65533;rit&#65533; and Andres Freund traded patches to add pipelining batch support to libpq.</p>

<p>Andres Freund sent in a patch to ensure that signal latch owners don't get signaled if owner not waiting on latch.</p>

<p>Jeff Janes sent in a patch to add a tpcb-func option to pgbench.</p>

<p>Peter Eisentraut and Petr Jel&#65533;nek traded patches to fix an issue where things would get stuck when dropping a subscription while synchronizing table.</p>

<p>Amit Langote sent in two revisions of a patch to set pd_lower in GIN metapage.</p>

<p>Alexander Kuzmenkov sent in another revision of a patch to implement CSN snapshots.</p>

<p>Remi Colinet sent in another revision of a patch to add a pg_progress() SQL function to monitor progression of long running SQL queries/utilities.</p>

<p>Alexey Kondratov sent in another revision of a patch to add parallel COPY execution with errors handling.</p>

<p>Masahiko Sawada sent in another revision of a patch to move relation extension locks out of heavyweight lock manager.</p>

<p>Etsuro Fujita sent in a patch to excise useless code from ExecInitModifyTable.</p>

<p>Peter Eisentraut sent in a patch to fix the output of char node fields.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to implement asynchronous execution.</p>

<p>Thomas Munro sent in another revision of a patch to enable transition tuples from wctes.</p>

<p>Thomas Munro sent in another revision of a patch to fix an infelicity between transition tables vs ON CONFLICT.</p>

<p>Micha&#65533;l Paquier sent in a patch to ensure that fast promotion is used when doing a recovery_target PITR restore.</p>

<p>Yugo Nagata sent in a patch to fix a bug where autovacuum launcher occurs error when cancelled by SIGINT by calling dsa_attach() before sigsetjmp.</p>

<p>Yugo Nagata sent in a patch to fix a bug where pg_terminate_backend can terminate background workers and autovacuum launcher.</p>

<p>Thomas Munro sent in another revision of a patch to fix an infelicity between transition table behavior and inheritance.</p>

<p>Thomas Munro sent in another revision of a patch to use kqueue where available.</p>

<p>Alexander Korotkov sent in a flock of patches to implement 64-bit XIDs.</p>

<p>Vladimir Kunshchikov sent in a patch to fix a gz_error/strerror mishap.</p>

<p>Masahiko Sawada sent in a patch to correct behavior of pg_stop_backup on a subscriber.</p>

<p>Thom Brown sent in another revision of a patch to implement auto-prewarm.</p>

<p>Tom Lane sent in a patch to guard against bugs-of-omission in initdb's setup_depend.</p>

<p>Micha&#65533;l Paquier sent in two more revisions of a patch to fix a broken O(n^2) avoidance in wal segment recycling.</p>

<p>Amit Langote sent in another revision of a patch to cope with differing attnos in ATExecAttachPartition code, and teach ATExecAttachPartition to skip validation in more.</p>

<p>Thomas Munro sent in another revision of a patch to implement causal reads.</p>

<p>Yugo Nagata sent in a patch to ensure that the same expression occurs only once in partition key</p>

<p>Peter Eisentraut sent in a patch to fix some code quality issues in ICU patch.</p>

<p>Petr Jel&#65533;nek sent in a patch to fix walsender timeouts when decoding large transaction.</p>

<p>Nikolay Shaplov sent in another revision of a patch to move all am-related reloption code into src/backend/access/[am-name] and get rid of relopt_kind for custom AM.</p>

<p>Fabien COELHO sent in another revision of a patch to add pgbench tap tests.</p>

<p>Tom Lane sent in a patch to reduce pg_ctl's reaction time.</p>

<p>Tom Lane sent in a patch to fix some corner-case error in pgstats file loading.</p>

<p>Tom Lane, and Craig Ringer, and Micha&#65533;l Paquier traded patches to fix a timing-sensitive case in src/test/recovery TAP tests.</p>