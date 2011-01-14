<h1>État des postes restants</h1>

<div>Dans ce tableau est affiché : les postes restants / les postes proposés.</div>

<table>
  <thead>
    <tr>
		  <th></th>
		  <?php foreach($copisim_filieres as $filiere): ?>
      <th><?php echo $filiere->getTitre(); ?></th>
			<?php endforeach; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($copisim_regions as $region): ?>
    <tr>
		  <td><?php echo $region->getTitre(); ?></td>
		  <?php foreach ($copisim_filieres as $filiere): ?>
      <td>
			  <?php
					echo $simul_postes[$filiere->getTitre()][$region->getTitre()];
				?>
				 / 
			  <?php 
				  if(null !== $copisim_postes[$filiere->getTitre()][$region->getTitre()]):
						echo $copisim_postes[$filiere->getTitre()][$region->getTitre()];
					else:
						echo '0';
					endif;
				?>
			</td>
			<?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

