---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 18 septembre 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-09-26-nouvelles-hebdomadaires-de-postgresql-18-septembre-2011 "
---


<p>PostgreSQL 9.1.0 a &eacute;t&eacute; publi&eacute;e&nbsp;! De nouvelles fonctionnalit&eacute;s de pointe, de meilleures performances... Bref, que du bon&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/docs/current/static/release-9-1.html">http://www.postgresql.org/docs/current/static/release-9-1.html</a></p>

<p>Le prochain commitfest du cycle de la 9.2 a commenc&eacute; le 15 septembre 2011&nbsp;: 

<a target="_blank" href="http://commitfest.postgresql.org/">http://commitfest.postgresql.org/</a></p>

<p>Relecteurs recherch&eacute;s pour relecture en ronde&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/RRReviewers">http://wiki.postgresql.org/wiki/RRReviewers</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgfincore 1.1, un ensemble de fonctions de gestion bas-niveau des relations utilisant mincore pour explorer la m&eacute;moire cache&nbsp;: 

<a target="_blank" href="http://villemain.org/projects/pgfincore">http://villemain.org/projects/pgfincore</a></li>

<li>PL/Java 1.4.3&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pljava/">http://pgfoundry.org/projects/pljava/</a></li>

<li>Veil 9.1.0, un syst&egrave;me de contr&ocirc;le d'acc&egrave;s &agrave; fine granularit&eacute;&nbsp;: 

<a target="_blank" href="http://veil.projects.postgresql.org/curdocs/index.html">http://veil.projects.postgresql.org/curdocs/index.html</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San Jos&eacute; (Californie, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>Le <em>PG-Day Denver 2011</em> aura lieu le vendredi 21 octobre 2011 dans le campus Auraria pr&egrave;s de Denver, Colorado&nbsp;: 

<a target="_blank" href="http://pgday.consistentstate.com/">http://pgday.consistentstate.com/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110918">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>In the final emptying phase of the new GiST buffering build, set the queuedForEmptying flag correctly on buffer when adding it to the queue. Also, don't add buffer to the queue if it's there already. These were harmless oversights; failing to set the flag just means that a buffer might get added to the queue twice if more tuples are added to it (although that can't actually happen at this point because all the upper buffers have already been emptied), and having the same buffer twice in the emptying queue is harmless. But better be tidy. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8caf6132c7498b2b9400a5496a29e48c1c0aa516">http://git.postgresql.org/pg/commitdiff/8caf6132c7498b2b9400a5496a29e48c1c0aa516</a></li>

<li>In the manual section on primary_conninfo, recommend using a role with REPLICATION privileges, not SUPERUSER. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/76df369c060695edaed5b9502f85e7a3e07f8b1f">http://git.postgresql.org/pg/commitdiff/76df369c060695edaed5b9502f85e7a3e07f8b1f</a></li>

<li>Teach the makefile used to build stand-alone libpq on Windows that libpq needs win32setlocale.c now. The cygwin and MSVC build scripts were changed earlier, but this was neglected. This should fix bug report #6203 by Steve. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09e98a3e170ecdeb25a0e1afe81bdbeeeaf21f48">http://git.postgresql.org/pg/commitdiff/09e98a3e170ecdeb25a0e1afe81bdbeeeaf21f48</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Propagate with_system_tzdata setting into initdb build. findtimezone.c needs to know this setting too. Per Peter Eisentraut. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f3304408cb103745ee0722d303c526594a8046c">http://git.postgresql.org/pg/commitdiff/3f3304408cb103745ee0722d303c526594a8046c</a></li>

<li>deflist_to_tuplestore dumped core on an option with no value. Make it return NULL for the option_value, instead. Per report from Frank van Vugt. Back-patch to 8.4 where this code was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6693c9a5ed3ac9c07160039742dde8aa67e96ecf">http://git.postgresql.org/pg/commitdiff/6693c9a5ed3ac9c07160039742dde8aa67e96ecf</a></li>

