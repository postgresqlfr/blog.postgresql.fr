---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 10 mars 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-03-17-nouvelles-hebdomadaires-de-postgresql-10-mars-2013 "
---


<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-03/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PyPgDay aura lieu le 13 mars au <em>Santa Clara Convention Center</em>, le premier jour de la <em>PyCon</em>. Informations par l&agrave;&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PyPgDay2013">http://wiki.postgresql.org/wiki/PyPgDay2013</a></li>

<li>Le PGDay 2013 de New-York City aura lieu le 22 mars&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org/">http://pgday.nycpug.org/</a></li>

<li>Le PgDay Fr est l'&eacute;v&eacute;nement majeur de la communaut&eacute; francophone. La date limite pour les propositions de conf&eacute;rence est le samedi 24 mars 2013 &agrave; 23h59 CEST&nbsp;: 

<a target="_blank" href="http://pgday.fr/call_for_papers">http://pgday.fr/call_for_papers</a></li>

<li>La <em>PostgreSQL Session</em> est programm&eacute;e pour le 28 mars 2013 &agrave; Paris. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/5/">http://www.postgresql-sessions.org/en/5/</a></li>

<li>PGCon 2013 aura lieu les 23 &amp; 24 mai 2013 &agrave; l'Universit&eacute; d'Ottawa&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2013/">http://www.pgcon.org/2013/</a></li>

<li>La 6&egrave;me conf&eacute;rence annuelle "Prague PostgreSQL Developers Day", organis&eacute;e par le CSPUG (Groupe des utilisateurs tch&egrave;ques et slovaques de PostgreSQL), aura lieu le 30 mai 2013 &agrave; la Facult&eacute; des Sciences Math&eacute;matiques &amp; Physiques de l'Universit&eacute; Charles (Malostranske namesti 25, Prague). Les candidatures des conf&eacute;renciers sont attendues jusqu'au 14 avril &agrave; l'adresse &lt;info AT p2d2 POINT cz&gt;. D'avantage d'informations sur le site&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour <em>PostgreSQL Brazil</em>, &eacute;v&eacute;nement tenu du 15 au 17 ao&ucirc;t 2013 &agrave; Porto Velho, &Eacute;tat du Rond&ocirc;nia au Br&eacute;sil, est lanc&eacute;. Les propositions sont attendues jusqu'au 15 mars&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/2013/chamada.en.php">http://pgbr.postgresql.org.br/2013/chamada.en.php</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130311060832.GA3326@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove accidentally-committed .orig file. Author: Kevin Grittner &lt;kgrittn@postgresql.org&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54d6706ded5c612a7f9b16eb6ddb08f44e24bb70">http://git.postgresql.org/pg/commitdiff/54d6706ded5c612a7f9b16eb6ddb08f44e24bb70</a></li>

<li>psql: Let \l accept a pattern. reviewed by Satoshi Nagayasu Author: Peter Eisentraut &lt;peter_e@gmx.net&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ea1f6e98fc84f1c5f66cc6355f6e20582295e81">http://git.postgresql.org/pg/commitdiff/0ea1f6e98fc84f1c5f66cc6355f6e20582295e81</a></li>

<li>Report pg_hba line number and contents when users fail to log in. Instead of just reporting which user failed to log in, log both the line number in the active pg_hba.conf file (which may not match reality in case the file has been edited and not reloaded) and the contents of the matching line (which will always be correct), to make it easier to debug incorrect pg_hba.conf files. The message to the client remains unchanged and does not include this information, to prevent leaking security sensitive information. Reviewed by Tom Lane and Dean Rasheed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f49a67f954db3e92fd96963169fb8302959576e">http://git.postgresql.org/pg/commitdiff/7f49a67f954db3e92fd96963169fb8302959576e</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix overflow check in tm2timestamp (this time for sure). I fixed this code back in commit 841b4a2d5, but didn't think carefully enough about the behavior near zero, which meant it improperly rejected 1999-12-31 24:00:00. Per report from Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/542eeba26992305d872be699158cb3ab1c2be6e6">http://git.postgresql.org/pg/commitdiff/542eeba26992305d872be699158cb3ab1c2be6e6</a></li>

<li>Fix to_char() to use ASCII-only case-folding rules where appropriate. formatting.c used locale-dependent case folding rules in some code paths where the result isn't supposed to be locale-dependent, for example to_char(timestamp, 'DAY'). Since the source data is always just ASCII in these cases, that usually didn't matter ... but it does matter in Turkish locales, which have unusual treatment of "i" and "I". To confuse matters even more, the misbehavior was only visible in UTF8 encoding, because in single-byte encodings we used pg_toupper/pg_tolower which don't have locale-specific behavior for ASCII characters. Fix by providing intentionally ASCII-only case-folding functions and using these where appropriate. Per bug #7913 from Adnan Dursun. Back-patch to all active branches, since it's been like this for a long time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80b011ef0a13bb326861f79ba987b4fa04ae4a27">http://git.postgresql.org/pg/commitdiff/80b011ef0a13bb326861f79ba987b4fa04ae4a27</a></li>

