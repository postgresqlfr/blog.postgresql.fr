---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 22 février 2015"
author: "chl"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/2015/02/24/Nouvelles-hebdomadaires-de-PostgreSQL-22-février-2015"
---


<p>Le PUG indien organise un PGday &agrave; Bengaluru (&Eacute;tat du Karnataka en Inde) le 11 avril 2015. RSVP&nbsp;: 

<a target="_blank" href="http://www.meetup.com/India-PUG/events/220553997/">http://www.meetup.com/India-PUG/events/220553997/</a></p>

<p><strong>Les nouveaut&eacute;s des produits d&eacute;riv&eacute;s</strong></p>

<ul>

<li>pypgTAP, un framework visant &agrave; faciliter le processus de d&eacute;veloppement/test/d&eacute;ploiement avec PostgreSQL&nbsp;: 

<a target="_blank" href="https://github.com/itissid/pypgTAP">https://github.com/itissid/pypgTAP</a></li>

<li>PostgreSQL Dashboard 0.2, un &eacute;cran de suivi temps-r&eacute;el bas&eacute; sur Dashing et Sinatra, released. 

<a target="_blank" href="http://daamien.github.io/PostgreSQL-Dashboard/">http://daamien.github.io/PostgreSQL-Dashboard/</a> [ndt:<a target="_blank" href="http://blog.taadeem.net/french/2015/02/23/PostgreSQL_Dashboard/">http://blog.taadeem.net/french/2015/02/23/PostgreSQL_Dashboard/</a>]</li>

<li>ODB 2.4.0, un ORM pour le C++ compatible PostgreSQL&nbsp;: 

<a target="_blank" href="http://www.codesynthesis.com/~boris/blog/2015/02/11/odb-2-4-0-released/">http://www.codesynthesis.com/~boris/blog/2015/02/11/odb-2-4-0-released/</a></li>

<li>pgpool-II versions 3.4.1, 3.3.5, 3.2.10, 3.1.13 et 3.0.17 publi&eacute;es avec pgpoolAdmin 3.4.1. pgpool-II est un pooler de connexion et un syst&egrave;me de r&eacute;plication pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://pgpool.net/mediawiki/index.php/Downloads">http://pgpool.net/mediawiki/index.php/Downloads</a> <a target="_blank" href="http://pgpool.net/mediawiki/index.php/Yum_Repository">http://pgpool.net/mediawiki/index.php/Yum_Repository</a></li>

<li>psycopg2 2.6 et 2.5.5, un connecteur Python pour PostgreSQL&nbsp;: 

<a target="_blank" href="http://initd.org/psycopg/articles/2015/02/09/psycopg-26-and-255-released/">http://initd.org/psycopg/articles/2015/02/09/psycopg-26-and-255-released/</a></li>

</ul>

<p><strong>Offres d'emplois autour de PostgreSQL en f&eacute;vrier</strong></p>

<ul>

<li>Internationales&nbsp;: 

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2015-02/threads.php">http://archives.postgresql.org/pgsql-jobs/2015-02/threads.php</a>;</li>

<li>Francophones&nbsp;: 

<a target="_blank" href="http://forums.postgresql.fr/viewforum.php?id=4">http://forums.postgresql.fr/viewforum.php?id=4</a>.</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<ul>

<li>pgDaySF 2015 aura lieu le 10 mars 2015 &agrave; Burlingame (Californie)&nbsp;: 

<a target="_blank" href="http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/">http://sfpostgres.org/pgday-sf-2015-call-for-speakers-and-sponsors/</a></li>

<li>Les inscriptions pour le <em>Nordic PostgreSQL Day 2015</em>, pr&eacute;vu le 11 mars 2015 &agrave; Copenhague (Danemark), sont ouvertes&nbsp;: 

<a target="_blank" href="http://2015.nordicpgday.org/registration/">http://2015.nordicpgday.org/registration/</a></li>

<li>PGConf US 2015 aura lieu du 25 au 27 mars 2015 &agrave; New-York City&nbsp;: 

<a target="_blank" href="http://nyc.pgconf.us/2015/">http://nyc.pgconf.us/2015/</a></li>

<li>PGCon 2015 du 16 au 20 juin &agrave; Ottawa, Canada&nbsp;: 

<a target="_blank" href="http://www.pgcon.org/2015/">http://www.pgcon.org/2015/</a></li>

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

