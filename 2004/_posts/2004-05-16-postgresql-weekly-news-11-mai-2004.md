---
layout: post
title: "PostgreSQL Weekly News - 11 mai 2004"
author: "gleu"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/364"
---


<h2>== Nouvelles hebdomadaires de PostgreSQL - 11 mai 2004 ==</h2>

<p>Avec beaucoup de discussions ces dernières semaines sur les fonctionnalités

intéressantes pour les entreprises, il est agréable de voir une reprise

d'activité pour les ajouts de code même si ce n'était pas pour un des points

favoris. En fait, ce n'est pas tout à fait vrai car certaines modifications de

cette semaine seront très importantes pour quelques personnes&nbsp;; le fait est

qu'un progrès est un progrès et que cette semaine a été un nouveau bon pas en

avant.<!--break-->

</p>

<p>La plus importante fonctionnalité de cette semaine est venue sous la forme

d'une refonte de la commande ALTER TABLE. ALTER TABLE ADD COLUMN supporte

maintenant les valeurs par défaut et les contraintes NOT NULL comme le veulent

les spécifications SQL. Nous avons maintenant une implémentation de ALTER

COLUMN TYPE qui permettra un changement entre deux types de données à condition

que vous indiquiez spécifiquement comment convertir les valeurs. Plusieurs

actions ALTER peuvent être assemblées en une seule commande ALTER (par exemple,

ajouter deux nouvelles colonnes en une seule commande). Enfin, après quelques

discussions, ALTER COLUMN TYPE a été implémenté de manière à ce qu'il préserve

le statut de cluster pour les index qu'il ne modifie pas. La commande ALTER

TABLE CLUSTER ON a été ajouté dans bon nombre d'endroits. Nos remerciements à

Rod Taylor et Tom Lane pour leurs travaux sur ces fonctionnalités très

demandées.</p>

<p>Un travail a été accompli pour que PostgreSQL s'affranchisse de comportements

non désirables pour les locales dans le cas de conversion de lettres ASCII

basiques trouvées dans la langue turque. Toutes les utilisations de strcasecmp

et strncasecmp ont été remplacées par les nouvelles fonctions pg_strcasecmp et

pg_strncasecmp, et les appels directs à toupper et tolower ont été remplacées

par pg_toupper et pg_tolower.  Ces fonctions utilisent les mêmes notions de

gestion de la casse déjà développées pour la conversion de la casse des

identifiants. La partie basée sur les locales a été laissée pour les situations

où nous faisons une simple manipulation des données de l'utilisateur et que

nous n'essayons pas de faire une correspondance avec les chaînes internes,

par exemple la fonction SQL upper().</p>

<p>Tout au long de la semaine a eu lieu d'autres changements plus petits, ceci

incluant : l'utilisation des termes NATURAL CROSS JOIN en concordance avec les

spécifications SQL, la suppression des mots de passe MD5 des utilisateurs

lorsqu'un utilisateur est renommé (car le nom de l'utilisateur est utilisé

comme clé pour le mot de passe MD5), quelques correctifs provenant du groupe

win32 dont celle permettant l'utilisation d'espaces blancs dans le nom du

répertoire d'installation et les expressions des lignes sont maintenant

autorisés à tout endroit dans la syntaxe de l'expression, ce qui signifie que

vous pouvez maintenant passer une construction ROW() à une fonction qui accepte

un paramètre rowtype. C'est une autre étape dans ce travail de promotion des

valeurs rowtype dans la base de données.</p>

<p>Dans les autres nouvelles importantes, la nouvelle infrastructure

d'accueil de projets été officiellement annoncé cette semaine. Il est disponible

sur http://projects.postgresql.org. Actuellement, tous les nouveaux projets sont

les bienvenus et l'équipe souhaite commencer le déplacement des projets de

l'ancien site gborg.postgresql.org assez rapidement. Le nouveau site utilise le

code du projet gforge, un outil collaboratif de développement de logiciels libres

assez populaire. Il est basé sur PostgreSQL et PHP (mais aussi d'autres outils

libres) et dispose d'une communauté de développement motivée. Nous sommes heureux

de faire ce nouveau pas mais nous souhaitons aussi remercier Chris Ryan pour ces

efforts pendant toutes ces années où il a maintenu la communauté gborg.</p>

<!--more-->


<h2>== Nouvelles concernant les produits PostgreSQL ==</h2>

<ul>

<li>Sortie de Bricolage 1.8.0<br />

<a href="http://www.bricolage.cc/releases/1.8.0/">http://www.bricolage.cc/releases/1.8.0/</a></li>

<li>Annonce: PgBrowse-0.9<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-05/msg00199.php">http://archives.postgresql.org/pgsql-general/2004-05/msg00199.php</a></li>

<li>Sortie de PgOleDb version 1.0.0.8<br />

<a href="http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=171">http://gborg.postgresql.org/project/oledb/news/newsfull.php?news_id=171</a></li>

<li>OFIA 2.2 ajoute le support de Linux pour son outil de portail<br />

<a href="http://www.theserverside.com/news/thread.tss?thread_id=25786">http://www.theserverside.com/news/thread.tss?thread_id=25786</a></li>

<li>Nexonia Inc. annonce leur système de rapports de dépenses basé sur le web<br />

<a href="http://www.emediawire.com/releases/2004/5/emw122900.htm">http://www.emediawire.com/releases/2004/5/emw122900.htm</a></li>

</ul>

<h2>== PostgreSQL dans la presse ==</h2>

<ul>

<li>Migration de FileMaker vers PostgreSQL avec FmPro Migrator sur Windows<br />

<a href="http://techdocs.postgresql.org/techdocs/fmpromigrator/fmpro_migrator_win_postgresql_article.php">http://techdocs.postgresql.org/techdocs/fmpromigrator/fmpro_migrator_win_postgresql_article.php</a></li>

<li>pgFoundry ouvert<br />

<a href="http://pgfoundry.org/forum/forum.php?forum_id=47">http://pgfoundry.org/forum/forum.php?forum_id=47</a></li>

<li>PostgreSQL 7.4<br />

<a href="http://www.linux-mag.com/2004-02/postgresql_01.html">http://www.linux-mag.com/2004-02/postgresql_01.html</a>

</li>

</ul>

<h2>== Evénements à venir ==</h2>

<ul>

<li>European Regional Open Source Conference&nbsp;: Yerevan, Arménie du 28 au 30 juin<br />

Bruce Momjian parlera pendant la conférence<br />

<a href="http://www.opensourcearmenia.com/osconference">http://www.opensourcearmenia.com/osconference</a></li>

<li>OSCon&nbsp;: Portland, OR. USA du 26 au 30 juillet<br />

Il y aura un thème PostgreSQL avec la participation d'un grand nombre de

membres de la communauté<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a></li>

</ul>

<h2>== Nouvelles hebdomadaires PostgreSQL - 11 mai 2004 ==</h2>

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