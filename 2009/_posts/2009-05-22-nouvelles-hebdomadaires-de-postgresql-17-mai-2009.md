---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 17 mai 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/05/22/Nouvelles-hebdomadaires-de-PostgreSQL-17-mai-2009"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 17 mai 2009</strong></p>

<p>Le PgDay de San Jose aura lieu le dimanche 19 juin, annon&ccedil;ant l'ouverture de l'OSCON. Soumettez vos propositions avant le 8 juin &agrave; conference-sf-speakers AT pgfoundry DOT org, les r&eacute;sultats seront donn&eacute;s le 20 juin&nbsp;: 

<a target="_blank" href="http://www.postgresql.org/about/news.1082">http://www.postgresql.org/about/news.1082</a></p>

<p>"Yet Another Perl Conference 10" est programm&eacute;e &agrave; Pittsburgh du 22 au 24 juin avec des conf&eacute;rences donn&eacute;es par David Fetter et suivie de cours par le fameux professeur Joe Celko&nbsp;: 

<a target="_blank" href="http://yapc10.org">http://yapc10.org</a></p>

<p>Les "PGCon 2009" ont lieu cette semaine &agrave; Ottawa. Attendez-vous apr&egrave;s coup &agrave; un afflux de nouvelles.</p>

<p><strong>La fonctionnalit&eacute; 8.4 de la semaine</strong></p>

<p>Les expressions de tables communes (CTE). Avec une syntaxe facile d'acc&egrave;s, vous pouvez configurer, &agrave; la vol&eacute;e, vos propres vues &agrave; usage unique. Et elles sont r&eacute;cursives, ce qui place les structures hi&eacute;rarchiques &agrave; port&eacute;e de main. [ndt: 

<a target="_blank" href="http://docs.postgresql.fr/8.4/queries-with.html]">http://docs.postgresql.fr/8.4/queries-with.html</a>]</p>

<p><strong>L'astuce de la semaine</strong></p>

<p>N'utilisez jamais <tt>fsync=off</tt> &agrave; moins que vous puissiez vous permettre de reconstruire tout votre cluster BDD &agrave; partir de rien. Si le log de transaction (WAL) fait trop baisser les performances, utilisez plut&ocirc;t <tt>synchronous_commit=false</tt>.</p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090517">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en May</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-05/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le 20 mai &agrave; Pise, Gabriele Bartolini de 2ndQuadrant Italie participera au rendez-vous "Open-Source: companies meet the students" organis&eacute; par le "Tuscany Open Source Software Laboratory". Plus d'informations (en italien)&nbsp;: 

<a target="_blank" href="http://www.tosslab.it/open-source-aziende-e-studenti-si-incontrano">http://www.tosslab.it/open-source-aziende-e-studenti-si-incontrano</a></li>

<li>La PGCon 2009 se tiendra &agrave; l'Universit&eacute; d'Ottawa les 21 et 22 mai 2009. Elle sera pr&eacute;c&eacute;d&eacute;e de deux jours de tutoriels les 19 &amp; 20 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2009/">http://www.pgcon.org/2009/</a></li>

<li>Le PgDay de Florianopolis aura lieu le 22 mai. Contactez Dickson S. Guedes (guedes AROBASE guedesoft DOT net) pour participer ou proposer une conf&eacute;rence&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.br/eventos/pgday/sc">http://www.postgresql.org.br/eventos/pgday/sc</a></li>

<li>Le PGDay de Junin / Buenos Aires aura lieu le 6 juin &agrave; l'Unnoba&nbsp;: 

<a target="_blank" href="http://www.arpug.com.ar/trac/wiki/PgDayUnnoba">http://www.arpug.com.ar/trac/wiki/PgDayUnnoba</a></li>

<li>Notez la date&nbsp;: pgDay San Jose, dimanche 19 juillet juste avant l'OSCON. Appel &agrave; conf&eacute;renciers, plus d'infos sous peu&nbsp;!</li>

<li>La "PGCon Brazil" prendra place &agrave; l'Unicamp de Campinas (&Eacute;tat de S&atilde;o Paulo) les 23 &amp; 24 octobre 2009.</li>

<li>Le PGDay.EU 2009 est programm&eacute; pour les 6 &amp; 7 novembre 2009 &agrave; Telecom ParisTech (ndt: ENST ?)&nbsp;: 

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. La traduction en est assur&eacute;e par l'&eacute;quipe PostgreSQLFr.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org.</i></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix cost_nestloop and cost_hashjoin to model the behavior of semi and anti joins a bit better, ie, understand the differing cost functions for matched and unmatched outer tuples. There is more that could be done in cost_hashjoin but this already helps a great deal. Per discussions with Robert Haas.</li>

