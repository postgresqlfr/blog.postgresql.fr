---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 avril 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-04-23-nouvelles-hebdomadaires-de-postgresql-21-avril-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve GiST index search performance for trigram regex queries. The initial coding just descended the index if any of the target trigrams were possibly present at the next level down. But actually we can apply trigramsMatchGraph() so as to take advantage of AND requirements when there are some. The input data might contain false positive matches, but that can only result in a false positive result, not false negative, so it's safe to do it this way. Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/410bed2ab8c3864d7f34f9694d080adcaf446352">http://git.postgresql.org/pg/commitdiff/410bed2ab8c3864d7f34f9694d080adcaf446352</a></li>

<li>Don't try to pass -I switch to postmaster in contrib/start-scripts/linux. Undo thinko in commit 87306184580c9c49717b00d48a2f9e717f21e0a8. Per bug #8098 from Catherine Devlin. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3353583d7ecf7c9f8bc5966ed0a2537dec71ffdc">http://git.postgresql.org/pg/commitdiff/3353583d7ecf7c9f8bc5966ed0a2537dec71ffdc</a></li>

<li>Improve error message when an FDW doesn't support WHERE CURRENT OF. If an FDW fails to take special measures with a CurrentOfExpr, we will end up trying to execute it as an ordinary qual, which was being treated as a purely internal failure condition. Provide a more user-oriented error message for such cases. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e481ebff6368cb0ab5351a5ef3463747c35af22">http://git.postgresql.org/pg/commitdiff/6e481ebff6368cb0ab5351a5ef3463747c35af22</a></li>

<li>Fix longstanding race condition in plancache.c. When creating or manipulating a cached plan for a transaction control command (particularly ROLLBACK), we must not perform any catalog accesses, since we might be in an aborted transaction. However, plancache.c busily saved or examined the search_path for every cached plan. If we were unlucky enough to do this at a moment where the path's expansion into schema OIDs wasn't already cached, we'd do some catalog accesses; and with some more bad luck such as an ill-timed signal arrival, that could lead to crashes or Assert failures, as exhibited in bug #8095 from Nachiket Vaidya. Fortunately, there's no real need to consider the search path for such commands, so we can just skip the relevant steps when the subject statement is a TransactionStmt. This is somewhat related to bug #5269, though the failure happens during initial cached-plan creation rather than revalidation. This bug has been there since the plan cache was invented, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac63dca607e8e22247defbc8fe03b6baa3628c42">http://git.postgresql.org/pg/commitdiff/ac63dca607e8e22247defbc8fe03b6baa3628c42</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct handling of NULL arguments in json funcs. Per gripe from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/728ec9731fb0b3f2de8ce66a394b71c64930f445">http://git.postgresql.org/pg/commitdiff/728ec9731fb0b3f2de8ce66a394b71c64930f445</a></li>

<li>Mark json IO and extraction functions immutable. Per complaint from Hubert Depesz Lubaczewski. Catalog version bumped. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d788121aba3425b5d52fe20cc9facb6aca1294ce">http://git.postgresql.org/pg/commitdiff/d788121aba3425b5d52fe20cc9facb6aca1294ce</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix function return type confusion When parse_hba_line's return type was changed from bool to a pointer, the MANDATORY_AUTH_ARG macro wasn't adjusted. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c74d586d2fc8aeaa303d8c60a8a9d959fdc5e791">http://git.postgresql.org/pg/commitdiff/c74d586d2fc8aeaa303d8c60a8a9d959fdc5e791</a></li>

<li>doc: Update PQgetssl() documentation. The return type of PQgetssl() was changed from SSL* to void* a long time ago, but the documentation was not updated. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9bdaf3964a1fbd32e6140eb180dfa82ff1d8f23">http://git.postgresql.org/pg/commitdiff/b9bdaf3964a1fbd32e6140eb180dfa82ff1d8f23</a></li>

<li>Standardize spelling of "nonblocking". Only adjusted the user-exposed messages and documentation, not all source code comments. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acd5803053eb5ff6ad055ac1f7670625f1d111e0">http://git.postgresql.org/pg/commitdiff/acd5803053eb5ff6ad055ac1f7670625f1d111e0</a></li>

<li>Clean up references to SQL92. In most cases, these were just references to the SQL standard in general. In a few cases, a contrast was made between SQL92 and later standards -- those have been kept unchanged. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cc26ea9fe2e41e73c955ea75bea7a77fbd062d64">http://git.postgresql.org/pg/commitdiff/cc26ea9fe2e41e73c955ea75bea7a77fbd062d64</a></li>

<li>doc: Mention SATA alongside IDE for Linux. suggested by Jov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/540ec93e33c4eea7da502e8a4e76e5de4b994ac1">http://git.postgresql.org/pg/commitdiff/540ec93e33c4eea7da502e8a4e76e5de4b994ac1</a></li>

<li>doc: Fix syntax in example. LANGUAGE 'plpgsql' no longer works. The single quotes need to be removed. Erwin Brandstetter 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53ecfddcebbf607badc678e294bf977334b79327">http://git.postgresql.org/pg/commitdiff/53ecfddcebbf607badc678e294bf977334b79327</a></li>

