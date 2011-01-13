<?php

/**
 * CopisimEtudiant form base class.
 *
 * @method CopisimEtudiant getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 29553 2010-05-20 14:33:00Z Kris.Wallsmith $
 */
abstract class BaseCopisimEtudiantForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nom'        => new sfWidgetFormInputText(),
      'prenom'     => new sfWidgetFormInputText(),
      'fac'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'), 'add_empty' => false)),
      'naissance'  => new sfWidgetFormDate(),
      'email'      => new sfWidgetFormInputText(),
      'email_tmp'  => new sfWidgetFormInputText(),
      'anonyme'    => new sfWidgetFormInputCheckbox(),
      'annee'      => new sfWidgetFormChoice(array('choices' => array('DCEM4' => 'DCEM4', 'DCEM4 doublant' => 'DCEM4 doublant', 'TCEM1' => 'TCEM1'))),
      'classement' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimChoix'), 'add_empty' => false)),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorChoice(array('choices' => array($this->getObject()->get('id')), 'empty_value' => $this->getObject()->get('id'), 'required' => false)),
      'nom'        => new sfValidatorString(array('max_length' => 50)),
      'prenom'     => new sfValidatorString(array('max_length' => 50)),
      'fac'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimFac'))),
      'naissance'  => new sfValidatorDate(array('required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'email_tmp'  => new sfValidatorString(array('max_length' => 100, 'required' => false)),
      'anonyme'    => new sfValidatorBoolean(array('required' => false)),
      'annee'      => new sfValidatorChoice(array('choices' => array(0 => 'DCEM4', 1 => 'DCEM4 doublant', 2 => 'TCEM1'), 'required' => false)),
      'classement' => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimChoix'))),
      'updated_at' => new sfValidatorDateTime(),
    ));

    $this->widgetSchema->setNameFormat('copisim_etudiant[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimEtudiant';
  }

}
