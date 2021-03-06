---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 mars 2018"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2018/03/18/Nouvelles-hebdomadaires-de-PostgreSQL-11-mars-2018"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgmetrics, un outil en ligne de commande pour extraire et afficher les m&eacute;triques d'un serveur PostgreSQL, publi&eacute; en open source&nbsp;: <a target="_blank" href="https://pgmetrics.io/">https://pgmetrics.io/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en mars</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2018-03/">http://archives.postgresql.org/pgsql-jobs/2018-03/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PGDay nordique 2018 se tiendra &agrave; Oslo (Norv&egrave;ge) &agrave; l'h&ocirc;tel Radisson Blu le 13 mars 2018. Les inscriptions sont ouvertes et le programme a &eacute;t&eacute; publi&eacute;&nbsp;: <a target="_blank" href="https://2018.nordicpgday.org/">https://2018.nordicpgday.org/</a></li>

<li>Le <em>pgDay Paris 2018</em> aura lieu &agrave; l'espace Saint Martin (Paris, France) le 15 mars 2018. Les inscriptions sont ouvertes&nbsp;: <a target="_blank" href="http://2018.pgday.paris/registration/">http://2018.pgday.paris/registration/</a></li>

<li>PGConf APAC 2018 se tiendra &agrave; Singapour du 22 au 24 mars 2018&nbsp;: <a target="_blank" href="http://2018.pgconfapac.org/">http://2018.pgconfapac.org/</a></li>

<li>La conf&eacute;rence germanophone <em>PostgreSQL Conference 2018</em> aura lieu le 13 avril 2018 &agrave; Berlin&nbsp;: <a target="_blank" href="http://2018.pgconf.de/">http://2018.pgconf.de/</a></li>

<li>La <em>PGConfNepal 2018</em> se tiendra les 4 & 5 mai 2018 &agrave; l'universit&eacute; de Katmandou, Dulikhel, N&eacute;pal&nbsp;: <a target="_blank" href="https://postgresconf.org/conferences/Nepal2018">https://postgresconf.org/conferences/Nepal2018</a></li>

<li>La <em>PGCon 2018</em> se tiendra &agrave; Ottawa du 29 mai au 1er juin 2018&nbsp;: <a target="_blank" href="https://www.pgcon.org/2018/">https://www.pgcon.org/2018/</a></li>

<li>Le PGDay suisse 2018 aura lieu &agrave; Rapperswil-Jona (pr&egrave;s de Zurich) le 29 juin 2018. L'appel &agrave; conf&eacute;renciers court du 6 f&eacute;vrier au 14 avril 2018, et les inscriptions sont ouvertes du 6 f&eacute;vrier au 28 juin 2018&nbsp;: <a target="_blank" href="http://www.pgday.ch/2018/">http://www.pgday.ch/2018/</a></li>

<li>La <em>PGConf.Brazil 2018</em> aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 & 4 ao&ucirc;t 2018&nbsp;: <a target="_blank" href="http://pgconf.com.br">http://pgconf.com.br</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20180312050436.GA7526@fetter.org">http://www.postgresql.org/message-id/20180312050436.GA7526@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Magnus Hagander pushed:</p>

<ul>

<li>Actually pick .lib file when multiple perl libs are present. 7240962f8626ff09bb8f9e71ecdb074775bdd035 got it right in the comment, but the code did not actually do what the comment said. Fix that. Issue pointed out by Noah Misch. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6946280cded903b6f5269fcce105f8ab1d455d33">https://git.postgresql.org/pg/commitdiff/6946280cded903b6f5269fcce105f8ab1d455d33</a></li>

<li>Clarify initdb --help message for --wal-segsize. Specify that the value is in megabytes. This aligns the message with what's in the documentation. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/fedabe1f64467b777b1d5ef53b5b0015acc7b999">https://git.postgresql.org/pg/commitdiff/fedabe1f64467b777b1d5ef53b5b0015acc7b999</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Remove some obsolete procedure-specific code from PLs. Since procedures are now declared to return void, code that handled return values for procedures separately is no longer necessary. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/09230e54fb39e8cd8add3f119d03afd72adc72b9">https://git.postgresql.org/pg/commitdiff/09230e54fb39e8cd8add3f119d03afd72adc72b9</a></li>

<li>doc: Tiny whitespace fix. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/dd9ed0bf7039eb2b97d9afa198409c0e9798f4ac">https://git.postgresql.org/pg/commitdiff/dd9ed0bf7039eb2b97d9afa198409c0e9798f4ac</a></li>

<li>Tests for Kerberos/GSSAPI authentication. Like the LDAP and SSL tests, these are not run by default but can be selected via PG_TEST_EXTRA. Reviewed-by: Thomas Munro &lt;thomas.munro@enterprisedb.com&gt; Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4c831aeaa7bd837c5462df0bf54dc69d3683237a">https://git.postgresql.org/pg/commitdiff/4c831aeaa7bd837c5462df0bf54dc69d3683237a</a></li>

