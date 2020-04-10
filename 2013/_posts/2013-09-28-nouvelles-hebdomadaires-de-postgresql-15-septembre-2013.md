---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 septembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-09-28-nouvelles-hebdomadaires-de-postgresql-15-septembre-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Introduce InvalidCommandId. This allows a 32-bit field to represent an *optional* command ID without a separate flag bit. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71901ab6daaad65c0168c05e016e4208efe5b71a">http://git.postgresql.org/pg/commitdiff/71901ab6daaad65c0168c05e016e4208efe5b71a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Show schemas in information_schema.schemata that the current has access to. Before, it would only show schemas that the current user owns. Per discussion, the new behavior is more useful and consistent for PostgreSQL. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b34f8f409bec4921d260ac84668917f5fff04319">http://git.postgresql.org/pg/commitdiff/b34f8f409bec4921d260ac84668917f5fff04319</a></li>

<li>Fix typos 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdeb79adcfb2e46efd4f76c39184dd452ae1acd0">http://git.postgresql.org/pg/commitdiff/cdeb79adcfb2e46efd4f76c39184dd452ae1acd0</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove leftover function prototype. The prototype for inval_twophase_postcommit wasn't removed when it's definition was removed in efc16ea520679d713d98a2c7bf1453c4ff7b91ec / the initial Hot Standby commit. Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71129b6fc5a7f1a7615f9ee07ee55994217de994">http://git.postgresql.org/pg/commitdiff/71129b6fc5a7f1a7615f9ee07ee55994217de994</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>psql: honor 'footer' option for expanded output. "No rows" previously only honored the tuples-only option. Per report from Eli Mesika 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/601f48076f8036a223f631692db83ec661f785a6">http://git.postgresql.org/pg/commitdiff/601f48076f8036a223f631692db83ec661f785a6</a></li>

<li>psql: fix \copy stdin trailing space requirement. Previously a trailing space was required for \copy ... stdin: copy foo from stdin ; Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8a5608d4ac9d4b74772980666cc6626bd18c3ff">http://git.postgresql.org/pg/commitdiff/d8a5608d4ac9d4b74772980666cc6626bd18c3ff</a></li>

<li>Add comment for VARSIZE_ANY_EXHDR macro. Gurjeet Singh 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0f59f4a645ec92e580baa4c8feb9f285a8279a15">http://git.postgresql.org/pg/commitdiff/0f59f4a645ec92e580baa4c8feb9f285a8279a15</a></li>

<li>docs: Update libpq and testlo examples. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2885006afc81aaabf3a32a873bbed99282f5a978">http://git.postgresql.org/pg/commitdiff/2885006afc81aaabf3a32a873bbed99282f5a978</a></li>

<li>fuzzystrmatch: replace broken link in C comment. Laurenz Albe. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0e86930dd56f2da00101d5384cbb51ada3730da">http://git.postgresql.org/pg/commitdiff/f0e86930dd56f2da00101d5384cbb51ada3730da</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Create index on srt table in citext regression tests. Comments and the tests make clear that the intent is to test with and without an index, but there was no index. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a49d0b75ce41a5480777f0957d5119cb2f393414">http://git.postgresql.org/pg/commitdiff/a49d0b75ce41a5480777f0957d5119cb2f393414</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Ignore interrupts during quickdie(). Once the administrator has called for an immediate shutdown or a backend crash has triggered a reinitialization, no mere SIGINT or SIGTERM should change that course. Such derailment remains possible when the signal arrives before quickdie() blocks signals. That being a narrow race affecting most PostgreSQL signal handlers in some way, leave it for another patch. Back-patch this to all supported versions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d41cb869aad493178777b6e6e8d1425535349acb">http://git.postgresql.org/pg/commitdiff/d41cb869aad493178777b6e6e8d1425535349acb</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Peter Geoghegan sent in two revisions of a patch to implement INSERT ... ON DUPLICATE KEY LOCK FOR UPDATE.</li>

<li>Zoltan Boszormenyi sent in another revision of a patch to implement fetch readahead for ECPG.</li>

<li>Blake Smith sent in another revision of a patch to speed up queries with hstore using GIN indexes.</li>

<li>Heikki Linnakangas and Stephen Frost traded patches to fix an issue in libpq's interaction with SSL.</li>

