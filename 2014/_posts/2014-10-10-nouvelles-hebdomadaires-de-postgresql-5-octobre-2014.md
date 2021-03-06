---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 octobre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/10/10/Nouvelles-hebdomadaires-de-PostgreSQL-5-octobre-2014"
---


<p>La <em>PGCon 2015</em> aura lieu en juin, quelques semaines plus tard par rapport aux ann&eacute;es pr&eacute;c&eacute;dentes. Le site web sera bient&ocirc;t mis &agrave; jour. Entre temps, veuillez lire&nbsp;: 

<a target="_blank" href="https://plus.google.com/109158564828766727391/posts/5VrpSxoZDAa">https://plus.google.com/109158564828766727391/posts/5VrpSxoZDAa</a></p>

<p>Federico Campoli parlera de PostgreSQL et de Big Data lors du Linux Day italien de Ferrara, le 25 octobre 2014&nbsp;: 

<a target="_blank" href="http://www.pgdba.co.uk/2014/10/postgresql-and-big-data-talk.html">http://www.pgdba.co.uk/2014/10/postgresql-and-big-data-talk.html</a></p>

<p>Notez les dates&nbsp;: la seconde conf&eacute;rence PostgreSQLienne suisse aura lieu les 25 &amp; 26 juin 2015 au HSR Rapperswil. Il y aura une journ&eacute;e d&eacute;di&eacute;e aux tutoriels, et une journ&eacute;e pour les pr&eacute;sentations "normales". Plus de d&eacute;tails sous peu.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgtoolkit v1.0.2, une bo&icirc;te &agrave; outil pour la maintenance de PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/grayhemp/pgtoolkit">https://github.com/grayhemp/pgtoolkit</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20141006053413.GB7761@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert 95d737ff to add 'ignore_nulls'. Per discussion, revert the commit which added 'ignore_nulls' to row_to_json. This capability would be better added as an independent function rather than being bolted on to row_to_json. Additionally, the implementation didn't address complex JSON objects, and so was incomplete anyway. Pointed out by Tom and discussed with Andrew and Robert. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8a026e4f15e2063cd7fe6cb9ffe44f2a81398bd">http://git.postgresql.org/pg/commitdiff/c8a026e4f15e2063cd7fe6cb9ffe44f2a81398bd</a></li>

<li>Also revert e3ec0728, JSON regression tests. Managed to forget to update the other JSON regression test output, again. Revert the commit which fixed it before. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08da8947f4b52ad41770f260a3962b032de77120">http://git.postgresql.org/pg/commitdiff/08da8947f4b52ad41770f260a3962b032de77120</a></li>

<li>Correct stdin/stdout usage in COPY .. PROGRAM The COPY documentation incorrectly stated, for the PROGRAM case, that we read from stdin and wrote to stdout. Fix that, and improve consistency by referring to the 'PostgreSQL' user instead of the 'postgres' user, as is done in the rest of the COPY documentation. Pointed out by Peter van Dijk. Back-patch to 9.3 where COPY .. PROGRAM was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8492d86342915cb466eeb2d896d9b49887f59350">http://git.postgresql.org/pg/commitdiff/8492d86342915cb466eeb2d896d9b49887f59350</a></li>

