---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 novembre 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/11/12/Nouvelles-hebdomadaires-de-PostgreSQL-8-novembre-2015"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgchronos 1.0.0, une extension fournissant op&eacute;rateurs et fonctions SQL capables de traiter des ensembles d'intervalles de dates et de timestamps&nbsp;: <a target="_blank" href="https://github.com/worden341/pgchronos">https://github.com/worden341/pgchronos</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en novembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-11/">http://archives.postgresql.org/pgsql-jobs/2015-11/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li><em>PGConf Silicon Valley 2015</em> se tiendra au centre de convention sud de San Francisco les 17 &amp; 18 novembre&nbsp;: <a target="_blank" href="http://www.pgconfsv.com">http://www.pgconfsv.com</a></li>

<li>PGBR2015 (la PgConf br&eacute;silienne) aura lieu &agrave; Porto Alegre (&Eacute;tat du Rio Grande do Sul) les 18, 19 et 20 novembre. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://pgbr.postgresql.org.br/2015/en/">http://pgbr.postgresql.org.br/2015/en/</a></li>

<li><em>Postgres Conference China</em> 2015 aura lieu du 20 au 22 novembre 2015 &agrave; Beijing&nbsp;: <a target="_blank" href="http://postgres2015.eventdove.com/">http://postgres2015.eventdove.com/</a> <a target="_blank" href="http://postgrescluster2015.eventdove.com/">http://postgrescluster2015.eventdove.com/</a></li>

<li>La PGConf.DE se tiendra au Lindner Hotel am Michel de Hambourg (Allemagne) les 26 &amp; 27 novembre 2015&nbsp;: <a target="_blank" href="http://2015.pgconf.de/">http://2015.pgconf.de/</a></li>

<li>PostgreSQL@SCaLE est un &eacute;v&eacute;nement de deux jours avec deux programmes qui aura lieu les 21 et 22 janvier 2016 au Pasadena Convention Center &agrave; l'occasion du SCaLE 14X. L'appel &agrave; conf&eacute;renciers expire le 30 octobre 2015&nbsp;: <a target="_blank" href="https://www.socallinuxexpo.org/scale/14x/cfp">https://www.socallinuxexpo.org/scale/14x/cfp</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20151108233714.GA15118@fetter.org">http://www.postgresql.org/message-id/20151108233714.GA15118@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Kevin Grittner pushed:</p>

<ul>

<li>Add RMV to list of commands taking AE lock. Backpatch to 9.3, where it was initially omitted. Craig Ringer, with minor adjustment by Kevin Grittner <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf25fb2f93c95e946c5e382eb82ad08ae9d95bd9">http://git.postgresql.org/pg/commitdiff/bf25fb2f93c95e946c5e382eb82ad08ae9d95bd9</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix problems with ParamListInfo serialization mechanism. Commit d1b7c1ffe72e86932b5395f29e006c3f503bc53d introduced a mechanism for serializing a ParamListInfo structure to be passed to a parallel worker. However, this mechanism failed to handle external expanded values, as pointed out by Noah Misch. Repair. Moreover, plpgsql_param_fetch requires adjustment because the serialization mechanism needs it to skip evaluating unused parameters just as we would do when it is called from copyParamList, but params == estate-&gt;paramLI in that case. To fix, make the bms_is_member test in that function unconditional. Finally, have setup_param_list set a new ParamListInfo field, paramMask, to the parameters actually used in the expression, so that we don't try to fetch those that are not needed when serializing a parameter list. This isn't necessary for correctness, but it makes the performance of the parallel executor code comparable to what we do for cases involving cursors. Design suggestions and extensive review by Noah Misch. Patch by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1efc7e538204646fec0f790b683012ed9bd8a99f">http://git.postgresql.org/pg/commitdiff/1efc7e538204646fec0f790b683012ed9bd8a99f</a></li>

<li>Correct tiny inaccuracy in strxfrm cache comment. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0279f62fdca7ff19ef34a836f5201935dc7f627c">http://git.postgresql.org/pg/commitdiff/0279f62fdca7ff19ef34a836f5201935dc7f627c</a></li>

