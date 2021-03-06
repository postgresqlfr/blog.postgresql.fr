---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 novembre 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/12/03/Nouvelles-hebdomadaires-de-PostgreSQL-28-novembre-2010"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>DiffKit 0.8.2, un outil de comparaison de tables avec support de PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.diffkit.org">http://www.diffkit.org</a></li>

<li>PostgreDAC 2.6.0, un <em>builder</em> Delphi/C++ pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/download/">http://microolap.com/products/connectivity/postgresdac/download/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en novembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-11/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; projets de PostgreSQLFr a &eacute;t&eacute; lanc&eacute;. Les projets doivent concerner PostgreSQL et la communaut&eacute; francophone. Mail &agrave; appel-projets-2010 (AT) postgresql (DOT) fr. 

<a target="_blank" href="http://www.postgresql.fr/appel_a_projets_2010:call_for_projects">http://www.postgresql.fr/appel_a_projets_2010:call_for_projects</a></li>

<li>Les inscriptions pour le PGDay.EU 2010 tenu du 6 au 8 d&eacute;cembre &agrave; Stuttgart sont ouvertes <b>jusqu'au 4 d&eacute;cembre</b>&nbsp;: 

<a target="_blank" href="http://2010.pgday.eu/register">http://2010.pgday.eu/register</a></li>

<li>Les inscriptions au PGDay.IT, qui aura lieu le 10 d&eacute;cembre 2010 &agrave; Rome, sont ouvertes et le programme a &eacute;t&eacute; publi&eacute;&nbsp;: 

<a target="_blank" href="http://2010.pgday.it/">http://2010.pgday.it/</a></li>

<li>Le FOSDEM est l'un des plus grand &eacute;v&eacute;nements autour du Libre et de l'Open Source&nbsp;; il a lieu annuellement &agrave; Bruxelles et rassemble environ 4000 personnes. La prochaine &eacute;dition est programm&eacute;e pour les 5 &amp; 6 f&eacute;vrier 2011. Envoyez vos propositions &agrave; l'adresse fosdem AT postgresql POINT eu. 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html">http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html</a></li>

<li>Le PGDay est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011. Proposez vos conf&eacute;rences sur pgday-submissions (AT) googlegroups (DOT) com.</li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20101128">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<ul>

<li>Magnus Hagander reviewed the patch to add getrusage tracking to EXPLAIN ANALYZE and found some breakage on Windows.</li>

<li>Steve Singer reviewed another revision of Gurjeet Singh's patch to allow ALTER TABLE to create a primary key from an existing index.</li>

<li>ITAGAKI Takahiro reviewed the pg_execute_from_file patch and found an OID collision, a compiler warning and some English, access control and internationalization issues.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove GucContext parameter from ParseConfigFile. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5272d7987506554f6b2bde740e1b4d7e4a0b8608">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5272d7987506554f6b2bde740e1b4d7e4a0b8608</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Centralize some ALTER &lt;whatever&gt; .. SET SCHEMA checks. Any flavor of ALTER &lt;whatever&gt; .. SET SCHEMA fails if (1) the object is already in the new schema, (2) either the old or new schema is a temp schema, or (3) either the old or new schema is the TOAST schema. Extraced from a patch by Dimitri Fontaine, with additional hacking by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=44475e782f4674d257b9e5c1a3930218a4b4deea">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=44475e782f4674d257b9e5c1a3930218a4b4deea</a></li>

<li>Remove belt-and-suspenders guards against buffer pin leaks. Forcibly releasing all leftover buffer pins should be unnecessary now that we have a robust ResourceOwner mechanism, and it significantly increases the cost of process shutdown. Instead, in an assert-enabled build, assert that no pins are held; in a non-assert-enabled build, do nothing. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c2281ac87cf4828b6b828dc8585a10aeb3a176e0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c2281ac87cf4828b6b828dc8585a10aeb3a176e0</a></li>

<li>Add inet_net_ntop.c to .gitignore. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2d1e426650fc93e5dfdd0178023485d38b03b102">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=2d1e426650fc93e5dfdd0178023485d38b03b102</a></li>

