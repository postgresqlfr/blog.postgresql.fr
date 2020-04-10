---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 27 février 2011"
author: "NBougain"
redirect_from: "index.php?post/2011-02-28-nouvelles-hebdomadaires-de-postgresql-27-fevrier-2011 "
---



<p><strong>Revues de code</strong></p>

<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>ITAGAKI Takahiro a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add ENCODING option to COPY TO/FROM and file_fdw. File encodings can be specified separately from client encoding. If not specified, client encoding is used for backward compatibility. Cases when the encoding doesn't match client encoding are slower than matched cases because we don't have conversion procs for other encodings. Performance improvement would be be a future work. Original patch by Hitoshi Harada, and modified by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3cba8240a195c4f323e3f934bfeab308434a9973">http://git.postgresql.org/pg/commitdiff/3cba8240a195c4f323e3f934bfeab308434a9973</a></li>

<li>Fix pg_server_to_client, that was broken in the previous commit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ca9cf85d54ec08f37edb37341ad8ee1f20211458">http://git.postgresql.org/pg/commitdiff/ca9cf85d54ec08f37edb37341ad8ee1f20211458</a></li>

<li>Make the second words lowercase in psql's \d titles for unlogged tables. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5a922f13eff66b3e437e823419d48d509d59a6be">http://git.postgresql.org/pg/commitdiff/5a922f13eff66b3e437e823419d48d509d59a6be</a></li>

<li>Add tab-completion for CREATE UNLOGGED TABLE in psql, and fix unexpected completion for DROP TEMP and UNIQUE. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/4191e16cbeafb9184dff37c3cbfe94b11a29d5f4">http://git.postgresql.org/pg/commitdiff/4191e16cbeafb9184dff37c3cbfe94b11a29d5f4</a></li>

<li>More psql tab-completion for new commands: ALTER FOREIGN DATA WRAPPER with HANDLER, ALTER TABLE VALIDATE CONSTRAINT, ALTER TYPE ADD VALUE, COPY with ENCODING and FORCE NOT NULL, CREATE FOREIGN DATA WRAPPER with HANDLER, CREATE TRIGGER ... INSTEAD OF 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6079375431d5e55f2456b47521bb16e6e263d8a6">http://git.postgresql.org/pg/commitdiff/6079375431d5e55f2456b47521bb16e6e263d8a6</a></li>

</ul>

<p>Bruce Momjian a pouss&eacute;&nbsp;:</p>

<ul>

<li>Update docs about new role privileges reference, per Alvaro Herrera. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/ede45e90dd1992bfd3e1e61ce87bad494b81f54d">http://git.postgresql.org/pg/commitdiff/ede45e90dd1992bfd3e1e61ce87bad494b81f54d</a></li>

<li>Move information_schema duplicate constraint note to the top of the information schema documentation because it affects several tables. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/fee7802770669398359c369aee83277dcc58edd1">http://git.postgresql.org/pg/commitdiff/fee7802770669398359c369aee83277dcc58edd1</a></li>

<li>Reword information_schema duplicate constraint warning text. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/edb382179d49105a236b54678a5a4020276df071">http://git.postgresql.org/pg/commitdiff/edb382179d49105a236b54678a5a4020276df071</a></li>

<li>Update wording about information schema and name which views potentially can have duplicates, per request from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c72d7042bc09bd8a1f2dc8ab288fec449760ba8">http://git.postgresql.org/pg/commitdiff/2c72d7042bc09bd8a1f2dc8ab288fec449760ba8</a></li>

<li>Document pg_options_to_table() (not previously documented) 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/772dcfe7c0b3c678c8aef11de2bf8a52150a56f1">http://git.postgresql.org/pg/commitdiff/772dcfe7c0b3c678c8aef11de2bf8a52150a56f1</a></li>

<li>Fix doc patch --- pg_options_to_table() returns "setof record". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/86434afb11093ba4e2893b717858d8ce790f3e2e">http://git.postgresql.org/pg/commitdiff/86434afb11093ba4e2893b717858d8ce790f3e2e</a></li>

