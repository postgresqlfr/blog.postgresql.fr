---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 25 novembre 2012"
author: "NBougain"
redirect_from: "index.php?post/2012-12-02-nouvelles-hebdomadaires-de-postgresql-25-novembre-2012 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix archive_cleanup_command. When I moved ExecuteRecoveryCommand() from xlog.c to xlogarchive.c, I didn't realize that it's called from the checkpoint process, not the startup process. I tried to use InRedo variable to decide whether or not to attempt cleaning up the archive (must not do so before we have read the initial checkpoint record), but that variable is only valid within the startup process. Instead, let ExecuteRecoveryCommand() always clean up the archive, and add an explicit argument to RestoreArchivedFile() to say whether that's allowed or not. The caller knows better. Reported by Erik Rijkers, diagnosis by Fujii Masao. Only 9.3devel is affected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/644a0a6379afc00803dd89ffe8416514f5dfc217">http://git.postgresql.org/pg/commitdiff/644a0a6379afc00803dd89ffe8416514f5dfc217</a></li>

<li>Speed up operations on numeric, mostly by avoiding palloc() overhead. In many functions, a NumericVar was initialized from an input Numeric, to be passed as input to a calculation function. When the NumericVar is not modified, the digits array of the NumericVar can point directly to the digits array in the original Numeric, and we can avoid a palloc() and memcpy(). Add init_var_from_num() function to initialize a var like that. Remove dscale argument from get_str_from_var(), as all the callers just passed the dscale of the variable. That means that the rounding it used to do was not actually necessary, and get_str_from_var() no longer scribbles on its input. That makes it safer in general, and allows us to use the new init_var_from_num() function in e.g numeric_out(). Also modified numericvar_to_int8() to no scribble on its input either. It creates a temporary copy to avoid that. To compensate, the callers no longer need to create a temporary copy, so the net # of pallocs is the same, but this is nicer. In the passing, use a constant for the number 10 in get_str_from_var_sci(), when calculating 10^exponent. Saves a palloc() and some cycles to convert integer 10 to numeric. Original patch by Kyotaro HORIGUCHI, with further changes by me. Reviewed by Pavel Stehule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cb0e335976befdcedd069c59dd3858fb3e649b3">http://git.postgresql.org/pg/commitdiff/5cb0e335976befdcedd069c59dd3858fb3e649b3</a></li>

<li>Avoid bogus "out-of-sequence timeline ID" errors in standby-mode. When startup process opens a WAL segment after replaying part of it, it validates the first page on the WAL segment, even though the page it's really interested in later in the file. As part of the validation, it checks that the TLI on the page header is &gt;= the TLI it saw on the last page it read. If the segment contains a timeline switch, and we have already replayed it, and then re-open the WAL segment (because of streaming replication got disconnected and reconnected, for example), the TLI check will fail when the first page is validated. Fix that by relaxing the TLI check when re-opening a WAL segment. Backpatch to 9.0. Earlier versions had the same code, but before standby mode was introduced in 9.0, recovery never tried to re-read a segment after partially replaying it. Reported by Amit Kapila, while testing a new feature. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24c19e6bf96d556b3a9517ce42f54b5756ca0384">http://git.postgresql.org/pg/commitdiff/24c19e6bf96d556b3a9517ce42f54b5756ca0384</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve handling of INT_MIN / -1 and related cases. Some platforms throw an exception for this division, rather than returning a necessarily-overflowed result. Since we were testing for overflow after the fact, an exception isn't nice. We can avoid the problem by treating division by -1 as negation. Add some regression tests so that we'll find out if any compilers try to optimize away the overflow check conditions. This ought to be back-patched, but I'm going to see what the buildfarm reports about the regression tests first. Per discussion with Xi Wang, though this is different from the patch he submitted. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f7cb5c30983752ff8de833de30afcaee63536d0">http://git.postgresql.org/pg/commitdiff/1f7cb5c30983752ff8de833de30afcaee63536d0</a></li>

<li>Don't launch new child processes after we've been told to shut down. Once we've received a shutdown signal (SIGINT or SIGTERM), we should not launch any more child processes, even if we get signals requesting such. The normal code path for spawning backends has always understood that, but the postmaster's infrastructure for hot standby and autovacuum didn't get the memo. As reported by Hari Babu in bug #7643, this could lead to failure to shut down at all in some cases, such as when SIGINT is received just before the startup process sends PMSIGNAL_RECOVERY_STARTED: we'd launch a bgwriter and checkpointer, and then those processes would have no idea that they ought to quit. Similarly, launching a new autovacuum worker would result in waiting till it finished before shutting down. Also, switch the order of the code blocks in reaper() that detect startup process crash versus shutdown termination. Once we've sent it a signal, we should not consider that exit(1) is surprising. This is just a cosmetic fix since shutdown occurs correctly anyway, but better not to log a phony complaint about startup process crash. Back-patch to 9.0. Some parts of this might be applicable before that, but given the lack of prior complaints I'm not going to worry too much about older branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27b2c6a1ef8ab5993e2aed4366d2c49c8989381a">http://git.postgresql.org/pg/commitdiff/27b2c6a1ef8ab5993e2aed4366d2c49c8989381a</a></li>

