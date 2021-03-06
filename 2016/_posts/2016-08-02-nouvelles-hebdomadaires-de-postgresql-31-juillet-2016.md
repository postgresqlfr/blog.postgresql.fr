---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 31 juillet 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/08/02/Nouvelles-hebdomadaires-de-PostgreSQL-31-juillet-2016"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>psqlODBC 09.05.0400&nbsp;: <a target="_blank" href="https://odbc.postgresql.org/docs/release.html">https://odbc.postgresql.org/docs/release.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en juillet</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-07/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PostgresOpen 2016 aura lieu &agrave; Dallas (Texas, USA) du 13 au 16 septembre. L'appel &agrave; conf&eacute;renciers &agrave; &eacute;t&eacute; lanc&eacute;&nbsp;: <a target="_blank" href="https://2016.postgresopen.org/callforpapers/">https://2016.postgresopen.org/callforpapers/</a></li>

<li>Session PostgreSQL le 22 septembre 2016 &agrave; Lyon (France). La date limite de candidature est le 20 mai : envoyez vos propositions &agrave; call-for-paper AT postgresql-sessions DOT org. [ndt: <a href="http://www.postgresql-sessions.org/8/start" target="_blank">http://www.postgresql-sessions.org/</a>]</li>

<li>La <em>PgConf Silicon Valley 2016</em> aura lieu du 14 au 16 novembre 2016&nbsp;: <a target="_blank" href="http://www.pgconfsv.com/">http://www.pgconfsv.com/</a></li>

<li>CHAR(16) aura lieu &agrave; New York le 6 d&eacute;cembre 2016. L'appel &agrave; conf&eacute;renciers court jusqu'au 13 septembre, minuit (EDT)&nbsp;: <a target="_blank" href="http://charconference.org/">http://charconference.org/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20160801033117.GC11839@fetter.org">http://www.postgresql.org/message-id/20160801033117.GC11839@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>&Aacute;lvaro Herrera pushed:</p>

<ul>

<li>Give recovery tests more time to finish. These tests are currently only running in buildfarm member hamster, which is purposefully very slow. This suite has failed a couple of times recently because of timeouts, so increase the allowed number of iterations to avoid spurious failures. Author: Micha&euml;l Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a0f89cd717ce6d49cdc47850577823682167e87">http://git.postgresql.org/pg/commitdiff/2a0f89cd717ce6d49cdc47850577823682167e87</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix typo in comment. Author: Masahiko Sawada <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1804d1555f56fcad4ce62e160bab17bdff6c94aa">http://git.postgresql.org/pg/commitdiff/1804d1555f56fcad4ce62e160bab17bdff6c94aa</a></li>

<li>Fix improper example of using psql() function in TAP tests documentation. In an example of TAP test scripts, there is the test checking whether the result of the query is expected or not. But, in previous example, the exit code of psql instead of the query result was checked unexpectedly. Author: Ildar Musin <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c1a95425780ef8e72c2f65504a7e90bcb223ca4a">http://git.postgresql.org/pg/commitdiff/c1a95425780ef8e72c2f65504a7e90bcb223ca4a</a></li>

<li>Fix incorrect description of udt_privileges view in documentation. The description of udt_privileges view contained an incorrect copy-pasted word. Back-patch to 9.2 where udt_privileges view was added. Author: Alexander Law <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de8c92e6caf0cd8683b23a222d4bd88a90496840">http://git.postgresql.org/pg/commitdiff/de8c92e6caf0cd8683b23a222d4bd88a90496840</a></li>

</ul>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Message style improvements <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/40fcfec82cf695d520f2dd91ee437fa75dea4ca7">http://git.postgresql.org/pg/commitdiff/40fcfec82cf695d520f2dd91ee437fa75dea4ca7</a></li>

<li>Fix typo <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43c2c404978a89e9e5ea51aca5759a35f3f302f9">http://git.postgresql.org/pg/commitdiff/43c2c404978a89e9e5ea51aca5759a35f3f302f9</a></li>

<li>Message style improvements <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ef5d4a3cfacb009526aac3e01a26f4b54d70bfd7">http://git.postgresql.org/pg/commitdiff/ef5d4a3cfacb009526aac3e01a26f4b54d70bfd7</a></li>

<li>Documentation spell checking and markup improvements <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5676da2d01bb6ba437cf05d748f04b3d31676922">http://git.postgresql.org/pg/commitdiff/5676da2d01bb6ba437cf05d748f04b3d31676922</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Fix constant-folding of ROW(...) IS [NOT] NULL with composite fields. The SQL standard appears to specify that IS [NOT] NULL's tests of field nullness are non-recursive, ie, we shouldn't consider that a composite field with value ROW(NULL,NULL) is null for this purpose. ExecEvalNullTest got this right, but eval_const_expressions did not, leading to weird inconsistencies depending on whether the expression was such that the planner could apply constant folding. Also, adjust the docs to mention that IS [NOT] DISTINCT FROM NULL can be used as a substitute test if a simple null check is wanted for a rowtype argument. That motivated reordering things so that IS [NOT] DISTINCT FROM is described before IS [NOT] NULL. In HEAD, I went a bit further and added a table showing all the comparison-related predicates. Per bug #14235. Back-patch to all supported branches, since it's certainly undesirable that constant-folding should change the semantics. Report and patch by Andrew Gierth; assorted wordsmithing and revised regression test cases by me. Report: &lt;20160708024746.1410.57282@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4452000f310b8c1c947ee724618c1bc31ed20242">http://git.postgresql.org/pg/commitdiff/4452000f310b8c1c947ee724618c1bc31ed20242</a></li>

<li>Allow functions that return sets of tuples to return simple NULLs. ExecMakeTableFunctionResult(), which is used in SELECT FROM function(...) cases, formerly treated a simple NULL output from a function that both returnsSet and returnsTuple as a violation of the SRF protocol. What seems better is to treat a NULL output as equivalent to ROW(NULL,NULL,...). Without this, cases such as SELECT FROM unnest(...) on an array of composite are vulnerable to unexpected and not-very-helpful failures. Old code comments here suggested an alternative of just ignoring simple-NULL outputs, but that doesn't seem very principled. This change had been hung up for a long time due to uncertainty about how much we wanted to buy into the equivalence of simple NULL and ROW(NULL,NULL,...). I think that's been mostly resolved by the discussion around bug #14235, so let's go ahead and do it. Per bug #7808 from Joe Van Dyk. Although this is a pretty old report, fixing it smells a bit more like a new feature than a bug fix, and the lack of other similar complaints suggests that we shouldn't take much risk of destabilization by back-patching. (Maybe that could be revisited once this patch has withstood some field usage.) Andrew Gierth and Tom Lane Report: &lt;E1TurJE-0006Es-TK@wrigleys.postgresql.org&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8411a6c8b6e5f74b362ef2496723f7f88593737">http://git.postgresql.org/pg/commitdiff/d8411a6c8b6e5f74b362ef2496723f7f88593737</a></li>

<li>Fix cost_rescan() to account for multi-batch hashing correctly. cost_rescan assumed that we don't need to rebuild the hash table when rescanning a hash join. However, that's currently only true for single-batch joins; for a multi-batch join we must charge full freight. This probably has escaped notice because we'd be unlikely to put a hash join on the inside of a nestloop anyway. Nonetheless, it's wrong. Fix in HEAD, but don't backpatch for fear of destabilizing plans in stable releases. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69995c3b3fd64361bb4d3938315f3e88ccc01e53">http://git.postgresql.org/pg/commitdiff/69995c3b3fd64361bb4d3938315f3e88ccc01e53</a></li>

<li>tqueue.c's record-typmod hashtables need the HASH_BLOBS option. The keys are integers, not strings. The code accidentally worked on little-endian machines, at least up to 256 distinct record types within a session, but failed utterly on big-endian. This was unexpectedly exposed by a test case added by commit 4452000f3, which apparently is the only parallelizable query in the regression suite that uses more than one anonymous record type. Fortunately, buildfarm member mandrill is big-endian and is running with force_parallel_mode on, so it failed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1a93dd6ae114669669e3a77167dc3d3bd91e035">http://git.postgresql.org/pg/commitdiff/e1a93dd6ae114669669e3a77167dc3d3bd91e035</a></li>

<li>Register atexit hook only once in pg_upgrade. start_postmaster() registered stop_postmaster_atexit as an atexit(3) callback each time through, although the obvious intention was to do so only once per program run. The extra registrations were harmless, so long as we didn't exceed ATEXIT_MAX, but still it's a bug. Artur Zakirov, with bikeshedding by Kyotaro Horiguchi and me Discussion: &lt;d279e817-02b5-caa6-215f-cfb05dce109a@postgrespro.ru&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9e74959a7fabe57e38bdda430aa662445bd1dd6">http://git.postgresql.org/pg/commitdiff/d9e74959a7fabe57e38bdda430aa662445bd1dd6</a></li>

<li>Improve documentation about CREATE TABLE ... LIKE. The docs failed to explain that LIKE INCLUDING INDEXES would not preserve the names of indexes and associated constraints. Also, it wasn't mentioned that EXCLUDE constraints would be copied by this option. The latter oversight seems enough of a documentation bug to justify back-patching. In passing, do some minor copy-editing in the same area, and add an entry for LIKE under "Compatibility", since it's not exactly a faithful implementation of the standard's feature. Discussion: &lt;20160728151154.AABE64016B@smtp.hushmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/46b773d4fe0f0c880a1073cb5366efa02efa8ef8">http://git.postgresql.org/pg/commitdiff/46b773d4fe0f0c880a1073cb5366efa02efa8ef8</a></li>

<li>Fix assorted fallout from IS [NOT] NULL patch. Commits 4452000f3 et al established semantics for NullTest.argisrow that are a bit different from its initial conception: rather than being merely a cache of whether we've determined the input to have composite type, the flag now has the further meaning that we should apply field-by-field testing as per the standard's definition of IS [NOT] NULL. If argisrow is false and yet the input has composite type, the construct instead has the semantics of IS [NOT] DISTINCT FROM NULL. Update the comments in primnodes.h to clarify this, and fix ruleutils.c and deparse.c to print such cases correctly. In the case of ruleutils.c, this merely results in cosmetic changes in EXPLAIN output, since the case can't currently arise in stored rules. However, it represents a live bug for deparse.c, which would formerly have sent a remote query that had semantics different from the local behavior. (From the user's standpoint, this means that testing a remote nested-composite column for null-ness could have had unexpected recursive behavior much like that fixed in 4452000f3.) In a related but somewhat independent fix, make plancat.c set argisrow to false in all NullTest expressions constructed to represent "attnotnull" constructs. Since attnotnull is actually enforced as a simple null-value check, this is a more accurate representation of the semantics; we were previously overpromising what it meant for composite columns, which might possibly lead to incorrect planner optimizations. (It seems that what the SQL spec expects a NOT NULL constraint to mean is an IS NOT NULL test, so arguably we are violating the spec and should fix attnotnull to do the other thing. If we ever do, this part should get reverted.) Back-patch, same as the previous commit. Discussion: &lt;10682.1469566308@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9492cf86e40288395a2ec6d81f7f5417e0e1b4fa">http://git.postgresql.org/pg/commitdiff/9492cf86e40288395a2ec6d81f7f5417e0e1b4fa</a></li>

