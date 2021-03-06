---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 26 janvier 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/01/27/Nouvelles-hebdomadaires-de-PostgreSQL-26-janvier-2014"
---


<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>FOSDEM PGDay, une conf&eacute;rence d'une journ&eacute;e, tenue avant le FOSDEM &agrave; Bruxelles, aura lieu le 31 janvier 2014. D&eacute;tails&nbsp;: 

<a target="_blank" href="http://fosdem2014.pgconf.eu/">http://fosdem2014.pgconf.eu/</a> <a target="_blank" href="http://fosdem2014.pgconf.eu/registration/">http://fosdem2014.pgconf.eu/registration/</a></li>

<li>La 7<sup>&egrave;me</sup> conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>" (P2D2), organis&eacute;e par le CSPUG (PUG tch&egrave;que et slovaque), aura lieu le 6 f&eacute;vrier 2014 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Infos en langue tch&egrave;que ci-apr&egrave;s&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le PGDay Nordique 2014 aura lieu &agrave; Stockholm (Su&egrave;de) &agrave; l'h&ocirc;tel Hilton le 20 mars 2014. L'appel &agrave; conf&eacute;renciers est ouvert jusqu'au 2 f&eacute;vrier 2014&nbsp;: 

<a target="_blank" href="http://2014.nordicpgday.org/">http://2014.nordicpgday.org/</a></li>

<li>La <em>PGConf NYC 2014</em> aura lieu les 3 &amp; 4 avril 2014 &agrave; New-York (New-York, USA)&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2014/">http://nyc.pgconf.us/2014/</a></li>

