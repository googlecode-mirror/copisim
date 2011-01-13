<?php

/**
 * CopisimFlux form base class.
 *
 * @method CopisimFlux getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCopisimFluxForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'periode'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => false)),
      'ville'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimRegion'), 'add_empty' => false)),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFiliere'), 'add_empty' => false)),
      'total'      => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'periode'    => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'))),
      'ville'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimRegion'))),
      'complement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFiliere'))),
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
