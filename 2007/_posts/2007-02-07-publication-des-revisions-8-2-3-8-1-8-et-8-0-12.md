---
layout: post
title: "Publication des révisions 8.2.3, 8.1.8 et 8.0.12"
author: "SAS"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/235"
---


<p>Le PostgreSQL Global Development Group a publié aujourd'hui la mise à jour de sécurité de toutes les versions 8.x&nbsp;: les révisions 8.2.3, 8.1.8, 8.0.12. Elles annulent et remplacent les mises à jour publiées le 5 février qui contenaient un bogue de transtypage affectant de nombreux utilisateurs.</p>

<p> Si vous avez téléchargé une copie des versions 8.2.2, 8.1.7 ou 8.0.11, vous pouvez l'abandonner et installer les dernières révisions.</p>

<!--more-->


<p>Cette révision corrige CVE-2007-0555 et CVE-2007-0556. Ces deux failles autorisent un utilisateur authentifié disposant des permissions d'exécuter du code SQL à lancer une attaque de type "déni de service" ou de lire des portions aléatoires de la mémoire. Puisqu'il est nécessaire d'être authentifié, ce risque n'est jugé que moyen. Plus d'informations sur Mitre&nbsp;:</p>

<ul><li><a href="http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0555">http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0555</a> </li>

<li><a href="http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0556">http://cve.mitre.org/cgi-bin/cvename.cgi?name=CVE-2007-0556</a></li>

</ul>

<p>Ces révisions peuvent être téléchargées depuis la page de téléchargement&nbsp;:

<a href="http://www.postgresql.org/download/" target="_blank">http://www.postgresql.org/download/</a>. Aucun besoin d'export/import pour cette mise à jour. Quoiqu'il en soit, n'hésitez pas à consulter les notes de version pour la vôtre&nbsp;:

<a href="http://www.postgresql.org/docs/8.2/static/release.html" target="_blank">http://www.postgresql.org/docs/8.2/static/release.html</a>.</p>