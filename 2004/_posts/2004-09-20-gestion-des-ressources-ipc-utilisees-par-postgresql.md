---
layout: post
title: "Gestion des ressources IPC utilisées par PostgreSQL"
author: "jca"
redirect_from: "index.php?post/drupal-31 "
---


<p></p>

<!--more-->


<p>Dans certaines circonstances, PostgreSQL peut laisser des ressources «&nbsp;permanentes&nbsp;» occupées sur le serveur aprés un violent problème (ou un redémarrage). Ces ressources sont des IPC (Inter Process Communication) et peuvent se manifester sous deux formes&nbsp;:</p>

<ul>

<li>de la mémoire partagée (shm), utilisée essentiellement par PostgreSQL en fonction de la variable d'environnement shared_buffers</li>

<li>des sémaphores</li>

</ul>

<p>Pour récupérer une liste des ressources, lancer la commande «&nbsp;ipcs&nbsp;» en tant qu'utilisateur root ou postgres. Cette commande liste l'ensemble des ressources IPC utilisées sur la machine. Vous obtiendrez une liste similaire à celle-ci&nbsp;:

</p>

<pre>[root@serveur root]# ipcs<br /><br />------ Segments de mémoire partagée --------<br />touche     shmid      propriétaire perms      octets     nattch     statut<br />0x0052e2c1 0          postgres  600        288038912  10<br /><br />------ Tables de sémaphores --------<br />touche     semid      propriétaire perms      nsems      statut<br />0x0052e2c1 0          postgres  600        17<br />0x0052e2c2 32769      postgres  600        17<br />0x0052e2c3 65538      postgres  600        17<br /><br />------ Files d'attente de messages --------<br />touche     msqid      propriétaire perms      octets utilisés messages<br /></pre>

<p>Si PostgreSQL n'est pas lancé et que des ressources demeurent allouées vous pouvez les libérer avec la commande «&nbsp;ipcrm&nbsp;» en tant que root ou postgresql.</p>

<ul>

<li>Pour les sémaphores&nbsp;: «&nbsp;ipcrm sem &lt;semid&gt;&nbsp;»</li>

<li> Pour la mémoire partagée&nbsp;: «&nbsp;ipcrm shm &lt;shmid&gt;&nbsp;»</li>

</ul>

<p><strong>Attention&nbsp;!</strong> Assurez-vous de bien vérifier qu'aucun processus postgres ne soit lancé (postmaster notamment).</p>