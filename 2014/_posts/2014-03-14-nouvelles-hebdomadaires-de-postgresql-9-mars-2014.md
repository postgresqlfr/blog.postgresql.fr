---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 mars 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-03-14-nouvelles-hebdomadaires-de-postgresql-9-mars-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Another round of Coverity fixes. Additional non-security issues/improvements spotted by Coverity. In backend/libpq, no sense trying to protect against port-&gt;hba being NULL after we've already dereferenced it in the switch() statement. Prevent against possible overflow due to 32bit arithmitic in basebackup throttling (not yet released, so no security concern). Remove nonsensical check of array pointer against NULL in procarray.c, looks to be a holdover from 9.1 and earlier when there were pointers being used but now it's just an array. Remove pointer check-against-NULL in tsearch/spell.c as we had already dereferenced it above (in the strcmp()). Remove dead code from adt/orderedsetaggs.c, isnull is checked immediately after each tuplesort_getdatum() call and if true we return, so no point checking it again down at the bottom. Remove recently added minor error-condition memory leak in pg_regress. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5592ebac55460866da867df5c783c34e3c9a7cae">http://git.postgresql.org/pg/commitdiff/5592ebac55460866da867df5c783c34e3c9a7cae</a></li>

<li>Fix issues with pg_ctl. The new, small, free_readfile managed to have bug in it which could cause it to try and free something it shouldn't, and fix the case where it was being called with an invalid pointer leading to a segfault. Noted by Bruce Momjian, issues introduced and fixed by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb933162cdcbcaa5c56c75eb21b9c055af9748a0">http://git.postgresql.org/pg/commitdiff/eb933162cdcbcaa5c56c75eb21b9c055af9748a0</a></li>

<li>Allocate fresh memory for post_opts/exec_path. Instead of having read_post_opts() depend on the memory allocated for the config file (which is now getting free'd), pg_strdup() for post_opts and exec_path (similar to how it's being done elsewhere). Noted by Thom Brown. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dd917bb793b27f8c7616f0e64f9a119e8d98eb24">http://git.postgresql.org/pg/commitdiff/dd917bb793b27f8c7616f0e64f9a119e8d98eb24</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Define LSNOID in pg_type.h. Most other built-in types have a similarly-named constant, so this type should probably have one, too. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae95f5f74af74850e99632c61e67528ffcf92d3b">http://git.postgresql.org/pg/commitdiff/ae95f5f74af74850e99632c61e67528ffcf92d3b</a></li>

<li>pageinspect: Use new pg_lsn datatype. Michael Paquier, with slight comment changes by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45ffeb7e00576dc8b0544611f2a244540e9662c1">http://git.postgresql.org/pg/commitdiff/45ffeb7e00576dc8b0544611f2a244540e9662c1</a></li>

<li>Corrections to replication slots code and documentation. Andres Freund, per a report from Vik Faering 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d83ee62231d41092c7907166204d57edc3d57070">http://git.postgresql.org/pg/commitdiff/d83ee62231d41092c7907166204d57edc3d57070</a></li>

<li>Bump catversion. The previous patch should have entailed a catversion bump, but I forgot. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8e9b86b5e027a78ffeb738e207158424427e674">http://git.postgresql.org/pg/commitdiff/a8e9b86b5e027a78ffeb738e207158424427e674</a></li>

<li>Use a longer buffer in libpqrcv_startstreaming. Because of the new SLOT clause in the START_REPLICATION command, it's possible for the command to end up too long for the old maximum buffer length. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34c6d9611d23178539ed09b8f2ce40c5788a21cb">http://git.postgresql.org/pg/commitdiff/34c6d9611d23178539ed09b8f2ce40c5788a21cb</a></li>

