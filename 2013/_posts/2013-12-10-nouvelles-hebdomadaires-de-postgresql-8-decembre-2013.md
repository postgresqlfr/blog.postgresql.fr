---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 décembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-12-10-nouvelles-hebdomadaires-de-postgresql-8-decembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid out-of-bounds read in errfinish if error_stack_depth &lt; 0. If errordata_stack_depth &lt; 0, we won't find that out and correct the problem until CHECK_STACK_DEPTH() is invoked. In the meantime, elevel will be set based on an invalid read. This is probably harmless in practice, but it seems cleaner this way. Xi Wang 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d140f7be2836e3baf6c9dc7989dea69ef693532">http://git.postgresql.org/pg/commitdiff/9d140f7be2836e3baf6c9dc7989dea69ef693532</a></li>

<li>Make NUM_TOCHAR_prepare and NUM_TOCHAR_finish macros declare "len". Remove the variable from the enclosing scopes so that nothing can be relying on it. The net result of this refactoring is that we get rid of a few unnecessary strlen() calls. Original patch from Greg Jaskiewicz, substantially expanded by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a8656a3ab02db5b1de0d696dc8cf588efe7c1341">http://git.postgresql.org/pg/commitdiff/a8656a3ab02db5b1de0d696dc8cf588efe7c1341</a></li>

<li>Flag mmap implemenation of dynamic shared memory as resize-capable. Error noted by Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6d4b1dd3e9eabca68caea6256ed8bc58dfa0917">http://git.postgresql.org/pg/commitdiff/c6d4b1dd3e9eabca68caea6256ed8bc58dfa0917</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Increase git_changelog's timestamp_slop from 10 min to 1 day. Many committers seem to now be using a work flow in which back-patched commits are timestamped minutes or even hours apart in different branches (most likely because they commit in one branch before starting work on the next one). git_changelog was failing to merge its reports in such cases, so increase the max time it's willing to merge commits across. I considered getting rid of the limit altogether, but that produces some odd results in terms of how the merged commit gets sorted relative to unrelated commits. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7a1e34d3713c13b3b2c81f0410a6629362b37b00">http://git.postgresql.org/pg/commitdiff/7a1e34d3713c13b3b2c81f0410a6629362b37b00</a></li>

<li>Improve draft release notes. Per suggestions from Andres Freund. Also fix spelling of Sergey Burladyan's name. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b8b7b723f29e39769486545aef61d71edcadff80">http://git.postgresql.org/pg/commitdiff/b8b7b723f29e39769486545aef61d71edcadff80</a></li>

<li>Update release notes for 9.3.2, 9.2.6, 9.1.11, 9.0.15, 8.4.19. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02bb4bbc66ce2ce7ebfcb27a8a9e002ed9cadd2a">http://git.postgresql.org/pg/commitdiff/02bb4bbc66ce2ce7ebfcb27a8a9e002ed9cadd2a</a></li>

<li>Fix crash in assign_collations_walker for EXISTS with empty SELECT list. We (I think I, actually) forgot about this corner case while coding collation resolution. Per bug #8648 from Arjen Nienhuis. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7ab321404c4f721a22e86f36f68fe5e94f65e54d">http://git.postgresql.org/pg/commitdiff/7ab321404c4f721a22e86f36f68fe5e94f65e54d</a></li>

<li>Clear retry flags properly in replacement OpenSSL sock_write function. Current OpenSSL code includes a BIO_clear_retry_flags() step in the sock_write() function. Either we failed to copy the code correctly, or they added this since we copied it. In any case, lack of the clear step appears to be the cause of the server lockup after connection loss reported in bug #8647 from Valentine Gogichashvili. Assume that this is correct coding for all OpenSSL versions, and hence back-patch to all supported branches. Diagnosis and patch by Alexander Kukushkin. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74242c23c1c6428c6da09fa37264c7f4f1438738">http://git.postgresql.org/pg/commitdiff/74242c23c1c6428c6da09fa37264c7f4f1438738</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: update wording of ineffective SET and ABORT commands. Wording by Alvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54916b99f7e97aa6e32a4f265527f7517539d802">http://git.postgresql.org/pg/commitdiff/54916b99f7e97aa6e32a4f265527f7517539d802</a></li>

