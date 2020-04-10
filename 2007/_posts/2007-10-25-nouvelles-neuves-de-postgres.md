---
layout: post
title: "Nouvelles neuves de Postgres"
author: "NBougain"
redirect_from: "index.php?post/drupal-114 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>explain-analyze.info est maintenant en ligne&nbsp;!

<a target="_blank" href="http://explain-analyze.info">http://explain-analyze.info</a></li>

<!-- Apparemment le </ul>

est heureusement rajoute par Drupal dans la version coupee -->

<!--break-->

<li>pgAdmin3 1.8.0 est sorti&nbsp;:

<a target="_blank" href="http://www.pgadmin.org/news.php">http://www.pgadmin.org/news.php</a></li>

<li>PL/php 1.3.5 beta 1 est disponible&nbsp;:

<a target="_blank" href="http://projects.commandprompt.com/public/plphp">http://projects.commandprompt.com/public/plphp</a></li>

</ul>

<p><strong>Offres d'emplois autour de Postgres en octobre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-10/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>La première réunion du PUG néo-zélandais aura lieu à Wellington, le 6 novembre 2007. Plus de détails à l'adresse&nbsp;:

<a target="_blank" href="http://pgug.org.nz">http://pgug.org.nz</a></li>

<li>Jetez un œil sur le nouveau forum Postgres concernant les emplois germanophones&nbsp;:

<a target="_blank" href="http://www.pg-forum.de/jobboerse-marktplatz/">http://www.pg-forum.de/jobboerse-marktplatz/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org ou en allemand à pwn (a) pgug.de.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Minor fixes for the release notes.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Re-allow UTF8 encodings on win32. Since UTF8 is converted to UTF16 before being used, all (valid) locales will work for this.</li>

<li>Hiroshi Saito's patch which updates URLs to a couple of external projects in pgsql/doc/src/sgml/external-projects.sgml.</li>

<li>In pgsql/doc/src/sgml/external-projects.sgml, fix the URL properly per Robert Treat.</li>

<li>In pgsql/contrib/pgbench/pgbench.c, increase FD_SETSIZE on Win32 to allow for more than 54 clients. Per Greg Stark &amp; Dave Page</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/bin/initdb/initdb.c, remove quotes around locale names in some places for consistency.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add mention of Slony for in-place upgrades to pgsql/doc/src/sgml/backup.sgml.</li>

<li>Mention that Slony switch is only seconds of downtime.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, add doc clarifications for warm standby.</li>

<li>In pgsql/doc/src/sgml/backup.sgml, mention Slony as just an example.</li>

<li>Re-add FAQ item, 'Why do I get "relation with OID ##### does not exist" errors when accessing temporary tables in PL/PgSQL functions?'</li>

<li>First pass over release documentation. I trimmed down some of the entries and removed a few.</li>

<li>Small changes to release note descriptions.</li>

<li>Move a few items into migration from the main changes section. Indent 8.3 consistently.</li>

<li>More indenting cleanup, tag additions.</li>

<li>More release wording adjustments.</li>

<li>Consistently indent release notes for prior releases.</li>

<li>More indenting cleanup for release notes.</li>

<li>Update German FAQ. Ian Barwick</li>

<li>In pgsql/doc/src/sgml/release.sgml, more release note wording improvements.</li>

<li>In pgsql/doc/src/sgml/release.sgml, fix release tag spelling typo.</li>

<li>More release note word-smithing in pgsql/doc/src/sgml/release.sgml</li>

<li>Update Japanese FAQ. Jun Kuwamura</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Include NOLOGIN roles in the 'flat' password file. In the original coding this was seen as useless, but the problem with not including them is that the error message will often be something about authentication failure, rather than the more helpful one about 'role is not permitted to log in'. Per discussion.</li>

<li>Back-patch some plpython patches previously made only in HEAD: changes of 3-Apr and 4-Apr to declare interface functions properly and eliminate casts, thereby fixing potential problems on 64-bit machines; and changes of 13-Jul to volatile-qualify some variables to suppress compiler warnings. Per discussion, we're only worrying about Python 2.5 in PG 8.2 and up, so no need to patch further back.</li>

<li>Add sample text search dictionary templates and parsers, to replace the hard-to-maintain textual examples currently in the SGML docs. From Sergey Karpov.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, remove obsolete examples of add-on parsers and dictionary templates; these are more easily and usefully maintained as contrib modules. Various other wordsmithing, markup improvement, etc.</li>