<li>Object access hook framework, with post-creation hook. After a SQL object is created, we provide an opportunity for security or logging plugins to get control; for example, a security label provider could use this to assign an initial security label to newly created objects. The basic infrastructure is (hopefully) reusable for other types of events that might require similar treatment. KaiGai Kohei, with minor adjustments. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cc1ed40d57aa68322e43a7b0a3320a6c5aff010a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=cc1ed40d57aa68322e43a7b0a3320a6c5aff010a</a></li>

<li>Add more ALTER &lt;object&gt; .. SET SCHEMA commands. This adds support for changing the schema of a conversion, operator, operator class, operator family, text search configuration, text search dictionary, text search parser, or text search template. Dimitri Fontaine, with assorted corrections and other kibitzing. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=55109313f96fb5c7d671fe8954b6f7fc0cca9631">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=55109313f96fb5c7d671fe8954b6f7fc0cca9631</a></li>

<li>New contrib module, auth_delay. KaiGai Kohei, with a few changes by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe7a32fc87e68edf014ee7e575f92cb027437ff4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fe7a32fc87e68edf014ee7e575f92cb027437ff4</a></li>

<li>Fix typo. Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fab7fdb988f25438ded6c4a5c4b4f112f9decddb">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fab7fdb988f25438ded6c4a5c4b4f112f9decddb</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Propagate ALTER TYPE operations to typed tables. This adds RESTRICT/CASCADE flags to ALTER TYPE ... ADD/DROP/ALTER/ RENAME ATTRIBUTE to control whether to alter typed tables as well. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2a4278330ae12cd56b61c92a7debb9c9fca7b41">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2a4278330ae12cd56b61c92a7debb9c9fca7b41</a></li>

<li>Remove useless whitespace at end of lines. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fc946c39aeacdff7df60c83fca6582985e8546c8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fc946c39aeacdff7df60c83fca6582985e8546c8</a></li>

<li>Add index entries for more functions. Also, move index entries into the tables, closer to the function description, for easier editing in the future. Resort some tables to be more alphabetical. Remove the entries for count, max, min, and sum in the tutorial area, because that was felt to be confusing. Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fc09ad00c3cc95003a5523d85999da1dd4f9d75">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4fc09ad00c3cc95003a5523d85999da1dd4f9d75</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Create the system catalog infrastructure needed for KNNGIST. This commit adds columns amoppurpose and amopsortfamily to pg_amop, and column amcanorderbyop to pg_am. For the moment all the entries in amcanorderbyop are "false", since the underlying support isn't there yet. Also, extend the CREATE OPERATOR CLASS/ALTER OPERATOR FAMILY commands with [ FOR SEARCH | FOR ORDER BY sort_operator_family ] clauses to allow the new columns of pg_amop to be populated, and create pg_dump support for dumping that information. I also added some documentation, although it's perhaps a bit premature given that the feature doesn't do anything useful yet. Teodor Sigaev, Robert Haas, Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=725d52d0c27cffe8c99bb78e2b0d2480d5cd702b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=725d52d0c27cffe8c99bb78e2b0d2480d5cd702b</a></li>

<li>Fix significant memory leak in contrib/xml2 functions. Most of the functions that execute XPath queries leaked the data structures created by libxml2. This memory would not be recovered until end of session, so it mounts up pretty quickly in any serious use of the feature. Per report from Pavel Stehule, though this isn't his patch. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4a2516a7f976e2f6671930904d4e97a4832eff9f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4a2516a7f976e2f6671930904d4e97a4832eff9f</a></li>

<li>Remove bogus use of PGDLLIMPORT. That macro should be attached to extern declarations, not actual definitions of variables. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1d9a0abec1224193fea3acf766b587fc3963a3b8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1d9a0abec1224193fea3acf766b587fc3963a3b8</a></li>

<li>Fix portability issues in new src/port/inet_net_ntop.c file. 1. Don't #include postgres.h in a frontend build. 2. Don't assume that the backend's symbol PGSQL_AF_INET6 has anything to do with the constant that will be used by system library functions (because, in point of fact, it usually doesn't). Fortunately, PGSQL_AF_INET is equal to AF_INET, so we can just cater for both sets of values in one case construct without fear of conflict. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3840bc0847aa1b635127ff4a55b5257c9ebc79b8">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=3840bc0847aa1b635127ff4a55b5257c9ebc79b8</a></li>

