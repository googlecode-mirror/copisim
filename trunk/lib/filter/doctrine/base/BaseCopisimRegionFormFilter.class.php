<?php

/**
 * CopisimRegion filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCopisimRegionFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => true)),
      'titre'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'periode' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPeriode'), 'column' => 'id')),
      'titre'   => new sfValidatorPass(array('required' => false)),
    ));

    $this->widgetSchema->setNameFormat('copisim_region_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimRegion';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'periode' => 'ForeignKey',
      'titre'   => 'Text',
    );
  }
}
