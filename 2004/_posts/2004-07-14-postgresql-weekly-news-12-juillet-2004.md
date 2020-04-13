---
layout: post
title: "== PostgreSQL Weekly News - 12 Juillet 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-18 "
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 12 juillet 2004 ==</h3>

<p>Bien, les choses commencent à se préciser pour la fin de ce cycle de développement. Personne ne peut encore dire quand la nouvelle beta sortira mais il y a beaucoup de discussions en cours sur l'inclusion ou pas de fonctionnalités comme le «&nbsp;commit en deux phases&nbsp;» et le <acronym title="Point In Time Recovery">PITR</acronym>. Ainsi, nous ne devrions pas voir sortir une beta ce mois-ci. Ceux qui ont des connaissances sur ces fonctionnalités sont invités à lire et à participer à la discussion sur la liste <a href="http://archives.postgresql.org/pgsql-hackers">pgsql-hackers</a>.

</p>

<p>Pendant que les discussions vont bon train, le codage continue pour

les fonctionalités existantes qui seront livrées dans la prochaine

version. Il y a aussi plusieurs corrections pour OSX et les *BSD ainsi

que des corrections sur le nouveau code de plperl. La commande \d

affiche maintenant des informations complémentaires sur les espaces

logiques. La fonction has_tablespace_privilege() a été ajoutée. Elle

vérifie si un utilisateur peut accéder à un espace logique dans

diverses situations. La détection du fuseau horaire a aussi été

modifiée pour améliorer la précision de ses résultats sur des systèmes

configurés par défaut.</p>

<p>Un dernier changement vaut d'être mentionné, il s'agit d'un

correctif permettant à PostgreSQL d'avoir des fichiers de configuration

ailleurs que dans le répertoire PGDATA. Cela devrait aider les systèmes

souhaitant placer dans un même répertoire tous les fichiers de

configuration (<acronym title="Note Du Traducteur">NDT</acronym>&nbsp;: par exemple /etc pour Debian, ce qui évitera des liens symboliques pas très jolis...).</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Requêtes hiérarchiques version 0.5.3<br />

<a href="http://freshmeat.net/projects/hier_pg/?branch_id=35539&amp;release_id=166577">http://freshmeat.net/projects/hier_pg/?branch_id=35539&amp;release_id=166577</a></li>

</ul>

<h3>== PostgreSQL dans la presse ==</h3>

<ul>

<li>The Flick Files<br />

<a href="http://www.pcmag.com/article2/0,1759,1619638,00.asp">http://www.pcmag.com/article2/0,1759,1619638,00.asp

</a></li>

<li>Gentoo&nbsp;: Configuration de PostgreSQL (blog)<br />

<a href="http://www.tgharold.com/techblog/2004/07/gentoo-setting-up-postgresql.shtml">http://www.tgharold.com/techblog/2004/07/gentoo-setting-up-postgresql.shtml

</a></li>

</ul>

<h3>Prochains évènements</h3>

<ul>

<li>OSCon&nbsp;: du 26 au 30 Juillet à Portland, Oregon, États-Unis:<br />

Il y aura une session PostgreSQL avec plusieurs membres de la communauté qui vont participer.<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a>

</li>

<li>Linux World Expo&nbsp;: San Francisco, Californie, États-Unis: du 3 au 4 Août:<br />

PostgreSQL y aura un stand ainsi qu'une conférence avec OSDL.</li>

</ul>

<h3>Pour terminer</h3>

<p>N'oubliez pas de lire le Résumé Hebdomadaire de Elein Mustain sur la liste générale de PostgreSQL:<br />

<a href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>.</p>

<h3>Sur le Web</h3>

<p>

<a href="http://www.postgresql.org">http://www.postgresql.org</a><br />

<a href="http://advocacy.postgresql.org">http://advocacy.postgresql.org</a>

</p>