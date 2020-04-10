---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/2009-03-22-nouvelles-neuves-de-postgresql "
---



<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-03/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PUG allemand tiendra une rencontre, deux conf&eacute;rences et un atelier lors des Linuxdays de Chemnitz les 14 &amp; 15 mars 2009. Plus d'information ici (alld)&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html">http://andreas.scherbaum.la/blog/archives/525-PostgreSQL-auf-den-Chemnitzer-Linuxtagen.html</a></li>

<li>PostgreSQLFr tiendra un stand aux Solutions Linux 2009 &agrave; Paris. Volontaires&nbsp;: sas (a) postgresql (point) fr, ou sur le wiki&nbsp;: 

<a target="_blank" href="http://postgresql.fr/sl2009:start">http://postgresql.fr/sl2009:start</a></li>

<li>Les inscriptions pour la "PostgreSQL Conference (JDCon) East 2009" sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://www.postgresql.us/purchase">http://www.postgresql.us/purchase</a></li>

<li>Kevin Kempter fera une pr&eacute;sentation des sauvegardes et des r&eacute;cup&eacute;rations lors de la premi&egrave;re r&eacute;union du PUG de Denver, le 8 avril 2009&nbsp;: 

<a target="_blank" href="http://www.diapug.org/Meeting.html">http://www.diapug.org/Meeting.html</a></li>

<li>"PostgreSQL Conference, U.S." organise un PgDay lors de la "LinuxFest Northwest" (25 &amp; 26 avril). L'appel aux conf&eacute;rences est visible &agrave; l'adresse&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Michael Renner animera un atelier sur la r&eacute;plication PostgreSQL lors des "Netways OSDC", les 29 et 30 avril 2009, &agrave; Nuremberg (All.)&nbsp;: 

<a target="_blank" href="http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/">http://www.netways.de/english/osdc/y2009/programm/w/michael_renner_postgresql_repliziert_ein_ueberblick/</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/">http://www.pgcon.org/2009/</a></li>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel &agrave; conf&eacute;renciers, plus d'infos sous peu&nbsp;!</li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/time/tqual.c, add summarization comment about visibility functions. Add URL about the Halloween problem.</li>

<li>In pgsql/doc/src/sgml/monitoring.sgml, doc patch for the recently added probes. Robert Lor</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Accept 'on' and 'off' as input for boolean data type, unifying the syntax that the data type and GUC accepts. ITAGAKI Takahiro</li>

<li>Tweak the regression test case so that the ordering of numbers vs. letters doesn't matter. This fixes failures in the Czech locale.</li>

<li>In pgsql/src/backend/utils/adt/bool.c, in parse_bool_with_len, avoid crash when no result pointer is passed. Probably an unlikely call mode, but better be safe.</li>

<li>In pgsql/src/backend/po/ru.po, translation updates.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/wparser_def.c, prevent recursion during parse of email-like string with multiple '@'. Patch by Heikki Linnakangas.</li>

<li>In pgsql/src/backend/tsearch/wparser_def.c, some languages have symbols with zero display's width or/and vowels/signs which are not an alphabetic character although they are not word-breakers too. So, treat them as part of word. Per off-list discussion with Dibyendra Hyoju and and Bal Krishna Bal about the Nepali language and Devanagari alphabet.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix set_subquery_pathlist() to copy the RTE's subquery before it gets mangled by the planning process. This prevents the "failed to locate grouping columns" error recently reported by Dickson Guedes. That happens because planning replaces SubLinks by SubPlans in the subquery's targetlist, and exprTypmod() is smarter about the former than the latter, causing the apparent type of the subquery's output columns to change. This seems to be a deficiency we should fix in exprTypmod(), but that will be a much more invasive patch with possible side-effects elsewhere, so I'll do that only in HEAD. Back-patch to 8.3. Arguably the lack of a copying step is broken/dangerous all the way back, but in the absence of known problems I'll refrain from making the older branches pay the extra cost. (The reason this particular symptom didn't appear before is that exprTypmod() wasn't smart about SubLinks either, until 8.3.)</li>

