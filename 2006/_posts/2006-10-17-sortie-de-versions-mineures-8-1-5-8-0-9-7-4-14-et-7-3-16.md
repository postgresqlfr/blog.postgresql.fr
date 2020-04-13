---
layout: post
title: "Sortie de versions mineures (8.1.5, 8.0.9, 7.4.14 et 7.3.16)"
author: "gleu"
redirect_from: "index.php?post/drupal-394 "
---


<p></p>

<!--more-->


Le projet PostgreSQL a sorti aujourd'hui les versions mineures suivantes. Elles corrigent trois vulnérabilités différentes impliquant un arrêt brutal du serveur. Il y a aussi diverses autres corrections mineures. Il est demandé à tous les utilisateurs de PostgreSQL de mettre à jour à la dernière version dès que possible.

Les versions sorties sont : 8.1.5, 8.0.9, 7.4.14, 7.3.16. Seuls les binaires sont mis à jour. Notez que les utilisateurs de versions 7.4.0, 7.4.1, 8.0.0 et 8.0.1 pourraient avoir à effectuer quelques étapes supplémentaires pour la mise à jour. Voir les notes de sortie pour les détails.

<a href="http://docs.postgresqlfr.org/pgsql-8.1.5-fr/release.html">Notes de sortie</a>

<a href="http://www.postgresql.org/download">Téléchargement</a>

Les trois risques d'arrêt brutal ne sont pas considérés comme des vulnérabilités critiques car les trois requièrent un accès authentifié à la base de données avec la possibilité d'exécuter des requêtes ad-hoc et aucune ne peut être exploitée pour obtenir des droits supplémentaires. De ce fait, nous n'avons <strong>PAS</strong> saisi un CVE pour ces bogues.

Les sources de ces versions sont actuellement disponibles, ainsi que les binaires pour Windows et quelques distributions de Linux. Les binaires pour Solaris, d'autres distributions de Linux et OS X devraient bientôt être disponibles auprès des distributeurs respectifs.

PS : les manuels en français sont disponibles pour les trois versions (<a href="http://docs.postgresqlfr.org/pgsql-8.1.5-fr/">8.1.5</a>, <a href="http://docs.postgresqlfr.org/pgsql-8.0.9-fr/">8.0.9</a>, <a href="http://docs.postgresqlfr.org/pgsql-7.4.14-fr/">7.4.14</a>).