<li>Raise Test::More version requirement. Since ed8a7c6fcf92b6b57ed8003bbd4a4eb92a6039bc, version 0.87 is required. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f0ae2fa88bb97eaab2b6df7a0e7e503f392d3181">https://git.postgresql.org/pg/commitdiff/f0ae2fa88bb97eaab2b6df7a0e7e503f392d3181</a></li>

<li>Fix expected error message in test. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/286c0ab257f8dde8e5494426b86c38f3877ae5c2">https://git.postgresql.org/pg/commitdiff/286c0ab257f8dde8e5494426b86c38f3877ae5c2</a></li>

<li>doc: Add replication parameter to libpq documentation. Author: Michael Paquier &lt;michael@paquier.xyz&gt; Reported-by: &#350;ahap A&#351;&ccedil;&#305; &lt;sahapasci@gmail.com&gt; Reviewed-by: Vik Fearing &lt;vik.fearing@2ndquadrant.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/0c2c81b403db420bfce36f168887db72932dbf09">https://git.postgresql.org/pg/commitdiff/0c2c81b403db420bfce36f168887db72932dbf09</a></li>

<li>doc: Improve calculation of vm.nr_hugepages. The previous method worked off the full virtual address space, not just the shared memory usage. Author: Tsunakawa, Takayuki &lt;tsunakawa.takay@jp.fujitsu.com&gt; Reviewed-by: Justin Pryzby &lt;pryzby@telsasoft.com&gt; Reviewed-by: Vasundhar Boddapati &lt;bvasundhar@gmail.com&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a3739e376fbc9d6e332ce33d42426b1d8b59f20b">https://git.postgresql.org/pg/commitdiff/a3739e376fbc9d6e332ce33d42426b1d8b59f20b</a></li>

<li>Fix costing of parallel hash joins. Commit 1804284042e659e7d16904e7bbb0ad546394b6a3 established that single-batch parallel-aware hash joins could create one large shared hash table using the combined work_mem budget of all participants. The costing accidentally assumed that parallel-oblivious hash joins could also do that. The documentation for initial_cost_hashjoin() also failed to mention the new argument. Repair. Author: Thomas Munro Reported-By: Antonin Houska Reviewed-By: Antonin Houska Discussion: <a target="_blank" href="https://postgr.es/m/12441.1513935950%40localhost">https://postgr.es/m/12441.1513935950%40localhost</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5b804cc168a52039be02f392780b9e8c8db74412">https://git.postgresql.org/pg/commitdiff/5b804cc168a52039be02f392780b9e8c8db74412</a></li>

<li>Fix test counting in SSL tests. The branch that does not support tls-server-end-point runs more tests, so we need to structure the test counting dynamically. Reviewed-by: Michael Paquier &lt;michael@paquier.xyz&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2dadd061b3a8d259ec352512dfaf340a85ffa827">https://git.postgresql.org/pg/commitdiff/2dadd061b3a8d259ec352512dfaf340a85ffa827</a></li>

<li>Fix typo. Author: Daniel Gustafsson &lt;daniel@yesql.se&gt; <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/bcdd40538a11a39fee55ef1c4b79085717a5fb76">https://git.postgresql.org/pg/commitdiff/bcdd40538a11a39fee55ef1c4b79085717a5fb76</a></li>

<li>doc: Add more substructure to SSL documentation. The SSL documentation text has gotten a bit long, so add some subsections and reorder for better flow. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d40c7cd00422ac9a1284a1ecb5d6c0671c5ec6e4">https://git.postgresql.org/pg/commitdiff/d40c7cd00422ac9a1284a1ecb5d6c0671c5ec6e4</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix pg_rewind to handle relation data files in tablespaces properly. pg_rewind checks whether each file is a relation data file, from its path. Previously this check logic had the bug which made pg_rewind fail to recognize any relation data files in tablespaces. Which also caused an assertion failure in pg_rewind. Back-patch to 9.5 where pg_rewind was added. Author: Takayuki Tsunakawa Reviewed-by: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/0A3221C70F24FB45833433255569204D1F8D6C7A@G01JPEXMBYT05">https://postgr.es/m/0A3221C70F24FB45833433255569204D1F8D6C7A@G01JPEXMBYT05</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/2f3e2340cd1b67e91cefdf45e4c915297d1034e2">https://git.postgresql.org/pg/commitdiff/2f3e2340cd1b67e91cefdf45e4c915297d1034e2</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>shm_mq: Fix detach race condition. Commit 34db06ef9a1d7f36391c64293bf1e0ce44a33915 adopted a lock-free design for shm_mq.c, but it introduced a race condition that could lose messages. When shm_mq_receive_bytes() detects that the other end has detached, it must make sure that it has seen the final version of mq_bytes_written, or it might miss a message sent before detaching. Thomas Munro Discussion: <a target="_blank" href="https://postgr.es/m/CAEepm%3D2myZ4qxpt1a%3DC%2BwEv3o188K13K3UvD-44FK0SdAzHy%2Bw%40mail.gmail.com">https://postgr.es/m/CAEepm%3D2myZ4qxpt1a%3DC%2BwEv3o188K13K3UvD-44FK0SdAzHy%2Bw%40mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/42d7074ebb832e511d1edec8091cd474d169eef1">https://git.postgresql.org/pg/commitdiff/42d7074ebb832e511d1edec8091cd474d169eef1</a></li>

