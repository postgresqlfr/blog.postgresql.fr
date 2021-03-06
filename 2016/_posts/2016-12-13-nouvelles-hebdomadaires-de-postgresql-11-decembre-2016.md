---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 11 décembre 2016"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2016/12/13/Nouvelles-hebdomadaires-de-PostgreSQL-11-décembre-2016"
---


<h2>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</h2>

<ul>

<li>PyGreSQL 5.0.3, un connecteur Python pour PostgreSQL&nbsp;: <a target="_blank" href="http://www.pygresql.org/contents/changelog.html">http://www.pygresql.org/contents/changelog.html</a></li>

</ul>

<h2>Offres d'emplois autour de PostgreSQL en d&eacute;cembre</h2>

<ul>

<li>Internationales : <a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2016-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2016-12/threads.php</a></li>

<li>Francophones : <a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a></li>

</ul>

<h2>PostgreSQL Local</h2>

<ul>

<li>Le PGDay.IT 2016 aura lieu &agrave; Prato le 13 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgday.it">http://pgday.it</a></li>

<li>La <em>PGConf India 2017</em> aura lieu les 2 &amp; 3 mars 2017 &agrave; Bengalore (&Eacute;tat du Karnataka en Inde). Les propositions sont attendues sur &lt;papers AT pgconf DOT in&gt; jusqu'au 31 d&eacute;cembre 2016&nbsp;: <a target="_blank" href="http://pgconf.in/">http://pgconf.in/</a></li>

<li>PostgreSQL@SCaLE aura lieu les 2 &amp; 3 mars 2017 au centre des conventions de Pasadena, comme partie du SCaLE 15X&nbsp;: <a target="_blank" href="http://www.socallinuxexpo.org/scale/15x/">http://www.socallinuxexpo.org/scale/15x/</a></li>

</ul>

<h2>PostgreSQL dans les m&eacute;dia</h2>

<ul>

<li>Planet PostgreSQL : <a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr : <a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA. La version originale se trouve &agrave; l'adresse suivante : <a target="_blank" href="http://www.postgresql.org/message-id/20161211224221.GB8506@fetter.org">http://www.postgresql.org/message-id/20161211224221.GB8506@fetter.org</a></p>

<p>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</p>

<!--more-->


<h2>Correctifs appliqu&eacute;s</h2>

<p>Fujii Masao pushed:</p>

<ul>

<li>Fix incorrect output from gin_desc(). Previously gin_desc() displayed incorrect output "unknown action 0" for XLOG_GIN_INSERT and XLOG_GIN_VACUUM_DATA_LEAF_PAGE records with valid actions. The cause of this problem was that gin_desc() wrongly used XLogRecGetData() to extract data from those records. Since they were registered by XLogRegisterBufData(), gin_desc() should have used XLogRecGetBlockData(), instead, like gin_redo(). Also there were other differences about how to treat XLOG_GIN_INSERT record between gin_desc() and gin_redo(). This commit fixes gin_desc() routine so that it treats those records in the same way as gin_redo(). Batch-patch to 9.5 where WAL record format was revamped and XLogRegisterBufData() was added. Reported-By: Andres Freund Reviewed-By: Tom Lane Discussion: &lt;20160509194645.7lewnpw647zegx2m@alap3.anarazel.de&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5dc851afde8d9ef9947f21799f7a1b08bf0bf812">http://git.postgresql.org/pg/commitdiff/5dc851afde8d9ef9947f21799f7a1b08bf0bf812</a></li>

<li>Fix typo in docs. Reported-by: Darko Prelec <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/daac8e30eb7874722f277ae3461abe46a39e56ed">http://git.postgresql.org/pg/commitdiff/daac8e30eb7874722f277ae3461abe46a39e56ed</a></li>

