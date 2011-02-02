<?php


class CopisimRegionTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimRegion');
    }

		public function getRegionsParPeriode($periode)
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimRegion a')
				->leftJoin('a.CopisimPeriode b')
				->leftJoin('a.CopisimPoste c')
				->leftJoin('c.CopisimFiliere d')
				->leftJoin('c.CopisimSimulation e')
				->where('b.annee = ?', $periode)
				->orderBy('a.titre asc, d.titre asc, e.reste asc');
			
		  return $q->execute();
		}

}
