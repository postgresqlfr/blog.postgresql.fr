---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 24 août 2014"
author: "NBougain"
redirect_from: "index.php?post/2014-08-28-nouvelles-hebdomadaires-de-postgresql-24-aout-2014 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix obsolete mention of non-int64 support in CREATE SEQUENCE documentation. The old text explained what happened if we didn't have working int64 arithmetic. Since that case has been explicitly rejected by configure since 8.4.3, documenting it in the 9.x branches can only produce confusion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2b475c5946bc8a9beaff3f57b45cc440a78561a1">http://git.postgresql.org/pg/commitdiff/2b475c5946bc8a9beaff3f57b45cc440a78561a1</a></li>

<li>Fix core dump in jsonb #&gt; operator, and add regression test cases. jsonb's #&gt; operator segfaulted (dereferencing a null pointer) if the RHS was a zero-length array, as reported in bug #11207 from Justin Van Winkle. json's #&gt; operator returns NULL in such cases, so for the moment let's make jsonb act likewise. Also add a bunch of regression test queries memorializing the -&gt; and #&gt; operators' behavior for this and other corner cases. There is a good argument for changing some of these behaviors, as they are not very consistent with each other, and throwing an error isn't necessarily a desirable behavior for operators that are likely to be used in indexes. However, everybody can agree that a core dump is the Wrong Thing, and we need test cases even if we decide to change their expected output later. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bac66020db75871463bafdb394568bf946e8991">http://git.postgresql.org/pg/commitdiff/9bac66020db75871463bafdb394568bf946e8991</a></li>

<li>More regression test cases for json/jsonb extraction operators. Cover some cases I omitted before, such as null and empty-string elements in the path array. This exposes another inconsistency: json_extract_path complains about empty path elements but jsonb_extract_path does not. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fa069822f5a02bbbe46bada0b6e420a89c5f7484">http://git.postgresql.org/pg/commitdiff/fa069822f5a02bbbe46bada0b6e420a89c5f7484</a></li>

<li>Fix corner-case behaviors in JSON/JSONB field extraction operators. Cause the path extraction operators to return their lefthand input, not NULL, if the path array has no elements. This seems more consistent since the case ought to correspond to applying the simple extraction operator (-&gt;) zero times. Cause other corner cases in field/element/path extraction to return NULL rather than failing. This behavior is arguably more useful than throwing an error, since it allows an expression index using these operators to be built even when not all values in the column are suitable for the extraction being indexed. Moreover, we already had multiple inconsistencies between the path extraction operators and the simple extraction operators, as well as inconsistencies between the JSON and JSONB code paths. Adopt a uniform rule of returning NULL rather than throwing an error when the JSON input does not have a structure that permits the request to be satisfied. Back-patch to 9.4. Update the release notes to list this as a behavior change since 9.3. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/41dd50e84df39e31595f3472b0cb6d00f63b3f99">http://git.postgresql.org/pg/commitdiff/41dd50e84df39e31595f3472b0cb6d00f63b3f99</a></li>