<p>(<a target="_blank" href="http://www.postgresql.org/message-id/20150222234820.GC5556@fetter.org">lien vers l'article original</a>)</p>

<!--more-->


<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Tom Lane a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix null-pointer-deref crash while doing COPY IN with check constraints. In commit bf7ca15875988a88e97302e012d7c4808bef3ea9 I introduced an assumption that an RTE referenced by a whole-row Var must have a valid eref field. This is false for RTEs constructed by DoCopy, and there are other places taking similar shortcuts. Perhaps we should make all those places go through addRangeTableEntryForRelation or its siblings instead of having ad-hoc logic, but the most reliable fix seems to be to make the new code in ExecEvalWholeRowVar cope if there's no eref. We can reasonably assume that there's no need to insert column aliases if no aliases were provided. Add a regression test case covering this, and also verifying that a sane column name is in fact available in this situation. Although the known case only crashes in 9.4 and HEAD, it seems prudent to back-patch the code change to 9.2, since all the ingredients for a similar failure exist in the variant patch applied to 9.3 and 9.2. Per report from Jean-Pierre Pelletier. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/08361cea2b333189fa3736f2dc6452cef654923d">http://git.postgresql.org/pg/commitdiff/08361cea2b333189fa3736f2dc6452cef654923d</a></li>

<li>Rationalize the APIs of array element/slice access functions. The four functions array_ref, array_set, array_get_slice, array_set_slice have traditionally declared their array inputs and results as being of type "ArrayType *". This is a lie, and has been since Berkeley days, because they actually also support "fixed-length array" types such as "name" and "point"; not to mention that the inputs could be toasted. These values should be declared Datum instead to avoid confusion. The current coding already risks possible misoptimization by compilers, and it'll get worse when "expanded" array representations become a valid alternative. However, there's a fair amount of code using array_ref and array_set with arrays that *are* known to be ArrayType structures, and there might be more such places in third-party code. Rather than cluttering those call sites with PointerGetDatum/DatumGetArrayTypeP cruft, what I did was to rename the existing functions to array_get_element/array_set_element, fix their signatures, then reincarnate array_ref/array_set as backwards compatibility wrappers. array_get_slice/array_set_slice have no such constituency in the core code, and probably not in third-party code either, so I just changed their APIs. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e983c4d1aa42d613542cf222e222b034918374b1">http://git.postgresql.org/pg/commitdiff/e983c4d1aa42d613542cf222e222b034918374b1</a></li>

<li>Use fast path in plpgsql's RETURN/RETURN NEXT in more cases. exec_stmt_return() and exec_stmt_return_next() have fast-path code for handling a simple variable reference (i.e. "return var") without going through the full expression evaluation machinery. For some reason, pl_gram.y was under the impression that this fast path only applied for record/row variables; but in reality code for handling regular scalar variables has been there all along. Adjusting the logic to allow that code to be used actually results in a net savings of code in pl_gram.y (by eliminating some redundancy), and it buys a measurable though not very impressive amount of speedup. Noted while fooling with my expanded-array patch, wherein this makes a much bigger difference because it enables returning an expanded array variable without an extra flattening step. But AFAICS this is a win regardless, so commit it separately. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9e3ad1aac52454569393a947c06be0d301749362">http://git.postgresql.org/pg/commitdiff/9e3ad1aac52454569393a947c06be0d301749362</a></li>

<li>Fix misuse of memcpy() in check_ip(). The previous coding copied garbage into a local variable, pretty much ensuring that the intended test of an IPv6 connection address against a promoted IPv4 address from pg_hba.conf would never match. The lack of field complaints likely indicates that nobody realized this was supposed to work, which is unsurprising considering that no user-facing docs suggest it should work. In principle this could have led to a SIGSEGV due to reading off the end of memory, but since the source address would have pointed to somewhere in the function's stack frame, that's quite unlikely. What led to discovery of the bug is Hugo Osvaldo Barrera's report of a crash after an OS upgrade, which is probably because he is now running a system in which memcpy raises abort() upon detecting overlapping source and destination areas. (You'd have to additionally suppose some things about the stack frame layout to arrive at this conclusion, but it seems plausible.) This has been broken since the code was added, in commit f3aec2c7f51904e7, so back-patch to all supported branches. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cb66f495f5d0c204f051971f2c549d5c3ac850ea">http://git.postgresql.org/pg/commitdiff/cb66f495f5d0c204f051971f2c549d5c3ac850ea</a></li>

<li>Remove code to match IPv4 pg_hba.conf entries to IPv4-in-IPv6 addresses. In investigating yesterday's crash report from Hugo Osvaldo Barrera, I only looked back as far as commit f3aec2c7f51904e7 where the breakage occurred (which is why I thought the IPv4-in-IPv6 business was undocumented). But actually the logic dates back to commit 3c9bb8886df7d56a and was simply broken by erroneous refactoring in the later commit. A bit of archives excavation shows that we added the whole business in response to a report that some 2003-era Linux kernels would report IPv4 connections as having IPv4-in-IPv6 addresses. The fact that we've had no complaints since 9.0 seems to be sufficient confirmation that no modern kernels do that, so let's just rip it all out rather than trying to fix it. Do this in the back branches too, thus essentially deciding that our effective behavior since 9.0 is correct. If there are any platforms on which the kernel reports IPv4-in-IPv6 addresses as such, yesterday's fix would have made for a subtle and potentially security-sensitive change in the effective meaning of IPv4 pg_hba.conf entries, which does not seem like a good thing to do in minor releases. So let's let the post-9.0 behavior stand, and change the documentation to match it. In passing, I failed to resist the temptation to wordsmith the description of pg_hba.conf IPv4 and IPv6 address entries a bit. A lot of this text hasn't been touched since we were IPv4-only. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e105def09f27d49c1761abab06b427cfaa5d304">http://git.postgresql.org/pg/commitdiff/2e105def09f27d49c1761abab06b427cfaa5d304</a></li>