<li>Le sommet Open Data aura lieu le 11 avril 2014 &agrave; Denver (Colorado, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.opendatasummit.com">http://www.opendatasummit.com</a></li>

<li>La PGCon 2014, la conf&eacute;rence mondiale des d&eacute;veloppeurs PostgreSQL, se tiendra &agrave; Ottawa (Ontario, Canada) du 20 au 24 mai 2014&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2014/">http://www.pgcon.org/2014/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140127074051.GA11668@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Speed up COPY into tables with DEFAULT nextval(). Previously the presence of a nextval() prevented the use of batch-mode COPY. This patch introduces a special case just for nextval() functions. In future we will introduce a general case solution for labelling volatile functions as safe for use. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4d1e2aeb1a162770683a8d1e13fc13ac2d95d810">http://git.postgresql.org/pg/commitdiff/4d1e2aeb1a162770683a8d1e13fc13ac2d95d810</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in comment. Sawada Masahiko 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5363c7f2bc5e77caf2f308bed93e3e881a9113cf">http://git.postgresql.org/pg/commitdiff/5363c7f2bc5e77caf2f308bed93e3e881a9113cf</a></li>

<li>Fix bugs in PQhost(). In the platform that doesn't support Unix-domain socket, when neither host nor hostaddr are specified, the default host 'localhost' is used to connect to the server and PQhost() must return that, but it didn't. This patch fixes PQhost() so that it returns the default host in that case. Also this patch fixes PQhost() so that it doesn't return Unix-domain socket directory path in the platform that doesn't support Unix-domain socket. Back-patch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77035fa8a92d8c39f4c689e54f46813f203f09a8">http://git.postgresql.org/pg/commitdiff/77035fa8a92d8c39f4c689e54f46813f203f09a8</a></li>

<li>Add libpq function PQhostaddr(). There was a bug in the psql's meta command \conninfo. When the IP address was specified in the hostaddr and psql used it to create a connection (i.e., psql -d "hostaddr=xxx"), \conninfo could not display that address. This is because \conninfo got the connection information only from PQhost() which could not return hostaddr. This patch adds PQhostaddr(), and changes \conninfo so that it can display not only the host name that PQhost() returns but also the IP address which PQhostaddr() returns. The bug has existed since 9.1 where \conninfo was introduced. But it's too late to add new libpq function into the released versions, so no backpatch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f80f4835a55a1cbffcda5d23a617917f3286c14">http://git.postgresql.org/pg/commitdiff/9f80f4835a55a1cbffcda5d23a617917f3286c14</a></li>

<li>Remove duplicate index entry DATE_TRUNC in document. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ee74df2e48cde3c471637d14b18475abb0eb69a">http://git.postgresql.org/pg/commitdiff/3ee74df2e48cde3c471637d14b18475abb0eb69a</a></li>

<li>Fix typos in comments for ALTER SYSTEM. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c619be623237f3fee3222bc171a6a0afb0ce7a5">http://git.postgresql.org/pg/commitdiff/7c619be623237f3fee3222bc171a6a0afb0ce7a5</a></li>

<li>Change the suffix of auto conf temporary file from "temp" to "tmp". Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd515d4082876f9fcc0b6eed421dd3b6d43579be">http://git.postgresql.org/pg/commitdiff/dd515d4082876f9fcc0b6eed421dd3b6d43579be</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix to_timestamp/to_date's handling of consecutive spaces in format string. When there are consecutive spaces (or other non-format-code characters) in the format, we should advance over exactly that many characters of input. The previous coding mistakenly did a "skip whitespace" action between such characters, possibly allowing more input to be skipped than the user intended. We only need to skip whitespace just before an actual field. This is really a bug fix, but given the minimal number of field complaints and the risk of breaking applications coded to expect the old behavior, let's not back-patch it. Jeevan Chalke 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a8f5729b4625ec0468ad5a48296c3e729cf3e65">http://git.postgresql.org/pg/commitdiff/9a8f5729b4625ec0468ad5a48296c3e729cf3e65</a></li>

<li>Remove pg_stat_statements--1.1.sql. Commit 91484409bdd17f330d10671d388b72d4ef1451d7 should have removed this file, not just reduced it to zero size. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe0c690dfdcf628671d62d04caa39449fdc56078">http://git.postgresql.org/pg/commitdiff/fe0c690dfdcf628671d62d04caa39449fdc56078</a></li>

<li>Tweak parse location assignment for CURRENT_DATE and related constructs. All these constructs generate parse trees consisting of a Const and a run-time type coercion (perhaps a FuncExpr or a CoerceViaIO). Modify the raw parse output so that we end up with the original token's location attached to the type coercion node while the Const has location -1; before, it was the other way around. This makes no difference in terms of what exprLocation() will say about the parse tree as a whole, so it should not have any user-visible impact. The point of changing it is that we do not want contrib/pg_stat_statements to treat these constructs as replaceable constants. It will do the right thing if the Const has location -1 rather than a valid location. This is a pretty ugly hack, but then this code is ugly already; we should someday replace this translation with special-purpose parse node(s) that would allow ruleutils.c to reconstruct the original query text. (See also commit 5d3fcc4c2e137417ef470d604fee5e452b22f6a7, which also hacked location assignment rules for the benefit of pg_stat_statements.) Back-patch to 9.2 where pg_stat_statements grew the ability to recognize replaceable constants. Kyotaro Horiguchi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69c7a9838c82bbfdd61301c697e3774e9543805e">http://git.postgresql.org/pg/commitdiff/69c7a9838c82bbfdd61301c697e3774e9543805e</a></li>

<li>Allow use of "z" flag in our printf calls, and use it where appropriate. Since C99, it's been standard for printf and friends to accept a "z" size modifier, meaning "whatever size size_t has". Up to now we've generally dealt with printing size_t values by explicitly casting them to unsigned long and using the "l" modifier; but this is really the wrong thing on platforms where pointers are wider than longs (such as Win64). So let's start using "z" instead. To ensure we can do that on all platforms, teach src/port/snprintf.c to understand "z", and add a configure test to force use of that implementation when the platform's version doesn't handle "z". Having done that, modify a bunch of places that were using the unsigned-long hack to use "z" instead. This patch doesn't pretend to have gotten everyplace that could benefit, but it catches many of them. I made an effort in particular to ensure that all uses of the same error message text were updated together, so as not to increase the number of translatable strings. It's possible that this change will result in format-string warnings from pre-C99 compilers. We might have to reconsider if there are any popular compilers that will warn about this; but let's start by seeing what the buildfarm thinks. Andres Freund, with a little additional work by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac4ef637ad2ff2a24847f67d14027b8745f6741e">http://git.postgresql.org/pg/commitdiff/ac4ef637ad2ff2a24847f67d14027b8745f6741e</a></li>

<li>Code review for auto-tuned effective_cache_size. Fix integer overflow issue noted by Magnus Hagander, as well as a bunch of other infelicities in commit ee1e5662d8d8330726eaef7d3110cb7add24d058 and its unreasonably large number of followups. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2850896961994aa0993b9e2ed79a209750181b8a">http://git.postgresql.org/pg/commitdiff/2850896961994aa0993b9e2ed79a209750181b8a</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Expose a routine to print triggers during EXPLAIN ANALYZE. This is so that auto_explain can use it. Kyotaro HORIGUCHI 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d2458e3b20f744ef88a8d3afaab91caa17508370">http://git.postgresql.org/pg/commitdiff/d2458e3b20f744ef88a8d3afaab91caa17508370</a></li>

<li>Make DROP IF EXISTS more consistently not fail. Some cases were still reporting errors and aborting, instead of a NOTICE that the object was being skipped. This makes it more difficult to cleanly handle pg_dump --clean, so change that to instead skip missing objects properly. Per bug #7873 reported by Dave Rolsky; apparently this affects a large number of users. Authors: Pavel Stehule and Dean Rasheed. Some tweaks by &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b152c6cd0de1827ba58756e24e18110cf902182a">http://git.postgresql.org/pg/commitdiff/b152c6cd0de1827ba58756e24e18110cf902182a</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid a possible relcache leak in get_object_address_attribute. There's no apparent way to trigger this, so I'm not going to worry about back-patching it for now. But it's still wrong. Marti Raudsepp 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5709b8acc67d80584e9623a1d355374b580c95e8">http://git.postgresql.org/pg/commitdiff/5709b8acc67d80584e9623a1d355374b580c95e8</a></li>

<li>Plug more memory leaks when reloading config file. Commit 138184adc5f7c60c184972e4d23f8cdb32aed77d plugged some but not all of the leaks from commit 2a0c81a12c7e6c5ac1557b0f1f4a581f23fd4ca7. This tightens things up some more. Amit Kapila, per an observation by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5bca4ef034f71175d46462963af2329d22068c2">http://git.postgresql.org/pg/commitdiff/a5bca4ef034f71175d46462963af2329d22068c2</a></li>

<li>Fix inadvertent semantics change in last patch to plug memory leaks. Commit a5bca4ef034f71175d46462963af2329d22068c2 accidentally changed the semantics when the "skipping missing configuration file" is emitted, because it forced OK to true instead of leaving the value untouched. Spotted by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/033b2343fae9d8c9df124cde62087dcb481c9c5e">http://git.postgresql.org/pg/commitdiff/033b2343fae9d8c9df124cde62087dcb481c9c5e</a></li>

<li>Add a cardinality function for arrays. Unlike our other array functions, this considers the total number of elements across all dimensions, and returns 0 rather than NULL when the array has no elements. But it seems that both of those behaviors are almost universally disliked, so hopefully that's OK. Marko Tiikkaja, reviewed by Dean Rasheed and Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01f7808b3eafcae1f6077f2f61e13b4c132ccd47">http://git.postgresql.org/pg/commitdiff/01f7808b3eafcae1f6077f2f61e13b4c132ccd47</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow type_func_name_keywords in even more places. A while back, 2c92edad48796119c83d7dbe6c33425d1924626d allowed type_func_name_keywords to be used in more places, including role identifiers. Unfortunately, that commit missed out on cases where name_list was used for lists-of-roles, eg: for DROP ROLE. This resulted in the unfortunate situation that you could CREATE a role with a type_func_name_keywords-allowed identifier, but not DROP it (directly- ALTER could be used to rename it to something which could be DROP'd). This extends allowing type_func_name_keywords to places where role lists can be used. Back-patch to 9.0, as 2c92edad48796119c83d7dbe6c33425d1924626d was. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c36f383df728866d7085c155cbe45ebc07b195f">http://git.postgresql.org/pg/commitdiff/6c36f383df728866d7085c155cbe45ebc07b195f</a></li>

