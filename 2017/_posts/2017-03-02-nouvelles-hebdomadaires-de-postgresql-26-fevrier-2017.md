---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 26 février 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/03/02/Nouvelles-hebdomadaires-de-PostgreSQL-26-février-2017"
---


<h2>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-02/">http://archives.postgresql.org/pgsql-jobs/2017-02/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: Meetup &agrave; Toulouse le 2 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Toulouse/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Toulouse/</a>]</li>

<li>Le premier pgDay Israel 2017 aura lieu le 2 mars 2017. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://pgday.org.il/">http://pgday.org.il/</a></li>

<li>La <em>PGConf India 2017</em> aura lieu les 2 &amp; 3 mars 2017 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde)&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></li>

<li>PostgreSQL@SCaLE aura lieu les 2 &amp; 3 mars 2017 au centre des conventions de Pasadena, comme partie du SCaLE 15X&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/15x/">http://www.socallinuxexpo.org/scale/15x/</a></li>

<li>[ndt: Meetup &agrave; Nantes le 8 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Nantes/</a>]</li>

<li>[ndt: Meetup &agrave; Paris le 9 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Paris/</a>]</li>

<li>PgConf.Russia 2017 se d&eacute;roulera du 15 au 17 mars 2017 &agrave; Moscou&nbsp;: <a target="_blank" href="https://pgconf.ru/en">https://pgconf.ru/en</a></li>

<li>Le PGDay Asia 2017 est programm&eacute; les 17 et 18 mars &agrave; Singapour&nbsp;: <a target="_blank" href="http://2017.pgday.asia/">http://2017.pgday.asia/</a></li>

<li>Le PGDay nordique se tiendra &agrave; Stockholm (Su&egrave;de) au Sheraton Hotel, le 21 mars 2017&nbsp;: <a target="_blank" href="https://2017.nordicpgday.org/">https://2017.nordicpgday.org/</a></li>

<li>Le pgDay Paris 2017 aura lieu &agrave; Paris (France) le 23 mars 2017&nbsp;: <a target="_blank" href="http://2017.pgday.paris/">http://2017.pgday.paris/</a></li>

<li>La <em>PGConf US 2017</em> aura lieu &agrave; Jersey City (New Jersey, USA) du 28 au 31 mars&nbsp;: <a target="_blank" href="http://www.pgconf.us/2017/">http://www.pgconf.us/2017/</a></li>

<li>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/">http://www.pgcon.org/2017/</a></li>

<li>Postgres Vision aura lieu &agrave; Boston du 26 au 28 juin 2017&nbsp;: <a target="_blank" href="http://postgresvision.com/">http://postgresvision.com/</a></li>

<li>Le PGDay suisse se tiendra &agrave; Rapperwil le 30 juin 2017. L'appel &agrave; conf&eacute;renciers court jusqu'au 14 avril&nbsp;: <a target="_blank" href="http://www.pgday.ch/2017/">http://www.pgday.ch/2017/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170226230150.GA2560@fetter.org">http://www.postgresql.org/message-id/20170226230150.GA2560@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix documentation of to_char/to_timestamp TZ, tz, OF formatting patterns. These are only supported in to_char, not in the other direction, but the documentation failed to mention that. Also, describe TZ/tz as printing the time zone "abbreviation", not "name", because what they print is elsewhere referred to that way. Per bug #14558. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10257fc5ff74487a46594bd8c8c041878f409c17">http://git.postgresql.org/pg/commitdiff/10257fc5ff74487a46594bd8c8c041878f409c17</a></li>

