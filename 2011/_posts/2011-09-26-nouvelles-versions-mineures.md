---
layout: post
title: "Nouvelles versions mineures"
author: "sas"
redirect_from: "index.php?post/2011-09-26-nouvelles-versions-mineures "
---




<!--more-->


<p>

Le PostgreSQL Global Development Group publie aujourd'hui des mises à jour pour toutes les branches actives du SGBD PostgreSQL. Les versions ainsi publiées sont les versions numérotées 9.1.1, 9.0.5, 8.4.9, 8.3.16 et 8.2.22.

Il est recommandé aux utilisateurs de mettre à jour leurs serveurs dès le prochain arrêt prévu des instances PostgreSQL.

</p>

<p>La communauté PostgreSQL arrêtera le support de la version 8.2 en fin d'année. Il est important que les utilisateurs de cette version prévoit une migration rapide vers les versions maintenue.

Voir à ce propos la page (en anglais) concernant <a href="http://wiki.postgresql.org/wiki/PostgreSQL_Release_Support_Policy">la politique de support des versions</a>.

</p>

<p>

Cette version corrige une longue liste de bogues, dont plusieurs concernent de possibles corruptions de données ou crash. on peut citer&nbsp;:

</p>

<ul>

<li> Correctif de contrib/pg_crypto du bogue sur les caractères signées avec blowfish (CVE-2011-2483), dont le code de chiffrement peut donner des résultats erronés sur les plateformes où les caractères sont signés (la plupart), rendant les mots de passe chiffrés moins robustes qu'attendu&nbsp;;</li>

<li> un palliatif du bogue gcc 4.6.0 qui casse la relecture des WAL&nbsp;; </li>

<li> correctif de la perte mémoire en fin de parcours d'index GiST&nbsp;;</li>

<li> amélioration de la gestion des erreurs SSL&nbsp;;</li>

<li> correction du login SSPI lorsque plusieurs aller-retours sont nécessaires (l'erreur habituellement remontée était «&nbsp;La fonction demandée n'est pas supportée&nbsp;»)&nbsp;; </li>

<li> correction du VACUUM de sorte qu'il actualise systématiquement pg_class.reltuples et pg_class.relpages&nbsp;; </li>

<li> le planificateur peut désormais assumer que les tables parent vides sont réellement vides&nbsp;;</li>

<li> interdication des SELECT FOR UPDATE/SHARE sur les séquences&nbsp;; </li>

<li> correction des erreurs lorsque DROP OWNED BY tente de supprimer les privilèges par défaut sur les séquences. </li>

</ul>

<p>

Cette version inclut 11 correctifs sur la branche <a href="http://www.postgresql.org/docs/9.1/static/release-9-1-1.html">9.1</a>, 147 sur la branche <a href="http://www.postgresql.org/docs/9.1/static/release-9-0-5.html">9.0</a>, 96 sur la branche <a href="http://www.postgresql.org/docs/9.1/static/release-8-4-9.html">8.4</a>, 73 sur la branche <a href="http://www.postgresql.org/docs/9.1/static/release-8-3-16.html">8.3</a> et 52 sur la branche <a href="http://www.postgresql.org/docs/9.1/static/release-8-2-22.html">8.2</a>.

</p>

<p>

Les notes de version spécifiques présente l'intégralité des modifications de chaque branche.

Comme pour les autres versions mineures, il n'est pas nécessaire d'exporter et importer la base pour appliquer le correctif. Il suffit d'arrêter PostgreSQL, et d'actualiser les bianires. Lorsque plusieurs niveau de mises-à-jour sont effectués simultanément, il convient de vérifier les notes de version pour les éventuels post-traitements.

</p>

Liens utiles&nbsp;:

<ul>

<li> <a href="http://www.postgresql.org/about/news.1355">Version officielle</a></li>

<li> <a href="http://www.postgresql.org/download">Téléchargement</a></li>

<li> <a href="http://www.postgresql.org/ftp/source/">Code source</a></li>

<li> <a href="http://www.postgresql.org/ftp/binary/">Paquets binaires</a></li>

<li> <a href="http://www.enterprisedb.com/products/pgdownload.do">Installeur One-click</a></li>

<li> <a href="http://www.postgresql.org/docs/9.1/static/release-9-1-1.html">Version 9.1</a></li>

<li> <a href="http://www.postgresql.org/docs/9.1/static/release-9-0-5.html">Version 9.0</a></li>

<li> <a href="http://www.postgresql.org/docs/9.1/static/release-8-4-9.html">Version 8.4</a></li>

<li> <a href="http://www.postgresql.org/docs/9.1/static/release-8-3-16.html">Version 8.3</a></li>

<li> <a href="http://www.postgresql.org/docs/9.1/static/release-8-2-22.html">Version 8.2</a></li>

</ul>