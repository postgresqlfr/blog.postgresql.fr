---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/234"
---


<p><strong>Nouvelles hebdomadaires de Postgres - 2 décembre 2007</strong></p>

<ul>

<li>La bêta 4 de la version 8.3 sera disponible sous peu, continuons à tester&nbsp;!&nbsp;:)</li>

<li>Conférence de Josh Berkus au FOSS.IN. On vous attend pour un grand BoF&nbsp;!

<a target="_blank" href="http://www.foss.in/">http://www.foss.in/</a></li>

<li>David Fetter participera aux PgCon.BR à Sao Paulo les 7 et 8 décembre&nbsp;:

<a target="_blank" href="http://pgcon.postgresql.org.br/index.en.html">http://pgcon.postgresql.org.br/index.en.html</a></li>

<li>Nouvelle enquête&nbsp;: À quel moment passez-vous à la version supérieure&nbsp;?

<a target="_blank" href="http://www.postgresql.org/community">http://www.postgresql.org/community</a></li>

</ul>

<!--more-->


<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Netvault v3.0 disponible&nbsp;:

<a target="_blank" href="http://www.bakbone.com/postgresql">www.bakbone.com/postgresql</a></li>

<li>Benetl 1.0 pour Windows disponible&nbsp;:

<a target="_blank" href="http://www.benetl.net">http://www.benetl.net</a></li>

</ul>

<p><strong>Postgres Local</strong></p>

<ul>

<li>La chasse aux propositions pour les PGCon 2008 ouvre le 19 décembre. Faites chauffer vos stylos&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>La PostgreSQL Conference East '08 est programmée pour les 28 et 29 mars de l'année prochaine&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Workaround for perl problem where evaluating UTF8 regexes can cause implicit loading of modules, thereby breaking Safe rules. We compile and call a tiny perl function on trusted interpreter init, after which the problem does not occur.</li>

<li>Revert inadvertantly committed change.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Back-patch mingw configure-check for gettimeofday so that 8.2 can be built with current versions of mingw.</li>

<li>Use _dosmaperr() to deal with errors opening files in pgwin32_open(). Per complaint from Alvaro and subsequent discussion.</li>

<li>Add win32error.c to libpq, needed to resolve _dosmaperr.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Reorganize MONEY TODO into a separate section, add casting item.</li>

<li>Add documentation about the issues of casting MONEY to/from numeric types.</li>

<li>Wording improvement for MONEY casting.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, add example of MONEY casting to numeric if locale is known.</li>

<li>In pgsql/src/backend/tsearch/dict_thesaurus.c, change a stop word on the right-hand-side in the thesaurus file to be an ERROR, not NOTICE.</li>

<li>In pgsql/doc/src/sgml/func.sgml, add a few current_* variable index entries to the docs. Guillaume Lelarge.</li>

<li>Add comments about VACUUM to free space map docs. Joshua D. Drake.</li>

<li>Plpgsql doc cleanup. Guillaume Lelarge.</li>

<li>Update RETURN NEXT documentation for plpgsql.</li>

<li>RETURN NEXT doc improvement, per Alvaro Herrera.</li>

<li>Add additional PITR documentation. Simon Riggs.</li>

<li>Update Japanese FAQ. Jun Kuwamura.</li>

