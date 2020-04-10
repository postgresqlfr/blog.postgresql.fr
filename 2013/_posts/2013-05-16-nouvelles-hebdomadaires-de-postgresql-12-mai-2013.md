---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 12 mai 2013"
author: "NBougain"
redirect_from: "index.php?post/2013-05-16-nouvelles-hebdomadaires-de-postgresql-12-mai-2013 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert idea of zero-padding padding session id in log_line_prefix. Removal of doc adjustment and release note mention as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b06e6aba8773df8040b357a1cb058879ed2d94f">http://git.postgresql.org/pg/commitdiff/8b06e6aba8773df8040b357a1cb058879ed2d94f</a></li>

<li>9.3 release notes: update from Amit Kapila. No need to mention wal_receiver_status_interval. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c750aa90f2cd411bea9ee3844bb41ff50a0eb436">http://git.postgresql.org/pg/commitdiff/c750aa90f2cd411bea9ee3844bb41ff50a0eb436</a></li>

<li>9.3 release notes: Add cache of local locks. Mention this also helps in the restoring of pg_dumps. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2fbffc0ddf1e6c7cd8744d8ae26f7daba902d631">http://git.postgresql.org/pg/commitdiff/2fbffc0ddf1e6c7cd8744d8ae26f7daba902d631</a></li>

<li>9.3 release notes: use "restoration". Andrew Dunstan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c29866073ba3aab67d78c0d19ecdf790f36a8e1a">http://git.postgresql.org/pg/commitdiff/c29866073ba3aab67d78c0d19ecdf790f36a8e1a</a></li>

<li>pg_upgrade docs: give tips on automation. Document that post-upgrade steps are likely to be the same for all clusters with the same DDL/schemas; this should help automated upgrades. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df9d764186cf6082376e25fe04050ad39462312d">http://git.postgresql.org/pg/commitdiff/df9d764186cf6082376e25fe04050ad39462312d</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Execute SET TRANSACTION SNAPSHOT during pg_dump. Previous coding set the SQL buffer but never executed. Bug noted by me during beta testing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b2ad82dafaae29975dd12e8c43cf2edaa0f23f4b">http://git.postgresql.org/pg/commitdiff/b2ad82dafaae29975dd12e8c43cf2edaa0f23f4b</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Disallow unlogged materialized views. The initial implementation of this feature was really unsupportable, because it's relying on the physical size of an on-disk file to carry the relation's populated/unpopulated state, which is at least a modularity violation and could have serious long-term consequences. We could say that an unlogged matview goes to empty on crash, but not everybody likes that definition, so let's just remove the feature for 9.3. We can add it back when we have a less klugy implementation. I left the grammar and tab-completion support for CREATE UNLOGGED MATERIALIZED VIEW in place, since it's harmless and allows delivering a more specific error message about the unsupported feature. I'm committing this separately to ease identification of what should be reverted when/if we are able to re-enable the feature. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3223b25ff737c2bf4a642c0deb7be2b30bfecc6e">http://git.postgresql.org/pg/commitdiff/3223b25ff737c2bf4a642c0deb7be2b30bfecc6e</a></li>

