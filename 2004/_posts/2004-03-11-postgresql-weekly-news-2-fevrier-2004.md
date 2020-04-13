---
layout: post
title: "PostgreSQL Weekly News - 2 février 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-352 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 2 février 2004 ==</h2>

<p>Cette semaine a vu un peu de tout, les nouvelles fonctionnalités et

l'éradication de bogues se prenant la part du lion. Néanmoins, je pense que la

nouvelle la plus excitante de la semaine a été l'implémentation d'un nouveau

moteur de recherche sur le site web PostgreSQL. Ce nouveau moteur est basé sur

un port, actuellement non disponible, d'ASPSeek, fonctionnant avec PostgreSQL et

remplaçant l'ancien, ayant subi de nombreuses plaintes, basé sur le moteur

mnogo. <em>pause pour se réjouir</em> Celui-ci, couplé avec le nouveau tsearch2 basé

sur le moteur de PostgreSQL est disponible sur <a href="http://www.pgsql.ru/">http://www.pgsql.ru</a>,

devrait faciliter grandement la recherche d'informations liées à PostgreSQL.

</p>

<p>Sur le front des bogues, nous avons vu plusieurs erreurs corrigées. Ces

corrections ont aussi été porté sur le code de la 7.4 cette semaine. Un bogue

concernant un ordre des opérations incorrect et empêchant un démarrage en douceur

de la base de données sur certains cas rares de manque d'espace disque a été corrigé.

Cette correction était basée sur un rapport de Christopher Kings-Lynne sur la liste

-hackers. Un autre problème impliquant une évaluation incorrecte de fonctions

renvoyant des types composés a aussi été corrigé ainsi que la correction d'expressions

complexes de groupement.</p>

<p>Le travail sur la 7.5 a continué à un bon rythme. Les clauses USING et

WITH ont été rendues optionnelles pour \copy, ce qui coincide joliment avec ce

que prétend la documentation à ce sujet. La fonction length() ne tient plus

compte des espaces pour les champs de type char(n), après discussion sur la liste

-hackers. Une lecture d'une partie mémoire non initialisée dans la fonction interne

next_token() de hba.c a été découvert en utilisant valgrind et est maintenant corrigée.

Sur une suggestion de Michael Brusser, nous utilisons enfin Tcl_PutEnv() au lieu de

putenv() dans libpgtcl, car ce dernier corrompt apparemment le runtime Tcl. Des ajouts

supplémentaires au niveau de la documentation expliquent comment libpq gère la mémoire

pour les pointeurs de caractères renvoyés par les fonctions de libpq.</p>

<p>Nous avons vu quelques améliorations pour ecpg cette semaine, incluant l'affichage

d'un message d'attention (niveau warning) si un curseur est déclaré mais non ouvert, la

correction du prototype d'ECPGprepared_statement pour ne pas grogner avec les "const char"

et la correction de l'analyse des structure imbriquées lors de l'ajout d'une option pour

analyser les fichiers d'en-têtes.</p>

<p>Sur le front win32, une réorganisation importante du moteur, principalement sur

fork, exec, process et sur les gestion des signaux a été effectué. Une modification

spécifique concernait l'utilisation de SleepEx() pour PG_USLEEP pour ajouter une

interruption de signal. D'autres modifications concernant win32 incluaient configure et

Makefile, le cas de la mémoire partagée attachée à EXEC_BACKEND et l'ajout d'une fonction

win32 rand qui avait été oublié. Il est intéressant de noter que cette semaine nous a

apporté une version win32 compilable et quasiment utilisable. C'est certainement trop

récent pour que l'utilisateur moyen puisse même le tester mais, si vous êtes intéressé

par le côté bas niveau, cela devrait être bien plus facile maintenant de vous impliquer.</p>

<p>Une dernière note, Simon Riggs a posté un superbe résumé de développement effectué

jusqu'à maintenant sur la branche 7.5 de PostgreSQL. Vous pouvez le lire dans les archives sur

<a href="http://archives.postgresql.org/pgsql-hackers/2004-01/msg00723.php">http://archives.postgresql.org/pgsql-hackers/2004-01/msg00723.php</a>.

(Juste un point, cela m'a pris 0.084 secondes pour le trouver avec le nouveau moteur de recherche :-)

Simon a précisé son intention de mettre à jour constamment ce résumé et l'équipe web recherche un

endroit permanent pour le conserver. Une fois trouvé, je vous fournirais cette information.</p>

<!--more-->


<p><!--break--></p>

<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Linux Labs ont sorti "Clustered PostgreSQL Database for Enterprise Computing"<br />

<a href="http://biz.yahoo.com/prnews/040129/lath071_1.html">http://biz.yahoo.com/prnews/040129/lath071_1.html</a></li>

<li>pljava est maintenant disponible en téléchargement<br />

<a href="http://gborg.postgresql.org/project/pljava/news/newsfull.php?news_id=149">http://gborg.postgresql.org/project/pljava/news/newsfull.php?news_id=149</a></li>

<li>Disponibilités de nouveaux utilitaires d'import et d'export pour PostgreSQL<br />

<a href="http://gborg.postgresql.org/project/pgimport/news/newsfull.php?news_id=151">http://gborg.postgresql.org/project/pgimport/news/newsfull.php?news_id=151</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>SourceBeat Launches Site and Open Source Dynamic Publishing Model<br />

<a href="http://www.prnewswire.com/cgi-bin/stories.pl?ACCT=SVBIZINK3.story&amp;STORY=/www/story/02-02-2004/0002101112&amp;EDATE=MON+Feb+02+2004,+01:00+PM">http://www.prnewswire.com/cgi-bin/stories.pl?ACCT=SVBIZINK3.story&amp;STORY=/www/story/02-02-2004/0002101112&amp;EDATE=MON+Feb+02+2004,+01:00+PM</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Linux Solutions 2004: Paris, France: du 3 au 5 février<br />

Bruce Momjian fera des présentations<br />

<a href="http://www.solutionslinux.fr/en/index.php">http://www.solutionslinux.fr/en/index.php</a></li>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 2 février 2004 ==</h2>

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