---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 13 février 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/02/19/Nouvelles-hebdomadaires-de-PostgreSQL-13-février-2011"
---


<p>Selena Deckelmann offre une formation en ligne via CodeLesson&nbsp;: 

<a target="_blank" href="http://codelesson.com/courses/view/introduction-to-postgresql">http://codelesson.com/courses/view/introduction-to-postgresql</a></p>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PUG de New-York se r&eacute;unira le 15 f&eacute;vrier 2011 &agrave; 18h15 dans les bureaux de Yodle, au 50 de la 23&egrave;me rue Ouest &agrave; New-York. Plus d'infos et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/postgresql-3/events/16123790/">http://www.meetup.com/postgresql-3/events/16123790/</a></li>

<li>Le PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011.</li>

<li>PostgreSQL Conference East 2011&nbsp;: New-York City, du 22 au 25 mars&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

<li>PGCon will be May 19-20, 2011 at the University of Ottawa, preceded by two days of tutorials on May 17-18.</li>

<li>PGCon aura lieu les 19 &amp; 20 mai 2011 &agrave; l'Universit&eacute; d'Ottawa, pr&eacute;c&eacute;d&eacute; par deux jours de tutoriels les 17 &amp; 18 mai&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2011/">http://www.pgcon.org/2011/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110213">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<ul>

<li>Erik Rijkers reviewed the patch to add range types.</li>

</ul>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>remove tags. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ad762426333aac5bd8e1ceac753bebe4a6411c28">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=ad762426333aac5bd8e1ceac753bebe4a6411c28</a></li>

<li>Remove tabs in SGML file. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee4b67fcff9cce85812639b3a0ef14f5bcf85f99">http://git.postgresql.org/pg/commitdiff/ee4b67fcff9cce85812639b3a0ef14f5bcf85f99</a></li>

<li>Remove more SGML tabs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/70802e0dbef0af4bf73ce25489b8be6e40eca2be">http://git.postgresql.org/pg/commitdiff/70802e0dbef0af4bf73ce25489b8be6e40eca2be</a></li>

<li>Fix pg_get_encoding_from_locale() function call parameters to match prototype for cases where there is no multi-language support. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2432d10bf243ad0ca9b5ccc2816e4e38e1d80b5e">http://git.postgresql.org/pg/commitdiff/2432d10bf243ad0ca9b5ccc2816e4e38e1d80b5e</a></li>

<li>Fix "variable not used" warnings when USE_WIDE_UPPER_LOWER is not defined. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/135724ec357f9b9c8800567444724c72da2cc6be">http://git.postgresql.org/pg/commitdiff/135724ec357f9b9c8800567444724c72da2cc6be</a></li>

<li>Properly handle Win32 paths of 'E:abc', which can be either absolute or relative, by creating a function path_is_relative_and_below_cwd() to check for specific requirements. It is unclear if this fixes a security problem or not but the new code is more robust. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0de0cc150af46122238f2fe03605bf14e1a7c276">http://git.postgresql.org/pg/commitdiff/0de0cc150af46122238f2fe03605bf14e1a7c276</a></li>

<li>Fix reverse 'if' test in path_is_relative_and_below_cwd(), per Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e7af608722a25376d31c40e4bd9916e932bc3ca">http://git.postgresql.org/pg/commitdiff/8e7af608722a25376d31c40e4bd9916e932bc3ca</a></li>

<li>Back out libpq doc change; not ready yet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cebbaa1d5d2729c1b9dde0b472b4b034ef2f44b0">http://git.postgresql.org/pg/commitdiff/cebbaa1d5d2729c1b9dde0b472b4b034ef2f44b0</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix error messages for FreeFile in COPY command. They are extracted from COPY API patch. suggested by Noah Misch 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fb7355e0cedfadd437c30c73cfb71af7ff8933b1">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=fb7355e0cedfadd437c30c73cfb71af7ff8933b1</a></li>

<li>Fix a comment for MergeAttributes. We forgot to adjust it when we changed relistemp to relpersistence. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c18f51da17d8cf01d62218e0404e18ba246bde54">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c18f51da17d8cf01d62218e0404e18ba246bde54</a></li>

