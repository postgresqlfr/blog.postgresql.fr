---
layout: post
title: "PostgreSQL Weekly News - 9 février 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-351 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 9 février 2004 ==</h2>

<p>Il n'y a pas eu trop de changements sur le code cette semaine mais cela

n'a pas empêché un gros travail. Il y a eu un certain nombre de mises à jour

pour des fonctionnalités proposées pour la version 7.5 mais commençons par jeter

un oeil sur la liste des modifications réalisées sur le code cette semaine.

Quelques informations codées en dur dans information_schema ont été remplacé

avec une fonction générant des séries numériques en utilisant une variable

indiquant la valeur de l'incrément. Les options GUC sort_mem et vacuum_mem ont

été renommé respectivement work_mem et maintenance_work_mem pour mieux

refléter leur utilisation par le moteur et, coïncidant avec ce changement, la

création d'un index btree et la validation initiale d'une clé étrangère ont été

modifié pour utiliser maintenance_work_mem. Enfin, un peu de code concernant

une nouvelle fonctionnalité, un délai du vacuum basé sur le coût, a été

implémenté.

</p>

<p>Nous avons aussi vu un peu de nettoyage sur la gestion du signal pour la

partie win32 avec la suppression des définitions dupliquées de signal dans

pqsignal.h, remplaçant pqkill() avec kill() et redéfinissant kill() dans Win32,

en utilisant ereport() au lieu de fprintf() dans certaines gestions d'erreurs de

pqsignal.c, exportant pg_queue_signal() et en faisant usage lorsque nécessaire,

ajoutant un gestionnaire de contrôle de console pour Ctrl-C ainsi que d'autres

gestions similaires dans le code Win32 et implémentant un

WaitForSingleObjectEx() dans CHECK_FOR_INTERRUPTS() pour Win32, ce qui devrait

nous donner une implémentation fonctionnelle de l'annulation de requêtes pour

les plateformes Win32.</p>

<p>Des discussions sur " Point-In-Time-Recovery " ont redémarré, dont le

résultat a été la mise en place d'infrastructures supplémentaires pour ce

sous-projet. Si vous êtes intéressé pour aider ce développement, une liste de

diffusion pgsql-hackers-pitr vient d'être créée et Bruce Momjian a créé une page

de statut sur ce projet. Elle est disponible sur

<a href="http://candle.pha.pa.us/main/writings/pgsql/project/pitr.html">http://candle.pha.pa.us/main/writings/pgsql/project/pitr.html</a>.

Nous avons aussi assisté à quelques progrès sur le COMMIT en deux phases avec

l'envoi par Heikki Linnakangas d'un correctif ajoutant un support simple de

celui-ci. Tous les détails sont disponibles sur

<a href="http://archives.postgresql.org/pgsql-hackers/2004-02/msg00261.php">http://archives.postgresql.org/pgsql-hackers/2004-02/msg00261.php</a>.

Tout le monde est encouragé pour tester le correctif et pour apporter leur retour

d'informations.</p>

<!--more-->


<h2>== Nouvelles des produits PostgreSQL ==</h2>

<ul>

<li>Photo Organizer (blog)<br />

<a href="http://www.pulpblog.com/archives/2004/02/04/photo-organizer/">http://www.pulpblog.com/archives/2004/02/04/photo-organizer/</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>e-thepeople considering switch to PostgreSQL<br />

<a href="http://www.e-thepeople.org/article/29342/view">http://www.e-thepeople.org/article/29342/view</a></li>

<li>Open-Source DBs Go Big Time<br />

<a href="http://www.intelligententerprise.com/showArticle.jhtml?articleID=17601165&amp;pgno=2">http://www.intelligententerprise.com/showArticle.jhtml?articleID=17601165&amp;pgno=2</a></li>

<li>Marginalizing Windows: running a business on Mac OS X and Linux<br />

<a href="http://www.macdailynews.com/comments.php?id=P2112_0_1_0">http://www.macdailynews.com/comments.php?id=P2112_0_1_0</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a>

</li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 9 février 2004 ==</h2>

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