<li>Document that pg_options_to_table() also works for pg_attribute.attoptions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/58838a7a52a913c66084158f98f1f62349ee6335">http://git.postgresql.org/pg/commitdiff/58838a7a52a913c66084158f98f1f62349ee6335</a></li>

<li>Fix markup for pg_options_to_table() to report the return column names, per suggestion from Andrew Dunstan. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/721ea41f1413bee70839c957a08eca62799e274f">http://git.postgresql.org/pg/commitdiff/721ea41f1413bee70839c957a08eca62799e274f</a></li>

<li>Be less detailed about reporting shared memory failure by avoiding the output of actual Postgres parameter _values_ related to shared memory, and suggesting that these are only possible parameters to reduce. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/67a5e727c8655496013b007d2fb6137fcc244b18">http://git.postgresql.org/pg/commitdiff/67a5e727c8655496013b007d2fb6137fcc244b18</a></li>

<li>Document that last vacuum statistics and counts are for non-FULL vacuums. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c11f1f714b6983e011cc4639cf669151d587e8c2">http://git.postgresql.org/pg/commitdiff/c11f1f714b6983e011cc4639cf669151d587e8c2</a></li>

</ul>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix dangling-pointer problem in before-row update trigger processing. ExecUpdate checked for whether ExecBRUpdateTriggers had returned a new tuple value by seeing if the returned tuple was pointer-equal to the old one. But the "old one" was in estate-&gt;es_junkFilter's result slot, which would be scribbled on if we had done an EvalPlanQual update in response to a concurrent update of the target tuple; therefore we were comparing a dangling pointer to a live one. Given the right set of circumstances we could get a false match, resulting in not forcing the tuple to be stored in the slot we thought it was stored in. In the case reported by Maxim Boguk in bug #5798, this led to "cannot extract system attribute from virtual tuple" failures when trying to do "RETURNING ctid". I believe there is a very-low-probability chance of more serious errors, such as generating incorrect index entries based on the original rather than the trigger-modified version of the row. In HEAD, change all of ExecBRInsertTriggers, ExecIRInsertTriggers, ExecBRUpdateTriggers, and ExecIRUpdateTriggers so that they continue to have similar APIs. In the back branches I just changed ExecBRUpdateTriggers, since there is no bug in the ExecBRInsertTriggers case. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a210be772047575331fb6b0ab7b72043f81452ba">http://git.postgresql.org/pg/commitdiff/a210be772047575331fb6b0ab7b72043f81452ba</a></li>

<li>Remove ExecRemoveJunk(), which is no longer used anywhere. This was a leftover from the pre-8.1 design of junkfilters. It doesn't seem to have any reason to live, since it's merely a combination of two easy function calls, and not a well-designed combination at that (it encourages callers to leak the result tuple). 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e852e541c84af85aa918762fc838fa44a399310">http://git.postgresql.org/pg/commitdiff/2e852e541c84af85aa918762fc838fa44a399310</a></li>

<li>Allow binary I/O of type "void". void_send is useful for the same reason that void_out doesn't throw error, namely that someone might do "select void_returning_func(...)" from a client that prefers to operate in binary mode. The void_recv function may or may not have any practical use, but we provide it for symmetry. Rados&#322;aw Smogura 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1ab9b012bdf1f106792fc523e21b9ca8299bb8ed">http://git.postgresql.org/pg/commitdiff/1ab9b012bdf1f106792fc523e21b9ca8299bb8ed</a></li>

<li>Add a relkind field to RangeTblEntry to avoid some syscache lookups. The recent additions for FDW support required checking foreign-table-ness in several places in the parse/plan chain. While it's not clear whether that would really result in a noticeable slowdown, it seems best to avoid any performance risk by keeping a copy of the relation's relkind in RangeTblEntry. That might have some other uses later, anyway. Per discussion. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bdca82f44d0e0168dece56cbd53b54ba142f328f">http://git.postgresql.org/pg/commitdiff/bdca82f44d0e0168dece56cbd53b54ba142f328f</a></li>