<li>shm_mq: Third attempt at fixing nowait behavior in shm_mq_receive. Commit a1480ec1d3bacb9acb08ec09f22bc25bc033115b purported to fix the problems with commit b2ccb5f4e6c81305386edb34daf7d1d1e1ee112a, but it didn't completely fix them. The problem is that the checks were performed in the wrong order, leading to a race condition. If the sender attached, sent a message, and detached after the receiver called shm_mq_get_sender and before the receiver called shm_mq_counterparty_gone, we'd incorrectly return SHM_MQ_DETACHED before all messages were read. Repair by reversing the order of operations, and add a long comment explaining why this new logic is (hopefully) correct. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4efe26cbd3ef0d85656bf00ac9e5bd41cc8a2a36">http://git.postgresql.org/pg/commitdiff/4efe26cbd3ef0d85656bf00ac9e5bd41cc8a2a36</a></li>

<li>shm_mq: Third attempt at fixing nowait behavior in shm_mq_receive. Commit a1480ec1d3bacb9acb08ec09f22bc25bc033115b purported to fix the problems with commit b2ccb5f4e6c81305386edb34daf7d1d1e1ee112a, but it didn't completely fix them. The problem is that the checks were performed in the wrong order, leading to a race condition. If the sender attached, sent a message, and detached after the receiver called shm_mq_get_sender and before the receiver called shm_mq_counterparty_gone, we'd incorrectly return SHM_MQ_DETACHED before all messages were read. Repair by reversing the order of operations, and add a long comment explaining why this new logic is (hopefully) correct. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4efe26cbd3ef0d85656bf00ac9e5bd41cc8a2a36">http://git.postgresql.org/pg/commitdiff/4efe26cbd3ef0d85656bf00ac9e5bd41cc8a2a36</a></li>

<li>Improve comments about abbreviation abort. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee44cb7566ffafc0144535e1f966f5e3bb7d384b">http://git.postgresql.org/pg/commitdiff/ee44cb7566ffafc0144535e1f966f5e3bb7d384b</a></li>

<li>Pass extra data to bgworkers, and use this to fix parallel contexts. Up until now, the total amount of data that could be passed to a background worker at startup was one datum, which can be a small as 4 bytes on some systems. That's enough to pass a dsm_handle or an array index, but not much else. Add a bgw_extra flag to the BackgroundWorker struct, allowing up to 128 bytes to be passed to a new worker on any platform. Use this to fix a problem I recently discovered with the parallel context machinery added in 9.5: the master assigns each worker an array index, and each worker subsequently assigns itself an array index, and there's nothing to guarantee that the two sets of indexes match, leading to chaos. Normally, I would not back-patch the change to add bgw_extra, since it is basically a feature addition. However, since 9.5 is still in beta and there seems to be no other sensible way to repair the broken parallel context machinery, back-patch to 9.5. Existing background worker code can ignore the bgw_extra field without a problem, but might need to be recompiled since the structure size has changed. Report and patch by me. Review by Amit Kapila. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64b2e7ad917a9a7814904d0f6dbde52cefbcfa00">http://git.postgresql.org/pg/commitdiff/64b2e7ad917a9a7814904d0f6dbde52cefbcfa00</a></li>

<li>Document interaction of bgworkers with LISTEN/NOTIFY. Thomas Munro and Robert Haas, reviewed by Haribabu Kommi <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dde5f09fad3ac188a155e21667f76825f43a28c8">http://git.postgresql.org/pg/commitdiff/dde5f09fad3ac188a155e21667f76825f43a28c8</a></li>

<li>pg_size_pretty: Format negative values similar to positive ones. Previously, negative values were always displayed in bytes, regardless of how large they were. Adrian Vondendriesch, reviewed by Julien Rouhaud and myself <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a1fab36aba7506fcf4559c4ef95fcacdd0b439a">http://git.postgresql.org/pg/commitdiff/8a1fab36aba7506fcf4559c4ef95fcacdd0b439a</a></li>