<li>Improve error message for misuse of TZ, tz, OF formatting patterns. Be specific about which pattern is being complained of, and avoid saying "it's not supported in to_date", which is just confusing if the error is actually coming out of to_timestamp. We can phrase it as "is only supported in to_char", instead. Also, use the term "formatting field" not "format pattern", because other error messages in the same file prefer that terminology. (This isn't terribly consistent with the documentation, so maybe we should change all these error messages?) <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c073505e8e4fa8a03312fea714da25ab83cb5fa">http://git.postgresql.org/pg/commitdiff/1c073505e8e4fa8a03312fea714da25ab83cb5fa</a></li>

<li>Reject too-old Python versions a bit sooner. Commit 04aad4018 added this check after the search for a Python shared library, which seems to me to be a pretty unfriendly ordering. The search might fail for what are basically version-related reasons, and in such a case it'd be better to say "your Python is too old" than "could not find shared library for Python". <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4e5ce3c1aeadf81b504bc9d683b67950bd3f8766">http://git.postgresql.org/pg/commitdiff/4e5ce3c1aeadf81b504bc9d683b67950bd3f8766</a></li>

<li>Use less-generic table name in new regression test case. Creating global objects named "foo" isn't an especially wise thing, but especially not in a test script that has already used that name for something else, and most especially not in a script that runs in parallel with other scripts that use that name :-( Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c95f0b478a91b58391720dcda35bc032e582564">http://git.postgresql.org/pg/commitdiff/1c95f0b478a91b58391720dcda35bc032e582564</a></li>

<li>Fix sloppy handling of corner-case errors in fd.c. Several places in fd.c had badly-thought-through handling of error returns from lseek() and close(). The fact that those would seldom fail on valid FDs is probably the reason we've not noticed this up to now; but if they did fail, we'd get quite confused. LruDelete and LruInsert actually just Assert'd that lseek never fails, which is pretty awful on its face. In LruDelete, we indeed can't throw an error, because that's likely to get called during error abort and so throwing an error would probably just lead to an infinite loop. But by the same token, throwing an error from the close() right after that was ill-advised, not to mention that it would've left the LRU state corrupted since we'd already unlinked the VFD from the list. I also noticed that really, most of the time, we should know the current seek position and it shouldn't be necessary to do an lseek here at all. As patched, if we don't have a seek position and an lseek attempt doesn't give us one, we'll close the file but then subsequent re-open attempts will fail (except in the somewhat-unlikely case that a FileSeek(SEEK_SET) call comes between and allows us to re-establish a known target seek position). This isn't great but it won't result in any state corruption. Meanwhile, having an Assert instead of an honest test in LruInsert is really dangerous: if that lseek failed, a subsequent read or write would read or write from the start of the file, not where the caller expected, leading to data corruption. In both LruDelete and FileClose, if close() fails, just LOG that and mark the VFD closed anyway. Possibly leaking an FD is preferable to getting into an infinite loop or corrupting the VFD list. Besides, as far as I can tell from the POSIX spec, it's unspecified whether or not the file has been closed, so treating it as still open could be the wrong thing anyhow. I also fixed a number of other places that were being sloppy about behaving correctly when the seekPos is unknown. Also, I changed FileSeek to return -1 with EINVAL for the cases where it detects a bad offset, rather than throwing a hard elog(ERROR). It seemed pretty inconsistent that some bad-offset cases would get a failure return while others got elog(ERROR). It was missing an offset validity check for the SEEK_CUR case on a closed file, too. Back-patch to all supported branches, since all this code is fundamentally identical in all of them. Discussion: <a target="_blank" href="https://postgr.es/m/2982.1487617365@sss.pgh.pa.us">https://postgr.es/m/2982.1487617365@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f97de05a14bbd26cf0252906b44643e8923bdf85">http://git.postgresql.org/pg/commitdiff/f97de05a14bbd26cf0252906b44643e8923bdf85</a></li>

<li>Suppress unused-variable warning. Rearrange so we don't have an unused variable in disable-cassert case. Discussion: <a target="_blank" href="https://postgr.es/m/CAMkU=1x63f2QyFTeas83xJqD+Hm1PBuok1LrzYzS-OngDzYOVA@mail.gmail.com">https://postgr.es/m/CAMkU=1x63f2QyFTeas83xJqD+Hm1PBuok1LrzYzS-OngDzYOVA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c56ac2913a1f3adce674a2eb27257d0bca81317f">http://git.postgresql.org/pg/commitdiff/c56ac2913a1f3adce674a2eb27257d0bca81317f</a></li>

<li>Fix contrib/pg_trgm's extraction of trigrams from regular expressions. The logic for removing excess trigrams from the result was faulty. It intends to avoid merging the initial and final states of the NFA, which is necessary, but in testing whether removal of a specific trigram would cause that, it failed to consider the combined effects of all the state merges that that trigram's removal would cause. This could result in a broken final graph that would never match anything, leading to GIN or GiST indexscans not finding anything. To fix, add a "tentParent" field that is used only within this loop, and set it to show state merges that we are tentatively going to do. While examining a particular arc, we must chase up through tentParent links as well as regular parent links (the former can only appear atop the latter), and we must account for state init/fin flag merges that haven't actually been done yet. To simplify the latter, combine the separate init and fin bool fields into a bitmap flags field. I also chose to get rid of the "children" state list, which seems entirely inessential. Per bug #14563 from Alexey Isayko, which the added test cases are based on. Back-patch to 9.3 where this code was added. Report: <a target="_blank" href="https://postgr.es/m/20170222111446.1256.67547@wrigleys.postgresql.org">https://postgr.es/m/20170222111446.1256.67547@wrigleys.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/8816.1487787594@sss.pgh.pa.us">https://postgr.es/m/8816.1487787594@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e43e8714c9e976e41b7429fa7c426c9a6e5e8e6">http://git.postgresql.org/pg/commitdiff/9e43e8714c9e976e41b7429fa7c426c9a6e5e8e6</a></li>

<li>De-support floating-point timestamps. Per discussion, the time has come to do this. The handwriting has been on the wall at least since 9.0 that this would happen someday, whenever it got to be too much of a burden to support the float-timestamp option. The triggering factor now is the discovery that there are multiple bugs in the code that attempts to implement use of integer timestamps in the replication protocol even when the server is built for float timestamps. The internal float timestamps leak into the protocol fields in places. While we could fix the identified bugs, there's a very high risk of introducing more. Trying to build a wall that would positively prevent mixing integer and float timestamps is more complexity than we want to undertake to maintain a long-deprecated option. The fact that these bugs weren't found through testing also indicates a lack of interest in float timestamps. This commit disables configure's --disable-integer-datetimes switch (it'll still accept --enable-integer-datetimes, though), removes direct references to USE_INTEGER_DATETIMES, and removes discussion of float timestamps from the user documentation. A considerable amount of code is rendered dead by this, but removing that will occur as separate mop-up. Discussion: <a target="_blank" href="https://postgr.es/m/26788.1487455319@sss.pgh.pa.us">https://postgr.es/m/26788.1487455319@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6aa17e0ae367afdcea07118e016111af4fa6bc3">http://git.postgresql.org/pg/commitdiff/b6aa17e0ae367afdcea07118e016111af4fa6bc3</a></li>