<li>doc: Improve example formatting. Erwin Brandstetter 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e7d5ffe8ea9883f1b472036dfc098d555f5cd3ea">http://git.postgresql.org/pg/commitdiff/e7d5ffe8ea9883f1b472036dfc098d555f5cd3ea</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove some unused and seldom used fields from RelationAmInfo. This saves some memory from each index relcache entry. At least on a 64-bit machine, it saves just enough to shrink a typical relcache entry's memory usage from 2k to 1k. That's nice if you have a lot of backends and a lot of indexes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87ae9e72654ddddf25433b8a178e9268cf03f5b5">http://git.postgresql.org/pg/commitdiff/87ae9e72654ddddf25433b8a178e9268cf03f5b5</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pgindent: add newline to die() so script line number is not reported on failure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d61dddba37c27b1b5157b493bd04913c23ade7c2">http://git.postgresql.org/pg/commitdiff/d61dddba37c27b1b5157b493bd04913c23ade7c2</a></li>

<li>pg_upgrade: Add checksum C comment. We might eventually allow checksum to no-checksum upgrades. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5286963066ce7420d80882528b5f07c28f39eacf">http://git.postgresql.org/pg/commitdiff/5286963066ce7420d80882528b5f07c28f39eacf</a></li>

<li>Publish draft 9.3 release notes. No links added yet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9a35c2082e638c34567db1b5738f355475811d6">http://git.postgresql.org/pg/commitdiff/e9a35c2082e638c34567db1b5738f355475811d6</a></li>

<li>Reorder some 9.3 release item entries. More to go. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61b962345dd87276452922a5dbc21836266b43e0">http://git.postgresql.org/pg/commitdiff/61b962345dd87276452922a5dbc21836266b43e0</a></li>

<li>Fix Gilles Darold's name in 9.3 release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/488eb9055d3135268fdb401953f395885829d2f4">http://git.postgresql.org/pg/commitdiff/488eb9055d3135268fdb401953f395885829d2f4</a></li>

<li>Push 9.3 release SGML file. Forgotten in previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22f956f50cac33287daf76d79890057ba2fb3789">http://git.postgresql.org/pg/commitdiff/22f956f50cac33287daf76d79890057ba2fb3789</a></li>

<li>More 9.3 release note reorderings 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0922cbdcc54a11ea7eef955763aab4d540bf22f">http://git.postgresql.org/pg/commitdiff/f0922cbdcc54a11ea7eef955763aab4d540bf22f</a></li>

<li>Adjust 9.3 release notes per request from Simon Riggs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/864ec2f0cd5dd2ba5a7b40cc150cecb3010f739c">http://git.postgresql.org/pg/commitdiff/864ec2f0cd5dd2ba5a7b40cc150cecb3010f739c</a></li>

<li>9.3 release note fixes. Move commit_delay, fix Zoltan's name, and adjust range type histogram text. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ac96e6a8c2c5477344e78840e689e39e7b7b3cf1">http://git.postgresql.org/pg/commitdiff/ac96e6a8c2c5477344e78840e689e39e7b7b3cf1</a></li>

<li>Remove 9.3 item about fixing DROP INDEX CONCURRENTLY. Already fixed in back branch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f2236edd1876a8718453f7d4e8e7fdef378c91e">http://git.postgresql.org/pg/commitdiff/1f2236edd1876a8718453f7d4e8e7fdef378c91e</a></li>

<li>9.3 release note adjustments per request from Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4be535e2e44025975814937818c899fed7aafca3">http://git.postgresql.org/pg/commitdiff/4be535e2e44025975814937818c899fed7aafca3</a></li>

<li>Reorder 9.3 release note items. Typo fix from David Fetter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef3defcf0d507abb75d9e9696f11b44f4fc09291">http://git.postgresql.org/pg/commitdiff/ef3defcf0d507abb75d9e9696f11b44f4fc09291</a></li>

<li>In 9.3 release notes, split up items. Split log shipping speed improvement and fail-over speed improvement items. Per request from Simon Riggs 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c3ab4ea27d5e2cd341fc189eb413909f177d835e">http://git.postgresql.org/pg/commitdiff/c3ab4ea27d5e2cd341fc189eb413909f177d835e</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>sepgsql: One more getObjectIdentity in lieu of getObjectDescription. KaiGai Kohei, based on a suggestion from &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bf5c548d64b66b92197c6d8490b9b131ba02269">http://git.postgresql.org/pg/commitdiff/0bf5c548d64b66b92197c6d8490b9b131ba02269</a></li>

<li>sepgsql: Minor improvement to test script, doc fix. KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f050457978f4f8deb1ac850439bf7c46c818f4ae">http://git.postgresql.org/pg/commitdiff/f050457978f4f8deb1ac850439bf7c46c818f4ae</a></li>

<li>Fix typo in comment. Fabr&iacute;zio de Royes Mello 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4580a4bd2c858acf85c578609b8373d730a04534">http://git.postgresql.org/pg/commitdiff/4580a4bd2c858acf85c578609b8373d730a04534</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Colin 't Hart's patch to add \ns as a short cut for SET search_path in psql.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in three revisions of a patch to optimize COPY for some kinds of volatile expressions.</li>

<li>Bruce Momjian sent in a patch to reformat pg_test_fsync's output in a more compact way.</li>

<li>Robert Haas sent in a patch to prevent pg_restore from restoring into the pg_catalog schema by accident.</li>

<li>Ants Aasma sent in two more revisions of a patch to implement page checksums, including variously optimizable algorithms for same.</li>

<li>Fabr&iacute;zio de Royes Mello sent in two revisions of a patch to include currval() for discarding in DISCARD ALL.</li>

</ul>