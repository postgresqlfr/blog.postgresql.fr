---
layout: post
title: "Points à vérifier en ce qui concerne les performances de PostgreSQL 8.0"
author: "gleu"
categories: [Articles]
redirect_from: "index.php?post/drupal/105"
---


<p></p>

<!--more-->


<p><em>Cet article est la traduction d'un billet posté par Josh Berkus et Joe Conway sur leur site, <a href="http://powerpostgresql.com">powerpostgresql.com</a>. D'autres documents devraient suivre...</em></p>

<p>Voici un ensemble de règles de base pour votre serveur PostgreSQL

8.0. Beaucoup de ces règles sont basées sur des anecdoctes ou des

tests pratiques&nbsp;; il y a encore beaucoup de travail à effectuer en

ce qui concerne les performances des bases de données et nous essayons de

les mettre en place avec OSDL. Néanmoins, ceci devrait vous permettre de

commencer. Toutes les informations ci-dessous sont utiles. Ce document,

du 12 janvier 2005, sera vraisemblablement mis à jour plus tard. Les

indications sur les paramètrages ci-dessous sont préférées aux

indications que j'ai pû donner sur General Bits.</p>

<!--break-->

<h2>Cinq principes sur le matériel de votre serveur PostgreSQL</h2>

<ol>

<li><span class="c1">Disques &gt; RAM &gt; CPU</span><br />

Si vous devez dépenser de l'argent dans un serveur PostgreSQL,

dépensez-le sur des baies de disques à haute performance et

obtenez des processeurs moyens et une quantité de mémoire adéquate.

PostgreSQL, comme les autres RDBMS compatibles ACID, est très

demandeur au niveau entrées/sorties. Il est rare que son

utilisation du CPU soit plus importante que celle de la carte SCSI

(bien que cela soit possible). Ceci s'applique aux petits serveurs

mais cela s'applique aussi aux huit voix avec NetApps&nbsp;; obtenez

un CPU à bas prix si cela vous permet d'acheter la toute

dernière carte RAID et un grand nombre de disques.</li>

<li><span class="c1">Plus de têtes de lecture == Mieux<br /></span>

Avec de nombreux disques, PostgreSQL et la plupart des systèmes

d'exploitation parallèliseront les demandes de lecture et d'écriture

sur la base de données. Ceci fera une énorme différence sur les

systèmes de traitement des transactions et sera une amélioration

significative pour toute application où la base de données ne tient

pas entièrement en mémoire. Étant donné les tailles minimales des

disques de nos jours (72&nbsp;Go), vous pourriez être tenté de

n'utiliser qu'un seul disque ou une seule paire en RAID 1&nbsp;;

néanmoins, vous trouverez que l'utilisation de 4, 6, voire même 14

disques amèneront un surplus de puissance. Évidemment, le SCSI est

toujours significativement meilleur que l'IDE, même avec SATA.</li>

<li><span class="c1">Séparez les journaux des transactions de la base de

données<br /></span> En supposant que vous avez déjà placé de

l'argent sur une baie de dimension raisonnable, il existe quelques

autres options intelligentes plutôt que de tout placer dans un RAID

simple. En particulier, placer les journaux de la base de données

(pg_xlog) sur sa propre ressource disque dédiée (une baie ou un

disque) peut fournir un gain jusqu'à 12&nbsp;% sur des bases de

données comprenant une grosse activité en écriture. Ceci est tout

particulièrement vitale sur les petits systèmes avec des disques

SCSI ou IDE lents. Ceci fonctionne aussi dans le cas d'un serveur

comprenant deux disques&nbsp;; vous pouvez placer les journaux dans

le disque du système d'exploitation et obtenir ainsi un gain simple.</li>

<li><span class="c1">RAID 1+0/0+1 &gt; RAID 5</span><br />

Le RAID 5 avec trois disques est devenu un standard malheureux parmi

les serveurs économiques des gros vendeurs. Ceci est la configuration

de baie la plus lente qu'il soit pour PostgreSQL&nbsp;; vous pouvez

espérer un petit 50&nbsp;% par rapport à ce que vous pourriez obtenir

avec un simple disque SCSI. À la place, concentrez-vous sur du RAID

1 ou 1+0 ou 0+1 avec un ensemble de 2, 4 ou 6 disques. Avec plus de six

disques, RAID 5 commence à se comporter de façon acceptable au niveau

des performances et la comparaison se fera plus au niveau de la

qualité de votre contrôleur individuel. Peut-être plus important, une

