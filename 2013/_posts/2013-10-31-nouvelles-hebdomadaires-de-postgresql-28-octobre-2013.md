---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 octobre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/10/31/Nouvelles-hebdomadaires-de-PostgreSQL-28-octobre-2013"
---


<p>La prochaine r&eacute;union du PUG indien aura lieu &agrave; Pune le 16 novembre 2013. Infos &amp; RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/events/146224752/">http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/events/146224752/</a><br>

Conf&eacute;rences&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/messages/boards/thread/38935632/">http://www.meetup.com/India-PostgreSQL-UserGroup-Meetup/messages/boards/thread/38935632/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Ora2PG 12.0, un outil de migration depuis Oracle vers PostgreSQL&nbsp;: 

<a target="_blank" href="http://ora2pg.darold.net/">http://ora2pg.darold.net/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

<li>La quatri&egrave;me &eacute;dition du PGDay argentin se tiendra le 14 novembre 2013 &agrave; Buenos Aires, Argentine&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PGDay_Argentina_2013">http://wiki.postgresql.org/wiki/PGDay_Argentina_2013</a></li>

<li>Le PGDay cubain aura lieu les 28 &amp; 29 novembre 2013&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/?page_id=474">http://postgresql.uci.cu/?page_id=474</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20131028143847.GB12225@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Improve setup for documentation building with FOP. Add a makefile rule for building PDFs with FOP. Two new build targets in doc/src/sgml are postgres-A4-fop.pdf and postgres-US-fop.pdf. Run .fo output through xmllint for reformatting, so that errors are easier to find. (The default output has hardly any line breaks, so you might be looking for an error in column 20000.) Set some XSLT parameters to optimize for building with FOP. Remove some redundant or somewhat useless chapterinfo/author information, because it renders strangely with the FO stylesheet. Reviewed-by: &Aacute;lvaro Herrera &lt;alvherre@2ndquadrant.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5963efa8f2b46700c0591281c57aeea3d429c34">http://git.postgresql.org/pg/commitdiff/a5963efa8f2b46700c0591281c57aeea3d429c34</a></li>

<li>Make use of psprintf() in recent changes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/586a8fc75bf266214d635cdcf527176b80f808ea">http://git.postgresql.org/pg/commitdiff/586a8fc75bf266214d635cdcf527176b80f808ea</a></li>

<li>Tweak "line" test to avoid negative zeros on some platforms 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0a546f0d94ec6cbb3cd6b1c82f58d801046615f">http://git.postgresql.org/pg/commitdiff/a0a546f0d94ec6cbb3cd6b1c82f58d801046615f</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix blatantly broken record_image_cmp() logic for pass-by-value fields. Doesn't anybody here pay attention to compiler warnings? 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28858811472f316f73eba0e564837088fc8c6ccd">http://git.postgresql.org/pg/commitdiff/28858811472f316f73eba0e564837088fc8c6ccd</a></li>

<li>Get rid of use of asprintf() in favor of a more portable implementation. asprintf(), aside from not being particularly portable, has a fundamentally badly-designed API; the psprintf() function that was added in passing in the previous patch has a much better API choice. Moreover, the NetBSD implementation that was borrowed for the previous patch doesn't work with non-C99-compliant vsnprintf, which is something we still have to cope with on some platforms; and it depends on va_copy which isn't all that portable either. Get rid of that code in favor of an implementation similar to what we've used for many years in stringinfo.c. Also, move it into libpgcommon since it's not really libpgport material. I think this patch will be enough to turn the buildfarm green again, but there's still cosmetic work left to do, namely get rid of pg_asprintf() in favor of using psprintf(). That will come in a followon patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09a89cb5fc29b47c26d151e82293fd3bef592b7b">http://git.postgresql.org/pg/commitdiff/09a89cb5fc29b47c26d151e82293fd3bef592b7b</a></li>

<li>Replace pg_asprintf() with psprintf(). This eliminates an awkward coding pattern that's also unnecessarily inconsistent with backend coding. psprintf() is now the thing to use everywhere. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c66f9924c1162bfba27c77004ccf42fb6ea188d">http://git.postgresql.org/pg/commitdiff/2c66f9924c1162bfba27c77004ccf42fb6ea188d</a></li>

