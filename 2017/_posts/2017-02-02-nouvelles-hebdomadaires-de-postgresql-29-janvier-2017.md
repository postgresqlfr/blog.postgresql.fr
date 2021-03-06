---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 janvier 2017"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2017/02/02/Nouvelles-hebdomadaires-de-PostgreSQL-29-janvier-2017"
---


<p>Vous pouvez b&eacute;n&eacute;ficier de 50% de remise pour le SCALE 15x avec le code PGDAY&nbsp;: <a target="_blank" href="https://www.socallinuxexpo.org/scale/15x">https://www.socallinuxexpo.org/scale/15x</a></p>

<p>[ndt: Meetup &agrave; Lyon le 21 février&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/">https://www.meetup.com/fr-FR/PostgreSQL-Lyon-User-Group/</a>]</p>

<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>pgFormatter 1.6, un outil de formatage/coloration syntaxique pour le code SQL&nbsp;: <a target="_blank" href="http://sqlformat.darold.net/">http://sqlformat.darold.net/</a></li>

<li>Les paquets RPM et les Dockerfiles pour PostgreSQL 10 sont disponibles&nbsp;: <a target="_blank" href="https://yum.postgresql.org/news10snapshot-ready-for-testing.php">https://yum.postgresql.org/news10snapshot-ready-for-testing.php</a> <a target="_blank" href="https://git.postgresql.org/gitweb/?p=pgrpms.git;a=blob;f=docker/README">https://git.postgresql.org/gitweb/?p=pgrpms.git;a=blob;f=docker/README</a></li>

<li>pgBadger v9.1, un analyseur de log PostgreSQL et un g&eacute;n&eacute;rateur de graphe en Perl&nbsp;: <a target="_blank" href="https://github.com/dalibo/pgbadger/releases/">https://github.com/dalibo/pgbadger/releases/</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en janvier</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2017-01/">http://archives.postgresql.org/pgsql-jobs/2017-01/</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>[ndt: Meetup &agrave; Toulouse le 2 mars&nbsp;:<a href="https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Toulouse/">https://www.meetup.com/fr-FR/PostgreSQL-User-Group-Toulouse/</a>]</li>

<li>La <em>PGConf India 2017</em> aura lieu les 2 &amp; 3 mars 2017 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde)&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></li>

<li>PostgreSQL@SCaLE aura lieu les 2 &amp; 3 mars 2017 au centre des conventions de Pasadena, comme partie du SCaLE 15X&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/15x/">http://www.socallinuxexpo.org/scale/15x/</a></li>

<li>PgConf.Russia 2017 se d&eacute;roulera du 15 au 17 mars 2017 &agrave; Moscou&nbsp;: <a target="_blank" href="https://pgconf.ru/en">https://pgconf.ru/en</a></li>

<li>Le PGDay Asia 2017 est programm&eacute; les 17 et 18 mars &agrave; Singapour&nbsp;: <a target="_blank" href="http://tinyurl.com/pgDay-Asia-2017-Cfp">http://tinyurl.com/pgDay-Asia-2017-Cfp</a></li>

<li>Le PGDay nordique se tiendra &agrave; Stockholm (Su&egrave;de) au Sheraton Hotel, le 21 mars 2017&nbsp;: <a target="_blank" href="https://2017.nordicpgday.org/">https://2017.nordicpgday.org/</a></li>

<li>Le pgDay Paris 2017 aura lieu &agrave; Paris (France) le 23 mars 2017&nbsp;: <a target="_blank" href="http://2017.pgday.paris/">http://2017.pgday.paris/</a></li>

<li>La <em>PGConf US 2017</em> aura lieu &agrave; Jersey City (New Jersey, USA) du 28 au 31 mars&nbsp;: <a target="_blank" href="http://www.pgconf.us/2017/">http://www.pgconf.us/2017/</a></li>

<li>PGCon 2017 aura lieu &agrave; Ottawa du 23 au 26 mai&nbsp;: <a target="_blank" href="http://www.pgcon.org/2017/papers.php">http://www.pgcon.org/2017/papers.php</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20170129225258.GC17445@fetter.org">http://www.postgresql.org/message-id/20170129225258.GC17445@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Peter Eisentraut pushed:</p>

<ul>

<li>Fix typo. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56549129079465a9d25fd6e5abc1439363922b7c">http://git.postgresql.org/pg/commitdiff/56549129079465a9d25fd6e5abc1439363922b7c</a></li>

<li>pg_dump: Fix minor memory leak. Missing a destroyPQExpBuffer() in the early exit branch. The early exits aren't really necessary. Most similar functions just proceed running the rest of the code zero times and clean up at the end. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/366d2a3d8808ad92436a830c32e73ce17affe5b6">http://git.postgresql.org/pg/commitdiff/366d2a3d8808ad92436a830c32e73ce17affe5b6</a></li>

<li>Fix memory leaks in libpqwalreceiver. The results of the libpq functions PQescapeIdentifier() and PQescapeLiteral() must be freed explicitly. Also handle errors in these functions better. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16a61884b5956778cae64a5746f4cdd9ae1ae01b">http://git.postgresql.org/pg/commitdiff/16a61884b5956778cae64a5746f4cdd9ae1ae01b</a></li>

<li>Fix pointer confusion. get_object_address_publication_rel() needed to check *relation, not relation. Rename the variables to match style used nearby to avoid the confusion. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6cffe54aef0a02a52692e32125eb3a5e135e7359">http://git.postgresql.org/pg/commitdiff/6cffe54aef0a02a52692e32125eb3a5e135e7359</a></li>