<li>Improve documentation about pg_stat_replication view. Add the descriptions of possible values in "state" and "sync_state" columns of pg_stat_replication view. Author: Michael Paquier, slightly modified by me Discussion: &lt;CAB7nPqT7APWrvPFZrcjKEHoq4=g3z2ErxtTdojSf+sDALzuemA@mail.gmail.com&gt; <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dfe530a09226a9de80f2b4c3d5f667bf51481c49">http://git.postgresql.org/pg/commitdiff/dfe530a09226a9de80f2b4c3d5f667bf51481c49</a></li>

</ul>

<p>Heikki Linnakangas pushed:</p>

<ul>

<li>Fix creation of stand-alone INSTALL.html file. I missed the notice at the top of the file, that plain xref must not be used in installation.sgml. Per buildfarm member guaibasaurus. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7dd8eb39bd2b9e06eeef038f80ae327efb4a7d55">http://git.postgresql.org/pg/commitdiff/7dd8eb39bd2b9e06eeef038f80ae327efb4a7d55</a></li>

<li>Fix typo in new message in configure. Remove spurious "of", and reformat to fit on a 80 chars wide line. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/44a977f55f33834a2fe0d1d9bd5eeb29ce67e914">http://git.postgresql.org/pg/commitdiff/44a977f55f33834a2fe0d1d9bd5eeb29ce67e914</a></li>

<li>Fix whitespace. Thomas Munro <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9790b87f594565c11599b2004466169b8c2fd4af">http://git.postgresql.org/pg/commitdiff/9790b87f594565c11599b2004466169b8c2fd4af</a></li>

<li>Fix query cancellation. In commit fe0a0b59, the datatype used for MyCancelKey and other variables that store cancel keys were changed from long to uint32, but I missed this one. That broke query cancellation on platforms where long is wider than 32 bits. Report by Andres Freund, fix by Michael Paquier. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81f2e514a9b2d813bb5fd6b62523757aa7a6517f">http://git.postgresql.org/pg/commitdiff/81f2e514a9b2d813bb5fd6b62523757aa7a6517f</a></li>

<li>Replace PostmasterRandom() with a stronger source, second attempt. This adds a new routine, pg_strong_random() for generating random bytes, for use in both frontend and backend. At the moment, it's only used in the backend, but the upcoming SCRAM authentication patches need strong random numbers in libpq as well. pg_strong_random() is based on, and replaces, the existing implementation in pgcrypto. It can acquire strong random numbers from a number of sources, depending on what's available: OpenSSL RAND_bytes(), if built with OpenSSL, on Windows, the native cryptographic functions are used, and finally /dev/urandom. Unlike the current pgcrypto function, the source is chosen by configure. That makes it easier to test different implementations, and ensures that we don't accidentally fall back to a less secure implementation, if the primary source fails. All of those methods are quite reliable, it would be pretty surprising for them to fail, so we'd rather find out by failing hard. If no strong random source is available, we fall back to using erand48(), seeded from current timestamp, like PostmasterRandom() was. That isn't cryptographically secure, but allows us to still work on platforms that don't have any of the above stronger sources. Because it's not very secure, the built-in implementation is only used if explicitly requested with --disable-strong-random. This replaces the more complicated Fortuna algorithm we used to have in pgcrypto, which is unfortunate, but all modern platforms have /dev/urandom, so it doesn't seem worth the maintenance effort to keep that. pgcrypto functions that require strong random numbers will be disabled with --disable-strong-random. Original patch by Magnus Hagander, tons of further work by Michael Paquier and me. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqRy3krN8quR9XujMVVHYtXJ0_60nqgVc6oUk8ygyVkZsA@mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqRy3krN8quR9XujMVVHYtXJ0_60nqgVc6oUk8ygyVkZsA@mail.gmail.com</a> Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/CAB7nPqRWkNYRRPJA7-cF+LfroYV10pvjdz6GNvxk-Eee9FypKA@mail.gmail.com">https://www.postgresql.org/message-id/CAB7nPqRWkNYRRPJA7-cF+LfroYV10pvjdz6GNvxk-Eee9FypKA@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe0a0b5993dfe24e4b3bcf52fa64ff41a444b8f1">http://git.postgresql.org/pg/commitdiff/fe0a0b5993dfe24e4b3bcf52fa64ff41a444b8f1</a></li>

