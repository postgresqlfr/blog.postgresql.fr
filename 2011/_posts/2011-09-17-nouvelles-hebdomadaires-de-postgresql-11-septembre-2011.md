---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 septembre 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/09/17/Nouvelles-hebdomadaires-de-PostgreSQL-11-septembre-2011"
---


<p>L'appel à conférenciers a été lancé pour le FLOSS UK, programmé du 20 au 22 mars 2012 à Edimbourg. La date limite de dépôt des candidatures est fixée au 18 novembre 2011 et les conférenciers sélectionnés seront informés avant le 25 novembre. Les propositions sont à envoyer à postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;:

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></p>

<p>Nouveau sondage&nbsp;: Quand pensez-vous mettre à jour vers la 9.1&nbsp;?

<a target="_blank" href="http://www.postgresql.org/community">http://www.postgresql.org/community</a></p>

<p>Le PUG de New-York présente "<em>PostgreSQL 9.1 Overview</em>" avec Bruce Momjian à 18h30, le 22 septembre au Yodle. RSVP et détails ci-après&nbsp;:

<a target="_blank" href="http://www.nycpug.org/events/32571952/">http://www.nycpug.org/events/32571952/</a></p>

<p>[ndt: sortie de PostgreSQL 9.1, la dépêche en français&nbsp;:

<a target="_blank" href="http://blog.postgresql.fr/index.php?post/2011/09/12/Sortie-de-PostgreSQL-9.0">http://blog.postgresql.fr/index.php?post/2011/09/12/Sortie-de-PostgreSQL-9.0</a>]</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>pgpool-II 3.1.0, un distributeur de connexion et bien d'avantage&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>xlogdump 0.4.0, un outil d'extraction de données à partir de fichiers WAL&nbsp;:

<a target="_blank" href="https://github.com/snaga/xlogdump">https://github.com/snaga/xlogdump</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-09/threads.php</a>;</li>

<li>Francophones&nbsp;:

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Postgres Open 2011, conférence ayant pour thème les évolutions brutales dans l'industrie de la base de données, aura lieu du 14 au 16 septembre 2011 à Chicago (Illinois, États-Unis) à l'hôtel "<em>Westin Michigan Avenue</em>"&nbsp;:

<a target="_blank" href="http://postgresopen.org">http://postgresopen.org</a></li>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San José (Californie, États-Unis)&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra à Amsterdam, du 18 au 21 octobre&nbsp;:

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>Le <em>PG-Day Denver 2011</em> aura lieu le vendredi 21 octobre 2011 dans le campus Auraria près de Denver, Colorado&nbsp;:

<a target="_blank" href="http://pgday.consistentstate.com/">http://pgday.consistentstate.com/</a></li>

<li>pgbr aura lieu à São Paulo (Brésil) les 3 &amp; 4 novembre 2011&nbsp;:

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

<li><em>PGConf.DE 2011</em> est une conférence germanophone tenue le 11 novembre au musée industriel du Rhin à Oberhausen (Allemagne). L'appel à conférenciers est lancé&nbsp;:

<a target="_blank" href="http://2011.pgconf.de/">http://2011.pgconf.de/</a></li>

<li>La cinquième édition du PGDay italien (PGDay.IT 2011) aura lieu le 25 novembre à Prato&nbsp;:

<a target="_blank" href="http://2011.pgday.it/">http://2011.pgday.it/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org et en espagnol à pwn (a) arpug.com.ar.</em></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110911">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Bruce Momjian a poussé&nbsp;:</p>

<ul>

<li>Document that contrib/pgtrgm only processes ASCII alphanumeric characters. Backpatch to 9.0 and 9.1.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d235f828d74daaabdeb97efa4499cfb30ee65d09">http://git.postgresql.org/pg/commitdiff/d235f828d74daaabdeb97efa4499cfb30ee65d09</a></li>

<li>Add mention that UTC really means UT1. Backpatch to 9.1.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7cb99b269667ef3d8869bc9f7681debc12c45b1d">http://git.postgresql.org/pg/commitdiff/7cb99b269667ef3d8869bc9f7681debc12c45b1d</a></li>

<li>Add C comment about why we send cache invalidation messages for session-local objects.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f458c90bff45ecae91fb55ef2b938af37d977af3">http://git.postgresql.org/pg/commitdiff/f458c90bff45ecae91fb55ef2b938af37d977af3</a></li>

<li>Add documentation link to strftime supported options.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c8676ea71754b5ebd4a5e4ad3ffb173ef6db32d">http://git.postgresql.org/pg/commitdiff/5c8676ea71754b5ebd4a5e4ad3ffb173ef6db32d</a></li>

<li>Properly document semphore requirements by accounting for worker processes. Backpatch to 9.1 and 9.0. Submitted by Anton Yuzhaninov, confirmed by Robert Haas

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d764835bbc705f38311b5a6fe14a9aff4feb6fc3">http://git.postgresql.org/pg/commitdiff/d764835bbc705f38311b5a6fe14a9aff4feb6fc3</a></li>

<li>Document PERFORM limitation when using WITH queries. Backpatch to 9.0 and 9.1. Report from Dmitry Epstein.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6f94280dee9f8b6c511f00a50531b981faa73b54">http://git.postgresql.org/pg/commitdiff/6f94280dee9f8b6c511f00a50531b981faa73b54</a></li>

<li>Fix plpgsql "PERFORM" markup. Backpatch to 9.0 and 9.1.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba3de10c4ea3c70d4e36181e563a4ebffaf4e022">http://git.postgresql.org/pg/commitdiff/ba3de10c4ea3c70d4e36181e563a4ebffaf4e022</a></li>

<li>Add documentation suggestion about adding a comment to the top of pgpass. Backpatch to 9.1.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a25fc9edcb6b1ed589d9767b4b8c1cdae21c3cc3">http://git.postgresql.org/pg/commitdiff/a25fc9edcb6b1ed589d9767b4b8c1cdae21c3cc3</a></li>

<li>Fix spelling mistake in pgpass documentation change. Per Peter Eisentraut.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d858abfdfdcfb11c5eff08c8368c27a3f66964d2">http://git.postgresql.org/pg/commitdiff/d858abfdfdcfb11c5eff08c8368c27a3f66964d2</a></li>

<li>Properly document the existance of OLD/NEW trigger pl/pgsql trigger fields. Backpatch to 9.0 and 9.1. Report from Pavel Stehule, patch from Josh Kupershmidt

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/39039e6d7a48d37aedcfca7973cea3288ce356d4">http://git.postgresql.org/pg/commitdiff/39039e6d7a48d37aedcfca7973cea3288ce356d4</a></li>

<li>Revert documentation patch about NEW/OLD and triggers. Backpatch to 9.0 and 9.1. Patch from Josh Kupershmidt.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8eacb25cbe9100b9cf441d4cbca4cec8fa5e3f52">http://git.postgresql.org/pg/commitdiff/8eacb25cbe9100b9cf441d4cbca4cec8fa5e3f52</a></li>

<li>Fix to_date() and to_timestamp() to handle year masks of length &lt; 4 so they wrap toward year 2020, rather than the inconsistent behavior we had before.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/029dfdf1157b6d837a7b7211cd35b00c6bcd767c">http://git.postgresql.org/pg/commitdiff/029dfdf1157b6d837a7b7211cd35b00c6bcd767c</a></li>

<li>Fix bug introduced by pgrminclude where the tablespace version name was not expanded. Bump catalog version number to force initdb for all tablespaces.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f81fb4f690355bc88fee69624103956fb4576fe5">http://git.postgresql.org/pg/commitdiff/f81fb4f690355bc88fee69624103956fb4576fe5</a></li>

<li>Have pgrminclude skip files that use CppAsString2 because CppAsString2 will expaned undefined identifiers.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f19593754a1b9293b098975fc43263125a40a4c3">http://git.postgresql.org/pg/commitdiff/f19593754a1b9293b098975fc43263125a40a4c3</a></li>

<li>In pg_upgrade, disallow migration of 8.3 clusters using contrib/ltree because its internal format was changed in 8.4. Backpatch to 9.0 and 9.1. Report by depesz, diagnosis by Tom.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ced32d24e14af1877171c085a635b4ccdf8930c">http://git.postgresql.org/pg/commitdiff/3ced32d24e14af1877171c085a635b4ccdf8930c</a></li>

<li>Allow bcc32 and win32 batch files to compile libpq. Backpatch to 9.1. By Hiroshi Saito

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7b8e10f2bed1d450a9f9b211ae1b883227443912">http://git.postgresql.org/pg/commitdiff/7b8e10f2bed1d450a9f9b211ae1b883227443912</a></li>

<li>Remove unnecessary MATCH FULL specification in example. Reported by Grzegorz Szpetkowski.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c79003ea4f2c40ac957457dbae24928ba255f280">http://git.postgresql.org/pg/commitdiff/c79003ea4f2c40ac957457dbae24928ba255f280</a></li>

<li>Document that only user-defined columns are expanded by SELECT *.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90108c9aab51840a0fa7bcb11a2da09204d5b003">http://git.postgresql.org/pg/commitdiff/90108c9aab51840a0fa7bcb11a2da09204d5b003</a></li>

<li>Remove double-quoting of table names in clusterdb. BACKWARD COMPABILITY BREAKAGE. Remove double-quoting of index/table names in reindexdb. BACKWARD COMPABILITY BREAKAGE. Document thate user/database names are preserved with double-quoting by command-line tools like vacuumdb.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d68ccf536e950a07b5a7030bf609936fe65aab51">http://git.postgresql.org/pg/commitdiff/d68ccf536e950a07b5a7030bf609936fe65aab51</a></li>

</ul>

<p>Tom Lane a poussé&nbsp;:</p>

<ul>

<li>Update time zone data files to tzdata release 2011i. DST law changes in Canada, Egypt, Russia, Samoa, South Sudan.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b88af150e3a26f9e41da89da0c507eac550e46b">http://git.postgresql.org/pg/commitdiff/0b88af150e3a26f9e41da89da0c507eac550e46b</a></li>

<li>Update type-conversion documentation for long-ago changes. This example wasn't updated when we changed the behavior of bpcharlen() in 8.0, nor when we changed the number of parameters taken by the bpchar() cast function in 7.3. Per report from lsliang.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7f83e70d9758c5dd480c9dbba1668ddeec37916">http://git.postgresql.org/pg/commitdiff/b7f83e70d9758c5dd480c9dbba1668ddeec37916</a></li>

<li>Add an "incompatibility" entry to 9.1 release notes about CREATE EXTENSION. We've now seen more than one gripe from somebody who didn't get the memo about how to install contrib modules in 9.1. Try to make it a little more prominent that you aren't supposed to call the scripts directly anymore.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae92eff6b93c6ee18ca5c48958c355f5a448f8f5">http://git.postgresql.org/pg/commitdiff/ae92eff6b93c6ee18ca5c48958c355f5a448f8f5</a></li>

<li>Avoid possibly accessing off the end of memory in examine_attribute(). Since the last couple of columns of pg_type are often NULL, sizeof(FormData_pg_type) can be an overestimate of the actual size of the tuple data part. Therefore memcpy'ing that much out of the catalog cache, as analyze.c was doing, poses a small risk of copying past the end of memory and incurring SIGSEGV. No such crash has been identified in the field, but we've certainly seen the equivalent happen in other code paths, so patch this one all the way back. Per valgrind testing by Noah Misch, though this is not his proposed patch. I chose to use SearchSysCacheCopy1 rather than inventing special-purpose infrastructure for copying only the minimal part of a pg_type tuple.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/780a342c900fa085e8c065b3282b491de69ab10d">http://git.postgresql.org/pg/commitdiff/780a342c900fa085e8c065b3282b491de69ab10d</a></li>

<li>Avoid possibly accessing off the end of memory in SJIS2004 conversion. The code in shift_jis_20042euc_jis_2004() would fetch two bytes even when only one remained in the string. Since conversion functions aren't supposed to assume null-terminated input, this poses a small risk of fetching past the end of memory and incurring SIGSEGV. No such crash has been identified in the field, but we've certainly seen the equivalent happen in other code paths, so patch this one all the way back. Report and patch by Noah Misch.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/623f77e9d1338720512430a0b8e824d7359739b8">http://git.postgresql.org/pg/commitdiff/623f77e9d1338720512430a0b8e824d7359739b8</a></li>

<li>Improve comment about handling of temp tables in shared-inval code.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/db10f01baa2148f1773cacfcbadc7158ae94c081">http://git.postgresql.org/pg/commitdiff/db10f01baa2148f1773cacfcbadc7158ae94c081</a></li>

<li>Fix get_name_for_var_field() to deal with RECORD Params. With 9.1's use of Params to pass down values from NestLoop join nodes to their inner plans, it is possible for a Param to have type RECORD, in which case the set of fields comprising the value isn't determinable by inspection of the Param alone. However, just as with a Var of type RECORD, we can find out what we need to know if we can locate the expression that the Param represents. We already knew how to do this in get_parameter(), but I'd overlooked the need to be able to cope in get_name_for_var_field(), which led to EXPLAIN failing with "record type has not been registered". To fix, refactor the search code in get_parameter() so it can be used by both functions. Per report from Marti Raudsepp.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7d9203cc4edfbcc283732efea6d54db0399ccee">http://git.postgresql.org/pg/commitdiff/a7d9203cc4edfbcc283732efea6d54db0399ccee</a></li>

<li>Fix typo in error message. Per Euler Taveira de Oliveira.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/99155aaa33f417daabd38c8b225c09a3c6da71ba">http://git.postgresql.org/pg/commitdiff/99155aaa33f417daabd38c8b225c09a3c6da71ba</a></li>

<li>Fix corner case bug in numeric to_char(). Trailing-zero stripping applied by the Fujii Masao specifier could strip zeroes to the left of the decimal point, for a format with no digit positions after the decimal point (such as "FM999."). Reported and diagnosed by Marti Raudsepp, though I didn't use his patch.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0bedf3e456c52274995d32d4c0c8a250de5c1ca">http://git.postgresql.org/pg/commitdiff/f0bedf3e456c52274995d32d4c0c8a250de5c1ca</a></li>

<li>One last round of copy-editing for the 9.1 release notes. Also set the documented release date to 2011-09-12.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09b68c70af855a0a69cede14da70968ddd97ba05">http://git.postgresql.org/pg/commitdiff/09b68c70af855a0a69cede14da70968ddd97ba05</a></li>

<li>round() is not portable. Use rint().

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d63de337f3e235f02d79a1df79dddbb002e9fd4e">http://git.postgresql.org/pg/commitdiff/d63de337f3e235f02d79a1df79dddbb002e9fd4e</a></li>

<li>Stamp 9.1.0.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f43001424a9da624a89b213d0be606a8212a50a">http://git.postgresql.org/pg/commitdiff/1f43001424a9da624a89b213d0be606a8212a50a</a></li>

<li>Move Timestamp/Interval typedefs and basic macros into datatype/timestamp.h. As per my recent proposal, this refactors things so that these typedefs and macros are available in a header that can be included in frontend-ish code. I also changed various headers that were undesirably including utils/timestamp.h to include datatype/timestamp.h instead. Unsurprisingly, this showed that half the system was getting utils/timestamp.h by way of xlog.h. No actual code changes here, just header refactoring.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a7801b62f21bd051444bd1119cd3745ecc8e14ec">http://git.postgresql.org/pg/commitdiff/a7801b62f21bd051444bd1119cd3745ecc8e14ec</a></li>

<li>Simplify handling of the timezone GUC by making initdb choose the default. We were doing some amazingly complicated things in order to avoid running the very expensive identify_system_timezone() procedure during GUC initialization. But there is an obvious fix for that, which is to do it once during initdb and have initdb install the system-specific default into postgresql.conf, as it already does for most other GUC variables that need system-environment-dependent defaults. This means that the timezone (and log_timezone) settings no longer have any magic behavior in the server. Per discussion.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca4af308c32d03db5fbacb54d6e583ceb904f268">http://git.postgresql.org/pg/commitdiff/ca4af308c32d03db5fbacb54d6e583ceb904f268</a></li>

<li>Try to un-break MSVC build. I thought we had enough infrastructure to absorb CPPFLAGS changes from the makefiles, but buildfarm says otherwise.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a8de2f2e7fd5d2265f30206743ba2dd51bff222">http://git.postgresql.org/pg/commitdiff/5a8de2f2e7fd5d2265f30206743ba2dd51bff222</a></li>

<li>Fix permissions on pg_largeobject_metadata.h in 9.0 branch. For some reason it was 0755 instead of 0644.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4de174d4bfa8e162cf64fb9bf7393fea05b0dee7">http://git.postgresql.org/pg/commitdiff/4de174d4bfa8e162cf64fb9bf7393fea05b0dee7</a></li>

<li>Remove no-longer-used variable.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5f42e5945b3dd96c228531c0730f418846ced04e">http://git.postgresql.org/pg/commitdiff/5f42e5945b3dd96c228531c0730f418846ced04e</a></li>

<li>Invent a new memory context primitive, MemoryContextSetParent. This function will be useful for altering the lifespan of a context after creation (for example, by creating it under a transient context and later reparenting it to belong to a long-lived context). It costs almost no new code, since we can refactor what was there. Per my proposal of yesterday.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b0025bd95703aaedc4ff23ddcfbde9597fa0919d">http://git.postgresql.org/pg/commitdiff/b0025bd95703aaedc4ff23ddcfbde9597fa0919d</a></li>

</ul>

<p>Peter Eisentraut a poussé&nbsp;:</p>

<ul>

<li>Improve "invalid byte sequence for encoding" message. It used to say: ERROR: invalid byte sequence for encoding "UTF8": 0xdb24 Change this to ERROR: invalid byte sequence for encoding "UTF8": 0xdb 0x24 to make it clear that this is a byte sequence and not a code point. Also fix the adjacent "character has no equivalent" message that has the same issue.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2a5ce68266d879c7acd292952adc376966622e0">http://git.postgresql.org/pg/commitdiff/a2a5ce68266d879c7acd292952adc376966622e0</a></li>

<li>Correct ancient logic mistake in assertion. Found by gcc -Wlogical-op

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6d800981ed0cd8889660d40cb5e813dfad87344">http://git.postgresql.org/pg/commitdiff/e6d800981ed0cd8889660d40cb5e813dfad87344</a></li>

<li>Add missing format argument to ecpg_log() call

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cf15fb5cabfbc71e07be23cfbc813daee6c5014f">http://git.postgresql.org/pg/commitdiff/cf15fb5cabfbc71e07be23cfbc813daee6c5014f</a></li>

<li>Add missing format attributes. Add __attribute__ decorations for printf format checking to the places that were missing them. Fix the resulting warnings. Add -Wmissing-format-attribute to the standard set of warnings for GCC, so these don't happen again. The warning fixes here are relatively harmless. The one serious problem discovered by this was already committed earlier in cf15fb5cabfbc71e07be23cfbc813daee6c5014f.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52ce20589a8bac4eccaea043b1fe283daaf4f9e3">http://git.postgresql.org/pg/commitdiff/52ce20589a8bac4eccaea043b1fe283daaf4f9e3</a></li>

<li>Fix additional format warning. Apparently, this only happens on 64-bit platforms.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02bca4f35164dd1873eab9b8e6167e42a79157c4">http://git.postgresql.org/pg/commitdiff/02bca4f35164dd1873eab9b8e6167e42a79157c4</a></li>

<li>Remove many -Wcast-qual warnings. This addresses only those cases that are easy to fix by adding or moving a const qualifier or removing an unnecessary cast. There are many more complicated cases remaining.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b81c2fe6ee2b26d37610c3d381a87fa17af0a7c">http://git.postgresql.org/pg/commitdiff/1b81c2fe6ee2b26d37610c3d381a87fa17af0a7c</a></li>

</ul>

<p>Alvaro Herrera a poussé&nbsp;:</p>

<ul>

<li>Mark some untranslatable messages with errmsg_internal.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b64f18c583675684766e364754bd3c9f702c549d">http://git.postgresql.org/pg/commitdiff/b64f18c583675684766e364754bd3c9f702c549d</a></li>

<li>Adjust translator comment format to xgettext expectations

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56a9ed92b664af191040d848ca923fb3234671ee">http://git.postgresql.org/pg/commitdiff/56a9ed92b664af191040d848ca923fb3234671ee</a></li>

<li>Tweak string for uniformity

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/295e7dc929c346d53e0b55aaed539b0b0d59059f">http://git.postgresql.org/pg/commitdiff/295e7dc929c346d53e0b55aaed539b0b0d59059f</a></li>

</ul>

<p>Simon Riggs a poussé&nbsp;:</p>

<ul>

<li>Emit cascaded standby message on shutdown only when appropriate. Adds additional test for active walsenders and closes a race condition for when we failover when a new walsender was connecting. Reported and fixed bu Fujii Masao. Review by Heikki Linnakangas

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dde70cc313683e47e71997759c6029b4220f71c0">http://git.postgresql.org/pg/commitdiff/dde70cc313683e47e71997759c6029b4220f71c0</a></li>

<li>Partially revoke attempt to improve performance with many savepoints. Maintain difference between subtransaction release and commit introduced by earlier patch.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df383b03e6f761c9b5bb12aa2339795ab44aa054">http://git.postgresql.org/pg/commitdiff/df383b03e6f761c9b5bb12aa2339795ab44aa054</a></li>

<li>PublishStartupProcessInformation() to avoid rare hang in recovery. Bgwriter could cause hang in recovery during page concurrent cleaning. Bug report and testing by Bernd Helmle, fix by me

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c24bac64c3828d651abfd5e34bd0e0031ab9946">http://git.postgresql.org/pg/commitdiff/7c24bac64c3828d651abfd5e34bd0e0031ab9946</a></li>

</ul>

<p>Heikki Linnakangas a poussé&nbsp;:</p>

<ul>

<li>Buffering GiST index build algorithm. When building a GiST index that doesn't fit in cache, buffers are attached to some internal nodes in the index. This speeds up the build by avoiding random I/O that would otherwise be needed to traverse all the way down the tree to the find right leaf page for tuple. Alexander Korotkov

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5edb24a8983e4a103e26153853d91141f818227c">http://git.postgresql.org/pg/commitdiff/5edb24a8983e4a103e26153853d91141f818227c</a></li>

<li>Fix typo and reword the sentence.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86ab71d58d4ee7e183e501db75714ad59feef8a5">http://git.postgresql.org/pg/commitdiff/86ab71d58d4ee7e183e501db75714ad59feef8a5</a></li>

</ul>

<p>ITAGAKI Takahiro a poussé&nbsp;:</p>

<ul>

<li>Add datatype directory to SUBDIRS. New header datatype/timestamp.h should be installed for server-side dev.

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/96a8aed4cb66b9a23e5b566ad549cd0c5eac5a74">http://git.postgresql.org/pg/commitdiff/96a8aed4cb66b9a23e5b566ad549cd0c5eac5a74</a></li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas and Alexander Korotkov traded new versions of the patch to build GiST indexes quickly.</li>

<li>Oleg Bartunov sent in three more revisions of the patch to implement space-partitioned GiST indexes.</li>

<li>Marti Raudsepp sent in another revision of the patch to generate more useful column names for subquery expressions.</li>

<li>Marti Raudsepp sent in a patch which adds the backend's current running query to the "backend crash" message.</li>

<li>Shigeru HANADA sent in two more revisions of a patch to add a "force not null" option to the file FDW.</li>

<li>Pavan Deolasee sent in another revision of the patch to a single-pass VACUUM.</li>

<li>Fujii Masao sent in two revisions of a patch to add a pg_last_xact_insert_timestamp.</li>

<li>Marko (johto) Tiikkaja sent in a patch to add an nfiltered annotation to EXPLAIN.</li>

<li>George Barnett sent in a patch intended to improve the way PostgreSQL runs with NFS data directory on Linux.</li>

<li>Tom Lane sent in a WIP patch to bring ECPG in line with the rest of the code, which as of this week has a separate header for the core timestamp definitions and macros.</li>

<li>Fujii Masao sent in a patch to unite recovery.conf with postgres.conf.</li>

<li>Fujii Masao sent in two revisions of a patch to add a replication option to the createuser utility.</li>

<li>Alexey Klyukin sent in another revision of the patch to allow the pg config parser to continue on error.</li>

<li>Marti Raudsepp sent in a patch to cache constant stable expressions per execution.</li>

<li>Josh Kupershmidt sent in another revision of the patch to allow \dd to show constraint names.</li>

<li>Jun Ishiduka sent in another revision of the patch to make it possible to take an on-line base backup from a hot standby.</li>

<li>Andrew Dunstan sent in a patch intended to fix the issue where the databse super-user is presumed to be a member of every role.</li>

<li>Alexander Korotkov sent in another revision of the patch implementing a double-sorting picksplit implementation for GiST indexes.</li>

<li>KaiGai Kohei sent in another flock of patches reworking DROP into a single unified framework.</li>

</ul>