<li>Introduce logical decoding. This feature, building on previous commits, allows the write-ahead log stream to be decoded into a series of logical changes; that is, inserts, updates, and deletes and the transactions which contain them. It is capable of handling decoding even across changes to the schema of the effected tables. The output format is controlled by a so-called "output plugin"; an example is included. To make use of this in a real replication system, the output plugin will need to be modified to produce output in the format appropriate to that system, and to perform filtering. Currently, information can be extracted from the logical decoding system only via SQL; future commits will add the ability to stream changes via walsender. Andres Freund, with review and other contributions from many other people, including &Aacute;lvaro Herrera, Abhijit Menon-Sen, Peter Gheogegan, Kevin Grittner, Robert Haas, Heikki Linnakangas, Fujii Masao, Abhijit Menon-Sen, Michael Paquier, Simon Riggs, Craig Ringer, and Steve Singer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b89e151054a05f0f6d356ca52e3b725dd0505e53">http://git.postgresql.org/pg/commitdiff/b89e151054a05f0f6d356ca52e3b725dd0505e53</a></li>

<li>Allow VACUUM FULL/CLUSTER to bump freeze horizons even for pg_class. pg_class is a special case for CLUSTER and VACUUM FULL, so although commit 3cff1879f8d03cb729368722ca823a4bf74c0cac caused these operations to advance relfrozenxid and relminmxid for all other tables, it did not provide the same benefit for pg_class. This plugs that gap. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af2543e884db06c0beb75010218cd88680203b86">http://git.postgresql.org/pg/commitdiff/af2543e884db06c0beb75010218cd88680203b86</a></li>

<li>Minor corrections to logical decoding patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e8db2dc420099df3fa73987cf2d2d6d1a609d86">http://git.postgresql.org/pg/commitdiff/7e8db2dc420099df3fa73987cf2d2d6d1a609d86</a></li>

<li>Fix test_decoding regression test outputs. Commit 6f37c08057685ee3c6c63222dba0dac012760dde removed whitespace from the SQL file but not the expected-output file, and commit 7e8db2dc420099df3fa73987cf2d2d6d1a609d86 changed the error message without updating the expected outputs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/97e899e1b85c7e42ab29cd09fc91cf57760bc1cb">http://git.postgresql.org/pg/commitdiff/97e899e1b85c7e42ab29cd09fc91cf57760bc1cb</a></li>

<li>Fix some typos introduced by the logical decoding patch. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/406a1a9ef0beb0a7e3f58805ab2d3140e2202deb">http://git.postgresql.org/pg/commitdiff/406a1a9ef0beb0a7e3f58805ab2d3140e2202deb</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_dump, et al: Add --if-exists option This option makes pg_dump, pg_dumpall and pg_restore inject an IF EXISTS clause to each DROP command they emit. (In pg_dumpall, the clause is not added to individual objects drops, but rather to the CREATE DATABASE commands, as well as CREATE ROLE and CREATE TABLESPACE.) This allows for a better user dump experience when using --clean in case some objects do not already exist. Per bug #7873 by Dave Rolsky. Author: Pavel St&#283;hule Reviewed-by: Jeevan Chalke, &Aacute;lvaro Herrera, Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9067310cc5dd590e36c2c3219dbf3961d7c9f8cb">http://git.postgresql.org/pg/commitdiff/9067310cc5dd590e36c2c3219dbf3961d7c9f8cb</a></li>

<li>Constructors for interval, timestamp, timestamptz. Author: Pavel St&#283;hule, editorialized somewhat by &Aacute;lvaro Herrera Reviewed-by: Tom&aacute;&scaron; Vondra, Marko Tiikkaja With input from Fabr&iacute;zio de Royes Mello, Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/84df54b22e8035addc7108abd9ff6995e8c49264">http://git.postgresql.org/pg/commitdiff/84df54b22e8035addc7108abd9ff6995e8c49264</a></li>

<li>auto_explain: Add logging of trigger execution. Author: Kyotaro HORIGUCHI Reviewed-by: Jaime Casanova 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2a0fc5363e293d29053d0582a1009bc9fef0276">http://git.postgresql.org/pg/commitdiff/e2a0fc5363e293d29053d0582a1009bc9fef0276</a></li>

