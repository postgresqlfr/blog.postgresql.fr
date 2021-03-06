---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 5 février 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/02/10/Nouvelles-hebdomadaires-de-PostgreSQL-5-février-2012"
---


<p>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></p>

<p>Le <em>PGDay NYC</em> aura lieu le 2 avril 2012 au <em>Lighthouse International</em> &agrave; New-York&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org">http://pgday.nycpug.org</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>MyJSQLView Version 3.31&nbsp;: 

<a target="_blank" href="http://dandymadeproductions.com/projects/MyJSQLView/">http://dandymadeproductions.com/projects/MyJSQLView/</a></li>

<li>Slony-I 2.1.1 &amp; 1.2.23&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague.</li>

<li>Le <em>PGDay NYC</em> aura lieu le 2 avril 2012 au <em>Lighthouse International</em> &agrave; New-York&nbsp;: 

<a target="_blank" href="http://pgday.nycpug.org">http://pgday.nycpug.org</a></li>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-02/msg00002.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Accept a non-existent value in "ALTER USER/DATABASE SET ..." command. When default_text_search_config, default_tablespace, or temp_tablespaces setting is set per-user or per-database, with an "ALTER USER/DATABASE SET ..." statement, don't throw an error if the text search configuration or tablespace does not exist. In case of text search configuration, even if it doesn't exist in the current database, it might exist in another database, where the setting is intended to have its effect. This behavior is now the same as search_path's. Tablespaces are cluster-wide, so the same argument doesn't hold for tablespaces, but there's a problem with pg_dumpall: it dumps "ALTER USER SET ..." statements before the "CREATE TABLESPACE" statements. Arguably that's pg_dumpall's fault - it should dump the statements in such an order that the tablespace is created first and then the "ALTER USER SET default_tablespace ..." statements after that - but it seems better to be consistent with search_path and default_text_search_config anyway. Besides, you could still create a dump that throws an error, by creating the tablespace, running "ALTER USER SET default_tablespace", then dropping the tablespace and running pg_dumpall on that. Backpatch to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5782570402988205b3a42ed40f7bc157eac21fc">http://git.postgresql.org/pg/commitdiff/a5782570402988205b3a42ed40f7bc157eac21fc</a></li>

<li>Make group commit more effective. When a backend needs to flush the WAL, and someone else is already flushing the WAL, wait until it releases the WALInsertLock and check if we still need to do the flush or if the other backend already did the work for us, before acquiring WALInsertLock. This helps group commit, because when the WAL flush finishes, all the backends that were waiting for it can be woken up in one go, and the can all concurrently observe that they're done, rather than waking them up one by one in a cascading fashion. This is based on a new LWLock function, LWLockWaitUntilFree(), which has peculiar semantics. If the lock is immediately free, it grabs the lock and returns true. If it's not free, it waits until it is released, but then returns false without grabbing the lock. This is used in XLogFlush(), so that when the lock is acquired, the backend flushes the WAL, but if it's not, the backend first checks the current flush location before retrying. Original patch and benchmarking by Peter Geoghegan and Simon Riggs, although this patch as committed ended up being very different from that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b38d46d9f5517dab67dda1dd0459683fc9cda9f">http://git.postgresql.org/pg/commitdiff/9b38d46d9f5517dab67dda1dd0459683fc9cda9f</a></li>

<li>Fix bug in the new wait-until-lwlock-is-free mechanism. If there was a wait-until-free process in the head of the wait queue, followed by an exclusive locker, the exclusive locker was not be woken up as it should. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82d4b262d9614958da38003cdc9d56915d9bcda0">http://git.postgresql.org/pg/commitdiff/82d4b262d9614958da38003cdc9d56915d9bcda0</a></li>

<li>Print function signature, not just name, in PL/pgSQL error messages. This makes it unambiguous which function the message is coming from, if you have overloaded functions. Pavel Stehule, reviewed by Abhijit Menon-Sen. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c6cedd1b014abf2046886a9a92e10e18f0d658e">http://git.postgresql.org/pg/commitdiff/4c6cedd1b014abf2046886a9a92e10e18f0d658e</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Various minor comments changes from bgwriter to checkpointer. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73f617f13f4ca185977d9f7b09bf9edc491cd12f">http://git.postgresql.org/pg/commitdiff/73f617f13f4ca185977d9f7b09bf9edc491cd12f</a></li>

<li>Minor bug fix and cleanup from self-review of sync rep queues patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba1868ba3138b2119f8290969b9a3936fbc297ce">http://git.postgresql.org/pg/commitdiff/ba1868ba3138b2119f8290969b9a3936fbc297ce</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove prototype for nonexistent function. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/423ee49b491ee966aa06259772dc38819cab786a">http://git.postgresql.org/pg/commitdiff/423ee49b491ee966aa06259772dc38819cab786a</a></li>

