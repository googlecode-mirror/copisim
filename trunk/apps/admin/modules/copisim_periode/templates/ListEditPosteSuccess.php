<form action="<?php echo url_for('copisim_periode/ListCreatePoste?id='.$periode); ?>" method="post">
<input type="hidden" name="sf_method" value="get" />
<?php echo $form['_csrf_token']->render(); echo $form->renderGlobalErrors(); ?>
<table>
  <thead>
    <tr>
	    <th></th>
	    <?php foreach($filieres as $filiere): ?>
	      <th><?php echo $filiere->getTitre(); ?></th>
  		<?php endforeach; ?>
	  </tr>
	</thead>
	<tfoot>
	  <tr>
		  <td><input type="submit" value="Enregistrer"></td>
		</tr>
	</tfoot>
	<tbody>
	  <?php $i = 0; foreach($regions as $region): ?>
		  <tr>
			  <th><?php echo $region->getTitre(); ?></th>
			  <?php foreach($filieres as $filiere): ?>
				<td><?php echo $form['poste_'.$i]['total']; echo $form['poste_'.$i]->renderHiddenFields(); $i++; ?></td>
				<?php endforeach; ?>
			</tr>
		<?php endforeach; ?>
	</tbody>
</table>
</form>