<li>Fix NULL pointer access in logical replication workers. From: Petr Jelinek &lt;pjmodos@pjmodos.net&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70c56a014e1813b5ab0f91581833bc7cb6c02958">http://git.postgresql.org/pg/commitdiff/70c56a014e1813b5ab0f91581833bc7cb6c02958</a></li>

<li>Don't error when no system locales were found. initdb used to warn about that, but it was changed to an error in pg_import_system_locales, but some build farm members failed because of that. Change it back to a warning. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/46d482814cd4a9c474540a9c4f040ce1cd514f46">http://git.postgresql.org/pg/commitdiff/46d482814cd4a9c474540a9c4f040ce1cd514f46</a></li>

<li>Fix default minimum value for descending sequences. For some reason that is lost in history, a descending sequence would default its minimum value to -2^63+1 (-PG_INT64_MAX) instead of -2^63 (PG_INT64_MIN), even though explicitly specifying a minimum value of -2^63 would work. Fix this inconsistency by using the full range by default. Reported-by: Daniel Verite &lt;daniel@manitou-mail.org&gt; Reviewed-by: Michael Paquier &lt;michael.paquier@gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0bc1207aeb3de951bf95a9e9899b1256216d65f5">http://git.postgresql.org/pg/commitdiff/0bc1207aeb3de951bf95a9e9899b1256216d65f5</a></li>

<li>Fix parallel make issue with new fmgrprotos.h. The make rules needed further refinement so that we don't run multiple generations per build. reported by Tom Lane <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1a2d9a655a5de1c8c9d479c77d6351b878094606">http://git.postgresql.org/pg/commitdiff/1a2d9a655a5de1c8c9d479c77d6351b878094606</a></li>

<li>pg_dump: Fix some schema issues when dumping sequences. In the new code for selecting sequence data from pg_sequence, set the schema to pg_catalog instead of the sequences own schema, and refer to the sequence by OID instead of name, which was missing a schema qualification. Reported-by: Stephen Frost &lt;sfrost@snowman.net&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da4d1c0c15ab9afdfeee8bad9a1a9989b6bd59b5">http://git.postgresql.org/pg/commitdiff/da4d1c0c15ab9afdfeee8bad9a1a9989b6bd59b5</a></li>

<li>doc: Update ALTER SEQUENCE documentation to match. Update documentation to match change in 0bc1207aeb3de951bf95a9e9899b1256216d65f5. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/123f03ba2c6e2d85a5a900e79dd5f216bfb37e25">http://git.postgresql.org/pg/commitdiff/123f03ba2c6e2d85a5a900e79dd5f216bfb37e25</a></li>

<li>doc: Fix typo. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87ecf2d14fa236e894267ef5e702ff08b8965f9d">http://git.postgresql.org/pg/commitdiff/87ecf2d14fa236e894267ef5e702ff08b8965f9d</a></li>

<li>Close replication connection when slot creation errors. From: Petr Jelinek &lt;pjmodos@pjmodos.net&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65df150a18d4a24e6870eb4a3db28ac8a6c23603">http://git.postgresql.org/pg/commitdiff/65df150a18d4a24e6870eb4a3db28ac8a6c23603</a></li>

<li>Update copyright years in some recently added files. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d9e73ea5f5bb280be438a81fbe91936f4ff0601">http://git.postgresql.org/pg/commitdiff/3d9e73ea5f5bb280be438a81fbe91936f4ff0601</a></li>

<li>doc: Logical replication documentation improvements. From: Erik Rijkers &lt;er@xs4all.nl&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/98cc5db27c97cccd19c4e67e8e623f2d260a5c35">http://git.postgresql.org/pg/commitdiff/98cc5db27c97cccd19c4e67e8e623f2d260a5c35</a></li>

<li>doc: Fix typo. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/049ac809a790a9bde478e371da2b68d6b18c5df7">http://git.postgresql.org/pg/commitdiff/049ac809a790a9bde478e371da2b68d6b18c5df7</a></li>

<li>Fix typo: pg_statistics -&gt; pg_statistic. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a366b4ff4ceceb9793fcc13c3f097ee0d32c56d">http://git.postgresql.org/pg/commitdiff/5a366b4ff4ceceb9793fcc13c3f097ee0d32c56d</a></li>

<li>Add object_address tests for publications and subscriptions. Add test cases to object_address.sql to test the new logical replication related object classes, and fix some small bugs discovered by that. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2a2bdcab2c5c6081a8f53fce8741bc0717b7d2d0">http://git.postgresql.org/pg/commitdiff/2a2bdcab2c5c6081a8f53fce8741bc0717b7d2d0</a></li>

<li>Simplify sequence test. We maintained two separate expected files because log_cnt could be one of two values. Rewrite the test so that we only need one file. Reviewed-by: Petr Jelinek &lt;petr.jelinek@2ndquadrant.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c18104c7448a0cdaa46aed1b9504439879f327e">http://git.postgresql.org/pg/commitdiff/9c18104c7448a0cdaa46aed1b9504439879f327e</a></li>

<li>doc: Update privileges documentation. The CREATE privilege on databases now also enables creating publications. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cdcad6b788a8651af2e48bf7d4160ae591e1f4d7">http://git.postgresql.org/pg/commitdiff/cdcad6b788a8651af2e48bf7d4160ae591e1f4d7</a></li>