<li>Remove the correct pgstat file on DROP DATABASE. We were unlinking the permanent file, not the non-permanent one. But since the stat collector already unlinks all permanent files on startup, there was nothing for it to unlink. The non-permanent file remained in place, and was copied to the permanent directory on shutdown, so in effect no file was ever dropped. Backpatch to 9.3, where the issue was introduced by commit 187492b6c2e8. Before that, there were no per-database files and thus no file to drop on DROP DATABASE. Per report from Thom Brown. Author: Tom&aacute;&scaron; Vondra 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b4f2ab33dea09e47b93a2eb4be05aa4d40b49ee">http://git.postgresql.org/pg/commitdiff/2b4f2ab33dea09e47b93a2eb4be05aa4d40b49ee</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de94b47c0a92faeddab5ac980449d3fa877b4a4f">http://git.postgresql.org/pg/commitdiff/de94b47c0a92faeddab5ac980449d3fa877b4a4f</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f37c08057685ee3c6c63222dba0dac012760dde">http://git.postgresql.org/pg/commitdiff/6f37c08057685ee3c6c63222dba0dac012760dde</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rename huge_tlb_pages to huge_pages, and improve docs. Christian Kruse 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f8ce16d0d2645f3e223b1a68cd8f6b2fa3d56627">http://git.postgresql.org/pg/commitdiff/f8ce16d0d2645f3e223b1a68cd8f6b2fa3d56627</a></li>

<li>Error out on send failure in walsender loop. I changed the loop in 9.3 to use "goto send_failure" instead of "break" on errors, but I missed this one case. It was a relatively harmless bug: if the flush fails once it will most likely fail again as soon as we try to flush the output again. But it's a bug nevertheless. Report and fix by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7558cc95d31edbf1437321d910562494071c5589">http://git.postgresql.org/pg/commitdiff/7558cc95d31edbf1437321d910562494071c5589</a></li>

<li>Fix lastReplayedEndRecPtr calculation when starting from shutdown checkpoint. When entering crash recovery followed by archive recovery, and the latest checkpoint is a shutdown checkpoint, and there are no more WAL records to replay before transitioning from crash to archive recovery, we would not immediately allow read-only connections in hot standby mode even if we could. That's because when starting from a shutdown checkpoint, we set lastReplayedEndRecPtr incorrectly to the record before the checkpoint record, instead of the checkpoint record itself. We don't run the redo routine of the shutdown checkpoint record, but starting recovery from it goes through the same motions, so it should be considered as replayed. Reported by Kyotaro HORIGUCHI. All versions with hot standby are affected, so backpatch to 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af246c37c056e3b16be04e899e94e3a100f3918e">http://git.postgresql.org/pg/commitdiff/af246c37c056e3b16be04e899e94e3a100f3918e</a></li>

<li>Do wal_level and hot standby checks when doing crash-then-archive recovery. CheckRequiredParameterValues() should perform the checks if archive recovery was requested, even if we are going to perform crash recovery first. Reported by Kyotaro HORIGUCHI. Backpatch to 9.2, like the crash-then-archive recovery mode. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/956685f82b6983ff17e6a39bd386b11f554715a8">http://git.postgresql.org/pg/commitdiff/956685f82b6983ff17e6a39bd386b11f554715a8</a></li>

<li>isdigit() needs an unsigned char argument. Per the C standard, the routine should be passed an int, with a value that's representable as an unsigned char or EOF. Passing a signed char is wrong, because a negative value is not representable as an unsigned char. Unfortunately no compiler warns about that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a0c2fa9b5cfaf9595e8809a68eec929a5052834e">http://git.postgresql.org/pg/commitdiff/a0c2fa9b5cfaf9595e8809a68eec929a5052834e</a></li>

<li>Send keepalives from walsender even when busy sending WAL. If walsender doesn't hear from the client for the time specified by wal_sender_timeout, it will conclude the connection or client is dead, and disconnect. When half of wal_sender_timeout has elapsed, it sends a ping to the client, leaving it the remainig half of wal_sender_timeout to respond. However, it only checked if half of wal_sender_timeout had elapsed when it was about to sleep, so if it was busy sending WAL to the client for long enough, it would not send the ping request in time. Then the client would not know it needs to send a reply, and the walsender will disconnect even though the client is still alive. Fix that. Andres Freund, reviewed by Robert Haas, and some further changes by me. Backpatch to 9.3. Earlier versions relied on the client to send the keepalives on its own, and hence didn't have this problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/94ae6ba74dfc626efa271461902db1be35d2a551">http://git.postgresql.org/pg/commitdiff/94ae6ba74dfc626efa271461902db1be35d2a551</a></li>

