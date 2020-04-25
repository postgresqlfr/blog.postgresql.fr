---
layout: post
title: "Debian Sarge, PostgreSQL 8.1, XID Wraparound et Single User Mode"
author: "jca"
categories: [Articles]
redirect_from: "index.php?post/drupal/199"
---


<p></p>

<!--more-->


<p>

J'utilise une distribution GNU/Linux Debian Sarge avec un backport officiel de PostgreSQL 8.1 sur un serveur de test. Tout fonctionnait à merveille jusqu'au jour où la connexion <tt>psql</tt> m'a été refusée. La justification de l'impossibilité de connexion était relative à un XID Wraparound, comprendre un rebouclage des identifiants de transactions, par suite de manque de vacuum full sur deux bases. Ayant déjà été confronté au <a href="http://www.postgresqlfr.org/?q=node/49" target="_blank">problème par le passé</a>, je me suis donc rué sur la procédure que j'avais tantôt décrite...

</p>

<p>Quelle ne fut pas ma surprise lorsque je vis que mon <tt>PGDATA=/etc/postgresql/8.1/main postgres -O -P ma_base</tt> ne fonctionnait pas.... Après plusieurs tentatives, recherches et essais, il fallait modifier certains paramètres dans le fichier  <tt>/etc/postgresql/8.1/main/postgresql.conf</tt>. Voici donc la liste de varibales de configuration à modifier :

</p>

<ol>

<li>Forcer le répertoire de données <tt>data_directory = '/var/lib/postgresql/8.1/main/'</tt></li>

<li>Forcer le répertoire de dépot du fichier pid : <tt>external_pid_file = '/var/run/postgresql/postmaster.pid'</tt>

</li>

</ol>

Une fois ces variables modifiées, la commande <tt>PGDATA=/etc/postgresql/8.1/main postgres -O -P ma_base</tt> a fonctionné, j'ai pu exécuter mes VACUUM FULL ANALYZE sur mes deux bases et reprendre le travail.

<p><em>Notez que ces modifications n'altèrent en rien le fonctionnement serveur de PostgreSQL 8.1 (backport) en Debian Sarge et que le service peut être relancé directement après l'opération « single user »</em></p>