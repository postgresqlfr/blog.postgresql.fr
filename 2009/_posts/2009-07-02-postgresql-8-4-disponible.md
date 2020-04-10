---
layout: post
title: "PostgreSQL 8.4 disponible"
author: "sas"
redirect_from: "index.php?post/2009-07-02-postgresql-8-4-disponible "
---



<h1>PostgreSQL 8.4</h1>

<p><strong>1er juillet 2009</strong> Le groupe de développement mondial de PostgreSQL (PGDG) a publié la version 8.4, dans la continuité du développement rapide de ce SGBD avancé.

</p>

<p>

Cette version apporte un nombre considérable d'améliorations facilitant plus encore l'administration, le requêtage et la programmation des bases de données PostgreSQL.

</p>

<p>

Les 293 fonctionnalités nouvelles ou améliorées sont autant de raisons supplémentaires de choisir PostgreSQL pour vos projets futurs.</p>

<h2>Contenu</h2>

<p>

&nbsp; <a href="#original_release">Texte d'origine</a><br />

&nbsp; <a href="#additional_features">Liste des fonctionnalités</a><br />

&nbsp; <a href="#download">Où la télécharger</a><br />

&nbsp; <a href="#docs">Documentation</a><br />

&nbsp; <a href="#license">Licence</a><br />

&nbsp; <a href="#contact">Contacts</a><br />

&nbsp; <a href="#quoted_companies">Informations concernant les sociétés citées</a><br />

&nbsp; <a href="#companies">Support commercial</a></p>

<h2>Texte d'origine</h2>

<p><strong>1er juillet 2009</strong> Le groupe de développement mondial de PostgreSQL (PGDG) a publié la version 8.4, dans la continuité du développement rapide de ce SGBD avancé.

</p>

<p>

Cette version apporte un nombre considérable d'améliorations facilitant plus encore l'administration, le requêtage et la programmation des bases de données PostgreSQL.

</p>

<p>

Les 293 fonctionnalités nouvelles ou améliorées sont autant de raisons supplémentaires de choisir PostgreSQL pour vos projets futurs.</p>

<p>Les modifications les plus nombreusses concernent des outils et commandes d'administration et de surveillance nouveaux ou améliorés. Tout utilisateur trouvera son outil préféré pour faciliter son utilisation quotidienne de PostgreSQL et améliorer sa productivité.</p>

<p><em>«&nbsp;Nous utilisons PostgreSQL depuis 7 ans maintenant, et attendons beaucoup des nombreuses fonctionnalités de PostgreSQL 8.4, notamment les droits de niveau colonne, les locales par base, les correspondances partielles d'index GIN et les exceptions utilisateur&nbsp;»,</em> déclare Jeffrey Webster, CTO de ZooLoo.com. <em>«&nbsp;PostgreSQL nous a permis de croître sans sacrifier l'intégrité des données.&nbsp;»</em></p>

<p>Parmi les améliorations les plus populaires, citons&nbsp;:</p>

<ul>

<li><strong>la restauration parallèle de bases</strong>, accélarant jusqu'à un facteur 8 les restaurations&nbsp;;</li>

<li><strong>les droits de niveau colonne</strong>, permettant un contrôle plus granulaire des données sensibles&nbsp;;</li>

<li><strong>le support des interclassement par base</strong>, améliorant l'utilisabilité de PostgreSQL en environnement multi-lingual&nbsp;</li>

<li><strong>les mises à jour en place</strong> à travers pg_migrator bêta, permettant des mises à jour de 8.3 vers 8.4 sans interruption de service excessive&nbsp;</li>

<li><strong>de nouveaux outils de requêtage</strong>, donnant aux administrateurs une meilleure compréhension de l'activité des requêtes.</li>

</ul>

<p>La version 8.4 facilite l'analyse de données au travers des fonctionnalités ANSI SQL 2003 étendues de <strong>fonctions de fenêtrage</strong>, <strong>d'expressions de table commune</strong> et de <strong>jointures récursives</strong>.

</p>

<p>