<li>Clean up password authentication code a bit. Commit fe0a0b59, which moved code to do MD5 authentication to a separate CheckMD5Auth() function, left behind a comment that really belongs inside the function, too. Also move the check for db_user_namespace inside the function, seems clearer that way. Now that the md5 salt is passed as argument to md5_crypt_verify, it's a bit silly that it peeks into the Port struct to see if MD5 authentication was used. Seems more straightforward to treat it as an MD5 authentication, if the md5 salt argument is given. And after that, md5_crypt_verify only used the Port argument to look at port-&gt;user_name, but that is redundant, because it is also passed as a separate 'role' argument. So remove the Port argument altogether. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe7bdf0bf67d8ac360d67fa9740074a2c70e88a4">http://git.postgresql.org/pg/commitdiff/fe7bdf0bf67d8ac360d67fa9740074a2c70e88a4</a></li>

<li>Fix quoting and a compiler warning in dumping partitions. Partition name needs to be quoted in the ATTACH PARTITION command constructed in binary-upgrade mode. Silence compiler warning about set but unused variable, without --enable-cassert. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2560d244b4c9fc08f1d076b3c40913bec5f7e31f">http://git.postgresql.org/pg/commitdiff/2560d244b4c9fc08f1d076b3c40913bec5f7e31f</a></li>

<li>Fix thinko in safeguard for negative availMem. Also, use pass read_buffer_size * numInputTapes rather than just availMem to USEMEM, to be neat. Peter Geoghegan. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64bc26f90d342ca343f5ba383a97691a58991204">http://git.postgresql.org/pg/commitdiff/64bc26f90d342ca343f5ba383a97691a58991204</a></li>

<li>Fix accounting of memory needed for merge heap. We allegedly allocated all remaining memory for the read buffers of the sort tapes, but we allocated the merge heap only after that. That means that the allocation of the merge heap was guaranteed to go over the memory limit. Fix by allocating the merge heap first. This makes little difference in practice, because the merge heap is tiny, but let's tidy. While we're at it, add a safeguard for the case that we are already over the limit when allocating the read buffers. That shouldn't happen, but better safe than sorry. The memory accounting error was reported off-list by Peter Geoghegan. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7d54f4f7ddf72bf4db1783890b058e758b4b894">http://git.postgresql.org/pg/commitdiff/f7d54f4f7ddf72bf4db1783890b058e758b4b894</a></li>

</ul>

<p>Tom Lane pushed:</p>

<ul>

<li>Remove extraneous semicolon from uses of relptr_declare(). If we're going to write a semicolon after calls of relptr_declare(), then we don't need one inside the macro, and removing it suppresses "empty declaration" warnings from pickier compilers (eg pademelon). While at it, we might as well use relptr() inside relptr_declare(), because otherwise that macro would likely go unused altogether. Also improve the comment, which I for one found unclear, and provide a specific example of intended usage. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3ebf2b45454a5fb74e6516ab4915f7a3d44d544f">http://git.postgresql.org/pg/commitdiff/3ebf2b45454a5fb74e6516ab4915f7a3d44d544f</a></li>

<li>Put AC_MSG_RESULT() call in the right place. Thinko in ecb0d20a9 --- this needs to go one level further out in the "if" nest. As it stood, nothing got printed in the case of selecting named POSIX semaphores. Cosmetic issue only, but a bug. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c648f058319a59ad591dd9d1b0c48dfd655d063a">http://git.postgresql.org/pg/commitdiff/c648f058319a59ad591dd9d1b0c48dfd655d063a</a></li>

<li>Fix unsafe assumption that struct timeval.tv_sec is a "long". It typically is a "long", but it seems possible that on some platforms it wouldn't be. In any case, this silences a compiler warning on OpenBSD (cf buildfarm member curculio). While at it, use snprintf not sprintf. This format string couldn't possibly overrun the supplied buffer, but that doesn't seem like a good reason not to use the safer style. Oversight in commit f828654e1. Back-patch to 9.6 where that came in. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0645dacc371da6169b06934e3bd238c5f770fe25">http://git.postgresql.org/pg/commitdiff/0645dacc371da6169b06934e3bd238c5f770fe25</a></li>