<li>Fix EXPLAIN output for cases where parent table is excluded by constraints. The previous coding in EXPLAIN always labeled a ModifyTable node with the name of the target table affected by its first child plan. When originally written, this was necessarily the parent table of the inheritance tree, so everything was unconfusing. But when we added NO INHERIT constraints, it became possible for the parent table to be deleted from the plan by constraint exclusion while still leaving child tables present. This led to the ModifyTable plan node being labeled with the first surviving child, which was deemed confusing. Fix it by retaining the parent table's RT index in a new field in ModifyTable. Etsuro Fujita, reviewed by Ashutosh Bapat and myself 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/abe45a9b315d7b3739f442597f570f9454bd466d">http://git.postgresql.org/pg/commitdiff/abe45a9b315d7b3739f442597f570f9454bd466d</a></li>

<li>Fix failure to honor -Z compression level option in pg_dump -Fd. cfopen() and cfopen_write() failed to pass the compression level through to zlib, so that you always got the default compression level if you got any at all. In passing, also fix these and related functions so that the correct errno is reliably returned on failure; the original coding supposes that free() cannot change errno, which is untrue on at least some platforms. Per bug #12779 from Christoph Berg. Back-patch to 9.1 where the faulty code was introduced. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0e7e355f27302b62af3e1add93853ccd45678443">http://git.postgresql.org/pg/commitdiff/0e7e355f27302b62af3e1add93853ccd45678443</a></li>

<li>Fix placement of "SET row_security" command issuance in pg_dump. Somebody apparently threw darts at the code to decide where to insert these. They certainly didn't proceed by adding them where other similar SETs were handled. This at least broke pg_restore, and perhaps other use-cases too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/297b2c1ef9878f84a9951beadf831ef390227238">http://git.postgresql.org/pg/commitdiff/297b2c1ef9878f84a9951beadf831ef390227238</a></li>

<li>Split array_push into separate array_append and array_prepend functions. There wasn't any good reason for a single C function to implement both these SQL functions: it saved very little code overall, and it required significant pushups to re-determine at runtime which case applied. Redoing it as two functions ends up with just slightly more lines of code, but it's simpler to understand, and faster too because we need not repeat syscache lookups on every call. An important side benefit is that this eliminates the only case in which different aliases of the same C function had both anyarray and anyelement arguments at the same position, which would almost always be a mistake. The opr_sanity regression test will now notice such mistakes since there's no longer a valid case where it happens. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/56a79a869bedc4bf6c35853642694cc0b0594dd2">http://git.postgresql.org/pg/commitdiff/56a79a869bedc4bf6c35853642694cc0b0594dd2</a></li>

<li>Update assorted TOAST-related documentation. While working on documentation for expanded arrays, I noticed a number of details in the TOAST-related documentation that were already inaccurate or obsolete. This should be fixed independently of whether expanded arrays get in or not. One issue is that the already existing indirect-pointer facility was not documented at all. Also, the documentation says that you only need to use VARSIZE/SET_VARSIZE if you've made your variable-length type TOAST-aware, but actually we've forced that business on all varlena types even if they've opted out of TOAST by setting storage = plain. Wordsmith a few other things too, like an amusingly archaic claim that there are few 64-bit machines. I thought about back-patching this, but since all this doco is oriented to hackers and C-coded extension authors, fixing it in HEAD is probably good enough. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9bb955c8286c20474b5462eea3e3cf76c694d88f">http://git.postgresql.org/pg/commitdiff/9bb955c8286c20474b5462eea3e3cf76c694d88f</a></li>

<li>Add pg_stat_get_snapshot_timestamp() to show statistics snapshot timestamp. Per discussion, this could be useful for purposes such as programmatically detecting a nonresponding stats collector. We already have the timestamp anyway, it's just a matter of providing a SQL-accessible function to fetch it. Matt Kelly, reviewed by Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2fb7a75f37d0beca80f45e15736ec8d50064228a">http://git.postgresql.org/pg/commitdiff/2fb7a75f37d0beca80f45e15736ec8d50064228a</a></li>

<li>Use "#ifdef CATALOG_VARLEN" to protect nullable fields of pg_authid. This gives a stronger guarantee than a mere comment against accessing these fields as simple struct members. Since rolpassword is in fact varlena, it's not clear why these didn't get marked from the beginning, but let's do it now. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/692bd09ad12a27fda3566787b089fbd394d7b65b">http://git.postgresql.org/pg/commitdiff/692bd09ad12a27fda3566787b089fbd394d7b65b</a></li>

