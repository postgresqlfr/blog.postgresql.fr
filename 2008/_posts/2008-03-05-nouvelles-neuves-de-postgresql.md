---
layout: post
title: "Nouvelles neuves de PostgreSQL"
author: "NBougain"
redirect_from: "index.php?post/drupal-285 "
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 2 mars 2008</strong></p>

<p>La première "commit fest" a débuté ce samedi 1er mars&nbsp;:

<a target="_blank" href="http://developer.postgresql.org/index.php/PostgreSQL_8.4_Development_Plan">http://developer.postgresql.org/index.php/PostgreSQL_8.4_Development_Plan</a></p>

<p>Il y a eu une rencontre PostgreSQL aux Linuxdays de Chemnitz (All.) avec de nombreuses participations et cinq merveilleux organisateurs&nbsp;:

<a target="_blank" href="http://chemnitzer.linux-tage.de/2008/live/detail.html?idx=58">http://chemnitzer.linux-tage.de/2008/live/detail.html?idx=58</a></p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>L'interface Borland Delphin native pour PostgreSQL a été publiée&nbsp;:

<a target="_blank" href="http://dbslim.berlios.de">http://dbslim.berlios.de</a></li>

<li>Un Live PostgreSQL CD à base de Fedora est disponible&nbsp;:

<a target="_blank" href="http://yum.pgsqlrpms.org/livecd.php">http://yum.pgsqlrpms.org/livecd.php</a></li>

</ul>

<!--break-->

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le premier meeting du PUG d'Atlanta aura lieu le 11 mars à 18h30&nbsp;:

<a target="_blank" href="http://pugs.postgresql.org/atlpug">http://pugs.postgresql.org/atlpug</a></li>

<li>Le PUG de la "Sun Coast" se réunira aussi pour la première fois, le 11 mars également&nbsp;:

<a target="_blank" href="http://pugs.postgresql.org/spug">http://pugs.postgresql.org/spug</a></li>

<li>Le LAPUG se réunira le 28 mars à 19h, dans la salle de formation info de la cité "Garden Grove" ("Youth Cafe")&nbsp;:

<a target="_blank" href="http://pugs.postgresql.org/lapug">http://pugs.postgresql.org/lapug</a></li>

<li>Le "PG UK day" aura lieu le 2 avril à Birmingham&nbsp;:

<a target="_blank" href="http://www.postgresql.org.uk/">http://www.postgresql.org.uk/</a></li>

<li>Les PGCon 2008 auront lieu du 20 au 23 mai à Ottawa&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2008/">http://www.pgcon.org/2008/</a></li>

<li>La PostgreSQL Conference East '08 est programmée les 29 et 30 mars 2008 à l'Université du Maryland, College Park&nbsp;:

<a target="_blank" href="http://www.postgresqlconference.org/">http://www.postgresqlconference.org/</a></li>

<li>Le FISL 9.0 se déroulera du 17 au 19 avril 2008 à la PUCRS de Porto Alegre (Brésil)&nbsp;:

<a target="_blank" href="https://fisl.softwarelivre.org/9.0/">https://fisl.softwarelivre.org/9.0/</a></li>

</ul>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a></li>

<li>General Bits, Archives et ses manchettes occasionnelles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></li>

</ul>

<p><em>PostgreSQL Weekly News / les nouvelles hebdomadaires vous sont offertes cette semaine par David Fetter. La traduction en est assurée par l'équipe PostgreSQLFr.</em></p>

<p><em>Proposez vos articles ou annonces avant dimanche 15:00 (heure du Pacifique). Merci de les envoyer en anglais à david (a) fetter.org, en allemand à pwn (a) pgug.de, en italien à pwn (a) itpug.org.</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>Link postgres from all object files at once, to avoid the error-prone SUBSYS.o step and allow for better optimization by the linker. Instead of partial linking into SUBSYS.o, the list of object files is assembled in objfiles.txt files that are expanded when the final linking is done. Because we are not yet sure how long command lines different platforms can handle, the old way of linking is still available, by defining the make variable PARTIAL_LINKING (e.g., make all PARTIAL_LINKING=1). If we determine that this is necessary for some platforms, then we will document this in a more prominent place.</li>

<li>Refactor the code that creates the shared library export files to appear only once in Makefile.shlib and not in four copies.</li>

<li>In pgsql/src/backend/common.mk, we don't need to rebuild objfiles.txt every time an object file changes. So only rebuild when a makefile changes (which presumably defines the file list somewhere), and only touch the file if an object changed. The touch is necessary so the parent make knows something changed and ultimately rebuilds postgres.</li>

<li>In pgsql/src/backend/common.mk, need more dependencies to get the build order right when objfiles.txt doesn't exist yet.</li>

