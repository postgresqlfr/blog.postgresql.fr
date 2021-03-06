---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 mars 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/03/24/Nouvelles-hebdomadaires-de-PostgreSQL-24-mars-2013"
---


<p>L'appel &agrave; conf&eacute;renciers pour le <em>Char(13)</em> et le <em>PGday UK</em>, respectivement les 11 et 12 juillet 2013, sont lanc&eacute;s et seront clos le 19 avril 2013. Pour le Char(13), &eacute;crivez &agrave; speakers AT char13 DOT info&nbsp;; pour le PGday UK, speakers AT postgresqlusergroup DOT org DOT uk.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>MJSQLView Version 3.44, une interface graphique Java compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://dandymadeproductions.com/projects/MyJSQLView/">http://dandymadeproductions.com/projects/MyJSQLView/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PostgreSQL Session</em> est programm&eacute;e pour le 28 mars 2013 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></li>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

<li>La 6&egrave;me conf&eacute;rence annuelle "Prague PostgreSQL Developers Day", organis&eacute;e par le CSPUG (Groupe des utilisateurs tch&egrave;ques et slovaques de PostgreSQL), aura lieu le 30 mai 2013 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Les candidatures des conf&eacute;renciers sont attendues jusqu'au 14 avril &agrave; l'adresse &lt;info AT p2d2 POINT cz&gt;. D'avantage d'informations sur le site&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le PgDay Fr est l'&eacute;v&eacute;nement majeur de la communaut&eacute; francophone. Il aura lieu le 13 juin 2013 &agrave; Nantes (France)&nbsp;: 

<a target="_blank" href="http://pgday.fr/">http://pgday.fr/</a></li>

<li><em>PostgreSQL Brazil</em> aura lieu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

<li>Notez la date&nbsp;! <em>Postgres Open 2013</em> aura lieu &agrave; Chicago (Illinois, USA) du 16 au 18 septembre. Hotel Sax&nbsp;: 

<a target="_blank" href="https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865">https://reservations.ihotelier.com/crs/g_reservation.cfm?groupID=888761&amp;hotelID=6865</a><br>

Inscriptions pour les l&egrave;ve-t&ocirc;t&nbsp;: 

<a target="_blank" href="http://postgresopen-eac2.eventbrite.com/">http://postgresopen-eac2.eventbrite.com/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130325064616.GD25200@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove PageSetTLI and rename pd_tli to pd_checksum. Remove use of PageSetTLI() from all page manipulation functions and adjust README to indicate change in the way we make changes to pages. Repurpose those bytes into the pd_checksum field and explain how that works in comments about page header. Refactoring ahead of actual feature patch which would make use of the checksum field, arriving later. Jeff Davis, with comments and doc changes by Simon Riggs Direction suggested by Robert Haas; many others providing review comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb7cc2623f242ffafae404f8ebbb331b9a7f2b68">http://git.postgresql.org/pg/commitdiff/bb7cc2623f242ffafae404f8ebbb331b9a7f2b68</a></li>

<li>Add pageinspect--1.1.sql for checksum changes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef04cb745fc3167264f369a2710f237de4db0bf4">http://git.postgresql.org/pg/commitdiff/ef04cb745fc3167264f369a2710f237de4db0bf4</a></li>

<li>Add pageinspect--1.0--1.sql for checksum changes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e016b72411caa7027f9c980fb2c0560cdab2a129">http://git.postgresql.org/pg/commitdiff/e016b72411caa7027f9c980fb2c0560cdab2a129</a></li>

<li>Add reliability docs about storage/memory corruptions. Add section to the Reliability section about what is and is not protected for various file types. Further edits welcome. Designed to allow 1-2 line change when/if checksums are committed. Inspired by docs written by Jeff Davis, though completely different from his patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2266db392cb825eccb39518e7b652e7f336fff6c">http://git.postgresql.org/pg/commitdiff/2266db392cb825eccb39518e7b652e7f336fff6c</a></li>

<li>Correction that 2pc state files use CRC-32. Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c3b87ca10a54daf06e41986d763e12538c06ab9">http://git.postgresql.org/pg/commitdiff/8c3b87ca10a54daf06e41986d763e12538c06ab9</a></li>

<li>Clarify assumption of filesystem metadata integrity. Jeff Davis 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a091002cfa2180a908b36d56c58749a175b4be7">http://git.postgresql.org/pg/commitdiff/1a091002cfa2180a908b36d56c58749a175b4be7</a></li>

<li>Change commit_delay to be SUSET for 9.3+. Prior to 9.3 the commit_delay affected only the current user, whereas now only the group leader waits while holding the WALWriteLock. Deliberate or accidental settings to a poor value could seriously degrade performance for all users. Privileges may be delegated by SECURITY DEFINER functions for anyone that needs per-user settings in real situations. Request for change from Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/13fe298ca06f5390df5edf073cf401f9f0b67458">http://git.postgresql.org/pg/commitdiff/13fe298ca06f5390df5edf073cf401f9f0b67458</a></li>

