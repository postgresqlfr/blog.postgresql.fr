---
layout: post
title: "PostgreSQL Weekly News - 22 mars 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-358 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 22 mars 2004 ==</h2>

<p>Cette semaine, le développement a repris son rythme habituel, des

progrès ayant été fait sur quelques points comme la plannification des

nouvelles fonctionnalités de la 7.5, entre autres win32 et PITR. Alors que

nous attendons ces grosses fonctionnalités, jetons un oeil aux quelques autres

améliorations intégrées au répertoire 7.5.<!--break-->

</p>

<p>Les modifications effectuées sur une meilleure gestion de

l'instruction CASE employée avec des listes d'expressions importantes a été

implémentées. Les routines de construction des index btree ont été modifiées

pour trier maintenant les lignes à clés égales suivant leur TID, ce qui évite

l'utilisation de qsort(), lent sur certaines plateformes. Un outil de test pour

fsync a été ajouté pour aider les développeurs à déterminer des méthodes plus

appropriée pour la synchronisation (sync). Enfin, des modifications ont été

apportées pour le support des threads sur Unixware.</p>

<p>Le nouveau GUC log_line_prefix (basé sur l'amélioration des capacités

des traces sur la 7.5) a été ajouté, remplaçant ainsi log_statement, log_pid,

log_timestamp et log_source_port. Une routine de validation a été ajouté à

plpgsql pour qu'un minimum de vérification syntaxique soit effectué lors de la

création des fonctions plpgsql. Les informations pour une erreur de syntaxe

ont aussi été modifié pour donner des résultats plus plaisants aux requêtes

générées en interne. Le programme pg_dump a été modifié pour récupérer tous les

commentaires en une requête plutôt que de les récupérer objet par objet. Ceci

nous fait gagner un temps non négligeable pour des bases de données comprenant

de nombreux objets, par exemple la base de données de tests, où cela nous

permet de sauver 33% du temps nécessaire à une sauvegarde du schéma.</p>

<p>Concernant le site, l'équipe est heureuse d'annoncer les liens RSS à

la fois pour les nouvelles PostgreSQL

(<a href="http://www.postgresql.org/news.rss">http://www.postgresql.org/news.rss</a>)

et pour les événements

(<a href="http://www.postgresql.org/events.rss">http://www.postgresql.org/events.rss</a>).

Grand merci à David Costa

(<a href="http://www.dotgeek.org/">http://www.dotgeek.org</a>), qui a été l'élément

principal pour leur mise en place. Si vous avez un site, ne vous gênez pas à répercuter

ces nouveaux liens&nbsp;; de même, si votre site favori n'en dispose pas encore,

n'hésitez pas à les prévenir.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de PostgreSQL-relay 1.3<br />

<a href="http://freshmeat.net/projects/postgresql-relay/?branch_id=47849&amp;release_id=154985">http://freshmeat.net/projects/postgresql-relay/?branch_id=47849&amp;release_id=154985</a></li>

<li>Sortie de SQL4X Manager J 2.7.1<br />

<a href="http://www.macosguru.com/macosguru3/press/view.php?id=19">http://www.macosguru.com/macosguru3/press/view.php?id=19</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Migration de MySQL vers PostgreSQL<br />

<a href="http://www.dotgeek.org/guruarticles.php?guru=view&amp;id=27">http://www.dotgeek.org/guruarticles.php?guru=view&amp;id=27</a></li>

<li>postgres ... tortue ou lièvre ? (blog)<br />

<a href="http://www.deadmime.org/%7Edank/blog/2004/03/22/postgres_turtle_or_hare.html">http://www.deadmime.org/~dank/blog/2004/03/22/postgres_turtle_or_hare.html</a></li>

<li>Comment installer PostgreSQL 7.4.2 sur Windows XP (blog)<br />

<a href="http://www.dyrelund.com/index.php?p=24">http://www.dyrelund.com/index.php?p=24</a></li>

<li>PostgreSQL sur OS X (blog)<br />

<a href="http://www.randomnetworks.com/joseph/blog/?eid=99">http://www.randomnetworks.com/joseph/blog/?eid=99</a></li>

<li>M$ SQL Server perd du terrain (blog)<br />

<a href="http://mayhem-chaos.net/blog/archives/000511.html">http://mayhem-chaos.net/blog/archives/000511.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 22 mars 2004 ==</h2>

<p>N'oubliez pas de lire le résumé de la semaine pour la liste de diffusion

générale d'Elein Mustain</p>

<p>Liste de diffusion générale <a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>Sur le web :

</p>

<ul>

<li><a href="http://www.postgresql.org">http://www.postgresql.org</a></li>

<li><a href="http://advocacy.postgresql.org">http://advocacy.postgresql.org</a></li>

</ul>