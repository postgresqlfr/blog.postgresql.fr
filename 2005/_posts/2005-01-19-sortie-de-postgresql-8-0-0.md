---
layout: post
title: "Sortie de PostgreSQL 8.0.0"
author: "jca"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/65"
---


<p></p>

<!--more-->


<p><em>Traduction officielle du dossier de presse de PostgreSQL 8.0</em></p>

<p>NewYork, le 19 Janvier 2005<br />Le groupe de Développement Global de PostgreSQL vient de produire la version 8.0 du système de gestion de bases de données PostgreSQL, confortant sa place de système de bases de données open source le plus sophistiqué du monde. Cette version, en proposant des fonctionnalités qui n'étaient jusqu'alors présentes que dans les systèmes de bases de données propriétaires les plus coûteux, devrait largement favoriser l'adoption de PosgreSQL par les utilisateurs et les éditeurs de solutions informatiques.

</p>

<p>

En plus des améliorations significatives sur l'extensibilité, les fonctionnalités et la performance, PostgreSQL 8.0 fait la preuve de l'efficacité sans égal du développement open source. Plus d'une douzaine de compagnies, incluant Red Hat, Fujitsu, Afilias, Software Research Associates Inc., 2nd Quadrant et Command Prompt Inc., ainsi que des centaines de développeurs individuels ont contribué à l'ajout des fonctionnalités majeures de la 8.0, dans des proportions qui dépassent toutes les versions précédentes.

</p>

<p>

M. Takyuki Nakazawa, Directeur du groupe base de données open source s'exprime en ces termes : « Nous sommes persuadés que ces fonctionnalités professionnelles attireront beaucoup de nouveaux utilisateurs vers PostgreSQL. » . « Fujitsu est fier du soutien apporté aux contributions de PostgreSQL et de son travail avec la communauté PostgreSQL. Nous souhaitons aider PostgreSQL à devenir le SGBD dominant. »

</p>

<p>

Les nouvelles fonctionnalités comprennent:</p>

<ul>

<li><strong>Support natif de Windows</strong> : PostgreSQL fonctionne maintenant de manière native avec les systèmes Windows et ne nécessite aucune couche d'émulation. Ceci améliore de façon considérable les performances du logiciel par rapport à la version précédente et constitue une alternative très séduisante aux logiciels de base de données propriétaires pour les fournisseurs indépendants de logiciels, les utilisateurs professionnels et les développeurs individuels sous Windows.

</li>

<li>

<strong>Points de retournement</strong> : Cette fonction standard de SQL permet des retours sur des points spécifiques d'une transaction sur la base de données sans que l'ensemble de l'opération soit annulée. Ceci est un avantage pour les développeurs d'applications métiers qui ont besoin de pouvoir effectuer des transactions complexes utilisant des reprises sur erreur.

</li>

<li>

<strong>Récupération par rapport à un point dans le temps</strong> : Cette fonctionnalité permet la restauration compléte des données à partir d'une sauvegarde automatique et continue des transactions effectuées. Ceci est une alternative longtemps attendue aux sauvegardes horaires ou journalières pour les services utilisant PostgreSQL pour des données critiques.

</li>

<li>

<strong>Espaces de tables</strong> : Cruciaux pour les administrateurs de systèmes de data warehouse de multiples-gigaoctets, les espaces de tables permettent le placement des grandes tables et index sur leurs propres disques ou grappes, afin d'améliorer les performances.

</li>

<li><strong>Améliorations de la gestion de la mémoire et des entrées sorties</strong> : L'utilisation des disques et de la mémoire a été optimisée au travers de l'emploi de l'algorithme de Cache à Remplacement Adaptatif, d'un nouveau système d'écriture en tâche de fond et d'une nouvelle fonctionnalité permettant d'effectuer des vacuum différés. Ceci résulte en une charge plus prévisible ainsi qu'une performance plus cohérente lors des pics de charge.

</li>

</ul>

<p>

Javier Soltero, architecte en chef chez Hyperic LLC, a dit « PostgreSQL 8.0 nous apporte un haut niveau de simultanéité d'accès et le débit nécessaire pour notre produit de surveillance HQ. PostgreSQL 8.0 disposant du support natif de Windows, nous pouvons maintenant inclure PostgreSQL dans nos produits et bénéficier de l'extensibilité et de la performance d'ores et déjà prouvées de PostgreSQL. Sa licence nous permet de l'inclure dans notre distribution sans souci de redevances commerciales. »

</p>

<p>En plus de toutes les fonctionnalités incluses dans cette version, PostgreSQL a été étendu par le développement accéléré de composants additifs et optionnels tout au long de l'année passée. L'outil de réplication Slony-I et l'utilitaire de pooling/brokering de connection pgPool sont d'ores et déjà utilisés pour des ensemble de serveurs haute disponibilité. Plusieurs langages de procédures stockées ont été ajoutés ou largement étendus comme PL/Java, PL/PHP et PL/Perl. Les sources de données Npgsql et PGsqlClient .NET ont été améliorées afin de fournir un support aux nouveaux utilisateurs de Windows.