<li>Fix name of syslog_ident GUC in docs. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b8483d69d1be9700abae0dc7c48c5b7edb77498">http://git.postgresql.org/pg/commitdiff/2b8483d69d1be9700abae0dc7c48c5b7edb77498</a></li>

<li>Fix dangling smgr_owner pointer when a fake relcache entry is freed. A fake relcache entry can "own" a SmgrRelation object, like a regular relcache entry. But when it was free'd, the owner field in SmgrRelation was not cleared, so it was left pointing to free'd memory. Amazingly this apparently hasn't caused crashes in practice, or we would've heard about it earlier. Andres found this with Valgrind. Report and fix by Andres Freund, with minor modifications by me. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55566c9a740144439b54ff3aacbd43d11b6de52f">http://git.postgresql.org/pg/commitdiff/55566c9a740144439b54ff3aacbd43d11b6de52f</a></li>

<li>Avoid memcpy() with same source and destination address. The behavior of that is undefined, although unlikely to lead to problems in practice. Found by running regression tests with Valgrind. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad7b48ea08d6c33bae0a33c5f2a06272293c0f2f">http://git.postgresql.org/pg/commitdiff/ad7b48ea08d6c33bae0a33c5f2a06272293c0f2f</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Provide a FORCE NULL option to COPY in CSV mode. This forces an input field containing the quoted null string to be returned as a NULL. Without this option, only unquoted null strings behave this way. This helps where some CSV producers insist on quoting every field, whether or not it is needed. The option takes a list of fields, and only applies to those columns. There is an equivalent column-level option added to file_fdw. Ian Barwick, with some tweaking by Andrew Dunstan, reviewed by Payal Singh. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b5e03dca2afea7a2c12dbc8605175d0568b5555">http://git.postgresql.org/pg/commitdiff/3b5e03dca2afea7a2c12dbc8605175d0568b5555</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: improve C comment about what old/new oids match 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65b96714118d3919195d2dd47e8d2df23718c7ab">http://git.postgresql.org/pg/commitdiff/65b96714118d3919195d2dd47e8d2df23718c7ab</a></li>

<li>pg_dump: make argument combination error exit code consistent. Per report from Pavel Golub 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b44fc39fcecf58c1c93a322d71be2faee525853f">http://git.postgresql.org/pg/commitdiff/b44fc39fcecf58c1c93a322d71be2faee525853f</a></li>

<li>docs: to_timestamp and to_date do minimal range checking. Initial patch from Steve Crawford 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e2224faf17abb6b3cde0af33346835cc013fb1c0">http://git.postgresql.org/pg/commitdiff/e2224faf17abb6b3cde0af33346835cc013fb1c0</a></li>

<li>C comment update: relfilenode is only unique with a tablespace. Report from Antonin Houska 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0024a3a3b6cfdca9d5c00f8ac5d5809f2e7ec3a5">http://git.postgresql.org/pg/commitdiff/0024a3a3b6cfdca9d5c00f8ac5d5809f2e7ec3a5</a></li>

<li>Fix ReplicationSlotsCountDBSlots for dropping unrelated databases. YAMAMOTO Takashi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91d9de97518b26a1e0d601b2c1580f5225030e56">http://git.postgresql.org/pg/commitdiff/91d9de97518b26a1e0d601b2c1580f5225030e56</a></li>

<li>release notes: add item missed in 9.2.5 release. Item is "Prevent errors in WAL replay due to references to uninitialized empty pages". Report and text by Andres Freund Backpatch through 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4ea2e2d47449dac509327c2c0c4b22223bfe3faa">http://git.postgresql.org/pg/commitdiff/4ea2e2d47449dac509327c2c0c4b22223bfe3faa</a></li>

<li>docs: improve TABLE command by showing supported clauses. Initial patch by Colin 't Hart 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0cb40f93a85fd15e930828d9336e9f999ca3224">http://git.postgresql.org/pg/commitdiff/b0cb40f93a85fd15e930828d9336e9f999ca3224</a></li>

<li>doc: improve server's keepalive description. Use superior libpq keepalive description for the server-level parameters. Per report by Tatsuo Ishii and Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea43af38dc90d1656e67d7fbdbc809385c380435">http://git.postgresql.org/pg/commitdiff/ea43af38dc90d1656e67d7fbdbc809385c380435</a></li>

