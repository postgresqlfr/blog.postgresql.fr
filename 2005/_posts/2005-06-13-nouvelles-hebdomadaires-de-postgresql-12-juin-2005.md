---
layout: post
title: "== Nouvelles hebdomadaires de PostgreSQL - 12 juin 2005 =="
author: "SAS"
redirect_from: "index.php?post/drupal-99 "
---


== PostgreSQL Weekly News - 12 juin 2005 ==<br /><br />Le 12 juin 2005, David Fetter écrivait :

<p>

Pavel Stehule a ajouté le support d'une clause <tt>INTO</tt> pour les commandes <tt>PL/PgSQL</tt> <tt>EXECUTE</tt>, <tt>SQLSTATE</tt>, <tt>SQLERRM</tt>, <tt>NEXT_DAY</tt> et <tt>LAST_DAY</tt>. Il travaille également sur les fonctions <tt>LEAST()</tt> et <tt>GREATEST()</tt>, similaires à <tt>MAX()</tt> et <tt>MIN()</tt>, à la différence près que ces fonctions opèrent au niveau ligne plutôt que colonne.

</p>

<!--more-->


Alvarro Herrera <em>et al.</em> ont travaillé dur sur le <acronym title="two-phase commit">2PC</acronym>.

<p>

Andreas Pflug a réalisé plusieurs correctifs pour la surveillance du serveur.

</p>

<p>

Magnus Hagander a ajouté une fonctionnalité permettant d'utiliser la totalité des fuseaux horaires lors de l'exécution de <tt>"AT TIME ZONE"</tt>.

</p>

<p>

Il y a eu une grande discussion sur le nettoyage des contribs, et notamment la suppression des projets fantômes et du code devenu inutile ou inapproprié. Quelques nouveaux projets ont fait leur apparition, dont <tt>REINDEX</tt>.

</p>

<p>

Les quotas représentent un sujet brûlant : par-utilisateur, par-base, par-tablespace, ... et l'éternel utilisateurs par-base ont resurgi.

</p>

<p>

Il semblerait que Bricolage soit la nouvelle architecture de techdocs. Gevik Babkhani lui a ajouté une navigation sous forme d'arbre.

</p>

<p>

Michael Glaesemann continue à travailler pour que <tt>TIMESTAMP WITH TIME ZONE</tt> tienne compte du <acronym title="Daylight Saving Time">DST</acronym>, en séparant la notion de '24 heures' de celle de 'un jour'.

</p>

<p>

Teodor Sigaev a travaillé sur la restauration du <tt>GiST</tt>.

</p>

== PostgreSQL Product News ==

<p>

pgEdit 1.1 est sorti

<a href="http://pgedit.com/products">http://pgedit.com/products</a>

</p>

<p>

Slony-I 1.1 RC1 est maintenant disponible.

Change log :

<a href="http://developer.postgresql.org/%7Ewieck/slony1/HISTORY-1.1">href=http://developer.postgresql.org/~wieck/slony1/HISTORY-1.1</a>

Docs :

<a href="http://developer.postgresql.org/%7Ewieck/slony1/adminguide-1.1.rc1/">http://developer.postgresql.org/~wieck/slony1/adminguide-1.1.rc1/</a>

Téléchargement :

<a href="http://developer.postgresql.org/%7Ewieck/slony1/download/slony1-1.0.0.rc1.tar.gz">http://developer.postgresql.org/~wieck/slony1/download/slony1-1.0.0.rc1.tar.gz</a>

</p>

== PostgreSQL in the News ==

<p>

Unisys a publié un papier évaluant PostgreSQL sur des systèmes multi-CPU de pointe.

<a href="http://developer.osdl.org/markw/papers/PostgreSQL%20Visit%20Report%20External%20050513.pdf">http://developer.osdl.org/markw/papers/PostgreSQL%20Visit%20Report%20External%20050513.pdf</a>

</p>

<p>

General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

Slony-I 1.1

</p>