</p>

<p>

Pour obtenir la liste complète et la description de toutes les nouvelles fonctionnalités de la 8.0, référez-vous à notre <a href="http://www.postgresql.org/about/press/presskit80.html.fr">dossier de presse</a>.</p>

<p>

<strong>A propos de PostgreSQL</strong> : PostgreSQL est le fruit du travail collectif de centaines de développeurs, s'appuyant sur un développement entamé il y a presque vingt ans à l'Université de Californie à Berkeley. Avec son support de longue date des fonctionnalités nécessaires dans l'entreprise telles que les transactions, les procédures et fonctions stockées, les triggers, les sous-requêtes, PostgreSQL est utilisé dans les branches métiers ou les agences gouvernementales les plus exigentes. PostgreSQL est distribué sous licence BSD, permettant l'utilisation et la distribution sans rétribution pour les utilisations commerciales et non commerciales.</p>

<p>Pour plus d'information concernant PostgreSQL ou pour le télécharger, visitez: <a href="http://www.postgresqlfr.org/">http://www.postgresqlfr.org/</a> ou <a href="http://www.postgresql.org/">http://www.postgresql.org</a></p>

<h2>Fonctionnalités supplémentaires dans cette version</h2>

<p>En plus des fonctionnalités majeures décrites ci-dessus, d'autres fonctionnalités trés intéressantes pour les utilisateurs de PostgreSQL ont été soit ajoutées soit améliorées.</p>

<ul>

<li><strong>Fonctions</strong> : les fonctions PostgreSQL disposent maintenant de la possibilité de placer une variable à l'intérieur d'une chaîne, permettant ainsi de limiter les erreurs dues à l'imbrication des apostrophes. Par ailleurs, grâce aux nouveaux points de sauvegarde (Savepoints), les fonctions PL/pgSQL sont capables d'une gestion limitée des exceptions grâce à l'utilisation de la clause <code>EXCEPTION</code>.</li>

<li><strong>Conception de base de données</strong> : l'administrateur de la base de données peut maintenant changer le type d'une colonne existante en utilisant ALTER TABLE. La déclaration de colonnes utilisant des types de données composites peut aussi être utilisée, comme il est prévu dans le standard SQL. Enfin, tous les objets de la base supportent <code>CHANGE OWNER</code>.</li>

<li><strong>Import/Export de données</strong> : La commande <code>COPY</code> permet maintenant l'utilisation du format de fichier texte très répandu CSV (valeurs séparées par des virgules). Ceci rend les imports et les exports vers d'autres logiciels plus faciles à réaliser.</li>

<li><strong>Amélioration de l'optimiseur de requêtes</strong> : le planificateur et l'exécuteur de requêtes utiliseront maintenant les index pour des types de données compatibles, réduisant grandement le recours aux transtypages de valeurs constantes. Cette version inclut également des améliorations dans l'utilisation des index, une optimisation des clauses OR, un échantillonnage amélioré pour <code>ANALYZE</code>, un <code>TRUNCATE</code> plus rapide, une meilleure génération des plans de requêtes préparées, plus un grand nombre d'améliorations mineures, trop nombreuses pour être citées.</li>

<li><strong>Journalisation</strong> : les administrateurs peuvent désormais configurer la rotation des fichiers de journalisation de PostgreSQL au travers du fichier postgresql.conf. Le fichier de journalisation de PostgreSQL est encore plus configurable que précédemment, grâce à l'inclusion de préfixes de lignes dont le format aura été défini par l'administrateur, le traçage de types de requêtes SQL particuliers et le traçage des déconnexions.</li>

<li><strong>Sauvegarde</strong> : l'utilitaire de sauvegarde portable, pg_dump, a été en grande partie réécrit. Cette version ajoute de nouvelles possibilités comme les heures de début et de fin, ainsi que l'élimination des problèmes résiduels concernant la portabilité et la dépendance entre les fichiers de sauvegardes.</li>

</ul>

<p>Bien sûr, d'autres changements et améliorations sont inclus dans cette version. Référez-vous à la page <a href="http://www.postgresql.org/docs/8.0/static/release.html">Notes de version</a> pour une liste complète.</p>

<h2>Citations complètes</h2>

<p>

M. Takyuki Nakazawa, Directeur du groupe base de données Open Source s'exprime en ces termes : "Nous sommes très satisfaits des nouvelles fonctionnalités de PostgreSQL 8.0. Nous sommes persuadés que ces fonctionnalités professionnelles attireront beaucoup de nouveaux utilisateurs vers PostgreSQL. Fujitsu est fier de financer le développement de nouvelles fonctions de PostgreSQL et de son travail avec la communauté PostgreSQL. Nous souhaitons aider PostgreSQL à devenir le SGBD dominant."

</p>

<p>

