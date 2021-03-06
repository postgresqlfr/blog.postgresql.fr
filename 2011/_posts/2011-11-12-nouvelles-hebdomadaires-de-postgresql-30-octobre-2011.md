---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 30 octobre 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/11/12/Nouvelles-hebdomadaires-de-PostgreSQL-30-octobre-2011"
---


<p>L'appel &agrave; conf&eacute;renciers est lanc&eacute; pour la <em>PostgreSQL Session #3</em>, programm&eacute;e le 2 f&eacute;vrier 2012 &agrave; Paris. La date limite de d&eacute;p&ocirc;t est le 30 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront contact&eacute;s avant le 14 d&eacute;cembre. Les propositions (en fran&ccedil;ais ou anglais) doivent &ecirc;tre envoy&eacute;es &agrave; call-for-paper AT postgresql-sessions DOT org. Plus d'informations sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/3/">http://www.postgresql-sessions.org/en/3/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Benetl 3.8, un ETL de fichiers, utilisant PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

<li>PL/Proxy 2.3.0, un proxy-r&eacute;partiteur de proc&eacute;dures stock&eacute;es, pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/plproxy/">http://pgfoundry.org/projects/plproxy/</a></li>

<li>Pyrseas 0.4.1, un ensemble d'outils pour la gestion de r&eacute;visions avec PostgreSQL, publi&eacute; sur PGXN&nbsp;: 

<a target="_blank" href="http://pgxn.org/dist/pyrseas/">http://pgxn.org/dist/pyrseas/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

<li><em>PGConf.DE 2011</em> est une conf&eacute;rence germanophone tenue le 11 novembre au mus&eacute;e industriel du Rhin &agrave; Oberhausen (Allemagne). L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2011.pgconf.de/">http://2011.pgconf.de/</a></li>

<li>La cinqui&egrave;me &eacute;dition du PGDay italien (PGDay.IT 2011) aura lieu le 25 novembre &agrave; Prato&nbsp;: 

<a target="_blank" href="http://2011.pgday.it/">http://2011.pgday.it/</a></li>

<li>L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute; pour le FLOSS UK, programm&eacute; du 20 au 22 mars 2012 &agrave; Edimbourg. La date limite de d&eacute;p&ocirc;t des candidatures est fix&eacute;e au 18 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront inform&eacute;s avant le 25 novembre. Les propositions sont &agrave; envoyer &agrave; postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;: 

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20111030">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make TABLE tab complation in psql include all relations. Not just tables, since views also work fine with the TABLE command. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a74a5f59137c778450bafcc1b7de505a7a4a9204">http://git.postgresql.org/pg/commitdiff/a74a5f59137c778450bafcc1b7de505a7a4a9204</a></li>

<li>Support configurable eventlog application names on Windows. This allows different instances to use the eventlog with different identifiers, by setting the event_source GUC, similar to how syslog_ident works. Original patch by MauMau, heavily modified by Magnus Hagander 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8ea33f2c02721c89c2434b9fda170afb7fe4999">http://git.postgresql.org/pg/commitdiff/d8ea33f2c02721c89c2434b9fda170afb7fe4999</a></li>

<li>Remove argument decoration that appears unsupported on mingw 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c4c8c8468bfdcfba67a9e0bd015843dab949dbf">http://git.postgresql.org/pg/commitdiff/9c4c8c8468bfdcfba67a9e0bd015843dab949dbf</a></li>

<li>Make event_source visible on all platforms. On non-windows platform, we just ignore any value set there. Noted by Jaime Casanova 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a87b9ae1612d0e01093e691a5a6b1a37e1dcb9fb">http://git.postgresql.org/pg/commitdiff/a87b9ae1612d0e01093e691a5a6b1a37e1dcb9fb</a></li>

<li>Fix typo 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0bec068e221f1774b1b444ce687370580b3bc70">http://git.postgresql.org/pg/commitdiff/b0bec068e221f1774b1b444ce687370580b3bc70</a></li>

<li>MingW doesn't support wcstombs_s()... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b64f3f17a4c1064008ea7cfe52d8eabe0b86370">http://git.postgresql.org/pg/commitdiff/2b64f3f17a4c1064008ea7cfe52d8eabe0b86370</a></li>