<li>Built-in JSON data type. Like the XML data type, we simply store JSON data as text, after checking that it is valid. More complex operations such as canonicalization and comparison may come later, but this is enough for not. There are a few open issues here, such as whether we should attempt to detect UTF-8 surrogate pairs represented as \uXXXX\uYYYY, but this gets the basic framework in place. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5384a73f98d9829725186a7b65bf4f8adb3cfaf1">http://git.postgresql.org/pg/commitdiff/5384a73f98d9829725186a7b65bf4f8adb3cfaf1</a></li>

<li>Catversion bump for JSON patch. Sigh. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c327108140b5dfc4db1fcb9d9ca647f483e0a153">http://git.postgresql.org/pg/commitdiff/c327108140b5dfc4db1fcb9d9ca647f483e0a153</a></li>

<li>Adjust expected regression test outputs for PL/python. This got broken by commit 4c6cedd1b014abf2046886a9a92e10e18f0d658e, which caused PL/pgsql error messages to print the function signature, not just the name. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5ae88c65da7d893e304a51bfc57b46d8b7653bd0">http://git.postgresql.org/pg/commitdiff/5ae88c65da7d893e304a51bfc57b46d8b7653bd0</a></li>

<li>Avoid re-checking for visibility map extension too frequently. When testing bits (but not when setting or clearing them), we now won't check whether the map has been extended. This significantly improves performance in the case where the visibility map doesn't exist yet, by avoiding an extra system call per tuple. To make sure backends notice eventually, send an smgr inval on VM extension. Dean Rasheed, with minor modifications by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4e0741727685443657b55932da0c06f028fbc00">http://git.postgresql.org/pg/commitdiff/b4e0741727685443657b55932da0c06f028fbc00</a></li>

<li>Allow spgist's text_ops to handle pattern-matching operators. This was presumably intended to work this way all along, but a few key bits of indxpath.c didn't get the memo. Robert Haas and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ed7445d7317318ffed0d8dac9a06611771d315b">http://git.postgresql.org/pg/commitdiff/0ed7445d7317318ffed0d8dac9a06611771d315b</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add sequence USAGE privileges to information schema. The sequence USAGE privilege is sufficiently similar to the SQL standard that it seems reasonable to show in the information schema. Also add some compatibility notes about it on the GRANT reference page. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82e83f46a2ed311c6e7536f607f73a6f2a1d7dea">http://git.postgresql.org/pg/commitdiff/82e83f46a2ed311c6e7536f607f73a6f2a1d7dea</a></li>

<li>Use abort() instead of exit() to abort library functions. In some hopeless situations, certain library functions in libpq and libpgport quit the program. Use abort() for that instead of exit(), so we don't interfere with the normal exit codes the program might use, we clearly signal the abnormal termination, and the caller has a chance of catching the termination. This was originally pointed out by Debian's Lintian program. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c6ea8ccea6bf23501962ddc7ac9ffdb99c8643e1">http://git.postgresql.org/pg/commitdiff/c6ea8ccea6bf23501962ddc7ac9ffdb99c8643e1</a></li>

<li>PL/Python: Add result metadata functions. Add result object functions .colnames, .coltypes, .coltypmods to obtain information about the result column names and types, which was previously not possible in the PL/Python SPI interface. reviewed by Abhijit Menon-Sen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee7fa66b19f5454fac07caee4b7798810b579a82">http://git.postgresql.org/pg/commitdiff/ee7fa66b19f5454fac07caee4b7798810b579a82</a></li>

<li>pg_dump: Add GCC noreturn attribute to appropriate functions. This is a small help to the compiler and static analyzers. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88a6ac9f93b138d39d08b9882b377539edf985f4">http://git.postgresql.org/pg/commitdiff/88a6ac9f93b138d39d08b9882b377539edf985f4</a></li>

<li>psql: Reduce the amount of const lies a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b77bfc37a1819fdfd3b767a52ff633cd28f9155">http://git.postgresql.org/pg/commitdiff/4b77bfc37a1819fdfd3b767a52ff633cd28f9155</a></li>

<li>psql: Case preserving completion of SQL key words. Instead of always completing SQL key words in upper case, look at the word being completed and match the case. reviewed by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69f4f1c3576abc535871c6cfa95539e32a36120f">http://git.postgresql.org/pg/commitdiff/69f4f1c3576abc535871c6cfa95539e32a36120f</a></li>