<li>Update C comment for pg_fe_getauthname. This function no longer takes an argument. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a6b7bbb81cd21d0f9aa70b850b791b61fb7e03d">http://git.postgresql.org/pg/commitdiff/6a6b7bbb81cd21d0f9aa70b850b791b61fb7e03d</a></li>

<li>C comment: again update comment for pg_fe_sendauth for error cases 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a8adfd4d09c7885daf548ecd53d4999f168a174">http://git.postgresql.org/pg/commitdiff/4a8adfd4d09c7885daf548ecd53d4999f168a174</a></li>

<li>libpq: change PQconndefaults() to ignore invalid service files. Previously missing or invalid service files returned NULL. Also fix pg_upgrade to report "out of memory" for a null return from PQconndefaults(). Patch by Steve Singer, rewritten by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e0a97f1c8316e36fa4a8626e0a60792b0fb0c2e">http://git.postgresql.org/pg/commitdiff/9e0a97f1c8316e36fa4a8626e0a60792b0fb0c2e</a></li>

<li>doc: split long query into multiple lines. Report from Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5043fc8251fa272177c69b86a8df2cb79d926521">http://git.postgresql.org/pg/commitdiff/5043fc8251fa272177c69b86a8df2cb79d926521</a></li>

<li>build: pass EXTRA_REGRESS_OPTS to secondary regression tests. Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86ef4796f5120c55d1a48cfab52e51df8ed271b5">http://git.postgresql.org/pg/commitdiff/86ef4796f5120c55d1a48cfab52e51df8ed271b5</a></li>

<li>docs: clarify SSL certificate authority chain docs. Previously, the requirements of how intermediate certificates were handled and their chain to root certificates was unclear. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa4add50c4ea97c48881fa8cb3863df80141643c">http://git.postgresql.org/pg/commitdiff/fa4add50c4ea97c48881fa8cb3863df80141643c</a></li>

<li>docs: update partition encryption options. Text from Adam Vande More 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fe3d90d34c26083e9856cb134dfe17a5f6999aa">http://git.postgresql.org/pg/commitdiff/8fe3d90d34c26083e9856cb134dfe17a5f6999aa</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Refine documentation about recovery command exist status. Add more documentation about how different exit codes and signals are handled in each case. Reviewed-by: Peter Geoghegan &lt;pg@heroku.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/95e3d50539afcdcd4b75b4ac5baa9f8fc05324d9">http://git.postgresql.org/pg/commitdiff/95e3d50539afcdcd4b75b4ac5baa9f8fc05324d9</a></li>

<li>Report exit code from external recovery commands properly. When an external recovery command such as restore_command or archive_cleanup_command fails, report the exit code properly, distinguishing signals and normal exists, using the existing wait_result_to_str() facility, instead of just reporting the return value from system(). Reviewed-by: Peter Geoghegan &lt;pg@heroku.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fef88b3fdaa3537c64e3d7df9261bc75ece80d3f">http://git.postgresql.org/pg/commitdiff/fef88b3fdaa3537c64e3d7df9261bc75ece80d3f</a></li>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dfd5151c5800448a2be521797f95e1aa63d87b67">http://git.postgresql.org/pg/commitdiff/dfd5151c5800448a2be521797f95e1aa63d87b67</a></li>

<li>SSL: Add configuration option to prefer server cipher order. By default, OpenSSL (and SSL/TLS in general) lets the client cipher order take priority. This is OK for browsers where the ciphers were tuned, but few PostgreSQL client libraries make the cipher order configurable. So it makes sense to have the cipher order in postgresql.conf take priority over client defaults. This patch adds the setting "ssl_prefer_server_ciphers" that can be turned on so that server cipher order is preferred. Per discussion, this now defaults to on. From: Marko Kreen &lt;markokr@gmail.com&gt; Reviewed-by: Adrian Klaver &lt;adrian.klaver@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef3267523d1ecf53bb6d4ffbeb6a0ae1af84ed47">http://git.postgresql.org/pg/commitdiff/ef3267523d1ecf53bb6d4ffbeb6a0ae1af84ed47</a></li>