<li>pg_upgrade: document delete problems with tablespaces inside the cluster directory. Per report by Marc Mamin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8879fa09ee7aa6232097198b66c3376184b0de06">http://git.postgresql.org/pg/commitdiff/8879fa09ee7aa6232097198b66c3376184b0de06</a></li>

<li>docs: small adjustements to recent SELECT and pg_upgrade improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3624acd342d7b5ad6bb07730b8bac5ed5874fc23">http://git.postgresql.org/pg/commitdiff/3624acd342d7b5ad6bb07730b8bac5ed5874fc23</a></li>

<li>pg_ctl: improve handling of invalid data directory. Return '4' and report a meaningful error message when a non-existent or invalid data directory is passed. Previously, pg_ctl would just report the server was not running. Patch by me and Amit Kapila Report from Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11d205e2bd66cefe0b7d69c02e831cd055cbb5bb">http://git.postgresql.org/pg/commitdiff/11d205e2bd66cefe0b7d69c02e831cd055cbb5bb</a></li>

<li>C comments: improve description of relfilenode uniqueness. Report by Antonin Houska 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5024044a204ea4158c9223b28a31f60afc1e759f">http://git.postgresql.org/pg/commitdiff/5024044a204ea4158c9223b28a31f60afc1e759f</a></li>

<li>doc: remove extra whitespace in SGML markup 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/19026aadd82a18f86252415c9d2adeeaa1377b7d">http://git.postgresql.org/pg/commitdiff/19026aadd82a18f86252415c9d2adeeaa1377b7d</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove unused field "evttype". Apparent oversight in commit 3855968f. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/114b26c06fb93d74afd6993d4be49b5b3e960979">http://git.postgresql.org/pg/commitdiff/114b26c06fb93d74afd6993d4be49b5b3e960979</a></li>

<li>Add comment that ec_relids excludes "child" EquivalenceClass members. This was already documented a few lines further down, but the comment just beside the field declaration could be misleading. Per gripe from Kyotaro Horiguchi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cf0ad1ea38db3e16ac04b408168df4c937862e6">http://git.postgresql.org/pg/commitdiff/8cf0ad1ea38db3e16ac04b408168df4c937862e6</a></li>

<li>Fix portability issues in recently added make_timestamp/make_interval code. Explicitly reject infinity/NaN inputs, rather than just assuming that something else will do it for us. Per buildfarm. While at it, make some over-parenthesized and under-legible code more readable. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1ba94bcd9717b94b36868d6905547e313f3a359">http://git.postgresql.org/pg/commitdiff/f1ba94bcd9717b94b36868d6905547e313f3a359</a></li>

<li>Don't reject ROW_MARK_REFERENCE rowmarks for materialized views. We should allow this so that matviews can be referenced in UPDATE/DELETE statements in READ COMMITTED isolation level. The requirement for that is that a re-fetch by TID will see the same row version the query saw earlier, which is true of matviews, so there's no reason for the restriction. Per bug #9398. Michael Paquier, after a suggestion by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf4052faa1c289883799d49f063715161a8a4f1e">http://git.postgresql.org/pg/commitdiff/bf4052faa1c289883799d49f063715161a8a4f1e</a></li>

<li>Avoid getting more than AccessShareLock when deparsing a query. In make_ruledef and get_query_def, we have long used AcquireRewriteLocks to ensure that the querytree we are about to deparse is up-to-date and the schemas of the underlying relations aren't changing. Howwever, that function thinks the query is about to be executed, so it acquires locks that are stronger than necessary for the purpose of deparsing. Thus for example, if pg_dump asks to deparse a rule that includes "INSERT INTO t", we'd acquire RowExclusiveLock on t. That results in interference with concurrent transactions that might for example ask for ShareLock on t. Since pg_dump is documented as being purely read-only, this is unexpected. (Worse, it used to actually be read-only; this behavior dates back only to 8.1, cf commit ba4200246.) Fix this by adding a parameter to AcquireRewriteLocks to tell it whether we want the "real" execution locks or only AccessShareLock. Report, diagnosis, and patch by Dean Rasheed. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c31874945120c0a263c5d0fe15ab362e6e5c99d">http://git.postgresql.org/pg/commitdiff/7c31874945120c0a263c5d0fe15ab362e6e5c99d</a></li>

