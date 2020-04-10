---
layout: post
title: "Utilisation des rôles dans PostgreSQL 8.1"
author: "gleu"
redirect_from: "index.php?post/drupal-137 "
---



<!-- header -->

<p>PostgreSQL 8.1 modifie la gestion des utilisateurs. Le concept des utilisateurs et des groupes est remplacé par un concept plus global&nbsp;: celui des <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/user-manag.html">rôles</a>. Un rôle correspond à un utilisateur et/ou à un groupe. Un rôle a des droits et il peut être membre d'un ou plusieurs autres rôles.</p>

<p>Le concept des utilisateurs et des groupes est facile à appréhender. Malheureusement, il ne donne pas beaucoup de liberté dans son utilisation. Un utilisateur fait partie d'un ou plusieurs groupes. Il hérite en cela des droits de ces groupes. À partir du moment où un utilisateur fait partie d'un groupe, il dispose des droits de ce groupe. Il lui est impossible de masquer les droits du groupe pour ne voir que les siens. Il lui est aussi impossible de masquer ses droits par ceux du groupe. Les rôles permettent tout cela.</p>

<p>À sa création, un rôle peut avoir <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/role-attributes.html">plusieurs options spéciales</a>&nbsp;:

</p>

<ul>

<li>login, le rôle est autorisé à se connecter sur une base</li>

<li>createdb, le rôle est autorisé à créer une base de données</li>

<li>createrole, le rôle est autorisé à créer un autre rôle</li>

<li>superuser, le rôle a tous les droits car il est un superutilisateur</li>

</ul>

<p>Tout de suite, nous apercevons une différence importante avec les versions précédentes. Un rôle pouvant créer un autre rôle n'est pas forcément un superutilisateur. Pour qu'un rôle soit superutilisateur, il doit avoir été créé avec l'option superuser par un superutilisateur. Cela sous-entend un point extrêmement important pour l'administration d'un serveur de bases de données : il est maintenant possible de nommer un administrateur, chargé de la création des bases et des rôles, qui ne soit pas malgré tout le maître absolu du SGBD. Certes, il pourra créer des bases mais cela ne lui donnera pas le droit de supprimer objets et données dans cette base (en supposant qu'un autre rôle soit le propriétaire de la base). Nous verrons plus tard que les rôles permettent une meilleure prise en compte de la sécurité.</p>

<p>Une fois un rôle créé, il est possible de le rendre propriétaire d'objets et de lui donner/enlever des droits sur les objets. Pour cela, vous disposez des instructions SQL habituelles : ALTER objet SET OWNER / <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/sql-grant.html">GRANT</a> / <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/sql-revoke.html">REVOKE</a>. Vous pouvez intégrer un rôle à un autre avec la commande <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/sql-altergroup.html">ALTER GROUP groupe ADD USER utilisateur</a>. Tout cela ressemble aux versions précédentes de PostgreSQL&nbsp;: il existe des utilisateurs (rôles ayant le doit LOGIN) et des groupes (rôles comprenants d'autres rôles comme membres).</p>

<p>Passons à la pratique avec un exemple simple. Mettons-nous dans le cas d'une entreprise stockant ces factures dans une base de données PostgreSQL. Lors de la conception du schéma de cette base, une table contenant les factures a été créée&nbsp;:</p>

<pre>postgres@metier=# CREATE TABLE facture (f_id int4, f_objet varchar(200));</pre>

<p>Les droits relatifs aux personnes du service secrétariat sont gérés grâce à un rôle nommé secrétariat.</p>

<pre>postgres@metier=# CREATE ROLE secretariat;</pre>

<p>Anne fait partie du secrétariat et doit être ajoutée à ce groupe&nbsp;:</p>

<pre>postgres@metier=# CREATE ROLE anne LOGIN IN GROUP SECRETARIAT;</pre>

<p>Ce groupe a le droit de visualiser, d'ajouter et de mettre à jour des factures. Étant pour l'instant la seule de ce service, elle aura aussi le droit de supprimer des factures erronées.</p>

<pre>postgres@metier=# GRANT SELECT, INSERT, UPDATE, DELETE ON facture TO secretariat;</pre>

<p>Connectons-nous en tant que anne&nbsp;:</p>

<pre>bash# psql -U anne metier</pre>

<p>Et insérons une facture&nbsp;:</p>

