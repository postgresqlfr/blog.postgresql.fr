---
layout: post
title: "Sortie de QtSqlBrowser version 0.8"
author: "Jean-Paul Argudo"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/35"
---


<p></p>

<!--more-->


<p>

Le but de ce projet est de proposer une interface graphique simple pour naviguer dans une base de données. L'outil est une simple agrégation de classes Qt dédiées aux bases de données. L'abstraction de bases de données est fournie par les pilotes de données de Qt. Les pilotes pour PostgreSQL et MySQL fonctionnent correctement. Si vous avez une version commerciale de Qt, vous pouvez aussi utiliser les pilotes inclus pour Oracle, TDS et DB2.

</p>

<p>

En théorie, il n'y a aucune raison pour que les pilotes ODBC3 des bases de données populaires comme Oracle, DB2, Informix, Firebird ou SAP/DB ne fonctionnent pas.

</p>

<p>

L'outil est aujourd'hui stable et relativement utilisable, bien que toutes les fonctionalités n'y soient pas encore. Les suivantes ont été complétées récemment&nbsp;:

</p>

<ul>

<li>Navigateur arborescent pour les bases de données et les tables</li>

<li>Affichage de la description des tables</li>

<li>Affichage du contenu de la table dans la fenêtre principale</li>

<li>Exécution de requêtes SQL dans la fenêtre de requétage</li>

<li>Historique des commandes dans la fenêtre de requétage</li>

<li>Récupération des détails de connexion depuis un fichier de configuration en XML</li>

<li>Récupération d'autres paramètres de configuration depuis un fichier en XML</li>

<li>Boite de dialogue pour le mot de passe des connexions</li>

<li>Ajout de nouvelles connexions via l'interface graphique</li>

<li>Affichage des vues de la base de données avec un icône différencié</li>

<li>Le nom de la connexion peut être indépendant de celui de la base de données</li>

<li>Ajout d'un bouton-type lors de la création d'une nouvelle connexion</li>

<li>Génération dynamique de la liste des drivers disponibles</li>

<li>Configuration via autoconf</li>

<li>Correction d'un bug lorsqu'on exécute des updates ou inserts deux fois de suite</li>

<li>Rafraîchissement d'une connexion à une base de données</li>

<li>Suppression des connexions via l'interface</li>

<li>Édition des connexions via l'interface</li>

<li>Recherche de l'existence d'un répertoire ~/.qtsql</li>

<li>Création d'un squelette de fichier de configuration</li>

<li>Sauvegarde automatique de l'historique</li>

</ul>

<p>

Les fonctionalités suivantes seront implémentées pour la version 1.0&nbsp;:

</p>

<ul>

<li>Sauvegarde des requêtes et de leurs résultats.</li>

<li>Sauvegarde des dimensions de l'interface graphique lors de sa fermeture.</li>

<li>Détection des contraintes clé primaire / clé étrangère / unique.</li>

<li>Raccourcis clavier.</li>

</ul>

<p><strong>Site Web:</strong><br />

<a href="http://www.mobiustech.net/qtsql/">

http://www.mobiustech.net/qtsql/</a>

</p>