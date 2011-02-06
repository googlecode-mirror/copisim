<?php

/**
 * EditPoste form.
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormTemplate.php 23810 2009-11-12 11:07:44Z Kris.Wallsmith $
*/

class EditPosteForm extends sfForm
{
	public function configure()
	{
		$this->addCSRFProtection(null);
	}

	public function embed($postes)
	{
		$i = 0;

		foreach($postes as $poste)
		{
			$sub_form = new CopisimPosteForm($poste);
			$sub_form->addCSRFProtection(null);
			$this->embedForm('poste_'.$i, $sub_form);
			$i++;
		}

		$this->widgetSchema->setNameFormat('editposte[%s]');
	}

	public function embeddedSave()
	{
		$forms = $this->getEmbeddedForms();
		$i = 0;

		foreach($forms as $form)
		{
			if($form instanceof sfFormObject && $form->getModelName() == 'CopisimPoste')
			{
        $object = $form->updateObject($this->getValue('poste_'.$i));
				$object->save();
				$i++;
			}
		}

		return true;
	}

	public function save($postes)
	{
		$i = 0;
		$count = 0;

		foreach($postes as $poste)
		{
echo " ".$this['poste_'.$i]->getValue('total');
			if($poste->getId() == $this['poste_'.$i]->getValue('id') && $poste->getTotal() != $this['poste_'.$i]->getValue('total'))
			{
				$poste->setTotal($this['poste_'.$i]->getValue('total'));
//				$poste->save();
				$count++;
echo ":save! ";
			}
			$i++;
		}

		return $count;
	}
}

