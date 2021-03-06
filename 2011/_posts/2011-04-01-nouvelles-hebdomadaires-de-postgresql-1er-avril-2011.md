---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 1er avril 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/04/01/Nouvelles-hebdomadaires-de-PostgreSQL-1er-avril-2011"
---


<p>Julian Assange, contributeur de longue date, est parvenu &agrave; d&eacute;couvrir via un utilitaire sophistiqu&eacute; &agrave; base d'expressions r&eacute;guli&egrave;res, de nombreuses <em>back doors</em> b&eacute;n&eacute;ficiant &agrave; la NSA am&eacute;ricaine, ins&eacute;r&eacute;es par le nouvel arrivant&nbsp;: Tom Lane. Ce dernier a imm&eacute;diatement &eacute;t&eacute; expuls&eacute; du projet.</p>

<p>&Agrave; propos de la tenacit&eacute; dont il a fait preuve dans cette fouille, Julian Assange a d&eacute;clar&eacute;&nbsp;: "Il est impossible d'&eacute;viter ces m&eacute;faits &agrave; moins de discerner l'&eacute;tendue de leur malveillance." Il ajouta&nbsp;: "Je me suis toujours inqui&eacute;t&eacute; des relations entre M. Lane et le <em>Foreign Office</em> am&eacute;ricain, et j'ai donc creus&eacute; d'avantage&nbsp;: plus profond, en fait, que quiconque n'aurait pu imaginer."</p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<p>DostgreSQL, une distribution de PostgreSQL, facile d'acc&egrave;s, et &agrave; destination des utilisateurs turcs, a &eacute;t&eacute; publi&eacute;e&nbsp;: 

<a target="_blank" href="http://www.DostgreSQL.org">http://www.DostgreSQL.org</a></p>

<p><strong>La fonctionnalit&eacute; 9.1 de la semaine</strong></p>

<p>O(1) Multi-Master Replication. La syntaxe de la commande est&nbsp;:</p>

<pre>

 ALTER DATABASE [dbname]<br> ENABLE MMR<br> HOST host1 [, host2, ... hostn] 

</pre>

<p><strong>L'astuce de la semaine</strong></p>

<p>Un ordinateur vous permet de faire plus d'erreurs, plus vite, que n'importe quelle autre invention dans l'histoire de l'humanit&eacute;. &Agrave; l'exception possible des armes automatiques et de la tequila.</p>

<p><strong>Offres d'emplois autour de PostgreSQL en avril</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://jobs.oracle.com/">http://jobs.oracle.com/</a></li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://www.lesjeudis.com/recherche-offre-emploi/emploi-db2/">http://www.lesjeudis.com/recherche-offre-emploi/emploi-db2/</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>PostgreSQL aura une pr&eacute;sence importante lors de la "<em>MySQL Conference and Expo</em>", du 11 au 14 avril &agrave; Santa Clara (Californie)&nbsp;: 

<a target="_blank" href="http://en.oreilly.com/mysql2011/public/schedule/tag/postgresql">http://en.oreilly.com/mysql2011/public/schedule/tag/postgresql</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

<li>La PG Session 2, sur PostGIS, se tiendra &agrave; Paris le 23 juin. Appel &agrave; conf&eacute;renciers&nbsp;: 

<a target="_blank" href="http://www.postgresql-sessions.org/en/2/">http://www.postgresql-sessions.org/en/2/</a></li>

<li>pgbr aura lieu &agrave; S&atilde;o Paulo (Br&eacute;sil) les 3 &amp; 4 novembre 2011&nbsp;: 

<a target="_blank" href="http://pgbr.postgresql.org.br/">http://pgbr.postgresql.org.br/</a></li>

</ul>

<p><strong>PostgreSQL dans les m&eacute;dia</strong></p>

<ul>

<li>Planet PostgreSQL: 

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;: 

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><i>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. Traduction par l'&eacute;quipe PostgreSQLFr sous licence CC BY-NC-SA.</i></p>

<p><i>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais &agrave; david (a) fetter.org, en allemand &agrave; pwn (a) pgug.de, en italien &agrave; pwn (a) itpug.org et en espagnol &agrave; pwn (a) arpug.com.ar.</i></p>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110401">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Larry Ellison a pouss&eacute;&nbsp;:</p>

<ul>

<li>Remove NSA back doors 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3858f62230ac3c915f300c664312c63f">http://git.postgresql.org/pg/commitdiff/3858f62230ac3c915f300c664312c63f</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add missing #include 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5948e3504c72fb2b8b32af26bfbb016e7c71bf6">http://git.postgresql.org/pg/commitdiff/e5948e3504c72fb2b8b32af26bfbb016e7c71bf6</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Mark up release notes using &lt;link&gt;. Unlike &lt;xref&gt;, this actually works. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c7fd882a5275bf40cd5ac72c6118916f7802aa4">http://git.postgresql.org/pg/commitdiff/7c7fd882a5275bf40cd5ac72c6118916f7802aa4</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add 9.1 release note link for synchronous replication. We already had links to the GUC variables that control it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c22c0eda14594b5962aed7165a012067b33ab7d">http://git.postgresql.org/pg/commitdiff/5c22c0eda14594b5962aed7165a012067b33ab7d</a></li>

<li>In pg_upgrade, add C comment about how autovacuum is disabled. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d67b0bf471ba4e88aa3ed50871924efc91d7a27e">http://git.postgresql.org/pg/commitdiff/d67b0bf471ba4e88aa3ed50871924efc91d7a27e</a></li>