<li>Handle empty or all-blank PAGER setting more sanely in psql. If the PAGER environment variable is set but contains an empty string, psql would pass it to "sh" which would silently exit, causing whatever query output we were printing to vanish entirely. This is quite mystifying; it took a long time for us to figure out that this was the cause of Joseph Brenner's trouble report. Rather than allowing that to happen, we should treat this as another way to specify "no pager". (We could alternatively treat it as selecting the default pager, but it seems more likely that the former is what the user meant to achieve by setting PAGER this way.) Nonempty, but all-white-space, PAGER values have the same behavior, and it's pretty easy to test for that, so let's handle that case the same way. Most other cases of faulty PAGER values will result in the shell printing some kind of complaint to stderr, which should be enough to diagnose the problem, so we don't need to work harder than this. (Note that there's been an intentional decision not to be very chatty about apparent failure returns from the pager process, since that may happen if, eg, the user quits the pager with control-C or some such. I'd just as soon not start splitting hairs about which exit codes might merit making our own report.) libpq's old PQprint() function was already on board with ignoring empty PAGER values, but for consistency, make it ignore all-white-space values as well. It's been like this a long time, so back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CAFfgvXWLOE2novHzYjmQK8-J6TmHz42G8f3X0SORM44+stUGmw@mail.gmail.com">https://postgr.es/m/CAFfgvXWLOE2novHzYjmQK8-J6TmHz42G8f3X0SORM44+stUGmw@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/18f8f784cbbf96ef77eb8943b466b26605824c14">http://git.postgresql.org/pg/commitdiff/18f8f784cbbf96ef77eb8943b466b26605824c14</a></li>

<li>Restore psql's SIGPIPE setting if popen() fails. Ancient oversight in PageOutput(): if popen() fails, we'd better reset the SIGPIPE handler before returning stdout, because ClosePager() won't. Noticed while fixing the empty-PAGER issue. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b7e1ae2328f7d5a88d8916d78b4561d8ef16f99b">http://git.postgresql.org/pg/commitdiff/b7e1ae2328f7d5a88d8916d78b4561d8ef16f99b</a></li>

<li>Fix reporting of column typmods for multi-row VALUES constructs. expandRTE() and get_rte_attribute_type() reported the exprType() and exprTypmod() values of the expressions in the first row of the VALUES as being the column type/typmod returned by the VALUES RTE. That's fine for the data type, since we coerce all expressions in a column to have the same common type. But we don't coerce them to have a common typmod, so it was possible for rows after the first one to return values that violate the claimed column typmod. This leads to the incorrect result seen in bug #14448 from Hassan Mahmood, as well as some other corner-case misbehaviors. The desired behavior is the same as we use in other type-unification cases: report the common typmod if there is one, but otherwise return -1 indicating no particular constraint. It's cheap for transformValuesClause to determine the common typmod while transforming a multi-row VALUES, but it'd be less cheap for expandRTE() and get_rte_attribute_type() to re-determine that info every time they're asked --- possibly a lot less cheap, if the VALUES has many rows. Therefore, the best fix is to record the common typmods explicitly in a list in the VALUES RTE, as we were already doing for column collations. This looks quite a bit like what we're doing for CTE RTEs, so we can save a little bit of space and code by unifying the representation for those two RTE types. They both now share coltypes/coltypmods/colcollations fields. (At some point it might seem desirable to populate those fields for all RTE types; but right now it looks like constructing them for other RTE types would add more code and cycles than it would save.) The RTE change requires a catversion bump, so this fix is only usable in HEAD. If we fix this at all in the back branches, the patch will need to look quite different. Report: <a target="_blank" href="https://postgr.es/m/20161205143037.4377.60754@wrigleys.postgresql.org">https://postgr.es/m/20161205143037.4377.60754@wrigleys.postgresql.org</a> Discussion: <a target="_blank" href="https://postgr.es/m/27429.1480968538@sss.pgh.pa.us">https://postgr.es/m/27429.1480968538@sss.pgh.pa.us</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0b78106cd4651ad7867036a463ec743f6d3d2e86">http://git.postgresql.org/pg/commitdiff/0b78106cd4651ad7867036a463ec743f6d3d2e86</a></li>

