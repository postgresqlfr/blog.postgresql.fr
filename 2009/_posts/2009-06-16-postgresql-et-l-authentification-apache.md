---
layout: post
title: "Postgresql et l&#39;authentification Apache"
author: "pascal62fr"
redirect_from: "index.php?post/2009-06-11-postgresql-et-l-authentification-apache "
---




<!--more-->


<p><strong>Postgresql et l'authentification Apache</strong></p>

<p>Comment utiliser Postgresql pour l'authentification Apache</p>

<p>Apache permet de protéger, à l'aide d'un login et d'un mot de passe, l'accès à un répertoire ou à un fichier, par utilisateur ou groupe d'utilisateurs. Apache permet d'utiliser plusieurs méthodes pour gérer les droits des utilisateurs. L'administrateur Web a à sa disposition un script Apache, «&nbsp;htpasswd&nbsp;», et des fichiers de configuration de type texte. Il peut utiliser un annuaire LDAP ou une base de données Postgresql.

L'utilisation de Postgresql permet de simplifier la programmation. La gestion des droits d'accès dans le site Web se fait en modifiant les tables, users et groups. Pour mettre en place cette technique il faut configurer Apache et Postgresql, cette documentation explique comment faire.</p>

<p><strong>Préalable</strong></p>

<p>Considérons que vous avez un serveur Web Apache et une base de données Postgresql fonctionnels. Si vous souhaitez modifier dynamiquement les droits Apache, il faut que vous sachiez vous connecter à Postgresql de Apache/Web/PHP, par exemple. Les fichiers de configuration donnés en exemple, sont ceux utilisés sur une distribution Linux RedHat Enterprise.</p>

<p><strong>Installation et configuration</strong></p>

<p>Vous avez donc installé et configuré un serveur web Apache et une base de données Postgresql.</p>

<p>Il vous reste à:</p>

<ul>

<li>Ajouter les tables «&nbsp;users&nbsp;» et «&nbsp;groups&nbsp;» dans une base de données Postgresql.</li>

<li>Installer le module Apache mod_auth_pgsql.</li>

<li>Configurer le fichier Apache /etc/httpd/conf.d/auth_pgsql.conf</li>

<li>Ajouter des fichiers .htaccess dans les répertoires à protéger.</li>

</ul>

<p>La suite décrit chacune de ces tâches.</p>

<p><strong>Descriptif des tables users et groups Postgresql</strong></p>

<p>Il faut ajouter à votre base de données Postgresql, les tables «&nbsp;users&nbsp;» et «&nbsp;groups&nbsp;», si vous conservez les noms standards des tables.

Les tables users et groups doivent être conformes au format attendu par Apache.

De plus les tables «&nbsp;users&nbsp;» et «&nbsp;groups&nbsp;» seront lu fréquemment par Apache, elles n'ont pas pour vocation de gérer des données des utilisateurs, hors le login, le mot de passe et l'appartenance à un ou plusieurs groupes d'utilisateurs. Il y a une clé étrangère dans la table «&nbsp;users&nbsp;» proposée. Elle permet des jointures avec une table qui gère les identités des utilisateurs.</p>

<p><strong>Exemple de tables users et groups</strong></p>

CREATE TABLE users<br />

(<br />

user_name character varying(64) NOT NULL,<br />

user_passwd character varying(32) NOT NULL,<br />

"uIdIdentite" integer NOT NULL,<br />

CONSTRAINT users_pkey PRIMARY KEY (user_name),<br />

CONSTRAINT "idIdentite" FOREIGN KEY ("uIdIdentite")<br />

REFERENCES "TIdentite" ("IdIdentite") MATCH SIMPLE<br />

ON UPDATE NO ACTION ON DELETE NO ACTION<br />

)<br />

WITH (OIDS=FALSE);<br />

ALTER TABLE users OWNER TO basecnl;<br />

<br />

CREATE TABLE groups<br />

(<br />

user_name character varying(64) NOT NULL,<br />

user_group character varying(20) NOT NULL,<br />

CONSTRAINT groups_pkey PRIMARY KEY (user_name, user_group),<br />

CONSTRAINT groups_user_name_fkey FOREIGN KEY (user_name)<br />

REFERENCES users (user_name) MATCH FULL<br />

ON UPDATE CASCADE ON DELETE CASCADE<br />

)<br />

WITH (OIDS=FALSE);<br />

ALTER TABLE groups OWNER TO basecnl;<br />

<p>La modification de users et groups, à l'aide de pgadmin3 par exemple, permet de gérer finement les droits d'accès au site Web. Vous pouvez aussi le faire dynamiquement par programmation.</p>

<p>La base de données et les tables qu'Apache utilise pour l'authentification, sont à définir dans /etc/httpd/conf.d/auth_pgsql.conf.</p>

<p><strong>Installer le module Apache mod_auth_pgsql</strong></p>

<p>La façon de faire dépend de la distribution linux, il faut installer mod_auth_pgsql.so.</p>

