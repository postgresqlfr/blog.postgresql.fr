---
layout: post
title: "PostgreSQL Weekly News - 1er mars 2004"
author: "gleu"
redirect_from: "index.php?post/drupal-355 "
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 1er mars 2004 ==</h2>

<p>Le travail sur la version 7.3.6 est pratiquement terminé, donc gardez

un oeil sur la liste de diffusion -announce ou sur le site web PostgreSQL pour

une annonce complète cette semaine. Après ça, la 7.4.2 sera préparée, donc nous

ne devrions pas la voir avant la semaine prochaine.<!--break-->

</p>

<p>Entre temps, le travail sur la 7.5 continue à un bon rythme. Le

lancement de postmaster a été modifié pour déterminer directement le nombre

maximum de fichiers ouvrables et le nombre de fichiers déjà ouverts, ce qui

élimine les problèmes rencontrés par des informations peu fiables dans

sysconf(_SC_OPEN_MAX). Les appels opendir/closedir dirigés vers le moteur ont

été remplacés par les routines AllocateDir et FreeDir car elles n'échouent pas

sur les conditions EMFILE/ENFILE si possible et empêchent les pertes de

descripteurs de répertoires si un elog() arrive alors qu'un répertoire est

ouvert. Un bogue causant un arrêt brutal lorsque les arguments du type d'une

ligne pour des fonctions plpgsql étaient NULL a été corrigé. La fonction

remove_redundent_join_clauses() de l'optimiseur a été ajusté pour s'assurer

qu'il supprime la clause la plus dépensière, ce qui fait une plus grosse

différence car nous sommes capable de gérer des sous-requêtes (select) avec des

clauses. Un bogue concernant les alignements de données du type anyarray a été

corrigé dans pg_statistic. Ceci a nécessité un changement dans les tables

système, donc bien qu'il a été appliqué à la version 7.4.x, il sera seulement

disponible pour les nouvelles installations. Il existe un moyen de contourner

ceci, vous pouvez trouver ça dans les archives de la liste de diffusion si

vous avez besoin d'utiliser anyarray avec des valeurs nécessitant un

alignement double.</p>

<p>Maintenant, l'outil pg_dump initialisera le codage client au début du

fichier de sauvegarde suivant le codage de la base de données sauvegardée. Ceci

devrait aider lors de l'importation de bases de données qui pourraient ne pas

avoir le même codage par défaut. Quelques améliorations ont été apportées pour

accroître la solidité de dblink lorsque celui-ci doit gérer des types de données

personnalisés. Ceci sera particulièrement profitable aux modules comme tsearch2.

La fonctionnalité "dollar quoting" souvent discutée a eu sa première implémentation

ajoutée à l'analyseur côté moteur, psql et plpgsql. Il existe encore du travail à

faire pour terminer cette fonctionnalité mais ce début montre que les choses

sérieuses ont commencé.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de phpPgAdmin 3.3<br />

<a href="http://www.postgresql.org/news/171.html">http://www.postgresql.org/news/171.html</a></li>

<li>Sortie de la nouvelle génération des interfaces Tcl pour PostgreSQL avec pgtclng 1.5.0<br />

<a href="http://archives.postgresql.org/pgsql-interfaces/2004-02/msg00085.php">http://archives.postgresql.org/pgsql-interfaces/2004-02/msg00085.php</a></li>

<li>Sortie de OpenPKG 2.0<br />

<a href="http://lxer.com/module/newswire/view/5718/">http://lxer.com/module/newswire/view/5718/</a></li>

<li>Postgres Forms (pfm) disponible en tant que version beta<br />

<a href="http://gborg.postgresql.org/project/pfm/news/newsfull.php?news_id=160">http://gborg.postgresql.org/project/pfm/news/newsfull.php?news_id=160</a></li>

</ul>

<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Portage d'applications Visual Basic vers Linux<br />

<a href="http://www.newsforge.com/programming/04/02/25/1959200.shtml">http://www.newsforge.com/programming/04/02/25/1959200.shtml</a></li>

<li>L'utilisation des CRM dynamiques est-elle en augmentation ?<br />

<a href="http://www.intelligententerprise.com/showArticle.jhtml?articleID=17800078&amp;pgno=2">http://www.intelligententerprise.com/showArticle.jhtml?articleID=17800078&amp;pgno=2</a></li>

<li>LHelp.com débute dans le marché indien avec iCustomer<br />

<a href="http://www.cxotoday.com/cxo/jsp/index.jsp?section=News&amp;file=template0.jsp&amp;subsection=Software&amp;storyid=690">http://www.cxotoday.com/cxo/jsp/index.jsp?section=News&amp;file=template0.jsp&amp;subsection=Software&amp;storyid=690</a></li>

<li>Zinf: La réponse Linux à iTunes (blog)<br />

<a href="http://thelostolive.net/tlo/comments.php?id=2005_0_1_0_C">http://thelostolive.net/tlo/comments.php?id=2005_0_1_0_C</a></li>

<li>MySQL et les séquences (blog)<br />

<a href="http://www.evilmagic.net/archives/2004_02_28.html">http://www.evilmagic.net/archives/2004_02_28.html</a></li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>Chemnitzer Linux-Tag: Chemnitz, Germany: 6 au 7 mars<br />

Peter Eisentraut organise un tour de table et fera une présentation<br />

<a href="http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/">http://www.tu-chemnitz.de/linux/tag/2004/allgemeines/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 1er mars 2004 ==</h2>

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