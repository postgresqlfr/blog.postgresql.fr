---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 7 août 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-08-09-nouvelles-hebdomadaires-de-postgresql-7-aout-2011 "
---


<p>Consistent State et la <em>US PostgreSQL Association</em> organisent une journ&eacute;e d'ateliers le 21 octobre 2011&nbsp;: 

<a target="_blank" href="http://pgday.consistentstate.com/node/15">http://pgday.consistentstate.com/node/15</a></p>

<p>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre &agrave; l'h&ocirc;tel "Casa 400" &agrave; Amsterdam (Hollande). Elle couvrira des sujets pour utilisateurs, d&eacute;veloppeurs et contributeurs &agrave; PostgreSQL, ainsi que pour les d&eacute;cideurs et hauts responsables. Pour plus d'informations sur la conf&eacute;rence, veuillez vous r&eacute;f&eacute;rer au site web suivant&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PGDay Porto Alegre</em> est programm&eacute; pour le 19 ao&ucirc;t 2011 &agrave; Porto Alegre (Br&eacute;sil)&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/2011/pgday/rs">http://www.postgresql.org.br/eventos/2011/pgday/rs</a></li>

<li>Postgres Open 2011, conf&eacute;rence ayant pour th&egrave;me les "&eacute;volutions brutales dans l'industrie de la base de donn&eacute;es", aura lieu du 14 au 16 septembre 2011 &agrave; Chicago (Illinois, &Eacute;tats-Unis) &agrave; l'h&ocirc;tel "<em>Westin Michigan Avenue</em>"&nbsp;: 

<a target="_blank" href="http://postgresopen.org">http://postgresopen.org</a></li>

<li>Le <em>PG-Day Denver 2011</em> aura lieu le samedi 17 septembre 2011 dans le campus Auraria pr&egrave;s de Denver, Colorado&nbsp;: 

<a target="_blank" href="http://pgday.consistentstate.com/">http://pgday.consistentstate.com/</a></li>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San Jos&eacute; (Californie, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

<li><em>PGConf.DE 2011</em> est une conf&eacute;rence germanophone tenue le 11 novembre au mus&eacute;e industriel du Rhin &agrave; Oberhausen (Allemagne). L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2011.pgconf.de/">http://2011.pgconf.de/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110807">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor stylistic corrections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/85b436f7b1f06a6ffa8d2f29b03d6e440de18784">http://git.postgresql.org/pg/commitdiff/85b436f7b1f06a6ffa8d2f29b03d6e440de18784</a></li>

<li>Make pgbench use erand48() rather than random(). glibc renders random() thread-safe by wrapping a futex lock around it; testing reveals that this limits the performance of pgbench on machines with many CPU cores. Rather than switching to random_r(), which is only available on GNU systems and crashes unless you use undocumented alchemy to initialize the random state properly, switch to our built-in implementation of erand48(), which is both thread-safe and concurrent. Since the list of reasons not to use the operating system's erand48() is getting rather long, rename ours to pg_erand48() (and similarly for our implementations of lrand48() and srand48()) and just always use those. We were already doing this on Cygwin anyway, and the glibc implementation is not quite thread-safe, so pgbench wouldn't be able to use that either. Per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4af43ee3f165c8e4b332a7e680a44f4b7ba2d3c1">http://git.postgresql.org/pg/commitdiff/4af43ee3f165c8e4b332a7e680a44f4b7ba2d3c1</a></li>

<li>Teach psql to display comments on languages and casts. The output of \dL (list languages) is fairly narrow, so we just always display the comment. \dC (list casts) can get fairly wide, so we only display comments if the new \dC+ option is specified. Josh Kupershmidt. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b17efdfdd846c9bfad1637686e6f18198ea3df5">http://git.postgresql.org/pg/commitdiff/3b17efdfdd846c9bfad1637686e6f18198ea3df5</a></li>

<li>Create VXID locks "lazily" in the main lock table. Instead of entering them on transaction startup, we materialize them only when someone wants to wait, which will occur only during CREATE INDEX CONCURRENTLY. In Hot Standby mode, the startup process must also be able to probe for conflicting VXID locks, but the lock need never be fully materialized, because the startup process does not use the normal lock wait mechanism. Since most VXID locks never need to touch the lock manager partition locks, this can significantly reduce blocking contention on read-heavy workloads. Patch by me. Review by Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84e37126770dd6de903dad88ce150a49b63b5ef9">http://git.postgresql.org/pg/commitdiff/84e37126770dd6de903dad88ce150a49b63b5ef9</a></li>