<li>Support data-modifying commands (INSERT/UPDATE/DELETE) in WITH. This patch implements data-modifying WITH queries according to the semantics that the updates all happen with the same command counter value, and in an unspecified order. Therefore one WITH clause can't see the effects of another, nor can the outer query see the effects other than through the RETURNING values. And attempts to do conflicting updates will have unpredictable results. We'll need to document all that. This commit just fixes the code; documentation updates are waiting on author. Marko Tiikkaja and Hitoshi Harada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/389af951552ff2209eae3e62fa147fef12329d4f">http://git.postgresql.org/pg/commitdiff/389af951552ff2209eae3e62fa147fef12329d4f</a></li>

<li>Fix order of shutdown processing when CTEs contain inter-references. We need ExecutorEnd to run the ModifyTable nodes to completion in reverse order of initialization, not forward order. Easily done by constructing the list back-to-front. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/000128bc7f591025d0c1ce539bb53c6ad00ab69c">http://git.postgresql.org/pg/commitdiff/000128bc7f591025d0c1ce539bb53c6ad00ab69c</a></li>

<li>Refactor the executor's API to support data-modifying CTEs better. The originally committed patch for modifying CTEs didn't interact well with EXPLAIN, as noted by myself, and also had corner-case problems with triggers, as noted by Dean Rasheed. Those problems show it is really not practical for ExecutorEnd to call any user-defined code; so split the cleanup duties out into a new function ExecutorFinish, which must be called between the last ExecutorRun call and ExecutorEnd. Some Asserts have been added to these functions to help verify correct usage. It is no longer necessary for callers of the executor to call AfterTriggerBeginQuery/AfterTriggerEndQuery for themselves, as this is now done by ExecutorStart/ExecutorFinish respectively. If you really need to suppress that and do it for yourself, pass EXEC_FLAG_SKIP_TRIGGERS to ExecutorStart. Also, refactor portal commit processing to allow for the possibility that PortalDrop will invoke user-defined code. I think this is not actually necessary just yet, since the portal-execution-strategy logic forces any non-pure-SELECT query to be run to completion before we will consider committing. But it seems like good future-proofing. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a874fe7b4c890d1fe3455215a83ca777867beadd">http://git.postgresql.org/pg/commitdiff/a874fe7b4c890d1fe3455215a83ca777867beadd</a></li>

<li>Add documentation for data-modifying statements in WITH clauses. Marko Tiikkaja, somewhat reworked by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0ef0b302040284a087c1bc90df5b115f0dea7764">http://git.postgresql.org/pg/commitdiff/0ef0b302040284a087c1bc90df5b115f0dea7764</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix a couple of unlogged tables goofs. "SELECT ... INTO UNLOGGED tabname" works, but wasn't documented; CREATE UNLOGGED SEQUENCE and CREATE UNLOGGED VIEW failed an assertion, instead of throwing a sensible error. Latter issue reported by Itagaki Takahiro; patch review by Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3e6b305d9e2a4616bf69e31b0b21ebbb844ba50e">http://git.postgresql.org/pg/commitdiff/3e6b305d9e2a4616bf69e31b0b21ebbb844ba50e</a></li>

<li>Named restore point improvements. Emit a log message when creating a named restore point, and improve documentation for pg_create_restore_point(). Euler Taveira de Oliveira, per suggestions from Thom Brown, with some additional wordsmithing by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/79ad8fc5f857ed38057f482fc022bf157175c4d8">http://git.postgresql.org/pg/commitdiff/79ad8fc5f857ed38057f482fc022bf157175c4d8</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add PL/Python functions for quoting strings. Add functions plpy.quote_ident, plpy.quote_literal, plpy.quote_nullable, which wrap the equivalent SQL functions. To be able to propagate char * constness properly, make the argument of quote_literal_cstr() const char *. This also makes it more consistent with quote_identifier(). Jan Urba&#324;ski, reviewed by Hitoshi Harada, some refinements by Peter Eisentraut 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c51c7d5ffd407426f314b2cd317ef77f14efb1f">http://git.postgresql.org/pg/commitdiff/1c51c7d5ffd407426f314b2cd317ef77f14efb1f</a></li>

