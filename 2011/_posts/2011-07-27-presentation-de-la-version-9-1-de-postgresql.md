---
layout: post
title: "Présentation de la version 9.1 de PostgreSQL"
author: "mcousin"
categories: [None]
redirect_from: "index.php?post/2011/07/27/Présentation-de-la-version-9.1-de-PostgreSQL"
---




<!--more-->


Cet article présente, comme je commence à en avoir pris l'habitude maintenant, les fonctionnalités qui me semblent importantes dans la version 9.1. Tout n'est évidemment pas présenté, certaines modifications étant soit peu importantes, soit plutôt relatives à l'infrastructure du logiciel, et donc pas immédiatement visibles.



Pour la petite histoire, la version précédente (concernant la 9.0) a été rédigée initialement en version française, puis traduite en anglais (initialement par moi, puis relue par des membres dont c'est la langue maternelle), afin de servir de tutorial associé à l'annonce de la nouvelle version. Cette année, j'ai commencé par la version anglaise, qui est déjà disponible depuis mai. Je ne la traduis que maintenant en français.



Cela signifie aussi qu'une partie de ce document, dans la version anglaise, n'a pas été rédigée par moi. L'article original, en langue anglaise, est accessible ici : [|http://wiki.postgresql.org/wiki/What's_new_in_PostgreSQL_9.1|en]. Le chapitre sur SSI (vous allez bientôt savoir ce que c'est) a été écrit intégralement par Kevin Grittner, et provient de cette page : [|http://wiki.postgresql.org/wiki/SSI|en].



This document showcases many of the latest developments in PostgreSQL 9.1, compared to the last major release &ndash; PostgreSQL 9.0. There are many improvements in this release, so this wiki page covers many of the more important changes in detail. The full list of changes is itemised in [http://www.postgresql.org/docs/9.1/static/release-9-1 Release Notes].



=Major new features=



==Synchronous replication and other replication features==



There are quite a lot of new features around replication in 9.1:



* In 9.0, the user used for replication had to be a superuser. It's no longer the case, there is a new 'replication' privilege.



  CREATE ROLE replication_role REPLICATION LOGIN PASSWORD 'pwd_replication'.



This role can then be added to the pg_hba.conf to be used for streaming replication. It's better, from a security point of view,

than having a superuser role doing this job.



Now that we have a database created our replication user, we can set the database up for streaming replication. It's a matter of

adding the permission to connect to the virtual replication database in ''pg_hba.conf'', setting up ''wal_level'', ''archiving'' and ''max_wal_senders'', and has

been covered in the 9.0 documentation.



When our database is ready for streaming, we can demo the second new feature.



* pg_basebackup.



This tool is used to create a clone of a database, or a backup, using only the streaming replication features. There is no need to call ''pg_start_backup()'', then copy the database manually and call ''pg_stop_backup()''. pg_basebackup does all in one command. We'll clone the running database to /tmp/newcluster:



  > pg_basebackup -D /tmp/newcluster -U replication -v

  Password: 

  NOTICE:  pg_stop_backup complete, all required WAL segments have been archived

  pg_basebackup: base backup completed



This new database is ready to start: just add a ''recovery.conf'' file with a ''restore_command'' to retrieve archived WAL files, and start the new cluster.

pg_basebackup can also create tar backups, or include all required xlog files (to get a standalone backup).



As we're going to now demo streaming replication with synchronous commit, we'll setup a recovery.conf to connect to the master database and stream changes.



We'll create a recovery.conf containing something like this:



  restore_command = 'cp /tmp/%f %p'               # e.g. 'cp /mnt/server/archivedir/%f %p'

  standby_mode = on

  primary_conninfo = 'host=localhost port=59121 user=replication password=replication application_name=newcluster'            # e.g. 'host=localhost port=5432'

  trigger_file = '/tmp/trig_f_newcluster'



Then we'll start the new cluster:



  pg_ctl -D /tmp/newcluster start

  

  LOG:  database system was interrupted; last known up at 2011-05-22 17:15:45 CEST

  LOG:  entering standby mode

  LOG:  restored log file "00000001000000010000002F" from archive

  LOG:  redo starts at 1/2F000020

  LOG:  consistent recovery state reached at 1/30000000

  LOG:  database system is ready to accept read only connections

  cp: cannot stat « /tmp/000000010000000100000030 »: No such file or directory

  LOG:  streaming replication successfully connected to primary



Ok, now we have a slave, streaming from the master, but we're still asynchronous. Notice that we set ''application_name'' in the connection string in recovery.conf.



* Synchronous replication



To get synchronous, just change, in the master's postgresql.conf:



  synchronous_standby_names = 'newcluster'



This is the application_name from our primary_conninfo from the slave. Just do a pg_ctl reload, and this new parameter will be set. Now any commit on the master will only be reported as committed on the master when the slave has written it on its on journal, and acknowledged it to the master.



A word of warning: transactions are considered committed when they are applied to the slave's journal, not when they are visible on the slave. It means there will still be a delay between the moment a transaction is committed on the master, and the moment it is visible on the slave. This still is synchronous replication because no data will be lost if the master crashes.



One of the really great features of synchronous replication is that it is controllable per session. The parameter ''synchronous_commit'' can be turned off (it is on by default) in a session, if it does not require this synchronous guarantee. If you don't need it in your transaction, just do a

  SET synchronous_commit TO off

and you wont pay the penalty.



There are other new replication features for PostgreSQL 9.1:



* The slaves can now ask the master not to vacuum records they still need.



It was a major setup problem with 9.0: a vacuum could destroy records that were still necessary to running queries on the slave, triggering replication conflicts. The slave then had to make a choice: kill the running query, or accept deferring the application of the modifications, and lag behind. One could work around this by setting ''vacuum_defer_cleanup_age'' to a non-zero value, but it was quite hard to get a correct value for it. This new feature is enabled with the parameter ''hot_standby_feedback'', on the standby databases. Of course, this means that the standby can prevent VACUUM from doing a correct maintenance on the master, if there are very long running queries on the slave.



* pg_stat_replication is a new system view.



It displays, on the master, the status of all slaves: how much WAL they received, if they are connected, synchronous, what they did replay:



  =# SELECT * from pg_stat_replication ;

   procpid | usesysid |   usename   | application_name | client_addr | client_hostname | client_port |        backend_start         |   state   | sent_location | write_location | flush_location | replay_location | sync_priority | sync_state 

  ---------+----------+-------------+------------------+-------------+-----------------+-------------+------------------------------+-----------+---------------+----------------+----------------+-----------------+---------------+------------

     17135 |    16671 | replication | newcluster       | 127.0.0.1   |                 |       43745 | 2011-05-22 18:13:04.19283+02 | streaming | 1/30008750    | 1/30008750     | 1/30008750     | 1/30008750      |             1 | sync



There is no need to query the slaves anymore to know their status relative to the master.



* pg_stat_database_conflicts is another new system view.



This one is on the standby database, and shows how many queries have been cancelled, and for what reasons:



  =# SELECT * from pg_stat_database_conflicts ;

   datid |  datname  | confl_tablespace | confl_lock | confl_snapshot | confl_bufferpin | confl_deadlock 

  -------+-----------+------------------+------------+----------------+-----------------+----------------

       1 | template1 |                0 |          0 |              0 |               0 |              0

   11979 | template0 |                0 |          0 |              0 |               0 |              0

   11987 | postgres  |                0 |          0 |              0 |               0 |              0

   16384 | marc      |                0 |          0 |              1 |               0 |              0



* replication can now be easily paused on a slave.



Just call ''pg_xlog_replay_pause()'' to pause, ''pg_xlog_replay_resume()'' to resume. This will freeze the database, making it a very good tool to do consistent backups.



''pg_is_xlog_replay_paused()'' can be used to know the current status. 



Log replay can also now be paused at the end of a database recovery without putting the database into production, to give the administrator the opportunity to query the database. The administrator can then check if the recovery point reached is correct, before ending recovery. This new parameter is ''pause_at_recovery_target'', in recovery.conf.



* Restore points can now be created.



They are just named addesses in the transaction journal.



They can then be used by specifying a recovery_target_name, instead of a recovery_target_time or a recovery_target_xid in the recovery.conf file.



They are created by calling pg_create_restore_point().





==Per-column collations==



The collation order is not unique in a database anymore.



Let's say you were using a 9.0 database, with an UTF8 encoding and a de_DE.utf8 collation (alphabetical sort)

order,  because most of your users speak German. If you had to store french data too,

and had to sort, some french users could have been disappointed:



  SELECT * from (values ('élève'),('élevé'),('élever'),('Élève')) as tmp order by column1;

   column1 

  ---------

   élevé

   élève

   Élève

   élever



It's not that bad, but it's not the french collation order: accentuated (diactric) characters are

considered equal on first pass to the unaccentuated characters. Then, on a second pass, they are considered to be after the unaccentuated ones.

Except that on that second pass, the letters are considered from the end to the beginning of the word. That's a bit strange, but that's the

french collation rules…



With 9.1, two new features are available:



* You can specify collation at query time:



  SELECT * FROM (VALUES ('élève'),('élevé'),('élever'),('Élève')) AS tmp ORDER BY column1 COLLATE "fr_FR.utf8";

   column1 

  ---------

   élève

   Élève

   élevé

   élever



* You can specify collation at table definition time:



  CREATE TABLE french_messages (message TEXT COLLATE "fr_FR.utf8");

  INSERT INTO french_messages VALUES ('élève'),('élevé'),('élever'),('Élève');

  SELECT * FROM french_messages ORDER BY message;

   message 

  ---------

   élève

   Élève

   élevé

   élever



And of course you can create an index on the message column, that can be used for fast french sorting.



 

==Unlogged Tables==



These can be used for ephemeral data. An unlogged table is much faster to write,

but won't survive a crash (it will be truncated at database restart in case of a crash).



They don't have the WAL maintenance overhead, so they are much faster to write to.



Here is a (non-realistic) example:



  # CREATE TABLE test (a int);

  CREATE TABLE

  # CREATE UNLOGGED table testu (a int);

  CREATE TABLE

  # CREATE INDEX idx_test on test (a);

  CREATE INDEX

  # CREATE INDEX idx_testu on testu (a );

  CREATE INDEX

  =# \timing 

  Timing is on.

  =# INSERT INTO test SELECT generate_series(1,1000000);

  INSERT 0 1000000

  Time: 17601,201 ms

  =# INSERT INTO testu SELECT generate_series(1,1000000);

  INSERT 0 1000000

  Time: 3439,982 ms



These table are very efficient for caching data, or for anything that can be rebuilt

in case of a crash.





==Extensions==



This item and the following one are another occasion to present several features in one go. We'll need to

install pg_trgm, and it is now an extension.



Let's first install pg_trgm. Until 9.0, we had to run a script manually, the command looked like this:



  \i /usr/local/pgsql/share/contrib/pg_trgm.sql



This was a real maintenance problem: the created functions defaulted to the public

schema, were dumped "as is" in pg_dump files, often didn't restore correctly as

they depended on external binary objects, or could change definitions between releases.



With 9.1, one can use the CREATE EXTENSION command:



  CREATE EXTENSION [ IF NOT EXISTS ] extension_name

      [ WITH ] [ SCHEMA schema ]

               [ VERSION version ]

               [ FROM old_version ]



Most important options are ''extension_name'', of course, and ''schema'': extensions

can be stored in a schema.



So let's install the pg_trgm for the next example:



  =# CREATE schema extensions;

  CREATE SCHEMA



  =# CREATE EXTENSION pg_trgm WITH SCHEMA extensions;

  CREATE EXTENSION



Now, pg_trgm is installed in an 'extensions' schema. It will be included in database

dumps correctly, with the CREATE EXTENSION syntax. So if anything changes in the extension,

this extension will be restored with the new definition.



One can get the list of extensions under psql:

  \dx

                                      List of installed extensions

     Name   | Version |   Schema   |                            Description                            

  ----------+---------+------------+-------------------------------------------------------------------

   pg_trgm  | 1.0     | extensions | text similarity measurement and index searching based on trigrams

   plpgsql  | 1.0     | pg_catalog | PL/pgSQL procedural language

  (2 rows)





==K-Nearest-Neighbor Indexing==



GIST indexes can now be used to return sorted rows, if a 'distance' has a meaning and

can be defined for the data type.

For now, this work has been done for the point datatype, the pg_trgm contrib, and 

many btree_gist datatypes. This feature is available for all datatypes to use, so

there will probably be more in the near future.



For now, here is an example with pg_trgm. pg_trgm uses trigrams

to compare strings. Here are the trigrams for the 'hello' string:



  SELECT show_trgm('hello');

              show_trgm            

  ---------------------------------

   {"  h"," he",ell,hel,llo,"lo "}



Trigrams are used to evaluate similarity (between 0 and 1) between strings. So there is a notion of

distance, with distance defined as '1-similarity'.



Here is an example using pg_trgm. The table contains 5 million text records, for 750MB.



  CREATE TABLE test_trgm ( text_data text);



  CREATE INDEX test_trgm_idx on test_trgm using gist (text_data extensions.gist_trgm_ops);



Until 9.0, if we wanted the 2 closest text_data to hello from the table, here was the query:



  SELECT text_data, similarity(text_data, 'hello')

  FROM test_trgm 

  WHERE text_data % 'hello'

  ORDER BY similarity(text_data, 'hello')

  LIMIT 2;



On the test database, it takes around 2 seconds to complete.



With 9.1 and KNN, one can write:



  SELECT text_data, text_data <-> 'hello'

  FROM test_trgm 

  ORDER BY text_data <-> 'hello'

  LIMIT 2;



The <-> operator is the distance operator.

It runs in 20ms, using the index to directly retrieve the 2 best records.



While we're talking about pg_trgm, another new feature is that the LIKE and ILIKE

operators can now automatically make use of a trgm index. Still using the same

table:

  SELECT text_data

  FROM test_trgm

  WHERE text_data like '%hello%';



uses the test_trgm_idx index (instead of scanning the whole table).



==Serializable Snapshot Isolation==



This feature is very useful if you need all your transactions to behave as if they are

running serially, without sacrificing too much throughput, as is currently the

case with other 'serializable' isolation implementations (this is usually done by locking every record accessed).



As is it quite complex to demonstrate correctly, here is a link to a full explanation

of this feature:

http://wiki.postgresql.org/wiki/SSI



TODO: the SSI documentation always concludes with a commit. It may be confusing to the reader.





==Writeable Common Table Expressions==



This extends the WITH syntax introduced in 8.4. Now, data modification queries can

be put in the WITH part of the query, and the returned data used later.



Let's say we want to archive all records matching %hello% from our test_trgm table:



  CREATE TABLE old_text_data (text_data text);

  

  WITH deleted AS (DELETE FROM test_trgm WHERE text_data like '%hello%' RETURNING text_data)

  INSERT INTO old_text_data SELECT * FROM deleted;



All in one query.



==SE-Postgres==

      PostgreSQL is the only database which offers full integration 

        with SELinux secure data frameworks.  Military-grade security 

        for your database. 

TODO



==PGXN==



[http://pgxn.org/ PGXN] is the PostgreSQL Extension Network, a central distribution system for open-source PostgreSQL extension libraries. Extensions author can [http://manager.pgxn.org/ submit their work] together with [http://pgxn.org/spec/ metadata describing them]: the packages and their documentation are [http://pgxn.org/ indexed] and distributed across several servers. The system can be used via web interface or using command line clients thanks to a [https://github.com/pgxn/pgxn-api/wiki simple API].



A comprehensive [http://pgxnclient.projects.postgresql.org/ PGXN client] is being developed. It can be installed with:



 $ easy_install pgxnclient

 Searching for pgxnclient

 ...

 Best match: pgxnclient 0.2.1

 Processing pgxnclient-0.2.1-py2.6.egg

 ...

 Installed pgxnclient-0.2.1-py2.6.egg



Among the other commands, it allows to search for extensions in the website:



 $ pgxn search pair

 pair 0.1.3

     ... Usage There are two ways to construct key/value *pairs*: Via the

     *pair*() function: % SELECT *pair*('foo', 'bar'); *pair* ------------

     (foo,bar) Or by using the ~> operator: % SELECT 'foo' ~> 'bar';

     *pair*...

 

 semver 0.2.2

     *pair* │ 0.1.0 │ Key/value *pair* data type Note that "0.35.0b1" is less

     than "0.35.0", as required by the specification. Use ORDER BY to get

     more of a feel for semantic version ordering rules: SELECT...



To build them and install in the system:



 $ pgxn install pair

 INFO: best version: pair 0.1.3

 INFO: saving /tmp/tmpezwyEO/pair-0.1.3.zip

 INFO: unpacking: /tmp/tmpezwyEO/pair-0.1.3.zip

 INFO: building extension

 ...

 INFO: installing extension

 [sudo] password for piro: 

 /bin/mkdir -p '/usr/local/pg91b1/share/postgresql/extension'

 ...



And to load them as database extensions:



 $ pgxn load -d mydb pair

 INFO: best version: pair 0.1.3

 CREATE EXTENSION



==SQL/MED==



Support for SQL/MED (Management of External Data) was started with 9.0. But now PostgreSQL can define foreign

tables, which is the main purpose of SQL/MED: accessing external data. Here is an

example, using the file_fdw extension.



We'll map a CSV file to a table.



  CREATE EXTENSION file_fdw WITH SCHEMA extensions;

  \dx+ file_fdw

            Objects in extension "file_fdw"

                   Object Description                 

  ----------------------------------------------------

   foreign-data wrapper file_fdw

   function extensions.file_fdw_handler()

   function extensions.file_fdw_validator(text[],oid)



This next step is optional. It's just to show the 'CREATE FOREIGN DATA WRAPPER' syntax:



  =# CREATE FOREIGN DATA WRAPPER file_data_wrapper HANDLER extensions.file_fdw_handler;

  CREATE FOREIGN DATA WRAPPER



The extension already creates a foreign data wrapper called file_fdw. We'll use it from now on.



We need to create a 'server'. As we're only retrieving data from a file, it seems to be overkill,

but SQL/MED is also capable of coping with remote databases.



  CREATE SERVER file FOREIGN DATA WRAPPER file_fdw ;

  CREATE SERVER



Now, let's link a statistical_data.csv file to a statistical_data table:



  CREATE FOREIGN TABLE statistical_data (field1 numeric, field2 numeric) server file options (filename '/tmp/statistical_data.csv', format 'csv', delimiter ';') ;

  CREATE FOREIGN TABLE

  marc=# SELECT * from statistical_data ;

   field1 | field2 

  --------+--------

      0.1 |    0.2

      0.2 |    0.4

      0.3 |    0.9

      0.4 |    1.6



For now, foreign tables are SELECT-only.



TODO: does this also work with dblink ?



=Backward compatibility issues=



The next items are to be checked when migrating to 9.1.



* The default value of ''standard_conforming_strings'' changed to ''on''



Traditionally, PostgreSQL didn't treat ordinary string literals ('..') as the SQL standard specifies: backslashes ('\') were considered an escape character, so what was behind it was interpreted. For instance, \n is a newline character, \\ is a backslash character. It is more C-like.



With 9.1, ''standard_conforming_strings'' now defaults to ''on'', meaning that ordinary string literals are now treated as the SQL standard specifies. It means that single quotes are to be protected with a second single quote instead of a backslash, and that backslashes aren't an escape character anymore.



So, where previously it would have been 'I can\'t', it now should be 'I can''t'.



There are several things to know:



:* The old syntax is still available. Just put an E in front of the starting quote: E'I can\'t'

:* ''standard_conforming_strings'' can still be set to ''off''

:* Many programming languages already do what's correct, as long as you ask them to escape the strings for you. For instance, libpq's PQescapeLiteral detects automatically standard_conforming_strings' value.

Still, double check your program is ready for this.



* function-style and attribute-style data type casts for composite types is disallowed



Since 8.4, it has been possible to cast almost anything to a text format.

Let's try this with the previous foreign table:



  =# SELECT cast(statistical_data as text) from statistical_data ;

   statistical_data 

  ------------------

   (0.1,0.2)

   (0.2,0.4)

   (0.3,0.9)

   (0.4,1.6)

  (4 rows)



The problem is that 8.4 and 9.0 gives us 4 syntaxes to do this:

:* SELECT cast(statistical_data as text) from statistical_data ;

:* SELECT statistical_data::text from statistical_data;

:* SELECT statistical_data.text from statistical_data;

:* SELECT text(statistical_data) from statistical_data;

The two latter syntaxes aren't allowed anymore for composite types (such as a table record): they were too easy to accidentally use.



* Casting checks for domains based on arrays have been tightened



Now, PostgreSQL double-checks when you update an element of a constraint made upon an array.



Here is how it behaved in 9.0:



  =#CREATE DOMAIN test_dom as int[] check (value[1] > 0);

  CREATE DOMAIN

  =#SELECT '{-1,0,0,0,0}'::test_dom;

  ERROR:  value for domain test_dom violates check constraint "test_dom_check"



Okay, that's normal



  =#CREATE TABLE test_dom_table (test test_dom);

  CREATE TABLE

  =# INSERT INTO test_dom_table values ('{1,0,0,0,0}');

  INSERT 0 1

  =# UPDATE test_dom_table SET test[1]=-1;

  UPDATE 1



This isn't normal… it's not allowed by the check constraint. This is not possible anymore in 9.1, the check is performed correctly.



* string_to_array() now return an empty array for a zero-length string. Previously this returned NULL.



  =# SELECT string_to_array('','whatever');

   string_to_array 

  -----------------

   {}



* string_to_array() now splits splits the string into characters if the separator is NULL. Previously this returned NULL.



  =# SELECT string_to_array('foo',NULL);

   string_to_array 

  -----------------

   {f,o,o}



* PL/pgSQL's RAISE without parameters changed



This is a rare case, but one that caught people used to the Oracle way of doing it.



Here is an example:



  CREATE OR REPLACE FUNCTION raise_demo () returns void language plpgsql as $$

  BEGIN

    RAISE NOTICE 'Main body';

    BEGIN

      RAISE NOTICE 'Sub-block';

      RAISE EXCEPTION serialization_failure; -- Simulate a problem

    EXCEPTION WHEN serialization_failure THEN

      BEGIN

        -- Maybe we had a serialization error

        -- Won't happen here of course

        RAISE DEBUG 'There was probably a serialization failure. It could be because of...';

        -- ..

        -- If I get there let's pretend I couldn't find a solution to the error

        RAISE; -- Let's forward the error

      EXCEPTION WHEN OTHERS THEN

          -- This should capture everything

          RAISE EXCEPTION 'Couldn t figure what to do with the error';

      END;

    END;

  END;

  $$

  ;

CREATE FUNCTION



With 9.0, you get this (with ''client_min_messages'' set to ''debug''):

  =# SELECT raise_demo();

  NOTICE:  Main body

  NOTICE:  Sub-block

  DEBUG:  There was probably a serialization failure. It could be because of...

  ERROR:  serialization_failure





With 9.1:

  =# SELECT raise_demo();

  NOTICE:  Main body

  NOTICE:  Sub-block

  DEBUG:  There was probably a serialization failure. It could be because of...

  ERROR:  Couldn t figure what to do with the error





The difference is that RAISE without parameters, in 9.0, puts the code flow back to where the EXCEPTION occurred.

In 9.1, the RAISE continues in the block where it occurs, so the inner BEGIN block isn't left when the RAISE is

triggered. Its exception block is performed.



=Performance improvements=



*  Synchronous writes have been optimized to less stress the filesystem.



This one is hard to demonstrate. But performance and responsiveness (latency) has been greatly improved on write intensive loads.



* Inheritance table in queries can now return meaningfully-sorted results, allow optimizations of MIN/MAX for inheritance



If you're using a lot of inheritance, probably in a partitioning context, you're going to love these optimisations.



The query planner got much smarter on the following case.



Let's create a mockup schema:



  =# CREATE TABLE parent (a int);

  CREATE TABLE

  =# CREATE TABLE children_1 ( check (a between 1 and 10000000)) inherits (parent);

  CREATE TABLE

  =# CREATE TABLE children_2 ( check (a between 10000001 and 20000000)) inherits (parent);

  CREATE TABLE

  =# INSERT INTO children_1 select generate_series(1,10000000);

  INSERT 0 10000000

  =# INSERT INTO children_2 select generate_series(10000001,20000000);

  INSERT 0 10000000

  =# CREATE INDEX test_1 ON children_1 (a);

  CREATE INDEX;

  =# CREATE INDEX test_2 ON children_2 (a);

  CREATE INDEX;



Let's ask for the 50 biggest values of a.



  SELECT * from parent order by a desc limit 50;



It takes, on this small test machine, 13 seconds on a 9.0 database, and 0.8 ms on a 9.1.



The 9.0 plan is:



   Limit  (cost=952993.36..952993.48 rows=50 width=4)

     ->  Sort  (cost=952993.36..1002999.24 rows=20002354 width=4)

           Sort Key: public.parent.a

           ->  Result  (cost=0.00..288529.54 rows=20002354 width=4)

                 ->  Append  (cost=0.00..288529.54 rows=20002354 width=4)

                       ->  Seq Scan on parent  (cost=0.00..34.00 rows=2400 width=4)

                       ->  Seq Scan on children_1 parent  (cost=0.00..144247.77 rows=9999977 width=4)

                       ->  Seq Scan on children_2 parent  (cost=0.00..144247.77 rows=9999977 width=4)



The 9.1 plan is:



   Limit  (cost=113.75..116.19 rows=50 width=4)

     ->  Result  (cost=113.75..975036.98 rows=20002400 width=4)

           ->  Merge Append  (cost=113.75..975036.98 rows=20002400 width=4)

                 Sort Key: public.parent.a

                 ->  Sort  (cost=113.73..119.73 rows=2400 width=4)

                       Sort Key: public.parent.a

                       ->  Seq Scan on parent  (cost=0.00..34.00 rows=2400 width=4)

                 ->  Index Scan Backward using test_1 on children_1 parent  (cost=0.00..303940.35 rows=10000000 width=4)

                 ->  Index Scan Backward using test_2 on children_2 parent  (cost=0.00..303940.35 rows=10000000 width=4)



The 9.0 plan means: I'll take every record from every table, sort them, and then return the 50 biggest.



The 9.1 plan means: I'll take records from every table sorted, using their indexes if available, 

merge them as they come and return the 50 first ones.



It was a very common trap, this type of queries became dramatically slower when one was partitionning its data.

And it was a bit tricky to work around this by a query rewrite.



* hash algorithms can now be used for full outer joins, and for arrays.



This one can be demoed with a very simple example (for full outer joins):



  CREATE TABLE test1 (a int);

  CREATE TABLE test2 (a int);

  INSERT INTO test1 SELECT generate_series(1,100000);

  INSERT INTO test2 SELECT generate_series(100,1000);



So we have a big test1 and a small test2 table.



With 9.0, this query is done with this plan:



  EXPLAIN ANALYZE SELECT * FROM test1 FULL OUTER JOIN test2 USING (a);

                                                          QUERY PLAN                                                        

  --------------------------------------------------------------------------------------------------------------------------

   Merge Full Join  (cost=11285.07..11821.07 rows=100000 width=8) (actual time=330.092..651.618 rows=100000 loops=1)

     Merge Cond: (test1.a = test2.a)

     ->  Sort  (cost=11116.32..11366.32 rows=100000 width=4) (actual time=327.926..446.814 rows=100000 loops=1)

           Sort Key: test1.a

           Sort Method:  external sort  Disk: 1368kB

           ->  Seq Scan on test1  (cost=0.00..1443.00 rows=100000 width=4) (actual time=0.011..119.246 rows=100000 loops=1)

     ->  Sort  (cost=168.75..174.75 rows=2400 width=4) (actual time=2.156..3.208 rows=901 loops=1)

           Sort Key: test2.a

           Sort Method:  quicksort  Memory: 67kB

           ->  Seq Scan on test2  (cost=0.00..34.00 rows=2400 width=4) (actual time=0.009..1.066 rows=901 loops=1

   Total runtime: 733.368 ms



With 9.1, this is the new plan:



  --------------------------------------------------------------------------------------------------------------------

   Hash Full Join  (cost=24.27..1851.28 rows=100000 width=8) (actual time=2.536..331.547 rows=100000 loops=1)

     Hash Cond: (test1.a = test2.a)

     ->  Seq Scan on test1  (cost=0.00..1443.00 rows=100000 width=4) (actual time=0.014..119.884 rows=100000 loops=1)

     ->  Hash  (cost=13.01..13.01 rows=901 width=4) (actual time=2.505..2.505 rows=901 loops=1)

           Buckets: 1024  Batches: 1  Memory Usage: 32kB

           ->  Seq Scan on test2  (cost=0.00..13.01 rows=901 width=4) (actual time=0.017..1.186 rows=901 loops=1)

   Total runtime: 412.735 ms



The 9.0 plan does 2 sorts. The 9.1 only needs to create a hash on the smallest table.



Runtime is divided by almost 2 here. Another very interesting property is that the new plan has a much smaller startup cost:

the first row is returned after 2 milliseconds, where it takes 330ms to return the first one using the old plan.



  SELECT * from test1 full outer join test2 using (a) LIMIT 10



takes 330ms with 9.0, and 3ms with 9.1.





=Administration=



* Auto-tuning of wal_buffers.

The wal_buffers setting is now auto-tuned when set at -1, its new default value. It's automatically set at 1/32 of shared_buffers, with a maximum at 16MB. One less parameter to take care of…





* Record last reset in database and background writer-level statistics views.

You can now know when stats have been reset last. For a database, for instance:



  SELECT datname, stats_reset FROM pg_stat_database;

    datname  |          stats_reset          

  -----------+-------------------------------

   template1 | 

   template0 | 

   postgres  | 2011-05-11 19:22:05.946641+02

   marc      | 2011-05-11 19:22:09.133483+02



* Columns showing the number of vacuum and analyze operations in pg_stat_*_tables views.



It's now much easier to know which table get a lot of autovacuum attention:



  SELECT relname, last_vacuum, vacuum_count, last_autovacuum, autovacuum_count, last_analyze, analyze_count, last_autoanalyze, autoanalyze_count

  FROM pg_stat_user_tables 

  WHERE relname in ('test1','test2');

   relname | last_vacuum | vacuum_count | last_autovacuum | autovacuum_count | last_analyze | analyze_count |       last_autoanalyze        | autoanalyze_count 

  ---------+-------------+--------------+-----------------+------------------+--------------+---------------+-------------------------------+-------------------

   test1   |             |            0 |                 |                0 |              |             0 | 2011-05-22 15:51:50.48562+02  |                 1

   test2   |             |            0 |                 |                0 |              |             0 | 2011-05-22 15:52:50.325494+02 |                 2







=SQL and PL/PgSQL features=



* Group by can guess some missing columns



  CREATE TABLE entities (entity_name text primary key, entity_address text);

  CREATE TABLE employees (employee_name text primary key, entity_name text references entities (entity_name));

  INSERT INTO entities VALUES ('HR', 'address1');

  INSERT INTO entities VALUES ('SALES', 'address2');

  INSERT INTO employees VALUES ('Smith', 'HR');

  INSERT INTO employees VALUES ('Jones', 'HR');

  INSERT INTO employees VALUES ('Taylor', 'SALES');

  INSERT INTO employees VALUES ('Brown', 'SALES');



One can now write:



  SELECT count(*), entity_name, address

  FROM entities JOIN employees using (entity_name)

  GROUP BY entity_name;

   count | entity_name | address  

  -------+-------------+----------

       2 | HR          | address1

       2 | SALES       | address2



In 9.0, grouping on address would have been required too. As entity_name is the primary key of entity, address

is functionally dependant on entity_name, so it's obvious PostgreSQL must group on it too.



* New values can be added to an existing enum type via ALTER TYPE.



  =# CREATE TYPE package_status AS ENUM ('RECEIVED', 'DELIVERED');  ;

  CREATE TYPE

  =# ALTER TYPE package_status ADD VALUE 'READY FOR DELIVERY' AFTER 'RECEIVED';

  ALTER TYPE



Until 9.0, one had to drop the type and create a new one. And that meant dropping all columns using that type. That was a major reason blocking adoption of the ENUM type.



* Composite types can be modified through ALTER TYPE ... ADD/DROP/ALTER/RENAME ATTRIBUTE.



Let's create a simple composite data type:



  =#CREATE TYPE package AS (destination text);



Let's create a dummy function using this data type:



  =#CREATE FUNCTION package_exists (pack package) RETURNS boolean LANGUAGE plpgsql AS $$

  BEGIN

    RETURN true;

  END

  $$

  ;



Test this function:



  =#SELECT package_exists(row('test'));

   package_exists 

  ----------------

   t



It works.



Now we can alter the 'package' type:



  =#ALTER TYPE package ADD ATTRIBUTE received boolean;



The type has changed:



  =#SELECT package_exists(row('test'));

  ERROR:  cannot cast type record to package

  LINE 1: SELECT package_exists(row('test'));

                                ^

  DETAIL:  Input has too few columns.

  =# SELECT package_exists(row('test',true));

   package_exists 

  ----------------

   t



* ALTER TABLE ... ADD UNIQUE/PRIMARY KEY USING INDEX



This will probably be used mostly to create a primary or unique key without locking a table for too long:



  =# CREATE UNIQUE INDEX CONCURRENTLY idx_pk ON test_pk (a);

  CREATE INDEX

  =# ALTER TABLE test_pk ADD primary key using index idx_pk;

  ALTER TABLE



We'll get a write lock on test_pk only for the duration of the ALTER TABLE. The rest of the work will be done without disrupting users' work.



This can also be used to rebuild primary key indices without locking the table during the whole rebuild:



  =# CREATE UNIQUE INDEX CONCURRENTLY idx_pk2 ON test_pk (a);

  =# BEGIN ;

  =# ALTER TABLE test_pk DROP CONSTRAINT idx_pk;

  =# ALTER TABLE test_pk ADD primary key using index idx_pk2;

  =# COMMIT ;



* ALTER TABLE ... SET DATA TYPE can avoid table rewrites in appropriate cases.



For example, converting a varchar column to text no longer requires a rewrite of the table.



However, increasing the length constraint on a varchar column still requires a table rewrite (excerpt from the Changelog).



This is self explaining. There are still cases to be covered, but this is a work in progress.



* New CREATE TABLE IF NOT EXISTS syntax.



You won't get an error if the table already exists, only a NOTICE.



Be aware that it wont check your new definition is the one already in place.



* New ENCODING option to COPY TO/FROM. This allows the encoding of the COPY file to be specified separately from client encoding.



  COPY test1 TO stdout ENCODING 'latin9'



will now convert the encoding directly. No need to set client_encoding before the COPY anymore.



* INSTEAD OF triggers on views.



This feature can be used to implement fully updatable views. Here is an example.



Let's continue on the employees/entities example.



  =#CREATE VIEW emp_entity AS SELECT employee_name, entity_name, address

  FROM entities JOIN employees USING (entity_name);



To make this view updatable in 9.0, one had to write rules. This could rapidly turn into a nightmare, as rules are

quite complex to write, and even harder to debug. This is how it was done: http://www.postgresql.org/docs/9.1/static/rules-update.html



Now we can do this with a trigger. Here is an example (there is only the INSERT part here):



  =#CREATE OR REPLACE FUNCTION dml_emp_entity () RETURNS trigger LANGUAGE plpgsql AS $$

  DECLARE

    vrecord RECORD;

  BEGIN

    IF TG_OP = 'INSERT' THEN

      -- Does the record exist in entity ?

      SELECT entity_name,address INTO vrecord FROM entities WHERE entity_name=NEW.entity_name;

      IF NOT FOUND THEN

        INSERT INTO entities (entity_name,address) VALUES (NEW.entity_name, NEW.address);

      ELSE

        IF vrecord.address != NEW.address THEN

        RAISE EXCEPTION 'There already is a record for % in entities. Its address is %. It conflics with your address %',

                        NEW.entity_name, vrecord.address, NEW.address USING ERRCODE = 'unique_violation';

        END IF;

      END IF; -- Nothing more to do, the entity already exists and is OK

      -- We now try to insert the employee data. Let's directly try an INSERT

      BEGIN

        INSERT INTO employees (employee_name, entity_name) VALUES (NEW.employee_name, NEW.entity_name);

        EXCEPTION WHEN unique_violation THEN

          RAISE EXCEPTION 'There is already an employee with this name %', NEW.employee_name USING ERRCODE = 'unique_violation';

      END;

    RETURN NEW; -- The trigger succeeded

    END IF;

  END

  $$

  ;



We just have to declare our trigger now:



  =#CREATE TRIGGER trig_dml_emp_entity INSTEAD OF INSERT OR UPDATE OR DELETE ON emp_entity FOR EACH ROW EXECUTE PROCEDURE dml_emp_entity ();



There are other advantages: a rule only rewrites the query. With the trigger, we added some logic, we could send more useful error messages. It makes

it much easier to understand what went wrong. We also could trap exceptions. We have all the advantages of triggers over rules.



* PL/PgSQL FOREACH IN ARRAY.



It's become much easier to loop over an array in PL/PgSQL. Until now, the FOR construct only worked to loop in recordsets (query results).



It can now be used to loop in arrays.



Before 9.1, it could be written like this:



  =# CREATE OR REPLACE FUNCTION test_array (parray int[]) RETURNS int LANGUAGE plpgsql AS $$

  DECLARE

    vcounter int :=0;

    velement int;

  BEGIN

    FOR velement IN SELECT unnest (parray)

    LOOP

      vcounter:=vcounter+velement;

    END LOOP;

    RETURN vcounter;

  END

  $$

  ;



Now:



  =# CREATE OR REPLACE FUNCTION test_array (parray int[]) RETURNS int LANGUAGE plpgsql AS $$

  DECLARE

    vcounter int :=0;

    velement int;

  BEGIN

    FOREACH velement IN ARRAY parray

    LOOP

      vcounter:=vcounter+velement;

    END LOOP;

    RETURN vcounter;

  END

  $$

  ;



It's much easier to read, and its faster to run.



There is another benefit: we can slice the array when it is multidimensional. Here is an example, directly from the

documentation:



  =#CREATE FUNCTION scan_rows(int[]) RETURNS void AS $$

  DECLARE

    x int[];

  BEGIN

    FOREACH x SLICE 1 IN ARRAY $1

    LOOP

      RAISE NOTICE 'row = %', x;

    END LOOP;

  END;

  $$ LANGUAGE plpgsql;

  

  =#SELECT scan_rows(ARRAY[[1,2,3],[4,5,6],[7,8,9],[10,11,12]]);

  NOTICE:  row = {1,2,3}

  NOTICE:  row = {4,5,6}

  NOTICE:  row = {7,8,9}

  NOTICE:  row = {10,11,12}



[[Category:PostgreSQL 9.1]]