---
layout: post
title: "Publication de PostgreSQL 9.4 bêta 3"
author: "sas"
redirect_from: "index.php?post/2014-10-14-publication-de-postgresql-9-4-beta-3 "
---



<p>Le «&nbsp;PostgreSQL Global Development Group&nbsp;» vient de publier la version 9.4 bêta 3, la nouvelle révision bêta de la prochaine version.

<br />

<br />

Cette bêta présente toutes les fonctionnalités qui seront disponibles dans la version 9.4, ainsi que les correctifs de la plupart des problèmes rencontrés pas les utilisateurs qui ont testé la bêta 2.

Nous vous invitons à télécharger, tester, et signaler ce que vous trouverez.

<br />

<br />

Le changement principal dans la bêta 3 est la modification du type de format de données pour JSONB, afin de rendre les champs JSONB plus faciles à compacter et de réduire l'espace de stockage nécessaire.

Ce changement n'est pas rétrocompatible. Les utilisateurs qui ont chargé des données dans les champs JSONB, en utilisant la 9.4 bêta 1 ou bêta 2, devront utiliser pg_dump et lancer une restauration pour passer en bêta 3.

<br />

<br />

Parmi les autres changements faits depuis la bêta 2, citons&nbsp;:</p>

<ul>

<li>Changement des arguments de pg_recvlogical --create/--drop en --create-slot/--drop-slot</li>

<li>Éviter le délai excessif au démarrage du «&nbsp;background worker&nbsp;»</li>

<li>Suppression du paramètre de configuration num_xloginsert_locks, remplacé par #define</li>

<li>Correction de l'option <code>--if-exists</code> de pg_dump pour les «&nbsp;large objects&nbsp;»</li>

<li>Suppression de l'interdiction des clés d'objet JSON de taille nulle</li>

<li>Retour de NULL par json_object_agg s'il n'y a pas de ligne</li>

<li>Les instructions ALTER SYSTEM sont tracées comme des DDL</li>

<li>Correction de l'impossibilité pour la contribution auto_explain à afficher les informations temporelles par nœud</li>

<li>Plusieurs correctifs des vérifications TAP</li>

<li>Support de la commande ALTER SYSTEM RESET</li>

<li>Correctif de power_var_int() pour les exposants d'entiers long</li>

<li>Correctif pour vacuumdb --analyze-in-stages --all</li>

<li>Modification de la façon dont la latence est calculée avec l'option --rate de pgbench</li>

<li>Support de ALTER ... ALL IN pour les déclencheurs sur événement</li>

<li>Suppression de la restriction aux seuls superutilisateurs pour pg_is_xlog_replay_paused()</li>

<li>Correction de FOR UPDATE NOWAIT sur les chaînes de tuples actualisés</li>

<li>Correction de la gestion des Var pour les vues de barrière de sécurité</li>

<li>Correction des rafraichissements concurrents de niveau superutilisateur pour les vues matérialisées appartenant à autrui</li>

<li>Pas de suivi des DEALLOCATE dans pg_stat_statements</li>

<li>Correction du comportement aux limites des opérateurs d'extraction JSON/JSONB</li>

<li>Modification de la façon dont la cartographie des «&nbsp;tablespace&nbsp;» est effectuée par pg_basebackup</li>

<li>Refonte du MOVE ALL en ALTER ALL ... IN TABLESPACE</li>

<li>Correction du core dump de l'opérateur jsonb </li>

<li>Abandon des modifications du psql pour supporter le mode étendu à retour chariot</li>

<li>Ajout de l'option -S pour pg_receivexlog</li>

<li>Rejet des doublons de noms de colonnes dans les listes de colonnes référencées par les clés étrangères</li>

<li>Correction du crash du checkpointer</li>

<li>Multiples corrections mineures sur JSON et les fonctionnalités JSONB</li>

<li>Multiples corrections mineures sur le décodage logique</li>

<li>De multiples corrections de bugs concernant d'anciens problèmes sont à venir dans une prochaine version mineure</li>

<li>Également des améliorations et  modifications dans la documentation</li>

</ul>

<p>La bêta 3 inclut des changements sur pg_control et les catalogues système. De fait, les utilisateurs ayant testé la bêta 1 ou la bêta 2 devront les mettre à jour pour tester la bêta 3.

Nous suggérons d'utiliser pg_upgrade pour cette mise à jour afin de le tester également.</p>

<p>Pour une liste complète des fonctionnalités de la version 9.4 bêta, veuillez consulter les notes de version <a href="http://www.postgresql.org/docs/devel/static/release-9-4.html" hreflang="en">http://www.postgresql.org/docs/devel/static/release-9-4.html</a>.</p>

<p>Des descriptions et notes additionnelles des nouvelles fonctionnalités sont disponibles sur la page wiki des fonctionnalités 9.4&nbsp;: <br /><a href="http://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.4" hreflang="en">http://wiki.postgresql.org/wiki/What%27s_new_in_PostgreSQL_9.4</a>.</p>

<p>Nous avons besoin de notre communauté pour nous aider à tester la prochaine version afin de garantir qu'elle a de bonnes performances et qu'elle est exempte de bogues.</p>

<p>Nous vous invitons à télécharger PostgreSQL 9.4 bêta 3 et à l'essayer avec vos projets et applications dès que possible, puis à faire vos retours et critiques aux développeurs PostgreSQL.</p>

<p>Les fonctionnalités et APIs de la bêta 3 ne changeront pas de manière substantielle avant la version finale, il est donc possible de créer des applications autour des nouvelles fonctionnalités en toute sécurité.</p>

<p>Plus d'informations sur la manière de tester et de signaler les problèmes <a href="http://www.postgresql.org/developer/beta" hreflang="en">http://www.postgresql.org/developer/beta</a>.</p>

<p>Vous trouverez la bêta 3 de PostgreSQL 9.4, comprenant les binaires et les installeurs pour Windows, Linux et Mac, sur la page de téléchargement <a href="http://www.postgresql.org/download" hreflang="en">http://www.postgresql.org/download</a>.</p>

<p>La documentation complète de la nouvelle version, disponible en ligne <a href="http://www.postgresql.org/docs/9.4/static/" hreflang="en">http://www.postgresql.org/docs/9.4/static/</a>,  est également installée avec postgreSQL.</p>