<pre>anne@metier=&gt; insert into facture (f_id, f_objet) values (1, 'PostgreSQL par la pratique');<br />INSERT 0 1<br />anne@metier=&gt;select * from facture;<br /> f_id | f_objet<br />------+---------<br />    1 | PostgreSQL par la pratique<br />(1 ligne)<br /><br />anne@metier=&gt;insert into facture (f_id, f_objet) values (2, 'Cahiers du Programmeur PostgreSQL');<br />INSERT 0 1<br />anne@metier=&gt;select * from facture;<br /> f_id | f_objet<br />------+---------<br />    1 | PostgreSQL par la pratique<br />    2 | Cahiers du Programmeur PostgreSQL<br />(2 lignes)<br /><br />anne@metier=&gt;delete from facture where f_id=1;<br />DELETE 1<br />anne@metier=&gt;select * from facture;<br /> f_id | f_objet<br />------+---------<br />    2 | Cahiers du Programmeur PostgreSQL<br />(1 ligne)</pre>

<p>Après quelques opérations, nous nous apercevons que le rôle est bien paramétré.</p>

<p>Très bien. Jusque-là, ce n'est qu'une simple utilisation des rôles, identique à ce qu'il était possible de faire avec les utilisateurs et groupes de la version précédente.</p>

<p>Une nouvelle personne est embauchée au service du secrétariat. Cette nouvelle personne n'aura pas le droit de supprimer de factures, étant donné qu'elle vient tout juste d'arriver dans le service. Nous allons donc créer un rôle d'administrateur des factures qui ne pourra que supprimer une facture.</p>

<p>Commençons par créer le rôle d'administrateur des factures et donnons lui les droits de suppression sur la table facture.</p>

<pre>postgres@metier=# CREATE ROLE admin_secretariat;<br />CREATE<br />postgres@metier=# GRANT DELETE ON facture TO admin_secretariat;<br />GRANT</pre>

<p>Supprimons le droit de suppression du groupe secrétariat&nbsp;:</p>

<pre>postgres@metier=# REVOKE DELETE ON facture FROM secretariat;<br />REVOKE</pre>

<p>Créons la nouvelle personne et ajoutons-là dans le groupe secretariat&nbsp;:</p>

<pre>postgres@metier=# CREATE ROLE beatrice LOGIN IN ROLE secretariat;<br />CREATE</pre>

<p>N'oublions pas d'ajouter Anne dans le nouveau rôle d'administrateur des factures.</p>

<pre>postgres@metier=# GRANT admin_secretariat TO anne;<br />GRANT</pre>

<p>Testons nos modifications&nbsp;:</p>

<pre>postgres@metier=#\c metier beatrice<br />Vous êtes maintenant connecté à la base de données «metier» en tant qu'utilisateur «beatrice».<br />beatrice@metier=&gt;insert into facture (f_id, f_objet) values (3, 'PostgreSQL Essential References');<br />INSERT 0 1<br />beatrice@metier=&gt;update facture set f_objet='PostgreSQL Essential Reference' where f_id=3;<br />UPDATE 1<br />beatrice@metier=&gt;delete from facture where f_id=3;<br />ERREUR:  droit refusé pour la relation facture<br />beatrice@metier=&gt;\c metier anne<br />Vous êtes maintenant connecté à la base de données «metier» en tant qu'utilisateur «anne».<br />anne@metier=&gt;insert into facture (f_id, f_objet) values (4, 'PostgreSQL Essential Reference');<br />INSERT 0 1<br />anne@metier=&gt;update facture set f_objet='objet 4.5' where f_id=4;<br />UPDATE 1<br />anne@metier=&gt;delete from facture where f_id=4;<br />DELETE 1</pre>

<p>Tout va bien. Bien qu'un peu plus complexe, cela était déjà possible avec les anciennes versions. Passons maintenant à la notion d'héritages direct et indirect. Dans ces exemples, tout utilisateur qui se connectait avait directement les droits qui lui étaient propres et ceux qu'il héritait des groupes dont il était membre. Supposons que l'administrateur de la base de données gère correctement sa base. Il ne se connecte pas en superutilisateur en permanence, mais uniquement quand les circonstances l'exigent. Anne absente, il doit pouvoir supprimer une facture si le cas se présente sans pour autant avoir à dégainer les super-pouvoirs du superutilisateur. Solution simple : il va devenir membre du groupe admin_secretariat. Il n'a pas besoin d'avoir le droit de créer ou modifier les factures, simplement de pouvoir les supprimer. Si nous l'ajoutons directement dans ce groupe, dès sa connexion, il aura le droit de supprimer des factures. Or, ce n'est pas un travail qu'il va faire fréquemment. Il ne faut donc pas que ce droit de suppression soit automatique. Son utilisateur sera donc déclaré comme ne bénéficiant pas directement des droits des groupes dont il est membre. Supposons que le rôle de cet administrateur s'appelle admin_metier... voici sa définition&nbsp;:</p>