carte RAID bon marché peut être un risque&nbsp;; il est quelque

fois préférable d'utiliser du RAID logiciel plutôt que la carte Adaptec

intégrée fournie avec votre serveur.</li>

<li><span class="c1">Les applications doivent bien se comporter

mutuellement</span><br />

L'autre grosse erreur que j'ai vu dans bon nombre de société est de

placer PostgreSQL avec plusieurs autres applications sur un seul

serveur, où tout le monde finit par se battre pour les mêmes

ressources. Encore pire, placer PostgreSQL et d'autres RDBMS sur la

même machine&nbsp;; les systèmes de bases de données vont se battre

pour obtenir la bande passante du disque et le cache disque du

système d'exploitation, et ils en pâtiront tous. Les serveurs de

documents et les programmes créant des traces de sécurité sont

pratiquement aussi mauvais. PostgreSQL peut gérer une machine avec

des applications qui ont des besoins principalement au niveau CPU

et RAM, comme Apache, en supposant qu'il y ait suffisamment de RAM.</li>

</ol>

<h2>Douze paramètrages que vous voudrez ajuster dans votre fichier

PostgreSQL.Conf</h2>

<p>Il existe vraiment un nombre effrayant de nouvelles options dans le

fichier PostgreSQL.conf. Même les options familières des cinq dernières

versions ont vu leurs noms ou le format de leur paramètres changés.

Le but est de vous donner plus de contrôle (vous, les administrateurs des

bases de données). Mais cela vous peut vous demander du temps.</p>

<p>Ce qui suit sont les paramètrages que la plupart des administrateurs

de bases de données voudront modifier, avec une attention portée plus

fortement vers la performance. Il existe quelques paramètres

spécialisés que la plupart des utilisateurs ne toucheront pas mais que ceux

qui les utilisent trouveront indispensables. Pour ceux-là, il leur faudra

attendre le livre.</p>

<p><span class="c2">Rappelez-vous&nbsp;: les paramètres de PostgreSQL.conf

ne doivent pas être commentés pour être pris en compte, et les mettre de

nouveau en commentaire ne restaure pas forcément leur valeur par

défaut&nbsp;!</span></p>

<h3>Connexions</h3>

<p><span class="c1">listen_addresses&nbsp;:</span> Remplace à la fois

les paramètres tcp_ip et virtual_hosts de la version 7.4. Vaut, par défaut,

localhost dans la plupart des installations, autorisant uniquement les

connexions sur la console. La plupart des administrateurs de bases de

données voudront le configurer à «&nbsp;*&nbsp;», signifiant toutes les interfaces

disponibles, une fois que les bons droits ont été configurés dans le

fichier pg_hba.conf, pour que PostgreSQL soit accessible du réseau.

Comme amélioration par rapport aux versions précédentes, la valeur

«&nbsp;localhost&nbsp;» par défaut permet les connexions sur l'interface

«&nbsp;loopback&nbsp;», 127.0.0.1, activant les nombreux outils basés sur

les navigateurs.</p>

<p><span class="c1">max_connections&nbsp;:</span> Exactement comme dans

les versions précédentes, cette variable a besoin d'être configurée pour

atteindre le nombre réel de connexions dont vous pensez avoir besoin.

Une valeur haute va requérir plus de mémoire partagée (shared_buffers).

Comme la surcharge pour chaque connexion, à la fois du côté de PostgreSQL

et de celui du système hôte, il est important d'utiliser une queue de

connexion si vous avez besoin d'un grand nombre d'utilisateurs. Par

exemple, 150 connexions actives sur un seul processeur 32 bit de qualité

moyenne sur un serveur Linux consommera des ressources significatives.

600 est la limite sur ce matériel. Bien sûr, un matériel plus costaud

permettra un plus grand nombre de connexions.</p>

<h3>Mémoire</h3>

<p><span class="c1">shared_buffers&nbsp;:</span> Rappel&nbsp;:

cette variable n'est PAS la mémoire totale qu'utilise PostgreSQL.

C'est le bloc de mémoire dédié que PostgreSQL utilise pour ses

opérations actives et devrait correspondre à une quantité mineure de

la mémoire totale sur votre machine car PostgreSQL utilise aussi le cache

disque du système d'exploitation. Malheureusement, le nombre exact de

tampons partagés requis est un calcul complexe entre la RAM totale, la

taille de la base de données, le nombre de connexions et la complexité

des requêtes. Donc, il est préférable d'utiliser quelques règles de base