<li>ALTER TABLESPACE ... MOVE ... OWNED BY. Add the ability to specify the objects to move by who those objects are owned by (as relowner) and change ALL to mean ALL objects. This makes the command always operate against a well-defined set of objects and not have the objects-to-be-moved based on the role of the user running the command. Per discussion with Simon and Tom. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fbe19ee3b87590f1006d072be5fecf8a33d4e9f5">http://git.postgresql.org/pg/commitdiff/fbe19ee3b87590f1006d072be5fecf8a33d4e9f5</a></li>

<li>Avoid minor leak in parallel pg_dump. During parallel pg_dump, a worker process closing the connection caused a minor memory leak (particularly minor as we are likely about to exit anyway). Instead, free the memory in this case prior to returning NULL to indicate connection closed. Spotting by the Coverity scanner. Back patch to 9.3 where this was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6794a9f9a194e24862e60a918eac031b7641686c">http://git.postgresql.org/pg/commitdiff/6794a9f9a194e24862e60a918eac031b7641686c</a></li>

<li>Use E, not e, for escaping in example docs. From the Department of Nitpicking, be consistent with other escaping and use 'E' instead of 'e' to escape the string in the example docs for GET DISAGNOSTICS stack = PG_CONTEXT. Noticed by Department Chief Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/00ba97365d356823c48c02147b4cd66f8f06b1d6">http://git.postgresql.org/pg/commitdiff/00ba97365d356823c48c02147b4cd66f8f06b1d6</a></li>

