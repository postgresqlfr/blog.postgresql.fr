---
layout: post
title: "Nouvelles du front côté développement de PostgreSQL : le meilleur est à venir!"
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-10 "
---



Dans un récent mail envoyé sur la liste des hackers de PostgreSQL,

Bruce MOMJIAN (co-responsable du projet...) fait un petit point sur les développements actuels de PostgreSQL et sur ce qui devrait être livré pour la toute prochaine version, la v.7.5:

(me suis permis de traduire approximativement le courriel, j'ai indicé la liste pour pouvoir commenter en rappel):

«

Here are features that are being worked on, hopefully for 7.5:

voici les fonctionnalités sur lesquelles nous travaillons actuellement et qui devraient être livrées pour la version 7.5 :

1) tablespaces (Gavin)

2) nested transactions (Alvaro)

3) two-phase commit (Heikki Linnakangas)

4) integrated pg_autovacuum (O'Connor)

5) PITR (Riggs)

6) Win32 (Claudio, Magnus)

Si nous avons la majorité de ces dévellopements livrés pour la 7.5, ce sera une grande version! »

1) les tablespaces, si vous connaissez un peu Oracle, c'est la même notion, il s'agirait de regrouper des schémas dans des entités logiques, appellés tablespaces. Cela permettrait par exemple de déplacer ces tablespaces d'une base à une autre

2) transactions imbriquées: imaginez deux transactions SQL imbriquées, celle qui est fille de la première peut être ROLLBACKée sans pour autant annuler la principale, qui elle peut être COMMITée, exemple:

BEGIN

...ordres SQL...

BEGIN

...ordres SQL...

ROLLBACK

...ordres SQL...

COMMIT

=&gt; le ROLLBACK au milieu n'annule que les ordres SQL entre le begin le plus proche et lui-même..

3) le two-phase commit: rentrer dans les détails serait un peu complexe. Ce qu'il faut retenir, c'est que c'est l'étape cruciale vers le cluster Oracle, c'est à dire, une solution de réplication temps réel, multi-maîtres, multi-esclaves... La réplication synchrone temps réel semble manquer cruellement pour certains projets où la réplication assynchrone maitre=&gt;esclaves n'est pas suffisante (cette solution existe déjà, le saviez-vous?)

4) pg_autovacuum : son intégration à PG est imminente. C'est à dire, que vous n'aurez plus à vous soucier des vacuum, PG le fera pour vous quand il jugera cela nécessaire... Bref, la principale cause de dysfonctionnements de PG ( =&gt; pour ceux qui "oublient" de faire des vacuums! ) sera ainsi balayée...

5) Point In Time Recovery : Pouvoir Restaurer à un Temps Donné dans le Passé (je traduis comme je peux...)

Cela vous permettra par exemple de placer votre base de données (ou uniquement votre session!) à un temps précis dans le passé:

Par exemple, votre collègue a bu un pastis de trop, il a fait un DROP TABLE malheureux à 11h30 et il est 12h40!!!... Au lieu de tout restaurer, vous pouvez placer votre session à 11h29, sauvegarder la table droppée par la suite, vous replacer à 12h40 et re-injecter la table...

Cette fonctionnalité n'est pas si vieille du côté des SGBDR commerciaux, cherchez bien... vous verez ;-)

6) WIN32 PORT: Portage de PostgreSQL dans un environnement Windows *NATIF* c'est à dire, fini l'utilisation de CygWin sous Windows... PG utilisera les DLL nativement de Windows, comme le ferait d'autres applications Windows...

Je pense que cela permettra des « annule et remplace » de SGBDR commerciaux sous Windows... Bref, cela permettra des « migrations douces » aux Logiciels Libres!

Petite précision (parceque j'ai eu un mail là dessus): Non, PG ne changera pas sa licence. Ça restera un logiciel libre, même sous Windows. Mêmes conditions d'utilisations sous Windows ou OS Libres. Tout pareil. D'autres projets libres ont la même politique: Mozilla par exemple (quoi? Vous êtes toujours sous Internet Explorer?????? Courrez FONCEZ télécharger Mozilla : <a href="http://www.mozilla.org/">Mozilla.org</a> ou, bien mieux, le meme en Français: <a href="http://frenchmozilla.sourceforge.net/">Le site FrenchMozilla sur Sourceforge</a>!