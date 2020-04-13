---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-419 "
---


<p><strong>Nouvelles hebdomadaires de Postgres - 25 novembre 2007</strong></p>

<ul>

<li>La Beta 3 de la version 8.3 est en ligne&nbsp;:

<a target="_blank" href="http://www.postgresql.org/developer/beta">http://www.postgresql.org/developer/beta</a></li>

<li>Le UK Postgres User Group se réunira le 3 décembre. Un petit mail à Simon Riggs &lt;uk AT postgresql.org&gt; pour plus de détails.</li>

<li>L'IT-PUG est à présent une organisation à but non-lucratif&nbsp;:

<a target="_blank" href="http://www.itpug.org/index.it.html">http://www.itpug.org/index.it.html</a></li>

</ul>

<!--more-->


<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>2ndQuadrant dispense des cours sur la Haute Disponibilité&nbsp;:

<a target="_blank" href="http://www.2ndquadrant.com/training.html">http://www.2ndquadrant.com/training.html</a></li>

<li>pgloader 2.2.4 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgloader/">http://pgfoundry.org/projects/pgloader/</a></li>

<li>pgpool-II 2.0.1 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>Pg::Snapshot et Materialized Views 0.3.1 sont disponibles&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/snapshot/">http://pgfoundry.org/projects/snapshot/</a></li>

<li>Les SkyTools 2.1.5 ont été publiés&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/skytools/">http://pgfoundry.org/projects/skytools/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en novembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Conférence de Josh Berkus au FOSS.IN. On vous attend pour un grand BoF&nbsp;!

<a target="_blank" href="http://www.foss.in/">http://www.foss.in/</a></li>

<li>Les PgCon.BR prendront place à Sao Paulo les 7 &amp; 8 décembre&nbsp;:

<a target="_blank" href="http://pgcon.postgresql.org.br/index.en.html">http://pgcon.postgresql.org.br/index.en.html</a></li>

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

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/utils/adt/xml.c, use double quotes for quoting xml attributes.</li>

</ul>

<p>D'Arcy J.M. Cain a commité&nbsp;:</p>

<ul>

<li>Add regression tests for MONEY type.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/pl/plpython/plpython.c, fix buggy usage of vsnprintf in PL/Python by removing it altogether, instead relying on stringinfo.c. This fixes a problem reported by Marko Kreen, but I didn't use his patch, per subsequent discussion.</li>

</ul>

<p>Tatsuo Ishii a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/storage.sgml, fix "Overall Page Layout" table. The second row should be ItemIdData, not ItemPointerData.</li>

<li>In pgsql/doc/src/sgml/page.sgml, fix "Page Layout" table. The second row should be ItemIdData, not ItemPointerData.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Change descriptions of entity and tag objects to "XML entity" and "XML tag". Allow tag and entity names that follow XML rules. Provide for hexadecimal as well as decimal numeric entities. Adjust code names to coincide with new descriptions.</li>

<li>Adjust contrib/tsearch2 regression results to use XML tag and XML entity descriptions, as now used by core text search default parser.</li>

<li>Fix XML tag namespace change inadvertantly missed from previous fix. Add regression test for XML names and numeric entities.</li>

<li>In pgsql/src/backend/tsearch/wparser_def.c, Allow for X as well as x to be the prefix for hexadecimal character ref entity numbers, as in HTML.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add to TODO: "Allow COMMENT ON dbname to work when loading into a database with a different name."</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, add comment about COMMENT ON DATABASE failing for differently-named databases.</li>

<li>Add suggested syntax: COMMENT ON CURRENT DATABASE.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, update comment.</li>

<li>Update TODO to read: "Prevent COMMENT ON dbname from issuing a warning when loading into a database with a different name, perhaps using COMMENT ON CURRENT DATABASE."</li>

<li>Update TODO to read: "Change pg_dump so that a comment on the dumped database is applied to the loaded database, even if the database has a different name. This will require new backend syntax, perhaps COMMENT ON CURRENT DATABASE."</li>