<pre>postgres@metier=# CREATE ROLE admin_metier LOGIN NOINHERIT;<br />CREATE<br />postgres@metier=# GRANT admin_secretariat TO admin_metier;<br />GRANT</pre>

<p>Connectons-nous en tant qu'admin_metier et voyons quelles opérations sont autorisées sur la table facture&nbsp;:</p>

<pre>postgres@metier=#\c metier admin_metier<br />Vous êtes maintenant connecté à la base de données «metier» en tant qu'utilisateur «admin_metier».<br />admin_metier@metier=&gt;insert into facture (f_id, f_objet) values (5, 'PostgreSQL 8 et PHP 5');<br />ERREUR:  droit refusé pour la relation facture<br />admin_metier@metier=&gt;update facture set f_objet='objet 4.5' where f_id=4;<br />ERREUR:  droit refusé pour la relation facture<br />admin_metier@metier=&gt;delete from facture where f_id=4;<br />ERREUR:  droit refusé pour la relation facture</pre>

<p>Les trois opérations de base nous sont refusées alors que seule DELETE devait fonctionner. Voyons pourquoi.</p>

<pre>admin_metier@metier=&gt;\dp<br />                                      Privilèges d'accès de la base de données «metier»<br /> Schéma |       Nom        |   Type   |                                  Privilèges d'accès<br />--------+------------------+----------+---------------------------------------------------------------------------------------<br /> public | facture          | table    | {postgres=arwdRxt/postgres,secretariat=arw/postgres,admin_secretariat=d/postgres}<br />(1 ligne)</pre>

<p>La colonne «&nbsp;Privilèges d'accès&nbsp;» contient un tableau dont chaque élément précise les droits attribués à un rôle ainsi que le rôle qui a attribué ces droits. Par exemple, le premier élément indique que le rôle postgres a reçu les droits «&nbsp;arwdRxt&nbsp;» (plus précisément tous les droits) de lui-même (normal car c'est le superutilisateur de cette base). Le deuxième élément indique que le rôle secretariat a reçu les droits «&nbsp;arw&nbsp;» de l'utilisateur postgres. Voici un petit tableau rappelant la signification de chaque lettre (pour plus d'information, voir la <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/sql-grant.html">page de manuel sur la commande GRANT</a>)&nbsp;:</p>

<table>

<tbody><tr>

<td>r</td>

<td>SELECT</td>

</tr>

<tr>

<td>w</td>

<td>UPDATE</td>

</tr>

<tr>

<td>a</td>

<td>INSERT</td>

</tr>

<tr>

<td>R</td>

<td>RULE</td>

</tr>

<tr>

<td>x</td>

<td>REFERENCES</td>

</tr>

<tr>

<td>r</td>

<td>TRIGGER</td>

</tr>

<tr>

<td>X</td>

<td>EXECUTE</td>

</tr>

<tr>

<td>U</td>

<td>USAGE</td>

</tr>

<tr>

<td>C</td>

<td>CREATE</td>

</tr>

<tr>

<td>T</td>

<td>TEMPORARY</td>

</tr>

</tbody></table>

<p>admin_secretariat ne dispose que du droit de suppression (<code>d</code>). Or, nous demandons dans la requête de supprimer toutes les lignes dont f_id vaut 4. Pour cela, nous devons pouvoir lire cette table. Donnons donc le droit de lire (<code>r</code>) cette table au rôle admin_secretariat.</p>

<pre>admin_metier@metier=&gt;\c metier postgres<br />Vous êtes maintenant connecté à la base de données «metier» en tant qu'utilisateur «postgres».<br />postgres@metier=#grant select on facture to admin_secretariat;<br />GRANT<br />postgres@metier=#\c metier admin_metier<br />Vous êtes maintenant connecté à la base de données «metier» en tant qu'utilisateur «admin_metier».<br />admin_metier@metier=&gt;delete from facture where f_id=5;<br />ERREUR:  droit refusé pour la relation facture<br />admin_metier@metier=&gt;set role admin_secretariat;<br />SET<br />admin_metier@metier=&gt;delete from facture where f_id=3;<br />DELETE 1</pre>

