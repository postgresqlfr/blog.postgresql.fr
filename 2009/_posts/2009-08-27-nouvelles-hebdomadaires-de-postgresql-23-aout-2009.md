---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 août 2009"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2009/08/27/Nouvelles-hebdomadaires-de-PostgreSQL-23-août-2009"
---


<p>La première <em>commitfest</em> est maintenant terminée, avec 35 patchs inclus. Félicitations à Robert Haas, "maman" de la <em>commitfest</em>, et à tous les candidats et relecteurs.</p>

<p>Nouveau sondage&nbsp;: laquelle de ces erreurs de DBA vous a coûté le plus long "hors service"&nbsp;?

<a target="_blank" href="http://www.postgresql.org/community">http://www.postgresql.org/community</a></p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>check_postgres 2.11.0, un module Nagios pour la surveillance de PostgreSQL&nbsp;:

<a target="_blank" href="http://bucardo.org/check_postgres/">http://bucardo.org/check_postgres/</a></li>

</ul>

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20090823">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Offres d'emplois autour de PostgreSQL en août</strong></p>

<ul>

<li><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2009-08/threads.php">http://archives.postgresql.org/pgsql-jobs/2009-08/threads.php</a></li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La "PyCon Argentina" aura lieu à Buenos Aires les 4 &amp; 5 septembre 2009&nbsp;:

<a target="_blank" href="http://ar.pycon.org/2009/">http://ar.pycon.org/2009/</a></li>

<li>Andreas (ads) Scherbaum enseignera au centre pour adultes de Magdeburg (All.) du 7 au 11 septembre 2009 sur le sujet "PostgreSQL for Corporate Use". Détails ci-dessous&nbsp;:

<a target="_blank" href="http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html">http://andreas.scherbaum.la/blog/archives/574-PostgreSQL-als-Bildungsurlaub.html</a></li>

<li>Il y aura une conférence à Athens (Georgie, États-Unis) le 19 septembre 2009. L'appel aux conférences est ouvert&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/2009/pgday/athens">http://www.postgresqlconference.org/2009/pgday/athens</a></li>

<li>Une suite de conférences est organisée à Seattle (État de Washington, États-Unis) du 16 au 18 octobre 2009. L'appel à conférences est ouvert&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/2009/west">http://www.postgresqlconference.org/2009/west</a></li>

<li>La "PGCon Brazil" prendra place à l'Unicamp de Campinas (État de São Paulo) les 23 &amp; 24 octobre 2009. L'appel à conférences est lancé&nbsp;:

<a target="_blank" href="http://pgcon.postgresql.org.br/2009/chamadas.en.php">http://pgcon.postgresql.org.br/2009/chamadas.en.php</a></li>

<li>Le PGDay.EU 2009 est programmé pour les 6 &amp; 7 novembre 2009 à Telecom ParisTech [ndt: ENST ?]&nbsp;:

<a target="_blank" href="http://www.pgday.eu/">http://www.pgday.eu/</a></li>

<li>L'OpenSQL Camp de Portland est à la recherche de sponsors. Pensez à votre voyage dès maintenant&nbsp;!&nbsp;:)

<a target="_blank" href="http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/">http://www.chesnok.com/daily/2009/07/29/opensql-camp-comes-to-portland-november-14-15-2009/</a></li>

<li>Le rassemblement à l'occasion du 10<sup>ème</sup> anniversaire du JPUG est programmé pour les 20 &amp; 21 novembre 2009 à Tokyo, Japon&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php">http://archives.postgresql.org/pgsql-announce/2009-05/msg00018.php</a></li>

<li>Le FOSDEM 2010 aura lieu à Bruxelles les 6 &amp; 7 février 2010&nbsp;:

<a target="_blank" href="http://www.fosdem.org/">http://www.fosdem.org/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://planet.postgresql.org/">http://planet.postgresql.org/</a></li>

<li>Planet PostgreSQLFr&nbsp;:

<a target="_blank" href="http://planete.postgresql.fr/">http://planete.postgresql.fr/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter et Josh Berkus. Traduction par l'équipe PostgreSQLFr sous licence CC BY-NC-SA.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/access/common/tupconvert.c, department of marginal improvements: teach tupconvert.c to avoid doing a physical conversion when there are dropped columns in the same places in the input and output tupdescs. This avoids possible performance loss from the recent patch to improve dropped-column handling, in some cases where the old code would have worked.</li>

<li>In pgsql/contrib/unaccent/unaccent.c, suppress compiler warnings about uninitialized variables.</li>

<li>In pgsql/contrib/unaccent/Makefile, fix copy-and-pasteo that might explain some of the buildfarm's indigestion about this module.</li>

<li>In pgsql/contrib/unaccent/unaccent.c, fix some *other* compiler warnings from a different gcc version.</li>

<li>Print the actual DB encoding in the unaccent regression test. This is to help make it more obvious what the problem is, if the encoding isn't what the test expects.</li>

<li>Fix overflow for INTERVAL 'x ms' where x is more than a couple million, and integer datetimes are in use. Per bug report from Hubert Depesz Lubaczewski. Alex Hunsaker.</li>

