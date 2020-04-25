---
layout: post
title: "PostgreSQL Weekly News - 1er juin 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/368"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 1er juin 2004 ==</h2>

<p>Après bien des rumeurs et des spéculations, l'équipe principale a annoncé que

le 1er juillet sera la date officielle du gel des fonctionnalités pour

PostgreSQL 7.5. La principale raison derrière ceci est le désir de donenr un peu

plus de temps de développement sur certaines fonctionnalités majeures comme

PITR, actuellement en cours de relecture et de tests. Toute personne travaillant

sur une autre fonctionnalité susceptible d'être intégrée dans les prochaines

semaines est encouragée à envoyer un correctif aussi rapidement que

possible.

</p>

<p>Quelques correctifs impressionants ont été intégrés cette semaine. L'un

d'entre eux provient d'Euler Taveira de Oliveira qui a implémenté ALTER DATABASE

foo OWNER TO bar, supprimant ainsi un élément de la liste des choses à faire. La

fonction est supportée dans ECPG et est limité aux administrateurs. Thomas

Hallgren a aussi fourni un correctif basé sur un élément de la même liste&nbsp;;

celui-ci a implémenté la possibilité à des interfaces externes d'étendre

l'ensemble des variables GUC. Les modules supplémentaires comme les langages

procéduraux seront maintenant capables de déclarer une classe de variables et de

les utiliser ensuite comme conteneurs de différentes informations.</p>

<p>Neil Conway a pu soumettre son correctif de réécriture de la structure de

données des listes chaînées avant de disparaître pour l'été. Le correctif, basé

sur de nombreuses discussions sur les différentes listes, change

l'implémentation des listes en les passant de simples pointeurs vers des noeuds de

la liste en pointeurs vers une structure contenant des méta-données sur chaque

liste. Ceux intéressés par les plus petits détails sont encouragés à regarder

dans les archives des listes de discussion. Parmi les codes refactorisés, le

code de l'enregistreur a été logiquement séparé pour être placé dans son propre

module et a reçu la responsabilté des activités de vérification séquentielle

(checkpoint). fsync(2) a éré remplacé par un fsync explicite sur des fichiers

non temporaires.</p>

<p>La fonction identify_system_timezone() a été modifié pour parcourir toutes

les zones horaires connues plutôt que la liste fournie auparavant. Ceci devrait

être un peu plus complet sans ajouter un supplément important de travail lors du

lancement de postmaster. Une version binaire de pg_ctl a été intégrée,

remplaçant le dernier script shell pour le portage win32. D'autres travaux

orientés vers le portage win32 ont été effectués, comme des correctifs pour les

locales, un nettoyage du code utilisé pour lancer de nouveaux moteurs et des

modifications dans le processus EXEC_BACKEND.</p>

<p>Et enfin, dernier point de cette semaine, une nouvelle version du code

btree_gist a été intégrée pour ajouter le support des différents nouveaux types

de données. Nous avons aussi ajouté un nouveau module contrib pg_trgm qui

fournit des fonctions et des classes d'index pour déterminer la similarité de

texxtes suivant une correspondance "trigram".</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie du filtre anti-spam DSPAM v3.0 RC1<br />

<a href="http://yro.slashdot.org/yro/04/05/31/1729234.shtml?tid=111&amp;tid=126">

http://yro.slashdot.org/yro/04/05/31/1729234.shtml?tid=111&amp;tid=126</a></li>

<li>Sortie de pgin.tcl-2.1.0<br />

<a href="http://gborg.postgresql.org/project/pgintcl/news/newsfull.php?news_id=173">

http://gborg.postgresql.org/project/pgintcl/news/newsfull.php?news_id=173</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Le conseil "Nursing &amp; Midwifery" nigériens (soins obstétriques) migre sur

PostgreSQL<br />

<a href="http://www.postgresql.org/news/185.html">http://www.postgresql.org/news/185.html</a></li>

<li>Les inter-plateformes open source auraient-elles plus de succès&nbsp;?<br />

<a href="http://www.sitepoint.com/blog-post-view.php?id=171700">

http://www.sitepoint.com/blog-post-view.php?id=171700</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>European Regional Open Source Conference : Yerevan, Arménie: du 28 au 30

juin<br />

Bruce Momjian parlera à la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 1er juin 2004 ==</h2>

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