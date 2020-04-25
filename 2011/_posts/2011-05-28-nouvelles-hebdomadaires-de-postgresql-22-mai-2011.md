---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 mai 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/05/28/Nouvelles-hebdomadaires-de-PostgreSQL-22-mai-2011"
---


<p>La premi&egrave;re <em>CommitFest</em> du cycle 9.2 d&eacute;butera le 15 juin 2011, mais vous n'&ecirc;tes pas oblig&eacute;s d'attendre jusque l&agrave; pour relire un patch&nbsp;: 

<a target="_blank" href="http://commitfest.postgresql.org/">http://commitfest.postgresql.org/</a></p>

<p>PostgreSQL Magazine #00 a &eacute;t&eacute; publi&eacute;. Vous pouvez le t&eacute;l&eacute;charger, le consulter en ligne ou en acheter une copie papier via 

<a target="_blank" href="http://pgmag.org/">http://pgmag.org/</a> Et n'oubliez pas de transmettre votre avis &agrave; contact AT pgmag POINT org&nbsp;!</p>

<p>Postgres Open 2011, conf&eacute;rence ayant pour th&egrave;me les "&eacute;volutions brutales dans l'industrie de la base de donn&eacute;es", aura lieu du 14 au 16 septembre 2011 &agrave; Chicago (Illinois, &Eacute;tats-Unis) &agrave; l'h&ocirc;tel "<em>Westin Michigan Avenue</em>"&nbsp;: 

<a target="_blank" href="http://postgresopen.org">http://postgresopen.org</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Pyrseas 0.2.0, un ensemble d'outils pour la gestion de version dans PostgreSQL, publi&eacute; sur PGXN&nbsp;: 

<a target="_blank" href="http://pgxn.org/dist/pyrseas/">http://pgxn.org/dist/pyrseas/</a></li>

<li>pg_matlab, un module qui permet l'ex&eacute;cution de code MATLAB dans PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.cybertec.at/en/postgresql_products/pg_matlab-matlab-postgresql-integration">http://www.cybertec.at/en/postgresql_products/pg_matlab-matlab-postgresql-integration</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en mai</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-05/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-05/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La PG Session 2, sur PostGIS, se tiendra &agrave; Paris le 23 juin. Le programme est disponible sur&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/2/">http://www.postgresql-sessions.org/en/2/</a></li>

<li>CHAR(11), la conf&eacute;rence PostgreSQL sur le <em>clustering</em>, la haute disponibilit&eacute; et la r&eacute;plication accepte &agrave; pr&eacute;sent les inscriptions et r&eacute;servations. Dates&nbsp;: 11 &amp; 12 juillet 2011 &agrave; Cambridge, Royaume-Uni&nbsp;: 

<a target="_blank" href="http://www.char11.org/">http://www.char11.org/</a></li>

<li>La "PgCon China" 2011 aura lieu &agrave; Guangzhou (Canton) les 15 &amp; 16 juillet 2011&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/Pgconchina2011">http://wiki.postgresql.org/wiki/Pgconchina2011</a></li>

<li>Le PDXPUG se chargera d'accueillir le PgDay, dimanche 24 juillet 2011, la veille de l'OSCON &agrave; Portland dans l'Oregon (&Eacute;tats-Unis). Plus de d&eacute;tails sur&nbsp;: 

<a target="_blank" href="http://pugs.postgresql.org/node/1663">http://pugs.postgresql.org/node/1663</a></li>