<li>Fix CreatePolicy, pg_dump -v; psql and doc updates. Peter Geoghegan pointed out that valgrind was, rightfully, complaining about CreatePolicy() ending up copying beyond the end of the parsed policy name. Name is a fixed-size type and we need to use namein (through DirectFunctionCall1()) to flush out the entire array before we pass it down to heap_form_tuple. Michael Paquier pointed out that pg_dump --verbose was missing a newline and Fabr&iacute;zio de Royes Mello further pointed out that the schema was also missing from the messages, so fix those also. Also, based on an off-list comment from Kevin, rework the psql \d output to facilitate copy/pasting into a new CREATE or ALTER POLICY command. Lastly, improve the pg_policies view and update the documentation for it, along with a few other minor doc corrections based on an off-list discussion with Adam Brightwell. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/78d72563ef141ddc507ddd5ae77db613a309041a">http://git.postgresql.org/pg/commitdiff/78d72563ef141ddc507ddd5ae77db613a309041a</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change JSONB's on-disk format for improved performance. The original design used an array of offsets into the variable-length portion of a JSONB container. However, such an array is basically uncompressible by simple compression techniques such as TOAST's LZ compressor. That's bad enough, but because the offset array is at the front, it tended to trigger the give-up-after-1KB heuristic in the TOAST code, so that the entire JSONB object was stored uncompressed; which was the root cause of bug #11109 from Larry White. To fix without losing the ability to extract a random array element in O(1) time, change this scheme so that most of the JEntry array elements hold lengths rather than offsets. With data that's compressible at all, there tend to be fewer distinct element lengths, so that there is scope for compression of the JEntry array. Every N'th entry is still an offset. To determine the length or offset of any specific element, we might have to examine up to N preceding JEntrys, but that's still O(1) so far as the total container size is concerned. Testing shows that this cost is negligible compared to other costs of accessing a JSONB field, and that the method does largely fix the incompressible-data problem. While at it, rearrange the order of elements in a JSONB object so that it's "all the keys, then all the values" not alternating keys and values. This doesn't really make much difference right at the moment, but it will allow providing a fast path for extracting individual object fields from large JSONB values stored EXTERNAL (ie, uncompressed), analogously to the existing optimization for substring extraction from large EXTERNAL text values. Bump catversion to denote the incompatibility in on-disk format. We will need to fix pg_upgrade to disallow upgrading jsonb data stored with 9.4 betas 1 and 2. Heikki Linnakangas and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/def4c28cf9147472ba4cfc5b68a098d7a29fb0fb">http://git.postgresql.org/pg/commitdiff/def4c28cf9147472ba4cfc5b68a098d7a29fb0fb</a></li>

<li>Fix some more problems with nested append relations. As of commit a87c72915 (which later got backpatched as far as 9.1), we're explicitly supporting the notion that append relations can be nested; this can occur when UNION ALL constructs are nested, or when a UNION ALL contains a table with inheritance children. Bug #11457 from Nelson Page, as well as an earlier report from Elvis Pranskevichus, showed that there were still nasty bugs associated with such cases: in particular the EquivalenceClass mechanism could try to generate "join" clauses connecting an appendrel child to some grandparent appendrel, which would result in assertion failures or bogus plans. Upon investigation I concluded that all current callers of find_childrel_appendrelinfo() need to be fixed to explicitly consider multiple levels of parent appendrels. The most complex fix was in processing of "broken" EquivalenceClasses, which are ECs for which we have been unable to generate all the derived equality clauses we would like to because of missing cross-type equality operators in the underlying btree operator family. That code path is more or less entirely untested by the regression tests to date, because no standard opfamilies have such holes in them. So I wrote a new regression test script to try to exercise it a bit, which turned out to be quite a worthwhile activity as it exposed existing bugs in all supported branches. The present patch is essentially the same as far back as 9.2, which is where parameterized paths were introduced. In 9.0 and 9.1, we only need to back-patch a small fragment of commit 5b7b5518d, which fixes failure to propagate out the original WHERE clauses when a broken Emmanuel Cecchet contains constant members. (The regression test case results show that these older branches are noticeably stupider than 9.2+ in terms of the quality of the plans generated; but we don't really care about plan quality in such cases, only that the plan not be outright wrong. A more invasive fix in the older branches would not be a good idea anyway from a plan-stability standpoint.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a6c168c7859e150c61e30b7519471045bab065e">http://git.postgresql.org/pg/commitdiff/5a6c168c7859e150c61e30b7519471045bab065e</a></li>

<li>Fix bogus logic for zic -P option. The quick hack I added to zic to dump out currently-in-use timezone abbreviations turns out to have a nasty bug: within each zone, it was printing the last "struct ttinfo" to be *defined*, not necessarily the last one in use. This was mainly a problem in zones that had changed the meaning of their zone abbreviation (to another GMT offset value) and later changed it back. As a result of this error, we'd missed out updating the tznames/ files for some jurisdictions that have changed their zone abbreviations since the tznames/ files were originally created. I'll address the missing data updates in a separate commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/596857043023738099d6d16f8edbe6b7353876c0">http://git.postgresql.org/pg/commitdiff/596857043023738099d6d16f8edbe6b7353876c0</a></li>