<li>Remove pg_control's enableIntTimes field. We don't need it any more. pg_controldata continues to report that date/time type storage is "64-bit integers", but that's now a hard-wired behavior not something it sees in the data. This avoids breaking pg_upgrade, and perhaps other utilities that inspect pg_control this way. Ditto for pg_resetwal. I chose to remove the "bigint_timestamps" output column of pg_control_init(), though, as that function hasn't been around long and probably doesn't have ossified users. Discussion: <a target="_blank" href="https://postgr.es/m/26788.1487455319@sss.pgh.pa.us">https://postgr.es/m/26788.1487455319@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d28aafb6dda326688e2f042c95c93ea57963c03c">http://git.postgresql.org/pg/commitdiff/d28aafb6dda326688e2f042c95c93ea57963c03c</a></li>

<li>Remove now-dead code for !HAVE_INT64_TIMESTAMP. This is a basically mechanical removal of #ifdef HAVE_INT64_TIMESTAMP tests and the negative-case controlled code. Discussion: <a target="_blank" href="https://postgr.es/m/26788.1487455319@sss.pgh.pa.us">https://postgr.es/m/26788.1487455319@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9d092c962ea3262930e3c31a8c3d79b66ce9d43">http://git.postgresql.org/pg/commitdiff/b9d092c962ea3262930e3c31a8c3d79b66ce9d43</a></li>

<li>Consistently declare timestamp variables as TimestampTz. Twiddle the replication-related code so that its timestamp variables are declared TimestampTz, rather than the uninformative "int64" that was previously used for meant-to-be-always-integer timestamps. This resolves the int64-vs-TimestampTz declaration inconsistencies introduced by commit 7c030783a, though in the opposite direction to what was originally suggested. This required including datatype/timestamp.h in a couple more places than before. I decided it would be a good idea to slim down that header by not having it pull in &lt;float.h&gt; etc, as those headers are no longer at all relevant to its purpose. Unsurprisingly, a small number of .c files turn out to have been depending on those inclusions, so add them back in the .c files as needed. Discussion: <a target="_blank" href="https://postgr.es/m/26788.1487455319@sss.pgh.pa.us">https://postgr.es/m/26788.1487455319@sss.pgh.pa.us</a> Discussion: <a target="_blank" href="https://postgr.es/m/27694.1487456324@sss.pgh.pa.us">https://postgr.es/m/27694.1487456324@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c29aff959dc64f7321062e7f33d8c6ec23db53d3">http://git.postgresql.org/pg/commitdiff/c29aff959dc64f7321062e7f33d8c6ec23db53d3</a></li>