<li>Tweak PQresStatus() to avoid a clang compiler warning. The previous test for status &lt; 0 test is in fact testing nothing if the compiler considers an enum to be an unsigned data type. clang doesn't like tautologies, so do this instead. Report by Peter Geoghegan, fix as suggested by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b43bf617fdb3ecde709892c3bd8997ac41410f2f">http://git.postgresql.org/pg/commitdiff/b43bf617fdb3ecde709892c3bd8997ac41410f2f</a></li>

<li>Modestly improve pgbench's checking for invalid ranges. The old check against MAX_RANDOM_VALUE is clearly irrelevant since getrand() no longer calls random(). Instead, check whether min and max are close enough together to avoid an overflow inside getrand(), as suggested by Tom Lane. This is still somewhat silly, because we're using atoi(), which doesn't check for overflow anyway and (at least on my system) will cheerfully return 0 when given "4294967296". But that's a problem for another commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/68cbb9f4e70b7b7ed515b5c63bafbe47d9617bf0">http://git.postgresql.org/pg/commitdiff/68cbb9f4e70b7b7ed515b5c63bafbe47d9617bf0</a></li>

<li>Allow per-column foreign data wrapper options. Shigeru Hanada, with fairly minor editing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4096c76399ad99dce35cd62f60599ea8748a3dd">http://git.postgresql.org/pg/commitdiff/c4096c76399ad99dce35cd62f60599ea8748a3dd</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid integer overflow when LIMIT + OFFSET &gt;= 263. This fixes bug #6139 reported by Hitoshi Harada. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89df948ec26679e09f71baf6bbb9b06f9d329712">http://git.postgresql.org/pg/commitdiff/89df948ec26679e09f71baf6bbb9b06f9d329712</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix incorrect initialization of ProcGlobal-&gt;startupBufferPinWaitBufId. It was initialized in the wrong place and to the wrong value. With bad luck this could result in incorrect query-cancellation failures in hot standby sessions, should a HS backend be holding pin on buffer number 1 while trying to acquire a lock. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e53bd5517431637e495c7614761e5aae46b4eba">http://git.postgresql.org/pg/commitdiff/2e53bd5517431637e495c7614761e5aae46b4eba</a></li>

<li>Move CheckRecoveryConflictDeadlock() call to a safer place. This kluge was inserted in a spot apparently chosen at random: the lock manager's state is not yet fully set up for the wait, and in particular LockWaitCancel hasn't been armed by setting lockAwaited, so the ProcLock will not get cleaned up if the ereport is thrown. This seems to not cause any observable problem in trivial test cases, because LockReleaseAll will silently clean up the debris; but I was able to cause failures with tests involving subtransactions. Fixes breakage induced by commit c85c941470efc44494fd7a5f426ee85fc65c268c. Back-patch to all affected branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac36e6f71f197540b8ee83c97f338ae5e5163f30">http://git.postgresql.org/pg/commitdiff/ac36e6f71f197540b8ee83c97f338ae5e5163f30</a></li>

<li>Reduce PG_SYSLOG_LIMIT to 900 bytes. The previous limit of 1024 was set on the assumption that all modern syslog implementations have line length limits of 2KB or so. However, this is false, as at least Solaris and sysklogd truncate at only 1KB. 900 seems to leave enough room for the max likely length of the tacked-on prefixes, so let's go with that. As with the previous change, it doesn't seem wise to back-patch this into already-released branches; but it should be OK to sneak it into 9.1. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/375aa7b393843800a2bfefcbc13fa68ca82dee53">http://git.postgresql.org/pg/commitdiff/375aa7b393843800a2bfefcbc13fa68ca82dee53</a></li>