<li>Fix typo in the documentation. By Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5478f991c9f73066d27d75b31876f9977af61db5">http://git.postgresql.org/pg/commitdiff/5478f991c9f73066d27d75b31876f9977af61db5</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Supply now required HeUTF8 macro for plperl where it's missing, per buildfarm results. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c852e95b0bcbe708ba64b9499e50b9cc98bd7b71">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c852e95b0bcbe708ba64b9499e50b9cc98bd7b71</a></li>

<li>Use correct name and URL for MinGW-w64, error noticed by Gurjeet Singh. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ad0348677aebe36260b30fee22892e6519ee7d8">http://git.postgresql.org/pg/commitdiff/2ad0348677aebe36260b30fee22892e6519ee7d8</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Implement genuine serializable isolation level. Until now, our Serializable mode has in fact been what's called Snapshot Isolation, which allows some anomalies that could not occur in any serialized ordering of the transactions. This patch fixes that using a method called Serializable Snapshot Isolation, based on research papers by Michael J. Cahill (see README-Steve Singer for full references). In Serializable Snapshot Isolation, transactions run like they do in Snapshot Isolation, but a predicate lock manager observes the reads and writes performed and aborts transactions if it detects that an anomaly might occur. This method produces some false positives, ie. it sometimes aborts transactions even though there is no anomaly. To track reads we implement predicate locking, see storage/lmgr/predicate.c. Whenever a tuple is read, a predicate lock is acquired on the tuple. Shared memory is finite, so when a transaction takes many tuple-level locks on a page, the locks are promoted to a single page-level lock, and further to a single relation level lock if necessary. To lock key values with no matching tuple, a sequential scan always takes a relation-level lock, and an index scan acquires a page-level lock that covers the search key, whether or not there are any matching keys at the moment. A predicate lock doesn't conflict with any regular locks or with another predicate locks in the normal sense. They're only used by the predicate lock manager to detect the danger of anomalies. Only serializable transactions participate in predicate locking, so there should be no extra overhead for for other transactions. Predicate locks can't be released at commit, but must be remembered until all the transactions that overlapped with it have completed. That means that we need to remember an unbounded amount of predicate locks, so we apply a lossy but conservative method of tracking locks for committed transactions. If we run short of shared memory, we overflow to a new "pg_serial" SLRU pool. We don't currently allow Serializable transactions in Hot Standby mode. That would be hard, because even read-only transactions can cause anomalies that wouldn't otherwise occur. Serializable isolation mode now means the new fully serializable level. Repeatable Read gives you the old Snapshot Isolation level that we have always had. Kevin Grittner and Dan Ports, reviewed by Jeff Davis, Heikki Linnakangas and Anssi K&auml;&auml;ri&auml;inen 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dafaa3efb75ce1aae2e6dbefaf6f3a889dea0d21">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=dafaa3efb75ce1aae2e6dbefaf6f3a889dea0d21</a></li>

<li>Oops, forgot to bump catversion in the Serializable Snapshot Isolation patch. I thought we didn't need that, but then I remembered that it added a new SLRU subdirectory, pg_serial. While we're at it, document what pg_serial is. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=47082fa875179ae629edb26807ab3f38a775280b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=47082fa875179ae629edb26807ab3f38a775280b</a></li>

<li>Fix copy-pasto in description of pg_serial, and silence compiler warning about uninitialized field you get on some compilers. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7202ad7b8dd07864092be70287fe971ec72a3fbc">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7202ad7b8dd07864092be70287fe971ec72a3fbc</a></li>

<li>UINT64_MAX isn't defined on MSVC. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9f9d696a9c51cb26c24bb28760e6bb1edd0e995">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=f9f9d696a9c51cb26c24bb28760e6bb1edd0e995</a></li>

<li>Fix typo, by Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1703f0e8da2e8e3eccb6e12879c011ba106f8a62">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=1703f0e8da2e8e3eccb6e12879c011ba106f8a62</a></li>

<li>Fix allocation of RW-conflict pool in the new predicate lock manager, and also take the RW-conflict pool into account in the PredicateLockShmemSize() estimate. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/036bb15872fa52f6f403ca22d36a8652bbaf9d3c">http://git.postgresql.org/pg/commitdiff/036bb15872fa52f6f403ca22d36a8652bbaf9d3c</a></li>

