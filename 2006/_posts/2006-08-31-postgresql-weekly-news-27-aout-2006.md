---
layout: post
title: "== PostgreSQL Weekly News - 27 août 2006 =="
author: "Jean-Paul Argudo"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/204"
---


<p>De nombreux patches ont été commités. Voir la section suivante pour les

détails!</p>

<!--more-->


<h3>== Nouveaux produits ==</h3>

<p>

Sortie de Pg::Snapshot 0.2

<a href="http://pgfoundry.org/projects/snapshot/" target="_blank">http://pgfoundry.org/projects/snapshot/</a>

</p>

<p>

Karel Zak a décidé de quitter le projet. Merci pour tes contributions, Karel, tu seras toujours le bienvenu dans le projet.</p>

<p>Sortie de GNUmed 0.2, qui utilise PostgreSQL pour le stockage de ses données

<a href="http://wiki.gnumed.de/" target="_blank">http://wiki.gnumed.de/</a>

</p>

<p>Sortie de Npgsql 1.0RC3

<a href="http://pgfoundry.org/projects/npgsql/" target="_blank">http://pgfoundry.org/projects/npgsql/</a>

</p>

<h3>== <em>Patches</em> appliqués ==</h3>

<p>

Michael Meskes a commité:

</p>

<ul>

<li>

Un patch qui corrige un dépassement de mémoire rapporté par Coverity. Il fallait absolument le corriger parcequ'il était contenu dans une boucle

</li>

<li>Plusieurs patches pour ECPG qui permettent désormais une chaine de connexion entre simple quotes, corrige un dépassement de mémoire et un crash lors de connexions non fructueuses et enfin quelques changements mineurs dans les tests de régression d'ECPG</li>

</ul>

<p>

Tom Lane a comitté:

</p>

<ul>

<li>

Son patch qui permet au serveur de suivre un 'XID epoch', c'est à dire qu'il maintient les bits de hauts niveau du compteur d'ID de la transaction. Rien n'est fait avec l'<em>epoch</em> excepté de le stocker dans les enregistrements de <em>checkpoint</em>, mais cela donne une base aux ajouts de code futurs: ils pourront prétendre que le problème de <em>wrap around</em> des XID ne pourra désormais plus arriver. Il s'agit d'une version réécrite du patch <em>xxid</em> soumis par Marko Kreen. A en croire les discussions, le compteur d'<em>epoch</em> est la seule partie de <em>xxid</em> qui a vraiment besoin d'être présent dans le noyau du serveur

</li>

<li>

Un patch sur la documentation qui supprime un avis à propos des <em>casts</em> sur les booléens: il est présent inutile de le faire

</li>

<li>

Le patch de Magnus Hagander qui corrige le support du LDAP crypté: il ne cause désormais plus le crash total des vieilles versions de Windows lorsque la librairie était absente

</li>

<li>

Ajout de quelques fonctions de trace de Magnus Hagander a la fonction <em>AllocateFile</em>. Ainsi lorsqu'elle est en erreur sur certains codes d'erreurs spécifiques à Windows, nous aurons plus de traces à analyser. Nous espérons que ce <em>hack</em> temporaire nous aidera à diagnostiquer quelques erreurs rares

</li>

<li>

Quelques aménagements de code pour économiser quelques cycles dans la fonction <em>RI_FKey_check</em> lorsque le tuple en cours de traitement est déjà supprimé: nous n'avons pas besoin d'ouvrir le <em>pk_rel</em> si le tuple est en effet supprimé

</li>

<li>

Le patch de Heikki Linnakangas qui améliore les performances du <em>mergejoin</em> en optimisant le cas où le scan d'un index <em>BTREE</em> a les marqueurs <em>current</em> et <em>mark</em> sur la même page d'index

</li>

<li>

Le patch de Greg Stark et Tom Lane qui permet aux utilisateurs de créer un index avec la méthode <em>ONLINE</em> qui permet de créer des index de manière asynchrone <strong>sans</strong> bloquer les écritures sur la table

</li>

<li>

Suppression du support partiel de <em>xact.c</em> dans les listes de <em>TransactionIds</em> de <em>pg_list.h</em>. C'était nécessaire parceque <em>lock.c</em> va bientôt utiliser le même type de liste