<li>Teach parser to transform "x IS [NOT] DISTINCT FROM NULL" to a NullTest. Now that we've nailed down the principle that NullTest with !argisrow is fully equivalent to SQL's IS [NOT] DISTINCT FROM NULL, let's teach the parser about it. This produces a slightly more compact parse tree and is much more amenable to optimization than a DistinctExpr, since the planner knows a good deal about NullTest and next to nothing about DistinctExpr. I'm not sure that there are all that many queries in the wild that could be improved by this, but at least one source of such cases is the patch just made to postgres_fdw to emit IS [NOT] DISTINCT FROM NULL when IS [NOT] NULL isn't semantically correct. No back-patch, since to the extent that this does affect planning results, it might be considered undesirable plan destabilization. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d19d0e139238cdcb3f1f7e1adc4ff959562822f">http://git.postgresql.org/pg/commitdiff/8d19d0e139238cdcb3f1f7e1adc4ff959562822f</a></li>

<li>Guard against empty buffer in gets_fromFile()'s check for a newline. Per the fgets() specification, it cannot return without reading some data unless it reports EOF or error. So the code here assumed that the data buffer would necessarily be nonempty when we go to check for a newline having been read. However, Agostino Sarubbo noticed that this could fail to be true if the first byte of the data is a NUL (\0). The fgets() API doesn't really work for embedded NULs, which is something I don't feel any great need for us to worry about since we generally don't allow NULs in SQL strings anyway. But we should not access off the end of our own buffer if the case occurs. Normally this would just be a harmless read, but if you were unlucky the byte before the buffer would contain '\n' and we'd overwrite it with '\0', and if you were really unlucky that might be valuable data and psql would crash. Agostino reported this to pgsql-security, but after discussion we concluded that it isn't worth treating as a security bug; if you can control the input to psql you can do far more interesting things than just maybe-crash it. Nonetheless, it is a bug, so back-patch to all supported versions. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed0b228d7a6b5186adc099f6a31dc33c499ff077">http://git.postgresql.org/pg/commitdiff/ed0b228d7a6b5186adc099f6a31dc33c499ff077</a></li>

