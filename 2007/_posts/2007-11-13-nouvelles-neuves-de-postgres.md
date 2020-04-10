---
layout: post
title: "Nouvelles neuves de Postgres"
author: "NBougain"
redirect_from: "index.php?post/drupal-413 "
---



<!--break-->

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>Cybercluster 1.0.0 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/cybercluster/">http://pgfoundry.org/projects/cybercluster/</a></li>

<li>Npgsql2 Beta1 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/npgsql/">http://pgfoundry.org/projects/npgsql/</a></li>

<li>pgloader 2.2.2 est sorti&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgloader/">http://pgfoundry.org/projects/pgloader/</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en novembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-11/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Le SFPUG se réunira chez Hyperic le 13 novembre à 19h30. RVSP ci-dessous&nbsp;:

<a target="_blank" href="http://postgresql.meetup.com/1/calendar/6522343/">http://postgresql.meetup.com/1/calendar/6522343/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Joe Conway a commité&nbsp;:</p>

<ul>

<li>Have crosstab variants treat NULL rowid as a category in its own right, per suggestion from Tom Lane. This fixes crash-bug reported by Stefan Schwarzer. Back-patched to 7.3.</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/acronyms.sgml, point to our own UUID page instead of to Wikipedia.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Use "alternative" instead of "alternate" where it is clearer.</li>

<li>Error message cleanup in pg_dump and pg_dumpall.</li>

<li>In pgsql/doc/src/sgml/sources.sgml, specify putting two spaces after sentence-ending period, which is current practice also.</li>

<li>Improve wording in pgsql/src/bin/pg_resetxlog/pg_resetxlog.c.</li>

<li>Make captalization consistent in pgsql/src/bin/psql/describe.c.</li>

<li>In pgsql/doc/src/sgml/ref/cluster.sgml, &lt;optional&gt; cannot be used here, because psql doesn't handle it.</li>

<li>In pgsql/src/bin/pg_dump/pg_dump.c, add missing newlines to error messages and normalize wording a bit.</li>

<li>In pgsql/src/backend/utils/adt/xml.c, improve error message.</li>

<li>Small fixes to pgsql/doc/src/sgml/func.sgml.</li>

<li>In pgsql/doc/src/sgml/datatype.sgml, mention text search instead of tsearch2.</li>

<li>In pgsql/src/backend/port/win32_shmem.c, add sentence-ending periods.</li>

<li>Wording changes in pgsql/src/backend/postmaster/postmaster.c.</li>

<li>In pgsql/src/test/regress/expected/xml_1.out, adjust test results for message changes. Darn.</li>

<li>After conferencing again with Bruce, put in more accurate XML error message.</li>

<li>Allow XML processing instructions starting with "xml" while prohibiting those being exactly "xml". Bug #3735 from Ben Leslie</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>Fixed two parser bugs in ecpg.</li>

<li>Add missing clause to parser.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Fix typos in pgsql/doc/src/sgml/textsearch.sgml. Guillaume Lelarge.</li>

<li>Add parameter krb_realm used by GSSAPI, SSPI and Kerberos to validate the realm of the connecting user. By default it's empty meaning no verification, which is the way Kerberos authentication has traditionally worked in PostgreSQL.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Document txid functions. Marko Kreen.</li>

<li>Move txid snapshot field description table from datatype to functions section.</li>

<li>Remove &lt;sect1&gt; of txid functions.</li>

<li>In pgsql/src/tools/fsync/test_fsync.c, properly pass third argument to open() in fsync test program. Hiroshi Saito</li>

<li>In pgsql/doc/src/sgml/config.sgml, document that syncronhous commit can be turned off in a single multi-statement transaction.</li>

<li>Document that configure option --with-ossp-uuid only affects contrib/uuid-ossp.</li>

<li>Move NFS section into "Creating Cluster" documentation section because it seems more logical there.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, add "High Availability, Load Balancing, and Replication Feature Matrix" table to docs.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, properly indent SGML file.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, add mention of pl/proxy toolset to docs.</li>

<li>Wording improvement for pl/proxy mention.</li>

<li>In tsearch code, remove !(A &amp;&amp; B) via restructuring, for clarity.</li>

<li>Move pl/proxy into Multi-server parallel query execution documentation section.</li>

<li>Properly order pg_ctl -c option alphabetically in docs.</li>

<li>Reduce error level of ROLLBACK outside a transaction from WARNING to NOTICE.</li>

<li>Have text search thesaurus files use "?" for stop words. Throw an error for actual stop words, rather than a warning. This fixes problems with cache reloading causing warning messages. Re-enable stop words in regression tests; was disabled by Tom. Document "?" as API change.</li>