<li>Add an Assert that enum_cmp_internal() gets passed an FmgrInfo pointer. If someone were to try to call one of the enum comparison functions using DirectFunctionCallN, it would very likely seem to work, because only in unusual cases does enum_cmp_internal() need to access the typcache. But once such a case occurred, code like that would crash with a null pointer dereference. To make an oversight of that sort less likely to escape detection, add a non-bypassable Assert that fcinfo-&gt;flinfo isn't NULL. Discussion: <a target="_blank" href="https://postgr.es/m/25226.1487900067@sss.pgh.pa.us">https://postgr.es/m/25226.1487900067@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d493e1a013514a6f0abb5d30d08219c1831cfec">http://git.postgresql.org/pg/commitdiff/6d493e1a013514a6f0abb5d30d08219c1831cfec</a></li>

<li>Suppress compiler warnings in ecpg test on newer Windows toolchains. nan_test.pgc supposed that it could unconditionally #define isnan() and isinf() on WIN32. This was evidently copied at some point from src/include/port/win32.h, but nowadays there's a test on _MSC_VER there. Make nan_test.pgc look the same. Per buildfarm warnings. There's no evidence this produces anything worse than a warning, and besides it's only a test case, so I don't feel a need to back-patch. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5658a0764d5ac5ea8c2c11d27c62d5472234227">http://git.postgresql.org/pg/commitdiff/c5658a0764d5ac5ea8c2c11d27c62d5472234227</a></li>

<li>Fix unportable definition of BSWAP64() macro. We have a portable way of writing uint64 constants, but whoever wrote this macro didn't know about it. While at it, fix unsafe under-parenthesization of arguments. That might be moot, because there are already good reasons not to use the macro on anything more complicated than a simple variable, but it's still poor practice. Per buildfarm warnings. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41c16edcf6c90d1f42810ea523b7e65c99edad50">http://git.postgresql.org/pg/commitdiff/41c16edcf6c90d1f42810ea523b7e65c99edad50</a></li>

<li>Remove useless duplicate inclusions of system header files. c.h #includes a number of core libc header files, such as &lt;stdio.h&gt;. There's no point in re-including these after having read postgres.h, postgres_fe.h, or c.h; so remove code that did so. While at it, also fix some places that were ignoring our standard pattern of "include postgres[_fe].h, then system header files, then other Postgres header files". While there's not any great magic in doing it that way rather than system headers last, it's silly to have just a few files deviating from the general pattern. (But I didn't attempt to enforce this globally, only in files I was touching anyway.) I'd be the first to say that this is mostly compulsive neatnik-ism, but over time it might save enough compile cycles to be useful. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e3755ecb2d058f7d123dd35a2e1784006190962">http://git.postgresql.org/pg/commitdiff/9e3755ecb2d058f7d123dd35a2e1784006190962</a></li>

<li>Remove some configure header-file checks that we weren't really using. We had some AC_CHECK_HEADER tests that were really wastes of cycles, because the code proceeded to #include those headers unconditionally anyway, in all or a large majority of cases. The lack of complaints shows that those headers are available on every platform of interest, so we might as well let configure run a bit faster by not probing those headers at all. I suspect that some of the tests I left alone are equally useless, but since all the existing #includes of the remaining headers are properly guarded, I didn't touch them. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bd7f85796ec373ecae61dd480437b3e668ec883">http://git.postgresql.org/pg/commitdiff/2bd7f85796ec373ecae61dd480437b3e668ec883</a></li>

<li>Put back #include &lt;windows.h&gt; in dirmod.c. I removed this in commit 9e3755ecb, reasoning that the win32.h port-specific header file included by c.h would have provided it. However, that's only true on native win32 builds, not Cygwin builds. It may be that some of the other &lt;windows.h&gt; inclusions also need to be put back on the same grounds; but this is the only one that is clearly meant to be included #ifdef __CYGWIN__, so maybe this is the extent of the problem. Awaiting further buildfarm results. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/285ca26132abdd0a1adc11a21789f103c4e3f6d8">http://git.postgresql.org/pg/commitdiff/285ca26132abdd0a1adc11a21789f103c4e3f6d8</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Small correction to BRIN docs. Replace incorrect word "index" with "heap" Takayuki Tsunakawa <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bf41dd1908a0c05833168b9972e1c52cb7547b7">http://git.postgresql.org/pg/commitdiff/0bf41dd1908a0c05833168b9972e1c52cb7547b7</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Drop support for Python 2.3. There is no specific reason for this right now, but keeping support for old Python versions around indefinitely increases the maintenance burden. The oldest supported Python version is now Python 2.4, which is still shipped in RHEL/CentOS 5 by default. In configure, add a check for the required Python version and give a friendly error message for an old version, instead of relying on an obscure build error later on. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/04aad401867ad3e1519615d8486e32b50dbcb5f5">http://git.postgresql.org/pg/commitdiff/04aad401867ad3e1519615d8486e32b50dbcb5f5</a></li>