<li>Satoshi Nagayasu sent in two more revisions of a patch to collect a statistic for WAL buffer dirty writes called pg_stat_walwriter.dirty_write.</li>

<li>Noah Misch sent in a patch to fix a case where SIGQUIT sent after a query cancel, the cancel takes precedent and the backend survives.</li>

<li>Bruce Momjian sent in a patch to issue a warning when SET TRANSACTION is called outside a transaction block.</li>

<li>Ronan Dunklau sent in a patch to implement triggers on foreign tables.</li>

<li>Bruce Momjian sent in a patch to fix some functions in contrib/unaccent to be immutable.</li>

<li>Fujii Masao sent in another revision of a patch to compress full-page writes.</li>

<li>Peter Eisentraut sent in a patch to document how to use FOP to build the PDF documentation.</li>

<li>Samrat Revagade and Sawada Masahiko traded patches to allow fail-back without taking a fresh backup.</li>

<li>Robert Haas sent in a set of patches to allow terminating background workers, a way to flag same, and some test code. This may eventually lead to parallel query.</li>

<li>Peter Eisentraut sent in a patch to remove the maintainer-check target, roll its functionality into the regular build, and include Andrew Dunstan's check for duplicate OIDs.</li>

<li>Peter Eisentraut sent in a patch to split off pg_fatal() from pg_log() in pg_upgrade.</li>

<li>Kevin Grittner sent in a patch to implement a record_identical() operator as part of the infrastructure for maintaining materialized views.</li>

<li>MauMau sent in another revision of a patch to make sure shutting down in immediate mode is reliable.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of a patch to make UNNEST take multiple heterogeneous array arguments and have TABLE() do similar with multiple SRFs.</li>

<li>Robert Haas and Amit Kapila sent in another revision of a patch to implment dynamic shared memory.</li>

<li>Dimitri Fontaine sent in a patch to complete the stock PL support for EVENT TRIGGERS.</li>

<li>Peter Eisentraut sent in another revision of a patch to implement TRANSFORMS.</li>

<li>Peter Eisentraut sent in a patch to use asprintf() on platforms that support it.</li>

<li>Atri Sharma and Andrew (RhodiumToad) Gierth traded patches implementing WITHIN GROUP.</li>

<li>Marko (johto) Tiikkaja sent in a patch to implement a strict mode for PL/pgsql.</li>

<li>Richard Poole sent in a WIP patch to adds the MAP_HUGETLB flag to mmap() for shared memory on systems that support it. The patch is based on Christian Kruse's patch from last year, incorporating suggestions from Andres Freund.</li>

<li>Marko (johto) Tiikkaja sent in three more revisions of a patch to add a COMPACT mode for errors where the CONTEXT field is omitted for all non-error messages.</li>

<li>Marko (johto) Tiikkaja sent in two revisions of a patch to (optionally) print more information on STRICT failures in PL/PgSQL:</li>

<li>Amit Kapila sent in another revision of a patch to compute the max LSN of pages.</li>

<li>Peter Eisentraut sent in another revision of a patch to implement information_schema.parameters.parameter_default.</li>

<li>Andres Freund sent in a patch to allow custom GUCs to be nested more that one level in config files.</li>

<li>Peter Eisentraut sent in another revision of a patch to revive the line type.</li>

<li>Bernd Helmle sent in a patch to create a GUC for page checksums.</li>

<li>Alvaro Herrera sent in another revision of a patch to implement min-max indexes.</li>

<li>Andres Freund sent in a flock of patches intended to help with logical changesets. Details here: 

<a target="_blank" href="http://www.postgresql.org/message-id/20130914204913.GA4071@awork2.anarazel.de">http://www.postgresql.org/message-id/20130914204913.GA4071@awork2.anarazel.de</a></li>

<li>Marko (johto) Tiikkaja sent in two revisions of a patch to add ASSERTions to PL/pgsql.</li>

<li>Abhijit Menon-Sen sent in another revision of a patch to implement bitmap indexes.</li>

<li>Amit Kapila sent in two more revisions of a patch to fix some inconsistent behavior in table inheritance.</li>

<li>Satoshi Nagayasu sent in another revision of a patch to update contrib/pgstattuple.</li>

<li>Alexander Korotkov sent in another revision of a patch to improve GIN indexes with optional information.</li>

<li>Satoshi Nagayasu sent in another revision of a patch to add CLUSTER statistics.</li>

</ul>