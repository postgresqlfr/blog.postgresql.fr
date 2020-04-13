---
layout: post
title: "== Nouvelles hebdomadaires de PostgreSQL du 24 avril 2005 =="
author: "jca"
redirect_from: "index.php?post/drupal-92 "
---


<p><strong>== Nouvelles hebdomadaires de PostgreSQL du 24 avril 2005 ==</strong></p>

<p><em>Dans son mail sur la liste pg-announce, David Fetter nous disait : </em></p>

<p>

Beaucoup de discussions au sujet des brevets et de la position publique devant être adoptée par la communauté de PostgreSQL. La position adoptée est de rendre le logiciel de PostgreSQL vierge de tout brevet dans toutes ses versions. Concernant ce sujet, nous vous demandons de bien vouloir passer de la liste -www à la liste -advocacy qui est plus à propos.

</p>

<!--more-->


Tom Lane a ajouté le bitmapping des index classiques en mémoire, connu sous le nom de « bitmapscan ». Le but de cette innovation est de de permettre des opérations bitmap de jointure ou même d'avoir plusieurs conditions OR sur le même INDEX. Le résultat attendu est une amélioration importante des requêtes disposant de conditions complexes dans la clause WHERE, à condition de disposer de CPU rapides et de beaucoup de RAM. Toutefois, nous n'avons pas encore modifié le coût d'estimation du planificateur de requêtes pour les bitmapscans. Si cette fonctionnalité vous intéresse, nous vous conseillons de télécharger la version courante (snapshot) et de la tester en plaçant la variable enable_bitmapscan à « on » ou « off » et d'en reporter les résultats.

<p>

Veuillez cependant noter que cette fonctionnalité diffère totalement des index bitmap sur disque proposés par Victor Y. Yegorov dont le but est de permettre l'indexation d'attributs à faible cardinalité sur de grosses tables. Une fois mises en commun ces deux fonctionnalités devraient améliorer considérablement les performances pour les applications de type décisionnel ou « <em>business intelligence</em> »

</p>

<p>

Josh Berkus a reporté le fait que l'estimation de la cardinalité des index de PostgreSQL était relativement ancienne. Andrew Dunstan a proposé une solution se basant sur un papier de 2000.

</p>

<p><a href="http://www.stat.washington.edu/www/research/reports/1999/tr355.ps">http://www.stat.washington.edu/www/research/reports/1999/tr355.ps</a>

</p>

<p>

Si vous le souhaitez vous pouvez aider l'équipe en définissant l'estimation arithmétique pour le planificateur de requêtes et en fournissant un patch.

</p>

<p><strong>== Nouvelles des produits autour de PostgreSQL ==</strong></p>

<p>

OpenRPT est un système  d'écriture, de conception et de visualisation de rapports SQL graphique optimisé pour PostgreSQL. L'affichage WYSIWYG est développé au sein d'une interface graphique sous Qt fonctionnant sous Linux, Windows et Mac OS X. Un moteur de rendu côté serveur est également disponible. Les rapports peuvent être sauvegardés en XML soit sous firme de fichiers soit dans la base de données.

<a href="http://pgfoundry.org/projects/openrpt/">http://pgfoundry.org/projects/openrpt/</a>

</p>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<p>

Dans un article sur linux.conf.au Neil Conway donné des explications sur l'optimiseur.<br />

<a href="http://linux.conf.au/abstract.php?id=147">http://linux.conf.au/abstract.php?id=147</a>

<br />La présentation est disponible sur :<a href="http://neilc.treehou.se/optimizer.pdf">http://neilc.treehou.se/optimizer.pdf</a>

</p>

<p>

General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a> « Vérités, vérités bénies et stat_* »

</p>