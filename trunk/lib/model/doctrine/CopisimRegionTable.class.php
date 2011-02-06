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
				->leftJoin('a.CopisimPoste c')
				->leftJoin('c.CopisimFiliere d')
				->leftJoin('c.CopisimSimulation e')
				->where('a.periode = ?', $periode)
				->orderBy('a.titre asc, d.titre asc, e.reste asc');
			
		  return $q->execute();
		}

		public function addRegionToSession()
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimPeriode a')
				->leftJoin('a.CopisimRegion b')
				->orderBy('a.id desc')
				->limit(2);
				
			$sessions = $q->execute();
			
			$new_session = $sessions->getFirst();
			$old_session = $sessions->getLast();
			$result = false;
			
			if($regions = $old_session->getCopisimRegion())
			{
				foreach($regions as $region)
				{
					$new_region = new CopisimRegion();
					$new_region->setPeriode($new_session->getId());
					$new_region->setTitre($region->getTitre());
					$new_region->save();
					$result .= $new_region->getTitre().", ";
				}
			}
			
			return $result;
		}

}
