<?php

/**
 * copisim_choix filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class Basecopisim_choixFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etudiant'   => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'poste'      => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_poste'), 'add_empty' => true)),
      'complement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('copisim_item'), 'add_empty' => true)),
      'ordre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'etudiant'   => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'poste'      => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('copisim_poste'), 'column' => 'id')),
      'complement' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('copisim_item'), 'column' => 'id')),
      'ordre'      => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('copisim_choix_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'copisim_choix';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'etudiant'   => 'Number',
      'poste'      => 'ForeignKey',
      'complement' => 'ForeignKey',
      'ordre'      => 'Number',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
