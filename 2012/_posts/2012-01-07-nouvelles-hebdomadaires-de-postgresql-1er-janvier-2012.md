---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er janvier 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/01/07/Nouvelles-hebdomadaires-de-PostgreSQL-1er-janvier-2012"
---


<p>Bonne Ann&eacute;e de la part des Nouvelles Hebdomadaires de PostgreSQL&nbsp;!</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>AnyDAC for Delphi v 5.0.5&nbsp;: 

<a target="_blank" href="http://www.da-soft.com/anydac/anydac-for-delphi-v-5.0.5.2073-released.html">http://www.da-soft.com/anydac/anydac-for-delphi-v-5.0.5.2073-released.html</a></li>

<li>psqlODBC 09.01.0100&nbsp;: 

<a target="_blank" href="http://psqlodbc.projects.postgresql.org/release.html">http://psqlodbc.projects.postgresql.org/release.html</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me conf&eacute;rence annuelle "<em>Prague PostgreSQL Developers Day</em>", organis&eacute;e pas le CSPUG (PUG Tch&egrave;que &amp; Slovaque), aura lieu le 9 f&eacute;vrier 2012 &agrave; Prague. L'appel &agrave; conf&eacute;renciers est lanc&eacute;. Merci d'envoyer vos propositions, incluant le sujet, une estimation de la dur&eacute;e et vos coordonn&eacute;es &agrave; l'adresse info CHEZ p2d2 POINT cz.</li>

<li>L'appel &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute; pour le FLOSS UK, programm&eacute; du 20 au 22 mars 2012 &agrave; Edimbourg. La date limite de d&eacute;p&ocirc;t des candidatures est fix&eacute;e au 18 novembre 2011 et les conf&eacute;renciers s&eacute;lectionn&eacute;s seront inform&eacute;s avant le 25 novembre. Les propositions sont &agrave; envoyer &agrave; postgresql2012 AT flossuk POINT org. Plus d'informations via le lien suivant&nbsp;: 

<a target="_blank" href="http://www.flossuk.org/Events/Spring2012">http://www.flossuk.org/Events/Spring2012</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-01/msg00000.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Minor enhancements to MVCC chapter. Author: Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7db101c36ef7c998cfcf3f4a324c58c23f88927c">http://git.postgresql.org/pg/commitdiff/7db101c36ef7c998cfcf3f4a324c58c23f88927c</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Sort file list when creating gettext-files. That way, the created .pot file is more deterministic and not dependent on the order in which the files are found. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9099d84374eb71860dc881c7a158f8f1262b5734">http://git.postgresql.org/pg/commitdiff/9099d84374eb71860dc881c7a158f8f1262b5734</a></li>

<li>Sort compendium lists for msgmerge. That way, the result of a msgmerge is more deterministic and not dependent on the order in which the files are found. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/54d792f3e5a31d993aeee420e98adab0a0419e43">http://git.postgresql.org/pg/commitdiff/54d792f3e5a31d993aeee420e98adab0a0419e43</a></li>

<li>Run "make all" as a prerequisite of "make check". This is the standard behavior but was forgotten in some places. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c317a3ac167d36244e8dd5add679b4e9ff36ea16">http://git.postgresql.org/pg/commitdiff/c317a3ac167d36244e8dd5add679b4e9ff36ea16</a></li>

<li>Remove support for on_exit(). All supported platforms support the C89 standard function atexit() (SunOS 4 probably being the last one not to), and supporting both makes the code clumsy. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d383c23f6fbc4a79dae66483cf4f7051121008ad">http://git.postgresql.org/pg/commitdiff/d383c23f6fbc4a79dae66483cf4f7051121008ad</a></li>

<li>Standardize treatment of strcmp() return value. Always compare the return value to 0, don't use cute tricks like if (!strcmp(...)). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/037a82704ce644e2b1c3946345b54444caddb1a5">http://git.postgresql.org/pg/commitdiff/037a82704ce644e2b1c3946345b54444caddb1a5</a></li>

