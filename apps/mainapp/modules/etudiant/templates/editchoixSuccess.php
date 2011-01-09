<h1>Mes choix :</h1>

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
  <table>
    <tfoot>
      <tr>
        <td colspan="3"><input type="submit" value="Enregistrer" /></td>
      </tr>
    </tfoot>
    <tbody>
      <tr>
        <td><?php echo $form->renderHiddenFields(); ?></td>
	<td><?php echo $form->renderGlobalErrors(); ?></td>
      </tr>
      <tr>
        <td><?php echo $form; ?></td>
      </tr>
    </tbody>
  </table>
</form>

