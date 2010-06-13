<?php

/**
 * CopisimFlux form base class.
 *
 * @method CopisimFlux getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimFluxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'periode'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => false)),
      'ville'      => new sfWidgetFormInputText(),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'), 'add_empty' => false)),
      'total'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'periode'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'))),
      'ville'      => new sfValidatorInteger(),
      'complement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'))),
      'total'      => new sfValidatorInteger(),
    ));

    $this->widgetSchema->setNameFormat('copisim_flux[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimFlux';
  }

}