<li>In pgsql/src/Makefile.shlib, escape # character in variable assignment.</li>

<li>Reorganize some of the exports list generation code. It seems that this has been reinvented about four different times throughout history (aix, cygwin, win32, darwin/linux) and a lot of the concepts are actually shared, which the code now shows better.</li>

<li>Create two separate libpq.rc's: One that is built at build time, and one that is shipped in the distribution, named libpq-dist.rc. This way the build system doesn't get upset when a distributed file is forcibly overwritten by during a normal build.</li>

<li>In pgsql/src/interfaces/ecpg/include/Makefile, fix uninstall target.</li>

<li>Don't build the win32 support files in the all target, only in distprep and when they are actually needed as prerequisites.</li>

<li>In pgsql/doc/src/sgml/func.sgml, add information about format modifiers that apply to numeric formats. These were previously only documented in the context of date/time formats.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, change SSH setup instructions to use localhost, which is allowed by default, and a port number above the reserved range with explanations of each. Per Faheem Mitha.</li>

<li>In pgsql/doc/src/sgml/runtime.sgml, add more clarification about SSH tunnels from Faheem Mitha.</li>

<li>In pgsql/src/backend/common.mk, change expand_subsys function so that it preserves the relative order of the files passed as argument. This is desirable so that the dtrace rule in src/backend/Makefile works.</li>

<li>In pgsql/src/backend/common.mk, write the objfiles.txt rules in a way that is compatible with GNU make 3.78, and simpler, too.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>Fix datetime input to behave correctly for Feb 29 in years BC. Formerly, DecodeDate attempted to verify the day-of-the-month exactly, but it was under the misapprehension that it would know whether we were looking at a BC year or not. In reality this check can't be made until the calling function (eg DecodeDateTime) has processed all the fields. So, split the BC adjustment and validity checks out into a new function ValidateDate that is called only after processing all the fields. In passing, this patch makes DecodeTimeOnly work for BC inputs, which it never did before. (The historical veracity of all this is nonexistent, of course, but if we're going to say we support proleptic Gregorian calendar then we should do it correctly. In any case the unpatched code is broken because it could emit dates that it would then reject on re-inputting.) Per report from Bernd Helmle. Back-patch as far as 8.0; in 7.x we were not using our own calendar support and so this seems a bit too risky to put into 7.4.</li>

<li>In pgsql/src/backend/utils/adt/datetime.c, reject year zero during datetime input, except when it's a 2-digit year (then it means 2000 AD). Formerly we silently interpreted this as 1 BC, which at best is unwarranted familiarity with the implementation. It's barely possible that some app somewhere expects the old behavior, though, so we won't back-patch this into existing release branches.</li>

<li>In pgsql/src/backend/utils/adt/encode.c, fix encode(...bytea..., 'escape') so that it converts all high-bit-set byte values into \nnn octal escape sequences. When the database encoding is multibyte this is *necessary* to avoid generating invalidly encoded text. Even in a single-byte encoding, the old behavior seems very hazardous --- consider for example what happens if the text is transferred to another database with a different encoding. Decoding would then yield some other bytea value than what was encoded, which is surely undesirable. Per gripe from Hernan Gonzalez. Backpatch to 8.3, but not further. This is a bit of a judgment call, but I make it on these grounds: pre-8.3 we don't really have much encoding safety anyway because of the convert() function family, and we would also have much higher risk of breaking existing apps that may not be expecting this behavior. 8.3 is still new enough that we can probably get away with making this change in the function's behavior.</li>

<li>In pgsql/src/backend/utils/cache/relcache.c, if RelationBuildDesc() fails to open a critical system index, PANIC with a relevant error message instead of just dumping core. Odd that nobody reported this before Darren Reed.</li>

<li>In pgsql/src/backend/access/heap/tuptoaster.c, reducing the assumed alignment of struct varlena means that the compiler is also licensed to put a local variable declared that way at an unaligned address. Which will not work if the variable is then manipulated with SET_VARSIZE or other macros that assume alignment. So the previous patch is not an unalloyed good, but on balance I think it's still a win, since we have very few places that do that sort of thing. Fix the one place in tuptoaster.c that does it. Per buildfarm results from gypsy_moth (I'm a bit surprised that only one machine showed a failure).</li>

<li>In pgsql/src/backend/utils/adt/xml.c, disable the undocumented xmlvalidate() function, which was unintentionally left in the code though it was not meant to be provided. It represents a security hole because unprivileged users could use it to look at (at least the first line of) any file readable by the backend. Fortunately, this is only possible if the backend was built with XML support, so the damage is at least mitigated; and 8.3 probably hasn't propagated into any security-critical uses yet anyway. Per report from Sergey Burladyan.</li>

