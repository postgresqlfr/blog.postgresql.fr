---
layout: post
title: "Fiche mémoire sur PostgreSQL"
author: "gleu"
redirect_from: "index.php?post/drupal-113 "
---



<p>Peter Freitag vient de publier une fiche mémoire sur PostgreSQL dont voici la traduction. La version anglaise est disponible sur le <a href="http://www.petefreitag.com/cheatsheets/postgresql/">site de Peter Freitag</a>.</p>

<!--break-->

<h1>Fiche mémoire sur PostgreSQL</h1>

<h2>Créer une base de données</h2>

<pre>CREATE DATABASE nom_base;</pre>

<h2>Créer une table (avec un identifiant incrémenté automatiquement)</h2>

<pre>CREATE TABLE nom_table ( <br />id serial PRIMARY KEY,<br />nom varchar(50) UNIQUE NOT NULL,<br />date_creation timestamp DEFAULT current_timestamp<br />);</pre>

<h2>Ajouter une clé primaire</h2>

<pre>ALTER TABLE nom_table ADD PRIMARY KEY (<em>id</em>);</pre>

<h2>Créer un index</h2>

<pre>CREATE UNIQUE INDEX nom_index ON nom_table (noms_colonnes);</pre>

<h2>Sauvegarder une base de données <em>(ligne de commande)</em></h2>

<pre>pg_dump nom_base &gt; nom_base.sql</pre>

<h2>Sauvegarder toutes les bases de données&nbsp;<em>(ligne de commande)</em></h2>

<pre>pg_dumpall &gt; sauvegarde_pg.sql</pre>

<h2>Lancer un script SQL <em>(ligne de commande)</em></h2>

<pre>psql -f script.sql <em>nom_base</em></pre>

<h2>Rechercher via une expression rationnelle</h2>

<pre>SELECT colonne FROM table WHERE colonne ~ 'truc.*';</pre>

<h2>Les&nbsp;<em>N</em> premiers enregistrements</h2>

<pre>SELECT colonnes FROM table LIMIT 10;</pre>

<h2>Pagination</h2>

<pre>SELECT colonnes FROM table LIMIT 10 OFFSET 30;</pre>

<h2>Instructions préparées</h2>

<pre>PREPARE insertion_preparee (int, varchar) AS<br />INSERT INTO nom_table (colonne_int, colonne_char) VALUES ($1, $2);<br />EXECUTE insertion_preparee (1,'a');<br />EXECUTE insertion_preparee (2,'b');<br />DEALLOCATE insertion_preparee;</pre>

<h2>Créer une fonction</h2>

<pre>CREATE OR REPLACE FUNCTION mois (timestamp) RETURNS integer <br /><br />  AS 'SELECT date_part(''month'', $1)::integer;'<br /><br />  LANGUAGE 'sql';</pre>

<h2>Maintenance d'une table</h2>

<pre>VACUUM ANALYZE table;</pre>

<h2>Ré-indexer une base de données, une table ou un index</h2>

<pre>REINDEX DATABASE nom_base;</pre>

<h2>Afficher le plan de requête</h2>

<pre>EXPLAIN SELECT * FROM table;</pre>

<h2>Importer un fichier</h2>

<pre>COPY table_destination FROM '/tmp/un_fichier';</pre>

<h2>Afficher tous les paramètres d'exécution</h2>

<pre>SHOW ALL;</pre>

<h2>Donner tous les droits à un utilisateur</h2>

<pre>GRANT ALL PRIVILEGES ON table TO nom_utilisateur;</pre>

<h2>Exécuter une transaction</h2>

<pre>BEGIN TRANSACTION <br /> UPDATE comptes SET balance += 50 WHERE id = 1;<br />COMMIT;</pre>

<p><strong>SQL de base</strong></p>

<h2>Obtenir toutes les colonnes et lignes d'une table</h2>

<pre>SELECT * FROM table;</pre>

<h2>Ajouter une nouvelle ligne</h2>

<pre>INSERT INTO table (colonne1,colonne2)<br /><br />  VALUES (1, 'un');</pre>

<h2>Mettre à jour une ligne</h2>

<pre>UPDATE table SET truc = 'machin' WHERE id = 1;</pre>

<h2>Supprimer une ligne</h2>

<pre>DELETE FROM table WHERE id = 1;</pre><br /><br />

<p><em>S'imprime sur deux pages. Document en cours de construction - Questions, commentaires, critiques ou requêtes (en anglais) à adresser <ins>ici</ins></em></p>

<p><small><em>Copyright © 2005 <a href="http://www.petefreitag.com/">Peter Freitag</a> (http://www.petefreitag.com/), All Rights Reserved.<br />

Ce document peut être imprimé librement aussi longtemps que cette notice reste intacte.</em></small></p>