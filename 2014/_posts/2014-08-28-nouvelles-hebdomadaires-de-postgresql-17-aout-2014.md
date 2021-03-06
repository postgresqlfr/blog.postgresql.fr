---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 août 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/08/28/Nouvelles-hebdomadaires-de-PostgreSQL-17-août-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 6.0, un analyseur parall&egrave;lisable de logs PostgreSQL &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="https://sourceforge.net/projects/pgbadger/">https://sourceforge.net/projects/pgbadger/</a><br />D&eacute;veloppement&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/">https://github.com/dalibo/pgbadger/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en ao&ucirc;t</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-08/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PgDay 2014 de Portland (Oregon, &Eacute;tats-Unis) aura lieu le 6 septembre 2014&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/PDXPUGDay2014">https://wiki.postgresql.org/wiki/PDXPUGDay2014</a></li>

<li>Postgres Open 2014 aura lieu &agrave; Chicago, Illinois - USA, du 17 au 19 septembre. Les inscriptions et tutoriels sont disponibles &agrave; l'achat&nbsp;: 

<a target="_blank" href="https://postgresopen.org/2014/tickets/">https://postgresopen.org/2014/tickets/</a> <a target="_blank" href="http://postgresopen.org/2014/callforpapers/">http://postgresopen.org/2014/callforpapers/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140818055742.GA22766@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix documentation oversights about pageinspect and initialization fork. The initialization fork was added in 9.1, but has not been taken into consideration in documents of get_raw_page function in pageinspect and storage layout. This commit fixes those oversights. get_raw_page can read not only a table but also an index, etc. So it should be documented that the function can read any relation. This commit also fixes the document of pageinspect that way. Back-patch to 9.1 where those oversights existed. Vik Fearing, review by MauMau 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7d835ff4db19c515171d6c8de772536c55600753">http://git.postgresql.org/pg/commitdiff/7d835ff4db19c515171d6c8de772536c55600753</a></li>

<li>Add tab-completion for \unset and valid setting values of psql variables. This commit also changes tab-completion for \set so that it displays all the special variables like COMP_KEYWORD_CASE. Previously it displayed only variables having the set values. Which was not user-friendly for those who want to set the unset variables. This commit also changes tab-completion for :variable so that only the variables having the set values are displayed. Previously even unset variables were displayed. Pavel Stehule, modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e15c4ab5fb0de2cab393ed4be2136e1832746412">http://git.postgresql.org/pg/commitdiff/e15c4ab5fb0de2cab393ed4be2136e1832746412</a></li>

<li>Change first call of ProcessConfigFile so as to process only data_directory. When both postgresql.conf and postgresql.auto.conf have their own entry of the same parameter, PostgreSQL uses the entry in postgresql.auto.conf because it appears last in the configuration scan. IOW, the other entries which appear earlier are ignored. But, previously, ProcessConfigFile() detected the invalid settings of even those unused entries and emitted the error messages complaining about them, at postmaster startup. Complaining about the entries to ignore is basically useless. This problem happened because ProcessConfigFile() was called twice at postmaster startup and the first call read only postgresql.conf. That is, the first call could check the entry which might be ignored eventually by the second call which read both postgresql.conf and postgresql.auto.conf. To work around the problem, this commit changes ProcessConfigFile so that its first call processes only data_directory and the second one does all the entries. It's OK to process data_directory in the first call because it's ensured that data_directory doesn't exist in postgresql.auto.conf. Back-patch to 9.4 where postgresql.auto.conf was added. Patch by me. Review by Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e3f65973a3c94a699a1659254b89c4f77f0a6a7">http://git.postgresql.org/pg/commitdiff/3e3f65973a3c94a699a1659254b89c4f77f0a6a7</a></li>

<li>Fix typo in \setrandom document. Fabien COELHO 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6ded369a7793c926661f492c153a6dd05afc5bc">http://git.postgresql.org/pg/commitdiff/d6ded369a7793c926661f492c153a6dd05afc5bc</a></li>

