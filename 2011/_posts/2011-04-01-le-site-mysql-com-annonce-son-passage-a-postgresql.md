---
layout: post
title: "Le site Mysql.com annonce son passage à PostgreSQL !"
author: "daamien"
redirect_from: "index.php?post/2011-04-01-le-site-mysql-com-annonce-son-passage-a-postgresql "
---



Le 27 mars dernier, le site officiel de [MySQL a été victime d'une attaque|http://www.journaldunet.com/solutions/securite/injection-sql-sur-site-web-mysql-0311.shtml|fr] par injection SQL qui a ouvert l'accès la liste complète des

noms d'utilisateurs et leurs mots de passe chiffrés. Les assaillants

ont d'ailleurs publié les informations sensibles subtilisées, et

certains des mots de passe ont été craqués.



Dans un message officiel qui nous a été transmis ce jour, [Mr Bobby Tables|http://xkcd.com/327/] responsable du site mysql.com nous annonce en exclusivité cette

étonnante nouvelle : Suite à l'attaque de mardi, MySQL a décidé de

migrer son site web sous PostgreSQL.



Bobby Tables explique ce choix : "Comme beaucoup de site web nous avons

commencé avec une petite base de données. MySQL était parfait pour cela.

Mais depuis notre rachat par Oracle, notre trafic et la charge ont

fortement augmentés. Nous avons désormais besoin d'un SGBD plus robuste

et c'est tout naturellement que nous nous sommes tournés vers PostgreSQL.



Mais ce choix n'est pas simplement du à l'attaque de mardi. Ainsi au

delà de la sécurité, PostgreSQL possède des fonctionnalités essentielles

( la réplication Hot Standby notamment ) et ses performances en font un

logiciel incontournable. M. Tables ajoute : "PostgreSQL est largement

reconnu pour son comportement stable et proche de Oracle. C'est très

important pour nous."



De plus cette annonce est une très bonne nouvelle pour la communauté

PostgreSQL car cette migration pourrait en déclencher d'autres. En

effet, le passage du site oracle.com sous PostgreSQL serait à l'étude...