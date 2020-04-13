---
layout: post
title: "PostgreSQL Weekly News - 12 janvier 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-349 "
---


<h2>== Nouvelles hebdomadaires PostgreSQL - 12 janvier 2004 ==</h2>

<p>Les affaires ont recommencé cette semaine alors que les gens revenaient de vacances. De gros progrès ont été effectué sur le portage win32. Cette semaine a vu l'arrivée de l'implémentation d'un tube ainsi que la correction de plusieurs problèmes sur fork/exec. J'ai demandé à Claudio Natoli, un des principaux développeurs du

portage win32, ce qu'il pensait des derniers correctifs. Il semblait

assez content que la grosse majorité du travail sur fork/exec ait été

effectuée. Bien sûr, dans le style des vrais développeurs, il a ajouté

ce commentaire : "il existe encore des points à règler qui seront pris

en charge dans les prochaines semaines". Mais de fait, une étape

importante a été franchie par le portage win32 et ceux qui s'en sont

chargés devraient en être fiers.

</p>

<p>Les autres nouvelles du développement pour cette semaine concernent

un certain nombre d'améliorations sur les optimiseurs IQ. Ces

améliorations ont permis d'extraire les conditions de parcours d'index

OR des conditions OR-of-AND (un AND entouré de OR) où chaque

sous-clause OR inclut une contrainte sur la même relation. Il détecte

aussi d'une meilleure manière les cas où les

entrées, telle qu'une sous-requête utilisant SELECT DISTINCT, est déjà

unique pour prévenir des unifications redondantes. L'intelligence du

testeur de prédicat de l'index partiel a aussi été amélioré pour gérer

les clauses commutées (4<x implique="" x="">3),

les sous-clauses plus compliquées qu'une simple variable (upper(x) =

't' implique upper(x)&gt;'a') et les opérateurs &lt;&gt; (x&lt;3

implique x&lt;&gt;4).</x></p>

<p>Un ensemble d'améliorations sur psql a été réalisé, ceci incluant

psql \dn pour afficher uniquement les schémas temporaires visibles en

utilisant current_schemas() et psql '\i ~/<tab><tab>' pour récupérer

les fichiers à afficher dans le répertoire personnel de l'utilisateur.

Quelques pièces initiales du correctif de Dennis Bjorklund ont été

intégrées pour permettre de

déclarer les paramètres des fonctions avec des noms. Il reste encore

quelques points concernant la documentation, l'interaction avec psql et

les langages de procédures autres que plpgsql qui demandent encore du

travail mais les bases pour cela sont définies. Un bogue du programme

createuser, générant un code SQL

incorrect lorsque l'option -E est utilisé sans -P, a été corrigé grâce

à Martin Pitt, qui est à l'origine du rapport et du correctif.

WITH/WITHOUT OIDS a été ajouté pour la commande CREATE TABLE AS. Cette

fonctionnalité doit permettre aux auteurs d'applications de

s'affranchir eux-même des modifications de la

valeur par défaut de 'default_with_oids' dans les futures versions de

PostgreSQL. Dernier point, mais pas le moindre, CREATE TRIGGER, CREATE

INDEX et CREATE SEQUENCE ont été ajoutés à la liste des expressions

supportées par CREATE SCHEMA.</tab></tab></p>

<p>Une dernière note, après bien des discussions sur plusieurs listes

de diffusion, une nouvelle version de pljava est disponible sur gborg

depuis la semaine dernière. Sur la page du projet (<a href="http://gborg.postgresql.org/project/pljava/projdisplay.php">http://gborg.postgresql.org/project/pljava/projdisplay.php</a>), vous trouverez des liens vers des explications techniques ainsi que sur la manière de débuter.</p>

<!--more-->


<p><!--break--></p>

<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>L'équipe FreeGIS annonce la sortie 1.0.0 de Thuban Geographic Information Tool<br />

<a href="http://spatialnews.geocomm.com/dailynews/2004/jan/09/news5.html">http://spatialnews.geocomm.com/dailynews/2004/jan/09/news5.html</a>

</li>

<li>Sortie du pilote pgExpress Driver v2.20<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-01/msg00008.php">http://archives.postgresql.org/pgsql-announce/2004-01/msg00008.php</a>

</li>

<li>Mise à jour du paquet Cygwin : postgresql-7.4.1-2<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-01/msg00007.php">http://archives.postgresql.org/pgsql-announce/2004-01/msg00007.php</a>

</li>

<li>Sortie de "Callisto Small Buisness Management Software<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-01/msg00004.php">http://archives.postgresql.org/pgsql-announce/2004-01/msg00004.php</a>

</li>

<li>PostgreSQL Hierarchical Queries 0.5-Pg7.3<br />

<a href="http://freshmeat.net/projects/hier_pg/?branch_id=35539&amp;release_id=147293&amp;topic_id=66">http://freshmeat.net/projects/hier_pg/?branch_id=35539&amp;release_id=147293&amp;topic_id=66</a>

</li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

Choosing An Open Source Database

http://www.eweek.com/article2/0,4149,1433738,00.asp

Cross - platform client - server backups .

http://www.onlamp.com/pub/a/onlamp/2004/01/09/bacula.html

Database Wars: Oracle vs. Microsoft

http://www.newsfactor.com/story.xhtml?story_id=22767&amp;category=databases

Interview with the MAASK Team discussing shared distributed memory

http://www.linuxjournal.com/article.php?sid=7341&amp;mode=&amp;order=0

<h2>== Evénements à venir ==</h2>

Linux.Conf.Au: Adelaide, Australia: 12 au 17 janvier

BOF et tutoriels présentés par Gavin Sherry

http://lca2004.linux.org.au.

LinuxWorld: New York City, New York: 21 janvier

Bruce Momjian présentera une BoF PostgreSQL

http://www.postgresql.org/event.php?EventID=180

New York PHP Meeting: New York, New York: 27 janvier

Bruce Momjian proposera une présentation de PostgreSQL

http://nyphp.org/content/calendar/view_entry.php?id=50&amp;date=20040127

NordU Usenix 2004: Denmark: 28 janvier - 1er février

Bruce Momjian présentera quelques tutoriels PostgreSQL

http://www.nordu.org/NordU2004/

Linux Solutions 2004: Paris, France: 3 au 5 février

Bruce Momjian fera une présentation

http://www.linuxsolutions.fr/EN/home/index.php?site=default

<h2>== Nouvelles hebdomadaires PostgreSQL - 12 janvier 2004 ==</h2>

N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain

Liste de diffusion générale http://www.varlena.com/GeneralBits/

Sur le web :

http://www.postgresql.org

http://advocacy.postgresql.org