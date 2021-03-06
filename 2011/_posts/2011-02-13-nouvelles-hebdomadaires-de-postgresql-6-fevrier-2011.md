---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 février 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/02/13/Nouvelles-hebdomadaires-de-PostgreSQL-6-février-2011"
---


<p>Entretien de Simon Riggs dans <em>O'Reilly GMT</em>&nbsp;: 

<a target="_blank" href="http://www.oreillygmt.eu/open-sourcefree-software/all-about-postgresql-%E2%80%93-the-world%E2%80%99s-most-advanced-open-source-database/">http://www.oreillygmt.eu/open-sourcefree-software/all-about-postgresql-%E2%80%93-the-world%E2%80%99s-most-advanced-open-source-database/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PGSI 1.6.0, un outil de rapport des effets globaux produits par des requ&ecirc;tes sur une serveur PostgreSQL&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Pgsi">http://bucardo.org/wiki/Pgsi</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Selena Deckelmann parlera de la communaut&eacute; et du d&eacute;veloppement PostgreSQL le 7 f&eacute;vrier 2010 &agrave; 16h, &agrave; l'universit&eacute; d'&eacute;tat de l'Oregon &agrave; Corvallis.</li>

<li>L'appel &agrave; conf&eacute;renciers pour l'annuel "<em>Prague PostgreSQL Developers' Day</em>", 4&egrave;me &eacute;dition, est lanc&eacute;. L'&eacute;v&eacute;nement sera tenu le 10 f&eacute;vrier 2011 &agrave; l'<em>Universitas Carolinas</em>&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz">http://www.p2d2.cz</a></li>

<li>Le PUG de New-York se r&eacute;unira le 15 f&eacute;vrier 2011 &agrave; 18h15 dans les bureaux de Yodle, au 50 de la 23&egrave;me rue Ouest &agrave; New-York. Plus d'infos et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/postgresql-3/events/16123790/">http://www.meetup.com/postgresql-3/events/16123790/</a></li>

<li>Le PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011.</li>

<li>PostgreSQL Conference East 2011&nbsp;: New-York City, du 22 au 25 mars&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;. L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;! 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110206">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Support multiple concurrent pg_basebackup backups. With this patch, pg_basebackup doesn't write a backup_label file in the data directory, so it doesn't interfere with a pg_start/stop_backup() based backup anymore. backup_label is still included in the backup, but it is injected directly into the tar stream. Heikki Linnakangas, reviewed by Fujii Masao and Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=997b48ed96c476650f87ca75d65c9fc1f6273f5a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=997b48ed96c476650f87ca75d65c9fc1f6273f5a</a></li>

<li>Fix typo. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=32866837f005fcfdd1e1289f08a89a7c519da000">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=32866837f005fcfdd1e1289f08a89a7c519da000</a></li>

<li>Remove spurious word, spotted by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=44df84df72b5eb43384bc7288713c2f80db7273d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=44df84df72b5eb43384bc7288713c2f80db7273d</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move upgrade instructions into its own section under "Server Setup and Operation", merged from upgrade sections in "Installation from Source Code" and "Backup and Restore". This now gives a single place for all upgrade information. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c5ba11f8fb1701441b96a755ea410b96bfe36170">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c5ba11f8fb1701441b96a755ea410b96bfe36170</a></li>

<li>Fix SGML markup for upgrade doc addition. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ff20fbd6c21929cd5c78f154c8364ce746de9c03">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ff20fbd6c21929cd5c78f154c8364ce746de9c03</a></li>

