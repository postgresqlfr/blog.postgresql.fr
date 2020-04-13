---
layout: post
title: "Sortie de PostgreSQL 8.1"
author: "fsuter"
redirect_from: "index.php?post/drupal-133 "
---


<p></p>

<!--more-->


<p><em>Traduction officielle du dossier de presse de PostgreSQL 8.1</em></p>

<h2><a name="original_release">Communiqué

de presse</a></h2>

<p>8 Novembre 2005, Francfort, Allemagne (OpenDBCon) –

Le PostgreSQL Global Development Group est heureux d'annoncer

la sortie de la version 8.1 de PostgreSQL, qui conforte sa place de

système de base de données OpenSource le plus sophistiqué du monde.

<br />

Conçue, réalisée et testée par une vaste communauté et

soutenue par un nombre grandissant de sponsors et de

sociétés de services, la version 8.1 va étendre la

portée du développement d'applications

appuyées sur PostgreSQL.

<br />

Cette nouvelle version apporte une

amélioration des performances et le support de

fonctionnalités SQL avancées permettant le

support d'entrepôts de données («&nbsp;DataWarehouses&nbsp;»)

plus étendus, un plus grand nombre de transactions

ainsi que la réalisation de logiciels distribués

complexes.</p>

<p>Ces améliorations renforceront le succès remporté par la version précédente.

<br />

La version 8.0 a été téléchargée un million de fois durant les sept premiers mois

de sa diffusion, contre 300&nbsp;000 téléchargements (pour une période

équivalente) de la version antérieure.</p>

<p>«&nbsp;Le projet gagne clairement en force dans l'esprit

des utilisateurs de bases de données&nbsp;»

indique Lance Obermeyer, Directeur des Produits chez Pervasive Software,

une des entreprises sponsorisant PostgreSQL.

«&nbsp;Au vu de l'intérêt croissant pour les infrastructures

logicielles OpenSource, nous nous attendons à ce que PostgreSQL

prenne une ampleur encore plus importante.&nbsp;»</p>

<h3>Nouvelles fonctionnalités avancées</h3>

<p><strong>Rôles&nbsp;:</strong>

PostgreSQL supporte désormais les «&nbsp;rôles

de bases de données&nbsp;», ce qui simplifie la gestion de grands

nombres d'utilisateurs avec des droits d'accès complexes.</p>

<p><strong>Paramètres IN/OUT&nbsp;:</strong>

Les fonctions de PostgreSQL acceptent maintenant les paramètres

IN, OUT et INOUT, ce qui améliore sensiblement le support de

logiques applicatives complexes pour les plateformes J2EE et .NET.</p>

<p><strong>Commit à deux phases (2PC)&nbsp;:</strong>

Réclamé depuis longtemps pour les applications WAN et les centres de calcul

hétérogènes, ce dispositif permet des transactions ACID entre des serveurs distants.</p>

<h3>Amélioration des performances</h3>

<p><strong>Amélioration des performances sur les multiprocesseurs (SMP)</strong>&nbsp;:

le gestionnaire de la version 8.1 a été retravaillé de manière à fournir une

augmentation quasi-linéaire des performances par rapport au nombre de processeurs,

apportant des gains significatifs d'exécution sur des unités centrales de type

8-way, 16-way, double-coeur et multi-coeur.</p>

<p><strong>Parcours de cartes («Bitmap scan»)</strong>&nbsp;:

les index seront dynamiquement convertis en cartes (bitmaps) en

mémoire lorsqu'un cas approprié se présente, soit

une exécution jusqu'à vingt fois plus rapide

lors d'interrogations d'index complexes sur de très grandes

tables.

Cela contribue également à simplifier la gestion de la base de données en réduisant

considérablement le besoin d'index à colonnes multiples.</p>

<p><strong>Partitionnement des tables</strong>&nbsp;:

le planificateur de requêtes est maintenant capable d'éviter de

parcourir des sections entières d'une grande table en utilisant une

