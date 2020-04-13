---
layout: post
title: "Guide pratique de compilation de PostgreSQL sous Windows"
author: "gleu"
redirect_from: "index.php?post/drupal-367 "
---


<p></p>

<!--more-->


<p><em>Auteur</em>&nbsp;: Vishal Kashyap (Sai Hertz And Control Systems Pvt.

Ltd)</p>

<p><em>Traducteur</em>&nbsp;: Guillaume Lelarge</p>

<h2>Que vais-je obtenir&nbsp;?</h2>

<ol>

<li>Une version exécutable sous Windows de PostgreSQL&nbsp;;</li>

<li>Un serveur PostgreSQL s'exécutant comme un service windows.</li>

</ol>

<!--break-->

<h2>License</h2>

<p><em>Important&nbsp;:</em> Le texte ci-dessous est la version française de la

licence de ce document. Seule la version originale de cette licence, présentée

dans la section suivante, fait foi.</p>

<p>Ce document est sous licence "Faites passer le mot". Il ne vous coûtera rien.

Utilisez-le à vos risques et périls. Tous les logiciels mentionnés appartiennent

à leur propriétaires respectifs.</p>

<h2>License</h2>

<p><em>Important&nbsp;:</em> Le texte ci-dessous est la licence de ce document.

Ce texte fait foi. Il est composé de la licence (en anglais) du document

original.</p>

<p>This document is licensed under "Spread the good word license" will not cost

monetarily you or your lawyer anything. Use it on your own risk. All Software

mentioned belongs to their respective owners.</p>

<h2>Prérequis</h2>

<ul>

<li>Beaucoup d'argent pour acheter Windows, un anti-virus et un pare-feu&nbsp;;</li>

<li>Une connexion Internet&nbsp;;</li>

<li>Ce fichier d'aide&nbsp;;</li>

<li>MinGW et Msys

<ul>

<li>Pour MinGW&nbsp;:

<a href="http://prdownloads.sf.net/mingw/MinGW-3.1.0-1.exe?download">

http://prdownloads.sf.net/mingw/MinGW-3.1.0-1.exe?download</a></li>

<li>Pour Msys&nbsp;:

<a href="http://prdownloads.sf.net/mingw/MSYS-1.0.9.exe?download">

http://prdownloads.sf.net/mingw/MSYS-1.0.9.exe?download</a></li>

</ul>

Ces liens pourraient être changé suite à de nouvelles versions&nbsp;;</li>

<li>Dernière version de développement de PostgreSQL sur

<a href="ftp://ftp.postgresql.org/pub/dev/postgresql-snapshot.tar.gz%C2%A0;">

ftp://ftp.postgresql.org/pub/dev/postgresql-snapshot.tar.gz</a>&nbsp;;</li>

<li>300 Mo d'espace disque, de préférence dans la partition c:\&nbsp;;</li>

<li>Pour l'installer en tant que service, téléchargez FireDaemon Lite Service

Manager sur <a href="http://www.firedaemon.com/#downloads">http://www.firedaemon.com/#downloads</a>.</li>

</ul>

<h2>Avant de commencer</h2>

<p>Si vous trouvez une erreur ou avez des suggestions, n'hésitez pas à m'en

faire part.</p>

<p>Vous aurez besoin de quelques emplacements sur votre disque&nbsp;:</p>

<ul>

<li>&lt;partition_d_installation&gt; est toute partition sur votre disque où

vous allez installer PostgreSQL (par exemple c:\, d:\ ou e:\)&nbsp;;</li>

<li>&lt;repertoire_d_installation&gt; est le nom du répertoire où se

trouveront les exécutables Windows de PostgreSQL&nbsp;;</li>

<li>&lt;repertoire_des_bases_de_donnees&gt; est le chemin vers les fichiers de

données de la base de données.</li>

</ul>

<p>Ce document a été écrit lors d'une installation sur un Windows XP SP1

donc pour les utilisateurs de Win9X, Windows ME, merci de trouver les

équivalents pour toutes les instructions.</p>

<h2>Installation</h2>

<h3>MinGW</h3>

<ol>

<li>Cliquez sur l'exécutable MinGW et réalisez les étapes de la séquence habituelle

d'une installation.</li>

</ol>

<h3>Msys</h3>

<ol>

<li>Cliquez simplement sur l'exécutable MinGW et réalisez les étapes de la séquence habituelle