<li>Suppress a couple of compiler warnings seen with older gcc versions. To wit, bgworker.c: In function `RegisterDynamicBackgroundWorker': bgworker.c:761: warning: `generation' might be used uninitialized in this function dsm_impl.c: In function `dsm_impl_op': dsm_impl.c:197: warning: control reaches end of non-void function Neither of these represent actual bugs, but we may as well tweak the code so that more compilers can tell that. This won't change the generated code on compilers that do recognize that the cases are unreachable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f1ab4610102a73c124000788585c1af2a36284b">http://git.postgresql.org/pg/commitdiff/5f1ab4610102a73c124000788585c1af2a36284b</a></li>

<li>Use improved vsnprintf calling logic in more places. When we are using a C99-compliant vsnprintf implementation (which should be most places, these days) it is worth the trouble to make use of its report of how large the buffer needs to be to succeed. This patch adjusts stringinfo.c and some miscellaneous usages in pg_dump to do that, relying on the logic recently added in libpgcommon's psprintf.c. Since these places want to know the number of bytes written once we succeed, modify the API of pvsnprintf() to report that. There remains near-duplicate logic in pqexpbuffer.c, but since that code is in libpq, psprintf.c's approach of exit()-on-error isn't appropriate for use there. Also note that I didn't bother touching the multitude of places that call (v)snprintf without any attempt to provide a resizable buffer. Release-note-worthy incompatibility: the API of appendStringInfoVA() changed. If there's any third-party code that's calling that directly, it will need tweaking along the same lines as in this patch. David Rowley and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3147acd63e0135aff9a6c4b01d861251925d97d9">http://git.postgresql.org/pg/commitdiff/3147acd63e0135aff9a6c4b01d861251925d97d9</a></li>

<li>Ignore SIGSYS during initdb. This prevents the recently-added probe for shm_open() from crashing on platforms that are impolite enough to deliver a signal rather than returning ENOSYS for an unimplemented kernel call. At least on the one known example (HPUX 10.20), ignoring SIGSYS does result in the desired behavior of getting an ENOSYS error return instead. Per discussion, we might later wish to do this in the backend as well, but for now it seems sufficient to do it in initdb. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5e1e47c7c00d01d1b2fd3a4354f48be427a30f67">http://git.postgresql.org/pg/commitdiff/5e1e47c7c00d01d1b2fd3a4354f48be427a30f67</a></li>

<li>Suppress -0 in the C field of lines computed by line_construct_pts(). It's not entirely clear why some PPC machines are generating -0 here, since the underlying computation should be exactly 0 - 0. Perhaps there's some wider-than-nominal-precision calculations happening? Anyway, the best way to avoid platform-dependent results seems to be to explicitly reset -0 to regular zero. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43fe90f66a0b200f6c32507428349afb45f661ca">http://git.postgresql.org/pg/commitdiff/43fe90f66a0b200f6c32507428349afb45f661ca</a></li>

<li>Revert "Tweak "line" test to avoid negative zeros on some platforms" This reverts commit a0a546f0d94ec6cbb3cd6b1c82f58d801046615f. It seems better to tweak the code to suppress -0 results during line_construct_pts(), which I'll do in the next commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f7a47912af2206698d14650f2149fa951b8ce07">http://git.postgresql.org/pg/commitdiff/1f7a47912af2206698d14650f2149fa951b8ce07</a></li>

<li>Improve pqexpbuffer.c to use modern vsnprintf implementations efficiently. When using a C99-compliant vsnprintf, we can use its report of the required buffer size to avoid making multiple loops through the formatting logic. This is similar to the changes recently made in stringinfo.c, but we can't use psprintf.c here because in libpq we don't want to exit() on error. (The behavior pqexpbuffer.c has historically used is to mark the PQExpBuffer as "broken", ie empty, if it runs into any fatal problem.) To avoid duplicating code more than necessary, I refactored printfPQExpBuffer and appendPQExpBuffer to share a subroutine that's very similar to psprintf.c's pvsnprintf in spirit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f9d9b51f068a19ad243fd8fe500c9970999db9b">http://git.postgresql.org/pg/commitdiff/9f9d9b51f068a19ad243fd8fe500c9970999db9b</a></li>

