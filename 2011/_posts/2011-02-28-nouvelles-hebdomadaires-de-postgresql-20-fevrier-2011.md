---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 20 février 2011"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2011/02/28/Nouvelles-hebdomadaires-de-PostgreSQL-20-février-2011"
---


<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pgpool-II 3.0.2, un gestionnaire de connexions et bien d'avantage&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/pgpool/">http://pgfoundry.org/projects/pgpool/</a></li>

<li>PL/Proxy 2.2, un syst&egrave;me de cluster r&eacute;partissant les &eacute;critures&nbsp;: 

<a target="_blank" href="http://pgfoundry.org/projects/plproxy/">http://pgfoundry.org/projects/plproxy/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2011-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2011-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>Le PGDay.US est au programme du <em>Southern California Linux Exposition (SCALE)</em> de cette ann&eacute;e, tenu &agrave; l'h&ocirc;tel LAX Hilton de Los Angeles (Californie) le vendredi 25 f&eacute;vrier 2011.</li>

<li>PostgreSQL Conference East 2011&nbsp;: New-York City, du 22 au 25 mars&nbsp;: 

<a target="_blank" href="http://www.postgresqlconference.org">http://www.postgresqlconference.org</a></li>

<li>L'<em>Open Database Camp</em> aura lieu du 7 au 9 mai 2011 en Sardaigne (Italie)&nbsp;: 

<a target="_blank" href="http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html">http://datacharmer.blogspot.com/2011/01/announcing-open-database-camp-sardinia.html</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/community/weeklynews/pwn20110220">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Clarify documentation for libpq's PQescapeBytea to mention the new hex format. Modify PQescapeStringConn() docs to be consisent with other escaping functions. Add mention problems with pre-9.0 versions of libpq using not understanding bytea hex format to the 9.0 release notes. Backpatch to 9.0 docs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5569ae52ae206b3e35411df435884cf848ae0494">http://git.postgresql.org/pg/commitdiff/5569ae52ae206b3e35411df435884cf848ae0494</a></li>

<li>Adjust pg_upgrade error message, array freeing, and add error check. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fe8f15d5d2f42ad1ce6a0114c12fd3da0f14dd4a">http://git.postgresql.org/pg/commitdiff/fe8f15d5d2f42ad1ce6a0114c12fd3da0f14dd4a</a></li>

<li>Fix bug in 9.1 pg_upgrade processing of old/new relations; adjust debug output. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1cc19cc358c23e3c4e04f9f38776b625d5e13965">http://git.postgresql.org/pg/commitdiff/1cc19cc358c23e3c4e04f9f38776b625d5e13965</a></li>

<li>In pg_upgrade, no need to initialize global struct values; they are always zeros. Also no need to free memory before we exit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/497e65f822ff33ed964d1c891ee6de0d97d0b2a6">http://git.postgresql.org/pg/commitdiff/497e65f822ff33ed964d1c891ee6de0d97d0b2a6</a></li>

<li>In documentation example, use concat_values() instead of concat() because concat() is a built-in function. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/732808c087a84feed4749ab1e8a63ceeefcf449f">http://git.postgresql.org/pg/commitdiff/732808c087a84feed4749ab1e8a63ceeefcf449f</a></li>

<li>Document that plpgsql upsert example can fail if insert triggers return unique exception, or if not used in read committed transaction mode. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f87712d208f7dbe447cd27e92a99f49fd19afe94">http://git.postgresql.org/pg/commitdiff/f87712d208f7dbe447cd27e92a99f49fd19afe94</a></li>

<li>Remove doc mention about read committed in upsert example. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3472a2b0565ad0302e5ea47e49a95305c2b07f64">http://git.postgresql.org/pg/commitdiff/3472a2b0565ad0302e5ea47e49a95305c2b07f64</a></li>

<li>Typo fix. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4f2cfc5bb4c404c24d589339d29c210321f4b4d7">http://git.postgresql.org/pg/commitdiff/4f2cfc5bb4c404c24d589339d29c210321f4b4d7</a></li>

<li>Document that text search comparisons happen after text search configuration rules. Erik Rijkers 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5bba4948eb835413cc4a5ca1e2f7255ce4c78e69">http://git.postgresql.org/pg/commitdiff/5bba4948eb835413cc4a5ca1e2f7255ce4c78e69</a></li>

<li>Improve text search prefix doc addition. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4077980d67a2f27b88a6bc7531da31cae0ed0fb1">http://git.postgresql.org/pg/commitdiff/4077980d67a2f27b88a6bc7531da31cae0ed0fb1</a></li>

