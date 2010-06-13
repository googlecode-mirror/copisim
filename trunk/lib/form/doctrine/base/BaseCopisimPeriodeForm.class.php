<?php

/**
 * CopisimPeriode form base class.
 *
 * @method CopisimPeriode getObject() Returns the current form's model object
 *
 * @package    copisim
 * @subpackage form
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormGeneratedTemplate.php 24171 2009-11-19 16:37:50Z Kris.Wallsmith $
 */
abstract class BaseCopisimPeriodeForm extends BaseFormDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'id'          => new sfWidgetFormInputHidden(),
      'annee'       => new sfWidgetFormInputText(),
      'debut_choix' => new sfWidgetFormDate(),
      'fin_choix'   => new sfWidgetFormDate(),
    ));

    $this->setValidators(array(
      'id'          => new sfValidatorDoctrineChoice(array('model' => $this->getModelName(), 'column' => 'id', 'required' => false)),
      'annee'       => new sfValidatorPass(),
      'debut_choix' => new sfValidatorDate(),
      'fin_choix'   => new sfValidatorDate(),
    ));

    $this->widgetSchema->setNameFormat('copisim_periode[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimPeriode';
  }

}
