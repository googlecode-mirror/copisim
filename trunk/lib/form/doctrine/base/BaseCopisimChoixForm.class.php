<?php

/**
 * CopisimChoix form base class.
 *
 * @method CopisimChoix getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimChoixForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'etudiant'   => new sfWidgetFormInputText(),
      'poste'      => new sfWidgetFormInputText(),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'), 'add_empty' => false)),
      'ordre'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'etudiant'   => new sfValidatorInteger(),
      'poste'      => new sfValidatorInteger(),
      'complement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'))),
      'ordre'      => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('copisim_choix[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimChoix';
  }

}
