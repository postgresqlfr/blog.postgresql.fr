---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 21 septembre 2014"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2014/09/29/Nouvelles-hebdomadaires-de-PostgreSQL-21-septembre-2014"
---


<p>La premi&egrave;re rencontre PostgreSQL moscovienne &agrave; &ecirc;tre organis&eacute;e via Meetup aura lieu &agrave; Moscou le 24 septembre 2014. RSVP pour aider &agrave; l'organisation. 

<a target="_blank" href="http://www.meetup.com/postgresqlrussia/">http://www.meetup.com/postgresqlrussia/</a></p>

<p>[ndt: Meetup PUG parisien le 8 octobre&nbsp;: 

<a target="_blank" href="http://www.meetup.com/PostgreSQL-User-Group-Paris/">http://www.meetup.com/PostgreSQL-User-Group-Paris/</a>]</p>

<p><strong>Offres d'emplois autour de PostgreSQL en septembre</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php">http://archives.postgresql.org/pgsql-jobs/2014-09/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>La cinqui&egrave;me &eacute;dition du PgDay argentin est programm&eacute;e pour le 28 novembre 2014 &agrave; Santa Fe. L'appel international &agrave; conf&eacute;renciers court jusqu'au 28 septembre&nbsp;: 

<a target="_blank" href="http://www.postgresql.org.ar/pgday2014">http://www.postgresql.org.ar/pgday2014</a></li>

<li>Le 4<sup>&egrave;me</sup> PgDay &eacute;quatorien aura lieu le mardi 7 octobre en la ville de Quito, int&eacute;gr&eacute; au 5&egrave;me congr&egrave;s international du Logiciel Libre. Envoyez vos propositions de conf&eacute;rences &agrave; ecpug AT postgresql DOT org.</li>

<li>Le sixi&egrave;me PGDay cubain aura lieu les 13 et 14 octobre 2014 &agrave; la Havane&nbsp;: 

<a target="_blank" href="https://postgresql.uci.cu/?p=380">https://postgresql.uci.cu/?p=380</a></li>

<li>Les inscriptions pour la PGConf.EU 2014 de Madrid, Espagne, du 21 au 24 octobre sont &agrave; pr&eacute;sent ouvertes&nbsp;: 

<a target="_blank" href="http://2014.pgconf.eu/registration/">http://2014.pgconf.eu/registration/</a></li>

<li>Le PGDay.IT 2014 aura lieu &agrave; Prato le 7 novembre 2014. L'appel international &agrave; conf&eacute;renciers a &eacute;t&eacute; lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2014.pgday.it/call-for-papers-en/">http://2014.pgday.it/call-for-papers-en/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20140922065710.GA30625@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Follow the RFCs more closely in libpq server certificate hostname check. The RFCs say that the CN must not be checked if a subjectAltName extension of type dNSName is present. IOW, if subjectAltName extension is present, but there are no dNSNames, we can still check the CN. Alexey Klyukin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58e70cf9fb42c1ad60b8ba730fd129f2ce6fa332">http://git.postgresql.org/pg/commitdiff/58e70cf9fb42c1ad60b8ba730fd129f2ce6fa332</a></li>

<li>Fix the return type of GIN triConsistent support functions to "char". They were marked to return a boolean, but they actually return a GinTernaryValue, which is more like a "char". It makes no practical difference, as the triConsistent functions cannot be called directly from SQL because they have "internal" arguments, but this nevertheless seems more correct. Also fix the GinTernaryValue name in the documentation. I renamed the enum earlier, but neglected the docs. Alexander Korotkov. This is new in 9.4, so backpatch there. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/77e65bf369edd0282531794dd907a0943651eff8">http://git.postgresql.org/pg/commitdiff/77e65bf369edd0282531794dd907a0943651eff8</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix TAP checks when current directory name contains spaces. Add some quotes in the makefile snippet that creates the temporary installation, so that it can handle spaces in the directory name and possibly some other oddities. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7d6759ec2df9ad10b65aea359a27789e16a353b">http://git.postgresql.org/pg/commitdiff/f7d6759ec2df9ad10b65aea359a27789e16a353b</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix configure check for %z printf support after INT64_MODIFIER changes. The PGAC_FUNC_SNPRINTF_SIZE_T_SUPPORT test was broken by ce486056ecd28050. Among others it made the UINT64_FORMAT macro to be defined in c.h, instead of directly being defined by configure. This lead to the replacement printf being used on all platforms for a while. Which seems to work, because this was only used due to different profiles Fix by relying on INT64_MODIFIER instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7e3f728353fa9b36c7f98b6ec447d3f1b8deec14">http://git.postgresql.org/pg/commitdiff/7e3f728353fa9b36c7f98b6ec447d3f1b8deec14</a></li>

<li>Add the capability to display summary statistics to pg_xlogdump. The new --stats/--stats=record options to pg_xlogdump display per rmgr/per record statistics about the parsed WAL. This is useful to understand what the WAL primarily consists of, to allow targeted optimizations on application, configuration, and core code level. It is likely that we will want to fine tune the statistics further, but the feature already is quite helpful. Author: Abhijit Menon-Sen, slightly editorialized by me Reviewed-By: Andres Freund, Dilip Kumar and Furuya Osamu Discussion: 20140604104716.GA3989@toroid.org 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bdd5726c347016ea34e9fb68d1b8b71046e25d2e">http://git.postgresql.org/pg/commitdiff/bdd5726c347016ea34e9fb68d1b8b71046e25d2e</a></li>

<li>Add rmgr callback to name xlog record types for display purposes. This is primarily useful for the upcoming pg_xlogdump --stats feature, but also allows to remove some duplicated code in the rmgr_desc routines. Due to the separation and harmonization, the output of dipsplayed records changes somewhat. But since this isn't enduser oriented content that's ok. It's potentially desirable to further change pg_xlogdump's display of records. It previously wasn't possible to show the record type separately from the description forcing it to be in the last column. But that's better done in a separate commit. Author: Abhijit Menon-Sen, slightly editorialized by me Reviewed-By: &Aacute;lvaro Herrera, Andres Freund, and Heikki Linnakangas Discussion: 20140604104716.GA3989@toroid.org 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/728f152e07f998d2cb4fe5f24ec8da2c3bda98f2">http://git.postgresql.org/pg/commitdiff/728f152e07f998d2cb4fe5f24ec8da2c3bda98f2</a></li>

<li>Avoid 'clobbered by longjmp' warning in psql/copy.c. This was introduced in 51bb79569f934ad2135c2ff859c61b9ab8d51750. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/afaefa1b31ba900bdc6987a752483e1580356e48">http://git.postgresql.org/pg/commitdiff/afaefa1b31ba900bdc6987a752483e1580356e48</a></li>

<li>Mark x86's memory barrier inline assembly as clobbering the cpu flags. x86's memory barrier assembly was marked as clobbering "memory" but not "cc" even though 'addl' sets various flags. As it turns out gcc on x86 implicitly assumes "cc" on every inline assembler statement, so it's not a bug. But as that's poorly documented and might get copied to architectures or compilers where that's not the case, it seems better to be precise. Discussion: 20140919100016.GH4277@alap3.anarazel.de To keep the code common, backpatch to 9.2 where explicit memory barriers were introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e5603a2f35baa0bc9d61b16373383fdd37e49509">http://git.postgresql.org/pg/commitdiff/e5603a2f35baa0bc9d61b16373383fdd37e49509</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a fast pre-check for equality of equal-length strings. Testing reveals that that doing a memcmp() before the strcoll() costs practically nothing, at least on the systems we tested, and it speeds up sorts containing many equal strings significatly. Peter Geoghegan. Review by myself and Heikki Linnakangas. Comments rewritten by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e246b3d6eac09d0770e6f68e69f2368d02db88af">http://git.postgresql.org/pg/commitdiff/e246b3d6eac09d0770e6f68e69f2368d02db88af</a></li>

<li>doc: Use &lt;literal&gt; and all-caps for READ COMMITTED isolation level. The documentation overall is not entirely consistent about how we do this, but this is consistent with other usages within lock.sgml. Etsuro Fujita 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a92b5f969bed9796bcb3c321e7be4124a4533067">http://git.postgresql.org/pg/commitdiff/a92b5f969bed9796bcb3c321e7be4124a4533067</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix failure of contrib/auto_explain to print per-node timing information. This has been broken since commit af7914c6627bcf0b0ca614e9ce95d3f8056602bf, which added the EXPLAIN (TIMING) option. Although that commit included updates to auto_explain, they evidently weren't tested very carefully, because the code failed to print node timings even when it should, due to failure to set es.timing in the ExplainState struct. Reported off-list by Neelakanth Nadgir of Salesforce. In passing, clean up the documentation for auto_explain's options a little bit, including re-ordering them into what seems to me a more logical order. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/898f8a96ef9dfa79eac9ec1621a89e71fe16601c">http://git.postgresql.org/pg/commitdiff/898f8a96ef9dfa79eac9ec1621a89e71fe16601c</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Row-Level Security Policies (RLS) Building on the updatable security-barrier views work, add the ability to define policies on tables to limit the set of rows which are returned from a query and which are allowed to be added to a table. Expressions defined by the policy for filtering are added to the security barrier quals of the query, while expressions defined to check records being added to a table are added to the with-check options of the query. New top-level commands are CREATE/ALTER/DROP POLICY and are controlled by the table owner. Row Security is able to be enabled and disabled by the owner on a per-table basis using ALTER TABLE .. ENABLE/DISABLE ROW SECURITY. Per discussion, ROW SECURITY is disabled on tables by default and must be enabled for policies on the table to be used. If no policies exist on a table with ROW SECURITY enabled, a default-deny policy is used and no records will be visible. By default, row security is applied at all times except for the table owner and the superuser. A new GUC, row_security, is added which can be set to ON, OFF, or FORCE. When set to FORCE, row security will be applied even for the table owner and superusers. When set to OFF, row security will be disabled when allowed and an error will be thrown if the user does not have rights to bypass row security. Per discussion, pg_dump sets row_security = OFF by default to ensure that exports and backups will have all data in the table or will error if there are insufficient privileges to bypass row security. A new option has been added to pg_dump, --enable-row-security, to ask pg_dump to export with row security enabled. A new role capability, BYPASSRLS, which can only be set by the superuser, is added to allow other users to be able to bypass row security using row_security = OFF. Many thanks to the various individuals who have helped with the design, particularly Robert Haas for his feedback. Authors include Craig Ringer, KaiGai Kohei, Adam Brightwell, Dean Rasheed, with additional changes and rework by me. Reviewers have included all of the above, Greg Smith, Jeff McCormick, and Robert Haas. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/491c029dbc4206779cf659aa0ff986af7831d2ff">http://git.postgresql.org/pg/commitdiff/491c029dbc4206779cf659aa0ff986af7831d2ff</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Marko (johto) Tiikkaja sent in another revision of a patch to add PGP signatures to the pgcrypto contrib extension.</li>

<li>Kevin Grittner sent in another revision of a patch to add the capacity to use intermediate tables in queries with an immediate eye to the maintenance of materialized views.</li>

<li>Heikki Linnakangas sent in another revision of a patch to add a pgbench throttling latency limit.</li>

<li>Heikki Linnakangas sent in another revision of a patch to change the WAL format and API.</li>

<li>David Rowley sent in two more revisions of a patch to remove inner joins in certain cases where they can be proven redundant.</li>

<li>Joachim Wieland sent in another revision of a patch to remove global variables from pg_dump.</li>

<li>Szymon Guz sent in two revisions of a patch to add asciidoc as a format psql can use for output.</li>

<li>Heikki Linnakangas sent in another revision of a patch to fix an issue where JSONB compressed poorly.</li>

<li>Kaigai Kouhei sent in another revision of a patch to implement a custom plan API.</li>

<li>Andres Freund sent in a patch to remove the volatile qualifiers from xlog.c.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to process pg_hba.conf keywords as case-insensitive.</li>

<li>Pavel Stehule sent in two more revisions of a patch to document unicode border styles in psql.</li>

<li>Michael Paquier sent in a patch to remove OUTPUT_PLUGIN_* from existing logical decoding APIs.</li>

<li>Robert Haas sent in a patch to fix an issue where identify_locking_dependencies was broken for schema-only dumps.</li>

<li>Petr (PJMODOS) Jelinek sent in a patch to fix a couple of instances where COPY_SCALAR_FIELD is called instead of the correct COPY_STRING_FIELD.</li>

<li>Amit Kapila sent in two more revisions of a patch to scale shared buffer eviction.</li>

<li>Dean Rasheed sent in two revisions of a patch to ensure that WITH CHECK OPTION works correctly with row-level access control.</li>

<li>Haribabu Kommi sent in another revision of a patch to fix some oddities in per-table autovacuum vacuum cost limit behaviour.</li>

<li>Michael Paquier sent in two more revisions of a patch to refactor pg_basebackup and support for replslot creation and drop in pg_receivexlog.</li>

<li>Michael Paquier sent in another revision of a patch to make pg_dump able to dump from replication slot creation state.</li>

<li>Rajeev Rastogi sent in a patch to optimize index scans.</li>

<li>Michael Paquier sent in a patch to fix the documentation for pg_recvlogical's --create mode.</li>

</ul>