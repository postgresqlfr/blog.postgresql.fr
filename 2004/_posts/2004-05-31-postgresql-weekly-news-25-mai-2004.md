---
layout: post
title: "PostgreSQL Weekly News - 25 mai 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-366 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 25 mai 2004 ==</h2>

<p>Nouvelle semaine, nouveaux changements dans notre progression vers la

7.5. Cette semaine a vu des modifications au niveau de fonctionnalités

déjà existantes plutôt que de nouvelles fonctionnalités, bien que

certaines de ces modifications feront que les anciennes fonctions seront

maintenant utilisables par de nouvelles personnes, ce qui est le but à mon

sens.<!--break-->

</p>

<p>Nous avons vu un passage à l'utilisation des routines de bibliothèque des

caractères composés pour les fonctions upper/lower/initcap

(majuscules/minuscules/majuscule en première lettre). Ceci permet à ces

fonctions de travailler correctement avec Unicode et les codages multi-octets,

qui nous ont posé bien des problèmes dans le passé. Les nouvelles bibliothèques

sur les zones horaires, recherchées auparavant pour win32, sont maintenant

utilisées par toutes les plateformes. Ceci résoudra quelques problèmes rélatifs

aux zones horaires que certaines personnes ont eu et met toutes les

plateformes sur un pied d'égalité pour cette fonctionnalité. D'autre part, le

verrouillage effectué par pg_listener pour NOTIFY et les autres commandes de ce

genre a été réduit de AcessExclusiveLock à ExclusiveLock. Bien que ces

opérations seront toujours réalisées en série, elles n'entreront pas en conflit

avec les opérations ANALYZE concurrentes. Et en parlant d'ANALYZE, pour le

calcul des statistiques, une nouvelle méthode de choix en deux étapes a été

intégrée à ANALYZE, cette méthode devant donner de meilleurs résultats lorsque

la densité des lignes non supprimées n'est pas uniforme sur toute la table.

Suite aux modifications des dernières semaines, un peu de temps a été passé pour

nettoyer et documenter la relativement nouvelle fonction d'installation et des

marqueurs ont été ajouté pour la "fin du dump" dans les outils pg_dump et

pg_dumpall.</p>

<p>La dernière modification importante à mentionner concerne la

modification des messages du CVS envoyés sur la liste de diffusion

pgsql-commiters. Maintenant, chaque fois qu'une modification est

diffusée (cvs commit), le courrier électronique envoyé à la liste

contiendra un lien direct vers l'interface de CVS-Web indiquant les

différences entre le fichier et sa version précédente. Nous espérons que

cela va améliorer la relecture du code en la rendant plus accessible

pour ceux intéressés par les détails des modifications.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Paquets de connexion pour Oracle et MySQL disponibles

maintenant<br />

<a href="http://www.postgresql.org/news/184.html">http://www.postgresql.org/news/184.html</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Le dernier MySQL n'arrive pas à faire taire les critiques sur les

licences<br />

<a href="http://www.internetnews.com/dev-news/article.php/3358061">http://www.internetnews.com/dev-news/article.php/3358061</a></li>

<li>Le conseil "Nursing &amp; Midwifery" nigériens (soins obstétriques) migre sur

PostgreSQL<br />

<a href="http://www.postgresql.org/news/185.html">http://www.postgresql.org/news/185.html</a></li>

<li>Les contraintes de vérification PostgreSQL supportent les expressions régulières (blog)<br />

<a href="http://joseph.randomnetworks.com/archives/2004/05/24/postgresql-check-constraint-supports-regular-expressions/">http://joseph.randomnetworks.com/archives/2004/05/24/postgresql-check-constraint-supports-regular-expressions/</a></li>

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