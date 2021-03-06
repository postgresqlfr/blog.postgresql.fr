---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 29 mars 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/04/11/Nouvelles-hebdomadaires-de-PostgreSQL-29-mars-2015"
---


<p>Le pgDay Paris 2015 aura lieu le 21 avril &agrave; Paris au si&egrave;ge de La Poste. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://pgday.paris/">http://pgday.paris/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>BDR 0.9.0, un syst&egrave;me de r&eacute;plication bas&eacute; sur les WAL logiques&nbsp;: 

<a target="_blank" href="http://bdr-project.org/docs/0.9.0/release-0.9.0.html">http://bdr-project.org/docs/0.9.0/release-0.9.0.html</a></li>

<li>CitusDB 4.0, une plate-forme hybride transactionnelle/analytique bas&eacute;e sur PostgreSQL&nbsp;: 

<a target="_blank" href="https://www.citusdata.com/blog/20-sumedh/140-citusdb4-0-release-notes">https://www.citusdata.com/blog/20-sumedh/140-citusdb4-0-release-notes</a></li>

<li>Vitesse DB, un produit orient&eacute; <em>OLAP</em> bas&eacute; sur PostgreSQL qui ajoute la compilation &agrave; la vol&eacute;e LLVM des requ&ecirc;tes et leur ex&eacute;cution en parall&egrave;le, ainsi qu'un stockage par colonne&nbsp;: 

<a target="_blank" href="http://vitessedata.com/">http://vitessedata.com/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mars</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-03/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; conf&eacute;renciers pour la deuxi&egrave;me <em>Conf&eacute;rence PostgreSQL Suisse</em>, tenue les 25 &amp; 26 juin 2015 &agrave; Rapperswil, se termine le 1<sup>er</sup> avril&nbsp;: 

<a target="_blank" href="http://www.postgres-conference.ch/cfp/">http://www.postgres-conference.ch/cfp/</a></li>

<li>L'assembl&eacute;e constituante du futur <em>PostgreSQL Users Group</em> suisse (SwissPUG) aura lieu vendredi 10 avril 2015&nbsp;: 

<a target="_blank" href="http://www.swisspug.org">http://www.swisspug.org</a></li>

<li>Le PUG indien organise un PGday &agrave; Bengaluru (&Eacute;tat du Karnataka en Inde) le 11 avril 2015. RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PUG/events/220553997/">http://www.meetup.com/India-PUG/events/220553997/</a></li>

