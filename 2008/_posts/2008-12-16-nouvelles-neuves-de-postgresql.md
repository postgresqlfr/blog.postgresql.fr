---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2008/12/16/Nouvelles-neuves-de-PostgreSQL"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 14 décembre 2008</strong></p>

<p>Bienvenue à notre tout nouveau membre&nbsp;: Pascal Scherbaum&nbsp;:)

<a target="_blank" href="http://pascal.scherbaum.la/index.en.php">http://pascal.scherbaum.la/index.en.php</a></p>

<p>Mark Wong et quelques autres personnes ont lancé une série de conférences mensuelles à propos des performances de PostgreSQL. La première aura lieu le 8 janvier à 19h à l'Université d'État de Portland, "Fourth Ave Building", salle 86-01. RSVP sur la liste du PDXPUG.</p>

<p>L'ARPUG a mis sur pied un serveur Pootle pour la traduction&nbsp;:

<a target="_blank" href="http://pootle.arpug.com.ar/">http://pootle.arpug.com.ar/</a></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20081214">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Archiveopteryx 3.0.5&nbsp;:

<a target="_blank" href="http://www.archiveopteryx.org/3.0.4">http://www.archiveopteryx.org/3.0.4</a></li>

<li>Turnkey Linux a publié plusieurs "packs" basés sur PostgreSQL&nbsp;:

<a target="_blank" href="http://www.turnkeylinux.org/appliances/postgresql">http://www.turnkeylinux.org/appliances/postgresql</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en décembre</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-12/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>"L'appel aux conférenciers" est lancé pour le FOSDEM 2009 [ndt: 7-8 février 2009, Bruxelles]. Il y aura une rencontre PostgreSQL et nous y partagerons une salle "développeurs" avec les groupes BSD. Proposez vos exposés à l'adresse _fosdem (a) postgresql (point) eu_ avant le 2 janvier 2009.</li>

<li>La "PGCon Brazil" prendra place à l'Unicamp de Campinas (État de São Paulo) les 23 &amp; 24 octobre 2009.</li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, add note that autovacuum can use up several times maintenance_work_mem, with warning against setting it too high.</li>

<li>In pgsql/doc/src/sgml/maintenance.sgml, clarify how processes are started by autovacuum, and what the effect of autovacuum_max_workers parameter is. Per discussion with Alvaro Herrera.</li>

<li>In pgsql/src/backend/libpq/be-secure.c, replace both send and receive BIO routines in the SSL code with our own, calling recv() and send(). This makes the calls go through the socket emulation code on Win32, making them for example properly interruptible.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/postmaster/pgstat.c, teach pgstat_vacuum_stat to not bother scanning pg_proc in the common case where no function stats entries exist. Partial response to Pavel Stehule's observation that small VACUUM operations are noticeably slower in CVS HEAD than 8.3.</li>

<li>In pgsql/doc/src/sgml/syntax.sgml, add a specific example of parenthesizing when extracting a field of a composite column. Might help cut down on future questions...</li>

<li>In pgsql/src/backend/storage/freespace/fsmpage.c, tweak the tree descent loop in fsm_search_avail to not look at the right child if it doesn't need to. This saves some miniscule number of cycles, but the ulterior motive is to avoid an optimization bug known to exist in SCO's C compiler (and perhaps others?)</li>

<li>To reduce confusion over whether VACUUM FULL is needed for anti-wraparound vacuuming (it's not), say "database-wide VACUUM" instead of "full-database VACUUM" in the relevant hint messages. Also, document the permissions needed to do this. Per today's discussion.</li>

<li>Fix failure to ensure that a snapshot is available to datatype input functions when they are invoked by the parser. We had been setting up a snapshot at plan time but really it needs to be done earlier, before parse analysis. Per report from Dmitry Koterov. Also fix two related problems discovered while poking at this one: exec_bind_message called datatype input functions without establishing a snapshot, and SET CONSTRAINTS IMMEDIATE could call trigger functions without establishing a snapshot. Backpatch to 8.2. The underlying problem goes much further back, but it is masked in 8.1 and before because we didn't attempt to invoke domain check constraints within datatype input. It would only be exposed if a C-language datatype input function used the snapshot; which evidently none do, or we'd have heard complaints sooner. Since this code has changed a lot over time, a back-patch is hardly risk-free, and so I'm disinclined to patch further than absolutely necessary.</li>

<li>Remove pg_plan_queries()'s now-useless needSnapshot parameter. It's useless in 8.3, too, but I'm not back-patching this change since it would break any extension modules that might be calling that function.</li>

<li>Increase the default value of default_statistics_target from 10 to 100, and its maximum value from 1000 to 10000. ALTER TABLE SET STATISTICS similarly now allows a value up to 10000. Per discussion.</li>

<li>Restore enforce_generic_type_consistency's pre-8.3 behavior of allowing an actual argument type of ANYARRAY to match an argument declared ANYARRAY, so long as ANYELEMENT etc aren't used. I had overlooked the fact that this is a possible case while fixing bug #3852; but it is possible because pg_statistic contains columns declared ANYARRAY. Per gripe from Corey Horton.</li>

</ul>

<p>Heikki Linnakangas a commité&nbsp;:</p>

<ul>

<li>Provide support for multiplexing SIGUSR1 signal. The upcoming synchronous replication patch needs a signal, but we've already used SIGUSR1 and SIGUSR2 in normal backends. This patch allows reusing SIGUSR1 for that, and for other purposes too if the need arises.</li>

<li>Revert SIGUSR1 multiplexing patch, per Tom's objection.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/wal.sgml, update journaling performance docs based on comments by Michael Renner.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Append major version number and for libraries soname major version number to the gettext domain name, to simplify parallel installations. Also, rename set_text_domain() to pg_bindtextdomain(), because that is what it does.</li>

<li>Move carefully obscured SunOS 4 specific #include out of c.h into port header file. SunOS 4 is probably broken anyway, but this item stuck out as completely weird.</li>

<li>The macros NULL_DEV and DEVNULL were both used to work around platform-specific spellings of /dev/null. But one should be enough, so settle on DEVNULL.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/preproc/ecpg.trailer, using clause has to accept signed numeric constants too.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Reduce some rel.h inclusions, and add pg_list.h to pg_proc_fn.h.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Eisentraut and Martin Pihlak sent in revised versions a patch to add an SQL/MED-compatible connection manager.</li>

<li>Heikki Linnakangas and Fujii Masao sent in revised versions of a patch to multiplex SIGUSR1 for synchronous replication.</li>

<li>Magnus Hagander sent in another revision of the patch to add an sslcert option to libpq connections.</li>

<li>Magnus Hagander sent in a patch which replaces the current SSL BIO wrapper code.</li>

<li>Gregory Stark sent in two more revisions of the posix fadvise patch.</li>

<li>Andrew Dunstan sent in another revision of his patch to do parallel restore.</li>

<li>Emmanuel Cecchet sent in another revision of his patch to do automated partitioning.</li>

<li>Emmanuel Cecchet sent in another revision of his patch to do help with transactions on temporary tables.</li>

<li>Teodor Sigaev sent in another revision of his GIN improvements patch.</li>

</ul>