<li>Indicate default format in --help output of pg_dump and pg_basebackup 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66843265eed40d181066f408f0d35e7ac639eb96">http://git.postgresql.org/pg/commitdiff/66843265eed40d181066f408f0d35e7ac639eb96</a></li>

<li>pg_dump: Dump user mappings ordered by user name This is to get a deterministic dump order independent of the order in which the user mappings were created. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a671d9409bfeac9ec5a622d74519fd1142a47274">http://git.postgresql.org/pg/commitdiff/a671d9409bfeac9ec5a622d74519fd1142a47274</a></li>

<li>PL/Python: Add argument names to function declarations. For easier source reading 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9de1e9a96a8e63bd4d3b9e615abd9cf6d8de703">http://git.postgresql.org/pg/commitdiff/f9de1e9a96a8e63bd4d3b9e615abd9cf6d8de703</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust SP-GiST regression tests to be less locale-sensitive. The original test cases gave varying results depending on whether the locale sorts digits before or after letters. Since that's not really what we wish to test here, adjust the test data to not contain any strings beginning with digits. Per report from Pavel Stehule. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/15ba590792045a6bbde538c407a34d83f46b496f">http://git.postgresql.org/pg/commitdiff/15ba590792045a6bbde538c407a34d83f46b496f</a></li>

<li>Revert "Remove troublesome Asserts in cost_mergejoin()." This reverts commit ff68b256a533b398e3420750f34d161aeee4e099. The recent change to use -fexcess-precision=standard should make those Asserts safe, and does fix a test case that formerly crashed for me, so I think there's no need to have a cross-version difference in the code here. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ae2e9c00798685cd75ea0cc5120466bf2027b90">http://git.postgresql.org/pg/commitdiff/2ae2e9c00798685cd75ea0cc5120466bf2027b90</a></li>

<li>Use mutex hint bit in PPC LWARX instructions, where possible. The hint bit makes for a small but measurable performance improvement in access to contended spinlocks. On the other hand, some PPC chips give an illegal-instruction failure. There doesn't seem to be a completely bulletproof way to tell whether the hint bit will cause an illegal-instruction failure other than by trying it; but most if not all 64-bit PPC machines should accept it, so follow the Linux kernel's lead and assume it's okay to use it in 64-bit builds. Of course we must also check whether the assembler accepts the command, since even with a recent CPU the toolchain could be old. Patch by Manabu Ori, significantly modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5cfa8dd3007d7e953c6a03b0fa2215d97c581b0c">http://git.postgresql.org/pg/commitdiff/5cfa8dd3007d7e953c6a03b0fa2215d97c581b0c</a></li>

<li>Use 4-byte slock_t on both PPC and PPC64. Previously we defined slock_t as 8 bytes on PPC64, but the TAS assembly code uses word-wide operations regardless, so that the second word was just wasted space. There doesn't appear to be any performance benefit in adding the second word, so get rid of it to simplify the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8496c6cd77e2f5f105fc47315680174157d66647">http://git.postgresql.org/pg/commitdiff/8496c6cd77e2f5f105fc47315680174157d66647</a></li>

<li>Use LWSYNC in place of SYNC/ISYNC in PPC spinlocks, where possible. This is allegedly a win, at least on some PPC implementations, according to the PPC ISA documents. However, as with LWARX hints, some PPC platforms give an illegal-instruction failure. Use the same trick as before of assuming that PPC64 platforms will accept it; we might need to refine that based on experience, but there are other projects doing likewise according to google. I did not add an assembler compatibility test because LWSYNC has been around much longer than hint bits, and it seems unlikely that any toolchains currently in use don't recognize it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/631beeac3598a73dee2c2afa38fa2e734148031b">http://git.postgresql.org/pg/commitdiff/631beeac3598a73dee2c2afa38fa2e734148031b</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Modify tools/pgtest to run the 'make' command from a variable, and default to 'make' rather than 'gmake' for the binary name. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/dca0a54717a8372cc88b0c187965a1add19ec7e3">http://git.postgresql.org/pg/commitdiff/dca0a54717a8372cc88b0c187965a1add19ec7e3</a></li>

