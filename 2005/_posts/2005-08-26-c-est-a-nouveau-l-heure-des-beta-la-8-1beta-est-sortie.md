---
layout: post
title: "C&#39;est à nouveau l&#39;heure des bêta... la 8.1beta est sortie"
author: "jca"
categories: [Dans les bacs]
redirect_from: "index.php?post/drupal/104"
---


<p></p>

<!--more-->


<p><em>Dans son article du 26 Aout 2005, Marc G. Fournier nous annonçait sur pg-announce</em></p>

<p>Depuis le premier juillet, après 6 mois de développement suite à la sortie de la 8.0, le développement de la 8.1 a été gelé (au niveau fonctionnel). </p>

<p>Maintenant, aprés quelques semaines de traitement des patches applicables à la 8.1, nous rentrons maintenant en période de test béta où nous aurons besoin de toute l'aide de la communauté dans son ensemble.</p>

<p>

PostgreSQL 8.1 apportera un gran nombre de fonctionnalités essentielles incluant :

</p>

<ul>

<li> L'amélioration de l'accès concurrent au tampon cache de mémoire partagée,</li>

<li> L'ajout de bitmaps au sein de la mémoire ce qui permet de fusionner plusieurs index au sein d'une même requête</li>

<li> Ajout du <em>Two-Phase commit</em></li>

<li> Création d'un nouveau système de rôle remplaçant les utilisateurs et les groupes</li>

<li> Déplacement de /contrib/pgautovacuum dans le serveur principal</li>

<li> Ajout de verrous partagés au niveau des lignes en utilisant SELECT ... FOR SHARE</li>

<li> Un grand nombre d'autres fonctionnalités listées dans le fichier HISTORY</li>

</ul>

Comme pour toutes les versions majeures, nous avons besoin que les nouveaux points ci-dessus soient intensivement (et extensivement) testés dans le plus de scénarios possibles et nous encourageons donc le test et le rapport des bugs éventuellement trouvés.

<p>La version Beta1 de PostgreSQL 8.1 est disponible sur :<br />

<a target="_blank" href="http://www.postgresql.org/ftp/source/v8.1beta">http://www.postgresql.org/ftp/source/v8.1beta</a>

</p>

<p>

Prière de reporter tout bug sur cette bêta à :<br />

<a href="mailto:pgsql%20-%20bugs%20at%20postgresql%20dot%20org">pgsql - bugs at postgresql dot org</a>

<br />

ou par le biais de l'outil de report de bug disponible sur <br />

<a target="_blank" href="http://www.postgresql.org/support/submitbug">http://www.postgresql.org/support/submitbug</a></p>