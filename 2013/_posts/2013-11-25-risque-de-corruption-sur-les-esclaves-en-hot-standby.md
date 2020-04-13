---
layout: post
title: "Risque de corruption sur les &#34;esclaves&#34; en Hot-Standby"
author: "daamien"
redirect_from: "index.php?post/2013-11-25-risque-de-corruption-sur-les-esclaves-en-hot-standby "
---




<!--more-->


Le 18 novembre, un problème de réplication a été découvert dans les

dernières versions de PostgreSQL. Ce problème peut causer des

corruptions de données sur un serveur secondaire ("esclave") en

Hot-Standby au (re)démarrage de celui-ci.



Les versions concernées sont les suivantes:

9.3.0, 9.3.1, 9.2.5, 9.1.10 et 9.0.14.



Tous les détails techniques concernant ce problème (et comment s'en

protéger) sont décrits sur la page ci-dessous :



[https://wiki.postgresql.org/wiki/Nov2013ReplicationIssue|https://wiki.postgresql.org/wiki/Nov2013ReplicationIssue]



Un correctif est en cours de préparation et devrait être disponible en

début de semaine prochaine.



D'ici là, la vigilance est de mise si vous utilisez la réplication Hot

Standby.