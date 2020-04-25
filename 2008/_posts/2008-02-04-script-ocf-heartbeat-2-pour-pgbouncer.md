---
layout: post
title: "Script OCF (heartbeat-2) pour pgbouncer"
author: "tigrou3tac"
categories: [Articles]
redirect_from: "index.php?post/drupal/222"
---


Ce script est une adaptation du script ocf Evmsd fourni par

heartbeat-2,

il y a une ou deux gruikerie (return 7 au lieu du code retour OCF)

mais il est fonctionnel (la bascule s'effectue bien en cas de standby,

défaillance serveur, coupure heartbeat, crash pgbouncer ...)

<!--more-->


version des softs :<br />- linux         debian etch

<br />- kernel        2.6.19-7-grsec

<br />- heartbeat-2   2.1.2-1~bpo40+2

<br />- pgbouncer     1.1.2-0rc1

<br />