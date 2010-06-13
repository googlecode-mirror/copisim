<?php

/**
 * CopisimItem filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimItemFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => true)),
      'type'    => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'titre'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'periode' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPeriode'), 'column' => 'id')),
      'type'    => new sfValidatorPass(array('required' => false)),
      'titre'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('copisim_item_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimItem';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'periode' => 'ForeignKey',
      'type'    => 'Text',
      'titre'   => 'Text',
    );
  }
}
