---
layout: post
title: "Nouvelles neuves de PG"
author: "SAS"
categories: [PostgreSQL Weekly News]
redirect_from: "index.php?post/drupal/243"
---


<p><strong>Nouvelles hebdomadaires de PostgreSQL - 18 mars 2007</strong></p>

<p>

Les inscriptions étudiantes au Google Summer Of Code sont officiellement ouvertes&nbsp;:

<a target="_blank" href="http://code.google.com/soc/">http://code.google.com/soc/</a>

</p>

<p>

N'hésitez pas à contacter Robert Treat à xzilla@users.sourceforge.net si vous souhaitez effectuer un talk au PgCon.</p>

<!--more-->


<strong>Les nouveautés des produits dérivés</strong>

<ul>

<li>

pg_bulkload&nbsp;:

<a target="_blank" href="http://pgfoundry.org/projects/pgbulkload/">http://pgfoundry.org/projects/pgbulkload/</a>

</li>

<li>

Replicator 8.1.9-1.7&nbsp;:

<a target="_blank" href="http://www.commandprompt.com/">http://www.commandprompt.com/</a>

</li>

<li>

PL/Proxy 2.0&nbsp;:

<a target="_blank" href="https://developer.skype.com/SkypeGarage/DbProjects/PlProxy">https://developer.skype.com/SkypeGarage/DbProjects/PlProxy</a>

</li>

<li>

PgBouncer 1.0&nbsp;:

<a target="_blank" href="https://developer.skype.com/SkypeGarage/DbProjects/PgBouncer">https://developer.skype.com/SkypeGarage/DbProjects/PgBouncer</a>

</li>

<li>

SkyTools 2.1&nbsp;:

<a target="_blank" href="https://developer.skype.com/SkypeGarage/DbProjects/SkyTools">https://developer.skype.com/SkypeGarage/DbProjects/SkyTools</a>

</li>

<li>

Slony-I 1.1.8 et 1.2.8&nbsp;:

<a target="_blank" href="http://www.slony.info/">http://www.slony.info/</a>

<em>NDT&nbsp;: Un bogue a été identifié dans ces versions. Il faut appliquer une légère modification dans le fichier

/src/backend/slony1_funcs.sql&nbsp;:

<code>

-- ----

-- Changes for 1.2

-- ----

-	if p_old IN (''1.0.2'', ''1.0.5'', ''1.0.6'', ''1.1.0'', ''1.1.1'', ''1.1.2'', ''1.1.3'',''1.1.5'', ''1.1.6'', "1.1.7", "1.1.8") then

+	if p_old IN (''1.0.2'', ''1.0.5'', ''1.0.6'', ''1.1.0'', ''1.1.1'', ''1.1.2'', ''1.1.3'',''1.1.5'', ''1.1.6'', ''1.1.7'', ''1.1.8'') then

-- Add new table sl_registry