<li>Allow mixing of traditional and SQL:2008 LIMIT/OFFSET syntax. Being rigid about it doesn't simplify the grammar at all, and it does invite confusion among those who only read the SELECT syntax summary and not the full details. Per gripe from Jaime Casanova.</li>

<li>In pgsql/src/tools/version_stamp.pl, fix version_stamp.pl to allow 'alphaN' version stamps. Not sure how Peter Eisentraut did that without fixing this ...</li>

<li>In pgsql/src/backend/commands/explain.c, include resjunk columns in EXPLAIN VERBOSE output lists. Per discussion.</li>

<li>Tweak ExecIndexEvalRuntimeKeys to forcibly detoast any toasted comparison values before they get passed to the index access method. This avoids repeated detoastings that will otherwise ensue as the comparison value is examined by various index support functions. We have seen a couple of reports of cases where repeated detoastings result in an order-of-magnitude slowdown, so it seems worth adding a bit of extra logic to prevent this. I had previously proposed trying to avoid duplicate detoastings in general, but this fix takes care of what seems the most important case in practice with very little effort or risk. Back-patch to 8.4 so that the PostGIS folk won't have to wait a year to have this fix in a production release. (The issue exists further back, of course, but the code's diverged enough to make backpatching further a higher-risk action. Also it appears that the possible gains may be limited in prior releases because of different handling of lossy operators.)</li>

<li>Make TRUNCATE do truncate-in-place when processing a relation that was created or previously truncated in the current (sub)transaction. This is safe since if the (sub)transaction later rolls back, we'd just discard the rel's current physical file anyway. This avoids unreasonable growth in the number of transient files when a relation is repeatedly truncated. Per a performance gripe a couple weeks ago from Todd Cook.</li>

<li>Fix a violation of WAL coding rules in the recent patch to include an "all tuples visible" flag in heap page headers. The flag update *must* be applied before calling XLogInsert, but heap_update and the tuple moving routines in VACUUM FULL were ignoring this rule. A crash and replay could therefore leave the flag incorrectly set, causing rows to appear visible in seqscans when they should not be. This might explain recent reports of data corruption from Jeff Ross and others. In passing, do a bit of editorialization on comments in visibilitymap.c.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/Makefile, make version.sgml depend on configure instead of Makefile.global. This cheats a bit, but it avoids unsatisfied dependencies in distribution tarballs. (found by make distcheck)</li>

<li>Add release notes for 8.5alpha1</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, remove duplicate from release notes, and reorganize slightly.</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, update alpha release notes to current.</li>

<li>In pgsql/doc/src/sgml/release-8.5.sgml, alter release note item about PL/pgSQL functions and dropped columns. per Pavel Stehule</li>

<li>Version stamp 8.5alpha1</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>Introduce filtering dictionary support to tsearch. Propagate --nolocale option to CREATE DATABASE command in pg_regress to allow correct checking of locale-sensitive contrib modules.</li>

<li>Add unaccent dictionary to text search.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/tools/msvc/vcregress.pl, pick up REGRESS_OPTS from contrib makefiles. Along the way, fix ordering of makefile tests to mimic gmake.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/unaccent.sgml, remove tabs from SGML.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in a WIP patch which adds buffer usage information to EXPLAIN and contrib/pg_stat_statements.</li>

<li>Zoltan Boszormenyi sent in another revision of his ECPG patch.</li>

<li>Andrew Dunstan sent in a patch which sets the "explain" root element for auto-explain XML/JSON output.</li>

<li>Jan Otto sent in a patch to work around a bug in OS/X Snow Leopard's readdir().</li>

<li>Tom Lane and Josh Berkus sent in revisions of the alpha1 release notes.</li>

<li>Tom Lane sent in a WIP patch to make a case common in PostGIS work faster by not repeatedly de-TOASTing under certain conditions.</li>

<li>Stef Walter sent in another revision of the patch to add samehost and samenet directives to pg_hba.conf.</li>

<li>ITAGAKI Takahiro sent in another WIP patch to base dblink on SQL/MED Foreign Data Wrappers.</li>

<li>ITAGAKI Takahiro sent in a patch intended to fix a bug in handling default values in reloptions.</li>

<li>ITAGAKI Takahiro sent in a patch to fix the cache lookup failure in auto_explain log_verbose</li>

<li>ITAGAKI Takahiro sent in a patch intended to help add 2PC semantics to foreign data wrappers.</li>

<li>Robert Haas sent in an updated version of the hot standby patch.</li>

<li>Kevin Grittner sent in a patch to change the supplied module for Linux startup scripts.</li>

<li>Heikki Linnakangas sent in two patches to return data from b-tree indexes and use it to satisfy qualifiers. The first patch changes the API for indexam by splitting indexam_getnext into two pieces. The second does the actual work.</li>

<li>Robert Haas sent in another update to the hot standby patch.</li>

<li>James Pye sent in another revision of his PL/Python3 patch.</li>

<li>Roger Leigh sent in a flock of patches intended to allow psql to use Unicode box-drawing characters for borders.</li>

<li>Paul Matthews sent in a patch to add a hypot() function.</li>

</ul>