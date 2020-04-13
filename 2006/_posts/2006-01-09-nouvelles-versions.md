---
layout: post
title: "Nouvelles versions"
author: "SAS"
redirect_from: "index.php?post/drupal-149 "
---


<p></p>

<!--more-->


<p>

Les versions patchées 8.1.2, 8.0.6, 7.4.11 et 7.3.13 sont disponibles. Les correctifs des branches 8.0 et 8.1 sont critiques, en particulier pour les utilisateurs de Windows. Il est recommandé d'effectuer les mises à jour le plus rapidement possible.

</p>

<p>

Un des correctifs critiques répare une vulnérabilité de «&nbsp;déni de service&nbsp;». Sur les seules versions Windows, le postmaster s'arrête lorsqu'il y a trop de demandes de connexions simultanées. Cela n'affecte en rien les connexions existantes, mais interdit les nouvelles connexions jusqu'au redémarrage du postmaster. Le projet «&nbsp;Common Vulnerabilities and Exposures (CVE)&nbsp;» a assigné le numéro CVE-2006-0105 à ce problème.

</p>

<p>

Un autre patch corrige une erreur dans ReadBuffer qui peut entraîner une perte de données par écrasement des pages récentes. Ce correctif s'applique aux branches 8.0 et 8.1 sur toutes les plateformes.

</p>

<p>

Parmi les autres correctifs, on trouve :

</p>

<ul>

<li> un bogue de comparaison de chaines de caractères locale. Cela peut nécessiter  un REINDEX pour certaines locales, notamment le hongrois&nbsp;;

</li>

<li> la prévention d'un changement accidentel de locale par plperl&nbsp;;

</li>

<li> deux correctifs pour l'encodage japonais&nbsp;;

</li>

<li> deux correctifs pour COPY CSV&nbsp;;

</li>

<li> des correctifs pour les fonctions retournant un RECORD&nbsp;;

</li>

<li> des correctifs pour autovacuum, dblink et pgcrypto.

</li>

</ul>

<p>

De plus amples détails sont disponibles dans les notes de version de la documentation de chaque version, disponible sous peu sur postgresql.org et postgresqlfr.org.

</p>

<p>

Les versions 7.4.11 et 7.3.13 contiennent des sous-ensembles appropriés des correctifs précédents.

</p>

<p>

A l'heure actuelle, les sources sont disponibles pour toutes les versions. L'installeur Windows est disponibles pour les versions 8.1.2 et 8.0.6. Les versions binaires pour les autres plateformes seront rapidement disponibles à partir des pages de téléchargement <a href="http://www.postgresql.org/download" target="_blank">PostgreSQL</a>[1] et <a href="ftp://ftp.fr.postgresql.org/" target="_blank">PostgreSQLFr</a>[2].

</p>

<p>

Marc G. Fournier

PostgreSQL Core Member <em>pour la version originale</em>

</p>

<p>

Stéphane A. Schildknecht

<em>pour l'adaptation française</em>

</p>

[1] - http://www.postgresql.org/download

[2] - ftp://ftp.fr.postgresql.org/