<li>test_decoding: Remove unused #include directives. Euler Taveira Discussion: <a target="_blank" href="http://postgr.es/m/CAHE3wghBwKoCmK_sRu4xUL7f-q3dVOSwqjnOkaGmvWAqWUKaSQ@mail.gmail.com">http://postgr.es/m/CAHE3wghBwKoCmK_sRu4xUL7f-q3dVOSwqjnOkaGmvWAqWUKaSQ@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f9f8784c8b3050aaec52da88a6e41b3e3f576b96">https://git.postgresql.org/pg/commitdiff/f9f8784c8b3050aaec52da88a6e41b3e3f576b96</a></li>

<li>Correctly assess parallel-safety of tlists when SRFs are used. Since commit 69f4b9c85f168ae006929eec44fc44d569e846b9, the existing code was no longer assessing the parallel-safety of the real tlist for each upper rel, but rather the first of possibly several tlists created by split_pathtarget_at_srfs(). Repair. Even though this is clearly wrong, it's not clear that it has any user-visible consequences at the moment, so no back-patch for now. If we discover later that it does have user-visible consequences, we might need to back-patch this to v10. Patch by me, per a report from Rajkumar Raghuwanshi. Discussion: <a target="_blank" href="http://postgr.es/m/CA+Tgmoaob_Strkg4Dcx=VyxnyXtrmkV=ofj=pX7gH9hSre-g0Q@mail.gmail.com">http://postgr.es/m/CA+Tgmoaob_Strkg4Dcx=VyxnyXtrmkV=ofj=pX7gH9hSre-g0Q@mail.gmail.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/960df2a9715c5c232b0f6f3effd40a3323eed6b0">https://git.postgresql.org/pg/commitdiff/960df2a9715c5c232b0f6f3effd40a3323eed6b0</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Add infrastructure to support server-version-dependent tab completion. Up to now we've not worried about whether psql's tab completion queries would work against prior server versions. But since we support older server versions in describe.c, we really ought to do so here as well. Failing to take care of this not only leads to loss of tab-completion service when using an older server, but risks aborting a user's open transaction when we send an incompatible query to the server. The recent changes in pg_proc.prokind are one reason to take this more seriously now than before, and the proposed patch for completion after SELECT needs some such capability as well. Hence, create some infrastructure to allow selection of one of several versions of a query depending on server version. For cases where we just need to select one of several query strings, introduce VersionedQuery and COMPLETE_WITH_VERSIONED_QUERY(). Likewise extend the SchemaQuery infrastructure to allow versioning of those. I went ahead and fixed the prokind issues, to serve as an illustration of how to use versioned SchemaQuery. To have some illustration of VersionedQuery, change the support for completion of publication and subscription names so that psql will not send sure-to-fail queries to pre-v10 servers. There is much more that should be done to make tab completion more friendly to older servers, but this commit is mainly meant to get the infrastructure in place, so I stopped here. Discussion: <a target="_blank" href="https://postgr.es/m/24314.1520190408@sss.pgh.pa.us">https://postgr.es/m/24314.1520190408@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/722408bcd1bde0b007f73b41135382af11b0282d">https://git.postgresql.org/pg/commitdiff/722408bcd1bde0b007f73b41135382af11b0282d</a></li>

<li>Temporarily instrument postgres_fdw test to look for statistics changes. It seems fairly hard to explain recent buildfarm failures without the theory that something is doing an ANALYZE behind our backs. Probe for this directly to see if it's true. In principle the outputs of these queries should be stable, since the table in question is small enough that ANALYZE's sample will include all rows. But even if that turns out to be wrong, we can put up with some failures for a bit. I don't intend to leave this here indefinitely. Discussion: <a target="_blank" href="https://postgr.es/m/25502.1520277552@sss.pgh.pa.us">https://postgr.es/m/25502.1520277552@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/c2c537c56dc30ec3cdc12051f4ea5363aa66d73c">https://git.postgresql.org/pg/commitdiff/c2c537c56dc30ec3cdc12051f4ea5363aa66d73c</a></li>

