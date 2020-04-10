---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 8 novembre 2009"
author: "NBougain"
redirect_from: "index.php?post/2009-11-12-nouvelles-hebdomadaires-de-postgresql-8-novembre-2009 "
---



<p><strong>Correctifs appliqu&eacute;s</strong></p>

<p>Peter Eisentraut a commit&eacute;&nbsp;:</p>

<ul>

<li>Fix obscure segfault condition in PL/Python In PLy_output(), when the elog() call in the TRY branch throws an exception (this can happen when a statement timeout kicks in, for example), the PyErr_SetString() call in the CATCH branch can cause a segfault, because the Py_XDECREF(so) call before it releases memory that is still used by the sv variable that PyErr_SetString() uses as argument, because sv points into memory owned by so. Backpatched back to 8.0, where this code was introduced. I also threw in a couple of volatile declarations for variables that are used before and after the TRY. I don't think they caused the crash that I observed, but they could become issues.</li>

<li>In pgsql/src/bin/psql/describe.c, show view definition only with \d+, not with \d The rationale is that view definitions tend to be long and obscure the main information about the view.</li>

<li>Improve PL/Python elog output. When the elog functions (plpy.info etc.) get a single argument, just print that argument instead of printing the single-member tuple like ('foo',).</li>

<li>Fix regression tests for psql \d view patch.</li>

<li>Build bzip2 tarball in dist target as well.</li>

<li>In pgsql/src/backend/postmaster/syslogger.c, reenable -&gt; re-enable Pointed out by Debian's lintian.</li>

</ul>

<p>Heikki Linnakangas a commit&eacute;&nbsp;:</p>

<ul>

<li>In pgsql/src/backend/commands/tablecmds.c, allow rewriting ALTER TABLE to skip WAL logging. Itagaki Takahiro, with small changes by me and Simon.</li>

<li>In pgsql/contrib/pg_standby/pg_standby.c, disable triggering failover with a signal in pg_standby on Windows, because Windows doesn't do signal processing like other platforms do. It never really worked, but recent changes to the signal handling made it crash. This fixes bug #4961. Patch by Fujii Masao.</li>

</ul>

<p>Tom Lane a commit&eacute;&nbsp;:</p>

<ul>

<li>Add support for invoking parser callback hooks via SPI and in cached plans. As proof of concept, modify plpgsql to use the hooks. plpgsql is still inserting $n symbols textually, but the "back end" of the parsing process now goes through the ParamRef hook instead of using a fixed parameter-type array, and then execution only fetches actually-referenced parameters, using a hook added to ParamListInfo. Although there's a lot left to be done in plpgsql, this already cures the "if (TG_OP = 'INSERT' and NEW.foo ...)" problem, as illustrated by the changed regression test.</li>

<li>In pgsql/src/backend/parser/gram.y, make expression locations for LIKE and SIMILAR TO constructs uniformly point at the first keyword of the expression, rather than drawing a rather artificial distinction between the ESCAPE subclause and the rest. Per gripe from Gokulakannan Somasundaram and subsequent discusssion.</li>

<li>Rename some encoding conversion modules to keep pathnames in our source tarballs under 100 characters. This should avoid failures with certain untarring tools (WinZip and Midnight Commander have been mentioned as likely suspects). Per my proposal of yesterday. catversion bumped since the initial contents of pg_proc change.</li>

<li>Allow binary-coercible cases in ri_HashCompareOp; there are some such cases that are not handled by find_coercion_pathway, notably composite-&gt;RECORD. Now that 8.4 supports composites as primary keys, it's worth dealing with this case.</li>

<li>Remove plpgsql's RENAME declaration, which has bizarre and mostly nonfunctional behavior, and is so little used that no one has been interested in fixing it. To ensure that possible uses are covered, remove the ALIAS declaration's arbitrary restriction that only $n identifiers can be aliased. (We could alternatively make RENAME act just like ALIAS, but per discussion having two different ways to do the same thing is probably more confusing than helpful.)</li>

<li>Don't treat NEW and OLD as reserved words anymore. For the purposes of rules it works just as well to have them be ordinary identifiers, and this gets rid of a number of ugly special cases. Plus we aren't interfering with non-rule usage of these names. catversion bump because the names change internally in stored rules.</li>

