---
layout: post
title: "Publication de PostgreSQL 9.2"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/2012/09/10/Publication-de-PostgreSQL-9.2"
---




<!--more-->


Le PostgreSQL Global Development Group annonce la sortie de PostgreSQL 9.2, dernière version en date du système de gestion de bases de données libre de référence.<br />Depuis l'annonce de la version bêta en mai, les développeurs et les intégrateurs louent les avancées en terme de performance, de flexibilité et d'extensibilité.<br />Une adoption massive de cette version est attendue.<br /><br />« PostgreSQL 9.2 intègre le support natif de JSON, les index couvrants, des performances et une réplication encore améliorées, et beaucoup d'autres fonctionnalités. Nous attendons cette version avec impatience. Elle sera disponible en "Early Access" dès sa publication par la communauté, » déclare Ines Sombra, Lead Data Engineer, EngineYard.<br /><br /><br /><h2>Performances et extensibilité accrues</h2>

<br />Grâce aux améliorations apportées à l'extensibilité verticale, PostgreSQL exploite mieux les ressources matérielles de serveurs plus puissants.<br />Les avancées dans la gestion des verrous, l'efficacité d'écriture, les accès aux données par les index couvrants, et autres opérations de bas niveau permettent à PostgreSQL de gérer des volumes conséquents. <br />En chiffres, cela donne :<br /><br /><ul><li>jusqu’à 350.000 requêtes en lecture par seconde (plus de 4x plus rapide) ;</li>

<li>les accès aux données à partir des index pour les requêtes de type entrepôt de données (2 à 20x plus rapide) ;</li>

<li>jusqu’à 14.000 requêtes en écriture par seconde (5x plus rapide) ;</li>

<li>une consommation électrique des processeurs jusqu’à 30% moindre.</li>

</ul>

<br />De plus, l'ajout de la réplication en cascade augmente les possibilités d'extension horizontale.<br /><br />« NewsBlur, un lecteur d'informations issues des réseaux sociaux, repose sur PostgreSQL pour stocker des millions de sites et de contributions. Solide et fiable depuis des années, » déclare Samuel Clay, fondateur de NewsBlur.com. « Nous sommes toujours à la pointe (9.1 actuellement, et bientôt en 9.2 pour la seule réplication en cascade) et le plaisir dure depuis la version 8.4. »<br /><br /><h2>Flexibilité orientée développeurs</h2>

<br />La flexibilité de PostgreSQL se reflète dans la diversité des organismes qui l'ont adopté. Citons la NASA, la FAA, le Chicago Mercantile Exchange et Instagram. Tous reposent sur PostgreSQL pour leurs applications critiques.<br />La version 9.2 étend encore le concept de flexibilité en incluant les types « Range » (étendue) et JSON, permettant ainsi aux développeurs d'élargir leurs utilisations de PostgreSQL.<br /><br />Les types « Range » permettent de créer de meilleures applications de type calendrier, scientifiques ou financières. Aucun autre système majeur de gestion de bases de données ne propose cette fonctionnalité, qui autorise une gestion intelligente des intervalles de temps ou de nombre.<br /><br />Avec PostgreSQL 9.2, les résultats de requête peuvent être retournés sous la forme de types de données JSON. Combiné aux nouvelles extensions de programmation javascript PL/V8 et PL/Coffee, et au système de stockage optionnel clé-valeur HStore, cela permet d'utiliser PostgreSQL comme une base documentaire de type « NoSQL », tout en conservant la fiabilité, la flexibilité et la performance de PostgreSQL.<br /><br />« Le support natif du JSON dans PostgreSQL fournit un mécanisme efficace de création et de stockage de documents pour les APIs Web. Nous utilisons des bibliothèques frontales de type jQuery pour interroger des données structurées en arbres et tableaux. Notre travail se trouve facilité par la disponibilité des données au format JSON, qui améliore également les performances, » explique&nbsp; Taras Mitran, Architecte senior, IVC Inc.<br /><br /><ul><li>Press Kit : http://www.postgresql.org/about/press/presskit92/fr</li>

<li>Notes de version : http://www.postgresql.org/docs/9.2/static/release-9-2.html</li>

<li>Téléchargements : http://www.postgresql.org/downloads</li>

</ul>