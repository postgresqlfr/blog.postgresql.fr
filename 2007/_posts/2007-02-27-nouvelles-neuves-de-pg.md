---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/240"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 25 février 2007</strong></p>

<p>

Le fonds PostgreSQL du SPI a financé ce mois-ci le déplacement de David Fetter à Consili, Brésil, où il a donné une conférence.

Le fonds finance également Neil Conway pour les deux prochains mois qu'il passera à vérifier les correctifs de la version 8.3.

</p>

<p>

Une discussion animée (Lively Discussion(TM)) se poursuit sur -hackers au sujet de la gestion du code source.

</p>

<!--more-->


<p>Le septième Framework Programme (FP7) est ouvert aux propositions. Les organisations européenne de PostgreSQL sont encouragées à déposer une proposition :) <a target="_blank" href="http://cordis.europa.eu/fp7/home_en.html">http://cordis.europa.eu/fp7/home_en.html</a></p>

<p>

search.postgresql.org peut désormais être utilisé comme plugin à la boîte de recherche de firefox. <a target="_blank" href="http://www.gunduz.org/postgresql/searchpostgresqlorg.html">http://www.gunduz.org/postgresql/searchpostgresqlorg.html</a>

</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<ul>

<li>

Cybertek, Autriche, annonce un produit de réplication synchrone multi-maître pour PostgreSQL&nbsp;:

<a target="_blank" href="http://www.cybertec.at/en/ctools.html">http://www.cybertec.at/en/ctools.html</a>

</li>

<li>

PGCluster-1.5.0rc15 et 1.7.0rc4&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgcluster/">http://pgfoundry.org/projects/pgcluster/</a>

</li>

</ul>

<p><strong>Les jobs PostgreSQL Jobs de février</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-02/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

Il y aura un stand PostgreSQL les 3 et 4 mars à Chemnitz, RFA. Quelques personnalités incontournables des communautées PostgreSQL de langue allemande y seront. Contacter info@pgug.de pour en être.

<a target="_blank" href="http://chemnitzer.linux-tage.de/2007/info/">http://chemnitzer.linux-tage.de/2007/info/</a>

</p>

<p>

La communauté PostgreSQL italienne recherche des mécènes pour la journée PostgreSQL du Prato, Italie, cet été. Suivre le lien pour participer&nbsp;:

<a target="_blank" href="http://www.pgday.it">http://www.pgday.it</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Microsoft Technet a publié un PostgreSQL HOWTO&nbsp;:

<a target="_blank" href="http://port25.technet.com/archive/2007/02/22/postgresql-on-windows-a-primer.aspx">http://port25.technet.com/archive/2007/02/22/postgresql-on-windows-a-primer.aspx</a>

</li>

<li>

L'étude de cas OmniTI publiée&nbsp;:

<a target="_blank" href="http://www.arnnet.com.au/index.php/id;413111662;fp;4194304;fpid;1">http://www.arnnet.com.au/index.php/id;413111662;fp;4194304;fpid;1</a>

</li>

Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

<li>

General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p><em>

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter, Josh Berkus and Devrim GUNDUZ.

Adaptation francophone de Stéphane Schildknecht.

</em></p>

<p>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul><li>

Allow pltcl args to spi_prepare and plpython args to plpy.prepare to be standard type aliases as well as those known in pg_type. Similar to recent change in plperl. </li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul><li>

Bernd Helmle's patch which identifies the schema of inherited tables in psql \d when necessary. </li>

<li>

Add missing OIDs from xml support to pg_proc, bump catversion. </li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul><li>

Move test for BLCKSZ &lt; 1024 to guc.c. </li>

<li>

Spelling fix in Solaris FAQ. </li>

<li>

Update Solaris FAQ per Peter Eisentraut. </li>

<li>

Updated FAQ on upgrading. </li>

<li>

Zdenek Kotala's patch to the Solaris FAQ. </li>

<li>

Chad Wagner's patch to psql which adds \prompt capability. </li>

<li>

Remove extra tab from pgsql/doc/src/sgml/ref/psql-ref.sgml. </li>

<li>

Remove tabs from SGML reference files so their addition can be detected in the future. </li>

<li>

Update message wording in FAQ. </li>

<li>

Update new optional VACUUM FULL hint for translations, per Alvaro Herrera. </li>

<li>

Simon Riggs's patch which moves increase FSM warning to after lazy_truncate_heap() because the function might reduce the number of free pages in the table. Recommend VACUUM FULL only if 20% free. </li>

<li>

Heikki Linnakangas's patch to clean up the btree source code. </li>

<li>

Update FAQ about minor updates. </li>

<li>

Jun Kuwamura's update to the Japanese FAQ. </li>

<li>

Update URL in German FAQ for bug form, per Schima, Fabian </li>

