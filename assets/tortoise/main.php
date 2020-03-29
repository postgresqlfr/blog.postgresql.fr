<?php
/**
 * DokuWiki Default Template
 *
 * This is the template you need to change for the overall look
 * of DokuWiki.
 *
 * You should leave the doctype at the very top - It should
 * always be the very first line of a document.
 *
 * @link   http://wiki.splitbrain.org/wiki:tpl:templates
 * @author Andreas Gohr <andi@splitbrain.org>
 */

// must be run from within DokuWiki
if (!defined('DOKU_INC')) die();

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN"
 "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="<?php echo $conf['lang']?>"
 lang="<?php echo $conf['lang']?>" dir="<?php echo $lang['direction']?>">
<head>
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <meta name="google-site-verification" content="h8aqZFZxWbkuVTGdbzBfvjiPhf9uWF1MjhyGqNF9Pyk" />
  <title>
    <?php tpl_pagetitle()?>
    [<?php echo strip_tags($conf['title'])?>]
  </title>
 <?php tpl_metaheaders()?>

  <link rel="shortcut icon" href="<?php echo DOKU_TPL?>images/favicon.ico" />

  <?php /*old includehook*/ @include(dirname(__FILE__).'/meta.html')?>

  <style type="text/css" media="screen">
@import url(http://blog.postgresql.fr/themes/postgresql/style.css);
</style>
<style type="text/css" media="print">
@import url(http://blog.postgresql.fr/themes/postgresql/../default/print.css);
</style>
<?php
if (file_exists(DOKU_PLUGIN.'googleanalytics/code.php')) include_once(DOKU_PLUGIN.'googleanalytics/code.php');
if (function_exists('ga_google_analytics_code')) ga_google_analytics_code();
?>
</head>

<body>


<?php /*old includehook*/ @include(dirname(__FILE__).'/topheader.html')?>
<div class="dokuwiki">
  <?php html_msgarea()?>

  <div class="stylehead">


    <?php if($conf['breadcrumbs']){?>
    <div class="breadcrumbs">
      <?php tpl_breadcrumbs()?>
      <?php //tpl_youarehere() //(some people prefer this)?>
    </div>
    <?php }?>

    <?php if($conf['youarehere']){?>
    <div class="breadcrumbs">
      <?php tpl_youarehere() ?>
    </div>
    <?php }?>

  </div>
  <?php flush()?>

  <?php /*old includehook*/ @include(dirname(__FILE__).'/pageheader.html')?>

<div id="pgContent">

<div id="pgSideWrap">
<div id="pgLogo">
	<center>
	<img src="<?php echo DOKU_TPL?>images/logo_pgfr_sans_100.png" />
	</center>
<!--        
<center>
        <a href="http://pgday.fr" title="PG Day France 2013"><img src="<?php echo DOKU_TPL?>images/logo_pgday_2013.png" />
	</a
        </center>
-->
</div>
<br/>
<div id="pgSideNav">
<div id="follow">
<h2>Suivez-Nous !</h2>
<!-- Go to www.addthis.com/dashboard to customize your tools -->
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-56508701d4d918cd" async="async"></script>

<!-- Go to www.addthis.com/dashboard to customize your tools -->
<div class="addthis_vertical_follow_toolbox"></div>

<a class="addthis_button_linkedin_follow" addthis:usertype="group" addthis:userid="8187772"> &nbsp;Linkedin</a>

<!--
<a href="https://twitter.com/PostgreSQLFr" class="twitter-follow-button" data-show-count="false" data-lang="fr">Suivre @PostgreSQLFr</a>
<script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0];if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src="//platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
</div>
<br/>
<script src="https://apis.google.com/js/platform.js"></script>

<div class="g-ytsubscribe" data-channelid="UCR7skKC85Zn6p7fJ-lW7G8g" data-layout="default" data-count="hidden"></div>

<br/>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<g:follow href="https://plus.google.com/106731056161480789338" annotation="none" rel="{relationshipType}"></g:follow>


-->
</div>
<br/>
<div id="pgSideNav">
    <div id="blognav">
    <div>
	<h2>Utilisateur</h2>
        <ul>
	<li>
	<?php tpl_actionlink('subscription')?>
        </li><li>
	<?php tpl_actionlink('admin')?>
        </li><li>
	<?php tpl_actionlink('profile')?>
        </li><li>
	<?php tpl_actionlink('login')?>
   	</li>
	</ul>
	 </div>
	</br>
    </div>
   </div>
<br/>

    <div id="pgSideNav">

     <div id="blogextra">
       <div>
	<h2>Page</h2>
	 <ul>
	 <li>  
      <?php tpl_actionlink('edit')?>
         </li><li>
	<?php tpl_actionlink('history')?> </li><li>

       <?php tpl_actionlink('recent')?>
 	</li>
	</ul>
	<br/>
        </div>
        </div>
        </div>
<br/>


  <div id="pgSideNav">
    <div>
        <h2>Langue</h2>
        <?php
        $translation = &plugin_load('syntax','translation');
        echo $translation->_showTranslations();
        ?>
	<br/><br/> 
	</div>
        </br>
   </div>
<br/>


    <div id="pgSideNav">
<div id="search"><h2>Rechercher</h2>
    
    <?php tpl_searchform()?>&nbsp;
</div>
    </div>
     
  </div>
</div>


  <div id="pgContentWrap">
  <div id="pgDownloadsWrap">
  <div id="content">

  <div class="page">
    <!-- wikipage start -->
    <?php tpl_content()?>
    <!-- wikipage stop -->
  </div>
  </div>
  </div>
  </div>
  <div class="clearer">&nbsp;</div>

  <?php flush()?>

  <div class="stylefoot">

    <div class="meta">
      <div class="user">
        <?php tpl_userinfo()?>
      </div>
      <div class="doc">
        <?php tpl_pageinfo()?>
      </div>
    </div>

   <?php /*old includehook*/ @include(dirname(__FILE__).'/pagefooter.html')?>


  </div>
</div>
</div>

<div class="no"><?php /* provide DokuWiki housekeeping, required in all templates */ tpl_indexerWebBug()?></div>
</body>
</html>
