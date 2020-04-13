---
layout: post
title: "Tutoriel pour installer PostgreSQL et pgacces sous Mandrake et paramétrer les logiciels pour qu&#39;ils fonctionnent ensemble"
author: "siruphi"
redirect_from: "index.php?post/drupal-13 "
---


<p></p>

<!--more-->


<h2>Rapide introduction</h2>

<p>Ce tutoriel est spécialement rédigé par un débutant pour des débutants sous Mandrake. Il ne se veut absolument pas exhaustif des méthodes d'installation et de configuration de PostgreSQL et de pgaccess. En effet, de très bons articles sont déjà présents sur Internet mais nécessitent des connaissances avancées en informatique qu'un débutant avec Linux, comme moi, ne comprend pas toujours.</p>

<!--break-->

<h3> Compétence requise </h3>

<p>Nous allons avoir besoin de modifier un  fichier texte appartenant à d'autres utilisateurs (au super-utilisateur root par exemple) et il faut savoir le faire sans relancer la session graphique en cours, directement à la console. </p>

<p>Pour cela, nous allons utiliser l'éditeur vi qui est généralement installé par défaut sur Mandrake. Il se lance dans une console en écrivant en ligne de commandes&nbsp;: </p>

<code>vi fichier</code>

<p>vi peut sembler repoussant à la première utilisation pour un débutant, mais c'est un éditeur très convivial. Pour le prendre en main, un tutoriel existe. Il nécessite d'installer vim. Suivez-le et en deux minutes vous en saurez assez pour réaliser ce que nous vous proposons. Le tutoriel se lance en marquant en ligne de commande&nbsp;: </p>

<code>vim tutor</code>

<p>Le début vous apprend à supprimer et à insérer des caractères dans le texte. Vous pouvez continuer mais pensez bien que cette compétence vous sera acquise à jamais&nbsp;! </p>

<h2> Installation des logiciels </h2>

<h3>Installation de PostgreSQL</h3>

<p>En guise d'installation, nous n'allons pas faire compliqué (nous sommes débutants, souvenez-vous). Nous installons toutes les archives RPM contenues dans les CD Mandrake comportant le mot postgresql. Mais, les deux paquetages suivants devraient suffire&nbsp;:  </p>

<ul>

<li>postgresql-7.3.4-2mdk,</li>

<li>postgresql-server-7.3.4-2mdk.</li>

</ul>

<p>Les numéros de versions auront peut-être changé à l'heure où vous lirez ces lignes. </p>

<p>Attribuons-nous tout de suite le droit d'utiliser PostgreSQL en créant un utilisateur à notre nom (disons MonNom). Voici les commandes à lancer&nbsp;: </p>

<code>su<br />

su postgres<br />

createuser MonNom</code>

<p><em>Attention</em>, bien qu'il soit tout à fait possible de créer un utilisateur dont le nom comprend des majuscules, cela n'est pas conseillé. En effet, le serveur PostgreSQL fait une distinction très particulière entre minuscules et majuscules. La commande drop user monnom ne fonctionnera pas plus que la commande drop user MonNom si vous avez précédemment créé l'utilisateur MonNom. Il faudra lancer la commande drop user "MonNom" (c'est-à-dire que le nom doit être entre guillemets si celui-ci comporte des majuscules). Nous utilisons ici des majuscules pour faciliter la lecture.</p>

<p>Cet utilitaire vous demandera tout d'abord si le nouvel utilisateur a le droit de créer des bases de données. Répondez y (pour yes, oui), cela vous permettra de créer autant de bases de données que vous le souhaitez. La deuxième, et dernière question, concerne le droit de création des utilisateurs. Il est préférable de répondre non à cette question pour des raisons de sécurité mais quelle que soit votre réponse, elle n'influera pas sur la suite de ce tutoriel. </p>

<h3>Installation de pgaccess</h3>

<p>Pgaccess ne nécessite pas vraiment d'installation, étonnant n'est-ce pas&nbsp;! <a href="http://www.pgaccess.org/index.php?page=Download">Voici où le télécharger</a>. Pour un débutant, prendre le fichier nommé Hardcore (gzipped source tarball) car il ne nécessite aucune compilation. </p>

<p>Une fois l'archive téléchargée, décompressez-la où vous voulez. Vous y trouverez le fichier pgaccess.tcl qu'il suffit de lancer pour accéder à pgaccess. Voici comment faire&nbsp;: </p>

<code>sh pgaccess.tcl</code>

<p>Si vous utilisez l'interface KDE, vous pouvez mettre tout simplement un raccourci vers pgaccess.tcl dans le tableau de bord (par glisser-déposer). C'est bien plus pratique. </p>