<li>Check dup2() results in syslogger. Consistently check the dup2() call results throughout syslogger.c. It's pretty unlikely that they'll error out, but if they do, ereport(FATAL) instead of blissfully continuing on. Spotted by the Coverity scanner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/790eaa699e4a9626d8a610ec5844e1fd70d73b4e">http://git.postgresql.org/pg/commitdiff/790eaa699e4a9626d8a610ec5844e1fd70d73b4e</a></li>

<li>Fix minor leak in pg_dump. Move allocation to after we check the remote server version, to avoid a possible, very minor, memory leak. This makes us more consistent throughout as most places in pg_dump are done in the same way (due, in part, to previous fixes like this). Spotted by the Coverity scanner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/152d24f5ddbc535bb437b57856fa3c7c5c630472">http://git.postgresql.org/pg/commitdiff/152d24f5ddbc535bb437b57856fa3c7c5c630472</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reindent json.c and jsonfuncs.c. This will help in preparation of clean patches for upcoming json work. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/243ee266339bd4a049ff92e101010242169b7287">http://git.postgresql.org/pg/commitdiff/243ee266339bd4a049ff92e101010242169b7287</a></li>

<li>Allow case insensitive build version argument for MSVC. Dilip Kumar. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5bc6ce6ac20e6de8b61946977db14e13acec2a0">http://git.postgresql.org/pg/commitdiff/d5bc6ce6ac20e6de8b61946977db14e13acec2a0</a></li>

<li>Enable building with Visual Studion 2013. Backpatch to 9.3. Brar Piening. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cec8394b5ccd32259e446f963690dd4784646b4d">http://git.postgresql.org/pg/commitdiff/cec8394b5ccd32259e446f963690dd4784646b4d</a></li>

<li>Provide for client-only installs with MSVC. MauMau. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7e5f7bf6890fdf14a6c6ecd0854ac3f5f308ccd">http://git.postgresql.org/pg/commitdiff/a7e5f7bf6890fdf14a6c6ecd0854ac3f5f308ccd</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix declaration of GinVacuumState. gcc 4.8 was happy with having a duplicate typedef, but most compilers seem not to be, per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6668ad1d7004e9420107dda5bab1690193b13bc6">http://git.postgresql.org/pg/commitdiff/6668ad1d7004e9420107dda5bab1690193b13bc6</a></li>

<li>Compress GIN posting lists, for smaller index size. GIN posting lists are now encoded using varbyte-encoding, which allows them to fit in much smaller space than the straight ItemPointer array format used before. The new encoding is used for both the lists stored in-line in entry tree items, and in posting tree leaf pages. To maintain backwards-compatibility and keep pg_upgrade working, the code can still read old-style pages and tuples. Posting tree leaf pages in the new format are flagged with GIN_COMPRESSED flag, to distinguish old and new format pages. Likewise, entry tree tuples in the new format have a GIN_ITUP_COMPRESSED flag set in a bit that was previously unused. This patch bumps GIN_CURRENT_VERSION from 1 to 2. New indexes created with version 9.4 will therefore have version number 2 in the metapage, while old pg_upgraded indexes will have version 1. The code treats them the same, but it might be come handy in the future, if we want to drop support for the uncompressed format. Alexander Korotkov and me. Reviewed by Tomas Vondra and Amit Langote. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/36a35c550ac114caa423bcbe339d3515db0cd957">http://git.postgresql.org/pg/commitdiff/36a35c550ac114caa423bcbe339d3515db0cd957</a></li>

<li>Silence compiler warning. Not all compilers understand that elog(ERROR, ...) never returns. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0fdb2f7d7c0059a1621710206ed506124cf98f77">http://git.postgresql.org/pg/commitdiff/0fdb2f7d7c0059a1621710206ed506124cf98f77</a></li>