<li>Remove unused variable. Per buildfarm. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9aa53bbd15ef65a4be6c09709fbe985898ae9ad7">http://git.postgresql.org/pg/commitdiff/9aa53bbd15ef65a4be6c09709fbe985898ae9ad7</a></li>

<li>Some more FLEXIBLE_ARRAY_MEMBER hacking. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5740be6d6e39dd85587aa71b3bd1fb0a423858b0">http://git.postgresql.org/pg/commitdiff/5740be6d6e39dd85587aa71b3bd1fb0a423858b0</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in struct varlena. This forces some minor coding adjustments in tuptoaster.c and inv_api.c, but the new coding there is cleaner anyway. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e38b1eb0986990d539e056a65c6b122b295ce932">http://git.postgresql.org/pg/commitdiff/e38b1eb0986990d539e056a65c6b122b295ce932</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in struct RecordIOData. I (tgl) fixed this last night in rowtypes.c, but I missed that the code had been copied into a couple of other places. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c110eff1324f5c882c737ad988191ed4a54c4936">http://git.postgresql.org/pg/commitdiff/c110eff1324f5c882c737ad988191ed4a54c4936</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in some more places. Fix a batch of structs that are only visible within individual .c files. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33a3b03d636b529b27f869e332b6344d52635331">http://git.postgresql.org/pg/commitdiff/33a3b03d636b529b27f869e332b6344d52635331</a></li>

<li>Fix statically allocated struct with FLEXIBLE_ARRAY_MEMBER member. clang complains about this, not unreasonably, so define another struct that's explicitly for a WordEntryPos with exactly one element. While at it, get rid of pretty dubious use of a static variable for more than one purpose --- if it were being treated as const maybe I'd be okay with this, but it isn't. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/33b2a2c97f3dd4cf8bbc2c020e34129886367b72">http://git.postgresql.org/pg/commitdiff/33b2a2c97f3dd4cf8bbc2c020e34129886367b72</a></li>

<li>Some more FLEXIBLE_ARRAY_MEMBER fixes. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/f2874feb7c4e71200539c0287544eeebd8fcb3d4">http://git.postgresql.org/pg/commitdiff/f2874feb7c4e71200539c0287544eeebd8fcb3d4</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in a bunch more places. Replace some bogus "x[1]" declarations with "x[FLEXIBLE_ARRAY_MEMBER]". Aside from being more self-documenting, this should help prevent bogus warnings from static code analyzers and perhaps compiler misoptimizations. This patch is just a down payment on eliminating the whole problem, but it gets rid of a lot of easy-to-fix cases. Note that the main problem with doing this is that one must no longer rely on computing sizeof(the containing struct), since the result would be compiler-dependent. Instead use offsetof(struct, lastfield). Autoconf also warns against spelling that offsetof(struct, lastfield[0]). Michael Paquier, review and additional fixes by me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/09d8d110a604e52216102e73fb8475b7aa88f1d1">http://git.postgresql.org/pg/commitdiff/09d8d110a604e52216102e73fb8475b7aa88f1d1</a></li>

<li>Fix misparsing of empty value in conninfo_uri_parse_params(). After finding an "=" character, the pointer was advanced twice when it should only advance once. This is harmless as long as the value after "=" has at least one character; but if it doesn't, we'd miss the terminator character and include too much in the value. In principle this could lead to reading off the end of memory. It does not seem worth treating as a security issue though, because it would happen on client side, and besides client logic that's taking conninfo strings from untrusted sources has much worse security problems than this. Report and patch received off-list from Thomas Fanghaenel. Back-patch to 9.2 where the faulty code was introduced. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b26e2081423cf1c70f83a11787351017c97cfd7c">http://git.postgresql.org/pg/commitdiff/b26e2081423cf1c70f83a11787351017c97cfd7c</a></li>

<li>Minor code beautification in conninfo_uri_parse_params(). Reading this made me itch, so clean the logic a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3d9b6f31eec150b5a6000e0814e81e36d9eb069a">http://git.postgresql.org/pg/commitdiff/3d9b6f31eec150b5a6000e0814e81e36d9eb069a</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER for HeapTupleHeaderData.t_bits[]. This requires changing quite a few places that were depending on sizeof(HeapTupleHeaderData), but it seems for the best. Michael Paquier, some adjustments by me 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e1a11d93111ff3fba7a91f3f2ac0b0aca16909a8">http://git.postgresql.org/pg/commitdiff/e1a11d93111ff3fba7a91f3f2ac0b0aca16909a8</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in a number of other places. I think we're about done with this... 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2e211211a76782b6084194a5ced94c0795460047">http://git.postgresql.org/pg/commitdiff/2e211211a76782b6084194a5ced94c0795460047</a></li>

