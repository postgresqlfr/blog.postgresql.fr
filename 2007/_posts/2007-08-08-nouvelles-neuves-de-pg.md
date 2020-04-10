---
layout: post
title: "Nouvelles neuves de PG"
author: "NBougain"
redirect_from: "index.php?post/drupal-261 "
---



<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Le langage de programmation Alinous-Core web/database est disponible&nbsp;:

<a target="_blank" href="http://alinous.org">http://alinous.org</a></li>

<li>pgpool 3.4 et pgpool-II 1.2 sont sortis&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>PostBooks 1.0 est disponible&nbsp;:

<a target="_blank" href="http://www.xtuple.com/pb-gettingstarted">http://www.xtuple.com/pb-gettingstarted</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en août</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-08/threads.php</a></p>

<p><strong>Activités locales autour de PostgreSQL</strong></p>

<ul>

<li>David Fetter sera aux "Septimas Jornadas Regionales de Software Libre"&nbsp;:

<a target="_blank" href="http://jornadas.grulic.org.ar/7/">http://jornadas.grulic.org.ar/7/</a></li>

<li>Nous aurons une conférence, suivie d'une discussion et d'un dîner pendant la LinuxWorldExpo. Rejoignez-nous&nbsp;! Venez donner un coup de main&nbsp;!

<a target="_blank" href="http://developer.postgresql.org/index.php/LWESF2007">http://developer.postgresql.org/index.php/LWESF2007</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / Les nouvelles hebdomadaires ont été rédigées par David Fetter, la traduction française est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org et en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Update supported standalone VC++ version to 7.1+ only, and fix some bad data leftover in win32.mak. Per request from Hiroshi Saito.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Move session_start out of MyProcPort stucture and make it a global called MyStartTime, so that we will be able to create a cookie for all processes for CSVlogs. It is set wherever MyProcPid is set. Take the opportunity to remove the now unnecessary session-only restriction on the %s and %c escapes in log_line_prefix.</li>

<li>Make sure syslogPipe runs in binary mode on Windows to avoid corrupting the pipe chunking protocol. Backport to 8.0</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Tweak for initdb: if more command-line arguments were specified than expected, exit with an error, rather than complaining about the error on stderr but continuing onward.</li>

<li>In pgsql/src/backend/utils/sort/tuplestore.c, fix a memory leak in tuplestore_end(). Unlikely to be significant during normal operation, but tuplestore_end() ought to do what it claims to do.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Mark TODO as done: "Allow buffered WAL writes and fsync."</li>

<li>In pgsql/src/test/bench/runwisc.sh, fix strange quoting.</li>

<li>In pgsql/src/test/bench/create.sh, fix script quoting problem.</li>

<li>In pgsql/doc/FAQ_MINGW, remove links to old Win32 source code ports.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In Fix up bad layout of some comments (probably pg_indent's fault), and improve grammar a tad. Per Greg Stark.</li>

<li>Fix crash caused by log_timezone patch if we attempt to emit any elog messages between the setting of log_line_prefix and the setting of log_timezone. We can't realistically set log_timezone any earlier than we do now, so the best behavior seems to be to use GMT zone if any timestamps are to be logged during early startup. Create a dummy zone variable with a minimal definition of GMT (in particular it will never know about leap seconds), so that we can set it up without reference to any external files.</li>

<li>Fix a problem in my recent patch to initialize cancel_key for autovac workers as well as regular backends: if no regular backend launches before the autovac launcher tries to start an autovac worker, the postmaster would get an Assert fault due to calling PostmasterRandom before random_seed was initialized. Cleanest solution seems to be to take the initialization of random_seed out of ServerLoop and let PostmasterRandom do it for itself.</li>

<li>Switch over to using the src/timezone functions for formatting timestamps displayed in the postmaster log. This avoids Windows-specific problems with localized time zone names that are in the wrong encoding, and generally seems like a good idea to forestall other potential platform-dependent issues. To preserve the existing behavior that all backends will log in the same time zone, create a new GUC variable log_timezone that can only be changed on a system-wide basis, and reference log-related calculations to that zone instead of the TimeZone variable. This fixes the issue reported by Hiroshi Saito that timestamps printed by xlog.c startup could be improperly localized on Windows. We still need a simpler patch for that problem in the back branches, however.</li>

<li>Fix some sloppiness in the recent multiple-autovacuum-worker patch. It was not bothering to initialize is_autovacuum for regular backends, meaning there was a significant chance of the postmaster prematurely sending them SIGTERM during database shutdown. Also, leaving the cancel key unset for an autovac worker meant that any client could send it SIGINT, which doesn't sound especially good either.</li>

<li>Support an optional asynchronous commit mode, in which we don't flush WAL before reporting a transaction committed. Data consistency is still guaranteed (unlike setting fsync = off), but a crash may lose the effects of the last few transactions. Patch by Simon Riggs, some editorialization by Tom Lane.</li>

<li>Fix a bug in the original implementation of redundant-join-clause removal: clauses in which one side or the other references both sides of the join cannot be removed as redundant, because that expression won't have been constrained below the join. Per report from Sergey Burladyan. CVS HEAD does not contain this bug due to EquivalenceClass rewrite, but it seems wise to include the regression test for it anyway.</li>

<li>In pgsql/src/backend/executor/execUtils.c, if we're gonna use ExecRelationIsTargetRelation here, might as well simplify a bit further.</li>

<li>Fix security definer functions with polymorphic arguments. This case has never worked because fmgr_security_definer() neglected to pass the fn_expr information through. Per report from Viatcheslav Kalinin.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Gregory Stark sent in a patch which creates a user-visible function to make use of convert_to_scalar from SQL.</li>

</ul>