<p><strong>Configuration de Apache 2 pour Postgresql</strong></p>

<p>Nous utiliserons le module Apache2, mod_auth_pgsql, avec une authentification type: mod_auth_basic".</p>

<p>/usr/lib64/httpd/modules/mod_auth_pgsql.so</p>

<p><strong>Exemple de fichier /etc/httpd/conf.d/auth_pgsql.conf</strong> </p>

<p>Dans le fichier /etc/httpd/conf.d/auth_pgsql.conf, vous reconnaîtrez le nom des tables et des champs que vous avez défini dans Postgresql.</p>

LoadModule auth_pgsql_module modules/mod_auth_pgsql.so<br />

&lt;Directory /var/www&gt; <br />

&nbsp;&nbsp; AuthName "PostgreSQL group authenticated zone" <br />

&nbsp;&nbsp; AuthType Basic <br />

&nbsp;&nbsp; Auth_PG_database basecnl <br />

&nbsp;&nbsp; Auth_PG_pwd_table users <br />

&nbsp;&nbsp; Auth_PG_uid_field user_name <br />

&nbsp;&nbsp; Auth_PG_pwd_field user_passwd<br />

&nbsp;&nbsp; Auth_PG_grp_table groups <br />

&nbsp;&nbsp; Auth_PG_grp_user_field user_name <br />

&nbsp;&nbsp; Auth_PG_grp_group_field user_group&nbsp;<br />

&lt;/Directory&gt; <br />

<p><strong>Configuration de Apache – .htaccess des répertoires Web</strong></p>

<p>Les fichiers .htaccess sont des fichiers de configuration d'Apache, permettant de définir des règles dans un répertoire et dans tous ses sous-répertoires (qui n'ont pas de tel fichier à l'intérieur).</p>

<p><strong>Exemple de fichier .htaccess</strong></p>

<p>Ce fichier autorise l'accès au répertoire pour les utilisateurs du groupe «&nbsp;correspondant&nbsp;»</p>

AuthName "Acces restreint aux correspondants&nbsp;" <br />

AuthType basic <br />

#AuthBasicAuthoritative off <br />

Auth_PG_authoritative on <br />

Auth_PG_host localhost <br />

Auth_PG_port xxxx <br />

Auth_PG_user xxxx <br />

Auth_PG_database xxxx <br />

#Auth_PG_pwd xxxxxxxx <br />

Auth_PG_pwd_table "users" <br />

Auth_PG_uid_field user_name <br />

Auth_PG_pwd_field user_passwd <br />

Auth_PG_grp_table "groups" <br />

Auth_PG_grp_user_field user_name <br />

Auth_PG_grp_group_field user_group<br />

Auth_PG_grp_whereclause " and user_group = 'correspondant' " <br />

Auth_PG_encrypted off <br />

&lt;LIMIT GET POST&gt; <br />

require valid-group <br />

&lt;/LIMIT&gt; <br />

<p>«&nbsp;AuthBasicAuthoritative off&nbsp;» et  «&nbsp;Auth_PG_pwd xxxxxxxx&nbsp;» sont en commentaire. Dans certaines configurations, il faut enlever les commentaires.</p>

<p><strong>Descriptif des champs</strong></p>

Auth_PG_host&nbsp;: Nom ou adresse IP du serveur Postgresql<br />

Auth_PG_port&nbsp;: Port utilisé, par default 5432<br />

Auth_PG_user&nbsp;: Nom de l'utilisateur Postgresql<br />

Auth_PG_pwd&nbsp;: Mot de passe de l'utilisateur<br />

Auth_PG_database&nbsp;: Nom de la base de données<br />

Auth_PG_pwd_table&nbsp;: Nom de la table ou sont stockés les utilisateurs<br />

Auth_PG_uid_field&nbsp;: Nom du champ qui contient le Login de l'utilisateur<br />

Auth_PG_pwd_field&nbsp;: Nom du champ qui contient les mots de passe<br />

Auth_PG_encrypted&nbsp;: Si off les mots de passe sont stockés en clair dans la table<br />

Auth_PG_hash_type&nbsp;: Soit MD5 ou CRYPT<br />

<p><strong>Conclusion</strong></p>

<p>Postgresql est particulièrement performant pour gérer l'authentification Apache. Choisir Postgresql pour réaliser des sites Web dynamique, c'est choisir la garanti d'avoir un produit à la fois professionnel et libre.</p>

<p><strong>Références</strong></p>

mod_auth_pgsql documentation officielle en anglais&nbsp;: http://www.giuseppetanzilli.it/mod_auth_pgsql2/<br />

Apache france: http://forums.apachefrance.com/<br />

Wikipedia les fichiers .htaccess Apache&nbsp;: http://fr.wikipedia.org/wiki/Htaccess<br />

Postgresqlfr le site de la communauté francophone; http://www.postgresql.fr/<br />

<p><strong>Pascal Brognez </strong>, le 16 juin 2009</p>