<li>Initialize variable to quiet compiler. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/964b46d00ec2222c1273bec3ead369f3e167d482">http://git.postgresql.org/pg/commitdiff/964b46d00ec2222c1273bec3ead369f3e167d482</a></li>

<li>Document that an SQL-standard-compliant query that expects a unique row from information_schema.referential_constraints might return several in Postgres because we allow duplicate-named constraints in the same schema. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e07ae21f7ec2260c17136a7afaa4dbca405d9c24">http://git.postgresql.org/pg/commitdiff/e07ae21f7ec2260c17136a7afaa4dbca405d9c24</a></li>

<li>Documentation update for UTF16 surrogate pairs in UTF8 encoding. Marko Kreen 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8c0f1e2762a896e3af890b14babd3409fa49e641">http://git.postgresql.org/pg/commitdiff/8c0f1e2762a896e3af890b14babd3409fa49e641</a></li>

<li>Adjust documentation wording of window function ORDER BY to not mention avg() because it was inaccurate. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d5813488a4ccc78ec3a4ad0d5da4e6e844af75e8">http://git.postgresql.org/pg/commitdiff/d5813488a4ccc78ec3a4ad0d5da4e6e844af75e8</a></li>

<li>Merge two documentation permission chapters into a single chapter. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/48d25bac9f024f36b43cbba58778adf9ad0207c6">http://git.postgresql.org/pg/commitdiff/48d25bac9f024f36b43cbba58778adf9ad0207c6</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Change the naming convention for extension files to use double dashes. This allows us to have an unambiguous rule for deconstructing the names of script files and secondary control files, without having to forbid extension and version names from containing any dashes. We do have to forbid them from containing double dashes or leading/trailing dashes, but neither restriction is likely to bother anyone in practice. Per discussion, this seems like a better solution overall than the original design. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/27d5d7ab10086d833e3df251951cf63c392b8bca">http://git.postgresql.org/pg/commitdiff/27d5d7ab10086d833e3df251951cf63c392b8bca</a></li>

<li>Convert contrib modules to use the extension facility. This isn't fully tested as yet, in particular I'm not sure that the "foo--unpackaged--1.0.sql" scripts are OK. But it's time to get some buildfarm cycles on it. sepgsql is not converted to an extension, mainly because it seems to require a very nonstandard installation process. Dimitri Fontaine and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/629b3af27d5c2bc9d6e16b22b943ad651d4ecb56">http://git.postgresql.org/pg/commitdiff/629b3af27d5c2bc9d6e16b22b943ad651d4ecb56</a></li>

<li>Avoid use of CREATE OR REPLACE FUNCTION in extension installation files. It was never terribly consistent to use OR REPLACE (because of the lack of comparable functionality for data types, operators, etc), and experimentation shows that it's now positively pernicious in the extension world. We really want a failure to occur if there are any conflicts, else it's unclear what the extension-ownership state of the conflicted object ought to be. Most of the time, CREATE EXTENSION will fail anyway because of conflicts on other object types, but an extension defining only functions can succeed, with bad results. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/029fac2264101919b65fb6319bb994f941969471">http://git.postgresql.org/pg/commitdiff/029fac2264101919b65fb6319bb994f941969471</a></li>

<li>Assorted fixups for "unpackaged" conversion scripts. From first pass of testing. Notably, there seems to be no need for adminpack--unpackaged--1.0.sql because none of the objects that the old module creates would ever be dumped by pg_dump anyway (they are all in pg_catalog). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b61e57f3c352ab97c6514898d46480b5725ebb9">http://git.postgresql.org/pg/commitdiff/3b61e57f3c352ab97c6514898d46480b5725ebb9</a></li>

<li>Support replacing MODULE_PATHNAME during extension script file execution. This avoids the need to find a way to make PGXS' .sql.in-to-.sql rule insert the right thing. We'll just deprecate use of that hack for extensions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e693e97d754ed6812ea115170afeae4bf8797d3f">http://git.postgresql.org/pg/commitdiff/e693e97d754ed6812ea115170afeae4bf8797d3f</a></li>

<li>More fixups for "unpackaged" conversion scripts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de06cfe834dfff283deddfe1eb2945ba8a4fde2a">http://git.postgresql.org/pg/commitdiff/de06cfe834dfff283deddfe1eb2945ba8a4fde2a</a></li>

