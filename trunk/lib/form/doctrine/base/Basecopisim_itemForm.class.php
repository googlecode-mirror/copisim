<?php

/**
 * copisim_item form base class.
 *
 * @method copisim_item getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basecopisim_itemForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'      => new sfWidgetFormInputHidden(),
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_periode'), 'add_empty' => false)),
      'type'    => new sfWidgetFormInputText(),
      'titre'   => new sfWidgetFormInputText(),
    ));

    $this->setValidators(array(
      'id'      => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'periode' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_periode'))),
      'type'    => new sfValidatorString(array('max_length' => 20)),
      'titre'   => new sfValidatorString(array('max_length' => 255)),
    ));

    $this->widgetSchema->setNameFormat('copisim_item[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'copisim_item';
  }

}