<li>Expose -S option in pg_receivexlog. This option is equivalent to --slot option which pg_receivexlog has already supported, which specifies the replication slot to use for WAL streaming. pg_recvlogical has already supported both options, and this commit makes pg_receivexlog consistent with pg_recvlogical regarding the slot option. Back-patch to 9.4 where the slot option was added. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52bffe3499d8e5f61efa385ab3c6a074314ee5db">http://git.postgresql.org/pg/commitdiff/52bffe3499d8e5f61efa385ab3c6a074314ee5db</a></li>

<li>Fix help message in pg_ctl. Previously the help message described that -m is an option for "stop", "restart" and "promote" commands in pg_ctl. But actually that's not an option for "promote". So this commit fixes that incorrect description in the help message. Back-patch to 9.3 where the incorrect description was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4287a689d10bd4863e3dfbf9c4f232feeca0cdd">http://git.postgresql.org/pg/commitdiff/a4287a689d10bd4863e3dfbf9c4f232feeca0cdd</a></li>

<li>Add missing index terms for replication commands in the document. Previously only CREATE_REPLICATION_SLOT was exposed as an index term. That's odd and there is no reason not to add index terms for other replication commands. Back-patch to 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e9f70f1287b9324e398a084a8e881ea6aefc3eb">http://git.postgresql.org/pg/commitdiff/3e9f70f1287b9324e398a084a8e881ea6aefc3eb</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Enhance pgbench's option checking. Now benchmarking options such as -c cannot be used if initializing option (-i) is specified. Also initializing options such as -F cannot be used if initializing option is not specified. Tatsuo Ishii and Fabien COELHO. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51222a176624e8529143f26f43da200c5beb0e9e">http://git.postgresql.org/pg/commitdiff/51222a176624e8529143f26f43da200c5beb0e9e</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Be less aggressive in asking for feedback of logical walsender clients. When doing logical decoding using START_LOGICAL_REPLICATION in a walsender process the walsender sometimes was sending out keepalive messages too frequently. Asking for feedback every time. WalSndWaitForWal() sends out keepalive messages when it's waiting for new WAL to be generated locally when it sees that the remote side hasn't yet flushed WAL up to the local position. That generally is good but causes problems if the remote side only writes but doesn't flush changes yet. So check for both remote write and flush position. Additionally we've asked for feedback to the keepalive message which isn't warranted when waiting for WAL in contrast to preventing timeouts because of wal_sender_timeout. Complaint and patch by Steve Singer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41d5f8ad734f28ca425636d5ac4c8ea9c29002a5">http://git.postgresql.org/pg/commitdiff/41d5f8ad734f28ca425636d5ac4c8ea9c29002a5</a></li>

<li>pg_recvlogical message and code improvements. Some error messages complained about --init and --stop being used whereas the --create and --drop are the correct verbs. Fix that. Also a XLogRecPtr was tested in a boolean fashion instead of being compared to InvalidXLogRecPtr. Backpatch to 9.4 where pg_recvlogical was introduced. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/596385be06e1c8ac7291958a556b10b37ee333d5">http://git.postgresql.org/pg/commitdiff/596385be06e1c8ac7291958a556b10b37ee333d5</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Prevent memory leaks in parseRelOptions(). parseRelOptions() tended to leak memory in the caller's context. Most of the time this doesn't really matter since the caller's context is at most query-lifespan, and the function won't be invoked very many times. However, when testing with CLOBBER_CACHE_RECURSIVELY, the same relcache entry can get rebuilt a *lot* of times in one query, leading to significant intraquery memory bloat if it has any reloptions. Noted while investigating a related report from Tomas Vondra. In passing, get rid of some Asserts that are redundant with the one done by deconstruct_array(). As with other patches to avoid leaks in CLOBBER_CACHE testing, it doesn't really seem worth back-patching this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a844c29966d7c0cd6a457e9324f175349bb12df0">http://git.postgresql.org/pg/commitdiff/a844c29966d7c0cd6a457e9324f175349bb12df0</a></li>