<li>Back out some recent translation updates. Very old versions of msgfmt choke on these specific messages, for reasons that are unclear at the moment. Remove them so that we can ship a beta release and not get complaints from testers (these messages will just go untranslated, instead, and we're hardly at 100% coverage anyway). Peter Eisentraut will look for a better fix later. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5da5798004e90b14332918e7db702271442d465d">http://git.postgresql.org/pg/commitdiff/5da5798004e90b14332918e7db702271442d465d</a></li>

<li>Move materialized views' is-populated status into their pg_class entries. Previously this state was represented by whether the view's disk file had zero or nonzero size, which is problematic for numerous reasons, since it's breaking a fundamental assumption about heap storage. This was done to allow unlogged matviews to revert to unpopulated status after a crash despite our lack of any ability to update catalog entries post-crash. However, this poses enough risk of future problems that it seems better to not support unlogged matviews until we can find another way. Accordingly, revert that choice as well as a number of existing kluges forced by it in favor of creating a pg_class.relispopulated flag column. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d6c72a55b23554cfb946527dc77f9d80044ae2c">http://git.postgresql.org/pg/commitdiff/1d6c72a55b23554cfb946527dc77f9d80044ae2c</a></li>

<li>Desultory copy-editing of the 9.3 release notes. I had time for a quick review of the notes, so here are some fixes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1ff90cfb1c5168cd442593de62b419ac9ab6469">http://git.postgresql.org/pg/commitdiff/f1ff90cfb1c5168cd442593de62b419ac9ab6469</a></li>

<li>Stamp 9.3beta1. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/817a89423f429a6a8b36847ee499f5b6be39c3be">http://git.postgresql.org/pg/commitdiff/817a89423f429a6a8b36847ee499f5b6be39c3be</a></li>

<li>Better fix for permissions tests in excluded subqueries. This reverts the code changes in 50c137487c96e629e0e5372bb3d1b5f1a2f71a88, which turned out to induce crashes and not completely fix the problem anyway. That commit only considered single subqueries that were excluded by constraint-exclusion logic, but actually the problem also exists for subqueries that are appendrel members (ie part of a UNION ALL list). In such cases we can't add a dummy subpath to the appendrel's AppendPath list without defeating the logic that recognizes when an appendrel is completely excluded. Instead, fix the problem by having setrefs.c scan the rangetable an extra time looking for subqueries that didn't get into the plan tree. (This approach depends on the 9.2 change that made set_subquery_pathlist generate dummy paths for excluded single subqueries, so that the exclusion behavior is the same for single subqueries and appendrel members.) Note: it turns out that the appendrel form of the missed-permissions-checks bug exists as far back as 8.4. However, since the practical effect of that bug seems pretty minimal, consensus is to not attempt to fix it in the back branches, at least not yet. Possibly we could back-port this patch once it's gotten a reasonable amount of testing in HEAD. For the moment I'm just going to revert the previous patch in 9.2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7b965382cf0cb30aeacb112572718045e6d4be7">http://git.postgresql.org/pg/commitdiff/a7b965382cf0cb30aeacb112572718045e6d4be7</a></li>

<li>Update collate.linux.utf8.out for ruleutils.c line-wrapping changes. Missed in commit 62e666400dddf605b9b6d9a7ac2918711b5c5629. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/284e28f2280a8f69014df689ae5e2843eebd7c59">http://git.postgresql.org/pg/commitdiff/284e28f2280a8f69014df689ae5e2843eebd7c59</a></li>

<li>Use pg_dump's --quote-all-identifiers option in pg_upgrade. This helps guard against changes in the set of reserved keywords from one version to another. In theory it should only be an issue if we de-reserve a keyword in a newer release, since that can create the type of problem shown in bug #8128. Back-patch to 9.1 where the --quote-all-identifiers option was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c36700e9e3cfb96fde636def87cafb57299f4da">http://git.postgresql.org/pg/commitdiff/1c36700e9e3cfb96fde636def87cafb57299f4da</a></li>

<li>Fix management of fn_extra caching during repeated GiST index scans. Commit d22a09dc70f9830fa78c1cd1a3a453e4e473d354 introduced official support for GiST consistentFns that want to cache data using the FmgrInfo fn_extra pointer: the idea was to preserve the cached values across gistrescan(), whereas formerly they'd been leaked. However, there was an oversight in that, namely that multiple scan keys might reference the same column's consistentFn; the code would result in propagating the same cache value into multiple scan keys, resulting in crashes or wrong answers. Use a separate array instead to ensure that each scan key keeps its own state. Per bug #8143 from Joel Roller. Back-patch to 9.2 where the bug was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/91715e82932665c6e125d100eeaa1b6debf73e7b">http://git.postgresql.org/pg/commitdiff/91715e82932665c6e125d100eeaa1b6debf73e7b</a></li>

<li>Fix pgp_pub_decrypt() so it works for secret keys with passwords. Per report from Keith Fiske. Marko Kreen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/477b5a0e24f3b62a470f9684e22e36a2c7735274">http://git.postgresql.org/pg/commitdiff/477b5a0e24f3b62a470f9684e22e36a2c7735274</a></li>

<li>Guard against input_rows == 0 in estimate_num_groups(). This case doesn't normally happen, because the planner usually clamps all row estimates to at least one row; but I found that it can arise when dealing with relations excluded by constraints. Without a defense, estimate_num_groups() can return zero, which leads to divisions by zero inside the planner as well as assertion failures in the executor. An alternative fix would be to change set_dummy_rel_pathlist() to make the size estimate for a dummy relation 1 row instead of 0, but that seemed pretty ugly; and probably someday we'll want to drop the convention that the minimum rowcount estimate is 1 row. Back-patch to 8.4, as the problem can be demonstrated that far back. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/69cc60dcfd0fb643cd2fe3ce66d4389858bfdeb5">http://git.postgresql.org/pg/commitdiff/69cc60dcfd0fb643cd2fe3ce66d4389858bfdeb5</a></li>

<li>Update CREATE FUNCTION documentation about argument names. The 9.2 patch that added argument name support in SQL-language functions missed updating a parenthetical comment about that in the CREATE FUNCTION reference page. Noted by Erwin Brandstetter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c263f16a20a12ee63bbf0c4769d87db3184709eb">http://git.postgresql.org/pg/commitdiff/c263f16a20a12ee63bbf0c4769d87db3184709eb</a></li>

<li>Make pg_upgrade's test script attempt to select a non-conflicting port. Previously, the port number used in this test script was hard-wired at pg_upgrade's default of 50432; which is not so great because parallel build runs might conflict. Commit 3d53173e20d151341f894f79d556768c845ba3e4 removed this setting for the postmasters started by the script proper (not by pg_upgrade), which didn't do anything to fix that problem and also guaranteed a failure if there was a live postmaster at the build's default port number. Instead, select a non-conflicting temporary port number in the same way that pg_regress.c does. (Its method isn't entirely bulletproof, but given the lack of complaints I'm not going to worry about that today.) In passing, unset MAKEFLAGS and MAKELEVEL to avoid problems with the script's internal invocations of make, for the same reason pg_regress.c does: it could cause problems in a parallel make. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e2b1c03ce24e8fefa2080c0f1f8cfbb86ce664e">http://git.postgresql.org/pg/commitdiff/7e2b1c03ce24e8fefa2080c0f1f8cfbb86ce664e</a></li>

<li>Fix buildfarm incompatibility in updated pg_upgrade test script. Looks like some versions of the buildfarm script try to set the port via --port in $EXTRA_REGRESS_OPTS. Override that ... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cade04c105f2d31c941bee9716a304f93a41351">http://git.postgresql.org/pg/commitdiff/8cade04c105f2d31c941bee9716a304f93a41351</a></li>

<li>Fix to_number() to correctly ignore thousands separator when it's '.'. The existing code in NUM_numpart_from_char has hard-wired logic to treat '.' as decimal point, even when we're using a locale-aware format string and the locale says that '.' is the thousands separator. This results in clearly wrong answers in Fujii Masao mode (where we must be able to identify the decimal point location), as per bug report from Patryk Kordylewski. Since the initialization code in NUM_prepare_locale already sets up Np-&gt;decimal as either the locale decimal-point string or "." depending on which decimal-point format code was used, there's really no need to have any extra logic at all in NUM_numpart_from_char: we only need to test for a match to Np-&gt;decimal. (Note: AFAICS there's nothing in here that explicitly checks for thousands separators --- rather, any unmatched character is silently skipped over. That's pretty bogus IMO but it's not the issue being complained of.) This is a longstanding bug, but it's possible that some existing apps are depending on '.' being recognized as decimal point even when using a D format code. Hence, no back-patch. We should probably list this as a potential incompatibility in the 9.3 release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/35d50b527a9f99e22a317269ceb00491397d0e00">http://git.postgresql.org/pg/commitdiff/35d50b527a9f99e22a317269ceb00491397d0e00</a></li>