<li>initdb: Add options --auth-local and --auth-host. Reviewed by Robert Haas and Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a02339e9ba3f2f962c5967be8c5d053a1fa39d2">http://git.postgresql.org/pg/commitdiff/8a02339e9ba3f2f962c5967be8c5d053a1fa39d2</a></li>

<li>ecpg: Improve test building Further improve on commit c75e1436467f32a06b5ab9d594d2a390e7f4594d. Instead of building both .o files and binaries in the same make rule, just rely on the normal .c -&gt; .o rule. This will ensure that dependency tracking is used when enabled. To do this, disable the implicit direct .c -&gt; binary rule globally, which will also prevent the original problem (*.dSYM junk) from reappearing elsewhere.</li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Code review for plpgsql fn_signature patch. Don't quote the output of format_procedure(); it's already quoted quite enough. Remove the fn_name field, which was now just dead weight. Fix remaining expected-output files. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bef47331b6a1c0d081179a7fc9b82dd7e1862394">http://git.postgresql.org/pg/commitdiff/bef47331b6a1c0d081179a7fc9b82dd7e1862394</a></li>

<li>Try to be more consistent about accepting denormalized float8 numbers. On some platforms, strtod() reports ERANGE for a denormalized value (ie, one that can be represented as distinct from zero, but is too small to have full precision). On others, it doesn't. It seems better to try to accept these values consistently, so add a test to see if the result value indicates a true out-of-range condition. This should be okay per Single Unix Spec. On machines where the underlying math isn't IEEE standard, the behavior for such small numbers may not be very consistent, but then it wouldn't be anyway. Marti Raudsepp, after a proposal by Jeroen Vermeulen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c318aeed84438619fc6b8c647def1730a110f04b">http://git.postgresql.org/pg/commitdiff/c318aeed84438619fc6b8c647def1730a110f04b</a></li>

<li>Add some regression test cases for denormalized float8 input. This was submitted with the previous patch, but I'm committing it separately to ease backing it out if these results prove too unportable. Marti Raudsepp, after a proposal by Jeroen Vermeulen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/500cf66d5522b39ddfdc26b309f8b5b0e385f42e">http://git.postgresql.org/pg/commitdiff/500cf66d5522b39ddfdc26b309f8b5b0e385f42e</a></li>

<li>Revert "Add some regression test cases for denormalized float8 input." This reverts commit 500cf66d5522b39ddfdc26b309f8b5b0e385f42e. As was more or less expected, a small minority of platforms won't accept denormalized input even with the recent changes. It doesn't seem especially helpful to test this if we're going to have to provide an alternate expected-file to allow failure. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/342b83fdca6af04d86e761f4d8d79e5d598688cd">http://git.postgresql.org/pg/commitdiff/342b83fdca6af04d86e761f4d8d79e5d598688cd</a></li>

<li>Allow SQL-language functions to reference parameters by name. Matthew Draper, reviewed by Hitoshi Harada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bff0780cf5be2193a5bad0d3df2dbe143085264">http://git.postgresql.org/pg/commitdiff/9bff0780cf5be2193a5bad0d3df2dbe143085264</a></li>

<li>Improve comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee68a44106fa89b8efb2f21b71c3fcafaaf48851">http://git.postgresql.org/pg/commitdiff/ee68a44106fa89b8efb2f21b71c3fcafaaf48851</a></li>

<li>Add missing Assert and fix inaccurate elog message in standby_redo(). All other WAL redo routines either call RestoreBkpBlocks() or Assert that they haven't been passed any backup blocks. Make this one do likewise. Also, fix incorrect routine name in its failure message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2af72cefeaa15e27277d327783fdec2748d9b758">http://git.postgresql.org/pg/commitdiff/2af72cefeaa15e27277d327783fdec2748d9b758</a></li>

<li>Fix transient clobbering of shared buffers during WAL replay. RestoreBkpBlocks was in the habit of zeroing and refilling the target buffer; which was perfectly safe when the code was written, but is unsafe during Hot Standby operation. The reason is that we have coding rules that allow backends to continue accessing a tuple in a heap relation while holding only a pin on its buffer. Such a backend could see transiently zeroed data, if WAL replay had occasion to change other data on the page. This has been shown to be the cause of bug #6425 from Duncan Rance (who deserves kudos for developing a sufficiently-reproducible test case) as well as Bridget Frey's re-report of bug #6200. It most likely explains the original report as well, though we don't yet have confirmation of that. To fix, change the code so that only bytes that are supposed to change will change, even transiently. This actually saves cycles in RestoreBkpBlocks, since it's not writing the same bytes twice. Also fix seq_redo, which has the same disease, though it has to work a bit harder to meet the requirement. So far as I can tell, no other WAL replay routines have this type of bug. In particular, the index-related replay routines, which would certainly be broken if they had to meet the same standard, are not at risk because we do not have coding rules that allow access to an index page when not holding a buffer lock on it. Back-patch to 9.0 where Hot Standby was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/17118825b8164aac6d337b58cf66b17637c66a49">http://git.postgresql.org/pg/commitdiff/17118825b8164aac6d337b58cf66b17637c66a49</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Properly free the sslcompression field in PGconn. Marko Kreen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/21238deea50e194bfa1c844b01ffbd15ed56c01a">http://git.postgresql.org/pg/commitdiff/21238deea50e194bfa1c844b01ffbd15ed56c01a</a></li>