<li>Fill in no_priv_msg for publications and subscriptions. Even though these messages are not used yet, we should keep the list complete. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e630faacd8a0c998db105a7d3fca063eb29b0eea">http://git.postgresql.org/pg/commitdiff/e630faacd8a0c998db105a7d3fca063eb29b0eea</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Volatile-ize some plperl variables that must survive into PG_CATCH blocks. This appears to be necessary to fix a failure seen on buildfarm member sittella. It shouldn't be necessary according to the letter of the C standard, because we don't change the values of these variables within the PG_TRY blocks; but somehow gcc 4.7.2 is dropping the ball. Discussion: <a target="_blank" href="https://postgr.es/m/17555.1485179975@sss.pgh.pa.us">https://postgr.es/m/17555.1485179975@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c0ef456b9714215cae0ce3561c7c83629a7301cf">http://git.postgresql.org/pg/commitdiff/c0ef456b9714215cae0ce3561c7c83629a7301cf</a></li>

<li>Fix example plan in optimizer/README. Joining three tables only takes two join nodes. I think when I (tgl) wrote this, I was envisioning possible additional joins; but since the example doesn't show any fourth table, it's just confusing to write a third join node. Etsuro Fujita Discussion: <a target="_blank" href="https://postgr.es/m/e6cfbaa3-af02-1abc-c25e-8fa5c6bc4e21@lab.ntt.co.jp">https://postgr.es/m/e6cfbaa3-af02-1abc-c25e-8fa5c6bc4e21@lab.ntt.co.jp</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c821466abcdb8120ab0dfbce02f3bbae3b62025">http://git.postgresql.org/pg/commitdiff/3c821466abcdb8120ab0dfbce02f3bbae3b62025</a></li>

<li>Allow password file name to be specified as a libpq connection parameter. Formerly an alternate password file could only be selected via the environment variable PGPASSFILE; now it can also be selected via a new connection parameter "passfile", corresponding to the conventions for most other connection parameters. There was some concern about this creating a security weakness, but it was agreed that that argument was pretty thin, and there are clear use-cases for handling password files this way. Julian Markwort, reviewed by Fabien Coelho, some adjustments by me Discussion: <a target="_blank" href="https://postgr.es/m/a4b4f4f1-7b58-a0e8-5268-5f7db8e8ccaa@uni-muenster.de">https://postgr.es/m/a4b4f4f1-7b58-a0e8-5268-5f7db8e8ccaa@uni-muenster.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba005f193d88a8404e81db3df223cf689d64d75e">http://git.postgresql.org/pg/commitdiff/ba005f193d88a8404e81db3df223cf689d64d75e</a></li>

<li>Use non-conflicting table names in new regression test case. Commit 587cda35c added a test to updatable_views.sql that created tables named the same as tables used by the concurrent inherit.sql script. Unsurprisingly, this results in random failures. Pick different names. Per buildfarm. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fa7bf18e493e130147e62cf7dc33010f164126c">http://git.postgresql.org/pg/commitdiff/7fa7bf18e493e130147e62cf7dc33010f164126c</a></li>

<li>Improve speed of contrib/postgres_fdw regression tests. Commit 7012b132d added some tests that consumed an excessive amount of time, more than tripling the time needed for "make installcheck" for this module. Add filter conditions to reduce the number of rows scanned, bringing the runtime down to within hailing distance of what it was before. Jeevan Chalke and Ashutosh Bapat, per a gripe from me Discussion: <a target="_blank" href="https://postgr.es/m/16565.1478104765@sss.pgh.pa.us">https://postgr.es/m/16565.1478104765@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa7f593b1ffa9717bd5570174944c06c482d1c1f">http://git.postgresql.org/pg/commitdiff/aa7f593b1ffa9717bd5570174944c06c482d1c1f</a></li>

<li>Change unknown-type literals to type text in SELECT and RETURNING lists. Previously, we left such literals alone if the query or subquery had no properties forcing a type decision to be made (such as an ORDER BY or DISTINCT clause using that output column). This meant that "unknown" could be an exposed output column type, which has never been a great idea because it could result in strange failures later on. For example, an outer query that tried to do any operations on an unknown-type subquery output would generally fail with some weird error like "failed to find conversion function from unknown to text" or "could not determine which collation to use for string comparison". Also, if the case occurred in a CREATE VIEW's query then the view would have an unknown-type column, causing similar failures in queries trying to use the view. To fix, at the tail end of parse analysis of a query, forcibly convert any remaining "unknown" literals in its SELECT or RETURNING list to type text. However, provide a switch to suppress that, and use it in the cases of SELECT inside a set operation or INSERT command. In those cases we already had type resolution rules that make use of context information from outside the subquery proper, and we don't want to change that behavior. Also, change creation of an unknown-type column in a relation from a warning to a hard error. The error should be unreachable now in CREATE VIEW or CREATE MATVIEW, but it's still possible to explicitly say "unknown" in CREATE TABLE or CREATE (composite) TYPE. We want to forbid that because it's nothing but a foot-gun. This change creates a pg_upgrade failure case: a matview that contains an unknown-type column can't be pg_upgraded, because reparsing the matview's defining query will now decide that the column is of type text, which doesn't match the cstring-like storage that the old materialized column would actually have. Add a checking pass to detect that. While at it, we can detect tables or composite types that would fail, essentially for free. Those would fail safely anyway later on, but we might as well fail earlier. This patch is by me, but it owes something to previous investigations by Rahila Syed. Also thanks to Ashutosh Bapat and Michael Paquier for review. Discussion: <a target="_blank" href="https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com">https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1e7c4bb0049732ece651d993d03bb6772e5d281a">http://git.postgresql.org/pg/commitdiff/1e7c4bb0049732ece651d993d03bb6772e5d281a</a></li>

