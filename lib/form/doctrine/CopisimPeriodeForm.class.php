<?php

/**
 * CopisimPeriode form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
 */
class CopisimPeriodeForm extends BaseCopisimPeriodeForm
{
  public function configure()
  {
		if(!$this->isNew())
		{
			$this->embedRelation('CopisimFiliere');
			$newFiliereForm = new CopisimFiliereForm();
			$this->embedForm('filiere', $newFiliereForm);

			$this->embedRelation('CopisimRegion');
			$newRegionForm = new CopisimRegionForm();
			$this->embedForm('region', $newRegionForm);
		}
  }

	public function doBind(array $values)
	{
		if('' === trim($values['filiere']['titre']))
			unset($values['filiere'], $this['new']);

		if('' === trim($values['region']['titre']))
			unset($values['region'], $this['region']);

		parent::doBind($values);
	}
}