</li>

<li>

Quelques fonctions <em>GetLockConflicts()</em> à <em>lock.c</em> pour tracer les transactions qui possèdent des <em>locks</em> qui pourraient engendrer des conflits sur certaines requêtes de lock, sans vraiment essayer de poser ces locks. Cela nous permettra d'implémenter le <em>CREATE INDEX CONCURRENTLY</em>

</li>

<li>

Un patche qui permet à <em>saveHistory</em> de fonctionner correctement sur OS X lorsque HISTFILE est placé sur /dev/null

</li>

<li>

Un patch à SPI et toutes les langages procéduraux pour leur permettre de fonctionner avec la nouvelle syntaxe INSERT/UPDATE/DELETE ... RETURNING

</li>

</ul>

<p>

Bruce Momjian a comitté

</p>

<ul>

<li>

Le patch de John Gray qui ajoute description de la fonction <em>xpath_table</em> dans la documentation de la contrib <em>xml2</em>

</li>

</ul>

<p>

Teodor Sigaev a comitté

</p>

<ul>

<li>

Un patch qui corrige un bug sur la comparaison des <em>tsvector</em>: le problème se trouvait sur l'alignement. Le bug a été trouvé par Stefan Kaltenbrunner et Phil Frost.

</li>

</ul>

<h3>== Patches refusés (à ce jour) ==</h3>

<p>

Personne n'a été déçu cette semaine :-)

</p>

<h3>== Patches à l'étude ==</h3>

<ul>

<li>

Joshua Drake a envoyé un patch à pgbenech qui a pour but de produire une charge plus réaliste

</li>

<li>

Pavel Stehule a soumis un patch qui permet d'avoir en retour n'importe quelle expression et qui fait une conversion simple entre un enregistrement non typé et un enregistrement typé. Ce patch permet le même type de conversion qu'une écriture d'affectation

</li>

<li>

Grg Sabino Mullane a soumis un patch qui corrige les derniers <em>FIXMEs</em> (corrige-moi!) dans les informations du schéma

</li>

<li>

Peter Eisentraut a soumis son travail en cours qui montre que la libpq tente de sélectionner l'encodage du client à partir de la locale de son système

</li>

<li>

Jeremy Kronys a soumis un ISBN/ISSN/ISMN/EAN13 pour une inclusion possible dans les contribs

</li>

<li>

Bernd Helmle a soumis la version courante de son travail sur les vues que l'on peut mettre à jour

</li>

<li>

Dhanaraj M a soumis à nouveau un patch qui ajoute l'affichage des valeurs courantes des séquences dans la sortie de psql

</li>

<li>

Peter Eisentraut a nettoyé et soumis le patch de Victor B. Wagner qui ajoute un module de validation d'un certificat SSL du client</li>

<li>

Zoltán Böszörményi a envoyé une nouvelle version de son patch COPY (SELECT...). Alvaro Herrera a contribué en ajoutant quelques améliorations et simplifications de code.

</li>

<li>

Sven Suursohoa envoyé quelques patches de mise à jour de PL/PythonU et les documentations afférentes. Le patch ajoute les paramètres nommés, permet à PL/PythonU de retourner des types composites, des dictionnaires, des resultsets comme s'ils étaient des listes, des itérateurs ou des générateurs.

</li>

<li>

Michael Glaesemann a envoyé un patch qui améliore les arrondis dans l'arithmétique des dates, ainsi que des tests de regression pour ceux-cis

</li>

</ul>

<h3>== Boulots sur PostgreSQL pour août ==</h3>

<p>

<a href="http://archives.postgresql.org/pgsql-jobs/2006-08/threads.php" target="_blank">http://archives.postgresql.org/pgsql-jobs/2006-08/threads.php</a>

</p>

<h3>== PostgreSQL Local ==</h3>

<p>

Aucun évènement local cette semaine

</p>

<h3>== PostgreSQL dans les News ==</h3>

<p>

Planet PostgreSQL: <a href="http://www.planetpostgresql.org/" target="_blank">http://www.planetpostgresql.org/</a>

</p>

<p>

General Bits, Archives and nouveaux articles occasionels:

<a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a>

</p>

<p>PGWN a été rédigé par David Fetter et Dave Page cette semaine

</p>