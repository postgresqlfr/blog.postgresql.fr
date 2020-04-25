---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 octobre 2013"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2013/10/31/Nouvelles-hebdomadaires-de-PostgreSQL-20-octobre-2013"
---


<p>Le PgDay argentin a besoin de soutien financier. Participations par l&agrave;&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.ar/pgday2013/crowdfunding?lang=en">http://www.postgresql.org.ar/pgday2013/crowdfunding?lang=en</a></p>

<p>La <em>CommitFest II</em> du cycle de la 9.4 s'est termin&eacute;e, affichant de grands progr&egrave;s dans la file d'attente des patchs. 20 patchs ont &eacute;t&eacute; pouss&eacute;s, dont certains concernent des fonctionnalit&eacute;s de premier plan.</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Pyrseas 0.7.0b1, un ensemble d'outils pour la gestion de versions avec PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/jmafc/Pyrseas">https://github.com/jmafc/Pyrseas</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en octobre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2013-10/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay italien (PGDay.IT) sera tenu le 25 octobre &agrave; Prato (Italie, Toscane) au centre de recherche de l'Universit&eacute; Monash. Inscriptions et infos&nbsp;: 

<a target="_blank" href="http://2013.pgday.it">http://2013.pgday.it</a></li>

<li>La <em>PostgreSQL Conference China</em> de 2013 aura lieu les 26 &amp; 27 octobre &agrave; Hangzhou. Informations&nbsp;: 

<a target="_blank" href="https://wiki.postgresql.org/wiki/Pgconf_cn2013">https://wiki.postgresql.org/wiki/Pgconf_cn2013</a><br>

Inscriptions&nbsp;: 

<a target="_blank" href="http://bbs.pgsqldb.com/client/bm.php">http://bbs.pgsqldb.com/client/bm.php</a></li>

<li>La <em>PGConf.EU 2013</em> sera tenue du 29 octobre au 1<sup>er</sup> novembre au Conrad Hotel dans le centre-ville de Dublin en Irlande. Les inscriptions sont ouvertes&nbsp;: 

<a target="_blank" href="http://2013.pgconf.eu/">http://2013.pgconf.eu/</a></li>

<li><em>PGConf.DE 2013</em> aura lieu le 8 novembre 2013 au mus&eacute;e industriel de la Rh&eacute;nanie &agrave; Oberhausen. L'appel &agrave; conf&eacute;renciers porte jusqu'au 15 septembre&nbsp;: 

<a target="_blank" href="http://2013.pgconf.de/">http://2013.pgconf.de/</a></li>

<li>La quatri&egrave;me &eacute;dition du PGDay argentin se tiendra le 14 novembre 2013 &agrave; Buenos Aires, Argentine&nbsp;: 

<a target="_blank" href="http://wiki.postgresql.org/wiki/PGDay_Argentina_2013">http://wiki.postgresql.org/wiki/PGDay_Argentina_2013</a></li>

<li>Le PGDay cubain aura lieu en novembre 2013&nbsp;: 

<a target="_blank" href="http://postgresql.uci.cu/">http://postgresql.uci.cu/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20131021052058.GC1201@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix details missed by dynamic shared memory patch. Additional documentation update, and a comment fix. Both issues reported by Amit Kapila. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/05a0283e7a48ffdca96cb6dd94fa5bae06e29bd1">http://git.postgresql.org/pg/commitdiff/05a0283e7a48ffdca96cb6dd94fa5bae06e29bd1</a></li>

<li>In dsm_impl_windows, don't error out when the segment already exists. This is the behavior of the other implementations, and the behavior expected by the callers of this function. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5158613676d940cf71ecfb5c73ac933746ac847">http://git.postgresql.org/pg/commitdiff/e5158613676d940cf71ecfb5c73ac933746ac847</a></li>

<li>initdb: Suppress dynamic shared memory when probing for max_connections. This might not be the right long-term solution here, but it will hopefully turn the buildfarm green again. Oversight noted by Andres Freund 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d41ab71712a4457ed39d5471b23949872ac91def">http://git.postgresql.org/pg/commitdiff/d41ab71712a4457ed39d5471b23949872ac91def</a></li>