<li><em>PostgreSQL Conference West</em> (#PgWest) aura lieu du 27 au 30 septembre 2011 au centre des conventions de San Jose (Californie, &Eacute;tats-Unis)&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>La "<em>PostgreSQL Conference Europe 2011</em>" se tiendra &agrave; Amsterdam, du 18 au 21 octobre&nbsp;: 

<a target="_blank" href="http://2011.pgconf.eu/">http://2011.pgconf.eu/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110522">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add required psqldir setting for isolation checks. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/df15d11cb596fa69d7ffb27cf0b7b070c03ab381">http://git.postgresql.org/pg/commitdiff/df15d11cb596fa69d7ffb27cf0b7b070c03ab381</a></li>

<li>Quote isolationtester command name so Windows will not think dot is the command. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/78b66cff72d6f337a685355f7ccede1c518681b5">http://git.postgresql.org/pg/commitdiff/78b66cff72d6f337a685355f7ccede1c518681b5</a></li>

<li>Use the right psql for isolation tests. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b08ddf8c761cd596c4664dde1125f38a8757756f">http://git.postgresql.org/pg/commitdiff/b08ddf8c761cd596c4664dde1125f38a8757756f</a></li>

<li>Remove spurious underscore in name of isolation tester on MSVC. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a9b6519606a4a95ae8052f8414841d02bcfe4582">http://git.postgresql.org/pg/commitdiff/a9b6519606a4a95ae8052f8414841d02bcfe4582</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow pg_upgrade to honor libpq environment variables. Add 'local' checks for PGHOST and PGHOSTADDR. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c19bd96bc5139fabace94c5a0a5624fd9d8e986">http://git.postgresql.org/pg/commitdiff/6c19bd96bc5139fabace94c5a0a5624fd9d8e986</a></li>

<li>Add pg_upgrade check to make sure the user has full access permission in the current directory; if not, throw an error. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bda27e502fe9a3e9c54f065e4bc1315c3f2a57d7">http://git.postgresql.org/pg/commitdiff/bda27e502fe9a3e9c54f065e4bc1315c3f2a57d7</a></li>

<li>Remove redundant privilege doc sentences. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8a849cdee4dff3406a405e83e9504ebc52bbcfaa">http://git.postgresql.org/pg/commitdiff/8a849cdee4dff3406a405e83e9504ebc52bbcfaa</a></li>

<li>Update pg_upgrade directory check error message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e728701fb496ace7fa21fcce5c0ef7fc4c0ec78c">http://git.postgresql.org/pg/commitdiff/e728701fb496ace7fa21fcce5c0ef7fc4c0ec78c</a></li>

<li>Fix pg_upgrade build problem on Windows when using X_OK access permission check on the current directory. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6fbf4e0e7c0839c33ed2d63f3c64abdc049f6d1b">http://git.postgresql.org/pg/commitdiff/6fbf4e0e7c0839c33ed2d63f3c64abdc049f6d1b</a></li>

<li>Improve pg_upgrade X_OK comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/92ff91501846bd0343eea726d9ca83464cda07af">http://git.postgresql.org/pg/commitdiff/92ff91501846bd0343eea726d9ca83464cda07af</a></li>

<li>Improve pg_upgrade error reporting if the bin or data directories do not exist or are not directories. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/772a5f1e5b343d07e907ef7f36fa36d190d55912">http://git.postgresql.org/pg/commitdiff/772a5f1e5b343d07e907ef7f36fa36d190d55912</a></li>

<li>In pg_upgrade, clean up handling of invalid directory specification by checking the stat() errno value more strictly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f35944607f1ede7dbb1dc3283d955b96f04ea5e">http://git.postgresql.org/pg/commitdiff/1f35944607f1ede7dbb1dc3283d955b96f04ea5e</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pg_dump's handling of extension-member casts and languages. pg_dump has some heuristic rules for whether to dump casts and procedural languages, since it's not all that easy to distinguish built-in ones from user-defined ones. However, we should not apply those rules to objects that belong to an extension, but just use the perfectly well-defined rules for what to do with extension member objects. Otherwise we might mistakenly lose extension member objects during a binary upgrade (which is the only time that we'd want to dump extension members). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b3bc63efbc258874b06586aa7548fce37f3581e1">http://git.postgresql.org/pg/commitdiff/b3bc63efbc258874b06586aa7548fce37f3581e1</a></li>

<li>Make plpgsql provide the typmods for its variables to the main parser. Historically we didn't do this, even though we had the information, because plpgsql passed its Params via SPI APIs that only include type OIDs not typmods. Now that plpgsql uses parser callbacks to create Params, it's easy to insert the right typmod. This should generally result in lower surprise factors, because a plpgsql variable that is declared with a typmod will now work more like a table column with the same typmod. In particular it's the "right" way to fix bug #6020, in which plpgsql's attempt to return an anonymous record type is defeated by stricter record-type matching checks that were added in 9.0. However, it's not impossible that this could result in subtle behavioral changes that could break somebody's existing plpgsql code, so I'm afraid to back-patch this change into released branches. In those branches we'll have to lobotomize the record-type checks instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/219dfae4e1b0ca7cbc0b2f0f7740e01657964c07">http://git.postgresql.org/pg/commitdiff/219dfae4e1b0ca7cbc0b2f0f7740e01657964c07</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>/contrib/foo -&gt; contrib/foo Since contrib is a relative directory specification, a leading slash is inappropriate. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ee391b77a8aef3835a39ecc4856a9ab79936f56">http://git.postgresql.org/pg/commitdiff/0ee391b77a8aef3835a39ecc4856a9ab79936f56</a></li>

<li>Spell checking and markup refinement 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c13dc6402b6e99af9a8b7794e44d62deecafc745">http://git.postgresql.org/pg/commitdiff/c13dc6402b6e99af9a8b7794e44d62deecafc745</a></li>

<li>Remove obsolete comment 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a6a5c86db7362993a13b32bb0c02c956d94ff13">http://git.postgresql.org/pg/commitdiff/4a6a5c86db7362993a13b32bb0c02c956d94ff13</a></li>

<li>Consistent spacing for lengthy error messages. Also, we removed the display of the current value of max_connections/MaxBackends from some messages earlier, because it was confusing, so do that in the remaining one as well. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb46d42859f62d5fbe8a8b55690643cba65e106c">http://git.postgresql.org/pg/commitdiff/bb46d42859f62d5fbe8a8b55690643cba65e106c</a></li>

<li>Rename pg_dump --no-security-label to --no-security-labels Other similar options also use the plural form. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8e0c321194c985a13e7c7e4d3110ac032517350">http://git.postgresql.org/pg/commitdiff/c8e0c321194c985a13e7c7e4d3110ac032517350</a></li>

<li>Fix untranslatable assembly of libpq connection failure message. Even though this only affects the insertion of a parenthesized word, it's unwise to assume that parentheses can pass through untranslated. And in any case, the new version is clearer in the code and for translators. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fcd4575905608a6dd0868bd6ab99f3e06a743152">http://git.postgresql.org/pg/commitdiff/fcd4575905608a6dd0868bd6ab99f3e06a743152</a></li>

<li>Update config.guess and config.sub 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d8954938094744ef4cab9d6f45f8e9e8abeb58f">http://git.postgresql.org/pg/commitdiff/8d8954938094744ef4cab9d6f45f8e9e8abeb58f</a></li>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bcf63a51e3dbf7cdb70af03ed13e6984dee41ec0">http://git.postgresql.org/pg/commitdiff/bcf63a51e3dbf7cdb70af03ed13e6984dee41ec0</a></li>

<li>Message improvement 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8932e2810034c43daa07c6da914a4c5ba46f6bd6">http://git.postgresql.org/pg/commitdiff/8932e2810034c43daa07c6da914a4c5ba46f6bd6</a></li>

<li>Clarify the documentation of the --with-ossp-uuid option 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/51ad1784ccf9c2a72238a50a314771e34721f1d3">http://git.postgresql.org/pg/commitdiff/51ad1784ccf9c2a72238a50a314771e34721f1d3</a></li>

<li>Put documentation of backslash commands back in alphabetical order 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7920d033d8b580f00ede0628ee0b1c3a3f3c6b43">http://git.postgresql.org/pg/commitdiff/7920d033d8b580f00ede0628ee0b1c3a3f3c6b43</a></li>

<li>Message style improvements 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fae625e7b9824ec64f770904108089ff4fbcf093">http://git.postgresql.org/pg/commitdiff/fae625e7b9824ec64f770904108089ff4fbcf093</a></li>

<li>Put lists in sensible order 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60497722ac6d69d8ff82fe328b0a128e73433bec">http://git.postgresql.org/pg/commitdiff/60497722ac6d69d8ff82fe328b0a128e73433bec</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Replace strdup() with pstrdup(), to avoid leaking memory. It's been like this since the seg module was introduced, so backpatch to 8.2 which is the oldest supported version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea896da394cbb0fb32a4b41065ea04b81c4b03f6">http://git.postgresql.org/pg/commitdiff/ea896da394cbb0fb32a4b41065ea04b81c4b03f6</a></li>

<li>In binary-upgrade mode, dump dropped attributes of composite types. Noah Misch 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27c7875d95cf629e3f344ba91d1f8a1a936ed043">http://git.postgresql.org/pg/commitdiff/27c7875d95cf629e3f344ba91d1f8a1a936ed043</a></li>

<li>Reset per-tuple memory context between every row in a scan node, even when there's no quals or projections. Currently this only matters for foreign scans, as none of the other scan nodes litter the per-tuple memory context when there's no quals or projections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0319da638f337cae66a4649581dc1f33d5079e1a">http://git.postgresql.org/pg/commitdiff/0319da638f337cae66a4649581dc1f33d5079e1a</a></li>

<li>Pull up isReset flag from AllocSetContext to MemoryContext struct. This avoids the overhead of one function call when calling MemoryContextReset(), and it seems like the isReset optimization would be applicable to any new memory context we might invent in the future anyway. This buys back the overhead I just added in previous patch to always call MemoryContextReset() in ExecScan, even when there's no quals or projections. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/30e98a7e6e4869a7d6b3748ac9770bb8d69a8b26">http://git.postgresql.org/pg/commitdiff/30e98a7e6e4869a7d6b3748ac9770bb8d69a8b26</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix declaration of $_TD in "strict" trigger functions. This was broken in commit ef19dc6d39dd2490ff61489da55d95d6941140bf by the Bunce/Hunsaker/Dunstan team, which moved the declaration from plperl_create_sub to plperl_call_perl_trigger_func. This doesn't actually work because the validator code would not find the variable declared; and even if you manage to get past the validator, it still doesn't work because get_sv("_TD", GV_ADD) doesn't have the expected effect. The only reason this got beyond testing is that it only fails in strict mode. We need to declare it as a global just like %_SHARED; it is simpler than trying to actually do what the patch initially intended, and is said to have the same performance benefit. As a more serious issue, fix $_TD not being properly local()ized, meaning nested trigger functions would clobber $_TD. Alex Hunsaker, per test report from Greg Mullane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6b449d9051651d3accfdce73e21cfd5e3d0e09a3">http://git.postgresql.org/pg/commitdiff/6b449d9051651d3accfdce73e21cfd5e3d0e09a3</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix race condition in CheckTargetForConflictsIn. Dan Ports 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74aaa2136d13d613ffcea3171781d2e0c65a2e10">http://git.postgresql.org/pg/commitdiff/74aaa2136d13d613ffcea3171781d2e0c65a2e10</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add example for replication in pg_hba.conf. Selena Deckelmann 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a937b07121d8ab51ba6fb44618254ec13cdcdfa0">http://git.postgresql.org/pg/commitdiff/a937b07121d8ab51ba6fb44618254ec13cdcdfa0</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Jaime Casanova sent in another revision of the patch to add a new column to IDENTIFY_SYSTEM.</li>

<li>Greg Smith sent in another revision of the patch to analyze cache.</li>

<li>Leonardo Francalanci sent in two revisions of a patch to reduce the size of xl_xact_commit.</li>

<li>Greg Smith sent in a patch to move some debugging/rescue contrib modules into core.</li>

<li>Dean Rasheed sent in two revisions of a patch to enable support for hashing arrays.</li>

<li>Josh Kupershmidt sent in a patch to add a constraint names to the \dd (show descriptions) in psql.</li>

<li>Selena Deckelmann sent in three revisions of a patch to document replication setup in pg_hba.conf.</li>

<li>Gregory Stark sent in a patch to add an option to psql's \dt which sorts columns alphabetically.</li>

<li>Gurjeet Singh sent in another revision of the patch to add \ir (include relative) to psql.</li>

<li>Robert Haas sent in a patch to drastically slim down the parser in order to test the effect on query speed.</li>

<li>Fabien Coelho sent in a patch which adds AS EXPLICIT to CREATE CAST.</li>

<li>Noah Misch sent in another patch to fix some infelicities in array handling.</li>

<li>Pavel Stehule sent in a WIP patch implementing an enhanced GET DIAGNOSTICS statement in PL/pgsql.</li>

<li>KaiGai Kohei sent in a patch adding relking handling to foreign tables in the sepgsql context.</li>

</ul>