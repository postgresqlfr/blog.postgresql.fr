---
layout: post
title: "Guide de démarrage rapide avec PostgreSQL"
author: "florence"
categories: [Articles]
redirect_from: "index.php?post/2009/06/20/Guide-de-demarrage-rapide-avec-PostgreSQL"
---


<h3>Pourquoi ce document?</h3>

<p>J'ai commencé à développer sous PostgreSQL assez récemment après une

longue expérience sous Oracle. La documentation générale de PostgreSQL

est excellente, et très riche, mais j'avais besoin d'un document plus

léger expliquant la procédure d'installation sur différents systèmes et

comment démarrer (créer un cluster, configurer les connexions), ainsi

que des informations sur ce qu'on pouvait faire avec PostgreSQL. Je ne

l'ai pas trouvé.

Après quelques mois d'utilisation, je me suis rendu compte que les

problèmes des débutants étaient toujours les mêmes. Ainsi, j'ai compilé

mes notes des débuts et ce que j'ai appris depuis dans ce document.

Voici le résultat, en espérant qu'il vous aide à débuter et qu'il vous

encourage à continuer avec PostgreSQL.</p>

<h3>À qui s'adresse ce document?</h3>

<p>Ce document a pour but de vous aider à installer PostgreSQL sous Windows ou sous Linux, et à commencer à développer.</p>

<p>Il est écrit pour vous faire gagner du temps dans vos premiers pas

avec PostgreSQL, tout en vous expliquant les points importants afin que

vous puissiez progresser par vous-même.

Il s'adresse donc principalement aux développeurs d'applications, afin

de leur permettre de découvrir ce puissant moteur sur une petite base

de test, ou aux personnes qui débutent complètement avec PostgreSQL.

Vous n'aurez pas besoin de connaissances système avancées pour suivre

ce document.</p>

<p>Une fois que vous aurez terminé la lecture de ce document, vous

pourrez continuer par la lecture de la documentation officielle pour

apprendre à administrer PostgreSQL ou devenir un développeur aguerri.

La dernière section de ce document vous donne les liens et références

nécessaires pour continuer à progresser.

Parfois les informations ne sont volontairement pas complètes, et

lorsque la documentation de référence est plus claire et précise que ce

qui aurait pu être fait ici, les liens sont fournis vers la

documentation française.</p>

<p>Ce document a été écrit initialement pour la version 8.3, mais les

principes sont les mêmes avec les versions 8.2 et 8.4 (voir le chapitre

sur les versions).</p>

<p><strong>Avertissement :</strong> ce document n'est en aucun cas un

document sur le tuning de la base. Il n'est pas fait non plus pour vous

apprendre à administrer une base de production.</p>

<!--more-->


<p>Sachez que vous pouvez aussi télécharger ce document au format PDF : </p>

<p><a href="/public/Doc%20postgresql.pdf">Guide démarrage PostgreSQL</a></p>

<h2>Présentation de PostgreSQL</h2>

<p>PostgreSQL est un moteur de bases de données relationnelle.

C'est un moteur adapté à des bases métier, donc riche en fonctionnalités et puissant. Son installation est cependant plutôt simple.</p>

<p>Si vous ne connaissez pas les principes relationnels ou le SQL, le mieux est de vous procurer un bon ouvrage sur le sujet. L'article de Wikipedia peut être une bonne introduction (<a href="http://fr.wikipedia.org/wiki/SQL" hreflang="en">http://fr.wikipedia.org/wiki/SQL</a>), et donne de nombreuses références. Le tutoriel de la documentation PostgreSQL peut également vous rendre service  si vous avez besoin de vous rafraîchir la mémoire&nbsp;: <a href="http://docs.postgresqlfr.org/8.3/tutorial-sql.html" hreflang="fr">http://docs.postgresqlfr.org/8.3/tutorial-sql.html</a></p>

<h3>Licence</h3>

<p>La licence de PostgreSQL est une licence BSD, ce qui permet son utilisation sans restriction, dans un logiciel libre ou propriétaire. C'est un avantage certain, car cela permet par exemple d'utiliser PostgreSQL comme base de données pour un logiciel propriétaire.</p>

<p>PostgreSQL est un projet indépendant. Il n'est détenu par aucune entreprise. La communauté PostgreSQL est très réactive (allez voir les mailings-lists si vous voulez vérifier). De nombreuses entreprises soutiennent et participent également au développement de PostgreSQL.</p>

<h3>Caractéristiques et fonctionnalités&nbsp;:</h3>

<p>PostgreSQL comporte de nombreuses fonctionnalités intéressantes. Parmi celles-ci, on peut citer par exemple&nbsp;:</p>

<ul>

<li>moteur transactionnel</li>

<li>respect des normes SQL</li>

