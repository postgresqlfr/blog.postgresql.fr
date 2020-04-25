---
layout: post
title: "Problèmes de récupération après crash"
author: "SAS"
categories: [Articles]
redirect_from: "index.php?post/drupal/174"
---


<p></p>

<!--more-->


<p>

Lu sur la liste de diffusion <strong>ANNOUNCE</strong>, un message de Tom Lane&nbsp;:

</p>

<p>

Des analyses récentes ont montré que le positionnement à <em>off</em> du paramètre <em>full_page_writes</em> est dangereux dans <strong>tous</strong> les cas, même avec des architectures telles que des caches disques protégés par des batteries qui interdiraient les écritures partielles de pages.

</p>

<p>

Il a été récemment rapporté deux cas de paramétrage <em>full_page_writes = off</em> ayant empêché le redémarrage de la base après un crash, alors même qu'aucun problème OS ou système n'a pu être mis en cause.

</p>

<p>

Le plan de développement prévoit de dévalider cette variable dans les versions 8.1.4 et les versions 8.1.* à venir. Le système agira alors comme si le paramètre était toujours positionné à <em>ON</em>. Le paramètre ne sera pas supprimé pour éviter les incompatibilités de fichiers <em>postgresql.conf</em>.

</p>

<p>

Par la suite, des études permettront de déterminer si le paramètre doit être revalidé dans la version 8.2, A l'heure actuelle, il apparaît délicat, voire imprudent de patcher les fichiers.

</p>

<p>

Quoiqu'il en soit, si vous utilisez les versions 8.1.0 - 8.1.3, il est impératif de vérifier que le paramètre <em>full_page_writes</em> est bien positionné à <em>ON</em>.

</p>

<p>

Pour les détails techinques, on pourra se référer au fil de discussion sur la liste technique&nbsp;:

<a href="http://archives.postgresql.org/pgsql-hackers/2006-03/msg01168.php">http://archives.postgresql.org/pgsql-hackers/2006-03/msg01168.php</a>

</p>