<li>Fix pq_putmessage_noblock() to not block. An evident copy-and-pasteo in commit 2bd9e412f broke the non-blocking aspect of pq_putmessage_noblock(), causing it to behave identically to pq_putmessage(). That function is nowadays used only in walsender.c, so that the net effect was to cause walsenders to hang up waiting for the receiver in situations where they should not. Kyotaro Horiguchi Patch: &lt;20160728.185228.58375982.horiguchi.kyotaro@lab.ntt.co.jp&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/80b346c2084928c11b6f9e495a7e9d559d96703d">http://git.postgresql.org/pg/commitdiff/80b346c2084928c11b6f9e495a7e9d559d96703d</a></li>

<li>Fix tqueue.c's range-remapping code. It's depressingly clear that nobody ever tested this. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf4ae685ae6f37b7fe83336abacf44298431b2f0">http://git.postgresql.org/pg/commitdiff/bf4ae685ae6f37b7fe83336abacf44298431b2f0</a></li>

<li>Fix worst memory leaks in tqueue.c. TupleQueueReaderNext() leaks like a sieve if it has to do any tuple disassembly/reconstruction. While we could try to clean up its allocations piecemeal, it seems like a better idea just to insist that it should be run in a short-lived memory context, so that any transient space goes away automatically. I chose to have nodeGather.c switch into its existing per-tuple context before the call, rather than inventing a separate context inside tqueue.c. This is sufficient to stop all leakage in the simple case I exhibited earlier today (see link below), but it does not deal with leaks induced in more complex cases by tqueue.c's insistence on using TopMemoryContext for data that it's not actually trying hard to keep track of. That issue is intertwined with another major source of inefficiency, namely failure to cache lookup results across calls, so it seems best to deal with it separately. In passing, improve some comments, and modify gather_readnext's method for deciding when it's visited all the readers so that it's more obviously correct. (I'm not actually convinced that the previous code *is* correct in the case of a reader deletion; it certainly seems fragile.) Discussion: &lt;32763.1469821037@sss.pgh.pa.us&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/af33039317ddc4a0e38a02e2255c2bf453115fd2">http://git.postgresql.org/pg/commitdiff/af33039317ddc4a0e38a02e2255c2bf453115fd2</a></li>