<li>In pgsql/config/install-sh, use strip -x on OS/X-darwin because non-"-x" causes link problems:

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-10/msg01470.php">http://archives.postgresql.org/pgsql-hackers/2007-10/msg01470.php</a></li>

<li>Update high availability documentation with comments from Markus Schiltknecht.</li>

<li>High availability wording fix.</li>

<li>Add pg_ctl -t/timeout parameter to control amount of time to wait for start/shutdown.</li>

<li>Move most /contrib README files into SGML. Some still need conversion or will never be converted. Albert Cervera i Areny.</li>

<li>Remove references to READMEs from /contrib Makefiles.</li>

<li>Make /contrib install/uninstall script consistent: remove transactions, use create or replace function, make formatting consistent, and set search_path on first line. Add documentation on modifying *.sql to set the search_patch, and mention that major upgrades should still run the installation scripts. Some of these issues were spotted by Tom today.</li>

<li>Adjust pg_trgm expected output for new *.sql file.</li>

<li>Remove /contrib/dblink/doc directory, now in SGML.</li>

<li>Remove tabs from SGML files.</li>

<li>In pgsql/doc/src/sgml/intarray.sgml, trim trailing whitespace --- needed commit to update anoncvs.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/include/access/tuptoaster.h, add a note about another issue that needs to be considered before changing the TOAST size thresholds.</li>

<li>In pgsql/doc/src/sgml/func.sgml, minor editorial improvements to txid functions' documentation: put back some text that got dropped, improve markup, improve descriptions of snapshot components.</li>

