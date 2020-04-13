---
layout: post
title: "PostgreSQL Weekly News - 20 Juillet 2004"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-20 "
---


<h3>== Nouvelles hebdomadaires de PostgreSQL - 20 juillet 2004 ==</h3>

<p>Les développeurs ont continué cette semaine à finaliser les nouvelles

fonctionalités afin de parvenir à une beta 1 plannifiée pour

le 1er août. La plupart des correctifs reçus par la communauté ont été

intégrés et des parties de code concernant <acronym title="Point In Time Recovery">PITR</acronym>

et les transactions imbriquées (<em>nested transactions</em>) ont été ajoutées

dans le CVS. Ainsi, cela ne devrait plus être très long à présent.</p>

<p>Parmi les fonctionalités en cours de finalisation se trouvent des ajouts à

psql, comme par exemple l'ajout de droits et de description pour les

schémas et les espaces logiques. initdb a aussi été amélioré pour détecter

les incohérences entre les locales et l'encodage. Lorsqu'une telle incohérence arrive,

il peut ainsi sélectionner l'encodage adéquat quand aucun ne lui est spécifié.

Dans la liste, un correctif permettant à l'implémentation de plperl d'être

compilé sous win32, a été intégré. Il corrige notament les soucis sur les

slashs/antislashs et met à jour la configuration de l'éditeur de liens pour mingw.

</p>

<p>Christopher Kings-Lyne a énormément travaillé sur pg_dump cette dernière

semaine, essayant de supprimer tous les soucis pouvant être rencontrés en

sauvegardant les bases avec de vieilles versions de PostgreSQL. La liste des éléments

corrigés est fort longue mais on peut citer que pg_dump utilise à présent ALTER

OWNER à la place de SET SESSION AUTHORIZATION, en déplaçant ainsi toutes les

commandes GRANT et REVOKE à la fin du dump, sauvegardant les commandes ALTER USER

depuis le propriétaire du cluster (<acronym title="Note Du Traducteur">NDT</acronym>&nbsp;:

le cluster au sens de PostgreSQL correspond à l'organisation des fichiers présents dans $PGDATA,

par exemple, tout ce qui est dans /var/lib/pgsql sous Debian GNU/Linux...). pg_dump prend

aussi en compte les ALTER OWNER pour le schéma public lorsque c'est nécessaire. Des commentaires

inadéquats ont été enlevés. Christopher projette de faire des tests de

non-régression sur toutes les versions 7 de PostgreSQL. Si vous avez encore un

schéma de données complexes vivant dans une de ces vieilles versions, nous vous

encourageons à tester ce nouveau pg_dump dès que possible pour vous assurer de

sa compatibilité.</p>

<p>Deux notes rapides sur le site web de PostgreSQL. Nous avons ajouté la

traduction Française de la FAQ, grâce à Guillaume Lelarge, disponible sur

<a href="http://www.postgresql.org/docs/#faqs">http://www.postgresql.org/docs/#faqs</a>

(NDT&nbsp;: nice shot Guillaume&nbsp;! Merci encore à toi&nbsp;! (Note de

Guillaume Lelarge&nbsp;: merci surtout aux trois traducteurs de ce document, à savoir

Laurent Martelli, Vincent Veyron et Emmanuel Seyman). Nous avons aussi ajouté un lien

sur le nouveau site communautaire polonais sur PostgreSQL (<a href="http://www.postgresql.org.pl/">http://www.postgresql.org.pl/</a>) qui est

disponible sur la page principale dans la section «&nbsp;international&nbsp;».</p>

<!--more-->


<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Sortie de pgSphere 1.0b1<br />

<a href="http://gborg.postgresql.org/project/pgsphere/news/newsfull.php?news_id=184">http://gborg.postgresql.org/project/pgsphere/news/newsfull.php?news_id=184</a>

</li>

<p>Sortie de BiggerSQL-1.2.5<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-07/msg00597.php">

http://archives.postgresql.org/pgsql-general/2004-07/msg00597.php</a>

</p>

<li>Sortie de Bricolage 1.8.1<br />

<a href="http://archives.postgresql.org/pgsql-general/2004-07/msg00316.php">

http://archives.postgresql.org/pgsql-general/2004-07/msg00316.php</a>

</li>

</ul>

<h3>PostgreSQL dans la presse</h3>

<ul>

<li>The downlow on Mono<br />

<a href="http://os.newsforge.com/os/04/07/13/1620239.shtml?tid=2&amp;tid=51&amp;tid=52&amp;tid=140">

http://os.newsforge.com/os/04/07/13/1620239.shtml?tid=2&amp;tid=51&amp;tid=52&amp;tid=140</a>

</li>

</ul>

<h3>Evènements à venir</h3>

<ul>

<li>OSCon&nbsp;: Portland, OR, USA: du 26 au 30 Juillet<br />

Il y aura une session dédiée à PostgreSQL, avec plusieurs membres de la

communauté qui vont y participer<br />

<a href="http://conferences.oreillynet.com/os2004/">http://conferences.oreillynet.com/os2004/</a>

</li>

<li>Linux World Expo&nbsp;: San Francisco, CA, USA: du 3 au 5 Aout<br />

PostgreSQL y aura un stand et une session avec OSDL<br />

<a href="http://www.linuxworldexpo.com/live/12/events/12SFO04A">http://www.linuxworldexpo.com/live/12/events/12SFO04A</a>

</li>

<li>Linux Expo Shanghai&nbsp;: Shanghai, Chine&nbsp;: du 9 au 10 septembre<br />

Bruce Momjian y fera un speech<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhanghai.com/en/index.html</a>

</li>

</ul>

<h3>Sur le Web</h3>

<p>

<a href="http://www.postgresql.org">

http://www.postgresql.org</a><br />

<a href="http://advocacy.postgresql.org">

http://advocacy.postgresql.org</a><br />

N'oubliez pas de lire les pages d'Elein Mustain! Sur:

<a href="http://www.varlena.com/GeneralBits/">

http://www.varlena.com/GeneralBits/</a>

</p>