<li>Fix Perl copyright script to skip .git subdirectory; running it on those files corrupts the index. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9f60880207c6c7d00a2e4e4d904ef720de58f45b">http://git.postgresql.org/pg/commitdiff/9f60880207c6c7d00a2e4e4d904ef720de58f45b</a></li>

<li>Don't use tabs in Perl scripts, for consistency. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6ba139dc5a8a5cce42f0508c14a8b42f4fb6b1cc">http://git.postgresql.org/pg/commitdiff/6ba139dc5a8a5cce42f0508c14a8b42f4fb6b1cc</a></li>

<li>Update copyright notices for year 2012. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e126958c2efdfc2d60b978d1fc7a780ff647e8ad">http://git.postgresql.org/pg/commitdiff/e126958c2efdfc2d60b978d1fc7a780ff647e8ad</a></li>

<li>Skip 'ico' and 'bin' extensions in copyright changes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f4cd747a4d760600ec9791a95957e993c320ba63">http://git.postgresql.org/pg/commitdiff/f4cd747a4d760600ec9791a95957e993c320ba63</a></li>

<li>Revert binary change in copyright year adjustment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1358801b7a7afed840b780d7c52e20921a483ed1">http://git.postgresql.org/pg/commitdiff/1358801b7a7afed840b780d7c52e20921a483ed1</a></li>

<li>Skip any .git directory for copyright changes, not just top-level .git directories. Per suggestion from Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bed762c81e6a7f62695d6c8acb78f15c8e85342e">http://git.postgresql.org/pg/commitdiff/bed762c81e6a7f62695d6c8acb78f15c8e85342e</a></li>

<li>Update copyright git skip comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b6137e4efebcd767a349099b3e048fbc7755cca">http://git.postgresql.org/pg/commitdiff/6b6137e4efebcd767a349099b3e048fbc7755cca</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Send new protocol keepalive messages to standby servers. Allows streaming replication users to calculate transfer latency and apply delay via internal functions. No external functions yet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64233902d22ba42846397cb7551894217522fad4">http://git.postgresql.org/pg/commitdiff/64233902d22ba42846397cb7551894217522fad4</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Simon Riggs sent in two more revisions of the patch to add page checksums.</li>

<li>Alexander Bj&ouml;rnhagen sent in two more revisions of the patch to tune synchronous replication.</li>

<li>Brar Piening sent in two more revisions of the patches to support VS 2010.</li>

<li>Andrew Dunstan sent in another revision of the patch to make pretty-printing view definitions actually print them in a pretty way.</li>

<li>Peter Eisentraut sent in a patch to fix an infelicity in CREATE TABLE ... LIKE.</li>

<li>Peter Eisentraut sent in a patch to make the dumping of FOREIGN ... OPTIONS more legible.</li>

<li>Simon Riggs sent in another revision of the patch to pause at the end of recovery.</li>

<li>Peter Geoghegan sent in another revision of the fast path sorting patch, along with some benchmarks demonstrating its usefulness.</li>

<li>Simon Riggs sent in a patch to implement DROP INDEX CONCURRENTLY.</li>

<li>Noah Misch sent in a patch to add protransform functions to the length coercions for numeric, varbit, timestamp, timestamptz, time, timetz and interval. This prevents whole-table rewrites in some ALTER TABLE ... ALTER COLUMN ... TYPE ... statements involving the aforementioned types.</li>

<li>Noah Misch sent in another revision of the patch to collect frequency statistics for arrays.</li>

<li>Zoltan Boszormenyi sent in another revision of the patch to fix ECPG cursor readahead.</li>

<li>Pavel Stehule sent in another revision of the CHECK FUNCTION patch.</li>

<li>Peter Eisentraut sent in a WIP patch intended to inform the information schema about default privileges.</li>

<li>Peter Eisentraut sent in a WIP patch to relax the requirement that PL/pgsql trigger functions return a value when called in AFTER triggers.</li>

<li>Peter Eisentraut sent in a patch to fix the sorting of operators in pg_dump.</li>

</ul>