<li>[ndt: 4<sup>e</sup> rendez-vous du PLUG (Lyon) le 15 avril, avec une pr&eacute;sentation de PoWA et des techniques de d&eacute;tection d'index manquants&nbsp;: <a href="http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/221188759/" target="_blank">http://www.meetup.com/PostgreSQL-User-Group-Lyon/events/221188759/</a>]</li>

<li>Il y aura une session PostgreSQL lors de la conf&eacute;rence sur les BDD (DTCC) le 18 avril 2015 &agrave; Beijing&nbsp;: 

<a target="_blank" href="http://dtcc.it168.com/list_jiabin.html">http://dtcc.it168.com/list_jiabin.html</a></li>

<li>Le pgDay Paris aura lieu le 21 avril 2015&nbsp;: 

<a target="_blank" href="http://pgday.paris/">http://pgday.paris/</a></li>

<li>PGCon 2015 du 16 au 20 juin &agrave; Ottawa, Canada&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/">http://www.pgcon.org/2015/</a></li>

<li>La conf&eacute;rence PGDay UK aura lieu le 7 juillet 2015 &ndash; elle vise les membres de la communaut&eacute; PostgreSQL anglaise. L'appel &agrave; conf&eacute;renciers expire le 13 avril&nbsp;: 

<a target="_blank" href="http://www.postgresqlusergroup.org.uk">http://www.postgresqlusergroup.org.uk</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le PostgresOpen 2015, programm&eacute; &agrave; Dallas (Texas) du 16 au 18 septembre, a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.postgresopen.org/callforpapers/">http://2015.postgresopen.org/callforpapers/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150329220943.GA29590@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove ill-advised pre-check for DSM segment exhaustion. dsm_control-&gt;nitems never decreases, so this is testing whether the server has *ever* run out of DSM segments, not whether it is *currently* out of DSM segments. Reported off-list by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/372b97097e8c9a67326e99a07da30ab44f6f822a">http://git.postgresql.org/pg/commitdiff/372b97097e8c9a67326e99a07da30ab44f6f822a</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix copy &amp; paste error in 4f1b890b137. Due to the bug delayed standbys would not delay when applying prepared transactions. Discussion: CAB7nPqT6BO1cCn+sAyDByBxA4EKZNAiPi2mFJ=ANeZmnmewRyg@mail.gmail.com Michael Paquier via Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a1105c3dd44c1fb76eb62a708f0421f21b9dde9b">http://git.postgresql.org/pg/commitdiff/a1105c3dd44c1fb76eb62a708f0421f21b9dde9b</a></li>

<li>Don't delay replication for less than recovery_min_apply_delay's resolution. Recovery delays are implemented by waiting on a latch, and latches take milliseconds as a parameter. The required amount of waiting was computed using microsecond resolution though and the wait loop's abort condition was checking the delay in microseconds as well. This could lead to short spurts of busy looping when the overall wait time was below a millisecond, but above 0 microseconds. Instead just formulate the wait loop's abort condition in millisecond granularity as well. Given that that's recovery_min_apply_delay resolution, it seems harmless to not wait for less than a millisecond. Backpatch to 9.4 where recovery_min_apply_delay was introduced. Discussion: 20150323141819.GH26995@alap3.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87cec51d3ad1107f6f224ed7d773e70c8896e4c0">http://git.postgresql.org/pg/commitdiff/87cec51d3ad1107f6f224ed7d773e70c8896e4c0</a></li>

<li>Centralize definition of integer limits. Several submitted and even committed patches have run into the problem that C89, our baseline, does not provide minimum/maximum values for various integer datatypes. C99's stdint.h does, but we can't rely on it. Several parts of the code defined limits locally, so instead centralize the definitions to c.h. This patch also changes the more obvious usages of literal limit values; there's more places that could be changed, but it's less clear whether it's beneficial to change those. Author: Andrew Gierth Discussion: 87619tc5wc.fsf@news-spur.riddles.org.uk 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/83ff1618bc9d4e530d3ef2a668a71326784a753c">http://git.postgresql.org/pg/commitdiff/83ff1618bc9d4e530d3ef2a668a71326784a753c</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pg_rewind, for re-synchronizing a master server after failback. Earlier versions of this tool were available (and still are) on github. Thanks to Michael Paquier, Alvaro Herrera, Peter Eisentraut, Amit Kapila, and Satoshi Nagayasu for review. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61081e75c6741024f7717ade0450090590e96c85">http://git.postgresql.org/pg/commitdiff/61081e75c6741024f7717ade0450090590e96c85</a></li>

<li>Try to fix MSVC build of pg_rewind. It worked in my Windows VM with VS2013, but buildfarm animal mastodon, running MSVC 2005, was not happy. Amit Kapila also reported a similar error earlier in his environment. Let's see if this helps. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4babae1a8607ad445cbe761da7f46bb90b156287">http://git.postgresql.org/pg/commitdiff/4babae1a8607ad445cbe761da7f46bb90b156287</a></li>

<li>Minor cleanup of GiST code, for readability. Remove the gistcentryinit function, inlining the relevant part of it into the only caller. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8fa393a6d739796d9f06a7fba91d7e1d0c354879">http://git.postgresql.org/pg/commitdiff/8fa393a6d739796d9f06a7fba91d7e1d0c354879</a></li>

<li>Add support for index-only scans in GiST. This adds a new GiST opclass method, 'fetch', which is used to reconstruct the original Datum from the value stored in the index. Also, the 'canreturn' index AM interface function gains a new 'attno' argument. That makes it possible to use index-only scans on a multi-column index where some of the opclasses support index-only scans but some do not. This patch adds support in the box and point opclasses. Other opclasses can added later as follow-on patches (btree_gist would be particularly interesting). Anastasia Lubennikova, with additional fixes and modifications by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d04c8ed9044eccebce043143a930617e3998c005">http://git.postgresql.org/pg/commitdiff/d04c8ed9044eccebce043143a930617e3998c005</a></li>

<li>Fix GiST index-only scans for opclasses with different storage type. We cannot use the index's tuple descriptor directly to describe the index tuples returned in an index-only scan. That's because the index might use a different datatype for the values stored on disk than the type originally indexed. As long as they were both pass-by-ref, it worked, but will not work for pass-by-value types of different sizes. I noticed this as a crash when I started hacking a patch to add fetch methods to btree_gist. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/55b59eda13a742f8af913734e22ecc8a21754414">http://git.postgresql.org/pg/commitdiff/55b59eda13a742f8af913734e22ecc8a21754414</a></li>

<li>Minor refactoring of btree_gist code. The gbt_var_key_copy function was doing two different things depending on the boolean argument. Seems cleaner to have two separate functions. Remove unused argument from gbt_num_compress. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8816af65e4f8285d3ef73158b09490099921f870">http://git.postgresql.org/pg/commitdiff/8816af65e4f8285d3ef73158b09490099921f870</a></li>

<li>Add index-only scan support to btree_gist. inet, cidr, and timetz indexes still cannot support index-only scans, because they don't store the original unmodified value in the index, but a derived approximate value. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e09b48316c22fce727bce3c89fa64fc627787e6a">http://git.postgresql.org/pg/commitdiff/e09b48316c22fce727bce3c89fa64fc627787e6a</a></li>

<li>Add index-only scan support to inet GiST opclass. Andreas Karlsson 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a20b0e7b6dae48cd6be1257e9017663f1402b91">http://git.postgresql.org/pg/commitdiff/3a20b0e7b6dae48cd6be1257e9017663f1402b91</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>vacuumdb: Check result status of PQsendQuery. Noticed by Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/871293fb7fa869fbe0f202bef2e0d781bfd21b3e">http://git.postgresql.org/pg/commitdiff/871293fb7fa869fbe0f202bef2e0d781bfd21b3e</a></li>

<li>Fix gram.y comment to match reality. There are other comments in there that don't precisely match what's implemented, but this one confused me enough to be worth fixing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dc8e05295ab126bc4c943cab3e8e117489ecb246">http://git.postgresql.org/pg/commitdiff/dc8e05295ab126bc4c943cab3e8e117489ecb246</a></li>

<li>Fix bug for array-formatted identities of user mappings. I failed to realize that server names reported in the object args array would get quoted, which is wrong; remove that, making sure that it's only quoted in the string-formatted identity. This bug was introduced by my commit cf34e373, which was backpatched, but since object name/args arrays are new in commit a676201490c8, there is no need to backpatch this any further. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3196e65f5bfc997ec7fa3f91645a09289c10dee">http://git.postgresql.org/pg/commitdiff/b3196e65f5bfc997ec7fa3f91645a09289c10dee</a></li>

<li>Add OID output argument to DefineTSConfiguration ... which is set to the OID of a copied text search config, whenever the COPY clause is used. This is in the spirit of commit a2e35b53c39. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8217fb1441ce4b4e1785f9acfa0ce50039247a10">http://git.postgresql.org/pg/commitdiff/8217fb1441ce4b4e1785f9acfa0ce50039247a10</a></li>

<li>Return ObjectAddress in many ALTER TABLE sub-routines. Since commit a2e35b53c39b2a, most CREATE and ALTER commands return the ObjectAddress of the affected object. This is useful for event triggers to try to figure out exactly what happened. This patch extends this idea a bit further to cover ALTER TABLE as well: an auxiliary ObjectAddress is returned for each of several subcommands of ALTER TABLE. This makes it possible to decode with precision what happened during execution of any ALTER TABLE command; for instance, which constraint was added by ALTER TABLE ADD CONSTRAINT, or which parent got dropped from the parents list by ALTER TABLE NO INHERIT. As with the previous patch, there is no immediate user-visible change here. This is all really just continuing what c504513f83a9ee8 started. Reviewed by Stephen Frost. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bdc3d7fa2376a7a1e977383cc3221cfe44c4a893">http://git.postgresql.org/pg/commitdiff/bdc3d7fa2376a7a1e977383cc3221cfe44c4a893</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Apply table and domain CHECK constraints in name order. Previously, CHECK constraints of the same scope were checked in whatever order they happened to be read from pg_constraint. (Usually, but not reliably, this would be creation order for domain constraints and reverse creation order for table constraints, because of differing implementation details.) Nondeterministic results of this sort are problematic at least for testing purposes, and in discussion it was agreed to be a violation of the principle of least astonishment. Therefore, borrow the principle already established for triggers, and apply such checks in name order (using strcmp() sort rules). This lets users control the check order if they have a mind to. Domain CHECK constraints still follow the rule of checking lower nested domains' constraints first; the name sort only applies to multiple constraints attached to the same domain. In passing, I failed to resist the temptation to wordsmith a bit in create_domain.sgml. Apply to HEAD only, since this could result in a behavioral change in existing applications, and the potential regression test failures have not actually been observed in our buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5f455f59fed0632371cddacddd79895b148dc07">http://git.postgresql.org/pg/commitdiff/e5f455f59fed0632371cddacddd79895b148dc07</a></li>

<li>Fix ExecOpenScanRelation to take a lock on a ROW_MARK_COPY relation. ExecOpenScanRelation assumed that any relation listed in the ExecRowMark list has been locked by InitPlan; but this is not true if the rel's markType is ROW_MARK_COPY, which is possible if it's a foreign table. In most (possibly all) cases, failure to acquire a lock here isn't really problematic because the parser, planner, or plancache would have taken the appropriate lock already. In principle though it might leave us vulnerable to working with a relation that we hold no lock on, and in any case if the executor isn't depending on previously-taken locks otherwise then it should not do so for ROW_MARK_COPY relations. Noted by Etsuro Fujita. Back-patch to all active versions, since the inconsistency has been there a long time. (It's almost certainly irrelevant in 9.0, since that predates foreign tables, but the code's still wrong on its own terms.) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/feeb526cfe33657b8aa8b0cdd45b2ef0d9898877">http://git.postgresql.org/pg/commitdiff/feeb526cfe33657b8aa8b0cdd45b2ef0d9898877</a></li>

<li>Upgrade src/port/rint.c to be POSIX-compliant. The POSIX spec says that rint() rounds halfway cases to nearest even. Our substitute implementation failed to do that, rather rounding halfway cases away from zero; and it also got some other cases (such as minus zero) wrong. This led to observable cross-platform differences, as reported in bug #12885 from Rich Schaaf; in particular, casting from float to int didn't honor round-to-nearest-even on builds using rint.c. Implement something that attempts to cover all cases per spec, and add some simple regression tests so that we'll notice if any platforms still get this wrong. Although this is a bug fix, no back-patch, as a behavioral change in the back branches was agreed not to be a good idea. Pedro Gimeno Fortea, reviewed by Michael Paquier and myself 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06bf0dd6e354c765403d1331cc9896b360754521">http://git.postgresql.org/pg/commitdiff/06bf0dd6e354c765403d1331cc9896b360754521</a></li>

<li>Add an ASSERT statement in plpgsql. This is meant to make it easier to insert simple debugging cross-checks in plpgsql functions. Pavel Stehule, reviewed by Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a4847fc3ef139ba9a8ffebb6ffa06ee72078ffa2">http://git.postgresql.org/pg/commitdiff/a4847fc3ef139ba9a8ffebb6ffa06ee72078ffa2</a></li>

<li>Suppress some unused-variable complaints in new LOCK_DEBUG code. Jeff Janes 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bed756a820a2c1ee359f5f5b44806e3599190e95">http://git.postgresql.org/pg/commitdiff/bed756a820a2c1ee359f5f5b44806e3599190e95</a></li>

<li>Tweak __attribute__-wrapping macros for better pgindent results. This improves on commit bbfd7edae5aa5ad5553d3c7e102f2e450d4380d4 by making two simple changes: * pg_attribute_noreturn now takes parentheses, ie pg_attribute_noreturn(). Likewise pg_attribute_unused(), pg_attribute_packed(). This reduces pgindent's tendency to misformat declarations involving them. * attributes are now always attached to function declarations, not definitions. Previously some places were taking creative shortcuts, which were not merely candidates for bad misformatting by pgindent but often were outright wrong anyway. (It does little good to put a noreturn annotation where callers can't see it.) In any case, if we would like to believe that these macros can be used with non-gcc compilers, we should avoid gratuitous variance in usage patterns. I also went through and manually improved the formatting of a lot of declarations, and got rid of excessively repetitive (and now obsolete anyway) comments informing the reader what pg_attribute_printf is for. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/785941cdc359c6e595201ffb0df9d28f3f7173a4">http://git.postgresql.org/pg/commitdiff/785941cdc359c6e595201ffb0df9d28f3f7173a4</a></li>