<li>Fix alignment of GIN in-line posting lists stored in entry tuples. The Sparc machines in the buildfarm are crashing because of misaligned access to posting lists stored in entry tuples. I accidentally removed a critical SHORTALIGN() from ginFormTuple, as part of the packed posting lists patch. Perhaps I thought it was unnecessary, because the index_form_tuple() call above the SHORTALIGN already aligned the size, missing the fact that the null-category byte makes it misaligned again (I think the SHORTALIGN is indeed unnecessary if there's no null- category byte, but let's just play it safe...) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec8f692c3cd5760435712b7ec4afa8f014ed7b2e">http://git.postgresql.org/pg/commitdiff/ec8f692c3cd5760435712b7ec4afa8f014ed7b2e</a></li>

<li>In GIN recompression code, use mmemove rather than memcpy, for vacuum. When vacuuming a data leaf page, any compressed posting lists that are not modified, are copied back to the buffer from a later location in the same buffer rather than from a palloc'd copy. IOW, they are just moved downwards in the same buffer. Because the source and destination addresses can overlap, we must use memmove rather than memcpy. Report and fix by Alexander Korotkov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/398cf255ad50db86ca665b75582317d4e795242a">http://git.postgresql.org/pg/commitdiff/398cf255ad50db86ca665b75582317d4e795242a</a></li>

<li>Fix off-by-one in newly-introdcued GIN assertion. Spotted by Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8f374849fe2e2fcd62bbba8be85ccf030c31683">http://git.postgresql.org/pg/commitdiff/a8f374849fe2e2fcd62bbba8be85ccf030c31683</a></li>

<li>Reset unused fields in GIN data leaf page footer. The maxoff field is not used in the new, compressed page format. Let's reset it when converting an old-format page to the new format. The code won't care either way, but this makes it possible to use the field for something else in the future. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d150ff57812ae01a2f78a55f33a46f9b7febf933">http://git.postgresql.org/pg/commitdiff/d150ff57812ae01a2f78a55f33a46f9b7febf933</a></li>

<li>Add recovery_target='immediate' option. This allows ending recovery as a consistent state has been reached. Without this, there was no easy way to e.g restore an online backup, without replaying any extra WAL after the backup ended. MauMau and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71c6a8e375b138af8aa46d80226ea9e98f2b94bc">http://git.postgresql.org/pg/commitdiff/71c6a8e375b138af8aa46d80226ea9e98f2b94bc</a></li>

<li>Copy-editing docs for recovery_target='immediate', and "ie." Phrase the sentence better. Also, spell "i.e." rather than "ie." Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a16c2edcc7d54ae36dc8acec23201b1d2dfc34b0">http://git.postgresql.org/pg/commitdiff/a16c2edcc7d54ae36dc8acec23201b1d2dfc34b0</a></li>

<li>Fix typo in README. Amit Langote 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f62eba204f367acbfea7e63991524bf981b307f8">http://git.postgresql.org/pg/commitdiff/f62eba204f367acbfea7e63991524bf981b307f8</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add date_trunc('', interval) documentation mention. Report from Eric Howe 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90afc7d805657f6913935913a5bbd2462da80388">http://git.postgresql.org/pg/commitdiff/90afc7d805657f6913935913a5bbd2462da80388</a></li>