<li>Add sort support routine for the UUID data type. This introduces a simple encoding scheme to produce abbreviated keys: pack as many bytes of each UUID as will fit into a Datum. On little-endian machines, a byteswap is also performed; the abbreviated comparator can therefore just consist of a simple 3-way unsigned integer comparison. The purpose of this change is to speed up sorting data on a column of type UUID. Peter Geoghegan <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a76ef15d9fc9207a0758e8d6f6700dc8c931a934">http://git.postgresql.org/pg/commitdiff/a76ef15d9fc9207a0758e8d6f6700dc8c931a934</a></li>

<li>Remove unnecessary cast in previous commit. Noted by Kyotaro Horiguchi, who also reviewed the previous patch, but I failed to notice his review before committing. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbb82e370da8e80aa9667ffbb395cabb0529ea00">http://git.postgresql.org/pg/commitdiff/cbb82e370da8e80aa9667ffbb395cabb0529ea00</a></li>

<li>When completing ALTER INDEX .. SET, add an equals sign also. Jeff Janes <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af9773cf4cac235a32341b11864c4a0a9a22b6c1">http://git.postgresql.org/pg/commitdiff/af9773cf4cac235a32341b11864c4a0a9a22b6c1</a></li>

<li>Try to convince gcc that TupleQueueRemap never falls off the end. Without this, MacOS gcc version 4.2.1 isn't convinced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d7396e5092f1bc6433a38ccabaf88c8c681de11">http://git.postgresql.org/pg/commitdiff/8d7396e5092f1bc6433a38ccabaf88c8c681de11</a></li>

<li>Modify tqueue infrastructure to support transient record types. Commit 4a4e6893aa080b9094dadbe0e65f8a75fee41ac6, which introduced this mechanism, failed to account for the fact that the RECORD pseudo-type uses transient typmods that are only meaningful within a single backend. Transferring such tuples without modification between two cooperating backends does not work. This commit installs a system for passing the tuple descriptors over the same shm_mq being used to send the tuples themselves. The two sides might not assign the same transient typmod to any given tuple descriptor, so we must also substitute the appropriate receiver-side typmod for the one used by the sender. That adds some CPU overhead, but still seems better than being unable to pass records between cooperating parallel processes. Along the way, move the logic for handling multiple tuple queues from tqueue.c to nodeGather.c; tqueue.c now provides a TupleQueueReader, which reads from a single queue, rather than a TupleQueueFunnel, which potentially reads from multiple queues. This change was suggested previously as a way to make sure that nodeGather.c rather than tqueue.c had policy control over the order in which to read from queues, but it wasn't clear to me until now how good an idea it was. typmod mapping needs to be performed separately for each queue, and it is much simpler if the tqueue.c code handles that and leaves multiplexing multiple queues to higher layers of the stack. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e71dd7ce9766582da453f493bc371d64977282f">http://git.postgresql.org/pg/commitdiff/6e71dd7ce9766582da453f493bc371d64977282f</a></li>

<li>Remove set-but-not-used variables. Reported by both Peter Eisentraunt and Kevin Grittner. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fba60e573e092991dde4f757b88384ab1ec6a0ce">http://git.postgresql.org/pg/commitdiff/fba60e573e092991dde4f757b88384ab1ec6a0ce</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Remove some more dead Alpha-specific code. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/620ac88d6fd39c01bd25c90491333f088d186151">http://git.postgresql.org/pg/commitdiff/620ac88d6fd39c01bd25c90491333f088d186151</a></li>

<li>Code + docs review for unicode linestyle patch. Fix some brain fade in commit a2dabf0e1dda93c8: erroneous variable names in docs, rearrangements that made sentences less clear not more so, undocumented and poorly-chosen-anyway API behaviors of subroutines, bad grammar in error messages, copy-and-paste faults. Albe Laurenz and Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a69b0b2c14c614c129e89ae96d6f624375531760">http://git.postgresql.org/pg/commitdiff/a69b0b2c14c614c129e89ae96d6f624375531760</a></li>

