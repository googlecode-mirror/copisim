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

		public function simulChoix($periode, $classement_etudiant = null)
		{
			$postes = Doctrine::getTable('CopisimPoste')->getPostesTableau($periode);

			$q = Doctrine_Query::create()
			  ->from('CopisimChoix a')
				->leftJoin('a.CopisimEtudiant b')
				->leftJoin('a.CopisimPoste c')
				->leftJoin('c.CopisimRegion d')
				->leftJoin('c.CopisimFiliere e')
				->orderBy('b.classement asc, a.ordre asc');

			$r = Doctrine_Query::create()
			  ->from('CopisimEtudiant a')
				->select('a.classement')
				->where('true')  // Retire de la requète les situations particulières de non participation à la simulation
				->orderBy('a.classement asc');

			if(null !== $classement_etudiant)
			{
				$q->where('b.classement <= ?', $classement_etudiant);
				$r->andWhere('a.classement <= ?', $classement_etudiant);
			}

			$choixs = $q->execute();
			$etudiants = $r->execute();

			$prev = '';
			$choix_etudiant = array();
			foreach($etudiants as $etudiant)
			  $choix_etudiant[$etudiant->getClassement()] = "Aucun choix valide";


			foreach($choixs as $choix)
			{
				if($prev === $choix->getCopisimEtudiant()->getClassement())
					continue;

				if($postes[$choix->getCopisimPoste()->getCopisimFiliere()->getTitre()][$choix->getCopisimPoste()->getCopisimRegion()->getTitre()] > 0)
				{
					$postes[$choix->getCopisimPoste()->getCopisimFiliere()->getTitre()][$choix->getCopisimPoste()->getCopisimRegion()->getTitre()]--;
					$choix_etudiant[$choix->getCopisimEtudiant()->getClassement()] = $choix->getCopisimPoste()->getCopisimFiliere()->getTitre()." à ".$choix->getCopisimPoste()->getCopisimRegion()->getTitre();
					$prev = $choix->getCopisimEtudiant()->getClassement();
					continue;
				}
			}

//			foreach($etudiants as $etudiant)
//			{
//				if(null === $choix_etudiant[$etudiant->getClassement()])
//					$choix_etudiant[$etudiant->getClassement()] = "Aucun choix valide";
//			}
			
			$tableau = array();
			$tableau['postes'] = $postes;
			$tableau['choix'] = $choix_etudiant;
			$tableau['absents'] = $this->countAbsentDesChoix($choix_etudiant);

  		return $tableau;
		}

    private function countAbsentDesChoix($choix)
		{
			$tableau = array();

			$count = array_count_values($choix);

			return $count['Aucun choix valide'];
		}
}