execute ''create table @NAMESPACE@.sl_registry (

</code>

</em>

</li>

</ul>

<p><strong>Les jobs PostgreSQL Jobs de mars</strong></p>

<p>

<a target="_blank" href="http://archives.postgresql.org/pgsql-jobs/2007-03/threads.php">http://archives.postgresql.org/pgsql-jobs/2007-03/threads.php</a>

</p>

<p><strong>PostgreSQL Local</strong></p>

<p>

La communauté PostgreSQL italienne est toujours à la recherche de mécènes pour ses journées PostgreSQL au Prato, Italie.

<a target="_blank" href="http://www.pgday.it">http://www.pgday.it</a>

</p>

<p>

Anders Steinlein crée un PUG en Norvège. N'hésitez pas à le contacter à <anders@steinlein.no> prendre part à l'aventure.

</anders@steinlein.no></p>

<p>

Josh Berkus, David Fetter et Fernando Ike de Oliveira seront à la FISL 8.0 in Porto Alegre, RS, Brazil.

</p>

<p><strong>PostgreSQL dans les média</strong></p>

<ul>

<li>

Planet PostgreSQL&nbsp;:

<a target="_blank" href="http://www.planetpostgresql.org/">http://www.planetpostgresql.org/</a>

</li>

<li>

General Bits, Archives et articles occasionnels&nbsp;:

<a target="_blank" href="http://www.varlena.com/GeneralBits/">http://www.varlena.com/GeneralBits/</a>

</li>

<li>

<p><em>

PostgreSQL Weekly News vous est présenté cette semaine par David Fetter.

Adaptation francophone de Stéphane Schildknecht, Guillaume de Rorthais et Cédric Villemain.

</em></p>

<p>Vos propositions d'informations doivent parvenir avant dimanche minuit à david@fetter.org. Les propositions en allemand peuvent être envoyées à pwn@pgug.de.</p>

<p><strong>Correctifs appliqués</strong></p>

</li>

</ul>

<p>Neil Conway a commité&nbsp;: </p>

<ul>

<li>

le patch de Stefan Huehner pour déclarer plusieurs variables char* en const lorsqu'elles sont initialisées avec une chaîne de caractère constante&nbsp;;</li>

<li>

le patch de Stefan Huehner qui modifie quelques déclarations de fonction en style <a href="http://fr.wikipedia.org/wiki/The_C_Programming_Language">K&amp;R</a>  vers de l'ANSI C. </li>

</ul>

<p>Michael Meskes a commité&nbsp;: </p>

<ul>

<li>

simplification de la règle sortby dans pgsql/src/backend/parser/gram.y&nbsp;;</li>

<li>

diverses corrections de ecpg, un peu de refonte de code, et quelques nouveaux tests unitaires&nbsp;;</li>

<li>

ajout du nouveau répertoire src/interfaces/ecpg/preproc/parser. </li>

</ul>

<p>Alvaro Herrera a commité&nbsp;: </p>

<ul>

<li>

correction d'une valeur non initialisée dans pgstatindex menant dans certains cas à fournir des données invalides. Rapport et patch de Tatsuhito Kasahara.

Ont été aussi corrigé deux autres bogues que j'ai remarqué en validant le code environnant.</li>

</ul>

<p>Teodor Sigaev a commité&nbsp;: </p>

<ul>

<li>

le patch de Guillaume Smet qui ajoute le support de <a href="http://docs.postgresqlfr.org/8.2/GIN.html">GIN</a> pour pg_trgm, avec quelques ajouts éditoriaux de Teodor Sigaev. </li>

</ul>

<p>Tom Lane a commité&nbsp;: </p>

<ul>

<li>

correction du makefile de ecpg/preproc pour la construction en parallèle&nbsp;: parser.o doit dépendre de preproc.h, sinon, make pourrait essayer de le construire avant que preproc.h soit prêt. Rapporté suite à des échecs constatés ici et dans la ferme de compilation&nbsp;;</li>

<li>

SPI_cursor_open ne peut assurer que seules les requêtes en lecture seule peuvent être éxecutées en mode lecture seule. Cela peut conduire à différents échecs relativement subtils, comme une fonction prétenduement stable qui renverait des resultats instables. Ce bug concerne toutes les versions depuis l'introduction du mode lecture seule dans 8.0. Rapporté par Gaetano Mendola&nbsp;;</li>

<li>

oups, une seule des deux variantes de ArrayExpr a été corrigée dans le premier jet pour le support de exprTypmod. De plus, l'expérience montre que nous devons étiqueter les noeuds numeric de type Const avec un typmod spécifique&nbsp;;</li>

<li>

correction des derniers endroits où l'expression de la structure du noeud pouvait perdre les informations disponibles à propos d'une expression&nbsp;; soit Const, ArrayRef, ArrayExpr, and EXPR et les ARRAY SubLinks. Dans les cas de ArrayExpr et SubLink ce n'était pas vraiment la faute de la structure de donnée, mais celle de la faignantise de exprTypmod().

Cela semble être une bonne idée en vue du travail attendu de Teodor sur la remontée de l'utilisation de typmod pour autoriser les types définis par les utilisateurs à avoir des typmods.

Ça répond en particulier aux propos que nous avons échangés sur l'élimination du code écrit spécialement pour exprTypmod() qui l'utilisait comme BPCHAR Consts.

Nous pouvons désormais dire si un tel Const a été défini à une taille spécifique ou non, et l'indiquer ou l'afficher correctement. initdb a dû être mis à jour à cause des changements dans les règles stoquées&nbsp;;</li>

<li>

correction d'un bogue d'appels concurrents dans les tests de régressions en parallèle. Le nouveau test du planificateur de cache suppose qu'il n'existe pas de table 'foo' à ce moment là, mais il s'avère que les tests sur les règles en créent une en même temps, ce qui entraîne parfois l'échec de planificateur. Je peut reproduire cela en quelques essais ici, mais plusieurs fermes de compilation ont déjà rencontré ce problème. Corrigé en renommant la table temporaire du planificateur de cache par quelque chose de non conflictuel.&nbsp;;</li>

<li>

utilisation du module de planificateur de cache pour les plans de SPI. En particulier, depuis que plpgsql utilise les plans SPI, permet de finalement corriger l'incompréhension sur le fait de ne pas pouvoir supprimé et recréé une table temporaire depuis une fonction plpgsql.

Ce faisant, l'API de SPI a été nettoyée un petit peu en déclarant les pointeurs de plan SPI en "SPIPlanPtr" plutôt qu'en "void *". Ça reste cosmetique, mais ça aide à éviter les petites erreurs de programmation. (J'en ai changé quelques uns, mais pas tous les appels concernés&nbsp;; il reste certains "void *"  dans contrib et les PL. C'est voulu afin de voir si quelque compilateur s'en plaint.)</li>

<li>

correction d'un bug longtemps resté en attente pour la prise en charge des chaînes de mise à jour dans VACUUM FULL. Le code ne prévoit pas qu'un tuple DEAD puisse suivre un tuple RECENTLY_DEAD dans une chaîne de mise à jour, mais la règle OldestXmin qui détermine l'état de mort étant une simplification de la réalité, il est possible que cela se produise (impliquant que le tupe RECENTLY_DEAD soit mort pour tous les observateurs, mais ce patch n'essaie pas d'exploiter cela). Le code suivrait une chaîne jusqu'au bout, mais ensuite s'arrêterait avant un tuple DEAD pour la sauvegarde, ce qui implique que toute la chaîne ne sera pas déplacée. Cela peut mener à de multiple copies de la chaîne (impliquant à terme des copies de tuples actifs dupliquées), ou d'oublier des entrées d'index balancés (ce qui, en plus de générer des avertissements lors des prochains vaccums, crée un risque d'avoir des résultats de requête faux ou de fausses erreurs de clé dupliquée une fois que la partie des données pointées par l'index est repeuplée).

La correction consiste à revérifier HeapTupleSatisfiesVacuum durant l'avancée dans une chaîne, et d'arrêter lorsqu'un tuple DEAD est atteint. Tout group contigü de tuple RECENTLY_DEAD sera alors copié dans une chaîne à part. Le patch ajoute aussi deux vérifications de cohérence supplémentaires pour assurer un comportement correcte. Compte rendu et test unitaire de Pavan Deolasee&nbsp;;

</li>

<li>

essayé d'inserer une entrée "posixrules" dans notre base de fuseaux horaires, ainsi les spécifications de fuseau horaire de style POSIX ne correspondant pas exactement à une entrées de la base seront traitées comme ayant une règle USA DST correcte. De plus, documenté que cela peut-être modifié pour utiliser d'autres règles DST avec une spécification de zone POSIX<!-- houla -->. Nous pourrions penser à changer le TZDEFRULESTRING de localtime.c, mais comme cette astuce ne peut-être utilisée qu'avec une règle de transition DST, ça semble plutôt inutile&nbsp;; nous pourrions aussi juste le surcharger en utilisant une entrée "posixrules". Le patch rmeonte jusqu'à la 8.0. Il n'y a pas grand chose à faire pour les 7.x...votre libc le gère correctement, ou pas.&nbsp;;</li>

<li>

correction d'un balisage cassé, avec une taille de tabulation étrange&nbsp;;</li>

<li>

le Makefile de regression a désormais besoin de faire une liste de ce qui doit être nettoyé pour chaque répertoire input/ et output/, car à cause de l'ajout de largeobject_1.source, ils n'ont plus la même liste. A priori, le processus de ferme de compilation actuel ne se fait pas si 'make distclean' ne laisse pas une arborescence propre, sinon, la ferme échouerait pendant un bout de temps.&nbsp;;</li>

<li>

première phase du projet d'invalidation de planification : crée un module de gestion de planification de cache et enseigne comment l'utiliser à PREPARE et aux instructions préparées par niveau de protocole. l'utilitaire de réarrangement est à son service afin que l'analyse du parseur ne prévoit pas que les schema de tables ne puissent pas changer avant l'execution pour l'utilitaire d'instructions (nécessaire car nous n'essayons pas de réobtenir les verrous pour l'utilitaire d'instructions lors de la réutilisation d'un plan stocké).

Cela nécessite quelque refontes de l'API ProcessUtility, mais quoiqu'il en soit, ça finira par être plus clair, par exemple nous pouvons nous débarrasser de la global QueryContext. Reste à faire: corriger SPI et les codes impactés pour qu'ils utilisent le planificateur de cache&nbsp;; Je suis tenté d'essayer de faire en sorte que les fonctions SQL puissent l'utiliser aussi. De plus il y a au moins quelques aspects d'état de système dont nous devons nous assurer qu'il reste à l'identique de l'execution orignale durant la replanification&nbsp;; search_path doit certainement se comporter de cette manière par exemple, et il y en a peut-être d'autre.

</li>

</ul>

<p>Peter Eisentraut a commité&nbsp;: </p>

<ul>

<li>

l'annulation du correctif suivant, en attendant d'autres correctifs&nbsp;;</li>

<li>

le patch de Joachim Wieland qui permet de rendre aux paramètres leur valeur par défaut lorsqu'ils sont absents du fichier de configuration. </li>

</ul>

<p>Magnus Hagander a commité&nbsp;: </p>

<ul>

la compilation de MSVC a actuellement besoin de Bison 2.2 ou plus, pas 2.1. Ou 1.875 comme avant&nbsp;;

<li>

l'ajout d'une note expliquent que diff est requis pour les tests de régression&nbsp;;</li>

<li>

l'ajout d'un tag cvs pour les fichiers de compilation de msvc, ainsi qu'un (très court) commentaire à propos de ce que fait chaque script&nbsp;;</li>

<li>

Houla, oublié de retirer le vieux script gnbki&nbsp;;</li>

<li>

la transformation de la plupart des script de compilation vc en module au lieu de scripts, et nous n'avons plus que des squelettes de scripts qui les appellent. Simplifie l'accès direct aux modules par la ferme de compilation (ou d'autres "appels exterieurs"). Suggestion de Andrew Dunstan&nbsp;;</li>

<li>

l'ajout de nouvelles colonnes pour les statistiques de tuple au niveau de la base de données à pg_stat_database&nbsp;;</li>

<li>

le correctif de Greg Sabino Mullane qui permet à psql de retourner le type des agrégats avec \da&nbsp;;</li>

<li>

dans pgsql/src/tools/msvc/builddoc.bat, le retrait des guillemets simples supplémentaires hérités de la construction Unix. Win32 ne retire pas ces guillemets simples...</li>

<li>

la réécriture de la documentation d'installation pour win32 (elle ne considère plus uniquement le côté client, mais est désormais complète). Mise à jour du support pour MSVC6/Borland  maintenant juste avec libpq. Déplacement de la plupart des informations sur la compilation complète de MSVC du README dans la documentation&nbsp;;</li>

<li>

filtre les avertissements qui viennent des feuilles de style, de sorte que désormais les avertissements actuels se voient proprement. Montre quelques petits messages de progression&nbsp;;</li>

<li>

défini la racine des trucs docbook dans buildenv.bat et pas dans builddoc.bat. Répare l'appel pour renommer un fichier quand cd:ed dans un dossier différent.&nbsp;;</li>

<li>

l'usage correct de pg_strcasecmp() au lieu de strcasecmp(). Annule le soucis de compilation win32&nbsp;;</li>

<li>

le correctif de ITAGAKI Takahiro qui fixe stderr à non-bufferisé pour pgbench sur win32&nbsp;;</li>

<li>

l'utilisation de perltidy pour formatter le code perl MSVC. Suggestion de Andrew Dunstan. </li>

</ul>

<p><strong>Correctifs rejetés (à ce jour)</strong></p>

<p>

Pas de déception cette semaine :-)

</p>

<p><strong>Correctifs en attente</strong></p>

<ul>

<li>

Heikki Linnakangas a soumis un correctif pour améliorer le parcours bitmap. Une discussion animée s'en est suivie&nbsp;;</li>

<li>

Gavin Sherry a envoyé un correctif différent pour le parcours de l'index bitmap&nbsp;;</li>

<li>

Gregory Stark a envoyé un correctif qui implante la suggestion de Tom Lane pour envelopper les pointeurs toast non-alignés et les copier dans une structure locale pour accéder aux champs&nbsp;;</li>

<li>

Pavan Deolasee a envoyé la version 4.4 de son correctif HOT WIP&nbsp;</li>

<li>

Gregory Stark a envoyé une autre version de son correctif Packed Varlena&nbsp;</li>

<li>

Jeff Davis a envoyé une autre version de son correctif de scans synchronisés WIP, celui-ci avec quelques ajustements pour appeler ss_report_loc() moins souvent, changement sur la connexion, et quelques nouvelles variables GUC&nbsp;</li>

<li>

Andrew Dunstan a envoyé un correctif qui supprime le comportement non-documenté de \copy de psql de la branche pre-7.3&nbsp;</li>

<li>

Magnus Hagander a envoyé un correctif qui ajoute quelques nouvelles colonnes à pg_stat_database&nbsp;</li>

<li>

Jan Wieck a envoyé 3 révisions d'un correctif étendant pg_trigger et pg_rewrite pour le rendre plus réplication-compatible&nbsp;;</li>

<li>

Magnus Hagander a envoyé un correctif qui remplace les pthreads du code d'ecpg par les threads natifs de win32, de facon à le rendre threadsafe. L'idée est de ne pas avoir à télécharger les librairies pthreads non-standard sur windows.

Cela vous semble-t-il faire ce que cela doit faire ? Est-ce que quelqu'un a un bon cas de test qui casse ecpg lorsqu'il n'a pas été compilé thread-safe ? (ce qui doit surement casser lorsque compilé en thread-safe avec une mauvaise implantation)&nbsp;;</li>

<li>

ITAGAKI Takahiro a envoyé un handler pour annuler vacuumdb, reindexdb et clusterdb.</li>

</ul>