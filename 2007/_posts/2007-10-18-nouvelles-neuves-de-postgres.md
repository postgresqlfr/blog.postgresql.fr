---
layout: post
title: "Nouvelles neuves de Postgres"
author: "NBougain"
redirect_from: "index.php?post/drupal-138 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>Bucardo 3.0.7 est sorti&nbsp;:

<a target="_blank" href="http://bucardo.org/">http://bucardo.org/</a></li>

<li>pgAdmin III v1.8.0 RC 1 est disponible&nbsp;:

<a target="_blank" href="http://pgadmin.org/">http://pgadmin.org/</a></li>

<li>pgBouncer 1.1 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgbouncer/">http://pgfoundry.org/projects/pgbouncer/</a></li>

<li>ptop 3.6.1 beta 1 est disponible&nbsp;:

<a target="_blank" href="http://ptop.projects.postgresql.org/">http://ptop.projects.postgresql.org/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en octobre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Simon Riggs donnera une conférence pendant le séminaire 'les Bases de Données et le Web', le 16 octobre à Londres&nbsp;:

<a target="_blank" href="http://www.ukuug.org/events/seminars/databases/booking/">http://www.ukuug.org/events/seminars/databases/booking/</a></li>

<li>La PostgreSQL Conference Fall 2007 aura lieu le 20 octobre à l'Université d'État de Portland (Oregon, USA)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>La première réunion du PUG néo-zélandais aura lieu à Wellington, le 6 novembre 2007. Plus de détails à l'adresse&nbsp;:

<a target="_blank" href="http://pgug.org.nz">http://pgug.org.nz</a></li>

<li>Jetez un œil sur le nouveau forum Postgres concernant les emplois germanophones&nbsp;:

<a target="_blank" href="http://www.pg-forum.de/jobboerse-marktplatz/">http://www.pg-forum.de/jobboerse-marktplatz/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Envoyez-les en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Synced parser and keyword list in ecpg.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/config.sgml, replace a reference to "start_log_collector" with "logging_collector", per Guillaume Lelarge. - Fix typo in REVOKE reference page. Guillaume Lelarge.</li>

<li>Minor correction for full-text search limitations docs. Heikki Linnakangas.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/libpq/fe-connect.c, don't try to free pgpassfile since it's a stack variable. Martin Pitt.</li>

<li>In pgsql/src/port/chklocale.c, add missing codepage numbers for Windows. Dave Page.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/contrib/txid, get rid of dependency on strtoull() --- Marko Kreen. Some additional minor editorializing by Tom.</li>

<li>In pgsql/contrib/txid/txid.c, faster test for overflow in str2txid, from Marko.</li>

<li>Clarify user of "postmaster" vs. "server" in FAQs. Brendan Jurd</li>

<li>Fix the plan-invalidation mechanism to treat regclass constants that refer to a relation as a reason to invalidate a plan when the relation changes. This handles scenarios such as dropping/recreating a sequence that is referenced by nextval('seq') in a cached plan. Rather than teach plancache.c all about digging through plan trees to find regclass Consts, we charge the planner's setrefs.c with making a list of the relation OIDs on which each plan depends. That way the list can be built cheaply during a plan tree traversal that has to happen anyway. Per bug #3662 and subsequent discussion.</li>

<li>In pgsql/src/backend/access/heap/tuptoaster.c, remove incorrect use of VARSIZE() on a toasted datum. We can just remove it instead of fix it, since once we've set toast_action[i] to 'p' it no longer matters what toast_sizes[i] is. Greg Stark</li>

<li>Code review for txid patch: add binary I/O functions, avoid dependence on SerializableSnapshot, minor other cleanup. Marko Kreen, some further editorialization by me.</li>

<li>Remove hack in pg_tablespace_aclmask() that disallowed permissions on pg_global even to superusers, and replace it with checks in various other places to complain about invalid uses of pg_global. This ends up being a bit more code but it allows a more specific error message to be given, and it un-breaks pg_tablespace_size() on pg_global. Per discussion.</li>

<li>When telling the bgwriter that we need a checkpoint because too much xlog has been consumed, recheck against the latest value of RedoRecPtr before really sending the signal. This avoids useless checkpoint activity if XLogWrite is executed when we have a very stale local copy of RedoRecPtr. The potential for useless checkpoint is very much worse in 8.3 because of the walwriter process (which never does XLogInsert), so while this behavior was intentional, it needs to be changed. Per report from Itagaki Takahiro.</li>

<li>Teach planagg.c that partial indexes specifying WHERE foo IS NOT NULL can be used to perform MIN(foo) or MAX(foo), since we want to discard null rows in the indexscan anyway. (This would probably fall out for free if we were injecting the IS NOT NULL clause somewhere earlier, but given the current anatomy of the MIN/MAX optimization code we have to do it explicitly. Fortunately, very little added code is needed.) Per a discussion with Henk de Wit.</li>

