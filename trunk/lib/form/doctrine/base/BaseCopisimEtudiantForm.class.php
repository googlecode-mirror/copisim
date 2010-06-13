<?php

/**
 * CopisimEtudiant form base class.
 *
 * @method CopisimEtudiant getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimEtudiantForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'         => new sfWidgetFormInputHidden(),
      'nom'        => new sfWidgetFormInputText(),
      'prenom'     => new sfWidgetFormInputText(),
      'fac'        => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'), 'add_empty' => false)),
      'naissance'  => new sfWidgetFormDate(),
      'email'      => new sfWidgetFormInputText(),
      'email_tmp'  => new sfWidgetFormInputText(),
      'anonyme'    => new sfWidgetFormInputCheckbox(),
      'doublant'   => new sfWidgetFormInputCheckbox(),
      'classement' => new sfWidgetFormInputText(),
      'created_at' => new sfWidgetFormDateTime(),
      'updated_at' => new sfWidgetFormDateTime(),
    ));

    $this->setValidators(array(
      'id'         => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'nom'        => new sfValidatorString(array('max_length' => 50)),
      'prenom'     => new sfValidatorString(array('max_length' => 50)),
      'fac'        => new sfValidatorDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimItem'))),
      'naissance'  => new sfValidatorDate(array('required' => false)),
      'email'      => new sfValidatorString(array('max_length' => 100)),
      'email_tmp'  => new sfValidatorString(array('max_length' => 100)),
      'anonyme'    => new sfValidatorBoolean(array('required' => false)),
      'doublant'   => new sfValidatorBoolean(array('required' => false)),
      'classement' => new sfValidatorInteger(),
      'created_at' => new sfValidatorDateTime(),
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