<li>Don't need to explain [1] kluge anymore in xfunc.sgml. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0627eff3602c0ce0e8358d48ddb3ffa73963e4d0">http://git.postgresql.org/pg/commitdiff/0627eff3602c0ce0e8358d48ddb3ffa73963e4d0</a></li>

<li>Use FLEXIBLE_ARRAY_MEMBER in Windows-specific code. Be a tad more paranoid about overlength input, too. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/332f02f88beead6365bc2126c95451520bbfe163">http://git.postgresql.org/pg/commitdiff/332f02f88beead6365bc2126c95451520bbfe163</a></li>

<li>Try to fix busted gettimeofday() code. Per buildfarm, we have to match the _stdcall property of the system functions. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/e9fd5545de3bb4efe163af4a9c957badac86ccd7">http://git.postgresql.org/pg/commitdiff/e9fd5545de3bb4efe163af4a9c957badac86ccd7</a></li>

<li>Represent BETWEEN as a special node type in raw parse trees. Previously, gram.y itself converted BETWEEN into AND (or AND/OR) nests of expression comparisons. This was always as bogus as could be, but fixing it hasn't risen to the top of the to-do list. The present patch invents an A_Expr representation for BETWEEN expressions, and does the expansion to comparison trees in parse_expr.c which is at least a slightly saner place to be doing semantic conversions. There should be no change in the post- parse-analysis results. This does nothing for the semantic issues with BETWEEN (dubious connection to btree-opclass semantics, and multiple evaluation of possibly volatile subexpressions) ... but it's a necessary preliminary step before we could fix any of that. The main immediate benefit is that preserving BETWEEN as an identifiable raw-parse-tree construct will enable better error messages. While at it, fix the code so that multiply-referenced subexpressions are physically duplicated before being passed through transformExpr(). This gets rid of one of the principal reasons why transformExpr() has historically had to allow already-processed input. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/34af082f95aa6adb8af5fbd4da46bd4c3c176856">http://git.postgresql.org/pg/commitdiff/34af082f95aa6adb8af5fbd4da46bd4c3c176856</a></li>

<li>Get rid of multiple applications of transformExpr() to the same tree. transformExpr() has for many years had provisions to do nothing when applied to an already-transformed expression tree. However, this was always ugly and of dubious reliability, so we'd be much better off without it. The primary historical reason for it was that gram.y sometimes returned multiple links to the same subexpression, which is no longer true as of my BETWEEN fixes. We'd also grown some lazy hacks in CREATE TABLE LIKE (failing to distinguish between raw and already-transformed index specifications) and one or two other places. This patch removes the need for and support for re-transforming already transformed expressions. The index case is dealt with by adding a flag to struct IndexStmt to indicate that it's already been transformed; which has some benefit anyway in that tablecmds.c can now Assert that transformation has happened rather than just assuming. The other main reason was some rather sloppy code for array type coercion, which can be fixed (and its performance improved too) by refactoring. I did leave transformJoinUsingClause() still constructing expressions containing untransformed operator nodes being applied to Vars, so that transformExpr() still has to allow Var inputs. But that's a much narrower, and safer, special case than before, since Vars will never appear in a raw parse tree, and they don't have any substructure to worry about. In passing fix some oversights in the patch that added CREATE INDEX IF NOT EXISTS (missing processing of IndexStmt.if_not_exists). These appear relatively harmless, but still sloppy coding practice. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/6a75562ed16b5fa52cfd8830e4546972e647db26">http://git.postgresql.org/pg/commitdiff/6a75562ed16b5fa52cfd8830e4546972e647db26</a></li>

<li>Add parse location fields to NullTest and BooleanTest structs. We did not need a location tag on NullTest or BooleanTest before, because no error messages referred directly to their locations. That's planned to change though, so add these fields in a separate housekeeping commit. Catversion bump because stored rules may change. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c063da1769229efa8d8d21f0d068b3199ea3a6b3">http://git.postgresql.org/pg/commitdiff/c063da1769229efa8d8d21f0d068b3199ea3a6b3</a></li>

</ul>

<p>Fujii Masao a pouss&eacute;&nbsp;:</p>

<ul>

<li>Correct the path of pg_lzcompress.c in doc. Commit 40bede5 moved pg_lzcompress.c to src/common, but forgot to update its path in doc. This commit fixes that oversight. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/cef30974dec2c052170b80eff1fe4b9bb285e903">http://git.postgresql.org/pg/commitdiff/cef30974dec2c052170b80eff1fe4b9bb285e903</a></li>

</ul>

<p>Heikki Linnakangas a pouss&eacute;&nbsp;:</p>

<ul>