<li>Clean up IPv4 vs IPv6 bogosity in connectFailureMessage(). Newly added code was supposing that "struct sockaddr_in" applies to IPv6. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=be3b666eb810089fd9a1d42e3888be52ab9ddb63">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=be3b666eb810089fd9a1d42e3888be52ab9ddb63</a></li>

<li>Rewrite PQping to be more like what we agreed to last week. Basically, we want to distinguish all cases where the connection was not made from those where it was. A convenient proxy for this is to see if we got a message with a SQLSTATE code back from the postmaster. This presumes that the postmaster will always send us a SQLSTATE in a failure message, which is true for 7.4 and later postmasters in every case except fork failure. (We could possibly complicate the postmaster code to do something about that, but it seems not worth the trouble, especially since pg_ctl's response for that case should be to keep waiting anyway.) If we did get a SQLSTATE from the postmaster, there are basically only two cases, as per last week's discussion: ERRCODE_CANNOT_CONNECT_NOW and everything else. Any other error code implies that the postmaster is in principle willing to accept connections, it just didn't like or couldn't handle this particular request. We want to make a special case for ERRCODE_CANNOT_CONNECT_NOW so that "pg_ctl start -w" knows it should keep waiting. In passing, pick names for the enum constants that are a tad less likely to present collision hazards in future. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=db96e1ccfcb8f3514eef931bea9435974ec7ad28">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=db96e1ccfcb8f3514eef931bea9435974ec7ad28</a></li>

<li>On further testing, PQping also needs an explicit check for AUTH_REQ. The pg_fe_sendauth code might fail if it can't handle the authentication request message type --- if so, ping should still say the server is up. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=49cd8a3f810467632260f16c7779f19212c1d094">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=49cd8a3f810467632260f16c7779f19212c1d094</a></li>

<li>A bit more wordsmithing on the PQping documentation. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d53c1255d9730b07d56166ace1191250ca76f496">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d53c1255d9730b07d56166ace1191250ca76f496</a></li>

<li>Point out in default_tablespace's description that CREATE DATABASE ignores it. Per gripe from Andreas Scherbaum. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c623365ff9a5ef937e05b85c2feb5a5c5cde9b3b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c623365ff9a5ef937e05b85c2feb5a5c5cde9b3b</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>When reporting the server as not responding, if the hostname was supplied, also print the IP address. This allows IPv4 and IPv6 failures to be distinguished. Also useful when a hostname resolves to multiple IP addresses. Also, remove use of inet_ntoa() and use our own inet_net_ntop() in all places, including in libpq, because it is thread-safe. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ba11258ccbf364d85de48b8b7fd46953ea7bb4f4">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ba11258ccbf364d85de48b8b7fd46953ea7bb4f4</a></li>

<li>Document that a CHECKPOINT before taking a file system snapshot can reduce recovery time. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7276ab5888d85782d988fc297ad2e176c7ad1bca">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7276ab5888d85782d988fc297ad2e176c7ad1bca</a></li>

<li>Properly add new inet_net_ntop file to libpq Makefile. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=58dfb07b5d84c0088033e2d22fc44df812fa6eb5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=58dfb07b5d84c0088033e2d22fc44df812fa6eb5</a></li>

<li>Restructure how libpq includes external C files, for clarity. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c6978ecd6f761388d8479c8b32cfd0dd2d2bd4ac">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c6978ecd6f761388d8479c8b32cfd0dd2d2bd4ac</a></li>

<li>Fix getaddrinfo() in pgport to use proper parameters, as detected by Win32 buildfarm members. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=212a1c7b0b4164e15381af327ee6656ae7e02298">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=212a1c7b0b4164e15381af327ee6656ae7e02298</a></li>

<li>Add PQping and PQpingParams to libpq to allow detection of the server's status, including a status where the server is running but refuses a postgres connection. Have pg_ctl use this new function. This fixes the case where pg_ctl reports that the server is not running (cannot connect) but in fact it is running. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afd7d9adca971d9aae97e87ce617d8608d25ab10">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=afd7d9adca971d9aae97e87ce617d8608d25ab10</a></li>

<li>Improve pg_ctl "cannot connect" warning, per suggestion from Magnus. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4646e0cef70d2f9a6bb1764cee5c13b7bbd23625">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4646e0cef70d2f9a6bb1764cee5c13b7bbd23625</a></li>

<li>Improve pg_ctl "cannot connect" spacing, per Tom Lane, and wording. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f4b3d750b7648d90486827a3de58c226daa2c58">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5f4b3d750b7648d90486827a3de58c226daa2c58</a></li>

<li>In libpq/Makefile, merge PERM_PGPORT and OPT_PGPORT into a single Makefile variable PGPORT, for clarity. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a9b02ec654434e7e395b8677ba142a99eed7eb5e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a9b02ec654434e7e395b8677ba142a99eed7eb5e</a></li>

<li>Abandon use of Makefile variables in libpq/Makefile because MSVC scrapes the OBJS lines from that file. Cleanup where possible. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4f6deef2fb7ddc6b3c6b901db66072cf65ccaa27">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=4f6deef2fb7ddc6b3c6b901db66072cf65ccaa27</a></li>

<li>Use only addr_cur when reporting connection failures in libpq. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ed51bd4968a903e13bdcded869a644fd0d28353c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ed51bd4968a903e13bdcded869a644fd0d28353c</a></li>

<li>Update comment that says we only report last libpq connection failure, per Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bad8277f13c31350abd7571af51d272bd1401f3c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=bad8277f13c31350abd7571af51d272bd1401f3c</a></li>

<li>Use conn-&gt;raddr consistently for non-connect libpq error reporting. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2eba413db99fcde9a4d3a9f52578dc4e7f5d5ec">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f2eba413db99fcde9a4d3a9f52578dc4e7f5d5ec</a></li>

<li>Add inet_net_ntop.c as needed by MSVC, per Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e6e38b4ac21cc25fb8187e573a672ff17d9b2801">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e6e38b4ac21cc25fb8187e573a672ff17d9b2801</a></li>

<li>In libpq/Makefile, use OBJS += as a way to break up long link lines into something that can be documented. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f48290a9d6d000d1b5012b9304b734ecb9cc759">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1f48290a9d6d000d1b5012b9304b734ecb9cc759</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't raise "identifier will be truncated" messages in dblink except creating new connections. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d3c126544342728ab4b5c167b4f4b01a39270db5">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d3c126544342728ab4b5c167b4f4b01a39270db5</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Move call to GetTopTransactionId() earlier in LockAcquire(), removing an infrequently occurring race condition in Hot Standby. An xid must be assigned before a lock appears in shared memory, rather than immediately after, else GetRunningTransactionLocks() may see InvalidTransactionId, causing assertion failures during lock processing on standby. Bug report and diagnosis by Fujii Masao, fix by me. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ed78384acd691e3336e170aa18af69d15d088027">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ed78384acd691e3336e170aa18af69d15d088027</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Gurjeet Singh sent in another revision of the patch to allow ALTER TABLE to create a primary key from an existing index.</li>

<li>Pavel Stehule sent in a patch to make de-TOAST only once when needed in PL/pgsql.</li>

<li>Dimitri Fontaine sent in three more revisions of the unified configuration file parser patch.</li>

<li>David Wheeler sent in a doc patch for the new ALTER ENUM..ADD VALUE.</li>

<li>Shigeru HANADA split the SQL/MED into three separate patches and updated same.</li>

<li>Pursuant to a review by Josh Tolley, Dimitri Fontaine sent in another revision of the execute_from_file() patch.</li>

<li>Heikki Linnakangas and Robert Haas traded patches for to lighten the overhead assocated with connecting to the database.</li>

<li>Steve Singer sent in another version of the patch to use an existing index for a primary key.</li>

<li>KaiGai Kohei sent in another revision of the label switcher function.</li>

<li>Fujii Masao sent in another revision of the libpq patches intended to enable synchronous replication.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to add a format() function with to_char().</li>

<li>Heikki Linnakangas sent in another revision of the GiST insert algorithm rewrite.</li>

<li>Tom Lane sent in two revisions of a patch redo the representation of sorting and hashing in queries and plans.</li>

<li>Quan Zongliang sent in a patch to fix a bug where pg_ctl -w (re)start fails with a custom unix_socket_directory.</li>

<li>Marti Raudsepp sent in a patch to return the command tag, 'REPLACE X' for CREATE OR REPLACE statements.</li>

<li>Joachim Wieland sent in another revision of the patches which allow pluggable compression algorithms in pg_dump and add a directory format to pg_dump/pg_restore's formats.</li>

</ul>