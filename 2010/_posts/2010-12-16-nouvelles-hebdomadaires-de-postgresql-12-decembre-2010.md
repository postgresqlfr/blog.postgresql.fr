---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 décembre 2010"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2010/12/16/Nouvelles-hebdomadaires-de-PostgreSQL-12-décembre-2010"
---


<p>L'appel &agrave; conf&eacute;renciers pour la salle PostgreSQL au FOSDEM (Bruxelles, 5-6 f&eacute;vrier 2011) est toujours audible. Envoyez vos propositions &agrave; fosdem AT postgresql DOT eu.</p>

<p>Devrim GUNDUZ a publi&eacute; une correction pour les paquets RPM RHEL6. Voir ci-apr&egrave;s pour les d&eacute;tails&nbsp;: 

<a target="_blank" href="http://people.planetpostgresql.org/devrim/index.php?/archives/54-Attention-9.0.1-OR-RHEL-6-RPM-users.html">http://people.planetpostgresql.org/devrim/index.php?/archives/54-Attention-9.0.1-OR-RHEL-6-RPM-users.html</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PostgreSQL Maestro 10.12, une interface graphique d'administration pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></li>

<li>psycopg2 2.3.1, un connecteur Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2010/12/04/psycopg-231-released/">http://initd.org/psycopg/articles/2010/12/04/psycopg-231-released/</a></li>

<li>Slony-I, un syst&egrave;me de r&eacute;plication ma&icirc;tre-vers-multiples-esclaves-en-cascade pour PostgreSQL a publi&eacute; les nouvelles r&eacute;vision 1.2.22 et 2.0.6&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2010-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2010-12/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; projets de PostgreSQLFr a &eacute;t&eacute; lanc&eacute;. Les projets doivent concerner PostgreSQL et la communaut&eacute; francophone. Mail &agrave; appel-projets-2010 (AT) postgresql (DOT) fr. 

<a target="_blank" href="http://www.postgresql.fr/appel_a_projets_2010:call_for_projects">http://www.postgresql.fr/appel_a_projets_2010:call_for_projects</a></li>

<li>Le FOSDEM est l'un des plus grand &eacute;v&eacute;nements autour du Libre et de l'Open Source&nbsp;; il a lieu annuellement &agrave; Bruxelles et rassemble environ 4000 personnes. La prochaine &eacute;dition est programm&eacute;e pour les 5 &amp; 6 f&eacute;vrier 2011. Envoyez vos propositions &agrave; l'adresse fosdem AT postgresql POINT eu&nbsp;: 

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html">http://andreas.scherbaum.la/blog/archives/749-PostgreSQLFOSDEM-2011-Call-for-talks.html</a></li>

<li>Un PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011. Proposez vos conf&eacute;rences sur pgday-submissions (AT) googlegroups (DOT) com.</li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2010-12/msg00007.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<ul>

<li>ITAGAKI Takahiro reviewed the per-column collation patch, bringing up issues with pg_dump, along with a couple of naming issues in the source code and a request for clearer global state.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Put only single space after "Sort Method:", for consistency. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=951d7861212120571a601d946194892db6f2bde1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=951d7861212120571a601d946194892db6f2bde1</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix two typos, by Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=95e42a2c2980003880dee622fc3bed0b03322542">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=95e42a2c2980003880dee622fc3bed0b03322542</a></li>