d'une installation.</li>

<li>Copiez toutes les données de &lt;partition_d_installation&gt;:\MinGW dans

&lt;partition_d_installation&gt;:\msys\1.0\mingw</li>

</ol>

<h3>PostgreSQL</h3>

<ol>

<li>Copiez le fichier postgresql-snapshot.tar.gz dans

&lt;partition_d_installation&gt;:\msys\1.0\home\&lt;utilisateur Windows

NT&gt;</li>

<li>Maintenant, exécutez

&lt;partition_d_installation&gt;:\msys\1.0\msys.bat ou en cliquant sur

l'icône de bureau de MSYS</li>

<li>Compilez en exécutant les étapes suivantes&nbsp;:

<ol>

<li><code>tar -zxf postgresql-snapshot.tar.gz</code></li>

<li><code>cd postgresql-snapshot</code></li>

<li><code>configure ­-without-zlib</code></li>

<li><code>make</code></li>

<li><code>make installcheck &gt;&gt; traces.txt</code></li>

<li><code>make install</code> (lisez les conseils en cas de problèmes

ci-dessous)</li>

</ol>

</li>

<li>Maintenant, à partir de l'explorateur Windows, copiez tous les

fichiers du répertoire

&lt;partition_d_installation&gt;:\msys\1.0\local\pgsql\lib dans

c:\windows\system32 (sur WindowsXP et Windows2000) et dans

c:\winnt\system32 (sur WindowsNT 4.0)</li>

<li>Créez un répertoire nommé

&lt;partition_d_installation&gt;:\&lt;repertoire_d_installation&gt; et

copiez tout ce qui se trouve dans

&lt;partition_d_installation&gt;:\msys\1.0\local\pgsql dans

&lt;partition_d_installation&gt;:\&lt;repertoire_d_installation&gt;</li>

<li>Nous allons mettre les commandes PostgreSQL dans le chemin système

(variable d'environnement PATH)&nbsp;:

<ol>

<li>Menu Démarrer &gt;&gt; Panneau de configuration &gt;&gt;

Système</li>

<li>Sélectionnez l'onglet Avancé (sur WindowsXP et Windows 2000)</li>

<li>Cliquez sur le bouton "Variables d'environnement"</li>

<li>Cherchez la variable PATH</li>

<li>Sélectionnez-la et cliquez sur le bouton Edition</li>

<li>A la fin du texte, tapez ;&lt;partition_d_installation&gt;:\&lt;repertoire_d_installation&gt;\bin

</li>

</ol></li>

<li>Initialisez la base de données&nbsp;:

<ol>

<li>Ouvrez une fenêtre de commandes et entrez la commande

<code>initdb -D -W &lt;repertoire_des_bases_de_donnees&gt; --lc-collate=C</code>

</li>

</ol>

</li>

<li>Exécutez manuellement le serveur PostgreSQL en lançant la

commande&nbsp;

<code>postmaster -D &lt;repertoire_des_bases_de_donnees&gt;</code></li>

</ol>

<h2>PostgreSQL en tant que Windows NT</h2>

<p>Cette section est valide uniquement pour les systèmes d'exploitation

suivants&nbsp;:</p>

<ol>

<li>Windows NT 4.0 SP 6a&nbsp;;</li>

<li>Windows 2000 SP4&nbsp;;</li>

<li>Windows XP SP1&nbsp;;</li>

<li>Windows 2003 (devrait fonctionner).</li>

</ol>

<p>Installez FireDaemon Lite Service Manager et créez un nouveau service en lui

affectant le nom que vous souhaitez. Les valeurs probables des champs

seront&nbsp;:</p>

<ul>

<li>Working Directory&nbsp;:

&lt;partition_d_installation&gt;:\&lt;repertoire_d_installation&gt;</li>

<li>Environment&nbsp;: &lt;repertoire_des_bases_de_donnees&gt; (dans notre

exemple c:\data).</li>

</ul>

<h2>FAQ</h2>

<h3>Le service Windows ne se lance pas automatiquement.</h3>

Supprimez le fichier *.pid à partir du répertoire des fichiers de la base de

données (c'est-à-dire c:\data dans notre exemple) et relancez le service

<h3>Comment puis-je accéder à la base de données</h3>

La base de données par défaut est template1. Pour vous connecter, utilisez la

commande suivante&nbsp;: psql template1