<li>Allow I/O reliability checks using 16-bit checksums. Checksums are set immediately prior to flush out of shared buffers and checked when pages are read in again. Hint bit setting will require full page write when block is dirtied, which causes various infrastructure changes. Extensive comments, docs and README. WARNING message thrown if checksum fails on non-all zeroes page; ERROR thrown but can be disabled with ignore_checksum_failure = on. Feature enabled by an initdb option, since transition from option off to option on is long and complex and has not yet been implemented. Default is not to use checksums. Checksum used is WAL CRC-32 truncated to 16-bits. Simon Riggs, Jeff Davis, Greg Smith Wide input and assistance from many community members. Thank you. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96ef3b8ff1cf1950e897fd2f766d4bd9ef0d5d56">http://git.postgresql.org/pg/commitdiff/96ef3b8ff1cf1950e897fd2f766d4bd9ef0d5d56</a></li>

<li>Add new README file for pages/checksums 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9df56f6d91c3d67b23925b8f8b70365636995b71">http://git.postgresql.org/pg/commitdiff/9df56f6d91c3d67b23925b8f8b70365636995b71</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve documentation of EXTRACT(WEEK). The docs showed that early-January dates can be considered part of the previous year for week-counting purposes, but failed to say explicitly that late-December dates can also be considered part of the next year. Fix that, and add a cross-reference to the "isoyear" field. Per bug #7967 from Pawel Kobylak. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e39feb1006ac5c64fd804597088bc7f40ff7b635">http://git.postgresql.org/pg/commitdiff/e39feb1006ac5c64fd804597088bc7f40ff7b635</a></li>

<li>Bump up timeout delays some more in timeouts isolation test. The buildfarm members using -DCLOBBER_CACHE_ALWAYS still don't like this test. Some experimentation shows that on my machine, isolationtester's query to check for "waiting" state takes 2 to 2.5 seconds to bind+execute under -DCLOBBER_CACHE_ALWAYS. Set the timeouts to 5 seconds to leave some headroom for possibly-slower buildfarm critters. Really we ought to fix the "waiting" query, which is not only horridly slow but outright wrong in detail; and then maybe we can back off these timeouts. But right now I'm just trying to get the buildfarm green again. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7921f71a3c747141344d8604f6a6d7b4cddb2a9">http://git.postgresql.org/pg/commitdiff/a7921f71a3c747141344d8604f6a6d7b4cddb2a9</a></li>

<li>Redo postgres_fdw's planner code so it can handle parameterized paths. I wasn't going to ship this without having at least some example of how to do that. This version isn't terribly bright; in particular it won't consider any combinations of multiple join clauses. Given the cost of executing a remote EXPLAIN, I'm not sure we want to be very aggressive about doing that, anyway. In support of this, refactor generate_implied_equalities_for_indexcol so that it can be used to extract equivalence clauses that aren't necessarily tied to an index. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cbc4b80ddc10b36c64514104caa69747c386dcf">http://git.postgresql.org/pg/commitdiff/9cbc4b80ddc10b36c64514104caa69747c386dcf</a></li>

<li>Avoid retrieving dummy NULL columns in postgres_fdw. This should provide some marginal overall savings, since it surely takes many more cycles for the remote server to deal with the NULL columns than it takes for postgres_fdw not to emit them. But really the reason is to keep the emitted queries from looking quite so silly ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e690b9515072fd7767fdeca5c54166f6a77733bc">http://git.postgresql.org/pg/commitdiff/e690b9515072fd7767fdeca5c54166f6a77733bc</a></li>

<li>Update commit_delay documentation. Commit 13fe298ca06f5390df5edf073cf401f9f0b67458 changed this GUC to be PGC_SUSET, but neglected to update the documentation to match. While at it, edit and rearrange the text a little for clarity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82b945c0979350c87ddc52adefe9f0a36dd5b4c8">http://git.postgresql.org/pg/commitdiff/82b945c0979350c87ddc52adefe9f0a36dd5b4c8</a></li>

<li>Suppress uninitialized-variable warning in new checksum code. Some compilers understand that this coding is safe, and some don't. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4912385b56afe68ef76e47d38df1d61ada0fde2f">http://git.postgresql.org/pg/commitdiff/4912385b56afe68ef76e47d38df1d61ada0fde2f</a></li>