<li>Fix bugs in the hot standby known-assigned-xids tracking logic. If there's an old transaction running in the master, and a lot of transactions have started and finished since, and a WAL-record is written in the gap between the creating the running-xacts snapshot and WAL-logging it, recovery will fail with "too many KnownAssignedXids" error. This bug was reported by Joachim Wieland on Nov 19th. In the same scenario, when fewer transactions have started so that all the xids fit in KnownAssignedXids despite the first bug, a more serious bug arises. We incorrectly initialize the clog code with the oldest still running transaction, and when we see the WAL record belonging to a transaction with an XID larger than one that committed already before the checkpoint we're recovering from, we zero the clog page containing the already committed transaction, leading to data loss. In hindsight, trying to track xids in the known-assigned-xids array before seeing the running-xacts record was too complicated. To fix that, hold XidGenLock while the running-xacts snapshot is taken and WAL-logged. That ensures that no transaction can begin or end in that gap, so that in recvoery we know that the snapshot contains all transactions running at that point in WAL. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5a031a5556ff83b8a9646892715d7fef415b83c3">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5a031a5556ff83b8a9646892715d7fef415b83c3</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow the low level COPY routines to read arbitrary numbers of fields. This doesn't involve any user-visible change in behavior, but will be useful when the COPY routines are exposed to allow their use by Foreign Data Wrapper routines, which will be able to use these routines to read irregular CSV files, for example. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=af1a614ec6d074fdea46de2e1c462f23fc7ddc6f">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=af1a614ec6d074fdea46de2e1c462f23fc7ddc6f</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a stack overflow check to copyObject(). There are some code paths, such as SPI_execute(), where we invoke copyObject() on raw parse trees before doing parse analysis on them. Since the bison grammar is capable of building heavily nested parsetrees while itself using only minimal stack depth, this means that copyObject() can be the front-line function that hits stack overflow before anything else does. Accordingly, it had better have a check_stack_depth() call. I did a bit of performance testing and found that this slows down copyObject() by only a few percent, so the hit ought to be negligible in the context of complete processing of a query. Per off-list report from Toshihide Katayama. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8b5692809707c0e15d04c530a3fed9347350ea01">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8b5692809707c0e15d04c530a3fed9347350ea01</a></li>

<li>Force default wal_sync_method to be fdatasync on Linux. Recent versions of the Linux system header files cause xlogdefs.h to believe that open_datasync should be the default sync method, whereas formerly fdatasync was the default on Linux. open_datasync is a bad choice, first because it doesn't actually outperform fdatasync (in fact the reverse), and second because we try to use O_DIRECT with it, causing failures on certain filesystems (e.g., ext4 with data=journal option). This part of the patch is largely per a proposal from Marti Raudsepp. More extensive changes are likely to follow in HEAD, but this is as much change as we want to back-patch. Also clean up confusing code and incorrect documentation surrounding the fsync_writethrough option. Those changes shouldn't result in any actual behavioral change, but I chose to back-patch them anyway to keep the branches looking similar in this area. In 9.0 and HEAD, also do some copy-editing on the WAL Reliability documentation section. Back-patch to all supported branches, since any of them might get used on modern Linux versions. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=576477e73c4a9cb32c7471c1cec354fd5328140e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=576477e73c4a9cb32c7471c1cec354fd5328140e</a></li>

<li>Clean up some copied-and-pasted code in pg_upgrade. 1. Don't reimplement S_ISDIR() and S_ISREG() badly. 2. Don't reimplement access() badly. This code appears to have been copied from ancient versions of the corresponding backend routines, and not patched to incorporate subsequent fixes (see my commits of 2008-03-31 and 2010-01-14 respectively). It might be a good idea to change it to just *call* those routines, but for now I'll just transpose these fixes over. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=663fc32e26e8df41434d751e2203c1aa410d1916">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=663fc32e26e8df41434d751e2203c1aa410d1916</a></li>

<li>Make S_IRGRP etc available in mingw builds as well as MSVC. (Hm, I wonder whether BCC defines them either...) Also label dangling endifs a bit better in this area. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5132ad8bdf8e85ea0054217ef7ee38c51ace4824">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=5132ad8bdf8e85ea0054217ef7ee38c51ace4824</a></li>

<li>Reset all database-level stats in pgstat_recv_resetcounter(). We were failing to zero out some pg_stat_database counters that have been added since the initial pgstats coding. This is a bug, but not back-patching the fix since changing this behavior in a minor release seems a cure worse than the disease. Report and patch by Tomas Vondra. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c90442355fbbe785740669f63141f24674c8958">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0c90442355fbbe785740669f63141f24674c8958</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Optimize commit_siblings in two ways to improve group commit. First, avoid scanning the whole ProcArray once we know there are at least commit_siblings active; second, skip the check altogether if commit_siblings = 0. Greg Smith. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e620ee35b249b0af255ef788003d1c9edb815a35">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=e620ee35b249b0af255ef788003d1c9edb815a35</a></li>

