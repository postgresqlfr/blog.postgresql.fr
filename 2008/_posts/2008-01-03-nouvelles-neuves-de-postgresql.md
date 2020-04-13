---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-407 "
---


<p><strong>Nouvelles hebdomadaires de Postgres - 30 décembre 2007</strong></p>

<p>Bonne Année&nbsp;!</p>

<p>Bien qu'étant une semaine "fériée", beaucoup de choses s'y sont produites. Jetez un œil sur la liste des patchs pour les détails.</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>GNUmed 0.2.8.0 est sorti&nbsp;:

<a target="_blank" href="http://wiki.gnumed.de">http://wiki.gnumed.de</a></li>

<li>Pgtcl-ng 1.6.2 est disponible&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgtclng/">http://pgfoundry.org/projects/pgtclng/</a></li>

<li>Viewalyzer 1.0.2 est sorti&nbsp;:

<a target="_blank" href="http://sourceforge.net/projects/viewalyzer/">http://sourceforge.net/projects/viewalyzer/</a></li>

<li>xTuple Apps 2.3 est disponible&nbsp;:

<a target="_blank" href="http://www.xtuple.org/index.php?option=com_content&amp;task=view&amp;id=4281&amp;Itemid=1">http://www.xtuple.org/index.php?option=com_content&amp;task=view&amp;id=4281&amp;Itemid=1</a></li>

</ul>

<!--more-->


<!--break-->

<p><strong>Offres d'emplois autour de Postgres en décembre</strong></p>

<p><a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-12/threads.php</a></p>

<p><strong>Postgres Local</strong></p>

<ul>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa - propositions acceptées dès à présent&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/papers.php">http://www.pgcon.org/2008/papers.php</a></li>

<li>Les équipes BSD et PostgreSQL partageront un espace développeurs au FOSDEM 2008 de Bruxelles (23-24 février). Si vous souhaitez donner une conférence ou aider sur le stand, contactez fosdem (a) pgug (.) eu. Pour plus d'informations, jetez un œil sur&nbsp;:

<a target="_blank" href="http://fosdem.org/2008/schedule/devroom/bsdpostgresql">http://fosdem.org/2008/schedule/devroom/bsdpostgresql</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 28 et 29 mars 2008 à l'Université du Maryland, College Park&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil). Les propositions de conférences sont attendues avant le 11 janvier&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>Postgres dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>Postgres Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction française est effectuée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>In pgsql/contrib/uuid-ossp: uuid-ossp.c, add missing return code checks in the uuid-ossp contrib module, per bug #3841.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/copy.c, add sanity check to ensure delimiter and quote are different in CSV mode.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, applied patch send by ITAGAKI Takahiro to fix bug in connect statement if user name is a variable. Also fixed test case that didn't detect this.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/copy.c, swap the order of testing for control characters and for column delimiter in CopyAttributeOutText(), so that control characters are converted to the C-style escape sequences even if they happen to be equal to the column delimiter (as is true by default for tab, for example). Oversight in my previous patch to restore pre-8.3 behavior of COPY OUT escaping. Per report from Tomas Szepe.</li>

<li>In pgsql/src/backend/commands/copy.c, fix ill-advised usage of x?y:z expressions in errmsg() and errhint() calls. This prevented gettext from recognizing the strings that need to be translated.</li>

<li>In pgsql/src/backend/commands/copy.c, disallow digits and lower-case ASCII letters as the delimiter in non-CSV COPY. We need a restriction here because when the delimiter occurs as a data character, it is emitted with a backslash, and that will only work as desired if CopyReadAttributesText() will interpret the backslash sequence as representing the second character literally. This is currently untrue for 'b', 'f', 'n', 'r', 't', 'v', 'x', and octal digits. For future-proofing and simplicity of explanation, it seems best to disallow a-z and 0-9. We must also disallow dot, since "\." by itself would look like copy EOF. Note: "\N" is by default the null print string, so N would also cause a problem, but that is already tested for.</li>

<li>Improve consistency of error reporting in GUC assign_hook routines. Some were reporting ERROR for interactive assignments and LOG for other cases, some were saying nothing for non-interactive cases, and a few did yet other things. Make them use a new function GUC_complaint_elevel() to establish a reasonably uniform policy about how to report. There are still a few edge cases such as assign_search_path(), but it's much better than before. Per gripe from Devrim Gunduz and subsequent discussion. As noted by Alvaro, it'd be better to fold these custom messages into the standard "invalid parameter value" complaint from guc.c, perhaps as the DETAIL field. However that will require more redesign than seems prudent for 8.3. This is a relatively safe, low-impact change that we can afford to risk now.</li>

<li>Update examples in planstats.sgml for 8.3, and improve some aspects of that discussion. Add a link from perform.sgml.</li>

<li>Improve a number of elog messages for not-supposed-to-happen cases in btrees, since these seem to happen after all in corrupted indexes. Make sure we supply the index name in all cases, and provide relevant block numbers where available. Also consistently identify the index name as such. Back-patch to 8.2, in hopes that this might help Mason Hale figure out his problem.</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Wording improvements in pgsql/src/backend/tsearch/ts_utils.c, pgsql/src/backend/utils/adt/tsquery.c, pgsql/src/backend/utils/adt/tsquery_cleanup.c, pgsql/src/backend/utils/adt/tsvector_op.c, pgsql/src/backend/utils/misc/guc.c and pgsql/src/port/open.c.</li>

<li>In pgsql/doc/src/sgml/docguide.sgml, update required TeX settings.</li>

<li>In pgsql/doc/src/sgml/stylesheet.dsl, disable LOT for the time being because of TeX problems.</li>

<li>In pgsql/src/port/open.c, change may to might.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Add documentation section about preventing server spoofing. Update SSL documention to be clearer about certificates, and restructure for clarity.</li>

<li>Add two documentation tables to outline SSL file usage for client and server.</li>

<li>Update docs to clarify purpose of SSL key file.</li>

<li>In pgsql/doc/src/sgml/libpq.sgml, update docs: client always gets server certificate.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, document problem with NULL SSL ciphers and man-in-the-middle attacks.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, improve wording of NULL SSL cipher.</li>

<li>In pgsql/doc/src/sgml/client-auth.sgml, update docs mentioning PAM doesn't work reading /etc/passwd because of non-root. Dhanaraj M</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, document that null ciphers are not recommended. Mark Mielke</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, remove tab in file name.</li>

<li>In pgsql/doc/src/sgml/wal.sgml, document how to control the disk write cache on Solaris. Zdenek Kotala</li>

<li>Update Japanese FAQ. Jun Kuwamura.</li>

<li>Add to TODO: Allow SSL authentication/encryption over unix domain sockets&nbsp;:

<a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-12/msg00924.php">http://archives.postgresql.org/pgsql-hackers/2007-12/msg00924.php</a></li>

<li>Remove TODO.detail for pg_upgrade.</li>

<li>Update TODO list based on 8.3 completed items.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Pas de déception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Hans-Juergen Schoenig sent in a patch which updates Evgen Potemkin's CONNECT BY PRIOR patch.</li>

</ul>