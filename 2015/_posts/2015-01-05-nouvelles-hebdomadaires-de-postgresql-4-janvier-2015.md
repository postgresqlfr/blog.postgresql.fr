---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 4 janvier 2015"
author: "NBougain"
redirect_from: "index.php?post/2015-01-05-nouvelles-hebdomadaires-de-postgresql-4-janvier-2015 "
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>Publication du premier volume de <em>PostgreSQL DBA</em>. T&eacute;l&eacute;chargement gratuit ou version papier disponible sur lulu.com&nbsp;: 

<a target="_blank" href="http://www.pgdba.co.uk/p/postgresql-database-administration.html">http://www.pgdba.co.uk/p/postgresql-database-administration.html</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en janvier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-01/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-01/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>L'appel &agrave; conf&eacute;renciers pour la PGCon 2015 (16-20 juin) a &eacute;t&eacute; lanc&eacute;. D&eacute;p&ocirc;t des candidatures jusqu'au 19 janvier 2014. D&eacute;tails&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/papers.php">http://www.pgcon.org/2015/papers.php</a></li>

<li>PGDay pr&eacute;-FOSDEM (30 janvier 2015) et <em>dev room</em> PostgreSQL au FOSDEM (31 janvier - 1<sup>er</sup> f&eacute;vrier 2015)&nbsp;: 

<a target="_blank" href="http://fosdem2015.pgconf.eu/">http://fosdem2015.pgconf.eu/</a></li>

<li>Le <em>Prague PostgreSQL Developer Day</em> (P2D2) 2015 aura lieu &agrave; Prague, R&eacute;publique Tch&egrave;que, les 11 &amp; 12 f&eacute;vrier 2015&nbsp;: 

<a target="_blank" href="http://www.p2d2.cz/">http://www.p2d2.cz/</a></li>

<li>Le <em>meetup</em> du 18 f&eacute;vrier 2015 &agrave; Melbourne accueillera Gabriele Bartolini &agrave; propos de PostgreSQL 9.4 pour les devops. D&eacute;tails ci-apr&egrave;s, et RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/melpug/events/219082475/">http://www.meetup.com/melpug/events/219082475/</a></li>

<li>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour le <em>Nordic PostgreSQL Day 2015</em>, pr&eacute;vu le 11 mars 2015 &agrave; Copenhague (Danemark), est lanc&eacute;&nbsp;: 

<a target="_blank" href="http://2015.nordicpgday.org/cfp/">http://2015.nordicpgday.org/cfp/</a></li>

<li>L'appel &agrave; conf&eacute;renciers pour la <em>PGConf US 2015</em> court jusqu'au 17 d&eacute;cembre 2014. Les notifications seront envoy&eacute;es le 10 janvier. L'&eacute;v&eacute;nement aura lieu &agrave; New-York du 25 au 27 mars 2015&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150104233727.GH26414@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Assorted minor fixes for psql metacommand docs. Document the long forms of \H \i \ir \o \p \r \w ... apparently, we have a long and dishonorable history of leaving out the unabbreviated names of psql backslash commands. Avoid saying "Unix shell"; we can just say "shell" with equal clarity, and not leave Windows users wondering whether the feature works for them. Improve consistency of documentation of \g \o \w metacommands. There's no reason to use slightly different wording or markup for each one. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ae17897ce84e545fd5a042530055df728b2ca98f">http://git.postgresql.org/pg/commitdiff/ae17897ce84e545fd5a042530055df728b2ca98f</a></li>

