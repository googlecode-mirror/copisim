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
    <?php $i=1; $total_restant=0; $total=0; foreach ($copisim_regions as $region): ?>
    <tr>
		  <td><?php echo $region->getTitre(); ?></td>
		  <?php foreach ($region->getCopisimPoste() as $poste): ?>
      <td>
			  <?php 
				  if($poste->getCopisimSimulation()->getFirst()):
				    echo $poste->getCopisimSimulation()->getFirst()->getReste();
						$total_restant += $poste->getCopisimSimulation()->getFirst()->getReste();
					else:
						echo $poste->getTotal();
					endif;
					$total += $poste->getTotal(); ?>
				 / 
			  <?php echo $poste->getTotal(); ?>
			</td>
			<?php endforeach; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>
<div>Soit <?php echo $total_restant; ?> postes restants sur <?php echo $total; ?> postes proposés.</div>
