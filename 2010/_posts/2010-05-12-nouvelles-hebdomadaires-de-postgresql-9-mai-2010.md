---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 9 mai 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-05-12-nouvelles-hebdomadaires-de-postgresql-9-mai-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Add cross-reference from wal_level to hot_standby setting. Update the PITR documentation to mention that you need to set wal_level to 'archive' or 'hot_standby', to enable WAL archiving. Per Simon Riggs's request.</li>

<li>In pgsql/doc/src/sgml/high-availability.sgml, change "literal" tag to the more appropriate "firstterm", when describing what "eventually consistent" means.</li>

<li>In pgsql/doc/src/sgml/config.sgml, change wording so that you don't need to understand that wal_levels form a hierarchy. Per Simon Riggs's suggestion.</li>

<li>In pgsql/src/backend/access/transam/xlog.c, need to hold ControlFileLock while updating control file. Update minRecoveryPoint in control file when replaying a parameter change record, to ensure that we don't allow hot standby on WAL generated without wal_level='hot_standby' after a standby restart.</li>

<li>In pgsql/doc/src/sgml/intarray.sgml, fix incorrect parameter tag in docs, spotted by KOIZUMI Satoru.</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/mvcc.sgml, remove spurious dot, per bug #5446 reported by Koizumi Satoru.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix backpatching error in recent patch for ALTER USER f RESET ALL behavior. The argument list for array_set() changed in 8.2 (in connection with allowing nulls in arrays) but the newer argument list was used in the patches applied to 8.1 and 8.0 branches. The patch for 7.4 was OK though. Per compiler warnings.</li>

<li>In pgsql/src/bin/psql/psqlscan.l, fix psql to not go into infinite recursion when expanding a variable that refers to itself (directly or indirectly). Instead, print a message when recursion is detected, and don't expand the repeated reference. Per bug #5448 from Francis Markham. Back-patch to 8.0. Although the issue exists in 7.4 as well, it seems impractical to fix there because of the lack of any state stack that could be used to track active expansions.</li>

<li>In pgsql/src/makefiles/Makefile.linux, on Linux, use --enable-new-dtags when specifying -rpath to linker. This should allow LD_LIBRARY_PATH to work as desired. Per trouble report from Andy Colson.</li>

<li>Work around a subtle portability problem in use of printf %s format. Depending on which spec you read, field widths and precisions in %s may be counted either in bytes or characters. Our code was assuming bytes, which is wrong at least for glibc's implementation, and in any case libc might have a different idea of the prevailing encoding than we do. Hence, for portable results we must avoid using anything more complex than just "%s" unless the string to be printed is known to be all-ASCII. This patch fixes the cases I could find, including the psql formatting failure reported by Hernan Gonzalez. In HEAD only, I also added comments to some places where it appears safe to continue using "%.*s".</li>

<li>Adjust comments about avoiding use of printf's %.*s. My initial impression that glibc was measuring the precision in characters (which is what the Linux man page says it does) was incorrect. It does take the precision to be in bytes, but it also tries to truncate the string at a character boundary. The bottom line remains the same: it will mess up if the string is not in the encoding it expects, so we need to avoid %.*s anytime there's a significant risk of that. Previous code changes are still good, but adjust the comments to reflect this knowledge. Per research by Hernan Gonzalez.</li>

<li>In pgsql/doc/src/sgml/ecpg.sgml, fix typo: PGTYPES_NUM_OVERFLOW should be PGTYPES_NUM_UNDERFLOW. Noted by KOIZUMI Satoru.</li>

<li>In pgsql/src/backend/replication/walsender.c, fix missing static declaration for XLogRead().</li>

<li>In pgsql/src/bin/psql/print.c, suppress signed-vs-unsigned-char warning.</li>

</ul>

<p>ITAGAKI Takahiro a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/port/chklocale.c, code page for EUC-KR is surely 51949.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/interfaces/ecpg/ecpglib/connect.c, ECPG connect routine only checked for NULL to find empty parameters, but user and password can also be "".</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Pavel Stehule sent in a patch to remove the limit on the number of parameters passed to xslt_process() in contrib/xml2. It had been 10.</li>

<li>Simon Riggs sent in a WIP patch to change max_standby_delay to rely on WAL receipt timestamp instead of log timestamp, per suggestion from Tom Lane.</li>

<li>Pavel Stehule sent in a patch to add new optional arguments to string_to_array() and array_to_string() which allow for an explicit NULL string rather than to have NULL disappear unconditionally.</li>

<li>Peter Eisentraut sent in a patch to fix bug 5447, which relates to VPATH builds.</li>

<li>Simon Riggs sent in a patch intended to fix the issue where Hot Standby/Streaming Replication databases have slower queries on replicas than origin.</li>

<li>Pavel Stehule sent in a patch to create to_string() and to_array() functions which include NULL handling different from the current "eliminate NULLs" behavior of array_to_string() and string_to_array().</li>

<li>Andy Lester and Robert Haas traded patches to clarify some CLUSTER behavior.</li>

<li>Joel Jacobson and ITAGAKI Takahiro traded patches to add some new stat transaction views for 9.1.</li>

<li>Nikhil Sontakke sent in two revisions of a patch intended to change the behavior of memory with set-returning functions.</li>

<li>Simon Riggs sent in a patch intended to fix some behavior with Hot Standby.</li>

<li>Simon Riggs sent in a patch to add a SQLSTATE for Hot Standby.</li>

<li>Robert Haas sent in a patch to avert doom around temprels.</li>

</ul>