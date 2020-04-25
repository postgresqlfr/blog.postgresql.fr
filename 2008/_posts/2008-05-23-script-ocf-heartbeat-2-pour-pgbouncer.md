---
layout: post
title: "Script OCF (heartbeat-2) pour pgbouncer"
author: "tigrou3tac"
categories: [Articles]
redirect_from: "index.php?post/drupal/292"
---


<p>Voici en pièces jointes 2 fichiers permettant de configurer pgbouncer

sur un pool de serveurs afin de créer un cluster HA pour pgbouncer.</p>

<!--more-->


<p>Le fichier ocf-pgbouncer.txt est un script adapté du script ocf Evmsd fourni par heartbeat-2.

Il y a une ou deux gruikeries (return 7 au lieu du code retour OCF) mais il est fonctionnel

(la bascule s'effectue bien en cas de standby, défaillance serveur, coupure heartbeat, crash pgbouncer ...).</p>

<p>L'avant dernière ligne (ocf_log debug ...) peut être commenté, à la charge du sysadmin de décider.</p>

<p>Le fichier cib.xml permet la configuration de heartbeat2 afin de créer le cluster HA pour pgbouncer.

Il gère l'attribution de l'alias IP (sur lequel écoutera pgbouncer) et le démarrage de pgbouncer.</p>

<p>Version des logiciels utilisés :</p>

<ul><li>linux debian ecth </li>

<li>kernel 2.6.24-3-grsec </li>

<li>heartbeat-2 2.1.3-5~bpo40+1 </li>

<li>pgbouncer 1.1.2-0rc1

</li>

</ul>