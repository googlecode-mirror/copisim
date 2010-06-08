<?php

/**
 * copisim_choix form base class.
 *
 * @method copisim_choix getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basecopisim_choixForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'etudiant'   => new sfWidgetFormInputText(),
      'poste'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_poste'), 'add_empty' => false)),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'), 'add_empty' => false)),
      'ordre'      => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'etudiant'   => new sfValidatorInteger(),
      'poste'      => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_poste'))),
      'complement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'))),
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
    return 'copisim_choix';
  }

}
