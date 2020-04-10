---
layout: post
title: "Modéliser un arbre simplement dans PostgreSQL"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-74 "
---



<p>

Bonjour,

Parmis les problèmes récurrents auxquels on est confrontés lorsqu'on fait un schéma de données, il y a la modélisation des arbres.

Il s'agit de bien conceptualiser une structure hiérarchique dans une base de données. Je vous propose une méthode éprouvée pour le faire simplement! (attention, ne pas confondre avec un graphe...).

</p>

<p>

Deux méthodes "anciennes":</p>

<ul>

<li><strong>id / parent_id:</strong> Tout d'abord, on trouve la méthode id / parent_id. C'est à dire qu'on boucle sur la même table, en ajoutant une colonne du même type que l'identifiant et en bouclant sur cette même colonne, avec un lien père / fils.

Il n'y a pas grand chose à dire sur cette méthode si ce n'est qu'elle montre un peu ses limites en matière de performances lorsqu'on a un arbre conséquent... De plus les mises à jour de l'arbre (suppression ou déplacement d'un noeud) sont assez hardues et nécessitent un code particulier.</li>

<li><strong>nested loops</strong> (ou "boucles imbriquées): Il s'agit de modéliser un arbre en sachant à l'avance quelle sera la "largeur" de celui-ci. C'est à dire que pour un arbre donné, la racine ira de 1 à n, le premier fils de la racine, de 1 à m. Le second fils de la racine, de m+1 à n et ainsi dessuite pour les descendants. Je vous laisse le soin de découvrir cette méthode en lisant <a href="http://www.intelligententerprise.com/001020/celko.jhtml?_requestid=145525%5D" target="_blank">http://www.intelligententerprise.com/001020/celko.jhtml?_requestid=145525]</a></li>

</ul>

<p>

<strong>Il existe bien mieux que ces deux méthodes&nbsp;!</strong><br /> Miguel Sofer, dans le travail de recherche qu'il a effectué présente une méthode novatrice. Il s'agit d'ajouter une colonne à toute table stockant les noeuds de l'arbre. Grâce à un encodage particulier, on arrive ainsi à savoir très rapidement&nbsp;:

</p>

<ul>

<li>quel est le niveau du noeud dans l'arbre&nbsp;;</li>

<li>quel est le père d'un noeud dans l'arbre&nbsp;;</li>

<li>quel est la lignée d'un noeud de l'arbre&nbsp;;</li>

<li>etc.</li>

</ul>

<p>

Pour avoir un apperçu rapide de cette méthode, vous pourrez <a href="http://openacs.org/forums/message-view?message_id=18365">consulter l'article</a> du projet OpenACS correspondant. Pour la petite histoire, ACS est un système de gestion du contenu qui ne tournait que sous Oracle. Lorsque son portage sous PostgreSQL fut réalisé, il a fallu trouver un moyen pour&nbsp;:</p>

<ul>

<li>modéliser un arbre correctement dans une base de données, en privilégiant la

souplesse d'utilisation et les performances&nbsp;;</li>

<li>remplacer l'écriture de la syntaxe Oracle "CONNECT BY".</li>

</ul>

<p>

Je vous recommande très vivement de lire <a href="http://www.utdt.edu/%7Emig/sql-trees/">l'article original de Miguel Sofer</a> sur cette méthode. Il démontre son efficacité de manière mathématique, et propose des exemples de code d'implémentation en PostgreSQL&nbsp;!</p>

<p>Vous pouvez tout aussi bien utiliser la contrib PostgreSQL qui s'appelle «&nbsp;ltree&nbsp;», qui utilise la même méthode que celle de Miguel Sofer, mais dont l'implémentation a été réalisée par Oleg et Teodor, deux contributeurs majeurs à PostgreSQL (index GiST, recherche plein texte tsearch2, etc.). Plus d'infos sur <a href="http://www.sai.msu.su/%7Emegera/postgres/gist/ltree/" target="_blank">cette page</a>.

</p>

<p>

Sachez enfin que l'implémentation du CONNECT BY nativement dans PostgreSQL est un sujet au goût du jour et ne serait tarder, comme on peut le lire sur <a href="http://groups.google.fr/groups?hl=fr&amp;lr=&amp;ie=UTF-8&amp;threadm=42064EBB.10105%40cybertec.at&amp;rnum=6&amp;prev=/groups%3Fq%3Dconnect%2Bby%2Bpostgresql%26hl%3Dfr%26lr%3D%26ie%3DUTF-8%26scoring%3Dd%26selm%3D42064EBB.10105%2540cybertec.at%26rnum%3D6">ce thread</a>(google groups).

</p>

<p>

En espérant que cet article puisse vous aider!

</p>

<p>

--

Jean-Paul Argudo

<a href="http://www.dalibo.com/" target="_blank">www.dalibo.com</a>

</p>