<li>Allocate all entries in the serializable xid hash up-front, so that you don't run out of shared memory when you try to assign an xid to a transaction. Kevin Grittner. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cecb5901b8bb8b9eba140cda96e0d9a83607e6fa">http://git.postgresql.org/pg/commitdiff/cecb5901b8bb8b9eba140cda96e0d9a83607e6fa</a></li>

<li>Send status updates back from standby server to master, indicating how far the standby has written, flushed, and applied the WAL. At the moment, this is for informational purposes only, the values are only shown in pg_stat_replication system view, but in the future they will also be needed for synchronous replication. Extracted from Simon riggs' synchronous replication patch by Robert Haas, with some tweaking by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b186523fd97ce02ffbb7e21d5385a047deeef4f6">http://git.postgresql.org/pg/commitdiff/b186523fd97ce02ffbb7e21d5385a047deeef4f6</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Avoid having autovacuum workers wait for relation locks. Waiting for relation locks can lead to starvation - it pins down an autovacuum worker for as long as the lock is held. But if we're doing an anti-wraparound vacuum, then we still wait; maintenance can no longer be put off. To assist with troubleshooting, if log_autovacuum_min_duration &gt;= 0, we log whenever an autovacuum or autoanalyze is skipped for this reason. Per a gripe by Josh Berkus, and ensuing discussion. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=32896c40ca766146312b28a5a0eb3f66ca0300ed">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=32896c40ca766146312b28a5a0eb3f66ca0300ed</a></li>

<li>Tweak find_composite_type_dependencies API a bit more. Per discussion with Noah Misch, the previous coding, introduced by my commit 65377e0b9c0e0397b1598b38b6a7fb8b6f740d39 on 2011-02-06, was really an abuse of RELKIND_COMPOSITE_TYPE, since the caller in typecmds.c is actually passing the name of a domain. So go back having a type name argument, but make the first argument a Relation rather than just a string so we can tell whether it's a table or a foreign table and emit the proper error message. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c20ba1fd284423e4652f2f6855d257339245e97">http://git.postgresql.org/pg/commitdiff/2c20ba1fd284423e4652f2f6855d257339245e97</a></li>

<li>Typo fixes. receivedUpto should be capitalized consistently. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d309acf201ab2c5bbd1f6a5d51e4a8060eb6a63c">http://git.postgresql.org/pg/commitdiff/d309acf201ab2c5bbd1f6a5d51e4a8060eb6a63c</a></li>

<li>Allow tab-completion of :variable even as first word on a line. Christoph Berg 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5917574539732a6e521a6dc260fcd7c9a258d89e">http://git.postgresql.org/pg/commitdiff/5917574539732a6e521a6dc260fcd7c9a258d89e</a></li>

<li>Teach ALTER TABLE .. SET DATA TYPE to avoid some table rewrites. When the old type is binary coercible to the new type and the using clause does not change the column contents, we can avoid a full table rewrite, though any indexes on the affected columns will still need to be rebuilt. This applies, for example, when changing a varchar column to be of type text. The prior coding assumed that the set of operations that force a rewrite is identical to the set of operations that must be propagated to tables making use of the affected table's rowtype. This is no longer true: even though the tuples in those tables wouldn't need to be modified, the data type change invalidate indexes built using those composite type columns. Indexes on the table we're actually modifying can be invalidated too, of course, but the existing machinery is sufficient to handle that case. Along the way, add some debugging messages that make it possible to understand what operations ALTER TABLE is actually performing in these cases. Noah Misch and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d31e2a495b6f2127afc31b4da2e5f4e89aa2cdfe">http://git.postgresql.org/pg/commitdiff/d31e2a495b6f2127afc31b4da2e5f4e89aa2cdfe</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Extend ALTER TABLE to allow Foreign Keys to be added without initial validation. FK constraints that are marked NOT VALID may later be VALIDATED, which uses an ShareUpdateExclusiveLock on constraint table and RowShareLock on referenced table. Significantly reduces lock strength and duration when adding FKs. New state visible from psql. Simon Riggs, with reviews from Marko Tiikkaja and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=722bf7017bbe796decc79c1fde03e7a83dae9ada">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=722bf7017bbe796decc79c1fde03e7a83dae9ada</a></li>