<li>Make more use of castNode(). <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38d103763d14baddf3cbfe4b00b501059fc9447f">http://git.postgresql.org/pg/commitdiff/38d103763d14baddf3cbfe4b00b501059fc9447f</a></li>

<li>doc: Update URL for plr. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7248099c169b40b8f70cdaf8e12d0deaab9b16e2">http://git.postgresql.org/pg/commitdiff/7248099c169b40b8f70cdaf8e12d0deaab9b16e2</a></li>

<li>Fix whitespace. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74321d87fb1a27746c9dd0853b2da3287a0940d9">http://git.postgresql.org/pg/commitdiff/74321d87fb1a27746c9dd0853b2da3287a0940d9</a></li>

<li>Remove deprecated COMMENT ON RULE syntax. This was only used for allowing upgrades from pre-7.3 instances, which was a long time ago. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8d016d81940e75c126aa52971b7903b7301002e">http://git.postgresql.org/pg/commitdiff/e8d016d81940e75c126aa52971b7903b7301002e</a></li>

<li>Fix logical replication with different encodings. reported by Shinoda, Noriyoshi &lt;noriyoshi.shinoda@hpe.com&gt;; partial patch by Kyotaro HORIGUCHI &lt;horiguchi.kyotaro@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3368f9173c13e2e293df91f75f1a5c565c4ca18">http://git.postgresql.org/pg/commitdiff/c3368f9173c13e2e293df91f75f1a5c565c4ca18</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Remove confusing comment about unsupported feature. The initial table synchronization feature has not been supported yet, but there was the confusing header comment about it in logical/worker.c. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d36537008a8d53853d2fda49913cb54fa6e28f94">http://git.postgresql.org/pg/commitdiff/d36537008a8d53853d2fda49913cb54fa6e28f94</a></li>

<li>Fix typo in comment. neha khatri <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e14ec7d346f8686c9471c16a01579d6b1c3b4975">http://git.postgresql.org/pg/commitdiff/e14ec7d346f8686c9471c16a01579d6b1c3b4975</a></li>

<li>Make walsender always initialize the buffers. Walsender uses the local buffers for each outgoing and incoming message. Previously when creating replication slot, walsender forgot to initialize one of them and which can cause the segmentation fault error. To fix this issue, this commit changes walsender so that it always initialize them before it executes the requested replication command. Back-patch to 9.4 where replication slot was introduced. Problem report and initial patch by Stas Kelvich, modified by me. Report: <a target="_blank" href="https://www.postgresql.org/message-id/A1E9CB90-1FAC-4CAD-8DBA-9AA62A6E97C5@postgrespro.ru">https://www.postgresql.org/message-id/A1E9CB90-1FAC-4CAD-8DBA-9AA62A6E97C5@postgrespro.ru</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d04a59be31bf004b880226be0e3fe84acff2815">http://git.postgresql.org/pg/commitdiff/1d04a59be31bf004b880226be0e3fe84acff2815</a></li>

<li>Fix connection leak in DROP SUBSCRIPTION command. Previously the command forgot to close the connection to the publisher when it failed to drop the replication slot. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/898a792eb8283e31efc0b6fcbc03bbcd5f7df667">http://git.postgresql.org/pg/commitdiff/898a792eb8283e31efc0b6fcbc03bbcd5f7df667</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Add tests for two-phase commit. There's some ongoing performance work on this area, so let's make sure we don't break things. Extracted from a larger patch originally by Stas Kelvich. Authors: Stas Kelvich, Nikhil Sontakke, Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/CAMGcDxfsuLLOg=h5cTg3g77Jjk-UGnt=RW7zK57zBSoFsapiWA@mail.gmail.com">https://postgr.es/m/CAMGcDxfsuLLOg=h5cTg3g77Jjk-UGnt=RW7zK57zBSoFsapiWA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30820982b295404ed00ddd28c8864211dc986dd3">http://git.postgresql.org/pg/commitdiff/30820982b295404ed00ddd28c8864211dc986dd3</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>doc: Add missing comma. Yugo Nagata <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d912dd062b64287adcabab4180abafefd07cea14">http://git.postgresql.org/pg/commitdiff/d912dd062b64287adcabab4180abafefd07cea14</a></li>

