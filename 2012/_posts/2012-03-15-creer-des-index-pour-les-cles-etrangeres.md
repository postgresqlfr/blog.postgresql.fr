---
layout: post
title: "Créer des index pour les clés étrangères"
author: "mcousin"
categories: [None]
redirect_from: "index.php?post/2012/03/15/Créer-des-index-pour-les-clés-étrangères"
---




<!--more-->


Aujourd'hui, un client a découvert que les clés étrangères ne créaient pas d'index sur la table sur laquelle on crée la clé étrangère. La table sur la clé primaire de laquelle la clé étrangère pointe est bien sûr indexée.



La question a donc rapidement été: comment créer tous les index manquants, de façon plus ou moins automatisée.



Voici la requête (avec 2 ou 3 explications):



///

SELECT DISTINCT 'CREATE INDEX CONCURRENTLY ON ' || relname || '(' || array_to_string(dalibo_int_to_colname(pg_class.oid,conkey),',') || ');'

FROM pg_constraint JOIN pg_class ON pg_constraint.conrelid=pg_class.oid 

JOIN pg_namespace ON (pg_class.relnamespace=pg_namespace.oid)

WHERE contype = 'f'

AND nspname not in ('pg_catalog','information_schema') 

AND NOT EXISTS (SELECT indrelid,indkey from pg_index WHERE (indrelid,(indkey::int2[])[0:100])=(pg_constraint.conrelid,pg_constraint.conkey));

///



* On ne prend que les foreign keys (contype='f')

* On ne prend que ce qui est dans les schémas utilisateurs ( nspname not in ('pg_catalog','information_schema') )

* On ne prend que les contraintes pour lesquelles il n'y a pas déjà un index:



///

NOT EXISTS (SELECT indrelid,indkey from pg_index WHERE (indrelid,(indkey::int2[])[0:100])=(pg_constraint.conrelid,pg_constraint.conkey));

///



Ici, on a la première bizarrerie: indkey est de type int2vector, conkey est de type int2[].



Les types sont équivalents, à deux points de détails:

* Les vecteurs commencent à 0, 

* On peut caster de vector vers tableau, mais pas dans l'autre sens



Donc quand on cast l'indkey vers int2[], on récupère un tableau qui commence à 0, alors que le tableau de conkey commence à 1. D'où l'extraction de slice [0:100]: on demande à PostgreSQL de nous recréer un tableau à partir du tableau indkey::int2[], en prenant les éléments de 0 à 100 (il peut y en avoir 32 par défaut, c'est le paramètre de compilation max_index_keys). On récupère donc un tableau indexé à partir de 1, qu'on peut enfin comparer à conkey. indkey est un int2vector pour des raisons de compatibilité (c'est l'ancien type tableau de PostgreSQL).



On a fait le plus pénible: on a la liste des contraintes, sur quelles colonnes de quelles tables elles pointent. Il ne nous reste plus qu'à convertir cette liste de colonne en ordre SQL. Pour cela, il faut passer de l'oid de la table et des identifiants des colonnes à une liste texte des colonnes. Le plus lisible est encore de faire une fonction PL:



///

CREATE FUNCTION dalibo_int_to_colname(oid_table oid, num_col integer[] )

 RETURNS text[]

 LANGUAGE plpgSQL

 

AS $function$

DECLARE

  velement int;

  varray text[];

  vattname text;

BEGIN

  FOR velement IN SELECT unnest(num_col) LOOP

    SELECT attname INTO vattname FROM pg_attribute WHERE attrelid=oid_table AND attnum=velement;

    varray:=array_append(varray,vattname);

  END LOOP;

  RETURN varray;

END

$function$

;



///



Pour finir, il y a un DISTINCT parce que plusieurs FOREIGN KEYS peuvent pointer sur le même groupe de colonne.



Une fois que vous avez fini, vérifiez que vous n'avez pas créé des index qui ne servent à rien : [http://blog.postgresql.fr/index.php?post/2011/02/22/D%C3%A9tecter-les-index-redondants-dans-une-base|/index.php?post/2011/02/22/D%C3%A9tecter-les-index-redondants-dans-une-base|fr]