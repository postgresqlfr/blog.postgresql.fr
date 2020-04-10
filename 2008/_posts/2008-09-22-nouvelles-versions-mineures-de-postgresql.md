---
layout: post
title: "Nouvelles versions mineures de PostgreSQL"
author: "gleu"
redirect_from: "index.php?post/drupal-401 "
---



<p>De nouvelles versions mineures sont apparues aujourd'hui pour toutes les versions actuellement maintenues : 8.3.4, 8.2.10, 8.1.14, 8.0.18 et 7.4.22. Ces versions corrigent plus de trentes bogues mineurs découverts pendant ces trois derniers mois. Des bogues pouvant résulter en des pertes de données sont corrigés. Nous conseillons aux administrateurs de bases de données en production de mettre à jour dès que possible.</p>

<p>De plus, ces versions mineures contiennent des mises à jour pour les fuseaux horaires suivants&nbsp;: Argentine, Bahamas, Brésil, Maurice, Maroc, Pakistan, Palestine et Paraguay. Les utilisateurs de ces fuseaux horaires doivent planifier une mise à jour aussi rapidement que possible pour éviter de faux calculs des changements d'horaire.</p>

<p>Les problèmes corrigés incluent des arrêts non volontaires de l'autovacuum rapportés par plusieurs utilisateurs, deux bogues dans la gestion de HOT, une condition échouée pour une clé étrangère, un espace d'adressage des verrous trop faible, plusieurs erreurs du planificateur et de nombreux cas particuliers. Voir les notes de sortie (en anglais pour l'instant) pour plus

de détails.</p>

<p>Avec les autres versions mineures, les utilisateurs ne sont pas sensés sauvegarder et recharger leurs bases de données pour appliquer cette mise à jour. Vous pouvez simplement arrêter PostgreSQL et mettre à jour les binaires. Les utilisateurs oubliant plus d'une mise à jour devraient vérifier les notes de version pour des informations supplémentaires. Enfin, comme indiqué précédemment, seules les versions 8.2.10 et 8.3.4 des binaires Windows sont disponibles, les versions plus anciennes n'étant plus supportées.</p>