<li>Fix contrib/dblink to handle inconsistent DateStyle/IntervalStyle safely. If the remote database's settings of these GUCs are different from ours, ambiguous datetime values may be read incorrectly. To fix, temporarily adopt the remote server's settings while we ingest a query result. This is not a complete fix, since it doesn't do anything about ambiguous values in commands sent to the remote server; but there seems little we can do about that end of it given dblink's entirely textual API for transmitted commands. Back-patch to 9.2. The hazard exists in all versions, but this patch would need more work to apply before 9.2. Given the lack of field complaints about this issue, it doesn't seem worth the effort at present. Daniel Farina and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a3b6772aedbd95557ab1fc489ddf007ac9d405d">http://git.postgresql.org/pg/commitdiff/8a3b6772aedbd95557ab1fc489ddf007ac9d405d</a></li>

<li>Document cross-version compatibility issues for contrib/postgres_fdw. One of the use-cases for postgres_fdw is extracting data from older PG servers, so cross-version compatibility is important. Document what we can do here, and further annotate some of the coding choices that create compatibility constraints. In passing, remove one unnecessary incompatibility with old servers, namely assuming that we didn't need to quote the timezone name 'UTC'. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b86fedfb57ea943f883a13c6d50c5a9e2a1cc57">http://git.postgresql.org/pg/commitdiff/5b86fedfb57ea943f883a13c6d50c5a9e2a1cc57</a></li>

<li>Don't put &lt;indexterm&gt; before &lt;term&gt; in &lt;varlistentry&gt; items. Doing that results in a broken index entry in PDF output. We had only a few like that, which is probably why nobody noticed before. Standardize on putting the &lt;term&gt; first. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdc67938c086104ef7a0e2f1e6912e9ee0ba4c85">http://git.postgresql.org/pg/commitdiff/cdc67938c086104ef7a0e2f1e6912e9ee0ba4c85</a></li>

<li>Update time zone abbreviation lists for changes missed since 2006. Most (all?) of Russia has moved to what's effectively year-round daylight savings time, so that the "standard" zone names now mean an hour later than they used to. Update that, notably changing MSK as per recent complaint from Sergey Konoplev, but also CHOT, GET, IRKT, KGT, KRAT, MAGT, NOVT, OMST, VLAT, YAKT, YEKT. The corresponding DST abbreviations are presumably now obsolete, but I left them in place with their old definitions, just to reduce any possible breakage from this change. Also add VOLT (Europe/Volgograd), which for some reason we never had before, as well as MIST (Antarctica/Macquarie), and fix obsolete definitions of MAWT, TKT, and WST. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b91fe185a71c05ac4528f93a39ba27232acc9e0">http://git.postgresql.org/pg/commitdiff/3b91fe185a71c05ac4528f93a39ba27232acc9e0</a></li>

<li>Semi-automatically detect changes in timezone abbreviations. Add an option to zic.c to dump out all non-obsolete timezone abbreviations defined in the Olson database. Comparing this list to its previous state will clue us in when something happens that we may need to account for in the tznames/ time zone abbreviation lists. The README file's previous exhortation to "just grep for differences" was completely useless advice, in my now-considerable experience; but maybe this will be a bit more useful. As a starting point I built the same list from the tzdata files as they existed in 2006, which is committed here as known_abbrevs.txt. Comparison indeed turned up quite a few changes we had neglected to account for, which I will commit separately. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69602772700e62b7b03e3f0ac7b10aa651c0c998">http://git.postgresql.org/pg/commitdiff/69602772700e62b7b03e3f0ac7b10aa651c0c998</a></li>

<li>Fix some unportable constructs in parallel pg_dump code. Didn't compile on semi-obsolete gcc, and probably not on not-gcc-at-all either. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/846681fdd574548d4f430f2ff7ab44d77b4c79fe">http://git.postgresql.org/pg/commitdiff/846681fdd574548d4f430f2ff7ab44d77b4c79fe</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Use ORDER BY on matview definitions were needed for stable plans. Per report from Hadi Moshayedi of matview regression test failure with optimization of aggregates. A few ORDER BY clauses improve code coverage for matviews while solving that problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/241139ae4baf6264c3c2cd053a547833c6e49a59">http://git.postgresql.org/pg/commitdiff/241139ae4baf6264c3c2cd053a547833c6e49a59</a></li>

<li>Eliminate trivial whitespace inconsistency in docs sample code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08af1a0a2ae8fbbd9949d9fa0f7583f6c09cf4ec">http://git.postgresql.org/pg/commitdiff/08af1a0a2ae8fbbd9949d9fa0f7583f6c09cf4ec</a></li>