<li>

Daojing Zhou's update of the Chinese FAQs to have two versions, a traditional Chinese version (Taiwan) and a Simplified version (China (PRC)). Backpatch to 8.2.X. </li>

<li>

Update minor release text in FAQ. </li>

<li>

Add configure --enable-profiling to enable GCC profiling. Patches from Korry Douglas and Nikhil S </li>

<li>

Update upgrade text in FAQ. </li>

<li>

Update URL for set-returning functions in FAQ. </li>

<li>

Add URL for "Allow row and record variables to be set to NULL constants, and allow NULL tests on such variables" in the TODO list. </li>

<li>

Prevent BLCKSZ &lt; 1024, and have initdb test shared buffers based on the BLCKSZ value. </li>

<li>

Add to TODO: "Consider decreasing the amount of memory used by PrivateRefCount." </li>

<li>

Fix markup in pgsql/doc/src/sgml/information_schema.sgml. </li>

<li>

Change $(CC) to $(COMPILER) on Solaris gcc so -m64 is passed into the shared link line. </li>

<li>

Add to TODO: "Increase locking when DROPing objects so dependent objects cannot get dropped while the DROP operation is happening." </li>

<li>

Add URL for "Allow UPDATE/DELETE WHERE CURRENT OF cursor" in TODO list. </li>

<li>

Add to TODO: "Add missing operators for geometric data types. Some geometric types do not have the full suite of geometric operators, e.g. box @&gt; point." </li>

<li>

Update "encode" documentation to mention that 'escape' only changes null bytes and backslashes, remove "ASCII" mention. Backpatch to 8.2.X. </li>

<li>

Update pgpass Win32 wording. </li>

<li>

Update information_schema documentation to match system tables. Backpatch to 8.2.X. </li>

<li>

Improve wording on Julian dates in pgsql/doc/src/sgml/func.sgml. </li>

<li>

More clearly document that most PostgreSQL utilities support libpq environment variables. Backpatch to 8.2.X. </li>

<li>

Remove from TODO for Win32: "Check .pgpass file permissions." It is not needed. </li>

<li>

In pgsql/src/interfaces/libpq/fe-connect.c, add comment that on Win32, we don't need to check the .pgpass file permission, per Magnus Hagander. </li>

<li>

Add to TODO for Win32: "Check .pgpass file permissions." </li>

<li>

Update array slice documentation to be clearer. </li>

<li>

Add to TODO: "Fix IS OF so it matches the ISO specification, and add documentation." </li>

<li>

Comment-out documentation for IS OF because it doesn't conform to the ISO SQL behavior. Backpatch removal to 8.2.X. </li>

<li>

Remove TODO item: "ARRAY[[1,2],[3,4]])[1] should return the same values as ARRAY[[1,2],[3,4]])[1:1]." It actually shouldn't. </li>

<li>

Add text about Makefile.custom to FAQ_DEV. </li>

<li>

Document that to_char('J'/Julian) is midnight-based, per report that Julian technically is noon to noon. </li>

<li>

Improve wording in isodow documentation. </li>

<li>

Update PQfree() documentation to be clearer, backpatch to 8.2.X. </li>

<li>

Add to TODO: "Allow user configuration of TOAST thresholds." </li>

<li>

Add newlines to TODO. </li>

<li>

Add to TODO: "Allow UPDATEs on only non-referential integrity columns not to conflict with referential integrity locks." </li>

<li>

Add to TODO: "Allow INSERT/UPDATE ... RETURNING inside a SELECT 'FROM' clause." </li>

<li>

Clarify documentation that initdb -A or editing pg_hba.conf is required if you do not trust local users. </li>

<li>

Clarify documentation for "day of the week" handling for to_char() and EXTRACT(). </li>

<li>

Mark TODO as done: "Add ISO day of week format 'ID' to to_char() where Monday = 1." </li>

<li>

Add "isodow" option to EXTRACT() and date_part() where Sunday = 7. </li>

<li>

Mark TODO as done: "Add a field 'isoyear' to extract(), based on the ISO week." </li>

<li>

Mark TODO as done: "Add long file support for binary pg_dump output." </li>

</ul>

<p>

Magnus Hagander a commité&nbsp;:</p>

<ul><li>

In pgsql/src/tools/msvc/Solution.pm, revert changes to process pg_proc.h entries without OIDs. We're not supposed to have such entries, and want to be notified when we do... Leave the plain bug fix in genbki. </li>

<li>

Fix pg_dump on Win32 so that it properly dumps files larger than 2GB when using binary dump formats. </li>

<li>

Parse pg_proc.h with entries without OIDs for the MSVC build. </li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul><li>