<li>Improve consistency of parsing of psql's magic variables. For simple boolean variables such as ON_ERROR_STOP, psql has for a long time recognized variant spellings of "on" and "off" (such as "1"/"0"), and it also made a point of warning you if you'd misspelled the setting. But these conveniences did not exist for other keyword-valued variables. In particular, though ECHO_HIDDEN and ON_ERROR_ROLLBACK include "on" and "off" as possible values, none of the alternative spellings for those were recognized; and to make matters worse the code would just silently assume "on" was meant for any unrecognized spelling. Several people have reported getting bitten by this, so let's fix it. In detail, this patch: 1. Allows all spellings recognized by ParseVariableBool() for ECHO_HIDDEN and ON_ERROR_ROLLBACK. 2. Reports a warning for unrecognized values for COMP_KEYWORD_CASE, ECHO, ECHO_HIDDEN, HISTCONTROL, ON_ERROR_ROLLBACK, and VERBOSITY. 3. Recognizes all values for all these variables case-insensitively; previously there was a mishmash of case-sensitive and case-insensitive behaviors. Back-patch to all supported branches. There is a small risk of breaking existing scripts that were accidentally failing to malfunction; but the consensus is that the chance of detecting real problems and preventing future mistakes outweighs this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/28551797a46c0ada035c34cf9cf2bc90448e3c26">http://git.postgresql.org/pg/commitdiff/28551797a46c0ada035c34cf9cf2bc90448e3c26</a></li>

<li>Print more information about getObjectIdentityParts() failures. This might help us debug what's happening on some buildfarm members. In passing, reduce the message from ereport to elog --- it doesn't seem like this should be a user-facing case, so not worth translating. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a486841eb11517e4a344fdebaf370f425a171c85">http://git.postgresql.org/pg/commitdiff/a486841eb11517e4a344fdebaf370f425a171c85</a></li>

<li>Docs: improve descriptions of ISO week-numbering date features. Use the phraseology "ISO 8601 week-numbering year" in place of just "ISO year", and make related adjustments to other terminology. The point of this change is that it seems some people see "ISO year" and think "standard year", whereupon they're surprised when constructs like to_char(..., "IYYY-Michael Meskes-DD") produce nonsensical results. Perhaps hanging a few more adjectives on it will discourage them from jumping to false conclusions. I put in an explicit warning against that specific usage, too, though the main point is to discourage people who haven't read this far down the page. In passing fix some nearby markup and terminology inconsistencies. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2f03ae69875ff27a9667a7ec4655434900b64e55">http://git.postgresql.org/pg/commitdiff/2f03ae69875ff27a9667a7ec4655434900b64e55</a></li>

<li>Don't run rowsecurity in parallel with other regression tests. The short-lived event trigger in the rowsecurity test causes irreproducible failures when the concurrent tests do something that the event trigger can't cope with. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7161b082bd9fc51e67a1031ea9d0313e8a48286b">http://git.postgresql.org/pg/commitdiff/7161b082bd9fc51e67a1031ea9d0313e8a48286b</a></li>

<li>Treat negative values of recovery_min_apply_delay as having no effect. At one point in the development of this feature, it was claimed that allowing negative values would be useful to compensate for timezone differences between master and slave servers. That was based on a mistaken assumption that commit timestamps are recorded in local time; but of course they're in UTC. Nor is a negative apply delay likely to be a sane way of coping with server clock skew. However, the committed patch still treated negative delays as doing something, and the timezone misapprehension survived in the user documentation as well. If recovery_min_apply_delay were a proper GUC we'd just set the minimum allowed value to be zero; but for the moment it seems better to treat negative settings as if they were zero. In passing do some extra wordsmithing on the parameter's documentation, including correcting a second misstatement that the parameter affects processing of Restore Point records. Issue noted by Michael Paquier, who also provided the code patch; doc changes by me. Back-patch to 9.4 where the feature was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d6657d2a107bee20d63ec2f776d873242f9355e9">http://git.postgresql.org/pg/commitdiff/d6657d2a107bee20d63ec2f776d873242f9355e9</a></li>

</ul>