<li>In initdb, don't bother trying max_connections = 10. The server won't actually start with that setting anymore, not since we raised the default max_wal_senders to 10. Per discussion, we don't wish to back down on that default, so instead raise the effective floor for max_connections (to 20). It's still possible to configure a smaller setting manually, but initdb won't set it that way. Since that change happened in v10, back-patch to v10. Kyotaro Horiguchi Discussion: <a target="_blank" href="https://postgr.es/m/20180209.170823.42008365.horiguchi.kyotaro@lab.ntt.co.jp">https://postgr.es/m/20180209.170823.42008365.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/6a0b30f0401a76b3a972e366ba30aa7e49ffbf87">https://git.postgresql.org/pg/commitdiff/6a0b30f0401a76b3a972e366ba30aa7e49ffbf87</a></li>

<li>Fix cross-checking of ReservedBackends/max_wal_senders/MaxConnections. We were independently checking ReservedBackends &lt; MaxConnections and max_wal_senders &lt; MaxConnections, but because walsenders aren't allowed to use superuser-reserved connections, that's really the wrong thing. Correct behavior is to insist on ReservedBackends + max_wal_senders being less than MaxConnections. Fix the code and associated documentation. This has been wrong for a long time, but since the situation probably hardly ever arises in the field (especially pre-v10, when the default for max_wal_senders was zero), no back-patch. Discussion: <a target="_blank" href="https://postgr.es/m/28271.1520195491@sss.pgh.pa.us">https://postgr.es/m/28271.1520195491@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4e0c743c18bf5435a4850510c5c74b3521c3e1e5">https://git.postgresql.org/pg/commitdiff/4e0c743c18bf5435a4850510c5c74b3521c3e1e5</a></li>

<li>Revert "Temporarily instrument postgres_fdw test to look for statistics changes.". This reverts commit c2c537c56dc30ec3cdc12051f4ea5363aa66d73c. It's now clear that whatever is going on there, it can't be blamed on unexpected ANALYZE runs, because the statistics are the same just before the failing query as they were at the start of the test. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/04e7ecadf64d18f67ca1d0632d8ab71f120ca5e3">https://git.postgresql.org/pg/commitdiff/04e7ecadf64d18f67ca1d0632d8ab71f120ca5e3</a></li>

<li>Add test scaffolding for exercising optimizer's predicate-proof logic. The predicate-proof code in predtest.c is a bit hard to test as-is: you have to construct a query whose plan changes depending on the success of a test, and in tests that have been around for awhile, it's always possible that the plan shape is now being determined by some other factor. Our existing regression tests aren't doing real well at providing full code coverage of predtest.c, either. So, let's add a small test module that allows directly inspecting the results of predicate_implied_by() and predicate_refuted_by() for arbitrary boolean expressions. I chose the set of tests committed here in order to get reasonably complete code coverage of predtest.c just from running this test module, and to cover some cases called out as being interesting in the existing comments. We might want to add more later. But this set already shows a few cases where perhaps things could be improved. Indeed, this exercise proves that predicate_refuted_by() is buggy for the case of clause_is_check = true, though fortunately we aren't using that case anywhere yet. I'll look into doing something about that in a separate commit. For now, just memorialize the current behavior. Discussion: <a target="_blank" href="https://postgr.es/m/5983.1520487191@sss.pgh.pa.us">https://postgr.es/m/5983.1520487191@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/44468f49bbe7e47e5a27a1ccbf13549ff85149f2">https://git.postgresql.org/pg/commitdiff/44468f49bbe7e47e5a27a1ccbf13549ff85149f2</a></li>

<li>Fix test_predtest's idea of what weak refutation means. I'd initially supposed that predicate_refuted_by(..., true) ought to say that "A refutes B" means "non-falsity of A implies non-truth of B". But it seems better to define it as "truth of A implies non-truth of B". This is more useful in the current system, slightly easier to prove, and in closer correspondence to the existing code behavior. With this change, test_predtest no longer claims that any existing test cases show false proof reports, though there still are cases where we could prove something and fail to. Discussion: <a target="_blank" href="https://postgr.es/m/5983.1520487191@sss.pgh.pa.us">https://postgr.es/m/5983.1520487191@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/a63c3274a68832182f84ca5d2b8cc5a7462bdacb">https://git.postgresql.org/pg/commitdiff/a63c3274a68832182f84ca5d2b8cc5a7462bdacb</a></li>

