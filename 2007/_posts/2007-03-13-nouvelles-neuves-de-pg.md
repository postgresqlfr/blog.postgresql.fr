---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
redirect_from: "index.php?post/drupal-168 "
---



<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>

Phil Endecott a créé une nouvelle bibliothèque C++ pour PostgreSQL.

<a target="_blank" href="http://svn.chezphil.org/libpbe/trunk/doc/Database">http://svn.chezphil.org/libpbe/trunk/doc/Database</a>

</li>

<li>

Security Enhanced PostgreSQL (SE-PostgreSQL) 8.2.3-1.0 alpha réalisé.

<a target="_blank" href="http://code.google.com/p/sepgsql/">http://code.google.com/p/sepgsql/</a>

</li>

<li>

Slony-I 1.1.7 et 1.2.7 sont sortis.

<a target="_blank" href="http://main.slony.info/">http://main.slony.info/</a>

</li>

</ul>

<p><strong>Les jobs PostgreSQL de mars</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-03/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

La communauté PostgreSQL italienne est toujours à la recherche de mécènes pour ses journées PostgreSQL au Prato, Italie.

<a target="_blank" href="http://www.pgday.it">http://www.pgday.it</a>

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL&nbsp;: <a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et nouveaux articles&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

</ul>

<p><em>

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter.

Adaptation francophone de Stéphane Schildknecht, Guillaume de Rorthais et Cédric Villemain.

</em></p>

<p>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</p>

<p><strong>Correctifs appliqués</strong></p>

<p>

Andrew Dunstan a commité&nbsp;:</p>

<ul>

<li>

Dans pgsql/src/test/regress/output/largeobject_1.source, l'ajout d'un fichier alternatif gérant les fins de lignes sous windows pour les resultats des tests sur les objets volumineux.

</li>

</ul>

<p>

Teodor Sigaev a commité&nbsp;:</p>

<ul><li>

bien que cube soit un type varlena, il n'était jamais question de «&nbsp;détoaster&nbsp;» les valeurs cube. A donc été corrigé. Ajout des macros DatumGetNDBOX, PG_GETARG_NDBOX et PG_RETURN_NDBOX. Le patch a aussi été rétro porté pour 8.2. La version précédente utilise les conventions d'appel de version 0. Pour finir, le code de fmgr «&nbsp;detoaste&nbsp;» les valeurs pour les fonctions utilisateurs.

</li>

</ul>

<p>

Alvaro Herrera a commité&nbsp;:</p>

<ul><li>

corrige un bug dû aux accès concurents qui fait échouer pg_database_size() et pg_tablespace_size() si un objet a été supprimé entre les appels de ReadDir() et stat(). Discuté sur pgsql-hackers. <a target="_blank" href="http://archives.postgresql.org/pgsql-hackers/2007-03/msg00671.php">http://archives.postgresql.org/pgsql-hackers/2007-03/msg00671.php</a>. Rapport de bug et correction de Michael Fuhr.</li>

<li>

petit nettoyage de la sequence de démarrage, et renomage de "dummy proc" (<em>NdT: processus insignifiants</em>) dans les commentaires et variables du code par "auxiliary proc" (<em> NdT: processus auxiliaires</em>), sur demande d'Heikki.

</li>

</ul>

<p>

Tom Lane a commité&nbsp;:</p>

<ul><li>

correction de vac_update_relstats afin d'assurer qu'il envoit toujours un message relcache inval, même si aucun champs des lignes de pg_class n'a changé. Ce comportement est nécessaire afin d'assurer d'autres nettoyages en arrière plan des valeurs de rd_targblock qui pourraient pointer sur des pages déplacées. Nous héritons de celà directement de pre-8.2, mais le code était cassé par des modifications beaucoup trop optimistes afin de ne pas réécrire les lignes de pg_class si elles étaient inchangées. Signalé par Pavan Deolasee.

</li>

<li>

corrige un oubli dans le code original de inline_function(): depuis que check_sql_fn_retval autorise les cas compatibles binaire, l'expression extraite d'une fonction SQL pouvant être inline doit avoir un type compatible qu'avec celui du résultat déclaré pour la fonction. Afin d'éviter les changements possible de sémantique de l'expression, nous devrions insérer un noeud RelabelType à ce type de cas. Il a été constaté que celà avait de mauvaises conséquences sur la récente 8.1 et versions supérieures, mais je suspecte qu'il doit exister d'autres cas d'erreur dans les branches plus anciennes, le patch doit donc être appliqué à toute la chaîne. Provient du bug #3116 créé par Greg Mullane. A coté de celà, un bug dans eval_const_expressions_mutator a été corrigé: il échouait lors de la copie du champ relabelformat durant l'execution d'un RelabelType. Aucune erreur n'était visible, mais ce comportement n'est définitivement pas voulu.