<p>Tatsuo Ishii a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix resource leak pointed out by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b5a89c4820fb11c337838c1ad71e8e93f2937d1">http://git.postgresql.org/pg/commitdiff/3b5a89c4820fb11c337838c1ad71e8e93f2937d1</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Revert the GinMaxItemSize calculation so that we fit 3 tuples per page. Commit 36a35c55 changed the divisor from 3 to 6, for no apparent reason. Reducing GinMaxItemSize like that created a dump/reload hazard: loading a 9.3 database to 9.4 might fail with "index row size XXX exceeds maximum 1352 for index ..." error. Revert the change. While we're at it, make the calculation slightly more accurate. It used to divide the available space on page by three, then subtract sizeof(ItemIdData), and finally round down. That's not totally accurate; the item pointers for the three items are packed tight right after the page header, but there is alignment padding after the item pointers. Change the calculation to reflect that, like BTMaxItemSize does. I tested this with different block sizes on systems with 4- and 8-byte alignment, and the value after the final MAXALIGN_DOWN was the same with both methods on all configurations. So this does not make any difference currently, but let's be tidy. Also add a comment explaining what the macro does. This fixes bug #12292 reported by Robert Thaler. Backpatch to 9.4, where the bug was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/930fd68455576dada48521a6cef642caddea3c63">http://git.postgresql.org/pg/commitdiff/930fd68455576dada48521a6cef642caddea3c63</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix object_address expected output. Per pink buildfarm 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5b447ad3a98aa6f059ba467eb10a832eb1544985">http://git.postgresql.org/pg/commitdiff/5b447ad3a98aa6f059ba467eb10a832eb1544985</a></li>

<li>Use TypeName to represent type names in certain commands. In COMMENT, DROP, SECURITY LABEL, and the new pg_get_object_address function, we were representing types as a list of names, same as other objects; but types are special objects that require their own representation to be totally accurate. In the original COMMENT code we had a note about fixing it which was lost in the course of c10575ff005. Change all those places to use TypeName instead, as suggested by that comment. Right now the original coding doesn't cause any bugs, so no backpatch. It is more problematic for proposed future code that operate with object addresses from the SQL interface; type details such as array-ness are lost when working with the degraded representation. Thanks to Petr Jel&iacute;nek and Dimitri Fontaine for offlist help on finding a solution to a shift/reduce grammar conflict. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3f88672a4e4d8e648d24ccc65937da61c7660854">http://git.postgresql.org/pg/commitdiff/3f88672a4e4d8e648d24ccc65937da61c7660854</a></li>

<li>Add pg_identify_object_as_address. This function returns object type and objname/objargs arrays, which can be passed to pg_get_object_address. This is especially useful because the textual representation can be copied to a remote server in order to obtain the corresponding OID-based address. In essence, this function is the inverse of recently added pg_get_object_address(). Catalog version bumped due to the addition of the new function. Also add docs to pg_get_object_address. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a676201490c8113b4692562126c77a29dfd8dac1">http://git.postgresql.org/pg/commitdiff/a676201490c8113b4692562126c77a29dfd8dac1</a></li>

<li>pg_event_trigger_dropped_objects: Add name/args output columns. These columns can be passed to pg_get_object_address() and used to reconstruct the dropped objects identities in a remote server containing similar objects, so that the drop can be replicated. Reviewed by Stephen Frost, Heikki Linnakangas, Abhijit Menon-Sen, Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/72dd233d3ef12da0f041bb3024deaa6d2950369c">http://git.postgresql.org/pg/commitdiff/72dd233d3ef12da0f041bb3024deaa6d2950369c</a></li>

<li>Add missing pstrdup calls. The one for the OCLASS_COLLATION case was noticed by CLOBBER_CACHE_ALWAYS buildfarm members; the others I spotted by manual code inspection. Also remove a redundant check. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ba66c9d0681f0c5ec834255fb4e7f6ef6b626747">http://git.postgresql.org/pg/commitdiff/ba66c9d0681f0c5ec834255fb4e7f6ef6b626747</a></li>