<li>Reduce spurious Hot Standby conflicts from never-visible records. Hot Standby conflicts only with tuples that were visible at some point. So ignore tuples from aborted transactions or for tuples updated/deleted during the inserting transaction when generating the conflict transaction ids. Following detailed analysis and test case by Noah Misch. Original report covered btree delete records, correctly observed by Heikki Linnakangas that this applies to other cases also. Fix covers all sources of cleanup records via common code. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b9075a6d2f9b07a00262a670dd60272904c79dce">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=b9075a6d2f9b07a00262a670dd60272904c79dce</a></li>

<li>Self review of previous patch. Fix assumption that xmax &gt;= xmin. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9975c683b102d06ed5d5ab799eaba0d00a9ff38c">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=9975c683b102d06ed5d5ab799eaba0d00a9ff38c</a></li>

<li>Reduce spurious Hot Standby conflicts from never-visible records. Hot Standby conflicts only with tuples that were visible at some point. So ignore tuples from aborted transactions or for tuples updated/deleted during the inserting transaction when generating the conflict transaction ids. Following detailed analysis and test case by Noah Misch. Original report covered btree delete records, correctly observed by Heikki Linnakangas that this applies to other cases also. Fix covers all sources of cleanup records via common code. Includes additional fix compared to commit on HEAD 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a804a23e7af0e075b88e7b03bfd9b0f22d2657b2">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=a804a23e7af0e075b88e7b03bfd9b0f22d2657b2</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor documentation cleanup. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1490946c57f44d3bf8601e9a404aaa80b58a715a">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1490946c57f44d3bf8601e9a404aaa80b58a715a</a></li>

<li>Allow bidirectional copy messages in streaming replication mode. Fujii Masao. Review by Alvaro Herrera, Tom Lane, and myself. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d3d414696f39e2b57072fab3dd4fa11e465be4ed">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d3d414696f39e2b57072fab3dd4fa11e465be4ed</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add required new port files to MSVC builds. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=20f396429186a35a81fc7ef3ad34c3134ead2992">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=20f396429186a35a81fc7ef3ad34c3134ead2992</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Joachim Wieland sent in another revision of the patch to clone snapshots and make them available.</li>

<li>Craig Ringer sent in a patch to add a crash dump, similar to a core dump, only for Windows.</li>

<li>Josh Berkus sent in two revisions of a patch to make wal_sync_method default to fdatasync on Linux kernels 2.6.33 and higher.</li>

<li>Fujii Masao sent in another revision of the patch to change libpq to help with synchronous replication.</li>

<li>Fujii Masao sent in a patch to set a replication timeout. This, too, is intended to help with synchronous replication.</li>

<li>Peter Eisentraut sent in a patch to add a pg_sequence_parameters() function.</li>

<li>KaiGai Kohei sent in another revision of the access control label switcher function.</li>

<li>Joachim Wieland sent in another revision of the patch to add a directory-based format for pg_dump/pg_restore.</li>

<li>Fujii Masao sent in a patch to remove wal_sender_delay.</li>

<li>Tim Bunce sent in a patch to optimize argument-passing in PL/Perl[U].</li>

<li>Kevin Grittner sent in four revisions of a patch to add a optimize and correct SERIALIZABLE so that it doesn't switch from READ ONLY DEFERRABLE mode to READ WRITE.</li>

<li>Tom Lane sent in a patch to fix some infelicities in the speed of calculating percent_rank() vs. rank().</li>

<li>Fujii Masao sent in a patch to fix the way ps(1) displays standby queries.</li>

<li>Dimitri Fontaine sent in two more revisions to add extensions.</li>

<li>Robert Haas sent in another revision of the patch to add unlogged tables.</li>

<li>Thomas (tv AT fuzzy DOT cz) sent in two revisions of a patch to keep a timestamp of the most recent stats reset per-database, per-table, and per-function.</li>

<li>Dimitri Fontaine sent in another revision of the patch to add a pg_execute_from_file() function. This is part of the EXTENSIONS work.</li>

<li>Alexander Korotkov sent in a patch to add wildcard support for pg_trgm.</li>

<li>Simon Riggs sent in a patch to add a NOT ENFORCED clause to foreign key constraints.</li>

<li>Peter Eisentraut sent in another revision of the per-column collation patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to add file_fdw(), part of the SQL/MED standard dealing with reading and writing external files.</li>

</ul>