<li>Shut down Gather's children before shutting down Gather itself. It turns out that the original shutdown order here does not work well. Multiple people attempting to develop further parallel query patches have discovered that they need to do cleanup before the DSM goes away, and you can't do that if the parent node gets cleaned up first. Patch by me, reviewed by KaiGai Kohei and Dilip Kumar. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoY6bOc1YnhcAQnMfCBDbsJzROQ3sYxSAL-SYB5tMJcTKg@mail.gmail.com">http://postgr.es/m/CA+TgmoY6bOc1YnhcAQnMfCBDbsJzROQ3sYxSAL-SYB5tMJcTKg@mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/9A28C8860F777E439AA12E8AEA7694F8012AEB82@BPXM15GP.gisp.nec.co.jp">http://postgr.es/m/9A28C8860F777E439AA12E8AEA7694F8012AEB82@BPXM15GP.gisp.nec.co.jp</a> Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoYuPOc=+xrG1v0fCsoLbKAab9F1ddOeaaiLMzKOiBar1Q@mail.gmail.com">http://postgr.es/m/CA+TgmoYuPOc=+xrG1v0fCsoLbKAab9F1ddOeaaiLMzKOiBar1Q@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acf555bc53acb589b5a2827e65d655fa8c9adee0">http://git.postgresql.org/pg/commitdiff/acf555bc53acb589b5a2827e65d655fa8c9adee0</a></li>

<li>Fix incorrect typecast. Ashutosh Sharma, per a report from Mithun Cy. Discussion: <a target="_blank" href="http://postgr.es/m/CAD__OujgqNNnCujeFTmKpjNu+W4smS8Hbi=RcWAhf1ZUs3H4WA@mail.gmail.com">http://postgr.es/m/CAD__OujgqNNnCujeFTmKpjNu+W4smS8Hbi=RcWAhf1ZUs3H4WA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4316928d57bec22e95875e6487a4d665bd03a52">http://git.postgresql.org/pg/commitdiff/b4316928d57bec22e95875e6487a4d665bd03a52</a></li>

<li>Pass the source text for a parallel query to the workers. With this change, you can see the query that a parallel worker is executing in pg_stat_activity, and if the worker crashes you can see what query it was executing when it crashed. Rafia Sabih, reviewed by Kuntal Ghosh and Amit Kapila and slightly revised by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c728f382970b6346142fe4409212063ee3e92dc">http://git.postgresql.org/pg/commitdiff/4c728f382970b6346142fe4409212063ee3e92dc</a></li>

<li>Make tablesample work with partitioned tables. This was an oversight in the original partitioning commit. Amit Langote, reviewed by David Fetter Discussion: <a target="_blank" href="http://postgr.es/m/59af6590-8ace-04c4-c36c-ea35d435c60e@lab.ntt.co.jp">http://postgr.es/m/59af6590-8ace-04c4-c36c-ea35d435c60e@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5dbdb2f799232cb1b6df7d7a85d59ade3234d30c">http://git.postgresql.org/pg/commitdiff/5dbdb2f799232cb1b6df7d7a85d59ade3234d30c</a></li>

<li>Allow custom and foreign scans to have shutdown callbacks. This is expected to be useful mostly when performing such scans in parallel, because in that case it allows (in combination with commit acf555bc53acb589b5a2827e65d655fa8c9adee0) nodes below a Gather to get control just before the DSM segment goes away. KaiGai Kohei, except that I rewrote the documentation. Reviewed by Claudio Freire. Discussion: <a target="_blank" href="http://postgr.es/m/CADyhKSXJK0jUJ8rWv4AmKDhsUh124_rEn39eqgfC5D8fu6xVuw@mail.gmail.com">http://postgr.es/m/CADyhKSXJK0jUJ8rWv4AmKDhsUh124_rEn39eqgfC5D8fu6xVuw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a315b967cc1bd43ecf3c10ea48b44a4fb0ff8d45">http://git.postgresql.org/pg/commitdiff/a315b967cc1bd43ecf3c10ea48b44a4fb0ff8d45</a></li>

<li>Basic tab completion for partitioning. Amit Langote Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobYOj=A8GesiEs_V2Wq46-_w0+7MOwPiNWC+iuzJ-uWjA@mail.gmail.com">http://postgr.es/m/CA+TgmobYOj=A8GesiEs_V2Wq46-_w0+7MOwPiNWC+iuzJ-uWjA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d1fb11a95bafdae9889898361f70e9bcbef6993">http://git.postgresql.org/pg/commitdiff/9d1fb11a95bafdae9889898361f70e9bcbef6993</a></li>

<li>TAP tests for target_session_attrs connection parameter. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/caa6c1f193a9ab4b4fb9b8687f41e6d66bbeaade">http://git.postgresql.org/pg/commitdiff/caa6c1f193a9ab4b4fb9b8687f41e6d66bbeaade</a></li>