<li>Update release notes to current CVS.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix select_common_type() so that it can select a domain type, if all inputs to a UNION, CASE, or related construct are of the same domain type. The main part of this routine smashes domains to their base types, which seems necessary because the logic involves TypeCategory() and IsPreferredType(), neither of which work usefully on domains. However, we can add a first pass that just detects whether all the inputs are exactly the same type, and if so accept that without question (so long as it's not UNKNOWN). Per recent gripe from Dean Rasheed. In passing, remove some tests for InvalidOid, which have clearly been dead code for quite some time now, because getBaseType() would fail on that input. Also, clarify the manual's not-very-precise description of the existing algorithm's behavior.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, suppress compiler warning.</li>

<li>Add quote_literal(anyelement) to preserve (and, in fact, extend) a useful consequence of the former liberal implicit casting to text; namely that you can feed non-string values to quote_literal() and get unsurprising results. Per discussion.</li>

<li>Fix pg_regress to check the directory it is actually reading files from, not the image that (theoretically) should exist in the current directory. Jorgen Austvik</li>

<li>Fix plpgsql not to look up block labels except in contexts where a block label is sane (eg, EXIT argument or first part of a qualified identifier), and cause more-closely-nested record variables to take precedence over outer block labels. This cures the breakage exhibited by Marko Kreen that 8.3 no longer allowed a function's name to be used for a variable within the function, and makes plpgsql's handling of block labels more like Oracle's. It's important to fix this now because we are documenting the use of block labels as variable qualifiers for the first time in 8.3.</li>

<li>Install a lookaside cache to speed up repeated lookups of the same operator by short-circuiting schema search path and ambiguous-operator resolution computations. Remarkably, this buys as much as 45% speedup of repetitive simple queries that involve operators that are not an exact match to the input datatypes. It should be marginally faster even for exact-match cases, though I've not had success in proving an improvement in benchmark tests. Per report from Guillame Smet and subsequent discussion.</li>

<li>Adjust the names of a couple of tsearch index support functions that had inappropriately generic-sounding names. This is more or less free since we already forced initdb for the next beta, and it may prevent confusion or name conflicts (particularly at the C-global-symbol level) down the road. Per my proposal yesterday.</li>

<li>Improve test coverage of CLOBBER_CACHE_ALWAYS by having it also force reloading of operator class information on each use of LookupOpclassInfo. Had this been in place a year ago, it would have helped me find a bug in the then-new 'operator family' code. Now that we have a build farm member testing CLOBBER_CACHE_ALWAYS on a regular basis, it seems worth expending a little bit of effort here.</li>

<li>Make a cleanup pass over error reports in tsearch code. Use ereport for user-facing errors, fix some poor choices of errcode, adhere to message style guide.</li>

<li>Repair bug that allowed RevalidateCachedPlan to attempt to rebuild a cached plan before the effects of DDL executed in an immediately prior SPI operation had been absorbed. Per report from Chris Wood. This patch has an unpleasant side effect of causing the number of CommandCounterIncrement()s done by a typical plpgsql function to approximately double. Amelioration of the consequences of that will be undertaken in a separate patch.</li>

<li>Avoid incrementing the CommandCounter when CommandCounterIncrement is called but no database changes have been made since the last CommandCounterIncrement. This should result in a significant improvement in the number of "commands" that can typically be performed within a transaction before hitting the 2^32 CommandId size limit. In particular this buys back (and more) the possible adverse consequences of my previous patch to fix plan caching behavior. The implementation requires tracking whether the current CommandCounter value has been "used" to mark any tuples. CommandCounter values stored into snapshots are presumed not to be used for this purpose. This requires some small executor changes, since the executor used to conflate the curcid of the snapshot it was using with the command ID to mark output tuples with. Separating these concepts allows some small simplifications in executor APIs. Something for the TODO list: look into having CommandCounterIncrement not do AcceptInvalidationMessages. It seems fairly bogus to be doing it there, but exactly where to do it instead isn't clear, and I'm disinclined to mess with asynchronous behavior during late beta.</li>

<li>Suppress compiler warnings in recent plperl patch. Avoid uselessly expensive lookup of the well-known OID of textout().</li>

<li>Code review for LIKE ... INCLUDING INDEXES patch. Fix failure to propagate constraint status of copied indexes (bug #3774), as well as various other small bugs such as failure to pstrdup when needed. Allow INCLUDING INDEXES indexes to be merged with identical declared indexes (perhaps not real useful, but the code is there and having it not apply to LIKE indexes seems pretty unorthogonal). Avoid useless work in generateClonedIndexStmt(). Undo some poorly chosen API changes, and put a couple of routines in modules that seem to be better places for them.</li>

<li>Sync release notes with CVS HEAD; various editorial improvements.</li>

<li>Mention hash opclasses in 'System Dependencies on Operator Classes', which previously only talked about btree opclasses.</li>

<li>Improve the manual's discussion of partitioning. Recommend using a trigger instead of a rule to redirect insertions, use NEW.* notation where appropriate, some other updates and adjustments. David Fetter and Tom Lane</li>

<li>Add SGML docs for contrib/dict_int and contrib/dict_xsyn. Albert Cervera i Areny</li>

<li>Remove README files now migrated to SGML docs.</li>

<li>Ensure that all &lt;sect1&gt; and &lt;refentry&gt; tags have IDs. This is needed to ensure that the resulting webpages have predictable URLs, instead of ever-changing numeric IDs. The new contrib docs were the biggest offender, but some old stuff had the problem too. Also, rename a couple of new contrib sgml files for consistency's sake.</li>

<li>Revert COPY OUT to follow the pre-8.3 handling of ASCII control characters, namely that \r, \n, \t, \b, \f, \v are dumped as those two-character representations rather than a backslash and the literal control character. I had made it do the other to save some code, but this was ill-advised, because dump files in which these characters appear literally are prone to newline mangling. Fortunately, doing it the old way should only cost a few more lines of code, and not slow down the copy loop materially. Per bug #3795 from Lou Duchez.</li>

<li>Stamp 8.3beta4.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Require a specific Autoconf version, instead of a lower bound only.</li>

<li>In pgsql/doc/src/sgml/ref/create_index.sgml, change index_name to name for consistency.</li>

<li>In pgsql/src/backend/libpq/auth.c, correct capitalization.</li>

<li>Make casts from xml to text independent of the XML option setting, thus immutable and indexable. Also fix the volatility settings of some other XML-related functions.</li>

<li>In psql, properly recognize and announce input errors.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, fix column number.</li>

<li>In pgsql/doc/src/sgml/release.sgml, add credit to Pavel Stehule for XML functionality.</li>

<li>Fix typo in pgsql/src/backend/libpq/auth.c.</li>

<li>Improve terminology in pgsql/src/backend/tsearch/ts_locale.c.</li>

<li>In pgsql/src/backend/utils/adt: xml.c, fix XML Schema structure for char types without length (bug #3782).</li>

<li>Spell checker run</li>

<li>Properly capitalize Ispell in pgsql/src/backend/tsearch/dict_ispell.c.</li>

<li>Translation updates.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Mathias Hasselmann sent in a patch to add Avahi support to Postgres, widening the choice of platforms where Postgres can advertise itself via DSN-SD (ZeroConf). Saved for 8.4.</li>

<li>Gevik Babakhani sent in two revisions of a patch which implements named parameters for function calls. Saved for 8.4.</li>

<li>Pavel Stehule's patch to add LOOP support for CURSORs in PL/PgSQL. Saved for 8.4.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Tom Lane sent in a patch intended to cache operator lookups.</li>

<li>Jorgen Austvik sent in a patch to fix the large object regression tests.</li>

<li>Brendan Jurd sent in a patch which allows the construction of an empty array if an explicit cast to an array type is given (as in, ARRAY[]::int[]).</li>

<li>Euler Taveira de Oliveira sent in an update for the Brazilian FAQ.</li>

</ul>