technique connue sous le nom d'«&nbsp;exclusion de contraintes&nbsp;».

Semblable à la division des tables, que l'on rencontre dans d'autres

systèmes, ce dispositif améliore la vitesse d'exécution et la gestion

des données pour des tables de plusieurs gigaoctets.</p>

<p><strong>Verrous de ligne partagés</strong>&nbsp;:

Le verrou «&nbsp;plus fin que la ligne&nbsp;»

utilisé par PostgreSQL autorise des niveaux encore plus

élevés de concurrence d'accès grâce à l'ajout du verrou de

ligne partagé pour les clefs secondaires.

Les verrous partagés améliorent l'insertion et la mise à jour dans

beaucoup d'applications avec un gros volume de transactions

(«&nbsp;Online Transaction Processing&nbsp;» ou «&nbsp;OLTP&nbsp;»).</p>

<p>«&nbsp;PostgreSQL 8.1 a permis une énorme augmentation

de performances, sur notre serveur de production, un Opteron bi-processeur,&nbsp;»

a déclaré Merlin Moncure, administrateur de base de données chez Reliable Computer

Solutions.

«&nbsp;En particulier, j'ai observé une réduction d'environ 20% des temps d'exécution

pour les requêtes simples et de 20% supplémentaires de la charge des processeurs,

soit une amélioration de 20 à 40% des caractéristiques de la charge du serveur.&nbsp;»</p>

<p>La version 8.1 compte plus de 120 autres améliorations, dont

certaines sont détaillées dans le dossier de presse.</p>

<h3>A propos de PostgreSQL</h3>

<p>PostgreSQL est le fruit du travail collectif de centaines de

développeurs qui a débuté il y a presque vingt ans à

l'Université de Californie à Berkeley.

<br />

Assurant de longue date les fonctionnalités nécessaires dans l'entreprise

telles que les transactions, les procédures et fonctions stockées,

les triggers, les sous-requêtes, PostgreSQL est utilisé

dans les branches métiers ou les agences gouvernementales

les plus exigeantes.

<br />

PostgreSQL est distribué sous licence BSD,

qui permet l'utilisation et la distribution sans rétribution

pour toutes les utilisations (commerciales comme non commerciales).</p>

<h2><a name="additional_features">Autres fonctionnalités de cette version</a></h2>

<p>Parmi les 120 nouveautés et améliorations non mentionnées par le

communiqué de presse (<em>cf. supra</em>), on trouve&nbsp;:</p>

<ul>

<li><strong>GiST&nbsp;:</strong>

Le «&nbsp;Generalised Search Tree (GiST)&nbsp;» de PostgreSQL