<li>Remove spinlock support for SINIX, Sun3, and NS32K. All of these platforms are very much obsolete. As far as I can determine, the last version of SINIX, later renamed Reliant, occurred some time between 2002 and 2005. The last release of SunOS that would run on a sun3 was released in November of 1991; the last release of OpenBSD which supported that platform was in 2001. The highest clock speed of any processor in the family was 25MHz. The NS32K (national semiconductor 320xx) architecture was retired in 1990. Support can be re-added if a maintainer emerges for any of these platforms, but it seems unlikely. Reviewed by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/81051a86bcecdc681592725139fe610b2c1d1428">http://git.postgresql.org/pg/commitdiff/81051a86bcecdc681592725139fe610b2c1d1428</a></li>

<li>Remove IRIX port. Development of IRIX has been discontinued, and support is scheduled to end in December of 2013. Therefore, there will be no supported versions of this operating system by the time PostgreSQL 9.4 is released. Furthermore, we have no maintainer for this platform. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ea91a6be89575095f61ebf36d67c2df98be093db">http://git.postgresql.org/pg/commitdiff/ea91a6be89575095f61ebf36d67c2df98be093db</a></li>

<li>Provide a reliable mechanism for terminating a background worker. Although previously-introduced APIs allow the process that registers a background worker to obtain the worker's PID, there's no way to prevent a worker that is not currently running from being restarted. This patch introduces a new API TerminateBackgroundWorker() that prevents the background worker from being restarted, terminates it if it is currently running, and causes it to be unregistered if or when it is not running. Patch by me. Review by Michael Paquier and KaiGai Kohei. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/523beaa11bdf6a9864e8978b467ed586b792c9ca">http://git.postgresql.org/pg/commitdiff/523beaa11bdf6a9864e8978b467ed586b792c9ca</a></li>

<li>Allow only some columns of a view to be auto-updateable. Previously, unless all columns were auto-updateable, we wouldn't inserts, updates, or deletes, or at least not without a rule or trigger; now, we'll allow inserts and updates that target only the auto-updateable columns, and deletes even if there are no auto-updateable columns at all provided the view definition is otherwise suitable. Dean Rasheed, reviewed by Marko Tiikkaja 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cab5dc5daf2f6f5da0ce79deb399633b4bb443b5">http://git.postgresql.org/pg/commitdiff/cab5dc5daf2f6f5da0ce79deb399633b4bb443b5</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>docs: correct 9.1 and 9.2 release note mention of timeline switch fix. Backpatch through 9.1. KONDO Mitsumasa 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f918c52f65aa28fb8c00d3f7078ff7b4788929dc">http://git.postgresql.org/pg/commitdiff/f918c52f65aa28fb8c00d3f7078ff7b4788929dc</a></li>

<li>Allow 5+ digit years for non-ISO timestamp/date strings, where appropriate. Report from Haribabu Kommi 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7778ddc7a2d5b006edbfa69cdb44b8d8c24ec1ff">http://git.postgresql.org/pg/commitdiff/7778ddc7a2d5b006edbfa69cdb44b8d8c24ec1ff</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>doc: Enable book index in XSLT builds. The XSLT toolchain requires an empty &lt;index&gt; element where the index is supposed to appear. Add that with conditionals to hide it from the DSSSL build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/90c7b7d16bb3a90fc9168ff8942fbf78308e727d">http://git.postgresql.org/pg/commitdiff/90c7b7d16bb3a90fc9168ff8942fbf78308e727d</a></li>

<li>Switch order of -lpgport and -lpgcommon. Conceptually, libpgcommon can depend on libpgport, but not the other way around. In the past, this might not have mattered, but it's needed now for asprintf. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/63f32f3416a8b4f8e057dc184e8e8eae734ccc8a">http://git.postgresql.org/pg/commitdiff/63f32f3416a8b4f8e057dc184e8e8eae734ccc8a</a></li>

<li>doc: Configure TOC generation in XSLT HTML build. The default table of contents in the XSLT HTML build is much too big and deep. Configure it to look more like the one that is currently being produced by the DSSSL build. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ed632ab21e9c638328498a85ccf77452645943bb">http://git.postgresql.org/pg/commitdiff/ed632ab21e9c638328498a85ccf77452645943bb</a></li>