<li>In the SSL test suite, use a root CA cert that won't expire (so quickly). All the other certificates were created to be valid for 10000 days, because we don't want to have to recreate them. But I missed the root CA cert, and the pre-created certificates included in the repository expired in January. Fix, and re-create all the certificates. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/2c75531a6cc49a56afbd5619c36b3daccbe243fa">http://git.postgresql.org/pg/commitdiff/2c75531a6cc49a56afbd5619c36b3daccbe243fa</a></li>

<li>Restore the SSL_set_session_id_context() call to OpenSSL renegotiation. This reverts the removal of the call in commit (272923a0). It turns out it wasn't superfluous after all: without it, renegotiation fails if a client certificate was used. The rest of the changes in that commit are still OK and not reverted. Per investigation of bug #12769 by Arne Scheffer, although this doesn't fix the reported bug yet. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/1c2b7c0879d83ff79e4adf2c0a883df92b713da4">http://git.postgresql.org/pg/commitdiff/1c2b7c0879d83ff79e4adf2c0a883df92b713da4</a></li>

<li>Fix comment in libpq OpenSSL code about why a substitue BIO is used. The comment was copy-pasted from the backend code along with the implementation, but libpq has different reasons for using the BIO. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c478959a009a926ec441f355219eae18537e648c">http://git.postgresql.org/pg/commitdiff/c478959a009a926ec441f355219eae18537e648c</a></li>

<li>Fix knn-GiST queue comparison function to return heap tuples first. The part of the comparison function that was supposed to keep heap tuples ahead of index items was backwards. It would not lead to incorrect results, but it is more efficient to return heap tuples first, before scanning more index pages, when both have the same distance. Alexander Korotkov 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d17b6df239e6eebf288969e931cdbe8076d1fe12">http://git.postgresql.org/pg/commitdiff/d17b6df239e6eebf288969e931cdbe8076d1fe12</a></li>

<li>Fix a bug in pairing heap removal code. After removal, the next_sibling pointer of a node was sometimes incorrectly left to point to another node in the heap, which meant that a node was sometimes linked twice into the heap. Surprisingly that didn't cause any crashes in my testing, but it was clearly wrong and could easily segfault in other scenarios. Also always keep the prev_or_parent pointer as NULL on the root node. That was not a correctness issue AFAICS, but let's be tidy. Add a debugging function, to dump the contents of a pairing heap as a string. It's #ifdef'd out, as it's not used for anything in any normal code, but it was highly useful in debugging this. Let's keep it handy for further reference. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/931bf3eb9b203ca02d729f5122a44cc250c27695">http://git.postgresql.org/pg/commitdiff/931bf3eb9b203ca02d729f5122a44cc250c27695</a></li>

<li>Remove dead structs. These are not used with the new WAL format anymore. GIN split records are simply always recorded as full-page images. Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/634618ecd039cf99fb8212b0314ef8a3754ca9c2">http://git.postgresql.org/pg/commitdiff/634618ecd039cf99fb8212b0314ef8a3754ca9c2</a></li>

</ul>

<p>Kevin Grittner a pouss&eacute;&nbsp;:</p>

<ul>

<li>Eliminate unnecessary NULL checks in picksplit method of intarray. Where these checks were being done there was no code path which could leave them NULL. Michael Paquier per Coverity 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/c923e82a231ebfe7c4329984c68819e26837bee6">http://git.postgresql.org/pg/commitdiff/c923e82a231ebfe7c4329984c68819e26837bee6</a></li>

</ul>

<p>Robert Haas a pouss&eacute;&nbsp;:</p>

<ul>

<li>Improve pg_check_dir code and comments. Avoid losing errno if readdir() fails and closedir() works. Consistently return 4 rather than 3 if both a lost+found directory and other files are found, rather than returning one value or the other depending on the order of the directory listing. Update comments to match the actual behavior. These oversights date to commits 6f03927fce038096f53ca67eeab9adb24938f8a6 and 17f15239325a88581bb4f9cf91d38005f1f52d69. Marco Nenciarini 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/5d6c2405f4bae6c87533d981d6a47587db501220">http://git.postgresql.org/pg/commitdiff/5d6c2405f4bae6c87533d981d6a47587db501220</a></li>

<li>Don't require users of src/port/gettimeofday.c to initialize it. Commit 8001fe67a3d66c95861ce1f7075ef03953670d13 introduced this requirement, but per discussion, we want to avoid requirements of this type to make things easier on the calling code. An especially important consideration is that this may be used in frontend code, not just the backend. Asif Naeem, reviewed by Michael Paquier 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/64235fecc6d377690444ca3702257b5e39ed3413">http://git.postgresql.org/pg/commitdiff/64235fecc6d377690444ca3702257b5e39ed3413</a></li>

</ul>

<p>&Aacute;lvaro Herrera a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix object identities for pg_conversion objects. We were neglecting to schema-qualify them. Backpatch to 9.3, where object identities were introduced as a concept by commit f8348ea32ec8. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/0d906798f680b2dd86cbc8d31ba64685aeb12092">http://git.postgresql.org/pg/commitdiff/0d906798f680b2dd86cbc8d31ba64685aeb12092</a></li>