<li>Remove no-longer-needed special case hacks in MSVC build scripts. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2ee69ff65de6e8626784d4a263953158ef480ab4">http://git.postgresql.org/pg/commitdiff/2ee69ff65de6e8626784d4a263953158ef480ab4</a></li>

<li>Fix obsolete references to old-style contrib installation methods. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f1fb4b0e63a677cdc86de667c75142b88a4edb65">http://git.postgresql.org/pg/commitdiff/f1fb4b0e63a677cdc86de667c75142b88a4edb65</a></li>

<li>Small improvements to external-projects documentation. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cee103da14f470d29c47827b810da44cdab2a0d2">http://git.postgresql.org/pg/commitdiff/cee103da14f470d29c47827b810da44cdab2a0d2</a></li>

<li>Rearrange extension-related views as per recent discussion. The original design of pg_available_extensions did not consider the possibility of version-specific control files. Split it into two views: pg_available_extensions shows information that is generic about an extension, while pg_available_extension_versions shows all available versions together with information that could be version-dependent. Also, add an SRF pg_extension_update_paths() to assist in checking that a collection of update scripts provide sane update path sequences. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/555353c0c59ada35ae59c8a76186e98d123fa8b3">http://git.postgresql.org/pg/commitdiff/555353c0c59ada35ae59c8a76186e98d123fa8b3</a></li>

<li>Fix MSVC build scripts for recent extension-related changes. Untested, but we'll soon see if the buildfarm likes this. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/01ff8dd7560f2647dccc3d70f713dd6b27bf843e">http://git.postgresql.org/pg/commitdiff/01ff8dd7560f2647dccc3d70f713dd6b27bf843e</a></li>

<li>Rethink naming of contrib/intagg extension. Initially it was called int_aggregate after the old SQL file, but since the documentation just says "intagg" and that's also the directory name, let's conform to that instead. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74883d33730ecb69e6f4142deb8c5882af127b32">http://git.postgresql.org/pg/commitdiff/74883d33730ecb69e6f4142deb8c5882af127b32</a></li>

<li>Fix obsolete comment. Comment about MaxAllocSize was not updated when the TOAST-header macros were replaced in 8.3 "varvarlena" changes. Per report from Frederik Ramm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/887dd041a65006deeaf514f78e4a5012dc6f7f7c">http://git.postgresql.org/pg/commitdiff/887dd041a65006deeaf514f78e4a5012dc6f7f7c</a></li>

<li>Bring hstore's comment into line with style of other contrib comments. All the other ones that are primarily a new datatype say "data type for &lt;purpose&gt;", so make this one similar. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f5fc1de501d03f6399670dd16989c5925b9191d2">http://git.postgresql.org/pg/commitdiff/f5fc1de501d03f6399670dd16989c5925b9191d2</a></li>

