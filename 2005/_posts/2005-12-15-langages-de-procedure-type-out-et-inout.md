---
layout: post
title: "Langages de procédure : type OUT et INOUT"
author: "gleu"
redirect_from: "index.php?post/drupal-389 "
---



<p>Attention, tous les exemples de cet article utilisent le langage PL/pgsql. Pour l'utiliser, vous devez l'intégrer à votre base. Cela se fait tout simplement avec cette commande&nbsp;:</p>

<pre>createlang plpgsql metier</pre>

<p>Je viens donc d'intégrer le langage de procédures plpgsql dans la base metier.</p>

<p>Avant la version 8.1, PostgreSQL n'acceptait que des arguments en entrée dans la déclaration des fonctions (et quelque soit le langage de procédures utilisé). Pour renvoyer un résultat, il fallait passer par la « valeur de retour ». Malgré tout, il était possible de renvoyer plusieurs valeurs en utilisant un type composite. En fait, cela revenait à renvoyer une ligne de plusieurs colonnes d'une table « virtuelle ».</p>

<p>Créons une première fonction servant uniquement à incrémenter la valeur en entrée&nbsp;:</p>

<pre>CREATE FUNCTION incremente(valeur int4) RETURNS int4 AS<br />$$<br />BEGIN<br />RETURN valeur + 1;<br />END<br />$$ LANGUAGE plpgsql;</pre>

<p>« RETURNS int4 » (sur la première ligne) indique le type de la valeur renvoyée (ici un entier, plus précisément un int4). « RETURN ... » (4è ligne) sert à indiquer la valeur à renvoyer. Voici les résultats sur deux tests&nbsp;:</p>

<pre>metier=# SELECT incremente(1);<br /> incremente<br />------------<br />          2<br />(1 ligne)<br /><br />metier=# SELECT incremente(2);<br /> incremente<br />------------<br />          3<br />(1 ligne)</pre>

<p>Créons maintenant une fonction renvoyant plusieurs valeurs. Nous devons passer par un type composite, équivalent d'une structure en C&nbsp;:</p>

<pre>CREATE TYPE inc AS (<br />  val1 int4,<br />  val2 int4,<br />  str  varchar(10));</pre>

<p>Une fois ce type déclaré, nous pouvons passer à la création de la procédure stockée&nbsp;:</p>

<pre>CREATE FUNCTION incremente_2(valeur int4) RETURNS inc AS<br />$$<br />DECLARE<br />r inc;<br />BEGIN<br />SELECT INTO r valeur + 1, valeur + 2, 'test';<br />RETURN r;<br />END<br />$$ LANGUAGE plpgsql;</pre>

<p>Comme précédemment, « RETURNS ... » indique le type (composite dans ce cas) renvoyé et « RETURN ... » indique la valeur renvoyée. Voici quelques exemples d'utilisation de la fonction&nbsp;:</p>

<pre>metier=# SELECT incremente_2(5);<br /> incremente<br />------------<br /> (6,7,test)<br />(1 ligne)<br /><br />metier=# SELECT (incremente_2(5)).val1;<br /> val1<br />------<br />    6<br />(1 ligne)<br /><br />metier=# SELECT (incremente_2(5)).str;<br /> str<br />------<br /> test<br />(1 ligne)</pre>

<p>La fonction utilise tous les <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/rowtypes.html">concepts des types composites</a>, ce qui en rend la gestion un peu lourde. Elle ne renvoie pas réellement une ligne d'un tableau mais un type ROW. De plus, elle oblige à créer un type séparément.</p>

<p>La version 8.1 apporte une solution élégante à ce problème grâce à deux nouveaux types de paramètres&nbsp;: un paramètre en sortie seule (OUT) et un paramètre en entrée/sortie (INOUT). Sans indication, un paramètre est en entrée. Pour indiquer le type de paramètre, il faut l'écrire avant le nom de la variable et/ou son type de variable).</p>

<p>Commençons par le type OUT.</p>

<pre>CREATE FUNCTION incremente81(IN int4, OUT int4) AS<br />$$<br />BEGIN<br />$2 = $1 + 1;<br />END;<br />LANGUAGE plpgsql;</pre>

<p>Premier point intéressant, je n'ai pas indiqué de type en retour (avec l'élement RETURNS). Deuxième point intéressant qui en découle, il n'y a pas non plus d'instruction RETURN. La valeur renvoyée sera le seul paramètre déclaré en sortie, $2 dans cet exemple. Exécutons cette fonction&nbsp;:</p>

<pre>metier=# SELECT incremente81(5);<br /> incremente81<br />----------------<br /> 6<br />(1 ligne)</pre>

<p>Elle fonctionne exactement comme notre ancienne fonction « incremente ». Remarquez simplement que je n'ai indiqué qu'un seul paramètre. Le paramètre de type OUT ne peut pas être fourni. Vous ne pouvez pas non plus y placer une variable comme dans le cas des fonctions avec paramètres par référence dans des langages comme le C. Tous les paramètres OUT et INOUT sont renvoyés comme valeur de retour. Continuons avec le type INOUT qui vous permet d'y stocker une valeur et de la récupérer modifiée en sortie de la fonction.</p>

<pre>CREATE FUNCTION incremente81(INOUT int4) AS<br />$$<br />BEGIN<br />$1 = $1 + 1;<br />END;<br />$$ LANGUAGE plpgsql;</pre>

<p>Là aussi, pas de RETURNS et de RETURN.</p>

<pre>metier=# SELECT incremente81(5);<br /> incremente81<br />----------------<br /> 6<br />(1 ligne)</pre>

<p>Ce type est surtout utile pour éviter de déclarer une variable en entrée et une variable en sortie quand elles sont du même type.</p>

<p>Pour en revenir à notre exemple complexe où plusieurs valeurs sont renvoyées par une seule fonction, voici comment elle s'écrirait avec cette nouvelle fonctionnalité&nbsp;:</p>

<pre>CREATE FUNCTION incremente81_2(IN valeur int4, OUT val1 int4, OUT val2 int4, OUT str varchar(10)) AS<br />$$<br />BEGIN<br />val1 = valeur + 1;<br />val2 = valeur + 2;<br />str = 'test';<br />END<br />$$ LANGUAGE plpgsql;</pre>

<p>Pas de déclaration d'un type composite, pas de RETURNS et de RETURN&nbsp;: la valeur renvoyée et son type dépendent du nombre d'arguments déclarés en sortie (donc OUT et INOUT). Remarquez aussi que je n'indique rien pour les paramètres OUT. S'il y a plusieurs arguments, l'élément renvoyé sera de type composite. Si les arguments sont nommés comme dans l'exemple ci-dessus, il sera possible d'accéder à chaque élément&nbsp;:</p>

<pre>metier=# SELECT incremente81_2(5);<br /> incremente<br />------------<br /> (6,7,test)<br />(1 ligne)<br /><br />metier=# SELECT (incremente81_2(5)).val1;<br /> val1<br />------<br />    6<br />(1 ligne)<br /><br />metier=# SELECT (incremente81_2(5)).str;<br /> str<br />------<br /> test<br />(1 ligne)</pre>

<p>L'écriture de la fonction est plus intuitive, sa compréhension est plus simple (par exemple, il n'est plus nécessaire de savoir ce que représente le type inc).</p>

<p>Cette fonctionnalité a aussi été ajoutée pour faciliter le passage d'Oracle vers PostgreSQL. Oracle propose aussi ce type d'arguments. Il propose en plus le passage de variables par référence, ce que PostgreSQL ne fait pas (encore&nbsp;?).</p>