<li>Remove rare corner case for data loss when triggering standby server. If the standby was streaming when trigger file arrives, check also in the archive for additional WAL files. This is a corner case since it is unlikely that we would trigger a failover while the master is still available and sending data to standby, while at the same time running in archive mode and also while the streaming standby has fallen behind archive. Someone would eventually be unlucky; we must plug all gaps however small. Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=faa0550572583f51dba25611ab0f1d1c31de559b">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=faa0550572583f51dba25611ab0f1d1c31de559b</a></li>

<li>Basic Recovery Control functions for use in Hot Standby. Pause, Resume, Status check functions only. Also, new recovery.conf parameter to pause_at_recovery_target, default on. Simon Riggs, reviewed by Fujii Masao 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c6e3adbf792c2bba448e88cbf2c8e03fb802e73">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=8c6e3adbf792c2bba448e88cbf2c8e03fb802e73</a></li>

<li>Named restore points in recovery. Users can record named points, then new recovery.conf parameter recovery_target_name allows PITR to specify named points as recovery targets. Jaime Casanova, reviewed by Euler Taveira de Oliveira, plus minor edits 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c016ce728139be95bb0dc7c4e5640507334c2339">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=c016ce728139be95bb0dc7c4e5640507334c2339</a></li>

<li>Continue long tradition of bumping the catalog version a little late. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7a7d36ec3363d10e0450209a9b451d86a2328b47">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=7a7d36ec3363d10e0450209a9b451d86a2328b47</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Per-column collation support. This adds collation support for columns and domains, a COLLATE clause to override it per expression, and B-tree index support. Peter Eisentraut reviewed by Pavel Stehule, Itagaki Takahiro, Robert Haas, Noah Misch 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=414c5a2ea65cbd38d79ffdf9b1fde7cc75c134e0">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=414c5a2ea65cbd38d79ffdf9b1fde7cc75c134e0</a></li>

<li>Information schema views for collation support. Add the views character_sets, collations, and collation_character_set_applicability. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e2d56fea97f43cf8c40a87143bc10356e4ed4d4">http://git.postgresql.org/pg/commitdiff/2e2d56fea97f43cf8c40a87143bc10356e4ed4d4</a></li>

<li>Update comment. It was still claiming that the keyword list is in keywords.c, when it is now in kwlist.h. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ff81aa3eda4d754cd341ab0e4e78790ed4a6d250">http://git.postgresql.org/pg/commitdiff/ff81aa3eda4d754cd341ab0e4e78790ed4a6d250</a></li>

<li>DDL support for collations: collowner field, CREATE COLLATION, ALTER COLLATION, DROP COLLATION, COMMENT ON COLLATION, integration with extensions, pg_dump support for the above, dependency management, psql tab completion, psql \dO command 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b313bca0afce3ab9dab0a77c64c0982835854b9a">http://git.postgresql.org/pg/commitdiff/b313bca0afce3ab9dab0a77c64c0982835854b9a</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix merge conflict. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0bc0bd07d41169d6de513967615ad9cb3d0f322e">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=0bc0bd07d41169d6de513967615ad9cb3d0f322e</a></li>

<li>Core support for "extensions", which are packages of SQL objects. This patch adds the server infrastructure to support extensions. There is still one significant loose end, namely how to make it play nice with pg_upgrade, so I am not yet committing the changes that would make all the contrib modules depend on this feature. In passing, fix a disturbingly large amount of breakage in AlterObjectNamespace() and callers. Dimitri Fontaine, reviewed by Anssi K&auml;&auml;ri&auml;inen, Itagaki Takahiro, Tom Lane, and numerous others 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d9572c4e3b474031060189050e14ef384b94e001">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=d9572c4e3b474031060189050e14ef384b94e001</a></li>