<li>Be more careful about Python refcounts while creating exception objects. PLy_generate_spi_exceptions neglected to do Py_INCREF on the new exception objects, evidently supposing that PyModule_AddObject would do that --- but it doesn't. This left us in a situation where a Python garbage collection cycle could result in deletion of exception object(s), causing server crashes or wrong answers if the exception objects are used later in the session. In addition, PLy_generate_spi_exceptions didn't bother to test for a null result from PyErr_NewException, which at best is inconsistent with the code in PLy_add_exceptions. And PLy_add_exceptions, while it did do Py_INCREF on the exceptions it makes, waited to do that till after some PyModule_AddObject calls, creating a similar risk for failure if garbage collection happened within those calls. To fix, refactor to have just one piece of code that creates an exception object and adds it to the spiexceptions module, bumping the refcount first. Also, let's add an additional refcount to represent the pointer we're going to store in a C global variable or hash table. This should only matter if the user does something weird like delete the spiexceptions Python module, but lack of paranoia has caused us enough problems in PL/Python already. The fact that PyModule_AddObject doesn't do a Py_INCREF of its own explains the need for the Py_INCREF added in commit 4c966d920, so we can improve the comment about that; also, this means we really want to do that before not after the PyModule_AddObject call. The missing Py_INCREF in PLy_generate_spi_exceptions was reported and diagnosed by Rafa de la Torre; the other fixes by me. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/CA+Fz15kR1OXZv43mDrJb3XY+1MuQYWhx5kx3ea6BRKQp6ezGkg@mail.gmail.com">https://postgr.es/m/CA+Fz15kR1OXZv43mDrJb3XY+1MuQYWhx5kx3ea6BRKQp6ezGkg@mail.gmail.com</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9cda81f0056ca488dbd6cded64db1238aed816b2">http://git.postgresql.org/pg/commitdiff/9cda81f0056ca488dbd6cded64db1238aed816b2</a></li>

<li>Prevent crash when ts_rewrite() replaces a non-top-level subtree with null. When ts_rewrite()'s replacement argument is an empty tsquery, it's supposed to simplify any operator nodes whose operand(s) become NULL; but it failed to do that reliably, because dropvoidsubtree() only examined the top level of the result tree. Rather than make a second recursive pass, let's just give the responsibility to dofindsubquery() to simplify while it's doing the main replacement pass. Per report from Andreas Seltenreich. Artur Zakirov, with some cosmetic changes by me. Back-patch to all supported branches. Discussion: <a target="_blank" href="https://postgr.es/m/8737i01dew.fsf@credativ.de">https://postgr.es/m/8737i01dew.fsf@credativ.de</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0eaaaf00e296c2048b868b7c1d3c12c0eae6dd12">http://git.postgresql.org/pg/commitdiff/0eaaaf00e296c2048b868b7c1d3c12c0eae6dd12</a></li>

</ul>

<p>Stephen Frost pushed:</p>

<ul>

<li>Bump catversion for restrictive RLS changes. Mea culpa. Pointed out by Andres. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb9dcbc1eebd8cccf98d7236b2c9bb82caf8b45d">http://git.postgresql.org/pg/commitdiff/cb9dcbc1eebd8cccf98d7236b2c9bb82caf8b45d</a></li>