<li>Improve predtest.c's internal docs, and enhance its functionality a bit. Commit b08df9cab left things rather poorly documented as far as the exact semantics of "clause_is_check" mode went. Also, that mode did not really work correctly for predicate_refuted_by; although given the lack of specification as to what it should do, as well as the lack of any actual use-case, that's perhaps not surprising. Rename "clause_is_check" to "weak" proof mode, and provide specifications for what it should do. I defined weak refutation as meaning "truth of A implies non-truth of B", which makes it possible to use the mode in the part of relation_excluded_by_constraints that checks for mutually contradictory WHERE clauses. Fix up several places that did things wrong for that definition. (As far as I can see, these errors would only lead to failure-to-prove, not incorrect claims of proof, making them not serious bugs even aside from the fact that v10 contains no use of this mode. So there seems no need for back-patching.) In addition, teach predicate_refuted_by_recurse that it can use predicate_implied_by_recurse after all when processing a strong NOT-clause, so long as it asks for the correct proof strength. This is an optimization that could have been included in commit b08df9cab, but wasn't. Also, simplify and generalize the logic that checks for whether nullness of the argument of IS [NOT] NULL would force overall nullness of the predicate or clause. (This results in a change in the partition_prune test's output, as it is now able to prune an all-nulls partition that it did not recognize before.) In passing, in PartConstraintImpliedByRelConstraint, remove bogus conversion of the constraint list to explicit-AND form and then right back again; that accomplished nothing except forcing a useless extra level of recursion inside predicate_implied_by. Discussion: <a target="_blank" href="https://postgr.es/m/5983.1520487191@sss.pgh.pa.us">https://postgr.es/m/5983.1520487191@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5748f3a0aa7cf78ac6979010273bd9d50869bb8e">https://git.postgresql.org/pg/commitdiff/5748f3a0aa7cf78ac6979010273bd9d50869bb8e</a></li>

<li>In psql, restore old behavior of Query_for_list_of_functions. Historically, tab completion for functions has offered the names of aggregates as well. This is essential in at least one context, namely GRANT/REVOKE, because there is no GRANT ON AGGREGATE syntax. There are other cases where a command that nominally is for functions will allow aggregates as well, though not all do. Commit fd1a421fe changed this query to disallow aggregates, but that doesn't seem to have been thought through very carefully. Change it to allow aggregates (but still ignore procedures). We might at some point tighten this up, but it'd require sorting through all the uses of this query to see which ones should offer aggregate names and which shouldn't. Given the lack of field complaints about the historical laxity here, that's work I'm not eager to do right now. Discussion: <a target="_blank" href="https://postgr.es/m/14268.1520283126@sss.pgh.pa.us">https://postgr.es/m/14268.1520283126@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b6e132ddc8601c99ac5466792f6128ee859f4128">https://git.postgresql.org/pg/commitdiff/b6e132ddc8601c99ac5466792f6128ee859f4128</a></li>

<li>Fix improper uses of canonicalize_qual(). One of the things canonicalize_qual() does is to remove constant-NULL subexpressions of top-level AND/OR clauses. It does that on the assumption that what it's given is a top-level WHERE clause, so that NULL can be treated like FALSE. Although this is documented down inside a subroutine of canonicalize_qual(), it wasn't mentioned in the documentation of that function itself, and some callers hadn't gotten that memo. Notably, commit d007a9505 caused get_relation_constraints() to apply canonicalize_qual() to CHECK constraints. That allowed constraint exclusion to misoptimize situations in which a CHECK constraint had a provably-NULL subclause, as seen in the regression test case added here, in which a child table that should be scanned is not. (Although this thinko is ancient, the test case doesn't fail before 9.2, for reasons I've not bothered to track down in detail. There may be related cases that do fail before that.) More recently, commit f0e44751d added an independent bug by applying canonicalize_qual() to index expressions, which is even sillier since those might not even be boolean. If they are, though, I think this could lead to making incorrect index entries for affected index expressions in v10. I haven't attempted to prove that though. To fix, add an "is_check" parameter to canonicalize_qual() to specify whether it should assume WHERE or CHECK semantics, and make it perform NULL-elimination accordingly. Adjust the callers to apply the right semantics, or remove the call entirely in cases where it's not known that the expression has one or the other semantics. I also removed the call in some cases involving partition expressions, where it should be a no-op because such expressions should be canonical already ... and was a no-op, independently of whether it could in principle have done something, because it was being handed the qual in implicit-AND format which isn't what it expects. In HEAD, add an Assert to catch that type of mistake in future. This represents an API break for external callers of canonicalize_qual(). While that's intentional in HEAD to make such callers think about which case applies to them, it seems like something we probably wouldn't be thanked for in released branches. Hence, in released branches, the extra parameter is added to a new function canonicalize_qual_ext(), and canonicalize_qual() is a wrapper that retains its old behavior. Patch by me with suggestions from Dean Rasheed. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/24475.1520635069@sss.pgh.pa.us">https://postgr.es/m/24475.1520635069@sss.pgh.pa.us</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/4a4e2442a7f7c1434e86dd290cdb3704cfebb24c">https://git.postgresql.org/pg/commitdiff/4a4e2442a7f7c1434e86dd290cdb3704cfebb24c</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Fix HEAP_INSERT_IS_SPECULATIVE to HEAP_INSERT_SPECULATIVE in comments. This was wrong since 168d5805e4c08bed7b95d351bf097cff7c07dd65, which introduced speculative inserts. Author: Andres Freund <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/b2a177bff10e86016a53bb7f06f7d5e63649e27d">https://git.postgresql.org/pg/commitdiff/b2a177bff10e86016a53bb7f06f7d5e63649e27d</a></li>