<li>Fix another ancient memory-leak bug in relcache.c. CheckConstraintFetch() leaked a cstring in the caller's context for each CHECK constraint expression it copied into the relcache. Ordinarily that isn't problematic, but it can be during CLOBBER_CACHE testing because so many reloads can happen during a single query; so complicate the code slightly to allow freeing the cstring after use. Per testing on buildfarm member barnacle. This is exactly like the leak fixed in AttrDefaultFetch() by commit 078b2ed291c758e7125d72c3a235f128d40a232b. (Yes, this time I did look for other instances of the same coding pattern :-(.) Like that patch, no back-patch, since it seems unlikely that there's any problem except under very artificial test conditions. BTW, it strikes me that both of these places would require further work comparable to commit ab8c84db2f7af008151b848cf1d6a4672a39eecd, if we ever supported defaults or check constraints on system catalogs: they both assume they are copying into an empty relcache data structure, and that conceivably wouldn't be the case during recursive reloading of a system catalog. This does not seem worth worrying about for the moment, since there is no near-term prospect of supporting any such thing. So I'll just note the possibility for the archives' sake. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/73eba19aebe0101837668e39267469ca34373552">http://git.postgresql.org/pg/commitdiff/73eba19aebe0101837668e39267469ca34373552</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Reorganize functions in be-secure-openssl.c. Move the functions within the file so that public interface functions come first, followed by internal functions. Previously, be_tls_write was first, then internal stuff, and finally the rest of the public interface, which clearly didn't make much sense. Per Andres Freund's complaint. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48d50840d53eb62842c0d9b54eab9cd7c9a3a46d">http://git.postgresql.org/pg/commitdiff/48d50840d53eb62842c0d9b54eab9cd7c9a3a46d</a></li>

<li>Use comma+space as the separator in the default search_path. While the space is optional, it seems nicer to be consistent with what you get if you do "SET search_path=...". SET always normalizes the separator to be comma+space. Christoph Martin 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02587dcddc2cb5d9f7a17cb0281d168f5a0d6297">http://git.postgresql.org/pg/commitdiff/02587dcddc2cb5d9f7a17cb0281d168f5a0d6297</a></li>

<li>Add #define INT64_MODIFIER for the printf length modifier for 64-bit ints. We have had INT64_FORMAT and UINT64_FORMAT for a long time, but that's not good enough if you want something more exotic, like "%20lld". Abhijit Menon-Sen, per Andres Freund's suggestion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ce486056ecd28050f367894a2b5aad3656d37511">http://git.postgresql.org/pg/commitdiff/ce486056ecd28050f367894a2b5aad3656d37511</a></li>

<li>Change the way pg_basebackup's tablespace mapping is implemented. Previously, we would first create the symlinks the way they are in the original system, and at the end replace them with the mapped symlinks. That never really made much sense, so now we create the symlink pointing to the correct location to begin with, so that there's no need to fix them at the end. The old coding didn't work correctly on Windows, because Windows junction points look more like directories than files, and ought to be removed with rmdir rather than unlink. Also, it incorrectly used "%d" rather than "%u" to print an Oid, but that's gone now. Report and patch by Amit Kapila, with minor changes by me. Reviewed by MauMau. Backpatch to 9.4, where the --tablespace feature was added. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8d938eb0797e7acd925a2adf72315f8ab1586d83">http://git.postgresql.org/pg/commitdiff/8d938eb0797e7acd925a2adf72315f8ab1586d83</a></li>

<li>Fix comment in pg_basebackup. The option is called --tablespace-mapping, not --tablespace. Amit Kapila 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2af93640ad14028297fbc750e4c2338ad11a3c58">http://git.postgresql.org/pg/commitdiff/2af93640ad14028297fbc750e4c2338ad11a3c58</a></li>

</ul>

<p>Gregory Stark a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix further concerns about psql wrapping in expanded mode having collateral damage on other formats, by Sergey Muraviov. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/458ef6bad15702a3ac9b7b302a0378f8817620c0">http://git.postgresql.org/pg/commitdiff/458ef6bad15702a3ac9b7b302a0378f8817620c0</a></li>

<li>Adjust Release Notes to reflect holding off wrapped expanded mode until 9.5 (thanks Michael Paquier) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/663675885ec2c97c8b59ce3e30f6ad05d162a584">http://git.postgresql.org/pg/commitdiff/663675885ec2c97c8b59ce3e30f6ad05d162a584</a></li>

</ul>

<p>Noah Misch a pouss&eacute;&nbsp;:</p>

<ul>

<li>Replace a few strncmp() calls with strlcpy(). strncmp() is a specialized API unsuited for routine copying into fixed-size buffers. On a system where the length of a single filename can exceed MAXPGPATH, the pg_archivecleanup change prevents a simple crash in the subsequent strlen(). Few filesystems support names that long, and calling pg_archivecleanup with untrusted input is still not a credible use case. Therefore, no back-patch. David Rowley 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fb2aece8ae4e6f23310d7c87c7da3fec6f5df3a1">http://git.postgresql.org/pg/commitdiff/fb2aece8ae4e6f23310d7c87c7da3fec6f5df3a1</a></li>

<li>Install libpq DLL with $(INSTALL_SHLIB). Programs need execute permission on a DLL file to load it. MSYS "install" ignores the mode argument, and our Cygwin build statically links libpq into programs. That explains the lack of buildfarm trouble. Back-patch to 9.0 (all supported versions). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8605bc75219fd9a46fbb38909f83bcdae56b6e01">http://git.postgresql.org/pg/commitdiff/8605bc75219fd9a46fbb38909f83bcdae56b6e01</a></li>

<li>Make pg_service.conf sample LDIF more portable. The aboriginal sample placed connection parameters in groupOfUniqueNames/uniqueMember. OpenLDAP, at least as early as version 2.4.23, rejects uniqueMember entries that do not conform to the syntax for a distinguished name. Use device/description, which is free-form. Back-patch to 9.4 for web site visibility. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7fc5f1a3550ca9395051b592df150de79804131a">http://git.postgresql.org/pg/commitdiff/7fc5f1a3550ca9395051b592df150de79804131a</a></li>

<li>Document new trigger-related forms of ALTER FOREIGN TABLE. Oversight in commit 7cbe57c34dec4860243e6d0f81738cfbb6e5d069. Back-patch to 9.4, where that commit first appeared. In passing, release-note the FDW API postcondition change from the same commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/10718612fb23a5853e56eb792a6b1503ebddf190">http://git.postgresql.org/pg/commitdiff/10718612fb23a5853e56eb792a6b1503ebddf190</a></li>

<li>Finish adding file version information to installed Windows binaries. In support of this, have the MSVC build follow GNU make in preferring GNUmakefile over Makefile when a directory contains both. Michael Paquier, reviewed by MauMau. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ee9569e4df1c3bdb6858f4f65d0770783c32a84d">http://git.postgresql.org/pg/commitdiff/ee9569e4df1c3bdb6858f4f65d0770783c32a84d</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix bug in checking of IDENTIFY_SYSTEM result. 5a991ef8692ed0d170b44958a81a6bd70e90585 added new column into the result of IDENTIFY_SYSTEM command. But it was not reflected into several codes checking that result. Specifically though the number of columns in the result was increased to 4, it was still compared with 3 in some replication codes. Back-patch to 9.4 where the number of columns in IDENTIFY_SYSTEM result was increased. Report from Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/083d29c65b7897f90c70e6dc0a4240a5fa75c8f2">http://git.postgresql.org/pg/commitdiff/083d29c65b7897f90c70e6dc0a4240a5fa75c8f2</a></li>

<li>Revert "Fix bug in checking of IDENTIFY_SYSTEM result." This reverts commit 083d29c65b7897f90c70e6dc0a4240a5fa75c8f2. The commit changed the code so that it causes an errors when IDENTIFY_SYSTEM returns three columns. But which prevents us from using the replication-related utilities against the server with older version. This is not what we want. For that compatibility, we allow the utilities to receive three columns as the result of IDENTIFY_SYSTEM eventhough it actually returns four columns in 9.4 or later. Pointed out by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4762886539b06da682045e19ba73dcee3789638">http://git.postgresql.org/pg/commitdiff/c4762886539b06da682045e19ba73dcee3789638</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>pg_upgrade: adjust logging to use QUERY_ALLOC lengths. Allows the logging to print the entire text of failed queries, rather than a truncated version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7567d94910c100a28a79122e86297cd7a4c90df6">http://git.postgresql.org/pg/commitdiff/7567d94910c100a28a79122e86297cd7a4c90df6</a></li>

</ul>

<p>Stephen Frost a pouss&eacute;&nbsp;:</p>

<ul>

<li>Rework 'MOVE ALL' to 'ALTER .. ALL IN TABLESPACE'. As 'ALTER TABLESPACE .. MOVE ALL' really didn't change the tablespace but instead changed objects inside tablespaces, it made sense to rework the syntax and supporting functions to operate under the 'ALTER (TABLE|INDEX|MATERIALIZED VIEW)' syntax and to be in tablecmds.c. Pointed out by Alvaro, who also suggested the new syntax. Back-patch to 9.4. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3c4cf080879b386d4ed1814667aca025caafe608">http://git.postgresql.org/pg/commitdiff/3c4cf080879b386d4ed1814667aca025caafe608</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add pinning_backends column to the pg_buffercache extension. The new column shows how many backends have a buffer pinned. That can be useful during development or to diagnose production issues e.g. caused by vacuum waiting for cleanup locks. To handle upgrades transparently - the extension might be used in views - deal with callers expecting the old number of columns. Reviewed by Fujii Masao and Rajeev rastogi. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f57791985ac3d776cb67e9d69befde538cfdf13b">http://git.postgresql.org/pg/commitdiff/f57791985ac3d776cb67e9d69befde538cfdf13b</a></li>

<li>Fix newly introduced misspelling of existence in pg_buffercache. Peter Geoghegan 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ebf20f65d9383166d4b883258c091b245cf36217">http://git.postgresql.org/pg/commitdiff/ebf20f65d9383166d4b883258c091b245cf36217</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix whitespace 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3feda1bcbb653e954092bddd9c3eb681ab51fa2b">http://git.postgresql.org/pg/commitdiff/3feda1bcbb653e954092bddd9c3eb681ab51fa2b</a></li>

<li>doc: Improve pg_restore help output. Add a note that some options can be specified multiple times to select multiple objects to restore. This replaces the somewhat confusing use of plurals in the option descriptions themselves. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/256bfb2c9ab89eefb963db025dfcc91893f0b8b3">http://git.postgresql.org/pg/commitdiff/256bfb2c9ab89eefb963db025dfcc91893f0b8b3</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix outdated comment 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01d15a2677c738489e62295924298ef8a72528a8">http://git.postgresql.org/pg/commitdiff/01d15a2677c738489e62295924298ef8a72528a8</a></li>

<li>Implement ALTER TABLE .. SET LOGGED / UNLOGGED. This enables changing permanent (logged) tables to unlogged and vice-versa. (Docs for ALTER TABLE / SET TABLESPACE got shuffled in an order that hopefully makes more sense than the original.) Author: Fabr&iacute;zio de Royes Mello Reviewed by: Christoph Berg, Andres Freund, Thom Brown Some tweaking by &Aacute;lvaro Herrera 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f41872d0c1239d36ab03393c39ec0b70e9ee2a3c">http://git.postgresql.org/pg/commitdiff/f41872d0c1239d36ab03393c39ec0b70e9ee2a3c</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Anastasia Lubennikova and Heikki Linnakangas traded patches to enable index-only scans for GiST.</li>

<li>Fujii Masao and Michael Paquier traded patches to fix an issue with pg_receivexlog and replication slots.</li>

<li>Adam Brightwell sent in another revision of a patch to implement row-level access control.</li>

<li>Heikki Linnakangas sent in another revision of a patch to do WAL format and API changes.</li>

<li>Adam Brightwell sent in a PoC patch to create a new model around role attributes and fine grained permissions meant to alleviate the current over-dependence on superuser.</li>

<li>Furuya Osamu sent in two more revisions of a patch to add fsync feedback to pg_receivexlog --status-interval.</li>

<li>David Rowley sent in another revision of a patch to implement partial sorting.</li>

<li>Rahila Syed sent in another revision of a patch to compress full-page writes.</li>

<li>Tomas Vondra sent in another revision of a patch to fix an issue where bad estimation together with large work_mem generates terribly slow hash joins.</li>

<li>Vladislav Sterzhanov sent in a patch to enable KNN searches for SP-GiST.</li>

<li>Michael Paquier and Fabr&iacute;zio de Royes Mello traded patches to ensure that the verbose output of pg_dump show the schema name.</li>

<li>Jeff Davis and Tomas Vondra traded patches to do better memory accounting for hash aggregates.</li>

<li>John Lumby sent in a patch to extend prefetching using asynchronous I/O.</li>

<li>Amit Kapila sent in another revision of a patch to fix pg_basebackup with respect to tablespaces on Windows.</li>

<li>Alvaro Herrera sent in two more revisions of a patch to implement minmax indexes.</li>

<li>Andreas 'ads' Scherbaum sent in a patch to explains that functions like round() and others might behave differently depending on operating system, and that this is correct according to an IEEE standard.</li>

<li>Michael Paquier sent in three more revisions of a patch to support N synchronous standby servers for N&gt;1.</li>

<li>Fabr&iacute;zio de Royes Mello, Alvaro Herrera, and Michael Paquier traded patches to implement ALTER TABLE ... SET LOGGED.</li>

<li>Tom Lane sent in a patch to make JSONB more TOAST-compressible.</li>

<li>Julien Rouhaud sent in a patch to track number of files ready to be archived in pg_stat_archiver.</li>

<li>Bruce Momjian sent in a patch to update recommendations around pg_dump to reflect current capabilities.</li>

<li>Bruce Momjian sent in a patch to harden pg_upgrade.</li>

<li>Amit Kapila sent in two more revisions of a patch to fix an issue where the -T option of pg_basebackup didn't work on Windows.</li>

<li>Bruce Momjian sent in a patch to allow multiple -o/-O options in pg_upgrade.</li>

<li>Kevin Grittner sent in another revision of a patch to enable delta relations in AFTER triggers.</li>

<li>Peter Geoghegan sent in another revision of a patch to add a b-tree sort support optimization.</li>

<li>Pavel Stehule sent in another revision of a patch to revamp row_to_json.</li>

<li>Michael Paquier sent in another revision of a patch to remove the dependency on wsock32.lib when compiling code on Windows.</li>

<li>Jov and Tom Lane traded patches to change alter user to be a true alias for alter role.</li>

<li>Tomonari Katsumata sent in a patch to allow rounding up time value less than its unit.</li>

<li>Alvaro Herrera and Thomas Munro traded patches to add SKIP LOCKED DATA.</li>

<li>Haribabu Kommi sent in another revision of a patch to enable inet types to support min/max.</li>

<li>Michael Paquier sent in a patch to add a missing comment block at the top of streamutil.h and receivelog.h.</li>

<li>Fabien COELHO sent in another revision of a patch to create a pgbench throttling latency limit.</li>

<li>Alexey Klyukin sent in another revision of a patch to implement subject alternative names support for SSL connections.</li>

<li>Amit Kapila sent in another revision of a patch to add ALTER SYSTEM RESET.</li>

</ul>