<p>Tout fonctionne maintenant à merveille. L'administrateur de la base n'a pas automatiquement les droits associés aux rôles dont il est membre. C'est une grande amélioration dans la gestion des droits des utilisateurs et groupes de la base de données car elle permet de mieux protéger les données.</p>

<p>Abordons maintenant deux fonctionnalités peu connues mais très intéressantes. Le fichier .psqlrc permet de configurer certains paramètres en exécution au lancement de psql. Ce fichier est très utile quand un utilisateur souhaite paramètrer finement sa connexion suivant son travail. Malheureusement, cela ne fonctionne que pour le programme psql. En utilisant d'autres outils, il faudra que ces derniers fournissent un moyen équivalent... ce qui ne sera pas toujours le cas. Sachez donc qu'il est aussi possible d'enregistrer les valeurs de certains paramètres directement au niveau des rôles... donc des valeurs appliquées quelque soit l'outil utilisé pour accéder à la base. Pour cela, il faut utiliser la commande&nbsp;: <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/sql-alterrole.html">ALTER ROLE toto SET paramètre TO valeur</a>. L'utilisation la plus fréquente est l'initialisation du chemin <a href="http://traduc.postgresqlfr.org/pgsql-8.1.0-fr/runtime-config-client.html#GUC-SEARCH-PATH">search_path</a>.</p>

<p>La deuxième fonctionnalité est une nouveauté de la 8.1. Il est possible de limiter le nombre de connexions simultanées avec un même utilisateur. Il faut voir cela surtout comme une mesure de sécurité. Si vos utilisateurs correspondent réellement à des personnes physiques, il y a de fortes chances pour qu'elles ne se connectent qu'une fois à un moment donné sur la base. Limiter son nombre d'accès simultané permet de prévenir des attaques de type DDOS.</p>

<p>Nous terminerons sur une question fréquemment posée : comment attribuer un droit à un rôle sur plusieurs objets en même temps. Cela n'est pas possible en SQL avec PostgreSQL. Le mieux revient à écrire un script shell qui créera le script SQL à exécuter. Disons que nous voulons donner un droit particulier à un utilisateur pour toutes les tables de la base métier. Pour cela, nous utilisons psql avec l'option -c&nbsp;:</p>

<pre>$psql -c "\dt" metier<br />                Liste des relations<br /> Schéma  |     Nom     | Type  | Propriétaire<br />---------+-------------+-------+---------------<br /> public  | facture     | table | postgres<br /> public  | fournisseur | table | postgres<br /> public  | client      | table | postgres<br />(3 lignes)</pre>

<p>Nous n'avons pas besoin de l'entête et du bas de page. Il faut utiliser l'option -t pour les supprimer&nbsp;:</p>

<pre>$ psql -t -c "\dt" galette<br /> public  | facture     | table | postgres<br /> public  | fournisseur | table | postgres<br /> public  | client      | table | postgres</pre>

<p>Le côté joliment affiché et les caractères | nous posent problème... il serait préférable d'avoir les différents champs séparés uniquement par un espace chacun&nbsp;:</p>

<pre>$ psql -F " " -A -t -c "\dt" galette<br />public facture table postgres<br />public fournisseur table postgres<br />public client table postgres</pre>

<p>Seul le nom de la table nous intéresse sur chaque ligne, donc nous allons utiliser l'outil awk pour récupérer le deuxième champ&nbsp;:</p>

<pre>$ psql -F " " -A -t -c "\dt" galette | awk '{ print $2; }'<br />facture<br />fournisseur<br />client</pre>

<p>Enfin, nous utiliserons une boucle pour afficher la commande SQL grant pour chaque table&nbsp;:</p>

<pre>psql -c "\dt" -A -t -F " " ma_base | awk '{ print $2; }' | while read ma_table<br />do<br />  echo "GRANT liste_droits ON $ma_table TO mon_role;"<br />done | psql ma_base</pre>

<p>Il est nécessaire de remplacer ma_base par le nom de la base impactée, et mon_role par le rôle devant avoir les nouveaux droits faisant partie de liste_droits.</p>

<p>Voilà, j'espère que cet article vous a intéressé. D'autres devraient suivre sur les nouveautés de PostgreSQL 8.1.</p>