<em>«&nbsp;Ces structures de requête accroissent l'expressivité du dialecte SQL de PostgreSQL en permettant aux utilisateurs de poser d'intéressantes questions en une seule requête. Chose impossible jusque-là.&nbsp;»</em>, explique Sailesh Krishnamurthy, fondateur de Truviso.

</p>

<p>Les améliorations des procédures stockées, telles que les <strong>paramètres par défaut</strong> et les <strong>paramètres de nombre variable</strong>, simplifient la programmation serveur.</p>

<p>La nouvelle version accélère également les performances applicatives, comme le commente Kevin Grittner, administrateur de bases de données au sein des systèmes de la cour du Wisconsin, <em>«&nbsp;Chaque version majeure apporte son lot d'amélioration des performances de PostgreSQL. La version 8.4 a ajouté de nombreuses optimisations, telles que les semi-jointures et les anti-jointures, ce qui améliore considérablement les temps d'exécution de nos requêtes les plus gourmandes.&nbsp;»</em></p>

<p>Ces fonctionnalités signifient que PostgreSQL 8.4 permettra de servir encore plus d'utilisateurs, comme le projet OpenStreetMap. <em>«&nbsp;Lorsque nous avons planifié la nouvelle version de l'API OpenStreetMap, il apparaissait évident que nous avions besoin d'une base de données de renommée mondiale, qui non seulement fournirait les bonnes fonctionnalités, mais en plus se comporterait correctement à notre échelle. Bien qu'il existe de nombreuses bases de données libres, PostgreSQL était un choix évident.&nbsp;»</em>, déclare Tom Hughes, administrateur système chez OpenStreetMap.</p>

<h2>Version étendue</h2>

<h2>Liste des fonctionnalités</h2>

<p>

La version 8.4 offre un nombre de nouvelles fonctionnalités sans précédent. Nous avons créé de nouvelles pages pour les présenter&nbsp;:

</p>

<ul>

<li><a href="/about/press/features84">Liste complète des fonctionnalités (en anglais)</a></li>

<li><a href="/about/featurematrix">Matrices des fonctionnalités (en anglais)</a></li>

<li><a href="/docs/8.4/static/release-8-4.html">Notes de version</a></li>

</ul>

<h2>Téléchargements</h2>

<ul>

<li><a href="/download">Pages de téléchargement</a>, avec des liens vers les installeurs et les outils.</li>

<li><a href="/ftp/source/v8.4.0">Code source</a></li>

<li><a href="/download/windows">Installeurs Windows</a></li>

<li><a href="/download/linux">Installeurs Linux</a> et dépôts des paquets</li>

<li><a href="/download/solaris">Paquets Solaris</a></li>

<li><a href="/download/macosx">Installeurs Mac OSX</a></li>

<li><a href="/download/freebsd">Portages FreeBSD</a></li>

<li><a href="http://pgfoundry.org/projects/pg-migrator/">Projet pg_migrator</a></li>

<li><a href="http://www.pgfoundry.org">Composants optionnels et additiels</a></li>

<li><a href="http://www.postgresql.org/download/product-categories">Logiciels liés et commerciaux</a></li>

</ul>

<h2>Documentation</h2>

<p>La documentation HTML et les pages de manuel sont installées avec PostgreSQL, mais n'hésitez pas à parcourir, chercher et commenter notre <a href="/docs/8.4/interactive">documentation en ligne</a>, exhaustive et interactive.</p>

<h2>License</h2>

<p>

PostgreSQL utilise la <a href="/about/licence">licence BSD</a>, qui ne nécessite que le maintien des informations de licence et de copyright dans le code source sous licence. Cette

<a href="http://www.opensource.org/licenses/bsd-license.php">licence certifiée par l'OSI</a> est largement appréciée, flexible et compatible avec les contraintes du monde des affaires, puisqu'elle ne restreint pas l'utilisation de PostgreSQL avec les applications commerciales et proprétaires. Associée au support de multiples compagnies et à une possession publique du code, la licence BSD rend PostgreSQL très populaire au sein des revendeurs souhaitant embarquer une base dans leurs produits sans crainte d'une redevance, de verrous vendeur ou de modification de la licence.

</p>

<h2>Contacts</h2>

<p>Web Pages</p>

<ul>

