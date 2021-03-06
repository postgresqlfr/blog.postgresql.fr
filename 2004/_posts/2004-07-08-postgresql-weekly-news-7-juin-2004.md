---
layout: post
title: "PostgreSQL Weekly News - 7 juin 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/369"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 7 juin 2004 ==</h2>

<p>Après une activité intense la semaine dernière, un calme relatif est apparu cette semaine. L'attention a été porté à la correction de quelques unes des grosses fonctionnalités mais aussi aux modifications mises de côté pour un moment. Quelques tests de bogues, niveau alpha, ont aussi débuté et vous pouvez aussi vous attendre à ce que ces corrections continuent avant que nous arrivions à une bêta officielle.</p>

<p>Le processus de construction d'un index btree a été modifié pour ne pas utiliser les tampons partagés, évitant ainsi les conflits de verrouillage avec les points de vérification (checkpoint) concurrents. De même, la mécanique de journalisation WAL des construction d'index a été modifié pour permettre une rapidité accrue dans la construction des

index dans certains cas. Des fonctions serveurs d'envois de signaux INT et TERM vers d'autres processus serveurs  PostgreSQL ont été ajouté au code. Les bibliothèques timezone ont été ajustées pour supprimer des problèmes de

comportement limite aux limites des échelles de temps 32 bits (1901 et 2038).

</p>

<p>Du travail a été effectué sur le passage d'arguments de types

composés dans des expressions SQL pour le langage plpsql, ceci incluant

l'affectation de variables contenant une ligne entière. De façon

similaire, la plupart du moteur est maintenant protégée pour les

colonnes à type composite. Quelques modifications doivent survenir

(comme le support de la commande ALTER TABLE ou la syntaxe exacte pour

UPDATE) mais le code et la documentation sont maintenant dans le CVS

et, donc, disponible publiquement.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>SRA America sort la version Win32 de PostgreSQL<br />

<a href="http://www.postgresql.org/news/195.html">

http://www.postgresql.org/news/195.html</a></li>

<li>Sortie de phpPgAdmin 3.4<br />

<a href="http://archives.postgresql.org/pgsql-announce/2004-06/msg00002.php">

http://archives.postgresql.org/pgsql-announce/2004-06/msg00002.php</a></li>

<li>La solution de réplication Slony-I entre en phase bêta<br />

<a href="http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=174">

http://gborg.postgresql.org/project/slony1/news/newsfull.php?news_id=174</a></li>

<li>AquaFold solidifie le bureau Linux pour les développeurs de bases de

donnés<br />

<a href="http://www.linuxpr.com/releases/6938.html%22">

http://www.linuxpr.com/releases/6938.html</a></li>

<li>Uwerkz met à jour DataWerkz avec le résumé des tables<br />

<a href="http://www.macobserver.com/article/2004/06/04.8.shtml">

http://www.macobserver.com/article/2004/06/04.8.shtml</a></li>

<li>.com Solutions Inc. ajoute le support de PostgreSQL pour CGIScripter 2.08 <br />

<a href="http://www.emediawire.com/releases/2004/6/emw131878.htm">

http://www.emediawire.com/releases/2004/6/emw131878.htm</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Le pied de FOSS dans une étoile permanente<br />

<a href="http://www.smh.com.au/articles/2004/06/07/1086460218113.html">

http://www.smh.com.au/articles/2004/06/07/1086460218113.html</a>

</li>

<li>Réplication de bases de données et l'ancien combat Beta versus VHS (blog)<br />

<a href="http://www.arachna.com/roller/page/spidaman/20040604#database_replication_and_the_old">

http://www.arachna.com/roller/page/spidaman/20040604#database_replication_and_the_old</a></li>

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