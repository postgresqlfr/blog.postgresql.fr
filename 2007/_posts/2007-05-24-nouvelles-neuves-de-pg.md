---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-123 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 20 mai 2007</strong></p>

<p>Les <a target="_blank" href="http://www.pgcon.org/2007/">PgCon</a> ont lieu cette semaine à Ottawa.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>PGCluster 1.7.0rc7 a été publié&nbsp;:

<a target="_blank" href="http://pgfoundry.org/forum/forum.php?forum_id=1047">http://pgfoundry.org/forum/forum.php?forum_id=1047</a></li>

<li>EMS SQL Manager pour PostgreSQL 7.0 est sorti&nbsp;:

<a target="_blank" href="http://www.sqlmanager.net/products/postgresql/manager">http://www.sqlmanager.net/products/postgresql/manager</a></li>

</ul>

<p><strong>Jobs PostgreSQL en Mai</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>En route pour le PgDay 2007

<a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Les PostgreSQL Weekly News vous sont présentées cette semaine par David Fetter. Adaptation (quasi-)francophone de la bugness' trad team.</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/Makefile, mark some intermediate targets as .PRECIOUS, to replace the recently removed .SECONDARY target. This makes experimentation with the PDF builds easier.</li>

<li>Fix inappropriate comments in pgsql/doc/src/sgml/Makefile.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Tackling Vista problem - another try.</li>

<li>Removed mktime() call to hopefully get rid of some compatibility problems.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Tweaks for SGML markup.</li>

<li>Fix a bunch of bad grammar in the docs: "&lt;link&gt;, which see for more information" is un-good English.</li>

<li>Various fixes for the SGML docs. Consistently use spaces before/after parentheses in syntax descriptions. Consistently use the present tense when describing the basic purpose of each "DROP" command. Add a few more hyperlinks.</li>

<li>Make a few marginal improvements to the documentation for the autovacuum launcher daemon.</li>

<li>Add a note to the documentation to clarify that even when "autovacuum = off", the system may still periodically start autovacuum processes to prevent XID wraparound. Patch from David Fetter, with editorializing.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Remove directory qualification in &lt;ossp/uuid.h&gt; because it's not always installed in ossp. Workaround for when it is: include the ossp directory using --with-includes.</li>

<li>In pgsql/src/tools/msvc/Solution.pm, fix perl thinko.</li>

<li>Use configured pgport in MSVC config file.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>To support external compression of archived WAL data, add a flag bit to WAL records that shows whether it is safe to remove full-page images (ie, whether or not an on-line backup was in progress when the WAL entry was made). Also make provision for an XLOG_NOOP record type that can be used to fill in the extra space when decompressing the data for restore. This is the portion of Koichi Suzuki's "full page writes" patch that has to go into the core database. The remainder of that work is two external compression and decompression programs, which for the time being will undergo separate development on pgfoundry. Per discussion. Also, twiddle the handling of BTREE_SPLIT records to ensure it'll be possible to compress them (the previous coding caused essential info to be omitted). The other commonly-used record types seem OK already, with the possible exception of GIN and GIST WAL records, which I don't understand well enough to opine on.</li>

<li>Remove redundant logging of send failures when SSL is in use. While pqcomm.c had been taught not to do that ages ago, the SSL code was helpfully bleating anyway. Resolves some recent reports such as bug #3266; however the underlying cause of the related bug #2829 is still unclear. Backpatched through 7.4.</li>

<li>Temporary fix for the problem that pg_stat_activity, inet_client_addr(), and inet_server_addr() fail if the client connected over a "scoped" IPv6 address. In this case getnameinfo() will return a string ending with a poorly-standardized "%something" zone specifier, which these functions try to feed to network_in(), which won't take it. So that we don't lose functionality altogether, suppress the zone specifier before giving the string to network_in(). Per report from Brian Hirt. TODO: probably someday the inet type should support scoped IPv6 addresses, and then this patch should be reverted. Backpatch to 8.2 ... is it worth going further?</li>

<li>Fix parameter recalculation for Limit nodes: during a ReScan call we must recompute the limit/offset immediately, so that the updated values are available when the child's ReScan function is invoked. Add a regression test for this, too. Bug is new in HEAD (due to the bounded-sorting patch) so no need for back-patch. I did not do anything about merging this signaling with chgParam processing, but if we were to do that we'd still need to compute the updated values at this point rather than during the first ProcNode call. Per observation and test case from Greg Stark, though I didn't use his patch.</li>