<li>Update time zone abbreviations lists. This updates known_abbrevs.txt to be what it should have been already, were my -P patch not broken; and updates some tznames/ entries that missed getting any love in previous timezone data updates because zic failed to flag the change of abbreviation. The non-cosmetic updates: * Remove references to "ADT" as "Arabia Daylight Time", an * abbreviation that's been out of use since 2007; therefore, claiming there is a conflict with "Atlantic Daylight Time" doesn't seem especially helpful. (We have left obsolete entries in the files when they didn't conflict with anything, but that seems like a different situation.) * Fix entirely incorrect GMT offsets for CKT (Cook Islands), FJT, FJST (Fiji); we didn't even have them on the proper side of the date line. (Seems to have been aboriginal errors in our tznames data; there's no evidence anything actually changed recently.) * FKST (Falkland Islands Summer Time) is now used all year round, so don't mark it as a DST abbreviation. * Update SAKT (Sakhalin) to mean GMT+11 not GMT+10. In cosmetic changes, I fixed a bunch of wrong (or at least obsolete) claims about abbreviations not being present in the zic files, and tried to be consistent about how obsolete abbreviations are labeled. Note the underlying timezone/data files are still at release 2014e; this is just trying to get us in sync with what those files actually say before we go to the next update. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f499eee9d4b30e761b04fa28406578c10b4badf">http://git.postgresql.org/pg/commitdiff/4f499eee9d4b30e761b04fa28406578c10b4badf</a></li>

<li>Update time zone data files to tzdata release 2014h. Most zones in the Russian Federation are subtracting one or two hours as of 2014-10-26. Update the meanings of the abbreviations IRKT, KRAT, MAGT, MSK, NOVT, OMST, SAKT, VLAT, YAKT, YEKT to match. The IANA timezone database has adopted abbreviations of the form AxST/AxDT for all Australian time zones, reflecting what they believe to be current majority practice Down Under. These names do not conflict with usage elsewhere (other than ACST for Acre Summer Time, which has been in disuse since 1994). Accordingly, adopt these names into our "Default" timezone abbreviation set. The "Australia" abbreviation set now contains only CST,EAST,EST,SAST,SAT,WST, all of which are thought to be mostly historical usage. Note that SAST has also been changed to be South Africa Standard Time in the "Default" abbreviation set. Add zone abbreviations SRET (Asia/Srednekolymsk) and XJT (Asia/Urumqi), and use WSST/WSDT for western Samoa. Also a DST law change in the Turks &amp; Caicos Islands (America/Grand_Turk), and numerous corrections for historical time zone data. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/513d06ded1b44206903b87dabefee5a97243ba67">http://git.postgresql.org/pg/commitdiff/513d06ded1b44206903b87dabefee5a97243ba67</a></li>

<li>Update 9.4 release notes for commits through today. Add entries for recent changes, including noting the JSONB format change and the recent timezone data changes. We should remove those two items before 9.4 final: the JSONB change will be of no interest in the long run, and it's not normally our habit to mention timezone updates in major-release notes. But it seems important to document them temporarily for beta testers. I failed to resist the temptation to wordsmith a couple of existing entries, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f706f2c1a06dfd3fe69194a93d417ca4be8951b1">http://git.postgresql.org/pg/commitdiff/f706f2c1a06dfd3fe69194a93d417ca4be8951b1</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc fix for pg_recvlogical: --create doesn't immediately exit. Author: Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/445d262852f7aa83f9973a13bd56320d3a63842c">http://git.postgresql.org/pg/commitdiff/445d262852f7aa83f9973a13bd56320d3a63842c</a></li>

<li>Rename CACHE_LINE_SIZE to PG_CACHE_LINE_SIZE. As noted in 

<a target="_blank" href="http://bugs.debian.org/763098">http://bugs.debian.org/763098</a> there is a conflict between postgres' definition of CACHE_LINE_SIZE and the definition by various *bsd platforms. It's debatable who has the right to define such a name, but postgres' use was only introduced in 375d8526f290 (9.4), so it seems like a good idea to rename it. Discussion: 20140930195756.GC27407@msg.df7cb.de Per complaint of Christoph Berg in the above email, although he's not the original bug reporter. Backpatch to 9.4 where the define was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef8863844bb0b0dab7b92c5f278302a42b4bf05a">http://git.postgresql.org/pg/commitdiff/ef8863844bb0b0dab7b92c5f278302a42b4bf05a</a></li>

<li>Improve documentation about binary/textual output mode for output plugins. Also improve related error message as it contributed to the confusion. Discussion: CAB7nPqQrqFzjqCjxu4GZzTrD9kpj6HMn9G5aOOMwt1WZ8NfqeA@mail.gmail.com, CAB7nPqQXc_+g95zWnqaa=mVQ4d3BVRs6T41frcEYi2ocUrR3+A@mail.gmail.com Per discussion between Michael Paquier, Robert Haas and Andres Freund. Backpatch to 9.4 where logical decoding was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ef3c29a4b43e72d93cff65a17a9ccccff87618d">http://git.postgresql.org/pg/commitdiff/0ef3c29a4b43e72d93cff65a17a9ccccff87618d</a></li>

<li>Block signals while computing the sleep time in postmaster's main loop. DetermineSleepTime() was previously called without blocked signals. That's not good, because it allows signal handlers to interrupt its workings. DetermineSleepTime() was added in 9.3 with the addition of background workers (da07a1e856511), where it only read from BackgroundWorkerList. Since 9.4, where dynamic background workers were added (7f7485a0cde), the list is also manipulated in DetermineSleepTime(). That's bad because the list now can be persistently corrupted if modified by both a signal handler and DetermineSleepTime(). This was discovered during the investigation of hangs on buildfarm member anole. It's unclear whether this bug is the source of these hangs or not, but it's worth fixing either way. I have confirmed that it can cause crashes. It luckily looks like this only can cause problems when bgworkers are actively used. Discussion: 20140929193733.GB14400@awork2.anarazel.de Backpatch to 9.3 where background workers were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a39e78b710eb588e102aedd2828611d7bc74714b">http://git.postgresql.org/pg/commitdiff/a39e78b710eb588e102aedd2828611d7bc74714b</a></li>

<li>pg_recvlogical.c code review. Several comments still referred to 'initiating', 'freeing', 'stopping' replication slots. These were terms used during different phases of the development of logical decoding, but are no long accurate. Also rename StreamLog() to StreamLogicalLog() and add 'void' to the prototype. Author: Michael Paquier, with some editing by me. Backpatch to 9.4 where pg_recvlogical was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fdf81c9a6cf94921084e52c8d2ff903bae362620">http://git.postgresql.org/pg/commitdiff/fdf81c9a6cf94921084e52c8d2ff903bae362620</a></li>

<li>Install all headers for the new atomics API. Previously, by mistake, only atomics.h was installed. Kohei KaiGai 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/952872698d9443fdf9b808a1376017f00c91065a">http://git.postgresql.org/pg/commitdiff/952872698d9443fdf9b808a1376017f00c91065a</a></li>

<li>Refactor replication connection code of various pg_basebackup utilities. Move some more code to manage replication connection command to streamutil.c. A later patch will introduce replication slot via pg_receivexlog and this avoid duplicating relevant code between pg_receivexlog and pg_recvlogical. Author: Michael Paquier, with some editing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0c013e08cfbebd35ec982c4df15d44b521094d52">http://git.postgresql.org/pg/commitdiff/0c013e08cfbebd35ec982c4df15d44b521094d52</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: have pg_upgrade fail for old 9.4 JSONB format. Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35419aeb8356e3d6973816846cb6ca64a0f736bf">http://git.postgresql.org/pg/commitdiff/35419aeb8356e3d6973816846cb6ca64a0f736bf</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_dump's --if-exists for large objects. This was born broken in 9067310cc5dd590e36c2c3219dbf3961d7c9f8cb. Per trouble report from Joachim Wieland. Pavel St&#283;hule and &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fd02931a6c83bf3beb2d03f65700600787d569a3">http://git.postgresql.org/pg/commitdiff/fd02931a6c83bf3beb2d03f65700600787d569a3</a></li>

<li>Don't balance vacuum cost delay when per-table settings are in effect. When there are cost-delay-related storage options set for a table, trying to make that table participate in the autovacuum cost-limit balancing algorithm produces undesirable results: instead of using the configured values, the global values are always used, as illustrated by Mark Kirkwood in 

<a target="_blank" href="http://www.postgresql.org/message-id/52FACF15.8020507@catalyst.net.nz">http://www.postgresql.org/message-id/52FACF15.8020507@catalyst.net.nz</a> Since the mechanism is already complicated, just disable it for those cases rather than trying to make it cope. There are undesirable side-effects from this too, namely that the total I/O impact on the system will be higher whenever such tables are vacuumed. However, this is seen as less harmful than slowing down vacuum, because that would cause bloat to accumulate. Anyway, in the new system it is possible to tweak options to get the precise behavior one wants, whereas with the previous system one was simply hosed. This has been broken forever, so backpatch to all supported branches. This might affect systems where cost_limit and cost_delay have been set for individual tables. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1021bd6a89bc756c2a72b29eeee1a7a5c25f64f5">http://git.postgresql.org/pg/commitdiff/1021bd6a89bc756c2a72b29eeee1a7a5c25f64f5</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add functions for dealing with PGP armor header lines to pgcrypto. This add a new pgp_armor_headers function to extract armor headers from an ASCII-armored blob, and a new overloaded variant of the armor function, for constructing an ASCII-armor with extra headers. Marko Tiikkaja and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/32984d8fc3dbb90a3fafb69fece0134f1ea790f9">http://git.postgresql.org/pg/commitdiff/32984d8fc3dbb90a3fafb69fece0134f1ea790f9</a></li>

<li>Remove num_xloginsert_locks GUC, replace with a #define. I left the GUC in place for the beta period, so that people could experiment with different values. No-one's come up with any data that a different value would be better under some circumstances, so rather than try to document to users what the GUC, let's just hard-code the current value, 8. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5fa6c81a43d047a070eff1f711b90c084c6d3e31">http://git.postgresql.org/pg/commitdiff/5fa6c81a43d047a070eff1f711b90c084c6d3e31</a></li>

<li>Refactor pgbench log-writing code to a separate function. The doCustom function was incredibly long, this makes it a little bit more readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84f0ea3f68aed5e5b9cc1ef8599a7c28b0b97b0f">http://git.postgresql.org/pg/commitdiff/84f0ea3f68aed5e5b9cc1ef8599a7c28b0b97b0f</a></li>

<li>Fix typo in error message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86f809088c2c4f931b2a7554f4be92cd3f33ba13">http://git.postgresql.org/pg/commitdiff/86f809088c2c4f931b2a7554f4be92cd3f33ba13</a></li>

<li>Fix documentation for CREATE SEQUENCE IF NOT EXISTS. The [ IF NOT EXISTS ] was put in wrong place in the syntax. Pointed out by Marti Raudsepp. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a08e21f35454ced4050598b09be571a98bdb104">http://git.postgresql.org/pg/commitdiff/7a08e21f35454ced4050598b09be571a98bdb104</a></li>

<li>Check for GiST index tuples that don't fit on a page. The page splitting code would go into infinite recursion if you try to insert an index tuple that doesn't fit even on an empty page. Per analysis and suggested fix by Andrew Gierth. Fixes bug #11555, reported by Bryan Seitz (analysis happened over IRC). Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7690ddea0c1f6d16584b3e90010a9933ca7134e0">http://git.postgresql.org/pg/commitdiff/7690ddea0c1f6d16584b3e90010a9933ca7134e0</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Increase the number of buffer mapping partitions to 128. Testing by Amit Kapila, Andres Freund, and myself, with and without other patches that also aim to improve scalability, seems to indicate that this change is a significant win over the current value and over smaller values such as 64. It's not clear how high we can push this value before it starts to have negative side-effects elsewhere, but going this far looks OK. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3acc10c997f916f6a741d0b4876126b7b08e3892">http://git.postgresql.org/pg/commitdiff/3acc10c997f916f6a741d0b4876126b7b08e3892</a></li>

<li>Still another typo fix for 0709b7ee72e4bc71ad07b7120acd117265ab51d0. Buildfarm member anole caught this one. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9019264f2e2f87c879855449f57aeeb336ee3c88">http://git.postgresql.org/pg/commitdiff/9019264f2e2f87c879855449f57aeeb336ee3c88</a></li>

<li>Fix typos in comments. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/017b2e9822cf6c28fc5024a5f9a6f0d3dde885a4">http://git.postgresql.org/pg/commitdiff/017b2e9822cf6c28fc5024a5f9a6f0d3dde885a4</a></li>

<li>Eliminate one background-worker-related flag variable. Teach sigusr1_handler() to use the same test for whether a worker might need to be started as ServerLoop(). Aside from being perhaps a bit simpler, this prevents a potentially-unbounded delay when starting a background worker. On some platforms, select() doesn't return when interrupted by a signal, but is instead restarted, including a reset of the timeout to the originally-requested value. If signals arrive often enough, but no connection requests arrive, sigusr1_handler() will be executed repeatedly, but the body of ServerLoop() won't be reached. This change ensures that, even in that case, background workerw will eventually get launched. This is far from a perfect fix; really, we need select() to return control to ServerLoop() after an interrupt, either via the self-pipe trick or some other mechanism. But that's going to require more work and discussion, so let's do this for now to at least mitigate the damage. Per investigation of test_shm_mq failures on buildfarm member anole. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d0410d66037c2f3f9bee45e0a2db9e47eeba2bb4">http://git.postgresql.org/pg/commitdiff/d0410d66037c2f3f9bee45e0a2db9e47eeba2bb4</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Translation updates 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ec4a970fe6b996cba765a7e9c1897c00bf6c968">http://git.postgresql.org/pg/commitdiff/1ec4a970fe6b996cba765a7e9c1897c00bf6c968</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Bogdan Pilch sent in a patch to allow trailing commas in SELECT statements.</li>

<li>Heikki Linnakangas sent in a patch to use a plain memcmp() to compare the Datums while building the red-black tree for GIN.</li>

<li>Peter Eisentraut sent in a patch to correct the documentation for effective_io_concurrency.</li>

<li>Peter Geoghegan sent in another revision of a patch to add a new infrastructure to sortsupport, and add a single client of this new infrastructure, the text sortsupport routine.</li>

<li>Herwin Weststrate sent in two revisions of a patch to allow format 0000-0000-0000 in the MAC parser.</li>

<li>Kaigai Kouhei sent in two more revisions of a patch to create a custom scan API.</li>

<li>Michael Paquier and Ali Akbar traded patches to add a generate_series(numeric, numeric) function.</li>

<li>Fabr&iacute;zio de Royes Mello and Marti Raudsepp traded patches to implement CINE for indexes.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Adam Brightwell sent in three revisions of a patch to clean up superuser().</li>

<li>Ilya Kosmodemiansky sent in a patch to to trace LWLocks with the lowest possible performance impact.</li>

<li>Thomas Munro sent in two revisions of a patch to implement NEXT VALUE FOR &lt;sequence&gt;.</li>

<li>Kaigai Kouhei sent in a patch to insure that the new port/atomics/*.h files are included when installing.</li>

<li>Marti Raudsepp sent in a patch to allow semijoin/antijoin/hashed SubPlan optimization when an EXISTS subquery contains a LIMIT clause with a positive constant.</li>

<li>Fabr&iacute;zio de Royes Mello sent in a patch to ensure that the CREATE SEQUENCE syntax correctly summarizes the options for CREATE SEQUENCE.</li>

<li>Kaigai Kouhei sent in a patch to make ResourceOwnerForgetBuffer() O(1) instead of O(N^2).</li>

<li>Michael Banck sent in a patch to allow logging to notice that a checkpoint is to be written on shutdown.</li>

<li>Heikki Linnakangas sent in another revision of a patch to create a pgbench throttling latency limit.</li>

<li>Shigeru HANADA sent in a WIP patch to add join push-down support for foreign tables.</li>

<li>Andrew Dunstan sent in a patch to implement json[b]_strip_nulls.</li>

<li>Marco Nenciarini sent in a patch to add an optional backup profile to pg_basebackup in service of the eventual feature, incremental backup.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the WAL format and API.</li>

</ul>