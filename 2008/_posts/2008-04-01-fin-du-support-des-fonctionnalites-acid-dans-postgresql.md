---
layout: post
title: "Fin du support des fonctionnalités ACID dans PostgreSQL"
author: "kryskool"
categories: [Événements]
redirect_from: "index.php?post/drupal/288"
---


<p></p>

<!--more-->


Pour concurrencer MySQL, qui a pris énormément de parts de marché du fait la simplicité de sa base de données, le PGDG annonce aujourd'hui la fin du support des fonctionnalités <a href="http://fr.wikipedia.org/wiki/Propri%C3%A9t%C3%A9s_ACID" target="_blank">ACID</a> dans PostgreSQL.

Cette suppression intervient après que des tests de performance aient été réalisés, qui ne se sont pas montrés concluants. Il a été ainsi décidé de retirer tout le code assurant le support d'ACID pour optimiser les performances. En s'approchant ainsi de MyISAM, les performances sont au rendez-vous!

Les <a href="http://fr.wikipedia.org/wiki/Aficionados" target="_blank">aficionados</a> de PostgreSQL ne pourront que déplorer la suppression de cette fonctionnalité, bien qu'en définitive, elle ne soit que très rarement utilisée.

Dans une interview datée d'hier sur Slashdot, John Dhou, l'un des principaux hackers de PostgreSQL a déclaré:<br /><em>«Ça n'a pas été facile de convaincre Tom Lane d'abandonner ces parties du code. Mais après une discussion relativement rapide via les mailing-lists, comme c'est toujours le cas dans le projet quand il s'agit de trancher, Tom s'est laissé convaincre. Mon patch a été rapidement accepté, malgré, il faut le dire, une absence relativement importante de commentaires, et un code novateur, qui reprend uniquement en partie ce qui a été fait, mais renomme aussi bon nombre de choses, afin de les simplifier, dans la libPQ.».</em>