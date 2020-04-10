---
layout: post
title: "PostgreSQL 9.0 fera le café !"
author: "daamien"
redirect_from: "index.php?post/2010-03-31-postgresql-9-0-fera-le-cafe "
---



La future version 9.0 de PostgreSQL vient tout juste de sortir en version alpha 4

et alors que les premiers tests en conditions de production commencent,

la liste des nouvelles fonctionnalités impressionne et promet une

véritable révolution au sein du marché des SGBD...



Parmi toutes les 204 nouveautés de la version 9.0, une avancée a

particulièrement retenu notre attention. Il ne s'agit pas de la

réplication intégrée, ni des améliorations de performances, ni du

support natif de Windows 64bits. Non, la fonctionnalité essentielle de

PostgreSQL 9.0 réside dans une contribution appelée pg_expresso, qui

propose un nouveau langage de procédure stockée (PL/perco) permettant de

contrôler à distance un percolateur via une liaison USB ( voir photo

ci-dessous )



                 ((http://nawak.taadeem.net/USB_Coffee_Machine.jpg))



Le langage d'interaction avec l'appareil a été spécialement conçu pour

respecter le standard SQL:2008. Les administrateurs de base de données

pourront donc désormais obtenir leur boisson vitale en utilisant leur

langage naturel :



///

BEGIN;

INSERT INTO tasse VALUES ( 'café', 'sucre', 'lait' );

COMMIT;

///



Notez bien que le moteur transactionnel MVCC joue ici un rôle essentiel

puisqu'il permet de gérer plusieurs percolateurs en parallèle et

permet à l'utilisateur de faire un ROLLBACK si le café n'est pas bon.



En cas de lenteurs sur la machine, il sera possible de lancer la

commande EXPLAIN pour obtenir un rapport d'exécution au format XML ou JSON.

De plus ce module est totalement compatible avec le mécanisme de Hot

Standby, ce qui permet d'avoir un second mug de café, maintenu à

température et prêt à l'emploi en cas de crash du mug principal.

PostgreSQL 9.0 permettra donc de garantir la haute-disponibilité de

votre service à café.



''PostgreSQL, what else ?''