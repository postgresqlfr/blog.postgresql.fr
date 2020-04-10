---
layout: post
title: "Nouvelles versions mineures (8.3.3, 8.2.9...)"
author: "SAS"
redirect_from: "index.php?post/drupal-296 "
---



<p>

Des mises à jours pour toutes les versions maintenues sont disponibles à partir d'aujourd'hui&nbsp;:

8.3.3, 8.2.9, 8.1.13, 8.0.17 et 7.4.21. Ces versions corrigent plus d'une vingtaine de bogues mineurs découverts et retouchés ces derniers mois.

</p>

<p>

Il est préférable, comme toujours, de prévoir une mise à jour rapide de vos serveurs.

L'urgence est encore plus grande pour les utilisateurs de bases encodées en UTF-8 sous Windows et les personnes concernées par des problèmes de fuseaux horaires.

</p>

<p>

Parmi les bogues corrigés, on peut citer&nbsp;:

</p>

<ulist>

<item>- des plantages par discordance d'encodage sous Windows&nbsp;;</item>

<item>- des plantages lors de la décompression de données corrompues&nbsp;;</item>

<item>- une mauvaise optimisation de certaines requêtes paramétrées&nbsp;;</item>

<item>- des mises à jour des fuseaux horaires&nbsp;;</item>

<item>- des corruption de mémoire par SIGTERM&nbsp;;</item>

<item>- l'emballement des verrous LWLocks avec les index GIN&nbsp;;</item>

<item>- plusieurs autres...</item>

</ulist>

<p>

La lecture des notes de version vous permettra de savoir si vous êtes concernés par l'un des bogues corrigés.</p>

<p>

Comme toujours avec les corrections mineures, il n'est pas nécessaire de procéder à un export/reimport des bases pour appliquer les correctifs. Il suffit d'actualiser les binaires.

</p>

<p>

Lors de l'actualisation de plusieurs versions mineures d'un coup, il est impératif de consulter les notes de version pour connaître les éventuelles étapes supplémentaires, post-mise-à-jour.

</p>

<p>

Comme cela a déjà été annoncé, seules les versions 8.2.9 et 8.3.3 des binaires Windows sont disponibles, le support des versions 8.0 et 8.1 sur cette plateforme ayant été arrêté.

</p>

<p>

Notes de version&nbsp;:

<a href="http://www.postgresql.org/docs/8.3/static/release.html">http://www.postgresql.org/docs/8.3/static/release.html</a>

</p>

<p>

Code source&nbsp;:

<a href="http://www.postgresql.org/ftp/source">http://www.postgresql.org/ftp/source</a>

</p>

<p>

Binaires&nbsp;:

<a href="http://www.postgresql.org/ftp/binary">http://www.postgresql.org/ftp/binary</a>

</p>

<p>

<strong>Important :</strong>

Une version a été ignorée parce qu'un bogue a été découvert dans les paquetages de mise-à-jour. Même si ces derniers n'avaient pas été officiellement annoncés, ils étaient disponibles depuis quelques jours sur les serveurs FTP.

Si vous aviez téléchargé l'une des versions 8.3.2, 8.2.8, 8.1.12, 8.0.16 ou 7.4.20, il est impératif de la remplacer le plus vite possible.

</p>