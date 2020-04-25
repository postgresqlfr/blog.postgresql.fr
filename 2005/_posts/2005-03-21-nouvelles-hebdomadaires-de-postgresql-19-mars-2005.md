---
layout: post
title: "Nouvelles hebdomadaires de PostgreSQL - 19 mars 2005"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/86"
---


<p></p>

<!--more-->


Le 19 mars 2005, David Fetter écrivait&nbsp;:<br /><br /><strong>== PostgreSQL Weekly News - March 19 2005 ==</strong><br /><br />Mark Rae a effectué des tests de montée en charge <acronym title="Symetric Multi Processing">SMP</acronym> pour PostgreSQL et estime que le <tt>CVS</tt> contient une amélioration de la version 8.0.1.

Les détails sont contenus dans ce <em>thread</em> :

<a href="http://archives.postgresql.org/pgsql-general/2005-03/msg00837.php">http://archives.postgresql.org/pgsql-general/2005-03/msg00837.php</a>

Christopher Kings-Lynne a développé un ensemble de nouvelles fonctions d'accès <tt>PHP</tt> pour PostgreSQL de manière à supporter notre protocole v3, ce qui devrait améliorer les performances de PostgreSQL-PHP. Il y avait une petite pierre d'achoppement légale avec l'obligation de réécrire certaines parties de la licence de la documentation PostgreSQL pour les conformer à celle de <tt>PHP</tt>, mais c'est maintenant résolu.

Satoshi Nagayasu est volontaire pour travailler sur la partie «&nbsp;Read-Only Database&nbsp;» de la TODO liste.

Il y a eu un développement sur la façon d'invalider les plans de requêtes cachés qui ont dépassé leur utilité. Le résultat de ce développement est la proposition de Neil Conway de travailler sur une révision du planificateur de requête qui stockerait son plan d'une manière interférant moins sur notre cache de plans&nbsp;; quoiqu'il en soit l'architecture exacte de tout cela n'est pas encore définie.