<li>More release notes wording cleanups in pgsql/doc/src/sgml/release.sgml.</li>

<li>Markup fix in pgsql/doc/src/sgml/release.sgml.</li>

<li>Split "server changes" up into smaller sections in release notes.</li>

<li>Trim down release section headings (no need for Changes). Re-order some items as migration changes.</li>

<li>Reorder a few release notes items for consistency.</li>

<li>Release note adjustments suggested by IRC users.</li>

<li>Split out data types and function entries into separate sections in the release notes.</li>

<li>Make "contrib/" tag consistent.</li>

<li>Split release notes up into smaller sections; easier to read.</li>

<li>Fix pg_ctl -t to register -t value, per Alvaro.</li>

<li>In pgsql/src/backend/utils/adt/formatting.c, fix typo in comment.</li>

<li>When setting default thousands separator when locale has "", use logic so new thousands separator doesn't match decimal symbol.</li>

<li>Fix build of libpq for Borland CC.</li>

<li>In pgsql/src/include/getaddrinfo.h, WSATYPE_NOT_FOUND was already defined for BCC so don't redefine it (conflicting values).</li>

<li>In pgsql/doc/src/sgml/release.sgml, document that doc builds now build indexes by default, unless "draft" is used.</li>

<li>Add comments about thousands separator logic.</li>

<li>Add more comments about thousands separator handling.</li>

<li>Update TODO to elucidate the "Prevent long-lived temporary tables from causing frozen-xid advancement" TODO.</li>

<li>In pgsql/src/backend/utils/adt/cash.c, fix white space in MONEY type code. Rename 'comma' to more generic 'ssymbol' as used in previous function.</li>

<li>Borland CC 5.5.1 needs ssize_t, per cnliou9 AT fastmail.fm.</li>

<li>Borland BCC does not support SSPI, per cnliou9 AT fastmail.fm.</li>

<li>Make the MONEY data type have a thousands separator != decimal symbol, if the locale has the thousands separator as "". This now matches the to_char and psql numericlocale behavior. (Previously this data type was basically useless for such setups.)</li>

<li>Clarify how MONEY trims off trailing thousands separator.</li>

<li>If pg_dump drops a schema, make sure 'search_path' it SET the next time it is needed --- basically don't remember the previous 'search_path' after a drop schema because it might have failed but be created later.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Minor improvement in documentation of temp_tablespaces: avoid grammatical ambiguity and say what the default value is.</li>

<li>Improve description of implicit-text-casting compatibility issue. A bunch of other desultory copy-editing, too.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, fix some missed usages of 'HTML tag' and 'HTML entity'.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, fix bogus length calculation that could lead to crash if the string happened to be right up against the end of memory, per report from Matt Magoffin. While at it, avoid useless multiple copying of string by not depending on xmlStrncatNew.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, clarify the syntax rules for raw tsvector input.</li>

<li>Prevent Perl from introducing a possibly-incompatible definition of type "bool" into plperl.c. This has always been a hazard since Perl allows a platform-specific choice to define bool as int rather than char, but evidently this didn't happen on any platform we support ... until OS X 10.5. Per report from Brandon Maust. Back-patch as far as 8.0 --- a bit arbitrary, but it seems unlikely anyone will be trying to port 7.x onto new platforms.</li>

<li>Save one syscache lookup when examining volatility or strictness of OpExpr and related nodes. We're going to have to set the opfuncid of such nodes eventually (if we haven't already), so we might as well exploit the opportunity to cache the function OID. Buys back some of the extra planner overhead noted by Guillaume Smet, though I still need to fool with equivclass.c to really respond to that.</li>

<li>Actually ... it's pretty silly that parse_oper.c doesn't set up the opfuncid of an OpExpr initially, considering that it has the information at hand already. We'll still treat opfuncid as a cache rather than a guaranteed-valid value, but this change saves one more syscache lookup in the normal code path.</li>