<li>Implement streaming xlog for backup tools. Add option for parallel streaming of the transaction log while a base backup is running, to get the logfiles before the server has removed them. Also add a tool called pg_receivexlog, which streams the transaction log into files, creating a log archive without having to wait for segments to complete, thus decreasing the window of data loss without having to waste space using archive_timeout. This works best in combination with archive_command - suggested usage docs etc coming later. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d9bae5317300cf983dd9f01cc2e561c0eecd109a">http://git.postgresql.org/pg/commitdiff/d9bae5317300cf983dd9f01cc2e561c0eecd109a</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add debugging aid in isolationtester 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90d8e8ff7ee94283270cc7b2bc6a986a7cd174fc">http://git.postgresql.org/pg/commitdiff/90d8e8ff7ee94283270cc7b2bc6a986a7cd174fc</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change FK trigger creation order to better support self-referential FKs. When a foreign-key constraint references another column of the same table, row updates will queue both the PK's ON UPDATE action and the FK's CHECK action in the same event. The ON UPDATE action must execute first, else the CHECK will check a non-final state of the row and possibly throw an inappropriate error, as seen in bug #6268 from Roman Lytovchenko. Now, the firing order of multiple triggers for the same event is determined by the sort order of their pg_trigger.tgnames, and the auto-generated names we use for FK triggers are "RI_ConstraintTrigger_NNNN" where NNNN is the trigger OID. So most of the time the firing order is the same as creation order, and so rearranging the creation order fixes it. This patch will fail to fix the problem if the OID counter wraps around or adds a decimal digit (eg, from 99999 to 100000) while we are creating the triggers for an FK constraint. Given the small odds of that, and the low usage of self-referential FKs, we'll live with that solution in the back branches. A better fix is to change the auto-generated names for FK triggers, but it seems unwise to do that in stable branches because there may be client code that depends on the naming convention. We'll fix it that way in HEAD in a separate patch. Back-patch to all supported branches, since this bug has existed for a long time. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58958726ffaec8d1a5d6a63f648443886fde8a21">http://git.postgresql.org/pg/commitdiff/58958726ffaec8d1a5d6a63f648443886fde8a21</a></li>

<li>Change FK trigger naming convention to fix self-referential FKs. Use names like "RI_ConstraintTrigger_a_NNNN" for FK action triggers and "RI_ConstraintTrigger_c_NNNN" for FK check triggers. This ensures the action trigger fires first in self-referential cases where the very same row update fires both an action and a check trigger. This change provides a non-probabilistic solution for bug #6268, at the risk that it could break client code that is making assumptions about the exact names assigned to auto-generated FK triggers. Hence, change this in HEAD only. No need for forced initdb since old triggers continue to work fine. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e3b21dd5e1070d301153690c1751bef74f03fa4">http://git.postgresql.org/pg/commitdiff/1e3b21dd5e1070d301153690c1751bef74f03fa4</a></li>

