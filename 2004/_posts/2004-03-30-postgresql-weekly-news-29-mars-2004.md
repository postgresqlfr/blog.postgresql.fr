---
layout: post
title: "PostgreSQL Weekly News - 29 mars 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-359 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 29 mars 2004 ==</h2>

<p>Alors qu'il ya a eu quelques discussions sur les programmes de

contrôles de source dans les différentes listes de diffusion cette semaine,

les personnes scrutant les modifications du dépôt CVS ont noté quelques

modifications intéressantes. Bien que la liste ne soit pas longue, beaucoup

ont un intérêt pour l'utilisateur et auront un impact une fois la version 7.5

sortie.<!--break-->

</p>

<p>La première amélioration concerne le remplacement des variables GUC

virtual_host et tcpip_socket avec un paramètre unifié listen_addresses dans

postgresql.conf. Le comportement par défaut a aussi été modifié pour écouter

sur localhost, éliminant le besoin de l'option -i dans un grand nombre de cas.

Le paramètre max_expr_depth a été remplacé par max_stack_depth mesuré en

kilo octets et faisant l'objet d'une vérification avec la taille physique de la

pile. Cette implémentation nous donne une bien meilleure défense contre les

fonctions un peu trop récursives. La commande "Alter Table Set Without OIDS"

a été supprimé pour ajouter à la commande "Alter Table Drop Column" la

capacité de gérer les colonnes OID. Ceci corrige les problèmes de suppression

de colonnes OID ayant des dépendances ou étant hérités d'un parent. Manfred

Spraul a mis à jour le code pour SSL et Kerberos, qui devrait les rendre

compatibles avec les threads.</p>

<p>Dans un autre domaine, la communauté PostgreSQL a grandi avec l'ajout

d'une liste de diffusion polonaise disponible à partir de pgsql CHEZ foo-baz

POINT com. La communauté française dispose d'un nouveau site web disponible sur

<a href="http://www.postgresqlfr.org/">http://www.postgresqlfr.org/</a>. Enfin,

un dernier point, l'équipe web a terminé l'importation du code html/php du site

techdocs dans CVS la semaine dernière. Si vous êtes intéressé pour les aider sur

le développement de techdocs, merci de passer sur le projet pgweb sur GBorg.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de PHP 4.3.5<br />

<a href="http://lxer.com/module/newswire/view/8629/">http://lxer.com/module/newswire/view/8629/</a></li>

<li>Sortie de PostgreSQL AutoDoc 1.22<br />

<a href="http://freshmeat.net/projects/postgresql_autodoc/?branch_id=16831&amp;release_id=155159">http://freshmeat.net/projects/postgresql_autodoc/?branch_id=16831&amp;release_id=155159</a></li>

<li>PostgreSQL pour Solaris ( sur ) sparc 1.42<br />

<a href="http://freshmeat.net/projects/pgsql-solaris/?branch_id=48914&amp;release_id=155368">http://freshmeat.net/projects/pgsql-solaris/?branch_id=48914&amp;release_id=155368</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Guide pratique (HOWTO) PostgreSQL + Crystal Reports<br />

<a href="http://techdocs.postgresql.org/techdocs/crystalreports.php">http://techdocs.postgresql.org/techdocs/crystalreports.php</a></li>

<li>Open Source, 2è partie<br />

<a href="http://www.informationweek.com/story/showArticle.jhtml?articleID=18402795">http://www.informationweek.com/story/showArticle.jhtml?articleID=18402795</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>OSCon: Portland, OR. USA: du 26 au 30 juillet<br />

Il y aura une conférence PostgreSQL avec la participation de plusieurs membres de la communauté.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 29 mars 2004 ==</h2>

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

<hr />

<p><strong>Ajout de dernière minute par Tom Lane (voir son

<a href="http://archives.postgresql.org/pgsql-announce/2004-03/msg00009.php">message sur pgsql-advocacy</a>)&nbsp;:</strong><br />

Petite correction&nbsp;: SET WITHOUT OIDS n'a <strong>pas</strong> été supprimé.

Seule son ancienne implémentation a fait l'objet d'une suppression. Nous utilisons

maintenant en interne "DROP COLUMN oid".</p>