<li>SSL: Support ECDH key exchange. This sets up ECDH key exchange, when compiling against OpenSSL that supports Emmanuel Cecchet. Then the ECDHE-RSA and ECDHE-ECDSA cipher suites can be used for SSL connections. The latter one means that Emmanuel Cecchet keys are now usable. The reason for Emmanuel Cecchet key exchange is that it's faster than DHE and it allows to go to higher security levels where RSA will be horribly slow. There is also new GUC option ssl_ecdh_curve that specifies the curve name used for ECDH. It defaults to "prime256v1", which is the most common curve in use in HTTPS. From: Marko Kreen &lt;markokr@gmail.com&gt; Reviewed-by: Adrian Klaver &lt;adrian.klaver@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3164721462d547fa2d15e2a2f07eb086a3590fd5">http://git.postgresql.org/pg/commitdiff/3164721462d547fa2d15e2a2f07eb086a3590fd5</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix full-page writes of internal GIN pages. Insertion to a non-leaf GIN page didn't make a full-page image of the page, which is wrong. The code used to do it correctly, but was changed (commit 853d1c3103fa961ae6219f0281885b345593d101) because the redo-routine didn't track incomplete splits correctly when the page was restored from a full page image. Of course, that was not right way to fix it, the redo routine should've been fixed instead. The redo-routine was surreptitiously fixed in 2010 (commit 4016bdef8aded77b4903c457050622a5a1815c16), so all we need to do now is revert the code that creates the record to its original form. This doesn't change the format of the WAL record. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22122c83f1331d03e8317afbfcfbb65bef9c82d2">http://git.postgresql.org/pg/commitdiff/22122c83f1331d03e8317afbfcfbb65bef9c82d2</a></li>

<li>Don't include unused space in LOG_NEWPAGE records. This is the same trick we use when taking a full page image of a buffer passed to XLogInsert. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e857436ef7dff8fb8a0bf43cfe62650e2be6be9">http://git.postgresql.org/pg/commitdiff/9e857436ef7dff8fb8a0bf43cfe62650e2be6be9</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid resetting Xmax when it's a multi with an aborted. update HeapTupleSatisfiesUpdate can very easily "forget" tuple locks while checking the contents of a multixact and finding it contains an aborted update, by setting the HEAP_XMAX_INVALID bit. This would lead to concurrent transactions not noticing any previous locks held by transactions that might still be running, and thus being able to acquire subsequent locks they wouldn't be normally able to acquire. This bug was introduced in commit 1ce150b7bb; backpatch this fix to 9.3, like that commit. This change reverts the change to the delete-abort-savept isolation test in 1ce150b7bb, because that behavior change was caused by this bug. Noticed by Andres Freund while investigating a different issue reported by Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07aeb1fec571920839822c11851d38ef48952d6c">http://git.postgresql.org/pg/commitdiff/07aeb1fec571920839822c11851d38ef48952d6c</a></li>

<li>Fix improper abort during update chain locking. In 247c76a98909, I added some code to do fine-grained checking of MultiXact status of locking/updating transactions when traversing an update chain. There was a thinko in that patch which would have the traversing abort, that is return HeapTupleUpdated, when the other transaction is a committed lock-only. In this case we should ignore it and return success instead. Of course, in the case where there is a committed update, HeapTupleUpdated is the correct return value. A user-visible symptom of this bug is that in REPEATABLE READ and SERIALIZABLE transaction isolation modes spurious serializability errors can occur: ERROR: could not serialize access due to concurrent update In order for this to happen, there needs to be a tuple that's key-share- locked and also updated, and the update must abort; a subsequent transaction trying to acquire a new lock on that tuple would abort with the above error. The reason is that the initial FOR KEY SHARE is seen as committed by the new locking transaction, which triggers this bug. (If the UPDATE commits, then the serialization error is correctly reported.) When running a query in READ COMMITTED mode, what happens is that the locking is aborted by the HeapTupleUpdated return value, then EvalPlanQual fetches the newest version of the tuple, which is then the only version that gets locked. (The second time the tuple is checked there is no misbehavior on the committed lock-only, because it's not checked by the code that traverses update chains; so no bug.) Only the newest version of the tuple is locked, not older ones, but this is harmless. The isolation test added by this commit illustrates the desired behavior, including the proper serialization errors that get thrown. Backpatch to 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/312bde3d404f770943c992992565c73f0336d21b">http://git.postgresql.org/pg/commitdiff/312bde3d404f770943c992992565c73f0336d21b</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Expose qurey ID in pg_stat_statements view. The query ID is the internal hash identifier of the statement, and was not available in pg_stat_statements view so far. Daniel Farina, Sameer Thakur and Peter Geoghegan, reviewed by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91484409bdd17f330d10671d388b72d4ef1451d7">http://git.postgresql.org/pg/commitdiff/91484409bdd17f330d10671d388b72d4ef1451d7</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a couple of typos. Noted by Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54aa5ef7f2dbe979843daf0c7a0d98f6709da4e6">http://git.postgresql.org/pg/commitdiff/54aa5ef7f2dbe979843daf0c7a0d98f6709da4e6</a></li>