Javier Soltero, architecte en chef chez Hyperic LLC, a dit: "PostgreSQL 8.0 nous apporte le haut niveau de simultanéité d'accès et le débit nécessaire à notre produit de surveillance HQ. Notre équipe a évalué des bases de données multi-plateformes commerciales et Open Source en Java, mais aucune ne remplissait nos attentes. PostgreSQL 8.0 disposant du support natif de Windows, nous pouvons maintenant inclure PostgreSQL dans nos produits et bénéficier de l'extensibilité et de la performance d'ores et déjà reconnues de PostgreSQL. Sa licence nous permet de l'inclure dans notre distribution sans souci de redevances commerciales. Le groupe de développement de PostgreSQL a une réputation de qualité largement méritée, qui nous a été confirmé dès notre évaluation de la première version beta publique."

</p>

<h2>Sites de téléchargement pour PostgreSQL 8.0</h2>

<ul>

<li><a href="/download/mirrors-ftp">Liste des mirroirs FTP</a></li>

<li><a href="/download/bittorrent">Bittorrent</a></li>

<li><a href="http://pgfoundry.org/projects/pginstaller/">Installeur Windows</a> (également disponible via Bittorrent)</li>

<li><a href="http://sourceforge.net/projects/pgsql/">Sourceforge</a> (incluant l'installeur Windows)</li>

</ul>

<h2>Contact pour plus d'informations</h2>

<p>En français:</p>

<p>François Suter<br />

+41 22 777 01 50<br />

<a href="mailto%20fr%20at%20postgresql.org">fr@postgresql.org</a></p>

<p>

Ou en anglais:<br />

Josh Berkus<br />

PostgreSQL Project<br />

+1-415-752-2500<br />

<a href="mailto:josh%20at%20postgresql.org">josh at postgresql.org</a></p>

<h2>Liens vers d'autres ressources concernant PostgreSQL</h2>

<h3>Documentation</h3>

<ul>

<li><a href="/docs">Documentation officielle</a></li>

<li><a href="http://techdocs.postgresql.org">Documents techniques</a></li>

<li><a href="http://www.varlena.com/GeneralBits">General Bits</a></li>

</ul>

<h3>Pilotes</h3>

<ul>

<li><a href="http://jdbc.postgresql.org/">JDBC</a></li>

<li><a href="http://gborg.postgresql.org/project/psqlodbc/projdisplay.php">ODBC</a></li>

<li><a href="http://gborg.postgresql.org/project/npgsql/projdisplay.php">.Net</a></li>

</ul>

<h3>Interfaces graphiques:</h3>

<ul>

<li><a href="http://www.pgadmin.org/">pgAdminIII</a></li>

<li><a href="http://phppgadmin.sourceforge.net/">phpPgAdmin</a></li>

<li><a href="http://www.pgaccess.org/">pgAccess</a></li>

<li><a href="http://techdocs.postgresql.org/guides/GUITools">Liste des autres IHM</a></li>

</ul>

<h3>Réplication</h3>

<ul>

<li><a href="http://www.slony.info/">Slony-I</a></li>

<li><a href="http://pgfoundry.org/projects/pgpool/">pgPool</a></li>

<li><a href="http://www.erserver.com/">eRServer</a></li>

</ul>

<h3>Projets relatifs à PostgreSQL</h3>

<ul>

<li><a href="http://projects.postgresql.org">pgFoundry</a></li>

<li><a href="http://gborg.postgresql.org">GBorg</a></li>

</ul>

<h2>Informations concernant les sociétés citées</h2>

<p><strong>A propos de Fujitsu</strong> : Fujitsu est un des premiers fournisseurs de systèmes d'informations orientés clientèle et de solutions de communication pour le marché international. Des technologies de pointe, des plateformes de communication et de calculs particulièrement fiables, ainsi qu'un panel mondial d'experts en systèmes et en services permettent à Fujitsu de proposer des solutions globales qui apportent des possibilités infinies pour le succès de ses clients. Basée à Tokyo, Fujitsu Limited (TSE: 6702) a publié son chiffre d'affaire consolidé de 4700 milliards de yen (soit 45 milliards de dollars) pour l'année fiscale se terminant au 31 mars 2004. Vous pourrez trouver des informations complémentaires sur Fujitsu sur le site : <a href="http://www.fujitsu.com">http://www.fujitsu.com</a>. Les détails concernant l'initiative Fujitsu Supported PosgreSQL (FSP) et un livre blanc à ce sujet sont disponibles sur le site : <a href="http://fastware.com.au.postgresql.html.">http://fastware.com.au.postgresql.html</a>. Veuillez envoyer vos questions à Liam O'Douibhir, Fujitsu Australia Software Technology <a href="mailto:liamod%20at%20fast.fujitsu.com.au">liamod at fast.fujitsu.com.au</a>, téléphone (61-2) 9452 9068.</p>

<p><a>A propos d'Hyperic</a> : Hyperic LLC est un fournisseur de solutions pour la gestion d'infrastructures de technologies de l'information Open Source et commerciales. Son produit phare se présente comme une alternative aux outils de gestion coûteux et dépassés en fournissant une plate-forme ouverte et extensible basée sur le web, apportant ainsi un support complet pour toutes les technologies utilisée de nos jours. Pour plus d'informations, contactez <a href="mailto:press%20at%20hyperic.net">press at hyperic.net</a>  (en anglais ou en espagnol).</p>