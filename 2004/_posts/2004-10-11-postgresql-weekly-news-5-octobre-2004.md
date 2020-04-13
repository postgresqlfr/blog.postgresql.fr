---
layout: post
title: "== PostgreSQL Weekly News - 5 octobre 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-39 "
---


<p>

Rien ne vaut quelques ouragans et des coupures d'électricité pour vous inspirer

des variations de ces nouvelles hebdomadaires. Bien sur, lorsque vous êtes dans un

environnement de développement distribué, le temps qu'il fait importe peu, ainsi

lorsque j'étais à l'extérieur pour nettoyer les arbres cassés et autres, les

développeurs de PostgreSQL préparaient PostgreSQL 8.0 beta 3.

Ceux qui n'ont pas encore mis à jour sont priés de le faire, les paquets sont

disponibles sur les serveurs habituels. Ceux qui voudraient savoir quelles

corrections il nous reste à apporter peuvent aller voir la liste des items

ouverts sur <a href="http://candle.pha.pa.us/cgi-bin/pgopenitems">

http://candle.pha.pa.us/cgi-bin/pgopenitems

</a>.

</p>

<p>

Ainsi, après deux semaines et une nouvelle beta, nous avons certainement une

bonne liste de changements à balayer. Le code assembleur pour l'instruction

test-and-set (TAS) sous Solaris/386 a été corrigé. Un cas particulier dans

lequel la libpq auraît pu traiter une commande défectueuse comme étant réussie a

aussi été corrigé. Quelques conditions de dépassement de pile dans les

opérateurs arithmétiques sur des entiers sont désormais détectés. Une

optimisation des hash joins pour lesquels la relation INNER est complètement

vide a été ajoutée. ALTER TABLE OWNER a été ajusté pour mettre à jour la

propriété des séquences afférentes, en accord avec les index. Le code de

vérrouillage sur les index a été amélioré, et le code de mise à jour de table

héritées a été amélioré. Enfin, le label de volatilité des fonctions relatives

au timestamp a été revu et corrigé comme il le fallait.

</p>

<p>

Un autre domaine qui a bénéficié de tout un tas d'améliorations a été le

programme psql. Parmi les ajouts, on trouve le support des tabulation pour ALTER

SEQUENCE, ajout de "RENAME TO" pour ALTER TRIGGER xx ON yy, support de ALTER

USER xxx, support de ALTER LANGUAGE, support amélioré de ALTER TABLE xxx ALTER

COLUMN xxx. Parmi les corrections, on trouve la bonne table pour ALTER TRIGGER

xx ON ..., ALTER GROUP xxx DROP ..., ALTER DOMAIN xxx DROP ... et ALTER DOMAIN

xx SET DEFAULT. Merci à Greg Sabino-Mullane pour cet important travail.

</p>

<p>

Un autre domaine qui se doit d'être cité est le travail continu d'amélioration

de la documentation. Les récents endroits où on a travaillé sont par exemple la

commande CREATE TABLE AS, l'installation de PL/Python, le support de SSL dans la

libpq, l'utilisation de PERFORM en plpgsql, la procédure de mise à jour, et

plusieurs nouvelles entrées dans l'index de la documentation. Si vous le l'avez

pas encore fait, veuillez vous ballader dans cette nouvelle documentation et

nous envoyer toutes les suggestions que vous auriez.

</p>

<!--more-->


<h3>== Nouveautés autour de PostgreSQL ==

</h3>

<p>

Sortie de EMS PostgreSQL Manager v.2.5 pour Windows<br />

<a href="http://www.databasejournal.com/news/article.php/3414051">

http://www.databasejournal.com/news/article.php/3414051

</a>

</p>

<p>

Servoy v.2.1: plus de 50 fonctionalités nouvelles ou améliorées<br />

<a href="http://www.macworld.com/news/2004/09/23/servoy/index.php">

http://www.macworld.com/news/2004/09/23/servoy/index.php

</a>

</p>

<p>

Sortie de Whitebeam 0.9.30<br />

<a href="http://www.postgresql.org/news/228.html">

http://www.postgresql.org/news/228.html

</a>

</p>

<h3>

== PostgreSQL dans les news ==

</h3>

<p>

Le Héros Open Source Prouve la Puissance de Tux<br />

<a href="http://www.cxotoday.com/cxo/jsp/showstory.jsp?storyid=1523">

http://www.cxotoday.com/cxo/jsp/showstory.jsp?storyid=1523

</a>

</p>

<p>

Mail Cruncher Brings Business Trust Ratings to Anti-Spam<br />

<a href="http://www.emediawire.com/releases/2004/9/emw161107.htm">

http://www.emediawire.com/releases/2004/9/emw161107.htm

</a>

</p>

<p>

PostgreSQL a besoin de trouver sa voie (blog)

<a href="http://cuppett.blogspot.com/2004/09/postgresql-needs-to-find-its-way.html">

http://cuppett.blogspot.com/2004/09/postgresql-needs-to-find-its-way.html

</a>

</p>

<h3>== Évènements autour de PostgreSQL ==</h3>

<p>

Workshop Suisse sur les systèmes Ouverts: Zurich, Suisse, du 5 au 7 octobre<br />

Bruce Momjian y sera présent<br />

<a href="http://www.ch-open.ch/wstage/index.html">

http://www.ch-open.ch/wstage/index.html

</a>

</p>

<p>

Sommet 4D: Nouvelle Orléans, Louisiane, du 19 au 22 octobre<br />

Le Sommet 4D aura des conférences sur la construction d'applications sur

plates-formes hétérogènes avec PostgreSQL.<br />

<a href="http://www.4d.com/summit/">

http://www.4d.com/summit/

</a>

</p>

<p>

LinuxWorld Conférence: Francfort, Allemagne: du 26 au 28 octobre<br />

PostgreSQL y aura une fois de plus un stand!<br />

<a href="http://www.linuxworldexpo.de/">

http://www.linuxworldexpo.de/

</a>

</p>

<h3>== PostgreSQL Weekly News - 5 octobre 2004</h3>

<p>

Sur le web:<br />

<a href="http://www.postgresql.org">

http://www.postgresql.org

</a>

</p>