<li>Remove obsolete advice about doubling backslashes in regex escapes. Standard-conforming literals have been the default for long enough that it no longer seems necessary to go out of our way to tell people to write regex escapes illegibly. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc0b8935213cda555d2b3af2ed08da28ed120e31">http://git.postgresql.org/pg/commitdiff/fc0b8935213cda555d2b3af2ed08da28ed120e31</a></li>

<li>Allow postgres_fdw to ship extension funcs/operators for remote execution. The user can whitelist specified extension(s) in the foreign server's options, whereupon we will treat immutable functions and operators of those extensions as candidates to be sent for remote execution. Whitelisting an extension in this way basically promises that the extension exists on the remote server and behaves compatibly with the local instance. We have no way to prove that formally, so we have to rely on the user to get it right. But this seems like something that people can usually get right in practice. We might in future allow functions and operators to be whitelisted individually, but extension granularity is a very convenient special case, so it got done first. The patch as-committed lacks any regression tests, which is unfortunate, but introducing dependencies on other extensions for testing purposes would break "make installcheck" scenarios, which is worse. I have some ideas about klugy ways around that, but it seems like material for a separate patch. For the moment, leave the problem open. Paul Ramsey, hacked up a bit more by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d89494166351e1fdac77d87c6af500401deb2422">http://git.postgresql.org/pg/commitdiff/d89494166351e1fdac77d87c6af500401deb2422</a></li>

<li>Add regression tests for remote execution of extension operators/functions. Rather than relying on other extensions to be available for installation, let's just add some test objects to the postgres_fdw extension itself within the regression script. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b9f117d6cd3c79780b0c0e57068f0837f7493aa6">http://git.postgresql.org/pg/commitdiff/b9f117d6cd3c79780b0c0e57068f0837f7493aa6</a></li>

<li>Improve implementation of GEQO's init_tour() function. Rather than filling a temporary array and then copying values to the output array, we can generate the required random permutation in-place using the Fisher-Yates shuffle algorithm. This is shorter as well as more efficient than before. It's pretty unlikely that anyone would notice a speed improvement, but shorter code is better. Nathan Wagner, edited a bit by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/59464bd6f928ad0da30502cbe9b54baec9ca2c69">http://git.postgresql.org/pg/commitdiff/59464bd6f928ad0da30502cbe9b54baec9ca2c69</a></li>

<li>Fix memory leaks in PL/Python. Previously, plpython was in the habit of allocating a lot of stuff in TopMemoryContext, and it was very slipshod about making sure that stuff got cleaned up; in particular, use of TopMemoryContext as fn_mcxt for function calls represents an unfixable leak, since we generally don't know what the called function might have allocated in fn_mcxt. This results in session-lifespan leakage in certain usage scenarios, as for example in a case reported by Ed Behn back in July. To fix, get rid of all the retail allocations in TopMemoryContext. All long-lived allocations are now made in sub-contexts that are associated with specific objects (either pl/python procedures, or Python-visible objects such as cursors and plans). We can clean these up when the associated object is deleted. I went so far as to get rid of PLy_malloc completely. There were a couple of places where it could still have been used safely, but on the whole it was just an invitation to bad coding. Haribabu Kommi, based on a draft patch by Heikki Linnakangas; some further work by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c75ad436f75fc629b61f601ba884c8f9313c9af">http://git.postgresql.org/pg/commitdiff/8c75ad436f75fc629b61f601ba884c8f9313c9af</a></li>

<li>Fix erroneous hash calculations in gin_extract_jsonb_path(). The jsonb_path_ops code calculated hash values inconsistently in some cases involving nested arrays and objects. This would result in queries possibly not finding entries that they should find, when using a jsonb_path_ops GIN index for the search. The problem cases involve JSONB values that contain both scalars and sub-objects at the same nesting level, for example an array containing both scalars and sub-arrays. To fix, reset the current stack-&gt;hash after processing each value or sub-object, not before; and don't try to be cute about the outermost level's initial hash. Correcting this means that existing jsonb_path_ops indexes may now be inconsistent with the new hash calculation code. The symptom is the same --- searches not finding entries they should find --- but the specific rows affected are likely to be different. Users will need to REINDEX jsonb_path_ops indexes to make sure that all searches work as expected. Per bug #13756 from Daniel Cheng. Back-patch to 9.4 where the faulty logic was introduced. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b23af458755ed90ae9164857e59d034bad75a672">http://git.postgresql.org/pg/commitdiff/b23af458755ed90ae9164857e59d034bad75a672</a></li>