<li>Make UNKNOWN into an actual pseudo-type. Previously, type "unknown" was labeled as a base type in pg_type, which perhaps had some sense to it because you were allowed to create tables with unknown-type columns. But now that we don't allow that, it makes more sense to label it a pseudo-type. This has the additional effects of forbidding use of "unknown" as a domain base type, cast source or target type, PL function argument or result type, or plpgsql local variable type; all of which seem like good holes to plug. Discussion: <a target="_blank" href="https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com">https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d8d32d9a56a3cecfb14e8f47ebd50b780edffe60">http://git.postgresql.org/pg/commitdiff/d8d32d9a56a3cecfb14e8f47ebd50b780edffe60</a></li>

<li>Remove vestigial resolveUnknown arguments from transformSortClause etc. There's really no situation where we don't want these unknown-to-text conversions to happen. The alternative is failure anyway, and the one caller that was passing "false" did so only because it expected the case could not arise. Might as well simplify the code. Discussion: <a target="_blank" href="https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com">https://postgr.es/m/CAH2L28uwwbL9HUM-WR=hromW1Cvamkn7O-g8fPY2m=_7muJ0oA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aebeb4790c750dc808c1c5afb3cb435116244e36">http://git.postgresql.org/pg/commitdiff/aebeb4790c750dc808c1c5afb3cb435116244e36</a></li>

<li>Introduce convenience macros to hide JsonbContainer header accesses better. This improves readability a bit and may make future improvements easier. In passing, make sure that the JB_ROOT_IS_XXX macros deliver boolean (0/1) results; the previous coding was a bug hazard, though no actual bugs are known. Nikita Glukhov, extended a bit by me Discussion: <a target="_blank" href="https://postgr.es/m/9e21a39c-c1d7-b9b5-44a0-c5345a5029f6@postgrespro.ru">https://postgr.es/m/9e21a39c-c1d7-b9b5-44a0-c5345a5029f6@postgrespro.ru</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7c62462402972b13d10e43f104ca0c0fecb6d08">http://git.postgresql.org/pg/commitdiff/f7c62462402972b13d10e43f104ca0c0fecb6d08</a></li>

<li>Ensure that a tsquery like '!foo' matches empty tsvectors. !foo means "the tsvector does not contain foo", and therefore it should match an empty tsvector. ts_match_vq() overenthusiastically supposed that an empty tsvector could never match any query, so it forcibly returned FALSE, the wrong answer. Remove the premature optimization. Our behavior on this point was inconsistent, because while seqscans and GIST index searches both failed to match empty tsvectors, GIN index searches would find them, since GIN scans don't rely on ts_match_vq(). That makes this certainly a bug, not a debatable definition disagreement, so back-patch to all supported branches. Report and diagnosis by Tom Dunstan (bug #14515); added test cases by me. Discussion: <a target="_blank" href="https://postgr.es/m/20170126025524.1434.97828@wrigleys.postgresql.org">https://postgr.es/m/20170126025524.1434.97828@wrigleys.postgresql.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9d4ca01314ba0c571139c5560a40ef764ad0feee">http://git.postgresql.org/pg/commitdiff/9d4ca01314ba0c571139c5560a40ef764ad0feee</a></li>

<li>Use castNode() in a bunch of statement-list-related code. When I wrote commit ab1f0c822, I really missed the castNode() macro that Peter E. had proposed shortly before. This back-fills the uses I would have put it to. It's probably not all that significant, but there are more assertions here than there were before, and conceivably they will help catch any bugs associated with those representation changes. I left behind a number of usages like "(Query *) copyObject(query_var)". Those could have been converted as well, but Peter has proposed another notational improvement that would handle copyObject cases automatically, so I let that be for now. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7afd56c3c6d8360a5bfdfb2de30038b239fd756b">http://git.postgresql.org/pg/commitdiff/7afd56c3c6d8360a5bfdfb2de30038b239fd756b</a></li>

<li>Orthography fixes for new castNode() macro. Clean up hastily-composed comment. Normalize whitespace. Erik Rijkers and myself <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fefb86b14776321ac153836398eadde867ff31af">http://git.postgresql.org/pg/commitdiff/fefb86b14776321ac153836398eadde867ff31af</a></li>

<li>Improve comments about ProcessUtility's queryString parameter. Per discussion with Craig Ringer. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fde5c037925b01b937923606c39460d94965672e">http://git.postgresql.org/pg/commitdiff/fde5c037925b01b937923606c39460d94965672e</a></li>

<li>Restructure hba.c to replace 3 parallel lists with single list of structs. tokenize_file() now returns a single list of TokenizedLine structs, carrying the same information as before. We were otherwise going to grow a fourth list to deal with error messages, and that was getting a bit silly. Haribabu Kommi, revised a bit by me Discussion: <a target="_blank" href="https://postgr.es/m/CAJrrPGfbgbKsjYp=bgZXhMcgxoaGSoBb9fyjrDoOW_YymXv1Kw@mail.gmail.com">https://postgr.es/m/CAJrrPGfbgbKsjYp=bgZXhMcgxoaGSoBb9fyjrDoOW_YymXv1Kw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/350cb921ae2ced8674e098d0645f2493e5757ad1">http://git.postgresql.org/pg/commitdiff/350cb921ae2ced8674e098d0645f2493e5757ad1</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Prefetch blocks during lazy vacuum's truncation scan. Vacuum truncation scan can be sped up on rotating media by prefetching blocks in forward direction. That makes the blocks already present in memory by the time they are needed, while also letting OS read-ahead kick in. The truncate scan has been measured to be five times faster than without this patch (that was on a slow disk, but it shouldn't hurt on fast disks.) Author: &Atilde;lvaro Herrera, loosely based on a submission by Claudio Freire Discussion: <a target="_blank" href="https://postgr.es/m/CAGTBQpa6NFGO_6g_y_7zQx8L9GcHDSQKYdo1tGuh791z6PYgEg@mail.gmail.com">https://postgr.es/m/CAGTBQpa6NFGO_6g_y_7zQx8L9GcHDSQKYdo1tGuh791z6PYgEg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e26e02eec90370dd222f35f00042f8188488ac4">http://git.postgresql.org/pg/commitdiff/7e26e02eec90370dd222f35f00042f8188488ac4</a></li>