<li>Fix pg_wchar_table[] to match revised ordering of the encoding ID enum. Add some comments so hopefully the next poor sod doesn't fall into the same trap. (Wrong comments are worse than none at all...)</li>

<li>Teach pgxs.mk and Install.pm how to install files from a contrib module into SHAREDIR/tsearch_data. Use this instead of ad-hoc coding in dict_xsyn/Makefile. Should fix current ContribCheck failures on MSVC.</li>

<li>Tweak toast-related logic in pgsql/src/backend/access/heap/heapam.c so that the toaster is only invoked when relkind = RELKIND_RELATION. This syncs these tests with the Asserts in tuptoaster.c, and ensures that we won't ever try to, for example, compress a sequence's tuple. Problem found by Greg Stark while stress-testing with much-smaller-than-normal page sizes.</li>

<li>In pgsql/src/bin/psql/describe.c, use 'token' not 'lexeme' to describe the output of a parser.</li>

<li>Another round of editorialization on the text search documentation. Notably, standardize on using "token" for the strings output by a parser, while "lexeme" is reserved for the normalized strings produced by a dictionary.</li>

<li>In pgsql/src/port/chklocale.c, add missing entry for PG_WIN1250 encoding, per gripe from Pavel Stehule. Also enable translation of PG_WIN874, which certainly seems to have an obvious translation now, though maybe it did not at the time this table's ancestor was created.</li>

<li>ts_rewrite() does not return a set, only one row; fix mislabeling in pg_proc.h. Catversion bumped.</li>

<li>Found another small glitch in tsearch API: the two versions of ts_lexize() are really redundant, since we invented a regdictionary alias type. We can have just one function, declared as taking regdictionary, and it will handle both behaviors. Noted while working on documentation.</li>

<li>In pgsql/doc/src/sgml/config.sgml, add a note pointing out that you can't log to syslog without tweaking the syslog configuration file (at least not on most known Unixen). I dunno why we hadn't had that info in the docs all along ...</li>

<li>In pgsql/src/backend/utils/adt/tsginidx.c, adjust error message to agree with documentation. The tsearch documentation uniformly calls these things weights, not classes.</li>

<li>Editorial overhaul for text search documentation. Organize the info more clearly, improve a lot of unclear descriptions, add some missing material. We still need a migration guide though.</li>

<li>Fix shared tsvector/tsquery input code so that we don't say "syntax error in tsvector" when we are really parsing a tsquery. Report the bogus input, too. Make styles of some related error messages more consistent.</li>

<li>In pgsql/src/backend/regex/regc_lex.c, add a useless return statement to suppress a warning seen with some versions of gcc (I'm seeing it with Apple's gcc 4.0.1). I think the reason we did not see this before was that the assert() macros in the regex code were all no-ops till recently.</li>

<li>In pgsql/doc/src/sgml/textsearch.sgml, create a quick-and-dirty list of known migration issues for pre-8.3 users of tsearch. This isn't meant to be permanent documentation, but to call out the areas that need either fixing or real documentation.</li>

<li>In pgsql/src/backend/optimizer/prep/prepunion.c, remove an Assert that's been obsoleted by recent changes in the parsetree representation of DECLARE CURSOR. Report and fix by Heikki.</li>

<li>In pgsql/contrib/pgstattuple/pgstattuple.c, be careful to get share lock on each page before computing its free space. ITAGAKI Takahiro</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine :-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Brendan Jurd sent in another revision of his quote_null patch.</li>

<li>Neil Conway sent in a patch to avoid a needless copy in nodeMaterial in src/backend/executor/nodeMaterial.c.</li>

<li>Marko Kreen sent in two versions of new documentation for the txid feature.</li>

<li>ITAGAKI Takahiro sent in a patch for testing query modes on pgbench per discussion

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-10/msg00755.php">http://archives.postgresql.org/pgsql-hackers/2007-10/msg00755.php</a></li>

<li>Volkan YAZICI sent in a patch which implements configurable penalty costs for the Levenshtein distance metric in the fuzzystrmatch contrib module.</li>

<li>Hiroshi Saito sent in a patch to adjust test_fsync.c</li>

<li>Greg Sabino Mullane sent in a patch which improves psql's tab completion for schemas and tables.</li>

<li>Tom Raney sent in another revision of his hash index build patch.</li>

<li>Albert Cervera i Areny sent in a patch to include contrib docs in the docbook SGML.</li>

</ul>