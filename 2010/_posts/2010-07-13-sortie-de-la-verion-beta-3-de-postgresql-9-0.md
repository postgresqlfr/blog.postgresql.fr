---
layout: post
title: "Sortie de la verion beta 3 de PostgreSQL 9.0"
author: "daamien"
categories: [Dans les bacs]
redirect_from: "index.php?post/2010/07/13/Sortie-de-la-verion-beta-3-de-PostgreSQL-9.0"
---




<!--more-->


La 3ème version beta de PostgreSQL 9.0 est désormais disponible. Cette version contient de nombreuses corrections et plusieurs changements par rapport à la Beta 2, notamment un dépoussiérage final de la Streaming Replication et du Hot Standby. N'hésitez pas à télécharger, installer et tester cette version pour aider les développeurs à avancer vers la version finale. Plusieurs changement significatifs ont été introduit dans la Beta3, ce qui implique que certaines fonctionnalités doivent être re-testées, notamment :



    *  Corrections du hot standby

    *  Correction de la gestion des tableaux en plpython

    *  Plusieurs corrections pour dblink

    *  Support du TCP keepalive dans libpq

    *  Correction du comportement de checkSeek() sur les platformes anciennes



Notez que suite à un changement du catalogue système, un initdb et un reload sont nécessaires pour mettre à jour depuis la version 9.0Beta1. C'est une belle opportunité pour tester pg_upgrade à partir de la version Beta2 ou antérieure.



Si vous avez la possibilité de réaliser des tests, rendez-vous sur[ la page dédiée aux tests de la version beta|http://www.postgresql.org/developer/beta|en] 



Nous rappelons que les versions beta ne sont pas stables et qu'elles ne doivent pas être utilisées en production. Elles sont uniquement destinées aux tests. D'autres versions beta et des versions candidates seront produites dans les semaines à venir…



* L'annonce officielle : [http://www.postgresql.org/about/news.1220|http://www.postgresql.org/about/news.1220|en]

* Lien de téléchargement : [http://www.postgresql.org/ftp/source/v9.0beta3/|http://www.postgresql.org/ftp/source/v9.0beta3/|en]