<li>Remove test for COMMENT ON DATABASE. Our current DDL only allows a database name to be specified in COMMENT ON DATABASE, which Andrew Dunstan reports to make this test fail on the buildfarm. Remove the line until we gain a DDL command that allows the current database to be operated on without having the specify it by name. Backpatch to 9.5, where these tests appeared. Discussion: <a target="_blank" href="https://postgr.es/m/e6084b89-07a7-7e57-51ee-d7b8fc9ec864@2ndQuadrant.com">https://postgr.es/m/e6084b89-07a7-7e57-51ee-d7b8fc9ec864@2ndQuadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/331f8c311b7ba4b24158071ab2fb2e07bb8377b0">http://git.postgresql.org/pg/commitdiff/331f8c311b7ba4b24158071ab2fb2e07bb8377b0</a></li>

</ul>

<p>Tatsuo Ishii pushed:</p>

<ul>

<li>Fix comments in StrategyNotifyBgWriter(). The interface for the function was changed in d72731a70450b5e7084991b9caa15cb58a2820df but the comments of the function was not updated. Patch by Yugo Nagata. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73293ebae2e48782804029211622d16ed39952ae">http://git.postgresql.org/pg/commitdiff/73293ebae2e48782804029211622d16ed39952ae</a></li>

</ul>

<p>Fujii Masao pushed:</p>

<ul>

<li>Be sure to release the lock on failure to launch logical replication worker. Petr Jelinek <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc82f5a6406dfef21ae1668b1c69a32c8a68c670">http://git.postgresql.org/pg/commitdiff/dc82f5a6406dfef21ae1668b1c69a32c8a68c670</a></li>

<li>Mention logical replication tests in src/test/README. Craig Ringer <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3eaf03b5d331b7a06d79e5ad2be7e36c4a9c3d72">http://git.postgresql.org/pg/commitdiff/3eaf03b5d331b7a06d79e5ad2be7e36c4a9c3d72</a></li>

<li>Fix typo in description for pg_replication_origin_advance function. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bdadf36eb40e88f93a9daf20ecd005595ebec1cd">http://git.postgresql.org/pg/commitdiff/bdadf36eb40e88f93a9daf20ecd005595ebec1cd</a></li>

</ul>

<p>Robert Haas pushed:</p>

<ul>

<li>Fix interaction of partitioned tables with BulkInsertState. When copying into a partitioned table, the target heap may change from one tuple to next. We must ask ReadBufferBI() to get a new buffer every time such change occurs. To do that, use new function ReleaseBulkInsertStatePin(). This fixes the bug that tuples ended up being inserted into the wrong partition, which occurred exactly because the wrong buffer was used. Amit Langote, per a suggestion from Robert Haas. Some cosmetic adjustments by me. Reports by &eacute;&laquo;&tilde;&aring;&cent;&#382;&ccedil;&brvbar; (Gao Zengqi), Venkata B Nagothi, and Ragnar Ouchterlony. Discussion: <a target="_blank" href="http://postgr.es/m/CAFmBtr32FDOqofo8yG-4mjzL1HnYHxXK5S9OGFJ%3D%3DcJpgEW4vA%40mail.gmail.com">http://postgr.es/m/CAFmBtr32FDOqofo8yG-4mjzL1HnYHxXK5S9OGFJ%3D%3DcJpgEW4vA%40mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/CAEyp7J9WiX0L3DoiNcRrY-9iyw%3DqP%2Bj%3DDLsAnNFF1xT2J1ggfQ%40mail.gmail.com">http://postgr.es/m/CAEyp7J9WiX0L3DoiNcRrY-9iyw%3DqP%2Bj%3DDLsAnNFF1xT2J1ggfQ%40mail.gmail.com</a> Discussion: <a target="_blank" href="http://postgr.es/m/16d73804-c9cd-14c5-463e-5caad563ff77%40agama.tv">http://postgr.es/m/16d73804-c9cd-14c5-463e-5caad563ff77%40agama.tv</a> Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmoaiZpDVUUN8LZ4jv1qFE_QyR+H9ec+79f5vNczYarg5Zg@mail.gmail.com">http://postgr.es/m/CA+TgmoaiZpDVUUN8LZ4jv1qFE_QyR+H9ec+79f5vNczYarg5Zg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1ecb9b3fcfb76edb3461ce561d049c8fb9e710d">http://git.postgresql.org/pg/commitdiff/b1ecb9b3fcfb76edb3461ce561d049c8fb9e710d</a></li>

