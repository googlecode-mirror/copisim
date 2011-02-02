<?php


class CopisimPosteTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimPoste');
    }

		public function getPostesParPeriode($periode)
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimPoste a')
				->leftJoin('a.CopisimPeriode b')
				->leftJoin('a.CopisimFiliere c')
				->leftJoin('a.CopisimRegion d')
				->where('b.annee = ?', $periode)
				->orderBy('d.titre asc, c.titre asc');
		  
			return $q->execute();
		}

		public function getPostesTableau($periode)
		{
			$object = $this->getPostesParPeriode($periode);
			$tableau = array();

			foreach($object as $poste)
				$tableau[$poste->getCopisimFiliere()->getTitre()][$poste->getCopisimRegion()->getTitre()] = $poste->getTotal();

			return $tableau;
		}

		public function getPostesIdTableau($periode)
		{
			$object = $this->getPostesParPeriode($periode);
			$tableau = array();

			foreach($object as $poste)
				$tableau[$poste->getId()] = $poste->getTotal();

			return $tableau;
		}
}