<li>Fix ALTER COLUMN TYPE to preserve the tablespace and reloptions of indexes it affects. The original coding neglected tablespace entirely (causing the indexes to move to the database's default tablespace) and for an index belonging to a UNIQUE or PRIMARY KEY constraint, it would actually try to assign the parent table's reloptions to the index :-(. Per bug #3672 and subsequent investigation. 8.0 and 8.1 did not have reloptions, but the tablespace bug is present.</li>

<li>Fix the inadvertent libpq ABI breakage discovered by Martin Pitt: the renumbering of encoding IDs done between 8.2 and 8.3 turns out to break 8.2 initdb and psql if they are run with an 8.3beta1 libpq.so. For the moment we can rearrange the order of enum pg_enc to keep the same number for everything except PG_JOHAB, which isn't a problem since there are no direct references to it in the 8.2 programs anyway. (This does force initdb unfortunately.) Going forward, we want to fix things so that encoding IDs can be changed without an ABI break, and this commit includes the changes needed to allow libpq's encoding IDs to be treated as fully independent of the backend's. The main issue is that libpq clients should not include pg_wchar.h or otherwise assume they know the specific values of libpq's encoding IDs, since they might encounter version skew between pg_wchar.h and the libpq.so they are using. To fix, have libpq officially export functions needed for encoding name&lt;=&gt;ID conversion and validity checking; it was doing this anyway unofficially. It's still the case that we can't renumber backend encoding IDs until the next bump in libpq's major version number, since doing so will break the 8.2-era client programs. However the code is now prepared to avoid this type of problem in future. Note that initdb is no longer a libpq client: we just pull in the two source files we need directly. The patch also fixes a few places that were being sloppy about checking for an unrecognized encoding name.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, guard against possible double free during error escape from XML functions. Patch for the reported issue from Kris Jurka, some other potential trouble spots plugged by Tom.</li>

<li>Strengthen type_sanity's check on pg_type.typarray. It failed to complain about types that didn't have typarray set. Noted while working on txid patch.</li>

<li>Try to fix msvc build for recent initdb changes.</li>

<li>Remove contrib/txid, in preparation for migrating it into core.</li>

<li>Migrate the former contrib/txid module into core. This will make it easier for Slony and Skytools to depend on it. Per discussion.</li>

<li>Ooops, forgot about adding -DFRONTEND to pgsql/src/tools/msvc/Mkvcbuild.pm</li>

<li>In pgsql/src/include/Makefile, make install is supposed to install everything under src/include/, but it was missing a bunch of recently-added subdirectories.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add to TODO: "Have ALTER SEQUENCE RENAME rename the sequence name stored in the sequence table."</li>

<li>Add to TODO: "MONEY dumps in a locale-specific format making it difficult to restore to a system with a different locale."</li>

<li>Add comment to pgsql/src/tools/pgcvslog</li>

<li>Typo fix. Euler Taveira de Oliveira</li>

<li>Update Brazilian FAQ. Euler Taveira de Oliveira</li>

<li>Update sequence FAQ items, per suggestion from Pavel Stehule.</li>

<li>Remove FAQ item about temp tables in plpsql having invalid oid problems, per suggestions from Pavel Stehule.</li>

<li>In FAQ, add mention of full text indexing for word searches.</li>

<li>Update Japanese FAQ. Jun Kuwamura.</li>

<li>In pgsql/doc/src/sgml/release.sgml, back out release changes that weren't ready for commit.</li>

<li>Whitespace cleanup in pgsql/doc/src/sgml/func.sgml.</li>

<li>Update release notes in "major" and "migration" sections. Still have remainder of release notes to review.</li>

<li>Add missing word to pgsql/doc/src/sgml/release.sgml.</li>

<li>In pgsql/src/backend/optimizer/util/clauses.c, ensure that the result of evaluating a function during constant-expression simplification gets detoasted before it is incorporated into a Const node. Otherwise, if an immutable function were to return a TOAST pointer (an unlikely case, but it can be made to happen), we would end up with a plan that depends on the continued existence of the out-of-line toast datum.</li>

<li>In FAQ, attached some minor corrections, mainly completion of removal of the "relation with OID ##### does not exist" item, and some URL corrections.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Pas de déception cette semaine :-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tom Lane sent in a patch from Sergey Karpov to fill in the lack of any working code examples for user-written tsearch parsers and dictionaries.</li>

<li>Sergey Karpov sent in two versions of a patch to create custom tsearch2 dictionaries for /contrib.</li>

<li>Marko Kreen sent in a patch which adds txid to core.</li>

<li>Brendan Jurd sent in a patch which creates a quote_literal function called quote_null which allows for NULLs and returns the text NULL.</li>

<li>Simon Riggs sent in a patch which makes VACUUMs to cancel blocking auto{vacuum,analyze}s.</li>

<li>Gregory Stark sent in a patch intended to fix an assertion failure with small (1K) compile-time block sizes.</li>

<li>Tom Lane sent in an updated patch for the examples in Sergey Karpov's proposed contrib modules dict_int, dict_xsyn, and test_parser.</li>

</ul>