<li>Add parenthesized options syntax for ANALYZE. This is analogous to the syntax allowed for VACUUM. This allows us to avoid making new options reserved keywords and makes it easier to allow arbitrary argument order. Oh, and it's consistent with the other commands, too. Author: Nathan Bossart Reviewed-By: Michael Paquier, Masahiko Sawada Discussion: <a target="_blank" href="https://postgr.es/m/D3FC73E2-9B1A-4DB4-8180-55F57D116B4E@amazon.com">https://postgr.es/m/D3FC73E2-9B1A-4DB4-8180-55F57D116B4E@amazon.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/854dd8cff523bc17972d34772b0e39ad3d6d46a4">https://git.postgresql.org/pg/commitdiff/854dd8cff523bc17972d34772b0e39ad3d6d46a4</a></li>

<li>Fix parent node of WCO expressions in partitioned tables. Since edd44738bc8814 WCO expressions of partitioned tables are initialized with the first subplan as parent. That's not correct, as the correct context is the ModifyTableState node. That's also what is used for RETURNING processing, initialized nearby. This appears not to cause any visible problems for in core code, but is problematic for in development patch. Discussion: <a target="_blank" href="https://postgr.es/m/20180303043818.tnvlo243bgy7una3@alap3.anarazel.de">https://postgr.es/m/20180303043818.tnvlo243bgy7una3@alap3.anarazel.de</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/d06aba240d24c499cdd5e77695b3cd28a094e648">https://git.postgresql.org/pg/commitdiff/d06aba240d24c499cdd5e77695b3cd28a094e648</a></li>

</ul>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Clone extended stats in CREATE TABLE (LIKE INCLUDING ALL). The LIKE INCLUDING ALL clause to CREATE TABLE intuitively indicates cloning of extended statistics on the source table, but it failed to do so. Patch it up so that it does. Also include an INCLUDING STATISTICS option to the LIKE clause, so that the behavior can be requested individually, or excluded individually. While at it, reorder the INCLUDING options, both in code and in docs, in alphabetical order which makes more sense than feature-implementation order that was previously used. Backpatch this to Postgres 10, where extended statistics were introduced, because this is seen as an oversight in a fresh feature which is better to get consistent from the get-go instead of changing only in pg11. In pg11, comments on statistics objects are cloned too. In pg10 they are not, because I (&Aacute;lvaro) was too coward to change the parse node as required to support it. Also, in pg10 I chose not to renumber the parser symbols for the various INCLUDING options in LIKE, for the same reason. Any corresponding user-visible changes (docs) are backpatched, though. Reported-by: Stephen Froehlich Author: David Rowley Reviewed-by: &Aacute;lvaro Herrera, Tomas Vondra Discussion: <a target="_blank" href="https://postgr.es/m/CY1PR0601MB1927315B45667A1B679D0FD5E5EF0@CY1PR0601MB1927.namprd06.prod.outlook.com">https://postgr.es/m/CY1PR0601MB1927315B45667A1B679D0FD5E5EF0@CY1PR0601MB1927.namprd06.prod.outlook.com</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/5564c11815486bdfe87eb46ebc7c070293fa6956">https://git.postgresql.org/pg/commitdiff/5564c11815486bdfe87eb46ebc7c070293fa6956</a></li>

<li>Fix bogus Name assignment in CreateStatistics. Apparently, it doesn't work to use a plain cstring as a Name datum: you may end up having random bytes because of failing to zero the bytes after the terminating \0, as indicated by valgrind. I introduced this bug in 5564c1181548, so backpatch this fix to REL_10_STABLE, like that commit. While at it, fix a slightly misleading comment, pointed out by David Rowley. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/1ffb63a2a1767c3dd0c7611bed6383bd37bfbce6">https://git.postgresql.org/pg/commitdiff/1ffb63a2a1767c3dd0c7611bed6383bd37bfbce6</a></li>

<li>Refrain from duplicating data in reorderbuffers. If a walsender exits leaving data in reorderbuffers, the next walsender that tries to decode the same transaction would append its decoded data in the same spill files without truncating it first, which effectively duplicate the data. Avoid that by removing any leftover reorderbuffer spill files when a walsender starts. Backpatch to 9.4; this bug has been there from the very beginning of logical decoding. Author: Craig Ringer, revised by me Reviewed by: &Aacute;lvaro Herrera, Petr Jel&iacute;nek, Masahiko Sawada <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/8aa75e1384b1c62e302db02e6006fc6a2885afeb">https://git.postgresql.org/pg/commitdiff/8aa75e1384b1c62e302db02e6006fc6a2885afeb</a></li>