dans l'allocation et de surveiller le serveur (particulièrement via les

vues pg_statio) pour déterminer les ajustements nécessaires.<br />

Sur des serveurs dédiés, les valeurs possibles semblent se situer entre

8&nbsp;Mo et 400&nbsp;Mo (entre 1&nbsp;000 et 50&nbsp;000 pages de

8&nbsp;Ko). Les facteurs qui élèvent les tampons partagés désirés sont

des portions actives plus importantes, des grosses requêtes complexes,

de nombreuses requêtes simultanées, des procédures ou des transactions

s'exécutant sur une grosse période, plus de RAM disponible et des

processeurs plus nombreux ou plus rapides. Et, bien sûr, d'autres

applications sur la machine. Contrairement à certaines attentes, allouer

bien trop de shared_buffers peut réellement baisser les performances, le

temps normalement requis pour le parcours. Voici quelques exemples basés

sur des anecdotes et sur des tests TPC sur machines Linux&nbsp;:</p>

<ul>

<li>Portable, processeur Celeron, 384&nbsp;Mo de RAM, base de données

de 25&nbsp;Mo&nbsp;: 12&nbsp;Mo/1500</li>

<li>Serveur Athlon, 1&nbsp;Go de RAM, base de données décisionnelle

10&nbsp;Go&nbsp;: 120&nbsp;Mo/15000</li>

<li>Serveur Quadri PIII, 4&nbsp;Go de RAM, 40&nbsp;Go, base de données

de traitements de grosses transactions (150 connexions)&nbsp;:

240&nbsp;Mo/30000</li>

<li>Serveur Quadri Xeon, 8&nbsp;Go de RAM, 200&nbsp;Go, base de données

de traitement de grosses transactions (300 connexions)&nbsp;:

400MB/50000</li>

</ul>

Merci de noter qu'augmenter shared_buffers, et quelques autres

paramètres mémoire, vous demandera de modifier les paramètres mémoire

System V du système d'exploitation. Voir la documentation de PostgreSQL

pour des instructions sur ceci.

<p><span class="c1">work_mem&nbsp;:</span> Auparavant appelé

sort_mem, mais renommé depuis car il couvre aussi les tris, les

agrégats et quelques autres opérations. C'est une mémoire non

partagée qui est allouée par opération (une à plusieurs fois par

requête)&nbsp;; ce paramètre est situé ici pour placer une limite

sur la mémoire RAM que chaque opération peut allouer avant d'être forcé

à écrire sur disque. Il devrait être configuré suivant un calcul basé

en divisant la RAM disponible (après les applications et shared_buffers)

par le nombre de requêtes maximum attendu, multiplié par le nombre

moyen d'opérations par requête utilisant de la mémoire.<br />

Une certaine attention doit aussi être portée sur la valeur de

work_mem nécessaire à chaque requête&nbsp;; traiter de grands ensembles

de données en requiert plus. Les applications web utilisant des bases

de données configurent généralement une valeur assez basse car le nombre

de connexions est assez grand et les requêtes sont simples&nbsp;;

de 512&nbsp;Ko à 2048&nbsp;Ko suffit généralement. Au contraire, les

applications de support de décision avec leur requêtes de 160 lignes et

les agrégats de plus de 10&nbsp;millions de lignes demandent souvent

beaucoup plus, pratiquement 500&nbsp;Mo sur un serveur disposant de

beaucoup de mémoire. Pour des bases de données à utilisation mixe, ce

paramètre peut être configuré par connexion, au moment du lancement

de la requête, pour donner plus de RAM à certaines requêtes spécifiques.

</p>

<p><span class="c1">maintenance_work_mem&nbsp;:</span> Appelée auparavant

vacuum_mem, ceci est la quantité de RAM que PostgreSQL utilise pour

VACUUM, ANALYZE, CREATE INDEX et l'ajout de clés étrangères. Vous devez

l'augmenter suivant la taille des tables de votre base de données et la

quantité de mémoire que vous pouvez donner pour rendre les opérations

aussi rapides que possibles. Un paramètrage de 50&nbsp;% à 75&nbsp;% de

la taille (sur disque) de votre plus grosse table ou index est une bonne

règle, ou entre 32 et 256&nbsp;Mo lorsqu'il n'est pas possible de le

déterminer.</p>

<h3>Disque et WAL</h3>

<p><span class="c1">checkpoint_segments&nbsp;:</span> Définit la taille

cache sur disque du journal des transactions pour les opérations

d'écriture. Vous pouvez ignorer ceci dans les applications web utilisant

