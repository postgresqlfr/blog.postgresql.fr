---
layout: post
title: "== PostgreSQL Weekly News - 11 octobre 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-40 "
---


<p>Le 11 octobre 2004, Robert Treat écrivait sur la liste pgsql-announce:</p>

<p>

Encore une semaine de passée, qui nous rapproche de la sortie de la

version v.8.0, et pendant laquelle nous avons encore eu un bon nombre de report de bugs. Nous sommes encore un peu loin d'une nouvelle version béta, mais souvenez-vous que vous pouvez toujours vérifier l'avancement de la béta sur <a href="http://candle.pha.pa.us/cgi-bin/pgopenitems">

http://candle.pha.pa.us/cgi-bin/pgopenitems</a>.

</p>

<p>

Nous avons tout particulièrement corrigé un grand nombre de bugs sur la version win32, rapportés par un bon nombre de personnes qui nous aident à tester cette nouvelle version. Plusieurs DEFINE Win32 ont étés convertis en TYPEDEFS. Le langage fonctionel plpython peut à présent être compilé sous Win32. Tout comme le support du SSL a été corrigé pour Win32. L'installation des tablespaces sous Cygwin a été corrigé. Enfin, nous testons désormais sur des sockets de domaines unix avant de définir l'authentification par défaut pour s'y connecter.

</p>

<p>

D'autres corrections cette semaine encore, comme l'échappement de

simples quotes et l'utilisation de backslashes dans les locales

définies dans le fichier postgresql.conf, la correction de quelques cas

où PostgreSQL acceptait des valeurs CIDR invalides, mise en exergue de

problêmes avec des fonctions SQL qui retournaient des tableaux qui ont

des colonnes supprimées, ajout des noms des schémas dans la sortie de

pg_restore -l, et correction de la vue pg_indexes pour qu'elle affiche

le tablespace de l'index plutôt que le tablespace de la table parente.

</p>

<p>Un dernier mot pour tous ceux qui utilisent l'accès CVS: nous venons

juste de terminer notre ménage qui va vous demander de faire un cvs

checkout rapidement avant de pouvoir continuer à faire des cvs update.

Pour plus d'informations, merci de lire <a href="http://archives.postgresql.org/pgsql-announce/2004-10/msg00006.php">

cette annonce officielle</a>

</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>

Sortie de catchmail - un utilitaire mail pour PostgreSQL<br />

<a href="http://www.users.bigpond.net.au/mysite/catchmail.htm">

http://www.users.bigpond.net.au/mysite/catchmail.htm

</a>

</p>

<p>

Requêtes Hiérarchiques pour PostgreSQL v.0.5.3<br />

<strong><em>NDT: le fameux CONNECT BY d'Oracle enfin supporté!</em></strong><br />

<a href="http://freshmeat.net/projects/hier_pg/?branch_id=53766&amp;release_id=175403">

http://freshmeat.net/projects/hier_pg/?branch_id=53766&amp;release_id=175403

</a>

</p>

<p>

Movable Type v.3.12 mis à jour (corrections en rapport avec leur support

PostgreSQL)<br />

<a href="http://plod.popoever.com/archives/000335.html">

http://plod.popoever.com/archives/000335.html

</a>

</p>

<h3>== News autour de PostgreSQL ==</h3>

<p>

Document d'aide à l'installation (NDT: HOWTO) de Webmin, Apache2, OpenLDAP et PostgreSQL<br />

<a href="http://www.linux-tip.net/cms/workshop/ox/ox.htm">

http://www.linux-tip.net/cms/workshop/ox/ox.htm

</a>

</p>

<h3>== Évènements autour de PostgreSQL ==</h3>

<p>

Sommet 4D: Nouvelle Orléans, Louisiane, du 19 au 22 octobre<br />

Le Sommet 4D aura des conférences sur la construction d'applications sur

plates-formes hétérogènes avec PostgreSQL.<br />

<a href="http://www.4d.com/summit/">

http://www.4d.com/summit/

</a>

</p>

<p>

LinuxWorld Conférence: Francfort, Allemagne: du 26 au 28 octobre<br />

PostgreSQL y aura une fois de plus un stand!<br />

<a href="http://www.linuxworldexpo.de/">

http://www.linuxworldexpo.de/

</a>

</p>

<h3>== PostgreSQL Weekly News - 11 octobre 2004</h3>

<p>

Sur le web:<br />

<a href="http://www.postgresql.org">

http://www.postgresql.org

</a>

</p>