<li>Fix typo. Author: Kyotaro HORIGUCHI Discussion: <a target="_blank" href="https://postgr.es/m/20180307.163428.209919771.horiguchi.kyotaro@lab.ntt.co.jp">https://postgr.es/m/20180307.163428.209919771.horiguchi.kyotaro@lab.ntt.co.jp</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f4a2842ac37f6fffe793ac7a30f8141bf42faae8">https://git.postgresql.org/pg/commitdiff/f4a2842ac37f6fffe793ac7a30f8141bf42faae8</a></li>

<li>Add missing debug lines during bootstrap. Noticed while playing with changes that mess with the bootstrap sequence; the operations patched here failed to emit anything, leading the developer to think that the bug was in the previous operation that did emit a message. <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/f9d34ce4e798ca768e28aea3703464db3179adcf">https://git.postgresql.org/pg/commitdiff/f9d34ce4e798ca768e28aea3703464db3179adcf</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Fix typo for RangeVarGetRelidExtended. The function is actually RangeVarGetRelidExtended, so the comment should reflect that. Author: Michael Paquier Discussion: <a target="_blank" href="https://postgr.es/m/20180307035216.GA3184@paquier.xyz">https://postgr.es/m/20180307035216.GA3184@paquier.xyz</a> <a target="_blank" href="https://git.postgresql.org/pg/commitdiff/06ca148430e45a68ad20172fc8a5bd353b6351e0">https://git.postgresql.org/pg/commitdiff/06ca148430e45a68ad20172fc8a5bd353b6351e0</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Amit Langote sent in a patch to fix an infelicity between partitions and WCO quals on parent tables.</p>

<p>Thomas Munro sent in a patch to fix a typo in src/backend/access/hash/README.</p>

<p>Rajkumar Raghuwanshi sent in another revision of a patch to implement partition-wise JOIN, accounting for default partitions.</p>

<p>Fabien COELHO sent in another revision of a patch to add a --random-seed option to pgbench.</p>

<p>Fabien COELHO sent in another revision of a patch to add a pgbench "progress" test.</p>

<p>Micha&euml;l Paquier sent in a patch to fix a particle before SQL.</p>

<p>Claudio Freire sent in another revision of a patch to update the FSM more frequently in VACUUM.</p>

<p>Andrey Borodin sent in a patch to fill in missing pieces of the SLRU checksum patch.</p>

<p>Nikhil Sontakke sent in another revision of a patch to implement logical decoding of two-phase transactions.</p>

<p>Heikki Linnakangas sent in another revision of a patch to speed up crc32 on ARM64.</p>

<p>Satyanarayana Narlapuram sent in another revision of a patch to add client connection redirection support to PostgreSQL.</p>

<p>Michael Banck and &Aacute;lvaro Herrera traded patches to allow parallel pg_dump to /dev/nul</p>

<p>Daniel Gustafsson sent in another revision of a patch to refactor backend signalling code and use the new infrastructure to support an optional message in backend cancel/terminate.</p>

<p>Peter Eisentraut sent in two more revisions of a patch to allow INOUT parameters in PROCEDUREs.</p>

<p>Jeevan Chalke, Robert Haas, and Ashutosh Bapat traded patches to implement partition-wise aggregation/grouping.</p>

<p>David Steele sent in three more revisions of a patch to make it possible to allow group read access on the filesystem.</p>

<p>Michael Banck sent in two more revisions of a patch to verify checksums during basebackups.</p>

<p>Alexander Korotkov sent in another revision of a patch to implement incremental sort.</p>

<p>Pavan Deolasee sent in three more revisions of a patch to implement MERGE.</p>

<p>David Steele sent in a patch to add regression tests for reinit.c.</p>

<p>Dean Rasheed sent in two more revisions of a patch to improve MCV lists for highly skewed distributions.</p>

<p>David Rowley sent in two more revisions of a patch to make array_agg and string_agg parallelizable.</p>

<p>Etsuro Fujita and Amit Langote traded patches to fix an issue where inserts into a partitioned table could cause a crash.</p>

<p>Micha&euml;l Paquier extend lookup routines for FDW and foreign server with NULL handling, refactor routines for subscription and publication lookups, and eliminate user-visible cache lookup errors for objaddr SQL functions.</p>

<p>Aleksandr Parfenov sent in another revision of a patch to add a flexible configuration for full-text search.</p>

<p>Dmitry Dolgov sent in another revision of a patch to implement generic type subscripting.</p>

<p>Craig Ringer sent in another revision of a patch to clean up reorder buffer files when starting logical decoding.</p>

<p>Peter Eisentraut sent in a patch to fix test counting in SSL tests.</p>

<p>Stephen Frost sent in another revision of a patch to rewrite the pg_dump TAP tests.</p>

