<?php


class CopisimFiliereTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimFiliere');
    }

		public function getFilieresParPeriode($periode)
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimFiliere a')
				->leftJoin('a.CopisimPeriode b')
				->where('b.annee = ?', $periode)
				->orderBy('a.titre asc');

			return $q->execute();
		}

		public function addFiliereToSession()
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimPeriode a')
				->leftJoin('a.CopisimFiliere b')
				->orderBy('a.id desc')
				->limit(2);

			$sessions = $q->execute();

			$new_session = $sessions->getFirst();
			$old_session = $sessions->getLast();
			$result = false;

			if($filieres = $old_session->getCopisimFiliere())
			{
				foreach($filieres as $filiere)
				{
					$new_filiere = new CopisimFiliere();
					$new_filiere->setPeriode($new_session->getId());
					$new_filiere->setTitre($filiere->getTitre());
					$new_filiere->save();
					$result .= $new_filiere->getTitre().", ";
				}
			}

			return $result;
	  }

}
