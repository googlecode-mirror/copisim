<?php


class CopisimChoixTable extends Doctrine_Table
{
    
    public static function getInstance()
    {
        return Doctrine_Core::getTable('CopisimChoix');
    }

		public function getEtudiantChoix($etudiant)
		{
			$q = Doctrine_Query::create()
			  ->from('CopisimChoix a')
				->leftJoin('a.CopisimPoste b')
				->leftJoin('b.CopisimRegion c')
				->leftJoin('b.CopisimFiliere d')
//				->select('a.id, c.titre, d.titre, a.ordre')
				->where('a.etudiant = ?', $etudiant)
				->andWhere('a.ordre != ?', '0')
				->orderBy('a.ordre');

			return $q->execute();
		}

		public function setEtudiantChoixUp($etudiant, $choix)
		{
			$c = Doctrine_Query::create()
			  ->from('CopisimChoix a')
				->select('a.ordre')
				->where('id = ?', $choix)
				->limit(1)
				->fetchOne();

			$cur = $c->getOrdre();
			$prev = $cur - 1;

			if($cur > 1)
			{
				Doctrine_Query::create()
				  ->update('CopisimChoix a')
					->set('a.ordre', '?', $cur)
					->where('a.etudiant = ?', $etudiant)
					->andWhere('a.ordre = ?', $prev)
					->limit(1)
					->execute();

				Doctrine_Query::create()
				  ->update('CopisimChoix a')
					->set('a.ordre', '?', $prev)
					->where('a.id = ?', $choix)
					->limit(1)
					->execute();
			}
		}

		public function setEtudiantChoixDown($etudiant, $choix)
		{
      $c = Doctrine_Query::create()
			  ->from('CopisimChoix a')
				->select('a.ordre')
				->where('id = ?', $choix)
				->limit(1)
				->fetchOne();
				
			$cur = $c->getOrdre();
			$next = $cur + 1;
			
//			if(1 >== $prev)
//			{
				Doctrine_Query::create()
				  ->update('CopisimChoix a')
					->set('a.ordre', '?', $cur)
					->where('a.etudiant = ?', $etudiant)
					->andWhere('a.ordre = ?', $next)
					->limit(1)
					->execute();
				
				Doctrine_Query::create()
				  ->update('CopisimChoix a')
					->set('a.ordre', '?', $next)
					->where('a.id = ?', $choix)
					->limit(1)
					->execute();
//			}
		}

		public function setEtudiantChoixDel($etudiant, $choix)
		{
			Doctrine_Query::create()
			  ->update('CopisimChoix a')
				->set('a.ordre', '?', '0')
				->where('a.id = ?', $choix)
				->limit(1)
				->execute();
		}

		public function cascadeEtudiantChoixDown($etudiant)
		{
			Doctrine_Query::create()
			  ->update('CopisimChoix a')
				->set('a.ordre', 'a.ordre + 1')
				->where('a.etudiant = ?', $etudiant)
				->execute();
		}
}
