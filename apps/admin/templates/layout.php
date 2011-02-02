<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="fr" lang="fr">
  <head>
    <?php include_http_metas() ?>
    <?php include_metas() ?>
    <title><?php include_slot('title', 'COPIsim - Administration') ?></title>
    <link rel="shortcut icon" href="<?php echo $sf_request->getRelativeUrlRoot() ?>/images/favicon.ico" />
    <?php include_stylesheets() ?>
    <?php include_javascripts() ?>
  </head>
  <body>
    <div id="container">
      <div id="header">
	<span id="titre"><a href="<?php echo url_for('@homepage') ?>"><?php echo image_tag('copisim_logo.png', 'alt=COPIsim'); ?><h1> <?php echo csSettings::get('titre_du_site'); ?></h1></a></span>
	  
	<span id="menu">
	  <ul>
	      <li><a href="<?php echo url_for('copisim_periode/index'); ?>">Periode</a></li>
				<li><a href="<?php echo url_for('copisim_poste/index'); ?>">Poste</a></li>
				<li><a href="<?php echo url_for('copisim_fac/index'); ?>">Group</a></li>
				<li><a href="<?php echo url_for('copisim_etudiant/index'); ?>">Etudiant</a></li>
	      <li><?php echo link_to('Se déconnecter', 'sf_guard_signout'); ?></li>
	  </ul>
	</span>
      </div>
	
      <div id="content">
        <?php if ($sf_user->hasFlash('notice')): ?>
          <div class="flash_notice"><?php echo $sf_user->getFlash('notice') ?></div>
        <?php endif; ?>
        <?php if ($sf_user->hasFlash('error')): ?>
          <div class="flash_error"><?php echo $sf_user->getFlash('error') ?></div>
        <?php endif; ?>
    
        <div class="content">
           <?php echo $sf_content ?>
        </div>
      </div>
  
      <div id="footer">
        <div class="content">
	  <span class="miniature"><a href="http://code.google.com/p/copisim/"><?php echo image_tag('copisim_logo_small.png', 'alt=copisim'); ?></a> powered by <a href="http://www.symfony-project.org/"><?php echo image_tag('symfony.gif', 'alt=symfony framework'); ?></a></span>
	  <ul>
	    <li><a href="http://code.google.com/p/copisim/issues/list">Reporter un bug ou un souhait</a></li>
	    <li><a href="http://code.google.com/p/copisim/w/list">Assistance - documentation</a></li>
	    <li><a href="<?php echo $sf_request->getRelativeUrlRoot() ?>/admin.php">Administrer</a></li>
	  </ul>
	</div>
      </div>
    </div>
  </body>
</html>
