---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 28 septembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/09/30/Nouvelles-hebdomadaires-de-PostgreSQL-28-septembre-2014"
---


<p>[ndt: Meetup PUG parisien le 8 octobre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Paris/">http://www.meetup.com/PostgreSQL-User-Group-Paris/</a>]</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgBadger 6.1, un analyseur parall&egrave;lisable de logs PostgreSQL &eacute;crit en Perl&nbsp;: 

<a target="_blank" href="https://sourceforge.net/projects/pgbadger/">https://sourceforge.net/projects/pgbadger/</a><br>

D&eacute;veloppement&nbsp;: 

<a target="_blank" href="https://github.com/dalibo/pgbadger/">https://github.com/dalibo/pgbadger/</a></li>

<li>pgCluu 2.1, un programme Perl pour auditer les performances d'un cluster PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgcluu.darold.net/">http://pgcluu.darold.net/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me &eacute;dition du PgDay argentin est programm&eacute;e pour le 28 novembre 2014 &agrave; Santa Fe. L'appel international &agrave; conf&eacute;renciers court jusqu'au 28 septembre&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.ar/pgday2014">http://www.postgresql.org.ar/pgday2014</a></li>

<li>Le 4<sup>&egrave;me</sup> PgDay &eacute;quatorien aura lieu le mardi 7 octobre en la ville de Quito, int&eacute;gr&eacute; au 5&egrave;me congr&egrave;s international du Logiciel Libre. Envoyez vos propositions de conf&eacute;rences &agrave; ecpug AT postgresql DOT org.</li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Les inscriptions pour la PGConf.EU 2014 de Madrid, Espagne, du 21 au 24 octobre sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/registration/">http://2014.pgconf.eu/registration/</a></li>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014. L'appel international &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140929054541.GB4007@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve code around the recently added rm_identify rmgr callback. There are four weaknesses in728f152e07f998d2cb4fe5f24ec8da2c3bda98f2: append_init() in heapdesc.c was ugly and required that rm_identify return values are only valid till the next call. Instead just add a couple more switch() cases for the INIT_PAGE cases. Now the returned value will always be valid. A couple rm_identify() callbacks missed masking xl_info with ~XLR_INFO_MASK. pg_xlogdump didn't map a NULL rm_identify to UNKNOWN or a similar string. append_init() was called when id=NULL - which should never actually happen. But it's better to be careful. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/604f7956b9460192222dd37bd3baea24cb669a47">http://git.postgresql.org/pg/commitdiff/604f7956b9460192222dd37bd3baea24cb669a47</a></li>

<li>Remove postgres --help blurb about the removed -A option. I missed this in 3bdcf6a5a755503. Noticed by Merlin Moncure. Discussion: CAHyXU0yC7uPeeVzQROwtnrOP9dxTEUPYjB0og4qUnbipMEV57w@mail.gmail.com 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0926ef43c160cc8334d3e86f364bf9a7aa2da43f">http://git.postgresql.org/pg/commitdiff/0926ef43c160cc8334d3e86f364bf9a7aa2da43f</a></li>

<li>Remove most volatile qualifiers from xlog.c. For the reason outlined in df4077cda2e also remove volatile qualifiers from xlog.c. Some of these uses of volatile have been added after noticing problems back when spinlocks didn't imply compiler barriers. So they are a good test - in fact removing the volatiles breaks when done without the barriers in spinlocks present. Several uses of volatile remain where they are explicitly used to access shared memory without locks. These locations are ok with slightly out of date data, but removing the volatile might lead to the variables never being reread from memory. These uses could also be replaced by barriers, but that's a separate change of doubtful value. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ba4ecbf477e0b25dd7bde1b0c4e07fc2da19348">http://git.postgresql.org/pg/commitdiff/6ba4ecbf477e0b25dd7bde1b0c4e07fc2da19348</a></li>

<li>Fix VPATH builds of the replication parser from git for some !gcc compilers. Some compilers don't automatically search the current directory for included files. 9cc2c182fc2 fixed that for builds from tarballs by adding an include to the source directory. But that doesn't work when the scanner is generated in the VPATH directory. Use the same search path as the other parsers in the tree. One compiler that definitely was affected is solaris' sun cc. Backpatch to 9.1 which introduced using an actual parser for replication commands. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56a312aac8802c2aa01530101d2d19e63568eeda">http://git.postgresql.org/pg/commitdiff/56a312aac8802c2aa01530101d2d19e63568eeda</a></li>

<li>Add a basic atomic ops API abstracting away platform/architecture details. Several upcoming performance/scalability improvements require atomic operations. This new API avoids the need to splatter compiler and architecture dependent code over all the locations employing atomic ops. For several of the potential usages it'd be problematic to maintain both, a atomics using implementation and one using spinlocks or similar. In all likelihood one of the implementations would not get tested regularly under concurrency. To avoid that scenario the new API provides a automatic fallback of atomic operations to spinlocks. All properties of atomic operations are maintained. This fallback - obviously - isn't as fast as just using atomic ops, but it's not bad either. For one of the future users the atomics ontop spinlocks implementation was actually slightly faster than the old purely spinlock using implementation. That's important because it reduces the fear of regressing older platforms when improving the scalability for new ones. The API, loosely modeled after the C11 atomics support, currently provides 'atomic flags' and 32 bit unsigned integers. If the platform efficiently supports atomic 64 bit unsigned integers those are also provided. To implement atomics support for a platform/architecture/compiler for a type of atomics 32bit compare and exchange needs to be implemented. If available and more efficient native support for flags, 32 bit atomic addition, and corresponding 64 bit operations may also be provided. Additional useful atomic operations are implemented generically ontop of these. The implementation for various versions of gcc, msvc and sun studio have been tested. Additional existing stub implementations for Intel icc, HUPX acc, and IBM xlc are included but have never been tested. These will likely require fixes based on buildfarm and user feedback. As atomic operations also require barriers for some operations the existing barrier support has been moved into the atomics code. Author: Andres Freund with contributions from Oskari Saarenmaa Reviewed-By: Amit Kapila, Robert Haas, Heikki Linnakangas and &Aacute;lvaro Herrera Discussion: CA+TgmoYBW+ux5-8Ja=Mcyuy8=VXAnVRHp3Kess6Pn3DMXAPAEA@mail.gmail.com, 20131015123303.GH5300@awork2.anarazel.de, 20131028205522.GI20248@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b64d92f1a5602c55ee8b27a7ac474f03b7aee340">http://git.postgresql.org/pg/commitdiff/b64d92f1a5602c55ee8b27a7ac474f03b7aee340</a></li>

<li>Fix atomic ops for x86 gcc compilers that don't understand atomic intrinsics. Per buildfarm animal locust. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/88bcdf9da5aa67da11ada0921703432ef2b7c21c">http://git.postgresql.org/pg/commitdiff/88bcdf9da5aa67da11ada0921703432ef2b7c21c</a></li>

<li>Fix atomic ops inline x86 inline assembly for older 32bit gccs. Some x86 32bit versions of gcc apparently generate references to the nonexistant %sil register when using when using the r input constraint, but not with the =q constraint. The latter restricts allocations to a/b/c/d which should all work. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f18cad944911f05ad2e876af67362e28584b3c61">http://git.postgresql.org/pg/commitdiff/f18cad944911f05ad2e876af67362e28584b3c61</a></li>

<li>Define META_FREE in a way that doesn't cause -Wempty-body warnings. That get rids of the only -Wempty-body warning when compiling postgres with gcc 4.8/9. As 6550b901f shows, it's useful to be able to use that option routinely. Without asserts there's many more warnings, but that's food for another commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b6bb9b47153e4bf6d23bef13165491ba440fc23">http://git.postgresql.org/pg/commitdiff/9b6bb9b47153e4bf6d23bef13165491ba440fc23</a></li>

<li>Fix a couple occurrences of 'the the' in the new atomics API. Author: Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a30199b01bd4b06bd13484baefb5f2f411ce14f4">http://git.postgresql.org/pg/commitdiff/a30199b01bd4b06bd13484baefb5f2f411ce14f4</a></li>

<li>Further atomic ops portability improvements and bug fixes. Don't play tricks for a more efficient pg_atomic_clear_flag() in the generic gcc implementation. The old version was broken on gcc &lt; 4.7 on !x86 platforms. Per buildfarm member chipmunk: Make usage of __atomic() fences depend on. HAVE_GCC__ATOMIC_INT32_CAS instead of HAVE_GCC__ATOMIC_INT64_CAS - there's platforms with 32bit support that don't support 64bit atomics. Blindly fix two superflous #endif in generic-xlc.h. Check for --disable-atomics in platforms but x86. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9f07411a5b879b232ade66fece7071bd2eb5c26">http://git.postgresql.org/pg/commitdiff/f9f07411a5b879b232ade66fece7071bd2eb5c26</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix mishandling of CreateEventTrigStmt's eventname field. It's a string, not a scalar. Petr Jelinek 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/763ba1b0f2aa8353e3e3b02bc6bd965deb4575e0">http://git.postgresql.org/pg/commitdiff/763ba1b0f2aa8353e3e3b02bc6bd965deb4575e0</a></li>

<li>Fix compiler warning. It is meaningless to declare a pass-by-value return type const. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e38da8d6b1bd494b72a6f84310d30b55b3f67c3e">http://git.postgresql.org/pg/commitdiff/e38da8d6b1bd494b72a6f84310d30b55b3f67c3e</a></li>

<li>Remove volatile qualifiers from lwlock.c. Now that spinlocks (hopefully!) act as compiler barriers, as of commit 0709b7ee72e4bc71ad07b7120acd117265ab51d0, this should be safe. This serves as a demonstration of the new coding style, and may be optimized better on some machines as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df4077cda2eae3eb4a5cf387da0c1e7616e73204">http://git.postgresql.org/pg/commitdiff/df4077cda2eae3eb4a5cf387da0c1e7616e73204</a></li>

<li>Change locking regimen around buffer replacement. Previously, we used an lwlock that was held from the time we began seeking a candidate buffer until the time when we found and pinned one, which is disastrous for concurrency. Instead, use a spinlock which is held just long enough to pop the freelist or advance the clock sweep hand, and then released. If we need to advance the clock sweep further, we reacquire the spinlock once per buffer. This represents a significant increase in atomic operations around buffer eviction, but it still wins on many workloads. On others, it may result in no gain, or even cause a regression, unless the number of buffer mapping locks is also increased. However, that seems like material for a separate commit. We may also need to consider other methods of mitigating contention on this spinlock, such as splitting it into multiple locks or jumping the clock sweep hand more than one buffer at a time, but those, too, seem like separate improvements. Patch by me, inspired by a much larger patch from Amit Kapila. Reviewed by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d7962c6797c0baae9ffb3b5b9ac0aec7b598bc3">http://git.postgresql.org/pg/commitdiff/5d7962c6797c0baae9ffb3b5b9ac0aec7b598bc3</a></li>

<li>Fix identify_locking_dependencies for schema-only dumps. Without this fix, parallel restore of a schema-only dump can deadlock, because when the dump is schema-only, the dependency will still be pointing at the TABLE item rather than the TABLE DATA item. Robert Haas and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07d46a8963ebbf69ef6e6853bb8a45623612dd34">http://git.postgresql.org/pg/commitdiff/07d46a8963ebbf69ef6e6853bb8a45623612dd34</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Process withCheckOption exprs in setrefs.c. While withCheckOption exprs had been handled in many cases by happenstance, they need to be handled during set_plan_references and more specifically down in set_plan_refs for ModifyTable plan nodes. This is to ensure that the opfuncid's are set for operators referenced in the withCheckOption exprs. Identified as an issue by Thom Brown Patch by Dean Rasheed Back-patch to 9.4, where withCheckOption was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ef8c658af2127f4e62cb24feade8b465c9e2fea">http://git.postgresql.org/pg/commitdiff/6ef8c658af2127f4e62cb24feade8b465c9e2fea</a></li>

<li>Log ALTER SYSTEM statements as DDL. Per discussion in bug #11350, log ALTER SYSTEM commands at the log_statement=ddl level, rather than at the log_statement=all level. Pointed out by Tomonari Katsumata. Back-patch to 9.4 where ALTER SYSTEM was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/43bed84c320443ee7247f7ca8d609640651aab93">http://git.postgresql.org/pg/commitdiff/43bed84c320443ee7247f7ca8d609640651aab93</a></li>

<li>Add unicode_*_linestyle to \? variables. In a2dabf0 we added the ability to have single or double unicode linestyle for the border, column, or header. Unfortunately, the \? variables output was not updated for these new psql variables. This corrects that oversight. Patch by Pavel Stehule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a564307373089fc81a07bce49236fe2bd66de0fe">http://git.postgresql.org/pg/commitdiff/a564307373089fc81a07bce49236fe2bd66de0fe</a></li>

<li>Copy-editing of row security. Address a few typos in the row security update, pointed out off-list by Adam Brightwell. Also include 'ALL' in the list of commands supported, for completeness. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/afd1d95f5bf0cb48af77e5897eb4c356b5371c7b">http://git.postgresql.org/pg/commitdiff/afd1d95f5bf0cb48af77e5897eb4c356b5371c7b</a></li>

<li>Code review for row security. Buildfarm member tick identified an issue where the policies in the relcache for a relation were were being replaced underneath a running query, leading to segfaults while processing the policies to be added to a query. Similar to how TupleDesc RuleLocks are handled, add in a equalRSDesc() function to check if the policies have actually changed and, if not, swap back the rsdesc field (using the original instead of the temporairly built one; the whole structure is swapped and then specific fields swapped back). This now passes a CLOBBER_CACHE_ALWAYS for me and should resolve the buildfarm error. In addition to addressing this, add a new chapter in Data Definition under Privileges which explains row security and provides examples of its usage, change \d to always list policies (even if row security is disabled- but note that it is disabled, or enabled with no policies), rework check_role_for_policy (it really didn't need the entire policy, but it did need to be using has_privs_of_role()), and change the field in pg_class to relrowsecurity from relhasrowsecurity, based on Heikki's suggestion. Also from Heikki, only issue SET ROW_SECURITY in pg_restore when talking to a 9.5+ server, list Bypass RLS in \du, and document --enable-row-security options for pg_dump and pg_restore. Lastly, fix a number of minor whitespace and typo issues from Heikki, Dimitri, add a missing #include, per Peter E, fix a few minor variable-assigned-but-not-used and resource leak issues from Coverity and add tab completion for role attribute bypassrls as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6550b901fe7c47c03775400e0c790c6c1234a017">http://git.postgresql.org/pg/commitdiff/6550b901fe7c47c03775400e0c790c6c1234a017</a></li>

<li>Fix relcache for policies, and doc updates. Andres pointed out that there was an extra ';' in equalPolicies, which made me realize that my prior testing with CLOBBER_CACHE_ALWAYS was insufficient (it didn't always catch the issue, just most of the time). Thanks to that, a different issue was discovered, specifically in equalRSDescs. This change corrects eqaulRSDescs to return 'true' once all policies have been confirmed logically identical. After stepping through both functions to ensure correct behavior, I ran this for about 12 hours of CLOBBER_CACHE_ALWAYS runs of the regression tests with no failures. In addition, correct a few typos in the documentation which were pointed out by Thom Brown (thanks!) and improve the policy documentation further by adding a flushed out usage example based on a unix passwd file. Lastly, clean up a few comments in the regression tests and pg_dump.h. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff27fcfa0affe16405e801ed55fed10e7bc75216">http://git.postgresql.org/pg/commitdiff/ff27fcfa0affe16405e801ed55fed10e7bc75216</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix incorrect search for "x?" style matches in creviterdissect(). When the number of allowed iterations is limited (either a "?" quantifier or a bound expression), the last sub-match has to reach to the end of the target string. The previous coding here first tried the shortest possible match (one character, usually) and then gave up and back-tracked if that didn't work, typically leading to failure to match overall, as shown in bug #11478 from Christoph Berg. The minimum change to fix that would be to not decrement k before "goto backtrack"; but that would be a pretty stupid solution, because we'd laboriously try each possible sub-match length before finally discovering that only ending at the end can work. Instead, force the sub-match endpoint limit up to the end for even the first shortest() call if we cannot have any more sub-matches after this one. Bug introduced in my rewrite that added the iterdissect logic, commit 173e29aa5deefd9e71c183583ba37805c8102a72. The shortest-first search code was too closely modeled on the longest-first code, which hasn't got this issue since it tries a match reaching to the end to start with anyway. Back-patch to all affected branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3694b4d7e1aa02f917f9d18c550fbb49b96efa83">http://git.postgresql.org/pg/commitdiff/3694b4d7e1aa02f917f9d18c550fbb49b96efa83</a></li>

<li>Fix bogus variable-mangling in security_barrier_replace_vars(). This function created new Vars with varno different from varnoold, which is a condition that should never prevail before setrefs.c does the final variable-renumbering pass. The created Vars could not be seen as equal() to normal Vars, which among other things broke equivalence-class processing for them. The consequences of this were indeed visible in the regression tests, in the form of failure to propagate constants as one would expect. I stumbled across it while poking at bug #11457 --- after intentionally disabling join equivalence processing, the security-barrier regression tests started falling over with fun errors like "could not find pathkey item to sort", because of failure to match the corrupted Vars to normal ones. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f6f9260e308a331e6809d5309b17d1613ff900f">http://git.postgresql.org/pg/commitdiff/3f6f9260e308a331e6809d5309b17d1613ff900f</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix typos in descriptions of json_object functions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b1a52872ae68ce7fe9558a75295200a0d10d1f56">http://git.postgresql.org/pg/commitdiff/b1a52872ae68ce7fe9558a75295200a0d10d1f56</a></li>

<li>Return NULL from json_object_agg if it gets no rows. This makes it consistent with the docs and with all other builtin aggregates apart from count(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ecacbdbcee67e202cfcaa1180da170b9f13654bb">http://git.postgresql.org/pg/commitdiff/ecacbdbcee67e202cfcaa1180da170b9f13654bb</a></li>

<li>Remove ill-conceived ban on zero length json object keys. We removed a similar ban on this in json_object recently, but the ban in datum_to_json was left, which generate4d sprutious errors in othee json generators, notable json_build_object. Along the way, add an assertion that datum_to_json is not passed a null key. All current callers comply with this rule, but the assertion will catch any possible future misbehaviour. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9111d46351e8c3d82452a7454e43ccbf1991b3dc">http://git.postgresql.org/pg/commitdiff/9111d46351e8c3d82452a7454e43ccbf1991b3dc</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add -D option to specify data directory to pg_controldata and pg_resetxlog. It was confusing that to other commands, like initdb and postgres, you would pass the data directory with "-D datadir", but pg_controldata and pg_resetxlog would take just plain path, without the "-D". With this patch, pg_controldata and pg_resetxlog also accept "-D datadir". Abhijit Menon-Sen, with minor kibitzing by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0d81adea650a4bc2b9391234345bb935b89a694">http://git.postgresql.org/pg/commitdiff/b0d81adea650a4bc2b9391234345bb935b89a694</a></li>

<li>Refactor space allocation for base64 encoding/decoding in pgcrypto. Instead of trying to accurately calculate the space needed, use a StringInfo that's enlarged as needed. This is just moving things around currently - the old code was not wrong - but this is in preparation for a patch that adds support for extra armor headers, and would make the space calculation more complicated. Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1dcfb8da09c47d2a7502d1dfab06c8be4b6cf323">http://git.postgresql.org/pg/commitdiff/1dcfb8da09c47d2a7502d1dfab06c8be4b6cf323</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d11339c099fae036f4efffdc69d434c374c820b5">http://git.postgresql.org/pg/commitdiff/d11339c099fae036f4efffdc69d434c374c820b5</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Antonin Houska sent in a patch to fix an issue with from_collapse_limit.</li>

<li>Pavan Deolasee sent in a patch to fix an assertion failure in synchronous replication.</li>

<li>Rahila Syed sent in another revision of a patch to compress full-page writes.</li>

<li>Michael Paquier sent in a patch to remove code duplication in walsender.c and syncrep.c in order to detect what is the node with the lowest strictly-positive priority, facilitating maintenance of this code.</li>

<li>Andrew Dunstan sent in a patch to add some missing JSONB conversion functions.</li>

<li>Rajeev Rastogi sent in another revision of a patch to implement an index scan optimization.</li>

<li>Alvaro Herrera sent in two more revisions of a patch to implement BRIN indexes.</li>

<li>Robert Haas and Ants Aasma traded patches to help scale buffer eviction.</li>

<li>Peter Geoghegan sent in two more revisions of a patch to add INSERT ... ON CONFLICT {UPDATE | IGNORE}.</li>

<li>Robert Haas sent in another revision of a patch to add the modulo (%) operator to pgbench.</li>

<li>Abhijit Menon-Sen sent in a patch to fix an issue with END_OF_RECOVERY shutdowns and ResetUnloggedRelations().</li>

<li>Alvaro Herrera and Michael Paquier traded patches to enable event triggers to fire on CREATE.</li>

<li>Dilip Kumar sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Tom Lane sent in another revision of a patch to fix the poor TOAST compression for JSONB.</li>

<li>Andrew Dunstan sent in a patch to add JSONB generator functions.</li>

<li>Robert Haas sent in another revision of a patch to implement a pg_background contrib extension, which runs commands in a background worker, and gets the results.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of a patch to implement GROUPING SETS.</li>

<li>Andres Freund and Heikki Linnakangas traded patches to fix an issue where it was impossible to escape from a blocked send().</li>

<li>Emre Hasegeli sent in another revision of a patch to implement selectivity estimation for inet operators.</li>

<li>Stephen Frost sent in a patch to fix an infelicity between WITH CHECK OPTION for views and column-level privileges.</li>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to implement PGP armor headers in the contrib/pgcrypto extension.</li>

<li>Jeff Janes sent in a patch to fix dynahash logging.</li>

<li>Michael Paquier and Fabr&iacute;zio de Royes Mello traded patches to add missing newlines in verbose logs of pg_dump, introduced by RLS patch.</li>

<li>Bogdan Pilch sent in a patch to allow toggling tab completion in psql.</li>

<li>Simon Riggs sent in another revision of a patch to allow disabling the HOT optimization.</li>

<li>Platon Malugin sent in a patch to add generate_series(numeric, numeric).</li>

<li>Bogdan Pilch sent in a patch to make psql's time output format more readable.</li>

</ul>