---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 15 septembre 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-09-28-nouvelles-hebdomadaires-de-postgresql-15-septembre-2013 "
---


<p>La seconde <em>CommitFest</em> du nouveau cycle de d&eacute;veloppement de PostgreSQL a commenc&eacute;&nbsp;:<br>

<a target="_blank" href="https://commitfest.postgresql.org/action/commitfest_view/inprogress">https://commitfest.postgresql.org/action/commitfest_view/inprogress</a><br>

<a target="_blank" href="http://wiki.postgresql.org/wiki/Reviewing_a_Patch">http://wiki.postgresql.org/wiki/Reviewing_a_Patch</a><br>

<a target="_blank" href="https://commitfest.postgresql.org/action/commitfest_view?id=19">https://commitfest.postgresql.org/action/commitfest_view?id=19</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>PG Partition Manager 1.4.0, un extension pour g&eacute;rer des partitionnements bas&eacute;s sur le temps ou les s&eacute;quences&nbsp;: 

<a target="_blank" href="https://github.com/keithf4/pg_partman">https://github.com/keithf4/pg_partman</a></li>

<li>Slony-I 2.2.0, un syst&egrave;me de r&eacute;plication &agrave; base de triggers&nbsp;: 

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li><em>Open Source Software for Business</em> (OSS4B) 2013 aura lieu &agrave; Prato (Toscane, Italie) les 19 &amp; 20 septembre. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://www.oss4b.it/">http://www.oss4b.it/</a></li>

<li>La <em>PostgreSQL Conference China</em> de 2103 aura lieu les 26 &amp; 27 octobre &agrave; Hangzhou. Informations&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/Pgconf_cn2013">https://wiki.postgresql.org/wiki/Pgconf_cn2013</a><br>

Inscriptions&nbsp;:<a target="_blank" href="http://bbs.pgsqldb.com/client/bm.php">http://bbs.pgsqldb.com/client/bm.php</a></li>

<li>Le PGDay italien (PGDay.IT) sera tenu &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Inscriptions et infos&nbsp;: 

<a target="_blank" href="http://2013.pgday.it">http://2013.pgday.it</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

<li>La quatri&egrave;me &eacute;dition du PGDay argentin se tiendra le 14 novembre 2013 &agrave; Buenos Aires, Argentine. L'appel &agrave; conf&eacute;renciers est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PGDay_Argentina_2013">http://wiki.postgresql.org/wiki/PGDay_Argentina_2013</a></li>

<li>Le PGDay cubain aura lieu en novembre 2013&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/">http://postgresql.uci.cu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20130916063757.GB9493@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


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