<p>Artur Zakirov sent in another revision of a patch to implement shared ISpell dictionaries.</p>

<p>Nikita Glukhov sent in two more revisions of a patch to implement JSONPATH.</p>

<p>Nikita Glukhov sent in two more revisions of a patch to implement SQL/JSON functions.</p>

<p>Nikita Glukhov sent in two more revisions of a patch to implement JSON_TABLE.</p>

<p>Stephen Frost sent in two more revisions of a patch to add a default role 'pg_access_server_files'.</p>

<p>Edmund Horner sent in two more revisions of a patch to add tab completion for SELECT in psql.</p>

<p>Sergei Kornilov sent in three more revisions of a patch to skip NOT NULL checks in ALTER TABLE when appropriate CHECKs already enforce them.</p>

<p>Michail Nikolaev sent in two more revisions of a patch to use indexes for OFFSETs and GROUP BY where possible.</p>

<p>David Rowley sent in a patch to disable physical tlists in ALTER TABLE ... ADD COLUMN ... DEFAULT.</p>

<p>Ashutosh Bapat add a missing break statement after transformCallStmt in transformStmt.</p>

<p>Andrey Borodin sent in another revision of a patch to implement GiST VACUUM.</p>

<p>Kyotaro HORIGUCHI sent in a patch to ensure that cursor position is not added when hide_stmt is set.</p>

<p>&Aacute;lvaro Herrera sent in another revision of a patch to implement foreign key arrays.</p>

<p>Ildar Musin sent in another revision of a patch to add a general purpose hashing function to pgbench.</p>

<p>Nikolay Shaplov sent in another revision of a patch to add an enum relation option type.</p>

<p>Fabr&iacute;zio de Royes Mello sent in a patch to fix missing spaces in the docs.</p>

<p>Robert Haas and Rajkumar Raghuwanshi traded patches to fix an infelicity between parallel append and a simple UNION ALL.</p>

<p>Kyotaro HORIGUCHI sent in two more revisions of a patch to remove catcache entries that haven't been used for a certain time.</p>

<p>Daniel V&eacute;rit&eacute; sent in another revision of a patch to implement a csv table format for psql.</p>

<p>&Aacute;lvaro Herrera sent in four more revisions of a patch to implement FOR EACH ROW triggers on partitioned tables.</p>

<p>Peter Geoghegan sent in a patch to report query text in parallel CREATE INDEX workers.</p>

<p>Masahiko Sawada sent in another revision of a patch to improve messaging during logical replication worker.</p>

<p>Anastasia Lubennikova sent in another revision of a patch to implement Covering + unique indexes.</p>

<p>Pavel St&#283;hule sent in another revision of a patch to implement schema variables.</p>

<p>Peter Eisentraut sent in another revision of a patch to support GNUTLS as an SSL option.</p>

<p>Julian Markwort sent in another revision of a patch to add plans to pg_stat_statements.</p>

<p>Tomas Vondra sent in a patch to use a sort-based approach to speed up XidInMVCCSnapshot.</p>

<p>Amit Khandekar sent in a patch to fix a concurrency bug in UPDATEs of partition key.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to remove dynamic_shared_memroy_type=none.</p>

<p>Dilip Kumar sent in a patch to fix fpwupdate.</p>

<p>John Naylor sent in another revision of a patch to rationalize the handling of bootstrap data.</p>

<p>Peter Eisentraut sent in another revision of a patch to track statistics for streaming spilling.</p>

<p>Masahiko Sawada sent in another revision of a patch to report autovac workitem request failure.</p>

<p>Amul Sul sent in another revision of a patch to restrict concurrent update/delete with UPDATE of partition key.</p>

<p>Alexander Korotkov and Masahiko Sawada traded patches to add a GUC for cleanup indexes threshold.</p>

<p>Takayuki Tsunakawa and Micha&euml;l Paquier traded patches to fix a bug where pg_rewind creates corrupt WAL files, and the standby cannot catch up the primary.</p>

<p>Micha&euml;l Paquier sent in a patch to fix some missing schema qualifications.</p>

<p>Yura Sokolov sent in another revision of a patch to make a hash table for xip in XidInMVCCSnapshot.</p>

<p>Tom Lane sent in a patch to fix bogus use of canonicalize_qual.</p>

<p>Amit Kapila sent in two more revisions of a patch to implement Predicate Locking in hash index.</p>

<p>Tomas Vondra sent in another revision of a patch to implement multivariate histograms and MCV lists.</p>

<p>Amit Kapila sent in another revision of a patch to ensure that parallel paths include tlist cost.</p>

<p>Peter Eisentraut sent in a patch to set libpq sslcompression to off by default.</p>

<p>Peter Geoghegan sent in a patch to fix corruption of backend REINDEX processing state.</p>

<p>&Aacute;lvaro Herrera sent in another revision of a patch to allow foreign keys and partitioned tables.</p>