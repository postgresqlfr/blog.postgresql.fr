---
layout: post
title: "Attention : Révisions des versions 8.1 et 8.2 corrompues"
author: "SAS"
redirect_from: "index.php?post/drupal-236 "
---


<p>Les derniers correctifs de sécurité publiés contiennent une faille. Celle-ci peut engendrer des erreurs lorsque des types de données de taille variable sont utilisés avec des contraintes sur ces types ou des index d'expression. Il est donc très fortement recommandé aux utilisateurs des versions 8.1 et 8.2 de ne pas installer ces correctifs pour le moment.</p>

<p>Le PostgreSQL Global Development Group publiera de nouvelles révisions pour les versions 8.1 et 8.2 dans les prochaines 24 à 48h. Les utilisateurs des versions 7.3 et 7.4 ne sont pas concernés et sont invités à effectuer les mises à jour. La version 8.0.11 n'est probablement pas concernée, mais les tests continuent. Toute aide pour les tests est la bienvenue.</p>

<!--more-->


<p>Le PGDG est désolé pour la confusion ainsi engendrée et les problèmes que cela a pu causer aux utilisateurs. Les procédures de tests des révisions de sécurité sont à l'heure actuelle en débat sur la liste pgsql-hackers.</p>

<p>Merci de votre patience et de votre compréhension.</p>