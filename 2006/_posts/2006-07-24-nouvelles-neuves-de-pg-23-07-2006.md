---
layout: post
title: "Nouvelles neuves de PG - 23/07/2006"
author: "SAS"
redirect_from: "index.php?post/drupal-197 "
---



<strong>Correctifs appliqués</strong>

<p>

Tom Lane a appliqué le correctif de Greg Stark qui ajoute les opérateurs btree sur les TID.

</p>

<p>

Tom Lane a appliqué un correctif censé corriger le bogue rémanent du «&nbsp;collecteur de statistiques qui meurt sous la charge, sous Windows&nbsp;».

</p>

<p>

Joachim Wieland a simplifié les tests de régression en déplaçant le code de suppression des utilisateurs et groupes de régression du script de régression vers le script SQL.

</p>

<p>

Tom Lane a ajouté quelques bricoles au travail de Magnus Hagander sur le correctif de pg_regress-in-C et a commité le résultat dans le CVS.

</p>

<p>

Peter Eisentraut a commité la possibilité de surcharger l'emplacement de pg_config pour les constructions pgxs.

</p>

<p>

Peter a également actualisé le système de construction pour utiliser la construction de gcc dans la recherche de dépendance plutôt que le bitouillage sed précédent. Il a également changé l'extension du fichier pour se rapprocher d'Automake, ce qui laisse Dtrace utiliser les .d comme extension.

</p>

<p>

Neil Conway a appliqué le nettoyage de fusion de chiffrement de Marko Kreen.

</p>

<p>

Samedi, Tom Lane a bitouillé hardiement et commité&nbsp;:

</p>

<ul>

<li>la modification du planificateur pour bénéficier du cache lors des accès mémoire avec les parcours bitmap&nbsp;;</li>

<li>la réparation de --disable-spinlocks&nbsp;;</li>

<li>l'ajout du support de dynahash.c pour le partitionnement des tables de hachage partagées en fonction de l'ordre des bits de poids faible de la valeur de hachage de l'entrée&nbsp;;</li>

<li>la césure de la table de mappage du tampon en multiples partitions verrouillables séparément&nbsp;;</li>

</ul>

... et a fini dimanche par un correctif de la surestimation de la taille de la table de hachage de consultation de la mémoire, pouvant éventuellement conduire à un crash pour dépassement de la mémoire partagée.

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>

Personne n'est déçu cette semaine ;-)

</p>

<p><strong>Correctifs en attente</strong></p>

<p>

Greg Sabino Mullane a soumis un correctif pour permettre à pg_dump de prendre plusieurs paramètres à expressions rationnelles -n (inclusion d'espace de nom), -N (exclusion d'espace de nom), -t (inclusion de table) et -T (exclusion de table).

</p>

<p>

Joshua Reich a soumis un correctif pour ajouter une fonction cube_from_arrays() au module contributif cube, et un nettoyage du module.

</p>

<p>

Jie Zhang de Greenplum a soumis un correctif d'implémentation des index bitmap sur disque. Il est actuellement amélioré en vue du gel de fonctionnalités.

</p>

<p>

Joe Conway a posté un correctif permettant de préciser plusieurs tuples dans une instrustion INSERT avec une seule clause VALUES, e.g.

<code>INSERT INTO foo (a, b) VALUES (1, 2), (3, 4), (5, 6);</code>

</p>

<p>

La première version a planté au bout de 9&nbsp;000 tuples. La prochaine version permet les valeurs DEFAULT, et a autorisé 300&nbsp;000 tuples en 13 secondes avec un pic d'un peu plus d'un Go de RAM.

</p>

<p>

Dans la catégorie tuples multiples, Susan Ebrecht a envoyé un correctif permettant à UPDATE d'utiliser une syntaxe telle que&nbsp;:

<code>UPDATE table SET (col1, col2, ...) = (val1, val2, ...),     (colm, coln, ...) = (valm, valn, ...), ...;</code>

</p>

<p>

Marc Munro a posté un correctif permettant aux bibliothèques chargées au démarrage du postmaster avec la directive de configuration des bibliothèques préchargées (preload_libraries) d'enregistrer leurs propres contextes de mémoire partagée et de LWLocks.

</p>

<p>

Robert Lor de Sun a soumis un correctif d'ajout du support de DTrace à PostgreSQL comme il l'a expliqué lors de la dernière conférence et du sprint de code.

</p>

<p>

Zdenek Kotala a soumis un correctif de marquage «&nbsp;changement_au_redémarrage_uniquement&nbsp;» des valeurs du postgresql.conf. Cela peut être utile pour les DBA et les nouveaux venus.

</p>

<p>

Marko Kreen a envoyé un correctif fournissant les ID de transaction sur 8-octets au niveau utilisateur.

</p>

<p><strong>Les nouveautés des produits dérivés</strong></p>

<p>

Devrim Gunduz a poussé quelques RPMS liés à PostgreSQL vers Fedora Extras pour révision&nbsp;:

</p>

<ul>

<li>Slony-I</li>

<li>psycopg2</li>

<li>pgpool</li>

<li>dbi-link</li>

</ul>

<p>

PyPgExplorer 0.8 réalisé.

<a target="_blank" href="http://homepage.mac.com/levanj/Python">http://homepage.mac.com/levanj/Python</a>

</p>

<p>

Matthew Hagerty a réalisé la 1.0 de son analyseur de recherche plein-texte en PHP.

<a target="_blank" href="http://digitalstratum.com/oss/fts_parser">http://digitalstratum.com/oss/fts_parser</a>

</p>

<p>

La version corrigée de pgAdmin3, 1.4.3, est sortie.

<a target="_blank" href="http://www.pgadmin.org/">http://www.pgadmin.org/</a>

</p>

<p>

Fujitsu propose un 'Coffee Morning' PostgreSQL le vendredi 28 juillet à Sydney, Australie. Gavin Sherry évoquera PostgreSQL et la haute-disponibilité.

<a target="_blank" href="http://www.fastware.com.au/postgresql_coffee.html">http://www.fastware.com.au/postgresql_coffee.html</a>

</p>

<p>

Fujitsu propose une session de formation de trois jours à PostgreSQL, du 15 au 17 juillet à Canberra, Australie.

<a target="_blank" href="http://www.fastware.com.au/postgresql_training_august.html">http://www.fastware.com.au/postgresql_training_august.html</a>

</p>

<p><strong>PostgreSQL Jobs pour juillet</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2006-07/threads.php">http://archives.postgresql.org/pgsql-jobs/2006-07/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

Linuxfest Ohio recherche des orateurs PostgreSQL.

Si vous pouvez y aller, merci de vous enregistrer. La date limite de proposition d'intervention est fixée au 31 juillet.

<a target="_blank" href="http://ohiolinux.org/speak.html">http://ohiolinux.org/speak.html</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<p>

Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</p>

<p>

General Bits, Archives et nouveaux articles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>

<em>PostgreSQL Weekly News vous est présenté cette semaine par David Fetter, Dave Page et Devrim Gunduz.

Adaptation française par Stéphane Schildknecht.

</em></p>