<li>Add support for restrictive RLS policies. We have had support for restrictive RLS policies since 9.5, but they were only available through extensions which use the appropriate hooks. This adds support into the grammer, catalog, psql and pg_dump for restrictive RLS policies, thus reducing the cases where an extension is necessary. In passing, also move away from using "AND"d and "OR"d in comments. As pointed out by Alvaro, it's not really appropriate to attempt to make verbs out of "AND" and "OR", so reword those comments which attempted to. Reviewed By: Jeevan Chalke, Dean Rasheed Discussion: <a target="_blank" href="https://postgr.es/m/20160901063404.GY4028@tamriel.snowman.net">https://postgr.es/m/20160901063404.GY4028@tamriel.snowman.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/093129c9d9fc231649b3cc27b8086443ccbbbc22">http://git.postgresql.org/pg/commitdiff/093129c9d9fc231649b3cc27b8086443ccbbbc22</a></li>

<li>Silence compiler warnings. Rearrange a bit of code to ensure that 'mode' in LWLockRelease is obviously always set, which seems a bit cleaner and avoids a compiler warning (thanks to Robert for the suggestion!). In GetCachedPlan(), initialize 'plan' to silence a compiler warning, but also add an Assert() to make sure we don't ever actually fall through with 'plan' still being set to NULL, since we are about to dereference it. Neither of these appear to be live bugs but at least gcc 5.4.0-6ubuntu1~16.04.4 doesn't quite have the smarts to realize that. Discussion: <a target="_blank" href="https://www.postgresql.org/message-id/20161129152102.GR13284%40tamriel.snowman.net">https://www.postgresql.org/message-id/20161129152102.GR13284%40tamriel.snowman.net</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d97b14ddab2059e1d73c0cd17f26bac4ef13e682">http://git.postgresql.org/pg/commitdiff/d97b14ddab2059e1d73c0cd17f26bac4ef13e682</a></li>

<li>Use "%option prefix" to set API names in ecpg's lexer. Clean up some technical debt left behind by commit 72b1e3a21: instead of quickly hacking the name of base_yylex() with a #define, set it properly with "%option prefix". This causes the names of pgc.l's other exported symbols to change as well, so run around and modify the outside references to them as needed. Similarly, make pgc.l's external references to base_yylval use that variable's true name instead of a macro. The reason for doing this now is that the quick-hack solution will fail with future versions of flex, as reported by &ETH;&rdquo;&ETH;&cedil;&ETH;&raquo;&Ntilde;&ETH;&frac12; &ETH;&Yuml;&ETH;&deg;&ETH;&raquo;&ETH;&deg;&Ntilde;&fnof;&ETH;&middot;&ETH;&frac34;&ETH;&sup2;. Hence, back-patch into 9.6 where the previous commit appeared, since it's likely people will build 9.6 with newer flex versions during its lifetime. Discussion: <a target="_blank" href="https://postgr.es/m/d845c1af-e18d-6651-178f-9f08cdf37e10@aegee.org">https://postgr.es/m/d845c1af-e18d-6651-178f-9f08cdf37e10@aegee.org</a> <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92fb649837e36944bd0e9eed6c90b4b01b7deb18">http://git.postgresql.org/pg/commitdiff/92fb649837e36944bd0e9eed6c90b4b01b7deb18</a></li>

</ul>

<p>&Atilde;lvaro Herrera pushed:</p>

<ul>

<li>Fix crasher bug in array_position(s) array_position and its cousin array_positions were caching the element type equality function's FmgrInfo without being careful enough to put it in a long-lived context. This is obviously broken but it didn't matter in most cases; only when using arrays of records (involving record_eq) it becomes a problem. The fix is to ensure that the type's equality function's FmgrInfo is cached in the array_position's flinfo-&gt;fn_mcxt rather than the current memory context. Apart from record types, the only other case that seems complex enough to possibly cause the same problem are range types. I didn't find a way to reproduce the problem with those, so I only include the test case submitted with the bug report as regression test. Bug report and patch: Junseok Yang Discussion: <a target="_blank" href="https://postgr.es/m/CAE+byMupUURYiZ6bKYgMZb9pgV1CYAijJGqWj-90W=nS7uEOeA@mail.gmail.com">https://postgr.es/m/CAE+byMupUURYiZ6bKYgMZb9pgV1CYAijJGqWj-90W=nS7uEOeA@mail.gmail.com</a> Backpatch to 9.5, where array_position appeared. <a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a73491e5fee88f5db70d69e81fa45060b6ed3682">http://git.postgresql.org/pg/commitdiff/a73491e5fee88f5db70d69e81fa45060b6ed3682</a></li>

