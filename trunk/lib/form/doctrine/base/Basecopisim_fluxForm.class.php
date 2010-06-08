<?php

/**
 * copisim_flux form base class.
 *
 * @method copisim_flux getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basecopisim_fluxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'periode'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_periode'), 'add_empty' => false)),
      'ville'      => new sfWidgetFormInputText(),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'), 'add_empty' => false)),
      'total'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'periode'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_periode'))),
      'ville'      => new sfValidatorInteger(),
      'complement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'))),
      'total'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('copisim_flux[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'copisim_flux';
  }

}
