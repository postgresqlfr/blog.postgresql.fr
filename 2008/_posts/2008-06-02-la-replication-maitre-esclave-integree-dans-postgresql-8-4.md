---
layout: post
title: "La réplication Maitre/Esclave intégrée dans PostgreSQL 8.4"
author: "daamien"
redirect_from: "index.php?post/drupal-294 "
---



Via une <a href="http://archives.postgresql.org/pgsql-hackers/2008-05/msg00913.php">annonce</a> faite sur la mailing listes des core-hackers et le <a href="http://momjian.us/main/blogs/pgblog.html#May_30_2008">blog de Bruce Momjian</a>, la communauté des développeurs ("core-hackers") de PostgreSQL vient de déclarer officiellement que des travaux sont en cours pour intégrer un mécanisme de réplication Maître/Esclave au sein du coeur du SGBD.

Jusqu'ici, la réplication d'une base PostgreSQL est possible via différentes solutions "externes" telles que  <a href="http://www.slony.info">Slony</a>, <a href="http://www.bucardo.org">Bucardo</a> ou via une solution interne (technique du <a href="http://docs.postgresqlfr.org/8.3/warm-standby.html#warm-standby-record">log shipping</a>). Cette dernière solution va être améliorée pour ajouter le « hot standby ». Les développeurs ne s'engagent pas sur une date de livraison de cette fonctionnalité mais on peut espérer qu'elle sera disponible dans la version 8.4

Le mécanisme d'export de ce « hot standby » se base sur l'envoi de chaque transaction validée. La réplication sera donc pratiquement synchrone.

Un second objectif, prévu pour la version 8.5, est de permettre l'accès en lecture seule sur les noeuds esclaves.

Cette annonce était très attendue et laisse entrevoir une réplication asynchrone d'un maitre vers plusieurs esclaves qui seraient très simple à mettre en place et qui répondra à la plupart des besoin de réplications.

Bien sûr, cette solution ne remplacera pas les systèmes de réplication plus sophistiqués comme <a href="http://www.slony.info">Slony</a>, <a href="http://www.bucardo.org">Bucardo</a>, <a href="http://pgpool.projects.postgresql.org/">pgPool</a>, <a href="http://pgfoundry.org/projects/skytools/">Londiste</a> et consorts.