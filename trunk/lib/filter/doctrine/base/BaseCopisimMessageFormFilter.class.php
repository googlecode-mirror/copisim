<?php

/**
 * CopisimMessage filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCopisimMessageFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'exp'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'dest'       => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'), 'add_empty' => true)),
      'titre'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'texte'      => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'created_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'exp'        => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
      'dest'       => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimEtudiant'), 'column' => 'id')),
      'titre'      => new sfValidatorPass(array('required' => false)),
      'texte'      => new sfValidatorPass(array('required' => false)),
      'created_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('copisim_message_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimMessage';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'exp'        => 'Number',
      'dest'       => 'ForeignKey',
      'titre'      => 'Text',
      'texte'      => 'Text',
      'created_at' => 'Date',
      'updated_at' => 'Date',
    );
  }
}