<li><a href="http://www.postgresql.org">Page d'accueil PostgreSQL</a></li>

<li><a href="http://www.postgresqlfr.org">La page d'acceuil de l'association francophone</a></li>

</ul>

<p>Requêtes presse</p>

<p>France et Europe francophone<br />

Stéphane A. Schildknecht<br />

<a href="fr@postgresql.org">fr@postgresql.org</a><br />

+33 953 699 712</p>

<p>Pour les contacts dans les autres régions, consulter <a href="/about/press/contact">notre page de contacts internationaux.</a></p>

<h2>Informations concernant les sociétés citées et texte des citations</h2>

<p>Les contacts suivants sont exclusivement anglophones.</p>

<p><em>«&nbsp;Nous utilisons PostgreSQL depuis 7 ans maintenant, et attendons beaucoup des nombreuses fonctionnalités de PostgreSQL 8.4, notamment les droits de niveau colonne, les locales par base, les correspondances partielles d'index GIN et les exceptions utilisateur&nbsp;»,</em> déclare Jeffrey Webster, CTO de ZooLoo.com. <em>«&nbsp;PostgreSQL nous a permis de croître sans sacrifier l'intégrité des données.&nbsp;»</em><br />

Contact&nbsp;: <a href="mailto:melissa@zooloo.com">Melissa</a> ou visiter <a href="http://www.zooloo.com/">ZooLoo.com</a></p>

<p><em>«&nbsp;Chaque version majeure apporte son lot d'amélioration des performances de PostgreSQL,&nbsp;»</em>

déclare Kevin Grittner, administrateur de bases de données, Consolidated Court Automation Programs, Wisconsin Court System.

<em>«&nbsp;La version 8.4 a ajouté de nombreuses optimisations, telles que les semi-jointures et les anti-jointures, ce qui améliore considérablement les temps d'exécution de nos requêtes les plus gourmandes.&nbsp;»</em><br />

Contact&nbsp;: <a href="mailto:Kevin.Grittner@wicourts.gov">Kevin Grittner</a> ou visiter <a href="http://www.wicourts.gov/">Wisconsin Court System</a> </p>

<p><em>«&nbsp;Ces structures de requête accroissent l'expressivité du dialecte SQL de PostgreSQL en permettant aux utilisateurs de poser d'intéressantes questions en une seule requête. Chose impossible jusque-là.&nbsp;»</em>, explique Sailesh Krishnamurthy, fondateur de Truviso.<br />

Contact&nbsp;: <a href="mailto:info@truviso.com">Info e-mail</a> ou visiter <a href="http://www.truviso.com">Truviso</a>.</p>

<p><em>«&nbsp;Lorsque nous avons planifié la nouvelle version de l'API

OpenStreetMap, il apparaissait évident que nous avions besoin d'une base de

données de renommée mondiale, qui non seulement fournirait les bonnes

fonctionnalités, mais en plus se comporterait correctement à notre échelle.

PostgreSQL nous permet de supporter la cohérence de la base de données à l'aide des clés étrangères et des mises à jours transactionnelles, tout en donnant à nos administrateurs les outils requis pour travailler sur notre base de 850 Go, tout en maintenant le développement continuel des structures de nos tables et les aspects opérationnels tels que les instantanés cohérents.Bien qu'il existe de nombreuses bases de données libres, PostgreSQL était un choix évident.&nbsp;»</em> déclare Tom Hughes, administrateur projet chez OpenStreetMap.<br />

Contact&nbsp;: <a href="mailto:webmaster@openstreetmap.org">Tom Hughes</a> ou visiter <a href="http://www.openstreetmap.org">OpenStreetMap</a>.</p>

<h2>Support commercial</h2>

<p>PostgreSQL bénéficie du support de nombreuses companies, qui financent les développeurs, aident à l'hébergement et apportent un support financier. Les principaux mécènes sont mentionnés sur <a href="/about/sponsors">page des mécènes du développement.</a></p>

<p>Il existe également une vaste communauté de <a href="/support/professional_support">compagnies fournissant du support PostgreSQL</a>, du consultant indépendant aux compagnies multi-nationales.</p>

<p><a href="/about/donate">Dons</a> acceptés avec joie.</p>