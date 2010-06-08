<?php

/**
 * copisim_flux filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basecopisim_fluxFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_periode'), 'add_empty' => true)),
      'ville'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'), 'add_empty' => true)),
      'total'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'periode'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('copisim_periode'), 'column' => 'id')),
      'ville'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'complement' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('copisim_item'), 'column' => 'id')),
      'total'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('copisim_flux_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'copisim_flux';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'periode'    => 'ForeignKey',
      'ville'      => 'Number',
      'complement' => 'ForeignKey',
      'total'      => 'Number',
    );
  }
}