<li>Prevent memory leaks in RelationGetIndexList, RelationGetIndexAttrBitmap. When replacing rd_indexlist, rd_indexattr, etc, we neglected to pfree any old value of these fields. Under ordinary circumstances, the old value would always be NULL, so this seemed reasonable enough. However, in cases where we're rebuilding a system catalog's relcache entry and another cache flush occurs on that same catalog meanwhile, it's possible for the field to not be NULL when we return to the outer level, because we already refilled it while recovering from the inner flush. This leads to a fairly small session-lifespan leak in CacheMemoryContext. In real-world usage the leak would be too small to notice; but in testing with CLOBBER_CACHE_RECURSIVELY the leakage can add up to the point of causing OOM failures, as reported by Tomas Vondra. The issue has been there a long time, but it only seems worth fixing in HEAD, like the previous fix in this area (commit 078b2ed291c758e7). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ab8c84db2f7af008151b848cf1d6a4672a39eecd">http://git.postgresql.org/pg/commitdiff/ab8c84db2f7af008151b848cf1d6a4672a39eecd</a></li>

<li>Update SysV parameter configuration documentation for FreeBSD. FreeBSD hasn't made any use of kern.ipc.semmap since 1.1, and newer releases reject attempts to set it altogether; so stop recommending that it be adjusted. Per bug #11161. Back-patch to all supported branches. Before 9.3, also incorporate commit 7a42dff47, which touches the same text and for some reason was not back-patched at the time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ff5bfb5f0d83a538766903275b230499fa9ebe1">http://git.postgresql.org/pg/commitdiff/5ff5bfb5f0d83a538766903275b230499fa9ebe1</a></li>