<li>In pgsql/src/bin/pg_dump/pg_dumpall.c, adjust pg_dumpall so that it emits ENCODING, LC_COLLATE, and LC_CTYPE options in its CREATE DATABASE commands only for databases that have settings different from the installation defaults. This is a low-tech method of avoiding unnecessary platform dependencies in dump files. Eventually we ought to have a platform-independent way of specifying LC_COLLATE and LC_CTYPE, but that's not going to happen for 8.4, and this patch at least avoids the issue for people who aren't setting up per-database locales. ENCODING doesn't have the platform dependency problem, but it seems consistent to make it act the same as the locale settings.</li>

<li>In pgsql/src/backend/optimizer/util/predtest.c, make a marginal performance improvement in predicate_implied_by and predicate_refuted_by: if either top-level input is a single-element list, reduce it to its lone member before proceeding. This avoids a useless level of AND-recursion within the recursive proof routines. It's worth doing because, for example, if the clause is a 100-element list and the predicate is a 1-element list then we'd otherwise strip the predicate's list structure 100 times as we iterate through the clause. It's only needed at top level because there won't be any trivial ANDs below that --- this situation is an artifact of the decision to represent even single-item conditions as Lists in the "implicit AND" format, and that format is only used at the top level of any predicate or restriction condition.</li>

<li>In pgsql/src/backend/optimizer/util/predtest.c, partially revert my patch of 2008-11-12 that installed a limit on the number of AND/OR clause branches that predtest.c would attempt to deal with. As noted in bug #4721, that change disabled proof attempts for sizes of problems that people are actually expecting it to work for. The original complaint it was trying to solve was O(N2) behavior for long IN-lists, so let's try applying the limit to just ScalarArrayOpExprs rather than everything. Another case of "foolish consistency" I fear. Back-patch to 8.2, same as the previous patch was.</li>

<li>Do some minor code refactoring in preparation for changing the APIs of find_inheritance_children() and find_all_inheritors(). I got annoyed that these are buried inside the planner but mostly used elsewhere. So, create a new file catalog/pg_inherits.c and put them there, along with a couple of other functions that search pg_inherits. The code that modifies pg_inherits is (still) in tablecmds.c --- it's kind of entangled with unrelated code that modifies pg_depend and other stuff, so pulling it out seemed like a bigger change than I wanted to make right now. But this file provides a natural home for it if anyone ever gets around to that. This commit just moves code around; it doesn't change anything, except I succumbed to the temptation to make a couple of trivial optimizations in typeInheritsFrom().</li>

<li>Modify find_inheritance_children() and find_all_inheritors() to add the ability to lock relations as they scan pg_inherits, and to ignore any relations that have disappeared by the time we get lock on them. This makes uses of these functions safe against concurrent DROP operations on child tables: we will effectively ignore any just-dropped child, rather than possibly throwing an error as in recent bug report from Thomas Johansson (and similar past complaints). The behavior should not change otherwise, since the code was acquiring those same locks anyway, just a little bit later. An exception is LockTableCommand(), which is still behaving unsafely; but that seems to require some more discussion before we change it.</li>

<li>Fix LOCK TABLE to eliminate the race condition that could make it give weird errors when tables are concurrently dropped. To do this we must take lock on each relation before we check its privileges. The old code was trying to do that the other way around, which is a bit pointless when there are lots of other commands that lock relations before checking privileges. I did keep it checking each relation's privilege before locking the next relation, which is a detail that ALTER TABLE isn't too picky about.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, fix intratransaction memory leaks in xml_recv, xmlconcat, xmlroot, and xml_parse, all arising from the same sloppy usage of parse_xml_decl. The original coding had that function returning its output string parameters in the libxml context, which is long-lived, and all but one of its callers neglected to free the strings afterwards. The easiest and most bulletproof fix is to return the strings in the local palloc context instead, since that's short-lived. This was only costing a dozen or two bytes per function call, but that adds up fast if the function is called repeatedly ... Noted while poking at the more general problem of what to do with our libxml memory allocation hooks. Back-patch to 8.3, which has the identical coding.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, update release notes for changes through 2009-05-11. Also some minor copy-editing and reordering of items.</li>