<li>Fix contrib/postgres_fdw to handle multiple join conditions properly. The previous coding supposed that it could consider just a single join condition in any one parameterized path for the foreign table. But in reality, the parameterized-path machinery forces all join clauses that are "movable to" the foreign table to be evaluated at that node; including clauses that we might not consider safe to send across. Such cases would result in an Assert failure in an assert-enabled build, and otherwise in sending an unsafe clause to the foreign server, which might result in errors or silently-wrong answers. A lesser problem was that the cost/rowcount estimates generated for the parameterized path failed to account for any additional join quals that get assigned to the scan. To fix, rewrite postgresGetForeignPaths so that it correctly collects all the movable quals for any one outer relation when generating parameterized paths; we'll now generate just one path per outer relation not one per join qual. Also fix bogus assumptions in postgresGetForeignPlan and estimate_path_cost_size that only safe-to-send join quals will be presented. Based on complaint from Etsuro Fujita that the path costs were being miscalculated, though this is significantly different from his proposed patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83204e100c7855a50ccffd761bcd45474955b5fb">http://git.postgresql.org/pg/commitdiff/83204e100c7855a50ccffd761bcd45474955b5fb</a></li>

<li>Remove unportable use of anonymous unions from reorderbuffer.h. In b89e151054a I had assumed it was ok to use anonymous unions as struct members, but while a longstanding extension in many compilers, it's only been standardized in C11. To fix, remove one of the anonymous unions which tried to hide some implementation specific enum values and give the other a name. The latter unfortunately requires changes in output plugins, but since the feature has only been added a few days ago... Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea177a3ba7a7901f6467eadb0a407e03d46462fd">http://git.postgresql.org/pg/commitdiff/ea177a3ba7a7901f6467eadb0a407e03d46462fd</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct copy/pasto in comment for REPLICA IDENTITY 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77049443a1794bc5222aabb051476367fe347202">http://git.postgresql.org/pg/commitdiff/77049443a1794bc5222aabb051476367fe347202</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in another revision of a patch to reduce the amount of WAL written during update operations.</li>

<li>Kaigai Kouhei sent in three more revisions of a patch to implement custom scans.</li>

<li>Andres Freund sent in another flock of patches for logical changesets.</li>

<li>Florian Pflug sent in another revision of a patch to implement inverse transition functions for aggregates.</li>

<li>SIMON Riggs sent in a patch to fix the locking in pg_dump to lower (but still safe) levels.</li>

<li>Simon Riggs sent in two more revisions of a patch to reduce the lock level needed for ALTER TABLE.</li>

<li>Pavel Raiskup sent in a patch to allow multiple -o/-O options to pg_upgrade.</li>

<li>Erik Rijkers sent in a patch to fix typos in decode.</li>

<li>Andres Freund sent in a patch to fix an assertion failure in pg_dump.</li>

<li>Michael Paquier sent in three revisions of a patch to fix the FORCE NULL option for CSV format COPY.</li>

<li>Bruce Momjian and Amit Kapila traded patches to fix an issue when pg_ctl encounters a nonexistent directory.</li>

<li>Mitsumasa KONDO sent in another revision of a patch to patch to allow using Gaussian distributions in pgbench.</li>

<li>Heikki Linnakangas sent in another revision of a patch to fix an issue with memory ordering in LWLockRelease, WakeupWaiters, and WALInsertSlotRelease.</li>

<li>Mart&iacute;n Marqu&eacute;s sent in two revisions of a patch to fix the regression tests for hot standbys.</li>

<li>Emre Hasegeli sent in another revision of a patch to add GiST indexing support for inet datatypes.</li>

<li>Bruce Momjian sent in a patch to change PQconndefaults() to ignore invalid service files.</li>

<li>Tomonari Katsumata sent in two revisions of a patch to clarify what client_min_messages means.</li>

<li>Jing Wang sent in a patch to issue a log message to suggest VACUUM FULL if a table is nearly empty.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to use indexes in the case of UNION ALL on partitioned tables.</li>

</ul>