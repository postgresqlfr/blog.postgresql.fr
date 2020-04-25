---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/283"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 17 février 2008</strong></p>

<p>Le développement de PostgreSQL 8.4 est lancé.</p>

<p>Le "Suncoast PostgreSQL Users' Group" est fondé&nbsp;:

<a target="_blank" href="http://pugs.postgresql.org/spug">http://pugs.postgresql.org/spug</a></p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Les liaisons de libpq vers le langage de programmation "D" sont disponible [ndt: CVS]&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgd/">http://pgfoundry.org/projects/pgd/</a></li>

<li>DBD::Pg 2.0.0 est disponible&nbsp;:

<a target="_blank" href="http://search.cpan.org/%7Eturnstep/DBD-Pg-2.0.0/Pg.pm">http://search.cpan.org/~turnstep/DBD-Pg-2.0.0/Pg.pm</a></li>

<li>Devrim GUNDUZ a monté un live CD basé sur Fedora 8 et PostgreSQL 8.3&nbsp;:

<a target="_blank" href="http://yum.pgsqlrpms.org/livecd.php">http://yum.pgsqlrpms.org/livecd.php</a></li>

<li>neo_my2pg 0.6beta est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/my2postgres/">http://pgfoundry.org/projects/my2postgres/</a></li>

<li>Robert Bernier a publié pg_live 8.3.0.1&nbsp;:

<a target="_blank" href="http://205.237.195.102/">http://205.237.195.102/</a></li>

<li>AnySQL Maestro est disponible&nbsp;:

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/maestro/">http://www.sqlmaestro.com/products/postgresql/maestro/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en février</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2008-02/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Federico Campoli fera un exposé sur les entrailles de PostgreSQL lors du GRASS/FOSS au DICA de Perugia (Italie) le 22 février. Informations en VO&nbsp;:

<a target="_blank" href="http://www.grassmeeting2008.unipg.it/?q=node/10">http://www.grassmeeting2008.unipg.it/?q=node/10</a></li>

<li>Les groupes PostgreSQL et FreeBSD se sont donnés rendez-vous au FOSDEM le vendredi 22 février à 20h au Bier Circus de Bruxelles&nbsp;:

<a target="_blank" href="http://www.beerintheevening.com/pubs/s/27/27650/Le_Bier_Circus/Brussels">http://www.beerintheevening.com/pubs/s/27/27650/Le_Bier_Circus/Brussels</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="https://www.bsdwiki.de/FOSDEM_2008">https://www.bsdwiki.de/FOSDEM_2008</a></li>

<li>Le PUG Européen va élire son nouveau bureau de direction. Si vous souhaitez suggérer un candidat ou simplement pour le règlement du vote&nbsp;:

<a target="_blank" href="http://www.pgug.eu/election.txt">http://www.pgug.eu/election.txt</a></li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 29 et 30 mars 2008 à l'Université du Maryland, College Park&nbsp;. L'appel aux propositions a été lancé&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil)&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/vacuum.c, repair VACUUM FULL bug introduced by HOT patch: the original way of calculating a page's initial free space was fine, and should not have been "improved" by letting PageGetHeapFreeSpace do it. VACUUM FULL is going to reclaim LP_DEAD line pointers later, so there is no need for a guard against the page being too full of line pointers, and having one risks rejecting pages that are perfectly good move destinations. This also exposed a second bug, which is that the empty_end_pages logic assumed that any page with no live tuples would get entered into the fraged_pages list automatically (by virtue of having more free space than the threshold in the do_frag calculation). This assumption certainly seems risky when a low fillfactor has been chosen, and even without tunable fillfactor I think it could conceivably fail on a page with many unused line pointers. So fix the code to force do_frag true when notup is true, and patch this part of the fix all the way back. Per report from Tomas Szepe.</li>

<li>Fix SPI_cursor_open() and SPI_is_cursor_plan() to push the SPI stack before doing anything interesting, such as calling RevalidateCachedPlan(). The necessity of this is demonstrated by an example from Willem Buitendyk: during a replan, the planner might try to evaluate SPI-using functions, and so we'd better be in a clean SPI context. A small downside of this fix is that these two functions will now fail outright if called when not inside a SPI-using procedure (ie, a SPI_connect/SPI_finish pair). The documentation never promised or suggested that that would work, though; and they are normally used in concert with other functions, mainly SPI_prepare, that always have failed in such a case. So the odds of breaking something seem pretty low. In passing, make SPI_is_cursor_plan's error handling convention clearer, and fix documentation's erroneous claim that SPI_cursor_open would return NULL on error. Before 8.3 these functions could not invoke replanning, so there is probably no need for back-patching.</li>

<li>Stamp HEAD as 8.4devel.</li>

<li>Sync our regex code with upstream changes since last time we did this, which was Tcl 8.4.8. The main changes are to remove the never-fully-implemented code for multi-character collating elements, and to const-ify some stuff a bit more fully. In combination with the recent security patch, this commit brings us into line with Tcl 8.5.0. Note that I didn't make any effort to duplicate a lot of cosmetic changes that they made to bring their copy into line with their own style guidelines, such as adding braces around single-line IF bodies. Most of those we either had done already (such as ANSI-fication of function headers) or there is no point because pgindent would undo the change anyway.</li>