</ul>

<p>Andrew Dunstan pushed:</p>

<ul>

<li>Correctly handle array pseudotypes in to_json and to_jsonb. Columns with array pseudotypes have not been identified as arrays, so they have been rendered as strings in the json and jsonb conversion routines. This change allows them to be rendered as json arrays, making it possible to deal correctly with the anyarray columns in pg_stats. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/502a3832cc54c7115dacb8a2dae06f0620995ac6">http://git.postgresql.org/pg/commitdiff/502a3832cc54c7115dacb8a2dae06f0620995ac6</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>pg_upgrade docs: clarify instructions on standby extensions. Previously the pg_upgrade standby upgrade instructions said not to execute pgcrypto.sql, but it should have referenced the extension command "CREATE EXTENSION pgcrypto". This patch makes that doc change. Reported-by: a private bug report Backpatch-through: 9.4, where standby instructions were added <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5639ceddcb7f3efa8751b2ba6e50cc1d27cc2a45">http://git.postgresql.org/pg/commitdiff/5639ceddcb7f3efa8751b2ba6e50cc1d27cc2a45</a></li>

</ul>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Clarify the role of checkpoint at the begininng of base backups. Output a message about checkpoint starting in verbose mode of pg_basebackup, and make the documentation state more clearly that this happens. Author: Michael Banck <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51e26c9c3d2904b65041fc4a19c72c62508f63d4">http://git.postgresql.org/pg/commitdiff/51e26c9c3d2904b65041fc4a19c72c62508f63d4</a></li>

<li>Add missing progname prefix to some messages. Author: Michael Banck <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1513dbea7f89053476a5e95e2f2e952135a5b34c">http://git.postgresql.org/pg/commitdiff/1513dbea7f89053476a5e95e2f2e952135a5b34c</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Rushabh Lathia sent in another revision of a patch to implement Gather Merge.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to make hba configuration for SASL more extensible and implement SASLprep aka NFKC for SCRAM authentication.</p>

<p>Amit Langote and Ashutosh Bapat traded patches to allow dropping partitioned table without CASCADE.</p>

<p>Rushabh Lathia sent in another revision of a patch to implement wait events for disk I/O.</p>

<p>Dave Page sent in a patch to implement pg_ls_wal_dir() and pg_ls_logdir().</p>

<p>Tomas Vondra sent in a patch to add page_checksum and bt_page_items(bytea) to the pageinspect supplied module.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to implement xmltable().</p>

<p>Takeshi Ideriha sent in another revision of a patch to allow DECLARE STATEMENT to set up a connection in ECPG.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to add tab completion in psql for the new SUBSCRIPTION commands.</p>

<p>Thomas Munro sent in another revision of a patch to make SERIALIZABLE work with parallel query.</p>

<p>Etsuro Fujita and Rushabh Lathia traded patches to push down more UPDATEs/DELETEs in postgres_fdw.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to smooth the transition from floating point timestamps.</p>

<p>Amit Langote and Ashutosh Bapat traded patches to take note of the fact that partitioned tables are empty themselves by preventing the from trying to do things to them that need to access files, not allocating storage for partitioned tables, and avoiding creating scan nodes for partitioned tables.</p>

<p>Simon Riggs sent in two revisions of a patch to ensure that SnapshotResetXmin() is not issued at the end of xact and reduce the calls to SnapshotResetXmin() using a simple heuristic to reduce the effects.</p>

<p>Beena Emerson sent in two more revisions of a patch to allow increasing the default WAL segment size.</p>

<p>Peter Moser sent in another revision of a patch to add ALIGN and NORMALIZE operators for temporal queries.</p>

<p>Tomas Vondra and Andres Freund traded patches to add two slab-like memory allocators.</p>

<p>Dilip Kumar sent in another revision of a patch to implement parallel bitmap heap scan.</p>

<p>Jim Mlodgenski sent in a patch to add system views for monitoring materialized views.</p>

<p>Amit Langote sent in a patch to show only the partition key upon failing to find a partition.</p>

<p>Mithun Cy sent in another revision of a patch to expand hash indexes differently.</p>

<p>Tatsuo Ishii sent in a patch to improve the calculation of statement_timeout for the extended query protocol.</p>

<p>Amit Langote sent in a patch to add regression tests foreign partition DDL.</p>

<p>Vaishnavi Prabakaran sent in another revision of a patch to add batch/pipelining support to libpq.</p>

<p>Masahiko Sawada sent in two more revisions of a patch to fix an infelicity between DROP SUBSCRIPTION and ROLLBACK.</p>