<li>Code review for tqueue.c: fix memory leaks, speed it up, other fixes. When doing record typmod remapping, tqueue.c did fresh catalog lookups for each tuple it processed, which was pretty horrible performance-wise (it seemed to about halve the already none-too-quick speed of bulk reads in parallel mode). Worse, it insisted on putting bits of that data into TopMemoryContext, from where it never freed them, causing a session-lifespan memory leak. (I suppose this was coded with the idea that the sender process would quit after finishing the query --- but the receiver uses the same code.) Restructure to avoid repetitive catalog lookups and to keep that data in a query-lifespan context, in or below the context where the TQueueDestReceiver or TupleQueueReader itself lives. Fix some other bugs such as continuing to use a tupledesc after releasing our refcount on it. Clean up cavalier datatype choices (typmods are int32, please, not int, and certainly not Oid). Improve comments and error message wording. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9ed875fdc2c44b5793a07727274786b417fc924">http://git.postgresql.org/pg/commitdiff/a9ed875fdc2c44b5793a07727274786b417fc924</a></li>

<li>Doc: remove claim that hash index creation depends on effective_cache_size. This text was added by commit ff213239c, and not long thereafter obsoleted by commit 4adc2f72a (which made the test depend on NBuffers instead); but nobody noticed the need for an update. Commit 9563d5b5e adds some further dependency on maintenance_work_mem, but the existing verbiage seems to cover that with about as much precision as we really want here. Let's just take it all out rather than leaving ourselves open to more errors of omission in future. (That solution makes this change back-patchable, too.) Noted by Peter Geoghegan. Discussion: &lt;CAM3SWZRVANbj9GA9j40fAwheQCZQtSwqTN1GBTVwRrRbmSf7cg@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11653cd87f66fc55ab79683a3ba7e6fe1a299596">http://git.postgresql.org/pg/commitdiff/11653cd87f66fc55ab79683a3ba7e6fe1a299596</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Repair damage done by citext--1.1--1.2.sql. That script is incorrect in that it sets the combine function for max(citext) twice instead of setting the combine function for max(citext) once and the combine functon for min(citext) once. The consequence is that if you install 1.0 or 1.1 and then update to 1.2, you end up with min(citext) not having a combine function, contrary to what was intended. If you install 1.2 directly, you're OK. Fix things up by defining a new 1.3 version. Upgrading from 1.2 to 1.3 won't change anything for people who first installed the 1.2 version, but people upgrading from 1.0 or 1.1 will get the right catalog contents once they reach 1.3. Report and patch by David Rowley, reviewed by Andreas Karlsson. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe5e3fce798dccf3f298b65c5d9a132e9646712a">http://git.postgresql.org/pg/commitdiff/fe5e3fce798dccf3f298b65c5d9a132e9646712a</a></li>