<li>Change plpgsql from using textual substitution to insert variable references into SQL expressions, to using the newly added parser callback hooks. This allows us to do the substitutions in a more semantically-aware way: a variable reference will only be recognized where it can validly go, ie, a place where a column value or parameter would be legal, instead of the former behavior that would replace any textual match including table names and column aliases (leading to syntax errors later on). A release-note-worthy fine point is that plpgsql variable names that match fully-reserved words will now need to be quoted. This commit preserves the former behavior that variable references take precedence over any possible match to a column name. The infrastructure is in place to support the reverse precedence or throwing an error on ambiguity, but those behaviors aren't accessible yet. Most of the code changes here are associated with making the namespace data structure persist so that it can be consulted at runtime, instead of throwing it away at the end of initial function parsing. The plpgsql scanner is still doing name lookups, but that behavior is now irrelevant for SQL expressions. A future commit will deal with removing unnecessary lookups.</li>

<li>Rearrange plpgsql parsing to simplify and speed it up a bit. 1. Pull the responsibility for %TYPE and %ROWTYPE out of the scanner, letting read_datatype manage it instead. 2. Avoid unnecessary scanner-driven lookups of plpgsql variables in places where it's not needed, which is actually most of the time; we do not need it in DECLARE sections nor in text that is a SQL query or expression. 3. Rationalize the set of token types returned by the scanner: distinguishing T_SCALAR, T_RECORD, T_ROW seems to complicate the grammar in more places than it simplifies it, so merge these into one token type T_DATUM; but split T_ERROR into T_DBLWORD and T_TRIPWORD for clarity and simplicity of later processing. Some of this will need to be revisited again when we try to make plpgsql use the core scanner, but this patch gets some of the bigger stumbling blocks out of the way.</li>

<li>Remove ancient text file containing plpgsql installation instructions. This was long ago superseded by the standard build process and main SGML documentation.</li>

<li>Modernize plpgsql's handling of parse locations, making it look a lot more like the core parser's code. In particular, track locations at the character rather than line level during parsing, allowing many more parse-time error conditions to be reported with precise error pointers rather than just "near line N". Also, exploit the fact that we no longer need to substitute $N for variable references by making extracted SQL queries and expressions be exact copies of subranges of the function text, rather than having random whitespace changes within them. This makes it possible to directly map parse error positions from the core parser onto positions in the function text, which lets us report them without the previous kluge of showing the intermediate internal-query form. (Later it might be good to do that for core parse-analysis errors too, but this patch is just touching plpgsql's lexer/parser, not what happens at runtime.) In passing, make plpgsql's lexer use palloc not malloc. These changes make plpgsql's parse-time error reports noticeably nicer (as illustrated by the regression test changes), and will also simplify the planned removal of plpgsql's separate lexer by reducing the impedance mismatch between what it does and what the core lexer does.</li>

<li>Fix WHERE CURRENT OF to work as designed within plpgsql. The argument can be the name of a plpgsql cursor variable, which formerly was converted to $N before the core parser saw it, but that's no longer the case. Deal with plain name references to plpgsql variables, and add a regression test case that exposes the failure.</li>

</ul>

<p>Andrew Dunstan a commit&eacute;&nbsp;:</p>

<ul>

<li>Keep track of language's trusted flag in InlineCodeBlock. Needed to support DO blocks for languages that have both trusted and untrusted variants.</li>

</ul>

<p><strong>Correctifs rejet&eacute;s (&agrave; ce jour)</strong></p>

<ul>

<li>Pas de d&eacute;ception cette semaine&nbsp;:-)</li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>Josh Tolley and Andrew Dunstan make call-and-response patches to allow PL/Perl[U] to have in-line (DO) functions.</li>

<li>Pavel Stehule sent in two revisions of a patch to make it possible to store the typemods for function parameters, both input and output.</li>

<li>Peter Eisentraut sent in a patch to support arrays in PL/PythonU as both input and output parameters.</li>

<li>John Naylor sent in a WIP patch to move the current BKI system to one where one set of files drives the creation of both the bootstrap files and some hard-coded strings in header files from YAML formatted descriptions of the system catalogs.</li>

<li>ITAGAKI Takahiro sent in another WIP patch to do partitioning range and list partitioning directly in SQL.</li>

<li>KaiGai Kohei sent in a patch to disallow renaming a column inherited from multiple parents.</li>

<li>Alvaro Herrera sent in a WIP patch to fix a corner case where VACUUM and TRUNCATE don't work together correctly.</li>

<li>Jeff Davis sent in two more revisions of the operator exclusion constraints patch.</li>

</ul>