<li>Fix pg_stat_statements build on 32-bit systems. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33d3f5594ac0cc4b6df3bf29b39db93bc32f1213">http://git.postgresql.org/pg/commitdiff/33d3f5594ac0cc4b6df3bf29b39db93bc32f1213</a></li>

</ul>

<p>Joe Conway a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix performance regression in dblink connection speed. Previous commit e5de601267d98c5d60df6de8d436685c7105d149 modified dblink to ensure client encoding matched the server. However the added PQsetClientEncoding() call added significant overhead. Restore original performance in the common case where client encoding already matches server encoding by doing nothing in that case. Applies to all active branches. Issue reported and work sponsored by Zonar Systems. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6ca510d9dbacceb3444f00fcfbba2c80dca4c8f">http://git.postgresql.org/pg/commitdiff/d6ca510d9dbacceb3444f00fcfbba2c80dca4c8f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Brar Piening sent in a patch to enable Microsoft Visual Studio 2013 as additional build environment.</li>

<li>Sergey Muraviov sent in a patch to help psql display wide tables more legibly.</li>

<li>Zoltan Boszormenyi and Antonin Houska traded patches to allow backup throttling.</li>

<li>Amit Kapila and Haribabu Kommi traded patches to reduce WAL for update operations.</li>

<li>Heikki Linnakangas sent in a patch to optimize log_newpage by leaving out unused space from the block.</li>

<li>Marko Kreen sent in a patch to allow using TLSv1.1+ in libpq.</li>

<li>Stas Kelvich sent in another revision of a patch to add KNN support to the cube extension.</li>

<li>SAKAMOTO Masahiko sent in another revision of a patch to allow forcing a WAL log when setting a hint bit.</li>

<li>MauMau sent in two revisions of a patch to place DLLs in the bin folder for ECPG on Windows.</li>

<li>Tom Lane sent in a patch intended to bridge the gap between ruleutils and empty targetlists.</li>

<li>Etsuro Fujita sent in another revision of a patch to get more out of indexes via pathkeys and unique indexes.</li>

<li>MauMau sent in two revisions of a patch to fix an issue where "pg_ctl stop" times out when it should respond quickly.</li>

<li>Fabr&iacute;zio de Royes Mello sent in two more revisions of a patch to enable creating time-delayed standbys.</li>

<li>KaiGai Kohei and Shigeru HANADA traded patches implementing (and fixing typos in) a custom scan API.</li>

<li>MauMau sent in a patch to fix a bug where psql's \conninfo reports an incorrect destination on Windows.</li>

<li>Andres Freund sent in another flock of patches for logical changesets.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to implement ECPG readahead.</li>

<li>Zoltan Boszormenyi sent in two more revisions of a patch to fix the ECPG infrastructure.</li>

<li>Peter Geoghegan sent in a patch to do some performance optimization of btree binary search.</li>

<li>Michael Paquier sent in a patch to fix a bug where regression tests fail if not launched on a database itself called "regression."</li>

<li>Kevin Grittner sent in a patch to fix a pg_archivecleanup issue.</li>

<li>Antonin Houska sent in a patch to reference to a parent query from ANY sublink.</li>

<li>MauMau sent in a patch to fix an issue where pg_ctl fails with config-only directory on Windows.</li>

<li>Dr. Andreas Kunert sent in three revisions of a patch to allow logging SSL connections.</li>

<li>MauMau sent in two revisions of a patch to fix an issue on Windows where pg_ctl always used the same event source.</li>

<li>MauMau sent in a patch to allow a client-only installation on Windows.</li>

<li>Andres Freund sent in a patch to add %z ((s)size_t) support to elog/ereport.</li>

<li>Pavel Stehule and Dean Rasheed traded more revisions of the patch to add DROP ... IF EXISTS ... in the current places where that construct makes sense.</li>

</ul>