<li>Update pg_upgrade docs to mention its use in a less risk-warning way, and update the pg_upgrade docs to mention its reliance on no changes to the storage format (the later based on Robert Haas's patch). 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=49450f01eca39308989cf668f60b7c345e72fc7b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=49450f01eca39308989cf668f60b7c345e72fc7b</a></li>

<li>Fix pg_upgrade to create pg_authid restore functions in the 'postgres' database, not in the os-user database, per report from Magnus. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6238473adb119a5a11061e40e159e8c5187fe492">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6238473adb119a5a11061e40e159e8c5187fe492</a></li>

<li>In pg_authid.rolpassword docs, make "md5" appear as a literal. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2dbed56c5a86d45a66f41e6a8a16295bbfe46646">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2dbed56c5a86d45a66f41e6a8a16295bbfe46646</a></li>

<li>Improve docs for pg_authid encryption description with better markup and a mention of unencrypted passwords. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=00dd340210ed67900e03703eb088fdd5ab12c099">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=00dd340210ed67900e03703eb088fdd5ab12c099</a></li>

<li>Add pg_upgrade comment for why we can't use template1 inheritance for the support functions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2bb87a61a84ab74b7ba820aac787443a78897bf4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2bb87a61a84ab74b7ba820aac787443a78897bf4</a></li>

<li>Add missing period "." in pg_upgrade documentation. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d2888d1ca36c266900eeea95401269c782074251">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d2888d1ca36c266900eeea95401269c782074251</a></li>

<li>Clarify pg_upgrade install instructions, per suggestion from Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=902aae5ec58f71b8d9f7efb5ed474d0f5439439d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=902aae5ec58f71b8d9f7efb5ed474d0f5439439d</a></li>

<li>Document that Slony can do upgrades easier _because_ it supports replication between different Postgres major versions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e8cdc238cfa3fda4185fe6a9826dbdf0a107f789">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e8cdc238cfa3fda4185fe6a9826dbdf0a107f789</a></li>

<li>Document that effective cache size does not assume data remains in the cache between queries. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6c6e6f7fd3ffa984a202b910ef3237e26f9d3c2e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6c6e6f7fd3ffa984a202b910ef3237e26f9d3c2e</a></li>

<li>Clarify documentation to state that "zero_damaged_pages" does not force data to disk, so the table or index should be recreated before the parameter is turned off again. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7106f74e2a6feb31c022dd98e7d93ab656dc079d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7106f74e2a6feb31c022dd98e7d93ab656dc079d</a></li>

<li>Properly capitalize hyphenated words in documentation titles. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d56d246e70184692408cd6a444e6824ae8491587">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d56d246e70184692408cd6a444e6824ae8491587</a></li>

<li>Document that CREATE VIEW that uses "*" for the column list will not auto-add columns later added to the base table. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5a6ba62be5364dbf973fd9b8631fd60acda03440">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5a6ba62be5364dbf973fd9b8631fd60acda03440</a></li>

<li>Simplify pg_upgrade checking of executable permissions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9d220fc17eafcbc99fcea7bdbbb246fee473eac7">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9d220fc17eafcbc99fcea7bdbbb246fee473eac7</a></li>

<li>Fix wrong verb in pg_upgrade text message, per Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2b6e2dee7805ec5b477af00c01c54c208bf106eb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2b6e2dee7805ec5b477af00c01c54c208bf106eb</a></li>

<li>Mark all GUC variables with &lt;varname&gt; markup, rather than &lt;literal&gt;. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03c25dd900d97c0868ad20b925a78d41ec603578">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03c25dd900d97c0868ad20b925a78d41ec603578</a></li>

<li>Clearify macro IS_PATH_VAR_SEP in path.c so it is clear this is a path variable, not a directory path. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bffb638d16999ee7d3c8796e77dd87ac82719c7d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bffb638d16999ee7d3c8796e77dd87ac82719c7d</a></li>

<li>Rename function to first_path_var_separator() to clarify it works with path variables, not directory paths. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=426227850be145b52cb610455000fc005df5ce4e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=426227850be145b52cb610455000fc005df5ce4e</a></li>

<li>Simplify code used in is_absolute_path() macro; also add comment about 'E:abc' Win32 path handling. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35b0a6b205c25d592b966aa17d3c6f9e5a88eb62">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=35b0a6b205c25d592b966aa17d3c6f9e5a88eb62</a></li>

<li>In docs, PL is Procedural Language, not Programming Language. Satoshi Nagayasu. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=df63aac678343cec522bc58588b70ab1374a6c93">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=df63aac678343cec522bc58588b70ab1374a6c93</a></li>

<li>ALTER TABLE sometimes takes only ShareUpdateExclusiveLock. Along the way, be more consistent about the wording we use here. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7212c77d0cabcc468fec0b9cd7f2413b64b77050">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7212c77d0cabcc468fec0b9cd7f2413b64b77050</a></li>

<li>In docs, move PQrequestCancel() deprecation mention up to match other libpq doc mentions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b157a1d5554d6dfbd13fb605f08d51ce17532375">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b157a1d5554d6dfbd13fb605f08d51ce17532375</a></li>

<li>Add doc comment that installation.sgml can't use xrefs. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8e6ae3d79c16ad8876c34f2cff8d667ca1cffb09">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8e6ae3d79c16ad8876c34f2cff8d667ca1cffb09</a></li>

<li>Add C comment about why older compilers complain about basebackup.c's longjump. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=51dbc87dff5c32bfe627ec7b22c575c263de8251">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=51dbc87dff5c32bfe627ec7b22c575c263de8251</a></li>

<li>Rename macro DECIMAL to DECIMAL_T to help pgindent; this is already done for a few other macros in that file, for other reasons. I also remove pgindent/README mention of the file. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=97116ca4170b974d734cea364789c389b30e6ce1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=97116ca4170b974d734cea364789c389b30e6ce1</a></li>

<li>Adjust libpq docs to be clearer about 'hostaddr' usage by rewording and using an itemized list. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ed45ac09c604555740e7365a722b641f3bce498">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5ed45ac09c604555740e7365a722b641f3bce498</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update docs on building for Windows to accomodate current reality. Document how to build 64 bit Windows binaries using the MinGW64 tool set. Remove recommendation against using Mingw as a build platform. Be more specific about when Cygwin is useful and when it's not, in particular note its usefulness for running psql, and add a note about building on Cygwin in non-C locales. Per recent discussions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=51be78b09a83b8d533e4a9f81cf9a7f2edde6654">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=51be78b09a83b8d533e4a9f81cf9a7f2edde6654</a></li>

<li>Set up PLPerl trigger data using C code instead of Perl code. This is an efficiency change, and means we now no longer have to run "out $_TD; local $_TD = shift;", which was especially pointless in the case of non-trigger functions where the passed value was always undef anyway. A tiny open issue is whether we should get rid of the $prolog argument of mkfunc, and the corresponding pushed value, which is now just a constant "false". Tim Bunce, reviewed by Alex Hunsaker. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ef19dc6d39dd2490ff61489da55d95d6941140bf">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ef19dc6d39dd2490ff61489da55d95d6941140bf</a></li>

<li>Add comment on why we're passing a useless 'false' to the plperl function compiler. It's for compatibility with modules like PostgreSQL::PLPerl::NYTProf. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c73fe72e2735d20aa132640d8fab4e0eca1ced95">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c73fe72e2735d20aa132640d8fab4e0eca1ced95</a></li>

<li>Attempt to unbreak MSVC builds after pipe.c move. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=895ad83d702ed821f72ec7bdf1fba3db7da9d9d7">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=895ad83d702ed821f72ec7bdf1fba3db7da9d9d7</a></li>

<li>Force strings passed to and from plperl to be in UTF8 encoding. String are converted to UTF8 on the way into perl and to the database encoding on the way back. This avoids a number of observed anomalies, and ensures Perl a consistent view of the world. Some minor code cleanups are also accomplished. Alex Hunsaker, reviewed by Andy Colson. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=50d89d422f9c68a52a6964e5468e8eb4f90b1d95">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=50d89d422f9c68a52a6964e5468e8eb4f90b1d95</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix error code for canceling statement due to conflict with recovery. All retryable conflict errors now have an error code that indicates that a retry is possible, correcting my incomplete fix of 2010/05/12 Tatsuo Ishii and Simon Riggs, input from Robert Haas and Florian Pflug 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8585ad36254199ca63700707ee78890da1755e4d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8585ad36254199ca63700707ee78890da1755e4d</a></li>

<li>Create new errcode for recovery conflict caused by db drop on master. Previously reported as ERRCODE_ADMIN_SHUTDOWN, this case is now reported as ERRCODE_T_R_DATABASE_DROPPED. No message text change. Unlikely to happen on most servers, so low impact change to allow session poolers to correctly handle this situation. Tatsuo Ishii, edits by me, review by Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9e95c9ad558bafa26efbab50f77929de4ade5f90">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9e95c9ad558bafa26efbab50f77929de4ade5f90</a></li>

<li>Re-classify ERRCODE_DATABASE_DROPPED to 57P04 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56b21b7ae38bc1efb701e7ebfd208e2e194e7998">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=56b21b7ae38bc1efb701e7ebfd208e2e194e7998</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Prevent buffer overrun while parsing an integer in a "query_int" value. contrib/intarray's gettoken() uses a fixed-size buffer to collect an integer's digits, and did not guard against overrunning the buffer. This is at least a backend crash risk, and in principle might allow arbitrary code execution. The code didn't check for overflow of the integer value either, which while not presenting a crash risk was still bad. Thanks to Apple Inc's security team for reporting this issue and supplying the fix. Security: CVE-2010-4015 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7ccb6dc2d3e266a551827bb99179708580f72431">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7ccb6dc2d3e266a551827bb99179708580f72431</a></li>

<li>Update release notes. Security: CVE-2010-4015 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=43054624979de3205fbc432f15defd4b9d5922e9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=43054624979de3205fbc432f15defd4b9d5922e9</a></li>

<li>Support LIKE and ILIKE index searches via contrib/pg_trgm indexes. Unlike Btree-based LIKE optimization, this works for non-left-anchored search patterns. The effectiveness of the search depends on how many trigrams can be extracted from the pattern. (The worst case, with no trigrams, degrades to a full-table scan, so this isn't a panacea. But it can be very useful.) Alexander Korotkov, reviewed by Jan Urbanski. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6e2f3ae8842392c46ccc91a9ce4bba92296890cb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6e2f3ae8842392c46ccc91a9ce4bba92296890cb</a></li>

<li>Clean up missed change to plpython expected files. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=907855ac759a221f95b502cd7cbf2ec851fe9523">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=907855ac759a221f95b502cd7cbf2ec851fe9523</a></li>

<li>Repair multiple breakage in Windows-specific code for appending '.exe'. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cd7d748d51df3c5dedcc49a3603e6fa9c050f237">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cd7d748d51df3c5dedcc49a3603e6fa9c050f237</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a link from client_encoding parameter to the list of character sets in documentation. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03282bfa8973f3a77ca3e7c14847a5a11d07d6a2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=03282bfa8973f3a77ca3e7c14847a5a11d07d6a2</a></li>

<li>Fix wrong error reports in 'number of array dimensions exceeds the maximum allowed' messages, that have reported one-less dimensions. Alexey Klyukin 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c707aa4583a5584f4c3f4ad1697bb206ed0d65a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c707aa4583a5584f4c3f4ad1697bb206ed0d65a</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Undefine setlocale() macro on Win32. New versions of libintl redefine setlocale() to a macro which causes problems when the backend and libintl are linked against different versions of the runtime, which is often the case in msvc builds. Hiroshi Inoue, slightly updated comment by me 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5273f2143416f6340f6ee876facfa6f7a87453a0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5273f2143416f6340f6ee876facfa6f7a87453a0</a></li>

<li>Fix typo. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f001cb38b67b0f2f5f4cfd1e32f86866da8c8693">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f001cb38b67b0f2f5f4cfd1e32f86866da8c8693</a></li>

<li>Include more status information in walsender results. Add the current xlog insert location to the response of IDENTIFY_SYSTEM, and adds result sets containing start and stop location of backups to BASE_BACKUP responses. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=76129e7f14b4605db0a046e13abef0e255ffe007">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=76129e7f14b4605db0a046e13abef0e255ffe007</a></li>

<li>Use single quotes when there are backslashes in the filename. In the hope of unbreaking the buildfarm 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39fbec73b0dd15df8955baad57685082ec0cef8f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=39fbec73b0dd15df8955baad57685082ec0cef8f</a></li>

<li>Attempt to un-break the documentation build again Another case of &lt;xref linkend&gt; in the documentation that builds INSTALL, which is not allowed. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afb6dee1e3b93af05e35873c19c068e8ac7eb74b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afb6dee1e3b93af05e35873c19c068e8ac7eb74b</a></li>

<li>IDENTIFY_SYSTEM now returns 3 fields, not 2 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cedd6515ba68f46dd7e75a65d4c98330ced0ba7a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cedd6515ba68f46dd7e75a65d4c98330ced0ba7a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add validator to PL/Python. Jan Urba&#324;ski, reviewed by Hitoshi Harada 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=15f55cc38a82dfa3d7898a7c30a303b1b3e87dc3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=15f55cc38a82dfa3d7898a7c30a303b1b3e87dc3</a></li>

<li>Wrap PL/Python SPI calls into subtransactions. This allows the language-specific try/catch construct to catch and handle exceptions arising from SPI calls, matching the behavior of other PLs. As an additional bonus you no longer get all the ugly "unrecognized error in PLy_spi_execute_query" errors. Jan Urba&#324;ski, reviewed by Steve Singer 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c5933d0104c1788479592a84cca53da357381f9">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c5933d0104c1788479592a84cca53da357381f9</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Log restartpoints in the same fashion as checkpoints. Prior to 9.0, restartpoints never created, deleted, or recycled WAL files, but now they can. This code makes log_checkpoints treat checkpoints and restartpoints symmetrically. It also adjusts up the documentation of the parameter to mention restartpoints. Fujii Masao. Docs by me, as suggested by Itagaki Takahiro. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0af695fd43b6889613a4035e3cdfcc0fc1b7936a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0af695fd43b6889613a4035e3cdfcc0fc1b7936a</a></li>

<li>Various sepgsql corrections. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c7689ee73346d198177dee538501bb1148c8cebb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c7689ee73346d198177dee538501bb1148c8cebb</a></li>

<li>Minor sepgsql regression test fixes. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=87d967f70f4866c17404f6a9b8062f892ed31e08">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=87d967f70f4866c17404f6a9b8062f892ed31e08</a></li>

<li>sepgsql doc fix. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4ff9dec1386b714f6c26a52ca6880b14e94dd1db">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4ff9dec1386b714f6c26a52ca6880b14e94dd1db</a></li>

<li>Further sepgsql documentation cleanup. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4c4daf671074cc64290e9255c14365b55bf7a47b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4c4daf671074cc64290e9255c14365b55bf7a47b</a></li>

<li>Avoid maintaining three separate copies of the error codes list. src/pl/plpgsql/src/plerrcodes.h, src/include/utils/errcodes.h, and a big chunk of errcodes.sgml are now automatically generated from a single file, src/backend/utils/errcodes.txt. Jan Urba&#324;ski, reviewed by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ddfe26f6441c24660595c5efe5fd0bd3974cdc5c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ddfe26f6441c24660595c5efe5fd0bd3974cdc5c</a></li>

<li>Preserve copyright notice from old errcodes.h file. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b8a0467e10a41d32ecf889d40de81223e0439c5b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b8a0467e10a41d32ecf889d40de81223e0439c5b</a></li>

<li>Unbreak the VPATH build. My commit ddfe26f6441c24660595c5efe5fd0bd3974cdc5c of 2010-02-03 broke it. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dde9684d65ed66656f765d3fd97f2e522a189132">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dde9684d65ed66656f765d3fd97f2e522a189132</a></li>

<li>Unbreak 'configure' followed immediately by 'make install'. More fallout from ddfe26f6441c24660595c5efe5fd0bd3974cdc5c. Report by Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b87811ee273360c45d92b0e7bb7e67670312c221">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b87811ee273360c45d92b0e7bb7e67670312c221</a></li>

<li>Make handling of errcodes.h more consistent with other generated headers. This fixes make distprep, and seems more robust in other ways as well. Some special handling is required because errcodes.txt is needed by some stuff in src/port, but just by src/backend as is the case for the other generated headers. While I'm at it, fix a few other things that were overlooked in the original patch. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=356f2cbbb42811596820c94aaec2e32ad1ec58d8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=356f2cbbb42811596820c94aaec2e32ad1ec58d8</a></li>

<li>Use $(MAKE) rather than make. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6f59a5e5dd73ec2c448dd7038accf5aaba6dc04b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=6f59a5e5dd73ec2c448dd7038accf5aaba6dc04b</a></li>

<li>Update ALTER TABLE docs to mention using VACUUM FULL for rewrites. Remove the claim that ALTER TABLE .. SET DATA TYPE is the fastest way of rewriting a table, since it no longer is. Noah Misch and Robert Haas, based on a suggestion from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=edad08ba545b43261b4d54d65122b45c9b5ee801">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=edad08ba545b43261b4d54d65122b45c9b5ee801</a></li>

<li>Avoid including postgres.h in frontend compiles of src/port. This isn't kosher, and doesn't play nicely with my recent changes to the Makefile in this directory. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8201aea90c2b171808c65836fcce4f29b22a9dbb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8201aea90c2b171808c65836fcce4f29b22a9dbb</a></li>

<li>Move pipe.c into the backend. It's full of backend-specific error reporting, so it's neither possible nor necessary for this to be used from frontend code. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b1e65c32168a2b64276a57be8c4dc5a63d33e12d">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b1e65c32168a2b64276a57be8c4dc5a63d33e12d</a></li>

<li>Clarify comment in ATRewriteTable(). Make sure it's clear that the prohibition on adding a column with a default when the rowtype is used elsewhere is intentional, and be a bit more explicit about the other cases where we perform this check. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9e7e1172a53054dc14574e42865ea8213bc06371">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9e7e1172a53054dc14574e42865ea8213bc06371</a></li>

<li>Tighten ALTER FOREIGN TABLE .. SET DATA TYPE checks. If the foreign table's rowtype is being used as the type of a column in another table, we can't just up and change its data type. This was already checked for composite types and ordinary tables, but we previously failed to enforce it for foreign tables. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=65377e0b9c0e0397b1598b38b6a7fb8b6f740d39">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=65377e0b9c0e0397b1598b38b6a7fb8b6f740d39</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Greg Smith sent in another revision of the patch to do spread checkpoint syncs.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to add transaction-scoped advisory locks.</li>

<li>Joachim Wieland sent in another revision of that patch to do parallel pg_dump using a new directory-based format.</li>

<li>Simon Riggs sent in a patch to add a FORCE option to DROP DATABASE.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to add MULTISETs.</li>

<li>Fujii Masao sent in a patch to change pg_stop_backup so that it only creates the backup history file if archiving is enabled.</li>

<li>Alexey Klyukin sent in another revision of the patch to transform between PostgreSQL arrays and Perl arrays in PL/Perl.</li>

<li>Hitoshi Harada sent in three more revisions of the patch to add ENCODING to COPY.</li>

<li>Euler Taveira de Oliveira sent in another revision of the patch to add named restore points.</li>

<li>Peter Eisentraut sent in another revision of the patch to add per-column collations.</li>

<li>ITAGAKI Takahiro and Dimitri Fontaine traded patches to add support for EXTENSIONs to pg_dump.</li>

<li>Kevin Grittner sent in another revision of the patch to add SSI (serializable snapshot isolation).</li>

<li>Heikki Linnakangas sent in a patch to add regression tests for SSI.</li>

<li>YAMAMOTO Takahashi sent in another revision of the patch to avoid de-TOAST'ing large objects.</li>

<li>Andrew Dunstan sent in a patch to the docs to describe how to build PostgreSQL for Win64 using certain toolkits.</li>

<li>Dimitri Fontaine sent in another revision of the ALTER EXTENSION patch.</li>

<li>Tomas Vondra and Greg Smith traded patches to keep the timestamp of the latest stats reset.</li>

<li>Magnus Hagander sent in three revisions of a patch to move the WAL warning.</li>

<li>Bruce Momjian sent in a patch to simplifiy the pg_upgrade executable checks per suggestion from Robert Haas.</li>

<li>Robert Haas sent in another revision of the patch to limit hint bit I/O.</li>

<li>Bruce Momjian sent in two more revisions of the patch to fix is_absolute_path on Windows.</li>

<li>ITAGAKI Takahiro sent in a patch to implement a jagged row CSV API, to be applied atop Andrew Dunstan's patch to expose the COPY API.</li>

<li>Thom Brown sent in a patch to fix an issue where generate_series() misbehaved by returning if the series hits either the upper or lower boundary during increment, or goes beyond it, none of which should happen.</li>

<li>Jan Urbanski sent in another flock of patches to improve PL/Python.</li>

<li>Robert Haas sent in another revision of the patch to skip table rewrites in cases where it can be proven that this will not actually change anything when someone issues an ALTER TABLE.</li>

<li>Alex Hunsaker sent in another revision of the patch to convert between PostgreSQL arrays an Perl arrays in PL/Perl.</li>

<li>Stephen Frost sent in another revision of the patch to allow logging the current role.</li>

<li>Jeff Davis sent in another revision of the patch to add range types.</li>

<li>Simon Riggs sent in a patch to fix commit performance in SAVEPOINTs, which had O(n2) behavior.</li>

<li>Bruce Momjian sent in a doc patch for Streaming Replication.</li>

</ul>