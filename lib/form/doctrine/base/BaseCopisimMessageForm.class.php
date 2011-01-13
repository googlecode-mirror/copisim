<?php

/**
 * CopisimMessage form base class.
 *
 * @method CopisimMessage getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCopisimMessageForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'exp'        => new sfWidgetFormInputText(),
      'dest'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'), 'add_empty' => false)),
      'titre'      => new sfWidgetFormInputText(),
      'texte'      => new sfWidgetFormTextarea(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'exp'        => new sfValidatorInteger(),
      'dest'       => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'))),
      'titre'      => new sfValidatorString(array('max_length' => 50)),
      'texte'      => new sfValidatorString(),
      'created_at' => new sfValidatorDateTime(),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('copisim_message[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimMessage';
  }

}