<li>Fix opclass/opfamily identity strings. The original representation uses "opcname for amname", which is good enough; but if we replace "for" with "using", we can apply the returned identity directly in a DROP command, as in DROP OPERATOR CLASS opcname USING amname This slightly simplifies code using object identities to programatically execute commands on these kinds of objects. Note backwards-incompatible change: The previous representation dates back to 9.3 when object identities were introduced by commit f8348ea3, but we don't want to change the behavior on released branches unnecessarily and so this is not backpatched. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/9c7dd350199fa030ccbd5538e1b8e13a9603fda4">http://git.postgresql.org/pg/commitdiff/9c7dd350199fa030ccbd5538e1b8e13a9603fda4</a></li>

<li>Update PGSTAT_FILE_FORMAT_ID. Previous commit should have bumped it but didn't. Oops. Per note from Tom Lane. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/3b14bb77716a01915da4833194e7c8c1c51da66d">http://git.postgresql.org/pg/commitdiff/3b14bb77716a01915da4833194e7c8c1c51da66d</a></li>

<li>Have TRUNCATE update pgstat tuple counters. This works by keeping a per-subtransaction record of the ins/upd/del counters before the truncate, and then resetting them; this record is useful to return to the previous state in case the truncate is rolled back, either in a subtransaction or whole transaction. The state is propagated upwards as subtransactions commit. When the per-table data is sent to the stats collector, a flag indicates to reset the live/dead counters to zero as well. Catalog version bumped due to the change in pgstat format. Author: Alexander Shulgin Discussion: 1007.1207238291@sss.pgh.pa.us Discussion: 548F7D38.2000401@BlueTreble.com Reviewed-by: &Aacute;lvaro Herrera, Jim Nasby 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d42358efb16cc81122c53ffb35ac381b9158e519">http://git.postgresql.org/pg/commitdiff/d42358efb16cc81122c53ffb35ac381b9158e519</a></li>

<li>Remove unnecessary and unreliable test 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/8902f79264d95ed84e4c9fb4749b3956b4c74349">http://git.postgresql.org/pg/commitdiff/8902f79264d95ed84e4c9fb4749b3956b4c74349</a></li>

</ul>

<p>Peter Eisentraut a pouss&eacute;&nbsp;:</p>

<ul>

<li>Fix Perl coding error in msvc build system. Code like 'open(P, "cl /? 2&gt;&amp;1 |") || die "cl command not found";' does not actually catch any errors, because the exit status of the command before the pipe is ignored. The fix is to look at $?. This also gave the opportunity to clean up the logic of this code a bit. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/d30292b8c45a1d909ff7d84bd6787c8827134fc3">http://git.postgresql.org/pg/commitdiff/d30292b8c45a1d909ff7d84bd6787c8827134fc3</a></li>

</ul>

<p>Andres Freund a pouss&eacute;&nbsp;:</p>

<ul>

<li>Force some system catalog table columns to be marked NOT NULL. In a manual pass over the catalog declaration I found a number of columns which the boostrap automatism didn't mark NOT NULL even though they actually were. Add BKI_FORCE_NOT_NULL markings to them. It's usually not critical if a system table column is falsely determined to be nullable as the code should always catch relevant cases. But it's good to have a extra layer in place. Discussion: 20150215170014.GE15326@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/82a532b34d7547b43b90e2e4d4953f4be1c655b8">http://git.postgresql.org/pg/commitdiff/82a532b34d7547b43b90e2e4d4953f4be1c655b8</a></li>

<li>Allow forcing nullness of columns during bootstrap. Bootstrap determines whether a column is null based on simple builtin rules. Those work surprisingly well, but nonetheless a few existing columns aren't set correctly. Additionally there is at least one patch sent to hackers where forcing the nullness of a column would be helpful. The boostrap format has gained FORCE [NOT] NULL for this, which will be emitted by genbki.pl when BKI_FORCE_(NOT_)?NULL is specified for a column in a catalog header. This patch doesn't change the marking of any existing columns. Discussion: 20150215170014.GE15326@awork2.anarazel.de 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/eb68379c38202180bc8e33fb9987284e314b7fc8">http://git.postgresql.org/pg/commitdiff/eb68379c38202180bc8e33fb9987284e314b7fc8</a></li>

</ul>

<p>Jeff Davis a pouss&eacute;&nbsp;:</p>

<ul>

<li>In array_agg(), don't create a new context for every group. Previously, each new array created a new memory context that started out at 8kB. This is incredibly wasteful when there are lots of small groups of just a few elements each. Change initArrayResult() and friends to accept a "subcontext" argument to indicate whether the caller wants the ArrayBuildState allocated in a new subcontext or not. If not, it can no longer be released separately from the rest of the memory context. Fixes bug report by Frank van Vugt on 2013-10-19. Tomas Vondra. Reviewed by Ali Akbar, Tom Lane, and me. 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/b419865a814abbca12bdd6eef6a3d5ed67f432e1">http://git.postgresql.org/pg/commitdiff/b419865a814abbca12bdd6eef6a3d5ed67f432e1</a></li>

