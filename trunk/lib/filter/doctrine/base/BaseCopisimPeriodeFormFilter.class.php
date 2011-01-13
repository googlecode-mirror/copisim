<?php

/**
 * CopisimPeriode filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCopisimPeriodeFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'annee'       => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'debut_choix' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
      'fin_choix'   => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'annee'       => new sfValidatorPass(array('required' => false)),
      'debut_choix' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'fin_choix'   => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
    ));

    $this->widgetSchema->setNameFormat('copisim_periode_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimPeriode';
  }

  public function getFields()
  {
    return array(
      'id'          => 'Number',
      'annee'       => 'Text',
      'debut_choix' => 'Date',
      'fin_choix'   => 'Date',
    );
  }
}