<li>Change various deparsing functions to return NULL for invalid input. Previously, some functions returned various fixed strings and others failed with a cache lookup error. Per discussion, standardize on returning NULL. Although user-exposed "cache lookup failed" error messages might normally qualify for bug-fix treatment, no back-patch; the risk of breaking user code which is accustomed to the current behavior seems too high. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/976b24fb477464907737d28cdf18e202fa3b1a5b">http://git.postgresql.org/pg/commitdiff/976b24fb477464907737d28cdf18e202fa3b1a5b</a></li>

<li>Fix thinko in copyParamList. There's no point in consulting retval-&gt;paramMask; it's always NULL. Instead, we should consult from-&gt;paramMask. Reported by Andrew Gierth. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b31875b1fe7131ac29f118efd81c9aba7255eced">http://git.postgresql.org/pg/commitdiff/b31875b1fe7131ac29f118efd81c9aba7255eced</a></li>

<li>Eliminate a few more user-visible "cache lookup failed" errors. Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3153b1a52f8f2d1efe67306257aec15aaaf9e94c">http://git.postgresql.org/pg/commitdiff/3153b1a52f8f2d1efe67306257aec15aaaf9e94c</a></li>

</ul>

<p>Bruce Momjian pushed:</p>

<ul>

<li>docs: properly capitalize and space kB, MB, GB, TB <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca0c37b56f4a80ad758774e34c86cc4335583d29">http://git.postgresql.org/pg/commitdiff/ca0c37b56f4a80ad758774e34c86cc4335583d29</a></li>

<li>pgbench docs: fix incorrect "last two" fields text. Reported-by: Alexander Law Discussion: 5786638C.8080508@gmail.com Backpatch-through: 9.4 <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e765bb10fcb1438806bc139e243871234990423">http://git.postgresql.org/pg/commitdiff/9e765bb10fcb1438806bc139e243871234990423</a></li>

