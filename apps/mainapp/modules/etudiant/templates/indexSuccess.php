<h1>Liste des étudiants</h1>

<table>
  <thead>
    <tr>
      <th>Classement</th>
      <th>Nom</th>
      <th>Faculté</th>
			<?php if($sf_user->isAuthenticated()): ?>
			  <th>Choix</th>
			<?php endif; ?>
    </tr>
  </thead>
  <tbody>
    <?php foreach($pager->getResults() as $copisim_etudiant): ?>
    <tr>
      <td><?php echo $copisim_etudiant->getClassement() ?></td>
      <td>
        <?php if($copisim_etudiant->getAnonyme()): ?>
          ***anonyme***
        <?php else: ?>
      	  <?php echo $copisim_etudiant->getNom()." ".$copisim_etudiant->getPrenom() ?>
				<?php endif; ?>
      </td>
      <td><?php echo $copisim_etudiant->getCopisimFac()->getTitre(); ?></td>
			<?php if($sf_user->isAuthenticated()): ?>
			  <td>
				  <?php if($copisim_etudiant->getCopisimSimulation()): ?>
				    <?php foreach($copisim_etudiant->getCopisimSimulation() as $simul): ?>
						  <?php if($simul->getCopisimPoste()): ?>
							  <?php echo $simul->getCopisimPoste()->getCopisimFiliere()->getTitre(); ?> à <?php echo $simul->getCopisimPoste()->getCopisimRegion()->getTitre(); ?>
							<?php else: ?>
							  aucun choix valide
							<?php endif; ?>
						<?php endforeach; ?>
					<?php else: ?>
					  hors simulation
					<?php endif; ?>
				</td>
			<?php endif; ?>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

<?php if ($pager->haveToPaginate()): ?>
  <div class="pagination">
    <a href="<?php echo url_for('etudiant/index'); ?>?page=1"><<</a>
    <a href="<?php echo url_for('etudiant/index'); ?>?page=<?php echo $pager->getPreviousPage() ?>"><</a>
    
    <?php foreach ($pager->getLinks() as $page): ?>
      <?php if ($page == $pager->getPage()): ?>
        <?php echo $page ?>
      <?php else: ?>
        <a href="<?php echo url_for('etudiant/index'); ?>?page=<?php echo $page ?>"><?php echo $page ?></a>
      <?php endif; ?>
    <?php endforeach; ?>
    
    <a href="<?php echo url_for('etudiant/index'); ?>?page=<?php echo $pager->getNextPage() ?>">></a>
    
    <a href="<?php echo url_for('etudiant/index'); ?>?page=<?php echo $pager->getLastPage() ?>">>></aa>
  </div>
<?php endif; ?>

<div class="pagination_desc">
  <strong><?php echo count($pager) ?></strong> étudiants classés
  
  <?php if ($pager->haveToPaginate()): ?>
    - page <strong><?php echo $pager->getPage() ?>/<?php echo $pager->getLastPage() ?></strong>
  <?php endif; ?>
</div>