(mécanisme d'indexation optionnel) a été amélioré pour supporter la

concurrence d'accès à haute vitesse et les performances en mise à jour que l'on n'obtient

généralement qu'en utilisant des index de type B-Tree.

GiST est la base de l'indexation en texte intégral (TSearch2), des systèmes

d'information géographiques (GIS) et des requêtes d'analyse

d'indexation arborescente de PostgreSQL.

Grâce à ce perfectionnement, les requêtes sur les types de données complexes

maintiennent de bonnes performances dans les applications à haute disponibilité.</li>

<li><strong>Réécriture de COPY&nbsp;:</strong>

La commande COPY a été réécrite pour un traitement

jusqu'à 30% plus rapide des données en bloc.

En ajoutant à cela les améliorations de charge obtenues avec CSV,

ceci rend le chargement de grosses bases de données dans

PostgreSQL plus rapide que jamais.</li>

<li><strong>Mémoire partagée 64-bit&nbsp;:</strong> le gestionnaire de tampons

peut maintenant utiliser jusqu'à deux téraoctets de RAM sur les plateformes

64-bits, préparant ainsi PostgreSQL pour les serveurs à grande mémoire du futur.

</li>

<li><strong>Autovacuum intégré&nbsp;</strong>:

le «&nbsp;ramasse-miettes&nbsp;» de base de données de PostgreSQL a

été amélioré et intégré dans le programme principal du serveur,

ce qui rend les serveurs PostgreSQL plus simples à installer et administrer.</li>

<li><strong>Accélération des agrégations&nbsp;:</strong>

les fonctions d'agrégation ont été améliorées afin

d'accélérer encore les requêtes d'analyse.

Les développeurs ont à la fois réécrit la gestion de la mémoire pour

les agrégations et optimisé l'indexation de MIN() et de MAX().</li>

<li><strong>Fonctions d'administration&nbsp;:</strong>

de nouvelles fonctions ont été ajoutées pour récupérer des

informations concernant le serveur et effectuer des tâches administratives,

le tout en ligne de commande PSQL.</li>

<li><strong>Fonctions de compatibilité&nbsp;:</strong>

les fonctions lastval(), greatest() et least() ont été ajoutées pour

faciliter le portage des applications MySQL et Oracle.</li>

</ul>

<p>La liste complète des améliorations de la version 8.1 se trouve dans les

<a href="http://www.postgresql.org/docs/current/static/release.html">notes de version</a>.</p>

<h2><a name="quoted_companies">Entreprises citées</a></h2>

<p><strong>Pervasive Software</strong> (NASDQ:&nbsp; PVSW)

fournit un logiciel d'infrastructure de données qui aide les

sociétés à faire valoir les données qu'elles ont

accumulées.

Depuis plus de vingt ans, Pervasive fournit la

meilleure combinaison de performance, fiabilité,

fonctionnalité et connectivité. Des dizaines de

milliers de clients dans pratiquement chaque branche de l'économie,

et dans plus de 150 pays autour du monde, font confiance à

Pervasive pour contrôler, intégrer, analyser et

sécuriser leurs données critiques.

<br />

Pour plus d'information, visitez

<a href="http://www.pervasive.com/company/">notre site web</a>.</p>

<p><strong>Reliable Computer Solutions</strong> fournit un logiciel d'ERP et du

conseil pour des manufactures régionales.

Nous sommes spécialisés dans des solutions informatiques

complètes pour l'industrie des mobile homes et des maisons

préfabriquées.

Notre produit phare, ESP, pilote des activités de manufacture

d'une valeur de plus d'un milliard de dollars.

<br />

Pour plus d'informations, contactez Merlin Moncure (en anglais

uniquement)&nbsp;: merlin.moncure@rcsonline.com,

téléphone&nbsp;: (01) 269-483-1234 x304.</p>

<h2>Téléchargement</h2>

<ul>

<li><a href="http://www.postgresql.org/ftp/latest/">Liste des miroirs FTP</a></li>

<li><a href="http://www.postgresql.org/download/bittorrent">Bittorrent</a></li>

<li><a href="http://www.postgresql.org/ftp/binary/v8.1/win32/">Version installable pour MS-Windows</a> (aussi disponible via Bittorrent)</li>

<li><a href="http://www.postgresql.org/ftp/binary/v8.1/">Autres versions compilées, en particulier Linux, Mac OS X et Solaris</a></li>

<li><a href="http://sourceforge.net/projects/pgsql/">SourceForge</a> (y compris la version MS-Windows)</li>

</ul>

<h2><a name="docs">Documentation</a></h2>

<ul>

<li><a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/"> Documentation officielle </a></li>

<li><a href="http://techdocs.postgresql.org/">TechDocs</a></li>

<li><a href="http://www.varlena.com/GeneralBits">General Bits</a></li>

</ul>

<h2><a name="license">Licence</a></h2>

<p>PostgreSQL est diffusé sous la <a href="http://www.postgresql.org/about/licence">licence BSD</a>,

qui exige seulement que le code source concerné mentionne le copyright et la licence elle-même.

Cette <a href="http://www.opensource.org/licenses/bsd-license.php">licence certifiée OSI</a>

ne limite pas l'utilisation de PostgreSQL par des applications commerciales (propriétaires ou non).