<li>Suppress some compiler warnings in recent commits. Older versions of gcc tend to throw "variable might be clobbered by `longjmp' or `vfork'" warnings whenever a variable is assigned in more than one place and then used after the end of a PG_TRY block. That's reasonably easy to work around in execute_extension_script, and the overhead of unconditionally saving/restoring the GUC variables seems unlikely to be a serious concern. Also clean up logic in ATExecValidateConstraint to make it easier to read and less likely to provoke "variable might be used uninitialized in this function" warnings. 

<a target="_blank" href="http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=375e5b0a687570eb41fb9e9fda9e5d6992fccffa">http://git.postgresql.org/gitweb?p=postgresql.git;a=commitdiff;h=375e5b0a687570eb41fb9e9fda9e5d6992fccffa</a></li>

<li>Implement "ALTER EXTENSION ADD object". This is an essential component of making the extension feature usable; first because it's needed in the process of converting an existing installation containing "loose" objects of an old contrib module into the extension-based world, and second because we'll have to use it in pg_dump --binary-upgrade, as per recent discussion. Loosely based on part of Dimitri Fontaine's ALTER EXTENSION UPGRADE patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bc178b89f3ab93fb3845a941769c212f5eeaf1a">http://git.postgresql.org/pg/commitdiff/5bc178b89f3ab93fb3845a941769c212f5eeaf1a</a></li>

<li>Rethink order of operations for dumping extension member objects. My original idea of doing extension member identification during getDependencies() didn't work correctly: we have to mark member tables as not-to-be-dumped rather earlier than that, else their subsidiary objects like indexes get dumped anyway. Rearrange code to mark them early enough. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/183d3cff850eee12357b8b4a8c5e62362ba5d8cc">http://git.postgresql.org/pg/commitdiff/183d3cff850eee12357b8b4a8c5e62362ba5d8cc</a></li>

<li>Fix pg_upgrade to handle extensions. This follows my proposal of yesterday, namely that we try to recreate the previous state of the extension exactly, instead of allowing CREATE EXTENSION to run a SQL script that might create some entirely-incompatible on-disk state. In --binary-upgrade mode, pg_dump won't issue CREATE EXTENSION at all, but instead uses a kluge function provided by pg_upgrade_support to recreate the pg_extension row (and extension-level pg_depend entries) without creating any member objects. The member objects are then restored in the same way as if they weren't members, in particular using pg_upgrade's normal hacks to preserve OIDs that need to be preserved. Then, for each member object, ALTER EXTENSION ADD is issued to recreate the pg_depend entry that marks it as an extension member. In passing, fix breakage in pg_upgrade's enum-type support: somebody didn't fix it when the noise word VALUE got added to ALTER TYPE ADD. Also, rationalize parsetree representation of COMMENT ON DOMAIN and fix get_object_address() to allow OBJECT_DOMAIN. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/caddcb8f4b96ce48b612e7c987ecde654d624616">http://git.postgresql.org/pg/commitdiff/caddcb8f4b96ce48b612e7c987ecde654d624616</a></li>

