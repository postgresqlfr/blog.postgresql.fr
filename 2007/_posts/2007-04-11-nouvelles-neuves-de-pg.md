---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/171"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 8 avril 2007</strong></p>

<p>

Maintenant que les fonctionnalités sont gelées, les révisions sont débattues.

</p>

<p>

Félicitations à Tom Dunstan pour le nouveau type enum.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>

Another PostgreSQL Diff Tool 1.0.0_beta20 réalisé&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/apgdiff/">http://pgfoundry.org/projects/apgdiff/</a>

</li>

<li>

GNUmed 0.2.5 réalisé&nbsp;:

<a target="_blank" href="http://wiki.gnumed.de">http://wiki.gnumed.de</a>

</li>

<li>

LedgerSMB 1.2.0 réalisé&nbsp;:

<a target="_blank" href="http://www.ledgersmb.org/">http://www.ledgersmb.org/</a>

</li>

<li>

les paquets pgAdmin pour Solaris sont disponibles&nbsp;:

<a target="_blank" href="http://www.pgadmin.org/download/solaris.php">http://www.pgadmin.org/download/solaris.php</a>

</li>

</ul>

<p><strong>PostgreSQL Local</strong></p>

<p>

PgDay, c'est par ici&nbsp;!

<a target="_blank" href="http://www.pgday.it/en/node/95">http://www.pgday.it/en/node/95</a>

</p>

<p>

Les souscriptions sont ouvertes pour PGCon 2007&nbsp;:

<a target="_blank" href="http://www.pgcon.org/2007/registration.php">http://www.pgcon.org/2007/registration.php</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Josh Berkus, David Fetter, Euler Taveira de Oliveira, Fernando Ike de Olivera et Fabio Telles interviendront lors du FISL 8.0 à Porto Alegre, RS, Brésil du 12 au 14 avril&nbsp;;</li>

<li>

Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et nouveaux articles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p>

<em>

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter.

Adaptation francophone de Stéphane Schildknecht, Guillaume de Rorthais, Cédric Villemain.

</em></p>

<p><strong>Correctifs appliqués</strong></p>

<p>Neil Conway a commité&nbsp;:</p>

<ul>

<li>

la correction de quelques typos dans les docs. </li>

</ul>

<p>Tatsuo Ishii a commité&nbsp;:</p>

<ul>

<li>

l'ajout de l'option -F pour positionner le facteur de remplissage des "tellers", comptes et branches. Pavan Deolasee a contribué au correctif. Modifications de la doc japonaise par by Tatsuo Ishii&nbsp;;</li>

<li>

le correctif de Greg Smith qui ajoute une option -l pour ajouter les timestamp à pgbench. Mise à jour de la doc japonaise par Tasuo Ishii&nbsp;;</li>

<li>

le correctif de ITAGAKI Takahiro qui améliore pgbench de différentes façons. </li>

</ul>

<p>Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>

dans pgsql/src/tools/msvc/vcregress.bat, la vérification de contrib n'est effectuée que s'il existe un Makefile&nbsp;;</li>

<li>

dans pgsql/src/tools/msvc/vcregress.bat, l'amélioration des en-têtes de test&nbsp;;</li>

<li>

dans pgsql/src/tools/msvc/Install.pm, les fichiers pour xml2 ne sont pas installés si la construction ne prend pas la libxml&nbsp;;</li>

<li>

la vérification des longueurs de libellés d'enum dans leur définition et lors de la saisie pour s'assurer qu'ils entrent un champ nom et ne causeront pas d'erreur syscache. </li>

</ul>

<p>Bruce Momjian a commité&nbsp;:</p>

<ul>

<li>

le marquage de TODO comme fait&nbsp;: "-Make CLUSTER preserve recently-dead tuples per MVCC requirements." </li>

<li>

le marquage de TODO comme fait&nbsp;: "Add more logical syntax CLUSTER table USING index" </li>

<li>

