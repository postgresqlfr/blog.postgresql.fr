---
layout: post
title: "== PostgreSQL Weekly News - 11 Février 2005 =="
author: "jca"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/76"
---


<p><em>Dans son mail sur pg-announce du 11 Février David Fetter annonçait</em></p>

<p><strong>== PostgreSQL Weekly News - 11 Février 2005 ==</strong></p>

<p>

Tom Lane a proposé un moyen de corriger le problème du « context swap storm» (l'orage du changement de contexte).

<a href="http://archives.postgresql.org/pgsql-hackers/2005-02/msg00228.php">http://archives.postgresql.org/pgsql-hackers/2005-02/msg00228.php</a>

</p>

<p>PHP est en passe de disposer d'une couche d'accès pleinement fonctionnelle avec PHP/PDO. Les personnes intéressées peuvent le télécharger et jeter un oeil sur <a href="http://pecl.php.net/package/pdo">http://pecl.php.net/package/pdo</a>.

</p>

<p>Les fonctions d'entrées pour float4, float8 et oid rejettent

maintenant les chaines de caractères vides plutôt que de les traîter

comme des 0. Si votre application dépend du comportement précédemment

implanté, il est temps de la corriger.

</p>

<p>Les curseurs SPI supportent maintenant le parcours des

résultats de commandes utilitaires qui retournent des tuples. Nous

cherchons des outils permettant de rendre les résultats des EXPLAINs un

peu plus facile à lire.</p>

<p>Quatre (rares) dépassements de tampons supplémentaires ont été supprimé dans le parseur PL/PgSQL.</p>

<p>La documentation a été améliorée et clarifiée.</p>

<p>PGCluster a été déplacé sur pgfoundry.org</p>

<!--more-->


<strong>== Nouvelles des produits autour de PostgreSQL ==</strong>

<ul>

<li><strong>Version 2.5 de pgpool</strong> :<br /> Supporte maintenant la réplication maître-escalvve (comme celle de Slony-I).<br /><a href="http://pgpool.projects.postgresql.org/">http://pgpool.projects.postgresql.org/</a></li>

<li><strong>Version 1.0.1 de PLJava 1.0.1</strong> :<br /> PL/Java 1.0.1 est devenu un langage « trusted »/de confiance. Une version « untrusted » sortira à partir de la semaine prochaine.<br /><a href="http://gborg.postgresql.org/project/pljava">http://gborg.postgresql.org/project/pljava</a></li>

<li><strong>Version 1.3.0 libgda/libgnomedb</strong> :<br /> Libgda/libgnomedb est un framework complet permettant de développer des applications orientées bases de données.<br /> Page du projet : <a href="http://www.gnome-db.org/">http://www.gnome-db.org/</a><br />

Téléchargement : <a href="http://download.gnome.org/pub/GNOME/sources/libgda/1.3/">http://download.gnome.org/pub/GNOME/sources/libgda/1.3/</a> <br />et <a href="http://download.gnome.org/pub/GNOME/sources/libgnomedb/1.3/">http://download.gnome.org/pub/GNOME/sources/libgnomedb/1.3/</a></li>

<li><strong>Interactive SQL 2.0 for PostgreSQL est sorti</strong> :<br /><a href="http://www.microolap.com/products/database/pgisql/">http://www.microolap.com/products/database/pgisql/</a></li>

<li><strong>AquaFold, Inc a annoncé la disponibilité de  Aqua Data Studio 4.0</strong> :<br /> <a href="http://www.aquafold.com/features_4_0.html">http://www.aquafold.com/features_4_0.html</a></li>

</ul>

<p><strong>== PostgreSQL dans la presse ==</strong></p>

<p>

<em>Command Prompt Unveils Around the Clock PostgreSQL RDBMS Support</em><br />

PostgreSQL et les produits associés disposent maintenant d'un support 24/7. Les personnes intéressées peuvent aller sur <a href="http://www.commandprompt.com/">http://www.commandprompt.com</a>.</p>

<p><em>General Bits</em> sur <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a></p>

<p>La date de cloture des soumissions pour les conférences du O'Reilly Open Source Convention est le 13 février!<br />Prière de soumettre vos propositions rapidement. Ce serait une bonne idée de l'envoyer au sous commité PostgreSQL-OSCON en premier lieu, afin de vous signaler tout duplicata de conférence. Contactez <a href="mailto:josh%20at%20postgresql%20dot%20org%3EJosh%20Berkus%3C/a%3E.%3Cbr%3E%0AOSCON:%20%3Ca%20href=" http:="" conferences.oreillynet.com="" os2005="">http://conferences.oreillynet.com/os2005/</a></p>