<li>Avoid uselessly building a duplicate of the original clause in trivial cases where the EquivalenceClass machinery is unable to deduce anything more from a simple "var = const" qual clause. There are probably some more cases where this could be done, but this seems to take care of most of the added overhead for simple queries. Per gripe from Guillaume Smet. In passing, fix a problem that was exposed by this change: reconsider_outer_join_clause and friends were passing the wrong relids to build_implied_join_equality, resulting in RestrictInfos with the wrong required_relids. This mistake was masked in typical cases since the bogus RestrictInfos would never have escaped from the EquivalenceClass machinery, but I think there might be corner cases involving "broken" ECs where there would have been a visible failure even without the new optimization. In any case the code was certainly not operating as intended.</li>

<li>Change fix_scan_expr() to avoid copying the input node tree in the common case where rtoffset == 0. In that case there is no need to change Var nodes, and since filling in unset opfuncid fields is always safe, scribbling on the input tree to that extent is not objectionable. This brings the cost of this operation back down to what it was in 8.2 for simple queries. Per investigation of performance gripe from Guillaume Smet.</li>

<li>Save another little bit of planner overhead on simple queries, by having clauselist_selectivity skip some analysis that's useless when there's only one clause in the given list. Actually this can win even for not-so-simple queries, because we also apply clauselist_selectivity to sublists such as the quals matching an index; which are likely to have only a single entry even when the total query is quite complicated.</li>

<li>Move resetting of currSchema to a spot where it's not vulnerable to getting missed in possible future partial-drop scenarios. Improve comment. Per report from Zoltan Boszormenyi.</li>

<li>In pgsql/src/test/regress/serial_schedule, add missed entry for new money regression test.</li>

<li>- In pgsql/src/backend/utils/adt/oracle_compat.c, slightly more paranoia and slightly better comments for use of Windows-specific MultiByteToWideChar/WideCharToMultiByte<a href="http://example.com/new.php?page=WideCharToMultiByte">?</a>"&gt;http://example.com/new.php?page=WideCharToMultiByte"&gt;? calls.</li>

<li>- In pgsql/src/backend/tsearch/ts_locale.c, fix (I think) broken usage of MultiByteToWideChar. I had missed the subtlety that this function only returns a null terminator if it's fed input that includes one; which, in the usage here, it's not. This probably fixes bugs reported by Thomas Haegi.</li>

<li>In pgsql/src/backend/postmaster/pgarch.c, reduce routine successful-archiving message from LOG to DEBUG1 grade, to reduce chattiness of logs. Per discussion. Simon Riggs</li>

<li>In pgsql/src/backend/catalog/namespace.c, fix thinko in comment.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Euler Taveira de Oliveira's patch which adds whitespace before every /&gt; of simple xml elements. Postponed to 8.4 just in case.</li>

<li>Marko Kreen's patch which moves decision how much more room to allocate from callers of appendStringInfoVA to inside the function, where more info is available. Not all vsnprintf()s do what it assumes.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Bruce Momjian sent in a patch to fix the case where to_char() can't represent 1000 ms.</li>

<li>Gregory Stark sent in a patch he described on -hackers to implement "ordered" append nodes.</li>

<li>Hannes Eder sent in a patch to src/backend/parser/parse_expr.c which returns immediately on NULL input in parse_expr.c:typecast_expression, i.e. does not lookup target type Oid as it is not required.</li>

<li>Tom Lane sent in a patch which addresses the recent gripe that there is no way for UNION (or related constructs) to return a domain type, because select_common_type() always smashes all its inputs to base types:

<a target="_blank" href="http://archives.postgresql.org/pgsql-performance/2007-11/msg00278.php">http://archives.postgresql.org/pgsql-performance/2007-11/msg00278.php</a></li>

<li>Pavel Stehule sent in a patch which adds anyelement variants of functions quote_literal and quote_ident.</li>

</ul>