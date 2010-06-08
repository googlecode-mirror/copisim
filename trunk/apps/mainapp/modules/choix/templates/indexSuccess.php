<h1>Copisim choixs List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Etudiant</th>
      <th>Poste</th>
      <th>Complement</th>
      <th>Ordre</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($copisim_choixs as $copisim_choix): ?>
    <tr>
      <td><a href="<?php echo url_for('choix/show?id='.$copisim_choix->getId()) ?>"><?php echo $copisim_choix->getId() ?></a></td>
      <td><?php echo $copisim_choix->getEtudiant() ?></td>
      <td><?php echo $copisim_choix->getPoste() ?></td>
      <td><?php echo $copisim_choix->getComplement() ?></td>
      <td><?php echo $copisim_choix->getOrdre() ?></td>
      <td><?php echo $copisim_choix->getCreatedAt() ?></td>
      <td><?php echo $copisim_choix->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('choix/new') ?>">New</a>
