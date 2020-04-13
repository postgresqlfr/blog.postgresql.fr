---
layout: post
title: "Guide d&#39;installation rapide de PostgreSQL 8.3 sur MacOS"
author: "escapek"
redirect_from: "index.php?post/drupal-277 "
---


<p></p>

<!--more-->


Ce document est guide d'installation <em>rapide</em> de <a href="http://www.postgresql.org/">PostgreSQL 8.3</a> sur MacOS 10.4.

<h1>Pré-requis et téléchargements</h1>

<ul>

<li>Téléchargez et installez les <a href="http://developer.apple.com/tools/xcode/">outils de développement Apple</a>. Ces outils sont nécessaires pour l'installation de PostgreSQL. Ils incluent notamment le compilateur GCC et d'autres outils GNU.</li>

<li>Télécharger et installer la dernière version de <a href="http://fink.sourceforge.net/">Fink</a>. Il s'agit d'un projet de portage d'outils UNIX sous MacOS. Il contient notamment la bibliothèque readline ainsi que bison.</li>

<li>Cela va de soit, téléchargez <a href="http://www.postgresql.org/ftp/source/v8.3.0/">l'archive source</a> de PostgreSQL.</li>

<li>Assurez vous que readline et bison sont installés par Fink:</li>

</ul>

<p class="code">

sudo  /sw/bin/fink install readline

sudo  /sw/bin/fink install bison

</p>

Saisissez votre mot de passe administrateur. Fink installera alors bison et readline dans <code>/sw</code>.

&nbsp;

<h1>Compilation et installation</h1>

Saisissez les commandes suivantes pour décompresser l'archive et lancer la procédure de compilation/installation:

<p class="code">

$ sudo bash

$ cd /usr/local

$ mkdir src

$ cd src

$ tar xzvf <path to="" postgresql="" archive="">/postgresql-8.3.0.tar.gz

...

$ cd postgresql-8.3.0

$ ./configure --with-includes=/sw/include --with-libraries=/sw/lib --with-perl --with-openssl --with-bonjour --with-pam --with-krb5 --with-tcl --prefix=/usr/local/pgsql

$ make

$ make install

</path></p>

Ces commandes lancent la configuration des sources, leur compilation et finalement l'installation des binaires sous <code>/usr/local/pgsql</code>. Le script de configuration peut accépter d'autres options. Voir la documentation de PostgreSQL pour la liste de ces options.

&nbsp;

<h1>Création de la base de données</h1>

Il est recommandé de créer un compte utilisateur qui sera propriétaire des fichiers de données. Pour faire cela, ouvrer le panneau <strong>Comptes</strong> dans les <strong>Préférences systèmes</strong> (Menu <em>pomme</em>). Créez ensuite un nouvel utilisateur comme suit:

<img src="http://www.postgresqlfr.org/files/Postgres_user_creation.png" />

Créez ensuite un répertoire pour héberger les fichiers de données. Ce répertoire peut être placé n'importe où sur votre disque dur. Assurez vous qu'il appartienne à l'utilisateur <code>postgres</code>. Voici un exemple:

<p class="code">

$ mkdir /usr/local/pgsql/data

$ chown postgres /usr/local/pgsql/data

</p>

Connectez-vous ensuite sous le compte <code>postgres</code>:

<p class="code">

$ su -l postgres

</p>

et lancez l'outil d'initialisation du cluster de base de données:

<p class="code">

$ /usr/local/pgsql/bin/initdb -D /usr/local/pgsql/data

</p>

Finalement, lancez les processus serveur:

<p class="code">

$ /usr/local/pgsql/bin/pg_ctl -D /usr/local/pgsql/data -l logfile start

</p>

Voir la <a href="http://www.postgresql.org/docs/">documentation PostgreSQL</a> pour de plus amples informations sur la configuration de PostgreSQL, et notamment la sécurisation des accès.

<h1>Configuration de l'environnement</h1>

Ajoutez les lignes suivantes au fichier <code>~/.bash_profile</code> en étant connecté <code>postgres</code>:

<p class="code">

PATH=$PATH:/usr/local/pgsql/bin

export PATH

</p>

C'est fini !

&nbsp;

<h1>Démarrage automatique</h1>

Les sources de PostgreSQL incluent des fichiers de démarrage automatiques spécifiques à MacOS. L'installation de ces scripts vous permettra de mettre en place le démarrage automatique de postgreSQL au démarrage de la machine. Pour installer ces scripts, utilisez la procédure suivante:

<p class="code">

$ sudo /usr/local/src/postgresql-8.3.0/contrib/start-scripts/install.sh

</p>

Si vous voulez désactivez ensuite le lancement automatique, éditez le fichier<code>/etc/hostconfig</code> et changez:

<p class="code">

POSTGRESQL=-NO-

</p>

Vous pouvez aussi contrôler le démarrage ou l'arrêt de postgreSQL par :

<ul>

<li><strong>sudo SystemStarter stop PostgreSQL</strong> : pour arrêter postgreSQL</li>

<li><strong>sudo SystemStarter start PostgreSQL</strong> : pour démarrer PostgreSQL</li>

</ul>

&nbsp;

<h1>Références</h1>

<ul>

<li><a href="http://developer.apple.com/internet/opensource/postgres.html">http://developer.apple.com/internet/opensource/postgres.html</a></li>

<li><a href="http://www.escapek.org/PostgreSQL_8_3_installation_on_MacOS">Cet article en anglais.</a>

</li>

</ul>

&nbsp;