<li>Redesign the plancache mechanism for more flexibility and efficiency. Rewrite plancache.c so that a "cached plan" (which is rather a misnomer at this point) can support generation of custom, parameter-value-dependent plans, and can make an intelligent choice between using custom plans and the traditional generic-plan approach. The specific choice algorithm implemented here can probably be improved in future, but this commit is all about getting the mechanism in place, not the policy. In addition, restructure the API to greatly reduce the amount of extraneous data copying needed. The main compromise needed to make that possible was to split the initial creation of a CachedPlanSource into two steps. It's worth noting in particular that SPI_saveplan is now deprecated in favor of SPI_keepplan, which accomplishes the same end result with zero data copying, and no need to then spend even more cycles throwing away the original SPIPlan. The risk of long-term memory leaks while manipulating SPIPlans has also been greatly reduced. Most of this improvement is based on use of the recently-added MemoryContextSetParent primitive. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6faf910d75027bdce7cd0f2033db4e912592bcc">http://git.postgresql.org/pg/commitdiff/e6faf910d75027bdce7cd0f2033db4e912592bcc</a></li>

<li>gistendscan() forgot to free so-&gt;giststate. This oversight led to a massive memory leak --- upwards of 10KB per tuple --- during creation-time verification of an exclusion constraint based on a GIST index. In most other scenarios it'd just be a leak of 10KB that would be recovered at end of query, so not too significant; though perhaps the leak would be noticeable in a situation where a GIST index was being used in a nestloop inner indexscan. In any case, it's a real leak of long standing, so patch all supported branches. Per report from Harald Fuchs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a6cc28500b7a8db7a27cbd0d75e18837fb2e367">http://git.postgresql.org/pg/commitdiff/0a6cc28500b7a8db7a27cbd0d75e18837fb2e367</a></li>

<li>Ensure generic plan gets used for a plpgsql expression with no parameters. Now that a NULL ParamListInfo pointer causes significantly different behavior in plancache.c, be sure to pass it that way when the expression is known not to reference any plpgsql variables. Saves a few setup cycles anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6ed34f70d57d102da8383919e0046c577d317e7">http://git.postgresql.org/pg/commitdiff/e6ed34f70d57d102da8383919e0046c577d317e7</a></li>

<li>Avoid unnecessary page-level SSI lock check in heap_insert(). As observed by Heikki, we need not conflict on heap page locks during an insert; heap page locks are only aggregated tuple locks, they don't imply locking "gaps" as index page locks do. So we can avoid some unnecessary conflicts, and also do the SSI check while not holding exclusive lock on the target buffer. Kevin Grittner, reviewed by Jeff Davis. Back-patch to 9.1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d306c66e63eb7f45eab9475b3f96c3134bacac6">http://git.postgresql.org/pg/commitdiff/9d306c66e63eb7f45eab9475b3f96c3134bacac6</a></li>

<li>Add FORCE_NOT_NULL support to the file_fdw foreign data wrapper. This is implemented as a per-column boolean option, rather than trying to match COPY's convention of a single option listing the column names. Shigeru Hanada, reviewed by KaiGai Kohei 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86a3f2d492f19da1f4be8ba099747ac5c83c43bb">http://git.postgresql.org/pg/commitdiff/86a3f2d492f19da1f4be8ba099747ac5c83c43bb</a></li>

<li>Remove debug logging for pgstat wait timeout. This reverts commit 79b2ee20c8a041a85dd230c4e787bef22edae57b, which proved to not be very informative; it looks like the "pgstat wait timeout" warnings in the buildfarm are just a symptom of running on heavily loaded machines, and there isn't any weird mechanism causing them to appear. To try to reduce the frequency of buildfarm failures from this effect, increase PGSTAT_MAX_WAIT_TIME from 5 seconds to 10. Also, arrange to not send a fresh inquiry message every single time through the loop, as that seems more likely to cause problems (by swamping the collector) than fix them. We'll now send an inquiry the first time through the delay loop, and every 640 msec thereafter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99b5454167aab89b94f171e4318ef12443c6cfc4">http://git.postgresql.org/pg/commitdiff/99b5454167aab89b94f171e4318ef12443c6cfc4</a></li>