<li>Expand comment on how pg_upgrade is turning off autovacuum. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d609b08ead450d78d4a567c48111aca6857ec59c">http://git.postgresql.org/pg/commitdiff/d609b08ead450d78d4a567c48111aca6857ec59c</a></li>

<li>Mention pg_upgrade sets autovacuum_freeze_max_age to maximum. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/da3418cea9bd10e9ea3489b42f6278772942e745">http://git.postgresql.org/pg/commitdiff/da3418cea9bd10e9ea3489b42f6278772942e745</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add maintainer-check target. This can do various source code checks that are not appropriate for either the build or the regression tests. Currently: duplicate_oids, SGML syntax and tabs check, NLS syntax check. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c0dfc035670240cddf0092a4aa22e5815b6583d">http://git.postgresql.org/pg/commitdiff/6c0dfc035670240cddf0092a4aa22e5815b6583d</a></li>

<li>Make duplicate_oids return nonzero exit status if duplicates were found. Automatic detection of errors is easier that way. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/aa6fdd186cf2c29e04d3cc8ca19783fb904a5a33">http://git.postgresql.org/pg/commitdiff/aa6fdd186cf2c29e04d3cc8ca19783fb904a5a33</a></li>

<li>Update SQL features list. Feature F692 "Extended collation support" is now also supported. This refers to allowing the COLLATE clause anywhere in a column or domain definition instead of just directly after the type. Also correct the name of the feature in accordance with the latest SQL standard. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f564e65cda32fd14f6f7cdd85d116c421af731f2">http://git.postgresql.org/pg/commitdiff/f564e65cda32fd14f6f7cdd85d116c421af731f2</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Adjust error message, now that we expect other message types than connection close at this point. Fix PQsetnonblocking() comment. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc03c5937d103952ef4f40a3fa4514c154538d25">http://git.postgresql.org/pg/commitdiff/bc03c5937d103952ef4f40a3fa4514c154538d25</a></li>

<li>Automatically terminate replication connections that are idle for more than replication_timeout (a new GUC) milliseconds. The TCP timeout is often too long, you want the master to notice a dead connection much sooner. People complained about that in 9.0 too, but with synchronous replication it's even more important to notice dead connections promptly. Fujii Masao and Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/754baa21f723255272c24dc5f9ab456858e361e3">http://git.postgresql.org/pg/commitdiff/754baa21f723255272c24dc5f9ab456858e361e3</a></li>

<li>Check that we've reached end-of-backup also when we're not performing archive recovery. It's possible to restore an online backup without recovery.conf, by simply copying all the necessary WAL files to pg_xlog. "pg_basebackup -x" does that too. That's the use case where this cross-check is useful. Backpatch to 9.0. We used to do this in earlier versins, but in 9.0 the code was inadvertently changed so that the check is only performed after archive recovery. Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/acf47401321ce55f06026a2f5d5512b404da3e55">http://git.postgresql.org/pg/commitdiff/acf47401321ce55f06026a2f5d5512b404da3e55</a></li>

<li>Improve error message when WAL ends before reaching end of online backup. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1f0bab8494f7734e26b76fe34599c7763c8753a1">http://git.postgresql.org/pg/commitdiff/1f0bab8494f7734e26b76fe34599c7763c8753a1</a></li>

<li>Reword the phrase on zero replication_timeout in the docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/647f8b3dbaa68662f54aa762e9467874282c563d">http://git.postgresql.org/pg/commitdiff/647f8b3dbaa68662f54aa762e9467874282c563d</a></li>

<li>Don't leak the temporary PLyProcedure struct we create for inline plpython blocks. Investigation by Jan Urba&#324;ski, though I didn't use his patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec7626504f0fc8cca46d0f2a460e4b76177f79b3">http://git.postgresql.org/pg/commitdiff/ec7626504f0fc8cca46d0f2a460e4b76177f79b3</a></li>

<li>Increase SHMEM_INDEX_SIZE from 32 to 64. We're currently at 40 entries in ShmemIndex, so 64 leaves some headroom. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c8ae318cbeceadac172aa6b9cfa43734b0836e5e">http://git.postgresql.org/pg/commitdiff/c8ae318cbeceadac172aa6b9cfa43734b0836e5e</a></li>

<li>Fix a tiny race condition in predicate locking. Need to hold the lock while examining the head of predicate locks list. Also, fix the comment of RemoveTargetIfNoLongerUsed, it was neglected when we changed the way update chains are handled. Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60b142b9a6f413a92665766a1f265b361f68c20b">http://git.postgresql.org/pg/commitdiff/60b142b9a6f413a92665766a1f265b361f68c20b</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Attempt to unbreak windows builds broken by commit 754baa2. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/382fb6a08f524327b5e3084b3652fba2e12f1ba2">http://git.postgresql.org/pg/commitdiff/382fb6a08f524327b5e3084b3652fba2e12f1ba2</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Tous le monde en a pris pour son grade, cette semaine&nbsp;:-(</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Heikki Linnakangas sent in a variant patch to prevent memory leaks in DO blocks.</li>

<li>Heikki Linnakangas sent in another revision of the patch to add a replication server timeout.</li>

<li>Bernd Helmle sent in another revision of the patch to use a more reasonable size for \dt in psql.</li>

<li>Simon Riggs sent in a patch which adds 5 more levels of durability to sync rep.</li>

<li>Joseph Adams sent in five more revisions of the patch to add JSON as a data type.</li>

</ul>