Magnus Hagander a écrit un ajout au site web pour stocker en base la liste des PostgreSQL Consultants (<a href="http://techdocs.postgresql.org/companies.php"> http://techdocs.postgresql.org/companies.php</a>) et l'intégrer au site principal.

Cela devrait être disponible dans quelques semaines. Si votre compagnie effectue du conseil autour de PostgreSQL, envoyez un mail à <a href="mailto:josh@postgresql.org"> josh at postgresql dot org</a> pour toute mise-à-jour de vos informations sur la page de références.

Le développement d'un driver <acronym title="Object Link Embedding - DataBase">OLE-DB</acronym> pour PostgreSQL disposant de toutes les fonctionnalités avance à grands pas, grâce à Shachar Shemesh.

Merlin Moncure à proposé un <em>patch</em> pour masquer dans la table <tt>pg_proc</tt> le code source des fonctions aux utilisateurs dépourvus de privilèges. Tom Lane s'est opposé à ce <em>patch</em> (<em>patch</em> rejeté, en fait) parce qu'il estime la solution incomplète. L'idée est repartie sur les planches à dessin pour une meilleure mise en œuvre.

Tom Lane a découvert que le <em>patch</em> à <tt>pg_was</tt> qu'il a ajouté à la version 8.0 pour détecter les situation de verrous de fichier morts au démarrage était insuffisant. Ce <em>patch</em> est en cours de réécriture.

Michael Fuhr a découvert la remarque occulte suivante dans notre code source&nbsp;:

<pre>    From src/backend/tcop/postgres.c:<br />     /* they only drink coffee at dec */</pre>

Si vous savez ce que ce commentaire signifie, merci d'envoyer un mail à <a href="mailto:david@fetter.org">david at fetter dot org</a>. Nous publierons vos explications la semaine prochaine.

Tom Lane a proposé une implémentation d'une fonctionnalité de «&nbsp;Local Buffers&nbsp;» pour permettre l'allocation de <em>buffers</em> par utilisateur pour contenir spécifiquement les tables temporaires.

La liste de diffusion <tt>pgsql-performance</tt> a été l'objet d'une importante discussion sur le modèle des paramètres du planificateur de requêtes, la façon de lire un plan de requête, et l'estimation des coûts corrélés pour les index multi-colonnes.

<acronym title="Weekly Windows Port Issue">WWPI</acronym> (NDT&nbsp;: Publication Hebdomadaire du Portage vers Windows)&nbsp;:

Andrew Dunstan a signalé que <tt>contrib/pg_buffercache</tt> est apparemment cassé sous Windows. Un <em>patch</em> a été posté à cet effet, mais n'a toujours pas été testé/ajouté.

Adrian Nida a écrit un document sur l'authentification <acronym title="Pluggable Authentication Modules">PAM</acronym> pour PostgreSQL.

<a href="http://itc.musc.edu/wiki/PostgreSQL">http://itc.musc.edu/wiki/PostgreSQL</a>

<br /><br /><strong>== PostgreSQL Product News ==</strong><br /><br />Bricolage 1.8.5 est sorti.

<a href="http://www.bricolage.cc/news/announce/changes/bricolage-1.8.5/"> http://www.bricolage.cc/news/announce/changes/bricolage-1.8.5/</a>

pgExpress Driver v3.0 realisé.

<a href="http://www.vitavoom.com/Products/pgExpress_Driver/index.html">http://www.vitavoom.com/Products/pgExpress_Driver/index.html

</a>

Le PostgreSQL RPM Building Project a annoncé de nouveaux RPMS pour de nombreuses plateformes. On trouve ainsi les RPMs SuSE sur les sites FTP de PostgreSQL et leurs mirroirs.

<a href="http://pgblog.gunduz.org/index.php?entry=entry050311-105840">http://pgblog.gunduz.org/index.php?entry=entry050311-105840

</a>

DataKiosk 0.6 réalisé.  DataKiosk est une interface JuK-like pour les bases de données SQL génériques.

<a href="http://www.issociate.de/board/post/188936/dataKiosk_0.6_released.html">http://www.issociate.de/board/post/188936/dataKiosk_0.6_released.html

</a>

EMS PostgreSQL Data Pump, DB Comparer et Extract réalisés.

<a href="http://www.postgresql.org/about/news.296">http://www.postgresql.org/about/news.296

</a>

Oryx Mailstore 0.92 est un serveur d'archivage de courriels qui utilise PostgreSQL.

Voir <a href="http://www.oryx.com/mailstore/0.92.html">http://www.oryx.com/mailstore/0.92.html</a>

et

<a href="http://www.oryx.com/mailstore/overview.html">.../overview.html</a>

Microolap Technologies Ltd est fier d'annoncer la disponibilité de la version 2.0 de "PostgresDAC", composants Delphi et C++ Builder pour l'accès direct à PostgreSQL.

<a href="http://www.postgresql.org/about/news.295">http://www.postgresql.org/about/news.295</a>

Big Nerd Ranch propose une formation à PostgreSQL pendant la semaine du 18 au 22 avril. Leur formation exhaustive à PostgreSQL se tient dans un camp près d'Atlanta, GA.

<a href="http://www.bignerdranch.com/classes/postgresql.shtml">http://www.bignerdranch.com/classes/postgresql.shtml</a><br /><br /><strong>== PostgreSQL in the News ==</strong><br /><br />Josh Berkus, Core member, a donné une interview à Mad Penguin sur l'adoption de PostgreSQL. J'en ai eu vent sur Slashdot.

<a href="http://madpenguin.org/cms/html/62/3677.html">http://madpenguin.org/cms/html/62/3677.html</a>

Cette semaine sur General Bits&nbsp;:  L'expérience avec Windows d'un Hacker Unix&nbsp;; Prévenir les mises à jour des clés&nbsp;; Résumé de la classification OpenSource de Josh Berkus.

<a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

Cette semaine, sur www.powerpostgreqsl.com&nbsp;: Josh Berkus classe les projets FLOSS.

<a href="http://www.powerpostgresql.com/5_Types">http://www.powerpostgresql.com/5_types</a>

Les nouvelles hebdomadaires de PostgreSQL vont ont été fournies cette semaine par Davidid Fetter, Josh

Berkus et Elein Mustain.