<li>Rename variable in AllocSetContextCreate to be consistent. Everywhere else in the file, "context" is of type MemoryContext and "set" is of type AllocSet. AllocSetContextCreate uses a variable of type AllocSet, so rename it from "context" to "set". 

<a target="_blank" href="http://git.postgresql.org/pg/commitdiff/74811c4050921959d54d42e2c15bb79f0e2c37f3">http://git.postgresql.org/pg/commitdiff/74811c4050921959d54d42e2c15bb79f0e2c37f3</a></li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>No one was disappointed this week</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Shigeru HANADA sent in two more revisions of a patch to implement join push-down support for foreign tables.</li>

<li>Michael Paquier sent in two more revisions of a patch to ensure that pg_dump gets attributes from tables in extensions.</li>

<li>Syed Rahila sent in another revision of a patch to implement compression of full-page writes.</li>

<li>Tom Lane sent in two more revisions of a patch to manipulate complex types as non-contiguous structures in-memory.</li>

<li>Peter Geoghegan sent in two more revisions of a patch to add INSERT ... ON CONFLICT {UPDATE | IGNORE}.</li>

<li>Amit Kapila sent in another revision of a patch to implement parallel sequential scans.</li>

<li>Petr (PJMODOS) Jelinek sent in two more revisions of a patch to implement TABLESAMPLE.</li>

<li>Ashutosh Bapat sent in a patch to implement some infrastructure for allowing 2PC across FDWs.</li>

<li>Michael Paquier sent in another revision of a patch to fix pg_dump's treatment of tables in EXTENSIONs.</li>

<li>Oskari Saarenmaa sent in another revision of a patch to fix aligned attribute for Sun CC and use custom macros for all attributes.</li>

<li>Alexander Korotkov sent in another revision of a patch to implement KNN-GiST with recheck.</li>

<li>Michael Paquier sent in another revision of a patch to enable table-level log_autovacuum_min_duration.</li>

<li>Stephen Frost sent in two more revisions of a patch to fix some odd behavior of updatable security barrier views on foreign tables.</li>

<li>Michael Paquier sent in two more revisions of a patch to fix a strange assertion using VACOPT_FREEZE in vacuum.c.</li>

<li>Kyotaro HORIGUCHI sent in three more revisions of a patch to fix a bug where pg_basebackup may fail to send feedback.</li>

<li>Robert Haas sent in another revision of a patch to allow assessing parallel safety.</li>

<li>Kyotaro HORIGUCHI sent in another revision of a patch to add regrole and regnamespace.</li>

<li>Adam Brightwell sent in another revision of a patch to remove the catupdate check.</li>

<li>Rugal Bernstein sent in a patch to fix psql/po/zh_CN.po for better comprehension by people in mainland China.</li>

<li>Corey Huinker sent in a patch to add polymorphic functions to dblink.</li>

<li>Etsuro Fujita sent in another revision of a patch to allow foreign tables to participate in table inheritance hierarchies.</li>

<li>Bruce Momjian sent in a patch to better document pg_upgrade on replicas.</li>

<li>David Fetter, Pavel Stehule, and &Aacute;lvaro Herrera traded patches to fix a broken behavior in psql's \c for URIs and connect strings where only part of the specified item got used.</li>

<li>&Aacute;lvaro Herrera sent in a patch to have RENAME routines return ObjectAddress rather than OID.</li>

<li>&Aacute;lvaro Herrera sent in a patch to support more commands in event triggers.</li>

<li>Fujii Masao sent in another revision of a patch to add recovery_timeout option to control timeout of restore_command nonzero status code.</li>

<li>Andres Freund sent in a patch to debloat and deduplicate transaction commit/abort records.</li>

<li>Peter Geoghegan sent in a patch to make tuplesort_begin_datum() consistent with other comparable routines for other tuple cases.</li>

<li>Andres Freund sent in a WIP patch to resolve regtype/regproc in genbki.pl.</li>

<li>Andrew Dunstan sent in another revision of a patch to add min and max execute statement time in pg_stat_statement.</li>

<li>Andres Freund sent in a flock of patches to improve deparsing support.</li>

<li>Tom Lane sent in a patch to fix the precedence of standard comparison operators.</li>

<li>Peter Geoghegan sent in a patch to add a decay to the threshold that (estimated) abbreviated key cardinality must cross as a proportion of the (estimated) cardinality of the original set of strings to be sorted, while also quadrupling the initial required proportional cardinality to 20% of full key cardinality (but for just the first 10,000 strings, before this threshold is decayed aggressively).</li>

<li>Pavel Stehule sent in another revision of a patch to add array_position().</li>

</ul>