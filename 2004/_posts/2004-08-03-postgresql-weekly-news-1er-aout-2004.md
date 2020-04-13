---
layout: post
title: "== PostgreSQL Weekly News - 1er août 2004 =="
author: "Jean-Paul Argudo"
redirect_from: "index.php?post/drupal-21 "
---


<p><acronym title="Note Du Traducteur">NDT</acronym>&nbsp;: une fois n'est pas coutume,

nous laissons le texte à la première personne car il s'agit surtout du compte-rendu des

conférences OSCon. N'oubliez donc pas, en lisant ceci, que le personnage principal est

Robert Treat, auteur des «&nbsp;PostgreSQL Weekly News&nbsp;», et que nous ne faisons

qu'une humble traduction de sa lettre hebdomadaire.</p>

<!--more-->


<h3>== Nouvelles hebdomadaires de PostgreSQL - 1er août 2004 ==</h3>

<p>Les nouvelles hebdomadaires sont de retour après une semaine de silence,

OSCon oblige. La conférence sur PostgreSQL a été un succès total avec un

nombre conséquent de participants. Les tutoriaux étaient tous

complets (certains étaient en «&nbsp;place debout obligatoire&nbsp;») et le

stand a été tout le temps occupé. J'ai aussi été arrêté par de nombreuses personnes

dans les halls qui soit m'interrogeaient sur PostgreSQL soit voulaient me dire

qu'elles utilisaient PostgreSQL. Un grand bravo à tous ceux qui ont participé à

l'évènement&nbsp;!</p>

<p>Bien sûr, pendant que nous étions à Portland, d'autres personnes travaillaient

à la préparation de la prochaine version prévue pour cette semaine. La plupart des

nouvelles fonctionalités ne sont pas nouvelles mais elles ont été ajoutées au CVS

lors de ces deux dernières semaines. C'est donc un bon moment pour faire le point

sur ce qui a été ajouté.</p>

<p>Des modifications ont été faites pour passer la compilation sous Borland. Le

nouveau code de plperl a été officiellement ajouté ainsi qu'une masse de

documentation pour expliquer comment utiliser la nouvelle fonctionnalité. Des

«&nbsp;timelines&nbsp;» ont été ajoutées aux <acronym title="Write Ahead Log">WAL</acronym>

pour que le <acronym title="Point In Time Recovery">PITR</acronym> soit plus

facilement administrable. Une vérification de la taille des fichiers a été ajoutée

aux WAL pour éviter la restauration de fichiers d'archives corrompus. Un brouillon

des notes de version pour la 7.5 a été rédigé et est disponible du côté de la

documentation des développeurs. Le projet pginstaller a continué son processus de

finalisation. Ce projet consiste à créér un éxecutable simple qui permet d'installer

PostgreSQL sur des machines Windows. Des traces supplémentaires ont été ajoutées

pour diagnostiquer les problèmes posés par les authentifications de type IDENT. Enfin,

les index sur clé unique ou primaire peuvent maintenant être créés sur des espaces logiques

séparés.</p>

<p>Le reste de l'implémentation des transactions imbriquées a été ajouté au CVS,

cette fonctionalité paraît relativement robuste à présent. L'implémentation

utilise les syntaxes SAVEPOINT/RELEASE/ROLLBACK-TO qui sont conformes aux

spécifications, plutôt que d'autres qui avaient été proposées. En parallèle,

plpgsql s'est vu doté de la capacité à récupérer les erreurs à l'intérieur d'une

fonction. La syntaxe est basée sur du «&nbsp;try/catch&nbsp;» et devrait être réutilisable

dans les autres langages procéduraux que PostgreSQL possède.</p>

<p>Le travail sur l'adaptation de PostgreSQL à la zone horaire du système a bien avancé. À

présent, le serveur se cale sur le fuseau horaire par défaut du serveur lors de

l'installaion. Pour les systèmes non-Windows, quelques scénarios ont été ajoutés

alors que pour les systèmes Windows, des tables de correspondance ont été créées avec

les fuseaux horaires connues de Windows. Une version en C de pg_config a été créée,

