---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 23 mai 2010"
author: "NBougain"
redirect_from: "index.php?post/2010-05-29-nouvelles-hebdomadaires-de-postgresql-23-mai-2010 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Abandon the use of Perl's Safe.pm to enforce restrictions in plperl, as it is fundamentally insecure. Instead apply an opmask to the whole interpreter that imposes restrictions on unsafe operations. These restrictions are much harder to subvert than is Safe.pm, since there is no container to be broken out of. Backported to release 7.4. In releases 7.4, 8.0 and 8.1 this also includes the necessary backporting of the two interpreters model for plperl and plperlu adopted in release 8.2. In versions 8.0 and up, the use of Perl's POSIX module to undo its locale mangling on Windows has become insecure with these changes, so it is replaced by our own routine, which is also faster. Nice side effects of the changes include that it is now possible to use perl's "strict" pragma in a natural way in plperl, and that perl's $a and $b variables now work as expected in sort routines, and that function compilation is significantly faster. Tim Bunce and Andrew Dunstan, with reviews from Alex Hunsaker and Alexey Klyukin. Security: CVE-2010-1169</li>

<li>In pgsql/src/tools/msvc/Mkvcbuild.pm, fix MSVC builds for recent plperl changes. Go back to version 8.2, which is where we started supporting MSVC builds. Security: CVE-2010-1169.</li>

<li>In pgsql/src/pl/plperl/plperl.c, follow up a visit from the style police.</li>

<li>In pgsql/src/pl/plperl/expected/plperl_init.out, fix regression tests to match error message change.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Prevent PL/Tcl from loading the "unknown" module from pltcl_modules unless that is a regular table or view owned by a superuser. This prevents a trojan horse attack whereby any unprivileged SQL user could create such a table and insert code into it that would then get executed in other users' sessions whenever they call pltcl functions. Worse yet, because the code was automatically loaded into both the "normal" and "safe" interpreters at first use, the attacker could execute unrestricted Tcl code in the "normal" interpreter without there being any pltclu functions anywhere, or indeed anyone else using pltcl at all: installing pltcl is sufficient to open the hole. Change the initialization logic so that the "unknown" code is only loaded into an interpreter when the interpreter is first really used. (That doesn't add any additional security in this particular context, but it seems a prudent change, and anyway the former behavior violated the principle of least astonishment.) Security: CVE-2010-1170</li>

<li>Update release notes with security issues. Security: CVE-2010-1169, CVE-2010-1170</li>

<li>In pgsql/doc/src/sgml/config.sgml, fix index entry for lo_compat_privileges, per bug #5467 from KOIZUMI Satoru.</li>

<li>Fix oversight in join removal patch: we have to delete the removed relation from SpecialJoinInfo relid sets as well. Per example from Vaclav Novotny.</li>

<li>In pgsql/contrib/pg_upgrade/check.c, issue_warnings() has no business freeing its parameter, especially not when its sole caller does that too. Jan Matousek, via Pavel Stehule</li>

</ul>

<p>Alvaro Herrera a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/show.sgml, make table in example less wide.</li>

</ul>

<p>Robert Haas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ref/notify.sgml, move pg_notify() details to a subsection within the NOTIFY reference page. This allows the index to reference the pg_notify() subsection specifically, rather than Notes section of the NOTIFY reference page more generally. Fujii Masao</li>

<li>In pgsql/src/bin/psql/command.c, unbreak \h; can't do strlen(NULL). This was broken by the following commmit. Although the original commit was backpatched all the way to 7.4, this particular bug exists only in the version applied to HEAD. 

<a target="_blank" href="http://archives.postgresql.org/pgsql-committers/2010-05/msg00058.php">http://archives.postgresql.org/pgsql-committers/2010-05/msg00058.php</a></li>

</ul>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/contrib/pg_upgrade/TESTING, add pg_upgrade TESTING files explaining a testing method.</li>

<li>In pgsql/contrib/pg_upgrade/pg_upgrade.c, use a 'datallowconn' check for avoiding 'template0', rather than hardcoding a 'template0' check, per suggestion from Alvaro. This might fix a problem where someone has allowed 'template0' connections, but it is a cleaner approach even if doesn't fix the bug.</li>

<li>In pgsql/contrib/pg_upgrade/pg_upgrade.c, for pg_upgrade, update template0's datfrozenxid and its relfrozenxids to match the behavior of autovacuum, which does this as the xid advances even if autovacuum is turned off.</li>

<li>In pgsql/contrib/pg_upgrade/info.c, simplify pg_upgrade queries by using IN instead of multiple OR clauses comparing the same column to multiple values.</li>

<li>Add command-line documentation for pg_upgrade.</li>

<li>In pgsql/doc/src/sgml/oid2name.sgml, restore oid2name doc change.</li>

<li>In pgsql/doc/src/sgml/pgupgrade.sgml, pg_upgrade doc cleanup. Stefan Kaltenbrunner</li>

<li>In pgsql/doc/src/sgml/pgupgrade.sgml, doc change: Rename of directory no longer required for pg_migrator 9.0. Alvaro Herrera</li>

<li>In pgsql/doc/src/sgml/pgupgrade.sgml, SGML markup cleanup for pg_upgrade.</li>

<li>In pgsql/doc/src/sgml/oid2name.sgml, show oid2name command-line arguments in documentation like we do for non-contrib command-line tools (no longer in a single table display).</li>

</ul>

<p>Magnus Hagander a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/pgupgrade.sgml, make pg_upgrade documentation refer to 9.0 instead of 8.4. Fujii Masao.</li>

<li>In pgsql/doc/src/sgml/config.sgml, refer to pg_ident.conf as config file for username mapping, as it's now used for other things than just ident authentication. Noted by Stephen Frost</li>

<li>In pgsql/src/timezone/pgtz.c, change the "N. Central Asia Standard Time" timezone to map to Asia/Novosibirsk on Windows. Microsoft changed the behaviour of this zone in the timezone update from KB976098. The zones differ in handling of DST, and the old zone was just removed. Noted by Dmitry Funk.</li>

</ul>

<p>Michael Meskes a commit&eacute;&nbsp;:</p>

<ul>

<li>Ecpg now accepts "long long" datatypes even if "long" is 64bit wide. This used to cover the equally long "long long" type. This patch closes bug #5464.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Stephen Frost sent in two more revisions of a patch to fix psql's ability to clean up when quitting the pager, which resulted in queries continuing to run after the pager exited.</li>

<li>Fujii Masao sent in two revisions of a patch to fix smart shutdown for Hot Standby.</li>

<li>Fujii Masao sent in a patch to distinguish normal shutdown from unexpected exit, while the server is in recovery.</li>

<li>Tom Lane sent in a patch to fix a performance issue with textanycat/anytextcat.</li>

<li>Alvaro Herrera sent in a patch to fix an issue with fillfactor on TOAST tables.</li>

<li>Florian Pflug sent in two revisions of a patch to fix SERIALIZABLE transactions.</li>

<li>Kevin Grittner sent in a WIP patch for 9.1 to do true SERIALIZABLE using predicate locking.</li>

<li>Joel Jacobson sent in another revision of the patch to implement pg_stat_transaction.</li>

<li>Robert Haas sent in a patch to add a hook called ExecutorCheckPerms(), per discussion.</li>

<li>Andres Freund sent in a patch which replaces the current CRC32 with a more efficient version from zlib.</li>

<li>Jeff Davis sent in a patch to change a sanity check in exclusion constraints.</li>

<li>Jeff Davis sent in a patch for 9.1 to add btree_gist support for the "&gt;&lt;" operator.</li>

</ul>