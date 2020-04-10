---
layout: post
title: "Sortie de PGSQL DNS 0.71"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-28 "
---



<p>

Sur la liste pgsql-announce, Radim Kolar <hsn@netmag.cz>, nous annonçait le 1er

Septembre:<br />

</hsn@netmag.cz></p>

<p>

Sql djbdns version 0.71 a été fait par Radim Kolar qui n'est pas l'auteur

original<br />

<a href="http://home.tiscali.cz/%7Ecz210552/sqldns.html">

http://home.tiscali.cz/~cz210552/sqldns.html

</a>

</p>

<p>

La fonctionalité principale ajoutée est le démon dnscache avec un backend

PostgreSQL, qui est utilisé pour le stockage persistant des données cachées.

Toutes les données du DNS sont aussi cachées en RAM, il n'y a donc aucune

dégradation des performances.

</p>

<p>

Il y a aussi quelques corrections de bogues du vieux code de sqldjbdns, surtout

au niveau du requêtage inverse. Avec PostgreSQL v.7.4, il peut à présent

fonctionner avec des enregistrements DNS IPv6.

</p>