<li>Add CheckTableNotInUse calls in DROP TABLE and DROP INDEX. Recent releases had a check on rel-&gt;rd_refcnt in heap_drop_with_catalog, but failed to cover the possibility of pending trigger events at DROP time. (Before 8.4 we didn't even check the refcnt.) When the trigger events were eventually fired, you'd get "could not open relation with OID nnn" errors, as in recent report from strk. Better to throw a suitable error when the DROP is attempted. Also add a similar check in DROP INDEX. Back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eff027c43288d15307676b1bd4736ab11f34c407">http://git.postgresql.org/pg/commitdiff/eff027c43288d15307676b1bd4736ab11f34c407</a></li>

<li>Fix corner case for binary upgrade: extension functions in pg_catalog. Normally, pg_dump summarily excludes functions in pg_catalog from consideration. However, some extensions may create functions in pg_catalog (adminpack already does that, and extensions for procedural languages will likely do it too). In binary-upgrade mode, we have to dump such functions, or the extension will be incomplete after upgrading. Per experimentation with adminpack. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/89c29c033154b717b16db2ee3c87bdec4393b0d4">http://git.postgresql.org/pg/commitdiff/89c29c033154b717b16db2ee3c87bdec4393b0d4</a></li>

<li>Add FOREACH IN ARRAY looping to plpgsql. (I'm not entirely sure that we've finished bikeshedding the syntax details, but the functionality seems OK.) Pavel Stehule, reviewed by Stephen Frost and Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6e02755b22ea62775c906d29b87b55b38ab70bd2">http://git.postgresql.org/pg/commitdiff/6e02755b22ea62775c906d29b87b55b38ab70bd2</a></li>

<li>Make a no-op ALTER EXTENSION UPDATE give just a NOTICE, not ERROR. This seems a bit more user-friendly. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/65076269ea54a8cd6e39f066a208c7d13aceac0a">http://git.postgresql.org/pg/commitdiff/65076269ea54a8cd6e39f066a208c7d13aceac0a</a></li>

<li>Add backwards-compatible declarations of some core GIN support functions. These are needed to support reloading dumps of 9.0 installations containing contrib/intarray or contrib/tsearch2. Since not only regular dump/reload but binary upgrade would fail, it seems worth the trouble to carry these stubs for awhile. Note that the contrib opclasses referencing these functions will still work fine, since GIN doesn't actually pay any attention to the declared signature of a support function. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6595dd04d136d5c97ae05fc580572c8f00042143">http://git.postgresql.org/pg/commitdiff/6595dd04d136d5c97ae05fc580572c8f00042143</a></li>

<li>Fix bogus test for hypothetical indexes in get_actual_variable_range(). That function was supposing that indexoid == 0 for a hypothetical index, but that is not likely to be true in any non-toy implementation of an index adviser, since assigning a fake OID is the only way to know at EXPLAIN time which hypothetical index got selected. Fix by adding a flag to IndexOptInfo to mark hypothetical indexes. Back-patch to 9.0 where get_actual_variable_range() was added. Gurjeet Singh 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a2095f7fb5a57ea1794f25d029756d9a140fd429">http://git.postgresql.org/pg/commitdiff/a2095f7fb5a57ea1794f25d029756d9a140fd429</a></li>

<li>Fix blatantly uninitialized variable in recent commit. Doesn't anybody around here pay attention to compiler warnings? 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/93016983d1e8f3aeb508f1be8daf5ca5de5c5b61">http://git.postgresql.org/pg/commitdiff/93016983d1e8f3aeb508f1be8daf5ca5de5c5b61</a></li>

<li>Fix contrib/pg_trgm to have smoother updates from 9.0. Take care of some loose ends in the update-from-unpackaged script, and apply some ugly hacks to ensure that it produces the same catalog state as the fresh-install script. Per discussion, this seems like a safer plan than having two different catalog states that both call themselves "pg_trgm 1.0", even if it's not immediately clear that the subtle differences would ever matter. Also, fix the stub function gin_extract_trgm() so that it works instead of just bleating. Needed because this function will get called during a regular dump and reload, if there are any indexes using its opclass. The user won't have an opportunity to update the extension till later, so telling him to do so is unhelpful. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4eb49db7ae634fab9af7437b2e7b6388dfd83bd3">http://git.postgresql.org/pg/commitdiff/4eb49db7ae634fab9af7437b2e7b6388dfd83bd3</a></li>

<li>Fix upgrade of contrib/btree_gist from 9.0. The initial version of the update-from-unpackaged script neglected to include the &lt;&gt; operators that were added to the opclasses during 9.1. To make this script produce the same final state as the regular install script, use the same ALTER OPERATOR FAMILY trick as in pg_trgm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ec65a79db2a423a156cda8e862d34052d7175a86">http://git.postgresql.org/pg/commitdiff/ec65a79db2a423a156cda8e862d34052d7175a86</a></li>

<li>Fix upgrade of contrib/intarray and contrib/unaccent from 9.0. Take care of a couple of discrepancies between what you get from a fresh install and what the first-draft update-from-unpackaged scripts produced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0024e348989254d48dc4afe9beab98a6994a791e">http://git.postgresql.org/pg/commitdiff/0024e348989254d48dc4afe9beab98a6994a791e</a></li>

<li>Fix upgrade of contrib/xml2 from 9.0. Update script was being sloppy about two functions that have been changed since 9.0. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/de623f33353c96657651f9c3a6c8756616c610e4">http://git.postgresql.org/pg/commitdiff/de623f33353c96657651f9c3a6c8756616c610e4</a></li>

<li>Fix tsmatchsel() to account properly for null rows. ts_typanalyze.c computes MCE statistics as fractions of the non-null rows, which seems fairly reasonable, and anyway changing it in released versions wouldn't be a good idea. But then ts_selfuncs.c has to account for that. Failure to do so results in overestimates in columns with a significant fraction of null documents. Back-patch to 8.4 where this stuff was introduced. Jesper Krogh 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/52b60530f257b1591d8b72264cd6c0dd9aabfd46">http://git.postgresql.org/pg/commitdiff/52b60530f257b1591d8b72264cd6c0dd9aabfd46</a></li>

<li>One more hack to make contrib upgrades from 9.0 match fresh 9.1 installs. intarray and tsearch2 both reference core support functions in their GIN opclasses, and the signatures of those functions changed for 9.1. We added backwards-compatible pg_proc entries for the functions in order to allow 9.0 dump files to be restored at all, but that hack leaves the opclasses pointing at pg_proc entries different from what they'd point to if the contrib modules were installed fresh in 9.1. To forestall any possibility of future problems, fix the opclasses to match fresh installs via the expedient of direct UPDATEs on pg_amproc in the update-from-unpackaged scripts. (Yech ... but the alternatives are worse, or require far more effort than seems justified right now.) Note: updating pg_amproc is sufficient because there will be no pg_depend entries corresponding to these dependencies, since the referenced functions are all pinned. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/472f608e436a41865b795c999bda3369725fa097">http://git.postgresql.org/pg/commitdiff/472f608e436a41865b795c999bda3369725fa097</a></li>

<li>Fix parallel pg_restore to handle comments on POST_DATA items correctly. The previous coding would try to process all SECTION_NONE items in the initial sequential-restore pass, which failed if they were dependencies of not-yet-restored items. Fix by postponing such items into the parallel processing pass once we have skipped any non-PRE_DATA item. Back-patch into 9.0; the original parallel-restore coding in 8.4 did not have this bug, so no need to change it. Report and diagnosis by Arnd Hannemann. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4cff100d7378b65ded116c5a9960584c351e5fa9">http://git.postgresql.org/pg/commitdiff/4cff100d7378b65ded116c5a9960584c351e5fa9</a></li>

<li>Un-break building with BTREE_BUILD_STATS. This has been broken for awhile, but not clear it's worth back-patching. Euler Taveira de Oliveira 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82220e883236c214d670c3f14d943690aa78bc17">http://git.postgresql.org/pg/commitdiff/82220e883236c214d670c3f14d943690aa78bc17</a></li>

<li>Create the catalog infrastructure for foreign-data-wrapper handlers. Add a fdwhandler column to pg_foreign_data_wrapper, plus HANDLER options in the CREATE FOREIGN DATA WRAPPER and ALTER FOREIGN DATA WRAPPER commands, plus pg_dump support for same. Also invent a new pseudotype fdw_handler with properties similar to language_handler. This is split out of the "FDW API" patch for ease of review; it's all stuff we will certainly need, regardless of any other details of the FDW API. FDW handler functions will not actually get called yet. In passing, fix some omissions and infelicities in foreigncmds.c. Shigeru Hanada, Jan Urbanski, Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/327e0250716f12fe94b62669d25e572b40a8fba5">http://git.postgresql.org/pg/commitdiff/327e0250716f12fe94b62669d25e572b40a8fba5</a></li>

<li>Implement an API to let foreign-data wrappers actually be functional. This commit provides the core code and documentation needed. A contrib module test case will follow shortly. Shigeru Hanada, Jan Urbanski, Heikki Linnakangas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bb742407947ad1cbf19355d24282380d576e7654">http://git.postgresql.org/pg/commitdiff/bb742407947ad1cbf19355d24282380d576e7654</a></li>

<li>Add contrib/file_fdw foreign-data wrapper for reading files via COPY. This is both very useful in its own right, and an important test case for the core FDW support. This commit includes a small refactoring of copy.c to expose its option checking code as a separately callable function. The original patch submission duplicated hundreds of lines of that code, which seemed pretty unmaintainable. Shigeru Hanada, reviewed by Itagaki Takahiro and Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/7c5d0ae7078456bfeedb2103c45b9a32285c2631">http://git.postgresql.org/pg/commitdiff/7c5d0ae7078456bfeedb2103c45b9a32285c2631</a></li>

<li>Minor logic fix for new levenshtein implementation. Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/087bd179e63f199105dabc8be0c8aebd087a178e">http://git.postgresql.org/pg/commitdiff/087bd179e63f199105dabc8be0c8aebd087a178e</a></li>

</ul>

<p>Simon Riggs a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add version-sensitive SQL for psql when constraints NOT VALID. Bug report and fix by Andres Freund. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0b8a79c4bea7bfa89245ee03abf994b027da411">http://git.postgresql.org/pg/commitdiff/f0b8a79c4bea7bfa89245ee03abf994b027da411</a></li>

<li>PITR can stop at a named restore point when recovery target = time though must not update the last transaction timestamp. Plus comment and message cleanup for recent named restore point. Fujii Masao, minor changes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c588be729399af5cb8ec66901e3b578936823a3">http://git.postgresql.org/pg/commitdiff/5c588be729399af5cb8ec66901e3b578936823a3</a></li>

<li>Additional required docs for pg_constraint catalog entry. Noted by Bernd Helmle 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ff1b7350984b9e4055e9d3a37d3b875c0663ac4">http://git.postgresql.org/pg/commitdiff/0ff1b7350984b9e4055e9d3a37d3b875c0663ac4</a></li>

<li>Hot Standby feedback for avoidance of cleanup conflicts on standby. Standby optionally sends back information about oldestXmin of queries which is then checked and applied to the WALSender's proc-&gt;xmin. GetOldestXmin() is modified slightly to agree with GetSnapshotData(), so that all backends on primary include WALSender within their snapshots. Note this does nothing to change the snapshot xmin on either master or standby. Feedback piggybacks on the standby reply message. vacuum_defer_cleanup_age is no longer used on standby, though parameter still exists on primary, since some use cases still exist. Simon Riggs, review comments from Fujii Masao, Heikki Linnakangas, Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bca8b7f16a3e720794cb0afbdb3733be4f8d9c2c">http://git.postgresql.org/pg/commitdiff/bca8b7f16a3e720794cb0afbdb3733be4f8d9c2c</a></li>

<li>Separate messages for standby replies and hot standby feedback. Allow messages to be sent at different times, and greatly reduce the frequency of hot standby feedback. Refactor to allow additional message types. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/06828c5febf3a8f9e94bce5bd84634ce990d299f">http://git.postgresql.org/pg/commitdiff/06828c5febf3a8f9e94bce5bd84634ce990d299f</a></li>

<li>Make a hard state change from catchup to streaming mode. More useful state change for monitoring purposes, plus a required change for synchronous replication patch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc76695c4c44e21aed94ee2bea81c4cdcedf1390">http://git.postgresql.org/pg/commitdiff/bc76695c4c44e21aed94ee2bea81c4cdcedf1390</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Delete stray word from comment. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8e1124eeeb128ef87045debfeb8f24cd6dbab874">http://git.postgresql.org/pg/commitdiff/8e1124eeeb128ef87045debfeb8f24cd6dbab874</a></li>

<li>Avoid a few more SET DATA TYPE table rewrites. When the new type is an unconstrained domain over the old type, we don't need to rewrite the table. Noah Misch and Robert Haas 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d90dc16f87bd991d7eb9f536ca46acef7586d95">http://git.postgresql.org/pg/commitdiff/0d90dc16f87bd991d7eb9f536ca46acef7586d95</a></li>

<li>Rename max_predicate_locks_per_transaction. The new name, max_pred_locks_per_transaction, is shorter. Kevin Grittner, per discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a77e9385eb46829ce80971bc655df9f3ef00d9a">http://git.postgresql.org/pg/commitdiff/6a77e9385eb46829ce80971bc655df9f3ef00d9a</a></li>

<li>Assorted corrections to the patch to add WAL receiver replies. Per reports from Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/883a9659faf6e49e314b264ca32ed7645068a409">http://git.postgresql.org/pg/commitdiff/883a9659faf6e49e314b264ca32ed7645068a409</a></li>

<li>pg_ctl promote. Fujii Masao, reviewed by Robert Haas, Stephen Frost, and Magnus Hagander. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4695da5ae97bbb58d274887fd68edbe88d03ebcb">http://git.postgresql.org/pg/commitdiff/4695da5ae97bbb58d274887fd68edbe88d03ebcb</a></li>

<li>WAL receiver shouldn't try to send a reply when dying. Per report from, and discussion with, Fujii Masao. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3a087369c0ea858e56c8af5072de91778a644383">http://git.postgresql.org/pg/commitdiff/3a087369c0ea858e56c8af5072de91778a644383</a></li>

<li>Remove rule to build sepgsql-regtest.pp. Instead, document how to build it manually. Per discussion. KaiGai Kohei, with some wordsmithing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/24bc6b3db3579f4c480c6d0f81f7e50f1e6c0180">http://git.postgresql.org/pg/commitdiff/24bc6b3db3579f4c480c6d0f81f7e50f1e6c0180</a></li>

<li>Typo fixes. Thom Brown 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9408783aefee9d58dd9daf53c8d6b24ab226f05b">http://git.postgresql.org/pg/commitdiff/9408783aefee9d58dd9daf53c8d6b24ab226f05b</a></li>

<li>Add some words of caution to elog.c. Stephen Frost, somewhat rewritten by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f196738534baa95badd9d8f1debb5822240ebc6b">http://git.postgresql.org/pg/commitdiff/f196738534baa95badd9d8f1debb5822240ebc6b</a></li>

<li>Add client_hostname field to pg_stat_activity. Peter Eisentraut, reviewed by Steve Singer, Alvaro Herrera, and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4a25bc145ad5d05da6f01c00bae0f576e9e17115">http://git.postgresql.org/pg/commitdiff/4a25bc145ad5d05da6f01c00bae0f576e9e17115</a></li>

<li>Prevent possible compiler warnings. Simon Riggs reports that rnode.dbNode and rnode.spcNode were generating unused variable warnings on gcc 4.4.3 with CFLAGS=-O1 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a3e8486dffc413506b14eae9dc5d423f6ae8324a">http://git.postgresql.org/pg/commitdiff/a3e8486dffc413506b14eae9dc5d423f6ae8324a</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Allow make check in PL directories. Also add make check-world target, and refactor pg_regress invocation code in makefiles a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2fd77060a2db814146cf1f6cf77755a4b4fd9a80">http://git.postgresql.org/pg/commitdiff/2fd77060a2db814146cf1f6cf77755a4b4fd9a80</a></li>

<li>Better support for thread-support flag detection with clang. When testing the stderr produced by various thread-support flags, also run a compilation in addition to a link, because clang warns on certain flags when compiling but not when linking. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f0053845326e9eba290c78162ef355558cd2fc46">http://git.postgresql.org/pg/commitdiff/f0053845326e9eba290c78162ef355558cd2fc46</a></li>

<li>Also process psqlrc when running psql -l. This was previously not very useful, but with many people customizing the linestyle, it is nice for a consistent appearance. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b15fabf997fb3cd5e0680a6ad7576377774aae07">http://git.postgresql.org/pg/commitdiff/b15fabf997fb3cd5e0680a6ad7576377774aae07</a></li>

<li>Fix for warnings-free compilation with Python 3.2. The first argument of PyEval_EvalCode() was changed from PyCodeObject* to PyObject* because of PEP 384. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/66d6b4cb54eb3b192c8f9087592e53c53c20cf06">http://git.postgresql.org/pg/commitdiff/66d6b4cb54eb3b192c8f9087592e53c53c20cf06</a></li>

<li>Set psql client encoding from locale by default. Add a new libpq connection option client_encoding (which includes the existing PGCLIENTENCODING environment variable), which besides an encoding name accepts a special value "auto" that tries to determine the encoding from the locale in the client's environment, using the mechanisms that have been in use in initdb. psql sets this new connection option to "auto" when running from a terminal and not overridden by setting PGCLIENTENCODING. original code by Heikki Linnakangas, with subsequent contributions by Jaime Casanova, Peter Eisentraut, Stephen Frost, Ibrar Ahmed 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/02e14562a806a96f38120c96421d39dfa7394192">http://git.postgresql.org/pg/commitdiff/02e14562a806a96f38120c96421d39dfa7394192</a></li>

<li>Invalidate PL/Python functions with composite type argument when the type changes. The invalidation will cause the type information to be refetched, and everything will work. Jan Urba&#324;ski, reviewed by Alex Hunsaker 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b05186f8a403c7dcd1bd974948273f8c00edb127">http://git.postgresql.org/pg/commitdiff/b05186f8a403c7dcd1bd974948273f8c00edb127</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Make pg_upgrade compile again 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8b2557553c6eeba97d9ebf6f048369cabd25c2b6">http://git.postgresql.org/pg/commitdiff/8b2557553c6eeba97d9ebf6f048369cabd25c2b6</a></li>

<li>Cleanup ClusterInfo initialization in pg_upgrade 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b4a7e5980b2919d4d2a849d046a8e3a77e06fdb7">http://git.postgresql.org/pg/commitdiff/b4a7e5980b2919d4d2a849d046a8e3a77e06fdb7</a></li>

<li>Use $INDENT rather than indent throughout the pgindent code. This allows the user to change the path to be used more easily. Also, change URL in README. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c4d124365b9b535e8c98e4568ade3e0c15b11810">http://git.postgresql.org/pg/commitdiff/c4d124365b9b535e8c98e4568ade3e0c15b11810</a></li>

<li>Convert Postgres arrays to Perl arrays on PL/perl input arguments. More generally, arrays are turned in Perl array references, and row and composite types are turned into Perl hash references. This is done recursively, in a way that's natural to every Perl programmer. To avoid a backwards compatibility hit, the string representation of each structure is also available if the function requests it. Authors: Alexey Klyukin and Alex Hunsaker. Some code cleanups by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/87bb2ade2ce646083f39d5ab3e3307490211ad04">http://git.postgresql.org/pg/commitdiff/87bb2ade2ce646083f39d5ab3e3307490211ad04</a></li>

<li>pgindent run on plperl.c 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f7b51d175a02a3b6589f091ca732959618844232">http://git.postgresql.org/pg/commitdiff/f7b51d175a02a3b6589f091ca732959618844232</a></li>

<li>Use $INDENT instead of `which` to find the indent binary. Per discussion after my commit o yesterday. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a5dfc94c9a2e6c0c7e0ed97d22ebff37cf7d9038">http://git.postgresql.org/pg/commitdiff/a5dfc94c9a2e6c0c7e0ed97d22ebff37cf7d9038</a></li>

</ul>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Export the external file reader used in COPY FROM as APIs. They are expected to be used by extension modules like file_fdw. There are no user-visible changes. Itagaki Takahiro. Reviewed and tested by Kevin Grittner and Noah Misch. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8ddc05fb01ee2c423bf5613426726351e860d4b4">http://git.postgresql.org/pg/commitdiff/8ddc05fb01ee2c423bf5613426726351e860d4b4</a></li>

<li>Add transaction-level advisory locks. They share the same locking namespace with the existing session-level advisory locks, but they are automatically released at the end of the current transaction and cannot be released explicitly via unlock functions. Marko Tiikkaja, reviewed by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/62c7bd31c8878dd45c9b9b2429ab7a12103f3590">http://git.postgresql.org/pg/commitdiff/62c7bd31c8878dd45c9b9b2429ab7a12103f3590</a></li>

<li>Fix an uninitialized field in DR_copy. Shigeru HANADA 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5c63982af2a5d2da90259e878efb43f16ee13ce3">http://git.postgresql.org/pg/commitdiff/5c63982af2a5d2da90259e878efb43f16ee13ce3</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Properly initialize variables. Kevin Grittner 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/45a6d79b1764a78301ef008f4561b5e176352331">http://git.postgresql.org/pg/commitdiff/45a6d79b1764a78301ef008f4561b5e176352331</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>ITAGAKI Takahiro sent in another revision of the patch to implement MULTISET.</li>

<li>Stephen Frost and Robert Haas traded revisions of the patch to allow logging the current role.</li>

<li>Marti Raudsepp sent in another revision of the patch which makes it so a key lock is only acquired for columns that can be referenced.</li>

<li>Heikki Linnakangas sent in another revision of the patch to add a FDW API for SQL/MED.</li>

<li>Thom Brown sent in a patch to make array_cat consistent with the || operator for arrays with respect to NULLs.</li>

<li>ITAGAKI Takahiro sent in another revision of the patch to implement transaction-scope advisory locks.</li>

<li>Kevin Grittner sent in two revisions of a patch to fix an issue with uninitialized structures from the SSI patch.</li>

<li>ITAGAKI Takahiro sent in another revision of the COPY ENCODING patch.</li>

<li>Per feedback from Heikki Linnakangas, Simon Riggs sent in a patch to add a server_name parameter, plus mechanism to send info from standby to master. This will help with synchronous replication.</li>

<li>YAMAMOTO Takashi sent in a patch to fix an issue with SSI.</li>

<li>Tom Lane sent in two versions of a patch to fix pg_tgrm's update-from-unpackaged script.</li>

<li>Mark Kirkwood sent in a WIP patch to allow the backend to constrain temporary file space.</li>

<li>Tom Lane sent in a WIP patch to update KNN-GiST.</li>

<li>Magnus Hagander sent in another revision of the patch to include pg_basebackup.</li>

<li>Robert Haas sent in a patch to fix an issue with an assertion failure on UNLOGGED VIEWs.</li>

<li>Simon Riggs sent in a patch to add server_name for synchronous replication.</li>

<li>Simon Riggs sent in anothre revision of the patch to allow for synchronous replication.</li>

<li>Radoslaw Smogura sent in a patch to add void_send and void_receive, used in COPY ... BINARY.</li>

</ul>