<li>Rewrite xml.c's memory management (yet again). Give up on the idea of redirecting libxml's allocations into a Postgres context. Instead, just let it use malloc directly, and add PG_TRY blocks as needed to be sure we release libxml data structures in error recovery code paths. This is ugly but seems much more likely to play nicely with third-party uses of libxml, as seen in recent trouble reports about using Perl XML facilities in pl/perl and bug #4774 about contrib/xml2. I left the code for allocation redirection in place, but it's only built/used if you #define USE_LIBXMLCONTEXT. This is because I found it useful to corral libxml's allocations in a palloc context when hunting for libxml memory leaks, and we're surely going to have more of those in the future with this type of approach. But we don't want it turned on in a normal build because it breaks exactly what we need to fix. I have not re-indented most of the code sections that are now wrapped by PG_TRY(); that's for ease of review. pg_indent will fix it. This is a pre-existing bug in 8.3, but I don't dare back-patch this change until it's gotten a reasonable amount of field testing.</li>

<li>In pgsql/doc/src/sgml/func.sgml, remove a useless backslash from a pattern-match example. Michael Toews.</li>

<li>In pgsql/src/backend/rewrite/rewriteDefine.c, add checks to DefineQueryRewrite() to prohibit attaching rules to relations that aren't RELKIND_RELATION or RELKIND_VIEW, and to disallow attaching rules to system relations unless allowSystemTableMods is on. This is to make the behavior of CREATE RULE more like CREATE TRIGGER, which disallows the comparable cases. Per discussion of bug #4808.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, improve a couple of comments.</li>

<li>In pgsql/doc/src/sgml/pgstandby.sgml, clean up overly hasty docs patch for pg_standby.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, update release notes to today.</li>

<li>In pgsql/src/backend/access/transam/recovery.conf.sample, include recovery_end_command in recovery.conf.sample. Per suggestion of Jaime Casanova.</li>

<li>Fix all the server-side SIGQUIT handlers (grumble ... why so many identical copies?) to ensure they really don't run proc_exit/shmem_exit callbacks, as was intended. I broke this behavior recently by installing atexit callbacks without thinking about the one case where we truly don't want to run those callback functions. Noted in an example from Dave Page.</li>

<li>In pgsql/src/backend/libpq/pg_ident.conf.sample, improve comments in pg_ident.conf.sample.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, make an editorial pass over the Client Authentication material.</li>

<li>In pgsql/doc/src/sgml/storage.sgml, minor editorialization on storage.sgml's documentation of free space maps.</li>

<li>In pgsql/doc/src/sgml/maintenance.sgml, minor copy-editing for description of partial-table vacuuming.</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/libpq/be-secure.c, support SSL certificate chains in the server certificate file. Andrew (RhodiumToad) Gierth.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, edit the SSL and Kerberos parts of the release notes a bit, and add a note about the certificates chains patch just applied.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, move crypt auth comment to proper section. Add some details about the name=value format of auth options.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Add recovery_end_command option to recovery.conf. recovery_end_command is run at the end of archive recovery, providing a chance to do external cleanup. Modify pg_standby so that it no longer removes the trigger file, that is to be done using the recovery_end_command now. Provide a "smart" failover mode in pg_standby, where we don't fail over immediately, but only after recovering all unapplied WAL from the archive. That gives you zero data loss assuming all WAL was archived before failover, which is what most users of pg_standby actually want. recovery_end_command by Simon Riggs, pg_standby changes by Fujii Masao and myself.</li>

<li>In pgsql/doc/src/sgml/release-8.4.sgml, add a note to release notes about the smart failover mode in pg_standby.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>Translation updates.</li>

</ul>

<p>Marc Fournier a commit&eacute;&nbsp;:</p>

<ul>

<li>commit for BETA2.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Dickson S. Guedes's patch to change charset.sgml. CVS failure.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Damien Clochard sent in another revision of the patch to add inherited tables to \d+ output.</li>

<li>Khee Chin sent in three more revision of his patch to add index type and index expression to \d output in psql.</li>

<li>ITAGAKI Takahiro sent in a WIP patch to allow the FORCE QUOTE and FORCE NOT NULL options in COPY ... CSV not to take a column name as argument, and for absence of that argument to mean that the options would apply to all columns.</li>

<li>Pavel Stehule sent in two revisions of the GROUPING SETS patch.</li>

<li>KaiGai Kohei sent in another revision of his SE-PostgreSQL patches.</li>

<li>Euler Taveira de Oliveira sent in a patch to use ngettext on some more plural forms.</li>

</ul>