<li>Fix thinko in documentation of local_preload_libraries. Somebody added a cross-reference to shared_preload_libraries, but wrote the wrong variable name when they did it (and didn't bother to make it a link either). Spotted by Christoph Anton Mitterer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ffcf5a6c41ce91c55991b04eea1fcb94e4d0faa0">http://git.postgresql.org/pg/commitdiff/ffcf5a6c41ce91c55991b04eea1fcb94e4d0faa0</a></li>

<li>Clean up ill-advised attempt to invent a private set of Node tags. Somebody thought it'd be cute to invent a set of Node tag numbers that were defined independently of, and indeed conflicting with, the main tag-number list. While this accidentally failed to fail so far, it would certainly lead to trouble as soon as anyone wanted to, say, apply copyObject to these node types. Clang was already complaining about the use of makeNode on these tags, and I think quite rightly so. Fix by pushing these node definitions into the mainstream, including putting replnodes.h where it belongs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05e83968929f4ec1eba058fcae755fd2df98864e">http://git.postgresql.org/pg/commitdiff/05e83968929f4ec1eba058fcae755fd2df98864e</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In documentaiton, clarify which commands have reduced WAL volume for wal_level = minimum. Backpatch to 9.1 and 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38de5aad54b3eb37981cacd391fcde82f86d00fb">http://git.postgresql.org/pg/commitdiff/38de5aad54b3eb37981cacd391fcde82f86d00fb</a></li>

<li>Fix markup for recent wal_level clarification. Backpatch to 9.1 and 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4262e61d6424a38150f125b612fd900267718148">http://git.postgresql.org/pg/commitdiff/4262e61d6424a38150f125b612fd900267718148</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Restore the primacy of postgres.h in plpython.c. To avoid having the python headers hijack various definitions, we now include them after all the system headers we want, having first undefined some of the things they want to define. After that's done we restore the things they scribbled on that matter, namely our snprintf and vsnprintf macros, if we're using them. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a11cf4334138c3af8504c71a091b4f5c317776ef">http://git.postgresql.org/pg/commitdiff/a11cf4334138c3af8504c71a091b4f5c317776ef</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a whitespace issue with the man pages There is what may actually be a mistake in our markup. The problem is in a situation like &lt;para&gt; &lt;command&gt;FOO&lt;/command&gt; is ... there is strictly speaking a line break before "FOO". In the HTML output, this does not appear to be a problem, but in the man page output, this shows up, so you get double blank lines at odd places. So far, we have attempted to work around this with an XSL hack, but that causes other problems, such as creating run-ins in places like &lt;acronym&gt;SQL&lt;/acronym&gt; &lt;command&gt;COPY&lt;/command&gt; So fix the problem properly by removing the extra whitespace. I only fixed the problems that affect the man page output, not all the places. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ef24487967692604b07a4a54e71821a60fb729a">http://git.postgresql.org/pg/commitdiff/6ef24487967692604b07a4a54e71821a60fb729a</a></li>

<li>Rename "Example" sections to "Examples" in dblink chapter. For consistency with other man pages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a559ed5ed611f7937cc87d4fd420a63ab2a27356">http://git.postgresql.org/pg/commitdiff/a559ed5ed611f7937cc87d4fd420a63ab2a27356</a></li>

<li>Remove whitespace from end of lines 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f29a004496b3378f98b24c088cd846877eacf582">http://git.postgresql.org/pg/commitdiff/f29a004496b3378f98b24c088cd846877eacf582</a></li>

<li>Add "Compatibility" section to ALTER EXTENSION reference page Almost all other pages have one; this one must have been forgotten. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/04b17684af24791b18e414e304fb6d9b57a36c5e">http://git.postgresql.org/pg/commitdiff/04b17684af24791b18e414e304fb6d9b57a36c5e</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in two revisions of a patch to fix some issues with GiST's interaction with Hot Standby.</li>

<li>Dean Rasheed sent in two revisions of a patch to trim the memory AFTER triggers use.</li>

<li>Timothy D. F. Lewis and Josh Kupershmidt traded revisions of the patch to help with vacuuming large objects.</li>

<li>Kevin Grittner sent in another patch intended to fix bug #6123.</li>

<li>Alexander Korotkov sent in three revisions of a patch to speed up GiST index builds.</li>

<li>Alvaro Herrera sent in two more revisions of a patch to catalogue NOT NULL constraints.</li>

<li>Phil Sorber sent in patches to correct some infelicities in pg_dumpall's handling of ROLEs.</li>

<li>Tom Lane sent in two revisions of a patch intended to fix a data corruption issue reported by David Gould on large (32-core, 512G main memory), highly-loaded systems.</li>

<li>Robert Haas and Josh Kupershmidt traded patches to further refine the display of object comments in psql.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to create and use cross-column stastics.</li>

<li>Peter Geoghegan sent in two more patches to clean up some infelicities exposed by the Clang compiler.</li>

<li>Jeff Janes sent in a patch to fix a speed issue with larger numbers of cores first uncovered by mosbench.</li>

<li>Jun Ishiduka sent in another revision of the patch to allow doing a base backup from a Hot Standby.</li>

<li>Alex Hunsaker sent in a patch to fix some infelicities in PL/Perl(U)'s signal handling.</li>

</ul>