le correctif de Holger Schurig qui ajoute le support de la syntaxe "CLUSTER table USING index", plus logique qua la version précédente&nbsp;;</li>

<li>

le correctif de Greg Smith qui ajoute les statistiques d'utilisation aux informations disponibles dans contrib/pgbuffercache&nbsp;;</li>

<li>

de menues améliorations dans la documentation de REVOKE&nbsp;;</li>

<li>

la suppression de la syntaxe en standard SQL de GRANT/REVOKE --- source de confusion&nbsp;;</li>

<li>

le correctif de Mark Fuhr concernant l'écriture du mot "symmetric." Rétro-correctif de PG8.2 - Le TODO : "Allow use of indexes to search for NULLs." est marqué fait&nbsp;;</li>

<li>

le TODO&nbsp;: "Support a smaller header for short variable-length fields." est marqué fait - la corrections de quelques commentaires désormais obsolètes concernant l'espace utilisé par certains tyes de données&nbsp;;</li>

<li>

la mise à jour du message d'erreur XML si la libxml manque&nbsp;; la mise à jour de la sortie des tests de régression pour refléter cette modification&nbsp;;</li>

<li>

l'ajout d'une URL au TODO&nbsp;: "Reduce WAL traffic so only modified values are written rather than entire rows." </li>

<li>

l'amélioration de la documentation/du message d'avertissement lorsque --with-libxml n'est pas utilisé lors de l'installation&nbsp;;</li>

<li>

la restauration de l'item 3.7 de la FAQ perdu dans un commit précédant&nbsp;;</li>

<li>

la correctif de Marko Kreen qui supprime le dernier transtypage dans les définitions de structure en PL/PythonU. C'est une mauvaise pratique, puisqu'elle masque les problèmes du compilateur. Le transtypage est une pratique populaire dans certains milieux pour définir des fonctions comme foo(MyObj *) à la place de foo(PyObject *), ce qui évite une variable locale dans une fonction et facilite les appels directs. Puisque PL/PythonU n'utilise pas ce stylen, ces transtypages étaient inutiles, dès le départ&nbsp;;</li>

<li>

le correctif de Gregory Stark qui documente la façon d'identifier un index invalide après l'échec de CREATE INDEX CONCURRENTLY&nbsp;;</li>

<li>

le marquage du TODO comme fait&nbsp;: "Allow PL/PythonU to return boolean rather than 1/0&nbsp;;</li>

<li>

le correctif de Marko Kreen qui permet à PL/pythonU &gt;= version 2.3 de retourner boolean, plutôt que 1/0&nbsp;;</li>

<li>

le correctif de Marko Kreen qui permet à PL/PythonU de compiler avec Python 2.5. Ces modifications étaient nécessaires du fait de modifications dans l'API de Python&nbsp;;</li>

<li>

dans pgsql/src/port/thread.c, la mise à jour du commentaire de la nouvelle licalisation de thread_test&nbsp;;</li>

<li>

la mise à jour du TODO&nbsp;: "Add idle_in_transaction_timeout GUC so locks are not held for long periods of time." </li>

<li>

l'ajout du TODO: "Allow all data types to cast to and from TEXT." </li>

<li>

l'ajout du TODO: "Add idle_timeout GUC so locks are not held for log periods of time." </li>

<li>

l'ajout d'une URL au TODO: "Allow UPDATE tab SET ROW (col, ...) = (SELECT...)." </li>

<li>

l'ajout d'une URL au TODO: "Allow commenting of variables in postgresql.conf to restore them to defaults." </li>

<li>

l'ajout d'une URL au TODO: "Allow a warm standby system to also allow read-only." </li>

<li>

l'ajout d'une URL au TODO: "Improve speed with indexes" </li>

<li>

l'ajout du TODO: "Have timestamp subtraction not call justify_hours()?" </li>

<li>

l'ajout du TODO: "Allow NOTIFY/LISTEN/UNLISTEN to only take relation names, not schema.relation, because the notify code only honors the relation name. schema.relation will now generate a syntax error." </li>

