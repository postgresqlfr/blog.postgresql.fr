---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 mai 2012"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2012/05/07/Nouvelles-hebdomadaires-de-PostgreSQL-6-mai-2012"
---


<p>La conf&eacute;rence <em>PostgreSQL China 2012</em> aura lieu du 14 au 17 juin &agrave; P&eacute;kin&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Pgconfchina2012">http://wiki.postgresql.org/wiki/Pgconfchina2012</a></p>

<p>PostgreSQL Magazine #01 est dans les bacs&nbsp;: 

<a target="_blank" href="http://pgmag.org/01/">http://pgmag.org/01/</a></p>

<p>Le PUG turque organise la deuxi&egrave;me PgConf turque &agrave; Istanbul le 12 mai 2012. Pr&eacute;sentation d'ouverture par Magnus Hagander. Inscription gratuite&nbsp;: 

<a target="_blank" href="http://pgday.PostgreSQL.org.tr/2012/">http://pgday.PostgreSQL.org.tr/2012/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>ODB 2.0.0, un ORM pour le C++ compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.codesynthesis.com/pipermail/odb-announcements/2012/000013.html">http://www.codesynthesis.com/pipermail/odb-announcements/2012/000013.html</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2012-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2012-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La <em>PGCon 2012</em> sera tenue &agrave; l'Universit&eacute; d'Ottawa, les 17 et 18 mai 2012. Elle sera pr&eacute;c&eacute;d&eacute;e par deux jours de tutoriels les 15 &amp; 16 mai 2012&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2012/">http://www.pgcon.org/2012/</a></li>

<li>Le <em>PGDay France</em> aura lieu &agrave; Lyon, le 7 juin 2012&nbsp;: 

<a target="_blank" href="http://www.pgday.fr">http://www.pgday.fr</a></li>

<li>La <em>PostgreSQL Conference Europe</em> 2012 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, du 23 au 26 octobre. L'appel &agrave; sponsors est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2012.pgconf.eu/">http://2012.pgconf.eu/</a></li>

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

