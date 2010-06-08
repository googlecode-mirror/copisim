<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $copisim_choix->getId() ?></td>
    </tr>
    <tr>
      <th>Etudiant:</th>
      <td><?php echo $copisim_choix->getEtudiant() ?></td>
    </tr>
    <tr>
      <th>Poste:</th>
      <td><?php echo $copisim_choix->getPoste() ?></td>
    </tr>
    <tr>
      <th>Complement:</th>
      <td><?php echo $copisim_choix->getComplement() ?></td>
    </tr>
    <tr>
      <th>Ordre:</th>
      <td><?php echo $copisim_choix->getOrdre() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $copisim_choix->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $copisim_choix->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('choix/edit?id='.$copisim_choix->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('choix/index') ?>">List</a>