Update 7.x variant horology files to match the new US DST rules. It seems likely that anyone wanting to run the regression tests in the future will have up-to-date system timezone files, so this is more likely to work than the old contents. </li>

<li>

Put back copyObject() call I removed in a fit of brain fade. This one is still needed despite cleanups in setrefs.c, because the point is to let the inserted Result node compute a different tlist than its input node does. Per example from Jeremy Drake. </li>

<li>

Now that plans have flat rangetable lists, it's a lot easier to get EXPLAIN to drill down into subplan targetlists to print the referent expression for an OUTER or INNER var in an upper plan node. Hence, make it do that always, and banish the old hack of showing "?columnN?" when things got too complicated. Along the way, fix an EXPLAIN bug I introduced by suppressing subqueries from execution-time range tables: get_name_for_var_field() assumed it could look at rte-&gt;subquery to find out the real type of a RECORD var. That doesn't work anymore, but instead we can look at the input plan of the SubqueryScan plan node. </li>

<li>

Change Agg and Group nodes so that Vars contained in their targetlists and quals have varno OUTER, rather than zero, to indicate a reference to an output of their lefttree subplan. This is consistent with the way that every other upper-level node type does it, and allows some simplifications in setrefs.c and EXPLAIN. </li>

<li>

Fix bug I introduced in recent patch to make hash joins discard null tuples immediately: ExecHashGetHashValue failed to restore the caller's memory context before taking the failure exit. </li>

<li>

Turn the rangetable used by the executor into a flat list, and avoid storing useless substructure for its RangeTblEntry nodes. (I chose to keep using the same struct node type and just zero out the link fields for unneeded info, rather than making a separate ExecRangeTblEntry type --- it seemed too fragile to have two different rangetable representations.) Along the way, put subplans into a list in the toplevel PlannedStmt node, and have SubPlan nodes refer to them by list index instead of direct pointers. Vadim wanted to do that years ago, but I never understood what he was on about until now. It makes things a *whole* lot more robust, because we can stop worrying about duplicate processing of subplans during expression tree traversals. That's been a constant source of bugs, and it's finally gone. There are some consequent simplifications yet to be made, like not using a separate EState for subplans in the executor, but I'll tackle that later. </li>

<li>

Adjust user-facing documentation to explain why we don't check pgpass file permissions on Windows. </li>

<li>

Remove the Query structure from the executor's API. This allows us to stop storing mostly-redundant Query trees in prepared statements, portals, etc. To replace Query, a new node type called PlannedStmt is inserted by the planner at the top of a completed plan tree; this carries just the fields of Query that are still needed at runtime. The statement lists kept in portals etc. now consist of intermixed PlannedStmt and bare utility-statement nodes --- no Query. This incidentally allows us to remove some fields from Query and Plan nodes that shouldn't have been there in the first place. Still to do: simplify the execution-time range table; at the moment the range table passed to the executor still contains Query trees for subqueries. initdb forced due to change of stored rules. </li>

<li>

Get rid of some old and crufty global variables in the planner. When this code was last gone over, there wasn't really any alternative to globals because we didn't have the PlannerInfo struct being passed all through the planner code. Now that we do, we can restructure things to avoid non-reentrancy. I'm fooling with this because otherwise I'd have had to add another global variable for the planned compact range table list. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>

Mateo Beccati's patch which gets PostgreSQL to compile on Irix 6.5, but the patch would break most Linux machines.

</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Zoltan Boszormenyi sent in two more iterations of his IDENTITY/GENERATED patch. </li>

<li>

Pavan Deolasee sent in two more versions of his work-in-progress HOT patch. </li>

<li>

Gregory Stark sent in a patch to shorten varlena headers. </li>

<li>

Guillaume Smet sent in a first implementation of GIN for pg_trgm. </li>

<li>

Nikolay Samokhvalov sent in a patch to implement xpath_array with namespaces support. </li>

<li>

Darcy Buskermolen sent in a patch which provides for logging in the event that -k is unable to clean up an old WAL file and makes the "failed to remove file" error message consistent for the trigger file. </li>

<li>

Greg Sabino Mullane sent in a documentation patch which warns about some strange behavior in LISTEN/NOTIFY. </li>

<li>

Pavel Stehule sent in a patch to add timestamp support for XSD-type timestamps. </li>

<li>

Simon Riggs sent in another version of his patch to avoid deadlocks in pg_dump. </li>

<li>

Joachim Wieland sent in a patch which makes GUC values fall back to their default values when they got removed (or commented) from the configuration file. </li>

<li>

Kris Jurka sent in a patch which implements lo_truncate for truncating large objects to a given length. This is required for implementing Blob.truncate in the JDBC driver and rounds out filesystem like functionality for large objects. </li>

<li>

Simon Riggs sent a bug fix for his recent optimization of COPY-after-truncate. </li>

</ul>