<li>Fix unportable usages of tolower(). On signed-char machines, it is necessary to explicitly cast the output back to char before comparing it to a char value, else we get the wrong result for high-bit-set characters. Found by Rolf Jentsch. Also, fix several places where &lt;ctype.h&gt; functions were being called without casting the argument to unsigned char; this is likewise unportable, but we keep making that mistake :-(. These found by buildfarm member salamander, which I will desperately miss if it ever goes belly-up.</li>

<li>In pgsql/src/backend/storage/large_object/inv_api.c, fix another place that was assuming that a local variable declared as "struct varlena" would be at least word-aligned. Per buildfarm results from gypsy_moth. I did a little bit of trawling for other instances of this coding pattern, and didn't find any; but if we turn up any more of them I think we'd better revert the "char [4]" patch and find another way of making tuptoaster.c alignment-safe.</li>

<li>Venezuela Time now means UTC-4:30, not UTC-4:00. Adjust our treatment of "VET" accordingly. Per bug #3997 from Aaron Mizrachi.</li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>Support for building contrib/uuid-ossp with MSVC. Original patch from Hiroshi Saito, modified by me.</li>

<li>Fix handling of restricted processes for Windows Vista (mainly), by explicitly adding back the user to the DACL of the new process. This fixes the failure case when executing as the Administrator user, which had no permissions left at all after we dropped the Administrators group. Dave Page with some modifications from me</li>

</ul>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>Fix several memory leaks when rescanning SRFs. Arrange for an SRF's "multi_call_ctx" to be a distinct sub-context of the EState's per-query context, and delete the multi_call_ctx as soon as the SRF finishes execution. This avoids leaking SRF memory until the end of the current query, which is particularly egregious when the SRF is scanned multiple times. This change also fixes a leak of the fields of the AttInMetadata struct in shutdown_MultiFuncCall(). Also fix a leak of the SRF result TupleDesc when rescanning a FunctionScan node. The TupleDesc is allocated in the per-query context for every call to ExecMakeTableFunctionResult(), so we should free it after calling that function. Since the SRF might choose to return a non-expendable TupleDesc, we only free the TupleDesc if it is not being reference-counted. Backpatch to 8.3 and 8.2 stable branches.</li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>Update TODO wording to read: "Add features of Oracle-style packages (Pavel)."</li>

</ul>

<p>Alvaro Herrera a commité&nbsp;:</p>

<ul>

<li>Remove long-unused and broken TCL_ARRAYS.</li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>Don't call AddUserToDacl on Cygwin.</li>

</ul>

<p>Michael Meskes a commité&nbsp;:</p>

<ul>

<li>In ecpg, fixed bug that caused arrays of varchar to be output with incomplete name. In the process expanded one test case.</li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>Simon Riggs's patch to tune bulk inserts, as it doesn't clean up nicely after a subtransaction abort.</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Hiroshi Saito sent in a patch to fix MinGW builds which Peter Eisentraut's patch moving the build of win32 support files from the "all" target to the "distprep" target broke.</li>

<li>Heikki Linnakangas sent in a revision of his patch to make CopyReadLineText run faster.</li>

<li>Euler Taveira de Oliveira sent in a patch which makes to_char() pay attention to lc_time.</li>

<li>Gevik Babakhani sent in an update to Euler Taveira de Oliveira's patch above.</li>

<li>Kenneth D'Souza sent in a patch to psql which shows incoming foreign key constraints along with the existing out-going foreign key constraints when people invoke \d table_name.</li>

<li>Markus Bertheau sent in a patch intended to fix holes in the backup.sgml docs.</li>

<li>Peter Eisentraut sent in a patch which factors out four nearly identical copies of multiplatform shared library exports file generation code, placing it in one spot.</li>

<li>Rober Lor sent in three revisions of a patch intended to add DTrace probes for OS/X Leopard.</li>

<li>Neil Conway sent in a patch which allows an array of Datums + nulls to be inserted into a tuplestore without first creating a HeapTuple, eliminating an unneeded copy.</li>

<li>ITAGAKI Takahiro sent in a patch to log conflicted queries on deadlocks.</li>

<li>Alvaro Herrera sent in a patch which modifies the interactions in sinval.c and sinvaladt.c.</li>

<li>Zdenek Kotala sent in a patch to remove FATAL from pg_lzdecompress by adding some boundary checks and memory overwriting protection when compressed data is corrupted.</li>

<li>Heikki Linnakangas sent in a patch to speed up CopyReadAttributesCSV.</li>

<li>Mark Wong sent in a patch intended to correct posix_fadvise() in xlog.c.</li>

</ul>