<li>docs: mention CREATE TABLE LIKE linkage using INCLUDING DEFAULTS. Mention that CREATE TABLE LIKE INCLUDING DEFAULTS creates a link between the original and new tables if a default function modifies the database, like nextval(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2989fcab6150da5b4296eb1481284ad2825892e">http://git.postgresql.org/pg/commitdiff/e2989fcab6150da5b4296eb1481284ad2825892e</a></li>

<li>Adjust C comment in slot_attisnull() regarding nulls. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89774b58b0ea2874765cae10c094bb6aaf707feb">http://git.postgresql.org/pg/commitdiff/89774b58b0ea2874765cae10c094bb6aaf707feb</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>libpq: Support TLS versions beyond TLSv1. Per report from Jeffrey Walton, libpq has been accepting only TLSv1 exactly. Along the lines of the backend code, libpq will now support new versions as OpenSSL adds them. Marko Kreen, reviewed by Wim Lewis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/820f08cabdcbb8998050c3d4873e9619d6d8cba4">http://git.postgresql.org/pg/commitdiff/820f08cabdcbb8998050c3d4873e9619d6d8cba4</a></li>

<li>psql: Mention SSL protocol version in \conninfo. Marko Kreen, reviewed by Wim Lewis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a5313265d53322519b5edce018ebdea14062bf9">http://git.postgresql.org/pg/commitdiff/3a5313265d53322519b5edce018ebdea14062bf9</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Include tablespace options in verbose output of \db 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cae10ca27e5d478353b9b053073e5f2a1cf97659">http://git.postgresql.org/pg/commitdiff/cae10ca27e5d478353b9b053073e5f2a1cf97659</a></li>

<li>Move the options column of \db+ before the description The convention is to have the description field at the end. Noted by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2795f8b5393005ab2d2438fadce116b032bea6e">http://git.postgresql.org/pg/commitdiff/f2795f8b5393005ab2d2438fadce116b032bea6e</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Rushabh Lathia sent in two revisions of a patch to improve the operation of NOT NULL constraints on foreign tables.</li>

<li>MauMau sent in another revision of a patch to prevent localizing messages in startup.</li>

<li>Oskari Saarenmaa sent in another revision of a patch to throttle pg_basebackup's progress report down to a maximum of once per second.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement cache_scan as a contrib module atop the custom scan patch.</li>

<li>Laurence Rowe sent in two revisions of a patch to implement json_array_elements_text.</li>

<li>Jov sent in a patch to ensure that ALTER USER is actually identical to ALTER ROLE.</li>

<li>Alvaro Herrera sent in a patch to implement a multixact_freeze_table_age GUC and set its default.</li>

<li>Antonin Houska sent in another revision of a patch to allow throttling backups.</li>

<li>Jov sent in another revision of a patch to clarify the -F option in psql.</li>

<li>Alexander Korotkov and Marti Raudsepp traded patches to implement partial sorting.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Steve Crawford sent in a patch to document the broad range of inputs to_date() and to_timestamp() accept.</li>

<li>Fujii Masao sent in another revision of a patch to fix a bug where disk space in pg_xlog increases during archive recovery.</li>

<li>Mitsumasa KONDO sent in two more revisions of a patch to add min and max execute statement time to the pg_stat_statement view.</li>

<li>David Rowley and Florian Pflug traded patches to implement negative transition functions for aggregates.</li>

<li>Jon Nelson sent in a PoC patch to elide tuples during an external sort.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to add trigger information to auto_explain.</li>

<li>Christian Kruse sent in four more revisions of a patch to show process IDs of processes holding a lock.</li>

<li>Andrew Dunstan sent in two more revisions of a patch to implement more json functions.</li>

<li>Andres Freund sent in two more flocks of patches in service of logical changeset extraction.</li>

<li>Michael Paquier and Fujii Masao traded patches to implement the pg_stat_archiver view.</li>

<li>Dean Rasheed sent in another revision of a patch to implement updatable security barrier views.</li>

<li>Ronan Dunklau sent in another revision of a patch to implement triggers on foreign tables.</li>

<li>Emre Hasegeli sent in another revision of a patch to add GiST support for inet datatypes.</li>

<li>Andres Freund sent in a patch to add %z support to elog() and ereport().</li>

<li>MauMau sent in two more revisions of a patch to fix a bug on Windows where pg_ctl always uses the same event source.</li>

<li>Craig Ringer sent in another flock of patches in service of implementing row-level access control.</li>

<li>Bruce Momjian and Tom Lane traded patches to fix some issues with authentication error messages.</li>

<li>Heikki Linnakangas sent in four more revisions of a patch to add a "fast scan" method to GIN indexes.</li>

<li>Simon Riggs sent in another revision of a patch to fix a locking issue in ALTER TABLE.</li>

<li>Pavel Raiskup sent in another revision of a patch to make locale comparisons more tolerant of fuzz in pg_upgrade.</li>

<li>Bruce Momjian sent in a patch to fix some behaviors after VACUUM FULL.</li>

<li>MauMau sent in a patch to allow recovery up to a backup point.</li>

<li>MauMau sent in another revision of a patch to fix an issue caused by Address Space Layout Randomization in Windows 8/2012.</li>

<li>Bruce Momjian sent in a patch to change a test for attnum to an Assert.</li>

<li>Marco Atzeri sent in another revision of a patch to make building on Cygwin work better.</li>

<li>Pavel Stehule sent in three more revisions of a patch to add an --if-exists option to pg_dump.</li>

<li>Bruce Momjian sent in a patch to fix an issue with how INTERVAL handles overflow conditions.</li>

<li>Tom Lane sent in a patch to store pg_stat_statements externally.</li>

<li>Andrew Dunstan sent in another revision of a patch to implement nested hstore and jsonb atop that.</li>

<li>Andrew Dunstan sent in a patch to allow running "make check" with only specified tests.</li>

</ul>