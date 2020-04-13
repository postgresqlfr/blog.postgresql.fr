---
layout: post
title: "== PostgreSQL Weekly News - 4 Février 2005 =="
author: "jca"
redirect_from: "index.php?post/drupal-73 "
---


<p><em>Dans son mail sur pg-announce, David Fetter annonçait</em></p>

<p><strong>== PostgreSQL Weekly News - 4 Février 2005 ==</strong></p>

<p>

Versions de sécurité de PostgreSQL<br />

PostgreSQL 8.0.1, 7.4.7, 7.3.9 et 7.2.7 sont sortis cette semaine afin de corriger une vulnérabilité dans LOAD. Veuillez mettre à jour vos logiciels en cours de fonctionnement à cette dernière version dès que celà vous sera possible.

</p>

<p>Stephen Frost a soumis un patch jetant les bases de conception pour l'appartenance des objets de la base à des groupes avec l'idée sous-jacente d'implémenter la notion de rôles dans la base. Matthias Schmidt a demandé de l'aide pour définir une syntaxe permettant de définir des permission à tous les objets d'un schéma.

</p>

<p>

Victor Y. Yegorov et plusieurs autres personnes ont discuté de l'implémentation des index bitmaps.

</p>

<p>Josh Berkus a proposé d'étendre les vues systèmes pour couvrir

l'ensemble des objets de la base de données. D'autres ont poursuivi en

proposant des améliorations et des commentaires.

</p>

<p>Peter Eisentraut a mis en évidence un point d'incompatibilité entre

la version 8.0 et la version 7.4 de la libpq. Surveillez donc la liste

-hackers pour savoir comment ce point sera résolu.

</p>

<p>Le trés discuté code ARC se trouve maintenant dans freelist.c. Qu'il

soit modifié ou retiré, tout se trouve maintenant au même endroit.

</p>

<p>John Hansen a contributé en fournissant des patches afin de faire marcher upper() et lower() avec Unicode. Prière de tester.

</p>

<!--more-->


<strong>== Nouvelles des produits autour de PostgreSQL ==</strong>

<p>

Greg Sabino Mullane a commencé à travailler sur une fonctionctionnalité  "last_ID" pour DBD::Pg.  Ceci devrait faciliter l'écriture d'applications et le portage d'applications en provenance d'autre systèmes de stockage.

</p>

<p>

theKompany.com a sorti la version 1.4 de dbRadar

<a href="http://www.thekompany.com/products/dbradar/">http://www.thekompany.com/products/dbradar/</a>

comprenant la coloration syntaxique pour PL/PgSQL.

</p>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<p>

Nous souhaiterions rappeler aux membres Européens de la communauté PostgreSQL de contacter leur députés et d'exprimer leur désapprobation concernant les brevets logiciels. La deuxième phase d'audition sur le sujet. Un point pouvant apporter du poids à l'argumentation est tout témoignage de sociétés décrivant comment les brevets logiciels perturbent leurs activiés. Regardez sur <a href="http://www.nosoftwarepatents.com/">http://www.nosoftwarepatents.com/</a>

au cas où vous ne seriez pas informé de ce type d'enjeux.</p>

<p>

Les professionnels de la justice en NSW auront bientôt accès aux support de référence de la court de justice de NSW via le nouveau système de recherche d'information juridique (Judicial Information Research System (JIRS)) qui est une application développé entièrement en interne avec un système utilisant Linux, Apache PostgreSQL et PHP (LAPP).

<a href="http://www.linuxworld.com.au/index.php/id;631120522;fp;4;fpid;3">http://www.linuxworld.com.au/index.php/id;631120522;fp;4;fpid;3</a>

</p>

<p>

General Bits: <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>

La date de cloture pour les conférences à l' O'Reilly Open Source Convention talks est le 13 février! Prière de soumettre vos propositions trés rapidement. Ce serait une bonne idée de transmettre votre propositions au sous-comité PostgreSQL-OSCON en premier lieu, afin d'éviter les doublons. Contactez  <a href="mailto:josh@postgresql.org">josh@postgresql.org</a>.<br />

OSCON: <a href="http://conferences.oreillynet.com/os2005/">http://conferences.oreillynet.com/os2005/</a>

</p>