<li>Fix improper matching of resjunk column names for FOR UPDATE in subselect. Flattening of subquery range tables during setrefs.c could lead to the rangetable indexes in PlanRowMark nodes not matching up with the column names previously assigned to the corresponding resjunk ctid (resp. tableoid or wholerow) columns. Typical symptom would be either a "cannot extract system attribute from virtual tuple" error or an Assert failure. This wasn't a problem before 9.0 because we didn't support FOR UPDATE below the top query level, and so the final flattening could never renumber an RTE that was relevant to FOR UPDATE. Fix by using a plan-tree-wide unique number for each PlanRowMark to label the associated resjunk columns, so that the number need not change during flattening. Per report from David Johnston (though I'm darned if I can see how this got past initial testing of the relevant code). Back-patch to 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e617f0d7e4084f85104361568ef5f865ebfa0005">http://git.postgresql.org/pg/commitdiff/e617f0d7e4084f85104361568ef5f865ebfa0005</a></li>

<li>Extend "ALTER EXTENSION ADD object" to permit "DROP object" as well. Per discussion, this is something we should have sooner rather than later, and it doesn't take much additional code to support it. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01467d3e4f51fe304c0160c9895484ad696d1e87">http://git.postgresql.org/pg/commitdiff/01467d3e4f51fe304c0160c9895484ad696d1e87</a></li>

<li>Add support for multiple versions of an extension and ALTER EXTENSION UPDATE. This follows recent discussions, so it's quite a bit different from Dimitri's original. There will probably be more changes once we get a bit of experience with it, but let's get it in and start playing with it. This is still just core code. I'll start converting contrib modules shortly. Dimitri Fontaine and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1214749901fc3c66732cfd9f276b989635c01360">http://git.postgresql.org/pg/commitdiff/1214749901fc3c66732cfd9f276b989635c01360</a></li>

<li>Clean up installation directory choices for extensions. Arrange for the control files to be in $SHAREDIR/extension not $SHAREDIR/contrib, since we're generally trying to deprecate the term "contrib" and this is a once-in-many-moons opportunity to get rid of it in install paths. Fix PGXS to install the $EXTENSION file into that directory no matter what MODULEDIR is set to; a nondefault MODULEDIR should only affect the script and secondary extension files. Fix the control file directory parameter to be interpreted relative to $SHAREDIR, to avoid a surprising disconnect between how you specify that and what you set MODULEDIR to. Per discussion with David Wheeler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24d1280c4d75038f130495a25844c60d6810faab">http://git.postgresql.org/pg/commitdiff/24d1280c4d75038f130495a25844c60d6810faab</a></li>

<li>Refactor ALTER EXTENSION UPDATE to have cleaner multi-step semantics. This change causes a multi-step update sequence to behave exactly as if the updates had been commanded one at a time, including updating the "requires" dependencies afresh at each step. The initial implementation took the shortcut of examining only the final target version's "requires" and changing the catalog entry but once. But on reflection that's a bad idea, since it could lead to executing old update scripts under conditions different than they were designed/tested for. Better to expend a few extra cycles and avoid any surprises. In the same spirit, if a CREATE EXTENSION FROM operation involves applying a series of update files, it will act as though the CREATE had first been done using the initial script's target version and then the additional scripts were invoked with ALTER EXTENSION UPDATE. I also removed the restriction about not changing encoding in secondary control files. The new rule is that a script is assumed to be in whatever encoding the control file(s) specify for its target version. Since this reimplementation causes us to read each intermediate version's control file, there's no longer any uncertainty about which encoding setting would get applied. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6c2e734f0a07e57c2837543416f5987ec91d0839">http://git.postgresql.org/pg/commitdiff/6c2e734f0a07e57c2837543416f5987ec91d0839</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Implement NOWAIT option for BASE_BACKUP command. Specifying this option makes the server not wait for the xlog to be archived, or emit a warning that it can't, instead leaving the responsibility with the client. This is useful when the log is being streamed using the streaming protocol in parallel with the backup, without having log archiving enabled. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3144c33a2f764610d7ad56f1b82e9716d0d65447">http://git.postgresql.org/pg/commitdiff/3144c33a2f764610d7ad56f1b82e9716d0d65447</a></li>

<li>Use NOWAIT when including WAL in base backup. Avoids warning and waiting for the last segment to be archived, which isn't necessary when we're including the required WAL in the backup itself. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2e61ec31999228a3bb66a6a86f9e75beb6bb155">http://git.postgresql.org/pg/commitdiff/a2e61ec31999228a3bb66a6a86f9e75beb6bb155</a></li>

<li>Track last time for statistics reset on databases and bgwriter. Tracks one counter for each database, which is reset whenever the statistics for any individual object inside the database is reset, and one counter for the background writer. Tomas Vondra, reviewed by Greg Smith. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4c468b37a281941afd3bf61c782b20def8c17047">http://git.postgresql.org/pg/commitdiff/4c468b37a281941afd3bf61c782b20def8c17047</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix the isolation tester compilation on VPATH builds 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/289d7306555b2446d145c7e098c91b6ca20bd54c">http://git.postgresql.org/pg/commitdiff/289d7306555b2446d145c7e098c91b6ca20bd54c</a></li>

<li>Fix isolation tester Makefile so that it runs in a VPATH build 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/61cf7bcdf76a2a32d2400a116c8da48d5fd4d3a2">http://git.postgresql.org/pg/commitdiff/61cf7bcdf76a2a32d2400a116c8da48d5fd4d3a2</a></li>

<li>Fix comment recently obsoleted 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/60141eefaf28e4ff5e406952740423dd6fd16266">http://git.postgresql.org/pg/commitdiff/60141eefaf28e4ff5e406952740423dd6fd16266</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Greg Smith sent in another revision of the patch to spread out checkpoint syncs.</li>

<li>ITAGAKI Takahiro sent in three more revisions of the patch to export some of the COPY API, which can be used for, among other things, SQL/MED.</li>

<li>Shigeru HANADA sent in two more revisions of the patch to add a file-based foreign data wrapper for SQL/MED.</li>

<li>Shigeru HANADA sent in another revision of the patch to create a foreign data wrapper API for SQL/MED.</li>

<li>Radoslaw Smogura sent in a patch to improve the performance of textsend, used in COPY BINARY.</li>

<li>Andrew Dunstan sent in a patch to fix the regression tests which broke as a result of the COPY API changes.</li>

<li>Steve Singer and Jan Urbanski traded patches to add subtransactions to PL/PythonU in support of exception handling.</li>

<li>Ibrary Ahmed sent in another revision of the patch to determine client_encoding from client locale.</li>

<li>Robert Haas and Thom Brown traded patches for synchronous replication.</li>

<li>Shigeru HANADA sent in another revision of the patch to add foreign scans in SQL/MED.</li>

<li>Shigeru HANADA sent in a patch to avoid catalog lookups in foreign scans.</li>

<li>Tom Lane sent in another revision of the patch to add support for EXTENSIONs to pg_dump.</li>

<li>Andrew Dunstan sent in a patch implementing "jagged row" CSV text arrays atop SQL/MED's file foreign data wrapper feature.</li>

<li>Thom Brown sent in another revision of the patch to fix some boundary case behavior in generate_series().</li>

<li>Greg Smith sent in a patch to allow pg_archivecleanup to ignore extensions. This is especially useful for compressed WALs, which pg_archivecleanup would otherwise have ignored.</li>

<li>Heikki Linnakangas sent in another revision of that patch to add a PostgreSQL foreign data wrapper.</li>

<li>Jeff Davis sent in another revision of the patch to add range types.</li>

<li>Greg Smith sent in another revision of the patch to expand the maximum size of pgbench tests.</li>

<li>Alex Hunsaker and Alexey Klyukin traded patches to convert between PostgreSQL and Perl arrays for PL/Perl.</li>

<li>Stephen Frost and Kevin Grittner traded some more patches to add support for logging the current role.</li>

<li>Noah Misch sent in another revision of the patch to add FOR KEY LOCK.</li>

<li>Fujii Masao sent in a patch to fix some infelicities in the new ability to name restore points.</li>

<li>Per review from ITAGAKI Takahiro, Marko (johto) Tiikkaja sent in another revision of the patch to add transaction-scope advisory locks.</li>

<li>Robert Haas sent in two more revisions of the patch to enable synchronous replication.</li>

<li>Heikki Linnakangas sent in patches updating the FDW API and the PostgreSQL FDW, both for SQL/MED.</li>

<li>Jan Urbanski sent in another flock of patches to improve PL/PythonU.</li>

<li>Stephen Frost sent in three more revisions of the patch to add FOR EACH ... IN ARRAY...</li>

<li>Alex Hunsaker sent in a patch to fix an infelicity in PL/Perl's conversion to and from UTF8.</li>

<li>Per review from YAMAMOTO Takashi, Kevin Grittner sent in a patch to fix some infelicities in SSI.</li>

<li>Daniel Farina sent in three revisions of a patch to fix some infelicities in replication server timeout.</li>

<li>Gurjeet Singh sent in a patch to fix some infelicities in re: the actual existence of hypothetical indexes.</li>

<li>Tom Lane sent in a patch to fix some mismatches between EXTENSIONs and PGXS's MODULE_PATHNAME handling.</li>

<li>Daniel Farina sent in another pieces of the synchronous replication patch, this time for feeding back the xmin of the hot standby.</li>

<li>Peter Eisentraut sent in a patch to add a "make check" target for PLs.</li>

<li>Peter Eisentraut sent in a patch to see to it that psql -l processes the .psqlrc.</li>

</ul>