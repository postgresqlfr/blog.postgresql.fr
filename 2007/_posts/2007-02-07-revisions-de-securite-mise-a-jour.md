---
layout: post
title: "Révisions de sécurité (Mise à jour)"
author: "SAS"
redirect_from: "index.php?post/drupal-127 "
---



<p>Cette révision corrige CVE-2007-0555 et CVE-2007-0556. Ces deux failles autorisent un utilisateur authentifié disposant des permissions d'exécuter du code SQL à lancer une attaque de type "déni de service" ou de lire des portions aléatoires de la mémoire. Puisqu'il est nécessaire d'être authentifié, ce risque n'est jugé que moyen. Plus d'informations sur Mitre&nbsp;:

<br /><a href="http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0555">http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0555</a><br /><a href="http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0556">http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0556</a>

</p>

<p>Conformément à la politique de correction des failles de sécurité du projet, cette mise à jour a été réalisée aussi vite que possible&nbsp;: moins de deux semaines après le premier rapport de bogue, et cinq jours après la publication du correctif. Ces réponses rapides sont inhérentes à la réputation de PostgreSQL d'être une des bases industrielles les plus sûres.</p>

<p>Ces révisions peuvent être téléchargées depuis notre page de téléchargement&nbsp;:

<a href="http://www.postgresql.org/download/" target="_blank">http://www.postgresql.org/download/</a>. Aucun besoin d'export/import pour cette mise à jour. Quoiqu'il en soit, n'hésitez pas à consulter les notes de version pour la vôtre&nbsp;:

<a href="http://www.postgresql.org/docs/8.2/static/release.html" target="_blank">http://www.postgresql.org/docs/8.2/static/release.html</a>.</p>