---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 août 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/09/05/Nouvelles-hebdomadaires-de-PostgreSQL-31-août-2014"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>psycopg2 2.5.4, un connecteur Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2014/08/30/psycopg-254-released/">http://initd.org/psycopg/articles/2014/08/30/psycopg-254-released/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140901061646.GA21859@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't track DEALLOCATE in pg_stat_statements. We also don't track PREPARE, nor do we track planning time in general, so let's ignore DEALLOCATE as well for consistency. Backpatch to 9.4, but not further than that. Although it seems unlikely that anyone is relying on the current behavior, this is a behavioral change. Fabien Coelho 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cd934f635699b7c8b0027be69fddfc36be6f9b8">http://git.postgresql.org/pg/commitdiff/3cd934f635699b7c8b0027be69fddfc36be6f9b8</a></li>

<li>Show schema names in pg_dump verbose output. Fabr&iacute;zio de Royes Mello, reviewed by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2bde29739d1e28f58e901b7e53057b8ddc0ec286">http://git.postgresql.org/pg/commitdiff/2bde29739d1e28f58e901b7e53057b8ddc0ec286</a></li>

<li>Implement IF NOT EXISTS for CREATE SEQUENCE. Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0076f264b6f24854219d49b159602e2042c38ee7">http://git.postgresql.org/pg/commitdiff/0076f264b6f24854219d49b159602e2042c38ee7</a></li>

<li>Add regression tests for SELECT FOR UPDATE/SHARE NOWAIT. Thomas Munro 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ee16b49f0aac819bd4823d9b94485ef608b34e8">http://git.postgresql.org/pg/commitdiff/9ee16b49f0aac819bd4823d9b94485ef608b34e8</a></li>

<li>Fix bug in compressed GIN data leaf page splitting code. The list of posting lists it's dealing with can contain placeholders for deleted posting lists. The placeholders are kept around so that they can be WAL-logged, but we must be careful to not try to access them. This fixes bug #11280, reported by M&aring;rten Svantesson. Backpatch to 9.4, where the compressed data leaf page code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88231ec5784a00ce406553276be8a5a443dd3ba0">http://git.postgresql.org/pg/commitdiff/88231ec5784a00ce406553276be8a5a443dd3ba0</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typos in some error messages thrown by extension scripts when fed to psql. Some of the many error messages introduced in 458857cc missed 'FROM unpackaged'. Also e016b724 and 45ffeb7e forgot to quote extension version numbers. Backpatch to 9.1, just like 458857cc which introduced the messages. Do so because the error messages thrown when the wrong command is copy &amp; pasted aren't easy to understand. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d153b801611f6fdc58c7941e85dddb0cb25ca4ef">http://git.postgresql.org/pg/commitdiff/d153b801611f6fdc58c7941e85dddb0cb25ca4ef</a></li>

<li>Specify the port in dblink and postgres_fdw tests. That allows to run those tests against a postmaster listening on a nonstandard port without requiring to export PGPORT in postmaster's environment. This still doesn't support connecting to a nondefault host without configuring it in postmaster's environment. That's harder and less frequently used though. So this is a useful step. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/57ca1d4f0175f60e9cfb0f997c864173d9c72607">http://git.postgresql.org/pg/commitdiff/57ca1d4f0175f60e9cfb0f997c864173d9c72607</a></li>

<li>Don't hardcode contrib_regression dbname in postgres_fdw and dblink tests. That allows parallel installcheck to succeed inside contrib/. The output is not particularly pretty unless make's -O option to synchronize the output is used. There's other tests, outside contrib, that use a hardcoded, non-unique, database name. Those prohibit paralell installcheck to be used across more directories; but that's something for a separate patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ddc2504dbcf2af97b58a91b071768c17774d58d1">http://git.postgresql.org/pg/commitdiff/ddc2504dbcf2af97b58a91b071768c17774d58d1</a></li>

