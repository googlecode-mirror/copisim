<?php

/**
 * CopisimSimulation form base class.
 *
 * @method CopisimSimulation getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCopisimSimulationForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'       => new sfWidgetFormInputHidden(),
      'etudiant' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'), 'add_empty' => false)),
      'poste'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPoste'), 'add_empty' => true)),
      'reste'    => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'       => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'etudiant' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'))),
      'poste'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPoste'), 'required' => false)),
      'reste'    => new sfValidatorInteger(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('copisim_simulation[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimSimulation';
  }

}
