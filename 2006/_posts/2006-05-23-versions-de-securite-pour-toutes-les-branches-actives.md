---
layout: post
title: "Versions de sécurité pour toutes les branches actives"
author: "gleu"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/392"
---


<p></p>

<!--more-->


Aujourd'hui, le « PostgreSQL Global Development Group » a sorti les versions 8.1.4, 8.0.8, 7.4.13 et 7.3.15. L'application de cette mise à jour est urgente pour fermer une faille de sécurité sérieuse qui peut permettre une attaque par injection de code SQL sur certaines applications utilisant PostgreSQL.

Nous pressons les utilisateurs à mettre à jour aussi rapidement que possible. Comme la mise à jour affecte les fonctionnalités du client, la plupart des pilotes seront mis à jour cette semaine aussi.

Comme le problème de sécurité est complexe, nous avons ajouté une <a href="http://www.postgresql.org/docs/techdocs.52">section dans Techdocs</a> pour l'expliquer (une traduction est disponible dans les détails de cette news). Merci de la lire avant d'appliquer les mises à jour.

Les <a href="http://www.postgresql.org/download/">téléchargements</a> sont à l'emplacement habituel. Les binaires de certaines plateformes doivent déjà être disponibles.

<!--break-->

<h2>FAQ</h2>

<dl>

<dt>Qu'est-ce qui est sorti&nbsp;?

</dt><dd>Des versions mineures de PostgreSQL, spécifiquement les versions 8.1.4, 8.0.8, 7.4.13 et 7.3.15. Toutes ces versions intègrent un correctif de sécurité qui élimine une vulnérabilité spécifique aux attaques par injection de code SQL.

</dd><dt>Qui est affecté par cette vulnérabilité&nbsp;?

</dt><dd>Les utilisateurs de serveurs PostgreSQL qui sont exposés à des « saisies non vérifiées », à partir d'Intenet ou autre, et qui utilisent un codage multi-octets comme l'UTF-8 ou SJIS. En gros, la plupart des utilisateurs de bases de données open source avec des applications Web.

</dd><dt>Qui n'est pas affecté&nbsp;?

</dt><dd>Différents types d'applications&nbsp;:

<ol>

<li>Les utilisateurs dont les applications de bases de données ne sont pas exposées à des saisies non vérifiées comme les applications mono-utilisateur non exposées à Internet.

</li>

<li>Les bases de données qui sont configurées en LATIN-1 ou tout autre codage mono-octet sur le client et le serveur.

</li>

<li>Si les application envoient des chaînes non vérifiées comme paramètres au lieu de les intégrer dans des commandes SQL, elles ne sont pas vulnérables. Ceci est seulement disponible à partir de PostgreSQL 7.4.

</li>

</ol>

</dd><dt>Certaines applications sont-elles particulièrement visées&nbsp;?

</dt><dd>Les applications utilisant des codages asiatiques (SJIS, BIG5, GBK, GB18030 et UHC) et qui utilisent des méthodes ad-hoc pour réaliser l'échappement des chaînes allant vers la base de données, comme les expressions rationnelles ou la fonction addslashes() de PHP3 et magic_quotes. Comme elles dépassent le code spécifique de la base de données pour une gestion sécurisée des chaînes, un grand nombre de ces applications auront besoin d'être ré-écrites pour devenir sécurisé (note que l'équipe PHP a rendu obsolètes addslashes() et magic_quotes depuis la version 4.0 à cause des problèmes de sécurité. Malheureusement, cela apparaît dans un nombre inquiétant d'applications PHP gratuites).

</dd><dt>Quand les mises à jour seront-elles disponibles&nbsp;?

</dt><dd>Les paquets source sont disponibles maintenant, ainsi que les paquets binaires pour Windows, Red Hat Linux et quelques autres systèmes d'exploitation. Les mises à jour des pilotes PostgreSQL pour la plupart des langages de programmation seront disponibles d'ici mercredi, avec d'autres dans la semaine.

</dd><dt>Que doivent faire les utilisateurs&nbsp;?

</dt><dd>Trois étapes&nbsp;:

<ol>

<li>Lire les notes de sorties sur les nouveaux correctifs&nbsp;;

</li>

<li>Mettre à jour leurs serveurs de bases de données et leurs pilotes&nbsp;;

</li>

<li>Supprimer tout mécanisme d'échappement de chaîne non standard, comme le populaire « backslash-escape » ou « \' » ou au moins les modifier pour utiliser le doublement du guillemet, standard SQL, pour échapper les guillemets.

</li>

</ol>

</dd><dt>Ouille&nbsp;! L'étape 3 semble difficile. Dois-je réellement revoir mon application&nbsp;?

</dt><dd>Seulement si vous utilisez un codage asiatique multi-octets (SJIS, BIG5, GBK, GB18030 et UHC). Si vous utilisez UTF-8, alors installer la nouvelle version de PostgreSQL est suffisant. Bien sûr, vous devriez planifier de migrer votre application pour utiliser les bonnes fonctions d'échappement pour qu'il n'y ait pas de casse lors de la transition de PostgreSQL aux chaînes au standard SQL (qui n'ont pas d'échappement avec antislash). Les chaînes au standard SQL deviendront la valeur par défaut bientôt, peut-être dès PostgreSQL 8.3.

</dd><dt>Que puis-je faire d'autres pour empêcher les attaques par injection de code SQL&nbsp;?

</dt><dd>Il existe plusieurs étapes que vous pouvez utiliser pour empêcher des attaques par injection de code SQL en plus de ces mises à jour, étapes que des développeurs d'application conscients de la sécurité devraient néanmoins faire&nbsp;:

<ol>

<li>Utiliser un bon schéma de sécurité pour la base de données, dans lequel des droits restreints sont affectés aux rôles publics.

</li>

<li>Utiliser des instruction préparées avec paramètre pour exécuter des rquêtes (e.g. "SELECT * FROM table WHERE id = ?") (merci de noter que PHP n'a pas un bon support pour cette fonctionnalité avant la version 5.0)

</li>

<li>Utiliser des procédures stockées pour exécuter les requêtes provenant d'applications web au lieu de les envoyer directement vers la base de données.

</li>

<li>Utiliser un hachage ou un chiffrement des données importantes dans la base de données.

</li>

</ol>

</dd><dt>Que dois-je faire si j'utilise PostgreSQL 7.2 ou 7.1&nbsp;?

</dt><dd>Vous devriez avoir mis à jour deux ans auparavant. PostgreSQL 7.2 n'est plus maintenu depuis 2004. Mettez à jour vers une version actuelle dès que vous le pouvez.

</dd><dt>Pourquoi avez-vous sorti une mise à jour de sécurité qui casse mon application&nbsp;?

</dt><dd>Croyez-nous, nous avons essayer de ne pas en arriver là. Six développeurs PostgreSQL ont travaillé quatre semaines pour arriver à une méthode qui corrige la vulnérabilité sans affecter les applications en production. C'est le maximum que nous avons pu faire -- la plupart des applications des utilisateurs ne sont pas touchées.

</dd><dt>Comment faire si mon application n'est pas exposé sur Internet et que je veux mettre à jour en désactivant les modifications de l'échappement&nbsp;?

</dt><dd>Configurez « backslash_quote = on » dans postgresql.conf. Et planifiez de sécuriser votre application à un moment plus approprié.

</dd></dl>

<h2>Guide utilisateurs</h2>

Non traduit... voir la <a href="http://www.postgresql.org/docs/techdocs.49">documentation en anglais</a>.

<h2>Information technique sur la faille de sécurité</h2>

Non traduit... voir la <a href="http://www.postgresql.org/docs/techdocs.50">documentation en anglais</a>.

<h2>Notes de sortie</h2>

Voir la <a href="http://docs.postgresqlfr.org/pgsql-8.1.4-fr/release.html">documentation en français</a>.

<h2>Téléchargements</h2>

<a href="http://www.postgresql.org/ftp/source/v8.1.4/">Sources</a> et <a href="http://www.postgresql.org/ftp/binary/">binaires</a>.