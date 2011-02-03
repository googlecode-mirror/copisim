<?php


class CopisimPeriodeTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimPeriode');
    }

		public function getLastPeriode()
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimPeriode a')
				->orderBy('a.id desc')
				->limit(1);

			return $q->fetchOne()->getAnnee();
		}

		public function getActivePeriode()
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimPeriode a')
				->where('a.date_debut < ?', 'CURDATE()')
				->limit(1);

			return $q->fetchOne()->getAnnee();
		}

		public function listPeriodeFiliereRegion(Doctrine_Query $q)
		{
			$rootAlias = $q->getRootAlias();
			$q->leftJoin($rootAlias . '.CopisimFiliere c');
			$q->leftJoin($rootAlias . '.CopisimRegion d');
			return $q;
		}
}