<li>Improve conversion of legacy CREATE CONSTRAINT TRIGGER representation of foreign keys, one more time. Insist on matching up all three triggers before we create a constraint; this will avoid creation of duplicate constraints in scenarios where a broken FK constraint was repaired by re-adding the constraint without removing the old partial trigger set. Basically, this will work nicely in all cases where the FK was actually functioning correctly in the database that was dumped. It will fail to restore an FK in just one case where we theoretically could restore it: where we find the referenced table's triggers and not the referencing table's trigger. However, in such a scenario it's likely that the user doesn't even realize he still has an FK at all (since the more-likely-to-fail cases aren't enforced), and we'd probably not accomplish much except to cause the reload to fail because the data doesn't meet the FK constraint. Also make the NOTICE logging still more verbose, by adding detail about which of the triggers were found. This seems about all we can do without solving the problem of getting the user's attention at session end.</li>

<li>In pgsql/src/interfaces/ecpg/ecpglib/prepare.c, fix deprecated-by-C-spec usage: storage class should come before const decoration. Zdenek Kotala</li>

<li>Fix xmlelement() to initialize libxml correctly before using it, and to avoid assuming that evaluation of its input expressions won't change the state of libxml. This requires refactoring xml_init() to not call xmlInitParser(), since now not all of its callers want that. I also tweaked things to avoid repeated execution of one-time-only tests inside xml_init(), though this is mostly for clarity rather than in hopes of saving any noticeable amount of runtime. Per report from Sheikh Amjad and subsequent discussion. In passing, fix a couple of inadequately schema-qualified queries.</li>

<li>Some code review for xml.c: Add some more xml_init() calls that might not be necessary, but seem like a good idea to avoid possible problems like we saw in xmlelement(). Fix unsafe assumption that you can keep using the tupledesc of a relcache entry you don't have open. Add missing error checks for SearchSysCache failure. Get rid of handwritten array traversal in xpath() and O(N^2), broken-for-nulls array access code in map_sql_value_to_xml_value(), in favor of using deconstruct_array. Manually adjust a lot of line breaks in places where the code is otherwise gonna look pretty awful after pg_indent hacks it up (original author seems to have liked to lay out code for a 200-column window).</li>

<li>Fix patternsel() and callers to do the right thing for NOT LIKE and the other negated-match operators. patternsel had been using the supplied operator as though it were a positive-match operator, and thus obtaining a wrong result, which was even more wrong after the caller subtracted it from 1. Seems cleanest to give patternsel an explicit "negate" argument so that it knows what's going on. Also install the same factorization scheme for pattern join selectivity estimators; even though they are just stubs at the moment, this may keep someone from making the same type of mistake when they get filled out. Per report from Greg Mullane. Backpatch to 8.2 --- previous releases do not show the problem because patternsel() doesn't actually use the operator directly.</li>

<li>Improve the performance of LIKE/regex estimation in non-C locales, by making make_greater_string() try harder to generate a string that's actually greater than its input string. Before we just assumed that making a string that was memcmp-greater was enough, but it is easy to generate examples where this is not so when the locale is not C. Instead, loop until the relevant comparison function agrees that the generated string is greater than the input. Unfortunately this is probably not enough to guarantee that the generated string is greater than all extensions of the input, so we cannot relax the restriction to C locale for the LIKE/regex index optimization. But it should at least improve the odds of getting a useful selectivity estimate in prefix_selectivity(). Per example from Guillaume Smet. Backpatch to 8.1, mainly because that's what the complainant is using...</li>

<li>Last week's patch for make_sort_from_pathkeys wasn't good enough: it has to be able to discard top-level RelabelType nodes on *both* sides of the equivalence-class-to-target-list comparison, since make_pathkey_from_sortinfo might either add or remove a RelabelType. Also fix the latter to do the removal case cleanly. Per example from Peter.</li>

<li>Fix EquivalenceClass code to handle volatile sort expressions in a more predictable manner; in particular that if you say ORDER BY output-column-ref, it will in fact sort by that specific column even if there are multiple syntactic matches. An example is SELECT random() AS a, random() AS b FROM ... ORDER BY b, a; While the use-case for this might be a bit debatable, it worked as expected in earlier releases, so we should preserve the behavior for 8.3. Per my recent proposal. While at it, fix convert_subquery_pathkeys() to handle RelabelType stripping in both directions; it needs this for the same reasons make_sort_from_pathkeys does.</li>

<li>If an index depends on no columns of its table, give it a dependency on the whole table instead, to ensure that it goes away when the table is dropped. Per bug #3723 from Sam Mason. Backpatch as far as 7.4; AFAICT 7.3 does not have the issue, because it doesn't have general-purpose expression indexes and so there must be at least one column referenced by an index.</li>

<li>Second pass at improving LIKE/regex estimation in non-C locales. It turns out that it's actually quite likely that a string that is an extension of the given prefix will sort as larger than the "greater" string our previous code created. To provide some defense against that, do the comparisons against a modified string instead of just the bare prefix. We tack on "Z", "z", "y", or "9", whichever is seen as largest in the current locale. Testing suggests that this is sufficient at least for cases involving ASCII data.</li>

<li>Clean up ts_locale.h/.c. Fix broken and not-consistent-across-platforms behavior of wchar2char/char2wchar; this should resolve bug #3730. Avoid excess computations of pg_mblen in t_isalpha and friends. Const-ify APIs where possible.</li>

<li>Add an expected-results file to get regression to pass cleanly in sv_SE locale, which sorts a bit differently. Per recent gripe from Magnus.</li>

<li>Recognize RETURN QUERY via a textual test, so that QUERY doesn't need to be a plpgsql keyword. This avoids springing a new reserved word on plpgsql programmers. For consistency, handle RETURN NEXT the same way.</li>

<li>Fix markup problem with recent pg_ctl change.</li>

<li>xmlGetUTF8Char()'s second argument is both input and output. Fix uninitialized value, and avoid invoking the function nine separate times in the pg_xmlIsNameChar macro. Should resolve buildfarm failures. Per report from Ben Leslie.</li>

<li>Add missing closing / in xsd:restriction, and remove some unnecessary spaces for consistency. Per bug #3734 from Ben Leslie; fix by Euler Taveira de Oliveira.</li>

<li>Add an example of a SQL function with output parameters returning multiple rows. I had thought this case was covered, but there was no example in the obvious section to look in.</li>

<li>Ensure that typmod decoration on a datatype name is validated in all cases, even in code paths where we don't pay any subsequent attention to the typmod value. This seems needed in view of the fact that 8.3's generalized typmod support will accept a lot of bogus syntax, such as "timestamp(foo)" or "record(int, 42)" --- if we allow such things to pass without comment, users will get confused. Per a recent example from Greg Stark. To implement this in a way that's not very vulnerable to future bugs-of-omission, refactor the API of parse_type.c's TypeName lookup routines so that typmod validation is folded into the base lookup operation. Callers can still choose not to receive the encoded typmod, but we'll check the decoration anyway if it's present.</li>

</ul>

<p>D'Arcy J.M. Cain a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/datatype.sgml, remove deprecation notice and add comment about safely restoring backups. As per discussion on hackers.</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Use LOG instead of DEBUG2 for logging invalid cancel requests. (That is, cancel requests with an incorrect key, or with a non-existent PID). Per recent discussion on -hackers.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>Pas de déception cette semaine :-)</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Zdenek Kotala sent in a patch to make pg_dump independent of postgres.h.</li>

<li>Pavel Stehule sent in a tsearch2-compatible wrapper for the integrated full-text search.</li>

<li>Jan Urbanski sent in a patch to tsearch2 which adds a dictionary that only filters out stop words.</li>

<li>Bruce Momjian sent in a patch which uses "?" to mark stop words in the thesaurus file.</li>

<li>Bruce Momjian sent in a patch which downgrades ROLLBACK while not in a transaction from WARNING to NOTICE.</li>

</ul>