<li>

l'ajout du TODO: "Fix to_date()-related functions to issue errors consistently" </li>

<li>

l'ajout du TODO: "Allow PL/PythonU to return boolean rather than 1/0." </li>

<li>

l'ajout du TODO: "Consider reducing memory used for shared buffer reference count." </li>

<li>

l'ajout d'une URL au TODO: "Allow RETURN to return row or record functions." </li>

<li>

le marquage du TODO comme fait: "Support a data type with specific enumerated values (ENUM)." </li>

<li>

l'ajout du TODO: "Add PQexecf() that allows complex parameter substitution." </li>

</ul>

<p>Magnus Hagander a commité&nbsp;:</p>

<ul>

<li>

<!-- In pgsql/src/tools/msvc/vcregress.bat, continue running contrib regression tests if one fails, and exit with errorlevel 1 is >= 1 checks failed&nbsp;; -->

dans pgsql/src/tools/msvc/vcregress.bat, les autres tests de regression des contrib doivent continuer si l'un d'eux échoue et retourner un code d'erreur 1 si un test ou plus a échoué&nbsp;;</li>

<li>

<!-- In pgsql/src/tools/msvc/vcregress.bat, make sure list of tests is cleared out before getting the new list of tests. Per Andrew Dunstan&nbsp;;-->

dans pgsql/src/tools/msvc/vcregress.bat, s'assure que la liste de tests est vidée avant de récupérer la nouvelle liste de tests. Réalisé par Andrew Dunstan&nbsp;;</li>

<li>

<!-- In pgsql/src/tools/msvc/Install.pm, don't install files for sslinfo when building without openssl. Per Andrew Dunstan&nbsp;; -->

dans pgsql/src/tools/msvc/Install.pm, n'installe pas les fichiers pour sslinfo lors d'une compilation sans openssl. Réalisé par Andrew Dunstan.</li>

<li>

<!-- In pgsql/src/tools/msvc/Install.pm, xcopy can only deal with forward-slashed paths when it's quoted - needed for "vcregress check" to work. Per report from Dave Page.  -->

dans pgsql/src/tools/msvc/Install.pm, xcopy ne peut travailler qu'avec des chemins utilisant les slash s'ils sont entre guillemets - nécessaire pour que "vcregress check" marche. Signalé par Dave Page.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;:</p>

<ul>

<li>

<!-- Fix caching of unsuccessful initialization of parser or configuration per report from the folks at peufeu.com. Backpatched to 7.4. -->

la correction de la mise en cache d'initialisation ratée du parser ou de la configuration, signalé par les gens de peufeu.com. Correction propagée dans 7.4.</li>

</ul>

<p>Tom Lane a commité&nbsp;:</p>

<ul>

<li>

<!-- Minor editorialization on CLUSTER reference page&nbsp;; -->

edition mineure de la page de référence de CLUSTER.</li>

<li>

<!-- Heikki Linnakangas' patch to make CLUSTER MVCC-safe&nbsp;;-->

le corretcif de Heikki Linnakangas pour rendre CLUSTER sûr en MVCC.

</li>

<li>

<!-- In pgsql/doc/src/sgml/ref/truncate.sgml, add note that TRUNCATE is not MVCC-safe&nbsp;;-->

dans pgsql/doc/src/sgml/ref/truncate.sgml, l'ajout d'une note à propos de TRUNCATE qui n'est pas sûr en MVCC.</li>

<li>

Don't remove the 'alias' field from flattened rangetable entries; there are some corner cases where this is needed by ruleutils.c for proper display of variables during EXPLAIN&nbsp;;

</li>

<li><!-- kibitzing ?? -->

<!-- Make 'col IS NULL' clauses be indexable conditions. Teodor Sigaev, with some kibitzing from Tom Lane&nbsp;; -->

que la clause 'col IS NULL' soit une condition indexable. Réalisé par Teodor Sigaev, avec quelques modifications imposées par Tom Lane.

</li>

<li>