<li>MVCC (mécanisme permettant une concurrence efficace sans verrouiller les enregistrements pour assurer l'isolation des transactions)</li>

<li>procédures stockées dans de nombreux langages</li>

<li>triggers</li>

</ul>

<p>PostgreSQL est conçu pour être robuste (aucune version ne sort sans avoir subi une suite extensive de tests) et peut supporter des volumes importants de données (ainsi par exemple Météo France gère une base de 3,5To).</p>

<p>PostgreSQL est conçu pour pouvoir supporter des extensions. Des extensions et outils sont disponibles pour compléter le moteur, par exemple&nbsp;:</p>

<ul>

<li>PostGis&nbsp;: moteur de données spatiales.</li>

<li>Slony&nbsp;: réplication maître-esclaves.</li>

<li>Et de nombreux autres.</li>

</ul>

<h2>Installation</h2>

<p>Avant de passer aux procédures d'installation proprement dites, il est nécessaire de comprendre certaines notions fondamentales.</p>

<h3>Vocabulaire</h3>

<h4>Base</h4>

<p>Une base est un ensemble structuré de données. On utilise généralement une base de donnée par application.

Pour pouvoir créer une base de données, vous devez disposer d'un cluster de bases de données.</p>

<h4>Cluster (ou grappe de base de données)</h4>

<p>Un cluster est un ensemble de bases de données qui partagent les mêmes ressources (processus, mémoire, disque...) .</p>

<h4>Schéma</h4>

<p>Un schéma est un espace de nommage au sein d'une base de données.</p>

<h3>Principes de base</h3>

<h4>Comptes système</h4>

<p>Les processus de PostgreSQL utilisent un compte système. Généralement c'est le compte postgres qui est utilisé pour cela, sauf si vous avez installé PostgreSQL sur votre compte (voir la partie compilation).</p>

<h4>Rôles</h4>

<p>Les droits de la base de données sont gérés par des rôles. Avant de pouvoir vous connecter à la base de données, le rôle que vous utilisez doit avoir les autorisation nécessaires.

<a href="http://docs.postgresql.fr/8.3/user-manag.html" hreflang="fr">http://docs.postgresql.fr/8.3/user-manag.html</a></p>

<p><ins>A retenir :</ins> les comptes systèmes et les rôles de base de données sont distincts! Même s'il y a des possibilités de mise en correspondance entre les deux (cf. paragraphe sur pg_hba.conf)</p>

<h4>Versions (mineures/majeures)</h4>

<p>Les versions majeures comprennent le chiffre avant le point et un chiffre après. Exemple&nbsp;: 8.2 et 8.3 sont des versions majeures différentes.</p>

<p>Les versions mineures incrémentent la 3ème partie&nbsp;: exemple&nbsp;: 8.3.7</p>

<p>Pour changer de version mineure, il suffit de mettre à jour le moteur. Mais pour changer de version majeure, il est nécessaire de décharger puis recharger les données.</p>

<p>Plus d'informations ici&nbsp;:

<a href="http://www.postgresql.org/support/versioning" hreflang="en">http://www.postgresql.org/support/versioning</a></p>

<h4>Client/serveur</h4>

<p>PostgreSQL est une application client/serveur. <br />

Le serveur gère les fichiers de la base de données, accepte les connexions des clients, et effectue les opérations demandées par les clients.</p>

<p>Le client peut prendre de nombreuses formes. Il existe par exemple un client en ligne de commande (psql), des clients graphiques (par exemple pgAdmin3)... Le client peut être sur la même machine que le serveur, ou bien communiquer avec lui par le réseau.</p>

<h4>Processus serveur</h4>

<p>Sous Windows, le serveur PostgreSQL tourne en tant que service.</p>

<p>Sous Linux, ce sont des démons système qui effectuent ces tâches.</p>

<p>Si vous êtes curieux, vous pouvez aller voir cet article&nbsp;: <a href="http://dalibo.org/glmf112_les_processus_de_postgresql" hreflang="fr">http://dalibo.org/glmf112_les_processus_de_postgresql</a>.</p>

<p>Il est important de comprendre qu'on n'arrête pas les processus du serveur n'importe comment (utiliser les outils pour cela...).</p>

<p><ins>NB :</ins> par défaut, PostgreSQL est configuré pour écouter sur le port <em>5432</em>. Les outils se connectent par défaut sur ce port&nbsp;: pensez à cela si vous devez modifier ce paramètre.</p>

<h4>Module de contribution</h4>

<p>Ce sont des extensions intéressantes, maintenues par le projet, mais non intégrées au coeur du moteur. </p>

<p><ins>Exemples :</ins></p>

<ul>

<li><em>adminpack</em> (fonctions supplémentaires, utilisées par les outils d'administrations comme pgAdmin3)</li>

<li><em>pg_buffercache</em> (pour savoir ce qui est présent dans le cache)</li>

<li><em>pg_freespacemap</em>&nbsp;: donne la liste des blocs vides et partiellement vides des tables et index (quantité d'espace libre dans chaque objet de la base)</li>

<li><em>pgcrypto</em>&nbsp;: fonctions de cryptographie</li>

</ul>

<h3>Exemple</h3>

<p>Pour l'installation et la suite, nous prendrons l'exemple de la création d'une base de données mabase, qui sera utilisée et gérée par un utilisateur tom.</p>

<h3>Sous <em>Windows</em></h3>

<p>À partir de la version 8.0, PostgreSQL fonctionne nativement sous <em>Windows</em> (<em>Windows XP</em>, <em>Windows 2000</em>, <em>Windows 2003</em>, <em>Vista</em>, <em>Windows 2008</em>). Malgré tout, seules les versions à partir de la 8.2 sont supportées sous Windows. Il s'installe en tant que service.

<br />

<ins>NB</ins>&nbsp;: si vous regardez dans la liste des processus, plusieurs processus <em>postgres</em> sont présents. Gardez à l'esprit que la mémoire est partagée entre ces processus&nbsp;: la mémoire utilisée par PostgreSQL est donc inférieure à la somme de la mémoire utilisée par chaque processus qui est affichée dans le gestionnaire de tâches...</p>

<h4>Où trouver PostgreSQL pour Windows?</h4>

<p>Vous pouvez trouver deux types d'installeurs pour Windows&nbsp;: l'installeur "en un clic", ou l'installeur "pgInstaller". Le premier est créé par EnterpriseDB, le seconde par la communauté. Vous les trouverez à partir d'ici&nbsp;:

<a href="http://www.postgresql.org/download/windows" hreflang="en">http://www.postgresql.org/download/windows</a>.

La suite du document détaille le processus d'installation pour l'installeur "pgInstaller"</p>

<h4>Installation</h4>

<p>Dézippez le zip, ouvrez le répertoire, puis lancez <em>postgresql-8.3.msi</em>

</p>

<p><img src="/public/installation_windows/.2_langue_m.jpg" alt="2_langue" title="2_langue, juin 2009" />

</p>

<p>Choisissez la langue de l'installation (ici le français).

Il peut être utile de cocher la case «&nbsp;Write detailed installation log&nbsp;»&nbsp;: cela vous permettra de diagnostiquer un échec éventuel de l'installation.

</p>

<p><img src="/public/installation_windows/.3_Fermer_m.jpg" alt="3_fermer" title="3_fermer, juin 2009" />

</p>

<p><img src="/public/installation_windows/.4_choix_m.jpg" alt="4_choix" title="4_choix, juin 2009" />

<br />

Choisissez les options d'installation. Si vous ne savez pas quoi choisir, ajoutez juste le support de la langue si vous souhaitez les messages en français.

</p>

<p><img src="/public/installation_windows/.5_notes_m.jpg" alt="5_notes" title="5_notes, juin 2009" /></p>

<p>Lisez les notes d'installation...</p>

<p><img src="/public/installation_windows/.6_compte_W_ed_m.jpg" alt="6_compte_W" title="6_compte_W, juin 2009" /></p>

<p>Le serveur PostgreSQL peut s'exécuter en tant que service. La base de données sera alors active dès le démarrage de la machine. C'est le mode le plus pratique.

Entrez le nom du compte. Par défaut, c'est le nom «&nbsp;postgres&nbsp;» qui est proposé.</p>

<p><ins>Attention :</ins> il s'agit du compte système sous lequel s'exécutera le service <em>postgres</em>. Si le compte n'existe pas, l'installeur vous proposera de le créer.</p>

<p><img src="/public/installation_windows/.7_cree_cpte_ed_m.jpg" alt="7_cree_compte" title="7_cree_compte, juin 2009" /></p>

<p>Répondez oui...</p>

<p><img src="/public/installation_windows/.8_initialisation_groupe_UTF8_m.jpg" alt="8_initialisation_groupe_UTF8" title="8_initialisation_groupe_UTF8, juin 2009" />

</p>

<p><ins>Remarque</ins>&nbsp;: ici l'utilisateur «&nbsp;postgres&nbsp;» est le nom de l'utilisateur interne de base de données. Il est distinct de l'utilisateur système que vous avez entré précédemment (même si par défaut, ils portent le même nom, <em>postgres</em>).</p>

<p><ins>Encodage :</ins></p>

<ul>

<li>Client&nbsp;: choisir <em>WIN1252</em> car la console Windows a besoin d'un encodage 1252.</li>

<li>Serveur&nbsp;: de préférence <em>UTF8</em> (permet de stocker les caractères de toutes les langues)</li>

</ul>

<p><ins>Remarque</ins>&nbsp;: par défaut l'installeur propose comme encodage du client et du serveur celui du système (ici WIN1252 car on est sur un Windows français). Il faut savoir que l'encodage du serveur conditionne ce que vous pouvez faire sur les bases du groupe de bases de données&nbsp;: en pratique les bases doivent généralement utiliser toutes le même encodage (jusqu'à la version 8.3) .

<a href="http://docs.postgresqlfr.org/8.3/charset.html" hreflang="en">http://docs.postgresqlfr.org/8.3/charset.html</a>

</p>

<p>Vous pouvez changer le numéro de port d'écoute. Attention dans ce cas à configurer correctement vos clients (JDBC, etc...)

<br />

<ins>Remarquez la case à cocher :</ins> par défaut, <em>postgres</em> n'acceptera pas les connexions à partir du réseau. C'est parfait sur un poste de développement autonome, mais pas pour un serveur. Cela pourra être modifié par configuration.</p>

<p><ins>Attention à ne pas mettre un mot de passe trivial</ins> à l'utilisateur postgres (c'est encore plus important si vous autorisez les connexions à partir du réseau!). Évitez également de lui donner le même mot de passe que celui de l'utilisateur système <em>postgres</em>. En effet, l'utilisateur <em>postgres</em> dispose de tous les droits sur le cluster.</p>

<p><img src="/public/installation_windows/.9_langages_m.jpg" alt="9_langages.png" title="9_langages.png, juin 2009" /></p>

<p>Cet écran permet d'installer des langages pour les procédures stockées.

Seul <em>PL/pgsql</em> est proposé dans notre cas, car l'outil d'installation n'a pas détecté sur notre système d'interpréteurs pour les autres langages. Les autres langages pourront être ajoutés ultérieurement.</p>

<p><img src="/public/installation_windows/.10_contrib_m.jpg" alt="10_contrib.png" title="10_contrib.png, juin 2009" /></p>

<p>Les modules de contribution apportent des fonctionnalités supplémentaires, qui ne sont pas (ou pas encore) intégrées dans le moteur.

</p>

<p><img src="/public/installation_windows/.11_pret_m.jpg" alt="11_pret.png" title="11_pret.png, juin 2009" />

</p>

<p><img src="/public/installation_windows/.13_termine_m.jpg" alt="13_terminé.png" title="13_terminé.png, juin 2009" /></p>

<p>Stackbuilder&nbsp;: permet d'installer des modules supplémentaires. Vous pouvez le lancer pour voir ce qu'il vous propose, sachant que pour un fonctionnement standard, il n'est pas nécessaire.</p>

<p>L'installation sous Windows est prête à être utilisée.

Dans le menu démarrer, vous pouvez retrouver tous les outils utiles pour gérer le serveur.

<br />

<img src="/public/installation_windows/.20_apres_m.jpg" alt="20_apres.png" title="20_apres.png, juin 2009" /></p>

<p>Si vous avez conservé les options par défaut, le cluster se trouve dans&nbsp;:

<em>C:\Program Files\PostgreSQL\8.3</em>

Vous pouvez passer à la section «&nbsp;après l'installation&nbsp;».</p>

<h3>Sous <em>Linux</em></h3>

<p>PostgreSQL est fourni avec plusieurs outils pour la gestion du serveur et des bases de données.

Les principales distributions fournissent des paquets PostgreSQL pour faciliter l'installation et l'utilisation.

Redhat et Debian ont leur propre version des outils, qui ont un nom différent de ceux que vous trouverez dans la documentation. Il vaut mieux utiliser les outils fournis par votre distribution.</p>

<h4>Debian/Ubuntu</h4>

<p>Pour installer PostgreSQL sur Debian, il faut récupérer les paquets suivants:</p>

<ul>

<li>postgresql-8.3  (serveur)</li>

<li>postgresql-client-8.3  (client)</li>

</ul>

<p>Avec l'installation de PostgreSQL, un cluster de bases de données est créé automatiquement. Vous pouvez voir la liste des clusters installés via la commande <em>pg_lsclusters.</em></p>

<pre>flo@flo:~$ pg_lsclusters<br />Version Cluster   Port Status Owner    Data directory                     Log file <br />8.3     main      5432 online postgres /var/lib/postgresql/8.3/main       custom<br />flo@flo:~$</pre>

<p>Vous pouvez voir que le cluster de base est installé dans le répertoire&nbsp;:

<em>/var/lib/postgresql/8.3/main</em></p>

<p>La documentation des outils Debian pour PostgreSQL se trouve dans&nbsp;:

<em>/usr/share/doc/postgresql-common</em></p>

<p>Quelques outils à connaître absolument&nbsp;:</p>

<ul>

<li><em>pg_lsclusters</em>&nbsp;: liste des clusters</li>

<li><em>pg_createcluster</em>&nbsp;: crée un cluster de bases</li>

<li><em>pg_ctlcluster</em>&nbsp;: contrôle des cluster (arrêt/démarrage)</li>

</ul>

<h5>Modules de contribution&nbsp;:</h5>

<p>Pour utiliser les modules de contribution, il faut installer le paquet&nbsp;:

<em>postgresql-contrib-8.3</em></p>

<p>Le paquet Debian copie des fichiers .sql. Voyons où ils se trouvent&nbsp;:</p>

<pre>flo:~# dpkg -L postgresql-contrib-8.3<br />/usr/share/postgresql/8.3/contrib/fuzzystrmatch.sql<br />/usr/share/postgresql/8.3/contrib/uninstall_int_aggregate.sql<br />/usr/share/postgresql/8.3/contrib/uninstall_pg_trgm.sql</pre>

<p>Les fichiers .sql installent les modules de contribution.</p>

<h4>Redhat/Cent OS/Fedora</h4>

<p>Les RPM pour PostgreSQL, ainsi qu'un guide pratique se trouvent à l'adresse suivante&nbsp;:

<a href="http://yum.pgsqlrpms.org/index.php" hreflang="en">http://yum.pgsqlrpms.org/index.php</a>.</p>

<p>Une fois l'installation terminée, vous devrez créer un cluster&nbsp;:

<code>service postgresql initdb</code>

et démarrer le service&nbsp;:

<code>service postgresql start	</code></p>

<h4>Compilation des sources</h4>

<p>Compiler les sources n'est pas si compliqué que ça peut en avoir l'air. Si vous n'avez pas le droit de vous connecter en tant que <em>root</em> sur le serveur Linux où vous souhaitez installer PostgreSQL, c'est le moyen d'installer PostgreSQL tout de même. Le serveur s'exécutera alors dans votre compte utilisateur.

Pour compiler les sources, vous devez les récupérer ici&nbsp;: <a href="http://www.postgresql.org/ftp/source/" hreflang="en">http://www.postgresql.org/ftp/source/</a> et suivre la procédure d'installation précisée dans la documentation.</p>

<h3>Autres</h3>

<p>Des binaires sont disponibles également pour&nbsp;:

FreeBSD, Mac OS X, Solaris</p>

<h2>Après l'installation</h2>

<p>Dans toute la suite du document, nous supposons que l'utilisateur système sous lequel PostgreSQL a été installé est <em>postgres</em>. Si ce n'est pas le cas, remplacez par l'utilisateur qui démarre le serveur.</p>

<p><ins>Conseil</ins>&nbsp;: avant toute modification de fichier de configuration, pensez à sauvegarder la version initiale du fichier! Une erreur est si vite arrivée...</p>

<h3>Processus et emplacement des fichiers.</h3>

<p>L'emplacement des fichiers de configuration et des fichiers du cluster dépend de votre distribution.</p>

<p>Le répertoire contenant les fichiers du cluster est couramment appelé <em>PGDATA</em> (du nom de la variable d'environnement correspondante).<br />

Par exemple&nbsp;: <em>/var/lib/pgsql/data</em> (Linux) ou <em>C:\Program Files\PostgreSQL\8.3\data</em> (Windows).</p>

<p>Normalement, le  fichier <em>postgresql.conf</em> est dans le répertoire du cluster. Cependant, cela peut être autrement (sur Debian, tous les fichiers de configuration doivent être dans /etc)</p>

<p>Voici un moyen de retrouver leur emplacement si vous l'avez oublié.</p>

<p>Liste des processus nommés "postgres" :</p>

<p>(exemple sur une Debian Lenny):</p>

<pre>flo:~# ps -ef | grep postgres | grep -v grep<br />postgres  2797     1  0 06:14 ?        00:00:00 /usr/lib/postgresql/8.3/bin/postgres -D /var/lib/postgresql/8.3/main -c config_file=/etc/postgresql/8.3/main/postgresql.conf<br />postgres  2798  2797  0 06:14 ?        00:00:00 postgres: logger process                                                                                        <br />postgres  2800  2797  0 06:14 ?        00:00:00 postgres: writer process                                                                                        <br />postgres  2801  2797  0 06:14 ?        00:00:00 postgres: wal writer process                                                                                    <br />postgres  2802  2797  0 06:14 ?        00:00:00 postgres: autovacuum launcher process                                                                           <br />postgres  2803  2797  0 06:14 ?        00:00:00 postgres: stats collector process                                                                               <br />flo:~#</pre>

<p>Voyez que le processus <em>2797</em> est le père de tous les autres&nbsp;: </p>

<p><code>postgres  2797     1  0 06:14&nbsp;?        00:00:00 /usr/lib/postgresql/8.3/bin/postgres -D /var/lib/postgresql/8.3/main -c config_file=/etc/postgresql/8.3/main postgresql.conf</code> </p>

<p>le chemin derrière le <em>-D</em> est l'emplacement du cluster.</p>

<p>Celui derrière le <em>-c</em> l'emplacement du fichier de configuration.</p>

<p><code>config_file=/etc/postgresql/8.3/main/postgresql.conf</code>

Normalement, les autres fichiers de configuration du cluster (<em>pg_hba.conf</em>, <em>pg_ident.conf</em>) sont dans le même répertoire.</p>

<p><em>/usr/lib/postgresql/8.3/bin/postgres</em>

est l'emplacement des binaires.</p>

<p>Arborescence du répertoire du cluster :</p>

<pre>flo:/var/lib/postgresql/8.3/main# ls -l<br />total 48<br />drwx-- 11 postgres postgres 4096 mai 10 15:19 base<br />drwx--  2 postgres postgres 4096 mai 10 18:29 global<br />drwx--  2 postgres postgres 4096 avr  4 19:58 pg_clog<br />drwxr-xr-x  2 postgres postgres 4096 mai 10 08:15 pg_log<br />drwx--  4 postgres postgres 4096 avr  4 19:58 pg_multixact<br />drwx--  2 postgres postgres 4096 avr  4 19:58 pg_subtrans<br />drwx--  2 postgres postgres 4096 avr  4 19:58 pg_tblspc<br />drwx--  2 postgres postgres 4096 avr  4 19:58 pg_twophase<br />-rw---  1 postgres postgres    4 avr  4 19:58 PG_VERSION<br />drwx--  3 postgres postgres 4096 avr  4 19:58 pg_xlog<br />-rw---  1 postgres postgres  133 mai 10 08:15 postmaster.opts<br />-rw---  1 postgres postgres   54 mai 10 08:15 postmaster.pid<br />lrwxrwxrwx  1 root     root       31 avr  4 19:58 root.crt -&gt; /etc/postgresql-common/root.crt</pre>

<h5>Quelques sous-répertoires  et fichiers&nbsp;:</h5>

<ul>

<li><em>base</em>&nbsp;: répertoire des fichiers de base de données</li>

<li><em>pg_log</em>&nbsp;: log de la base de données (c'est le seul répertoire du cluster où vous pouvez supprimer des fichiers!)</li>

<li><em>pg_clog</em> et <em>pg_xlog</em>&nbsp;: commit log (état des transactions) et répertoire des fichiers WAL (Write Ahead Log, utilisé pour la durabilité ).</li>

<li><em>postmaster.pid</em>&nbsp;: fichier verrou utilisé pour éviter que plusieurs instances ne soient actives sur le même répertoire de données.</li>

</ul>

<p><ins>Attention</ins>&nbsp;: le contenu de <em>pg_clog</em> et <em>pg_xlog</em> <ins>ne doit pas être supprimé</ins>!</p>

<h3>Changer le mot de passe de l'utilisateur système <em>postgres</em></h3>

<p>À moins que vous n'ayez compilé les sources pour utiliser PostgreSQL sur votre compte utilisateur, un utilisateur <em>postgres</em> a été créé sur votre système.</p>

<p>Afin de pouvoir l'utiliser, vous devez changer le mot de passe de cet utilisateur.</p>

<p>Pour cela, sous Linux, connectez-vous en tant que <em>root</em> et exécutez la commande '<em>passwd postgres'</em>.

(ne pas utiliser un mot de passe trivial!)</p>

<h3>Créer un cluster de base de données.</h3>

<p>Avec certaines distributions (Redhat, Debian), un cluster est créé par défaut à l'installation des paquets.

</p>

<p>Si vous êtes dans un autre cas de figure, il vous faudra donc en créer un.</p>

<p>Pour cela, utilisez la commande <em>initdb</em>.</p>

<h3>Autoriser les connexions</h3>

<p>L'installation de PostgreSQL positionne des valeurs par défaut dans les fichiers de configuration. </p>

<p>Après l'installation, PostgreSQL est configuré de telle sorte que les connexions ne sont pas possibles à partir du réseau.</p>

<p>Pour autoriser des clients distants à se connecter, il faut configurer deux fichiers&nbsp;:

<em>postgresql.conf</em> et <em>pg_hba.conf</em>.</p>

<h4>Connexions réseau (postgresql.conf)</h4>

<p>À l'installation, PostgreSQL est configuré pour n'accepter que les connexions locales (c'est le paramètre <em>listen_addresses</em>).  </p>

<p>Si vous souhaitez pouvoir vous connecter à partir du réseau, il faut dé-commenter le paramètre <em>listen_addresses</em> du fichier <em>postgresql.conf</em>, et préciser sur quelle(s) adresse(s) postgres accepte les connexions.</p>

<p><ins>Attention</ins>&nbsp;: ce sont bien les adresses IP <ins>d'écoute</ins>, c'est-à-dire les adresses IP <ins>du serveur</ins> sur lesquelles le serveur PostgreSQL va écouter. Si vous précisez une adresse '*', postgres va écouter les connexions sur toutes les interfaces réseau du serveur. Si vous précisez une adresse IP, cela signifie que postgres va écouter sur l'interface réseau du serveur qui a cette adresse IP.

Si vous souhaitez n'autoriser les connexions qu'à une liste de machines ou d'adresses IP, c'est dans pg_hba.conf que vous pouvez le faire (paragraphe suivant).</p>

<p>Pour que les paramètres soient pris en compte, il faut redémarrer le serveur PostgreSQL.<br />

<ins>Exemples :</ins></p>

<p>(connexion locales)</p>

<pre>#listen_addresses = 'localhost'         # what IP address(es) to listen on;<br /><br />                                       # comma-separated list of addresses;<br /><br />                                       # defaults to 'localhost', '*' = all<br /><br />                                       # (change requires restart)<br />port = 5432                             # (change requires restart)</pre>

<p>(connexion sur l'adresse 192.168.0.4 et local, port 5433)</p>

<pre>listen_addresses = '192.168.0.4, localhost'         # what IP address(es) to listen on;<br />                                       # comma-separated list of addresses;<br />                                       # defaults to 'localhost', '*' = all<br />                                       # (change requires restart)<br />port = 5432                             # (change requires restart)</pre>

<h4>Authentification des clients (<em>pg_hba.conf</em>)</h4>

<p>Le fichier<em> pg_hba.conf</em> configure les autorisations pour les bases du cluster.</p>

<p>Chaque ligne précise une règle aidant à décider si l'utilisateur est habilité à se connecter ou non.</p>

<p>Le fichier est lu dans l'ordre par postgres, et, dès qu'une ligne est rencontrée qui correspond au cas testé, la lecture s'arrête. Cela signifie que l'ordre des lignes est important.</p>

<p>Sur chaque ligne est précisé le type de connexion, un nom de base de données, un nom d'utilisateur, et la méthode d'authentification.</p>

<p>Les méthodes d'authentification les plus classiques sont&nbsp;: <em>md5</em> (par mot de passe crypté), <em>ident</em> (à partir du nom d'utilisateur du système d'exploitation, non utilisable sous Windows).</p>

<p><ins>Exemple :</ins></p>

<pre># connection par socket Unix pour l'administration du serveur<br /># TYPE  DATABASE    USER        CIDR-ADDRESS          METHOD<br />local   all         postgres                               ident sameuser<br /><br /># connection par socket Unix <br /># TYPE  DATABASE    USER        CIDR-ADDRESS          METHOD<br />local   mabase      tom                                    md5<br />local   truc        all                                    ident sameuser<br /><br /># Connexions locales en Ipv4 :<br /># TYPE  DATABASE    USER        CIDR-ADDRESS          METHOD<br />host    mabase      tom         127.0.0.1/32          md5<br />host    truc        all         127.0.0.1/32          md5<br /><br /># Connexion distante en Ipv4 :<br /># TYPE  DATABASE    USER        CIDR-ADDRESS          METHOD<br />host    mabase      tom         192.168.12.10/32      md5<br />host    truc        all         192.168.12.10/32      md5</pre>

<p>La première ligne :</p>

<pre class="console-western"><code>local    all       postgres                       ident sameuser</code></pre>

<p>signifie que, si <em>postgres</em> reçoit une demande de connexion

sur n'importe quelle base (<em>all</em>) par socket Unix (<em>local</em>),

pour l'utilisateur <em>postgres</em>, alors la méthode d'authentification

utilisée est : <em>ident</em>. <em>sameuser</em> signifie que postgres

vérifie que le nom de l'utilisateur Unix propriétaire de la socket

est le même que celui utilisé pour se connecter à la base.</p>

<p>La ligne suivante :</p>

<pre class="console-western"><code>local    mabase      tom          md5</code></pre>

<p>signifie que, lorsque <em>tom</em> essaie de se connecter par socket

Unix sur la base <em>mabase</em>, c'est l'authentification md5 qui est

utilisée.</p>

<p>La ligne :</p>

<p class="console-western"><code>local&nbsp;&nbsp;

truc &nbsp;&nbsp;       all&nbsp;&nbsp;&nbsp;                                    ident sameuser</code></p>

<p>signifie que lorsque n'importe que n'importe quel utilisateur

essaie de se connecter à la base <em>truc</em> par socket Unix, c'est

l'authentification <em>ident sameuser</em> qui est utilisée.</p>

<p>La ligne :</p>

<p class="console-western"><code>host &nbsp;

mabase&nbsp;&nbsp;       tom&nbsp;&nbsp;&nbsp;&nbsp;         127.0.0.1/32          md5</code></p>

<p>signifie qu'une demande de connexion à partir pour la base

<em>mabase</em>, par un utilisateur <em>tom</em>, en local par Ipv4 est

authentifiée par <em>md5</em>.</p>

<p>La ligne :</p>

<p class="console-western"><code>host &nbsp;    mabase &nbsp;      tom&nbsp;&nbsp;&nbsp;&nbsp;         192.168.12.10/32      md5</code></p>

<p>signifie qu'une demande de connexion de l'utilisateur <em>tom</em>

sur <em>mabase</em>, à partir de l'adresse 192.168.12.10

est authentifiée par <em>md5</em>.&nbsp;</p>

<p>On voit donc que <em>tom</em>

est autorisé à se connecter sur la base <em>mabase</em>,

soit par socket Unix, soit par Ipv4 en local, soit par Ipv4 à partir

de : 192.168.12.10.</p>

<p>Les autres utilisateurs (à part l'utilisateur

postgres) ne peuvent se connecter que sur la base <em>truc</em>.</p>

<p><em>Tom</em> peut également se connecter sur la base <em>truc</em>,

car <em>tom</em> fait partie de

l'ensemble des utilisateurs (all).</p>

<br /><br /><p><ins>NB :</ins> CIDR est une façon de noter les ensembles d'adresses IP, avec le chiffre derrière le '/' indiquant la taille du masque en bits  (ainsi un réseau de classe A est en /8, classe B, 16, classe C, 24, une IP unique /32, et tout le monde&nbsp;: 0.0.0.0/0 ) (voir l'article Wikipedia&nbsp;: <a href="http://fr.wikipedia.org/wiki/Adresse_IPv4" hreflang="en">http://fr.wikipedia.org/wiki/Adresse_IPv4</a>)</p>

<p><ins>Remarques :</ins>

Le fichier configure le cluster, il est donc commun à toutes les bases du cluster&nbsp;: attention à ne pas autoriser un utilisateur sur une base par erreur.</p>

<p><strong>Attention</strong>, ne surtout pas autoriser d'authentification <em>trust</em> ni <em>ident</em> par le réseau, parce que cela signifierait faire entièrement confiance au client...</p>

<p>Si vous voulez en savoir plus sur l'authentification du client,

allez voir la documentation ici :</p>

<p><a hreflang="fr" href="http://docs.postgresql.fr/8.3/client-authentication.html">http://docs.postgresql.fr/8.3/client-authentication.html</a></p>

<h4>Prise en compte des paramètres de configuration</h4>

<p>Pour que PostgreSQL prenne en compte les modifications de paramètres sans redémarrer le serveur, vous avez les solutions suivantes&nbsp;:</p>

<ul>

<li>utiliser pg_ctl reload (remplacé par pg_ctlcluster sous Debian)</li>

<li>envoyer un signal SIGHUP à postgres</li>

</ul>

<p>Sous Windows, il est possible d'utiliser un raccourci dans le menu Démarrer («&nbsp;Rechargez la configuration&nbsp;»).</p>

<p><ins>Attention</ins>&nbsp;: certaines options ne sont prises en compte qu'au démarrage (voir la documentation, les commentaires de postgresql.conf, ou la colonne context de la vue pg_settings)</p>

<h4>Créer une base</h4>

<p>Nous allons créer une base mabase sur le cluster, puis faire de <em>tom</em> le propriétaire de la base (afin qu'il puisse faire ce qu'il veut sur cette base)</p>

<pre>postgres@flo:/etc/postgresql/8.3/main$ pg_lsclusters<br />Version Cluster   Port Status Owner    Data directory                     Log file<br />8.3 main      5432 online postgres /var/lib/postgresql/8.3/main       custom</pre>

<p>Pour cela, lancez la commande <em>createdb</em> :</p>

<p><code>postgres@flo$ createdb mabase</code></p>

<p><ins>NB</ins>&nbsp;: createdb lance en fait la commande CREATE DATABASE pour vous.</p>

<h4>Créer un rôle et lui donner des droits sur une base</h4>

<p><ins>NB</ins>&nbsp;: les utilisateurs et les groupes sont tous gérés par des rôles.</p>

<p>En tant qu'utilisateur <em>postgres</em>, lancez <em>psql</em> :</p>

<pre>postgres@flo:/usr/share/doc/postgresql-common$ psql<br />Bienvenue dans psql 8.3.6, l'interface interactive de PostgreSQL.<br /><br />Saisissez:<br />    \copyright pour les termes de distribution<br />    \h pour l'aide-mémoire des commandes SQL<br />    \? pour l'aide-mémoire des commandes psql<br />    \g ou point-virgule en fin d'instruction pour exécuter la requête<br />    \q pour quitter<br /><br />postgres=#</pre>

<p>Créez un rôle <em>tom</em>, avec les droits de login (pour qu'il ait le droit de se connecter au serveur), et le mot de passe&nbsp;: <em>secret</em>.</p>

<pre>postgres=# CREATE ROLE tom LOGIN password 'secret';<br />CREATE ROLE<br />postgres=#</pre>

<p>Pour que tom soit le propriétaire de mabase&nbsp;:</p>

<pre>postgres=# ALTER DATABASE mabase OWNER TO tom;<br />ALTER DATABASE</pre>

<p>Sortez de psql&nbsp;:</p>

<pre>postgres=# \q<br />postgres@flo:/usr/share/doc/postgresql-common$</pre>

<p><ins>NB</ins>&nbsp;: les commandes <em>CREATE DATABASE</em> et <em>CREATE ROLE</em> (création de base et d'utilisateur) sont globales au cluster. Il est donc possible de les exécuter de n'importe quelle base.</p>

<p>Maintenant, l'utilisateur <em>tom</em> peut se connecter sur <em>mabase</em>&nbsp;:&nbsp;

</p>

<p>Maintenant, l'utilisateur <em>tom</em> peut se connecter sur <em>mabase</em>

: lancez psql, en précisant que vous vous connectez en tant que <em>tom</em>

:</p>

<pre>flo@flo:~$ psql -U tom mabase<br />Mot de passe pour l'utilisateur tom :<br /><br />Bienvenue dans psql 8.3.6, l'interface interactive de PostgreSQL.<br /> <br />Saisissez:<br />    \copyright pour les termes de distribution<br />    \h pour l'aide-mémoire des commandes SQL<br />    \? pour l'aide-mémoire des commandes psql<br />    \g ou point-virgule en fin d'instruction pour exécuter la requête<br />    \q pour quitter<br /><br />mabase=&gt;</pre>

<p><ins>Remarque</ins>&nbsp;: il faut préciser la base! Sinon psql cherchera à se connecter à une base "tom".</p>

<p>Si vous souhaitez donner le droit à tom de créer des bases:</p>

<pre>postgres=# ALTER ROLE tom CREATEDB;<br />ALTER ROLE<br />postgres=#</pre>Pour les détails sur les droits, lisez le chapitre correspondant de la documentation :

<p><a href="http://docs.postgresqlfr.org/8.3/privileges.html" hreflang="fr">http://docs.postgresqlfr.org/8.3/privileges.html</a></p>

<h3>Super-utilisateur</h3>

<p>Le super-utilisateur est un utilisateur qui dispose de droits spéciaux (certaines fonctions ne sont utilisables que par un super-utilisateur). Les super-utilisateurs passent au travers des vérifications de droits.</p>

<p>Si vous avez installé PostgreSQL en tant que root, classiquement vous avez un super-utilisateur <em>postgres</em>.</p>

<p><ins>Attention!</ins> Le super-utilisateur disposant de tous les droits, éviter de l'utiliser si ce n'est pas nécessaire, afin de limiter le risque d'erreur.</p>

<h3>Je ne peux pas me connecter à la base? Que faire?</h3>

<p>Que vérifier?</p>

<p>D'abord&nbsp;: lisez le message d'erreur! (ça peut suffire à trouver la solution à partir d'un bon moteur de recherche, des archives des mailing-lists ou de forums...)</p>

<p>Consultez la log (voir chapitre suivant)</p>

<p>Cherchez quels sont les clusters présents&nbsp;? (sous Debian&nbsp;: pg_lsclusters...)</p>

<p>Vérifiez le fichier postgresql.conf (le paramètre listen_addresses est-il correct? Le port est-il celui souhaité? Le client essaie-t-il de se connecter sur le bon  port?)</p>

<p>Vérifiez le fichier pg_hba.conf</p>

<p>Vérifiez le propriétaire de la base</p>

<p>Le rôle que vous utilisez a-t-il le droit de se loguer (autorisation <em>LOGIN</em>) ?</p>

<p>Le rôle utilisé a-t-il le droit de se connecter à la base de données (sinon utilisez GRANT CONNECT on mabase ...)</p>

<p><ins>NB</ins>&nbsp;: vous obtenez la liste des bases d'un cluster avec la commande <em>\l</em> dans <em>psql</em></p>

<h3>Où se trouve la log&nbsp;? Comment la configurer?</h3>

<p>La configuration de la log est effectuée par le fichier <em>postgresql.conf</em> (voir les paramètres <em>log_destination</em> et <em>log_directory</em>)</p>

<p>Dans une installation standard de PostgreSQL, la log se trouve dans un répertoire <em>pg_log</em> sous le répertoire <em>PGDATA</em>  (répertoire du cluster).</p>

<p>Par exemple, sous Windows&nbsp;:</p>

<pre>C:\Program Files\PostgreSQL\8.3\data\pg_log</pre>

<p>En fonction de votre utilisation (production, test, développement), vous pourrez régler les paramètres de la log. Par exemple, loguer tous les ordres SQL peut être fort utile en développement (surtout lorsque vous utilisez un ORM).</p>

<p>Pensez à recharger la configuration après modification. </p>

<h3>Arrêter/démarrer le serveur PostgreSQL</h3>

<p>Sous Windows&nbsp;: vous pouvez utiliser "stoppez le service" et "démarrez le service" dans le menu démarrer, ou bien dans un terminal, utiliser <em>pg_ctl</em>&nbsp;:</p>

<pre>C:\Program Files\PostgreSQL\8.3\bin&gt;pg_ctl start -D "C:\Program Files\PostgreSQL<br />\8.3\data"<br />server starting</pre>

<p>Sous Linux&nbsp;: c'est la commande <em>pg_ctl</em>  (sous Debian&nbsp;: pg_ctlcluster ou sous Redhat&nbsp;: service postresql start)</p>

<h2>Outils</h2>

<h3>Outil graphique&nbsp;: pgAdmin3</h3>

<p><em>PgAdmin3</em> est sans doute l'outil le plus populaire pour développer et administrer PostgreSQL.

<a href="http://www.pgadmin.org/?lang=fr_FR" hreflang="fr">http://www.pgadmin.org/?lang=fr_FR</a></p>

<p>Voici un apercu de ce à quoi il ressemble. Pour le reste, vous pourrez vous reporter à sa documentation.</p>

<p><img src="http://www.pgadmin.org/images/screenshots/pgadmin3_linux.png" alt="" /></p>

<h3>psql (outil en ligne de commande)</h3>

<p>Psql permet d'exécuter des ordres SQL sur les bases, et également des commandes de gestion et d'administration.

Pour lancer psql&nbsp;:</p>

<h4>Windows&nbsp;:</h4>

<p>A partir du menu démarrer (gère tout seul le changement d'utilisateur)</p>

<p><ins>Remarque</ins>&nbsp;: à la première connexion, il est probable que vous ayez ce message d'avertissement&nbsp;:</p>

<pre>Warning: Console code page (437) differs from Windows code page (1252)<br />         8-bit characters might not work correctly. See psql reference<br />         page "Notes for Windows users" for details.<br /><br />postgres=#</pre>

<p>Vous devez effectuer 2 opérations  pour régler le problème&nbsp;:

1. changez le code page de Windows&nbsp;:</p>

<ul>

<li>Si vous lancez psql à partir d'une fenêtre cmd, utilisez la commande&nbsp;: cmd.exe /c chcp 1252  (pour la France) avant de lancer psql.</li>

<li>Si vous lancez psql à partir du menu de Windows, modifiez les propriétés de l'élément de menu et ajoutez l'encodage. Exemple de commande&nbsp;: "C:\Program Files\PostgreSQL\8.3\bin\psql.bat"  -h localhost -p 5432 postgres "postgres" WIN1252</li>

</ul>

<pre>2.changez la police de la console pour <em>Lucida Console</em></pre>

<p><ins>NB</ins>&nbsp;: La documentation de PostgreSQL se trouve également à partir du menu démarrer, et la documentation de psql est incluse.</p>

<h4>Sous Linux&nbsp;:</h4>

<pre>psql <em>mabase</em></pre>

<h4>Remarques&nbsp;:</h4>

<p>Si vous ne précisez pas le nom de la base, psql essaie de se connecter à la base de même nom que l'utilisateur. Si vous ne précisez pas le nom d'utilisateur, c'est le nom de l'utilisateur du système qui est utilisé.</p>

<h4>Commandes</h4>

<p>Commandes psql à connaître absolument&nbsp;:</p>

<ul>

<li>\? pour l'aide des commandes psql (si vous deviez n'en retenir qu'une)</li>

<li>\q quitter</li>

<li>\h aide des commandes sql</li>

</ul>

<p>autres commandes intéressantes&nbsp;:</p>

<ul>

<li>\l liste des bases de données</li>

<li>\c se connecter à une base</li>

<li>\d <a href="nom" title="nom">nom</a> pour la description d'une table, d'un index, séquence, vue</li>

<li>\d liste des relations (tables, vues et séquences)</li>

<li>\i nom_fichier  exécuter un fichier de commandes SQL</li>

</ul>

<h4>phpPgAdmin</h4>

<p>C'est un outil d'administration web pour PostgreSQL

<a href="http://phppgadmin.sourceforge.net/" hreflang="en">http://phppgadmin.sourceforge.net/</a></p>

<h4>Copy</h4>

<p><em>copy</em> est un outil pour le chargement et déchargement de données en masse. Ce n'est pas une commande standard SQL.

<a href="http://docs.postgresqlfr.org/8.3/sql-copy.html" hreflang="fr">http://docs.postgresqlfr.org/8.3/sql-copy.html</a></p>

<h2>Développement</h2>

<h3>SQL</h3>

<p>Plusieurs outils permettent d'exécuter du code SQL de façon  interactive&nbsp;: psql, pgAdmin (voir les sections qui leur sont consacrées).

Vous pouvez également utiliser un outil tiers, si vous préférez...</p>

<h3>Procédures stockées</h3>

<p>L'intérêt des procédures stockées est de pouvoir exécuter des fonctions directement sur le serveur. Les procédures stockées sont efficaces et rapides, et permettent de traiter des données, soit pour consultation par un client, soit en mise à jour.

PostgreSQL vous donne le choix du langage de procédures stockées.

Vous pouvez utiliser&nbsp;:</p>

<ul>

<li>PL/pgsql (proche de SQL, facile à utiliser, utilisable pour les triggers)</li>

<li>PL/Tcl</li>

<li>PL/Perl (pratique lorsqu'il y a des traitements de chaînes de caractères à effectuer)</li>

<li>PL/Python</li>

</ul>

<p>D'autres langages ne sont pas inclus dans la distribution principale&nbsp;:

PL/Java, PL/PHP, PL/R,  PL/Ruby, PL/Scheme, PL/sh

Vous pouvez aussi en définir un vous-même... mais c'est beaucoup de travail !</p>

<h3>JDBC</h3>

<p>Le pilote JDBC pour PostgreSQL est un pilote natif (il est entièrement écrit en Java)

Le pilote JDBC est disponible ici (ainsi que la documentation)

<a href="http://jdbc.postgresql.org/index.html" hreflang="en">http://jdbc.postgresql.org/index.html</a>

Ensuite vous avez juste à utiliser le .jar de manière classique (le mettre dans le CLASSPATH de votre application)

<ins>NB :</ins> syntaxe de l'URL&nbsp;:</p>

<pre>String url="jdbc:postgresql:test_conn";</pre>

<p>L'URL a une de ces formes&nbsp;:</p>

<ul>

<li>jdbc:postgresql:database</li>

<li>jdbc:postgresql://host/database</li>

<li>jdbc:postgresql://host:port/database</li>

</ul>

<p>Allez voir la <a href="http://jdbc.postgresql.org/documentation/83/connect.html" hreflang="fr">documentation</a>  pour plus de détails.</p>

<h3>Autres (PERL, Python, .Net, ODBC, Tcl...)</h3>

<p>Voir ici&nbsp;: <a href="http://docs.postgresqlfr.org/8.3/external-projects.html" hreflang="fr">http://docs.postgresqlfr.org/8.3/external-projects.html</a></p>

<p>.</p>

<h3>A savoir&nbsp;!</h3>

<h4>Majuscules/minuscules</h4>

<p>Le nom des objets dans les ordres SQL est converti automatiquement en minuscules.</p>

<p>Par exemple, si vous exécutez&nbsp;:</p>

<pre>SELECT Id, Valeur FROM Matable;</pre>

<p>l'ordre réellement exécuté sera&nbsp;:</p>

<pre>SELECT id, valeur FROM matable;</pre>

<p><br />

exemple&nbsp;:</p>

<pre>mabase=&gt; SELECT Id, Valeur FROM Matable;<br /> id | valeur<br /> ---+-------<br />  1 | azerty<br />(1 ligne)<br /><br />mabase=&gt;</pre>

<p>Si vous souhaitez utiliser la casse dans les noms d'objets (ce qui n'est pas conseillé en général), utilisez les guillemets.</p>

<p>Par exemple&nbsp;:</p>

<pre>SELECT "Id", "Valeur" FROM "Matable";</pre>

<p>Remarquez que ce comportement est différent d'autres moteurs, qui soit passent tous les noms en majuscule, soit conservent la casse. (Le comportement standard pour un SGBD est d'ignorer la casse, ainsi il est déconseillé généralement d'utiliser des noms d'objet avec des casses différentes&nbsp;: si vous utilisez toujours des minuscules, le comportement sera toujours le même, quel que soit le SGBD)</p>

<h4>Erreurs et transactions</h4>

<p>Avec PostgreSQL, lorsqu'une erreur se produit dans une transaction, il n'est pas possible de l'ignorer. L'erreur doit être gérée. Sinon tous les ordres suivants sont également en erreur.

De plus, à la fin de la transaction, il n'est pas possible de commiter. L'ordre <em>COMMIT</em> provoque en réalité un <em>ROLLBACK</em>. </p>

<p>Exemple&nbsp;:</p>

<pre>mabase=&gt; begin;<br />BEGIN<br />mabase=&gt; insert into matable(valeur, nb) values ('c',2);<br />INSERT 0 1<br />mabase=&gt; insert into matable(valeur, nb) values ('c',2);<br />ERREUR:  la valeur d'une clé dupliquée rompt la contrainte unique « u_matable »<br />mabase=&gt; insert into matable(valeur, nb) values ('d',2);<br />ERREUR:  la transaction est annulée, les commandes sont ignorées jusqu'à la fin du bloc<br />de la transaction<br />mabase=&gt; commit;<br />ROLLBACK<br />mabase=&gt; select valeur, nb from matable;<br /> valeur | nb<br /> -------+---<br /> a      |  2<br /> b      |  2<br />(2 lignes)<br /><br />mabase=&gt;</pre>

<h4>Savepoints</h4>

<p>Les savepoints ne sont pas spécifiques à PostgreSQL. Mais c'est une fonctionalité SQL trop peu connue, et pourtant extrêmement utile, dans le cas de traitements lourds.</p>

<p>Un savepoint sert à marquer un point de reprise dans un traitement. Lorsque vous avez à effectuer un traitement long (par exemple lorqu'un programme doit mettre à jour tout un ensemble de données les unes après les autres), vous pouvez mettre des savepoints à intervalles réguliers. Lorsqu'une erreur se produit, vous faites en sorte que le programme effectue un ROLLBACK TO SAVEPOINT vers un point de sauvegarde où l'état de vos données est cohérent (généralement le dernier point de sauvegarde). Ensuite vous pouvez annuler le traitement (après par exemple pris la précaution de loguer les événements...)</p>

<p>L'intérêt est que seul les traitements effectués après le point de sauvegarde sont perdus. Cela évite à votre programme de faire un ROLLBACK sur l'ensemble du traitement! Votre programme peut ainsi effectuer des traitements partiellement.</p>

<h4>DDL dans les transactions!</h4>

<p>Une des fonctionnalités les plus épatantes de PostgreSQL est la possibilité d'inclure des ordres DDL dans des transactions.</p>

<p><ins>Exemple :</ins>

Dans une transaction, on crée une table "test", puis une table "matable". La création de "matable" échoue (la table existe déjà). On fait un rollback sur la transaction&nbsp;: la table "test" n'existe pas.</p>

<pre>mabase=&gt; BEGIN;<br />BEGIN<br />mabase=&gt; CREATE TABLE test (<br />    id serial NOT NULL,<br />    valeur character varying(20) NOT NULL);<br />NOTICE:  CREATE TABLE créera des séquences implicites « test_id_seq » pour la colonne serial « test.id »<br />CREATE TABLE<br />mabase=&gt; ALTER TABLE test ADD CONSTRAINT pk_test PRIMARY KEY (id);<br />NOTICE:  ALTER TABLE / ADD PRIMARY KEY créera un index implicite « pk_test » pour la table « test »<br />ALTER TABLE<br />mabase=&gt; CREATE TABLE matable (<br />    id serial NOT NULL,<br />    valeur character varying(20) NOT NULL);<br />NOTICE:  CREATE TABLE créera des séquences implicites « matable_id_seq1 » pour la colonne serial « matable.id »<br />ERREUR:  la relation « matable » existe déjà<br />mabase=&gt; ROLLBACK;<br />ROLLBACK<br />mabase=&gt; \d<br />                 Liste des relations<br /> Schéma |       Nom        |   Type   | Propriétaire<br />+<del>+</del>+--<br /> public | matable          | table    | tom<br /> public | matable_id_seq   | séquence | tom<br /> public | table_flo        | table    | flo<br /> public | table_flo_id_seq | séquence | flo<br />(4 lignes)<br /><br />mabase=&gt;</pre>

<p><ins>Intérêt :</ins></p>

<p>On peut faire tout un ensemble de modification de façon atomique (par exemple la migration d'un schéma pour l'évolution d'une application). C'est un soulagement pour le DBA qui devra passer votre script de migration, de nuit, de savoir qu'il n'aura pas à restaurer la base en cas d'échec.</p>

<h4>Count(*)</h4>

<p>En raison de l'implémentation actuelle du MVCC, count(*) force le parcours complet de la table, ce qui est donc lent.</p>

<h2>Et après?</h2>

<h3>Lire la documentation&nbsp;:</h3>

<p>Lien vers la documentation en Français&nbsp;:  <a href="http://docs.postgresql.fr/" hreflang="fr">http://docs.postgresql.fr/</a></p>

<p>En anglais&nbsp;: <a href="http://www.postgresql.org/docs/" hreflang="en">http://www.postgresql.org/docs/</a></p>

<h3>Sites utiles&nbsp;:</h3>

<p><a href="http://www.postgresql.org/" hreflang="en">http://www.postgresql.org/</a>&nbsp;: site officiel</p>

<p><a href="http://www.postgresql.fr/" hreflang="fr">http://www.postgresql.fr/</a>&nbsp;: site de la communauté francophone.</p>

<h3>Pour trouver de l'aide complémentaire&nbsp;:</h3>

<h4>Listes de diffusion&nbsp;:</h4>

<p>La liste francophone&nbsp;:

<a href="http://archives.postgresql.org/pgsql-fr-generale/" hreflang="fr">http://archives.postgresql.org/pgsql-fr-generale/</a></p>

<p>Les autres&nbsp;:

<a href="http://www.postgresql.org/community/lists/" hreflang="en">http://www.postgresql.org/community/lists/</a>

(attention les listes "developer" sont pour les développeurs DE PostgreSQL!)</p>

<h4>Forum de la communauté francophone&nbsp;:</h4>

<p><a href="http://forums.postgresql.fr/" hreflang="fr">http://forums.postgresql.fr/</a></p>

<h4>Remarque&nbsp;: comment poser vos questions?</h4>

<p>Si vous avez un problème, pensez à ceux qui vont tenter de vous aider. Evitez de leur faire perdre du temps (ça vous en fera gagner à vous aussi !)&nbsp;: donnez le maximum d'informations utiles pour celui qui va vous aider. Soyez le plus clair possible. Pensez à préciser au minimum quelle est la version de PostgreSQL utilisée, quel est le système d'exploitation. Si vous n'arrivez pas à vous connecter, précisez si le client est sur la même machine que le serveur. Recopiez les messages d'erreurs, consultez la log...</p>

<p>Consultez le très intéressant article de S. Raymon sur "la bonne manière de poser les questions"&nbsp;:

<a href="http://www.gnurou.org/writing/smartquestionsfr" hreflang="fr">http://www.gnurou.org/writing/smartquestionsfr</a></p>