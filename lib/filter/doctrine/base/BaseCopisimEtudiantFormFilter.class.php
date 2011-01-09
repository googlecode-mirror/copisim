<?php

/**
 * CopisimEtudiant filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimEtudiantFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'nom'        => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'prenom'     => new sfWidgetFormFilterInput(array('with_empty' => false)),
      'fac'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'), 'add_empty' => true)),
      'naissance'  => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate())),
      'email'      => new sfWidgetFormFilterInput(),
      'email_tmp'  => new sfWidgetFormFilterInput(),
      'anonyme'    => new sfWidgetFormChoice(array('choices' => array('' => 'yes or no', 1 => 'yes', 0 => 'no'))),
      'annee'      => new sfWidgetFormChoice(array('choices' => array('' => '', 'DCEM4' => 'DCEM4', 'DCEM4 doublant' => 'DCEM4 doublant', 'TCEM1' => 'TCEM1'))),
      'classement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimChoix'), 'add_empty' => true)),
      'updated_at' => new sfWidgetFormFilterDate(array('from_date' => new sfWidgetFormDate(), 'to_date' => new sfWidgetFormDate(), 'with_empty' => false)),
    ));

    $this->setValidators(array(
      'nom'        => new sfValidatorPass(array('required' => false)),
      'prenom'     => new sfValidatorPass(array('required' => false)),
      'fac'        => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimFac'), 'column' => 'id')),
      'naissance'  => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDate(array('required' => false)), 'to_date' => new sfValidatorDateTime(array('required' => false)))),
      'email'      => new sfValidatorPass(array('required' => false)),
      'email_tmp'  => new sfValidatorPass(array('required' => false)),
      'anonyme'    => new sfValidatorChoice(array('required' => false, 'choices' => array('', 1, 0))),
      'annee'      => new sfValidatorChoice(array('required' => false, 'choices' => array('DCEM4' => 'DCEM4', 'DCEM4 doublant' => 'DCEM4 doublant', 'TCEM1' => 'TCEM1'))),
      'classement' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimChoix'), 'column' => 'id')),
      'updated_at' => new sfValidatorDateRange(array('required' => false, 'from_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 00:00:00')), 'to_date' => new sfValidatorDateTime(array('required' => false, 'datetime_output' => 'Y-m-d 23:59:59')))),
    ));

    $this->widgetSchema->setNameFormat('copisim_etudiant_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimEtudiant';
  }

  public function getFields()
  {
    return array(
      'id'         => 'Number',
      'nom'        => 'Text',
      'prenom'     => 'Text',
      'fac'        => 'ForeignKey',
      'naissance'  => 'Date',
      'email'      => 'Text',
      'email_tmp'  => 'Text',
      'anonyme'    => 'Boolean',
      'annee'      => 'Enum',
      'classement' => 'ForeignKey',
      'updated_at' => 'Date',
    );
  }
}