<li>Fix bogus commutator/negator links for JSONB containment operators. &lt;@ and @&gt; are each other's commutators, but they were incorrectly marked as being each other's negators instead. (This was actually questioned in a comment in the original commit, but nobody followed through :-(.) Per bug #11178 from Christian Pronovost. In passing, fix some JSONB operator descriptions that were randomly different from the phrasing of every other similar description. catversion bump for pg_catalog contents change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e3f9c16838358b6b3679dd014455d310919d7efa">http://git.postgresql.org/pg/commitdiff/e3f9c16838358b6b3679dd014455d310919d7efa</a></li>

<li>Add opr_sanity queries to inspect commutator/negator links more closely. Make lists of the names of all operators that are claimed to be commutator pairs or negator pairs. This is analogous to the existing queries that make lists of all operator names appearing in particular opclass strategy slots. Unexpected additions to these lists are likely to be mistakes; had we had these queries in place before, bug #11178 might've been prevented. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a068b5b65f83660fc99c3faf39ed50493b010fbb">http://git.postgresql.org/pg/commitdiff/a068b5b65f83660fc99c3faf39ed50493b010fbb</a></li>

<li>Fix bogus return macros in range_overright_internal(). PG_RETURN_BOOL() should only be used in functions following the V1 SQL function API. This coding accidentally fails to fail since letting the compiler coerce the Datum representation of bool back to plain bool does give the right answer; but that doesn't make it a good idea. Back-patch to older branches just to avoid unnecessary code divergence. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/737cdc2d1412f3e4115137ca6fa14d1b3c39dcbc">http://git.postgresql.org/pg/commitdiff/737cdc2d1412f3e4115137ca6fa14d1b3c39dcbc</a></li>

<li>Improve DISCARD documentation. The new DISCARD SEQUENCES option was inadequately described, and hadn't been mentioned at all in the initial Description paragraph. Rather than rectifying the latter the hard way, it seemed better to rewrite the description as a summary, instead of having it basically duplicate statements made under Parameters. Be more consistent about the ordering of the options, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/259904ecd42a46f5bb66bb85d547eba5b64a2cfa">http://git.postgresql.org/pg/commitdiff/259904ecd42a46f5bb66bb85d547eba5b64a2cfa</a></li>

<li>Make an editorial pass over the 9.4 release notes. Update the notes to include commits through today, and do a lot of wordsmithing and markup adjustment. Notably, don't use &lt;link&gt; where &lt;xref&gt; will do; since we got rid of the text-format HISTORY file, there is no longer a reason to avoid &lt;xref&gt;. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f66faadc4420fdc34f66057f493a0e09c0ad8a58">http://git.postgresql.org/pg/commitdiff/f66faadc4420fdc34f66057f493a0e09c0ad8a58</a></li>

<li>Use ISO 8601 format for dates converted to JSON, too. Commit f30015b6d794c15d52abbb3df3a65081fbefb1ed made this happen for timestamp and timestamptz, but it seems pretty inconsistent to not do it for simple dates as well. (In passing, I re-pgindent'd json.c.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e56ec50c1622010c010e1c84bc02ce44285c4f41">http://git.postgresql.org/pg/commitdiff/e56ec50c1622010c010e1c84bc02ce44285c4f41</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Remove obsolete set element DSSSL customizations. We don't use set elements (collection of books) anymore, so this is just dead code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/faa14acc9b958d7b811d0aa624774f36e3fab750">http://git.postgresql.org/pg/commitdiff/faa14acc9b958d7b811d0aa624774f36e3fab750</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5333c72c951cd30e46cece18e75bea53f7149b1b">http://git.postgresql.org/pg/commitdiff/5333c72c951cd30e46cece18e75bea53f7149b1b</a></li>

<li>Add some noreturn attributes based on compiler recommendations 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d678bf7bc66d4478bdee51278946dcc9ae8cae5">http://git.postgresql.org/pg/commitdiff/1d678bf7bc66d4478bdee51278946dcc9ae8cae5</a></li>

<li>doc: Fix DocBook XML validity. See 3a9d430af515e9dd8a9d34a4011367e667a66521. A new one snuck in. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d34b48a021b181e30c53280d336820740f67570b">http://git.postgresql.org/pg/commitdiff/d34b48a021b181e30c53280d336820740f67570b</a></li>

<li>Set shared library path for in-tree TAP tests. When the TAP tests are run in-tree (make check), set the shared library path using the appropriate environment variable, using a logic similar to pg_regress, so that the right libraries are used. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f669b61476b2efd79701a7a104e9de2fe11e4e42">http://git.postgresql.org/pg/commitdiff/f669b61476b2efd79701a7a104e9de2fe11e4e42</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ee9ca545bda210fec78381e8ad4ad1e1618b67c">http://git.postgresql.org/pg/commitdiff/9ee9ca545bda210fec78381e8ad4ad1e1618b67c</a></li>

<li>doc: Work around stylesheet bug for man build. The upstream stylesheets for man output insert a *roff comment for an occurrence of an indexterm, for reasons that have apparently been lost in history. This, however, is done incorrectly and causes some formatting problems. This hasn't been an issue until now, but the reorganization of indexterm elements inside variablelists has triggered this issue. The upstream fix ( 

<a target="_blank" href="http://sourceforge.net/p/docbook/bugs/1340/)">http://sourceforge.net/p/docbook/bugs/1340/)</a> is to drop indexterms altogether in man output, and so we'll do the same here. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1330e2922c7f7d42780109247c28ad50a790f96c">http://git.postgresql.org/pg/commitdiff/1330e2922c7f7d42780109247c28ad50a790f96c</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add sortsupport routines for text. This provides a small but worthwhile speedup when sorting text, at least in cases to which the sortsupport machinery applies. Robert Haas and Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b34e37bfefbed1bf9396dde18f308d8b96fd176c">http://git.postgresql.org/pg/commitdiff/b34e37bfefbed1bf9396dde18f308d8b96fd176c</a></li>

<li>docs: Add missing period. Fabien COELHO and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/751b7041050b7b19bf3001633740616089973ab3">http://git.postgresql.org/pg/commitdiff/751b7041050b7b19bf3001633740616089973ab3</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Doc fix: New York State's capital is Albany. The inheritance example in the manual implies that the capital of New York is New York City, but in reality it's Albany. George Hartzell 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef153ecc55a8f945d576a1e69a51b91046f24bb1">http://git.postgresql.org/pg/commitdiff/ef153ecc55a8f945d576a1e69a51b91046f24bb1</a></li>

<li>Remove remnants of a JENTRY_ISFIRST flag bit. I removed the flag earlier, but missed a few references in jsonb.h. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c07693f0c7cde7d269025fe714a124223a189e71">http://git.postgresql.org/pg/commitdiff/c07693f0c7cde7d269025fe714a124223a189e71</a></li>

<li>Break out OpenSSL-specific code to separate files. This refactoring is in preparation for adding support for other SSL implementations, with no user-visible effects. There are now two #defines, USE_OPENSSL which is defined when building with OpenSSL, and USE_SSL which is defined when building with any SSL implementation. Currently, OpenSSL is the only implementation so the two #defines go together, but USE_SSL is supposed to be used for implementation-independent code. The libpq SSL code is changed to use a custom BIO, which does all the raw I/O, like we've been doing in the backend for a long time. That makes it possible to use MSG_NOSIGNAL to block SIGPIPE when using SSL, which avoids a couple of syscall for each send(). Probably doesn't make much performance difference in practice - the SSL encryption is expensive enough to mask the effect - but it was a natural result of this refactoring. Based on a patch by Martijn van Oosterhout from 2006. Briefly reviewed by Alvaro Herrera, Andreas Karlsson, Jeff Janes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/680513ab79c7e12e402a2aad7921b95a25a4bcc8">http://git.postgresql.org/pg/commitdiff/680513ab79c7e12e402a2aad7921b95a25a4bcc8</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: error if run from top of new PGDATA on Windows. Print a clear error message in this case, rather than wait for initdb --sync-only to generate a "Permission denied" error. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4c3c99ac3d4777458ef3e94b037438b244b72b6">http://git.postgresql.org/pg/commitdiff/e4c3c99ac3d4777458ef3e94b037438b244b72b6</a></li>

<li>pg_upgrade: fix define adjusted during testing. from commit e4c3c99ac3d4777458ef3e94b037438b244b72b6 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea9b8abd6f457706a3501849d21587af178113a1">http://git.postgresql.org/pg/commitdiff/ea9b8abd6f457706a3501849d21587af178113a1</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Michael Paquier sent in three more revisions of a patch to support N synchronous standby servers, N&gt;1.</li>

<li>Fujii Masao sent in another revision of a patch to allow showing only failed queries in psql.</li>

<li>Fujii Masao sent in another revision of a patch to ignore unused GUCs at startup.</li>

<li>Michael Paquier sent in two more revisions of a patch to improve versioning on Windows.</li>

<li>Michael Paquier sent in another revision of a patch to remove the dependency on wsock32.lib when compiling code on Windows.</li>

<li>Michael Paquier sent in a patch to fix the tab padding for the new option -F in the getops switch.</li>

<li>Haribabu Kommi sent in another revision of a patch to fix the fact that inet types don't support min/max.</li>

<li>Heikki Linnakangas sent in another revision of a patch to add an SSL regression test suite.</li>

<li>Fabien COELHO sent in a patch to fix some issues in a previous patch which makes PL/PgSQL throw an error during compilation (instead of runtime) if the number of parameters passed to RAISE don't match the number of placeholders in error message.</li>

<li>Sean Chittenden sent in a patch to fix a potential performance regression due to mmap(2) on FreeBSD.</li>

<li>Fujii Masao sent in another revision of a patch to add pg_last_xact_insert_timestamp.</li>

<li>Heikki Linnakangas sent in another revision of a patch to make WAL format and API changes.</li>

<li>Heikki Linnakangas sent in another revision of a patch to support Windows SChannel as an OpenSSL replacement.</li>

<li>Furuya Osamu sent in two revisions of a patch to add a setting to send status packets after fsync to --status-interval of pg_receivexlog.</li>

<li>Atri Sharma sent in a WIP patch to enable GROUPING SETS.</li>

<li>Heikki Linnakangas sent in two revisions of a patch to refactor heapam.c redo routines to use XLogReplayBuffer.</li>

<li>Etsuro Fujita sent in another revision of a patch to compute attr_needed for child relations.</li>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Fujii Masao sent in a patch to enable WAL archiving even on a standby.</li>

<li>MauMau sent in another revision of a patch to implement pg_copy, a command for reliable WAL archiving.</li>

<li>David Rowley sent in a patch to change some security-related uses of strncpy to strlcpy.</li>

<li>Tom Lane an Heikki Linnakangas traded patches to fix an issue where TOAST fails to compress JSONB fields.</li>

<li>Keith Baker sent in two more revisions of a patch to implement the locking needed for a QNX 6.5 port.</li>

<li>SAWADA Masahiko sent in another revision of a patch to add line number as a prompt option to psql.</li>

<li>Fabien COELHO sent in a patch to add a throttling latency limit to pgbench.</li>

<li>Fujii Masao sent in a patch to change \watch so that it displays how long the query takes if \timing is enabled.</li>

<li>Fujii Masao sent in a patch to allow immediate standby promotion.</li>

<li>Rukh Meski sent in another revision of a patch to add LIMIT for UPDATE and DELETE.</li>

<li>Kyotaro HORIGUCHI sent in a patch to add a new GUC category PGC_BACKEND_USERSET and change local_preload_libraries to use it.</li>

<li>Peter Eisentraut sent in a patch to improve the speed of make check-world by having it only create one temporary installation, where before it made a temporary installation for every subdirectory.</li>

<li>Alvaro Herrera and Heikki Linnakangas traded patches to implement minmax indexes.</li>

<li>Fujii Masao sent in a patch to expose replication commands as index terms.</li>

<li>Amit Kapila and Michael Paquier traded patches to fix an issue where the option -T in pg_basebackup doesn't work on Windows.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to add PGP signatures to the pgcrypto extension.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to add PGP armor headers to the pgcrypto extension.</li>

<li>Fujii Masao sent in a patch to add a memory barrier to pgstat.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement the custom plan API.</li>

<li>Pavel Stehule sent in a patch to fix an issue with pg_dump where the existence of a large object (lo) could cause an unrestorable dump.</li>

<li>Joachim Wieland sent in a patch to refactor pg_dump to remove global variables. In addition to being a good in itself, this is in preparation for a parallel analog of "pg_dump | psql".</li>

<li>Noah Misch sent in a patch to fix the fact that the sample LDIF for pg_service.conf no longer works.</li>

<li>Fabien COELHO sent in a patch to add a --tuple-size option to pgbench.</li>

<li>Tomas Vondra sent in another revision of a patch to fix an issue where bad estimation together with large work_mem generates terrible slow hash joins.</li>

<li>David Rowley sent in another revision of a patch to support SEMI and ANTI join removal.</li>

<li>Rahila Syed sent in another revision of a patch to support various types of compression of full-page writes.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to enable ALTER TABLE ... SET LOGGED.</li>

<li>Stephen Frost sent in two more revisions of a patch to tweak the command tags in ALTER TABLESPACE MOVE.</li>

<li>Fujii Masao sent in another revision of a patch to add PENDING_LIST_CLEANUP_SIZE.</li>

<li>Marco Nenciarini sent in a patch to add backup profile to base backup.</li>

<li>Michael Paquier sent in another revision of a patch to add support for physical slot creation/deletion in pg_receivexlog.</li>

</ul>