<li>Fix missing #include in commands/matview.h. It needs parsenodes.h to be compilable regardless of previous headers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e11cb8ba2c9134c9f16253213f2f0cf089c5838e">http://git.postgresql.org/pg/commitdiff/e11cb8ba2c9134c9f16253213f2f0cf089c5838e</a></li>

<li>Arrange to cache FdwRoutine structs in foreign tables' relcache entries. This saves several catalog lookups per reference. It's not all that exciting right now, because we'd managed to minimize the number of places that need to fetch the data; but the upcoming writable-foreign-tables patch needs this info in a lot more places. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1908abc4a37d397356c9cdf0fd31c33a86281d63">http://git.postgresql.org/pg/commitdiff/1908abc4a37d397356c9cdf0fd31c33a86281d63</a></li>

<li>Fix infinite-loop risk in fixempties() stage of regex compilation. The previous coding of this function could get into situations where it would never terminate, because successive passes would re-add EMPTY arcs that had been removed by the previous pass. Rewrite the function completely using a new algorithm that is guaranteed to terminate, and also seems to be usually faster than the old one. Per Tcl bugs 3604074 and 3606683. Tom Lane and Don Porter 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7b61d4f5af37344f8973b2dfce47e2ba2680061">http://git.postgresql.org/pg/commitdiff/a7b61d4f5af37344f8973b2dfce47e2ba2680061</a></li>

<li>Support writable foreign tables. This patch adds the core-system infrastructure needed to support updates on foreign tables, and extends contrib/postgres_fdw to allow updates against remote Postgres servers. There's still a great deal of room for improvement in optimization of remote updates, but at least there's basic functionality there now. KaiGai Kohei, reviewed by Alexander Korotkov and Laurenz Albe, and rather heavily revised by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21734d2fb896e0ecdddd3251caa72a3576e2d415">http://git.postgresql.org/pg/commitdiff/21734d2fb896e0ecdddd3251caa72a3576e2d415</a></li>

<li>Band-aid for regression test expected-results problem with timestamptz. We probably need to tell the remote server to use specific timezone and datestyle settings, and maybe other things. But for now let's just hack the postgres_fdw regression test to not provoke failures when run in non-EST5EDT environments. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7951eef89be78c50ea2241f593d76dfefe176c9">http://git.postgresql.org/pg/commitdiff/f7951eef89be78c50ea2241f593d76dfefe176c9</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Bump catversion because of new function in the materialized view patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8056592bcbed183fb03266d22fa1073bc8b04b4">http://git.postgresql.org/pg/commitdiff/c8056592bcbed183fb03266d22fa1073bc8b04b4</a></li>

<li>Fix broken pg_dump for 9.0 and 9.1 caused by the MV patch. Per report and suggestion from Bernd Helmle 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfa3df3de14b437d5f1691d1636a57c9ec595f51">http://git.postgresql.org/pg/commitdiff/cfa3df3de14b437d5f1691d1636a57c9ec595f51</a></li>

<li>Add docs for pg_matviews, which were missed in the initial MV commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5141603ebd162a50c36583f1a80eceadc94ef25e">http://git.postgresql.org/pg/commitdiff/5141603ebd162a50c36583f1a80eceadc94ef25e</a></li>

<li>WAL-log the extension of a new empty MV heap which is being populated. This page with no tuples is used to distinguish an MV containing a zero-row resultset of its backing query from an MV which has not been populated by its backing query. Unless WAL-logged, recovery and hot standby don't work correctly with what should be an empty but scannable materialized view. Fixes bugs reported by Fujii Masao in testing MVs on hot standby. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5bf7a2052c8e7ebbd1ca3986525c3629d7345d1">http://git.postgresql.org/pg/commitdiff/c5bf7a2052c8e7ebbd1ca3986525c3629d7345d1</a></li>

<li>Fix typo in docs for ALTER MATERIALIZED VIEW. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71877c18a869b858f69e813659ed4bb22b117c4a">http://git.postgresql.org/pg/commitdiff/71877c18a869b858f69e813659ed4bb22b117c4a</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove dependency on the DLL of pythonxx.def file. This confused Cygwin's make because of the colon in the path. The DLL isn't likely to change under us so preserving the dependency doesn't gain us much, and it's useful to be able to do a native Windows build with the Cygwin mingw toolset. Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d147e43adcf5d2bff9caa073608f381a27439bf">http://git.postgresql.org/pg/commitdiff/0d147e43adcf5d2bff9caa073608f381a27439bf</a></li>

<li>Fix message typo. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cd340ca89a06d6386f1af3b519db6f77c21ac84e">http://git.postgresql.org/pg/commitdiff/cd340ca89a06d6386f1af3b519db6f77c21ac84e</a></li>

