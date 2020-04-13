---
layout: post
title: "PostgreSQL Weekly News - 3 mai 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-363 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 3 mai 2004 ==</h2>

<p>Il y a eu beaucoup de discussions cette semaine concernant le passage de la

7.5 en bêta. Alors qu'une date proposée était le 1er juin, certains pensent que

la sortie doit être décalée pour aider aux finissions de quelques

fonctionnalités de haute volée, actuellement en développement comme les espaces

de nommages (tablespace), le commit en deux phases et le portage vers win32.

Alors qu'aucun n'est terminé actuellement, la plupart ont des concepts

fonctionnels et des correctifs en cours de développement. Il y a donc de fortes

chances pour qu'ils soient terminés et inclus avant le gel des

fonctionnalités.

</p>

<p>Pour ce qui est des sources actuelles, le plus gros impact de la semaine est

l'ajout de la bibliothèque des fuseaux horaires d'Arthur Olson, du domaine

public, dans le moteur. Originellement, il a été inclus dans l'effort du portage

win32. Ceci dit, quelques problèmes côté Unix ont été corrigé grâce à cela,

notamment l'amélioration de la fiabilité de détection des fuseaux horaires

légaux, sans parler de la résolution des problèmes de portabilité entre

plateformes. Il est aussi important de mentionner l'envoi de l'ensemble complet

des correctifs pour la phase 1 de PITR sur la liste -patches. Cet ensemble

apporte une implémentation, plus ou moins fonctionnelle de PITR, bien qu'il

reste du travail pour rendre ceci utilisable en général. Néanmoins, c'est un bon

aperçu de ce qui nous attend.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>plPHP RC1 est enfin disponible<br />

<a href="http://www.postgresql.org/news/182.html">http://www.postgresql.org/news/182.html</a></li>

<li>Vous vous rappellez de Rekall&nbsp;?<br />

<a href="http://software.newsforge.com/software/04/04/20/1823249.shtml">http://software.newsforge.com/software/04/04/20/1823249.shtml</a></li>

<li>Nexonia Inc. annonce un système Web-Based Expense Report and Timesheet System<br />

<a href="http://www.emediawire.com/releases/2004/5/emw122900.htm">http://www.emediawire.com/releases/2004/5/emw122900.htm</a></li>

<li>Sortie de TYPO3 3.6.0<br />

<a href="http://www.linuxelectrons.com/article.php/20040502100212580">http://www.linuxelectrons.com/article.php/20040502100212580</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Cas d'utilisation&nbsp;: Une alternative libre à l'OpenView de HP<br />

<a href="http://www.oetrends.com/news.php?action=view_record&amp;idnum=330">http://www.oetrends.com/news.php?action=view_record&amp;idnum=330</a></li>

<li>Linux manque de méthodologies de tests<br />

<a href="http://software.newsforge.com/print.pl?sid=04/04/23/1845200">http://software.newsforge.com/print.pl?sid=04/04/23/1845200</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>European Regional Open Source Conference&nbsp;: Yerevan, Arménie du 28 au 30 juin<br />

Bruce Momjian parlera pendant la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon&nbsp;: Portland, OR. USA du 26 au 30 juillet<br />

Il y aura un thème PostgreSQL avec la participation d'un grand nombre de

membres de la communauté<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 3 mai 2004 ==</h2>

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