<li>Make SubPlan nodes carry the result's typmod as well as datatype OID. This is for consistency with the (relatively) recent addition of typmod to SubLink. An example of why it's a good idea is to be seen in the recent "failed to locate grouping columns" bug, which wouldn't have happened if a SubPlan exposed the same typmod info as the SubLink it was derived from. This could be back-patched, since it doesn't affect any on-disk data format, but for the moment it doesn't seem necessary to do so.</li>

<li>In pgsql/src/backend/optimizer/path/indxpath.c, improve match_special_index_operator() to recognize that LIKE with an exact-match pattern (no wildcard) can be index-optimized in some cases where a prefix-match pattern cannot; specifically, since the required index clause is simple equality, it works for regular text/varchar indexes even when the locale is not C. I'm not sure how often this case really comes up, but since it requires hardly any additional work to handle it, we might as well get it right. Motivated by a discussion on the JDBC list.</li>

<li>Code review for dtrace probes added (so far) to 8.4. Adjust placement of some bufmgr probes, take out redundant and memory-leak-inducing path arguments to smgr__md__read__done and smgr__md__write__done, fix bogus attempt to recalculate space used in sort__done, clean up formatting in places where I'm not sure pgindent will do a nice job by itself.</li>

<li>In pgsql/src/backend/utils/adt/formatting.c, fix core dump due to null-pointer dereference in to_char() when datetime format codes are misapplied to a numeric argument. (The code still produces a pretty bogus error message in such cases, but I'll settle for stopping the crash for now.) Per bug #4700 from Sergey Burladyan. Problem exists in all supported branches, so patch all the way back. In HEAD, also clean up some ugly coding in the nearby cache management code.</li>

<li>In pgsql/doc/src/sgml/release.sgml, update back-branch release notes.</li>

<li>In pgsql/src/backend/storage/buffer/bufmgr.c, restore previous ordering of BUFFER_FLUSH_START probe. I had wanted to make it include the time for the possible smgropen() call, but that results in a null pointer dereference :-( . An alternative solution would be to fetch the buffer tag instead of looking at *reln, but I'll just put it back as it was for the moment. BTW, this indicates that DTrace probes evaluate their arguments even when nominally inactive. What was that about "zero cost", again?</li>

<li>In pgsql/src/bin/pg_dump/pg_backup_archiver.c, fix identify_locking_dependencies to reflect the fact that fix_dependencies previously repointed TABLE dependencies to TABLE DATA. Mea culpa.</li>

<li>Clean up the code for to_timestamp's conversion of year plus ISO day number to date, as per bug #4702 and subsequent discussion. In particular, make it work for years specified using AD/BC or CC fields, and fix the test for "no year specified" so that it doesn't trigger inappropriately for 1 Bryce Cutt (which it was doing even in code paths that had nothing to do with to_timestamp). I also did some minor code beautification in the non-ISO-day-number code path. This area has been busted all along, but because the code has been rewritten repeatedly, it would be considerable trouble to back-patch. It's such a corner case that it doesn't seem worth the effort.</li>

<li>Fix contrib/hstore to throw an error for keys or values that don't fit in its data structure, rather than silently truncating them. Andrew Gierth.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Remove pg_trace.h inclusion from c.h and add it to the .c files that need it. Only needed in 8.3 because it's already this way in HEAD, and older branches did not support DTrace. This allows external modules to compile on Linux machines where SystemTap support was recently added, when the required SystemTap headers are not present on the build machine. Approach suggested by Tom Lane, after a RPM build trouble report by Devrim Gunduz.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Use thread-local storage for querybuffer in fmtId() on Windows, when needed (i.e. when running pg_restore, which might run in parallel). Only reopen archive file when we really need to read from it, in parallel code. Otherwise, close it immediately in a worker, if possible.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>Tag 8.3.7, 8.2.13, 8.1.17, 8.0.21, and 7.4.25.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ceoption cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>KaiGai Kohei sent in three more revisions of his SE-PostgreSQL patches.</li>

<li>Greg Sabino Mullane sent in a patch to remove the confusing -i and -d switches from pg_dump, leaving only the long forms of what they used to do.</li>

<li>ITAGAKI Takahiro sent in two revisions of a sampling profiler for 8.5.</li>

<li>Fujii Masao sent in another version of the PITR performance improvement patch.</li>

<li>Alvaro Herrera sent in a patch to 8.3 which includes pg_trace.h only in files that actually need it.</li>

</ul>