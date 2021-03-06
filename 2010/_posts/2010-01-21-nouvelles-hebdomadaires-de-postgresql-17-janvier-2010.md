---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 janvier 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/01/21/Nouvelles-hebdomadaires-de-PostgreSQL-17-janvier-2010"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 17 janvier 2010</strong></p>

<p>La derni&egrave;re commitfest pr&eacute;vue avant la prochaine publication (sera-ce la 9.0&nbsp;?) a d&eacute;but&eacute;. Il est temps de relire tous ces patchs, notamment celui de la r&eacute;plication continue [ndt: Streaming Replication]. Une relecture rapide signifie qu'une alpha peut sortir plus t&ocirc;t, et l'alpha m&egrave;ne &agrave; la beta, et la beta m&egrave;ne &agrave; la publication. Si vous n'avez jamais fait de relecture de patch, saisissez votre chance&nbsp;! 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Reviewing_a_Patch">http://wiki.postgresql.org/wiki/Reviewing_a_Patch</a> <a target="_blank" href="http://commitfest.postgresql.org">http://commitfest.postgresql.org</a></p>

<p>Le PUG allemand aura un stand au Linuxdays de Chemnitz les 13 et 14 mars 2010&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html">http://andreas.scherbaum.la/blog/archives/652-PostgreSQL-stand-at-Chemnitz-Linux-Days-2010.html</a></p>

<p>La "Linuxfest Northwest 2010" aura lieu &agrave; Bellingham, Washington, &Eacute;tats-Unis les 24 et 25 avril. Conf&eacute;rences, r&eacute;unions et m&eacute;c&eacute;nat sont proposables&nbsp;: 

<a target="_blank" href="http://linuxfestnorthwest.org/">http://linuxfestnorthwest.org/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>boxinfo version 1.1.7 

<a target="_blank" href="http://bucardo.org/wiki/Boxinfo">http://bucardo.org/wiki/Boxinfo</a></li>

<li>tail_n_mail 1.5.9, surveillance de log&nbsp;: 

<a target="_blank" href="http://bucardo.org/wiki/Tail_n_mail">http://bucardo.org/wiki/Tail_n_mail</a></li>

</ul>

<p><strong>La fonctionnalit&eacute; 8.5 de la semaine</strong></p>

<p>VACUUM FULL a &eacute;t&eacute; modifi&eacute; pour g&eacute;n&eacute;rer maintenant de nouveaux fichiers des tables et index trait&eacute;s. Ceci est bas&eacute; sur l'ancienne commande CLUSTER et s'av&egrave;re plus efficient. L'ancienne fonctionnalit&eacute; est toujours accessible via VACUUM FULL INPLACE, mais sera incompatible avec le Hot Standby.</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>En activant la surveillance des fichiers temporaires gr&acirc;ce &agrave; l'option 'log_temp_files', vous pouvez savoir s'il y a besoin d'augmenter les param&egrave;tres 'work_mem' ou 'maintenance_work_mem' pour vos bases de donn&eacute;es.</p>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-01/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PostgreSQL aura une r&eacute;union lors du "LinuxConf.AU Open Day" &agrave; Wellington, Nouvelle Z&eacute;lande. Josh Berkus et Selena Deckelman seront au LCA toute la semaine&nbsp;: 

<a target="_blank" href="http://www.lca2010.org.nz/programme/open_day">http://www.lca2010.org.nz/programme/open_day</a></li>

<li>L'appel &agrave; conf&eacute;rencier pour "East" est lanc&eacute; avec, comme date limite, le 30 janvier 2010. D&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le PGDay-Cuba 2010 sera tenu du 4 au 6 f&eacute;vrier 2010 &agrave; l'Universit&eacute; des Sciences Informatiques, &agrave; La Havane. Sont invit&eacute;s les participants de Cuba, de la R&eacute;publique Dominicaine et du Venezuela.</li>

<li>Le FOSDEM 2010 aura lieu &agrave; Bruxelles les 6 &amp; 7 f&eacute;vrier 2010&nbsp;: 