<li>JSON generation improvements. This adds the following: json_agg(anyrecord) -&gt; json to_json(any) -&gt; json hstore_to_json(hstore) -&gt; json (also used as a cast) hstore_to_json_loose(hstore) -&gt; json The last provides heuristic treatment of numbers and booleans. Also, in json generation, if any non-builtin type has a cast to json, that function is used instead of the type's output function. Andrew Dunstan, reviewed by Steve Singer. Catalog version bumped. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38fb4d978c5bfc377ef979e2595e3472744a3b05">http://git.postgresql.org/pg/commitdiff/38fb4d978c5bfc377ef979e2595e3472744a3b05</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_ctl: Add comma to message 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71ea7e9737c1817cfa1747b181b27e73ce620f3b">http://git.postgresql.org/pg/commitdiff/71ea7e9737c1817cfa1747b181b27e73ce620f3b</a></li>

<li>Adjust nls.mk for split out of wait_error.c 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f11af2bcab36b51a7e41df7986d6f030459d7d09">http://git.postgresql.org/pg/commitdiff/f11af2bcab36b51a7e41df7986d6f030459d7d09</a></li>

<li>pg_basebackup: Add missing newlines to several error messages 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74e629cb0987fd3505173c4e117108e079e7e930">http://git.postgresql.org/pg/commitdiff/74e629cb0987fd3505173c4e117108e079e7e930</a></li>

<li>pg_ctl: Adjust nls.mk for split out of wait_error.c 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/31531325a4d374e6470b51e4b1dbc3cdc78f7d6e">http://git.postgresql.org/pg/commitdiff/31531325a4d374e6470b51e4b1dbc3cdc78f7d6e</a></li>

<li>Add fe_memutils.c to nls.mk where used 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97951139164055d6bae5aae7ea058c28e1462253">http://git.postgresql.org/pg/commitdiff/97951139164055d6bae5aae7ea058c28e1462253</a></li>

<li>doc: Add note about checkpoint_warning vs checkpoint_timeout. suggested by Tianyin Xu 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd28c410f77e415ce104cb42bf52c4a5457085da">http://git.postgresql.org/pg/commitdiff/dd28c410f77e415ce104cb42bf52c4a5457085da</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Code beautification for object-access hook machinery. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f90cc269823ba5282341a197c7387f5ada6703a6">http://git.postgresql.org/pg/commitdiff/f90cc269823ba5282341a197c7387f5ada6703a6</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix tli history file fetching, broken by the archive after crash recevery patch. If we were about to enter archive recovery after crash recovery, we scanned the archive for the latest tli history file, and set the recovery target timeline to that. However, when we actually tried to read the history file, we would not fetch the file from the archive, because we were not in archive recovery yet. To fix, make readTimeLineHistory and existsTimeLineHistory to always fetch the file from archive if archive recovery is requested, even if we're not in archive recovery yet. Backpatch to 9.2. Mitsumasa KONDO 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ccefe8610db8b339bad2c5b51abc07448a32947">http://git.postgresql.org/pg/commitdiff/7ccefe8610db8b339bad2c5b51abc07448a32947</a></li>

<li>Remove unnecessary #ifdef FRONTEND check to choose between strdup and pstrdup. The libpgcommon patch made that unnecessary, palloc and friends are now available in frontend programs too, mapped to plain old malloc. As pointed out by Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2443a26b9b905e66cd9b95a2faf57e1f1ebcafb1">http://git.postgresql.org/pg/commitdiff/2443a26b9b905e66cd9b95a2faf57e1f1ebcafb1</a></li>

<li>SP-GiST support of the range adjacent operator -|-. Alexander Korotkov, reviewed by Jeff Davis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/23f10b6473ed58c3699b81ca4677f4ff51878ec0">http://git.postgresql.org/pg/commitdiff/23f10b6473ed58c3699b81ca4677f4ff51878ec0</a></li>

<li>Forgot catversion bump in the SP-GiST adjacent support patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96443d142002a6c17ee51fa0633ee5de3bffdc83">http://git.postgresql.org/pg/commitdiff/96443d142002a6c17ee51fa0633ee5de3bffdc83</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alvaro Herrera sent in three more revisions of a patch to handle sql_drop in event triggers.</li>

<li>Michael Paquier sent in nine more revisions of a patch to add REINDEX CONCURRENTLY.</li>

<li>Joachim Wieland sent in another revision of a patch to implement parallel pg_dump.</li>

<li>Peter Eisentraut sent in another revision of a patch to implement an idempotent option for pg_dump.</li>

<li>Heikki Linnakangas sent in another revision of a patch to optimize pglz.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to fix the width specifier in format().</li>

<li>Heikki Linnakangas and Amit Kapila traded patches to improve WAL performance by reducing the amount of same written in updates.</li>

<li>Amit Kapila sent in another revision of a patch to enable changing postgresql.conf parameters via SQL.</li>

<li>Laurenz Albe sent in another revision of a patch to clarify some of the documentation on floating point.</li>

<li>Ian Barwick sent in a patch to clarify the CREATE TRIGGER documentation.</li>

<li>Jeff Davis and Greg Smith traded patches to enable page checksums.</li>

<li>Robins sent in a patch to add a simple test of psql to "make check".</li>

</ul>