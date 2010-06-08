<h1>Copisim etudiants List</h1>

<table>
  <thead>
    <tr>
      <th>Id</th>
      <th>Nom</th>
      <th>Prenom</th>
      <th>Fac</th>
      <th>Naissance</th>
      <th>Email</th>
      <th>Anonyme</th>
      <th>Doublant</th>
      <th>Classement</th>
      <th>Created at</th>
      <th>Updated at</th>
    </tr>
  </thead>
  <tbody>
    <?php foreach ($copisim_etudiants as $copisim_etudiant): ?>
    <tr>
      <td><a href="<?php echo url_for('etudiant/show?id='.$copisim_etudiant->getId()) ?>"><?php echo $copisim_etudiant->getId() ?></a></td>
      <td><?php echo $copisim_etudiant->getNom() ?></td>
      <td><?php echo $copisim_etudiant->getPrenom() ?></td>
      <td><?php echo $copisim_etudiant->getFac() ?></td>
      <td><?php echo $copisim_etudiant->getNaissance() ?></td>
      <td><?php echo $copisim_etudiant->getEmail() ?></td>
      <td><?php echo $copisim_etudiant->getAnonyme() ?></td>
      <td><?php echo $copisim_etudiant->getDoublant() ?></td>
      <td><?php echo $copisim_etudiant->getClassement() ?></td>
      <td><?php echo $copisim_etudiant->getCreatedAt() ?></td>
      <td><?php echo $copisim_etudiant->getUpdatedAt() ?></td>
    </tr>
    <?php endforeach; ?>
  </tbody>
</table>

  <a href="<?php echo url_for('etudiant/new') ?>">New</a>