<li>Fix Assert failure in new plancache code. The regression tests were failing with CLOBBER_CACHE_ALWAYS enabled, as reported by buildfarm member jaguar. There was an Assert in BuildCachedPlan that asserted that the CachedPlanSource hadn't been invalidated since we called RevalidateCachedQuery, which in theory can't happen because we are holding locks on all the relevant database objects. However, CLOBBER_CACHE_ALWAYS generates a false positive by making an invalidation happen anyway; and on reflection, that could also occur as a result of a badly-timed sinval reset due to queue overflow. We could just remove the Assert and forge ahead with the not-really-stale querytree, but it seems safer to do another RevalidateCachedQuery call just to make real sure everything's OK. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4ae968633b37e3b0a5da83e9d7d2a5518191564">http://git.postgresql.org/pg/commitdiff/c4ae968633b37e3b0a5da83e9d7d2a5518191564</a></li>

<li>Fix another Assert issue exposed by CLOBBER_CACHE_ALWAYS. plpgsql's exec_stmt_execsql was Assert'ing that a CachedPlanSource was is_valid immediately after exec_prepare_plan. The risk factor in this case is that after building the prepared statement, exec_prepare_plan calls exec_simple_check_plan, which might try to generate a generic plan --- and with CLOBBER_CACHE_ALWAYS or other unusual causes of invalidation, that could result in an invalidation. However, that path could only be taken for a SELECT query, for which we need not set mod_stmt. So in this case I think it's best to just remove the Assert; it's okay to look at a slightly-stale querytree for what we need here. Per buildfarm testing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/faf5cee7f0189beba206a5d96c0abd8e4382b844">http://git.postgresql.org/pg/commitdiff/faf5cee7f0189beba206a5d96c0abd8e4382b844</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Split walsender.h in public/private headers. This dramatically cuts short the number of headers the public one brings into whatever includes it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86822df9b5d5fe16d2528c7fc9428137414faa4f">http://git.postgresql.org/pg/commitdiff/86822df9b5d5fe16d2528c7fc9428137414faa4f</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jun Ishiduka sent in another revision of the patch to allow taking a base backup from a hot standby.</li>

<li>KaiGai Kohei sent in another revision of the patches to fix leaky views.</li>

<li>Alvaro Herrera sent in a patch splitting walsender into public and private components.</li>

<li>Marko (johto) Tiikkaja sent in another revision of the patch to add nfiltered to EXPLAIN output.</li>

<li>KaiGai Kohei sent in a patch which enables the control/sepgsql to assign security label to pg_database objects which are then used as a basis to compute a default security label of schema objects.</li>

<li>Etsuro Fujita sent in a WIP patch to allow collecting statistics on CSV files attached via FDW.</li>

<li>Kyotaro HORIGUCHI sent in a patch to create an encoding-specific character incrementer.</li>

<li>Joachim Wieland sent in another revision of the patch to enable and export synchronized snapshots.</li>

<li>Jeff Davis sent in another revision of the patch to add range types.</li>

<li>Hans-Juergen Schoenig sent in another WIP patch to allow cross-column statistics.</li>

<li>Heikki Linnakangas sent in a patch to allow inserting heap tuples in bulk during COPY.</li>

<li>Shigeru HANADA sent in a patch to allow pushing JOINs to foreign tables when using FDWs.</li>

<li>Robert Haas sent in another revision of the patch to put up some memory barriers for the case of machines with weak memory ordering.</li>

<li>Fujii Masao sent in another revision of the patch to add a pg_last_xact_insert_timestamp.</li>

<li>Fujii Masao sent in another revision of the patch to unite recovery.conf and postgresql.conf</li>

<li>Yeb Havinga sent in another revision of the patch to enable calling a scroll cursor with named parameters.</li>

<li>Andrew Dunstan sent in a patch to create a \setenv utility in psql.</li>

<li>David Wheeler sent in two revisions of a patch to use xsubpp in modern Perls.</li>

<li>Simon Riggs sent in a patch to separate the bgwriter and the checkpointer into separate components.</li>

<li>Alexander Korotkov sent in another revision of the double sorting split patch.</li>

<li>Marti Raudsepp sent in another revision of the patch to cache stable expressions with constant arguments.</li>

<li>Peter Eisentraut sent in another revision of the patch to test pg_upgrade.</li>

<li>Marti Raudsepp sent in another revision of the patch to generate column names for subquery expressions.</li>

</ul>