<a target="_blank" href="http://www.postgresql.eu/events/schedule/fosdem2010/">http://www.postgresql.eu/events/schedule/fosdem2010/</a></li>

<li>Le PUG allemand aura un stand dans le "Project Lounge" du hall 2 au Cebit 2010 du 2 au 6 mars 2010 &agrave; Hanovre&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html">http://andreas.scherbaum.la/blog/archives/649-PostgreSQL-stand-at-Cebit-2010.html</a></li>

<li>Le "Chemnitzer Linuxtage" aura lieu &agrave; Chemnitz (All.) les 13 &amp; 14 mars 2010&nbsp;: 

<a target="_blank" href="http://chemnitzer.linux-tage.de/">http://chemnitzer.linux-tage.de/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 3 au 7 mai 2010 sur le sujet "PostgreSQL for Corporate Use". D&eacute;tails ci-dessous&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html">http://andreas.scherbaum.la/blog/archives/650-PostgreSQL-Schulung-als-Bildungsurlaub-03.-07.05.2010-in-Magdeburg.html</a></li>

<li>La PgCon 2010 aura lieu les 20 &amp; 21 mai 2010 &agrave; Ottawa avec des tutoriels les 18 et 19. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;! 

<a target="_blank" href="http://www.pgcon.org/2010/papers.php">http://www.pgcon.org/2010/papers.php</a></li>

<li>L'appel aux propositions est lanc&eacute; pour l'OSCON, qui aura lieu &agrave; Portland (Oregon) du 19 au 23 juillet 2010&nbsp;: 

<a target="_blank" href="http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8">http://post.oreilly.com/f2f/9z1zqmm5lhkab0uogt3avlvc4u59bro6f917re423d8</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20100117">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues</strong></p>

<ul>

<li>ITAGAKI Takahiro reviewed Pavel Stehule's patch to add USING to OPEN...FOR EXECUTE in PL/pgsql and marked it "Ready for Committer."</li>

<li>Pavel Stehule reviewed Hitoshi Harada's patch to add more ROWS and RANGE options to windowing functions.</li>

<li>Andreas Freund reviewed Simon Riggs's patch to fix query-cancel in hot standby.</li>

<li>Erik Rijkers reviewed Hitoshi Harada's windowing function patch and found some regression test irregularities.</li>

<li>Robert Haas reviewed Pavel Stehule's new patch for psql which enables quoting and said it was excessively simplified.</li>

<li>Kevin Grittner reviewed Leonardo F's patch to add substring and replace() to get and set bit values. It no longer applies.</li>

<li>Robert Haas reviewed ITAGAKI Takahiro's patch to add partitioning syntax and suggested some improvements to the documentation of LIST and RANGE partitions.</li>

<li>Magnus Hagander reviewed Greg Smith's revision of the patch to allow clearing global statistics.</li>

<li>Jan Urbanski reviewed Arie Bikker's patch to improve xpath handling.</li>

