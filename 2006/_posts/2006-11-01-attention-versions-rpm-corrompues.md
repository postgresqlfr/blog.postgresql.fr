---
layout: post
title: "ATTENTION : Versions RPM corrompues"
author: "SAS"
redirect_from: "index.php?post/drupal-212 "
---



<p>

Devrim Gunduz a annoncé ce jour&nbsp;:

</p>

<p>

Du fait d'un très grand nombre de bogues dans les RPM de la version 8.1.5, il faut arrêter d'utiliser ces RPM, surtout pour des installations nouvelles.

</p>

<p>

Nous avons réalisé 4 versions de maintenance après la 8.1.5-1, mais le rapport de bogues émis par NTT et reçu ce jour contenait tous les bogues recensés précédemment.

</p>

<p>

De fait, les RPM de 8.1.5-1 à 8.1.5-5 sont corrompus. Je viens de commité un correctif pour le bogue récent, néanmoins, nous ne construirons la 8.1.5-6 que lorsque nous serons certains que nous n'avons plus de problème de conditionnement.

</p>

<p>

Il est important de noter que ce problème <strong>n'est pas</strong> un problème PostgreSQL, mais bien un problème de conditionnement, essentiellement des errerus de spécification de fichiers.

</p>

<p>

Le PostgreSQL RPM Building Project fera une nouvelle annonce lorsque tous les binaires auront été vérifiés et revérifiés, encore et encore...

</p>