<li>Fix enforcement of restrictions inside regexp lookaround constraints. Lookahead and lookbehind constraints aren't allowed to contain backrefs, and parentheses within them are always considered non-capturing. Or so says the manual. But the regexp parser forgot about these rules once inside a parenthesized subexpression, so that constructs like (\w)(?=(\1)) were accepted (but then not correctly executed --- a case like this acted like (\w)(?=\w), without any enforcement that the two \w's match the same text). And in (?=((foo))) the innermost parentheses would be counted as capturing parentheses, though no text would ever be captured for them. To fix, properly pass down the "type" argument to the recursive invocation of parse(). Back-patch to all supported branches; it was agreed that silent misexecution of such patterns is worse than throwing an error, even though new errors in minor releases are generally not desirable. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a43b4ab1111ca5e5f40a2ddd8e56bf999b9fdad9">http://git.postgresql.org/pg/commitdiff/a43b4ab1111ca5e5f40a2ddd8e56bf999b9fdad9</a></li>

<li>Rename PQsslAttributes() to PQsslAttributeNames(), and const-ify fully. Per discussion, the original name was a bit misleading, and PQsslAttributeNames() seems more apropos. It's not quite too late to change this in 9.5, so let's change it while we can. Also, make sure that the pointer array is const, not only the pointed-to strings. Minor documentation wordsmithing while at it. Lars Kanis, slight adjustments by me <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9042f583429ef880665dd36b7bcad45ba62dea7b">http://git.postgresql.org/pg/commitdiff/9042f583429ef880665dd36b7bcad45ba62dea7b</a></li>

<li>Add "xid &lt;&gt; xid" and "xid &lt;&gt; int4" operators. The corresponding "=" operators have been there a long time, and not having their negators is a bit of a nuisance. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c5e86ea932794051d2fe3bd26ce4c03981b0b826">http://git.postgresql.org/pg/commitdiff/c5e86ea932794051d2fe3bd26ce4c03981b0b826</a></li>

<li>Update 9.5 release notes through today. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ad9fad7b68c4209db7d73f59a538ffe619c07872">http://git.postgresql.org/pg/commitdiff/ad9fad7b68c4209db7d73f59a538ffe619c07872</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Update spelling of COPY options. The preferred spelling was changed from FORCE QUOTE to FORCE_QUOTE and the like, but some code was still referring to the old spellings. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7bd099d511d66b55fedced9920357cc5c36811c7">http://git.postgresql.org/pg/commitdiff/7bd099d511d66b55fedced9920357cc5c36811c7</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Set include_realm=1 default in parse_hba_line. With include_realm=1 being set down in parse_hba_auth_opt, if multiple options are passed on the pg_hba line, such as: host all all 0.0.0.0/0 gss include_realm=0 krb_realm=XYZ.COM We would mistakenly reset include_realm back to 1. Instead, we need to set include_realm=1 up in parse_hba_line, prior to parsing any of the additional options. Discovered by Jeff McCormick during testing. Bug introduced by 9a08841. Back-patch to 9.5 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5644419b3de418f81e4461cbaa06c5d4b5da0800">http://git.postgresql.org/pg/commitdiff/5644419b3de418f81e4461cbaa06c5d4b5da0800</a></li>

</ul>

<p>Noah Misch pushed:</p>

<ul>