<p>(<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2012-05/msg00003.php">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add comments suggesting usage of git_changelog to generate release notes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f33fe47a9169eec692b80c17ea47bd2f9c261aaf">http://git.postgresql.org/pg/commitdiff/f33fe47a9169eec692b80c17ea47bd2f9c261aaf</a></li>

<li>Mark git_changelog examples with the proper executable names. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7490c48f1e2c51dce77d33f7fd464e72713679a5">http://git.postgresql.org/pg/commitdiff/7490c48f1e2c51dce77d33f7fd464e72713679a5</a></li>

<li>Remove BSD/OS (BSDi) port. There are no known users upgrading to Postgres 9.2, and perhaps no existing users either. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ebcaa5fcde8411786e3765414465174e6d31c8e6">http://git.postgresql.org/pg/commitdiff/ebcaa5fcde8411786e3765414465174e6d31c8e6</a></li>

<li>Fix psql doc typo. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/768c3affd44d1dcb4e43e2e006c642524714c2a4">http://git.postgresql.org/pg/commitdiff/768c3affd44d1dcb4e43e2e006c642524714c2a4</a></li>

<li>Revert typo fix 768c3affd44d1dcb4e43e2e006c642524714c2a4; I was wrong. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0a3a674b98ebb47e2f4b539a0e284744a7871987">http://git.postgresql.org/pg/commitdiff/0a3a674b98ebb47e2f4b539a0e284744a7871987</a></li>

<li>Document that it is the pgsql version we are matching for psqlrc version-specific files, not the server version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65b110703b798cdbfa568aa3583caba0ed51b33a">http://git.postgresql.org/pg/commitdiff/65b110703b798cdbfa568aa3583caba0ed51b33a</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove duplicate word in comment. Noted by Peter Geoghegan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d2235a25bc71848c18f551f992b3eed8cec2399">http://git.postgresql.org/pg/commitdiff/0d2235a25bc71848c18f551f992b3eed8cec2399</a></li>

<li>Tweak psql to print row counts when \x auto chooses non-expanded output. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9b7a84f2a45322b21b86eb180a869d1ed2937b85">http://git.postgresql.org/pg/commitdiff/9b7a84f2a45322b21b86eb180a869d1ed2937b85</a></li>

<li>More duplicate word removal. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e01e66f808fbd161b2714eab34bb9e9d0db0db53">http://git.postgresql.org/pg/commitdiff/e01e66f808fbd161b2714eab34bb9e9d0db0db53</a></li>

<li>Further corrections from the department of redundancy department. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1b4998fd44bad9f8ab90e741cadd6519f6c94a44">http://git.postgresql.org/pg/commitdiff/1b4998fd44bad9f8ab90e741cadd6519f6c94a44</a></li>

<li>Avoid repeated CLOG access from heap_hot_search_buffer. At the time we check whether the tuple is dead to all running transactions, we've already verified that it isn't visible to our scan, setting hint bits if appropriate. So there's no need to recheck CLOG for the all-dead test we do just a moment later. So, add HeapTupleIsSurelyDead() to test the appropriate condition under the assumption that all relevant hit bits are already set. Review by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/003811042139790a5a479c8264271a3248eda36f">http://git.postgresql.org/pg/commitdiff/003811042139790a5a479c8264271a3248eda36f</a></li>

<li>Add missing parenthesis in comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e0c5195dff70ffc9c132716d0cf7f3eff45e302">http://git.postgresql.org/pg/commitdiff/8e0c5195dff70ffc9c132716d0cf7f3eff45e302</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Mark ReThrowError() with attribute noreturn. All related functions were already so marked. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/26471a51fc833e2ce58a2f16f891256d57dd28c6">http://git.postgresql.org/pg/commitdiff/26471a51fc833e2ce58a2f16f891256d57dd28c6</a></li>

<li>Improve markup of cmdsynopsis elements. Add more markup in particular so that the command options appear consistently in monospace in the HTML output. On the vacuumdb reference page, remove listing all the possible options in the synopsis. They have become too many now; we have the detailed options list for that. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4266509c577b089627930af39f1dcd2d06b493e9">http://git.postgresql.org/pg/commitdiff/4266509c577b089627930af39f1dcd2d06b493e9</a></li>

<li>Fix display of &lt;command&gt; elements on man pages. We had changed this from the default bold to monospace for all output formats, but for man pages, this creates visual inconsistencies, so revert to the default for man pages. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61c84b47619c11e74089cb3160813a4b3c98e6d7">http://git.postgresql.org/pg/commitdiff/61c84b47619c11e74089cb3160813a4b3c98e6d7</a></li>

<li>Remove dead ports. Remove the following ports: dgux, nextstep, sunos4, svr4, ultrix4, and univel. These are obsolete and not worth rescuing. In most cases, there is circumstantial evidence that they wouldn't work anymore anyway. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2f9439fbfba378cb64cd6e5a046e0184cd542c6">http://git.postgresql.org/pg/commitdiff/f2f9439fbfba378cb64cd6e5a046e0184cd542c6</a></li>

<li>Even more duplicate word removal, in the spirit of the season 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9605a039b60350003daf8a5b3c0c10993994b60">http://git.postgresql.org/pg/commitdiff/e9605a039b60350003daf8a5b3c0c10993994b60</a></li>

<li>PL/Python: Fix crash in functions returning SETOF and using SPI. Allocate PLyResultObject.tupdesc in TopMemoryContext, because its lifetime is the lifetime of the Python object and it shouldn't be freed by some other memory context, such as one controlled by SPI. We trust that the Python object will clean up its own memory. Before, this would crash the included regression test case by trying to use memory that was already freed. reported by Asif Naeem, analysis by Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52aa334fcd5a9d230be7e8fb964d94c6c4e63dc7">http://git.postgresql.org/pg/commitdiff/52aa334fcd5a9d230be7e8fb964d94c6c4e63dc7</a></li>

<li>doc: Fix for too many brackets in command synopses on man pages. The default for the choice attribute of the &lt;arg&gt; element is "opt", which would normally put the argument inside brackets. But the DSSSL stylesheets contain a hack that treats &lt;arg&gt; directly inside &lt;group&gt; specially, so that &lt;group&gt;&lt;arg&gt;-x&lt;/arg&gt;&lt;arg&gt;-y&lt;/arg&gt;&lt;/group&gt; comes out as [ -x | -y ] rather than [ [-x] | [-y] ], which it would technically be. But when building man pages, this doesn't work, and so the command synopses on the man pages contain lots of extra brackets. By putting choice="opt" or choice="plain" explicitly on every &lt;arg&gt; and &lt;group&gt; element, we avoid any toolchain dependencies like that, and it also makes it clearer in the source code what is meant. In passing, make some small corrections in the documentation about which arguments are really optional or not. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1715ff112809bca5218ddb6eccfda2c20dc420b5">http://git.postgresql.org/pg/commitdiff/1715ff112809bca5218ddb6eccfda2c20dc420b5</a></li>

<li>PL/Python: Improve test coverage. Add test cases for inline handler of plython2u (when using that language name), and for result object element assignment. There is now at least one test case for every top-level functionality, except plpy.Fatal (annoying to use in regression tests) and result object slice retrieval and slice assignment (which are somewhat broken). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e6c2e8cb87846161033e1f215876c4b95f631df0">http://git.postgresql.org/pg/commitdiff/e6c2e8cb87846161033e1f215876c4b95f631df0</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Converge all SQL-level statistics timing values to float8 milliseconds. This patch adjusts the core statistics views to match the decision already taken for pg_stat_statements, that values representing elapsed time should be represented as float8 and measured in milliseconds. By using float8, we are no longer tied to a specific maximum precision of timing data. (Internally, it's still microseconds, but we could now change that without needing changes at the SQL level.) The columns affected are pg_stat_bgwriter.checkpoint_write_time, pg_stat_bgwriter.checkpoint_sync_time, pg_stat_database.blk_read_time, pg_stat_database.blk_write_time, pg_stat_user_functions.total_time, pg_stat_user_functions.self_time, pg_stat_xact_user_functions.total_time, and pg_stat_xact_user_functions.self_time. The first four of these are new in 9.2, so there is no compatibility issue from changing them. The others require a release note comment that they are now double precision (and can show a fractional part) rather than bigint as before; also their underlying statistics functions now match the column definitions, instead of returning bigint microseconds. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/809e7e21af8cd24855f1802524a13bbaa823f929">http://git.postgresql.org/pg/commitdiff/809e7e21af8cd24855f1802524a13bbaa823f929</a></li>

<li>Kill some remaining references to SVR4 and univel. Both terms still appear in a few places, but I thought it best to leave those alone in context. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/50c2d6a1a63f04fd8c4553fc696c2c9e235b1a25">http://git.postgresql.org/pg/commitdiff/50c2d6a1a63f04fd8c4553fc696c2c9e235b1a25</a></li>

<li>Overdue code review for transaction-level advisory locks patch. Commit 62c7bd31c8878dd45c9b9b2429ab7a12103f3590 had assorted problems, most visibly that it broke PREPARE TRANSACTION in the presence of session-level advisory locks (which should be ignored by PREPARE), as per a recent complaint from Stephen Rees. More abstractly, the patch made the LockMethodData.transactional flag not merely useless but outright dangerous, because in point of fact that flag no longer tells you anything at all about whether a lock is held transactionally. This fix therefore removes that flag altogether. We now rely entirely on the convention already in use in lock.c that transactional lock holds must be owned by some ResourceOwner, while session holds are never so owned. Setting the locallock struct's owner link to NULL thus denotes a session hold, and there is no redundant marker for that. PREPARE TRANSACTION now works again when there are session-level advisory locks, and it is also able to transfer transactional advisory locks to the prepared transaction, but for implementation reasons it throws an error if we hold both types of lock on a single lockable object. Perhaps it will be worth improving that someday. Assorted other minor cleanup and documentation editing, as well. Back-patch to 9.1, except that in the 9.1 branch I did not remove the LockMethodData.transactional flag for fear of causing an ABI break for any external code that might be examining those structs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/71b9549d053b2f0a9e76e829c917385841f84bee">http://git.postgresql.org/pg/commitdiff/71b9549d053b2f0a9e76e829c917385841f84bee</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove duplicate words in comments. Found these with grep -r "for for ". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f291ccd43e06fdd7c55102975a0b2f38bc140b90">http://git.postgresql.org/pg/commitdiff/f291ccd43e06fdd7c55102975a0b2f38bc140b90</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove link to ODBCng project from the docs. This backatches Heikki's patch in 140a4fbf1a87891a79a2c61a08416828d39f286a to make sure the documentation on the website gets updated, since we're regularly receiving complains about this link. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6d362ec209f0174f36a78936c5269f8d5f2cd26e">http://git.postgresql.org/pg/commitdiff/6d362ec209f0174f36a78936c5269f8d5f2cd26e</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Ryan Kelly sent in another revision of the patch to allow breaking out of hung connection attempts in libpq.</li>

<li>Noah Misch sent in a patch to prevent a theoretical torn page hazard in ginRedoUpdateMetapage().</li>

<li>Pavel Stehule sent in a patch to add new error fields to PL/pgsql.</li>

<li>Laurenz Albe sent in another revision of the patch to analyze foreign tables which gets the FDW to show that a value was non-NULL but removed due to excess width by returning a value of length WIDTH_THRESHOLD+1.</li>

<li>Peter Geoghegan sent in two revisions of a patch to latch up the WAL Writer, reducing wake-ups and thus saving electricity in a way that is more-or-less analogous to his previous work on the BGWriter.</li>

<li>Magnus Hagander sent in a patch to reduce the number of "Unexpected EOF on client connection" messages clogging people's logs.</li>

<li>Jan Urbanski sent in a patch to fix an issue with PL/PythonU where result set slicing was broken in the Python3 case.</li>

</ul>