L'existence de nombreuses entreprises susceptibles d'assurer le support technique et l'accès public

au code source sous licence BSD rendent PostgreSQL extrêmement populaire auprès des intégrateurs,

l'ensemble permettant d'éviter  honoraires, obligations envers un seul fournisseur, ou encore

changements dans les termes de la licence.</p>

<h2><a name="contact">Contacts</a></h2>

<p><a href="http://www.postgresqlfr.org/">Site web de PostgreSQL en français </a></p>

<p><a href="http://www.postgresql.org/">Site web de PostgreSQL en anglais</a></p>

<p>Pour toute information&nbsp;:<br />

François Suter

<br />

Contact Régional PostgreSQL<br />

+41 22 777 01 50

<br />

<a href="mailto:fr@postgresql.org">fr@postgresql.org</a></p>

<p>Vous trouverez ici <a href="http://www.postgresql.org/about/press/contact">notre liste de contacts

internationaux</a>.</p>

<h2><a name="companies">Sponsors</a></h2>

<p>PostgreSQL bénéficie du soutien de nombreuses sociétés, qui commanditent des

développeurs, fournissent des ressources d'hébergement, et apportent une aide

financière.

Les plus grands sponsors sur le long terme sont énumérés dans notre <a href="http://www.postgresql.org/about/sponsors">page de sponsors</a>.

<br />

Il existe également une vaste communauté proposant du

<a href="http://www.postgresql.org/support/professional_support">support pour PostgreSQL</a>,

que ce soient des consultants indépendants ou des sociétés internationales.</p>

<h2><a name="additional_software">Liens</a></h2>

<p>Autour de PostgreSQL se trouvent encore plus de 100&nbsp;projets

secondaires actifs qui fournissent des solutions de qualité pour

la réplication, la migration, la compatibilité, l'interopérabilité,

la conception, ainsi que des outils d'administration graphiques.</p>

<h3>Projets liés </h3>

<ul>

<li><a href="http://projects.postgresql.org/">pgFoundry</a></li>

<li><a href="http://gborg.postgresql.org/">GBorg</a></li>

</ul>

<h3>Pilotes</h3>

<ul>

<li><a href="http://jdbc.postgresql.org/">JDBC</a></li>

<li><a href="http://pgfoundry.org/projects/psqlodbc/">ODBC</a></li>

<li><a href="http://gborg.postgresql.org/project/npgsql/projdisplay.php">.Net</a></li>

<li><a href="http://search.cpan.org/%7Erudy/DBD-Pg-1.32/Pg.pm">Perl

DBI</a></li>

<li><a href="http://initd.org/projects/psycopg1">Python</a></li>

</ul>

<h3>Fonctionnalités avancées</h3>

<ul>

<li><a href="http://postgis.refractions.net/">Système

d'information géographique (PostGIS)</a></li>

<li><a href="http://openfts.sourceforge.net/">Recherche&nbsp;textuelle

intégrale (OpenFTS)</a></li>

<li><a href="http://www.bizgres.org/">Business

Intelligence/Data Warehousing</a><a href="http://www.bizgres.org/">&nbsp;(Bizgres)</a></li>

</ul>

<h3>Interfaces graphiques</h3>

<ul>

<li><a href="http://www.pgadmin.org/">pgAdmin III</a></li>

<li><a href="http://phppgadmin.sourceforge.net/">phpPgAdmin</a></li>

<li><a href="http://www.pgaccess.org/">pgAccess</a></li>

<li><a href="http://techdocs.postgresql.org/guides/GUITools">Autres

interfaces graphiques </a></li>

</ul>

<h3>Réplication</h3>

<ul>

<li><a href="http://www.slony.info/">Slony-I</a></li>

<li><a href="http://pgfoundry.org/projects/pgpool/">pgPool</a></li>

<li><a href="http://pgfoundry.org/projects/pgcluster/">pgCluster</a></li>

</ul>