<li>Don't invoke arbitrary code inside a possibly-aborted transaction. The code here previously tried to call the partitioning operator, but really the right thing to do (and the safe thing to do) is use datumIsEqual(). Amit Langote, but I expanded the comment and fixed a compiler warning. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/289992c462b504ffa289202ce8fc34a56b4048c3">http://git.postgresql.org/pg/commitdiff/289992c462b504ffa289202ce8fc34a56b4048c3</a></li>

<li>Remove unused variable. This was intended to be included in the previous commit, but I goofed. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52df3420cd241b1411da3e4b24318db12bf22cba">http://git.postgresql.org/pg/commitdiff/52df3420cd241b1411da3e4b24318db12bf22cba</a></li>

<li>Fix incorrect comment: pgtime's tm_mon is 1-based, not 0-based. The comments in formatting.c already said that tm_mon was 1-based not 0-based, but the comments here disagreed. Dmitry Fedin <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96e0ccc2b589eda26585ed2a8dabf34b16747c1a">http://git.postgresql.org/pg/commitdiff/96e0ccc2b589eda26585ed2a8dabf34b16747c1a</a></li>

<li>Reindent table partitioning code. We've accumulated quite a bit of stuff with which pgindent is not quite happy in this code; clean it up to provide a less-annoying base for future pgindent runs. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27cdb3414b3fb4c8fcc069572568390450bb04c9">http://git.postgresql.org/pg/commitdiff/27cdb3414b3fb4c8fcc069572568390450bb04c9</a></li>

<li>Set ecxt_scantuple correctly for tuple routing. In 2ac3ef7a01df859c62d0a02333b646d65eaec5ff, we changed things so that it's possible for a different TupleTableSlot to be used for partitioned tables at successively lower levels. If we do end up changing the slot from the original, we must update ecxt_scantuple to point to the new one for partition key of the tuple to be computed correctly. Reported by Rajkumar Raghuwanshi. Patch by Amit Langote. Discussion: <a target="_blank" href="http://postgr.es/m/CAKcux6%3Dm1qyqB2k6cjniuMMrYXb75O-MB4qGQMu8zg-iGGLjDw%40mail.gmail.com">http://postgr.es/m/CAKcux6%3Dm1qyqB2k6cjniuMMrYXb75O-MB4qGQMu8zg-iGGLjDw%40mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/132488bfee687865375b5410f18a78fb55bd7015">http://git.postgresql.org/pg/commitdiff/132488bfee687865375b5410f18a78fb55bd7015</a></li>

<li>Fix things so that updatable views work with partitioned tables. Previously, ExecInitModifyTable was missing handling for WITH CHECK OPTION, and view_query_is_auto_updatable was missing handling for RELKIND_PARTITIONED_TABLE. Amit Langote, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/587cda35ca331128db6c61d406d312654572834a">http://git.postgresql.org/pg/commitdiff/587cda35ca331128db6c61d406d312654572834a</a></li>

<li>Extend index AM API for parallel index scans. This patch doesn't actually make any index AM parallel-aware, but it provides the necessary functions at the AM layer to do so. Rahila Syed, Amit Kapila, Robert Haas <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b4ac19982a77a1a2a6f096c4a11ee7325a14d2c">http://git.postgresql.org/pg/commitdiff/7b4ac19982a77a1a2a6f096c4a11ee7325a14d2c</a></li>

<li>Add a new DestReceiver for printing tuples without catalog access. If you create a DestReciver of type DestRemote and try to use it from a replication connection that is not bound to a specific daabase, or any other hypothetical type of backend that is not bound to a specific database, it will fail because it doesn't have a pg_proc catalog to look up properties of the types being printed. In general, that's an unavoidable problem, but we can hardwire the properties of a few builtin types in order to support utility commands. This new DestReceiver of type DestRemoteSimple does just that. Patch by me, reviewed by Michael Paquier. Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobNo4qz06wHEmy9DszAre3dYx-WNhHSCbU9SAwf+9Ft6g@mail.gmail.com">http://postgr.es/m/CA+TgmobNo4qz06wHEmy9DszAre3dYx-WNhHSCbU9SAwf+9Ft6g@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a84069d9350400c860d5e932b50dfd337aa407b0">http://git.postgresql.org/pg/commitdiff/a84069d9350400c860d5e932b50dfd337aa407b0</a></li>

<li>Add a SHOW command to the replication command language. This is useful infrastructure for an upcoming proposed patch to allow the WAL segment size to be changed at initdb time; tools like pg_basebackup need the ability to interrogate the server setting. But it also doesn't seem like a bad thing to have independently of that; it may find other uses in the future. Robert Haas and Beena Emerson. (The original patch here was by Beena, but I rewrote it to such a degree that most of the code being committed here is mine.) Discussion: <a target="_blank" href="http://postgr.es/m/CA+TgmobNo4qz06wHEmy9DszAre3dYx-WNhHSCbU9SAwf+9Ft6g@mail.gmail.com">http://postgr.es/m/CA+TgmobNo4qz06wHEmy9DszAre3dYx-WNhHSCbU9SAwf+9Ft6g@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1ecd539477fe640455dc890216a7c1561e047b4">http://git.postgresql.org/pg/commitdiff/d1ecd539477fe640455dc890216a7c1561e047b4</a></li>

