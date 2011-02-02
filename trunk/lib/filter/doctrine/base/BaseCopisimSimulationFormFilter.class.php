<?php

/**
 * CopisimSimulation filter form base class.
 *
 * @package    copisim
 * @subpackage filter
 * @author     Pierre-FrançoisPilouAngrand
 * @version    SVN: $Id: sfDoctrineFormFilterGeneratedTemplate.php 29570 2010-05-21 14:49:47Z Kris.Wallsmith $
 */
abstract class BaseCopisimSimulationFormFilter extends BaseFormFilterDoctrine
{
  public function setup()
  {
    $this->setWidgets(array(
      'etudiant' => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimEtudiant'), 'add_empty' => true)),
      'poste'    => new sfWidgetFormDoctrineChoice(array('model' => $this->getRelatedModelName('CopisimPoste'), 'add_empty' => true)),
      'reste'    => new sfWidgetFormFilterInput(),
    ));

    $this->setValidators(array(
      'etudiant' => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimEtudiant'), 'column' => 'id')),
      'poste'    => new sfValidatorDoctrineChoice(array('required' => false, 'model' => $this->getRelatedModelName('CopisimPoste'), 'column' => 'id')),
      'reste'    => new sfValidatorSchemaFilter('text', new sfValidatorInteger(array('required' => false))),
    ));

    $this->widgetSchema->setNameFormat('copisim_simulation_filters[%s]');

    $this->errorSchema = new sfValidatorErrorSchema($this->validatorSchema);

    $this->setupInheritance();

    parent::setup();
  }

  public function getModelName()
  {
    return 'CopisimSimulation';
  }

  public function getFields()
  {
    return array(
      'id'       => 'Number',
      'etudiant' => 'ForeignKey',
      'poste'    => 'ForeignKey',
      'reste'    => 'Number',
    );
  }
}
