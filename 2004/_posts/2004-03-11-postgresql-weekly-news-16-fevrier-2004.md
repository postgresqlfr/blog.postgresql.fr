---
layout: post
title: "PostgreSQL Weekly News - 16 février 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/353"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 16 février 2004 ==</h2>

<p>Une autre semaine est passée avec plein d'actions concernant le développement

de PostgreSQL. Ce travail inclut un bon nombre de nettoyages des récentes

modifications, un peu sur les nouvelles fonctionnalités et un minimum de

corrections de bogues ; mais assez de généralisation, allons-y.<!--break-->

</p>

<p>Tom Lane a terminé la restructuration du gestionnaire de stockage,

en épurant l'API et en améliorant l'efficacité. L'implémentation du code de

délai a été centralisé avec la sous-routine pg_usleep() et le correctif du délai

basé sur le coût du vacuum a été étendu pour s'appliquer aux VACUUM FULL, VACUUM

ANALYZE et aux vacuum associés aux index, à l'exception des btree. Plusieurs

opérateurs de comparaison intertypes (date et timestamp et timestamptz)

devraient permettre l'utilisation d'index d'expression comme

colonne_date &gt;= date 'today' - interval '1 month'. Nous récupérons aussi des

statistiques sur les indexs d'expression via ANALYZE bien que du travail reste à

faire pour faire en sorte que le plannificateur les utilise. Enfin, un bogue

empêchant le verrouillage des threads et l'utilisation des fonctions *_r a été

corrigé dans ecpg et devrait faire partie de la prochaine sortie d'une version

7.4.</p>

<p>Nous avons aussi assisté à quelques mouvements sur PITR cette semaine.

Un enregistrement d'entête a été ajouté dans chaque fichier WAL pour permettre

une identification fiable. Nous évitons maintenant de séparer les

enregistrements WAL entre plusieurs fichiers segment et nous faisons maintenant

des entrées WAL pour chaque création, suppression, troncage de fichier. Ce

travail devrait fournir les bases de la construction d'une réelle implémentation

de PITR, dont la discussion continue sur la liste de diffusion pgsql-hackers-pitr.</p>

<p>Dernier point sur notre liste cette semaine est la sortie d'une version

PDF du manuel PostgreSQL. Merci à Kris Jurka qui a pris le temps de réussir

cette compilation, vous pouvez en obtenir une copie sur

<a href="http://www.postgresql.org/docs/">http://www.postgresql.org/docs/</a>.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Dot-nz software open-sourced<br />

<a href="http://www.computerworld.co.nz/news.nsf/UNID/65C5AC505A9AF792CC256E370074C27B?OpenDocument">http://www.computerworld.co.nz/news.nsf/UNID/65C5AC505A9AF792CC256E370074C27B?OpenDocument</a></li>

<li>PostgreSQL-relay 1.2 (Default) Released<br />

<a href="http://freshmeat.net/projects/postgresql-relay/?branch_id=47849&amp;release_id=151148">http://freshmeat.net/projects/postgresql-relay/?branch_id=47849&amp;release_id=151148</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>The Proximity Principle - Stay close to your data<br />

<a href="http://www.sys-con.com/coldfusion/articlenews.cfm?id=707">http://www.sys-con.com/coldfusion/articlenews.cfm?id=707</a></li>

<li>AMD64 now supported by more than 1000 OEM/Software/Hardware vendors<br />

<a href="http://www.amd.com/us-en/Corporate/VirtualPressRoom/0,,51_104_543%7E82342,00.html">http://www.amd.com/us-en/Corporate/VirtualPressRoom/0,,51_104_543~82342,00.html</a></li>

<li>Defect-Tracking Tools: Price Vs. Performance<br />

<a href="http://sdtimes.com/news/096/special1.htm">http://sdtimes.com/news/096/special1.htm</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 16 février 2004 ==</h2>

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