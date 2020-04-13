---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-220 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 13 Mai 2007</strong></p>

<p>Il y a quelques discussions animées sur la

<a target="_blank" href="http://archives.postgresql.org/pgsql-patches/2007-05/threads.php">mailing list -patches.</a></p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>PostgreSQL Code Factory est sortie.

<a target="_blank" href="http://www.sqlmaestro.com/products/postgresql/codefactory/">http://www.sqlmaestro.com/products/postgresql/codefactory/</a></li>

<li>EnterpriseDB est à présent disponible sur Red Hat Exchange.

<a target="_blank" href="http://www.marketwire.com/mw/release_html_b1?release_id=250943">http://www.marketwire.com/mw/release_html_b1?release_id=250943</a></li>

<li>MediaWiki 1.10 a été publié.

<a target="_blank" href="http://www.mediawiki.org/wiki/MediaWiki">http://www.mediawiki.org/wiki/MediaWiki</a></li>

<li>Sortie de PostgresDAC 2.3.9-beta2.

<a target="_blank" href="http://microolap.com/products/connectivity/postgresdac/">http://microolap.com/products/connectivity/postgresdac/</a></li>

</ul>

<p><strong>Les jobs PostgreSQL en Mai</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-05/threads.php</a></p>

<p><strong>PostgreSQL Local</strong></p>

<p>En route pour le PgDay!

<a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a></p>

<p>Les inscriptions sont toujours ouvertes pour les PGCon 2007

<a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a></p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Les PostgreSQL Weekly News vous sont présentées cette semaine par David Fetter. Adaptation francophone de ...</em></p>

<p><em>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Document that CLUSTER breaks MVCC visibility rules. (Not needed in cvs head, because CLUSTER itself is fixed there). Heikki Linnakangas. Back-patched to 7.4.</li>

<li>In pgsql/src/tools/msvc/Install.pm, log directory we're installing into. Per request from Andrew Dunstan.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Mark TODO as done: "Add support for arrays of complex types."</li>

<li>Add to TODO: "Have configure choose integer datetimes by default."</li>

<li>Add to TODO: "Allow data to be passed in native language formats, rather than only text.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Added some more error logging to pgsql/src/interfaces/ecpg/ecpglib/data.c.</li>

<li>Synced parser and keyword list for ECPG. Renamed update test in the hope that it will run on Vista.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Improvements to the SGML docs for TRUNCATE and CLUSTER.</li>

<li>Add a hash function for "numeric". Mark the equality operator for numerics as "oprcanhash", and make the corresponding system catalog updates. As a result, hash indexes, hashed aggregation, and hash joins can now be used with the numeric type. Bump the catversion. The only tricky aspect to doing this is writing a correct hash function: it's possible for two Numerics to be equal according to their equality operator, but have different in-memory bit patterns. To cope with this, the hash function doesn't consider the Numeric's "scale" or "sign", and explictly skips any leading or trailing zeros in the Numeric's digit buffer (the current implementation should suppress any such zeros, but it seems unwise to rely upon this). See discussion on pgsql-patches for more details.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Ajout du support pour les tableaux d'éléments composites, incluant les lignes de tables régulières et de vues (mais pas des catalogues systèmes, ni des séquences ou des

<a target="_blank" href="http://docs.postgresqlfr.org/pgsql-8.2.4-fr/storage-toast.html">tables TOASTées</a>).

Se débarasser des conventions voulant que le type d'un tableau soit exactement "_type". On utilise plutôt une nouvelle colonne pg_type.typarray pour assurer le lien. (Ca sera toujours nommé "_type" pourtant, à l'exception de cas extraordinaires comme les noms de types de longueur maximale.)

Dans la foulée, le suivi des dépendances du schéma et du propriétaire pour le types est rendu plus uniforme : un type créé par l'utilisateur a ces dépendances tandis qu'une ligne de table ou un tableau auto-produit ne l'auront pas, mais dépendront de l'objet parent. David Fetter, Andrew Dunstan, Tom Lane</li>

<li>Improve predicate_refuted_by_simple_clause() to handle IS NULL and IS NOT NULL more completely. The motivation for having it understand IS NULL at all was to allow use of "foo IS NULL" as one of the subsets of a partitioning on "foo", but as reported by Aleksander Kmetec, it wasn't really getting the job done. Backpatch to 8.2 since this is arguably a performance bug.</li>

<li>Fix the problem that creating a user-defined type named _foo, followed by one named foo, would work but the other ordering would not. If a user-specified type or table name collides with an existing auto-generated array name, just rename the array type out of the way by prepending more underscores. This should not create any backward-compatibility issues, since the cases in which this will happen would have failed outright in prior releases. Also fix an oversight in the arrays-of-composites patch: ALTER TABLE RENAME renamed the table's rowtype but not its array type.</li>

<li>Fix my oversight in enabling domains-of-domains: ALTER DOMAIN ADD CONSTRAINT needs to check the new constraint against columns of derived domains too. Also, make it error out if the domain to be modified is used within any composite-type columns. Eventually we should support that case, but it seems a bit painful, and not suitable for a back-patch. For the moment just let the user know we can't do it. Backpatch to 8.2, which is the only released version that allows nested domains. Possibly the other part should be back-patched further.</li>

<li>Support arrays of composite types, including the rowtypes of regular tables and views (but not system catalogs, nor sequences or toast tables). Get rid of the hardwired convention that a type's array type is named exactly "_type", instead using a new column pg_type.typarray to provide the linkage. (It still will be named "_type", though, except in odd corner cases such as maximum-length type names.) Along the way, make tracking of owner and schema dependencies for types more uniform: a type directly created by the user has these dependencies, while a table rowtype or auto-generated array type does not have them, but depends on its parent object instead. David Fetter, Andrew Dunstan, Tom Lane</li>

<li>Reserve some pg_statistic "kind" codes for use by the ESRI ST_Geometry datatype project. Per request from Ale Raza (araza at esri.com).</li>

<li>Add an explicit comment about POSIX time zone names having the reverse sign convention from everyplace else in Postgres. I don't suppose that this will stop people from being confused, but at least we can say that it's documented.</li>

</ul>

<p>Peter Eisentraut a commité:</p>

<ul>

<li>The appended patch addresses the outstanding issues of the recent guc patch. It makes PGCLIENTENCODING work again and uses bsearch() instead of iterating over the array of guc variables in guc_get_index().</li>

</ul>

<p>Alvaro Herrera a commité:</p>

<ul>

<li>Make sure we don't skip databases that are supposed to be vacuumed "exactly now". This can happen if the time granularity is not very high. Per ITAGAKI Takahiro.</li>

</ul>

<p>Peter Eisentraut a commité:</p>

<ul>

<li>Grammar correction in pgsql/doc/src/sgml/func.sgml.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavan Deolassee sent in a flock of patches for HOT, broken out per discussion.</li>

<li>William Lawrance sent in two revisions of a patch for ECPG that makes it use PQprepare and PQexecPrepared functions to cache SQL statements.</li>

<li>Tomas Doran sent in three revisions of a patch which exposes a current_query() function to SQL.</li>

<li>Zoltan Boszormenyi sent in another version of his GENERATED patch.</li>

<li>Gregory Stark sent in a doc patch explaining how to use packed varlenas.</li>

<li>Jim Nasby a proposé un patch pour que les vacuums émettent un warning lorsqu'ils tombent à court de maintenance_work_mem.</li>

<li>CK Tan sent in a patch which improves the performance of scans on big relations.</li>

<li>Gregory Stark sent in another revision of his concurrent psql patch.</li>

</ul>