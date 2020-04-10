---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 6 décembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-12-10-nouvelles-hebdomadaires-de-postgresql-6-decembre-2009 "
---



<p><strong>Revues</strong></p>

<ul>

<li>Josh Tolley reviewed the PL/Python array support patch and sent a patch atop it to fix regression tests.</li>

<li>Jeff Davis reviewed Joachim Wieland's Listen/Notify patch and requested further rework from the author.</li>

<li>Andrew (RhodiumToad) Gierth reviewed Hitoshi Harada's patch to improve window frame control with ROWS BETWEEN. To complete the review, he will need a decision on the API for aggregate functions.</li>

<li>Hitoshi Harada marked Andrew (RhodiumToad) Gierth's patch, "ready for committer."</li>

<li>Simon Riggs did a preliminary review of ITAGAKI Takahiro's partitioning syntax patch.</li>

<li>ITAGAKI Takahiro reviewed Greg Smith's patch to enable resetting statistics.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/ecpg.sgml, properly indent SGML.</li>

<li>There is no reference to THREAD_SUPPORT outside configure, and it is never set, so remove it.</li>

<li>In pgsql/doc/src/sgml/hstore.sgml, update hstore docs, mostly word-smithing. David E. Wheeler</li>

<li>Add ProcessUtility_hook() to handle all DDL to contrib/pg_stat_statements. Itagaki Takahiro.</li>

<li>Revert due to Tom's concerns: Add ProcessUtility_hook() to handle all DDL to contrib/pg_stat_statements.</li>

<li>Adjust 'psql -f -' to behave like a normal file and honor the -1 flag. Report from Robert Haas.</li>

<li>Enable thread safety on all platforms. This will either be followed up by a more extensive patch, or reverted, depending on the build farm results.</li>

<li>Apply full patch to enable thread-safety by default, e.g. doc changes.</li>

</ul>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/doc/src/sgml/xfunc.sgml, in SRF example, move oldcontext variable definition into the FIRSTCALL branch, which is how most actual code is actually structured. Also fix slight whitespace misalignment.</li>

<li>In pgsql/doc/src/sgml/information_schema.sgml, add a sentence of documentation about the differences between the *_privileges and the role_*_grants views.</li>

<li>Speed up information schema privilege views. Instead of expensive cross joins to resolve the ACL, add table-returning function aclexplode() that expands the ACL into a useful form, and join against that. Also, implement the role_*_grants views as a thin layer over the respective *_privileges views instead of essentially repeating the same code twice. Fixes bug #4596. By Joachim Wieland, with cleanup by me.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/tsearch/dict_thesaurus.c, avoid core dump on empty thesaurus dictionary. Per report from Robert Gravsjo.</li>

<li>Teach the regular expression functions to do case-insensitive matching and locale-dependent character classification properly when the database encoding is UTF8. The previous coding worked okay in single-byte encodings, or in any case for ASCII characters, but failed entirely on multibyte characters. The fix assumes that the &lt;wctype.h&gt; functions use Unicode code points as the wchar representation for Unicode, ie, wchar matches pg_wchar. This is only a partial solution, since we're still stupid about non-ASCII characters in multibyte encodings other than UTF8. The practical effect of that is limited, however, since those cases are generally Far Eastern glyphs for which concepts like case-folding don't apply anyway. Certainly all or nearly all of the field reports of problems have been about UTF8. A more general solution would require switching to the platform's wchar representation for all regex operations; which is possible but would have substantial disadvantages. Let's try this and see if it's sufficient in practice.</li>

<li>Instead of sending application_name as a SET command after the connection is made, include it in the startup-packet options. This makes it work more like every other libpq connection option, in particular it now has the same response to RESET ALL as the rest. This also saves one network round trip for new applications using application_name. The cost is that if the server is pre-8.5, it'll reject the startup packet altogether, forcing us to retry the entire connection cycle. But on balance we shouldn't be optimizing that case in preference to the behavior with a new server, especially when doing so creates visible behavioral oddities. Per discussion.</li>