<p>Thomas Munro sent in two more revisions of a patch to measure replication lag.</p>

<p>Petr Jel&Atilde;&shy;nek sent in three more revisions of a patch to fix some snapbuild woes.</p>

<p>Pavan Deolasee sent in another revision of a patch to implement WARM.</p>

<p>Robins Tharakan and Simon Riggs traded patches to make pg_dumpall work without access to pg_authid.</p>

<p>Rafia Sabih sent in two revisions of a patch to make parallelism work for queries coming from functions (SQL and several PLs).</p>

<p>Michael Banck sent in two revisions of a patch to reorder tablespaces in basebackup tar stream for backup_label.</p>

<p>Petr Jel&Atilde;&shy;nek sent in two more revisions of a patch to use asynchronous connect API in libpqwalreceiver, fix after trigger execution in logical replication, and add RENAME support for PUBLICATIONs and SUBSCRIPTIONs.</p>

<p>Pavan Deolasee sent in a patch to remove all direct references to ip_posid and ip_blkid members of ItemPointerData struct and instead use ItemPointerGetOffsetNumber and ItemPointerGetBlockNumber macros respectively to access these members.</p>

<p>Peter Eisentraut sent in a patch to silence compiler warnings from gcc -O3.</p>

<p>Nikolay Shaplov sent in another revision of a patch to move all am-related reloption code into src/backend/access/[am-name] and get rid of relopt_kind for custom AM.</p>

<p>Jim Nasby sent in a patch to move refreshes of materialized views to last in dbObjectTypePriority[].</p>

<p>Jim Nasby sent in a patch to standardize on one of objsubid, subobjid.</p>

<p>Takayuki Tsunakawa sent in another revision of a patch to support huge pages on Windows.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to implement asynchronous execution.</p>

<p>Yugo Nagata sent in two more revisions of a patch to fix a comment on the JunkFilter struct.</p>

<p>Bernd Helmle sent in a patch to make subquery alias optional in FROM clause.</p>

<p>Chhatoi Pritam Baral sent in a patch to make the planner expand "foocol &lt;@ 'x,y'::foorange" into "foocol between x and y".</p>

<p>Petr Jel&Atilde;&shy;nek sent in two more revisions of a patch to add logical replication support for initial data copy.</p>

<p>Mithun Cy sent in another revision of a patch to implement auto_prewarm.</p>

<p>Corey Huinker sent in four more revisions of a patch to add \if and friends to psql.</p>

<p>Stephen Frost sent in another revision of a patch to fix pg_upgrade blob comments.</p>

<p>Masahiko Sawada sent in a patch to report the number of skipped frozen pages by manual VACUUM.</p>

<p>Craig Ringer sent in a patch to better detect timeouts in PostgresNode::psql using regex.</p>

<p>Eiji Seki sent in another revision of a patch to add a GetOldestXminExtend for ignoring arbitrary vacuum flags.</p>

<p>Haribabu Kommi sent in a patch to make it possible to have utility commands benefit from a parallel plan.</p>

<p>Tom Lane sent in a patch to turn AllocBlockData from a linked list into a doubly-linked list.</p>

<p>Andrew Dunstan sent in a patch to make enums indexable in the btree_gin and btree_gist extensions.</p>

<p>Tom Lane sent in a patch to assert that an enum comparator can use cache.</p>

<p>Dave Page sent in a patch to add a default role called pg_monitor, complete with a lot of things such a role should have.</p>

<p>Naoki Okano sent in a patch to add an --enable-parse-comment option to ECPG.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in a patch to add a VERBOSE_SORT variable to psql.</p>

<p>Andrew Gierth sent in another revision of a patch to add hash support for grouping sets.</p>

<p>Dilip Kumar sent in two more revisions of a patch to implement parallel merge join.</p>

<p>David Rowley sent in a patch to add recognition of "range queries" like "x &gt; 34 AND x &lt; 42" and IS [NOT] NULL to clausesel.</p>

<p>Simon Riggs sent in another revision of a patch to make some changes to the recovery.conf API.</p>

<p>Peter Eisentraut sent in another revision of a patch to enable DROP FUNCTION to drop multiple functions at once.</p>

<p>Peter Eisentraut sent in a patch to add cursor and execute methods to plan object in PL/PythonU.</p>

<p>Simon Riggs sent in another revision of a patch to reduce lock levels for reloptions.</p>

<p>Andrew Dunstan sent in two revisions of a patch to turn the DirectFunctionCall{n]Coll functions into macros calling these functions and passing NULL as the flinfo param.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to prevent pg_dump -t from dumping publications.</p>