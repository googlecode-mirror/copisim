<?php

/**
 * CopisimChoix form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */

class CopisimChoixForm extends BaseCopisimChoixForm
{
  public function configure()
  {
    $this->useFields(array('id', 'poste'));

    $query_poste = Doctrine_Query::create()
		  ->from('CopisimPoste a')
			->leftJoin('a.CopisimFiliere b')
			->leftJoin('a.CopisimRegion c')
			->orderBy('b.titre asc, c.titre asc');
		
		$this->widgetSchema['poste']->setOption('query', $query_poste);
//		$this->widgetSchema['poste']->setOption('add_empty', '');
    $this->validatorSchema['poste']->setOption('query', $query_poste);
  }
}