<li>Better fix for misuse of Float8GetDatumFast(). We can use that macro as long as we put the value into a local variable. Commit 735cd6128 was not wrong on its own terms, but I think this way looks nicer, and it should save a few cycles on 32-bit machines. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c33e0fbceb01d0ecd78330feef1315682c64bc4">http://git.postgresql.org/pg/commitdiff/2c33e0fbceb01d0ecd78330feef1315682c64bc4</a></li>

<li>Minor code cleanups in pgbench expression support. Get rid of unnecessary expr_yylex declaration (we haven't supported flex 2.5.4 in a long time, and even if we still did, the declaration in pgbench.h makes this one unnecessary and inappropriate). Fix copyright dates, improve some layout choices, etc. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9dd03c03aeed6486129e3101695b13d469c2985">http://git.postgresql.org/pg/commitdiff/e9dd03c03aeed6486129e3101695b13d469c2985</a></li>

<li>Remove a couple other vestigial yylex() declarations. These were workarounds for a long-gone flex bug; all supported versions of flex emit an extern declaration as expected. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9a8e23311cac14168df6644e03d533a4b07f933e">http://git.postgresql.org/pg/commitdiff/9a8e23311cac14168df6644e03d533a4b07f933e</a></li>

<li>Make ginbuild's funcCtx be independent of its tmpCtx. Previously the funcCtx was a child of the tmpCtx, but that was broken by commit eaa5808e8ec4e82ce1a87103a6b6f687666e4e4c, which made MemoryContextReset() delete, not reset, child contexts. The behavior of having a tmpCtx reset also clear the other context seems rather dubious anyway, so let's just disentangle them. Per report from Erik Rijkers. In passing, fix badly-inaccurate comments about these contexts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1601830ec20d56dc7bf6b60a34f69841429e4825">http://git.postgresql.org/pg/commitdiff/1601830ec20d56dc7bf6b60a34f69841429e4825</a></li>

<li>Add vacuum_delay_point call in compute_index_stats's per-sample-row loop. Slow functions in index expressions might cause this loop to take long enough to make it worth being cancellable. Probably it would be enough to call CHECK_FOR_INTERRUPTS here, but for consistency with other per-sample-row loops in this file, let's use vacuum_delay_point. Report and patch by Jeff Janes. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e4cbfd673d530a3e841db26a74f22e11a991205a">http://git.postgresql.org/pg/commitdiff/e4cbfd673d530a3e841db26a74f22e11a991205a</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add support for ALTER TABLE IF EXISTS ... RENAME CONSTRAINT. Also add regression test. Previously this was documented to work, but didn't. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1d8198bb44e7e7e3e96d96942f642e9964111628">http://git.postgresql.org/pg/commitdiff/1d8198bb44e7e7e3e96d96942f642e9964111628</a></li>

<li>doc: update NUMERIC to state that only some ops are exact. Report by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/278edd9ed36c7722cbae27e0e96a08964da69eb5">http://git.postgresql.org/pg/commitdiff/278edd9ed36c7722cbae27e0e96a08964da69eb5</a></li>

<li>docs: clarify when MVCC snapshot is taken. Report by &Aacute;lvaro Hern&aacute;ndez Tortosa 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66c8040d509c86fd2f215c06eb16d82e570d3fb6">http://git.postgresql.org/pg/commitdiff/66c8040d509c86fd2f215c06eb16d82e570d3fb6</a></li>

<li>psql: show proper row count in \x mode for zero-column output. Also, fix pager enable selection for such cases, and other cleanups for zero-column output. Report by Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/376a0c4547fe98c45476647596ce9c9b394f8415">http://git.postgresql.org/pg/commitdiff/376a0c4547fe98c45476647596ce9c9b394f8415</a></li>

<li>PL/pgSQL docs: recommend format() for query construction. Previously only concatenation was recommended. Report by Pavel Stehule 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e1f6d8132b4da3e0727bb4918b9ea51446a9c41">http://git.postgresql.org/pg/commitdiff/0e1f6d8132b4da3e0727bb4918b9ea51446a9c41</a></li>

<li>btree_gin: properly call DirectFunctionCall1() Previously we called DirectFunctionCall3() with dummy arguments. Patch by Jon Nelson 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/843cd0bfe6246d94d9b34a7f36bbb76fdba87b74">http://git.postgresql.org/pg/commitdiff/843cd0bfe6246d94d9b34a7f36bbb76fdba87b74</a></li>

<li>Revert commit 843cd0bfe6246d94d9b34a7f36bbb76fdba87b74. Report by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/11226e3817687fcb70fb49d75fdf592e7f3884f6">http://git.postgresql.org/pg/commitdiff/11226e3817687fcb70fb49d75fdf592e7f3884f6</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reduce pinning and buffer content locking for btree scans. Even though the main benefit of the Lehman and Yao algorithm for btrees is that no locks need be held between page reads in an index search, we were holding a buffer pin on each leaf page after it was read until we were ready to read the next one. The reason was so that we could treat this as a weak lock to create an "interlock" with vacuum's deletion of heap line pointers, even though our README file pointed out that this was not necessary for a scan using an MVCC snapshot. The main goal of this patch is to reduce the blocking of vacuum processes by in-progress btree index scans (including a cursor which is idle), but the code rearrangement also allows for one less buffer content lock to be taken when a forward scan steps from one page to the next, which results in a small but consistent performance improvement in many workloads. This patch leaves behavior unchanged for some cases, which can be addressed separately so that each case can be evaluated on its own merits. These unchanged cases are when a scan uses a non-MVCC snapshot, an index-only scan, and a scan of a btree index for which modifications are not WAL-logged. If later patches allow all of these cases to drop the buffer pin after reading a leaf page, then the btree vacuum process can be simplified; it will no longer need the "super-exclusive" lock to delete tuples from a page. Reviewed by Heikki Linnakangas and Kyotaro Horiguchi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ed5b87f96d473962ec5230fd820abfeaccb2069">http://git.postgresql.org/pg/commitdiff/2ed5b87f96d473962ec5230fd820abfeaccb2069</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make SyncRepWakeQueue to a static function. It is only used in src/backend/replication/syncrep.c. Back-patch to all supported branches except 9.1 which declares the function as static. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/656ea810e5e1111bc4d741275b37310a32ff890c">http://git.postgresql.org/pg/commitdiff/656ea810e5e1111bc4d741275b37310a32ff890c</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix portability issues with stddev in pg_stat_statements. Stddev is calculated on the fly, and the code in commit 717f70953264 was using Float8GetDatumFast() inappropriately to convert the result to a Datum. Mea culpa. It now uses Float8GetDatum(). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/735cd6128a6a401671126443a9af4324932a38d6">http://git.postgresql.org/pg/commitdiff/735cd6128a6a401671126443a9af4324932a38d6</a></li>

<li>Add stats for min, max, mean, stddev times to pg_stat_statements. The new fields are min_time, max_time, mean_time and stddev_time. Based on an original patch from Mitsumasa KONDO, modified by me. Reviewed by Petr Jel&iacute;nek. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/717f709532642f5f7756785c9be17b7ffcec8ae8">http://git.postgresql.org/pg/commitdiff/717f709532642f5f7756785c9be17b7ffcec8ae8</a></li>

<li>Use standard librart sqrt function in pg_stat_statements. The stddev calculation included a faster but unportable sqrt function. This is not worth the extra effort, and won't work everywhere. If the standard library function is good enough for the SQL function it should be good enough here too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cfe12763c32437bc708a64ce88a90c7544f16185">http://git.postgresql.org/pg/commitdiff/cfe12763c32437bc708a64ce88a90c7544f16185</a></li>

<li>Add a pager_min_lines setting to psql. If set, the pager will not be used unless this many lines are to be displayed, even if that is more than the screen depth. Default is zero, meaning it's disabled. There is probably more work to be done in giving the user control over when the pager is used, particularly when wide output forces use of the pager regardless of how many lines there are, but this is a start. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7655f4ccea570d57c4d473cd66b755c03c904942">http://git.postgresql.org/pg/commitdiff/7655f4ccea570d57c4d473cd66b755c03c904942</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/16bbb96a2b48d0f525b7fb2f6a001b16719467a9">http://git.postgresql.org/pg/commitdiff/16bbb96a2b48d0f525b7fb2f6a001b16719467a9</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in two more revisions of a patch to add a --strict option to pg_dump for missing tables.</li>

<li>Bruce Momjian sent in three more revisions of a patch to add the asciidoc output format to psql.</li>

<li>David Steele sent in two more revisions of a patch to to add a pg_audit extension.</li>

<li>Peter Geoghegan and Andrew (RhodiumToad) Gierth sent in two more revisions of a patch to add abbreviated keys for NUMERIC.</li>

<li>Michael Paquier sent in two revisions of a patch to expose PG_VERSION_NUM to developers.</li>

<li>Michael Paquier sent in another revision of a patch to add a table-level log_autovacuum_min_duration.</li>

<li>Kyotaro HORIGUCHI sent in a patch to remove individual phases to mark unique joins.</li>

<li>Andres Freund sent in another revision of a patch to add replication identifiers.</li>

<li>Amit Kapila sent in a patch to fix a bug in dsm_attach().</li>

<li>Peter Geoghegan sent in a patch to add DatumGetUInt32() around the hash_any() and hash_uint32() calls within varlena.c.</li>

<li>Heikki Linnakangas sent in another revision of a patch to use Intel SSE4.2 CRC instructions where available.</li>

<li>&Aacute;lvaro Herrera sent in another revision of a patch to implement parsing utility commands.</li>

<li>Kaigai Kouhei sent in another revision of a patch to add a custom JOIN API.</li>

<li>Fabr&iacute;zio de Royes Mello sent in a patch to fix a bug with indexes on unlogged tables.</li>

<li>Amit Kapila sent in two more revisions of a patch to implement parallel sequential scan.</li>

<li>Antonin Houska sent in two revisions of a WIP patch to enable spliting hash index buckets.</li>

<li>Peter Geoghegan sent in another revision of a patch to implement INSERT ... ON CONFLICT IGNORE (and UPDATE).</li>

<li>Haribabu Kommi sent in another revision of a patch to add a catalog view to pg_hba.conf.</li>

<li>David Rowley sent in another revision of a patch to improve performance for outer joins where the outer side is unique.</li>

<li>Tom Lane sent in another revision of a patch to manipulate complex types as non-contiguous structures in-memory.</li>

<li>Fabien COELHO sent in another revision of a patch to improve pgbench syntax error messages.</li>

<li>Fabien COELHO sent in another revision of a patch to extend pgbench expressions with functions.</li>

<li>Pavel Stehule sent in another revision of a patch to add a row_to_array function.</li>

<li>Michael Paquier sent in a patch to describe precise rounding behavior of numeric and double precision in the docs.</li>

<li>Andres Freund sent in a patch to make heap extension scale better.</li>

</ul>