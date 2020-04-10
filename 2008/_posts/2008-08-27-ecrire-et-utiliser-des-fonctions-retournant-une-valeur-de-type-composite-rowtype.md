---
layout: post
title: "Écrire et utiliser des fonctions retournant une valeur de type composite (ROWTYPE)"
author: "RockyRoad"
redirect_from: "index.php?post/drupal-303 "
---



<!-- Note de style:

En ajoutant feuille de style CSS contenant:

ou équivalent, on pourrait supprimer les attributs style="..."

dans cette page.

-->

<p> Bien que nouvelle utilisatrice de PG, j'ai choisi de présenter un mini-article sur l'utilisation des ROWTYPE dans PL/pgSQL, car je crois qu'il pourrait être utile à beaucoup.

</p>

<p> Je n'ai hélas pas beaucoup de temps à y consacrer, mais je compte sur votre participation pour m'aider à le clarifier.

</p>

<p> En effet je n'ai rien trouvé de tel sur le web et j'ai dû passer du temps, pour "trouver le pot aux roses", c'est-à-dire une syntaxe correcte utilisable pour mon application (GPL) que je vous dévoilerai plus tard.

</p>

<p> Merci à Guillaume Lelarge pour son aide. Au-delà de partager son expérience, il s'est joint activement à mes réflexions et suggéré les solutions qui m'ont mise sur la bonne voie.

<!--break-->

</p>

<p>Lorsqu'on crée une table, PG crée automatiquement un type (structure) décrivant la composition d'une ligne, c'est-à-dire la liste des champs.  Si on veut manipuler des lignes indépendamment d'une table, on peut déclarer un type, par exemple:

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />DROP TYPE IF EXISTS names CASCADE;<br />CREATE TYPE names AS (<br />       first_name varchar,<br />       last_name varchar,<br />       age integer<br />);</pre>

L'interpréteur psql nous répond:

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">CREATE TYPE</pre>

La fonction suivante construit une ligne du type 'names' :

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />CREATE OR REPLACE FUNCTION BuildName(_first varchar, _last varchar) RETURNS names AS $$<br />DECLARE<br />        result names;<br />BEGIN<br />        RAISE NOTICE 'BuildName(''%'', ''%'')', _first, _last;<br />        result.first_name = _first;<br />        result.last_name = _last;<br />        return result;<br />END;<br />$$ LANGUAGE plpgsql;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">CREATE FUNCTION</pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT BuildName('Pierre', 'Dupond');</pre>

On reçoit le message, puis le résultat en une seule colonne

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildName('Pierre', 'Dupond')<br />    buildname     <br />------------------<br /> (Pierre,Dupond,)<br />(1 row)</pre>

Si on veut distinguer les colonnes, conformément à la définition du type, il faut utiliser la syntaxe <code>().*</code>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT (BuildName('Pierre', 'Dupond')).*;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildName('Pierre', 'Dupond')<br />NOTICE:  BuildName('Pierre', 'Dupond')<br />NOTICE:  BuildName('Pierre', 'Dupond')<br /> first_name | last_name | age <br />------------+-----------+-----<br /> Pierre     | Dupond    |    <br />(1 row)<br /></pre>

On obtient bien le résultat en 3 colonnes. Mais on reçoit 3 FOIS le message  (il y a 3 champs).

<p><em>Que se passe-t-il ?</em></p>

<p>

Le comportement est identique avec une table:

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />DROP TABLE IF EXISTS person CASCADE;<br />CREATE TABLE person (<br />    id integer PRIMARY KEY,<br />    name varchar,<br />    data integer<br />);</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  table "person" does not exist, skipping<br />DROP TABLE<br />NOTICE:  CREATE TABLE / PRIMARY KEY will create implicit index "person_pkey" for table "person"<br />CREATE TABLE</pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />CREATE OR REPLACE FUNCTION BuildPerson(_num integer, _name varchar) RETURNS person AS $$<br />DECLARE<br />        result person;<br />BEGIN<br />        RAISE NOTICE 'BuildPerson(%, ''%'')', _num, _name;<br />        result.id = _num;<br />        result.name = _name;<br />        return result;<br />END;<br />$$ LANGUAGE plpgsql;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">CREATE FUNCTION</pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT BuildPerson(1, 'Dupond');</pre>

On reçoit le message, puis le résultat en une seule colonne

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildPerson(1, 'Dupond')<br /> buildperson <br />-------------<br /> (1,Dupond,)<br />(1 row)<br /></pre>

Si on veut insérer les résultats dans la table, il faut adapter la syntaxe pour obtenir des champs distincts

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT (BuildPerson(2, 'Dupond')).*;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br /> id |  name  | data <br />----+--------+------<br />  2 | Dupond |     <br />(1 row)<br /></pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />INSERT INTO person (SELECT (BuildPerson(2, 'Dupond')).*);</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br />INSERT 0 1</pre>