</li>

</ul>

<p>

Peter Eisentraut a commité&nbsp;:</p>

<ul><li>

le patch de Toru SHIMOGAKI qui ajoute plus d'informations sur comment éviter le OOM-killer de Linux.

</li>

</ul>

<p>

Bruce Momjian a commité&nbsp;:</p>

<ul><li>

modifications mineures sur pgsql/doc/src/sgml/runtime.sgml

</li>

<li>

retour à la version précedente de temp_tablespaces pour cause de problèmes avec le code, par Tom Lane.

</li>

<li>

dans pgsql/src/backend/utils/adt/geo_ops.c, remplacement des commentaires copiés depuis les sources de geo_ops.c par de nouveaux commentaires, et nettoyage des fonctions. Retrait du copyright qui n'est plus approprié.

</li>

<li>

Retrait du planning de publication pour 8.3 de la FAQ_DEV, celle-ci se trouvant maintenant sur le site internet.

</li>

</ul>

<p>

Magnus Hagander a commité&nbsp;:</p>

<ul><li>

Retrait d'un appel peu sûr à  WSAStartup et WSACleanup dans DllMain&nbsp;; le déplacement de l'ordre d'appel du nettoyage de façon à  ce qu'il soit fait dans le bon ordre, et en cas d'erreur. D'après le rapport de Tokuharu Yuzawa. </li>

<li>

l'ajout d'un script pour compiler la documentation avec win32 sans mingw&nbsp;;

</li>

<li>

Le retrait de l'infrastructure coté client win32 visual c++ (vieux style) de tout, sauf libpq. Nous avons besoin de conserver une compilation statique de libpq et d'utiliser PQtrace avec les clients utilisant de vielles versions de MSVC.</li>

</ul>

<p>

Neil Conway a commité&nbsp;:</p>

<ul><li>

Le correctif d'Heikki Linnakangas de pgsql/src/backend/access/nbtree/nbtinsert.c qui corrige une typo dans un commentaire. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>

Pas de déception cette semaine :-)

</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Zoltan Boszormenyi a envoyé une version de plus de son correctif IDENTITY/GENERATED.</li>

<li> Nikolay Samokhvalov a envoyé une autre version de son correctif xpath_array(). </li>

<li> ITAGAKI Takahiro a envoyé un correctif pour régler automatiquement bgwriter_lru_maxpages. </li>

<li> ITAGAKI Takahiro a envoyé un correctif pour accélérer pg_bench. </li>

<li> Simon Riggs a envoyé un correctif qui laisse les gens faire quelques diagnostiques sur la pile de page. </li>

<li> Mike Rylander a envoyé un correctif pour contrib/xml2 qui ajoute le support pour les espaces de nom XML par défaut. </li>

<li> Trevor Hardcastle a envoyé un correctif qui ajoute le support pour CREATE TABLE LIKE INCLUDING INDEXES. </li>

<li> Tatsuhito Kasahara a envoyé un correctif pour un bug: le rapport d'une valeur d'une étrange leaf_fragmentation. </li>

<li> Pavan Deolasee a envoyé la version 4.1 de son correctif "HOT WIP", celui-ci avec des optimisations pour rechercher efficacement les tuples LP_DELETEd et quelques changement logique pour nettoyer le niveau de fragmentation des lignes. </li>

<li> Gregory Stark a envoyé une autre version de son correctif 'compacting-varlena', maintenant il contient de nouveaux tests de régression et quelques correctifs de bug. </li>

<li> Simon Riggs a envoyé un correctif qui ajoute de nouvelles fonctions qui examinent le contenu des piles de pages, comme discuté récemment sur -hackers. </li>

<li> Simon Riggs a envoyé un correctif qui ajoute une nouvelle variable GUC : log_autovacuum. </li>

<li> Simon Riggs a envoyé deux versions d'un correctif pour implémenter le recyclage du tampon-cache des scans, comme discuté sur pgsql-hackers. </li>

<li> Gregory Stark a envoyé un correctif qui implémente WITH (non RECURSIVE). </li>

<li> Gregory Stark a envoyé une autre version de son correctif 'compacting-varlena', désormais avec un cas spécial pour les machines "little-endian". </li>

<li> Heikki Linnakangas a envoyé un correctif qui documente le fait que CLUSTER n'est pas MVCC-safe. </li>

<li> Tom Lane a envoyé un correctif encore en cours de travail pour l'invalidation du plan. </li>

</ul>