c'était le dernier outil d'administration qui avait besoin de la conversion.

DECLARE CURSOR peut maintenant prendre des paramètres depuis la fonction ou

procédure qui l'exécute. Un framework du Makefile pour fabriquer des extensions

à PostgreSQL a été ajouté. En gros, c'est la généralisation de ce qui existe

dans les contrib, qui permettra de fabriquer des projets externes à PostgreSQL,

en dehors des répertoires contrib.</p>

<p>Une dernière note, pour ceux qui désireraient récupérer les tutoriaux et autres

codes d'exemple utilisés pour l'OSCon sur le site techdocs. Nous avons des

ajouts de Bruce Momjian, Joe Conway et moi-même, et nous devrions en avoir plus

dans les quelques jours à venir. Veuillez regarder sur <a href="http://techdocs.postgresql.org/oscon2004/">http://techdocs.postgresql.org/oscon2004/</a>.

</p>

<h3>== Nouvelles des produits PostgreSQL ==</h3>

<ul>

<li>Le groupe CONNX Solutions and Martin délivrent le High-Performance AdHoc Reporting

Solution<br />

<a href="http://www.emediawire.com/releases/2004/7/emw144556.htm">http://www.emediawire.com/releases/2004/7/emw144556.htm</a>

</li>

<li>OpenPKG 2.1 l'outil de packaging cross-plates-formes est sorti<br />

<a href="http://www.linuxpr.com/releases/7053.html">http://www.linuxpr.com/releases/7053.html</a>

</li>

<li>SCO améliore les performances de Java de 60&nbsp;%<br />

<a href="http://www.integratedmar.com/ECLbriefs.cfm?item=BRI072704-3">http://www.integratedmar.com/ECLbriefs.cfm?item=BRI072704-3</a>

</li>

<li>AdventNet s'associe avec Sybase Middle and Central East And Europe<br />

<a href="http://www.linuxelectrons.com/article.php/20040723020636634">http://www.linuxelectrons.com/article.php/20040723020636634</a>

</li>

<li>Version beta de Pginstaller<br />

<a href="http://pgfoundry.org/projects/pginstaller/">http://pgfoundry.org/projects/pginstaller/</a>

</li>

</ul>

<h3>== PostgreSQL dans la presse ==</h3>

<ul>

<li>Créér des requêtes personalisées sur des courriers électroniques<br />

<a href="http://www.onlamp.com/pub/a/onlamp/2004/07/22/datamining_email.html">http://www.onlamp.com/pub/a/onlamp/2004/07/22/datamining_email.html</a>

</li>

<li>

PostgreSQL&nbsp;: l'AUTRE base de données Open-Source<br />

<a href="http://informationweek.com/story/showArticle.jhtml?articleID=23902346">http://informationweek.com/story/showArticle.jhtml?articleID=23902346</a>

</li>

</ul>

<h3>== Evénements à venir ==</h3>

<ul>

<li>Linux World Expo&nbsp;: San Francisco, Californie, Etats unis, du 3 au 5 août<br />

PostgreSQL aura un stand et des conférences avec OSDL<br />

<a href="http://www.linuxworldexpo.com/live/12/events/12SFO04A">http://www.linuxworldexpo.com/live/12/events/12SFO04A</a>

</li>

<li>Linux Expo Shanghai&nbsp;: Shanghaï, Chine&nbsp;: 9 et 10 septembre<br />

Bruce Momjian y tiendra une conférence<br />

<a href="http://www.linuxexposhanghai.com/en/index.html">http://www.linuxexposhanghai.com/en/index.html</a>

</li>

<li>LinuxWorld Conferance&nbsp;: Frankfort, Allemagne&nbsp;: du 26 au 28 Octobre<br />

PostgreSQL y aura encore un stand cette année<br />

<a href="http://www.linuxworldexpo.de/">http://www.linuxworldexpo.de/</a>

</li>

</ul>

<h3>== PostgreSQL Weekly News - 1er Août 2004 ==</h3>

<p>

Sur le Web:<br />

<a href="http://www.postgresql.org">

http://www.postgresql.org

</a>

</p>