<li>In pgsql/src/backend/parser/parse_clause.c, remove ancient restriction that LIMIT/OFFSET can't contain a sub-select. This was probably protecting some implementation limitation when it was put in, but as far as I can tell the planner and executor have no such assumption anymore; the case seems to work fine. Per a gripe from Grzegorz Jaskiewicz.</li>

<li>Allow AS to be omitted when specifying an output column name in SELECT (or RETURNING), but only when the output name is not any SQL keyword. This seems as close as we can get to the standard's syntax without a great deal of thrashing. Original patch by Hiroshi Saito, amended by me.</li>

<li>Update timezone code to track the upstream changes since 2003. In particular this adds support for 64-bit tzdata files, which is needed to support DST calculations beyond 2038. Add a regression test case to give some minimal confidence that that really works. Heikki Linnakangas</li>

<li>Update docs to reflect the fact that we can now deal with DST rules outside the 32-bit-time_t range. Also, refer to Olson's tz database as the 'zoneinfo' database, a name that upstream sometimes uses, not 'zic database' which they never use.</li>

<li>Replace time_t with pg_time_t (same values, but always int64) in on-disk data structures and backend internal APIs. This solves problems we've seen recently with inconsistent layout of pg_control between machines that have 32-bit time_t and those that have already migrated to 64-bit time_t. Also, we can get out from under the problem that Windows' Unix-API emulation is not consistent about the width of time_t. There are a few remaining places where local time_t variables are used to hold the current or recent result of time(NULL). I didn't bother changing these since they do not affect any cross-module APIs and surely all platforms will have 64-bit time_t before overflow becomes an actual risk. time_t should be avoided for anything visible to extension modules, however.</li>

<li>Add back #include &lt;time.h&gt; in a couple of files that seem to need it on Linux.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/timezone/pgtz.c, update timezone mapping for Windows with new timezones added in windows servicepacks. Fix timezone mapping for "Mexico 2."</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/RELEASE_CHANGES, remove "update ecpg regression expected files for new library number." No longer necessary.</li>

<li>Bump minor library version numbers for 8.4.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, update wording for minor library bumping.</li>

<li>In pgsql/src/tools/RELEASE_CHANGES, add sub-bullet decoration.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, add section to Migration talking about typical areas that change between major releases.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, correct XML markup typo.</li>

<li>In pgsql/src/interfaces/libpq/fe-secure.c, rename a libpq NOT_USED SSL function to verify_peer_name_matches_certificate(), clarify some of the function's variables and logic, and update a comment. This should make SSL improvements easier in the future.</li>

<li>In pgsql/doc/src/sgml/config.sgml, add suggestion about how to set checkpoint_warning to log all checkpoints.</li>

<li>In pgsql/doc/src/sgml/config.sgml, no need to use checkpoint_warning to log checkpoints --- we added log_checkpoints in 8.3.</li>

<li>Mark TODO as done: 'Allow AS in "SELECT col AS label" to be optional in certain cases.'</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/RELEASE_CHANGES, update minor version bumping policy.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, added SQLSTATE macro closing bug #3961.</li>

<li>In ecpg, EXECUTE can return NOT FOUND so it should be checked here, too. Changed regression test accordingly.</li>

<li>Changed the way symbols are defined in C in INFORMIX mode. Added SQLSTATE macro closing bug #3961. EXECUTE can return NOT FOUND so it should be checked here too.</li>

<li>In pgsql/src/interfaces/ecpg/preproc/pgc.l, fixed conflicting commit.</li>

<li>In pgsql/src/interfaces/ecpg/test/expected/thread-prep.c, updated expected result for regression test.</li>

<li>Removed duplicate include of ecpgtype.h which meant I had to adapt all expected results. Changed INFORMIX mode symbol definition yet again because the old way didn't work on NetBSD. Hopefully this one does.</li>

<li>Changed INFORMIX mode symbol definition yet again because the old way didn't work on NetBSD.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Upgrade to autoconf 2.61. Change configure.in to use autoconf 2.61 and update generated files. Update build system and documentation to support now directory variables offered by autoconf 2.61. Replace usages of PGAC_CHECK_ALIGNOF by AC_CHECK_ALIGNOF, now available in autoconf 2.61. Drop our patched version of AC_C_INLINE, as autoconf now has the change.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Aucun déçu cette semaine :-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in two revisions of a patch to re-sync the tzcode library with its upstream counterpart.</li>

<li>Gevik Babakhani sent in a patch intended to fix NLS support on 8.3 compiled with MSVC.</li>

<li>Brendan Jurd sent in a patch to psql's \du which shows non-default role attributes one to a line in a single column.</li>

<li>Tom Lane sent in a patch which changes the TOAST strategies per suggestions by Gregory Stark, Jan Wieck and others.</li>

</ul>