<li>Don't connect() to a wildcard address in test_postmaster_connection(). At least OpenBSD, NetBSD, and Windows don't support it. This repairs pg_ctl for listen_addresses='0.0.0.0' and listen_addresses='::'. Since pg_ctl prefers to test a Unix-domain socket, Windows users are most likely to need this change. Back-patch to 9.1 (all supported versions). This could change pg_ctl interaction with loopback-interface firewall rules. Therefore, in 9.4 and earlier (released branches), activate the change only on known-affected platforms. Reported (bug #13611) and designed by Kondo Yuta. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fed19f312c72778ce7dcbb0670871b22bd06ff85">http://git.postgresql.org/pg/commitdiff/fed19f312c72778ce7dcbb0670871b22bd06ff85</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Set replication origin when decoding commit records. By accident the replication origin was not set properly in DecodeCommit(). That's bad because the origin is passed to the output plugins origin filter, and accessible from the output plugin via ReorderBufferTXN-&gt;origin_id. Accessing the origin of individual changes worked before the fix, which is why this wasn't notices earlier. Reported-By: Craig Ringer Author: Craig Ringer Discussion: CAMsr+YFhBJLp=qfSz3-J+0P1zLkE8zNXM2otycn20QRMx380gw@mail.gmail.com Backpatch: 9.5, where replication origins where introduced <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f3a764b0dac77451d20ee00d2f5916447a5c4346">http://git.postgresql.org/pg/commitdiff/f3a764b0dac77451d20ee00d2f5916447a5c4346</a></li>

</ul>

<h2>Correctifs rejet&eacute;s (&agrave; ce jour)</h2>

<p>No one was disappointed this week :-)</p>

<h2>Correctifs en attente</h2>

<p>Alexander Korotkov sent in another revision of a patch to make the access method API more extensible.</p>

<p>David Fetter sent in a patch to add weighted statistics to PostgreSQL.</p>

<p>Craig Ringer sent in a patch to add a logical decoding output plugin.</p>

<p>Robert Haas and Rajeev Rastogi traded patches to fix an issue that could result in a dangling client backend process.</p>

<p>Peter Geoghegan sent in a patch to correct a heap_finish_speculative() error message inaccuracy.</p>

<p>Bill Moran sent in a patch to add new configuration options to TOAST.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in another revision of a patch to add an option psql to execute 1 or more commands, then exit.</p>

<p>Amit Kapila sent in another revision of a patch to implement parallel seq scan.</p>

<p>Pavel St&Auml;&rsaquo;hule and Catalin Iacob traded patches to add a PL/PythonU ereport() function.</p>

<p>David Rowley sent in another revision of a patch to speed up timestamptz_out.</p>

<p>Kyotaro HORIGUCHI sent in two revisions of a patch to fix some tab completion infelicities in psql.</p>

<p>Kaigai Kouhei sent in two more revisions of a patch to add custom scan support to readfuncs.c.</p>

<p>Kyotaro HORIGUCHI sent in two revisions of a patch to fix identifier completion of multibyte characters.</p>

<p>Christian Marie sent in a patch to add length parameterised dmetaphone functions.</p>

<p>Kyotaro HORIGUCHI sent in a patch to allow substitution of ExecScan body for ExecForignScan.</p>

<p>Ashutosh Bapat sent in another revision of a patch to allow getting sorted data from a foreign server for merge joins.</p>

<p>Michael Paquier sent in a patch to add a space-related constraint on the standby snapshot generated by the bgwriter, so as to not rely entirely on the interval of 15s.</p>

<p>Fabien COELHO sent in four more revisions of a patch to extend pgbench expressions with functions.</p>

<p>Ildus Kurbangaliev sent in a patch to split the SLRU LWLocks into separate tranches and move them to SLRU Ctl.</p>

<p>Robert Haas sent in a patch to add a new flag, consider_parallel, to each RelOptInfo, indicating whether a plan for that relation could conceivably be run inside of a parallel worker.</p>

<p>Artur Zakirov sent in two revisions of a patch to improve the use of Hunspell dictionaries.</p>

<p>Vitaly Burovoy sent in a patch to ensure that parts extracted from "infinity" timestamps are also infinite.</p>

<p>Lars Kanis sent in a doc patch to lowercase pqsslAttribute in SGML-id for consistency.</p>

<p>Noah Misch sent in a patch which removes the SlruScanDirCbFindEarliest() test from TruncateMultiXact(), which in turn makes multixact control decisions independent of whether TruncateMultiXact() is successful at unlinking segments.</p>