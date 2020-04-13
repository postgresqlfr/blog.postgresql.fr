---
layout: post
title: "PostgreSQL Weekly News - 19 mai 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-365 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 19 avril 2004 ==</h2>

<p>Le développement a continué sur un bon rythme, tout le monde se préparant

pour la période de beta test de la 7.5. Le travail a continué sur quelques gros

éléments comme PITR et win32, et nous avons aussi eu un premier aperçu de

l'implémentation des espaces de nommage. Bien que cette fonctionnalité n'est pas

encore prête pour un envoi officiel, Gavin Sherry a envoyé un correctif avec

quelques problèmes non résolus ajoutant ainsi une nouvelle étape à cette

fonctionnalité fréquemment demandée.<!--break-->

</p>

<p>Quelques bogues ont été corrigé, ces corrections ayant aussi été reportées

sur la version 7.4, ce qui a lancé des rumeurs sur une potentielle version 7.4.3

dans les prochaines semaines. Bien qu'aucune date n'a été fixé, avec la beta

arrivant à grand pas, il est plus que probable que nous aurons cette nouvelle

version dans quelques petites semaines ; entre temps, voici une liste des

correctifs de la semaine. Un problème d'efficacité dans le lancement de

l'exécuteur en relation avec un code de bas niveau (aclcheck) a été revu. Un

dépassement de tampon possible a été corrigé dans enlargeStringInfo(). Un bogue

a aussi été corrigé lors d'union de tables n'ayant aucune colonne. Quelques

problèmes sur le support des threads ont été corrigés pour le système

Unixware.</p>

<p>En regardant certains autres domaines où de nouvelles fonctionnalités ont été

ajoutées, un support a été introduit pour les installations déplaçables ce qui

permet aux utilisateurs de déplacer entièrement les structures du répertoire

d'installation tout en laissant les exéutables PostgreSQL fonctionner

normalement. Les modules externes (comme les langages procéduraux) peuvent

maintenant configurer des options supplémentaires pour les commandes dlltool et

dllwrap. Une implémentation basique de la fonction width_bucket() (spécification

SQL 2003) a été implémenté pour le type de données 'numeric'. Les fonctions

ln(), log(), power() et sqrt() ont été modifié pour émettre les bons codes

d'erreur SQLSTATE pour certaines conditions d'erreur comme spécifié par SQL2003.

Enfin, de la documentation pour la nouvelle fonctionnalité "dollar quoting" a

été ajouté et plusieurs exemples ont été mis à jour pour montrer le nouveau

style.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Nouvelle version de contrib/pg_trgm disponible !<br />

<a href="http://archives.postgresql.org/pgsql-hackers/2004-05/msg00646.php">http://archives.postgresql.org/pgsql-hackers/2004-05/msg00646.php</a></li>

<li>Sortie de my2pg 1.30<br />

<a href="http://freshmeat.net/projects/my2pg/?branch_id=6864&amp;release_id=161008">http://freshmeat.net/projects/my2pg/?branch_id=6864&amp;release_id=161008</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Le gouvernement Open Source<br />

<a href="http://www.linuxinsider.com/story/online/33794.html">http://www.linuxinsider.com/story/online/33794.html</a></li>

<li>Débuter la programmation des applications d'entreprise avec Linux, Java et

PostgreSQL<br />

<a href="http://searchenterpriselinux.techtarget.com/tip/0,289483,sid39_gci962881,00.html">http://searchenterpriselinux.techtarget.com/tip/0,289483,sid39_gci962881,00.html</a></li>

<li>libpqxx simplifie la programmation C++ de PostgreSQL<br />

<a href="http://www.devchannel.org/article.pl?sid=04/05/11/1720258">http://www.devchannel.org/article.pl?sid=04/05/11/1720258</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>NLUUG Open Source for Business : Ede, Hollande le 27 mai<br />

Elein Mustain parlera des possibilités d'extensions de PostgreSQL<br />

<a href="http://www.nluug.nl/events/vj04/">http://www.nluug.nl/events/vj04/</a></li>

<li>European Regional Open Source Conference : Yerevan, Arménie: du 28 au 30

juin<br />

Bruce Momjian parlera à la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 19 avril 2004 ==</h2>

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