des bases de données car elles sont principalement utilisées pour de la

lecture. Mais, dans le cas des bases de données utilisant des transactions

ou créant des rapports impliquant de gros volumes de données, l'augmenter

est critique pour les performances. Suivant le volume des données,

augmentez-le de 12 à 256 segments, en commençant avec des valeurs basses

et en l'augmentant lorsque vous apercevez des messages d'avertissements

dans les journaux de trace. L'espace requis sur disque est égal à

(checkpoint_segments * 2 + 1) * 16MB, donc assurez-vous que vous disposez

d'assez de place disque (32 signifiant plus d'1&nbsp;Go).</p>

<p><span class="c1">max_fsm_pages&nbsp;:</span> Taille du registre

traçant partiellement les pages de données vides pour les peupler plus

tard avec de nouvelles données&nbsp;; si elle est bien configurée, elle

rend le VACUUM plus rapide et supprime le besoin de VACUUM FULL et de

REINDEX. Devrait être légèrement supérieure au nombre total de pages de

données qui sera touché par les mises à jour et suppressions entre

VACUUM. Les deux façons de déterminer ce nombre sont de lancer VACUUM

VERBOSE ANALYZE ou, dans le cas de l'utilisation d'autovacuum (voir

ci-dessous), de configurer ceci suivant la valeur du paramètre -V en

tant que pourcentage des pages de données totales utilisées par votre

base de données. fsm_pages requiert très peu de mémoire, donc il vaut

mieux être généreux ici.</p>

<p><span class="c1">vacuum_cost_delay&nbsp;:</span> Si vous avez des

tables importantes et un nombre significatif d'écritures concurrentes,

vous pourriez vouloir utiliser une nouvelle fonctionnalité qui diminue

l'activité I/O des VACUUM au prix de les rendre plus long. Comme il

s'agit d'une toute nouvelle fonctionnalité, c'est une valeur complexe

comprenant cinq paramètres indépendants pour lesquels nous n'avons que

quelques tests de performance. Augmenter vacuum_cost_delay à une valeur

non nulle active cette fonctionnalité&nbsp;; utilisez un délai

raisonnable, quelque part entre 50 et 200&nbsp;ms. Pour une configuration

plus fine, augmenter vacuum_cost_page_hit et décroître

vacuum_cost_page_limit amoindrira l'impact des opérations VACUUM et les rendra

plus lentes&nbsp;; dans les tests de Jan Wieck pour des traitements de

transaction, un délai de 200, un page_hit de 6 et une limite de 100 fait

décroître l'impact du VACUUM de plus de 80&nbsp;% en triplant le temps

d'exécution.</p>

<h3>Planificateur de requêtes</h3>

<p>Ces paramètres permettent au planificateur de requêtes de disposer

d'estimations plus justes et, du coup, de choisir le meilleur plan possible.

Il existe deux paramètres globaux dont il vaut mieux s'occuper&nbsp;:</p>

<p><span class="c1">effective_cache_size&nbsp;:</span> Indique au

planificateur de requêtes l'objet en base de données le plus gros qu'il

peut s'attendre à avoir à placer en cache. Devrait généralement être

configuré au 2/3 de la RAM totale, dans le cas d'un serveur dédié. Sur

un serveur à utilisation mixe, vous aurez à estimer le nombre total de

mémoire RAM et de cache disque du système d'exploitation utilisé par

les applications et le soustraire.</p>

<p><span class="c1">random_page_cost&nbsp;:</span> Une variable qui

estime le coût moyen des recherches pour des pages de données récupérées

via l'index. Sur des machines très rapides, avec des baies de disques

très rapides, elle devrait être diminuée, à 3,0, 2,5 voire même 2,0.

Néanmoins, si la portion active de votre base de données est bien plus

grosse que votre mémoire, vous augmenterez le facteur à la valeur

par défaut de 4. Autrement, vous basez vos ajustements sur la

performance des requêtes. Si le planificateur semble favoriser sans

raison les parcours séquentiels par rapport aux parcours d'index,

baissez-le. Assurez-vous de tester une grande variété de requêtes. Ne

passez pas en-dessous de 2,0&nbsp;; si cela semble nécessaire, vous

avez besoin d'ajuster des variables comprises dans des domaines,

comme les statistiques de planification.</p>

<h3>Traces</h3>

<p><span class="c1">log_destination&nbsp;:</span> Ceci remplace le

paramètrage non intuitif de syslog dans les versions précédentes. Vos