<li>Mark application_name as GUC_REPORT so that the value will be reported back to the client by the server. This might seem pretty pointless but apparently it will help pgbouncer, and perhaps other connection poolers. Anyway it's practically free to do so for the normal use-case where appname is only set in the startup packet --- we're just adding a few more bytes to the initial ParameterStatus response packet. Per comments from Marko Kreen.</li>

<li>In pgsql/src/backend/postmaster/postmaster.c, ignore attempts to set "application_name" in the connection startup packet. This avoids a useless connection retry and complaint in the postmaster log when receiving a connection from 8.5 or later libpq. Backpatch in all supported branches, but of course *not* HEAD.</li>

<li>In pgsql/doc/src/sgml/ref/rollback_to.sgml, clarify what's supposed to happen when a cursor FETCH is rolled back by aborting a subtransaction. Per discussion with Heikki.</li>

<li>In pgsql/src/include/catalog/pg_proc.h, don't use a duplicate OID for aclexplode().</li>

</ul>

<p>Teodor Sigaev a commit&eacute;&nbsp;:</p>

<ul>

<li>in contrib/btree_gist, prevent intersection of ranges during page split. Changes are only optimization, so don't backpatch.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in temporary file management with subtransactions. A cursor opened in a subtransaction stays open even if the subtransaction is aborted, so any temporary files related to it must stay alive as well. With the patch, we use ResourceOwners to track open temporary files and don't automatically close them at subtransaction end (though in the normal case temporary files are registered with the subtransaction resource owner and will therefore be closed). At end of top transaction, we still check that there's no temporary files marked as close-at-end-of-transaction open, but that's now just a debugging cross-check as the resource owner cleanup should've closed them already.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in another revision of the YAML output patch for EXPLAIN.</li>

<li>ITAGAKI Takahiro sent in another revision of the VACUUM FULL patch per review from Jeff Davis. Jeff Davis sent three patches atop that one.</li>

<li>Andrew (RhodiumToad) Gierth sent in another revision of the patch to add ORDER BY to aggregates.</li>

<li>KaiGai Kohei sent in another revision of the SE-PostgreSQL patch.</li>

<li>ITAGAKI Takahiro sent in a patch to modify the result type of pg_read_file to bytea.</li>

<li>Bruce Momjian sent in two revisions of a patch to enable thread safety in client libraries by default.</li>

<li>Zdenek Kotala sent in another revision of a patch to correct the Docbook path in Solaris.</li>

<li>Tsutomu Yamada sent in two revisions of a patch to support Windows 64.</li>

<li>Caleb Welton sent in two revisions of a patch to fix int2vectorin.</li>

<li>Jeff Davis sent in another revision of the operator exclusion constraints patch per review from Robert Haas.</li>

<li>Michael Paquier sent in two more revisions of the patch to add shell calls to pgbench, per review from Greg Smith.</li>

<li>ITAGAKI Takahiro sent in another revision of the ProcessUtility_hook patch per feedback from Tom Lane.</li>

<li>Bruce Momjian sent in a patch to install PL/pgsql by default.</li>

<li>Tim Bunce sent in a patch to refactor PL/Perl, and a patch atop that to add some new GUCs with promising names including plperl.on_perl_init, plperl.on_trusted_init, and plperl.on_untrusted_init, along with some bug fixes and general code correctness improvements.</li>

<li>KaiGai Kohei sent in another revision of the ACL patch for large objects.</li>

<li>ITAGAKI Takahiro sent in another revision of the SQL syntax patch for partitioning.</li>

<li>Zdenek Kotala sent in another revision of the patch to enable pg_ctl to do an initdb.</li>

<li>Hitoshi Harada sent in another revision of the ROWS functionality for windowing per review from Andrew (RhodiumToad) Gierth.</li>

<li>Jeff Davis sent in another revision of the VACUUM FULL removal patch.</li>

<li>Greg Smith sent in a patch to enable resetting statistics.</li>

<li>Simon Riggs sent in a patch to fix an issue with running out of lock space in certain hot standby scenarios.</li>

</ul>