<li>Be more aggressive in avoiding tuple conversion. According to the comments in tupconvert.c, it's necessary to perform tuple conversion when either table has OIDs, and this was previously checked by ensuring that the tdtypeid value matched between the tables in question. However, that's overly stringent: we have access to tdhasoid and can test directly whether OIDs are present, which lets us avoid conversion in cases where the type OIDs are different but the tuple descriptors are entirely the same (and neither has OIDs). This is useful to the partitioning code, which can thereby avoid converting tuples when inserting into a partition whose columns appear in the same order as the parent columns, the normal case. It's possible for the tuple routing code to avoid some additional overhead in this case as well, so do that, too. It's not clear whether it would be OK to skip this when both tables have OIDs: do callers count on this to build a new tuple (losing the previous OID) in such instances? Until we figure it out, leave the behavior in that case alone. Amit Langote, reviewed by me. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3838074f864eda344677fba39c6141ccbcd4104b">http://git.postgresql.org/pg/commitdiff/3838074f864eda344677fba39c6141ccbcd4104b</a></li>

<li>Refactor bitmap heap scan estimation of heap pages fetched. Currently, we only need this logic in order to cost a Bitmap Heap Scan. But a pending patch for Parallel Bitmap Heap Scan also uses it to help figure out how many workers to use for the scan, which has to be determined prior to costing. So, move the logic to a separate function to make that easier. Dilip Kumar. The patch series of which this is a part has been reviewed by Andres Freund, Amit Khendekar, Tushar Ahuja, Rafia Sabih, Haribabu Kommi, and me; it is not clear from the email discussion which of those people have looked specifically at this part. Discussion: <a target="_blank" href="http://postgr.es/m/CAFiTN-v3QYNJEZnnmKCeATuLbN-h9tMVfeEF0+BrouYDqjXgwg@mail.gmail.com">http://postgr.es/m/CAFiTN-v3QYNJEZnnmKCeATuLbN-h9tMVfeEF0+BrouYDqjXgwg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da08a659897347859fdfe258c67e9d2bf680d4dd">http://git.postgresql.org/pg/commitdiff/da08a659897347859fdfe258c67e9d2bf680d4dd</a></li>

<li>Fix typo in comment. Etsuro Fujita <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4bf371cf2a894abeda672996f24dc6603ceddc3c">http://git.postgresql.org/pg/commitdiff/4bf371cf2a894abeda672996f24dc6603ceddc3c</a></li>

</ul>

<p>Simon Riggs pushed:</p>

<ul>

<li>Reset hot standby xmin on master after restart. Hot_standby_feedback could be reset by reload and worked correctly, but if the server was restarted rather than reloaded the xmin was not reset. Force reset always if hot_standby_feedback is enabled at startup. Ants Aasma, Craig Ringer Reported-by: Ants Aasma <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec4b975016b873292ba5e3d645b414acf1b96c06">http://git.postgresql.org/pg/commitdiff/ec4b975016b873292ba5e3d645b414acf1b96c06</a></li>

<li>Check interrupts during hot standby waits. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e8ee3d6b859a18d7f7375ceb9e04d256eb18aaec">http://git.postgresql.org/pg/commitdiff/e8ee3d6b859a18d7f7375ceb9e04d256eb18aaec</a></li>

</ul>

<p>Andres Freund pushed:</p>

<ul>

<li>Add castNode(type, ptr) for safe casting between NodeTag based types. The new function allows to cast from one NodeTag based type to another, while asserting that the conversion is valid. This replaces the common pattern of doing a cast and a Assert(IsA(ptr, type)) close-by. As this seems likely to be used pervasively, we decided to backpatch this change the addition of this macro. Otherwise backpatched fixes are more likely not to work on back-branches. On branches before 9.6, where we do not yet rely on inline functions being available, the type assertion is only performed if PG_USE_INLINE support is detected. The cast obviously is performed regardless. For the benefit of verifying the macro compiles in the back-branches, this commit contains a single use of the new macro. On master, a somewhat larger conversion will be committed separately. Author: Peter Eisentraut and Andres Freund. Reviewed-By: Tom Lane. Discussion: <a target="_blank" href="https://postgr.es/m/c5d387d9-3440-f5e0-f9d4-71d53b9fbe52@2ndquadrant.com">https://postgr.es/m/c5d387d9-3440-f5e0-f9d4-71d53b9fbe52@2ndquadrant.com</a> Backpatch: 9.2- <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bcab111426e5aae659a97a66d5de4ab9fe40edf">http://git.postgresql.org/pg/commitdiff/5bcab111426e5aae659a97a66d5de4ab9fe40edf</a></li>

<li>Use the new castNode() macro in a number of places. This is far from a pervasive conversion, but it's a good starting point. Author: Peter Eisentraut, with some minor changes by me Reviewed-By: Tom Lane Discussion: <a target="_blank" href="https://postgr.es/m/c5d387d9-3440-f5e0-f9d4-71d53b9fbe52@2ndquadrant.com">https://postgr.es/m/c5d387d9-3440-f5e0-f9d4-71d53b9fbe52@2ndquadrant.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9ba8a9ce4548bb34b7136b7463a61b2c499979a3">http://git.postgresql.org/pg/commitdiff/9ba8a9ce4548bb34b7136b7463a61b2c499979a3</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to enable replication connections by default in pg_hba.conf.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to ensure that pg_dump and pg_dumpall sync their output to disk by default.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in a patch to ensure that launching replication workers is a NOOP when wal_level &lt; logical, and to set the default number of such workers to 0.</p>

<p>Craig Ringer sent in three more revisions of a patch to fix a race between clog truncation and lookup, and introduce txid_status(bigint) to get status of an xact.</p>

<p>Petr Jel&Atilde;&shy;nek sent in two more revisions of a patch to use the asynchronous connect API in libpqwalreceiver, close the replication connection when slot creation gets canceled, ensure that stringinfo buffers in walsender are always initialized, fix after trigger execution in logical replication, and add RENAME support for PUBLICATIONs and SUBSCRIPTIONs.</p>

