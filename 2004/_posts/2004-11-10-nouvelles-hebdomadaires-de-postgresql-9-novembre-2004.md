---
layout: post
title: "== Nouvelles Hebdomadaires de PostgreSQL - 9 Novembre 2004 =="
author: "jca"
redirect_from: "index.php?post/drupal-49 "
---


<em>Dans son mail du 9 novembre, Robert Treat nous annonçait ceci :</em><br />

<p>Avec la résolution des problèmes persistants concernant les

<em>tablespace</em>, il ne restait plus qu'une paire de points à régler

concernant Win32 et quelques modifications mineures avant qu'il ne

soit possible de sortir la version candidate officielle. Une

discussion sur la liste <tt>hackers</tt> a permis d'établir qu'il sera

produit une ou plusieurs versions béta qui sera suivie d'un gel.

Cet événement aura lieu probablement dans le courant de la semaine,

donc gardez l'oeil ouvert sur l'annonce de la sortie officielle.

</p>

<p>

Comme il est dit au-dessus, le grand changement de la semaine a été

l'implantation d'un espace de tables (<em>tablespace</em>) par défaut pour GUC dont le but est d'être utilisée implicitement chaque fois qu'il ne sera pas donné de <em>tablespace</em> explicite. Ceci permet de corriger les restaurations de <tt>pg_dump</tt> sur des bases de données avec des implémentations de <em>tablespace</em> différentes. Nous avons

également pu voir des améliorations du code dans <tt>path.c</tt> et <tt>exec.c</tt>

afin de prendre en compte les points concernant les disques

Windows et les spécifications réseau et afin de se débarrasser de

«&nbsp;.&nbsp;» et de «&nbsp;..&nbsp;» lors de la construction de chemins à partir de

différents éléments le constituant. Du code a été ajouté à la

fonction interne <tt>find_my_exec()</tt> afin de lui permettre de résoudre

les liens symboliques vers leur emplacement réel. Une partie du

code de <tt>SocAddr_cidr_mask</tt> qui n'était pas portable a été corrigé.

Un bug dans la commande <tt>REVOKE</tt> dans <tt>ecpg</tt> a été corrigé. Les

fichiers temporaires dans le paquetage <tt>findoidjoins</tt> des

contributions sont maintenant créés de manière sécurisée. Quelques

fichiers additionnels ont été ajoutés dans <tt>dbmirror</tt> afin d'en

améliorer l'installation. Les paquetages <tt>contrib/xml</tt> et

<tt>contrib/xml2</tt> ont été modifié afin de prendre en compte les options

pour <tt>libxml2</tt>. Les commandes <tt>\e</tt> et <tt>\</tt>! de <tt>psql</tt> ont été corrigées pour

win32. La complétion automatique (tab) pour les arguments de <tt>CREATE

TABLESPACE</tt> dans <tt>psq</tt>l a été ajoutée. Les messages d'erreur on été

clarifiés à plusieurs endroits dans le backend et des mises à jour

de la documentation pour reindex, la configuration en cours de

fonctionnement, PITR et les variables GUC.

</p>

<p>

L'autre grand sujet de discussion de cette semaine a été la

retranscription des listes de mails PostgreSQL en newsgroup

officiels par opposition à la situation actuelle où ils sont

officieux et que certains serveurs les prennent en compte alors que

d'autres non. Comme les listes ont toujours été une passerelle vers

usenet, celà nous offre l'opportunié de se comporter

de manière civilisée (au sens internaute du terme) tout en ayant un

faible impact sur les utilisateurs actuels. Si vous souhaitez suivre

la discussion, vous pouvez lire la «&nbsp;requête de discussion&nbsp;» sur <a href="http://groups.google.com/groups?q=g:thl849962492d&amp;dq=&amp;hl=en&amp;lr=&amp;selm=1099584239.20542%40isc.org">http://groups.google.com/groups?q=g:thl849962492d&amp;dq=&amp;hl=en&amp;lr=&amp;selm=1099584239.20542%40isc.org  </a>

</p>

<!--more-->


<h2>== Nouvelles concernant les produits autour de PostgreSQL ==</h2>

<p>

SHSQL - SQL pour les scripts shell LINUX/UNIX<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-11/msg00142.php">http://archives.postgresql.org/pgsql-general/2004-11/msg00142.php</a>

</p>

<h2>== PostgreSQL dans la presse ==</h2>

<p>

Les ordinateurs du centre informatique de l'Université d'Oxford

migrent vers PostgreSQL<br />

<a href="http://news.zdnet.co.uk/software/applications/0,39020384,39173013,00.htm">http://news.zdnet.co.uk/software/applications/0,39020384,39173013,00.htm</a>

</p>

<p>

L'open source améliore les processus dans les laboratoires de

retraitement des eaux<br />

<a href="http://www.tectonic.co.za/view.php?id=377">http://www.tectonic.co.za/view.php?id=377</a>

</p>

<p>

Mathématiques amusantes avec MySQL (blog)<br />

<a href="http://joseph.randomnetworks.com/archives/2004/11/08/mysqls-funny-math/">http://joseph.randomnetworks.com/archives/2004/11/08/mysqls-funny-math/</a>

</p>

<p>

PostgreSQL et les systèmes de fichiers Linux (blog)<br />

<a href="http://blog.linuxinternet.org/archives/2004/11/03/postgresql-and-linux-filesystems/">http://blog.linuxinternet.org/archives/2004/11/03/postgresql-and-linux-filesystems/</a>

</p>

<h2>== Evénements autour de PostgreSQL ==</h2>

<p>

PostgreSQL à la conférence CaFeLUG : Buenos Aires, Argentine: 12 Novembre<br />

Christian Kuroki parlera des fonctionnalités et des bénéfices de

PostgreSQL<br />

<a href="http://www.cafelug.org.ar">http://www.cafelug.org.ar</a>

</p>

<p>

Vanmtagem + Developers 2004: Lisbonne, Portugal: du 15 au 19 Novembre<br />

Plusieurs sessions sur PostgreSQL, modélisation relationnelle, SQL

et plus<br />

<a href="http://www.v-developers.com">http://www.v-developers.com</a>

</p>

<p>

Séminaire PostgreSQL : Ankara, Turquie: 1er December<br />

Devrim Gunduz présentera un séminaore sur les futures

fonctionnalités de PostgreSQL 8.0<br />

<a href="http://seminer.linux.org.tr">http://seminer.linux.org.tr</a>

</p>

<p>

== Nouvelles hebdomadaires de PostgreSQL Weekly - 9 Novembre 2004 ==

Sur le Web:<br />

<a href="http://www.postgresql.org">http://www.postgresql.org</a>

</p>