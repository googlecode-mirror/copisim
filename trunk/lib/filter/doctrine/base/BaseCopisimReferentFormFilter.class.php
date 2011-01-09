<?php

/**
 * CopisimReferent filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimReferentFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'periode' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPeriode'), 'add_empty' => true)),
      'nom'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'email'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'tel'     => new sfWidgetFormFilterInput(),
      'divers'  => new sfWidgetFormFilterInput(),
      'fac'     => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'), 'add_empty' => true)),
    ));

    $this->setValidators(array(
      'periode' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPeriode'), 'column' => 'id')),
      'nom'     => new sfValidatorPass(array('required' => false)),
      'email'   => new sfValidatorPass(array('required' => false)),
      'tel'     => new sfValidatorPass(array('required' => false)),
      'divers'  => new sfValidatorPass(array('required' => false)),
      'fac'     => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimFac'), 'column' => 'id')),
    ));

    $this->widgetSchema->setNameFormat('copisim_referent_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimReferent';
  }

  public function getFields()
  {
    return array(
      'id'      => 'Number',
      'periode' => 'ForeignKey',
      'nom'     => 'Text',
      'email'   => 'Text',
      'tel'     => 'Text',
      'divers'  => 'Text',
      'fac'     => 'ForeignKey',
    );
  }
}