<li>Gregory Stark reviewed the Bloom index patch and noted some infelicities with rand() and srand(), i.e. they shouldn't be there.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, remove use of temp file for perlchunks.h, as in recent change to plperl GNUmakefile</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/executor/execQual.c, improve ExecEvalVar's handling of whole-row variables in cases where the rowtype contains dropped columns. Sometimes the input tuple will be formed from a select targetlist in which dropped columns are filled with a NULL of an arbitrary type (the planner typically uses INT4, since it can't tell what type the dropped column really was). So we need to relax the rowtype compatibility check to not insist on physical compatibility if the actual column value is NULL. In principle we might need to do this for functions returning composite types, too (see tupledesc_match()). In practice there doesn't seem to be a bug there, probably because the function will be using the same cached rowtype descriptor as the caller. Fixing that code path would require significant rearrangement, so I left it alone for now. Per complaint from Filip Rembialkowski.</li>

<li>Add some simple support and documentation for using process-specific oom_adj settings to prevent the postmaster from being OOM-killed on Linux systems. Alex Hunsaker and Tom Lane.</li>

<li>In pgsql/src/backend/utils/adt/acl.c, fix aclexplode to not explode on a zero-entry ACL array. (An Assert is no substitute for thinking clearly :-() Minor style kibitzing too. Per report from Robert Treat.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, fix relcache reload mechanism to be more robust in the face of errors occurring during a reload, such as query-cancel. Instead of zeroing out an existing relcache entry and rebuilding it in place, build a new relcache entry, then swap its contents with the old one, then free the new entry. This avoids problems with code believing that a previously obtained pointer to a cache entry must still reference a valid entry, as seen in recent failures on buildfarm member jaguar. (jaguar is using CLOBBER_CACHE_ALWAYS which raises the probability of failure substantially, but the problem could occur in the field without that.) The previous design was okay when it was made, but subtransactions and the ResourceOwner mechanism make it unsafe now. Also, make more use of the already existing rd_isvalid flag, so that we remember that the entry requires rebuilding even if the first attempt fails. Back-patch as far as 8.2. Prior versions have enough issues around relcache reload anyway (due to inadequate locking) that fixing this one doesn't seem worthwhile.</li>

<li>In pgsql/src/backend/parser/parse_param.c, make fixed_paramref_hook behave properly when there are 'unused' slots in the parameter array. Noted while experimenting with an example from Pavel Stehule. This wouldn't come up in normal use, but it ought to honor the specification that a parameter array can have unused slots.</li>

<li>In pgsql/src/backend/utils/cache/plancache.c, fix bug #5269: ResetPlanCache mustn't invalidate cached utility statements, especially not ROLLBACK. ROLLBACK might need to be executed in an already aborted transaction, when there is no safe way to revalidate the plan. But in general there's no point in marking utility statements invalid, since they have no plans in the normal sense of the word; so we might as well work a bit harder here to avoid future revalidation cycles. Back-patch to 8.4, where the bug was introduced.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, when loading critical system indexes into the relcache, ensure we lock the underlying catalog not only the index itself. Otherwise, if the cache load process touches the catalog (which will happen for many though not all of these indexes), we are locking index before parent table, which can result in a deadlock against processes that are trying to lock them in the normal order. Per today's failure on buildfarm member gothic_moth; it's surprising the problem hadn't been identified before. Back-patch to 8.2. Earlier releases didn't have the issue because they didn't try to lock these indexes during load (instead assuming that they couldn't change schema at all during multiuser operation).</li>

<li>In pgsql/src/port/exec.c, simplify validate_exec() by using access(2) to check file permissions, rather than trying to implement the equivalent logic by hand. The motivation for the original coding appears to have been to check with the effective uid's permissions not the real uid's; but there is no longer any difference, because we don't run the postmaster setuid (indeed, main.c enforces that they're the same). Using access() means we will get it right in situations the original coding failed to handle, such as ACL-based permissions. Besides it's a lot shorter, cleaner, and more thread-safe. Per bug #5275 from James Bellinger.</li>

<li>In pgsql/src/backend/replication/walreceiver/Makefile, fix bogus subdir setting ... wonder just what that affects ...</li>

<li>In pgsql/src/backend/replication/walreceiver/Makefile, actually, I'll bet the mingw problem is lack of $(BE_DLLLIBS) ...</li>

<li>In pgsql/src/backend/replication/walreceiver/Makefile, no, scratch that, it was getting added twice.</li>

<li>Second try: walreceiver should not be built with -DBUILDING_DLL</li>

<li>Do parse analysis of an EXPLAIN's contained statement during the normal parse analysis phase, rather than at execution time. This makes parameter handling work the same as it does in ordinary plannable queries, and in particular fixes the incompatibility that Pavel pointed out with plpgsql's new handling of variable references. plancache.c gets a little bit grottier, but the alternatives seem worse.</li>

<li>PGDLLIMPORT-ize the remaining variables needed by walreceiver.</li>

<li>In pgsql/src/include/libpq/pqsignal.h, huh, apparently on cygwin we HAVE_SIGPROCMASK, so both variants of the BlockSig/UnBlockSig declaration have to be PGDLLIMPORT'ified. Per buildfarm results.</li>

<li>In pgsql/src/backend/storage/ipc/procarray.c, fix bogus initialization of KnownAssignedXids shared memory state --- didn't work in EXEC_BACKEND case.</li>

<li>In pgsql/src/backend/parser/scan.l, fix unportable use of isxdigit() with char (rather than unsigned char) argument, per warnings from buildfarm member pika. Also clean up code formatting a trifle.</li>

<li>Re-order configure tests to reflect the fact that the code generated for posix_fadvise and other file-related functions can depend on _LARGEFILE_SOURCE and/or _FILE_OFFSET_BITS. Per report from Robert Treat. Back-patch to 8.4. This has been wrong all along, but we weren't really using posix_fadvise in anger before, and AC_FUNC_FSEEKO seems to mask the issue well enough for that function.</li>

<li>In pgsql/src/backend/tcop/postgres.c, remove unnecessary, inconsistent flag resets in ProcessInterrupts.</li>

<li>Improve the handling of SET CONSTRAINTS commands by having them search pg_constraint before searching pg_trigger. This allows saner handling of corner cases; in particular we now say "constraint is not deferrable" rather than "constraint does not exist" when the command is applied to a constraint that's inherently non-deferrable. Per a gripe several months ago from hubert depesz lubaczewski. To make this work without breaking user-defined constraint triggers, we have to add entries for them to pg_constraint. However, in return we can remove the pgconstrname column from pg_constraint, which represents a fairly sizable space savings. I also replaced the tgisconstraint column with tgisinternal; the old meaning of tgisconstraint can now be had by testing for nonzero tgconstraint, while there is no other way to get the old meaning of nonzero tgconstraint, namely that the trigger was internally generated rather than being user-created. In passing, fix an old misstatement in the docs and comments, namely that pg_trigger.tgdeferrable is exactly redundant with pg_constraint.condeferrable. Actually, we mark RI action triggers as nondeferrable even when they belong to a nominally deferrable FK constraint. The SET CONSTRAINTS code now relies on that instead of hard-coding a list of exception OIDs.</li>

<li>In pgsql/doc/src/sgml/ref/set_constraints.sgml, update SET CONSTRAINTS reference page --- it failed to mention EXCLUDE constraints and was lacking a couple of other interesting details.</li>

<li>In pgsql/src/backend/utils/mmgr/portalmem.c, fix portalmem.c to avoid keeping a dangling pointer to a cached plan list after it's released its reference count for the cached plan. There are code paths that might try to examine the plan list before noticing that the portal is already in aborted state. Report and diagnosis by Tatsuo Ishii, though this isn't exactly his proposed patch.</li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/backup.sgml, remove tabs in SGML file.</li>

<li>Place tablespace directories in their own subdirectory so pg_migrator can upgrade clusters without renaming the tablespace directories. New directory structure format is, e.g.: $PGDATA/pg_tblspc/20981/PG_8.5_201001061/719849/83292814</li>

<li>In src/backend/replication/walreceiver/walreceiver.c, add #include &lt;sys/time.h&gt;gt; for struct timeval definition on BSD/OS.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/ecpglib/typename.c, applied Zoltan Boszormenyi's patch to make char the default sqlda type. Given that undefined types are handled as character strings anyway the type translation function can simply return the correcponding ECPGt_char type.</li>

<li>Applied patch by Zoltan Boszormenyi to add DESCRIBE [OUTPUT] statement to ecpg.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/descriptor.c, added correct error handling in DESCRIBE statement processing by Zoltan Boszormenyi.</li>

<li>Modified Files: --------------</li>

<li>Removed ecpg Changelog file that was only there for historical reasons and isn't actively used anymore.</li>

<li>Fix SQL3 type return value. For non-SQL3 types ecpg used to return -Oid. This will break if there are enough Oids to fill the namespace. Therefore we play it safe and return 0 if there is no Oid-&gt;gt;SQL3 tyoe mapping available.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/install-win32.sgml, update MSVC build instructions. Updated to reflect building with Visual Studio 2008, with just the Platform SDK, and for 64-bit Windows.</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, build the walreceiver library on MSVC as well.</li>

<li>In pgsql/doc/src/sgml/installation.sgml, fix spelling error, noticed by Thomas Shinnick.</li>

<li>In pgsql/contrib/xml2/xpath.c, silence compiler warning, noted by Stefan Kaltenbrunner</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, add include directory for dblink to find fmgroids.h on VS2008 builds.</li>

</ul>

<p>Simon Riggs a commit&eacute;&nbsp;:</p>

<ul>

<li>First part of refactoring of code for ResolveRecoveryConflict. Purposes of this are to centralise the conflict code to allow further change, as well as to allow passing through the full reason for the conflict through to the conflicting backends. Backend state alters how we can handle different types of conflict so this is now required. As originally suggested by Heikki, no longer optional.</li>

<li>Teach standby conflict resolution to use SIGUSR1. Conflict reason is passed through directly to the backend, so we can take decisions about the effect of the conflict based upon the local state. No specific changes, as yet, though this prepares for later work. CancelVirtualTransaction() sends signals while holding ProcArrayLock. Introduce errdetail_abort() to give message detail explaining that the abort was caused by conflict processing. Remove CONFLICT_MODE states in favour of using PROCSIG_RECOVERY_CONFLICT states directly, for clarity.</li>

<li>In pgsql/src/backend/storage/ipc/standby.c, message mentions msec when it should be seconds, so use s instead of ms. Noticed by Andres Freund.</li>

<li>In pgsql/src/backend/commands/dbcommands.c, lock database while running drop database in Hot Standby to protect against concurrent reconnection. Failure during testing showed issue was possible, even though earlier analysis seemed to indicate it would not be required. Use LockSharedObjectForSession() before ResolveRecoveryConflictWithDatabase() and hold lock until end of processing for that WAL record. Simple approach to avoid introducing further bugs at this stage of development on an improbable issue.</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>Add point_ops opclass for GiST.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Introduce Streaming Replication. This includes two new kinds of postmaster processes, walsenders and walreceiver. Walreceiver is responsible for connecting to the primary server and streaming WAL to disk, while walsender runs in the primary server and streams WAL from disk to the client. Documentation still needs work, but the basics are there. We will probably pull the replication section to a new chapter later on, as well as the sections describing file-based replication. But let's do that as a separate patch, so that it's easier to see what has been added/changed. This patch also adds a new section to the chapter about FE/BE protocol, documenting the protocol used by walsender/walreceivxer. Bump catalog version because of two new functions, pg_last_xlog_receive_location() and pg_last_xlog_replay_location(), for monitoring the progress of replication. Fujii Masao, with additional hacking by Heikki Linnakangas.</li>

<li>In pgsql/src/backend/replication/walsender.c, remove unused (in non-assertion-enabled build) variable.</li>

<li>In pgsql/src/Makefile, move build of src/backend/replication/walreceiver/ later in the build process, after src/interfaces, because it depends on libpq. Also add missing lines for clean, etc. targets. Report from Zoltan Boszormenyi.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Improved printing of Python exceptions in PL/Python. Mimic the Python interpreter's own logic for printing exceptions instead of just using the straight str() call, so that you get plpy.SPIError instead of &lt;class 'plpy.SPIError'&gt;gt; and for built-in exceptions merely, UnicodeEncodeError. Besides looking better this cuts down on the endless version differences in the regression test expected files.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in two more revisions of the patch to introduce quoting behavior to psql variables.</li>

<li>Zoltan Boszormenyi sent in four revisions of the lock_timeout GUC patch. Jaime Casanova one after Zoltan's first.</li>

<li>ITAGAKI Takahiro sent in a patch to fix a memory leak in dblink when a tuple-returning query gets cancelled.</li>

<li>Andreas Freund sent in a WIP patch to address an issue where hot standby doesn't play well with cancelling queries.</li>

<li>KaiGai Kohei sent in a patch clarifying comments in src/backend/rewrite/rewriteDefine.c.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the writeable CTE patch.</li>

<li>Teodor Sigaev sent in several patches as WIP to implement K-Nearest-Neighbor searches.</li>

<li>Kevin Grittner sent in a .gitignore file.</li>

<li>ITAGAKI Takahiro sent in a patch to correct an error in execMain.c</li>

<li>when there's a NOT NULL violation.</li>

<li>Peter Eisentraut sent in a patch to change the order in which pg_dump dumps functions.</li>

<li>Pavel Stehule sent in a patch to make psql remove redundant parentheses in trigger definitions.</li>

<li>Hans-Juergen Schoenig sent in a patch to add SQL tracing and tracking to ECPG.</li>

<li>Pavel Stehule sent in a patch against PL/pgsql which adds an optional USING clause to OPEN FOR EXECUTE.</li>

<li>Hitoshi Harada sent in two more revisions of the patch to extend ROWS and RANGE in windowing context, one per Pavel Stehule's review.</li>

<li>Teodor Sigaev sent in another WIP patch to add Bloom indexes as a contrib module.</li>

<li>Simon Riggs sent in three revisions of a patch to fix the query-cancel issue in hot standby.</li>

<li>Kevin Grittner sent in another WIP patch for serializable isolation.</li>

<li>Tim Bunce sent in a patch for PL/Perl which adds utility functions, names stored procedures as $name__$oid, cleans up whitespace in warnings, does some minor optimizations, and properly uses the recently updated ppport.h.</li>

<li>KaiGai Kohei sent in another revision of the patch to fix ALTER TABLE...RENAME TO behavior on multiply inherited columns.</li>

<li>Tim Bunce sent in a patch against PL/Perl which enables "require," (works for preloaded modules), "use strict" (and there was much rejoicing), some 5.10 features, named stored procedure subroutines, simplified and generalized subroutine creation code, some other optimizations, and disallows the buggy Safe.pm 2.20.</li>

<li>Markus Wanner (ne Schiltknecht) sent in a tool for testing in concurrent sessions called dtester.</li>

<li>ITAGAKI Takahiro sent in another revision of the PARTITION syntax patch.</li>

<li>Simon Riggs sent in a patch to fix a bug with GetConflictingVirtualXIDs.</li>

<li>Greg Smith sent in a patch to clear global statistics.</li>

<li>Bernd Helmle sent in a patch to enable seeing the total table size including TOAST.</li>

<li>Tim Bunce sent in a patch which adds on_perl_init and proper destruction to PL/Perl.</li>

<li>Tim Bunce sent in a patch for PL/Perl which adds plperl.on_trusted_init and plperl.on_untrusted_init GUCs, improves state management in select_perl_context(), and simplifies the utf8fix code.</li>

<li>Tim Bunce sent in a patch for PL/Perl which moves the internal functions from the main:: namespace to PostgreSQL::InServer and PostgreSQL::InServer::safe and restructures the Safe compartment setup code.</li>

<li>Peter Eisentraut sent in a patch to add a per-user pg_service.conf.</li>

<li>Alex Hunsaker sent in a review and patch atop Robert Haas's attoptions patch.</li>

<li>Heikki Linnakangas sent in another version of the patch to add a new XLOG record indicating WAL-skipping.</li>

<li>Guillaume Lelarge sent in another revision of the application name patch for libpq.</li>

<li>Heikki Linnakangas sent in a patch which pulls walreceiver into the backend executable and adds some interface functions to it.</li>

<li>Hitoshi Harada sent in a patch to fix the windowing functions patch per feedback from Erik Rijkers.</li>

<li>Peter Eisentraut sent in a patch to remove a gcc dependency from the definition of inline functions.</li>

<li>Peter Eisentraut sent in a patch to rearrange the parallel regression tests so they output the names before they all start instead of after they all finish.</li>

<li>Tatsuo Ishii sent in a patch which sets portal-&gt;gt;stmts to NULL in src/backend/utils/mmgr/portalmem.c just after PortalReleaseCachedPlan(portal) in order to fix an issue he found earlier.</li>

<li>Fujii Masao sent in a patch which adjust streaming replication for some later changes.</li>

</ul>