Now that core functionality is depending on autoconf's AC_C_BIGENDIAN to be right, there seems precious little reason to have a pile of hand-maintained endianness definitions in src/include/port/*.h. Get rid of those, and make the couple of places that used them depend on WORDS_BIGENDIAN instead&nbsp;;</li>

<li>

Support varlena fields with single-byte headers and unaligned storage. This commit breaks any code that assumes that the mere act of forming a tuple (without writing it to disk) does not "toast" any fields. While all available regression tests pass, I'm not totally sure that we've fixed every nook and cranny, especially in contrib. Greg Stark with some help from Tom Lane&nbsp;;</li>

<li>

Remove the CheckpointStartLock in favor of having backends show whether they are in their commit critical sections via flags in the ProcArray. Checkpoint can watch the ProcArray to determine when it's safe to proceed. This is a considerably better solution to the original problem of race conditions between checkpoint and transaction commit: it speeds up commit, since there's one less lock to fool with, and it prevents the problem of checkpoint being delayed indefinitely when there's a constant flow of commits. Heikki Linnakangas, with some kibitzing from Tom&nbsp;;</li>

<li>

Decouple the values of TOAST_TUPLE_THRESHOLD and TOAST_MAX_CHUNK_SIZE. Add the latter to the values checked in pg_control, since it can't be changed without invalidating toast table content. This commit in itself shouldn't change any behavior, but it lays some necessary groundwork for experimentation with these toast-control numbers. Note: while TOAST_TUPLE_THRESHOLD can now be changed without initdb, some thought still needs to be given to needs_toast_table() in toasting.c before unleashing random changes&nbsp;;</li>

<li>

Fix check_sql_fn_retval to allow the case where a SQL function declared to return void ends with a SELECT, if that SELECT has a single result that is also of type void. Without this, it's hard to write a void function that calls another void function. Per gripe from Peter Eisentraut. Back-patch as far as 8.0&nbsp;;</li>

<li>

Support enum data types. Along the way, use macros for the values of pg_type.typtype whereever practical. Tom Dunstan, with some kibitzing from Tom Lane. </li>

</ul>

<p>Peter Eisentraut a commité&nbsp;:</p>

<ul>

<li>

Update catversion for new XML mapping functions&nbsp;;</li>

<li>

Update SQL conformance for SQL to XML mappings&nbsp;;</li>

<li>

Mapping schemas and databases to XML and XML Schema. Refactor and document the remaining mapping code&nbsp;;</li>

<li>

In pgsql/src/interfaces/ecpg/preproc/Makefile, complete cleaning. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<ul>

<li>

Zdenek Kotala's patch to add large file support on grounds of lack of use cases. </li>

</ul>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Greg Smith sent in a patch which puts entries in the log file around some backend events that regularly cause client pauses, most of which are visible only when running with log_min_messages = debug2&nbsp;;</li>

<li>

Simon Riggs sent in another version of his "Deferred Transactions, Transaction Guarantee and COMMIT without waiting" patch&nbsp;;</li>

<li>

David Fetter sent in a patch to implement arrays of compound types&nbsp;;</li>

<li>

Pavan Deolasee sent in versions 6.3 and 7.0 of his WIP HOT patch&nbsp;;</li>

<li>

Marko Kreen sent in two more revisions of his RESET SESSION patch&nbsp;;</li>

<li>

Heikki Linnakangas sent in two revisions of a patch intended to fix the mdsync never-ending loop problem mentioned at <a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-04/msg00259.php">http://archives.postgresql.org/pgsql-hackers/2007-04/msg00259.php</a>

</li>

<li>

Alvaro Herrera sent in another revision of his autovacuum multiworkers patch&nbsp;;</li>

<li>

Simon Riggs sent in a comprehensive Reviewers Guide to Deferred Transactions/Transaction Guarantee, complete with the latest version of the "grouped transactions" patch&nbsp;;</li>

<li>

Simon Riggs sent in some changes to warm standby.</li>

</ul>