<li>Fix pg_resetxlog to use correct path to postmaster.pid. Since we've already chdir'd into the data directory, the file should be referenced as just "postmaster.pid", without prefixing the directory path. This is harmless in the normal case where an absolute PGDATA path is used, but quite dangerous if a relative path is specified, since the program might then fail to notice an active postmaster. Reported by Hari Babu. This got broken in my commit eb5949d190e80360386113fde0f05854f0c9824d, so patch all active versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/455b8887cf79dc4d4b5fea0cf65f56f316baaaa2">http://git.postgresql.org/pg/commitdiff/455b8887cf79dc4d4b5fea0cf65f56f316baaaa2</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>In pg_upgrade, report errno string if file existence check returns an error and errno != ENOENT. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b55743a5df13711b8143cd3f53c8abc3416ee520">http://git.postgresql.org/pg/commitdiff/b55743a5df13711b8143cd3f53c8abc3416ee520</a></li>

<li>In pg_upgrade, fix a few place that used maloc/free rather than pg_malloc/pg_free. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16e1ae77f9eb64ba7d292fd5f71e289a0fcaa854">http://git.postgresql.org/pg/commitdiff/16e1ae77f9eb64ba7d292fd5f71e289a0fcaa854</a></li>

<li>In pg_upgrade, simplify function copy_file() by using pg_malloc() and centralizing error/shutdown code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b711cf37c228749b6a8cef50e16e3c587d18dd4">http://git.postgresql.org/pg/commitdiff/6b711cf37c228749b6a8cef50e16e3c587d18dd4</a></li>

</ul>

<p>Michael Meskes a pouss&eacute;&nbsp;:</p>

<ul>

<li>Applied patch by Chen Huajun &lt;chenhj AT cn DOT fujitsu DOT com&gt; to make ecpg able to cope with very long structs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c50b8a4637bcaab2f0e1fb69c39fdcec7e535874">http://git.postgresql.org/pg/commitdiff/c50b8a4637bcaab2f0e1fb69c39fdcec7e535874</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove -Wlogical-op from standard compiler flags. It creates too many warnings with GCC 4.3 and 4.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc5430aa95ac672a82bedb88e3f5081a8fdadb1c">http://git.postgresql.org/pg/commitdiff/bc5430aa95ac672a82bedb88e3f5081a8fdadb1c</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in three more revisions of a patch to allow switching timelines over streaming replication.</li>

<li>Alvaro Herrera sent in two more revisions of the patch to add custom background worker processes.</li>

<li>Alexander Korotkov sent in four more revisions of a patch to allow certain types of regex to use trigrams, i.e. indexes.</li>

<li>Marcin Ma&#324;k sent in a WIP patch to speed up headline generation in textsearch.</li>

<li>Robert Haas sent in three more revisions of a patch to implement a binary heap.</li>

<li>Zoltan Boszormenyi sent in five more revisions of a patch to enable pg_basebackup to configure and start a standby.</li>

<li>Andrew Dunstan sent in a patch to fix an infelicity in names on the Windows platform.</li>

<li>Andrew Dunstan sent in two revisions of a patch to enhance JSON generation.</li>

<li>Magnus Hagander and Zoltan Boszormenyi traded patches to add a PQconninfo() function.</li>

<li>Shigeru HANADA sent in another revision of a patch to add a FDW for PostgreSQL.</li>

<li>Jeff Davis sent in two more revisions of a patch to remove PD_ALL_VISIBLE.</li>

<li>Etsuro Fujita sent in another revision of a patch to add PRE- and POST- options to COPY.</li>

<li>Fujii Masao sent in another revision of a patch to add a pg_stat_ginindex to pg_stattuple.</li>

<li>Asif Rehman sent in two more revisions of a patch to allow PL/pgsql to return a row expression in certain cases.</li>

<li>Amit Kapila sent in another revision of a patch to allow postgresql.conf values to be changed via SQL.</li>

<li>Alvaro Herrera sent in another revision of a patch to split up the *_desc routines.</li>

<li>Bruce Momjian sent in a patch to fix a performance issue in pg_upgrade in the many-tables case.</li>

<li>Jeff Janes and Bruce Momjian traded patches to fix a performance issue in pg_upgrade in the many-tables case...another approach.</li>

<li>Andres Freund sent in a patch to fix an infelicity in the interaction of CREATE INDEX CONCURRENTLY and HOT update.</li>

<li>KaiGai Kohei sent in another revision of a patch to implement row-level access control.</li>

<li>Jeff Davis sent in another revision of a patch to enable page checksums.</li>

<li>Tom Lane sent in a patch to fix an infelicity in max()/min() in certain cases. The patch changes the behavior of mutate_eclass_expressions().</li>

</ul>