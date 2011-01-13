<?php

/**
 * CopisimFlux filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCopisimFluxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => true)),
      'ville'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimRegion'), 'add_empty' => true)),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFiliere'), 'add_empty' => true)),
      'total'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'periode'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPeriode'), 'column' => 'id')),
      'ville'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimRegion'), 'column' => 'id')),
      'complement' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimFiliere'), 'column' => 'id')),
      'total'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('copisim_flux_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimFlux';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'periode'    => 'ForeignKey',
      'ville'      => 'ForeignKey',
      'complement' => 'ForeignKey',
      'total'      => 'Number',
    );
  }
}