choix sont d'utiliser le journal du système d'exploitation (syslog ou

eventlog) ou d'utiliser un journal de trace séparé pour PostgreSQL

(stderr). Le premier choix est meilleur en ce qui concerne la

surveillance du système&nbsp;; le deuxième est préférable pour corriger

les problèmes de la base de données et pour améliorer sa configuration.</p>

<p><span class="c1">redirect_stderr&nbsp;:</span> Si vous décidez

d'utiliser un journal de traces séparé pour PostgreSQL, ce paramètrage

vous permet de tracer dans un fichier en utilisant un outil de

PostgreSQL au lieu de la redirection de la ligne de commande, vous

permettant une rotation automatisée des traces. Configurez-le à True,

puis configurez log_directory en lui indiquant où placer les traces.

Les configurations par défaut pour log_filename, log_rotation_size et

log_rotation_age conviennent à la plupart des gens.</p>

<h3>Autovacuum et vous</h3>

<p>Lors de votre progression vers la production en 8.0, vous devrez

configurer un plan de maintenance qui inclut les VACUUM et ANALYZE. Si

votre base de données doit gérer un flot important d'écriture de données

mais ne requiert pas de chargement ou de suppression massifs de données

ou de redémarrages fréquents, ceci pourrait impliquer la configuration

de pg_autovacuum. C'est bien mieux qu'un VACUUM régulier parce

que&nbsp;:</p>

<ul>

<li>Les tables sont VACUUMées suivant leur activité, ceci permettant

d'éviter de lancer des VACUUM sur des tables en lecture seule.</li>

<li>La fréquence des VACUUM augmente automatiquement avec

l'acroissement de l'activité de la base de données.</li>

<li>Il est plus simple de calculer les besoins pour le "free space

map" et éviter ainsi un engorgement de la base de données.</li>

</ul>

<p>Configurer autovacuum requiert une construction facile du module

compris dans le répertoire contrib/pg_autovacuum de vos sources

PostgreSQL (les utilisateurs Windows devraient trouver autovaccuum inclus

dans le paquetage PGInstaller). Vous activerez les paramètrages de

configuration des statistiques détaillées dans le fichier README. Ensuite,

vous lancez autovacuum une fois que PostgreSQL a démarré et en tant que

processus séparé&nbsp;; il s'arrêtera automatiquement lors de l'arrêt

de PostgreSQL.</p>

<p>La configuration par défaut d'autovacuum est très basse et tout

à fait convenable pour une très petite base de données. J'utilise

généralement quelque chose de plus agressif comme&nbsp;:<br />

<code>-D -v 400 -V 0.4 -a 100 -A 0.3</code><br />

Ceci lance VACUUM sur les tables après que 400 lignes + 40&nbsp;% de la

table ont été insérées, mises à jour ou supprimées. La configuration

ci-dessus vous laisse aussi configurer max_fsm_pages à 50&nbsp;% des

pages de données dans la base avec la certitude que ce nombre ne sera

pas dépassé, causant un débordement de la base de données. Nous testons

actuellement différents paramètrages à OSDL et il y aura quelques cas

difficiles plus bas.</p>

<p>Notez que vous pouvez aussi utiliser autovacuum pour configurer les

options de délai du VACUUM, au lieu de le faire dans PostgreSQL.conf. Le

délai du vacuum peut être d'une importance vitale pour les systèmes avec

de très grosses tables ou index&nbsp;; sinon, un appel autovacuum (non

planifié) peut arrêter une opération importante.</p>

<p>Malheureusement, il existe un ensemble de limitations sérieuses à

l'autovacuum de la 8.0, limitations qui seront éliminées dans les

versions futures&nbsp;:</p>

<ul>

<li>Pas de mémoire à long terme&nbsp;: autovacuum oublie toutes ces

traces d'activité lors du redémarrage de la base de données. Donc, si

vous effectuez des redémarrages réguliers, vous devrez faire un VACUUM

ANALYZE complet des bases de données tout juste après.</li>

<li>Ne fait pas attention à l'activité du serveur&nbsp;: il existait

des plans pour vérifier la charge du système avant le VACUUM, mais ce

n'est pas une fonctionnalité actuelle. Donc, si vous avez des pics de

charge extrême, autovacuum pourrait ne pas être le bon choix pour

vous.</li>

</ul>

<div id="footerText">

Copyright Josh Berkus et Joe Conway, <a href="/License/">OPL Licensed</a><br />

Traduction française, Guillaume Lelarge.

</div>