<li>Fix thinko in lock mode enum Commit 0e5680f4737a9c6aa94aa9e77543e5de60411322 contained a thinko mixing LOCKMODE with LockTupleMode. This caused misbehavior in the case where a tuple is marked with a multixact with at most a FOR SHARE lock, and another transaction tries to acquire a FOR NO KEY EXCLUSIVE lock; this case should block but doesn't. Include a new isolation tester spec file to explicitely try all the tuple lock combinations; without the fix it shows the problem: starting permutation: s1_begin s1_lcksvpt s1_tuplock2 s2_tuplock3 s1_commit step s1_begin: BEGIN; step s1_lcksvpt: SELECT * FROM multixact_conflict FOR KEY SHARE; SAVEPOINT foo; a 1 step s1_tuplock2: SELECT * FROM multixact_conflict FOR SHARE; a 1 step s2_tuplock3: SELECT * FROM multixact_conflict FOR NO KEY UPDATE; a 1 step s1_commit: COMMIT; With the fixed code, step s2_tuplock3 blocks until session 1 commits, which is the correct behavior. All other cases behave correctly. Backpatch to 9.3, like the commit that introduced the problem. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5e3d1e969d2f65009f718d3100d6565f47f9112">http://git.postgresql.org/pg/commitdiff/d5e3d1e969d2f65009f718d3100d6565f47f9112</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Don't tab-complete COMMENT ON ... IS with IS. Ian Barwick 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c168c885776cd5d815611c10633ca04f699744e3">http://git.postgresql.org/pg/commitdiff/c168c885776cd5d815611c10633ca04f699744e3</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make path to pg_service.conf absolute in documentation. The system file is always in the absolute path /etc/, not relative. David Fetter 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f9769c719f7811146e8aafbd0ff6c666b128ecce">http://git.postgresql.org/pg/commitdiff/f9769c719f7811146e8aafbd0ff6c666b128ecce</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Prevent WAL files created by pg_basebackup -x/X from being archived again. WAL (and timeline history) files created by pg_basebackup did not maintain the new base backup's archive status. That's currently not a problem if the new node is used as a standby - but if that node is promoted all still existing files can get archived again. With a high wal_keep_segment settings that can happen a significant time later - which is quite confusing. Change both the backend (for the -x/-X fetch case) and pg_basebackup (for -X stream) itself to always mark WAL/timeline files included in the base backup as .done. That's in line with walreceiver.c doing so. The verbosity of the pg_basebackup changes show pretty clearly that it needs some refactoring, but that'd result in not be backpatchable changes. Backpatch to 9.1 where pg_basebackup was introduced. Discussion: 20141205002854.GE21964@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c0a4858965f1375dadb45df9f3a054bfcb283f5">http://git.postgresql.org/pg/commitdiff/2c0a4858965f1375dadb45df9f3a054bfcb283f5</a></li>

<li>Add pg_string_endswith as the start of a string helper library in src/common. Backpatch to 9.3 where src/common was introduced, because a bugfix that needs to be backpatched, requires the function. Earlier branches will have to duplicate the code. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ccb161b66addc9d0ede31359c05f7e9df61ab8d4">http://git.postgresql.org/pg/commitdiff/ccb161b66addc9d0ede31359c05f7e9df61ab8d4</a></li>

<li>Fix inconsequential fd leak in the new mark_file_as_archived() function. As every error in mark_file_as_archived() will lead to a failure of pg_basebackup the FD leak couldn't ever lead to a real problem. It seems better to fix the leak anyway though, rather than silence Coverity, as the usage of the function might get extended or copied at some point in the future. Pointed out by Coverity. Backpatch to 9.2, like the relevant part of the previous patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0398ece4c5baacc98f0fd46a731518b3ccb25bb3">http://git.postgresql.org/pg/commitdiff/0398ece4c5baacc98f0fd46a731518b3ccb25bb3</a></li>

<li>Remove superflous variable from xlogreader's XLogFindNextRecord(). Pointed out by Coverity. Since this is mere, and debatable, cosmetics I'm not backpatching this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/14570c28289f82030172c699ec877dd26d04940a">http://git.postgresql.org/pg/commitdiff/14570c28289f82030172c699ec877dd26d04940a</a></li>