<li>Fix for lack of va_copy() on certain Windows versions. Based-on-patch-by: David Rowley &lt;dgrowleyml@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c2316dcda1cd057d7d4a56e3a51e3f8f0527e906">http://git.postgresql.org/pg/commitdiff/c2316dcda1cd057d7d4a56e3a51e3f8f0527e906</a></li>

<li>Add libpgport to isolationtester on MSVC. From: Asif Naeem &lt;anaeem.it@gmail.com&gt; 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/595a6a035008cfa76faa2f284e91704f18673d13">http://git.postgresql.org/pg/commitdiff/595a6a035008cfa76faa2f284e91704f18673d13</a></li>

<li>Switch order of libpgport and libpgcommon in MSVC build as well 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c093b4ad267bbba1bc1e403719dddb881d2696e">http://git.postgresql.org/pg/commitdiff/3c093b4ad267bbba1bc1e403719dddb881d2696e</a></li>

<li>Move pgfnames() from libpgport to libpgcommon. It requires pstrdup() from libpgcommon. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba7c5975adea74c6f17bdb0e0427ad85962092a2">http://git.postgresql.org/pg/commitdiff/ba7c5975adea74c6f17bdb0e0427ad85962092a2</a></li>

<li>Move rmtree() from libpgport to libpgcommon. It requires pgfnames() from libpgcommon. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e6bc4b806ca92433932b34c019293a201f03e11">http://git.postgresql.org/pg/commitdiff/2e6bc4b806ca92433932b34c019293a201f03e11</a></li>

<li>Add *.pot to .gitignore 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/07bf70356c4a22939dfd89f3fb48d1a50c901e13">http://git.postgresql.org/pg/commitdiff/07bf70356c4a22939dfd89f3fb48d1a50c901e13</a></li>

<li>Add libpgcommon to backend gettext source files. This ought to have been done when libpgcommon was split off from libpgport. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/713a9f210d5cf5d94cc420b01eef5183569402e0">http://git.postgresql.org/pg/commitdiff/713a9f210d5cf5d94cc420b01eef5183569402e0</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Silence compiler warning when SSL not in use. Per Jaime Casanova and Vik Fearing 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86029b31e5c71be5f9aceba0da2c609496435418">http://git.postgresql.org/pg/commitdiff/86029b31e5c71be5f9aceba0da2c609496435418</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Return valid json when converting an empty hstore. Oskari Saarenmaa. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bbe4deac1b98594206a024c9e91d664b3c3410d9">http://git.postgresql.org/pg/commitdiff/bbe4deac1b98594206a024c9e91d664b3c3410d9</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Consistently use unsigned arithmetic for alignment calculations. This avoids an assumption about the signed number representation. It is anticipated to have no functional changes on supported configurations; many two's complement assumptions remain elsewhere. Per a suggestion from Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/709170b790c11b4012004a6baf11a0fc6ec950de">http://git.postgresql.org/pg/commitdiff/709170b790c11b4012004a6baf11a0fc6ec950de</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>David Fetter sent in another revision of a patch to allow CREATE FOREIGN TABLE (... LIKE ...).</li>

<li>Andres Freund sent another flock of patches for logical changeset generation.</li>

<li>Vik Fearing sent in another revision of a patch to document how and when subqueries can modify data.</li>

<li>Vik Fearing sent in another revision of a patch to allow stats collection for the CLUSTER command.</li>

<li>Robert Haas sent in a patch to remove support for the Alpha architecture.</li>

<li>Tomas Vondra sent in two versions of a patch to add flow charts for the FDW API.</li>

<li>Vik Fearing sent in two more revisions of a patch to add pg_sleep_for(interval) and pg_sleep_until(timestamptz).</li>

<li>KONDO Mitsumasa sent in two approaches to a patch to improve pg_stat_statements.</li>

<li>Rajeev Rastogi sent in a patch to ensure that COPY FROM STDIN shows a count tag, which it did not before.</li>

<li>Fabr&iacute;zio de Royes Mello sent in another revision of a patch to enable time-delayed standbys.</li>

<li>Dean Rasheed sent in another revision of a patch to allow tab completion for views and foreign tables in psql.</li>

<li>Peter Geoghegan sent in a patch to create an autovacuum_work_mem GUC.</li>

<li>Nigel Heron sent in a WIP patch to keep track of the number of bytes sent and received by the server over its communication sockets.</li>

</ul>