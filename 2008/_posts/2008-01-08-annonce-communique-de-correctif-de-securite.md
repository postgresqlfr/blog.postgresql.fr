---
layout: post
title: "[ANNONCE] Communiqué de correctif de sécurité"
author: "kryskool"
categories: [Sécurité]
redirect_from: "index.php?post/drupal/274"
---


<h1>Le 07 Janvier 2008</h1>

<p>Aujourd'hui le «&nbsp;PostgreSQL Global Development Group&nbsp;» a publié des mises à jours de version, qui corrigent cinq failles de sécurité. Ces publications mettent à jour toutes les versions de <strong>PostgreSQL</strong>, de la <strong>8.2</strong> à la <strong>7.3</strong>. Elles sont considérées comme <ins>CRITIQUE</ins> et les administrateurs PostgreSQL et systèmes doivent appliquer les mises à jours le plus rapidement possible. L'équipe de PostgreSQL dédiée à la sécurité a fait de gros efforts pour permettre à ces mises à jours d'être portées également sur les anciennes versions pour que la mise à jour ne nécessite pas de conversion de données.</p>

<p>Merci de lire le reste de ce message pour davantage d'informations complémentaires et d'annonces.</p>

<!--more-->


<h2>Détail des correctifs de sécurités</h2>

<p>Il y a cinq correctifs de sécurité inclus dans ces versions. Aucune de ces failles n'a pour le moment été exploitée sur le terrain&nbsp;; elles ont été découvertes au travers d'une analyse de sécurité.</p>

<p><em>Index Functions Privilege Escalation</em> (<strong>CVE-2007-6600</strong>)&nbsp;: PostgreSQL permet aux utilisateurs de créer des index à partir du résultat d'une fonction utilisateur. Ce sont des index d'expression. Deux vulnérabilités par élévation de droit en découlent&nbsp;:

</p>

<ol>

<li>les index fonctionnels sont exécutés en tant que super-utilisateur et non pas en tant que propriétaire de la table durant le VACUUM et l'ANALYSE&nbsp;</li>

<li>SET ROLE et SET SESSION AUTHORIZATION sont autorisés dans le cadre des index fonctionnels.</li>

</ol>

Ces deux failles sont maintenant corrigées.

<p><em>Regular Expression Denial-of-Service</em> (<strong>CVE-2007-4772</strong>, <strong>CVE-2007-6067</strong>, <strong>CVE-2007-4769</strong>)&nbsp;: trois problèmes distincts dans la bibliothèque des expressions rationnelles utilisée par PostgreSQL autorise un utilisateur mal intentionné d'initier un déni de service (DOS) en passant certaines expressions dans les requêtes SQL. La première peut créer une boucle infinie en utilisant une expression rationnelle forgée pour. Pour la seconde, certaines expressions rationnelles peuvent consommer une quantité excessive de mémoire. La troisième permet un dépassement du nombre de références de retour qui pouvait être utilisé pour arrêter brutalement le serveur. Tous ces problèmes ont été corrigés.</p>

<p><em>DBLink Privilege Escalation</em> (<strong>CVE-2007-6601</strong>)&nbsp;: les fonctions DBLink combinées avec une identification locale trust ou ident peuvent être utilisées par un utilisateur mal intentionné dans le but d'acquérir les droits super-utilisateur. Ce problème a été corrigé, et n'affecte pas les utilisateurs qui veulent installer DBLink (comme module optionnel), ou qui utilisent l'authentification <em>password</em> pour les accès locaux. Ce problème avait été traité dans les versions précédentes (voir <strong>CVE-2007-3278</strong>), mais le correctif n'avait pas bouché toutes les formes possibles de la faille.</p>

<h2>Notification de fin de vie produit</h2>

<p>La version mineure <strong>7.3.21</strong> sera certainement la dernière mise à jour de la série <strong>7.3</strong>. Comme la version 7.3 a maintenant plus de 5 ans, la communauté ne produira plus de mises à jours après celle-ci. Les utilisateurs de la <strong>7.3</strong> sont encouragés à mettre à jour vers la dernière version stable le plus rapidement possible, ou obtenir du support auprès de partenaire commerciaux qui voudront bien continuer la maintenance de cette série.</p>

<p><strong>8.1.11</strong> et <strong>8.0.15</strong> sont également les dernières versions mises à jours des séries <strong>8.1</strong> et <strong>8.0</strong> pour lesquelles la communauté PostgreSQL produit des binaires pour la plateforme Windows. Les utilisateurs de Windows sont encouragés à migrer vers la version <strong>8.2.6</strong> ou supérieurs, qui comprend des correctifs impossible à intégrer aux versions majeures précédentes. Les mises à jours de la <strong>8.1</strong> et <strong>8.0</strong> continueront à être publiées sur les autres plateformes.</p>

<h2>Téléchargement et Installation.</h2>

<p>Les publications mineures de PostgreSQL <strong>8.2.6</strong>, <strong>8.1.11</strong>, <strong>8.0.15</strong>, <strong>7.4.19</strong> et <strong>7.3.21</strong> sont disponibles à travers notre réseau de miroirs FTP&nbsp;:</p>

<ul>

<li>Code source&nbsp;: <a href="http://www.postgresql.org/ftp/source/" target="_blank">http://www.postgresql.org/ftp/source/</a>&nbsp;;</li>

<li>Binaires pour différentes plateformes&nbsp;: <a href="http://www.postgresql.org/ftp/binary/" target="_blank">http://www.postgresql.org/ftp/binary/</a>.</li>

</ul>

<p>Si vous avez besoin d'informations complémentaires concernant ces mises à jours, celles-ci sont disponibles dans les notes de version (<a href="http://www.postgresql.org/docs/current/static/release.html" target="_blank">http://www.postgresql.org/docs/current/static/release.html</a>). Ces mises à jours peuvent être copiées directement sur une installation existante de PostgreSQL et ne nécessitent pas de sauvegarde/restauration pour les systèmes qui ont bénéficiés des mises à jours durant les six derniers mois (les versions plus anciennes peuvent nécessiter des procédures complémentaires, voir les notes de version).</p>

<p>Naturellement, les publications de mises à jours de sécurités sont cumulatives. Tous les correctifs de sécurités ont été inclus dans la prochaine version <strong>8.3</strong> "Release candidate". Cette note a été postée sur la page de sécurité de PostgreSQL&nbsp;: <a href="http://www.postgresql.org/support/security" target="_blank">http://www.postgresql.org/support/security</a></p>