<li>Add missing va_end() call to a early exit in dmetaphone.c's StringAt(). Pointed out by Coverity. Backpatch to all supported branches, the code has been that way for a long while. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58bc4747be26f6849ca38e67e24abdd6aecba3b1">http://git.postgresql.org/pg/commitdiff/58bc4747be26f6849ca38e67e24abdd6aecba3b1</a></li>

<li>Fix off-by-one in pg_xlogdump's fuzzy_open_file(). In the unlikely case of stdin (fd 0) being closed, the off-by-one would lead to pg_xlogdump failing to open files. Spotted by Coverity. Backpatch to 9.3 where pg_xlogdump was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d1c575230d49929f82c6d91e9b3070a9f4018718">http://git.postgresql.org/pg/commitdiff/d1c575230d49929f82c6d91e9b3070a9f4018718</a></li>

<li>Correctly handle test durations of more than 2147s in pg_test_timing. Previously the computation of the total test duration, measured in microseconds, accidentally overflowed due to accidentally using signed 32bit arithmetic. As the only consequence is that pg_test_timing invocations with such, overly large, durations never finished the practical consequences of this bug are minor. Pointed out by Coverity. Backpatch to 9.2 where pg_test_timing was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8cadeb792cd08478a73cb0941bb67f03e8465090">http://git.postgresql.org/pg/commitdiff/8cadeb792cd08478a73cb0941bb67f03e8465090</a></li>

<li>Add error handling for failing fstat() calls in copy.c. These calls are pretty much guaranteed not to fail unless something has gone horribly wrong, and even in that case we'd just error out a short time later. But since several code checkers complain about the missing check it seems worthwile to fix it nonetheless. Pointed out by Coverity. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ea95959afa225118374ab1691a5ccf84ae05ce8">http://git.postgresql.org/pg/commitdiff/2ea95959afa225118374ab1691a5ccf84ae05ce8</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Abhijit Menon-Sen sent in another revision of a patch to implement pg_audit.</li>

<li>Adam Brightwell sent in a patch to remove CATUPDATE.</li>

<li>Peter Geoghegan sent in two revisions of a patch to document bt_page_items()'s ctid field.</li>

<li>Abhijit Menon-Sen sent in three more revisions of a patch to implement more CRC algorithms, using more efficient ones when available.</li>

<li>Bruce Momjian sent in two patches to align BufferDescriptions correctly.</li>

<li>&Aacute;lvaro Herrera sent in a patch to use TypeName to represent type names in certain commands.</li>

<li>&Aacute;lvaro Herrera sent in a patch to add SQL-level callable function to obtain object type + identity, etc.</li>

<li>Alexei Vasiliev sent in two more revisions of a patch to add a recovery_timeout option to control the timeout of a restore_command nonzero status code.</li>

<li>David Fetter sent in a patch to fix service and URI requests in psql's \c[onnect] command.</li>

<li>David Rowley sent in a patch to improve performance for outer joins where outer side is unique.</li>

<li>Fabien COELHO sent in a patch to standardize some wording across the function documentation.</li>

<li>Fabien COELHO and David Rowley traded patches to add the modulo (%) operator to pgbench.</li>

<li>Amit Kapila sent in another revision of a patch to allow parallel cores to be used by vacuumdb.</li>

<li>Heikki Linnakangas sent in another revision of a patch to redesign checkpoint segments.</li>

<li>Noah Misch sent in a patch to try to track down a buildfarm failure in transaction isolation.</li>

<li>Ashutosh Bapat sent in a patch to attempt to use 2PC on transactions involving multiple foreign PostgreSQL servers.</li>

<li>Peter Geoghegan sent in two revisions of a patch to fix some issues in value locking.</li>

<li>David Fetter sent in a patch to fix the documentation for the default location of the system-wide pg_service configuration.</li>

</ul>