<li>Use unaligned output in selected regression queries to reduce diff noise. The rules regression test prints all known views and rules, which is a set that changes regularly. Previously, a change in one rule would frequently lead to whitespace changes across the entire output of this query, which is painful to verify and causes undesirable conflicts between unrelated patch sets. Use \a mode to improve matters. Also use \t mode to suppress the total-rows count, which was also a source of unnecessary patch conflicts. Likewise modify the output mode for the list of indexed tables generated in sanity_check.sql. There might be other places where we should use this idea, but these are the ones that have caused the most problems. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c339eb4f853e44c462f53587f69e4a11e89c09b">http://git.postgresql.org/pg/commitdiff/9c339eb4f853e44c462f53587f69e4a11e89c09b</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust cube.out expected output for new test queries. Previous commit modified the test case, but I didn't update cube.out expected output file in previous commit because it was not needed by the platforms I have easy access to. Buildfarm animal 'dugong', running "Debian 4.0 icc 10.1.011 ia64", has now gone red because of that, so update it now. Also adjust cube_3.out. According to git history, it was added to support 64-bit MinGW. There is no such animal in the buildfarm, so I'm doing this blindly, but it was added quite recently so maybe someone still cares. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36f4c7843cf3d201279855ed9a6ebc1deb3c9463">http://git.postgresql.org/pg/commitdiff/36f4c7843cf3d201279855ed9a6ebc1deb3c9463</a></li>

<li>Extend cube on-disk format to pack points more tightly. If the lower left and upper right corners of a cube are the same, set a flag in the cube header, and only store one copy of the coordinates. That cuts the on-disk size into half for the common case that the cube datatype is used to represent points rather than boxes. The new format is backwards-compatible with the old one, so pg_upgrade still works. However, to get the space savings, the data needs to be rewritten. A simple VACUUM FULL or REINDEX is not enough, as the old Datums will just be moved to the new heap/index as is. A pg_dump and reload, or something similar like casting to text and back, will do the trick. This patch deliberately doesn't update all the alternative expected output files, as I don't have access to machines that produce those outputs. I'm not sure if they are still relevant, but if they are, the buildfarm will tell us and produce the diff required to fix it. If none of the buildfarm animals need them, they should be removed altogether. Patch by Stas Kelvich. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08612f45a0e236bd01db3fc96cc1fa7bfabc927c">http://git.postgresql.org/pg/commitdiff/08612f45a0e236bd01db3fc96cc1fa7bfabc927c</a></li>

<li>Fix two bugs in setting the vm bit of empty pages. Use a critical section when setting the all-visible flag on an empty page, and WAL-logging it. log_newpage_buffer() contains an assertion that it must be called inside a critical section, and it's the right thing to do when modifying a buffer anyway. Also, the page should be marked dirty before calling log_newpage_buffer(), per the comment in log_newpage_buffer() and src/backend/access/transam/README. Patch by Andres Freund, in response to my report. Backpatch to 9.2, like the patch that introduced these bugs (a6370fd9). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83eb54001cb69d6ee8f0813c4e280be876823068">http://git.postgresql.org/pg/commitdiff/83eb54001cb69d6ee8f0813c4e280be876823068</a></li>

<li>Fix typos in comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d6d425ab8d9b00c097d8bb8ce85302ea62887a3">http://git.postgresql.org/pg/commitdiff/4d6d425ab8d9b00c097d8bb8ce85302ea62887a3</a></li>

<li>Fix memory leak when an empty ident file is reloaded. Hari Babu 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb598456dcdad5080f6dee980bc5cc94d2e9f574">http://git.postgresql.org/pg/commitdiff/bb598456dcdad5080f6dee980bc5cc94d2e9f574</a></li>

<li>Plug memory leak when reloading config file. The absolute path to config file was not pfreed. There are probably more small leaks here and there in the config file reload code and assign hooks, and in practice no-one reloads the config files frequently enough for it to be a problem, but this one is trivial enough that might as well fix it. Backpatch to 9.3 where the leak was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/138184adc5f7c60c184972e4d23f8cdb32aed77d">http://git.postgresql.org/pg/commitdiff/138184adc5f7c60c184972e4d23f8cdb32aed77d</a></li>