<h2> Paramétrage des logiciels </h2>

<p>Nous sommes pratiquement prêt à utiliser PostgreSQL et pgaccess. Mais, des petites modifications sont nécessaires dans les fichiers pg_hba.conf et postgresql.conf. C'est maintenant que la compétence du début va nous servir. </p>

<p>Ouvrons une console (par exemple, avec l'application Konsole) et connectons-nous en tant qu'utilisateur root&nbsp;: </p>

<code>su</code>

<p>Créons un mot de passe pour l'utilisateur postgres (je suppose que vous ne l'avez pas encore fait)&nbsp;: </p>

<code>passwd postgres</code>

<p>Connectons-nous maintenant en tant qu'utilisateur postgres (c'est très important, il ne faut surtout pas être l'utilisateur root pour effectuer la suite). </p>

<code>su - postgres</code>

<p>Aucun mot de passe ne vous est demandé. En effet, comme nous sommes l'utilisateur root, nous sommes administrateur et cet état nous affanchit du besoin du mot de passe. </p>

<p>Allons maintenant dans le répertoire où se trouvent les fichiers à modifier. </p>

<code>cd /var/lib/pgsql/data</code>

<p>Commençons par pg_hba.conf&nbsp;: </p>

<code>vi pg_hba.conf</code>

<p>Le fichier est composé en deux parties. Celle du haut explique dans la langue de Shakespeare l'utilité de ce fichier et la façon de l'utiliser. Vous pouvez la lire mais, pour ce qui nous concerne, la fin du fichier nous intéresse, nous avons besoin de supprimer le caractère # en début de ligne, ce symbole étant un caractère de commentaire, pour les trois lignes en bas du fichier, certainement les trois dernières lignes. </p>

<code>

# local all all trust<br />

# host all all 127.0.0.1 255.255.255.255 trust<br />

# Using sockets credentials for improved security. Not available everywhere,<br />

# but works on Linux, *BSD (and probably some others)<br />

# local all all ident sameuser</code>

<p>Ces lignes deviennent&nbsp;: </p>

<code>local all all trust<br />

host all all 127.0.0.1 255.255.255.255 trust<br />

# Using sockets credentials for improved security. Not available everywhere,<br />

# but works on Linux, *BSD (and probably some others)<br />

local all all ident sameuser</code>

<p>Cela fait, on sauvegarde le fichier avec la commande <code>:wq</code> et on passe au suivant avec la commande&nbsp;: </p>

<code>vi postgresql.conf</code>

<p>Deux lignes dans le haut du fichier doivent subir le même sort, à savoir supprimer le caractère # en début de ligne. Plus exactement, elles se trouvent dans la partie Connection Parameters, ces lignes sont tcpip_socket = true et port = 5432. Voici en détail ce que ça donne&nbsp;: </p>

<code># Connection Parameters <br />

# <br />

#tcpip_socket = true<br />

#ssl = false<br />

#max_connections = 32<br />

#superuser_reserved_connections = 2<br />

#port = 5432</code>

<p>qui devient&nbsp;: </p>

<code># Connection Parameters <br />

#<br />

tcpip_socket = true<br />

#ssl = false<br />

#max_connections = 32<br />

#superuser_reserved_connections = 2<br />

port = 5432</code>

<p>Cela étant fait, enregistrons le fichier (là-encore, commande <tt>:wq</tt>). </p>

<p>Voilà voilà, c'est fini&nbsp;! Testons PostgreSQL pour voir si cela fonctionne bien. </p>

<p>Commençons par quitter la connexion de l'utilisateur postgres en tapant la commande&nbsp;: </p>

<code>exit</code>

<p>Pour utiliser PostgreSQL, je vous renvoie pour le moment vers le <a href="http://traduc.postgresqlfr.org/pgsql-fr/tutorial.html">tutoriel complet du manuel de la version 7.4</a>.

</p>

<h3> Des liens utiles </h3>

<ul>

<li>

<a href="http://www.linux-france.org/article/devl/PostgresSQL-Web/">Mise en place de relation SQL/Web</a>

</li>

<li>

<a href="http://www.linux-france.org/article/serveur/psql/tutor/">Tutoriel PostgreSQL 6.5</a>

</li>

<li>

<a href="http://postgresqlfr.org/">le site Français sur postgreSQL</a>

</li>

</ul>

<p>Et pour finir, <a href="http://traduc.postgresqlfr.org/ml.html">les inévitables listes de discussion</a> où  vous trouverez la liste française pour pouvoir poser vos questions ou faire des remarques sur cet article.</p>