<li>Fix handling of strict non-set functions with NULLs in set-valued inputs. In a construct like "select plain_function(set_returning_function(...))", the plain function is applied to each output row of the SRF successively. If some of the SRF outputs are NULL, and the plain function is strict, you'd expect to get NULL results for such rows ... but what actually happened was that such rows were omitted entirely from the result set. This was due to confusion of this case with what should happen for nested set-returning functions; a strict SRF is indeed supposed to yield an empty set for null input. Per bug #8150 from Erwin Brandstetter. Although this has been broken forever, we're not back-patching because of the possibility that some apps out there expect the incorrect behavior. This change should be listed as a possible incompatibility in the 9.3 release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/904af8db8a99409257db1eed0b056c8098e9013c">http://git.postgresql.org/pg/commitdiff/904af8db8a99409257db1eed0b056c8098e9013c</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Stress that backup_label file is critical in the docs. It is surprisingly common mistake to leave out backup_label file from a base backup. Say more explicitly that it must be included. Jeff Janes, with minor rewording by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7f03a791fa131eb20c6df07740522163d8b3c94e">http://git.postgresql.org/pg/commitdiff/7f03a791fa131eb20c6df07740522163d8b3c94e</a></li>

<li>Use the term "radix tree" instead of "suffix tree" for SP-GiST text opclass. What we have implemented is a radix tree (or a radix trie or a patricia trie), but the docs and code comments incorrectly called it a "suffix tree". Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb953d8b1bf7386ff20300cd80b29b7e8657dcbd">http://git.postgresql.org/pg/commitdiff/cb953d8b1bf7386ff20300cd80b29b7e8657dcbd</a></li>