On reçoit aussi 3 FOIS le message , mais la rangée n'est insérée qu'une fois

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT * FROM person;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);"> id |  name  | data <br />----+--------+------<br />  2 | Dupond |     <br />(1 row)<br /></pre>

Tout va bien ? On avance ... mais:

<p>

Si la fonction comporte elle-même une instruction INSERT, on peut avoir un problème:

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />CREATE OR REPLACE FUNCTION AddPerson(_num integer, _name varchar) RETURNS person AS $$<br />DECLARE<br />        result person;<br />BEGIN<br />        RAISE NOTICE 'AddPerson(%, ''%'')', _num, _name;<br />        result.id = _num;<br />        result.name = _name;<br />        INSERT INTO person SELECT result.*;<br />        return result;<br />END;<br />$$ LANGUAGE plpgsql;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">CREATE FUNCTION</pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT (AddPerson(3, 'Durand')).*;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  AddPerson(3, 'Durand')<br />NOTICE:  AddPerson(3, 'Durand')<br />ERROR:  duplicate key value violates unique constraint "person_pkey"</pre>

Eh oui ! Comme les messages répétés pouvaient nous le laisser prévoir, la fonction est appelée plusieurs fois, avec les mêmes arguments, ce que notre clé primaire interdit.

<p>Remarquez que, la transaction ayant échoué, aucune ligne n'est finalement ajoutée.

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT * FROM person;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);"> id |  name  | data <br />----+--------+------<br />  2 | Dupond |     <br />(1 row)<br /></pre>

Pas de souci cependant si on évite la syntaxe ().* lors de l'invocation:

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />DELETE FROM person WHERE id=3;<br />SELECT AddPerson(3, 'Durand');<br />SELECT * FROM person;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">DELETE 0<br />NOTICE:  AddPerson(3, 'Durand')<br />  addperson  <br />-------------<br /> (3,Durand,)<br />(1 row)<br />&nbsp;<br /> id |  name  | data<br />----+--------+------<br />  2 | Dupond |     <br />  3 | Durand |     <br />(2 rows)<br /></pre>

<p>Attention si on récupère le résultat dans une variable (par exemple dans une fonction récursive)

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />CREATE OR REPLACE FUNCTION DoAddPerson(_num integer, _name varchar) RETURNS person AS $$<br />DECLARE<br />        result person;<br />BEGIN<br />        RAISE NOTICE 'DoAddPerson(%, ''%'')', _num, _name;<br />        SELECT * INTO result FROM AddPerson(_num, _name);<br />        -- result := AddPerson(_num, _name); -- syntaxe équivalente à la ligne précédente<br />        return result;<br />END;<br />$$ LANGUAGE plpgsql;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">CREATE FUNCTION</pre>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />SELECT DoAddPerson(4, 'Dubois');<br />SELECT * FROM person;</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  DoAddPerson(4, 'Dubois')<br />NOTICE:  AddPerson(4, 'Dubois')<br /> doaddperson <br />-------------<br /> (4,Dubois,)<br />(1 row)<br />&nbsp;<br /> id |  name  | data<br />----+--------+------<br />  2 | Dupond |     <br />  3 | Durand |     <br />  4 | Dubois |     <br />(3 rows)<br /><br /></pre>

<h4>Conclusion</h4>

L'opérateur <code>.*</code> équivaut à invoquer la source autant de fois que celle-ci a de champs. Si la source est une fonction, cette fonction est donc appelée plusieurs fois (s'il y a plusieurs champs ;)

<p>

C'est-à-dire que lorsqu'on écrit:

</p>

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />INSERT INTO person (SELECT  (BuildPerson(2, 'Dupond')).*); </pre>

tout se passe comme si on avait écrit:

<pre class="sql" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: rgb(0, 34, 170); background-color: rgb(255, 255, 170);">test=&gt; <br />INSERT INTO person (SELECT  (BuildPerson(2, 'Dupond')).id, <br />                            (BuildPerson(2, 'Dupond')).name, <br />                            (BuildPerson(2, 'Dupond')).data);</pre>

<pre class="result" style="margin: 2em 4em; padding: 0.7ex; line-height: 1.4ex; color: yellow; background-color: rgb(34, 34, 136);">NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br />NOTICE:  BuildPerson(2, 'Dupond')<br />INSERT 0 1</pre>

<p>N'hésitez pas à me faire part de vos remarques, suggestions, et bien sûr expérimentations autour de cet article :)

</p>

<p align="right"><em>— Michelle Baert —</em></p>