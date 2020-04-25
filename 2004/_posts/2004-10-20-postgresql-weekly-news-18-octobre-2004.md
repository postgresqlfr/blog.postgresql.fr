---
layout: post
title: "== PostgreSQL Weekly News - 18 octobre 2004 =="
author: "Jean-Paul Argudo"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/41"
---


<p>

Le 19 octobre 2004, Robert Treat écrivait sur la liste pgsql-announce:

</p>

<p>

Il y a eu assez de progrès cette semaine pour commencer à espérer une sortie en

Release Candidate (NDT: Les "releases candidates" annoncent la sortie du cycle

béta, pour s'approcher peu à peu de la version finale). Je pense que nous en

sommes cependant encore à une semaine ou plus, avec une béta version encore

possible, mais c'est toujours bon signe, nous nous rapprochons d'une version,

l'étau se ressérant autour des bugs sur les tablespaces et la version windows.

</p>

<p>

En étant aussi près du but, les corrections de cette semaine sont plus larges que profondes. Quelques problèmes avec CygWin et DLLINIT ont étés corrigés. La compilations statique des librairies sur la version Win32 avec CygWin est désormais possible. Tous les modules de /contrib devraient aujourd'hui compiler sans soucis sous CygWin. La fonction getpid() est à présent castée en entier, ce qui résout un problème sur quelques versions de Solaris lorsqu'elle retournait un entier long.

Quelques casts inutiles sur void* lorsqu'on utilisait pfree() dans les

modules contrib/xml et contrib/xml2 ont été supprimés. Nous rapportons

à présent le chemin complet dans les logs d'erreurs pour des

non-concordances de versions dans les binaires. Plusieurs bugs ont été

corrigés et des améliorations faites sur plperl. Un bug sur

pg_get_indexdef() a été supprimé. On peut maintenant arrêter le

processus d'écriture en arrière plan (NDT: "background writer") en

définissant les valeurs limites à zéro. Les fonctions PQprepare et

PQsendPreparend ont été ajoutées à la libpq pour permettre la

préparation des requêtes sans spécifier les types de données de leurs

paramètres.

</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>Sortie de DSPAM v.3.2<br />

<a href="http://developers.slashdot.org/developers/04/10/16/2314226.shtml?tid=111">

http://developers.slashdot.org/developers/04/10/16/2314226.shtml?tid=111

</a></p>

<p>Sortie de Postgresql AutoDoc v.1.24<br />

<a href="http://newsnow.co.uk/cgi/NGoto/72860172?">

http://newsnow.co.uk/cgi/NGoto/72860172?</a>

</p>

<h3>== News autour de PostgreSQL ==</h3>

<p>

Une start-up créée un projet de management de sites<br />

<a href="http://www.computerworld.com.au/index.php/id;142238304;fp;16;fpid;0">

http://www.computerworld.com.au/index.php/id;142238304;fp;16;fpid;0

</a>

</p>

<p>

Apprendre PostgreSQL au "Big Nerd Ranch"<br />

<a href="http://www.linuxjournal.com/article.php?sid=7847&amp;mode=thread&amp;order=0&amp;thold=0">

http://www.linuxjournal.com/article.php?sid=7847&amp;mode=thread&amp;order=0&amp;thold=0

</a>

</p>

<p>

Optimisation de 10 000 commits (blog)<br />

<a href="http://aseigo.blogspot.com/2004/10/optimization-by-10000-commits.html">

http://aseigo.blogspot.com/2004/10/optimization-by-10000-commits.html

</a>

</p>

<p>

Entraînement à PostgreSQL<br />

<a href="http://worldofnic.blogspot.com/2004/10/postgresql-training.html">

http://worldofnic.blogspot.com/2004/10/postgresql-training.html

</a>

</p>

<h3>== Évènements autour de PostgreSQL ==</h3>

<p>Sommet 4D: Nouvelle Orléans, Louisiane, du 19 au 22 octobre<br />

Le Sommet 4D aura des conférences sur la construction d'applications sur plates-formes

hétérogènes avec PostgreSQL.<br />

<a href="http://www.4d.com/summit/">http://www.4d.com/summit/</a></p>

<p>LinuxWorld Conférence: Francfort, Allemagne: du 26 au 28 octobre<br />

PostgreSQL y aura une fois de plus un stand!<br />

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a>

</p>

<h3>== PostgreSQL Weekly News - 18 octobre 2004 ==</h3>

<p>

Sur le web:<br />

<a href="http://www.postgresql.org">http://www.postgresql.org</a></p>