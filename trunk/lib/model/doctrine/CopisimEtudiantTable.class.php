<?php


class CopisimEtudiantTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimEtudiant');
    }

    public function checkValidMail($user)
    {
      $q = Doctrine_Query::create()
        ->from('CopisimEtudiant a')
	->select('a.email, a.email_tmp')
	->where('a.classement = ?', $user)
	->limit(1)
	->fetchOne();
      
      if (!$q->getEmail() or $q->getEmailTmp())
        return false;
      else
        return true;
    }

    public function getListeQuery()
    {
      $q = Doctrine_Query::create()
        ->from('CopisimEtudiant a')
	      ->leftJoin('a.CopisimFac b')
				->leftJoin('a.CopisimSimulation c')
				->leftJoin('c.CopisimPoste d')
				->leftJoin('d.CopisimFiliere e')
				->leftJoin('d.CopisimRegion f')
//      	->select('a.nom, a.prenom, a.anonyme, a.classement, b.titre')
      	->orderBy('a.classement asc');

      return $q;
    }

}