<p>Amit Kapila sent in another revision of a patch to implement parallel index scans.</p>

<p>Dilip Kumar sent in three more revisions of a patch to implement parallel bitmap heap scans.</p>

<p>Beena Emerson sent in another revision of a patch to enable increasing the default WAL segment size.</p>

<p>Corey Huinker sent in three more revisions of a patch to add \if and friends to psql.</p>

<p>Etsuro Fujita sent in another revision of a patch to fix a bug in the PostgreSQL FDW.</p>

<p>Ivan Kartyshov sent in another revision of a patch to make async slave to wait for lsn to be replayed.</p>

<p>Dagfinn Ilmari Manns&Atilde;&yen;ker sent in another revision of a patch to add GUCs for predicate lock promotion thresholds.</p>

<p>Craig Ringer sent in another revision of a patch to implement logical decoding on standby.</p>

<p>Nico Williams sent in a patch to implement an expanded version of materialized views and a contrib extension.</p>

<p>Nico Williams sent in a patch to implement pqasyncnotifier.c, a shell command client for LISTEN.</p>

<p>Amit Langote sent in a patch to add relkind checks to certain contrib modules.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to clean up the negative cache of pg_statistic when dropping a relation and of pg_class when dropping a schema.</p>

<p>Amit Kapila sent in another revision of a patch to parallelize queries containing subplans.</p>

<p>Ashutosh Sharma sent in two more revisions of a patch to add pgstathashindex() to pgstattuple extension.</p>

<p>Jim Nasby sent in another revision of a patch to add faster methods for getting SPI results.</p>

<p>Claudio Freire sent in two more revisions of a patch to allow usage of more than 1GB of work mem in VACUUM.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in two revisions of a patch to enable forcing a custom or generic plan in PL/pgsql.</p>

<p>Stas Kelvich and Nikhil Sontakke traded patches to speed up two-phase transactions.</p>

<p>Haribabu Kommi sent in three more revisions of a patch to implement a 64-bit (EUI-64) macaddr data type.</p>

<p>Haribabu Kommi and Tom Lane traded patches to implement a pg_hba_file_settings view.</p>

<p>Peter Eisentraut sent in another revision of a patch to add ICU support.</p>

<p>Beena Emerson sent in a patch to add tab completion to ALTER in psql.</p>

<p>Daniel V&Atilde;&copy;rit&Atilde;&copy; sent in another revision of a patch to improve psql hooks for variables.</p>

<p>Nikita Glukhov sent in another revision of a patch to make a recursive version of json_populate_record().</p>

<p>&Atilde;lvaro Herrera sent in another revision of a patch to implement xmltable().</p>

<p>Fabien COELHO sent in two more revisions of a patch to add more functions and operators to pgbench.</p>

<p>Pavan Deolasee sent in another revision of a patch to implement WARM.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in three revisions of a patch to refactor the replication commands output.</p>

<p>Vladimir Rusinov sent in a patch to rename the sql-callable functions with xlog to have wal instead.</p>

<p>Etsuro Fujita sent in another revision of a patch to push down more UPDATEs/DELETEs in postgres_fdw.</p>

<p>Ashutosh Bapat sent in another revision of a patch to speed up aggregate pushdown tests.</p>

<p>Julian Markwort sent in a patch to extended the functionality of pg_stat_statements so it can track worst and best case execution plans.</p>

<p>Fabien COELHO sent in a patch to fix an infelicity between pgbench's --connect and --rate options.</p>

<p>Kyotaro HORIGUCHI sent in another revision of a patch to use a radix tree for character conversion.</p>

<p>Peter Eisentraut sent in two more revisions of a patch to add test coverage for sequences.</p>

<p>David Fetter and Corey Huinker traded patches to add copy_srf(), a set-returning function corresponding to COPY IN.</p>

<p>Masahiko Sawada sent in two more revisions of a patch to support 2PC in FDWs.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in two revisions of a patch to remove race conditions between the checkpointer and the init fork creations by making index init forks go through the shared buffers instead of having their empty() routines handle the flush of the page created.</p>

<p>Robert Haas sent in a patch to remove some hard-coded superuser checks.</p>

<p>Robert Haas sent in another revision of a patch to rename things *xlog* to the corresponding *wal*.</p>

<p>Mithun Cy sent in two more revisions of a patch to cache hash index meta pages.</p>

<p>David Rowley sent in three more revisions of a patch to improve performance where for joins where the outer side is unique.</p>

<p>Venkata B Nagothi sent in a patch to generate an error by aborting the recovery process instead of starting up the cluster if the intended recovery target point is not reached, and give an option to DBA to resume the recovery process from exactly where it stopped.</p>

<p>Ashutosh Sharma sent in another revision of a patch to add microvacuum support for hash indexes.</p>

<p>Noah Misch sent in another revision of a patch to remove link-time cross-module refs in contrib.</p>

<p>Christoph Berg sent in a patch to use \G to use expanded output for a query or current query buffer.</p>

<p>Robert Haas and &Atilde;lvaro Herrera traded patches to add hash index support to to the pageinspect contrib extension.</p>

<p>Thomas Munro sent in another revision of a patch to implement parallel shared hash.</p>

<p>David Rowley sent in another revision of a patch to fix an infelicity between CONNECTION LIMIT and Parallel Query.</p>

<p>Tom Lane sent in a patch to create a separate test file for exercising system views.</p>