<li>Improve documentation of random() function. Move random() and setseed() to a separate table, to have them grouped together. Also add a notice that random() is not cryptographically secure. Original patch by Honza Horak, although I didn't use his version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/75fdcec14543b60cc0c67483d8cc47d5c7adf1a8">http://git.postgresql.org/pg/commitdiff/75fdcec14543b60cc0c67483d8cc47d5c7adf1a8</a></li>

<li>Increase the number of different values used when seeding random(). When a backend process is forked, we initialize the system's random number generator with srandom(). The seed used is derived from the backend's pid and the timestamp. However, we only used the microseconds part of the timestamp, and it was XORed with the pid, so the total range of different seed values chosen was 0-999999. That's quite limited. Change the code to also use the seconds part of the timestamp in the seed, and shift the microseconds so that all 32 bits of the seed are used. Honza Horak 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98c50656cac2e6b873419fd09569a9119c02148c">http://git.postgresql.org/pg/commitdiff/98c50656cac2e6b873419fd09569a9119c02148c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Simplify tab completion rules for views and foreign tables. Since an increasing number of views and foreign tables are now able to be updated, complete with any table, view, or foreign table in the relevant contexts. This avoids the need to use a complex query that may be both confusing to end-users and nonperformant to construct the list of possible completions. Dean Rasheed, persuant to a complaint from Bernd Helme and a suggestion from Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c4dd2cd9a26cadb3e5234badf2a5eedf89423a2">http://git.postgresql.org/pg/commitdiff/5c4dd2cd9a26cadb3e5234badf2a5eedf89423a2</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add large object functions catering to SQL callers. With these, one need no longer manipulate large object descriptors and extract numeric constants from header files in order to read and write large object contents from SQL. Pavel Stehule, reviewed by Rushabh Lathia. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c50b7c09d852b6dc292bf24c72a0ffcac6cb2cab">http://git.postgresql.org/pg/commitdiff/c50b7c09d852b6dc292bf24c72a0ffcac6cb2cab</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Hari Babu sent in two more revisions of a patch to fix a race condition where a large table will continue to bloat despite being vacuumed.</li>

<li>Laurenz Albe sent in another revision of a patch to add a deprecation message for LDAP as needed.</li>

<li>Alexander Korotkov sent in another revision of a patch to add some more information to GIN indexes to make them more useful.</li>

<li>Andres Freund sent in two more flocks of patches which are infrastructure for logical replication.</li>

<li>Alvaro Herrera sent in a patch to track the timestamp of transaction commits.</li>

<li>Andres Freund sent in a patch to add some locks needed to ensure safe operation of materialized views during refresh in case of crash during DDL.</li>

<li>Dean Rasheed and Andres Freund traded patches to correct the locking behavior of INSERT INTO VIEW when it's defined WITH CHECK OPTION.</li>

<li>Craig Ringer sent in a patch to testing row-level access control with SECURITY DEFINER functions returning refcursors.</li>

<li>Nigel Heron sent in another revision of a patch to collect network stats.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to use MAP_HUGETLB where supported.</li>

<li>Thomas Munro sent in three revisions of a patch to implement CLUSTER FREEZE.</li>

<li>Hari Babu sent in a patch to improve test coverage of schema commands, and user and tablespace files.</li>

<li>Kyotaro HORIGUCHI sent in a patch to fix a situation where UNION ALL on partitioned tables doesn't use indexes.</li>

<li>Heikki Linnakangas sent in a patch to fix an issue where failure while inserting a parent tuple into a B-tree could corrupt data.</li>

<li>Robert Haas sent in a patch to change dynamic shared memory to use Size instead of uint64 for size.</li>

<li>Etsuro Fujita sent in two more revisions of a patch to fix the documentation for ALTER FOREIGN DATA WRAPPER to reflect current realities.</li>

<li>Hugo Mercier sent in a patch to detect nested function calls.</li>

<li>Rodolfo Campero sent in a patch to implement domains over arrays in PL/Python.</li>

</ul>