<li>Improve planner's ability to recognize cases where an IN's RHS is unique. If the right-hand side of a semijoin is unique, then we can treat it like a normal join (or another way to say that is: we don't need to explicitly unique-ify the data before doing it as a normal join). We were recognizing such cases when the RHS was a sub-query with appropriate DISTINCT or GROUP BY decoration, but there's another way: if the RHS is a plain relation with unique indexes, we can check if any of the indexes prove the output is unique. Most of the infrastructure for that was there already in the join removal code, though I had to rearrange it a bit. Per reflection about a recent example in pgsql-performance. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e4b3465b6345b75659e8f897976d4c810408762">http://git.postgresql.org/pg/commitdiff/3e4b3465b6345b75659e8f897976d4c810408762</a></li>

<li>Typo fixes. expect -&gt; except, noted by Andrew Dunstan. Also, "cannot" seems more readable here than "can not", per David Wheeler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bf82013631e32436c9abb23fee8be0a4ce46b3dd">http://git.postgresql.org/pg/commitdiff/bf82013631e32436c9abb23fee8be0a4ce46b3dd</a></li>

<li>Add simple script to check for right recursion in Bison grammars. We should generally use left-recursion not right-recursion to parse lists. Bison hasn't got any built-in way to check for this type of inefficiency, and I didn't find anything on the net in a quick search, so I wrote a little Perl script to do it. Add to src/tools/ so we don't have to re-invent this wheel next time we wonder if we're doing anything stupid. Currently, the only place that seems to need fixing is plpgsql's stmt_else production, so the problem doesn't appear to be common enough to warrant trying to include such a test in our standard build process. If we did want to do that, we'd need a way to ignore some false positives, such as a_expr := '-' a_expr 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/756a4ed5ad3e57c26a247234de371a6ca21806cd">http://git.postgresql.org/pg/commitdiff/756a4ed5ad3e57c26a247234de371a6ca21806cd</a></li>

<li>Avoid recursion while processing ELSIF lists in plpgsql. The original implementation of ELSIF in plpgsql converted the construct into nested simple IF statements. This was prone to stack overflow with long ELSIF lists, in two different ways. First, it's difficult to generate the parsetree without using right-recursion in the bison grammar, and that's prone to parser stack overflow since nothing can be reduced until the whole list has been read. Second, we'd recurse during execution, thus creating an unnecessary risk of execution-time stack overflow. Rewrite so that the ELSIF list is represented as a flat list, scanned via iteration not recursion, and generated through left-recursion in the grammar. Per a gripe from H&aring;vard Kongsg&aring;rd. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/051d1ba7a02d0e8930adf228d60e8a044b9fcadb">http://git.postgresql.org/pg/commitdiff/051d1ba7a02d0e8930adf228d60e8a044b9fcadb</a></li>

<li>Update docs to point to the timezone library's new home at IANA. The recent unpleasantness with copyrights has accelerated a move that was already in planning. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ece12659cf1695d318445b837b36edc15b6f25d6">http://git.postgresql.org/pg/commitdiff/ece12659cf1695d318445b837b36edc15b6f25d6</a></li>

<li>De-parallelize ecpg build some more. Make sure ecpg/include/ is rebuilt before the other subdirectories, so that ecpg_config.h is up to date. This is not likely to matter during production builds, only development, so no back-patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74812624f263a58789e894a643161c9148112f62">http://git.postgresql.org/pg/commitdiff/74812624f263a58789e894a643161c9148112f62</a></li>

<li>Fix assorted bogosities in cash_in() and cash_out(). cash_out failed to handle multiple-byte thousands separators, as per bug #6277 from Alexander Law. In addition, cash_in didn't handle that either, nor could it handle multiple-byte positive_sign. Both routines failed to support multiple-byte mon_decimal_point, which I did not think was worth changing, but at least now they check for the possibility and fall back to using '.' rather than emitting invalid output. Also, make cash_in handle trailing negative signs, which formerly it would reject. Since cash_out generates trailing negative signs whenever the locale tells it to, this last omission represents a fail-to-reload-dumped-data bug. IMO that justifies patching this all the way back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7609239f3e8d1cf8818c186c0cfa39145bf6425a">http://git.postgresql.org/pg/commitdiff/7609239f3e8d1cf8818c186c0cfa39145bf6425a</a></li>

<li>Further improvement of make_greater_string. Make sure that it considers all the possibilities that the old code did, instead of trying only one possibility per character position. To keep the runtime in bounds, instead tweak the character incrementers to not try every possible multibyte character code. Remove unnecessary logic to restore the old character value on failure. Additional comment and formatting cleanup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb5834d5af5fd094da2f61a874d9d0ec9c870f6c">http://git.postgresql.org/pg/commitdiff/eb5834d5af5fd094da2f61a874d9d0ec9c870f6c</a></li>

<li>Support more locale-specific formatting options in cash_out(). The POSIX spec defines locale fields for controlling the ordering of the value, sign, and currency symbol in monetary output, but cash_out only supported a small subset of these options. Fully implement p/n_sign_posn, p/n_cs_precedes, and p/n_sep_by_space per spec. Fix up cash_in so that it will accept all these format variants. Also, make sure that thousands_sep is only inserted to the left of the decimal point, as required by spec. Per bug #6144 from Eduard Kracmar and discussion of bug #6277. This patch includes some ideas from Alexander Lakhin's proposed patch, though it is very different in detail. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6743a878a4e9442a9846d8c270e5028e514d44f3">http://git.postgresql.org/pg/commitdiff/6743a878a4e9442a9846d8c270e5028e514d44f3</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_bsd_indent bug where newlines were not being trimmed from typedef lines. Update pg_bsd_indent required version to 1.1 (and update ftp site). Problem reported by Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/360429e1d17947c17659cd57dbaaba5c10fcbd6a">http://git.postgresql.org/pg/commitdiff/360429e1d17947c17659cd57dbaaba5c10fcbd6a</a></li>

<li>Update pg_upgrade testing instructions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/38f3c7c4ddedf509d8e2bdda4a947df4dc177e5a">http://git.postgresql.org/pg/commitdiff/38f3c7c4ddedf509d8e2bdda4a947df4dc177e5a</a></li>

<li>Clarify pg_upgrade error message that the 'postgres' database must exist in the old cluster. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9846dcfb9e8273d2ef93a1650225d013a1436349">http://git.postgresql.org/pg/commitdiff/9846dcfb9e8273d2ef93a1650225d013a1436349</a></li>

<li>Remove pg_upgrade dependency on the 'postgres' database existing in the new cluster. vacuumdb, used by pg_upgrade, still has this dependency. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51eba98cf4595e90730dedd9305da8aa84b649ee">http://git.postgresql.org/pg/commitdiff/51eba98cf4595e90730dedd9305da8aa84b649ee</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix the number of lwlocks needed by the "fast path" lock patch. It needs one lock per backend or auxiliary process - the need for a lock for each aux processes was not accounted for in NumLWLocks(). No-one noticed, because the three locks needed for the three aux processes fit into the few extra lwlocks we allocate for 3rd party modules that don't call RequestAddinLWLocks() (NUM_USER_DEFINED_LWLOCKS, 4 by default). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cbf65509bb59694412286239fe6db409060f8d69">http://git.postgresql.org/pg/commitdiff/cbf65509bb59694412286239fe6db409060f8d69</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change "and and" to "and". Report by Vik Reykja, patch by Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c21105fb40adc22d31ba1b7caf104640347651c">http://git.postgresql.org/pg/commitdiff/6c21105fb40adc22d31ba1b7caf104640347651c</a></li>

<li>Clarify that ORDER BY/FOR UPDATE can't malfunction at higher iso levels. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cf12dfd4e9e5301d7f8cf48e1eead1626c42127">http://git.postgresql.org/pg/commitdiff/9cf12dfd4e9e5301d7f8cf48e1eead1626c42127</a></li>

<li>Remove hard-coded "\connect postgres" from pg_dumpall. This doesn't appear to accompish anything useful, and does make the restore fail if the postgres database happens to have been dropped. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/deb15803249883db031c6cc8af104b575f7809ad">http://git.postgresql.org/pg/commitdiff/deb15803249883db031c6cc8af104b575f7809ad</a></li>

<li>Demote some sanity checks in BufferIsValid() to assertions. Testing reveals that this macro is a hot-spot for index-only-scans. Per discussion with Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b6335a3f1b33e5dc52e755956d8648f0813252c4">http://git.postgresql.org/pg/commitdiff/b6335a3f1b33e5dc52e755956d8648f0813252c4</a></li>

<li>Allow hint bits to be set sooner for temporary and unlogged tables. We need not wait until the commit record is durably on disk, because in the event of a crash the page we're updating with hint bits will be gone anyway. Per off-list report from Heikki Linnakangas, this can significantly degrade the performance of unlogged tables; I was able to show a 2x speedup from this patch on a pgbench run with scale factor 15. In practice, this will mostly help small, heavily updated tables, because on larger tables you're unlikely to run into the same row again before the commit record makes it out to disk. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/53f1ca59b5875f1d3e95ee709ecaddcbdfdbd175">http://git.postgresql.org/pg/commitdiff/53f1ca59b5875f1d3e95ee709ecaddcbdfdbd175</a></li>

<li>Improve make_greater_string() with encoding-specific incrementers. This infrastructure doesn't in any way guarantee that the character we produce will sort before the one we incremented; but it does at least make it much more likely that we'll end up with something that is a valid character, which improves our chances. Kyotaro Horiguchi, with various adjustments by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/78d523b633d0c251c904318f2ba9916e2c47b9e8">http://git.postgresql.org/pg/commitdiff/78d523b633d0c251c904318f2ba9916e2c47b9e8</a></li>

<li>Update visibilitymap.c header comments. Recent work on index-only scans left this somewhat out of date. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fae54e4a168f9da517be38723fa5f4b7cfeb59c9">http://git.postgresql.org/pg/commitdiff/fae54e4a168f9da517be38723fa5f4b7cfeb59c9</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Fujii Masao and Jun Ishiduka traded revisions of the patch to allow taking a base backup from a hot standby.</li>

<li>Shigeru HANADA sent in two revisions of patches for a PostgreSQL FDW, along with some generic helper functions and new documentation on how to write FDWs.</li>

<li>Heikki Linnakangas sent in another revision of the patch to add multiple tuples at once in COPY.</li>

<li>Simon Riggs sent in two revisions of a patch to fix an issue where hot backup fails at rsync fails at pg_clog when under load.</li>

<li>Kerem Kat sent in another revision of the patch to add CORRESPONDING TO set operations.</li>

<li>Pavel Stehule sent in another revision of the patch that allows PL/pgsql to make arrays of any %TYPE declared.</li>

<li>Alexander Korotkov sent in another revision of the patch to collect statistics for array columns.</li>

<li>Robert Haas sent in a couple of patches he was using to analyze the slowness of COUNT(*) in the index-only scan case.</li>

<li>Simon Riggs sent in two revisions of a patch to speed up hot standbys in the subtransaction case.</li>

<li>Robert Haas sent in a patch to speed up unlogged tables.</li>

<li>Robert Haas sent in a patch that initializes each PGPROC's myProcLocks just once at postmaster startup rather than every time the PGPROC is handed out to a backend.</li>

</ul>