<li>Fix problems with incomplete attempt to prohibit OIDS with MVs. Problem with assertion failure in restoring from pg_dump output reported by Joachim Wieland. Review and suggestions by Tom Lane and Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/549dae0352a06a43ec664dc158556e12ec2d30e5">http://git.postgresql.org/pg/commitdiff/549dae0352a06a43ec664dc158556e12ec2d30e5</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow extracting machine-readable object identity Introduce pg_identify_object(oid,oid,int4), which is similar in spirit to pg_describe_object but instead produces a row of machine-readable information to uniquely identify the given object, without resorting to OIDs or other internal representation. This is intended to be used in the event trigger implementation, to report objects being operated on; but it has usefulness of its own. Catalog version bumped because of the new function. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8348ea32ec8d713cd6e5d5e16f15edef22c4d03">http://git.postgresql.org/pg/commitdiff/f8348ea32ec8d713cd6e5d5e16f15edef22c4d03</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix "element &lt;@ range" cost estimation. The statistics-based cost estimation patch for range types broke that, by incorrectly assuming that the left operand of all range oeprators is a range. That lead to a "type x is not a range type" error. Because it took so long for anyone to notice, add a regression test for that case. We still don't do proper statistics-based cost estimation for that, so you just get a default constant estimate. We should look into implementing that, but this patch at least fixes the regression. Spotted by Tom Lane, when testing query from Josh Berkus. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f897c4744fea221dfc7bbd277081edad41d1d58d">http://git.postgresql.org/pg/commitdiff/f897c4744fea221dfc7bbd277081edad41d1d58d</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Silence compiler warnings about unused values. Per gripe from Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4a05c7512b23c8f48c186e685f2ef186374a20a">http://git.postgresql.org/pg/commitdiff/e4a05c7512b23c8f48c186e685f2ef186374a20a</a></li>

<li>Avoid renaming data directory during MSVC upgrade testing. This appears to cause some intermittent file system problems on Windows 8. Instead, set up the old data directory in its intended final location to start with. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7f8465cc6c95da5b1af1de19bc7b7b1b2621276">http://git.postgresql.org/pg/commitdiff/b7f8465cc6c95da5b1af1de19bc7b7b1b2621276</a></li>

<li>Add parallel pg_dump option. New infrastructure is added which creates a set number of workers (threads on Windows, forked processes on Unix). Jobs are then handed out to these workers by the master process as needed. pg_restore is adjusted to use this new infrastructure in place of the old setup which created a new worker for each step on the fly. Parallel dumps acquire a snapshot clone in order to stay consistent, if available. The parallel option is selected by the -j / --jobs command line parameter of pg_dump. Joachim Wieland, lightly editorialized by Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e257a181cc1dc5e19eb5d770ce09cc98f470f5f">http://git.postgresql.org/pg/commitdiff/9e257a181cc1dc5e19eb5d770ce09cc98f470f5f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Robins Tharakan sent in three more revisions of a patch to add regression tests for SCHEMA-related commands.</li>

<li>Pavel Stehule and Hadi Moshayedi traded patches to optimize avg() and friends on NUMERIC.</li>

<li>Hadi Moshayedi sent in a patch to add infrastructure which helps the above optimization, namely an aggtransspace parameter used in creating aggregate functions which approximates the size of the aggregate function's internal transition (a.k.a. state) data.</li>

<li>Steve Singer and Bruce Momjian traded patches to fix an infelicity in the handling of wrong PGSERVICE entries.</li>

<li>Nicholas White sent in four more revisions of a patch to add the ability to ignore NULLs in windowing functions per the SQL standard.</li>

<li>Michael Paquier sent in three revisions of a patch to ensure that pg_dump only dumps valid indexes.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to fix an infelicity in lock_timeout on Windows.</li>

<li>Ants Aasma sent in three revisions of a patch to implement slice-by-8 checksums on x86_64 CPUs.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement OAT_POST_ALTER object access hooks.</li>

<li>Robins Tharakan sent in a patch to increase the regression tests' coverage of the ROLE code.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement row-level access control.</li>

<li>Daniele Varazzo sent in some patches to fix strings for error messages in git master.</li>

<li>Alvaro Herrera sent in another revision of the dropped_objects patch vs. event triggers.</li>

<li>Brendan Jurd sent in a patch to disallow 0-dimensional arrays.</li>

<li>Andrew Dunstan sent in another revision of a patch to fix some hstore compiler warnings.</li>

<li>Alvaro Herrera sent in another revision of a patch to ensure that autovacuum sets priority on vacuums intended to prevent XID wraparound.</li>

<li>Michael Paquier sent in two revisions of a patch to ensure that custom bgworkers receive SIGHUP if the postmaster is notified.</li>

<li>Alexander Korotkov sent in another revision of a patch to make certain (DFA) regexep searches indexable.</li>

<li>Kevin Grittner sent in a patch intended to correct certain situations where pg_dump produced different results on subsequent runs from the first after a reload.</li>

<li>Adriano Lange sent in a patch to add a new optimizer, Sampling and Dynamic Programming (SDP), to PostgreSQL.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Xi Wang sent in a patch to avoid a buffer underflow in errfinish().</li>

<li>Michael Paquier sent in another revision of a patch to overhaul recovery.conf.</li>

</ul>