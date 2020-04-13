---
layout: post
title: "PostgreSQL Weekly News - 15 mars 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-357 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 15 mars 2004 ==</h2>

<p>La 7.4.2 est sortie officiellement la semaine dernière. Cette mise à jour

particulière nécessite une mise à jour des catalogues systèmes pour ceux

qui ont une version 7.4.x antérieure, opération qui n'est normalement pas

requise pour des versions mineures. De ce fait, il est fortement recommendé

à tous ceux qui comptent mettre à jour leur système de lire le fichier

HISTORY.<!--break-->

</p>

<p>Ceci étant fait, l'attention s'est porté à la branche de développement

7.5 où nous avons vu quelques modifications et quelques nouveautés. Ray

Aspeitia, aidé par David Wheeler, a soumis de nouveaux scripts de démarrage

pour Mac OSX. Les routines d'entrées pour int2/int4/int8/float4/float8 ont

toutes été revues pour permettre un nombre indéterminé d'espaces blancs devant

ou derrière ce qui les rend en phase avec les spécifications SQL et plus

consistent avec les autres types numériques. Autre modification du même

genre&nbsp;: nous acceptons maintenant 'Infinity' et '-Infinity' en entrée

pour les types float4 et float8. Nous fournissons maintenant un message

d'attention (niveau WARNING) lors de la création d'une contrainte pour une

clé étrangère utilisant un type de colonne suffisamment incompatible pour

empêcher l'utilisation d'un index de la table référencée. David Turner a

soumis un correctif pour permettre la construction de DLL de déboguage pour

le développement win32. Il y a aussi eu des nettoyages dans l'initialisation

du processus de statistiques, ce qui permet maintenant aux plateformes win32

de passer avec succès les tests sur les statistiques.</p>

<p>Le travail d'Andrew Dunstan sur l'accroissement des fonctionnalités des

traces a été intégré. Il introduit certains changements à la fois sur ce qui

peut être tracé et sur la façon dont c'est tracé. Pour un bon résumé, jetez un

oeil sur la documentation générée à partir du CVS et disponible sur le site des

développeurs. Le mot clé ALSO a été ajouté à la commande CREATE RULE, grâce à

Fabien Coelho, permettant aux règles de réaliser leurs opérations habituelles

ainsi qu'une opération définie par une règle. La commande LOCK a aussi été

modifiée car il existe maintenant une option NOWAIT lui permettant de rendre la

main immédiatement si elle n'obtient pas son verrouillage. Enfin, le programme

psql est un peu plus intelligent maintenant qu'il est capable d'afficher

visuellement l'emplacement des erreurs de syntaxe.</p>

<p>La semaine dernière, j'ai indiqué qu'il y avait du mouvement sur le

"Point-In-Time Recovery" pour la 7.5 et je suis heureux d'annoncer que, cette

semaine, Simon Riggs a posté un nouveau résumé/proposition sur la façon d'implémenter

le PITR. Toute personne intéressée par ce développement est encouragée à le lire.

Mais, même pour ceux qui ne sont pas impliqués à ce niveau, il apporte un bon

résumé des mécanismes actuels de restauration après un crash. Vous pouvez le trouver

sur <a href="http://archives.postgresql.org/pgsql-hackers/2004-03/msg00295.php">http://archives.postgresql.org/pgsql-hackers/2004-03/msg00295.php</a>.

</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>PostgreSQL Web Inventory 2.1<br />

<a href="http://freshmeat.net/projects/pgwebinventory/?branch_id=15686&amp;release_id=154262">http://freshmeat.net/projects/pgwebinventory/?branch_id=15686&amp;release_id=154262</a></li>

<li>BiggerSQL-.12.2 un navigateur/éditeur Postgresql pour Mac<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-03/msg00487.php">http://archives.postgresql.org/pgsql-general/2004-03/msg00487.php</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Le gouvernement U.S. à la recherche du libre<br />

<a href="http://www.infoworld.com/article/04/03/12/11FEopgov_1.html">http://www.infoworld.com/article/04/03/12/11FEopgov_1.html</a></li>

<li>Les grosses entreprises s'ouvrent à Linux<br />

<a href="http://www.computerworld.com.au/index.php?id=1827627000&amp;fp=16&amp;fpid=0">http://www.computerworld.com.au/index.php?id=1827627000&amp;fp=16&amp;fpid=0</a></li>

<li>Popularité grandissante pour les bases de données open-source<br />

<a href="http://www.itnews.com.au/storycontent.asp?ID=10&amp;Art_ID=18712">http://www.itnews.com.au/storycontent.asp?ID=10&amp;Art_ID=18712</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>eGovOs: Washington, DC. USA: du 15 au 17 mars<br />

Bruce Momjian donnera une rapide conférence<br />

</li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 15 mars 2004 ==</h2>

<p>N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain</p>

<p>Liste de diffusion générale <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>Sur le web :

</p>

<ul>

<li><a href="http://www.postgresql.org">http://www.postgresql.org</a></li>

<li><a href="http://advocacy.postgresql.org">http://advocacy.postgresql.org</a></li>

</ul>