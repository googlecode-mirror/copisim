<table>
  <tbody>
    <tr>
      <th>Id:</th>
      <td><?php echo $copisim_etudiant->getId() ?></td>
    </tr>
    <tr>
      <th>Nom:</th>
      <td><?php echo $copisim_etudiant->getNom() ?></td>
    </tr>
    <tr>
      <th>Prenom:</th>
      <td><?php echo $copisim_etudiant->getPrenom() ?></td>
    </tr>
    <tr>
      <th>Fac:</th>
      <td><?php echo $copisim_etudiant->getFac() ?></td>
    </tr>
    <tr>
      <th>Naissance:</th>
      <td><?php echo $copisim_etudiant->getNaissance() ?></td>
    </tr>
    <tr>
      <th>Email:</th>
      <td><?php echo $copisim_etudiant->getEmail() ?></td>
    </tr>
    <tr>
      <th>Anonyme:</th>
      <td><?php echo $copisim_etudiant->getAnonyme() ?></td>
    </tr>
    <tr>
      <th>Doublant:</th>
      <td><?php echo $copisim_etudiant->getDoublant() ?></td>
    </tr>
    <tr>
      <th>Classement:</th>
      <td><?php echo $copisim_etudiant->getClassement() ?></td>
    </tr>
    <tr>
      <th>Created at:</th>
      <td><?php echo $copisim_etudiant->getCreatedAt() ?></td>
    </tr>
    <tr>
      <th>Updated at:</th>
      <td><?php echo $copisim_etudiant->getUpdatedAt() ?></td>
    </tr>
  </tbody>
</table>

<hr />

<a href="<?php echo url_for('etudiant/edit?id='.$copisim_etudiant->getId()) ?>">Edit</a>
&nbsp;
<a href="<?php echo url_for('etudiant/index') ?>">List</a>