<li>Implement dry-run mode for pg_archivecleanup. In dry-run mode, just the name of the file to be removed is printed to stdout; this is so the user can easily plug it into another program through a pipe. If debug mode is also specified, a more verbose message is printed to stderr. Author: Gabriele Bartolini Reviewer: Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2e431a4db81a735d1474c4d1565a20b835878c9">http://git.postgresql.org/pg/commitdiff/b2e431a4db81a735d1474c4d1565a20b835878c9</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add array_to_json and row_to_json functions. Also move the escape_json function from explain.c to json.c where it seems to belong. Andrew Dunstan, Reviewd by Abhijit Menon-Sen. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39909d1d39ae57c3a655fc7010e394e26b90fec9">http://git.postgresql.org/pg/commitdiff/39909d1d39ae57c3a655fc7010e394e26b90fec9</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Applied Peter's patch to PQconnectdbParams in ecpglib instead of the old PQconectdb. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fc211f8277c06326fcd5012f7247528920376a4c">http://git.postgresql.org/pg/commitdiff/fc211f8277c06326fcd5012f7247528920376a4c</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove tabs in SGML file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/072ba77bffe005ccd6d1aaf8fff2c52ebed1a8b3">http://git.postgresql.org/pg/commitdiff/072ba77bffe005ccd6d1aaf8fff2c52ebed1a8b3</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Alexander Korotkov sent in another revision of the patch to add GiST indexing for range types, per review by Jeff Davis.</li>

<li>Kyotaro HORIGUCHI and Marko Kreen traded patches to speed dblink by creating and using a new libpq tuple storage method.</li>

<li>Gilles Darold sent in a patch to implement pg_is_in_backup().</li>

<li>Alvaro Herrera sent in another revision of the FOREIGN KEY locks patch.</li>

<li>Robert Haas and Simon Riggs traded patches to implement DROP INDEX CONCURRENTLY.</li>

<li>Andrew Dunstan sent in a patch to fix an issue where pg_dump -s could dump data if it came from an extension.</li>

<li>Shigeru HANADA sent in another revision of the patch to implement a PostgreSQL FDW.</li>

<li>Heikki Linnakangas sent in another revision of the patch to scale xlog insertion.</li>

<li>Peter Eisentraut sent in another revision of the patch to enable renaming constraints in an ALTER TABLE statement.</li>

<li>Chetan Suttraway sent in a patch to implement SPI_gettypemod().</li>

<li>Simon Riggs sent in a patch refactoring log_newpage.</li>

<li>Alvaro Herrera sent in a patch to fix an issue where heap_tuple_read could get a false positive.</li>

<li>Alvaro Herrera sent in a patch to make options in pg_hba.conf be case-insensitive.</li>

<li>Oleg Bartunov sent in a patch to support NULLs in SP-GiST.</li>

<li>Robert Haas sent in another revision of the patch to allow EXPLAIN ANALYZE not to include timing information.</li>

<li>Marti Raudsepp sent in another revision of the patch to cache stable expressions with constant arguments.</li>

<li>KaiGai Kohei sent in another revision of the patch to unify the permissions checks on DROP.</li>

<li>KaiGai Kohei sent in another revision of the patch to add a sepgsql.client_label GUC.</li>

<li>Thomas Munro sent in a patch to add an optional SKIP LOCKED DATA to SELECT ... FOR (UPDATE | SHARE ).</li>

<li>Jeff Janes sent in another revision of the patch to use less memory during sorting.</li>

<li>Jeff Davis sent in a patch to fix an issue where it was possible for things to happen between an initdb call and its actually getting written out to disk.</li>

<li>Simon Riggs sent in another revision of the patch to fix an issue in slot_deform_tuple.</li>

<li>Jan Urbanski sent in a patch to fix a memory leak in PL/PythonU's datum-&gt;dict transformation.</li>

<li>Jan Urbanski sent in a patch to fix a memory leak in PL/PythonU's datum-&gt;string transformation.</li>

</ul>