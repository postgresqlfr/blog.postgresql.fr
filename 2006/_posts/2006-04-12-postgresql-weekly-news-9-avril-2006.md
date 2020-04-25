---
layout: post
title: "== PostgreSQL Weekly News - 9 avril 2006 =="
author: "Jean-Paul Argudo"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/177"
---


<p>

<strong>

<ins>ATTENTION:</ins> ne positionnez pas à OFF le paramètre full_page_writes dans

une version 8.1.x de PostgreSQL&nbsp;!</strong></p>

<p>

Une récente analyse a montré que positionner à OFF le paramètre full_pages_writes n'est sûr en <strong>aucune</strong> circonstance, même si vous possédez une architecture matérielle solide avec un cache disque sauvegardé par des batteries qui pourrait éviter l'écriture de pages partielles. Nous avons lu deux récents rapports de bugs pour lesquels full_page_writes = off a causé des problèmes au redémarrage d'une base après son crash, bien que aucun problème de niveau OS ou matériel ne soit arrivé. Ainsi, si vous utilisez une version comprise entre la 8.1.0 et la 8.1.3, vous devez vous assurer que le paramètre full_page_writes est positionné sur ON.

</p>

<p>

<a href="http://archives.postgresql.org/pgsql-hackers/2006-03/msg01168.php">http://archives.postgresql.org/pgsql-hackers/2006-03/msg01168.php</a>

</p>

<p>

Nous avons besoin d'étudiants et de mentors qui voudraient travailler

sur des projets PostgreSQL pour le prochain «&nbsp;Summer Of Code&nbsp;» de

Google. Le projet gagnant de l'été dernier était <a href="http://pgfoundry.org/projects/qbe/">Query By Example</a>.

Si vous êtes professeur ou un étudiant et êtes intéressé par un projet

orienté base de données, et si vous avez de plus déjà votre propre

projet orienté PostgreSQL, merci de contacter Josh Berkus

(josh@postgresql.org) dès que possible.

</p>

<p>Qingqing Zhou a présenté ses plans pour ajouter les scans

séquentiels parallèles lors de l'exécution de requêtes. En divisant le

processus de scan séquentiel en deux processus, un lecteur et un

processeur, il pense obtenir des gains de performances majeurs pour les

requêtes qui nécessitent des scans séquentiels.

</p>

<p>

Teodor Sigaev et Oleg Bartunov ont présenté un patch pour ajouter une Généralisation des Index Inversés (<em>Generalized Inverted Indexes (GIN)</em>).

Il s'agit d'une espèce spécialisée d'index qui permet la recherche

multi-valeurs d'un champs, comme les champs tableaux et les champs

TSearch. GIN est le premier élément de la prochaine version de TSearch,

le système de recherche plein texte. (<small><ins>NDT:</ins> cf contrib/tsearch2</small>).

</p>

<p>

Plusieurs développeurs ont discuté des façons de rendre le fichier

pg_hba.conf modifiable depuis SQL, et même de la possibilité de le

stocker dans une table.

</p>

<p>

Nous avons eu une fausse alerte sur les tests de non-régression réalisés sur la ferme de compilation de PostgreSQL (<em>pgBuildFarm</em>)

la semaine dernière. Il s'agissait d'un test qui n'était pas prévu pour

supporter les changements d'heures d'été/d'hiver. Ce test a été

corrigé.

</p>

<p>Peter Brant a présenté une analyse du pourquoi le collecteur de

statistiques de PostgreSQL sous Windows est propice au crash. Les

développeurs de PostgreSQL sous Windows en ont discuté longuement,

cependant ils n'ont trouvé encore aucune solution.

</p>

<p>Tom Lane a codé un patch qui permet de corriger un vieux bug sur

l'implémentation des domaines dans PostgreSQL. On peut à présent avoir

des sous-domaines (et des sous-sous domaines, etc.).

</p>

<p>

EntrepriseDB a embauché deux personalités du projet, Bruce Momjian et Simon Riggs. Bonne chance à eux.

<a href="http://www.enterprisedb.com/news_events/press_releases/04_04_06.do">http://www.enterprisedb.com/news_events/press_releases/04_04_06.do</a>

</p>

<p>

L'inscription pour le «&nbsp;PostgreSQL Anniversary&nbsp;» est ouverte:

<a href="http://conference.postgresql.org/Registration">http://conference.postgresql.org/Registration</a>

<br />

L'évènement «&nbsp;PostgreSQL Anniversary&nbsp;» vous est présenté par Afilias, EnterpriseDB, GreenPlum, Pervasive et Sun Microsystems.

</p>

<!--more-->


<h3>== Nouveaux produits autour de PostgreSQL ==</h3>

<p>

dbVisualizer 5.0 est sorti:

<a href="http://www.minq.se/">http://www.minq.se/</a>

</p>

<p>

EMS SQLManager 3.5 est sorti:

<a href="http://www.sqlmanager.net/products/postgresql/manager/">http://www.sqlmanager.net/products/postgresql/manager/</a>

</p>

<p>

pgEdit 1.2 est sorti:

<a href="http://pgedit.com/">http://pgedit.com/</a>

</p>

<p>

La version 1.48 de DBD::Pg est sortie, elle corrige certains bugs:

<a href="http://search.cpan.org/%7Edbdpg/DBD-Pg-1.48/">http://search.cpan.org/~dbdpg/DBD-Pg-1.48/</a>

</p>

<p>

Bizgres 0.9 est sorti:

<a href="http://www.bizgres.org/">http://www.bizgres.org/</a>

</p>

<p>

MicroOLAP Database Designer 1.0.6 pour PostgreSQL est sorti:

<a href="http://microolap.com/products/database/postgresql-designer/">http://microolap.com/products/database/postgresql-designer/</a>

</p>

<h3>== Évènements locaux autour de PostgreSQL ==</h3>

<p>

David Fetter donnera une conférence au FISL de Porto Alegre au Brésil, du 19 au 22 avril.

<a href="http://fisl.softwarelivre.org/7.0/www/?q=en">http://fisl.softwarelivre.org/7.0/www/?q=en</a>

</p>

<h3>== PostgreSQL dans les News ==</h3>

<p>

Planet PostgreSQL:

<a href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</p>

<p>

General Bits, publié les Lundi (PST/PDT):

<a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</p>

<p>

PostgreSQL Weekly News vous a été présenté cette semaine par David Fetter et Josh Berkus. <small>Traduit de l'anglais par Jean-Paul Argudo.</small>

</p>