<li>Mark IsBinaryUpgrade as PGDLLIMPORT to fix windows builds after a7ae1dc. Author: David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5569d75d6a82f0d11d26404fceb848ae59869126">http://git.postgresql.org/pg/commitdiff/5569d75d6a82f0d11d26404fceb848ae59869126</a></li>

<li>Allow escaping of option values for options passed at connection start. This is useful to allow to set GUCs to values that include spaces; something that wasn't previously possible. The primary case motivating this is the desire to set default_transaction_isolation to 'repeatable read' on a per connection basis, but other usecases like seach_path do also exist. This introduces a slight backward incompatibility: Previously a \ in an option value would have been passed on literally, now it'll be taken as an escape. The relevant mailing list discussion starts with 20140204125823.GJ12016@awork2.anarazel.de. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11a020eb6e4023a1570a2788ba22dd6aafbd02dc">http://git.postgresql.org/pg/commitdiff/11a020eb6e4023a1570a2788ba22dd6aafbd02dc</a></li>

<li>Make backend local tracking of buffer pins memory efficient. Since the dawn of time (aka Postgres95) multiple pins of the same buffer by one backend have been optimized not to modify the shared refcount more than once. This optimization has always used a NBuffer sized array in each backend keeping track of a backend's pins. That array (PrivateRefCount) was one of the biggest per-backend memory allocations, depending on the shared_buffers setting. Besides the waste of memory it also has proven to be a performance bottleneck when assertions are enabled as we make sure that there's no remaining pins left at the end of transactions. Also, on servers with lots of memory and a correspondingly high shared_buffers setting the amount of random memory accesses can also lead to poor cpu cache efficiency. Because of these reasons a backend's buffers pins are now kept track of in a small statically sized array that overflows into a hash table when necessary. Benchmarks have shown neutral to positive performance results with considerably lower memory usage. Patch by me, review by Robert Haas. Discussion: 20140321182231.GA17111@alap3.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b4b680c3d6d8485155d4d4bf0a92d3a874b7a65">http://git.postgresql.org/pg/commitdiff/4b4b680c3d6d8485155d4d4bf0a92d3a874b7a65</a></li>

<li>Declare two variables in snapbuild.c as static. Neither is accessed externally, I just seem to have missed the static when writing the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fff977e29cda7c1641c43f9b293134adc77b65a">http://git.postgresql.org/pg/commitdiff/8fff977e29cda7c1641c43f9b293134adc77b65a</a></li>

<li>Protect definition of SpinlockSemaArray, just like its declaration. Found via clang's -Wmissing-variable-declarations. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c1faa7ba729c780b0ac598dbc23dbb1d6e1b872">http://git.postgresql.org/pg/commitdiff/5c1faa7ba729c780b0ac598dbc23dbb1d6e1b872</a></li>