<li>Get rid of the pg_shdepend entry for a TOAST table; it's unnecessary since there's an indirect dependency on the owner via the parent table. We were already handling indexes that way, but not toast tables for some reason. Saves a little catalog space and cuts down the verbosity of checkSharedDependencies reports.</li>

<li>Fix up grammar and translatability of recent checkSharedDependencies patch; also make the code logic a bit more self-consistent.</li>

<li>Prevent RevalidateCachedPlan from making any permanent change in ActiveSnapshot. Having it affect ActiveSnapshot only in the unusual case of needing to replan seems a bad idea, and there's also the problem that the created snap might be in a relatively short-lived context, as noted by Jan Wieck. Also, there's no need to force a new snap at all unless we are called with no snap currently set, which is an unusual case in itself.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Fix dumb compile error in the last patch.</li>

<li>Have CLUSTER advance the table's relfrozenxid. The new frozen point is the FreezeXid introduced in a recent commit, so there isn't any data loss in this approach. Doing it causes ALTER TABLE (or rather, the forms of it that cause a full table rewrite) to be affected as well. In this case, the frozen point is RecentXmin, because after the rewrite all the tuples are relabeled with the rewriting transaction's Xid. TOAST tables are fixed automatically as well, as fallout of the way they were already being handled in the respective code paths. With this patch, there is no longer need to VACUUM tables for Xid wraparound purposes that have been cleaned up via TRUNCATE or CLUSTER.</li>

<li>Move the tuple freezing point in CLUSTER to a point further back in the past, to avoid losing useful Xid information in not-so-old tuples. This makes CLUSTER behave the same as VACUUM as far a tuple-freezing behavior goes (though CLUSTER does not yet advance the table's relfrozenxid). While at it, move the actual freezing operation in rewriteheap.c to a more appropriate place, and document it thoroughly. This part of the patch from Tom Lane.</li>

<li>Have TRUNCATE advance the affected table's relfrozenxid to RecentXmin, to avoid a later needless VACUUM for Xid-wraparound purposes. We can do this since the table is known to be left empty, so no Xid remains on it.</li>

<li>Heikki Linnakangas's patch which makes the rewriteheap code freeze old tuples. This is safe because it is only applied to live tuples older than a recent Xmin, not to tuples that may be part of an update chain. Those still keep their original markings. This patch makes it possible for CLUSTER to advance relfrozenxid, thus avoiding the need of vacuuming the table for Xid wraparound purposes. That will be patched separately.</li>

<li>Avoid emitting empty role names in the GRANTED BY clause of GRANT ROLE when the grantor has been dropped. This is a workaround for the fact that we don't track the grantor as a shared dependency.</li>

<li>Report all dependent objects to the server log when a shared object is dropped, and only a truncated log of the objects in the current database to the client. Also, instead of reporting object counts for all databases on which the user might own objects, report only as many as fit in the predefined line count. This is to avoid flooding the client when the user owns too many objects, which could cause problems. Per report from Ed L. on April 4th and subsequent discussion.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Mark TODO as done: "Fix problem with excessive logging during SSL disconnection."</li>

<li>Add to TODO: "Support scoped IPv6 addresses."</li>

<li>Add URL for TODO: "Implement the SQL standard mechanism whereby REVOKE ROLE revokes only the privilege granted by the invoking role, and not those granted by other roles."</li>

<li>Per Alvaro Herrera, add to TODO: "Implement the SQL standard mechanism whereby REVOKE ROLE revokes only the privilege granted by the invoking role, and not those granted by other roles."</li>

<li>Add to TODO: "Fix problem with excessive logging during SSL disconnection."</li>

<li>Add CVS comment for recent commit "Moved page-level functions from pgstattuple to contrib/pageinspect."</li>

<li>Simon and Heikki's patch which adds database page inspection /contrib module.</li>

<li>Gregory Stark's patch which updates comments for PG_DETOAST_PACKED and VARDATA_ANY on a structures that require alignment and adds a paragraph to the "User-Defined Types" chapter on using these macros since it seems like they're a hit.</li>

<li>Add URLs for TODO: "Add support for SQL-standard GENERATED/IDENTITY columns."</li>

<li>Update instructions on creating TODO entry.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Après discussion, Gregory Stark a envoyé une nouvelle version de son patch permettant de lancer plusieurs requêtes en parallèle à partir de psql.</li>

</ul>