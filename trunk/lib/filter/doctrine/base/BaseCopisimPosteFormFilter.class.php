<?php

/**
 * CopisimPoste filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimPosteFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => true)),
      'ville'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'filiere' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'), 'add_empty' => true)),
      'total'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
    ));

    $this->setValidators(array(
      'periode' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPeriode'), 'column' => 'id')),
      'ville'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'filiere' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimItem'), 'column' => 'id')),
      'total'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('copisim_poste_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimPoste';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'periode' => 'ForeignKey',
      'ville'   => 'Number',
      'filiere' => 'ForeignKey',
      'total'   => 'Number',
    );
  }
}