</ul>

<h2>Correctifs en attente</h2>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to enable SIGHUP to reload SSL certificates.</p>

<p>Amit Kapila sent in another revision of a patch to enable write-ahead logging (WAL) for hash indexes.</p>

<p>KaiGai Kohei sent in another revision of a patch to pass down limit bounds for ForeignScan and CustomScan.</p>

<p>Pavel St&Auml;&rsaquo;hule and &Atilde;lvaro Herrera traded patches to add xmltable().</p>

<p>Micha&Atilde;&laquo;l Paquier sent in three more revisions of a patch to fix a pgcrypto compilation error caused by stack-allocated EVP_CIPHER_CTX.</p>

<p>Kyotaro HORIGUCHI sent in a patch to change the type for map files not to be void * any more, and in passing clean up convutils.pm.</p>

<p>Masahiko Sawada sent in a patch to reduce the maximum autovacuum_vacuum and analyze_scale_factor from 100 to 1.</p>

<p>Mithun Cy sent in a patch to fix an issue with SSL vs. multi-host URLs in libpq.</p>

<p>Mithun Cy sent in another revision of a patch to cache hash index meta pages.</p>

<p>Andres Freund sent in a WIP patch to use, among other techniques, JIT compilation, to speed up expression processing and tuple deforming.</p>

<p>Craig Ringer sent in another revision of a patch to enable logical decoding on standby.</p>

<p>Rahila Syed sent in a patch to assign valid collations for SET operations on queries with UNKNOWN types.</p>

<p>Heikki Linnakangas sent in a flock of patches to create the infrastructure for, and implement, SCRAM auth.</p>

<p>Gilles Darold and Karl O. Pinc traded patches to implement pg_current_logfile().</p>

<p>Peter Moser sent in another revision of a patch to implement temporal query processing with range types.</p>

<p>Stephen Frost sent in a patch to fix some infelicities between pg_dump and both TRANSFORMs and CASTs.</p>

<p>Micha&Atilde;&laquo;l Paquier sent in another revision of a patch to fix how unlogged tables are cleaned up.</p>

<p>Etsuro Fujita sent in another revision of a patch to push more FULL JOINs down when using foreign data wrappers.</p>

<p>Aleksander Alekseev sent in two revisions of a patch to clarify some code by using pg_str_containsonly.</p>

<p>Ashutosh Sharma sent in a patch to fix a bug that cause pldebugger to hang.</p>

<p>Peter Eisentraut and Petr Jel&Atilde;&shy;nek traded patches to support logical replication in core.</p>

<p>Masahiko Sawada sent in another revision of a patch to implement quorum commit for multiple synchronous replication.</p>

<p>Amit Langote sent in a patch to document the behavior of UPDATE and DELETE under built-in partitioning.</p>

<p>Fabr&Atilde;&shy;zio de Royes Mello sent in a patch to fix a breakage of psql's \d when connecting to older versions of PostgreSQL.</p>

<p>Peter Geoghegan sent in a patch to remove should_free tuplesort routine arguments, avoid copying within tuplesort_gettupleslot(), and add valgrind suppression for logtape_write.</p>

<p>Dilip Kumar sent in a patch to implement parallel merge join.</p>

<p>Amit Kapila sent in a patch to fix some issues in hash indexes.</p>

<p>Tom Lane sent in a patch to back-patch use of unnamed POSIX semaphores for Linux.</p>

<p>Petr Jel&Atilde;&shy;nek sent in a patch to skip unnecessary snapshot builds.</p>

<p>Pavel St&Auml;&rsaquo;hule sent in a patch to add \gstore \gstore_binary to psql.</p>

<p>Mateusz Stefek sent in a patch to optimize index-only scans with filter conditions.</p>