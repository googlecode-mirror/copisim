<h1>Mes choix :</h1>

<div>Votre choix retenu par la simulation est : <em><?php echo $monchoix->getCopisimPoste()->getCopisimFiliere()->getTitre(); ?> à <?php echo $monchoix->getCopisimPoste()->getCopisimRegion()->getTitre(); ?></em>. Après vous, il reste encore <em><?php echo $monchoix->getReste(); ?> places</em> pour ce poste.</div>
<div><em><?php echo $absents; ?> personnes</em> devant vous n'ont pas de choix valide à ce jour.</div>

<div>
  <?php 
	  $n = 1;
	  foreach($copisim_choix as $choix): 
	?>
	  <div><?php echo $n; ?>. <?php echo $choix->getCopisimPoste()->getCopisimFiliere()->getTitre(); ?> à <?php echo $choix->getCopisimPoste()->getCopisimRegion()->getTitre(); ?> <a href="<?php echo url_for('etudiant/editchoix?up='.$choix->getId()); ?>"><?php echo image_tag('up.png', 'alt=monter'); ?></a> <a href="<?php echo url_for('etudiant/editchoix?down='.$choix->getId()); ?>"><?php echo image_tag('down.png', 'alt=descendre'); ?></a> <a href="<?php echo url_for('etudiant/editchoix?del='.$choix->getId()); ?>"><?php echo image_tag('del.png', 'alt=supprimer'); ?></a></div>
	<?php
	  $n++;
		endforeach;
	?>
</div>

<form action="<?php echo url_for('etudiant/updatechoix'); ?>" method="post">
  <div><?php echo $form->renderGlobalErrors(); ?></div>
  <div><?php echo $form; ?><input type="submit" value="Ajouter" /></div>
</form>

<div>Cliquer ici pour mettre à jour les valeurs de la simulation (attention cette étape peut prendre plusieurs minutes) : <a href="<?php echo url_for('etudiant/updatesimul'); ?>">simulation</a></div>
