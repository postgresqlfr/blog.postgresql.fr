---
layout: post
title: "== PostgreSQL Weekly News - 12 mars 2006 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-167 "
---


<p>

Les informations sur les dates et lieu du sommet-anniversaire de PostgreSQL (<em>«&nbsp;The PostgreSQL Anniversary Summit&nbsp;»</em>) sont à présent en ligne: <a href="http://conference.postgresql.org" target="_blank">http://conference.postgresql.org</a>. Nous cherchons des sponsors: merci de lire la page qui y est consacré sur notre site si cela vous intéresse: <a href="http://conference.postgresql.org/Sponsors/" target="_blank">http://conference.postgresql.org/Sponsors/</a>.

</p>

<p>

LinuxWorld à Boston a besoin de volontaires pour s'occuper du stand

PostgreSQL pour la partie associative (.org) du salon et les

conférences. Vous pouvez nous aider d'une après-midi à trois jours.

Aucune connaissance particulière n'est requise. Merci de contacter Josh

Drake sur <a href="mailto:jd@commandprompt.com">son e.mail</a>.</p>

<p>

Jonah Harris a suggéré l'implémentation des synonymes, qui sont comme

des liens symboliques pour les objets de base de données, dans

PostgreSQL. Bien que les synonymes ne fassent pas partie du standard

SQL, ils sont communs dans bien d'autres SGBD. La discussion sur les

permissions et la syntaxe continue.</p>

<p>

De son côté, Bernd Hemle a soumis un premier patch pour les vues

modifiables conformes SQL92. Vu l'intérêt suscité par ce patch, il

semble certain qu'il soit intégré à la version 8.2. D'autres

programmeurs éditent en effet ce patch.</p>

<p>

Dans la version CVS TIP, PL/Perl possède à présent les requêtes

préparées. Grâce à Dmitry Karasic pour le patch et Andrew Dunstan qui

l'a rendu conforme aux normes de codage de PostgreSQL.</p>

<p>

Il y a eu une discussion enflammée sur l'amélioration des performances

du processus de vacuum et l'utilisation de l'espace libre. Bien qu'il

s'agisse d'un vieux sujet récurrent sur le listes, les idées ont une

fois de plus toutes été exposées. Quelques-unes se sont transformées en

item de la <a href="http://www.postgresql.org/docs/faqs.TODO.html" target="_blank">TODOlist</a>, alors que d'autres sont restées dans l'état "impossible" et/ou "sans intérêt".</p>

<p>

La proposition de Tom Lane pour les améliorations sur les fonctionalités de tri et fusion (<em><ins>NDT:</ins>Il s'agit d'un algorithme de tri, de D. E. Knuth (toujours lui!): <a href="http://fr.wikipedia.org/wiki/Tri_fusion" target="_blank">http://fr.wikipedia.org/wiki/Tri_fusion</a></em>), pour un nombre conséquent de "bandes" (<em><ins>NDT:</ins>: voir <a href="http://en.wikipedia.org/wiki/Merge_sort#Merge_sorting_tape_drives" target="_blank">cet article</a> de Wikipédia en anglais pour un aperçu du principe</em>),

qui utilise pour l'instant une fusion polyphasique standard, a suscitée

une discussion animée et conséquente. D'autres idées sont venues et ont

montré les prochaines étapes...</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>

Sortie d'EMS DB Comparer:

<a href="http://www.sqlmanager.net/products/postgresql/dbcomparer/" target="_blank">http://www.sqlmanager.net/products/postgresql/dbcomparer/</a>

</p>

<p>

Continuent va présenter un "webinaire" sur la haute disponibilité et le clustering pour PostgreSQL:

<a href="http://continuent.webex.com" target="_blank">http://continuent.webex.com</a>

</p>

<p>

La version 2.23 de Charonware Case Studio est compatible avec PostgreSQL désormais:

<a href="http://www.casestudio.com/enu/ver223.aspx" target="_blank"> http://www.casestudio.com/enu/ver223.aspx</a>

</p>

<p>

La version 1.4.2 de pgAdmin3 est sortie et corrige de nombreux bugs:

<a href="http://www.pgadmin.org/" target="_blank">http://www.pgadmin.org/</a>

</p>

<p>

TurboDbAdmin est compatible avec PostgreSQL désormais:

<a href="http://turboajax.com/turbodbadmin.html" target="_blank"> http://turboajax.com/turbodbadmin.html</a>

</p>

<p>

La version 1.0.5 de Microolap Database Designer pour PostgreSQL 1.0.5 est sortie:

<a href="http://microolap.com/products/database/postgresql-designer/" target="_blank"> http://microolap.com/products/database/postgresql-designer/</a>

</p>

<h3>== PostgreSQL près de chez vous ==</h3>

<p>

Elein Mustain, Directrice de Varlena LLC, donnera une conférence au «&nbsp;East Bay Linux Users Group&nbsp;» (CANADA). La conférence aura lieu à 17h le 19 avril. L'adresse est «&nbsp;Hurricane Electric 760 Mission Court, Fremont, CA 94539&nbsp;».

<a href="http://www.varlena.com/" target="_blank">http://www.varlena.com/</a>

<a href="http://www.eblug.org/" target="_blank">http://www.eblug.org/</a>

</p>

<p>

Le groupe allemand des utilisateurs de PostgreSQL on tenu un stand et un atelier aux «&nbsp;Linux Days&nbsp;» à Chemnitz en Allemagne. Les documents de l'atelier sont disponibles sur <a href="http://www.pgug.de/events/events.php" target="_blank">http://www.pgug.de/events/events.php</a>.

</p>

<p>

Les 17 et 18 février 2006, le groupe des utilisateurs japonnais de PostgreSQL a organisé la Conférence PostgreSQL 2006 à Tokyo. Les deux journées ont inclus une variété de présentations de plusieurs membres de la communauté PostgreSQL, tant nippons qu'étrangers.

</p>

<p>

De plus, ce groupe c'est transformé en une organisation à but non lucratif le 20 décembre 2005 (<em><ins>NDT:</ins> tout comme notre association PostgreSQLFr (Loi 1901). Il existe désormais une association de ce type par pays, ou presque. La dernière création de ce type étant celle du groupe d'utilisateurs allemands à ce jour.</em>). Cela résout des problèmes logistiques ou légaux comme la possession d'un compte bancaire ou la propriété des noms.

</p>

<h3>== PostgreSQL dans les news ==</h3>

<p>

Planet PostgreSQL: <a href="http://www.planetpostgresql.org/" target="_blank">http://www.planetpostgresql.org/</a>

</p>

<p>

General Bits, publié les lundi: <a href="http://www.varlena.com/GeneralBits/" target="_blank">http://www.varlena.com/GeneralBits/</a>

</p>

<p>

PostgreSQL Weekly News a été rédigé cette semaine par David Fetter, Josh Berkus, Andrew Dunstan, Michael (grzm) Glaesemann, Andreas (ads) Scherbaum et Volkan (knt) Yazici. <em>Traduit de l'anglais et commenté par Jean-Paul Argudo.</em></p>