<li>doc: improve wording of Error Message Style Guide. Reported-by: Daniel Gustafsson Discussion: 48DB4EDA-96F8-4B2F-99C4-110900FC7540@yesql.se Author: Daniel Gustafsson <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6335c80ef417b58f657fe9bc21f99edd79511f30">http://git.postgresql.org/pg/commitdiff/6335c80ef417b58f657fe9bc21f99edd79511f30</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Correctly handle owned sequences with extensions. With the refactoring of pg_dump to handle components, getOwnedSeqs needs to be a bit more intelligent regarding which components to dump when. Specifically, we can't simply use the owning table's components as the set of components to dump as the table might only be including certain components while all components of the sequence should be dumped, for example, when the table is a member of an extension while the sequence is not. Handle this by combining the set of components to be dumped for the sequence explicitly and those to be dumped for the table when setting the components to be dumped for the sequence. Also add a number of regression tests around this to, hopefully, catch any future changes which break the expected behavior. Discovered by: Philippe BEAUDOIN Reviewed by: Michael Paquier <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9e439b1ca81e3305b677d93c67299549625370c">http://git.postgresql.org/pg/commitdiff/f9e439b1ca81e3305b677d93c67299549625370c</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Thomas Munro sent in three more revisions of a patch to add LWLocks for DSM memory.</p>

<p>Micha&euml;l Paquier sent in another revision of a patch to add SCRAM-SHA-256 authentication over the SASL communication protocol.</p>

<p>Kyotaro HORIGUCHI sent in a patch to remove validation status condition from equalTupleDescs.</p>

<p>Amit Langote sent in a patch to make equalTupleDescs() parameterized on whether or not to performed an equality check on TupleConstr.</p>

<p>Kyotaro HORIGUCHI sent in a patch to split equalTupleDescs into two functions.</p>

<p>Tom Lane sent in a patch to create statement-level temporary memory contexts in plpgsql.</p>

<p>Heikki Linnakangas sent in a patch to optimize SUM().</p>

<p>Fujii Masao sent in a patch to add a 0 as a possible backup compression level for pg_basebackup.</p>

<p>Amit Langote sent in a patch to fix a comment on ATExecValidateConstraint.</p>

<p>Andrew Borodin sent in two more revisions of a patch to optimize GiST and BRIN memmoves.</p>

<p>Thomas Munro sent in a patch to clarify the meaning of NOT NULL constraints in light of implementation details.</p>

<p>Amit Kapila sent in a patch to fix some locking and pinning issues in the freeze map code.</p>

<p>John Harvey and Micha&euml;l Paquier traded patches to fix an issue with Perl on Windows.</p>

<p>Andrew Gierth sent in a patch to document the new index description functions which replace functionality taken out of the catalog.</p>

<p>Andres Freund sent in a PoC patch to add a new high-performance hashing function.</p>

<p>David Fetter sent in another revision of a patch to allow disallowing UPDATEs and DELETEs that lack a WHERE clause.</p>

<p>Etsuro Fujita sent in a patch to make the FDW infrastructure be more explicit about what foreign objects it is joining remotely.</p>

<p>Robert Haas sent in two revisions of a patch intended to fix an issue where old_snapshot_threshold allows heap:toast disagreement.</p>

<p>Tom Lane sent in a patch to fix an issue with target-column indirection in INSERT with multiple VALUES.</p>

<p>Aleksander Alekseev sent in two revisions of a patch to fix the RBtree iteration interface.</p>

<p>Fujii Masao sent in a patch to remove some unneeded arguments from the definition of pg_replication_origin_xact_reset().</p>

<p>Alexey Grishchenko sent in a patch to fix a slowness in PL/Python input array traversal.</p>

<p>Thomas Munro sent in a patch to remove a double invocation of InitPostmasterChild in bgworker with -DEXEC_BACKEND.</p>

<p>Micha&euml;l Paquier sent in two more revisions of a patch to fix wal level minimal.</p>

<p>Aleksander Alekseev sent in a patch to make a faster version of temporary tables by not making a catalog entry.</p>