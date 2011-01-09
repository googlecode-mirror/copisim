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
}