<li>Table function support for PL/Python. This allows functions with multiple OUT parameters returning both one or multiple records (RECORD or SETOF RECORD). Jan Urba&#324;ski, reviewed by Hitoshi Harada 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/bc411f25c14f65b459de5dbc96ac79e7741ef9ee">http://git.postgresql.org/pg/commitdiff/bc411f25c14f65b459de5dbc96ac79e7741ef9ee</a></li>

<li>Remove remaining expected file for Python 2.2. We don't have complete expected coverage for Python 2.2 anyway, so it doesn't seem worth keeping this one around that no one appears to be updating anyway. Visual inspection of the differences ought to be good enough for those few who care about this obsolete Python version. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/438cdf6e4893311df4e94dc55b961a691908a530">http://git.postgresql.org/pg/commitdiff/438cdf6e4893311df4e94dc55b961a691908a530</a></li>

<li>PL/Python explicit subtransactions. Adds a context manager, obtainable by plpy.subtransaction(), to run a group of statements in a subtransaction. Jan Urba&#324;ski, reviewed by Steve Singer, additional scribbling by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/22690719ea5a89ccbcd04deb58c83d8d5f138df8">http://git.postgresql.org/pg/commitdiff/22690719ea5a89ccbcd04deb58c83d8d5f138df8</a></li>

</ul>

<p>Alvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix pageinspect's heap_page_item to return infomasks as 32 bit values. HeapTupleHeader's t_infomask and t_infomask2 are defined as 16-bit unsigned integers, so when the 16th bit was set, heap_page_item was returning them as negative values, which was ugly. The change to pageinspect--unpackaged--1.0.sql allows a module upgraded from 9.0 to be cleanly updated from the previous definition. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/a338d654614f897ccb58eaa8a6171abdb7dc8dff">http://git.postgresql.org/pg/commitdiff/a338d654614f897ccb58eaa8a6171abdb7dc8dff</a></li>

<li>Update pageinspect--1.0.sql to match the upgrade script. Per comment from Tom Lane 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0056066d06067d2d7fc84b31937933b5724347d0">http://git.postgresql.org/pg/commitdiff/0056066d06067d2d7fc84b31937933b5724347d0</a></li>

</ul>

<p>Andrew Dunstan a pouss&eacute;&nbsp;:</p>

<ul>

<li>Add a configure check for Python.h if building with python. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/42e5223648e7e56f8041bed329929dbd5529ea92">http://git.postgresql.org/pg/commitdiff/42e5223648e7e56f8041bed329929dbd5529ea92</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Increase the default for wal_sender_delay from 200ms to 1s. Now that WAL sender is immediately woken up by transaction commit, there's no need to wake up so aggressively. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/be6668d6eff6a03455b48fa8ce1a397ff5bae788">http://git.postgresql.org/pg/commitdiff/be6668d6eff6a03455b48fa8ce1a397ff5bae788</a></li>

</ul>

<p>Magnus Hagander a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix verbose display of REPLICATION role attribute. Josh Kupershmidt 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b04137a2948a24dfa3b87222f07073eb9939b264">http://git.postgresql.org/pg/commitdiff/b04137a2948a24dfa3b87222f07073eb9939b264</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Hans-Juergen Schoenig sent in a WIP patch to track cross-column correllation.</li>

<li>Kevin Grittner sent in two revisions of a patch to track changes with triggers.</li>

<li>Radoslaw Smogura sent in three revisions of a patch to add a binary in/out for aclitem.</li>

<li>Alexander Korotkov sent in a WIP patch to collect statistics for array columns.</li>

<li>Shigeru HANADA sent in another revision of the postgresql_fdw patch.</li>

<li>Gurjeet Singh sent in a patch to allow the use of paths relative to that of the current file in psql.</li>

<li>Andrew Tipton sent in a patch to add GiST support for BOX @&gt; POINT queries.</li>

<li>Magnus Hagander sent in another revision of the patch to allow streaming a base backup.</li>

<li>Fujii Masao sent in another revision of the patch to add replication server timeout.</li>

<li>Rumko (rumcic AT gmail DOT com) sent in a patch to allow PostgreSQL to compile on Dragonfly BSD.</li>

<li>Jaime Casanova sent in another revision of the patch to allow for synchronous replication.</li>

</ul>