---
layout: post
title: "PostgreSQL 9.0 RC1"
author: "sas"
redirect_from: "index.php?post/2010-08-31-postgresql-9-0-rc1 "
---



La première « release candidate » de PostgreSQL 9.0 est désormais publiée. 



Plus vite vous la téléchargerez et la testerez, plus vite nous aboutirons à la version finale. Tous les bogues connus doivent être corrigés. C'est pourquoi nous demandons aux utilisateurs de remonter rapidement tout bogue qu'ils pourraient rencontrer.



Du fait d'une modification dans le catalogue système, un initdb et un rechargement de la base sont nécessaires pour les mises à jour depuis les versions bêta de la 9.0.

Cela peut être considéré comme une opportunité de tester pg_upgrade. N'oubliez pas de reporter vos résultats.



Si vous pouvez nous aider dans les tests, merci de consulter la page consacrée aux tests : [http://wiki.postgresql.org/wiki/HowToBetaTest|http://wiki.postgresql.org/wiki/HowToBetaTest|en].



Aucune modifications dans les commandes, les interfaces ou les API n'est attendue entre cette RC et la version finale. Les applications qui utiliseront la version 9.0 peuvent (devraient) être testées au regard de la version 9.0rc1. 



Les rapports de bogue décideront d'une éventuelle nouvelle RC.



Le code source, et les installateurs binaires pour diverses plateformes sont disponibles sur le site Web de PostgreSQL :

* Source :

  [http://www.postgresql.org/ftp/source/v9.0rc1|http://www.postgresql.org/ftp/source/v9.0rc1|en]

* Installateur Un-Clic incluant les binaires Win64 :

  [http://www.enterprisedb.com/products/pgdownload.do|http://www.enterprisedb.com/products/pgdownload.do|en]

* Binaires pour les autres plateformes :

  [http://www.postgresql.org/ftp/binary/v9.0rc1|http://www.postgresql.org/ftp/binary/v9.0rc1|en]

* Notes de version :

  [http://developer.postgresql.org/pgdocs/postgres/release-9-0.html|http://developer.postgresql.org/pgdocs/postgres/release-9-0.html|en]

* Participer aux tests :

  [http://www.postgresql.org/developer/beta|http://www.postgresql.org/developer/beta|en]