<li>Fix walsender failure at promotion. If a standby server has a cascading standby server connected to it, it's possible that WAL has already been sent up to the next WAL page boundary, splitting a WAL record in the middle, when the first standby server is promoted. Don't throw an assertion failure or error in walsender if that happens. Also, fix a variant of the same bug in pg_receivexlog: if it had already received WAL on previous timeline up to a segment boundary, when the upstream standby server is promoted so that the timeline switch record falls on the previous segment, pg_receivexlog would miss the segment containing the timeline switch. To fix that, have walsender send the position of the timeline switch at end-of-streaming, in addition to the next timeline's ID. It was previously assumed that the switch happened exactly where the streaming stopped. Note: this is an incompatible change in the streaming protocol. You might get an error if you try to stream over timeline switches, if the client is running 9.3beta1 and the server is more recent. It should be fine after a reconnect, however. Reported by Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ffa66f4975c99e52984f7ee81b47d137b5b4751">http://git.postgresql.org/pg/commitdiff/2ffa66f4975c99e52984f7ee81b47d137b5b4751</a></li>

<li>The data structure used in unaccent is a trie, not suffix tree. Fix the term used in variable and struct names, and comments. Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4b06c1820a1b96769ea7447a0fc8e0edabbf57f5">http://git.postgresql.org/pg/commitdiff/4b06c1820a1b96769ea7447a0fc8e0edabbf57f5</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Add IDs to link targets used by phpPgAdmin. Karl O. Pinc 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/20c00ca668f2c5ca4e7e7afd1bd8faa0909ee527">http://git.postgresql.org/pg/commitdiff/20c00ca668f2c5ca4e7e7afd1bd8faa0909ee527</a></li>

<li>Update key words table for 9.3 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cda7acee5f30bfdca6cfaeacfc4fb695f8c8d5d8">http://git.postgresql.org/pg/commitdiff/cda7acee5f30bfdca6cfaeacfc4fb695f8c8d5d8</a></li>

<li>Remove make_keywords. It is not used anymore. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bd98852cbd19083ea46a90056666e087f1bb0d67">http://git.postgresql.org/pg/commitdiff/bd98852cbd19083ea46a90056666e087f1bb0d67</a></li>

<li>pg_xlogdump: Improve --help output 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4fd3366a6555a065f1be9f127110c9f642323b9">http://git.postgresql.org/pg/commitdiff/a4fd3366a6555a065f1be9f127110c9f642323b9</a></li>

<li>pgbench: Fix order of options in --help output 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0ed3a8a99b052d2d5e0b6153a8907b90c486636">http://git.postgresql.org/pg/commitdiff/f0ed3a8a99b052d2d5e0b6153a8907b90c486636</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Dimitri Fontaine sent in a patch to add an example of using the event trigger API to the documentation.</li>

<li>Christoph Berg sent in a patch to add EXTRA_REGRESS_OPTS to all pg_regress invocations.</li>

<li>Simon Riggs sent in a patch to allow pg_dump to use a snapshot exported with an explicit pg_export_snapshot() for when precise timing of the snapshot is important.</li>

<li>Christoph Berg sent in a patch to fix the fact that PSQLDIR was not passed to pg_regress in contrib/pg_upgrade/test.sh.</li>

<li>Robins Tharakan sent in another revision of a patch to add some regression tests for SEQUENCE.</li>

<li>Robins Tharakan sent in two more revisions of a patch to add regression tests for SCHEMA.</li>

<li>Robins Tharakan sent in another revision of a patch to add regression tests for ROLE.</li>

<li>Robins Tharakan sent in two more revisions of a patch to add regression tests for COLLATE.</li>

<li>Robert Haas sent in another revision of a patch to fix a case where it was possible to do an erroneous restore into the pg_catalog schema.</li>

<li>Amul Sul sent in a patch to fix an issue where psql connection reset failed.</li>

<li>Simon Riggs sent in a patch to fix a bug where VACUUM was no longer reporting "removed %d row versions."</li>

<li>Fabien COELHO sent in two more revisions of a patch to add a --throttle option to pgbench.</li>

<li>Fabien COELHO sent in another revision of a patch to add a --progress option to pgbench.</li>

<li>Fabien COELHO sent in another revision of a patch to add long options to pgbench.</li>

<li>Robins Tharakan sent in a patch to add regression tests for DISCARD.</li>

<li>Robins Tharakan sent in a patch to cover more database commands, raising the code coverage from 36% to 71%.</li>

</ul>