<li>Declare lwlock.c's LWLockAcquireCommon() as a static inline. 68a2e52bbaf98f136 has introduced LWLockAcquireCommon() containing the previous contents of LWLockAcquire() plus added functionality. The latter then calls it, just like LWLockAcquireWithVar(). Because the majority of callers don't need the added functionality, declare the common code as inline. The compiler then can optimize away the unused code. Doing so is also useful when looking at profiles, to differentiate the users. Backpatch to 9.4, the first branch to contain LWLockAcquireCommon(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c4b55db1dc901dc184b1b3ab9cca3f2089ec311">http://git.postgresql.org/pg/commitdiff/9c4b55db1dc901dc184b1b3ab9cca3f2089ec311</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Editorial review of SET UNLOGGED. Add a succint comment explaining why it's correct to change the persistence in this way. Also s/loggedness/persistence/ because native speakers didn't like the latter term. Fabr&iacute;zio and &Aacute;lvaro 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7636c0c821f669e134a0f2fd1c6225bb3ec820d4">http://git.postgresql.org/pg/commitdiff/7636c0c821f669e134a0f2fd1c6225bb3ec820d4</a></li>

<li>Revert XactLockTableWait context setup in conditional multixact wait. There's no point in setting up a context error callback when doing conditional lock acquisition, because we never actually wait and so the user wouldn't be able to see the context message anywhere. In fact, this is more in line with what ConditionalXactLockTableWait is doing. Backpatch to 9.4, where this was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3adba736620c85112e0f9f6d043d3574e1c5830f">http://git.postgresql.org/pg/commitdiff/3adba736620c85112e0f9f6d043d3574e1c5830f</a></li>

<li>More psprintf goodness 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6d6020f1cf33a63bbae59d370b75fa5e98017f0">http://git.postgresql.org/pg/commitdiff/d6d6020f1cf33a63bbae59d370b75fa5e98017f0</a></li>

<li>Oops, forgot to "git add" one last change 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac41769fd9dca9f4a6ee5fa859a56c08e8bb95fe">http://git.postgresql.org/pg/commitdiff/ac41769fd9dca9f4a6ee5fa859a56c08e8bb95fe</a></li>

<li>Have CREATE TABLE AS and REFRESH return an OID Other DDL commands are already returning the OID, which is required for future additional event trigger work. This is merely making these commands in line with the rest of utility command support. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/301fcf33eb7fcbcf1da113dabeed90b8eaf656eb">http://git.postgresql.org/pg/commitdiff/301fcf33eb7fcbcf1da113dabeed90b8eaf656eb</a></li>

<li>Use newly added InvalidCommandId instead of 0. The symbol was added by 71901ab6d; the original code was introduced by 6868ed749. Development of both overlapped which is why we apparently failed to notice. This is a (very slight) behavior change, so I'm not backpatching this to 9.4 for now, even though the symbol does exist there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f822952eea112d3e19a0ddaad32e99d1943f29d">http://git.postgresql.org/pg/commitdiff/6f822952eea112d3e19a0ddaad32e99d1943f29d</a></li>

<li>DefineType: return base type OID, not its array. Event triggers want to know the OID of the interesting object created, which is the main type. The array created as part of the operation is just a subsidiary object which is not of much interest. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/832a12f65e91d4295be73e26079aa8508de0cf32">http://git.postgresql.org/pg/commitdiff/832a12f65e91d4295be73e26079aa8508de0cf32</a></li>

<li>Fix FOR UPDATE NOWAIT on updated tuple chains. If SELECT FOR UPDATE NOWAIT tries to lock a tuple that is concurrently being updated, it might fail to honor its NOWAIT specification and block instead of raising an error. Fix by adding a no-wait flag to EvalPlanQualFetch which it can pass down to heap_lock_tuple; also use it in EvalPlanQualFetch itself to avoid blocking while waiting for a concurrent transaction. Authors: Craig Ringer and Thomas Munro, tweaked by Alvaro Herrera 

<a target="_blank" href="http://www.postgresql.org/message-id/51FB6703.9090801@2ndquadrant.com">http://www.postgresql.org/message-id/51FB6703.9090801@2ndquadrant.com</a> Per Thomas Munro in the course of his SKIP LOCKED feature submission, who also provided one of the isolation test specs. Backpatch to 9.4, because that's as far back as it applies without conflicts (although the bug goes all the way back). To that branch also backpatch Thomas Munro's new NOWAIT test cases, committed in master by Heikki as commit 9ee16b49f0aac819bd4823d9b94485ef608b34e8 . <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c9701cfe58267cf5d79543a42ee4f0967cc73ab">http://git.postgresql.org/pg/commitdiff/1c9701cfe58267cf5d79543a42ee4f0967cc73ab</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>upgrade docs: highlight pg_upgrade, warn about globals preservation. Also, remove OID preservation mention, mention non-text dump formats Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf1c866597a0e59a30b13a66f3ae505655b61853">http://git.postgresql.org/pg/commitdiff/bf1c866597a0e59a30b13a66f3ae505655b61853</a></li>

<li>pg_ctl, pg_upgrade: allow multiple -o/-O options, append them. Report by Pavel Raiskup 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ebe30ad59bb2d127f576be07e036a473999c4b80">http://git.postgresql.org/pg/commitdiff/ebe30ad59bb2d127f576be07e036a473999c4b80</a></li>

<li>pg_upgrade: add SET log_min_error_statement = warning. Add to commit 73d78e11a0f7183c80b93eefbbb6026fe9664015 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0488e5c4fbfdce8acc989bdc17d9f0ec09ac281">http://git.postgresql.org/pg/commitdiff/b0488e5c4fbfdce8acc989bdc17d9f0ec09ac281</a></li>

<li>pg_upgrade: remove support for 8.3 old clusters. This trims down the code, and is in preparation for hardening pg_upgrade against auto-oid assignment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2209b3923a7afe0b6033ecfea972219df252ca8e">http://git.postgresql.org/pg/commitdiff/2209b3923a7afe0b6033ecfea972219df252ca8e</a></li>

<li>revert "Throw error for ALTER TABLE RESET of an invalid option". Reverts commits 73d78e11a0f7183c80b93eefbbb6026fe9664015 and b0488e5c4fbfdce8acc989bdc17d9f0ec09ac281. Also reverts pg_upgrade changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cb74a67e26523eb2408f441bfc589c80f76c465">http://git.postgresql.org/pg/commitdiff/6cb74a67e26523eb2408f441bfc589c80f76c465</a></li>

<li>Throw error for ALTER TABLE RESET of an invalid option. Also adjust pg_upgrade to not use this method for optional TOAST table creation. Patch by Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73d78e11a0f7183c80b93eefbbb6026fe9664015">http://git.postgresql.org/pg/commitdiff/73d78e11a0f7183c80b93eefbbb6026fe9664015</a></li>

<li>pg_upgrade docs: update docs for 8.3 support removal 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8c81b1b8e51475dd5a787660e6754c4bafbff47">http://git.postgresql.org/pg/commitdiff/e8c81b1b8e51475dd5a787660e6754c4bafbff47</a></li>

<li>pg_upgrade: use CTE query rather than temp table. Now that 8.3 is not supported, we can use a CTE and not temp tables. This allows for auto-oid assignment protection in a future patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d16332e96977d8166ea631891f6e2cf3ff11f45">http://git.postgresql.org/pg/commitdiff/5d16332e96977d8166ea631891f6e2cf3ff11f45</a></li>

<li>rename macro isTempOrToastNamespace to isTempOrTempToastNamespace. Done for clarity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73fe87503f23144a27f0bdecc55587deb5aa425f">http://git.postgresql.org/pg/commitdiff/73fe87503f23144a27f0bdecc55587deb5aa425f</a></li>

<li>pg_upgrade: prevent automatic oid assignment. Prevent automatic oid assignment when in binary upgrade mode. Also throw an error when contrib/pg_upgrade_support functions are called when not in binary upgrade mode. This prevent automatically-assigned oids from conflicting with later pre-assigned oids coming from the old cluster. It also makes sure oids are preserved in call important cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7ae1dcf4939cf643c5abe8dd673e4b87a6efd42">http://git.postgresql.org/pg/commitdiff/a7ae1dcf4939cf643c5abe8dd673e4b87a6efd42</a></li>

<li>pg_is_xlog_replay_paused(): remove super-user-only restriction. Also update docs to mention which function are super-user-only. Report by sys-milan@statpro.com Backpatch through 9.4 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01363beae52700c7425cb2d2452177133dad3e93">http://git.postgresql.org/pg/commitdiff/01363beae52700c7425cb2d2452177133dad3e93</a></li>

<li>Update C comment for pg_attribute.attislocal. Indicates if column has ever been local/non-inherited 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6eaa880eea67a711b30903a9ee2e996bccb775e">http://git.postgresql.org/pg/commitdiff/c6eaa880eea67a711b30903a9ee2e996bccb775e</a></li>

<li>Again update C comments for pg_attribute.attislocal 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5d7d07765443175a49441bad7a799dedc072511">http://git.postgresql.org/pg/commitdiff/d5d7d07765443175a49441bad7a799dedc072511</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix superuser concurrent refresh of matview owned by another. Use SECURITY_LOCAL_USERID_CHANGE while building temporary tables; only escalate to SECURITY_RESTRICTED_OPERATION while potentially running user-supplied code. The more secure mode was preventing temp table creation. Add regression tests to cover this problem. This fixes Bug #11208 reported by Bruno Emanuel de Andrade Silva. Backpatch to 9.4, where the bug was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9d0f1cff3fb10151be05be61d24ac9b680c170c">http://git.postgresql.org/pg/commitdiff/a9d0f1cff3fb10151be05be61d24ac9b680c170c</a></li>

<li>doc: Various typo/grammar fixes. Errors detected using Topy ( 

<a target="_blank" href="https://github.com/intgr/topy),">https://github.com/intgr/topy),</a> all changes verified by hand and some manual tweaks added. Marti Raudsepp Individual changes backpatched, where applicable, as far as 9.0. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05258761bf12a64befc9caec1947b254cdeb74c5">http://git.postgresql.org/pg/commitdiff/05258761bf12a64befc9caec1947b254cdeb74c5</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typo in b34e37bfefbed1bf9396dde18f308d8b96fd176c. Spotted by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9522ec3e707a93d25a99e477af76d7b186fe20de">http://git.postgresql.org/pg/commitdiff/9522ec3e707a93d25a99e477af76d7b186fe20de</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2d759341d97eb863477d6170a84c24ade570f567">http://git.postgresql.org/pg/commitdiff/2d759341d97eb863477d6170a84c24ade570f567</a></li>

<li>doc: Document valid checkpoint_timeout range. Author: Fabien COELHO &lt;coelho@cri.ensmp.fr&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e484bc4abccc03d49af25d32a5ffaecd3c6cf2d">http://git.postgresql.org/pg/commitdiff/8e484bc4abccc03d49af25d32a5ffaecd3c6cf2d</a></li>

<li>Assorted message improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65c9dc231a261691c76550f61f5b22f954dfcfd5">http://git.postgresql.org/pg/commitdiff/65c9dc231a261691c76550f61f5b22f954dfcfd5</a></li>

<li>doc: Revert ALTER TABLESPACE summary line. It was changed when ALTER TABLESPACE / MOVE was added but then not updated when that was moved back out. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14b7c8f2d062d50f2ad5d306c5cc26b7ec5cf11e">http://git.postgresql.org/pg/commitdiff/14b7c8f2d062d50f2ad5d306c5cc26b7ec5cf11e</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix Var handling for security barrier views. In some cases, not all Vars were being correctly marked as having been modified for updatable security barrier views, which resulted in invalid plans (eg: when security barrier views were created over top of inheiritance structures). In passing, be sure to update both varattno and varonattno, as _equalVar won't consider the Vars identical otherwise. This isn't known to cause any issues with updatable security barrier views, but was noticed as missing while working on RLS and makes sense to get fixed. Back-patch to 9.4 where updatable security barrier views were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e414ba93add966dfe03e22994764e718ed89ee98">http://git.postgresql.org/pg/commitdiff/e414ba93add966dfe03e22994764e718ed89ee98</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add header comments to receivelog.h and streamutil.h. This commit also adds the include guards to those header files. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a2d94892f6a793d52ebabb8283b98a6e3ede3d6">http://git.postgresql.org/pg/commitdiff/9a2d94892f6a793d52ebabb8283b98a6e3ede3d6</a></li>

<li>Revert "Allow units to be specified in relation option setting value." This reverts commit e23014f3d40f7d2c23bc97207fd28efbe5ba102b. As the side effect of the reverted commit, when the unit is specified, the reloption was stored in the catalog with the unit. This broke pg_dump (specifically, it prevented pg_dump from outputting restorable backup regarding the reloption) and turned the buildfarm red. Revert the commit until the fixed version is ready. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9df492664a74a948c87232f523eea637920a516b">http://git.postgresql.org/pg/commitdiff/9df492664a74a948c87232f523eea637920a516b</a></li>

<li>Allow units to be specified in relation option setting value. This introduces an infrastructure which allows us to specify the units like ms (milliseconds) in integer relation option, like GUC parameter. Currently only autovacuum_vacuum_cost_delay reloption can accept the units. Reviewed by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e23014f3d40f7d2c23bc97207fd28efbe5ba102b">http://git.postgresql.org/pg/commitdiff/e23014f3d40f7d2c23bc97207fd28efbe5ba102b</a></li>

</ul>

<p>Jeff Davis a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow multibyte characters as escape in SIMILAR TO and SUBSTRING. Previously, only a single-byte character was allowed as an escape. This patch allows it to be a multi-byte character, though it still must be a single character. Reviewed by Heikki Linnakangas and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8167a3883a3c49f2f77785f8e5f638920c9f14ef">http://git.postgresql.org/pg/commitdiff/8167a3883a3c49f2f77785f8e5f638920c9f14ef</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix citext upgrade script for disallowance of oidvector element assignment. In commit 45e02e3232ac7cc5ffe36f7986159b5e0b1f6fdc, we intentionally disallowed updates on individual elements of oidvector columns. While that still seems like a sane idea in the abstract, we (I) forgot that citext's "upgrade from unpackaged" script did in fact perform exactly such updates, in order to fix the problem that citext indexes should have a collation but would not in databases dumped or upgraded from pre-9.1 installations. Even if we wanted to add casts to allow such updates, there's no practical way to do so in the back branches, so the only real alternative is to make citext's kluge even klugier. In this patch, I cast the oidvector to text, fix its contents with regexp_replace, and cast back to oidvector. (Ugh!) Since the aforementioned commit went into all active branches, we have to fix this in all branches that contain the now-broken update script. Per report from Eric Malm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f7eec89b66947e4098773cf286653b9c4f01c88">http://git.postgresql.org/pg/commitdiff/7f7eec89b66947e4098773cf286653b9c4f01c88</a></li>

<li>Add min and max aggregates for inet/cidr data types. Haribabu Kommi, reviewed by Muhammad Asif Naeem 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c40f8316ed38a92049784b3e3d3b514ed379b5a">http://git.postgresql.org/pg/commitdiff/6c40f8316ed38a92049784b3e3d3b514ed379b5a</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Always use our getaddrinfo.c on Windows. Commit a16bac36eca8158cbf78987e95376f610095f792 let "configure" detect the system getaddrinfo() when building under 64-bit MinGW-w64. However, src/include/port/win32/sys/socket.h assumes all native Windows configurations use our replacement. This change placates buildfarm member jacana until we establish a plan for getaddrinfo() on Windows. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec544a65c9090bc9da11ea384d1369fd552ca8b0">http://git.postgresql.org/pg/commitdiff/ec544a65c9090bc9da11ea384d1369fd552ca8b0</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>SAWADA Masahiko sent in a WIP patch to add "-C (--concurrently)" option for reindexdb command for concurrently reindexing.</li>

<li>Andrew (RhodiumToad) Gierth sent in three more revisions of a patch to add GROUPING SETS and make necessary associated changes to the contrib code.</li>

<li>Andres Freund sent in a patch to add .NOTPARALLEL to contrib/Makefile.</li>

<li>Fujii Masao sent in another revision of a patch to specify the unit in storage parameters.</li>

<li>Thomas Munro sent in four more revisions of a patch to add SKIP LOCKED DATA.</li>

<li>Petr (PJMODOS) Jelinek and Tom Lane traded patches to add built-in binning functions.</li>

<li>Michael Paquier sent in another revision of a patch to ensure that pg_dump shows the schema name.</li>

<li>Alvaro Herrera sent in another revision of a patch to replicate DROP commands across servers.</li>

<li>Michael Paquier sent in another revision of a patch to implement REINDEX CONCURRENTLY.</li>

<li>Michael Paquier sent in two more revisions of a patch to add a missing comment block at the top of streamutil.h and receivelog.h.</li>

<li>David Rowley sent in another revision of a patch to support SEMI and ANTI join removal.</li>

<li>Tom Lane and Arthur Silva traded patches to fix a situation where JSONB's structure plays poorly with TOAST compression.</li>

<li>Fujii Masao sent in two more revisions of a patch to add a GUC for logging replication commands.</li>

<li>Andres Freund sent in two more revisions of a patch to make backend local tracking of buffer pins memory efficient.</li>

<li>Alvaro Herrera sent in a patch to introduce a "delay equivalent" to sort out some oddness in autovacuum cost calculations.</li>

<li>Kevin Grittner sent in two more revisions of a patch to implement delta relations, among other places, in AFTER triggers.</li>

<li>Fabien COELHO sent in six more revisions of a patch to implement a pgbench throttling latency limit.</li>

<li>Andres Freund and SAWADA Masahiko traded patches to add line number as an optional prompt in psql.</li>

<li>Joachim Wieland sent in another revision of a patch to refactor pg_dump to remove global variables.</li>

<li>Michael Paquier sent in another revision of a patch to add support for physical slot creation/deletion in pg_receivexlog.</li>

<li>Emre Hasegeli sent in three more revisions of a patch to add selectivity estimation for inet operators.</li>

<li>Michael Paquier sent in a patch to simplify calls of pg_class_aclcheck when multiple modes are used.</li>

<li>Fujii Masao and Amit Kapila traded patches to allow auditing logout.</li>

<li>Pavel Stehule and Andres Freund traded patches to give access to help_variables and usage from psql via psql command.</li>

<li>Peter Geoghegan sent in a patch to extend the INSERT statement, adding a new ON CONFLICT {UPDATE | IGNORE} clause.</li>

<li>Julien Rouhaud sent in another revision of a patch to track the number of files ready to be archived in pg_stat_archiver.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Heikki Linnakangas and Andres Freund traded patches to make the bgwriter do a better job of controlling latency.</li>

<li>Michael Paquier sent in another revision of a patch to enable support for N synchronous standby servers, N&gt;1.</li>

<li>Etsuro Fujita sent in another revision of a patch to implement INHERIT support for foreign tables.</li>

<li>Amit Kapila sent in another revision of a patch to permit scaling shared buffer eviction.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to fix some brokein code around socket emulation on win32.</li>

<li>Alvaro Herrera sent in another revision of a patch to create a better REINDEX syntax.</li>

<li>Etsuro Fujita sent in another revision of a patch to optimize updating foreign tables in the PostgreSQL FDW.</li>

<li>Alexey Klyukin sent in another revision of a patch to implement subject alternative names support for SSL connections.</li>

<li>Fujii Masao sent in a patch to fix an infelicity in psql's \watch vs. \timing.</li>

<li>Craig Ringer sent in a patch to allow distdir to be overridden on the "make" command line.</li>

<li>Ali Akbar sent in a patch to fix xpath() to return namespace definitions.</li>

<li>Amit Kapila sent in another revision of a patch to implement ALTER SYSTEM RESET.</li>

<li>Michael Paquier sent in two more revisions of a patch to fix a misleading error message in logical decoding for binary plugins.</li>

<li>Adam Brightwell sent in another revision of a patch to provide the capability to create multiple named row level security policies for a table on a per command basis and assign them to be applied to specific roles/users.</li>

<li>Ali Akbar sent in another revision of a patch to accept empty values as xml "content" values.</li>

<li>Peter Eisentraut sent in another revision of a patch to improve the speed of "make check-world".</li>

</ul>