<?php

/**
 * CopisimReferent form base class.
 *
 * @method CopisimReferent getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCopisimReferentForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => false)),
      'nom'     => new sfWidgetFormInputText(),
      'email'   => new sfWidgetFormInputText(),
      'tel'     => new sfWidgetFormInputText(),
      'divers'  => new sfWidgetFormTextarea(),
      'fac'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'), 'add_empty' => false)),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'periode' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'))),
      'nom'     => new sfValidatorString(array('max_length' => 50)),
      'email'   => new sfValidatorString(array('max_length' => 100)),
      'tel'     => new sfValidatorString(array('max_length' => 10, 'required' => false)),
      'divers'  => new sfValidatorString(array('max_length' => 256, 'required' => false)),
      'fac'     => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'))),
    ));

    $this->widgetSchema->setNameFormat('copisim_referent[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimReferent';
  }

}
